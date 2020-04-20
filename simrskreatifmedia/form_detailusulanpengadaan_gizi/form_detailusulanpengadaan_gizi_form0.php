<?php
class form_detailusulanpengadaan_gizi_form extends form_detailusulanpengadaan_gizi_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - detailusulanpengadaan_gizi"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - detailusulanpengadaan_gizi"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['sc_redir_atualiz'] == 'ok')
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
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/calculator/jquery.calculator.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/calculator/jquery.plugin.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/calculator/jquery.calculator.js"></SCRIPT>
<?php
switch ($_SESSION['scriptcase']['str_lang']) {
        case 'ca':
        case 'da':
        case 'de':
        case 'es':
        case 'fr':
        case 'hr':
        case 'it':
        case 'nl':
        case 'no':
        case 'pl':
        case 'ru':
//        case 'sr':
        case 'sl':
        case 'uk':
                $tmpCalcLocale = $_SESSION['scriptcase']['str_lang'];
                break;
        case 'pt_br':
                $tmpCalcLocale = 'pt-BR';
                break;
        case 'tr':
                $tmpCalcLocale = 'ar';
                break;
        case 'zh_cn':
                $tmpCalcLocale = 'zh-CN';
                break;
//        case 'zh_hk':
//                $tmpCalcLocale = 'zh-TW';
//                break;
        default:
                $tmpCalcLocale = '';
                break;
}
if ('' != $tmpCalcLocale) {
        echo " <SCRIPT type=\"text/javascript\" src=\"{$this->Ini->path_prod}/third/jquery_plugin/calculator/jquery.calculator-$tmpCalcLocale.js\"></SCRIPT>\r\n";
}
?>
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
$miniCalculatorFA = $this->jqueryFAFile('calculator');
if ('' != $miniCalculatorFA) {
?>
<style type="text/css">
.css_read_off_jumlah_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_disetujui_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_detailusulanpengadaan_gizi/form_detailusulanpengadaan_gizi_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_detailusulanpengadaan_gizi_sajax_js.php");
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
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
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
     if (F_name == "stok_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "stok_" + ii;
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
    nm_field_disabled("stok_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_detailusulanpengadaan_gizi_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  addAutocomplete(this);

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

 function addAutocomplete(elem) {

  var iSeq_bahan_ = $(".sc-ui-autocomp-bahan_", elem).attr("id").substr(12);

  $(".sc-ui-autocomp-bahan_", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "bahan_" != sId ? sId.substr(6) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     do_ajax_form_detailusulanpengadaan_gizi_refresh_bahan_(sRow);
     if ('function' == typeof do_ajax_form_detailusulanpengadaan_gizi_event_bahan__onchange) { do_ajax_form_detailusulanpengadaan_gizi_event_bahan__onchange(sRow); }
    }
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).autocomplete({
   minLength: 1,
   source: function (request, response) {
    $.ajax({
     url: "form_detailusulanpengadaan_gizi.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_bahan_",
      script_case_init: document.F2.script_case_init.value
     },
     success: function (data) {
      if (data == "ss_time_out") {
          nm_move('novo');
      }
      response(data);
     }
    });
   },
   change: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'bahan_' != sId ? sId.substr(6) : '';
    if ("" == $(this).val()) {
     do_ajax_form_detailusulanpengadaan_gizi_event_bahan__onchange(sRow);
    }
   },
   focus: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'bahan_' != sId ? sId.substr(6) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'bahan_' != sId ? sId.substr(6) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    do_ajax_form_detailusulanpengadaan_gizi_event_bahan__onchange(sRow);
    do_ajax_form_detailusulanpengadaan_gizi_refresh_bahan_(sRow);
    nm_check_insert(sRow);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_bahan_", elem).on("focus", function() {
    $("#id_sc_field_bahan_").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_bahan_").trigger("blur");
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_detailusulanpengadaan_gizi_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_detailusulanpengadaan_gizi'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_detailusulanpengadaan_gizi'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - detailusulanpengadaan_gizi"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - detailusulanpengadaan_gizi"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['fast_search'][2] : "";
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
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['id_']))
   {
       $this->nmgp_cmp_hidden['id_'] = 'off';
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
   <?php if (isset($this->nmgp_cmp_hidden['bahan_']) && $this->nmgp_cmp_hidden['bahan_'] == 'off') { $sStyleHidden_bahan_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['bahan_']) || $this->nmgp_cmp_hidden['bahan_'] == 'on') {
      if (!isset($this->nm_new_label['bahan_'])) {
          $this->nm_new_label['bahan_'] = "Bahan"; } ?>

    <TD class="scFormLabelOddMult css_bahan__label" id="hidden_field_label_bahan_" style="<?php echo $sStyleHidden_bahan_; ?>" > <?php echo $this->nm_new_label['bahan_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['satuan_']) && $this->nmgp_cmp_hidden['satuan_'] == 'off') { $sStyleHidden_satuan_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['satuan_']) || $this->nmgp_cmp_hidden['satuan_'] == 'on') {
      if (!isset($this->nm_new_label['satuan_'])) {
          $this->nm_new_label['satuan_'] = "Satuan"; } ?>

    <TD class="scFormLabelOddMult css_satuan__label" id="hidden_field_label_satuan_" style="<?php echo $sStyleHidden_satuan_; ?>" > <?php echo $this->nm_new_label['satuan_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['stok_']) && $this->nmgp_cmp_hidden['stok_'] == 'off') { $sStyleHidden_stok_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['stok_']) || $this->nmgp_cmp_hidden['stok_'] == 'on') {
      if (!isset($this->nm_new_label['stok_'])) {
          $this->nm_new_label['stok_'] = "Stok"; } ?>

    <TD class="scFormLabelOddMult css_stok__label" id="hidden_field_label_stok_" style="<?php echo $sStyleHidden_stok_; ?>" > <?php echo $this->nm_new_label['stok_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['jumlah_']) && $this->nmgp_cmp_hidden['jumlah_'] == 'off') { $sStyleHidden_jumlah_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['jumlah_']) || $this->nmgp_cmp_hidden['jumlah_'] == 'on') {
      if (!isset($this->nm_new_label['jumlah_'])) {
          $this->nm_new_label['jumlah_'] = "Jumlah"; } ?>

    <TD class="scFormLabelOddMult css_jumlah__label" id="hidden_field_label_jumlah_" style="<?php echo $sStyleHidden_jumlah_; ?>" > <?php echo $this->nm_new_label['jumlah_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['refharga_']) && $this->nmgp_cmp_hidden['refharga_'] == 'off') { $sStyleHidden_refharga_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['refharga_']) || $this->nmgp_cmp_hidden['refharga_'] == 'on') {
      if (!isset($this->nm_new_label['refharga_'])) {
          $this->nm_new_label['refharga_'] = "Ref. Harga"; } ?>

    <TD class="scFormLabelOddMult css_refharga__label" id="hidden_field_label_refharga_" style="<?php echo $sStyleHidden_refharga_; ?>" > <?php echo $this->nm_new_label['refharga_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['disetujui_']) && $this->nmgp_cmp_hidden['disetujui_'] == 'off') { $sStyleHidden_disetujui_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['disetujui_']) || $this->nmgp_cmp_hidden['disetujui_'] == 'on') {
      if (!isset($this->nm_new_label['disetujui_'])) {
          $this->nm_new_label['disetujui_'] = "Disetujui"; } ?>

    <TD class="scFormLabelOddMult css_disetujui__label" id="hidden_field_label_disetujui_" style="<?php echo $sStyleHidden_disetujui_; ?>" > <?php echo $this->nm_new_label['disetujui_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['subtotal_']) && $this->nmgp_cmp_hidden['subtotal_'] == 'off') { $sStyleHidden_subtotal_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['subtotal_']) || $this->nmgp_cmp_hidden['subtotal_'] == 'on') {
      if (!isset($this->nm_new_label['subtotal_'])) {
          $this->nm_new_label['subtotal_'] = "Subtotal"; } ?>

    <TD class="scFormLabelOddMult css_subtotal__label" id="hidden_field_label_subtotal_" style="<?php echo $sStyleHidden_subtotal_; ?>" > <?php echo $this->nm_new_label['subtotal_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['diterima_']) && $this->nmgp_cmp_hidden['diterima_'] == 'off') { $sStyleHidden_diterima_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['diterima_']) || $this->nmgp_cmp_hidden['diterima_'] == 'on') {
      if (!isset($this->nm_new_label['diterima_'])) {
          $this->nm_new_label['diterima_'] = "Qty Realisasi"; } ?>

    <TD class="scFormLabelOddMult css_diterima__label" id="hidden_field_label_diterima_" style="<?php echo $sStyleHidden_diterima_; ?>" > <?php echo $this->nm_new_label['diterima_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['hargareal_']) && $this->nmgp_cmp_hidden['hargareal_'] == 'off') { $sStyleHidden_hargareal_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['hargareal_']) || $this->nmgp_cmp_hidden['hargareal_'] == 'on') {
      if (!isset($this->nm_new_label['hargareal_'])) {
          $this->nm_new_label['hargareal_'] = "Harga Realisasi"; } ?>

    <TD class="scFormLabelOddMult css_hargareal__label" id="hidden_field_label_hargareal_" style="<?php echo $sStyleHidden_hargareal_; ?>" > <?php echo $this->nm_new_label['hargareal_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['supplier_']) && $this->nmgp_cmp_hidden['supplier_'] == 'off') { $sStyleHidden_supplier_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['supplier_']) || $this->nmgp_cmp_hidden['supplier_'] == 'on') {
      if (!isset($this->nm_new_label['supplier_'])) {
          $this->nm_new_label['supplier_'] = "Supplier"; } ?>

    <TD class="scFormLabelOddMult css_supplier__label" id="hidden_field_label_supplier_" style="<?php echo $sStyleHidden_supplier_; ?>" > <?php echo $this->nm_new_label['supplier_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['keterangan_']) && $this->nmgp_cmp_hidden['keterangan_'] == 'off') { $sStyleHidden_keterangan_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['keterangan_']) || $this->nmgp_cmp_hidden['keterangan_'] == 'on') {
      if (!isset($this->nm_new_label['keterangan_'])) {
          $this->nm_new_label['keterangan_'] = "Keterangan"; } ?>

    <TD class="scFormLabelOddMult css_keterangan__label" id="hidden_field_label_keterangan_" style="<?php echo $sStyleHidden_keterangan_; ?>" > <?php echo $this->nm_new_label['keterangan_'] ?> </TD>
   <?php } ?>

   <?php if ((!isset($this->nmgp_cmp_hidden['id_']) || $this->nmgp_cmp_hidden['id_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_'])) {
          $this->nm_new_label['id_'] = "Id"; } ?>

    <TD class="scFormLabelOddMult css_id__label" id="hidden_field_label_id_" style="<?php echo $sStyleHidden_id_; ?>" > <?php echo $this->nm_new_label['id_'] ?> </TD>
   <?php }?>





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
       $iStart = sizeof($this->form_vert_form_detailusulanpengadaan_gizi);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_detailusulanpengadaan_gizi = $this->form_vert_form_detailusulanpengadaan_gizi;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_detailusulanpengadaan_gizi))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_']))
           {
               $this->nmgp_cmp_readonly['id_'] = 'on';
           }
   foreach ($this->form_vert_form_detailusulanpengadaan_gizi as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->usulancode_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['usulancode_'];
       $this->diskon_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['diskon_'];
       $this->ppn_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['ppn_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['bahan_'] = true;
           $this->nmgp_cmp_readonly['satuan_'] = true;
           $this->nmgp_cmp_readonly['stok_'] = true;
           $this->nmgp_cmp_readonly['jumlah_'] = true;
           $this->nmgp_cmp_readonly['refharga_'] = true;
           $this->nmgp_cmp_readonly['disetujui_'] = true;
           $this->nmgp_cmp_readonly['subtotal_'] = true;
           $this->nmgp_cmp_readonly['diterima_'] = true;
           $this->nmgp_cmp_readonly['hargareal_'] = true;
           $this->nmgp_cmp_readonly['supplier_'] = true;
           $this->nmgp_cmp_readonly['keterangan_'] = true;
           $this->nmgp_cmp_readonly['id_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['bahan_']) || $this->nmgp_cmp_readonly['bahan_'] != "on") {$this->nmgp_cmp_readonly['bahan_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['satuan_']) || $this->nmgp_cmp_readonly['satuan_'] != "on") {$this->nmgp_cmp_readonly['satuan_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['stok_']) || $this->nmgp_cmp_readonly['stok_'] != "on") {$this->nmgp_cmp_readonly['stok_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['jumlah_']) || $this->nmgp_cmp_readonly['jumlah_'] != "on") {$this->nmgp_cmp_readonly['jumlah_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['refharga_']) || $this->nmgp_cmp_readonly['refharga_'] != "on") {$this->nmgp_cmp_readonly['refharga_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['disetujui_']) || $this->nmgp_cmp_readonly['disetujui_'] != "on") {$this->nmgp_cmp_readonly['disetujui_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['subtotal_']) || $this->nmgp_cmp_readonly['subtotal_'] != "on") {$this->nmgp_cmp_readonly['subtotal_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['diterima_']) || $this->nmgp_cmp_readonly['diterima_'] != "on") {$this->nmgp_cmp_readonly['diterima_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['hargareal_']) || $this->nmgp_cmp_readonly['hargareal_'] != "on") {$this->nmgp_cmp_readonly['hargareal_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['supplier_']) || $this->nmgp_cmp_readonly['supplier_'] != "on") {$this->nmgp_cmp_readonly['supplier_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['keterangan_']) || $this->nmgp_cmp_readonly['keterangan_'] != "on") {$this->nmgp_cmp_readonly['keterangan_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_']) || $this->nmgp_cmp_readonly['id_'] != "on") {$this->nmgp_cmp_readonly['id_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->bahan_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['bahan_']; 
       $bahan_ = $this->bahan_; 
       $sStyleHidden_bahan_ = '';
       if (isset($sCheckRead_bahan_))
       {
           unset($sCheckRead_bahan_);
       }
       if (isset($this->nmgp_cmp_readonly['bahan_']))
       {
           $sCheckRead_bahan_ = $this->nmgp_cmp_readonly['bahan_'];
       }
       if (isset($this->nmgp_cmp_hidden['bahan_']) && $this->nmgp_cmp_hidden['bahan_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['bahan_']);
           $sStyleHidden_bahan_ = 'display: none;';
       }
       $bTestReadOnly_bahan_ = true;
       $sStyleReadLab_bahan_ = 'display: none;';
       $sStyleReadInp_bahan_ = '';
       if (isset($this->nmgp_cmp_readonly['bahan_']) && $this->nmgp_cmp_readonly['bahan_'] == 'on')
       {
           $bTestReadOnly_bahan_ = false;
           unset($this->nmgp_cmp_readonly['bahan_']);
           $sStyleReadLab_bahan_ = '';
           $sStyleReadInp_bahan_ = 'display: none;';
       }
       $this->satuan_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['satuan_']; 
       $satuan_ = $this->satuan_; 
       $sStyleHidden_satuan_ = '';
       if (isset($sCheckRead_satuan_))
       {
           unset($sCheckRead_satuan_);
       }
       if (isset($this->nmgp_cmp_readonly['satuan_']))
       {
           $sCheckRead_satuan_ = $this->nmgp_cmp_readonly['satuan_'];
       }
       if (isset($this->nmgp_cmp_hidden['satuan_']) && $this->nmgp_cmp_hidden['satuan_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['satuan_']);
           $sStyleHidden_satuan_ = 'display: none;';
       }
       $bTestReadOnly_satuan_ = true;
       $sStyleReadLab_satuan_ = 'display: none;';
       $sStyleReadInp_satuan_ = '';
       if (isset($this->nmgp_cmp_readonly['satuan_']) && $this->nmgp_cmp_readonly['satuan_'] == 'on')
       {
           $bTestReadOnly_satuan_ = false;
           unset($this->nmgp_cmp_readonly['satuan_']);
           $sStyleReadLab_satuan_ = '';
           $sStyleReadInp_satuan_ = 'display: none;';
       }
       $this->stok_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['stok_']; 
       $stok_ = $this->stok_; 
       $sStyleHidden_stok_ = '';
       if (isset($sCheckRead_stok_))
       {
           unset($sCheckRead_stok_);
       }
       if (isset($this->nmgp_cmp_readonly['stok_']))
       {
           $sCheckRead_stok_ = $this->nmgp_cmp_readonly['stok_'];
       }
       if (isset($this->nmgp_cmp_hidden['stok_']) && $this->nmgp_cmp_hidden['stok_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['stok_']);
           $sStyleHidden_stok_ = 'display: none;';
       }
       $bTestReadOnly_stok_ = true;
       $sStyleReadLab_stok_ = 'display: none;';
       $sStyleReadInp_stok_ = '';
       if (isset($this->nmgp_cmp_readonly['stok_']) && $this->nmgp_cmp_readonly['stok_'] == 'on')
       {
           $bTestReadOnly_stok_ = false;
           unset($this->nmgp_cmp_readonly['stok_']);
           $sStyleReadLab_stok_ = '';
           $sStyleReadInp_stok_ = 'display: none;';
       }
       $this->jumlah_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['jumlah_']; 
       $jumlah_ = $this->jumlah_; 
       $sStyleHidden_jumlah_ = '';
       if (isset($sCheckRead_jumlah_))
       {
           unset($sCheckRead_jumlah_);
       }
       if (isset($this->nmgp_cmp_readonly['jumlah_']))
       {
           $sCheckRead_jumlah_ = $this->nmgp_cmp_readonly['jumlah_'];
       }
       if (isset($this->nmgp_cmp_hidden['jumlah_']) && $this->nmgp_cmp_hidden['jumlah_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['jumlah_']);
           $sStyleHidden_jumlah_ = 'display: none;';
       }
       $bTestReadOnly_jumlah_ = true;
       $sStyleReadLab_jumlah_ = 'display: none;';
       $sStyleReadInp_jumlah_ = '';
       if (isset($this->nmgp_cmp_readonly['jumlah_']) && $this->nmgp_cmp_readonly['jumlah_'] == 'on')
       {
           $bTestReadOnly_jumlah_ = false;
           unset($this->nmgp_cmp_readonly['jumlah_']);
           $sStyleReadLab_jumlah_ = '';
           $sStyleReadInp_jumlah_ = 'display: none;';
       }
       $this->refharga_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['refharga_']; 
       $refharga_ = $this->refharga_; 
       $sStyleHidden_refharga_ = '';
       if (isset($sCheckRead_refharga_))
       {
           unset($sCheckRead_refharga_);
       }
       if (isset($this->nmgp_cmp_readonly['refharga_']))
       {
           $sCheckRead_refharga_ = $this->nmgp_cmp_readonly['refharga_'];
       }
       if (isset($this->nmgp_cmp_hidden['refharga_']) && $this->nmgp_cmp_hidden['refharga_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['refharga_']);
           $sStyleHidden_refharga_ = 'display: none;';
       }
       $bTestReadOnly_refharga_ = true;
       $sStyleReadLab_refharga_ = 'display: none;';
       $sStyleReadInp_refharga_ = '';
       if (isset($this->nmgp_cmp_readonly['refharga_']) && $this->nmgp_cmp_readonly['refharga_'] == 'on')
       {
           $bTestReadOnly_refharga_ = false;
           unset($this->nmgp_cmp_readonly['refharga_']);
           $sStyleReadLab_refharga_ = '';
           $sStyleReadInp_refharga_ = 'display: none;';
       }
       $this->disetujui_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['disetujui_']; 
       $disetujui_ = $this->disetujui_; 
       $sStyleHidden_disetujui_ = '';
       if (isset($sCheckRead_disetujui_))
       {
           unset($sCheckRead_disetujui_);
       }
       if (isset($this->nmgp_cmp_readonly['disetujui_']))
       {
           $sCheckRead_disetujui_ = $this->nmgp_cmp_readonly['disetujui_'];
       }
       if (isset($this->nmgp_cmp_hidden['disetujui_']) && $this->nmgp_cmp_hidden['disetujui_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['disetujui_']);
           $sStyleHidden_disetujui_ = 'display: none;';
       }
       $bTestReadOnly_disetujui_ = true;
       $sStyleReadLab_disetujui_ = 'display: none;';
       $sStyleReadInp_disetujui_ = '';
       if (isset($this->nmgp_cmp_readonly['disetujui_']) && $this->nmgp_cmp_readonly['disetujui_'] == 'on')
       {
           $bTestReadOnly_disetujui_ = false;
           unset($this->nmgp_cmp_readonly['disetujui_']);
           $sStyleReadLab_disetujui_ = '';
           $sStyleReadInp_disetujui_ = 'display: none;';
       }
       $this->subtotal_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['subtotal_']; 
       $subtotal_ = $this->subtotal_; 
       $sStyleHidden_subtotal_ = '';
       if (isset($sCheckRead_subtotal_))
       {
           unset($sCheckRead_subtotal_);
       }
       if (isset($this->nmgp_cmp_readonly['subtotal_']))
       {
           $sCheckRead_subtotal_ = $this->nmgp_cmp_readonly['subtotal_'];
       }
       if (isset($this->nmgp_cmp_hidden['subtotal_']) && $this->nmgp_cmp_hidden['subtotal_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['subtotal_']);
           $sStyleHidden_subtotal_ = 'display: none;';
       }
       $bTestReadOnly_subtotal_ = true;
       $sStyleReadLab_subtotal_ = 'display: none;';
       $sStyleReadInp_subtotal_ = '';
       if (isset($this->nmgp_cmp_readonly['subtotal_']) && $this->nmgp_cmp_readonly['subtotal_'] == 'on')
       {
           $bTestReadOnly_subtotal_ = false;
           unset($this->nmgp_cmp_readonly['subtotal_']);
           $sStyleReadLab_subtotal_ = '';
           $sStyleReadInp_subtotal_ = 'display: none;';
       }
       $this->diterima_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['diterima_']; 
       $diterima_ = $this->diterima_; 
       $sStyleHidden_diterima_ = '';
       if (isset($sCheckRead_diterima_))
       {
           unset($sCheckRead_diterima_);
       }
       if (isset($this->nmgp_cmp_readonly['diterima_']))
       {
           $sCheckRead_diterima_ = $this->nmgp_cmp_readonly['diterima_'];
       }
       if (isset($this->nmgp_cmp_hidden['diterima_']) && $this->nmgp_cmp_hidden['diterima_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['diterima_']);
           $sStyleHidden_diterima_ = 'display: none;';
       }
       $bTestReadOnly_diterima_ = true;
       $sStyleReadLab_diterima_ = 'display: none;';
       $sStyleReadInp_diterima_ = '';
       if (isset($this->nmgp_cmp_readonly['diterima_']) && $this->nmgp_cmp_readonly['diterima_'] == 'on')
       {
           $bTestReadOnly_diterima_ = false;
           unset($this->nmgp_cmp_readonly['diterima_']);
           $sStyleReadLab_diterima_ = '';
           $sStyleReadInp_diterima_ = 'display: none;';
       }
       $this->hargareal_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['hargareal_']; 
       $hargareal_ = $this->hargareal_; 
       $sStyleHidden_hargareal_ = '';
       if (isset($sCheckRead_hargareal_))
       {
           unset($sCheckRead_hargareal_);
       }
       if (isset($this->nmgp_cmp_readonly['hargareal_']))
       {
           $sCheckRead_hargareal_ = $this->nmgp_cmp_readonly['hargareal_'];
       }
       if (isset($this->nmgp_cmp_hidden['hargareal_']) && $this->nmgp_cmp_hidden['hargareal_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['hargareal_']);
           $sStyleHidden_hargareal_ = 'display: none;';
       }
       $bTestReadOnly_hargareal_ = true;
       $sStyleReadLab_hargareal_ = 'display: none;';
       $sStyleReadInp_hargareal_ = '';
       if (isset($this->nmgp_cmp_readonly['hargareal_']) && $this->nmgp_cmp_readonly['hargareal_'] == 'on')
       {
           $bTestReadOnly_hargareal_ = false;
           unset($this->nmgp_cmp_readonly['hargareal_']);
           $sStyleReadLab_hargareal_ = '';
           $sStyleReadInp_hargareal_ = 'display: none;';
       }
       $this->supplier_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['supplier_']; 
       $supplier_ = $this->supplier_; 
       $sStyleHidden_supplier_ = '';
       if (isset($sCheckRead_supplier_))
       {
           unset($sCheckRead_supplier_);
       }
       if (isset($this->nmgp_cmp_readonly['supplier_']))
       {
           $sCheckRead_supplier_ = $this->nmgp_cmp_readonly['supplier_'];
       }
       if (isset($this->nmgp_cmp_hidden['supplier_']) && $this->nmgp_cmp_hidden['supplier_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['supplier_']);
           $sStyleHidden_supplier_ = 'display: none;';
       }
       $bTestReadOnly_supplier_ = true;
       $sStyleReadLab_supplier_ = 'display: none;';
       $sStyleReadInp_supplier_ = '';
       if (isset($this->nmgp_cmp_readonly['supplier_']) && $this->nmgp_cmp_readonly['supplier_'] == 'on')
       {
           $bTestReadOnly_supplier_ = false;
           unset($this->nmgp_cmp_readonly['supplier_']);
           $sStyleReadLab_supplier_ = '';
           $sStyleReadInp_supplier_ = 'display: none;';
       }
       $this->keterangan_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['keterangan_']; 
       $keterangan_ = $this->keterangan_; 
       $keterangan__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $keterangan_);
       $keterangan__val = $keterangan__tmp;
       $sStyleHidden_keterangan_ = '';
       if (isset($sCheckRead_keterangan_))
       {
           unset($sCheckRead_keterangan_);
       }
       if (isset($this->nmgp_cmp_readonly['keterangan_']))
       {
           $sCheckRead_keterangan_ = $this->nmgp_cmp_readonly['keterangan_'];
       }
       if (isset($this->nmgp_cmp_hidden['keterangan_']) && $this->nmgp_cmp_hidden['keterangan_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['keterangan_']);
           $sStyleHidden_keterangan_ = 'display: none;';
       }
       $bTestReadOnly_keterangan_ = true;
       $sStyleReadLab_keterangan_ = 'display: none;';
       $sStyleReadInp_keterangan_ = '';
       if (isset($this->nmgp_cmp_readonly['keterangan_']) && $this->nmgp_cmp_readonly['keterangan_'] == 'on')
       {
           $bTestReadOnly_keterangan_ = false;
           unset($this->nmgp_cmp_readonly['keterangan_']);
           $sStyleReadLab_keterangan_ = '';
           $sStyleReadInp_keterangan_ = 'display: none;';
       }
       $this->id_ = $this->form_vert_form_detailusulanpengadaan_gizi[$sc_seq_vert]['id_']; 
       $id_ = $this->id_; 
       if (!isset($this->nmgp_cmp_hidden['id_']))
       {
           $this->nmgp_cmp_hidden['id_'] = 'off';
       }
       $sStyleHidden_id_ = '';
       if (isset($sCheckRead_id_))
       {
           unset($sCheckRead_id_);
       }
       if (isset($this->nmgp_cmp_readonly['id_']))
       {
           $sCheckRead_id_ = $this->nmgp_cmp_readonly['id_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_']);
           $sStyleHidden_id_ = 'display: none;';
       }
       $bTestReadOnly_id_ = true;
       $sStyleReadLab_id_ = 'display: none;';
       $sStyleReadInp_id_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_"]) &&  $this->nmgp_cmp_readonly["id_"] == "on"))
       {
           $bTestReadOnly_id_ = false;
           unset($this->nmgp_cmp_readonly['id_']);
           $sStyleReadLab_id_ = '';
           $sStyleReadInp_id_ = 'display: none;';
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_detailusulanpengadaan_gizi_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_detailusulanpengadaan_gizi_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detailusulanpengadaan_gizi_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_detailusulanpengadaan_gizi_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detailusulanpengadaan_gizi_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_detailusulanpengadaan_gizi_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['bahan_']) && $this->nmgp_cmp_hidden['bahan_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bahan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bahan_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_bahan__line" id="hidden_field_data_bahan_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_bahan_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_bahan__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_bahan_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bahan_"]) &&  $this->nmgp_cmp_readonly["bahan_"] == "on") { 

 ?>
<input type="hidden" name="bahan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bahan_) . "\">" . $bahan_ . ""; ?>
<?php } else { ?>

<?php
$aRecData['bahan_'] = $this->bahan_;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_bahan_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_bahan_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_bahan_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_bahan_'] = array(); 
    }

   $old_value_jumlah_ = $this->jumlah_;
   $old_value_refharga_ = $this->refharga_;
   $old_value_disetujui_ = $this->disetujui_;
   $old_value_subtotal_ = $this->subtotal_;
   $old_value_diterima_ = $this->diterima_;
   $old_value_hargareal_ = $this->hargareal_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_refharga_ = $this->refharga_;
   $unformatted_value_disetujui_ = $this->disetujui_;
   $unformatted_value_subtotal_ = $this->subtotal_;
   $unformatted_value_diterima_ = $this->diterima_;
   $unformatted_value_hargareal_ = $this->hargareal_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT bahancode, nama FROM bahan WHERE (aktif = 'Y') AND bahancode = '" . $aRecData['bahan_'] . "'";

   $this->jumlah_ = $old_value_jumlah_;
   $this->refharga_ = $old_value_refharga_;
   $this->disetujui_ = $old_value_disetujui_;
   $this->subtotal_ = $old_value_subtotal_;
   $this->diterima_ = $old_value_diterima_;
   $this->hargareal_ = $old_value_hargareal_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_bahan_'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->bahan_])) ? $aLookup[0][$this->bahan_] : $this->bahan_;
$bahan__look = (isset($aLookup[0][$this->bahan_])) ? $aLookup[0][$this->bahan_] : $this->bahan_;
?>
<span id="id_read_on_bahan_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-bahan_<?php echo $sc_seq_vert ?> css_bahan__line" style="<?php echo $sStyleReadLab_bahan_; ?>"><?php echo str_replace("<", "&lt;", $bahan__look); ?></span><span id="id_read_off_bahan_<?php echo $sc_seq_vert ?>" class="css_read_off_bahan_" style="white-space: nowrap;<?php echo $sStyleReadInp_bahan_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_bahan__obj" style="display: none;" id="id_sc_field_bahan_<?php echo $sc_seq_vert ?>" type=text name="bahan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bahan_) ?>"
 size=50 maxlength=50 style="display: none" alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['bahan_'] = $this->bahan_;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_bahan_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_bahan_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_bahan_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_bahan_'] = array(); 
    }

   $old_value_jumlah_ = $this->jumlah_;
   $old_value_refharga_ = $this->refharga_;
   $old_value_disetujui_ = $this->disetujui_;
   $old_value_subtotal_ = $this->subtotal_;
   $old_value_diterima_ = $this->diterima_;
   $old_value_hargareal_ = $this->hargareal_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_refharga_ = $this->refharga_;
   $unformatted_value_disetujui_ = $this->disetujui_;
   $unformatted_value_subtotal_ = $this->subtotal_;
   $unformatted_value_diterima_ = $this->diterima_;
   $unformatted_value_hargareal_ = $this->hargareal_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT bahancode, nama FROM bahan WHERE (aktif = 'Y') AND bahancode = '" . $aRecData['bahan_'] . "'";

   $this->jumlah_ = $old_value_jumlah_;
   $this->refharga_ = $old_value_refharga_;
   $this->disetujui_ = $old_value_disetujui_;
   $this->subtotal_ = $old_value_subtotal_;
   $this->diterima_ = $old_value_diterima_;
   $this->hargareal_ = $old_value_hargareal_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_bahan_'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->bahan_])) ? $aLookup[0][$this->bahan_] : '';
$bahan__look = (isset($aLookup[0][$this->bahan_])) ? $aLookup[0][$this->bahan_] : '';
?>
<input type="text" id="id_ac_bahan_<?php echo $sc_seq_vert; ?>" name="bahan_<?php echo $sc_seq_vert; ?>_autocomp" class="scFormObjectOddMult sc-ui-autocomp-bahan_ css_bahan__obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bahan_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bahan_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['satuan_']) && $this->nmgp_cmp_hidden['satuan_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="satuan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->satuan_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_satuan__line" id="hidden_field_data_satuan_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_satuan_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_satuan__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_satuan_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["satuan_"]) &&  $this->nmgp_cmp_readonly["satuan_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_satuan_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_satuan_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_satuan_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_satuan_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_satuan_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_satuan_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_satuan_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_satuan_'] = array(); 
    }

   $old_value_jumlah_ = $this->jumlah_;
   $old_value_refharga_ = $this->refharga_;
   $old_value_disetujui_ = $this->disetujui_;
   $old_value_subtotal_ = $this->subtotal_;
   $old_value_diterima_ = $this->diterima_;
   $old_value_hargareal_ = $this->hargareal_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_refharga_ = $this->refharga_;
   $unformatted_value_disetujui_ = $this->disetujui_;
   $unformatted_value_subtotal_ = $this->subtotal_;
   $unformatted_value_diterima_ = $this->diterima_;
   $unformatted_value_hargareal_ = $this->hargareal_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT satuan FROM bahan where bahancode = '$this->bahan_' ORDER BY satuan";

   $this->jumlah_ = $old_value_jumlah_;
   $this->refharga_ = $old_value_refharga_;
   $this->disetujui_ = $old_value_disetujui_;
   $this->subtotal_ = $old_value_subtotal_;
   $this->diterima_ = $old_value_diterima_;
   $this->hargareal_ = $old_value_hargareal_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_satuan_'][] = $rs->fields[0];
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
   $satuan__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->satuan__1))
          {
              foreach ($this->satuan__1 as $tmp_satuan_)
              {
                  if (trim($tmp_satuan_) === trim($cadaselect[1])) { $satuan__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->satuan_) === trim($cadaselect[1])) { $satuan__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="satuan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($satuan_) . "\">" . $satuan__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_satuan_();
   $x = 0 ; 
   $satuan__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->satuan__1))
          {
              foreach ($this->satuan__1 as $tmp_satuan_)
              {
                  if (trim($tmp_satuan_) === trim($cadaselect[1])) { $satuan__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->satuan_) === trim($cadaselect[1])) { $satuan__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($satuan__look))
          {
              $satuan__look = $this->satuan_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_satuan_" . $sc_seq_vert . "\" class=\"css_satuan__line\" style=\"" .  $sStyleReadLab_satuan_ . "\">" . $this->form_encode_input($satuan__look) . "</span><span id=\"id_read_off_satuan_" . $sc_seq_vert . "\" class=\"css_read_off_satuan_\" style=\"white-space: nowrap; " . $sStyleReadInp_satuan_ . "\">";
   echo " <span id=\"idAjaxSelect_satuan_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_satuan__obj\" style=\"\" id=\"id_sc_field_satuan_" . $sc_seq_vert . "\" name=\"satuan_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->satuan_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->satuan_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_satuan_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_satuan_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['stok_']) && $this->nmgp_cmp_hidden['stok_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="stok_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stok_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_stok__line" id="hidden_field_data_stok_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_stok_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_stok__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_stok_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["stok_"]) &&  $this->nmgp_cmp_readonly["stok_"] == "on") { 

 ?>
<input type="hidden" name="stok_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stok_) . "\">" . $stok_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_stok_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-stok_<?php echo $sc_seq_vert ?> css_stok__line" style="<?php echo $sStyleReadLab_stok_; ?>"><?php echo $this->stok_; ?></span><span id="id_read_off_stok_<?php echo $sc_seq_vert ?>" class="css_read_off_stok_" style="white-space: nowrap;<?php echo $sStyleReadInp_stok_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_stok__obj" style="" id="id_sc_field_stok_<?php echo $sc_seq_vert ?>" type=text name="stok_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stok_) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_stok_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_stok_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['jumlah_']) && $this->nmgp_cmp_hidden['jumlah_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jumlah_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($jumlah_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_jumlah__line" id="hidden_field_data_jumlah_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_jumlah_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_jumlah__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_jumlah_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jumlah_"]) &&  $this->nmgp_cmp_readonly["jumlah_"] == "on") { 

 ?>
<input type="hidden" name="jumlah_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($jumlah_) . "\">" . $jumlah_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_jumlah_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-jumlah_<?php echo $sc_seq_vert ?> css_jumlah__line" style="<?php echo $sStyleReadLab_jumlah_; ?>"><?php echo $this->jumlah_; ?></span><span id="id_read_off_jumlah_<?php echo $sc_seq_vert ?>" class="css_read_off_jumlah_" style="white-space: nowrap;<?php echo $sStyleReadInp_jumlah_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_jumlah__obj" style="" id="id_sc_field_jumlah_<?php echo $sc_seq_vert ?>" type=text name="jumlah_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($jumlah_) ?>"
 size=5 alt="{datatype: 'decimal', maxLength: 5, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['jumlah_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['jumlah_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['jumlah_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['jumlah_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jumlah_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jumlah_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['refharga_']) && $this->nmgp_cmp_hidden['refharga_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="refharga_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($refharga_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_refharga__line" id="hidden_field_data_refharga_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_refharga_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_refharga__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_refharga_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["refharga_"]) &&  $this->nmgp_cmp_readonly["refharga_"] == "on") { 

 ?>
<input type="hidden" name="refharga_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($refharga_) . "\">" . $refharga_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_refharga_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-refharga_<?php echo $sc_seq_vert ?> css_refharga__line" style="<?php echo $sStyleReadLab_refharga_; ?>"><?php echo $this->refharga_; ?></span><span id="id_read_off_refharga_<?php echo $sc_seq_vert ?>" class="css_read_off_refharga_" style="white-space: nowrap;<?php echo $sStyleReadInp_refharga_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_refharga__obj" style="" id="id_sc_field_refharga_<?php echo $sc_seq_vert ?>" type=text name="refharga_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($refharga_) ?>"
 size=8 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['refharga_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['refharga_']['format_pos'] || 3 == $this->field_config['refharga_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 8, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['refharga_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['refharga_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['refharga_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['refharga_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_refharga_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_refharga_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['disetujui_']) && $this->nmgp_cmp_hidden['disetujui_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="disetujui_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($disetujui_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_disetujui__line" id="hidden_field_data_disetujui_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_disetujui_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_disetujui__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_disetujui_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["disetujui_"]) &&  $this->nmgp_cmp_readonly["disetujui_"] == "on") { 

 ?>
<input type="hidden" name="disetujui_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($disetujui_) . "\">" . $disetujui_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_disetujui_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-disetujui_<?php echo $sc_seq_vert ?> css_disetujui__line" style="<?php echo $sStyleReadLab_disetujui_; ?>"><?php echo $this->disetujui_; ?></span><span id="id_read_off_disetujui_<?php echo $sc_seq_vert ?>" class="css_read_off_disetujui_" style="white-space: nowrap;<?php echo $sStyleReadInp_disetujui_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_disetujui__obj" style="" id="id_sc_field_disetujui_<?php echo $sc_seq_vert ?>" type=text name="disetujui_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($disetujui_) ?>"
 size=5 alt="{datatype: 'decimal', maxLength: 5, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['disetujui_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['disetujui_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['disetujui_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_disetujui_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_disetujui_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['subtotal_']) && $this->nmgp_cmp_hidden['subtotal_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="subtotal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($subtotal_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_subtotal__line" id="hidden_field_data_subtotal_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_subtotal_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_subtotal__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_subtotal_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["subtotal_"]) &&  $this->nmgp_cmp_readonly["subtotal_"] == "on") { 

 ?>
<input type="hidden" name="subtotal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($subtotal_) . "\">" . $subtotal_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_subtotal_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-subtotal_<?php echo $sc_seq_vert ?> css_subtotal__line" style="<?php echo $sStyleReadLab_subtotal_; ?>"><?php echo $this->subtotal_; ?></span><span id="id_read_off_subtotal_<?php echo $sc_seq_vert ?>" class="css_read_off_subtotal_" style="white-space: nowrap;<?php echo $sStyleReadInp_subtotal_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_subtotal__obj" style="" id="id_sc_field_subtotal_<?php echo $sc_seq_vert ?>" type=text name="subtotal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($subtotal_) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['subtotal_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['subtotal_']['format_pos'] || 3 == $this->field_config['subtotal_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['subtotal_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['subtotal_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['subtotal_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['subtotal_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_subtotal_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_subtotal_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['diterima_']) && $this->nmgp_cmp_hidden['diterima_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diterima_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($diterima_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_diterima__line" id="hidden_field_data_diterima_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_diterima_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_diterima__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_diterima_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diterima_"]) &&  $this->nmgp_cmp_readonly["diterima_"] == "on") { 

 ?>
<input type="hidden" name="diterima_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($diterima_) . "\">" . $diterima_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_diterima_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-diterima_<?php echo $sc_seq_vert ?> css_diterima__line" style="<?php echo $sStyleReadLab_diterima_; ?>"><?php echo $this->diterima_; ?></span><span id="id_read_off_diterima_<?php echo $sc_seq_vert ?>" class="css_read_off_diterima_" style="white-space: nowrap;<?php echo $sStyleReadInp_diterima_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_diterima__obj" style="" id="id_sc_field_diterima_<?php echo $sc_seq_vert ?>" type=text name="diterima_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($diterima_) ?>"
 size=5 alt="{datatype: 'decimal', maxLength: 5, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['diterima_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['diterima_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['diterima_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['diterima_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diterima_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diterima_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['hargareal_']) && $this->nmgp_cmp_hidden['hargareal_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hargareal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hargareal_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_hargareal__line" id="hidden_field_data_hargareal_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_hargareal_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_hargareal__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_hargareal_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hargareal_"]) &&  $this->nmgp_cmp_readonly["hargareal_"] == "on") { 

 ?>
<input type="hidden" name="hargareal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hargareal_) . "\">" . $hargareal_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_hargareal_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-hargareal_<?php echo $sc_seq_vert ?> css_hargareal__line" style="<?php echo $sStyleReadLab_hargareal_; ?>"><?php echo $this->hargareal_; ?></span><span id="id_read_off_hargareal_<?php echo $sc_seq_vert ?>" class="css_read_off_hargareal_" style="white-space: nowrap;<?php echo $sStyleReadInp_hargareal_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_hargareal__obj" style="" id="id_sc_field_hargareal_<?php echo $sc_seq_vert ?>" type=text name="hargareal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hargareal_) ?>"
 size=15 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['hargareal_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['hargareal_']['format_pos'] || 3 == $this->field_config['hargareal_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 15, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['hargareal_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['hargareal_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['hargareal_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['hargareal_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hargareal_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hargareal_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['supplier_']) && $this->nmgp_cmp_hidden['supplier_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="supplier_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->supplier_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_supplier__line" id="hidden_field_data_supplier_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_supplier_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_supplier__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_supplier_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["supplier_"]) &&  $this->nmgp_cmp_readonly["supplier_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_supplier_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_supplier_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_supplier_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_supplier_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_supplier_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_supplier_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_supplier_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_supplier_'] = array(); 
    }

   $old_value_jumlah_ = $this->jumlah_;
   $old_value_refharga_ = $this->refharga_;
   $old_value_disetujui_ = $this->disetujui_;
   $old_value_subtotal_ = $this->subtotal_;
   $old_value_diterima_ = $this->diterima_;
   $old_value_hargareal_ = $this->hargareal_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_refharga_ = $this->refharga_;
   $unformatted_value_disetujui_ = $this->disetujui_;
   $unformatted_value_subtotal_ = $this->subtotal_;
   $unformatted_value_diterima_ = $this->diterima_;
   $unformatted_value_hargareal_ = $this->hargareal_;
   $unformatted_value_id_ = $this->id_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT suppcode, jenis + ' ' + nama  FROM supplier_gizi";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT suppcode, concat(jenis,' ',nama)  FROM supplier_gizi";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT suppcode, jenis&' '&nama  FROM supplier_gizi";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT suppcode, jenis||' '||nama  FROM supplier_gizi";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT suppcode, jenis + ' ' + nama  FROM supplier_gizi";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT suppcode, jenis||' '||nama  FROM supplier_gizi";
   }
   else
   {
       $nm_comando = "SELECT suppcode, jenis||' '||nama  FROM supplier_gizi";
   }

   $this->jumlah_ = $old_value_jumlah_;
   $this->refharga_ = $old_value_refharga_;
   $this->disetujui_ = $old_value_disetujui_;
   $this->subtotal_ = $old_value_subtotal_;
   $this->diterima_ = $old_value_diterima_;
   $this->hargareal_ = $old_value_hargareal_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_supplier_'][] = $rs->fields[0];
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
   $supplier__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->supplier__1))
          {
              foreach ($this->supplier__1 as $tmp_supplier_)
              {
                  if (trim($tmp_supplier_) === trim($cadaselect[1])) { $supplier__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->supplier_) === trim($cadaselect[1])) { $supplier__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="supplier_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($supplier_) . "\">" . $supplier__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_supplier_();
   $x = 0 ; 
   $supplier__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->supplier__1))
          {
              foreach ($this->supplier__1 as $tmp_supplier_)
              {
                  if (trim($tmp_supplier_) === trim($cadaselect[1])) { $supplier__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->supplier_) === trim($cadaselect[1])) { $supplier__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($supplier__look))
          {
              $supplier__look = $this->supplier_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_supplier_" . $sc_seq_vert . "\" class=\"css_supplier__line\" style=\"" .  $sStyleReadLab_supplier_ . "\">" . $this->form_encode_input($supplier__look) . "</span><span id=\"id_read_off_supplier_" . $sc_seq_vert . "\" class=\"css_read_off_supplier_\" style=\"white-space: nowrap; " . $sStyleReadInp_supplier_ . "\">";
   echo " <span id=\"idAjaxSelect_supplier_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_supplier__obj\" style=\"\" id=\"id_sc_field_supplier_" . $sc_seq_vert . "\" name=\"supplier_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['Lookup_supplier_'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->supplier_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->supplier_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_supplier_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_supplier_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['keterangan_']) && $this->nmgp_cmp_hidden['keterangan_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="keterangan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($keterangan_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_keterangan__line" id="hidden_field_data_keterangan_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_keterangan_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_keterangan__line" style="vertical-align: top;padding: 0px">
<?php
$keterangan__val = nl2br($keterangan_);

?>

<?php if ($bTestReadOnly_keterangan_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["keterangan_"]) &&  $this->nmgp_cmp_readonly["keterangan_"] == "on") { 

 ?>
<input type="hidden" name="keterangan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($keterangan_) . "\">" . $keterangan__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_keterangan_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-keterangan_<?php echo $sc_seq_vert ?> css_keterangan__line" style="<?php echo $sStyleReadLab_keterangan_; ?>"><?php echo $keterangan__val; ?></span><span id="id_read_off_keterangan_<?php echo $sc_seq_vert ?>" class="css_read_off_keterangan_" style="white-space: nowrap;<?php echo $sStyleReadInp_keterangan_; ?>">
 <textarea  class="sc-js-input scFormObjectOddMult css_keterangan__obj" style="white-space: pre-wrap;" name="keterangan_<?php echo $sc_seq_vert ?>" id="id_sc_field_keterangan_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $keterangan_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_keterangan_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_keterangan_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_id__line" id="hidden_field_data_id_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_<?php echo $sc_seq_vert ?>" class="css_id__line" style="<?php echo $sStyleReadLab_id_; ?>"><?php echo $this->form_encode_input($this->id_); ?></span><span id="id_read_off_id_<?php echo $sc_seq_vert ?>" class="css_read_off_id_" style="<?php echo $sStyleReadInp_id_; ?>"><input type="hidden" id="id_sc_field_id_<?php echo $sc_seq_vert ?>" name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) . "\">"?>
<span id="id_ajax_label_id_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($id_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_bahan_))
       {
           $this->nmgp_cmp_readonly['bahan_'] = $sCheckRead_bahan_;
       }
       if ('display: none;' == $sStyleHidden_bahan_)
       {
           $this->nmgp_cmp_hidden['bahan_'] = 'off';
       }
       if (isset($sCheckRead_satuan_))
       {
           $this->nmgp_cmp_readonly['satuan_'] = $sCheckRead_satuan_;
       }
       if ('display: none;' == $sStyleHidden_satuan_)
       {
           $this->nmgp_cmp_hidden['satuan_'] = 'off';
       }
       if (isset($sCheckRead_stok_))
       {
           $this->nmgp_cmp_readonly['stok_'] = $sCheckRead_stok_;
       }
       if ('display: none;' == $sStyleHidden_stok_)
       {
           $this->nmgp_cmp_hidden['stok_'] = 'off';
       }
       if (isset($sCheckRead_jumlah_))
       {
           $this->nmgp_cmp_readonly['jumlah_'] = $sCheckRead_jumlah_;
       }
       if ('display: none;' == $sStyleHidden_jumlah_)
       {
           $this->nmgp_cmp_hidden['jumlah_'] = 'off';
       }
       if (isset($sCheckRead_refharga_))
       {
           $this->nmgp_cmp_readonly['refharga_'] = $sCheckRead_refharga_;
       }
       if ('display: none;' == $sStyleHidden_refharga_)
       {
           $this->nmgp_cmp_hidden['refharga_'] = 'off';
       }
       if (isset($sCheckRead_disetujui_))
       {
           $this->nmgp_cmp_readonly['disetujui_'] = $sCheckRead_disetujui_;
       }
       if ('display: none;' == $sStyleHidden_disetujui_)
       {
           $this->nmgp_cmp_hidden['disetujui_'] = 'off';
       }
       if (isset($sCheckRead_subtotal_))
       {
           $this->nmgp_cmp_readonly['subtotal_'] = $sCheckRead_subtotal_;
       }
       if ('display: none;' == $sStyleHidden_subtotal_)
       {
           $this->nmgp_cmp_hidden['subtotal_'] = 'off';
       }
       if (isset($sCheckRead_diterima_))
       {
           $this->nmgp_cmp_readonly['diterima_'] = $sCheckRead_diterima_;
       }
       if ('display: none;' == $sStyleHidden_diterima_)
       {
           $this->nmgp_cmp_hidden['diterima_'] = 'off';
       }
       if (isset($sCheckRead_hargareal_))
       {
           $this->nmgp_cmp_readonly['hargareal_'] = $sCheckRead_hargareal_;
       }
       if ('display: none;' == $sStyleHidden_hargareal_)
       {
           $this->nmgp_cmp_hidden['hargareal_'] = 'off';
       }
       if (isset($sCheckRead_supplier_))
       {
           $this->nmgp_cmp_readonly['supplier_'] = $sCheckRead_supplier_;
       }
       if ('display: none;' == $sStyleHidden_supplier_)
       {
           $this->nmgp_cmp_hidden['supplier_'] = 'off';
       }
       if (isset($sCheckRead_keterangan_))
       {
           $this->nmgp_cmp_readonly['keterangan_'] = $sCheckRead_keterangan_;
       }
       if ('display: none;' == $sStyleHidden_keterangan_)
       {
           $this->nmgp_cmp_hidden['keterangan_'] = 'off';
       }
       if (isset($sCheckRead_id_))
       {
           $this->nmgp_cmp_readonly['id_'] = $sCheckRead_id_;
       }
       if ('display: none;' == $sStyleHidden_id_)
       {
           $this->nmgp_cmp_hidden['id_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_detailusulanpengadaan_gizi = $guarda_form_vert_form_detailusulanpengadaan_gizi;
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R")
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
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
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
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_detailusulanpengadaan_gizi");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_detailusulanpengadaan_gizi");
 parent.scAjaxDetailHeight("form_detailusulanpengadaan_gizi", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_detailusulanpengadaan_gizi", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_detailusulanpengadaan_gizi", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['sc_modal'])
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
			do_ajax_form_detailusulanpengadaan_gizi_add_new_line(); return false;
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
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
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
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailusulanpengadaan_gizi']['buttonStatus'] = $this->nmgp_botoes;
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
