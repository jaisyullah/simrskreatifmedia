<?php
class sec_form_sec_groups_apps_form extends sec_form_sec_groups_apps_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_list_apps_x_groups'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_list_apps_x_groups'] . ""); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['sc_redir_atualiz'] == 'ok')
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
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>sec_form_sec_groups_apps/sec_form_sec_groups_apps_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("sec_form_sec_groups_apps_sajax_js.php");
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
    if (document.getElementById("sc_b_navpage_t")) document.getElementById("sc_b_navpage_t").innerHTML = str_navpage;
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
     if (F_name == "priv_export_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "priv_export_" + ii + "[]";
            $('input[name="' + cmp_name + '"]').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name="' + cmp_name + '"]').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name="' + cmp_name + '"]').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "priv_print_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "priv_print_" + ii + "[]";
            $('input[name="' + cmp_name + '"]').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name="' + cmp_name + '"]').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name="' + cmp_name + '"]').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "priv_insert_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "priv_insert_" + ii + "[]";
            $('input[name="' + cmp_name + '"]').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name="' + cmp_name + '"]').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name="' + cmp_name + '"]').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "priv_delete_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "priv_delete_" + ii + "[]";
            $('input[name="' + cmp_name + '"]').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name="' + cmp_name + '"]').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name="' + cmp_name + '"]').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "priv_update_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "priv_update_" + ii + "[]";
            $('input[name="' + cmp_name + '"]').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name="' + cmp_name + '"]').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name="' + cmp_name + '"]').removeClass("scFormInputDisabledMult");
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("priv_insert_=enabled", "", i);
    nm_field_disabled("priv_delete_=enabled", "", i);
    nm_field_disabled("priv_update_=enabled", "", i);
    nm_field_disabled("priv_export_=enabled", "", i);
    nm_field_disabled("priv_print_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('sec_form_sec_groups_apps_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

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
$str_iframe_body = 'margin-left: 0px; margin-right: 0px; margin-top: 1px; margin-bottom: 0px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("sec_form_sec_groups_apps_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['sec_form_sec_groups_apps'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['sec_form_sec_groups_apps'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?>ERROR</td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<TABLE width="100%" style="padding: 0px; border-spacing: 0px; border-width: 0px;" cellpadding="0" cellspacing="0">
<TR align="center">
 <TD colspan="3">
     <table  style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%" cellpadding="0" cellspacing="0">
       <tr valign="middle">
         <td align="left" ><span class="scFormHeaderFont"> <?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_list_apps_x_groups'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_list_apps_x_groups'] . ""; } ?> </span></td>
         <td style="font-size: 5px">&nbsp; &nbsp; </td>
         <td align="center" ><span class="scFormHeaderFont"> <?php echo "" . $this->Ini->Nm_lang['lang_sec_group'] . ": " . $_SESSION['group_desc'] . "" ?> </span></td>
         <td style="font-size: 5px">&nbsp; &nbsp; </td>
         <td align="right" ><span class="scFormHeaderFont"> <?php echo date($this->dateDefaultFormat()); ?> &nbsp;&nbsp;</span></td>
         <td width="3px" class="scFormHeader"></td>
       </tr>
     </table>
 </TD>
</TR>
<TR align="center" >
  <TD height="5px" class="scFormHeader"></TD>
  <TD height="1px" class="scFormHeader"></TD>
  <TD height="1px" class="scFormHeader"></TD>
</TR>
</TABLE></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "R")
{
    $NM_btn = false;
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_t" class="scFormToolbarPadding"></span> 
<?php 
}
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
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
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <select class="scFormToolbarInput" style="vertical-align: middle;" name="nmgp_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $SC_Label_atu['SC_all_Cmp'] = $this->Ini->Nm_lang['lang_srch_all_fields']; 
          foreach ($SC_Label_atu as $CMP => $LABEL)
          {
              $OPC_sel = ($CMP == $OPC_cmp) ? " selected" : "";
              echo "           <option value='" . $CMP . "'" . $OPC_sel . ">" . $LABEL . "</option>";
          }
?> 
          </select>
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['empty_filter'] = true;
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


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   
    <TD class="scFormLabelOddMult"  width="10"> <?php echo $this->Ini->Nm_lang['lang_othr_slct_item'] ?><br /><input type="checkbox" class="sc-ui-checkbox-all-all" name="" /> </TD>
   
   <?php if (isset($this->nmgp_cmp_hidden['app_name_']) && $this->nmgp_cmp_hidden['app_name_'] == 'off') { $sStyleHidden_app_name_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['app_name_']) || $this->nmgp_cmp_hidden['app_name_'] == 'on') {
      if (!isset($this->nm_new_label['app_name_'])) {
          $this->nm_new_label['app_name_'] = "" . $this->Ini->Nm_lang['lang_sec_app_name'] . ""; } ?>

    <TD class="scFormLabelOddMult css_app_name__label" id="hidden_field_label_app_name_" style="<?php echo $sStyleHidden_app_name_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['app_name_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_cmp'] == "app_name")
      {
          $orderColName = "app_name";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $link_a = "<a href=\"javascript:nm_move('ordem', 'app_name')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">";
      $link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : $link_a . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-app_name\" /></a>";
      $SC_Label = $link_a . $SC_Label . "</a>";
?>
<div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center">
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
    <div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_field") { ?><?php echo $link_img; ?><?php }
?>
        <?php echo $SC_Label; ?>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_field") { ?><?php echo $link_img; ?><?php }
?>
    </div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
</div>
 <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['priv_access_']) && $this->nmgp_cmp_hidden['priv_access_'] == 'off') { $sStyleHidden_priv_access_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['priv_access_']) || $this->nmgp_cmp_hidden['priv_access_'] == 'on') {
      if (!isset($this->nm_new_label['priv_access_'])) {
          $this->nm_new_label['priv_access_'] = "" . $this->Ini->Nm_lang['lang_sec_priv_access'] . ""; } ?>

    <TD class="scFormLabelOddMult css_priv_access__label" id="hidden_field_label_priv_access_" style="<?php echo $sStyleHidden_priv_access_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['priv_access_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_cmp'] == "priv_access")
      {
          $orderColName = "priv_access";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $link_a = "<a href=\"javascript:nm_move('ordem', 'priv_access')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">";
      $link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : $link_a . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-priv_access\" /></a>";
      $SC_Label = $link_a . $SC_Label . "</a>";
?>
<div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center">
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
    <div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_field") { ?><?php echo $link_img; ?><?php }
?>
        <?php echo $SC_Label; ?>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_field") { ?><?php echo $link_img; ?><?php }
?>
    </div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
</div>
<br /><input type="checkbox" class="sc-ui-checkbox-priv_access_-control" /> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['priv_insert_']) && $this->nmgp_cmp_hidden['priv_insert_'] == 'off') { $sStyleHidden_priv_insert_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['priv_insert_']) || $this->nmgp_cmp_hidden['priv_insert_'] == 'on') {
      if (!isset($this->nm_new_label['priv_insert_'])) {
          $this->nm_new_label['priv_insert_'] = "" . $this->Ini->Nm_lang['lang_sec_priv_insert'] . ""; } ?>

    <TD class="scFormLabelOddMult css_priv_insert__label" id="hidden_field_label_priv_insert_" style="<?php echo $sStyleHidden_priv_insert_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['priv_insert_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_cmp'] == "priv_insert")
      {
          $orderColName = "priv_insert";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $link_a = "<a href=\"javascript:nm_move('ordem', 'priv_insert')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">";
      $link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : $link_a . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-priv_insert\" /></a>";
      $SC_Label = $link_a . $SC_Label . "</a>";
?>
<div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center">
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
    <div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_field") { ?><?php echo $link_img; ?><?php }
?>
        <?php echo $SC_Label; ?>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_field") { ?><?php echo $link_img; ?><?php }
?>
    </div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
</div>
<br /><input type="checkbox" class="sc-ui-checkbox-priv_insert_-control" /> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['priv_delete_']) && $this->nmgp_cmp_hidden['priv_delete_'] == 'off') { $sStyleHidden_priv_delete_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['priv_delete_']) || $this->nmgp_cmp_hidden['priv_delete_'] == 'on') {
      if (!isset($this->nm_new_label['priv_delete_'])) {
          $this->nm_new_label['priv_delete_'] = "" . $this->Ini->Nm_lang['lang_sec_priv_delete'] . ""; } ?>

    <TD class="scFormLabelOddMult css_priv_delete__label" id="hidden_field_label_priv_delete_" style="<?php echo $sStyleHidden_priv_delete_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['priv_delete_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_cmp'] == "priv_delete")
      {
          $orderColName = "priv_delete";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $link_a = "<a href=\"javascript:nm_move('ordem', 'priv_delete')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">";
      $link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : $link_a . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-priv_delete\" /></a>";
      $SC_Label = $link_a . $SC_Label . "</a>";
?>
<div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center">
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
    <div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_field") { ?><?php echo $link_img; ?><?php }
?>
        <?php echo $SC_Label; ?>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_field") { ?><?php echo $link_img; ?><?php }
?>
    </div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
</div>
<br /><input type="checkbox" class="sc-ui-checkbox-priv_delete_-control" /> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['priv_update_']) && $this->nmgp_cmp_hidden['priv_update_'] == 'off') { $sStyleHidden_priv_update_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['priv_update_']) || $this->nmgp_cmp_hidden['priv_update_'] == 'on') {
      if (!isset($this->nm_new_label['priv_update_'])) {
          $this->nm_new_label['priv_update_'] = "" . $this->Ini->Nm_lang['lang_sec_priv_update'] . ""; } ?>

    <TD class="scFormLabelOddMult css_priv_update__label" id="hidden_field_label_priv_update_" style="<?php echo $sStyleHidden_priv_update_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['priv_update_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_cmp'] == "priv_update")
      {
          $orderColName = "priv_update";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $link_a = "<a href=\"javascript:nm_move('ordem', 'priv_update')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">";
      $link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : $link_a . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-priv_update\" /></a>";
      $SC_Label = $link_a . $SC_Label . "</a>";
?>
<div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center">
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
    <div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_field") { ?><?php echo $link_img; ?><?php }
?>
        <?php echo $SC_Label; ?>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_field") { ?><?php echo $link_img; ?><?php }
?>
    </div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
</div>
<br /><input type="checkbox" class="sc-ui-checkbox-priv_update_-control" /> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['priv_export_']) && $this->nmgp_cmp_hidden['priv_export_'] == 'off') { $sStyleHidden_priv_export_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['priv_export_']) || $this->nmgp_cmp_hidden['priv_export_'] == 'on') {
      if (!isset($this->nm_new_label['priv_export_'])) {
          $this->nm_new_label['priv_export_'] = "" . $this->Ini->Nm_lang['lang_sec_priv_export'] . ""; } ?>

    <TD class="scFormLabelOddMult css_priv_export__label" id="hidden_field_label_priv_export_" style="<?php echo $sStyleHidden_priv_export_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['priv_export_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_cmp'] == "priv_export")
      {
          $orderColName = "priv_export";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $link_a = "<a href=\"javascript:nm_move('ordem', 'priv_export')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">";
      $link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : $link_a . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-priv_export\" /></a>";
      $SC_Label = $link_a . $SC_Label . "</a>";
?>
<div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center">
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
    <div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_field") { ?><?php echo $link_img; ?><?php }
?>
        <?php echo $SC_Label; ?>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_field") { ?><?php echo $link_img; ?><?php }
?>
    </div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
</div>
<br /><input type="checkbox" class="sc-ui-checkbox-priv_export_-control" /> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['priv_print_']) && $this->nmgp_cmp_hidden['priv_print_'] == 'off') { $sStyleHidden_priv_print_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['priv_print_']) || $this->nmgp_cmp_hidden['priv_print_'] == 'on') {
      if (!isset($this->nm_new_label['priv_print_'])) {
          $this->nm_new_label['priv_print_'] = "" . $this->Ini->Nm_lang['lang_sec_priv_print'] . ""; } ?>

    <TD class="scFormLabelOddMult css_priv_print__label" id="hidden_field_label_priv_print_" style="<?php echo $sStyleHidden_priv_print_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['priv_print_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_cmp'] == "priv_print")
      {
          $orderColName = "priv_print";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $link_a = "<a href=\"javascript:nm_move('ordem', 'priv_print')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">";
      $link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : $link_a . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-priv_print\" /></a>";
      $SC_Label = $link_a . $SC_Label . "</a>";
?>
<div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center">
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
    <div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_field") { ?><?php echo $link_img; ?><?php }
?>
        <?php echo $SC_Label; ?>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_field") { ?><?php echo $link_img; ?><?php }
?>
    </div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
</div>
<br /><input type="checkbox" class="sc-ui-checkbox-priv_print_-control" /> </TD>
   <?php } ?>





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
       $iStart = sizeof($this->form_vert_sec_form_sec_groups_apps);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_sec_form_sec_groups_apps = $this->form_vert_sec_form_sec_groups_apps;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_sec_form_sec_groups_apps))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_sec_form_sec_groups_apps as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->group_id_ = $this->form_vert_sec_form_sec_groups_apps[$sc_seq_vert]['group_id_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['app_name_'] = true;
           $this->nmgp_cmp_readonly['priv_access_'] = true;
           $this->nmgp_cmp_readonly['priv_insert_'] = true;
           $this->nmgp_cmp_readonly['priv_delete_'] = true;
           $this->nmgp_cmp_readonly['priv_update_'] = true;
           $this->nmgp_cmp_readonly['priv_export_'] = true;
           $this->nmgp_cmp_readonly['priv_print_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['app_name_']) || $this->nmgp_cmp_readonly['app_name_'] != "on") {$this->nmgp_cmp_readonly['app_name_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['priv_access_']) || $this->nmgp_cmp_readonly['priv_access_'] != "on") {$this->nmgp_cmp_readonly['priv_access_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['priv_insert_']) || $this->nmgp_cmp_readonly['priv_insert_'] != "on") {$this->nmgp_cmp_readonly['priv_insert_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['priv_delete_']) || $this->nmgp_cmp_readonly['priv_delete_'] != "on") {$this->nmgp_cmp_readonly['priv_delete_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['priv_update_']) || $this->nmgp_cmp_readonly['priv_update_'] != "on") {$this->nmgp_cmp_readonly['priv_update_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['priv_export_']) || $this->nmgp_cmp_readonly['priv_export_'] != "on") {$this->nmgp_cmp_readonly['priv_export_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['priv_print_']) || $this->nmgp_cmp_readonly['priv_print_'] != "on") {$this->nmgp_cmp_readonly['priv_print_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->app_name_ = $this->form_vert_sec_form_sec_groups_apps[$sc_seq_vert]['app_name_']; 
       if (empty($this->app_name_))
       {
           $this->app_name_ = "";
       }
       $app_name_ = $this->app_name_; 
       $sStyleHidden_app_name_ = '';
       if (isset($sCheckRead_app_name_))
       {
           unset($sCheckRead_app_name_);
       }
       if (isset($this->nmgp_cmp_readonly['app_name_']))
       {
           $sCheckRead_app_name_ = $this->nmgp_cmp_readonly['app_name_'];
       }
       if (isset($this->nmgp_cmp_hidden['app_name_']) && $this->nmgp_cmp_hidden['app_name_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['app_name_']);
           $sStyleHidden_app_name_ = 'display: none;';
       }
       $bTestReadOnly_app_name_ = true;
       $sStyleReadLab_app_name_ = 'display: none;';
       $sStyleReadInp_app_name_ = '';
       if (isset($this->nmgp_cmp_readonly['app_name_']) && $this->nmgp_cmp_readonly['app_name_'] == 'on')
       {
           $bTestReadOnly_app_name_ = false;
           unset($this->nmgp_cmp_readonly['app_name_']);
           $sStyleReadLab_app_name_ = '';
           $sStyleReadInp_app_name_ = 'display: none;';
       }
       $this->priv_access_ = $this->form_vert_sec_form_sec_groups_apps[$sc_seq_vert]['priv_access_']; 
       $priv_access_ = $this->priv_access_; 
       $sStyleHidden_priv_access_ = '';
       if (isset($sCheckRead_priv_access_))
       {
           unset($sCheckRead_priv_access_);
       }
       if (isset($this->nmgp_cmp_readonly['priv_access_']))
       {
           $sCheckRead_priv_access_ = $this->nmgp_cmp_readonly['priv_access_'];
       }
       if (isset($this->nmgp_cmp_hidden['priv_access_']) && $this->nmgp_cmp_hidden['priv_access_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['priv_access_']);
           $sStyleHidden_priv_access_ = 'display: none;';
       }
       $bTestReadOnly_priv_access_ = true;
       $sStyleReadLab_priv_access_ = 'display: none;';
       $sStyleReadInp_priv_access_ = '';
       if (isset($this->nmgp_cmp_readonly['priv_access_']) && $this->nmgp_cmp_readonly['priv_access_'] == 'on')
       {
           $bTestReadOnly_priv_access_ = false;
           unset($this->nmgp_cmp_readonly['priv_access_']);
           $sStyleReadLab_priv_access_ = '';
           $sStyleReadInp_priv_access_ = 'display: none;';
       }
       $this->priv_insert_ = $this->form_vert_sec_form_sec_groups_apps[$sc_seq_vert]['priv_insert_']; 
       $priv_insert_ = $this->priv_insert_; 
       $sStyleHidden_priv_insert_ = '';
       if (isset($sCheckRead_priv_insert_))
       {
           unset($sCheckRead_priv_insert_);
       }
       if (isset($this->nmgp_cmp_readonly['priv_insert_']))
       {
           $sCheckRead_priv_insert_ = $this->nmgp_cmp_readonly['priv_insert_'];
       }
       if (isset($this->nmgp_cmp_hidden['priv_insert_']) && $this->nmgp_cmp_hidden['priv_insert_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['priv_insert_']);
           $sStyleHidden_priv_insert_ = 'display: none;';
       }
       $bTestReadOnly_priv_insert_ = true;
       $sStyleReadLab_priv_insert_ = 'display: none;';
       $sStyleReadInp_priv_insert_ = '';
       if (isset($this->nmgp_cmp_readonly['priv_insert_']) && $this->nmgp_cmp_readonly['priv_insert_'] == 'on')
       {
           $bTestReadOnly_priv_insert_ = false;
           unset($this->nmgp_cmp_readonly['priv_insert_']);
           $sStyleReadLab_priv_insert_ = '';
           $sStyleReadInp_priv_insert_ = 'display: none;';
       }
       $this->priv_delete_ = $this->form_vert_sec_form_sec_groups_apps[$sc_seq_vert]['priv_delete_']; 
       $priv_delete_ = $this->priv_delete_; 
       $sStyleHidden_priv_delete_ = '';
       if (isset($sCheckRead_priv_delete_))
       {
           unset($sCheckRead_priv_delete_);
       }
       if (isset($this->nmgp_cmp_readonly['priv_delete_']))
       {
           $sCheckRead_priv_delete_ = $this->nmgp_cmp_readonly['priv_delete_'];
       }
       if (isset($this->nmgp_cmp_hidden['priv_delete_']) && $this->nmgp_cmp_hidden['priv_delete_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['priv_delete_']);
           $sStyleHidden_priv_delete_ = 'display: none;';
       }
       $bTestReadOnly_priv_delete_ = true;
       $sStyleReadLab_priv_delete_ = 'display: none;';
       $sStyleReadInp_priv_delete_ = '';
       if (isset($this->nmgp_cmp_readonly['priv_delete_']) && $this->nmgp_cmp_readonly['priv_delete_'] == 'on')
       {
           $bTestReadOnly_priv_delete_ = false;
           unset($this->nmgp_cmp_readonly['priv_delete_']);
           $sStyleReadLab_priv_delete_ = '';
           $sStyleReadInp_priv_delete_ = 'display: none;';
       }
       $this->priv_update_ = $this->form_vert_sec_form_sec_groups_apps[$sc_seq_vert]['priv_update_']; 
       $priv_update_ = $this->priv_update_; 
       $sStyleHidden_priv_update_ = '';
       if (isset($sCheckRead_priv_update_))
       {
           unset($sCheckRead_priv_update_);
       }
       if (isset($this->nmgp_cmp_readonly['priv_update_']))
       {
           $sCheckRead_priv_update_ = $this->nmgp_cmp_readonly['priv_update_'];
       }
       if (isset($this->nmgp_cmp_hidden['priv_update_']) && $this->nmgp_cmp_hidden['priv_update_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['priv_update_']);
           $sStyleHidden_priv_update_ = 'display: none;';
       }
       $bTestReadOnly_priv_update_ = true;
       $sStyleReadLab_priv_update_ = 'display: none;';
       $sStyleReadInp_priv_update_ = '';
       if (isset($this->nmgp_cmp_readonly['priv_update_']) && $this->nmgp_cmp_readonly['priv_update_'] == 'on')
       {
           $bTestReadOnly_priv_update_ = false;
           unset($this->nmgp_cmp_readonly['priv_update_']);
           $sStyleReadLab_priv_update_ = '';
           $sStyleReadInp_priv_update_ = 'display: none;';
       }
       $this->priv_export_ = $this->form_vert_sec_form_sec_groups_apps[$sc_seq_vert]['priv_export_']; 
       $priv_export_ = $this->priv_export_; 
       $sStyleHidden_priv_export_ = '';
       if (isset($sCheckRead_priv_export_))
       {
           unset($sCheckRead_priv_export_);
       }
       if (isset($this->nmgp_cmp_readonly['priv_export_']))
       {
           $sCheckRead_priv_export_ = $this->nmgp_cmp_readonly['priv_export_'];
       }
       if (isset($this->nmgp_cmp_hidden['priv_export_']) && $this->nmgp_cmp_hidden['priv_export_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['priv_export_']);
           $sStyleHidden_priv_export_ = 'display: none;';
       }
       $bTestReadOnly_priv_export_ = true;
       $sStyleReadLab_priv_export_ = 'display: none;';
       $sStyleReadInp_priv_export_ = '';
       if (isset($this->nmgp_cmp_readonly['priv_export_']) && $this->nmgp_cmp_readonly['priv_export_'] == 'on')
       {
           $bTestReadOnly_priv_export_ = false;
           unset($this->nmgp_cmp_readonly['priv_export_']);
           $sStyleReadLab_priv_export_ = '';
           $sStyleReadInp_priv_export_ = 'display: none;';
       }
       $this->priv_print_ = $this->form_vert_sec_form_sec_groups_apps[$sc_seq_vert]['priv_print_']; 
       $priv_print_ = $this->priv_print_; 
       $sStyleHidden_priv_print_ = '';
       if (isset($sCheckRead_priv_print_))
       {
           unset($sCheckRead_priv_print_);
       }
       if (isset($this->nmgp_cmp_readonly['priv_print_']))
       {
           $sCheckRead_priv_print_ = $this->nmgp_cmp_readonly['priv_print_'];
       }
       if (isset($this->nmgp_cmp_hidden['priv_print_']) && $this->nmgp_cmp_hidden['priv_print_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['priv_print_']);
           $sStyleHidden_priv_print_ = 'display: none;';
       }
       $bTestReadOnly_priv_print_ = true;
       $sStyleReadLab_priv_print_ = 'display: none;';
       $sStyleReadInp_priv_print_ = '';
       if (isset($this->nmgp_cmp_readonly['priv_print_']) && $this->nmgp_cmp_readonly['priv_print_'] == 'on')
       {
           $bTestReadOnly_priv_print_ = false;
           unset($this->nmgp_cmp_readonly['priv_print_']);
           $sStyleReadLab_priv_print_ = '';
           $sStyleReadInp_priv_print_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   
    <TD class="scFormDataOddMult" > 
<input type="checkbox" class="sc-ui-checkbox-record-all" name="sc_check_all[<?php echo $sc_seq_vert ?>]" alt="<?php echo $sc_seq_vert ?>" /> </TD>
   
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_sec_form_sec_groups_apps_add_new_line(" . $sc_seq_vert . ")", "do_ajax_sec_form_sec_groups_apps_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_sec_form_sec_groups_apps_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_sec_form_sec_groups_apps_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_sec_form_sec_groups_apps_cancel_update(" . $sc_seq_vert . ")", "do_ajax_sec_form_sec_groups_apps_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['app_name_']) && $this->nmgp_cmp_hidden['app_name_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="app_name_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($app_name_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_app_name__line" id="hidden_field_data_app_name_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_app_name_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_app_name__line" style="vertical-align: top;padding: 0px"><span id="id_ajax_label_app_name_<?php echo $sc_seq_vert; ?>"><?php echo $app_name_?></span>
<input type="hidden" name="app_name_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($app_name_); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_app_name_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_app_name_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['priv_access_']) && $this->nmgp_cmp_hidden['priv_access_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="priv_access_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->priv_access_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->priv_access__1 = explode(";", trim($this->priv_access_));
  } 
  else
  {
      if (empty($this->priv_access_))
      {
          $this->priv_access__1= array(); 
          $this->priv_access_= "";
      } 
      else
      {
          $this->priv_access__1= $this->priv_access_; 
          $this->priv_access_= ""; 
          foreach ($this->priv_access__1 as $cada_priv_access_)
          {
             if (!empty($priv_access_))
             {
                 $this->priv_access_.= ";"; 
             } 
             $this->priv_access_.= $cada_priv_access_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_priv_access__line" id="hidden_field_data_priv_access_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_priv_access_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_priv_access__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_priv_access_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["priv_access_"]) &&  $this->nmgp_cmp_readonly["priv_access_"] == "on") { 

$priv_access__look = "";
 if ($this->priv_access_ == "Y") { $priv_access__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($priv_access__look)) { $priv_access__look = $this->priv_access_; }
?>
<input type="hidden" name="priv_access_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($priv_access_) . "\">" . $priv_access__look . ""; ?>
<?php } else { ?>

<?php

$priv_access__look = "";
 if ($this->priv_access_ == "Y") { $priv_access__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($priv_access__look)) { $priv_access__look = $this->priv_access_; }
?>
<span id="id_read_on_priv_access_<?php echo $sc_seq_vert ; ?>" class="css_priv_access__line" style="<?php echo $sStyleReadLab_priv_access_; ?>"><?php echo $this->form_encode_input($priv_access__look); ?></span><span id="id_read_off_priv_access_<?php echo $sc_seq_vert ; ?>" class="css_read_off_priv_access_ css_priv_access__line" style="<?php echo $sStyleReadInp_priv_access_; ?>"><?php echo "<div id=\"idAjaxCheckbox_priv_access_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_priv_access__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_priv_access__line"><?php $tempOptionId = "id-opt-priv_access_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-priv_access_ sc-ui-checkbox-priv_access_<?php echo $sc_seq_vert ?>" name="priv_access_<?php echo $sc_seq_vert ?>[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['Lookup_priv_access_'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->priv_access__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_opt_yes']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_priv_access_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_priv_access_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['priv_insert_']) && $this->nmgp_cmp_hidden['priv_insert_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="priv_insert_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->priv_insert_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->priv_insert__1 = explode(";", trim($this->priv_insert_));
  } 
  else
  {
      if (empty($this->priv_insert_))
      {
          $this->priv_insert__1= array(); 
      } 
      else
      {
          $this->priv_insert__1= $this->priv_insert_; 
          $this->priv_insert_= ""; 
          foreach ($this->priv_insert__1 as $cada_priv_insert_)
          {
             if (!empty($priv_insert_))
             {
                 $this->priv_insert_.= ";"; 
             } 
             $this->priv_insert_.= $cada_priv_insert_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_priv_insert__line" id="hidden_field_data_priv_insert_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_priv_insert_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_priv_insert__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_priv_insert_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["priv_insert_"]) &&  $this->nmgp_cmp_readonly["priv_insert_"] == "on") { 

$priv_insert__look = "";
 if (in_array("Y", $this->priv_insert__1))  { $priv_insert__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "<br />";} 
?>
<input type="hidden" name="priv_insert_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($priv_insert_) . "\">" . $priv_insert__look . ""; ?>
<?php } else { ?>

<?php

$priv_insert__look = "";
 if (in_array("Y", $this->priv_insert__1))  { $priv_insert__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "<br />";} 
?>
<span id="id_read_on_priv_insert_<?php echo $sc_seq_vert ; ?>" class="css_priv_insert__line" style="<?php echo $sStyleReadLab_priv_insert_; ?>"><?php echo $this->form_encode_input($priv_insert__look); ?></span><span id="id_read_off_priv_insert_<?php echo $sc_seq_vert ; ?>" class="css_read_off_priv_insert_ css_priv_insert__line" style="<?php echo $sStyleReadInp_priv_insert_; ?>"><?php echo "<div id=\"idAjaxCheckbox_priv_insert_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_priv_insert__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_priv_insert__line"><?php $tempOptionId = "id-opt-priv_insert_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-priv_insert_ sc-ui-checkbox-priv_insert_<?php echo $sc_seq_vert ?>" name="priv_insert_<?php echo $sc_seq_vert ?>[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['Lookup_priv_insert_'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->priv_insert__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_opt_yes']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_priv_insert_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_priv_insert_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['priv_delete_']) && $this->nmgp_cmp_hidden['priv_delete_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="priv_delete_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->priv_delete_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->priv_delete__1 = explode(";", trim($this->priv_delete_));
  } 
  else
  {
      if (empty($this->priv_delete_))
      {
          $this->priv_delete__1= array(); 
          $this->priv_delete_= "";
      } 
      else
      {
          $this->priv_delete__1= $this->priv_delete_; 
          $this->priv_delete_= ""; 
          foreach ($this->priv_delete__1 as $cada_priv_delete_)
          {
             if (!empty($priv_delete_))
             {
                 $this->priv_delete_.= ";"; 
             } 
             $this->priv_delete_.= $cada_priv_delete_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_priv_delete__line" id="hidden_field_data_priv_delete_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_priv_delete_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_priv_delete__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_priv_delete_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["priv_delete_"]) &&  $this->nmgp_cmp_readonly["priv_delete_"] == "on") { 

$priv_delete__look = "";
 if ($this->priv_delete_ == "Y") { $priv_delete__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($priv_delete__look)) { $priv_delete__look = $this->priv_delete_; }
?>
<input type="hidden" name="priv_delete_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($priv_delete_) . "\">" . $priv_delete__look . ""; ?>
<?php } else { ?>

<?php

$priv_delete__look = "";
 if ($this->priv_delete_ == "Y") { $priv_delete__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($priv_delete__look)) { $priv_delete__look = $this->priv_delete_; }
?>
<span id="id_read_on_priv_delete_<?php echo $sc_seq_vert ; ?>" class="css_priv_delete__line" style="<?php echo $sStyleReadLab_priv_delete_; ?>"><?php echo $this->form_encode_input($priv_delete__look); ?></span><span id="id_read_off_priv_delete_<?php echo $sc_seq_vert ; ?>" class="css_read_off_priv_delete_ css_priv_delete__line" style="<?php echo $sStyleReadInp_priv_delete_; ?>"><?php echo "<div id=\"idAjaxCheckbox_priv_delete_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_priv_delete__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_priv_delete__line"><?php $tempOptionId = "id-opt-priv_delete_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-priv_delete_ sc-ui-checkbox-priv_delete_<?php echo $sc_seq_vert ?>" name="priv_delete_<?php echo $sc_seq_vert ?>[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['Lookup_priv_delete_'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->priv_delete__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_opt_yes']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_priv_delete_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_priv_delete_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['priv_update_']) && $this->nmgp_cmp_hidden['priv_update_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="priv_update_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->priv_update_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->priv_update__1 = explode(";", trim($this->priv_update_));
  } 
  else
  {
      if (empty($this->priv_update_))
      {
          $this->priv_update__1= array(); 
          $this->priv_update_= "";
      } 
      else
      {
          $this->priv_update__1= $this->priv_update_; 
          $this->priv_update_= ""; 
          foreach ($this->priv_update__1 as $cada_priv_update_)
          {
             if (!empty($priv_update_))
             {
                 $this->priv_update_.= ";"; 
             } 
             $this->priv_update_.= $cada_priv_update_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_priv_update__line" id="hidden_field_data_priv_update_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_priv_update_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_priv_update__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_priv_update_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["priv_update_"]) &&  $this->nmgp_cmp_readonly["priv_update_"] == "on") { 

$priv_update__look = "";
 if ($this->priv_update_ == "Y") { $priv_update__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($priv_update__look)) { $priv_update__look = $this->priv_update_; }
?>
<input type="hidden" name="priv_update_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($priv_update_) . "\">" . $priv_update__look . ""; ?>
<?php } else { ?>

<?php

$priv_update__look = "";
 if ($this->priv_update_ == "Y") { $priv_update__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($priv_update__look)) { $priv_update__look = $this->priv_update_; }
?>
<span id="id_read_on_priv_update_<?php echo $sc_seq_vert ; ?>" class="css_priv_update__line" style="<?php echo $sStyleReadLab_priv_update_; ?>"><?php echo $this->form_encode_input($priv_update__look); ?></span><span id="id_read_off_priv_update_<?php echo $sc_seq_vert ; ?>" class="css_read_off_priv_update_ css_priv_update__line" style="<?php echo $sStyleReadInp_priv_update_; ?>"><?php echo "<div id=\"idAjaxCheckbox_priv_update_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_priv_update__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_priv_update__line"><?php $tempOptionId = "id-opt-priv_update_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-priv_update_ sc-ui-checkbox-priv_update_<?php echo $sc_seq_vert ?>" name="priv_update_<?php echo $sc_seq_vert ?>[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['Lookup_priv_update_'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->priv_update__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_opt_yes']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_priv_update_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_priv_update_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['priv_export_']) && $this->nmgp_cmp_hidden['priv_export_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="priv_export_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->priv_export_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->priv_export__1 = explode(";", trim($this->priv_export_));
  } 
  else
  {
      if (empty($this->priv_export_))
      {
          $this->priv_export__1= array(); 
      } 
      else
      {
          $this->priv_export__1= $this->priv_export_; 
          $this->priv_export_= ""; 
          foreach ($this->priv_export__1 as $cada_priv_export_)
          {
             if (!empty($priv_export_))
             {
                 $this->priv_export_.= ";"; 
             } 
             $this->priv_export_.= $cada_priv_export_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_priv_export__line" id="hidden_field_data_priv_export_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_priv_export_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_priv_export__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_priv_export_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["priv_export_"]) &&  $this->nmgp_cmp_readonly["priv_export_"] == "on") { 

$priv_export__look = "";
 if (in_array("Y", $this->priv_export__1))  { $priv_export__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "<br />";} 
?>
<input type="hidden" name="priv_export_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($priv_export_) . "\">" . $priv_export__look . ""; ?>
<?php } else { ?>

<?php

$priv_export__look = "";
 if (in_array("Y", $this->priv_export__1))  { $priv_export__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "<br />";} 
?>
<span id="id_read_on_priv_export_<?php echo $sc_seq_vert ; ?>" class="css_priv_export__line" style="<?php echo $sStyleReadLab_priv_export_; ?>"><?php echo $this->form_encode_input($priv_export__look); ?></span><span id="id_read_off_priv_export_<?php echo $sc_seq_vert ; ?>" class="css_read_off_priv_export_ css_priv_export__line" style="<?php echo $sStyleReadInp_priv_export_; ?>"><?php echo "<div id=\"idAjaxCheckbox_priv_export_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_priv_export__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_priv_export__line"><?php $tempOptionId = "id-opt-priv_export_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-priv_export_ sc-ui-checkbox-priv_export_<?php echo $sc_seq_vert ?>" name="priv_export_<?php echo $sc_seq_vert ?>[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['Lookup_priv_export_'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->priv_export__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_opt_yes']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_priv_export_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_priv_export_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['priv_print_']) && $this->nmgp_cmp_hidden['priv_print_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="priv_print_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->priv_print_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->priv_print__1 = explode(";", trim($this->priv_print_));
  } 
  else
  {
      if (empty($this->priv_print_))
      {
          $this->priv_print__1= array(); 
          $this->priv_print_= "";
      } 
      else
      {
          $this->priv_print__1= $this->priv_print_; 
          $this->priv_print_= ""; 
          foreach ($this->priv_print__1 as $cada_priv_print_)
          {
             if (!empty($priv_print_))
             {
                 $this->priv_print_.= ";"; 
             } 
             $this->priv_print_.= $cada_priv_print_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_priv_print__line" id="hidden_field_data_priv_print_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_priv_print_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_priv_print__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_priv_print_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["priv_print_"]) &&  $this->nmgp_cmp_readonly["priv_print_"] == "on") { 

$priv_print__look = "";
 if ($this->priv_print_ == "Y") { $priv_print__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($priv_print__look)) { $priv_print__look = $this->priv_print_; }
?>
<input type="hidden" name="priv_print_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($priv_print_) . "\">" . $priv_print__look . ""; ?>
<?php } else { ?>

<?php

$priv_print__look = "";
 if ($this->priv_print_ == "Y") { $priv_print__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($priv_print__look)) { $priv_print__look = $this->priv_print_; }
?>
<span id="id_read_on_priv_print_<?php echo $sc_seq_vert ; ?>" class="css_priv_print__line" style="<?php echo $sStyleReadLab_priv_print_; ?>"><?php echo $this->form_encode_input($priv_print__look); ?></span><span id="id_read_off_priv_print_<?php echo $sc_seq_vert ; ?>" class="css_read_off_priv_print_ css_priv_print__line" style="<?php echo $sStyleReadInp_priv_print_; ?>"><?php echo "<div id=\"idAjaxCheckbox_priv_print_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_priv_print__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_priv_print__line"><?php $tempOptionId = "id-opt-priv_print_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-priv_print_ sc-ui-checkbox-priv_print_<?php echo $sc_seq_vert ?>" name="priv_print_<?php echo $sc_seq_vert ?>[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['Lookup_priv_print_'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->priv_print__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_opt_yes']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_priv_print_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_priv_print_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_app_name_))
       {
           $this->nmgp_cmp_readonly['app_name_'] = $sCheckRead_app_name_;
       }
       if ('display: none;' == $sStyleHidden_app_name_)
       {
           $this->nmgp_cmp_hidden['app_name_'] = 'off';
       }
       if (isset($sCheckRead_priv_access_))
       {
           $this->nmgp_cmp_readonly['priv_access_'] = $sCheckRead_priv_access_;
       }
       if ('display: none;' == $sStyleHidden_priv_access_)
       {
           $this->nmgp_cmp_hidden['priv_access_'] = 'off';
       }
       if (isset($sCheckRead_priv_insert_))
       {
           $this->nmgp_cmp_readonly['priv_insert_'] = $sCheckRead_priv_insert_;
       }
       if ('display: none;' == $sStyleHidden_priv_insert_)
       {
           $this->nmgp_cmp_hidden['priv_insert_'] = 'off';
       }
       if (isset($sCheckRead_priv_delete_))
       {
           $this->nmgp_cmp_readonly['priv_delete_'] = $sCheckRead_priv_delete_;
       }
       if ('display: none;' == $sStyleHidden_priv_delete_)
       {
           $this->nmgp_cmp_hidden['priv_delete_'] = 'off';
       }
       if (isset($sCheckRead_priv_update_))
       {
           $this->nmgp_cmp_readonly['priv_update_'] = $sCheckRead_priv_update_;
       }
       if ('display: none;' == $sStyleHidden_priv_update_)
       {
           $this->nmgp_cmp_hidden['priv_update_'] = 'off';
       }
       if (isset($sCheckRead_priv_export_))
       {
           $this->nmgp_cmp_readonly['priv_export_'] = $sCheckRead_priv_export_;
       }
       if ('display: none;' == $sStyleHidden_priv_export_)
       {
           $this->nmgp_cmp_hidden['priv_export_'] = 'off';
       }
       if (isset($sCheckRead_priv_print_))
       {
           $this->nmgp_cmp_readonly['priv_print_'] = $sCheckRead_priv_print_;
       }
       if ('display: none;' == $sStyleHidden_priv_print_)
       {
           $this->nmgp_cmp_hidden['priv_print_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_sec_form_sec_groups_apps = $guarda_form_vert_sec_form_sec_groups_apps;
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
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "R")
{
    $NM_btn = false;
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
              $obj_sel = ($this->sc_max_reg == '15') ? " selected" : "";
?> 
           <option value="15" <?php echo $obj_sel ?>>15</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '30') ? " selected" : "";
?> 
           <option value="30" <?php echo $obj_sel ?>>30</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '40') ? " selected" : "";
?> 
           <option value="40" <?php echo $obj_sel ?>>40</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
<?php 
              $obj_sel = ($this->form_paginacao == 'total') ? " selected" : "";
?> 
           <option value="all" <?php echo $obj_sel ?>>all</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterarsel", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['maximized']))
  {
?>
</td></tr> 
<tr><td><table width="100%"> 
   <TABLE width="100%" class="scFormFooter">
    <TR align="center">
     <TD>
      <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
       <TR align="center" valign="middle">
        <TD align="left" rowspan="2" class="scFormFooterFont">
          
        </TD>
        <TD class="scFormFooterFont">
          
        </TD>
       </TR>
       <TR align="right" valign="middle">
        <TD class="scFormFooterFont">
          
        </TD>
       </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE><?php
  }
?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("sec_form_sec_groups_apps");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("sec_form_sec_groups_apps");
 parent.scAjaxDetailHeight("sec_form_sec_groups_apps", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("sec_form_sec_groups_apps", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("sec_form_sec_groups_apps", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['sc_modal'])
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
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_t.sc-unique-btn-1").length && $("#sc_b_ini_t.sc-unique-btn-1").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_t.sc-unique-btn-2").length && $("#sc_b_ret_t.sc-unique-btn-2").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_t.sc-unique-btn-3").length && $("#sc_b_avc_t.sc-unique-btn-3").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_t.sc-unique-btn-4").length && $("#sc_b_fim_t.sc-unique-btn-4").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_b.sc-unique-btn-5").length && $("#sc_b_upd_b.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('alterar');
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
		if ($("#sc_b_sai_b.sc-unique-btn-6").length && $("#sc_b_sai_b.sc-unique-btn-6").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-7").length && $("#sc_b_sai_b.sc-unique-btn-7").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-8").length && $("#sc_b_sai_b.sc-unique-btn-8").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['sec_form_sec_groups_apps']['buttonStatus'] = $this->nmgp_botoes;
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
