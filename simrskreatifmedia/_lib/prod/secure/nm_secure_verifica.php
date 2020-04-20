<?php
/**
 * $Id: nm_secure_verifica.php,v 1.4 2011-11-17 17:58:18 diogo Exp $
 */

class secure
{
    var $db;
    var $ini;

    var $tbgrp;
    var $tbusu;
    var $tbapl;

    var $cod_grp;
    var $cod_apl;
    var $nome_apl;

    var $usar;

    var $delim;

    var $acesso_atu;
    var $acesso_ult;

    function __construct($grupo, $aplicacao, $dir)
    {
        $dir = str_replace('//', '/', str_replace("\\", '/', $dir));
        if ('/' == substr($dir, strlen($dir) - 1))
        {
            $dir = substr($dir, 0, strlen($dir) - 1);
        }
        if (!defined('NM_INC_PROD_INI'))
        {
            require_once($dir . "/nm_ini_lib.php");
            require_once($dir . "/nm_xml.php");
        }
        $prod_dir       = $dir;
        $prod_dir       = substr($prod_dir, 0, strrpos($prod_dir, '/'));
        $prod_dir       = substr($prod_dir, 0, strrpos($prod_dir, '/'));
        $prod_dir       = substr($prod_dir, 0, strrpos($prod_dir, '/'));
        $prod_dir      .= '/conf';
        $prod_ini_xml   = nm_xml_ini($prod_dir . "/prod.config.php", $dir);
        $nm_secure_usar = $prod_ini_xml["GLOBAL"]["SEC_USAR"];
        $temp_dir_ado   = substr($dir, 0, strrpos(str_replace("\\", "/", $dir), "/")) . "/phptxtdb/";
        if ("Y" == $nm_secure_usar)
        {
            $GLOBALS['dir_nm_phptxtdb_base'] = $temp_dir_ado;
            include($temp_dir_ado . 'txt-db-api.php');
            $db = new Database('nm_secure');
            if (FALSE == $this->db->_connectionID)
            {
                $this->usar = FALSE;
            }
            else
            {
                $this->tbgrp      = "nm_grupo";
                $this->tbusu      = "nm_usuario";
                $this->tbapl      = "nm_aplicacao";
                $this->cod_grp    = $grupo;
                $this->cod_apl    = $aplicacao;
                $this->nome_apl   = $this->cod_grp . "_____" . $this->cod_apl;
                $this->delim      = "#@#";
                $this->acesso_atu = TRUE;
                $this->acesso_ult = "";
                $this->ini        = array();
                $this->usar       = TRUE;
            }
        }
        else
        {
            $this->usar = FALSE;
        }
    }

    function usa_seguranca()
    {
        return ($this->usar);
    }

    function seta_ini_val($var, $val)
    {
        $this->ini[$var] = $val;
    }

    function verifica()
    {
        $this->atualiza_apl();
        $this->verifica_usr();
        $this->atualiza_acesso();
    }

    function atualiza_apl()
    {
		if(!isset($_SESSION))
		{
			session_start();
		}
        // Registra array de aplicacoes
        if (!isset($_SESSION["session_sec_aplicacao"]))
        {
            $_SESSION["session_sec_aplicacao"] = array();
        }
        // Aplicacao nao existente no array
        if (!in_array($this->nome_apl, array_keys($_SESSION["session_sec_aplicacao"])))
        {
            $_SESSION["session_sec_aplicacao"][$this->nome_apl] = $this->recupera_apl();
        }
        // Atualizacao obrigatoria dos valores do bd
        elseif ("S" == $_SESSION["session_sec_aplicacao"][$this->nome_apl]["aut_banco"])
        {
            $this->acesso_ult                       = (isset($_SESSION["session_sec_aplicacao"][$this->nome_apl]["acesso"])) ? $_SESSION["session_sec_aplicacao"][$this->nome_apl]["acesso"] : "";
            $_SESSION["session_sec_aplicacao"][$this->nome_apl] = $this->recupera_apl();
        }
        if ("" == $this->acesso_ult)
        {
            $this->acesso_ult = (isset($_SESSION["session_sec_aplicacao"][$this->nome_apl]["acesso"])) ? $_SESSION["session_sec_aplicacao"][$this->nome_apl]["acesso"] : "";
        }
        // Erro de acesso ao bd
        if (FALSE == $_SESSION["session_sec_aplicacao"][$this->nome_apl])
        {
            $this->acesso_atu = FALSE;
        }
        // Aplicacao nao existente no bd
        elseif (empty($_SESSION["session_sec_aplicacao"][$this->nome_apl]))
        {
            $this->acesso_atu = FALSE;
        }
    }

    function recupera_apl()
    {
        $select  =  "SELECT Aplicacao, Grupo, Grupos, Nivel, Bloqueada, Autentica_Tipo, Autentica_Obrig, Autentica_Banco, Timeout, Status";
        $select .= " FROM " . $this->tbapl;
        $select .= " WHERE Aplicacao = '" . $this->cod_apl . "' AND Grupo = '" . $this->cod_grp . "'";
        $rs_sel  = &$this->db->executeQuery($select);
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
            $rs_sel->Close();
            return ($result);
        }
    }

    function verifica_usr()
    {
        global $_SESSION['session_sec_usuario'], $HTTP_POST_VARS;
        // Aplicacao inexistente no bd de seguranca
        if (!empty($_SESSION["session_sec_aplicacao"][$this->nome_apl]))
        {
            // Aplicacao bloqueada
            if ("S" == $_SESSION["session_sec_aplicacao"][$this->nome_apl]["bloqueada"])
            {
                $this->mensagem("Esta aplicação não pode ser executada porque está bloqueada.");
                exit;
            }
            // Aplicacao com seguranca
            elseif ("0" != $_SESSION["session_sec_aplicacao"][$this->nome_apl]["aut_tipo"])
            {
                // Primeira execucao da aplicacao
                if (!isset($_SESSION["session_sec_aplicacao"][$this->nome_apl]["logged"]))
                {
                    $_SESSION["session_sec_aplicacao"][$this->nome_apl]["logged"] = "N";
                }
                // Usuario nao logado na aplicacao
                if ("S" != $_SESSION["session_sec_aplicacao"][$this->nome_apl]["logged"])
                {
                    // Usuario nao logado no sistema
                    if (!isset($_SESSION["session_sec_usuario"]))
                    {
                        $this->login("Informe o login e a senha");
                        $_SESSION["session_sec_usuario"] = 1;
                        exit;
                    }
                    // Recupera dados do usuario
                    elseif ((isset($HTTP_POST_VARS["nm_submit"])) && ("sim" == $HTTP_POST_VARS["nm_submit"]))
                    {
                        if ((!isset($HTTP_POST_VARS["nm_login"]) || "" == $HTTP_POST_VARS["nm_login"]))
                        {
                            $this->login("Informe o login.");
                            exit;
                        }
                        elseif ((!isset($HTTP_POST_VARS["nm_senha"]) || "" == $HTTP_POST_VARS["nm_senha"]))
                        {
                            $this->login("Informe a senha.", $this->unescape_string($HTTP_POST_VARS["nm_login"]), "senha");
                            exit;
                        }
                        else
                        {
                            $_SESSION[session_sec_usuario] = $this->recupera_usu($this->escape_string($HTTP_POST_VARS["nm_login"]));
                        }
                    }
                    // Autenticacao obrigatoria
                    elseif ("S" == $_SESSION["session_sec_aplicacao"][$sec_nome_aplicacao]["aut_obrig"])
                    {
                        $this->login("Informe o login e a senha");
                        exit;
                    }
                    //------------- Erro ao Recuperar Dados
                    if (FALSE === $_SESSION['session_sec_usuario'])
                    {
                        $this->login("Erro ao recuperar os dados do usuário.");
                        exit;
                    }
                    //------------- Usuario Inexistente
                    elseif (empty($_SESSION['session_sec_usuario']))
                    {
                        $this->login("Não existe no sistema nenhum usuário com este login.");
                        exit;
                    }
                    else
                    {
                        //------------- Verifica Senha
                        $db_senha   = $_SESSION['session_sec_usuario']["senha"];
                        $form_senha = $HTTP_POST_VARS["nm_senha"];
                        if (md5($form_senha) != $db_senha)
                        {
                            $this->login("Senha incorreta.");
                            exit;
                        }
                        //------------- Usuario Bloqueado
                        if ("S" == $_SESSION['session_sec_usuario']["bloqueado"])
                        {
                            $this->mensagem("Este login está bloqueado.");
                            exit;
                        }
                        //------------- Verifica Seguranca por Grupo
                        elseif ("2" == $_SESSION["session_sec_aplicacao"][$this->nome_apl]["aut_tipo"])
                        {
                            $sec_apl_grupos = explode($this->delim, $_SESSION["session_sec_aplicacao"][$this->nome_apl]["grupos"]);
                            $sec_usu_grupos = explode($this->delim, $_SESSION['session_sec_usuario']["grupos"]);
                            $sec_grp_inter  = array_intersect($sec_apl_grupos, $sec_usu_grupos);
                            $sec_grp_bloq   = $this->grupos_bloq();
                            $sec_grp_result = array_diff($sec_grp_inter, $sec_grp_bloq);
                            if (sizeof($sec_grp_result) < 1)
                            {
                                $this->login("Seu grupo não tem permissão para executar esta aplicação.");
                                exit;
                            }
                        }
                        //------------- Verifica Seguranca por Nivel
                        elseif ("3" == $_SESSION["session_sec_aplicacao"][$this->nome_apl]["aut_tipo"])
                        {
                            if ($_SESSION['session_sec_usuario']["nivel"] < $_SESSION["session_sec_aplicacao"][$this->nome_apl]["nivel"])
                            {
                                $this->login("Seu nível não permite executar esta aplicação.");
                                exit;
                            }
                        }
                        else
                        {
                            $_SESSION["session_sec_aplicacao"][$this->nome_apl]["logged"] = "S";
                        }
                    }
                }
            }
        }
    }

    function recupera_usu($login)
    {
        $select  =  "SELECT Login, Senha, Grupos, Nivel, Bloqueado";
        $select .= " FROM " . $this->tbusu;
        $select .= " WHERE Login = '$login'";
        $rs_sel  = &$this->db->executeQuery($select);
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
                            "login"     => $rs_sel->getCurrentValueByName('Login'),
                            "senha"     => $rs_sel->getCurrentValueByName('Senha'),
                            "grupos"    => $rs_sel->getCurrentValueByName('Grupos'),
                            "nivel"     => $rs_sel->getCurrentValueByName('Nivel'),
                            "bloqueado" => $rs_sel->getCurrentValueByName('Bloqueado')
                           );
            return ($result);
        }
    }

    function grupos_bloq()
    {
        $select  =  "SELECT Grupo";
        $select .= " FROM " . $this->tbgrp;
        $select .= " WHERE Bloqueado = 'S'";
        $rs_sel  = &$this->db->executeQuery($select);
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

    function atualiza_acesso()
    {
        if ($this->acesso_atu)
        {
            $sec_acesso = $this->time();
            if ("" == $this->acesso_ult)
            {
               $_SESSION["session_sec_aplicacao"][$this->nome_apl]["acesso"] = $sec_acesso;
            }
            else
            {
                if (0 < $_SESSION["session_sec_aplicacao"][$this->nome_apl]["timeout"])
                {
                    $sec_tempo = $sec_acesso - $this->acesso_ult;
                    if ($sec_tempo > $_SESSION["session_sec_aplicacao"][$this->nome_apl]["timeout"])
                    {
                        $this->login("Você excedeu o limite de tempo inativo.");
                        unset($_SESSION["session_sec_aplicacao"][$this->nome_apl]["acesso"]);
                        exit;
                    }
                }
                else
                {
                    $_SESSION["session_sec_aplicacao"][$this->nome_apl]["acesso"] = $sec_acesso;
                }
            }
        }
    }

    function mensagem($mensagem)
    {
        $ini = $this->ini;
?>
<HTML>
<HEAD>
 <TITLE>NetMake :: ScriptCase</TITLE>
 <STYLE TYPE="text/css">
 <!--
 .txt_valor { font-family: Tahoma, Arial, sans-serif; font-size: 12px; color: #000000}
 -->
 </STYLE>
</HEAD>
<BODY MARGINWIDTH="0" MARGINHEIGHT="0" LEFTMARGIN="0" TOPMARGIN="0" BGCOLOR="<?php echo $ini["cor_bg_grid"]; ?>">
<TABLE BORDER="0" WIDTH="100%" HEIGHT="100%"><TR><TD ALIGN="center" VALIGN="middle">
 <TABLE BORDER="<?php echo $ini["border_grid"]; ?>" CELLPADDING="1" CELLSPACING="1" <?php if ("" != $ini["cor_bg_table"]) { echo "bgcolor=\"" . $ini["cor_bg_table"] . "\""; } ?> <?php if ("" != $ini["cor_borda"]) { echo "bordercolor=\"" . $ini["cor_borda"] . "\""; } ?> WIDTH="250">
  <TR BGCOLOR="<?php echo $ini["cor_titulo"]; ?>" ALIGN="center" VALIGN="middle" HEIGHT="35">
   <TD><FONT FACE="<?php echo $ini["titulo_fonte_tipo"]; ?>" SIZE="<?php echo $ini["titulo_fonte_tamanho"]; ?>" COLOR="<?php echo $ini["cor_txt_titulo"]; ?>"><B><?php echo $this->cod_apl; ?></B></FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $ini["cor_grid_impar"]; ?>" ALIGN="center" VALIGN="middle" HEIGHT="35">
   <TD><FONT FACE="<?php echo $ini["texto_fonte_tipo"]; ?>" SIZE="<?php echo $ini["texto_fonte_tamanho"]; ?>" COLOR="<?php echo $ini["cor_txt_grid"]; ?>"><?php echo $mensagem; ?></FONT></TD>
  </TR>
 </TABLE>
</TD></TR></TABLE>
</BODY>
</HTML>
<?php
    }

    function login($mensagem, $login = "", $focus = "login")
    {
        global $PHP_SELF;
        $ini = $this->ini;
?>
<HTML>
<HEAD>
 <TITLE>NetMake :: ScriptCase</TITLE>
 <STYLE TYPE="text/css">
 <!--
 .txt_valor { font-family: Tahoma, Arial, sans-serif; font-size: 12px; color: #000000}
 -->
 </STYLE>
</HEAD>
<BODY MARGINWIDTH="0" MARGINHEIGHT="0" LEFTMARGIN="0" TOPMARGIN="0" BGCOLOR="<?php echo $ini["cor_bg_grid"]; ?>">
<FORM NAME="nm_form_login" ACTION="<?php echo $PHP_SELF; ?>" METHOD="POST">
<INPUT TYPE="hidden" NAME="nm_submit" VALUE="sim">
<TABLE BORDER="0" WIDTH="100%" HEIGHT="100%"><TR><TD ALIGN="center" VALIGN="middle">
 <TABLE BORDER="<?php echo $ini["border_grid"]; ?>" CELLPADDING="1" CELLSPACING="1" <?php if ("" != $ini["cor_bg_table"]) { echo "bgcolor=\"" . $ini["cor_bg_table"] . "\""; } ?> <?php if ("" != $ini["cor_borda"]) { echo "bordercolor=\"" . $ini["cor_borda"] . "\""; } ?> WIDTH="250">
  <TR BGCOLOR="<?php echo $ini["cor_titulo"]; ?>" ALIGN="center" VALIGN="middle" HEIGHT="35">
   <TD COLSPAN="2"><FONT FACE="<?php echo $ini["titulo_fonte_tipo"]; ?>" SIZE="<?php echo $ini["titulo_fonte_tamanho"]; ?>" COLOR="<?php echo $ini["cor_txt_titulo"]; ?>"><B><?php echo $this->cod_apl; ?></B></FONT></TD>
  </TR>
  <TR BGCOLOR="<?php echo $ini["cor_lin_grupo"]; ?>" ALIGN="center" VALIGN="middle" HEIGHT="35">
   <TD COLSPAN="2"><FONT FACE="<?php echo $ini["grupo_fonte_tipo"]; ?>" SIZE="<?php echo $ini["grupo_fonte_tamanho"]; ?>" COLOR="<?php echo $ini["cor_txt_grupo"]; ?>"><B><?php echo $mensagem; ?></B></FONT></TD>
  </TR>
  <TR HEIGHT="30" VALIGN="middle">
   <TD BGCOLOR="<?php echo $ini["cor_grid_impar"]; ?>"><FONT FACE="<?php echo $ini["texto_fonte_tipo"]; ?>" SIZE="<?php echo $ini["texto_fonte_tamanho"]; ?>" COLOR="<?php echo $ini["cor_txt_grid"]; ?>">&nbsp;<B>Usuário</B></FONT></TD>
   <TD BGCOLOR="<?php echo $ini["cor_grid_par"]; ?>">&nbsp; <INPUT TYPE="text" NAME="nm_login" SIZE="12" MAXLENGTH="8" VALUE="<?php echo $login; ?>" CLASS="txt_valor"></TD>
  </TR>
  <TR HEIGHT="30" VALIGN="middle">
   <TD BGCOLOR="<?php echo $ini["cor_grid_impar"]; ?>"><FONT FACE="<?php echo $ini["texto_fonte_tipo"]; ?>" SIZE="<?php echo $ini["texto_fonte_tamanho"]; ?>" COLOR="<?php echo $ini["cor_txt_grid"]; ?>">&nbsp;<B>Senha</B></FONT></TD>
   <TD BGCOLOR="<?php echo $ini["cor_grid_par"]; ?>">&nbsp; <INPUT TYPE="password" NAME="nm_senha" SIZE="12" MAXLENGTH="12" VALUE="" CLASS="txt_valor"></TD>
  </TR>
  <TR BGCOLOR="<?php echo $ini["cor_lin_grupo"]; ?>" ALIGN="center" VALIGN="middle" HEIGHT="35">
   <TD COLSPAN="2"><INPUT TYPE="submit" NAME="b1" VALUE="Processar" CLASS="txt_valor"></TD>
  </TR>
 </TABLE>
</TD></TR></TABLE>
</FORM>
<SCRIPT LANGUAGE="Javascript">
function seta_focus()
{
 document.nm_form_login.nm_<?php echo $focus; ?>.focus();
}
seta_focus();
</SCRIPT>
</BODY>
</HTML>
<?php
    }

    function escape_string($string, $origem = 'gpc')
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

    function unescape_string($string, $origem = 'gpc')
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

    function time()
    {
        $mtime = microtime();
        $mtime = explode(" ", $mtime);
        $mtime = $mtime[1] + $mtime[0];
        return(floor($mtime));
    }
}

$secure_test = new secure($this->nm_grupo, $this->nm_cod_apl, $this->path_libs);

if ($secure_test->usar)
{
    $secure_test->seta_ini_val("border_grid",           $this->border_grid);
    $secure_test->seta_ini_val("cor_bg_grid",           $this->cor_bg_grid);
    $secure_test->seta_ini_val("cor_bg_table",          $this->cor_bg_table);
    $secure_test->seta_ini_val("cor_borda",             $this->cor_borda);
    $secure_test->seta_ini_val("cor_cab_grid",          $this->cor_cab_grid);
    $secure_test->seta_ini_val("cor_txt_pag",           $this->cor_txt_pag);
    $secure_test->seta_ini_val("cor_link_pag",          $this->cor_link_pag);
    $secure_test->seta_ini_val("pag_fonte_tipo",        $this->pag_fonte_tipo);
    $secure_test->seta_ini_val("pag_fonte_tamanho",     $this->pag_fonte_tamanho);
    $secure_test->seta_ini_val("cor_txt_cab_grid",      $this->cor_txt_cab_grid);
    $secure_test->seta_ini_val("cab_fonte_tipo",        $this->cab_fonte_tipo);
    $secure_test->seta_ini_val("cab_fonte_tamanho",     $this->cab_fonte_tamanho);
    $secure_test->seta_ini_val("cor_barra_nav",         $this->cor_barra_nav);
    $secure_test->seta_ini_val("cor_titulo",            $this->cor_titulo);
    $secure_test->seta_ini_val("cor_txt_titulo",        $this->cor_txt_titulo);
    $secure_test->seta_ini_val("titulo_fonte_tipo",     $this->titulo_fonte_tipo);
    $secure_test->seta_ini_val("titulo_fonte_tamanho",  $this->titulo_fonte_tamanho);
    $secure_test->seta_ini_val("cor_grid_impar",        $this->cor_grid_impar);
    $secure_test->seta_ini_val("cor_grid_par",          $this->cor_grid_par);
    $secure_test->seta_ini_val("cor_txt_grid",          $this->cor_txt_grid);
    $secure_test->seta_ini_val("texto_fonte_tipo",      $this->texto_fonte_tipo);
    $secure_test->seta_ini_val("texto_fonte_tamanho",   $this->texto_fonte_tamanho);
    $secure_test->seta_ini_val("cor_lin_grupo",         $this->cor_lin_grupo);
    $secure_test->seta_ini_val("cor_txt_grupo",         $this->cor_txt_grupo);
    $secure_test->seta_ini_val("grupo_fonte_tipo",      $this->grupo_fonte_tipo);
    $secure_test->seta_ini_val("grupo_fonte_tamanho",   $this->grupo_fonte_tamanho);
    $secure_test->seta_ini_val("cor_lin_sub_tot",       $this->cor_lin_sub_tot);
    $secure_test->seta_ini_val("cor_txt_sub_tot",       $this->cor_txt_sub_tot);
    $secure_test->seta_ini_val("sub_tot_fonte_tipo",    $this->sub_tot_fonte_tipo);
    $secure_test->seta_ini_val("sub_tot_fonte_tamanho", $this->sub_tot_fonte_tamanho);
    $secure_test->seta_ini_val("cor_lin_tot",           $this->cor_lin_tot);
    $secure_test->seta_ini_val("cor_txt_tot",           $this->cor_txt_tot);
    $secure_test->seta_ini_val("tot_fonte_tipo",        $this->tot_fonte_tipo);
    $secure_test->seta_ini_val("tot_fonte_tamanho",     $this->tot_fonte_tamanho);
    $secure_test->seta_ini_val("cor_link_cab",          $this->cor_link_cab);
    $secure_test->seta_ini_val("cor_link_dados",        $this->cor_link_dados);
    $secure_test->seta_ini_val("img_fun_pag",           $this->img_fun_pag);
    $secure_test->seta_ini_val("img_fun_cab",           $this->img_fun_cab);
    $secure_test->seta_ini_val("img_fun_tit",           $this->img_fun_tit);
    $secure_test->seta_ini_val("img_fun_gru",           $this->img_fun_gru);
    $secure_test->seta_ini_val("img_fun_tot",           $this->img_fun_tot);
    $secure_test->seta_ini_val("img_fun_sub",           $this->img_fun_sub);
    $secure_test->seta_ini_val("img_fun_imp",           $this->img_fun_imp);
    $secure_test->seta_ini_val("img_fun_par",           $this->img_fun_par);
    $secure_test->verifica();
}

?>
