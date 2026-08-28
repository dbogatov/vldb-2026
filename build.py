#!/usr/bin/env python3
# cSpell:disable

import os
import shutil
import contextlib
import sys
import datetime
import argparse
from functools import reduce
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
WORKSHOP_PROCEEDINGS = "./VLDB26-Workshop-Proceedings"
# Set to True when the GitLab artifact limit is large enough for the PDFs.
PUBLISH_WORKSHOP_PROCEEDINGS = True
CONVERTIBLE_IMAGE_SUFFIXES = {
    ".jpeg",
    ".jpg",
    ".pam",
    ".pgm",
    ".png",
    ".ppm",
    ".tif",
    ".tiff",
}


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


# Return a set of unique pages derived from section of the data.
def get_pages(data):
    a = map(lambda x: x["sub_sections"], data["sections"])
    b = reduce(lambda x, y: x + y, a)
    c = filter(lambda x: not isinstance(x, str) and "page" in x, b)
    d = map(lambda x: x["page"], c)
    e = map(lambda x: "" if x == "/" else x, d)
    f = set(e)
    return f


# pylint: disable-next=too-many-statements,too-many-branches,too-many-locals
def main():
    use_cache, dist, base = parse()

    dist = f"./{dist}"

    data = load_data("data")

    markdown_engine = markdown.Markdown(extensions=['mdx_emdash'])

    def process_markdown(input_string, classes=""):
        input_string = input_string.replace("__BASE__", base)
        return (
            f'<div style="text-align: justify" class="markdown {classes}"> '
            f'{Markup(markdown_engine.convert(input_string))} </div>')

    def process_subscript(input_string):
        n = int(input_string)
        if n % 10 == 1:
            return "st"
        if n % 10 == 2:
            return "nd"
        if n % 10 == 3:
            return "rd"
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

    shutil.copytree(
        Path(SRC) / "assets",
        Path(dist) / "assets",
        ignore=shutil.ignore_patterns(".DS_Store"),
    )

    # copy static pages (pre-built pages served verbatim, e.g. the program)
    static_dir = Path(SRC) / "static"
    if static_dir.is_dir():
        for path in static_dir.glob("*.html"):
            shutil.copyfile(path, Path(dist) / path.name)

    # Publish the workshop proceedings at the same URL structure used by
    # previous VLDB editions: /Workshops/vldb.html. The page's paper links
    # are relative to this directory, so keep its assets and PDFs alongside it.
    if PUBLISH_WORKSHOP_PROCEEDINGS:
        proceedings_dir = Path(WORKSHOP_PROCEEDINGS)
        proceedings_dist = Path(dist) / "Workshops"
        proceedings_dist.mkdir()
        shutil.copyfile(proceedings_dir / "vldb.html",
                        proceedings_dist / "vldb.html")
        shutil.copytree(proceedings_dir / "assets",
                        proceedings_dist / "assets")
        shutil.copytree(proceedings_dir / "VLDB-Workshops-2026",
                        proceedings_dist / "VLDB-Workshops-2026")

    for path in (Path(SRC) / "templates").glob("*"):
        if "layout" not in str(path):
            templates.get_template(f"templates/{path.name}").stream(
                data=data,
                general_information=load_data("general-information"),
                call_for_contributions=load_data("call-for-contributions"),
                dates_and_guidelines=load_data("dates-and-guidelines"),
                demonstrations=load_data("demonstrations"),
                keynotes=load_data("keynotes"),
                panels=load_data("panels"),
                phd_workshop=load_data("phd-workshop"),
                tutorials=load_data("tutorials"),
                workshops=load_data("workshops"),
                sponsorship=load_data("sponsorship"),
                awards=load_data("awards"),
                pages=list(get_pages(data)),
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

    # Prefer a system cwebp binary when available (needed on Apple Silicon).
    # Otherwise, use webptools' bundled binary for platforms such as x86 Linux.
    cwebp_bin = shutil.which("cwebp")
    if cwebp_bin is None:
        grant_permission()

    # convert images to webp
    for subdir in ["", "carousel"]:
        for path in (Path(dist) / "assets" / "img" / subdir).glob("*"):
            if path.suffix.lower() not in CONVERTIBLE_IMAGE_SUFFIXES:
                continue
            if (use_cache and
                (Path(CACHE) / path.name).with_suffix(".webp").exists()):
                shutil.copyfile(
                    (Path(CACHE) / path.name).with_suffix(".webp"),
                    path.with_suffix(".webp"),
                )
            else:
                result = cwebp(
                    input_image=path,
                    output_image=path.with_suffix(".webp"),
                    option="-q 50",
                    bin_path=cwebp_bin,
                )
                if result["exit_code"] != 0:
                    error = result["stderr"].decode("UTF-8",
                                                    errors="replace")
                    raise RuntimeError(
                        f"Failed to convert {path} to WebP: {error}")
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
