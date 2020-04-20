<?php
/**
 * $Id: nm_secure_lib.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */

function nm_trata_erro($erro, $script = "", $line = "")
{
    $mensagem = $erro;
    if ($script != "")
    {
        $mensagem .= "<BR><BR>" . $script;
        if ($line != "")
        {
            $mensagem .= "(" . $line . ")";
        }
    }
    echo $mensagem;
    exit;
}

function nm_formata_hora($hora)
{
    return (substr(chunk_split($hora, 2, ":"), 0, 8));
}

function nm_formata_data($data)
{
    $a = substr($data, 0, 4);
    $m = substr($data, 4, 2);
    $d = substr($data, 6, 2);
    return ($d . "/" . $m . "/" . $a);
}

function nm_escape_string($string, $origem = 'gpc')
{
    if (((!get_magic_quotes_gpc()) && ($origem == 'gpc')) || ((!get_magic_quotes_runtime()) && ($origem == 'runtime')))
    {
        return(addslashes($string));
    }
    else
    {
        return($string);
    }
}

function nm_unescape_string($string, $origem = 'gpc')
{
    if (((get_magic_quotes_gpc()) && ($origem == 'gpc')) || ((get_magic_quotes_runtime()) && ($origem == 'runtime')))
    {
        return(stripslashes($string));
    }
    else
    {
        return($string);
    }
}

function nm_escape_array($array, $origem = 'gpc')
{
    if (is_array($array))
    {
        $result = array();
        foreach ($array as $chave => $valor)
        {
            $result = array_merge($result, array($chave => nm_escape_string($valor, $origem)));
        }
        return($result);
    }
    else
    {
        return($array);
    }
}

function nm_unescape_array($array, $origem = 'gpc')
{
    if (is_array($array))
    {
        $result = array();
        foreach ($array as $chave => $valor)
        {
            $result = array_merge($result, array($chave => nm_unescape_string($valor, $origem)));
        }
        return($result);
    }
    else
    {
      return($array);
    }
}

function nm_time()
{
    $mtime = microtime();
    $mtime = explode(" ", $mtime);
    $mtime = $mtime[1] + $mtime[0];
    return(floor($mtime));
}

function nm_sec_conexao($nm_secure_bd_tipo, $nm_secure_bd_servidor, $nm_secure_bd_usuario, $nm_secure_bd_senha, $nm_secure_bd_banco)
{
    ADOLoadCode($nm_secure_bd_tipo);
    $db     = ADONewConnection($nm_secure_bd_tipo);
    $result = @$db->Connect($nm_secure_bd_servidor, $nm_secure_bd_usuario, $nm_secure_bd_senha, $nm_secure_bd_banco);
    if (FALSE == $result)
    {
        die("Erro ao conectar ao banco de dados.");
    }
    else
    {
        return ($db);
    }
}

function nm_sec_recupera_apl($db, $nm_secure_tbapl, $cod_apl, $cod_grp)
{
    $select  =  "SELECT Aplicacao, Grupo, Grupos, Nivel, Bloqueada, Autentica_Tipo, Autentica_Obrig, Autentica_Banco, Timeout, Status";
    $select .= " FROM $nm_secure_tbapl";
    $select .= " WHERE Aplicacao = '$cod_apl' AND Grupo = '$cod_grp'";
    $rs_sel  = &$db->executeQuery($select);
    if (!$rs_sel)
    {
        return (FALSE);
    }
    elseif (!$rs_sel->next())
    {
        return (array());
    }
    else
    {
        $result = array(
                        "aplicacao" => $rs_sel->getCurrentValueByName('Aplicacao'),
                        "grupo"     => $rs_sel->getCurrentValueByName('Grupo'),
                        "grupos"    => $rs_sel->getCurrentValueByName('Grupos'),
                        "nivel"     => $rs_sel->getCurrentValueByName('Nivel'),
                        "bloqueada" => $rs_sel->getCurrentValueByName('Bloqueada'),
                        "aut_tipo"  => $rs_sel->getCurrentValueByName('Autentica_Tipo'),
                        "aut_obrig" => $rs_sel->getCurrentValueByName('Autentica_Obrig'),
                        "aut_banco" => $rs_sel->getCurrentValueByName('Autentica_Banco'),
                        "timeout"   => $rs_sel->getCurrentValueByName('Timeout'),
                        "status"    => $rs_sel->getCurrentValueByName('Status')
                       );
        return ($result);
    }
}

function nm_sec_recupera_usu($db, $nm_secure_tbusu, $login)
{
    $select  =  "SELECT Login, Senha, Grupos, Nivel, Bloqueado";
    $select .= " FROM $nm_secure_tbusu";
    $select .= " WHERE Login = '$login'";
    $rs_sel  = &$db->executeQuery($select);
    if (!$rs_sel)
    {
        return (FALSE);
    }
    elseif (!$rs_sel->next())
    {
        return (array());
    }
    else
    {
        $result = array(
                        "login"     => getCurrentValueByName('Login'),
                        "senha"     => getCurrentValueByName('Senha'),
                        "grupos"    => getCurrentValueByName('Grupos'),
                        "nivel"     => getCurrentValueByName('Nivel'),
                        "bloqueado" => getCurrentValueByName('Bloqueado')
                       );
        return ($result);
    }
}

function nm_sec_grupos_bloq($db, $nm_secure_tbgrp)
{
    $select  =  "SELECT Grupo";
    $select .= " FROM $nm_secure_tbgrp";
    $select .= " WHERE Bloqueado = 'S'";
    $rs_sel  = &$db->executeQuery($select);
    if (!$rs_sel)
    {
        return (FALSE);
    }
    else
    {
        $result = array();
        while ($rs_sel->next())
        {
            $result[] = $rs_sel->getCurrentValueByName('Grupo');
        }
        return ($result);
    }
}

function nm_sec_lista_dados($apl_ini)
{
    $file_data = @file($apl_ini);
    $apl_cod   = $file_data[0];
    $apl_grupo = $file_data[1];
    $apl_desc  = $file_data[2];
    return (array($apl_cod, $apl_grupo, $apl_desc));
}

function nm_sec_lista_monta($path, $array)
{
    if (@is_dir($path))
    {
        $dir = @opendir($path);
        $res = array();
        while ($file = @readdir($dir))
        {
            if (@is_dir("$path/$file") && "." != $file && ".." != $file)
            {
                $novo_dir = nm_sec_lista_monta("$path/$file", $array);
                $array    = array_merge($array, $novo_dir);
            }
            elseif ("_ini.txt" == substr($file, strlen($file) - 8))
            {
                list($apl_cod, $apl_grupo, $apl_desc) = nm_sec_lista_dados($path . "/" . $file);
                $apl_grupo = trim($apl_grupo);
                $apl_cod   = trim($apl_cod);
                if ('' != $apl_grupo && '' != $apl_cod)
                {
                    if (!isset($array[$apl_grupo]))
                    {
                        $array[$apl_grupo] = array();
                    }
                    if (!in_array($apl_cod, $array[$apl_grupo]))
                    {
                        $array[$apl_grupo][] = trim($apl_cod);
                    }
                }
            }
        }
        return ($array);
    }
    else
    {
        return ($array);
    }
}

function nm_sec_monta_login($mensagem = "Informe seu login e senha para conectar ao sistema.")
{
    global $html_cor_fundo_pagina, $html_cor_fundo_borda, $html_cor_fundo_titulo, $html_cor_fundo_lateral,
           $html_cor_fundo_coluna, $html_cor_fundo_linpar, $html_cor_texto_coluna, $html_cor_texto_normal,
           $nm_cod_apl, $nm_nome_apl, $PHP_SELF;
    $titulo_apl = ("" == $nm_nome_apl) ? $nm_cod_apl : $nm_nome_apl;
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
<FORM NAME="nm_form_login" ACTION="<?php echo $PHP_SELF; ?>" METHOD="POST">
<INPUT TYPE="hidden" NAME="nm_submit" VALUE="sim">
<TABLE BORDER="0" WIDTH="100%" HEIGHT="100%" BGCOLOR="<?php echo $html_cor_fundo_pagina; ?>"><TR><TD ALIGN="center" VALIGN="middle">
 <TABLE BORDER="0" CELLPADDING="1" CELLSPACING="1" BGCOLOR="<?php echo $html_cor_fundo_borda; ?>" WIDTH="400">
  <TR BGCOLOR="<?php echo $html_cor_fundo_titulo; ?>" ALIGN="center" VALIGN="middle" HEIGHT="35">
   <TD COLSPAN="2"><FONT FACE="Verdana, Arial, sans-serif" SIZE="3" COLOR="<?php echo $html_cor_texto_titulo; ?>"><B><?php echo $titulo_apl; ?></B></FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>" ALIGN="center" VALIGN="middle" HEIGHT="35">
   <TD COLSPAN="2"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_normal; ?>"><?php echo $mensagem; ?></FONT></TD>
  </TR>
  <TR HEIGHT="30" VALIGN="middle">
   <TD BGCOLOR="<?php echo $html_cor_fundo_lateral; ?>"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">&nbsp;<B>Usu�rio</B></FONT></TD>
   <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>">&nbsp; <INPUT TYPE="text" NAME="nm_login" SIZE="12" MAXLENGTH="8" VALUE="" CLASS="txt_valor"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_normal; ?>"> (m�ximo 8 caracteres)</FONT></TD>
  </TR>
  <TR HEIGHT="30" VALIGN="middle">
   <TD BGCOLOR="<?php echo $html_cor_fundo_lateral; ?>"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_coluna; ?>">&nbsp;<B>Senha</B></FONT></TD>
   <TD BGCOLOR="<?php echo $html_cor_fundo_linpar; ?>">&nbsp; <INPUT TYPE="password" NAME="nm_senha" SIZE="12" MAXLENGTH="12" VALUE="" CLASS="txt_valor"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_normal; ?>"> (m�ximo 12 caracteres)</FONT></TD>
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
 document.nm_form_login.nm_login.focus();
}
seta_focus();
</SCRIPT>
</BODY>
</HTML>
<?php
}

function nm_sec_monta_erro($mensagem)
{
    global $html_cor_fundo_pagina, $html_cor_fundo_borda, $html_cor_fundo_titulo, $html_cor_fundo_lateral,
           $html_cor_fundo_coluna, $html_cor_fundo_linpar, $html_cor_texto_coluna, $html_cor_texto_normal,
           $nm_cod_apl, $nm_nome_apl;
    $titulo_apl = ("" == $nm_nome_apl) ? $nm_cod_apl : $nm_nome_apl;
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
<TABLE BORDER="0" WIDTH="100%" HEIGHT="100%" BGCOLOR="<?php echo $html_cor_fundo_pagina; ?>"><TR><TD ALIGN="center" VALIGN="middle">
 <TABLE BORDER="0" CELLPADDING="1" CELLSPACING="1" BGCOLOR="<?php echo $html_cor_fundo_borda; ?>" WIDTH="400">
  <TR BGCOLOR="<?php echo $html_cor_fundo_titulo; ?>" ALIGN="center" VALIGN="middle" HEIGHT="35">
   <TD COLSPAN="2"><FONT FACE="Verdana, Arial, sans-serif" SIZE="3" COLOR="<?php echo $html_cor_texto_titulo; ?>"><B><?php echo $titulo_apl; ?></B></FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $html_cor_fundo_coluna; ?>" ALIGN="center" VALIGN="middle" HEIGHT="35">
   <TD COLSPAN="2"><FONT FACE="Tahoma, Arial, sans-serif" SIZE="2" COLOR="<?php echo $html_cor_texto_normal; ?>"><?php echo $mensagem; ?></FONT></TD>
  </TR>
 </TABLE>
</TD></TR></TABLE>
</BODY>
</HTML>
<?php
}

?>