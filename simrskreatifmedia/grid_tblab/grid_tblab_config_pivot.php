<?php

include_once('grid_tblab_session.php');
session_start();
$_SESSION['scriptcase']['grid_tblab']['glo_nm_path_imag_temp']  = "";
//check tmp
if(empty($_SESSION['scriptcase']['grid_tblab']['glo_nm_path_imag_temp']))
{
    $str_path_apl_url = $_SERVER['PHP_SELF'];
    $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    /*check tmp*/$_SESSION['scriptcase']['grid_tblab']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
}
$SC_cod_proj = "simrskreatifmedia";
$SC_apl_proc = "grid_tblab";
/* sc_apl_default */
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
    if (is_file($root . $_SESSION['scriptcase'][$SC_apl_proc]['glo_nm_path_imag_temp'] . "/sc_apl_default_" . $SC_cod_proj . ".txt"))
    {
?>
     <script language="javascript">
       parent.nm_move();
    </script>
<?php
        exit;
    }
}
ini_set('default_charset', $_SESSION['scriptcase']['charset']);
if (!function_exists("NM_is_utf8"))
{
    include_once("../_lib/lib/php/nm_utf8.php");
}

$s_inc = '../_lib/css/' . $_SESSION['scriptcase']['css_popup'];
include_once str_replace('.css', '.php', $s_inc);

$nome_apl  = (isset($_GET['nome_apl']))  ? $_GET['nome_apl']  : "";
$sc_page   = (isset($_GET['sc_page']))   ? $_GET['sc_page']   : "";
$language  = (isset($_GET['language']))  ? $_GET['language']  : "port";

$tradutor = array();
if (isset($_SESSION['scriptcase']['sc_idioma_pivot']))
{
    $tradutor = $_SESSION['scriptcase']['sc_idioma_pivot'];
}
if (!isset($tradutor[$language]))
{
    foreach ($tradutor as $language => $resto)
    {
        break;
    }
}
if (!isset($_SESSION['sc_session'][$sc_page][$nome_apl]))
{
   $sc_page  = $_SESSION['scriptcase']['sc_page_process'];
   $nome_apl = $SC_apl_proc;
}

if (isset($_GET['b_ok']) && 'Y' == $_GET['b_ok'])
{
    $a_x_axys = array();
    $a_y_axys = array();
    foreach ($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_group_by'] as $i_group => $l_group)
    {
        $_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_order'][$i_group] = $_GET['order_' . $i_group];
        if ('x' == $_GET['axys_' . $i_group])
        {
            $a_x_axys[] = $i_group;
        }
        else
        {
            $a_y_axys[] = $i_group;
        }
    }
    $_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_x_axys']  = $a_x_axys;
    $_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_y_axys']  = $a_y_axys;
    $_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_tabular'] = isset($_GET['tabular']) && 'Y' == $_GET['tabular'];

?>
<html>
<body>
<script language="javascript">
self.parent.document.refresh_config.submit();
self.parent.tb_remove();
</script>
</body>
</html>
<?php
    exit;
}

?>
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php  echo $_SESSION['scriptcase']['charset_html'];       ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php     echo $_SESSION['scriptcase']['css_popup'];     ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php     echo $_SESSION['scriptcase']['css_popup_dir'];     ?>" />
 <?php
  if(isset($_SESSION['scriptcase']['str_google_fonts']) && !empty($_SESSION['scriptcase']['str_google_fonts']))
  {
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['str_google_fonts']; ?>" />
    <?php
  }
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['sc_session']['path_third'] ?>/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $_SESSION['scriptcase']['css_btn_popup']; ?>" />
 <script language="javascript" type="text/javascript" src="<?php    echo $_SESSION['sc_session']['path_third'];    ?>/jquery/js/jquery.js"></script>
 <script language="javascript" type="text/javascript">
    var maxGroup = <?php  echo sizeof($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_group_by']); ?>,
        icoLine  = "../_lib/img/<?php echo $sum_ico_line;   ?>",
        icoCol   = "../_lib/img/<?php echo $sum_ico_column; ?>",
        txtLine  = "<?php echo $tradutor[$language]['smry_ppup_posi_labl']; ?>",
        txtCol   = "<?php echo $tradutor[$language]['smry_ppup_posi_data']; ?>";
    $(function(){
        $(".sc-ui-axys").mouseover(function() { $(this).css("cursor", "pointer"); })
                        .mouseout(function() { $(this).css("cursor", ""); })
                        .click(function(){
            var oDis = $(this),
                sId  = oDis.attr("id").substr(3),
                oVal = $("#id_" + sId),
                iIdx = parseInt(sId.substr(5));
            if ("y" == oVal.val()) {
                for (var i = 0; i <= iIdx; i++) {
                    $("#ui_axys_" + i).attr("src", icoLine);
                    $("#ui_axys_" + i).attr("title", txtLine);
                    $("#id_axys_" + i).val("x");
                }
            }
            else {
                for (var i = iIdx; i < maxGroup; i++) {
                    $("#ui_axys_" + i).attr("src", icoCol);
                    $("#ui_axys_" + i).attr("title", txtCol);
                    $("#id_axys_" + i).val("y");
                }
            }
        });
        x_dim();
    });
    function processa() {
        document.config_pivot.b_ok.value = 'Y';
        document.config_pivot.submit();

        $('#bsair').click();
    }
    function x_dim() {
        var mt = $("#main_table");
        var W  = mt.width(),
            H  = mt.height();
        if (0 == W || 0 == H) {
            setTimeout("x_dim()", 50);
        }
        else {
            self.parent.tb_resize(H + 40, W + 40);
        }
    }
 </script>
</head>

<body class="scGridPage" style="margin: 0px; overflow-x: hidden">

<form name="config_pivot" method="get">
<?php
$pos = "left";
if ($_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'")
{
    $pos = "right";
}
?>
<table id="main_table" class="exportConfig" style="position: relative; top: 20px; <?php echo $pos; ?>: 20px">
<tr><td>
<div class="scGridBorder">
<table class="scGridTabela" width='100%' cellspacing=0 cellpadding=0>
 <tr>
  <td class="scGridLabelVert"><?php echo $tradutor[$language]['smry_ppup_titl']; ?></td>
 </tr>
 <tr>
  <td class="scGridFieldOdd scGridFieldOddFont">
   <table style="border-collapse: collapse; border-width: 0; width: 100%">
    <tr>
     <td class="scGridFieldOddFont" style="padding: 1px 4px"><b><?php echo $tradutor[$language]['smry_ppup_fild']; ?></b></td>
     <td class="scGridFieldOddFont" style="padding: 1px 4px"><b><?php echo $tradutor[$language]['smry_ppup_posi']; ?></b></td>
     <td class="scGridFieldOddFont" style="padding: 1px 4px"><b><?php echo $tradutor[$language]['smry_ppup_sort']; ?></b></td>
    </tr>
<?php

foreach ($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_group_by'] as $i_group => $l_group)
{
    if ('label' == $_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_order'][$i_group])
    {
        $order_sel_label = ' selected';
        $order_sel_value = '';
    }
    else
    {
        $order_sel_label = '';
        $order_sel_value = ' selected';
    }
        if ('UTF-8' != $_SESSION['scriptcase']['charset'] && NM_is_utf8($l_group))
        {
            $l_group = sc_convert_encoding($l_group, $_SESSION['scriptcase']['charset'], 'UTF-8');
        }
?>
    <tr>
     <td class="scGridFieldOddFont" style="padding: 1px 4px"><?php echo $l_group; ?></td>
<?php
    if (sizeof($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_group_by']) - 1 == $i_group)
    {
?>
     <td class="scGridFieldOddFont" style="padding: 1px 4px">
      &nbsp;
      <input type="hidden" name="axys_<?php echo $i_group; ?>" value="y">
     </td>
<?php
    }
    else
    {
?>
     <td class="scGridFieldOddFont" style="padding: 1px 4px; text-align: center">
<?php
        if (in_array($i_group, $_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_x_axys']))
        {
            $s_axys_lab  = '../_lib/img/' . $sum_ico_line;
            $s_axys_val  = 'x';
            $s_axys_hint = $tradutor[$language]['smry_ppup_posi_labl'];
        }
        else
        {
            $s_axys_lab  = '../_lib/img/' . $sum_ico_column;
            $s_axys_val  = 'y';
            $s_axys_hint = $tradutor[$language]['smry_ppup_posi_data'];
        }
?>
      <img class="sc-ui-axys" id="ui_axys_<?php echo $i_group; ?>" src="<?php echo $s_axys_lab; ?>" title="<?php echo $s_axys_hint; ?>" />
      <input type="hidden" id="id_axys_<?php echo $i_group; ?>" name="axys_<?php echo $i_group; ?>" value="<?php echo NM_encode_input($s_axys_val); ?>">
     </td>
<?php
    }
?>
     <td class="scGridFieldOddFont" style="padding: 1px 4px">
      <select class="scGridObjectOdd" name="order_<?php echo $i_group; ?>">
       <option value="label"<?php echo $order_sel_label; ?>><?php echo $tradutor[$language]['smry_ppup_sort_labl']; ?></option>
       <option value="value"<?php echo $order_sel_value; ?>><?php echo $tradutor[$language]['smry_ppup_sort_vlue']; ?></option>
      </select>
     </td>
    </tr>
<?php
}

?>
   </table>
<?php
if (isset($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_group_by']) && 1 < sizeof($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_group_by']))
{
?>
   <input id="id_chk_tab" type="checkbox" name="tabular" value="Y"<?php if ($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_tabular']) { echo ' checked'; } ?> /> <label for="id_chk_tab"><?php echo $tradutor[$language]['smry_ppup_chek_tabu']; ?></label>
<?php
}
else
{
?>
   <input type="hidden" name="tabular" value="<?php if ($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_tabular']) { echo 'Y'; } else { echo 'N'; } ?>" />
<?php
}
?>
  </td>
 </tr>
 <tr>
  <td class="scGridToolbar" style="text-align: center">
   <?php echo $_SESSION['scriptcase']['bg_btn_popup']['bok'];       ?>
   &nbsp; &nbsp; &nbsp;
   <?php echo $_SESSION['scriptcase']['bg_btn_popup']['btbremove']; ?>
  </td>
 </tr>
</table>
</div>
</td></tr></table>
<input type="hidden" name="nome_apl" value="<?php echo NM_encode_input($nome_apl); ?>">
<input type="hidden" name="sc_page" value="<?php  echo NM_encode_input($sc_page); ?>" >
<input type="hidden" name="language" value="<?php echo NM_encode_input($language); ?>" >
<input type="hidden" name="b_ok" value="" >
</form>

</body>

</html>