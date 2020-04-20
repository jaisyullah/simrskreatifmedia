<?php
 session_start();
 $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "sc_arafiq/sc_arafiq";
 include("../_lib/css/" . $str_schema_all . "_menuH.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<HEAD>
 <TITLE></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
   <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
   <META http-equiv="Pragma" content="no-cache"/>
   <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
   <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>_menuH.css" /> 
   <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>_menuH<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
</HEAD>
<body style="margin: 0px" scroll="no">
<table class="scMenuIframe" style="padding: 0px; spacing: 0px; border-width: 0px; vertical-align: top;" cellspacing=0 cellpadding=0>
<tr><td></td></tr>
</table>
</body>
</html>
