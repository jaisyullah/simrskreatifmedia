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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Pelayanan Rawat Inap"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Pelayanan Rawat Inap"); } ?></TITLE>
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
.css_read_off_tglkeluar button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['embutida_pdf']))
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
 <STYLE>
     .scTabLine li {
         display: inline-block !important;
         text-align: center !important;
         overflow: hidden !important;
         vertical-align:top !important;
         height: auto !important;
         max-width: 100% !important;
     }
 </STYLE>
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbdetailrawatinapF/form_tbdetailrawatinapF_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbdetailrawatinapF_sajax_js.php");
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
     if (F_name == "ruanginap")
     {
        $('select[name="ruanginap"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="ruanginap"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="ruanginap"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "tglkeluar")
     {
        $('input[name="tglkeluar"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="tglkeluar"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="tglkeluar"]').removeClass("scFormInputDisabled");
        }
        $('input[id="calendar_tglkeluar"]').prop("disabled", F_opc);
        if (F_opc) {
            $("#id_sc_field_tglkeluar").datepicker("destroy");
        }
        else {
            scJQCalendarAdd("");
        }
     }
     if (F_name == "jeniskeluar")
     {
        $('select[name="jeniskeluar"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="jeniskeluar"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="jeniskeluar"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "carakeluar")
     {
        $('select[name="carakeluar"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="carakeluar"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="carakeluar"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "alasankeluar")
     {
        $('textarea[name="alasankeluar"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('textarea[name="alasankeluar"]').addClass("scFormInputDisabled");
        }
        else {
            $('textarea[name="alasankeluar"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_tbdetailrawatinapF_jquery.php');

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

  $("#hidden_bloco_0,#hidden_bloco_1,#hidden_bloco_2").each(function() {
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
    "hidden_bloco_0": false,
    "hidden_bloco_1": false,
    "hidden_bloco_2": false
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
      scAjaxDetailHeight("grid_tbreseprawatinapF", "500");
      if (typeof $("#nmsc_iframe_liga_grid_tbreseprawatinapF")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_grid_tbreseprawatinapF")[0].contentWindow.scQuickSearchInit(false, '');
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_tbdetailrawatinapF_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_tbdetailrawatinapF'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbdetailrawatinapF'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['fast_search'][2] : "";
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="35%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_exp . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>DETAIL<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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
   if ('novo' != $this->nmgp_opcao) {
       $this->nmgp_cmp_readonly['trancode'] = 'on';
   }
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_trancode_label" id="hidden_field_label_trancode" style="<?php echo $sStyleHidden_trancode; ?>"><span id="id_label_trancode"><?php echo $this->nm_new_label['trancode']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['php_cmp_required']['trancode']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['php_cmp_required']['trancode'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_trancode_line" id="hidden_field_data_trancode" style="<?php echo $sStyleHidden_trancode; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_trancode_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["trancode"]) &&  $this->nmgp_cmp_readonly["trancode"] == "on") { 

 ?>
<input type="hidden" name="trancode" value="<?php echo $this->form_encode_input($trancode) . "\">" . $trancode . ""; ?>
<?php } else { ?>
<span id="id_read_on_trancode" class="sc-ui-readonly-trancode css_trancode_line" style="<?php echo $sStyleReadLab_trancode; ?>"><?php echo $this->trancode; ?></span><span id="id_read_off_trancode" class="css_read_off_trancode" style="white-space: nowrap;<?php echo $sStyleReadInp_trancode; ?>">
 <input class="sc-js-input scFormObjectOdd css_trancode_obj" style="" id="id_sc_field_trancode" type=text name="trancode" value="<?php echo $this->form_encode_input($trancode) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_tbdetailrawatinapF*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_select_adm_ranap"]) && $this->Ini->sc_lig_md5["grid_select_adm_ranap"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,trancode,trancode*scoutnm_evt_ret_busca*scinsc_form_tbdetailrawatinapF_trancode_onchange(this)*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_tbdetailrawatinapF@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,trancode,trancode*scoutnm_evt_ret_busca*scinsc_form_tbdetailrawatinapF_trancode_onchange(this)*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_select_adm_ranap_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_select_adm_ranap_cons_psq. "', '" . $Md5_Lig . "')", "cap_trancode", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trancode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trancode_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dokter_label" id="hidden_field_label_dokter" style="<?php echo $sStyleHidden_dokter; ?>"><span id="id_label_dokter"><?php echo $this->nm_new_label['dokter']; ?></span></TD>
    <TD class="scFormDataOdd css_dokter_line" id="hidden_field_data_dokter" style="<?php echo $sStyleHidden_dokter; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dokter_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dokter"]) &&  $this->nmgp_cmp_readonly["dokter"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_dokter']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_dokter'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_dokter']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_dokter'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_dokter']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_dokter'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_dokter']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_dokter'] = array(); 
    }

   $old_value_resikojatuh = $this->resikojatuh;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $old_value_nostruk = $this->nostruk;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_resikojatuh = $this->resikojatuh;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;
   $unformatted_value_nostruk = $this->nostruk;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT a.doctor, b.gelar + b.name + ' ' + b.spec  FROM tbadmrawatinap a left join tbdoctor b on a.doctor = b.docCode where a.tranCode = '$this->trancode' ORDER BY a.doctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT a.doctor, concat(b.gelar, b.name,' ', b.spec)  FROM tbadmrawatinap a left join tbdoctor b on a.doctor = b.docCode where a.tranCode = '$this->trancode' ORDER BY a.doctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT a.doctor, b.gelar&b.name&' '&b.spec  FROM tbadmrawatinap a left join tbdoctor b on a.doctor = b.docCode where a.tranCode = '$this->trancode' ORDER BY a.doctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT a.doctor, b.gelar||b.name||' '||b.spec  FROM tbadmrawatinap a left join tbdoctor b on a.doctor = b.docCode where a.tranCode = '$this->trancode' ORDER BY a.doctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT a.doctor, b.gelar + b.name + ' ' + b.spec  FROM tbadmrawatinap a left join tbdoctor b on a.doctor = b.docCode where a.tranCode = '$this->trancode' ORDER BY a.doctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT a.doctor, b.gelar||b.name||' '||b.spec  FROM tbadmrawatinap a left join tbdoctor b on a.doctor = b.docCode where a.tranCode = '$this->trancode' ORDER BY a.doctor";
   }
   else
   {
       $nm_comando = "SELECT a.doctor, b.gelar||b.name||' '||b.spec  FROM tbadmrawatinap a left join tbdoctor b on a.doctor = b.docCode where a.tranCode = '$this->trancode' ORDER BY a.doctor";
   }

   $this->resikojatuh = $old_value_resikojatuh;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;
   $this->nostruk = $old_value_nostruk;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_dokter'][] = $rs->fields[0];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dokter_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dokter_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_custcode_label" id="hidden_field_label_custcode" style="<?php echo $sStyleHidden_custcode; ?>"><span id="id_label_custcode"><?php echo $this->nm_new_label['custcode']; ?></span></TD>
    <TD class="scFormDataOdd css_custcode_line" id="hidden_field_data_custcode" style="<?php echo $sStyleHidden_custcode; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_custcode_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["custcode"]) &&  $this->nmgp_cmp_readonly["custcode"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_custcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_custcode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_custcode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_custcode'] = array(); 
    }

   $old_value_resikojatuh = $this->resikojatuh;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $old_value_nostruk = $this->nostruk;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_resikojatuh = $this->resikojatuh;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;
   $unformatted_value_nostruk = $this->nostruk;

   $nm_comando = "SELECT custCode, custCode  FROM tbadmrawatinap where tranCode = '$this->trancode' ORDER BY custCode";

   $this->resikojatuh = $old_value_resikojatuh;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;
   $this->nostruk = $old_value_nostruk;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_custcode'][] = $rs->fields[0];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_custcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_custcode_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sc_field_0']))
   {
       $this->nm_new_label['sc_field_0'] = "Nama Pasien";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sc_field_0_label" id="hidden_field_label_sc_field_0" style="<?php echo $sStyleHidden_sc_field_0; ?>"><span id="id_label_sc_field_0"><?php echo $this->nm_new_label['sc_field_0']; ?></span></TD>
    <TD class="scFormDataOdd css_sc_field_0_line" id="hidden_field_data_sc_field_0" style="<?php echo $sStyleHidden_sc_field_0; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sc_field_0_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_0"]) &&  $this->nmgp_cmp_readonly["sc_field_0"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_sc_field_0']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_sc_field_0']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_sc_field_0'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_sc_field_0']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_sc_field_0']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_sc_field_0'] = array(); 
    }

   $old_value_resikojatuh = $this->resikojatuh;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $old_value_nostruk = $this->nostruk;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_resikojatuh = $this->resikojatuh;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;
   $unformatted_value_nostruk = $this->nostruk;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ',' + salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,',', salut)  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&','&salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ',' + salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }

   $this->resikojatuh = $old_value_resikojatuh;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;
   $this->nostruk = $old_value_nostruk;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_sc_field_0'][] = $rs->fields[0];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_0_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_0_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ruanginap']))
   {
       $this->nm_new_label['ruanginap'] = "Ruang / Bed";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ruanginap = $this->ruanginap;
   $sStyleHidden_ruanginap = '';
   if (isset($this->nmgp_cmp_hidden['ruanginap']) && $this->nmgp_cmp_hidden['ruanginap'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ruanginap']);
       $sStyleHidden_ruanginap = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ruanginap = 'display: none;';
   $sStyleReadInp_ruanginap = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ruanginap']) && $this->nmgp_cmp_readonly['ruanginap'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ruanginap']);
       $sStyleReadLab_ruanginap = '';
       $sStyleReadInp_ruanginap = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ruanginap']) && $this->nmgp_cmp_hidden['ruanginap'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ruanginap" value="<?php echo $this->form_encode_input($this->ruanginap) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ruanginap_label" id="hidden_field_label_ruanginap" style="<?php echo $sStyleHidden_ruanginap; ?>"><span id="id_label_ruanginap"><?php echo $this->nm_new_label['ruanginap']; ?></span></TD>
    <TD class="scFormDataOdd css_ruanginap_line" id="hidden_field_data_ruanginap" style="<?php echo $sStyleHidden_ruanginap; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ruanginap_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ruanginap"]) &&  $this->nmgp_cmp_readonly["ruanginap"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_ruanginap']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_ruanginap'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_ruanginap']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_ruanginap'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_ruanginap']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_ruanginap'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_ruanginap']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_ruanginap'] = array(); 
    }

   $old_value_resikojatuh = $this->resikojatuh;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $old_value_nostruk = $this->nostruk;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_resikojatuh = $this->resikojatuh;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;
   $unformatted_value_nostruk = $this->nostruk;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "select c.idBed, c.ruang + ' (' + c.noBed + ')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '$this->trancode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "select c.idBed, concat(c.ruang,' (',c.noBed,')') as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '$this->trancode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "select c.idBed, c.ruang&' ('&c.noBed&')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '$this->trancode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "select c.idBed, c.ruang||' ('||c.noBed||')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '$this->trancode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "select c.idBed, c.ruang + ' (' + c.noBed + ')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '$this->trancode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "select c.idBed, c.ruang||' ('||c.noBed||')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '$this->trancode'";
   }
   else
   {
       $nm_comando = "select c.idBed, c.ruang||' ('||c.noBed||')' as 'Ruang/Bed' from tbadmrawatinap a left join tbdetailrawatinap b on b.tranCode = a.tranCode left join tbbed c on c.idBed = a.bed where a.tranCode = '$this->trancode'";
   }

   $this->resikojatuh = $old_value_resikojatuh;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;
   $this->nostruk = $old_value_nostruk;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_ruanginap'][] = $rs->fields[0];
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
   $ruanginap_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ruanginap_1))
          {
              foreach ($this->ruanginap_1 as $tmp_ruanginap)
              {
                  if (trim($tmp_ruanginap) === trim($cadaselect[1])) { $ruanginap_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ruanginap) === trim($cadaselect[1])) { $ruanginap_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="ruanginap" value="<?php echo $this->form_encode_input($ruanginap) . "\">" . $ruanginap_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_ruanginap();
   $x = 0 ; 
   $ruanginap_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ruanginap_1))
          {
              foreach ($this->ruanginap_1 as $tmp_ruanginap)
              {
                  if (trim($tmp_ruanginap) === trim($cadaselect[1])) { $ruanginap_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ruanginap) === trim($cadaselect[1])) { $ruanginap_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($ruanginap_look))
          {
              $ruanginap_look = $this->ruanginap;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_ruanginap\" class=\"css_ruanginap_line\" style=\"" .  $sStyleReadLab_ruanginap . "\">" . $this->form_encode_input($ruanginap_look) . "</span><span id=\"id_read_off_ruanginap\" class=\"css_read_off_ruanginap\" style=\"white-space: nowrap; " . $sStyleReadInp_ruanginap . "\">";
   echo " <span id=\"idAjaxSelect_ruanginap\"><select class=\"sc-js-input scFormObjectOdd css_ruanginap_obj\" style=\"\" id=\"id_sc_field_ruanginap\" name=\"ruanginap\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->ruanginap) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->ruanginap)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ruanginap_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ruanginap_text"></span></td></tr></table></td></tr></table></TD>
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
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_exp . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>DIAGNOSA<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diagnosa1']))
    {
        $this->nm_new_label['diagnosa1'] = "Diag. Pre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diagnosa1 = $this->diagnosa1;
   $sStyleHidden_diagnosa1 = '';
   if (isset($this->nmgp_cmp_hidden['diagnosa1']) && $this->nmgp_cmp_hidden['diagnosa1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diagnosa1']);
       $sStyleHidden_diagnosa1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diagnosa1 = 'display: none;';
   $sStyleReadInp_diagnosa1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diagnosa1']) && $this->nmgp_cmp_readonly['diagnosa1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diagnosa1']);
       $sStyleReadLab_diagnosa1 = '';
       $sStyleReadInp_diagnosa1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diagnosa1']) && $this->nmgp_cmp_hidden['diagnosa1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diagnosa1" value="<?php echo $this->form_encode_input($diagnosa1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_diagnosa1_label" id="hidden_field_label_diagnosa1" style="<?php echo $sStyleHidden_diagnosa1; ?>"><span id="id_label_diagnosa1"><?php echo $this->nm_new_label['diagnosa1']; ?></span></TD>
    <TD class="scFormDataOdd css_diagnosa1_line" id="hidden_field_data_diagnosa1" style="<?php echo $sStyleHidden_diagnosa1; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_diagnosa1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diagnosa1"]) &&  $this->nmgp_cmp_readonly["diagnosa1"] == "on") { 

 ?>
<input type="hidden" name="diagnosa1" value="<?php echo $this->form_encode_input($diagnosa1) . "\">" . $diagnosa1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_diagnosa1" class="sc-ui-readonly-diagnosa1 css_diagnosa1_line" style="<?php echo $sStyleReadLab_diagnosa1; ?>"><?php echo $this->diagnosa1; ?></span><span id="id_read_off_diagnosa1" class="css_read_off_diagnosa1" style="white-space: nowrap;<?php echo $sStyleReadInp_diagnosa1; ?>">
 <input class="sc-js-input scFormObjectOdd css_diagnosa1_obj" style="" id="id_sc_field_diagnosa1" type=text name="diagnosa1" value="<?php echo $this->form_encode_input($diagnosa1) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diagnosa1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diagnosa1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['icd1']))
   {
       $this->nm_new_label['icd1'] = "ICD Pre";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $icd1 = $this->icd1;
   $sStyleHidden_icd1 = '';
   if (isset($this->nmgp_cmp_hidden['icd1']) && $this->nmgp_cmp_hidden['icd1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['icd1']);
       $sStyleHidden_icd1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_icd1 = 'display: none;';
   $sStyleReadInp_icd1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['icd1']) && $this->nmgp_cmp_readonly['icd1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['icd1']);
       $sStyleReadLab_icd1 = '';
       $sStyleReadInp_icd1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['icd1']) && $this->nmgp_cmp_hidden['icd1'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="icd1" value="<?php echo $this->form_encode_input($this->icd1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_icd1_label" id="hidden_field_label_icd1" style="<?php echo $sStyleHidden_icd1; ?>"><span id="id_label_icd1"><?php echo $this->nm_new_label['icd1']; ?></span></TD>
    <TD class="scFormDataOdd css_icd1_line" id="hidden_field_data_icd1" style="<?php echo $sStyleHidden_icd1; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_icd1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["icd1"]) &&  $this->nmgp_cmp_readonly["icd1"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd1'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd1'] = array(); 
    }

   $old_value_resikojatuh = $this->resikojatuh;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $old_value_nostruk = $this->nostruk;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_resikojatuh = $this->resikojatuh;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;
   $unformatted_value_nostruk = $this->nostruk;

   $nm_comando = "SELECT icd, descEng  FROM tbicd  ORDER BY descEng";

   $this->resikojatuh = $old_value_resikojatuh;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;
   $this->nostruk = $old_value_nostruk;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd1'][] = $rs->fields[0];
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
   $icd1_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->icd1_1))
          {
              foreach ($this->icd1_1 as $tmp_icd1)
              {
                  if (trim($tmp_icd1) === trim($cadaselect[1])) { $icd1_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->icd1) === trim($cadaselect[1])) { $icd1_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="icd1" value="<?php echo $this->form_encode_input($icd1) . "\">" . $icd1_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_icd1();
   $x = 0 ; 
   $icd1_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->icd1_1))
          {
              foreach ($this->icd1_1 as $tmp_icd1)
              {
                  if (trim($tmp_icd1) === trim($cadaselect[1])) { $icd1_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->icd1) === trim($cadaselect[1])) { $icd1_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($icd1_look))
          {
              $icd1_look = $this->icd1;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_icd1\" class=\"css_icd1_line\" style=\"" .  $sStyleReadLab_icd1 . "\">" . $this->form_encode_input($icd1_look) . "</span><span id=\"id_read_off_icd1\" class=\"css_read_off_icd1\" style=\"white-space: nowrap; " . $sStyleReadInp_icd1 . "\">";
   echo " <span id=\"idAjaxSelect_icd1\"><select class=\"sc-js-input scFormObjectOdd css_icd1_obj\" style=\"\" id=\"id_sc_field_icd1\" name=\"icd1\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->icd1) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->icd1)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_icd1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_icd1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diagnosa2']))
    {
        $this->nm_new_label['diagnosa2'] = "Diag.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diagnosa2 = $this->diagnosa2;
   $sStyleHidden_diagnosa2 = '';
   if (isset($this->nmgp_cmp_hidden['diagnosa2']) && $this->nmgp_cmp_hidden['diagnosa2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diagnosa2']);
       $sStyleHidden_diagnosa2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diagnosa2 = 'display: none;';
   $sStyleReadInp_diagnosa2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diagnosa2']) && $this->nmgp_cmp_readonly['diagnosa2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diagnosa2']);
       $sStyleReadLab_diagnosa2 = '';
       $sStyleReadInp_diagnosa2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diagnosa2']) && $this->nmgp_cmp_hidden['diagnosa2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diagnosa2" value="<?php echo $this->form_encode_input($diagnosa2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_diagnosa2_label" id="hidden_field_label_diagnosa2" style="<?php echo $sStyleHidden_diagnosa2; ?>"><span id="id_label_diagnosa2"><?php echo $this->nm_new_label['diagnosa2']; ?></span></TD>
    <TD class="scFormDataOdd css_diagnosa2_line" id="hidden_field_data_diagnosa2" style="<?php echo $sStyleHidden_diagnosa2; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_diagnosa2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diagnosa2"]) &&  $this->nmgp_cmp_readonly["diagnosa2"] == "on") { 

 ?>
<input type="hidden" name="diagnosa2" value="<?php echo $this->form_encode_input($diagnosa2) . "\">" . $diagnosa2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_diagnosa2" class="sc-ui-readonly-diagnosa2 css_diagnosa2_line" style="<?php echo $sStyleReadLab_diagnosa2; ?>"><?php echo $this->diagnosa2; ?></span><span id="id_read_off_diagnosa2" class="css_read_off_diagnosa2" style="white-space: nowrap;<?php echo $sStyleReadInp_diagnosa2; ?>">
 <input class="sc-js-input scFormObjectOdd css_diagnosa2_obj" style="" id="id_sc_field_diagnosa2" type=text name="diagnosa2" value="<?php echo $this->form_encode_input($diagnosa2) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diagnosa2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diagnosa2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['icd2']))
   {
       $this->nm_new_label['icd2'] = "ICD";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $icd2 = $this->icd2;
   $sStyleHidden_icd2 = '';
   if (isset($this->nmgp_cmp_hidden['icd2']) && $this->nmgp_cmp_hidden['icd2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['icd2']);
       $sStyleHidden_icd2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_icd2 = 'display: none;';
   $sStyleReadInp_icd2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['icd2']) && $this->nmgp_cmp_readonly['icd2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['icd2']);
       $sStyleReadLab_icd2 = '';
       $sStyleReadInp_icd2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['icd2']) && $this->nmgp_cmp_hidden['icd2'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="icd2" value="<?php echo $this->form_encode_input($this->icd2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_icd2_label" id="hidden_field_label_icd2" style="<?php echo $sStyleHidden_icd2; ?>"><span id="id_label_icd2"><?php echo $this->nm_new_label['icd2']; ?></span></TD>
    <TD class="scFormDataOdd css_icd2_line" id="hidden_field_data_icd2" style="<?php echo $sStyleHidden_icd2; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_icd2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["icd2"]) &&  $this->nmgp_cmp_readonly["icd2"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd2']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd2']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd2'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd2']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd2']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd2'] = array(); 
    }

   $old_value_resikojatuh = $this->resikojatuh;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $old_value_nostruk = $this->nostruk;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_resikojatuh = $this->resikojatuh;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;
   $unformatted_value_nostruk = $this->nostruk;

   $nm_comando = "SELECT icd, descEng  FROM tbicd  ORDER BY descEng";

   $this->resikojatuh = $old_value_resikojatuh;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;
   $this->nostruk = $old_value_nostruk;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_icd2'][] = $rs->fields[0];
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
   $icd2_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->icd2_1))
          {
              foreach ($this->icd2_1 as $tmp_icd2)
              {
                  if (trim($tmp_icd2) === trim($cadaselect[1])) { $icd2_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->icd2) === trim($cadaselect[1])) { $icd2_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="icd2" value="<?php echo $this->form_encode_input($icd2) . "\">" . $icd2_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_icd2();
   $x = 0 ; 
   $icd2_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->icd2_1))
          {
              foreach ($this->icd2_1 as $tmp_icd2)
              {
                  if (trim($tmp_icd2) === trim($cadaselect[1])) { $icd2_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->icd2) === trim($cadaselect[1])) { $icd2_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($icd2_look))
          {
              $icd2_look = $this->icd2;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_icd2\" class=\"css_icd2_line\" style=\"" .  $sStyleReadLab_icd2 . "\">" . $this->form_encode_input($icd2_look) . "</span><span id=\"id_read_off_icd2\" class=\"css_read_off_icd2\" style=\"white-space: nowrap; " . $sStyleReadInp_icd2 . "\">";
   echo " <span id=\"idAjaxSelect_icd2\"><select class=\"sc-js-input scFormObjectOdd css_icd2_obj\" style=\"\" id=\"id_sc_field_icd2\" name=\"icd2\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->icd2) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->icd2)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_icd2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_icd2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="30%" height="">
   <a name="bloco_2"></a>
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_exp . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>STATUS<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['resikojatuh']))
    {
        $this->nm_new_label['resikojatuh'] = "Resiko Jatuh";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $resikojatuh = $this->resikojatuh;
   $sStyleHidden_resikojatuh = '';
   if (isset($this->nmgp_cmp_hidden['resikojatuh']) && $this->nmgp_cmp_hidden['resikojatuh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['resikojatuh']);
       $sStyleHidden_resikojatuh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_resikojatuh = 'display: none;';
   $sStyleReadInp_resikojatuh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['resikojatuh']) && $this->nmgp_cmp_readonly['resikojatuh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['resikojatuh']);
       $sStyleReadLab_resikojatuh = '';
       $sStyleReadInp_resikojatuh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['resikojatuh']) && $this->nmgp_cmp_hidden['resikojatuh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="resikojatuh" value="<?php echo $this->form_encode_input($resikojatuh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_resikojatuh_label" id="hidden_field_label_resikojatuh" style="<?php echo $sStyleHidden_resikojatuh; ?>"><span id="id_label_resikojatuh"><?php echo $this->nm_new_label['resikojatuh']; ?></span></TD>
    <TD class="scFormDataOdd css_resikojatuh_line" id="hidden_field_data_resikojatuh" style="<?php echo $sStyleHidden_resikojatuh; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_resikojatuh_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["resikojatuh"]) &&  $this->nmgp_cmp_readonly["resikojatuh"] == "on") { 

 ?>
<input type="hidden" name="resikojatuh" value="<?php echo $this->form_encode_input($resikojatuh) . "\">" . $resikojatuh . ""; ?>
<?php } else { ?>
<span id="id_read_on_resikojatuh" class="sc-ui-readonly-resikojatuh css_resikojatuh_line" style="<?php echo $sStyleReadLab_resikojatuh; ?>"><?php echo $this->resikojatuh; ?></span><span id="id_read_off_resikojatuh" class="css_read_off_resikojatuh" style="white-space: nowrap;<?php echo $sStyleReadInp_resikojatuh; ?>">
 <input class="sc-js-input scFormObjectOdd css_resikojatuh_obj" style="" id="id_sc_field_resikojatuh" type=text name="resikojatuh" value="<?php echo $this->form_encode_input($resikojatuh) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['resikojatuh']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['resikojatuh']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['resikojatuh']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resikojatuh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resikojatuh_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['selesai']))
   {
       $this->nm_new_label['selesai'] = "Selesai";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $selesai = $this->selesai;
   $sStyleHidden_selesai = '';
   if (isset($this->nmgp_cmp_hidden['selesai']) && $this->nmgp_cmp_hidden['selesai'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['selesai']);
       $sStyleHidden_selesai = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_selesai = 'display: none;';
   $sStyleReadInp_selesai = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['selesai']) && $this->nmgp_cmp_readonly['selesai'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['selesai']);
       $sStyleReadLab_selesai = '';
       $sStyleReadInp_selesai = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['selesai']) && $this->nmgp_cmp_hidden['selesai'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="selesai" value="<?php echo $this->form_encode_input($this->selesai) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_selesai_label" id="hidden_field_label_selesai" style="<?php echo $sStyleHidden_selesai; ?>"><span id="id_label_selesai"><?php echo $this->nm_new_label['selesai']; ?></span></TD>
    <TD class="scFormDataOdd css_selesai_line" id="hidden_field_data_selesai" style="<?php echo $sStyleHidden_selesai; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_selesai_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["selesai"]) &&  $this->nmgp_cmp_readonly["selesai"] == "on") { 

$selesai_look = "";
 if ($this->selesai == "Y") { $selesai_look .= "Sudah" ;} 
 if ($this->selesai == "N") { $selesai_look .= "Belum" ;} 
 if (empty($selesai_look)) { $selesai_look = $this->selesai; }
?>
<input type="hidden" name="selesai" value="<?php echo $this->form_encode_input($selesai) . "\">" . $selesai_look . ""; ?>
<?php } else { ?>
<?php

$selesai_look = "";
 if ($this->selesai == "Y") { $selesai_look .= "Sudah" ;} 
 if ($this->selesai == "N") { $selesai_look .= "Belum" ;} 
 if (empty($selesai_look)) { $selesai_look = $this->selesai; }
?>
<span id="id_read_on_selesai" class="css_selesai_line"  style="<?php echo $sStyleReadLab_selesai; ?>"><?php echo $this->form_encode_input($selesai_look); ?></span><span id="id_read_off_selesai" class="css_read_off_selesai" style="white-space: nowrap; <?php echo $sStyleReadInp_selesai; ?>">
 <span id="idAjaxSelect_selesai"><select class="sc-js-input scFormObjectOdd css_selesai_obj" style="" id="id_sc_field_selesai" name="selesai" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="Y" <?php  if ($this->selesai == "Y") { echo " selected" ;} ?>>Sudah</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_selesai'][] = 'Y'; ?>
 <option  value="N" <?php  if ($this->selesai == "N") { echo " selected" ;} ?><?php  if (empty($this->selesai)) { echo " selected" ;} ?>>Belum</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_selesai'][] = 'N'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_selesai_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_selesai_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tglkeluar']))
    {
        $this->nm_new_label['tglkeluar'] = "Tgl Keluar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_tglkeluar = $this->tglkeluar;
   if (strlen($this->tglkeluar_hora) > 8 ) {$this->tglkeluar_hora = substr($this->tglkeluar_hora, 0, 8);}
   $this->tglkeluar .= ' ' . $this->tglkeluar_hora;
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
    <TD class="scFormDataOdd css_tglkeluar_line" id="hidden_field_data_tglkeluar" style="<?php echo $sStyleHidden_tglkeluar; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tglkeluar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tglkeluar"]) &&  $this->nmgp_cmp_readonly["tglkeluar"] == "on") { 

 ?>
<input type="hidden" name="tglkeluar" value="<?php echo $this->form_encode_input($tglkeluar) . "\">" . $tglkeluar . ""; ?>
<?php } else { ?>
<span id="id_read_on_tglkeluar" class="sc-ui-readonly-tglkeluar css_tglkeluar_line" style="<?php echo $sStyleReadLab_tglkeluar; ?>"><?php echo $tglkeluar; ?></span><span id="id_read_off_tglkeluar" class="css_read_off_tglkeluar" style="white-space: nowrap;<?php echo $sStyleReadInp_tglkeluar; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_tglkeluar_obj" style="" id="id_sc_field_tglkeluar" type=text name="tglkeluar" value="<?php echo $this->form_encode_input($tglkeluar) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['tglkeluar']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['tglkeluar']['date_format']; ?>', timeSep: '<?php echo $this->field_config['tglkeluar']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['tglkeluar']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tglkeluar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tglkeluar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->tglkeluar = $old_dt_tglkeluar;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['jeniskeluar']))
   {
       $this->nm_new_label['jeniskeluar'] = "Jenis Keluar";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jeniskeluar = $this->jeniskeluar;
   $sStyleHidden_jeniskeluar = '';
   if (isset($this->nmgp_cmp_hidden['jeniskeluar']) && $this->nmgp_cmp_hidden['jeniskeluar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jeniskeluar']);
       $sStyleHidden_jeniskeluar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jeniskeluar = 'display: none;';
   $sStyleReadInp_jeniskeluar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jeniskeluar']) && $this->nmgp_cmp_readonly['jeniskeluar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jeniskeluar']);
       $sStyleReadLab_jeniskeluar = '';
       $sStyleReadInp_jeniskeluar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jeniskeluar']) && $this->nmgp_cmp_hidden['jeniskeluar'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="jeniskeluar" value="<?php echo $this->form_encode_input($this->jeniskeluar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_jeniskeluar_label" id="hidden_field_label_jeniskeluar" style="<?php echo $sStyleHidden_jeniskeluar; ?>"><span id="id_label_jeniskeluar"><?php echo $this->nm_new_label['jeniskeluar']; ?></span></TD>
    <TD class="scFormDataOdd css_jeniskeluar_line" id="hidden_field_data_jeniskeluar" style="<?php echo $sStyleHidden_jeniskeluar; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_jeniskeluar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jeniskeluar"]) &&  $this->nmgp_cmp_readonly["jeniskeluar"] == "on") { 

$jeniskeluar_look = "";
 if ($this->jeniskeluar == "PINDAH KAMAR") { $jeniskeluar_look .= "PINDAH KAMAR" ;} 
 if ($this->jeniskeluar == "PULANG") { $jeniskeluar_look .= "PULANG" ;} 
 if (empty($jeniskeluar_look)) { $jeniskeluar_look = $this->jeniskeluar; }
?>
<input type="hidden" name="jeniskeluar" value="<?php echo $this->form_encode_input($jeniskeluar) . "\">" . $jeniskeluar_look . ""; ?>
<?php } else { ?>
<?php

$jeniskeluar_look = "";
 if ($this->jeniskeluar == "PINDAH KAMAR") { $jeniskeluar_look .= "PINDAH KAMAR" ;} 
 if ($this->jeniskeluar == "PULANG") { $jeniskeluar_look .= "PULANG" ;} 
 if (empty($jeniskeluar_look)) { $jeniskeluar_look = $this->jeniskeluar; }
?>
<span id="id_read_on_jeniskeluar" class="css_jeniskeluar_line"  style="<?php echo $sStyleReadLab_jeniskeluar; ?>"><?php echo $this->form_encode_input($jeniskeluar_look); ?></span><span id="id_read_off_jeniskeluar" class="css_read_off_jeniskeluar" style="white-space: nowrap; <?php echo $sStyleReadInp_jeniskeluar; ?>">
 <span id="idAjaxSelect_jeniskeluar"><select class="sc-js-input scFormObjectOdd css_jeniskeluar_obj" style="" id="id_sc_field_jeniskeluar" name="jeniskeluar" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_jeniskeluar'][] = ''; ?>
 <option value=""></option>
 <option  value="PINDAH KAMAR" <?php  if ($this->jeniskeluar == "PINDAH KAMAR") { echo " selected" ;} ?>>PINDAH KAMAR</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_jeniskeluar'][] = 'PINDAH KAMAR'; ?>
 <option  value="PULANG" <?php  if ($this->jeniskeluar == "PULANG") { echo " selected" ;} ?>>PULANG</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_jeniskeluar'][] = 'PULANG'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jeniskeluar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jeniskeluar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['carakeluar']))
   {
       $this->nm_new_label['carakeluar'] = "Tindak Lanjut";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['carakeluar']) && $this->nmgp_cmp_hidden['carakeluar'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="carakeluar" value="<?php echo $this->form_encode_input($this->carakeluar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_carakeluar_label" id="hidden_field_label_carakeluar" style="<?php echo $sStyleHidden_carakeluar; ?>"><span id="id_label_carakeluar"><?php echo $this->nm_new_label['carakeluar']; ?></span></TD>
    <TD class="scFormDataOdd css_carakeluar_line" id="hidden_field_data_carakeluar" style="<?php echo $sStyleHidden_carakeluar; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_carakeluar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["carakeluar"]) &&  $this->nmgp_cmp_readonly["carakeluar"] == "on") { 

$carakeluar_look = "";
 if ($this->carakeluar == "PULANG") { $carakeluar_look .= "PULANG" ;} 
 if ($this->carakeluar == "RAWAT") { $carakeluar_look .= "RAWAT" ;} 
 if ($this->carakeluar == "PULANG PAKSA") { $carakeluar_look .= "PULANG PAKSA" ;} 
 if ($this->carakeluar == "RUJUK") { $carakeluar_look .= "RUJUK" ;} 
 if ($this->carakeluar == "MENINGGAL") { $carakeluar_look .= "MENINGGAL" ;} 
 if (empty($carakeluar_look)) { $carakeluar_look = $this->carakeluar; }
?>
<input type="hidden" name="carakeluar" value="<?php echo $this->form_encode_input($carakeluar) . "\">" . $carakeluar_look . ""; ?>
<?php } else { ?>
<?php

$carakeluar_look = "";
 if ($this->carakeluar == "PULANG") { $carakeluar_look .= "PULANG" ;} 
 if ($this->carakeluar == "RAWAT") { $carakeluar_look .= "RAWAT" ;} 
 if ($this->carakeluar == "PULANG PAKSA") { $carakeluar_look .= "PULANG PAKSA" ;} 
 if ($this->carakeluar == "RUJUK") { $carakeluar_look .= "RUJUK" ;} 
 if ($this->carakeluar == "MENINGGAL") { $carakeluar_look .= "MENINGGAL" ;} 
 if (empty($carakeluar_look)) { $carakeluar_look = $this->carakeluar; }
?>
<span id="id_read_on_carakeluar" class="css_carakeluar_line"  style="<?php echo $sStyleReadLab_carakeluar; ?>"><?php echo $this->form_encode_input($carakeluar_look); ?></span><span id="id_read_off_carakeluar" class="css_read_off_carakeluar" style="white-space: nowrap; <?php echo $sStyleReadInp_carakeluar; ?>">
 <span id="idAjaxSelect_carakeluar"><select class="sc-js-input scFormObjectOdd css_carakeluar_obj" style="" id="id_sc_field_carakeluar" name="carakeluar" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_carakeluar'][] = ''; ?>
 <option value=""></option>
 <option  value="PULANG" <?php  if ($this->carakeluar == "PULANG") { echo " selected" ;} ?>>PULANG</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_carakeluar'][] = 'PULANG'; ?>
 <option  value="RAWAT" <?php  if ($this->carakeluar == "RAWAT") { echo " selected" ;} ?>>RAWAT</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_carakeluar'][] = 'RAWAT'; ?>
 <option  value="PULANG PAKSA" <?php  if ($this->carakeluar == "PULANG PAKSA") { echo " selected" ;} ?>>PULANG PAKSA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_carakeluar'][] = 'PULANG PAKSA'; ?>
 <option  value="RUJUK" <?php  if ($this->carakeluar == "RUJUK") { echo " selected" ;} ?>>RUJUK</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_carakeluar'][] = 'RUJUK'; ?>
 <option  value="MENINGGAL" <?php  if ($this->carakeluar == "MENINGGAL") { echo " selected" ;} ?>>MENINGGAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lookup_carakeluar'][] = 'MENINGGAL'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_carakeluar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_carakeluar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['alasankeluar']))
    {
        $this->nm_new_label['alasankeluar'] = "Alasan Keluar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $alasankeluar = $this->alasankeluar;
   $sStyleHidden_alasankeluar = '';
   if (isset($this->nmgp_cmp_hidden['alasankeluar']) && $this->nmgp_cmp_hidden['alasankeluar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['alasankeluar']);
       $sStyleHidden_alasankeluar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_alasankeluar = 'display: none;';
   $sStyleReadInp_alasankeluar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['alasankeluar']) && $this->nmgp_cmp_readonly['alasankeluar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['alasankeluar']);
       $sStyleReadLab_alasankeluar = '';
       $sStyleReadInp_alasankeluar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['alasankeluar']) && $this->nmgp_cmp_hidden['alasankeluar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="alasankeluar" value="<?php echo $this->form_encode_input($alasankeluar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_alasankeluar_label" id="hidden_field_label_alasankeluar" style="<?php echo $sStyleHidden_alasankeluar; ?>"><span id="id_label_alasankeluar"><?php echo $this->nm_new_label['alasankeluar']; ?></span></TD>
    <TD class="scFormDataOdd css_alasankeluar_line" id="hidden_field_data_alasankeluar" style="<?php echo $sStyleHidden_alasankeluar; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_alasankeluar_line" style="vertical-align: top;padding: 0px">
<?php
$alasankeluar_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($alasankeluar));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["alasankeluar"]) &&  $this->nmgp_cmp_readonly["alasankeluar"] == "on") { 

 ?>
<input type="hidden" name="alasankeluar" value="<?php echo $this->form_encode_input($alasankeluar) . "\">" . $alasankeluar_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_alasankeluar" class="sc-ui-readonly-alasankeluar css_alasankeluar_line" style="<?php echo $sStyleReadLab_alasankeluar; ?>"><?php echo $alasankeluar_val; ?></span><span id="id_read_off_alasankeluar" class="css_read_off_alasankeluar" style="white-space: nowrap;<?php echo $sStyleReadInp_alasankeluar; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_alasankeluar_obj" style="white-space: pre-wrap;" name="alasankeluar" id="id_sc_field_alasankeluar" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $alasankeluar; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_alasankeluar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_alasankeluar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nostruk']))
    {
        $this->nm_new_label['nostruk'] = "No Struk";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['nostruk']) && $this->nmgp_cmp_hidden['nostruk'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nostruk" value="<?php echo $this->form_encode_input($nostruk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nostruk_label" id="hidden_field_label_nostruk" style="<?php echo $sStyleHidden_nostruk; ?>"><span id="id_label_nostruk"><?php echo $this->nm_new_label['nostruk']; ?></span></TD>
    <TD class="scFormDataOdd css_nostruk_line" id="hidden_field_data_nostruk" style="<?php echo $sStyleHidden_nostruk; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nostruk_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nostruk"]) &&  $this->nmgp_cmp_readonly["nostruk"] == "on") { 

 ?>
<input type="hidden" name="nostruk" value="<?php echo $this->form_encode_input($nostruk) . "\">" . $nostruk . ""; ?>
<?php } else { ?>
<span id="id_read_on_nostruk" class="sc-ui-readonly-nostruk css_nostruk_line" style="<?php echo $sStyleReadLab_nostruk; ?>"><?php echo $this->nostruk; ?></span><span id="id_read_off_nostruk" class="css_read_off_nostruk" style="white-space: nowrap;<?php echo $sStyleReadInp_nostruk; ?>">
 <input class="sc-js-input scFormObjectOdd css_nostruk_obj" style="" id="id_sc_field_nostruk" type=text name="nostruk" value="<?php echo $this->form_encode_input($nostruk) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['nostruk']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['nostruk']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['nostruk']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nostruk_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nostruk_text"></span></td></tr></table></td></tr></table></TD>
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
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['resep']))
    {
        $this->nm_new_label['resep'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $resep = $this->resep;
   $sStyleHidden_resep = '';
   if (isset($this->nmgp_cmp_hidden['resep']) && $this->nmgp_cmp_hidden['resep'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['resep']);
       $sStyleHidden_resep = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_resep = 'display: none;';
   $sStyleReadInp_resep = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['resep']) && $this->nmgp_cmp_readonly['resep'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['resep']);
       $sStyleReadLab_resep = '';
       $sStyleReadInp_resep = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['resep']) && $this->nmgp_cmp_hidden['resep'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="resep" value="<?php echo $this->form_encode_input($resep) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_resep_line" id="hidden_field_data_resep" style="<?php echo $sStyleHidden_resep; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_resep_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_resep'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_resep'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['grid_tbreseprawatinapF_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_resep'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['grid_tbreseprawatinapF_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['grid_tbreseprawatinapF_script_case_init'] ]['grid_tbreseprawatinapF']['embutida_form_full']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['grid_tbreseprawatinapF_script_case_init'] ]['grid_tbreseprawatinapF']['embutida_form']       = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['grid_tbreseprawatinapF_script_case_init'] ]['grid_tbreseprawatinapF']['embutida_pai']        = "form_tbdetailrawatinapF";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['grid_tbreseprawatinapF_script_case_init'] ]['grid_tbreseprawatinapF']['embutida_form_parms'] = "v_trancode*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scout";
 if (isset($this->Ini->sc_lig_md5["grid_tbreseprawatinapF"]) && $this->Ini->sc_lig_md5["grid_tbreseprawatinapF"] == "S") {
     $Parms_Lig  = "v_trancode*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scout";
     $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_tbdetailrawatinapF@SC_par@" . md5($Parms_Lig);
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
 } else {
     $Md5_Lig  = "v_trancode*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scout";
 }
 $parms_lig_cons = "&nmgp_parms=" . $Md5_Lig;
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tbdetailrawatinapF_empty.htm' : $this->Ini->link_grid_tbreseprawatinapF_cons . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y&sc_ifr_height=500' . $parms_lig_cons;
if (isset($this->Ini->sc_lig_target['C_@scinf_resep']) && 'nmsc_iframe_liga_grid_tbreseprawatinapF' != $this->Ini->sc_lig_target['C_@scinf_resep'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_resep'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['grid_tbreseprawatinapF_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_resep'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_grid_tbreseprawatinapF"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="100%" name="nmsc_iframe_liga_grid_tbreseprawatinapF"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resep_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resep_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3);

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
  $nm_sc_blocos_da_pag = array(0,1,2,3);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tbdetailrawatinapF");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbdetailrawatinapF");
 parent.scAjaxDetailHeight("form_tbdetailrawatinapF", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbdetailrawatinapF", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbdetailrawatinapF", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatinapF']['buttonStatus'] = $this->nmgp_botoes;
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
