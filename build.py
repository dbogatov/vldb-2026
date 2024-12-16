#!/usr/bin/env python3
# cSpell:disable

import os
import shutil
import contextlib
import sys
import datetime
import argparse
from pathlib import Path
from jinja2 import Environment, FileSystemLoader
from markupsafe import Markup
from webptools import cwebp, grant_permission
import markdown
import yaml

abspath = os.path.abspath(__file__)
dname = os.path.dirname(abspath)
os.chdir(dname)

SRC = "./website"
CACHE = "./cache"


# silence stdout
@contextlib.contextmanager
def nostdout():

    class DummyFile:  # pylint: disable=too-few-public-methods

        def write(self, input_string):  # pylint: disable=too-few-public-methods
            pass

    save_stdout = sys.stdout
    sys.stdout = DummyFile()
    yield
    sys.stdout = save_stdout


def recreate_dir(path, ignore_errors=False):
    shutil.rmtree(path, ignore_errors=ignore_errors)
    os.mkdir(path)


def load_data(file):
    with open(Path(SRC) / "assets" / "config" / f"{file}.yml",
              encoding="UTF-8") as data_file:
        data = yaml.load(data_file, Loader=yaml.FullLoader)
        return data


def parse():
    parser = argparse.ArgumentParser(description="Build the website")
    parser.add_argument(
        "--use-cache",
        dest="use_cache",
        action="store_true",
        help="If set, will fetch converted images from cache "
        "(if cache empty, will regenerate).",
    )
    parser.add_argument(
        "--dist",
        dest="dist",
        metavar="dist",
        type=str,
        required=False,
        default="dist",
        help="The name of the directory to put generated file in.",
    )
    parser.add_argument("--base",
                        dest="base",
                        metavar="base",
                        type=str,
                        required=False,
                        default="",
                        help="The base domain for all pages and assets. "
                        "If unset will use root /.")
    args = parser.parse_args()

    return args.use_cache, args.dist, args.base


# pylint: disable-next=too-many-statements,too-many-branches,too-many-locals
def main():
    use_cache, dist, base = parse()

    dist = f"./{dist}"

    data = load_data("data")

    markdown_engine = markdown.Markdown(extensions=['mdx_emdash'])

    def process_markdown(input_string, classes=""):
        input_string = input_string.replace("__BASE__", base)
        return (f'<div class="markdown {classes}"> '
                f'{Markup(markdown_engine.convert(input_string))} </div>')

    def process_subscript(input_string):
        n = int(input_string)
        if n % 10 == 1:
            return "st"
        elif n % 10 == 2:
            return "nd"
        elif n % 10 == 3:
            return "rd"
        else:
            return "th"

    templates = Environment(loader=FileSystemLoader(searchpath=str(Path(SRC))),
                            autoescape=True)
    templates.filters["markdown"] = process_markdown
    templates.filters["markdownInline"] = lambda input: process_markdown(
        input, "markdown-inline")
    templates.filters["subscr"] = process_subscript

    # create site structure
    recreate_dir(dist, ignore_errors=True)
    os.makedirs(CACHE, exist_ok=True)

    shutil.copytree(Path(SRC) / "assets", Path(dist) / "assets")

    for path in (Path(SRC) / "templates").glob("*"):
        if "layout" not in str(path):
            templates.get_template(f"templates/{path.name}").stream(
                data=data,
                general_information=load_data("general_information"),
                base=base,
                commit=("local-dev" if os.environ.get("CI_COMMIT_SHORT_SHA")
                        is None else os.environ.get("CI_COMMIT_SHORT_SHA")),
                year=str(datetime.datetime.now().year),
            ).dump(str((Path(dist) / path.name).with_suffix("")))

    # setup css / js dirs
    recreate_dir(Path(dist) / "assets" / "vendor" / "css")
    recreate_dir(Path(dist) / "assets" / "vendor" / "js")

    # concat js
    with open(Path(dist) / "assets" / "merged.js", "w",
              encoding="UTF-8") as output_file:
        content = ""
        for js_lib in [
                "prod-8.min",
                "../../script",
        ]:
            with open(
                    Path(SRC) / "assets" / "vendor" / "js" / f"{js_lib}.js",
                    encoding="UTF-8",
            ) as lib_file:
                # here is where you would put JS minification if needed.
                content += lib_file.read() + "\n\n"
        output_file.write(content)
    os.remove(Path(dist) / "assets" / "script.js")

    # concat css
    with open(Path(dist) / "assets" / "merged.css", "w",
              encoding="UTF-8") as output_file:
        content = ""
        for css_lib in [
                "prod-8.min",
                "../../style",
        ]:
            with open(
                    Path(SRC) / "assets" / "vendor" / "css" / f"{css_lib}.css",
                    encoding="UTF-8",
            ) as lib_file:
                # here is where you would put CSS minification if needed.
                content += lib_file.read() + "\n\n"
        output_file.write(content)
    os.remove(Path(dist) / "assets" / "style.css")

    # convert images to webp
    grant_permission()
    for subdir in ["", "carousel"]:
        for path in (Path(dist) / "assets" / "img" / subdir).glob("*"):
            if not path.is_dir():
                if (use_cache and
                    (Path(CACHE) / path.name).with_suffix(".webp").exists()):
                    shutil.copyfile(
                        (Path(CACHE) / path.name).with_suffix(".webp"),
                        path.with_suffix(".webp"),
                    )
                else:
                    cwebp(
                        input_image=path,
                        output_image=path.with_suffix(".webp"),
                        option="-q 50",
                    )
                    shutil.copyfile(
                        path.with_suffix(".webp"),
                        (Path(CACHE) / path.name).with_suffix(".webp"),
                    )
                os.remove(path)

    # google CDN verification
    ver_tag = f'google{data["google_search_console_verification"]}.html'
    with open(
            Path(dist) / ver_tag,
            "w",
            encoding="UTF-8",
    ) as output_file:
        output_file.write(f"google-site-verification: {ver_tag}")


if __name__ == "__main__":
    main()
