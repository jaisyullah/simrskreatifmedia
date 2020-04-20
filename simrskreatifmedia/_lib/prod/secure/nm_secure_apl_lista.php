<?php
/**
 * $Id: nm_secure_apl_lista.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
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
  document.nm_form.action = 'nm_secure_apl_cria.php';
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
    <TD COLSPAN="8"><FONT FACE="Verdana, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_titulo; ?>"><B>Aplicações</B></FONT></TD>
  </TR>
  <TR ALIGN="center" BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Aplicação (Grupo)</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Acesso</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Nível</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Bloqueada</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Segurança</B></FONT></TD>
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Operações</B></FONT></TD>
  </TR>
<?php
$select  =  "SELECT Aplicacao, Grupo, Grupos, Nivel, Bloqueada, Autentica_Tipo";
$select .= " FROM $nm_secure_tbapl";
$select .= " ORDER BY Grupo, Aplicacao";
$rs      = &$db->executeQuery($select);
if (!$rs)
{
    nm_trata_erro("Erro ao recuperar os dados do servidor.", __FILE__, __LINE__);
}
$cor_linha = $html_cor_fundo_linimp;
while ($rs->next())
{
    $apl_cod   = $rs->getCurrentValueByName('Aplicacao');
    $apl_grp   = $rs->getCurrentValueByName('Grupo');
    $apl_grps  = $rs->getCurrentValueByName('Grupos');
    $apl_niv   = $rs->getCurrentValueByName('Nivel');
    $apl_bloq  = $rs->getCurrentValueByName('Bloqueada');
    $apl_tipo  = $rs->getCurrentValueByName('Autentica_Tipo');
    $apl_lista = str_replace($secure_delim, "<BR>", $apl_grps);
    switch ($apl_tipo)
    {
        case "3":
            $apl_tipo_txt = "Por Nível";
        break;
        case "2":
            $apl_tipo_txt = "Por Grupo";
        break;
        case "1":
            $apl_tipo_txt = "Por Usuário";
        break;
        default:
        case "0":
            $apl_tipo_txt = "Nenhuma";
        break;
    }
?>
  <TR ALIGN="center" VALIGN="middle" BGCOLOR="<?php echo $cor_linha; ?>">
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo "$apl_cod ($apl_grp)"; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $apl_lista; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $apl_niv; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $apl_bloq; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $apl_tipo_txt; ?></FONT></TD>
    <TD><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">
      <A HREF="nm_secure_apl_edita.php?aplicacao=<?php echo $apl_cod; ?>&grupo=<?php echo $apl_grp; ?>">Editar</A>
      <BR>
      <A HREF="nm_secure_apl_exclui.php?aplicacao=<?php echo $apl_cod; ?>&grupo=<?php echo $apl_grp; ?>">Excluir</A>
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