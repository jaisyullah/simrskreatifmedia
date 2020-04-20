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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - tbemployee"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tbemployee"); } ?></TITLE>
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
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
 </style>
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
.css_read_off_dob button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_lastupdate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_enterdate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_resigndate button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbemployee/form_tbemployee_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbemployee_sajax_js.php");
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
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_tbemployee_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

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
     scQuickSearchInit(false, '');
     if (document.getElementById('SC_fast_search_t')) {
         scQuickSearchKeyUp('t', null);
     }
     scQSInit = false;
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if (document.getElementById('SC_fast_search_t')) {
           if ('' == sPos || 't' == sPos) {
               scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
           }
       }
     }
   }
   var fixedQuickSearchSize = {};
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     if ("boolean" == typeof fixedQuickSearchSize[sIdInput] && fixedQuickSearchSize[sIdInput]) {
       return;
     }
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     if (0 != oInput.height()) {
       oInput.css({
         'height': Math.max(oInput.height(), 16) + 'px',
       });
     }
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     fixedQuickSearchSize[sIdInput] = true;
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_tbemployee_js0.php");
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
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
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
$_SESSION['scriptcase']['error_span_title']['form_tbemployee'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbemployee'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - tbemployee"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tbemployee"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['staffcode']))
           {
               $this->nmgp_cmp_readonly['staffcode'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['staffcode']))
    {
        $this->nm_new_label['staffcode'] = "Staff Code";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $staffcode = $this->staffcode;
   $sStyleHidden_staffcode = '';
   if (isset($this->nmgp_cmp_hidden['staffcode']) && $this->nmgp_cmp_hidden['staffcode'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['staffcode']);
       $sStyleHidden_staffcode = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_staffcode = 'display: none;';
   $sStyleReadInp_staffcode = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["staffcode"]) &&  $this->nmgp_cmp_readonly["staffcode"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['staffcode']);
       $sStyleReadLab_staffcode = '';
       $sStyleReadInp_staffcode = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['staffcode']) && $this->nmgp_cmp_hidden['staffcode'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="staffcode" value="<?php echo $this->form_encode_input($staffcode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_staffcode_label" id="hidden_field_label_staffcode" style="<?php echo $sStyleHidden_staffcode; ?>"><span id="id_label_staffcode"><?php echo $this->nm_new_label['staffcode']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['php_cmp_required']['staffcode']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['php_cmp_required']['staffcode'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_staffcode_line" id="hidden_field_data_staffcode" style="<?php echo $sStyleHidden_staffcode; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_staffcode_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["staffcode"]) &&  $this->nmgp_cmp_readonly["staffcode"] == "on")) { 

 ?>
<input type="hidden" name="staffcode" value="<?php echo $this->form_encode_input($staffcode) . "\"><span id=\"id_ajax_label_staffcode\">" . $staffcode . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_staffcode" class="sc-ui-readonly-staffcode css_staffcode_line" style="<?php echo $sStyleReadLab_staffcode; ?>"><?php echo $this->staffcode; ?></span><span id="id_read_off_staffcode" class="css_read_off_staffcode" style="white-space: nowrap;<?php echo $sStyleReadInp_staffcode; ?>">
 <input class="sc-js-input scFormObjectOdd css_staffcode_obj" style="" id="id_sc_field_staffcode" type=text name="staffcode" value="<?php echo $this->form_encode_input($staffcode) ?>"
 size=9 maxlength=9 alt="{datatype: 'text', maxLength: 9, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_staffcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_staffcode_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['appcode']))
    {
        $this->nm_new_label['appcode'] = "App Code";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $appcode = $this->appcode;
   $sStyleHidden_appcode = '';
   if (isset($this->nmgp_cmp_hidden['appcode']) && $this->nmgp_cmp_hidden['appcode'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['appcode']);
       $sStyleHidden_appcode = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_appcode = 'display: none;';
   $sStyleReadInp_appcode = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['appcode']) && $this->nmgp_cmp_readonly['appcode'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['appcode']);
       $sStyleReadLab_appcode = '';
       $sStyleReadInp_appcode = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['appcode']) && $this->nmgp_cmp_hidden['appcode'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="appcode" value="<?php echo $this->form_encode_input($appcode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_appcode_label" id="hidden_field_label_appcode" style="<?php echo $sStyleHidden_appcode; ?>"><span id="id_label_appcode"><?php echo $this->nm_new_label['appcode']; ?></span></TD>
    <TD class="scFormDataOdd css_appcode_line" id="hidden_field_data_appcode" style="<?php echo $sStyleHidden_appcode; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_appcode_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["appcode"]) &&  $this->nmgp_cmp_readonly["appcode"] == "on") { 

 ?>
<input type="hidden" name="appcode" value="<?php echo $this->form_encode_input($appcode) . "\">" . $appcode . ""; ?>
<?php } else { ?>
<span id="id_read_on_appcode" class="sc-ui-readonly-appcode css_appcode_line" style="<?php echo $sStyleReadLab_appcode; ?>"><?php echo $this->appcode; ?></span><span id="id_read_off_appcode" class="css_read_off_appcode" style="white-space: nowrap;<?php echo $sStyleReadInp_appcode; ?>">
 <input class="sc-js-input scFormObjectOdd css_appcode_obj" style="" id="id_sc_field_appcode" type=text name="appcode" value="<?php echo $this->form_encode_input($appcode) ?>"
 size=9 maxlength=9 alt="{datatype: 'text', maxLength: 9, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_appcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_appcode_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['staffname']))
    {
        $this->nm_new_label['staffname'] = "Staff Name";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $staffname = $this->staffname;
   $sStyleHidden_staffname = '';
   if (isset($this->nmgp_cmp_hidden['staffname']) && $this->nmgp_cmp_hidden['staffname'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['staffname']);
       $sStyleHidden_staffname = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_staffname = 'display: none;';
   $sStyleReadInp_staffname = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['staffname']) && $this->nmgp_cmp_readonly['staffname'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['staffname']);
       $sStyleReadLab_staffname = '';
       $sStyleReadInp_staffname = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['staffname']) && $this->nmgp_cmp_hidden['staffname'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="staffname" value="<?php echo $this->form_encode_input($staffname) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_staffname_label" id="hidden_field_label_staffname" style="<?php echo $sStyleHidden_staffname; ?>"><span id="id_label_staffname"><?php echo $this->nm_new_label['staffname']; ?></span></TD>
    <TD class="scFormDataOdd css_staffname_line" id="hidden_field_data_staffname" style="<?php echo $sStyleHidden_staffname; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_staffname_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["staffname"]) &&  $this->nmgp_cmp_readonly["staffname"] == "on") { 

 ?>
<input type="hidden" name="staffname" value="<?php echo $this->form_encode_input($staffname) . "\">" . $staffname . ""; ?>
<?php } else { ?>
<span id="id_read_on_staffname" class="sc-ui-readonly-staffname css_staffname_line" style="<?php echo $sStyleReadLab_staffname; ?>"><?php echo $this->staffname; ?></span><span id="id_read_off_staffname" class="css_read_off_staffname" style="white-space: nowrap;<?php echo $sStyleReadInp_staffname; ?>">
 <input class="sc-js-input scFormObjectOdd css_staffname_obj" style="" id="id_sc_field_staffname" type=text name="staffname" value="<?php echo $this->form_encode_input($staffname) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_staffname_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_staffname_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['surname']))
    {
        $this->nm_new_label['surname'] = "Sur Name";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $surname = $this->surname;
   $sStyleHidden_surname = '';
   if (isset($this->nmgp_cmp_hidden['surname']) && $this->nmgp_cmp_hidden['surname'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['surname']);
       $sStyleHidden_surname = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_surname = 'display: none;';
   $sStyleReadInp_surname = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['surname']) && $this->nmgp_cmp_readonly['surname'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['surname']);
       $sStyleReadLab_surname = '';
       $sStyleReadInp_surname = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['surname']) && $this->nmgp_cmp_hidden['surname'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="surname" value="<?php echo $this->form_encode_input($surname) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_surname_label" id="hidden_field_label_surname" style="<?php echo $sStyleHidden_surname; ?>"><span id="id_label_surname"><?php echo $this->nm_new_label['surname']; ?></span></TD>
    <TD class="scFormDataOdd css_surname_line" id="hidden_field_data_surname" style="<?php echo $sStyleHidden_surname; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_surname_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["surname"]) &&  $this->nmgp_cmp_readonly["surname"] == "on") { 

 ?>
<input type="hidden" name="surname" value="<?php echo $this->form_encode_input($surname) . "\">" . $surname . ""; ?>
<?php } else { ?>
<span id="id_read_on_surname" class="sc-ui-readonly-surname css_surname_line" style="<?php echo $sStyleReadLab_surname; ?>"><?php echo $this->surname; ?></span><span id="id_read_off_surname" class="css_read_off_surname" style="white-space: nowrap;<?php echo $sStyleReadInp_surname; ?>">
 <input class="sc-js-input scFormObjectOdd css_surname_obj" style="" id="id_sc_field_surname" type=text name="surname" value="<?php echo $this->form_encode_input($surname) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_surname_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_surname_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pob']))
    {
        $this->nm_new_label['pob'] = "Po B";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pob = $this->pob;
   $sStyleHidden_pob = '';
   if (isset($this->nmgp_cmp_hidden['pob']) && $this->nmgp_cmp_hidden['pob'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pob']);
       $sStyleHidden_pob = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pob = 'display: none;';
   $sStyleReadInp_pob = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pob']) && $this->nmgp_cmp_readonly['pob'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pob']);
       $sStyleReadLab_pob = '';
       $sStyleReadInp_pob = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pob']) && $this->nmgp_cmp_hidden['pob'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pob" value="<?php echo $this->form_encode_input($pob) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pob_label" id="hidden_field_label_pob" style="<?php echo $sStyleHidden_pob; ?>"><span id="id_label_pob"><?php echo $this->nm_new_label['pob']; ?></span></TD>
    <TD class="scFormDataOdd css_pob_line" id="hidden_field_data_pob" style="<?php echo $sStyleHidden_pob; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pob_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pob"]) &&  $this->nmgp_cmp_readonly["pob"] == "on") { 

 ?>
<input type="hidden" name="pob" value="<?php echo $this->form_encode_input($pob) . "\">" . $pob . ""; ?>
<?php } else { ?>
<span id="id_read_on_pob" class="sc-ui-readonly-pob css_pob_line" style="<?php echo $sStyleReadLab_pob; ?>"><?php echo $this->pob; ?></span><span id="id_read_off_pob" class="css_read_off_pob" style="white-space: nowrap;<?php echo $sStyleReadInp_pob; ?>">
 <input class="sc-js-input scFormObjectOdd css_pob_obj" style="" id="id_sc_field_pob" type=text name="pob" value="<?php echo $this->form_encode_input($pob) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pob_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pob_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dob']))
    {
        $this->nm_new_label['dob'] = "Do B";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_dob = $this->dob;
   if (strlen($this->dob_hora) > 8 ) {$this->dob_hora = substr($this->dob_hora, 0, 8);}
   $this->dob .= ' ' . $this->dob_hora;
   $dob = $this->dob;
   $sStyleHidden_dob = '';
   if (isset($this->nmgp_cmp_hidden['dob']) && $this->nmgp_cmp_hidden['dob'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dob']);
       $sStyleHidden_dob = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dob = 'display: none;';
   $sStyleReadInp_dob = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dob']) && $this->nmgp_cmp_readonly['dob'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dob']);
       $sStyleReadLab_dob = '';
       $sStyleReadInp_dob = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dob']) && $this->nmgp_cmp_hidden['dob'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dob" value="<?php echo $this->form_encode_input($dob) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dob_label" id="hidden_field_label_dob" style="<?php echo $sStyleHidden_dob; ?>"><span id="id_label_dob"><?php echo $this->nm_new_label['dob']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['php_cmp_required']['dob']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['php_cmp_required']['dob'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_dob_line" id="hidden_field_data_dob" style="<?php echo $sStyleHidden_dob; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dob_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dob"]) &&  $this->nmgp_cmp_readonly["dob"] == "on") { 

 ?>
<input type="hidden" name="dob" value="<?php echo $this->form_encode_input($dob) . "\">" . $dob . ""; ?>
<?php } else { ?>
<span id="id_read_on_dob" class="sc-ui-readonly-dob css_dob_line" style="<?php echo $sStyleReadLab_dob; ?>"><?php echo $dob; ?></span><span id="id_read_off_dob" class="css_read_off_dob" style="white-space: nowrap;<?php echo $sStyleReadInp_dob; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_dob_obj" style="" id="id_sc_field_dob" type=text name="dob" value="<?php echo $this->form_encode_input($dob) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['dob']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['dob']['date_format']; ?>', timeSep: '<?php echo $this->field_config['dob']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['dob']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dob_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dob_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->dob = $old_dt_dob;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['addressktp']))
    {
        $this->nm_new_label['addressktp'] = "Address Ktp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $addressktp = $this->addressktp;
   $sStyleHidden_addressktp = '';
   if (isset($this->nmgp_cmp_hidden['addressktp']) && $this->nmgp_cmp_hidden['addressktp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['addressktp']);
       $sStyleHidden_addressktp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_addressktp = 'display: none;';
   $sStyleReadInp_addressktp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['addressktp']) && $this->nmgp_cmp_readonly['addressktp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['addressktp']);
       $sStyleReadLab_addressktp = '';
       $sStyleReadInp_addressktp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['addressktp']) && $this->nmgp_cmp_hidden['addressktp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="addressktp" value="<?php echo $this->form_encode_input($addressktp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_addressktp_label" id="hidden_field_label_addressktp" style="<?php echo $sStyleHidden_addressktp; ?>"><span id="id_label_addressktp"><?php echo $this->nm_new_label['addressktp']; ?></span></TD>
    <TD class="scFormDataOdd css_addressktp_line" id="hidden_field_data_addressktp" style="<?php echo $sStyleHidden_addressktp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_addressktp_line" style="vertical-align: top;padding: 0px">
<?php
$addressktp_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($addressktp));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["addressktp"]) &&  $this->nmgp_cmp_readonly["addressktp"] == "on") { 

 ?>
<input type="hidden" name="addressktp" value="<?php echo $this->form_encode_input($addressktp) . "\">" . $addressktp_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_addressktp" class="sc-ui-readonly-addressktp css_addressktp_line" style="<?php echo $sStyleReadLab_addressktp; ?>"><?php echo $addressktp_val; ?></span><span id="id_read_off_addressktp" class="css_read_off_addressktp" style="white-space: nowrap;<?php echo $sStyleReadInp_addressktp; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_addressktp_obj" style="white-space: pre-wrap;" name="addressktp" id="id_sc_field_addressktp" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $addressktp; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_addressktp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_addressktp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cityktp']))
    {
        $this->nm_new_label['cityktp'] = "City Ktp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cityktp = $this->cityktp;
   $sStyleHidden_cityktp = '';
   if (isset($this->nmgp_cmp_hidden['cityktp']) && $this->nmgp_cmp_hidden['cityktp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cityktp']);
       $sStyleHidden_cityktp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cityktp = 'display: none;';
   $sStyleReadInp_cityktp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cityktp']) && $this->nmgp_cmp_readonly['cityktp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cityktp']);
       $sStyleReadLab_cityktp = '';
       $sStyleReadInp_cityktp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cityktp']) && $this->nmgp_cmp_hidden['cityktp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cityktp" value="<?php echo $this->form_encode_input($cityktp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cityktp_label" id="hidden_field_label_cityktp" style="<?php echo $sStyleHidden_cityktp; ?>"><span id="id_label_cityktp"><?php echo $this->nm_new_label['cityktp']; ?></span></TD>
    <TD class="scFormDataOdd css_cityktp_line" id="hidden_field_data_cityktp" style="<?php echo $sStyleHidden_cityktp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cityktp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cityktp"]) &&  $this->nmgp_cmp_readonly["cityktp"] == "on") { 

 ?>
<input type="hidden" name="cityktp" value="<?php echo $this->form_encode_input($cityktp) . "\">" . $cityktp . ""; ?>
<?php } else { ?>
<span id="id_read_on_cityktp" class="sc-ui-readonly-cityktp css_cityktp_line" style="<?php echo $sStyleReadLab_cityktp; ?>"><?php echo $this->cityktp; ?></span><span id="id_read_off_cityktp" class="css_read_off_cityktp" style="white-space: nowrap;<?php echo $sStyleReadInp_cityktp; ?>">
 <input class="sc-js-input scFormObjectOdd css_cityktp_obj" style="" id="id_sc_field_cityktp" type=text name="cityktp" value="<?php echo $this->form_encode_input($cityktp) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cityktp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cityktp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['address']))
    {
        $this->nm_new_label['address'] = "Address";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $address = $this->address;
   $sStyleHidden_address = '';
   if (isset($this->nmgp_cmp_hidden['address']) && $this->nmgp_cmp_hidden['address'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['address']);
       $sStyleHidden_address = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_address = 'display: none;';
   $sStyleReadInp_address = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['address']) && $this->nmgp_cmp_readonly['address'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['address']);
       $sStyleReadLab_address = '';
       $sStyleReadInp_address = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['address']) && $this->nmgp_cmp_hidden['address'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="address" value="<?php echo $this->form_encode_input($address) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_address_label" id="hidden_field_label_address" style="<?php echo $sStyleHidden_address; ?>"><span id="id_label_address"><?php echo $this->nm_new_label['address']; ?></span></TD>
    <TD class="scFormDataOdd css_address_line" id="hidden_field_data_address" style="<?php echo $sStyleHidden_address; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_address_line" style="vertical-align: top;padding: 0px">
<?php
$address_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($address));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["address"]) &&  $this->nmgp_cmp_readonly["address"] == "on") { 

 ?>
<input type="hidden" name="address" value="<?php echo $this->form_encode_input($address) . "\">" . $address_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_address" class="sc-ui-readonly-address css_address_line" style="<?php echo $sStyleReadLab_address; ?>"><?php echo $address_val; ?></span><span id="id_read_off_address" class="css_read_off_address" style="white-space: nowrap;<?php echo $sStyleReadInp_address; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_address_obj" style="white-space: pre-wrap;" name="address" id="id_sc_field_address" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $address; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_address_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_address_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['city']))
    {
        $this->nm_new_label['city'] = "City";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $city = $this->city;
   $sStyleHidden_city = '';
   if (isset($this->nmgp_cmp_hidden['city']) && $this->nmgp_cmp_hidden['city'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['city']);
       $sStyleHidden_city = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_city = 'display: none;';
   $sStyleReadInp_city = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['city']) && $this->nmgp_cmp_readonly['city'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['city']);
       $sStyleReadLab_city = '';
       $sStyleReadInp_city = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['city']) && $this->nmgp_cmp_hidden['city'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="city" value="<?php echo $this->form_encode_input($city) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_city_label" id="hidden_field_label_city" style="<?php echo $sStyleHidden_city; ?>"><span id="id_label_city"><?php echo $this->nm_new_label['city']; ?></span></TD>
    <TD class="scFormDataOdd css_city_line" id="hidden_field_data_city" style="<?php echo $sStyleHidden_city; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_city_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["city"]) &&  $this->nmgp_cmp_readonly["city"] == "on") { 

 ?>
<input type="hidden" name="city" value="<?php echo $this->form_encode_input($city) . "\">" . $city . ""; ?>
<?php } else { ?>
<span id="id_read_on_city" class="sc-ui-readonly-city css_city_line" style="<?php echo $sStyleReadLab_city; ?>"><?php echo $this->city; ?></span><span id="id_read_off_city" class="css_read_off_city" style="white-space: nowrap;<?php echo $sStyleReadInp_city; ?>">
 <input class="sc-js-input scFormObjectOdd css_city_obj" style="" id="id_sc_field_city" type=text name="city" value="<?php echo $this->form_encode_input($city) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_city_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_city_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['statustinggal']))
    {
        $this->nm_new_label['statustinggal'] = "Status Tinggal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $statustinggal = $this->statustinggal;
   $sStyleHidden_statustinggal = '';
   if (isset($this->nmgp_cmp_hidden['statustinggal']) && $this->nmgp_cmp_hidden['statustinggal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['statustinggal']);
       $sStyleHidden_statustinggal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_statustinggal = 'display: none;';
   $sStyleReadInp_statustinggal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['statustinggal']) && $this->nmgp_cmp_readonly['statustinggal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['statustinggal']);
       $sStyleReadLab_statustinggal = '';
       $sStyleReadInp_statustinggal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['statustinggal']) && $this->nmgp_cmp_hidden['statustinggal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="statustinggal" value="<?php echo $this->form_encode_input($statustinggal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_statustinggal_label" id="hidden_field_label_statustinggal" style="<?php echo $sStyleHidden_statustinggal; ?>"><span id="id_label_statustinggal"><?php echo $this->nm_new_label['statustinggal']; ?></span></TD>
    <TD class="scFormDataOdd css_statustinggal_line" id="hidden_field_data_statustinggal" style="<?php echo $sStyleHidden_statustinggal; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_statustinggal_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["statustinggal"]) &&  $this->nmgp_cmp_readonly["statustinggal"] == "on") { 

 ?>
<input type="hidden" name="statustinggal" value="<?php echo $this->form_encode_input($statustinggal) . "\">" . $statustinggal . ""; ?>
<?php } else { ?>
<span id="id_read_on_statustinggal" class="sc-ui-readonly-statustinggal css_statustinggal_line" style="<?php echo $sStyleReadLab_statustinggal; ?>"><?php echo $this->statustinggal; ?></span><span id="id_read_off_statustinggal" class="css_read_off_statustinggal" style="white-space: nowrap;<?php echo $sStyleReadInp_statustinggal; ?>">
 <input class="sc-js-input scFormObjectOdd css_statustinggal_obj" style="" id="id_sc_field_statustinggal" type=text name="statustinggal" value="<?php echo $this->form_encode_input($statustinggal) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_statustinggal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_statustinggal_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sex']))
    {
        $this->nm_new_label['sex'] = "Sex";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sex = $this->sex;
   $sStyleHidden_sex = '';
   if (isset($this->nmgp_cmp_hidden['sex']) && $this->nmgp_cmp_hidden['sex'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sex']);
       $sStyleHidden_sex = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sex = 'display: none;';
   $sStyleReadInp_sex = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sex']) && $this->nmgp_cmp_readonly['sex'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sex']);
       $sStyleReadLab_sex = '';
       $sStyleReadInp_sex = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sex']) && $this->nmgp_cmp_hidden['sex'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sex" value="<?php echo $this->form_encode_input($sex) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sex_label" id="hidden_field_label_sex" style="<?php echo $sStyleHidden_sex; ?>"><span id="id_label_sex"><?php echo $this->nm_new_label['sex']; ?></span></TD>
    <TD class="scFormDataOdd css_sex_line" id="hidden_field_data_sex" style="<?php echo $sStyleHidden_sex; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sex_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sex"]) &&  $this->nmgp_cmp_readonly["sex"] == "on") { 

 ?>
<input type="hidden" name="sex" value="<?php echo $this->form_encode_input($sex) . "\">" . $sex . ""; ?>
<?php } else { ?>
<span id="id_read_on_sex" class="sc-ui-readonly-sex css_sex_line" style="<?php echo $sStyleReadLab_sex; ?>"><?php echo $this->sex; ?></span><span id="id_read_off_sex" class="css_read_off_sex" style="white-space: nowrap;<?php echo $sStyleReadInp_sex; ?>">
 <input class="sc-js-input scFormObjectOdd css_sex_obj" style="" id="id_sc_field_sex" type=text name="sex" value="<?php echo $this->form_encode_input($sex) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sex_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sex_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['blood']))
    {
        $this->nm_new_label['blood'] = "Blood";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $blood = $this->blood;
   $sStyleHidden_blood = '';
   if (isset($this->nmgp_cmp_hidden['blood']) && $this->nmgp_cmp_hidden['blood'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['blood']);
       $sStyleHidden_blood = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_blood = 'display: none;';
   $sStyleReadInp_blood = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['blood']) && $this->nmgp_cmp_readonly['blood'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['blood']);
       $sStyleReadLab_blood = '';
       $sStyleReadInp_blood = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['blood']) && $this->nmgp_cmp_hidden['blood'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="blood" value="<?php echo $this->form_encode_input($blood) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_blood_label" id="hidden_field_label_blood" style="<?php echo $sStyleHidden_blood; ?>"><span id="id_label_blood"><?php echo $this->nm_new_label['blood']; ?></span></TD>
    <TD class="scFormDataOdd css_blood_line" id="hidden_field_data_blood" style="<?php echo $sStyleHidden_blood; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_blood_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["blood"]) &&  $this->nmgp_cmp_readonly["blood"] == "on") { 

 ?>
<input type="hidden" name="blood" value="<?php echo $this->form_encode_input($blood) . "\">" . $blood . ""; ?>
<?php } else { ?>
<span id="id_read_on_blood" class="sc-ui-readonly-blood css_blood_line" style="<?php echo $sStyleReadLab_blood; ?>"><?php echo $this->blood; ?></span><span id="id_read_off_blood" class="css_read_off_blood" style="white-space: nowrap;<?php echo $sStyleReadInp_blood; ?>">
 <input class="sc-js-input scFormObjectOdd css_blood_obj" style="" id="id_sc_field_blood" type=text name="blood" value="<?php echo $this->form_encode_input($blood) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_blood_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_blood_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['phone']))
    {
        $this->nm_new_label['phone'] = "Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $phone = $this->phone;
   $sStyleHidden_phone = '';
   if (isset($this->nmgp_cmp_hidden['phone']) && $this->nmgp_cmp_hidden['phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['phone']);
       $sStyleHidden_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_phone = 'display: none;';
   $sStyleReadInp_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['phone']) && $this->nmgp_cmp_readonly['phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['phone']);
       $sStyleReadLab_phone = '';
       $sStyleReadInp_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['phone']) && $this->nmgp_cmp_hidden['phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="phone" value="<?php echo $this->form_encode_input($phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_phone_label" id="hidden_field_label_phone" style="<?php echo $sStyleHidden_phone; ?>"><span id="id_label_phone"><?php echo $this->nm_new_label['phone']; ?></span></TD>
    <TD class="scFormDataOdd css_phone_line" id="hidden_field_data_phone" style="<?php echo $sStyleHidden_phone; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_phone_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["phone"]) &&  $this->nmgp_cmp_readonly["phone"] == "on") { 

 ?>
<input type="hidden" name="phone" value="<?php echo $this->form_encode_input($phone) . "\">" . $phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_phone" class="sc-ui-readonly-phone css_phone_line" style="<?php echo $sStyleReadLab_phone; ?>"><?php echo $this->phone; ?></span><span id="id_read_off_phone" class="css_read_off_phone" style="white-space: nowrap;<?php echo $sStyleReadInp_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_phone_obj" style="" id="id_sc_field_phone" type=text name="phone" value="<?php echo $this->form_encode_input($phone) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_phone_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['hp']))
    {
        $this->nm_new_label['hp'] = "Hp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hp = $this->hp;
   $sStyleHidden_hp = '';
   if (isset($this->nmgp_cmp_hidden['hp']) && $this->nmgp_cmp_hidden['hp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hp']);
       $sStyleHidden_hp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hp = 'display: none;';
   $sStyleReadInp_hp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hp']) && $this->nmgp_cmp_readonly['hp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hp']);
       $sStyleReadLab_hp = '';
       $sStyleReadInp_hp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hp']) && $this->nmgp_cmp_hidden['hp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hp" value="<?php echo $this->form_encode_input($hp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_hp_label" id="hidden_field_label_hp" style="<?php echo $sStyleHidden_hp; ?>"><span id="id_label_hp"><?php echo $this->nm_new_label['hp']; ?></span></TD>
    <TD class="scFormDataOdd css_hp_line" id="hidden_field_data_hp" style="<?php echo $sStyleHidden_hp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hp"]) &&  $this->nmgp_cmp_readonly["hp"] == "on") { 

 ?>
<input type="hidden" name="hp" value="<?php echo $this->form_encode_input($hp) . "\">" . $hp . ""; ?>
<?php } else { ?>
<span id="id_read_on_hp" class="sc-ui-readonly-hp css_hp_line" style="<?php echo $sStyleReadLab_hp; ?>"><?php echo $this->hp; ?></span><span id="id_read_off_hp" class="css_read_off_hp" style="white-space: nowrap;<?php echo $sStyleReadInp_hp; ?>">
 <input class="sc-js-input scFormObjectOdd css_hp_obj" style="" id="id_sc_field_hp" type=text name="hp" value="<?php echo $this->form_encode_input($hp) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['religion']))
    {
        $this->nm_new_label['religion'] = "Religion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $religion = $this->religion;
   $sStyleHidden_religion = '';
   if (isset($this->nmgp_cmp_hidden['religion']) && $this->nmgp_cmp_hidden['religion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['religion']);
       $sStyleHidden_religion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_religion = 'display: none;';
   $sStyleReadInp_religion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['religion']) && $this->nmgp_cmp_readonly['religion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['religion']);
       $sStyleReadLab_religion = '';
       $sStyleReadInp_religion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['religion']) && $this->nmgp_cmp_hidden['religion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="religion" value="<?php echo $this->form_encode_input($religion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_religion_label" id="hidden_field_label_religion" style="<?php echo $sStyleHidden_religion; ?>"><span id="id_label_religion"><?php echo $this->nm_new_label['religion']; ?></span></TD>
    <TD class="scFormDataOdd css_religion_line" id="hidden_field_data_religion" style="<?php echo $sStyleHidden_religion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_religion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["religion"]) &&  $this->nmgp_cmp_readonly["religion"] == "on") { 

 ?>
<input type="hidden" name="religion" value="<?php echo $this->form_encode_input($religion) . "\">" . $religion . ""; ?>
<?php } else { ?>
<span id="id_read_on_religion" class="sc-ui-readonly-religion css_religion_line" style="<?php echo $sStyleReadLab_religion; ?>"><?php echo $this->religion; ?></span><span id="id_read_off_religion" class="css_read_off_religion" style="white-space: nowrap;<?php echo $sStyleReadInp_religion; ?>">
 <input class="sc-js-input scFormObjectOdd css_religion_obj" style="" id="id_sc_field_religion" type=text name="religion" value="<?php echo $this->form_encode_input($religion) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_religion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_religion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['marstatus']))
    {
        $this->nm_new_label['marstatus'] = "Mar Status";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $marstatus = $this->marstatus;
   $sStyleHidden_marstatus = '';
   if (isset($this->nmgp_cmp_hidden['marstatus']) && $this->nmgp_cmp_hidden['marstatus'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['marstatus']);
       $sStyleHidden_marstatus = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_marstatus = 'display: none;';
   $sStyleReadInp_marstatus = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['marstatus']) && $this->nmgp_cmp_readonly['marstatus'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['marstatus']);
       $sStyleReadLab_marstatus = '';
       $sStyleReadInp_marstatus = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['marstatus']) && $this->nmgp_cmp_hidden['marstatus'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="marstatus" value="<?php echo $this->form_encode_input($marstatus) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_marstatus_label" id="hidden_field_label_marstatus" style="<?php echo $sStyleHidden_marstatus; ?>"><span id="id_label_marstatus"><?php echo $this->nm_new_label['marstatus']; ?></span></TD>
    <TD class="scFormDataOdd css_marstatus_line" id="hidden_field_data_marstatus" style="<?php echo $sStyleHidden_marstatus; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_marstatus_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["marstatus"]) &&  $this->nmgp_cmp_readonly["marstatus"] == "on") { 

 ?>
<input type="hidden" name="marstatus" value="<?php echo $this->form_encode_input($marstatus) . "\">" . $marstatus . ""; ?>
<?php } else { ?>
<span id="id_read_on_marstatus" class="sc-ui-readonly-marstatus css_marstatus_line" style="<?php echo $sStyleReadLab_marstatus; ?>"><?php echo $this->marstatus; ?></span><span id="id_read_off_marstatus" class="css_read_off_marstatus" style="white-space: nowrap;<?php echo $sStyleReadInp_marstatus; ?>">
 <input class="sc-js-input scFormObjectOdd css_marstatus_obj" style="" id="id_sc_field_marstatus" type=text name="marstatus" value="<?php echo $this->form_encode_input($marstatus) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_marstatus_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_marstatus_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['suku']))
    {
        $this->nm_new_label['suku'] = "Suku";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $suku = $this->suku;
   $sStyleHidden_suku = '';
   if (isset($this->nmgp_cmp_hidden['suku']) && $this->nmgp_cmp_hidden['suku'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['suku']);
       $sStyleHidden_suku = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_suku = 'display: none;';
   $sStyleReadInp_suku = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['suku']) && $this->nmgp_cmp_readonly['suku'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['suku']);
       $sStyleReadLab_suku = '';
       $sStyleReadInp_suku = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['suku']) && $this->nmgp_cmp_hidden['suku'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="suku" value="<?php echo $this->form_encode_input($suku) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_suku_label" id="hidden_field_label_suku" style="<?php echo $sStyleHidden_suku; ?>"><span id="id_label_suku"><?php echo $this->nm_new_label['suku']; ?></span></TD>
    <TD class="scFormDataOdd css_suku_line" id="hidden_field_data_suku" style="<?php echo $sStyleHidden_suku; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_suku_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["suku"]) &&  $this->nmgp_cmp_readonly["suku"] == "on") { 

 ?>
<input type="hidden" name="suku" value="<?php echo $this->form_encode_input($suku) . "\">" . $suku . ""; ?>
<?php } else { ?>
<span id="id_read_on_suku" class="sc-ui-readonly-suku css_suku_line" style="<?php echo $sStyleReadLab_suku; ?>"><?php echo $this->suku; ?></span><span id="id_read_off_suku" class="css_read_off_suku" style="white-space: nowrap;<?php echo $sStyleReadInp_suku; ?>">
 <input class="sc-js-input scFormObjectOdd css_suku_obj" style="" id="id_sc_field_suku" type=text name="suku" value="<?php echo $this->form_encode_input($suku) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_suku_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_suku_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['wn']))
    {
        $this->nm_new_label['wn'] = "Wn";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $wn = $this->wn;
   $sStyleHidden_wn = '';
   if (isset($this->nmgp_cmp_hidden['wn']) && $this->nmgp_cmp_hidden['wn'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['wn']);
       $sStyleHidden_wn = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_wn = 'display: none;';
   $sStyleReadInp_wn = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['wn']) && $this->nmgp_cmp_readonly['wn'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['wn']);
       $sStyleReadLab_wn = '';
       $sStyleReadInp_wn = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['wn']) && $this->nmgp_cmp_hidden['wn'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="wn" value="<?php echo $this->form_encode_input($wn) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_wn_label" id="hidden_field_label_wn" style="<?php echo $sStyleHidden_wn; ?>"><span id="id_label_wn"><?php echo $this->nm_new_label['wn']; ?></span></TD>
    <TD class="scFormDataOdd css_wn_line" id="hidden_field_data_wn" style="<?php echo $sStyleHidden_wn; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_wn_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["wn"]) &&  $this->nmgp_cmp_readonly["wn"] == "on") { 

 ?>
<input type="hidden" name="wn" value="<?php echo $this->form_encode_input($wn) . "\">" . $wn . ""; ?>
<?php } else { ?>
<span id="id_read_on_wn" class="sc-ui-readonly-wn css_wn_line" style="<?php echo $sStyleReadLab_wn; ?>"><?php echo $this->wn; ?></span><span id="id_read_off_wn" class="css_read_off_wn" style="white-space: nowrap;<?php echo $sStyleReadInp_wn; ?>">
 <input class="sc-js-input scFormObjectOdd css_wn_obj" style="" id="id_sc_field_wn" type=text name="wn" value="<?php echo $this->form_encode_input($wn) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_wn_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_wn_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['simtype']))
    {
        $this->nm_new_label['simtype'] = "Sim Type";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $simtype = $this->simtype;
   $sStyleHidden_simtype = '';
   if (isset($this->nmgp_cmp_hidden['simtype']) && $this->nmgp_cmp_hidden['simtype'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['simtype']);
       $sStyleHidden_simtype = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_simtype = 'display: none;';
   $sStyleReadInp_simtype = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['simtype']) && $this->nmgp_cmp_readonly['simtype'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['simtype']);
       $sStyleReadLab_simtype = '';
       $sStyleReadInp_simtype = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['simtype']) && $this->nmgp_cmp_hidden['simtype'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="simtype" value="<?php echo $this->form_encode_input($simtype) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_simtype_label" id="hidden_field_label_simtype" style="<?php echo $sStyleHidden_simtype; ?>"><span id="id_label_simtype"><?php echo $this->nm_new_label['simtype']; ?></span></TD>
    <TD class="scFormDataOdd css_simtype_line" id="hidden_field_data_simtype" style="<?php echo $sStyleHidden_simtype; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_simtype_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["simtype"]) &&  $this->nmgp_cmp_readonly["simtype"] == "on") { 

 ?>
<input type="hidden" name="simtype" value="<?php echo $this->form_encode_input($simtype) . "\">" . $simtype . ""; ?>
<?php } else { ?>
<span id="id_read_on_simtype" class="sc-ui-readonly-simtype css_simtype_line" style="<?php echo $sStyleReadLab_simtype; ?>"><?php echo $this->simtype; ?></span><span id="id_read_off_simtype" class="css_read_off_simtype" style="white-space: nowrap;<?php echo $sStyleReadInp_simtype; ?>">
 <input class="sc-js-input scFormObjectOdd css_simtype_obj" style="" id="id_sc_field_simtype" type=text name="simtype" value="<?php echo $this->form_encode_input($simtype) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_simtype_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_simtype_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['simno']))
    {
        $this->nm_new_label['simno'] = "Sim No";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $simno = $this->simno;
   $sStyleHidden_simno = '';
   if (isset($this->nmgp_cmp_hidden['simno']) && $this->nmgp_cmp_hidden['simno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['simno']);
       $sStyleHidden_simno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_simno = 'display: none;';
   $sStyleReadInp_simno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['simno']) && $this->nmgp_cmp_readonly['simno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['simno']);
       $sStyleReadLab_simno = '';
       $sStyleReadInp_simno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['simno']) && $this->nmgp_cmp_hidden['simno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="simno" value="<?php echo $this->form_encode_input($simno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_simno_label" id="hidden_field_label_simno" style="<?php echo $sStyleHidden_simno; ?>"><span id="id_label_simno"><?php echo $this->nm_new_label['simno']; ?></span></TD>
    <TD class="scFormDataOdd css_simno_line" id="hidden_field_data_simno" style="<?php echo $sStyleHidden_simno; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_simno_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["simno"]) &&  $this->nmgp_cmp_readonly["simno"] == "on") { 

 ?>
<input type="hidden" name="simno" value="<?php echo $this->form_encode_input($simno) . "\">" . $simno . ""; ?>
<?php } else { ?>
<span id="id_read_on_simno" class="sc-ui-readonly-simno css_simno_line" style="<?php echo $sStyleReadLab_simno; ?>"><?php echo $this->simno; ?></span><span id="id_read_off_simno" class="css_read_off_simno" style="white-space: nowrap;<?php echo $sStyleReadInp_simno; ?>">
 <input class="sc-js-input scFormObjectOdd css_simno_obj" style="" id="id_sc_field_simno" type=text name="simno" value="<?php echo $this->form_encode_input($simno) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_simno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_simno_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ktp']))
    {
        $this->nm_new_label['ktp'] = "Ktp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ktp = $this->ktp;
   $sStyleHidden_ktp = '';
   if (isset($this->nmgp_cmp_hidden['ktp']) && $this->nmgp_cmp_hidden['ktp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ktp']);
       $sStyleHidden_ktp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ktp = 'display: none;';
   $sStyleReadInp_ktp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ktp']) && $this->nmgp_cmp_readonly['ktp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ktp']);
       $sStyleReadLab_ktp = '';
       $sStyleReadInp_ktp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ktp']) && $this->nmgp_cmp_hidden['ktp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ktp" value="<?php echo $this->form_encode_input($ktp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ktp_label" id="hidden_field_label_ktp" style="<?php echo $sStyleHidden_ktp; ?>"><span id="id_label_ktp"><?php echo $this->nm_new_label['ktp']; ?></span></TD>
    <TD class="scFormDataOdd css_ktp_line" id="hidden_field_data_ktp" style="<?php echo $sStyleHidden_ktp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ktp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ktp"]) &&  $this->nmgp_cmp_readonly["ktp"] == "on") { 

 ?>
<input type="hidden" name="ktp" value="<?php echo $this->form_encode_input($ktp) . "\">" . $ktp . ""; ?>
<?php } else { ?>
<span id="id_read_on_ktp" class="sc-ui-readonly-ktp css_ktp_line" style="<?php echo $sStyleReadLab_ktp; ?>"><?php echo $this->ktp; ?></span><span id="id_read_off_ktp" class="css_read_off_ktp" style="white-space: nowrap;<?php echo $sStyleReadInp_ktp; ?>">
 <input class="sc-js-input scFormObjectOdd css_ktp_obj" style="" id="id_sc_field_ktp" type=text name="ktp" value="<?php echo $this->form_encode_input($ktp) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ktp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ktp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['npwp']))
    {
        $this->nm_new_label['npwp'] = "Npwp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $npwp = $this->npwp;
   $sStyleHidden_npwp = '';
   if (isset($this->nmgp_cmp_hidden['npwp']) && $this->nmgp_cmp_hidden['npwp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['npwp']);
       $sStyleHidden_npwp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_npwp = 'display: none;';
   $sStyleReadInp_npwp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['npwp']) && $this->nmgp_cmp_readonly['npwp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['npwp']);
       $sStyleReadLab_npwp = '';
       $sStyleReadInp_npwp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['npwp']) && $this->nmgp_cmp_hidden['npwp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="npwp" value="<?php echo $this->form_encode_input($npwp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_npwp_label" id="hidden_field_label_npwp" style="<?php echo $sStyleHidden_npwp; ?>"><span id="id_label_npwp"><?php echo $this->nm_new_label['npwp']; ?></span></TD>
    <TD class="scFormDataOdd css_npwp_line" id="hidden_field_data_npwp" style="<?php echo $sStyleHidden_npwp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_npwp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["npwp"]) &&  $this->nmgp_cmp_readonly["npwp"] == "on") { 

 ?>
<input type="hidden" name="npwp" value="<?php echo $this->form_encode_input($npwp) . "\">" . $npwp . ""; ?>
<?php } else { ?>
<span id="id_read_on_npwp" class="sc-ui-readonly-npwp css_npwp_line" style="<?php echo $sStyleReadLab_npwp; ?>"><?php echo $this->npwp; ?></span><span id="id_read_off_npwp" class="css_read_off_npwp" style="white-space: nowrap;<?php echo $sStyleReadInp_npwp; ?>">
 <input class="sc-js-input scFormObjectOdd css_npwp_obj" style="" id="id_sc_field_npwp" type=text name="npwp" value="<?php echo $this->form_encode_input($npwp) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_npwp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_npwp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['email']))
    {
        $this->nm_new_label['email'] = "Email";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $email = $this->email;
   $sStyleHidden_email = '';
   if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['email']);
       $sStyleHidden_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_email = 'display: none;';
   $sStyleReadInp_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['email']) && $this->nmgp_cmp_readonly['email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['email']);
       $sStyleReadLab_email = '';
       $sStyleReadInp_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_email_label" id="hidden_field_label_email" style="<?php echo $sStyleHidden_email; ?>"><span id="id_label_email"><?php echo $this->nm_new_label['email']; ?></span></TD>
    <TD class="scFormDataOdd css_email_line" id="hidden_field_data_email" style="<?php echo $sStyleHidden_email; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email"]) &&  $this->nmgp_cmp_readonly["email"] == "on") { 

 ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">" . $email . ""; ?>
<?php } else { ?>
<span id="id_read_on_email" class="sc-ui-readonly-email css_email_line" style="<?php echo $sStyleReadLab_email; ?>"><?php echo $this->email; ?></span><span id="id_read_off_email" class="css_read_off_email" style="white-space: nowrap;<?php echo $sStyleReadInp_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_email_obj" style="" id="id_sc_field_email" type=text name="email" value="<?php echo $this->form_encode_input($email) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['hobby']))
    {
        $this->nm_new_label['hobby'] = "Hobby";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hobby = $this->hobby;
   $sStyleHidden_hobby = '';
   if (isset($this->nmgp_cmp_hidden['hobby']) && $this->nmgp_cmp_hidden['hobby'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hobby']);
       $sStyleHidden_hobby = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hobby = 'display: none;';
   $sStyleReadInp_hobby = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hobby']) && $this->nmgp_cmp_readonly['hobby'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hobby']);
       $sStyleReadLab_hobby = '';
       $sStyleReadInp_hobby = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hobby']) && $this->nmgp_cmp_hidden['hobby'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hobby" value="<?php echo $this->form_encode_input($hobby) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_hobby_label" id="hidden_field_label_hobby" style="<?php echo $sStyleHidden_hobby; ?>"><span id="id_label_hobby"><?php echo $this->nm_new_label['hobby']; ?></span></TD>
    <TD class="scFormDataOdd css_hobby_line" id="hidden_field_data_hobby" style="<?php echo $sStyleHidden_hobby; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hobby_line" style="vertical-align: top;padding: 0px">
<?php
$hobby_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($hobby));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hobby"]) &&  $this->nmgp_cmp_readonly["hobby"] == "on") { 

 ?>
<input type="hidden" name="hobby" value="<?php echo $this->form_encode_input($hobby) . "\">" . $hobby_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_hobby" class="sc-ui-readonly-hobby css_hobby_line" style="<?php echo $sStyleReadLab_hobby; ?>"><?php echo $hobby_val; ?></span><span id="id_read_off_hobby" class="css_read_off_hobby" style="white-space: nowrap;<?php echo $sStyleReadInp_hobby; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_hobby_obj" style="white-space: pre-wrap;" name="hobby" id="id_sc_field_hobby" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $hobby; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hobby_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hobby_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lastupdate']))
    {
        $this->nm_new_label['lastupdate'] = "Last Update";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_lastupdate = $this->lastupdate;
   if (strlen($this->lastupdate_hora) > 8 ) {$this->lastupdate_hora = substr($this->lastupdate_hora, 0, 8);}
   $this->lastupdate .= ' ' . $this->lastupdate_hora;
   $lastupdate = $this->lastupdate;
   $sStyleHidden_lastupdate = '';
   if (isset($this->nmgp_cmp_hidden['lastupdate']) && $this->nmgp_cmp_hidden['lastupdate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lastupdate']);
       $sStyleHidden_lastupdate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lastupdate = 'display: none;';
   $sStyleReadInp_lastupdate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lastupdate']) && $this->nmgp_cmp_readonly['lastupdate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lastupdate']);
       $sStyleReadLab_lastupdate = '';
       $sStyleReadInp_lastupdate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lastupdate']) && $this->nmgp_cmp_hidden['lastupdate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lastupdate" value="<?php echo $this->form_encode_input($lastupdate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_lastupdate_label" id="hidden_field_label_lastupdate" style="<?php echo $sStyleHidden_lastupdate; ?>"><span id="id_label_lastupdate"><?php echo $this->nm_new_label['lastupdate']; ?></span></TD>
    <TD class="scFormDataOdd css_lastupdate_line" id="hidden_field_data_lastupdate" style="<?php echo $sStyleHidden_lastupdate; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lastupdate_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lastupdate"]) &&  $this->nmgp_cmp_readonly["lastupdate"] == "on") { 

 ?>
<input type="hidden" name="lastupdate" value="<?php echo $this->form_encode_input($lastupdate) . "\">" . $lastupdate . ""; ?>
<?php } else { ?>
<span id="id_read_on_lastupdate" class="sc-ui-readonly-lastupdate css_lastupdate_line" style="<?php echo $sStyleReadLab_lastupdate; ?>"><?php echo $lastupdate; ?></span><span id="id_read_off_lastupdate" class="css_read_off_lastupdate" style="white-space: nowrap;<?php echo $sStyleReadInp_lastupdate; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_lastupdate_obj" style="" id="id_sc_field_lastupdate" type=text name="lastupdate" value="<?php echo $this->form_encode_input($lastupdate) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['lastupdate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['lastupdate']['date_format']; ?>', timeSep: '<?php echo $this->field_config['lastupdate']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['lastupdate']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lastupdate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lastupdate_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->lastupdate = $old_dt_lastupdate;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nipman']))
    {
        $this->nm_new_label['nipman'] = "Nip Man";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nipman = $this->nipman;
   $sStyleHidden_nipman = '';
   if (isset($this->nmgp_cmp_hidden['nipman']) && $this->nmgp_cmp_hidden['nipman'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nipman']);
       $sStyleHidden_nipman = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nipman = 'display: none;';
   $sStyleReadInp_nipman = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nipman']) && $this->nmgp_cmp_readonly['nipman'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nipman']);
       $sStyleReadLab_nipman = '';
       $sStyleReadInp_nipman = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nipman']) && $this->nmgp_cmp_hidden['nipman'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nipman" value="<?php echo $this->form_encode_input($nipman) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nipman_label" id="hidden_field_label_nipman" style="<?php echo $sStyleHidden_nipman; ?>"><span id="id_label_nipman"><?php echo $this->nm_new_label['nipman']; ?></span></TD>
    <TD class="scFormDataOdd css_nipman_line" id="hidden_field_data_nipman" style="<?php echo $sStyleHidden_nipman; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nipman_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nipman"]) &&  $this->nmgp_cmp_readonly["nipman"] == "on") { 

 ?>
<input type="hidden" name="nipman" value="<?php echo $this->form_encode_input($nipman) . "\">" . $nipman . ""; ?>
<?php } else { ?>
<span id="id_read_on_nipman" class="sc-ui-readonly-nipman css_nipman_line" style="<?php echo $sStyleReadLab_nipman; ?>"><?php echo $this->nipman; ?></span><span id="id_read_off_nipman" class="css_read_off_nipman" style="white-space: nowrap;<?php echo $sStyleReadInp_nipman; ?>">
 <input class="sc-js-input scFormObjectOdd css_nipman_obj" style="" id="id_sc_field_nipman" type=text name="nipman" value="<?php echo $this->form_encode_input($nipman) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nipman_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nipman_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['department']))
    {
        $this->nm_new_label['department'] = "Department";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $department = $this->department;
   $sStyleHidden_department = '';
   if (isset($this->nmgp_cmp_hidden['department']) && $this->nmgp_cmp_hidden['department'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['department']);
       $sStyleHidden_department = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_department = 'display: none;';
   $sStyleReadInp_department = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['department']) && $this->nmgp_cmp_readonly['department'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['department']);
       $sStyleReadLab_department = '';
       $sStyleReadInp_department = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['department']) && $this->nmgp_cmp_hidden['department'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="department" value="<?php echo $this->form_encode_input($department) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_department_label" id="hidden_field_label_department" style="<?php echo $sStyleHidden_department; ?>"><span id="id_label_department"><?php echo $this->nm_new_label['department']; ?></span></TD>
    <TD class="scFormDataOdd css_department_line" id="hidden_field_data_department" style="<?php echo $sStyleHidden_department; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_department_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["department"]) &&  $this->nmgp_cmp_readonly["department"] == "on") { 

 ?>
<input type="hidden" name="department" value="<?php echo $this->form_encode_input($department) . "\">" . $department . ""; ?>
<?php } else { ?>
<span id="id_read_on_department" class="sc-ui-readonly-department css_department_line" style="<?php echo $sStyleReadLab_department; ?>"><?php echo $this->department; ?></span><span id="id_read_off_department" class="css_read_off_department" style="white-space: nowrap;<?php echo $sStyleReadInp_department; ?>">
 <input class="sc-js-input scFormObjectOdd css_department_obj" style="" id="id_sc_field_department" type=text name="department" value="<?php echo $this->form_encode_input($department) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_department_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_department_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fp']))
    {
        $this->nm_new_label['fp'] = "Fp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fp = $this->fp;
   $sStyleHidden_fp = '';
   if (isset($this->nmgp_cmp_hidden['fp']) && $this->nmgp_cmp_hidden['fp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fp']);
       $sStyleHidden_fp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fp = 'display: none;';
   $sStyleReadInp_fp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fp']) && $this->nmgp_cmp_readonly['fp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fp']);
       $sStyleReadLab_fp = '';
       $sStyleReadInp_fp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fp']) && $this->nmgp_cmp_hidden['fp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fp" value="<?php echo $this->form_encode_input($fp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fp_label" id="hidden_field_label_fp" style="<?php echo $sStyleHidden_fp; ?>"><span id="id_label_fp"><?php echo $this->nm_new_label['fp']; ?></span></TD>
    <TD class="scFormDataOdd css_fp_line" id="hidden_field_data_fp" style="<?php echo $sStyleHidden_fp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fp"]) &&  $this->nmgp_cmp_readonly["fp"] == "on") { 

 ?>
<input type="hidden" name="fp" value="<?php echo $this->form_encode_input($fp) . "\">" . $fp . ""; ?>
<?php } else { ?>
<span id="id_read_on_fp" class="sc-ui-readonly-fp css_fp_line" style="<?php echo $sStyleReadLab_fp; ?>"><?php echo $this->fp; ?></span><span id="id_read_off_fp" class="css_read_off_fp" style="white-space: nowrap;<?php echo $sStyleReadInp_fp; ?>">
 <input class="sc-js-input scFormObjectOdd css_fp_obj" style="" id="id_sc_field_fp" type=text name="fp" value="<?php echo $this->form_encode_input($fp) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['enterdate']))
    {
        $this->nm_new_label['enterdate'] = "Enter Date";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_enterdate = $this->enterdate;
   if (strlen($this->enterdate_hora) > 8 ) {$this->enterdate_hora = substr($this->enterdate_hora, 0, 8);}
   $this->enterdate .= ' ' . $this->enterdate_hora;
   $enterdate = $this->enterdate;
   $sStyleHidden_enterdate = '';
   if (isset($this->nmgp_cmp_hidden['enterdate']) && $this->nmgp_cmp_hidden['enterdate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['enterdate']);
       $sStyleHidden_enterdate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_enterdate = 'display: none;';
   $sStyleReadInp_enterdate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['enterdate']) && $this->nmgp_cmp_readonly['enterdate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['enterdate']);
       $sStyleReadLab_enterdate = '';
       $sStyleReadInp_enterdate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['enterdate']) && $this->nmgp_cmp_hidden['enterdate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="enterdate" value="<?php echo $this->form_encode_input($enterdate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_enterdate_label" id="hidden_field_label_enterdate" style="<?php echo $sStyleHidden_enterdate; ?>"><span id="id_label_enterdate"><?php echo $this->nm_new_label['enterdate']; ?></span></TD>
    <TD class="scFormDataOdd css_enterdate_line" id="hidden_field_data_enterdate" style="<?php echo $sStyleHidden_enterdate; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_enterdate_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enterdate"]) &&  $this->nmgp_cmp_readonly["enterdate"] == "on") { 

 ?>
<input type="hidden" name="enterdate" value="<?php echo $this->form_encode_input($enterdate) . "\">" . $enterdate . ""; ?>
<?php } else { ?>
<span id="id_read_on_enterdate" class="sc-ui-readonly-enterdate css_enterdate_line" style="<?php echo $sStyleReadLab_enterdate; ?>"><?php echo $enterdate; ?></span><span id="id_read_off_enterdate" class="css_read_off_enterdate" style="white-space: nowrap;<?php echo $sStyleReadInp_enterdate; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_enterdate_obj" style="" id="id_sc_field_enterdate" type=text name="enterdate" value="<?php echo $this->form_encode_input($enterdate) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['enterdate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['enterdate']['date_format']; ?>', timeSep: '<?php echo $this->field_config['enterdate']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['enterdate']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enterdate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enterdate_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->enterdate = $old_dt_enterdate;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['resigndate']))
    {
        $this->nm_new_label['resigndate'] = "Resign Date";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_resigndate = $this->resigndate;
   if (strlen($this->resigndate_hora) > 8 ) {$this->resigndate_hora = substr($this->resigndate_hora, 0, 8);}
   $this->resigndate .= ' ' . $this->resigndate_hora;
   $resigndate = $this->resigndate;
   $sStyleHidden_resigndate = '';
   if (isset($this->nmgp_cmp_hidden['resigndate']) && $this->nmgp_cmp_hidden['resigndate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['resigndate']);
       $sStyleHidden_resigndate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_resigndate = 'display: none;';
   $sStyleReadInp_resigndate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['resigndate']) && $this->nmgp_cmp_readonly['resigndate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['resigndate']);
       $sStyleReadLab_resigndate = '';
       $sStyleReadInp_resigndate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['resigndate']) && $this->nmgp_cmp_hidden['resigndate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="resigndate" value="<?php echo $this->form_encode_input($resigndate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_resigndate_label" id="hidden_field_label_resigndate" style="<?php echo $sStyleHidden_resigndate; ?>"><span id="id_label_resigndate"><?php echo $this->nm_new_label['resigndate']; ?></span></TD>
    <TD class="scFormDataOdd css_resigndate_line" id="hidden_field_data_resigndate" style="<?php echo $sStyleHidden_resigndate; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_resigndate_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["resigndate"]) &&  $this->nmgp_cmp_readonly["resigndate"] == "on") { 

 ?>
<input type="hidden" name="resigndate" value="<?php echo $this->form_encode_input($resigndate) . "\">" . $resigndate . ""; ?>
<?php } else { ?>
<span id="id_read_on_resigndate" class="sc-ui-readonly-resigndate css_resigndate_line" style="<?php echo $sStyleReadLab_resigndate; ?>"><?php echo $resigndate; ?></span><span id="id_read_off_resigndate" class="css_read_off_resigndate" style="white-space: nowrap;<?php echo $sStyleReadInp_resigndate; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_resigndate_obj" style="" id="id_sc_field_resigndate" type=text name="resigndate" value="<?php echo $this->form_encode_input($resigndate) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['resigndate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['resigndate']['date_format']; ?>', timeSep: '<?php echo $this->field_config['resigndate']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['resigndate']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resigndate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resigndate_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->resigndate = $old_dt_resigndate;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['resignnote']))
    {
        $this->nm_new_label['resignnote'] = "Resign Note";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $resignnote = $this->resignnote;
   $sStyleHidden_resignnote = '';
   if (isset($this->nmgp_cmp_hidden['resignnote']) && $this->nmgp_cmp_hidden['resignnote'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['resignnote']);
       $sStyleHidden_resignnote = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_resignnote = 'display: none;';
   $sStyleReadInp_resignnote = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['resignnote']) && $this->nmgp_cmp_readonly['resignnote'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['resignnote']);
       $sStyleReadLab_resignnote = '';
       $sStyleReadInp_resignnote = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['resignnote']) && $this->nmgp_cmp_hidden['resignnote'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="resignnote" value="<?php echo $this->form_encode_input($resignnote) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_resignnote_label" id="hidden_field_label_resignnote" style="<?php echo $sStyleHidden_resignnote; ?>"><span id="id_label_resignnote"><?php echo $this->nm_new_label['resignnote']; ?></span></TD>
    <TD class="scFormDataOdd css_resignnote_line" id="hidden_field_data_resignnote" style="<?php echo $sStyleHidden_resignnote; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_resignnote_line" style="vertical-align: top;padding: 0px">
<?php
$resignnote_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($resignnote));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["resignnote"]) &&  $this->nmgp_cmp_readonly["resignnote"] == "on") { 

 ?>
<input type="hidden" name="resignnote" value="<?php echo $this->form_encode_input($resignnote) . "\">" . $resignnote_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_resignnote" class="sc-ui-readonly-resignnote css_resignnote_line" style="<?php echo $sStyleReadLab_resignnote; ?>"><?php echo $resignnote_val; ?></span><span id="id_read_off_resignnote" class="css_read_off_resignnote" style="white-space: nowrap;<?php echo $sStyleReadInp_resignnote; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_resignnote_obj" style="white-space: pre-wrap;" name="resignnote" id="id_sc_field_resignnote" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $resignnote; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resignnote_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resignnote_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['status']))
    {
        $this->nm_new_label['status'] = "Status";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $status = $this->status;
   $sStyleHidden_status = '';
   if (isset($this->nmgp_cmp_hidden['status']) && $this->nmgp_cmp_hidden['status'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['status']);
       $sStyleHidden_status = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_status = 'display: none;';
   $sStyleReadInp_status = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['status']) && $this->nmgp_cmp_readonly['status'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['status']);
       $sStyleReadLab_status = '';
       $sStyleReadInp_status = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['status']) && $this->nmgp_cmp_hidden['status'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="status" value="<?php echo $this->form_encode_input($status) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_status_label" id="hidden_field_label_status" style="<?php echo $sStyleHidden_status; ?>"><span id="id_label_status"><?php echo $this->nm_new_label['status']; ?></span></TD>
    <TD class="scFormDataOdd css_status_line" id="hidden_field_data_status" style="<?php echo $sStyleHidden_status; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_status_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["status"]) &&  $this->nmgp_cmp_readonly["status"] == "on") { 

 ?>
<input type="hidden" name="status" value="<?php echo $this->form_encode_input($status) . "\">" . $status . ""; ?>
<?php } else { ?>
<span id="id_read_on_status" class="sc-ui-readonly-status css_status_line" style="<?php echo $sStyleReadLab_status; ?>"><?php echo $this->status; ?></span><span id="id_read_off_status" class="css_read_off_status" style="white-space: nowrap;<?php echo $sStyleReadInp_status; ?>">
 <input class="sc-js-input scFormObjectOdd css_status_obj" style="" id="id_sc_field_status" type=text name="status" value="<?php echo $this->form_encode_input($status) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_status_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_status_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['iscompleted']))
    {
        $this->nm_new_label['iscompleted'] = "Is Completed";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $iscompleted = $this->iscompleted;
   $sStyleHidden_iscompleted = '';
   if (isset($this->nmgp_cmp_hidden['iscompleted']) && $this->nmgp_cmp_hidden['iscompleted'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['iscompleted']);
       $sStyleHidden_iscompleted = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_iscompleted = 'display: none;';
   $sStyleReadInp_iscompleted = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['iscompleted']) && $this->nmgp_cmp_readonly['iscompleted'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['iscompleted']);
       $sStyleReadLab_iscompleted = '';
       $sStyleReadInp_iscompleted = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['iscompleted']) && $this->nmgp_cmp_hidden['iscompleted'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="iscompleted" value="<?php echo $this->form_encode_input($iscompleted) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_iscompleted_label" id="hidden_field_label_iscompleted" style="<?php echo $sStyleHidden_iscompleted; ?>"><span id="id_label_iscompleted"><?php echo $this->nm_new_label['iscompleted']; ?></span></TD>
    <TD class="scFormDataOdd css_iscompleted_line" id="hidden_field_data_iscompleted" style="<?php echo $sStyleHidden_iscompleted; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_iscompleted_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["iscompleted"]) &&  $this->nmgp_cmp_readonly["iscompleted"] == "on") { 

 ?>
<input type="hidden" name="iscompleted" value="<?php echo $this->form_encode_input($iscompleted) . "\">" . $iscompleted . ""; ?>
<?php } else { ?>
<span id="id_read_on_iscompleted" class="sc-ui-readonly-iscompleted css_iscompleted_line" style="<?php echo $sStyleReadLab_iscompleted; ?>"><?php echo $this->iscompleted; ?></span><span id="id_read_off_iscompleted" class="css_read_off_iscompleted" style="white-space: nowrap;<?php echo $sStyleReadInp_iscompleted; ?>">
 <input class="sc-js-input scFormObjectOdd css_iscompleted_obj" style="" id="id_sc_field_iscompleted" type=text name="iscompleted" value="<?php echo $this->form_encode_input($iscompleted) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['iscompleted']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['iscompleted']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['iscompleted']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iscompleted_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iscompleted_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tbemployee");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbemployee");
 parent.scAjaxDetailHeight("form_tbemployee", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbemployee", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbemployee", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['sc_modal'])
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
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-5").length && $("#sc_b_del_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-11").length && $("#sc_b_ini_b.sc-unique-btn-11").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-12").length && $("#sc_b_ret_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-13").length && $("#sc_b_avc_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-14").length && $("#sc_b_fim_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('final');
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbemployee']['buttonStatus'] = $this->nmgp_botoes;
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
