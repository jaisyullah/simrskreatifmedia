<?php
/**
 * $Id: nm_gp_config_print.php,v 1.2 2012-01-27 13:02:59 sergio Exp $
 */
    include_once('stok_terkini_old_session.php');
    session_start();
    $_SESSION['scriptcase']['stok_terkini_old']['glo_nm_path_imag_temp']  = "";
    //check tmp
    if(empty($_SESSION['scriptcase']['stok_terkini_old']['glo_nm_path_imag_temp']))
    {
        $str_path_apl_url = $_SERVER['PHP_SELF'];
        $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
        $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
        $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
        /*check tmp*/$_SESSION['scriptcase']['stok_terkini_old']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    $SC_cod_proj = "simrskreatifmedia";
    $SC_apl_proc = "stok_terkini_old";
    $SC_conf_opt = explode(",","tem_res_cons,tem_res_res,opc,cor");
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
    $opc          = (isset($_GET['nm_opc']))   ? $_GET['nm_opc']   : "RC";
    $cor          = (isset($_GET['nm_cor']))   ? $_GET['nm_cor']   : "CO";
    $language     = (isset($_GET['language'])) ? $_GET['language'] : "port";
    $page         = (isset($_GET['nm_page']))  ? $_GET['nm_page']  : '';
    $res_cons     = (isset($_GET['nm_res_cons']))    ? $_GET['nm_res_cons']    : "n";
    $origem       = (isset($_GET['origem']))         ? $_GET['origem']         : "cons";
    $ini_prt_res  = (isset($_GET['nm_ini_prt_res'])) ? explode(",", $_GET['nm_ini_prt_res']) : array();
    $all_modules  = (isset($_GET['nm_all_modules'])) ? explode(",", $_GET['nm_all_modules']) : array();
    $password     = (isset($_GET['password']))       ? $_GET['password']       : "s";

/*--- exportacoes ajax */
    $export_ajax = (isset($_GET['export_ajax'])) ? $_GET['export_ajax'] : 'N';
/*--------*/
    $script_case_init = (isset($_GET['script_case_init'])) ? filter_input(INPUT_GET, 'script_case_init', FILTER_SANITIZE_NUMBER_INT) : 'N';
    $hasSelColumns    = (isset($_GET['summary_export_columns']))  ? 'S' == filter_input(INPUT_GET, 'summary_export_columns', FILTER_SANITIZE_STRING) : false;
    if (isset($_SESSION['sc_session'][$script_case_init][$SC_apl_proc]['field_order']) && $opc != 'detalhe') {
        foreach ($_SESSION['sc_session'][$script_case_init][$SC_apl_proc]['field_order'] as $ind => $cada_cmp) {
            if (!isset($_SESSION['sc_session'][$script_case_init][$SC_apl_proc]['labels'][$cada_cmp])) {
               $hasSelColumns = false;
            }
        }
    }
    else {
         $hasSelColumns = false;
    }
/*
    if (!in_array("campos_sel", $SC_conf_opt)) {
        $hasSelColumns = false;
    }
*/
    ini_set('default_charset', $_SESSION['scriptcase']['charset']);
    if (!function_exists("NM_is_utf8"))
    {
        include_once("../_lib/lib/php/nm_utf8.php");
    }

    $tradutor = array();
    if (isset($_SESSION['scriptcase']['sc_idioma_prt']))
    {
        $tradutor = $_SESSION['scriptcase']['sc_idioma_prt'];
    }
    if (!isset($tradutor[$language]))
    {
        foreach ($tradutor as $language => $resto)
        {
            break;
        }
    }
    if (!isset($tradutor[$language]))
    {
                exit;
    }

?>
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
<?php
if ((isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])  || (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup'] ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_dir'] ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_tab'] ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_tab_dir'] ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div'] ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div_dir'] ?>" />
 <?php
  if(isset($_SESSION['scriptcase']['str_google_fonts']) && !empty($_SESSION['scriptcase']['str_google_fonts']))
  {
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['str_google_fonts']; ?>" />
    <?php
  }
 ?>
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $_SESSION['scriptcase']['css_btn_popup'] ?>" />
 <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/css/smoothness/jquery-ui.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['sc_session']['path_third'] ?>/font-awesome/css/all.min.css" />
</head>
<body class="scGridPage" style="margin: 0px; overflow-x: hidden">

<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery-ui.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.js"></script>

<form name="config_prt" method="post" action="" autocomplete="off">
<?php
$pos = "left";
if ($_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'")
{
    $pos = "right";
}
?>
<table id="main_table" class="exportConfig" style="position: relative; top: 20px; <?php echo $pos; ?>: 20px">
<tr>
 <td align="center">

  <div id="tabs">
    <ul class="scAppDivTabLine" style="display:<?php echo ($hasSelColumns)?"":"none"; ?>">
      <li class="scTabActive"><a href="#tabs-general"><?php echo $tradutor[$language]['titulo']; ?></a></li>
      <li class="scTabInactive"><a href="#tabs-sel-columns"><?php echo $tradutor[$language]['titulo_colunas']; ?></a></li>
    </ul>
    <div id="tabs-general" style="padding: 0px; margin: 0px">

      <table class="scGridBorder" width='100%' cellspacing="0" cellpadding="0">
          <tr style="display:<?php echo ($hasSelColumns)?"none":""; ?>">
            <td colspan=2 class="scGridLabelVert"><?php echo $tradutor[$language]['titulo']; ?></td>
          </tr>
          <tr><td nowrap class='scGridToolbar' colspan=2 style='font-weight: bold;'><?php echo $tradutor[$language]['group_general']; ?></td></tr>
          <?php
           if (count($all_modules) < 2)
          {
          ?>
             <tr id="id_sel_modules_hidden" style="display: none">
               <td nowrap>
                <div class="input-group input-group-horizontal">
          <?php
               foreach ($all_modules as $cada_mod)
               {
                   $ckeck = (in_array($cada_mod, $ini_prt_res)) ? "checked" : "";
                   echo $tradutor[$language]['mod_' . $cada_mod];
          ?>
                 <label><input type=checkbox id="id_tem_res_cons" name="tem_res_cons[]"  <?php echo $ckeck ?> value="<?php echo $cada_mod ?>"></label>
          <?php
               }
          ?>
                </div>
               </td>
             </tr>
          <?php
          }
          else
          {
             $Opt_display = (($origem == 'cons' && !in_array("tem_res_cons", $SC_conf_opt)) || ($origem == 'res' && !in_array("tem_res_res", $SC_conf_opt))) ? true : false;
             $sDisplay = ($opc == "PC" || $res_cons != "s" || $origem == "chart" || $origem == "form" || $Opt_display) ? ' style="display: none"' : '';
          ?>
             <tr id="id_sel_modules_rc" <?php echo $sDisplay ?>>
               <td nowrap class="scGridFieldOddFont" align="left">
                <?php echo $tradutor[$language]['modules']; ?>
               </td>
               <td nowrap class="scGridFieldOddFont" align="left" nowrap>
                <div class="input-group input-group-horizontal">
          <?php
               foreach ($all_modules as $cada_mod)
               {
                   $ckeck = (in_array($cada_mod, $ini_prt_res)) ? "checked" : "";
          ?>
                 <label><input type=checkbox id="id_tem_res_cons" name="tem_res_cons[]"  <?php echo $ckeck ?> value="<?php echo $cada_mod ?>"></label>
          <?php
                   echo $tradutor[$language]['mod_' . $cada_mod];
               }
          ?>
              </div>
              </td>
             </tr>
          <?php
            $sDisplay = ($opc == "RC" || $res_cons != "s" || $origem != "cons" || $Opt_display) ? ' style="display: none"' : '';
          ?>
             <tr id="id_sel_modules_pc" <?php echo $sDisplay ?>>
               <td nowrap class="scGridFieldOddFont" align="left">
                <?php echo $tradutor[$language]['modules']; ?>
               </td>
               <td nowrap class="scGridFieldOddFont" align="left">
                <div class="input-group input-group-horizontal">
                 <label><input type=checkbox id="id_tem_res_cons_pc" name="tem_res_cons_pc[]" disabled checked value="grid"><?php echo $tradutor[$language]['mod_grid'] ?></label>
               </div>
              </td>
             </tr>
          <?php
          }
         if ($origem == "res" || $origem == "form" || $origem == "chart" || (isset($_SESSION['sc_session'][$page][$SC_apl_proc]['scroll_navigate_app']) && $_SESSION['sc_session'][$page][$SC_apl_proc]['scroll_navigate_app']))
          {
              $opc = "RC";
          ?>
            <input type="hidden" name="opc" value="RC" />
          <?php
          }
          elseif ($opc != 'detalhe')
          {
              $Opt_display = (!in_array("opc", $SC_conf_opt)) ? ' style="display: none"' : '';
          ?>
           <tr<?php echo $Opt_display ?>>
             <td nowrap class="scGridFieldOddFont" align="left">
                 <?php echo $tradutor[$language]['modoimp']; ?>
             </td>
             <td nowrap class="scGridFieldOddFont" align="left">
              <div class="input-group input-group-vertical">
              <?php
                   $ckeck = ($opc == "PC") ? "checked" : "";
              ?>
                <label><input type=radio name="opc" value="PC" onclick="control_modules('PC')" <?php echo $ckeck ?>><?php echo $tradutor[$language]['curr']; ?></label>
              <?php
                   $ckeck = ($opc == "RC") ? "checked" : "";
              ?>
                <label><input type=radio name="opc" value="RC" onclick="control_modules('RC')" <?php echo $ckeck ?>><?php echo $tradutor[$language]['total']; ?></label>
              </div>
             </td>
           </tr>
          <?php
          }
          $Opt_display = (!in_array("cor", $SC_conf_opt)) ? ' style="display: none"' : '';
          ?>
           <tr<?php echo $Opt_display ?>>
             <td nowrap class="scGridFieldOddFont" align="left">
                 <?php echo $tradutor[$language]['cor']; ?>
             </td>
             <td nowrap class="scGridFieldOddFont" align="left">
              <div class="input-group input-group-vertical">
              <?php
                   $ckeck = ($cor == "PB") ? "checked" : "";
              ?>
               <label><input type=radio name="cor" value="PB" <?php echo $ckeck ?>><?php echo $tradutor[$language]['pb']; ?></label>
              <?php
                   $ckeck = ($cor == "CO") ? "checked" : "";
              ?>
               <label><input type=radio name="cor" value="CO" <?php echo $ckeck ?>><?php echo $tradutor[$language]['color']; ?></label>
             </div>
             </td>
          </tr>

     <?php
      if ($password == "s")
      {
      ?>
       <tr>
         <td nowrap class="scGridFieldOddFont" align="left">
             <?php echo $tradutor[$language]['password']; ?>
         </td>
         <td nowrap class="scGridFieldOddFont" align="left">
           <input type=password name="password" value="" size=30> </td>
      </tr>
      <?php
      }
      ?>

          </table>
    </div>
    <div id="tabs-sel-columns" style="padding: 0px; margin: 0px; display:none">

        <?php
        if($hasSelColumns)
        {
          $bol_sel_campos_include = true;
          if(!isset($app_name))
          {
            $app_name = $SC_apl_proc;
          }
          include($app_name . "_sel_campos.php");
          $class_name = (is_numeric(substr($app_name, 0, 1))) ? "_" . $app_name : $app_name;
          $sel_campos = $class_name . "_sel_cmp";
          $sel_campos = new $sel_campos($bol_sel_campos_include, $script_case_init);
          $sel_campos->Sel_cmp_init();
          $sel_campos->Sel_cmp_init_fields();
          $sel_campos->displayHtml(false);
        }
        ?>

    </div>
  </div>
  <div class="buttons">
    <?php
    echo  $_SESSION['scriptcase']['bg_btn_popup']['bok'];
    echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo  $_SESSION['scriptcase']['bg_btn_popup']['btbremove'];
    ?>
  </div>

 </td>
 </tr>
</table>
</form>


<script language="javascript">

var bFixed = false;

function ajusta_window()
{
  var mt   = $(document.getElementById("main_table"));
  var mt1  = $(document.getElementById("tabs-general"));
  altura  = mt1.height();
  largura = mt1.width();
  if($('#tabs-sel-columns').length > 0)
  {
    mt2  = $(document.getElementById("tabs-sel-columns"));
    if(mt2.height() > altura)
    {
      altura = mt2.height();
    }
    if(mt2.width() > largura)
    {
      largura = mt2.width();
    }
  }

  //protect against max windows
  if((altura + 220) > parent.window.innerHeight) altura = parent.window.innerHeight - 220;

  if (0 == largura || 0 == altura)
  {
    setTimeout("ajusta_window()", 50);
    return;
  }
  else if(!bFixed)
  {
    bFixed = true;
    if (navigator.userAgent.indexOf("Chrome/") > 0)
    {
      self.parent.tb_resize(altura + 150, largura + 40);
      setTimeout("ajusta_window()", 50);
      return;
    }
  }
  mt.width( largura );
  self.parent.tb_resize(altura + 150, largura + 40);
}

$('#tabs > ul > li').click(function() {
  if($(this).find("a").length)
  {
    $('#tabs > ul > li').removeClass("scTabActive");
    $('#tabs > ul > li').addClass("scTabInactive");

    $(this).removeClass("scTabInactive");
    $(this).addClass("scTabActive");

    $('#tabs > div').hide();
    $($(this).find("a").attr("href")).show();
  }
});
$( document ).ready(function() {
   setTimeout("ajusta_window();$('#tabs > ul > li:first-child').click();", 50);
<?php
  if ($password == "s")
  {
?>
   document.config_prt.password.value = "";
<?php
  }
?>
});

  function scSubmitSelCamposAjaxExportDone()
  {
    saveSelColumns = true;
    processa();
  }

  function control_modules(tp_imp)
  {
<?php
      if ($res_cons != "s")
      {
?>
      return;
<?php
      }
      else
      {
?>
        if (tp_imp == 'RC') {
            document.getElementById('id_sel_modules_rc').style.display = '';
            document.getElementById('id_sel_modules_pc').style.display = 'none';
        }
        else {
            document.getElementById('id_sel_modules_pc').style.display = '';
            document.getElementById('id_sel_modules_rc').style.display = 'none';
        }
        ajusta_window();
<?php
      }
?>
  }

  var saveSelColumns = false;
  function processa()
  {
     <?php
     if($hasSelColumns)
     {
      ?>
      if(saveSelColumns == false)
      {
        scSubmitSelCamposAjaxExport();
        return false;
      }
      <?php
     }
     ?>

     <?php
     if($export_ajax != "S" && $export_ajax != "R" && $export_ajax != "D")
     {
      ?>
      self.parent.tb_remove();
      <?php
     }
     ?>
     var opc = "<?php echo NM_encode_input($opc);?>";
     var cor = "<?php echo NM_encode_input($cor);?>";
<?php
    if ($opc == 'detalhe' || (isset($_SESSION['sc_session'][$page][$SC_apl_proc]['scroll_navigate_app']) && $_SESSION['sc_session'][$page][$SC_apl_proc]['scroll_navigate_app']))
    {
?>
     opc = "RC";
<?php
    }
    else
    {
?>
     opc = (document.config_prt.opc[0] && document.config_prt.opc[0].checked) ? "PC" : "RC";
<?php
    }
?>
     cor = (document.config_prt.cor[0] && document.config_prt.cor[0].checked) ? "PB" : "CO";

 res_cons = "";
 if (opc == "PC")
 {
     res_cons = "grid";
 }
 else
 {
<?php
   if ($origem == "chart")
   {
?>
      res_cons = "chart";
<?php
   }
   else
   {
?>
     if (document.config_prt.id_tem_res_cons)
     {
         Nobj = document.getElementById('id_tem_res_cons').name;
         obj  = document.getElementsByName(Nobj);
         for (iCheck = 0; iCheck < obj.length; iCheck++) {
              if (obj[iCheck] && obj[iCheck].checked) {
                  if (res_cons != "") {
                     res_cons += ",";
                  }
                  res_cons += obj[iCheck].value;
              }
         }
     }
     else
     {
         res_cons = "<?php if ($origem == "cons") {echo "grid";} else {echo "resume,chart";} ?>";
     }
<?php
   }
?>
 }
 use_pass = "";
<?php
 if($password == "s")
 {
?>
    use_pass = document.config_prt.password.value;
<?php
 }
?>

 if (res_cons == "")
 {
    return;
 }


/*--- exportacoes ajax */
/*     parent.nm_gp_print_conf(opc, cor);return false; */
<?php
     if ($export_ajax == 'S') {
?>
         parent.nm_gp_print_conf(opc, cor, res_cons, use_pass, '<?php echo NM_encode_input($export_ajax); ?>', 'print', false);return false;
<?php
     }
     else if ($export_ajax == 'R') {
?>
         parent.nm_gp_print_conf(opc, cor, res_cons, use_pass, '<?php echo NM_encode_input($export_ajax); ?>', 'res_print', false);return false;
<?php
     }
     else if ($export_ajax == 'D') {
?>
         parent.nm_gp_print_conf(opc, cor, res_cons, use_pass, '<?php echo NM_encode_input($export_ajax); ?>', 'det_print', false);return false;
<?php
     } else {
?>
         parent.nm_gp_print_conf(opc, cor, res_cons, use_pass, '<?php echo NM_encode_input($export_ajax); ?>', '', false);return false;
<?php
     }
?>
/*--------*/

    $('#bsair').click();

  }
</script>
<script>
        //colocado aqui devido a execução modal não executar o ready do jquery
      setTimeout("ajusta_window()", 50);
</script>
</body>
</html>