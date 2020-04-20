<?php
/**
 * $Id: nm_cor.php,v 1.2 2011-06-22 20:38:54 vinicius Exp $
 */

@session_start() ;

$Nm_cab     = (isset($_SESSION['scriptcase']['sc_tab_cores']['paleta']))  ? $_SESSION['scriptcase']['sc_tab_cores']['paleta']  : "ScriptCase - Paleta de Cores";
$Nm_seta    = (isset($_SESSION['scriptcase']['sc_tab_cores']['setacor'])) ? $_SESSION['scriptcase']['sc_tab_cores']['setacor'] : "Seta Cor";
$Nm_atualiz = (isset($_SESSION['scriptcase']['sc_tab_cores']['atualiz'])) ? $_SESSION['scriptcase']['sc_tab_cores']['atualiz'] : "Atualizar";
$Nm_cancel  = (isset($_SESSION['scriptcase']['sc_tab_cores']['cancela'])) ? $_SESSION['scriptcase']['sc_tab_cores']['cancela'] : "Cancelar";

define('NM_SCASE_LEVEL',   2);
define('NM_SCASE_STATUS',  'LOADED');
define('NM_SCASE_VERSION', 'OLD');
$str_page = '';

$cor_inicial = (isset($_GET["cor"])) ? $_GET["cor"] : "#FFFFFF";
if ("" != $cor_inicial)
{
    if ("#" != substr($cor_inicial, 0, 1))
    {
        $cor_inicial = "#" . $cor_inicial;
    }
    if (!preg_match("/#([0-9A-F]{2}){3}/i", $cor_inicial))
    {
        $cor_inicial = "#FFFFFF";
    }
    $cor_inicial = substr($cor_inicial, 1, 6);
}
$cor_form    = $_GET["form"];
$cor_field   = $_GET["field"];
$cor_cback   = (isset($_GET["cback"]))   ? $_GET['cback'] : '';
$cor_index   = (isset($_GET["index"]))   ? "Y"   : "N";
$cor_upd     = (isset($_GET["simples"])) ? FALSE : TRUE;
$cor_refresh = (isset($_GET["refresh"]) && 'Y' == strtoupper($_GET['refresh'])) ? "Y" : "N";
?>
<HTML>

<HEAD>
  <TITLE>ScriptCase - Paleta de Cores</TITLE>
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
  <SCRIPT LANGUAGE="Javascript">
  <!--
  function nm_atualiza()
  {
    objParent = self.parent && self.parent.$ ? self.parent : opener;
    if ("" == document.f.C.value)
    {
     jv = "";
    }
    else
    {
     jv = "#";
    }
    objParent.document.<?php echo $cor_form; ?>.elements["<?php echo $cor_field; ?>"].value = jv + document.f.C.value;
<?php
if ('' != $cor_cback)
{
?>
    if ("#<?php echo $cor_inicial; ?>" != jv + document.f.C.value)
    {
     objParent.<?php echo $cor_cback; ?>();
    }
<?php
}
?>
    nm_fecha_janela();
  }
  function nm_fecha_janela()
  {
    if (self.parent && self.parent.$)
    {
      self.parent.tb_remove();
    }
    else
    {
      window.close();
    }
  }
  -->
  </SCRIPT>


 <SCRIPT LANGUAGE="JavaScript" SRC="nm_cor.js"></SCRIPT>
</HEAD>
<BODY BGCOLOR="#<?php echo $cor_inicial; ?>" LEFTMARGIN="0" MARGINWIDTH="0" TOPMARGIN="0" MARGINHEIGHT="0">
<font color="#99FF33"></font>
<FORM NAME="f">
  <TABLE border="0" WIDTH="270" height="371">
    <TR>
      <TD ALIGN="center" VALIGN="bottom" WIDTH="100%" HEIGHT="35">
        <TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0" HEIGHT="30">
          <TR>
            <TD ALIGN="CENTER" VALIGN="MIDDLE" BGCOLOR="#000000" WIDTH="360" HEIGHT="30"><FONT FACE="Verdana, Arial, sans-serif" SIZE="4" COLOR="#FFFFFF"><B><?php echo $Nm_cab; ?></B></FONT></TD>
          </TR>
        </TABLE>
      </TD>
    </TR>
    <TR>
      <TD ALIGN="center" VALIGN="bottom" WIDTH="391" HEIGHT="95">
        <table width="100%">
          <tr>
            <td width="185">
              <table width="100%" height="107">
                <tr>
                  <td align="center" valign="middle">
                    <input type="text" name="C" size="10" value="<?php echo $cor_inicial; ?>">
                    <br>
                    <input type="button" name="bazul" value="<?php echo $Nm_seta; ?>" onClick="nm_sc(document.f.C.value.toUpperCase())" class="nmButton">
                  </td>
                </tr>
              </table>
            </td>
            <td width="186">
              <table width="100%">
                <tr>
                  <td height="30" width="35" align="center">
                    <input type="button" name="b1" value="&lt;&lt;" onClick="nm_mc('xx-')">
                  </td>
                  <td height="30" width="54" align="center">
                    <input type="text" name="xx_v" size="3" maxlength="3" value="255">
                  </td>
                  <td height="30" width="38" align="center">
                    <input type="button" name="b2" value="&gt;&gt;" onClick="nm_mc('xx+')">
                  </td>
                  <td height="30" width="40" align="center" bgcolor="#FF0000">&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" width="35" align="center">
                    <input type="button" name="b3" value="&lt;&lt;" onClick="nm_mc('yy-')">
                  </td>
                  <td height="30" width="54" align="center">
                    <input type="text" name="yy_v" size="3" maxlength="3" value="255">
                  </td>
                  <td height="30" width="38" align="center">
                    <input type="button" name="b4" value="&gt;&gt;" onClick="nm_mc('yy+')">
                  </td>
                  <td height="30" width="40" align="center" bgcolor="#00FF00">&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" width="35" align="center">
                    <input type="button" name="b5" value="&lt;&lt;" onClick="nm_mc('zz-')">
                  </td>
                  <td height="30" width="54" align="center">
                    <input type="text" name="zz_v" size="3" maxlength="3" value="255">
                  </td>
                  <td height="30" width="38" align="center">
                    <input type="button" name="b6" value="&gt;&gt;" onClick="nm_mc('zz+')">
                  </td>
                  <td height="30" width="40" align="center" bgcolor="#0000FF">&nbsp;</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </TD>
    </TR>
    <TR>
      <TD ALIGN="center" VALIGN="middle" WIDTH="391" HEIGHT="20">
        <table width="260" border="1" cellspacing="0" cellpadding="0" height="150" bordercolor="#000000" bgcolor="#000000">
          <tr align="left" valign="top">
            <td width="13" height="13" bgcolor="#000000"><a href="javascript:void(0)"onClick="nm_sc('000000')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#000000"><a href="javascript:void(0)"onClick="nm_sc('000000')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#003300"><a href="javascript:void(0)"onClick="nm_sc('003300')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#006600"><a href="javascript:void(0)"onClick="nm_sc('006600')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#009900"><a href="javascript:void(0)"onClick="nm_sc('009900')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#00CC00"><a href="javascript:void(0)"onClick="nm_sc('00CC00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#00FF00"><a href="javascript:void(0)"onClick="nm_sc('00FF00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#330000"><a href="javascript:void(0)"onClick="nm_sc('330000')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#333300"><a href="javascript:void(0)"onClick="nm_sc('333300')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#336600"><a href="javascript:void(0)"onClick="nm_sc('336600')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#339900"><a href="javascript:void(0)"onClick="nm_sc('339900')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#33CC00"><a href="javascript:void(0)"onClick="nm_sc('33CC00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#33FF00"><a href="javascript:void(0)"onClick="nm_sc('33FF00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#660000"><a href="javascript:void(0)"onClick="nm_sc('660000')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#663300"><a href="javascript:void(0)"onClick="nm_sc('663300')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#666600"><a href="javascript:void(0)"onClick="nm_sc('666600')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#669900"><a href="javascript:void(0)"onClick="nm_sc('669900')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#66CC00"><a href="javascript:void(0)"onClick="nm_sc('66CC00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#66FF00"><a href="javascript:void(0)"onClick="nm_sc('66FF00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
          </tr>
          <tr align="left" valign="top">
            <td width="13" height="13" bgcolor="#333333"><a href="javascript:void(0)"onClick="nm_sc('333333')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#000033"><a href="javascript:void(0)"onClick="nm_sc('000033')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#003333"><a href="javascript:void(0)"onClick="nm_sc('003333')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#006633"><a href="javascript:void(0)"onClick="nm_sc('006633')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#009933"><a href="javascript:void(0)"onClick="nm_sc('009933')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#00CC33"><a href="javascript:void(0)"onClick="nm_sc('00CC33')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#00FF33"><a href="javascript:void(0)"onClick="nm_sc('00FF33')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#330033"><a href="javascript:void(0)"onClick="nm_sc('330033')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#333333"><a href="javascript:void(0)"onClick="nm_sc('333333')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#336633"><a href="javascript:void(0)"onClick="nm_sc('336633')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#339933"><a href="javascript:void(0)"onClick="nm_sc('339933')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#33CC33"><a href="javascript:void(0)"onClick="nm_sc('33CC33')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#33FF33"><a href="javascript:void(0)"onClick="nm_sc('33FF33')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#660033"><a href="javascript:void(0)"onClick="nm_sc('660033')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#663333"><a href="javascript:void(0)"onClick="nm_sc('663333')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#666633"><a href="javascript:void(0)"onClick="nm_sc('666633')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#669933"><a href="javascript:void(0)"onClick="nm_sc('669933')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#66CC33"><a href="javascript:void(0)"onClick="nm_sc('66CC33')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#66FF33"><a href="javascript:void(0)"onClick="nm_sc('66FF33')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
          </tr>
          <tr align="left" valign="top">
            <td width="13" height="13" bgcolor="#666666"><a href="javascript:void(0)"onClick="nm_sc('666666')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#000066"><a href="javascript:void(0)"onClick="nm_sc('000066')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#003366"><a href="javascript:void(0)"onClick="nm_sc('003366')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#006666"><a href="javascript:void(0)"onClick="nm_sc('006666')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#009966"><a href="javascript:void(0)"onClick="nm_sc('009966')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#00CC66"><a href="javascript:void(0)"onClick="nm_sc('00CC66')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#00FF66"><a href="javascript:void(0)"onClick="nm_sc('00FF66')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#330066"><a href="javascript:void(0)"onClick="nm_sc('330066')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#333366"><a href="javascript:void(0)"onClick="nm_sc('333366')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#336666"><a href="javascript:void(0)"onClick="nm_sc('336666')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#339966"><a href="javascript:void(0)"onClick="nm_sc('339966')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#33CC66"><a href="javascript:void(0)"onClick="nm_sc('33CC66')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#33FF66"><a href="javascript:void(0)"onClick="nm_sc('33FF66')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#660066"><a href="javascript:void(0)"onClick="nm_sc('660066')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#663366"><a href="javascript:void(0)"onClick="nm_sc('663366')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#666666"><a href="javascript:void(0)"onClick="nm_sc('666666')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#669966"><a href="javascript:void(0)"onClick="nm_sc('669966')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#66CC66"><a href="javascript:void(0)"onClick="nm_sc('66CC66')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#66FF66"><a href="javascript:void(0)"onClick="nm_sc('66FF66')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
          </tr>
          <tr align="left" valign="top">
            <td width="13" height="13" bgcolor="#999999"><a href="javascript:void(0)"onClick="nm_sc('999999')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#000099"><a href="javascript:void(0)"onClick="nm_sc('000099')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#003399"><a href="javascript:void(0)"onClick="nm_sc('003399')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#006699"><a href="javascript:void(0)"onClick="nm_sc('006699')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#009999"><a href="javascript:void(0)"onClick="nm_sc('009999')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#00CC99"><a href="javascript:void(0)"onClick="nm_sc('00CC99')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#00FF99"><a href="javascript:void(0)"onClick="nm_sc('00FF99')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#330099"><a href="javascript:void(0)"onClick="nm_sc('330099')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#333399"><a href="javascript:void(0)"onClick="nm_sc('333399')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#336699"><a href="javascript:void(0)"onClick="nm_sc('336699')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#339999"><a href="javascript:void(0)"onClick="nm_sc('339999')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#33CC99"><a href="javascript:void(0)"onClick="nm_sc('33CC99')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#33FF99"><a href="javascript:void(0)"onClick="nm_sc('33FF99')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#660099"><a href="javascript:void(0)"onClick="nm_sc('660099')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#663399"><a href="javascript:void(0)"onClick="nm_sc('663399')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#666699"><a href="javascript:void(0)"onClick="nm_sc('666699')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#669999"><a href="javascript:void(0)"onClick="nm_sc('669999')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#66CC99"><a href="javascript:void(0)"onClick="nm_sc('66CC99')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#66FF99"><a href="javascript:void(0)"onClick="nm_sc('66FF99')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
          </tr>
          <tr align="left" valign="top">
            <td width="13" height="13" bgcolor="#CCCCCC"><a href="javascript:void(0)"onClick="nm_sc('CCCCCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#0000CC"><a href="javascript:void(0)"onClick="nm_sc('0000CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#0033CC"><a href="javascript:void(0)"onClick="nm_sc('0033CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#0066CC"><a href="javascript:void(0)"onClick="nm_sc('0066CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#0099CC"><a href="javascript:void(0)"onClick="nm_sc('0099CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#00CCCC"><a href="javascript:void(0)"onClick="nm_sc('00CCCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#00FFCC"><a href="javascript:void(0)"onClick="nm_sc('00FFCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#3300CC"><a href="javascript:void(0)"onClick="nm_sc('3300CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#3333CC"><a href="javascript:void(0)"onClick="nm_sc('3333CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#3366CC"><a href="javascript:void(0)"onClick="nm_sc('3366CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#3399CC"><a href="javascript:void(0)"onClick="nm_sc('3399CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#33CCCC"><a href="javascript:void(0)"onClick="nm_sc('33CCCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#33FFCC"><a href="javascript:void(0)"onClick="nm_sc('33FFCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#6600CC"><a href="javascript:void(0)"onClick="nm_sc('6600CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#6633CC"><a href="javascript:void(0)"onClick="nm_sc('6633CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#6666CC"><a href="javascript:void(0)"onClick="nm_sc('6666CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#6699CC"><a href="javascript:void(0)"onClick="nm_sc('6699CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#66CCCC"><a href="javascript:void(0)"onClick="nm_sc('66CCCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#66FFCC"><a href="javascript:void(0)"onClick="nm_sc('66FFCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
          </tr>
          <tr align="left" valign="top">
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#0000FF"><a href="javascript:void(0)"onClick="nm_sc('0000FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#0033FF"><a href="javascript:void(0)"onClick="nm_sc('0033FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#0066FF"><a href="javascript:void(0)"onClick="nm_sc('0066FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#0099FF"><a href="javascript:void(0)"onClick="nm_sc('0099FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#00CCFF"><a href="javascript:void(0)"onClick="nm_sc('00CCFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#00FFFF"><a href="javascript:void(0)"onClick="nm_sc('00FFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#3300FF"><a href="javascript:void(0)"onClick="nm_sc('3300FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#3333FF"><a href="javascript:void(0)"onClick="nm_sc('3333FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#3366FF"><a href="javascript:void(0)"onClick="nm_sc('3366FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#3399FF"><a href="javascript:void(0)"onClick="nm_sc('3399FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#33CCFF"><a href="javascript:void(0)"onClick="nm_sc('33CCFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#33FFFF"><a href="javascript:void(0)"onClick="nm_sc('33FFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#6600FF"><a href="javascript:void(0)"onClick="nm_sc('6600FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#6633FF"><a href="javascript:void(0)"onClick="nm_sc('6633FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#6666FF"><a href="javascript:void(0)"onClick="nm_sc('6666FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#6699FF"><a href="javascript:void(0)"onClick="nm_sc('6699FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#66CCFF"><a href="javascript:void(0)"onClick="nm_sc('66CCFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#66FFFF"><a href="javascript:void(0)"onClick="nm_sc('66FFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
          </tr>
          <tr align="left" valign="top">
            <td width="13" height="13" bgcolor="#FF0000"><a href="javascript:void(0)"onClick="nm_sc('FF0000')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#990000"><a href="javascript:void(0)"onClick="nm_sc('990000')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#993300"><a href="javascript:void(0)"onClick="nm_sc('993300')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#996600"><a href="javascript:void(0)"onClick="nm_sc('996600')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#999900"><a href="javascript:void(0)"onClick="nm_sc('999900')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#99CC00"><a href="javascript:void(0)"onClick="nm_sc('99CC00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#99FF00"><a href="javascript:void(0)"onClick="nm_sc('99FF00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC0000"><a href="javascript:void(0)"onClick="nm_sc('CC0000')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC3300"><a href="javascript:void(0)"onClick="nm_sc('CC3300')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC6600"><a href="javascript:void(0)"onClick="nm_sc('CC6600')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC9900"><a href="javascript:void(0)"onClick="nm_sc('CC9900')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CCCC00"><a href="javascript:void(0)"onClick="nm_sc('CCCC00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CCFF00"><a href="javascript:void(0)"onClick="nm_sc('CCFF00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF0000"><a href="javascript:void(0)"onClick="nm_sc('FF0000')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF3300"><a href="javascript:void(0)"onClick="nm_sc('FF3300')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF6600"><a href="javascript:void(0)"onClick="nm_sc('FF6600')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF9900"><a href="javascript:void(0)"onClick="nm_sc('FF9900')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFCC00"><a href="javascript:void(0)"onClick="nm_sc('FFCC00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFF00"><a href="javascript:void(0)"onClick="nm_sc('FFFF00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
          </tr>
          <tr align="left" valign="top">
            <td width="13" height="13" bgcolor="#00FF00"><a href="javascript:void(0)"onClick="nm_sc('00FF00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#990033"><a href="javascript:void(0)"onClick="nm_sc('990033')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#993333"><a href="javascript:void(0)"onClick="nm_sc('993333')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#996633"><a href="javascript:void(0)"onClick="nm_sc('996633')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#999933"><a href="javascript:void(0)"onClick="nm_sc('999933')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#99CC33"><a href="javascript:void(0)"onClick="nm_sc('99CC33')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#99FF33"><a href="javascript:void(0)"onClick="nm_sc('99FF33')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC0033"><a href="javascript:void(0)"onClick="nm_sc('CC0033')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC3333"><a href="javascript:void(0)"onClick="nm_sc('CC3333')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC6633"><a href="javascript:void(0)"onClick="nm_sc('CC6633')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC9933"><a href="javascript:void(0)"onClick="nm_sc('CC9933')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CCCC33"><a href="javascript:void(0)"onClick="nm_sc('CCCC33')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CCFF33"><a href="javascript:void(0)"onClick="nm_sc('CCFF33')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF0033"><a href="javascript:void(0)"onClick="nm_sc('FF0033')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF3333"><a href="javascript:void(0)"onClick="nm_sc('FF3333')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF6633"><a href="javascript:void(0)"onClick="nm_sc('FF6633')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF9933"><a href="javascript:void(0)"onClick="nm_sc('FF9933')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFCC33"><a href="javascript:void(0)"onClick="nm_sc('FFCC33')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFF33"><a href="javascript:void(0)"onClick="nm_sc('FFFF33')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
          </tr>
          <tr align="left" valign="top">
            <td width="13" height="13" bgcolor="#0000FF"><a href="javascript:void(0)"onClick="nm_sc('0000FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#990066"><a href="javascript:void(0)"onClick="nm_sc('990066')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#993366"><a href="javascript:void(0)"onClick="nm_sc('993366')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#996666"><a href="javascript:void(0)"onClick="nm_sc('996666')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#999966"><a href="javascript:void(0)"onClick="nm_sc('999966')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#99CC66"><a href="javascript:void(0)"onClick="nm_sc('99CC66')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#99FF66"><a href="javascript:void(0)"onClick="nm_sc('99FF66')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC0066"><a href="javascript:void(0)"onClick="nm_sc('CC0066')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC3366"><a href="javascript:void(0)"onClick="nm_sc('CC3366')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC6666"><a href="javascript:void(0)"onClick="nm_sc('CC6666')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC9966"><a href="javascript:void(0)"onClick="nm_sc('CC9966')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CCCC66"><a href="javascript:void(0)"onClick="nm_sc('CCCC66')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CCFF66"><a href="javascript:void(0)"onClick="nm_sc('CCFF66')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF0066"><a href="javascript:void(0)"onClick="nm_sc('FF0066')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF3366"><a href="javascript:void(0)"onClick="nm_sc('FF3366')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF6666"><a href="javascript:void(0)"onClick="nm_sc('FF6666')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF9966"><a href="javascript:void(0)"onClick="nm_sc('FF9966')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFCC66"><a href="javascript:void(0)"onClick="nm_sc('FFCC66')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFF66"><a href="javascript:void(0)"onClick="nm_sc('FFFF66')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
          </tr>
          <tr align="left" valign="top">
            <td width="13" height="13" bgcolor="#FFFF00"><a href="javascript:void(0)"onClick="nm_sc('FFFF00')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#990099"><a href="javascript:void(0)"onClick="nm_sc('990099')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#993399"><a href="javascript:void(0)"onClick="nm_sc('993399')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#996699"><a href="javascript:void(0)"onClick="nm_sc('996699')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#999999"><a href="javascript:void(0)"onClick="nm_sc('999999')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#99CC99"><a href="javascript:void(0)"onClick="nm_sc('99CC99')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#99FF99"><a href="javascript:void(0)"onClick="nm_sc('99FF99')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC0099"><a href="javascript:void(0)"onClick="nm_sc('CC0099')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC3399"><a href="javascript:void(0)"onClick="nm_sc('CC3399')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC6699"><a href="javascript:void(0)"onClick="nm_sc('CC6699')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC9999"><a href="javascript:void(0)"onClick="nm_sc('CC9999')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CCCC99"><a href="javascript:void(0)"onClick="nm_sc('CCCC99')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CCFF99"><a href="javascript:void(0)"onClick="nm_sc('CCFF99')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF0099"><a href="javascript:void(0)"onClick="nm_sc('FF0099')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF3399"><a href="javascript:void(0)"onClick="nm_sc('FF3399')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF6699"><a href="javascript:void(0)"onClick="nm_sc('FF6699')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF9999"><a href="javascript:void(0)"onClick="nm_sc('FF9999')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFCC99"><a href="javascript:void(0)"onClick="nm_sc('FFCC99')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFF99"><a href="javascript:void(0)"onClick="nm_sc('FFFF99')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
          </tr>
          <tr align="left" valign="top">
            <td width="13" height="13" bgcolor="#00FFFF"><a href="javascript:void(0)"onClick="nm_sc('00FFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#9900CC"><a href="javascript:void(0)"onClick="nm_sc('9900CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#9933CC"><a href="javascript:void(0)"onClick="nm_sc('9933CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#9966CC"><a href="javascript:void(0)"onClick="nm_sc('9966CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#9999CC"><a href="javascript:void(0)"onClick="nm_sc('9999CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#99CCCC"><a href="javascript:void(0)"onClick="nm_sc('99CCCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#99FFCC"><a href="javascript:void(0)"onClick="nm_sc('99FFCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC00CC"><a href="javascript:void(0)"onClick="nm_sc('CC00CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC33CC"><a href="javascript:void(0)"onClick="nm_sc('CC33CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC66CC"><a href="javascript:void(0)"onClick="nm_sc('CC66CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC99CC"><a href="javascript:void(0)"onClick="nm_sc('CC99CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CCCCCC"><a href="javascript:void(0)"onClick="nm_sc('CCCCCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CCFFCC"><a href="javascript:void(0)"onClick="nm_sc('CCFFCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF00CC"><a href="javascript:void(0)"onClick="nm_sc('FF00CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF33CC"><a href="javascript:void(0)"onClick="nm_sc('FF33CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF66CC"><a href="javascript:void(0)"onClick="nm_sc('FF66CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF99CC"><a href="javascript:void(0)"onClick="nm_sc('FF99CC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFCCCC"><a href="javascript:void(0)"onClick="nm_sc('FFCCCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFCC"><a href="javascript:void(0)"onClick="nm_sc('FFFFCC')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
          </tr>
          <tr align="left" valign="top">
            <td width="13" height="13" bgcolor="#FF00FF"><a href="javascript:void(0)"onClick="nm_sc('FF00FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#9900FF"><a href="javascript:void(0)"onClick="nm_sc('9900FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#9933FF"><a href="javascript:void(0)"onClick="nm_sc('9933FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#9966FF"><a href="javascript:void(0)"onClick="nm_sc('9966FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#9999FF"><a href="javascript:void(0)"onClick="nm_sc('9999FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#99CCFF"><a href="javascript:void(0)"onClick="nm_sc('99CCFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#99FFFF"><a href="javascript:void(0)"onClick="nm_sc('99FFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC00FF"><a href="javascript:void(0)"onClick="nm_sc('CC00FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC33FF"><a href="javascript:void(0)"onClick="nm_sc('CC33FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC66FF"><a href="javascript:void(0)"onClick="nm_sc('CC66FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CC99FF"><a href="javascript:void(0)"onClick="nm_sc('CC99FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CCCCFF"><a href="javascript:void(0)"onClick="nm_sc('CCCCFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#CCFFFF"><a href="javascript:void(0)"onClick="nm_sc('CCFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF00FF"><a href="javascript:void(0)"onClick="nm_sc('FF00FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF33FF"><a href="javascript:void(0)"onClick="nm_sc('FF33FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF66FF"><a href="javascript:void(0)"onClick="nm_sc('FF66FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FF99FF"><a href="javascript:void(0)"onClick="nm_sc('FF99FF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFCCFF"><a href="javascript:void(0)"onClick="nm_sc('FFCCFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
            <td width="13" height="13" bgcolor="#FFFFFF"><a href="javascript:void(0)"onClick="nm_sc('FFFFFF')"><img src="transparent.gif" width="13" height="13" border="0"></a></td>
          </tr>
        </table>
      </TD>
    </TR>
    <TR>
      <TD ALIGN="center" VALIGN="middle" WIDTH="391" HEIGHT="20">
        <br>
        <table border="0" cellpadding="3" cellspacing="0" align="center"">
          <tr valign="middle">
            <td>
              <input type="button" value="<?php echo $Nm_atualiz; ?>" onClick="javascript:nm_atualiza()" name="button" class="nmButton">
            </td>
            <td>
              <input type="button" value="<?php echo $Nm_cancel; ?>" onClick="javascript:nm_fecha_janela()" name="button" class="nmButton">
            </td>
          </tr>
        </table>
      </TD>
    </TR>
</TABLE>
  <p>&nbsp;</p>
</FORM>

</BODY>

</HTML>
