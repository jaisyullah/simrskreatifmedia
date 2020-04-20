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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Data Karyawan Baru"); } else { echo strip_tags("Edit Data Karyawan"); } ?></TITLE>
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
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_hrm_karyawan/form_hrm_karyawan_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_hrm_karyawan_sajax_js.php");
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

include_once('form_hrm_karyawan_jquery.php');

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
      scAjaxDetailHeight("form_hrm_pendidikan", $($("#nmsc_iframe_liga_form_hrm_pendidikan")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_hrm_pendidikan")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_hrm_pendidikan")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_hrm_jabatan_karyawan", $($("#nmsc_iframe_liga_form_hrm_jabatan_karyawan")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_hrm_jabatan_karyawan")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_hrm_jabatan_karyawan")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_4" == block_id) {
      scAjaxDetailHeight("form_hrm_kontrak_kerja", $($("#nmsc_iframe_liga_form_hrm_kontrak_kerja")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_hrm_kontrak_kerja")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_hrm_kontrak_kerja")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_5" == block_id) {
      scAjaxDetailHeight("form_tbhrdinformal", $($("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_6" == block_id) {
      scAjaxDetailHeight("form_hrm_peringatan", $($("#nmsc_iframe_liga_form_hrm_peringatan")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_hrm_peringatan")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_hrm_peringatan")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_7" == block_id) {
      scAjaxDetailHeight("form_hrm_penilaian", $($("#nmsc_iframe_liga_form_hrm_penilaian")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_hrm_penilaian")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_hrm_penilaian")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_8" == block_id) {
      scAjaxDetailHeight("form_hrm_pembinaan", $($("#nmsc_iframe_liga_form_hrm_pembinaan")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_hrm_pembinaan")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_hrm_pembinaan")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_9" == block_id) {
      scAjaxDetailHeight("form_hrm_ikatan_dinas", $($("#nmsc_iframe_liga_form_hrm_ikatan_dinas")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_hrm_ikatan_dinas")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_hrm_ikatan_dinas")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_10" == block_id) {
      scAjaxDetailHeight("form_hrm_penugasan", $($("#nmsc_iframe_liga_form_hrm_penugasan")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_hrm_penugasan")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_hrm_penugasan")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_11" == block_id) {
      scAjaxDetailHeight("form_hrm_penghargaan", $($("#nmsc_iframe_liga_form_hrm_penghargaan")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_hrm_penghargaan")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_hrm_penghargaan")[0].contentWindow.scQuickSearchInit(false, '');
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_hrm_karyawan_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['insert_validation']; ?>">
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
<input type="hidden" name="foto_salva" value="<?php  echo $this->form_encode_input($this->foto) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_hrm_karyawan'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_hrm_karyawan'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "Data Karyawan Baru"; } else { echo "Edit Data Karyawan"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['fast_search'][2] : "";
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['empty_filter'] = true;
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
        scAjaxDetailHeight("form_hrm_pendidikan", $($("#nmsc_iframe_liga_form_hrm_pendidikan")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_hrm_pendidikan")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_hrm_pendidikan")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_3" == sTabId) {
        scAjaxDetailHeight("form_hrm_jabatan_karyawan", $($("#nmsc_iframe_liga_form_hrm_jabatan_karyawan")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_hrm_jabatan_karyawan")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_hrm_jabatan_karyawan")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_4" == sTabId) {
        scAjaxDetailHeight("form_hrm_kontrak_kerja", $($("#nmsc_iframe_liga_form_hrm_kontrak_kerja")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_hrm_kontrak_kerja")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_hrm_kontrak_kerja")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_5" == sTabId) {
        scAjaxDetailHeight("form_tbhrdinformal", $($("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_6" == sTabId) {
        scAjaxDetailHeight("form_hrm_peringatan", $($("#nmsc_iframe_liga_form_hrm_peringatan")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_hrm_peringatan")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_hrm_peringatan")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_7" == sTabId) {
        scAjaxDetailHeight("form_hrm_penilaian", $($("#nmsc_iframe_liga_form_hrm_penilaian")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_hrm_penilaian")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_hrm_penilaian")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_8" == sTabId) {
        scAjaxDetailHeight("form_hrm_pembinaan", $($("#nmsc_iframe_liga_form_hrm_pembinaan")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_hrm_pembinaan")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_hrm_pembinaan")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_9" == sTabId) {
        scAjaxDetailHeight("form_hrm_ikatan_dinas", $($("#nmsc_iframe_liga_form_hrm_ikatan_dinas")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_hrm_ikatan_dinas")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_hrm_ikatan_dinas")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_10" == sTabId) {
        scAjaxDetailHeight("form_hrm_penugasan", $($("#nmsc_iframe_liga_form_hrm_penugasan")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_hrm_penugasan")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_hrm_penugasan")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_11" == sTabId) {
        scAjaxDetailHeight("form_hrm_penghargaan", $($("#nmsc_iframe_liga_form_hrm_penghargaan")[0].contentWindow.document).innerHeight());
        if (typeof $("#nmsc_iframe_liga_form_hrm_penghargaan")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_hrm_penghargaan")[0].contentWindow.scQuickSearchInit(false, '');
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
<input type="hidden" name="foto_ul_name" id="id_sc_field_foto_ul_name" value="<?php echo $this->form_encode_input($this->foto_ul_name);?>">
<input type="hidden" name="foto_ul_type" id="id_sc_field_foto_ul_type" value="<?php echo $this->form_encode_input($this->foto_ul_type);?>">
   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Data Dasar<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['kode_karyawan']))
    {
        $this->nm_new_label['kode_karyawan'] = "Kode Karyawan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kode_karyawan = $this->kode_karyawan;
   $sStyleHidden_kode_karyawan = '';
   if (isset($this->nmgp_cmp_hidden['kode_karyawan']) && $this->nmgp_cmp_hidden['kode_karyawan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kode_karyawan']);
       $sStyleHidden_kode_karyawan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kode_karyawan = 'display: none;';
   $sStyleReadInp_kode_karyawan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kode_karyawan']) && $this->nmgp_cmp_readonly['kode_karyawan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kode_karyawan']);
       $sStyleReadLab_kode_karyawan = '';
       $sStyleReadInp_kode_karyawan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kode_karyawan']) && $this->nmgp_cmp_hidden['kode_karyawan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kode_karyawan" value="<?php echo $this->form_encode_input($kode_karyawan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kode_karyawan_label" id="hidden_field_label_kode_karyawan" style="<?php echo $sStyleHidden_kode_karyawan; ?>"><span id="id_label_kode_karyawan"><?php echo $this->nm_new_label['kode_karyawan']; ?></span></TD>
    <TD class="scFormDataOdd css_kode_karyawan_line" id="hidden_field_data_kode_karyawan" style="<?php echo $sStyleHidden_kode_karyawan; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kode_karyawan_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kode_karyawan"]) &&  $this->nmgp_cmp_readonly["kode_karyawan"] == "on") { 

 ?>
<input type="hidden" name="kode_karyawan" value="<?php echo $this->form_encode_input($kode_karyawan) . "\">" . $kode_karyawan . ""; ?>
<?php } else { ?>
<span id="id_read_on_kode_karyawan" class="sc-ui-readonly-kode_karyawan css_kode_karyawan_line" style="<?php echo $sStyleReadLab_kode_karyawan; ?>"><?php echo $this->kode_karyawan; ?></span><span id="id_read_off_kode_karyawan" class="css_read_off_kode_karyawan" style="white-space: nowrap;<?php echo $sStyleReadInp_kode_karyawan; ?>">
 <input class="sc-js-input scFormObjectOdd css_kode_karyawan_obj" style="" id="id_sc_field_kode_karyawan" type=text name="kode_karyawan" value="<?php echo $this->form_encode_input($kode_karyawan) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kode_karyawan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kode_karyawan_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nama_label" id="hidden_field_label_nama" style="<?php echo $sStyleHidden_nama; ?>"><span id="id_label_nama"><?php echo $this->nm_new_label['nama']; ?></span></TD>
    <TD class="scFormDataOdd css_nama_line" id="hidden_field_data_nama" style="<?php echo $sStyleHidden_nama; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nama_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nama"]) &&  $this->nmgp_cmp_readonly["nama"] == "on") { 

 ?>
<input type="hidden" name="nama" value="<?php echo $this->form_encode_input($nama) . "\">" . $nama . ""; ?>
<?php } else { ?>
<span id="id_read_on_nama" class="sc-ui-readonly-nama css_nama_line" style="<?php echo $sStyleReadLab_nama; ?>"><?php echo $this->nama; ?></span><span id="id_read_off_nama" class="css_read_off_nama" style="white-space: nowrap;<?php echo $sStyleReadInp_nama; ?>">
 <input class="sc-js-input scFormObjectOdd css_nama_obj" style="" id="id_sc_field_nama" type=text name="nama" value="<?php echo $this->form_encode_input($nama) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nama_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nama_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nik']))
    {
        $this->nm_new_label['nik'] = "NIK";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nik = $this->nik;
   $sStyleHidden_nik = '';
   if (isset($this->nmgp_cmp_hidden['nik']) && $this->nmgp_cmp_hidden['nik'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nik']);
       $sStyleHidden_nik = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nik = 'display: none;';
   $sStyleReadInp_nik = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nik']) && $this->nmgp_cmp_readonly['nik'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nik']);
       $sStyleReadLab_nik = '';
       $sStyleReadInp_nik = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nik']) && $this->nmgp_cmp_hidden['nik'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nik" value="<?php echo $this->form_encode_input($nik) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nik_label" id="hidden_field_label_nik" style="<?php echo $sStyleHidden_nik; ?>"><span id="id_label_nik"><?php echo $this->nm_new_label['nik']; ?></span></TD>
    <TD class="scFormDataOdd css_nik_line" id="hidden_field_data_nik" style="<?php echo $sStyleHidden_nik; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nik_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nik"]) &&  $this->nmgp_cmp_readonly["nik"] == "on") { 

 ?>
<input type="hidden" name="nik" value="<?php echo $this->form_encode_input($nik) . "\">" . $nik . ""; ?>
<?php } else { ?>
<span id="id_read_on_nik" class="sc-ui-readonly-nik css_nik_line" style="<?php echo $sStyleReadLab_nik; ?>"><?php echo $this->nik; ?></span><span id="id_read_off_nik" class="css_read_off_nik" style="white-space: nowrap;<?php echo $sStyleReadInp_nik; ?>">
 <input class="sc-js-input scFormObjectOdd css_nik_obj" style="" id="id_sc_field_nik" type=text name="nik" value="<?php echo $this->form_encode_input($nik) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nik_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nik_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tenaga_medis']))
   {
       $this->nm_new_label['tenaga_medis'] = "Tenaga Medis";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tenaga_medis = $this->tenaga_medis;
   $sStyleHidden_tenaga_medis = '';
   if (isset($this->nmgp_cmp_hidden['tenaga_medis']) && $this->nmgp_cmp_hidden['tenaga_medis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tenaga_medis']);
       $sStyleHidden_tenaga_medis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tenaga_medis = 'display: none;';
   $sStyleReadInp_tenaga_medis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tenaga_medis']) && $this->nmgp_cmp_readonly['tenaga_medis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tenaga_medis']);
       $sStyleReadLab_tenaga_medis = '';
       $sStyleReadInp_tenaga_medis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tenaga_medis']) && $this->nmgp_cmp_hidden['tenaga_medis'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tenaga_medis" value="<?php echo $this->form_encode_input($this->tenaga_medis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tenaga_medis_label" id="hidden_field_label_tenaga_medis" style="<?php echo $sStyleHidden_tenaga_medis; ?>"><span id="id_label_tenaga_medis"><?php echo $this->nm_new_label['tenaga_medis']; ?></span></TD>
    <TD class="scFormDataOdd css_tenaga_medis_line" id="hidden_field_data_tenaga_medis" style="<?php echo $sStyleHidden_tenaga_medis; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tenaga_medis_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tenaga_medis"]) &&  $this->nmgp_cmp_readonly["tenaga_medis"] == "on") { 

$tenaga_medis_look = "";
 if ($this->tenaga_medis == "0") { $tenaga_medis_look .= "Bukan" ;} 
 if ($this->tenaga_medis == "1") { $tenaga_medis_look .= "Ya" ;} 
 if (empty($tenaga_medis_look)) { $tenaga_medis_look = $this->tenaga_medis; }
?>
<input type="hidden" name="tenaga_medis" value="<?php echo $this->form_encode_input($tenaga_medis) . "\">" . $tenaga_medis_look . ""; ?>
<?php } else { ?>
<?php

$tenaga_medis_look = "";
 if ($this->tenaga_medis == "0") { $tenaga_medis_look .= "Bukan" ;} 
 if ($this->tenaga_medis == "1") { $tenaga_medis_look .= "Ya" ;} 
 if (empty($tenaga_medis_look)) { $tenaga_medis_look = $this->tenaga_medis; }
?>
<span id="id_read_on_tenaga_medis" class="css_tenaga_medis_line"  style="<?php echo $sStyleReadLab_tenaga_medis; ?>"><?php echo $this->form_encode_input($tenaga_medis_look); ?></span><span id="id_read_off_tenaga_medis" class="css_read_off_tenaga_medis" style="white-space: nowrap; <?php echo $sStyleReadInp_tenaga_medis; ?>">
 <span id="idAjaxSelect_tenaga_medis"><select class="sc-js-input scFormObjectOdd css_tenaga_medis_obj" style="" id="id_sc_field_tenaga_medis" name="tenaga_medis" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="0" <?php  if ($this->tenaga_medis == "0") { echo " selected" ;} ?>>Bukan</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['Lookup_tenaga_medis'][] = '0'; ?>
 <option  value="1" <?php  if ($this->tenaga_medis == "1") { echo " selected" ;} ?>>Ya</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['Lookup_tenaga_medis'][] = '1'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tenaga_medis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tenaga_medis_text"></span></td></tr></table></td></tr></table></TD>
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
 size=50 maxlength=500 alt="{datatype: 'text', maxLength: 500, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_alamat_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_alamat_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['aktif']))
   {
       $this->nm_new_label['aktif'] = "Aktif";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $aktif = $this->aktif;
   $sStyleHidden_aktif = '';
   if (isset($this->nmgp_cmp_hidden['aktif']) && $this->nmgp_cmp_hidden['aktif'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['aktif']);
       $sStyleHidden_aktif = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_aktif = 'display: none;';
   $sStyleReadInp_aktif = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['aktif']) && $this->nmgp_cmp_readonly['aktif'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['aktif']);
       $sStyleReadLab_aktif = '';
       $sStyleReadInp_aktif = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['aktif']) && $this->nmgp_cmp_hidden['aktif'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="aktif" value="<?php echo $this->form_encode_input($this->aktif) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_aktif_label" id="hidden_field_label_aktif" style="<?php echo $sStyleHidden_aktif; ?>"><span id="id_label_aktif"><?php echo $this->nm_new_label['aktif']; ?></span></TD>
    <TD class="scFormDataOdd css_aktif_line" id="hidden_field_data_aktif" style="<?php echo $sStyleHidden_aktif; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_aktif_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["aktif"]) &&  $this->nmgp_cmp_readonly["aktif"] == "on") { 

$aktif_look = "";
 if ($this->aktif == "A") { $aktif_look .= "Aktif" ;} 
 if ($this->aktif == "N") { $aktif_look .= "Non AKtif" ;} 
 if (empty($aktif_look)) { $aktif_look = $this->aktif; }
?>
<input type="hidden" name="aktif" value="<?php echo $this->form_encode_input($aktif) . "\">" . $aktif_look . ""; ?>
<?php } else { ?>
<?php

$aktif_look = "";
 if ($this->aktif == "A") { $aktif_look .= "Aktif" ;} 
 if ($this->aktif == "N") { $aktif_look .= "Non AKtif" ;} 
 if (empty($aktif_look)) { $aktif_look = $this->aktif; }
?>
<span id="id_read_on_aktif" class="css_aktif_line"  style="<?php echo $sStyleReadLab_aktif; ?>"><?php echo $this->form_encode_input($aktif_look); ?></span><span id="id_read_off_aktif" class="css_read_off_aktif" style="white-space: nowrap; <?php echo $sStyleReadInp_aktif; ?>">
 <span id="idAjaxSelect_aktif"><select class="sc-js-input scFormObjectOdd css_aktif_obj" style="" id="id_sc_field_aktif" name="aktif" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['Lookup_aktif'][] = ''; ?>
 <option value="">--</option>
 <option  value="A" <?php  if ($this->aktif == "A") { echo " selected" ;} ?>>Aktif</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['Lookup_aktif'][] = 'A'; ?>
 <option  value="N" <?php  if ($this->aktif == "N") { echo " selected" ;} ?>>Non AKtif</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['Lookup_aktif'][] = 'N'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aktif_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aktif_text"></span></td></tr></table></td></tr></table></TD>
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
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Info & Kontak<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_presensi']))
    {
        $this->nm_new_label['id_presensi'] = "ID Presensi";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_presensi = $this->id_presensi;
   $sStyleHidden_id_presensi = '';
   if (isset($this->nmgp_cmp_hidden['id_presensi']) && $this->nmgp_cmp_hidden['id_presensi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_presensi']);
       $sStyleHidden_id_presensi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_presensi = 'display: none;';
   $sStyleReadInp_id_presensi = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_presensi']) && $this->nmgp_cmp_readonly['id_presensi'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_presensi']);
       $sStyleReadLab_id_presensi = '';
       $sStyleReadInp_id_presensi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_presensi']) && $this->nmgp_cmp_hidden['id_presensi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_presensi" value="<?php echo $this->form_encode_input($id_presensi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_presensi_label" id="hidden_field_label_id_presensi" style="<?php echo $sStyleHidden_id_presensi; ?>"><span id="id_label_id_presensi"><?php echo $this->nm_new_label['id_presensi']; ?></span></TD>
    <TD class="scFormDataOdd css_id_presensi_line" id="hidden_field_data_id_presensi" style="<?php echo $sStyleHidden_id_presensi; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_presensi_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_presensi"]) &&  $this->nmgp_cmp_readonly["id_presensi"] == "on") { 

 ?>
<input type="hidden" name="id_presensi" value="<?php echo $this->form_encode_input($id_presensi) . "\">" . $id_presensi . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_presensi" class="sc-ui-readonly-id_presensi css_id_presensi_line" style="<?php echo $sStyleReadLab_id_presensi; ?>"><?php echo $this->id_presensi; ?></span><span id="id_read_off_id_presensi" class="css_read_off_id_presensi" style="white-space: nowrap;<?php echo $sStyleReadInp_id_presensi; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_presensi_obj" style="" id="id_sc_field_id_presensi" type=text name="id_presensi" value="<?php echo $this->form_encode_input($id_presensi) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 5, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_presensi']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_presensi']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['id_presensi']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_presensi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_presensi_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['foto']))
    {
        $this->nm_new_label['foto'] = "Foto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foto = $this->foto;
   $sStyleHidden_foto = '';
   if (isset($this->nmgp_cmp_hidden['foto']) && $this->nmgp_cmp_hidden['foto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foto']);
       $sStyleHidden_foto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foto = 'display: none;';
   $sStyleReadInp_foto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foto']) && $this->nmgp_cmp_readonly['foto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foto']);
       $sStyleReadLab_foto = '';
       $sStyleReadInp_foto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foto']) && $this->nmgp_cmp_hidden['foto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foto" value="<?php echo $this->form_encode_input($foto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_foto_label" id="hidden_field_label_foto" style="<?php echo $sStyleHidden_foto; ?>"><span id="id_label_foto"><?php echo $this->nm_new_label['foto']; ?></span></TD>
    <TD class="scFormDataOdd css_foto_line" id="hidden_field_data_foto" style="<?php echo $sStyleHidden_foto; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_foto_line" style="vertical-align: top;padding: 0px">
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_foto" => $out1_foto); ?><script>var var_ajax_img_foto = '<?php echo $out1_foto; ?>';</script><?php if (!empty($out_foto)){ echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_foto, '" . $this->nmgp_return_img['foto'][0] . "', '" . $this->nmgp_return_img['foto'][1] . "')\"><img id=\"id_ajax_img_foto\" border=\"0\" src=\"$out_foto\"></a> &nbsp;" . "<span id=\"txt_ajax_img_foto\">" . $foto . "</span>"; if (!empty($foto)){ echo "<br>";} } else { echo "<img id=\"id_ajax_img_foto\" border=\"0\" style=\"display: none\"> &nbsp;<span id=\"txt_ajax_img_foto\"></span><br />"; } ?>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foto"]) &&  $this->nmgp_cmp_readonly["foto"] == "on") { 

 ?>
<img id=\"foto_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="foto" value="<?php echo $this->form_encode_input($foto) . "\">" . $foto . ""; ?>
<?php } else { ?>
<span id="id_read_off_foto" class="css_read_off_foto" style="white-space: nowrap;<?php echo $sStyleReadInp_foto; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-foto" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_foto_obj" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="foto[]" id="id_sc_field_foto" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<span id="chk_ajax_img_foto"<?php if ($this->nmgp_opcao == "novo" || empty($foto)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="foto_limpa" value="<?php echo $foto_limpa . '" '; if ($foto_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="foto_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_foto" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_foto" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_foto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_foto_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ponsel']))
    {
        $this->nm_new_label['ponsel'] = "Ponsel";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ponsel = $this->ponsel;
   $sStyleHidden_ponsel = '';
   if (isset($this->nmgp_cmp_hidden['ponsel']) && $this->nmgp_cmp_hidden['ponsel'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ponsel']);
       $sStyleHidden_ponsel = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ponsel = 'display: none;';
   $sStyleReadInp_ponsel = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ponsel']) && $this->nmgp_cmp_readonly['ponsel'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ponsel']);
       $sStyleReadLab_ponsel = '';
       $sStyleReadInp_ponsel = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ponsel']) && $this->nmgp_cmp_hidden['ponsel'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ponsel" value="<?php echo $this->form_encode_input($ponsel) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ponsel_label" id="hidden_field_label_ponsel" style="<?php echo $sStyleHidden_ponsel; ?>"><span id="id_label_ponsel"><?php echo $this->nm_new_label['ponsel']; ?></span></TD>
    <TD class="scFormDataOdd css_ponsel_line" id="hidden_field_data_ponsel" style="<?php echo $sStyleHidden_ponsel; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ponsel_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ponsel"]) &&  $this->nmgp_cmp_readonly["ponsel"] == "on") { 

 ?>
<input type="hidden" name="ponsel" value="<?php echo $this->form_encode_input($ponsel) . "\">" . $ponsel . ""; ?>
<?php } else { ?>
<span id="id_read_on_ponsel" class="sc-ui-readonly-ponsel css_ponsel_line" style="<?php echo $sStyleReadLab_ponsel; ?>"><?php echo $this->ponsel; ?></span><span id="id_read_off_ponsel" class="css_read_off_ponsel" style="white-space: nowrap;<?php echo $sStyleReadInp_ponsel; ?>">
 <input class="sc-js-input scFormObjectOdd css_ponsel_obj" style="" id="id_sc_field_ponsel" type=text name="ponsel" value="<?php echo $this->form_encode_input($ponsel) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ponsel_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ponsel_text"></span></td></tr></table></td></tr></table></TD>
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
    <TD class="scFormDataOdd css_email_line" id="hidden_field_data_email" style="<?php echo $sStyleHidden_email; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email"]) &&  $this->nmgp_cmp_readonly["email"] == "on") { 

 ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">" . $email . ""; ?>
<?php } else { ?>
<span id="id_read_on_email" class="sc-ui-readonly-email css_email_line" style="<?php echo $sStyleReadLab_email; ?>"><?php echo $this->email; ?></span><span id="id_read_off_email" class="css_read_off_email" style="white-space: nowrap;<?php echo $sStyleReadInp_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_email_obj" style="" id="id_sc_field_email" type=text name="email" value="<?php echo $this->form_encode_input($email) ?>"
 size=50 maxlength=50 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.email.value != '') {window.open('mailto:' + document.F1.email.value); }", "if (document.F1.email.value != '') {window.open('mailto:' + document.F1.email.value); }", "email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
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
    if (!isset($this->nm_new_label['npwp']))
    {
        $this->nm_new_label['npwp'] = "NPWP";
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
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_npwp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_npwp_text"></span></td></tr></table></td></tr></table></TD>
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
  sc_change_tabs(iTabIndex == 10, 'hidden_bloco_10', 'id_tabs_2_10');
  if (iTabIndex == 10) {
    displayChange_block("10", "on");
  }
  sc_change_tabs(iTabIndex == 11, 'hidden_bloco_11', 'id_tabs_2_11');
  if (iTabIndex == 11) {
    displayChange_block("11", "on");
  }
  scQuickSearchInit(true, '');
}
</script>
<ul class="scTabLine">
<li id="id_tabs_2_2" class="scTabActive"><a href="javascript: sc_control_tabs_2(2)">Pendidikan Formal</a></li>
<li id="id_tabs_2_3" class="scTabInactive"><a href="javascript: sc_control_tabs_2(3)">Skill / Jabatan</a></li>
<li id="id_tabs_2_4" class="scTabInactive"><a href="javascript: sc_control_tabs_2(4)">Kontrak Kerja</a></li>
<li id="id_tabs_2_5" class="scTabInactive"><a href="javascript: sc_control_tabs_2(5)">Pengalaman & Pelatihan</a></li>
<li id="id_tabs_2_6" class="scTabInactive"><a href="javascript: sc_control_tabs_2(6)">Peringatan</a></li>
<li id="id_tabs_2_7" class="scTabInactive"><a href="javascript: sc_control_tabs_2(7)">Penilaian</a></li>
<li id="id_tabs_2_8" class="scTabInactive"><a href="javascript: sc_control_tabs_2(8)">Pembinaan</a></li>
<li id="id_tabs_2_9" class="scTabInactive"><a href="javascript: sc_control_tabs_2(9)">Ikatan Dinas</a></li>
<li id="id_tabs_2_10" class="scTabInactive"><a href="javascript: sc_control_tabs_2(10)">Penugasan</a></li>
<li id="id_tabs_2_11" class="scTabInactive"><a href="javascript: sc_control_tabs_2(11)">Penghargaan</a></li>
</ul>
<div style='clear:both'></div>
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pendidikan']))
    {
        $this->nm_new_label['pendidikan'] = "";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['pendidikan']) && $this->nmgp_cmp_hidden['pendidikan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pendidikan" value="<?php echo $this->form_encode_input($pendidikan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pendidikan_line" id="hidden_field_data_pendidikan" style="<?php echo $sStyleHidden_pendidikan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_pendidikan_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Pendidikan'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Pendidikan'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Pendidikan'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['foreign_key']['id_karyawan'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['where_filter'] = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['where_detal']  = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_karyawan']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init'] ]['form_hrm_pendidikan']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_hrm_karyawan_empty.htm' : $this->Ini->link_form_hrm_pendidikan_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_Pendidikan']) && 'nmsc_iframe_liga_form_hrm_pendidikan' != $this->Ini->sc_lig_target['C_@scinf_Pendidikan'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Pendidikan'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pendidikan_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Pendidikan'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_hrm_pendidikan"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_hrm_pendidikan"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pendidikan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pendidikan_text"></span></td></tr></table></td></tr></table> </TD>
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
    if (!isset($this->nm_new_label['jabatan']))
    {
        $this->nm_new_label['jabatan'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jabatan = $this->jabatan;
   $sStyleHidden_jabatan = '';
   if (isset($this->nmgp_cmp_hidden['jabatan']) && $this->nmgp_cmp_hidden['jabatan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jabatan']);
       $sStyleHidden_jabatan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jabatan = 'display: none;';
   $sStyleReadInp_jabatan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jabatan']) && $this->nmgp_cmp_readonly['jabatan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jabatan']);
       $sStyleReadLab_jabatan = '';
       $sStyleReadInp_jabatan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jabatan']) && $this->nmgp_cmp_hidden['jabatan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jabatan" value="<?php echo $this->form_encode_input($jabatan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_jabatan_line" id="hidden_field_data_jabatan" style="<?php echo $sStyleHidden_jabatan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_jabatan_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Jabatan'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Jabatan'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Jabatan'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['foreign_key']['id_karyawan'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['where_filter'] = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['where_detal']  = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_karyawan']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init'] ]['form_hrm_jabatan_karyawan']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_hrm_karyawan_empty.htm' : $this->Ini->link_form_hrm_jabatan_karyawan_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_Jabatan']) && 'nmsc_iframe_liga_form_hrm_jabatan_karyawan' != $this->Ini->sc_lig_target['C_@scinf_Jabatan'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Jabatan'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_jabatan_karyawan_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Jabatan'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_hrm_jabatan_karyawan"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_hrm_jabatan_karyawan"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jabatan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jabatan_text"></span></td></tr></table></td></tr></table> </TD>
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
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['foreign_key']['id_karyawan'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['where_filter'] = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['where_detal']  = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_karyawan']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init'] ]['form_hrm_kontrak_kerja']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_hrm_karyawan_empty.htm' : $this->Ini->link_form_hrm_kontrak_kerja_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_sc_field_0']) && 'nmsc_iframe_liga_form_hrm_kontrak_kerja' != $this->Ini->sc_lig_target['C_@scinf_sc_field_0'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_kontrak_kerja_script_case_init']);
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
<iframe border="0" id="nmsc_iframe_liga_form_hrm_kontrak_kerja"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_hrm_kontrak_kerja"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
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
   <a name="bloco_5"></a>
<div id="div_hidden_bloco_5" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sc_field_1']))
    {
        $this->nm_new_label['sc_field_1'] = "Riwayat Pelatihan";
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
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_1'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_1'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_1'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['foreign_key']['kodekary'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['where_filter'] = "kodeKary = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['where_detal']  = "kodeKary = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_hrm_karyawan']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init'] ]['form_tbhrdinformal']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_hrm_karyawan_empty.htm' : $this->Ini->link_form_tbhrdinformal_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_sc_field_1']) && 'nmsc_iframe_liga_form_tbhrdinformal' != $this->Ini->sc_lig_target['C_@scinf_sc_field_1'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_sc_field_1'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_tbhrdinformal_script_case_init']);
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
   <a name="bloco_6"></a>
<div id="div_hidden_bloco_6" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_6" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['peringatan']))
    {
        $this->nm_new_label['peringatan'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $peringatan = $this->peringatan;
   $sStyleHidden_peringatan = '';
   if (isset($this->nmgp_cmp_hidden['peringatan']) && $this->nmgp_cmp_hidden['peringatan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['peringatan']);
       $sStyleHidden_peringatan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_peringatan = 'display: none;';
   $sStyleReadInp_peringatan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['peringatan']) && $this->nmgp_cmp_readonly['peringatan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['peringatan']);
       $sStyleReadLab_peringatan = '';
       $sStyleReadInp_peringatan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['peringatan']) && $this->nmgp_cmp_hidden['peringatan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="peringatan" value="<?php echo $this->form_encode_input($peringatan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_peringatan_line" id="hidden_field_data_peringatan" style="<?php echo $sStyleHidden_peringatan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_peringatan_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Peringatan'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Peringatan'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Peringatan'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['foreign_key']['id_karyawan'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['where_filter'] = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['where_detal']  = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_karyawan']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init'] ]['form_hrm_peringatan']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_hrm_karyawan_empty.htm' : $this->Ini->link_form_hrm_peringatan_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_Peringatan']) && 'nmsc_iframe_liga_form_hrm_peringatan' != $this->Ini->sc_lig_target['C_@scinf_Peringatan'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Peringatan'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_peringatan_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Peringatan'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_hrm_peringatan"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_hrm_peringatan"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_peringatan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_peringatan_text"></span></td></tr></table></td></tr></table> </TD>
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
    if (!isset($this->nm_new_label['penilaian']))
    {
        $this->nm_new_label['penilaian'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $penilaian = $this->penilaian;
   $sStyleHidden_penilaian = '';
   if (isset($this->nmgp_cmp_hidden['penilaian']) && $this->nmgp_cmp_hidden['penilaian'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['penilaian']);
       $sStyleHidden_penilaian = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_penilaian = 'display: none;';
   $sStyleReadInp_penilaian = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['penilaian']) && $this->nmgp_cmp_readonly['penilaian'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['penilaian']);
       $sStyleReadLab_penilaian = '';
       $sStyleReadInp_penilaian = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['penilaian']) && $this->nmgp_cmp_hidden['penilaian'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="penilaian" value="<?php echo $this->form_encode_input($penilaian) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_penilaian_line" id="hidden_field_data_penilaian" style="<?php echo $sStyleHidden_penilaian; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_penilaian_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Penilaian'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Penilaian'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Penilaian'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['foreign_key']['id_karyawan'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['where_filter'] = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['where_detal']  = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_karyawan']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init'] ]['form_hrm_penilaian']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_hrm_karyawan_empty.htm' : $this->Ini->link_form_hrm_penilaian_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_Penilaian']) && 'nmsc_iframe_liga_form_hrm_penilaian' != $this->Ini->sc_lig_target['C_@scinf_Penilaian'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Penilaian'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penilaian_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Penilaian'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_hrm_penilaian"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_hrm_penilaian"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_penilaian_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_penilaian_text"></span></td></tr></table></td></tr></table> </TD>
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
    if (!isset($this->nm_new_label['pembinaan']))
    {
        $this->nm_new_label['pembinaan'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pembinaan = $this->pembinaan;
   $sStyleHidden_pembinaan = '';
   if (isset($this->nmgp_cmp_hidden['pembinaan']) && $this->nmgp_cmp_hidden['pembinaan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pembinaan']);
       $sStyleHidden_pembinaan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pembinaan = 'display: none;';
   $sStyleReadInp_pembinaan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pembinaan']) && $this->nmgp_cmp_readonly['pembinaan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pembinaan']);
       $sStyleReadLab_pembinaan = '';
       $sStyleReadInp_pembinaan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pembinaan']) && $this->nmgp_cmp_hidden['pembinaan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pembinaan" value="<?php echo $this->form_encode_input($pembinaan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pembinaan_line" id="hidden_field_data_pembinaan" style="<?php echo $sStyleHidden_pembinaan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_pembinaan_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Pembinaan'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Pembinaan'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Pembinaan'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['foreign_key']['id_karyawan'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['where_filter'] = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['where_detal']  = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_karyawan']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init'] ]['form_hrm_pembinaan']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_hrm_karyawan_empty.htm' : $this->Ini->link_form_hrm_pembinaan_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_Pembinaan']) && 'nmsc_iframe_liga_form_hrm_pembinaan' != $this->Ini->sc_lig_target['C_@scinf_Pembinaan'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Pembinaan'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_pembinaan_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Pembinaan'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_hrm_pembinaan"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_hrm_pembinaan"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pembinaan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pembinaan_text"></span></td></tr></table></td></tr></table> </TD>
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
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_2'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_2'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_2'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['foreign_key']['id_karyawan'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['where_filter'] = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['where_detal']  = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_karyawan']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init'] ]['form_hrm_ikatan_dinas']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_hrm_karyawan_empty.htm' : $this->Ini->link_form_hrm_ikatan_dinas_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_sc_field_2']) && 'nmsc_iframe_liga_form_hrm_ikatan_dinas' != $this->Ini->sc_lig_target['C_@scinf_sc_field_2'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_sc_field_2'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_ikatan_dinas_script_case_init']);
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
<iframe border="0" id="nmsc_iframe_liga_form_hrm_ikatan_dinas"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_hrm_ikatan_dinas"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
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
   <a name="bloco_10"></a>
<div id="div_hidden_bloco_10" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_10" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['penugasan']))
    {
        $this->nm_new_label['penugasan'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $penugasan = $this->penugasan;
   $sStyleHidden_penugasan = '';
   if (isset($this->nmgp_cmp_hidden['penugasan']) && $this->nmgp_cmp_hidden['penugasan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['penugasan']);
       $sStyleHidden_penugasan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_penugasan = 'display: none;';
   $sStyleReadInp_penugasan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['penugasan']) && $this->nmgp_cmp_readonly['penugasan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['penugasan']);
       $sStyleReadLab_penugasan = '';
       $sStyleReadInp_penugasan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['penugasan']) && $this->nmgp_cmp_hidden['penugasan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="penugasan" value="<?php echo $this->form_encode_input($penugasan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_penugasan_line" id="hidden_field_data_penugasan" style="<?php echo $sStyleHidden_penugasan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_penugasan_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Penugasan'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Penugasan'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Penugasan'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['foreign_key']['id_karyawan'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['where_filter'] = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['where_detal']  = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_karyawan']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init'] ]['form_hrm_penugasan']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_hrm_karyawan_empty.htm' : $this->Ini->link_form_hrm_penugasan_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_Penugasan']) && 'nmsc_iframe_liga_form_hrm_penugasan' != $this->Ini->sc_lig_target['C_@scinf_Penugasan'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Penugasan'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penugasan_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Penugasan'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_hrm_penugasan"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_hrm_penugasan"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_penugasan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_penugasan_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_11"></a>
<div id="div_hidden_bloco_11" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_11" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['penghargaan']))
    {
        $this->nm_new_label['penghargaan'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $penghargaan = $this->penghargaan;
   $sStyleHidden_penghargaan = '';
   if (isset($this->nmgp_cmp_hidden['penghargaan']) && $this->nmgp_cmp_hidden['penghargaan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['penghargaan']);
       $sStyleHidden_penghargaan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_penghargaan = 'display: none;';
   $sStyleReadInp_penghargaan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['penghargaan']) && $this->nmgp_cmp_readonly['penghargaan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['penghargaan']);
       $sStyleReadLab_penghargaan = '';
       $sStyleReadInp_penghargaan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['penghargaan']) && $this->nmgp_cmp_hidden['penghargaan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="penghargaan" value="<?php echo $this->form_encode_input($penghargaan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_penghargaan_line" id="hidden_field_data_penghargaan" style="<?php echo $sStyleHidden_penghargaan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_penghargaan_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Penghargaan'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Penghargaan'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Penghargaan'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['foreign_key']['id_karyawan'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['where_filter'] = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['where_detal']  = "id_karyawan = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_karyawan']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init'] ]['form_hrm_penghargaan']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_hrm_karyawan_empty.htm' : $this->Ini->link_form_hrm_penghargaan_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_Penghargaan']) && 'nmsc_iframe_liga_form_hrm_penghargaan' != $this->Ini->sc_lig_target['C_@scinf_Penghargaan'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Penghargaan'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['form_hrm_penghargaan_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Penghargaan'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_hrm_penghargaan"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_hrm_penghargaan"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_penghargaan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_penghargaan_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8,9,10,11);
  $nm_sc_blocos_aba    = array(2 => 2,3 => 2,4 => 2,5 => 2,6 => 2,7 => 2,8 => 2,9 => 2,10 => 2,11 => 2);
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8,9,10,11);
  $nm_sc_blocos_aba    = array(2 => 2,3 => 2,4 => 2,5 => 2,6 => 2,7 => 2,8 => 2,9 => 2,10 => 2,11 => 2);
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_hrm_karyawan");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_hrm_karyawan");
 parent.scAjaxDetailHeight("form_hrm_karyawan", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_hrm_karyawan", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_hrm_karyawan", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_hrm_karyawan']['buttonStatus'] = $this->nmgp_botoes;
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
