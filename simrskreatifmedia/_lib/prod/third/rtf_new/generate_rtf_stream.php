<?php
	require_once "document_generator/cl_xml2driver.php";

	// this will be the name of our RTF file:
	$file_rtf = "Test.rtf";
	// HTTP headers saying that it is a file stream:
	Header("Content-type: application/octet-stream");
	// passing the name of the streaming file:
	Header("Content-Disposition: attachment; filename=$file_rtf");
	// example XML template
	$xml_template =  '<'.'?xml version="1.0" encoding="ISO-8859-1" ?'.'>';
	$xml_template .= '<DOC config_file="doc_config.inc">';
	$xml_template .= 'Hello <i><b>World!!!</b></i>';
	$xml_template .= '</DOC>';
	// creating class object specifying the driver type - "RTF"
	$xml = new nDOCGEN($xml_template,"RTF");

	echo $xml->get_result_file();
?>
