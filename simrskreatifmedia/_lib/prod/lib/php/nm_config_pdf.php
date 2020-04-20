<?php
/**
 * $Id: nm_config_pdf.php,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
    session_start();

    $opc        = (isset($_GET['nm_opc']))     ? $_GET['nm_opc'] : "";
    $target     = (isset($_GET['nm_target']))  ? $_GET['nm_target'] : "";
    $cor        = (isset($_GET['nm_cor']))     ? $_GET['nm_cor'] : "";
    $papel      = (isset($_GET['papel']))      ? $_GET['papel'] : "";
    $orientacao = (isset($_GET['orientacao'])) ? $_GET['orientacao'] : "";
    $bookmarks  = (isset($_GET['bookmarks']))  ? $_GET['bookmarks'] : "";
    $largura    = (isset($_GET['largura']))    ? $_GET['largura'] : "";
    $conf_larg  = (isset($_GET['conf_larg']))  ? $_GET['conf_larg'] : "N";
    $fonte      = (isset($_GET['conf_fonte'])) ? $_GET['conf_fonte'] : "0";
    $grafico    = (isset($_GET['grafico']))    ? $_GET['grafico'] : "";
    $language   = (isset($_GET['language']))   ? $_GET['language'] : "port";

    $tradutor = array();
    if (isset($_SESSION['scriptcase']['sc_idioma_pdf']))
    {
        $tradutor = $_SESSION['scriptcase']['sc_idioma_pdf'];
    }
    else
    {
        $language = ($language == "pt_br")  ? "port" : $language;
        $language = ($language == "en_us") ? "eng"  : $language;
    }

    $tradutor['port']['titulo']  = "Configuração do PDF";
    $tradutor['port']['tp_pap']  = "Tipo do papel";
    $tradutor['port']['carta']   = "Carta";
    $tradutor['port']['oficio']  = "Oficio";
    $tradutor['port']['orient']  = "Orientação";
    $tradutor['port']['retrato'] = "Retrato";
    $tradutor['port']['paisag']  = "Paisagem";
    $tradutor['port']['book']    = "Gerar Book Marks";
    $tradutor['port']['grafico'] = "Exibir Gráficos";
    $tradutor['port']['largura'] = "Resolução da página em Pixels";
    $tradutor['port']['fonte']   = "Resolução da fonte";
    $tradutor['port']['sim']     = "Sim";
    $tradutor['port']['nao']     = "Não";
    $tradutor['port']['cancela'] = "Cancela";

    $tradutor['eng']['titulo']   = "Configuration of the PDF";
    $tradutor['eng']['tp_pap']   = "Type of the paper";
    $tradutor['eng']['carta']    = "Letter";
    $tradutor['eng']['oficio']   = "Legal";
    $tradutor['eng']['orient']   = "Orientation";
    $tradutor['eng']['retrato']  = "Portrait";
    $tradutor['eng']['paisag']   = "Landscape";
    $tradutor['eng']['book']     = "To generate Book Marks";
    $tradutor['eng']['grafico']  = "To show Graphs";
    $tradutor['eng']['largura']  = "Resolution of the page in Pixels";
    $tradutor['eng']['fonte']    = "Font Size";
    $tradutor['eng']['sim']      = "Yes";
    $tradutor['eng']['nao']      = "No";
    $tradutor['eng']['cancela']  = "Cancel";
?>
<html>
<body>
<form name="config_pdf" method="post">
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
     <?php echo $tradutor[$language]['tp_pap']; ?>
   </td>
   <td>
     <select  name="papel"  size=1>
       <option value="letter"      <?php if ($papel == "1")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['carta']; ?></option>
       <option value="legal"       <?php if ($papel == "2")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['oficio']; ?></option>
       <option value="17x11in"     <?php if ($papel == "3")  { echo " selected" ;} ?>>Ledger</option>
       <option value="33x46.5in"   <?php if ($papel == "4")  { echo " selected" ;} ?>>A0</option>
       <option value="23.5x33in"   <?php if ($papel == "5")  { echo " selected" ;} ?>>A1</option>
       <option value="16.5x23.5in" <?php if ($papel == "6")  { echo " selected" ;} ?>>A2</option>
       <option value="a3"          <?php if ($papel == "7")  { echo " selected" ;} ?>>A3</option>
       <option value="a4"          <?php if ($papel == "8")  { echo " selected" ;} ?>>A4</option>
       <option value="5.8x8.2in"   <?php if ($papel == "9")  { echo " selected" ;} ?>>A5</option>
       <option value="4.1x5.8in"   <?php if ($papel == "10") { echo " selected" ;} ?>>A6</option>
       <option value="7x9.8in"     <?php if ($papel == "11") { echo " selected" ;} ?>>B5</option>
       <option value="11x17in"     <?php if ($papel == "12") { echo " selected" ;} ?>>11'x17</option>
       <option value="tabloid"     <?php if ($papel == "13") { echo " selected" ;} ?>>Tabloide</option>
       <option value="universal"   <?php if ($papel == "14") { echo " selected" ;} ?>>Universal</option>
     </select>
   </td>
 </tr>
 <tr>
   <td>
     <?php echo $tradutor[$language]['orient']; ?>
   </td>
   <td>
     <select  name="orientacao"  size=1>
       <option value="portrait" <?php if ($orientacao == "1")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['retrato']; ?></option>
       <option value="landscape"<?php if ($orientacao == "2")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['paisag']; ?></option>
     </select>
   </td>
 </tr>
<?php
 if ($bookmarks != "XX")
 {
?>
 <tr>
   <td>
     <?php echo $tradutor[$language]['book']; ?>
   </td>
   <td>
     <select  name="bookmarks"  size=1>
       <option value="1"<?php if ($bookmarks == "1")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="2"<?php if ($bookmarks == "2")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
 </tr>
<?php
 }
 if ($grafico != "XX")
 {
?>
 <tr>
   <td>
     <?php echo $tradutor[$language]['grafico']; ?>
   </td>
   <td>
     <select  name="grafico"  size=1>
       <option value="S"<?php if ($grafico == "S")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="N"<?php if ($grafico == "N")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
 </tr>
<?php
 }
if ($conf_larg == "S")
{
?>
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
     <?php echo $tradutor[$language]['fonte']; ?>
   </td>
   <td>
     <input type="text" name="fonte" value="<?php echo $fonte; ?>" size=3 maxlength=2>
   </td>
 </tr>
<?php
 }
?>
 <tr>
   <td colspan=1 align="middle">
     <input type=button name="config" value="OK" onclick="processa()">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input type=button name="cancel" value="<?php echo $tradutor[$language]['cancela']; ?>" onclick="window.close()">
   </td>
 </tr>
</table>
<?php
if ($conf_larg != "S")
{
?>
    <input type="hidden" name="largura" value="<?php echo $largura; ?>">
    <input type="hidden" name="fonte" value="<?php echo $fonte; ?>">
<?php
}
?>
</form>
<script language="javascript">
  function processa()
  {
     window.close();
     ind   = document.config_pdf.papel.selectedIndex;
     papel = document.config_pdf.papel.options[ind].value;
     ind   = document.config_pdf.orientacao.selectedIndex;
     orientacao = document.config_pdf.orientacao.options[ind].value;
     bookmarks = "2";
     grafico   = "N";
<?php
 if ($bookmarks != "XX")
 {
?>
     ind   = document.config_pdf.bookmarks.selectedIndex;
     bookmarks = document.config_pdf.bookmarks.options[ind].value;
<?php
 }
 if ($grafico != "XX")
 {
?>
     ind   = document.config_pdf.grafico.selectedIndex;
     grafico = document.config_pdf.grafico.options[ind].value;
<?php
 }
?>
     largura = document.config_pdf.largura.value;
     fonte   = document.config_pdf.fonte.value;
     parms_pdf  = ' -t pdf14 --book --tocomitted --no-title --quiet --header ... --footer ../';
     parms_pdf += ' --' + orientacao;
     parms_pdf += ' --size ' + papel;
     if (largura > 0)
     {
         parms_pdf += ' --browserwidth ' + largura;
     }
     if (fonte > 0)
     {
         parms_pdf += ' --fontsize ' + fonte;
     }
     if (bookmarks == 2)
     {
         parms_pdf += ' --no-outline';
     }
     opener.nm_gp_move('<?php echo $opc; ?>', '<?php echo $target; ?>', '<?php echo $cor; ?>', parms_pdf, grafico);return false;
  }
</script>
</body>
</html>