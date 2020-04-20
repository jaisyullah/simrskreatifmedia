<?php
/**
 * $Id: nm_secure_apl_edita.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */

include_once ("nm_secure_base.php");

$error_occ = FALSE;

if (isset($HTTP_GET_VARS["aplicacao"]) && isset($HTTP_GET_VARS["grupo"]))
{
    $nm_naveg  = "<DIV ALIGN=\"center\">\n";
    $nm_naveg .= "&nbsp;<INPUT TYPE=\"submit\" VALUE=\"Atualizar\" CLASS=\"txt_valor\">&nbsp;";
    $nm_naveg .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Cancelar\" CLASS=\"txt_valor\" onClick=\"nm_sair()\">&nbsp;";
    $nm_naveg .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Fechar\" CLASS=\"txt_valor\" onClick=\"nm_fechar()\">&nbsp;";
    $nm_naveg .= "</DIV>\n";
    $select    =  "SELECT Aplicacao, Grupo, Grupos, Nivel, Bloqueada, Autentica_Tipo, Autentica_Obrig, Autentica_Banco, Timeout";
    $select   .= " FROM $nm_secure_tbapl";
    $select   .= " WHERE Aplicacao = '" . $HTTP_GET_VARS["aplicacao"] . "' AND Grupo = '" . $HTTP_GET_VARS["grupo"] . "'";
    $rs        = &$db->executeQuery($select);
    if (!$rs)
    {
        $mensagem = "Erro ao recuperar os dados do servidor.";
    }
    elseif (!$rs->next())
    {
        $mensagem = "Erro ao recuperar os dados da aplicação.";
    }
    $apl_cod   = $rs->getCurrentValueByName('Aplicacao');
    $apl_grp   = $rs->getCurrentValueByName('Grupo');
    $apl_lista = $rs->getCurrentValueByName('Grupos');
    $apl_niv   = $rs->getCurrentValueByName('Nivel');
    $apl_bloq  = $rs->getCurrentValueByName('Bloqueada');
    $apl_tipo  = $rs->getCurrentValueByName('Autentica_Tipo');
    $apl_obr   = $rs->getCurrentValueByName('Autentica_Obrig');
    $apl_bd    = $rs->getCurrentValueByName('Autentica_Banco');
    $apl_time  = $rs->getCurrentValueByName('Timeout');
    $apl_grps  = explode($secure_delim, $apl_lista);
    $acao      = "editar";
}
elseif (isset($HTTP_POST_VARS["nm_opcao"]) && isset($HTTP_POST_VARS["aplicacao"]) && isset($HTTP_POST_VARS["grupo"]))
{
    if (!isset($HTTP_POST_VARS["aplicacao"]) || ($HTTP_POST_VARS["aplicacao"] == ""))
    {
        $error_occ = TRUE;
        $mensagem  = "Informe o nome da Aplicacao.";
        $apl_cod   = "";
        $apl_grp   = isset($HTTP_POST_VARS["grupo"])           ? nm_unescape_string($HTTP_POST_VARS["grupo"]) : "";
        $apl_grps  = isset($HTTP_POST_VARS["grupos"])          ? $HTTP_POST_VARS["grupos"]                    : array();
        $apl_niv   = isset($HTTP_POST_VARS["nivel"])           ? $HTTP_POST_VARS["nivel"]                     : "";
        $apl_bloq  = isset($HTTP_POST_VARS["bloqueada"])       ? $HTTP_POST_VARS["bloqueada"]                 : "N";
        $apl_tipo  = isset($HTTP_POST_VARS["autentica_tipo"])  ? $HTTP_POST_VARS["autentica_tipo"]            : "1";
        $apl_obr   = isset($HTTP_POST_VARS["autentica_obrig"]) ? $HTTP_POST_VARS["autentica_obrig"]           : "N";
        $apl_bd    = isset($HTTP_POST_VARS["autentica_banco"]) ? $HTTP_POST_VARS["autentica_banco"]           : "N";
        $apl_time  = isset($HTTP_POST_VARS["timeout"])         ? $HTTP_POST_VARS["timeout"]                   : "";
    }
    elseif (!isset($HTTP_POST_VARS["grupo"]) || ($HTTP_POST_VARS["grupo"] == ""))
    {
        $error_occ = TRUE;
        $mensagem  = "Informe o Grupo da Aplicacao.";
        $apl_cod   = nm_unescape_string($HTTP_POST_VARS["aplicacao"]);
        $apl_grp   = "";
        $apl_grps  = isset($HTTP_POST_VARS["grupos"])          ? $HTTP_POST_VARS["grupos"]          : array();
        $apl_niv   = isset($HTTP_POST_VARS["nivel"])           ? $HTTP_POST_VARS["nivel"]           : "";
        $apl_bloq  = isset($HTTP_POST_VARS["bloqueada"])       ? $HTTP_POST_VARS["bloqueada"]       : "N";
        $apl_tipo  = isset($HTTP_POST_VARS["autentica_tipo"])  ? $HTTP_POST_VARS["autentica_tipo"]  : "1";
        $apl_obr   = isset($HTTP_POST_VARS["autentica_obrig"]) ? $HTTP_POST_VARS["autentica_obrig"] : "N";
        $apl_bd    = isset($HTTP_POST_VARS["autentica_banco"]) ? $HTTP_POST_VARS["autentica_banco"] : "N";
        $apl_time  = isset($HTTP_POST_VARS["timeout"])         ? $HTTP_POST_VARS["timeout"]         : "";
    }
    else
    {
        $apl_cod   = nm_unescape_string($HTTP_POST_VARS["aplicacao"]);
        $apl_grp   = nm_unescape_string($HTTP_POST_VARS["grupo"]);
        $apl_grps  = isset($HTTP_POST_VARS["grupos"])          ? $HTTP_POST_VARS["grupos"]          : array();
        $apl_niv   = isset($HTTP_POST_VARS["nivel"])           ? $HTTP_POST_VARS["nivel"]           : "";
        $apl_bloq  = isset($HTTP_POST_VARS["bloqueada"])       ? $HTTP_POST_VARS["bloqueada"]       : "N";
        $apl_tipo  = isset($HTTP_POST_VARS["autentica_tipo"])  ? $HTTP_POST_VARS["autentica_tipo"]  : "1";
        $apl_obr   = isset($HTTP_POST_VARS["autentica_obrig"]) ? $HTTP_POST_VARS["autentica_obrig"] : "N";
        $apl_bd    = isset($HTTP_POST_VARS["autentica_banco"]) ? $HTTP_POST_VARS["autentica_banco"] : "N";
        $apl_time  = isset($HTTP_POST_VARS["timeout"])         ? $HTTP_POST_VARS["timeout"]         : "";
        if ("2" == $apl_tipo && empty($apl_grps))
        {
            $error_occ = TRUE;
            $mensagem  = "Escolha pelo menos um grupo.";
        }
        elseif ("3" == $apl_tipo && "" == $apl_niv)
        {
            $error_occ = TRUE;
            $mensagem  = "Informe o nível da Aplicação.";
        }
    }
    if (!$error_occ)
    {
        $apl_cod   = nm_unescape_string($HTTP_POST_VARS["aplicacao"]);
        $apl_grp   = nm_unescape_string($HTTP_POST_VARS["grupo"]);
        $apl_grps  = isset($HTTP_POST_VARS["grupos"])          ? $HTTP_POST_VARS["grupos"]          : array();
        $apl_niv   = isset($HTTP_POST_VARS["nivel"])           ? $HTTP_POST_VARS["nivel"]           : "";
        $apl_bloq  = isset($HTTP_POST_VARS["bloqueada"])       ? $HTTP_POST_VARS["bloqueada"]       : "N";
        $apl_tipo  = isset($HTTP_POST_VARS["autentica_tipo"])  ? $HTTP_POST_VARS["autentica_tipo"]  : "1";
        $apl_obr   = isset($HTTP_POST_VARS["autentica_obrig"]) ? $HTTP_POST_VARS["autentica_obrig"] : "N";
        $apl_bd    = isset($HTTP_POST_VARS["autentica_banco"]) ? $HTTP_POST_VARS["autentica_banco"] : "N";
        $apl_time  = isset($HTTP_POST_VARS["timeout"])         ? $HTTP_POST_VARS["timeout"]         : "";
        $apl_lista = "";
        foreach ($apl_grps as $grp_cod)
        {
            if ("" != $apl_lista)
            {
                $apl_lista .= $secure_delim;
            }
            $apl_lista .= $grp_cod;
        }
        $update   =  "UPDATE $nm_secure_tbapl";
        $update  .= " SET Grupos = '$apl_lista',";
        $update  .=     " Nivel = '$apl_niv',";
        $update  .=     " Bloqueada = '$apl_bloq',";
        $update  .=     " Autentica_Tipo = '$apl_tipo',";
        $update  .=     " Autentica_Obrig = '$apl_obr',";
        $update  .=     " Autentica_Banco = '$apl_bd',";
        $update  .=     " Timeout = '$apl_time'";
        $update  .= " WHERE Aplicacao = '$apl_cod' AND Grupo = '$apl_grp'";
        $rs       = &$db->executeQuery($update);
        if (!$rs)
        {
            $mensagem = "Erro na atualização.";
        }
        else
        {
            $mensagem = "Atualização efetuada.";
        }
    }
    if (TRUE == $error_occ)
    {
        $nm_naveg  = "<DIV ALIGN=\"center\">\n";
        $nm_naveg .= "&nbsp;<INPUT TYPE=\"submit\" VALUE=\"Atualizar\" CLASS=\"txt_valor\">&nbsp;";
        $nm_naveg .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Cancelar\" CLASS=\"txt_valor\" onClick=\"nm_sair()\">&nbsp;";
        $nm_naveg .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Fechar\" CLASS=\"txt_valor\" onClick=\"nm_fechar()\">&nbsp;";
        $nm_naveg .= "</DIV>\n";
        $acao      = "editar";
    }
    else
    {
        $nm_naveg   = "<DIV ALIGN=\"center\">\n";
        $nm_naveg  .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Ok\" CLASS=\"txt_valor\" onClick=\"nm_sair()\">&nbsp;";
        $nm_naveg  .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Fechar\" CLASS=\"txt_valor\" onClick=\"nm_fechar()\">&nbsp;";
        $nm_naveg  .= "</DIV>\n";
        $acao       = "atualizar";
    }
}
else
{
    header("Location: nm_secure_apl_lista.php");
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
  document.nm_form.action = 'nm_secure_apl_lista.php';
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
<FORM NAME="nm_form" ACTION="nm_secure_apl_edita.php" METHOD="POST">
<INPUT TYPE="hidden" NAME="nm_opcao" VALUE="atualizar">
<INPUT TYPE="hidden" NAME="aplicacao" VALUE="<?php echo $apl_cod; ?>">
<INPUT TYPE="hidden" NAME="grupo" VALUE="<?php echo $apl_grp; ?>">
<BR>
<TABLE ALIGN="center" BORDER="0" CELLSPACING="1" CELLPADDING="2" BGCOLOR="<?php echo $html_cor_fundo_borda; ?>">
  <TR ALIGN="center" BGCOLOR="<?php echo $html_cor_fundo_titulo; ?>">
    <TD COLSPAN="2"><FONT FACE="Verdana, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_titulo; ?>"><B>Editar Aplicação</B></FONT></TD>
  </TR>
<?php
if ($error_occ || "editar" != $acao)
{
?>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD COLSPAN="2"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><?php echo $mensagem; ?></FONT></TD>
  </TR>
<?php
}
if ("editar" == $acao)
{
?>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Aplicação (Grupo)</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_normal; ?>"><?php echo "$apl_cod ($apl_grp)"; ?></FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Grupos</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>"><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">
<?php
    $sel_grp = "SELECT Grupo FROM $nm_secure_tbgrp ORDER BY Grupo";
    $rs_grp  = &$db->executeQuery($sel_grp);
    if ($rs_grp)
    {
        while ($rs_grp->next())
        {
            $grp_cod = $rs_grp->getCurrentValueByName('Grupo');
            $grp_chk = (in_array($grp_cod, $apl_grps)) ? "CHECKED" : "";
?>
      <INPUT TYPE="checkbox" NAME="grupos[]" VALUE="<?php echo $grp_cod; ?>" <?php echo $grp_chk; ?>> <?php echo $grp_cod; ?>
      <BR>
<?php
        }
    }
?>
    </FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Nível</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>"><INPUT TYPE="text" NAME="nivel" SIZE="5" MAXLENGHT="3" VALUE="<?php echo $apl_niv; ?>" CLASS="txt_valor"></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Bloqueada</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>"><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">
      <INPUT TYPE="radio" NAME="bloqueada" VALUE="S" <?php if ("S" == $apl_bloq) { echo "CHECKED"; } ?>> Sim
      <INPUT TYPE="radio" NAME="bloqueada" VALUE="N" <?php if ("N" == $apl_bloq) { echo "CHECKED"; } ?>> Não
    </FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Tipo</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>">
      <SELECT NAME="autentica_tipo" CLASS="txt_valor">
        <OPTION VALUE="0" <?php if ("0" == $apl_tipo) { echo "SELECTED"; } ?>>Nenhuma</OPTION>
        <OPTION VALUE="1" <?php if ("1" == $apl_tipo) { echo "SELECTED"; } ?>>Por Usuário</OPTION>
        <OPTION VALUE="2" <?php if ("2" == $apl_tipo) { echo "SELECTED"; } ?>>Por Grupo</OPTION>
        <OPTION VALUE="3" <?php if ("3" == $apl_tipo) { echo "SELECTED"; } ?>>Por Nível</OPTION>
      </SELECT>
    </TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Autenticação Obrigatória</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>"><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">
      <INPUT TYPE="radio" NAME="autentica_obrig" VALUE="S" <?php if ("S" == $apl_obr) { echo "CHECKED"; } ?>> Sim
      <INPUT TYPE="radio" NAME="autentica_obrig" VALUE="N" <?php if ("N" == $apl_obr) { echo "CHECKED"; } ?>> Não
    </FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Autenticação pelo Banco</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>"><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">
      <INPUT TYPE="radio" NAME="autentica_banco" VALUE="S" <?php if ("S" == $apl_bd) { echo "CHECKED"; } ?>> Sim
      <INPUT TYPE="radio" NAME="autentica_banco" VALUE="N" <?php if ("N" == $apl_bd) { echo "CHECKED"; } ?>> Não
    </FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Timeout</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>"><INPUT TYPE="text" NAME="timeout" SIZE="5" MAXLENGHT="11" VALUE="<?php echo $apl_time; ?>" CLASS="txt_valor"></TD>
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