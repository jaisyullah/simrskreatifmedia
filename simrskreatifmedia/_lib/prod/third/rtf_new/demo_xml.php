<?php

?>
<HTML><HEAD><TITLE>Document Generator </TITLE>
</HEAD>
<BODY><a href="<?php echo $PHP_SELF."?".md5(uniqid ("")); ?>">again</a><br><br><br>

<?php

include "cl_arktimer.php";

//error_reporting(15);


require_once "document_generator/cl_xml2driver.php";


$file = "fin.inc";
$file = "example_template.xml";

$cont = join("",file($file));

$timer = new ArkTimer;

$xml = new nDOCGEN($cont,"RTF");



//	echo "<pre>";
//	print_r($xml->get_result_file());
//	echo "</pre>";

		$fp = fopen("test_result.rtf", "w");
		fwrite($fp, $xml->get_result_file());
		@fclose($fp);

$timer->EchoTime();


//$xml->get_doc_to_file("","temp_dir.rtf");


?>
</BODY></HTML>
