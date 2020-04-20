<?php

include_once('dashboard_ranap_session.php');
@session_start();

$_SESSION['scriptcase']['dashboard_ranap']['glo_nm_perfil']          = "conn_mysql";
$_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_prod']       = "";
$_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_imagens']    = "";
$_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_imag_temp']  = "";
$_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_doc']        = "";
//check publication with the prod
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $str_path_sys = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $str_path_sys = str_replace("\\", '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
    $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$str_path_apl_url = $_SERVER['PHP_SELF'];
$str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
$str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
$str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
$str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
$str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
//check prod
if(empty($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_prod']))
{
    /*check prod*/$_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
}
//check img
if(empty($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_imagens']))
{
    /*check img*/$_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
}
//check tmp
if(empty($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_imag_temp']))
{
    /*check tmp*/$_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
}
//check doc
if(empty($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_doc']))
{
    /*check doc*/$_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
}
//end check publication with the prod
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('simrskreatifmedia');
if (!function_exists("NM_is_utf8"))
{
    include_once("../_lib/lib/php/nm_utf8.php");
}

$Sc_lig_md5 = false;
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
if (!isset($_SERVER['HTTP_REFERER']) || (!isset($_POST['nmgp_opcao']) && !isset($_POST['script_case_init']) && !isset($_POST['script_case_session']) && !isset($_POST['nmgp_start']) && !isset($_GET['nmgp_opcao']) && !isset($_GET['script_case_init']) && !isset($_GET['script_case_session']) && !isset($_GET['nmgp_start'])))
{
    $Sem_Session = false;
}
if (!empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
        if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
        {
            $nmgp_var = substr($nmgp_var, 11);
            $nmgp_val = $_SESSION[$nmgp_val];
        }
        if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
        {
            $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
            if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
            {
                $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                $Sc_lig_md5 = true;
            }
            else
            {
                $_SESSION['sc_session']['SC_parm_violation'] = true;
            }
        }
        if (isset($sc_conv_var[$nmgp_var]))
        {
            $nmgp_var = $sc_conv_var[$nmgp_var];
        }
        elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
        {
            $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
        }
        nm_limpa_str_dashboard_ranap($nmgp_val);
        $nmgp_val = NM_decode_input($nmgp_val);
        $$nmgp_var = $nmgp_val;
    }
}
if (!empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
        if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
        {
            $nmgp_var = substr($nmgp_var, 11);
            $nmgp_val = $_SESSION[$nmgp_val];
        }
        if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
        {
            $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
            if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
            {
                $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                $Sc_lig_md5 = true;
            }
            else
            {
                $_SESSION['sc_session']['SC_parm_violation'] = true;
            }
        }
        if (isset($sc_conv_var[$nmgp_var]))
        {
            $nmgp_var = $sc_conv_var[$nmgp_var];
        }
        elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
        {
            $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
        }
        nm_limpa_str_dashboard_ranap($nmgp_val);
        $nmgp_val = NM_decode_input($nmgp_val);
        $$nmgp_var = $nmgp_val;
    }
}
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual)) {
    $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $str_path_sys  = str_replace("\\", '/', $str_path_sys);
}
else {
    $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
    $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$str_path_web    = $_SERVER['PHP_SELF'];
$str_path_web    = str_replace("\\", '/', $str_path_web);
$str_path_web    = str_replace('//', '/', $str_path_web);
$path_aplicacao  = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_aplicacao  = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/'));
$root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
if ($Sem_Session && (!isset($nmgp_start) || $nmgp_start != "SC")) {
    if (isset($_COOKIE['sc_apl_default_simrskreatifmedia'])) {
        $apl_def = explode(",", $_COOKIE['sc_apl_default_simrskreatifmedia']);
    }
    elseif (is_file($root . $_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_imag_temp'] . "/sc_apl_default_simrskreatifmedia.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_imag_temp'] . "/sc_apl_default_simrskreatifmedia.txt"));
    }
    if (isset($apl_def)) {
        if ($apl_def[0] != "dashboard_ranap") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['dashboard_ranap']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['dashboard_ranap']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['dashboard_ranap']['session_timeout']['redir_tp'] = $Redir_tp;
        }
        if (isset($_COOKIE['sc_actual_lang_simrskreatifmedia'])) {
            $_SESSION['scriptcase']['dashboard_ranap']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_simrskreatifmedia'];
        }
    }
}
if (isset($nmgp_parms) && !empty($nmgp_parms) && !is_array($nmgp_parms))
{
    if (isset($_SESSION['nm_aba_bg_color']))
    {
        unset($_SESSION['nm_aba_bg_color']);
    }  
    $nmgp_parms = NM_decode_input($nmgp_parms);
    $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
    $todo  = explode("?@?", $todox);
    $ix = 0;
    while (!empty($todo[$ix]))
    {
       $cadapar = explode("?#?", $todo[$ix]);
       if (1 < sizeof($cadapar))
       {
           if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
           {
               $cadapar[0] = substr($cadapar[0], 11);
               $cadapar[1] = $_SESSION[$cadapar[1]];
           }
           nm_limpa_str_dashboard_ranap($cadapar[1]);
           if (isset($sc_conv_var[$cadapar[0]]))
           {
               $cadapar[0] = $sc_conv_var[$cadapar[0]];
           }
           elseif (isset($sc_conv_var[strtolower($cadapar[0])]))
           {
               $cadapar[0] = $sc_conv_var[strtolower($cadapar[0])];
           }
           if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
           $Tmp_par   = $cadapar[0];
           $$Tmp_par = $cadapar[1];
       }
       $ix++;
    }
}
elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['dashboard_ranap']['parms']))
{
    if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
    {
        $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['dashboard_ranap']['parms']);
        $todo  = explode("?@?", $todox);
        $ix = 0;
        while (!empty($todo[$ix]))
        {
           $cadapar = explode("?#?", $todo[$ix]);
           if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
           {
               $cadapar[0] = substr($cadapar[0], 11);
               $cadapar[1] = $_SESSION[$cadapar[1]];
           }
           if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
           $Tmp_par   = $cadapar[0];
           $$Tmp_par = $cadapar[1];
           $ix++;
        }
    }
}
if ((isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang") || (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "force_lang"))
{
    if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'])
    {
        $nmgp_opcao  = $_POST['nmgp_opcao'];
        $nmgp_idioma = $_POST['nmgp_idioma'];
    }
    else
    {
        $nmgp_opcao  = $_GET['nmgp_opcao'];
        $nmgp_idioma = $_GET['nmgp_idioma'];
    }
    $Temp_lang = explode(";" , $nmgp_idioma);
    if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))
    {
        $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
    }
    if (isset($Temp_lang[1]) && !empty($Temp_lang[1]))
    {
        $_SESSION['scriptcase']['str_conf_reg']        = $Temp_lang[1];
    }
}

$dashboard_ranap_control = new dashboard_ranap_control();
$dashboard_ranap_control->control();

class dashboard_ranap_ini {

    var $nm_cod_apl;
    var $nm_nome_apl;
    var $nm_seguranca;
    var $nm_grupo;
    var $nm_grupo_versao;
    var $nm_autor;
    var $nm_versao_sc;
    var $nm_tp_lic_sc;
    var $nm_dt_criacao;
    var $nm_hr_criacao;
    var $nm_autor_alt;
    var $nm_dt_ult_alt;
    var $nm_hr_ult_alt;
    var $nm_timestamp;
    var $sc_site_ssl;
    var $sc_protocolo;
    var $path_prod;
    var $path_imagens;
    var $path_imag_temp;
    var $path_doc;
    var $server;
    var $root;
    var $path_aplicacao;
    var $path_embutida;
    var $path_link;
    var $path_libs;
    var $path_help;
    var $path_lang;
    var $path_lang_js;
    var $path_botoes;
    var $path_img_global;
    var $path_img_modelo;
    var $path_icones;
    var $path_imag_cab;
    var $path_adodb;
    var $url_lib;
    var $url_third;
    var $sc_page;
    var $str_lang;
    var $str_conf_reg;
    var $Nm_lang;
    var $Nm_lang_conf_region;
    var $display_as_mobile;
    var $force_db_utf8 = false;

    function init()
    {
        @ini_set('magic_quotes_runtime', 0);

        $this->sc_page = rand(2, 10000);
        if(isset($_POST['script_case_init']))
        {
            $this->sc_page = filter_input(INPUT_POST, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
        }
        elseif(isset($_GET['script_case_init']))
        {
            $this->sc_page = filter_input(INPUT_GET, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
        }
        $_SESSION['scriptcase']['sc_num_page'] = $this->sc_page;
        if (!isset($_SESSION['sc_session'][$this->sc_page]['dashboard_ranap'])) {
            $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap'] = array();
        }
        if (!isset($_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['embutida_form'])) {
            $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['embutida_form'] = false;
        }
        if (!isset($_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['embutida_proc'])) {
            $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['embutida_proc'] = false;
        }
        if (!isset($_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['iframe_menu'])) {
            $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['iframe_menu'] = false;
        }

        $this->nm_cod_apl      = "dashboard_ranap";
        $this->nm_nome_apl     = "";
        $this->nm_seguranca    = "";
        $this->nm_grupo        = "simrskreatifmedia";
        $this->nm_grupo_versao = "1";
        $this->nm_autor        = "admin";
        $this->nm_versao_sc    = "v9";
        $this->nm_tp_lic_sc    = "ep_bronze";
        $this->nm_dt_criacao   = "20180222";
        $this->nm_hr_criacao   = "075929";
        $this->nm_autor_alt    = "admin";
        $this->nm_dt_ult_alt   = "20190818";
        $this->nm_hr_ult_alt   = "221112";
        list($NM_usec, $NM_sec) = explode(" ", microtime());
        $this->nm_timestamp  = (float) $NM_sec;

        $NM_dir_atual = getcwd();
        if (empty($NM_dir_atual))
        {
            $str_path_sys = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
            $str_path_sys = str_replace("\\", '/', $str_path_sys);
        }
        else
        {
            $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
            $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
        }

        //check publication with the prod
        $str_path_apl_url = $_SERVER['PHP_SELF'];
        $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
        $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
        $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
        $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
        $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);

        $this->sc_site_ssl    = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
        $this->sc_protocolo   = ($this->sc_site_ssl) ? 'https://' : 'http://';
        $this->sc_protocolo   = "";
        $this->path_prod      = $_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_prod'];
        $this->path_imagens   = $_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_imagens'];
        $this->path_imag_temp = $_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_imag_temp'];
        $this->path_doc       = $_SESSION['scriptcase']['dashboard_ranap']['glo_nm_path_doc'];

        $this->server = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
        if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
        {
            $this->server .= ":" . $_SERVER['SERVER_PORT'];
        }
        $this->server = "";

        $str_path_web          = $_SERVER['PHP_SELF'];
        $str_path_web          = str_replace("\\", '/', $str_path_web);
        $str_path_web          = str_replace('//', '/', $str_path_web);
        $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
        $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
        $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/dashboard_ranap';
        $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
        $this->path_aplicacao .= '/';
        $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
        $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
        $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
        $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php/";
        $this->url_lib_js      = $this->path_link . "_lib/lib/js/";
        $this->path_help       = $this->path_link . "_lib/webhelp/";
        $this->path_lang       = "../_lib/lang/";
        $this->path_lang_js    = "../_lib/js/";
        $this->path_botoes     = $this->path_link . "_lib/img";
        $this->path_img_global = $this->path_link . "_lib/img";
        $this->path_img_modelo = $this->path_link . "_lib/img";
        $this->path_icones     = $this->path_link . "_lib/img";
        $this->path_imag_cab   = $this->path_link . "_lib/img";
        $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";

        $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
        $this->url_lib   = $this->path_link . '/_lib/';
        $this->url_third = $this->path_prod . '/third/';

        $this->str_lang     = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "id";
        $this->str_conf_reg = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "id_id";
        $this->sc_charset['UTF-8'] = 'utf-8';
        $this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
        $this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
        $this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
        $this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
        $this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
        $this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
        $this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
        $this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
        $this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
        $this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
        $this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
        $this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
        $this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
        $this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
        $this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
        $this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
        $this->sc_charset['WINDOWS-1250'] = 'windows-1250';
        $this->sc_charset['WINDOWS-1251'] = 'windows-1251';
        $this->sc_charset['WINDOWS-1252'] = 'windows-1252';
        $this->sc_charset['TIS-620'] = 'tis-620';
        $this->sc_charset['WINDOWS-1253'] = 'windows-1253';
        $this->sc_charset['WINDOWS-1254'] = 'windows-1254';
        $this->sc_charset['WINDOWS-1255'] = 'windows-1255';
        $this->sc_charset['WINDOWS-1256'] = 'windows-1256';
        $this->sc_charset['WINDOWS-1257'] = 'windows-1257';
        $this->sc_charset['KOI8-R'] = 'koi8-r';
        $this->sc_charset['BIG-5'] = 'big5';
        $this->sc_charset['EUC-CN'] = 'EUC-CN';
        $this->sc_charset['GB18030'] = 'GB18030';
        $this->sc_charset['GB2312'] = 'gb2312';
        $this->sc_charset['EUC-JP'] = 'euc-jp';
        $this->sc_charset['SJIS'] = 'shift-jis';
        $this->sc_charset['EUC-KR'] = 'euc-kr';

        if (isset($_SESSION['scriptcase']['dashboard_ranap']['session_timeout']['lang'])) {
            $this->str_lang = $_SESSION['scriptcase']['dashboard_ranap']['session_timeout']['lang'];
        }
        elseif (!isset($_SESSION['scriptcase']['dashboard_ranap']['actual_lang']) || $_SESSION['scriptcase']['dashboard_ranap']['actual_lang'] != $this->str_lang) {
            $_SESSION['scriptcase']['dashboard_ranap']['actual_lang'] = $this->str_lang;
            setcookie('sc_actual_lang_simrskreatifmedia',$this->str_lang,'0','/');
        }
        include($this->path_lang . $this->str_lang . ".lang.php");
        include($this->path_lang . "config_region.php");
        include($this->path_lang . "lang_config_region.php");

        $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data");
        $this->nm_data = new nm_data($this->str_lang);

        $_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "";
        ini_set('default_charset', $_SESSION['scriptcase']['charset']);
        $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
        asort($this->Nm_lang_conf_region);
        foreach ($this->Nm_lang_conf_region as $ind => $dados)
        {
           if (isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
           {
               $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
           }
        }

        foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
        {
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && $this->isUtf8($dados))
            {
                $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
            }
        }
        foreach ($this->Nm_lang as $ind => $dados)
        {
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && $this->isUtf8($ind))
            {
                $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
                $this->Nm_lang[$ind] = $dados;
            }
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && $this->isUtf8($dados))
            {
                $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
            }
        }
        $_SESSION['scriptcase']['reg_conf']['html_dir'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'])) ? " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
        if (isset($_SESSION['scriptcase']['dashboard_ranap']['session_timeout']['redir'])) {
            $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">';
            $SS_cod_html .= "<HTML>\r\n";
            $SS_cod_html .= " <HEAD>\r\n";
            $SS_cod_html .= "  <TITLE></TITLE>\r\n";
            $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
            if ($_SESSION['scriptcase']['proc_mobile']) {
                $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
            }
            $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
            $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
            if ($_SESSION['scriptcase']['dashboard_ranap']['session_timeout']['redir_tp'] == "R") {
                $SS_cod_html .= "  </HEAD>\r\n";
                $SS_cod_html .= "   <body>\r\n";
            }
            else {
                $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
                $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
                $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
                $SS_cod_html .= "           target=\"_self\">\r\n";
                $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['dashboard_ranap']['session_timeout']['redir'] . "');\">\r\n";
                $SS_cod_html .= "     </form>\r\n";
                $SS_cod_html .= "    </td></tr></table>\r\n";
                $SS_cod_html .= "    </div></td></tr></table>\r\n";
            }
            $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
            if ($_SESSION['scriptcase']['dashboard_ranap']['session_timeout']['redir_tp'] == "R") {
                $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['dashboard_ranap']['session_timeout']['redir'] . "');\r\n";
            }
            $SS_cod_html .= "      function sc_session_redir(url_redir)\r\n";
            $SS_cod_html .= "      {\r\n";
            $SS_cod_html .= "         if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n";
            $SS_cod_html .= "         {\r\n";
            $SS_cod_html .= "            window.parent.sc_session_redir(url_redir);\r\n";
            $SS_cod_html .= "         }\r\n";
            $SS_cod_html .= "         else\r\n";
            $SS_cod_html .= "         {\r\n";
            $SS_cod_html .= "             if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n";
            $SS_cod_html .= "             {\r\n";
            $SS_cod_html .= "                 window.close();\r\n";
            $SS_cod_html .= "                 window.opener.sc_session_redir(url_redir);\r\n";
            $SS_cod_html .= "             }\r\n";
            $SS_cod_html .= "             else\r\n";
            $SS_cod_html .= "             {\r\n";
            $SS_cod_html .= "                 window.location = url_redir;\r\n";
            $SS_cod_html .= "             }\r\n";
            $SS_cod_html .= "         }\r\n";
            $SS_cod_html .= "      }\r\n";
            $SS_cod_html .= "    </script>\r\n";
            $SS_cod_html .= " </body>\r\n";
            $SS_cod_html .= "</HTML>\r\n";
            unset($_SESSION['scriptcase']['dashboard_ranap']['session_timeout']);
            unset($_SESSION['sc_session']);
        }
        if (isset($SS_cod_html))
        {
            echo $SS_cod_html;
            exit;
        }
        if (isset($_SESSION['sc_session']['SC_parm_violation']))
        {
            unset($_SESSION['sc_session']['SC_parm_violation']);
            echo "<html>";
            echo "<body>";
            echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
            echo "<tr>";
            echo "   <td align=\"center\">";
            echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
            echo "   </b></td>";
            echo " </tr>";
            echo "</table>";
            echo "</body>";
            echo "</html>";
            exit;
        }

        if (!function_exists("mb_convert_encoding"))
        {
            echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
        }
        elseif (!function_exists("sc_convert_encoding"))
        {
            echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
        }
        $PHP_ver = str_replace(".", "", phpversion());
        if (substr($PHP_ver, 0, 3) < 434)
        {
            echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
        }

        if (file_exists($this->path_libs . "/ver.dat"))
        {
            $SC_ver = file($this->path_libs . "/ver.dat");
            $SC_ver = str_replace(".", "", $SC_ver[0]);
            if (substr($SC_ver, 0, 5) < 40015)
            {
                echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
            }
        }

        $this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "sc_arafiq/sc_arafiq";
        include("../_lib/css/" . $this->str_schema_all . "_form.php");
        $this->Str_btn_form = trim($str_button);

        $this->regionalDefault();
        $this->loadFieldConfig();
        include_once($this->path_adodb . "/adodb.inc.php");
        $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod");
        $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib");
        perfil_lib($this->path_libs);
        if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
        {
            if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
            $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
        }
        $this->nm_bases_access     = array("access", "ado_access", "ace_access");
        $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6");
        $this->nm_bases_ibase      = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
        $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
        $this->nm_bases_mssql      = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib");
        $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql");
        $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql");
        $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle");
        $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
        $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
        $this->nm_bases_vfp        = array("vfp");
        $this->nm_bases_odbc       = array("odbc");
        $this->nm_bases_progress   = array("progress");
        $this->prep_conect();
        $this->conectDB();
    } // init
   function prep_conect()
   {
      $con_devel             =  (isset($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao']) && $_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_perfil']) && $_SESSION['scriptcase']['dashboard_ranap']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['dashboard_ranap']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['dashboard_ranap']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['dashboard_ranap']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'simrskreatifmedia', 2, $this->force_db_utf8); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['dashboard_ranap']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S");
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
// 
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
      {
          $this->nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
      {
          $this->nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
      {
          $this->nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
      {
          $this->nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
      $this->nm_arr_db_extra_args = array(); 
      if (isset($_SESSION['scriptcase']['glo_use_ssl']))
      {
          $this->nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
      }
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
      {
          $this->date_delim  = "#";
          $this->date_delim1 = "#";
      }
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['SC_sep_date1'];
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['sc_outra_jan'] != 'dashboard_ranap')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <a id="sai" href="javascript: window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''"></a>

<?php
              } 
              else 
              { 
?>
                  <a id="sai" href="javascript: window.location='<?php echo $nm_url_saida ?>'" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''"></a>

<?php
              } 
          } 
          exit ;
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
  } 
// 
  function conectDB()
  {
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao'], $this->root . $this->path_prod, 'simrskreatifmedia', 1, $this->force_db_utf8); 
      } 
      else 
      { 
         if (!isset($this->nm_con_persistente))
         {
            $this->nm_con_persistente = 'N';
         }
         if (!isset($this->nm_con_db2))
         {
            $this->nm_con_db2 = '';
         }
         if (!isset($this->nm_database_encoding))
         {
            $this->nm_database_encoding = '';
         }
         if ($this->force_db_utf8)
         {
            $this->nm_database_encoding = 'utf8';
         }
         if (!isset($this->nm_arr_db_extra_args))
         {
            $this->nm_arr_db_extra_args = array();
         }
         $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding, $this->nm_arr_db_extra_args); 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
          $this->Db->Execute("set dateformat ymd");
          $this->Db->Execute("set quoted_identifier ON");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2))
      {
          $this->Db->fetchMode = ADODB_FETCH_NUM;
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
          $_SESSION['sc_session'][$this->sc_page]['dashboard_ranap']['decimal_db'] = "."; 
      } 
  }

  function setConnectionHash() {
    if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao'])) {
      list($connectionDbms, $connectionHost, $connectionUser, $connectionPassword, $connectionDatabase) = db_conect_devel($_SESSION['scriptcase']['dashboard_ranap']['glo_nm_conexao'], $this->root . $this->path_prod, 'simrskreatifmedia', 1, $this->force_db_utf8);
    }
    else {
      $connectionDbms     = $this->nm_tpbanco;
      $connectionHost     = $this->nm_servidor;
      $connectionUser     = $this->nm_usuario;
      $connectionPassword = $this->nm_senha;
      $connectionDatabase = $this->nm_banco;
    }

    $this->connectionHash = "{$connectionDbms}_SC_" . md5("{$connectionHost}_SC_{$connectionUser}_SC_{$connectionPassword}_SC_{$connectionDatabase}");
  } // setConnectionHash

    function sc_Include($path, $tp, $name)
    {
        if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
        {
             include_once($path);
        }
    } // sc_Include
    function isUtf8($sStr)
    {
        $c=0; $b=0;
        $bits=0;
        $len=strlen($sStr);
        for($i=0; $i<$len; $i++){
            $c=ord($sStr[$i]);
            if($c > 128){
                if(($c >= 254)) return false;
                elseif($c >= 252) $bits=6;
                elseif($c >= 248) $bits=5;
                elseif($c >= 240) $bits=4;
                elseif($c >= 224) $bits=3;
                elseif($c >= 192) $bits=2;
                else return false;
                if(($i+$bits) > $len) return false;
                while($bits > 1){
                    $i++;
                    $b=ord($sStr[$i]);
                    if($b < 128 || $b > 191) return false;
                    $bits--;
                }
            }
        }
        return true;
    } // isUtf8
    function regionalDefault($sConfReg = '')
    {
        if ('' == $sConfReg)
        {
            $sConfReg = $this->str_conf_reg;
        }

        $_SESSION['scriptcase']['reg_conf']['date_format']           = (isset($this->Nm_conf_reg[$sConfReg]['data_format']))              ?  $this->Nm_conf_reg[$sConfReg]['data_format']                  : "ddmmyyyy";
        $_SESSION['scriptcase']['reg_conf']['date_sep']              = (isset($this->Nm_conf_reg[$sConfReg]['data_sep']))                 ?  $this->Nm_conf_reg[$sConfReg]['data_sep']                     : "/";
        $_SESSION['scriptcase']['reg_conf']['date_week_ini']         = (isset($this->Nm_conf_reg[$sConfReg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$sConfReg]['prim_dia_sema']                : "SU";
        $_SESSION['scriptcase']['reg_conf']['time_format']           = (isset($this->Nm_conf_reg[$sConfReg]['hora_format']))              ?  $this->Nm_conf_reg[$sConfReg]['hora_format']                  : "hhiiss";
        $_SESSION['scriptcase']['reg_conf']['time_sep']              = (isset($this->Nm_conf_reg[$sConfReg]['hora_sep']))                 ?  $this->Nm_conf_reg[$sConfReg]['hora_sep']                     : ":";
        $_SESSION['scriptcase']['reg_conf']['time_pos_ampm']         = (isset($this->Nm_conf_reg[$sConfReg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$sConfReg]['hora_pos_ampm']                : "right_without_space";
        $_SESSION['scriptcase']['reg_conf']['time_simb_am']          = (isset($this->Nm_conf_reg[$sConfReg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$sConfReg]['hora_simbolo_am']              : "am";
        $_SESSION['scriptcase']['reg_conf']['time_simb_pm']          = (isset($this->Nm_conf_reg[$sConfReg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$sConfReg]['hora_simbolo_pm']              : "pm";
        $_SESSION['scriptcase']['reg_conf']['simb_neg']              = (isset($this->Nm_conf_reg[$sConfReg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$sConfReg]['num_sinal_neg']                : "-";
        $_SESSION['scriptcase']['reg_conf']['grup_num']              = (isset($this->Nm_conf_reg[$sConfReg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$sConfReg]['num_sep_agr']                  : ".";
        $_SESSION['scriptcase']['reg_conf']['dec_num']               = (isset($this->Nm_conf_reg[$sConfReg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$sConfReg]['num_sep_dec']                  : ",";
        $_SESSION['scriptcase']['reg_conf']['neg_num']               = (isset($this->Nm_conf_reg[$sConfReg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$sConfReg]['num_format_num_neg']           : 2;
        $_SESSION['scriptcase']['reg_conf']['monet_simb']            = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_simbolo']            : "$";
        $_SESSION['scriptcase']['reg_conf']['monet_f_pos']           = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_pos']     : 3;
        $_SESSION['scriptcase']['reg_conf']['monet_f_neg']           = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_neg']     : 13;
        $_SESSION['scriptcase']['reg_conf']['grup_val']              = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_sep_agr']            : ".";
        $_SESSION['scriptcase']['reg_conf']['dec_val']               = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_sep_dec']            : ",";
        $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$sConfReg]['num_group_digit']))          ?  $this->Nm_conf_reg[$sConfReg]['num_group_digit']              : "1";
        $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_group_digit']))    ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_group_digit']        : "1";
        $_SESSION['scriptcase']['reg_conf']['html_dir']              = (isset($this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl'] . "'" : "";
        $_SESSION['scriptcase']['reg_conf']['css_dir']               = (isset($this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl'] : "LTR";
        if ('' == $_SESSION['scriptcase']['reg_conf']['num_group_digit'])
        {
            $_SESSION['scriptcase']['reg_conf']['num_group_digit'] = '1';
        }
        if ('' == $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'])
        {
            $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = '1';
        }
    } // regionalDefault

    function loadFieldConfig() {
        $this->field_config = array(
            'widget1_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget2_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget3_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget4_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget5_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget6_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget7_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget8_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
        );
    } // loadFieldConfig


} // dashboard_ranap_ini

class dashboard_ranap_control {

    var $Ini;

    function control()
    {
        $this->init();
        if (isset($_GET['blank']) && 'Y' == $_GET['blank'])
        {
            $this->displayBlankPage();
        }
        else
        {
            $this->displayContainer();
        }
    } // control

    function init()
    {
        if (!$this->Ini)
        {
            $this->Ini = new dashboard_ranap_ini();
            $this->Ini->init();
        }

        $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_data.class.php", "C", "nm_data");
        $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
        $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_functions.php", "", "");
        $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_api.php", "", "");
        $this->nm_data = new nm_data($this->Ini->str_lang);

        $_SESSION['scriptcase']['sc_aba_iframe']['dashboard_ranap'] = array(
        );

        $_SESSION['scriptcase']['dashboard_targets']['dashboard_ranap'] = array();


        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_ranap'] = array();

        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_ranap']['dbifrm_widget1'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_ranap']['dbifrm_widget2'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_ranap']['dbifrm_widget3'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_ranap']['dbifrm_widget4'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_ranap']['dbifrm_widget5'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_ranap']['dbifrm_widget6'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_ranap']['dbifrm_widget7'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_ranap']['dbifrm_widget8'] = rand(2, 10000);

        $_SESSION['scriptcase']['dashboard_toolbar']['dashboard_ranap'] = array();

        $_SESSION['scriptcase']['dashboard_toolbar']['dashboard_ranap']['chart_data_antrian'] = array(
            'form_update'     => true,
            'form_insert'     => true,
            'form_delete'     => true,
            'form_copy'       => true,
            'form_navigate'   => true,
            'form_navpage'    => true,
            'form_goto'       => true,
            'form_lineqty'    => true,
            'form_summary'    => true,
            'form_qsearch'    => true,
            'form_dynsearch'  => true,
            'grid_navigate'   => true,
            'grid_summary'    => true,
            'grid_qsearch'    => true,
            'grid_dynsearch'  => true,
            'grid_filter'     => true,
            'grid_sel_col'    => true,
            'grid_sort_col'   => true,
            'grid_goto'       => true,
            'grid_lineqty'    => true,
            'grid_navpage'    => true,
            'grid_pdf'        => true,
            'grid_xls'        => true,
            'grid_xml'        => true,
            'grid_csv'        => true,
            'grid_rtf'        => true,
            'grid_word'       => true,
            'grid_print'      => true,
            'grid_new'        => true,
            'chart_sort'      => false,
            'chart_custom'    => false,
            'chart_bar'       => false,
            'chart_line'      => false,
            'chart_area'      => false,
            'chart_pizza'     => false,
            'chart_stack'     => false,
            'chart_combo'     => false,
            'chart_type'      => false,
            'chart_summary'   => false,
            'chart_pdf'       => false,
            'chart_print'     => false,
            'chart_word'      => true,
            'chart_xls'       => true,
            'chart_xml'       => true,
            'chart_csv'       => true,
            'chart_rtf'       => true,
            'chart_imagem'    => true,
            'chart_dynsearch' => false,
            'chart_filter'    => false,
            'chart_conf'      => true,
            'chart_settings'  => true,
            'sel_groupby'     => true,
            'chart_detail'    => true,
        );
        $_SESSION['scriptcase']['dashboard_toolbar']['dashboard_ranap']['chart_detail_poli'] = array(
            'form_update'     => true,
            'form_insert'     => true,
            'form_delete'     => true,
            'form_copy'       => true,
            'form_navigate'   => true,
            'form_navpage'    => true,
            'form_goto'       => true,
            'form_lineqty'    => true,
            'form_summary'    => true,
            'form_qsearch'    => true,
            'form_dynsearch'  => true,
            'grid_navigate'   => true,
            'grid_summary'    => true,
            'grid_qsearch'    => true,
            'grid_dynsearch'  => true,
            'grid_filter'     => true,
            'grid_sel_col'    => true,
            'grid_sort_col'   => true,
            'grid_goto'       => true,
            'grid_lineqty'    => true,
            'grid_navpage'    => true,
            'grid_pdf'        => true,
            'grid_xls'        => true,
            'grid_xml'        => true,
            'grid_csv'        => true,
            'grid_rtf'        => true,
            'grid_word'       => true,
            'grid_print'      => true,
            'grid_new'        => true,
            'chart_sort'      => false,
            'chart_custom'    => false,
            'chart_bar'       => false,
            'chart_line'      => false,
            'chart_area'      => false,
            'chart_pizza'     => false,
            'chart_stack'     => false,
            'chart_combo'     => false,
            'chart_type'      => false,
            'chart_summary'   => false,
            'chart_pdf'       => false,
            'chart_print'     => false,
            'chart_word'      => true,
            'chart_xls'       => true,
            'chart_xml'       => true,
            'chart_csv'       => true,
            'chart_rtf'       => true,
            'chart_imagem'    => true,
            'chart_dynsearch' => false,
            'chart_filter'    => false,
            'chart_conf'      => true,
            'chart_settings'  => true,
            'sel_groupby'     => true,
            'chart_detail'    => true,
        );
        $_SESSION['scriptcase']['dashboard_toolbar']['dashboard_ranap']['chart_detail_dokter'] = array(
            'form_update'     => true,
            'form_insert'     => true,
            'form_delete'     => true,
            'form_copy'       => true,
            'form_navigate'   => true,
            'form_navpage'    => true,
            'form_goto'       => true,
            'form_lineqty'    => true,
            'form_summary'    => true,
            'form_qsearch'    => true,
            'form_dynsearch'  => true,
            'grid_navigate'   => true,
            'grid_summary'    => true,
            'grid_qsearch'    => true,
            'grid_dynsearch'  => true,
            'grid_filter'     => true,
            'grid_sel_col'    => true,
            'grid_sort_col'   => true,
            'grid_goto'       => true,
            'grid_lineqty'    => true,
            'grid_navpage'    => true,
            'grid_pdf'        => true,
            'grid_xls'        => true,
            'grid_xml'        => true,
            'grid_csv'        => true,
            'grid_rtf'        => true,
            'grid_word'       => true,
            'grid_print'      => true,
            'grid_new'        => true,
            'chart_sort'      => false,
            'chart_custom'    => false,
            'chart_bar'       => false,
            'chart_line'      => false,
            'chart_area'      => false,
            'chart_pizza'     => false,
            'chart_stack'     => false,
            'chart_combo'     => false,
            'chart_type'      => false,
            'chart_summary'   => false,
            'chart_pdf'       => false,
            'chart_print'     => false,
            'chart_word'      => true,
            'chart_xls'       => true,
            'chart_xml'       => true,
            'chart_csv'       => true,
            'chart_rtf'       => true,
            'chart_imagem'    => true,
            'chart_dynsearch' => false,
            'chart_filter'    => false,
            'chart_conf'      => true,
            'chart_settings'  => true,
            'sel_groupby'     => true,
            'chart_detail'    => true,
        );
        $_SESSION['scriptcase']['dashboard_toolbar']['dashboard_ranap']['chart_diagnosa_top'] = array(
            'form_update'     => true,
            'form_insert'     => true,
            'form_delete'     => true,
            'form_copy'       => true,
            'form_navigate'   => true,
            'form_navpage'    => true,
            'form_goto'       => true,
            'form_lineqty'    => true,
            'form_summary'    => true,
            'form_qsearch'    => true,
            'form_dynsearch'  => true,
            'grid_navigate'   => true,
            'grid_summary'    => true,
            'grid_qsearch'    => true,
            'grid_dynsearch'  => true,
            'grid_filter'     => true,
            'grid_sel_col'    => true,
            'grid_sort_col'   => true,
            'grid_goto'       => true,
            'grid_lineqty'    => true,
            'grid_navpage'    => true,
            'grid_pdf'        => true,
            'grid_xls'        => true,
            'grid_xml'        => true,
            'grid_csv'        => true,
            'grid_rtf'        => true,
            'grid_word'       => true,
            'grid_print'      => true,
            'grid_new'        => true,
            'chart_sort'      => false,
            'chart_custom'    => false,
            'chart_bar'       => false,
            'chart_line'      => false,
            'chart_area'      => false,
            'chart_pizza'     => false,
            'chart_stack'     => false,
            'chart_combo'     => false,
            'chart_type'      => false,
            'chart_summary'   => false,
            'chart_pdf'       => false,
            'chart_print'     => false,
            'chart_word'      => true,
            'chart_xls'       => true,
            'chart_xml'       => true,
            'chart_csv'       => true,
            'chart_rtf'       => true,
            'chart_imagem'    => true,
            'chart_dynsearch' => false,
            'chart_filter'    => false,
            'chart_conf'      => true,
            'chart_settings'  => true,
            'sel_groupby'     => true,
            'chart_detail'    => true,
        );
    } // init

    function displayBlankPage()
    {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
 <title></title>
<?php
        if (!function_exists("sc_check_mobile"))
        {
            include_once("../_lib/lib/php/nm_check_mobile.php");
        }
        $this->display_as_mobile = sc_check_mobile();
        if($this->display_as_mobile)
        {
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
        }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>jquery_plugin/inettuts/sc_inettuts.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>bootstrap/css/bootstrap.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>gridstack.js-master/dist/gridstack.min.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_container.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_container<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="dashboard_ranap_container_index.css" />
<?php
        global $str_widget_max, $str_widget_rest, $index_class_pos, $index_class_neg, $index_class_neu;
        include_once "../_lib/css/" . $this->Ini->str_schema_all . "_container.php";
        $this->Widget_max     = $str_widget_max;
        $this->Widget_rest    = $str_widget_rest;
        $this->index_icon_pos = $index_class_pos;
        $this->index_icon_neg = $index_class_neg;
        $this->index_icon_neu = $index_class_neu;
?>
<script type="text/javascript">
function sc_session_redir(url_redir)
{
    if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
    {
        window.parent.sc_session_redir(url_redir);
    }
    else
    {
        if (window.opener && typeof window.opener.sc_session_redir === 'function')
        {
            window.close();
            window.opener.sc_session_redir(url_redir);
        }
        else
        {
            window.location = url_redir;
        }
    }
}
var scIframeSCInit = {};
<?php
        foreach ($_SESSION['scriptcase']['dashboard_scinit']['dashboard_ranap'] as $sIframe => $iSCInit) {
?>
scIframeSCInit["<?php echo $sIframe; ?>"] = "<?php echo $iSCInit; ?>";
<?php
        }
?>
</script>
</head>
<body class="scContainerPage">



</body>
</html>
<?php
    } // displayBlankPage

    function displayContainer()
    {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
 <title></title>
<?php
        if (!function_exists("sc_check_mobile"))
        {
            include_once("../_lib/lib/php/nm_check_mobile.php");
        }
        $this->display_as_mobile = sc_check_mobile();
        if($this->display_as_mobile)
        {
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
        }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>jquery_plugin/inettuts/sc_inettuts.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>bootstrap/css/bootstrap.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>gridstack.js-master/dist/gridstack.min.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_container.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_container<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="dashboard_ranap_container_index.css" />
<?php
        global $str_widget_max, $str_widget_rest, $index_class_pos, $index_class_neg, $index_class_neu;
        include_once "../_lib/css/" . $this->Ini->str_schema_all . "_container.php";
        $this->Widget_max     = $str_widget_max;
        $this->Widget_rest    = $str_widget_rest;
        $this->index_icon_pos = $index_class_pos;
        $this->index_icon_neg = $index_class_neg;
        $this->index_icon_neu = $index_class_neu;
?>
<script type="text/javascript">
function sc_session_redir(url_redir)
{
    if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
    {
        window.parent.sc_session_redir(url_redir);
    }
    else
    {
        if (window.opener && typeof window.opener.sc_session_redir === 'function')
        {
            window.close();
            window.opener.sc_session_redir(url_redir);
        }
        else
        {
            window.location = url_redir;
        }
    }
}
var scIframeSCInit = {};
<?php
        foreach ($_SESSION['scriptcase']['dashboard_scinit']['dashboard_ranap'] as $sIframe => $iSCInit) {
?>
scIframeSCInit["<?php echo $sIframe; ?>"] = "<?php echo $iSCInit; ?>";
<?php
        }
?>
</script>
</head>
<body class="scContainerPage">


<div class='grid-stack'>
                <div  class="grid-stack-item" data-gs-x="2" data-gs-y="0" data-gs-width="10" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-0">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-0">
                        <div class="widget-head" style="display:">
                            <h3 class="scContainerTitle">Antrian RJ & IGD</h3>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-' id="id-div-iframe-0"><iframe id="id-iframe-0" name="dbifrm_widget1" class="sc-iframe-widget" style="height: 100%; width: 100%; border: 0px" src="<?php echo $this->Ini->path_link . SC_dir_app_name('chart_data_antrian'); ?>/?script_case_session=<?php echo session_id(); ?>&script_case_init=<?php echo $_SESSION["scriptcase"]["dashboard_scinit"]["dashboard_ranap"]["dbifrm_widget1"] ?>&under_dashboard=1&dashboard_app=dashboard_ranap&own_widget=dbifrm_widget1&compact_mode=1&remove_margin=0"></iframe></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="0" data-gs-y="0" data-gs-width="2" data-gs-height="2"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-1">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-1">
                        <div class="widget-head" style="display:none">
                            <h3 class="scContainerTitle">Widget2</h3>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget2' style="height: 100%" id="id-div-iframe-1"><?php echo $this->getIndexContent_widget2(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="0" data-gs-y="4" data-gs-width="2" data-gs-height="2"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-2">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-2">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('2');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Widget3" /></a>
                            <h3 class="scContainerTitle">Widget3</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget3' style="height: 100%" id="id-div-iframe-2"><?php echo $this->getIndexContent_widget3(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="0" data-gs-y="2" data-gs-width="2" data-gs-height="2"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-3">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-3">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('3');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Widget4" /></a>
                            <h3 class="scContainerTitle">Widget4</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget4' style="height: 100%" id="id-div-iframe-3"><?php echo $this->getIndexContent_widget4(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="0" data-gs-y="6" data-gs-width="2" data-gs-height="2"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-4">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-4">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('4');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Widget5" /></a>
                            <h3 class="scContainerTitle">Widget5</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget5' style="height: 100%" id="id-div-iframe-4"><?php echo $this->getIndexContent_widget5(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="2" data-gs-y="4" data-gs-width="6" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-5">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-5">
                        <div class="widget-head" style="display:">
                            <h3 class="scContainerTitle">Detail Rajal & IGD</h3>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-' id="id-div-iframe-5"><iframe id="id-iframe-5" name="dbifrm_widget6" class="sc-iframe-widget" style="height: 100%; width: 100%; border: 0px" src="<?php echo $this->Ini->path_link . SC_dir_app_name('chart_detail_poli'); ?>/?script_case_session=<?php echo session_id(); ?>&script_case_init=<?php echo $_SESSION["scriptcase"]["dashboard_scinit"]["dashboard_ranap"]["dbifrm_widget6"] ?>&under_dashboard=1&dashboard_app=dashboard_ranap&own_widget=dbifrm_widget6&compact_mode=1&remove_margin=0"></iframe></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="0" data-gs-y="8" data-gs-width="8" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-6">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-6">
                        <div class="widget-head" style="display:">
                            <h3 class="scContainerTitle">Pelayanan Dokter</h3>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-' id="id-div-iframe-6"><iframe id="id-iframe-6" name="dbifrm_widget7" class="sc-iframe-widget" style="height: 100%; width: 100%; border: 0px" src="<?php echo $this->Ini->path_link . SC_dir_app_name('chart_detail_dokter'); ?>/?script_case_session=<?php echo session_id(); ?>&script_case_init=<?php echo $_SESSION["scriptcase"]["dashboard_scinit"]["dashboard_ranap"]["dbifrm_widget7"] ?>&under_dashboard=1&dashboard_app=dashboard_ranap&own_widget=dbifrm_widget7&compact_mode=1&remove_margin=0"></iframe></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="8" data-gs-y="4" data-gs-width="4" data-gs-height="8"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-7">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-7">
                        <div class="widget-head" style="display:">
                            <h3 class="scContainerTitle">Top Diagnosa Penyakit</h3>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-' id="id-div-iframe-7"><iframe id="id-iframe-7" name="dbifrm_widget8" class="sc-iframe-widget" style="height: 100%; width: 100%; border: 0px" src="<?php echo $this->Ini->path_link . SC_dir_app_name('chart_diagnosa_top'); ?>/?script_case_session=<?php echo session_id(); ?>&script_case_init=<?php echo $_SESSION["scriptcase"]["dashboard_scinit"]["dashboard_ranap"]["dbifrm_widget8"] ?>&under_dashboard=1&dashboard_app=dashboard_ranap&own_widget=dbifrm_widget8&compact_mode=1&remove_margin=0"></iframe></div>
                    </div>
                </div></div>
<div id="myModal" class="modal fade" role="dialog" style="margin:0px !important; padding:5px !important;">
  <div class="modal-dialog" style="width: 100%; height: 100%; margin:0px !important; padding:10px !important;">

        <div class="modal-content" style="width: 100%; padding:2px; height: 100%;">

        </div>

  </div>
</div>


<script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>lodash/lodash.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>gridstack.js-master/dist/gridstack.all.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {

        var options = {
            float: false,
        };
        $('.grid-stack').gridstack(options);
    });

    var_widget_maximized = "";
    var_widget_old_height = "";
    function maximizeWidget(str_widget_id)
    {
        var_widget_maximized = str_widget_id;

        var widgetIframe = $("#id-div-" + var_widget_maximized).find("iframe"), srcTag = widgetIframe[0].contentWindow.location.href;

        $("#id-div-" + var_widget_maximized).detach().appendTo('.modal-content');

        var_widget_old_height = $("#id-div-" + var_widget_maximized).css('height');
        $("#id-div-" + var_widget_maximized).css('height', 'calc(100% - 15px)');

        $("#id-div-" + var_widget_maximized + " .collapse").toggle();
        $("#id-div-" + var_widget_maximized + " .maximize").toggle();
        $("#id-div-" + var_widget_maximized + " .remove").toggle();
        $("#id-div-" + var_widget_maximized + " .removeModal").show();

        widgetIframe = $("#id-div-" + var_widget_maximized).find("iframe");
        if (widgetIframe.length) {
            srcTag = addUrlParam(srcTag, "maximized", "1", $(widgetIframe[0]).attr("name"));
            $(widgetIframe[0]).attr("src", srcTag);
        }

        $('.modal').modal('show');
    }
    function minimizeWidget()
    {
        var widgetIframe = $("#id-div-" + var_widget_maximized).find("iframe"), srcTag = widgetIframe[0].contentWindow.location.href;

        $("#id-div-" + var_widget_maximized).detach().appendTo("#id-father-" + var_widget_maximized);

        $("#id-div-" + var_widget_maximized).css('height', '100%');

        $("#id-div-" + var_widget_maximized + " .collapse").toggle();
        $("#id-div-" + var_widget_maximized + " .maximize").toggle();
        $("#id-div-" + var_widget_maximized + " .remove").toggle();
        $("#id-div-" + var_widget_maximized + " .removeModal").hide();

        widgetIframe = $("#id-div-" + var_widget_maximized).find("iframe");
        if (widgetIframe.length) {
            srcTag = addUrlParam(srcTag, "maximized", "0", $(widgetIframe[0]).attr("name"));
            $(widgetIframe[0]).attr("src", srcTag);
        }

        $('.modal').modal('hide');
    }
    function addUrlParam(sUrl, sParam, sValue, sName) {
        var baseUrl, urlParams = [], objParams = {}, tmp, i;
        tmp = sUrl.split("?");
        baseUrl = tmp[0];
        if (tmp[1]) {
            urlParams = tmp[1].split("&");
        }
        for (i = 0; i < urlParams.length; i++) {
            tmp = urlParams[i].split("=");
            objParams[ tmp[0] ] = tmp[1] ? tmp[1] : "";
        }
        objParams["script_case_session"] = "<?php echo $this->NM_encode_input(session_id()); ?>";
        objParams["script_case_init"] = scIframeSCInit[sName];
        objParams[sParam] = sValue;
        urlParams = [];
        for (tmp in objParams) {
            urlParams.push(tmp + "=" + objParams[tmp]);
        }
        return baseUrl + "?" + urlParams.join("&");
    }

    $( ".collapse" ).click(function() {
        $(this).parent().parent().toggleClass( "collapsed" );
        if ($(this).parent().parent().hasClass("collapsed")) {
            var barHeight = $(this).parent().parent().parent().find(".widget-head").height();
            if (barHeight) {
                $(this).parent().parent().parent().css({
                    height: 0,
                    minHeight: (barHeight + 2) + "px"
                });
            }
        }
        else {
            $(this).parent().parent().parent().css({
                height: "",
                minHeight: ""
            });
        }
    });

    $( ".remove" ).not(".removeModal").click(function() {
        if (confirm("<?php echo $this->Ini->Nm_lang['lang_remove_container'] ?>")) {
            $('.grid-stack').data('gridstack').removeWidget($(this).parent().parent().parent());
        }
    });

    $( ".removeModal" ).click(function() {
        minimizeWidget();
    });

</script>
<script type="text/javascript">
$( document ).ready(function() {
    $('.sc-iframe-widget').each(function() {
        if ($(this).attr('alt')) {
            var wId  = $(this).attr('id'),
            wSrc = $(this).attr('src'),
            wRef = parseInt($(this).attr('alt')) * 1000;
            setTimeout(function() { refreshWidget(wId, wSrc, wRef); }, wRef);
        }
    });
});
function refreshWidget(wId, wSrc, wRef)
{
     document.getElementById(wId).contentWindow.location = wSrc;
     setTimeout(function() { refreshWidget(wId, wSrc, wRef); }, wRef);
}
</script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>

</body>
</html>
<?php
    } // displayContainer

    function NM_encode_input($str)
    {
        $aRep = array(
                      '&#059;' => ';',
                      '&lt;' => '<',
                      '&gt;' => '>',
                      '&quot;' => '"',
                      '&#039;' => "'",
                      '&#040;' => '(',
                      '&#041;' => ')',
                     );
        $str = str_replace('<br>', '__SC_BREAK_LINE__', $str);
        $str = str_replace('<br />', '__SC_BREAK_LINE__', $str);
        $str = str_replace('&nbsp;', '__SC_SPACE_CHAR__', $str);
        $str = str_replace('&', '__SC_AMP_CHAR__', $str);
        $str = str_replace(array_values($aRep), array_keys($aRep), $str);
        $str = str_replace('__SC_AMP_CHAR__', '&amp;', $str);
        $str = str_replace('__SC_BREAK_LINE__', '<br />', $str);
        $str = str_replace('__SC_SPACE_CHAR__', '&nbsp;', $str);
        return $str;
    }
    function displayPassword()
    {
        global $nm_parms_senha, $script_case_init;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">


<HTML>
    <HEAD>    
        <TITLE></TITLE>
        <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />

        <?php
        if (isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
        {
        ?>
           <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <?php
        }
        ?>
        <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
        <META http-equiv="Pragma" content="no-cache" />
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
        <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form; ?>/<?php echo $this->Ini->Str_btn_form; ?>.css" />
        <?php
        if(isset($_SESSION['scriptcase']['str_google_fonts']) && !empty($_SESSION['scriptcase']['str_google_fonts']))
        {
        ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['str_google_fonts']; ?>" />
        <?php
        }
        ?>
    </HEAD>
    <body class="scGridPage">
        <form name="Fsenha" method="post" action="./">    
            <div style="text-align:center;">  
                <div class="scFormBorder" style="display:inline-block; padding:1px;">
                    <div  class='scFormTable' style='display: flex'>
                        <div class='scFormLabelOdd'  style='display: inline-block'>
                            <?php echo $this->Ini->Nm_lang['lang_errm_type_pswd']; ?>
                        </div>
                        <div class='scFormDataOdd'  style='display: inline-block'>
                            <?php
                            foreach ($nm_parms_senha as $nm_nome_parm => $nm_val_parm)
                            {
                            ?>
                               <input type="hidden"   name="<?php echo $nm_nome_parm ?>" value="<?php echo NM_encode_input($nm_val_parm) ?>"/> 
                            <?php
                            }
                            ?>
                           <input type="hidden"   name="script_case_init" value="<?php echo NM_encode_input($script_case_init) ?>"/> 
                           <input type="hidden"   name="script_case_session" value="<?php echo NM_encode_input(session_id()) ?>"/>
                           <input type="hidden"   name="script_case_ref" value="<?php echo isset($_SERVER['HTTP_REFERER']) ? NM_encode_input($_SERVER['HTTP_REFERER']) : ""; ?>"/> 
                           <input type="password" name="script_case_senha" value="" class="scFormObjectOdd" size=32 required /> 
                        </div>
                    </div>
                    <div class='scFormToolbar'>
                        <input type="submit" class="scButton_default" name="sc_sai_senha" value="OK"> 
                    </div>
                </div>
            </div>
        </form>
        <script type="text/javascript">
            document.Fsenha.script_case_senha.focus();
        </script>
    </body>
</html><?php
        exit;
    } // displayPassword

    function displayAccessError()
    {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
 <title></title>
<?php
        if (!function_exists("sc_check_mobile"))
        {
            include_once("../_lib/lib/php/nm_check_mobile.php");
        }
        $this->display_as_mobile = sc_check_mobile();
        if($this->display_as_mobile)
        {
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
        }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>jquery_plugin/inettuts/sc_inettuts.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>bootstrap/css/bootstrap.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>gridstack.js-master/dist/gridstack.min.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_container.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_container<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="dashboard_ranap_container_index.css" />
<?php
        global $str_widget_max, $str_widget_rest, $index_class_pos, $index_class_neg, $index_class_neu;
        include_once "../_lib/css/" . $this->Ini->str_schema_all . "_container.php";
        $this->Widget_max     = $str_widget_max;
        $this->Widget_rest    = $str_widget_rest;
        $this->index_icon_pos = $index_class_pos;
        $this->index_icon_neg = $index_class_neg;
        $this->index_icon_neu = $index_class_neu;
?>
<script type="text/javascript">
function sc_session_redir(url_redir)
{
    if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
    {
        window.parent.sc_session_redir(url_redir);
    }
    else
    {
        if (window.opener && typeof window.opener.sc_session_redir === 'function')
        {
            window.close();
            window.opener.sc_session_redir(url_redir);
        }
        else
        {
            window.location = url_redir;
        }
    }
}
var scIframeSCInit = {};
<?php
        foreach ($_SESSION['scriptcase']['dashboard_scinit']['dashboard_ranap'] as $sIframe => $iSCInit) {
?>
scIframeSCInit["<?php echo $sIframe; ?>"] = "<?php echo $iSCInit; ?>";
<?php
        }
?>
</script>
</head>
<body class="scContainerPage">

<br />
<table align="center" class="scGridBorder"><tr><td style="padding: 0">
 <table style="width: 100%" class="scGridTabela">
  <tr class="scGridFieldOdd">
   <td class="scGridFieldOddFont" style="padding: 15px 30px">
    <?php echo $this->Ini->Nm_lang['lang_errm_unth_user']; ?>
   </td>
  </tr>
 </table>
</td></tr></table>
<?php
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']))
        {
?>
<br /><br /><br />
<table align="center" class="scGridBorder" style="width: 450px"><tr><td style="padding: 0">
 <table style="width: 100%" class="scGridTabela">
  <tr class="scGridFieldOdd">
   <td class="scGridFieldOddFont" style="padding: 15px 30px">
    <?php echo $this->Ini->Nm_lang['lang_errm_unth_hwto']; ?>
   </td>
  </tr>
 </table>
</td></tr></table>
<?php
        }
?>

</body>
</html>
<?php
        exit;
    } // displayAccessError

    function dateDefaultFormat()
    {
        if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
        {
            $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
            $sDate = str_replace('mm',   'm', $sDate);
            $sDate = str_replace('dd',   'd', $sDate);
            return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
        }
        elseif ('en_us' == $this->Ini->str_lang)
        {
            return 'm/d/Y';
        }
        else
        {
            return 'd/m/Y';
        }
    } // dateDefaultFormat

    function getIndexContent_widget2() {
        $bResult = $this->getIndexContentData_widget2();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget2();
        }
    } // getIndexContent_widget2

    function getIndexContentData_widget2() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT COUNT(struckNo), YEAR(regDate) & '-' & FORMAT(MONTH(regDate), '00') FROM tbantrian WHERE (poly <> 'POL004') AND (status <> 'Batal') GROUP BY YEAR(regDate) & '-' & FORMAT(MONTH(regDate), '00') ORDER BY YEAR(regDate) & '-' & FORMAT(MONTH(regDate), '00') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT COUNT(\"struckNo\"), CAST(YEAR(\"regDate\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"regDate\") AS VARCHAR(2)), 2) FROM tbantrian WHERE (\"poly\" <> 'POL004') AND (\"status\" <> 'Batal') GROUP BY CAST(YEAR(\"regDate\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"regDate\") AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(\"regDate\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"regDate\") AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT COUNT(\"struckNo\"), CONCAT(CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-'), LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0')) FROM tbantrian WHERE (\"poly\" <> 'POL004') AND (\"status\" <> 'Batal') GROUP BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-'), LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0')) ORDER BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-'), LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT COUNT(\"struckNo\"), CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"regDate\"), 'FM00')) FROM tbantrian WHERE (\"poly\" <> 'POL004') AND (\"status\" <> 'Batal') GROUP BY 2 ORDER BY CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"regDate\"), 'FM00')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT COUNT(`struckNo`), CONCAT(YEAR(`regDate`), '-', LPAD(MONTH(`regDate`), 2, '0')) FROM tbantrian WHERE (`poly` <> 'POL004') AND (`status` <> 'Batal') GROUP BY 2 ORDER BY CONCAT(YEAR(`regDate`), '-', LPAD(MONTH(`regDate`), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT COUNT(`struckNo`), strftime('%Y', `regDate`) || '-' || strftime('%m', `regDate`) FROM tbantrian WHERE (`poly` <> 'POL004') AND (`status` <> 'Batal') GROUP BY 2 ORDER BY strftime('%Y', `regDate`) || '-' || strftime('%m', `regDate`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT COUNT(\"struckNo\"), EXTRACT(YEAR FROM \"regDate\") || '-' || LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0') FROM tbantrian WHERE (\"poly\" <> 'POL004') AND (\"status\" <> 'Batal') GROUP BY 2 ORDER BY EXTRACT(YEAR FROM \"regDate\") || '-' || LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT COUNT(struckNo), CONCAT(CONCAT(YEAR(regDate), '-'), LPAD(MONTH(regDate), 2, '0')) FROM tbantrian WHERE (poly <> 'POL004') AND (status <> 'Batal') GROUP BY CONCAT(CONCAT(YEAR(regDate), '-'), LPAD(MONTH(regDate), 2, '0')) ORDER BY CONCAT(CONCAT(YEAR(regDate), '-'), LPAD(MONTH(regDate), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT COUNT(struckNo), CAST(YEAR(regDate) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(regDate) AS VARCHAR(2)), 2) FROM tbantrian WHERE (poly <> 'POL004') AND (status <> 'Batal') GROUP BY CAST(YEAR(regDate) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(regDate) AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(regDate) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(regDate) AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT COUNT(struckNo), YEAR(regDate) || '-' || LPAD(MONTH(regDate), 2, '0') FROM tbantrian WHERE (poly <> 'POL004') AND (status <> 'Batal') GROUP BY 2 ORDER BY YEAR(regDate) || '-' || LPAD(MONTH(regDate), 2, '0') DESC";
        }
        else 
        {
            $sSql = "SELECT COUNT(struckNo), YYYYMM(regDate) FROM tbantrian WHERE (poly <> 'POL004') AND (status <> 'Batal') GROUP BY 2 ORDER BY YYYYMM(regDate) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget2($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget2($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget2($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget2($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget2($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget2($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget2

    function getIndexContentHtml_widget2() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = '';
        $this->indexData['new_metric_value'] = '';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget2">Rawat Jalan</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget2">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget2"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget2">{$this->indexData['new_metric_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget2">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget2">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget2

    function formatIndexDimension_widget2($value) {
        $parts = explode('-', $value);

        if (2 != count($parts)) {
            return $value;
        }

        $glue = ' ';

        if (1 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        $value = $parts[1] . $glue . $parts[0];

        return $value;
    } // formatIndexDimension_widget2

    function formatIndexMetric_widget2($value) {
        $suffix = '';
		$isNegative = false;

		if ('-' == substr($value, 0, 1)) {
			$value      = substr($value, 1);
			$isNegative = true;
		}

        $this->scaleValue($value, $suffix);

		if ($isNegative) {
			$value = '-' . $value;
		}

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget2_metric']['symbol_grp'], $this->Ini->field_config['widget2_metric']['symbol_dec'], '0', 'S', $this->Ini->field_config['widget2_metric']['format_neg'], $this->Ini->field_config['widget2_metric']['symbol_mon'], $this->Ini->field_config['widget2_metric']['newfmt_neg'], $this->Ini->field_config['widget2_metric']['symbol_neg'], $this->Ini->field_config['widget2_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget2

    function getIndexContent_widget3() {
        $bResult = $this->getIndexContentData_widget3();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget3();
        }
    } // getIndexContent_widget3

    function getIndexContentData_widget3() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT COUNT(id), YEAR(tglMasuk) & '-' & FORMAT(MONTH(tglMasuk), '00') FROM tbadmrawatinap GROUP BY YEAR(tglMasuk) & '-' & FORMAT(MONTH(tglMasuk), '00') ORDER BY YEAR(tglMasuk) & '-' & FORMAT(MONTH(tglMasuk), '00') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT COUNT(\"id\"), CAST(YEAR(\"tglMasuk\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"tglMasuk\") AS VARCHAR(2)), 2) FROM tbadmrawatinap GROUP BY CAST(YEAR(\"tglMasuk\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"tglMasuk\") AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(\"tglMasuk\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"tglMasuk\") AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT COUNT(\"id\"), CONCAT(CONCAT(EXTRACT(YEAR FROM \"tglMasuk\"), '-'), LPAD(EXTRACT(MONTH FROM \"tglMasuk\"), 2, '0')) FROM tbadmrawatinap GROUP BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"tglMasuk\"), '-'), LPAD(EXTRACT(MONTH FROM \"tglMasuk\"), 2, '0')) ORDER BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"tglMasuk\"), '-'), LPAD(EXTRACT(MONTH FROM \"tglMasuk\"), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT COUNT(\"id\"), CONCAT(EXTRACT(YEAR FROM \"tglMasuk\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"tglMasuk\"), 'FM00')) FROM tbadmrawatinap GROUP BY 2 ORDER BY CONCAT(EXTRACT(YEAR FROM \"tglMasuk\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"tglMasuk\"), 'FM00')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT COUNT(`id`), CONCAT(YEAR(`tglMasuk`), '-', LPAD(MONTH(`tglMasuk`), 2, '0')) FROM tbadmrawatinap GROUP BY 2 ORDER BY CONCAT(YEAR(`tglMasuk`), '-', LPAD(MONTH(`tglMasuk`), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT COUNT(`id`), strftime('%Y', `tglMasuk`) || '-' || strftime('%m', `tglMasuk`) FROM tbadmrawatinap GROUP BY 2 ORDER BY strftime('%Y', `tglMasuk`) || '-' || strftime('%m', `tglMasuk`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT COUNT(\"id\"), EXTRACT(YEAR FROM \"tglMasuk\") || '-' || LPAD(EXTRACT(MONTH FROM \"tglMasuk\"), 2, '0') FROM tbadmrawatinap GROUP BY 2 ORDER BY EXTRACT(YEAR FROM \"tglMasuk\") || '-' || LPAD(EXTRACT(MONTH FROM \"tglMasuk\"), 2, '0') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT COUNT(id), CONCAT(CONCAT(YEAR(tglMasuk), '-'), LPAD(MONTH(tglMasuk), 2, '0')) FROM tbadmrawatinap GROUP BY CONCAT(CONCAT(YEAR(tglMasuk), '-'), LPAD(MONTH(tglMasuk), 2, '0')) ORDER BY CONCAT(CONCAT(YEAR(tglMasuk), '-'), LPAD(MONTH(tglMasuk), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT COUNT(id), CAST(YEAR(tglMasuk) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(tglMasuk) AS VARCHAR(2)), 2) FROM tbadmrawatinap GROUP BY CAST(YEAR(tglMasuk) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(tglMasuk) AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(tglMasuk) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(tglMasuk) AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT COUNT(id), YEAR(tglMasuk) || '-' || LPAD(MONTH(tglMasuk), 2, '0') FROM tbadmrawatinap GROUP BY 2 ORDER BY YEAR(tglMasuk) || '-' || LPAD(MONTH(tglMasuk), 2, '0') DESC";
        }
        else 
        {
            $sSql = "SELECT COUNT(id), YYYYMM(tglMasuk) FROM tbadmrawatinap GROUP BY 2 ORDER BY YYYYMM(tglMasuk) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget3($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget3($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget3($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget3($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget3($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget3($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget3

    function getIndexContentHtml_widget3() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = '';
        $this->indexData['new_metric_value'] = '';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget3">Pasien Ranap</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget3">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget3"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget3">{$this->indexData['new_metric_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget3">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget3">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget3

    function formatIndexDimension_widget3($value) {
        $parts = explode('-', $value);

        if (2 != count($parts)) {
            return $value;
        }

        $glue = ' ';

        if (1 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        $value = $parts[1] . $glue . $parts[0];

        return $value;
    } // formatIndexDimension_widget3

    function formatIndexMetric_widget3($value) {
        $suffix = '';
		$isNegative = false;

		if ('-' == substr($value, 0, 1)) {
			$value      = substr($value, 1);
			$isNegative = true;
		}

        $this->scaleValue($value, $suffix);

		if ($isNegative) {
			$value = '-' . $value;
		}

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget3_metric']['symbol_grp'], $this->Ini->field_config['widget3_metric']['symbol_dec'], '0', 'S', $this->Ini->field_config['widget3_metric']['format_neg'], $this->Ini->field_config['widget3_metric']['symbol_mon'], $this->Ini->field_config['widget3_metric']['newfmt_neg'], $this->Ini->field_config['widget3_metric']['symbol_neg'], $this->Ini->field_config['widget3_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget3

    function getIndexContent_widget4() {
        $bResult = $this->getIndexContentData_widget4();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget4();
        }
    } // getIndexContent_widget4

    function getIndexContentData_widget4() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT COUNT(poly), YEAR(regDate) & '-' & FORMAT(MONTH(regDate), '00') FROM tbantrian WHERE (poly = 'POL004') AND (status <> 'Batal') GROUP BY YEAR(regDate) & '-' & FORMAT(MONTH(regDate), '00') ORDER BY YEAR(regDate) & '-' & FORMAT(MONTH(regDate), '00') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT COUNT(\"poly\"), CAST(YEAR(\"regDate\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"regDate\") AS VARCHAR(2)), 2) FROM tbantrian WHERE (\"poly\" = 'POL004') AND (\"status\" <> 'Batal') GROUP BY CAST(YEAR(\"regDate\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"regDate\") AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(\"regDate\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"regDate\") AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT COUNT(\"poly\"), CONCAT(CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-'), LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0')) FROM tbantrian WHERE (\"poly\" = 'POL004') AND (\"status\" <> 'Batal') GROUP BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-'), LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0')) ORDER BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-'), LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT COUNT(\"poly\"), CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"regDate\"), 'FM00')) FROM tbantrian WHERE (\"poly\" = 'POL004') AND (\"status\" <> 'Batal') GROUP BY 2 ORDER BY CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"regDate\"), 'FM00')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT COUNT(`poly`), CONCAT(YEAR(`regDate`), '-', LPAD(MONTH(`regDate`), 2, '0')) FROM tbantrian WHERE (`poly` = 'POL004') AND (`status` <> 'Batal') GROUP BY 2 ORDER BY CONCAT(YEAR(`regDate`), '-', LPAD(MONTH(`regDate`), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT COUNT(`poly`), strftime('%Y', `regDate`) || '-' || strftime('%m', `regDate`) FROM tbantrian WHERE (`poly` = 'POL004') AND (`status` <> 'Batal') GROUP BY 2 ORDER BY strftime('%Y', `regDate`) || '-' || strftime('%m', `regDate`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT COUNT(\"poly\"), EXTRACT(YEAR FROM \"regDate\") || '-' || LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0') FROM tbantrian WHERE (\"poly\" = 'POL004') AND (\"status\" <> 'Batal') GROUP BY 2 ORDER BY EXTRACT(YEAR FROM \"regDate\") || '-' || LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT COUNT(poly), CONCAT(CONCAT(YEAR(regDate), '-'), LPAD(MONTH(regDate), 2, '0')) FROM tbantrian WHERE (poly = 'POL004') AND (status <> 'Batal') GROUP BY CONCAT(CONCAT(YEAR(regDate), '-'), LPAD(MONTH(regDate), 2, '0')) ORDER BY CONCAT(CONCAT(YEAR(regDate), '-'), LPAD(MONTH(regDate), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT COUNT(poly), CAST(YEAR(regDate) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(regDate) AS VARCHAR(2)), 2) FROM tbantrian WHERE (poly = 'POL004') AND (status <> 'Batal') GROUP BY CAST(YEAR(regDate) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(regDate) AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(regDate) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(regDate) AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT COUNT(poly), YEAR(regDate) || '-' || LPAD(MONTH(regDate), 2, '0') FROM tbantrian WHERE (poly = 'POL004') AND (status <> 'Batal') GROUP BY 2 ORDER BY YEAR(regDate) || '-' || LPAD(MONTH(regDate), 2, '0') DESC";
        }
        else 
        {
            $sSql = "SELECT COUNT(poly), YYYYMM(regDate) FROM tbantrian WHERE (poly = 'POL004') AND (status <> 'Batal') GROUP BY 2 ORDER BY YYYYMM(regDate) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget4($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget4($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget4($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget4($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget4($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget4($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget4

    function getIndexContentHtml_widget4() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = '';
        $this->indexData['new_metric_value'] = '';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget4">Pasien IGD</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget4">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget4"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget4">{$this->indexData['new_metric_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget4">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget4">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget4

    function formatIndexDimension_widget4($value) {
        $parts = explode('-', $value);

        if (2 != count($parts)) {
            return $value;
        }

        $glue = ' ';

        if (1 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        $value = $parts[1] . $glue . $parts[0];

        return $value;
    } // formatIndexDimension_widget4

    function formatIndexMetric_widget4($value) {
        $suffix = '';
		$isNegative = false;

		if ('-' == substr($value, 0, 1)) {
			$value      = substr($value, 1);
			$isNegative = true;
		}

        $this->scaleValue($value, $suffix);

		if ($isNegative) {
			$value = '-' . $value;
		}

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget4_metric']['symbol_grp'], $this->Ini->field_config['widget4_metric']['symbol_dec'], '0', 'S', $this->Ini->field_config['widget4_metric']['format_neg'], $this->Ini->field_config['widget4_metric']['symbol_mon'], $this->Ini->field_config['widget4_metric']['newfmt_neg'], $this->Ini->field_config['widget4_metric']['symbol_neg'], $this->Ini->field_config['widget4_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget4

    function getIndexContent_widget5() {
        $bResult = $this->getIndexContentData_widget5();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget5();
        }
    } // getIndexContent_widget5

    function getIndexContentData_widget5() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT COUNT(status), YEAR(regDate) & '-' & FORMAT(MONTH(regDate), '00') FROM tbantrian WHERE (status = 'Batal') GROUP BY YEAR(regDate) & '-' & FORMAT(MONTH(regDate), '00') ORDER BY YEAR(regDate) & '-' & FORMAT(MONTH(regDate), '00') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT COUNT(\"status\"), CAST(YEAR(\"regDate\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"regDate\") AS VARCHAR(2)), 2) FROM tbantrian WHERE (\"status\" = 'Batal') GROUP BY CAST(YEAR(\"regDate\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"regDate\") AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(\"regDate\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"regDate\") AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT COUNT(\"status\"), CONCAT(CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-'), LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0')) FROM tbantrian WHERE (\"status\" = 'Batal') GROUP BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-'), LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0')) ORDER BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-'), LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT COUNT(\"status\"), CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"regDate\"), 'FM00')) FROM tbantrian WHERE (\"status\" = 'Batal') GROUP BY 2 ORDER BY CONCAT(EXTRACT(YEAR FROM \"regDate\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"regDate\"), 'FM00')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT COUNT(`status`), CONCAT(YEAR(`regDate`), '-', LPAD(MONTH(`regDate`), 2, '0')) FROM tbantrian WHERE (`status` = 'Batal') GROUP BY 2 ORDER BY CONCAT(YEAR(`regDate`), '-', LPAD(MONTH(`regDate`), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT COUNT(`status`), strftime('%Y', `regDate`) || '-' || strftime('%m', `regDate`) FROM tbantrian WHERE (`status` = 'Batal') GROUP BY 2 ORDER BY strftime('%Y', `regDate`) || '-' || strftime('%m', `regDate`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT COUNT(\"status\"), EXTRACT(YEAR FROM \"regDate\") || '-' || LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0') FROM tbantrian WHERE (\"status\" = 'Batal') GROUP BY 2 ORDER BY EXTRACT(YEAR FROM \"regDate\") || '-' || LPAD(EXTRACT(MONTH FROM \"regDate\"), 2, '0') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT COUNT(status), CONCAT(CONCAT(YEAR(regDate), '-'), LPAD(MONTH(regDate), 2, '0')) FROM tbantrian WHERE (status = 'Batal') GROUP BY CONCAT(CONCAT(YEAR(regDate), '-'), LPAD(MONTH(regDate), 2, '0')) ORDER BY CONCAT(CONCAT(YEAR(regDate), '-'), LPAD(MONTH(regDate), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT COUNT(status), CAST(YEAR(regDate) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(regDate) AS VARCHAR(2)), 2) FROM tbantrian WHERE (status = 'Batal') GROUP BY CAST(YEAR(regDate) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(regDate) AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(regDate) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(regDate) AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT COUNT(status), YEAR(regDate) || '-' || LPAD(MONTH(regDate), 2, '0') FROM tbantrian WHERE (status = 'Batal') GROUP BY 2 ORDER BY YEAR(regDate) || '-' || LPAD(MONTH(regDate), 2, '0') DESC";
        }
        else 
        {
            $sSql = "SELECT COUNT(status), YYYYMM(regDate) FROM tbantrian WHERE (status = 'Batal') GROUP BY 2 ORDER BY YYYYMM(regDate) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget5($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget5($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget5($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget5($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget5($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget5($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget5

    function getIndexContentHtml_widget5() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = '';
        $this->indexData['new_metric_value'] = '';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget5">Batal</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget5">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget5"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget5">{$this->indexData['new_metric_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget5">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget5">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget5

    function formatIndexDimension_widget5($value) {
        $parts = explode('-', $value);

        if (2 != count($parts)) {
            return $value;
        }

        $glue = ' ';

        if (1 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        $value = $parts[1] . $glue . $parts[0];

        return $value;
    } // formatIndexDimension_widget5

    function formatIndexMetric_widget5($value) {
        $suffix = '';
		$isNegative = false;

		if ('-' == substr($value, 0, 1)) {
			$value      = substr($value, 1);
			$isNegative = true;
		}

        $this->scaleValue($value, $suffix);

		if ($isNegative) {
			$value = '-' . $value;
		}

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget5_metric']['symbol_grp'], $this->Ini->field_config['widget5_metric']['symbol_dec'], '0', 'S', $this->Ini->field_config['widget5_metric']['format_neg'], $this->Ini->field_config['widget5_metric']['symbol_mon'], $this->Ini->field_config['widget5_metric']['newfmt_neg'], $this->Ini->field_config['widget5_metric']['symbol_neg'], $this->Ini->field_config['widget5_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget5

    function scaleValue(&$value, &$suffix) {
        if (1000 <= $value) {
            $value /= 1000;
            $suffix = ' K';
        }

        if (1000 <= $value) {
            $value /= 1000;
            $suffix = ' M';
        }

        if (1000 <= $value) {
            $value /= 1000;
            $suffix = ' B';
        }
    } // scaleValue

} // dashboard_ranap_control

function nm_limpa_str_dashboard_ranap(&$str)
{
    if (get_magic_quotes_gpc())
    {
        if (is_array($str))
        {
            foreach ($str as $x => $cada_str)
            {
                $str[$x] = str_replace("@aspasd@", '"', $str[$x]);
                $str[$x] = stripslashes($str[$x]);
            }
        }
        else
        {
            $str = str_replace("@aspasd@", '"', $str);
            $str = stripslashes($str);
        }
    }
}

?>
