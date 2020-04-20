<?php
@session_start() ;
$_SESSION['scriptcase']['reportKasir']['sc_process_barr'] = true;
require_once('../reportKasir/index.php');
unset($_SESSION['scriptcase']['reportKasir']['sc_process_barr']);
$ExportCtrl = new reportKasir_export_control;
$ExportCtrl->Export_barr();

class reportKasir_export_control
{
   function Export_barr()
   {
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys    = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys    = str_replace("\\", '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo   = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys    = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      $str_path_web         = $_SERVER['PHP_SELF'];
      $str_path_web         = str_replace("\\", '/', $str_path_web);
      $str_path_web         = str_replace('//', '/', $str_path_web);
      $this->root           = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_link      = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link      = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_btn       = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css       = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php   = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_botoes    = $this->path_link . "_lib/img";
      $this->path_lang      = "../_lib/lang/";
      $this->path_prod      = $_SESSION['scriptcase']['reportKasir']['glo_nm_path_prod'];
      $this->path_imag_temp = $_SESSION['scriptcase']['reportKasir']['glo_nm_path_imag_temp'];
      $script_case_init     = $_REQUEST['script_case_init'];
      if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
      {
          $_SESSION['scriptcase']['str_lang'] = "id";
      }
      if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
      {
          $_SESSION['scriptcase']['str_conf_reg'] = "id_id";
      }
      $this->str_lang     = $_SESSION['scriptcase']['str_lang'];
      $this->str_conf_reg = $_SESSION['scriptcase']['str_conf_reg'];
      require_once($this->path_lang . $this->str_lang . ".lang.php");
      require_once($this->path_lang . "config_region.php");
      require_once($this->path_lang . "lang_config_region.php");
      require_once($this->path_lib_php . "/nm_gp_config_btn.php");
      if (!function_exists("NM_is_utf8"))
      {
          include_once("../_lib/lib/php/nm_utf8.php");
      }
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['reg_conf']['html_dir'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'])) ? " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
      $_SESSION['scriptcase']['reg_conf']['css_dir']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'])) ? $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
      $this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "sc_arafiq/sc_arafiq";
      require_once("../_lib/css/" . $this->str_schema_all . "_grid.php");
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      require_once($this->path_btn . $this->Str_btn_grid);
      $opc_export = (isset($_REQUEST['nmgp_opcao'])) ? $_REQUEST['nmgp_opcao'] : "";
      $opc_export = strtoupper(str_replace(array("doc_","_res"), array("",""), $opc_export));
      require_once($this->path_lib_php . "/sc_progress_bar.php");
      $pb = new scProgressBar();
      $pb->setRoot($this->root);
      $pb->setDir($this->path_imag_temp . "/");
      $pb->createProgressbarMd5();
      $pb->initialize();
      $pb->setProgressbarTitle($this->Nm_lang['lang_btns_expt'] . " " . $opc_export);
      $Btn_view = nmButtonOutput($this->arr_buttons, "bexportview", "viewClick()", "viewClick()", "idBtnView", "", "", "", "", "", "", $this->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
;
      $Btn_down = nmButtonOutput($this->arr_buttons, "bdownload", "downloadClick()", "downloadClick()", "idBtnDown", "", "", "", "", "", "", $this->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
;
      $Btn_exit = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
;
      $pb->setButtons(array(
          'view' => array(
                    'id'   => 'idBtnView',
                    'code' => $Btn_view,
                    ),
          'download' => array(
                    'id'   => 'idBtnDown',
                    'code' => $Btn_down,
                    ),
          'back' => array(
                    'id'   => 'idBtnBack',
                    'code' => $Btn_exit,
                    ),
      ));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Laporan Penerimaan Kasir :: Excel</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <META name="viewport" content="width=device-width, initial-scale=1"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" href="<?php echo $this->path_prod ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Str_btn_css ?>" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" />
  <script type="text/javascript" src="<?php echo $this->path_prod ?>/third/jquery/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo $this->path_prod ?>/third/jquery/js/jquery-ui.js"></script>
 <script>
  <?php echo $pb->getJavascript(); ?>
 </script>
</HEAD>
<BODY class="scExportPage">
 <?php echo $pb->getHtml(); ?>
<br />
<iframe style="width: 1px; height: 1px; border-width: 0;" src="index.php?<?php echo $pb->getIframeParams(); ?>">
</iframe>
<form name="Fview" method="get" action="" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="reportKasir_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($script_case_init); ?>"> 
<input type="hidden" name="nm_tit_doc" value="reportKasir"> 
<input type="hidden" name="nm_name_doc" value=""> 
</form>
<FORM name="F0" method=post action=""> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($script_case_init); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value=""> 
</FORM> 
</BODY>
</HTML>
 <script type="text/javascript">
 function viewClick() {
    if ($("#idBtnView").prop("disabled")) {
       return;
    }
    document.Fview.submit()
 }
 function downloadClick() {
    if ($("#idBtnDown").prop("disabled")) {
       return;
    }
    document.Fdown.submit()
 }
</script>
<?php
  }
}
