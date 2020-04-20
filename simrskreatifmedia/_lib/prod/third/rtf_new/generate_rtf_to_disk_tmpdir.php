<?php
	require_once "document_generator/cl_xml2driver.php";

	// this will be the name of our RTF file:
	$file_rtf = "temp_dir.rtf";
	// example XML template
	$file = "example_template.xml";
	$xml_template = join("",file($file));
	// creating class object specifying the driver type - "RTF"
	$xml = new nDOCGEN($xml_template,"RTF");

	$xml->get_doc_to_file("",$file_rtf);
	echo "Generated file <b>".$file_rtf."</b> was saved to disc.";
?>
