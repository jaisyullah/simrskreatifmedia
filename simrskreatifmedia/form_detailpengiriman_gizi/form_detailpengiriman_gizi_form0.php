<?php
class form_detailpengiriman_gizi_form extends form_detailpengiriman_gizi_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - detailpengiriman_gizi"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - detailpengiriman_gizi"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['sc_redir_atualiz'] == 'ok')
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
.css_read_off_tgl_lahir_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_detailpengiriman_gizi/form_detailpengiriman_gizi_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_detailpengiriman_gizi_sajax_js.php");
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
     if (F_name == "jadwal_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "jadwal_" + ii;
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
    nm_field_disabled("jadwal_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_detailpengiriman_gizi_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

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

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_detailpengiriman_gizi_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_detailpengiriman_gizi'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_detailpengiriman_gizi'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - detailpengiriman_gizi"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - detailpengiriman_gizi"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['fast_search'][2] : "";
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['empty_filter'] = true;
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
   <?php if (isset($this->nmgp_cmp_hidden['gelar_']) && $this->nmgp_cmp_hidden['gelar_'] == 'off') { $sStyleHidden_gelar_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['gelar_']) || $this->nmgp_cmp_hidden['gelar_'] == 'on') {
      if (!isset($this->nm_new_label['gelar_'])) {
          $this->nm_new_label['gelar_'] = "Gelar"; } ?>

    <TD class="scFormLabelOddMult css_gelar__label" id="hidden_field_label_gelar_" style="<?php echo $sStyleHidden_gelar_; ?>" > <?php echo $this->nm_new_label['gelar_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['nama_pasien_']) && $this->nmgp_cmp_hidden['nama_pasien_'] == 'off') { $sStyleHidden_nama_pasien_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['nama_pasien_']) || $this->nmgp_cmp_hidden['nama_pasien_'] == 'on') {
      if (!isset($this->nm_new_label['nama_pasien_'])) {
          $this->nm_new_label['nama_pasien_'] = "Nama Pasien"; } ?>

    <TD class="scFormLabelOddMult css_nama_pasien__label" id="hidden_field_label_nama_pasien_" style="<?php echo $sStyleHidden_nama_pasien_; ?>" > <?php echo $this->nm_new_label['nama_pasien_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['kamar_kelas_']) && $this->nmgp_cmp_hidden['kamar_kelas_'] == 'off') { $sStyleHidden_kamar_kelas_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['kamar_kelas_']) || $this->nmgp_cmp_hidden['kamar_kelas_'] == 'on') {
      if (!isset($this->nm_new_label['kamar_kelas_'])) {
          $this->nm_new_label['kamar_kelas_'] = "Kamar Kelas"; } ?>

    <TD class="scFormLabelOddMult css_kamar_kelas__label" id="hidden_field_label_kamar_kelas_" style="<?php echo $sStyleHidden_kamar_kelas_; ?>" > <?php echo $this->nm_new_label['kamar_kelas_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['bed_']) && $this->nmgp_cmp_hidden['bed_'] == 'off') { $sStyleHidden_bed_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['bed_']) || $this->nmgp_cmp_hidden['bed_'] == 'on') {
      if (!isset($this->nm_new_label['bed_'])) {
          $this->nm_new_label['bed_'] = "Bed"; } ?>

    <TD class="scFormLabelOddMult css_bed__label" id="hidden_field_label_bed_" style="<?php echo $sStyleHidden_bed_; ?>" > <?php echo $this->nm_new_label['bed_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['diet_']) && $this->nmgp_cmp_hidden['diet_'] == 'off') { $sStyleHidden_diet_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['diet_']) || $this->nmgp_cmp_hidden['diet_'] == 'on') {
      if (!isset($this->nm_new_label['diet_'])) {
          $this->nm_new_label['diet_'] = "Diet"; } ?>

    <TD class="scFormLabelOddMult css_diet__label" id="hidden_field_label_diet_" style="<?php echo $sStyleHidden_diet_; ?>" > <?php echo $this->nm_new_label['diet_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['gizi_']) && $this->nmgp_cmp_hidden['gizi_'] == 'off') { $sStyleHidden_gizi_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['gizi_']) || $this->nmgp_cmp_hidden['gizi_'] == 'on') {
      if (!isset($this->nm_new_label['gizi_'])) {
          $this->nm_new_label['gizi_'] = "Gizi"; } ?>

    <TD class="scFormLabelOddMult css_gizi__label" id="hidden_field_label_gizi_" style="<?php echo $sStyleHidden_gizi_; ?>" > <?php echo $this->nm_new_label['gizi_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['mp_']) && $this->nmgp_cmp_hidden['mp_'] == 'off') { $sStyleHidden_mp_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['mp_']) || $this->nmgp_cmp_hidden['mp_'] == 'on') {
      if (!isset($this->nm_new_label['mp_'])) {
          $this->nm_new_label['mp_'] = "Mp"; } ?>

    <TD class="scFormLabelOddMult css_mp__label" id="hidden_field_label_mp_" style="<?php echo $sStyleHidden_mp_; ?>" > <?php echo $this->nm_new_label['mp_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['lh_']) && $this->nmgp_cmp_hidden['lh_'] == 'off') { $sStyleHidden_lh_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['lh_']) || $this->nmgp_cmp_hidden['lh_'] == 'on') {
      if (!isset($this->nm_new_label['lh_'])) {
          $this->nm_new_label['lh_'] = "Lh"; } ?>

    <TD class="scFormLabelOddMult css_lh__label" id="hidden_field_label_lh_" style="<?php echo $sStyleHidden_lh_; ?>" > <?php echo $this->nm_new_label['lh_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ln_']) && $this->nmgp_cmp_hidden['ln_'] == 'off') { $sStyleHidden_ln_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ln_']) || $this->nmgp_cmp_hidden['ln_'] == 'on') {
      if (!isset($this->nm_new_label['ln_'])) {
          $this->nm_new_label['ln_'] = "Ln"; } ?>

    <TD class="scFormLabelOddMult css_ln__label" id="hidden_field_label_ln_" style="<?php echo $sStyleHidden_ln_; ?>" > <?php echo $this->nm_new_label['ln_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['syr_']) && $this->nmgp_cmp_hidden['syr_'] == 'off') { $sStyleHidden_syr_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['syr_']) || $this->nmgp_cmp_hidden['syr_'] == 'on') {
      if (!isset($this->nm_new_label['syr_'])) {
          $this->nm_new_label['syr_'] = "Syr"; } ?>

    <TD class="scFormLabelOddMult css_syr__label" id="hidden_field_label_syr_" style="<?php echo $sStyleHidden_syr_; ?>" > <?php echo $this->nm_new_label['syr_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ekstra_']) && $this->nmgp_cmp_hidden['ekstra_'] == 'off') { $sStyleHidden_ekstra_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ekstra_']) || $this->nmgp_cmp_hidden['ekstra_'] == 'on') {
      if (!isset($this->nm_new_label['ekstra_'])) {
          $this->nm_new_label['ekstra_'] = "Ekstra"; } ?>

    <TD class="scFormLabelOddMult css_ekstra__label" id="hidden_field_label_ekstra_" style="<?php echo $sStyleHidden_ekstra_; ?>" > <?php echo $this->nm_new_label['ekstra_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['buah_']) && $this->nmgp_cmp_hidden['buah_'] == 'off') { $sStyleHidden_buah_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['buah_']) || $this->nmgp_cmp_hidden['buah_'] == 'on') {
      if (!isset($this->nm_new_label['buah_'])) {
          $this->nm_new_label['buah_'] = "Buah"; } ?>

    <TD class="scFormLabelOddMult css_buah__label" id="hidden_field_label_buah_" style="<?php echo $sStyleHidden_buah_; ?>" > <?php echo $this->nm_new_label['buah_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['jadwal_']) && $this->nmgp_cmp_hidden['jadwal_'] == 'off') { $sStyleHidden_jadwal_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['jadwal_']) || $this->nmgp_cmp_hidden['jadwal_'] == 'on') {
      if (!isset($this->nm_new_label['jadwal_'])) {
          $this->nm_new_label['jadwal_'] = "Jadwal"; } ?>

    <TD class="scFormLabelOddMult css_jadwal__label" id="hidden_field_label_jadwal_" style="<?php echo $sStyleHidden_jadwal_; ?>" > <?php echo $this->nm_new_label['jadwal_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['usia_']) && $this->nmgp_cmp_hidden['usia_'] == 'off') { $sStyleHidden_usia_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['usia_']) || $this->nmgp_cmp_hidden['usia_'] == 'on') {
      if (!isset($this->nm_new_label['usia_'])) {
          $this->nm_new_label['usia_'] = "Usia"; } ?>

    <TD class="scFormLabelOddMult css_usia__label" id="hidden_field_label_usia_" style="<?php echo $sStyleHidden_usia_; ?>" > <?php echo $this->nm_new_label['usia_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_detailpengiriman_gizi);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_detailpengiriman_gizi = $this->form_vert_form_detailpengiriman_gizi;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_detailpengiriman_gizi))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_']))
           {
               $this->nmgp_cmp_readonly['id_'] = 'on';
           }
   foreach ($this->form_vert_form_detailpengiriman_gizi as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->pengiriman_id_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['pengiriman_id_'];
       $this->tgl_lahir_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['tgl_lahir_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['gelar_'] = true;
           $this->nmgp_cmp_readonly['nama_pasien_'] = true;
           $this->nmgp_cmp_readonly['kamar_kelas_'] = true;
           $this->nmgp_cmp_readonly['bed_'] = true;
           $this->nmgp_cmp_readonly['diet_'] = true;
           $this->nmgp_cmp_readonly['gizi_'] = true;
           $this->nmgp_cmp_readonly['mp_'] = true;
           $this->nmgp_cmp_readonly['lh_'] = true;
           $this->nmgp_cmp_readonly['ln_'] = true;
           $this->nmgp_cmp_readonly['syr_'] = true;
           $this->nmgp_cmp_readonly['ekstra_'] = true;
           $this->nmgp_cmp_readonly['buah_'] = true;
           $this->nmgp_cmp_readonly['jadwal_'] = true;
           $this->nmgp_cmp_readonly['usia_'] = true;
           $this->nmgp_cmp_readonly['id_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['gelar_']) || $this->nmgp_cmp_readonly['gelar_'] != "on") {$this->nmgp_cmp_readonly['gelar_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nama_pasien_']) || $this->nmgp_cmp_readonly['nama_pasien_'] != "on") {$this->nmgp_cmp_readonly['nama_pasien_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['kamar_kelas_']) || $this->nmgp_cmp_readonly['kamar_kelas_'] != "on") {$this->nmgp_cmp_readonly['kamar_kelas_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['bed_']) || $this->nmgp_cmp_readonly['bed_'] != "on") {$this->nmgp_cmp_readonly['bed_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['diet_']) || $this->nmgp_cmp_readonly['diet_'] != "on") {$this->nmgp_cmp_readonly['diet_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['gizi_']) || $this->nmgp_cmp_readonly['gizi_'] != "on") {$this->nmgp_cmp_readonly['gizi_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['mp_']) || $this->nmgp_cmp_readonly['mp_'] != "on") {$this->nmgp_cmp_readonly['mp_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['lh_']) || $this->nmgp_cmp_readonly['lh_'] != "on") {$this->nmgp_cmp_readonly['lh_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ln_']) || $this->nmgp_cmp_readonly['ln_'] != "on") {$this->nmgp_cmp_readonly['ln_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['syr_']) || $this->nmgp_cmp_readonly['syr_'] != "on") {$this->nmgp_cmp_readonly['syr_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ekstra_']) || $this->nmgp_cmp_readonly['ekstra_'] != "on") {$this->nmgp_cmp_readonly['ekstra_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['buah_']) || $this->nmgp_cmp_readonly['buah_'] != "on") {$this->nmgp_cmp_readonly['buah_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['jadwal_']) || $this->nmgp_cmp_readonly['jadwal_'] != "on") {$this->nmgp_cmp_readonly['jadwal_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['usia_']) || $this->nmgp_cmp_readonly['usia_'] != "on") {$this->nmgp_cmp_readonly['usia_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_']) || $this->nmgp_cmp_readonly['id_'] != "on") {$this->nmgp_cmp_readonly['id_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->gelar_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['gelar_']; 
       $gelar_ = $this->gelar_; 
       $sStyleHidden_gelar_ = '';
       if (isset($sCheckRead_gelar_))
       {
           unset($sCheckRead_gelar_);
       }
       if (isset($this->nmgp_cmp_readonly['gelar_']))
       {
           $sCheckRead_gelar_ = $this->nmgp_cmp_readonly['gelar_'];
       }
       if (isset($this->nmgp_cmp_hidden['gelar_']) && $this->nmgp_cmp_hidden['gelar_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['gelar_']);
           $sStyleHidden_gelar_ = 'display: none;';
       }
       $bTestReadOnly_gelar_ = true;
       $sStyleReadLab_gelar_ = 'display: none;';
       $sStyleReadInp_gelar_ = '';
       if (isset($this->nmgp_cmp_readonly['gelar_']) && $this->nmgp_cmp_readonly['gelar_'] == 'on')
       {
           $bTestReadOnly_gelar_ = false;
           unset($this->nmgp_cmp_readonly['gelar_']);
           $sStyleReadLab_gelar_ = '';
           $sStyleReadInp_gelar_ = 'display: none;';
       }
       $this->nama_pasien_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['nama_pasien_']; 
       $nama_pasien_ = $this->nama_pasien_; 
       $sStyleHidden_nama_pasien_ = '';
       if (isset($sCheckRead_nama_pasien_))
       {
           unset($sCheckRead_nama_pasien_);
       }
       if (isset($this->nmgp_cmp_readonly['nama_pasien_']))
       {
           $sCheckRead_nama_pasien_ = $this->nmgp_cmp_readonly['nama_pasien_'];
       }
       if (isset($this->nmgp_cmp_hidden['nama_pasien_']) && $this->nmgp_cmp_hidden['nama_pasien_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nama_pasien_']);
           $sStyleHidden_nama_pasien_ = 'display: none;';
       }
       $bTestReadOnly_nama_pasien_ = true;
       $sStyleReadLab_nama_pasien_ = 'display: none;';
       $sStyleReadInp_nama_pasien_ = '';
       if (isset($this->nmgp_cmp_readonly['nama_pasien_']) && $this->nmgp_cmp_readonly['nama_pasien_'] == 'on')
       {
           $bTestReadOnly_nama_pasien_ = false;
           unset($this->nmgp_cmp_readonly['nama_pasien_']);
           $sStyleReadLab_nama_pasien_ = '';
           $sStyleReadInp_nama_pasien_ = 'display: none;';
       }
       $this->kamar_kelas_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['kamar_kelas_']; 
       $kamar_kelas_ = $this->kamar_kelas_; 
       $sStyleHidden_kamar_kelas_ = '';
       if (isset($sCheckRead_kamar_kelas_))
       {
           unset($sCheckRead_kamar_kelas_);
       }
       if (isset($this->nmgp_cmp_readonly['kamar_kelas_']))
       {
           $sCheckRead_kamar_kelas_ = $this->nmgp_cmp_readonly['kamar_kelas_'];
       }
       if (isset($this->nmgp_cmp_hidden['kamar_kelas_']) && $this->nmgp_cmp_hidden['kamar_kelas_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['kamar_kelas_']);
           $sStyleHidden_kamar_kelas_ = 'display: none;';
       }
       $bTestReadOnly_kamar_kelas_ = true;
       $sStyleReadLab_kamar_kelas_ = 'display: none;';
       $sStyleReadInp_kamar_kelas_ = '';
       if (isset($this->nmgp_cmp_readonly['kamar_kelas_']) && $this->nmgp_cmp_readonly['kamar_kelas_'] == 'on')
       {
           $bTestReadOnly_kamar_kelas_ = false;
           unset($this->nmgp_cmp_readonly['kamar_kelas_']);
           $sStyleReadLab_kamar_kelas_ = '';
           $sStyleReadInp_kamar_kelas_ = 'display: none;';
       }
       $this->bed_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['bed_']; 
       $bed_ = $this->bed_; 
       $sStyleHidden_bed_ = '';
       if (isset($sCheckRead_bed_))
       {
           unset($sCheckRead_bed_);
       }
       if (isset($this->nmgp_cmp_readonly['bed_']))
       {
           $sCheckRead_bed_ = $this->nmgp_cmp_readonly['bed_'];
       }
       if (isset($this->nmgp_cmp_hidden['bed_']) && $this->nmgp_cmp_hidden['bed_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['bed_']);
           $sStyleHidden_bed_ = 'display: none;';
       }
       $bTestReadOnly_bed_ = true;
       $sStyleReadLab_bed_ = 'display: none;';
       $sStyleReadInp_bed_ = '';
       if (isset($this->nmgp_cmp_readonly['bed_']) && $this->nmgp_cmp_readonly['bed_'] == 'on')
       {
           $bTestReadOnly_bed_ = false;
           unset($this->nmgp_cmp_readonly['bed_']);
           $sStyleReadLab_bed_ = '';
           $sStyleReadInp_bed_ = 'display: none;';
       }
       $this->diet_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['diet_']; 
       $diet_ = $this->diet_; 
       $sStyleHidden_diet_ = '';
       if (isset($sCheckRead_diet_))
       {
           unset($sCheckRead_diet_);
       }
       if (isset($this->nmgp_cmp_readonly['diet_']))
       {
           $sCheckRead_diet_ = $this->nmgp_cmp_readonly['diet_'];
       }
       if (isset($this->nmgp_cmp_hidden['diet_']) && $this->nmgp_cmp_hidden['diet_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['diet_']);
           $sStyleHidden_diet_ = 'display: none;';
       }
       $bTestReadOnly_diet_ = true;
       $sStyleReadLab_diet_ = 'display: none;';
       $sStyleReadInp_diet_ = '';
       if (isset($this->nmgp_cmp_readonly['diet_']) && $this->nmgp_cmp_readonly['diet_'] == 'on')
       {
           $bTestReadOnly_diet_ = false;
           unset($this->nmgp_cmp_readonly['diet_']);
           $sStyleReadLab_diet_ = '';
           $sStyleReadInp_diet_ = 'display: none;';
       }
       $this->gizi_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['gizi_']; 
       $gizi_ = $this->gizi_; 
       $sStyleHidden_gizi_ = '';
       if (isset($sCheckRead_gizi_))
       {
           unset($sCheckRead_gizi_);
       }
       if (isset($this->nmgp_cmp_readonly['gizi_']))
       {
           $sCheckRead_gizi_ = $this->nmgp_cmp_readonly['gizi_'];
       }
       if (isset($this->nmgp_cmp_hidden['gizi_']) && $this->nmgp_cmp_hidden['gizi_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['gizi_']);
           $sStyleHidden_gizi_ = 'display: none;';
       }
       $bTestReadOnly_gizi_ = true;
       $sStyleReadLab_gizi_ = 'display: none;';
       $sStyleReadInp_gizi_ = '';
       if (isset($this->nmgp_cmp_readonly['gizi_']) && $this->nmgp_cmp_readonly['gizi_'] == 'on')
       {
           $bTestReadOnly_gizi_ = false;
           unset($this->nmgp_cmp_readonly['gizi_']);
           $sStyleReadLab_gizi_ = '';
           $sStyleReadInp_gizi_ = 'display: none;';
       }
       $this->mp_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['mp_']; 
       $mp_ = $this->mp_; 
       $sStyleHidden_mp_ = '';
       if (isset($sCheckRead_mp_))
       {
           unset($sCheckRead_mp_);
       }
       if (isset($this->nmgp_cmp_readonly['mp_']))
       {
           $sCheckRead_mp_ = $this->nmgp_cmp_readonly['mp_'];
       }
       if (isset($this->nmgp_cmp_hidden['mp_']) && $this->nmgp_cmp_hidden['mp_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['mp_']);
           $sStyleHidden_mp_ = 'display: none;';
       }
       $bTestReadOnly_mp_ = true;
       $sStyleReadLab_mp_ = 'display: none;';
       $sStyleReadInp_mp_ = '';
       if (isset($this->nmgp_cmp_readonly['mp_']) && $this->nmgp_cmp_readonly['mp_'] == 'on')
       {
           $bTestReadOnly_mp_ = false;
           unset($this->nmgp_cmp_readonly['mp_']);
           $sStyleReadLab_mp_ = '';
           $sStyleReadInp_mp_ = 'display: none;';
       }
       $this->lh_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['lh_']; 
       $lh_ = $this->lh_; 
       $sStyleHidden_lh_ = '';
       if (isset($sCheckRead_lh_))
       {
           unset($sCheckRead_lh_);
       }
       if (isset($this->nmgp_cmp_readonly['lh_']))
       {
           $sCheckRead_lh_ = $this->nmgp_cmp_readonly['lh_'];
       }
       if (isset($this->nmgp_cmp_hidden['lh_']) && $this->nmgp_cmp_hidden['lh_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['lh_']);
           $sStyleHidden_lh_ = 'display: none;';
       }
       $bTestReadOnly_lh_ = true;
       $sStyleReadLab_lh_ = 'display: none;';
       $sStyleReadInp_lh_ = '';
       if (isset($this->nmgp_cmp_readonly['lh_']) && $this->nmgp_cmp_readonly['lh_'] == 'on')
       {
           $bTestReadOnly_lh_ = false;
           unset($this->nmgp_cmp_readonly['lh_']);
           $sStyleReadLab_lh_ = '';
           $sStyleReadInp_lh_ = 'display: none;';
       }
       $this->ln_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['ln_']; 
       $ln_ = $this->ln_; 
       $sStyleHidden_ln_ = '';
       if (isset($sCheckRead_ln_))
       {
           unset($sCheckRead_ln_);
       }
       if (isset($this->nmgp_cmp_readonly['ln_']))
       {
           $sCheckRead_ln_ = $this->nmgp_cmp_readonly['ln_'];
       }
       if (isset($this->nmgp_cmp_hidden['ln_']) && $this->nmgp_cmp_hidden['ln_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ln_']);
           $sStyleHidden_ln_ = 'display: none;';
       }
       $bTestReadOnly_ln_ = true;
       $sStyleReadLab_ln_ = 'display: none;';
       $sStyleReadInp_ln_ = '';
       if (isset($this->nmgp_cmp_readonly['ln_']) && $this->nmgp_cmp_readonly['ln_'] == 'on')
       {
           $bTestReadOnly_ln_ = false;
           unset($this->nmgp_cmp_readonly['ln_']);
           $sStyleReadLab_ln_ = '';
           $sStyleReadInp_ln_ = 'display: none;';
       }
       $this->syr_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['syr_']; 
       $syr_ = $this->syr_; 
       $sStyleHidden_syr_ = '';
       if (isset($sCheckRead_syr_))
       {
           unset($sCheckRead_syr_);
       }
       if (isset($this->nmgp_cmp_readonly['syr_']))
       {
           $sCheckRead_syr_ = $this->nmgp_cmp_readonly['syr_'];
       }
       if (isset($this->nmgp_cmp_hidden['syr_']) && $this->nmgp_cmp_hidden['syr_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['syr_']);
           $sStyleHidden_syr_ = 'display: none;';
       }
       $bTestReadOnly_syr_ = true;
       $sStyleReadLab_syr_ = 'display: none;';
       $sStyleReadInp_syr_ = '';
       if (isset($this->nmgp_cmp_readonly['syr_']) && $this->nmgp_cmp_readonly['syr_'] == 'on')
       {
           $bTestReadOnly_syr_ = false;
           unset($this->nmgp_cmp_readonly['syr_']);
           $sStyleReadLab_syr_ = '';
           $sStyleReadInp_syr_ = 'display: none;';
       }
       $this->ekstra_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['ekstra_']; 
       $ekstra_ = $this->ekstra_; 
       $sStyleHidden_ekstra_ = '';
       if (isset($sCheckRead_ekstra_))
       {
           unset($sCheckRead_ekstra_);
       }
       if (isset($this->nmgp_cmp_readonly['ekstra_']))
       {
           $sCheckRead_ekstra_ = $this->nmgp_cmp_readonly['ekstra_'];
       }
       if (isset($this->nmgp_cmp_hidden['ekstra_']) && $this->nmgp_cmp_hidden['ekstra_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ekstra_']);
           $sStyleHidden_ekstra_ = 'display: none;';
       }
       $bTestReadOnly_ekstra_ = true;
       $sStyleReadLab_ekstra_ = 'display: none;';
       $sStyleReadInp_ekstra_ = '';
       if (isset($this->nmgp_cmp_readonly['ekstra_']) && $this->nmgp_cmp_readonly['ekstra_'] == 'on')
       {
           $bTestReadOnly_ekstra_ = false;
           unset($this->nmgp_cmp_readonly['ekstra_']);
           $sStyleReadLab_ekstra_ = '';
           $sStyleReadInp_ekstra_ = 'display: none;';
       }
       $this->buah_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['buah_']; 
       $buah_ = $this->buah_; 
       $sStyleHidden_buah_ = '';
       if (isset($sCheckRead_buah_))
       {
           unset($sCheckRead_buah_);
       }
       if (isset($this->nmgp_cmp_readonly['buah_']))
       {
           $sCheckRead_buah_ = $this->nmgp_cmp_readonly['buah_'];
       }
       if (isset($this->nmgp_cmp_hidden['buah_']) && $this->nmgp_cmp_hidden['buah_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['buah_']);
           $sStyleHidden_buah_ = 'display: none;';
       }
       $bTestReadOnly_buah_ = true;
       $sStyleReadLab_buah_ = 'display: none;';
       $sStyleReadInp_buah_ = '';
       if (isset($this->nmgp_cmp_readonly['buah_']) && $this->nmgp_cmp_readonly['buah_'] == 'on')
       {
           $bTestReadOnly_buah_ = false;
           unset($this->nmgp_cmp_readonly['buah_']);
           $sStyleReadLab_buah_ = '';
           $sStyleReadInp_buah_ = 'display: none;';
       }
       $this->jadwal_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['jadwal_']; 
       $jadwal_ = $this->jadwal_; 
       $sStyleHidden_jadwal_ = '';
       if (isset($sCheckRead_jadwal_))
       {
           unset($sCheckRead_jadwal_);
       }
       if (isset($this->nmgp_cmp_readonly['jadwal_']))
       {
           $sCheckRead_jadwal_ = $this->nmgp_cmp_readonly['jadwal_'];
       }
       if (isset($this->nmgp_cmp_hidden['jadwal_']) && $this->nmgp_cmp_hidden['jadwal_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['jadwal_']);
           $sStyleHidden_jadwal_ = 'display: none;';
       }
       $bTestReadOnly_jadwal_ = true;
       $sStyleReadLab_jadwal_ = 'display: none;';
       $sStyleReadInp_jadwal_ = '';
       if (isset($this->nmgp_cmp_readonly['jadwal_']) && $this->nmgp_cmp_readonly['jadwal_'] == 'on')
       {
           $bTestReadOnly_jadwal_ = false;
           unset($this->nmgp_cmp_readonly['jadwal_']);
           $sStyleReadLab_jadwal_ = '';
           $sStyleReadInp_jadwal_ = 'display: none;';
       }
       $this->usia_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['usia_']; 
       $usia_ = $this->usia_; 
       $sStyleHidden_usia_ = '';
       if (isset($sCheckRead_usia_))
       {
           unset($sCheckRead_usia_);
       }
       if (isset($this->nmgp_cmp_readonly['usia_']))
       {
           $sCheckRead_usia_ = $this->nmgp_cmp_readonly['usia_'];
       }
       if (isset($this->nmgp_cmp_hidden['usia_']) && $this->nmgp_cmp_hidden['usia_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['usia_']);
           $sStyleHidden_usia_ = 'display: none;';
       }
       $bTestReadOnly_usia_ = true;
       $sStyleReadLab_usia_ = 'display: none;';
       $sStyleReadInp_usia_ = '';
       if (isset($this->nmgp_cmp_readonly['usia_']) && $this->nmgp_cmp_readonly['usia_'] == 'on')
       {
           $bTestReadOnly_usia_ = false;
           unset($this->nmgp_cmp_readonly['usia_']);
           $sStyleReadLab_usia_ = '';
           $sStyleReadInp_usia_ = 'display: none;';
       }
       $this->id_ = $this->form_vert_form_detailpengiriman_gizi[$sc_seq_vert]['id_']; 
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_detailpengiriman_gizi_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_detailpengiriman_gizi_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detailpengiriman_gizi_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_detailpengiriman_gizi_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detailpengiriman_gizi_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_detailpengiriman_gizi_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['gelar_']) && $this->nmgp_cmp_hidden['gelar_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="gelar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->gelar_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_gelar__line" id="hidden_field_data_gelar_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_gelar_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_gelar__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_gelar_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["gelar_"]) &&  $this->nmgp_cmp_readonly["gelar_"] == "on") { 

$gelar__look = "";
 if ($this->gelar_ == "AN.") { $gelar__look .= "AN." ;} 
 if ($this->gelar_ == "TN.") { $gelar__look .= "TN." ;} 
 if ($this->gelar_ == "NY.") { $gelar__look .= "NY." ;} 
 if (empty($gelar__look)) { $gelar__look = $this->gelar_; }
?>
<input type="hidden" name="gelar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($gelar_) . "\">" . $gelar__look . ""; ?>
<?php } else { ?>
<?php

$gelar__look = "";
 if ($this->gelar_ == "AN.") { $gelar__look .= "AN." ;} 
 if ($this->gelar_ == "TN.") { $gelar__look .= "TN." ;} 
 if ($this->gelar_ == "NY.") { $gelar__look .= "NY." ;} 
 if (empty($gelar__look)) { $gelar__look = $this->gelar_; }
?>
<span id="id_read_on_gelar_<?php echo $sc_seq_vert ; ?>" class="css_gelar__line"  style="<?php echo $sStyleReadLab_gelar_; ?>"><?php echo $this->form_encode_input($gelar__look); ?></span><span id="id_read_off_gelar_<?php echo $sc_seq_vert ; ?>" class="css_read_off_gelar_" style="white-space: nowrap; <?php echo $sStyleReadInp_gelar_; ?>">
 <span id="idAjaxSelect_gelar_<?php echo $sc_seq_vert ?>"><select class="sc-js-input scFormObjectOddMult css_gelar__obj" style="" id="id_sc_field_gelar_<?php echo $sc_seq_vert ?>" name="gelar_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="AN." <?php  if ($this->gelar_ == "AN.") { echo " selected" ;} ?>>AN.</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gelar_'][] = 'AN.'; ?>
 <option  value="TN." <?php  if ($this->gelar_ == "TN.") { echo " selected" ;} ?>>TN.</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gelar_'][] = 'TN.'; ?>
 <option  value="NY." <?php  if ($this->gelar_ == "NY.") { echo " selected" ;} ?>>NY.</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gelar_'][] = 'NY.'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_gelar_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_gelar_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nama_pasien_']) && $this->nmgp_cmp_hidden['nama_pasien_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nama_pasien_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nama_pasien_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_nama_pasien__line" id="hidden_field_data_nama_pasien_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nama_pasien_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nama_pasien__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_nama_pasien_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nama_pasien_"]) &&  $this->nmgp_cmp_readonly["nama_pasien_"] == "on") { 

 ?>
<input type="hidden" name="nama_pasien_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nama_pasien_) . "\">" . $nama_pasien_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_nama_pasien_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-nama_pasien_<?php echo $sc_seq_vert ?> css_nama_pasien__line" style="<?php echo $sStyleReadLab_nama_pasien_; ?>"><?php echo $this->nama_pasien_; ?></span><span id="id_read_off_nama_pasien_<?php echo $sc_seq_vert ?>" class="css_read_off_nama_pasien_" style="white-space: nowrap;<?php echo $sStyleReadInp_nama_pasien_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_nama_pasien__obj" style="" id="id_sc_field_nama_pasien_<?php echo $sc_seq_vert ?>" type=text name="nama_pasien_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nama_pasien_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nama_pasien_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nama_pasien_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['kamar_kelas_']) && $this->nmgp_cmp_hidden['kamar_kelas_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kamar_kelas_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($kamar_kelas_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_kamar_kelas__line" id="hidden_field_data_kamar_kelas_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_kamar_kelas_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_kamar_kelas__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_kamar_kelas_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kamar_kelas_"]) &&  $this->nmgp_cmp_readonly["kamar_kelas_"] == "on") { 

 ?>
<input type="hidden" name="kamar_kelas_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($kamar_kelas_) . "\">" . $kamar_kelas_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_kamar_kelas_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-kamar_kelas_<?php echo $sc_seq_vert ?> css_kamar_kelas__line" style="<?php echo $sStyleReadLab_kamar_kelas_; ?>"><?php echo $this->kamar_kelas_; ?></span><span id="id_read_off_kamar_kelas_<?php echo $sc_seq_vert ?>" class="css_read_off_kamar_kelas_" style="white-space: nowrap;<?php echo $sStyleReadInp_kamar_kelas_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_kamar_kelas__obj" style="" id="id_sc_field_kamar_kelas_<?php echo $sc_seq_vert ?>" type=text name="kamar_kelas_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($kamar_kelas_) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kamar_kelas_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kamar_kelas_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['bed_']) && $this->nmgp_cmp_hidden['bed_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bed_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bed_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_bed__line" id="hidden_field_data_bed_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_bed_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_bed__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_bed_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bed_"]) &&  $this->nmgp_cmp_readonly["bed_"] == "on") { 

 ?>
<input type="hidden" name="bed_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bed_) . "\">" . $bed_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_bed_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-bed_<?php echo $sc_seq_vert ?> css_bed__line" style="<?php echo $sStyleReadLab_bed_; ?>"><?php echo $this->bed_; ?></span><span id="id_read_off_bed_<?php echo $sc_seq_vert ?>" class="css_read_off_bed_" style="white-space: nowrap;<?php echo $sStyleReadInp_bed_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_bed__obj" style="" id="id_sc_field_bed_<?php echo $sc_seq_vert ?>" type=text name="bed_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bed_) ?>"
 size=3 maxlength=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bed_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bed_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['diet_']) && $this->nmgp_cmp_hidden['diet_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diet_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($diet_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_diet__line" id="hidden_field_data_diet_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_diet_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_diet__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_diet_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diet_"]) &&  $this->nmgp_cmp_readonly["diet_"] == "on") { 

 ?>
<input type="hidden" name="diet_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($diet_) . "\">" . $diet_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_diet_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-diet_<?php echo $sc_seq_vert ?> css_diet__line" style="<?php echo $sStyleReadLab_diet_; ?>"><?php echo $this->diet_; ?></span><span id="id_read_off_diet_<?php echo $sc_seq_vert ?>" class="css_read_off_diet_" style="white-space: nowrap;<?php echo $sStyleReadInp_diet_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_diet__obj" style="" id="id_sc_field_diet_<?php echo $sc_seq_vert ?>" type=text name="diet_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($diet_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diet_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diet_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['gizi_']) && $this->nmgp_cmp_hidden['gizi_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="gizi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->gizi_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_gizi__line" id="hidden_field_data_gizi_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_gizi_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_gizi__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_gizi_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["gizi_"]) &&  $this->nmgp_cmp_readonly["gizi_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gizi_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gizi_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gizi_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gizi_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gizi_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gizi_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gizi_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gizi_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT gizi FROM set_gizi where jadwal = '$this->jadwal_' ORDER BY gizi";

   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gizi_'][] = $rs->fields[0];
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
   $gizi__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->gizi__1))
          {
              foreach ($this->gizi__1 as $tmp_gizi_)
              {
                  if (trim($tmp_gizi_) === trim($cadaselect[1])) { $gizi__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->gizi_) === trim($cadaselect[1])) { $gizi__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="gizi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($gizi_) . "\">" . $gizi__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_gizi_();
   $x = 0 ; 
   $gizi__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->gizi__1))
          {
              foreach ($this->gizi__1 as $tmp_gizi_)
              {
                  if (trim($tmp_gizi_) === trim($cadaselect[1])) { $gizi__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->gizi_) === trim($cadaselect[1])) { $gizi__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($gizi__look))
          {
              $gizi__look = $this->gizi_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_gizi_" . $sc_seq_vert . "\" class=\"css_gizi__line\" style=\"" .  $sStyleReadLab_gizi_ . "\">" . $this->form_encode_input($gizi__look) . "</span><span id=\"id_read_off_gizi_" . $sc_seq_vert . "\" class=\"css_read_off_gizi_\" style=\"white-space: nowrap; " . $sStyleReadInp_gizi_ . "\">";
   echo " <span id=\"idAjaxSelect_gizi_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_gizi__obj\" style=\"\" id=\"id_sc_field_gizi_" . $sc_seq_vert . "\" name=\"gizi_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_gizi_'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->gizi_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->gizi_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_gizi_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_gizi_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['mp_']) && $this->nmgp_cmp_hidden['mp_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="mp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->mp_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_mp__line" id="hidden_field_data_mp_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_mp_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_mp__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_mp_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mp_"]) &&  $this->nmgp_cmp_readonly["mp_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_mp_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_mp_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_mp_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_mp_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_mp_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_mp_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_mp_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_mp_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT mp, mp FROM set_gizi where gizi = '$this->gizi_' and jadwal = '$this->jadwal_' ORDER BY mp";

   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_mp_'][] = $rs->fields[0];
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
   $mp__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->mp__1))
          {
              foreach ($this->mp__1 as $tmp_mp_)
              {
                  if (trim($tmp_mp_) === trim($cadaselect[1])) { $mp__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->mp_) === trim($cadaselect[1])) { $mp__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="mp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($mp_) . "\">" . $mp__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_mp_();
   $x = 0 ; 
   $mp__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->mp__1))
          {
              foreach ($this->mp__1 as $tmp_mp_)
              {
                  if (trim($tmp_mp_) === trim($cadaselect[1])) { $mp__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->mp_) === trim($cadaselect[1])) { $mp__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($mp__look))
          {
              $mp__look = $this->mp_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_mp_" . $sc_seq_vert . "\" class=\"css_mp__line\" style=\"" .  $sStyleReadLab_mp_ . "\">" . $this->form_encode_input($mp__look) . "</span><span id=\"id_read_off_mp_" . $sc_seq_vert . "\" class=\"css_read_off_mp_\" style=\"white-space: nowrap; " . $sStyleReadInp_mp_ . "\">";
   echo " <span id=\"idAjaxSelect_mp_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_mp__obj\" style=\"\" id=\"id_sc_field_mp_" . $sc_seq_vert . "\" name=\"mp_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->mp_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->mp_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mp_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mp_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['lh_']) && $this->nmgp_cmp_hidden['lh_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="lh_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->lh_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_lh__line" id="hidden_field_data_lh_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_lh_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_lh__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_lh_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lh_"]) &&  $this->nmgp_cmp_readonly["lh_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_lh_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_lh_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_lh_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_lh_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_lh_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_lh_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_lh_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_lh_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT lh, lh FROM set_gizi where gizi = '$this->gizi_' and jadwal = '$this->jadwal_' ORDER BY lh";

   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_lh_'][] = $rs->fields[0];
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
   $lh__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->lh__1))
          {
              foreach ($this->lh__1 as $tmp_lh_)
              {
                  if (trim($tmp_lh_) === trim($cadaselect[1])) { $lh__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->lh_) === trim($cadaselect[1])) { $lh__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="lh_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lh_) . "\">" . $lh__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_lh_();
   $x = 0 ; 
   $lh__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->lh__1))
          {
              foreach ($this->lh__1 as $tmp_lh_)
              {
                  if (trim($tmp_lh_) === trim($cadaselect[1])) { $lh__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->lh_) === trim($cadaselect[1])) { $lh__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($lh__look))
          {
              $lh__look = $this->lh_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_lh_" . $sc_seq_vert . "\" class=\"css_lh__line\" style=\"" .  $sStyleReadLab_lh_ . "\">" . $this->form_encode_input($lh__look) . "</span><span id=\"id_read_off_lh_" . $sc_seq_vert . "\" class=\"css_read_off_lh_\" style=\"white-space: nowrap; " . $sStyleReadInp_lh_ . "\">";
   echo " <span id=\"idAjaxSelect_lh_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_lh__obj\" style=\"\" id=\"id_sc_field_lh_" . $sc_seq_vert . "\" name=\"lh_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->lh_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->lh_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lh_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lh_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ln_']) && $this->nmgp_cmp_hidden['ln_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ln_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->ln_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ln__line" id="hidden_field_data_ln_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ln_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ln__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ln_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ln_"]) &&  $this->nmgp_cmp_readonly["ln_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ln_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ln_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ln_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ln_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ln_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ln_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ln_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ln_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT ln, ln FROM set_gizi  where gizi = '$this->gizi_' and jadwal = '$this->jadwal_' ORDER BY ln";

   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ln_'][] = $rs->fields[0];
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
   $ln__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ln__1))
          {
              foreach ($this->ln__1 as $tmp_ln_)
              {
                  if (trim($tmp_ln_) === trim($cadaselect[1])) { $ln__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ln_) === trim($cadaselect[1])) { $ln__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="ln_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ln_) . "\">" . $ln__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_ln_();
   $x = 0 ; 
   $ln__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ln__1))
          {
              foreach ($this->ln__1 as $tmp_ln_)
              {
                  if (trim($tmp_ln_) === trim($cadaselect[1])) { $ln__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ln_) === trim($cadaselect[1])) { $ln__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($ln__look))
          {
              $ln__look = $this->ln_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_ln_" . $sc_seq_vert . "\" class=\"css_ln__line\" style=\"" .  $sStyleReadLab_ln_ . "\">" . $this->form_encode_input($ln__look) . "</span><span id=\"id_read_off_ln_" . $sc_seq_vert . "\" class=\"css_read_off_ln_\" style=\"white-space: nowrap; " . $sStyleReadInp_ln_ . "\">";
   echo " <span id=\"idAjaxSelect_ln_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_ln__obj\" style=\"\" id=\"id_sc_field_ln_" . $sc_seq_vert . "\" name=\"ln_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->ln_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->ln_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ln_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ln_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['syr_']) && $this->nmgp_cmp_hidden['syr_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="syr_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->syr_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_syr__line" id="hidden_field_data_syr_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_syr_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_syr__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_syr_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["syr_"]) &&  $this->nmgp_cmp_readonly["syr_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_syr_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_syr_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_syr_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_syr_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_syr_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_syr_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_syr_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_syr_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT syr, syr FROM set_gizi where gizi = '$this->gizi_' and jadwal = '$this->jadwal_' ORDER BY syr";

   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_syr_'][] = $rs->fields[0];
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
   $syr__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->syr__1))
          {
              foreach ($this->syr__1 as $tmp_syr_)
              {
                  if (trim($tmp_syr_) === trim($cadaselect[1])) { $syr__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->syr_) === trim($cadaselect[1])) { $syr__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="syr_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($syr_) . "\">" . $syr__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_syr_();
   $x = 0 ; 
   $syr__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->syr__1))
          {
              foreach ($this->syr__1 as $tmp_syr_)
              {
                  if (trim($tmp_syr_) === trim($cadaselect[1])) { $syr__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->syr_) === trim($cadaselect[1])) { $syr__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($syr__look))
          {
              $syr__look = $this->syr_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_syr_" . $sc_seq_vert . "\" class=\"css_syr__line\" style=\"" .  $sStyleReadLab_syr_ . "\">" . $this->form_encode_input($syr__look) . "</span><span id=\"id_read_off_syr_" . $sc_seq_vert . "\" class=\"css_read_off_syr_\" style=\"white-space: nowrap; " . $sStyleReadInp_syr_ . "\">";
   echo " <span id=\"idAjaxSelect_syr_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_syr__obj\" style=\"\" id=\"id_sc_field_syr_" . $sc_seq_vert . "\" name=\"syr_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->syr_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->syr_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_syr_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_syr_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ekstra_']) && $this->nmgp_cmp_hidden['ekstra_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ekstra_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->ekstra_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ekstra__line" id="hidden_field_data_ekstra_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ekstra_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ekstra__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ekstra_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ekstra_"]) &&  $this->nmgp_cmp_readonly["ekstra_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ekstra_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ekstra_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ekstra_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ekstra_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ekstra_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ekstra_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ekstra_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ekstra_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT ekstra, ekstra FROM set_gizi where gizi = '$this->gizi_' and jadwal = '$this->jadwal_' ORDER BY ekstra";

   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_ekstra_'][] = $rs->fields[0];
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
   $ekstra__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ekstra__1))
          {
              foreach ($this->ekstra__1 as $tmp_ekstra_)
              {
                  if (trim($tmp_ekstra_) === trim($cadaselect[1])) { $ekstra__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ekstra_) === trim($cadaselect[1])) { $ekstra__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="ekstra_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ekstra_) . "\">" . $ekstra__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_ekstra_();
   $x = 0 ; 
   $ekstra__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ekstra__1))
          {
              foreach ($this->ekstra__1 as $tmp_ekstra_)
              {
                  if (trim($tmp_ekstra_) === trim($cadaselect[1])) { $ekstra__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ekstra_) === trim($cadaselect[1])) { $ekstra__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($ekstra__look))
          {
              $ekstra__look = $this->ekstra_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_ekstra_" . $sc_seq_vert . "\" class=\"css_ekstra__line\" style=\"" .  $sStyleReadLab_ekstra_ . "\">" . $this->form_encode_input($ekstra__look) . "</span><span id=\"id_read_off_ekstra_" . $sc_seq_vert . "\" class=\"css_read_off_ekstra_\" style=\"white-space: nowrap; " . $sStyleReadInp_ekstra_ . "\">";
   echo " <span id=\"idAjaxSelect_ekstra_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_ekstra__obj\" style=\"\" id=\"id_sc_field_ekstra_" . $sc_seq_vert . "\" name=\"ekstra_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->ekstra_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->ekstra_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ekstra_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ekstra_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['buah_']) && $this->nmgp_cmp_hidden['buah_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="buah_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->buah_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_buah__line" id="hidden_field_data_buah_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_buah_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_buah__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_buah_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["buah_"]) &&  $this->nmgp_cmp_readonly["buah_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_buah_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_buah_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_buah_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_buah_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_buah_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_buah_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_buah_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_buah_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT buah, buah FROM set_gizi  where gizi = '$this->gizi_' and jadwal = '$this->jadwal_' ORDER BY buah";

   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['Lookup_buah_'][] = $rs->fields[0];
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
   $buah__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->buah__1))
          {
              foreach ($this->buah__1 as $tmp_buah_)
              {
                  if (trim($tmp_buah_) === trim($cadaselect[1])) { $buah__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->buah_) === trim($cadaselect[1])) { $buah__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="buah_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($buah_) . "\">" . $buah__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_buah_();
   $x = 0 ; 
   $buah__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->buah__1))
          {
              foreach ($this->buah__1 as $tmp_buah_)
              {
                  if (trim($tmp_buah_) === trim($cadaselect[1])) { $buah__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->buah_) === trim($cadaselect[1])) { $buah__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($buah__look))
          {
              $buah__look = $this->buah_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_buah_" . $sc_seq_vert . "\" class=\"css_buah__line\" style=\"" .  $sStyleReadLab_buah_ . "\">" . $this->form_encode_input($buah__look) . "</span><span id=\"id_read_off_buah_" . $sc_seq_vert . "\" class=\"css_read_off_buah_\" style=\"white-space: nowrap; " . $sStyleReadInp_buah_ . "\">";
   echo " <span id=\"idAjaxSelect_buah_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_buah__obj\" style=\"\" id=\"id_sc_field_buah_" . $sc_seq_vert . "\" name=\"buah_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->buah_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->buah_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_buah_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_buah_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['jadwal_']) && $this->nmgp_cmp_hidden['jadwal_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jadwal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($jadwal_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_jadwal__line" id="hidden_field_data_jadwal_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_jadwal_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_jadwal__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_jadwal_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jadwal_"]) &&  $this->nmgp_cmp_readonly["jadwal_"] == "on") { 

 ?>
<input type="hidden" name="jadwal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($jadwal_) . "\">" . $jadwal_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_jadwal_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-jadwal_<?php echo $sc_seq_vert ?> css_jadwal__line" style="<?php echo $sStyleReadLab_jadwal_; ?>"><?php echo $this->jadwal_; ?></span><span id="id_read_off_jadwal_<?php echo $sc_seq_vert ?>" class="css_read_off_jadwal_" style="white-space: nowrap;<?php echo $sStyleReadInp_jadwal_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_jadwal__obj" style="" id="id_sc_field_jadwal_<?php echo $sc_seq_vert ?>" type=text name="jadwal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($jadwal_) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jadwal_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jadwal_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['usia_']) && $this->nmgp_cmp_hidden['usia_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usia_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_usia__line" id="hidden_field_data_usia_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_usia_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_usia__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_usia_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usia_"]) &&  $this->nmgp_cmp_readonly["usia_"] == "on") { 

 ?>
<input type="hidden" name="usia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usia_) . "\">" . $usia_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_usia_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-usia_<?php echo $sc_seq_vert ?> css_usia__line" style="<?php echo $sStyleReadLab_usia_; ?>"><?php echo $this->usia_; ?></span><span id="id_read_off_usia_<?php echo $sc_seq_vert ?>" class="css_read_off_usia_" style="white-space: nowrap;<?php echo $sStyleReadInp_usia_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_usia__obj" style="" id="id_sc_field_usia_<?php echo $sc_seq_vert ?>" type=text name="usia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usia_) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usia_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usia_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
        if (isset($sCheckRead_gelar_))
       {
           $this->nmgp_cmp_readonly['gelar_'] = $sCheckRead_gelar_;
       }
       if ('display: none;' == $sStyleHidden_gelar_)
       {
           $this->nmgp_cmp_hidden['gelar_'] = 'off';
       }
       if (isset($sCheckRead_nama_pasien_))
       {
           $this->nmgp_cmp_readonly['nama_pasien_'] = $sCheckRead_nama_pasien_;
       }
       if ('display: none;' == $sStyleHidden_nama_pasien_)
       {
           $this->nmgp_cmp_hidden['nama_pasien_'] = 'off';
       }
       if (isset($sCheckRead_kamar_kelas_))
       {
           $this->nmgp_cmp_readonly['kamar_kelas_'] = $sCheckRead_kamar_kelas_;
       }
       if ('display: none;' == $sStyleHidden_kamar_kelas_)
       {
           $this->nmgp_cmp_hidden['kamar_kelas_'] = 'off';
       }
       if (isset($sCheckRead_bed_))
       {
           $this->nmgp_cmp_readonly['bed_'] = $sCheckRead_bed_;
       }
       if ('display: none;' == $sStyleHidden_bed_)
       {
           $this->nmgp_cmp_hidden['bed_'] = 'off';
       }
       if (isset($sCheckRead_diet_))
       {
           $this->nmgp_cmp_readonly['diet_'] = $sCheckRead_diet_;
       }
       if ('display: none;' == $sStyleHidden_diet_)
       {
           $this->nmgp_cmp_hidden['diet_'] = 'off';
       }
       if (isset($sCheckRead_gizi_))
       {
           $this->nmgp_cmp_readonly['gizi_'] = $sCheckRead_gizi_;
       }
       if ('display: none;' == $sStyleHidden_gizi_)
       {
           $this->nmgp_cmp_hidden['gizi_'] = 'off';
       }
       if (isset($sCheckRead_mp_))
       {
           $this->nmgp_cmp_readonly['mp_'] = $sCheckRead_mp_;
       }
       if ('display: none;' == $sStyleHidden_mp_)
       {
           $this->nmgp_cmp_hidden['mp_'] = 'off';
       }
       if (isset($sCheckRead_lh_))
       {
           $this->nmgp_cmp_readonly['lh_'] = $sCheckRead_lh_;
       }
       if ('display: none;' == $sStyleHidden_lh_)
       {
           $this->nmgp_cmp_hidden['lh_'] = 'off';
       }
       if (isset($sCheckRead_ln_))
       {
           $this->nmgp_cmp_readonly['ln_'] = $sCheckRead_ln_;
       }
       if ('display: none;' == $sStyleHidden_ln_)
       {
           $this->nmgp_cmp_hidden['ln_'] = 'off';
       }
       if (isset($sCheckRead_syr_))
       {
           $this->nmgp_cmp_readonly['syr_'] = $sCheckRead_syr_;
       }
       if ('display: none;' == $sStyleHidden_syr_)
       {
           $this->nmgp_cmp_hidden['syr_'] = 'off';
       }
       if (isset($sCheckRead_ekstra_))
       {
           $this->nmgp_cmp_readonly['ekstra_'] = $sCheckRead_ekstra_;
       }
       if ('display: none;' == $sStyleHidden_ekstra_)
       {
           $this->nmgp_cmp_hidden['ekstra_'] = 'off';
       }
       if (isset($sCheckRead_buah_))
       {
           $this->nmgp_cmp_readonly['buah_'] = $sCheckRead_buah_;
       }
       if ('display: none;' == $sStyleHidden_buah_)
       {
           $this->nmgp_cmp_hidden['buah_'] = 'off';
       }
       if (isset($sCheckRead_jadwal_))
       {
           $this->nmgp_cmp_readonly['jadwal_'] = $sCheckRead_jadwal_;
       }
       if ('display: none;' == $sStyleHidden_jadwal_)
       {
           $this->nmgp_cmp_hidden['jadwal_'] = 'off';
       }
       if (isset($sCheckRead_usia_))
       {
           $this->nmgp_cmp_readonly['usia_'] = $sCheckRead_usia_;
       }
       if ('display: none;' == $sStyleHidden_usia_)
       {
           $this->nmgp_cmp_hidden['usia_'] = 'off';
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
       $this->form_vert_form_detailpengiriman_gizi = $guarda_form_vert_form_detailpengiriman_gizi;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_detailpengiriman_gizi");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_detailpengiriman_gizi");
 parent.scAjaxDetailHeight("form_detailpengiriman_gizi", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_detailpengiriman_gizi", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_detailpengiriman_gizi", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['sc_modal'])
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
			do_ajax_form_detailpengiriman_gizi_add_new_line(); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detailpengiriman_gizi']['buttonStatus'] = $this->nmgp_botoes;
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
