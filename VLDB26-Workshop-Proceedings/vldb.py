import posixpath
import re
from pathlib import Path
from xml.etree import ElementTree
from zipfile import ZipFile


ROOT = Path(__file__).resolve().parent
WORKBOOK_PATH = ROOT / "VLDB 2026 Workshops.xlsx"
PAPERS_ROOT = ROOT / "VLDB-Workshops-2026"
OUTPUT_PATH = ROOT / "vldb.org"

SHEET_NAMES = {"ADS/DATAI": "ADSDATAI"}
DIRECTORY_NAMES = {"ADS/DATAI": "DATAI-ADS"}

SPREADSHEET_NS = "http://schemas.openxmlformats.org/spreadsheetml/2006/main"
OFFICE_REL_NS = "http://schemas.openxmlformats.org/officeDocument/2006/relationships"
PACKAGE_REL_NS = "http://schemas.openxmlformats.org/package/2006/relationships"


def column_index(cell_reference):
    match = re.match(r"[A-Z]+", cell_reference or "")
    if not match:
        return 0
    result = 0
    for character in match.group(0):
        result = result * 26 + ord(character) - ord("A") + 1
    return result - 1


def read_xlsx(path):
    """Read the cell values needed by this project using only the standard library."""
    with ZipFile(path) as archive:
        shared_strings = []
        if "xl/sharedStrings.xml" in archive.namelist():
            root = ElementTree.fromstring(archive.read("xl/sharedStrings.xml"))
            for item in root.findall(f"{{{SPREADSHEET_NS}}}si"):
                shared_strings.append(
                    "".join(
                        node.text or ""
                        for node in item.iter(f"{{{SPREADSHEET_NS}}}t")
                    )
                )

        workbook_root = ElementTree.fromstring(archive.read("xl/workbook.xml"))
        relationships_root = ElementTree.fromstring(
            archive.read("xl/_rels/workbook.xml.rels")
        )
        relationships = {
            item.attrib["Id"]: item.attrib["Target"]
            for item in relationships_root.findall(
                f"{{{PACKAGE_REL_NS}}}Relationship"
            )
        }

        sheets = {}
        for sheet in workbook_root.findall(
            f".//{{{SPREADSHEET_NS}}}sheet"
        ):
            name = sheet.attrib["name"]
            relationship_id = sheet.attrib[f"{{{OFFICE_REL_NS}}}id"]
            target = relationships[relationship_id].lstrip("/")
            if not target.startswith("xl/"):
                target = posixpath.join("xl", target)
            target = posixpath.normpath(target)
            sheet_root = ElementTree.fromstring(archive.read(target))
            rows = []
            for row_node in sheet_root.findall(
                f".//{{{SPREADSHEET_NS}}}sheetData/{{{SPREADSHEET_NS}}}row"
            ):
                values = []
                for cell in row_node.findall(f"{{{SPREADSHEET_NS}}}c"):
                    index = column_index(cell.attrib.get("r"))
                    while len(values) <= index:
                        values.append(None)
                    cell_type = cell.attrib.get("t")
                    if cell_type == "inlineStr":
                        value = "".join(
                            node.text or ""
                            for node in cell.iter(f"{{{SPREADSHEET_NS}}}t")
                        )
                    else:
                        value_node = cell.find(f"{{{SPREADSHEET_NS}}}v")
                        raw_value = value_node.text if value_node is not None else None
                        if raw_value is None:
                            value = None
                        elif cell_type == "s":
                            value = shared_strings[int(raw_value)]
                        elif cell_type == "b":
                            value = raw_value == "1"
                        elif cell_type in {"str", "e"}:
                            value = raw_value
                        else:
                            number = float(raw_value)
                            value = int(number) if number.is_integer() else number
                    values[index] = value
                rows.append(values)
            sheets[name] = rows
    return sheets


def clean(value):
    return " ".join(str(value or "").split())


def paper_id_key(value):
    if isinstance(value, float) and value.is_integer():
        return int(value)
    return value


def worksheet_rows(sheet_rows):
    rows = []
    for values in sheet_rows[1:]:
        if not any(value is not None and clean(value) for value in values):
            continue
        title, paper_id, authors, filename, copyright_filename = (
            values + [None] * 5
        )[:5]
        rows.append(
            {
                "title": clean(title),
                "paper_id": paper_id_key(paper_id),
                "authors": clean(authors).rstrip(" ,"),
                "filename": clean(filename),
                "copyright_filename": clean(copyright_filename),
            }
        )
    return rows


def main():
    workbook = read_xlsx(WORKBOOK_PATH)
    workshop_sheet = workbook["List of Workshops"]
    workshops = []
    for values in workshop_sheet[1:]:
        full_name, acronym, chairs, paper_count, _, docs_verified, included = (
            values + [None] * 7
        )[:7]
        if clean(included).lower() != "yes":
            continue
        workshops.append(
            {
                "full_name": clean(full_name),
                "acronym": clean(acronym),
                "chairs": clean(chairs),
                "paper_count": int(paper_count),
                "docs_verified": clean(docs_verified),
            }
        )

    papers_by_workshop = {}
    errors = []
    for workshop in workshops:
        acronym = workshop["acronym"]
        sheet_name = SHEET_NAMES.get(acronym, acronym)
        directory_name = DIRECTORY_NAMES.get(acronym, acronym)
        if sheet_name not in workbook:
            errors.append(f"{acronym}: missing worksheet {sheet_name}")
            continue
        directory = PAPERS_ROOT / directory_name
        if not directory.is_dir():
            errors.append(f"{acronym}: missing directory {directory_name}")
            continue
        papers = worksheet_rows(workbook[sheet_name])
        if len(papers) != workshop["paper_count"]:
            errors.append(
                f"{acronym}: workshop list says {workshop['paper_count']} papers, "
                f"but worksheet contains {len(papers)}"
            )
        seen_ids = set()
        for paper in papers:
            if paper["paper_id"] in seen_ids:
                errors.append(f"{acronym}: duplicate paper ID {paper['paper_id']}")
            seen_ids.add(paper["paper_id"])
            if not (directory / paper["filename"]).is_file():
                errors.append(
                    f"{acronym} paper {paper['paper_id']}: "
                    f"missing {paper['filename']}"
                )
            if not (directory / paper["copyright_filename"]).is_file():
                errors.append(
                    f"{acronym} paper {paper['paper_id']}: "
                    f"missing {paper['copyright_filename']}"
                )
            paper["relative_path"] = (
                f"./VLDB-Workshops-2026/{directory_name}/{paper['filename']}"
            )
        papers_by_workshop[acronym] = papers

    if errors:
        raise RuntimeError("Cannot generate vldb.org:\n- " + "\n- ".join(errors))

    lines = [
        "#+OPTIONS: toc:nil num:nil",
        "#+SETUPFILE: ./assets/org-html-themes/theme-bigblow-local.setup",
        "",
        (
            "#+TITLE: Proceedings of Workshops at the 52nd International "
            "Conference on Very Large Data Bases (VLDB 2026)"
        ),
        "",
        "* VLDBW 2026",
        "** VLDB 2026 Workshop Chairs",
        "*** Tilmann Rabl, Meihui Zhang",
        "** VLDB 2026 Workshop Proceedings Chairs",
        "*** Zhaojing Luo, Jiuqi Wei",
        "** Accepted Workshops",
    ]
    for workshop in workshops:
        lines.append(f"*** {workshop['acronym']}: {workshop['full_name']}")
        lines.append(f"- Workshop Chairs: {workshop['chairs']}")

    for workshop in workshops:
        acronym = workshop["acronym"]
        lines.extend([f"* {acronym}", f"** {workshop['full_name']}"])
        for paper in papers_by_workshop[acronym]:
            lines.append(f"*** [[{paper['relative_path']}][{paper['title']}]]")
            lines.append(f"    {paper['authors']}")
        lines.append("")

    OUTPUT_PATH.write_text("\n".join(lines).rstrip() + "\n", encoding="utf-8")
    total_papers = sum(len(papers) for papers in papers_by_workshop.values())
    print(
        f"Generated {OUTPUT_PATH.name}: "
        f"{len(workshops)} workshops, {total_papers} papers"
    )


if __name__ == "__main__":
    main()
