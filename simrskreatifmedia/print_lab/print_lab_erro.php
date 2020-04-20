<?php

error_reporting(E_ALL);
$old_error_handler = set_error_handler("scriptcase_error_handler");

function scriptcase_error_handler($err_no, $err_msg, $err_file, $err_line, $exibe)
{
    $errors_handled = array(
                            E_ERROR,
                            E_PARSE,
                            E_CORE_ERROR,
                            E_CORE_WARNING,
                            E_COMPILE_ERROR,
                            E_COMPILE_WARNING,
                            E_USER_ERROR,
                            E_USER_WARNING,
                            E_USER_NOTICE
                           );
    if (isset($_SESSION['scriptcase']['print_lab']['contr_erro']) && $_SESSION['scriptcase']['print_lab']['contr_erro'] == 'on')
    {
        $errors_handled[] = E_WARNING;
        $errors_handled[] = E_NOTICE;
    }
    if (in_array($err_no, $errors_handled))
    {
        $msg      = "";
        $tmp_desc = "";
        $bol_flag = TRUE;
        // ADO
        if (FALSE !== strpos($err_msg, "Invoke() failed") && isset($_SESSION['scriptcase']['sc_sql_ult_conexao']) && !empty($_SESSION['scriptcase']['sc_sql_ult_conexao']))
        {
            $tmp_desc = $_SESSION['scriptcase']['sc_sql_ult_conexao'];
        }
        $msg .= ("" != $tmp_desc) ? trim($tmp_desc) : trim($err_msg);
        // e-mail
        if (FALSE !== strpos($err_msg, "SSL: fatal protocol error"))
        {
            $bol_flag = FALSE;
        }
        // Application Roles
        if (FALSE !== strpos($err_msg, "The application role "))
        {
            $bol_flag = FALSE;
        }
        // DBF
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "Optional feature not implemented"))
        {
            $bol_flag = FALSE;
        }
        // Sqlserver
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "The command(s) completed successfully"))
        {
            $bol_flag = FALSE;
        }
        // InterBase
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "InterBase: conversion error from string") && isset($GLOBALS["NM_ERRO_IBASE"]) && 1 == $GLOBALS["NM_ERRO_IBASE"])
        {
            $bol_flag = FALSE;
        }
        // PostGreSQL
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "pg_fetch_array(): Unable to jump to row"))
        {
            $bol_flag = FALSE;
        }
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "Changed database context to "))
        {
            $bol_flag = FALSE;
        }
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "Creating default object from empty value"))
        {
            $bol_flag = FALSE;
        }
        // Arquivo
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "stat failed for"))
        {
            $bol_flag = FALSE;
        }
        // currency
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "currency type not supported by PHP"))
        {
            $bol_flag = FALSE;
        }
        // PHP4
        if (FALSE !== strpos($err_msg, "Assigning the return value of new by reference is deprecated"))
        {
            $bol_flag = FALSE;
        }
        if (FALSE !== strpos($err_msg, "var Deprecated Please use the"))
        {
            $bol_flag = FALSE;
        }
        if (FALSE !== strpos($err_msg, "var: Deprecated. Please use the"))
        {
            $bol_flag = FALSE;
        }
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "Only variable references should be returned by reference"))
        {
            $bol_flag = FALSE;
        }
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos(strtolower($err_msg), "unable to bind to server"))
        {
            $bol_flag = FALSE;
        }
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "Only variables should be assigned by reference"))
        {
            $bol_flag = FALSE;
        }
        // Diretorio
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "MkDir"))
        {
            $bol_flag = FALSE;
        }
        // Formulas PHP
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && (FALSE !== strpos($err_msg, "sc_proc_quebra_") || FALSE !== strpos($err_msg, "sc_proc_grid")))
        {
            $bol_flag = FALSE;
        }
        // Geral
        if (FALSE !== strpos($err_msg, "set_time_limit"))
        {
            $bol_flag = FALSE;
        }
        if (FALSE !== strpos(strtolower($err_msg), "the mysql extension is deprecated and will be removed in the future"))
        {
            $bol_flag = FALSE;
        }
        if (FALSE !== strpos(strtolower($err_msg), "driver doesn't support meta data"))
        {
            $bol_flag = FALSE;
        }
        if ($bol_flag && $exibe)
        {
            scriptcase_error_display($msg, $err_no);
        }
        $_SESSION['scriptcase']['erro_handler'] = $bol_flag;
        return;
    }
}

function scriptcase_error_display($err_msg, $err_no)
{
   $str_schema_all = $_SESSION['scriptcase']['erro']['str_schema'];
   $str_schema_dir = $_SESSION['scriptcase']['erro']['str_schema_dir'];
   $NM_arq_lang    = "../_lib/lang/" . $_SESSION['scriptcase']['erro']['str_lang'] . ".lang.php";
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
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
   $_SESSION['scriptcase']['charset']  = (isset($Nm_lang['Nm_charset']) && !empty($Nm_lang['Nm_charset'])) ? $Nm_lang['Nm_charset'] : "ISO-8859-1";
   ini_set('default_charset', $_SESSION['scriptcase']['charset']);
   foreach ($Nm_lang as $ind => $dados)
   {
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
      {
          $Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
 if (isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
 {
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
 }
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
<link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_dir ?>" /> 
</HEAD>
<BODY>
<TABLE class="scErrorTable" cellspacing="0" cellpadding="0" align="center">
 <TR>
  <TD class="scErrorTitle" align="left"><?php echo $Nm_lang['lang_errm_errt']; ?></TD>
 </TR>
 <TR>
  <TD class="scErrorMessage" align="center"><?php echo $err_msg; ?></TD>
 </TR>
</TABLE></BODY>
</HTML>
<?php
}

?>
