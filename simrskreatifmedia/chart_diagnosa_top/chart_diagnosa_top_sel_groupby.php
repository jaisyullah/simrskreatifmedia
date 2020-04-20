<?php
   include_once('chart_diagnosa_top_session.php');
   session_start();
   $_SESSION['scriptcase']['chart_diagnosa_top']['glo_nm_path_imag_temp']  = "";
   //check tmp
   if(empty($_SESSION['scriptcase']['chart_diagnosa_top']['glo_nm_path_imag_temp']))
   {
       $str_path_apl_url = $_SERVER['PHP_SELF'];
       $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
       $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
       $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
       /*check tmp*/$_SESSION['scriptcase']['chart_diagnosa_top']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   if (!isset($_SESSION['sc_session']))
   {
       $NM_dir_atual = getcwd();
       if (empty($NM_dir_atual))
       {
           $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
           $str_path_sys  = str_replace("\\", '/', $str_path_sys);
       }
       else
       {
           $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
           $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
       }
       $str_path_web    = $_SERVER['PHP_SELF'];
       $str_path_web    = str_replace("\\", '/', $str_path_web);
       $str_path_web    = str_replace('//', '/', $str_path_web);
       $root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
       if (is_file($root . $_SESSION['scriptcase']['chart_diagnosa_top']['glo_nm_path_imag_temp'] . "/sc_apl_default_simrskreatifmedia.txt"))
       {
?>
           <script language="javascript">
            nm_move();
           </script>
<?php
           exit;
       }
   }
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   $Sel_Groupby = new chart_diagnosa_top_sel_Groupby(); 
   $Sel_Groupby->Sel_Groupby_init();
   
class chart_diagnosa_top_sel_Groupby
{
function Sel_Groupby_init()
{
   global $opc_ret, $sc_init, $path_img, $path_btn, $groupby_atual, $embbed, $tbar_pos, $_POST, $_GET;
   if (isset($_POST['script_case_init']))
   {
       $opc_ret  = filter_input(INPUT_POST, 'opc_ret', FILTER_SANITIZE_STRING);
       $sc_init  = filter_input(INPUT_POST, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
       $path_img = filter_input(INPUT_POST, 'path_img', FILTER_SANITIZE_STRING);
       $path_btn = filter_input(INPUT_POST, 'path_btn', FILTER_SANITIZE_STRING);
       $embbed   = isset($_POST['embbed_groupby']) && 'Y' == $_POST['embbed_groupby'];
       $tbar_pos = filter_input(INPUT_POST, 'toolbar_pos', FILTER_SANITIZE_STRING);
   }
   elseif (isset($_GET['script_case_init']))
   {
       $opc_ret  = filter_input(INPUT_GET, 'opc_ret', FILTER_SANITIZE_STRING);
       $sc_init  = filter_input(INPUT_GET, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
       $path_img = filter_input(INPUT_GET, 'path_img', FILTER_SANITIZE_STRING);
       $path_btn = filter_input(INPUT_GET, 'path_btn', FILTER_SANITIZE_STRING);
       $embbed   = isset($_GET['embbed_groupby']) && 'Y' == $_GET['embbed_groupby'];
       $tbar_pos = filter_input(INPUT_GET, 'toolbar_pos', FILTER_SANITIZE_STRING);
   }
   $this->restore = isset($_POST['restore']) ? true : false;
   if ($this->restore && !class_exists('Services_JSON'))
   {
       include_once("chart_diagnosa_top_json.php");
   }
   $this->Arr_result   = array();
   $this->static_gb_ok = "";
   
   if ($this->restore) {
       $groupby_atual = $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['all']['SC_Ind_Groupby'];
   }
   else {
       $groupby_atual = $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Ind_Groupby'];
   }
   if (isset($_POST['fsel_ok']) && $_POST['fsel_ok'] == "OK" && isset($_POST['sel_groupby']) && !$this->restore)
   {
       $this->campos_sel   = isset($_POST['campos_sel'])   ? $_POST['campos_sel']   : "";
       $this->xaxys_fields = isset($_POST['xaxys_fields']) ? $_POST['xaxys_fields'] : "";
       $this->summ_fields  = isset($_POST['summ_fields'])  ? $_POST['summ_fields']  : "";
       $this->drill_down   = isset($_POST['drill_down'])   ? 'Y' == $_POST['drill_down'] : false;
       $this->Sel_processa_out($_POST['sel_groupby']);
   }
   else
   {
       if ($embbed)
       {
           ob_start();
           $this->Sel_processa_form();
           $Temp = ob_get_clean();
           echo NM_charset_to_utf8($Temp);
       }
       else
       {
           if ($this->restore) {
               ob_start();
           }
           $this->Sel_processa_form();
       }
   }
   exit;
   
}
function Sel_processa_out($sel_groupby)
{
   global $sc_init, $groupby_atual, $opc_ret, $embbed;
   $Change_free_groupby = false;
   $campos_sel = explode("@?@", $this->campos_sel);
   if ($sel_groupby == "sc_free_group_by")
   {
       if (count($campos_sel) != count($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Gb_Free_cmp']))
       {
           $Change_free_groupby = true;
       }
       else
       {
          $Arr_temp = array();
           foreach ($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Gb_Free_cmp'] as $Cada_cmp => $Resto)
           {
               $Arr_temp[] = $Cada_cmp;
           }
           foreach ($campos_sel as $ind => $cada_cmp)
           {
               if ($Arr_temp[$ind] != $cada_cmp)
               {
                   $Change_free_groupby = true;
                   break;
               }
           }
       }
   }
   if ($sel_groupby == "sc_free_group_by" && $opc_ret == "resumo" && empty($this->campos_sel))
   { }
   elseif ($sel_groupby != $groupby_atual || $Change_free_groupby)
   {
       $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Ind_Groupby']     = $sel_groupby;
       $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['contr_array_resumo'] = "NAO";
       $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['contr_total_geral']  = "NAO";
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['ordem_quebra']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['ordem_select']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['tot_geral']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['Page_break_PDF']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['arr_total']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_group_by']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_x_axys']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_y_axys']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_fill']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_order']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_order_col']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_order_level']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_order_sort']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_order_start']);
       unset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_tabular']);
           $tab_arr_groubby_cmp = array();
           $tab_arr_groubby_sql = array();
           $tab_arr_groubby_cmp['icd1'] = array('cmp' => "icd1", 'ind' => 0, 'format' => "");
           $tab_arr_groubby_sql[0] = array('cmp' => "icd1", 'ord' => 'asc');
           $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Gb_Free_cmp']  = array();
           $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Gb_Free_sql']  = array();
           $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Gb_date_format']['sc_free_group_by'] = array();
           $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Gb_Free_orig'] = array();
           foreach ($campos_sel as $cada_cmp)
           {
               if (!empty($cada_cmp))
               {
                   $ind = $tab_arr_groubby_cmp[$cada_cmp]['ind'];
                   $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Gb_Free_cmp'][$cada_cmp] = $tab_arr_groubby_cmp[$cada_cmp]['cmp'];
                   $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Gb_Free_sql'][$cada_cmp][$tab_arr_groubby_sql[$ind]['cmp']] = $tab_arr_groubby_sql[$ind]['ord'];
                   $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Gb_date_format']['sc_free_group_by'][$cada_cmp] = $tab_arr_groubby_cmp[$cada_cmp]['format'];
               }
           }
   }
   if ($sel_groupby == "sc_free_group_by")
   {
       $groupby_this  = 0;
       $groupby_count = sizeof($campos_sel);
       $xaxys_count   = '' == $this->xaxys_fields ? 0 : sizeof(explode("@?@", $this->xaxys_fields));
       $xaxys_list    = array();
       $yaxys_list    = array();
       for ($i = 0; $i < $groupby_count; $i++)
       {
           if (0 == $xaxys_count)
           {
               $yaxys_list[$groupby_this] = $groupby_this;
           }
           else
           {
               $xaxys_list[$groupby_this] = $groupby_this;
               $xaxys_count--;
           }
           $groupby_this++;
       }
       $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_x_axys'] = $xaxys_list;
       $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_y_axys'] = $yaxys_list;
   }
   if ($opc_ret == "resumo" && !empty($this->summ_fields))
   {
       $summ_fields = explode("@?@", $this->summ_fields);
       if(isset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_display'][ $sel_groupby ]))
       {
           foreach ($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_display'][ $sel_groupby ] as $i_sum => $d_sum)
           {
               $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_display'][ $sel_groupby ][$i_sum]['display'] = in_array($i_sum, $summ_fields);
           }
       }
       $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_order'][ $sel_groupby ] = $summ_fields;
       $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_drill_down'] = $this->drill_down;
   }
?>
    <script language="javascript"> 
<?php
   if (!$embbed)
   {
?>
      self.parent.tb_remove(); 
<?php
   }
?>
<?php
   $parms_res = "";
   $sParent = $embbed ? '' : 'parent.';
   echo $sParent . "nm_gp_submit_ajax('" . $opc_ret . "', '" . $parms_res . "')"; 
?>
   </script>
<?php
}
   
function Sel_processa_form()
{
   global $sc_init, $path_img, $path_btn, $groupby_atual, $opc_ret, $embbed, $tbar_pos;
   $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "id";
   $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
   $this->Nm_lang = array();
   if (is_file($NM_arq_lang))
   {
       include_once($NM_arq_lang);
   }
   $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "ISO-8859-1";
   foreach ($this->Nm_lang as $ind => $dados)
   {
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
      {
          $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
          $this->Nm_lang[$ind] = $dados;
      }
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
      {
          $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
   }
   $display_free_gb  = false;
   $arr_campos_free  = array();
   $arr_date_format  = array();
   $arr_campos_free['icd1'] = "Diagnosa";
   $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "sc_arafiq/sc_arafiq";
   include("../_lib/css/" . $str_schema_all . "_grid.php");
   $Str_btn_grid = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
   include("../_lib/buttons/" . $Str_btn_grid);
   if (!function_exists("nmButtonOutput"))
   {
       include_once("../_lib/lib/php/nm_gp_config_btn.php");
   }
   $bStartFree   = true;
   $bSummaryPage = (isset($_GET['opc_ret']) && 'resumo' == $_GET['opc_ret']) || ($this->restore && $_POST['SummaryPage'] == "S");
   if (!$embbed)
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Nm_lang['lang_othr_chart_title'] ?> </TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_dir'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div_dir'] ?>" /> 
<?php
if(isset($_SESSION['scriptcase']['str_google_fonts']) && !empty($_SESSION['scriptcase']['str_google_fonts']))
{
?>
   <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['str_google_fonts'] ?>" />
<?php
}
?>
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $_SESSION['scriptcase']['css_btn_popup'] ?>" /> 
 <script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery.js"></script>
 <script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery-ui.js"></script>
 <script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js"></script>
 <script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['sc_session']['path_third'] ?>/font-awesome/css/all.min.css" />
<?php
   }
?>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_tab'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_tab_dir'] ?>" /> 
<?php
if ($embbed)
{
?>
 <script language="javascript" type="text/javascript">
  function scSubmitGroupBy(sPos) {
   $.ajax({
    type: "POST",
    url: "chart_diagnosa_top_sel_groupby.php",
    data: {
     script_case_init: $("#sc_id_gby_script_case_init").val(),
     script_case_session: $("#sc_id_gby_script_case_session").val(),
     path_img: $("#sc_id_gby_path_img").val(),
     path_btn: $("#sc_id_gby_path_btn").val(),
     opc_ret: $("#sc_id_gby_opc_ret").val(),
     campos_sel: $("#sc_id_gby_campos_sel").val(),
     xaxys_fields: $("#sc_id_gby_xaxys_fields").val(),
     summ_fields: $("#sc_id_gby_summ_fields").val(),
     fsel_ok: $("#sc_id_gby_fsel_ok").val(),
     sel_groupby: $(".sc_ui_gby_selected:checked").val(),
     embbed_groupby: 'Y'
    }
   }).done(function(data) {
    scBtnGroupByHide(sPos);
    buttonunselectedGROUP();
    $("#sc_id_groupby_placeholder_" + sPos).find("td").html("");
    $("#sc_id_groupby_placeholder_" + sPos).find("td").html(data);
   });
  }
  </script>
<?php
}
?>
 <script language="javascript" type="text/javascript">
  var actual_static_gb = "<?php echo $this->static_gb_ok ?>";
<?php
if ($this->restore && $bSummaryPage && isset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['res']['summarizing_fields_control']))
{
    $aOptions = array();
    foreach ($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['res']['summarizing_fields_control'] as $quebra_nome => $_arr_fields)
    {
        if(is_array($_arr_fields))
        {
            foreach ($_arr_fields as $_key_total => $d_field)
            {
                $l_field = $d_field['cmp_res'];
                $aOptions[] = "sc_id_item_summ_" . $quebra_nome . "_" . $_key_total . ": \"" . str_replace('"', '\"', $d_field['select']) . "\"";
            }
        }
    }
?>
  var scTotalOptions = {<?php echo implode(', ', $aOptions); ?>};
<?php
}
elseif (!$this->restore && $bSummaryPage && isset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_control']))
{
    $aOptions = array();
    foreach ($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_control'] as $quebra_nome => $_arr_fields)
    {
        if(is_array($_arr_fields))
        {
            foreach ($_arr_fields as $_key_total => $d_field)
            {
                $l_field = $d_field['cmp_res'];
                $aOptions[] = "sc_id_item_summ_" . $quebra_nome . "_" . $_key_total . ": \"" . str_replace('"', '\"', $d_field['select']) . "\"";
            }
        }
    }
?>
  var scTotalOptions = {<?php echo implode(', ', $aOptions); ?>};
<?php
}
?>
$(function() {
  init_js();
});
function init_js()
{
   $(".scAppDivTabLine").find("li").mouseover(function() {
    $(this).css("cursor", "pointer");
   });
   $(".sc_ui_litem").mouseover(function() {
    $(this).css("cursor", "all-scroll");
   });
   $("#sc_id_available").sortable({
    connectWith: ".sc_ui_sort_groupby",
    placeholder: "scAppDivSelectFieldsPlaceholder"
   }).disableSelection();
   $("#sc_id_yaxys").sortable({
    connectWith: ".sc_ui_sort_groupby",
    placeholder: "scAppDivSelectFieldsPlaceholder",
    update: function(event, ui) {
     $("#sc_id_sel_groupby_sc_free_group_by").prop("checked", true);
    },
    change: function( event, ui ) {
      display_btn_restore_gb();
    },
    receive: function( event, ui ) {
     display_btn_restore_gb();
    },
    remove: function( event, ui ) {
     display_btn_restore_gb();
    }
   }).disableSelection();
<?php
if ($bSummaryPage)
{
?>
   $("#sc_id_xaxys").sortable({
    connectWith: ".sc_ui_sort_groupby",
    placeholder: "scAppDivSelectFieldsPlaceholder",
    update: function(event, ui) {
     $("#sc_id_sel_groupby_sc_free_group_by").prop("checked", true);
    },
    change: function( event, ui ) {
      display_btn_restore_gb();
    },
    receive: function( event, ui ) {
     display_btn_restore_gb();
    },
    remove: function( event, ui ) {
     display_btn_restore_gb();
    }
   }).disableSelection();
   $(".sc_ui_sort_summ_available").sortable({
    helper: "clone",
    connectWith: ".sc_ui_sort_summ",
    placeholder: "scAppDivSelectFieldsPlaceholder",
    change: function( event, ui ) {
      display_btn_restore_gb();
    },
    receive: function( event, ui ) {
     display_btn_restore_gb();
    },
    remove: function(event, ui) {
     display_btn_restore_gb();
     var idx, elm, eid, nid, fieldName, opName;
     if ($(ui.item[0]).hasClass('scAppDivSelectFieldsDisabled')) {
      $(this).sortable("cancel");
      return;
     }
     sc_group_by = $(this).attr('id').substr(21);
     idx = $("#sc_id_summ_selected_" + sc_group_by).children().index($(ui.item[0]));
     if (idx == -1) return;
     elm = $(ui.item[0]).clone(true).removeClass("box ui-draggable ui-draggable-dragging").addClass("box-clone");
     eid = elm.attr("id");
     nid = 'selected_' + eid;
     elm.attr("id", nid).find(".sc-ui-total-options").html(scTotalOptions[eid]);
     if(elm.attr("id", nid).find(".sc-ui-total-options").find('option').length == 1)
     {
         elm.attr("id", nid).find(".sc-ui-total-options").hide();
     }
     $("#sc_id_summ_selected_" + sc_group_by).children(":eq(" + idx + ")").after(elm);
     $(this).sortable("cancel");
     $("#" + eid).addClass("scAppDivSelectFieldsDisabled");
<?php
   if (!$embbed)
   {
?>
     ajusta_window();
<?php
   }
?>
    }
   }).disableSelection();
   $(".sc_ui_sort_summ_selected").sortable({
    connectWith: ".sc_ui_sort_summ",
    placeholder: "scAppDivSelectFieldsPlaceholder",
    change: function( event, ui ) {
      display_btn_restore_gb();
    },
    receive: function( event, ui ) {
     display_btn_restore_gb();
    },
    remove: function(event, ui) {
     display_btn_restore_gb();
     eid = $(ui.item[0]).attr("id").substr(9);
     $(this).sortable("cancel");
     $(ui.item[0]).remove();
     $("#" + eid).removeClass("scAppDivSelectFieldsDisabled");
<?php
   if (!$embbed)
   {
?>
     ajusta_window();
<?php
   }
?>
    }
   });
<?php
}
?>
   $("#sc_id_show_static").click(function() {
    scShowStatic();
    scShowTotalFields();
   });
   $("#sc_id_show_free").click(function() {
    scShowFree();
    scShowTotalFields();
   });
   $("radio[name=sel_groupby]").click(function() {
    $('.totalization_fields').hide();
    $('#id_totalization_fields_' + $("input[name=sel_groupby]:checked").val());
   });
   scUpdateListHeight();
};
  function scShowTotalFields()
  {
    $('#sc_id_summary_fields > table').hide();
    $('#id_totalization_fields_' + $('input[name=sel_groupby]:checked').val()).show();
  }
  function scUpdateListHeight() {
   $("#sc_id_available").css("min-height", "<?php echo sizeof($arr_campos_free) * 29 ?>px");
   $("#sc_id_yaxys").css("min-height", "<?php echo sizeof($arr_campos_free) * 29 ?>px");
   $("#sc_id_xaxys").css("min-height", "<?php echo sizeof($arr_campos_free) * 29 ?>px");
<?php
if ($bSummaryPage)
{
  $max_height = 1;
  if ($this->restore && isset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['res']['summarizing_fields_display']))
  {
    foreach ($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['res']['summarizing_fields_display'] as $_quebra_nome => $_i_sum)
    {
      if (count($_i_sum) > $max_height)
      {
          $max_height = count($_i_sum);
      }
    }
  }
  elseif (!$this->restore && isset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_display']))
  {
    foreach ($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_display'] as $_quebra_nome => $_i_sum)
    {
      if (count($_i_sum) > $max_height)
      {
          $max_height = count($_i_sum);
      }
    }
  }
?>
   $(".sc_ui_sort_summ_available").css("min-height", "<?php echo $max_height * 29 ?>px");
   $(".sc_ui_sort_summ_selected").css("min-height", "<?php echo $max_height * 29 ?>px");
<?php
}
?>
  }
  function change_actual_static(static_gb) {
     actual_static_gb = static_gb;
  }
  function scPackGroupBy() {
   var fieldList, i, fieldName, selectedFields = new Array, xaxysFields = new Array, summFields = new Array;
<?php
if ($bSummaryPage)
{
?>
   fieldList = $("#sc_id_xaxys").sortable("toArray");
   for (i = 0; i < fieldList.length; i++) {
    fieldName = fieldList[i].substr(11);
    selectedFields.push(fieldName);
    xaxysFields.push(fieldName);
   }
   $("#sc_id_gby_xaxys_fields").val(xaxysFields.join("@?@"));
   fieldList = $("#sc_id_summ_selected_" + $("input[name=sel_groupby]:checked").val()).sortable("toArray");
   for (i = 0; i < fieldList.length; i++) {
    fieldName = $("#" + fieldList[i]).find("select").val();
    summFields.push(fieldName);
   }
   $("#sc_id_gby_summ_fields").val(summFields.join("@?@"));
<?php
}
?>
   fieldList = $("#sc_id_yaxys").sortable("toArray");
   for (i = 0; i < fieldList.length; i++) {
    fieldName = fieldList[i].substr(11);
    selectedFields.push(fieldName);
   }
   $("#sc_id_gby_campos_sel").val(selectedFields.join("@?@"));
  }
  function scShowStatic() {
    if($('#sc_id_static_groupby input[type=radio]').length == 1) {
        $('#sc_id_static_groupby input[type=radio]').prop('checked', true);
    }
    else {
        if (actual_static_gb != '') {
            $('#' + actual_static_gb).prop('checked', true);
        }
    }
    $("#sc_id_static_groupby").show();
    $("#sc_id_free_groupby").hide();
    $("#sc_id_show_static").addClass("scTabActive").removeClass("scTabInactive");
    $("#sc_id_show_free").addClass("scTabInactive").removeClass("scTabActive");
<?php
   if (!$embbed)
   {
?>
   ajusta_window();
<?php
   }
?>
  }
  function scShowFree() {
    if($('#sc_id_free_groupby input[type=radio]').length == 1)
    {
        $('#sc_id_free_groupby input[type=radio]').click();
    }
    $("#sc_id_static_groupby").hide();
    $("#sc_id_free_groupby").show();
    $("#sc_id_show_static").addClass("scTabInactive").removeClass("scTabActive");
    $("#sc_id_show_free").addClass("scTabActive").removeClass("scTabInactive");
<?php
   if (!$embbed)
   {
?>
   ajusta_window();
<?php
   }
?>
  }
 </script>
 <style type="text/css">
  .sc_ui_sortable {
   list-style-type: none;
   margin: 0;
   min-width: 225px;
  }
  .sc_ui_sortable li {
   margin: 0 3px 3px 3px;
   padding: 3px 3px 3px 15px;
   height: 18px;
  }
  .sc_ui_sortable li span {
   position: absolute;
   margin-left: -1.3em;
  }
  .sc_ui_ulist {
   min-width: 225px;
  }
  .sc_ui_ulist_total {
   width: 250px;
  }
  .sc_ui_litem {
  }
  .sc_ui_litem_total {
   height: 25px;
  }
 </style>
<?php
   if (!$embbed)
   {
?>
</HEAD>
<BODY class="scGridPage" style="margin: 0px; overflow-x: hidden">
<?php
   }
?>
<FORM name="Fsel_quebras" method="POST">
  <INPUT type="hidden" name="script_case_init" id="sc_id_gby_script_case_init" value="<?php echo NM_encode_input($sc_init); ?>"> 
  <INPUT type="hidden" name="script_case_session" id="sc_id_gby_script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
  <INPUT type="hidden" name="path_img" id="sc_id_gby_path_img" value="<?php echo NM_encode_input($path_img); ?>"> 
  <INPUT type="hidden" name="path_btn" id="sc_id_gby_path_btn" value="<?php echo NM_encode_input($path_btn); ?>"> 
  <INPUT type="hidden" name="opc_ret" id="sc_id_gby_opc_ret" value="<?php echo NM_encode_input($opc_ret); ?>"> 
  <INPUT type="hidden" name="campos_sel" id="sc_id_gby_campos_sel" value="">
  <INPUT type="hidden" name="xaxys_fields" id="sc_id_gby_xaxys_fields" value="">
  <INPUT type="hidden" name="summ_fields" id="sc_id_gby_summ_fields" value="">
  <INPUT type="hidden" name="fsel_ok" id="sc_id_gby_fsel_ok" value="OK"> 
<?php
if ($embbed)
{
    echo "<div class='scAppDivMoldura'>";
    echo "<table id=\"main_table\" style=\"width: 100%\" cellspacing=0 cellpadding=0>";
}
elseif ($_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'")
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; right: 20px; min-width: 500px\">";
}
else
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; left: 20px; min-width: 500px\">";
}
?>
<?php
if (!$embbed)
{
?>
<tr>
<td>
<div class="scGridBorder">
<table width='100%' cellspacing=0 cellpadding=0>
<?php
}
?>
 <tr>
  <td class="<?php echo ($embbed)? 'scAppDivHeader scAppDivHeaderText':'scGridLabelVert'; ?>">
   <?php echo $this->Nm_lang['lang_btns_grpby_hint']; ?>
  </td>
 </tr>
 <tr>
  <td class="<?php echo ($embbed)? 'scAppDivContent css_scAppDivContentText':'scGridTabelaTd'; ?>">
   <table class="<?php echo ($embbed)? '':'scGridTabela'; ?>" style="border-width: 0; border-collapse: collapse; width:100%;" cellspacing=0 cellpadding=0>
    <tr class="<?php echo ($embbed)? '':'scGridFieldOddVert'; ?>">
     <td style="vertical-align: top">
      <table cellspacing=0 cellpadding=0 style="width: 100%">
<?php
    $has_group_by_static  = false;
    $has_group_by_dynamic = true;
    $has_total_dynamic    = true && $opc_ret == "resumo";
    $iTabCount            = 1;
    if (1 < $iTabCount)
    {
?>
 <tr id="sc_id_tabs_groupby">
<?php
    if ($this->restore) {
        ob_end_clean();
        ob_start();
    }
?>
  <td>
   <ul class="scAppDivTabLine" onclick="display_btn_restore_gb();">
<?php
        if ($has_group_by_static)
        {
            $sTabClass = ('sc_free_group_by' == $groupby_atual) ? 'scTabInactive' : 'scTabActive';
?>
    <li id="sc_id_show_static" class="<?php echo $sTabClass; ?>"><a><?php echo $this->Nm_lang['lang_othr_groupby_static']; ?></a></li>
<?php
        }
        if ($has_group_by_dynamic)
        {
            $sTabClass = ('sc_free_group_by' == $groupby_atual) ? 'scTabActive' : 'scTabInactive';
?>
    <li id="sc_id_show_free" class="<?php echo $sTabClass; ?>"><a><?php echo $this->Nm_lang['lang_othr_groupby_dynamic']; ?></a></li>
<?php
        }
?>
   </ul>
  </td>
<?php
    if ($this->restore) {
        $this->Arr_result['set_html'][] = array('field' => 'sc_id_tabs_groupby', 'value' =>  NM_charset_to_utf8(ob_get_contents()));
    }
?>
 </tr>
<?php
    }
?>
<style>
	.GroupByOptions {
		padding: 10px;
	}

	.GroupByOptions > div input {
		float: left;
		position: relative;
		top: -10px;
	}

	.GroupByOptions > div label span {
		display: block;
		font-weight: normal;
		font-size:12px;
		opacity: 0.7;
	}

	.GroupByOptions > div label {
		font-weight: bold;
	}

	.GroupByOptions > div {
		padding: 5px 0;
		border-width: 0px 0px 1px 0px;
		border-style: solid;
	}

	.GroupByOptions > div:last-child {
		border-bottom: none;
	}

	tr#sc_id_free_groupby > td > table {
		margin: 10px;
	}

	.SummaryBox > td #sc_id_summary_fields {
		padding: 10px;
		border-width: 1px;
		border-style: solid;
	}

	.SummaryBox > td ul {
		margin-top: 5px;
	}

	.SummaryBox > td {
		border-width: 1px;
		border-style: solid;
	}

	.SummaryBox > td .scAppDivHeader {
		border: none;
		height: 30px;
		padding: 0 10px;
		line-height: 30px;
		text-transform: uppercase;
		font-size: 11px;
	}

	.SummaryBox > td {
		border: none;
		padding-top: 10px;
	}

	.SummaryBox > td .scAppDivHeader:before {
		content: "";
		display: inline-block;
		width: 16px;
		height: 16px;
		float: left;
		position: relative;
		top: 7px;
		margin-right: 3px;
		background-position: center center;
		background-repeat: no-repeat;
	}

</style>
<script type="text/javascript">
$(function() {
	$(".SummaryBoxDiv").on("click", function() {
		$('#sc_id_summary_fields').toggle();
		$(this).toggleClass("open");
	});
});
</script>
 <tr id="sc_id_free_groupby">
<?php
    if ($this->restore) {
        ob_end_clean();
        ob_start();
    }
?>
  <td>
<?php
     if (!in_array("sc_free_group_by", $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Groupby_hide']))
     {
        $check = ($groupby_atual == "sc_free_group_by") ? " checked" : "";
?>
      <span style="display: none">
       <input type="radio" class="scAppDivToolbarInput sc_ui_gby_selected" name="sel_groupby" value="sc_free_group_by" id="sc_id_sel_groupby_sc_free_group_by"<?php echo $check ?> /><label for="sc_id_sel_groupby_sc_free_group_by" style="font-weight: bold"><?php echo $this->Nm_lang['lang_othr_groupby_free']; ?></label>
       <br /><br />
      </span>
<?php
        if ($bSummaryPage)
        {
?>
      <?php echo $this->Nm_lang['lang_othr_groupby_required']; ?><br />
<?php
        }
?>
      <table>
<?php
        $aYAxysFields = array();
        $aXAxysFields = array();
        $sYAxysLabel  = $this->Nm_lang['lang_othr_groupby_selected_fld'];
        $arr_tmp = ($this->restore) ? $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['all']['SC_Gb_Free_cmp'] : $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Gb_Free_cmp'];
        foreach ($arr_tmp as $NM_cada_field => $resto)
        {
            $aYAxysFields[$NM_cada_field] = $resto;
        }
?>
       <tr>
        <td style="vertical-align: top">
         <?php echo $this->Nm_lang['lang_othr_groupby_available_fld']; ?>
         <ul class="sc_ui_sort_groupby sc_ui_sortable sc_ui_ulist scAppDivSelectFields" id="sc_id_available">
<?php
        foreach ($arr_campos_free as $NM_cada_field => $NM_cada_label)
        {
           if (!isset($arr_tmp[$NM_cada_field]))
           {
?>
          <li class="sc_ui_litem scAppDivSelectFieldsEnabled" id="sc_id_item_<?php echo NM_encode_input($NM_cada_field); ?>"><?php echo $NM_cada_label; ?></li>
<?php
           }
        }
?>
         </ul>
        </td>
        <td style="vertical-align: top">
         <?php echo $sYAxysLabel; ?>
         <ul class="sc_ui_sort_groupby sc_ui_sortable sc_ui_ulist scAppDivSelectFields" id="sc_id_yaxys">
<?php
        if ($bSummaryPage)
        {
            if ($this->restore) {
                $xAxysGroupCount = count($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['res']['pivot_x_axys']);
            }
            else {
                $xAxysGroupCount = count($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_x_axys']);
            }
        }
        foreach ($aYAxysFields as $NM_cada_field => $resto)
        {
            if ($bSummaryPage && 0 != $xAxysGroupCount)
            {
                $xAxysGroupCount--;
                continue;
            }
?>
          <li class="sc_ui_litem scAppDivSelectFieldsEnabled" id="sc_id_item_<?php echo NM_encode_input($NM_cada_field); ?>"><?php echo $arr_campos_free[$NM_cada_field]; ?></li>
<?php
        }
?>
         </ul>
        </td>
<?php
        if ($bSummaryPage)
        {
            $aTmpGroupBy = $aYAxysFields;
            if (!empty($aYAxysFields))
            {
                $arr_pivot_x_axys = ($this->restore) ? $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['res']['pivot_x_axys'] : $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['pivot_x_axys'];
                foreach ($arr_pivot_x_axys as $temp)
                {
                    reset($aTmpGroupBy);
                    $temp_key                 = key($aTmpGroupBy);
                    $aXAxysFields[$temp_key] = $aTmpGroupBy[$temp_key];
                    unset($aYAxysFields[$temp_key]);
                    unset($aTmpGroupBy[$temp_key]);
                }
            }
            $sYAxysLabel = $this->Nm_lang['lang_othr_groupby_axis_y'];
?>
        <td rowspan="2" style="vertical-align: top">
         <?php echo $this->Nm_lang['lang_othr_groupby_axis_x']; ?>
         <ul class="sc_ui_sort_groupby sc_ui_sortable sc_ui_ulist scAppDivSelectFields" id="sc_id_xaxys">
<?php
            foreach ($aXAxysFields as $NM_cada_field => $resto)
            {
?>
          <li class="sc_ui_litem scAppDivSelectFieldsEnabled" id="sc_id_item_<?php echo NM_encode_input($NM_cada_field); ?>"><?php echo $arr_campos_free[$NM_cada_field]; ?></li>
<?php
            }
?>
         </ul>
        </td>
<?php
        }
?>
       </tr>
      </table>
<?php
     }
?>
  </td>
<?php
    if ($this->restore) {
        $this->Arr_result['set_html'][] = array('field' => 'sc_id_free_groupby', 'value' =>  NM_charset_to_utf8(ob_get_contents()));
    }
?>
 </tr>
<?php
   $iItemCount = 0;
   if ($bSummaryPage)
   {
       $aSummStatus        = array();
       $arr_start_selected = array();
       if (!isset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_control'])) {
           $arr_filds = array();
       }
       else {
           $arr_filds = ($this->restore) ? $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['res']['summarizing_fields_control'] : $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_control'];
       }
    if (isset($arr_filds))
    {
?>
 <tr id="sc_id_summary" class="SummaryBox" style='display:<?php echo ($has_total_dynamic)?'':'none';?>'>
<?php
    if ($this->restore) {
        ob_end_clean();
        ob_start();
    }
?>
  <td>
    <div class='scAppDivHeader scAppDivHeaderText SummaryBoxDiv  open' style='cursor:pointer;'><?php echo $this->Nm_lang['lang_othr_totals']; ?></div>
    <div id='sc_id_summary_fields' style='display:'>
    <?php
    foreach ($arr_filds as $nome_quebra => $_arr_fields_totals)
    {
    ?>
      <table class="totalization_fields" id="id_totalization_fields_<?php echo $nome_quebra; ?>" style="display:<?php echo ($groupby_atual == $nome_quebra)?'':'none'; ?>">
       <tr>
        <td style="vertical-align: top">
         <?php echo $this->Nm_lang['lang_othr_groupby_totals_fld']; ?>
         <ul class="sc_ui_sort_summ sc_ui_sort_summ_available sc_ui_sortable sc_ui_ulist sc_ui_ulist_total scAppDivSelectFields" id="sc_id_summ_available_<?php echo $nome_quebra; ?>">
<?php
          if(is_array($_arr_fields_totals) && !empty($_arr_fields_totals))
          {
            foreach ($_arr_fields_totals as $key_total => $d_field)
            {
                $l_field = $d_field['cmp_res'];
                $aSummStatus[$l_field] = array();
                $sLabel = (isset($d_field['label']) && !empty($d_field['label'])) ? $d_field['label'] : $d_field['label_field'];
                $sOpDisplay = '';
                if('NM_Count' == $l_field || (isset($d_field['options']) && count($d_field['options']) == 1))
                {
                    $sOpDisplay = '; display: none';
                }
?>
              <li class="sc_ui_litem sc_ui_litem_total scAppDivSelectFieldsEnabled" id="sc_id_item_summ_<?php echo $nome_quebra; ?>_<?php echo $key_total; ?>"><table cellpading=0 cellspacing=0 border=0 style="width: 100%"><tr><td><?php echo NM_encode_input($sLabel); ?></td><td style="text-align: right" class="sc-ui-total-options"><?php
                foreach ($d_field['options'] as $d_sum)
                {
                    $aSummStatus[$l_field][] = $d_sum['op'];
?>
&nbsp;<span style="position: relative; margin-left: 0<?php echo $sOpDisplay; ?>" class="scAppDivSelectBoxEnabled sc-ui-select-available-<?php echo NM_encode_input($d_sum['op']); ?>"><?php echo NM_encode_input($d_sum['abbrev']); ?></span><?php
                }
?>
</td></tr></table></li>
<?php
            }
          }
?>
         </ul>
        </td>
        <td style="vertical-align: top">
         <?php
         echo $this->Nm_lang['lang_othr_groupby_selected_fld'];
         ?>
         <ul class="sc_ui_sort_summ sc_ui_sort_summ_selected sc_ui_sortable sc_ui_ulist sc_ui_ulist_total scAppDivSelectFields" id="sc_id_summ_selected_<?php echo $nome_quebra; ?>">
<?php
          if (!isset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_display'])) {
              $arr_disp = array();
          }
          else {
                 $arr_disp = ($this->restore) ? $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['res']['summarizing_fields_display'] : $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_display'];
          }
          if (!isset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_order'])) {
              $arr_ord = array();
          }
          else {
              $arr_ord  = ($this->restore) ? $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['res']['summarizing_fields_order']   : $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['summarizing_fields_order'];
          }
          if(isset($arr_ord[ $nome_quebra ]) && is_array($arr_ord[$nome_quebra]) && !empty($arr_ord[$nome_quebra]))
          {
           foreach ($arr_ord[$nome_quebra] as $i_sum)
           {
            if ('' != $i_sum && isset($arr_disp[$nome_quebra][$i_sum]))
            {
                $d_sum = $arr_disp[$nome_quebra][$i_sum];
                if ($d_sum['display'])
                {
                    $sLabel = $d_sum['label'];
                    $sId    = '';
                    $bFound = false;
                    $iKey   = $key_total;
                    if(isset($arr_filds[$nome_quebra]))
                    {
                        foreach ($arr_filds[$nome_quebra] as $_key_total => $d_field)
                        {
                            if(is_array($d_field))
                            {
                                    $l_field = $d_field['cmp_res'];
                                    foreach ($d_field['options'] as $d_option)
                                    {
                                        if ($d_option['index'] == $i_sum)
                                        {
                                            $sLabel = (isset($d_field['label']) && !empty($d_field['label'])) ? $d_field['label'] : $d_field['label_field'];
                                            $sId    = $l_field;
                                            $bFound = true;
                                            $iKey = $_key_total;
                                            $arr_start_selected[ $nome_quebra ][] = $_key_total;
                                        }
                                    }
                                    if ($bFound)
                                    {
                                        break;
                                    }
                            }
                        }
                    }
                    $sSelDisplay = '';
                    if('NM_Count' == $sId || (isset($d_field['options']) && count($d_field['options']) == 1))
                    {
                        $sSelDisplay = ' style="display: none"';
                    }
?>
          <li class="sc_ui_litem sc_ui_litem_total scAppDivSelectFieldsEnabled" id="selected_sc_id_item_summ_<?php echo $nome_quebra; ?>_<?php echo $iKey; ?>"><table cellpadding=0 cellspacing = 0 border=0 style="width: 100%"><tr><td><?php echo NM_encode_input($sLabel); ?></td><td style="text-align: right" class="sc-ui-total-options"><select class="sc-ui-select-<?php echo $sId; ?>"<?php echo $sSelDisplay; ?> onChange=""><?php
                    foreach ($d_field['options'] as $d_option)
                    {
                        $sSelected = $i_sum == $d_option['index'] ? ' selected' : '';
?>
<option value="<?php echo $d_option['index']; ?>" class="sc-ui-select-option-<?php echo $d_option['op']; ?>"<?php echo $sSelected; ?>><?php echo NM_encode_input($d_option['label']); ?></option><?php
                    }
?>
</select></td></tr></table></li>
<?php
                    $iItemCount++;
                }
           }
          }
         }
?>
         </ul>
        </td>
       </tr>
    <?php
    }
?>
      </table>
    <?php
    }
    ?>
   </div>
   <br />
  </td>
<?php
    if ($this->restore) {
        $this->Arr_result['set_html'][] = array('field' => 'sc_id_summary', 'value' =>  NM_charset_to_utf8(ob_get_contents()));
    }
?>
 </tr>
<?php
   }
   if(!empty($arr_start_selected))
   {
   ?>
<script type="text/javascript">
    $(function() {
    <?php
    if ($this->restore) {
        ob_end_clean();
        ob_start();
    }
    foreach($arr_start_selected as $_group_name => $_arr_group_start)
    {
        foreach($_arr_group_start as $_key_total_index)
        {
        ?>
        $("#sc_id_item_summ_<?php echo $_group_name; ?>_<?php echo $_key_total_index; ?>").addClass("scAppDivSelectFieldsDisabled");
        <?php
        }
    }
    if ($this->restore) {
        $this->Arr_result['run_js'][] = NM_charset_to_utf8(ob_get_contents());
    }
    ?>
   });
</script>
   <?php
   }
   if ($this->restore) {
       $oJson = new Services_JSON();
        ob_end_clean();
        if ($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['all']['SC_Ind_Groupby'] == "sc_free_group_by") {
           $this->Arr_result['run_js'][] = "scShowFree()";
        } else {
           $this->Arr_result['set_var'][] = array('var' => 'actual_static_gb', 'value' => $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb']['all']['SC_Ind_Groupby']);
           $this->Arr_result['run_js'][] = "scShowStatic()";
        }
       $this->Arr_result['run_js'][] = "init_js()";
        if (!$embbed) {
           $this->Arr_result['run_js'][] = "ajusta_window()";
        }
        echo $oJson->encode($this->Arr_result);
        exit;
   }
?>
   </td>
  </table>
  </td>
  </tr>
   <tr>
  <td class="<?php echo ($embbed)? 'scAppDivToolbar':'scGridToolbar'; ?>" colspan=2>
<?php
   $disp_rest = "none";
   foreach ($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['dados_orig_gb'] as $tp => $fields) {
       foreach ($fields as $name => $data) {
           if (isset($_SESSION['sc_session'][$sc_init]['chart_diagnosa_top'][$name])) {
               if ($tp == "all" && ($name != "SC_Gb_Free_cmp" || $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top']['SC_Ind_Groupby'] == "sc_free_group_by")) {
                   if ($data != $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top'][$name]) {
                       $disp_rest = "";
                       break;
                   }
               }
               elseif ($tp == "res" && $bSummaryPage && $data != $_SESSION['sc_session'][$sc_init]['chart_diagnosa_top'][$name]) {
                   $disp_rest = "";
                   break;
               }
           }
       }
   }
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bok_appdiv", "proc_btn_gb('f_sel_sub_gb','scPackGroupBy();buttonunselectedGROUP();document.Fsel_quebras.submit()')", "proc_btn_gb('f_sel_sub_gb','scPackGroupBy();buttonunselectedGROUP();document.Fsel_quebras.submit()')", "f_sel_sub_gb", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bapply_appdiv", "proc_btn_gb('f_sel_sub_gb','scPackGroupBy();scSubmitGroupBy(\\'" . $tbar_pos . "\\')')", "proc_btn_gb('f_sel_sub_gb','scPackGroupBy();scSubmitGroupBy(\\'" . $tbar_pos . "\\')')", "f_sel_sub_gb", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
  &nbsp;&nbsp;&nbsp;
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "brestore_appdiv", "proc_btn_gb('Brestore_gb','restore_gb()')", "proc_btn_gb('Brestore_gb','restore_gb()')", "Brestore_gb", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "brestore_appdiv", "proc_btn_gb('Brestore_gb','restore_gb()')", "proc_btn_gb('Brestore_gb','restore_gb()')", "Brestore_gb", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
  &nbsp;&nbsp;&nbsp;
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bsair_appdiv", "self.parent.tb_remove(); buttonunselectedGROUP();", "self.parent.tb_remove(); buttonunselectedGROUP();", "Bsair_gb", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "scBtnGroupByHide('" . $tbar_pos . "'); buttonunselectedGROUP();", "scBtnGroupByHide('" . $tbar_pos . "'); buttonunselectedGROUP();", "Bsair_gb", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
   </td></tr>
<?php
if (!$embbed)
{
?>
  </table>
  </div>
  </td>
  </tr>
<?php
}
?>
  </table>
<?php
if ($embbed)
{
?>
    </div>
<?php
}
?>
</FORM>
<script language="javascript">
$(function() {
<?php
   if ($bStartFree)
   {
?>
       scShowFree();
<?php
   }
   else
   {
?>
       scShowStatic();
<?php
   }
?>
});
function restore_gb() {
     $.ajax({
         type: 'POST',
         url: "chart_diagnosa_top_sel_groupby.php",
         data: {
            script_case_init: $("#sc_id_gby_script_case_init").val(),
            script_case_session: $("#sc_id_gby_script_case_session").val(),
            opc_ret: '<?php echo $opc_ret ?>',
            embbed_groupby: '<?php echo ($embbed) ? "Y" : "N" ?>',
            SummaryPage: '<?php echo ($bSummaryPage) ? "S" : "N" ?>',
            restore: 'ok',
         }
     })
     .done(function(retcombos) {
        eval("Combos = " + retcombos);
        for (i = 0; i < Combos["set_html"].length; i++) {
            $("#" + Combos["set_html"][i]["field"]).html(Combos["set_html"][i]["value"]);
        }
        if (Combos["set_var"]) {
            for (i = 0; i < Combos["set_var"].length; i++) {
                 eval (Combos["set_var"][i]["var"] + ' = \"' + Combos["set_var"][i]["value"] + '\"');
            }
        }
        for (i = 0; i < Combos["run_js"].length; i++) {
             eval(Combos["run_js"][i]);
        }
        buttonDisable_gb("Brestore_gb");
        buttonEnable_gb("f_sel_sub_gb");
        $('#f_sel_sub_gb').css('display', 'inline-block');
     });
}
function display_btn_restore_gb() {
    buttonEnable_gb("Brestore_gb");
    buttonEnable_gb("f_sel_sub_gb");
}
function buttonDisable_gb(buttonId) {
    $("#" + buttonId).prop("disabled", true).addClass("disabled");
}
function buttonEnable_gb(buttonId) {
    $("#" + buttonId).prop("disabled", false).removeClass("disabled");
}
function buttonSelectedGROUP() {
   $("#sel_groupby_top").addClass("selected");
   $("#sel_groupby_bottom").addClass("selected");
}
function buttonunselectedGROUP() {
   $("#sel_groupby_top").removeClass("selected");
   $("#sel_groupby_bottom").removeClass("selected");
}
function proc_btn_gb(btn, proc) {
    if ($("#" + btn).prop("disabled") == true) {
        return;
    }
    eval (proc);
}
$(document).ready(function() {
   buttonDisable_gb("f_sel_sub_gb");
   buttonSelectedGROUP();
<?php
   if ($disp_rest == "none") {
?>
   buttonDisable_gb("Brestore_gb");
<?php
   }
?>
});
</script>
<?php
   if (!$embbed)
   {
?>
<script language="javascript"> 
var bFixed = false;
function ajusta_window()
{
  var mt = $(document.getElementById("main_table"));
  if (0 == mt.width() || 0 == mt.height())
  {
    setTimeout("ajusta_window()", 50);
    return;
  }
  else if(!bFixed)
  {
    var oOrig = $(document.Fsel_quebras.sel_groupby),
        mHeight = oOrig.height(),
        mWidth  = oOrig.width() + 5;
    oOrig.height(mHeight);
    oOrig.width(mWidth);
    bFixed = true;
    if (navigator.userAgent.indexOf("Chrome/") > 0)
    {
      strMaxHeight = Math.min(($(window.parent).height()-80), mt.height());
      self.parent.tb_resize(strMaxHeight + 40, mt.width() + 40);
      setTimeout("ajusta_window()", 50);
      return;
    }
  }
  strMaxHeight = Math.min(($(window.parent).height()-80), mt.height());
  self.parent.tb_resize(strMaxHeight + 40, mt.width() + 40);
}
$( document ).ready(function() {
  ajusta_window();
});
</script>
<script>
  ajusta_window();
</script>
</BODY>
</HTML>
<?php
   }
}
}
