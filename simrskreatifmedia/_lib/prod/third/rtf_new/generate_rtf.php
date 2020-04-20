<?php
	require_once "document_generator/cl_xml2driver.php";

	// this will be the name of our RTF file:
	$file_rtf = "Test.rtf";
	// HTTP headers saying that it is a file stream:
	Header("Content-type: application/octet-stream");
	// passing the name of the streaming file:
	Header("Content-Disposition: attachment; filename=$file_rtf");
	// example XML template
	$file = "example_template.xml";
	$xml_template = join("",file($file));
	// creating class object specifying the driver type - "RTF"
	$xml = new nDOCGEN($xml_template,"RTF");

	echo $xml->get_result_file();
?>
