<?php
/**
 * $Id: nm_secure_usu_lista.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */

include_once ("nm_secure_base.php");

// Definicao do botao para atualizacao
$nm_naveg  = "<DIV ALIGN=\"center\">\n";
$nm_naveg .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Criar\" CLASS=\"txt_valor\" onClick=\"nm_criar()\">&nbsp;";
$nm_naveg .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Fechar\" CLASS=\"txt_valor\" onClick=\"nm_fechar()\">&nbsp;";
$nm_naveg .= "</DIV>\n";

?>
<HTML>
<HEAD>
<TITLE>NetMake :: Script Case</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<STYLE TYPE="text/css">
<!--
.txt_valor { font-family: Tahoma, Arial, sans-serif; font-size: 12px; color: #000000}
-->
</STYLE>
<SCRIPT LANGUAGE="Javascript">
<!--
function nm_criar()
{
  document.nm_form.action = 'nm_secure_usu_cria.php';
  document.nm_form.target = 'nm_secure_bot';
  document.nm_form.submit();
}
function nm_fechar()
{
  document.nm_form.action = 'nm_secure.php';
  document.nm_form.target = '_top';
  document.nm_form.submit();
}
-->
</SCRIPT>
</HEAD>
<BODY BGCOLOR="<?php echo $html_cor_fundo_pagina; ?>" MARGINWIDTH="5" LEFTMARGIN="5" MARGINHEIGHT="5" TOPMARGIN="5">
<FORM NAME="nm_form" ACTION="nm_secure_grp_lista.php" METHOD="POST">
</FORM>
<?php echo $nm_naveg; ?>
<BR>
<TABLE WIDTH="100%" BORDER="0" CELLSPACING="1" CELLPADDING="2" BGCOLOR="<?php echo $html_cor_fundo_borda; ?>">
  <TR ALIGN="center" BGCOLOR="<?php echo $html_cor_fundo_titulo; ?>">
    <TD COLSPAN="9"><FONT FACE="Verdana, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_titulo; ?>"><B>Usuários</B></FONT></TD>
  </TR>
  <TR ALIGN="center" BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Login</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Nome</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>E-Mail</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Admin</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Bloqueado</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Grupos</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Nível</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Inclusão</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Operações</B></FONT></TD>
  </TR>
<?php
$select  =  "SELECT Login, Nome, Email, Priv_Admin, Bloqueado, Grupos, Nivel, Data_Inc, Hora_Inc";
$select .= " FROM $nm_secure_tbusu";
$select .= " ORDER BY Login";
$rs      = &$db->executeQuery($select);
if (!$rs)
{
    nm_trata_erro("Erro ao recuperar os dados do servidor.", __FILE__, __LINE__);
}
$cor_linha = $html_cor_fundo_linimp;
while ($rs->next())
{
    $usu_log   = $rs->getCurrentValueByName('Login');
    $usu_nome  = $rs->getCurrentValueByName('Nome');
    $usu_mail  = $rs->getCurrentValueByName('Email');
    $usu_priv  = $rs->getCurrentValueByName('Priv_Admin');
    $usu_bloq  = $rs->getCurrentValueByName('Bloqueado');
    $usu_grps  = $rs->getCurrentValueByName('Grupos');
    $usu_niv   = $rs->getCurrentValueByName('Nivel');
    $usu_dinc  = $rs->getCurrentValueByName('Data_Inc');
    $usu_hinc  = $rs->getCurrentValueByName('Hora_Inc');
    $usu_lista = str_replace($secure_delim, "<BR>", $usu_grps);
?>
  <TR ALIGN="center" VALIGN="middle" BGCOLOR="<?php echo $cor_linha; ?>">
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $usu_log; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $usu_nome; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><A HREF="mailto:<?php echo $usu_mail; ?>"><?php echo $usu_mail; ?></A></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $usu_priv; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $usu_bloq; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $usu_lista; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $usu_niv; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo nm_formata_hora($usu_hinc) . " " . nm_formata_data($usu_dinc); ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">
      <A HREF="nm_secure_usu_edita.php?login=<?php echo $usu_log; ?>">Editar</A>
      <BR>
      <A HREF="nm_secure_usu_exclui.php?login=<?php echo $usu_log; ?>">Excluir</A>
    </FONT></TD>
  </TR>
<?php
    $cor_linha = ($cor_linha == $html_cor_fundo_linimp) ? $html_cor_fundo_linpar : $html_cor_fundo_linimp;
}
?>
</TABLE>
<BR>
<?php echo $nm_naveg; ?>
</BODY>
</HTML>