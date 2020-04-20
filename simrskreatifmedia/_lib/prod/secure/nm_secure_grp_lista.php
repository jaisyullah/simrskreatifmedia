<?php
/**
 * $Id: nm_secure_grp_lista.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
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
  document.nm_form.action = 'nm_secure_grp_cria.php';
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
    <TD COLSPAN="6"><FONT FACE="Verdana, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_titulo; ?>"><B>Grupos</B></FONT></TD>
  </TR>
  <TR ALIGN="center" BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Grupo</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Descricao</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Bloqueado</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Criação</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Operações</B></FONT></TD>
  </TR>
<?php
$select  =  "SELECT Grupo, Descricao, Bloqueado, Data_Inc, Hora_Inc";
$select .= " FROM $nm_secure_tbgrp";
$select .= " ORDER BY Grupo";
$rs      = &$db->executeQuery($select);
if (!$rs)
{
    nm_trata_erro("Erro ao recuperar os dados do servidor.", __FILE__, __LINE__);
}
$cor_linha = $html_cor_fundo_linimp;
while ($rs->next())
{
    $grp_cod  = $rs->getCurrentValueByName('Grupo');
    $grp_desc = $rs->getCurrentValueByName('Descricao');
    $grp_bloq = $rs->getCurrentValueByName('Bloqueado');
    $grp_data = $rs->getCurrentValueByName('Data_Inc');
    $grp_hora = $rs->getCurrentValueByName('Hora_Inc');
?>
  <TR ALIGN="center" VALIGN="middle" BGCOLOR="<?php echo $cor_linha; ?>">
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $grp_cod; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $grp_desc; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $grp_bloq; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo nm_formata_hora($grp_hora) . " " . nm_formata_data($grp_data); ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">
      <A HREF="nm_secure_grp_edita.php?grupo=<?php echo $grp_cod; ?>">Editar</A>
      <BR>
      <A HREF="nm_secure_grp_exclui.php?grupo=<?php echo $grp_cod; ?>">Excluir</A>
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