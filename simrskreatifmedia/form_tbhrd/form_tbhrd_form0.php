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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - HRD"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - HRD"); } ?></TITLE>
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
.css_read_off_tgllahir button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbhrd/form_tbhrd_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbhrd_sajax_js.php");
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
     if (F_name == "kodekary")
     {
        $('input[name="kodekary"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="kodekary"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="kodekary"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_tbhrd_jquery.php');

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
    if ("hidden_bloco_2" == block_id) {
      scAjaxDetailHeight("form_tbhrdstatus", $($("#nmsc_iframe_liga_form_tbhrdstatus")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbhrdstatus")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbhrdstatus")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_tbhrdformal", $($("#nmsc_iframe_liga_form_tbhrdformal")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbhrdformal")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbhrdformal")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_4" == block_id) {
      scAjaxDetailHeight("form_tbhrdinformal", $($("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_5" == block_id) {
      scAjaxDetailHeight("form_tbhrdexp", $($("#nmsc_iframe_liga_form_tbhrdexp")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbhrdexp")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbhrdexp")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_6" == block_id) {
      scAjaxDetailHeight("form_tbhrdklg", $($("#nmsc_iframe_liga_form_tbhrdklg")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbhrdklg")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbhrdklg")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_7" == block_id) {
      scAjaxDetailHeight("form_tbhrdminat", $($("#nmsc_iframe_liga_form_tbhrdminat")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbhrdminat")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbhrdminat")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_8" == block_id) {
      scAjaxDetailHeight("form_tbhrdref", $($("#nmsc_iframe_liga_form_tbhrdref")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbhrdref")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbhrdref")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_9" == block_id) {
      scAjaxDetailHeight("form_tbhrdhope", $($("#nmsc_iframe_liga_form_tbhrdhope")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbhrdhope")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbhrdhope")[0].contentWindow.scQuickSearchInit(false, '');
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_tbhrd_js0.php");
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
<form  name="F1" method="post" enctype="multipart/form-data" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['insert_validation']; ?>">
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
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="photo_salva" value="<?php  echo $this->form_encode_input($this->photo) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_tbhrd'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbhrd'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - HRD"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - HRD"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['fast_search'][2] : "";
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="50%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><script type="text/javascript">
function sc_change_tabs(bTabDisp, sTabId, sTabParts)
{
  if (document.getElementById(sTabId)) {
    if (bTabDisp) {
      document.getElementById("div_" + sTabId).style.width = "";
      document.getElementById("div_" + sTabId).style.height = "";
      document.getElementById("div_" + sTabId).style.display = "";
      document.getElementById("div_" + sTabId).style.overflow = "visible";
      document.getElementById(sTabParts).className = "scTabActive";
      if ("hidden_bloco_2" == sTabId) {
        scAjaxDetailHeight("form_tbhrdstatus", $($("#nmsc_iframe_liga_form_tbhrdstatus")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_tbhrdstatus")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_tbhrdstatus")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_3" == sTabId) {
        scAjaxDetailHeight("form_tbhrdformal", $($("#nmsc_iframe_liga_form_tbhrdformal")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_tbhrdformal")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_tbhrdformal")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_4" == sTabId) {
        scAjaxDetailHeight("form_tbhrdinformal", $($("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_5" == sTabId) {
        scAjaxDetailHeight("form_tbhrdexp", $($("#nmsc_iframe_liga_form_tbhrdexp")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_tbhrdexp")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_tbhrdexp")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_6" == sTabId) {
        scAjaxDetailHeight("form_tbhrdklg", $($("#nmsc_iframe_liga_form_tbhrdklg")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_tbhrdklg")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_tbhrdklg")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_7" == sTabId) {
        scAjaxDetailHeight("form_tbhrdminat", $($("#nmsc_iframe_liga_form_tbhrdminat")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_tbhrdminat")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_tbhrdminat")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_8" == sTabId) {
        scAjaxDetailHeight("form_tbhrdref", $($("#nmsc_iframe_liga_form_tbhrdref")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_tbhrdref")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_tbhrdref")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_9" == sTabId) {
        scAjaxDetailHeight("form_tbhrdhope", $($("#nmsc_iframe_liga_form_tbhrdhope")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_tbhrdhope")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_tbhrdhope")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
    }
    else {
      document.getElementById("div_" + sTabId).style.width = "1px";
      document.getElementById("div_" + sTabId).style.height = "0px";
      document.getElementById("div_" + sTabId).style.display = "none";
      document.getElementById("div_" + sTabId).style.overflow = "scroll";
      document.getElementById(sTabParts).className = "scTabInactive";
    }
  }
}
</script>
<input type="hidden" name="photo_ul_name" id="id_sc_field_photo_ul_name" value="<?php echo $this->form_encode_input($this->photo_ul_name);?>">
<input type="hidden" name="photo_ul_type" id="id_sc_field_photo_ul_type" value="<?php echo $this->form_encode_input($this->photo_ul_type);?>">
   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Detail<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['kodekary']))
    {
        $this->nm_new_label['kodekary'] = "Kode Karyawan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kodekary = $this->kodekary;
   $sStyleHidden_kodekary = '';
   if (isset($this->nmgp_cmp_hidden['kodekary']) && $this->nmgp_cmp_hidden['kodekary'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kodekary']);
       $sStyleHidden_kodekary = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kodekary = 'display: none;';
   $sStyleReadInp_kodekary = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kodekary']) && $this->nmgp_cmp_readonly['kodekary'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kodekary']);
       $sStyleReadLab_kodekary = '';
       $sStyleReadInp_kodekary = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kodekary']) && $this->nmgp_cmp_hidden['kodekary'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kodekary" value="<?php echo $this->form_encode_input($kodekary) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kodekary_label" id="hidden_field_label_kodekary" style="<?php echo $sStyleHidden_kodekary; ?>"><span id="id_label_kodekary"><?php echo $this->nm_new_label['kodekary']; ?></span></TD>
    <TD class="scFormDataOdd css_kodekary_line" id="hidden_field_data_kodekary" style="<?php echo $sStyleHidden_kodekary; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kodekary_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kodekary"]) &&  $this->nmgp_cmp_readonly["kodekary"] == "on") { 

 ?>
<input type="hidden" name="kodekary" value="<?php echo $this->form_encode_input($kodekary) . "\">" . $kodekary . ""; ?>
<?php } else { ?>
<span id="id_read_on_kodekary" class="sc-ui-readonly-kodekary css_kodekary_line" style="<?php echo $sStyleReadLab_kodekary; ?>"><?php echo $this->kodekary; ?></span><span id="id_read_off_kodekary" class="css_read_off_kodekary" style="white-space: nowrap;<?php echo $sStyleReadInp_kodekary; ?>">
 <input class="sc-js-input scFormObjectOdd css_kodekary_obj" style="" id="id_sc_field_kodekary" type=text name="kodekary" value="<?php echo $this->form_encode_input($kodekary) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(auto)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kodekary_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kodekary_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['namalengkap']))
    {
        $this->nm_new_label['namalengkap'] = "Nama Lengkap";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $namalengkap = $this->namalengkap;
   $sStyleHidden_namalengkap = '';
   if (isset($this->nmgp_cmp_hidden['namalengkap']) && $this->nmgp_cmp_hidden['namalengkap'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['namalengkap']);
       $sStyleHidden_namalengkap = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_namalengkap = 'display: none;';
   $sStyleReadInp_namalengkap = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['namalengkap']) && $this->nmgp_cmp_readonly['namalengkap'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['namalengkap']);
       $sStyleReadLab_namalengkap = '';
       $sStyleReadInp_namalengkap = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['namalengkap']) && $this->nmgp_cmp_hidden['namalengkap'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="namalengkap" value="<?php echo $this->form_encode_input($namalengkap) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_namalengkap_label" id="hidden_field_label_namalengkap" style="<?php echo $sStyleHidden_namalengkap; ?>"><span id="id_label_namalengkap"><?php echo $this->nm_new_label['namalengkap']; ?></span></TD>
    <TD class="scFormDataOdd css_namalengkap_line" id="hidden_field_data_namalengkap" style="<?php echo $sStyleHidden_namalengkap; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_namalengkap_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["namalengkap"]) &&  $this->nmgp_cmp_readonly["namalengkap"] == "on") { 

 ?>
<input type="hidden" name="namalengkap" value="<?php echo $this->form_encode_input($namalengkap) . "\">" . $namalengkap . ""; ?>
<?php } else { ?>
<span id="id_read_on_namalengkap" class="sc-ui-readonly-namalengkap css_namalengkap_line" style="<?php echo $sStyleReadLab_namalengkap; ?>"><?php echo $this->namalengkap; ?></span><span id="id_read_off_namalengkap" class="css_read_off_namalengkap" style="white-space: nowrap;<?php echo $sStyleReadInp_namalengkap; ?>">
 <input class="sc-js-input scFormObjectOdd css_namalengkap_obj" style="" id="id_sc_field_namalengkap" type=text name="namalengkap" value="<?php echo $this->form_encode_input($namalengkap) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_namalengkap_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_namalengkap_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tmplahir']))
    {
        $this->nm_new_label['tmplahir'] = "Tempat Lahir";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tmplahir = $this->tmplahir;
   $sStyleHidden_tmplahir = '';
   if (isset($this->nmgp_cmp_hidden['tmplahir']) && $this->nmgp_cmp_hidden['tmplahir'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tmplahir']);
       $sStyleHidden_tmplahir = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tmplahir = 'display: none;';
   $sStyleReadInp_tmplahir = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tmplahir']) && $this->nmgp_cmp_readonly['tmplahir'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tmplahir']);
       $sStyleReadLab_tmplahir = '';
       $sStyleReadInp_tmplahir = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tmplahir']) && $this->nmgp_cmp_hidden['tmplahir'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tmplahir" value="<?php echo $this->form_encode_input($tmplahir) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tmplahir_label" id="hidden_field_label_tmplahir" style="<?php echo $sStyleHidden_tmplahir; ?>"><span id="id_label_tmplahir"><?php echo $this->nm_new_label['tmplahir']; ?></span></TD>
    <TD class="scFormDataOdd css_tmplahir_line" id="hidden_field_data_tmplahir" style="<?php echo $sStyleHidden_tmplahir; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tmplahir_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tmplahir"]) &&  $this->nmgp_cmp_readonly["tmplahir"] == "on") { 

 ?>
<input type="hidden" name="tmplahir" value="<?php echo $this->form_encode_input($tmplahir) . "\">" . $tmplahir . ""; ?>
<?php } else { ?>
<span id="id_read_on_tmplahir" class="sc-ui-readonly-tmplahir css_tmplahir_line" style="<?php echo $sStyleReadLab_tmplahir; ?>"><?php echo $this->tmplahir; ?></span><span id="id_read_off_tmplahir" class="css_read_off_tmplahir" style="white-space: nowrap;<?php echo $sStyleReadInp_tmplahir; ?>">
 <input class="sc-js-input scFormObjectOdd css_tmplahir_obj" style="" id="id_sc_field_tmplahir" type=text name="tmplahir" value="<?php echo $this->form_encode_input($tmplahir) ?>"
 size=35 maxlength=35 alt="{datatype: 'text', maxLength: 35, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tmplahir_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tmplahir_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tgllahir']))
    {
        $this->nm_new_label['tgllahir'] = "Tgl Lahir";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tgllahir = $this->tgllahir;
   $sStyleHidden_tgllahir = '';
   if (isset($this->nmgp_cmp_hidden['tgllahir']) && $this->nmgp_cmp_hidden['tgllahir'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tgllahir']);
       $sStyleHidden_tgllahir = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tgllahir = 'display: none;';
   $sStyleReadInp_tgllahir = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tgllahir']) && $this->nmgp_cmp_readonly['tgllahir'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tgllahir']);
       $sStyleReadLab_tgllahir = '';
       $sStyleReadInp_tgllahir = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tgllahir']) && $this->nmgp_cmp_hidden['tgllahir'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tgllahir" value="<?php echo $this->form_encode_input($tgllahir) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tgllahir_label" id="hidden_field_label_tgllahir" style="<?php echo $sStyleHidden_tgllahir; ?>"><span id="id_label_tgllahir"><?php echo $this->nm_new_label['tgllahir']; ?></span></TD>
    <TD class="scFormDataOdd css_tgllahir_line" id="hidden_field_data_tgllahir" style="<?php echo $sStyleHidden_tgllahir; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tgllahir_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tgllahir"]) &&  $this->nmgp_cmp_readonly["tgllahir"] == "on") { 

 ?>
<input type="hidden" name="tgllahir" value="<?php echo $this->form_encode_input($tgllahir) . "\">" . $tgllahir . ""; ?>
<?php } else { ?>
<span id="id_read_on_tgllahir" class="sc-ui-readonly-tgllahir css_tgllahir_line" style="<?php echo $sStyleReadLab_tgllahir; ?>"><?php echo $tgllahir; ?></span><span id="id_read_off_tgllahir" class="css_read_off_tgllahir" style="white-space: nowrap;<?php echo $sStyleReadInp_tgllahir; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_tgllahir_obj" style="" id="id_sc_field_tgllahir" type=text name="tgllahir" value="<?php echo $this->form_encode_input($tgllahir) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['tgllahir']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['tgllahir']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['tgllahir']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tgllahir_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tgllahir_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['pendidikan']))
   {
       $this->nm_new_label['pendidikan'] = "Pendidikan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pendidikan = $this->pendidikan;
   $sStyleHidden_pendidikan = '';
   if (isset($this->nmgp_cmp_hidden['pendidikan']) && $this->nmgp_cmp_hidden['pendidikan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pendidikan']);
       $sStyleHidden_pendidikan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pendidikan = 'display: none;';
   $sStyleReadInp_pendidikan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pendidikan']) && $this->nmgp_cmp_readonly['pendidikan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pendidikan']);
       $sStyleReadLab_pendidikan = '';
       $sStyleReadInp_pendidikan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pendidikan']) && $this->nmgp_cmp_hidden['pendidikan'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pendidikan" value="<?php echo $this->form_encode_input($this->pendidikan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pendidikan_label" id="hidden_field_label_pendidikan" style="<?php echo $sStyleHidden_pendidikan; ?>"><span id="id_label_pendidikan"><?php echo $this->nm_new_label['pendidikan']; ?></span></TD>
    <TD class="scFormDataOdd css_pendidikan_line" id="hidden_field_data_pendidikan" style="<?php echo $sStyleHidden_pendidikan; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pendidikan_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pendidikan"]) &&  $this->nmgp_cmp_readonly["pendidikan"] == "on") { 

$pendidikan_look = "";
 if ($this->pendidikan == "SD") { $pendidikan_look .= "SD" ;} 
 if ($this->pendidikan == "SMP") { $pendidikan_look .= "SMP" ;} 
 if ($this->pendidikan == "SMA") { $pendidikan_look .= "SMA" ;} 
 if ($this->pendidikan == "DIPLOMA") { $pendidikan_look .= "DIPLOMA" ;} 
 if ($this->pendidikan == "SARJANA") { $pendidikan_look .= "SARJANA" ;} 
 if ($this->pendidikan == "PASCA SARJANA") { $pendidikan_look .= "PASCA SARJANA" ;} 
 if (empty($pendidikan_look)) { $pendidikan_look = $this->pendidikan; }
?>
<input type="hidden" name="pendidikan" value="<?php echo $this->form_encode_input($pendidikan) . "\">" . $pendidikan_look . ""; ?>
<?php } else { ?>
<?php

$pendidikan_look = "";
 if ($this->pendidikan == "SD") { $pendidikan_look .= "SD" ;} 
 if ($this->pendidikan == "SMP") { $pendidikan_look .= "SMP" ;} 
 if ($this->pendidikan == "SMA") { $pendidikan_look .= "SMA" ;} 
 if ($this->pendidikan == "DIPLOMA") { $pendidikan_look .= "DIPLOMA" ;} 
 if ($this->pendidikan == "SARJANA") { $pendidikan_look .= "SARJANA" ;} 
 if ($this->pendidikan == "PASCA SARJANA") { $pendidikan_look .= "PASCA SARJANA" ;} 
 if (empty($pendidikan_look)) { $pendidikan_look = $this->pendidikan; }
?>
<span id="id_read_on_pendidikan" class="css_pendidikan_line"  style="<?php echo $sStyleReadLab_pendidikan; ?>"><?php echo $this->form_encode_input($pendidikan_look); ?></span><span id="id_read_off_pendidikan" class="css_read_off_pendidikan" style="white-space: nowrap; <?php echo $sStyleReadInp_pendidikan; ?>">
 <span id="idAjaxSelect_pendidikan"><select class="sc-js-input scFormObjectOdd css_pendidikan_obj" style="" id="id_sc_field_pendidikan" name="pendidikan" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_pendidikan'][] = ''; ?>
 <option value=""></option>
 <option  value="SD" <?php  if ($this->pendidikan == "SD") { echo " selected" ;} ?>>SD</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_pendidikan'][] = 'SD'; ?>
 <option  value="SMP" <?php  if ($this->pendidikan == "SMP") { echo " selected" ;} ?>>SMP</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_pendidikan'][] = 'SMP'; ?>
 <option  value="SMA" <?php  if ($this->pendidikan == "SMA") { echo " selected" ;} ?>>SMA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_pendidikan'][] = 'SMA'; ?>
 <option  value="DIPLOMA" <?php  if ($this->pendidikan == "DIPLOMA") { echo " selected" ;} ?>>DIPLOMA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_pendidikan'][] = 'DIPLOMA'; ?>
 <option  value="SARJANA" <?php  if ($this->pendidikan == "SARJANA") { echo " selected" ;} ?>>SARJANA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_pendidikan'][] = 'SARJANA'; ?>
 <option  value="PASCA SARJANA" <?php  if ($this->pendidikan == "PASCA SARJANA") { echo " selected" ;} ?>>PASCA SARJANA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_pendidikan'][] = 'PASCA SARJANA'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pendidikan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pendidikan_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['agama']))
   {
       $this->nm_new_label['agama'] = "Agama";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agama = $this->agama;
   $sStyleHidden_agama = '';
   if (isset($this->nmgp_cmp_hidden['agama']) && $this->nmgp_cmp_hidden['agama'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agama']);
       $sStyleHidden_agama = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agama = 'display: none;';
   $sStyleReadInp_agama = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agama']) && $this->nmgp_cmp_readonly['agama'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agama']);
       $sStyleReadLab_agama = '';
       $sStyleReadInp_agama = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agama']) && $this->nmgp_cmp_hidden['agama'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="agama" value="<?php echo $this->form_encode_input($this->agama) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agama_label" id="hidden_field_label_agama" style="<?php echo $sStyleHidden_agama; ?>"><span id="id_label_agama"><?php echo $this->nm_new_label['agama']; ?></span></TD>
    <TD class="scFormDataOdd css_agama_line" id="hidden_field_data_agama" style="<?php echo $sStyleHidden_agama; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agama_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agama"]) &&  $this->nmgp_cmp_readonly["agama"] == "on") { 

$agama_look = "";
 if ($this->agama == "ISLAM") { $agama_look .= "ISLAM" ;} 
 if ($this->agama == "HINDU") { $agama_look .= "HINDU" ;} 
 if ($this->agama == "BUDHA") { $agama_look .= "BUDHA" ;} 
 if ($this->agama == "KRISTEN") { $agama_look .= "KRISTEN" ;} 
 if ($this->agama == "KATOLIK") { $agama_look .= "KATOLIK" ;} 
 if (empty($agama_look)) { $agama_look = $this->agama; }
?>
<input type="hidden" name="agama" value="<?php echo $this->form_encode_input($agama) . "\">" . $agama_look . ""; ?>
<?php } else { ?>
<?php

$agama_look = "";
 if ($this->agama == "ISLAM") { $agama_look .= "ISLAM" ;} 
 if ($this->agama == "HINDU") { $agama_look .= "HINDU" ;} 
 if ($this->agama == "BUDHA") { $agama_look .= "BUDHA" ;} 
 if ($this->agama == "KRISTEN") { $agama_look .= "KRISTEN" ;} 
 if ($this->agama == "KATOLIK") { $agama_look .= "KATOLIK" ;} 
 if (empty($agama_look)) { $agama_look = $this->agama; }
?>
<span id="id_read_on_agama" class="css_agama_line"  style="<?php echo $sStyleReadLab_agama; ?>"><?php echo $this->form_encode_input($agama_look); ?></span><span id="id_read_off_agama" class="css_read_off_agama" style="white-space: nowrap; <?php echo $sStyleReadInp_agama; ?>">
 <span id="idAjaxSelect_agama"><select class="sc-js-input scFormObjectOdd css_agama_obj" style="" id="id_sc_field_agama" name="agama" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_agama'][] = ''; ?>
 <option value=""></option>
 <option  value="ISLAM" <?php  if ($this->agama == "ISLAM") { echo " selected" ;} ?>>ISLAM</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_agama'][] = 'ISLAM'; ?>
 <option  value="HINDU" <?php  if ($this->agama == "HINDU") { echo " selected" ;} ?>>HINDU</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_agama'][] = 'HINDU'; ?>
 <option  value="BUDHA" <?php  if ($this->agama == "BUDHA") { echo " selected" ;} ?>>BUDHA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_agama'][] = 'BUDHA'; ?>
 <option  value="KRISTEN" <?php  if ($this->agama == "KRISTEN") { echo " selected" ;} ?>>KRISTEN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_agama'][] = 'KRISTEN'; ?>
 <option  value="KATOLIK" <?php  if ($this->agama == "KATOLIK") { echo " selected" ;} ?>>KATOLIK</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_agama'][] = 'KATOLIK'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agama_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agama_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['jk']))
   {
       $this->nm_new_label['jk'] = "Jenis Kelamin";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jk = $this->jk;
   $sStyleHidden_jk = '';
   if (isset($this->nmgp_cmp_hidden['jk']) && $this->nmgp_cmp_hidden['jk'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jk']);
       $sStyleHidden_jk = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jk = 'display: none;';
   $sStyleReadInp_jk = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jk']) && $this->nmgp_cmp_readonly['jk'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jk']);
       $sStyleReadLab_jk = '';
       $sStyleReadInp_jk = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jk']) && $this->nmgp_cmp_hidden['jk'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="jk" value="<?php echo $this->form_encode_input($this->jk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_jk_label" id="hidden_field_label_jk" style="<?php echo $sStyleHidden_jk; ?>"><span id="id_label_jk"><?php echo $this->nm_new_label['jk']; ?></span></TD>
    <TD class="scFormDataOdd css_jk_line" id="hidden_field_data_jk" style="<?php echo $sStyleHidden_jk; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_jk_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jk"]) &&  $this->nmgp_cmp_readonly["jk"] == "on") { 

$jk_look = "";
 if ($this->jk == "L") { $jk_look .= "LAKI-LAKI" ;} 
 if ($this->jk == "P") { $jk_look .= "PEREMPUAN" ;} 
 if (empty($jk_look)) { $jk_look = $this->jk; }
?>
<input type="hidden" name="jk" value="<?php echo $this->form_encode_input($jk) . "\">" . $jk_look . ""; ?>
<?php } else { ?>
<?php

$jk_look = "";
 if ($this->jk == "L") { $jk_look .= "LAKI-LAKI" ;} 
 if ($this->jk == "P") { $jk_look .= "PEREMPUAN" ;} 
 if (empty($jk_look)) { $jk_look = $this->jk; }
?>
<span id="id_read_on_jk" class="css_jk_line"  style="<?php echo $sStyleReadLab_jk; ?>"><?php echo $this->form_encode_input($jk_look); ?></span><span id="id_read_off_jk" class="css_read_off_jk" style="white-space: nowrap; <?php echo $sStyleReadInp_jk; ?>">
 <span id="idAjaxSelect_jk"><select class="sc-js-input scFormObjectOdd css_jk_obj" style="" id="id_sc_field_jk" name="jk" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="L" <?php  if ($this->jk == "L") { echo " selected" ;} ?>>LAKI-LAKI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_jk'][] = 'L'; ?>
 <option  value="P" <?php  if ($this->jk == "P") { echo " selected" ;} ?>>PEREMPUAN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_jk'][] = 'P'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jk_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jk_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idno']))
    {
        $this->nm_new_label['idno'] = "KTP/SIM";
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
    <TD class="scFormDataOdd css_idno_line" id="hidden_field_data_idno" style="<?php echo $sStyleHidden_idno; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idno_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idno"]) &&  $this->nmgp_cmp_readonly["idno"] == "on") { 

 ?>
<input type="hidden" name="idno" value="<?php echo $this->form_encode_input($idno) . "\">" . $idno . ""; ?>
<?php } else { ?>
<span id="id_read_on_idno" class="sc-ui-readonly-idno css_idno_line" style="<?php echo $sStyleReadLab_idno; ?>"><?php echo $this->idno; ?></span><span id="id_read_off_idno" class="css_read_off_idno" style="white-space: nowrap;<?php echo $sStyleReadInp_idno; ?>">
 <input class="sc-js-input scFormObjectOdd css_idno_obj" style="" id="id_sc_field_idno" type=text name="idno" value="<?php echo $this->form_encode_input($idno) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idno_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['goldar']))
   {
       $this->nm_new_label['goldar'] = "Golongan Darah";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $goldar = $this->goldar;
   $sStyleHidden_goldar = '';
   if (isset($this->nmgp_cmp_hidden['goldar']) && $this->nmgp_cmp_hidden['goldar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['goldar']);
       $sStyleHidden_goldar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_goldar = 'display: none;';
   $sStyleReadInp_goldar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['goldar']) && $this->nmgp_cmp_readonly['goldar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['goldar']);
       $sStyleReadLab_goldar = '';
       $sStyleReadInp_goldar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['goldar']) && $this->nmgp_cmp_hidden['goldar'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="goldar" value="<?php echo $this->form_encode_input($this->goldar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_goldar_label" id="hidden_field_label_goldar" style="<?php echo $sStyleHidden_goldar; ?>"><span id="id_label_goldar"><?php echo $this->nm_new_label['goldar']; ?></span></TD>
    <TD class="scFormDataOdd css_goldar_line" id="hidden_field_data_goldar" style="<?php echo $sStyleHidden_goldar; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_goldar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["goldar"]) &&  $this->nmgp_cmp_readonly["goldar"] == "on") { 

$goldar_look = "";
 if ($this->goldar == "A") { $goldar_look .= "A" ;} 
 if ($this->goldar == "B") { $goldar_look .= "B" ;} 
 if ($this->goldar == "A/B") { $goldar_look .= "A/B" ;} 
 if ($this->goldar == "O") { $goldar_look .= "O" ;} 
 if (empty($goldar_look)) { $goldar_look = $this->goldar; }
?>
<input type="hidden" name="goldar" value="<?php echo $this->form_encode_input($goldar) . "\">" . $goldar_look . ""; ?>
<?php } else { ?>
<?php

$goldar_look = "";
 if ($this->goldar == "A") { $goldar_look .= "A" ;} 
 if ($this->goldar == "B") { $goldar_look .= "B" ;} 
 if ($this->goldar == "A/B") { $goldar_look .= "A/B" ;} 
 if ($this->goldar == "O") { $goldar_look .= "O" ;} 
 if (empty($goldar_look)) { $goldar_look = $this->goldar; }
?>
<span id="id_read_on_goldar" class="css_goldar_line"  style="<?php echo $sStyleReadLab_goldar; ?>"><?php echo $this->form_encode_input($goldar_look); ?></span><span id="id_read_off_goldar" class="css_read_off_goldar" style="white-space: nowrap; <?php echo $sStyleReadInp_goldar; ?>">
 <span id="idAjaxSelect_goldar"><select class="sc-js-input scFormObjectOdd css_goldar_obj" style="" id="id_sc_field_goldar" name="goldar" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_goldar'][] = ''; ?>
 <option value=""></option>
 <option  value="A" <?php  if ($this->goldar == "A") { echo " selected" ;} ?>>A</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_goldar'][] = 'A'; ?>
 <option  value="B" <?php  if ($this->goldar == "B") { echo " selected" ;} ?>>B</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_goldar'][] = 'B'; ?>
 <option  value="A/B" <?php  if ($this->goldar == "A/B") { echo " selected" ;} ?>>A/B</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_goldar'][] = 'A/B'; ?>
 <option  value="O" <?php  if ($this->goldar == "O") { echo " selected" ;} ?>>O</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_goldar'][] = 'O'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_goldar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_goldar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telp']))
    {
        $this->nm_new_label['telp'] = "Telp/HP";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telp = $this->telp;
   $sStyleHidden_telp = '';
   if (isset($this->nmgp_cmp_hidden['telp']) && $this->nmgp_cmp_hidden['telp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telp']);
       $sStyleHidden_telp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telp = 'display: none;';
   $sStyleReadInp_telp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telp']) && $this->nmgp_cmp_readonly['telp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telp']);
       $sStyleReadLab_telp = '';
       $sStyleReadInp_telp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telp']) && $this->nmgp_cmp_hidden['telp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telp" value="<?php echo $this->form_encode_input($telp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_telp_label" id="hidden_field_label_telp" style="<?php echo $sStyleHidden_telp; ?>"><span id="id_label_telp"><?php echo $this->nm_new_label['telp']; ?></span></TD>
    <TD class="scFormDataOdd css_telp_line" id="hidden_field_data_telp" style="<?php echo $sStyleHidden_telp; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telp"]) &&  $this->nmgp_cmp_readonly["telp"] == "on") { 

 ?>
<input type="hidden" name="telp" value="<?php echo $this->form_encode_input($telp) . "\">" . $telp . ""; ?>
<?php } else { ?>
<span id="id_read_on_telp" class="sc-ui-readonly-telp css_telp_line" style="<?php echo $sStyleReadLab_telp; ?>"><?php echo $this->telp; ?></span><span id="id_read_off_telp" class="css_read_off_telp" style="white-space: nowrap;<?php echo $sStyleReadInp_telp; ?>">
 <input class="sc-js-input scFormObjectOdd css_telp_obj" style="" id="id_sc_field_telp" type=text name="telp" value="<?php echo $this->form_encode_input($telp) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telp_text"></span></td></tr></table></td></tr></table></TD>
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
        $this->nm_new_label['npwp'] = "No. NPWP";
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
    <TD class="scFormDataOdd css_npwp_line" id="hidden_field_data_npwp" style="<?php echo $sStyleHidden_npwp; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_npwp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["npwp"]) &&  $this->nmgp_cmp_readonly["npwp"] == "on") { 

 ?>
<input type="hidden" name="npwp" value="<?php echo $this->form_encode_input($npwp) . "\">" . $npwp . ""; ?>
<?php } else { ?>
<span id="id_read_on_npwp" class="sc-ui-readonly-npwp css_npwp_line" style="<?php echo $sStyleReadLab_npwp; ?>"><?php echo $this->npwp; ?></span><span id="id_read_off_npwp" class="css_read_off_npwp" style="white-space: nowrap;<?php echo $sStyleReadInp_npwp; ?>">
 <input class="sc-js-input scFormObjectOdd css_npwp_obj" style="" id="id_sc_field_npwp" type=text name="npwp" value="<?php echo $this->form_encode_input($npwp) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789.") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_npwp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_npwp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['alamat']))
    {
        $this->nm_new_label['alamat'] = "Alamat";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['alamat']) && $this->nmgp_cmp_hidden['alamat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="alamat" value="<?php echo $this->form_encode_input($alamat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_alamat_label" id="hidden_field_label_alamat" style="<?php echo $sStyleHidden_alamat; ?>"><span id="id_label_alamat"><?php echo $this->nm_new_label['alamat']; ?></span></TD>
    <TD class="scFormDataOdd css_alamat_line" id="hidden_field_data_alamat" style="<?php echo $sStyleHidden_alamat; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_alamat_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["alamat"]) &&  $this->nmgp_cmp_readonly["alamat"] == "on") { 

 ?>
<input type="hidden" name="alamat" value="<?php echo $this->form_encode_input($alamat) . "\">" . $alamat . ""; ?>
<?php } else { ?>
<span id="id_read_on_alamat" class="sc-ui-readonly-alamat css_alamat_line" style="<?php echo $sStyleReadLab_alamat; ?>"><?php echo $this->alamat; ?></span><span id="id_read_off_alamat" class="css_read_off_alamat" style="white-space: nowrap;<?php echo $sStyleReadInp_alamat; ?>">
 <input class="sc-js-input scFormObjectOdd css_alamat_obj" style="" id="id_sc_field_alamat" type=text name="alamat" value="<?php echo $this->form_encode_input($alamat) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_alamat_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_alamat_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="50%" height="">
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
    if (!isset($this->nm_new_label['emgalamat']))
    {
        $this->nm_new_label['emgalamat'] = "Alamat Kontak Darurat";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emgalamat = $this->emgalamat;
   $sStyleHidden_emgalamat = '';
   if (isset($this->nmgp_cmp_hidden['emgalamat']) && $this->nmgp_cmp_hidden['emgalamat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emgalamat']);
       $sStyleHidden_emgalamat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emgalamat = 'display: none;';
   $sStyleReadInp_emgalamat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emgalamat']) && $this->nmgp_cmp_readonly['emgalamat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emgalamat']);
       $sStyleReadLab_emgalamat = '';
       $sStyleReadInp_emgalamat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emgalamat']) && $this->nmgp_cmp_hidden['emgalamat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emgalamat" value="<?php echo $this->form_encode_input($emgalamat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_emgalamat_label" id="hidden_field_label_emgalamat" style="<?php echo $sStyleHidden_emgalamat; ?>"><span id="id_label_emgalamat"><?php echo $this->nm_new_label['emgalamat']; ?></span></TD>
    <TD class="scFormDataOdd css_emgalamat_line" id="hidden_field_data_emgalamat" style="<?php echo $sStyleHidden_emgalamat; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emgalamat_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emgalamat"]) &&  $this->nmgp_cmp_readonly["emgalamat"] == "on") { 

 ?>
<input type="hidden" name="emgalamat" value="<?php echo $this->form_encode_input($emgalamat) . "\">" . $emgalamat . ""; ?>
<?php } else { ?>
<span id="id_read_on_emgalamat" class="sc-ui-readonly-emgalamat css_emgalamat_line" style="<?php echo $sStyleReadLab_emgalamat; ?>"><?php echo $this->emgalamat; ?></span><span id="id_read_off_emgalamat" class="css_read_off_emgalamat" style="white-space: nowrap;<?php echo $sStyleReadInp_emgalamat; ?>">
 <input class="sc-js-input scFormObjectOdd css_emgalamat_obj" style="" id="id_sc_field_emgalamat" type=text name="emgalamat" value="<?php echo $this->form_encode_input($emgalamat) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emgalamat_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emgalamat_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emgnama']))
    {
        $this->nm_new_label['emgnama'] = "Nama Kontrak Darurat";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emgnama = $this->emgnama;
   $sStyleHidden_emgnama = '';
   if (isset($this->nmgp_cmp_hidden['emgnama']) && $this->nmgp_cmp_hidden['emgnama'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emgnama']);
       $sStyleHidden_emgnama = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emgnama = 'display: none;';
   $sStyleReadInp_emgnama = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emgnama']) && $this->nmgp_cmp_readonly['emgnama'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emgnama']);
       $sStyleReadLab_emgnama = '';
       $sStyleReadInp_emgnama = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emgnama']) && $this->nmgp_cmp_hidden['emgnama'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emgnama" value="<?php echo $this->form_encode_input($emgnama) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_emgnama_label" id="hidden_field_label_emgnama" style="<?php echo $sStyleHidden_emgnama; ?>"><span id="id_label_emgnama"><?php echo $this->nm_new_label['emgnama']; ?></span></TD>
    <TD class="scFormDataOdd css_emgnama_line" id="hidden_field_data_emgnama" style="<?php echo $sStyleHidden_emgnama; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emgnama_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emgnama"]) &&  $this->nmgp_cmp_readonly["emgnama"] == "on") { 

 ?>
<input type="hidden" name="emgnama" value="<?php echo $this->form_encode_input($emgnama) . "\">" . $emgnama . ""; ?>
<?php } else { ?>
<span id="id_read_on_emgnama" class="sc-ui-readonly-emgnama css_emgnama_line" style="<?php echo $sStyleReadLab_emgnama; ?>"><?php echo $this->emgnama; ?></span><span id="id_read_off_emgnama" class="css_read_off_emgnama" style="white-space: nowrap;<?php echo $sStyleReadInp_emgnama; ?>">
 <input class="sc-js-input scFormObjectOdd css_emgnama_obj" style="" id="id_sc_field_emgnama" type=text name="emgnama" value="<?php echo $this->form_encode_input($emgnama) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emgnama_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emgnama_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['statustt']))
   {
       $this->nm_new_label['statustt'] = "Status Tempat Tinggal";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $statustt = $this->statustt;
   $sStyleHidden_statustt = '';
   if (isset($this->nmgp_cmp_hidden['statustt']) && $this->nmgp_cmp_hidden['statustt'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['statustt']);
       $sStyleHidden_statustt = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_statustt = 'display: none;';
   $sStyleReadInp_statustt = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['statustt']) && $this->nmgp_cmp_readonly['statustt'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['statustt']);
       $sStyleReadLab_statustt = '';
       $sStyleReadInp_statustt = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['statustt']) && $this->nmgp_cmp_hidden['statustt'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="statustt" value="<?php echo $this->form_encode_input($this->statustt) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_statustt_label" id="hidden_field_label_statustt" style="<?php echo $sStyleHidden_statustt; ?>"><span id="id_label_statustt"><?php echo $this->nm_new_label['statustt']; ?></span></TD>
    <TD class="scFormDataOdd css_statustt_line" id="hidden_field_data_statustt" style="<?php echo $sStyleHidden_statustt; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_statustt_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["statustt"]) &&  $this->nmgp_cmp_readonly["statustt"] == "on") { 

$statustt_look = "";
 if ($this->statustt == "PRIBADI") { $statustt_look .= "PRIBADI" ;} 
 if ($this->statustt == "ORANG TUA") { $statustt_look .= "ORANG TUA" ;} 
 if ($this->statustt == "KONTRAK") { $statustt_look .= "KONTRAK" ;} 
 if (empty($statustt_look)) { $statustt_look = $this->statustt; }
?>
<input type="hidden" name="statustt" value="<?php echo $this->form_encode_input($statustt) . "\">" . $statustt_look . ""; ?>
<?php } else { ?>
<?php

$statustt_look = "";
 if ($this->statustt == "PRIBADI") { $statustt_look .= "PRIBADI" ;} 
 if ($this->statustt == "ORANG TUA") { $statustt_look .= "ORANG TUA" ;} 
 if ($this->statustt == "KONTRAK") { $statustt_look .= "KONTRAK" ;} 
 if (empty($statustt_look)) { $statustt_look = $this->statustt; }
?>
<span id="id_read_on_statustt" class="css_statustt_line"  style="<?php echo $sStyleReadLab_statustt; ?>"><?php echo $this->form_encode_input($statustt_look); ?></span><span id="id_read_off_statustt" class="css_read_off_statustt" style="white-space: nowrap; <?php echo $sStyleReadInp_statustt; ?>">
 <span id="idAjaxSelect_statustt"><select class="sc-js-input scFormObjectOdd css_statustt_obj" style="" id="id_sc_field_statustt" name="statustt" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_statustt'][] = ''; ?>
 <option value=""></option>
 <option  value="PRIBADI" <?php  if ($this->statustt == "PRIBADI") { echo " selected" ;} ?>>PRIBADI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_statustt'][] = 'PRIBADI'; ?>
 <option  value="ORANG TUA" <?php  if ($this->statustt == "ORANG TUA") { echo " selected" ;} ?>>ORANG TUA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_statustt'][] = 'ORANG TUA'; ?>
 <option  value="KONTRAK" <?php  if ($this->statustt == "KONTRAK") { echo " selected" ;} ?>>KONTRAK</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_statustt'][] = 'KONTRAK'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_statustt_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_statustt_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['kbm']))
   {
       $this->nm_new_label['kbm'] = "Kendaraan Bermotor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kbm = $this->kbm;
   $sStyleHidden_kbm = '';
   if (isset($this->nmgp_cmp_hidden['kbm']) && $this->nmgp_cmp_hidden['kbm'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kbm']);
       $sStyleHidden_kbm = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kbm = 'display: none;';
   $sStyleReadInp_kbm = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kbm']) && $this->nmgp_cmp_readonly['kbm'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kbm']);
       $sStyleReadLab_kbm = '';
       $sStyleReadInp_kbm = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kbm']) && $this->nmgp_cmp_hidden['kbm'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="kbm" value="<?php echo $this->form_encode_input($this->kbm) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kbm_label" id="hidden_field_label_kbm" style="<?php echo $sStyleHidden_kbm; ?>"><span id="id_label_kbm"><?php echo $this->nm_new_label['kbm']; ?></span></TD>
    <TD class="scFormDataOdd css_kbm_line" id="hidden_field_data_kbm" style="<?php echo $sStyleHidden_kbm; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kbm_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kbm"]) &&  $this->nmgp_cmp_readonly["kbm"] == "on") { 

$kbm_look = "";
 if ($this->kbm == "Tidak Punya") { $kbm_look .= "Tidak Punya" ;} 
 if ($this->kbm == "Motor") { $kbm_look .= "Motor" ;} 
 if ($this->kbm == "Mobil") { $kbm_look .= "Mobil" ;} 
 if (empty($kbm_look)) { $kbm_look = $this->kbm; }
?>
<input type="hidden" name="kbm" value="<?php echo $this->form_encode_input($kbm) . "\">" . $kbm_look . ""; ?>
<?php } else { ?>
<?php

$kbm_look = "";
 if ($this->kbm == "Tidak Punya") { $kbm_look .= "Tidak Punya" ;} 
 if ($this->kbm == "Motor") { $kbm_look .= "Motor" ;} 
 if ($this->kbm == "Mobil") { $kbm_look .= "Mobil" ;} 
 if (empty($kbm_look)) { $kbm_look = $this->kbm; }
?>
<span id="id_read_on_kbm" class="css_kbm_line"  style="<?php echo $sStyleReadLab_kbm; ?>"><?php echo $this->form_encode_input($kbm_look); ?></span><span id="id_read_off_kbm" class="css_read_off_kbm" style="white-space: nowrap; <?php echo $sStyleReadInp_kbm; ?>">
 <span id="idAjaxSelect_kbm"><select class="sc-js-input scFormObjectOdd css_kbm_obj" style="" id="id_sc_field_kbm" name="kbm" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_kbm'][] = ''; ?>
 <option value=""></option>
 <option  value="Tidak Punya" <?php  if ($this->kbm == "Tidak Punya") { echo " selected" ;} ?>>Tidak Punya</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_kbm'][] = 'Tidak Punya'; ?>
 <option  value="Motor" <?php  if ($this->kbm == "Motor") { echo " selected" ;} ?>>Motor</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_kbm'][] = 'Motor'; ?>
 <option  value="Mobil" <?php  if ($this->kbm == "Mobil") { echo " selected" ;} ?>>Mobil</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_kbm'][] = 'Mobil'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kbm_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kbm_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fisikbb']))
    {
        $this->nm_new_label['fisikbb'] = "Berat Badan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fisikbb = $this->fisikbb;
   $sStyleHidden_fisikbb = '';
   if (isset($this->nmgp_cmp_hidden['fisikbb']) && $this->nmgp_cmp_hidden['fisikbb'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fisikbb']);
       $sStyleHidden_fisikbb = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fisikbb = 'display: none;';
   $sStyleReadInp_fisikbb = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fisikbb']) && $this->nmgp_cmp_readonly['fisikbb'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fisikbb']);
       $sStyleReadLab_fisikbb = '';
       $sStyleReadInp_fisikbb = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fisikbb']) && $this->nmgp_cmp_hidden['fisikbb'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fisikbb" value="<?php echo $this->form_encode_input($fisikbb) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fisikbb_label" id="hidden_field_label_fisikbb" style="<?php echo $sStyleHidden_fisikbb; ?>"><span id="id_label_fisikbb"><?php echo $this->nm_new_label['fisikbb']; ?></span></TD>
    <TD class="scFormDataOdd css_fisikbb_line" id="hidden_field_data_fisikbb" style="<?php echo $sStyleHidden_fisikbb; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fisikbb_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fisikbb"]) &&  $this->nmgp_cmp_readonly["fisikbb"] == "on") { 

 ?>
<input type="hidden" name="fisikbb" value="<?php echo $this->form_encode_input($fisikbb) . "\">" . $fisikbb . ""; ?>
<?php } else { ?>
<span id="id_read_on_fisikbb" class="sc-ui-readonly-fisikbb css_fisikbb_line" style="<?php echo $sStyleReadLab_fisikbb; ?>"><?php echo $this->fisikbb; ?></span><span id="id_read_off_fisikbb" class="css_read_off_fisikbb" style="white-space: nowrap;<?php echo $sStyleReadInp_fisikbb; ?>">
 <input class="sc-js-input scFormObjectOdd css_fisikbb_obj" style="" id="id_sc_field_fisikbb" type=text name="fisikbb" value="<?php echo $this->form_encode_input($fisikbb) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['fisikbb']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['fisikbb']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_fisikbb_label scFormDataHelpOdd">&nbsp;kg
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fisikbb_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fisikbb_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fisiktb']))
    {
        $this->nm_new_label['fisiktb'] = "Tinggi Badan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fisiktb = $this->fisiktb;
   $sStyleHidden_fisiktb = '';
   if (isset($this->nmgp_cmp_hidden['fisiktb']) && $this->nmgp_cmp_hidden['fisiktb'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fisiktb']);
       $sStyleHidden_fisiktb = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fisiktb = 'display: none;';
   $sStyleReadInp_fisiktb = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fisiktb']) && $this->nmgp_cmp_readonly['fisiktb'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fisiktb']);
       $sStyleReadLab_fisiktb = '';
       $sStyleReadInp_fisiktb = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fisiktb']) && $this->nmgp_cmp_hidden['fisiktb'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fisiktb" value="<?php echo $this->form_encode_input($fisiktb) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fisiktb_label" id="hidden_field_label_fisiktb" style="<?php echo $sStyleHidden_fisiktb; ?>"><span id="id_label_fisiktb"><?php echo $this->nm_new_label['fisiktb']; ?></span></TD>
    <TD class="scFormDataOdd css_fisiktb_line" id="hidden_field_data_fisiktb" style="<?php echo $sStyleHidden_fisiktb; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fisiktb_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fisiktb"]) &&  $this->nmgp_cmp_readonly["fisiktb"] == "on") { 

 ?>
<input type="hidden" name="fisiktb" value="<?php echo $this->form_encode_input($fisiktb) . "\">" . $fisiktb . ""; ?>
<?php } else { ?>
<span id="id_read_on_fisiktb" class="sc-ui-readonly-fisiktb css_fisiktb_line" style="<?php echo $sStyleReadLab_fisiktb; ?>"><?php echo $this->fisiktb; ?></span><span id="id_read_off_fisiktb" class="css_read_off_fisiktb" style="white-space: nowrap;<?php echo $sStyleReadInp_fisiktb; ?>">
 <input class="sc-js-input scFormObjectOdd css_fisiktb_obj" style="" id="id_sc_field_fisiktb" type=text name="fisiktb" value="<?php echo $this->form_encode_input($fisiktb) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['fisiktb']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['fisiktb']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_fisiktb_label scFormDataHelpOdd">&nbsp;cm
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fisiktb_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fisiktb_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['kacamata']))
   {
       $this->nm_new_label['kacamata'] = "Kacamata ?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kacamata = $this->kacamata;
   $sStyleHidden_kacamata = '';
   if (isset($this->nmgp_cmp_hidden['kacamata']) && $this->nmgp_cmp_hidden['kacamata'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kacamata']);
       $sStyleHidden_kacamata = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kacamata = 'display: none;';
   $sStyleReadInp_kacamata = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kacamata']) && $this->nmgp_cmp_readonly['kacamata'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kacamata']);
       $sStyleReadLab_kacamata = '';
       $sStyleReadInp_kacamata = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kacamata']) && $this->nmgp_cmp_hidden['kacamata'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="kacamata" value="<?php echo $this->form_encode_input($this->kacamata) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kacamata_label" id="hidden_field_label_kacamata" style="<?php echo $sStyleHidden_kacamata; ?>"><span id="id_label_kacamata"><?php echo $this->nm_new_label['kacamata']; ?></span></TD>
    <TD class="scFormDataOdd css_kacamata_line" id="hidden_field_data_kacamata" style="<?php echo $sStyleHidden_kacamata; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kacamata_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kacamata"]) &&  $this->nmgp_cmp_readonly["kacamata"] == "on") { 

$kacamata_look = "";
 if ($this->kacamata == "Y") { $kacamata_look .= "Ya" ;} 
 if ($this->kacamata == "N") { $kacamata_look .= "Tidak" ;} 
 if (empty($kacamata_look)) { $kacamata_look = $this->kacamata; }
?>
<input type="hidden" name="kacamata" value="<?php echo $this->form_encode_input($kacamata) . "\">" . $kacamata_look . ""; ?>
<?php } else { ?>
<?php

$kacamata_look = "";
 if ($this->kacamata == "Y") { $kacamata_look .= "Ya" ;} 
 if ($this->kacamata == "N") { $kacamata_look .= "Tidak" ;} 
 if (empty($kacamata_look)) { $kacamata_look = $this->kacamata; }
?>
<span id="id_read_on_kacamata" class="css_kacamata_line"  style="<?php echo $sStyleReadLab_kacamata; ?>"><?php echo $this->form_encode_input($kacamata_look); ?></span><span id="id_read_off_kacamata" class="css_read_off_kacamata" style="white-space: nowrap; <?php echo $sStyleReadInp_kacamata; ?>">
 <span id="idAjaxSelect_kacamata"><select class="sc-js-input scFormObjectOdd css_kacamata_obj" style="" id="id_sc_field_kacamata" name="kacamata" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_kacamata'][] = ''; ?>
 <option value=""></option>
 <option  value="Y" <?php  if ($this->kacamata == "Y") { echo " selected" ;} ?>>Ya</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_kacamata'][] = 'Y'; ?>
 <option  value="N" <?php  if ($this->kacamata == "N") { echo " selected" ;} ?>>Tidak</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_kacamata'][] = 'N'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kacamata_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kacamata_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['pidana']))
   {
       $this->nm_new_label['pidana'] = "Kasus Pidana";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pidana = $this->pidana;
   $sStyleHidden_pidana = '';
   if (isset($this->nmgp_cmp_hidden['pidana']) && $this->nmgp_cmp_hidden['pidana'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pidana']);
       $sStyleHidden_pidana = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pidana = 'display: none;';
   $sStyleReadInp_pidana = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pidana']) && $this->nmgp_cmp_readonly['pidana'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pidana']);
       $sStyleReadLab_pidana = '';
       $sStyleReadInp_pidana = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pidana']) && $this->nmgp_cmp_hidden['pidana'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pidana" value="<?php echo $this->form_encode_input($this->pidana) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pidana_label" id="hidden_field_label_pidana" style="<?php echo $sStyleHidden_pidana; ?>"><span id="id_label_pidana"><?php echo $this->nm_new_label['pidana']; ?></span></TD>
    <TD class="scFormDataOdd css_pidana_line" id="hidden_field_data_pidana" style="<?php echo $sStyleHidden_pidana; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pidana_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pidana"]) &&  $this->nmgp_cmp_readonly["pidana"] == "on") { 

$pidana_look = "";
 if ($this->pidana == "Y") { $pidana_look .= "Ya" ;} 
 if ($this->pidana == "N") { $pidana_look .= "Tidak" ;} 
 if (empty($pidana_look)) { $pidana_look = $this->pidana; }
?>
<input type="hidden" name="pidana" value="<?php echo $this->form_encode_input($pidana) . "\">" . $pidana_look . ""; ?>
<?php } else { ?>
<?php

$pidana_look = "";
 if ($this->pidana == "Y") { $pidana_look .= "Ya" ;} 
 if ($this->pidana == "N") { $pidana_look .= "Tidak" ;} 
 if (empty($pidana_look)) { $pidana_look = $this->pidana; }
?>
<span id="id_read_on_pidana" class="css_pidana_line"  style="<?php echo $sStyleReadLab_pidana; ?>"><?php echo $this->form_encode_input($pidana_look); ?></span><span id="id_read_off_pidana" class="css_read_off_pidana" style="white-space: nowrap; <?php echo $sStyleReadInp_pidana; ?>">
 <span id="idAjaxSelect_pidana"><select class="sc-js-input scFormObjectOdd css_pidana_obj" style="" id="id_sc_field_pidana" name="pidana" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_pidana'][] = ''; ?>
 <option value=""></option>
 <option  value="Y" <?php  if ($this->pidana == "Y") { echo " selected" ;} ?>>Ya</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_pidana'][] = 'Y'; ?>
 <option  value="N" <?php  if ($this->pidana == "N") { echo " selected" ;} ?>>Tidak</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['Lookup_pidana'][] = 'N'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pidana_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pidana_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pidanakasus']))
    {
        $this->nm_new_label['pidanakasus'] = "Pidana Kasus";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pidanakasus = $this->pidanakasus;
   $sStyleHidden_pidanakasus = '';
   if (isset($this->nmgp_cmp_hidden['pidanakasus']) && $this->nmgp_cmp_hidden['pidanakasus'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pidanakasus']);
       $sStyleHidden_pidanakasus = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pidanakasus = 'display: none;';
   $sStyleReadInp_pidanakasus = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pidanakasus']) && $this->nmgp_cmp_readonly['pidanakasus'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pidanakasus']);
       $sStyleReadLab_pidanakasus = '';
       $sStyleReadInp_pidanakasus = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pidanakasus']) && $this->nmgp_cmp_hidden['pidanakasus'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pidanakasus" value="<?php echo $this->form_encode_input($pidanakasus) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pidanakasus_label" id="hidden_field_label_pidanakasus" style="<?php echo $sStyleHidden_pidanakasus; ?>"><span id="id_label_pidanakasus"><?php echo $this->nm_new_label['pidanakasus']; ?></span></TD>
    <TD class="scFormDataOdd css_pidanakasus_line" id="hidden_field_data_pidanakasus" style="<?php echo $sStyleHidden_pidanakasus; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pidanakasus_line" style="vertical-align: top;padding: 0px">
<?php
$pidanakasus_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($pidanakasus));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pidanakasus"]) &&  $this->nmgp_cmp_readonly["pidanakasus"] == "on") { 

 ?>
<input type="hidden" name="pidanakasus" value="<?php echo $this->form_encode_input($pidanakasus) . "\">" . $pidanakasus_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_pidanakasus" class="sc-ui-readonly-pidanakasus css_pidanakasus_line" style="<?php echo $sStyleReadLab_pidanakasus; ?>"><?php echo $pidanakasus_val; ?></span><span id="id_read_off_pidanakasus" class="css_read_off_pidanakasus" style="white-space: nowrap;<?php echo $sStyleReadInp_pidanakasus; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_pidanakasus_obj" style="white-space: pre-wrap;" name="pidanakasus" id="id_sc_field_pidanakasus" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $pidanakasus; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pidanakasus_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pidanakasus_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['kantorspouse']))
    {
        $this->nm_new_label['kantorspouse'] = "Alamat Kantor Suami/Istri";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kantorspouse = $this->kantorspouse;
   $sStyleHidden_kantorspouse = '';
   if (isset($this->nmgp_cmp_hidden['kantorspouse']) && $this->nmgp_cmp_hidden['kantorspouse'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kantorspouse']);
       $sStyleHidden_kantorspouse = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kantorspouse = 'display: none;';
   $sStyleReadInp_kantorspouse = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kantorspouse']) && $this->nmgp_cmp_readonly['kantorspouse'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kantorspouse']);
       $sStyleReadLab_kantorspouse = '';
       $sStyleReadInp_kantorspouse = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kantorspouse']) && $this->nmgp_cmp_hidden['kantorspouse'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kantorspouse" value="<?php echo $this->form_encode_input($kantorspouse) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kantorspouse_label" id="hidden_field_label_kantorspouse" style="<?php echo $sStyleHidden_kantorspouse; ?>"><span id="id_label_kantorspouse"><?php echo $this->nm_new_label['kantorspouse']; ?></span></TD>
    <TD class="scFormDataOdd css_kantorspouse_line" id="hidden_field_data_kantorspouse" style="<?php echo $sStyleHidden_kantorspouse; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kantorspouse_line" style="vertical-align: top;padding: 0px">
<?php
$kantorspouse_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($kantorspouse));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kantorspouse"]) &&  $this->nmgp_cmp_readonly["kantorspouse"] == "on") { 

 ?>
<input type="hidden" name="kantorspouse" value="<?php echo $this->form_encode_input($kantorspouse) . "\">" . $kantorspouse_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_kantorspouse" class="sc-ui-readonly-kantorspouse css_kantorspouse_line" style="<?php echo $sStyleReadLab_kantorspouse; ?>"><?php echo $kantorspouse_val; ?></span><span id="id_read_off_kantorspouse" class="css_read_off_kantorspouse" style="white-space: nowrap;<?php echo $sStyleReadInp_kantorspouse; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_kantorspouse_obj" style="white-space: pre-wrap;" name="kantorspouse" id="id_sc_field_kantorspouse" rows="2" cols="35"
 alt="{datatype: 'text', maxLength: 35, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $kantorspouse; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kantorspouse_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kantorspouse_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['photo']))
    {
        $this->nm_new_label['photo'] = "Foto Karyawan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $photo = $this->photo;
   $sStyleHidden_photo = '';
   if (isset($this->nmgp_cmp_hidden['photo']) && $this->nmgp_cmp_hidden['photo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['photo']);
       $sStyleHidden_photo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_photo = 'display: none;';
   $sStyleReadInp_photo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['photo']) && $this->nmgp_cmp_readonly['photo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['photo']);
       $sStyleReadLab_photo = '';
       $sStyleReadInp_photo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['photo']) && $this->nmgp_cmp_hidden['photo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="photo" value="<?php echo $this->form_encode_input($photo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_photo_label" id="hidden_field_label_photo" style="<?php echo $sStyleHidden_photo; ?>"><span id="id_label_photo"><?php echo $this->nm_new_label['photo']; ?></span></TD>
    <TD class="scFormDataOdd css_photo_line" id="hidden_field_data_photo" style="<?php echo $sStyleHidden_photo; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_photo_line" style="vertical-align: top;padding: 0px">
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_photo" => $out1_photo); ?><script>var var_ajax_img_photo = '<?php echo $out1_photo; ?>';</script><?php if (!empty($out_photo)){ echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_photo, '" . $this->nmgp_return_img['photo'][0] . "', '" . $this->nmgp_return_img['photo'][1] . "')\"><img id=\"id_ajax_img_photo\" border=\"0\" src=\"$out_photo\"></a> &nbsp;" . "<span id=\"txt_ajax_img_photo\">" . $photo . "</span>"; if (!empty($photo)){ echo "<br>";} } else { echo "<img id=\"id_ajax_img_photo\" border=\"0\" style=\"display: none\"> &nbsp;<span id=\"txt_ajax_img_photo\"></span><br />"; } ?>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["photo"]) &&  $this->nmgp_cmp_readonly["photo"] == "on") { 

 ?>
<img id=\"photo_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="photo" value="<?php echo $this->form_encode_input($photo) . "\">" . $photo . ""; ?>
<?php } else { ?>
<span id="id_read_off_photo" class="css_read_off_photo" style="white-space: nowrap;<?php echo $sStyleReadInp_photo; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-photo" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_photo_obj" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="photo[]" id="id_sc_field_photo" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<span id="chk_ajax_img_photo"<?php if ($this->nmgp_opcao == "novo" || empty($photo)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="photo_limpa" value="<?php echo $photo_limpa . '" '; if ($photo_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="photo_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_photo" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_photo" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_photo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_photo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
<script type="text/javascript">
function sc_control_tabs_2(iTabIndex)
{
  sc_change_tabs(iTabIndex == 2, 'hidden_bloco_2', 'id_tabs_2_2');
  if (iTabIndex == 2) {
    displayChange_block("2", "on");
  }
  sc_change_tabs(iTabIndex == 3, 'hidden_bloco_3', 'id_tabs_2_3');
  if (iTabIndex == 3) {
    displayChange_block("3", "on");
  }
  sc_change_tabs(iTabIndex == 4, 'hidden_bloco_4', 'id_tabs_2_4');
  if (iTabIndex == 4) {
    displayChange_block("4", "on");
  }
  sc_change_tabs(iTabIndex == 5, 'hidden_bloco_5', 'id_tabs_2_5');
  if (iTabIndex == 5) {
    displayChange_block("5", "on");
  }
  sc_change_tabs(iTabIndex == 6, 'hidden_bloco_6', 'id_tabs_2_6');
  if (iTabIndex == 6) {
    displayChange_block("6", "on");
  }
  sc_change_tabs(iTabIndex == 7, 'hidden_bloco_7', 'id_tabs_2_7');
  if (iTabIndex == 7) {
    displayChange_block("7", "on");
  }
  sc_change_tabs(iTabIndex == 8, 'hidden_bloco_8', 'id_tabs_2_8');
  if (iTabIndex == 8) {
    displayChange_block("8", "on");
  }
  sc_change_tabs(iTabIndex == 9, 'hidden_bloco_9', 'id_tabs_2_9');
  if (iTabIndex == 9) {
    displayChange_block("9", "on");
  }
  scQuickSearchInit(true, '');
}
</script>
<ul class="scTabLine">
<li id="id_tabs_2_2" class="scTabActive"><a href="javascript: sc_control_tabs_2(2)">Status</a></li>
<li id="id_tabs_2_3" class="scTabInactive"><a href="javascript: sc_control_tabs_2(3)">Pendidikan Formal</a></li>
<li id="id_tabs_2_4" class="scTabInactive"><a href="javascript: sc_control_tabs_2(4)">Pendidikan Non Formal</a></li>
<li id="id_tabs_2_5" class="scTabInactive"><a href="javascript: sc_control_tabs_2(5)">Pengalaman Kerja</a></li>
<li id="id_tabs_2_6" class="scTabInactive"><a href="javascript: sc_control_tabs_2(6)">Keluarga</a></li>
<li id="id_tabs_2_7" class="scTabInactive"><a href="javascript: sc_control_tabs_2(7)">Posisi yang Diminati</a></li>
<li id="id_tabs_2_8" class="scTabInactive"><a href="javascript: sc_control_tabs_2(8)">Referensi</a></li>
<li id="id_tabs_2_9" class="scTabInactive"><a href="javascript: sc_control_tabs_2(9)">Penghasilan / Fasilitas yang Diinginkan</a></li>
</ul>
<div style='clear:both'></div>
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['status']))
    {
        $this->nm_new_label['status'] = "";
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

    <TD class="scFormDataOdd css_status_line" id="hidden_field_data_status" style="<?php echo $sStyleHidden_status; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_status_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Status'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Status'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Status'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['foreign_key']['kodekary'] = $this->nmgp_dados_form['kodekary'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['where_filter'] = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['where_detal']  = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrd']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init'] ]['form_tbhrdstatus']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tbhrd_empty.htm' : $this->Ini->link_form_tbhrdstatus_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_Status']) && 'nmsc_iframe_liga_form_tbhrdstatus' != $this->Ini->sc_lig_target['C_@scinf_Status'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Status'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdstatus_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Status'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbhrdstatus"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tbhrdstatus"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_status_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_status_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_3"></a>
<div id="div_hidden_bloco_3" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sc_field_0']))
    {
        $this->nm_new_label['sc_field_0'] = "";
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

    <TD class="scFormDataOdd css_sc_field_0_line" id="hidden_field_data_sc_field_0" style="<?php echo $sStyleHidden_sc_field_0; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_sc_field_0_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['foreign_key']['kodekary'] = $this->nmgp_dados_form['kodekary'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['where_filter'] = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['where_detal']  = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrd']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init'] ]['form_tbhrdformal']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tbhrd_empty.htm' : $this->Ini->link_form_tbhrdformal_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_sc_field_0']) && 'nmsc_iframe_liga_form_tbhrdformal' != $this->Ini->sc_lig_target['C_@scinf_sc_field_0'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdformal_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbhrdformal"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tbhrdformal"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_0_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_0_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_4"></a>
<div id="div_hidden_bloco_4" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sc_field_1']))
    {
        $this->nm_new_label['sc_field_1'] = "";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['sc_field_1']) && $this->nmgp_cmp_hidden['sc_field_1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_1" value="<?php echo $this->form_encode_input($sc_field_1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sc_field_1_line" id="hidden_field_data_sc_field_1" style="<?php echo $sStyleHidden_sc_field_1; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_sc_field_1_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_1'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_1'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_1'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['foreign_key']['kodekary'] = $this->nmgp_dados_form['kodekary'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['where_filter'] = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['where_detal']  = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrd']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tbhrd_empty.htm' : $this->Ini->link_form_tbhrdinformal_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_sc_field_1']) && 'nmsc_iframe_liga_form_tbhrdinformal' != $this->Ini->sc_lig_target['C_@scinf_sc_field_1'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_sc_field_1'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdinformal_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_sc_field_1'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbhrdinformal"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tbhrdinformal"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_5"></a>
<div id="div_hidden_bloco_5" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sc_field_2']))
    {
        $this->nm_new_label['sc_field_2'] = "";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['sc_field_2']) && $this->nmgp_cmp_hidden['sc_field_2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_2" value="<?php echo $this->form_encode_input($sc_field_2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sc_field_2_line" id="hidden_field_data_sc_field_2" style="<?php echo $sStyleHidden_sc_field_2; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_sc_field_2_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_2'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_2'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_2'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['foreign_key']['kodekary'] = $this->nmgp_dados_form['kodekary'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['where_filter'] = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['where_detal']  = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrd']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init'] ]['form_tbhrdexp']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tbhrd_empty.htm' : $this->Ini->link_form_tbhrdexp_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_sc_field_2']) && 'nmsc_iframe_liga_form_tbhrdexp' != $this->Ini->sc_lig_target['C_@scinf_sc_field_2'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_sc_field_2'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdexp_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_sc_field_2'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbhrdexp"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tbhrdexp"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_6"></a>
<div id="div_hidden_bloco_6" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_6" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['keluarga']))
    {
        $this->nm_new_label['keluarga'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $keluarga = $this->keluarga;
   $sStyleHidden_keluarga = '';
   if (isset($this->nmgp_cmp_hidden['keluarga']) && $this->nmgp_cmp_hidden['keluarga'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['keluarga']);
       $sStyleHidden_keluarga = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_keluarga = 'display: none;';
   $sStyleReadInp_keluarga = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['keluarga']) && $this->nmgp_cmp_readonly['keluarga'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['keluarga']);
       $sStyleReadLab_keluarga = '';
       $sStyleReadInp_keluarga = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['keluarga']) && $this->nmgp_cmp_hidden['keluarga'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="keluarga" value="<?php echo $this->form_encode_input($keluarga) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_keluarga_line" id="hidden_field_data_keluarga" style="<?php echo $sStyleHidden_keluarga; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_keluarga_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Keluarga'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Keluarga'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Keluarga'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['foreign_key']['kodekary'] = $this->nmgp_dados_form['kodekary'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['where_filter'] = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['where_detal']  = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrd']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init'] ]['form_tbhrdklg']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tbhrd_empty.htm' : $this->Ini->link_form_tbhrdklg_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_Keluarga']) && 'nmsc_iframe_liga_form_tbhrdklg' != $this->Ini->sc_lig_target['C_@scinf_Keluarga'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Keluarga'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdklg_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Keluarga'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbhrdklg"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tbhrdklg"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_keluarga_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_keluarga_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_7"></a>
<div id="div_hidden_bloco_7" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_7" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sc_field_3']))
    {
        $this->nm_new_label['sc_field_3'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sc_field_3 = $this->sc_field_3;
   $sStyleHidden_sc_field_3 = '';
   if (isset($this->nmgp_cmp_hidden['sc_field_3']) && $this->nmgp_cmp_hidden['sc_field_3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sc_field_3']);
       $sStyleHidden_sc_field_3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sc_field_3 = 'display: none;';
   $sStyleReadInp_sc_field_3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sc_field_3']) && $this->nmgp_cmp_readonly['sc_field_3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sc_field_3']);
       $sStyleReadLab_sc_field_3 = '';
       $sStyleReadInp_sc_field_3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sc_field_3']) && $this->nmgp_cmp_hidden['sc_field_3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_3" value="<?php echo $this->form_encode_input($sc_field_3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sc_field_3_line" id="hidden_field_data_sc_field_3" style="<?php echo $sStyleHidden_sc_field_3; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_sc_field_3_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_3'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_3'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_3'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['foreign_key']['kodekary'] = $this->nmgp_dados_form['kodekary'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['where_filter'] = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['where_detal']  = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrd']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init'] ]['form_tbhrdminat']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tbhrd_empty.htm' : $this->Ini->link_form_tbhrdminat_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_sc_field_3']) && 'nmsc_iframe_liga_form_tbhrdminat' != $this->Ini->sc_lig_target['C_@scinf_sc_field_3'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_sc_field_3'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdminat_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_sc_field_3'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbhrdminat"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tbhrdminat"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_3_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_8"></a>
<div id="div_hidden_bloco_8" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_8" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['referensi']))
    {
        $this->nm_new_label['referensi'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $referensi = $this->referensi;
   $sStyleHidden_referensi = '';
   if (isset($this->nmgp_cmp_hidden['referensi']) && $this->nmgp_cmp_hidden['referensi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['referensi']);
       $sStyleHidden_referensi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_referensi = 'display: none;';
   $sStyleReadInp_referensi = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['referensi']) && $this->nmgp_cmp_readonly['referensi'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['referensi']);
       $sStyleReadLab_referensi = '';
       $sStyleReadInp_referensi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['referensi']) && $this->nmgp_cmp_hidden['referensi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="referensi" value="<?php echo $this->form_encode_input($referensi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_referensi_line" id="hidden_field_data_referensi" style="<?php echo $sStyleHidden_referensi; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_referensi_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Referensi'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Referensi'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Referensi'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['foreign_key']['kodekary'] = $this->nmgp_dados_form['kodekary'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['where_filter'] = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['where_detal']  = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrd']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init'] ]['form_tbhrdref']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tbhrd_empty.htm' : $this->Ini->link_form_tbhrdref_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_Referensi']) && 'nmsc_iframe_liga_form_tbhrdref' != $this->Ini->sc_lig_target['C_@scinf_Referensi'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Referensi'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdref_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Referensi'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbhrdref"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tbhrdref"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_referensi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_referensi_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_9"></a>
<div id="div_hidden_bloco_9" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_9" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sc_field_4']))
    {
        $this->nm_new_label['sc_field_4'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sc_field_4 = $this->sc_field_4;
   $sStyleHidden_sc_field_4 = '';
   if (isset($this->nmgp_cmp_hidden['sc_field_4']) && $this->nmgp_cmp_hidden['sc_field_4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sc_field_4']);
       $sStyleHidden_sc_field_4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sc_field_4 = 'display: none;';
   $sStyleReadInp_sc_field_4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sc_field_4']) && $this->nmgp_cmp_readonly['sc_field_4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sc_field_4']);
       $sStyleReadLab_sc_field_4 = '';
       $sStyleReadInp_sc_field_4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sc_field_4']) && $this->nmgp_cmp_hidden['sc_field_4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_4" value="<?php echo $this->form_encode_input($sc_field_4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sc_field_4_line" id="hidden_field_data_sc_field_4" style="<?php echo $sStyleHidden_sc_field_4; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_sc_field_4_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_4'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_4'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_4'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['foreign_key']['kodekary'] = $this->nmgp_dados_form['kodekary'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['where_filter'] = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['where_detal']  = "kodeKary = '" . $this->nmgp_dados_form['kodekary'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrd']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init'] ]['form_tbhrdhope']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tbhrd_empty.htm' : $this->Ini->link_form_tbhrdhope_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_sc_field_4']) && 'nmsc_iframe_liga_form_tbhrdhope' != $this->Ini->sc_lig_target['C_@scinf_sc_field_4'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_sc_field_4'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['form_tbhrdhope_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_sc_field_4'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbhrdhope"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tbhrdhope"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_4_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_4_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage({title: '', message: "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", isModal: false, timeout: 0, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: true, showBodyIcon: false, isToast: false, toastPos: ""});
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8,9);
  $nm_sc_blocos_aba    = array(2 => 2,3 => 2,4 => 2,5 => 2,6 => 2,7 => 2,8 => 2,9 => 2);
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8,9);
  $nm_sc_blocos_aba    = array(2 => 2,3 => 2,4 => 2,5 => 2,6 => 2,7 => 2,8 => 2,9 => 2);
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tbhrd");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbhrd");
 parent.scAjaxDetailHeight("form_tbhrd", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbhrd", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbhrd", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbhrd']['buttonStatus'] = $this->nmgp_botoes;
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
