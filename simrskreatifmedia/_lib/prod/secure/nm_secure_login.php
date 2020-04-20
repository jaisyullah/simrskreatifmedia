<?php
/**
 * $Id: nm_secure_login.php,v 1.2 2011-06-22 20:58:38 vinicius Exp $
 */

$_SESSION["session_sec_login"] = 1;
include_once("nm_secure_base.php");
unset($_SESSION["session_sec_login"]);

$nm_opcao = "login";

if (!isset($HTTP_POST_VARS["nm_submit"]) || "sim" != $HTTP_POST_VARS["nm_submit"])
{
    $nm_sec_mensagem = "Informe seu login e senha para conectar ao sistema.";
    $nm_login        = "";
}
elseif (!isset($HTTP_POST_VARS["nm_login"]) || "" == $HTTP_POST_VARS["nm_login"])
{
    $nm_sec_mensagem = "Preencha o campo login.";
    $nm_login        = "";
}
elseif (!isset($HTTP_POST_VARS["nm_senha"]) || "" == $HTTP_POST_VARS["nm_senha"])
{
    $nm_sec_mensagem = "Preencha o campo senha.";
    $nm_opcao        = "senha";
    $nm_login        = nm_unescape_string($HTTP_POST_VARS["nm_login"]);
}
else
{
    $error    = FALSE;
    $nm_login = nm_escape_string($HTTP_POST_VARS["nm_login"]);
    $nm_senha = $HTTP_POST_VARS["nm_senha"];
    $select   = "SELECT Login, Senha, Priv_Admin FROM $nm_secure_tbusu WHERE Login = '" . $nm_login . "'";
    $rs_sel   = &$db->executeQuery($select);
    if (!$rs_sel)
    {
        $nm_sec_mensagem = "Ocorreu um erro ao acessar a base de dados.";
        $nm_login        = nm_unescape_string($HTTP_POST_VARS["nm_login"]);
    }
    elseif (!$rs_sel->next())
    {
        $nm_sec_mensagem = "Não existe usuário com o login fornecido no sistema.";
        $nm_login        = nm_unescape_string($HTTP_POST_VARS["nm_login"]);
        $rs_sel->Close();
    }
    else
    {
        $bd_login = $rs_sel->getCurrentValueByName('Login');
        $bd_senha = $rs_sel->getCurrentValueByName('Senha');
        $bd_admin = $rs_sel->getCurrentValueByName('Priv_Admin');
        if (md5($nm_senha) != $bd_senha)
        {
            $nm_sec_mensagem = "Login ou Senha inválidos.";
            $nm_login        = nm_unescape_string($HTTP_POST_VARS["nm_login"]);
            $error           = TRUE;
        }
        if ("S" != $bd_admin)
        {
            $nm_sec_mensagem = "Você não possui privilégio de administrador.";
            $nm_login        = nm_unescape_string($HTTP_POST_VARS["nm_login"]);
            $error           = TRUE;
        }
        if (!$error)
        {
            $_SESSION['session_sec_login'] = $bd_login;
            header("Location: nm_secure.php");
            exit;
        }
    }
}

?>
<HTML>
<HEAD>
 <TITLE>NetMake :: Script Case - Login</TITLE>
 <STYLE TYPE="text/css">
 <!--
 .txt_valor { font-family: Tahoma, Arial, sans-serif; font-size: 12px; color: #000000}
 -->
 </STYLE>
</HEAD>
<BODY MARGINWIDTH="0" MARGINHEIGHT="0" LEFTMARGIN="0" TOPMARGIN="0" BGCOLOR="<?php echo $html_cor_fundo_pagina; ?>">

<FORM NAME="nm_form_login" ACTION="nm_secure_login.php" METHOD="POST">
<INPUT TYPE="hidden" NAME="nm_submit" VALUE="sim">
<TABLE BORDER="0" WIDTH="100%" HEIGHT="100%" BGCOLOR="<?php echo $html_cor_fundo_pagina; ?>"><TR><TD ALIGN="center" VALIGN="middle">
 <TABLE BORDER="0" CELLPADDING="1" CELLSPACING="1" BGCOLOR="<?php echo $html_cor_fundo_borda; ?>" WIDTH="300">
  <TR>
   <TD COLSPAN="2"><IMG SRC="nm_secure_img_sclogo_2.gif" BORDER="0" WIDTH="300" HEIGHT="50"></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_titulo; ?>" ALIGN="center" VALIGN="middle" HEIGHT="35">
   <TD COLSPAN="2"><FONT FACE="Verdana, Arial, sans-serif" SIZE="3" COLOR="<?php echo $html_cor_texto_titulo; ?>"><B>Controle de Segurança</B></FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>" ALIGN="center" VALIGN="middle" HEIGHT="35">
   <TD COLSPAN="2"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_normal; ?>"><?php echo $nm_sec_mensagem; ?></FONT></TD>
  </TR>
  <TR HEIGHT="30" VALIGN="middle">
   <TD BGCOLOR="<?php echo $html_cor_fundo_lateral; ?>"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">&nbsp;<B>Usuário</B></FONT></TD>
   <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>">&nbsp; <INPUT TYPE="text" NAME="nm_login" SIZE="12" MAXLENGTH="12" VALUE="<?php echo $nm_login; ?>" CLASS="txt_valor"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_normal; ?>"></FONT></TD>
  </TR>
  <TR HEIGHT="30" VALIGN="middle">
   <TD BGCOLOR="<?php echo $html_cor_fundo_lateral; ?>"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">&nbsp;<B>Senha</B></FONT></TD>
   <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>">&nbsp; <INPUT TYPE="password" NAME="nm_senha" SIZE="12" MAXLENGTH="12" VALUE="" CLASS="txt_valor"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_normal; ?>"></FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>" ALIGN="center" VALIGN="middle" HEIGHT="35">
   <TD COLSPAN="2"><INPUT TYPE="submit" NAME="b1" VALUE="Processar" CLASS="txt_valor"></TD>
  </TR>
 </TABLE>
</TD></TR></TABLE>
</FORM>

<SCRIPT LANGUAGE="Javascript">
function seta_focus()
{
 document.nm_form_login.nm_<?php echo $nm_opcao; ?>.focus();
}
seta_focus();
</SCRIPT>

</BODY>
</HTML>
