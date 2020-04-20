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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Kamar Bersalin"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Kamar Bersalin"); } ?></TITLE>
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
.css_read_off_trandate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_anestime button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_intime button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_outtime button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_awalobs button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_akhirobs button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<style type="text/css">
	.sc.switch {
		position: relative;
		display: inline-flex;
	}

	.sc.switch span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.switch span {
		background: #DFDFDF;
		width: 22px;
		height: 14px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		padding: 0 3px;
		transition: all .2s linear;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.switch span:before {
		content: '\2713';
		display: inline-block;
		color: white;
		font-size: 10px;
		z-index: 0;
		position: absolute;
		top: 0;
		left: 4px;
	}

	.sc.switch span:after {
		content: '';
		background: white;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 1px;
		left: 1px;
		border-radius: 15px;
		transition: all .2s linear;
		z-index: 1;
	}

	.sc.switch input {
		margin-right: 10px;
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.switch input:disabled + span {
		opacity: 0.35;
	}

	.sc.switch input:checked + span {
		background: #66AFE9;
	}

	.sc.switch input:checked + span:after {
		left: calc(100% - 1px);
		transform: translateX(-100%);
	}

	.sc.radio {
		position: relative;
		display: inline-flex;
	}

	.sc.radio span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.radio span {
		background: #ffffff;
		border: 1px solid #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.radio span:after {
		content: '';
		background: #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		z-index: 1;
		transform: scale(0);
	}

	.sc.radio input {
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.radio input:disabled + span {
		opacity: 0.35;
	}

	.sc.radio input:checked + span {
		background: #66AFE9;
	}

	.sc.radio input:checked + span:after {
		transform: translateX(-100%);
		transform: scale(1);
	}
</style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbdetailvk/form_tbdetailvk_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbdetailvk_sajax_js.php");
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
     if (F_name == "trancode")
     {
        $('input[name="trancode"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="trancode"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="trancode"]').removeClass("scFormInputDisabled");
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
  }
 } // nm_field_disabled
<?php

include_once('form_tbdetailvk_jquery.php');

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

  $("#hidden_bloco_0,#hidden_bloco_1,#hidden_bloco_2,#hidden_bloco_3,#hidden_bloco_4").each(function() {
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
    "hidden_bloco_1": true,
    "hidden_bloco_2": true,
    "hidden_bloco_3": true,
    "hidden_bloco_4": true
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
    if ("hidden_bloco_5" == block_id) {
      scAjaxDetailHeight("form_tbtim", "600");
      if (typeof $("#nmsc_iframe_liga_form_tbtim")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbtim")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
    if ("hidden_bloco_6" == block_id) {
      scAjaxDetailHeight("form_tbdetailresepokvk", "500");
      if (typeof $("#nmsc_iframe_liga_form_tbdetailresepokvk")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbdetailresepokvk")[0].contentWindow.scQuickSearchInit(false, '');
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_tbdetailvk_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_tbdetailvk'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbdetailvk'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Kamar Bersalin"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Kamar Bersalin"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['fast_search'][2] : "";
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="25%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['birthtime']))
   {
       $this->nmgp_cmp_hidden['birthtime'] = 'off';
   }
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
      if ("hidden_bloco_5" == sTabId) {
        scAjaxDetailHeight("form_tbtim", "600");
        if (typeof $("#nmsc_iframe_liga_form_tbtim")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_tbtim")[0].contentWindow.scQuickSearchInit(false, '');
        }
      }
      if ("hidden_bloco_6" == sTabId) {
        scAjaxDetailHeight("form_tbdetailresepokvk", "500");
        if (typeof $("#nmsc_iframe_liga_form_tbdetailresepokvk")[0].contentWindow.scQuickSearchInit === "function") {
          $("#nmsc_iframe_liga_form_tbdetailresepokvk")[0].contentWindow.scQuickSearchInit(false, '');
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
   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>DATA PASIEN<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['inapcode']))
    {
        $this->nm_new_label['inapcode'] = "Kode Ranap";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   if ('novo' == $this->nmgp_opcao) {
       $this->nmgp_cmp_readonly['inapcode'] = 'on';
   }
   $inapcode = $this->inapcode;
   $sStyleHidden_inapcode = '';
   if (isset($this->nmgp_cmp_hidden['inapcode']) && $this->nmgp_cmp_hidden['inapcode'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['inapcode']);
       $sStyleHidden_inapcode = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_inapcode = 'display: none;';
   $sStyleReadInp_inapcode = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['inapcode']) && $this->nmgp_cmp_readonly['inapcode'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['inapcode']);
       $sStyleReadLab_inapcode = '';
       $sStyleReadInp_inapcode = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['inapcode']) && $this->nmgp_cmp_hidden['inapcode'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inapcode" value="<?php echo $this->form_encode_input($inapcode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_inapcode_label" id="hidden_field_label_inapcode" style="<?php echo $sStyleHidden_inapcode; ?>"><span id="id_label_inapcode"><?php echo $this->nm_new_label['inapcode']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['php_cmp_required']['inapcode']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['php_cmp_required']['inapcode'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_inapcode_line" id="hidden_field_data_inapcode" style="<?php echo $sStyleHidden_inapcode; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_inapcode_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inapcode"]) &&  $this->nmgp_cmp_readonly["inapcode"] == "on") { 

 ?>
<input type="hidden" name="inapcode" value="<?php echo $this->form_encode_input($inapcode) . "\">" . $inapcode . ""; ?>
<?php } else { ?>
<span id="id_read_on_inapcode" class="sc-ui-readonly-inapcode css_inapcode_line" style="<?php echo $sStyleReadLab_inapcode; ?>"><?php echo $this->inapcode; ?></span><span id="id_read_off_inapcode" class="css_read_off_inapcode" style="white-space: nowrap;<?php echo $sStyleReadInp_inapcode; ?>">
 <input class="sc-js-input scFormObjectOdd css_inapcode_obj" style="" id="id_sc_field_inapcode" type=text name="inapcode" value="<?php echo $this->form_encode_input($inapcode) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_tbdetailvk*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_select_adm_ranap"]) && $this->Ini->sc_lig_md5["grid_select_adm_ranap"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,inapcode,trancode*scoutnm_evt_ret_busca*scinsc_form_tbdetailvk_inapcode_onchange(this)*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_tbdetailvk@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,inapcode,trancode*scoutnm_evt_ret_busca*scinsc_form_tbdetailvk_inapcode_onchange(this)*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_select_adm_ranap_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_select_adm_ranap_cons_psq. "', '" . $Md5_Lig . "')", "cap_inapcode", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inapcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inapcode_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_trancode_label" id="hidden_field_label_trancode" style="<?php echo $sStyleHidden_trancode; ?>"><span id="id_label_trancode"><?php echo $this->nm_new_label['trancode']; ?></span></TD>
    <TD class="scFormDataOdd css_trancode_line" id="hidden_field_data_trancode" style="<?php echo $sStyleHidden_trancode; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_trancode_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["trancode"]) &&  $this->nmgp_cmp_readonly["trancode"] == "on") { 

 ?>
<input type="hidden" name="trancode" value="<?php echo $this->form_encode_input($trancode) . "\">" . $trancode . ""; ?>
<?php } else { ?>
<span id="id_read_on_trancode" class="sc-ui-readonly-trancode css_trancode_line" style="<?php echo $sStyleReadLab_trancode; ?>"><?php echo $this->trancode; ?></span><span id="id_read_off_trancode" class="css_read_off_trancode" style="white-space: nowrap;<?php echo $sStyleReadInp_trancode; ?>">
 <input class="sc-js-input scFormObjectOdd css_trancode_obj" style="" id="id_sc_field_trancode" type=text name="trancode" value="<?php echo $this->form_encode_input($trancode) ?>"
 size=11 maxlength=11 alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(auto)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trancode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trancode_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_custcode_label" id="hidden_field_label_custcode" style="<?php echo $sStyleHidden_custcode; ?>"><span id="id_label_custcode"><?php echo $this->nm_new_label['custcode']; ?></span></TD>
    <TD class="scFormDataOdd css_custcode_line" id="hidden_field_data_custcode" style="<?php echo $sStyleHidden_custcode; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_custcode_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["custcode"]) &&  $this->nmgp_cmp_readonly["custcode"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_custcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_custcode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_custcode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_custcode'] = array(); 
    }

   $old_value_birthdate = $this->birthdate;
   $old_value_birthdate_hora = $this->birthdate_hora;
   $old_value_birthtime = $this->birthtime;
   $old_value_bb = $this->bb;
   $old_value_tb = $this->tb;
   $old_value_lingkar = $this->lingkar;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_anestime = $this->anestime;
   $old_value_anestime_hora = $this->anestime_hora;
   $old_value_intime = $this->intime;
   $old_value_intime_hora = $this->intime_hora;
   $old_value_outtime = $this->outtime;
   $old_value_outtime_hora = $this->outtime_hora;
   $old_value_awalobs = $this->awalobs;
   $old_value_awalobs_hora = $this->awalobs_hora;
   $old_value_akhirobs = $this->akhirobs;
   $old_value_akhirobs_hora = $this->akhirobs_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_birthdate_hora = $this->birthdate_hora;
   $unformatted_value_birthtime = $this->birthtime;
   $unformatted_value_bb = $this->bb;
   $unformatted_value_tb = $this->tb;
   $unformatted_value_lingkar = $this->lingkar;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_anestime = $this->anestime;
   $unformatted_value_anestime_hora = $this->anestime_hora;
   $unformatted_value_intime = $this->intime;
   $unformatted_value_intime_hora = $this->intime_hora;
   $unformatted_value_outtime = $this->outtime;
   $unformatted_value_outtime_hora = $this->outtime_hora;
   $unformatted_value_awalobs = $this->awalobs;
   $unformatted_value_awalobs_hora = $this->awalobs_hora;
   $unformatted_value_akhirobs = $this->akhirobs;
   $unformatted_value_akhirobs_hora = $this->akhirobs_hora;

   $nm_comando = "SELECT custCode  FROM tbadmrawatinap  where tranCode = '$this->inapcode' ORDER BY custCode";

   $this->birthdate = $old_value_birthdate;
   $this->birthdate_hora = $old_value_birthdate_hora;
   $this->birthtime = $old_value_birthtime;
   $this->bb = $old_value_bb;
   $this->tb = $old_value_tb;
   $this->lingkar = $old_value_lingkar;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->anestime = $old_value_anestime;
   $this->anestime_hora = $old_value_anestime_hora;
   $this->intime = $old_value_intime;
   $this->intime_hora = $old_value_intime_hora;
   $this->outtime = $old_value_outtime;
   $this->outtime_hora = $old_value_outtime_hora;
   $this->awalobs = $old_value_awalobs;
   $this->awalobs_hora = $old_value_awalobs_hora;
   $this->akhirobs = $old_value_akhirobs;
   $this->akhirobs_hora = $old_value_akhirobs_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_custcode'][] = $rs->fields[0];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_custcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_custcode_text"></span></td></tr></table></td></tr></table></TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nama_label" id="hidden_field_label_nama" style="<?php echo $sStyleHidden_nama; ?>"><span id="id_label_nama"><?php echo $this->nm_new_label['nama']; ?></span></TD>
    <TD class="scFormDataOdd css_nama_line" id="hidden_field_data_nama" style="<?php echo $sStyleHidden_nama; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nama_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nama"]) &&  $this->nmgp_cmp_readonly["nama"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_nama']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_nama'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_nama']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_nama'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_nama']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_nama'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_nama']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_nama'] = array(); 
    }

   $old_value_birthdate = $this->birthdate;
   $old_value_birthdate_hora = $this->birthdate_hora;
   $old_value_birthtime = $this->birthtime;
   $old_value_bb = $this->bb;
   $old_value_tb = $this->tb;
   $old_value_lingkar = $this->lingkar;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_anestime = $this->anestime;
   $old_value_anestime_hora = $this->anestime_hora;
   $old_value_intime = $this->intime;
   $old_value_intime_hora = $this->intime_hora;
   $old_value_outtime = $this->outtime;
   $old_value_outtime_hora = $this->outtime_hora;
   $old_value_awalobs = $this->awalobs;
   $old_value_awalobs_hora = $this->awalobs_hora;
   $old_value_akhirobs = $this->akhirobs;
   $old_value_akhirobs_hora = $this->akhirobs_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_birthdate_hora = $this->birthdate_hora;
   $unformatted_value_birthtime = $this->birthtime;
   $unformatted_value_bb = $this->bb;
   $unformatted_value_tb = $this->tb;
   $unformatted_value_lingkar = $this->lingkar;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_anestime = $this->anestime;
   $unformatted_value_anestime_hora = $this->anestime_hora;
   $unformatted_value_intime = $this->intime;
   $unformatted_value_intime_hora = $this->intime_hora;
   $unformatted_value_outtime = $this->outtime;
   $unformatted_value_outtime_hora = $this->outtime_hora;
   $unformatted_value_awalobs = $this->awalobs;
   $unformatted_value_awalobs_hora = $this->awalobs_hora;
   $unformatted_value_akhirobs = $this->akhirobs;
   $unformatted_value_akhirobs_hora = $this->akhirobs_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,', ', salut)  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&', '&salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }

   $this->birthdate = $old_value_birthdate;
   $this->birthdate_hora = $old_value_birthdate_hora;
   $this->birthtime = $old_value_birthtime;
   $this->bb = $old_value_bb;
   $this->tb = $old_value_tb;
   $this->lingkar = $old_value_lingkar;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->anestime = $old_value_anestime;
   $this->anestime_hora = $old_value_anestime_hora;
   $this->intime = $old_value_intime;
   $this->intime_hora = $old_value_intime_hora;
   $this->outtime = $old_value_outtime;
   $this->outtime_hora = $old_value_outtime_hora;
   $this->awalobs = $old_value_awalobs;
   $this->awalobs_hora = $old_value_awalobs_hora;
   $this->akhirobs = $old_value_akhirobs;
   $this->akhirobs_hora = $old_value_akhirobs_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_nama'][] = $rs->fields[0];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nama_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nama_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['class']))
   {
       $this->nm_new_label['class'] = "Kelas";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $class = $this->class;
   $sStyleHidden_class = '';
   if (isset($this->nmgp_cmp_hidden['class']) && $this->nmgp_cmp_hidden['class'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['class']);
       $sStyleHidden_class = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_class = 'display: none;';
   $sStyleReadInp_class = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['class']) && $this->nmgp_cmp_readonly['class'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['class']);
       $sStyleReadLab_class = '';
       $sStyleReadInp_class = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['class']) && $this->nmgp_cmp_hidden['class'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="class" value="<?php echo $this->form_encode_input($this->class) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_class_label" id="hidden_field_label_class" style="<?php echo $sStyleHidden_class; ?>"><span id="id_label_class"><?php echo $this->nm_new_label['class']; ?></span></TD>
    <TD class="scFormDataOdd css_class_line" id="hidden_field_data_class" style="<?php echo $sStyleHidden_class; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_class_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["class"]) &&  $this->nmgp_cmp_readonly["class"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_class']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_class'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_class']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_class'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_class']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_class'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_class']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_class'] = array(); 
    }

   $old_value_birthdate = $this->birthdate;
   $old_value_birthdate_hora = $this->birthdate_hora;
   $old_value_birthtime = $this->birthtime;
   $old_value_bb = $this->bb;
   $old_value_tb = $this->tb;
   $old_value_lingkar = $this->lingkar;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_anestime = $this->anestime;
   $old_value_anestime_hora = $this->anestime_hora;
   $old_value_intime = $this->intime;
   $old_value_intime_hora = $this->intime_hora;
   $old_value_outtime = $this->outtime;
   $old_value_outtime_hora = $this->outtime_hora;
   $old_value_awalobs = $this->awalobs;
   $old_value_awalobs_hora = $this->awalobs_hora;
   $old_value_akhirobs = $this->akhirobs;
   $old_value_akhirobs_hora = $this->akhirobs_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_birthdate_hora = $this->birthdate_hora;
   $unformatted_value_birthtime = $this->birthtime;
   $unformatted_value_bb = $this->bb;
   $unformatted_value_tb = $this->tb;
   $unformatted_value_lingkar = $this->lingkar;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_anestime = $this->anestime;
   $unformatted_value_anestime_hora = $this->anestime_hora;
   $unformatted_value_intime = $this->intime;
   $unformatted_value_intime_hora = $this->intime_hora;
   $unformatted_value_outtime = $this->outtime;
   $unformatted_value_outtime_hora = $this->outtime_hora;
   $unformatted_value_awalobs = $this->awalobs;
   $unformatted_value_awalobs_hora = $this->awalobs_hora;
   $unformatted_value_akhirobs = $this->akhirobs;
   $unformatted_value_akhirobs_hora = $this->akhirobs_hora;

   $nm_comando = "SELECT kelas  FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY kelas";

   $this->birthdate = $old_value_birthdate;
   $this->birthdate_hora = $old_value_birthdate_hora;
   $this->birthtime = $old_value_birthtime;
   $this->bb = $old_value_bb;
   $this->tb = $old_value_tb;
   $this->lingkar = $old_value_lingkar;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->anestime = $old_value_anestime;
   $this->anestime_hora = $old_value_anestime_hora;
   $this->intime = $old_value_intime;
   $this->intime_hora = $old_value_intime_hora;
   $this->outtime = $old_value_outtime;
   $this->outtime_hora = $old_value_outtime_hora;
   $this->awalobs = $old_value_awalobs;
   $this->awalobs_hora = $old_value_awalobs_hora;
   $this->akhirobs = $old_value_akhirobs;
   $this->akhirobs_hora = $old_value_akhirobs_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_class'][] = $rs->fields[0];
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
   $class_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->class_1))
          {
              foreach ($this->class_1 as $tmp_class)
              {
                  if (trim($tmp_class) === trim($cadaselect[1])) { $class_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->class) === trim($cadaselect[1])) { $class_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="class" value="<?php echo $this->form_encode_input($class) . "\">" . $class_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_class();
   $x = 0 ; 
   $class_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->class_1))
          {
              foreach ($this->class_1 as $tmp_class)
              {
                  if (trim($tmp_class) === trim($cadaselect[1])) { $class_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->class) === trim($cadaselect[1])) { $class_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($class_look))
          {
              $class_look = $this->class;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_class\" class=\"css_class_line\" style=\"" .  $sStyleReadLab_class . "\">" . $this->form_encode_input($class_look) . "</span><span id=\"id_read_off_class\" class=\"css_read_off_class\" style=\"white-space: nowrap; " . $sStyleReadInp_class . "\">";
   echo " <span id=\"idAjaxSelect_class\"><select class=\"sc-js-input scFormObjectOdd css_class_obj\" style=\"\" id=\"id_sc_field_class\" name=\"class\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->class) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->class)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_class_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_class_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="25%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>PARTUS<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['babybirth']))
   {
       $this->nm_new_label['babybirth'] = "Partus ?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $babybirth = $this->babybirth;
   $sStyleHidden_babybirth = '';
   if (isset($this->nmgp_cmp_hidden['babybirth']) && $this->nmgp_cmp_hidden['babybirth'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['babybirth']);
       $sStyleHidden_babybirth = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_babybirth = 'display: none;';
   $sStyleReadInp_babybirth = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['babybirth']) && $this->nmgp_cmp_readonly['babybirth'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['babybirth']);
       $sStyleReadLab_babybirth = '';
       $sStyleReadInp_babybirth = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['babybirth']) && $this->nmgp_cmp_hidden['babybirth'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="babybirth" value="<?php echo $this->form_encode_input($this->babybirth) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->babybirth_1 = explode(";", trim($this->babybirth));
  } 
  else
  {
      if (empty($this->babybirth))
      {
          $this->babybirth_1= array(); 
          $this->babybirth= "0";
      } 
      else
      {
          $this->babybirth_1= $this->babybirth; 
          $this->babybirth= ""; 
          foreach ($this->babybirth_1 as $cada_babybirth)
          {
             if (!empty($babybirth))
             {
                 $this->babybirth.= ";"; 
             } 
             $this->babybirth.= $cada_babybirth; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_babybirth_label" id="hidden_field_label_babybirth" style="<?php echo $sStyleHidden_babybirth; ?>"><span id="id_label_babybirth"><?php echo $this->nm_new_label['babybirth']; ?></span></TD>
    <TD class="scFormDataOdd css_babybirth_line" id="hidden_field_data_babybirth" style="<?php echo $sStyleHidden_babybirth; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_babybirth_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["babybirth"]) &&  $this->nmgp_cmp_readonly["babybirth"] == "on") { 

$babybirth_look = "";
 if ($this->babybirth == "1") { $babybirth_look .= "Ya" ;} 
 if (empty($babybirth_look)) { $babybirth_look = $this->babybirth; }
?>
<input type="hidden" name="babybirth" value="<?php echo $this->form_encode_input($babybirth) . "\">" . $babybirth_look . ""; ?>
<?php } else { ?>

<?php

$babybirth_look = "";
 if ($this->babybirth == "1") { $babybirth_look .= "Ya" ;} 
 if (empty($babybirth_look)) { $babybirth_look = $this->babybirth; }
?>
<span id="id_read_on_babybirth" class="css_babybirth_line" style="<?php echo $sStyleReadLab_babybirth; ?>"><?php echo $this->form_encode_input($babybirth_look); ?></span><span id="id_read_off_babybirth" class="css_read_off_babybirth css_babybirth_line" style="<?php echo $sStyleReadInp_babybirth; ?>"><?php echo "<div id=\"idAjaxCheckbox_babybirth\" style=\"display: inline-block\" class=\"css_babybirth_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_babybirth_line"><?php $tempOptionId = "id-opt-babybirth" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-babybirth sc-ui-checkbox-babybirth" name="babybirth[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_babybirth'][] = '1'; ?>
<?php  if (in_array("1", $this->babybirth_1))  { echo " checked" ;} ?> onClick="do_ajax_form_tbdetailvk_event_babybirth_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>">Ya</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_babybirth_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_babybirth_text"></span></td></tr></table></td></tr></table></TD>
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
        $this->nm_new_label['birthdate'] = "Tgl. Lahir";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $birthdate = $this->birthdate;
   $birthdate_hora = $this->birthdate_hora;
   $guarda_datahora = $this->field_config['birthdate']['date_format'];
   $this->field_config['birthdate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_birthdate_hora_label" id="hidden_field_label_birthdate" style="<?php echo $sStyleHidden_birthdate; ?>"><span id="id_label_birthdate"><?php echo $this->nm_new_label['birthdate']; ?></span></TD>
    <TD class="scFormDataOdd css_birthdate_hora_line" id="hidden_field_data_birthdate" style="<?php echo $sStyleHidden_birthdate; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_birthdate_hora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["birthdate"]) &&  $this->nmgp_cmp_readonly["birthdate"] == "on") { 

 ?>
<input type="hidden" name="birthdate" value="<?php echo $this->form_encode_input($birthdate) . "\">" . $birthdate . ""; ?>
<?php } else { ?>
<span id="id_read_on_birthdate" class="sc-ui-readonly-birthdate css_birthdate_line" style="<?php echo $sStyleReadLab_birthdate; ?>"><?php echo $birthdate; ?></span><span id="id_read_off_birthdate" class="css_read_off_birthdate" style="white-space: nowrap;<?php echo $sStyleReadInp_birthdate; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_birthdate_obj" style="" id="id_sc_field_birthdate" type=text name="birthdate" value="<?php echo $this->form_encode_input($birthdate) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['birthdate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['birthdate']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['birthdate']['date_format'];
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


<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["birthdate_hora"]) &&  $this->nmgp_cmp_readonly["birthdate_hora"] == "on") { 

 ?>
<input type="hidden" name="birthdate_hora" value="<?php echo $this->form_encode_input($birthdate_hora) . "\">" . $birthdate_hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_birthdate_hora" class="sc-ui-readonly-birthdate_hora css_birthdate_hora_line" style="<?php echo $sStyleReadLab_birthdate; ?>"><?php echo $birthdate_hora; ?></span><span id="id_read_off_birthdate_hora" class="css_read_off_birthdate_hora" style="white-space: nowrap;<?php echo $sStyleReadInp_birthdate; ?>">
 <input class="sc-js-input scFormObjectOdd css_birthdate_hora_obj" style="" id="id_sc_field_birthdate_hora" type=text name="birthdate_hora" value="<?php echo $this->form_encode_input($birthdate_hora) ?>"
 size=18 alt="{datatype: 'time', dateSep: '<?php echo $this->field_config['birthdate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['birthdate']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', timeSep: '<?php echo $this->field_config['birthdate_hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['birthdate_hora']['date_format']; ?>'}" ><?php
$tmp_form_data = $this->field_config['birthdate_hora']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_birthdate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_birthdate_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['birthtime']))
    {
        $this->nm_new_label['birthtime'] = "Waktu Lahir";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $birthtime = $this->birthtime;
   if (!isset($this->nmgp_cmp_hidden['birthtime']))
   {
       $this->nmgp_cmp_hidden['birthtime'] = 'off';
   }
   $sStyleHidden_birthtime = '';
   if (isset($this->nmgp_cmp_hidden['birthtime']) && $this->nmgp_cmp_hidden['birthtime'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['birthtime']);
       $sStyleHidden_birthtime = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_birthtime = 'display: none;';
   $sStyleReadInp_birthtime = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['birthtime']) && $this->nmgp_cmp_readonly['birthtime'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['birthtime']);
       $sStyleReadLab_birthtime = '';
       $sStyleReadInp_birthtime = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['birthtime']) && $this->nmgp_cmp_hidden['birthtime'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="birthtime" value="<?php echo $this->form_encode_input($birthtime) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_birthtime_label" id="hidden_field_label_birthtime" style="<?php echo $sStyleHidden_birthtime; ?>"><span id="id_label_birthtime"><?php echo $this->nm_new_label['birthtime']; ?></span></TD>
    <TD class="scFormDataOdd css_birthtime_line" id="hidden_field_data_birthtime" style="<?php echo $sStyleHidden_birthtime; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_birthtime_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["birthtime"]) &&  $this->nmgp_cmp_readonly["birthtime"] == "on") { 

 ?>
<input type="hidden" name="birthtime" value="<?php echo $this->form_encode_input($birthtime) . "\">" . $birthtime . ""; ?>
<?php } else { ?>
<span id="id_read_on_birthtime" class="sc-ui-readonly-birthtime css_birthtime_line" style="<?php echo $sStyleReadLab_birthtime; ?>"><?php echo $birthtime; ?></span><span id="id_read_off_birthtime" class="css_read_off_birthtime" style="white-space: nowrap;<?php echo $sStyleReadInp_birthtime; ?>">
 <input class="sc-js-input scFormObjectOdd css_birthtime_obj" style="" id="id_sc_field_birthtime" type=text name="birthtime" value="<?php echo $this->form_encode_input($birthtime) ?>"
 size=10 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['birthtime']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['birthtime']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['birthtime']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_birthtime_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_birthtime_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bb']))
    {
        $this->nm_new_label['bb'] = "BB";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bb = $this->bb;
   $sStyleHidden_bb = '';
   if (isset($this->nmgp_cmp_hidden['bb']) && $this->nmgp_cmp_hidden['bb'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bb']);
       $sStyleHidden_bb = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bb = 'display: none;';
   $sStyleReadInp_bb = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bb']) && $this->nmgp_cmp_readonly['bb'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bb']);
       $sStyleReadLab_bb = '';
       $sStyleReadInp_bb = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bb']) && $this->nmgp_cmp_hidden['bb'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bb" value="<?php echo $this->form_encode_input($bb) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_bb_label" id="hidden_field_label_bb" style="<?php echo $sStyleHidden_bb; ?>"><span id="id_label_bb"><?php echo $this->nm_new_label['bb']; ?></span></TD>
    <TD class="scFormDataOdd css_bb_line" id="hidden_field_data_bb" style="<?php echo $sStyleHidden_bb; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bb_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bb"]) &&  $this->nmgp_cmp_readonly["bb"] == "on") { 

 ?>
<input type="hidden" name="bb" value="<?php echo $this->form_encode_input($bb) . "\">" . $bb . ""; ?>
<?php } else { ?>
<span id="id_read_on_bb" class="sc-ui-readonly-bb css_bb_line" style="<?php echo $sStyleReadLab_bb; ?>"><?php echo $this->bb; ?></span><span id="id_read_off_bb" class="css_read_off_bb" style="white-space: nowrap;<?php echo $sStyleReadInp_bb; ?>">
 <input class="sc-js-input scFormObjectOdd css_bb_obj" style="" id="id_sc_field_bb" type=text name="bb" value="<?php echo $this->form_encode_input($bb) ?>"
 size=4 alt="{datatype: 'integer', maxLength: 4, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['bb']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['bb']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['bb']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_bb_label scFormDataHelpOdd">&nbsp;gr
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bb_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bb_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tb']))
    {
        $this->nm_new_label['tb'] = "PB";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tb = $this->tb;
   $sStyleHidden_tb = '';
   if (isset($this->nmgp_cmp_hidden['tb']) && $this->nmgp_cmp_hidden['tb'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tb']);
       $sStyleHidden_tb = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tb = 'display: none;';
   $sStyleReadInp_tb = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tb']) && $this->nmgp_cmp_readonly['tb'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tb']);
       $sStyleReadLab_tb = '';
       $sStyleReadInp_tb = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tb']) && $this->nmgp_cmp_hidden['tb'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tb" value="<?php echo $this->form_encode_input($tb) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tb_label" id="hidden_field_label_tb" style="<?php echo $sStyleHidden_tb; ?>"><span id="id_label_tb"><?php echo $this->nm_new_label['tb']; ?></span></TD>
    <TD class="scFormDataOdd css_tb_line" id="hidden_field_data_tb" style="<?php echo $sStyleHidden_tb; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tb_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tb"]) &&  $this->nmgp_cmp_readonly["tb"] == "on") { 

 ?>
<input type="hidden" name="tb" value="<?php echo $this->form_encode_input($tb) . "\">" . $tb . ""; ?>
<?php } else { ?>
<span id="id_read_on_tb" class="sc-ui-readonly-tb css_tb_line" style="<?php echo $sStyleReadLab_tb; ?>"><?php echo $this->tb; ?></span><span id="id_read_off_tb" class="css_read_off_tb" style="white-space: nowrap;<?php echo $sStyleReadInp_tb; ?>">
 <input class="sc-js-input scFormObjectOdd css_tb_obj" style="" id="id_sc_field_tb" type=text name="tb" value="<?php echo $this->form_encode_input($tb) ?>"
 size=4 alt="{datatype: 'decimal', maxLength: 4, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['tb']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tb']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tb']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tb']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_tb_label scFormDataHelpOdd">&nbsp;cm
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tb_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tb_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lingkar']))
    {
        $this->nm_new_label['lingkar'] = "L. Kepala Bayi";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lingkar = $this->lingkar;
   $sStyleHidden_lingkar = '';
   if (isset($this->nmgp_cmp_hidden['lingkar']) && $this->nmgp_cmp_hidden['lingkar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lingkar']);
       $sStyleHidden_lingkar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lingkar = 'display: none;';
   $sStyleReadInp_lingkar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lingkar']) && $this->nmgp_cmp_readonly['lingkar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lingkar']);
       $sStyleReadLab_lingkar = '';
       $sStyleReadInp_lingkar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lingkar']) && $this->nmgp_cmp_hidden['lingkar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lingkar" value="<?php echo $this->form_encode_input($lingkar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_lingkar_label" id="hidden_field_label_lingkar" style="<?php echo $sStyleHidden_lingkar; ?>"><span id="id_label_lingkar"><?php echo $this->nm_new_label['lingkar']; ?></span></TD>
    <TD class="scFormDataOdd css_lingkar_line" id="hidden_field_data_lingkar" style="<?php echo $sStyleHidden_lingkar; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lingkar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lingkar"]) &&  $this->nmgp_cmp_readonly["lingkar"] == "on") { 

 ?>
<input type="hidden" name="lingkar" value="<?php echo $this->form_encode_input($lingkar) . "\">" . $lingkar . ""; ?>
<?php } else { ?>
<span id="id_read_on_lingkar" class="sc-ui-readonly-lingkar css_lingkar_line" style="<?php echo $sStyleReadLab_lingkar; ?>"><?php echo $this->lingkar; ?></span><span id="id_read_off_lingkar" class="css_read_off_lingkar" style="white-space: nowrap;<?php echo $sStyleReadInp_lingkar; ?>">
 <input class="sc-js-input scFormObjectOdd css_lingkar_obj" style="" id="id_sc_field_lingkar" type=text name="lingkar" value="<?php echo $this->form_encode_input($lingkar) ?>"
 size=4 alt="{datatype: 'decimal', maxLength: 4, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['lingkar']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['lingkar']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['lingkar']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['lingkar']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_lingkar_label scFormDataHelpOdd">&nbsp;cm
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lingkar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lingkar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['hidup']))
   {
       $this->nm_new_label['hidup'] = "Kondisi";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hidup = $this->hidup;
   $sStyleHidden_hidup = '';
   if (isset($this->nmgp_cmp_hidden['hidup']) && $this->nmgp_cmp_hidden['hidup'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hidup']);
       $sStyleHidden_hidup = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hidup = 'display: none;';
   $sStyleReadInp_hidup = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hidup']) && $this->nmgp_cmp_readonly['hidup'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hidup']);
       $sStyleReadLab_hidup = '';
       $sStyleReadInp_hidup = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hidup']) && $this->nmgp_cmp_hidden['hidup'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="hidup" value="<?php echo $this->form_encode_input($this->hidup) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_hidup_label" id="hidden_field_label_hidup" style="<?php echo $sStyleHidden_hidup; ?>"><span id="id_label_hidup"><?php echo $this->nm_new_label['hidup']; ?></span></TD>
    <TD class="scFormDataOdd css_hidup_line" id="hidden_field_data_hidup" style="<?php echo $sStyleHidden_hidup; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hidup_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hidup"]) &&  $this->nmgp_cmp_readonly["hidup"] == "on") { 

$hidup_look = "";
 if ($this->hidup == "1") { $hidup_look .= "Hidup" ;} 
 if ($this->hidup == "0") { $hidup_look .= "Mati" ;} 
 if (empty($hidup_look)) { $hidup_look = $this->hidup; }
?>
<input type="hidden" name="hidup" value="<?php echo $this->form_encode_input($hidup) . "\">" . $hidup_look . ""; ?>
<?php } else { ?>
<?php

$hidup_look = "";
 if ($this->hidup == "1") { $hidup_look .= "Hidup" ;} 
 if ($this->hidup == "0") { $hidup_look .= "Mati" ;} 
 if (empty($hidup_look)) { $hidup_look = $this->hidup; }
?>
<span id="id_read_on_hidup" class="css_hidup_line"  style="<?php echo $sStyleReadLab_hidup; ?>"><?php echo $this->form_encode_input($hidup_look); ?></span><span id="id_read_off_hidup" class="css_read_off_hidup" style="white-space: nowrap; <?php echo $sStyleReadInp_hidup; ?>">
 <span id="idAjaxSelect_hidup"><select class="sc-js-input scFormObjectOdd css_hidup_obj" style="" id="id_sc_field_hidup" name="hidup" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_hidup'][] = ''; ?>
 <option value=""></option>
 <option  value="1" <?php  if ($this->hidup == "1") { echo " selected" ;} ?>>Hidup</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_hidup'][] = '1'; ?>
 <option  value="0" <?php  if ($this->hidup == "0") { echo " selected" ;} ?>>Mati</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_hidup'][] = '0'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hidup_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hidup_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="25%" height="">
   <a name="bloco_2"></a>
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>DIAG & PA<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['funcroom']))
    {
        $this->nm_new_label['funcroom'] = "Tindakan VK";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $funcroom = $this->funcroom;
   $sStyleHidden_funcroom = '';
   if (isset($this->nmgp_cmp_hidden['funcroom']) && $this->nmgp_cmp_hidden['funcroom'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['funcroom']);
       $sStyleHidden_funcroom = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_funcroom = 'display: none;';
   $sStyleReadInp_funcroom = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['funcroom']) && $this->nmgp_cmp_readonly['funcroom'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['funcroom']);
       $sStyleReadLab_funcroom = '';
       $sStyleReadInp_funcroom = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['funcroom']) && $this->nmgp_cmp_hidden['funcroom'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="funcroom" value="<?php echo $this->form_encode_input($funcroom) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_funcroom_label" id="hidden_field_label_funcroom" style="<?php echo $sStyleHidden_funcroom; ?>"><span id="id_label_funcroom"><?php echo $this->nm_new_label['funcroom']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['php_cmp_required']['funcroom']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['php_cmp_required']['funcroom'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_funcroom_line" id="hidden_field_data_funcroom" style="<?php echo $sStyleHidden_funcroom; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_funcroom_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["funcroom"]) &&  $this->nmgp_cmp_readonly["funcroom"] == "on") { 

 ?>
<input type="hidden" name="funcroom" value="<?php echo $this->form_encode_input($funcroom) . "\">" . $funcroom . ""; ?>
<?php } else { ?>
<span id="id_read_on_funcroom" class="sc-ui-readonly-funcroom css_funcroom_line" style="<?php echo $sStyleReadLab_funcroom; ?>"><?php echo $this->funcroom; ?></span><span id="id_read_off_funcroom" class="css_read_off_funcroom" style="white-space: nowrap;<?php echo $sStyleReadInp_funcroom; ?>">
 <input class="sc-js-input scFormObjectOdd css_funcroom_obj" style="" id="id_sc_field_funcroom" type=text name="funcroom" value="<?php echo $this->form_encode_input($funcroom) ?>"
 size=50 maxlength=35 alt="{datatype: 'text', maxLength: 35, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Mis. : PARTUS NORMAL', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_funcroom_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_funcroom_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diagpre']))
    {
        $this->nm_new_label['diagpre'] = "Diag. Pre Partum";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diagpre = $this->diagpre;
   $sStyleHidden_diagpre = '';
   if (isset($this->nmgp_cmp_hidden['diagpre']) && $this->nmgp_cmp_hidden['diagpre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diagpre']);
       $sStyleHidden_diagpre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diagpre = 'display: none;';
   $sStyleReadInp_diagpre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diagpre']) && $this->nmgp_cmp_readonly['diagpre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diagpre']);
       $sStyleReadLab_diagpre = '';
       $sStyleReadInp_diagpre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diagpre']) && $this->nmgp_cmp_hidden['diagpre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diagpre" value="<?php echo $this->form_encode_input($diagpre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_diagpre_label" id="hidden_field_label_diagpre" style="<?php echo $sStyleHidden_diagpre; ?>"><span id="id_label_diagpre"><?php echo $this->nm_new_label['diagpre']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['php_cmp_required']['diagpre']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['php_cmp_required']['diagpre'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_diagpre_line" id="hidden_field_data_diagpre" style="<?php echo $sStyleHidden_diagpre; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_diagpre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diagpre"]) &&  $this->nmgp_cmp_readonly["diagpre"] == "on") { 

 ?>
<input type="hidden" name="diagpre" value="<?php echo $this->form_encode_input($diagpre) . "\">" . $diagpre . ""; ?>
<?php } else { ?>
<span id="id_read_on_diagpre" class="sc-ui-readonly-diagpre css_diagpre_line" style="<?php echo $sStyleReadLab_diagpre; ?>"><?php echo $this->diagpre; ?></span><span id="id_read_off_diagpre" class="css_read_off_diagpre" style="white-space: nowrap;<?php echo $sStyleReadInp_diagpre; ?>">
 <input class="sc-js-input scFormObjectOdd css_diagpre_obj" style="" id="id_sc_field_diagpre" type=text name="diagpre" value="<?php echo $this->form_encode_input($diagpre) ?>"
 size=30 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diagpre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diagpre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diagpost']))
    {
        $this->nm_new_label['diagpost'] = "Diag. Post Partum";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diagpost = $this->diagpost;
   $sStyleHidden_diagpost = '';
   if (isset($this->nmgp_cmp_hidden['diagpost']) && $this->nmgp_cmp_hidden['diagpost'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diagpost']);
       $sStyleHidden_diagpost = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diagpost = 'display: none;';
   $sStyleReadInp_diagpost = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diagpost']) && $this->nmgp_cmp_readonly['diagpost'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diagpost']);
       $sStyleReadLab_diagpost = '';
       $sStyleReadInp_diagpost = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diagpost']) && $this->nmgp_cmp_hidden['diagpost'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diagpost" value="<?php echo $this->form_encode_input($diagpost) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_diagpost_label" id="hidden_field_label_diagpost" style="<?php echo $sStyleHidden_diagpost; ?>"><span id="id_label_diagpost"><?php echo $this->nm_new_label['diagpost']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['php_cmp_required']['diagpost']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['php_cmp_required']['diagpost'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_diagpost_line" id="hidden_field_data_diagpost" style="<?php echo $sStyleHidden_diagpost; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_diagpost_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diagpost"]) &&  $this->nmgp_cmp_readonly["diagpost"] == "on") { 

 ?>
<input type="hidden" name="diagpost" value="<?php echo $this->form_encode_input($diagpost) . "\">" . $diagpost . ""; ?>
<?php } else { ?>
<span id="id_read_on_diagpost" class="sc-ui-readonly-diagpost css_diagpost_line" style="<?php echo $sStyleReadLab_diagpost; ?>"><?php echo $this->diagpost; ?></span><span id="id_read_off_diagpost" class="css_read_off_diagpost" style="white-space: nowrap;<?php echo $sStyleReadInp_diagpost; ?>">
 <input class="sc-js-input scFormObjectOdd css_diagpost_obj" style="" id="id_sc_field_diagpost" type=text name="diagpost" value="<?php echo $this->form_encode_input($diagpost) ?>"
 size=30 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diagpost_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diagpost_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['pa']))
   {
       $this->nm_new_label['pa'] = "PA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pa = $this->pa;
   $sStyleHidden_pa = '';
   if (isset($this->nmgp_cmp_hidden['pa']) && $this->nmgp_cmp_hidden['pa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pa']);
       $sStyleHidden_pa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pa = 'display: none;';
   $sStyleReadInp_pa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pa']) && $this->nmgp_cmp_readonly['pa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pa']);
       $sStyleReadLab_pa = '';
       $sStyleReadInp_pa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pa']) && $this->nmgp_cmp_hidden['pa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pa" value="<?php echo $this->form_encode_input($this->pa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->pa_1 = explode(";", trim($this->pa));
  } 
  else
  {
      if (empty($this->pa))
      {
          $this->pa_1= array(); 
          $this->pa= "Tidak";
      } 
      else
      {
          $this->pa_1= $this->pa; 
          $this->pa= ""; 
          foreach ($this->pa_1 as $cada_pa)
          {
             if (!empty($pa))
             {
                 $this->pa.= ";"; 
             } 
             $this->pa.= $cada_pa; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pa_label" id="hidden_field_label_pa" style="<?php echo $sStyleHidden_pa; ?>"><span id="id_label_pa"><?php echo $this->nm_new_label['pa']; ?></span></TD>
    <TD class="scFormDataOdd css_pa_line" id="hidden_field_data_pa" style="<?php echo $sStyleHidden_pa; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pa_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pa"]) &&  $this->nmgp_cmp_readonly["pa"] == "on") { 

$pa_look = "";
 if ($this->pa == "Ya") { $pa_look .= "YA" ;} 
 if (empty($pa_look)) { $pa_look = $this->pa; }
?>
<input type="hidden" name="pa" value="<?php echo $this->form_encode_input($pa) . "\">" . $pa_look . ""; ?>
<?php } else { ?>

<?php

$pa_look = "";
 if ($this->pa == "Ya") { $pa_look .= "YA" ;} 
 if (empty($pa_look)) { $pa_look = $this->pa; }
?>
<span id="id_read_on_pa" class="css_pa_line" style="<?php echo $sStyleReadLab_pa; ?>"><?php echo $this->form_encode_input($pa_look); ?></span><span id="id_read_off_pa" class="css_read_off_pa css_pa_line" style="<?php echo $sStyleReadInp_pa; ?>"><?php echo "<div id=\"idAjaxCheckbox_pa\" style=\"display: inline-block\" class=\"css_pa_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_pa_line"><?php $tempOptionId = "id-opt-pa" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-pa sc-ui-checkbox-pa" name="pa[]" value="Ya"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_pa'][] = 'Ya'; ?>
<?php  if (in_array("Ya", $this->pa_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">YA</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pa_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['cito']))
   {
       $this->nm_new_label['cito'] = "Cito";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cito = $this->cito;
   $sStyleHidden_cito = '';
   if (isset($this->nmgp_cmp_hidden['cito']) && $this->nmgp_cmp_hidden['cito'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cito']);
       $sStyleHidden_cito = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cito = 'display: none;';
   $sStyleReadInp_cito = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cito']) && $this->nmgp_cmp_readonly['cito'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cito']);
       $sStyleReadLab_cito = '';
       $sStyleReadInp_cito = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cito']) && $this->nmgp_cmp_hidden['cito'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cito" value="<?php echo $this->form_encode_input($this->cito) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cito_label" id="hidden_field_label_cito" style="<?php echo $sStyleHidden_cito; ?>"><span id="id_label_cito"><?php echo $this->nm_new_label['cito']; ?></span></TD>
    <TD class="scFormDataOdd css_cito_line" id="hidden_field_data_cito" style="<?php echo $sStyleHidden_cito; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cito_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cito"]) &&  $this->nmgp_cmp_readonly["cito"] == "on") { 

$cito_look = "";
 if ($this->cito == "Non Cito") { $cito_look .= "Non Cito" ;} 
 if ($this->cito == "Cito Siang") { $cito_look .= "Cito Siang" ;} 
 if ($this->cito == "Cito Malam") { $cito_look .= "Cito Malam" ;} 
 if ($this->cito == "Cito Minggu") { $cito_look .= "Cito Minggu" ;} 
 if (empty($cito_look)) { $cito_look = $this->cito; }
?>
<input type="hidden" name="cito" value="<?php echo $this->form_encode_input($cito) . "\">" . $cito_look . ""; ?>
<?php } else { ?>
<?php

$cito_look = "";
 if ($this->cito == "Non Cito") { $cito_look .= "Non Cito" ;} 
 if ($this->cito == "Cito Siang") { $cito_look .= "Cito Siang" ;} 
 if ($this->cito == "Cito Malam") { $cito_look .= "Cito Malam" ;} 
 if ($this->cito == "Cito Minggu") { $cito_look .= "Cito Minggu" ;} 
 if (empty($cito_look)) { $cito_look = $this->cito; }
?>
<span id="id_read_on_cito" class="css_cito_line"  style="<?php echo $sStyleReadLab_cito; ?>"><?php echo $this->form_encode_input($cito_look); ?></span><span id="id_read_off_cito" class="css_read_off_cito" style="white-space: nowrap; <?php echo $sStyleReadInp_cito; ?>">
 <span id="idAjaxSelect_cito"><select class="sc-js-input scFormObjectOdd css_cito_obj" style="" id="id_sc_field_cito" name="cito" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="Non Cito" <?php  if ($this->cito == "Non Cito") { echo " selected" ;} ?><?php  if (empty($this->cito)) { echo " selected" ;} ?>>Non Cito</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_cito'][] = 'Non Cito'; ?>
 <option  value="Cito Siang" <?php  if ($this->cito == "Cito Siang") { echo " selected" ;} ?>>Cito Siang</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_cito'][] = 'Cito Siang'; ?>
 <option  value="Cito Malam" <?php  if ($this->cito == "Cito Malam") { echo " selected" ;} ?>>Cito Malam</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_cito'][] = 'Cito Malam'; ?>
 <option  value="Cito Minggu" <?php  if ($this->cito == "Cito Minggu") { echo " selected" ;} ?>>Cito Minggu</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_cito'][] = 'Cito Minggu'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cito_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cito_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="25%" height="">
   <a name="bloco_3"></a>
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf3\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>WAKTU<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['trandate']))
    {
        $this->nm_new_label['trandate'] = "Tgl. Transaksi";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_trandate = $this->trandate;
   if (strlen($this->trandate_hora) > 8 ) {$this->trandate_hora = substr($this->trandate_hora, 0, 8);}
   $this->trandate .= ' ' . $this->trandate_hora;
   $trandate = $this->trandate;
   $sStyleHidden_trandate = '';
   if (isset($this->nmgp_cmp_hidden['trandate']) && $this->nmgp_cmp_hidden['trandate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['trandate']);
       $sStyleHidden_trandate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_trandate = 'display: none;';
   $sStyleReadInp_trandate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['trandate']) && $this->nmgp_cmp_readonly['trandate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['trandate']);
       $sStyleReadLab_trandate = '';
       $sStyleReadInp_trandate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['trandate']) && $this->nmgp_cmp_hidden['trandate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="trandate" value="<?php echo $this->form_encode_input($trandate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_trandate_label" id="hidden_field_label_trandate" style="<?php echo $sStyleHidden_trandate; ?>"><span id="id_label_trandate"><?php echo $this->nm_new_label['trandate']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['php_cmp_required']['trandate']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['php_cmp_required']['trandate'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_trandate_line" id="hidden_field_data_trandate" style="<?php echo $sStyleHidden_trandate; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_trandate_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["trandate"]) &&  $this->nmgp_cmp_readonly["trandate"] == "on") { 

 ?>
<input type="hidden" name="trandate" value="<?php echo $this->form_encode_input($trandate) . "\">" . $trandate . ""; ?>
<?php } else { ?>
<span id="id_read_on_trandate" class="sc-ui-readonly-trandate css_trandate_line" style="<?php echo $sStyleReadLab_trandate; ?>"><?php echo $trandate; ?></span><span id="id_read_off_trandate" class="css_read_off_trandate" style="white-space: nowrap;<?php echo $sStyleReadInp_trandate; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_trandate_obj" style="" id="id_sc_field_trandate" type=text name="trandate" value="<?php echo $this->form_encode_input($trandate) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['trandate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['trandate']['date_format']; ?>', timeSep: '<?php echo $this->field_config['trandate']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['trandate']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trandate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trandate_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->trandate = $old_dt_trandate;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anestime']))
    {
        $this->nm_new_label['anestime'] = "Anastesi";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anestime = $this->anestime;
   $anestime_hora = $this->anestime_hora;
   $guarda_datahora = $this->field_config['anestime']['date_format'];
   $this->field_config['anestime']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
   $sStyleHidden_anestime = '';
   if (isset($this->nmgp_cmp_hidden['anestime']) && $this->nmgp_cmp_hidden['anestime'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anestime']);
       $sStyleHidden_anestime = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anestime = 'display: none;';
   $sStyleReadInp_anestime = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anestime']) && $this->nmgp_cmp_readonly['anestime'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anestime']);
       $sStyleReadLab_anestime = '';
       $sStyleReadInp_anestime = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anestime']) && $this->nmgp_cmp_hidden['anestime'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anestime" value="<?php echo $this->form_encode_input($anestime) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_anestime_hora_label" id="hidden_field_label_anestime" style="<?php echo $sStyleHidden_anestime; ?>"><span id="id_label_anestime"><?php echo $this->nm_new_label['anestime']; ?></span></TD>
    <TD class="scFormDataOdd css_anestime_hora_line" id="hidden_field_data_anestime" style="<?php echo $sStyleHidden_anestime; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anestime_hora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anestime"]) &&  $this->nmgp_cmp_readonly["anestime"] == "on") { 

 ?>
<input type="hidden" name="anestime" value="<?php echo $this->form_encode_input($anestime) . "\">" . $anestime . ""; ?>
<?php } else { ?>
<span id="id_read_on_anestime" class="sc-ui-readonly-anestime css_anestime_line" style="<?php echo $sStyleReadLab_anestime; ?>"><?php echo $anestime; ?></span><span id="id_read_off_anestime" class="css_read_off_anestime" style="white-space: nowrap;<?php echo $sStyleReadInp_anestime; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_anestime_obj" style="" id="id_sc_field_anestime" type=text name="anestime" value="<?php echo $this->form_encode_input($anestime) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['anestime']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['anestime']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['anestime']['date_format'];
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


<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anestime_hora"]) &&  $this->nmgp_cmp_readonly["anestime_hora"] == "on") { 

 ?>
<input type="hidden" name="anestime_hora" value="<?php echo $this->form_encode_input($anestime_hora) . "\">" . $anestime_hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_anestime_hora" class="sc-ui-readonly-anestime_hora css_anestime_hora_line" style="<?php echo $sStyleReadLab_anestime; ?>"><?php echo $anestime_hora; ?></span><span id="id_read_off_anestime_hora" class="css_read_off_anestime_hora" style="white-space: nowrap;<?php echo $sStyleReadInp_anestime; ?>">
 <input class="sc-js-input scFormObjectOdd css_anestime_hora_obj" style="" id="id_sc_field_anestime_hora" type=text name="anestime_hora" value="<?php echo $this->form_encode_input($anestime_hora) ?>"
 size=18 alt="{datatype: 'time', dateSep: '<?php echo $this->field_config['anestime']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['anestime']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', timeSep: '<?php echo $this->field_config['anestime_hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['anestime_hora']['date_format']; ?>'}" ><?php
$tmp_form_data = $this->field_config['anestime_hora']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anestime_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anestime_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['intime']))
    {
        $this->nm_new_label['intime'] = "Masuk VK";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $intime = $this->intime;
   $intime_hora = $this->intime_hora;
   $guarda_datahora = $this->field_config['intime']['date_format'];
   $this->field_config['intime']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
   $sStyleHidden_intime = '';
   if (isset($this->nmgp_cmp_hidden['intime']) && $this->nmgp_cmp_hidden['intime'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['intime']);
       $sStyleHidden_intime = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_intime = 'display: none;';
   $sStyleReadInp_intime = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['intime']) && $this->nmgp_cmp_readonly['intime'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['intime']);
       $sStyleReadLab_intime = '';
       $sStyleReadInp_intime = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['intime']) && $this->nmgp_cmp_hidden['intime'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="intime" value="<?php echo $this->form_encode_input($intime) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_intime_hora_label" id="hidden_field_label_intime" style="<?php echo $sStyleHidden_intime; ?>"><span id="id_label_intime"><?php echo $this->nm_new_label['intime']; ?></span></TD>
    <TD class="scFormDataOdd css_intime_hora_line" id="hidden_field_data_intime" style="<?php echo $sStyleHidden_intime; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_intime_hora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["intime"]) &&  $this->nmgp_cmp_readonly["intime"] == "on") { 

 ?>
<input type="hidden" name="intime" value="<?php echo $this->form_encode_input($intime) . "\">" . $intime . ""; ?>
<?php } else { ?>
<span id="id_read_on_intime" class="sc-ui-readonly-intime css_intime_line" style="<?php echo $sStyleReadLab_intime; ?>"><?php echo $intime; ?></span><span id="id_read_off_intime" class="css_read_off_intime" style="white-space: nowrap;<?php echo $sStyleReadInp_intime; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_intime_obj" style="" id="id_sc_field_intime" type=text name="intime" value="<?php echo $this->form_encode_input($intime) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['intime']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['intime']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['intime']['date_format'];
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


<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["intime_hora"]) &&  $this->nmgp_cmp_readonly["intime_hora"] == "on") { 

 ?>
<input type="hidden" name="intime_hora" value="<?php echo $this->form_encode_input($intime_hora) . "\">" . $intime_hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_intime_hora" class="sc-ui-readonly-intime_hora css_intime_hora_line" style="<?php echo $sStyleReadLab_intime; ?>"><?php echo $intime_hora; ?></span><span id="id_read_off_intime_hora" class="css_read_off_intime_hora" style="white-space: nowrap;<?php echo $sStyleReadInp_intime; ?>">
 <input class="sc-js-input scFormObjectOdd css_intime_hora_obj" style="" id="id_sc_field_intime_hora" type=text name="intime_hora" value="<?php echo $this->form_encode_input($intime_hora) ?>"
 size=18 alt="{datatype: 'time', dateSep: '<?php echo $this->field_config['intime']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['intime']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', timeSep: '<?php echo $this->field_config['intime_hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['intime_hora']['date_format']; ?>'}" ><?php
$tmp_form_data = $this->field_config['intime_hora']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_intime_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_intime_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['outtime']))
    {
        $this->nm_new_label['outtime'] = "Keluar VK";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $outtime = $this->outtime;
   $outtime_hora = $this->outtime_hora;
   $guarda_datahora = $this->field_config['outtime']['date_format'];
   $this->field_config['outtime']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
   $sStyleHidden_outtime = '';
   if (isset($this->nmgp_cmp_hidden['outtime']) && $this->nmgp_cmp_hidden['outtime'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['outtime']);
       $sStyleHidden_outtime = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_outtime = 'display: none;';
   $sStyleReadInp_outtime = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['outtime']) && $this->nmgp_cmp_readonly['outtime'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['outtime']);
       $sStyleReadLab_outtime = '';
       $sStyleReadInp_outtime = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['outtime']) && $this->nmgp_cmp_hidden['outtime'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="outtime" value="<?php echo $this->form_encode_input($outtime) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_outtime_hora_label" id="hidden_field_label_outtime" style="<?php echo $sStyleHidden_outtime; ?>"><span id="id_label_outtime"><?php echo $this->nm_new_label['outtime']; ?></span></TD>
    <TD class="scFormDataOdd css_outtime_hora_line" id="hidden_field_data_outtime" style="<?php echo $sStyleHidden_outtime; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_outtime_hora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["outtime"]) &&  $this->nmgp_cmp_readonly["outtime"] == "on") { 

 ?>
<input type="hidden" name="outtime" value="<?php echo $this->form_encode_input($outtime) . "\">" . $outtime . ""; ?>
<?php } else { ?>
<span id="id_read_on_outtime" class="sc-ui-readonly-outtime css_outtime_line" style="<?php echo $sStyleReadLab_outtime; ?>"><?php echo $outtime; ?></span><span id="id_read_off_outtime" class="css_read_off_outtime" style="white-space: nowrap;<?php echo $sStyleReadInp_outtime; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_outtime_obj" style="" id="id_sc_field_outtime" type=text name="outtime" value="<?php echo $this->form_encode_input($outtime) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['outtime']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['outtime']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['outtime']['date_format'];
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


<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["outtime_hora"]) &&  $this->nmgp_cmp_readonly["outtime_hora"] == "on") { 

 ?>
<input type="hidden" name="outtime_hora" value="<?php echo $this->form_encode_input($outtime_hora) . "\">" . $outtime_hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_outtime_hora" class="sc-ui-readonly-outtime_hora css_outtime_hora_line" style="<?php echo $sStyleReadLab_outtime; ?>"><?php echo $outtime_hora; ?></span><span id="id_read_off_outtime_hora" class="css_read_off_outtime_hora" style="white-space: nowrap;<?php echo $sStyleReadInp_outtime; ?>">
 <input class="sc-js-input scFormObjectOdd css_outtime_hora_obj" style="" id="id_sc_field_outtime_hora" type=text name="outtime_hora" value="<?php echo $this->form_encode_input($outtime_hora) ?>"
 size=18 alt="{datatype: 'time', dateSep: '<?php echo $this->field_config['outtime']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['outtime']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', timeSep: '<?php echo $this->field_config['outtime_hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['outtime_hora']['date_format']; ?>'}" ><?php
$tmp_form_data = $this->field_config['outtime_hora']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_outtime_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_outtime_text"></span></td></tr></table></td></tr></table></TD>
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
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="8" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf4\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>OBSERVASI<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['observasi']))
   {
       $this->nm_new_label['observasi'] = "Observasi";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $observasi = $this->observasi;
   $sStyleHidden_observasi = '';
   if (isset($this->nmgp_cmp_hidden['observasi']) && $this->nmgp_cmp_hidden['observasi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['observasi']);
       $sStyleHidden_observasi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_observasi = 'display: none;';
   $sStyleReadInp_observasi = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['observasi']) && $this->nmgp_cmp_readonly['observasi'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['observasi']);
       $sStyleReadLab_observasi = '';
       $sStyleReadInp_observasi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['observasi']) && $this->nmgp_cmp_hidden['observasi'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="observasi" value="<?php echo $this->form_encode_input($this->observasi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->observasi_1 = explode(";", trim($this->observasi));
  } 
  else
  {
      if (empty($this->observasi))
      {
          $this->observasi_1= array(); 
          $this->observasi= "0";
      } 
      else
      {
          $this->observasi_1= $this->observasi; 
          $this->observasi= ""; 
          foreach ($this->observasi_1 as $cada_observasi)
          {
             if (!empty($observasi))
             {
                 $this->observasi.= ";"; 
             } 
             $this->observasi.= $cada_observasi; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_observasi_label" id="hidden_field_label_observasi" style="<?php echo $sStyleHidden_observasi; ?>"><span id="id_label_observasi"><?php echo $this->nm_new_label['observasi']; ?></span></TD>
    <TD class="scFormDataOdd css_observasi_line" id="hidden_field_data_observasi" style="<?php echo $sStyleHidden_observasi; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observasi_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observasi"]) &&  $this->nmgp_cmp_readonly["observasi"] == "on") { 

$observasi_look = "";
 if ($this->observasi == "1") { $observasi_look .= "Ya" ;} 
 if (empty($observasi_look)) { $observasi_look = $this->observasi; }
?>
<input type="hidden" name="observasi" value="<?php echo $this->form_encode_input($observasi) . "\">" . $observasi_look . ""; ?>
<?php } else { ?>

<?php

$observasi_look = "";
 if ($this->observasi == "1") { $observasi_look .= "Ya" ;} 
 if (empty($observasi_look)) { $observasi_look = $this->observasi; }
?>
<span id="id_read_on_observasi" class="css_observasi_line" style="<?php echo $sStyleReadLab_observasi; ?>"><?php echo $this->form_encode_input($observasi_look); ?></span><span id="id_read_off_observasi" class="css_read_off_observasi css_observasi_line" style="<?php echo $sStyleReadInp_observasi; ?>"><?php echo "<div id=\"idAjaxCheckbox_observasi\" style=\"display: inline-block\" class=\"css_observasi_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_observasi_line"><?php $tempOptionId = "id-opt-observasi" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-observasi sc-ui-checkbox-observasi" name="observasi[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_observasi'][] = '1'; ?>
<?php  if (in_array("1", $this->observasi_1))  { echo " checked" ;} ?> onClick="do_ajax_form_tbdetailvk_event_observasi_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>">Ya</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observasi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observasi_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['tindobservasi']))
   {
       $this->nm_new_label['tindobservasi'] = "Tindakan Observasi";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tindobservasi = $this->tindobservasi;
   $sStyleHidden_tindobservasi = '';
   if (isset($this->nmgp_cmp_hidden['tindobservasi']) && $this->nmgp_cmp_hidden['tindobservasi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tindobservasi']);
       $sStyleHidden_tindobservasi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tindobservasi = 'display: none;';
   $sStyleReadInp_tindobservasi = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tindobservasi']) && $this->nmgp_cmp_readonly['tindobservasi'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tindobservasi']);
       $sStyleReadLab_tindobservasi = '';
       $sStyleReadInp_tindobservasi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tindobservasi']) && $this->nmgp_cmp_hidden['tindobservasi'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tindobservasi" value="<?php echo $this->form_encode_input($this->tindobservasi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tindobservasi_label" id="hidden_field_label_tindobservasi" style="<?php echo $sStyleHidden_tindobservasi; ?>"><span id="id_label_tindobservasi"><?php echo $this->nm_new_label['tindobservasi']; ?></span></TD>
    <TD class="scFormDataOdd css_tindobservasi_line" id="hidden_field_data_tindobservasi" style="<?php echo $sStyleHidden_tindobservasi; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tindobservasi_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tindobservasi"]) &&  $this->nmgp_cmp_readonly["tindobservasi"] == "on") { 

$tindobservasi_look = "";
 if ($this->tindobservasi == "OBSERVASI") { $tindobservasi_look .= "OBSERVASI" ;} 
 if (empty($tindobservasi_look)) { $tindobservasi_look = $this->tindobservasi; }
?>
<input type="hidden" name="tindobservasi" value="<?php echo $this->form_encode_input($tindobservasi) . "\">" . $tindobservasi_look . ""; ?>
<?php } else { ?>
<?php

$tindobservasi_look = "";
 if ($this->tindobservasi == "OBSERVASI") { $tindobservasi_look .= "OBSERVASI" ;} 
 if (empty($tindobservasi_look)) { $tindobservasi_look = $this->tindobservasi; }
?>
<span id="id_read_on_tindobservasi" class="css_tindobservasi_line"  style="<?php echo $sStyleReadLab_tindobservasi; ?>"><?php echo $this->form_encode_input($tindobservasi_look); ?></span><span id="id_read_off_tindobservasi" class="css_read_off_tindobservasi" style="white-space: nowrap; <?php echo $sStyleReadInp_tindobservasi; ?>">
 <span id="idAjaxSelect_tindobservasi"><select class="sc-js-input scFormObjectOdd css_tindobservasi_obj" style="" id="id_sc_field_tindobservasi" name="tindobservasi" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_tindobservasi'][] = ''; ?>
 <option value=""></option>
 <option  value="OBSERVASI" <?php  if ($this->tindobservasi == "OBSERVASI") { echo " selected" ;} ?>>OBSERVASI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['Lookup_tindobservasi'][] = 'OBSERVASI'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tindobservasi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tindobservasi_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['awalobs']))
    {
        $this->nm_new_label['awalobs'] = "Awal Observasi";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $awalobs = $this->awalobs;
   $awalobs_hora = $this->awalobs_hora;
   $guarda_datahora = $this->field_config['awalobs']['date_format'];
   $this->field_config['awalobs']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
   $sStyleHidden_awalobs = '';
   if (isset($this->nmgp_cmp_hidden['awalobs']) && $this->nmgp_cmp_hidden['awalobs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['awalobs']);
       $sStyleHidden_awalobs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_awalobs = 'display: none;';
   $sStyleReadInp_awalobs = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['awalobs']) && $this->nmgp_cmp_readonly['awalobs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['awalobs']);
       $sStyleReadLab_awalobs = '';
       $sStyleReadInp_awalobs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['awalobs']) && $this->nmgp_cmp_hidden['awalobs'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="awalobs" value="<?php echo $this->form_encode_input($awalobs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_awalobs_hora_label" id="hidden_field_label_awalobs" style="<?php echo $sStyleHidden_awalobs; ?>"><span id="id_label_awalobs"><?php echo $this->nm_new_label['awalobs']; ?></span></TD>
    <TD class="scFormDataOdd css_awalobs_hora_line" id="hidden_field_data_awalobs" style="<?php echo $sStyleHidden_awalobs; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_awalobs_hora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["awalobs"]) &&  $this->nmgp_cmp_readonly["awalobs"] == "on") { 

 ?>
<input type="hidden" name="awalobs" value="<?php echo $this->form_encode_input($awalobs) . "\">" . $awalobs . ""; ?>
<?php } else { ?>
<span id="id_read_on_awalobs" class="sc-ui-readonly-awalobs css_awalobs_line" style="<?php echo $sStyleReadLab_awalobs; ?>"><?php echo $awalobs; ?></span><span id="id_read_off_awalobs" class="css_read_off_awalobs" style="white-space: nowrap;<?php echo $sStyleReadInp_awalobs; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_awalobs_obj" style="" id="id_sc_field_awalobs" type=text name="awalobs" value="<?php echo $this->form_encode_input($awalobs) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['awalobs']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['awalobs']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['awalobs']['date_format'];
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


<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["awalobs_hora"]) &&  $this->nmgp_cmp_readonly["awalobs_hora"] == "on") { 

 ?>
<input type="hidden" name="awalobs_hora" value="<?php echo $this->form_encode_input($awalobs_hora) . "\">" . $awalobs_hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_awalobs_hora" class="sc-ui-readonly-awalobs_hora css_awalobs_hora_line" style="<?php echo $sStyleReadLab_awalobs; ?>"><?php echo $awalobs_hora; ?></span><span id="id_read_off_awalobs_hora" class="css_read_off_awalobs_hora" style="white-space: nowrap;<?php echo $sStyleReadInp_awalobs; ?>">
 <input class="sc-js-input scFormObjectOdd css_awalobs_hora_obj" style="" id="id_sc_field_awalobs_hora" type=text name="awalobs_hora" value="<?php echo $this->form_encode_input($awalobs_hora) ?>"
 size=18 alt="{datatype: 'time', dateSep: '<?php echo $this->field_config['awalobs']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['awalobs']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', timeSep: '<?php echo $this->field_config['awalobs_hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['awalobs_hora']['date_format']; ?>'}" ><?php
$tmp_form_data = $this->field_config['awalobs_hora']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_awalobs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_awalobs_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['akhirobs']))
    {
        $this->nm_new_label['akhirobs'] = "Akhir Observasi";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $akhirobs = $this->akhirobs;
   $akhirobs_hora = $this->akhirobs_hora;
   $guarda_datahora = $this->field_config['akhirobs']['date_format'];
   $this->field_config['akhirobs']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
   $sStyleHidden_akhirobs = '';
   if (isset($this->nmgp_cmp_hidden['akhirobs']) && $this->nmgp_cmp_hidden['akhirobs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['akhirobs']);
       $sStyleHidden_akhirobs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_akhirobs = 'display: none;';
   $sStyleReadInp_akhirobs = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['akhirobs']) && $this->nmgp_cmp_readonly['akhirobs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['akhirobs']);
       $sStyleReadLab_akhirobs = '';
       $sStyleReadInp_akhirobs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['akhirobs']) && $this->nmgp_cmp_hidden['akhirobs'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="akhirobs" value="<?php echo $this->form_encode_input($akhirobs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_akhirobs_hora_label" id="hidden_field_label_akhirobs" style="<?php echo $sStyleHidden_akhirobs; ?>"><span id="id_label_akhirobs"><?php echo $this->nm_new_label['akhirobs']; ?></span></TD>
    <TD class="scFormDataOdd css_akhirobs_hora_line" id="hidden_field_data_akhirobs" style="<?php echo $sStyleHidden_akhirobs; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_akhirobs_hora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["akhirobs"]) &&  $this->nmgp_cmp_readonly["akhirobs"] == "on") { 

 ?>
<input type="hidden" name="akhirobs" value="<?php echo $this->form_encode_input($akhirobs) . "\">" . $akhirobs . ""; ?>
<?php } else { ?>
<span id="id_read_on_akhirobs" class="sc-ui-readonly-akhirobs css_akhirobs_line" style="<?php echo $sStyleReadLab_akhirobs; ?>"><?php echo $akhirobs; ?></span><span id="id_read_off_akhirobs" class="css_read_off_akhirobs" style="white-space: nowrap;<?php echo $sStyleReadInp_akhirobs; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_akhirobs_obj" style="" id="id_sc_field_akhirobs" type=text name="akhirobs" value="<?php echo $this->form_encode_input($akhirobs) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['akhirobs']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['akhirobs']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['akhirobs']['date_format'];
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


<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["akhirobs_hora"]) &&  $this->nmgp_cmp_readonly["akhirobs_hora"] == "on") { 

 ?>
<input type="hidden" name="akhirobs_hora" value="<?php echo $this->form_encode_input($akhirobs_hora) . "\">" . $akhirobs_hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_akhirobs_hora" class="sc-ui-readonly-akhirobs_hora css_akhirobs_hora_line" style="<?php echo $sStyleReadLab_akhirobs; ?>"><?php echo $akhirobs_hora; ?></span><span id="id_read_off_akhirobs_hora" class="css_read_off_akhirobs_hora" style="white-space: nowrap;<?php echo $sStyleReadInp_akhirobs; ?>">
 <input class="sc-js-input scFormObjectOdd css_akhirobs_hora_obj" style="" id="id_sc_field_akhirobs_hora" type=text name="akhirobs_hora" value="<?php echo $this->form_encode_input($akhirobs_hora) ?>"
 size=18 alt="{datatype: 'time', dateSep: '<?php echo $this->field_config['akhirobs']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['akhirobs']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', timeSep: '<?php echo $this->field_config['akhirobs_hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['akhirobs_hora']['date_format']; ?>'}" ><?php
$tmp_form_data = $this->field_config['akhirobs_hora']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_akhirobs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_akhirobs_text"></span></td></tr></table></td></tr></table></TD>
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
   <a name="bloco_5"></a>
<script type="text/javascript">
function sc_control_tabs_5(iTabIndex)
{
  sc_change_tabs(iTabIndex == 5, 'hidden_bloco_5', 'id_tabs_5_5');
  if (iTabIndex == 5) {
    displayChange_block("5", "on");
  }
  sc_change_tabs(iTabIndex == 6, 'hidden_bloco_6', 'id_tabs_5_6');
  if (iTabIndex == 6) {
    displayChange_block("6", "on");
  }
  scQuickSearchInit(true, '');
}
</script>
<ul class="scTabLine">
<li id="id_tabs_5_5" class="scTabActive"><a href="javascript: sc_control_tabs_5(5)">TIM PERSALINAN</a></li>
<li id="id_tabs_5_6" class="scTabInactive"><a href="javascript: sc_control_tabs_5(6)">OBAT PERSALINAN</a></li>
</ul>
<div style='clear:both'></div>
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detailinsentif']))
    {
        $this->nm_new_label['detailinsentif'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detailinsentif = $this->detailinsentif;
   $sStyleHidden_detailinsentif = '';
   if (isset($this->nmgp_cmp_hidden['detailinsentif']) && $this->nmgp_cmp_hidden['detailinsentif'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detailinsentif']);
       $sStyleHidden_detailinsentif = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detailinsentif = 'display: none;';
   $sStyleReadInp_detailinsentif = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detailinsentif']) && $this->nmgp_cmp_readonly['detailinsentif'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detailinsentif']);
       $sStyleReadLab_detailinsentif = '';
       $sStyleReadInp_detailinsentif = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detailinsentif']) && $this->nmgp_cmp_hidden['detailinsentif'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detailinsentif" value="<?php echo $this->form_encode_input($detailinsentif) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detailinsentif_line" id="hidden_field_data_detailinsentif" style="<?php echo $sStyleHidden_detailinsentif; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detailinsentif_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detailInsentif'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detailInsentif'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detailInsentif'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['where_filter'] = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['where_detal']  = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbdetailvk']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init'] ]['form_tbtim']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tbdetailvk_empty.htm' : $this->Ini->link_form_tbtim_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y&sc_ifr_height=600';
if (isset($this->Ini->sc_lig_target['C_@scinf_detailInsentif']) && 'nmsc_iframe_liga_form_tbtim' != $this->Ini->sc_lig_target['C_@scinf_detailInsentif'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detailInsentif'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbtim_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_detailInsentif'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbtim"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="600" width="100%" name="nmsc_iframe_liga_form_tbtim"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detailinsentif_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detailinsentif_text"></span></td></tr></table></td></tr></table> </TD>
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
    if (!isset($this->nm_new_label['resepvk']))
    {
        $this->nm_new_label['resepvk'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $resepvk = $this->resepvk;
   $sStyleHidden_resepvk = '';
   if (isset($this->nmgp_cmp_hidden['resepvk']) && $this->nmgp_cmp_hidden['resepvk'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['resepvk']);
       $sStyleHidden_resepvk = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_resepvk = 'display: none;';
   $sStyleReadInp_resepvk = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['resepvk']) && $this->nmgp_cmp_readonly['resepvk'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['resepvk']);
       $sStyleReadLab_resepvk = '';
       $sStyleReadInp_resepvk = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['resepvk']) && $this->nmgp_cmp_hidden['resepvk'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="resepvk" value="<?php echo $this->form_encode_input($resepvk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_resepvk_line" id="hidden_field_data_resepvk" style="<?php echo $sStyleHidden_resepvk; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_resepvk_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_resepVK'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_resepVK'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_resepVK'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailvk']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init'] ]['form_tbdetailresepokvk']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tbdetailvk_empty.htm' : $this->Ini->link_form_tbdetailresepokvk_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y&sc_ifr_height=500';
if (isset($this->Ini->sc_lig_target['C_@scinf_resepVK']) && 'nmsc_iframe_liga_form_tbdetailresepokvk' != $this->Ini->sc_lig_target['C_@scinf_resepVK'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_resepVK'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['form_tbdetailresepokvk_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_resepVK'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbdetailresepokvk"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="100%" name="nmsc_iframe_liga_form_tbdetailresepokvk"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resepvk_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resepvk_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6);
  $nm_sc_blocos_aba    = array(5 => 5,6 => 5);
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6);
  $nm_sc_blocos_aba    = array(5 => 5,6 => 5);
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tbdetailvk");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbdetailvk");
 parent.scAjaxDetailHeight("form_tbdetailvk", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbdetailvk", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbdetailvk", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['buttonStatus'] = $this->nmgp_botoes;
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
