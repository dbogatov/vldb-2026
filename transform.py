#!/usr/bin/env python3
"""Transform reviewer CSV/TSV to a YAML-like text list.

Usage:
  python transform.py input.csv output.txt

Input columns (case-insensitive):
  First Name, Middle Initial (optional), Last Name, Organization

Other columns are ignored.
"""

from __future__ import annotations

import csv
import sys
from pathlib import Path
from typing import Dict, Iterable, List


def _open_text(path: Path):
    return path.open("r", encoding="utf-8-sig", newline="")


def _detect_dialect(sample: str) -> csv.Dialect:
    try:
        return csv.Sniffer().sniff(sample, delimiters=["\t", ",", ";", "|"]) #type: ignore
    except csv.Error:
        class TabDialect(csv.Dialect):
            delimiter = "\t"
            quotechar = '"'
            escapechar = None
            doublequote = True
            skipinitialspace = False
            lineterminator = "\n"
            quoting = csv.QUOTE_MINIMAL
        return TabDialect()


def _normalize_header(name: str) -> str:
    return " ".join(name.strip().lower().split())


def _pick(row: Dict[str, str], keys: Iterable[str]) -> str:
    for k in keys:
        if k in row and row[k].strip():
            return row[k].strip()
    return ""


def transform_rows(rows: Iterable[Dict[str, str]]) -> List[str]:
    out: List[str] = []
    for row in rows:
        first = _pick(row, ["first name", "firstname", "first"])
        middle = _pick(row, ["middle initial (optional)", "middle initial", "middle", "mi"])
        last = _pick(row, ["last name", "lastname", "last"])
        org = _pick(row, ["organization", "affiliation", "institution"])
        if not (first or last or org):
            continue

        name_parts = [p for p in [first, middle, last] if p]
        name = " ".join(name_parts).strip()

        out.append(f"- name: {name}")
        out.append(f"  affiliation: {org}")
    return out


def main(argv: List[str]) -> int:
    if len(argv) != 3:
        print("Usage: python transform.py input.csv output.txt", file=sys.stderr)
        return 2

    in_path = Path(argv[1])
    out_path = Path(argv[2])

    if not in_path.exists():
        print(f"Input file not found: {in_path}", file=sys.stderr)
        return 2

    with _open_text(in_path) as f:
        sample = f.read(4096)
        f.seek(0)
        dialect = _detect_dialect(sample)
        reader = csv.DictReader(f, dialect=dialect)
        if not reader.fieldnames:
            print("No headers found in input file.", file=sys.stderr)
            return 2

        # Normalize headers for flexible matching
        normalized = [_normalize_header(h) for h in reader.fieldnames]
        header_map = {orig: norm for orig, norm in zip(reader.fieldnames, normalized)}

        rows = []
        for row in reader:
            norm_row = {header_map[k]: (v or "").strip() for k, v in row.items()}
            rows.append(norm_row)

    lines = transform_rows(rows)
    out_path.write_text("\n".join(lines) + ("\n" if lines else ""), encoding="utf-8")
    return 0


if __name__ == "__main__":
    raise SystemExit(main(sys.argv))
