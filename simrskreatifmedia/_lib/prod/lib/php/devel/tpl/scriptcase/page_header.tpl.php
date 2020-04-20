<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head> 
 <meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <meta http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT" />
 <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <meta http-equiv="Cache-Control" content="max-age=15, s-maxage=0, private" />
 <meta http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <meta http-equiv="Pragma" content="no-cache" />
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <meta name="author" content="NetMake" />
 <meta name="generator" content="ScriptCase" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->GetVar('css_file'); ?>" />
 
 <?php

$arr_style_css = $this->GetVar('page_style_css');
if(is_array($arr_style_css))
{
	foreach ($arr_style_css as $arr_style_css_file)
	{
	    $str_file = $nm_config['url_js_' . $arr_style_css_file[0]] . $arr_style_css_file[1];
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo $str_file; ?>" />
	 <?php
	}
}

if($this->GetVar('usar_css')=="S")
{/*
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo $nm_config['url_tmp'] . $this->GetVar('css_file'); ?>" />
	<?php
*/}

$arr_style = $this->GetVar('page_style');
if (!empty($arr_style))
{
?>
 <style type="text/css">
<?php
    foreach ($arr_style as $str_style)
    {
        echo $str_style;
    }
?>
 </style>
<?php
}

$arr_javascriptbeforejs = $this->GetVar('page_javascriptbeforejs');
if (!empty($arr_javascriptbeforejs))
{
?>
 <script language="javascript" type="text/javascript">
<?php
    foreach ($arr_javascriptbeforejs as $str_javascriptbeforejs)
    {
        echo $str_javascriptbeforejs;
    }
?>
 </script>
<?php
}

$arr_js = $this->GetVar('page_js');
foreach ($arr_js as $arr_js_file)
{
    $str_file = $nm_config['url_js_' . $arr_js_file[0]] . $arr_js_file[1];
    $str_file = $arr_js_file[0] == "devlang" ? nm_url_rand($str_file) : $str_file;
?>
 <script language="javascript" type="text/javascript" src="<?php echo $str_file; ?>"></script>
<?php
}

$arr_javascript = $this->GetVar('page_javascript');
if (!empty($arr_javascript))
{
?>
 <script language="javascript" type="text/javascript">
<?php
    foreach ($arr_javascript as $str_javascript)
    {
        echo $str_javascript;
    }
?>
 </script>
<?php
}
?>

</head>
<?php
$arr_body		= explode("|", $this->GetVar('page_body'));
$page_body		= (isset($arr_body[0])) ? $arr_body[0] : "";

$str_body_options	= "";
if (is_array($arr_body) && sizeof($arr_body) > 1)
{
	foreach ($arr_body as $body_option)
	{
		$bo_tmp				 = explode("#", $body_option);
		if (is_array($bo_tmp) && sizeof($bo_tmp) > 1)
		{
			$str_body_options	.= ' ' . $bo_tmp[0] . '="' . $bo_tmp[1] . '"';
		}
	}
}

$str_class = ('' == $page_body)
           ? ''
           : ' class="' . $page_body . '"';
$str_bgcolor = '';
if ('nmTopBar' == $page_body)
{
    $str_class   = 'nmPage';
}
$str_unload = $this->GetVar('page_unload');
if (isset($str_unload) && (null != $str_unload) && (FALSE != $str_unload) && ('' != $str_unload))
{
    $str_unload = ' onUnload="' . $str_unload . '"';
}
else
{
    $str_unload = '';
}
$str_onload = $this->GetVar('page_onload');
if (isset($str_onload) && (null != $str_onload) && (FALSE != $str_onload) && ('' != $str_onload))
{
    $str_onload = ' onload="' . $str_onload . '"';
}
else
{
    $str_onload = '';
}
?>
<body style="margin: 0px" scroll="<?php echo $this->GetVar('page_scroll'); ?>"<?php echo $str_class . $str_unload . $str_onload . $str_body_options; ?>>
