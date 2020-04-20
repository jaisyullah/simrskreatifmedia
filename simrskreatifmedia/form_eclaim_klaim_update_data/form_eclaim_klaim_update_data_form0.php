<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("Update Data Klaim"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php
header("X-XSS-Protection: 1; mode=block");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_tgl_masuk button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_tgl_pulang button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_eclaim_klaim_update_data/form_eclaim_klaim_update_data_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_eclaim_klaim_update_data_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
<?php

include_once('form_eclaim_klaim_update_data_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_eclaim_klaim_update_data_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_eclaim_klaim_update_data'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_eclaim_klaim_update_data'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""; } else { echo "Update Data Klaim"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nomor_sep']))
    {
        $this->nm_new_label['nomor_sep'] = "No. SEP";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nomor_sep = $this->nomor_sep;
   $sStyleHidden_nomor_sep = '';
   if (isset($this->nmgp_cmp_hidden['nomor_sep']) && $this->nmgp_cmp_hidden['nomor_sep'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nomor_sep']);
       $sStyleHidden_nomor_sep = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nomor_sep = 'display: none;';
   $sStyleReadInp_nomor_sep = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nomor_sep']) && $this->nmgp_cmp_readonly['nomor_sep'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nomor_sep']);
       $sStyleReadLab_nomor_sep = '';
       $sStyleReadInp_nomor_sep = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nomor_sep']) && $this->nmgp_cmp_hidden['nomor_sep'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nomor_sep" value="<?php echo $this->form_encode_input($nomor_sep) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nomor_sep_label" id="hidden_field_label_nomor_sep" style="<?php echo $sStyleHidden_nomor_sep; ?>"><span id="id_label_nomor_sep"><?php echo $this->nm_new_label['nomor_sep']; ?></span></TD>
    <TD class="scFormDataOdd css_nomor_sep_line" id="hidden_field_data_nomor_sep" style="<?php echo $sStyleHidden_nomor_sep; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nomor_sep"]) &&  $this->nmgp_cmp_readonly["nomor_sep"] == "on") { 

 ?>
<input type="hidden" name="nomor_sep" value="<?php echo $this->form_encode_input($nomor_sep) . "\">" . $nomor_sep . ""; ?>
<?php } else { ?>
<span id="id_read_on_nomor_sep" class="sc-ui-readonly-nomor_sep css_nomor_sep_line" style="<?php echo $sStyleReadLab_nomor_sep; ?>"><?php echo $this->nomor_sep; ?></span><span id="id_read_off_nomor_sep" class="css_read_off_nomor_sep" style="white-space: nowrap;<?php echo $sStyleReadInp_nomor_sep; ?>">
 <input class="sc-js-input scFormObjectOdd css_nomor_sep_obj" style="" id="id_sc_field_nomor_sep" type=text name="nomor_sep" value="<?php echo $this->form_encode_input($nomor_sep) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['nomor_kartu']))
    {
        $this->nm_new_label['nomor_kartu'] = "No. Kartu";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nomor_kartu = $this->nomor_kartu;
   $sStyleHidden_nomor_kartu = '';
   if (isset($this->nmgp_cmp_hidden['nomor_kartu']) && $this->nmgp_cmp_hidden['nomor_kartu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nomor_kartu']);
       $sStyleHidden_nomor_kartu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nomor_kartu = 'display: none;';
   $sStyleReadInp_nomor_kartu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nomor_kartu']) && $this->nmgp_cmp_readonly['nomor_kartu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nomor_kartu']);
       $sStyleReadLab_nomor_kartu = '';
       $sStyleReadInp_nomor_kartu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nomor_kartu']) && $this->nmgp_cmp_hidden['nomor_kartu'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nomor_kartu" value="<?php echo $this->form_encode_input($nomor_kartu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nomor_kartu_label" id="hidden_field_label_nomor_kartu" style="<?php echo $sStyleHidden_nomor_kartu; ?>"><span id="id_label_nomor_kartu"><?php echo $this->nm_new_label['nomor_kartu']; ?></span></TD>
    <TD class="scFormDataOdd css_nomor_kartu_line" id="hidden_field_data_nomor_kartu" style="<?php echo $sStyleHidden_nomor_kartu; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nomor_kartu"]) &&  $this->nmgp_cmp_readonly["nomor_kartu"] == "on") { 

 ?>
<input type="hidden" name="nomor_kartu" value="<?php echo $this->form_encode_input($nomor_kartu) . "\">" . $nomor_kartu . ""; ?>
<?php } else { ?>
<span id="id_read_on_nomor_kartu" class="sc-ui-readonly-nomor_kartu css_nomor_kartu_line" style="<?php echo $sStyleReadLab_nomor_kartu; ?>"><?php echo $this->nomor_kartu; ?></span><span id="id_read_off_nomor_kartu" class="css_read_off_nomor_kartu" style="white-space: nowrap;<?php echo $sStyleReadInp_nomor_kartu; ?>">
 <input class="sc-js-input scFormObjectOdd css_nomor_kartu_obj" style="" id="id_sc_field_nomor_kartu" type=text name="nomor_kartu" value="<?php echo $this->form_encode_input($nomor_kartu) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tgl_masuk']))
    {
        $this->nm_new_label['tgl_masuk'] = "Tanggal Masuk";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_tgl_masuk = $this->tgl_masuk;
   if (strlen($this->tgl_masuk_hora) > 8 ) {$this->tgl_masuk_hora = substr($this->tgl_masuk_hora, 0, 8);}
   $this->tgl_masuk .= ' ' . $this->tgl_masuk_hora;
   $tgl_masuk = $this->tgl_masuk;
   $sStyleHidden_tgl_masuk = '';
   if (isset($this->nmgp_cmp_hidden['tgl_masuk']) && $this->nmgp_cmp_hidden['tgl_masuk'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tgl_masuk']);
       $sStyleHidden_tgl_masuk = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tgl_masuk = 'display: none;';
   $sStyleReadInp_tgl_masuk = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tgl_masuk']) && $this->nmgp_cmp_readonly['tgl_masuk'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tgl_masuk']);
       $sStyleReadLab_tgl_masuk = '';
       $sStyleReadInp_tgl_masuk = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tgl_masuk']) && $this->nmgp_cmp_hidden['tgl_masuk'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tgl_masuk" value="<?php echo $this->form_encode_input($tgl_masuk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tgl_masuk_label" id="hidden_field_label_tgl_masuk" style="<?php echo $sStyleHidden_tgl_masuk; ?>"><span id="id_label_tgl_masuk"><?php echo $this->nm_new_label['tgl_masuk']; ?></span></TD>
    <TD class="scFormDataOdd css_tgl_masuk_line" id="hidden_field_data_tgl_masuk" style="<?php echo $sStyleHidden_tgl_masuk; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tgl_masuk"]) &&  $this->nmgp_cmp_readonly["tgl_masuk"] == "on") { 

 ?>
<input type="hidden" name="tgl_masuk" value="<?php echo $this->form_encode_input($tgl_masuk) . "\">" . $tgl_masuk . ""; ?>
<?php } else { ?>
<span id="id_read_on_tgl_masuk" class="sc-ui-readonly-tgl_masuk css_tgl_masuk_line" style="<?php echo $sStyleReadLab_tgl_masuk; ?>"><?php echo $tgl_masuk; ?></span><span id="id_read_off_tgl_masuk" class="css_read_off_tgl_masuk" style="white-space: nowrap;<?php echo $sStyleReadInp_tgl_masuk; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_tgl_masuk_obj" style="" id="id_sc_field_tgl_masuk" type=text name="tgl_masuk" value="<?php echo $this->form_encode_input($tgl_masuk) ?>"
 size=20 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['tgl_masuk']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['tgl_masuk']['date_format']; ?>', timeSep: '<?php echo $this->field_config['tgl_masuk']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['tgl_masuk']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</TD>
   <?php }?>
<?php
   $this->tgl_masuk = $old_dt_tgl_masuk;
?>

   <?php
    if (!isset($this->nm_new_label['tgl_pulang']))
    {
        $this->nm_new_label['tgl_pulang'] = "Tanggal Pulang";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_tgl_pulang = $this->tgl_pulang;
   if (strlen($this->tgl_pulang_hora) > 8 ) {$this->tgl_pulang_hora = substr($this->tgl_pulang_hora, 0, 8);}
   $this->tgl_pulang .= ' ' . $this->tgl_pulang_hora;
   $tgl_pulang = $this->tgl_pulang;
   $sStyleHidden_tgl_pulang = '';
   if (isset($this->nmgp_cmp_hidden['tgl_pulang']) && $this->nmgp_cmp_hidden['tgl_pulang'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tgl_pulang']);
       $sStyleHidden_tgl_pulang = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tgl_pulang = 'display: none;';
   $sStyleReadInp_tgl_pulang = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tgl_pulang']) && $this->nmgp_cmp_readonly['tgl_pulang'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tgl_pulang']);
       $sStyleReadLab_tgl_pulang = '';
       $sStyleReadInp_tgl_pulang = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tgl_pulang']) && $this->nmgp_cmp_hidden['tgl_pulang'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tgl_pulang" value="<?php echo $this->form_encode_input($tgl_pulang) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tgl_pulang_label" id="hidden_field_label_tgl_pulang" style="<?php echo $sStyleHidden_tgl_pulang; ?>"><span id="id_label_tgl_pulang"><?php echo $this->nm_new_label['tgl_pulang']; ?></span></TD>
    <TD class="scFormDataOdd css_tgl_pulang_line" id="hidden_field_data_tgl_pulang" style="<?php echo $sStyleHidden_tgl_pulang; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tgl_pulang"]) &&  $this->nmgp_cmp_readonly["tgl_pulang"] == "on") { 

 ?>
<input type="hidden" name="tgl_pulang" value="<?php echo $this->form_encode_input($tgl_pulang) . "\">" . $tgl_pulang . ""; ?>
<?php } else { ?>
<span id="id_read_on_tgl_pulang" class="sc-ui-readonly-tgl_pulang css_tgl_pulang_line" style="<?php echo $sStyleReadLab_tgl_pulang; ?>"><?php echo $tgl_pulang; ?></span><span id="id_read_off_tgl_pulang" class="css_read_off_tgl_pulang" style="white-space: nowrap;<?php echo $sStyleReadInp_tgl_pulang; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_tgl_pulang_obj" style="" id="id_sc_field_tgl_pulang" type=text name="tgl_pulang" value="<?php echo $this->form_encode_input($tgl_pulang) ?>"
 size=20 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['tgl_pulang']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['tgl_pulang']['date_format']; ?>', timeSep: '<?php echo $this->field_config['tgl_pulang']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['tgl_pulang']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</TD>
   <?php }?>
<?php
   $this->tgl_pulang = $old_dt_tgl_pulang;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['jenis_rawat']))
    {
        $this->nm_new_label['jenis_rawat'] = "Jenis Perawatan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jenis_rawat = $this->jenis_rawat;
   $sStyleHidden_jenis_rawat = '';
   if (isset($this->nmgp_cmp_hidden['jenis_rawat']) && $this->nmgp_cmp_hidden['jenis_rawat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jenis_rawat']);
       $sStyleHidden_jenis_rawat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jenis_rawat = 'display: none;';
   $sStyleReadInp_jenis_rawat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jenis_rawat']) && $this->nmgp_cmp_readonly['jenis_rawat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jenis_rawat']);
       $sStyleReadLab_jenis_rawat = '';
       $sStyleReadInp_jenis_rawat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jenis_rawat']) && $this->nmgp_cmp_hidden['jenis_rawat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jenis_rawat" value="<?php echo $this->form_encode_input($jenis_rawat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_jenis_rawat_label" id="hidden_field_label_jenis_rawat" style="<?php echo $sStyleHidden_jenis_rawat; ?>"><span id="id_label_jenis_rawat"><?php echo $this->nm_new_label['jenis_rawat']; ?></span></TD>
    <TD class="scFormDataOdd css_jenis_rawat_line" id="hidden_field_data_jenis_rawat" style="<?php echo $sStyleHidden_jenis_rawat; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jenis_rawat"]) &&  $this->nmgp_cmp_readonly["jenis_rawat"] == "on") { 

 ?>
<input type="hidden" name="jenis_rawat" value="<?php echo $this->form_encode_input($jenis_rawat) . "\">" . $jenis_rawat . ""; ?>
<?php } else { ?>
<span id="id_read_on_jenis_rawat" class="sc-ui-readonly-jenis_rawat css_jenis_rawat_line" style="<?php echo $sStyleReadLab_jenis_rawat; ?>"><?php echo $this->jenis_rawat; ?></span><span id="id_read_off_jenis_rawat" class="css_read_off_jenis_rawat" style="white-space: nowrap;<?php echo $sStyleReadInp_jenis_rawat; ?>">
 <input class="sc-js-input scFormObjectOdd css_jenis_rawat_obj" style="" id="id_sc_field_jenis_rawat" type=text name="jenis_rawat" value="<?php echo $this->form_encode_input($jenis_rawat) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['kelas_rawat']))
    {
        $this->nm_new_label['kelas_rawat'] = "Kelas Perawatan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kelas_rawat = $this->kelas_rawat;
   $sStyleHidden_kelas_rawat = '';
   if (isset($this->nmgp_cmp_hidden['kelas_rawat']) && $this->nmgp_cmp_hidden['kelas_rawat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kelas_rawat']);
       $sStyleHidden_kelas_rawat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kelas_rawat = 'display: none;';
   $sStyleReadInp_kelas_rawat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kelas_rawat']) && $this->nmgp_cmp_readonly['kelas_rawat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kelas_rawat']);
       $sStyleReadLab_kelas_rawat = '';
       $sStyleReadInp_kelas_rawat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kelas_rawat']) && $this->nmgp_cmp_hidden['kelas_rawat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kelas_rawat" value="<?php echo $this->form_encode_input($kelas_rawat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kelas_rawat_label" id="hidden_field_label_kelas_rawat" style="<?php echo $sStyleHidden_kelas_rawat; ?>"><span id="id_label_kelas_rawat"><?php echo $this->nm_new_label['kelas_rawat']; ?></span></TD>
    <TD class="scFormDataOdd css_kelas_rawat_line" id="hidden_field_data_kelas_rawat" style="<?php echo $sStyleHidden_kelas_rawat; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kelas_rawat"]) &&  $this->nmgp_cmp_readonly["kelas_rawat"] == "on") { 

 ?>
<input type="hidden" name="kelas_rawat" value="<?php echo $this->form_encode_input($kelas_rawat) . "\">" . $kelas_rawat . ""; ?>
<?php } else { ?>
<span id="id_read_on_kelas_rawat" class="sc-ui-readonly-kelas_rawat css_kelas_rawat_line" style="<?php echo $sStyleReadLab_kelas_rawat; ?>"><?php echo $this->kelas_rawat; ?></span><span id="id_read_off_kelas_rawat" class="css_read_off_kelas_rawat" style="white-space: nowrap;<?php echo $sStyleReadInp_kelas_rawat; ?>">
 <input class="sc-js-input scFormObjectOdd css_kelas_rawat_obj" style="" id="id_sc_field_kelas_rawat" type=text name="kelas_rawat" value="<?php echo $this->form_encode_input($kelas_rawat) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['adl_sub_acute']))
    {
        $this->nm_new_label['adl_sub_acute'] = "ADL Sub Acute";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $adl_sub_acute = $this->adl_sub_acute;
   $sStyleHidden_adl_sub_acute = '';
   if (isset($this->nmgp_cmp_hidden['adl_sub_acute']) && $this->nmgp_cmp_hidden['adl_sub_acute'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['adl_sub_acute']);
       $sStyleHidden_adl_sub_acute = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_adl_sub_acute = 'display: none;';
   $sStyleReadInp_adl_sub_acute = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['adl_sub_acute']) && $this->nmgp_cmp_readonly['adl_sub_acute'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['adl_sub_acute']);
       $sStyleReadLab_adl_sub_acute = '';
       $sStyleReadInp_adl_sub_acute = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['adl_sub_acute']) && $this->nmgp_cmp_hidden['adl_sub_acute'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="adl_sub_acute" value="<?php echo $this->form_encode_input($adl_sub_acute) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_adl_sub_acute_label" id="hidden_field_label_adl_sub_acute" style="<?php echo $sStyleHidden_adl_sub_acute; ?>"><span id="id_label_adl_sub_acute"><?php echo $this->nm_new_label['adl_sub_acute']; ?></span></TD>
    <TD class="scFormDataOdd css_adl_sub_acute_line" id="hidden_field_data_adl_sub_acute" style="<?php echo $sStyleHidden_adl_sub_acute; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["adl_sub_acute"]) &&  $this->nmgp_cmp_readonly["adl_sub_acute"] == "on") { 

 ?>
<input type="hidden" name="adl_sub_acute" value="<?php echo $this->form_encode_input($adl_sub_acute) . "\">" . $adl_sub_acute . ""; ?>
<?php } else { ?>
<span id="id_read_on_adl_sub_acute" class="sc-ui-readonly-adl_sub_acute css_adl_sub_acute_line" style="<?php echo $sStyleReadLab_adl_sub_acute; ?>"><?php echo $this->adl_sub_acute; ?></span><span id="id_read_off_adl_sub_acute" class="css_read_off_adl_sub_acute" style="white-space: nowrap;<?php echo $sStyleReadInp_adl_sub_acute; ?>">
 <input class="sc-js-input scFormObjectOdd css_adl_sub_acute_obj" style="" id="id_sc_field_adl_sub_acute" type=text name="adl_sub_acute" value="<?php echo $this->form_encode_input($adl_sub_acute) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['adl_chronic']))
    {
        $this->nm_new_label['adl_chronic'] = "ADL Chronic";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $adl_chronic = $this->adl_chronic;
   $sStyleHidden_adl_chronic = '';
   if (isset($this->nmgp_cmp_hidden['adl_chronic']) && $this->nmgp_cmp_hidden['adl_chronic'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['adl_chronic']);
       $sStyleHidden_adl_chronic = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_adl_chronic = 'display: none;';
   $sStyleReadInp_adl_chronic = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['adl_chronic']) && $this->nmgp_cmp_readonly['adl_chronic'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['adl_chronic']);
       $sStyleReadLab_adl_chronic = '';
       $sStyleReadInp_adl_chronic = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['adl_chronic']) && $this->nmgp_cmp_hidden['adl_chronic'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="adl_chronic" value="<?php echo $this->form_encode_input($adl_chronic) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_adl_chronic_label" id="hidden_field_label_adl_chronic" style="<?php echo $sStyleHidden_adl_chronic; ?>"><span id="id_label_adl_chronic"><?php echo $this->nm_new_label['adl_chronic']; ?></span></TD>
    <TD class="scFormDataOdd css_adl_chronic_line" id="hidden_field_data_adl_chronic" style="<?php echo $sStyleHidden_adl_chronic; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["adl_chronic"]) &&  $this->nmgp_cmp_readonly["adl_chronic"] == "on") { 

 ?>
<input type="hidden" name="adl_chronic" value="<?php echo $this->form_encode_input($adl_chronic) . "\">" . $adl_chronic . ""; ?>
<?php } else { ?>
<span id="id_read_on_adl_chronic" class="sc-ui-readonly-adl_chronic css_adl_chronic_line" style="<?php echo $sStyleReadLab_adl_chronic; ?>"><?php echo $this->adl_chronic; ?></span><span id="id_read_off_adl_chronic" class="css_read_off_adl_chronic" style="white-space: nowrap;<?php echo $sStyleReadInp_adl_chronic; ?>">
 <input class="sc-js-input scFormObjectOdd css_adl_chronic_obj" style="" id="id_sc_field_adl_chronic" type=text name="adl_chronic" value="<?php echo $this->form_encode_input($adl_chronic) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['icu_indikator']))
    {
        $this->nm_new_label['icu_indikator'] = "ICU Indikator";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $icu_indikator = $this->icu_indikator;
   $sStyleHidden_icu_indikator = '';
   if (isset($this->nmgp_cmp_hidden['icu_indikator']) && $this->nmgp_cmp_hidden['icu_indikator'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['icu_indikator']);
       $sStyleHidden_icu_indikator = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_icu_indikator = 'display: none;';
   $sStyleReadInp_icu_indikator = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['icu_indikator']) && $this->nmgp_cmp_readonly['icu_indikator'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['icu_indikator']);
       $sStyleReadLab_icu_indikator = '';
       $sStyleReadInp_icu_indikator = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['icu_indikator']) && $this->nmgp_cmp_hidden['icu_indikator'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="icu_indikator" value="<?php echo $this->form_encode_input($icu_indikator) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_icu_indikator_label" id="hidden_field_label_icu_indikator" style="<?php echo $sStyleHidden_icu_indikator; ?>"><span id="id_label_icu_indikator"><?php echo $this->nm_new_label['icu_indikator']; ?></span></TD>
    <TD class="scFormDataOdd css_icu_indikator_line" id="hidden_field_data_icu_indikator" style="<?php echo $sStyleHidden_icu_indikator; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["icu_indikator"]) &&  $this->nmgp_cmp_readonly["icu_indikator"] == "on") { 

 ?>
<input type="hidden" name="icu_indikator" value="<?php echo $this->form_encode_input($icu_indikator) . "\">" . $icu_indikator . ""; ?>
<?php } else { ?>
<span id="id_read_on_icu_indikator" class="sc-ui-readonly-icu_indikator css_icu_indikator_line" style="<?php echo $sStyleReadLab_icu_indikator; ?>"><?php echo $this->icu_indikator; ?></span><span id="id_read_off_icu_indikator" class="css_read_off_icu_indikator" style="white-space: nowrap;<?php echo $sStyleReadInp_icu_indikator; ?>">
 <input class="sc-js-input scFormObjectOdd css_icu_indikator_obj" style="" id="id_sc_field_icu_indikator" type=text name="icu_indikator" value="<?php echo $this->form_encode_input($icu_indikator) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['icu_los']))
    {
        $this->nm_new_label['icu_los'] = "ICU Los";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $icu_los = $this->icu_los;
   $sStyleHidden_icu_los = '';
   if (isset($this->nmgp_cmp_hidden['icu_los']) && $this->nmgp_cmp_hidden['icu_los'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['icu_los']);
       $sStyleHidden_icu_los = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_icu_los = 'display: none;';
   $sStyleReadInp_icu_los = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['icu_los']) && $this->nmgp_cmp_readonly['icu_los'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['icu_los']);
       $sStyleReadLab_icu_los = '';
       $sStyleReadInp_icu_los = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['icu_los']) && $this->nmgp_cmp_hidden['icu_los'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="icu_los" value="<?php echo $this->form_encode_input($icu_los) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_icu_los_label" id="hidden_field_label_icu_los" style="<?php echo $sStyleHidden_icu_los; ?>"><span id="id_label_icu_los"><?php echo $this->nm_new_label['icu_los']; ?></span></TD>
    <TD class="scFormDataOdd css_icu_los_line" id="hidden_field_data_icu_los" style="<?php echo $sStyleHidden_icu_los; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["icu_los"]) &&  $this->nmgp_cmp_readonly["icu_los"] == "on") { 

 ?>
<input type="hidden" name="icu_los" value="<?php echo $this->form_encode_input($icu_los) . "\">" . $icu_los . ""; ?>
<?php } else { ?>
<span id="id_read_on_icu_los" class="sc-ui-readonly-icu_los css_icu_los_line" style="<?php echo $sStyleReadLab_icu_los; ?>"><?php echo $this->icu_los; ?></span><span id="id_read_off_icu_los" class="css_read_off_icu_los" style="white-space: nowrap;<?php echo $sStyleReadInp_icu_los; ?>">
 <input class="sc-js-input scFormObjectOdd css_icu_los_obj" style="" id="id_sc_field_icu_los" type=text name="icu_los" value="<?php echo $this->form_encode_input($icu_los) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ventilator_hour']))
    {
        $this->nm_new_label['ventilator_hour'] = "Ventilator Hour";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ventilator_hour = $this->ventilator_hour;
   $sStyleHidden_ventilator_hour = '';
   if (isset($this->nmgp_cmp_hidden['ventilator_hour']) && $this->nmgp_cmp_hidden['ventilator_hour'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ventilator_hour']);
       $sStyleHidden_ventilator_hour = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ventilator_hour = 'display: none;';
   $sStyleReadInp_ventilator_hour = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ventilator_hour']) && $this->nmgp_cmp_readonly['ventilator_hour'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ventilator_hour']);
       $sStyleReadLab_ventilator_hour = '';
       $sStyleReadInp_ventilator_hour = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ventilator_hour']) && $this->nmgp_cmp_hidden['ventilator_hour'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ventilator_hour" value="<?php echo $this->form_encode_input($ventilator_hour) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ventilator_hour_label" id="hidden_field_label_ventilator_hour" style="<?php echo $sStyleHidden_ventilator_hour; ?>"><span id="id_label_ventilator_hour"><?php echo $this->nm_new_label['ventilator_hour']; ?></span></TD>
    <TD class="scFormDataOdd css_ventilator_hour_line" id="hidden_field_data_ventilator_hour" style="<?php echo $sStyleHidden_ventilator_hour; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ventilator_hour"]) &&  $this->nmgp_cmp_readonly["ventilator_hour"] == "on") { 

 ?>
<input type="hidden" name="ventilator_hour" value="<?php echo $this->form_encode_input($ventilator_hour) . "\">" . $ventilator_hour . ""; ?>
<?php } else { ?>
<span id="id_read_on_ventilator_hour" class="sc-ui-readonly-ventilator_hour css_ventilator_hour_line" style="<?php echo $sStyleReadLab_ventilator_hour; ?>"><?php echo $this->ventilator_hour; ?></span><span id="id_read_off_ventilator_hour" class="css_read_off_ventilator_hour" style="white-space: nowrap;<?php echo $sStyleReadInp_ventilator_hour; ?>">
 <input class="sc-js-input scFormObjectOdd css_ventilator_hour_obj" style="" id="id_sc_field_ventilator_hour" type=text name="ventilator_hour" value="<?php echo $this->form_encode_input($ventilator_hour) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['upgrade_class_ind']))
    {
        $this->nm_new_label['upgrade_class_ind'] = "Upgrade Class Ind";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $upgrade_class_ind = $this->upgrade_class_ind;
   $sStyleHidden_upgrade_class_ind = '';
   if (isset($this->nmgp_cmp_hidden['upgrade_class_ind']) && $this->nmgp_cmp_hidden['upgrade_class_ind'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['upgrade_class_ind']);
       $sStyleHidden_upgrade_class_ind = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_upgrade_class_ind = 'display: none;';
   $sStyleReadInp_upgrade_class_ind = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['upgrade_class_ind']) && $this->nmgp_cmp_readonly['upgrade_class_ind'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['upgrade_class_ind']);
       $sStyleReadLab_upgrade_class_ind = '';
       $sStyleReadInp_upgrade_class_ind = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['upgrade_class_ind']) && $this->nmgp_cmp_hidden['upgrade_class_ind'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="upgrade_class_ind" value="<?php echo $this->form_encode_input($upgrade_class_ind) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_upgrade_class_ind_label" id="hidden_field_label_upgrade_class_ind" style="<?php echo $sStyleHidden_upgrade_class_ind; ?>"><span id="id_label_upgrade_class_ind"><?php echo $this->nm_new_label['upgrade_class_ind']; ?></span></TD>
    <TD class="scFormDataOdd css_upgrade_class_ind_line" id="hidden_field_data_upgrade_class_ind" style="<?php echo $sStyleHidden_upgrade_class_ind; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["upgrade_class_ind"]) &&  $this->nmgp_cmp_readonly["upgrade_class_ind"] == "on") { 

 ?>
<input type="hidden" name="upgrade_class_ind" value="<?php echo $this->form_encode_input($upgrade_class_ind) . "\">" . $upgrade_class_ind . ""; ?>
<?php } else { ?>
<span id="id_read_on_upgrade_class_ind" class="sc-ui-readonly-upgrade_class_ind css_upgrade_class_ind_line" style="<?php echo $sStyleReadLab_upgrade_class_ind; ?>"><?php echo $this->upgrade_class_ind; ?></span><span id="id_read_off_upgrade_class_ind" class="css_read_off_upgrade_class_ind" style="white-space: nowrap;<?php echo $sStyleReadInp_upgrade_class_ind; ?>">
 <input class="sc-js-input scFormObjectOdd css_upgrade_class_ind_obj" style="" id="id_sc_field_upgrade_class_ind" type=text name="upgrade_class_ind" value="<?php echo $this->form_encode_input($upgrade_class_ind) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['upgrade_class_class']))
    {
        $this->nm_new_label['upgrade_class_class'] = "Upgrade Class Class";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $upgrade_class_class = $this->upgrade_class_class;
   $sStyleHidden_upgrade_class_class = '';
   if (isset($this->nmgp_cmp_hidden['upgrade_class_class']) && $this->nmgp_cmp_hidden['upgrade_class_class'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['upgrade_class_class']);
       $sStyleHidden_upgrade_class_class = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_upgrade_class_class = 'display: none;';
   $sStyleReadInp_upgrade_class_class = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['upgrade_class_class']) && $this->nmgp_cmp_readonly['upgrade_class_class'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['upgrade_class_class']);
       $sStyleReadLab_upgrade_class_class = '';
       $sStyleReadInp_upgrade_class_class = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['upgrade_class_class']) && $this->nmgp_cmp_hidden['upgrade_class_class'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="upgrade_class_class" value="<?php echo $this->form_encode_input($upgrade_class_class) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_upgrade_class_class_label" id="hidden_field_label_upgrade_class_class" style="<?php echo $sStyleHidden_upgrade_class_class; ?>"><span id="id_label_upgrade_class_class"><?php echo $this->nm_new_label['upgrade_class_class']; ?></span></TD>
    <TD class="scFormDataOdd css_upgrade_class_class_line" id="hidden_field_data_upgrade_class_class" style="<?php echo $sStyleHidden_upgrade_class_class; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["upgrade_class_class"]) &&  $this->nmgp_cmp_readonly["upgrade_class_class"] == "on") { 

 ?>
<input type="hidden" name="upgrade_class_class" value="<?php echo $this->form_encode_input($upgrade_class_class) . "\">" . $upgrade_class_class . ""; ?>
<?php } else { ?>
<span id="id_read_on_upgrade_class_class" class="sc-ui-readonly-upgrade_class_class css_upgrade_class_class_line" style="<?php echo $sStyleReadLab_upgrade_class_class; ?>"><?php echo $this->upgrade_class_class; ?></span><span id="id_read_off_upgrade_class_class" class="css_read_off_upgrade_class_class" style="white-space: nowrap;<?php echo $sStyleReadInp_upgrade_class_class; ?>">
 <input class="sc-js-input scFormObjectOdd css_upgrade_class_class_obj" style="" id="id_sc_field_upgrade_class_class" type=text name="upgrade_class_class" value="<?php echo $this->form_encode_input($upgrade_class_class) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['upgrade_class_los']))
    {
        $this->nm_new_label['upgrade_class_los'] = "Upgrade Class Los";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $upgrade_class_los = $this->upgrade_class_los;
   $sStyleHidden_upgrade_class_los = '';
   if (isset($this->nmgp_cmp_hidden['upgrade_class_los']) && $this->nmgp_cmp_hidden['upgrade_class_los'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['upgrade_class_los']);
       $sStyleHidden_upgrade_class_los = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_upgrade_class_los = 'display: none;';
   $sStyleReadInp_upgrade_class_los = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['upgrade_class_los']) && $this->nmgp_cmp_readonly['upgrade_class_los'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['upgrade_class_los']);
       $sStyleReadLab_upgrade_class_los = '';
       $sStyleReadInp_upgrade_class_los = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['upgrade_class_los']) && $this->nmgp_cmp_hidden['upgrade_class_los'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="upgrade_class_los" value="<?php echo $this->form_encode_input($upgrade_class_los) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_upgrade_class_los_label" id="hidden_field_label_upgrade_class_los" style="<?php echo $sStyleHidden_upgrade_class_los; ?>"><span id="id_label_upgrade_class_los"><?php echo $this->nm_new_label['upgrade_class_los']; ?></span></TD>
    <TD class="scFormDataOdd css_upgrade_class_los_line" id="hidden_field_data_upgrade_class_los" style="<?php echo $sStyleHidden_upgrade_class_los; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["upgrade_class_los"]) &&  $this->nmgp_cmp_readonly["upgrade_class_los"] == "on") { 

 ?>
<input type="hidden" name="upgrade_class_los" value="<?php echo $this->form_encode_input($upgrade_class_los) . "\">" . $upgrade_class_los . ""; ?>
<?php } else { ?>
<span id="id_read_on_upgrade_class_los" class="sc-ui-readonly-upgrade_class_los css_upgrade_class_los_line" style="<?php echo $sStyleReadLab_upgrade_class_los; ?>"><?php echo $this->upgrade_class_los; ?></span><span id="id_read_off_upgrade_class_los" class="css_read_off_upgrade_class_los" style="white-space: nowrap;<?php echo $sStyleReadInp_upgrade_class_los; ?>">
 <input class="sc-js-input scFormObjectOdd css_upgrade_class_los_obj" style="" id="id_sc_field_upgrade_class_los" type=text name="upgrade_class_los" value="<?php echo $this->form_encode_input($upgrade_class_los) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '5', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['add_payment_pct']))
    {
        $this->nm_new_label['add_payment_pct'] = "Add Payment Percent";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $add_payment_pct = $this->add_payment_pct;
   $sStyleHidden_add_payment_pct = '';
   if (isset($this->nmgp_cmp_hidden['add_payment_pct']) && $this->nmgp_cmp_hidden['add_payment_pct'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['add_payment_pct']);
       $sStyleHidden_add_payment_pct = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_add_payment_pct = 'display: none;';
   $sStyleReadInp_add_payment_pct = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['add_payment_pct']) && $this->nmgp_cmp_readonly['add_payment_pct'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['add_payment_pct']);
       $sStyleReadLab_add_payment_pct = '';
       $sStyleReadInp_add_payment_pct = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['add_payment_pct']) && $this->nmgp_cmp_hidden['add_payment_pct'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="add_payment_pct" value="<?php echo $this->form_encode_input($add_payment_pct) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_add_payment_pct_label" id="hidden_field_label_add_payment_pct" style="<?php echo $sStyleHidden_add_payment_pct; ?>"><span id="id_label_add_payment_pct"><?php echo $this->nm_new_label['add_payment_pct']; ?></span></TD>
    <TD class="scFormDataOdd css_add_payment_pct_line" id="hidden_field_data_add_payment_pct" style="<?php echo $sStyleHidden_add_payment_pct; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["add_payment_pct"]) &&  $this->nmgp_cmp_readonly["add_payment_pct"] == "on") { 

 ?>
<input type="hidden" name="add_payment_pct" value="<?php echo $this->form_encode_input($add_payment_pct) . "\">" . $add_payment_pct . ""; ?>
<?php } else { ?>
<span id="id_read_on_add_payment_pct" class="sc-ui-readonly-add_payment_pct css_add_payment_pct_line" style="<?php echo $sStyleReadLab_add_payment_pct; ?>"><?php echo $this->add_payment_pct; ?></span><span id="id_read_off_add_payment_pct" class="css_read_off_add_payment_pct" style="white-space: nowrap;<?php echo $sStyleReadInp_add_payment_pct; ?>">
 <input class="sc-js-input scFormObjectOdd css_add_payment_pct_obj" style="" id="id_sc_field_add_payment_pct" type=text name="add_payment_pct" value="<?php echo $this->form_encode_input($add_payment_pct) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '35', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['birth_weight']))
    {
        $this->nm_new_label['birth_weight'] = "Birth Weight";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $birth_weight = $this->birth_weight;
   $sStyleHidden_birth_weight = '';
   if (isset($this->nmgp_cmp_hidden['birth_weight']) && $this->nmgp_cmp_hidden['birth_weight'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['birth_weight']);
       $sStyleHidden_birth_weight = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_birth_weight = 'display: none;';
   $sStyleReadInp_birth_weight = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['birth_weight']) && $this->nmgp_cmp_readonly['birth_weight'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['birth_weight']);
       $sStyleReadLab_birth_weight = '';
       $sStyleReadInp_birth_weight = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['birth_weight']) && $this->nmgp_cmp_hidden['birth_weight'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="birth_weight" value="<?php echo $this->form_encode_input($birth_weight) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_birth_weight_label" id="hidden_field_label_birth_weight" style="<?php echo $sStyleHidden_birth_weight; ?>"><span id="id_label_birth_weight"><?php echo $this->nm_new_label['birth_weight']; ?></span></TD>
    <TD class="scFormDataOdd css_birth_weight_line" id="hidden_field_data_birth_weight" style="<?php echo $sStyleHidden_birth_weight; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["birth_weight"]) &&  $this->nmgp_cmp_readonly["birth_weight"] == "on") { 

 ?>
<input type="hidden" name="birth_weight" value="<?php echo $this->form_encode_input($birth_weight) . "\">" . $birth_weight . ""; ?>
<?php } else { ?>
<span id="id_read_on_birth_weight" class="sc-ui-readonly-birth_weight css_birth_weight_line" style="<?php echo $sStyleReadLab_birth_weight; ?>"><?php echo $this->birth_weight; ?></span><span id="id_read_off_birth_weight" class="css_read_off_birth_weight" style="white-space: nowrap;<?php echo $sStyleReadInp_birth_weight; ?>">
 <input class="sc-js-input scFormObjectOdd css_birth_weight_obj" style="" id="id_sc_field_birth_weight" type=text name="birth_weight" value="<?php echo $this->form_encode_input($birth_weight) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '0', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['discharge_status']))
    {
        $this->nm_new_label['discharge_status'] = "Discharge Status";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $discharge_status = $this->discharge_status;
   $sStyleHidden_discharge_status = '';
   if (isset($this->nmgp_cmp_hidden['discharge_status']) && $this->nmgp_cmp_hidden['discharge_status'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['discharge_status']);
       $sStyleHidden_discharge_status = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_discharge_status = 'display: none;';
   $sStyleReadInp_discharge_status = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['discharge_status']) && $this->nmgp_cmp_readonly['discharge_status'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['discharge_status']);
       $sStyleReadLab_discharge_status = '';
       $sStyleReadInp_discharge_status = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['discharge_status']) && $this->nmgp_cmp_hidden['discharge_status'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="discharge_status" value="<?php echo $this->form_encode_input($discharge_status) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_discharge_status_label" id="hidden_field_label_discharge_status" style="<?php echo $sStyleHidden_discharge_status; ?>"><span id="id_label_discharge_status"><?php echo $this->nm_new_label['discharge_status']; ?></span></TD>
    <TD class="scFormDataOdd css_discharge_status_line" id="hidden_field_data_discharge_status" style="<?php echo $sStyleHidden_discharge_status; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["discharge_status"]) &&  $this->nmgp_cmp_readonly["discharge_status"] == "on") { 

 ?>
<input type="hidden" name="discharge_status" value="<?php echo $this->form_encode_input($discharge_status) . "\">" . $discharge_status . ""; ?>
<?php } else { ?>
<span id="id_read_on_discharge_status" class="sc-ui-readonly-discharge_status css_discharge_status_line" style="<?php echo $sStyleReadLab_discharge_status; ?>"><?php echo $this->discharge_status; ?></span><span id="id_read_off_discharge_status" class="css_read_off_discharge_status" style="white-space: nowrap;<?php echo $sStyleReadInp_discharge_status; ?>">
 <input class="sc-js-input scFormObjectOdd css_discharge_status_obj" style="" id="id_sc_field_discharge_status" type=text name="discharge_status" value="<?php echo $this->form_encode_input($discharge_status) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '1', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['diagnosa']))
    {
        $this->nm_new_label['diagnosa'] = "Diagnosa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diagnosa = $this->diagnosa;
   $sStyleHidden_diagnosa = '';
   if (isset($this->nmgp_cmp_hidden['diagnosa']) && $this->nmgp_cmp_hidden['diagnosa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diagnosa']);
       $sStyleHidden_diagnosa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diagnosa = 'display: none;';
   $sStyleReadInp_diagnosa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diagnosa']) && $this->nmgp_cmp_readonly['diagnosa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diagnosa']);
       $sStyleReadLab_diagnosa = '';
       $sStyleReadInp_diagnosa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diagnosa']) && $this->nmgp_cmp_hidden['diagnosa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diagnosa" value="<?php echo $this->form_encode_input($diagnosa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_diagnosa_label" id="hidden_field_label_diagnosa" style="<?php echo $sStyleHidden_diagnosa; ?>"><span id="id_label_diagnosa"><?php echo $this->nm_new_label['diagnosa']; ?></span></TD>
    <TD class="scFormDataOdd css_diagnosa_line" id="hidden_field_data_diagnosa" style="<?php echo $sStyleHidden_diagnosa; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diagnosa"]) &&  $this->nmgp_cmp_readonly["diagnosa"] == "on") { 

 ?>
<input type="hidden" name="diagnosa" value="<?php echo $this->form_encode_input($diagnosa) . "\">" . $diagnosa . ""; ?>
<?php } else { ?>
<span id="id_read_on_diagnosa" class="sc-ui-readonly-diagnosa css_diagnosa_line" style="<?php echo $sStyleReadLab_diagnosa; ?>"><?php echo $this->diagnosa; ?></span><span id="id_read_off_diagnosa" class="css_read_off_diagnosa" style="white-space: nowrap;<?php echo $sStyleReadInp_diagnosa; ?>">
 <input class="sc-js-input scFormObjectOdd css_diagnosa_obj" style="" id="id_sc_field_diagnosa" type=text name="diagnosa" value="<?php echo $this->form_encode_input($diagnosa) ?>"
 size=30 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'S71.0#A00.1', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['procedure']))
    {
        $this->nm_new_label['procedure'] = "Procedure";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $procedure = $this->procedure;
   $sStyleHidden_procedure = '';
   if (isset($this->nmgp_cmp_hidden['procedure']) && $this->nmgp_cmp_hidden['procedure'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['procedure']);
       $sStyleHidden_procedure = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_procedure = 'display: none;';
   $sStyleReadInp_procedure = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['procedure']) && $this->nmgp_cmp_readonly['procedure'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['procedure']);
       $sStyleReadLab_procedure = '';
       $sStyleReadInp_procedure = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['procedure']) && $this->nmgp_cmp_hidden['procedure'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="procedure" value="<?php echo $this->form_encode_input($procedure) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_procedure_label" id="hidden_field_label_procedure" style="<?php echo $sStyleHidden_procedure; ?>"><span id="id_label_procedure"><?php echo $this->nm_new_label['procedure']; ?></span></TD>
    <TD class="scFormDataOdd css_procedure_line" id="hidden_field_data_procedure" style="<?php echo $sStyleHidden_procedure; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["procedure"]) &&  $this->nmgp_cmp_readonly["procedure"] == "on") { 

 ?>
<input type="hidden" name="procedure" value="<?php echo $this->form_encode_input($procedure) . "\">" . $procedure . ""; ?>
<?php } else { ?>
<span id="id_read_on_procedure" class="sc-ui-readonly-procedure css_procedure_line" style="<?php echo $sStyleReadLab_procedure; ?>"><?php echo $this->procedure; ?></span><span id="id_read_off_procedure" class="css_read_off_procedure" style="white-space: nowrap;<?php echo $sStyleReadInp_procedure; ?>">
 <input class="sc-js-input scFormObjectOdd css_procedure_obj" style="" id="id_sc_field_procedure" type=text name="procedure" value="<?php echo $this->form_encode_input($procedure) ?>"
 size=30 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '81.52#88.38', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['tarif_rs_prosedur_non_bedah']))
    {
        $this->nm_new_label['tarif_rs_prosedur_non_bedah'] = "Tarif Prosedur Non Bedah";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_prosedur_non_bedah = $this->tarif_rs_prosedur_non_bedah;
   $sStyleHidden_tarif_rs_prosedur_non_bedah = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_prosedur_non_bedah']) && $this->nmgp_cmp_hidden['tarif_rs_prosedur_non_bedah'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_prosedur_non_bedah']);
       $sStyleHidden_tarif_rs_prosedur_non_bedah = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_prosedur_non_bedah = 'display: none;';
   $sStyleReadInp_tarif_rs_prosedur_non_bedah = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_prosedur_non_bedah']) && $this->nmgp_cmp_readonly['tarif_rs_prosedur_non_bedah'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_prosedur_non_bedah']);
       $sStyleReadLab_tarif_rs_prosedur_non_bedah = '';
       $sStyleReadInp_tarif_rs_prosedur_non_bedah = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_prosedur_non_bedah']) && $this->nmgp_cmp_hidden['tarif_rs_prosedur_non_bedah'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_prosedur_non_bedah" value="<?php echo $this->form_encode_input($tarif_rs_prosedur_non_bedah) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_prosedur_non_bedah_label" id="hidden_field_label_tarif_rs_prosedur_non_bedah" style="<?php echo $sStyleHidden_tarif_rs_prosedur_non_bedah; ?>"><span id="id_label_tarif_rs_prosedur_non_bedah"><?php echo $this->nm_new_label['tarif_rs_prosedur_non_bedah']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_prosedur_non_bedah_line" id="hidden_field_data_tarif_rs_prosedur_non_bedah" style="<?php echo $sStyleHidden_tarif_rs_prosedur_non_bedah; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_prosedur_non_bedah"]) &&  $this->nmgp_cmp_readonly["tarif_rs_prosedur_non_bedah"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_prosedur_non_bedah" value="<?php echo $this->form_encode_input($tarif_rs_prosedur_non_bedah) . "\">" . $tarif_rs_prosedur_non_bedah . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_prosedur_non_bedah" class="sc-ui-readonly-tarif_rs_prosedur_non_bedah css_tarif_rs_prosedur_non_bedah_line" style="<?php echo $sStyleReadLab_tarif_rs_prosedur_non_bedah; ?>"><?php echo $this->tarif_rs_prosedur_non_bedah; ?></span><span id="id_read_off_tarif_rs_prosedur_non_bedah" class="css_read_off_tarif_rs_prosedur_non_bedah" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_prosedur_non_bedah; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_prosedur_non_bedah_obj" style="" id="id_sc_field_tarif_rs_prosedur_non_bedah" type=text name="tarif_rs_prosedur_non_bedah" value="<?php echo $this->form_encode_input($tarif_rs_prosedur_non_bedah) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '300000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tarif_rs_prosedur_bedah']))
    {
        $this->nm_new_label['tarif_rs_prosedur_bedah'] = "Tarif Prosedur Bedah";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_prosedur_bedah = $this->tarif_rs_prosedur_bedah;
   $sStyleHidden_tarif_rs_prosedur_bedah = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_prosedur_bedah']) && $this->nmgp_cmp_hidden['tarif_rs_prosedur_bedah'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_prosedur_bedah']);
       $sStyleHidden_tarif_rs_prosedur_bedah = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_prosedur_bedah = 'display: none;';
   $sStyleReadInp_tarif_rs_prosedur_bedah = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_prosedur_bedah']) && $this->nmgp_cmp_readonly['tarif_rs_prosedur_bedah'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_prosedur_bedah']);
       $sStyleReadLab_tarif_rs_prosedur_bedah = '';
       $sStyleReadInp_tarif_rs_prosedur_bedah = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_prosedur_bedah']) && $this->nmgp_cmp_hidden['tarif_rs_prosedur_bedah'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_prosedur_bedah" value="<?php echo $this->form_encode_input($tarif_rs_prosedur_bedah) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_prosedur_bedah_label" id="hidden_field_label_tarif_rs_prosedur_bedah" style="<?php echo $sStyleHidden_tarif_rs_prosedur_bedah; ?>"><span id="id_label_tarif_rs_prosedur_bedah"><?php echo $this->nm_new_label['tarif_rs_prosedur_bedah']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_prosedur_bedah_line" id="hidden_field_data_tarif_rs_prosedur_bedah" style="<?php echo $sStyleHidden_tarif_rs_prosedur_bedah; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_prosedur_bedah"]) &&  $this->nmgp_cmp_readonly["tarif_rs_prosedur_bedah"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_prosedur_bedah" value="<?php echo $this->form_encode_input($tarif_rs_prosedur_bedah) . "\">" . $tarif_rs_prosedur_bedah . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_prosedur_bedah" class="sc-ui-readonly-tarif_rs_prosedur_bedah css_tarif_rs_prosedur_bedah_line" style="<?php echo $sStyleReadLab_tarif_rs_prosedur_bedah; ?>"><?php echo $this->tarif_rs_prosedur_bedah; ?></span><span id="id_read_off_tarif_rs_prosedur_bedah" class="css_read_off_tarif_rs_prosedur_bedah" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_prosedur_bedah; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_prosedur_bedah_obj" style="" id="id_sc_field_tarif_rs_prosedur_bedah" type=text name="tarif_rs_prosedur_bedah" value="<?php echo $this->form_encode_input($tarif_rs_prosedur_bedah) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '20000000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['tarif_rs_konsultasi']))
    {
        $this->nm_new_label['tarif_rs_konsultasi'] = "Tarif konsultasi";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_konsultasi = $this->tarif_rs_konsultasi;
   $sStyleHidden_tarif_rs_konsultasi = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_konsultasi']) && $this->nmgp_cmp_hidden['tarif_rs_konsultasi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_konsultasi']);
       $sStyleHidden_tarif_rs_konsultasi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_konsultasi = 'display: none;';
   $sStyleReadInp_tarif_rs_konsultasi = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_konsultasi']) && $this->nmgp_cmp_readonly['tarif_rs_konsultasi'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_konsultasi']);
       $sStyleReadLab_tarif_rs_konsultasi = '';
       $sStyleReadInp_tarif_rs_konsultasi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_konsultasi']) && $this->nmgp_cmp_hidden['tarif_rs_konsultasi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_konsultasi" value="<?php echo $this->form_encode_input($tarif_rs_konsultasi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_konsultasi_label" id="hidden_field_label_tarif_rs_konsultasi" style="<?php echo $sStyleHidden_tarif_rs_konsultasi; ?>"><span id="id_label_tarif_rs_konsultasi"><?php echo $this->nm_new_label['tarif_rs_konsultasi']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_konsultasi_line" id="hidden_field_data_tarif_rs_konsultasi" style="<?php echo $sStyleHidden_tarif_rs_konsultasi; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_konsultasi"]) &&  $this->nmgp_cmp_readonly["tarif_rs_konsultasi"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_konsultasi" value="<?php echo $this->form_encode_input($tarif_rs_konsultasi) . "\">" . $tarif_rs_konsultasi . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_konsultasi" class="sc-ui-readonly-tarif_rs_konsultasi css_tarif_rs_konsultasi_line" style="<?php echo $sStyleReadLab_tarif_rs_konsultasi; ?>"><?php echo $this->tarif_rs_konsultasi; ?></span><span id="id_read_off_tarif_rs_konsultasi" class="css_read_off_tarif_rs_konsultasi" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_konsultasi; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_konsultasi_obj" style="" id="id_sc_field_tarif_rs_konsultasi" type=text name="tarif_rs_konsultasi" value="<?php echo $this->form_encode_input($tarif_rs_konsultasi) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '300000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tarif_rs_tenaga_ahli']))
    {
        $this->nm_new_label['tarif_rs_tenaga_ahli'] = "Tarif Tenaga Ahli";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_tenaga_ahli = $this->tarif_rs_tenaga_ahli;
   $sStyleHidden_tarif_rs_tenaga_ahli = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_tenaga_ahli']) && $this->nmgp_cmp_hidden['tarif_rs_tenaga_ahli'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_tenaga_ahli']);
       $sStyleHidden_tarif_rs_tenaga_ahli = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_tenaga_ahli = 'display: none;';
   $sStyleReadInp_tarif_rs_tenaga_ahli = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_tenaga_ahli']) && $this->nmgp_cmp_readonly['tarif_rs_tenaga_ahli'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_tenaga_ahli']);
       $sStyleReadLab_tarif_rs_tenaga_ahli = '';
       $sStyleReadInp_tarif_rs_tenaga_ahli = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_tenaga_ahli']) && $this->nmgp_cmp_hidden['tarif_rs_tenaga_ahli'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_tenaga_ahli" value="<?php echo $this->form_encode_input($tarif_rs_tenaga_ahli) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_tenaga_ahli_label" id="hidden_field_label_tarif_rs_tenaga_ahli" style="<?php echo $sStyleHidden_tarif_rs_tenaga_ahli; ?>"><span id="id_label_tarif_rs_tenaga_ahli"><?php echo $this->nm_new_label['tarif_rs_tenaga_ahli']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_tenaga_ahli_line" id="hidden_field_data_tarif_rs_tenaga_ahli" style="<?php echo $sStyleHidden_tarif_rs_tenaga_ahli; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_tenaga_ahli"]) &&  $this->nmgp_cmp_readonly["tarif_rs_tenaga_ahli"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_tenaga_ahli" value="<?php echo $this->form_encode_input($tarif_rs_tenaga_ahli) . "\">" . $tarif_rs_tenaga_ahli . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_tenaga_ahli" class="sc-ui-readonly-tarif_rs_tenaga_ahli css_tarif_rs_tenaga_ahli_line" style="<?php echo $sStyleReadLab_tarif_rs_tenaga_ahli; ?>"><?php echo $this->tarif_rs_tenaga_ahli; ?></span><span id="id_read_off_tarif_rs_tenaga_ahli" class="css_read_off_tarif_rs_tenaga_ahli" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_tenaga_ahli; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_tenaga_ahli_obj" style="" id="id_sc_field_tarif_rs_tenaga_ahli" type=text name="tarif_rs_tenaga_ahli" value="<?php echo $this->form_encode_input($tarif_rs_tenaga_ahli) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '200000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['tarif_rs_keperawatan']))
    {
        $this->nm_new_label['tarif_rs_keperawatan'] = "Tarif Keperawatan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_keperawatan = $this->tarif_rs_keperawatan;
   $sStyleHidden_tarif_rs_keperawatan = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_keperawatan']) && $this->nmgp_cmp_hidden['tarif_rs_keperawatan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_keperawatan']);
       $sStyleHidden_tarif_rs_keperawatan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_keperawatan = 'display: none;';
   $sStyleReadInp_tarif_rs_keperawatan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_keperawatan']) && $this->nmgp_cmp_readonly['tarif_rs_keperawatan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_keperawatan']);
       $sStyleReadLab_tarif_rs_keperawatan = '';
       $sStyleReadInp_tarif_rs_keperawatan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_keperawatan']) && $this->nmgp_cmp_hidden['tarif_rs_keperawatan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_keperawatan" value="<?php echo $this->form_encode_input($tarif_rs_keperawatan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_keperawatan_label" id="hidden_field_label_tarif_rs_keperawatan" style="<?php echo $sStyleHidden_tarif_rs_keperawatan; ?>"><span id="id_label_tarif_rs_keperawatan"><?php echo $this->nm_new_label['tarif_rs_keperawatan']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_keperawatan_line" id="hidden_field_data_tarif_rs_keperawatan" style="<?php echo $sStyleHidden_tarif_rs_keperawatan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_keperawatan"]) &&  $this->nmgp_cmp_readonly["tarif_rs_keperawatan"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_keperawatan" value="<?php echo $this->form_encode_input($tarif_rs_keperawatan) . "\">" . $tarif_rs_keperawatan . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_keperawatan" class="sc-ui-readonly-tarif_rs_keperawatan css_tarif_rs_keperawatan_line" style="<?php echo $sStyleReadLab_tarif_rs_keperawatan; ?>"><?php echo $this->tarif_rs_keperawatan; ?></span><span id="id_read_off_tarif_rs_keperawatan" class="css_read_off_tarif_rs_keperawatan" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_keperawatan; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_keperawatan_obj" style="" id="id_sc_field_tarif_rs_keperawatan" type=text name="tarif_rs_keperawatan" value="<?php echo $this->form_encode_input($tarif_rs_keperawatan) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '80000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tarif_rs_penunjang']))
    {
        $this->nm_new_label['tarif_rs_penunjang'] = "Tarif Penunjang";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_penunjang = $this->tarif_rs_penunjang;
   $sStyleHidden_tarif_rs_penunjang = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_penunjang']) && $this->nmgp_cmp_hidden['tarif_rs_penunjang'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_penunjang']);
       $sStyleHidden_tarif_rs_penunjang = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_penunjang = 'display: none;';
   $sStyleReadInp_tarif_rs_penunjang = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_penunjang']) && $this->nmgp_cmp_readonly['tarif_rs_penunjang'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_penunjang']);
       $sStyleReadLab_tarif_rs_penunjang = '';
       $sStyleReadInp_tarif_rs_penunjang = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_penunjang']) && $this->nmgp_cmp_hidden['tarif_rs_penunjang'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_penunjang" value="<?php echo $this->form_encode_input($tarif_rs_penunjang) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_penunjang_label" id="hidden_field_label_tarif_rs_penunjang" style="<?php echo $sStyleHidden_tarif_rs_penunjang; ?>"><span id="id_label_tarif_rs_penunjang"><?php echo $this->nm_new_label['tarif_rs_penunjang']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_penunjang_line" id="hidden_field_data_tarif_rs_penunjang" style="<?php echo $sStyleHidden_tarif_rs_penunjang; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_penunjang"]) &&  $this->nmgp_cmp_readonly["tarif_rs_penunjang"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_penunjang" value="<?php echo $this->form_encode_input($tarif_rs_penunjang) . "\">" . $tarif_rs_penunjang . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_penunjang" class="sc-ui-readonly-tarif_rs_penunjang css_tarif_rs_penunjang_line" style="<?php echo $sStyleReadLab_tarif_rs_penunjang; ?>"><?php echo $this->tarif_rs_penunjang; ?></span><span id="id_read_off_tarif_rs_penunjang" class="css_read_off_tarif_rs_penunjang" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_penunjang; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_penunjang_obj" style="" id="id_sc_field_tarif_rs_penunjang" type=text name="tarif_rs_penunjang" value="<?php echo $this->form_encode_input($tarif_rs_penunjang) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '1000000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['tarif_rs_radiologi']))
    {
        $this->nm_new_label['tarif_rs_radiologi'] = "Tarif Radiologi";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_radiologi = $this->tarif_rs_radiologi;
   $sStyleHidden_tarif_rs_radiologi = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_radiologi']) && $this->nmgp_cmp_hidden['tarif_rs_radiologi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_radiologi']);
       $sStyleHidden_tarif_rs_radiologi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_radiologi = 'display: none;';
   $sStyleReadInp_tarif_rs_radiologi = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_radiologi']) && $this->nmgp_cmp_readonly['tarif_rs_radiologi'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_radiologi']);
       $sStyleReadLab_tarif_rs_radiologi = '';
       $sStyleReadInp_tarif_rs_radiologi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_radiologi']) && $this->nmgp_cmp_hidden['tarif_rs_radiologi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_radiologi" value="<?php echo $this->form_encode_input($tarif_rs_radiologi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_radiologi_label" id="hidden_field_label_tarif_rs_radiologi" style="<?php echo $sStyleHidden_tarif_rs_radiologi; ?>"><span id="id_label_tarif_rs_radiologi"><?php echo $this->nm_new_label['tarif_rs_radiologi']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_radiologi_line" id="hidden_field_data_tarif_rs_radiologi" style="<?php echo $sStyleHidden_tarif_rs_radiologi; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_radiologi"]) &&  $this->nmgp_cmp_readonly["tarif_rs_radiologi"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_radiologi" value="<?php echo $this->form_encode_input($tarif_rs_radiologi) . "\">" . $tarif_rs_radiologi . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_radiologi" class="sc-ui-readonly-tarif_rs_radiologi css_tarif_rs_radiologi_line" style="<?php echo $sStyleReadLab_tarif_rs_radiologi; ?>"><?php echo $this->tarif_rs_radiologi; ?></span><span id="id_read_off_tarif_rs_radiologi" class="css_read_off_tarif_rs_radiologi" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_radiologi; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_radiologi_obj" style="" id="id_sc_field_tarif_rs_radiologi" type=text name="tarif_rs_radiologi" value="<?php echo $this->form_encode_input($tarif_rs_radiologi) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '500000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tarif_rs_laboratorium']))
    {
        $this->nm_new_label['tarif_rs_laboratorium'] = "Tarif Laboratorium";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_laboratorium = $this->tarif_rs_laboratorium;
   $sStyleHidden_tarif_rs_laboratorium = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_laboratorium']) && $this->nmgp_cmp_hidden['tarif_rs_laboratorium'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_laboratorium']);
       $sStyleHidden_tarif_rs_laboratorium = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_laboratorium = 'display: none;';
   $sStyleReadInp_tarif_rs_laboratorium = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_laboratorium']) && $this->nmgp_cmp_readonly['tarif_rs_laboratorium'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_laboratorium']);
       $sStyleReadLab_tarif_rs_laboratorium = '';
       $sStyleReadInp_tarif_rs_laboratorium = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_laboratorium']) && $this->nmgp_cmp_hidden['tarif_rs_laboratorium'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_laboratorium" value="<?php echo $this->form_encode_input($tarif_rs_laboratorium) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_laboratorium_label" id="hidden_field_label_tarif_rs_laboratorium" style="<?php echo $sStyleHidden_tarif_rs_laboratorium; ?>"><span id="id_label_tarif_rs_laboratorium"><?php echo $this->nm_new_label['tarif_rs_laboratorium']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_laboratorium_line" id="hidden_field_data_tarif_rs_laboratorium" style="<?php echo $sStyleHidden_tarif_rs_laboratorium; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_laboratorium"]) &&  $this->nmgp_cmp_readonly["tarif_rs_laboratorium"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_laboratorium" value="<?php echo $this->form_encode_input($tarif_rs_laboratorium) . "\">" . $tarif_rs_laboratorium . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_laboratorium" class="sc-ui-readonly-tarif_rs_laboratorium css_tarif_rs_laboratorium_line" style="<?php echo $sStyleReadLab_tarif_rs_laboratorium; ?>"><?php echo $this->tarif_rs_laboratorium; ?></span><span id="id_read_off_tarif_rs_laboratorium" class="css_read_off_tarif_rs_laboratorium" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_laboratorium; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_laboratorium_obj" style="" id="id_sc_field_tarif_rs_laboratorium" type=text name="tarif_rs_laboratorium" value="<?php echo $this->form_encode_input($tarif_rs_laboratorium) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '600000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['tarif_rs_pelayanan_darah']))
    {
        $this->nm_new_label['tarif_rs_pelayanan_darah'] = "Tarif Pelayanan Darah";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_pelayanan_darah = $this->tarif_rs_pelayanan_darah;
   $sStyleHidden_tarif_rs_pelayanan_darah = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_pelayanan_darah']) && $this->nmgp_cmp_hidden['tarif_rs_pelayanan_darah'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_pelayanan_darah']);
       $sStyleHidden_tarif_rs_pelayanan_darah = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_pelayanan_darah = 'display: none;';
   $sStyleReadInp_tarif_rs_pelayanan_darah = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_pelayanan_darah']) && $this->nmgp_cmp_readonly['tarif_rs_pelayanan_darah'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_pelayanan_darah']);
       $sStyleReadLab_tarif_rs_pelayanan_darah = '';
       $sStyleReadInp_tarif_rs_pelayanan_darah = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_pelayanan_darah']) && $this->nmgp_cmp_hidden['tarif_rs_pelayanan_darah'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_pelayanan_darah" value="<?php echo $this->form_encode_input($tarif_rs_pelayanan_darah) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_pelayanan_darah_label" id="hidden_field_label_tarif_rs_pelayanan_darah" style="<?php echo $sStyleHidden_tarif_rs_pelayanan_darah; ?>"><span id="id_label_tarif_rs_pelayanan_darah"><?php echo $this->nm_new_label['tarif_rs_pelayanan_darah']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_pelayanan_darah_line" id="hidden_field_data_tarif_rs_pelayanan_darah" style="<?php echo $sStyleHidden_tarif_rs_pelayanan_darah; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_pelayanan_darah"]) &&  $this->nmgp_cmp_readonly["tarif_rs_pelayanan_darah"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_pelayanan_darah" value="<?php echo $this->form_encode_input($tarif_rs_pelayanan_darah) . "\">" . $tarif_rs_pelayanan_darah . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_pelayanan_darah" class="sc-ui-readonly-tarif_rs_pelayanan_darah css_tarif_rs_pelayanan_darah_line" style="<?php echo $sStyleReadLab_tarif_rs_pelayanan_darah; ?>"><?php echo $this->tarif_rs_pelayanan_darah; ?></span><span id="id_read_off_tarif_rs_pelayanan_darah" class="css_read_off_tarif_rs_pelayanan_darah" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_pelayanan_darah; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_pelayanan_darah_obj" style="" id="id_sc_field_tarif_rs_pelayanan_darah" type=text name="tarif_rs_pelayanan_darah" value="<?php echo $this->form_encode_input($tarif_rs_pelayanan_darah) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '150000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tarif_rs_rehabilitasi']))
    {
        $this->nm_new_label['tarif_rs_rehabilitasi'] = "Tarif rehabilitasi";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_rehabilitasi = $this->tarif_rs_rehabilitasi;
   $sStyleHidden_tarif_rs_rehabilitasi = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_rehabilitasi']) && $this->nmgp_cmp_hidden['tarif_rs_rehabilitasi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_rehabilitasi']);
       $sStyleHidden_tarif_rs_rehabilitasi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_rehabilitasi = 'display: none;';
   $sStyleReadInp_tarif_rs_rehabilitasi = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_rehabilitasi']) && $this->nmgp_cmp_readonly['tarif_rs_rehabilitasi'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_rehabilitasi']);
       $sStyleReadLab_tarif_rs_rehabilitasi = '';
       $sStyleReadInp_tarif_rs_rehabilitasi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_rehabilitasi']) && $this->nmgp_cmp_hidden['tarif_rs_rehabilitasi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_rehabilitasi" value="<?php echo $this->form_encode_input($tarif_rs_rehabilitasi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_rehabilitasi_label" id="hidden_field_label_tarif_rs_rehabilitasi" style="<?php echo $sStyleHidden_tarif_rs_rehabilitasi; ?>"><span id="id_label_tarif_rs_rehabilitasi"><?php echo $this->nm_new_label['tarif_rs_rehabilitasi']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_rehabilitasi_line" id="hidden_field_data_tarif_rs_rehabilitasi" style="<?php echo $sStyleHidden_tarif_rs_rehabilitasi; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_rehabilitasi"]) &&  $this->nmgp_cmp_readonly["tarif_rs_rehabilitasi"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_rehabilitasi" value="<?php echo $this->form_encode_input($tarif_rs_rehabilitasi) . "\">" . $tarif_rs_rehabilitasi . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_rehabilitasi" class="sc-ui-readonly-tarif_rs_rehabilitasi css_tarif_rs_rehabilitasi_line" style="<?php echo $sStyleReadLab_tarif_rs_rehabilitasi; ?>"><?php echo $this->tarif_rs_rehabilitasi; ?></span><span id="id_read_off_tarif_rs_rehabilitasi" class="css_read_off_tarif_rs_rehabilitasi" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_rehabilitasi; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_rehabilitasi_obj" style="" id="id_sc_field_tarif_rs_rehabilitasi" type=text name="tarif_rs_rehabilitasi" value="<?php echo $this->form_encode_input($tarif_rs_rehabilitasi) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '100000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['tarif_rs_kamar']))
    {
        $this->nm_new_label['tarif_rs_kamar'] = "Tarif Kamar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_kamar = $this->tarif_rs_kamar;
   $sStyleHidden_tarif_rs_kamar = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_kamar']) && $this->nmgp_cmp_hidden['tarif_rs_kamar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_kamar']);
       $sStyleHidden_tarif_rs_kamar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_kamar = 'display: none;';
   $sStyleReadInp_tarif_rs_kamar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_kamar']) && $this->nmgp_cmp_readonly['tarif_rs_kamar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_kamar']);
       $sStyleReadLab_tarif_rs_kamar = '';
       $sStyleReadInp_tarif_rs_kamar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_kamar']) && $this->nmgp_cmp_hidden['tarif_rs_kamar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_kamar" value="<?php echo $this->form_encode_input($tarif_rs_kamar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_kamar_label" id="hidden_field_label_tarif_rs_kamar" style="<?php echo $sStyleHidden_tarif_rs_kamar; ?>"><span id="id_label_tarif_rs_kamar"><?php echo $this->nm_new_label['tarif_rs_kamar']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_kamar_line" id="hidden_field_data_tarif_rs_kamar" style="<?php echo $sStyleHidden_tarif_rs_kamar; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_kamar"]) &&  $this->nmgp_cmp_readonly["tarif_rs_kamar"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_kamar" value="<?php echo $this->form_encode_input($tarif_rs_kamar) . "\">" . $tarif_rs_kamar . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_kamar" class="sc-ui-readonly-tarif_rs_kamar css_tarif_rs_kamar_line" style="<?php echo $sStyleReadLab_tarif_rs_kamar; ?>"><?php echo $this->tarif_rs_kamar; ?></span><span id="id_read_off_tarif_rs_kamar" class="css_read_off_tarif_rs_kamar" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_kamar; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_kamar_obj" style="" id="id_sc_field_tarif_rs_kamar" type=text name="tarif_rs_kamar" value="<?php echo $this->form_encode_input($tarif_rs_kamar) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '6000000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tarif_rs_rawat_intensif']))
    {
        $this->nm_new_label['tarif_rs_rawat_intensif'] = "Tarif Rawat Intensif";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_rawat_intensif = $this->tarif_rs_rawat_intensif;
   $sStyleHidden_tarif_rs_rawat_intensif = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_rawat_intensif']) && $this->nmgp_cmp_hidden['tarif_rs_rawat_intensif'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_rawat_intensif']);
       $sStyleHidden_tarif_rs_rawat_intensif = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_rawat_intensif = 'display: none;';
   $sStyleReadInp_tarif_rs_rawat_intensif = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_rawat_intensif']) && $this->nmgp_cmp_readonly['tarif_rs_rawat_intensif'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_rawat_intensif']);
       $sStyleReadLab_tarif_rs_rawat_intensif = '';
       $sStyleReadInp_tarif_rs_rawat_intensif = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_rawat_intensif']) && $this->nmgp_cmp_hidden['tarif_rs_rawat_intensif'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_rawat_intensif" value="<?php echo $this->form_encode_input($tarif_rs_rawat_intensif) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_rawat_intensif_label" id="hidden_field_label_tarif_rs_rawat_intensif" style="<?php echo $sStyleHidden_tarif_rs_rawat_intensif; ?>"><span id="id_label_tarif_rs_rawat_intensif"><?php echo $this->nm_new_label['tarif_rs_rawat_intensif']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_rawat_intensif_line" id="hidden_field_data_tarif_rs_rawat_intensif" style="<?php echo $sStyleHidden_tarif_rs_rawat_intensif; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_rawat_intensif"]) &&  $this->nmgp_cmp_readonly["tarif_rs_rawat_intensif"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_rawat_intensif" value="<?php echo $this->form_encode_input($tarif_rs_rawat_intensif) . "\">" . $tarif_rs_rawat_intensif . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_rawat_intensif" class="sc-ui-readonly-tarif_rs_rawat_intensif css_tarif_rs_rawat_intensif_line" style="<?php echo $sStyleReadLab_tarif_rs_rawat_intensif; ?>"><?php echo $this->tarif_rs_rawat_intensif; ?></span><span id="id_read_off_tarif_rs_rawat_intensif" class="css_read_off_tarif_rs_rawat_intensif" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_rawat_intensif; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_rawat_intensif_obj" style="" id="id_sc_field_tarif_rs_rawat_intensif" type=text name="tarif_rs_rawat_intensif" value="<?php echo $this->form_encode_input($tarif_rs_rawat_intensif) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['tarif_rs_obat']))
    {
        $this->nm_new_label['tarif_rs_obat'] = "Tarif Obat";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_obat = $this->tarif_rs_obat;
   $sStyleHidden_tarif_rs_obat = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_obat']) && $this->nmgp_cmp_hidden['tarif_rs_obat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_obat']);
       $sStyleHidden_tarif_rs_obat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_obat = 'display: none;';
   $sStyleReadInp_tarif_rs_obat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_obat']) && $this->nmgp_cmp_readonly['tarif_rs_obat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_obat']);
       $sStyleReadLab_tarif_rs_obat = '';
       $sStyleReadInp_tarif_rs_obat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_obat']) && $this->nmgp_cmp_hidden['tarif_rs_obat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_obat" value="<?php echo $this->form_encode_input($tarif_rs_obat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_obat_label" id="hidden_field_label_tarif_rs_obat" style="<?php echo $sStyleHidden_tarif_rs_obat; ?>"><span id="id_label_tarif_rs_obat"><?php echo $this->nm_new_label['tarif_rs_obat']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_obat_line" id="hidden_field_data_tarif_rs_obat" style="<?php echo $sStyleHidden_tarif_rs_obat; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_obat"]) &&  $this->nmgp_cmp_readonly["tarif_rs_obat"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_obat" value="<?php echo $this->form_encode_input($tarif_rs_obat) . "\">" . $tarif_rs_obat . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_obat" class="sc-ui-readonly-tarif_rs_obat css_tarif_rs_obat_line" style="<?php echo $sStyleReadLab_tarif_rs_obat; ?>"><?php echo $this->tarif_rs_obat; ?></span><span id="id_read_off_tarif_rs_obat" class="css_read_off_tarif_rs_obat" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_obat; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_obat_obj" style="" id="id_sc_field_tarif_rs_obat" type=text name="tarif_rs_obat" value="<?php echo $this->form_encode_input($tarif_rs_obat) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '2000000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tarif_rs_alkes']))
    {
        $this->nm_new_label['tarif_rs_alkes'] = "Tarif Alkes";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_alkes = $this->tarif_rs_alkes;
   $sStyleHidden_tarif_rs_alkes = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_alkes']) && $this->nmgp_cmp_hidden['tarif_rs_alkes'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_alkes']);
       $sStyleHidden_tarif_rs_alkes = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_alkes = 'display: none;';
   $sStyleReadInp_tarif_rs_alkes = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_alkes']) && $this->nmgp_cmp_readonly['tarif_rs_alkes'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_alkes']);
       $sStyleReadLab_tarif_rs_alkes = '';
       $sStyleReadInp_tarif_rs_alkes = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_alkes']) && $this->nmgp_cmp_hidden['tarif_rs_alkes'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_alkes" value="<?php echo $this->form_encode_input($tarif_rs_alkes) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_alkes_label" id="hidden_field_label_tarif_rs_alkes" style="<?php echo $sStyleHidden_tarif_rs_alkes; ?>"><span id="id_label_tarif_rs_alkes"><?php echo $this->nm_new_label['tarif_rs_alkes']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_alkes_line" id="hidden_field_data_tarif_rs_alkes" style="<?php echo $sStyleHidden_tarif_rs_alkes; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_alkes"]) &&  $this->nmgp_cmp_readonly["tarif_rs_alkes"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_alkes" value="<?php echo $this->form_encode_input($tarif_rs_alkes) . "\">" . $tarif_rs_alkes . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_alkes" class="sc-ui-readonly-tarif_rs_alkes css_tarif_rs_alkes_line" style="<?php echo $sStyleReadLab_tarif_rs_alkes; ?>"><?php echo $this->tarif_rs_alkes; ?></span><span id="id_read_off_tarif_rs_alkes" class="css_read_off_tarif_rs_alkes" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_alkes; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_alkes_obj" style="" id="id_sc_field_tarif_rs_alkes" type=text name="tarif_rs_alkes" value="<?php echo $this->form_encode_input($tarif_rs_alkes) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '500000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['tarif_rs_bmhp']))
    {
        $this->nm_new_label['tarif_rs_bmhp'] = "Tarif BMHP";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_bmhp = $this->tarif_rs_bmhp;
   $sStyleHidden_tarif_rs_bmhp = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_bmhp']) && $this->nmgp_cmp_hidden['tarif_rs_bmhp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_bmhp']);
       $sStyleHidden_tarif_rs_bmhp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_bmhp = 'display: none;';
   $sStyleReadInp_tarif_rs_bmhp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_bmhp']) && $this->nmgp_cmp_readonly['tarif_rs_bmhp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_bmhp']);
       $sStyleReadLab_tarif_rs_bmhp = '';
       $sStyleReadInp_tarif_rs_bmhp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_bmhp']) && $this->nmgp_cmp_hidden['tarif_rs_bmhp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_bmhp" value="<?php echo $this->form_encode_input($tarif_rs_bmhp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_bmhp_label" id="hidden_field_label_tarif_rs_bmhp" style="<?php echo $sStyleHidden_tarif_rs_bmhp; ?>"><span id="id_label_tarif_rs_bmhp"><?php echo $this->nm_new_label['tarif_rs_bmhp']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_bmhp_line" id="hidden_field_data_tarif_rs_bmhp" style="<?php echo $sStyleHidden_tarif_rs_bmhp; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_bmhp"]) &&  $this->nmgp_cmp_readonly["tarif_rs_bmhp"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_bmhp" value="<?php echo $this->form_encode_input($tarif_rs_bmhp) . "\">" . $tarif_rs_bmhp . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_bmhp" class="sc-ui-readonly-tarif_rs_bmhp css_tarif_rs_bmhp_line" style="<?php echo $sStyleReadLab_tarif_rs_bmhp; ?>"><?php echo $this->tarif_rs_bmhp; ?></span><span id="id_read_off_tarif_rs_bmhp" class="css_read_off_tarif_rs_bmhp" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_bmhp; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_bmhp_obj" style="" id="id_sc_field_tarif_rs_bmhp" type=text name="tarif_rs_bmhp" value="<?php echo $this->form_encode_input($tarif_rs_bmhp) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '400000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tarif_rs_sewa_alat']))
    {
        $this->nm_new_label['tarif_rs_sewa_alat'] = "Tarif Sewa Alat";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_rs_sewa_alat = $this->tarif_rs_sewa_alat;
   $sStyleHidden_tarif_rs_sewa_alat = '';
   if (isset($this->nmgp_cmp_hidden['tarif_rs_sewa_alat']) && $this->nmgp_cmp_hidden['tarif_rs_sewa_alat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_rs_sewa_alat']);
       $sStyleHidden_tarif_rs_sewa_alat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_rs_sewa_alat = 'display: none;';
   $sStyleReadInp_tarif_rs_sewa_alat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_rs_sewa_alat']) && $this->nmgp_cmp_readonly['tarif_rs_sewa_alat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_rs_sewa_alat']);
       $sStyleReadLab_tarif_rs_sewa_alat = '';
       $sStyleReadInp_tarif_rs_sewa_alat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_rs_sewa_alat']) && $this->nmgp_cmp_hidden['tarif_rs_sewa_alat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_rs_sewa_alat" value="<?php echo $this->form_encode_input($tarif_rs_sewa_alat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_rs_sewa_alat_label" id="hidden_field_label_tarif_rs_sewa_alat" style="<?php echo $sStyleHidden_tarif_rs_sewa_alat; ?>"><span id="id_label_tarif_rs_sewa_alat"><?php echo $this->nm_new_label['tarif_rs_sewa_alat']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_rs_sewa_alat_line" id="hidden_field_data_tarif_rs_sewa_alat" style="<?php echo $sStyleHidden_tarif_rs_sewa_alat; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_rs_sewa_alat"]) &&  $this->nmgp_cmp_readonly["tarif_rs_sewa_alat"] == "on") { 

 ?>
<input type="hidden" name="tarif_rs_sewa_alat" value="<?php echo $this->form_encode_input($tarif_rs_sewa_alat) . "\">" . $tarif_rs_sewa_alat . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_rs_sewa_alat" class="sc-ui-readonly-tarif_rs_sewa_alat css_tarif_rs_sewa_alat_line" style="<?php echo $sStyleReadLab_tarif_rs_sewa_alat; ?>"><?php echo $this->tarif_rs_sewa_alat; ?></span><span id="id_read_off_tarif_rs_sewa_alat" class="css_read_off_tarif_rs_sewa_alat" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_rs_sewa_alat; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_rs_sewa_alat_obj" style="" id="id_sc_field_tarif_rs_sewa_alat" type=text name="tarif_rs_sewa_alat" value="<?php echo $this->form_encode_input($tarif_rs_sewa_alat) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '210000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['tarif_poli_eks']))
    {
        $this->nm_new_label['tarif_poli_eks'] = "Tarif Poli Eksekutif";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif_poli_eks = $this->tarif_poli_eks;
   $sStyleHidden_tarif_poli_eks = '';
   if (isset($this->nmgp_cmp_hidden['tarif_poli_eks']) && $this->nmgp_cmp_hidden['tarif_poli_eks'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif_poli_eks']);
       $sStyleHidden_tarif_poli_eks = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif_poli_eks = 'display: none;';
   $sStyleReadInp_tarif_poli_eks = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif_poli_eks']) && $this->nmgp_cmp_readonly['tarif_poli_eks'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif_poli_eks']);
       $sStyleReadLab_tarif_poli_eks = '';
       $sStyleReadInp_tarif_poli_eks = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif_poli_eks']) && $this->nmgp_cmp_hidden['tarif_poli_eks'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif_poli_eks" value="<?php echo $this->form_encode_input($tarif_poli_eks) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarif_poli_eks_label" id="hidden_field_label_tarif_poli_eks" style="<?php echo $sStyleHidden_tarif_poli_eks; ?>"><span id="id_label_tarif_poli_eks"><?php echo $this->nm_new_label['tarif_poli_eks']; ?></span></TD>
    <TD class="scFormDataOdd css_tarif_poli_eks_line" id="hidden_field_data_tarif_poli_eks" style="<?php echo $sStyleHidden_tarif_poli_eks; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarif_poli_eks"]) &&  $this->nmgp_cmp_readonly["tarif_poli_eks"] == "on") { 

 ?>
<input type="hidden" name="tarif_poli_eks" value="<?php echo $this->form_encode_input($tarif_poli_eks) . "\">" . $tarif_poli_eks . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarif_poli_eks" class="sc-ui-readonly-tarif_poli_eks css_tarif_poli_eks_line" style="<?php echo $sStyleReadLab_tarif_poli_eks; ?>"><?php echo $this->tarif_poli_eks; ?></span><span id="id_read_off_tarif_poli_eks" class="css_read_off_tarif_poli_eks" style="white-space: nowrap;<?php echo $sStyleReadInp_tarif_poli_eks; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarif_poli_eks_obj" style="" id="id_sc_field_tarif_poli_eks" type=text name="tarif_poli_eks" value="<?php echo $this->form_encode_input($tarif_poli_eks) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '100000', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nama_dokter']))
    {
        $this->nm_new_label['nama_dokter'] = "Nama Dokter";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nama_dokter = $this->nama_dokter;
   $sStyleHidden_nama_dokter = '';
   if (isset($this->nmgp_cmp_hidden['nama_dokter']) && $this->nmgp_cmp_hidden['nama_dokter'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nama_dokter']);
       $sStyleHidden_nama_dokter = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nama_dokter = 'display: none;';
   $sStyleReadInp_nama_dokter = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nama_dokter']) && $this->nmgp_cmp_readonly['nama_dokter'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nama_dokter']);
       $sStyleReadLab_nama_dokter = '';
       $sStyleReadInp_nama_dokter = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nama_dokter']) && $this->nmgp_cmp_hidden['nama_dokter'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nama_dokter" value="<?php echo $this->form_encode_input($nama_dokter) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nama_dokter_label" id="hidden_field_label_nama_dokter" style="<?php echo $sStyleHidden_nama_dokter; ?>"><span id="id_label_nama_dokter"><?php echo $this->nm_new_label['nama_dokter']; ?></span></TD>
    <TD class="scFormDataOdd css_nama_dokter_line" id="hidden_field_data_nama_dokter" style="<?php echo $sStyleHidden_nama_dokter; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nama_dokter"]) &&  $this->nmgp_cmp_readonly["nama_dokter"] == "on") { 

 ?>
<input type="hidden" name="nama_dokter" value="<?php echo $this->form_encode_input($nama_dokter) . "\">" . $nama_dokter . ""; ?>
<?php } else { ?>
<span id="id_read_on_nama_dokter" class="sc-ui-readonly-nama_dokter css_nama_dokter_line" style="<?php echo $sStyleReadLab_nama_dokter; ?>"><?php echo $this->nama_dokter; ?></span><span id="id_read_off_nama_dokter" class="css_read_off_nama_dokter" style="white-space: nowrap;<?php echo $sStyleReadInp_nama_dokter; ?>">
 <input class="sc-js-input scFormObjectOdd css_nama_dokter_obj" style="" id="id_sc_field_nama_dokter" type=text name="nama_dokter" value="<?php echo $this->form_encode_input($nama_dokter) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'RUDY, DR', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['kode_tarif']))
    {
        $this->nm_new_label['kode_tarif'] = "Kode Tarif";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kode_tarif = $this->kode_tarif;
   $sStyleHidden_kode_tarif = '';
   if (isset($this->nmgp_cmp_hidden['kode_tarif']) && $this->nmgp_cmp_hidden['kode_tarif'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kode_tarif']);
       $sStyleHidden_kode_tarif = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kode_tarif = 'display: none;';
   $sStyleReadInp_kode_tarif = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kode_tarif']) && $this->nmgp_cmp_readonly['kode_tarif'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kode_tarif']);
       $sStyleReadLab_kode_tarif = '';
       $sStyleReadInp_kode_tarif = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kode_tarif']) && $this->nmgp_cmp_hidden['kode_tarif'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kode_tarif" value="<?php echo $this->form_encode_input($kode_tarif) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kode_tarif_label" id="hidden_field_label_kode_tarif" style="<?php echo $sStyleHidden_kode_tarif; ?>"><span id="id_label_kode_tarif"><?php echo $this->nm_new_label['kode_tarif']; ?></span></TD>
    <TD class="scFormDataOdd css_kode_tarif_line" id="hidden_field_data_kode_tarif" style="<?php echo $sStyleHidden_kode_tarif; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kode_tarif"]) &&  $this->nmgp_cmp_readonly["kode_tarif"] == "on") { 

 ?>
<input type="hidden" name="kode_tarif" value="<?php echo $this->form_encode_input($kode_tarif) . "\">" . $kode_tarif . ""; ?>
<?php } else { ?>
<span id="id_read_on_kode_tarif" class="sc-ui-readonly-kode_tarif css_kode_tarif_line" style="<?php echo $sStyleReadLab_kode_tarif; ?>"><?php echo $this->kode_tarif; ?></span><span id="id_read_off_kode_tarif" class="css_read_off_kode_tarif" style="white-space: nowrap;<?php echo $sStyleReadInp_kode_tarif; ?>">
 <input class="sc-js-input scFormObjectOdd css_kode_tarif_obj" style="" id="id_sc_field_kode_tarif" type=text name="kode_tarif" value="<?php echo $this->form_encode_input($kode_tarif) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'AP', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['payor_id']))
    {
        $this->nm_new_label['payor_id'] = "Payor ID";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $payor_id = $this->payor_id;
   $sStyleHidden_payor_id = '';
   if (isset($this->nmgp_cmp_hidden['payor_id']) && $this->nmgp_cmp_hidden['payor_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['payor_id']);
       $sStyleHidden_payor_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_payor_id = 'display: none;';
   $sStyleReadInp_payor_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['payor_id']) && $this->nmgp_cmp_readonly['payor_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['payor_id']);
       $sStyleReadLab_payor_id = '';
       $sStyleReadInp_payor_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['payor_id']) && $this->nmgp_cmp_hidden['payor_id'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="payor_id" value="<?php echo $this->form_encode_input($payor_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_payor_id_label" id="hidden_field_label_payor_id" style="<?php echo $sStyleHidden_payor_id; ?>"><span id="id_label_payor_id"><?php echo $this->nm_new_label['payor_id']; ?></span></TD>
    <TD class="scFormDataOdd css_payor_id_line" id="hidden_field_data_payor_id" style="<?php echo $sStyleHidden_payor_id; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["payor_id"]) &&  $this->nmgp_cmp_readonly["payor_id"] == "on") { 

 ?>
<input type="hidden" name="payor_id" value="<?php echo $this->form_encode_input($payor_id) . "\">" . $payor_id . ""; ?>
<?php } else { ?>
<span id="id_read_on_payor_id" class="sc-ui-readonly-payor_id css_payor_id_line" style="<?php echo $sStyleReadLab_payor_id; ?>"><?php echo $this->payor_id; ?></span><span id="id_read_off_payor_id" class="css_read_off_payor_id" style="white-space: nowrap;<?php echo $sStyleReadInp_payor_id; ?>">
 <input class="sc-js-input scFormObjectOdd css_payor_id_obj" style="" id="id_sc_field_payor_id" type=text name="payor_id" value="<?php echo $this->form_encode_input($payor_id) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '3', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['payor_cd']))
    {
        $this->nm_new_label['payor_cd'] = "Payor Code";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $payor_cd = $this->payor_cd;
   $sStyleHidden_payor_cd = '';
   if (isset($this->nmgp_cmp_hidden['payor_cd']) && $this->nmgp_cmp_hidden['payor_cd'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['payor_cd']);
       $sStyleHidden_payor_cd = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_payor_cd = 'display: none;';
   $sStyleReadInp_payor_cd = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['payor_cd']) && $this->nmgp_cmp_readonly['payor_cd'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['payor_cd']);
       $sStyleReadLab_payor_cd = '';
       $sStyleReadInp_payor_cd = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['payor_cd']) && $this->nmgp_cmp_hidden['payor_cd'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="payor_cd" value="<?php echo $this->form_encode_input($payor_cd) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_payor_cd_label" id="hidden_field_label_payor_cd" style="<?php echo $sStyleHidden_payor_cd; ?>"><span id="id_label_payor_cd"><?php echo $this->nm_new_label['payor_cd']; ?></span></TD>
    <TD class="scFormDataOdd css_payor_cd_line" id="hidden_field_data_payor_cd" style="<?php echo $sStyleHidden_payor_cd; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["payor_cd"]) &&  $this->nmgp_cmp_readonly["payor_cd"] == "on") { 

 ?>
<input type="hidden" name="payor_cd" value="<?php echo $this->form_encode_input($payor_cd) . "\">" . $payor_cd . ""; ?>
<?php } else { ?>
<span id="id_read_on_payor_cd" class="sc-ui-readonly-payor_cd css_payor_cd_line" style="<?php echo $sStyleReadLab_payor_cd; ?>"><?php echo $this->payor_cd; ?></span><span id="id_read_off_payor_cd" class="css_read_off_payor_cd" style="white-space: nowrap;<?php echo $sStyleReadInp_payor_cd; ?>">
 <input class="sc-js-input scFormObjectOdd css_payor_cd_obj" style="" id="id_sc_field_payor_cd" type=text name="payor_cd" value="<?php echo $this->form_encode_input($payor_cd) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'JKN', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cob_cd']))
    {
        $this->nm_new_label['cob_cd'] = "COB Code";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cob_cd = $this->cob_cd;
   $sStyleHidden_cob_cd = '';
   if (isset($this->nmgp_cmp_hidden['cob_cd']) && $this->nmgp_cmp_hidden['cob_cd'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cob_cd']);
       $sStyleHidden_cob_cd = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cob_cd = 'display: none;';
   $sStyleReadInp_cob_cd = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cob_cd']) && $this->nmgp_cmp_readonly['cob_cd'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cob_cd']);
       $sStyleReadLab_cob_cd = '';
       $sStyleReadInp_cob_cd = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cob_cd']) && $this->nmgp_cmp_hidden['cob_cd'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cob_cd" value="<?php echo $this->form_encode_input($cob_cd) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cob_cd_label" id="hidden_field_label_cob_cd" style="<?php echo $sStyleHidden_cob_cd; ?>"><span id="id_label_cob_cd"><?php echo $this->nm_new_label['cob_cd']; ?></span></TD>
    <TD class="scFormDataOdd css_cob_cd_line" id="hidden_field_data_cob_cd" style="<?php echo $sStyleHidden_cob_cd; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cob_cd"]) &&  $this->nmgp_cmp_readonly["cob_cd"] == "on") { 

 ?>
<input type="hidden" name="cob_cd" value="<?php echo $this->form_encode_input($cob_cd) . "\">" . $cob_cd . ""; ?>
<?php } else { ?>
<span id="id_read_on_cob_cd" class="sc-ui-readonly-cob_cd css_cob_cd_line" style="<?php echo $sStyleReadLab_cob_cd; ?>"><?php echo $this->cob_cd; ?></span><span id="id_read_off_cob_cd" class="css_read_off_cob_cd" style="white-space: nowrap;<?php echo $sStyleReadInp_cob_cd; ?>">
 <input class="sc-js-input scFormObjectOdd css_cob_cd_obj" style="" id="id_sc_field_cob_cd" type=text name="cob_cd" value="<?php echo $this->form_encode_input($cob_cd) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '0001', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>
<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
        $sCondStyle = ($this->nmgp_botoes['ok'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bok", "scBtnFn_sys_format_ok()", "scBtnFn_sys_format_ok()", "sub_form_b", "", "Simpan", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
?>
       
<?php
           if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
            </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_eclaim_klaim_update_data");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_eclaim_klaim_update_data");
 parent.scAjaxDetailHeight("form_eclaim_klaim_update_data", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_eclaim_klaim_update_data", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_eclaim_klaim_update_data", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_ok() {
		if ($("#sub_form_b.sc-unique-btn-1").length && $("#sub_form_b.sc-unique-btn-1").is(":visible")) {
			nm_atualiza('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_b").length && $("#sc_b_hlp_b").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#Bsair_b.sc-unique-btn-2").length && $("#Bsair_b.sc-unique-btn-2").is(":visible")) {
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-3").length && $("#Bsair_b.sc-unique-btn-3").is(":visible")) {
			nm_saida_glo(); return false;
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['buttonStatus'] = $this->nmgp_botoes;
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
