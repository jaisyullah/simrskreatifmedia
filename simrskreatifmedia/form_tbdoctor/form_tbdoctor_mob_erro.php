<?php

error_reporting(E_ALL);
$old_error_handler = set_error_handler("form_tbdoctor_mob_scriptcase_error_handler");

function form_tbdoctor_mob_scriptcase_error_handler($err_no, $err_msg, $err_file, $err_line, $exibe)
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
    if (isset($_SESSION['scriptcase']['form_tbdoctor_mob']['contr_erro']) && $_SESSION['scriptcase']['form_tbdoctor_mob']['contr_erro'] == 'on')
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
        if (FALSE !== strpos($err_msg, "Invoke() failed") && "" != $_SESSION['scriptcase']['sc_sql_ult_comando'])
        {
            $msg .= "<BR>";
            $msg .= "<BR>";
            $msg .= "<B>SQL</B>: ";
            $msg .= $_SESSION['scriptcase']['sc_sql_ult_comando'];
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
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "Only variables should be assigned by reference"))
        {
            $bol_flag = FALSE;
        }
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos(strtolower($err_msg), "unable to bind to server"))
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
        // e-mail
        if (FALSE !== strpos($err_msg, "SSL: fatal protocol error"))
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
        $_SESSION['scriptcase']['erro_handler'] = $bol_flag;
        if ($bol_flag && $exibe)
        {
            global $inicial_form_tbdoctor_mob;
            $inicial_form_tbdoctor_mob->contr_form_tbdoctor_mob->Apl_com_erro = true;
            if ($inicial_form_tbdoctor_mob->contr_form_tbdoctor_mob->NM_ajax_flag)
            {
                $inicial_form_tbdoctor_mob->contr_form_tbdoctor_mob->NM_ajax_info['errList']['geral_form_tbdoctor_mob'][] = $msg;
                return;
            }
            form_tbdoctor_mob_scriptcase_error_display($msg, $err_no);
        }
        return;
    }
}

function form_tbdoctor_mob_scriptcase_error_display($err_msg, $err_no)
{
    if (!function_exists("NM_is_utf8"))
    {
        include_once("../_lib/lib/php/nm_utf8.php");
    }
    $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "id";
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
    $_SESSION['scriptcase']['charset'] = (isset($Nm_lang['Nm_charset']) && !empty($Nm_lang['Nm_charset'])) ? $Nm_lang['Nm_charset'] : "ISO-8859-1";
    ini_set('default_charset', $_SESSION['scriptcase']['charset']);
    foreach ($Nm_lang as $ind => $dados)
    {
       if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
       {
           $Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
    }
    global $erro_ja_exibido;
    if (!isset($erro_ja_exibido))
    {
        $erro_ja_exibido = false;
    }

    ob_start();

    if (!$erro_ja_exibido)
    {
        $erro_ja_exibido = true;
        $ErrorMsgTitle   = "" . $Nm_lang['lang_errm_errt'] . "";
        $sTitErr         = (!isset($ErrorMsgTitle) || '' == $ErrorMsgTitle) ? $Nm_lang['lang_errm_errt'] : $ErrorMsgTitle;
        $sErrorIcon      = (isset($_SESSION['scriptcase']['error_icon']['form_tbdoctor_mob'])  && '' != $_SESSION['scriptcase']['error_icon']['form_tbdoctor_mob'])  ? $_SESSION['scriptcase']['error_icon']['form_tbdoctor_mob']  : "";
        $sCloseIcon      = (isset($_SESSION['scriptcase']['error_close']['form_tbdoctor_mob']) && '' != $_SESSION['scriptcase']['error_close']['form_tbdoctor_mob']) ? $_SESSION['scriptcase']['error_close']['form_tbdoctor_mob'] : "<td><input class=\"scButton_default\" type=\"button\" onClick=\"document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false\" value=\"X\" /></td>";

        $bSpanTitle      = (isset($_SESSION['scriptcase']['error_span_title']['form_tbdoctor_mob']) && '' != $_SESSION['scriptcase']['error_span_title']['form_tbdoctor_mob']) ? $_SESSION['scriptcase']['error_span_title']['form_tbdoctor_mob'] : false;
        $sIconTitle      = (isset($_SESSION['scriptcase']['error_icon_title']['form_tbdoctor_mob']) && '' != $_SESSION['scriptcase']['error_icon_title']['form_tbdoctor_mob']) ? $_SESSION['scriptcase']['error_icon_title']['form_tbdoctor_mob'] : '';
?>
<script type="text/javascript">
 var iFixedErrorSqlId = 1;
 function scAjaxFixedErrorSql(sErrorMsg)
 {
  var iTmpPos = sErrorMsg.indexOf("{SC_DB_ERROR_INI}"),
      sTmpId;
  while (-1 < iTmpPos)
  {
   sTmpId    = "sc_id_fixed_error_sql_" + iFixedErrorSqlId;
   sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><span style=\"text-decoration: underline; cursor: pointer;\" onClick=\"document.getElementById('" + sTmpId + "').style.display = ''; scCenterElement(document.getElementById('" + sTmpId + "'))\">" + sErrorMsg.substr(iTmpPos + 17);
   iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_MID}");
   sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span><table class=\"scFormErrorTable scFormToastTable\" id=\"" + sTmpId + "\" style=\"display: none; position: absolute\"><tr><td>" + sErrorMsg.substr(iTmpPos + 17);
   iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_CLS}");
   sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><br /><span style=\"cursor: pointer;\" onClick=\"document.getElementById('" + sTmpId + "').style.display = 'none';\">" + sErrorMsg.substr(iTmpPos + 17);
   iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_END}");
   sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span></td></tr></table>" + sErrorMsg.substr(iTmpPos + 17);
   iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_INI}");
   iFixedErrorSqlId++;
  }
  return sErrorMsg;
 }
$(function() {
    scAjaxShowErrorDisplay_toast("table", scAjaxFixedErrorSql("<?php echo str_replace(array('"', "\r", "\n"), array('\"', '', ''), $err_msg); ?>"));
});
</script>
<?php
    }
    else
    {
?>
<script type="text/javascript">
$("#swal2-content").html($("#swal2-content").html() + "<br /><?php echo $err_msg; ?>");
</script>
<?php
    }

    $_SESSION['scriptcase']['form_tbdoctor']['error_buffer'] .= ob_get_flush();
}

?>
