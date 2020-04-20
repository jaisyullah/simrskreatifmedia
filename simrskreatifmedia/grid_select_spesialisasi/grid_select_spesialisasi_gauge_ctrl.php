<?php
if (!isset($_GET['str_schema'])) {
    exit;
}
if (!function_exists("NM_is_utf8"))
{
    include_once("../_lib/lib/php/nm_utf8.php");
}
$STR_schema  = $_GET['str_schema'];
$STR_lang    = base64_decode($_GET['str_lang']);
$NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
 $Nm_lang = array();
 if (is_file($NM_arq_lang))
 {
     $Lixo = file($NM_arq_lang);
     foreach ($Lixo as $Cada_lin) 
     {
         if (strpos($Cada_lin, "array()") === false && (trim($Cada_lin) != "<?php")  && (trim($Cada_lin) != "?" . ">"))
         {
             eval (str_replace("\$this->", "\$", $Cada_lin));
         }
     }
 }
$str_file = base64_decode($_GET['pbfile']);
if ('http' == substr($str_file, 0, 4))
{
    exit;
}
$arr_data = @file($str_file);
if ($arr_data && 5 <= sizeof($arr_data))
{
    $bol_load = TRUE;
    $str_type = trim($arr_data[0]);
    $str_js   = trim($arr_data[1]);
    $str_img  = trim($arr_data[2]);
    $int_size = trim($arr_data[3]);
    $str_data = trim($arr_data[sizeof($arr_data) - 1]);
    $int_step = '';
    if ('off' == $str_data)
    {
        $bol_end = TRUE;
    }
    elseif ('HDOC_#NM#_' == substr($str_data, 0, 10))
    {
        $bol_end    = FALSE;
        $arr_partes = explode('_#NM#_', $str_data);
        if (3 == sizeof($arr_partes))
        {
            $str_msg  = ('F' == $arr_partes[1]) ? $Nm_lang['lang_pdff_frmt_page']  : $Nm_lang['lang_pdff_wrtg'];
            $str_msg .= $arr_partes[2];
            $int_step = ('F' == $arr_partes[1]) ? floor($int_size * 0.9) : floor($int_size * 0.95);
        }
        else
        {
            $bol_load = FALSE;
        }
    }
    else
    {
        $bol_end    = FALSE;
        $arr_partes = explode('_#NM#_', $str_data);
        if (2 == sizeof($arr_partes))
        {
            $int_step = $arr_partes[0];
            $str_msg  = $arr_partes[1];
        }
        else
        {
            $bol_load = FALSE;
        }
    }
    echo $int_size . '!#!' . $int_step . '!#!' . ($bol_end ? '1' : '0') . '!#!' . ($bol_end ? $Nm_lang['lang_pdff_fnsh'] : $str_msg);
}
else
{
    $bol_end  = FALSE;
    $bol_load = FALSE;
}
if ($bol_end)
{
    @unlink($str_file);
}
?>
