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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " Cek Lab"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " Cek Lab"); } ?></TITLE>
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
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tblab/form_tblab_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tblab_mob_sajax_js.php");
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
     if (F_name == "labcode")
     {
        $('input[name="labcode"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="labcode"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="labcode"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "lastupdated")
     {
        $('input[name="lastupdated"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="lastupdated"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="lastupdated"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_tblab_mob_jquery.php');

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
      scAjaxDetailHeight("form_tblabrate", $($("#nmsc_iframe_liga_form_tblabrate")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tblabrate")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tblabrate")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_tblabdetail", $($("#nmsc_iframe_liga_form_tblabdetail")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tblabdetail")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tblabdetail")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_4" == block_id) {
      scAjaxDetailHeight("form_tblabrujukananak", "500");
      if (typeof $("#nmsc_iframe_liga_form_tblabrujukananak")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tblabrujukananak")[0].contentWindow.scQuickSearchInit(false, '');
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_tblab']['error_buffer']) && '' != $_SESSION['scriptcase']['form_tblab']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_tblab']['error_buffer'];
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
 include_once("form_tblab_mob_js0.php");
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
               action="form_tblab_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_tblab_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tblab_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['fast_search'][2] : "";
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-22", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-23", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-24", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-25", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['empty_filter'] = true;
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
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['labcode']))
    {
        $this->nm_new_label['labcode'] = "Kode Lab";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $labcode = $this->labcode;
   $sStyleHidden_labcode = '';
   if (isset($this->nmgp_cmp_hidden['labcode']) && $this->nmgp_cmp_hidden['labcode'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['labcode']);
       $sStyleHidden_labcode = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_labcode = 'display: none;';
   $sStyleReadInp_labcode = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['labcode']) && $this->nmgp_cmp_readonly['labcode'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['labcode']);
       $sStyleReadLab_labcode = '';
       $sStyleReadInp_labcode = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['labcode']) && $this->nmgp_cmp_hidden['labcode'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="labcode" value="<?php echo $this->form_encode_input($labcode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_labcode_line" id="hidden_field_data_labcode" style="<?php echo $sStyleHidden_labcode; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_labcode_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_labcode_label"><span id="id_label_labcode"><?php echo $this->nm_new_label['labcode']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["labcode"]) &&  $this->nmgp_cmp_readonly["labcode"] == "on") { 

 ?>
<input type="hidden" name="labcode" value="<?php echo $this->form_encode_input($labcode) . "\">" . $labcode . ""; ?>
<?php } else { ?>
<span id="id_read_on_labcode" class="sc-ui-readonly-labcode css_labcode_line" style="<?php echo $sStyleReadLab_labcode; ?>"><?php echo $this->labcode; ?></span><span id="id_read_off_labcode" class="css_read_off_labcode" style="white-space: nowrap;<?php echo $sStyleReadInp_labcode; ?>">
 <input class="sc-js-input scFormObjectOdd css_labcode_obj" style="" id="id_sc_field_labcode" type=text name="labcode" value="<?php echo $this->form_encode_input($labcode) ?>"
 size=7 maxlength=7 alt="{datatype: 'text', maxLength: 7, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(auto)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_labcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_labcode_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['kategori']))
   {
       $this->nm_new_label['kategori'] = "Kategori";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kategori = $this->kategori;
   $sStyleHidden_kategori = '';
   if (isset($this->nmgp_cmp_hidden['kategori']) && $this->nmgp_cmp_hidden['kategori'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kategori']);
       $sStyleHidden_kategori = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kategori = 'display: none;';
   $sStyleReadInp_kategori = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kategori']) && $this->nmgp_cmp_readonly['kategori'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kategori']);
       $sStyleReadLab_kategori = '';
       $sStyleReadInp_kategori = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kategori']) && $this->nmgp_cmp_hidden['kategori'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="kategori" value="<?php echo $this->form_encode_input($this->kategori) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_kategori_line" id="hidden_field_data_kategori" style="<?php echo $sStyleHidden_kategori; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kategori_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_kategori_label"><span id="id_label_kategori"><?php echo $this->nm_new_label['kategori']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kategori"]) &&  $this->nmgp_cmp_readonly["kategori"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_kategori']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_kategori'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_kategori']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_kategori'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_kategori']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_kategori'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_kategori']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_kategori'] = array(); 
    }

   $old_value_lastupdated = $this->lastupdated;
   $old_value_lastupdated_hora = $this->lastupdated_hora;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_lastupdated = $this->lastupdated;
   $unformatted_value_lastupdated_hora = $this->lastupdated_hora;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT kategori, kategori  FROM tblabcategory  ORDER BY kategori";

   $this->lastupdated = $old_value_lastupdated;
   $this->lastupdated_hora = $old_value_lastupdated_hora;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_kategori'][] = $rs->fields[0];
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
   $kategori_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->kategori_1))
          {
              foreach ($this->kategori_1 as $tmp_kategori)
              {
                  if (trim($tmp_kategori) === trim($cadaselect[1])) { $kategori_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->kategori) === trim($cadaselect[1])) { $kategori_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="kategori" value="<?php echo $this->form_encode_input($kategori) . "\">" . $kategori_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_kategori();
   $x = 0 ; 
   $kategori_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->kategori_1))
          {
              foreach ($this->kategori_1 as $tmp_kategori)
              {
                  if (trim($tmp_kategori) === trim($cadaselect[1])) { $kategori_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->kategori) === trim($cadaselect[1])) { $kategori_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($kategori_look))
          {
              $kategori_look = $this->kategori;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_kategori\" class=\"css_kategori_line\" style=\"" .  $sStyleReadLab_kategori . "\">" . $this->form_encode_input($kategori_look) . "</span><span id=\"id_read_off_kategori\" class=\"css_read_off_kategori\" style=\"white-space: nowrap; " . $sStyleReadInp_kategori . "\">";
   echo " <span id=\"idAjaxSelect_kategori\"><select class=\"sc-js-input scFormObjectOdd css_kategori_obj\" style=\"\" id=\"id_sc_field_kategori\" name=\"kategori\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->kategori) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->kategori)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kategori_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kategori_text"></span></td></tr></table></td></tr></table> </TD>
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
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['nama']) && $this->nmgp_cmp_hidden['nama'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nama" value="<?php echo $this->form_encode_input($nama) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nama_line" id="hidden_field_data_nama" style="<?php echo $sStyleHidden_nama; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nama_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nama_label"><span id="id_label_nama"><?php echo $this->nm_new_label['nama']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nama"]) &&  $this->nmgp_cmp_readonly["nama"] == "on") { 

 ?>
<input type="hidden" name="nama" value="<?php echo $this->form_encode_input($nama) . "\">" . $nama . ""; ?>
<?php } else { ?>
<span id="id_read_on_nama" class="sc-ui-readonly-nama css_nama_line" style="<?php echo $sStyleReadLab_nama; ?>"><?php echo $this->nama; ?></span><span id="id_read_off_nama" class="css_read_off_nama" style="white-space: nowrap;<?php echo $sStyleReadInp_nama; ?>">
 <input class="sc-js-input scFormObjectOdd css_nama_obj" style="" id="id_sc_field_nama" type=text name="nama" value="<?php echo $this->form_encode_input($nama) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nama_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nama_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipehasil']))
   {
       $this->nm_new_label['tipehasil'] = "Tipehasil";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipehasil = $this->tipehasil;
   $sStyleHidden_tipehasil = '';
   if (isset($this->nmgp_cmp_hidden['tipehasil']) && $this->nmgp_cmp_hidden['tipehasil'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipehasil']);
       $sStyleHidden_tipehasil = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipehasil = 'display: none;';
   $sStyleReadInp_tipehasil = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipehasil']) && $this->nmgp_cmp_readonly['tipehasil'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipehasil']);
       $sStyleReadLab_tipehasil = '';
       $sStyleReadInp_tipehasil = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipehasil']) && $this->nmgp_cmp_hidden['tipehasil'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipehasil" value="<?php echo $this->form_encode_input($this->tipehasil) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipehasil_line" id="hidden_field_data_tipehasil" style="<?php echo $sStyleHidden_tipehasil; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipehasil_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipehasil_label"><span id="id_label_tipehasil"><?php echo $this->nm_new_label['tipehasil']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipehasil"]) &&  $this->nmgp_cmp_readonly["tipehasil"] == "on") { 

$tipehasil_look = "";
 if ($this->tipehasil == "0") { $tipehasil_look .= "Range" ;} 
 if ($this->tipehasil == "1") { $tipehasil_look .= "Pilihan" ;} 
 if ($this->tipehasil == "2") { $tipehasil_look .= "Uraian" ;} 
 if ($this->tipehasil == "3") { $tipehasil_look .= "Sub-Pemeriksaan" ;} 
 if (empty($tipehasil_look)) { $tipehasil_look = $this->tipehasil; }
?>
<input type="hidden" name="tipehasil" value="<?php echo $this->form_encode_input($tipehasil) . "\">" . $tipehasil_look . ""; ?>
<?php } else { ?>
<?php

$tipehasil_look = "";
 if ($this->tipehasil == "0") { $tipehasil_look .= "Range" ;} 
 if ($this->tipehasil == "1") { $tipehasil_look .= "Pilihan" ;} 
 if ($this->tipehasil == "2") { $tipehasil_look .= "Uraian" ;} 
 if ($this->tipehasil == "3") { $tipehasil_look .= "Sub-Pemeriksaan" ;} 
 if (empty($tipehasil_look)) { $tipehasil_look = $this->tipehasil; }
?>
<span id="id_read_on_tipehasil" class="css_tipehasil_line"  style="<?php echo $sStyleReadLab_tipehasil; ?>"><?php echo $this->form_encode_input($tipehasil_look); ?></span><span id="id_read_off_tipehasil" class="css_read_off_tipehasil" style="white-space: nowrap; <?php echo $sStyleReadInp_tipehasil; ?>">
 <span id="idAjaxSelect_tipehasil"><select class="sc-js-input scFormObjectOdd css_tipehasil_obj" style="" id="id_sc_field_tipehasil" name="tipehasil" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="0" <?php  if ($this->tipehasil == "0") { echo " selected" ;} ?>>Range</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_tipehasil'][] = '0'; ?>
 <option  value="1" <?php  if ($this->tipehasil == "1") { echo " selected" ;} ?>>Pilihan</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_tipehasil'][] = '1'; ?>
 <option  value="2" <?php  if ($this->tipehasil == "2") { echo " selected" ;} ?>>Uraian</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_tipehasil'][] = '2'; ?>
 <option  value="3" <?php  if ($this->tipehasil == "3") { echo " selected" ;} ?>>Sub-Pemeriksaan</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_tipehasil'][] = '3'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipehasil_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipehasil_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_tipehasil_dumb = ('' == $sStyleHidden_tipehasil) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tipehasil_dumb" style="<?php echo $sStyleHidden_tipehasil_dumb; ?>"></TD>
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
   if (!isset($this->nm_new_label['oper']))
   {
       $this->nm_new_label['oper'] = "Oper (Pria : Wanita)";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $oper = $this->oper;
   $sStyleHidden_oper = '';
   if (isset($this->nmgp_cmp_hidden['oper']) && $this->nmgp_cmp_hidden['oper'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['oper']);
       $sStyleHidden_oper = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_oper = 'display: none;';
   $sStyleReadInp_oper = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['oper']) && $this->nmgp_cmp_readonly['oper'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['oper']);
       $sStyleReadLab_oper = '';
       $sStyleReadInp_oper = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['oper']) && $this->nmgp_cmp_hidden['oper'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="oper" value="<?php echo $this->form_encode_input($this->oper) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_oper_line" id="hidden_field_data_oper" style="<?php echo $sStyleHidden_oper; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_oper_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_oper_label"><span id="id_label_oper"><?php echo $this->nm_new_label['oper']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["oper"]) &&  $this->nmgp_cmp_readonly["oper"] == "on") { 

$oper_look = "";
 if ($this->oper == "") { $oper_look .= "" ;} 
 if ($this->oper == "-:-") { $oper_look .= "-:-" ;} 
 if ($this->oper == ":") { $oper_look .= ":" ;} 
 if ($this->oper == "<:<") { $oper_look .= "<:<" ;} 
 if ($this->oper == ">:>") { $oper_look .= ">:>" ;} 
 if ($this->oper == "?:?") { $oper_look .= "?:?" ;} 
 if (empty($oper_look)) { $oper_look = $this->oper; }
?>
<input type="hidden" name="oper" value="<?php echo $this->form_encode_input($oper) . "\">" . $oper_look . ""; ?>
<?php } else { ?>
<?php

$oper_look = "";
 if ($this->oper == "") { $oper_look .= "" ;} 
 if ($this->oper == "-:-") { $oper_look .= "-:-" ;} 
 if ($this->oper == ":") { $oper_look .= ":" ;} 
 if ($this->oper == "<:<") { $oper_look .= "<:<" ;} 
 if ($this->oper == ">:>") { $oper_look .= ">:>" ;} 
 if ($this->oper == "?:?") { $oper_look .= "?:?" ;} 
 if (empty($oper_look)) { $oper_look = $this->oper; }
?>
<span id="id_read_on_oper" class="css_oper_line"  style="<?php echo $sStyleReadLab_oper; ?>"><?php echo $this->form_encode_input($oper_look); ?></span><span id="id_read_off_oper" class="css_read_off_oper" style="white-space: nowrap; <?php echo $sStyleReadInp_oper; ?>">
 <span id="idAjaxSelect_oper"><select class="sc-js-input scFormObjectOdd css_oper_obj" style="" id="id_sc_field_oper" name="oper" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="" <?php  if ($this->oper == "") { echo " selected" ;} ?><?php  if (empty($this->oper)) { echo " selected" ;} ?>></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_oper'][] = ''; ?>
 <option  value="-:-" <?php  if ($this->oper == "-:-") { echo " selected" ;} ?>>-:-</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_oper'][] = '-:-'; ?>
 <option  value=":" <?php  if ($this->oper == ":") { echo " selected" ;} ?><?php  if (empty($this->oper)) { echo " selected" ;} ?>>:</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_oper'][] = ':'; ?>
 <option  value="<:<" <?php  if ($this->oper == "<:<") { echo " selected" ;} ?>><:<</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_oper'][] = '<:<'; ?>
 <option  value=">:>" <?php  if ($this->oper == ">:>") { echo " selected" ;} ?>>>:></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_oper'][] = '>:>'; ?>
 <option  value="?:?" <?php  if ($this->oper == "?:?") { echo " selected" ;} ?>>?:?</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_oper'][] = '?:?'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_oper_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_oper_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['satuan']))
   {
       $this->nm_new_label['satuan'] = "Satuan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $satuan = $this->satuan;
   $sStyleHidden_satuan = '';
   if (isset($this->nmgp_cmp_hidden['satuan']) && $this->nmgp_cmp_hidden['satuan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['satuan']);
       $sStyleHidden_satuan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_satuan = 'display: none;';
   $sStyleReadInp_satuan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['satuan']) && $this->nmgp_cmp_readonly['satuan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['satuan']);
       $sStyleReadLab_satuan = '';
       $sStyleReadInp_satuan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['satuan']) && $this->nmgp_cmp_hidden['satuan'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="satuan" value="<?php echo $this->form_encode_input($this->satuan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_satuan_line" id="hidden_field_data_satuan" style="<?php echo $sStyleHidden_satuan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_satuan_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_satuan_label"><span id="id_label_satuan"><?php echo $this->nm_new_label['satuan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["satuan"]) &&  $this->nmgp_cmp_readonly["satuan"] == "on") { 

$satuan_look = "";
 if ($this->satuan == "") { $satuan_look .= "" ;} 
 if ($this->satuan == "%") { $satuan_look .= "%" ;} 
 if ($this->satuan == "-") { $satuan_look .= "-" ;} 
 if ($this->satuan == "/LPB") { $satuan_look .= "/LPB" ;} 
 if ($this->satuan == "/mm3") { $satuan_look .= "/mm3" ;} 
 if ($this->satuan == "/uL") { $satuan_look .= "/uL" ;} 
 if ($this->satuan == "1 ml") { $satuan_look .= "1 ml" ;} 
 if ($this->satuan == "CC") { $satuan_look .= "CC" ;} 
 if ($this->satuan == "detik") { $satuan_look .= "detik" ;} 
 if ($this->satuan == "Fl") { $satuan_look .= "Fl" ;} 
 if ($this->satuan == "g/dL") { $satuan_look .= "g/dL" ;} 
 if ($this->satuan == "g/24 jam") { $satuan_look .= "g/24 jam" ;} 
 if ($this->satuan == "gr/dL") { $satuan_look .= "gr/dL" ;} 
 if ($this->satuan == "juta/dL") { $satuan_look .= "juta/dL" ;} 
 if ($this->satuan == "juta/mm3") { $satuan_look .= "juta/mm3" ;} 
 if ($this->satuan == "MENIT") { $satuan_look .= "MENIT" ;} 
 if ($this->satuan == "mEq / L") { $satuan_look .= "mEq / L" ;} 
 if ($this->satuan == "mg/dL") { $satuan_look .= "mg/dL" ;} 
 if ($this->satuan == "mg/L") { $satuan_look .= "mg/L" ;} 
 if ($this->satuan == "ml") { $satuan_look .= "ml" ;} 
 if ($this->satuan == "mm/jam") { $satuan_look .= "mm/jam" ;} 
 if ($this->satuan == "mmol/24 jam") { $satuan_look .= "mmol/24 jam" ;} 
 if ($this->satuan == "mmol/L") { $satuan_look .= "mmol/L" ;} 
 if ($this->satuan == "NEGATIF") { $satuan_look .= "NEGATIF" ;} 
 if ($this->satuan == "ng/dl") { $satuan_look .= "ng/dl" ;} 
 if ($this->satuan == "ng/ml") { $satuan_look .= "ng/ml" ;} 
 if ($this->satuan == "Pg") { $satuan_look .= "Pg" ;} 
 if ($this->satuan == "RESUS") { $satuan_look .= "RESUS" ;} 
 if ($this->satuan == "ribu / mm3") { $satuan_look .= "ribu / mm3" ;} 
 if ($this->satuan == "ribu/dL") { $satuan_look .= "ribu/dL" ;} 
 if ($this->satuan == "U/I") { $satuan_look .= "U/I" ;} 
 if ($this->satuan == "ug/dL") { $satuan_look .= "ug/dL" ;} 
 if ($this->satuan == "UI/ML") { $satuan_look .= "UI/ML" ;} 
 if ($this->satuan == "ulU/mL") { $satuan_look .= "ulU/mL" ;} 
 if (empty($satuan_look)) { $satuan_look = $this->satuan; }
?>
<input type="hidden" name="satuan" value="<?php echo $this->form_encode_input($satuan) . "\">" . $satuan_look . ""; ?>
<?php } else { ?>
<?php

$satuan_look = "";
 if ($this->satuan == "") { $satuan_look .= "" ;} 
 if ($this->satuan == "%") { $satuan_look .= "%" ;} 
 if ($this->satuan == "-") { $satuan_look .= "-" ;} 
 if ($this->satuan == "/LPB") { $satuan_look .= "/LPB" ;} 
 if ($this->satuan == "/mm3") { $satuan_look .= "/mm3" ;} 
 if ($this->satuan == "/uL") { $satuan_look .= "/uL" ;} 
 if ($this->satuan == "1 ml") { $satuan_look .= "1 ml" ;} 
 if ($this->satuan == "CC") { $satuan_look .= "CC" ;} 
 if ($this->satuan == "detik") { $satuan_look .= "detik" ;} 
 if ($this->satuan == "Fl") { $satuan_look .= "Fl" ;} 
 if ($this->satuan == "g/dL") { $satuan_look .= "g/dL" ;} 
 if ($this->satuan == "g/24 jam") { $satuan_look .= "g/24 jam" ;} 
 if ($this->satuan == "gr/dL") { $satuan_look .= "gr/dL" ;} 
 if ($this->satuan == "juta/dL") { $satuan_look .= "juta/dL" ;} 
 if ($this->satuan == "juta/mm3") { $satuan_look .= "juta/mm3" ;} 
 if ($this->satuan == "MENIT") { $satuan_look .= "MENIT" ;} 
 if ($this->satuan == "mEq / L") { $satuan_look .= "mEq / L" ;} 
 if ($this->satuan == "mg/dL") { $satuan_look .= "mg/dL" ;} 
 if ($this->satuan == "mg/L") { $satuan_look .= "mg/L" ;} 
 if ($this->satuan == "ml") { $satuan_look .= "ml" ;} 
 if ($this->satuan == "mm/jam") { $satuan_look .= "mm/jam" ;} 
 if ($this->satuan == "mmol/24 jam") { $satuan_look .= "mmol/24 jam" ;} 
 if ($this->satuan == "mmol/L") { $satuan_look .= "mmol/L" ;} 
 if ($this->satuan == "NEGATIF") { $satuan_look .= "NEGATIF" ;} 
 if ($this->satuan == "ng/dl") { $satuan_look .= "ng/dl" ;} 
 if ($this->satuan == "ng/ml") { $satuan_look .= "ng/ml" ;} 
 if ($this->satuan == "Pg") { $satuan_look .= "Pg" ;} 
 if ($this->satuan == "RESUS") { $satuan_look .= "RESUS" ;} 
 if ($this->satuan == "ribu / mm3") { $satuan_look .= "ribu / mm3" ;} 
 if ($this->satuan == "ribu/dL") { $satuan_look .= "ribu/dL" ;} 
 if ($this->satuan == "U/I") { $satuan_look .= "U/I" ;} 
 if ($this->satuan == "ug/dL") { $satuan_look .= "ug/dL" ;} 
 if ($this->satuan == "UI/ML") { $satuan_look .= "UI/ML" ;} 
 if ($this->satuan == "ulU/mL") { $satuan_look .= "ulU/mL" ;} 
 if (empty($satuan_look)) { $satuan_look = $this->satuan; }
?>
<span id="id_read_on_satuan" class="css_satuan_line"  style="<?php echo $sStyleReadLab_satuan; ?>"><?php echo $this->form_encode_input($satuan_look); ?></span><span id="id_read_off_satuan" class="css_read_off_satuan" style="white-space: nowrap; <?php echo $sStyleReadInp_satuan; ?>">
 <span id="idAjaxSelect_satuan"><select class="sc-js-input scFormObjectOdd css_satuan_obj" style="" id="id_sc_field_satuan" name="satuan" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="" <?php  if ($this->satuan == "") { echo " selected" ;} ?><?php  if (empty($this->satuan)) { echo " selected" ;} ?>></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = ''; ?>
 <option  value="%" <?php  if ($this->satuan == "%") { echo " selected" ;} ?>>%</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = '%'; ?>
 <option  value="-" <?php  if ($this->satuan == "-") { echo " selected" ;} ?>>-</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = '-'; ?>
 <option  value="/LPB" <?php  if ($this->satuan == "/LPB") { echo " selected" ;} ?>>/LPB</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = '/LPB'; ?>
 <option  value="/mm3" <?php  if ($this->satuan == "/mm3") { echo " selected" ;} ?>>/mm3</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = '/mm3'; ?>
 <option  value="/uL" <?php  if ($this->satuan == "/uL") { echo " selected" ;} ?>>/uL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = '/uL'; ?>
 <option  value="1 ml" <?php  if ($this->satuan == "1 ml") { echo " selected" ;} ?>>1 ml</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = '1 ml'; ?>
 <option  value="CC" <?php  if ($this->satuan == "CC") { echo " selected" ;} ?>>CC</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'CC'; ?>
 <option  value="detik" <?php  if ($this->satuan == "detik") { echo " selected" ;} ?>>detik</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'detik'; ?>
 <option  value="Fl" <?php  if ($this->satuan == "Fl") { echo " selected" ;} ?>>Fl</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'Fl'; ?>
 <option  value="g/dL" <?php  if ($this->satuan == "g/dL") { echo " selected" ;} ?>>g/dL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'g/dL'; ?>
 <option  value="g/24 jam" <?php  if ($this->satuan == "g/24 jam") { echo " selected" ;} ?>>g/24 jam</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'g/24 jam'; ?>
 <option  value="gr/dL" <?php  if ($this->satuan == "gr/dL") { echo " selected" ;} ?>>gr/dL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'gr/dL'; ?>
 <option  value="juta/dL" <?php  if ($this->satuan == "juta/dL") { echo " selected" ;} ?>>juta/dL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'juta/dL'; ?>
 <option  value="juta/mm3" <?php  if ($this->satuan == "juta/mm3") { echo " selected" ;} ?>>juta/mm3</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'juta/mm3'; ?>
 <option  value="MENIT" <?php  if ($this->satuan == "MENIT") { echo " selected" ;} ?>>MENIT</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'MENIT'; ?>
 <option  value="mEq / L" <?php  if ($this->satuan == "mEq / L") { echo " selected" ;} ?>>mEq / L</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'mEq / L'; ?>
 <option  value="mg/dL" <?php  if ($this->satuan == "mg/dL") { echo " selected" ;} ?>>mg/dL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'mg/dL'; ?>
 <option  value="mg/L" <?php  if ($this->satuan == "mg/L") { echo " selected" ;} ?>>mg/L</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'mg/L'; ?>
 <option  value="ml" <?php  if ($this->satuan == "ml") { echo " selected" ;} ?>>ml</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'ml'; ?>
 <option  value="mm/jam" <?php  if ($this->satuan == "mm/jam") { echo " selected" ;} ?>>mm/jam</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'mm/jam'; ?>
 <option  value="mmol/24 jam" <?php  if ($this->satuan == "mmol/24 jam") { echo " selected" ;} ?>>mmol/24 jam</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'mmol/24 jam'; ?>
 <option  value="mmol/L" <?php  if ($this->satuan == "mmol/L") { echo " selected" ;} ?>>mmol/L</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'mmol/L'; ?>
 <option  value="NEGATIF" <?php  if ($this->satuan == "NEGATIF") { echo " selected" ;} ?>>NEGATIF</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'NEGATIF'; ?>
 <option  value="ng/dl" <?php  if ($this->satuan == "ng/dl") { echo " selected" ;} ?>>ng/dl</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'ng/dl'; ?>
 <option  value="ng/ml" <?php  if ($this->satuan == "ng/ml") { echo " selected" ;} ?>>ng/ml</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'ng/ml'; ?>
 <option  value="Pg" <?php  if ($this->satuan == "Pg") { echo " selected" ;} ?>>Pg</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'Pg'; ?>
 <option  value="RESUS" <?php  if ($this->satuan == "RESUS") { echo " selected" ;} ?>>RESUS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'RESUS'; ?>
 <option  value="ribu / mm3" <?php  if ($this->satuan == "ribu / mm3") { echo " selected" ;} ?>>ribu / mm3</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'ribu / mm3'; ?>
 <option  value="ribu/dL" <?php  if ($this->satuan == "ribu/dL") { echo " selected" ;} ?>>ribu/dL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'ribu/dL'; ?>
 <option  value="U/I" <?php  if ($this->satuan == "U/I") { echo " selected" ;} ?>>U/I</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'U/I'; ?>
 <option  value="ug/dL" <?php  if ($this->satuan == "ug/dL") { echo " selected" ;} ?>>ug/dL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'ug/dL'; ?>
 <option  value="UI/ML" <?php  if ($this->satuan == "UI/ML") { echo " selected" ;} ?>>UI/ML</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'UI/ML'; ?>
 <option  value="ulU/mL" <?php  if ($this->satuan == "ulU/mL") { echo " selected" ;} ?>>ulU/mL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['Lookup_satuan'][] = 'ulU/mL'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_satuan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_satuan_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['p1']))
    {
        $this->nm_new_label['p1'] = "Rujukan Pria 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $p1 = $this->p1;
   $sStyleHidden_p1 = '';
   if (isset($this->nmgp_cmp_hidden['p1']) && $this->nmgp_cmp_hidden['p1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['p1']);
       $sStyleHidden_p1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_p1 = 'display: none;';
   $sStyleReadInp_p1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['p1']) && $this->nmgp_cmp_readonly['p1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['p1']);
       $sStyleReadLab_p1 = '';
       $sStyleReadInp_p1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['p1']) && $this->nmgp_cmp_hidden['p1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="p1" value="<?php echo $this->form_encode_input($p1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_p1_line" id="hidden_field_data_p1" style="<?php echo $sStyleHidden_p1; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_p1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_p1_label"><span id="id_label_p1"><?php echo $this->nm_new_label['p1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["p1"]) &&  $this->nmgp_cmp_readonly["p1"] == "on") { 

 ?>
<input type="hidden" name="p1" value="<?php echo $this->form_encode_input($p1) . "\">" . $p1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_p1" class="sc-ui-readonly-p1 css_p1_line" style="<?php echo $sStyleReadLab_p1; ?>"><?php echo $this->p1; ?></span><span id="id_read_off_p1" class="css_read_off_p1" style="white-space: nowrap;<?php echo $sStyleReadInp_p1; ?>">
 <input class="sc-js-input scFormObjectOdd css_p1_obj" style="" id="id_sc_field_p1" type=text name="p1" value="<?php echo $this->form_encode_input($p1) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_p1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_p1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['p2']))
    {
        $this->nm_new_label['p2'] = "Rujukan Pria 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $p2 = $this->p2;
   $sStyleHidden_p2 = '';
   if (isset($this->nmgp_cmp_hidden['p2']) && $this->nmgp_cmp_hidden['p2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['p2']);
       $sStyleHidden_p2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_p2 = 'display: none;';
   $sStyleReadInp_p2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['p2']) && $this->nmgp_cmp_readonly['p2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['p2']);
       $sStyleReadLab_p2 = '';
       $sStyleReadInp_p2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['p2']) && $this->nmgp_cmp_hidden['p2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="p2" value="<?php echo $this->form_encode_input($p2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_p2_line" id="hidden_field_data_p2" style="<?php echo $sStyleHidden_p2; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_p2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_p2_label"><span id="id_label_p2"><?php echo $this->nm_new_label['p2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["p2"]) &&  $this->nmgp_cmp_readonly["p2"] == "on") { 

 ?>
<input type="hidden" name="p2" value="<?php echo $this->form_encode_input($p2) . "\">" . $p2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_p2" class="sc-ui-readonly-p2 css_p2_line" style="<?php echo $sStyleReadLab_p2; ?>"><?php echo $this->p2; ?></span><span id="id_read_off_p2" class="css_read_off_p2" style="white-space: nowrap;<?php echo $sStyleReadInp_p2; ?>">
 <input class="sc-js-input scFormObjectOdd css_p2_obj" style="" id="id_sc_field_p2" type=text name="p2" value="<?php echo $this->form_encode_input($p2) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_p2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_p2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['w1']))
    {
        $this->nm_new_label['w1'] = "Rujukan Wanita 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $w1 = $this->w1;
   $sStyleHidden_w1 = '';
   if (isset($this->nmgp_cmp_hidden['w1']) && $this->nmgp_cmp_hidden['w1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['w1']);
       $sStyleHidden_w1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_w1 = 'display: none;';
   $sStyleReadInp_w1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['w1']) && $this->nmgp_cmp_readonly['w1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['w1']);
       $sStyleReadLab_w1 = '';
       $sStyleReadInp_w1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['w1']) && $this->nmgp_cmp_hidden['w1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="w1" value="<?php echo $this->form_encode_input($w1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_w1_line" id="hidden_field_data_w1" style="<?php echo $sStyleHidden_w1; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_w1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_w1_label"><span id="id_label_w1"><?php echo $this->nm_new_label['w1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["w1"]) &&  $this->nmgp_cmp_readonly["w1"] == "on") { 

 ?>
<input type="hidden" name="w1" value="<?php echo $this->form_encode_input($w1) . "\">" . $w1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_w1" class="sc-ui-readonly-w1 css_w1_line" style="<?php echo $sStyleReadLab_w1; ?>"><?php echo $this->w1; ?></span><span id="id_read_off_w1" class="css_read_off_w1" style="white-space: nowrap;<?php echo $sStyleReadInp_w1; ?>">
 <input class="sc-js-input scFormObjectOdd css_w1_obj" style="" id="id_sc_field_w1" type=text name="w1" value="<?php echo $this->form_encode_input($w1) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_w1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_w1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['w2']))
    {
        $this->nm_new_label['w2'] = "Rujukan Wanita 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $w2 = $this->w2;
   $sStyleHidden_w2 = '';
   if (isset($this->nmgp_cmp_hidden['w2']) && $this->nmgp_cmp_hidden['w2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['w2']);
       $sStyleHidden_w2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_w2 = 'display: none;';
   $sStyleReadInp_w2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['w2']) && $this->nmgp_cmp_readonly['w2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['w2']);
       $sStyleReadLab_w2 = '';
       $sStyleReadInp_w2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['w2']) && $this->nmgp_cmp_hidden['w2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="w2" value="<?php echo $this->form_encode_input($w2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_w2_line" id="hidden_field_data_w2" style="<?php echo $sStyleHidden_w2; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_w2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_w2_label"><span id="id_label_w2"><?php echo $this->nm_new_label['w2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["w2"]) &&  $this->nmgp_cmp_readonly["w2"] == "on") { 

 ?>
<input type="hidden" name="w2" value="<?php echo $this->form_encode_input($w2) . "\">" . $w2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_w2" class="sc-ui-readonly-w2 css_w2_line" style="<?php echo $sStyleReadLab_w2; ?>"><?php echo $this->w2; ?></span><span id="id_read_off_w2" class="css_read_off_w2" style="white-space: nowrap;<?php echo $sStyleReadInp_w2; ?>">
 <input class="sc-js-input scFormObjectOdd css_w2_obj" style="" id="id_sc_field_w2" type=text name="w2" value="<?php echo $this->form_encode_input($w2) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_w2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_w2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lastupdated']))
    {
        $this->nm_new_label['lastupdated'] = "Terakhir Update";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_lastupdated = $this->lastupdated;
   if (strlen($this->lastupdated_hora) > 8 ) {$this->lastupdated_hora = substr($this->lastupdated_hora, 0, 8);}
   $this->lastupdated .= ' ' . $this->lastupdated_hora;
   $lastupdated = $this->lastupdated;
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

    <TD class="scFormDataOdd css_lastupdated_line" id="hidden_field_data_lastupdated" style="<?php echo $sStyleHidden_lastupdated; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lastupdated_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_lastupdated_label"><span id="id_label_lastupdated"><?php echo $this->nm_new_label['lastupdated']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lastupdated"]) &&  $this->nmgp_cmp_readonly["lastupdated"] == "on") { 

 ?>
<input type="hidden" name="lastupdated" value="<?php echo $this->form_encode_input($lastupdated) . "\">" . $lastupdated . ""; ?>
<?php } else { ?>
<span id="id_read_on_lastupdated" class="sc-ui-readonly-lastupdated css_lastupdated_line" style="<?php echo $sStyleReadLab_lastupdated; ?>"><?php echo $lastupdated; ?></span><span id="id_read_off_lastupdated" class="css_read_off_lastupdated" style="white-space: nowrap;<?php echo $sStyleReadInp_lastupdated; ?>">
 <input class="sc-js-input scFormObjectOdd css_lastupdated_obj" style="" id="id_sc_field_lastupdated" type=text name="lastupdated" value="<?php echo $this->form_encode_input($lastupdated) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['lastupdated']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['lastupdated']['date_format']; ?>', timeSep: '<?php echo $this->field_config['lastupdated']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
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
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lastupdated_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lastupdated_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->lastupdated = $old_dt_lastupdated;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_lastupdated_dumb = ('' == $sStyleHidden_lastupdated) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_lastupdated_dumb" style="<?php echo $sStyleHidden_lastupdated_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tarif']))
    {
        $this->nm_new_label['tarif'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarif = $this->tarif;
   $sStyleHidden_tarif = '';
   if (isset($this->nmgp_cmp_hidden['tarif']) && $this->nmgp_cmp_hidden['tarif'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarif']);
       $sStyleHidden_tarif = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarif = 'display: none;';
   $sStyleReadInp_tarif = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarif']) && $this->nmgp_cmp_readonly['tarif'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarif']);
       $sStyleReadLab_tarif = '';
       $sStyleReadInp_tarif = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarif']) && $this->nmgp_cmp_hidden['tarif'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarif" value="<?php echo $this->form_encode_input($tarif) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tarif_line" id="hidden_field_data_tarif" style="<?php echo $sStyleHidden_tarif; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_tarif_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_tarif'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_tarif'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_tarif'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['foreign_key']['labcode'] = $this->nmgp_dados_form['labcode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['where_filter'] = "labcode = '" . $this->nmgp_dados_form['labcode'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['where_detal']  = "labcode = '" . $this->nmgp_dados_form['labcode'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblab_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tblab_mob_empty.htm' : $this->Ini->link_form_tblabrate_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init'] ]['form_tblabrate'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_tarif']) && 'nmsc_iframe_liga_form_tblabrate_mob' != $this->Ini->sc_lig_target['C_@scinf_tarif'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_tarif'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrate_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_tarif'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tblabrate_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tblabrate_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tarif_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tarif_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_tarif_dumb = ('' == $sStyleHidden_tarif) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tarif_dumb" style="<?php echo $sStyleHidden_tarif_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['detail']))
    {
        $this->nm_new_label['detail'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detail = $this->detail;
   $sStyleHidden_detail = '';
   if (isset($this->nmgp_cmp_hidden['detail']) && $this->nmgp_cmp_hidden['detail'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detail']);
       $sStyleHidden_detail = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detail = 'display: none;';
   $sStyleReadInp_detail = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detail']) && $this->nmgp_cmp_readonly['detail'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detail']);
       $sStyleReadLab_detail = '';
       $sStyleReadInp_detail = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detail']) && $this->nmgp_cmp_hidden['detail'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detail" value="<?php echo $this->form_encode_input($detail) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detail_line" id="hidden_field_data_detail" style="<?php echo $sStyleHidden_detail; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detail_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detail'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detail'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detail'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['foreign_key']['labcode'] = $this->nmgp_dados_form['labcode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['where_filter'] = "labcode = '" . $this->nmgp_dados_form['labcode'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['where_detal']  = "labcode = '" . $this->nmgp_dados_form['labcode'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblab_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tblab_mob_empty.htm' : $this->Ini->link_form_tblabdetail_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init'] ]['form_tblabdetail'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_detail']) && 'nmsc_iframe_liga_form_tblabdetail_mob' != $this->Ini->sc_lig_target['C_@scinf_detail'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detail'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabdetail_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_detail'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tblabdetail_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tblabdetail_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detail_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detail_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_detail_dumb = ('' == $sStyleHidden_detail) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_detail_dumb" style="<?php echo $sStyleHidden_detail_dumb; ?>"></TD>
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id']))
           {
               $this->nmgp_cmp_readonly['id'] = 'on';
           }
?>


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
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['foreign_key']['labcode'] = $this->nmgp_dados_form['labcode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['foreign_key']['kategori'] = $this->nmgp_dados_form['kategori'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['foreign_key']['nama'] = $this->nmgp_dados_form['nama'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['where_filter'] = "labcode = '" . $this->nmgp_dados_form['labcode'] . "' AND kategori = '" . $this->nmgp_dados_form['kategori'] . "' AND nama = '" . $this->nmgp_dados_form['nama'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['where_detal']  = "labcode = '" . $this->nmgp_dados_form['labcode'] . "' AND kategori = '" . $this->nmgp_dados_form['kategori'] . "' AND nama = '" . $this->nmgp_dados_form['nama'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblab_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tblab_mob_empty.htm' : $this->Ini->link_form_tblabrujukananak_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y&sc_ifr_height=500';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init'] ]['form_tblabrujukananak'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_sc_field_0']) && 'nmsc_iframe_liga_form_tblabrujukananak_mob' != $this->Ini->sc_lig_target['C_@scinf_sc_field_0'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['form_tblabrujukananak_mob_script_case_init']);
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
<iframe border="0" id="nmsc_iframe_liga_form_tblabrujukananak_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="100%" name="nmsc_iframe_liga_form_tblabrujukananak_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_0_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_0_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id']))
    {
        $this->nm_new_label['id'] = "Id";
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

    <TD class="scFormDataOdd css_id_line" id="hidden_field_data_id" style="<?php echo $sStyleHidden_id; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id" class="css_id_line" style="<?php echo $sStyleReadLab_id; ?>"><?php echo $this->form_encode_input($this->id); ?></span><span id="id_read_off_id" class="css_read_off_id" style="<?php echo $sStyleReadInp_id; ?>"><input type="hidden" name="id" value="<?php echo $this->form_encode_input($id) . "\">"?><span id="id_ajax_label_id"><?php echo nl2br($id); ?></span>
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






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tblab_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tblab_mob");
 parent.scAjaxDetailHeight("form_tblab_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tblab_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tblab_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tblab_mob']['buttonStatus'] = $this->nmgp_botoes;
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
