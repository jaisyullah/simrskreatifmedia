<?php
/**
 * $Id: nm_secure_top.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */

include_once("nm_secure_base.php");

?>
<HTML>
<HEAD>
<TITLE>NetMake :: Script Case</TITLE>
<STYLE TYPE="text/css">
<!--
.txt_menor { font-family: Tahoma, Arial, sans-serif; font-size: 10px; color: #000000}
-->
</STYLE>
<SCRIPT LANGUAGE="Javascript">
function nm_menu_nav(nomeOpc)
{
  if (nomeOpc == 'grupo')
  {
    document.nm_form_top.action = 'nm_secure_grp_lista.php';
    document.nm_form_top.submit();
  }
  if (nomeOpc == 'usuario')
  {
    document.nm_form_top.action = 'nm_secure_usu_lista.php';
    document.nm_form_top.submit();
  }
  if (nomeOpc == 'aplicacao')
  {
    document.nm_form_top.action = 'nm_secure_apl_lista.php';
    document.nm_form_top.submit();
  }
}
</SCRIPT>
</HEAD>
<BODY LEFTMARGIN="0" MARGINWIDTH="0" TOPMARGIN="0" MARGINHEIGHT="0" BGCOLOR="<?php echo $html_cor_fundo_barra; ?>">
<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="3" HEIGHT="100%" WIDTH="100%">
<TR BGCOLOR="<?php echo $html_cor_fundo_barra; ?>" VALIGN="middle">
  <FORM NAME="nm_form_top" ACTION="nm_secure_bot.php" METHOD="POST" TARGET="nm_secure_bot">
  </FORM>
  <TD WIDTH="40" ALIGN="center"><IMG SRC="nm_secure_img_nmlogo.gif" BORDER="0" WIDTH="30" HEIGHT="30" ALIGN="absmiddle"></TD>
  <TD ALIGN="left" WIDTH="170">
    <FONT FACE="Verdana, Arial, sans-serif" SIZE="5" COLOR="<?php echo $html_cor_texto_barra; ?>"><B><I> Script Case</I></B> &nbsp;</FONT>
  </TD>
  <TD ALIGN="right" NOWRAP>
    <FONT FACE="Verdana, Arial, sans-serif" SIZE="1" COLOR="<?php echo $html_cor_texto_barra; ?>"><B>
    <A HREF="javascript:nm_menu_nav('grupo')" STYLE="color: <?php echo $html_cor_link_barra; ?>">Grupos</A>
    |
    <A HREF="javascript:nm_menu_nav('usuario')" STYLE="color: <?php echo $html_cor_link_barra; ?>">Usuários</A>
    |
    <A HREF="javascript:nm_menu_nav('aplicacao')" STYLE="color: <?php echo $html_cor_link_barra; ?>">Aplicações</A>
    </B></FONT>
  </TD>
  <FORM NAME="nm_form_logout" ACTION="nm_secure.php" TARGET="_top" METHOD="POST">
  <TD WIDTH="75" ALIGN="center">
    <INPUT TYPE="submit" NAME="nm_logout" VALUE="Logout" CLASS="txt_valor">
  </TD>
  </FORM>
</TR>
</TABLE>
</BODY>
</HTML>