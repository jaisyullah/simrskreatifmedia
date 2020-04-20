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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Master Pasien"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Master Pasien"); } ?></TITLE>
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
.css_read_off_birthdate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_lastupdated button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_registerdate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_lasthta button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_partus button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_expdate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbcustomer/form_tbcustomer_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbcustomer_sajax_js.php");
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

 function nm_field_disabled(Fields, Opt) {
  opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
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
     if (F_name == "custcode")
     {
        $('input[name="custcode"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="custcode"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="custcode"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "hta")
     {
        $('input[name="hta"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="hta"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="hta"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_tbcustomer_jquery.php');

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

  $("#hidden_bloco_0,#hidden_bloco_1").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
  });

  sc_form_onload();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  $(".scUiLabelWidthFix").css("width", "120px");
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
    "hidden_bloco_0": true,
    "hidden_bloco_1": true
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_tbcustomer_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_tbcustomer'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbcustomer'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Master Pasien"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Master Pasien"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['fast_search'][2] : "";
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['sc_btn_0'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "sc_btn_0", "scBtnFn_sc_btn_0()", "scBtnFn_sc_btn_0()", "sc_sc_btn_0_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['sc_btn_1'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "sc_btn_1", "scBtnFn_sc_btn_1()", "scBtnFn_sc_btn_1()", "sc_sc_btn_1_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['sc_btn_2'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "sc_btn_2", "scBtnFn_sc_btn_2()", "scBtnFn_sc_btn_2()", "sc_sc_btn_2_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['sc_btn_3'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "sc_btn_3", "scBtnFn_sc_btn_3()", "scBtnFn_sc_btn_3()", "sc_sc_btn_3_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="65%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id']))
   {
       $this->nmgp_cmp_hidden['id'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['lastupdated']))
   {
       $this->nmgp_cmp_hidden['lastupdated'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['registerdate']))
   {
       $this->nmgp_cmp_hidden['registerdate'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Data Pasien<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['custcode']))
    {
        $this->nm_new_label['custcode'] = "No. RM";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $custcode = $this->custcode;
   $sStyleHidden_custcode = '';
   if (isset($this->nmgp_cmp_hidden['custcode']) && $this->nmgp_cmp_hidden['custcode'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['custcode']);
       $sStyleHidden_custcode = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_custcode = 'display: none;';
   $sStyleReadInp_custcode = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['custcode']) && $this->nmgp_cmp_readonly['custcode'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['custcode']);
       $sStyleReadLab_custcode = '';
       $sStyleReadInp_custcode = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['custcode']) && $this->nmgp_cmp_hidden['custcode'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="custcode" value="<?php echo $this->form_encode_input($custcode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_custcode_label" id="hidden_field_label_custcode" style="<?php echo $sStyleHidden_custcode; ?>"><span id="id_label_custcode"><?php echo $this->nm_new_label['custcode']; ?></span></TD>
    <TD class="scFormDataOdd css_custcode_line" id="hidden_field_data_custcode" style="<?php echo $sStyleHidden_custcode; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_custcode_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["custcode"]) &&  $this->nmgp_cmp_readonly["custcode"] == "on") { 

 ?>
<input type="hidden" name="custcode" value="<?php echo $this->form_encode_input($custcode) . "\">" . $custcode . ""; ?>
<?php } else { ?>
<span id="id_read_on_custcode" class="sc-ui-readonly-custcode css_custcode_line" style="<?php echo $sStyleReadLab_custcode; ?>"><?php echo $this->custcode; ?></span><span id="id_read_off_custcode" class="css_read_off_custcode" style="white-space: nowrap;<?php echo $sStyleReadInp_custcode; ?>">
 <input class="sc-js-input scFormObjectOdd css_custcode_obj" style="" id="id_sc_field_custcode" type=text name="custcode" value="<?php echo $this->form_encode_input($custcode) ?>"
 size=10 maxlength=8 alt="{datatype: 'text', maxLength: 8, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_custcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_custcode_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['name']))
    {
        $this->nm_new_label['name'] = "Nama";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $name = $this->name;
   $sStyleHidden_name = '';
   if (isset($this->nmgp_cmp_hidden['name']) && $this->nmgp_cmp_hidden['name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['name']);
       $sStyleHidden_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_name = 'display: none;';
   $sStyleReadInp_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['name']) && $this->nmgp_cmp_readonly['name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['name']);
       $sStyleReadLab_name = '';
       $sStyleReadInp_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['name']) && $this->nmgp_cmp_hidden['name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="name" value="<?php echo $this->form_encode_input($name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_name_label" id="hidden_field_label_name" style="<?php echo $sStyleHidden_name; ?>"><span id="id_label_name"><?php echo $this->nm_new_label['name']; ?></span></TD>
    <TD class="scFormDataOdd css_name_line" id="hidden_field_data_name" style="<?php echo $sStyleHidden_name; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["name"]) &&  $this->nmgp_cmp_readonly["name"] == "on") { 

 ?>
<input type="hidden" name="name" value="<?php echo $this->form_encode_input($name) . "\">" . $name . ""; ?>
<?php } else { ?>
<span id="id_read_on_name" class="sc-ui-readonly-name css_name_line" style="<?php echo $sStyleReadLab_name; ?>"><?php echo $this->name; ?></span><span id="id_read_off_name" class="css_read_off_name" style="white-space: nowrap;<?php echo $sStyleReadInp_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_name_obj" style="" id="id_sc_field_name" type=text name="name" value="<?php echo $this->form_encode_input($name) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_name_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['salut']))
   {
       $this->nm_new_label['salut'] = "Panggilan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $salut = $this->salut;
   $sStyleHidden_salut = '';
   if (isset($this->nmgp_cmp_hidden['salut']) && $this->nmgp_cmp_hidden['salut'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['salut']);
       $sStyleHidden_salut = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_salut = 'display: none;';
   $sStyleReadInp_salut = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['salut']) && $this->nmgp_cmp_readonly['salut'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['salut']);
       $sStyleReadLab_salut = '';
       $sStyleReadInp_salut = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['salut']) && $this->nmgp_cmp_hidden['salut'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="salut" value="<?php echo $this->form_encode_input($this->salut) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_salut_label" id="hidden_field_label_salut" style="<?php echo $sStyleHidden_salut; ?>"><span id="id_label_salut"><?php echo $this->nm_new_label['salut']; ?></span></TD>
    <TD class="scFormDataOdd css_salut_line" id="hidden_field_data_salut" style="<?php echo $sStyleHidden_salut; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_salut_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["salut"]) &&  $this->nmgp_cmp_readonly["salut"] == "on") { 

$salut_look = "";
 if ($this->salut == "AN.") { $salut_look .= "AN." ;} 
 if ($this->salut == "NN.") { $salut_look .= "NN." ;} 
 if ($this->salut == "NY.") { $salut_look .= "NY." ;} 
 if ($this->salut == "SDR.") { $salut_look .= "SDR." ;} 
 if ($this->salut == "TN.") { $salut_look .= "TN." ;} 
 if (empty($salut_look)) { $salut_look = $this->salut; }
?>
<input type="hidden" name="salut" value="<?php echo $this->form_encode_input($salut) . "\">" . $salut_look . ""; ?>
<?php } else { ?>
<?php

$salut_look = "";
 if ($this->salut == "AN.") { $salut_look .= "AN." ;} 
 if ($this->salut == "NN.") { $salut_look .= "NN." ;} 
 if ($this->salut == "NY.") { $salut_look .= "NY." ;} 
 if ($this->salut == "SDR.") { $salut_look .= "SDR." ;} 
 if ($this->salut == "TN.") { $salut_look .= "TN." ;} 
 if (empty($salut_look)) { $salut_look = $this->salut; }
?>
<span id="id_read_on_salut" class="css_salut_line"  style="<?php echo $sStyleReadLab_salut; ?>"><?php echo $this->form_encode_input($salut_look); ?></span><span id="id_read_off_salut" class="css_read_off_salut" style="white-space: nowrap; <?php echo $sStyleReadInp_salut; ?>">
 <span id="idAjaxSelect_salut"><select class="sc-js-input scFormObjectOdd css_salut_obj" style="" id="id_sc_field_salut" name="salut" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_salut'][] = ''; ?>
 <option value=""></option>
 <option  value="AN." <?php  if ($this->salut == "AN.") { echo " selected" ;} ?>>AN.</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_salut'][] = 'AN.'; ?>
 <option  value="NN." <?php  if ($this->salut == "NN.") { echo " selected" ;} ?>>NN.</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_salut'][] = 'NN.'; ?>
 <option  value="NY." <?php  if ($this->salut == "NY.") { echo " selected" ;} ?>>NY.</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_salut'][] = 'NY.'; ?>
 <option  value="SDR." <?php  if ($this->salut == "SDR.") { echo " selected" ;} ?>>SDR.</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_salut'][] = 'SDR.'; ?>
 <option  value="TN." <?php  if ($this->salut == "TN.") { echo " selected" ;} ?>>TN.</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_salut'][] = 'TN.'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_salut_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_salut_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['birthplace']))
    {
        $this->nm_new_label['birthplace'] = "Tempat Lahir";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $birthplace = $this->birthplace;
   $sStyleHidden_birthplace = '';
   if (isset($this->nmgp_cmp_hidden['birthplace']) && $this->nmgp_cmp_hidden['birthplace'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['birthplace']);
       $sStyleHidden_birthplace = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_birthplace = 'display: none;';
   $sStyleReadInp_birthplace = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['birthplace']) && $this->nmgp_cmp_readonly['birthplace'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['birthplace']);
       $sStyleReadLab_birthplace = '';
       $sStyleReadInp_birthplace = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['birthplace']) && $this->nmgp_cmp_hidden['birthplace'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="birthplace" value="<?php echo $this->form_encode_input($birthplace) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_birthplace_label" id="hidden_field_label_birthplace" style="<?php echo $sStyleHidden_birthplace; ?>"><span id="id_label_birthplace"><?php echo $this->nm_new_label['birthplace']; ?></span></TD>
    <TD class="scFormDataOdd css_birthplace_line" id="hidden_field_data_birthplace" style="<?php echo $sStyleHidden_birthplace; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_birthplace_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["birthplace"]) &&  $this->nmgp_cmp_readonly["birthplace"] == "on") { 

 ?>
<input type="hidden" name="birthplace" value="<?php echo $this->form_encode_input($birthplace) . "\">" . $birthplace . ""; ?>
<?php } else { ?>
<span id="id_read_on_birthplace" class="sc-ui-readonly-birthplace css_birthplace_line" style="<?php echo $sStyleReadLab_birthplace; ?>"><?php echo $this->birthplace; ?></span><span id="id_read_off_birthplace" class="css_read_off_birthplace" style="white-space: nowrap;<?php echo $sStyleReadInp_birthplace; ?>">
 <input class="sc-js-input scFormObjectOdd css_birthplace_obj" style="" id="id_sc_field_birthplace" type=text name="birthplace" value="<?php echo $this->form_encode_input($birthplace) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_birthplace_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_birthplace_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['birthdate']))
    {
        $this->nm_new_label['birthdate'] = "Tanggal Lahir";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $birthdate = $this->birthdate;
   $sStyleHidden_birthdate = '';
   if (isset($this->nmgp_cmp_hidden['birthdate']) && $this->nmgp_cmp_hidden['birthdate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['birthdate']);
       $sStyleHidden_birthdate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_birthdate = 'display: none;';
   $sStyleReadInp_birthdate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['birthdate']) && $this->nmgp_cmp_readonly['birthdate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['birthdate']);
       $sStyleReadLab_birthdate = '';
       $sStyleReadInp_birthdate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['birthdate']) && $this->nmgp_cmp_hidden['birthdate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="birthdate" value="<?php echo $this->form_encode_input($birthdate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_birthdate_label" id="hidden_field_label_birthdate" style="<?php echo $sStyleHidden_birthdate; ?>"><span id="id_label_birthdate"><?php echo $this->nm_new_label['birthdate']; ?></span></TD>
    <TD class="scFormDataOdd css_birthdate_line" id="hidden_field_data_birthdate" style="<?php echo $sStyleHidden_birthdate; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_birthdate_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["birthdate"]) &&  $this->nmgp_cmp_readonly["birthdate"] == "on") { 

 ?>
<input type="hidden" name="birthdate" value="<?php echo $this->form_encode_input($birthdate) . "\">" . $birthdate . ""; ?>
<?php } else { ?>
<?php
    $old_birthdate = $this->birthdate;
    nmgp_Form_Datas($this->birthdate, $this->field_config['birthdate']['date_format'], $this->field_config['birthdate']['date_sep']);
?>
<span id="id_read_on_birthdate" class="css_birthdate_line" style="<?php echo $sStyleReadLab_birthdate; ?>"><?php echo $this->form_encode_input($this->birthdate); ?></span><span id="id_read_off_birthdate" class="css_read_off_birthdate" style="<?php echo $sStyleReadInp_birthdate; ?>"><?php
    $this->birthdate = $old_birthdate;
?>
<?php
    $s_date_info_pos  = strtolower(str_replace('aaaa', 'yyyy', $this->field_config['birthdate']['date_format']));
    $i_date_pos_day   = strpos($s_date_info_pos, 'dd');
    $i_date_pos_month = strpos($s_date_info_pos, 'mm');
    $i_date_pos_year  = strpos($s_date_info_pos, 'yyyy');
    $i_arr_date_pos   = array($i_date_pos_day => 'd', $i_date_pos_month => 'm', $i_date_pos_year => 'y');
    ksort($i_arr_date_pos);
    $old_birthdate = $this->birthdate;
    nmgp_Form_Datas($this->birthdate, $this->field_config['birthdate']['date_format'], $this->field_config['birthdate']['date_sep']);
?>
<?php
    foreach ($i_arr_date_pos as $IX => $Part_date)
    {
        if ($Part_date == "d")
        {
?>
<select class="sc-js-input scFormObjectOdd css_birthdate_obj" style="" name="birthdate_dia" id="id_sc_field_birthdate_dia">
  <option value=""></option>
  <option value="01"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "01") { echo " selected" ;} ?>>01</option>
  <option value="02"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "02") { echo " selected" ;} ?>>02</option>
  <option value="03"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "03") { echo " selected" ;} ?>>03</option>
  <option value="04"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "04") { echo " selected" ;} ?>>04</option>
  <option value="05"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "05") { echo " selected" ;} ?>>05</option>
  <option value="06"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "06") { echo " selected" ;} ?>>06</option>
  <option value="07"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "07") { echo " selected" ;} ?>>07</option>
  <option value="08"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "08") { echo " selected" ;} ?>>08</option>
  <option value="09"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "09") { echo " selected" ;} ?>>09</option>
  <option value="10"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "10") { echo " selected" ;} ?>>10</option>
  <option value="11"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "11") { echo " selected" ;} ?>>11</option>
  <option value="12"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "12") { echo " selected" ;} ?>>12</option>
  <option value="13"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "13") { echo " selected" ;} ?>>13</option>
  <option value="14"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "14") { echo " selected" ;} ?>>14</option>
  <option value="15"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "15") { echo " selected" ;} ?>>15</option>
  <option value="16"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "16") { echo " selected" ;} ?>>16</option>
  <option value="17"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "17") { echo " selected" ;} ?>>17</option>
  <option value="18"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "18") { echo " selected" ;} ?>>18</option>
  <option value="19"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "19") { echo " selected" ;} ?>>19</option>
  <option value="20"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "20") { echo " selected" ;} ?>>20</option>
  <option value="21"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "21") { echo " selected" ;} ?>>21</option>
  <option value="22"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "22") { echo " selected" ;} ?>>22</option>
  <option value="23"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "23") { echo " selected" ;} ?>>23</option>
  <option value="24"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "24") { echo " selected" ;} ?>>24</option>
  <option value="25"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "25") { echo " selected" ;} ?>>25</option>
  <option value="26"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "26") { echo " selected" ;} ?>>26</option>
  <option value="27"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "27") { echo " selected" ;} ?>>27</option>
  <option value="28"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "28") { echo " selected" ;} ?>>28</option>
  <option value="29"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "29") { echo " selected" ;} ?>>29</option>
  <option value="30"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "30") { echo " selected" ;} ?>>30</option>
  <option value="31"<?php  if (substr($this->birthdate, $i_date_pos_day, 2) == "31") { echo " selected" ;} ?>>31</option>
</select>
<?php
        }
        if ($Part_date == "m")
        {
?>
<select class="sc-js-input scFormObjectOdd css_birthdate_obj" style="" name="birthdate_mes" id="id_sc_field_birthdate_mes">
  <option value=""></option>
  <option value="01"<?php  if (substr($this->birthdate, $i_date_pos_month, 2) == "01") { echo " selected" ;} ?>>01</option>
  <option value="02"<?php  if (substr($this->birthdate, $i_date_pos_month, 2) == "02") { echo " selected" ;} ?>>02</option>
  <option value="03"<?php  if (substr($this->birthdate, $i_date_pos_month, 2) == "03") { echo " selected" ;} ?>>03</option>
  <option value="04"<?php  if (substr($this->birthdate, $i_date_pos_month, 2) == "04") { echo " selected" ;} ?>>04</option>
  <option value="05"<?php  if (substr($this->birthdate, $i_date_pos_month, 2) == "05") { echo " selected" ;} ?>>05</option>
  <option value="06"<?php  if (substr($this->birthdate, $i_date_pos_month, 2) == "06") { echo " selected" ;} ?>>06</option>
  <option value="07"<?php  if (substr($this->birthdate, $i_date_pos_month, 2) == "07") { echo " selected" ;} ?>>07</option>
  <option value="08"<?php  if (substr($this->birthdate, $i_date_pos_month, 2) == "08") { echo " selected" ;} ?>>08</option>
  <option value="09"<?php  if (substr($this->birthdate, $i_date_pos_month, 2) == "09") { echo " selected" ;} ?>>09</option>
  <option value="10"<?php  if (substr($this->birthdate, $i_date_pos_month, 2) == "10") { echo " selected" ;} ?>>10</option>
  <option value="11"<?php  if (substr($this->birthdate, $i_date_pos_month, 2) == "11") { echo " selected" ;} ?>>11</option>
  <option value="12"<?php  if (substr($this->birthdate, $i_date_pos_month, 2) == "12") { echo " selected" ;} ?>>12</option>
</select>
<?php
        }
        if ($Part_date == "y")
        {
?>
<select class="sc-js-input scFormObjectOdd css_birthdate_obj" style="" name="birthdate_ano" id="id_sc_field_birthdate_ano">
  <option value=""></option>
<?php
  $Combo_ano_ini = 1900;
  $Combo_ano_end = date('Y') + 10;
  for ($I_ano = $Combo_ano_ini; $I_ano <= $Combo_ano_end; $I_ano++)
  {
?>
  <option value="<?php echo $I_ano; ?>"<?php  if (substr($this->birthdate, $i_date_pos_year, 4) == $I_ano) { echo " selected" ;} ?>><?php echo $I_ano; ?></option>
<?php
  }
?>
</select>
<?php
        }
    }
?>
<input type="hidden" id="id_sc_dummy_birthdate" /><?php
     $this->birthdate = $old_birthdate;
?>
<?php  } ?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_birthdate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_birthdate_text"></span></td></tr></table></td></tr></table></TD>
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
       $this->nm_new_label['sex'] = "Jenis Kelamin";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['sex']) && $this->nmgp_cmp_hidden['sex'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sex" value="<?php echo $this->form_encode_input($this->sex) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sex_label" id="hidden_field_label_sex" style="<?php echo $sStyleHidden_sex; ?>"><span id="id_label_sex"><?php echo $this->nm_new_label['sex']; ?></span></TD>
    <TD class="scFormDataOdd css_sex_line" id="hidden_field_data_sex" style="<?php echo $sStyleHidden_sex; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sex_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sex"]) &&  $this->nmgp_cmp_readonly["sex"] == "on") { 

$sex_look = "";
 if ($this->sex == "L") { $sex_look .= "Laki-laki" ;} 
 if ($this->sex == "P") { $sex_look .= "Perempuan" ;} 
 if (empty($sex_look)) { $sex_look = $this->sex; }
?>
<input type="hidden" name="sex" value="<?php echo $this->form_encode_input($sex) . "\">" . $sex_look . ""; ?>
<?php } else { ?>
<?php

$sex_look = "";
 if ($this->sex == "L") { $sex_look .= "Laki-laki" ;} 
 if ($this->sex == "P") { $sex_look .= "Perempuan" ;} 
 if (empty($sex_look)) { $sex_look = $this->sex; }
?>
<span id="id_read_on_sex" class="css_sex_line"  style="<?php echo $sStyleReadLab_sex; ?>"><?php echo $this->form_encode_input($sex_look); ?></span><span id="id_read_off_sex" class="css_read_off_sex" style="white-space: nowrap; <?php echo $sStyleReadInp_sex; ?>">
 <span id="idAjaxSelect_sex"><select class="sc-js-input scFormObjectOdd css_sex_obj" style="" id="id_sc_field_sex" name="sex" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="L" <?php  if ($this->sex == "L") { echo " selected" ;} ?><?php  if (empty($this->sex)) { echo " selected" ;} ?>>Laki-laki</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_sex'][] = 'L'; ?>
 <option  value="P" <?php  if ($this->sex == "P") { echo " selected" ;} ?>>Perempuan</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_sex'][] = 'P'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sex_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sex_text"></span></td></tr></table></td></tr></table></TD>
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
        $this->nm_new_label['address'] = "Alamat";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_address_label" id="hidden_field_label_address" style="<?php echo $sStyleHidden_address; ?>"><span id="id_label_address"><?php echo $this->nm_new_label['address']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['address']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['address'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
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
 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
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
    if (!isset($this->nm_new_label['rt']))
    {
        $this->nm_new_label['rt'] = "RT";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rt = $this->rt;
   $sStyleHidden_rt = '';
   if (isset($this->nmgp_cmp_hidden['rt']) && $this->nmgp_cmp_hidden['rt'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rt']);
       $sStyleHidden_rt = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rt = 'display: none;';
   $sStyleReadInp_rt = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rt']) && $this->nmgp_cmp_readonly['rt'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rt']);
       $sStyleReadLab_rt = '';
       $sStyleReadInp_rt = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rt']) && $this->nmgp_cmp_hidden['rt'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rt" value="<?php echo $this->form_encode_input($rt) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rt_label" id="hidden_field_label_rt" style="<?php echo $sStyleHidden_rt; ?>"><span id="id_label_rt"><?php echo $this->nm_new_label['rt']; ?></span></TD>
    <TD class="scFormDataOdd css_rt_line" id="hidden_field_data_rt" style="<?php echo $sStyleHidden_rt; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rt_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rt"]) &&  $this->nmgp_cmp_readonly["rt"] == "on") { 

 ?>
<input type="hidden" name="rt" value="<?php echo $this->form_encode_input($rt) . "\">" . $rt . ""; ?>
<?php } else { ?>
<span id="id_read_on_rt" class="sc-ui-readonly-rt css_rt_line" style="<?php echo $sStyleReadLab_rt; ?>"><?php echo $this->rt; ?></span><span id="id_read_off_rt" class="css_read_off_rt" style="white-space: nowrap;<?php echo $sStyleReadInp_rt; ?>">
 <input class="sc-js-input scFormObjectOdd css_rt_obj" style="" id="id_sc_field_rt" type=text name="rt" value="<?php echo $this->form_encode_input($rt) ?>"
 size=3 maxlength=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rt_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rt_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rw']))
    {
        $this->nm_new_label['rw'] = "RW";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rw = $this->rw;
   $sStyleHidden_rw = '';
   if (isset($this->nmgp_cmp_hidden['rw']) && $this->nmgp_cmp_hidden['rw'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rw']);
       $sStyleHidden_rw = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rw = 'display: none;';
   $sStyleReadInp_rw = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rw']) && $this->nmgp_cmp_readonly['rw'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rw']);
       $sStyleReadLab_rw = '';
       $sStyleReadInp_rw = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rw']) && $this->nmgp_cmp_hidden['rw'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rw" value="<?php echo $this->form_encode_input($rw) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rw_label" id="hidden_field_label_rw" style="<?php echo $sStyleHidden_rw; ?>"><span id="id_label_rw"><?php echo $this->nm_new_label['rw']; ?></span></TD>
    <TD class="scFormDataOdd css_rw_line" id="hidden_field_data_rw" style="<?php echo $sStyleHidden_rw; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rw_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rw"]) &&  $this->nmgp_cmp_readonly["rw"] == "on") { 

 ?>
<input type="hidden" name="rw" value="<?php echo $this->form_encode_input($rw) . "\">" . $rw . ""; ?>
<?php } else { ?>
<span id="id_read_on_rw" class="sc-ui-readonly-rw css_rw_line" style="<?php echo $sStyleReadLab_rw; ?>"><?php echo $this->rw; ?></span><span id="id_read_off_rw" class="css_read_off_rw" style="white-space: nowrap;<?php echo $sStyleReadInp_rw; ?>">
 <input class="sc-js-input scFormObjectOdd css_rw_obj" style="" id="id_sc_field_rw" type=text name="rw" value="<?php echo $this->form_encode_input($rw) ?>"
 size=3 maxlength=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rw_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rw_text"></span></td></tr></table></td></tr></table></TD>
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
       $this->nm_new_label['city'] = "Kota";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['city']) && $this->nmgp_cmp_hidden['city'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="city" value="<?php echo $this->form_encode_input($this->city) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_city_label" id="hidden_field_label_city" style="<?php echo $sStyleHidden_city; ?>"><span id="id_label_city"><?php echo $this->nm_new_label['city']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['city']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['city'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_city_line" id="hidden_field_data_city" style="<?php echo $sStyleHidden_city; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_city_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["city"]) &&  $this->nmgp_cmp_readonly["city"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'] = array(); 
    }

   $old_value_birthdate = $this->birthdate;
   $old_value_lastupdated = $this->lastupdated;
   $old_value_registerdate = $this->registerdate;
   $old_value_hta = $this->hta;
   $old_value_hta_hora = $this->hta_hora;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_lastupdated = $this->lastupdated;
   $unformatted_value_registerdate = $this->registerdate;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_hta_hora = $this->hta_hora;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT name, name FROM kota ORDER BY id";

   $this->birthdate = $old_value_birthdate;
   $this->lastupdated = $old_value_lastupdated;
   $this->registerdate = $old_value_registerdate;
   $this->hta = $old_value_hta;
   $this->hta_hora = $old_value_hta_hora;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'][] = $rs->fields[0];
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
   $city_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->city_1))
          {
              foreach ($this->city_1 as $tmp_city)
              {
                  if (trim($tmp_city) === trim($cadaselect[1])) { $city_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->city) === trim($cadaselect[1])) { $city_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="city" value="<?php echo $this->form_encode_input($city) . "\">" . $city_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_city();
   $x = 0 ; 
   $city_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->city_1))
          {
              foreach ($this->city_1 as $tmp_city)
              {
                  if (trim($tmp_city) === trim($cadaselect[1])) { $city_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->city) === trim($cadaselect[1])) { $city_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($city_look))
          {
              $city_look = $this->city;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_city\" class=\"css_city_line\" style=\"" .  $sStyleReadLab_city . "\">" . $this->form_encode_input($city_look) . "</span><span id=\"id_read_off_city\" class=\"css_read_off_city\" style=\"white-space: nowrap; " . $sStyleReadInp_city . "\">";
   echo " <span id=\"idAjaxSelect_city\"><select class=\"sc-js-input scFormObjectOdd css_city_obj\" style=\"\" id=\"id_sc_field_city\" name=\"city\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->city) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->city)) 
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
<span class="css_city_label scFormDataHelpOdd">&nbsp;Ketikkan Nama Kota
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_city_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_city_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['kecamatan']))
   {
       $this->nm_new_label['kecamatan'] = "Kecamatan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kecamatan = $this->kecamatan;
   $sStyleHidden_kecamatan = '';
   if (isset($this->nmgp_cmp_hidden['kecamatan']) && $this->nmgp_cmp_hidden['kecamatan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kecamatan']);
       $sStyleHidden_kecamatan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kecamatan = 'display: none;';
   $sStyleReadInp_kecamatan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kecamatan']) && $this->nmgp_cmp_readonly['kecamatan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kecamatan']);
       $sStyleReadLab_kecamatan = '';
       $sStyleReadInp_kecamatan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kecamatan']) && $this->nmgp_cmp_hidden['kecamatan'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="kecamatan" value="<?php echo $this->form_encode_input($this->kecamatan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kecamatan_label" id="hidden_field_label_kecamatan" style="<?php echo $sStyleHidden_kecamatan; ?>"><span id="id_label_kecamatan"><?php echo $this->nm_new_label['kecamatan']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['kecamatan']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['kecamatan'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_kecamatan_line" id="hidden_field_data_kecamatan" style="<?php echo $sStyleHidden_kecamatan; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kecamatan_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kecamatan"]) &&  $this->nmgp_cmp_readonly["kecamatan"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'] = array(); 
    }

   $old_value_birthdate = $this->birthdate;
   $old_value_lastupdated = $this->lastupdated;
   $old_value_registerdate = $this->registerdate;
   $old_value_hta = $this->hta;
   $old_value_hta_hora = $this->hta_hora;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_lastupdated = $this->lastupdated;
   $unformatted_value_registerdate = $this->registerdate;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_hta_hora = $this->hta_hora;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT    b.name, b.name FROM    kota a INNER JOIN kecamatan b ON b.regency_id = a.id where a.name = '$this->city'";

   $this->birthdate = $old_value_birthdate;
   $this->lastupdated = $old_value_lastupdated;
   $this->registerdate = $old_value_registerdate;
   $this->hta = $old_value_hta;
   $this->hta_hora = $old_value_hta_hora;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'][] = $rs->fields[0];
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
   $kecamatan_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->kecamatan_1))
          {
              foreach ($this->kecamatan_1 as $tmp_kecamatan)
              {
                  if (trim($tmp_kecamatan) === trim($cadaselect[1])) { $kecamatan_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->kecamatan) === trim($cadaselect[1])) { $kecamatan_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="kecamatan" value="<?php echo $this->form_encode_input($kecamatan) . "\">" . $kecamatan_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_kecamatan();
   $x = 0 ; 
   $kecamatan_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->kecamatan_1))
          {
              foreach ($this->kecamatan_1 as $tmp_kecamatan)
              {
                  if (trim($tmp_kecamatan) === trim($cadaselect[1])) { $kecamatan_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->kecamatan) === trim($cadaselect[1])) { $kecamatan_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($kecamatan_look))
          {
              $kecamatan_look = $this->kecamatan;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_kecamatan\" class=\"css_kecamatan_line\" style=\"" .  $sStyleReadLab_kecamatan . "\">" . $this->form_encode_input($kecamatan_look) . "</span><span id=\"id_read_off_kecamatan\" class=\"css_read_off_kecamatan\" style=\"white-space: nowrap; " . $sStyleReadInp_kecamatan . "\">";
   echo " <span id=\"idAjaxSelect_kecamatan\"><select class=\"sc-js-input scFormObjectOdd css_kecamatan_obj\" style=\"\" id=\"id_sc_field_kecamatan\" name=\"kecamatan\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->kecamatan) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->kecamatan)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kecamatan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kecamatan_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['kelurahan']))
   {
       $this->nm_new_label['kelurahan'] = "Kelurahan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kelurahan = $this->kelurahan;
   $sStyleHidden_kelurahan = '';
   if (isset($this->nmgp_cmp_hidden['kelurahan']) && $this->nmgp_cmp_hidden['kelurahan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kelurahan']);
       $sStyleHidden_kelurahan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kelurahan = 'display: none;';
   $sStyleReadInp_kelurahan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kelurahan']) && $this->nmgp_cmp_readonly['kelurahan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kelurahan']);
       $sStyleReadLab_kelurahan = '';
       $sStyleReadInp_kelurahan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kelurahan']) && $this->nmgp_cmp_hidden['kelurahan'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="kelurahan" value="<?php echo $this->form_encode_input($this->kelurahan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kelurahan_label" id="hidden_field_label_kelurahan" style="<?php echo $sStyleHidden_kelurahan; ?>"><span id="id_label_kelurahan"><?php echo $this->nm_new_label['kelurahan']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['kelurahan']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['kelurahan'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_kelurahan_line" id="hidden_field_data_kelurahan" style="<?php echo $sStyleHidden_kelurahan; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kelurahan_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kelurahan"]) &&  $this->nmgp_cmp_readonly["kelurahan"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'] = array(); 
    }

   $old_value_birthdate = $this->birthdate;
   $old_value_lastupdated = $this->lastupdated;
   $old_value_registerdate = $this->registerdate;
   $old_value_hta = $this->hta;
   $old_value_hta_hora = $this->hta_hora;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_lastupdated = $this->lastupdated;
   $unformatted_value_registerdate = $this->registerdate;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_hta_hora = $this->hta_hora;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT    b.name FROM    kecamatan a INNER JOIN kelurahan b ON b.district_id = a.id where a.name = '$this->kecamatan' order by b.id";

   $this->birthdate = $old_value_birthdate;
   $this->lastupdated = $old_value_lastupdated;
   $this->registerdate = $old_value_registerdate;
   $this->hta = $old_value_hta;
   $this->hta_hora = $old_value_hta_hora;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
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
   $kelurahan_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->kelurahan_1))
          {
              foreach ($this->kelurahan_1 as $tmp_kelurahan)
              {
                  if (trim($tmp_kelurahan) === trim($cadaselect[1])) { $kelurahan_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->kelurahan) === trim($cadaselect[1])) { $kelurahan_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="kelurahan" value="<?php echo $this->form_encode_input($kelurahan) . "\">" . $kelurahan_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_kelurahan();
   $x = 0 ; 
   $kelurahan_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->kelurahan_1))
          {
              foreach ($this->kelurahan_1 as $tmp_kelurahan)
              {
                  if (trim($tmp_kelurahan) === trim($cadaselect[1])) { $kelurahan_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->kelurahan) === trim($cadaselect[1])) { $kelurahan_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($kelurahan_look))
          {
              $kelurahan_look = $this->kelurahan;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_kelurahan\" class=\"css_kelurahan_line\" style=\"" .  $sStyleReadLab_kelurahan . "\">" . $this->form_encode_input($kelurahan_look) . "</span><span id=\"id_read_off_kelurahan\" class=\"css_read_off_kelurahan\" style=\"white-space: nowrap; " . $sStyleReadInp_kelurahan . "\">";
   echo " <span id=\"idAjaxSelect_kelurahan\"><select class=\"sc-js-input scFormObjectOdd css_kelurahan_obj\" style=\"\" id=\"id_sc_field_kelurahan\" name=\"kelurahan\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->kelurahan) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->kelurahan)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kelurahan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kelurahan_text"></span></td></tr></table></td></tr></table></TD>
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
        $this->nm_new_label['hp'] = "Handphone";
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
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hp_text"></span></td></tr></table></td></tr></table></TD>
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
       $this->nm_new_label['blood'] = "Gol. Darah";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['blood']) && $this->nmgp_cmp_hidden['blood'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="blood" value="<?php echo $this->form_encode_input($this->blood) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_blood_label" id="hidden_field_label_blood" style="<?php echo $sStyleHidden_blood; ?>"><span id="id_label_blood"><?php echo $this->nm_new_label['blood']; ?></span></TD>
    <TD class="scFormDataOdd css_blood_line" id="hidden_field_data_blood" style="<?php echo $sStyleHidden_blood; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_blood_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["blood"]) &&  $this->nmgp_cmp_readonly["blood"] == "on") { 

$blood_look = "";
 if ($this->blood == "A") { $blood_look .= "A" ;} 
 if ($this->blood == "B") { $blood_look .= "B" ;} 
 if ($this->blood == "AB") { $blood_look .= "AB" ;} 
 if ($this->blood == "O") { $blood_look .= "O" ;} 
 if ($this->blood == "Tidak Tahu") { $blood_look .= "Tidak Tahu" ;} 
 if (empty($blood_look)) { $blood_look = $this->blood; }
?>
<input type="hidden" name="blood" value="<?php echo $this->form_encode_input($blood) . "\">" . $blood_look . ""; ?>
<?php } else { ?>
<?php

$blood_look = "";
 if ($this->blood == "A") { $blood_look .= "A" ;} 
 if ($this->blood == "B") { $blood_look .= "B" ;} 
 if ($this->blood == "AB") { $blood_look .= "AB" ;} 
 if ($this->blood == "O") { $blood_look .= "O" ;} 
 if ($this->blood == "Tidak Tahu") { $blood_look .= "Tidak Tahu" ;} 
 if (empty($blood_look)) { $blood_look = $this->blood; }
?>
<span id="id_read_on_blood" class="css_blood_line"  style="<?php echo $sStyleReadLab_blood; ?>"><?php echo $this->form_encode_input($blood_look); ?></span><span id="id_read_off_blood" class="css_read_off_blood" style="white-space: nowrap; <?php echo $sStyleReadInp_blood; ?>">
 <span id="idAjaxSelect_blood"><select class="sc-js-input scFormObjectOdd css_blood_obj" style="" id="id_sc_field_blood" name="blood" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_blood'][] = ''; ?>
 <option value=""></option>
 <option  value="A" <?php  if ($this->blood == "A") { echo " selected" ;} ?>>A</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_blood'][] = 'A'; ?>
 <option  value="B" <?php  if ($this->blood == "B") { echo " selected" ;} ?>>B</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_blood'][] = 'B'; ?>
 <option  value="AB" <?php  if ($this->blood == "AB") { echo " selected" ;} ?>>AB</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_blood'][] = 'AB'; ?>
 <option  value="O" <?php  if ($this->blood == "O") { echo " selected" ;} ?>>O</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_blood'][] = 'O'; ?>
 <option  value="Tidak Tahu" <?php  if ($this->blood == "Tidak Tahu") { echo " selected" ;} ?><?php  if (empty($this->blood)) { echo " selected" ;} ?>>Tidak Tahu</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_blood'][] = 'Tidak Tahu'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_blood_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_blood_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['spouse']))
    {
        $this->nm_new_label['spouse'] = "Nama Pasangan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $spouse = $this->spouse;
   $sStyleHidden_spouse = '';
   if (isset($this->nmgp_cmp_hidden['spouse']) && $this->nmgp_cmp_hidden['spouse'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['spouse']);
       $sStyleHidden_spouse = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_spouse = 'display: none;';
   $sStyleReadInp_spouse = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['spouse']) && $this->nmgp_cmp_readonly['spouse'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['spouse']);
       $sStyleReadLab_spouse = '';
       $sStyleReadInp_spouse = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['spouse']) && $this->nmgp_cmp_hidden['spouse'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="spouse" value="<?php echo $this->form_encode_input($spouse) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_spouse_label" id="hidden_field_label_spouse" style="<?php echo $sStyleHidden_spouse; ?>"><span id="id_label_spouse"><?php echo $this->nm_new_label['spouse']; ?></span></TD>
    <TD class="scFormDataOdd css_spouse_line" id="hidden_field_data_spouse" style="<?php echo $sStyleHidden_spouse; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_spouse_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["spouse"]) &&  $this->nmgp_cmp_readonly["spouse"] == "on") { 

 ?>
<input type="hidden" name="spouse" value="<?php echo $this->form_encode_input($spouse) . "\">" . $spouse . ""; ?>
<?php } else { ?>
<span id="id_read_on_spouse" class="sc-ui-readonly-spouse css_spouse_line" style="<?php echo $sStyleReadLab_spouse; ?>"><?php echo $this->spouse; ?></span><span id="id_read_off_spouse" class="css_read_off_spouse" style="white-space: nowrap;<?php echo $sStyleReadInp_spouse; ?>">
 <input class="sc-js-input scFormObjectOdd css_spouse_obj" style="" id="id_sc_field_spouse" type=text name="spouse" value="<?php echo $this->form_encode_input($spouse) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_spouse_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_spouse_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="35%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Data Tambahan<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idno']))
    {
        $this->nm_new_label['idno'] = "No. ID (KTP/SIM)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idno = $this->idno;
   $sStyleHidden_idno = '';
   if (isset($this->nmgp_cmp_hidden['idno']) && $this->nmgp_cmp_hidden['idno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idno']);
       $sStyleHidden_idno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idno = 'display: none;';
   $sStyleReadInp_idno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idno']) && $this->nmgp_cmp_readonly['idno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idno']);
       $sStyleReadLab_idno = '';
       $sStyleReadInp_idno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idno']) && $this->nmgp_cmp_hidden['idno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idno" value="<?php echo $this->form_encode_input($idno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idno_label" id="hidden_field_label_idno" style="<?php echo $sStyleHidden_idno; ?>"><span id="id_label_idno"><?php echo $this->nm_new_label['idno']; ?></span></TD>
    <TD class="scFormDataOdd css_idno_line" id="hidden_field_data_idno" style="<?php echo $sStyleHidden_idno; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idno_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idno"]) &&  $this->nmgp_cmp_readonly["idno"] == "on") { 

 ?>
<input type="hidden" name="idno" value="<?php echo $this->form_encode_input($idno) . "\">" . $idno . ""; ?>
<?php } else { ?>
<span id="id_read_on_idno" class="sc-ui-readonly-idno css_idno_line" style="<?php echo $sStyleReadLab_idno; ?>"><?php echo $this->idno; ?></span><span id="id_read_off_idno" class="css_read_off_idno" style="white-space: nowrap;<?php echo $sStyleReadInp_idno; ?>">
 <input class="sc-js-input scFormObjectOdd css_idno_obj" style="" id="id_sc_field_idno" type=text name="idno" value="<?php echo $this->form_encode_input($idno) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idno_text"></span></td></tr></table></td></tr></table></TD>
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
       $this->nm_new_label['religion'] = "Agama";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['religion']) && $this->nmgp_cmp_hidden['religion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="religion" value="<?php echo $this->form_encode_input($this->religion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_religion_label" id="hidden_field_label_religion" style="<?php echo $sStyleHidden_religion; ?>"><span id="id_label_religion"><?php echo $this->nm_new_label['religion']; ?></span></TD>
    <TD class="scFormDataOdd css_religion_line" id="hidden_field_data_religion" style="<?php echo $sStyleHidden_religion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_religion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["religion"]) &&  $this->nmgp_cmp_readonly["religion"] == "on") { 

$religion_look = "";
 if ($this->religion == "ISLAM") { $religion_look .= "ISLAM" ;} 
 if ($this->religion == "BUDHA") { $religion_look .= "BUDHA" ;} 
 if ($this->religion == "HINDU") { $religion_look .= "HINDU" ;} 
 if ($this->religion == "KATOLIK") { $religion_look .= "KATOLIK" ;} 
 if ($this->religion == "KRISTEN") { $religion_look .= "KRISTEN" ;} 
 if ($this->religion == "LAIN-LAIN") { $religion_look .= "LAIN-LAIN" ;} 
 if (empty($religion_look)) { $religion_look = $this->religion; }
?>
<input type="hidden" name="religion" value="<?php echo $this->form_encode_input($religion) . "\">" . $religion_look . ""; ?>
<?php } else { ?>
<?php

$religion_look = "";
 if ($this->religion == "ISLAM") { $religion_look .= "ISLAM" ;} 
 if ($this->religion == "BUDHA") { $religion_look .= "BUDHA" ;} 
 if ($this->religion == "HINDU") { $religion_look .= "HINDU" ;} 
 if ($this->religion == "KATOLIK") { $religion_look .= "KATOLIK" ;} 
 if ($this->religion == "KRISTEN") { $religion_look .= "KRISTEN" ;} 
 if ($this->religion == "LAIN-LAIN") { $religion_look .= "LAIN-LAIN" ;} 
 if (empty($religion_look)) { $religion_look = $this->religion; }
?>
<span id="id_read_on_religion" class="css_religion_line"  style="<?php echo $sStyleReadLab_religion; ?>"><?php echo $this->form_encode_input($religion_look); ?></span><span id="id_read_off_religion" class="css_read_off_religion" style="white-space: nowrap; <?php echo $sStyleReadInp_religion; ?>">
 <span id="idAjaxSelect_religion"><select class="sc-js-input scFormObjectOdd css_religion_obj" style="" id="id_sc_field_religion" name="religion" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = ''; ?>
 <option value=""></option>
 <option  value="ISLAM" <?php  if ($this->religion == "ISLAM") { echo " selected" ;} ?>>ISLAM</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = 'ISLAM'; ?>
 <option  value="BUDHA" <?php  if ($this->religion == "BUDHA") { echo " selected" ;} ?>>BUDHA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = 'BUDHA'; ?>
 <option  value="HINDU" <?php  if ($this->religion == "HINDU") { echo " selected" ;} ?>>HINDU</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = 'HINDU'; ?>
 <option  value="KATOLIK" <?php  if ($this->religion == "KATOLIK") { echo " selected" ;} ?>>KATOLIK</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = 'KATOLIK'; ?>
 <option  value="KRISTEN" <?php  if ($this->religion == "KRISTEN") { echo " selected" ;} ?>>KRISTEN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = 'KRISTEN'; ?>
 <option  value="LAIN-LAIN" <?php  if ($this->religion == "LAIN-LAIN") { echo " selected" ;} ?>>LAIN-LAIN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = 'LAIN-LAIN'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_religion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_religion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['job']))
   {
       $this->nm_new_label['job'] = "Pekerjaan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $job = $this->job;
   $sStyleHidden_job = '';
   if (isset($this->nmgp_cmp_hidden['job']) && $this->nmgp_cmp_hidden['job'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['job']);
       $sStyleHidden_job = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_job = 'display: none;';
   $sStyleReadInp_job = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['job']) && $this->nmgp_cmp_readonly['job'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['job']);
       $sStyleReadLab_job = '';
       $sStyleReadInp_job = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['job']) && $this->nmgp_cmp_hidden['job'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="job" value="<?php echo $this->form_encode_input($this->job) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_job_label" id="hidden_field_label_job" style="<?php echo $sStyleHidden_job; ?>"><span id="id_label_job"><?php echo $this->nm_new_label['job']; ?></span></TD>
    <TD class="scFormDataOdd css_job_line" id="hidden_field_data_job" style="<?php echo $sStyleHidden_job; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_job_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["job"]) &&  $this->nmgp_cmp_readonly["job"] == "on") { 

$job_look = "";
 if ($this->job == "BURUH") { $job_look .= "BURUH" ;} 
 if ($this->job == "DIBAWAH UMUR") { $job_look .= "DIBAWAH UMUR" ;} 
 if ($this->job == "IBU RT") { $job_look .= "IBU RT" ;} 
 if ($this->job == "KARYAWAN SWASTA") { $job_look .= "KARYAWAN SWASTA" ;} 
 if ($this->job == "LAIN-LAIN") { $job_look .= "LAIN-LAIN" ;} 
 if ($this->job == "MAHASISWA/I") { $job_look .= "MAHASISWA/I" ;} 
 if ($this->job == "PEDAGANG") { $job_look .= "PEDAGANG" ;} 
 if ($this->job == "PELAJAR") { $job_look .= "PELAJAR" ;} 
 if ($this->job == "PETANI") { $job_look .= "PETANI" ;} 
 if (empty($job_look)) { $job_look = $this->job; }
?>
<input type="hidden" name="job" value="<?php echo $this->form_encode_input($job) . "\">" . $job_look . ""; ?>
<?php } else { ?>
<?php

$job_look = "";
 if ($this->job == "BURUH") { $job_look .= "BURUH" ;} 
 if ($this->job == "DIBAWAH UMUR") { $job_look .= "DIBAWAH UMUR" ;} 
 if ($this->job == "IBU RT") { $job_look .= "IBU RT" ;} 
 if ($this->job == "KARYAWAN SWASTA") { $job_look .= "KARYAWAN SWASTA" ;} 
 if ($this->job == "LAIN-LAIN") { $job_look .= "LAIN-LAIN" ;} 
 if ($this->job == "MAHASISWA/I") { $job_look .= "MAHASISWA/I" ;} 
 if ($this->job == "PEDAGANG") { $job_look .= "PEDAGANG" ;} 
 if ($this->job == "PELAJAR") { $job_look .= "PELAJAR" ;} 
 if ($this->job == "PETANI") { $job_look .= "PETANI" ;} 
 if (empty($job_look)) { $job_look = $this->job; }
?>
<span id="id_read_on_job" class="css_job_line"  style="<?php echo $sStyleReadLab_job; ?>"><?php echo $this->form_encode_input($job_look); ?></span><span id="id_read_off_job" class="css_read_off_job" style="white-space: nowrap; <?php echo $sStyleReadInp_job; ?>">
 <span id="idAjaxSelect_job"><select class="sc-js-input scFormObjectOdd css_job_obj" style="" id="id_sc_field_job" name="job" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = ''; ?>
 <option value=""></option>
 <option  value="BURUH" <?php  if ($this->job == "BURUH") { echo " selected" ;} ?>>BURUH</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'BURUH'; ?>
 <option  value="DIBAWAH UMUR" <?php  if ($this->job == "DIBAWAH UMUR") { echo " selected" ;} ?>>DIBAWAH UMUR</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'DIBAWAH UMUR'; ?>
 <option  value="IBU RT" <?php  if ($this->job == "IBU RT") { echo " selected" ;} ?>>IBU RT</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'IBU RT'; ?>
 <option  value="KARYAWAN SWASTA" <?php  if ($this->job == "KARYAWAN SWASTA") { echo " selected" ;} ?>>KARYAWAN SWASTA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'KARYAWAN SWASTA'; ?>
 <option  value="LAIN-LAIN" <?php  if ($this->job == "LAIN-LAIN") { echo " selected" ;} ?>>LAIN-LAIN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'LAIN-LAIN'; ?>
 <option  value="MAHASISWA/I" <?php  if ($this->job == "MAHASISWA/I") { echo " selected" ;} ?>>MAHASISWA/I</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'MAHASISWA/I'; ?>
 <option  value="PEDAGANG" <?php  if ($this->job == "PEDAGANG") { echo " selected" ;} ?>>PEDAGANG</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'PEDAGANG'; ?>
 <option  value="PELAJAR" <?php  if ($this->job == "PELAJAR") { echo " selected" ;} ?>>PELAJAR</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'PELAJAR'; ?>
 <option  value="PETANI" <?php  if ($this->job == "PETANI") { echo " selected" ;} ?>>PETANI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'PETANI'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_job_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_job_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['father']))
    {
        $this->nm_new_label['father'] = "Nama Ayah";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $father = $this->father;
   $sStyleHidden_father = '';
   if (isset($this->nmgp_cmp_hidden['father']) && $this->nmgp_cmp_hidden['father'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['father']);
       $sStyleHidden_father = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_father = 'display: none;';
   $sStyleReadInp_father = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['father']) && $this->nmgp_cmp_readonly['father'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['father']);
       $sStyleReadLab_father = '';
       $sStyleReadInp_father = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['father']) && $this->nmgp_cmp_hidden['father'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="father" value="<?php echo $this->form_encode_input($father) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_father_label" id="hidden_field_label_father" style="<?php echo $sStyleHidden_father; ?>"><span id="id_label_father"><?php echo $this->nm_new_label['father']; ?></span></TD>
    <TD class="scFormDataOdd css_father_line" id="hidden_field_data_father" style="<?php echo $sStyleHidden_father; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_father_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["father"]) &&  $this->nmgp_cmp_readonly["father"] == "on") { 

 ?>
<input type="hidden" name="father" value="<?php echo $this->form_encode_input($father) . "\">" . $father . ""; ?>
<?php } else { ?>
<span id="id_read_on_father" class="sc-ui-readonly-father css_father_line" style="<?php echo $sStyleReadLab_father; ?>"><?php echo $this->father; ?></span><span id="id_read_off_father" class="css_read_off_father" style="white-space: nowrap;<?php echo $sStyleReadInp_father; ?>">
 <input class="sc-js-input scFormObjectOdd css_father_obj" style="" id="id_sc_field_father" type=text name="father" value="<?php echo $this->form_encode_input($father) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_father_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_father_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['mother']))
    {
        $this->nm_new_label['mother'] = "Nama Ibu";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mother = $this->mother;
   $sStyleHidden_mother = '';
   if (isset($this->nmgp_cmp_hidden['mother']) && $this->nmgp_cmp_hidden['mother'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mother']);
       $sStyleHidden_mother = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mother = 'display: none;';
   $sStyleReadInp_mother = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mother']) && $this->nmgp_cmp_readonly['mother'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mother']);
       $sStyleReadLab_mother = '';
       $sStyleReadInp_mother = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mother']) && $this->nmgp_cmp_hidden['mother'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mother" value="<?php echo $this->form_encode_input($mother) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_mother_label" id="hidden_field_label_mother" style="<?php echo $sStyleHidden_mother; ?>"><span id="id_label_mother"><?php echo $this->nm_new_label['mother']; ?></span></TD>
    <TD class="scFormDataOdd css_mother_line" id="hidden_field_data_mother" style="<?php echo $sStyleHidden_mother; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_mother_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mother"]) &&  $this->nmgp_cmp_readonly["mother"] == "on") { 

 ?>
<input type="hidden" name="mother" value="<?php echo $this->form_encode_input($mother) . "\">" . $mother . ""; ?>
<?php } else { ?>
<span id="id_read_on_mother" class="sc-ui-readonly-mother css_mother_line" style="<?php echo $sStyleReadLab_mother; ?>"><?php echo $this->mother; ?></span><span id="id_read_off_mother" class="css_read_off_mother" style="white-space: nowrap;<?php echo $sStyleReadInp_mother; ?>">
 <input class="sc-js-input scFormObjectOdd css_mother_obj" style="" id="id_sc_field_mother" type=text name="mother" value="<?php echo $this->form_encode_input($mother) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mother_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mother_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['penanggung']))
    {
        $this->nm_new_label['penanggung'] = "Nama Penanggung";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $penanggung = $this->penanggung;
   $sStyleHidden_penanggung = '';
   if (isset($this->nmgp_cmp_hidden['penanggung']) && $this->nmgp_cmp_hidden['penanggung'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['penanggung']);
       $sStyleHidden_penanggung = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_penanggung = 'display: none;';
   $sStyleReadInp_penanggung = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['penanggung']) && $this->nmgp_cmp_readonly['penanggung'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['penanggung']);
       $sStyleReadLab_penanggung = '';
       $sStyleReadInp_penanggung = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['penanggung']) && $this->nmgp_cmp_hidden['penanggung'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="penanggung" value="<?php echo $this->form_encode_input($penanggung) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_penanggung_label" id="hidden_field_label_penanggung" style="<?php echo $sStyleHidden_penanggung; ?>"><span id="id_label_penanggung"><?php echo $this->nm_new_label['penanggung']; ?></span></TD>
    <TD class="scFormDataOdd css_penanggung_line" id="hidden_field_data_penanggung" style="<?php echo $sStyleHidden_penanggung; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_penanggung_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["penanggung"]) &&  $this->nmgp_cmp_readonly["penanggung"] == "on") { 

 ?>
<input type="hidden" name="penanggung" value="<?php echo $this->form_encode_input($penanggung) . "\">" . $penanggung . ""; ?>
<?php } else { ?>
<span id="id_read_on_penanggung" class="sc-ui-readonly-penanggung css_penanggung_line" style="<?php echo $sStyleReadLab_penanggung; ?>"><?php echo $this->penanggung; ?></span><span id="id_read_off_penanggung" class="css_read_off_penanggung" style="white-space: nowrap;<?php echo $sStyleReadInp_penanggung; ?>">
 <input class="sc-js-input scFormObjectOdd css_penanggung_obj" style="" id="id_sc_field_penanggung" type=text name="penanggung" value="<?php echo $this->form_encode_input($penanggung) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_penanggung_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_penanggung_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bu']))
    {
        $this->nm_new_label['bu'] = "Perusahaan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bu = $this->bu;
   $sStyleHidden_bu = '';
   if (isset($this->nmgp_cmp_hidden['bu']) && $this->nmgp_cmp_hidden['bu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bu']);
       $sStyleHidden_bu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bu = 'display: none;';
   $sStyleReadInp_bu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bu']) && $this->nmgp_cmp_readonly['bu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bu']);
       $sStyleReadLab_bu = '';
       $sStyleReadInp_bu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bu']) && $this->nmgp_cmp_hidden['bu'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bu" value="<?php echo $this->form_encode_input($bu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_bu_label" id="hidden_field_label_bu" style="<?php echo $sStyleHidden_bu; ?>"><span id="id_label_bu"><?php echo $this->nm_new_label['bu']; ?></span></TD>
    <TD class="scFormDataOdd css_bu_line" id="hidden_field_data_bu" style="<?php echo $sStyleHidden_bu; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bu_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bu"]) &&  $this->nmgp_cmp_readonly["bu"] == "on") { 

 ?>
<input type="hidden" name="bu" value="<?php echo $this->form_encode_input($bu) . "\">" . $bu . ""; ?>
<?php } else { ?>
<span id="id_read_on_bu" class="sc-ui-readonly-bu css_bu_line" style="<?php echo $sStyleReadLab_bu; ?>"><?php echo $this->bu; ?></span><span id="id_read_off_bu" class="css_read_off_bu" style="white-space: nowrap;<?php echo $sStyleReadInp_bu; ?>">
 <input class="sc-js-input scFormObjectOdd css_bu_obj" style="" id="id_sc_field_bu" type=text name="bu" value="<?php echo $this->form_encode_input($bu) ?>"
 size=25 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_tbcustomer*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_tbbu"]) && $this->Ini->sc_lig_md5["grid_tbbu"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutnmgp_parms_ret*scinF1,bu,nama_bu*scoutnm_evt_ret_busca*scin*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_tbcustomer@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutnmgp_parms_ret*scinF1,bu,nama_bu*scoutnm_evt_ret_busca*scin*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "scModalCapture('" . $this->Ini->link_grid_tbbu_cons_psq . "?script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_tbcustomer&KeepThis=true&TB_iframe=true&height=600&width=800&modal=true')", "scModalCapture('" . $this->Ini->link_grid_tbbu_cons_psq . "?script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_tbcustomer&KeepThis=true&TB_iframe=true&height=600&width=800&modal=true')", "cap_bu", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bu_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bu_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['education']))
   {
       $this->nm_new_label['education'] = "Pendidikan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $education = $this->education;
   $sStyleHidden_education = '';
   if (isset($this->nmgp_cmp_hidden['education']) && $this->nmgp_cmp_hidden['education'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['education']);
       $sStyleHidden_education = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_education = 'display: none;';
   $sStyleReadInp_education = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['education']) && $this->nmgp_cmp_readonly['education'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['education']);
       $sStyleReadLab_education = '';
       $sStyleReadInp_education = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['education']) && $this->nmgp_cmp_hidden['education'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="education" value="<?php echo $this->form_encode_input($this->education) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_education_label" id="hidden_field_label_education" style="<?php echo $sStyleHidden_education; ?>"><span id="id_label_education"><?php echo $this->nm_new_label['education']; ?></span></TD>
    <TD class="scFormDataOdd css_education_line" id="hidden_field_data_education" style="<?php echo $sStyleHidden_education; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_education_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["education"]) &&  $this->nmgp_cmp_readonly["education"] == "on") { 

$education_look = "";
 if ($this->education == "SMA") { $education_look .= "SMA" ;} 
 if ($this->education == "SMP") { $education_look .= "SMP" ;} 
 if ($this->education == "SD") { $education_look .= "SD" ;} 
 if ($this->education == "Belum/Tidak Tamat SD") { $education_look .= "Belum/Tidak Tamat SD" ;} 
 if ($this->education == "Diploma") { $education_look .= "Diploma" ;} 
 if ($this->education == "Sarjana") { $education_look .= "Sarjana" ;} 
 if ($this->education == "Pasca Sarjana") { $education_look .= "Pasca Sarjana" ;} 
 if ($this->education == "Tidak Sekolah") { $education_look .= "Tidak Sekolah" ;} 
 if (empty($education_look)) { $education_look = $this->education; }
?>
<input type="hidden" name="education" value="<?php echo $this->form_encode_input($education) . "\">" . $education_look . ""; ?>
<?php } else { ?>
<?php

$education_look = "";
 if ($this->education == "SMA") { $education_look .= "SMA" ;} 
 if ($this->education == "SMP") { $education_look .= "SMP" ;} 
 if ($this->education == "SD") { $education_look .= "SD" ;} 
 if ($this->education == "Belum/Tidak Tamat SD") { $education_look .= "Belum/Tidak Tamat SD" ;} 
 if ($this->education == "Diploma") { $education_look .= "Diploma" ;} 
 if ($this->education == "Sarjana") { $education_look .= "Sarjana" ;} 
 if ($this->education == "Pasca Sarjana") { $education_look .= "Pasca Sarjana" ;} 
 if ($this->education == "Tidak Sekolah") { $education_look .= "Tidak Sekolah" ;} 
 if (empty($education_look)) { $education_look = $this->education; }
?>
<span id="id_read_on_education" class="css_education_line"  style="<?php echo $sStyleReadLab_education; ?>"><?php echo $this->form_encode_input($education_look); ?></span><span id="id_read_off_education" class="css_read_off_education" style="white-space: nowrap; <?php echo $sStyleReadInp_education; ?>">
 <span id="idAjaxSelect_education"><select class="sc-js-input scFormObjectOdd css_education_obj" style="" id="id_sc_field_education" name="education" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="SMA" <?php  if ($this->education == "SMA") { echo " selected" ;} ?><?php  if (empty($this->education)) { echo " selected" ;} ?>>SMA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'SMA'; ?>
 <option  value="SMP" <?php  if ($this->education == "SMP") { echo " selected" ;} ?>>SMP</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'SMP'; ?>
 <option  value="SD" <?php  if ($this->education == "SD") { echo " selected" ;} ?>>SD</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'SD'; ?>
 <option  value="Belum/Tidak Tamat SD" <?php  if ($this->education == "Belum/Tidak Tamat SD") { echo " selected" ;} ?>>Belum/Tidak Tamat SD</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'Belum/Tidak Tamat SD'; ?>
 <option  value="Diploma" <?php  if ($this->education == "Diploma") { echo " selected" ;} ?>>Diploma</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'Diploma'; ?>
 <option  value="Sarjana" <?php  if ($this->education == "Sarjana") { echo " selected" ;} ?>>Sarjana</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'Sarjana'; ?>
 <option  value="Pasca Sarjana" <?php  if ($this->education == "Pasca Sarjana") { echo " selected" ;} ?>>Pasca Sarjana</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'Pasca Sarjana'; ?>
 <option  value="Tidak Sekolah" <?php  if ($this->education == "Tidak Sekolah") { echo " selected" ;} ?>>Tidak Sekolah</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'Tidak Sekolah'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_education_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_education_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lastupdated']))
    {
        $this->nm_new_label['lastupdated'] = "Last Updated";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lastupdated = $this->lastupdated;
   if (!isset($this->nmgp_cmp_hidden['lastupdated']))
   {
       $this->nmgp_cmp_hidden['lastupdated'] = 'off';
   }
   $sStyleHidden_lastupdated = '';
   if (isset($this->nmgp_cmp_hidden['lastupdated']) && $this->nmgp_cmp_hidden['lastupdated'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lastupdated']);
       $sStyleHidden_lastupdated = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lastupdated = 'display: none;';
   $sStyleReadInp_lastupdated = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lastupdated']) && $this->nmgp_cmp_readonly['lastupdated'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lastupdated']);
       $sStyleReadLab_lastupdated = '';
       $sStyleReadInp_lastupdated = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lastupdated']) && $this->nmgp_cmp_hidden['lastupdated'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lastupdated" value="<?php echo $this->form_encode_input($lastupdated) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_lastupdated_label" id="hidden_field_label_lastupdated" style="<?php echo $sStyleHidden_lastupdated; ?>"><span id="id_label_lastupdated"><?php echo $this->nm_new_label['lastupdated']; ?></span></TD>
    <TD class="scFormDataOdd css_lastupdated_line" id="hidden_field_data_lastupdated" style="<?php echo $sStyleHidden_lastupdated; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lastupdated_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lastupdated"]) &&  $this->nmgp_cmp_readonly["lastupdated"] == "on") { 

 ?>
<input type="hidden" name="lastupdated" value="<?php echo $this->form_encode_input($lastupdated) . "\">" . $lastupdated . ""; ?>
<?php } else { ?>
<span id="id_read_on_lastupdated" class="sc-ui-readonly-lastupdated css_lastupdated_line" style="<?php echo $sStyleReadLab_lastupdated; ?>"><?php echo $lastupdated; ?></span><span id="id_read_off_lastupdated" class="css_read_off_lastupdated" style="white-space: nowrap;<?php echo $sStyleReadInp_lastupdated; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_lastupdated_obj" style="" id="id_sc_field_lastupdated" type=text name="lastupdated" value="<?php echo $this->form_encode_input($lastupdated) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['lastupdated']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['lastupdated']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['lastupdated']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lastupdated_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lastupdated_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['registerdate']))
    {
        $this->nm_new_label['registerdate'] = "Register Date";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $registerdate = $this->registerdate;
   if (!isset($this->nmgp_cmp_hidden['registerdate']))
   {
       $this->nmgp_cmp_hidden['registerdate'] = 'off';
   }
   $sStyleHidden_registerdate = '';
   if (isset($this->nmgp_cmp_hidden['registerdate']) && $this->nmgp_cmp_hidden['registerdate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['registerdate']);
       $sStyleHidden_registerdate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_registerdate = 'display: none;';
   $sStyleReadInp_registerdate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['registerdate']) && $this->nmgp_cmp_readonly['registerdate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['registerdate']);
       $sStyleReadLab_registerdate = '';
       $sStyleReadInp_registerdate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['registerdate']) && $this->nmgp_cmp_hidden['registerdate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="registerdate" value="<?php echo $this->form_encode_input($registerdate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_registerdate_label" id="hidden_field_label_registerdate" style="<?php echo $sStyleHidden_registerdate; ?>"><span id="id_label_registerdate"><?php echo $this->nm_new_label['registerdate']; ?></span></TD>
    <TD class="scFormDataOdd css_registerdate_line" id="hidden_field_data_registerdate" style="<?php echo $sStyleHidden_registerdate; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_registerdate_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["registerdate"]) &&  $this->nmgp_cmp_readonly["registerdate"] == "on") { 

 ?>
<input type="hidden" name="registerdate" value="<?php echo $this->form_encode_input($registerdate) . "\">" . $registerdate . ""; ?>
<?php } else { ?>
<span id="id_read_on_registerdate" class="sc-ui-readonly-registerdate css_registerdate_line" style="<?php echo $sStyleReadLab_registerdate; ?>"><?php echo $registerdate; ?></span><span id="id_read_off_registerdate" class="css_read_off_registerdate" style="white-space: nowrap;<?php echo $sStyleReadInp_registerdate; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_registerdate_obj" style="" id="id_sc_field_registerdate" type=text name="registerdate" value="<?php echo $this->form_encode_input($registerdate) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['registerdate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['registerdate']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['registerdate']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_registerdate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_registerdate_text"></span></td></tr></table></td></tr></table></TD>
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
        $this->nm_new_label['phone'] = "Telepon";
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
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_phone_text"></span></td></tr></table></td></tr></table></TD>
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
 size=25 maxlength=25 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.email.value != '') {window.open('mailto:' + document.F1.email.value); }", "if (document.F1.email.value != '') {window.open('mailto:' + document.F1.email.value); }", "email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['hta']))
    {
        $this->nm_new_label['hta'] = "HTA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_hta = $this->hta;
   if (strlen($this->hta_hora) > 8 ) {$this->hta_hora = substr($this->hta_hora, 0, 8);}
   $this->hta .= ' ' . $this->hta_hora;
   $hta = $this->hta;
   $sStyleHidden_hta = '';
   if (isset($this->nmgp_cmp_hidden['hta']) && $this->nmgp_cmp_hidden['hta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hta']);
       $sStyleHidden_hta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hta = 'display: none;';
   $sStyleReadInp_hta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hta']) && $this->nmgp_cmp_readonly['hta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hta']);
       $sStyleReadLab_hta = '';
       $sStyleReadInp_hta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hta']) && $this->nmgp_cmp_hidden['hta'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hta" value="<?php echo $this->form_encode_input($hta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_hta_label" id="hidden_field_label_hta" style="<?php echo $sStyleHidden_hta; ?>"><span id="id_label_hta"><?php echo $this->nm_new_label['hta']; ?></span></TD>
    <TD class="scFormDataOdd css_hta_line" id="hidden_field_data_hta" style="<?php echo $sStyleHidden_hta; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hta_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hta"]) &&  $this->nmgp_cmp_readonly["hta"] == "on") { 

 ?>
<input type="hidden" name="hta" value="<?php echo $this->form_encode_input($hta) . "\">" . $hta . ""; ?>
<?php } else { ?>
<span id="id_read_on_hta" class="sc-ui-readonly-hta css_hta_line" style="<?php echo $sStyleReadLab_hta; ?>"><?php echo $hta; ?></span><span id="id_read_off_hta" class="css_read_off_hta" style="white-space: nowrap;<?php echo $sStyleReadInp_hta; ?>">
 <input class="sc-js-input scFormObjectOdd css_hta_obj" style="" id="id_sc_field_hta" type=text name="hta" value="<?php echo $this->form_encode_input($hta) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['hta']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['hta']['date_format']; ?>', timeSep: '<?php echo $this->field_config['hta']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['hta']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hta_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->hta = $old_dt_hta;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id']))
           {
               $this->nmgp_cmp_readonly['id'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['isdead']))
   {
       $this->nm_new_label['isdead'] = "Meninggal ?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $isdead = $this->isdead;
   $sStyleHidden_isdead = '';
   if (isset($this->nmgp_cmp_hidden['isdead']) && $this->nmgp_cmp_hidden['isdead'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['isdead']);
       $sStyleHidden_isdead = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_isdead = 'display: none;';
   $sStyleReadInp_isdead = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['isdead']) && $this->nmgp_cmp_readonly['isdead'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['isdead']);
       $sStyleReadLab_isdead = '';
       $sStyleReadInp_isdead = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['isdead']) && $this->nmgp_cmp_hidden['isdead'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="isdead" value="<?php echo $this->form_encode_input($this->isdead) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_isdead_label" id="hidden_field_label_isdead" style="<?php echo $sStyleHidden_isdead; ?>"><span id="id_label_isdead"><?php echo $this->nm_new_label['isdead']; ?></span></TD>
    <TD class="scFormDataOdd css_isdead_line" id="hidden_field_data_isdead" style="<?php echo $sStyleHidden_isdead; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_isdead_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["isdead"]) &&  $this->nmgp_cmp_readonly["isdead"] == "on") { 

$isdead_look = "";
 if ($this->isdead == "1") { $isdead_look .= "Ya" ;} 
 if ($this->isdead == "0") { $isdead_look .= "Tidak" ;} 
 if (empty($isdead_look)) { $isdead_look = $this->isdead; }
?>
<input type="hidden" name="isdead" value="<?php echo $this->form_encode_input($isdead) . "\">" . $isdead_look . ""; ?>
<?php } else { ?>
<?php

$isdead_look = "";
 if ($this->isdead == "1") { $isdead_look .= "Ya" ;} 
 if ($this->isdead == "0") { $isdead_look .= "Tidak" ;} 
 if (empty($isdead_look)) { $isdead_look = $this->isdead; }
?>
<span id="id_read_on_isdead" class="css_isdead_line"  style="<?php echo $sStyleReadLab_isdead; ?>"><?php echo $this->form_encode_input($isdead_look); ?></span><span id="id_read_off_isdead" class="css_read_off_isdead" style="white-space: nowrap; <?php echo $sStyleReadInp_isdead; ?>">
 <span id="idAjaxSelect_isdead"><select class="sc-js-input scFormObjectOdd css_isdead_obj" style="" id="id_sc_field_isdead" name="isdead" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->isdead == "1") { echo " selected" ;} ?>>Ya</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_isdead'][] = '1'; ?>
 <option  value="0" <?php  if ($this->isdead == "0") { echo " selected" ;} ?><?php  if (empty($this->isdead)) { echo " selected" ;} ?>>Tidak</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_isdead'][] = '0'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_isdead_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_isdead_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id']))
    {
        $this->nm_new_label['id'] = "ID";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id = $this->id;
   if (!isset($this->nmgp_cmp_hidden['id']))
   {
       $this->nmgp_cmp_hidden['id'] = 'off';
   }
   $sStyleHidden_id = '';
   if (isset($this->nmgp_cmp_hidden['id']) && $this->nmgp_cmp_hidden['id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id']);
       $sStyleHidden_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id = 'display: none;';
   $sStyleReadInp_id = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id"]) &&  $this->nmgp_cmp_readonly["id"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id']);
       $sStyleReadLab_id = '';
       $sStyleReadInp_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id']) && $this->nmgp_cmp_hidden['id'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id" value="<?php echo $this->form_encode_input($id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_label" id="hidden_field_label_id" style="<?php echo $sStyleHidden_id; ?>"><span id="id_label_id"><?php echo $this->nm_new_label['id']; ?></span></TD>
    <TD class="scFormDataOdd css_id_line" id="hidden_field_data_id" style="<?php echo $sStyleHidden_id; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id" class="css_id_line" style="<?php echo $sStyleReadLab_id; ?>"><?php echo $this->form_encode_input($this->id); ?></span><span id="id_read_off_id" class="css_read_off_id" style="<?php echo $sStyleReadInp_id; ?>"><input type="hidden" name="id" value="<?php echo $this->form_encode_input($id) . "\">"?><span id="id_ajax_label_id"><?php echo nl2br($id); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
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
   function scModalCapture(sUrl)
   {
<?php
   $Parent = ($this->Embutida_call) ? 'parent.' : '';
?>
    <?php echo $Parent ?>tb_show('', sUrl, '');
   }
  </script>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tbcustomer");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbcustomer");
 parent.scAjaxDetailHeight("form_tbcustomer", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbcustomer", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbcustomer", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['sc_modal'])
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
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-3").length && $("#sc_b_upd_t.sc-unique-btn-3").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-4").length && $("#sc_b_del_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sc_btn_0() {
		if ($("#sc_sc_btn_0_top").length && $("#sc_sc_btn_0_top").is(":visible")) {
			sc_btn_sc_btn_0()
			 return;
		}
	}
	function scBtnFn_sc_btn_1() {
		if ($("#sc_sc_btn_1_top").length && $("#sc_sc_btn_1_top").is(":visible")) {
			sc_btn_sc_btn_1()
			 return;
		}
	}
	function scBtnFn_sc_btn_2() {
		if ($("#sc_sc_btn_2_top").length && $("#sc_sc_btn_2_top").is(":visible")) {
			sc_btn_sc_btn_2()
			 return;
		}
	}
	function scBtnFn_sc_btn_3() {
		if ($("#sc_sc_btn_3_top").length && $("#sc_sc_btn_3_top").is(":visible")) {
			sc_btn_sc_btn_3()
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['buttonStatus'] = $this->nmgp_botoes;
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
