<?php
/**
 * $Id: nm_secure_grp_cria.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */

include_once ("nm_secure_base.php");

$error_occ = FALSE;

if (!isset($HTTP_POST_VARS["nm_opcao"]) || ($HTTP_POST_VARS["nm_opcao"] != "criar"))
{
    $nm_naveg  = "<DIV ALIGN=\"center\">\n";
    $nm_naveg .= "&nbsp;<INPUT TYPE=\"submit\" VALUE=\"Criar\" CLASS=\"txt_valor\">&nbsp;";
    $nm_naveg .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Cancelar\" CLASS=\"txt_valor\" onClick=\"nm_sair()\">&nbsp;";
    $nm_naveg .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Fechar\" CLASS=\"txt_valor\" onClick=\"nm_fechar()\">&nbsp;";
    $nm_naveg .= "</DIV>\n";
    $grp_cod   = "";
    $grp_desc  = "";
    $grp_bloq  = "N";
    $acao      = "editar";
}
else
{
    if (!isset($HTTP_POST_VARS["grupo"]) || ($HTTP_POST_VARS["grupo"] == ""))
    {
        $error_occ = TRUE;
        $mensagem  = "Informe o nome do Grupo.";
        $grp_cod   = "";
        $grp_desc  = isset($HTTP_POST_VARS["descricao"]) ? nm_escape_string($HTTP_POST_VARS["descricao"]) : "";
        $grp_bloq  = $HTTP_POST_VARS["bloqueado"];
    }
    elseif (!isset($HTTP_POST_VARS["bloqueado"]) || ($HTTP_POST_VARS["grupo"] == ""))
    {
        $error_occ = TRUE;
        $mensagem  = "Informe se o Grupo está bloqueado.";
    }
    else
    {
        $select  =  "SELECT Grupo";
        $select .= " FROM $nm_secure_tbgrp";
        $select .= " WHERE Grupo = '" . $HTTP_POST_VARS["grupo"] . "'";
        $rs      = &$db->executeQuery($select);
        if (!$rs)
        {
            nm_trata_erro("Erro ao recuperar os dados do servidor.", __FILE__, __LINE__);
        }
        if ($rs->getRowCount() > 0)
        {
            $error_occ = TRUE;
            $mensagem  = "Já existe um Grupo com este nome.";
        }
        else
        {
            $grp_cod  = nm_escape_string($HTTP_POST_VARS["grupo"]);
            $grp_desc = isset($HTTP_POST_VARS["descricao"]) ? nm_escape_string($HTTP_POST_VARS["descricao"]) : "";
            $grp_bloq = $HTTP_POST_VARS["bloqueado"];
            $d_inc    = date("Ymd");
            $h_inc    = date("His");
            $insert   =  "INSERT INTO $nm_secure_tbgrp";
            $insert  .= " (Grupo, Descricao, Bloqueado, Data_Inc, Hora_Inc)";
            $insert  .= " VALUES";
            $insert  .= " ('$grp_cod', '$grp_desc', '$grp_bloq', '$d_inc', '$h_inc')";
            $rs       = &$db->executeQuery($insert);
            if (!$rs)
            {
                nm_trata_erro("Erro ao inserir dados no servidor.", __FILE__, __LINE__);
            }
            header("Location: nm_secure_grp_lista.php");
            exit;
        }
    }
    if (TRUE == $error_occ)
    {
        $nm_naveg  = "<DIV ALIGN=\"center\">\n";
        $nm_naveg .= "&nbsp;<INPUT TYPE=\"submit\" VALUE=\"Criar\" CLASS=\"txt_valor\">&nbsp;";
        $nm_naveg .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Cancelar\" CLASS=\"txt_valor\" onClick=\"nm_sair()\">&nbsp;";
        $nm_naveg .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Sair\" CLASS=\"txt_valor\" onClick=\"nm_fechar()\">&nbsp;";
        $nm_naveg .= "</DIV>\n";
        $acao = "editar";
    }
}

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
function nm_sair()
{
  document.nm_form.action = 'nm_secure_grp_lista.php';
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
<FORM NAME="nm_form" ACTION="nm_secure_grp_cria.php" METHOD="POST">
<INPUT TYPE="hidden" NAME="nm_opcao" VALUE="criar">
<BR>
<TABLE ALIGN="center" BORDER="0" CELLSPACING="1" CELLPADDING="2" BGCOLOR="<?php echo $html_cor_fundo_borda; ?>">
  <TR ALIGN="center" BGCOLOR="<?php echo $html_cor_fundo_titulo; ?>">
    <TD COLSPAN="2"><FONT FACE="Verdana, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_titulo; ?>"><B>Criar Grupo</B></FONT></TD>
  </TR>
<?php
if (TRUE == $error_occ)
{
?>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD ALIGN="center" COLSPAN="2"><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B><?php echo $mensagem; ?></B></FONT></TD>
  </TR>
<?php
}
if ("editar" == $acao)
{
?>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Grupo</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>"><INPUT TYPE="text" NAME="grupo" SIZE="10" MAXLENGHT="32" VALUE="<?php echo $grp_cod; ?>" CLASS="txt_valor"></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Descricao</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>"><INPUT TYPE="text" NAME="descricao" SIZE="20" MAXLENGHT="64" VALUE="<?php echo $grp_desc; ?>" CLASS="txt_valor"></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Bloqueado</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>"><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">
      <INPUT TYPE="radio" NAME="bloqueado" VALUE="S" <?php if ("S" == $grp_bloq) { echo "CHECKED"; } ?>> Sim
      <INPUT TYPE="radio" NAME="bloqueado" VALUE="N" <?php if ("N" == $grp_bloq) { echo "CHECKED"; } ?>> Não
    </FONT></TD>
  </TR>
<?php
}
?>
</TABLE>
<BR>
<?php echo $nm_naveg; ?>
</FORM>
</BODY>
</HTML>