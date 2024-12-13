<section class="formatting-guidelines">
  <h1>VLDB 2026: Formatting Guidelines</h1>

  <article class="w-full col-span-full tile-break-3:col-span-3">
    <h2 class="font-bold mt-[50px] mb-[20px]"><span>General Information</span></h2>
    <p class="my-[24px] leading-relaxed"><span>All papers submitted to PVLDB and the VLDB Conference for review, irrespective of track, must adhere strictly to the PVLDB template detailed here. Any deviation will be liable to summary rejection (i.e., a desk rejection) of the paper. The PVLDB style template is based on the ACM style template and is updated regularly. Here is the current PVLDB template (for Latex and Word), including the style file and a sample file, as a zip file and as an overleaf project (for Latex):</span></p>
    <div style="padding-left: 20px; border: 0 solid; border-left-width: 2px; border-color: #b22222; margin-top: 24px; margin-bottom: 24px; padding-top: 10px; padding-bottom: 10px; color: #b22222; font-size: 16px"><span><a href="https://github.com/cwida/pvldbstyle/archive/master.zip"><u>PVLDB style template zip</u></a><br><a href="https://www.overleaf.com/latex/templates/template-for-proceedings-of-the-vldb-endowment/krfrpvrbbvfj"><u>PVLDB style template Overleaf</u></a><br><a href="https://vldb.org/pvldb/wp-content/uploads/2020/PVLDBvol14Sample.docx"><u>PVLDB style MS Word template</u></a></span></div>
    <p class="my-[24px] leading-relaxed"><span>Because the template is updated regularly, authors may need to update their style files in the camera-ready process as instructed by the Proceedings Chairs. The paper should in particular:</span></p>
    <div style="padding-left: 20px; border: 0 solid; border-left-width: 2px; border-color: #b22222; margin-top: 24px; margin-bottom: 24px; padding-top: 10px; padding-bottom: 10px; color: #b22222; font-size: 16px"><span>strictly follow the current PVLDB style template w.r.t. paper format, line spacing, font size, and style of captions;<br><br>show no headers or footers, because these will be added later;<br><br>have no line overflows, i.e., <a href="https://en.wikipedia.org/wiki/Widows_and_orphans"><u>no widows or orphans</u></a>;<br><br>have balanced columns on the last page (LaTeX tip: \usepackage{balance});<br><br>have all figures and tables readable (without having to turn the PDF reader's magnification to 400%);<br><br>avoid abbreviations where not needed, e.g., when referencing the name of a journal or when referring to a Section, a Figure, etc.;<br><br>have no numbering issues, e.g., all floats (Figures, Tables, etc.) are numbered consecutively and also the references in the text use the correct numbers;<br><br>have table captions above the tables, while figure captions below the figures;<br><br>use the "acmart" bibliography style (LaTeX) including all references being alphabetically sorted. References should include author, title, proceedings, pages, and year, with proceedings or journal name in italics;<br><br>contain the same author information as in CMT. In particular, the order of the authors must be the same in the paper and in CMT. Also middle names of the authors, if any, must be the same as they are in the paper and in CMT;<br><br>list every author in its own author tag. The authors can, as shown in the template sample, share the same affiliations, but every author deserves his/her own author tag! There may not be any Additional Authors section;<br><br>contain no citations in the Abstract;<br><br>contain the same Abstract as the one submitted to CMT;<br><br>be <a href="https://en.wikipedia.org/wiki/PDF/A"><u>PDF/A</u></a> formatted. For this, the paper in particular needs to embed all fonts, including Type 1 postscript fonts, within the PDF. One can check this with, for instance, the "Properties" menu of Acrobat Reader (should show "embedded" for each font). TeX users can check with the command "updmap edit" that pdftexDownloadBase15 is set to true for your pdftex installation (better also set dvipsDownloadBase35 true). If the PDF's properties menu shows "Format PDF/A", the document fulfills all necessary requirements. One can find various tools that convert PDFs into PDF/A format (and, hence, embed the fonts into the document), but the authors need to make sure that the result is as intended. This is a request by the ACM digital library to improve searchability and long-term preservation of our papers. ACM maintains a FAQ about embedding fonts in TeX.</span></div>
    <p class="my-[24px] leading-relaxed"><span>Please submit your papers to VLDB's conference management toolkit <a href="https://cmt3.research.microsoft.com/PVLDBv19_2026"><u>CMT</u></a>.</span></p>
    <h2 class="font-bold mt-[50px] mb-[20px]"><span>Copyright and Camera-Ready Information</span></h2>
    <p class="my-[24px] leading-relaxed"><span>All papers accepted for the VLDB 2025 Conference will be published in the Proceedings of the VLDB Endowment (PVLDB) Volume 18. It is the authors' responsibility to ensure that their submissions adhere strictly to the VLDB format detailed above. After the successful acceptance of a paper, we send an email to the contact author(s) with detailed instructions on how to prepare and submit the camera-ready copy of the accepted paper. The process involves, among others, the following steps:</span></p>
    <div style="padding-left: 20px; border: 0 solid; border-left-width: 2px; border-color: #b22222; margin-top: 24px; margin-bottom: 24px; padding-top: 10px; padding-bottom: 10px; color: #b22222; font-size: 16px"><span>Check carefully the paper's meta-data, such as title, abstract, authors' names, affiliations, and their order, in CMT, and correct those if necessary; note that this information, once processed, will be final and used for producing the conference booklet.<br><br>Update the paper with the current camera-ready style files (see links above).<br><br>Enter the DOI and page numbers of your accepted paper in the LaTeX sources; these values are provided with the camera-ready instruction email:<ul>
          <li>\vldbdoi{XX.XX/XXX.XX}</li>
          <li>\vldbpages{XXX-XXX}</li>
        </ul>Update the volume, issue and year specifications of your accepted paper in the LaTeX sources; these values are also provided with the camera-ready instruction email:<ul>
          <li>\vldbvolume{XXXX}</li>
          <li>\vldbissue{XXXX}</li>
          <li>\vldbyear{XXXX}</li>
        </ul>Check that your PDF strictly follows the ACM formatting guidelines and fulfills all requirements listed above. In particular, check that the paper is PDF/A formatted, the authors are correctly presented and the paper has no line overflows.<br><br>Download the <a href="https://vldb.org/pvldb/vol13/VLDB_Copyright_License_Form.pdf"><u>PVLDB Copyright License Form</u></a>, enter your details and sign it.<br><br>Rename your final submission files; for instance, if your submission was given the id 42 and your name is John Smith, you should name your files as follows:<ul>
          <li>Camera-ready paper: p42-smith.pdf</li>
          <li>Copyright statement: p42-smith_Copyright.pdf</li>
        </ul><br><br>Send the copyright statement via email to the proceedings chairs.<br><br>Submit the camera-ready paper to CMT.</span></div>
    <h2 class="font-bold mt-[50px] mb-[20px]"><span>Publication Process</span></h2>
    <p class="my-[24px] leading-relaxed"><span>Accepted research papers are continuously published in monthly issues of the PVLDB Journal. You can expect a period of 2 months (from the time you complete the camera-ready submission process) for your paper to appear in the PVLDB Proceedings.</span></p>
    <p class="my-[24px] leading-relaxed"><span>PVLDB is an archival journal with monthly issues that is published online on pvldb.org. All material of PVLDB is also hosted within the ACM Digital Library and indexed by DBLP as well as Scopus and Web Of Science (Emerging Sources Citation Index).</span></p>
  </article>

</section>
<?php
define('PageTitle', "Formatting Guidelines");
define('PageDescription', "All papers submitted to PVLDB and the VLDB 2025 Conference, irrespective of track, must adhere strictly to the PVLDB format detailed here.");
?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebPage",
  "name": "Formatting Guidelines",
  "url": "https://vldb.org/2025/?formatting-guidelines",
  "description": "All papers submitted to PVLDB and the VLDB 2025 Conference, irrespective of track, must adhere strictly to the PVLDB format detailed here.",
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@id": "https://vldb.org/",
        "name": "VLDB"
      }
    },{
      "@type": "ListItem",
      "position": 2,
      "item": {
        "@id": "https://vldb.org/conference.html",
        "name": "Conferences"
      }
    },{
      "@type": "ListItem",
      "position": 3,
      "item": {
        "@id": "https://vldb.org/2025/",
        "name": "2025"
      }
    },{
      "@type": "ListItem",
      "position": 4,
      "item": {
        "@id": "https://vldb.org/2025/?dates-and-guidelines",
        "name": "Dates & Guidelines"
      }
    },{
      "@type": "ListItem",
      "position": 5,
      "item": {
        "@id": "https://vldb.org/2025/?formatting-guidelines",
        "name": "Formatting Guidelines"
      }
    }]
  }
}
</script>
