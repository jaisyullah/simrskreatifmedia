<?php
class form_tbfisikrawatinap_form extends form_tbfisikrawatinap_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - tbfisikrawatinap"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tbfisikrawatinap"); } ?></TITLE>
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
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
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
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_desc ?>'], 
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_asc ?>']{opacity:1!important;} 
   .scFormLabelOddMult a img{opacity:0;transition:all .2s;} 
   .scFormLabelOddMult:HOVER a img{opacity:1;transition:all .2s;} 
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
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbfisikrawatinap/form_tbfisikrawatinap_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbfisikrawatinap_sajax_js.php");
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

 function nm_field_disabled(Fields, Opt, Seq, Opcao) {
  if (Opcao != null) {
      opcao = Opcao;
  }
  else {
      opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  }
  if (opcao == "novo" && Opt == "U") {
      return;
  }
  if (opcao != "novo" && Opt == "I") {
      return;
  }
  Field = Fields.split(";");
  for (i=0; i < Field.length; i++)
  {
     F_temp = Field[i].split("=");
     F_name = F_temp[0];
     F_opc  = (F_temp[1] && ("disabled" == F_temp[1] || "true" == F_temp[1])) ? true : false;
     ini = 1;
     xx = document.F1.sc_contr_vert.value;
     if (Seq != null) 
     {
         ini = parseInt(Seq);
         xx  = ini + 1;
     }
     if (F_name == "tglperiksa_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "tglperiksa_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("tglperiksa_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_tbfisikrawatinap_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  sc_form_onload();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_tbfisikrawatinap_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
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
<?php
$_SESSION['scriptcase']['error_span_title']['form_tbfisikrawatinap'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbfisikrawatinap'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="100%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - tbfisikrawatinap"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tbfisikrawatinap"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
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
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_iframe'] != "R")
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
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
   if (!isset($this->nmgp_cmp_hidden['trancode_']))
   {
       $this->nmgp_cmp_hidden['trancode_'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
   <tr class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['tinggi_']) && $this->nmgp_cmp_hidden['tinggi_'] == 'off') { $sStyleHidden_tinggi_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tinggi_']) || $this->nmgp_cmp_hidden['tinggi_'] == 'on') {
      if (!isset($this->nm_new_label['tinggi_'])) {
          $this->nm_new_label['tinggi_'] = "Tinggi"; } ?>

    <TD class="scFormLabelOddMult css_tinggi__label" id="hidden_field_label_tinggi_" style="<?php echo $sStyleHidden_tinggi_; ?>" > <?php echo $this->nm_new_label['tinggi_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['berat_']) && $this->nmgp_cmp_hidden['berat_'] == 'off') { $sStyleHidden_berat_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['berat_']) || $this->nmgp_cmp_hidden['berat_'] == 'on') {
      if (!isset($this->nm_new_label['berat_'])) {
          $this->nm_new_label['berat_'] = "Berat"; } ?>

    <TD class="scFormLabelOddMult css_berat__label" id="hidden_field_label_berat_" style="<?php echo $sStyleHidden_berat_; ?>" > <?php echo $this->nm_new_label['berat_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['detakjantung_']) && $this->nmgp_cmp_hidden['detakjantung_'] == 'off') { $sStyleHidden_detakjantung_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['detakjantung_']) || $this->nmgp_cmp_hidden['detakjantung_'] == 'on') {
      if (!isset($this->nm_new_label['detakjantung_'])) {
          $this->nm_new_label['detakjantung_'] = "Detak Jantung"; } ?>

    <TD class="scFormLabelOddMult css_detakjantung__label" id="hidden_field_label_detakjantung_" style="<?php echo $sStyleHidden_detakjantung_; ?>" > <?php echo $this->nm_new_label['detakjantung_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tekanandarah_']) && $this->nmgp_cmp_hidden['tekanandarah_'] == 'off') { $sStyleHidden_tekanandarah_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tekanandarah_']) || $this->nmgp_cmp_hidden['tekanandarah_'] == 'on') {
      if (!isset($this->nm_new_label['tekanandarah_'])) {
          $this->nm_new_label['tekanandarah_'] = "Tekanan Darah"; } ?>

    <TD class="scFormLabelOddMult css_tekanandarah__label" id="hidden_field_label_tekanandarah_" style="<?php echo $sStyleHidden_tekanandarah_; ?>" > <?php echo $this->nm_new_label['tekanandarah_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['suhu_']) && $this->nmgp_cmp_hidden['suhu_'] == 'off') { $sStyleHidden_suhu_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['suhu_']) || $this->nmgp_cmp_hidden['suhu_'] == 'on') {
      if (!isset($this->nm_new_label['suhu_'])) {
          $this->nm_new_label['suhu_'] = "Suhu"; } ?>

    <TD class="scFormLabelOddMult css_suhu__label" id="hidden_field_label_suhu_" style="<?php echo $sStyleHidden_suhu_; ?>" > <?php echo $this->nm_new_label['suhu_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['nafas_']) && $this->nmgp_cmp_hidden['nafas_'] == 'off') { $sStyleHidden_nafas_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['nafas_']) || $this->nmgp_cmp_hidden['nafas_'] == 'on') {
      if (!isset($this->nm_new_label['nafas_'])) {
          $this->nm_new_label['nafas_'] = "Nafas"; } ?>

    <TD class="scFormLabelOddMult css_nafas__label" id="hidden_field_label_nafas_" style="<?php echo $sStyleHidden_nafas_; ?>" > <?php echo $this->nm_new_label['nafas_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['keluhan_']) && $this->nmgp_cmp_hidden['keluhan_'] == 'off') { $sStyleHidden_keluhan_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['keluhan_']) || $this->nmgp_cmp_hidden['keluhan_'] == 'on') {
      if (!isset($this->nm_new_label['keluhan_'])) {
          $this->nm_new_label['keluhan_'] = "Keluhan"; } ?>

    <TD class="scFormLabelOddMult css_keluhan__label" id="hidden_field_label_keluhan_" style="<?php echo $sStyleHidden_keluhan_; ?>" > <?php echo $this->nm_new_label['keluhan_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pemeriksa_']) && $this->nmgp_cmp_hidden['pemeriksa_'] == 'off') { $sStyleHidden_pemeriksa_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pemeriksa_']) || $this->nmgp_cmp_hidden['pemeriksa_'] == 'on') {
      if (!isset($this->nm_new_label['pemeriksa_'])) {
          $this->nm_new_label['pemeriksa_'] = "Pemeriksa"; } ?>

    <TD class="scFormLabelOddMult css_pemeriksa__label" id="hidden_field_label_pemeriksa_" style="<?php echo $sStyleHidden_pemeriksa_; ?>" > <?php echo $this->nm_new_label['pemeriksa_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tglperiksa_']) && $this->nmgp_cmp_hidden['tglperiksa_'] == 'off') { $sStyleHidden_tglperiksa_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tglperiksa_']) || $this->nmgp_cmp_hidden['tglperiksa_'] == 'on') {
      if (!isset($this->nm_new_label['tglperiksa_'])) {
          $this->nm_new_label['tglperiksa_'] = "Tgl Periksa"; } ?>

    <TD class="scFormLabelOddMult css_tglperiksa__label" id="hidden_field_label_tglperiksa_" style="<?php echo $sStyleHidden_tglperiksa_; ?>" > <?php echo $this->nm_new_label['tglperiksa_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['trancode_']) && $this->nmgp_cmp_hidden['trancode_'] == 'off') { $sStyleHidden_trancode_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['trancode_']) || $this->nmgp_cmp_hidden['trancode_'] == 'on') {
      if (!isset($this->nm_new_label['trancode_'])) {
          $this->nm_new_label['trancode_'] = "Kode Transaksi"; } ?>

    <TD class="scFormLabelOddMult css_trancode__label" id="hidden_field_label_trancode_" style="<?php echo $sStyleHidden_trancode_; ?>" > <?php echo $this->nm_new_label['trancode_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_tbfisikrawatinap);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_tbfisikrawatinap = $this->form_vert_form_tbfisikrawatinap;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_tbfisikrawatinap))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['trancode_']))
           {
               $this->nmgp_cmp_readonly['trancode_'] = 'on';
           }
   foreach ($this->form_vert_form_tbfisikrawatinap as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->id_ = $this->form_vert_form_tbfisikrawatinap[$sc_seq_vert]['id_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['tinggi_'] = true;
           $this->nmgp_cmp_readonly['berat_'] = true;
           $this->nmgp_cmp_readonly['detakjantung_'] = true;
           $this->nmgp_cmp_readonly['tekanandarah_'] = true;
           $this->nmgp_cmp_readonly['suhu_'] = true;
           $this->nmgp_cmp_readonly['nafas_'] = true;
           $this->nmgp_cmp_readonly['keluhan_'] = true;
           $this->nmgp_cmp_readonly['pemeriksa_'] = true;
           $this->nmgp_cmp_readonly['tglperiksa_'] = true;
           $this->nmgp_cmp_readonly['trancode_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['tinggi_']) || $this->nmgp_cmp_readonly['tinggi_'] != "on") {$this->nmgp_cmp_readonly['tinggi_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['berat_']) || $this->nmgp_cmp_readonly['berat_'] != "on") {$this->nmgp_cmp_readonly['berat_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['detakjantung_']) || $this->nmgp_cmp_readonly['detakjantung_'] != "on") {$this->nmgp_cmp_readonly['detakjantung_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tekanandarah_']) || $this->nmgp_cmp_readonly['tekanandarah_'] != "on") {$this->nmgp_cmp_readonly['tekanandarah_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['suhu_']) || $this->nmgp_cmp_readonly['suhu_'] != "on") {$this->nmgp_cmp_readonly['suhu_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nafas_']) || $this->nmgp_cmp_readonly['nafas_'] != "on") {$this->nmgp_cmp_readonly['nafas_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['keluhan_']) || $this->nmgp_cmp_readonly['keluhan_'] != "on") {$this->nmgp_cmp_readonly['keluhan_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pemeriksa_']) || $this->nmgp_cmp_readonly['pemeriksa_'] != "on") {$this->nmgp_cmp_readonly['pemeriksa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tglperiksa_']) || $this->nmgp_cmp_readonly['tglperiksa_'] != "on") {$this->nmgp_cmp_readonly['tglperiksa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['trancode_']) || $this->nmgp_cmp_readonly['trancode_'] != "on") {$this->nmgp_cmp_readonly['trancode_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->tinggi_ = $this->form_vert_form_tbfisikrawatinap[$sc_seq_vert]['tinggi_']; 
       $tinggi_ = $this->tinggi_; 
       $sStyleHidden_tinggi_ = '';
       if (isset($sCheckRead_tinggi_))
       {
           unset($sCheckRead_tinggi_);
       }
       if (isset($this->nmgp_cmp_readonly['tinggi_']))
       {
           $sCheckRead_tinggi_ = $this->nmgp_cmp_readonly['tinggi_'];
       }
       if (isset($this->nmgp_cmp_hidden['tinggi_']) && $this->nmgp_cmp_hidden['tinggi_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tinggi_']);
           $sStyleHidden_tinggi_ = 'display: none;';
       }
       $bTestReadOnly_tinggi_ = true;
       $sStyleReadLab_tinggi_ = 'display: none;';
       $sStyleReadInp_tinggi_ = '';
       if (isset($this->nmgp_cmp_readonly['tinggi_']) && $this->nmgp_cmp_readonly['tinggi_'] == 'on')
       {
           $bTestReadOnly_tinggi_ = false;
           unset($this->nmgp_cmp_readonly['tinggi_']);
           $sStyleReadLab_tinggi_ = '';
           $sStyleReadInp_tinggi_ = 'display: none;';
       }
       $this->berat_ = $this->form_vert_form_tbfisikrawatinap[$sc_seq_vert]['berat_']; 
       $berat_ = $this->berat_; 
       $sStyleHidden_berat_ = '';
       if (isset($sCheckRead_berat_))
       {
           unset($sCheckRead_berat_);
       }
       if (isset($this->nmgp_cmp_readonly['berat_']))
       {
           $sCheckRead_berat_ = $this->nmgp_cmp_readonly['berat_'];
       }
       if (isset($this->nmgp_cmp_hidden['berat_']) && $this->nmgp_cmp_hidden['berat_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['berat_']);
           $sStyleHidden_berat_ = 'display: none;';
       }
       $bTestReadOnly_berat_ = true;
       $sStyleReadLab_berat_ = 'display: none;';
       $sStyleReadInp_berat_ = '';
       if (isset($this->nmgp_cmp_readonly['berat_']) && $this->nmgp_cmp_readonly['berat_'] == 'on')
       {
           $bTestReadOnly_berat_ = false;
           unset($this->nmgp_cmp_readonly['berat_']);
           $sStyleReadLab_berat_ = '';
           $sStyleReadInp_berat_ = 'display: none;';
       }
       $this->detakjantung_ = $this->form_vert_form_tbfisikrawatinap[$sc_seq_vert]['detakjantung_']; 
       $detakjantung_ = $this->detakjantung_; 
       $sStyleHidden_detakjantung_ = '';
       if (isset($sCheckRead_detakjantung_))
       {
           unset($sCheckRead_detakjantung_);
       }
       if (isset($this->nmgp_cmp_readonly['detakjantung_']))
       {
           $sCheckRead_detakjantung_ = $this->nmgp_cmp_readonly['detakjantung_'];
       }
       if (isset($this->nmgp_cmp_hidden['detakjantung_']) && $this->nmgp_cmp_hidden['detakjantung_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['detakjantung_']);
           $sStyleHidden_detakjantung_ = 'display: none;';
       }
       $bTestReadOnly_detakjantung_ = true;
       $sStyleReadLab_detakjantung_ = 'display: none;';
       $sStyleReadInp_detakjantung_ = '';
       if (isset($this->nmgp_cmp_readonly['detakjantung_']) && $this->nmgp_cmp_readonly['detakjantung_'] == 'on')
       {
           $bTestReadOnly_detakjantung_ = false;
           unset($this->nmgp_cmp_readonly['detakjantung_']);
           $sStyleReadLab_detakjantung_ = '';
           $sStyleReadInp_detakjantung_ = 'display: none;';
       }
       $this->tekanandarah_ = $this->form_vert_form_tbfisikrawatinap[$sc_seq_vert]['tekanandarah_']; 
       $tekanandarah_ = $this->tekanandarah_; 
       $sStyleHidden_tekanandarah_ = '';
       if (isset($sCheckRead_tekanandarah_))
       {
           unset($sCheckRead_tekanandarah_);
       }
       if (isset($this->nmgp_cmp_readonly['tekanandarah_']))
       {
           $sCheckRead_tekanandarah_ = $this->nmgp_cmp_readonly['tekanandarah_'];
       }
       if (isset($this->nmgp_cmp_hidden['tekanandarah_']) && $this->nmgp_cmp_hidden['tekanandarah_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tekanandarah_']);
           $sStyleHidden_tekanandarah_ = 'display: none;';
       }
       $bTestReadOnly_tekanandarah_ = true;
       $sStyleReadLab_tekanandarah_ = 'display: none;';
       $sStyleReadInp_tekanandarah_ = '';
       if (isset($this->nmgp_cmp_readonly['tekanandarah_']) && $this->nmgp_cmp_readonly['tekanandarah_'] == 'on')
       {
           $bTestReadOnly_tekanandarah_ = false;
           unset($this->nmgp_cmp_readonly['tekanandarah_']);
           $sStyleReadLab_tekanandarah_ = '';
           $sStyleReadInp_tekanandarah_ = 'display: none;';
       }
       $this->suhu_ = $this->form_vert_form_tbfisikrawatinap[$sc_seq_vert]['suhu_']; 
       $suhu_ = $this->suhu_; 
       $sStyleHidden_suhu_ = '';
       if (isset($sCheckRead_suhu_))
       {
           unset($sCheckRead_suhu_);
       }
       if (isset($this->nmgp_cmp_readonly['suhu_']))
       {
           $sCheckRead_suhu_ = $this->nmgp_cmp_readonly['suhu_'];
       }
       if (isset($this->nmgp_cmp_hidden['suhu_']) && $this->nmgp_cmp_hidden['suhu_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['suhu_']);
           $sStyleHidden_suhu_ = 'display: none;';
       }
       $bTestReadOnly_suhu_ = true;
       $sStyleReadLab_suhu_ = 'display: none;';
       $sStyleReadInp_suhu_ = '';
       if (isset($this->nmgp_cmp_readonly['suhu_']) && $this->nmgp_cmp_readonly['suhu_'] == 'on')
       {
           $bTestReadOnly_suhu_ = false;
           unset($this->nmgp_cmp_readonly['suhu_']);
           $sStyleReadLab_suhu_ = '';
           $sStyleReadInp_suhu_ = 'display: none;';
       }
       $this->nafas_ = $this->form_vert_form_tbfisikrawatinap[$sc_seq_vert]['nafas_']; 
       $nafas_ = $this->nafas_; 
       $sStyleHidden_nafas_ = '';
       if (isset($sCheckRead_nafas_))
       {
           unset($sCheckRead_nafas_);
       }
       if (isset($this->nmgp_cmp_readonly['nafas_']))
       {
           $sCheckRead_nafas_ = $this->nmgp_cmp_readonly['nafas_'];
       }
       if (isset($this->nmgp_cmp_hidden['nafas_']) && $this->nmgp_cmp_hidden['nafas_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nafas_']);
           $sStyleHidden_nafas_ = 'display: none;';
       }
       $bTestReadOnly_nafas_ = true;
       $sStyleReadLab_nafas_ = 'display: none;';
       $sStyleReadInp_nafas_ = '';
       if (isset($this->nmgp_cmp_readonly['nafas_']) && $this->nmgp_cmp_readonly['nafas_'] == 'on')
       {
           $bTestReadOnly_nafas_ = false;
           unset($this->nmgp_cmp_readonly['nafas_']);
           $sStyleReadLab_nafas_ = '';
           $sStyleReadInp_nafas_ = 'display: none;';
       }
       $this->keluhan_ = $this->form_vert_form_tbfisikrawatinap[$sc_seq_vert]['keluhan_']; 
       $keluhan_ = $this->keluhan_; 
       $keluhan__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $keluhan_);
       $keluhan__val = $keluhan__tmp;
       $sStyleHidden_keluhan_ = '';
       if (isset($sCheckRead_keluhan_))
       {
           unset($sCheckRead_keluhan_);
       }
       if (isset($this->nmgp_cmp_readonly['keluhan_']))
       {
           $sCheckRead_keluhan_ = $this->nmgp_cmp_readonly['keluhan_'];
       }
       if (isset($this->nmgp_cmp_hidden['keluhan_']) && $this->nmgp_cmp_hidden['keluhan_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['keluhan_']);
           $sStyleHidden_keluhan_ = 'display: none;';
       }
       $bTestReadOnly_keluhan_ = true;
       $sStyleReadLab_keluhan_ = 'display: none;';
       $sStyleReadInp_keluhan_ = '';
       if (isset($this->nmgp_cmp_readonly['keluhan_']) && $this->nmgp_cmp_readonly['keluhan_'] == 'on')
       {
           $bTestReadOnly_keluhan_ = false;
           unset($this->nmgp_cmp_readonly['keluhan_']);
           $sStyleReadLab_keluhan_ = '';
           $sStyleReadInp_keluhan_ = 'display: none;';
       }
       $this->pemeriksa_ = $this->form_vert_form_tbfisikrawatinap[$sc_seq_vert]['pemeriksa_']; 
       $pemeriksa_ = $this->pemeriksa_; 
       $sStyleHidden_pemeriksa_ = '';
       if (isset($sCheckRead_pemeriksa_))
       {
           unset($sCheckRead_pemeriksa_);
       }
       if (isset($this->nmgp_cmp_readonly['pemeriksa_']))
       {
           $sCheckRead_pemeriksa_ = $this->nmgp_cmp_readonly['pemeriksa_'];
       }
       if (isset($this->nmgp_cmp_hidden['pemeriksa_']) && $this->nmgp_cmp_hidden['pemeriksa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pemeriksa_']);
           $sStyleHidden_pemeriksa_ = 'display: none;';
       }
       $bTestReadOnly_pemeriksa_ = true;
       $sStyleReadLab_pemeriksa_ = 'display: none;';
       $sStyleReadInp_pemeriksa_ = '';
       if (isset($this->nmgp_cmp_readonly['pemeriksa_']) && $this->nmgp_cmp_readonly['pemeriksa_'] == 'on')
       {
           $bTestReadOnly_pemeriksa_ = false;
           unset($this->nmgp_cmp_readonly['pemeriksa_']);
           $sStyleReadLab_pemeriksa_ = '';
           $sStyleReadInp_pemeriksa_ = 'display: none;';
       }
       $this->tglperiksa_ = $this->form_vert_form_tbfisikrawatinap[$sc_seq_vert]['tglperiksa_'] . ' ' . $this->form_vert_form_tbfisikrawatinap[$sc_seq_vert]['tglperiksa__hora']; 
       $tglperiksa_ = $this->tglperiksa_; 
       $sStyleHidden_tglperiksa_ = '';
       if (isset($sCheckRead_tglperiksa_))
       {
           unset($sCheckRead_tglperiksa_);
       }
       if (isset($this->nmgp_cmp_readonly['tglperiksa_']))
       {
           $sCheckRead_tglperiksa_ = $this->nmgp_cmp_readonly['tglperiksa_'];
       }
       if (isset($this->nmgp_cmp_hidden['tglperiksa_']) && $this->nmgp_cmp_hidden['tglperiksa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tglperiksa_']);
           $sStyleHidden_tglperiksa_ = 'display: none;';
       }
       $bTestReadOnly_tglperiksa_ = true;
       $sStyleReadLab_tglperiksa_ = 'display: none;';
       $sStyleReadInp_tglperiksa_ = '';
       if (isset($this->nmgp_cmp_readonly['tglperiksa_']) && $this->nmgp_cmp_readonly['tglperiksa_'] == 'on')
       {
           $bTestReadOnly_tglperiksa_ = false;
           unset($this->nmgp_cmp_readonly['tglperiksa_']);
           $sStyleReadLab_tglperiksa_ = '';
           $sStyleReadInp_tglperiksa_ = 'display: none;';
       }
       $this->trancode_ = $this->form_vert_form_tbfisikrawatinap[$sc_seq_vert]['trancode_']; 
       $trancode_ = $this->trancode_; 
       if (!isset($this->nmgp_cmp_hidden['trancode_']))
       {
           $this->nmgp_cmp_hidden['trancode_'] = 'off';
       }
       $sStyleHidden_trancode_ = '';
       if (isset($sCheckRead_trancode_))
       {
           unset($sCheckRead_trancode_);
       }
       if (isset($this->nmgp_cmp_readonly['trancode_']))
       {
           $sCheckRead_trancode_ = $this->nmgp_cmp_readonly['trancode_'];
       }
       if (isset($this->nmgp_cmp_hidden['trancode_']) && $this->nmgp_cmp_hidden['trancode_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['trancode_']);
           $sStyleHidden_trancode_ = 'display: none;';
       }
       $bTestReadOnly_trancode_ = true;
       $sStyleReadLab_trancode_ = 'display: none;';
       $sStyleReadInp_trancode_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["trancode_"]) &&  $this->nmgp_cmp_readonly["trancode_"] == "on"))
       {
           $bTestReadOnly_trancode_ = false;
           unset($this->nmgp_cmp_readonly['trancode_']);
           $sStyleReadLab_trancode_ = '';
           $sStyleReadInp_trancode_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['delete'] == "off") {
        $sDisplayDelete = 'display: none';
    }
    else {
        $sDisplayDelete = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayDelete. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['update'] == "off") {
        $sDisplayUpdate = 'display: none';
    }
    else {
        $sDisplayUpdate = '';
    }
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = $sDisplayUpdate;
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_tbfisikrawatinap_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_tbfisikrawatinap_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbfisikrawatinap_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_tbfisikrawatinap_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbfisikrawatinap_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_tbfisikrawatinap_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['tinggi_']) && $this->nmgp_cmp_hidden['tinggi_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tinggi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tinggi_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tinggi__line" id="hidden_field_data_tinggi_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tinggi_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tinggi__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tinggi_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tinggi_"]) &&  $this->nmgp_cmp_readonly["tinggi_"] == "on") { 

 ?>
<input type="hidden" name="tinggi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tinggi_) . "\">" . $tinggi_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tinggi_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tinggi_<?php echo $sc_seq_vert ?> css_tinggi__line" style="<?php echo $sStyleReadLab_tinggi_; ?>"><?php echo $this->tinggi_; ?></span><span id="id_read_off_tinggi_<?php echo $sc_seq_vert ?>" class="css_read_off_tinggi_" style="white-space: nowrap;<?php echo $sStyleReadInp_tinggi_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_tinggi__obj" style="" id="id_sc_field_tinggi_<?php echo $sc_seq_vert ?>" type=text name="tinggi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tinggi_) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tinggi_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tinggi_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tinggi_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'mis. 160', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_tinggi__label scFormDataHelpOddMult">&nbsp;cm
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tinggi_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tinggi_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['berat_']) && $this->nmgp_cmp_hidden['berat_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="berat_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($berat_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_berat__line" id="hidden_field_data_berat_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_berat_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_berat__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_berat_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["berat_"]) &&  $this->nmgp_cmp_readonly["berat_"] == "on") { 

 ?>
<input type="hidden" name="berat_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($berat_) . "\">" . $berat_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_berat_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-berat_<?php echo $sc_seq_vert ?> css_berat__line" style="<?php echo $sStyleReadLab_berat_; ?>"><?php echo $this->berat_; ?></span><span id="id_read_off_berat_<?php echo $sc_seq_vert ?>" class="css_read_off_berat_" style="white-space: nowrap;<?php echo $sStyleReadInp_berat_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_berat__obj" style="" id="id_sc_field_berat_<?php echo $sc_seq_vert ?>" type=text name="berat_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($berat_) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 3, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['berat_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['berat_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['berat_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['berat_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'mis. 60', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_berat__label scFormDataHelpOddMult">&nbsp;kg
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_berat_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_berat_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['detakjantung_']) && $this->nmgp_cmp_hidden['detakjantung_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detakjantung_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detakjantung_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_detakjantung__line" id="hidden_field_data_detakjantung_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_detakjantung_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_detakjantung__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_detakjantung_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["detakjantung_"]) &&  $this->nmgp_cmp_readonly["detakjantung_"] == "on") { 

 ?>
<input type="hidden" name="detakjantung_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detakjantung_) . "\">" . $detakjantung_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_detakjantung_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-detakjantung_<?php echo $sc_seq_vert ?> css_detakjantung__line" style="<?php echo $sStyleReadLab_detakjantung_; ?>"><?php echo $this->detakjantung_; ?></span><span id="id_read_off_detakjantung_<?php echo $sc_seq_vert ?>" class="css_read_off_detakjantung_" style="white-space: nowrap;<?php echo $sStyleReadInp_detakjantung_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_detakjantung__obj" style="" id="id_sc_field_detakjantung_<?php echo $sc_seq_vert ?>" type=text name="detakjantung_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($detakjantung_) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['detakjantung_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['detakjantung_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['detakjantung_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'mis. 100', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_detakjantung__label scFormDataHelpOddMult">&nbsp;bpm
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detakjantung_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detakjantung_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tekanandarah_']) && $this->nmgp_cmp_hidden['tekanandarah_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tekanandarah_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tekanandarah_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tekanandarah__line" id="hidden_field_data_tekanandarah_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tekanandarah_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tekanandarah__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tekanandarah_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tekanandarah_"]) &&  $this->nmgp_cmp_readonly["tekanandarah_"] == "on") { 

 ?>
<input type="hidden" name="tekanandarah_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tekanandarah_) . "\">" . $tekanandarah_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tekanandarah_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tekanandarah_<?php echo $sc_seq_vert ?> css_tekanandarah__line" style="<?php echo $sStyleReadLab_tekanandarah_; ?>"><?php echo $this->tekanandarah_; ?></span><span id="id_read_off_tekanandarah_<?php echo $sc_seq_vert ?>" class="css_read_off_tekanandarah_" style="white-space: nowrap;<?php echo $sStyleReadInp_tekanandarah_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_tekanandarah__obj" style="" id="id_sc_field_tekanandarah_<?php echo $sc_seq_vert ?>" type=text name="tekanandarah_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tekanandarah_) ?>"
 size=11 maxlength=17 alt="{datatype: 'mask', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '999/999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'mis. 100/080', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_tekanandarah__label scFormDataHelpOddMult">&nbsp;mmHg
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tekanandarah_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tekanandarah_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['suhu_']) && $this->nmgp_cmp_hidden['suhu_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="suhu_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($suhu_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_suhu__line" id="hidden_field_data_suhu_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_suhu_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_suhu__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_suhu_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["suhu_"]) &&  $this->nmgp_cmp_readonly["suhu_"] == "on") { 

 ?>
<input type="hidden" name="suhu_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($suhu_) . "\">" . $suhu_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_suhu_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-suhu_<?php echo $sc_seq_vert ?> css_suhu__line" style="<?php echo $sStyleReadLab_suhu_; ?>"><?php echo $this->suhu_; ?></span><span id="id_read_off_suhu_<?php echo $sc_seq_vert ?>" class="css_read_off_suhu_" style="white-space: nowrap;<?php echo $sStyleReadInp_suhu_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_suhu__obj" style="" id="id_sc_field_suhu_<?php echo $sc_seq_vert ?>" type=text name="suhu_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($suhu_) ?>"
 size=5 alt="{datatype: 'decimal', maxLength: 3, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['suhu_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['suhu_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['suhu_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['suhu_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'mis. 36', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_suhu__label scFormDataHelpOddMult">&nbsp;°
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_suhu_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_suhu_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nafas_']) && $this->nmgp_cmp_hidden['nafas_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nafas_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nafas_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_nafas__line" id="hidden_field_data_nafas_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nafas_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nafas__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_nafas_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nafas_"]) &&  $this->nmgp_cmp_readonly["nafas_"] == "on") { 

 ?>
<input type="hidden" name="nafas_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nafas_) . "\">" . $nafas_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_nafas_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-nafas_<?php echo $sc_seq_vert ?> css_nafas__line" style="<?php echo $sStyleReadLab_nafas_; ?>"><?php echo $this->nafas_; ?></span><span id="id_read_off_nafas_<?php echo $sc_seq_vert ?>" class="css_read_off_nafas_" style="white-space: nowrap;<?php echo $sStyleReadInp_nafas_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_nafas__obj" style="" id="id_sc_field_nafas_<?php echo $sc_seq_vert ?>" type=text name="nafas_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nafas_) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['nafas_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['nafas_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['nafas_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'mis. 20', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_nafas__label scFormDataHelpOddMult">&nbsp;pm
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nafas_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nafas_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['keluhan_']) && $this->nmgp_cmp_hidden['keluhan_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="keluhan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($keluhan_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_keluhan__line" id="hidden_field_data_keluhan_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_keluhan_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_keluhan__line" style="vertical-align: top;padding: 0px">
<?php
$keluhan__val = nl2br($keluhan_);

?>

<?php if ($bTestReadOnly_keluhan_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["keluhan_"]) &&  $this->nmgp_cmp_readonly["keluhan_"] == "on") { 

 ?>
<input type="hidden" name="keluhan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($keluhan_) . "\">" . $keluhan__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_keluhan_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-keluhan_<?php echo $sc_seq_vert ?> css_keluhan__line" style="<?php echo $sStyleReadLab_keluhan_; ?>"><?php echo $keluhan__val; ?></span><span id="id_read_off_keluhan_<?php echo $sc_seq_vert ?>" class="css_read_off_keluhan_" style="white-space: nowrap;<?php echo $sStyleReadInp_keluhan_; ?>">
 <textarea  class="sc-js-input scFormObjectOddMult css_keluhan__obj" style="white-space: pre-wrap;" name="keluhan_<?php echo $sc_seq_vert ?>" id="id_sc_field_keluhan_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 500, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Deskripsi Keluhan', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $keluhan_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_keluhan_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_keluhan_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pemeriksa_']) && $this->nmgp_cmp_hidden['pemeriksa_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pemeriksa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->pemeriksa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pemeriksa__line" id="hidden_field_data_pemeriksa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pemeriksa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pemeriksa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pemeriksa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pemeriksa_"]) &&  $this->nmgp_cmp_readonly["pemeriksa_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['Lookup_pemeriksa_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['Lookup_pemeriksa_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['Lookup_pemeriksa_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['Lookup_pemeriksa_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['Lookup_pemeriksa_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['Lookup_pemeriksa_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['Lookup_pemeriksa_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['Lookup_pemeriksa_'] = array(); 
    }

   $old_value_tinggi_ = $this->tinggi_;
   $old_value_berat_ = $this->berat_;
   $old_value_detakjantung_ = $this->detakjantung_;
   $old_value_tekanandarah_ = $this->tekanandarah_;
   $old_value_suhu_ = $this->suhu_;
   $old_value_nafas_ = $this->nafas_;
   $old_value_tglperiksa_ = $this->tglperiksa_;
   $old_value_tglperiksa__hora = $this->tglperiksa__hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tinggi_ = $this->tinggi_;
   $unformatted_value_berat_ = $this->berat_;
   $unformatted_value_detakjantung_ = $this->detakjantung_;
   $unformatted_value_tekanandarah_ = $this->tekanandarah_;
   $unformatted_value_suhu_ = $this->suhu_;
   $unformatted_value_nafas_ = $this->nafas_;
   $unformatted_value_tglperiksa_ = $this->tglperiksa_;
   $unformatted_value_tglperiksa__hora = $this->tglperiksa__hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT docCode, gelar + name + ',' + spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT docCode, concat(gelar, name,',', spec)  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT docCode, gelar&name&','&spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT docCode, gelar||name||','||spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT docCode, gelar + name + ',' + spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT docCode, gelar||name||','||spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   else
   {
       $nm_comando = "SELECT docCode, gelar||name||','||spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }

   $this->tinggi_ = $old_value_tinggi_;
   $this->berat_ = $old_value_berat_;
   $this->detakjantung_ = $old_value_detakjantung_;
   $this->tekanandarah_ = $old_value_tekanandarah_;
   $this->suhu_ = $old_value_suhu_;
   $this->nafas_ = $old_value_nafas_;
   $this->tglperiksa_ = $old_value_tglperiksa_;
   $this->tglperiksa__hora = $old_value_tglperiksa__hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['Lookup_pemeriksa_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $pemeriksa__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pemeriksa__1))
          {
              foreach ($this->pemeriksa__1 as $tmp_pemeriksa_)
              {
                  if (trim($tmp_pemeriksa_) === trim($cadaselect[1])) { $pemeriksa__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pemeriksa_) === trim($cadaselect[1])) { $pemeriksa__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="pemeriksa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pemeriksa_) . "\">" . $pemeriksa__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_pemeriksa_();
   $x = 0 ; 
   $pemeriksa__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pemeriksa__1))
          {
              foreach ($this->pemeriksa__1 as $tmp_pemeriksa_)
              {
                  if (trim($tmp_pemeriksa_) === trim($cadaselect[1])) { $pemeriksa__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pemeriksa_) === trim($cadaselect[1])) { $pemeriksa__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($pemeriksa__look))
          {
              $pemeriksa__look = $this->pemeriksa_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_pemeriksa_" . $sc_seq_vert . "\" class=\"css_pemeriksa__line\" style=\"" .  $sStyleReadLab_pemeriksa_ . "\">" . $this->form_encode_input($pemeriksa__look) . "</span><span id=\"id_read_off_pemeriksa_" . $sc_seq_vert . "\" class=\"css_read_off_pemeriksa_\" style=\"white-space: nowrap; " . $sStyleReadInp_pemeriksa_ . "\">";
   echo " <span id=\"idAjaxSelect_pemeriksa_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_pemeriksa__obj\" style=\"\" id=\"id_sc_field_pemeriksa_" . $sc_seq_vert . "\" name=\"pemeriksa_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['Lookup_pemeriksa_'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->pemeriksa_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->pemeriksa_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pemeriksa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pemeriksa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tglperiksa_']) && $this->nmgp_cmp_hidden['tglperiksa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tglperiksa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tglperiksa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tglperiksa__line" id="hidden_field_data_tglperiksa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tglperiksa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tglperiksa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tglperiksa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tglperiksa_"]) &&  $this->nmgp_cmp_readonly["tglperiksa_"] == "on") { 

 ?>
<input type="hidden" name="tglperiksa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tglperiksa_) . "\">" . $tglperiksa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tglperiksa_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tglperiksa_<?php echo $sc_seq_vert ?> css_tglperiksa__line" style="<?php echo $sStyleReadLab_tglperiksa_; ?>"><?php echo $tglperiksa_; ?></span><span id="id_read_off_tglperiksa_<?php echo $sc_seq_vert ?>" class="css_read_off_tglperiksa_" style="white-space: nowrap;<?php echo $sStyleReadInp_tglperiksa_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_tglperiksa__obj" style="" id="id_sc_field_tglperiksa_<?php echo $sc_seq_vert ?>" type=text name="tglperiksa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tglperiksa_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['tglperiksa_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['tglperiksa_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['tglperiksa_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['tglperiksa_']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tglperiksa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tglperiksa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->tglperiksa_ = $old_dt_tglperiksa_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['trancode_']) && $this->nmgp_cmp_hidden['trancode_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="trancode_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($trancode_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_trancode__line" id="hidden_field_data_trancode_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_trancode_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_trancode__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_trancode_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["trancode_"]) &&  $this->nmgp_cmp_readonly["trancode_"] == "on")) { 

 ?>
<input type="hidden" name="trancode_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($trancode_) . "\"><span id=\"id_ajax_label_trancode_" . $sc_seq_vert . "\">" . $trancode_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_trancode_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-trancode_<?php echo $sc_seq_vert ?> css_trancode__line" style="<?php echo $sStyleReadLab_trancode_; ?>"><?php echo $this->trancode_; ?></span><span id="id_read_off_trancode_<?php echo $sc_seq_vert ?>" class="css_read_off_trancode_" style="white-space: nowrap;<?php echo $sStyleReadInp_trancode_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_trancode__obj" style="" id="id_sc_field_trancode_<?php echo $sc_seq_vert ?>" type=text name="trancode_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($trancode_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trancode_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trancode_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_tinggi_))
       {
           $this->nmgp_cmp_readonly['tinggi_'] = $sCheckRead_tinggi_;
       }
       if ('display: none;' == $sStyleHidden_tinggi_)
       {
           $this->nmgp_cmp_hidden['tinggi_'] = 'off';
       }
       if (isset($sCheckRead_berat_))
       {
           $this->nmgp_cmp_readonly['berat_'] = $sCheckRead_berat_;
       }
       if ('display: none;' == $sStyleHidden_berat_)
       {
           $this->nmgp_cmp_hidden['berat_'] = 'off';
       }
       if (isset($sCheckRead_detakjantung_))
       {
           $this->nmgp_cmp_readonly['detakjantung_'] = $sCheckRead_detakjantung_;
       }
       if ('display: none;' == $sStyleHidden_detakjantung_)
       {
           $this->nmgp_cmp_hidden['detakjantung_'] = 'off';
       }
       if (isset($sCheckRead_tekanandarah_))
       {
           $this->nmgp_cmp_readonly['tekanandarah_'] = $sCheckRead_tekanandarah_;
       }
       if ('display: none;' == $sStyleHidden_tekanandarah_)
       {
           $this->nmgp_cmp_hidden['tekanandarah_'] = 'off';
       }
       if (isset($sCheckRead_suhu_))
       {
           $this->nmgp_cmp_readonly['suhu_'] = $sCheckRead_suhu_;
       }
       if ('display: none;' == $sStyleHidden_suhu_)
       {
           $this->nmgp_cmp_hidden['suhu_'] = 'off';
       }
       if (isset($sCheckRead_nafas_))
       {
           $this->nmgp_cmp_readonly['nafas_'] = $sCheckRead_nafas_;
       }
       if ('display: none;' == $sStyleHidden_nafas_)
       {
           $this->nmgp_cmp_hidden['nafas_'] = 'off';
       }
       if (isset($sCheckRead_keluhan_))
       {
           $this->nmgp_cmp_readonly['keluhan_'] = $sCheckRead_keluhan_;
       }
       if ('display: none;' == $sStyleHidden_keluhan_)
       {
           $this->nmgp_cmp_hidden['keluhan_'] = 'off';
       }
       if (isset($sCheckRead_pemeriksa_))
       {
           $this->nmgp_cmp_readonly['pemeriksa_'] = $sCheckRead_pemeriksa_;
       }
       if ('display: none;' == $sStyleHidden_pemeriksa_)
       {
           $this->nmgp_cmp_hidden['pemeriksa_'] = 'off';
       }
       if (isset($sCheckRead_tglperiksa_))
       {
           $this->nmgp_cmp_readonly['tglperiksa_'] = $sCheckRead_tglperiksa_;
       }
       if ('display: none;' == $sStyleHidden_tglperiksa_)
       {
           $this->nmgp_cmp_hidden['tglperiksa_'] = 'off';
       }
       if (isset($sCheckRead_trancode_))
       {
           $this->nmgp_cmp_readonly['trancode_'] = $sCheckRead_trancode_;
       }
       if ('display: none;' == $sStyleHidden_trancode_)
       {
           $this->nmgp_cmp_hidden['trancode_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_tbfisikrawatinap = $guarda_form_vert_form_tbfisikrawatinap;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div>
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
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
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

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
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tbfisikrawatinap");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbfisikrawatinap");
 parent.scAjaxDetailHeight("form_tbfisikrawatinap", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbfisikrawatinap", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbfisikrawatinap", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['sc_modal'])
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
			do_ajax_form_tbfisikrawatinap_add_new_line(); return false;
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('alterar');
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
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbfisikrawatinap']['buttonStatus'] = $this->nmgp_botoes;
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
<?php 
 } 
} 
?> 
