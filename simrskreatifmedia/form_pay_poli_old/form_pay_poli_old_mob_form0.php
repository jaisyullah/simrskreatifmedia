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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Pembayaran RJ"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Pembayaran RJ"); } ?></TITLE>
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
.css_read_off_paiddate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_trandate button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_pay_poli_old/form_pay_poli_old_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_pay_poli_old_mob_sajax_js.php");
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
     if (F_name == "trancode")
     {
        $('input[name="trancode"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="trancode"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="trancode"]').removeClass("scFormInputDisabled");
        }
        $('input[id="cap_trancode"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('#cap_trancode').hide();
        }
        else {
            $('#cap_trancode').show();
        }
     }
     if (F_name == "nostruk")
     {
        $('select[name="nostruk"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="nostruk"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="nostruk"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "custcode")
     {
        $('select[name="custcode"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="custcode"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="custcode"]').removeClass("scFormInputDisabled");
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
     if (F_name == "dokter")
     {
        $('select[name="dokter"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="dokter"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="dokter"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "jmltagihan")
     {
        $('input[name="jmltagihan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="jmltagihan"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="jmltagihan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "jmlbayar")
     {
        $('input[name="jmlbayar"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="jmlbayar"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="jmlbayar"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "potongan")
     {
        $('input[name="potongan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="potongan"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="potongan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "hrsdibayar")
     {
        $('input[name="hrsdibayar"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="hrsdibayar"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="hrsdibayar"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "nopayment")
     {
        $('input[name="nopayment"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="nopayment"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="nopayment"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "kasir")
     {
        $('input[name="kasir"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="kasir"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="kasir"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_pay_poli_old_mob_jquery.php');

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

  addAutocomplete(this);

  $("#hidden_bloco_0,#hidden_bloco_1,#hidden_bloco_2").each(function() {
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
    "hidden_bloco_0": true,
    "hidden_bloco_1": true,
    "hidden_bloco_2": true
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
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_tbtindakanrawatjalan", $($("#nmsc_iframe_liga_form_tbtindakanrawatjalan")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbtindakanrawatjalan")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbtindakanrawatjalan")[0].contentWindow.scQuickSearchInit(false, '');
      }
      scAjaxDetailHeight("form_tbreseprawatjalan", $($("#nmsc_iframe_liga_form_tbreseprawatjalan")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbreseprawatjalan")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbreseprawatjalan")[0].contentWindow.scQuickSearchInit(false, '');
      }
      scAjaxDetailHeight("form_detailadm", $($("#nmsc_iframe_liga_form_detailadm")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_detailadm")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_detailadm")[0].contentWindow.scQuickSearchInit(false, '');
      }
      scAjaxDetailHeight("form_tbrujukanlab", "500");
      if (typeof $("#nmsc_iframe_liga_form_tbrujukanlab")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbrujukanlab")[0].contentWindow.scQuickSearchInit(false, '');
      }
      scAjaxDetailHeight("form_tbrujukanradiologi", "500");
      if (typeof $("#nmsc_iframe_liga_form_tbrujukanradiologi")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbrujukanradiologi")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_4" == block_id) {
      scAjaxDetailHeight("form_tbbhprawatjalan", $($("#nmsc_iframe_liga_form_tbbhprawatjalan")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbbhprawatjalan")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbbhprawatjalan")[0].contentWindow.scQuickSearchInit(false, '');
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

 function addAutocomplete(elem) {


  $(".sc-ui-autocomp-instansipenjamin", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "instansipenjamin" != sId ? sId.substr(16) : "";
   if ("" == $(this).val()) {
    $("#id_sc_field_" + sId).val("");
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).select2({
   minimumInputLength: 1,
   language: {
    inputTooShort: function() {
     return "<?php echo sprintf($this->Ini->Nm_lang['lang_autocomp_tooshort'], 1) ?>";
    },
    noResults: function() {
     return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
    },
    searching: function() {
     return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
    }
   },
   width: "300px",
   ajax: {
    url: "form_pay_poli_old_mob.php",
    dataType: "json",
    processResults: function (data) {
      if (data == "ss_time_out") {
          nm_move('novo');
      }
      return data;
    },
    data: function (params) {
     var query = {
      term: params.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_instansipenjamin",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "instansipenjamin" != sId ? sId.substr(16) : "";
   sc_form_pay_poli_old_mob_instansipenjamin_onfocus("id_sc_field_" + sId, sRow);
  }).on("select2:close", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("blur");
  }).on("select2:select", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).val(e.params.data.id);
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_pay_poli_old']['error_buffer']) && '' != $_SESSION['scriptcase']['form_pay_poli_old']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_pay_poli_old']['error_buffer'];
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
 include_once("form_pay_poli_old_mob_js0.php");
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
               action="form_pay_poli_old_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_pay_poli_old_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_pay_poli_old_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Pembayaran RJ"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Pembayaran RJ"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['fast_search'][2] : "";
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
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-15", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-16", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_sai_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-17", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-18", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-19", "", "group_2");?>
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
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "scBtnFn_sys_format_copy()", "scBtnFn_sys_format_copy()", "sc_b_clone_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-21", "", "group_2");?>
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-22", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-23", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-24", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-25", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-26", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id']))
   {
       $this->nmgp_cmp_hidden['id'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['deposit']))
   {
       $this->nmgp_cmp_hidden['deposit'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['potongan']))
   {
       $this->nmgp_cmp_hidden['potongan'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['jmldk1']))
   {
       $this->nmgp_cmp_hidden['jmldk1'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['jmldk2']))
   {
       $this->nmgp_cmp_hidden['jmldk2'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['jmlasr']))
   {
       $this->nmgp_cmp_hidden['jmlasr'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['jmlkary']))
   {
       $this->nmgp_cmp_hidden['jmlkary'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id']))
           {
               $this->nmgp_cmp_readonly['id'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>INFO PASIEN<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
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

    <TD class="scFormDataOdd css_id_line" id="hidden_field_data_id" style="<?php echo $sStyleHidden_id; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_label"><span id="id_label_id"><?php echo $this->nm_new_label['id']; ?></span></span><br><span id="id_read_on_id" class="css_id_line" style="<?php echo $sStyleReadLab_id; ?>"><?php echo $this->form_encode_input($this->id); ?></span><span id="id_read_off_id" class="css_read_off_id" style="<?php echo $sStyleReadInp_id; ?>"><input type="hidden" name="id" value="<?php echo $this->form_encode_input($id) . "\">"?><span id="id_ajax_label_id"><?php echo nl2br($id); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['trancode']))
    {
        $this->nm_new_label['trancode'] = "Kode Transaksi";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $trancode = $this->trancode;
   $sStyleHidden_trancode = '';
   if (isset($this->nmgp_cmp_hidden['trancode']) && $this->nmgp_cmp_hidden['trancode'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['trancode']);
       $sStyleHidden_trancode = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_trancode = 'display: none;';
   $sStyleReadInp_trancode = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['trancode']) && $this->nmgp_cmp_readonly['trancode'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['trancode']);
       $sStyleReadLab_trancode = '';
       $sStyleReadInp_trancode = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['trancode']) && $this->nmgp_cmp_hidden['trancode'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="trancode" value="<?php echo $this->form_encode_input($trancode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_trancode_line" id="hidden_field_data_trancode" style="<?php echo $sStyleHidden_trancode; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_trancode_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_trancode_label"><span id="id_label_trancode"><?php echo $this->nm_new_label['trancode']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["trancode"]) &&  $this->nmgp_cmp_readonly["trancode"] == "on") { 

 ?>
<input type="hidden" name="trancode" value="<?php echo $this->form_encode_input($trancode) . "\">" . $trancode . ""; ?>
<?php } else { ?>
<span id="id_read_on_trancode" class="sc-ui-readonly-trancode css_trancode_line" style="<?php echo $sStyleReadLab_trancode; ?>"><?php echo $this->trancode; ?></span><span id="id_read_off_trancode" class="css_read_off_trancode" style="white-space: nowrap;<?php echo $sStyleReadInp_trancode; ?>">
 <input class="sc-js-input scFormObjectOdd css_trancode_obj" style="" id="id_sc_field_trancode" type=text name="trancode" value="<?php echo $this->form_encode_input($trancode) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_pay_poli_old_mob*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_select_payment"]) && $this->Ini->sc_lig_md5["grid_select_payment"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,trancode,kode*scoutnm_evt_ret_busca*scinsc_form_pay_poli_old_trancode_onchange(this)*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_pay_poli_old_mob@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,trancode,kode*scoutnm_evt_ret_busca*scinsc_form_pay_poli_old_trancode_onchange(this)*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_select_payment_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_select_payment_cons_psq. "', '" . $Md5_Lig . "')", "cap_trancode", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trancode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trancode_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['nostruk']))
   {
       $this->nm_new_label['nostruk'] = "No Struk";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nostruk = $this->nostruk;
   $sStyleHidden_nostruk = '';
   if (isset($this->nmgp_cmp_hidden['nostruk']) && $this->nmgp_cmp_hidden['nostruk'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nostruk']);
       $sStyleHidden_nostruk = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nostruk = 'display: none;';
   $sStyleReadInp_nostruk = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nostruk']) && $this->nmgp_cmp_readonly['nostruk'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nostruk']);
       $sStyleReadLab_nostruk = '';
       $sStyleReadInp_nostruk = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nostruk']) && $this->nmgp_cmp_hidden['nostruk'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="nostruk" value="<?php echo $this->form_encode_input($this->nostruk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nostruk_line" id="hidden_field_data_nostruk" style="<?php echo $sStyleHidden_nostruk; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nostruk_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nostruk_label"><span id="id_label_nostruk"><?php echo $this->nm_new_label['nostruk']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nostruk"]) &&  $this->nmgp_cmp_readonly["nostruk"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_nostruk']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_nostruk'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_nostruk']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_nostruk'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_nostruk']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_nostruk'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_nostruk']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_nostruk'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT noStruk, noStruk  FROM tbdetailrawatjalan  WHERE tranCode = '$this->trancode' ORDER BY noStruk";

   $this->id = $old_value_id;
   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[1] = str_replace(',', '.', $rs->fields[1]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[1] = (strpos(strtolower($rs->fields[1]), "e")) ? (float)$rs->fields[1] : $rs->fields[1];
              $rs->fields[1] = (string)$rs->fields[1];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_nostruk'][] = $rs->fields[0];
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
   $nostruk_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->nostruk_1))
          {
              foreach ($this->nostruk_1 as $tmp_nostruk)
              {
                  if (trim($tmp_nostruk) === trim($cadaselect[1])) { $nostruk_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->nostruk) === trim($cadaselect[1])) { $nostruk_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="nostruk" value="<?php echo $this->form_encode_input($nostruk) . "\">" . $nostruk_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_nostruk();
   $x = 0 ; 
   $nostruk_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->nostruk_1))
          {
              foreach ($this->nostruk_1 as $tmp_nostruk)
              {
                  if (trim($tmp_nostruk) === trim($cadaselect[1])) { $nostruk_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->nostruk) === trim($cadaselect[1])) { $nostruk_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($nostruk_look))
          {
              $nostruk_look = $this->nostruk;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_nostruk\" class=\"css_nostruk_line\" style=\"" .  $sStyleReadLab_nostruk . "\">" . $this->form_encode_input($nostruk_look) . "</span><span id=\"id_read_off_nostruk\" class=\"css_read_off_nostruk\" style=\"white-space: nowrap; " . $sStyleReadInp_nostruk . "\">";
   echo " <span id=\"idAjaxSelect_nostruk\"><select class=\"sc-js-input scFormObjectOdd css_nostruk_obj\" style=\"\" id=\"id_sc_field_nostruk\" name=\"nostruk\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->nostruk) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->nostruk)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nostruk_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nostruk_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['custcode']))
   {
       $this->nm_new_label['custcode'] = "No. RM";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['custcode']) && $this->nmgp_cmp_hidden['custcode'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="custcode" value="<?php echo $this->form_encode_input($this->custcode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_custcode_line" id="hidden_field_data_custcode" style="<?php echo $sStyleHidden_custcode; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_custcode_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_custcode_label"><span id="id_label_custcode"><?php echo $this->nm_new_label['custcode']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["custcode"]) &&  $this->nmgp_cmp_readonly["custcode"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_custcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_custcode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_custcode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_custcode'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT custCode FROM tbdetailrawatjalan where tranCode = '$this->trancode' ORDER BY custCode";

   $this->id = $old_value_id;
   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_custcode'][] = $rs->fields[0];
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
   $custcode_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->custcode_1))
          {
              foreach ($this->custcode_1 as $tmp_custcode)
              {
                  if (trim($tmp_custcode) === trim($cadaselect[1])) { $custcode_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->custcode) === trim($cadaselect[1])) { $custcode_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="custcode" value="<?php echo $this->form_encode_input($custcode) . "\">" . $custcode_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_custcode();
   $x = 0 ; 
   $custcode_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->custcode_1))
          {
              foreach ($this->custcode_1 as $tmp_custcode)
              {
                  if (trim($tmp_custcode) === trim($cadaselect[1])) { $custcode_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->custcode) === trim($cadaselect[1])) { $custcode_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($custcode_look))
          {
              $custcode_look = $this->custcode;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_custcode\" class=\"css_custcode_line\" style=\"" .  $sStyleReadLab_custcode . "\">" . $this->form_encode_input($custcode_look) . "</span><span id=\"id_read_off_custcode\" class=\"css_read_off_custcode\" style=\"white-space: nowrap; " . $sStyleReadInp_custcode . "\">";
   echo " <span id=\"idAjaxSelect_custcode\"><select class=\"sc-js-input scFormObjectOdd css_custcode_obj\" style=\"\" id=\"id_sc_field_custcode\" name=\"custcode\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->custcode) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->custcode)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_custcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_custcode_text"></span></td></tr></table></td></tr></table> </TD>
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
       $this->nm_new_label['sc_field_1'] = "Nama Pasien";
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_sc_field_1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_sc_field_1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_sc_field_1'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_sc_field_1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_sc_field_1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_sc_field_1'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,', ', salut)  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&', '&salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }

   $this->id = $old_value_id;
   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_sc_field_1'][] = $rs->fields[0];
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
   if (!isset($this->nm_new_label['dokter']))
   {
       $this->nm_new_label['dokter'] = "Dokter";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dokter = $this->dokter;
   $sStyleHidden_dokter = '';
   if (isset($this->nmgp_cmp_hidden['dokter']) && $this->nmgp_cmp_hidden['dokter'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dokter']);
       $sStyleHidden_dokter = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dokter = 'display: none;';
   $sStyleReadInp_dokter = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dokter']) && $this->nmgp_cmp_readonly['dokter'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dokter']);
       $sStyleReadLab_dokter = '';
       $sStyleReadInp_dokter = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dokter']) && $this->nmgp_cmp_hidden['dokter'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="dokter" value="<?php echo $this->form_encode_input($this->dokter) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dokter_line" id="hidden_field_data_dokter" style="<?php echo $sStyleHidden_dokter; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dokter_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dokter_label"><span id="id_label_dokter"><?php echo $this->nm_new_label['dokter']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dokter"]) &&  $this->nmgp_cmp_readonly["dokter"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_dokter']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_dokter'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_dokter']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_dokter'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_dokter']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_dokter'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_dokter']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_dokter'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "select dokter as kode, concat(gelar,' ', name,', ', spec) as dokter from tbdetailrawatjalan a left join tbdoctor b on b.docCode = a.dokter where a.tranCode = '$this->trancode'";

   $this->id = $old_value_id;
   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_dokter'][] = $rs->fields[0];
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
   $dokter_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->dokter_1))
          {
              foreach ($this->dokter_1 as $tmp_dokter)
              {
                  if (trim($tmp_dokter) === trim($cadaselect[1])) { $dokter_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->dokter) === trim($cadaselect[1])) { $dokter_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="dokter" value="<?php echo $this->form_encode_input($dokter) . "\">" . $dokter_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_dokter();
   $x = 0 ; 
   $dokter_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->dokter_1))
          {
              foreach ($this->dokter_1 as $tmp_dokter)
              {
                  if (trim($tmp_dokter) === trim($cadaselect[1])) { $dokter_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->dokter) === trim($cadaselect[1])) { $dokter_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($dokter_look))
          {
              $dokter_look = $this->dokter;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_dokter\" class=\"css_dokter_line\" style=\"" .  $sStyleReadLab_dokter . "\">" . $this->form_encode_input($dokter_look) . "</span><span id=\"id_read_off_dokter\" class=\"css_read_off_dokter\" style=\"white-space: nowrap; " . $sStyleReadInp_dokter . "\">";
   echo " <span id=\"idAjaxSelect_dokter\"><select class=\"sc-js-input scFormObjectOdd css_dokter_obj\" style=\"\" id=\"id_sc_field_dokter\" name=\"dokter\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->dokter) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->dokter)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dokter_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dokter_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_dokter_dumb = ('' == $sStyleHidden_dokter) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_dokter_dumb" style="<?php echo $sStyleHidden_dokter_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>TAGIHAN & BAYAR<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['jmltagihan']))
    {
        $this->nm_new_label['jmltagihan'] = "Total Tagihan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jmltagihan = $this->jmltagihan;
   $sStyleHidden_jmltagihan = '';
   if (isset($this->nmgp_cmp_hidden['jmltagihan']) && $this->nmgp_cmp_hidden['jmltagihan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jmltagihan']);
       $sStyleHidden_jmltagihan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jmltagihan = 'display: none;';
   $sStyleReadInp_jmltagihan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jmltagihan']) && $this->nmgp_cmp_readonly['jmltagihan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jmltagihan']);
       $sStyleReadLab_jmltagihan = '';
       $sStyleReadInp_jmltagihan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jmltagihan']) && $this->nmgp_cmp_hidden['jmltagihan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jmltagihan" value="<?php echo $this->form_encode_input($jmltagihan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_jmltagihan_line" id="hidden_field_data_jmltagihan" style="<?php echo $sStyleHidden_jmltagihan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_jmltagihan_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_jmltagihan_label"><span id="id_label_jmltagihan"><?php echo $this->nm_new_label['jmltagihan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jmltagihan"]) &&  $this->nmgp_cmp_readonly["jmltagihan"] == "on") { 

 ?>
<input type="hidden" name="jmltagihan" value="<?php echo $this->form_encode_input($jmltagihan) . "\">" . $jmltagihan . ""; ?>
<?php } else { ?>
<span id="id_read_on_jmltagihan" class="sc-ui-readonly-jmltagihan css_jmltagihan_line" style="<?php echo $sStyleReadLab_jmltagihan; ?>"><?php echo $this->jmltagihan; ?></span><span id="id_read_off_jmltagihan" class="css_read_off_jmltagihan" style="white-space: nowrap;<?php echo $sStyleReadInp_jmltagihan; ?>">
 <input class="sc-js-input scFormObjectOdd css_jmltagihan_obj" style="" id="id_sc_field_jmltagihan" type=text name="jmltagihan" value="<?php echo $this->form_encode_input($jmltagihan) ?>"
 size=15 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['jmltagihan']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['jmltagihan']['format_pos'] || 3 == $this->field_config['jmltagihan']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 8, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['jmltagihan']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['jmltagihan']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['jmltagihan']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['jmltagihan']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jmltagihan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jmltagihan_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['jmlbayar']))
    {
        $this->nm_new_label['jmlbayar'] = "Total Dibayar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jmlbayar = $this->jmlbayar;
   $sStyleHidden_jmlbayar = '';
   if (isset($this->nmgp_cmp_hidden['jmlbayar']) && $this->nmgp_cmp_hidden['jmlbayar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jmlbayar']);
       $sStyleHidden_jmlbayar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jmlbayar = 'display: none;';
   $sStyleReadInp_jmlbayar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jmlbayar']) && $this->nmgp_cmp_readonly['jmlbayar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jmlbayar']);
       $sStyleReadLab_jmlbayar = '';
       $sStyleReadInp_jmlbayar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jmlbayar']) && $this->nmgp_cmp_hidden['jmlbayar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jmlbayar" value="<?php echo $this->form_encode_input($jmlbayar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_jmlbayar_line" id="hidden_field_data_jmlbayar" style="<?php echo $sStyleHidden_jmlbayar; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_jmlbayar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_jmlbayar_label"><span id="id_label_jmlbayar"><?php echo $this->nm_new_label['jmlbayar']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jmlbayar"]) &&  $this->nmgp_cmp_readonly["jmlbayar"] == "on") { 

 ?>
<input type="hidden" name="jmlbayar" value="<?php echo $this->form_encode_input($jmlbayar) . "\">" . $jmlbayar . ""; ?>
<?php } else { ?>
<span id="id_read_on_jmlbayar" class="sc-ui-readonly-jmlbayar css_jmlbayar_line" style="<?php echo $sStyleReadLab_jmlbayar; ?>"><?php echo $this->jmlbayar; ?></span><span id="id_read_off_jmlbayar" class="css_read_off_jmlbayar" style="white-space: nowrap;<?php echo $sStyleReadInp_jmlbayar; ?>">
 <input class="sc-js-input scFormObjectOdd css_jmlbayar_obj" style="" id="id_sc_field_jmlbayar" type=text name="jmlbayar" value="<?php echo $this->form_encode_input($jmlbayar) ?>"
 size=15 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['jmlbayar']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['jmlbayar']['format_pos'] || 3 == $this->field_config['jmlbayar']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 8, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['jmlbayar']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['jmlbayar']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['jmlbayar']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['jmlbayar']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jmlbayar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jmlbayar_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['jmldk1']))
    {
        $this->nm_new_label['jmldk1'] = "Jml DK1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jmldk1 = $this->jmldk1;
   if (!isset($this->nmgp_cmp_hidden['jmldk1']))
   {
       $this->nmgp_cmp_hidden['jmldk1'] = 'off';
   }
   $sStyleHidden_jmldk1 = '';
   if (isset($this->nmgp_cmp_hidden['jmldk1']) && $this->nmgp_cmp_hidden['jmldk1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jmldk1']);
       $sStyleHidden_jmldk1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jmldk1 = 'display: none;';
   $sStyleReadInp_jmldk1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jmldk1']) && $this->nmgp_cmp_readonly['jmldk1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jmldk1']);
       $sStyleReadLab_jmldk1 = '';
       $sStyleReadInp_jmldk1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jmldk1']) && $this->nmgp_cmp_hidden['jmldk1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jmldk1" value="<?php echo $this->form_encode_input($jmldk1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_jmldk1_line" id="hidden_field_data_jmldk1" style="<?php echo $sStyleHidden_jmldk1; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_jmldk1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_jmldk1_label"><span id="id_label_jmldk1"><?php echo $this->nm_new_label['jmldk1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jmldk1"]) &&  $this->nmgp_cmp_readonly["jmldk1"] == "on") { 

 ?>
<input type="hidden" name="jmldk1" value="<?php echo $this->form_encode_input($jmldk1) . "\">" . $jmldk1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_jmldk1" class="sc-ui-readonly-jmldk1 css_jmldk1_line" style="<?php echo $sStyleReadLab_jmldk1; ?>"><?php echo $this->jmldk1; ?></span><span id="id_read_off_jmldk1" class="css_read_off_jmldk1" style="white-space: nowrap;<?php echo $sStyleReadInp_jmldk1; ?>">
 <input class="sc-js-input scFormObjectOdd css_jmldk1_obj" style="" id="id_sc_field_jmldk1" type=text name="jmldk1" value="<?php echo $this->form_encode_input($jmldk1) ?>"
 size=15 alt="{datatype: 'integer', maxLength: 15, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['jmldk1']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['jmldk1']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['jmldk1']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jmldk1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jmldk1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['jmldk2']))
    {
        $this->nm_new_label['jmldk2'] = "Jml DK2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jmldk2 = $this->jmldk2;
   if (!isset($this->nmgp_cmp_hidden['jmldk2']))
   {
       $this->nmgp_cmp_hidden['jmldk2'] = 'off';
   }
   $sStyleHidden_jmldk2 = '';
   if (isset($this->nmgp_cmp_hidden['jmldk2']) && $this->nmgp_cmp_hidden['jmldk2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jmldk2']);
       $sStyleHidden_jmldk2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jmldk2 = 'display: none;';
   $sStyleReadInp_jmldk2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jmldk2']) && $this->nmgp_cmp_readonly['jmldk2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jmldk2']);
       $sStyleReadLab_jmldk2 = '';
       $sStyleReadInp_jmldk2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jmldk2']) && $this->nmgp_cmp_hidden['jmldk2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jmldk2" value="<?php echo $this->form_encode_input($jmldk2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_jmldk2_line" id="hidden_field_data_jmldk2" style="<?php echo $sStyleHidden_jmldk2; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_jmldk2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_jmldk2_label"><span id="id_label_jmldk2"><?php echo $this->nm_new_label['jmldk2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jmldk2"]) &&  $this->nmgp_cmp_readonly["jmldk2"] == "on") { 

 ?>
<input type="hidden" name="jmldk2" value="<?php echo $this->form_encode_input($jmldk2) . "\">" . $jmldk2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_jmldk2" class="sc-ui-readonly-jmldk2 css_jmldk2_line" style="<?php echo $sStyleReadLab_jmldk2; ?>"><?php echo $this->jmldk2; ?></span><span id="id_read_off_jmldk2" class="css_read_off_jmldk2" style="white-space: nowrap;<?php echo $sStyleReadInp_jmldk2; ?>">
 <input class="sc-js-input scFormObjectOdd css_jmldk2_obj" style="" id="id_sc_field_jmldk2" type=text name="jmldk2" value="<?php echo $this->form_encode_input($jmldk2) ?>"
 size=15 alt="{datatype: 'integer', maxLength: 15, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['jmldk2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['jmldk2']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['jmldk2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jmldk2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jmldk2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['jmlasr']))
    {
        $this->nm_new_label['jmlasr'] = "Jml Asr";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jmlasr = $this->jmlasr;
   if (!isset($this->nmgp_cmp_hidden['jmlasr']))
   {
       $this->nmgp_cmp_hidden['jmlasr'] = 'off';
   }
   $sStyleHidden_jmlasr = '';
   if (isset($this->nmgp_cmp_hidden['jmlasr']) && $this->nmgp_cmp_hidden['jmlasr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jmlasr']);
       $sStyleHidden_jmlasr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jmlasr = 'display: none;';
   $sStyleReadInp_jmlasr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jmlasr']) && $this->nmgp_cmp_readonly['jmlasr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jmlasr']);
       $sStyleReadLab_jmlasr = '';
       $sStyleReadInp_jmlasr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jmlasr']) && $this->nmgp_cmp_hidden['jmlasr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jmlasr" value="<?php echo $this->form_encode_input($jmlasr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_jmlasr_line" id="hidden_field_data_jmlasr" style="<?php echo $sStyleHidden_jmlasr; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_jmlasr_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_jmlasr_label"><span id="id_label_jmlasr"><?php echo $this->nm_new_label['jmlasr']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jmlasr"]) &&  $this->nmgp_cmp_readonly["jmlasr"] == "on") { 

 ?>
<input type="hidden" name="jmlasr" value="<?php echo $this->form_encode_input($jmlasr) . "\">" . $jmlasr . ""; ?>
<?php } else { ?>
<span id="id_read_on_jmlasr" class="sc-ui-readonly-jmlasr css_jmlasr_line" style="<?php echo $sStyleReadLab_jmlasr; ?>"><?php echo $this->jmlasr; ?></span><span id="id_read_off_jmlasr" class="css_read_off_jmlasr" style="white-space: nowrap;<?php echo $sStyleReadInp_jmlasr; ?>">
 <input class="sc-js-input scFormObjectOdd css_jmlasr_obj" style="" id="id_sc_field_jmlasr" type=text name="jmlasr" value="<?php echo $this->form_encode_input($jmlasr) ?>"
 size=15 alt="{datatype: 'integer', maxLength: 15, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['jmlasr']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['jmlasr']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['jmlasr']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jmlasr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jmlasr_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['jmlkary']))
    {
        $this->nm_new_label['jmlkary'] = "Jml Kary";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jmlkary = $this->jmlkary;
   if (!isset($this->nmgp_cmp_hidden['jmlkary']))
   {
       $this->nmgp_cmp_hidden['jmlkary'] = 'off';
   }
   $sStyleHidden_jmlkary = '';
   if (isset($this->nmgp_cmp_hidden['jmlkary']) && $this->nmgp_cmp_hidden['jmlkary'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jmlkary']);
       $sStyleHidden_jmlkary = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jmlkary = 'display: none;';
   $sStyleReadInp_jmlkary = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jmlkary']) && $this->nmgp_cmp_readonly['jmlkary'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jmlkary']);
       $sStyleReadLab_jmlkary = '';
       $sStyleReadInp_jmlkary = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jmlkary']) && $this->nmgp_cmp_hidden['jmlkary'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jmlkary" value="<?php echo $this->form_encode_input($jmlkary) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_jmlkary_line" id="hidden_field_data_jmlkary" style="<?php echo $sStyleHidden_jmlkary; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_jmlkary_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_jmlkary_label"><span id="id_label_jmlkary"><?php echo $this->nm_new_label['jmlkary']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jmlkary"]) &&  $this->nmgp_cmp_readonly["jmlkary"] == "on") { 

 ?>
<input type="hidden" name="jmlkary" value="<?php echo $this->form_encode_input($jmlkary) . "\">" . $jmlkary . ""; ?>
<?php } else { ?>
<span id="id_read_on_jmlkary" class="sc-ui-readonly-jmlkary css_jmlkary_line" style="<?php echo $sStyleReadLab_jmlkary; ?>"><?php echo $this->jmlkary; ?></span><span id="id_read_off_jmlkary" class="css_read_off_jmlkary" style="white-space: nowrap;<?php echo $sStyleReadInp_jmlkary; ?>">
 <input class="sc-js-input scFormObjectOdd css_jmlkary_obj" style="" id="id_sc_field_jmlkary" type=text name="jmlkary" value="<?php echo $this->form_encode_input($jmlkary) ?>"
 size=15 alt="{datatype: 'integer', maxLength: 15, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['jmlkary']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['jmlkary']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['jmlkary']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jmlkary_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jmlkary_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['deposit']))
    {
        $this->nm_new_label['deposit'] = "Deposit";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $deposit = $this->deposit;
   if (!isset($this->nmgp_cmp_hidden['deposit']))
   {
       $this->nmgp_cmp_hidden['deposit'] = 'off';
   }
   $sStyleHidden_deposit = '';
   if (isset($this->nmgp_cmp_hidden['deposit']) && $this->nmgp_cmp_hidden['deposit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['deposit']);
       $sStyleHidden_deposit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_deposit = 'display: none;';
   $sStyleReadInp_deposit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['deposit']) && $this->nmgp_cmp_readonly['deposit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['deposit']);
       $sStyleReadLab_deposit = '';
       $sStyleReadInp_deposit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['deposit']) && $this->nmgp_cmp_hidden['deposit'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="deposit" value="<?php echo $this->form_encode_input($deposit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_deposit_line" id="hidden_field_data_deposit" style="<?php echo $sStyleHidden_deposit; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_deposit_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_deposit_label"><span id="id_label_deposit"><?php echo $this->nm_new_label['deposit']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["deposit"]) &&  $this->nmgp_cmp_readonly["deposit"] == "on") { 

 ?>
<input type="hidden" name="deposit" value="<?php echo $this->form_encode_input($deposit) . "\">" . $deposit . ""; ?>
<?php } else { ?>
<span id="id_read_on_deposit" class="sc-ui-readonly-deposit css_deposit_line" style="<?php echo $sStyleReadLab_deposit; ?>"><?php echo $this->deposit; ?></span><span id="id_read_off_deposit" class="css_read_off_deposit" style="white-space: nowrap;<?php echo $sStyleReadInp_deposit; ?>">
 <input class="sc-js-input scFormObjectOdd css_deposit_obj" style="" id="id_sc_field_deposit" type=text name="deposit" value="<?php echo $this->form_encode_input($deposit) ?>"
 size=8 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['deposit']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['deposit']['format_pos'] || 3 == $this->field_config['deposit']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 8, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['deposit']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['deposit']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['deposit']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['deposit']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_deposit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_deposit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['potongan']))
    {
        $this->nm_new_label['potongan'] = "Diskon";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $potongan = $this->potongan;
   if (!isset($this->nmgp_cmp_hidden['potongan']))
   {
       $this->nmgp_cmp_hidden['potongan'] = 'off';
   }
   $sStyleHidden_potongan = '';
   if (isset($this->nmgp_cmp_hidden['potongan']) && $this->nmgp_cmp_hidden['potongan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['potongan']);
       $sStyleHidden_potongan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_potongan = 'display: none;';
   $sStyleReadInp_potongan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['potongan']) && $this->nmgp_cmp_readonly['potongan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['potongan']);
       $sStyleReadLab_potongan = '';
       $sStyleReadInp_potongan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['potongan']) && $this->nmgp_cmp_hidden['potongan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="potongan" value="<?php echo $this->form_encode_input($potongan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_potongan_line" id="hidden_field_data_potongan" style="<?php echo $sStyleHidden_potongan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_potongan_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_potongan_label"><span id="id_label_potongan"><?php echo $this->nm_new_label['potongan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["potongan"]) &&  $this->nmgp_cmp_readonly["potongan"] == "on") { 

 ?>
<input type="hidden" name="potongan" value="<?php echo $this->form_encode_input($potongan) . "\">" . $potongan . ""; ?>
<?php } else { ?>
<span id="id_read_on_potongan" class="sc-ui-readonly-potongan css_potongan_line" style="<?php echo $sStyleReadLab_potongan; ?>"><?php echo $this->potongan; ?></span><span id="id_read_off_potongan" class="css_read_off_potongan" style="white-space: nowrap;<?php echo $sStyleReadInp_potongan; ?>">
 <input class="sc-js-input scFormObjectOdd css_potongan_obj" style="" id="id_sc_field_potongan" type=text name="potongan" value="<?php echo $this->form_encode_input($potongan) ?>"
 size=8 alt="{datatype: 'integer', maxLength: 8, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['potongan']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['potongan']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['potongan']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_potongan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_potongan_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['hrsdibayar']))
    {
        $this->nm_new_label['hrsdibayar'] = "Kembali";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hrsdibayar = $this->hrsdibayar;
   $sStyleHidden_hrsdibayar = '';
   if (isset($this->nmgp_cmp_hidden['hrsdibayar']) && $this->nmgp_cmp_hidden['hrsdibayar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hrsdibayar']);
       $sStyleHidden_hrsdibayar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hrsdibayar = 'display: none;';
   $sStyleReadInp_hrsdibayar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hrsdibayar']) && $this->nmgp_cmp_readonly['hrsdibayar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hrsdibayar']);
       $sStyleReadLab_hrsdibayar = '';
       $sStyleReadInp_hrsdibayar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hrsdibayar']) && $this->nmgp_cmp_hidden['hrsdibayar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hrsdibayar" value="<?php echo $this->form_encode_input($hrsdibayar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hrsdibayar_line" id="hidden_field_data_hrsdibayar" style="<?php echo $sStyleHidden_hrsdibayar; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_hrsdibayar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hrsdibayar_label"><span id="id_label_hrsdibayar"><?php echo $this->nm_new_label['hrsdibayar']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hrsdibayar"]) &&  $this->nmgp_cmp_readonly["hrsdibayar"] == "on") { 

 ?>
<input type="hidden" name="hrsdibayar" value="<?php echo $this->form_encode_input($hrsdibayar) . "\">" . $hrsdibayar . ""; ?>
<?php } else { ?>
<span id="id_read_on_hrsdibayar" class="sc-ui-readonly-hrsdibayar css_hrsdibayar_line" style="<?php echo $sStyleReadLab_hrsdibayar; ?>"><?php echo $this->hrsdibayar; ?></span><span id="id_read_off_hrsdibayar" class="css_read_off_hrsdibayar" style="white-space: nowrap;<?php echo $sStyleReadInp_hrsdibayar; ?>">
 <input class="sc-js-input scFormObjectOdd css_hrsdibayar_obj" style="" id="id_sc_field_hrsdibayar" type=text name="hrsdibayar" value="<?php echo $this->form_encode_input($hrsdibayar) ?>"
 size=15 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['hrsdibayar']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['hrsdibayar']['format_pos'] || 3 == $this->field_config['hrsdibayar']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['hrsdibayar']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['hrsdibayar']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['hrsdibayar']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['hrsdibayar']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hrsdibayar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hrsdibayar_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nopayment']))
    {
        $this->nm_new_label['nopayment'] = "No Payment";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nopayment = $this->nopayment;
   $sStyleHidden_nopayment = '';
   if (isset($this->nmgp_cmp_hidden['nopayment']) && $this->nmgp_cmp_hidden['nopayment'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nopayment']);
       $sStyleHidden_nopayment = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nopayment = 'display: none;';
   $sStyleReadInp_nopayment = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nopayment']) && $this->nmgp_cmp_readonly['nopayment'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nopayment']);
       $sStyleReadLab_nopayment = '';
       $sStyleReadInp_nopayment = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nopayment']) && $this->nmgp_cmp_hidden['nopayment'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nopayment" value="<?php echo $this->form_encode_input($nopayment) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nopayment_line" id="hidden_field_data_nopayment" style="<?php echo $sStyleHidden_nopayment; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_nopayment_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nopayment_label"><span id="id_label_nopayment"><?php echo $this->nm_new_label['nopayment']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nopayment"]) &&  $this->nmgp_cmp_readonly["nopayment"] == "on") { 

 ?>
<input type="hidden" name="nopayment" value="<?php echo $this->form_encode_input($nopayment) . "\">" . $nopayment . ""; ?>
<?php } else { ?>
<span id="id_read_on_nopayment" class="sc-ui-readonly-nopayment css_nopayment_line" style="<?php echo $sStyleReadLab_nopayment; ?>"><?php echo $this->nopayment; ?></span><span id="id_read_off_nopayment" class="css_read_off_nopayment" style="white-space: nowrap;<?php echo $sStyleReadInp_nopayment; ?>">
 <input class="sc-js-input scFormObjectOdd css_nopayment_obj" style="" id="id_sc_field_nopayment" type=text name="nopayment" value="<?php echo $this->form_encode_input($nopayment) ?>"
 size=18 maxlength=18 alt="{datatype: 'text', maxLength: 18, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nopayment_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nopayment_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_nopayment_dumb = ('' == $sStyleHidden_nopayment) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_nopayment_dumb" style="<?php echo $sStyleHidden_nopayment_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>JENIS BAYAR<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['terimadari']))
    {
        $this->nm_new_label['terimadari'] = "Terima Dari";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $terimadari = $this->terimadari;
   $sStyleHidden_terimadari = '';
   if (isset($this->nmgp_cmp_hidden['terimadari']) && $this->nmgp_cmp_hidden['terimadari'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['terimadari']);
       $sStyleHidden_terimadari = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_terimadari = 'display: none;';
   $sStyleReadInp_terimadari = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['terimadari']) && $this->nmgp_cmp_readonly['terimadari'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['terimadari']);
       $sStyleReadLab_terimadari = '';
       $sStyleReadInp_terimadari = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['terimadari']) && $this->nmgp_cmp_hidden['terimadari'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="terimadari" value="<?php echo $this->form_encode_input($terimadari) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_terimadari_line" id="hidden_field_data_terimadari" style="<?php echo $sStyleHidden_terimadari; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_terimadari_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_terimadari_label"><span id="id_label_terimadari"><?php echo $this->nm_new_label['terimadari']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["terimadari"]) &&  $this->nmgp_cmp_readonly["terimadari"] == "on") { 

 ?>
<input type="hidden" name="terimadari" value="<?php echo $this->form_encode_input($terimadari) . "\">" . $terimadari . ""; ?>
<?php } else { ?>
<span id="id_read_on_terimadari" class="sc-ui-readonly-terimadari css_terimadari_line" style="<?php echo $sStyleReadLab_terimadari; ?>"><?php echo $this->terimadari; ?></span><span id="id_read_off_terimadari" class="css_read_off_terimadari" style="white-space: nowrap;<?php echo $sStyleReadInp_terimadari; ?>">
 <input class="sc-js-input scFormObjectOdd css_terimadari_obj" style="" id="id_sc_field_terimadari" type=text name="terimadari" value="<?php echo $this->form_encode_input($terimadari) ?>"
 size=25 maxlength=75 alt="{datatype: 'text', maxLength: 75, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_terimadari_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_terimadari_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['jenispayment']))
   {
       $this->nm_new_label['jenispayment'] = "Jenis Pembayaran";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jenispayment = $this->jenispayment;
   $sStyleHidden_jenispayment = '';
   if (isset($this->nmgp_cmp_hidden['jenispayment']) && $this->nmgp_cmp_hidden['jenispayment'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jenispayment']);
       $sStyleHidden_jenispayment = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jenispayment = 'display: none;';
   $sStyleReadInp_jenispayment = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jenispayment']) && $this->nmgp_cmp_readonly['jenispayment'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jenispayment']);
       $sStyleReadLab_jenispayment = '';
       $sStyleReadInp_jenispayment = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jenispayment']) && $this->nmgp_cmp_hidden['jenispayment'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="jenispayment" value="<?php echo $this->form_encode_input($this->jenispayment) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_jenispayment_line" id="hidden_field_data_jenispayment" style="<?php echo $sStyleHidden_jenispayment; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_jenispayment_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_jenispayment_label"><span id="id_label_jenispayment"><?php echo $this->nm_new_label['jenispayment']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['php_cmp_required']['jenispayment']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['php_cmp_required']['jenispayment'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jenispayment"]) &&  $this->nmgp_cmp_readonly["jenispayment"] == "on") { 

$jenispayment_look = "";
 if ($this->jenispayment == "TUNAI") { $jenispayment_look .= "TUNAI" ;} 
 if ($this->jenispayment == "BPJS") { $jenispayment_look .= "BPJS" ;} 
 if ($this->jenispayment == "KARTU KREDIT") { $jenispayment_look .= "KARTU KREDIT" ;} 
 if ($this->jenispayment == "KARTU DEBIT") { $jenispayment_look .= "KARTU DEBIT" ;} 
 if ($this->jenispayment == "ASURANSI") { $jenispayment_look .= "ASURANSI" ;} 
 if ($this->jenispayment == "KARYAWAN") { $jenispayment_look .= "KARYAWAN" ;} 
 if ($this->jenispayment == "KOMBINASI") { $jenispayment_look .= "KOMBINASI" ;} 
 if ($this->jenispayment == "BANSOS") { $jenispayment_look .= "BANSOS" ;} 
 if ($this->jenispayment == "JAMPERU") { $jenispayment_look .= "JAMPERU" ;} 
 if (empty($jenispayment_look)) { $jenispayment_look = $this->jenispayment; }
?>
<input type="hidden" name="jenispayment" value="<?php echo $this->form_encode_input($jenispayment) . "\">" . $jenispayment_look . ""; ?>
<?php } else { ?>
<?php

$jenispayment_look = "";
 if ($this->jenispayment == "TUNAI") { $jenispayment_look .= "TUNAI" ;} 
 if ($this->jenispayment == "BPJS") { $jenispayment_look .= "BPJS" ;} 
 if ($this->jenispayment == "KARTU KREDIT") { $jenispayment_look .= "KARTU KREDIT" ;} 
 if ($this->jenispayment == "KARTU DEBIT") { $jenispayment_look .= "KARTU DEBIT" ;} 
 if ($this->jenispayment == "ASURANSI") { $jenispayment_look .= "ASURANSI" ;} 
 if ($this->jenispayment == "KARYAWAN") { $jenispayment_look .= "KARYAWAN" ;} 
 if ($this->jenispayment == "KOMBINASI") { $jenispayment_look .= "KOMBINASI" ;} 
 if ($this->jenispayment == "BANSOS") { $jenispayment_look .= "BANSOS" ;} 
 if ($this->jenispayment == "JAMPERU") { $jenispayment_look .= "JAMPERU" ;} 
 if (empty($jenispayment_look)) { $jenispayment_look = $this->jenispayment; }
?>
<span id="id_read_on_jenispayment" class="css_jenispayment_line"  style="<?php echo $sStyleReadLab_jenispayment; ?>"><?php echo $this->form_encode_input($jenispayment_look); ?></span><span id="id_read_off_jenispayment" class="css_read_off_jenispayment" style="white-space: nowrap; <?php echo $sStyleReadInp_jenispayment; ?>">
 <span id="idAjaxSelect_jenispayment"><select class="sc-js-input scFormObjectOdd css_jenispayment_obj" style="" id="id_sc_field_jenispayment" name="jenispayment" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_jenispayment'][] = ''; ?>
 <option value=""></option>
 <option  value="TUNAI" <?php  if ($this->jenispayment == "TUNAI") { echo " selected" ;} ?>>TUNAI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_jenispayment'][] = 'TUNAI'; ?>
 <option  value="BPJS" <?php  if ($this->jenispayment == "BPJS") { echo " selected" ;} ?>>BPJS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_jenispayment'][] = 'BPJS'; ?>
 <option  value="KARTU KREDIT" <?php  if ($this->jenispayment == "KARTU KREDIT") { echo " selected" ;} ?>>KARTU KREDIT</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_jenispayment'][] = 'KARTU KREDIT'; ?>
 <option  value="KARTU DEBIT" <?php  if ($this->jenispayment == "KARTU DEBIT") { echo " selected" ;} ?>>KARTU DEBIT</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_jenispayment'][] = 'KARTU DEBIT'; ?>
 <option  value="ASURANSI" <?php  if ($this->jenispayment == "ASURANSI") { echo " selected" ;} ?>>ASURANSI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_jenispayment'][] = 'ASURANSI'; ?>
 <option  value="KARYAWAN" <?php  if ($this->jenispayment == "KARYAWAN") { echo " selected" ;} ?>>KARYAWAN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_jenispayment'][] = 'KARYAWAN'; ?>
 <option  value="KOMBINASI" <?php  if ($this->jenispayment == "KOMBINASI") { echo " selected" ;} ?>>KOMBINASI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_jenispayment'][] = 'KOMBINASI'; ?>
 <option  value="BANSOS" <?php  if ($this->jenispayment == "BANSOS") { echo " selected" ;} ?>>BANSOS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_jenispayment'][] = 'BANSOS'; ?>
 <option  value="JAMPERU" <?php  if ($this->jenispayment == "JAMPERU") { echo " selected" ;} ?>>JAMPERU</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_jenispayment'][] = 'JAMPERU'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jenispayment_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jenispayment_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['instansipenjamin']))
    {
        $this->nm_new_label['instansipenjamin'] = "Penjamin";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $instansipenjamin = $this->instansipenjamin;
   $sStyleHidden_instansipenjamin = '';
   if (isset($this->nmgp_cmp_hidden['instansipenjamin']) && $this->nmgp_cmp_hidden['instansipenjamin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['instansipenjamin']);
       $sStyleHidden_instansipenjamin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_instansipenjamin = 'display: none;';
   $sStyleReadInp_instansipenjamin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['instansipenjamin']) && $this->nmgp_cmp_readonly['instansipenjamin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['instansipenjamin']);
       $sStyleReadLab_instansipenjamin = '';
       $sStyleReadInp_instansipenjamin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['instansipenjamin']) && $this->nmgp_cmp_hidden['instansipenjamin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="instansipenjamin" value="<?php echo $this->form_encode_input($instansipenjamin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_instansipenjamin_line" id="hidden_field_data_instansipenjamin" style="<?php echo $sStyleHidden_instansipenjamin; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_instansipenjamin_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_instansipenjamin_label"><span id="id_label_instansipenjamin"><?php echo $this->nm_new_label['instansipenjamin']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["instansipenjamin"]) &&  $this->nmgp_cmp_readonly["instansipenjamin"] == "on") { 

 ?>
<input type="hidden" name="instansipenjamin" value="<?php echo $this->form_encode_input($instansipenjamin) . "\">" . $instansipenjamin . ""; ?>
<?php } else { ?>

<?php
$aRecData['instansipenjamin'] = $this->instansipenjamin;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_instansipenjamin']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_instansipenjamin'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_instansipenjamin']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_instansipenjamin'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT instCode, name FROM tbinstansi WHERE instCode = '" . substr($this->Db->qstr($this->instansipenjamin), 1, -1) . "' ORDER BY name";

   $this->id = $old_value_id;
   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_instansipenjamin'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->instansipenjamin])) ? $aLookup[0][$this->instansipenjamin] : $this->instansipenjamin;
$instansipenjamin_look = (isset($aLookup[0][$this->instansipenjamin])) ? $aLookup[0][$this->instansipenjamin] : $this->instansipenjamin;
?>
<span id="id_read_on_instansipenjamin" class="sc-ui-readonly-instansipenjamin css_instansipenjamin_line" style="<?php echo $sStyleReadLab_instansipenjamin; ?>"><?php echo str_replace("<", "&lt;", $instansipenjamin_look); ?></span><span id="id_read_off_instansipenjamin" class="css_read_off_instansipenjamin" style="white-space: nowrap;<?php echo $sStyleReadInp_instansipenjamin; ?>">
 <input class="sc-js-input scFormObjectOdd css_instansipenjamin_obj" style="display: none;" id="id_sc_field_instansipenjamin" type=text name="instansipenjamin" value="<?php echo $this->form_encode_input($instansipenjamin) ?>"
 size=50 maxlength=100 style="display: none" alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['instansipenjamin'] = $this->instansipenjamin;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_instansipenjamin']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_instansipenjamin'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_instansipenjamin']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_instansipenjamin'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT instCode, name FROM tbinstansi WHERE instCode = '" . substr($this->Db->qstr($this->instansipenjamin), 1, -1) . "' ORDER BY name";

   $this->id = $old_value_id;
   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_instansipenjamin'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->instansipenjamin])) ? $aLookup[0][$this->instansipenjamin] : '';
$instansipenjamin_look = (isset($aLookup[0][$this->instansipenjamin])) ? $aLookup[0][$this->instansipenjamin] : '';
?>
<select id="id_ac_instansipenjamin" class="scFormObjectOdd sc-ui-autocomp-instansipenjamin css_instansipenjamin_obj"><?php if ('' != $this->instansipenjamin) { ?><option value="<?php echo $this->instansipenjamin ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_instansipenjamin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_instansipenjamin_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['bankdebit']))
   {
       $this->nm_new_label['bankdebit'] = "Bank Debit";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bankdebit = $this->bankdebit;
   $sStyleHidden_bankdebit = '';
   if (isset($this->nmgp_cmp_hidden['bankdebit']) && $this->nmgp_cmp_hidden['bankdebit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bankdebit']);
       $sStyleHidden_bankdebit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bankdebit = 'display: none;';
   $sStyleReadInp_bankdebit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bankdebit']) && $this->nmgp_cmp_readonly['bankdebit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bankdebit']);
       $sStyleReadLab_bankdebit = '';
       $sStyleReadInp_bankdebit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bankdebit']) && $this->nmgp_cmp_hidden['bankdebit'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="bankdebit" value="<?php echo $this->form_encode_input($this->bankdebit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_bankdebit_line" id="hidden_field_data_bankdebit" style="<?php echo $sStyleHidden_bankdebit; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bankdebit_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_bankdebit_label"><span id="id_label_bankdebit"><?php echo $this->nm_new_label['bankdebit']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bankdebit"]) &&  $this->nmgp_cmp_readonly["bankdebit"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_bankdebit']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_bankdebit'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_bankdebit']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_bankdebit'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_bankdebit']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_bankdebit'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_bankdebit']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_bankdebit'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT bankName, bankName  FROM tbbank  ORDER BY bankName";

   $this->id = $old_value_id;
   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_bankdebit'][] = $rs->fields[0];
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
   $bankdebit_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->bankdebit_1))
          {
              foreach ($this->bankdebit_1 as $tmp_bankdebit)
              {
                  if (trim($tmp_bankdebit) === trim($cadaselect[1])) { $bankdebit_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->bankdebit) === trim($cadaselect[1])) { $bankdebit_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="bankdebit" value="<?php echo $this->form_encode_input($bankdebit) . "\">" . $bankdebit_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_bankdebit();
   $x = 0 ; 
   $bankdebit_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->bankdebit_1))
          {
              foreach ($this->bankdebit_1 as $tmp_bankdebit)
              {
                  if (trim($tmp_bankdebit) === trim($cadaselect[1])) { $bankdebit_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->bankdebit) === trim($cadaselect[1])) { $bankdebit_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($bankdebit_look))
          {
              $bankdebit_look = $this->bankdebit;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_bankdebit\" class=\"css_bankdebit_line\" style=\"" .  $sStyleReadLab_bankdebit . "\">" . $this->form_encode_input($bankdebit_look) . "</span><span id=\"id_read_off_bankdebit\" class=\"css_read_off_bankdebit\" style=\"white-space: nowrap; " . $sStyleReadInp_bankdebit . "\">";
   echo " <span id=\"idAjaxSelect_bankdebit\"><select class=\"sc-js-input scFormObjectOdd css_bankdebit_obj\" style=\"\" id=\"id_sc_field_bankdebit\" name=\"bankdebit\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_bankdebit'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->bankdebit) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->bankdebit)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bankdebit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bankdebit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nokartu']))
    {
        $this->nm_new_label['nokartu'] = "No Kartu";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nokartu = $this->nokartu;
   $sStyleHidden_nokartu = '';
   if (isset($this->nmgp_cmp_hidden['nokartu']) && $this->nmgp_cmp_hidden['nokartu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nokartu']);
       $sStyleHidden_nokartu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nokartu = 'display: none;';
   $sStyleReadInp_nokartu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nokartu']) && $this->nmgp_cmp_readonly['nokartu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nokartu']);
       $sStyleReadLab_nokartu = '';
       $sStyleReadInp_nokartu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nokartu']) && $this->nmgp_cmp_hidden['nokartu'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nokartu" value="<?php echo $this->form_encode_input($nokartu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nokartu_line" id="hidden_field_data_nokartu" style="<?php echo $sStyleHidden_nokartu; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nokartu_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nokartu_label"><span id="id_label_nokartu"><?php echo $this->nm_new_label['nokartu']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nokartu"]) &&  $this->nmgp_cmp_readonly["nokartu"] == "on") { 

 ?>
<input type="hidden" name="nokartu" value="<?php echo $this->form_encode_input($nokartu) . "\">" . $nokartu . ""; ?>
<?php } else { ?>
<span id="id_read_on_nokartu" class="sc-ui-readonly-nokartu css_nokartu_line" style="<?php echo $sStyleReadLab_nokartu; ?>"><?php echo $this->nokartu; ?></span><span id="id_read_off_nokartu" class="css_read_off_nokartu" style="white-space: nowrap;<?php echo $sStyleReadInp_nokartu; ?>">
 <input class="sc-js-input scFormObjectOdd css_nokartu_obj" style="" id="id_sc_field_nokartu" type=text name="nokartu" value="<?php echo $this->form_encode_input($nokartu) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nokartu_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nokartu_text"></span></td></tr></table></td></tr></table> </TD>
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
        $this->nm_new_label['sc_field_0'] = "Jaminan / Polis";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['sc_field_0']) && $this->nmgp_cmp_hidden['sc_field_0'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_0" value="<?php echo $this->form_encode_input($sc_field_0) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sc_field_0_line" id="hidden_field_data_sc_field_0" style="<?php echo $sStyleHidden_sc_field_0; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sc_field_0_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sc_field_0_label"><span id="id_label_sc_field_0"><?php echo $this->nm_new_label['sc_field_0']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_0"]) &&  $this->nmgp_cmp_readonly["sc_field_0"] == "on") { 

 ?>
<input type="hidden" name="sc_field_0" value="<?php echo $this->form_encode_input($sc_field_0) . "\">" . $sc_field_0 . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_0" class="sc-ui-readonly-sc_field_0 css_sc_field_0_line" style="<?php echo $sStyleReadLab_sc_field_0; ?>"><?php echo $this->sc_field_0; ?></span><span id="id_read_off_sc_field_0" class="css_read_off_sc_field_0" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_0; ?>">
 <input class="sc-js-input scFormObjectOdd css_sc_field_0_obj" style="" id="id_sc_field_sc_field_0" type=text name="sc_field_0" value="<?php echo $this->form_encode_input($sc_field_0) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_0_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_0_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['edc1']))
   {
       $this->nm_new_label['edc1'] = "EDC 1";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $edc1 = $this->edc1;
   $sStyleHidden_edc1 = '';
   if (isset($this->nmgp_cmp_hidden['edc1']) && $this->nmgp_cmp_hidden['edc1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['edc1']);
       $sStyleHidden_edc1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_edc1 = 'display: none;';
   $sStyleReadInp_edc1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['edc1']) && $this->nmgp_cmp_readonly['edc1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['edc1']);
       $sStyleReadLab_edc1 = '';
       $sStyleReadInp_edc1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['edc1']) && $this->nmgp_cmp_hidden['edc1'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="edc1" value="<?php echo $this->form_encode_input($this->edc1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_edc1_line" id="hidden_field_data_edc1" style="<?php echo $sStyleHidden_edc1; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_edc1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_edc1_label"><span id="id_label_edc1"><?php echo $this->nm_new_label['edc1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["edc1"]) &&  $this->nmgp_cmp_readonly["edc1"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc1'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc1'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT bankName, bankName  FROM tbbank  ORDER BY bankName";

   $this->id = $old_value_id;
   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc1'][] = $rs->fields[0];
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
   $edc1_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->edc1_1))
          {
              foreach ($this->edc1_1 as $tmp_edc1)
              {
                  if (trim($tmp_edc1) === trim($cadaselect[1])) { $edc1_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->edc1) === trim($cadaselect[1])) { $edc1_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="edc1" value="<?php echo $this->form_encode_input($edc1) . "\">" . $edc1_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_edc1();
   $x = 0 ; 
   $edc1_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->edc1_1))
          {
              foreach ($this->edc1_1 as $tmp_edc1)
              {
                  if (trim($tmp_edc1) === trim($cadaselect[1])) { $edc1_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->edc1) === trim($cadaselect[1])) { $edc1_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($edc1_look))
          {
              $edc1_look = $this->edc1;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_edc1\" class=\"css_edc1_line\" style=\"" .  $sStyleReadLab_edc1 . "\">" . $this->form_encode_input($edc1_look) . "</span><span id=\"id_read_off_edc1\" class=\"css_read_off_edc1\" style=\"white-space: nowrap; " . $sStyleReadInp_edc1 . "\">";
   echo " <span id=\"idAjaxSelect_edc1\"><select class=\"sc-js-input scFormObjectOdd css_edc1_obj\" style=\"\" id=\"id_sc_field_edc1\" name=\"edc1\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc1'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->edc1) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->edc1)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_edc1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_edc1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['edc2']))
   {
       $this->nm_new_label['edc2'] = "EDC 2";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $edc2 = $this->edc2;
   $sStyleHidden_edc2 = '';
   if (isset($this->nmgp_cmp_hidden['edc2']) && $this->nmgp_cmp_hidden['edc2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['edc2']);
       $sStyleHidden_edc2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_edc2 = 'display: none;';
   $sStyleReadInp_edc2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['edc2']) && $this->nmgp_cmp_readonly['edc2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['edc2']);
       $sStyleReadLab_edc2 = '';
       $sStyleReadInp_edc2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['edc2']) && $this->nmgp_cmp_hidden['edc2'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="edc2" value="<?php echo $this->form_encode_input($this->edc2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_edc2_line" id="hidden_field_data_edc2" style="<?php echo $sStyleHidden_edc2; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_edc2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_edc2_label"><span id="id_label_edc2"><?php echo $this->nm_new_label['edc2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["edc2"]) &&  $this->nmgp_cmp_readonly["edc2"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc2']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc2']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc2'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc2']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc2']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc2'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT bankName, bankName  FROM tbbank  ORDER BY bankName";

   $this->id = $old_value_id;
   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc2'][] = $rs->fields[0];
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
   $edc2_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->edc2_1))
          {
              foreach ($this->edc2_1 as $tmp_edc2)
              {
                  if (trim($tmp_edc2) === trim($cadaselect[1])) { $edc2_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->edc2) === trim($cadaselect[1])) { $edc2_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="edc2" value="<?php echo $this->form_encode_input($edc2) . "\">" . $edc2_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_edc2();
   $x = 0 ; 
   $edc2_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->edc2_1))
          {
              foreach ($this->edc2_1 as $tmp_edc2)
              {
                  if (trim($tmp_edc2) === trim($cadaselect[1])) { $edc2_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->edc2) === trim($cadaselect[1])) { $edc2_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($edc2_look))
          {
              $edc2_look = $this->edc2;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_edc2\" class=\"css_edc2_line\" style=\"" .  $sStyleReadLab_edc2 . "\">" . $this->form_encode_input($edc2_look) . "</span><span id=\"id_read_off_edc2\" class=\"css_read_off_edc2\" style=\"white-space: nowrap; " . $sStyleReadInp_edc2 . "\">";
   echo " <span id=\"idAjaxSelect_edc2\"><select class=\"sc-js-input scFormObjectOdd css_edc2_obj\" style=\"\" id=\"id_sc_field_edc2\" name=\"edc2\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_edc2'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->edc2) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->edc2)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_edc2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_edc2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['poli']))
   {
       $this->nm_new_label['poli'] = "Poli";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['poli']) && $this->nmgp_cmp_hidden['poli'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="poli" value="<?php echo $this->form_encode_input($this->poli) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_poli_line" id="hidden_field_data_poli" style="<?php echo $sStyleHidden_poli; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_poli_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_poli_label"><span id="id_label_poli"><?php echo $this->nm_new_label['poli']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["poli"]) &&  $this->nmgp_cmp_readonly["poli"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_poli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_poli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_poli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_poli'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_poli']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_poli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_poli']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_poli'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT name, name  FROM tbpoli where polyCode = (SELECT poli from tbdoctor where docCode = '$this->dokter')";

   $this->id = $old_value_id;
   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['Lookup_poli'][] = $rs->fields[0];
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
   $poli_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->poli_1))
          {
              foreach ($this->poli_1 as $tmp_poli)
              {
                  if (trim($tmp_poli) === trim($cadaselect[1])) { $poli_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->poli) === trim($cadaselect[1])) { $poli_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="poli" value="<?php echo $this->form_encode_input($poli) . "\">" . $poli_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_poli();
   $x = 0 ; 
   $poli_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->poli_1))
          {
              foreach ($this->poli_1 as $tmp_poli)
              {
                  if (trim($tmp_poli) === trim($cadaselect[1])) { $poli_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->poli) === trim($cadaselect[1])) { $poli_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($poli_look))
          {
              $poli_look = $this->poli;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_poli\" class=\"css_poli_line\" style=\"" .  $sStyleReadLab_poli . "\">" . $this->form_encode_input($poli_look) . "</span><span id=\"id_read_off_poli\" class=\"css_read_off_poli\" style=\"white-space: nowrap; " . $sStyleReadInp_poli . "\">";
   echo " <span id=\"idAjaxSelect_poli\"><select class=\"sc-js-input scFormObjectOdd css_poli_obj\" style=\"\" id=\"id_sc_field_poli\" name=\"poli\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->poli) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->poli)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_poli_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_poli_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['kasir']))
    {
        $this->nm_new_label['kasir'] = "Kasir";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kasir = $this->kasir;
   $sStyleHidden_kasir = '';
   if (isset($this->nmgp_cmp_hidden['kasir']) && $this->nmgp_cmp_hidden['kasir'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kasir']);
       $sStyleHidden_kasir = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kasir = 'display: none;';
   $sStyleReadInp_kasir = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kasir']) && $this->nmgp_cmp_readonly['kasir'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kasir']);
       $sStyleReadLab_kasir = '';
       $sStyleReadInp_kasir = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kasir']) && $this->nmgp_cmp_hidden['kasir'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kasir" value="<?php echo $this->form_encode_input($kasir) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_kasir_line" id="hidden_field_data_kasir" style="<?php echo $sStyleHidden_kasir; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kasir_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_kasir_label"><span id="id_label_kasir"><?php echo $this->nm_new_label['kasir']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kasir"]) &&  $this->nmgp_cmp_readonly["kasir"] == "on") { 

 ?>
<input type="hidden" name="kasir" value="<?php echo $this->form_encode_input($kasir) . "\">" . $kasir . ""; ?>
<?php } else { ?>
<span id="id_read_on_kasir" class="sc-ui-readonly-kasir css_kasir_line" style="<?php echo $sStyleReadLab_kasir; ?>"><?php echo $this->kasir; ?></span><span id="id_read_off_kasir" class="css_read_off_kasir" style="white-space: nowrap;<?php echo $sStyleReadInp_kasir; ?>">
 <input class="sc-js-input scFormObjectOdd css_kasir_obj" style="" id="id_sc_field_kasir" type=text name="kasir" value="<?php echo $this->form_encode_input($kasir) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kasir_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kasir_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['paiddate']))
    {
        $this->nm_new_label['paiddate'] = "Tgl. Bayar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_paiddate = $this->paiddate;
   if (strlen($this->paiddate_hora) > 8 ) {$this->paiddate_hora = substr($this->paiddate_hora, 0, 8);}
   $this->paiddate .= ' ' . $this->paiddate_hora;
   $paiddate = $this->paiddate;
   $sStyleHidden_paiddate = '';
   if (isset($this->nmgp_cmp_hidden['paiddate']) && $this->nmgp_cmp_hidden['paiddate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['paiddate']);
       $sStyleHidden_paiddate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_paiddate = 'display: none;';
   $sStyleReadInp_paiddate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['paiddate']) && $this->nmgp_cmp_readonly['paiddate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['paiddate']);
       $sStyleReadLab_paiddate = '';
       $sStyleReadInp_paiddate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['paiddate']) && $this->nmgp_cmp_hidden['paiddate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="paiddate" value="<?php echo $this->form_encode_input($paiddate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_paiddate_line" id="hidden_field_data_paiddate" style="<?php echo $sStyleHidden_paiddate; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_paiddate_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_paiddate_label"><span id="id_label_paiddate"><?php echo $this->nm_new_label['paiddate']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["paiddate"]) &&  $this->nmgp_cmp_readonly["paiddate"] == "on") { 

 ?>
<input type="hidden" name="paiddate" value="<?php echo $this->form_encode_input($paiddate) . "\">" . $paiddate . ""; ?>
<?php } else { ?>
<span id="id_read_on_paiddate" class="sc-ui-readonly-paiddate css_paiddate_line" style="<?php echo $sStyleReadLab_paiddate; ?>"><?php echo $paiddate; ?></span><span id="id_read_off_paiddate" class="css_read_off_paiddate" style="white-space: nowrap;<?php echo $sStyleReadInp_paiddate; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_paiddate_obj" style="" id="id_sc_field_paiddate" type=text name="paiddate" value="<?php echo $this->form_encode_input($paiddate) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['paiddate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['paiddate']['date_format']; ?>', timeSep: '<?php echo $this->field_config['paiddate']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['paiddate']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_paiddate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_paiddate_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->paiddate = $old_dt_paiddate;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_paiddate_dumb = ('' == $sStyleHidden_paiddate) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_paiddate_dumb" style="<?php echo $sStyleHidden_paiddate_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detailtindakan']))
    {
        $this->nm_new_label['detailtindakan'] = "TINDAKAN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detailtindakan = $this->detailtindakan;
   $sStyleHidden_detailtindakan = '';
   if (isset($this->nmgp_cmp_hidden['detailtindakan']) && $this->nmgp_cmp_hidden['detailtindakan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detailtindakan']);
       $sStyleHidden_detailtindakan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detailtindakan = 'display: none;';
   $sStyleReadInp_detailtindakan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detailtindakan']) && $this->nmgp_cmp_readonly['detailtindakan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detailtindakan']);
       $sStyleReadLab_detailtindakan = '';
       $sStyleReadInp_detailtindakan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detailtindakan']) && $this->nmgp_cmp_hidden['detailtindakan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detailtindakan" value="<?php echo $this->form_encode_input($detailtindakan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detailtindakan_line" id="hidden_field_data_detailtindakan" style="<?php echo $sStyleHidden_detailtindakan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detailtindakan_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_detailtindakan_label"><span id="id_label_detailtindakan"><?php echo $this->nm_new_label['detailtindakan']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detailTindakan'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detailTindakan'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detailTindakan'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_pay_poli_old_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_pay_poli_old_mob_empty.htm' : $this->Ini->link_form_tbtindakanrawatjalan_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_detailTindakan']) && 'nmsc_iframe_liga_form_tbtindakanrawatjalan_mob' != $this->Ini->sc_lig_target['C_@scinf_detailTindakan'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detailTindakan'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_detailTindakan'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbtindakanrawatjalan_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tbtindakanrawatjalan_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detailtindakan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detailtindakan_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detailresep']))
    {
        $this->nm_new_label['detailresep'] = "RESEP / OBAT";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detailresep = $this->detailresep;
   $sStyleHidden_detailresep = '';
   if (isset($this->nmgp_cmp_hidden['detailresep']) && $this->nmgp_cmp_hidden['detailresep'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detailresep']);
       $sStyleHidden_detailresep = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detailresep = 'display: none;';
   $sStyleReadInp_detailresep = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detailresep']) && $this->nmgp_cmp_readonly['detailresep'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detailresep']);
       $sStyleReadLab_detailresep = '';
       $sStyleReadInp_detailresep = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detailresep']) && $this->nmgp_cmp_hidden['detailresep'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detailresep" value="<?php echo $this->form_encode_input($detailresep) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detailresep_line" id="hidden_field_data_detailresep" style="<?php echo $sStyleHidden_detailresep; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detailresep_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_detailresep_label"><span id="id_label_detailresep"><?php echo $this->nm_new_label['detailresep']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detailResep'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detailResep'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detailResep'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_parms'] = "trancode*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_pay_poli_old_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_pay_poli_old_mob_empty.htm' : $this->Ini->link_form_tbreseprawatjalan_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_detailResep']) && 'nmsc_iframe_liga_form_tbreseprawatjalan_mob' != $this->Ini->sc_lig_target['C_@scinf_detailResep'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detailResep'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbreseprawatjalan_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_detailResep'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbreseprawatjalan_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tbreseprawatjalan_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detailresep_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detailresep_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detailadm']))
    {
        $this->nm_new_label['detailadm'] = "ADMINISTRASI";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detailadm = $this->detailadm;
   $sStyleHidden_detailadm = '';
   if (isset($this->nmgp_cmp_hidden['detailadm']) && $this->nmgp_cmp_hidden['detailadm'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detailadm']);
       $sStyleHidden_detailadm = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detailadm = 'display: none;';
   $sStyleReadInp_detailadm = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detailadm']) && $this->nmgp_cmp_readonly['detailadm'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detailadm']);
       $sStyleReadLab_detailadm = '';
       $sStyleReadInp_detailadm = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detailadm']) && $this->nmgp_cmp_hidden['detailadm'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detailadm" value="<?php echo $this->form_encode_input($detailadm) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detailadm_line" id="hidden_field_data_detailadm" style="<?php echo $sStyleHidden_detailadm; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detailadm_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_detailadm_label"><span id="id_label_detailadm"><?php echo $this->nm_new_label['detailadm']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detailAdm'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detailAdm'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detailAdm'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_pay_poli_old_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_pay_poli_old_mob_empty.htm' : $this->Ini->link_form_detailadm_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_detailAdm']) && 'nmsc_iframe_liga_form_detailadm_mob' != $this->Ini->sc_lig_target['C_@scinf_detailAdm'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detailAdm'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_detailadm_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_detailAdm'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_detailadm_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_detailadm_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detailadm_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detailadm_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lab']))
    {
        $this->nm_new_label['lab'] = "LAB";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lab = $this->lab;
   $sStyleHidden_lab = '';
   if (isset($this->nmgp_cmp_hidden['lab']) && $this->nmgp_cmp_hidden['lab'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lab']);
       $sStyleHidden_lab = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lab = 'display: none;';
   $sStyleReadInp_lab = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lab']) && $this->nmgp_cmp_readonly['lab'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lab']);
       $sStyleReadLab_lab = '';
       $sStyleReadInp_lab = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lab']) && $this->nmgp_cmp_hidden['lab'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lab" value="<?php echo $this->form_encode_input($lab) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_lab_line" id="hidden_field_data_lab" style="<?php echo $sStyleHidden_lab; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_lab_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_lab_label"><span id="id_label_lab"><?php echo $this->nm_new_label['lab']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_lab'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_lab'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_lab'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_multi'] = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_liga_grid_edit'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_liga_grid_edit_link'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['foreign_key']['struk'] = $this->nmgp_dados_form['nostruk'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "' AND struk = " . $this->nmgp_dados_form['nostruk'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "' AND struk = " . $this->nmgp_dados_form['nostruk'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_pay_poli_old_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_pay_poli_old_mob_empty.htm' : $this->Ini->link_form_tbrujukanlab_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y&sc_ifr_height=500';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_lab']) && 'nmsc_iframe_liga_form_tbrujukanlab_mob' != $this->Ini->sc_lig_target['C_@scinf_lab'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_lab'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanlab_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_lab'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbrujukanlab_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="100%" name="nmsc_iframe_liga_form_tbrujukanlab_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lab_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lab_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['radiologi']))
    {
        $this->nm_new_label['radiologi'] = "RAD";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $radiologi = $this->radiologi;
   $sStyleHidden_radiologi = '';
   if (isset($this->nmgp_cmp_hidden['radiologi']) && $this->nmgp_cmp_hidden['radiologi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['radiologi']);
       $sStyleHidden_radiologi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_radiologi = 'display: none;';
   $sStyleReadInp_radiologi = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['radiologi']) && $this->nmgp_cmp_readonly['radiologi'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['radiologi']);
       $sStyleReadLab_radiologi = '';
       $sStyleReadInp_radiologi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['radiologi']) && $this->nmgp_cmp_hidden['radiologi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="radiologi" value="<?php echo $this->form_encode_input($radiologi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_radiologi_line" id="hidden_field_data_radiologi" style="<?php echo $sStyleHidden_radiologi; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_radiologi_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_radiologi_label"><span id="id_label_radiologi"><?php echo $this->nm_new_label['radiologi']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_radiologi'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_radiologi'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_radiologi'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_multi'] = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_liga_grid_edit'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_liga_grid_edit_link'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['foreign_key']['struk'] = $this->nmgp_dados_form['nostruk'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "' AND struk = " . $this->nmgp_dados_form['nostruk'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "' AND struk = " . $this->nmgp_dados_form['nostruk'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_pay_poli_old_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_pay_poli_old_mob_empty.htm' : $this->Ini->link_form_tbrujukanradiologi_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y&sc_ifr_height=500';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_radiologi']) && 'nmsc_iframe_liga_form_tbrujukanradiologi_mob' != $this->Ini->sc_lig_target['C_@scinf_radiologi'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_radiologi'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbrujukanradiologi_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_radiologi'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbrujukanradiologi_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="100%" name="nmsc_iframe_liga_form_tbrujukanradiologi_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_radiologi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_radiologi_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_radiologi_dumb = ('' == $sStyleHidden_radiologi) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_radiologi_dumb" style="<?php echo $sStyleHidden_radiologi_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bhp']))
    {
        $this->nm_new_label['bhp'] = "BHP / ALKES";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bhp = $this->bhp;
   $sStyleHidden_bhp = '';
   if (isset($this->nmgp_cmp_hidden['bhp']) && $this->nmgp_cmp_hidden['bhp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bhp']);
       $sStyleHidden_bhp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bhp = 'display: none;';
   $sStyleReadInp_bhp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bhp']) && $this->nmgp_cmp_readonly['bhp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bhp']);
       $sStyleReadLab_bhp = '';
       $sStyleReadInp_bhp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bhp']) && $this->nmgp_cmp_hidden['bhp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bhp" value="<?php echo $this->form_encode_input($bhp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_bhp_line" id="hidden_field_data_bhp" style="<?php echo $sStyleHidden_bhp; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_bhp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_bhp_label"><span id="id_label_bhp"><?php echo $this->nm_new_label['bhp']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_bhp'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_bhp'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_bhp'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_multi'] = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_liga_grid_edit'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_liga_grid_edit_link'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_parms'] = "trancode*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_pay_poli_old_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_pay_poli_old_mob_empty.htm' : $this->Ini->link_form_tbbhprawatjalan_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_bhp']) && 'nmsc_iframe_liga_form_tbbhprawatjalan_mob' != $this->Ini->sc_lig_target['C_@scinf_bhp'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_bhp'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['form_tbbhprawatjalan_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_bhp'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbbhprawatjalan_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tbbhprawatjalan_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bhp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bhp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-27", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-28", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-29", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-30", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_pay_poli_old_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_pay_poli_old_mob");
 parent.scAjaxDetailHeight("form_pay_poli_old_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_pay_poli_old_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_pay_poli_old_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['sc_modal'])
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
		if ($("#sc_b_new_t.sc-unique-btn-15").length && $("#sc_b_new_t.sc-unique-btn-15").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-16").length && $("#sc_b_ins_t.sc-unique-btn-16").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-17").length && $("#sc_b_sai_t.sc-unique-btn-17").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
		if ($("#sc_b_upd_t.sc-unique-btn-18").length && $("#sc_b_upd_t.sc-unique-btn-18").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-5").length && $("#sc_b_del_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
		if ($("#sc_b_del_t.sc-unique-btn-19").length && $("#sc_b_del_t.sc-unique-btn-19").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_Cetak() {
		if ($("#sc_Cetak_top").length && $("#sc_Cetak_top").is(":visible")) {
			sc_btn_Cetak()
			 return;
		}
	}
	function scBtnFn_sc_btn_0() {
		if ($("#sc_sc_btn_0_top").length && $("#sc_sc_btn_0_top").is(":visible")) {
			sc_btn_sc_btn_0()
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
		if ($("#sc_b_sai_t.sc-unique-btn-22").length && $("#sc_b_sai_t.sc-unique-btn-22").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-23").length && $("#sc_b_sai_t.sc-unique-btn-23").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-24").length && $("#sc_b_sai_t.sc-unique-btn-24").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-25").length && $("#sc_b_sai_t.sc-unique-btn-25").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-26").length && $("#sc_b_sai_t.sc-unique-btn-26").is(":visible")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-27").length && $("#sc_b_ini_b.sc-unique-btn-27").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-12").length && $("#sc_b_ret_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
		if ($("#sc_b_ret_b.sc-unique-btn-28").length && $("#sc_b_ret_b.sc-unique-btn-28").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-13").length && $("#sc_b_avc_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
		if ($("#sc_b_avc_b.sc-unique-btn-29").length && $("#sc_b_avc_b.sc-unique-btn-29").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-14").length && $("#sc_b_fim_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('final');
			 return;
		}
		if ($("#sc_b_fim_b.sc-unique-btn-30").length && $("#sc_b_fim_b.sc-unique-btn-30").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-20").length && $("#sys_separator.sc-unique-btn-20").is(":visible")) {
			return false;
			 return;
		}
	}
	function scBtnFn_sys_format_copy() {
		if ($("#sc_b_clone_t.sc-unique-btn-21").length && $("#sc_b_clone_t.sc-unique-btn-21").is(":visible")) {
			nm_move ('clone');
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_poli_old_mob']['buttonStatus'] = $this->nmgp_botoes;
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
