<?php
	require_once "document_generator/cl_xml2driver.php";

	// this will be the name of our RTF file:
	$file_rtf = "Test.rtf";
	// example XML template
	$file = "example_template.xml";
	$xml_template = join("",file($file));
	// creating class object specifying the driver type - "RTF"
	$xml = new nDOCGEN($xml_template,"RTF");

	$fp = fopen($file_rtf, "w");
	fwrite($fp, $xml->get_result_file());
	@fclose($fp);
?>
