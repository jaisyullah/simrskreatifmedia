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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Admisi Rawat Inap"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Admisi Rawat Inap"); } ?></TITLE>
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
.css_read_off_tglmasuk button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbadmrawatinap/form_tbadmrawatinap_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbadmrawatinap_mob_sajax_js.php");
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
     }
     if (F_name == "custcode")
     {
        $('input[name="custcode"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="custcode"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="custcode"]').removeClass("scFormInputDisabled");
        }
        $('input[id="cap_custcode"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('#cap_custcode').hide();
        }
        else {
            $('#cap_custcode').show();
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
     if (F_name == "bed")
     {
        $('select[name="bed"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="bed"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="bed"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "provider")
     {
        $('input[name="provider_autocomp"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="provider_autocomp"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="provider_autocomp"]').removeClass("scFormInputDisabled");
        }
        $('input[id="provider_autocomp_cap"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('#provider_autocomp_cap').hide();
        }
        else {
            $('#provider_autocomp_cap').show();
        }
     }
     if (F_name == "idprovider")
     {
        $('input[name="idprovider"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="idprovider"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="idprovider"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "caramasuk")
     {
        $('select[name="caramasuk"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="caramasuk"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="caramasuk"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "unitasal")
     {
        $('select[name="unitasal"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="unitasal"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="unitasal"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "hotel")
     {
        $('input[name="hotel[]"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="hotel[]"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="hotel[]"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_tbadmrawatinap_mob_jquery.php');

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
      scAjaxDetailHeight("form_detailadm", $($("#nmsc_iframe_liga_form_detailadm")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_detailadm")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_detailadm")[0].contentWindow.scQuickSearchInit(false, '');
      }
      scAjaxDetailHeight("form_tbbillruang_adm", $($("#nmsc_iframe_liga_form_tbbillruang_adm")[0].contentWindow.document).innerHeight());
      if (typeof $("#nmsc_iframe_liga_form_tbbillruang_adm")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_tbbillruang_adm")[0].contentWindow.scQuickSearchInit(false, '');
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


  $(".sc-ui-autocomp-provider", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "provider" != sId ? sId.substr(8) : "";
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
   width: "250px",
   ajax: {
    url: "form_tbadmrawatinap_mob.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_provider",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "provider" != sId ? sId.substr(8) : "";
   sc_form_tbadmrawatinap_mob_provider_onfocus("id_sc_field_" + sId, sRow);
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_tbadmrawatinap']['error_buffer']) && '' != $_SESSION['scriptcase']['form_tbadmrawatinap']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_tbadmrawatinap']['error_buffer'];
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
 include_once("form_tbadmrawatinap_mob_js0.php");
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
               action="form_tbadmrawatinap_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_tbadmrawatinap_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbadmrawatinap_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Admisi Rawat Inap"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Admisi Rawat Inap"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['fast_search'][2] : "";
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-21", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-22", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-23", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-24", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['empty_filter'] = true;
       }
  }
?>
<script type="text/javascript">
var pag_ativa = "form_tbadmrawatinap_mob_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'form_tbadmrawatinap_mob_form0' => array(
            'title' => "Pendaftaran Rawat Inap",
            'class' => $nmgp_num_form == "form_tbadmrawatinap_mob_form0" ? "scTabActive" : "scTabInactive",
        ),
        'form_tbadmrawatinap_mob_form1' => array(
            'title' => "Biaya",
            'class' => $nmgp_num_form == "form_tbadmrawatinap_mob_form1" ? "scTabActive" : "scTabInactive",
        ),
    );
        if (!empty($this->Ini->nm_hidden_pages)) {
                foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                        if ('Pendaftaran Rawat Inap' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_tbadmrawatinap_mob_form0']['class'] = 'scTabInactive';
                        }
                        if ('Biaya' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_tbadmrawatinap_mob_form1']['class'] = 'scTabInactive';
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
    $css_celula = $this->tabCssClass["form_tbadmrawatinap_mob_form0"]['class'];
?>
   <li id="id_form_tbadmrawatinap_mob_form0" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_tbadmrawatinap_mob_form0')">
     Pendaftaran Rawat Inap
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_tbadmrawatinap_mob_form1"]['class'];
?>
   <li id="id_form_tbadmrawatinap_mob_form1" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_tbadmrawatinap_mob_form1')">
     Biaya
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_tbadmrawatinap_mob_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id']))
   {
       $this->nmgp_cmp_hidden['id'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['struckno']))
   {
       $this->nmgp_cmp_hidden['struckno'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['admision']))
   {
       $this->nmgp_cmp_hidden['admision'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Informasi Umum<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
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
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(auto)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trancode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trancode_text"></span></td></tr></table></td></tr></table> </TD>
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
        $this->nm_new_label['custcode'] = "No.RM";
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

    <TD class="scFormDataOdd css_custcode_line" id="hidden_field_data_custcode" style="<?php echo $sStyleHidden_custcode; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_custcode_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_custcode_label"><span id="id_label_custcode"><?php echo $this->nm_new_label['custcode']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['php_cmp_required']['custcode']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['php_cmp_required']['custcode'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["custcode"]) &&  $this->nmgp_cmp_readonly["custcode"] == "on") { 

 ?>
<input type="hidden" name="custcode" value="<?php echo $this->form_encode_input($custcode) . "\">" . $custcode . ""; ?>
<?php } else { ?>
<span id="id_read_on_custcode" class="sc-ui-readonly-custcode css_custcode_line" style="<?php echo $sStyleReadLab_custcode; ?>"><?php echo $this->custcode; ?></span><span id="id_read_off_custcode" class="css_read_off_custcode" style="white-space: nowrap;<?php echo $sStyleReadInp_custcode; ?>">
 <input class="sc-js-input scFormObjectOdd css_custcode_obj" style="" id="id_sc_field_custcode" type=text name="custcode" value="<?php echo $this->form_encode_input($custcode) ?>"
 size=6 maxlength=6 alt="{datatype: 'text', maxLength: 6, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_tbadmrawatinap_mob*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_tbcustomer"]) && $this->Ini->sc_lig_md5["grid_tbcustomer"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,custcode,custcode*scoutnm_evt_ret_busca*scinsc_form_tbadmrawatinap_custcode_onchange(this)*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_tbadmrawatinap_mob@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,custcode,custcode*scoutnm_evt_ret_busca*scinsc_form_tbadmrawatinap_custcode_onchange(this)*scout" . $Sc_iframe_master;
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

    <TD class="scFormDataOdd css_sc_field_0_line" id="hidden_field_data_sc_field_0" style="<?php echo $sStyleHidden_sc_field_0; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sc_field_0_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sc_field_0_label"><span id="id_label_sc_field_0"><?php echo $this->nm_new_label['sc_field_0']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_0"]) &&  $this->nmgp_cmp_readonly["sc_field_0"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_sc_field_0']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_sc_field_0']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_sc_field_0'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_sc_field_0']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_sc_field_0']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_sc_field_0'] = array(); 
    }

   $old_value_tglmasuk = $this->tglmasuk;
   $old_value_tglmasuk_hora = $this->tglmasuk_hora;
   $old_value_struckno = $this->struckno;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tglmasuk = $this->tglmasuk;
   $unformatted_value_tglmasuk_hora = $this->tglmasuk_hora;
   $unformatted_value_struckno = $this->struckno;
   $unformatted_value_id = $this->id;

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

   $this->tglmasuk = $old_value_tglmasuk;
   $this->tglmasuk_hora = $old_value_tglmasuk_hora;
   $this->struckno = $old_value_struckno;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_sc_field_0'][] = $rs->fields[0];
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
    if (!isset($this->nm_new_label['penjamin']))
    {
        $this->nm_new_label['penjamin'] = "Penjamin";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $penjamin = $this->penjamin;
   $sStyleHidden_penjamin = '';
   if (isset($this->nmgp_cmp_hidden['penjamin']) && $this->nmgp_cmp_hidden['penjamin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['penjamin']);
       $sStyleHidden_penjamin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_penjamin = 'display: none;';
   $sStyleReadInp_penjamin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['penjamin']) && $this->nmgp_cmp_readonly['penjamin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['penjamin']);
       $sStyleReadLab_penjamin = '';
       $sStyleReadInp_penjamin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['penjamin']) && $this->nmgp_cmp_hidden['penjamin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="penjamin" value="<?php echo $this->form_encode_input($penjamin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_penjamin_line" id="hidden_field_data_penjamin" style="<?php echo $sStyleHidden_penjamin; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_penjamin_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_penjamin_label"><span id="id_label_penjamin"><?php echo $this->nm_new_label['penjamin']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["penjamin"]) &&  $this->nmgp_cmp_readonly["penjamin"] == "on") { 

 ?>
<input type="hidden" name="penjamin" value="<?php echo $this->form_encode_input($penjamin) . "\">" . $penjamin . ""; ?>
<?php } else { ?>
<span id="id_read_on_penjamin" class="sc-ui-readonly-penjamin css_penjamin_line" style="<?php echo $sStyleReadLab_penjamin; ?>"><?php echo $this->penjamin; ?></span><span id="id_read_off_penjamin" class="css_read_off_penjamin" style="white-space: nowrap;<?php echo $sStyleReadInp_penjamin; ?>">
 <input class="sc-js-input scFormObjectOdd css_penjamin_obj" style="" id="id_sc_field_penjamin" type=text name="penjamin" value="<?php echo $this->form_encode_input($penjamin) ?>"
 size=35 maxlength=35 alt="{datatype: 'text', maxLength: 35, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_penjamin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_penjamin_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['hubpenjamin']))
   {
       $this->nm_new_label['hubpenjamin'] = "Hub Penjamin";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hubpenjamin = $this->hubpenjamin;
   $sStyleHidden_hubpenjamin = '';
   if (isset($this->nmgp_cmp_hidden['hubpenjamin']) && $this->nmgp_cmp_hidden['hubpenjamin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hubpenjamin']);
       $sStyleHidden_hubpenjamin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hubpenjamin = 'display: none;';
   $sStyleReadInp_hubpenjamin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hubpenjamin']) && $this->nmgp_cmp_readonly['hubpenjamin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hubpenjamin']);
       $sStyleReadLab_hubpenjamin = '';
       $sStyleReadInp_hubpenjamin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hubpenjamin']) && $this->nmgp_cmp_hidden['hubpenjamin'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="hubpenjamin" value="<?php echo $this->form_encode_input($this->hubpenjamin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hubpenjamin_line" id="hidden_field_data_hubpenjamin" style="<?php echo $sStyleHidden_hubpenjamin; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hubpenjamin_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hubpenjamin_label"><span id="id_label_hubpenjamin"><?php echo $this->nm_new_label['hubpenjamin']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hubpenjamin"]) &&  $this->nmgp_cmp_readonly["hubpenjamin"] == "on") { 

$hubpenjamin_look = "";
 if ($this->hubpenjamin == "AYAH") { $hubpenjamin_look .= "AYAH" ;} 
 if ($this->hubpenjamin == "IBU") { $hubpenjamin_look .= "IBU" ;} 
 if ($this->hubpenjamin == "ANAK") { $hubpenjamin_look .= "ANAK" ;} 
 if ($this->hubpenjamin == "SUAMI") { $hubpenjamin_look .= "SUAMI" ;} 
 if ($this->hubpenjamin == "ISTRI") { $hubpenjamin_look .= "ISTRI" ;} 
 if ($this->hubpenjamin == "SAUDARA KANDUNG") { $hubpenjamin_look .= "SAUDARA KANDUNG" ;} 
 if ($this->hubpenjamin == "SAUDARA TIDAK KANDUNG") { $hubpenjamin_look .= "SAUDARA TIDAK KANDUNG" ;} 
 if (empty($hubpenjamin_look)) { $hubpenjamin_look = $this->hubpenjamin; }
?>
<input type="hidden" name="hubpenjamin" value="<?php echo $this->form_encode_input($hubpenjamin) . "\">" . $hubpenjamin_look . ""; ?>
<?php } else { ?>
<?php

$hubpenjamin_look = "";
 if ($this->hubpenjamin == "AYAH") { $hubpenjamin_look .= "AYAH" ;} 
 if ($this->hubpenjamin == "IBU") { $hubpenjamin_look .= "IBU" ;} 
 if ($this->hubpenjamin == "ANAK") { $hubpenjamin_look .= "ANAK" ;} 
 if ($this->hubpenjamin == "SUAMI") { $hubpenjamin_look .= "SUAMI" ;} 
 if ($this->hubpenjamin == "ISTRI") { $hubpenjamin_look .= "ISTRI" ;} 
 if ($this->hubpenjamin == "SAUDARA KANDUNG") { $hubpenjamin_look .= "SAUDARA KANDUNG" ;} 
 if ($this->hubpenjamin == "SAUDARA TIDAK KANDUNG") { $hubpenjamin_look .= "SAUDARA TIDAK KANDUNG" ;} 
 if (empty($hubpenjamin_look)) { $hubpenjamin_look = $this->hubpenjamin; }
?>
<span id="id_read_on_hubpenjamin" class="css_hubpenjamin_line"  style="<?php echo $sStyleReadLab_hubpenjamin; ?>"><?php echo $this->form_encode_input($hubpenjamin_look); ?></span><span id="id_read_off_hubpenjamin" class="css_read_off_hubpenjamin" style="white-space: nowrap; <?php echo $sStyleReadInp_hubpenjamin; ?>">
 <span id="idAjaxSelect_hubpenjamin"><select class="sc-js-input scFormObjectOdd css_hubpenjamin_obj" style="" id="id_sc_field_hubpenjamin" name="hubpenjamin" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="AYAH" <?php  if ($this->hubpenjamin == "AYAH") { echo " selected" ;} ?>>AYAH</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_hubpenjamin'][] = 'AYAH'; ?>
 <option  value="IBU" <?php  if ($this->hubpenjamin == "IBU") { echo " selected" ;} ?>>IBU</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_hubpenjamin'][] = 'IBU'; ?>
 <option  value="ANAK" <?php  if ($this->hubpenjamin == "ANAK") { echo " selected" ;} ?>>ANAK</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_hubpenjamin'][] = 'ANAK'; ?>
 <option  value="SUAMI" <?php  if ($this->hubpenjamin == "SUAMI") { echo " selected" ;} ?>>SUAMI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_hubpenjamin'][] = 'SUAMI'; ?>
 <option  value="ISTRI" <?php  if ($this->hubpenjamin == "ISTRI") { echo " selected" ;} ?>>ISTRI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_hubpenjamin'][] = 'ISTRI'; ?>
 <option  value="SAUDARA KANDUNG" <?php  if ($this->hubpenjamin == "SAUDARA KANDUNG") { echo " selected" ;} ?>>SAUDARA KANDUNG</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_hubpenjamin'][] = 'SAUDARA KANDUNG'; ?>
 <option  value="SAUDARA TIDAK KANDUNG" <?php  if ($this->hubpenjamin == "SAUDARA TIDAK KANDUNG") { echo " selected" ;} ?>>SAUDARA TIDAK KANDUNG</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_hubpenjamin'][] = 'SAUDARA TIDAK KANDUNG'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hubpenjamin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hubpenjamin_text"></span></td></tr></table></td></tr></table> </TD>
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
 if ($this->status == "Daftar") { $status_look .= "Daftar" ;} 
 if ($this->status == "Pelayanan") { $status_look .= "Pelayanan" ;} 
 if ($this->status == "Batal") { $status_look .= "Batal" ;} 
 if (empty($status_look)) { $status_look = $this->status; }
?>
<input type="hidden" name="status" value="<?php echo $this->form_encode_input($status) . "\">" . $status_look . ""; ?>
<?php } else { ?>
<?php

$status_look = "";
 if ($this->status == "Daftar") { $status_look .= "Daftar" ;} 
 if ($this->status == "Pelayanan") { $status_look .= "Pelayanan" ;} 
 if ($this->status == "Batal") { $status_look .= "Batal" ;} 
 if (empty($status_look)) { $status_look = $this->status; }
?>
<span id="id_read_on_status" class="css_status_line"  style="<?php echo $sStyleReadLab_status; ?>"><?php echo $this->form_encode_input($status_look); ?></span><span id="id_read_off_status" class="css_read_off_status" style="white-space: nowrap; <?php echo $sStyleReadInp_status; ?>">
 <span id="idAjaxSelect_status"><select class="sc-js-input scFormObjectOdd css_status_obj" style="" id="id_sc_field_status" name="status" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="Daftar" <?php  if ($this->status == "Daftar") { echo " selected" ;} ?>>Daftar</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_status'][] = 'Daftar'; ?>
 <option  value="Pelayanan" <?php  if ($this->status == "Pelayanan") { echo " selected" ;} ?>>Pelayanan</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_status'][] = 'Pelayanan'; ?>
 <option  value="Batal" <?php  if ($this->status == "Batal") { echo " selected" ;} ?>>Batal</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_status'][] = 'Batal'; ?>
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
    if (!isset($this->nm_new_label['admision']))
    {
        $this->nm_new_label['admision'] = "Admision";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $admision = $this->admision;
   if (!isset($this->nmgp_cmp_hidden['admision']))
   {
       $this->nmgp_cmp_hidden['admision'] = 'off';
   }
   $sStyleHidden_admision = '';
   if (isset($this->nmgp_cmp_hidden['admision']) && $this->nmgp_cmp_hidden['admision'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['admision']);
       $sStyleHidden_admision = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_admision = 'display: none;';
   $sStyleReadInp_admision = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['admision']) && $this->nmgp_cmp_readonly['admision'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['admision']);
       $sStyleReadLab_admision = '';
       $sStyleReadInp_admision = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['admision']) && $this->nmgp_cmp_hidden['admision'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="admision" value="<?php echo $this->form_encode_input($admision) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_admision_line" id="hidden_field_data_admision" style="<?php echo $sStyleHidden_admision; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_admision_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_admision_label"><span id="id_label_admision"><?php echo $this->nm_new_label['admision']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["admision"]) &&  $this->nmgp_cmp_readonly["admision"] == "on") { 

 ?>
<input type="hidden" name="admision" value="<?php echo $this->form_encode_input($admision) . "\">" . $admision . ""; ?>
<?php } else { ?>
<span id="id_read_on_admision" class="sc-ui-readonly-admision css_admision_line" style="<?php echo $sStyleReadLab_admision; ?>"><?php echo $this->admision; ?></span><span id="id_read_off_admision" class="css_read_off_admision" style="white-space: nowrap;<?php echo $sStyleReadInp_admision; ?>">
 <input class="sc-js-input scFormObjectOdd css_admision_obj" style="" id="id_sc_field_admision" type=text name="admision" value="<?php echo $this->form_encode_input($admision) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_admision_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_admision_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_admision_dumb = ('' == $sStyleHidden_admision) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_admision_dumb" style="<?php echo $sStyleHidden_admision_dumb; ?>"></TD>
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
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Detail Kamar & Diag<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tglmasuk']))
    {
        $this->nm_new_label['tglmasuk'] = "Tgl Masuk";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tglmasuk = $this->tglmasuk;
   $tglmasuk_hora = $this->tglmasuk_hora;
   $guarda_datahora = $this->field_config['tglmasuk']['date_format'];
   $this->field_config['tglmasuk']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
   $sStyleHidden_tglmasuk = '';
   if (isset($this->nmgp_cmp_hidden['tglmasuk']) && $this->nmgp_cmp_hidden['tglmasuk'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tglmasuk']);
       $sStyleHidden_tglmasuk = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tglmasuk = 'display: none;';
   $sStyleReadInp_tglmasuk = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tglmasuk']) && $this->nmgp_cmp_readonly['tglmasuk'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tglmasuk']);
       $sStyleReadLab_tglmasuk = '';
       $sStyleReadInp_tglmasuk = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tglmasuk']) && $this->nmgp_cmp_hidden['tglmasuk'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tglmasuk" value="<?php echo $this->form_encode_input($tglmasuk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tglmasuk_hora_line" id="hidden_field_data_tglmasuk" style="<?php echo $sStyleHidden_tglmasuk; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tglmasuk_hora_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tglmasuk_label"><span id="id_label_tglmasuk"><?php echo $this->nm_new_label['tglmasuk']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['php_cmp_required']['tglmasuk']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['php_cmp_required']['tglmasuk'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tglmasuk"]) &&  $this->nmgp_cmp_readonly["tglmasuk"] == "on") { 

 ?>
<input type="hidden" name="tglmasuk" value="<?php echo $this->form_encode_input($tglmasuk) . "\">" . $tglmasuk . ""; ?>
<?php } else { ?>
<span id="id_read_on_tglmasuk" class="sc-ui-readonly-tglmasuk css_tglmasuk_line" style="<?php echo $sStyleReadLab_tglmasuk; ?>"><?php echo $tglmasuk; ?></span><span id="id_read_off_tglmasuk" class="css_read_off_tglmasuk" style="white-space: nowrap;<?php echo $sStyleReadInp_tglmasuk; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_tglmasuk_obj" style="" id="id_sc_field_tglmasuk" type=text name="tglmasuk" value="<?php echo $this->form_encode_input($tglmasuk) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['tglmasuk']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['tglmasuk']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', timeSep: '<?php echo $this->field_config['tglmasuk_hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['tglmasuk_hora']['date_format']; ?>'}" ></span>
<?php
$tmp_form_data = $this->field_config['tglmasuk']['date_format'];
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


<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tglmasuk_hora"]) &&  $this->nmgp_cmp_readonly["tglmasuk_hora"] == "on") { 

 ?>
<input type="hidden" name="tglmasuk_hora" value="<?php echo $this->form_encode_input($tglmasuk_hora) . "\">" . $tglmasuk_hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_tglmasuk_hora" class="sc-ui-readonly-tglmasuk_hora css_tglmasuk_hora_line" style="<?php echo $sStyleReadLab_tglmasuk; ?>"><?php echo $tglmasuk_hora; ?></span><span id="id_read_off_tglmasuk_hora" class="css_read_off_tglmasuk_hora" style="white-space: nowrap;<?php echo $sStyleReadInp_tglmasuk; ?>">
 <input class="sc-js-input scFormObjectOdd css_tglmasuk_hora_obj" style="" id="id_sc_field_tglmasuk_hora" type=text name="tglmasuk_hora" value="<?php echo $this->form_encode_input($tglmasuk_hora) ?>"
 size=18 alt="{datatype: 'time', dateSep: '<?php echo $this->field_config['tglmasuk']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['tglmasuk']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', timeSep: '<?php echo $this->field_config['tglmasuk_hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['tglmasuk_hora']['date_format']; ?>'}" ><?php
$tmp_form_data = $this->field_config['tglmasuk_hora']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tglmasuk_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tglmasuk_text"></span></td></tr></table></td></tr></table> </TD>
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

    <TD class="scFormDataOdd css_doctor_line" id="hidden_field_data_doctor" style="<?php echo $sStyleHidden_doctor; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doctor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_doctor_label"><span id="id_label_doctor"><?php echo $this->nm_new_label['doctor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doctor"]) &&  $this->nmgp_cmp_readonly["doctor"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_doctor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_doctor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_doctor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_doctor'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_doctor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_doctor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_doctor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_doctor'] = array(); 
    }

   $old_value_tglmasuk = $this->tglmasuk;
   $old_value_tglmasuk_hora = $this->tglmasuk_hora;
   $old_value_struckno = $this->struckno;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tglmasuk = $this->tglmasuk;
   $unformatted_value_tglmasuk_hora = $this->tglmasuk_hora;
   $unformatted_value_struckno = $this->struckno;
   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor where type = 'Dokter' ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT docCode, concat(gelar,' ', name,', ', spec)  FROM tbdoctor where type = 'Dokter' ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT docCode, gelar&' '&name&', '&spec  FROM tbdoctor where type = 'Dokter' ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor where type = 'Dokter' ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor where type = 'Dokter' ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor where type = 'Dokter' ORDER BY gelar, name, spec";
   }
   else
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor where type = 'Dokter' ORDER BY gelar, name, spec";
   }

   $this->tglmasuk = $old_value_tglmasuk;
   $this->tglmasuk_hora = $old_value_tglmasuk_hora;
   $this->struckno = $old_value_struckno;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_doctor'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_doctor'][] = ''; 
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
   if (!isset($this->nm_new_label['kelas']))
   {
       $this->nm_new_label['kelas'] = "Kelas Bayar";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kelas = $this->kelas;
   $sStyleHidden_kelas = '';
   if (isset($this->nmgp_cmp_hidden['kelas']) && $this->nmgp_cmp_hidden['kelas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kelas']);
       $sStyleHidden_kelas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kelas = 'display: none;';
   $sStyleReadInp_kelas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kelas']) && $this->nmgp_cmp_readonly['kelas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kelas']);
       $sStyleReadLab_kelas = '';
       $sStyleReadInp_kelas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kelas']) && $this->nmgp_cmp_hidden['kelas'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="kelas" value="<?php echo $this->form_encode_input($this->kelas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_kelas_line" id="hidden_field_data_kelas" style="<?php echo $sStyleHidden_kelas; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kelas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_kelas_label"><span id="id_label_kelas"><?php echo $this->nm_new_label['kelas']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['php_cmp_required']['kelas']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['php_cmp_required']['kelas'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kelas"]) &&  $this->nmgp_cmp_readonly["kelas"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_kelas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_kelas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_kelas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_kelas'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_kelas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_kelas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_kelas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_kelas'] = array(); 
    }

   $old_value_tglmasuk = $this->tglmasuk;
   $old_value_tglmasuk_hora = $this->tglmasuk_hora;
   $old_value_struckno = $this->struckno;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tglmasuk = $this->tglmasuk;
   $unformatted_value_tglmasuk_hora = $this->tglmasuk_hora;
   $unformatted_value_struckno = $this->struckno;
   $unformatted_value_id = $this->id;

   $hotel_val_str = "''";
   if (!empty($this->hotel))
   {
       if (is_array($this->hotel))
       {
           $Tmp_array = $this->hotel;
       }
       else
       {
           $Tmp_array = explode(";", $this->hotel);
       }
       $hotel_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $hotel_val_str)
          {
             $hotel_val_str .= ", ";
          }
          $hotel_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $waitinglist_val_str = "''";
   if (!empty($this->waitinglist))
   {
       if (is_array($this->waitinglist))
       {
           $Tmp_array = $this->waitinglist;
       }
       else
       {
           $Tmp_array = explode(";", $this->waitinglist);
       }
       $waitinglist_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $waitinglist_val_str)
          {
             $waitinglist_val_str .= ", ";
          }
          $waitinglist_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT      namaKelas, namaKelas FROM      tbkelas";

   $this->tglmasuk = $old_value_tglmasuk;
   $this->tglmasuk_hora = $old_value_tglmasuk_hora;
   $this->struckno = $old_value_struckno;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_kelas'][] = $rs->fields[0];
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
   $kelas_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->kelas_1))
          {
              foreach ($this->kelas_1 as $tmp_kelas)
              {
                  if (trim($tmp_kelas) === trim($cadaselect[1])) { $kelas_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->kelas) === trim($cadaselect[1])) { $kelas_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="kelas" value="<?php echo $this->form_encode_input($kelas) . "\">" . $kelas_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_kelas();
   $x = 0 ; 
   $kelas_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->kelas_1))
          {
              foreach ($this->kelas_1 as $tmp_kelas)
              {
                  if (trim($tmp_kelas) === trim($cadaselect[1])) { $kelas_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->kelas) === trim($cadaselect[1])) { $kelas_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($kelas_look))
          {
              $kelas_look = $this->kelas;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_kelas\" class=\"css_kelas_line\" style=\"" .  $sStyleReadLab_kelas . "\">" . $this->form_encode_input($kelas_look) . "</span><span id=\"id_read_off_kelas\" class=\"css_read_off_kelas\" style=\"white-space: nowrap; " . $sStyleReadInp_kelas . "\">";
   echo " <span id=\"idAjaxSelect_kelas\"><select class=\"sc-js-input scFormObjectOdd css_kelas_obj\" style=\"\" id=\"id_sc_field_kelas\" name=\"kelas\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_kelas'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->kelas) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->kelas)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kelas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kelas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['bed']))
   {
       $this->nm_new_label['bed'] = "Ruang / No. Bed";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bed = $this->bed;
   $sStyleHidden_bed = '';
   if (isset($this->nmgp_cmp_hidden['bed']) && $this->nmgp_cmp_hidden['bed'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bed']);
       $sStyleHidden_bed = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bed = 'display: none;';
   $sStyleReadInp_bed = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bed']) && $this->nmgp_cmp_readonly['bed'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bed']);
       $sStyleReadLab_bed = '';
       $sStyleReadInp_bed = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bed']) && $this->nmgp_cmp_hidden['bed'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="bed" value="<?php echo $this->form_encode_input($this->bed) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_bed_line" id="hidden_field_data_bed" style="<?php echo $sStyleHidden_bed; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bed_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_bed_label"><span id="id_label_bed"><?php echo $this->nm_new_label['bed']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['php_cmp_required']['bed']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['php_cmp_required']['bed'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bed"]) &&  $this->nmgp_cmp_readonly["bed"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_bed']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_bed'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_bed']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_bed'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_bed']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_bed'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_bed']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_bed'] = array(); 
    }

   $old_value_tglmasuk = $this->tglmasuk;
   $old_value_tglmasuk_hora = $this->tglmasuk_hora;
   $old_value_struckno = $this->struckno;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tglmasuk = $this->tglmasuk;
   $unformatted_value_tglmasuk_hora = $this->tglmasuk_hora;
   $unformatted_value_struckno = $this->struckno;
   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idBed, kelas + ' - ' + ruang + ' (Bed ' + noBed + ')'  FROM tbbed where custCode = '' ORDER BY ruang";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idBed, concat(kelas,' - ',ruang,' (Bed ',noBed,')')  FROM tbbed where custCode = '' ORDER BY ruang";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idBed, kelas&' - '&ruang&' (Bed '&noBed&')'  FROM tbbed where custCode = '' ORDER BY ruang";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idBed, kelas||' - '||ruang||' (Bed '||noBed||')'  FROM tbbed where custCode = '' ORDER BY ruang";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idBed, kelas + ' - ' + ruang + ' (Bed ' + noBed + ')'  FROM tbbed where custCode = '' ORDER BY ruang";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idBed, kelas||' - '||ruang||' (Bed '||noBed||')'  FROM tbbed where custCode = '' ORDER BY ruang";
   }
   else
   {
       $nm_comando = "SELECT idBed, kelas||' - '||ruang||' (Bed '||noBed||')'  FROM tbbed where custCode = '' ORDER BY ruang";
   }

   $this->tglmasuk = $old_value_tglmasuk;
   $this->tglmasuk_hora = $old_value_tglmasuk_hora;
   $this->struckno = $old_value_struckno;
   $this->id = $old_value_id;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_bed'][] = $rs->fields[0];
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
   $bed_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->bed_1))
          {
              foreach ($this->bed_1 as $tmp_bed)
              {
                  if (trim($tmp_bed) === trim($cadaselect[1])) { $bed_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->bed) === trim($cadaselect[1])) { $bed_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="bed" value="<?php echo $this->form_encode_input($bed) . "\">" . $bed_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_bed();
   $x = 0 ; 
   $bed_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->bed_1))
          {
              foreach ($this->bed_1 as $tmp_bed)
              {
                  if (trim($tmp_bed) === trim($cadaselect[1])) { $bed_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->bed) === trim($cadaselect[1])) { $bed_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($bed_look))
          {
              $bed_look = $this->bed;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_bed\" class=\"css_bed_line\" style=\"" .  $sStyleReadLab_bed . "\">" . $this->form_encode_input($bed_look) . "</span><span id=\"id_read_off_bed\" class=\"css_read_off_bed\" style=\"white-space: nowrap; " . $sStyleReadInp_bed . "\">";
   echo " <span id=\"idAjaxSelect_bed\"><select class=\"sc-js-input scFormObjectOdd css_bed_obj\" style=\"\" id=\"id_sc_field_bed\" name=\"bed\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_bed'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->bed) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->bed)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bed_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bed_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diagnosa1']))
    {
        $this->nm_new_label['diagnosa1'] = "Diagnosa Pre";
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

    <TD class="scFormDataOdd css_diagnosa1_line" id="hidden_field_data_diagnosa1" style="<?php echo $sStyleHidden_diagnosa1; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_diagnosa1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_diagnosa1_label"><span id="id_label_diagnosa1"><?php echo $this->nm_new_label['diagnosa1']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['php_cmp_required']['diagnosa1']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['php_cmp_required']['diagnosa1'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diagnosa1"]) &&  $this->nmgp_cmp_readonly["diagnosa1"] == "on") { 

 ?>
<input type="hidden" name="diagnosa1" value="<?php echo $this->form_encode_input($diagnosa1) . "\">" . $diagnosa1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_diagnosa1" class="sc-ui-readonly-diagnosa1 css_diagnosa1_line" style="<?php echo $sStyleReadLab_diagnosa1; ?>"><?php echo $this->diagnosa1; ?></span><span id="id_read_off_diagnosa1" class="css_read_off_diagnosa1" style="white-space: nowrap;<?php echo $sStyleReadInp_diagnosa1; ?>">
 <input class="sc-js-input scFormObjectOdd css_diagnosa1_obj" style="" id="id_sc_field_diagnosa1" type=text name="diagnosa1" value="<?php echo $this->form_encode_input($diagnosa1) ?>"
 size=30 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diagnosa1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diagnosa1_text"></span></td></tr></table></td></tr></table> </TD>
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
        $this->nm_new_label['struckno'] = "Struck No";
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
 size=15 alt="{datatype: 'integer', maxLength: 15, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['struckno']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['struckno']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['struckno']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_struckno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_struckno_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_struckno_dumb = ('' == $sStyleHidden_struckno) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_struckno_dumb" style="<?php echo $sStyleHidden_struckno_dumb; ?>"></TD>
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
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Penjamin & Lainnya<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['pembayaran']))
   {
       $this->nm_new_label['pembayaran'] = "Pembayaran";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pembayaran = $this->pembayaran;
   $sStyleHidden_pembayaran = '';
   if (isset($this->nmgp_cmp_hidden['pembayaran']) && $this->nmgp_cmp_hidden['pembayaran'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pembayaran']);
       $sStyleHidden_pembayaran = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pembayaran = 'display: none;';
   $sStyleReadInp_pembayaran = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pembayaran']) && $this->nmgp_cmp_readonly['pembayaran'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pembayaran']);
       $sStyleReadLab_pembayaran = '';
       $sStyleReadInp_pembayaran = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pembayaran']) && $this->nmgp_cmp_hidden['pembayaran'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pembayaran" value="<?php echo $this->form_encode_input($this->pembayaran) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pembayaran_line" id="hidden_field_data_pembayaran" style="<?php echo $sStyleHidden_pembayaran; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pembayaran_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pembayaran_label"><span id="id_label_pembayaran"><?php echo $this->nm_new_label['pembayaran']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['php_cmp_required']['pembayaran']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['php_cmp_required']['pembayaran'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pembayaran"]) &&  $this->nmgp_cmp_readonly["pembayaran"] == "on") { 

$pembayaran_look = "";
 if ($this->pembayaran == "UMUM") { $pembayaran_look .= "UMUM" ;} 
 if ($this->pembayaran == "ASURANSI") { $pembayaran_look .= "ASURANSI" ;} 
 if ($this->pembayaran == "BPJS") { $pembayaran_look .= "BPJS" ;} 
 if ($this->pembayaran == "BANSOS") { $pembayaran_look .= "BANSOS" ;} 
 if ($this->pembayaran == "JAMPERU") { $pembayaran_look .= "JAMPERU" ;} 
 if ($this->pembayaran == "TUNAI PAKET") { $pembayaran_look .= "TUNAI PAKET" ;} 
 if ($this->pembayaran == "TUNAI PROMO") { $pembayaran_look .= "TUNAI PROMO" ;} 
 if (empty($pembayaran_look)) { $pembayaran_look = $this->pembayaran; }
?>
<input type="hidden" name="pembayaran" value="<?php echo $this->form_encode_input($pembayaran) . "\">" . $pembayaran_look . ""; ?>
<?php } else { ?>
<?php

$pembayaran_look = "";
 if ($this->pembayaran == "UMUM") { $pembayaran_look .= "UMUM" ;} 
 if ($this->pembayaran == "ASURANSI") { $pembayaran_look .= "ASURANSI" ;} 
 if ($this->pembayaran == "BPJS") { $pembayaran_look .= "BPJS" ;} 
 if ($this->pembayaran == "BANSOS") { $pembayaran_look .= "BANSOS" ;} 
 if ($this->pembayaran == "JAMPERU") { $pembayaran_look .= "JAMPERU" ;} 
 if ($this->pembayaran == "TUNAI PAKET") { $pembayaran_look .= "TUNAI PAKET" ;} 
 if ($this->pembayaran == "TUNAI PROMO") { $pembayaran_look .= "TUNAI PROMO" ;} 
 if (empty($pembayaran_look)) { $pembayaran_look = $this->pembayaran; }
?>
<span id="id_read_on_pembayaran" class="css_pembayaran_line"  style="<?php echo $sStyleReadLab_pembayaran; ?>"><?php echo $this->form_encode_input($pembayaran_look); ?></span><span id="id_read_off_pembayaran" class="css_read_off_pembayaran" style="white-space: nowrap; <?php echo $sStyleReadInp_pembayaran; ?>">
 <span id="idAjaxSelect_pembayaran"><select class="sc-js-input scFormObjectOdd css_pembayaran_obj" style="" id="id_sc_field_pembayaran" name="pembayaran" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_pembayaran'][] = ''; ?>
 <option value=""></option>
 <option  value="UMUM" <?php  if ($this->pembayaran == "UMUM") { echo " selected" ;} ?><?php  if (empty($this->pembayaran)) { echo " selected" ;} ?>>UMUM</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_pembayaran'][] = 'UMUM'; ?>
 <option  value="ASURANSI" <?php  if ($this->pembayaran == "ASURANSI") { echo " selected" ;} ?>>ASURANSI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_pembayaran'][] = 'ASURANSI'; ?>
 <option  value="BPJS" <?php  if ($this->pembayaran == "BPJS") { echo " selected" ;} ?>>BPJS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_pembayaran'][] = 'BPJS'; ?>
 <option  value="BANSOS" <?php  if ($this->pembayaran == "BANSOS") { echo " selected" ;} ?>>BANSOS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_pembayaran'][] = 'BANSOS'; ?>
 <option  value="JAMPERU" <?php  if ($this->pembayaran == "JAMPERU") { echo " selected" ;} ?>>JAMPERU</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_pembayaran'][] = 'JAMPERU'; ?>
 <option  value="TUNAI PAKET" <?php  if ($this->pembayaran == "TUNAI PAKET") { echo " selected" ;} ?>>TUNAI PAKET</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_pembayaran'][] = 'TUNAI PAKET'; ?>
 <option  value="TUNAI PROMO" <?php  if ($this->pembayaran == "TUNAI PROMO") { echo " selected" ;} ?>>TUNAI PROMO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_pembayaran'][] = 'TUNAI PROMO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pembayaran_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pembayaran_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['paket']))
   {
       $this->nm_new_label['paket'] = "Paket";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $paket = $this->paket;
   $sStyleHidden_paket = '';
   if (isset($this->nmgp_cmp_hidden['paket']) && $this->nmgp_cmp_hidden['paket'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['paket']);
       $sStyleHidden_paket = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_paket = 'display: none;';
   $sStyleReadInp_paket = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['paket']) && $this->nmgp_cmp_readonly['paket'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['paket']);
       $sStyleReadLab_paket = '';
       $sStyleReadInp_paket = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['paket']) && $this->nmgp_cmp_hidden['paket'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="paket" value="<?php echo $this->form_encode_input($this->paket) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_paket_line" id="hidden_field_data_paket" style="<?php echo $sStyleHidden_paket; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_paket_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_paket_label"><span id="id_label_paket"><?php echo $this->nm_new_label['paket']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["paket"]) &&  $this->nmgp_cmp_readonly["paket"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_paket']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_paket'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_paket']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_paket'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_paket']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_paket'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_paket']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_paket'] = array(); 
    }

   $old_value_tglmasuk = $this->tglmasuk;
   $old_value_tglmasuk_hora = $this->tglmasuk_hora;
   $old_value_struckno = $this->struckno;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tglmasuk = $this->tglmasuk;
   $unformatted_value_tglmasuk_hora = $this->tglmasuk_hora;
   $unformatted_value_struckno = $this->struckno;
   $unformatted_value_id = $this->id;

   $hotel_val_str = "''";
   if (!empty($this->hotel))
   {
       if (is_array($this->hotel))
       {
           $Tmp_array = $this->hotel;
       }
       else
       {
           $Tmp_array = explode(";", $this->hotel);
       }
       $hotel_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $hotel_val_str)
          {
             $hotel_val_str .= ", ";
          }
          $hotel_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $waitinglist_val_str = "''";
   if (!empty($this->waitinglist))
   {
       if (is_array($this->waitinglist))
       {
           $Tmp_array = $this->waitinglist;
       }
       else
       {
           $Tmp_array = explode(";", $this->waitinglist);
       }
       $waitinglist_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $waitinglist_val_str)
          {
             $waitinglist_val_str .= ", ";
          }
          $waitinglist_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT id, kodePaket + ' - ' + namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT id, concat(kodePaket,' - ',namaPaket)  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT id, kodePaket&' - '&namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT id, kodePaket||' - '||namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT id, kodePaket + ' - ' + namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT id, kodePaket||' - '||namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   else
   {
       $nm_comando = "SELECT id, kodePaket||' - '||namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }

   $this->tglmasuk = $old_value_tglmasuk;
   $this->tglmasuk_hora = $old_value_tglmasuk_hora;
   $this->struckno = $old_value_struckno;
   $this->id = $old_value_id;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_paket'][] = $rs->fields[0];
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
   $paket_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->paket_1))
          {
              foreach ($this->paket_1 as $tmp_paket)
              {
                  if (trim($tmp_paket) === trim($cadaselect[1])) { $paket_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->paket) === trim($cadaselect[1])) { $paket_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="paket" value="<?php echo $this->form_encode_input($paket) . "\">" . $paket_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_paket();
   $x = 0 ; 
   $paket_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->paket_1))
          {
              foreach ($this->paket_1 as $tmp_paket)
              {
                  if (trim($tmp_paket) === trim($cadaselect[1])) { $paket_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->paket) === trim($cadaselect[1])) { $paket_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($paket_look))
          {
              $paket_look = $this->paket;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_paket\" class=\"css_paket_line\" style=\"" .  $sStyleReadLab_paket . "\">" . $this->form_encode_input($paket_look) . "</span><span id=\"id_read_off_paket\" class=\"css_read_off_paket\" style=\"white-space: nowrap; " . $sStyleReadInp_paket . "\">";
   echo " <span id=\"idAjaxSelect_paket\"><select class=\"sc-js-input scFormObjectOdd css_paket_obj\" style=\"\" id=\"id_sc_field_paket\" name=\"paket\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_paket'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->paket) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->paket)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_paket_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_paket_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['provider']))
    {
        $this->nm_new_label['provider'] = "Provider";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $provider = $this->provider;
   $sStyleHidden_provider = '';
   if (isset($this->nmgp_cmp_hidden['provider']) && $this->nmgp_cmp_hidden['provider'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['provider']);
       $sStyleHidden_provider = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_provider = 'display: none;';
   $sStyleReadInp_provider = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['provider']) && $this->nmgp_cmp_readonly['provider'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['provider']);
       $sStyleReadLab_provider = '';
       $sStyleReadInp_provider = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['provider']) && $this->nmgp_cmp_hidden['provider'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="provider" value="<?php echo $this->form_encode_input($provider) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_provider_line" id="hidden_field_data_provider" style="<?php echo $sStyleHidden_provider; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_provider_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_provider_label"><span id="id_label_provider"><?php echo $this->nm_new_label['provider']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["provider"]) &&  $this->nmgp_cmp_readonly["provider"] == "on") { 

 ?>
<input type="hidden" name="provider" value="<?php echo $this->form_encode_input($provider) . "\">" . $provider . ""; ?>
<?php } else { ?>

<?php
$aRecData['provider'] = $this->provider;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_provider']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_provider'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_provider']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_provider'] = array(); 
    }

   $old_value_tglmasuk = $this->tglmasuk;
   $old_value_tglmasuk_hora = $this->tglmasuk_hora;
   $old_value_struckno = $this->struckno;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tglmasuk = $this->tglmasuk;
   $unformatted_value_tglmasuk_hora = $this->tglmasuk_hora;
   $unformatted_value_struckno = $this->struckno;
   $unformatted_value_id = $this->id;

   $hotel_val_str = "''";
   if (!empty($this->hotel))
   {
       if (is_array($this->hotel))
       {
           $Tmp_array = $this->hotel;
       }
       else
       {
           $Tmp_array = explode(";", $this->hotel);
       }
       $hotel_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $hotel_val_str)
          {
             $hotel_val_str .= ", ";
          }
          $hotel_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $waitinglist_val_str = "''";
   if (!empty($this->waitinglist))
   {
       if (is_array($this->waitinglist))
       {
           $Tmp_array = $this->waitinglist;
       }
       else
       {
           $Tmp_array = explode(";", $this->waitinglist);
       }
       $waitinglist_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $waitinglist_val_str)
          {
             $waitinglist_val_str .= ", ";
          }
          $waitinglist_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT instCode, name FROM tbinstansi WHERE instCode = '" . substr($this->Db->qstr($this->provider), 1, -1) . "' ORDER BY name";

   $this->tglmasuk = $old_value_tglmasuk;
   $this->tglmasuk_hora = $old_value_tglmasuk_hora;
   $this->struckno = $old_value_struckno;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_provider'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->provider])) ? $aLookup[0][$this->provider] : $this->provider;
$provider_look = (isset($aLookup[0][$this->provider])) ? $aLookup[0][$this->provider] : $this->provider;
?>
<span id="id_read_on_provider" class="sc-ui-readonly-provider css_provider_line" style="<?php echo $sStyleReadLab_provider; ?>"><?php echo str_replace("<", "&lt;", $provider_look); ?></span><span id="id_read_off_provider" class="css_read_off_provider" style="white-space: nowrap;<?php echo $sStyleReadInp_provider; ?>">
 <input class="sc-js-input scFormObjectOdd css_provider_obj" style="display: none;" id="id_sc_field_provider" type=text name="provider" value="<?php echo $this->form_encode_input($provider) ?>"
 size=15 maxlength=15 style="display: none" alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['provider'] = $this->provider;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_provider']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_provider'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_provider']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_provider'] = array(); 
    }

   $old_value_tglmasuk = $this->tglmasuk;
   $old_value_tglmasuk_hora = $this->tglmasuk_hora;
   $old_value_struckno = $this->struckno;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tglmasuk = $this->tglmasuk;
   $unformatted_value_tglmasuk_hora = $this->tglmasuk_hora;
   $unformatted_value_struckno = $this->struckno;
   $unformatted_value_id = $this->id;

   $hotel_val_str = "''";
   if (!empty($this->hotel))
   {
       if (is_array($this->hotel))
       {
           $Tmp_array = $this->hotel;
       }
       else
       {
           $Tmp_array = explode(";", $this->hotel);
       }
       $hotel_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $hotel_val_str)
          {
             $hotel_val_str .= ", ";
          }
          $hotel_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $waitinglist_val_str = "''";
   if (!empty($this->waitinglist))
   {
       if (is_array($this->waitinglist))
       {
           $Tmp_array = $this->waitinglist;
       }
       else
       {
           $Tmp_array = explode(";", $this->waitinglist);
       }
       $waitinglist_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $waitinglist_val_str)
          {
             $waitinglist_val_str .= ", ";
          }
          $waitinglist_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT instCode, name FROM tbinstansi WHERE instCode = '" . substr($this->Db->qstr($this->provider), 1, -1) . "' ORDER BY name";

   $this->tglmasuk = $old_value_tglmasuk;
   $this->tglmasuk_hora = $old_value_tglmasuk_hora;
   $this->struckno = $old_value_struckno;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_provider'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->provider])) ? $aLookup[0][$this->provider] : '';
$provider_look = (isset($aLookup[0][$this->provider])) ? $aLookup[0][$this->provider] : '';
?>
<select id="id_ac_provider" class="scFormObjectOdd sc-ui-autocomp-provider css_provider_obj"><?php if ('' != $this->provider) { ?><option value="<?php echo $this->provider ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_provider_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_provider_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idprovider']))
    {
        $this->nm_new_label['idprovider'] = "No Peserta";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idprovider = $this->idprovider;
   $sStyleHidden_idprovider = '';
   if (isset($this->nmgp_cmp_hidden['idprovider']) && $this->nmgp_cmp_hidden['idprovider'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idprovider']);
       $sStyleHidden_idprovider = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idprovider = 'display: none;';
   $sStyleReadInp_idprovider = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idprovider']) && $this->nmgp_cmp_readonly['idprovider'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idprovider']);
       $sStyleReadLab_idprovider = '';
       $sStyleReadInp_idprovider = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idprovider']) && $this->nmgp_cmp_hidden['idprovider'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idprovider" value="<?php echo $this->form_encode_input($idprovider) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idprovider_line" id="hidden_field_data_idprovider" style="<?php echo $sStyleHidden_idprovider; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idprovider_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idprovider_label"><span id="id_label_idprovider"><?php echo $this->nm_new_label['idprovider']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idprovider"]) &&  $this->nmgp_cmp_readonly["idprovider"] == "on") { 

 ?>
<input type="hidden" name="idprovider" value="<?php echo $this->form_encode_input($idprovider) . "\">" . $idprovider . ""; ?>
<?php } else { ?>
<span id="id_read_on_idprovider" class="sc-ui-readonly-idprovider css_idprovider_line" style="<?php echo $sStyleReadLab_idprovider; ?>"><?php echo $this->idprovider; ?></span><span id="id_read_off_idprovider" class="css_read_off_idprovider" style="white-space: nowrap;<?php echo $sStyleReadInp_idprovider; ?>">
 <input class="sc-js-input scFormObjectOdd css_idprovider_obj" style="" id="id_sc_field_idprovider" type=text name="idprovider" value="<?php echo $this->form_encode_input($idprovider) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idprovider_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idprovider_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['caramasuk']))
   {
       $this->nm_new_label['caramasuk'] = "Cara Masuk";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $caramasuk = $this->caramasuk;
   $sStyleHidden_caramasuk = '';
   if (isset($this->nmgp_cmp_hidden['caramasuk']) && $this->nmgp_cmp_hidden['caramasuk'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['caramasuk']);
       $sStyleHidden_caramasuk = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_caramasuk = 'display: none;';
   $sStyleReadInp_caramasuk = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['caramasuk']) && $this->nmgp_cmp_readonly['caramasuk'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['caramasuk']);
       $sStyleReadLab_caramasuk = '';
       $sStyleReadInp_caramasuk = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['caramasuk']) && $this->nmgp_cmp_hidden['caramasuk'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="caramasuk" value="<?php echo $this->form_encode_input($this->caramasuk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_caramasuk_line" id="hidden_field_data_caramasuk" style="<?php echo $sStyleHidden_caramasuk; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_caramasuk_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_caramasuk_label"><span id="id_label_caramasuk"><?php echo $this->nm_new_label['caramasuk']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["caramasuk"]) &&  $this->nmgp_cmp_readonly["caramasuk"] == "on") { 

$caramasuk_look = "";
 if ($this->caramasuk == "BARU") { $caramasuk_look .= "BARU" ;} 
 if ($this->caramasuk == "IGD") { $caramasuk_look .= "IGD" ;} 
 if ($this->caramasuk == "RAWAT JALAN") { $caramasuk_look .= "RAWAT JALAN" ;} 
 if ($this->caramasuk == "RUJUKAN") { $caramasuk_look .= "RUJUKAN" ;} 
 if (empty($caramasuk_look)) { $caramasuk_look = $this->caramasuk; }
?>
<input type="hidden" name="caramasuk" value="<?php echo $this->form_encode_input($caramasuk) . "\">" . $caramasuk_look . ""; ?>
<?php } else { ?>
<?php

$caramasuk_look = "";
 if ($this->caramasuk == "BARU") { $caramasuk_look .= "BARU" ;} 
 if ($this->caramasuk == "IGD") { $caramasuk_look .= "IGD" ;} 
 if ($this->caramasuk == "RAWAT JALAN") { $caramasuk_look .= "RAWAT JALAN" ;} 
 if ($this->caramasuk == "RUJUKAN") { $caramasuk_look .= "RUJUKAN" ;} 
 if (empty($caramasuk_look)) { $caramasuk_look = $this->caramasuk; }
?>
<span id="id_read_on_caramasuk" class="css_caramasuk_line"  style="<?php echo $sStyleReadLab_caramasuk; ?>"><?php echo $this->form_encode_input($caramasuk_look); ?></span><span id="id_read_off_caramasuk" class="css_read_off_caramasuk" style="white-space: nowrap; <?php echo $sStyleReadInp_caramasuk; ?>">
 <span id="idAjaxSelect_caramasuk"><select class="sc-js-input scFormObjectOdd css_caramasuk_obj" style="" id="id_sc_field_caramasuk" name="caramasuk" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="BARU" <?php  if ($this->caramasuk == "BARU") { echo " selected" ;} ?><?php  if (empty($this->caramasuk)) { echo " selected" ;} ?>>BARU</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_caramasuk'][] = 'BARU'; ?>
 <option  value="IGD" <?php  if ($this->caramasuk == "IGD") { echo " selected" ;} ?>>IGD</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_caramasuk'][] = 'IGD'; ?>
 <option  value="RAWAT JALAN" <?php  if ($this->caramasuk == "RAWAT JALAN") { echo " selected" ;} ?>>RAWAT JALAN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_caramasuk'][] = 'RAWAT JALAN'; ?>
 <option  value="RUJUKAN" <?php  if ($this->caramasuk == "RUJUKAN") { echo " selected" ;} ?>>RUJUKAN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_caramasuk'][] = 'RUJUKAN'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_caramasuk_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_caramasuk_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['unitasal']))
   {
       $this->nm_new_label['unitasal'] = "Struk Poli / IGD";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unitasal = $this->unitasal;
   $sStyleHidden_unitasal = '';
   if (isset($this->nmgp_cmp_hidden['unitasal']) && $this->nmgp_cmp_hidden['unitasal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unitasal']);
       $sStyleHidden_unitasal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unitasal = 'display: none;';
   $sStyleReadInp_unitasal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unitasal']) && $this->nmgp_cmp_readonly['unitasal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unitasal']);
       $sStyleReadLab_unitasal = '';
       $sStyleReadInp_unitasal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unitasal']) && $this->nmgp_cmp_hidden['unitasal'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="unitasal" value="<?php echo $this->form_encode_input($this->unitasal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_unitasal_line" id="hidden_field_data_unitasal" style="<?php echo $sStyleHidden_unitasal; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unitasal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_unitasal_label"><span id="id_label_unitasal"><?php echo $this->nm_new_label['unitasal']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unitasal"]) &&  $this->nmgp_cmp_readonly["unitasal"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_unitasal']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_unitasal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_unitasal']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_unitasal'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_unitasal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_unitasal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_unitasal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_unitasal'] = array(); 
    }

   $old_value_tglmasuk = $this->tglmasuk;
   $old_value_tglmasuk_hora = $this->tglmasuk_hora;
   $old_value_struckno = $this->struckno;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tglmasuk = $this->tglmasuk;
   $unformatted_value_tglmasuk_hora = $this->tglmasuk_hora;
   $unformatted_value_struckno = $this->struckno;
   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT 	a.struckNo, a.struckNo + ' - ' + b.name FROM 	tbantrian a left join tbpoli b on b.polyCode = a.poly WHERE 	(a.status = 'Pelayanan' OR a.status = 'Selesai' OR a.status = 'Antre') AND (a.regDate = curdate() OR a.regDate = curdate() - INTERVAL 1 DAY) AND a.custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT 	a.struckNo, concat(a.struckNo,' - ',b.name) FROM 	tbantrian a left join tbpoli b on b.polyCode = a.poly WHERE 	(a.status = 'Pelayanan' OR a.status = 'Selesai' OR a.status = 'Antre') AND (a.regDate = curdate() OR a.regDate = curdate() - INTERVAL 1 DAY) AND a.custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT 	a.struckNo, a.struckNo&' - '&b.name FROM 	tbantrian a left join tbpoli b on b.polyCode = a.poly WHERE 	(a.status = 'Pelayanan' OR a.status = 'Selesai' OR a.status = 'Antre') AND (a.regDate = curdate() OR a.regDate = curdate() - INTERVAL 1 DAY) AND a.custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT 	a.struckNo, a.struckNo||' - '||b.name FROM 	tbantrian a left join tbpoli b on b.polyCode = a.poly WHERE 	(a.status = 'Pelayanan' OR a.status = 'Selesai' OR a.status = 'Antre') AND (a.regDate = curdate() OR a.regDate = curdate() - INTERVAL 1 DAY) AND a.custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT 	a.struckNo, a.struckNo + ' - ' + b.name FROM 	tbantrian a left join tbpoli b on b.polyCode = a.poly WHERE 	(a.status = 'Pelayanan' OR a.status = 'Selesai' OR a.status = 'Antre') AND (a.regDate = curdate() OR a.regDate = curdate() - INTERVAL 1 DAY) AND a.custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT 	a.struckNo, a.struckNo||' - '||b.name FROM 	tbantrian a left join tbpoli b on b.polyCode = a.poly WHERE 	(a.status = 'Pelayanan' OR a.status = 'Selesai' OR a.status = 'Antre') AND (a.regDate = curdate() OR a.regDate = curdate() - INTERVAL 1 DAY) AND a.custCode = '$this->custcode'";
   }
   else
   {
       $nm_comando = "SELECT 	a.struckNo, a.struckNo||' - '||b.name FROM 	tbantrian a left join tbpoli b on b.polyCode = a.poly WHERE 	(a.status = 'Pelayanan' OR a.status = 'Selesai' OR a.status = 'Antre') AND (a.regDate = curdate() OR a.regDate = curdate() - INTERVAL 1 DAY) AND a.custCode = '$this->custcode'";
   }

   $this->tglmasuk = $old_value_tglmasuk;
   $this->tglmasuk_hora = $old_value_tglmasuk_hora;
   $this->struckno = $old_value_struckno;
   $this->id = $old_value_id;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_unitasal'][] = $rs->fields[0];
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
   $unitasal_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->unitasal_1))
          {
              foreach ($this->unitasal_1 as $tmp_unitasal)
              {
                  if (trim($tmp_unitasal) === trim($cadaselect[1])) { $unitasal_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->unitasal) === trim($cadaselect[1])) { $unitasal_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="unitasal" value="<?php echo $this->form_encode_input($unitasal) . "\">" . $unitasal_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_unitasal();
   $x = 0 ; 
   $unitasal_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->unitasal_1))
          {
              foreach ($this->unitasal_1 as $tmp_unitasal)
              {
                  if (trim($tmp_unitasal) === trim($cadaselect[1])) { $unitasal_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->unitasal) === trim($cadaselect[1])) { $unitasal_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($unitasal_look))
          {
              $unitasal_look = $this->unitasal;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_unitasal\" class=\"css_unitasal_line\" style=\"" .  $sStyleReadLab_unitasal . "\">" . $this->form_encode_input($unitasal_look) . "</span><span id=\"id_read_off_unitasal\" class=\"css_read_off_unitasal\" style=\"white-space: nowrap; " . $sStyleReadInp_unitasal . "\">";
   echo " <span id=\"idAjaxSelect_unitasal\"><select class=\"sc-js-input scFormObjectOdd css_unitasal_obj\" style=\"\" id=\"id_sc_field_unitasal\" name=\"unitasal\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_unitasal'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->unitasal) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->unitasal)) 
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
<span class="css_unitasal_label scFormDataHelpOdd">&nbsp;*) Mutasi Billing Ranap & Rajal jadi 1
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unitasal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unitasal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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
    if (!isset($this->nm_new_label['perujuk']))
    {
        $this->nm_new_label['perujuk'] = "Perujuk";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $perujuk = $this->perujuk;
   $sStyleHidden_perujuk = '';
   if (isset($this->nmgp_cmp_hidden['perujuk']) && $this->nmgp_cmp_hidden['perujuk'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['perujuk']);
       $sStyleHidden_perujuk = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_perujuk = 'display: none;';
   $sStyleReadInp_perujuk = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['perujuk']) && $this->nmgp_cmp_readonly['perujuk'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['perujuk']);
       $sStyleReadLab_perujuk = '';
       $sStyleReadInp_perujuk = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['perujuk']) && $this->nmgp_cmp_hidden['perujuk'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="perujuk" value="<?php echo $this->form_encode_input($perujuk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_perujuk_line" id="hidden_field_data_perujuk" style="<?php echo $sStyleHidden_perujuk; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_perujuk_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_perujuk_label"><span id="id_label_perujuk"><?php echo $this->nm_new_label['perujuk']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["perujuk"]) &&  $this->nmgp_cmp_readonly["perujuk"] == "on") { 

 ?>
<input type="hidden" name="perujuk" value="<?php echo $this->form_encode_input($perujuk) . "\">" . $perujuk . ""; ?>
<?php } else { ?>
<span id="id_read_on_perujuk" class="sc-ui-readonly-perujuk css_perujuk_line" style="<?php echo $sStyleReadLab_perujuk; ?>"><?php echo $this->perujuk; ?></span><span id="id_read_off_perujuk" class="css_read_off_perujuk" style="white-space: nowrap;<?php echo $sStyleReadInp_perujuk; ?>">
 <input class="sc-js-input scFormObjectOdd css_perujuk_obj" style="" id="id_sc_field_perujuk" type=text name="perujuk" value="<?php echo $this->form_encode_input($perujuk) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_perujuk_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_perujuk_text"></span></td></tr></table></td></tr></table> </TD>
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
   if (!isset($this->nm_new_label['hotel']))
   {
       $this->nm_new_label['hotel'] = "Sewa Kamar";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hotel = $this->hotel;
   $sStyleHidden_hotel = '';
   if (isset($this->nmgp_cmp_hidden['hotel']) && $this->nmgp_cmp_hidden['hotel'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hotel']);
       $sStyleHidden_hotel = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hotel = 'display: none;';
   $sStyleReadInp_hotel = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hotel']) && $this->nmgp_cmp_readonly['hotel'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hotel']);
       $sStyleReadLab_hotel = '';
       $sStyleReadInp_hotel = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hotel']) && $this->nmgp_cmp_hidden['hotel'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="hotel" value="<?php echo $this->form_encode_input($this->hotel) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->hotel_1 = explode(";", trim($this->hotel));
  } 
  else
  {
      if (empty($this->hotel))
      {
          $this->hotel_1= array(); 
          $this->hotel= "N";
      } 
      else
      {
          $this->hotel_1= $this->hotel; 
          $this->hotel= ""; 
          foreach ($this->hotel_1 as $cada_hotel)
          {
             if (!empty($hotel))
             {
                 $this->hotel.= ";"; 
             } 
             $this->hotel.= $cada_hotel; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_hotel_line" id="hidden_field_data_hotel" style="<?php echo $sStyleHidden_hotel; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hotel_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hotel_label"><span id="id_label_hotel"><?php echo $this->nm_new_label['hotel']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hotel"]) &&  $this->nmgp_cmp_readonly["hotel"] == "on") { 

$hotel_look = "";
 if ($this->hotel == "Y") { $hotel_look .= "Ya" ;} 
 if (empty($hotel_look)) { $hotel_look = $this->hotel; }
?>
<input type="hidden" name="hotel" value="<?php echo $this->form_encode_input($hotel) . "\">" . $hotel_look . ""; ?>
<?php } else { ?>

<?php

$hotel_look = "";
 if ($this->hotel == "Y") { $hotel_look .= "Ya" ;} 
 if (empty($hotel_look)) { $hotel_look = $this->hotel; }
?>
<span id="id_read_on_hotel" class="css_hotel_line" style="<?php echo $sStyleReadLab_hotel; ?>"><?php echo $this->form_encode_input($hotel_look); ?></span><span id="id_read_off_hotel" class="css_read_off_hotel css_hotel_line" style="<?php echo $sStyleReadInp_hotel; ?>"><?php echo "<div id=\"idAjaxCheckbox_hotel\" style=\"display: inline-block\" class=\"css_hotel_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_hotel_line"><?php $tempOptionId = "id-opt-hotel" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-hotel sc-ui-checkbox-hotel" name="hotel[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_hotel'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->hotel_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">Ya</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hotel_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hotel_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['waitinglist']))
   {
       $this->nm_new_label['waitinglist'] = "Waiting List";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $waitinglist = $this->waitinglist;
   $sStyleHidden_waitinglist = '';
   if (isset($this->nmgp_cmp_hidden['waitinglist']) && $this->nmgp_cmp_hidden['waitinglist'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['waitinglist']);
       $sStyleHidden_waitinglist = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_waitinglist = 'display: none;';
   $sStyleReadInp_waitinglist = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['waitinglist']) && $this->nmgp_cmp_readonly['waitinglist'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['waitinglist']);
       $sStyleReadLab_waitinglist = '';
       $sStyleReadInp_waitinglist = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['waitinglist']) && $this->nmgp_cmp_hidden['waitinglist'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="waitinglist" value="<?php echo $this->form_encode_input($this->waitinglist) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->waitinglist_1 = explode(";", trim($this->waitinglist));
  } 
  else
  {
      if (empty($this->waitinglist))
      {
          $this->waitinglist_1= array(); 
          $this->waitinglist= "N";
      } 
      else
      {
          $this->waitinglist_1= $this->waitinglist; 
          $this->waitinglist= ""; 
          foreach ($this->waitinglist_1 as $cada_waitinglist)
          {
             if (!empty($waitinglist))
             {
                 $this->waitinglist.= ";"; 
             } 
             $this->waitinglist.= $cada_waitinglist; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_waitinglist_line" id="hidden_field_data_waitinglist" style="<?php echo $sStyleHidden_waitinglist; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_waitinglist_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_waitinglist_label"><span id="id_label_waitinglist"><?php echo $this->nm_new_label['waitinglist']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["waitinglist"]) &&  $this->nmgp_cmp_readonly["waitinglist"] == "on") { 

$waitinglist_look = "";
 if ($this->waitinglist == "Y") { $waitinglist_look .= "Ya" ;} 
 if (empty($waitinglist_look)) { $waitinglist_look = $this->waitinglist; }
?>
<input type="hidden" name="waitinglist" value="<?php echo $this->form_encode_input($waitinglist) . "\">" . $waitinglist_look . ""; ?>
<?php } else { ?>

<?php

$waitinglist_look = "";
 if ($this->waitinglist == "Y") { $waitinglist_look .= "Ya" ;} 
 if (empty($waitinglist_look)) { $waitinglist_look = $this->waitinglist; }
?>
<span id="id_read_on_waitinglist" class="css_waitinglist_line" style="<?php echo $sStyleReadLab_waitinglist; ?>"><?php echo $this->form_encode_input($waitinglist_look); ?></span><span id="id_read_off_waitinglist" class="css_read_off_waitinglist css_waitinglist_line" style="<?php echo $sStyleReadInp_waitinglist; ?>"><?php echo "<div id=\"idAjaxCheckbox_waitinglist\" style=\"display: inline-block\" class=\"css_waitinglist_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_waitinglist_line"><?php $tempOptionId = "id-opt-waitinglist" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-waitinglist sc-ui-checkbox-waitinglist" name="waitinglist[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbadmrawatinap_mob']['Lookup_waitinglist'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->waitinglist_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">Ya</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_waitinglist_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_waitinglist_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
