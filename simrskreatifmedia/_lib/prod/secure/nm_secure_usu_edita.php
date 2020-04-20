<?php
/**
 * $Id: nm_secure_usu_edita.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */

include_once ("nm_secure_base.php");

$error_occ = FALSE;

if (isset($HTTP_GET_VARS["login"]))
{
    $nm_naveg  = "<DIV ALIGN=\"center\">\n";
    $nm_naveg .= "&nbsp;<INPUT TYPE=\"submit\" VALUE=\"Atualizar\" CLASS=\"txt_valor\">&nbsp;";
    $nm_naveg .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Cancelar\" CLASS=\"txt_valor\" onClick=\"nm_sair()\">&nbsp;";
    $nm_naveg .= "&nbsp;<INPUT TYPE=\"button\" VALUE=\"Fechar\" CLASS=\"txt_valor\" onClick=\"nm_fechar()\">&nbsp;";
    $nm_naveg .= "</DIV>\n";
    $select    =  "SELECT Login, Senha_Troca, Senha_Periodo, Nome, Email, Setor, Cargo, Priv_Admin, Bloqueado, Grupos, Nivel";
    $select   .= " FROM $nm_secure_tbusu";
    $select   .= " WHERE Login = '" . $HTTP_GET_VARS["login"] . "'";
    $rs        = &$db->executeQuery($select);
    if (!$rs)
    {
        $mensagem = "Erro ao recuperar os dados do servidor.";
    }
    elseif (!$rs->next())
    {
        $mensagem = "Erro ao recuperar os dados do usuário.";
    }                                
    $usu_log   = $rs->getCurrentValueByName('Login');
    $usu_troca = $rs->getCurrentValueByName('Senha_Troca');
    $usu_per   = $rs->getCurrentValueByName('Senha_Periodo');
    $usu_nome  = $rs->getCurrentValueByName('Nome');
    $usu_email = $rs->getCurrentValueByName('Email');
    $usu_setor = $rs->getCurrentValueByName('Setor');
    $usu_cargo = $rs->getCurrentValueByName('Cargo');
    $usu_admin = $rs->getCurrentValueByName('Priv_Admin');
    $usu_bloq  = $rs->getCurrentValueByName('Bloqueado');
    $usu_lista = $rs->getCurrentValueByName('Grupos');
    $usu_niv   = $rs->getCurrentValueByName('Nivel');
    $usu_grps  = explode($secure_delim, $usu_lista);
    $acao      = "editar";
}
elseif (isset($HTTP_POST_VARS["nm_opcao"]) && isset($HTTP_POST_VARS["login"]))
{
    if (!isset($HTTP_POST_VARS["login"]) || ($HTTP_POST_VARS["login"] == ""))
    {
        $error_occ = TRUE;
        $mensagem  = "Informe o login do Usuário.";
        $usu_log   = "";
        $usu_troca = isset($HTTP_POST_VARS["senha_troca"])   ? $HTTP_POST_VARS["senha_troca"]               : "0";
        $usu_per   = isset($HTTP_POST_VARS["senha_periodo"]) ? $HTTP_POST_VARS["senha_periodo"]             : "0";
        $usu_nome  = isset($HTTP_POST_VARS["nome"])          ? nm_unescape_string($HTTP_POST_VARS["nome"])  : "";
        $usu_email = isset($HTTP_POST_VARS["email"])         ? nm_unescape_string($HTTP_POST_VARS["email"]) : "";
        $usu_setor = isset($HTTP_POST_VARS["setor"])         ? nm_unescape_string($HTTP_POST_VARS["setor"]) : "";
        $usu_cargo = isset($HTTP_POST_VARS["cargo"])         ? nm_unescape_string($HTTP_POST_VARS["cargo"]) : "";
        $usu_admin = isset($HTTP_POST_VARS["priv_admin"])    ? $HTTP_POST_VARS["priv_admin"]                : "N";
        $usu_bloq  = isset($HTTP_POST_VARS["bloqueado"])     ? $HTTP_POST_VARS["bloqueado"]                 : "N";
        $usu_grps  = isset($HTTP_POST_VARS["grupos"])        ? $HTTP_POST_VARS["grupos"]                    : array();
        $usu_niv   = isset($HTTP_POST_VARS["nivel"])         ? $HTTP_POST_VARS["nivel"]                     : "0";
    }
    elseif (($HTTP_POST_VARS["senha_troca"] == "2") && ($HTTP_POST_VARS["senha_periodo"] == "0"))
    {
        $error_occ = TRUE;
        $mensagem  = "Informe a expiração da senha.";
        $usu_log   = nm_unescape_string($HTTP_POST_VARS["login"]);
        $usu_troca = isset($HTTP_POST_VARS["senha_troca"])   ? $HTTP_POST_VARS["senha_troca"]               : "0";
        $usu_per   = isset($HTTP_POST_VARS["senha_periodo"]) ? $HTTP_POST_VARS["senha_periodo"]             : "0";
        $usu_nome  = isset($HTTP_POST_VARS["nome"])          ? nm_unescape_string($HTTP_POST_VARS["nome"])  : "";
        $usu_email = isset($HTTP_POST_VARS["email"])         ? nm_unescape_string($HTTP_POST_VARS["email"]) : "";
        $usu_setor = isset($HTTP_POST_VARS["setor"])         ? nm_unescape_string($HTTP_POST_VARS["setor"]) : "";
        $usu_cargo = isset($HTTP_POST_VARS["cargo"])         ? nm_unescape_string($HTTP_POST_VARS["cargo"]) : "";
        $usu_admin = isset($HTTP_POST_VARS["priv_admin"])    ? $HTTP_POST_VARS["priv_admin"]                : "N";
        $usu_bloq  = isset($HTTP_POST_VARS["bloqueado"])     ? $HTTP_POST_VARS["bloqueado"]                 : "N";
        $usu_grps  = isset($HTTP_POST_VARS["grupos"])        ? $HTTP_POST_VARS["grupos"]                    : array();
        $usu_niv   = isset($HTTP_POST_VARS["nivel"])         ? $HTTP_POST_VARS["nivel"]                     : "0";
    }
    if (!$error_occ)
    {
        $usu_log   = nm_unescape_string($HTTP_POST_VARS["login"]);
        $usu_troca = isset($HTTP_POST_VARS["senha_troca"])   ? $HTTP_POST_VARS["senha_troca"]   : "0";
        $usu_per   = isset($HTTP_POST_VARS["senha_periodo"]) ? $HTTP_POST_VARS["senha_periodo"] : "0";
        $usu_nome  = isset($HTTP_POST_VARS["nome"])       ? nm_unescape_string($HTTP_POST_VARS["nome"])  : "";
        $usu_email = isset($HTTP_POST_VARS["email"])      ? nm_unescape_string($HTTP_POST_VARS["email"]) : "";
        $usu_setor = isset($HTTP_POST_VARS["setor"])      ? nm_unescape_string($HTTP_POST_VARS["setor"]) : "";
        $usu_cargo = isset($HTTP_POST_VARS["cargo"])      ? nm_unescape_string($HTTP_POST_VARS["cargo"]) : "";
        $usu_admin = isset($HTTP_POST_VARS["priv_admin"]) ? $HTTP_POST_VARS["priv_admin"]                : "N";
        $usu_bloq  = isset($HTTP_POST_VARS["bloqueado"])  ? $HTTP_POST_VARS["bloqueado"]                 : "N";
        $usu_grps  = isset($HTTP_POST_VARS["grupos"])     ? $HTTP_POST_VARS["grupos"]                    : array();
        $usu_niv   = isset($HTTP_POST_VARS["nivel"])      ? $HTTP_POST_VARS["nivel"]                     : "0";
        $usu_dinc  = date("Ymd");
        $usu_hinc  = date("His");
        $usu_lista = "";
        foreach ($usu_grps as $grp_cod)
        {
            if ("" != $usu_lista)
            {
                $usu_lista .= $secure_delim;
            }
            $usu_lista .= $grp_cod;
        }
        $update   =  "UPDATE $nm_secure_tbusu";
        $update  .= " SET Senha_Troca = '$usu_troca',";
        $update  .=     " Senha_Periodo = '$usu_per',";
        $update  .=     " Nome = '$usu_nome',";
        $update  .=     " Email = '$usu_email',";
        $update  .=     " Setor = '$usu_setor',";
        $update  .=     " Cargo = '$usu_cargo',";
        $update  .=     " Priv_Admin = '$usu_admin',";
        $update  .=     " Bloqueado = '$usu_bloq',";
        $update  .=     " Grupos = '$usu_lista',";
        $update  .=     " Nivel = '$usu_niv'";
        $update  .= " WHERE Login = '$usu_log'";
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
    header("Location: nm_secure_usu_lista.php");
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
  document.nm_form.action = 'nm_secure_usu_lista.php';
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
<FORM NAME="nm_form" ACTION="nm_secure_usu_edita.php" METHOD="POST">
<INPUT TYPE="hidden" NAME="nm_opcao" VALUE="atualizar">
<INPUT TYPE="hidden" NAME="login" VALUE="<?php echo $usu_log; ?>">
<BR>
<TABLE ALIGN="center" BORDER="0" CELLSPACING="1" CELLPADDING="2" BGCOLOR="<?php echo $html_cor_fundo_borda; ?>">
  <TR ALIGN="center" BGCOLOR="<?php echo $html_cor_fundo_titulo; ?>">
    <TD COLSPAN="2"><FONT FACE="Verdana, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_titulo; ?>"><B>Editar Usuário</B></FONT></TD>
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
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Login</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_normal; ?>"><?php echo $usu_log; ?></FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Troca de Senha</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>">
      <SELECT NAME="senha_troca" CLASS="txt_valor">
        <OPTION VALUE="0" <?php if ("0" == $usu_troca) { echo "SELECTED"; } ?>>Nunca</OPTION>
        <OPTION VALUE="1" <?php if ("1" == $usu_troca) { echo "SELECTED"; } ?>>Próximo Logon</OPTION>
        <OPTION VALUE="2" <?php if ("2" == $usu_troca) { echo "SELECTED"; } ?>>Periódica</OPTION>
      </SELECT>
    </TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Expiração da Senha</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>">
      <SELECT NAME="senha_periodo" CLASS="txt_valor">
        <OPTION VALUE="0" <?php if ("0" == $usu_per) { echo "SELECTED"; } ?>></OPTION>
        <OPTION VALUE="1" <?php if ("1" == $usu_per) { echo "SELECTED"; } ?>>Mensal</OPTION>
        <OPTION VALUE="2" <?php if ("2" == $usu_per) { echo "SELECTED"; } ?>>Semanal</OPTION>
      </SELECT>
    </TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Nome</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>"><INPUT TYPE="text" NAME="nome" SIZE="20" MAXLENGHT="50" VALUE="<?php echo $usu_nome; ?>" CLASS="txt_valor"></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>E-Mail</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>"><INPUT TYPE="text" NAME="email" SIZE="20" MAXLENGHT="32" VALUE="<?php echo $usu_email; ?>" CLASS="txt_valor"></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Setor</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>"><INPUT TYPE="text" NAME="setor" SIZE="20" MAXLENGHT="25" VALUE="<?php echo $usu_setor; ?>" CLASS="txt_valor"></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Cargo</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>"><INPUT TYPE="text" NAME="cargo" SIZE="20" MAXLENGHT="25" VALUE="<?php echo $usu_cargo; ?>" CLASS="txt_valor"></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Administrador</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>"><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">
      <INPUT TYPE="radio" NAME="priv_admin" VALUE="S" <?php if ("S" == $usu_admin) { echo "CHECKED"; } ?>> Sim
      <INPUT TYPE="radio" NAME="priv_admin" VALUE="N" <?php if ("N" == $usu_admin) { echo "CHECKED"; } ?>> Não
    </FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Bloqueado</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>"><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">
      <INPUT TYPE="radio" NAME="bloqueado" VALUE="S" <?php if ("S" == $usu_bloq) { echo "CHECKED"; } ?>> Sim
      <INPUT TYPE="radio" NAME="bloqueado" VALUE="N" <?php if ("N" == $usu_bloq) { echo "CHECKED"; } ?>> Não
    </FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>">
    <TD><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>"><B>Grupos</B></FONT></TD>
    <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>"><FONT FACE="Helvetica, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">
<?php
    $sel_grp = "SELECT Grupo FROM $nm_secure_tbgrp ORDER BY Grupo";
    $rs_grp  = &$db->executeQuery($sel_grp);
    if ($rs_grp)
    {
        while ($rs_grp->next())
        {
            $grp_cod = $rs_grp->getCurrentValueByName('Grupo');
            $grp_chk = (in_array($grp_cod, $usu_grps)) ? "CHECKED" : "";
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
    <TD BGCOLOR="<?php echo $html_cor_fundo_linimp; ?>"><INPUT TYPE="text" NAME="nivel" SIZE="3" MAXLENGHT="3" VALUE="<?php echo $usu_niv; ?>" CLASS="txt_valor"></TD>
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