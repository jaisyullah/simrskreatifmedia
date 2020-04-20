<?php
/**
 * $Id: nm_secure_apl_cria.php,v 1.2 2011-06-20 14:31:35 diogo Exp $
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
    $apl_cod   = "";
    $apl_grp   = "";
    $apl_grps  = array();
    $apl_niv   = "";
    $apl_bloq  = "N";
    $apl_tipo  = "1";
    $apl_obr   = "N";
    $apl_bd    = "N";
    $apl_time  = "";
    $apl_stat  = "";
    $acao      = "editar";
}
else
{
    if (!isset($HTTP_POST_VARS["grupo_aplicacao"]) || ($HTTP_POST_VARS["grupo_aplicacao"] == ""))
    {
        $error_occ = TRUE;
        $mensagem  = "Informe a Aplicacao.";
        $arr_tmp_list_change = explode($secure_delim, $HTTP_POST_VARS["grupo_aplicacao"]);
        list($apl_grp, $apl_cod) = $arr_tmp_list_change;
        $apl_cod  = nm_unescape_string($apl_cod);
        $apl_grp  = nm_unescape_string($apl_grp);
        $apl_grps = isset($HTTP_POST_VARS["grupos"])          ? $HTTP_POST_VARS["grupos"]                    : array();
        $apl_niv  = isset($HTTP_POST_VARS["nivel"])           ? $HTTP_POST_VARS["nivel"]                     : "";
        $apl_bloq = isset($HTTP_POST_VARS["bloqueada"])       ? $HTTP_POST_VARS["bloqueada"]                 : "N";
        $apl_tipo = isset($HTTP_POST_VARS["autentica_tipo"])  ? $HTTP_POST_VARS["autentica_tipo"]            : "1";
        $apl_obr  = isset($HTTP_POST_VARS["autentica_obrig"]) ? $HTTP_POST_VARS["autentica_obrig"]           : "N";
        $apl_bd   = isset($HTTP_POST_VARS["autentica_banco"]) ? $HTTP_POST_VARS["autentica_banco"]           : "N";
        $apl_time = isset($HTTP_POST_VARS["timeout"])         ? $HTTP_POST_VARS["timeout"]                   : "";
    }
    else
    {
        $arr_tmp_list_change = explode($secure_delim, $HTTP_POST_VARS["grupo_aplicacao"]);
        list($apl_grp, $apl_cod) = $arr_tmp_list_change;
        $apl_cod  = nm_unescape_string($apl_cod);
        $apl_grp  = nm_unescape_string($apl_grp);
        $apl_grps = isset($HTTP_POST_VARS["grupos"])          ? $HTTP_POST_VARS["grupos"]          : array();
        $apl_niv  = isset($HTTP_POST_VARS["nivel"])           ? $HTTP_POST_VARS["nivel"]           : "";
        $apl_bloq = isset($HTTP_POST_VARS["bloqueada"])       ? $HTTP_POST_VARS["bloqueada"]       : "N";
        $apl_tipo = isset($HTTP_POST_VARS["autentica_tipo"])  ? $HTTP_POST_VARS["autentica_tipo"]  : "1";
        $apl_obr  = isset($HTTP_POST_VARS["autentica_obrig"]) ? $HTTP_POST_VARS["autentica_obrig"] : "N";
        $apl_bd   = isset($HTTP_POST_VARS["autentica_banco"]) ? $HTTP_POST_VARS["autentica_banco"] : "N";
        $apl_time = isset($HTTP_POST_VARS["timeout"])         ? $HTTP_POST_VARS["timeout"]         : "";
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
        $select  =  "SELECT Aplicacao, Grupo";
        $select .= " FROM $nm_secure_tbapl";
        $select .= " WHERE Aplicacao = '" . $apl_cod . "' AND Grupo = '" . $apl_grp . "'";
        $rs      = &$db->executeQuery($select);
        if (!$rs)
        {
            nm_trata_erro("Erro ao recuperar os dados do servidor.", __FILE__, __LINE__);
        }
        if ($rs->getRowCount() > 0)
        {
            $error_occ = TRUE;
            $mensagem  = "A segurança já foi definida para esta aplicação.";
        }
        else
        {
            $arr_tmp_list_change = explode($secure_delim, $HTTP_POST_VARS["grupo_aplicacao"]);
            list($apl_grp, $apl_cod) = $arr_tmp_list_change;
            $apl_cod   = nm_unescape_string($apl_cod);
            $apl_grp   = nm_unescape_string($apl_grp);
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
            $insert   =  "INSERT INTO $nm_secure_tbapl";
            $insert  .= " (Aplicacao, Grupo, Grupos, Nivel, Bloqueada, Autentica_Tipo, Autentica_Obrig, Autentica_Banco, Timeout)";
            $insert  .= " VALUES";
            $insert  .= " ('$apl_cod', '$apl_grp', '$apl_lista', '$apl_niv', '$apl_bloq', '$apl_tipo', '$apl_obr', '$apl_bd', '$apl_time')";
            $rs       = &$db->executeQuery($insert);
            if (!$rs)
            {
                nm_trata_erro("Erro ao inserir dados no servidor.", __FILE__, __LINE__);
            }
            header("Location: nm_secure_apl_lista.php");
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
<FORM NAME="nm_form" ACTION="nm_secure_apl_cria.php" METHOD="POST">
<INPUT TYPE="hidden" NAME="nm_opcao" VALUE="criar">
<BR>
<TABLE ALIGN="center" BORDER="0" CELLSPACING="1" CELLPADDING="2" BGCOLOR="<?php echo $html_cor_fundo_borda; ?>">
  <TR ALIGN="center" BGCOLOR="<?php echo $html_cor_fundo_titulo; ?>">
    <TD COLSPAN="2"><FONT FACE="Verdana, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_titulo; ?>"><B>Criar Aplicação</B></FONT></TD>
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
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Aplicação (Grupo)</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>">
<?php
    $apl_lista = nm_sec_lista_monta($apl_base_path, array());
?>
      <SELECT NAME="grupo_aplicacao" CLASS="txt_valor">
<?php
    foreach ($apl_lista as $apl_grupo => $apl_nomes)
    {
        foreach ($apl_nomes as $apl_nome)
        {
            $opt_sel = (($apl_grupo == $apl_grp) && ($apl_nome == $apl_cod)) ? "SELECTED" : "";
?>
        <OPTION VALUE="<?php echo $apl_grupo . $secure_delim . $apl_nome; ?>" <?php echo $opt_sel; ?>><?php echo "$apl_nome ($apl_grupo)"; ?></OPTION>
<?php
        }
    }
?>
      </SELECT>
    </TD>
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