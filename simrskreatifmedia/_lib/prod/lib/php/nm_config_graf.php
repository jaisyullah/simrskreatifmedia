<?php
/**
 * $Id: nm_config_graf.php,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
    session_start();

    $nome_apl  = (isset($_GET['nome_apl']))  ? $_GET['nome_apl']  : "";
    $campo_apl = (isset($_GET['campo_apl'])) ? $_GET['campo_apl'] : "nm_resumo_graf";
    $sc_page   = (isset($_GET['sc_page']))   ? $_GET['sc_page']   : "";
    $language  = (isset($_GET['language']))  ? $_GET['language']  : "port";
    if (isset($_POST['bok_graf']) && $_POST['bok_graf'] == "OK" && $_POST['campo_apl'] == "nm_resumo_graf")
    {
       if (isset($_POST['tipo']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_tipo']   = $_POST['tipo'];
       }
       if (isset($_POST['largura']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_larg']   = $_POST['largura'];
       }
       if (isset($_POST['altura']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_alt']    = $_POST['altura'];
       }
       if (isset($_POST['margem']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_margem'] = $_POST['margem'];
       }
       if (isset($_POST['aspecto']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_aspec']  = $_POST['aspecto'];
       }
    }
    elseif (isset($_POST['bok_graf']) && $_POST['bok_graf'] == "OK")
    {
       if (isset($_POST['tipo']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_tipo']   = $_POST['tipo'];
       }
       if (isset($_POST['largura']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_larg']   = $_POST['largura'];
       }
       if (isset($_POST['altura']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_alt']    = $_POST['altura'];
       }
       if (isset($_POST['margem']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_margem'] = $_POST['margem'];
       }
       if (isset($_POST['aspecto']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_aspec']  = $_POST['aspecto'];
       }
    }
    if (isset($_POST['bok_graf']) && $_POST['bok_graf'] == "OK")
    {
?>
       <html>
       <body>
       <script language="javascript">
          window.close();
       </script>
       </body>
       </html>
<?php
       exit;
    }
    elseif ($campo_apl == "nm_resumo_graf")
    {
           $tipo    = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_tipo'];
           $largura = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_larg'];
           $altura  = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_alt'];
           $margem  = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_margem'];
           $aspecto = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_aspec'];
    }
    else
    {
           $tipo    = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_tipo'];
           $largura = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_larg'];
           $altura  = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_alt'];
           $margem  = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_margem'];
           $aspecto = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_aspec'];
    }
    if (empty($largura))
    {
        $largura = 512;
    }
    if (empty($altura))
    {
        $altura = 384;
    }
    if (empty($margem))
    {
        $margem = 10;
    }

    $tradutor = array();
    if (isset($_SESSION['scriptcase']['sc_idioma_graf']))
    {
        $tradutor = $_SESSION['scriptcase']['sc_idioma_graf'];
    }
    else
    {
        $language = ($language == "pt_br")  ? "port" : $language;
        $language = ($language == "en_us") ? "eng"  : $language;
    }
    $tradutor['port']['titulo']         = "Configuração dos Gráficos";
    $tradutor['port']['tipo_g']         = "Tipo do Gráfico";
    $tradutor['port']['tp_barra']       = "Barra/Vertical";
    $tradutor['port']['tp_bar_horiz']   = "Barra/Horizontal";
    $tradutor['port']['tp_linha']       = "Linha/Vertical";
    $tradutor['port']['tp_lin_horiz']   = "Linha/Horizontal";
    $tradutor['port']['tp_pizza_abs']   = "Pizza/Absoluto";
    $tradutor['port']['tp_pizza_per']   = "Pizza/Porcentagem";
    $tradutor['port']['tp_renda']       = "Renda/Vertical";
    $tradutor['port']['tp_renda_horiz'] = "Renda/Horizontal";
    $tradutor['port']['largura']        = "Largura em Pixels";
    $tradutor['port']['altura']         = "Altura em Pixels";
    $tradutor['port']['margem']         = "Margem em Pixels";
    $tradutor['port']['aspecto']        = "Manter Aspecto";
    $tradutor['port']['sim']            = "Sim";
    $tradutor['port']['nao']            = "Não";
    $tradutor['port']['cancela']        = "Cancela";

    $tradutor['eng']['titulo']         = "Configuration of the Graphs";
    $tradutor['eng']['tipo_g']         = "Type of the Graphs";
    $tradutor['eng']['tp_barra']       = "Bar/Vertical";
    $tradutor['eng']['tp_bar_horiz']   = "Barra/Horizontal";
    $tradutor['eng']['tp_linha']       = "Line/Vertical";
    $tradutor['eng']['tp_lin_horiz']   = "Line/Horizontal";
    $tradutor['eng']['tp_pizza_abs']   = "Pie/Absolute ";
    $tradutor['eng']['tp_pizza_per']   = "Pie/Percentage";
    $tradutor['eng']['tp_renda']       = "Render/Vertical";
    $tradutor['eng']['tp_renda_horiz'] = "Render/Horizontal";
    $tradutor['eng']['largura']        = "Width in Pixels";
    $tradutor['eng']['altura']         = "Height in Pixels";
    $tradutor['eng']['margem']         = "Edge in Pixels";
    $tradutor['eng']['aspecto']        = "To keep Aspect";
    $tradutor['eng']['sim']            = "Yes";
    $tradutor['eng']['nao']            = "No";
    $tradutor['eng']['cancela']        = "Cancel";
?>
<html>
<body>
<form name="config_graf" method="post" action="nm_config_graf.php">
<table width="100%">
 <tr>
   <td colspan=1>
     <table width="100%">
       <tr>
         <td align="middle">
           <?php echo $tradutor[$language]['titulo']; ?>
         </td>
       </tr>
     </table>
   </td>
 </tr>
 <tr>
   <td>
     <?php echo $tradutor[$language]['tipo_g']; ?>
   </td>
   <td>
     <select  name="tipo"  size=1>
       <option value="1"  <?php if ($tipo == "1")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['tp_barra']; ?></option>
       <option value="4"  <?php if ($tipo == "4")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['tp_bar_horiz']; ?></option>
       <option value="2"  <?php if ($tipo == "2")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['tp_linha']; ?></option>
       <option value="5"  <?php if ($tipo == "5")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['tp_lin_horiz']; ?></option>
       <option value="3"  <?php if ($tipo == "3")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['tp_pizza_abs']; ?></option>
       <option value="8"  <?php if ($tipo == "8")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['tp_pizza_per']; ?></option>
       <option value="6"  <?php if ($tipo == "6")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['tp_renda']; ?></option>
       <option value="7"  <?php if ($tipo == "7")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['tp_renda_horiz']; ?></option>
     </select>
   </td>
 </tr>
 <tr>
   <td>
     <?php echo $tradutor[$language]['largura']; ?>
   </td>
   <td>
     <input type="text" name="largura" value="<?php echo $largura; ?>" size=6 maxlength=4>
   </td>
 </tr>
 <tr>
   <td>
     <?php echo $tradutor[$language]['altura']; ?>
   </td>
   <td>
     <input type="text" name="altura" value="<?php echo $altura; ?>" size=6 maxlength=4>
   </td>
 </tr>
 <tr>
   <td>
     <?php echo $tradutor[$language]['margem']; ?>
   </td>
   <td>
     <input type="text" name="margem" value="<?php echo $margem; ?>" size=6 maxlength=3>
   </td>
 </tr>
 <tr>
   <td>
     <?php echo $tradutor[$language]['aspecto']; ?>
   </td>
   <td>
     <select  name="aspecto"  size=1>
       <option value="S" <?php if ($aspecto == "S")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="N" <?php if ($aspecto == "N")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
 </tr>
 <tr>
   <td colspan=1 align="middle">
     <input type=button name="bok" value="OK" onclick="processa()">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input type=button name="cancel" value="<?php echo $tradutor[$language]['cancela']; ?>" onclick="window.close()">
   </td>
 </tr>
</table>
  <input type="hidden" name="nome_apl"  value="<?php echo $nome_apl; ?>">
  <input type="hidden" name="campo_apl"    value="<?php echo $campo_apl; ?>" >
  <input type="hidden" name="sc_page"   value="<?php echo $sc_page; ?>" >
  <input type="hidden" name="bok_graf"  value="" >
</form>
<script language="javascript">
  function processa()
  {
     document.config_graf.bok_graf.value = "OK";
     config_graf.submit();
  }
</script>
</body>
</html>