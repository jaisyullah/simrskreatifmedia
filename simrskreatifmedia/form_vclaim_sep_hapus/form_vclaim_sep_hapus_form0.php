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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("Hapus SEP"); } ?></TITLE>
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
.css_read_off_tglsep button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_vclaim_sep_hapus/form_vclaim_sep_hapus_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_vclaim_sep_hapus_sajax_js.php");
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
     if (F_name == "nosep")
     {
        $('input[name="nosep"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="nosep"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="nosep"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "tglsep")
     {
        $('input[name="tglsep"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="tglsep"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="tglsep"]').removeClass("scFormInputDisabled");
        }
        $('input[id="calendar_tglsep"]').prop("disabled", F_opc);
        if (F_opc) {
            $("#id_sc_field_tglsep").datepicker("destroy");
        }
        else {
            scJQCalendarAdd("");
        }
     }
     if (F_name == "ppkpelayanan")
     {
        $('input[name="ppkpelayanan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="ppkpelayanan"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="ppkpelayanan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "nmppkpelayanan")
     {
        $('input[name="nmppkpelayanan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="nmppkpelayanan"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="nmppkpelayanan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "jnspelayanan")
     {
        $('select[name="jnspelayanan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="jnspelayanan"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="jnspelayanan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "klsrawat")
     {
        $('select[name="klsrawat"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="klsrawat"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="klsrawat"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "nomr")
     {
        $('input[name="nomr"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="nomr"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="nomr"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "asalrujukan")
     {
        $('select[name="asalrujukan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="asalrujukan"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="asalrujukan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "norujukan")
     {
        $('input[name="norujukan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="norujukan"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="norujukan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "tglrujukan")
     {
        $('input[name="tglrujukan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="tglrujukan"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="tglrujukan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "ppkrujukan")
     {
        $('input[name="ppkrujukan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="ppkrujukan"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="ppkrujukan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "nmppkrujukan")
     {
        $('input[name="nmppkrujukan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="nmppkrujukan"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="nmppkrujukan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "catatan")
     {
        $('input[name="catatan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="catatan"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="catatan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "diagawal")
     {
        $('input[name="diagawal"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="diagawal"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="diagawal"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "nmdiagawal")
     {
        $('input[name="nmdiagawal"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="nmdiagawal"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="nmdiagawal"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "politujuan")
     {
        $('input[name="politujuan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="politujuan"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="politujuan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "nmpolitujuan")
     {
        $('input[name="nmpolitujuan"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="nmpolitujuan"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="nmpolitujuan"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "polieksekutif")
     {
        $('select[name="polieksekutif"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="polieksekutif"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="polieksekutif"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "cob")
     {
        $('select[name="cob"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="cob"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="cob"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "kejadianlakalantas")
     {
        $('select[name="kejadianlakalantas"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="kejadianlakalantas"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="kejadianlakalantas"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "penjaminlakalantas")
     {
        $('select[name="penjaminlakalantas"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="penjaminlakalantas"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="penjaminlakalantas"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "lokasilakalantas")
     {
        $('input[name="lokasilakalantas"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="lokasilakalantas"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="lokasilakalantas"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "notelp")
     {
        $('input[name="notelp"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="notelp"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="notelp"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "user")
     {
        $('input[name="user"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="user"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="user"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_vclaim_sep_hapus_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

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
   });
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_vclaim_sep_hapus_js0.php");
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
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
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
$_SESSION['scriptcase']['error_span_title']['form_vclaim_sep_hapus'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_vclaim_sep_hapus'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""; } else { echo "Hapus SEP"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="50%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Detail Peserta<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nokartu']))
    {
        $this->nm_new_label['nokartu'] = "No. Kartu";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nokartu_label" id="hidden_field_label_nokartu" style="<?php echo $sStyleHidden_nokartu; ?>"><span id="id_label_nokartu"><?php echo $this->nm_new_label['nokartu']; ?></span></TD>
    <TD class="scFormDataOdd css_nokartu_line" id="hidden_field_data_nokartu" style="<?php echo $sStyleHidden_nokartu; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nokartu"]) &&  $this->nmgp_cmp_readonly["nokartu"] == "on") { 

 ?>
<input type="hidden" name="nokartu" value="<?php echo $this->form_encode_input($nokartu) . "\">" . $nokartu . ""; ?>
<?php } else { ?>
<span id="id_read_on_nokartu" class="sc-ui-readonly-nokartu css_nokartu_line" style="<?php echo $sStyleReadLab_nokartu; ?>"><?php echo $this->nokartu; ?></span><span id="id_read_off_nokartu" class="css_read_off_nokartu" style="white-space: nowrap;<?php echo $sStyleReadInp_nokartu; ?>">
 <input class="sc-js-input scFormObjectOdd css_nokartu_obj" style="" id="id_sc_field_nokartu" type=text name="nokartu" value="<?php echo $this->form_encode_input($nokartu) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
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
    <TD class="scFormDataOdd css_nama_line" id="hidden_field_data_nama" style="<?php echo $sStyleHidden_nama; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nama"]) &&  $this->nmgp_cmp_readonly["nama"] == "on") { 

 ?>
<input type="hidden" name="nama" value="<?php echo $this->form_encode_input($nama) . "\">" . $nama . ""; ?>
<?php } else { ?>
<span id="id_read_on_nama" class="sc-ui-readonly-nama css_nama_line" style="<?php echo $sStyleReadLab_nama; ?>"><?php echo $this->nama; ?></span><span id="id_read_off_nama" class="css_read_off_nama" style="white-space: nowrap;<?php echo $sStyleReadInp_nama; ?>">
 <input class="sc-js-input scFormObjectOdd css_nama_obj" style="" id="id_sc_field_nama" type=text name="nama" value="<?php echo $this->form_encode_input($nama) ?>"
 size=40 maxlength=80 alt="{datatype: 'text', maxLength: 80, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
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
    <TD class="scFormDataOdd css_nik_line" id="hidden_field_data_nik" style="<?php echo $sStyleHidden_nik; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nik"]) &&  $this->nmgp_cmp_readonly["nik"] == "on") { 

 ?>
<input type="hidden" name="nik" value="<?php echo $this->form_encode_input($nik) . "\">" . $nik . ""; ?>
<?php } else { ?>
<span id="id_read_on_nik" class="sc-ui-readonly-nik css_nik_line" style="<?php echo $sStyleReadLab_nik; ?>"><?php echo $this->nik; ?></span><span id="id_read_off_nik" class="css_read_off_nik" style="white-space: nowrap;<?php echo $sStyleReadInp_nik; ?>">
 <input class="sc-js-input scFormObjectOdd css_nik_obj" style="" id="id_sc_field_nik" type=text name="nik" value="<?php echo $this->form_encode_input($nik) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['keterangan']))
    {
        $this->nm_new_label['keterangan'] = "Keterangan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $keterangan = $this->keterangan;
   $sStyleHidden_keterangan = '';
   if (isset($this->nmgp_cmp_hidden['keterangan']) && $this->nmgp_cmp_hidden['keterangan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['keterangan']);
       $sStyleHidden_keterangan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_keterangan = 'display: none;';
   $sStyleReadInp_keterangan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['keterangan']) && $this->nmgp_cmp_readonly['keterangan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['keterangan']);
       $sStyleReadLab_keterangan = '';
       $sStyleReadInp_keterangan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['keterangan']) && $this->nmgp_cmp_hidden['keterangan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="keterangan" value="<?php echo $this->form_encode_input($keterangan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_keterangan_label" id="hidden_field_label_keterangan" style="<?php echo $sStyleHidden_keterangan; ?>"><span id="id_label_keterangan"><?php echo $this->nm_new_label['keterangan']; ?></span></TD>
    <TD class="scFormDataOdd css_keterangan_line" id="hidden_field_data_keterangan" style="<?php echo $sStyleHidden_keterangan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["keterangan"]) &&  $this->nmgp_cmp_readonly["keterangan"] == "on") { 

 ?>
<input type="hidden" name="keterangan" value="<?php echo $this->form_encode_input($keterangan) . "\">" . $keterangan . ""; ?>
<?php } else { ?>
<span id="id_read_on_keterangan" class="sc-ui-readonly-keterangan css_keterangan_line" style="<?php echo $sStyleReadLab_keterangan; ?>"><?php echo $this->keterangan; ?></span><span id="id_read_off_keterangan" class="css_read_off_keterangan" style="white-space: nowrap;<?php echo $sStyleReadInp_keterangan; ?>">
 <input class="sc-js-input scFormObjectOdd css_keterangan_obj" style="" id="id_sc_field_keterangan" type=text name="keterangan" value="<?php echo $this->form_encode_input($keterangan) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sex']))
    {
        $this->nm_new_label['sex'] = "Jenis Kelamin";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sex = $this->sex;
   $sStyleHidden_sex = '';
   if (isset($this->nmgp_cmp_hidden['sex']) && $this->nmgp_cmp_hidden['sex'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sex']);
       $sStyleHidden_sex = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sex = 'display: none;';
   $sStyleReadInp_sex = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sex']) && $this->nmgp_cmp_readonly['sex'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sex']);
       $sStyleReadLab_sex = '';
       $sStyleReadInp_sex = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sex']) && $this->nmgp_cmp_hidden['sex'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sex" value="<?php echo $this->form_encode_input($sex) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sex_label" id="hidden_field_label_sex" style="<?php echo $sStyleHidden_sex; ?>"><span id="id_label_sex"><?php echo $this->nm_new_label['sex']; ?></span></TD>
    <TD class="scFormDataOdd css_sex_line" id="hidden_field_data_sex" style="<?php echo $sStyleHidden_sex; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sex"]) &&  $this->nmgp_cmp_readonly["sex"] == "on") { 

 ?>
<input type="hidden" name="sex" value="<?php echo $this->form_encode_input($sex) . "\">" . $sex . ""; ?>
<?php } else { ?>
<span id="id_read_on_sex" class="sc-ui-readonly-sex css_sex_line" style="<?php echo $sStyleReadLab_sex; ?>"><?php echo $this->sex; ?></span><span id="id_read_off_sex" class="css_read_off_sex" style="white-space: nowrap;<?php echo $sStyleReadInp_sex; ?>">
 <input class="sc-js-input scFormObjectOdd css_sex_obj" style="" id="id_sc_field_sex" type=text name="sex" value="<?php echo $this->form_encode_input($sex) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['umursaatpelayanan']))
    {
        $this->nm_new_label['umursaatpelayanan'] = "Umur";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $umursaatpelayanan = $this->umursaatpelayanan;
   $sStyleHidden_umursaatpelayanan = '';
   if (isset($this->nmgp_cmp_hidden['umursaatpelayanan']) && $this->nmgp_cmp_hidden['umursaatpelayanan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['umursaatpelayanan']);
       $sStyleHidden_umursaatpelayanan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_umursaatpelayanan = 'display: none;';
   $sStyleReadInp_umursaatpelayanan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['umursaatpelayanan']) && $this->nmgp_cmp_readonly['umursaatpelayanan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['umursaatpelayanan']);
       $sStyleReadLab_umursaatpelayanan = '';
       $sStyleReadInp_umursaatpelayanan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['umursaatpelayanan']) && $this->nmgp_cmp_hidden['umursaatpelayanan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="umursaatpelayanan" value="<?php echo $this->form_encode_input($umursaatpelayanan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_umursaatpelayanan_label" id="hidden_field_label_umursaatpelayanan" style="<?php echo $sStyleHidden_umursaatpelayanan; ?>"><span id="id_label_umursaatpelayanan"><?php echo $this->nm_new_label['umursaatpelayanan']; ?></span></TD>
    <TD class="scFormDataOdd css_umursaatpelayanan_line" id="hidden_field_data_umursaatpelayanan" style="<?php echo $sStyleHidden_umursaatpelayanan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["umursaatpelayanan"]) &&  $this->nmgp_cmp_readonly["umursaatpelayanan"] == "on") { 

 ?>
<input type="hidden" name="umursaatpelayanan" value="<?php echo $this->form_encode_input($umursaatpelayanan) . "\">" . $umursaatpelayanan . ""; ?>
<?php } else { ?>
<span id="id_read_on_umursaatpelayanan" class="sc-ui-readonly-umursaatpelayanan css_umursaatpelayanan_line" style="<?php echo $sStyleReadLab_umursaatpelayanan; ?>"><?php echo $this->umursaatpelayanan; ?></span><span id="id_read_off_umursaatpelayanan" class="css_read_off_umursaatpelayanan" style="white-space: nowrap;<?php echo $sStyleReadInp_umursaatpelayanan; ?>">
 <input class="sc-js-input scFormObjectOdd css_umursaatpelayanan_obj" style="" id="id_sc_field_umursaatpelayanan" type=text name="umursaatpelayanan" value="<?php echo $this->form_encode_input($umursaatpelayanan) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['kodehakkelas']))
    {
        $this->nm_new_label['kodehakkelas'] = "Kode Kelas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kodehakkelas = $this->kodehakkelas;
   $sStyleHidden_kodehakkelas = '';
   if (isset($this->nmgp_cmp_hidden['kodehakkelas']) && $this->nmgp_cmp_hidden['kodehakkelas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kodehakkelas']);
       $sStyleHidden_kodehakkelas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kodehakkelas = 'display: none;';
   $sStyleReadInp_kodehakkelas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kodehakkelas']) && $this->nmgp_cmp_readonly['kodehakkelas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kodehakkelas']);
       $sStyleReadLab_kodehakkelas = '';
       $sStyleReadInp_kodehakkelas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kodehakkelas']) && $this->nmgp_cmp_hidden['kodehakkelas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kodehakkelas" value="<?php echo $this->form_encode_input($kodehakkelas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kodehakkelas_label" id="hidden_field_label_kodehakkelas" style="<?php echo $sStyleHidden_kodehakkelas; ?>"><span id="id_label_kodehakkelas"><?php echo $this->nm_new_label['kodehakkelas']; ?></span></TD>
    <TD class="scFormDataOdd css_kodehakkelas_line" id="hidden_field_data_kodehakkelas" style="<?php echo $sStyleHidden_kodehakkelas; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kodehakkelas"]) &&  $this->nmgp_cmp_readonly["kodehakkelas"] == "on") { 

 ?>
<input type="hidden" name="kodehakkelas" value="<?php echo $this->form_encode_input($kodehakkelas) . "\">" . $kodehakkelas . ""; ?>
<?php } else { ?>
<span id="id_read_on_kodehakkelas" class="sc-ui-readonly-kodehakkelas css_kodehakkelas_line" style="<?php echo $sStyleReadLab_kodehakkelas; ?>"><?php echo $this->kodehakkelas; ?></span><span id="id_read_off_kodehakkelas" class="css_read_off_kodehakkelas" style="white-space: nowrap;<?php echo $sStyleReadInp_kodehakkelas; ?>">
 <input class="sc-js-input scFormObjectOdd css_kodehakkelas_obj" style="" id="id_sc_field_kodehakkelas" type=text name="kodehakkelas" value="<?php echo $this->form_encode_input($kodehakkelas) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['keteranganhakkelas']))
    {
        $this->nm_new_label['keteranganhakkelas'] = "Kelas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $keteranganhakkelas = $this->keteranganhakkelas;
   $sStyleHidden_keteranganhakkelas = '';
   if (isset($this->nmgp_cmp_hidden['keteranganhakkelas']) && $this->nmgp_cmp_hidden['keteranganhakkelas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['keteranganhakkelas']);
       $sStyleHidden_keteranganhakkelas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_keteranganhakkelas = 'display: none;';
   $sStyleReadInp_keteranganhakkelas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['keteranganhakkelas']) && $this->nmgp_cmp_readonly['keteranganhakkelas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['keteranganhakkelas']);
       $sStyleReadLab_keteranganhakkelas = '';
       $sStyleReadInp_keteranganhakkelas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['keteranganhakkelas']) && $this->nmgp_cmp_hidden['keteranganhakkelas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="keteranganhakkelas" value="<?php echo $this->form_encode_input($keteranganhakkelas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_keteranganhakkelas_label" id="hidden_field_label_keteranganhakkelas" style="<?php echo $sStyleHidden_keteranganhakkelas; ?>"><span id="id_label_keteranganhakkelas"><?php echo $this->nm_new_label['keteranganhakkelas']; ?></span></TD>
    <TD class="scFormDataOdd css_keteranganhakkelas_line" id="hidden_field_data_keteranganhakkelas" style="<?php echo $sStyleHidden_keteranganhakkelas; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["keteranganhakkelas"]) &&  $this->nmgp_cmp_readonly["keteranganhakkelas"] == "on") { 

 ?>
<input type="hidden" name="keteranganhakkelas" value="<?php echo $this->form_encode_input($keteranganhakkelas) . "\">" . $keteranganhakkelas . ""; ?>
<?php } else { ?>
<span id="id_read_on_keteranganhakkelas" class="sc-ui-readonly-keteranganhakkelas css_keteranganhakkelas_line" style="<?php echo $sStyleReadLab_keteranganhakkelas; ?>"><?php echo $this->keteranganhakkelas; ?></span><span id="id_read_off_keteranganhakkelas" class="css_read_off_keteranganhakkelas" style="white-space: nowrap;<?php echo $sStyleReadInp_keteranganhakkelas; ?>">
 <input class="sc-js-input scFormObjectOdd css_keteranganhakkelas_obj" style="" id="id_sc_field_keteranganhakkelas" type=text name="keteranganhakkelas" value="<?php echo $this->form_encode_input($keteranganhakkelas) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['kodejenispeserta']))
    {
        $this->nm_new_label['kodejenispeserta'] = "Kode Jenis Peserta";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kodejenispeserta = $this->kodejenispeserta;
   $sStyleHidden_kodejenispeserta = '';
   if (isset($this->nmgp_cmp_hidden['kodejenispeserta']) && $this->nmgp_cmp_hidden['kodejenispeserta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kodejenispeserta']);
       $sStyleHidden_kodejenispeserta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kodejenispeserta = 'display: none;';
   $sStyleReadInp_kodejenispeserta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kodejenispeserta']) && $this->nmgp_cmp_readonly['kodejenispeserta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kodejenispeserta']);
       $sStyleReadLab_kodejenispeserta = '';
       $sStyleReadInp_kodejenispeserta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kodejenispeserta']) && $this->nmgp_cmp_hidden['kodejenispeserta'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kodejenispeserta" value="<?php echo $this->form_encode_input($kodejenispeserta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kodejenispeserta_label" id="hidden_field_label_kodejenispeserta" style="<?php echo $sStyleHidden_kodejenispeserta; ?>"><span id="id_label_kodejenispeserta"><?php echo $this->nm_new_label['kodejenispeserta']; ?></span></TD>
    <TD class="scFormDataOdd css_kodejenispeserta_line" id="hidden_field_data_kodejenispeserta" style="<?php echo $sStyleHidden_kodejenispeserta; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kodejenispeserta"]) &&  $this->nmgp_cmp_readonly["kodejenispeserta"] == "on") { 

 ?>
<input type="hidden" name="kodejenispeserta" value="<?php echo $this->form_encode_input($kodejenispeserta) . "\">" . $kodejenispeserta . ""; ?>
<?php } else { ?>
<span id="id_read_on_kodejenispeserta" class="sc-ui-readonly-kodejenispeserta css_kodejenispeserta_line" style="<?php echo $sStyleReadLab_kodejenispeserta; ?>"><?php echo $this->kodejenispeserta; ?></span><span id="id_read_off_kodejenispeserta" class="css_read_off_kodejenispeserta" style="white-space: nowrap;<?php echo $sStyleReadInp_kodejenispeserta; ?>">
 <input class="sc-js-input scFormObjectOdd css_kodejenispeserta_obj" style="" id="id_sc_field_kodejenispeserta" type=text name="kodejenispeserta" value="<?php echo $this->form_encode_input($kodejenispeserta) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['keteranganjenispeserta']))
    {
        $this->nm_new_label['keteranganjenispeserta'] = "Jenis Peserta";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $keteranganjenispeserta = $this->keteranganjenispeserta;
   $sStyleHidden_keteranganjenispeserta = '';
   if (isset($this->nmgp_cmp_hidden['keteranganjenispeserta']) && $this->nmgp_cmp_hidden['keteranganjenispeserta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['keteranganjenispeserta']);
       $sStyleHidden_keteranganjenispeserta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_keteranganjenispeserta = 'display: none;';
   $sStyleReadInp_keteranganjenispeserta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['keteranganjenispeserta']) && $this->nmgp_cmp_readonly['keteranganjenispeserta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['keteranganjenispeserta']);
       $sStyleReadLab_keteranganjenispeserta = '';
       $sStyleReadInp_keteranganjenispeserta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['keteranganjenispeserta']) && $this->nmgp_cmp_hidden['keteranganjenispeserta'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="keteranganjenispeserta" value="<?php echo $this->form_encode_input($keteranganjenispeserta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_keteranganjenispeserta_label" id="hidden_field_label_keteranganjenispeserta" style="<?php echo $sStyleHidden_keteranganjenispeserta; ?>"><span id="id_label_keteranganjenispeserta"><?php echo $this->nm_new_label['keteranganjenispeserta']; ?></span></TD>
    <TD class="scFormDataOdd css_keteranganjenispeserta_line" id="hidden_field_data_keteranganjenispeserta" style="<?php echo $sStyleHidden_keteranganjenispeserta; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["keteranganjenispeserta"]) &&  $this->nmgp_cmp_readonly["keteranganjenispeserta"] == "on") { 

 ?>
<input type="hidden" name="keteranganjenispeserta" value="<?php echo $this->form_encode_input($keteranganjenispeserta) . "\">" . $keteranganjenispeserta . ""; ?>
<?php } else { ?>
<span id="id_read_on_keteranganjenispeserta" class="sc-ui-readonly-keteranganjenispeserta css_keteranganjenispeserta_line" style="<?php echo $sStyleReadLab_keteranganjenispeserta; ?>"><?php echo $this->keteranganjenispeserta; ?></span><span id="id_read_off_keteranganjenispeserta" class="css_read_off_keteranganjenispeserta" style="white-space: nowrap;<?php echo $sStyleReadInp_keteranganjenispeserta; ?>">
 <input class="sc-js-input scFormObjectOdd css_keteranganjenispeserta_obj" style="" id="id_sc_field_keteranganjenispeserta" type=text name="keteranganjenispeserta" value="<?php echo $this->form_encode_input($keteranganjenispeserta) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['kdprovider']))
    {
        $this->nm_new_label['kdprovider'] = "Kode Provider";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kdprovider = $this->kdprovider;
   $sStyleHidden_kdprovider = '';
   if (isset($this->nmgp_cmp_hidden['kdprovider']) && $this->nmgp_cmp_hidden['kdprovider'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kdprovider']);
       $sStyleHidden_kdprovider = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kdprovider = 'display: none;';
   $sStyleReadInp_kdprovider = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kdprovider']) && $this->nmgp_cmp_readonly['kdprovider'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kdprovider']);
       $sStyleReadLab_kdprovider = '';
       $sStyleReadInp_kdprovider = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kdprovider']) && $this->nmgp_cmp_hidden['kdprovider'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kdprovider" value="<?php echo $this->form_encode_input($kdprovider) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kdprovider_label" id="hidden_field_label_kdprovider" style="<?php echo $sStyleHidden_kdprovider; ?>"><span id="id_label_kdprovider"><?php echo $this->nm_new_label['kdprovider']; ?></span></TD>
    <TD class="scFormDataOdd css_kdprovider_line" id="hidden_field_data_kdprovider" style="<?php echo $sStyleHidden_kdprovider; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kdprovider"]) &&  $this->nmgp_cmp_readonly["kdprovider"] == "on") { 

 ?>
<input type="hidden" name="kdprovider" value="<?php echo $this->form_encode_input($kdprovider) . "\">" . $kdprovider . ""; ?>
<?php } else { ?>
<span id="id_read_on_kdprovider" class="sc-ui-readonly-kdprovider css_kdprovider_line" style="<?php echo $sStyleReadLab_kdprovider; ?>"><?php echo $this->kdprovider; ?></span><span id="id_read_off_kdprovider" class="css_read_off_kdprovider" style="white-space: nowrap;<?php echo $sStyleReadInp_kdprovider; ?>">
 <input class="sc-js-input scFormObjectOdd css_kdprovider_obj" style="" id="id_sc_field_kdprovider" type=text name="kdprovider" value="<?php echo $this->form_encode_input($kdprovider) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nmprovider']))
    {
        $this->nm_new_label['nmprovider'] = "Nama Provider";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nmprovider = $this->nmprovider;
   $sStyleHidden_nmprovider = '';
   if (isset($this->nmgp_cmp_hidden['nmprovider']) && $this->nmgp_cmp_hidden['nmprovider'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nmprovider']);
       $sStyleHidden_nmprovider = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nmprovider = 'display: none;';
   $sStyleReadInp_nmprovider = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nmprovider']) && $this->nmgp_cmp_readonly['nmprovider'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nmprovider']);
       $sStyleReadLab_nmprovider = '';
       $sStyleReadInp_nmprovider = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nmprovider']) && $this->nmgp_cmp_hidden['nmprovider'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nmprovider" value="<?php echo $this->form_encode_input($nmprovider) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nmprovider_label" id="hidden_field_label_nmprovider" style="<?php echo $sStyleHidden_nmprovider; ?>"><span id="id_label_nmprovider"><?php echo $this->nm_new_label['nmprovider']; ?></span></TD>
    <TD class="scFormDataOdd css_nmprovider_line" id="hidden_field_data_nmprovider" style="<?php echo $sStyleHidden_nmprovider; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nmprovider"]) &&  $this->nmgp_cmp_readonly["nmprovider"] == "on") { 

 ?>
<input type="hidden" name="nmprovider" value="<?php echo $this->form_encode_input($nmprovider) . "\">" . $nmprovider . ""; ?>
<?php } else { ?>
<span id="id_read_on_nmprovider" class="sc-ui-readonly-nmprovider css_nmprovider_line" style="<?php echo $sStyleReadLab_nmprovider; ?>"><?php echo $this->nmprovider; ?></span><span id="id_read_off_nmprovider" class="css_read_off_nmprovider" style="white-space: nowrap;<?php echo $sStyleReadInp_nmprovider; ?>">
 <input class="sc-js-input scFormObjectOdd css_nmprovider_obj" style="" id="id_sc_field_nmprovider" type=text name="nmprovider" value="<?php echo $this->form_encode_input($nmprovider) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tglcetakkartu']))
    {
        $this->nm_new_label['tglcetakkartu'] = "Cetak Kartu";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tglcetakkartu = $this->tglcetakkartu;
   $sStyleHidden_tglcetakkartu = '';
   if (isset($this->nmgp_cmp_hidden['tglcetakkartu']) && $this->nmgp_cmp_hidden['tglcetakkartu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tglcetakkartu']);
       $sStyleHidden_tglcetakkartu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tglcetakkartu = 'display: none;';
   $sStyleReadInp_tglcetakkartu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tglcetakkartu']) && $this->nmgp_cmp_readonly['tglcetakkartu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tglcetakkartu']);
       $sStyleReadLab_tglcetakkartu = '';
       $sStyleReadInp_tglcetakkartu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tglcetakkartu']) && $this->nmgp_cmp_hidden['tglcetakkartu'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tglcetakkartu" value="<?php echo $this->form_encode_input($tglcetakkartu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tglcetakkartu_label" id="hidden_field_label_tglcetakkartu" style="<?php echo $sStyleHidden_tglcetakkartu; ?>"><span id="id_label_tglcetakkartu"><?php echo $this->nm_new_label['tglcetakkartu']; ?></span></TD>
    <TD class="scFormDataOdd css_tglcetakkartu_line" id="hidden_field_data_tglcetakkartu" style="<?php echo $sStyleHidden_tglcetakkartu; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tglcetakkartu"]) &&  $this->nmgp_cmp_readonly["tglcetakkartu"] == "on") { 

 ?>
<input type="hidden" name="tglcetakkartu" value="<?php echo $this->form_encode_input($tglcetakkartu) . "\">" . $tglcetakkartu . ""; ?>
<?php } else { ?>
<span id="id_read_on_tglcetakkartu" class="sc-ui-readonly-tglcetakkartu css_tglcetakkartu_line" style="<?php echo $sStyleReadLab_tglcetakkartu; ?>"><?php echo $this->tglcetakkartu; ?></span><span id="id_read_off_tglcetakkartu" class="css_read_off_tglcetakkartu" style="white-space: nowrap;<?php echo $sStyleReadInp_tglcetakkartu; ?>">
 <input class="sc-js-input scFormObjectOdd css_tglcetakkartu_obj" style="" id="id_sc_field_tglcetakkartu" type=text name="tglcetakkartu" value="<?php echo $this->form_encode_input($tglcetakkartu) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tgltat']))
    {
        $this->nm_new_label['tgltat'] = "Tanggal TAT";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tgltat = $this->tgltat;
   $sStyleHidden_tgltat = '';
   if (isset($this->nmgp_cmp_hidden['tgltat']) && $this->nmgp_cmp_hidden['tgltat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tgltat']);
       $sStyleHidden_tgltat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tgltat = 'display: none;';
   $sStyleReadInp_tgltat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tgltat']) && $this->nmgp_cmp_readonly['tgltat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tgltat']);
       $sStyleReadLab_tgltat = '';
       $sStyleReadInp_tgltat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tgltat']) && $this->nmgp_cmp_hidden['tgltat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tgltat" value="<?php echo $this->form_encode_input($tgltat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tgltat_label" id="hidden_field_label_tgltat" style="<?php echo $sStyleHidden_tgltat; ?>"><span id="id_label_tgltat"><?php echo $this->nm_new_label['tgltat']; ?></span></TD>
    <TD class="scFormDataOdd css_tgltat_line" id="hidden_field_data_tgltat" style="<?php echo $sStyleHidden_tgltat; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tgltat"]) &&  $this->nmgp_cmp_readonly["tgltat"] == "on") { 

 ?>
<input type="hidden" name="tgltat" value="<?php echo $this->form_encode_input($tgltat) . "\">" . $tgltat . ""; ?>
<?php } else { ?>
<span id="id_read_on_tgltat" class="sc-ui-readonly-tgltat css_tgltat_line" style="<?php echo $sStyleReadLab_tgltat; ?>"><?php echo $this->tgltat; ?></span><span id="id_read_off_tgltat" class="css_read_off_tgltat" style="white-space: nowrap;<?php echo $sStyleReadInp_tgltat; ?>">
 <input class="sc-js-input scFormObjectOdd css_tgltat_obj" style="" id="id_sc_field_tgltat" type=text name="tgltat" value="<?php echo $this->form_encode_input($tgltat) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tgltmt']))
    {
        $this->nm_new_label['tgltmt'] = "Tanggal TMT";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tgltmt = $this->tgltmt;
   $sStyleHidden_tgltmt = '';
   if (isset($this->nmgp_cmp_hidden['tgltmt']) && $this->nmgp_cmp_hidden['tgltmt'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tgltmt']);
       $sStyleHidden_tgltmt = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tgltmt = 'display: none;';
   $sStyleReadInp_tgltmt = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tgltmt']) && $this->nmgp_cmp_readonly['tgltmt'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tgltmt']);
       $sStyleReadLab_tgltmt = '';
       $sStyleReadInp_tgltmt = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tgltmt']) && $this->nmgp_cmp_hidden['tgltmt'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tgltmt" value="<?php echo $this->form_encode_input($tgltmt) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tgltmt_label" id="hidden_field_label_tgltmt" style="<?php echo $sStyleHidden_tgltmt; ?>"><span id="id_label_tgltmt"><?php echo $this->nm_new_label['tgltmt']; ?></span></TD>
    <TD class="scFormDataOdd css_tgltmt_line" id="hidden_field_data_tgltmt" style="<?php echo $sStyleHidden_tgltmt; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tgltmt"]) &&  $this->nmgp_cmp_readonly["tgltmt"] == "on") { 

 ?>
<input type="hidden" name="tgltmt" value="<?php echo $this->form_encode_input($tgltmt) . "\">" . $tgltmt . ""; ?>
<?php } else { ?>
<span id="id_read_on_tgltmt" class="sc-ui-readonly-tgltmt css_tgltmt_line" style="<?php echo $sStyleReadLab_tgltmt; ?>"><?php echo $this->tgltmt; ?></span><span id="id_read_off_tgltmt" class="css_read_off_tgltmt" style="white-space: nowrap;<?php echo $sStyleReadInp_tgltmt; ?>">
 <input class="sc-js-input scFormObjectOdd css_tgltmt_obj" style="" id="id_sc_field_tgltmt" type=text name="tgltmt" value="<?php echo $this->form_encode_input($tgltmt) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="130%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Detail SEP<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nosep']))
    {
        $this->nm_new_label['nosep'] = "No. SEP";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nosep = $this->nosep;
   $sStyleHidden_nosep = '';
   if (isset($this->nmgp_cmp_hidden['nosep']) && $this->nmgp_cmp_hidden['nosep'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nosep']);
       $sStyleHidden_nosep = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nosep = 'display: none;';
   $sStyleReadInp_nosep = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nosep']) && $this->nmgp_cmp_readonly['nosep'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nosep']);
       $sStyleReadLab_nosep = '';
       $sStyleReadInp_nosep = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nosep']) && $this->nmgp_cmp_hidden['nosep'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nosep" value="<?php echo $this->form_encode_input($nosep) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nosep_label" id="hidden_field_label_nosep" style="<?php echo $sStyleHidden_nosep; ?>"><span id="id_label_nosep"><?php echo $this->nm_new_label['nosep']; ?></span></TD>
    <TD class="scFormDataOdd css_nosep_line" id="hidden_field_data_nosep" style="<?php echo $sStyleHidden_nosep; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nosep"]) &&  $this->nmgp_cmp_readonly["nosep"] == "on") { 

 ?>
<input type="hidden" name="nosep" value="<?php echo $this->form_encode_input($nosep) . "\">" . $nosep . ""; ?>
<?php } else { ?>
<span id="id_read_on_nosep" class="sc-ui-readonly-nosep css_nosep_line" style="<?php echo $sStyleReadLab_nosep; ?>"><?php echo $this->nosep; ?></span><span id="id_read_off_nosep" class="css_read_off_nosep" style="white-space: nowrap;<?php echo $sStyleReadInp_nosep; ?>">
 <input class="sc-js-input scFormObjectOdd css_nosep_obj" style="" id="id_sc_field_nosep" type=text name="nosep" value="<?php echo $this->form_encode_input($nosep) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tglsep']))
    {
        $this->nm_new_label['tglsep'] = "Tanggal SEP";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tglsep = $this->tglsep;
   $sStyleHidden_tglsep = '';
   if (isset($this->nmgp_cmp_hidden['tglsep']) && $this->nmgp_cmp_hidden['tglsep'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tglsep']);
       $sStyleHidden_tglsep = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tglsep = 'display: none;';
   $sStyleReadInp_tglsep = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tglsep']) && $this->nmgp_cmp_readonly['tglsep'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tglsep']);
       $sStyleReadLab_tglsep = '';
       $sStyleReadInp_tglsep = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tglsep']) && $this->nmgp_cmp_hidden['tglsep'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tglsep" value="<?php echo $this->form_encode_input($tglsep) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tglsep_label" id="hidden_field_label_tglsep" style="<?php echo $sStyleHidden_tglsep; ?>"><span id="id_label_tglsep"><?php echo $this->nm_new_label['tglsep']; ?></span></TD>
    <TD class="scFormDataOdd css_tglsep_line" id="hidden_field_data_tglsep" style="<?php echo $sStyleHidden_tglsep; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tglsep"]) &&  $this->nmgp_cmp_readonly["tglsep"] == "on") { 

 ?>
<input type="hidden" name="tglsep" value="<?php echo $this->form_encode_input($tglsep) . "\">" . $tglsep . ""; ?>
<?php } else { ?>
<span id="id_read_on_tglsep" class="sc-ui-readonly-tglsep css_tglsep_line" style="<?php echo $sStyleReadLab_tglsep; ?>"><?php echo $tglsep; ?></span><span id="id_read_off_tglsep" class="css_read_off_tglsep" style="white-space: nowrap;<?php echo $sStyleReadInp_tglsep; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_tglsep_obj" style="" id="id_sc_field_tglsep" type=text name="tglsep" value="<?php echo $this->form_encode_input($tglsep) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['tglsep']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['tglsep']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['tglsep']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ppkpelayanan']))
    {
        $this->nm_new_label['ppkpelayanan'] = "Kode PPK";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ppkpelayanan = $this->ppkpelayanan;
   $sStyleHidden_ppkpelayanan = '';
   if (isset($this->nmgp_cmp_hidden['ppkpelayanan']) && $this->nmgp_cmp_hidden['ppkpelayanan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ppkpelayanan']);
       $sStyleHidden_ppkpelayanan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ppkpelayanan = 'display: none;';
   $sStyleReadInp_ppkpelayanan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ppkpelayanan']) && $this->nmgp_cmp_readonly['ppkpelayanan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ppkpelayanan']);
       $sStyleReadLab_ppkpelayanan = '';
       $sStyleReadInp_ppkpelayanan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ppkpelayanan']) && $this->nmgp_cmp_hidden['ppkpelayanan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ppkpelayanan" value="<?php echo $this->form_encode_input($ppkpelayanan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ppkpelayanan_label" id="hidden_field_label_ppkpelayanan" style="<?php echo $sStyleHidden_ppkpelayanan; ?>"><span id="id_label_ppkpelayanan"><?php echo $this->nm_new_label['ppkpelayanan']; ?></span></TD>
    <TD class="scFormDataOdd css_ppkpelayanan_line" id="hidden_field_data_ppkpelayanan" style="<?php echo $sStyleHidden_ppkpelayanan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ppkpelayanan"]) &&  $this->nmgp_cmp_readonly["ppkpelayanan"] == "on") { 

 ?>
<input type="hidden" name="ppkpelayanan" value="<?php echo $this->form_encode_input($ppkpelayanan) . "\">" . $ppkpelayanan . ""; ?>
<?php } else { ?>
<span id="id_read_on_ppkpelayanan" class="sc-ui-readonly-ppkpelayanan css_ppkpelayanan_line" style="<?php echo $sStyleReadLab_ppkpelayanan; ?>"><?php echo $this->ppkpelayanan; ?></span><span id="id_read_off_ppkpelayanan" class="css_read_off_ppkpelayanan" style="white-space: nowrap;<?php echo $sStyleReadInp_ppkpelayanan; ?>">
 <input class="sc-js-input scFormObjectOdd css_ppkpelayanan_obj" style="" id="id_sc_field_ppkpelayanan" type=text name="ppkpelayanan" value="<?php echo $this->form_encode_input($ppkpelayanan) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nmppkpelayanan']))
    {
        $this->nm_new_label['nmppkpelayanan'] = "PPK Pelayanan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nmppkpelayanan = $this->nmppkpelayanan;
   $sStyleHidden_nmppkpelayanan = '';
   if (isset($this->nmgp_cmp_hidden['nmppkpelayanan']) && $this->nmgp_cmp_hidden['nmppkpelayanan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nmppkpelayanan']);
       $sStyleHidden_nmppkpelayanan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nmppkpelayanan = 'display: none;';
   $sStyleReadInp_nmppkpelayanan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nmppkpelayanan']) && $this->nmgp_cmp_readonly['nmppkpelayanan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nmppkpelayanan']);
       $sStyleReadLab_nmppkpelayanan = '';
       $sStyleReadInp_nmppkpelayanan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nmppkpelayanan']) && $this->nmgp_cmp_hidden['nmppkpelayanan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nmppkpelayanan" value="<?php echo $this->form_encode_input($nmppkpelayanan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nmppkpelayanan_label" id="hidden_field_label_nmppkpelayanan" style="<?php echo $sStyleHidden_nmppkpelayanan; ?>"><span id="id_label_nmppkpelayanan"><?php echo $this->nm_new_label['nmppkpelayanan']; ?></span></TD>
    <TD class="scFormDataOdd css_nmppkpelayanan_line" id="hidden_field_data_nmppkpelayanan" style="<?php echo $sStyleHidden_nmppkpelayanan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nmppkpelayanan"]) &&  $this->nmgp_cmp_readonly["nmppkpelayanan"] == "on") { 

 ?>
<input type="hidden" name="nmppkpelayanan" value="<?php echo $this->form_encode_input($nmppkpelayanan) . "\">" . $nmppkpelayanan . ""; ?>
<?php } else { ?>
<span id="id_read_on_nmppkpelayanan" class="sc-ui-readonly-nmppkpelayanan css_nmppkpelayanan_line" style="<?php echo $sStyleReadLab_nmppkpelayanan; ?>"><?php echo $this->nmppkpelayanan; ?></span><span id="id_read_off_nmppkpelayanan" class="css_read_off_nmppkpelayanan" style="white-space: nowrap;<?php echo $sStyleReadInp_nmppkpelayanan; ?>">
 <input class="sc-js-input scFormObjectOdd css_nmppkpelayanan_obj" style="" id="id_sc_field_nmppkpelayanan" type=text name="nmppkpelayanan" value="<?php echo $this->form_encode_input($nmppkpelayanan) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['jnspelayanan']))
   {
       $this->nm_new_label['jnspelayanan'] = "Jenis Pelayanan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jnspelayanan = $this->jnspelayanan;
   $sStyleHidden_jnspelayanan = '';
   if (isset($this->nmgp_cmp_hidden['jnspelayanan']) && $this->nmgp_cmp_hidden['jnspelayanan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jnspelayanan']);
       $sStyleHidden_jnspelayanan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jnspelayanan = 'display: none;';
   $sStyleReadInp_jnspelayanan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jnspelayanan']) && $this->nmgp_cmp_readonly['jnspelayanan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jnspelayanan']);
       $sStyleReadLab_jnspelayanan = '';
       $sStyleReadInp_jnspelayanan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jnspelayanan']) && $this->nmgp_cmp_hidden['jnspelayanan'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="jnspelayanan" value="<?php echo $this->form_encode_input($this->jnspelayanan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_jnspelayanan_label" id="hidden_field_label_jnspelayanan" style="<?php echo $sStyleHidden_jnspelayanan; ?>"><span id="id_label_jnspelayanan"><?php echo $this->nm_new_label['jnspelayanan']; ?></span></TD>
    <TD class="scFormDataOdd css_jnspelayanan_line" id="hidden_field_data_jnspelayanan" style="<?php echo $sStyleHidden_jnspelayanan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jnspelayanan"]) &&  $this->nmgp_cmp_readonly["jnspelayanan"] == "on") { 

$jnspelayanan_look = "";
 if ($this->jnspelayanan == "1") { $jnspelayanan_look .= "Rawat Inap" ;} 
 if ($this->jnspelayanan == "2") { $jnspelayanan_look .= "Rawat Jalan" ;} 
 if (empty($jnspelayanan_look)) { $jnspelayanan_look = $this->jnspelayanan; }
?>
<input type="hidden" name="jnspelayanan" value="<?php echo $this->form_encode_input($jnspelayanan) . "\">" . $jnspelayanan_look . ""; ?>
<?php } else { ?>
<?php

$jnspelayanan_look = "";
 if ($this->jnspelayanan == "1") { $jnspelayanan_look .= "Rawat Inap" ;} 
 if ($this->jnspelayanan == "2") { $jnspelayanan_look .= "Rawat Jalan" ;} 
 if (empty($jnspelayanan_look)) { $jnspelayanan_look = $this->jnspelayanan; }
?>
<span id="id_read_on_jnspelayanan" class="css_jnspelayanan_line"  style="<?php echo $sStyleReadLab_jnspelayanan; ?>"><?php echo $this->form_encode_input($jnspelayanan_look); ?></span><span id="id_read_off_jnspelayanan" class="css_read_off_jnspelayanan" style="white-space: nowrap; <?php echo $sStyleReadInp_jnspelayanan; ?>">
 <span id="idAjaxSelect_jnspelayanan"><select class="sc-js-input scFormObjectOdd css_jnspelayanan_obj" style="" id="id_sc_field_jnspelayanan" name="jnspelayanan" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->jnspelayanan == "1") { echo " selected" ;} ?>>Rawat Inap</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_jnspelayanan'][] = '1'; ?>
 <option  value="2" <?php  if ($this->jnspelayanan == "2") { echo " selected" ;} ?>>Rawat Jalan</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_jnspelayanan'][] = '2'; ?>
 </select></span>
</span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['klsrawat']))
   {
       $this->nm_new_label['klsrawat'] = "Kelas Rawat";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $klsrawat = $this->klsrawat;
   $sStyleHidden_klsrawat = '';
   if (isset($this->nmgp_cmp_hidden['klsrawat']) && $this->nmgp_cmp_hidden['klsrawat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['klsrawat']);
       $sStyleHidden_klsrawat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_klsrawat = 'display: none;';
   $sStyleReadInp_klsrawat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['klsrawat']) && $this->nmgp_cmp_readonly['klsrawat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['klsrawat']);
       $sStyleReadLab_klsrawat = '';
       $sStyleReadInp_klsrawat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['klsrawat']) && $this->nmgp_cmp_hidden['klsrawat'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="klsrawat" value="<?php echo $this->form_encode_input($this->klsrawat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_klsrawat_label" id="hidden_field_label_klsrawat" style="<?php echo $sStyleHidden_klsrawat; ?>"><span id="id_label_klsrawat"><?php echo $this->nm_new_label['klsrawat']; ?></span></TD>
    <TD class="scFormDataOdd css_klsrawat_line" id="hidden_field_data_klsrawat" style="<?php echo $sStyleHidden_klsrawat; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["klsrawat"]) &&  $this->nmgp_cmp_readonly["klsrawat"] == "on") { 

$klsrawat_look = "";
 if ($this->klsrawat == "1") { $klsrawat_look .= "Kelas 1" ;} 
 if ($this->klsrawat == "2") { $klsrawat_look .= "Kelas 2" ;} 
 if ($this->klsrawat == "3") { $klsrawat_look .= "Kelas 3" ;} 
 if (empty($klsrawat_look)) { $klsrawat_look = $this->klsrawat; }
?>
<input type="hidden" name="klsrawat" value="<?php echo $this->form_encode_input($klsrawat) . "\">" . $klsrawat_look . ""; ?>
<?php } else { ?>
<?php

$klsrawat_look = "";
 if ($this->klsrawat == "1") { $klsrawat_look .= "Kelas 1" ;} 
 if ($this->klsrawat == "2") { $klsrawat_look .= "Kelas 2" ;} 
 if ($this->klsrawat == "3") { $klsrawat_look .= "Kelas 3" ;} 
 if (empty($klsrawat_look)) { $klsrawat_look = $this->klsrawat; }
?>
<span id="id_read_on_klsrawat" class="css_klsrawat_line"  style="<?php echo $sStyleReadLab_klsrawat; ?>"><?php echo $this->form_encode_input($klsrawat_look); ?></span><span id="id_read_off_klsrawat" class="css_read_off_klsrawat" style="white-space: nowrap; <?php echo $sStyleReadInp_klsrawat; ?>">
 <span id="idAjaxSelect_klsrawat"><select class="sc-js-input scFormObjectOdd css_klsrawat_obj" style="" id="id_sc_field_klsrawat" name="klsrawat" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->klsrawat == "1") { echo " selected" ;} ?>>Kelas 1</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_klsrawat'][] = '1'; ?>
 <option  value="2" <?php  if ($this->klsrawat == "2") { echo " selected" ;} ?>>Kelas 2</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_klsrawat'][] = '2'; ?>
 <option  value="3" <?php  if ($this->klsrawat == "3") { echo " selected" ;} ?>>Kelas 3</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_klsrawat'][] = '3'; ?>
 </select></span>
</span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nomr']))
    {
        $this->nm_new_label['nomr'] = "No. MR";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nomr = $this->nomr;
   $sStyleHidden_nomr = '';
   if (isset($this->nmgp_cmp_hidden['nomr']) && $this->nmgp_cmp_hidden['nomr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nomr']);
       $sStyleHidden_nomr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nomr = 'display: none;';
   $sStyleReadInp_nomr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nomr']) && $this->nmgp_cmp_readonly['nomr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nomr']);
       $sStyleReadLab_nomr = '';
       $sStyleReadInp_nomr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nomr']) && $this->nmgp_cmp_hidden['nomr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nomr" value="<?php echo $this->form_encode_input($nomr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nomr_label" id="hidden_field_label_nomr" style="<?php echo $sStyleHidden_nomr; ?>"><span id="id_label_nomr"><?php echo $this->nm_new_label['nomr']; ?></span></TD>
    <TD class="scFormDataOdd css_nomr_line" id="hidden_field_data_nomr" style="<?php echo $sStyleHidden_nomr; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nomr"]) &&  $this->nmgp_cmp_readonly["nomr"] == "on") { 

 ?>
<input type="hidden" name="nomr" value="<?php echo $this->form_encode_input($nomr) . "\">" . $nomr . ""; ?>
<?php } else { ?>
<span id="id_read_on_nomr" class="sc-ui-readonly-nomr css_nomr_line" style="<?php echo $sStyleReadLab_nomr; ?>"><?php echo $this->nomr; ?></span><span id="id_read_off_nomr" class="css_read_off_nomr" style="white-space: nowrap;<?php echo $sStyleReadInp_nomr; ?>">
 <input class="sc-js-input scFormObjectOdd css_nomr_obj" style="" id="id_sc_field_nomr" type=text name="nomr" value="<?php echo $this->form_encode_input($nomr) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['asalrujukan']))
   {
       $this->nm_new_label['asalrujukan'] = "Asal Rujukan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $asalrujukan = $this->asalrujukan;
   $sStyleHidden_asalrujukan = '';
   if (isset($this->nmgp_cmp_hidden['asalrujukan']) && $this->nmgp_cmp_hidden['asalrujukan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['asalrujukan']);
       $sStyleHidden_asalrujukan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_asalrujukan = 'display: none;';
   $sStyleReadInp_asalrujukan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['asalrujukan']) && $this->nmgp_cmp_readonly['asalrujukan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['asalrujukan']);
       $sStyleReadLab_asalrujukan = '';
       $sStyleReadInp_asalrujukan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['asalrujukan']) && $this->nmgp_cmp_hidden['asalrujukan'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="asalrujukan" value="<?php echo $this->form_encode_input($this->asalrujukan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_asalrujukan_label" id="hidden_field_label_asalrujukan" style="<?php echo $sStyleHidden_asalrujukan; ?>"><span id="id_label_asalrujukan"><?php echo $this->nm_new_label['asalrujukan']; ?></span></TD>
    <TD class="scFormDataOdd css_asalrujukan_line" id="hidden_field_data_asalrujukan" style="<?php echo $sStyleHidden_asalrujukan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["asalrujukan"]) &&  $this->nmgp_cmp_readonly["asalrujukan"] == "on") { 

$asalrujukan_look = "";
 if ($this->asalrujukan == "1") { $asalrujukan_look .= "Faskes 1" ;} 
 if ($this->asalrujukan == "2") { $asalrujukan_look .= "Faskes 2" ;} 
 if (empty($asalrujukan_look)) { $asalrujukan_look = $this->asalrujukan; }
?>
<input type="hidden" name="asalrujukan" value="<?php echo $this->form_encode_input($asalrujukan) . "\">" . $asalrujukan_look . ""; ?>
<?php } else { ?>
<?php

$asalrujukan_look = "";
 if ($this->asalrujukan == "1") { $asalrujukan_look .= "Faskes 1" ;} 
 if ($this->asalrujukan == "2") { $asalrujukan_look .= "Faskes 2" ;} 
 if (empty($asalrujukan_look)) { $asalrujukan_look = $this->asalrujukan; }
?>
<span id="id_read_on_asalrujukan" class="css_asalrujukan_line"  style="<?php echo $sStyleReadLab_asalrujukan; ?>"><?php echo $this->form_encode_input($asalrujukan_look); ?></span><span id="id_read_off_asalrujukan" class="css_read_off_asalrujukan" style="white-space: nowrap; <?php echo $sStyleReadInp_asalrujukan; ?>">
 <span id="idAjaxSelect_asalrujukan"><select class="sc-js-input scFormObjectOdd css_asalrujukan_obj" style="" id="id_sc_field_asalrujukan" name="asalrujukan" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->asalrujukan == "1") { echo " selected" ;} ?>>Faskes 1</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_asalrujukan'][] = '1'; ?>
 <option  value="2" <?php  if ($this->asalrujukan == "2") { echo " selected" ;} ?>>Faskes 2</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_asalrujukan'][] = '2'; ?>
 </select></span>
</span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['norujukan']))
    {
        $this->nm_new_label['norujukan'] = "No. Rujukan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $norujukan = $this->norujukan;
   $sStyleHidden_norujukan = '';
   if (isset($this->nmgp_cmp_hidden['norujukan']) && $this->nmgp_cmp_hidden['norujukan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['norujukan']);
       $sStyleHidden_norujukan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_norujukan = 'display: none;';
   $sStyleReadInp_norujukan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['norujukan']) && $this->nmgp_cmp_readonly['norujukan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['norujukan']);
       $sStyleReadLab_norujukan = '';
       $sStyleReadInp_norujukan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['norujukan']) && $this->nmgp_cmp_hidden['norujukan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="norujukan" value="<?php echo $this->form_encode_input($norujukan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_norujukan_label" id="hidden_field_label_norujukan" style="<?php echo $sStyleHidden_norujukan; ?>"><span id="id_label_norujukan"><?php echo $this->nm_new_label['norujukan']; ?></span></TD>
    <TD class="scFormDataOdd css_norujukan_line" id="hidden_field_data_norujukan" style="<?php echo $sStyleHidden_norujukan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["norujukan"]) &&  $this->nmgp_cmp_readonly["norujukan"] == "on") { 

 ?>
<input type="hidden" name="norujukan" value="<?php echo $this->form_encode_input($norujukan) . "\">" . $norujukan . ""; ?>
<?php } else { ?>
<span id="id_read_on_norujukan" class="sc-ui-readonly-norujukan css_norujukan_line" style="<?php echo $sStyleReadLab_norujukan; ?>"><?php echo $this->norujukan; ?></span><span id="id_read_off_norujukan" class="css_read_off_norujukan" style="white-space: nowrap;<?php echo $sStyleReadInp_norujukan; ?>">
 <input class="sc-js-input scFormObjectOdd css_norujukan_obj" style="" id="id_sc_field_norujukan" type=text name="norujukan" value="<?php echo $this->form_encode_input($norujukan) ?>"
 size=20 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tglrujukan']))
    {
        $this->nm_new_label['tglrujukan'] = "Tanggal Rujukan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tglrujukan = $this->tglrujukan;
   $sStyleHidden_tglrujukan = '';
   if (isset($this->nmgp_cmp_hidden['tglrujukan']) && $this->nmgp_cmp_hidden['tglrujukan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tglrujukan']);
       $sStyleHidden_tglrujukan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tglrujukan = 'display: none;';
   $sStyleReadInp_tglrujukan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tglrujukan']) && $this->nmgp_cmp_readonly['tglrujukan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tglrujukan']);
       $sStyleReadLab_tglrujukan = '';
       $sStyleReadInp_tglrujukan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tglrujukan']) && $this->nmgp_cmp_hidden['tglrujukan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tglrujukan" value="<?php echo $this->form_encode_input($tglrujukan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tglrujukan_label" id="hidden_field_label_tglrujukan" style="<?php echo $sStyleHidden_tglrujukan; ?>"><span id="id_label_tglrujukan"><?php echo $this->nm_new_label['tglrujukan']; ?></span></TD>
    <TD class="scFormDataOdd css_tglrujukan_line" id="hidden_field_data_tglrujukan" style="<?php echo $sStyleHidden_tglrujukan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tglrujukan"]) &&  $this->nmgp_cmp_readonly["tglrujukan"] == "on") { 

 ?>
<input type="hidden" name="tglrujukan" value="<?php echo $this->form_encode_input($tglrujukan) . "\">" . $tglrujukan . ""; ?>
<?php } else { ?>
<span id="id_read_on_tglrujukan" class="sc-ui-readonly-tglrujukan css_tglrujukan_line" style="<?php echo $sStyleReadLab_tglrujukan; ?>"><?php echo $this->tglrujukan; ?></span><span id="id_read_off_tglrujukan" class="css_read_off_tglrujukan" style="white-space: nowrap;<?php echo $sStyleReadInp_tglrujukan; ?>">
 <input class="sc-js-input scFormObjectOdd css_tglrujukan_obj" style="" id="id_sc_field_tglrujukan" type=text name="tglrujukan" value="<?php echo $this->form_encode_input($tglrujukan) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ppkrujukan']))
    {
        $this->nm_new_label['ppkrujukan'] = "Kode PPK Rujukan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ppkrujukan = $this->ppkrujukan;
   $sStyleHidden_ppkrujukan = '';
   if (isset($this->nmgp_cmp_hidden['ppkrujukan']) && $this->nmgp_cmp_hidden['ppkrujukan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ppkrujukan']);
       $sStyleHidden_ppkrujukan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ppkrujukan = 'display: none;';
   $sStyleReadInp_ppkrujukan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ppkrujukan']) && $this->nmgp_cmp_readonly['ppkrujukan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ppkrujukan']);
       $sStyleReadLab_ppkrujukan = '';
       $sStyleReadInp_ppkrujukan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ppkrujukan']) && $this->nmgp_cmp_hidden['ppkrujukan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ppkrujukan" value="<?php echo $this->form_encode_input($ppkrujukan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ppkrujukan_label" id="hidden_field_label_ppkrujukan" style="<?php echo $sStyleHidden_ppkrujukan; ?>"><span id="id_label_ppkrujukan"><?php echo $this->nm_new_label['ppkrujukan']; ?></span></TD>
    <TD class="scFormDataOdd css_ppkrujukan_line" id="hidden_field_data_ppkrujukan" style="<?php echo $sStyleHidden_ppkrujukan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ppkrujukan"]) &&  $this->nmgp_cmp_readonly["ppkrujukan"] == "on") { 

 ?>
<input type="hidden" name="ppkrujukan" value="<?php echo $this->form_encode_input($ppkrujukan) . "\">" . $ppkrujukan . ""; ?>
<?php } else { ?>
<span id="id_read_on_ppkrujukan" class="sc-ui-readonly-ppkrujukan css_ppkrujukan_line" style="<?php echo $sStyleReadLab_ppkrujukan; ?>"><?php echo $this->ppkrujukan; ?></span><span id="id_read_off_ppkrujukan" class="css_read_off_ppkrujukan" style="white-space: nowrap;<?php echo $sStyleReadInp_ppkrujukan; ?>">
 <input class="sc-js-input scFormObjectOdd css_ppkrujukan_obj" style="" id="id_sc_field_ppkrujukan" type=text name="ppkrujukan" value="<?php echo $this->form_encode_input($ppkrujukan) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nmppkrujukan']))
    {
        $this->nm_new_label['nmppkrujukan'] = "Nama PPK Rujukan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nmppkrujukan = $this->nmppkrujukan;
   $sStyleHidden_nmppkrujukan = '';
   if (isset($this->nmgp_cmp_hidden['nmppkrujukan']) && $this->nmgp_cmp_hidden['nmppkrujukan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nmppkrujukan']);
       $sStyleHidden_nmppkrujukan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nmppkrujukan = 'display: none;';
   $sStyleReadInp_nmppkrujukan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nmppkrujukan']) && $this->nmgp_cmp_readonly['nmppkrujukan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nmppkrujukan']);
       $sStyleReadLab_nmppkrujukan = '';
       $sStyleReadInp_nmppkrujukan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nmppkrujukan']) && $this->nmgp_cmp_hidden['nmppkrujukan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nmppkrujukan" value="<?php echo $this->form_encode_input($nmppkrujukan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nmppkrujukan_label" id="hidden_field_label_nmppkrujukan" style="<?php echo $sStyleHidden_nmppkrujukan; ?>"><span id="id_label_nmppkrujukan"><?php echo $this->nm_new_label['nmppkrujukan']; ?></span></TD>
    <TD class="scFormDataOdd css_nmppkrujukan_line" id="hidden_field_data_nmppkrujukan" style="<?php echo $sStyleHidden_nmppkrujukan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nmppkrujukan"]) &&  $this->nmgp_cmp_readonly["nmppkrujukan"] == "on") { 

 ?>
<input type="hidden" name="nmppkrujukan" value="<?php echo $this->form_encode_input($nmppkrujukan) . "\">" . $nmppkrujukan . ""; ?>
<?php } else { ?>
<span id="id_read_on_nmppkrujukan" class="sc-ui-readonly-nmppkrujukan css_nmppkrujukan_line" style="<?php echo $sStyleReadLab_nmppkrujukan; ?>"><?php echo $this->nmppkrujukan; ?></span><span id="id_read_off_nmppkrujukan" class="css_read_off_nmppkrujukan" style="white-space: nowrap;<?php echo $sStyleReadInp_nmppkrujukan; ?>">
 <input class="sc-js-input scFormObjectOdd css_nmppkrujukan_obj" style="" id="id_sc_field_nmppkrujukan" type=text name="nmppkrujukan" value="<?php echo $this->form_encode_input($nmppkrujukan) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['catatan']))
    {
        $this->nm_new_label['catatan'] = "Catatan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $catatan = $this->catatan;
   $sStyleHidden_catatan = '';
   if (isset($this->nmgp_cmp_hidden['catatan']) && $this->nmgp_cmp_hidden['catatan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['catatan']);
       $sStyleHidden_catatan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_catatan = 'display: none;';
   $sStyleReadInp_catatan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['catatan']) && $this->nmgp_cmp_readonly['catatan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['catatan']);
       $sStyleReadLab_catatan = '';
       $sStyleReadInp_catatan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['catatan']) && $this->nmgp_cmp_hidden['catatan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="catatan" value="<?php echo $this->form_encode_input($catatan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_catatan_label" id="hidden_field_label_catatan" style="<?php echo $sStyleHidden_catatan; ?>"><span id="id_label_catatan"><?php echo $this->nm_new_label['catatan']; ?></span></TD>
    <TD class="scFormDataOdd css_catatan_line" id="hidden_field_data_catatan" style="<?php echo $sStyleHidden_catatan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["catatan"]) &&  $this->nmgp_cmp_readonly["catatan"] == "on") { 

 ?>
<input type="hidden" name="catatan" value="<?php echo $this->form_encode_input($catatan) . "\">" . $catatan . ""; ?>
<?php } else { ?>
<span id="id_read_on_catatan" class="sc-ui-readonly-catatan css_catatan_line" style="<?php echo $sStyleReadLab_catatan; ?>"><?php echo $this->catatan; ?></span><span id="id_read_off_catatan" class="css_read_off_catatan" style="white-space: nowrap;<?php echo $sStyleReadInp_catatan; ?>">
 <input class="sc-js-input scFormObjectOdd css_catatan_obj" style="" id="id_sc_field_catatan" type=text name="catatan" value="<?php echo $this->form_encode_input($catatan) ?>"
 size=40 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diagawal']))
    {
        $this->nm_new_label['diagawal'] = "Kode Diag. Awal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diagawal = $this->diagawal;
   $sStyleHidden_diagawal = '';
   if (isset($this->nmgp_cmp_hidden['diagawal']) && $this->nmgp_cmp_hidden['diagawal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diagawal']);
       $sStyleHidden_diagawal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diagawal = 'display: none;';
   $sStyleReadInp_diagawal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diagawal']) && $this->nmgp_cmp_readonly['diagawal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diagawal']);
       $sStyleReadLab_diagawal = '';
       $sStyleReadInp_diagawal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diagawal']) && $this->nmgp_cmp_hidden['diagawal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diagawal" value="<?php echo $this->form_encode_input($diagawal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_diagawal_label" id="hidden_field_label_diagawal" style="<?php echo $sStyleHidden_diagawal; ?>"><span id="id_label_diagawal"><?php echo $this->nm_new_label['diagawal']; ?></span></TD>
    <TD class="scFormDataOdd css_diagawal_line" id="hidden_field_data_diagawal" style="<?php echo $sStyleHidden_diagawal; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diagawal"]) &&  $this->nmgp_cmp_readonly["diagawal"] == "on") { 

 ?>
<input type="hidden" name="diagawal" value="<?php echo $this->form_encode_input($diagawal) . "\">" . $diagawal . ""; ?>
<?php } else { ?>
<span id="id_read_on_diagawal" class="sc-ui-readonly-diagawal css_diagawal_line" style="<?php echo $sStyleReadLab_diagawal; ?>"><?php echo $this->diagawal; ?></span><span id="id_read_off_diagawal" class="css_read_off_diagawal" style="white-space: nowrap;<?php echo $sStyleReadInp_diagawal; ?>">
 <input class="sc-js-input scFormObjectOdd css_diagawal_obj" style="" id="id_sc_field_diagawal" type=text name="diagawal" value="<?php echo $this->form_encode_input($diagawal) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nmdiagawal']))
    {
        $this->nm_new_label['nmdiagawal'] = "Nama Diag. Awal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nmdiagawal = $this->nmdiagawal;
   $sStyleHidden_nmdiagawal = '';
   if (isset($this->nmgp_cmp_hidden['nmdiagawal']) && $this->nmgp_cmp_hidden['nmdiagawal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nmdiagawal']);
       $sStyleHidden_nmdiagawal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nmdiagawal = 'display: none;';
   $sStyleReadInp_nmdiagawal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nmdiagawal']) && $this->nmgp_cmp_readonly['nmdiagawal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nmdiagawal']);
       $sStyleReadLab_nmdiagawal = '';
       $sStyleReadInp_nmdiagawal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nmdiagawal']) && $this->nmgp_cmp_hidden['nmdiagawal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nmdiagawal" value="<?php echo $this->form_encode_input($nmdiagawal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nmdiagawal_label" id="hidden_field_label_nmdiagawal" style="<?php echo $sStyleHidden_nmdiagawal; ?>"><span id="id_label_nmdiagawal"><?php echo $this->nm_new_label['nmdiagawal']; ?></span></TD>
    <TD class="scFormDataOdd css_nmdiagawal_line" id="hidden_field_data_nmdiagawal" style="<?php echo $sStyleHidden_nmdiagawal; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nmdiagawal"]) &&  $this->nmgp_cmp_readonly["nmdiagawal"] == "on") { 

 ?>
<input type="hidden" name="nmdiagawal" value="<?php echo $this->form_encode_input($nmdiagawal) . "\">" . $nmdiagawal . ""; ?>
<?php } else { ?>
<span id="id_read_on_nmdiagawal" class="sc-ui-readonly-nmdiagawal css_nmdiagawal_line" style="<?php echo $sStyleReadLab_nmdiagawal; ?>"><?php echo $this->nmdiagawal; ?></span><span id="id_read_off_nmdiagawal" class="css_read_off_nmdiagawal" style="white-space: nowrap;<?php echo $sStyleReadInp_nmdiagawal; ?>">
 <input class="sc-js-input scFormObjectOdd css_nmdiagawal_obj" style="" id="id_sc_field_nmdiagawal" type=text name="nmdiagawal" value="<?php echo $this->form_encode_input($nmdiagawal) ?>"
 size=40 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['politujuan']))
    {
        $this->nm_new_label['politujuan'] = "Kode Poli Tujuan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $politujuan = $this->politujuan;
   $sStyleHidden_politujuan = '';
   if (isset($this->nmgp_cmp_hidden['politujuan']) && $this->nmgp_cmp_hidden['politujuan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['politujuan']);
       $sStyleHidden_politujuan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_politujuan = 'display: none;';
   $sStyleReadInp_politujuan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['politujuan']) && $this->nmgp_cmp_readonly['politujuan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['politujuan']);
       $sStyleReadLab_politujuan = '';
       $sStyleReadInp_politujuan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['politujuan']) && $this->nmgp_cmp_hidden['politujuan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="politujuan" value="<?php echo $this->form_encode_input($politujuan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_politujuan_label" id="hidden_field_label_politujuan" style="<?php echo $sStyleHidden_politujuan; ?>"><span id="id_label_politujuan"><?php echo $this->nm_new_label['politujuan']; ?></span></TD>
    <TD class="scFormDataOdd css_politujuan_line" id="hidden_field_data_politujuan" style="<?php echo $sStyleHidden_politujuan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["politujuan"]) &&  $this->nmgp_cmp_readonly["politujuan"] == "on") { 

 ?>
<input type="hidden" name="politujuan" value="<?php echo $this->form_encode_input($politujuan) . "\">" . $politujuan . ""; ?>
<?php } else { ?>
<span id="id_read_on_politujuan" class="sc-ui-readonly-politujuan css_politujuan_line" style="<?php echo $sStyleReadLab_politujuan; ?>"><?php echo $this->politujuan; ?></span><span id="id_read_off_politujuan" class="css_read_off_politujuan" style="white-space: nowrap;<?php echo $sStyleReadInp_politujuan; ?>">
 <input class="sc-js-input scFormObjectOdd css_politujuan_obj" style="" id="id_sc_field_politujuan" type=text name="politujuan" value="<?php echo $this->form_encode_input($politujuan) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nmpolitujuan']))
    {
        $this->nm_new_label['nmpolitujuan'] = "Nama Poli Tujuan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nmpolitujuan = $this->nmpolitujuan;
   $sStyleHidden_nmpolitujuan = '';
   if (isset($this->nmgp_cmp_hidden['nmpolitujuan']) && $this->nmgp_cmp_hidden['nmpolitujuan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nmpolitujuan']);
       $sStyleHidden_nmpolitujuan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nmpolitujuan = 'display: none;';
   $sStyleReadInp_nmpolitujuan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nmpolitujuan']) && $this->nmgp_cmp_readonly['nmpolitujuan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nmpolitujuan']);
       $sStyleReadLab_nmpolitujuan = '';
       $sStyleReadInp_nmpolitujuan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nmpolitujuan']) && $this->nmgp_cmp_hidden['nmpolitujuan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nmpolitujuan" value="<?php echo $this->form_encode_input($nmpolitujuan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nmpolitujuan_label" id="hidden_field_label_nmpolitujuan" style="<?php echo $sStyleHidden_nmpolitujuan; ?>"><span id="id_label_nmpolitujuan"><?php echo $this->nm_new_label['nmpolitujuan']; ?></span></TD>
    <TD class="scFormDataOdd css_nmpolitujuan_line" id="hidden_field_data_nmpolitujuan" style="<?php echo $sStyleHidden_nmpolitujuan; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nmpolitujuan"]) &&  $this->nmgp_cmp_readonly["nmpolitujuan"] == "on") { 

 ?>
<input type="hidden" name="nmpolitujuan" value="<?php echo $this->form_encode_input($nmpolitujuan) . "\">" . $nmpolitujuan . ""; ?>
<?php } else { ?>
<span id="id_read_on_nmpolitujuan" class="sc-ui-readonly-nmpolitujuan css_nmpolitujuan_line" style="<?php echo $sStyleReadLab_nmpolitujuan; ?>"><?php echo $this->nmpolitujuan; ?></span><span id="id_read_off_nmpolitujuan" class="css_read_off_nmpolitujuan" style="white-space: nowrap;<?php echo $sStyleReadInp_nmpolitujuan; ?>">
 <input class="sc-js-input scFormObjectOdd css_nmpolitujuan_obj" style="" id="id_sc_field_nmpolitujuan" type=text name="nmpolitujuan" value="<?php echo $this->form_encode_input($nmpolitujuan) ?>"
 size=40 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['polieksekutif']))
   {
       $this->nm_new_label['polieksekutif'] = "Poli Eksekutif";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $polieksekutif = $this->polieksekutif;
   $sStyleHidden_polieksekutif = '';
   if (isset($this->nmgp_cmp_hidden['polieksekutif']) && $this->nmgp_cmp_hidden['polieksekutif'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['polieksekutif']);
       $sStyleHidden_polieksekutif = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_polieksekutif = 'display: none;';
   $sStyleReadInp_polieksekutif = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['polieksekutif']) && $this->nmgp_cmp_readonly['polieksekutif'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['polieksekutif']);
       $sStyleReadLab_polieksekutif = '';
       $sStyleReadInp_polieksekutif = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['polieksekutif']) && $this->nmgp_cmp_hidden['polieksekutif'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="polieksekutif" value="<?php echo $this->form_encode_input($this->polieksekutif) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_polieksekutif_label" id="hidden_field_label_polieksekutif" style="<?php echo $sStyleHidden_polieksekutif; ?>"><span id="id_label_polieksekutif"><?php echo $this->nm_new_label['polieksekutif']; ?></span></TD>
    <TD class="scFormDataOdd css_polieksekutif_line" id="hidden_field_data_polieksekutif" style="<?php echo $sStyleHidden_polieksekutif; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["polieksekutif"]) &&  $this->nmgp_cmp_readonly["polieksekutif"] == "on") { 

$polieksekutif_look = "";
 if ($this->polieksekutif == "0") { $polieksekutif_look .= "Tidak" ;} 
 if ($this->polieksekutif == "1") { $polieksekutif_look .= "Ya" ;} 
 if (empty($polieksekutif_look)) { $polieksekutif_look = $this->polieksekutif; }
?>
<input type="hidden" name="polieksekutif" value="<?php echo $this->form_encode_input($polieksekutif) . "\">" . $polieksekutif_look . ""; ?>
<?php } else { ?>
<?php

$polieksekutif_look = "";
 if ($this->polieksekutif == "0") { $polieksekutif_look .= "Tidak" ;} 
 if ($this->polieksekutif == "1") { $polieksekutif_look .= "Ya" ;} 
 if (empty($polieksekutif_look)) { $polieksekutif_look = $this->polieksekutif; }
?>
<span id="id_read_on_polieksekutif" class="css_polieksekutif_line"  style="<?php echo $sStyleReadLab_polieksekutif; ?>"><?php echo $this->form_encode_input($polieksekutif_look); ?></span><span id="id_read_off_polieksekutif" class="css_read_off_polieksekutif" style="white-space: nowrap; <?php echo $sStyleReadInp_polieksekutif; ?>">
 <span id="idAjaxSelect_polieksekutif"><select class="sc-js-input scFormObjectOdd css_polieksekutif_obj" style="" id="id_sc_field_polieksekutif" name="polieksekutif" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="0" <?php  if ($this->polieksekutif == "0") { echo " selected" ;} ?>>Tidak</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_polieksekutif'][] = '0'; ?>
 <option  value="1" <?php  if ($this->polieksekutif == "1") { echo " selected" ;} ?>>Ya</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_polieksekutif'][] = '1'; ?>
 </select></span>
</span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['cob']))
   {
       $this->nm_new_label['cob'] = "COB";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cob = $this->cob;
   $sStyleHidden_cob = '';
   if (isset($this->nmgp_cmp_hidden['cob']) && $this->nmgp_cmp_hidden['cob'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cob']);
       $sStyleHidden_cob = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cob = 'display: none;';
   $sStyleReadInp_cob = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cob']) && $this->nmgp_cmp_readonly['cob'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cob']);
       $sStyleReadLab_cob = '';
       $sStyleReadInp_cob = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cob']) && $this->nmgp_cmp_hidden['cob'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cob" value="<?php echo $this->form_encode_input($this->cob) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cob_label" id="hidden_field_label_cob" style="<?php echo $sStyleHidden_cob; ?>"><span id="id_label_cob"><?php echo $this->nm_new_label['cob']; ?></span></TD>
    <TD class="scFormDataOdd css_cob_line" id="hidden_field_data_cob" style="<?php echo $sStyleHidden_cob; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cob"]) &&  $this->nmgp_cmp_readonly["cob"] == "on") { 

$cob_look = "";
 if ($this->cob == "0") { $cob_look .= "Tidak" ;} 
 if ($this->cob == "1") { $cob_look .= "Ya" ;} 
 if (empty($cob_look)) { $cob_look = $this->cob; }
?>
<input type="hidden" name="cob" value="<?php echo $this->form_encode_input($cob) . "\">" . $cob_look . ""; ?>
<?php } else { ?>
<?php

$cob_look = "";
 if ($this->cob == "0") { $cob_look .= "Tidak" ;} 
 if ($this->cob == "1") { $cob_look .= "Ya" ;} 
 if (empty($cob_look)) { $cob_look = $this->cob; }
?>
<span id="id_read_on_cob" class="css_cob_line"  style="<?php echo $sStyleReadLab_cob; ?>"><?php echo $this->form_encode_input($cob_look); ?></span><span id="id_read_off_cob" class="css_read_off_cob" style="white-space: nowrap; <?php echo $sStyleReadInp_cob; ?>">
 <span id="idAjaxSelect_cob"><select class="sc-js-input scFormObjectOdd css_cob_obj" style="" id="id_sc_field_cob" name="cob" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="0" <?php  if ($this->cob == "0") { echo " selected" ;} ?>>Tidak</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_cob'][] = '0'; ?>
 <option  value="1" <?php  if ($this->cob == "1") { echo " selected" ;} ?>>Ya</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_cob'][] = '1'; ?>
 </select></span>
</span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['kejadianlakalantas']))
   {
       $this->nm_new_label['kejadianlakalantas'] = "Laka Lantas";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kejadianlakalantas = $this->kejadianlakalantas;
   $sStyleHidden_kejadianlakalantas = '';
   if (isset($this->nmgp_cmp_hidden['kejadianlakalantas']) && $this->nmgp_cmp_hidden['kejadianlakalantas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kejadianlakalantas']);
       $sStyleHidden_kejadianlakalantas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kejadianlakalantas = 'display: none;';
   $sStyleReadInp_kejadianlakalantas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kejadianlakalantas']) && $this->nmgp_cmp_readonly['kejadianlakalantas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kejadianlakalantas']);
       $sStyleReadLab_kejadianlakalantas = '';
       $sStyleReadInp_kejadianlakalantas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kejadianlakalantas']) && $this->nmgp_cmp_hidden['kejadianlakalantas'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="kejadianlakalantas" value="<?php echo $this->form_encode_input($this->kejadianlakalantas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kejadianlakalantas_label" id="hidden_field_label_kejadianlakalantas" style="<?php echo $sStyleHidden_kejadianlakalantas; ?>"><span id="id_label_kejadianlakalantas"><?php echo $this->nm_new_label['kejadianlakalantas']; ?></span></TD>
    <TD class="scFormDataOdd css_kejadianlakalantas_line" id="hidden_field_data_kejadianlakalantas" style="<?php echo $sStyleHidden_kejadianlakalantas; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kejadianlakalantas"]) &&  $this->nmgp_cmp_readonly["kejadianlakalantas"] == "on") { 

$kejadianlakalantas_look = "";
 if ($this->kejadianlakalantas == "0") { $kejadianlakalantas_look .= "Tidak" ;} 
 if ($this->kejadianlakalantas == "1") { $kejadianlakalantas_look .= "Ya" ;} 
 if (empty($kejadianlakalantas_look)) { $kejadianlakalantas_look = $this->kejadianlakalantas; }
?>
<input type="hidden" name="kejadianlakalantas" value="<?php echo $this->form_encode_input($kejadianlakalantas) . "\">" . $kejadianlakalantas_look . ""; ?>
<?php } else { ?>
<?php

$kejadianlakalantas_look = "";
 if ($this->kejadianlakalantas == "0") { $kejadianlakalantas_look .= "Tidak" ;} 
 if ($this->kejadianlakalantas == "1") { $kejadianlakalantas_look .= "Ya" ;} 
 if (empty($kejadianlakalantas_look)) { $kejadianlakalantas_look = $this->kejadianlakalantas; }
?>
<span id="id_read_on_kejadianlakalantas" class="css_kejadianlakalantas_line"  style="<?php echo $sStyleReadLab_kejadianlakalantas; ?>"><?php echo $this->form_encode_input($kejadianlakalantas_look); ?></span><span id="id_read_off_kejadianlakalantas" class="css_read_off_kejadianlakalantas" style="white-space: nowrap; <?php echo $sStyleReadInp_kejadianlakalantas; ?>">
 <span id="idAjaxSelect_kejadianlakalantas"><select class="sc-js-input scFormObjectOdd css_kejadianlakalantas_obj" style="" id="id_sc_field_kejadianlakalantas" name="kejadianlakalantas" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="0" <?php  if ($this->kejadianlakalantas == "0") { echo " selected" ;} ?>>Tidak</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_kejadianlakalantas'][] = '0'; ?>
 <option  value="1" <?php  if ($this->kejadianlakalantas == "1") { echo " selected" ;} ?>>Ya</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_kejadianlakalantas'][] = '1'; ?>
 </select></span>
</span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['penjaminlakalantas']))
   {
       $this->nm_new_label['penjaminlakalantas'] = "Penjamin Laka";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $penjaminlakalantas = $this->penjaminlakalantas;
   $sStyleHidden_penjaminlakalantas = '';
   if (isset($this->nmgp_cmp_hidden['penjaminlakalantas']) && $this->nmgp_cmp_hidden['penjaminlakalantas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['penjaminlakalantas']);
       $sStyleHidden_penjaminlakalantas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_penjaminlakalantas = 'display: none;';
   $sStyleReadInp_penjaminlakalantas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['penjaminlakalantas']) && $this->nmgp_cmp_readonly['penjaminlakalantas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['penjaminlakalantas']);
       $sStyleReadLab_penjaminlakalantas = '';
       $sStyleReadInp_penjaminlakalantas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['penjaminlakalantas']) && $this->nmgp_cmp_hidden['penjaminlakalantas'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="penjaminlakalantas" value="<?php echo $this->form_encode_input($this->penjaminlakalantas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_penjaminlakalantas_label" id="hidden_field_label_penjaminlakalantas" style="<?php echo $sStyleHidden_penjaminlakalantas; ?>"><span id="id_label_penjaminlakalantas"><?php echo $this->nm_new_label['penjaminlakalantas']; ?></span></TD>
    <TD class="scFormDataOdd css_penjaminlakalantas_line" id="hidden_field_data_penjaminlakalantas" style="<?php echo $sStyleHidden_penjaminlakalantas; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["penjaminlakalantas"]) &&  $this->nmgp_cmp_readonly["penjaminlakalantas"] == "on") { 

$penjaminlakalantas_look = "";
 if ($this->penjaminlakalantas == "1") { $penjaminlakalantas_look .= "JASA RAHARJA" ;} 
 if ($this->penjaminlakalantas == "2") { $penjaminlakalantas_look .= "BPJS KETENAGAKERJAAN" ;} 
 if ($this->penjaminlakalantas == "3") { $penjaminlakalantas_look .= "TASPEN, PT" ;} 
 if ($this->penjaminlakalantas == "4") { $penjaminlakalantas_look .= "ASABRI,PT" ;} 
 if (empty($penjaminlakalantas_look)) { $penjaminlakalantas_look = $this->penjaminlakalantas; }
?>
<input type="hidden" name="penjaminlakalantas" value="<?php echo $this->form_encode_input($penjaminlakalantas) . "\">" . $penjaminlakalantas_look . ""; ?>
<?php } else { ?>
<?php

$penjaminlakalantas_look = "";
 if ($this->penjaminlakalantas == "1") { $penjaminlakalantas_look .= "JASA RAHARJA" ;} 
 if ($this->penjaminlakalantas == "2") { $penjaminlakalantas_look .= "BPJS KETENAGAKERJAAN" ;} 
 if ($this->penjaminlakalantas == "3") { $penjaminlakalantas_look .= "TASPEN, PT" ;} 
 if ($this->penjaminlakalantas == "4") { $penjaminlakalantas_look .= "ASABRI,PT" ;} 
 if (empty($penjaminlakalantas_look)) { $penjaminlakalantas_look = $this->penjaminlakalantas; }
?>
<span id="id_read_on_penjaminlakalantas" class="css_penjaminlakalantas_line"  style="<?php echo $sStyleReadLab_penjaminlakalantas; ?>"><?php echo $this->form_encode_input($penjaminlakalantas_look); ?></span><span id="id_read_off_penjaminlakalantas" class="css_read_off_penjaminlakalantas" style="white-space: nowrap; <?php echo $sStyleReadInp_penjaminlakalantas; ?>">
 <span id="idAjaxSelect_penjaminlakalantas"><select class="sc-js-input scFormObjectOdd css_penjaminlakalantas_obj" style="" id="id_sc_field_penjaminlakalantas" name="penjaminlakalantas" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->penjaminlakalantas == "1") { echo " selected" ;} ?>>JASA RAHARJA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_penjaminlakalantas'][] = '1'; ?>
 <option  value="2" <?php  if ($this->penjaminlakalantas == "2") { echo " selected" ;} ?>>BPJS KETENAGAKERJAAN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_penjaminlakalantas'][] = '2'; ?>
 <option  value="3" <?php  if ($this->penjaminlakalantas == "3") { echo " selected" ;} ?>>TASPEN, PT</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_penjaminlakalantas'][] = '3'; ?>
 <option  value="4" <?php  if ($this->penjaminlakalantas == "4") { echo " selected" ;} ?>>ASABRI,PT</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['Lookup_penjaminlakalantas'][] = '4'; ?>
 </select></span>
</span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lokasilakalantas']))
    {
        $this->nm_new_label['lokasilakalantas'] = "Lokasi Laka Lantas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lokasilakalantas = $this->lokasilakalantas;
   $sStyleHidden_lokasilakalantas = '';
   if (isset($this->nmgp_cmp_hidden['lokasilakalantas']) && $this->nmgp_cmp_hidden['lokasilakalantas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lokasilakalantas']);
       $sStyleHidden_lokasilakalantas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lokasilakalantas = 'display: none;';
   $sStyleReadInp_lokasilakalantas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lokasilakalantas']) && $this->nmgp_cmp_readonly['lokasilakalantas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lokasilakalantas']);
       $sStyleReadLab_lokasilakalantas = '';
       $sStyleReadInp_lokasilakalantas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lokasilakalantas']) && $this->nmgp_cmp_hidden['lokasilakalantas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lokasilakalantas" value="<?php echo $this->form_encode_input($lokasilakalantas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_lokasilakalantas_label" id="hidden_field_label_lokasilakalantas" style="<?php echo $sStyleHidden_lokasilakalantas; ?>"><span id="id_label_lokasilakalantas"><?php echo $this->nm_new_label['lokasilakalantas']; ?></span></TD>
    <TD class="scFormDataOdd css_lokasilakalantas_line" id="hidden_field_data_lokasilakalantas" style="<?php echo $sStyleHidden_lokasilakalantas; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lokasilakalantas"]) &&  $this->nmgp_cmp_readonly["lokasilakalantas"] == "on") { 

 ?>
<input type="hidden" name="lokasilakalantas" value="<?php echo $this->form_encode_input($lokasilakalantas) . "\">" . $lokasilakalantas . ""; ?>
<?php } else { ?>
<span id="id_read_on_lokasilakalantas" class="sc-ui-readonly-lokasilakalantas css_lokasilakalantas_line" style="<?php echo $sStyleReadLab_lokasilakalantas; ?>"><?php echo $this->lokasilakalantas; ?></span><span id="id_read_off_lokasilakalantas" class="css_read_off_lokasilakalantas" style="white-space: nowrap;<?php echo $sStyleReadInp_lokasilakalantas; ?>">
 <input class="sc-js-input scFormObjectOdd css_lokasilakalantas_obj" style="" id="id_sc_field_lokasilakalantas" type=text name="lokasilakalantas" value="<?php echo $this->form_encode_input($lokasilakalantas) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['notelp']))
    {
        $this->nm_new_label['notelp'] = "No. Telepon";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $notelp = $this->notelp;
   $sStyleHidden_notelp = '';
   if (isset($this->nmgp_cmp_hidden['notelp']) && $this->nmgp_cmp_hidden['notelp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['notelp']);
       $sStyleHidden_notelp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_notelp = 'display: none;';
   $sStyleReadInp_notelp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['notelp']) && $this->nmgp_cmp_readonly['notelp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['notelp']);
       $sStyleReadLab_notelp = '';
       $sStyleReadInp_notelp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['notelp']) && $this->nmgp_cmp_hidden['notelp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="notelp" value="<?php echo $this->form_encode_input($notelp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_notelp_label" id="hidden_field_label_notelp" style="<?php echo $sStyleHidden_notelp; ?>"><span id="id_label_notelp"><?php echo $this->nm_new_label['notelp']; ?></span></TD>
    <TD class="scFormDataOdd css_notelp_line" id="hidden_field_data_notelp" style="<?php echo $sStyleHidden_notelp; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["notelp"]) &&  $this->nmgp_cmp_readonly["notelp"] == "on") { 

 ?>
<input type="hidden" name="notelp" value="<?php echo $this->form_encode_input($notelp) . "\">" . $notelp . ""; ?>
<?php } else { ?>
<span id="id_read_on_notelp" class="sc-ui-readonly-notelp css_notelp_line" style="<?php echo $sStyleReadLab_notelp; ?>"><?php echo $this->notelp; ?></span><span id="id_read_off_notelp" class="css_read_off_notelp" style="white-space: nowrap;<?php echo $sStyleReadInp_notelp; ?>">
 <input class="sc-js-input scFormObjectOdd css_notelp_obj" style="" id="id_sc_field_notelp" type=text name="notelp" value="<?php echo $this->form_encode_input($notelp) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['user']))
    {
        $this->nm_new_label['user'] = "User";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $user = $this->user;
   $sStyleHidden_user = '';
   if (isset($this->nmgp_cmp_hidden['user']) && $this->nmgp_cmp_hidden['user'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['user']);
       $sStyleHidden_user = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_user = 'display: none;';
   $sStyleReadInp_user = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['user']) && $this->nmgp_cmp_readonly['user'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['user']);
       $sStyleReadLab_user = '';
       $sStyleReadInp_user = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['user']) && $this->nmgp_cmp_hidden['user'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="user" value="<?php echo $this->form_encode_input($user) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_user_label" id="hidden_field_label_user" style="<?php echo $sStyleHidden_user; ?>"><span id="id_label_user"><?php echo $this->nm_new_label['user']; ?></span></TD>
    <TD class="scFormDataOdd css_user_line" id="hidden_field_data_user" style="<?php echo $sStyleHidden_user; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["user"]) &&  $this->nmgp_cmp_readonly["user"] == "on") { 

 ?>
<input type="hidden" name="user" value="<?php echo $this->form_encode_input($user) . "\">" . $user . ""; ?>
<?php } else { ?>
<span id="id_read_on_user" class="sc-ui-readonly-user css_user_line" style="<?php echo $sStyleReadLab_user; ?>"><?php echo $this->user; ?></span><span id="id_read_off_user" class="css_read_off_user" style="white-space: nowrap;<?php echo $sStyleReadInp_user; ?>">
 <input class="sc-js-input scFormObjectOdd css_user_obj" style="" id="id_sc_field_user" type=text name="user" value="<?php echo $this->form_encode_input($user) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
        $sCondStyle = ($this->nmgp_botoes['ok'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bok", "scBtnFn_sys_format_ok()", "scBtnFn_sys_format_ok()", "sub_form_b", "", "Hapus", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
?>
       
<?php
           if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
            </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
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
  $nm_sc_blocos_da_pag = array(0,1);

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
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_vclaim_sep_hapus");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_vclaim_sep_hapus");
 parent.scAjaxDetailHeight("form_vclaim_sep_hapus", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_vclaim_sep_hapus", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_vclaim_sep_hapus", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['sc_modal'])
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
	function scBtnFn_sys_format_ok() {
		if ($("#sub_form_b.sc-unique-btn-1").length && $("#sub_form_b.sc-unique-btn-1").is(":visible")) {
			nm_atualiza('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_b").length && $("#sc_b_hlp_b").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#Bsair_b.sc-unique-btn-2").length && $("#Bsair_b.sc-unique-btn-2").is(":visible")) {
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-3").length && $("#Bsair_b.sc-unique-btn-3").is(":visible")) {
			nm_saida_glo(); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_hapus']['buttonStatus'] = $this->nmgp_botoes;
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
