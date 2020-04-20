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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("Buat LPK"); } ?></TITLE>
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
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['embutida_pdf']))
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
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_vclaim_lpk_update/form_vclaim_lpk_update_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_vclaim_lpk_update_sajax_js.php");
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

include_once('form_vclaim_lpk_update_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_vclaim_lpk_update_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_vclaim_lpk_update'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_vclaim_lpk_update'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""; } else { echo "Buat LPK"; } ?></div>
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['empty_filter'] = true;
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
    if (!isset($this->nm_new_label['nosep']))
    {
        $this->nm_new_label['nosep'] = "No. SEP";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nosep = $this->nosep;
   $sStyleHidden_nosep = '';
   if (isset($this->nmgp_cmp_hidden['nosep']) && $this->nmgp_cmp_hidden['nosep'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nosep']);
       $sStyleHidden_nosep = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nosep = 'display: none;';
   $sStyleReadInp_nosep = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nosep']) && $this->nmgp_cmp_readonly['nosep'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nosep']);
       $sStyleReadLab_nosep = '';
       $sStyleReadInp_nosep = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nosep']) && $this->nmgp_cmp_hidden['nosep'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nosep" value="<?php echo $this->form_encode_input($nosep) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nosep_label" id="hidden_field_label_nosep" style="<?php echo $sStyleHidden_nosep; ?>"><span id="id_label_nosep"><?php echo $this->nm_new_label['nosep']; ?></span></TD>
    <TD class="scFormDataOdd css_nosep_line" id="hidden_field_data_nosep" style="<?php echo $sStyleHidden_nosep; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nosep"]) &&  $this->nmgp_cmp_readonly["nosep"] == "on") { 

 ?>
<input type="hidden" name="nosep" value="<?php echo $this->form_encode_input($nosep) . "\">" . $nosep . ""; ?>
<?php } else { ?>
<span id="id_read_on_nosep" class="sc-ui-readonly-nosep css_nosep_line" style="<?php echo $sStyleReadLab_nosep; ?>"><?php echo $this->nosep; ?></span><span id="id_read_off_nosep" class="css_read_off_nosep" style="white-space: nowrap;<?php echo $sStyleReadInp_nosep; ?>">
 <input class="sc-js-input scFormObjectOdd css_nosep_obj" style="" id="id_sc_field_nosep" type=text name="nosep" value="<?php echo $this->form_encode_input($nosep) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tglmasuk']))
    {
        $this->nm_new_label['tglmasuk'] = "Tanggal Masuk";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tglmasuk = $this->tglmasuk;
   $sStyleHidden_tglmasuk = '';
   if (isset($this->nmgp_cmp_hidden['tglmasuk']) && $this->nmgp_cmp_hidden['tglmasuk'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tglmasuk']);
       $sStyleHidden_tglmasuk = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tglmasuk = 'display: none;';
   $sStyleReadInp_tglmasuk = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tglmasuk']) && $this->nmgp_cmp_readonly['tglmasuk'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tglmasuk']);
       $sStyleReadLab_tglmasuk = '';
       $sStyleReadInp_tglmasuk = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tglmasuk']) && $this->nmgp_cmp_hidden['tglmasuk'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tglmasuk" value="<?php echo $this->form_encode_input($tglmasuk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tglmasuk_label" id="hidden_field_label_tglmasuk" style="<?php echo $sStyleHidden_tglmasuk; ?>"><span id="id_label_tglmasuk"><?php echo $this->nm_new_label['tglmasuk']; ?></span></TD>
    <TD class="scFormDataOdd css_tglmasuk_line" id="hidden_field_data_tglmasuk" style="<?php echo $sStyleHidden_tglmasuk; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tglmasuk"]) &&  $this->nmgp_cmp_readonly["tglmasuk"] == "on") { 

 ?>
<input type="hidden" name="tglmasuk" value="<?php echo $this->form_encode_input($tglmasuk) . "\">" . $tglmasuk . ""; ?>
<?php } else { ?>
<span id="id_read_on_tglmasuk" class="sc-ui-readonly-tglmasuk css_tglmasuk_line" style="<?php echo $sStyleReadLab_tglmasuk; ?>"><?php echo $this->tglmasuk; ?></span><span id="id_read_off_tglmasuk" class="css_read_off_tglmasuk" style="white-space: nowrap;<?php echo $sStyleReadInp_tglmasuk; ?>">
 <input class="sc-js-input scFormObjectOdd css_tglmasuk_obj" style="" id="id_sc_field_tglmasuk" type=text name="tglmasuk" value="<?php echo $this->form_encode_input($tglmasuk) ?>"
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
    if (!isset($this->nm_new_label['tglkeluar']))
    {
        $this->nm_new_label['tglkeluar'] = "Tanggal Keluar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tglkeluar = $this->tglkeluar;
   $sStyleHidden_tglkeluar = '';
   if (isset($this->nmgp_cmp_hidden['tglkeluar']) && $this->nmgp_cmp_hidden['tglkeluar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tglkeluar']);
       $sStyleHidden_tglkeluar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tglkeluar = 'display: none;';
   $sStyleReadInp_tglkeluar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tglkeluar']) && $this->nmgp_cmp_readonly['tglkeluar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tglkeluar']);
       $sStyleReadLab_tglkeluar = '';
       $sStyleReadInp_tglkeluar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tglkeluar']) && $this->nmgp_cmp_hidden['tglkeluar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tglkeluar" value="<?php echo $this->form_encode_input($tglkeluar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tglkeluar_label" id="hidden_field_label_tglkeluar" style="<?php echo $sStyleHidden_tglkeluar; ?>"><span id="id_label_tglkeluar"><?php echo $this->nm_new_label['tglkeluar']; ?></span></TD>
    <TD class="scFormDataOdd css_tglkeluar_line" id="hidden_field_data_tglkeluar" style="<?php echo $sStyleHidden_tglkeluar; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tglkeluar"]) &&  $this->nmgp_cmp_readonly["tglkeluar"] == "on") { 

 ?>
<input type="hidden" name="tglkeluar" value="<?php echo $this->form_encode_input($tglkeluar) . "\">" . $tglkeluar . ""; ?>
<?php } else { ?>
<span id="id_read_on_tglkeluar" class="sc-ui-readonly-tglkeluar css_tglkeluar_line" style="<?php echo $sStyleReadLab_tglkeluar; ?>"><?php echo $this->tglkeluar; ?></span><span id="id_read_off_tglkeluar" class="css_read_off_tglkeluar" style="white-space: nowrap;<?php echo $sStyleReadInp_tglkeluar; ?>">
 <input class="sc-js-input scFormObjectOdd css_tglkeluar_obj" style="" id="id_sc_field_tglkeluar" type=text name="tglkeluar" value="<?php echo $this->form_encode_input($tglkeluar) ?>"
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
    if (!isset($this->nm_new_label['jaminan']))
    {
        $this->nm_new_label['jaminan'] = "Jaminan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jaminan = $this->jaminan;
   $sStyleHidden_jaminan = '';
   if (isset($this->nmgp_cmp_hidden['jaminan']) && $this->nmgp_cmp_hidden['jaminan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jaminan']);
       $sStyleHidden_jaminan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jaminan = 'display: none;';
   $sStyleReadInp_jaminan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jaminan']) && $this->nmgp_cmp_readonly['jaminan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jaminan']);
       $sStyleReadLab_jaminan = '';
       $sStyleReadInp_jaminan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jaminan']) && $this->nmgp_cmp_hidden['jaminan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jaminan" value="<?php echo $this->form_encode_input($jaminan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_jaminan_label" id="hidden_field_label_jaminan" style="<?php echo $sStyleHidden_jaminan; ?>"><span id="id_label_jaminan"><?php echo $this->nm_new_label['jaminan']; ?></span></TD>
    <TD class="scFormDataOdd css_jaminan_line" id="hidden_field_data_jaminan" style="<?php echo $sStyleHidden_jaminan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jaminan"]) &&  $this->nmgp_cmp_readonly["jaminan"] == "on") { 

 ?>
<input type="hidden" name="jaminan" value="<?php echo $this->form_encode_input($jaminan) . "\">" . $jaminan . ""; ?>
<?php } else { ?>
<span id="id_read_on_jaminan" class="sc-ui-readonly-jaminan css_jaminan_line" style="<?php echo $sStyleReadLab_jaminan; ?>"><?php echo $this->jaminan; ?></span><span id="id_read_off_jaminan" class="css_read_off_jaminan" style="white-space: nowrap;<?php echo $sStyleReadInp_jaminan; ?>">
 <input class="sc-js-input scFormObjectOdd css_jaminan_obj" style="" id="id_sc_field_jaminan" type=text name="jaminan" value="<?php echo $this->form_encode_input($jaminan) ?>"
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
    if (!isset($this->nm_new_label['poli']))
    {
        $this->nm_new_label['poli'] = "Poli";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $poli = $this->poli;
   $sStyleHidden_poli = '';
   if (isset($this->nmgp_cmp_hidden['poli']) && $this->nmgp_cmp_hidden['poli'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['poli']);
       $sStyleHidden_poli = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_poli = 'display: none;';
   $sStyleReadInp_poli = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['poli']) && $this->nmgp_cmp_readonly['poli'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['poli']);
       $sStyleReadLab_poli = '';
       $sStyleReadInp_poli = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['poli']) && $this->nmgp_cmp_hidden['poli'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="poli" value="<?php echo $this->form_encode_input($poli) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_poli_label" id="hidden_field_label_poli" style="<?php echo $sStyleHidden_poli; ?>"><span id="id_label_poli"><?php echo $this->nm_new_label['poli']; ?></span></TD>
    <TD class="scFormDataOdd css_poli_line" id="hidden_field_data_poli" style="<?php echo $sStyleHidden_poli; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["poli"]) &&  $this->nmgp_cmp_readonly["poli"] == "on") { 

 ?>
<input type="hidden" name="poli" value="<?php echo $this->form_encode_input($poli) . "\">" . $poli . ""; ?>
<?php } else { ?>
<span id="id_read_on_poli" class="sc-ui-readonly-poli css_poli_line" style="<?php echo $sStyleReadLab_poli; ?>"><?php echo $this->poli; ?></span><span id="id_read_off_poli" class="css_read_off_poli" style="white-space: nowrap;<?php echo $sStyleReadInp_poli; ?>">
 <input class="sc-js-input scFormObjectOdd css_poli_obj" style="" id="id_sc_field_poli" type=text name="poli" value="<?php echo $this->form_encode_input($poli) ?>"
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
    if (!isset($this->nm_new_label['nmpoli']))
    {
        $this->nm_new_label['nmpoli'] = "Nama Poli";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nmpoli = $this->nmpoli;
   $sStyleHidden_nmpoli = '';
   if (isset($this->nmgp_cmp_hidden['nmpoli']) && $this->nmgp_cmp_hidden['nmpoli'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nmpoli']);
       $sStyleHidden_nmpoli = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nmpoli = 'display: none;';
   $sStyleReadInp_nmpoli = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nmpoli']) && $this->nmgp_cmp_readonly['nmpoli'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nmpoli']);
       $sStyleReadLab_nmpoli = '';
       $sStyleReadInp_nmpoli = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nmpoli']) && $this->nmgp_cmp_hidden['nmpoli'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nmpoli" value="<?php echo $this->form_encode_input($nmpoli) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nmpoli_label" id="hidden_field_label_nmpoli" style="<?php echo $sStyleHidden_nmpoli; ?>"><span id="id_label_nmpoli"><?php echo $this->nm_new_label['nmpoli']; ?></span></TD>
    <TD class="scFormDataOdd css_nmpoli_line" id="hidden_field_data_nmpoli" style="<?php echo $sStyleHidden_nmpoli; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nmpoli"]) &&  $this->nmgp_cmp_readonly["nmpoli"] == "on") { 

 ?>
<input type="hidden" name="nmpoli" value="<?php echo $this->form_encode_input($nmpoli) . "\">" . $nmpoli . ""; ?>
<?php } else { ?>
<span id="id_read_on_nmpoli" class="sc-ui-readonly-nmpoli css_nmpoli_line" style="<?php echo $sStyleReadLab_nmpoli; ?>"><?php echo $this->nmpoli; ?></span><span id="id_read_off_nmpoli" class="css_read_off_nmpoli" style="white-space: nowrap;<?php echo $sStyleReadInp_nmpoli; ?>">
 <input class="sc-js-input scFormObjectOdd css_nmpoli_obj" style="" id="id_sc_field_nmpoli" type=text name="nmpoli" value="<?php echo $this->form_encode_input($nmpoli) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ruangrawat']))
    {
        $this->nm_new_label['ruangrawat'] = "Ruang Rawat";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ruangrawat = $this->ruangrawat;
   $sStyleHidden_ruangrawat = '';
   if (isset($this->nmgp_cmp_hidden['ruangrawat']) && $this->nmgp_cmp_hidden['ruangrawat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ruangrawat']);
       $sStyleHidden_ruangrawat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ruangrawat = 'display: none;';
   $sStyleReadInp_ruangrawat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ruangrawat']) && $this->nmgp_cmp_readonly['ruangrawat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ruangrawat']);
       $sStyleReadLab_ruangrawat = '';
       $sStyleReadInp_ruangrawat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ruangrawat']) && $this->nmgp_cmp_hidden['ruangrawat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ruangrawat" value="<?php echo $this->form_encode_input($ruangrawat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ruangrawat_label" id="hidden_field_label_ruangrawat" style="<?php echo $sStyleHidden_ruangrawat; ?>"><span id="id_label_ruangrawat"><?php echo $this->nm_new_label['ruangrawat']; ?></span></TD>
    <TD class="scFormDataOdd css_ruangrawat_line" id="hidden_field_data_ruangrawat" style="<?php echo $sStyleHidden_ruangrawat; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ruangrawat"]) &&  $this->nmgp_cmp_readonly["ruangrawat"] == "on") { 

 ?>
<input type="hidden" name="ruangrawat" value="<?php echo $this->form_encode_input($ruangrawat) . "\">" . $ruangrawat . ""; ?>
<?php } else { ?>
<span id="id_read_on_ruangrawat" class="sc-ui-readonly-ruangrawat css_ruangrawat_line" style="<?php echo $sStyleReadLab_ruangrawat; ?>"><?php echo $this->ruangrawat; ?></span><span id="id_read_off_ruangrawat" class="css_read_off_ruangrawat" style="white-space: nowrap;<?php echo $sStyleReadInp_ruangrawat; ?>">
 <input class="sc-js-input scFormObjectOdd css_ruangrawat_obj" style="" id="id_sc_field_ruangrawat" type=text name="ruangrawat" value="<?php echo $this->form_encode_input($ruangrawat) ?>"
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
    if (!isset($this->nm_new_label['kelasrawat']))
    {
        $this->nm_new_label['kelasrawat'] = "Kelas Rawat";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kelasrawat = $this->kelasrawat;
   $sStyleHidden_kelasrawat = '';
   if (isset($this->nmgp_cmp_hidden['kelasrawat']) && $this->nmgp_cmp_hidden['kelasrawat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kelasrawat']);
       $sStyleHidden_kelasrawat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kelasrawat = 'display: none;';
   $sStyleReadInp_kelasrawat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kelasrawat']) && $this->nmgp_cmp_readonly['kelasrawat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kelasrawat']);
       $sStyleReadLab_kelasrawat = '';
       $sStyleReadInp_kelasrawat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kelasrawat']) && $this->nmgp_cmp_hidden['kelasrawat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kelasrawat" value="<?php echo $this->form_encode_input($kelasrawat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kelasrawat_label" id="hidden_field_label_kelasrawat" style="<?php echo $sStyleHidden_kelasrawat; ?>"><span id="id_label_kelasrawat"><?php echo $this->nm_new_label['kelasrawat']; ?></span></TD>
    <TD class="scFormDataOdd css_kelasrawat_line" id="hidden_field_data_kelasrawat" style="<?php echo $sStyleHidden_kelasrawat; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kelasrawat"]) &&  $this->nmgp_cmp_readonly["kelasrawat"] == "on") { 

 ?>
<input type="hidden" name="kelasrawat" value="<?php echo $this->form_encode_input($kelasrawat) . "\">" . $kelasrawat . ""; ?>
<?php } else { ?>
<span id="id_read_on_kelasrawat" class="sc-ui-readonly-kelasrawat css_kelasrawat_line" style="<?php echo $sStyleReadLab_kelasrawat; ?>"><?php echo $this->kelasrawat; ?></span><span id="id_read_off_kelasrawat" class="css_read_off_kelasrawat" style="white-space: nowrap;<?php echo $sStyleReadInp_kelasrawat; ?>">
 <input class="sc-js-input scFormObjectOdd css_kelasrawat_obj" style="" id="id_sc_field_kelasrawat" type=text name="kelasrawat" value="<?php echo $this->form_encode_input($kelasrawat) ?>"
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
    if (!isset($this->nm_new_label['spesialistik']))
    {
        $this->nm_new_label['spesialistik'] = "Spesialistik";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $spesialistik = $this->spesialistik;
   $sStyleHidden_spesialistik = '';
   if (isset($this->nmgp_cmp_hidden['spesialistik']) && $this->nmgp_cmp_hidden['spesialistik'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['spesialistik']);
       $sStyleHidden_spesialistik = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_spesialistik = 'display: none;';
   $sStyleReadInp_spesialistik = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['spesialistik']) && $this->nmgp_cmp_readonly['spesialistik'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['spesialistik']);
       $sStyleReadLab_spesialistik = '';
       $sStyleReadInp_spesialistik = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['spesialistik']) && $this->nmgp_cmp_hidden['spesialistik'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="spesialistik" value="<?php echo $this->form_encode_input($spesialistik) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_spesialistik_label" id="hidden_field_label_spesialistik" style="<?php echo $sStyleHidden_spesialistik; ?>"><span id="id_label_spesialistik"><?php echo $this->nm_new_label['spesialistik']; ?></span></TD>
    <TD class="scFormDataOdd css_spesialistik_line" id="hidden_field_data_spesialistik" style="<?php echo $sStyleHidden_spesialistik; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["spesialistik"]) &&  $this->nmgp_cmp_readonly["spesialistik"] == "on") { 

 ?>
<input type="hidden" name="spesialistik" value="<?php echo $this->form_encode_input($spesialistik) . "\">" . $spesialistik . ""; ?>
<?php } else { ?>
<span id="id_read_on_spesialistik" class="sc-ui-readonly-spesialistik css_spesialistik_line" style="<?php echo $sStyleReadLab_spesialistik; ?>"><?php echo $this->spesialistik; ?></span><span id="id_read_off_spesialistik" class="css_read_off_spesialistik" style="white-space: nowrap;<?php echo $sStyleReadInp_spesialistik; ?>">
 <input class="sc-js-input scFormObjectOdd css_spesialistik_obj" style="" id="id_sc_field_spesialistik" type=text name="spesialistik" value="<?php echo $this->form_encode_input($spesialistik) ?>"
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
    if (!isset($this->nm_new_label['carakeluar']))
    {
        $this->nm_new_label['carakeluar'] = "Cara Keluar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $carakeluar = $this->carakeluar;
   $sStyleHidden_carakeluar = '';
   if (isset($this->nmgp_cmp_hidden['carakeluar']) && $this->nmgp_cmp_hidden['carakeluar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['carakeluar']);
       $sStyleHidden_carakeluar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_carakeluar = 'display: none;';
   $sStyleReadInp_carakeluar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['carakeluar']) && $this->nmgp_cmp_readonly['carakeluar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['carakeluar']);
       $sStyleReadLab_carakeluar = '';
       $sStyleReadInp_carakeluar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['carakeluar']) && $this->nmgp_cmp_hidden['carakeluar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="carakeluar" value="<?php echo $this->form_encode_input($carakeluar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_carakeluar_label" id="hidden_field_label_carakeluar" style="<?php echo $sStyleHidden_carakeluar; ?>"><span id="id_label_carakeluar"><?php echo $this->nm_new_label['carakeluar']; ?></span></TD>
    <TD class="scFormDataOdd css_carakeluar_line" id="hidden_field_data_carakeluar" style="<?php echo $sStyleHidden_carakeluar; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["carakeluar"]) &&  $this->nmgp_cmp_readonly["carakeluar"] == "on") { 

 ?>
<input type="hidden" name="carakeluar" value="<?php echo $this->form_encode_input($carakeluar) . "\">" . $carakeluar . ""; ?>
<?php } else { ?>
<span id="id_read_on_carakeluar" class="sc-ui-readonly-carakeluar css_carakeluar_line" style="<?php echo $sStyleReadLab_carakeluar; ?>"><?php echo $this->carakeluar; ?></span><span id="id_read_off_carakeluar" class="css_read_off_carakeluar" style="white-space: nowrap;<?php echo $sStyleReadInp_carakeluar; ?>">
 <input class="sc-js-input scFormObjectOdd css_carakeluar_obj" style="" id="id_sc_field_carakeluar" type=text name="carakeluar" value="<?php echo $this->form_encode_input($carakeluar) ?>"
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
    if (!isset($this->nm_new_label['kondisipulang']))
    {
        $this->nm_new_label['kondisipulang'] = "Kondisi Pulang";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kondisipulang = $this->kondisipulang;
   $sStyleHidden_kondisipulang = '';
   if (isset($this->nmgp_cmp_hidden['kondisipulang']) && $this->nmgp_cmp_hidden['kondisipulang'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kondisipulang']);
       $sStyleHidden_kondisipulang = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kondisipulang = 'display: none;';
   $sStyleReadInp_kondisipulang = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kondisipulang']) && $this->nmgp_cmp_readonly['kondisipulang'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kondisipulang']);
       $sStyleReadLab_kondisipulang = '';
       $sStyleReadInp_kondisipulang = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kondisipulang']) && $this->nmgp_cmp_hidden['kondisipulang'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kondisipulang" value="<?php echo $this->form_encode_input($kondisipulang) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kondisipulang_label" id="hidden_field_label_kondisipulang" style="<?php echo $sStyleHidden_kondisipulang; ?>"><span id="id_label_kondisipulang"><?php echo $this->nm_new_label['kondisipulang']; ?></span></TD>
    <TD class="scFormDataOdd css_kondisipulang_line" id="hidden_field_data_kondisipulang" style="<?php echo $sStyleHidden_kondisipulang; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kondisipulang"]) &&  $this->nmgp_cmp_readonly["kondisipulang"] == "on") { 

 ?>
<input type="hidden" name="kondisipulang" value="<?php echo $this->form_encode_input($kondisipulang) . "\">" . $kondisipulang . ""; ?>
<?php } else { ?>
<span id="id_read_on_kondisipulang" class="sc-ui-readonly-kondisipulang css_kondisipulang_line" style="<?php echo $sStyleReadLab_kondisipulang; ?>"><?php echo $this->kondisipulang; ?></span><span id="id_read_off_kondisipulang" class="css_read_off_kondisipulang" style="white-space: nowrap;<?php echo $sStyleReadInp_kondisipulang; ?>">
 <input class="sc-js-input scFormObjectOdd css_kondisipulang_obj" style="" id="id_sc_field_kondisipulang" type=text name="kondisipulang" value="<?php echo $this->form_encode_input($kondisipulang) ?>"
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
 size=40 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
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
 size=40 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tindaklanjut']))
    {
        $this->nm_new_label['tindaklanjut'] = "Tindak Lanjut";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tindaklanjut = $this->tindaklanjut;
   $sStyleHidden_tindaklanjut = '';
   if (isset($this->nmgp_cmp_hidden['tindaklanjut']) && $this->nmgp_cmp_hidden['tindaklanjut'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tindaklanjut']);
       $sStyleHidden_tindaklanjut = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tindaklanjut = 'display: none;';
   $sStyleReadInp_tindaklanjut = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tindaklanjut']) && $this->nmgp_cmp_readonly['tindaklanjut'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tindaklanjut']);
       $sStyleReadLab_tindaklanjut = '';
       $sStyleReadInp_tindaklanjut = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tindaklanjut']) && $this->nmgp_cmp_hidden['tindaklanjut'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tindaklanjut" value="<?php echo $this->form_encode_input($tindaklanjut) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tindaklanjut_label" id="hidden_field_label_tindaklanjut" style="<?php echo $sStyleHidden_tindaklanjut; ?>"><span id="id_label_tindaklanjut"><?php echo $this->nm_new_label['tindaklanjut']; ?></span></TD>
    <TD class="scFormDataOdd css_tindaklanjut_line" id="hidden_field_data_tindaklanjut" style="<?php echo $sStyleHidden_tindaklanjut; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tindaklanjut"]) &&  $this->nmgp_cmp_readonly["tindaklanjut"] == "on") { 

 ?>
<input type="hidden" name="tindaklanjut" value="<?php echo $this->form_encode_input($tindaklanjut) . "\">" . $tindaklanjut . ""; ?>
<?php } else { ?>
<span id="id_read_on_tindaklanjut" class="sc-ui-readonly-tindaklanjut css_tindaklanjut_line" style="<?php echo $sStyleReadLab_tindaklanjut; ?>"><?php echo $this->tindaklanjut; ?></span><span id="id_read_off_tindaklanjut" class="css_read_off_tindaklanjut" style="white-space: nowrap;<?php echo $sStyleReadInp_tindaklanjut; ?>">
 <input class="sc-js-input scFormObjectOdd css_tindaklanjut_obj" style="" id="id_sc_field_tindaklanjut" type=text name="tindaklanjut" value="<?php echo $this->form_encode_input($tindaklanjut) ?>"
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
    if (!isset($this->nm_new_label['dirujukkodeppk']))
    {
        $this->nm_new_label['dirujukkodeppk'] = "Dirujuk ke PPK";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dirujukkodeppk = $this->dirujukkodeppk;
   $sStyleHidden_dirujukkodeppk = '';
   if (isset($this->nmgp_cmp_hidden['dirujukkodeppk']) && $this->nmgp_cmp_hidden['dirujukkodeppk'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dirujukkodeppk']);
       $sStyleHidden_dirujukkodeppk = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dirujukkodeppk = 'display: none;';
   $sStyleReadInp_dirujukkodeppk = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dirujukkodeppk']) && $this->nmgp_cmp_readonly['dirujukkodeppk'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dirujukkodeppk']);
       $sStyleReadLab_dirujukkodeppk = '';
       $sStyleReadInp_dirujukkodeppk = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dirujukkodeppk']) && $this->nmgp_cmp_hidden['dirujukkodeppk'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dirujukkodeppk" value="<?php echo $this->form_encode_input($dirujukkodeppk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dirujukkodeppk_label" id="hidden_field_label_dirujukkodeppk" style="<?php echo $sStyleHidden_dirujukkodeppk; ?>"><span id="id_label_dirujukkodeppk"><?php echo $this->nm_new_label['dirujukkodeppk']; ?></span></TD>
    <TD class="scFormDataOdd css_dirujukkodeppk_line" id="hidden_field_data_dirujukkodeppk" style="<?php echo $sStyleHidden_dirujukkodeppk; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dirujukkodeppk"]) &&  $this->nmgp_cmp_readonly["dirujukkodeppk"] == "on") { 

 ?>
<input type="hidden" name="dirujukkodeppk" value="<?php echo $this->form_encode_input($dirujukkodeppk) . "\">" . $dirujukkodeppk . ""; ?>
<?php } else { ?>
<span id="id_read_on_dirujukkodeppk" class="sc-ui-readonly-dirujukkodeppk css_dirujukkodeppk_line" style="<?php echo $sStyleReadLab_dirujukkodeppk; ?>"><?php echo $this->dirujukkodeppk; ?></span><span id="id_read_off_dirujukkodeppk" class="css_read_off_dirujukkodeppk" style="white-space: nowrap;<?php echo $sStyleReadInp_dirujukkodeppk; ?>">
 <input class="sc-js-input scFormObjectOdd css_dirujukkodeppk_obj" style="" id="id_sc_field_dirujukkodeppk" type=text name="dirujukkodeppk" value="<?php echo $this->form_encode_input($dirujukkodeppk) ?>"
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
    if (!isset($this->nm_new_label['tglkontrol']))
    {
        $this->nm_new_label['tglkontrol'] = "Tanggal Kontrol";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tglkontrol = $this->tglkontrol;
   $sStyleHidden_tglkontrol = '';
   if (isset($this->nmgp_cmp_hidden['tglkontrol']) && $this->nmgp_cmp_hidden['tglkontrol'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tglkontrol']);
       $sStyleHidden_tglkontrol = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tglkontrol = 'display: none;';
   $sStyleReadInp_tglkontrol = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tglkontrol']) && $this->nmgp_cmp_readonly['tglkontrol'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tglkontrol']);
       $sStyleReadLab_tglkontrol = '';
       $sStyleReadInp_tglkontrol = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tglkontrol']) && $this->nmgp_cmp_hidden['tglkontrol'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tglkontrol" value="<?php echo $this->form_encode_input($tglkontrol) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tglkontrol_label" id="hidden_field_label_tglkontrol" style="<?php echo $sStyleHidden_tglkontrol; ?>"><span id="id_label_tglkontrol"><?php echo $this->nm_new_label['tglkontrol']; ?></span></TD>
    <TD class="scFormDataOdd css_tglkontrol_line" id="hidden_field_data_tglkontrol" style="<?php echo $sStyleHidden_tglkontrol; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tglkontrol"]) &&  $this->nmgp_cmp_readonly["tglkontrol"] == "on") { 

 ?>
<input type="hidden" name="tglkontrol" value="<?php echo $this->form_encode_input($tglkontrol) . "\">" . $tglkontrol . ""; ?>
<?php } else { ?>
<span id="id_read_on_tglkontrol" class="sc-ui-readonly-tglkontrol css_tglkontrol_line" style="<?php echo $sStyleReadLab_tglkontrol; ?>"><?php echo $this->tglkontrol; ?></span><span id="id_read_off_tglkontrol" class="css_read_off_tglkontrol" style="white-space: nowrap;<?php echo $sStyleReadInp_tglkontrol; ?>">
 <input class="sc-js-input scFormObjectOdd css_tglkontrol_obj" style="" id="id_sc_field_tglkontrol" type=text name="tglkontrol" value="<?php echo $this->form_encode_input($tglkontrol) ?>"
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
    if (!isset($this->nm_new_label['polikontrolkembali']))
    {
        $this->nm_new_label['polikontrolkembali'] = "Poli Kontrol Kembali";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $polikontrolkembali = $this->polikontrolkembali;
   $sStyleHidden_polikontrolkembali = '';
   if (isset($this->nmgp_cmp_hidden['polikontrolkembali']) && $this->nmgp_cmp_hidden['polikontrolkembali'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['polikontrolkembali']);
       $sStyleHidden_polikontrolkembali = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_polikontrolkembali = 'display: none;';
   $sStyleReadInp_polikontrolkembali = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['polikontrolkembali']) && $this->nmgp_cmp_readonly['polikontrolkembali'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['polikontrolkembali']);
       $sStyleReadLab_polikontrolkembali = '';
       $sStyleReadInp_polikontrolkembali = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['polikontrolkembali']) && $this->nmgp_cmp_hidden['polikontrolkembali'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="polikontrolkembali" value="<?php echo $this->form_encode_input($polikontrolkembali) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_polikontrolkembali_label" id="hidden_field_label_polikontrolkembali" style="<?php echo $sStyleHidden_polikontrolkembali; ?>"><span id="id_label_polikontrolkembali"><?php echo $this->nm_new_label['polikontrolkembali']; ?></span></TD>
    <TD class="scFormDataOdd css_polikontrolkembali_line" id="hidden_field_data_polikontrolkembali" style="<?php echo $sStyleHidden_polikontrolkembali; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["polikontrolkembali"]) &&  $this->nmgp_cmp_readonly["polikontrolkembali"] == "on") { 

 ?>
<input type="hidden" name="polikontrolkembali" value="<?php echo $this->form_encode_input($polikontrolkembali) . "\">" . $polikontrolkembali . ""; ?>
<?php } else { ?>
<span id="id_read_on_polikontrolkembali" class="sc-ui-readonly-polikontrolkembali css_polikontrolkembali_line" style="<?php echo $sStyleReadLab_polikontrolkembali; ?>"><?php echo $this->polikontrolkembali; ?></span><span id="id_read_off_polikontrolkembali" class="css_read_off_polikontrolkembali" style="white-space: nowrap;<?php echo $sStyleReadInp_polikontrolkembali; ?>">
 <input class="sc-js-input scFormObjectOdd css_polikontrolkembali_obj" style="" id="id_sc_field_polikontrolkembali" type=text name="polikontrolkembali" value="<?php echo $this->form_encode_input($polikontrolkembali) ?>"
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
    if (!isset($this->nm_new_label['dpjp']))
    {
        $this->nm_new_label['dpjp'] = "DPJP";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dpjp = $this->dpjp;
   $sStyleHidden_dpjp = '';
   if (isset($this->nmgp_cmp_hidden['dpjp']) && $this->nmgp_cmp_hidden['dpjp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dpjp']);
       $sStyleHidden_dpjp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dpjp = 'display: none;';
   $sStyleReadInp_dpjp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dpjp']) && $this->nmgp_cmp_readonly['dpjp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dpjp']);
       $sStyleReadLab_dpjp = '';
       $sStyleReadInp_dpjp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dpjp']) && $this->nmgp_cmp_hidden['dpjp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dpjp" value="<?php echo $this->form_encode_input($dpjp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dpjp_label" id="hidden_field_label_dpjp" style="<?php echo $sStyleHidden_dpjp; ?>"><span id="id_label_dpjp"><?php echo $this->nm_new_label['dpjp']; ?></span></TD>
    <TD class="scFormDataOdd css_dpjp_line" id="hidden_field_data_dpjp" style="<?php echo $sStyleHidden_dpjp; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dpjp"]) &&  $this->nmgp_cmp_readonly["dpjp"] == "on") { 

 ?>
<input type="hidden" name="dpjp" value="<?php echo $this->form_encode_input($dpjp) . "\">" . $dpjp . ""; ?>
<?php } else { ?>
<span id="id_read_on_dpjp" class="sc-ui-readonly-dpjp css_dpjp_line" style="<?php echo $sStyleReadLab_dpjp; ?>"><?php echo $this->dpjp; ?></span><span id="id_read_off_dpjp" class="css_read_off_dpjp" style="white-space: nowrap;<?php echo $sStyleReadInp_dpjp; ?>">
 <input class="sc-js-input scFormObjectOdd css_dpjp_obj" style="" id="id_sc_field_dpjp" type=text name="dpjp" value="<?php echo $this->form_encode_input($dpjp) ?>"
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
    if (!isset($this->nm_new_label['user']))
    {
        $this->nm_new_label['user'] = "User";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $user = $this->user;
   $sStyleHidden_user = '';
   if (isset($this->nmgp_cmp_hidden['user']) && $this->nmgp_cmp_hidden['user'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['user']);
       $sStyleHidden_user = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_user = 'display: none;';
   $sStyleReadInp_user = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['user']) && $this->nmgp_cmp_readonly['user'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['user']);
       $sStyleReadLab_user = '';
       $sStyleReadInp_user = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['user']) && $this->nmgp_cmp_hidden['user'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="user" value="<?php echo $this->form_encode_input($user) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_user_label" id="hidden_field_label_user" style="<?php echo $sStyleHidden_user; ?>"><span id="id_label_user"><?php echo $this->nm_new_label['user']; ?></span></TD>
    <TD class="scFormDataOdd css_user_line" id="hidden_field_data_user" style="<?php echo $sStyleHidden_user; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["user"]) &&  $this->nmgp_cmp_readonly["user"] == "on") { 

 ?>
<input type="hidden" name="user" value="<?php echo $this->form_encode_input($user) . "\">" . $user . ""; ?>
<?php } else { ?>
<span id="id_read_on_user" class="sc-ui-readonly-user css_user_line" style="<?php echo $sStyleReadLab_user; ?>"><?php echo $this->user; ?></span><span id="id_read_off_user" class="css_read_off_user" style="white-space: nowrap;<?php echo $sStyleReadInp_user; ?>">
 <input class="sc-js-input scFormObjectOdd css_user_obj" style="" id="id_sc_field_user" type=text name="user" value="<?php echo $this->form_encode_input($user) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

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
           if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['under_dashboard']))) {
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_vclaim_lpk_update");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_vclaim_lpk_update");
 parent.scAjaxDetailHeight("form_vclaim_lpk_update", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_vclaim_lpk_update", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_vclaim_lpk_update", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_lpk_update']['buttonStatus'] = $this->nmgp_botoes;
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
