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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Antrian Pasien"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Antrian Pasien"); } ?></TITLE>
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
.css_read_off_regdate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_instexpiry button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_hta button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_handled button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_paid button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbantrian/form_tbantrian_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbantrian_mob_sajax_js.php");
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
     if (F_name == "viaphone")
     {
        $('select[name="viaphone"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="viaphone"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="viaphone"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "nama")
     {
        $('select[name="nama"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="nama"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="nama"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "alamat")
     {
        $('select[name="alamat"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="alamat"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="alamat"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "sc_field_2")
     {
        $('select[name="sc_field_2"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="sc_field_2"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="sc_field_2"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "sc_field_1")
     {
        $('select[name="sc_field_1"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="sc_field_1"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="sc_field_1"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "sc_field_0")
     {
        $('select[name="sc_field_0"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="sc_field_0"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="sc_field_0"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "tp")
     {
        $('input[name="tp"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="tp"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="tp"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "uk")
     {
        $('input[name="uk"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="uk"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="uk"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_tbantrian_mob_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
     $(".scBtnGrpClick").mouseup(function(){
          event.preventDefault();
          if(event.target !== event.currentTarget) return;
          if($(this).find("a").prop('href') != '')
          {
              $(this).find("a").click();
          }
          else
          {
              eval($(this).find("a").prop('onclick'));
          }
  });
  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  sc_form_onload();

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
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
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
    if ("hidden_bloco_2" == block_id) {
      scAjaxDetailHeight("form_detailadm", $($("#nmsc_iframe_liga_form_detailadm")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_detailadm")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_detailadm")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_tbantrian']['error_buffer']) && '' != $_SESSION['scriptcase']['form_tbantrian']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_tbantrian']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
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
 include_once("form_tbantrian_mob_js0.php");
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
               action="form_tbantrian_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_tbantrian_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbantrian_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['fast_search'][2] : "";
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
        $sCondStyle = ($this->nmgp_botoes['new'] != 'off' || $this->nmgp_botoes['insert'] != 'off' || $this->nmgp_botoes['exit'] != 'off' || $this->nmgp_botoes['update'] != 'off' || $this->nmgp_botoes['delete'] != 'off' || $this->nmgp_botoes['copy'] != 'off') ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_t')", "scBtnGrpShow('group_2_t')", "sc_btgp_btn_group_2_t", "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "", "", "__sc_grp__");?>
 
<?php
        $NM_btn = true;
echo nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 't', '', 'ini');
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_new_t">
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-15", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_sai_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-16", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-17", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-18", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sys_separator">
 </td></tr><tr><td class="scBtnGrpBackground">
  </div>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_clone_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "scBtnFn_sys_format_copy()", "scBtnFn_sys_format_copy()", "sc_b_clone_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-20", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
echo nmButtonGroupTableOutput($this->arr_buttons, "", '', '', '', 'fim');
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-21", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-22", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-23", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-24", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-25", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['empty_filter'] = true;
       }
  }
?>
<script type="text/javascript">
var pag_ativa = "form_tbantrian_mob_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'form_tbantrian_mob_form0' => array(
            'title' => "Pendaftaran Pasien",
            'class' => $nmgp_num_form == "form_tbantrian_mob_form0" ? "scTabActive" : "scTabInactive",
        ),
        'form_tbantrian_mob_form1' => array(
            'title' => "Biaya",
            'class' => $nmgp_num_form == "form_tbantrian_mob_form1" ? "scTabActive" : "scTabInactive",
        ),
    );
        if (!empty($this->Ini->nm_hidden_pages)) {
                foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                        if ('Pendaftaran Pasien' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_tbantrian_mob_form0']['class'] = 'scTabInactive';
                        }
                        if ('Biaya' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_tbantrian_mob_form1']['class'] = 'scTabInactive';
                        }
                }
                $displayingPage = false;
                foreach ($this->tabCssClass as $pageInfo) {
                        if ('scTabActive' == $pageInfo['class']) {
                                $displayingPage = true;
                                break;
                        }
                }
                if (!$displayingPage) {
                        foreach ($this->tabCssClass as $pageForm => $pageInfo) {
                                if (!isset($this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) || 'off' != $this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) {
                                        $this->tabCssClass[$pageForm]['class'] = 'scTabActive';
                                        break;
                                }
                        }
                }
        }
?>
<?php
    $css_celula = $this->tabCssClass["form_tbantrian_mob_form0"]['class'];
?>
   <li id="id_form_tbantrian_mob_form0" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_tbantrian_mob_form0')">
     Pendaftaran Pasien
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_tbantrian_mob_form1"]['class'];
?>
   <li id="id_form_tbantrian_mob_form1" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_tbantrian_mob_form1')">
     Biaya
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_tbantrian_mob_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['regtime']))
   {
       $this->nmgp_cmp_hidden['regtime'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['struckno']))
   {
       $this->nmgp_cmp_hidden['struckno'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['admission']))
   {
       $this->nmgp_cmp_hidden['admission'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id']))
   {
       $this->nmgp_cmp_hidden['id'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['poly']))
   {
       $this->nm_new_label['poly'] = "Poli";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $poly = $this->poly;
   $sStyleHidden_poly = '';
   if (isset($this->nmgp_cmp_hidden['poly']) && $this->nmgp_cmp_hidden['poly'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['poly']);
       $sStyleHidden_poly = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_poly = 'display: none;';
   $sStyleReadInp_poly = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['poly']) && $this->nmgp_cmp_readonly['poly'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['poly']);
       $sStyleReadLab_poly = '';
       $sStyleReadInp_poly = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['poly']) && $this->nmgp_cmp_hidden['poly'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="poly" value="<?php echo $this->form_encode_input($this->poly) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_poly_line" id="hidden_field_data_poly" style="<?php echo $sStyleHidden_poly; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_poly_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_poly_label"><span id="id_label_poly"><?php echo $this->nm_new_label['poly']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['php_cmp_required']['poly']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['php_cmp_required']['poly'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["poly"]) &&  $this->nmgp_cmp_readonly["poly"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_poly']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_poly'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_poly']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_poly'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_poly']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_poly'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_poly']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_poly'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT polyCode, name  FROM tbpoli  ORDER BY name";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_poly'][] = $rs->fields[0];
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
   $poly_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->poly_1))
          {
              foreach ($this->poly_1 as $tmp_poly)
              {
                  if (trim($tmp_poly) === trim($cadaselect[1])) { $poly_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->poly) === trim($cadaselect[1])) { $poly_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="poly" value="<?php echo $this->form_encode_input($poly) . "\">" . $poly_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_poly();
   $x = 0 ; 
   $poly_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->poly_1))
          {
              foreach ($this->poly_1 as $tmp_poly)
              {
                  if (trim($tmp_poly) === trim($cadaselect[1])) { $poly_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->poly) === trim($cadaselect[1])) { $poly_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($poly_look))
          {
              $poly_look = $this->poly;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_poly\" class=\"css_poly_line\" style=\"" .  $sStyleReadLab_poly . "\">" . $this->form_encode_input($poly_look) . "</span><span id=\"id_read_off_poly\" class=\"css_read_off_poly\" style=\"white-space: nowrap; " . $sStyleReadInp_poly . "\">";
   echo " <span id=\"idAjaxSelect_poly\"><select class=\"sc-js-input scFormObjectOdd css_poly_obj\" style=\"\" id=\"id_sc_field_poly\" name=\"poly\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_poly'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->poly) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->poly)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_poly_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_poly_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['doctor']))
   {
       $this->nm_new_label['doctor'] = "Dokter";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $doctor = $this->doctor;
   $sStyleHidden_doctor = '';
   if (isset($this->nmgp_cmp_hidden['doctor']) && $this->nmgp_cmp_hidden['doctor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['doctor']);
       $sStyleHidden_doctor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_doctor = 'display: none;';
   $sStyleReadInp_doctor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['doctor']) && $this->nmgp_cmp_readonly['doctor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['doctor']);
       $sStyleReadLab_doctor = '';
       $sStyleReadInp_doctor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['doctor']) && $this->nmgp_cmp_hidden['doctor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="doctor" value="<?php echo $this->form_encode_input($this->doctor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_doctor_line" id="hidden_field_data_doctor" style="<?php echo $sStyleHidden_doctor; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doctor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_doctor_label"><span id="id_label_doctor"><?php echo $this->nm_new_label['doctor']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['php_cmp_required']['doctor']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['php_cmp_required']['doctor'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doctor"]) &&  $this->nmgp_cmp_readonly["doctor"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_doctor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_doctor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_doctor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_doctor'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_doctor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_doctor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_doctor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_doctor'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT docCode, concat(gelar, name,',', spec)  FROM tbdoctor WHERE poli like '%$this->poly%' ORDER BY gelar, name, spec";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_doctor'][] = $rs->fields[0];
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
   $doctor_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->doctor_1))
          {
              foreach ($this->doctor_1 as $tmp_doctor)
              {
                  if (trim($tmp_doctor) === trim($cadaselect[1])) { $doctor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->doctor) === trim($cadaselect[1])) { $doctor_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="doctor" value="<?php echo $this->form_encode_input($doctor) . "\">" . $doctor_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_doctor();
   $x = 0 ; 
   $doctor_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->doctor_1))
          {
              foreach ($this->doctor_1 as $tmp_doctor)
              {
                  if (trim($tmp_doctor) === trim($cadaselect[1])) { $doctor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->doctor) === trim($cadaselect[1])) { $doctor_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($doctor_look))
          {
              $doctor_look = $this->doctor;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_doctor\" class=\"css_doctor_line\" style=\"" .  $sStyleReadLab_doctor . "\">" . $this->form_encode_input($doctor_look) . "</span><span id=\"id_read_off_doctor\" class=\"css_read_off_doctor\" style=\"white-space: nowrap; " . $sStyleReadInp_doctor . "\">";
   echo " <span id=\"idAjaxSelect_doctor\"><select class=\"sc-js-input scFormObjectOdd css_doctor_obj\" style=\"\" id=\"id_sc_field_doctor\" name=\"doctor\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_doctor'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->doctor) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->doctor)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_doctor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_doctor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['regdate']))
    {
        $this->nm_new_label['regdate'] = "Tanggal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $regdate = $this->regdate;
   $sStyleHidden_regdate = '';
   if (isset($this->nmgp_cmp_hidden['regdate']) && $this->nmgp_cmp_hidden['regdate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['regdate']);
       $sStyleHidden_regdate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_regdate = 'display: none;';
   $sStyleReadInp_regdate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['regdate']) && $this->nmgp_cmp_readonly['regdate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['regdate']);
       $sStyleReadLab_regdate = '';
       $sStyleReadInp_regdate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['regdate']) && $this->nmgp_cmp_hidden['regdate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="regdate" value="<?php echo $this->form_encode_input($regdate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_regdate_line" id="hidden_field_data_regdate" style="<?php echo $sStyleHidden_regdate; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_regdate_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_regdate_label"><span id="id_label_regdate"><?php echo $this->nm_new_label['regdate']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["regdate"]) &&  $this->nmgp_cmp_readonly["regdate"] == "on") { 

 ?>
<input type="hidden" name="regdate" value="<?php echo $this->form_encode_input($regdate) . "\">" . $regdate . ""; ?>
<?php } else { ?>
<span id="id_read_on_regdate" class="sc-ui-readonly-regdate css_regdate_line" style="<?php echo $sStyleReadLab_regdate; ?>"><?php echo $regdate; ?></span><span id="id_read_off_regdate" class="css_read_off_regdate" style="white-space: nowrap;<?php echo $sStyleReadInp_regdate; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_regdate_obj" style="" id="id_sc_field_regdate" type=text name="regdate" value="<?php echo $this->form_encode_input($regdate) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['regdate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['regdate']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['regdate']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_regdate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_regdate_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['viaphone']))
   {
       $this->nm_new_label['viaphone'] = "Non Prioritas (16 Keatas)";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $viaphone = $this->viaphone;
   $sStyleHidden_viaphone = '';
   if (isset($this->nmgp_cmp_hidden['viaphone']) && $this->nmgp_cmp_hidden['viaphone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['viaphone']);
       $sStyleHidden_viaphone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_viaphone = 'display: none;';
   $sStyleReadInp_viaphone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['viaphone']) && $this->nmgp_cmp_readonly['viaphone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['viaphone']);
       $sStyleReadLab_viaphone = '';
       $sStyleReadInp_viaphone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['viaphone']) && $this->nmgp_cmp_hidden['viaphone'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="viaphone" value="<?php echo $this->form_encode_input($this->viaphone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_viaphone_line" id="hidden_field_data_viaphone" style="<?php echo $sStyleHidden_viaphone; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_viaphone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_viaphone_label"><span id="id_label_viaphone"><?php echo $this->nm_new_label['viaphone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["viaphone"]) &&  $this->nmgp_cmp_readonly["viaphone"] == "on") { 

$viaphone_look = "";
 if ($this->viaphone == "0") { $viaphone_look .= "Tidak" ;} 
 if ($this->viaphone == "1") { $viaphone_look .= "Ya" ;} 
 if (empty($viaphone_look)) { $viaphone_look = $this->viaphone; }
?>
<input type="hidden" name="viaphone" value="<?php echo $this->form_encode_input($viaphone) . "\">" . $viaphone_look . ""; ?>
<?php } else { ?>
<?php

$viaphone_look = "";
 if ($this->viaphone == "0") { $viaphone_look .= "Tidak" ;} 
 if ($this->viaphone == "1") { $viaphone_look .= "Ya" ;} 
 if (empty($viaphone_look)) { $viaphone_look = $this->viaphone; }
?>
<span id="id_read_on_viaphone" class="css_viaphone_line"  style="<?php echo $sStyleReadLab_viaphone; ?>"><?php echo $this->form_encode_input($viaphone_look); ?></span><span id="id_read_off_viaphone" class="css_read_off_viaphone" style="white-space: nowrap; <?php echo $sStyleReadInp_viaphone; ?>">
 <span id="idAjaxSelect_viaphone"><select class="sc-js-input scFormObjectOdd css_viaphone_obj" style="" id="id_sc_field_viaphone" name="viaphone" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="0" <?php  if ($this->viaphone == "0") { echo " selected" ;} ?><?php  if (empty($this->viaphone)) { echo " selected" ;} ?>>Tidak</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_viaphone'][] = '0'; ?>
 <option  value="1" <?php  if ($this->viaphone == "1") { echo " selected" ;} ?>>Ya</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_viaphone'][] = '1'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_viaphone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_viaphone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['regtime']))
    {
        $this->nm_new_label['regtime'] = "Reg Time";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $regtime = $this->regtime;
   if (!isset($this->nmgp_cmp_hidden['regtime']))
   {
       $this->nmgp_cmp_hidden['regtime'] = 'off';
   }
   $sStyleHidden_regtime = '';
   if (isset($this->nmgp_cmp_hidden['regtime']) && $this->nmgp_cmp_hidden['regtime'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['regtime']);
       $sStyleHidden_regtime = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_regtime = 'display: none;';
   $sStyleReadInp_regtime = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['regtime']) && $this->nmgp_cmp_readonly['regtime'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['regtime']);
       $sStyleReadLab_regtime = '';
       $sStyleReadInp_regtime = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['regtime']) && $this->nmgp_cmp_hidden['regtime'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="regtime" value="<?php echo $this->form_encode_input($regtime) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_regtime_line" id="hidden_field_data_regtime" style="<?php echo $sStyleHidden_regtime; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_regtime_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_regtime_label"><span id="id_label_regtime"><?php echo $this->nm_new_label['regtime']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["regtime"]) &&  $this->nmgp_cmp_readonly["regtime"] == "on") { 

 ?>
<input type="hidden" name="regtime" value="<?php echo $this->form_encode_input($regtime) . "\">" . $regtime . ""; ?>
<?php } else { ?>
<span id="id_read_on_regtime" class="sc-ui-readonly-regtime css_regtime_line" style="<?php echo $sStyleReadLab_regtime; ?>"><?php echo $this->regtime; ?></span><span id="id_read_off_regtime" class="css_read_off_regtime" style="white-space: nowrap;<?php echo $sStyleReadInp_regtime; ?>">
 <input class="sc-js-input scFormObjectOdd css_regtime_obj" style="" id="id_sc_field_regtime" type=text name="regtime" value="<?php echo $this->form_encode_input($regtime) ?>"
 size=25 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_regtime_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_regtime_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['queue']))
    {
        $this->nm_new_label['queue'] = "No Antrian";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $queue = $this->queue;
   $sStyleHidden_queue = '';
   if (isset($this->nmgp_cmp_hidden['queue']) && $this->nmgp_cmp_hidden['queue'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['queue']);
       $sStyleHidden_queue = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_queue = 'display: none;';
   $sStyleReadInp_queue = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['queue']) && $this->nmgp_cmp_readonly['queue'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['queue']);
       $sStyleReadLab_queue = '';
       $sStyleReadInp_queue = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['queue']) && $this->nmgp_cmp_hidden['queue'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="queue" value="<?php echo $this->form_encode_input($queue) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_queue_line" id="hidden_field_data_queue" style="<?php echo $sStyleHidden_queue; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_queue_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_queue_label"><span id="id_label_queue"><?php echo $this->nm_new_label['queue']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["queue"]) &&  $this->nmgp_cmp_readonly["queue"] == "on") { 

 ?>
<input type="hidden" name="queue" value="<?php echo $this->form_encode_input($queue) . "\">" . $queue . ""; ?>
<?php } else { ?>
<span id="id_read_on_queue" class="sc-ui-readonly-queue css_queue_line" style="<?php echo $sStyleReadLab_queue; ?>"><?php echo $this->queue; ?></span><span id="id_read_off_queue" class="css_read_off_queue" style="white-space: nowrap;<?php echo $sStyleReadInp_queue; ?>">
 <input class="sc-js-input scFormObjectOdd css_queue_obj" style="" id="id_sc_field_queue" type=text name="queue" value="<?php echo $this->form_encode_input($queue) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['queue']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['queue']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['queue']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_queue_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_queue_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_queue_dumb = ('' == $sStyleHidden_queue) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_queue_dumb" style="<?php echo $sStyleHidden_queue_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
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

    <TD class="scFormDataOdd css_custcode_line" id="hidden_field_data_custcode" style="<?php echo $sStyleHidden_custcode; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_custcode_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_custcode_label"><span id="id_label_custcode"><?php echo $this->nm_new_label['custcode']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['php_cmp_required']['custcode']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['php_cmp_required']['custcode'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["custcode"]) &&  $this->nmgp_cmp_readonly["custcode"] == "on") { 

 ?>
<input type="hidden" name="custcode" value="<?php echo $this->form_encode_input($custcode) . "\">" . $custcode . ""; ?>
<?php } else { ?>
<span id="id_read_on_custcode" class="sc-ui-readonly-custcode css_custcode_line" style="<?php echo $sStyleReadLab_custcode; ?>"><?php echo $this->custcode; ?></span><span id="id_read_off_custcode" class="css_read_off_custcode" style="white-space: nowrap;<?php echo $sStyleReadInp_custcode; ?>">
 <input class="sc-js-input scFormObjectOdd css_custcode_obj" style="" id="id_sc_field_custcode" type=text name="custcode" value="<?php echo $this->form_encode_input($custcode) ?>"
 size=8 maxlength=8 alt="{datatype: 'text', maxLength: 8, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_tbantrian_mob*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_tbcustomer"]) && $this->Ini->sc_lig_md5["grid_tbcustomer"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,custcode,custcode*scoutnm_evt_ret_busca*scinsc_form_tbantrian_custcode_onchange(this)*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_tbantrian_mob@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,custcode,custcode*scoutnm_evt_ret_busca*scinsc_form_tbantrian_custcode_onchange(this)*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_tbcustomer_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_tbcustomer_cons_psq. "', '" . $Md5_Lig . "')", "cap_custcode", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_custcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_custcode_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['nama']))
   {
       $this->nm_new_label['nama'] = "Nama";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nama = $this->nama;
   $sStyleHidden_nama = '';
   if (isset($this->nmgp_cmp_hidden['nama']) && $this->nmgp_cmp_hidden['nama'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nama']);
       $sStyleHidden_nama = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nama = 'display: none;';
   $sStyleReadInp_nama = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nama']) && $this->nmgp_cmp_readonly['nama'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nama']);
       $sStyleReadLab_nama = '';
       $sStyleReadInp_nama = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nama']) && $this->nmgp_cmp_hidden['nama'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="nama" value="<?php echo $this->form_encode_input($this->nama) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nama_line" id="hidden_field_data_nama" style="<?php echo $sStyleHidden_nama; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nama_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nama_label"><span id="id_label_nama"><?php echo $this->nm_new_label['nama']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nama"]) &&  $this->nmgp_cmp_readonly["nama"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_nama']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_nama'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_nama']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_nama'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_nama']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_nama'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_nama']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_nama'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ',' + salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,',', salut)  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&','&salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ',' + salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_nama'][] = $rs->fields[0];
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
   $nama_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->nama_1))
          {
              foreach ($this->nama_1 as $tmp_nama)
              {
                  if (trim($tmp_nama) === trim($cadaselect[1])) { $nama_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->nama) === trim($cadaselect[1])) { $nama_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="nama" value="<?php echo $this->form_encode_input($nama) . "\">" . $nama_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_nama();
   $x = 0 ; 
   $nama_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->nama_1))
          {
              foreach ($this->nama_1 as $tmp_nama)
              {
                  if (trim($tmp_nama) === trim($cadaselect[1])) { $nama_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->nama) === trim($cadaselect[1])) { $nama_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($nama_look))
          {
              $nama_look = $this->nama;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_nama\" class=\"css_nama_line\" style=\"" .  $sStyleReadLab_nama . "\">" . $this->form_encode_input($nama_look) . "</span><span id=\"id_read_off_nama\" class=\"css_read_off_nama\" style=\"white-space: nowrap; " . $sStyleReadInp_nama . "\">";
   echo " <span id=\"idAjaxSelect_nama\"><select class=\"sc-js-input scFormObjectOdd css_nama_obj\" style=\"\" id=\"id_sc_field_nama\" name=\"nama\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->nama) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->nama)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nama_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nama_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['status']))
   {
       $this->nm_new_label['status'] = "Status";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['status']) && $this->nmgp_cmp_hidden['status'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="status" value="<?php echo $this->form_encode_input($this->status) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_status_line" id="hidden_field_data_status" style="<?php echo $sStyleHidden_status; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_status_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_status_label"><span id="id_label_status"><?php echo $this->nm_new_label['status']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["status"]) &&  $this->nmgp_cmp_readonly["status"] == "on") { 

$status_look = "";
 if ($this->status == "Antre") { $status_look .= "Antre" ;} 
 if ($this->status == "Batal") { $status_look .= "Batal" ;} 
 if ($this->status == "Pelayanan") { $status_look .= "Pelayanan" ;} 
 if ($this->status == "Lengkap") { $status_look .= "Lengkap" ;} 
 if ($this->status == "Selesai") { $status_look .= "Selesai" ;} 
 if (empty($status_look)) { $status_look = $this->status; }
?>
<input type="hidden" name="status" value="<?php echo $this->form_encode_input($status) . "\">" . $status_look . ""; ?>
<?php } else { ?>
<?php

$status_look = "";
 if ($this->status == "Antre") { $status_look .= "Antre" ;} 
 if ($this->status == "Batal") { $status_look .= "Batal" ;} 
 if ($this->status == "Pelayanan") { $status_look .= "Pelayanan" ;} 
 if ($this->status == "Lengkap") { $status_look .= "Lengkap" ;} 
 if ($this->status == "Selesai") { $status_look .= "Selesai" ;} 
 if (empty($status_look)) { $status_look = $this->status; }
?>
<span id="id_read_on_status" class="css_status_line"  style="<?php echo $sStyleReadLab_status; ?>"><?php echo $this->form_encode_input($status_look); ?></span><span id="id_read_off_status" class="css_read_off_status" style="white-space: nowrap; <?php echo $sStyleReadInp_status; ?>">
 <span id="idAjaxSelect_status"><select class="sc-js-input scFormObjectOdd css_status_obj" style="" id="id_sc_field_status" name="status" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="Antre" <?php  if ($this->status == "Antre") { echo " selected" ;} ?>>Antre</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_status'][] = 'Antre'; ?>
 <option  value="Batal" <?php  if ($this->status == "Batal") { echo " selected" ;} ?>>Batal</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_status'][] = 'Batal'; ?>
 <option  value="Pelayanan" <?php  if ($this->status == "Pelayanan") { echo " selected" ;} ?>>Pelayanan</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_status'][] = 'Pelayanan'; ?>
 <option  value="Lengkap" <?php  if ($this->status == "Lengkap") { echo " selected" ;} ?>>Lengkap</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_status'][] = 'Lengkap'; ?>
 <option  value="Selesai" <?php  if ($this->status == "Selesai") { echo " selected" ;} ?>>Selesai</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_status'][] = 'Selesai'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_status_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_status_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['alamat']))
   {
       $this->nm_new_label['alamat'] = "Alamat";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $alamat = $this->alamat;
   $sStyleHidden_alamat = '';
   if (isset($this->nmgp_cmp_hidden['alamat']) && $this->nmgp_cmp_hidden['alamat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['alamat']);
       $sStyleHidden_alamat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_alamat = 'display: none;';
   $sStyleReadInp_alamat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['alamat']) && $this->nmgp_cmp_readonly['alamat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['alamat']);
       $sStyleReadLab_alamat = '';
       $sStyleReadInp_alamat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['alamat']) && $this->nmgp_cmp_hidden['alamat'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="alamat" value="<?php echo $this->form_encode_input($this->alamat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_alamat_line" id="hidden_field_data_alamat" style="<?php echo $sStyleHidden_alamat; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_alamat_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_alamat_label"><span id="id_label_alamat"><?php echo $this->nm_new_label['alamat']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["alamat"]) &&  $this->nmgp_cmp_readonly["alamat"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_alamat']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_alamat'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_alamat']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_alamat'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_alamat']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_alamat'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_alamat']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_alamat'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT custCode, address  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY address";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_alamat'][] = $rs->fields[0];
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
   $alamat_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->alamat_1))
          {
              foreach ($this->alamat_1 as $tmp_alamat)
              {
                  if (trim($tmp_alamat) === trim($cadaselect[1])) { $alamat_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->alamat) === trim($cadaselect[1])) { $alamat_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="alamat" value="<?php echo $this->form_encode_input($alamat) . "\">" . $alamat_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_alamat();
   $x = 0 ; 
   $alamat_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->alamat_1))
          {
              foreach ($this->alamat_1 as $tmp_alamat)
              {
                  if (trim($tmp_alamat) === trim($cadaselect[1])) { $alamat_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->alamat) === trim($cadaselect[1])) { $alamat_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($alamat_look))
          {
              $alamat_look = $this->alamat;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_alamat\" class=\"css_alamat_line\" style=\"" .  $sStyleReadLab_alamat . "\">" . $this->form_encode_input($alamat_look) . "</span><span id=\"id_read_off_alamat\" class=\"css_read_off_alamat\" style=\"white-space: nowrap; " . $sStyleReadInp_alamat . "\">";
   echo " <span id=\"idAjaxSelect_alamat\"><select class=\"sc-js-input scFormObjectOdd css_alamat_obj\" style=\"\" id=\"id_sc_field_alamat\" name=\"alamat\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->alamat) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->alamat)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_alamat_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_alamat_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sc_field_2']))
   {
       $this->nm_new_label['sc_field_2'] = "Telepon & HP";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sc_field_2 = $this->sc_field_2;
   $sStyleHidden_sc_field_2 = '';
   if (isset($this->nmgp_cmp_hidden['sc_field_2']) && $this->nmgp_cmp_hidden['sc_field_2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sc_field_2']);
       $sStyleHidden_sc_field_2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sc_field_2 = 'display: none;';
   $sStyleReadInp_sc_field_2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sc_field_2']) && $this->nmgp_cmp_readonly['sc_field_2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sc_field_2']);
       $sStyleReadLab_sc_field_2 = '';
       $sStyleReadInp_sc_field_2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sc_field_2']) && $this->nmgp_cmp_hidden['sc_field_2'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sc_field_2" value="<?php echo $this->form_encode_input($this->sc_field_2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sc_field_2_line" id="hidden_field_data_sc_field_2" style="<?php echo $sStyleHidden_sc_field_2; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sc_field_2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sc_field_2_label"><span id="id_label_sc_field_2"><?php echo $this->nm_new_label['sc_field_2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_2"]) &&  $this->nmgp_cmp_readonly["sc_field_2"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_2']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_2']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_2'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_2']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_2']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_2'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, phone + ' / ' + hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(phone,' / ', hp)  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, phone&' / '&hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, phone||' / '||hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, phone + ' / ' + hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, phone||' / '||hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   else
   {
       $nm_comando = "SELECT custCode, phone||' / '||hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_2'][] = $rs->fields[0];
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
   $sc_field_2_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sc_field_2_1))
          {
              foreach ($this->sc_field_2_1 as $tmp_sc_field_2)
              {
                  if (trim($tmp_sc_field_2) === trim($cadaselect[1])) { $sc_field_2_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sc_field_2) === trim($cadaselect[1])) { $sc_field_2_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="sc_field_2" value="<?php echo $this->form_encode_input($sc_field_2) . "\">" . $sc_field_2_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_sc_field_2();
   $x = 0 ; 
   $sc_field_2_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sc_field_2_1))
          {
              foreach ($this->sc_field_2_1 as $tmp_sc_field_2)
              {
                  if (trim($tmp_sc_field_2) === trim($cadaselect[1])) { $sc_field_2_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sc_field_2) === trim($cadaselect[1])) { $sc_field_2_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($sc_field_2_look))
          {
              $sc_field_2_look = $this->sc_field_2;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_sc_field_2\" class=\"css_sc_field_2_line\" style=\"" .  $sStyleReadLab_sc_field_2 . "\">" . $this->form_encode_input($sc_field_2_look) . "</span><span id=\"id_read_off_sc_field_2\" class=\"css_read_off_sc_field_2\" style=\"white-space: nowrap; " . $sStyleReadInp_sc_field_2 . "\">";
   echo " <span id=\"idAjaxSelect_sc_field_2\"><select class=\"sc-js-input scFormObjectOdd css_sc_field_2_obj\" style=\"\" id=\"id_sc_field_sc_field_2\" name=\"sc_field_2\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->sc_field_2) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->sc_field_2)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sc_field_1']))
   {
       $this->nm_new_label['sc_field_1'] = "Tanggal Lahir";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sc_field_1 = $this->sc_field_1;
   $sStyleHidden_sc_field_1 = '';
   if (isset($this->nmgp_cmp_hidden['sc_field_1']) && $this->nmgp_cmp_hidden['sc_field_1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sc_field_1']);
       $sStyleHidden_sc_field_1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sc_field_1 = 'display: none;';
   $sStyleReadInp_sc_field_1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sc_field_1']) && $this->nmgp_cmp_readonly['sc_field_1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sc_field_1']);
       $sStyleReadLab_sc_field_1 = '';
       $sStyleReadInp_sc_field_1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sc_field_1']) && $this->nmgp_cmp_hidden['sc_field_1'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sc_field_1" value="<?php echo $this->form_encode_input($this->sc_field_1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sc_field_1_line" id="hidden_field_data_sc_field_1" style="<?php echo $sStyleHidden_sc_field_1; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sc_field_1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sc_field_1_label"><span id="id_label_sc_field_1"><?php echo $this->nm_new_label['sc_field_1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_1"]) &&  $this->nmgp_cmp_readonly["sc_field_1"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_1'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_1'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT str_replace (convert(char(10),date(birthDate),102), '.', '-') + ' ' + convert(char(8),date(birthDate),20) as sc_field_10 FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY birthDate";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT convert(char(19),date(birthDate),121) as sc_field_10 FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY birthDate";
   }
   else
   {
       $nm_comando = "SELECT date(birthDate)  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY birthDate";
   }

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_1'][] = $rs->fields[0];
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
   $sc_field_1_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sc_field_1_1))
          {
              foreach ($this->sc_field_1_1 as $tmp_sc_field_1)
              {
                  if (trim($tmp_sc_field_1) === trim($cadaselect[1])) { $sc_field_1_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sc_field_1) === trim($cadaselect[1])) { $sc_field_1_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="sc_field_1" value="<?php echo $this->form_encode_input($sc_field_1) . "\">" . $sc_field_1_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_sc_field_1();
   $x = 0 ; 
   $sc_field_1_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sc_field_1_1))
          {
              foreach ($this->sc_field_1_1 as $tmp_sc_field_1)
              {
                  if (trim($tmp_sc_field_1) === trim($cadaselect[1])) { $sc_field_1_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sc_field_1) === trim($cadaselect[1])) { $sc_field_1_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($sc_field_1_look))
          {
              $sc_field_1_look = $this->sc_field_1;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_sc_field_1\" class=\"css_sc_field_1_line\" style=\"" .  $sStyleReadLab_sc_field_1 . "\">" . $this->form_encode_input($sc_field_1_look) . "</span><span id=\"id_read_off_sc_field_1\" class=\"css_read_off_sc_field_1\" style=\"white-space: nowrap; " . $sStyleReadInp_sc_field_1 . "\">";
   echo " <span id=\"idAjaxSelect_sc_field_1\"><select class=\"sc-js-input scFormObjectOdd css_sc_field_1_obj\" style=\"\" id=\"id_sc_field_sc_field_1\" name=\"sc_field_1\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->sc_field_1) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->sc_field_1)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['usia']))
    {
        $this->nm_new_label['usia'] = "Usia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $usia = $this->usia;
   $sStyleHidden_usia = '';
   if (isset($this->nmgp_cmp_hidden['usia']) && $this->nmgp_cmp_hidden['usia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['usia']);
       $sStyleHidden_usia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_usia = 'display: none;';
   $sStyleReadInp_usia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['usia']) && $this->nmgp_cmp_readonly['usia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usia']);
       $sStyleReadLab_usia = '';
       $sStyleReadInp_usia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usia']) && $this->nmgp_cmp_hidden['usia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usia" value="<?php echo $this->form_encode_input($usia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_usia_line" id="hidden_field_data_usia" style="<?php echo $sStyleHidden_usia; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_usia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_usia_label"><span id="id_label_usia"><?php echo $this->nm_new_label['usia']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usia"]) &&  $this->nmgp_cmp_readonly["usia"] == "on") { 

 ?>
<input type="hidden" name="usia" value="<?php echo $this->form_encode_input($usia) . "\">" . $usia . ""; ?>
<?php } else { ?>
<span id="id_read_on_usia" class="sc-ui-readonly-usia css_usia_line" style="<?php echo $sStyleReadLab_usia; ?>"><?php echo $this->usia; ?></span><span id="id_read_off_usia" class="css_read_off_usia" style="white-space: nowrap;<?php echo $sStyleReadInp_usia; ?>">
 <input class="sc-js-input scFormObjectOdd css_usia_obj" style="" id="id_sc_field_usia" type=text name="usia" value="<?php echo $this->form_encode_input($usia) ?>"
 size=15 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sc_field_0']))
   {
       $this->nm_new_label['sc_field_0'] = "Jenis Kelamin";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sc_field_0 = $this->sc_field_0;
   $sStyleHidden_sc_field_0 = '';
   if (isset($this->nmgp_cmp_hidden['sc_field_0']) && $this->nmgp_cmp_hidden['sc_field_0'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sc_field_0']);
       $sStyleHidden_sc_field_0 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sc_field_0 = 'display: none;';
   $sStyleReadInp_sc_field_0 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sc_field_0']) && $this->nmgp_cmp_readonly['sc_field_0'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sc_field_0']);
       $sStyleReadLab_sc_field_0 = '';
       $sStyleReadInp_sc_field_0 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sc_field_0']) && $this->nmgp_cmp_hidden['sc_field_0'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sc_field_0" value="<?php echo $this->form_encode_input($this->sc_field_0) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sc_field_0_line" id="hidden_field_data_sc_field_0" style="<?php echo $sStyleHidden_sc_field_0; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sc_field_0_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sc_field_0_label"><span id="id_label_sc_field_0"><?php echo $this->nm_new_label['sc_field_0']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_0"]) &&  $this->nmgp_cmp_readonly["sc_field_0"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_0']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_0']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_0'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_0']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_0']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_0'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT custCode, sex  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY sex";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_sc_field_0'][] = $rs->fields[0];
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
   $sc_field_0_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sc_field_0_1))
          {
              foreach ($this->sc_field_0_1 as $tmp_sc_field_0)
              {
                  if (trim($tmp_sc_field_0) === trim($cadaselect[1])) { $sc_field_0_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sc_field_0) === trim($cadaselect[1])) { $sc_field_0_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="sc_field_0" value="<?php echo $this->form_encode_input($sc_field_0) . "\">" . $sc_field_0_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_sc_field_0();
   $x = 0 ; 
   $sc_field_0_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sc_field_0_1))
          {
              foreach ($this->sc_field_0_1 as $tmp_sc_field_0)
              {
                  if (trim($tmp_sc_field_0) === trim($cadaselect[1])) { $sc_field_0_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sc_field_0) === trim($cadaselect[1])) { $sc_field_0_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($sc_field_0_look))
          {
              $sc_field_0_look = $this->sc_field_0;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_sc_field_0\" class=\"css_sc_field_0_line\" style=\"" .  $sStyleReadLab_sc_field_0 . "\">" . $this->form_encode_input($sc_field_0_look) . "</span><span id=\"id_read_off_sc_field_0\" class=\"css_read_off_sc_field_0\" style=\"white-space: nowrap; " . $sStyleReadInp_sc_field_0 . "\">";
   echo " <span id=\"idAjaxSelect_sc_field_0\"><select class=\"sc-js-input scFormObjectOdd css_sc_field_0_obj\" style=\"\" id=\"id_sc_field_sc_field_0\" name=\"sc_field_0\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->sc_field_0) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->sc_field_0)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_0_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_0_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['jenis']))
   {
       $this->nm_new_label['jenis'] = "Jenis";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jenis = $this->jenis;
   $sStyleHidden_jenis = '';
   if (isset($this->nmgp_cmp_hidden['jenis']) && $this->nmgp_cmp_hidden['jenis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jenis']);
       $sStyleHidden_jenis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jenis = 'display: none;';
   $sStyleReadInp_jenis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jenis']) && $this->nmgp_cmp_readonly['jenis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jenis']);
       $sStyleReadLab_jenis = '';
       $sStyleReadInp_jenis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jenis']) && $this->nmgp_cmp_hidden['jenis'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="jenis" value="<?php echo $this->form_encode_input($this->jenis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_jenis_line" id="hidden_field_data_jenis" style="<?php echo $sStyleHidden_jenis; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_jenis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_jenis_label"><span id="id_label_jenis"><?php echo $this->nm_new_label['jenis']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jenis"]) &&  $this->nmgp_cmp_readonly["jenis"] == "on") { 

$jenis_look = "";
 if ($this->jenis == "Pasien Lama") { $jenis_look .= "Pasien Lama" ;} 
 if ($this->jenis == "Pasien Baru") { $jenis_look .= "Pasien Baru" ;} 
 if (empty($jenis_look)) { $jenis_look = $this->jenis; }
?>
<input type="hidden" name="jenis" value="<?php echo $this->form_encode_input($jenis) . "\">" . $jenis_look . ""; ?>
<?php } else { ?>
<?php

$jenis_look = "";
 if ($this->jenis == "Pasien Lama") { $jenis_look .= "Pasien Lama" ;} 
 if ($this->jenis == "Pasien Baru") { $jenis_look .= "Pasien Baru" ;} 
 if (empty($jenis_look)) { $jenis_look = $this->jenis; }
?>
<span id="id_read_on_jenis" class="css_jenis_line"  style="<?php echo $sStyleReadLab_jenis; ?>"><?php echo $this->form_encode_input($jenis_look); ?></span><span id="id_read_off_jenis" class="css_read_off_jenis" style="white-space: nowrap; <?php echo $sStyleReadInp_jenis; ?>">
 <span id="idAjaxSelect_jenis"><select class="sc-js-input scFormObjectOdd css_jenis_obj" style="" id="id_sc_field_jenis" name="jenis" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="Pasien Lama" <?php  if ($this->jenis == "Pasien Lama") { echo " selected" ;} ?>>Pasien Lama</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_jenis'][] = 'Pasien Lama'; ?>
 <option  value="Pasien Baru" <?php  if ($this->jenis == "Pasien Baru") { echo " selected" ;} ?>>Pasien Baru</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_jenis'][] = 'Pasien Baru'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jenis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jenis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['bayar']))
   {
       $this->nm_new_label['bayar'] = "Metode Pembayaran";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bayar = $this->bayar;
   $sStyleHidden_bayar = '';
   if (isset($this->nmgp_cmp_hidden['bayar']) && $this->nmgp_cmp_hidden['bayar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bayar']);
       $sStyleHidden_bayar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bayar = 'display: none;';
   $sStyleReadInp_bayar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bayar']) && $this->nmgp_cmp_readonly['bayar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bayar']);
       $sStyleReadLab_bayar = '';
       $sStyleReadInp_bayar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bayar']) && $this->nmgp_cmp_hidden['bayar'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="bayar" value="<?php echo $this->form_encode_input($this->bayar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_bayar_line" id="hidden_field_data_bayar" style="<?php echo $sStyleHidden_bayar; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bayar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_bayar_label"><span id="id_label_bayar"><?php echo $this->nm_new_label['bayar']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['php_cmp_required']['bayar']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['php_cmp_required']['bayar'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bayar"]) &&  $this->nmgp_cmp_readonly["bayar"] == "on") { 

$bayar_look = "";
 if ($this->bayar == "ASURANSI") { $bayar_look .= "ASURANSI" ;} 
 if ($this->bayar == "TUNAI") { $bayar_look .= "TUNAI" ;} 
 if ($this->bayar == "BPJS") { $bayar_look .= "BPJS" ;} 
 if ($this->bayar == "COB") { $bayar_look .= "COB" ;} 
 if ($this->bayar == "PAKET") { $bayar_look .= "PAKET" ;} 
 if ($this->bayar == "BANSOS") { $bayar_look .= "BANSOS" ;} 
 if ($this->bayar == "JAMPERU") { $bayar_look .= "JAMPERU" ;} 
 if ($this->bayar == "TUNAI PAKET") { $bayar_look .= "TUNAI PAKET" ;} 
 if ($this->bayar == "TUNAI PROMO") { $bayar_look .= "TUNAI PROMO" ;} 
 if (empty($bayar_look)) { $bayar_look = $this->bayar; }
?>
<input type="hidden" name="bayar" value="<?php echo $this->form_encode_input($bayar) . "\">" . $bayar_look . ""; ?>
<?php } else { ?>
<?php

$bayar_look = "";
 if ($this->bayar == "ASURANSI") { $bayar_look .= "ASURANSI" ;} 
 if ($this->bayar == "TUNAI") { $bayar_look .= "TUNAI" ;} 
 if ($this->bayar == "BPJS") { $bayar_look .= "BPJS" ;} 
 if ($this->bayar == "COB") { $bayar_look .= "COB" ;} 
 if ($this->bayar == "PAKET") { $bayar_look .= "PAKET" ;} 
 if ($this->bayar == "BANSOS") { $bayar_look .= "BANSOS" ;} 
 if ($this->bayar == "JAMPERU") { $bayar_look .= "JAMPERU" ;} 
 if ($this->bayar == "TUNAI PAKET") { $bayar_look .= "TUNAI PAKET" ;} 
 if ($this->bayar == "TUNAI PROMO") { $bayar_look .= "TUNAI PROMO" ;} 
 if (empty($bayar_look)) { $bayar_look = $this->bayar; }
?>
<span id="id_read_on_bayar" class="css_bayar_line"  style="<?php echo $sStyleReadLab_bayar; ?>"><?php echo $this->form_encode_input($bayar_look); ?></span><span id="id_read_off_bayar" class="css_read_off_bayar" style="white-space: nowrap; <?php echo $sStyleReadInp_bayar; ?>">
 <span id="idAjaxSelect_bayar"><select class="sc-js-input scFormObjectOdd css_bayar_obj" style="" id="id_sc_field_bayar" name="bayar" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_bayar'][] = ''; ?>
 <option value=""></option>
 <option  value="ASURANSI" <?php  if ($this->bayar == "ASURANSI") { echo " selected" ;} ?>>ASURANSI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_bayar'][] = 'ASURANSI'; ?>
 <option  value="TUNAI" <?php  if ($this->bayar == "TUNAI") { echo " selected" ;} ?>>TUNAI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_bayar'][] = 'TUNAI'; ?>
 <option  value="BPJS" <?php  if ($this->bayar == "BPJS") { echo " selected" ;} ?>>BPJS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_bayar'][] = 'BPJS'; ?>
 <option  value="COB" <?php  if ($this->bayar == "COB") { echo " selected" ;} ?>>COB</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_bayar'][] = 'COB'; ?>
 <option  value="PAKET" <?php  if ($this->bayar == "PAKET") { echo " selected" ;} ?>>PAKET</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_bayar'][] = 'PAKET'; ?>
 <option  value="BANSOS" <?php  if ($this->bayar == "BANSOS") { echo " selected" ;} ?>>BANSOS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_bayar'][] = 'BANSOS'; ?>
 <option  value="JAMPERU" <?php  if ($this->bayar == "JAMPERU") { echo " selected" ;} ?>>JAMPERU</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_bayar'][] = 'JAMPERU'; ?>
 <option  value="TUNAI PAKET" <?php  if ($this->bayar == "TUNAI PAKET") { echo " selected" ;} ?>>TUNAI PAKET</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_bayar'][] = 'TUNAI PAKET'; ?>
 <option  value="TUNAI PROMO" <?php  if ($this->bayar == "TUNAI PROMO") { echo " selected" ;} ?>>TUNAI PROMO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_bayar'][] = 'TUNAI PROMO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bayar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bayar_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['instno']))
    {
        $this->nm_new_label['instno'] = "No Kartu";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $instno = $this->instno;
   $sStyleHidden_instno = '';
   if (isset($this->nmgp_cmp_hidden['instno']) && $this->nmgp_cmp_hidden['instno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['instno']);
       $sStyleHidden_instno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_instno = 'display: none;';
   $sStyleReadInp_instno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['instno']) && $this->nmgp_cmp_readonly['instno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['instno']);
       $sStyleReadLab_instno = '';
       $sStyleReadInp_instno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['instno']) && $this->nmgp_cmp_hidden['instno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="instno" value="<?php echo $this->form_encode_input($instno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_instno_line" id="hidden_field_data_instno" style="<?php echo $sStyleHidden_instno; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_instno_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_instno_label"><span id="id_label_instno"><?php echo $this->nm_new_label['instno']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["instno"]) &&  $this->nmgp_cmp_readonly["instno"] == "on") { 

 ?>
<input type="hidden" name="instno" value="<?php echo $this->form_encode_input($instno) . "\">" . $instno . ""; ?>
<?php } else { ?>
<span id="id_read_on_instno" class="sc-ui-readonly-instno css_instno_line" style="<?php echo $sStyleReadLab_instno; ?>"><?php echo $this->instno; ?></span><span id="id_read_off_instno" class="css_read_off_instno" style="white-space: nowrap;<?php echo $sStyleReadInp_instno; ?>">
 <input class="sc-js-input scFormObjectOdd css_instno_obj" style="" id="id_sc_field_instno" type=text name="instno" value="<?php echo $this->form_encode_input($instno) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_instno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_instno_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['instexpiry']))
    {
        $this->nm_new_label['instexpiry'] = "Masa Berlaku";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $instexpiry = $this->instexpiry;
   $sStyleHidden_instexpiry = '';
   if (isset($this->nmgp_cmp_hidden['instexpiry']) && $this->nmgp_cmp_hidden['instexpiry'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['instexpiry']);
       $sStyleHidden_instexpiry = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_instexpiry = 'display: none;';
   $sStyleReadInp_instexpiry = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['instexpiry']) && $this->nmgp_cmp_readonly['instexpiry'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['instexpiry']);
       $sStyleReadLab_instexpiry = '';
       $sStyleReadInp_instexpiry = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['instexpiry']) && $this->nmgp_cmp_hidden['instexpiry'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="instexpiry" value="<?php echo $this->form_encode_input($instexpiry) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_instexpiry_line" id="hidden_field_data_instexpiry" style="<?php echo $sStyleHidden_instexpiry; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_instexpiry_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_instexpiry_label"><span id="id_label_instexpiry"><?php echo $this->nm_new_label['instexpiry']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["instexpiry"]) &&  $this->nmgp_cmp_readonly["instexpiry"] == "on") { 

 ?>
<input type="hidden" name="instexpiry" value="<?php echo $this->form_encode_input($instexpiry) . "\">" . $instexpiry . ""; ?>
<?php } else { ?>
<span id="id_read_on_instexpiry" class="sc-ui-readonly-instexpiry css_instexpiry_line" style="<?php echo $sStyleReadLab_instexpiry; ?>"><?php echo $instexpiry; ?></span><span id="id_read_off_instexpiry" class="css_read_off_instexpiry" style="white-space: nowrap;<?php echo $sStyleReadInp_instexpiry; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_instexpiry_obj" style="" id="id_sc_field_instexpiry" type=text name="instexpiry" value="<?php echo $this->form_encode_input($instexpiry) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['instexpiry']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['instexpiry']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['instexpiry']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_instexpiry_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_instexpiry_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['inst']))
   {
       $this->nm_new_label['inst'] = "Penjamin";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $inst = $this->inst;
   $sStyleHidden_inst = '';
   if (isset($this->nmgp_cmp_hidden['inst']) && $this->nmgp_cmp_hidden['inst'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['inst']);
       $sStyleHidden_inst = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_inst = 'display: none;';
   $sStyleReadInp_inst = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['inst']) && $this->nmgp_cmp_readonly['inst'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['inst']);
       $sStyleReadLab_inst = '';
       $sStyleReadInp_inst = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['inst']) && $this->nmgp_cmp_hidden['inst'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="inst" value="<?php echo $this->form_encode_input($this->inst) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_inst_line" id="hidden_field_data_inst" style="<?php echo $sStyleHidden_inst; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_inst_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_inst_label"><span id="id_label_inst"><?php echo $this->nm_new_label['inst']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inst"]) &&  $this->nmgp_cmp_readonly["inst"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_inst']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_inst'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_inst']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_inst'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_inst']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_inst'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_inst']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_inst'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT name, name  FROM tbinstansi  ORDER BY name";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_inst'][] = $rs->fields[0];
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
   $inst_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->inst_1))
          {
              foreach ($this->inst_1 as $tmp_inst)
              {
                  if (trim($tmp_inst) === trim($cadaselect[1])) { $inst_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->inst) === trim($cadaselect[1])) { $inst_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="inst" value="<?php echo $this->form_encode_input($inst) . "\">" . $inst_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_inst();
   $x = 0 ; 
   $inst_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->inst_1))
          {
              foreach ($this->inst_1 as $tmp_inst)
              {
                  if (trim($tmp_inst) === trim($cadaselect[1])) { $inst_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->inst) === trim($cadaselect[1])) { $inst_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($inst_look))
          {
              $inst_look = $this->inst;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_inst\" class=\"css_inst_line\" style=\"" .  $sStyleReadLab_inst . "\">" . $this->form_encode_input($inst_look) . "</span><span id=\"id_read_off_inst\" class=\"css_read_off_inst\" style=\"white-space: nowrap; " . $sStyleReadInp_inst . "\">";
   echo " <span id=\"idAjaxSelect_inst\"><select class=\"sc-js-input scFormObjectOdd css_inst_obj\" style=\"\" id=\"id_sc_field_inst\" name=\"inst\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_inst'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->inst) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->inst)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inst_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inst_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['instcode']))
   {
       $this->nm_new_label['instcode'] = "Kode Instansi";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $instcode = $this->instcode;
   $sStyleHidden_instcode = '';
   if (isset($this->nmgp_cmp_hidden['instcode']) && $this->nmgp_cmp_hidden['instcode'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['instcode']);
       $sStyleHidden_instcode = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_instcode = 'display: none;';
   $sStyleReadInp_instcode = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['instcode']) && $this->nmgp_cmp_readonly['instcode'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['instcode']);
       $sStyleReadLab_instcode = '';
       $sStyleReadInp_instcode = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['instcode']) && $this->nmgp_cmp_hidden['instcode'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="instcode" value="<?php echo $this->form_encode_input($this->instcode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_instcode_line" id="hidden_field_data_instcode" style="<?php echo $sStyleHidden_instcode; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_instcode_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_instcode_label"><span id="id_label_instcode"><?php echo $this->nm_new_label['instcode']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["instcode"]) &&  $this->nmgp_cmp_readonly["instcode"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_instcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_instcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_instcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_instcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_instcode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_instcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_instcode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_instcode'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT instCode, instCode FROM tbinstansi WHERE name = '$this->inst' ORDER BY instCode";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian_mob']['Lookup_instcode'][] = $rs->fields[0];
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
   $instcode_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->instcode_1))
          {
              foreach ($this->instcode_1 as $tmp_instcode)
              {
                  if (trim($tmp_instcode) === trim($cadaselect[1])) { $instcode_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->instcode) === trim($cadaselect[1])) { $instcode_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="instcode" value="<?php echo $this->form_encode_input($instcode) . "\">" . $instcode_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_instcode();
   $x = 0 ; 
   $instcode_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->instcode_1))
          {
              foreach ($this->instcode_1 as $tmp_instcode)
              {
                  if (trim($tmp_instcode) === trim($cadaselect[1])) { $instcode_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->instcode) === trim($cadaselect[1])) { $instcode_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($instcode_look))
          {
              $instcode_look = $this->instcode;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_instcode\" class=\"css_instcode_line\" style=\"" .  $sStyleReadLab_instcode . "\">" . $this->form_encode_input($instcode_look) . "</span><span id=\"id_read_off_instcode\" class=\"css_read_off_instcode\" style=\"white-space: nowrap; " . $sStyleReadInp_instcode . "\">";
   echo " <span id=\"idAjaxSelect_instcode\"><select class=\"sc-js-input scFormObjectOdd css_instcode_obj\" style=\"\" id=\"id_sc_field_instcode\" name=\"instcode\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->instcode) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->instcode)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_instcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_instcode_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_hta_line" id="hidden_field_data_hta" style="<?php echo $sStyleHidden_hta; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hta_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hta_label"><span id="id_label_hta"><?php echo $this->nm_new_label['hta']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hta"]) &&  $this->nmgp_cmp_readonly["hta"] == "on") { 

 ?>
<input type="hidden" name="hta" value="<?php echo $this->form_encode_input($hta) . "\">" . $hta . ""; ?>
<?php } else { ?>
<span id="id_read_on_hta" class="sc-ui-readonly-hta css_hta_line" style="<?php echo $sStyleReadLab_hta; ?>"><?php echo $hta; ?></span><span id="id_read_off_hta" class="css_read_off_hta" style="white-space: nowrap;<?php echo $sStyleReadInp_hta; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_hta_obj" style="" id="id_sc_field_hta" type=text name="hta" value="<?php echo $this->form_encode_input($hta) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['hta']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['hta']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hta_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tp']))
    {
        $this->nm_new_label['tp'] = "Taksiran Persalinan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tp = $this->tp;
   $sStyleHidden_tp = '';
   if (isset($this->nmgp_cmp_hidden['tp']) && $this->nmgp_cmp_hidden['tp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tp']);
       $sStyleHidden_tp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tp = 'display: none;';
   $sStyleReadInp_tp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tp']) && $this->nmgp_cmp_readonly['tp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tp']);
       $sStyleReadLab_tp = '';
       $sStyleReadInp_tp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tp']) && $this->nmgp_cmp_hidden['tp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tp" value="<?php echo $this->form_encode_input($tp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tp_line" id="hidden_field_data_tp" style="<?php echo $sStyleHidden_tp; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tp_label"><span id="id_label_tp"><?php echo $this->nm_new_label['tp']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tp"]) &&  $this->nmgp_cmp_readonly["tp"] == "on") { 

 ?>
<input type="hidden" name="tp" value="<?php echo $this->form_encode_input($tp) . "\">" . $tp . ""; ?>
<?php } else { ?>
<span id="id_read_on_tp" class="sc-ui-readonly-tp css_tp_line" style="<?php echo $sStyleReadLab_tp; ?>"><?php echo $this->tp; ?></span><span id="id_read_off_tp" class="css_read_off_tp" style="white-space: nowrap;<?php echo $sStyleReadInp_tp; ?>">
 <input class="sc-js-input scFormObjectOdd css_tp_obj" style="" id="id_sc_field_tp" type=text name="tp" value="<?php echo $this->form_encode_input($tp) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['uk']))
    {
        $this->nm_new_label['uk'] = "Usia Kehamilan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $uk = $this->uk;
   $sStyleHidden_uk = '';
   if (isset($this->nmgp_cmp_hidden['uk']) && $this->nmgp_cmp_hidden['uk'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['uk']);
       $sStyleHidden_uk = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_uk = 'display: none;';
   $sStyleReadInp_uk = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['uk']) && $this->nmgp_cmp_readonly['uk'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['uk']);
       $sStyleReadLab_uk = '';
       $sStyleReadInp_uk = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['uk']) && $this->nmgp_cmp_hidden['uk'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="uk" value="<?php echo $this->form_encode_input($uk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_uk_line" id="hidden_field_data_uk" style="<?php echo $sStyleHidden_uk; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_uk_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_uk_label"><span id="id_label_uk"><?php echo $this->nm_new_label['uk']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["uk"]) &&  $this->nmgp_cmp_readonly["uk"] == "on") { 

 ?>
<input type="hidden" name="uk" value="<?php echo $this->form_encode_input($uk) . "\">" . $uk . ""; ?>
<?php } else { ?>
<span id="id_read_on_uk" class="sc-ui-readonly-uk css_uk_line" style="<?php echo $sStyleReadLab_uk; ?>"><?php echo $this->uk; ?></span><span id="id_read_off_uk" class="css_read_off_uk" style="white-space: nowrap;<?php echo $sStyleReadInp_uk; ?>">
 <input class="sc-js-input scFormObjectOdd css_uk_obj" style="" id="id_sc_field_uk" type=text name="uk" value="<?php echo $this->form_encode_input($uk) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_uk_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_uk_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['struckno']))
    {
        $this->nm_new_label['struckno'] = "No Struk";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $struckno = $this->struckno;
   if (!isset($this->nmgp_cmp_hidden['struckno']))
   {
       $this->nmgp_cmp_hidden['struckno'] = 'off';
   }
   $sStyleHidden_struckno = '';
   if (isset($this->nmgp_cmp_hidden['struckno']) && $this->nmgp_cmp_hidden['struckno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['struckno']);
       $sStyleHidden_struckno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_struckno = 'display: none;';
   $sStyleReadInp_struckno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['struckno']) && $this->nmgp_cmp_readonly['struckno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['struckno']);
       $sStyleReadLab_struckno = '';
       $sStyleReadInp_struckno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['struckno']) && $this->nmgp_cmp_hidden['struckno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="struckno" value="<?php echo $this->form_encode_input($struckno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_struckno_line" id="hidden_field_data_struckno" style="<?php echo $sStyleHidden_struckno; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_struckno_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_struckno_label"><span id="id_label_struckno"><?php echo $this->nm_new_label['struckno']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["struckno"]) &&  $this->nmgp_cmp_readonly["struckno"] == "on") { 

 ?>
<input type="hidden" name="struckno" value="<?php echo $this->form_encode_input($struckno) . "\">" . $struckno . ""; ?>
<?php } else { ?>
<span id="id_read_on_struckno" class="sc-ui-readonly-struckno css_struckno_line" style="<?php echo $sStyleReadLab_struckno; ?>"><?php echo $this->struckno; ?></span><span id="id_read_off_struckno" class="css_read_off_struckno" style="white-space: nowrap;<?php echo $sStyleReadInp_struckno; ?>">
 <input class="sc-js-input scFormObjectOdd css_struckno_obj" style="" id="id_sc_field_struckno" type=text name="struckno" value="<?php echo $this->form_encode_input($struckno) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_struckno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_struckno_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id']))
           {
               $this->nmgp_cmp_readonly['id'] = 'on';
           }
?>






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
