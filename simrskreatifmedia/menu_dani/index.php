<?php
include_once('menu_dani_session.php');
session_start();
if (!function_exists("sc_check_mobile"))
{
    include_once("../_lib/lib/php/nm_check_mobile.php");
}
$_SESSION['scriptcase']['device_mobile'] = sc_check_mobile();
if (!isset($_SESSION['scriptcase']['display_mobile']))
{
    $_SESSION['scriptcase']['display_mobile'] = true;
}
if ($_SESSION['scriptcase']['device_mobile'])
{
    if ($_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'out' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = false;
    }
    elseif (!$_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'in' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = true;
    }
}
    $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod']      = "";
    $_SESSION['scriptcase']['menu_dani']['glo_nm_perfil']         = "conn_mysql";
    $_SESSION['scriptcase']['menu_dani']['glo_nm_path_imag_temp'] = "";
    $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo']      = "";
    //check publication with the prod
    $str_path_apl_url  = $_SERVER['PHP_SELF'];
    $str_path_apl_url  = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['menu_dani']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['menu_dani']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //end check publication with the prod

ob_start();

class menu_dani_class
{
  var $Db;

 function sc_Include($path, $tp, $name)
 {
     if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
     {
         include_once($path);
     }
 } // sc_Include

 function menu_dani_menu()
 {
    global $menu_dani_menuData, $nm_data_fixa;
     if (isset($_POST["nmgp_idioma"]))  
     { 
         $Temp_lang = explode(";" , $_POST["nmgp_idioma"]);  
         if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
          { 
             $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
         } 
         if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
         { 
             $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
         } 
     } 
   
     if (isset($_POST["nmgp_schema"]))  
     { 
         $_SESSION['scriptcase']['str_schema_all'] = $_POST["nmgp_schema"] . "/" . $_POST["nmgp_schema"];
     } 
   
           $nm_versao_sc  = "" ; 
           $_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'off';
           $Campos_Mens_erro = "";
           $sc_site_ssl   = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
           $NM_dir_atual = getcwd();
           if (empty($NM_dir_atual))
           {
               $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
               $str_path_sys          = str_replace("\\", '/', $str_path_sys);
           }
           else
           {
               $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
               $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
           }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
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
$_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
$_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
$_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
$_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
$_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
$_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
$_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
$_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
$_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
$str_path_web   = $_SERVER['PHP_SELF'];
$str_path_web   = str_replace("\\", '/', $str_path_web);
$str_path_web   = str_replace('//', '/', $str_path_web);
$str_root       = substr($str_path_sys, 0, -1 * strlen($str_path_web));
$path_link      = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_link      = substr($path_link, 0, strrpos($path_link, '/')) . '/';
$path_btn       = $str_root . $path_link . "_lib/buttons/";
$path_imag_cab  = $path_link . "_lib/img";
$this->force_mobile = false;
$this->path_botoes    = '../_lib/img';
$this->path_imag_apl  = $str_root . $path_link . "_lib/img";
$path_help      = $path_link . "_lib/webhelp/";
$path_libs      = $str_root . $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod'] . "/lib/php";
$path_third     = $str_root . $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod'] . "/third";
$path_adodb     = $str_root . $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod'] . "/third/adodb";
$path_apls      = $str_root . substr($path_link, 0, strrpos($path_link, '/'));
$path_img_old   = $str_root . $path_link . "menu_dani/img";
$this->path_css = $str_root . $path_link . "_lib/css/";
$_SESSION['scriptcase']['dir_temp'] = $str_root . $_SESSION['scriptcase']['menu_dani']['glo_nm_path_imag_temp'];
$this->url_css = "../_lib/css/";
$path_lib_php   = $str_root . $path_link . "_lib/lib/php";
$menu_mobile_hide          = 'N';
$menu_mobile_inicial_state = 'escondido';
$menu_mobile_hide_onclick  = 'S';
$menutree_mobile_float     = 'S';
$menu_mobile_hide_icon     = 'N';
$menu_mobile_hide_icon_menu_position     = 'right';
$mobile_menu_mobile_hide          = 'S';
$mobile_menu_mobile_inicial_state = 'aberto';
$mobile_menu_mobile_hide_onclick  = 'S';
$mobile_menutree_mobile_float     = 'N';
$mobile_menu_mobile_hide_icon     = 'N';
$mobile_menu_mobile_hide_icon_menu_position     = 'right';

$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('menu_dani');
if (isset($_SESSION['scriptcase']['user_logout']))
{
    foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
    {
        if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
        {
            unset($_SESSION['scriptcase']['user_logout'][$ind]);
            $nm_apl_dest = $parms['R'];
            $dir = explode("/", $nm_apl_dest);
            if (count($dir) == 1)
            {
                $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                $nm_apl_dest = $path_link . SC_dir_app_name($nm_apl_dest) . "/";
            }
?>
            <html>
            <body>
            <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
            </form>
            <script>
             document.FRedirect.submit();
            </script>
            </body>
            </html>
<?php
            exit;
        }
    }
}
if (!defined("SC_ERROR_HANDLER"))
{
    define("SC_ERROR_HANDLER", 1);
    include_once(dirname(__FILE__) . "/menu_dani_erro.php");
}
include_once(dirname(__FILE__) . "/menu_dani_erro.class.php"); 
$this->Erro = new menu_dani_erro();
$str_path = substr($_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod'], 0, strrpos($_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod'], '/') + 1);
if (!is_file($str_root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
{
    unset($_SESSION['scriptcase']['nm_sc_retorno']);
    unset($_SESSION['scriptcase']['menu_dani']['glo_nm_conexao']);
}

/* Path definitions */
$menu_dani_menuData         = array();
$menu_dani_menuData['path'] = array();
$menu_dani_menuData['url']  = array();
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $menu_dani_menuData['path']['sys'] = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $menu_dani_menuData['path']['sys'] = str_replace("\\", '/', $str_path_sys);
    $menu_dani_menuData['path']['sys'] = str_replace('//', '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo                                   = explode("/", $_SERVER['PHP_SELF']);
    $menu_dani_menuData['path']['sys'] = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$menu_dani_menuData['url']['web']   = $_SERVER['PHP_SELF'];
$menu_dani_menuData['url']['web']   = str_replace("\\", '/', $menu_dani_menuData['url']['web']);
$menu_dani_menuData['path']['root'] = substr($menu_dani_menuData['path']['sys'],  0, -1 * strlen($menu_dani_menuData['url']['web']));
$menu_dani_menuData['path']['app']  = substr($menu_dani_menuData['path']['sys'],  0, strrpos($menu_dani_menuData['path']['sys'],  '/'));
$menu_dani_menuData['path']['link'] = substr($menu_dani_menuData['path']['app'],  0, strrpos($menu_dani_menuData['path']['app'],  '/'));
$menu_dani_menuData['path']['link'] = substr($menu_dani_menuData['path']['link'], 0, strrpos($menu_dani_menuData['path']['link'], '/')) . '/';
$menu_dani_menuData['path']['app'] .= '/';
$menu_dani_menuData['url']['app']   = substr($menu_dani_menuData['url']['web'],  0, strrpos($menu_dani_menuData['url']['web'],  '/'));
$menu_dani_menuData['url']['link']  = substr($menu_dani_menuData['url']['app'],  0, strrpos($menu_dani_menuData['url']['app'],  '/'));
if ($_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] == "S")
{
    $menu_dani_menuData['url']['link']  = substr($menu_dani_menuData['url']['link'], 0, strrpos($menu_dani_menuData['url']['link'], '/'));
}
$menu_dani_menuData['url']['link']  .= '/';
$menu_dani_menuData['url']['app']   .= '/';

$nm_img_fun_menu = ""; 
if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
{
    $_SESSION['scriptcase']['str_lang'] = "id";
}
if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
{
    $_SESSION['scriptcase']['str_conf_reg'] = "id_id";
}
$this->str_lang        = $_SESSION['scriptcase']['str_lang'];
$this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
if (isset($_SESSION['scriptcase']['menu_dani']['session_timeout']['lang'])) {
    $this->str_lang = $_SESSION['scriptcase']['menu_dani']['session_timeout']['lang'];
}
elseif (!isset($_SESSION['scriptcase']['menu_dani']['actual_lang']) || $_SESSION['scriptcase']['menu_dani']['actual_lang'] != $this->str_lang) {
    $_SESSION['scriptcase']['menu_dani']['actual_lang'] = $this->str_lang;
    setcookie('sc_actual_lang_simrskreatifmedia',$this->str_lang,'0','/');
}
if (!function_exists("NM_is_utf8"))
{
   include_once("../_lib/lib/php/nm_utf8.php");
}
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('simrskreatifmedia');
if ($_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] == "S")
{
    $path_apls     = substr($path_apls, 0, strrpos($path_apls, '/'));
}
$path_apls     .= "/";
$this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "sc_arafiq/sc_arafiq";
include("../_lib/lang/". $this->str_lang .".lang.php");
include("../_lib/css/" . $this->str_schema_all . "_menutab.php");
include("../_lib/css/" . $this->str_schema_all . "_menuH.php");
if(isset($pagina_schemamenu) && !empty($pagina_schemamenu) && is_file("../_lib/menuicons/". $pagina_schemamenu .".php"))
{
    include("../_lib/menuicons/". $pagina_schemamenu .".php");
}
$this->img_sep_toolbar = trim($str_toolbar_separator);
include("../_lib/lang/config_region.php");
include("../_lib/lang/lang_config_region.php");
$this->regionalDefault();
$Str_btn_menu = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
$Str_btn_css  = trim($str_button) . "/" . trim($str_button) . ".css";
$this->css_menutab_active_close_icon    = trim($css_menutab_active_close_icon);
$this->css_menutab_inactive_close_icon  = trim($css_menutab_inactive_close_icon);
$this->breadcrumbline_separator  = trim($breadcrumbline_separator);
include($path_btn . $Str_btn_menu);
if (!function_exists("nmButtonOutput"))
{
   include_once("../_lib/lib/php/nm_gp_config_btn.php");
}
asort($this->Nm_lang_conf_region);
$this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
$this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
$this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
$this->nm_data = new nm_data("id");
include_once("menu_dani_toolbar.php");

$this->tab_grupo[0] = "simrskreatifmedia/";
if ($_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] != "S")
{
    $this->tab_grupo[0] = "";
}

     $_SESSION['scriptcase']['menu_atual'] = "menu_dani";
     $_SESSION['scriptcase']['menu_apls']['menu_dani'] = array();
     if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
     {
         foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
         {
             if (isset($_SESSION['scriptcase']['menu_dani']['glo_nm_conexao']) && $_SESSION['scriptcase']['menu_dani']['glo_nm_conexao'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['menu_dani']['glo_nm_conexao'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['menu_dani']['glo_nm_perfil']) && $_SESSION['scriptcase']['menu_dani']['glo_nm_perfil'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['menu_dani']['glo_nm_perfil'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['menu_dani']['glo_con_' . $NM_con_orig]))
             {
                 $_SESSION['scriptcase']['menu_dani']['glo_con_' . $NM_con_orig] = $NM_con_dest;
             }
         }
     }
$_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "ISO-8859-1";
ini_set('default_charset', $_SESSION['scriptcase']['charset']);
$_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
}
foreach ($this->Nm_lang as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
    {
        $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
        $this->Nm_lang[$ind] = $dados;
    }
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
}
if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
{
    $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
}
if (isset($_SESSION['scriptcase']['menu_dani']['session_timeout']['redir'])) {
    $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
';
    $SS_cod_html .= "<HTML>\r\n";
    $SS_cod_html .= " <HEAD>\r\n";
    $SS_cod_html .= "  <TITLE></TITLE>\r\n";
    $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
    if ($_SESSION['scriptcase']['proc_mobile']) {
        $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
    }
    $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
    $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
    if ($_SESSION['scriptcase']['menu_dani']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "  </HEAD>\r\n";
        $SS_cod_html .= "   <body>\r\n";
    }
    else {
        $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
        $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH.css\"/>\r\n";
        $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
        $SS_cod_html .= "  </HEAD>\r\n";
        $SS_cod_html .= "   <body class=\"scMenuHPage\">\r\n";
        $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div>\r\n";
        $SS_cod_html .= "    <table class=\"scMenuHTable\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scMenuHHeader\"><td class=\"scMenuHHeaderFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
        $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
        $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
        $SS_cod_html .= "           target=\"_self\">\r\n";
        $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['menu_dani']['session_timeout']['redir'] . "');\">\r\n";
        $SS_cod_html .= "     </form>\r\n";
        $SS_cod_html .= "    </td></tr></table>\r\n";
        $SS_cod_html .= "    </div></td></tr></table>\r\n";
    }
    $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
    if ($_SESSION['scriptcase']['menu_dani']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['menu_dani']['session_timeout']['redir'] . "');\r\n";
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
    unset($_SESSION['scriptcase']['menu_dani']['session_timeout']);
    unset($_SESSION['sc_session']);
}
if (isset($SS_cod_html))
{
    echo $SS_cod_html;
    exit;
}
$_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
$_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
$_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
if (is_dir($path_img_old))
{
    $Res_dir_img = @opendir($path_img_old);
    if ($Res_dir_img)
    {
        while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
        {
           $Str_arquivo = "/" . $Str_arquivo;
           if (@is_file($path_img_old . $Str_arquivo) && '.' != $Str_arquivo && '..' != $path_img_old . $Str_arquivo)
           {
               @unlink($path_img_old . $Str_arquivo);
           }
        }
    }
    @closedir($Res_dir_img);
    rmdir($path_img_old);
}
//
if (isset($_GET) && !empty($_GET))
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
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
        }
         $$nmgp_var = $nmgp_val;
    }
}
if (isset($_POST) && !empty($_POST))
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
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
        }
         $$nmgp_var = $nmgp_val;
    }
}
if (isset($script_case_init))
{
    $_SESSION['sc_session'][1]['menu_dani']['init'] = $script_case_init;
}
else
if (!isset($_SESSION['sc_session'][1]['menu_dani']['init']))
{
    $_SESSION['sc_session'][1]['menu_dani']['init'] = "";
}
$script_case_init = $_SESSION['sc_session'][1]['menu_dani']['init'];
if (isset($nmgp_parms) && !empty($nmgp_parms)) 
{ 
    $nmgp_parms = NM_decode_input($nmgp_parms);
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
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
       $Tmp_par   = $cadapar[0];;
       $$Tmp_par = $cadapar[1];
       $_SESSION[$cadapar[0]] = $cadapar[1];
       $ix++;
     }
} 
if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['menu_dani']['session_timeout']['redir']))
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
$nm_url_saida = "";
if (isset($nmgp_url_saida))
{
    $nm_url_saida = $nmgp_url_saida;
    if (isset($script_case_init))
    {
        $nm_url_saida .= "?script_case_init=" . NM_encode_input($script_case_init) . "&script_case_session=" . session_id();
    }
}
if (isset($_POST["nmgp_idioma"]) || isset($_POST["nmgp_schema"]))  
{ 
    $nm_url_saida = $_SESSION['scriptcase']['sc_saida_menu_dani'];
}
elseif (!empty($nm_url_saida))
{
    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]  = $nm_url_saida;
    $_SESSION['scriptcase']['sc_saida_menu_dani'] = $nm_url_saida;
}
else
{
    $_SESSION['scriptcase']['sc_saida_menu_dani'] = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "javascript:window.close()";
}
$this->sc_Include($path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
include_once($path_adodb . "/adodb.inc.php"); 
$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('menu_dani'); 
perfil_lib($path_libs);
if (!isset($_SESSION['sc_session'][1]['SC_Check_Perfil']))
{
    if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($path_libs, $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod']);
    $_SESSION['sc_session'][1]['SC_Check_Perfil'] = true;
}
$nm_falta_var    = ""; 
$nm_falta_var_db = ""; 
if (isset($_SESSION['scriptcase']['menu_dani']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['menu_dani']['glo_nm_conexao']))
{
    db_conect_devel($_SESSION['scriptcase']['menu_dani']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod'], 'simrskreatifmedia', 2); 
}
if (isset($_SESSION['scriptcase']['menu_dani']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['menu_dani']['glo_nm_perfil']))
{
   $_SESSION['scriptcase']['glo_perfil'] = $_SESSION['scriptcase']['menu_dani']['glo_nm_perfil'];
}
if (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['glo_perfil'], $path_libs, "");
    if (empty($_SESSION['scriptcase']['glo_senha_protect']))
    {
        $nm_falta_var .= "Perfil=" . $_SESSION['scriptcase']['glo_perfil'] . "; ";
    }
}
if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
{
    $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
    if (strlen($SC_temp) == 2)
    {
       $_SESSION['scriptcase']['menu_dani']['SC_sep_date']  = substr($SC_temp, 0, 1); 
       $_SESSION['scriptcase']['menu_dani']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
   }
   else
    {
       $_SESSION['scriptcase']['menu_dani']['SC_sep_date']  = $SC_temp; 
       $_SESSION['scriptcase']['menu_dani']['SC_sep_date1'] = $SC_temp; 
   }
}
if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
{
    $nm_falta_var_db .= "glo_tpbanco; ";
}
else
{
    $nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
}
if (!isset($_SESSION['scriptcase']['glo_servidor']))
{
    $nm_falta_var_db .= "glo_servidor; ";
}
else
{
    $nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
}
if (!isset($_SESSION['scriptcase']['glo_banco']))
{
    $nm_falta_var_db .= "glo_banco; ";
}
else
{
    $nm_banco = $_SESSION['scriptcase']['glo_banco']; 
}
if (!isset($_SESSION['scriptcase']['glo_usuario']))
{
    $nm_falta_var_db .= "glo_usuario; ";
}
else
{
    $nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
}
if (!isset($_SESSION['scriptcase']['glo_senha']))
{
    $nm_falta_var_db .= "glo_senha; ";
}
else
{
    $nm_senha = $_SESSION['scriptcase']['glo_senha']; 
}
$nm_con_db2 = array();
$nm_database_encoding = "";
if (isset($_SESSION['scriptcase']['glo_database_encoding']))
{
    $nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
}
$nm_arr_db_extra_args = array();
if (isset($_SESSION['scriptcase']['glo_use_ssl']))
{
    $nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
{
    $nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
{
    $nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
{
    $nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
{
    $nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
{
    $nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
{
    $nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
{
    $nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
{
    $nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
{
    $nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
{
    $nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
}
$nm_con_persistente = "";
$nm_con_use_schema  = "";
if (isset($_SESSION['scriptcase']['glo_use_persistent']))
{
    $nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
}
if (isset($_SESSION['scriptcase']['glo_use_schema']))
{
    $nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
}
if (!empty($nm_falta_var) || !empty($nm_falta_var_db))
{
    if (empty($nm_falta_var_db))
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
        echo "  " . $nm_falta_var;
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    else
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font>";
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    if (isset($_SESSION['scriptcase']['nm_ret_exec']) && '' != $_SESSION['scriptcase']['nm_ret_exec'])
    { 
        if (isset($_SESSION['sc_session'][1]['menu_dani']['sc_outra_jan']) && $_SESSION['sc_session'][1]['menu_dani']['sc_outra_jan'])
        {
            echo "<a href='javascript:window.close()'><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
        else 
        { 
            echo "<a href='" . $_SESSION['scriptcase']['nm_ret_exec'] . "><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
    } 
    exit ;
} 
if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
{
    $nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
{
    $nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
}
$sc_tem_trans_banco = false;
$this->nm_bases_access    = array("access", "ado_access", "ace_access");
$this->nm_bases_db2       = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
$this->nm_bases_ibase     = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
$this->nm_bases_informix  = array("informix", "informix72", "pdo_informix");
$this->nm_bases_mssql     = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib");
$this->nm_bases_mysql     = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql");
$this->nm_bases_postgres  = array("postgres", "postgres64", "postgres7", "pdo_pgsql");
$this->nm_bases_oracle    = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle");
$this->nm_bases_sqlite    = array("sqlite", "sqlite3", "pdosqlite");
$this->nm_bases_sybase    = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
$this->nm_bases_vfp       = array("vfp");
$this->nm_bases_odbc      = array("odbc");
$this->nm_bases_progress  = array("progress", "pdo_progress_odbc");
$_SESSION['scriptcase']['sc_num_page'] = 1;
$_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcJeDQFGHABYVWJeHuzGDkB/H5FqDoJeDcBqVINUDSrYHQraHgvCHEJqDuFaDoXGDcXOZ9F7HIrKD5XGDMvmVcFKV5BmVoBqD9BsZkFGHAvsD5BOHgrKHArsHEXCHMJsHQFYDQB/DSN7HuBqDMvmV9FiV5X/VErqHQJmZSBqDSNOHuB/HgNKDkFeV5FqHIB/HQXsDQBqD1veHuFUDMBYZSrCV5FYHMFGHQNmZSBqD1vsZMXGDMvCHAFKH5FYVoX7D9JKDQX7D1BOV5FGDMBYVcBUHEF/HMrqHQXOVINUHINKZMB/HgNKHEFKV5FqHMBiHQJKDQFUHINaVWBqDMvsV9FiV5FYHINUDcFYZSBqHIBOZMXGHgBODkBsV5FqHIBiHQJeDQFaDSN7HQF7DMvmV9FiH5FqDoJeD9JmZ1B/D1NaD5rqDErKZSXeH5FYDoFUD9NwDQJsHArYVWJsHuvmVcXKV5FGVoraD9BsH9FaHArKZMB/HgvCZSJ3V5XCVoB/D9NmDQFaZ1BYV5FUHuvmDkBOH5XKVoraD9BiVINUDSvOD5FaDEvsZSJGDuFaZuBqD9NwH9X7Z1rwV5JwHuBYVcFiV5X7VoFGDcBqH9FaHAN7V5JeDErKHEBUH5F/DoF7DcJeDQFGD1BeD5JwDMrwZSJ3H5FqDoJeD9JmZ1B/D1NaD5rqDErKZSXeH5FYDoFUD9JKDQJsZ1rwV5BqHuBYVcXKV5X7VErqD9XOZ1rqD1NaZMB/HgNKHArsDuXKZuBOHQXODuBqD1BOV5XGDMrYZSJ3V5F/DoJeD9BsH9B/D1rwD5NUDEBOHErCDWF/VoBiDcJUZSX7Z1BYHuFaHuNOVIBsDWF/HIJeHQFYZ1BOHIBeV5JeDEBOHEJGDuJeDoJsHQXOH9FUHArYV5FUDMBOV9FeDWXCDoJsDcBwH9B/Z1rYHQJwHgvCZSXeV5FqVoB/D9XsH9FGHABYV5raHgrKVcFKDWFaDoJsD9JmZkFUZ1NOD5BqDEBeHEBUDWF/HIJsD9XsZ9JeD1BeD5F7DMvmVcXKH5XKVoF7HQNmZkBiHABYHQrqHgveHArsDWFGDoBqHQFYZ9XGHAvOV5XGDMrYV9FeDuFqHMB/DcNmZ1BiHABYHQJwDEBODkFeH5FYVoFGHQJKDQJsHIBeV5JeHuBYVIB/H5FqHIraD9BsZkFGDSNOHQJsDErKHErsH5FGVoFGDcBiDQB/HIrwHuFUDMvmVcFKV5BmVoBqD9BsZkFGHArKV5FaDErKHENiV5FaDorqD9NwH9X7Z1rwD5NUHuBOVIBODWFYHMBiD9BsVIraD1rwV5X7HgBeHErsDWrGDoBOHQBiZ9XGHANKV5JeDMrYVcBUDWrmVorqHQJmZ1F7Z1vmD5rqDEBOHArCDWF/HIBOHQXsDQFaHArYD5BqHuvmVIBsV5X7DoX7D9XOZSBqHAvCV5X7DMveHEJGDWFqZuBOHQJKDQJsZ1vCV5FGHuNOV9FeDWXCHINUDcBqZ1B/DSrYD5JeDENOHEJGDWFqVoX7D9XsDQJsHArYD5BOHgNKVcXKDWJeVoB/DcJUZSB/DSrYZMFaDEBOHEFKDWF/HIF7D9NwZSX7HIBeV5FUHuNOV9FeDWXCDoJsDcBwH9B/Z1rYHQJwHgBYHAFKV5B3DoBO";
 $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['menu_dani']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['menu_dani']['glo_nm_conexao']))
{ 
   $this->Db = db_conect_devel($_SESSION['scriptcase']['menu_dani']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod'], 'simrskreatifmedia'); 
} 
else 
{ 
   $this->Db = db_conect($nm_tpbanco, $nm_servidor, $nm_usuario, $nm_senha, $nm_banco, $glo_senha_protect, "S", $nm_con_persistente, $nm_con_db2, $nm_database_encoding, $nm_arr_db_extra_args); 
} 
$this->nm_tpbanco = $nm_tpbanco; 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_ibase) && function_exists('ibase_timefmt'))
{
    ibase_timefmt('%Y-%m-%d %H:%M:%S');
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_sybase))
{
   $this->Db->fetchMode = ADODB_FETCH_BOTH;
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_db2))
{
   $this->Db->fetchMode = ADODB_FETCH_NUM;
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_mssql))
{
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_oracle))
{
   $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
   $_SESSION['sc_session'][$this->Ini->sc_page]['menu_dani']['decimal_db'] = ".";
} 
//
/* Dados do menu em sessao */
$_SESSION['nm_menu'] = array('prod' => $str_root . $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod'] . '/third/COOLjsMenu/',
                              'url' => $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod'] . '/third/COOLjsMenu/');

if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == "true") || (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'menu_dani'))
{
    $_SESSION['sc_session'][1]['menu_dani']['sc_outra_jan'] = true;
     unset($_SESSION['scriptcase']['sc_outra_jan']);
    $_SESSION['scriptcase']['sc_saida_menu_dani'] = "javascript:window.close()";
}
/* Menu configuration variables */
$menu_dani_menuData['iframe'] = TRUE;

if (!isset($_SESSION['scriptcase']['sc_apl_seg']))
{
    $_SESSION['scriptcase']['sc_apl_seg'] = array();
}
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank") . "/blank_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['blank'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['blank'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbantrian") . "/grid_tbantrian_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbantrian']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbantrian'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbantrian'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ketersediaan_bed") . "/grid_ketersediaan_bed_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ketersediaan_bed']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_ketersediaan_bed'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_ketersediaan_bed'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_harga_tindakan") . "/grid_harga_tindakan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_harga_tindakan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_harga_tindakan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_harga_tindakan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbadmrawatinap") . "/grid_tbadmrawatinap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadmrawatinap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbadmrawatinap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbadmrawatinap'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbpayment") . "/grid_tbpayment_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpayment']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpayment'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpayment'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbpaymentri") . "/grid_tbpaymentri_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaymentri']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaymentri'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaymentri'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_antrian") . "/grid_antrian_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_antrian']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_antrian'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_antrian'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdetailrawatjalan") . "/grid_tbdetailrawatjalan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdetailrawatinap") . "/grid_tbdetailrawatinap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdetailigd") . "/grid_tbdetailigd_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdetailok") . "/grid_tbdetailok_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailok']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailok'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailok'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdetailvk") . "/grid_tbdetailvk_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailvk']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailvk'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailvk'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdetailrawatjalan") . "/grid_tbdetailrawatjalan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdetailrawatinap") . "/grid_tbdetailrawatinap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdetailigd") . "/grid_tbdetailigd_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdetailrawatjalan") . "/grid_tbdetailrawatjalan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdetailigd") . "/grid_tbdetailigd_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdetailrawatinap") . "/grid_tbdetailrawatinap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbpo") . "/grid_tbpo_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpo']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpo'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpo'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbstockopname") . "/grid_tbstockopname_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbstockopname']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbstockopname'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbstockopname'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbcaraminum") . "/grid_tbcaraminum_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcaraminum']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbcaraminum'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbcaraminum'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbobat") . "/grid_tbobat_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbobat']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbobat'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbobat'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbgolonganobat") . "/grid_tbgolonganobat_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgolonganobat']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbgolonganobat'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbgolonganobat'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbpoli") . "/grid_tbpoli_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpoli']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpoli'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpoli'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbpbf") . "/grid_tbpbf_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpbf']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpbf'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpbf'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbinstansi") . "/grid_tbinstansi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbinstansi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbinstansi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbinstansi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbbu") . "/grid_tbbu_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbbu']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbbu'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbbu'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbgelardokter") . "/grid_tbgelardokter_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgelardokter']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbgelardokter'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbgelardokter'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdoctor") . "/grid_tbdoctor_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdoctor']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdoctor'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdoctor'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbcustomer") . "/grid_tbcustomer_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcustomer']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbcustomer'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbcustomer'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbhrd") . "/grid_tbhrd_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbhrd']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbhrd'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbhrd'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbtindakan") . "/grid_tbtindakan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbtindakan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbtindakan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbtindakan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbceklab") . "/grid_tbceklab_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbceklab']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbceklab'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbceklab'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbkelas") . "/grid_tbkelas_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbkelas']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbkelas'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbkelas'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbruang") . "/grid_tbruang_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbruang']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbruang'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbruang'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbadministrasi") . "/grid_tbadministrasi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadministrasi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbadministrasi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbadministrasi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_grid_sec_users") . "/sec_grid_sec_users_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_grid_sec_apps") . "/sec_grid_sec_apps_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_apps']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_apps'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_apps'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_grid_sec_groups") . "/sec_grid_sec_groups_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_groups']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_groups'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_groups'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_grid_sec_users_groups") . "/sec_grid_sec_users_groups_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users_groups']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users_groups'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users_groups'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_search_sec_groups") . "/sec_search_sec_groups_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_search_sec_groups']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_search_sec_groups'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_search_sec_groups'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_sync_apps") . "/sec_sync_apps_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_sync_apps']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_sync_apps'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_sync_apps'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_logged_users") . "/sec_logged_users_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_logged_users']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_logged_users'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_logged_users'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_change_pswd") . "/sec_change_pswd_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_change_pswd']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_change_pswd'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_change_pswd'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_Login") . "/sec_Login_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_Login']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_Login'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_Login'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_response_insert_sep") . "/grid_response_insert_sep_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_sep']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_sep'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_sep'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_response_insert_rujukan") . "/grid_response_insert_rujukan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_rujukan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_rujukan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_rujukan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_vclaim_insert_lpk") . "/form_vclaim_insert_lpk_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_insert_lpk']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_insert_lpk'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_insert_lpk'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("aplicare_view_tersedia_kamar") . "/aplicare_view_tersedia_kamar_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['aplicare_view_tersedia_kamar']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['aplicare_view_tersedia_kamar'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['aplicare_view_tersedia_kamar'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_jabatan") . "/grid_hrm_jabatan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_karyawan") . "/grid_hrm_karyawan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_karyawan_tetap") . "/grid_hrm_karyawan_tetap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan_tetap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan_tetap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan_tetap'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_jabatan_karyawan") . "/grid_hrm_jabatan_karyawan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan_karyawan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan_karyawan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan_karyawan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_kontrak_kerja") . "/grid_hrm_kontrak_kerja_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_kontrak_kerja']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_kontrak_kerja'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_kontrak_kerja'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_pendidikan") . "/grid_hrm_pendidikan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_pendidikan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_pendidikan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_pendidikan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_mesin_presensi") . "/grid_hrm_mesin_presensi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_mesin_presensi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_mesin_presensi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_mesin_presensi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_user_presensi") . "/grid_hrm_user_presensi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_user_presensi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_user_presensi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_user_presensi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_data_presensi") . "/grid_hrm_data_presensi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_data_presensi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_data_presensi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_data_presensi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_daftar_shift") . "/grid_hrm_daftar_shift_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_daftar_shift']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_daftar_shift'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_daftar_shift'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_shift_karyawan") . "/grid_hrm_shift_karyawan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_shift_karyawan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_shift_karyawan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_shift_karyawan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_periode_remunerasi") . "/grid_hrm_periode_remunerasi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_periode_remunerasi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_periode_remunerasi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_periode_remunerasi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_remunerasi_tetap") . "/grid_hrm_remunerasi_tetap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tetap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tetap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tetap'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_remunerasi_tidak_tetap") . "/grid_hrm_remunerasi_tidak_tetap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tidak_tetap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tidak_tetap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tidak_tetap'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_potongan_tetap") . "/grid_hrm_potongan_tetap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tetap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tetap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tetap'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_potongan_tidak_tetap") . "/grid_hrm_potongan_tidak_tetap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tidak_tetap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tidak_tetap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tidak_tetap'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_overtime") . "/grid_hrm_overtime_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_overtime']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_overtime'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_overtime'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_kalkulasi_remunerasi") . "/form_kalkulasi_remunerasi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_kalkulasi_remunerasi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_kalkulasi_remunerasi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_kalkulasi_remunerasi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_remunerasi_pembayaran") . "/grid_hrm_remunerasi_pembayaran_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_pembayaran']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_pembayaran'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_pembayaran'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_akun_header") . "/grid_akun_header_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_akun_header']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_akun_header'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_akun_header'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_akun") . "/grid_akun_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_akun']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_akun'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_akun'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_jenis_transaksi") . "/grid_jenis_transaksi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jenis_transaksi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_jenis_transaksi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_jenis_transaksi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_map_transaksi_jurnal") . "/grid_map_transaksi_jurnal_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_map_transaksi_jurnal']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_map_transaksi_jurnal'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_map_transaksi_jurnal'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_jurnal") . "/grid_jurnal_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_jurnal_master") . "/grid_jurnal_master_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal_master']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal_master'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal_master'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_period_journal_summary") . "/form_period_journal_summary_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_journal_summary']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_period_journal_summary'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_period_journal_summary'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_period_general_ledger_summary") . "/form_period_general_ledger_summary_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_general_ledger_summary']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_period_general_ledger_summary'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_period_general_ledger_summary'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_period_trial_balance") . "/form_period_trial_balance_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_trial_balance']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_period_trial_balance'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_period_trial_balance'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_period_balance_sheet") . "/form_period_balance_sheet_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_balance_sheet']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_period_balance_sheet'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_period_balance_sheet'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_period_income_summary") . "/form_period_income_summary_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_income_summary']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_period_income_summary'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_period_income_summary'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_period_equity") . "/form_period_equity_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_equity']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_period_equity'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_period_equity'] = "on";
} 
/* Menu items */

$sOutputBuffer = ob_get_contents();
ob_end_clean();

 $nm_var_lab[0] = "Transaksi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[0]))
{
    $nm_var_lab[0] = sc_convert_encoding($nm_var_lab[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[1] = "Transaksi Harian";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[1]))
{
    $nm_var_lab[1] = sc_convert_encoding($nm_var_lab[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[2] = "Antrian";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[2]))
{
    $nm_var_lab[2] = sc_convert_encoding($nm_var_lab[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[3] = "Ketersediaan Bed";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[3]))
{
    $nm_var_lab[3] = sc_convert_encoding($nm_var_lab[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[4] = "Harga Tindakan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[4]))
{
    $nm_var_lab[4] = sc_convert_encoding($nm_var_lab[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[5] = "Admission Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[5]))
{
    $nm_var_lab[5] = sc_convert_encoding($nm_var_lab[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[6] = "Pembayaran";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[6]))
{
    $nm_var_lab[6] = sc_convert_encoding($nm_var_lab[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[7] = "Pembayaran RI";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[7]))
{
    $nm_var_lab[7] = sc_convert_encoding($nm_var_lab[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[8] = "Data Antrian";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[8]))
{
    $nm_var_lab[8] = sc_convert_encoding($nm_var_lab[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[9] = "Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[9]))
{
    $nm_var_lab[9] = sc_convert_encoding($nm_var_lab[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[10] = "Rawat Jalan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[10]))
{
    $nm_var_lab[10] = sc_convert_encoding($nm_var_lab[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[11] = "Visite Pasien";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[11]))
{
    $nm_var_lab[11] = sc_convert_encoding($nm_var_lab[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[12] = "IGD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[12]))
{
    $nm_var_lab[12] = sc_convert_encoding($nm_var_lab[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[13] = "Kamar Operasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[13]))
{
    $nm_var_lab[13] = sc_convert_encoding($nm_var_lab[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[14] = "Kamar Bersalin";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[14]))
{
    $nm_var_lab[14] = sc_convert_encoding($nm_var_lab[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[15] = "Cek Lab";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[15]))
{
    $nm_var_lab[15] = sc_convert_encoding($nm_var_lab[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[16] = "Pasien Rawat Jalan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[16]))
{
    $nm_var_lab[16] = sc_convert_encoding($nm_var_lab[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[17] = "Pasien Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[17]))
{
    $nm_var_lab[17] = sc_convert_encoding($nm_var_lab[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[18] = "Pasien IGD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[18]))
{
    $nm_var_lab[18] = sc_convert_encoding($nm_var_lab[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[19] = "RM";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[19]))
{
    $nm_var_lab[19] = sc_convert_encoding($nm_var_lab[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[20] = "Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[20]))
{
    $nm_var_lab[20] = sc_convert_encoding($nm_var_lab[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[21] = "Resep Dokter";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[21]))
{
    $nm_var_lab[21] = sc_convert_encoding($nm_var_lab[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[22] = "Resep Dokter RJ";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[22]))
{
    $nm_var_lab[22] = sc_convert_encoding($nm_var_lab[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[23] = "Resep Dokter IGD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[23]))
{
    $nm_var_lab[23] = sc_convert_encoding($nm_var_lab[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[24] = "Resep Dokter - RI";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[24]))
{
    $nm_var_lab[24] = sc_convert_encoding($nm_var_lab[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[25] = "Purchase Order";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[25]))
{
    $nm_var_lab[25] = sc_convert_encoding($nm_var_lab[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[26] = "Stock Opname";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[26]))
{
    $nm_var_lab[26] = sc_convert_encoding($nm_var_lab[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[27] = "Aturan Penggunaan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[27]))
{
    $nm_var_lab[27] = sc_convert_encoding($nm_var_lab[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[28] = "Data Master";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[28]))
{
    $nm_var_lab[28] = sc_convert_encoding($nm_var_lab[28], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[29] = "Item";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[29]))
{
    $nm_var_lab[29] = sc_convert_encoding($nm_var_lab[29], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[30] = "Item / Barang";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[30]))
{
    $nm_var_lab[30] = sc_convert_encoding($nm_var_lab[30], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[31] = "Formula Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[31]))
{
    $nm_var_lab[31] = sc_convert_encoding($nm_var_lab[31], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[32] = "Jenis Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[32]))
{
    $nm_var_lab[32] = sc_convert_encoding($nm_var_lab[32], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[33] = "Item Umum";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[33]))
{
    $nm_var_lab[33] = sc_convert_encoding($nm_var_lab[33], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[34] = "Formularium";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[34]))
{
    $nm_var_lab[34] = sc_convert_encoding($nm_var_lab[34], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[35] = "Lembaga dan Sarana";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[35]))
{
    $nm_var_lab[35] = sc_convert_encoding($nm_var_lab[35], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[36] = "Poliklinik";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[36]))
{
    $nm_var_lab[36] = sc_convert_encoding($nm_var_lab[36], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[37] = "PBF Supplier";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[37]))
{
    $nm_var_lab[37] = sc_convert_encoding($nm_var_lab[37], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[38] = "Instansi Penjamin";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[38]))
{
    $nm_var_lab[38] = sc_convert_encoding($nm_var_lab[38], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[39] = "Sediaan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[39]))
{
    $nm_var_lab[39] = sc_convert_encoding($nm_var_lab[39], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[40] = "Bank & EDC";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[40]))
{
    $nm_var_lab[40] = sc_convert_encoding($nm_var_lab[40], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[41] = "Lokasi (Ruang)";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[41]))
{
    $nm_var_lab[41] = sc_convert_encoding($nm_var_lab[41], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[42] = "Jenis Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[42]))
{
    $nm_var_lab[42] = sc_convert_encoding($nm_var_lab[42], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[43] = "Perusahaan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[43]))
{
    $nm_var_lab[43] = sc_convert_encoding($nm_var_lab[43], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[44] = "Gelar Dokter";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[44]))
{
    $nm_var_lab[44] = sc_convert_encoding($nm_var_lab[44], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[45] = "Departemen";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[45]))
{
    $nm_var_lab[45] = sc_convert_encoding($nm_var_lab[45], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[46] = "Vendor Umum";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[46]))
{
    $nm_var_lab[46] = sc_convert_encoding($nm_var_lab[46], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[47] = "Dokter & Staff";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[47]))
{
    $nm_var_lab[47] = sc_convert_encoding($nm_var_lab[47], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[48] = "Dokter";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[48]))
{
    $nm_var_lab[48] = sc_convert_encoding($nm_var_lab[48], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[49] = "Pasien";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[49]))
{
    $nm_var_lab[49] = sc_convert_encoding($nm_var_lab[49], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[50] = "Karyawan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[50]))
{
    $nm_var_lab[50] = sc_convert_encoding($nm_var_lab[50], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[51] = "Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[51]))
{
    $nm_var_lab[51] = sc_convert_encoding($nm_var_lab[51], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[52] = "Tindakan Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[52]))
{
    $nm_var_lab[52] = sc_convert_encoding($nm_var_lab[52], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[53] = "Pemeriksaan Lab";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[53]))
{
    $nm_var_lab[53] = sc_convert_encoding($nm_var_lab[53], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[54] = "Kamar Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[54]))
{
    $nm_var_lab[54] = sc_convert_encoding($nm_var_lab[54], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[55] = "Manajemen Ruang Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[55]))
{
    $nm_var_lab[55] = sc_convert_encoding($nm_var_lab[55], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[56] = "ICD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[56]))
{
    $nm_var_lab[56] = sc_convert_encoding($nm_var_lab[56], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[57] = "Item MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[57]))
{
    $nm_var_lab[57] = sc_convert_encoding($nm_var_lab[57], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[58] = "Paket MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[58]))
{
    $nm_var_lab[58] = sc_convert_encoding($nm_var_lab[58], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[59] = "Parameter MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[59]))
{
    $nm_var_lab[59] = sc_convert_encoding($nm_var_lab[59], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[60] = "Susunan Morbiditas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[60]))
{
    $nm_var_lab[60] = sc_convert_encoding($nm_var_lab[60], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[61] = "Administrasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[61]))
{
    $nm_var_lab[61] = sc_convert_encoding($nm_var_lab[61], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[62] = "Setting Administrasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[62]))
{
    $nm_var_lab[62] = sc_convert_encoding($nm_var_lab[62], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[63] = "Tindakan Eksternal";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[63]))
{
    $nm_var_lab[63] = sc_convert_encoding($nm_var_lab[63], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[64] = "Setting Cashflow";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[64]))
{
    $nm_var_lab[64] = sc_convert_encoding($nm_var_lab[64], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[65] = "Pendapatan Lain";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[65]))
{
    $nm_var_lab[65] = sc_convert_encoding($nm_var_lab[65], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[66] = "Insentif Tim MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[66]))
{
    $nm_var_lab[66] = sc_convert_encoding($nm_var_lab[66], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[67] = "Paket Kamar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[67]))
{
    $nm_var_lab[67] = sc_convert_encoding($nm_var_lab[67], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[68] = "Kode Norma";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[68]))
{
    $nm_var_lab[68] = sc_convert_encoding($nm_var_lab[68], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[69] = "Executive Summary";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[69]))
{
    $nm_var_lab[69] = sc_convert_encoding($nm_var_lab[69], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[70] = "Rawat Jalan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[70]))
{
    $nm_var_lab[70] = sc_convert_encoding($nm_var_lab[70], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[71] = "Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[71]))
{
    $nm_var_lab[71] = sc_convert_encoding($nm_var_lab[71], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[72] = "Kamar Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[72]))
{
    $nm_var_lab[72] = sc_convert_encoding($nm_var_lab[72], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[73] = "Laporan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[73]))
{
    $nm_var_lab[73] = sc_convert_encoding($nm_var_lab[73], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[74] = "Laporan Umum";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[74]))
{
    $nm_var_lab[74] = sc_convert_encoding($nm_var_lab[74], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[75] = "Laporan Penjualan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[75]))
{
    $nm_var_lab[75] = sc_convert_encoding($nm_var_lab[75], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[76] = "Laporan Pembelian";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[76]))
{
    $nm_var_lab[76] = sc_convert_encoding($nm_var_lab[76], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[77] = "Laporan Retur";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[77]))
{
    $nm_var_lab[77] = sc_convert_encoding($nm_var_lab[77], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[78] = "Laporan Rawat Jalan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[78]))
{
    $nm_var_lab[78] = sc_convert_encoding($nm_var_lab[78], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[79] = "Laporan Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[79]))
{
    $nm_var_lab[79] = sc_convert_encoding($nm_var_lab[79], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[80] = "Laporan Penerimaan Kasir";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[80]))
{
    $nm_var_lab[80] = sc_convert_encoding($nm_var_lab[80], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[81] = "Jurnal Umum";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[81]))
{
    $nm_var_lab[81] = sc_convert_encoding($nm_var_lab[81], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[82] = "Buku Besar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[82]))
{
    $nm_var_lab[82] = sc_convert_encoding($nm_var_lab[82], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[83] = "Neraca";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[83]))
{
    $nm_var_lab[83] = sc_convert_encoding($nm_var_lab[83], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[84] = "Lap Profitabilitas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[84]))
{
    $nm_var_lab[84] = sc_convert_encoding($nm_var_lab[84], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[85] = "Laporan Gizi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[85]))
{
    $nm_var_lab[85] = sc_convert_encoding($nm_var_lab[85], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[86] = "Laporan IGD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[86]))
{
    $nm_var_lab[86] = sc_convert_encoding($nm_var_lab[86], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[87] = "Antrian Poli";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[87]))
{
    $nm_var_lab[87] = sc_convert_encoding($nm_var_lab[87], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[88] = "Laporan Praktek";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[88]))
{
    $nm_var_lab[88] = sc_convert_encoding($nm_var_lab[88], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[89] = "Laporan Rujukan Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[89]))
{
    $nm_var_lab[89] = sc_convert_encoding($nm_var_lab[89], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[90] = "Laporan Pembatalan Poli";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[90]))
{
    $nm_var_lab[90] = sc_convert_encoding($nm_var_lab[90], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[91] = "Laporan Sewa Alat dan BHP";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[91]))
{
    $nm_var_lab[91] = sc_convert_encoding($nm_var_lab[91], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[92] = "Status Crew";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[92]))
{
    $nm_var_lab[92] = sc_convert_encoding($nm_var_lab[92], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[93] = "Laporan Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[93]))
{
    $nm_var_lab[93] = sc_convert_encoding($nm_var_lab[93], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[94] = "Rekam Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[94]))
{
    $nm_var_lab[94] = sc_convert_encoding($nm_var_lab[94], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[95] = "Resume Medik";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[95]))
{
    $nm_var_lab[95] = sc_convert_encoding($nm_var_lab[95], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[96] = "Salinan Resep";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[96]))
{
    $nm_var_lab[96] = sc_convert_encoding($nm_var_lab[96], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[97] = "Surat Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[97]))
{
    $nm_var_lab[97] = sc_convert_encoding($nm_var_lab[97], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[98] = "Laporan Lab";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[98]))
{
    $nm_var_lab[98] = sc_convert_encoding($nm_var_lab[98], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[99] = "Laporan Radiologi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[99]))
{
    $nm_var_lab[99] = sc_convert_encoding($nm_var_lab[99], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[100] = "Laporan Resep";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[100]))
{
    $nm_var_lab[100] = sc_convert_encoding($nm_var_lab[100], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[101] = "Status Karyawan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[101]))
{
    $nm_var_lab[101] = sc_convert_encoding($nm_var_lab[101], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[102] = "Laporan MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[102]))
{
    $nm_var_lab[102] = sc_convert_encoding($nm_var_lab[102], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[103] = "Master Keluarga";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[103]))
{
    $nm_var_lab[103] = sc_convert_encoding($nm_var_lab[103], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[104] = "Rekapitulasi Medis MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[104]))
{
    $nm_var_lab[104] = sc_convert_encoding($nm_var_lab[104], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[105] = "Laporan OK VK";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[105]))
{
    $nm_var_lab[105] = sc_convert_encoding($nm_var_lab[105], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[106] = "Laporan Pemakaian Item";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[106]))
{
    $nm_var_lab[106] = sc_convert_encoding($nm_var_lab[106], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[107] = "Laporan Sensus";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[107]))
{
    $nm_var_lab[107] = sc_convert_encoding($nm_var_lab[107], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[108] = "Sensus";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[108]))
{
    $nm_var_lab[108] = sc_convert_encoding($nm_var_lab[108], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[109] = "Laporan RL";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[109]))
{
    $nm_var_lab[109] = sc_convert_encoding($nm_var_lab[109], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[110] = "Taksiran Persalinan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[110]))
{
    $nm_var_lab[110] = sc_convert_encoding($nm_var_lab[110], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[111] = "Laporan Persalinan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[111]))
{
    $nm_var_lab[111] = sc_convert_encoding($nm_var_lab[111], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[112] = "Laporan Morbiditas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[112]))
{
    $nm_var_lab[112] = sc_convert_encoding($nm_var_lab[112], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[113] = "Laporan Kegiatan Pelayanan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[113]))
{
    $nm_var_lab[113] = sc_convert_encoding($nm_var_lab[113], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[114] = "Laporan Bulanan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[114]))
{
    $nm_var_lab[114] = sc_convert_encoding($nm_var_lab[114], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[115] = "Deleted";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[115]))
{
    $nm_var_lab[115] = sc_convert_encoding($nm_var_lab[115], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[116] = "Radiologi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[116]))
{
    $nm_var_lab[116] = sc_convert_encoding($nm_var_lab[116], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[117] = "Tebus Resep";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[117]))
{
    $nm_var_lab[117] = sc_convert_encoding($nm_var_lab[117], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[118] = "Daftar Jaga IGD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[118]))
{
    $nm_var_lab[118] = sc_convert_encoding($nm_var_lab[118], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[119] = "Hasil X-Ray";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[119]))
{
    $nm_var_lab[119] = sc_convert_encoding($nm_var_lab[119], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[120] = "SOAP Perawat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[120]))
{
    $nm_var_lab[120] = sc_convert_encoding($nm_var_lab[120], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[121] = "Pendapatan Lain-lain";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[121]))
{
    $nm_var_lab[121] = sc_convert_encoding($nm_var_lab[121], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[122] = "Appointment";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[122]))
{
    $nm_var_lab[122] = sc_convert_encoding($nm_var_lab[122], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[123] = "Jadwal Praktik";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[123]))
{
    $nm_var_lab[123] = sc_convert_encoding($nm_var_lab[123], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[124] = "Addmision MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[124]))
{
    $nm_var_lab[124] = sc_convert_encoding($nm_var_lab[124], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[125] = "Pengesahan Asuransi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[125]))
{
    $nm_var_lab[125] = sc_convert_encoding($nm_var_lab[125], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[126] = "Asuhan Keperawatan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[126]))
{
    $nm_var_lab[126] = sc_convert_encoding($nm_var_lab[126], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[127] = "Formula Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[127]))
{
    $nm_var_lab[127] = sc_convert_encoding($nm_var_lab[127], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[128] = "Formula Lab";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[128]))
{
    $nm_var_lab[128] = sc_convert_encoding($nm_var_lab[128], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[129] = "Mapping ICD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[129]))
{
    $nm_var_lab[129] = sc_convert_encoding($nm_var_lab[129], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[130] = "MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[130]))
{
    $nm_var_lab[130] = sc_convert_encoding($nm_var_lab[130], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[131] = "Tracer";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[131]))
{
    $nm_var_lab[131] = sc_convert_encoding($nm_var_lab[131], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[132] = "Tindakan Tambahan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[132]))
{
    $nm_var_lab[132] = sc_convert_encoding($nm_var_lab[132], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[133] = "Tindakan Dokter";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[133]))
{
    $nm_var_lab[133] = sc_convert_encoding($nm_var_lab[133], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[134] = "Rujukan Lab & Rad";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[134]))
{
    $nm_var_lab[134] = sc_convert_encoding($nm_var_lab[134], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[135] = "Master IGD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[135]))
{
    $nm_var_lab[135] = sc_convert_encoding($nm_var_lab[135], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[136] = "Signa";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[136]))
{
    $nm_var_lab[136] = sc_convert_encoding($nm_var_lab[136], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[137] = "Pemeriksaan Radiologi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[137]))
{
    $nm_var_lab[137] = sc_convert_encoding($nm_var_lab[137], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[138] = "Gizi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[138]))
{
    $nm_var_lab[138] = sc_convert_encoding($nm_var_lab[138], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[139] = "Tindakan Bedah";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[139]))
{
    $nm_var_lab[139] = sc_convert_encoding($nm_var_lab[139], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[140] = "Retur";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[140]))
{
    $nm_var_lab[140] = sc_convert_encoding($nm_var_lab[140], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[141] = "Penggunaan Item";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[141]))
{
    $nm_var_lab[141] = sc_convert_encoding($nm_var_lab[141], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[142] = "Bridging";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[142]))
{
    $nm_var_lab[142] = sc_convert_encoding($nm_var_lab[142], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[143] = "VClaim";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[143]))
{
    $nm_var_lab[143] = sc_convert_encoding($nm_var_lab[143], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[144] = "SEP";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[144]))
{
    $nm_var_lab[144] = sc_convert_encoding($nm_var_lab[144], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[145] = "Rujukan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[145]))
{
    $nm_var_lab[145] = sc_convert_encoding($nm_var_lab[145], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[146] = "LPK";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[146]))
{
    $nm_var_lab[146] = sc_convert_encoding($nm_var_lab[146], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[147] = "Aplicare";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[147]))
{
    $nm_var_lab[147] = sc_convert_encoding($nm_var_lab[147], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[148] = "HR Management";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[148]))
{
    $nm_var_lab[148] = sc_convert_encoding($nm_var_lab[148], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[149] = "Referensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[149]))
{
    $nm_var_lab[149] = sc_convert_encoding($nm_var_lab[149], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[150] = "Jabatan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[150]))
{
    $nm_var_lab[150] = sc_convert_encoding($nm_var_lab[150], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[151] = "Karyawan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[151]))
{
    $nm_var_lab[151] = sc_convert_encoding($nm_var_lab[151], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[152] = "Daftar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[152]))
{
    $nm_var_lab[152] = sc_convert_encoding($nm_var_lab[152], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[153] = "Karyawan Tetap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[153]))
{
    $nm_var_lab[153] = sc_convert_encoding($nm_var_lab[153], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[154] = "Jabatan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[154]))
{
    $nm_var_lab[154] = sc_convert_encoding($nm_var_lab[154], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[155] = "Kontrak Kerja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[155]))
{
    $nm_var_lab[155] = sc_convert_encoding($nm_var_lab[155], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[156] = "Pendidikan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[156]))
{
    $nm_var_lab[156] = sc_convert_encoding($nm_var_lab[156], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[157] = "Presensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[157]))
{
    $nm_var_lab[157] = sc_convert_encoding($nm_var_lab[157], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[158] = "Mesin Presensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[158]))
{
    $nm_var_lab[158] = sc_convert_encoding($nm_var_lab[158], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[159] = "User Presensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[159]))
{
    $nm_var_lab[159] = sc_convert_encoding($nm_var_lab[159], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[160] = "Data Presensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[160]))
{
    $nm_var_lab[160] = sc_convert_encoding($nm_var_lab[160], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[161] = "Manajemen Shift";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[161]))
{
    $nm_var_lab[161] = sc_convert_encoding($nm_var_lab[161], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[162] = "Referensi Shift";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[162]))
{
    $nm_var_lab[162] = sc_convert_encoding($nm_var_lab[162], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[163] = "Shift Karyawan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[163]))
{
    $nm_var_lab[163] = sc_convert_encoding($nm_var_lab[163], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[164] = "Remunerasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[164]))
{
    $nm_var_lab[164] = sc_convert_encoding($nm_var_lab[164], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[165] = "Periode Remunerasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[165]))
{
    $nm_var_lab[165] = sc_convert_encoding($nm_var_lab[165], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[166] = "Remunerasi Tetap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[166]))
{
    $nm_var_lab[166] = sc_convert_encoding($nm_var_lab[166], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[167] = "Remunerasi Tidak Tetap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[167]))
{
    $nm_var_lab[167] = sc_convert_encoding($nm_var_lab[167], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[168] = "Potongan Tetap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[168]))
{
    $nm_var_lab[168] = sc_convert_encoding($nm_var_lab[168], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[169] = "Potongan Tidak Tetap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[169]))
{
    $nm_var_lab[169] = sc_convert_encoding($nm_var_lab[169], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[170] = "Lembur";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[170]))
{
    $nm_var_lab[170] = sc_convert_encoding($nm_var_lab[170], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[171] = "Proses";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[171]))
{
    $nm_var_lab[171] = sc_convert_encoding($nm_var_lab[171], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[172] = "Daftar Pembayaran";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[172]))
{
    $nm_var_lab[172] = sc_convert_encoding($nm_var_lab[172], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[173] = "Finansial";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[173]))
{
    $nm_var_lab[173] = sc_convert_encoding($nm_var_lab[173], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[174] = "Akuntansi - Referensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[174]))
{
    $nm_var_lab[174] = sc_convert_encoding($nm_var_lab[174], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[175] = "Bagan Akun - Header";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[175]))
{
    $nm_var_lab[175] = sc_convert_encoding($nm_var_lab[175], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[176] = "Bagan Akun - Detil";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[176]))
{
    $nm_var_lab[176] = sc_convert_encoding($nm_var_lab[176], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[177] = "Jenis Transaksi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[177]))
{
    $nm_var_lab[177] = sc_convert_encoding($nm_var_lab[177], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[178] = "Tautan Jurnal - Transaksi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[178]))
{
    $nm_var_lab[178] = sc_convert_encoding($nm_var_lab[178], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[179] = "Akuntansi - Pencatatan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[179]))
{
    $nm_var_lab[179] = sc_convert_encoding($nm_var_lab[179], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[180] = "Posting Transaksi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[180]))
{
    $nm_var_lab[180] = sc_convert_encoding($nm_var_lab[180], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[181] = "Jurnal Umum";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[181]))
{
    $nm_var_lab[181] = sc_convert_encoding($nm_var_lab[181], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[182] = "Akuntansi - Pelaporan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[182]))
{
    $nm_var_lab[182] = sc_convert_encoding($nm_var_lab[182], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[183] = "Ikhtisar Jurnal";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[183]))
{
    $nm_var_lab[183] = sc_convert_encoding($nm_var_lab[183], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[184] = "Ikhtisar Buku Besar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[184]))
{
    $nm_var_lab[184] = sc_convert_encoding($nm_var_lab[184], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[185] = "Neraca Saldo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[185]))
{
    $nm_var_lab[185] = sc_convert_encoding($nm_var_lab[185], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[186] = "Neraca";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[186]))
{
    $nm_var_lab[186] = sc_convert_encoding($nm_var_lab[186], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[187] = "Operasional";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[187]))
{
    $nm_var_lab[187] = sc_convert_encoding($nm_var_lab[187], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[188] = "Perubahan Ekuitas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[188]))
{
    $nm_var_lab[188] = sc_convert_encoding($nm_var_lab[188], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[0] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[0]))
{
    $nm_var_hint[0] = sc_convert_encoding($nm_var_hint[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[1] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[1]))
{
    $nm_var_hint[1] = sc_convert_encoding($nm_var_hint[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[2] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[2]))
{
    $nm_var_hint[2] = sc_convert_encoding($nm_var_hint[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[3] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[3]))
{
    $nm_var_hint[3] = sc_convert_encoding($nm_var_hint[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[4] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[4]))
{
    $nm_var_hint[4] = sc_convert_encoding($nm_var_hint[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[5] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[5]))
{
    $nm_var_hint[5] = sc_convert_encoding($nm_var_hint[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[6] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[6]))
{
    $nm_var_hint[6] = sc_convert_encoding($nm_var_hint[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[7] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[7]))
{
    $nm_var_hint[7] = sc_convert_encoding($nm_var_hint[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[8] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[8]))
{
    $nm_var_hint[8] = sc_convert_encoding($nm_var_hint[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[9] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[9]))
{
    $nm_var_hint[9] = sc_convert_encoding($nm_var_hint[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[10] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[10]))
{
    $nm_var_hint[10] = sc_convert_encoding($nm_var_hint[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[11] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[11]))
{
    $nm_var_hint[11] = sc_convert_encoding($nm_var_hint[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[12] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[12]))
{
    $nm_var_hint[12] = sc_convert_encoding($nm_var_hint[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[13] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[13]))
{
    $nm_var_hint[13] = sc_convert_encoding($nm_var_hint[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[14] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[14]))
{
    $nm_var_hint[14] = sc_convert_encoding($nm_var_hint[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[15] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[15]))
{
    $nm_var_hint[15] = sc_convert_encoding($nm_var_hint[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[16] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[16]))
{
    $nm_var_hint[16] = sc_convert_encoding($nm_var_hint[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[17] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[17]))
{
    $nm_var_hint[17] = sc_convert_encoding($nm_var_hint[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[18] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[18]))
{
    $nm_var_hint[18] = sc_convert_encoding($nm_var_hint[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[19] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[19]))
{
    $nm_var_hint[19] = sc_convert_encoding($nm_var_hint[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[20] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[20]))
{
    $nm_var_hint[20] = sc_convert_encoding($nm_var_hint[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[21] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[21]))
{
    $nm_var_hint[21] = sc_convert_encoding($nm_var_hint[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[22] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[22]))
{
    $nm_var_hint[22] = sc_convert_encoding($nm_var_hint[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[23] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[23]))
{
    $nm_var_hint[23] = sc_convert_encoding($nm_var_hint[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[24] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[24]))
{
    $nm_var_hint[24] = sc_convert_encoding($nm_var_hint[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[25] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[25]))
{
    $nm_var_hint[25] = sc_convert_encoding($nm_var_hint[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[26] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[26]))
{
    $nm_var_hint[26] = sc_convert_encoding($nm_var_hint[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[27] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[27]))
{
    $nm_var_hint[27] = sc_convert_encoding($nm_var_hint[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[28] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[28]))
{
    $nm_var_hint[28] = sc_convert_encoding($nm_var_hint[28], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[29] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[29]))
{
    $nm_var_hint[29] = sc_convert_encoding($nm_var_hint[29], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[30] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[30]))
{
    $nm_var_hint[30] = sc_convert_encoding($nm_var_hint[30], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[31] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[31]))
{
    $nm_var_hint[31] = sc_convert_encoding($nm_var_hint[31], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[32] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[32]))
{
    $nm_var_hint[32] = sc_convert_encoding($nm_var_hint[32], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[33] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[33]))
{
    $nm_var_hint[33] = sc_convert_encoding($nm_var_hint[33], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[34] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[34]))
{
    $nm_var_hint[34] = sc_convert_encoding($nm_var_hint[34], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[35] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[35]))
{
    $nm_var_hint[35] = sc_convert_encoding($nm_var_hint[35], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[36] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[36]))
{
    $nm_var_hint[36] = sc_convert_encoding($nm_var_hint[36], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[37] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[37]))
{
    $nm_var_hint[37] = sc_convert_encoding($nm_var_hint[37], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[38] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[38]))
{
    $nm_var_hint[38] = sc_convert_encoding($nm_var_hint[38], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[39] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[39]))
{
    $nm_var_hint[39] = sc_convert_encoding($nm_var_hint[39], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[40] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[40]))
{
    $nm_var_hint[40] = sc_convert_encoding($nm_var_hint[40], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[41] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[41]))
{
    $nm_var_hint[41] = sc_convert_encoding($nm_var_hint[41], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[42] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[42]))
{
    $nm_var_hint[42] = sc_convert_encoding($nm_var_hint[42], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[43] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[43]))
{
    $nm_var_hint[43] = sc_convert_encoding($nm_var_hint[43], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[44] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[44]))
{
    $nm_var_hint[44] = sc_convert_encoding($nm_var_hint[44], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[45] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[45]))
{
    $nm_var_hint[45] = sc_convert_encoding($nm_var_hint[45], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[46] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[46]))
{
    $nm_var_hint[46] = sc_convert_encoding($nm_var_hint[46], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[47] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[47]))
{
    $nm_var_hint[47] = sc_convert_encoding($nm_var_hint[47], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[48] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[48]))
{
    $nm_var_hint[48] = sc_convert_encoding($nm_var_hint[48], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[49] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[49]))
{
    $nm_var_hint[49] = sc_convert_encoding($nm_var_hint[49], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[50] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[50]))
{
    $nm_var_hint[50] = sc_convert_encoding($nm_var_hint[50], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[51] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[51]))
{
    $nm_var_hint[51] = sc_convert_encoding($nm_var_hint[51], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[52] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[52]))
{
    $nm_var_hint[52] = sc_convert_encoding($nm_var_hint[52], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[53] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[53]))
{
    $nm_var_hint[53] = sc_convert_encoding($nm_var_hint[53], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[54] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[54]))
{
    $nm_var_hint[54] = sc_convert_encoding($nm_var_hint[54], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[55] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[55]))
{
    $nm_var_hint[55] = sc_convert_encoding($nm_var_hint[55], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[56] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[56]))
{
    $nm_var_hint[56] = sc_convert_encoding($nm_var_hint[56], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[57] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[57]))
{
    $nm_var_hint[57] = sc_convert_encoding($nm_var_hint[57], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[58] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[58]))
{
    $nm_var_hint[58] = sc_convert_encoding($nm_var_hint[58], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[59] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[59]))
{
    $nm_var_hint[59] = sc_convert_encoding($nm_var_hint[59], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[60] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[60]))
{
    $nm_var_hint[60] = sc_convert_encoding($nm_var_hint[60], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[61] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[61]))
{
    $nm_var_hint[61] = sc_convert_encoding($nm_var_hint[61], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[62] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[62]))
{
    $nm_var_hint[62] = sc_convert_encoding($nm_var_hint[62], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[63] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[63]))
{
    $nm_var_hint[63] = sc_convert_encoding($nm_var_hint[63], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[64] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[64]))
{
    $nm_var_hint[64] = sc_convert_encoding($nm_var_hint[64], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[65] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[65]))
{
    $nm_var_hint[65] = sc_convert_encoding($nm_var_hint[65], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[66] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[66]))
{
    $nm_var_hint[66] = sc_convert_encoding($nm_var_hint[66], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[67] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[67]))
{
    $nm_var_hint[67] = sc_convert_encoding($nm_var_hint[67], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[68] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[68]))
{
    $nm_var_hint[68] = sc_convert_encoding($nm_var_hint[68], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[69] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[69]))
{
    $nm_var_hint[69] = sc_convert_encoding($nm_var_hint[69], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[70] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[70]))
{
    $nm_var_hint[70] = sc_convert_encoding($nm_var_hint[70], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[71] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[71]))
{
    $nm_var_hint[71] = sc_convert_encoding($nm_var_hint[71], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[72] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[72]))
{
    $nm_var_hint[72] = sc_convert_encoding($nm_var_hint[72], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[73] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[73]))
{
    $nm_var_hint[73] = sc_convert_encoding($nm_var_hint[73], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[74] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[74]))
{
    $nm_var_hint[74] = sc_convert_encoding($nm_var_hint[74], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[75] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[75]))
{
    $nm_var_hint[75] = sc_convert_encoding($nm_var_hint[75], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[76] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[76]))
{
    $nm_var_hint[76] = sc_convert_encoding($nm_var_hint[76], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[77] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[77]))
{
    $nm_var_hint[77] = sc_convert_encoding($nm_var_hint[77], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[78] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[78]))
{
    $nm_var_hint[78] = sc_convert_encoding($nm_var_hint[78], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[79] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[79]))
{
    $nm_var_hint[79] = sc_convert_encoding($nm_var_hint[79], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[80] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[80]))
{
    $nm_var_hint[80] = sc_convert_encoding($nm_var_hint[80], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[81] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[81]))
{
    $nm_var_hint[81] = sc_convert_encoding($nm_var_hint[81], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[82] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[82]))
{
    $nm_var_hint[82] = sc_convert_encoding($nm_var_hint[82], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[83] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[83]))
{
    $nm_var_hint[83] = sc_convert_encoding($nm_var_hint[83], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[84] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[84]))
{
    $nm_var_hint[84] = sc_convert_encoding($nm_var_hint[84], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[85] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[85]))
{
    $nm_var_hint[85] = sc_convert_encoding($nm_var_hint[85], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[86] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[86]))
{
    $nm_var_hint[86] = sc_convert_encoding($nm_var_hint[86], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[87] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[87]))
{
    $nm_var_hint[87] = sc_convert_encoding($nm_var_hint[87], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[88] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[88]))
{
    $nm_var_hint[88] = sc_convert_encoding($nm_var_hint[88], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[89] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[89]))
{
    $nm_var_hint[89] = sc_convert_encoding($nm_var_hint[89], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[90] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[90]))
{
    $nm_var_hint[90] = sc_convert_encoding($nm_var_hint[90], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[91] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[91]))
{
    $nm_var_hint[91] = sc_convert_encoding($nm_var_hint[91], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[92] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[92]))
{
    $nm_var_hint[92] = sc_convert_encoding($nm_var_hint[92], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[93] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[93]))
{
    $nm_var_hint[93] = sc_convert_encoding($nm_var_hint[93], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[94] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[94]))
{
    $nm_var_hint[94] = sc_convert_encoding($nm_var_hint[94], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[95] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[95]))
{
    $nm_var_hint[95] = sc_convert_encoding($nm_var_hint[95], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[96] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[96]))
{
    $nm_var_hint[96] = sc_convert_encoding($nm_var_hint[96], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[97] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[97]))
{
    $nm_var_hint[97] = sc_convert_encoding($nm_var_hint[97], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[98] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[98]))
{
    $nm_var_hint[98] = sc_convert_encoding($nm_var_hint[98], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[99] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[99]))
{
    $nm_var_hint[99] = sc_convert_encoding($nm_var_hint[99], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[100] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[100]))
{
    $nm_var_hint[100] = sc_convert_encoding($nm_var_hint[100], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[101] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[101]))
{
    $nm_var_hint[101] = sc_convert_encoding($nm_var_hint[101], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[102] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[102]))
{
    $nm_var_hint[102] = sc_convert_encoding($nm_var_hint[102], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[103] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[103]))
{
    $nm_var_hint[103] = sc_convert_encoding($nm_var_hint[103], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[104] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[104]))
{
    $nm_var_hint[104] = sc_convert_encoding($nm_var_hint[104], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[105] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[105]))
{
    $nm_var_hint[105] = sc_convert_encoding($nm_var_hint[105], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[106] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[106]))
{
    $nm_var_hint[106] = sc_convert_encoding($nm_var_hint[106], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[107] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[107]))
{
    $nm_var_hint[107] = sc_convert_encoding($nm_var_hint[107], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[108] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[108]))
{
    $nm_var_hint[108] = sc_convert_encoding($nm_var_hint[108], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[109] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[109]))
{
    $nm_var_hint[109] = sc_convert_encoding($nm_var_hint[109], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[110] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[110]))
{
    $nm_var_hint[110] = sc_convert_encoding($nm_var_hint[110], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[111] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[111]))
{
    $nm_var_hint[111] = sc_convert_encoding($nm_var_hint[111], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[112] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[112]))
{
    $nm_var_hint[112] = sc_convert_encoding($nm_var_hint[112], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[113] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[113]))
{
    $nm_var_hint[113] = sc_convert_encoding($nm_var_hint[113], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[114] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[114]))
{
    $nm_var_hint[114] = sc_convert_encoding($nm_var_hint[114], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[115] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[115]))
{
    $nm_var_hint[115] = sc_convert_encoding($nm_var_hint[115], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[116] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[116]))
{
    $nm_var_hint[116] = sc_convert_encoding($nm_var_hint[116], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[117] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[117]))
{
    $nm_var_hint[117] = sc_convert_encoding($nm_var_hint[117], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[118] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[118]))
{
    $nm_var_hint[118] = sc_convert_encoding($nm_var_hint[118], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[119] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[119]))
{
    $nm_var_hint[119] = sc_convert_encoding($nm_var_hint[119], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[120] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[120]))
{
    $nm_var_hint[120] = sc_convert_encoding($nm_var_hint[120], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[121] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[121]))
{
    $nm_var_hint[121] = sc_convert_encoding($nm_var_hint[121], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[122] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[122]))
{
    $nm_var_hint[122] = sc_convert_encoding($nm_var_hint[122], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[123] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[123]))
{
    $nm_var_hint[123] = sc_convert_encoding($nm_var_hint[123], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[124] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[124]))
{
    $nm_var_hint[124] = sc_convert_encoding($nm_var_hint[124], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[125] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[125]))
{
    $nm_var_hint[125] = sc_convert_encoding($nm_var_hint[125], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[126] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[126]))
{
    $nm_var_hint[126] = sc_convert_encoding($nm_var_hint[126], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[127] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[127]))
{
    $nm_var_hint[127] = sc_convert_encoding($nm_var_hint[127], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[128] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[128]))
{
    $nm_var_hint[128] = sc_convert_encoding($nm_var_hint[128], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[129] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[129]))
{
    $nm_var_hint[129] = sc_convert_encoding($nm_var_hint[129], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[130] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[130]))
{
    $nm_var_hint[130] = sc_convert_encoding($nm_var_hint[130], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[131] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[131]))
{
    $nm_var_hint[131] = sc_convert_encoding($nm_var_hint[131], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[132] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[132]))
{
    $nm_var_hint[132] = sc_convert_encoding($nm_var_hint[132], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[133] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[133]))
{
    $nm_var_hint[133] = sc_convert_encoding($nm_var_hint[133], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[134] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[134]))
{
    $nm_var_hint[134] = sc_convert_encoding($nm_var_hint[134], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[135] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[135]))
{
    $nm_var_hint[135] = sc_convert_encoding($nm_var_hint[135], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[136] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[136]))
{
    $nm_var_hint[136] = sc_convert_encoding($nm_var_hint[136], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[137] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[137]))
{
    $nm_var_hint[137] = sc_convert_encoding($nm_var_hint[137], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[138] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[138]))
{
    $nm_var_hint[138] = sc_convert_encoding($nm_var_hint[138], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[139] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[139]))
{
    $nm_var_hint[139] = sc_convert_encoding($nm_var_hint[139], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[140] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[140]))
{
    $nm_var_hint[140] = sc_convert_encoding($nm_var_hint[140], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[141] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[141]))
{
    $nm_var_hint[141] = sc_convert_encoding($nm_var_hint[141], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[142] = "Aplikasi Bridging API";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[142]))
{
    $nm_var_hint[142] = sc_convert_encoding($nm_var_hint[142], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[143] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[143]))
{
    $nm_var_hint[143] = sc_convert_encoding($nm_var_hint[143], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[144] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[144]))
{
    $nm_var_hint[144] = sc_convert_encoding($nm_var_hint[144], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[145] = "Kelola Rujukan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[145]))
{
    $nm_var_hint[145] = sc_convert_encoding($nm_var_hint[145], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[146] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[146]))
{
    $nm_var_hint[146] = sc_convert_encoding($nm_var_hint[146], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[147] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[147]))
{
    $nm_var_hint[147] = sc_convert_encoding($nm_var_hint[147], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[148] = "Pengelolaan SDM RS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[148]))
{
    $nm_var_hint[148] = sc_convert_encoding($nm_var_hint[148], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[149] = "Data Referensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[149]))
{
    $nm_var_hint[149] = sc_convert_encoding($nm_var_hint[149], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[150] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[150]))
{
    $nm_var_hint[150] = sc_convert_encoding($nm_var_hint[150], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[151] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[151]))
{
    $nm_var_hint[151] = sc_convert_encoding($nm_var_hint[151], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[152] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[152]))
{
    $nm_var_hint[152] = sc_convert_encoding($nm_var_hint[152], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[153] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[153]))
{
    $nm_var_hint[153] = sc_convert_encoding($nm_var_hint[153], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[154] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[154]))
{
    $nm_var_hint[154] = sc_convert_encoding($nm_var_hint[154], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[155] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[155]))
{
    $nm_var_hint[155] = sc_convert_encoding($nm_var_hint[155], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[156] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[156]))
{
    $nm_var_hint[156] = sc_convert_encoding($nm_var_hint[156], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[157] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[157]))
{
    $nm_var_hint[157] = sc_convert_encoding($nm_var_hint[157], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[158] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[158]))
{
    $nm_var_hint[158] = sc_convert_encoding($nm_var_hint[158], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[159] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[159]))
{
    $nm_var_hint[159] = sc_convert_encoding($nm_var_hint[159], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[160] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[160]))
{
    $nm_var_hint[160] = sc_convert_encoding($nm_var_hint[160], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[161] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[161]))
{
    $nm_var_hint[161] = sc_convert_encoding($nm_var_hint[161], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[162] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[162]))
{
    $nm_var_hint[162] = sc_convert_encoding($nm_var_hint[162], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[163] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[163]))
{
    $nm_var_hint[163] = sc_convert_encoding($nm_var_hint[163], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[164] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[164]))
{
    $nm_var_hint[164] = sc_convert_encoding($nm_var_hint[164], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[165] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[165]))
{
    $nm_var_hint[165] = sc_convert_encoding($nm_var_hint[165], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[166] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[166]))
{
    $nm_var_hint[166] = sc_convert_encoding($nm_var_hint[166], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[167] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[167]))
{
    $nm_var_hint[167] = sc_convert_encoding($nm_var_hint[167], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[168] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[168]))
{
    $nm_var_hint[168] = sc_convert_encoding($nm_var_hint[168], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[169] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[169]))
{
    $nm_var_hint[169] = sc_convert_encoding($nm_var_hint[169], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[170] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[170]))
{
    $nm_var_hint[170] = sc_convert_encoding($nm_var_hint[170], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[171] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[171]))
{
    $nm_var_hint[171] = sc_convert_encoding($nm_var_hint[171], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[172] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[172]))
{
    $nm_var_hint[172] = sc_convert_encoding($nm_var_hint[172], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[173] = "Manajemen Finansial";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[173]))
{
    $nm_var_hint[173] = sc_convert_encoding($nm_var_hint[173], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[174] = "Akuntansi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[174]))
{
    $nm_var_hint[174] = sc_convert_encoding($nm_var_hint[174], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[175] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[175]))
{
    $nm_var_hint[175] = sc_convert_encoding($nm_var_hint[175], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[176] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[176]))
{
    $nm_var_hint[176] = sc_convert_encoding($nm_var_hint[176], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[177] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[177]))
{
    $nm_var_hint[177] = sc_convert_encoding($nm_var_hint[177], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[178] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[178]))
{
    $nm_var_hint[178] = sc_convert_encoding($nm_var_hint[178], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[179] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[179]))
{
    $nm_var_hint[179] = sc_convert_encoding($nm_var_hint[179], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[180] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[180]))
{
    $nm_var_hint[180] = sc_convert_encoding($nm_var_hint[180], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[181] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[181]))
{
    $nm_var_hint[181] = sc_convert_encoding($nm_var_hint[181], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[182] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[182]))
{
    $nm_var_hint[182] = sc_convert_encoding($nm_var_hint[182], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[183] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[183]))
{
    $nm_var_hint[183] = sc_convert_encoding($nm_var_hint[183], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[184] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[184]))
{
    $nm_var_hint[184] = sc_convert_encoding($nm_var_hint[184], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[185] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[185]))
{
    $nm_var_hint[185] = sc_convert_encoding($nm_var_hint[185], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[186] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[186]))
{
    $nm_var_hint[186] = sc_convert_encoding($nm_var_hint[186], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[187] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[187]))
{
    $nm_var_hint[187] = sc_convert_encoding($nm_var_hint[187], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[188] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[188]))
{
    $nm_var_hint[188] = sc_convert_encoding($nm_var_hint[188], $_SESSION['scriptcase']['charset'], "UTF-8");
}
$saida_apl = $_SESSION['scriptcase']['sc_saida_menu_dani'];
$menu_dani_menuData['data'] .= "item_2|.|" . $nm_var_lab[0] . "||" . $nm_var_hint[0] . "|scriptcase__NM__ico__NM__add_16.png|_self|\n";
$menu_dani_menuData['data'] .= "item_14|..|" . $nm_var_lab[1] . "||" . $nm_var_hint[1] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbantrian']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbantrian']) == "on")
{
    $menu_dani_menuData['data'] .= "item_1|...|" . $nm_var_lab[2] . "|menu_dani_form_php.php?sc_item_menu=item_1&sc_apl_menu=grid_tbantrian&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[2] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_1|...|" . $nm_var_lab[2] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ketersediaan_bed']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ketersediaan_bed']) == "on")
{
    $menu_dani_menuData['data'] .= "item_5|...|" . $nm_var_lab[3] . "|menu_dani_form_php.php?sc_item_menu=item_5&sc_apl_menu=grid_ketersediaan_bed&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[3] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_5|...|" . $nm_var_lab[3] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_harga_tindakan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_harga_tindakan']) == "on")
{
    $menu_dani_menuData['data'] .= "item_6|...|" . $nm_var_lab[4] . "|menu_dani_form_php.php?sc_item_menu=item_6&sc_apl_menu=grid_harga_tindakan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[4] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_6|...|" . $nm_var_lab[4] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadmrawatinap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadmrawatinap']) == "on")
{
    $menu_dani_menuData['data'] .= "item_9|...|" . $nm_var_lab[5] . "|menu_dani_form_php.php?sc_item_menu=item_9&sc_apl_menu=grid_tbadmrawatinap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[5] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_9|...|" . $nm_var_lab[5] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpayment']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpayment']) == "on")
{
    $menu_dani_menuData['data'] .= "item_10|...|" . $nm_var_lab[6] . "|menu_dani_form_php.php?sc_item_menu=item_10&sc_apl_menu=grid_tbpayment&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[6] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_10|...|" . $nm_var_lab[6] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaymentri']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaymentri']) == "on")
{
    $menu_dani_menuData['data'] .= "item_145|...|" . $nm_var_lab[7] . "|menu_dani_form_php.php?sc_item_menu=item_145&sc_apl_menu=grid_tbpaymentri&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[7] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_145|...|" . $nm_var_lab[7] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_antrian']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_antrian']) == "on")
{
    $menu_dani_menuData['data'] .= "item_146|...|" . $nm_var_lab[8] . "|menu_dani_form_php.php?sc_item_menu=item_146&sc_apl_menu=grid_antrian&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[8] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_146|...|" . $nm_var_lab[8] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_15|..|" . $nm_var_lab[9] . "||" . $nm_var_hint[9] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']) == "on")
{
    $menu_dani_menuData['data'] .= "item_16|...|" . $nm_var_lab[10] . "|menu_dani_form_php.php?sc_item_menu=item_16&sc_apl_menu=grid_tbdetailrawatjalan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[10] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_16|...|" . $nm_var_lab[10] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']) == "on")
{
    $menu_dani_menuData['data'] .= "item_17|...|" . $nm_var_lab[11] . "|menu_dani_form_php.php?sc_item_menu=item_17&sc_apl_menu=grid_tbdetailrawatinap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[11] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_17|...|" . $nm_var_lab[11] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']) == "on")
{
    $menu_dani_menuData['data'] .= "item_18|...|" . $nm_var_lab[12] . "|menu_dani_form_php.php?sc_item_menu=item_18&sc_apl_menu=grid_tbdetailigd&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[12] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_18|...|" . $nm_var_lab[12] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailok']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailok']) == "on")
{
    $menu_dani_menuData['data'] .= "item_20|...|" . $nm_var_lab[13] . "|menu_dani_form_php.php?sc_item_menu=item_20&sc_apl_menu=grid_tbdetailok&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[13] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_20|...|" . $nm_var_lab[13] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailvk']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailvk']) == "on")
{
    $menu_dani_menuData['data'] .= "item_21|...|" . $nm_var_lab[14] . "|menu_dani_form_php.php?sc_item_menu=item_21&sc_apl_menu=grid_tbdetailvk&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[14] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_21|...|" . $nm_var_lab[14] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_23|...|" . $nm_var_lab[15] . "||" . $nm_var_hint[15] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']) == "on")
{
    $menu_dani_menuData['data'] .= "item_150|....|" . $nm_var_lab[16] . "|menu_dani_form_php.php?sc_item_menu=item_150&sc_apl_menu=grid_tbdetailrawatjalan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[16] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_150|....|" . $nm_var_lab[16] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']) == "on")
{
    $menu_dani_menuData['data'] .= "item_151|....|" . $nm_var_lab[17] . "|menu_dani_form_php.php?sc_item_menu=item_151&sc_apl_menu=grid_tbdetailrawatinap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[17] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_151|....|" . $nm_var_lab[17] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']) == "on")
{
    $menu_dani_menuData['data'] .= "item_152|....|" . $nm_var_lab[18] . "|menu_dani_form_php.php?sc_item_menu=item_152&sc_apl_menu=grid_tbdetailigd&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[18] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_152|....|" . $nm_var_lab[18] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_33|...|" . $nm_var_lab[19] . "||" . $nm_var_hint[19] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_35|..|" . $nm_var_lab[20] . "||" . $nm_var_hint[20] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_153|...|" . $nm_var_lab[21] . "||" . $nm_var_hint[21] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']) == "on")
{
    $menu_dani_menuData['data'] .= "item_36|....|" . $nm_var_lab[22] . "|menu_dani_form_php.php?sc_item_menu=item_36&sc_apl_menu=grid_tbdetailrawatjalan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[22] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_36|....|" . $nm_var_lab[22] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']) == "on")
{
    $menu_dani_menuData['data'] .= "item_147|....|" . $nm_var_lab[23] . "|menu_dani_form_php.php?sc_item_menu=item_147&sc_apl_menu=grid_tbdetailigd&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[23] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_147|....|" . $nm_var_lab[23] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']) == "on")
{
    $menu_dani_menuData['data'] .= "item_148|....|" . $nm_var_lab[24] . "|menu_dani_form_php.php?sc_item_menu=item_148&sc_apl_menu=grid_tbdetailrawatinap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[24] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_148|....|" . $nm_var_lab[24] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpo']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpo']) == "on")
{
    $menu_dani_menuData['data'] .= "item_37|...|" . $nm_var_lab[25] . "|menu_dani_form_php.php?sc_item_menu=item_37&sc_apl_menu=grid_tbpo&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[25] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_37|...|" . $nm_var_lab[25] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbstockopname']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbstockopname']) == "on")
{
    $menu_dani_menuData['data'] .= "item_39|...|" . $nm_var_lab[26] . "|menu_dani_form_php.php?sc_item_menu=item_39&sc_apl_menu=grid_tbstockopname&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[26] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_39|...|" . $nm_var_lab[26] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcaraminum']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcaraminum']) == "on")
{
    $menu_dani_menuData['data'] .= "item_149|...|" . $nm_var_lab[27] . "|menu_dani_form_php.php?sc_item_menu=item_149&sc_apl_menu=grid_tbcaraminum&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[27] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_149|...|" . $nm_var_lab[27] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_41|.|" . $nm_var_lab[28] . "||" . $nm_var_hint[28] . "|scriptcase__NM__ico__NM__book_green_16.png|_self|\n";
$menu_dani_menuData['data'] .= "item_42|..|" . $nm_var_lab[29] . "||" . $nm_var_hint[29] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbobat']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbobat']) == "on")
{
    $menu_dani_menuData['data'] .= "item_43|...|" . $nm_var_lab[30] . "|menu_dani_form_php.php?sc_item_menu=item_43&sc_apl_menu=grid_tbobat&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[30] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_43|...|" . $nm_var_lab[30] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_44|...|" . $nm_var_lab[31] . "||" . $nm_var_hint[31] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgolonganobat']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgolonganobat']) == "on")
{
    $menu_dani_menuData['data'] .= "item_45|...|" . $nm_var_lab[32] . "|menu_dani_form_php.php?sc_item_menu=item_45&sc_apl_menu=grid_tbgolonganobat&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[32] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_45|...|" . $nm_var_lab[32] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_46|...|" . $nm_var_lab[33] . "||" . $nm_var_hint[33] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_47|...|" . $nm_var_lab[34] . "||" . $nm_var_hint[34] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_48|..|" . $nm_var_lab[35] . "||" . $nm_var_hint[35] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpoli']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpoli']) == "on")
{
    $menu_dani_menuData['data'] .= "item_130|...|" . $nm_var_lab[36] . "|menu_dani_form_php.php?sc_item_menu=item_130&sc_apl_menu=grid_tbpoli&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[36] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_130|...|" . $nm_var_lab[36] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpbf']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpbf']) == "on")
{
    $menu_dani_menuData['data'] .= "item_49|...|" . $nm_var_lab[37] . "|menu_dani_form_php.php?sc_item_menu=item_49&sc_apl_menu=grid_tbpbf&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[37] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_49|...|" . $nm_var_lab[37] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbinstansi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbinstansi']) == "on")
{
    $menu_dani_menuData['data'] .= "item_50|...|" . $nm_var_lab[38] . "|menu_dani_form_php.php?sc_item_menu=item_50&sc_apl_menu=grid_tbinstansi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[38] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_50|...|" . $nm_var_lab[38] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_53|...|" . $nm_var_lab[39] . "||" . $nm_var_hint[39] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_54|...|" . $nm_var_lab[40] . "||" . $nm_var_hint[40] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_55|...|" . $nm_var_lab[41] . "||" . $nm_var_hint[41] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_56|...|" . $nm_var_lab[42] . "||" . $nm_var_hint[42] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbbu']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbbu']) == "on")
{
    $menu_dani_menuData['data'] .= "item_57|...|" . $nm_var_lab[43] . "|menu_dani_form_php.php?sc_item_menu=item_57&sc_apl_menu=grid_tbbu&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[43] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_57|...|" . $nm_var_lab[43] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgelardokter']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgelardokter']) == "on")
{
    $menu_dani_menuData['data'] .= "item_58|...|" . $nm_var_lab[44] . "|menu_dani_form_php.php?sc_item_menu=item_58&sc_apl_menu=grid_tbgelardokter&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[44] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_58|...|" . $nm_var_lab[44] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_59|...|" . $nm_var_lab[45] . "||" . $nm_var_hint[45] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_60|...|" . $nm_var_lab[46] . "||" . $nm_var_hint[46] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_62|..|" . $nm_var_lab[47] . "||" . $nm_var_hint[47] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdoctor']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdoctor']) == "on")
{
    $menu_dani_menuData['data'] .= "item_63|...|" . $nm_var_lab[48] . "|menu_dani_form_php.php?sc_item_menu=item_63&sc_apl_menu=grid_tbdoctor&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[48] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_63|...|" . $nm_var_lab[48] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcustomer']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcustomer']) == "on")
{
    $menu_dani_menuData['data'] .= "item_64|...|" . $nm_var_lab[49] . "|menu_dani_form_php.php?sc_item_menu=item_64&sc_apl_menu=grid_tbcustomer&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[49] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_64|...|" . $nm_var_lab[49] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbhrd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbhrd']) == "on")
{
    $menu_dani_menuData['data'] .= "item_143|...|" . $nm_var_lab[50] . "|menu_dani_form_php.php?sc_item_menu=item_143&sc_apl_menu=grid_tbhrd&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[50] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_143|...|" . $nm_var_lab[50] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_67|..|" . $nm_var_lab[51] . "||" . $nm_var_hint[51] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbtindakan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbtindakan']) == "on")
{
    $menu_dani_menuData['data'] .= "item_68|...|" . $nm_var_lab[52] . "|menu_dani_form_php.php?sc_item_menu=item_68&sc_apl_menu=grid_tbtindakan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[52] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_68|...|" . $nm_var_lab[52] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbceklab']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbceklab']) == "on")
{
    $menu_dani_menuData['data'] .= "item_70|...|" . $nm_var_lab[53] . "|menu_dani_form_php.php?sc_item_menu=item_70&sc_apl_menu=grid_tbceklab&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[53] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_70|...|" . $nm_var_lab[53] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbkelas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbkelas']) == "on")
{
    $menu_dani_menuData['data'] .= "item_72|...|" . $nm_var_lab[54] . "|menu_dani_form_php.php?sc_item_menu=item_72&sc_apl_menu=grid_tbkelas&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[54] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_72|...|" . $nm_var_lab[54] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbruang']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbruang']) == "on")
{
    $menu_dani_menuData['data'] .= "item_144|...|" . $nm_var_lab[55] . "|menu_dani_form_php.php?sc_item_menu=item_144&sc_apl_menu=grid_tbruang&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[55] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_144|...|" . $nm_var_lab[55] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_73|...|" . $nm_var_lab[56] . "||" . $nm_var_hint[56] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_74|...|" . $nm_var_lab[57] . "||" . $nm_var_hint[57] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_75|...|" . $nm_var_lab[58] . "||" . $nm_var_hint[58] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_76|...|" . $nm_var_lab[59] . "||" . $nm_var_hint[59] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_77|...|" . $nm_var_lab[60] . "||" . $nm_var_hint[60] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_78|..|" . $nm_var_lab[61] . "||" . $nm_var_hint[61] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadministrasi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadministrasi']) == "on")
{
    $menu_dani_menuData['data'] .= "item_79|...|" . $nm_var_lab[62] . "|menu_dani_form_php.php?sc_item_menu=item_79&sc_apl_menu=grid_tbadministrasi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[62] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_79|...|" . $nm_var_lab[62] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_80|...|" . $nm_var_lab[63] . "||" . $nm_var_hint[63] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_81|...|" . $nm_var_lab[64] . "||" . $nm_var_hint[64] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_82|...|" . $nm_var_lab[65] . "||" . $nm_var_hint[65] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_83|...|" . $nm_var_lab[66] . "||" . $nm_var_hint[66] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_84|...|" . $nm_var_lab[67] . "||" . $nm_var_hint[67] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_85|...|" . $nm_var_lab[68] . "||" . $nm_var_hint[68] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_86|.|" . $nm_var_lab[69] . "||" . $nm_var_hint[69] . "|scriptcase__NM__ico__NM__briefcase2_16.png|_self|\n";
$menu_dani_menuData['data'] .= "item_87|..|" . $nm_var_lab[70] . "||" . $nm_var_hint[70] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_88|..|" . $nm_var_lab[71] . "||" . $nm_var_hint[71] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_89|..|" . $nm_var_lab[72] . "||" . $nm_var_hint[72] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_90|.|" . $nm_var_lab[73] . "||" . $nm_var_hint[73] . "|scriptcase__NM__ico__NM__cabinet_16.png|_self|\n";
$menu_dani_menuData['data'] .= "item_91|..|" . $nm_var_lab[74] . "||" . $nm_var_hint[74] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_92|...|" . $nm_var_lab[75] . "||" . $nm_var_hint[75] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_93|...|" . $nm_var_lab[76] . "||" . $nm_var_hint[76] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_94|...|" . $nm_var_lab[77] . "||" . $nm_var_hint[77] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_95|...|" . $nm_var_lab[78] . "||" . $nm_var_hint[78] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_96|...|" . $nm_var_lab[79] . "||" . $nm_var_hint[79] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_97|...|" . $nm_var_lab[80] . "||" . $nm_var_hint[80] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_98|...|" . $nm_var_lab[81] . "||" . $nm_var_hint[81] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_99|...|" . $nm_var_lab[82] . "||" . $nm_var_hint[82] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_100|...|" . $nm_var_lab[83] . "||" . $nm_var_hint[83] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_101|...|" . $nm_var_lab[84] . "||" . $nm_var_hint[84] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_102|...|" . $nm_var_lab[85] . "||" . $nm_var_hint[85] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_103|...|" . $nm_var_lab[86] . "||" . $nm_var_hint[86] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_104|...|" . $nm_var_lab[87] . "||" . $nm_var_hint[87] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_105|...|" . $nm_var_lab[88] . "||" . $nm_var_hint[88] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_106|...|" . $nm_var_lab[89] . "||" . $nm_var_hint[89] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_107|...|" . $nm_var_lab[90] . "||" . $nm_var_hint[90] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_108|...|" . $nm_var_lab[91] . "||" . $nm_var_hint[91] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_109|...|" . $nm_var_lab[92] . "||" . $nm_var_hint[92] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_110|..|" . $nm_var_lab[93] . "||" . $nm_var_hint[93] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_111|...|" . $nm_var_lab[94] . "||" . $nm_var_hint[94] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_112|...|" . $nm_var_lab[95] . "||" . $nm_var_hint[95] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_113|...|" . $nm_var_lab[96] . "||" . $nm_var_hint[96] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_114|...|" . $nm_var_lab[97] . "||" . $nm_var_hint[97] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_115|...|" . $nm_var_lab[98] . "||" . $nm_var_hint[98] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_116|...|" . $nm_var_lab[99] . "||" . $nm_var_hint[99] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_117|...|" . $nm_var_lab[100] . "||" . $nm_var_hint[100] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_61|...|" . $nm_var_lab[101] . "||" . $nm_var_hint[101] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_118|...|" . $nm_var_lab[102] . "||" . $nm_var_hint[102] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_66|...|" . $nm_var_lab[103] . "||" . $nm_var_hint[103] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_119|...|" . $nm_var_lab[104] . "||" . $nm_var_hint[104] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_120|...|" . $nm_var_lab[105] . "||" . $nm_var_hint[105] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_121|...|" . $nm_var_lab[106] . "||" . $nm_var_hint[106] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_122|..|" . $nm_var_lab[107] . "||" . $nm_var_hint[107] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_123|...|" . $nm_var_lab[108] . "||" . $nm_var_hint[108] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_124|...|" . $nm_var_lab[109] . "||" . $nm_var_hint[109] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_125|...|" . $nm_var_lab[110] . "||" . $nm_var_hint[110] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_126|...|" . $nm_var_lab[111] . "||" . $nm_var_hint[111] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_127|...|" . $nm_var_lab[112] . "||" . $nm_var_hint[112] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_128|...|" . $nm_var_lab[113] . "||" . $nm_var_hint[113] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_129|...|" . $nm_var_lab[114] . "||" . $nm_var_hint[114] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_131|.|" . $this->Nm_lang['lang_menu_security'] . "||" . $this->Nm_lang['lang_menu_security'] . "|scriptcase__NM__ico__NM__lock2_16.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users']) == "on")
{
    $menu_dani_menuData['data'] .= "item_132|..|" . $this->Nm_lang['lang_list_users'] . "|menu_dani_form_php.php?sc_item_menu=item_132&sc_apl_menu=sec_grid_sec_users&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_users'] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_132|..|" . $this->Nm_lang['lang_list_users'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_apps']) == "on")
{
    $menu_dani_menuData['data'] .= "item_133|..|" . $this->Nm_lang['lang_list_apps'] . "|menu_dani_form_php.php?sc_item_menu=item_133&sc_apl_menu=sec_grid_sec_apps&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_apps'] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_133|..|" . $this->Nm_lang['lang_list_apps'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_groups']) == "on")
{
    $menu_dani_menuData['data'] .= "item_134|..|" . $this->Nm_lang['lang_list_groups'] . "|menu_dani_form_php.php?sc_item_menu=item_134&sc_apl_menu=sec_grid_sec_groups&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_groups'] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_134|..|" . $this->Nm_lang['lang_list_groups'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users_groups']) == "on")
{
    $menu_dani_menuData['data'] .= "item_141|..|" . $this->Nm_lang['lang_list_users_x_groups'] . "|menu_dani_form_php.php?sc_item_menu=item_141&sc_apl_menu=sec_grid_sec_users_groups&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_users_x_groups'] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_141|..|" . $this->Nm_lang['lang_list_users_x_groups'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_search_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_search_sec_groups']) == "on")
{
    $menu_dani_menuData['data'] .= "item_135|..|" . $this->Nm_lang['lang_list_apps_x_groups'] . "|menu_dani_form_php.php?sc_item_menu=item_135&sc_apl_menu=sec_search_sec_groups&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_apps_x_groups'] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_135|..|" . $this->Nm_lang['lang_list_apps_x_groups'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_sync_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_sync_apps']) == "on")
{
    $menu_dani_menuData['data'] .= "item_136|..|" . $this->Nm_lang['lang_list_sync_apps'] . "|menu_dani_form_php.php?sc_item_menu=item_136&sc_apl_menu=sec_sync_apps&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_sync_apps'] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_136|..|" . $this->Nm_lang['lang_list_sync_apps'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_logged_users']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_logged_users']) == "on")
{
    $menu_dani_menuData['data'] .= "item_139|..|" . $this->Nm_lang['lang_logged_users'] . "|menu_dani_form_php.php?sc_item_menu=item_139&sc_apl_menu=sec_logged_users&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_logged_users'] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_139|..|" . $this->Nm_lang['lang_logged_users'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_change_pswd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_change_pswd']) == "on")
{
    $menu_dani_menuData['data'] .= "item_137|..|" . $this->Nm_lang['lang_change_pswd'] . "|menu_dani_form_php.php?sc_item_menu=item_137&sc_apl_menu=sec_change_pswd&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_change_pswd'] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_137|..|" . $this->Nm_lang['lang_change_pswd'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_Login']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_Login']) == "on")
{
    $menu_dani_menuData['data'] .= "item_138|..|" . $this->Nm_lang['lang_exit'] . "|menu_dani_form_php.php?sc_item_menu=item_138&sc_apl_menu=sec_Login&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_exit'] . "||" . $this->menu_dani_target('_parent') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_138|..|" . $this->Nm_lang['lang_exit'] . "||||_parent|disabled\n";
}
$menu_dani_menuData['data'] .= "item_142|.|" . $nm_var_lab[115] . "||" . $nm_var_hint[115] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_24|..|" . $nm_var_lab[116] . "||" . $nm_var_hint[116] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_25|...|" . $nm_var_lab[117] . "||" . $nm_var_hint[117] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_31|...|" . $nm_var_lab[118] . "||" . $nm_var_hint[118] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_32|...|" . $nm_var_lab[119] . "||" . $nm_var_hint[119] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_34|...|" . $nm_var_lab[120] . "||" . $nm_var_hint[120] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_11|..|" . $nm_var_lab[121] . "||" . $nm_var_hint[121] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_3|...|" . $nm_var_lab[122] . "||" . $nm_var_hint[122] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_4|...|" . $nm_var_lab[123] . "||" . $nm_var_hint[123] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_12|...|" . $nm_var_lab[124] . "||" . $nm_var_hint[124] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_13|...|" . $nm_var_lab[125] . "||" . $nm_var_hint[125] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_19|...|" . $nm_var_lab[126] . "||" . $nm_var_hint[126] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_26|...|" . $nm_var_lab[127] . "||" . $nm_var_hint[127] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_27|...|" . $nm_var_lab[128] . "||" . $nm_var_hint[128] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_28|...|" . $nm_var_lab[129] . "||" . $nm_var_hint[129] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_29|...|" . $nm_var_lab[130] . "||" . $nm_var_hint[130] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_30|...|" . $nm_var_lab[131] . "||" . $nm_var_hint[131] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_7|...|" . $nm_var_lab[132] . "||" . $nm_var_hint[132] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_8|...|" . $nm_var_lab[133] . "||" . $nm_var_hint[133] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_22|...|" . $nm_var_lab[134] . "||" . $nm_var_hint[134] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_65|...|" . $nm_var_lab[135] . "||" . $nm_var_hint[135] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_52|...|" . $nm_var_lab[136] . "||" . $nm_var_hint[136] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_71|...|" . $nm_var_lab[137] . "||" . $nm_var_hint[137] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_51|...|" . $nm_var_lab[138] . "||" . $nm_var_hint[138] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_69|...|" . $nm_var_lab[139] . "||" . $nm_var_hint[139] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_38|...|" . $nm_var_lab[140] . "||" . $nm_var_hint[140] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_40|...|" . $nm_var_lab[141] . "||" . $nm_var_hint[141] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_154|.|" . $nm_var_lab[142] . "||" . $nm_var_hint[142] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_253|..|" . $nm_var_lab[143] . "||" . $nm_var_hint[143] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_sep']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_sep']) == "on")
{
    $menu_dani_menuData['data'] .= "item_162|...|" . $nm_var_lab[144] . "|menu_dani_form_php.php?sc_item_menu=item_162&sc_apl_menu=grid_response_insert_sep&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[144] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_162|...|" . $nm_var_lab[144] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_rujukan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_rujukan']) == "on")
{
    $menu_dani_menuData['data'] .= "item_156|...|" . $nm_var_lab[145] . "|menu_dani_form_php.php?sc_item_menu=item_156&sc_apl_menu=grid_response_insert_rujukan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[145] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_156|...|" . $nm_var_lab[145] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_insert_lpk']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_insert_lpk']) == "on")
{
    $menu_dani_menuData['data'] .= "item_164|...|" . $nm_var_lab[146] . "|menu_dani_form_php.php?sc_item_menu=item_164&sc_apl_menu=form_vclaim_insert_lpk&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[146] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_164|...|" . $nm_var_lab[146] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['aplicare_view_tersedia_kamar']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['aplicare_view_tersedia_kamar']) == "on")
{
    $menu_dani_menuData['data'] .= "item_236|..|" . $nm_var_lab[147] . "|menu_dani_form_php.php?sc_item_menu=item_236&sc_apl_menu=aplicare_view_tersedia_kamar&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[147] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_236|..|" . $nm_var_lab[147] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_158|.|" . $nm_var_lab[148] . "||" . $nm_var_hint[148] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_159|..|" . $nm_var_lab[149] . "||" . $nm_var_hint[149] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan']) == "on")
{
    $menu_dani_menuData['data'] .= "item_180|...|" . $nm_var_lab[150] . "|menu_dani_form_php.php?sc_item_menu=item_180&sc_apl_menu=grid_hrm_jabatan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[150] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_180|...|" . $nm_var_lab[150] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_182|..|" . $nm_var_lab[151] . "||" . $nm_var_hint[151] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan']) == "on")
{
    $menu_dani_menuData['data'] .= "item_183|...|" . $nm_var_lab[152] . "|menu_dani_form_php.php?sc_item_menu=item_183&sc_apl_menu=grid_hrm_karyawan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[152] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_183|...|" . $nm_var_lab[152] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan_tetap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan_tetap']) == "on")
{
    $menu_dani_menuData['data'] .= "item_184|...|" . $nm_var_lab[153] . "|menu_dani_form_php.php?sc_item_menu=item_184&sc_apl_menu=grid_hrm_karyawan_tetap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[153] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_184|...|" . $nm_var_lab[153] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan_karyawan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan_karyawan']) == "on")
{
    $menu_dani_menuData['data'] .= "item_185|...|" . $nm_var_lab[154] . "|menu_dani_form_php.php?sc_item_menu=item_185&sc_apl_menu=grid_hrm_jabatan_karyawan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[154] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_185|...|" . $nm_var_lab[154] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_kontrak_kerja']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_kontrak_kerja']) == "on")
{
    $menu_dani_menuData['data'] .= "item_186|...|" . $nm_var_lab[155] . "|menu_dani_form_php.php?sc_item_menu=item_186&sc_apl_menu=grid_hrm_kontrak_kerja&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[155] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_186|...|" . $nm_var_lab[155] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_pendidikan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_pendidikan']) == "on")
{
    $menu_dani_menuData['data'] .= "item_187|...|" . $nm_var_lab[156] . "|menu_dani_form_php.php?sc_item_menu=item_187&sc_apl_menu=grid_hrm_pendidikan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[156] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_187|...|" . $nm_var_lab[156] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_188|..|" . $nm_var_lab[157] . "||" . $nm_var_hint[157] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_mesin_presensi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_mesin_presensi']) == "on")
{
    $menu_dani_menuData['data'] .= "item_189|...|" . $nm_var_lab[158] . "|menu_dani_form_php.php?sc_item_menu=item_189&sc_apl_menu=grid_hrm_mesin_presensi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[158] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_189|...|" . $nm_var_lab[158] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_user_presensi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_user_presensi']) == "on")
{
    $menu_dani_menuData['data'] .= "item_190|...|" . $nm_var_lab[159] . "|menu_dani_form_php.php?sc_item_menu=item_190&sc_apl_menu=grid_hrm_user_presensi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[159] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_190|...|" . $nm_var_lab[159] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_data_presensi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_data_presensi']) == "on")
{
    $menu_dani_menuData['data'] .= "item_191|...|" . $nm_var_lab[160] . "|menu_dani_form_php.php?sc_item_menu=item_191&sc_apl_menu=grid_hrm_data_presensi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[160] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_191|...|" . $nm_var_lab[160] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_215|..|" . $nm_var_lab[161] . "||" . $nm_var_hint[161] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_daftar_shift']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_daftar_shift']) == "on")
{
    $menu_dani_menuData['data'] .= "item_249|...|" . $nm_var_lab[162] . "|menu_dani_form_php.php?sc_item_menu=item_249&sc_apl_menu=grid_hrm_daftar_shift&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[162] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_249|...|" . $nm_var_lab[162] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_shift_karyawan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_shift_karyawan']) == "on")
{
    $menu_dani_menuData['data'] .= "item_250|...|" . $nm_var_lab[163] . "|menu_dani_form_php.php?sc_item_menu=item_250&sc_apl_menu=grid_hrm_shift_karyawan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[163] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_250|...|" . $nm_var_lab[163] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_192|..|" . $nm_var_lab[164] . "||" . $nm_var_hint[164] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_periode_remunerasi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_periode_remunerasi']) == "on")
{
    $menu_dani_menuData['data'] .= "item_195|...|" . $nm_var_lab[165] . "|menu_dani_form_php.php?sc_item_menu=item_195&sc_apl_menu=grid_hrm_periode_remunerasi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[165] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_195|...|" . $nm_var_lab[165] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tetap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tetap']) == "on")
{
    $menu_dani_menuData['data'] .= "item_193|...|" . $nm_var_lab[166] . "|menu_dani_form_php.php?sc_item_menu=item_193&sc_apl_menu=grid_hrm_remunerasi_tetap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[166] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_193|...|" . $nm_var_lab[166] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tidak_tetap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tidak_tetap']) == "on")
{
    $menu_dani_menuData['data'] .= "item_251|...|" . $nm_var_lab[167] . "|menu_dani_form_php.php?sc_item_menu=item_251&sc_apl_menu=grid_hrm_remunerasi_tidak_tetap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[167] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_251|...|" . $nm_var_lab[167] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tetap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tetap']) == "on")
{
    $menu_dani_menuData['data'] .= "item_194|...|" . $nm_var_lab[168] . "|menu_dani_form_php.php?sc_item_menu=item_194&sc_apl_menu=grid_hrm_potongan_tetap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[168] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_194|...|" . $nm_var_lab[168] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tidak_tetap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tidak_tetap']) == "on")
{
    $menu_dani_menuData['data'] .= "item_248|...|" . $nm_var_lab[169] . "|menu_dani_form_php.php?sc_item_menu=item_248&sc_apl_menu=grid_hrm_potongan_tidak_tetap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[169] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_248|...|" . $nm_var_lab[169] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_overtime']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_overtime']) == "on")
{
    $menu_dani_menuData['data'] .= "item_196|...|" . $nm_var_lab[170] . "|menu_dani_form_php.php?sc_item_menu=item_196&sc_apl_menu=grid_hrm_overtime&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[170] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_196|...|" . $nm_var_lab[170] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_kalkulasi_remunerasi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_kalkulasi_remunerasi']) == "on")
{
    $menu_dani_menuData['data'] .= "item_197|...|" . $nm_var_lab[171] . "|menu_dani_form_php.php?sc_item_menu=item_197&sc_apl_menu=form_kalkulasi_remunerasi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[171] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_197|...|" . $nm_var_lab[171] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_pembayaran']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_pembayaran']) == "on")
{
    $menu_dani_menuData['data'] .= "item_198|...|" . $nm_var_lab[172] . "|menu_dani_form_php.php?sc_item_menu=item_198&sc_apl_menu=grid_hrm_remunerasi_pembayaran&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[172] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_198|...|" . $nm_var_lab[172] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_160|.|" . $nm_var_lab[173] . "||" . $nm_var_hint[173] . "||_self|\n";
$menu_dani_menuData['data'] .= "item_161|..|" . $nm_var_lab[174] . "||" . $nm_var_hint[174] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_akun_header']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_akun_header']) == "on")
{
    $menu_dani_menuData['data'] .= "item_202|...|" . $nm_var_lab[175] . "|menu_dani_form_php.php?sc_item_menu=item_202&sc_apl_menu=grid_akun_header&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[175] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_202|...|" . $nm_var_lab[175] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_akun']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_akun']) == "on")
{
    $menu_dani_menuData['data'] .= "item_203|...|" . $nm_var_lab[176] . "|menu_dani_form_php.php?sc_item_menu=item_203&sc_apl_menu=grid_akun&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[176] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_203|...|" . $nm_var_lab[176] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jenis_transaksi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_jenis_transaksi']) == "on")
{
    $menu_dani_menuData['data'] .= "item_204|...|" . $nm_var_lab[177] . "|menu_dani_form_php.php?sc_item_menu=item_204&sc_apl_menu=grid_jenis_transaksi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[177] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_204|...|" . $nm_var_lab[177] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_map_transaksi_jurnal']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_map_transaksi_jurnal']) == "on")
{
    $menu_dani_menuData['data'] .= "item_205|...|" . $nm_var_lab[178] . "|menu_dani_form_php.php?sc_item_menu=item_205&sc_apl_menu=grid_map_transaksi_jurnal&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[178] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_205|...|" . $nm_var_lab[178] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_199|..|" . $nm_var_lab[179] . "||" . $nm_var_hint[179] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal']) == "on")
{
    $menu_dani_menuData['data'] .= "item_214|...|" . $nm_var_lab[180] . "|menu_dani_form_php.php?sc_item_menu=item_214&sc_apl_menu=grid_jurnal&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[180] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_214|...|" . $nm_var_lab[180] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal_master']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal_master']) == "on")
{
    $menu_dani_menuData['data'] .= "item_200|...|" . $nm_var_lab[181] . "|menu_dani_form_php.php?sc_item_menu=item_200&sc_apl_menu=grid_jurnal_master&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[181] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_200|...|" . $nm_var_lab[181] . "||||_self|disabled\n";
}
$menu_dani_menuData['data'] .= "item_201|..|" . $nm_var_lab[182] . "||" . $nm_var_hint[182] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_journal_summary']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_journal_summary']) == "on")
{
    $menu_dani_menuData['data'] .= "item_206|...|" . $nm_var_lab[183] . "|menu_dani_form_php.php?sc_item_menu=item_206&sc_apl_menu=form_period_journal_summary&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[183] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_206|...|" . $nm_var_lab[183] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_general_ledger_summary']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_general_ledger_summary']) == "on")
{
    $menu_dani_menuData['data'] .= "item_207|...|" . $nm_var_lab[184] . "|menu_dani_form_php.php?sc_item_menu=item_207&sc_apl_menu=form_period_general_ledger_summary&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[184] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_207|...|" . $nm_var_lab[184] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_trial_balance']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_trial_balance']) == "on")
{
    $menu_dani_menuData['data'] .= "item_252|...|" . $nm_var_lab[185] . "|menu_dani_form_php.php?sc_item_menu=item_252&sc_apl_menu=form_period_trial_balance&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[185] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_252|...|" . $nm_var_lab[185] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_balance_sheet']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_balance_sheet']) == "on")
{
    $menu_dani_menuData['data'] .= "item_211|...|" . $nm_var_lab[186] . "|menu_dani_form_php.php?sc_item_menu=item_211&sc_apl_menu=form_period_balance_sheet&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[186] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_211|...|" . $nm_var_lab[186] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_income_summary']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_income_summary']) == "on")
{
    $menu_dani_menuData['data'] .= "item_210|...|" . $nm_var_lab[187] . "|menu_dani_form_php.php?sc_item_menu=item_210&sc_apl_menu=form_period_income_summary&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[187] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_210|...|" . $nm_var_lab[187] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_equity']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_equity']) == "on")
{
    $menu_dani_menuData['data'] .= "item_213|...|" . $nm_var_lab[188] . "|menu_dani_form_php.php?sc_item_menu=item_213&sc_apl_menu=form_period_equity&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[188] . "||" . $this->menu_dani_target('_self') . "|" . "\n";
}
else
{
    $menu_dani_menuData['data'] .= "item_213|...|" . $nm_var_lab[188] . "||||_self|disabled\n";
}

$menu_dani_menuData['data'] = array();
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__add_16.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[0] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[0] . "",
    'id'       => "item_2",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_2",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[1] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[1] . "",
    'id'       => "item_14",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_14",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_1&sc_apl_menu=grid_tbantrian&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbantrian']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbantrian']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[2] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[2] . "",
        'id'       => "item_1",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_1",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_5&sc_apl_menu=grid_ketersediaan_bed&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ketersediaan_bed']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ketersediaan_bed']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[3] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[3] . "",
        'id'       => "item_5",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_5",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_6&sc_apl_menu=grid_harga_tindakan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_harga_tindakan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_harga_tindakan']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['others']['active']))
    {
        $str_icon = $arr_menuicons['others']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
    {
        $icon_aba = $arr_menuicons['others']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['others']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[4] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[4] . "",
        'id'       => "item_6",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_6",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_9&sc_apl_menu=grid_tbadmrawatinap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadmrawatinap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadmrawatinap']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[5] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[5] . "",
        'id'       => "item_9",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_9",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_10&sc_apl_menu=grid_tbpayment&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpayment']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpayment']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[6] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[6] . "",
        'id'       => "item_10",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_10",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_145&sc_apl_menu=grid_tbpaymentri&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaymentri']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaymentri']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[7] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[7] . "",
        'id'       => "item_145",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_145",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_146&sc_apl_menu=grid_antrian&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_antrian']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_antrian']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[8] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[8] . "",
        'id'       => "item_146",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_146",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[9] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[9] . "",
    'id'       => "item_15",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_15",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_16&sc_apl_menu=grid_tbdetailrawatjalan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[10] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[10] . "",
        'id'       => "item_16",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_16",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_17&sc_apl_menu=grid_tbdetailrawatinap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[11] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[11] . "",
        'id'       => "item_17",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_17",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_18&sc_apl_menu=grid_tbdetailigd&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[12] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[12] . "",
        'id'       => "item_18",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_18",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_20&sc_apl_menu=grid_tbdetailok&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailok']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailok']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[13] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[13] . "",
        'id'       => "item_20",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_20",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_21&sc_apl_menu=grid_tbdetailvk&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailvk']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailvk']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[14] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[14] . "",
        'id'       => "item_21",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_21",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[15] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[15] . "",
    'id'       => "item_23",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_23",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_150&sc_apl_menu=grid_tbdetailrawatjalan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[16] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[16] . "",
        'id'       => "item_150",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_150",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_151&sc_apl_menu=grid_tbdetailrawatinap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[17] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[17] . "",
        'id'       => "item_151",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_151",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_152&sc_apl_menu=grid_tbdetailigd&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[18] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[18] . "",
        'id'       => "item_152",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_152",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[19] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[19] . "",
    'id'       => "item_33",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_33",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[20] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[20] . "",
    'id'       => "item_35",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_35",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[21] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[21] . "",
    'id'       => "item_153",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_153",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_36&sc_apl_menu=grid_tbdetailrawatjalan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatjalan']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[22] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[22] . "",
        'id'       => "item_36",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_36",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_147&sc_apl_menu=grid_tbdetailigd&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailigd']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[23] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[23] . "",
        'id'       => "item_147",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_147",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_148&sc_apl_menu=grid_tbdetailrawatinap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdetailrawatinap']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[24] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[24] . "",
        'id'       => "item_148",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_148",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_37&sc_apl_menu=grid_tbpo&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpo']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpo']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[25] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[25] . "",
        'id'       => "item_37",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_37",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_39&sc_apl_menu=grid_tbstockopname&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbstockopname']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbstockopname']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[26] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[26] . "",
        'id'       => "item_39",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_39",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_149&sc_apl_menu=grid_tbcaraminum&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcaraminum']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcaraminum']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[27] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[27] . "",
        'id'       => "item_149",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_149",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__book_green_16.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[28] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[28] . "",
    'id'       => "item_41",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_41",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[29] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[29] . "",
    'id'       => "item_42",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_42",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_43&sc_apl_menu=grid_tbobat&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbobat']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbobat']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[30] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[30] . "",
        'id'       => "item_43",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_43",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[31] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[31] . "",
    'id'       => "item_44",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_44",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_45&sc_apl_menu=grid_tbgolonganobat&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgolonganobat']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgolonganobat']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[32] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[32] . "",
        'id'       => "item_45",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_45",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[33] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[33] . "",
    'id'       => "item_46",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_46",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[34] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[34] . "",
    'id'       => "item_47",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_47",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[35] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[35] . "",
    'id'       => "item_48",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_48",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_130&sc_apl_menu=grid_tbpoli&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpoli']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpoli']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[36] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[36] . "",
        'id'       => "item_130",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_130",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_49&sc_apl_menu=grid_tbpbf&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpbf']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpbf']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[37] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[37] . "",
        'id'       => "item_49",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_49",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_50&sc_apl_menu=grid_tbinstansi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbinstansi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbinstansi']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[38] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[38] . "",
        'id'       => "item_50",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_50",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[39] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[39] . "",
    'id'       => "item_53",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_53",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[40] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[40] . "",
    'id'       => "item_54",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_54",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[41] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[41] . "",
    'id'       => "item_55",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_55",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[42] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[42] . "",
    'id'       => "item_56",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_56",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_57&sc_apl_menu=grid_tbbu&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbbu']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbbu']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[43] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[43] . "",
        'id'       => "item_57",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_57",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_58&sc_apl_menu=grid_tbgelardokter&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgelardokter']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgelardokter']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[44] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[44] . "",
        'id'       => "item_58",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_58",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[45] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[45] . "",
    'id'       => "item_59",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_59",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[46] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[46] . "",
    'id'       => "item_60",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_60",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[47] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[47] . "",
    'id'       => "item_62",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_62",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_63&sc_apl_menu=grid_tbdoctor&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdoctor']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdoctor']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[48] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[48] . "",
        'id'       => "item_63",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_63",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_64&sc_apl_menu=grid_tbcustomer&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcustomer']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcustomer']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[49] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[49] . "",
        'id'       => "item_64",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_64",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_143&sc_apl_menu=grid_tbhrd&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbhrd']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbhrd']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[50] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[50] . "",
        'id'       => "item_143",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_143",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[51] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[51] . "",
    'id'       => "item_67",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_67",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_68&sc_apl_menu=grid_tbtindakan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbtindakan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbtindakan']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[52] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[52] . "",
        'id'       => "item_68",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_68",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_70&sc_apl_menu=grid_tbceklab&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbceklab']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbceklab']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[53] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[53] . "",
        'id'       => "item_70",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_70",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_72&sc_apl_menu=grid_tbkelas&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbkelas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbkelas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[54] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[54] . "",
        'id'       => "item_72",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_72",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_144&sc_apl_menu=grid_tbruang&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbruang']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbruang']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[55] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[55] . "",
        'id'       => "item_144",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_144",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[56] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[56] . "",
    'id'       => "item_73",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_73",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[57] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[57] . "",
    'id'       => "item_74",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_74",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[58] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[58] . "",
    'id'       => "item_75",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_75",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[59] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[59] . "",
    'id'       => "item_76",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_76",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[60] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[60] . "",
    'id'       => "item_77",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_77",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[61] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[61] . "",
    'id'       => "item_78",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_78",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_79&sc_apl_menu=grid_tbadministrasi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadministrasi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadministrasi']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[62] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[62] . "",
        'id'       => "item_79",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_79",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[63] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[63] . "",
    'id'       => "item_80",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_80",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[64] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[64] . "",
    'id'       => "item_81",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_81",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[65] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[65] . "",
    'id'       => "item_82",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_82",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[66] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[66] . "",
    'id'       => "item_83",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_83",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[67] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[67] . "",
    'id'       => "item_84",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_84",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[68] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[68] . "",
    'id'       => "item_85",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_85",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__briefcase2_16.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[69] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[69] . "",
    'id'       => "item_86",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_86",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[70] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[70] . "",
    'id'       => "item_87",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_87",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[71] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[71] . "",
    'id'       => "item_88",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_88",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[72] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[72] . "",
    'id'       => "item_89",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_89",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__cabinet_16.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[73] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[73] . "",
    'id'       => "item_90",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_90",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[74] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[74] . "",
    'id'       => "item_91",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_91",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[75] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[75] . "",
    'id'       => "item_92",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_92",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[76] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[76] . "",
    'id'       => "item_93",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_93",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[77] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[77] . "",
    'id'       => "item_94",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_94",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[78] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[78] . "",
    'id'       => "item_95",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_95",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[79] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[79] . "",
    'id'       => "item_96",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_96",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[80] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[80] . "",
    'id'       => "item_97",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_97",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[81] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[81] . "",
    'id'       => "item_98",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_98",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[82] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[82] . "",
    'id'       => "item_99",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_99",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[83] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[83] . "",
    'id'       => "item_100",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_100",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[84] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[84] . "",
    'id'       => "item_101",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_101",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[85] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[85] . "",
    'id'       => "item_102",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_102",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[86] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[86] . "",
    'id'       => "item_103",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_103",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[87] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[87] . "",
    'id'       => "item_104",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_104",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[88] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[88] . "",
    'id'       => "item_105",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_105",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[89] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[89] . "",
    'id'       => "item_106",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_106",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[90] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[90] . "",
    'id'       => "item_107",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_107",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[91] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[91] . "",
    'id'       => "item_108",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_108",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[92] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[92] . "",
    'id'       => "item_109",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_109",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[93] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[93] . "",
    'id'       => "item_110",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_110",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[94] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[94] . "",
    'id'       => "item_111",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_111",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[95] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[95] . "",
    'id'       => "item_112",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_112",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[96] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[96] . "",
    'id'       => "item_113",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_113",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[97] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[97] . "",
    'id'       => "item_114",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_114",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[98] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[98] . "",
    'id'       => "item_115",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_115",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[99] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[99] . "",
    'id'       => "item_116",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_116",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[100] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[100] . "",
    'id'       => "item_117",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_117",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[101] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[101] . "",
    'id'       => "item_61",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_61",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[102] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[102] . "",
    'id'       => "item_118",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_118",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[103] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[103] . "",
    'id'       => "item_66",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_66",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[104] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[104] . "",
    'id'       => "item_119",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_119",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[105] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[105] . "",
    'id'       => "item_120",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_120",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[106] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[106] . "",
    'id'       => "item_121",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_121",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[107] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[107] . "",
    'id'       => "item_122",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_122",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[108] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[108] . "",
    'id'       => "item_123",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_123",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[109] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[109] . "",
    'id'       => "item_124",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_124",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[110] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[110] . "",
    'id'       => "item_125",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_125",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[111] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[111] . "",
    'id'       => "item_126",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_126",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[112] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[112] . "",
    'id'       => "item_127",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_127",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[113] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[113] . "",
    'id'       => "item_128",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_128",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[114] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[114] . "",
    'id'       => "item_129",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_129",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__lock2_16.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $this->Nm_lang['lang_menu_security'] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $this->Nm_lang['lang_menu_security'] . "",
    'id'       => "item_131",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_131",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_132&sc_apl_menu=sec_grid_sec_users&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_users'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_users'] . "",
        'id'       => "item_132",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_132",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_133&sc_apl_menu=sec_grid_sec_apps&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_apps']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_apps']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_apps'] . "",
        'id'       => "item_133",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_133",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_134&sc_apl_menu=sec_grid_sec_groups&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_groups']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_groups']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_groups'] . "",
        'id'       => "item_134",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_134",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_141&sc_apl_menu=sec_grid_sec_users_groups&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users_groups']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users_groups']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_users_x_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_users_x_groups'] . "",
        'id'       => "item_141",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_141",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_135&sc_apl_menu=sec_search_sec_groups&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_search_sec_groups']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_search_sec_groups']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['filter']['active']))
    {
        $str_icon = $arr_menuicons['filter']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['filter']['active']))
    {
        $icon_aba = $arr_menuicons['filter']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['filter']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['filter']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'id'       => "item_135",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_135",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_136&sc_apl_menu=sec_sync_apps&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_sync_apps']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_sync_apps']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['contr']['active']))
    {
        $str_icon = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'id'       => "item_136",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_136",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_139&sc_apl_menu=sec_logged_users&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_logged_users']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_logged_users']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_logged_users'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_logged_users'] . "",
        'id'       => "item_139",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_139",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_137&sc_apl_menu=sec_change_pswd&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_change_pswd']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_change_pswd']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['contr']['active']))
    {
        $str_icon = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'id'       => "item_137",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_137",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_138&sc_apl_menu=sec_Login&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_Login']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_Login']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['contrusr']['active']))
    {
        $str_icon = $arr_menuicons['contrusr']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['contrusr']['active']))
    {
        $icon_aba = $arr_menuicons['contrusr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contrusr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contrusr']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_exit'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_exit'] . "",
        'id'       => "item_138",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_parent') . "\"",
        'sc_id'    => "item_138",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[115] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[115] . "",
    'id'       => "item_142",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_142",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[116] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[116] . "",
    'id'       => "item_24",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_24",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[117] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[117] . "",
    'id'       => "item_25",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_25",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[118] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[118] . "",
    'id'       => "item_31",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_31",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[119] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[119] . "",
    'id'       => "item_32",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_32",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[120] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[120] . "",
    'id'       => "item_34",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_34",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[121] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[121] . "",
    'id'       => "item_11",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_11",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[122] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[122] . "",
    'id'       => "item_3",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_3",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[123] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[123] . "",
    'id'       => "item_4",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_4",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[124] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[124] . "",
    'id'       => "item_12",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_12",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[125] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[125] . "",
    'id'       => "item_13",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_13",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[126] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[126] . "",
    'id'       => "item_19",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_19",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[127] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[127] . "",
    'id'       => "item_26",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_26",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[128] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[128] . "",
    'id'       => "item_27",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_27",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[129] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[129] . "",
    'id'       => "item_28",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_28",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[130] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[130] . "",
    'id'       => "item_29",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_29",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[131] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[131] . "",
    'id'       => "item_30",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_30",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[132] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[132] . "",
    'id'       => "item_7",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_7",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[133] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[133] . "",
    'id'       => "item_8",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_8",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[134] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[134] . "",
    'id'       => "item_22",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_22",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[135] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[135] . "",
    'id'       => "item_65",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_65",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[136] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[136] . "",
    'id'       => "item_52",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_52",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[137] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[137] . "",
    'id'       => "item_71",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_71",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[138] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[138] . "",
    'id'       => "item_51",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_51",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[139] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[139] . "",
    'id'       => "item_69",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_69",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[140] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[140] . "",
    'id'       => "item_38",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_38",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[141] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[141] . "",
    'id'       => "item_40",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_40",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[142] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[142] . "",
    'id'       => "item_154",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_154",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[143] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[143] . "",
    'id'       => "item_253",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_253",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_162&sc_apl_menu=grid_response_insert_sep&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_sep']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_sep']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['blank']['active']))
    {
        $str_icon = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[144] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[144] . "",
        'id'       => "item_162",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_162",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_156&sc_apl_menu=grid_response_insert_rujukan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_rujukan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_response_insert_rujukan']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['blank']['active']))
    {
        $str_icon = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[145] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[145] . "",
        'id'       => "item_156",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_156",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_164&sc_apl_menu=form_vclaim_insert_lpk&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_insert_lpk']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_insert_lpk']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['blank']['active']))
    {
        $str_icon = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[146] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[146] . "",
        'id'       => "item_164",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_164",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_236&sc_apl_menu=aplicare_view_tersedia_kamar&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['aplicare_view_tersedia_kamar']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['aplicare_view_tersedia_kamar']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['blank']['active']))
    {
        $str_icon = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[147] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[147] . "",
        'id'       => "item_236",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_236",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[148] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[148] . "",
    'id'       => "item_158",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_158",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[149] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[149] . "",
    'id'       => "item_159",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_159",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_180&sc_apl_menu=grid_hrm_jabatan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[150] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[150] . "",
        'id'       => "item_180",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_180",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[151] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[151] . "",
    'id'       => "item_182",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_182",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_183&sc_apl_menu=grid_hrm_karyawan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[152] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[152] . "",
        'id'       => "item_183",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_183",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_184&sc_apl_menu=grid_hrm_karyawan_tetap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan_tetap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan_tetap']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[153] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[153] . "",
        'id'       => "item_184",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_184",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_185&sc_apl_menu=grid_hrm_jabatan_karyawan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan_karyawan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan_karyawan']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[154] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[154] . "",
        'id'       => "item_185",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_185",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_186&sc_apl_menu=grid_hrm_kontrak_kerja&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_kontrak_kerja']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_kontrak_kerja']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[155] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[155] . "",
        'id'       => "item_186",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_186",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_187&sc_apl_menu=grid_hrm_pendidikan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_pendidikan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_pendidikan']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[156] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[156] . "",
        'id'       => "item_187",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_187",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[157] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[157] . "",
    'id'       => "item_188",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_188",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_189&sc_apl_menu=grid_hrm_mesin_presensi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_mesin_presensi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_mesin_presensi']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[158] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[158] . "",
        'id'       => "item_189",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_189",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_190&sc_apl_menu=grid_hrm_user_presensi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_user_presensi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_user_presensi']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[159] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[159] . "",
        'id'       => "item_190",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_190",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_191&sc_apl_menu=grid_hrm_data_presensi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_data_presensi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_data_presensi']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[160] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[160] . "",
        'id'       => "item_191",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_191",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[161] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[161] . "",
    'id'       => "item_215",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_215",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_249&sc_apl_menu=grid_hrm_daftar_shift&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_daftar_shift']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_daftar_shift']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[162] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[162] . "",
        'id'       => "item_249",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_249",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_250&sc_apl_menu=grid_hrm_shift_karyawan&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_shift_karyawan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_shift_karyawan']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[163] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[163] . "",
        'id'       => "item_250",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_250",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[164] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[164] . "",
    'id'       => "item_192",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_192",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_195&sc_apl_menu=grid_hrm_periode_remunerasi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_periode_remunerasi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_periode_remunerasi']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[165] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[165] . "",
        'id'       => "item_195",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_195",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_193&sc_apl_menu=grid_hrm_remunerasi_tetap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tetap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tetap']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[166] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[166] . "",
        'id'       => "item_193",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_193",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_251&sc_apl_menu=grid_hrm_remunerasi_tidak_tetap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tidak_tetap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tidak_tetap']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[167] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[167] . "",
        'id'       => "item_251",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_251",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_194&sc_apl_menu=grid_hrm_potongan_tetap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tetap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tetap']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[168] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[168] . "",
        'id'       => "item_194",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_194",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_248&sc_apl_menu=grid_hrm_potongan_tidak_tetap&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tidak_tetap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tidak_tetap']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[169] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[169] . "",
        'id'       => "item_248",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_248",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_196&sc_apl_menu=grid_hrm_overtime&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_overtime']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_overtime']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[170] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[170] . "",
        'id'       => "item_196",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_196",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_197&sc_apl_menu=form_kalkulasi_remunerasi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_kalkulasi_remunerasi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_kalkulasi_remunerasi']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['contr']['active']))
    {
        $str_icon = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[171] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[171] . "",
        'id'       => "item_197",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_197",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_198&sc_apl_menu=grid_hrm_remunerasi_pembayaran&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_pembayaran']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_pembayaran']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[172] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[172] . "",
        'id'       => "item_198",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_198",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[173] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[173] . "",
    'id'       => "item_160",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_160",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[174] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[174] . "",
    'id'       => "item_161",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_161",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_202&sc_apl_menu=grid_akun_header&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_akun_header']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_akun_header']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[175] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[175] . "",
        'id'       => "item_202",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_202",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_203&sc_apl_menu=grid_akun&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_akun']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_akun']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[176] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[176] . "",
        'id'       => "item_203",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_203",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_204&sc_apl_menu=grid_jenis_transaksi&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jenis_transaksi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_jenis_transaksi']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[177] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[177] . "",
        'id'       => "item_204",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_204",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_205&sc_apl_menu=grid_map_transaksi_jurnal&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_map_transaksi_jurnal']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_map_transaksi_jurnal']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[178] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[178] . "",
        'id'       => "item_205",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_205",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[179] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[179] . "",
    'id'       => "item_199",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_199",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_214&sc_apl_menu=grid_jurnal&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[180] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[180] . "",
        'id'       => "item_214",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_214",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_200&sc_apl_menu=grid_jurnal_master&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal_master']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal_master']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['cons']['active']))
    {
        $str_icon = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[181] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[181] . "",
        'id'       => "item_200",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_200",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($str_icon) && isset($arr_menuicons['others']['active']))
{
    $str_icon = $arr_menuicons['others']['active'];
}
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_dani_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[182] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[182] . "",
    'id'       => "item_201",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_201",
    'disabled' => $str_disabled,
    'display'     => "",
    'display_position'=> "",
    'icon_fa'     => "",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_206&sc_apl_menu=form_period_journal_summary&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_journal_summary']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_journal_summary']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['contr']['active']))
    {
        $str_icon = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[183] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[183] . "",
        'id'       => "item_206",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_206",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_207&sc_apl_menu=form_period_general_ledger_summary&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_general_ledger_summary']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_general_ledger_summary']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['contr']['active']))
    {
        $str_icon = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[184] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[184] . "",
        'id'       => "item_207",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_207",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_252&sc_apl_menu=form_period_trial_balance&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_trial_balance']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_trial_balance']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['contr']['active']))
    {
        $str_icon = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[185] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[185] . "",
        'id'       => "item_252",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_252",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_211&sc_apl_menu=form_period_balance_sheet&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_balance_sheet']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_balance_sheet']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['contr']['active']))
    {
        $str_icon = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[186] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[186] . "",
        'id'       => "item_211",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_211",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_210&sc_apl_menu=form_period_income_summary&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_income_summary']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_income_summary']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['contr']['active']))
    {
        $str_icon = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[187] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[187] . "",
        'id'       => "item_210",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_210",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_dani_form_php.php?sc_item_menu=item_213&sc_apl_menu=form_period_equity&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_equity']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_equity']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['contr']['active']))
    {
        $str_icon = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_dani_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[188] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[188] . "",
        'id'       => "item_213",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_dani_target('_self') . "\"",
        'sc_id'    => "item_213",
        'disabled' => $str_disabled,
        'display'     => "",
        'display_position'=> "",
        'icon_fa'     => "",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );

if (isset($_SESSION['scriptcase']['sc_def_menu']['menu_dani']))
{
    $arr_menu_usu = $this->nm_arr_menu_recursiv($_SESSION['scriptcase']['sc_def_menu']['menu_dani']);
    $this->nm_gera_menus($str_menu_usu, $arr_menu_usu, 1, 'menu_dani');
    $menu_dani_menuData['data'] = $str_menu_usu;
}
if (is_file("menu_dani_help.txt"))
{
    $Arq_WebHelp = file("menu_dani_help.txt"); 
    if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
    {
        $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
        $Tmp = explode(";", $Arq_WebHelp[0]); 
        foreach ($Tmp as $Cada_help)
        {
            $Tmp1 = explode(":", $Cada_help); 
            if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "menu" && is_file($str_root . $path_help . $Tmp1[1]))
            {
                $str_disabled = "N";
                $str_link = "" . $path_help . $Tmp1[1] . "";
                $str_icon = "";
                $icon_aba = "";
                $icon_aba_inactive = "";
                if(empty($str_icon) && isset($arr_menuicons['']['active']))
                {
                    $str_icon = $arr_menuicons['']['active'];
                }
                if(empty($icon_aba) && isset($arr_menuicons['']['active']))
                {
                    $icon_aba = $arr_menuicons['']['active'];
                }
                if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
                {
                    $icon_aba_inactive = $arr_menuicons['']['inactive'];
                }
                $menu_dani_menuData['data'][] = array(
                    'label'    => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'level'    => "0",
                    'link'     => $str_link,
                    'hint'     => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'id'       => "item_Help",
                    'icon'     => $str_icon,
                    'icon_aba' => $icon_aba,
                    'icon_aba_inactive' => $icon_aba_inactive,
                    'target'   => "" . $this->menu_dani_target('_blank') . "",
                    'sc_id'    => "item_Help",
                    'disabled' => $str_disabled,
                    'display'     => "text",
                    'display_position'=> "",
                    'icon_fa'     => "",
                    'icon_color'     => "",
                    'icon_color_hover'     => "",
                    'icon_color_disabled'     => "",
                );
            }
        }
    }
}

if (isset($_SESSION['scriptcase']['sc_menu_del']['menu_dani']) && !empty($_SESSION['scriptcase']['sc_menu_del']['menu_dani']))
{
    $nivel = 0;
    $exclui_menu = false;
    foreach ($menu_dani_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_del']['menu_dani']))
       {
          $nivel = $cada_menu['level'];
          $exclui_menu = true;
          unset($menu_dani_menuData['data'][$i_menu]);
       }
       elseif ( empty($cada_menu) || ($exclui_menu && $nivel < $cada_menu['level']))
       {
          unset($menu_dani_menuData['data'][$i_menu]);
       }
       else
       {
          $exclui_menu = false;
       }
    }
    $Temp_menu = array();
    foreach ($menu_dani_menuData['data'] as $i_menu => $cada_menu)
    {
        $Temp_menu[] = $cada_menu;
    }
    $menu_dani_menuData['data'] = $Temp_menu;
}

if (isset($_SESSION['scriptcase']['sc_menu_disable']['menu_dani']) && !empty($_SESSION['scriptcase']['sc_menu_disable']['menu_dani']))
{
    $disable_menu = false;
    foreach ($menu_dani_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_disable']['menu_dani']))
       {
          $nivel = $cada_menu['level'];
          $disable_menu = true;
          $menu_dani_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu) && $disable_menu && $nivel < $cada_menu['level'])
       { 
          $menu_dani_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu))
       {
          $disable_menu = false;
       }
    }
}

/* HTML header */
if ($menu_dani_menuData['iframe'])
{
    $menu_dani_menuData['height'] = '100%';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> style="height: 100%">
<head>
 <title>SIMRS Aulia</title>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <?php
 if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
 {
  ?>
   <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
  <?php
 }
 ?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <?php 
 if(isset($str_google_fonts) && !empty($str_google_fonts)) 
 { 
     ?> 
     <link rel="stylesheet" type="text/css" href="<?php echo $str_google_fonts ?>" /> 
     <?php 
 } 
 ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_btngrp.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_btngrp.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_btngrp.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menutab.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menutab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_menuH.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_menuH.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $Str_btn_css ?>" /> 
 <link rel="stylesheet" href="<?php echo $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod']; ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../_lib/css/_menuTheme/scriptcase_Balance_Blue_hor_<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir']; ?>.css<?php if (@is_file($this->path_css . '_menuTheme/' . "scriptcase_Balance_Blue" . '_' . hor . '.css')) { echo '?scp=' . md5($this->path_css . '_menuTheme/' . "scriptcase_Balance_Blue" . '_' . hor . '.css'); } ?>" />
<style>
   .scTabText {
   }    <?php
        if(isset($_SESSION['scriptcase']['sc_def_menu']) && !empty($_SESSION['scriptcase']['sc_def_menu']))
        {
            foreach($_SESSION['scriptcase']['sc_def_menu'] as $arr_menus)
            {
              foreach($arr_menus as $id => $arr_item)
              {
                  if(isset($arr_item['icon_color']) && !empty($arr_item['icon_color']))
                  {
                      echo "   #" . $id . " .icon_fa{ color: ". $arr_item['icon_color'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . " i{ color:". $arr_item['icon_color'] ."  !important}
";
                      }
                  }
                  if(isset($arr_item['icon_color_hover']) && !empty($arr_item['icon_color_hover']))
                  {
                      echo "   #" . $id . ":hover .icon_fa{ color: ". $arr_item['icon_color_hover'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . ":hover i{ color:". $arr_item['icon_color_hover'] ."  !important}
";
                      }
                  }
                  if(isset($arr_item['icon_color_disabled']) && !empty($arr_item['icon_color_disabled']))
                  {
                      echo "   #" . $id . ".scdisabledmain .icon_fa{ color: ". $arr_item['icon_color_disabled'] ."  !important}
";
                      echo "   #" . $id . ".scdisabledsub .icon_fa{ color: ". $arr_item['icon_color_disabled'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . ".scTabInactive i{ color:". $arr_item['icon_color_disabled'] ."  !important}
";
                      }
                  }
              }
            }
        }
    ?>
</style>
<script type="text/javascript">
 var is_menu_vertical = false;
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
</script>
</head>
<body style="height: 100%" scroll="no" class='scMenuHPage'>
<?php

if ('' != $sOutputBuffer)
{
    echo $sOutputBuffer;
}

    $NM_scr_iframe = (isset($_POST['hid_scr_iframe'])) ? $_POST['hid_scr_iframe'] : "";   
}
else
{
    $menu_dani_menuData['height'] = '30px';
}

/* JS files */
?>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod']; ?>/third/jquery/js/jquery.js"></script>
<script  type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod']; ?>/third/jquery_plugin/contextmenu/jquery.contextmenu.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod']; ?>/third/jquery_plugin/contextmenu/contextmenu.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_contextmenu.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_contextmenu.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_contextmenu.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_contextmenu.css'); } ?>" /> 
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu_dani']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_sweetalert.css" />
<script type="text/javascript" src="menu_dani_message.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<script type="text/javascript">
$(function() {
<?php
if (count($this->nm_mens_alert)) {
   if (isset($this->Ini->nm_mens_alert) && !empty($this->Ini->nm_mens_alert))
   {
       if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
       {
           $this->nm_mens_alert   = array_merge($this->Ini->nm_mens_alert, $this->nm_mens_alert);
           $this->nm_params_alert = array_merge($this->Ini->nm_params_alert, $this->nm_params_alert);
       }
       else
       {
           $this->nm_mens_alert   = $this->Ini->nm_mens_alert;
           $this->nm_params_alert = $this->Ini->nm_params_alert;
       }
   }
   if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
   {
       foreach ($this->nm_mens_alert as $i_alert => $mensagem)
       {
           $alertParams = array();
           if (isset($this->nm_params_alert[$i_alert]))
           {
               foreach ($this->nm_params_alert[$i_alert] as $paramName => $paramValue)
               {
                   if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('background' == $paramName)
                   {
                       $image_param = $paramValue;
                       preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $paramValue, $matches, PREG_PATTERN_ORDER);
                       if (isset($matches[3])) {
                           foreach ($matches[3] as $match) {
                               if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                                   $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                               }
                           }
                       }
                       $paramValue = $image_param;
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
               }
           }
           $jsonParams = json_encode($alertParams);
?>
       scJs_alert('<?php echo $mensagem ?>', <?php echo $jsonParams ?>);
<?php
       }
   }
}
?>
});
</script>
<?php
$_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Nm_lang['lang_mnth_janu'],
                                  $this->Nm_lang['lang_mnth_febr'],
                                  $this->Nm_lang['lang_mnth_marc'],
                                  $this->Nm_lang['lang_mnth_apri'],
                                  $this->Nm_lang['lang_mnth_mayy'],
                                  $this->Nm_lang['lang_mnth_june'],
                                  $this->Nm_lang['lang_mnth_july'],
                                  $this->Nm_lang['lang_mnth_augu'],
                                  $this->Nm_lang['lang_mnth_sept'],
                                  $this->Nm_lang['lang_mnth_octo'],
                                  $this->Nm_lang['lang_mnth_nove'],
                                  $this->Nm_lang['lang_mnth_dece']);
$_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Nm_lang['lang_shrt_mnth_dece']);
$_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Nm_lang['lang_days_sund'],
                                  $this->Nm_lang['lang_days_mond'],
                                  $this->Nm_lang['lang_days_tued'],
                                  $this->Nm_lang['lang_days_wend'],
                                  $this->Nm_lang['lang_days_thud'],
                                  $this->Nm_lang['lang_days_frid'],
                                  $this->Nm_lang['lang_days_satd']);
$_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_days_sund'],
                                  $this->Nm_lang['lang_shrt_days_mond'],
                                  $this->Nm_lang['lang_shrt_days_tued'],
                                  $this->Nm_lang['lang_shrt_days_wend'],
                                  $this->Nm_lang['lang_shrt_days_thud'],
                                  $this->Nm_lang['lang_shrt_days_frid'],
                                  $this->Nm_lang['lang_shrt_days_satd']);
$Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
$Lim   = strlen($Str_date);
$Ult   = "";
$Arr_D = array();
for ($I = 0; $I < $Lim; $I++)
{
    $Char = substr($Str_date, $I, 1);
    if ($Char != $Ult)
    {
        $Arr_D[] = $Char;
    }
    $Ult = $Char;
}
$Prim = true;
$Str  = "";
foreach ($Arr_D as $Cada_d)
{
    $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
    $Str .= $Cada_d;
    $Prim = false;
}
$Str = str_replace("a", "Y", $Str);
$Str = str_replace("y", "Y", $Str);
$nm_data_fixa = date($Str); 
?>
<?php
$larg_table = "100%";
$col_span   = "";
$strAlign = 'align=\'left\'';
?>
<?php
$str_bmenu = nmButtonOutput($this->arr_buttons, "bmenu", "showMenu();", "showMenu();", "bmenu", "", "" . $this->Nm_lang['lang_btns_menu'] . "", "position:absolute; top:0px; left:0px; z-index:9999;", "absmiddle", "", "0px", $this->path_botoes, "", "" . $this->Nm_lang['lang_btns_menu_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $menu_mobile_hide          = $mobile_menu_mobile_hide;
    $menu_mobile_inicial_state = $mobile_menu_mobile_inicial_state;
    $menu_mobile_hide_onclick  = $mobile_menu_mobile_hide_onclick;
    $menutree_mobile_float     = $mobile_menutree_mobile_float;
    $menu_mobile_hide_icon     = $mobile_menu_mobile_hide_icon;
    $menu_mobile_hide_icon_menu_position     = $mobile_menu_mobile_hide_icon_menu_position;
}
if($menu_mobile_hide == 'S')
{
    if($menu_mobile_inicial_state =='escondido')
    {
            $str_menu_display="hide";
            $str_btn_display="show";
    }
    else
    {
        $str_menu_display="show";
        $str_btn_display="hide";
    }
    if($menu_mobile_hide_icon != 'S')
    {
        $str_btn_display="show";
    }
?>
<script>
    $( document ).ready(function() {
        $('#bmenu').<?php echo $str_btn_display; ?>();
        $('#idMenuCell').<?php echo $str_menu_display; ?>();
        $('#id_toolbar').<?php echo $str_menu_display; ?>();
        if($('#bmenu').length)
        {
            if($('.scMenuHHeader').length)
            {
                  $(".scMenuHHeader").css("padding-left", $('#bmenu').outerWidth());
            }
            else if($('.scMenuToolbar').length)
            {
                  $(".scMenuToolbar").css("padding-left", $('#bmenu').outerWidth());
            }
        }
        <?php
                if($menutree_mobile_float == 'S')
                {
                ?>
                    str_html_menu    = $('#idMenuCell').html();
                    str_html_toolbar = '';
                    if($('#idMenuToolbar').length)
                    {
                      str_html_toolbar = $('#idMenuToolbar').html();
                    }
                    $('#idMenuCell').remove()
                    $('#id_toolbar').remove()
                    $( 'body' ).prepend( "<div id='idMenuCell' style='position:absolute; top:0px; left:0px;z-index:9999;display:<?php echo (($menu_mobile_inicial_state =='escondido')?'none':''); ?>'>"+ str_html_menu + "<div>" + str_html_toolbar +"</div></div>" );
                    <?php
                    if($menu_mobile_hide_icon != 'S')
                    {
                        if($menu_mobile_hide_icon_menu_position == 'right')
                        {
                        ?>
                          $('#idMenuCell').css('left', $('#bmenu').outerWidth());
                        <?php
                        }
                        else
                        {
                          ?>
                          $('#idMenuCell').css('top', $('#bmenu').outerHeight());
                          <?php
                        }
                    }
                }
                elseif($menu_mobile_hide_icon == 'S')
                {
                ?>
                  $("#idDivMenu").css("padding-left", $('#bmenu').outerWidth());
                <?php
                }
                ?>
    });
    function showMenu()
    {
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').hide();
      <?php
      }
      ?>
            $('#idMenuCell').fadeToggle();
            $('#id_toolbar').fadeToggle();
      <?php
      if($menutree_mobile_float != 'S')
      {
      ?>
  setTimeout(function(){ scToggleOverflow(); }, 600);
      <?php
      }
      ?>
    }
    function HideMenu()
    {
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').show();
      <?php
      }
      ?>
            $('#idMenuCell').fadeToggle();
            $('#id_toolbar').fadeToggle();
      <?php
      if($menutree_mobile_float != 'S')
      {
      ?>
  setTimeout(function(){ scToggleOverflow(); }, 600);
      <?php
      }
      ?>
    }
</script>
<?php
echo $str_bmenu;
}
?>
<script>
        $( document ).ready(function() {
            $.contextMenu({
                selector:'#contrl_abas > li',
                leftButton: true,
                callback: function(key, options)
                {
                        switch(key)
                        {
                            case 'close':
                                contextMenuCloseTab($(this).attr('id'));
                            break;

                            case 'closeall':
                                contextMenuCloseAllTabs();
                            break;

                            case 'closeothers':
                                contextMenuCloseOthersTabs($(this).attr('id'));
                            break;

                            case 'closeright':
                                contextMenuCloseRight($(this).attr('id'));
                            break;

                            case 'closeleft':
                                contextMenuCloseLeft($(this).attr('id'));
                            break;
                        }
                    },
                items: {
                        "close": {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_close']); ?>'},
                        "closeall": {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeall']); ?>'},
                        "closeothers" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeothers']); ?>'},
                        "closeright" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeright']); ?>'},
                        "closeleft" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeleft']); ?>'},
                    }
            });
        });

        function contextMenuCloseAllTabs()
        {
            $( "#contrl_abas li" ).each(function( index ) {
                contextMenuCloseTab($( this ).attr('id'));
            });
        }

        function contextMenuCloseTab(str_id)
        {
            if(str_id.indexOf('aba_td_') >= 0)
            {
                str_id = str_id.substr(7);
            }
            del_aba_td( str_id );
        }

        function contextMenuCloseRight(str_id)
        {
            bol_start_del = false;
            $( "#contrl_abas li" ).each(function( index ) {

                if(bol_start_del)
                {
                    contextMenuCloseTab($( this ).attr('id'));
                }

                if(str_id == $( this ).attr('id'))
                {
                    bol_start_del = true;
                }
            });
        }


        function contextMenuCloseLeft(str_id)
        {
            $( "#contrl_abas li" ).each(function( index ) {

                if(str_id == $( this ).attr('id'))
                {
                     return false;
                }
                else
                {
                    contextMenuCloseTab($( this ).attr('id'));
                }
            });
        }

        function contextMenuCloseOthersTabs(str_id)
        {
            $( "#contrl_abas li" ).each(function( index ) {
                if(str_id != $( this ).attr('id'))
                {
                    contextMenuCloseTab($( this ).attr('id'));
                }
            });
        }

function expandMenu()
{
    $('#idMenuHeader').hide();
    $('#idMenuLine').hide();
    $('#id_toolbar').hide();
    $('#id_expand').hide();
    $('#id_collapse').show();
}

function collapseMenu()
{
    $('#idMenuHeader').show();
    $('#idMenuLine').show();
    $('#id_toolbar').show();
    $('#id_expand').show();
    $('#id_collapse').hide();
}
Iframe_atual = "menu_dani_iframe";
function writeFastMenu(arr_link)
{
    var link_ok = "";
    for (i = 0; i < arr_link.length; i++) 
    {
        if (link_ok != "")
        {
            link_ok += "<img src='<?php echo $path_imag_cab . "/" . $this->breadcrumbline_separator; ?>'>";
        }
        link_ok += arr_link[i].replace(/#NMIframe#/g, Iframe_atual);
    }
    document.getElementById('links_apls_itens').innerHTML = link_ok;
    document.getElementById('links_apls').style.display = '';
}
function clearFastMenu()
{
    document.getElementById('links_apls_itens').innerHTML = '';
    document.getElementById('links_apls').style.display = 'none';
}
Tab_iframes         = new Array();
Tab_labels          = new Array();
Tab_hints           = new Array();
Tab_icons           = new Array();
Tab_icons_inactive  = new Array();
Tab_abas            = new Array();
Tab_refresh         = new Array();
Tab_icon_fa         = new Array();
Tab_icon_fa_inactive= new Array();
Tab_display         = new Array();
Tab_display_position= new Array();
Tab_links          = new Array();
var scScrollInterval = divOverflow = false;
Tab_ico_def        = new Array();
Tab_ico_ina_def    = new Array();
<?php
 foreach ($arr_menuicons as $tp => $icon)
 {
    echo "Tab_ico_def['$tp']     = '" . $icon['active'] . "';\r\n";
    echo "Tab_ico_ina_def['$tp'] = '" . $icon['inactive'] . "';\r\n";
 }
?>
Aba_atual    = "";
<?php
 $seq = 0;
echo "Tab_iframes[" . $seq . "] = \"menu_dani\";\r\n";
echo "Tab_labels['menu_dani'] = \"\";\r\n";
echo "Tab_hints['menu_dani'] = \"\";\r\n";
echo "Tab_abas['menu_dani']   = \"none\";\r\n";
echo "Tab_refresh['menu_dani']   = \"\";\r\n";
echo "Tab_icons['menu_dani'] = \"scriptcase__NM__ico__NM__sc_menu_home_e.png\";\r\n";
echo "Tab_icons_inactive['menu_dani'] = \"scriptcase__NM__ico__NM__sc_menu_home_d.png\";\r\n";
echo "Tab_icon_fa['menu_dani']   = \"\";\r\n";
echo "Tab_icon_fa_inactive['menu_dani']   = \"\";\r\n";
echo "Tab_display['menu_dani']   = \"\";\r\n";
echo "Tab_display_position['menu_dani']   = \"\";\r\n";
echo "Tab_links['menu_dani']   = \"\";\r\n";
         $seq++;
 if(isset($menu_dani_menuData['data']) && !empty($menu_dani_menuData['data']))
 {
   foreach ($menu_dani_menuData['data'] as $ind => $dados_menu)
   {
     if ($dados_menu['link'] != "#")
     {
         if(empty($dados_menu['hint']))
         {
             $dados_menu['hint'] = $dados_menu['label'];
         }
         echo "Tab_iframes[" . $seq . "] = \"" . $dados_menu['id'] . "\";\r\n";
         echo "Tab_labels['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['label']) . "\";\r\n";
         echo "Tab_hints['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['hint']) . "\";\r\n";
         echo "Tab_abas['" . $dados_menu['id'] . "']   = \"none\";\r\n";
         echo "Tab_refresh['" . $dados_menu['id'] . "']   = \"\";\r\n";
         echo "Tab_icons['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba'] . "\";\r\n";
         echo "Tab_icons_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba_inactive'] . "\";\r\n";
         echo "Tab_icon_fa['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_icon_fa_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_display['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display'] . "\";\r\n";
         echo "Tab_display_position['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display_position'] . "\";\r\n";
         echo "Tab_links['" . $dados_menu['id'] . "']   = \"\";\r\n";
         $seq++;
     }
   }
 }
 if(isset($menu_dani_menuData['data_vertical']) && !empty($menu_dani_menuData['data_vertical']))
 {
   foreach ($menu_dani_menuData['data_vertical'] as $ind => $dados_menu)
   {
     if ($dados_menu['link'] != "#")
     {
         if(empty($dados_menu['hint']))
         {
             $dados_menu['hint'] = $dados_menu['label'];
         }
         echo "Tab_iframes[" . $seq . "] = \"" . $dados_menu['id'] . "\";\r\n";
         echo "Tab_labels['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['label']) . "\";\r\n";
         echo "Tab_hints['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['hint']) . "\";\r\n";
         echo "Tab_abas['" . $dados_menu['id'] . "']   = \"none\";\r\n";
         echo "Tab_refresh['" . $dados_menu['id'] . "']   = \"\";\r\n";
         echo "Tab_icons['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba'] . "\";\r\n";
         echo "Tab_icons_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba_inactive'] . "\";\r\n";
         echo "Tab_icon_fa['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_icon_fa_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_display['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display'] . "\";\r\n";
         echo "Tab_display_position['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display_position'] . "\";\r\n";
         echo "Tab_links['" . $dados_menu['id'] . "']   = \"\";\r\n";
         $seq++;
     }
   }
 }
?>
Qtd_apls = <?php echo $seq ?>;
function createIframe(str_id, str_label, str_hint, str_img_on, str_img_off, str_link, tp_apl)
{
    apl_exist = false;
    Tab_icons[str_id] = str_img_on;
    Tab_icons_inactive[str_id] = str_img_off;
    Tab_refresh[str_id] = "";
    if (tp_apl == null || tp_apl == '')
    {
        tp_apl = 'others';
    }
    if (Tab_icons[str_id] == '')
    {
        Tab_icons[str_id] = Tab_ico_def[tp_apl];
    }
    if (Tab_icons_inactive[str_id] == '')
    {
        Tab_icons_inactive[str_id] = Tab_ico_ina_def[tp_apl];
    }
    for (i = 0; i < Qtd_apls; i++)
    {
        if (Tab_iframes[i] == str_id) {
            apl_exist = true;
        }
    }
    if (apl_exist)
    {
        if (Tab_abas[str_id] != 'show') {
            createAba(str_id);
        }
        var iframe = document.getElementById('iframe_' + str_id);
        iframe.src = str_link;
        mudaIframe(str_id);
        return;
    }
    var iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    iframe.id = 'iframe_' + str_id;
    iframe.name = 'menu_dani_' + str_id + '_iframe';
    iframe.src = str_link;
    $('#Iframe_control').append(iframe);
    $('#iframe_' + str_id).addClass( 'scMenuIframe');
    Tab_iframes[Qtd_apls] = str_id;
    Tab_labels[str_id] = str_label;
    Tab_hints[str_id] = str_hint;
    Tab_abas[str_id]   = 'none';
    Tab_links[str_id]   = '';
    Qtd_apls++;
    createAba(str_id);
    mudaIframe(str_id);
}
function createAba(str_id)
{
    var tmp = "";
    var html_icon = "";
        html_icon = "<div style='display:inline-block;'>";
        str_icon = Tab_icons[str_id];
        if(str_icon=='')
        {
            str_icon = 'scriptcase__NM__ico__NM__sc_menu_others_e.png';
        }
        if(str_icon != '')
        {
            html_icon += "<img id='aba_td_" + str_id + "_icon_active' src='<?php echo $this->path_botoes; ?>/"+ str_icon +"' align='absmiddle' class='scTabIcon'>";
        }
        str_icon = Tab_icons_inactive[str_id];
        if(str_icon=='')
        {
            str_icon = 'scriptcase__NM__ico__NM__sc_menu_others_d.png';
        }
        if(str_icon != '')
        {
            html_icon += "<img id='aba_td_" + str_id + "_icon_inactive' src='<?php echo $this->path_botoes; ?>/"+ str_icon +"' align='absmiddle' class='scTabIcon' style='display:none;'>";
        }
        html_icon += "</div>";
    if(Tab_display[ str_id ] == 'text_fontawesomeicon' || Tab_display[ str_id ] == 'only_fontawesomeicon')
    {
        html_icon = "<i id='aba_td_" + str_id + "_icon_active' class='"+ Tab_icon_fa[str_id] +"' style='vertical-align:middle;padding: 0px 4px; display:none;'></i>";
        html_icon += "<i id='aba_td_" + str_id + "_icon_inactive' class='"+ Tab_icon_fa_inactive[str_id] +"' style='vertical-align:middle;padding: 0px 4px;'></i>";
    }
    tmp  = "<li onclick=\"mudaIframe('" + str_id + "');\" id='aba_td_" + str_id + "' style='cursor:pointer' class='lslide scTabActive' title=\"" + Tab_hints[str_id] + "\">";
    if(Tab_display_position[ str_id ] != 'img_right')
    {
        tmp += html_icon;
    }
    var home_style="";
    if(str_id === 'menu_dani'){ home_style=";padding-left:4px;min-height:14px;"; }
    tmp += "<div id='aba_td_txt_" + str_id + "' style='display:inline-block;cursor:pointer"+home_style+"' class='scTabText' >";
    tmp += Tab_labels[str_id];
    if(Tab_display_position[ str_id ] == 'img_right')
    {
        tmp += html_icon;
    }
    tmp += "</div>";
    tmp += "<div id='aba_td_3_" + str_id + "' style='display:none;'>...</div>";
    tmp += "<div style='display:inline-block;'>";
    tmp += "    <img id='aba_td_img_" + str_id + "' src='<?php echo $this->path_botoes . "/" . $this->css_menutab_active_close_icon; ?>' onclick=\"event.stopPropagation(); del_aba_td('" + str_id + "'); \" align='absmiddle' class='scTabCloseIcon' style='cursor:pointer; z-index:9999;'>";
    tmp += "</div>";
    tmp += "</li>";
    $('#contrl_abas').append(tmp);
    Tab_abas[str_id] = 'show';
}
function mudaIframe(str_id)
{
    $('#iframe_menu_dani').hide();
    if (Aba_atual != "")
    {
        Tab_links[Aba_atual] = document.getElementById('links_apls_itens').innerHTML;
        document.getElementById('links_apls_itens').innerHTML = '';
        $('#links_apls').hide();
    }
    if (str_id != "" && Tab_links[str_id] != "")
    {
        document.getElementById('links_apls_itens').innerHTML = Tab_links[str_id];
        $('#links_apls').show();
    }
    if (str_id == "")
    {
        $('#iframe_menu_dani').show();
        $('#iframe_' + Aba_atual).prop('src', '');
        $('#links_abas').hide();
        $('#id_links_abas').hide();
    }
    else
    {
        $('#aba_td_' + Aba_atual).removeClass( 'scTabActive' );
        $('#aba_td_' + Aba_atual).addClass( 'scTabInactive' );
        $('#aba_td_' + Aba_atual+'_icon_active').hide();
        $('#aba_td_' + Aba_atual+'_icon_inactive').show();
        $('#aba_td_img_' + Aba_atual).prop( 'src', '<?php echo $this->path_botoes . "/" . $this->css_menutab_inactive_close_icon; ?>' );
    }
    for (i = 0; i < Tab_iframes.length; i++) 
    {
        if (Tab_iframes[i] == str_id) 
        {
            $('#iframe_' + Tab_iframes[i]).show();
            Aba_atual    = str_id;
            $('#aba_td_' + Aba_atual).removeClass( 'scTabInactive' );
            $('#aba_td_' + Aba_atual).addClass( 'scTabActive' );
            $('#aba_td_' + Aba_atual+'_icon_active').show();
            $('#aba_td_' + Aba_atual+'_icon_inactive').hide();
            $('#aba_td_img_' + Aba_atual).prop( 'src', '<?php echo $this->path_botoes . "/" . $this->css_menutab_active_close_icon; ?>' );
            if (Tab_iframes[i] != 'menu_dani') 
            {
                Iframe_atual = "menu_dani_" + Tab_iframes[i] + '_iframe';
            }
            $('#iframe_' + Tab_iframes[i]).contents().find('body').css('width', '');
            $('#iframe_' + Tab_iframes[i])[0].contentWindow.focus();
        } else {
            $('#iframe_' + Tab_iframes[i]).hide();
        }
    }
    if (Tab_refresh[str_id] == 'S' && typeof document.getElementById('iframe_' + str_id).contentWindow.nm_move === 'function')
    {
        Tab_refresh[str_id] = '';
        document.getElementById('iframe_' + str_id).contentWindow.nm_move('igual');
    }
}
function del_aba_td(str_id)
{
    $('#aba_td_' + str_id).remove();
    Tab_abas[str_id] = 'none';
    $('#iframe_' + str_id).prop('src', '');
    Tab_links[str_id] = "";
    if (Aba_atual == str_id)
    {
        str_id = "";
        for (i = 0; i < Tab_iframes.length; i++) 
        {
            if (Tab_abas[Tab_iframes[i]] == 'show' && Tab_refresh[Tab_iframes[i]] == 'S')
            {
                str_id = Tab_iframes[i];
            }
        }
        if (str_id == "")
        {
            for (i = 0; i < Tab_iframes.length; i++) 
            {
                if (Tab_abas[Tab_iframes[i]] == 'show')
                {
                    str_id = Tab_iframes[i];
                }
            }
        }
        if (str_id == "")
        {
            str_id = "menu_dani";
        }
        mudaIframe(str_id);
    }
  scToggleOverflow();
}
$( document ).ready(function() { scToggleOverflow() });
function scToggleOverflow() {
  var width_offset = 0;
  if (is_menu_vertical === true) { width_offset = $('#idDivMenu').parent()[0].offsetWidth + 2; };
  var hasOverflow, scrollElement;
  scrollElement = $('#div_contrl_abas')[0];
  if (scrollElement.offsetHeight < scrollElement.scrollHeight || scrollElement.offsetWidth < scrollElement.scrollWidth) {
      hasOverflow = true;
  } else {
      hasOverflow = false;
  }
  if (divOverflow === hasOverflow){ return false; }
  if (hasOverflow === true) {
      $('.scTabScroll').show();
      $('#div_contrl_abas').toggleClass('div-overflow');
  } else {
      $('.scTabScroll').hide();
      $('#div_contrl_abas').toggleClass('div-overflow');
  }
  divOverflow = hasOverflow;
}
function scTabScroll(axis) {
  if (axis == 'stop') {
      clearInterval(scScrollInterval);
      return;
  }
  if (axis == 'left') {
      scScrollInterval = setInterval("$('#div_contrl_abas').scrollLeft($('#div_contrl_abas').scrollLeft() - 3)", 2);
  } else {
      scScrollInterval = setInterval("$('#div_contrl_abas').scrollLeft($('#div_contrl_abas').scrollLeft() + 3)", 2);
  }
}
function openMenuItem(str_id)
{
    str_target_sv = "";
    if (str_id != "iframe_menu_dani")
    {
        str_target_sv = str_id + "_iframe";
        str_id        = str_id.replace("menu_dani_","");
    }
    if($('#' + str_id).parent().length)
    {
        $('#' + str_id).parent().toggleClass('menu__item--active');
    }
    str_link   = $('#' + str_id).attr('item-href');
    str_target = $('#' + str_id).attr('item-target');
    str_id = str_id.replace('iframe_menu_dani', 'menu_dani');
    if (str_target == "menu_dani_iframe" && str_link != '' && str_link != '#' && str_link != 'javascript:')
    {
        str_target = (str_target_sv != "") ? str_target_sv : str_target;
        mudaIframe(str_id);
        if (str_id != "menu_dani")
        {
            $('#links_abas').css('display','');
            $('#id_links_abas').css('display','');
        }
        if (str_id != "menu_dani" && Tab_abas[str_id] != 'show')
        {
            createAba(str_id);
      scToggleOverflow();
        }
    }
    //test link type
    if (str_link != '' && str_link != '#' && str_link != 'javascript:')
    {
        if (str_link.substring(0, 11) == 'javascript:')
        {
            eval(str_link.substring(11));
        }
        else if (str_link != '#' && str_target != '_parent')
        {
            window.open(str_link, str_target);
        }
        else if (str_link != '#' && str_target == '_parent')
        {
            document.location = str_link;
        }
        <?php
        if ($menu_mobile_hide == 'S' && $menu_mobile_hide_onclick == 'S')
        {
        ?>
            HideMenu();
        <?php
        }
        ?>
    }
    if($('#iframe_menu_dani').length)
        $('#iframe_menu_dani')[0].contentWindow.focus();
}
</script>
<?php
$fixMainMenuPosition = ($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])) ? '' : '; position: absolute';
?>
<table id="main_menu_table" <?php echo $strAlign; ?> style="border-collapse: collapse; border-width: 0px; height:100%; width: <?php echo $larg_table; ?><?php echo $fixMainMenuPosition; ?>" cellpadding=0 cellspacing=0>
  <tr class="scMenuHTableCssAlt" id='idMenuLine'>
      <td <?php echo $strAlign; ?> valign="top" class="scMenuLine" style="width:100%; height:30;padding: 0px;" id='idMenuCell'>
<div id="scScrollFix" style="height: 1px"></div>
<script type="text/javascript">
function fnScrollFix() {
 var txt = document.getElementById("scScrollFix").innerHTML;
 if ("&nbsp;" == txt) { txt = "&nbsp;&nbsp;"; } else { txt = "&nbsp;"; }
 document.getElementById("scScrollFix").innerHTML = txt;
 setTimeout("fnScrollFix()", 500);
}
setTimeout("fnScrollFix()", 500);
</script>
<div id="idDivMenu">
<table style='width:100%'><tr><?php
echo $this->menu_dani_escreveMenu($menu_dani_menuData['data'], $path_imag_cab, $strAlign);
?></tr></table>
</div>
<?php
/* Iframe control */
if ($menu_dani_menuData['iframe'])
{
?>
    </td>
  </tr>
<?php echo $this->nm_show_toolbarmenu('', $saida_apl, $menu_dani_menuData, $path_imag_cab); ?><?php echo $this->nm_gera_degrade(1, $bg_line_degrade, $path_imag_cab); ?>  <tr>
        <td id="links_abas" style="display: none;">
          <div id="id_links_abas" style="display: none;" class='scTabLine'>
            <div class='scTabScroll left' style='float:left;display:none;' onmousedown='scTabScroll("left");' onmouseup='scTabScroll("stop");' onmouseout='scTabScroll("stop");'></div>
            <div class='scTabScroll right' style='float:right;display:none;'onmousedown='scTabScroll("right");' onmouseup='scTabScroll("stop");' onmouseout='scTabScroll("stop");'></div>
            <div id='div_contrl_abas' class='scTabCtrl' style='overflow:hidden;white-space: nowrap;'>
              <ul id='contrl_abas' style='margin:0px; padding:0px;'></ul>
            </div>
          </div>
        </td>
        </tr><tr>
        <td id="links_apls" style="display: none;">
            <div id="links_apls_itens" class='scMenuBreadcrumbLine'></div>
        </td>
        </tr><tr>
    <td style="border-width: 1px; height: 100%; padding: 0px;vertical-align:top;text-align:center;">
    <div id="Iframe_control" style='width:100%; height:100%; margin:0px; padding:0px;'>
<?php
$link_default = "";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank']) && $_SESSION['scriptcase']['sc_apl_seg']['blank'] == "on") 
{ 
    $SCR  = "";
    $link_default = " onclick=\"openMenuItem('iframe_menu_dani');\" item-href=\"menu_dani_form_php.php?sc_item_menu=menu_dani&sc_apl_menu=blank&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . "\"  item-target=\"menu_dani_iframe\"";
} 
else
{ 
    $SCR  = ($NM_scr_iframe != "" ? $NM_scr_iframe : "menu_dani_pag_ini.php");
} 
?>
      <iframe id="iframe_menu_dani" name="menu_dani_iframe" frameborder="0" class="scMenuIframe" style="width: 100%; height: 100%;"  src="<?php echo $SCR; ?>" <?php echo $link_default ?>></iframe>
<?php
 foreach ($menu_dani_menuData['data'] as $ind => $dados_menu)
 {
     if ($dados_menu['link'] != "#")
     {
         echo "      <iframe id=\"iframe_" . $dados_menu['id'] . "\" name= \"menu_dani_" . $dados_menu['id'] . "_iframe\" frameborder=\"0\" class=\"scMenuIframe\" style=\"display: none;width: 100%; height: 100%;\" src=\"\"></iframe>
";
     }
 }
}
?></div></td>
  </tr>
  <tr>
    <td style="padding: 0px">
<style>
#rod_col1 { margin:0px; padding: 3px 0px 0px 5px; float:left; overflow:hidden;}
#rod_col2 { margin:0px; padding: 3px 5px 0px 0px; float:right; overflow:hidden; text-align:right;}

</style>

<div style="width: 100%; height:20px;" class="scMenuHFooter">
        <span class="scMenuHFooterFont" id="rod_col1"><?php echo "Copyright - IT RS Aulia" ?></span>
        <span class="scMenuHFooterFont" id="rod_col2">
<?php
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS");
   echo $this->nm_data->FormataSaida("Y");
?>
</span>
</div>    </td>
  </tr>
</table>
</body>
</html>
<?php

if (isset($link_default) && !empty($link_default))
{
    echo "<script>";
    echo "   document.getElementById('iframe_menu_dani').click()";
    echo "</script>";
}

}

/* Target control */
function menu_dani_escreveMenu($arr_menu, $path_imag_cab = '', $strAlign = '')
{
    global $nm_data_fixa;
    $last      = '';
    $itemClass = ' topfirst';
    $subSize   = 2;
    $subCount  = array();
    $tabSpace  = 1;
    $intMult   = 2;
    $aMenuItemList = array();
    foreach ($arr_menu as $ind => $resto)
    {
        $aMenuItemList[] = $resto;
    }
?>
<td <?php echo $strAlign; ?>>
  <div class='mainmenu menu--horizontal'>
      <div class='menu__toggle'>
          <span></span>
          <span></span>
          <span></span>
      </div>
      <div class='menu__container'>
        <ul id="css3menu1" class="topmenu menu__list" style="">
        <?php
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
                if (0 == $aMenuItemList[$i]['level']) {
                    $last = $aMenuItemList[$i]['id'];
                }
            }
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
                if ($last == $aMenuItemList[$i]['id']) {
                    $itemClass = ' toplast';
                }
                $htmlClass = '';
                $hasChildrens = false;
                if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] < $aMenuItemList[$i + 1]['level']) {
                    $hasChildrens = true;
                }
                if (0 == $aMenuItemList[$i]['level']) {
                    $htmlClass = 'topmenu' . $itemClass;
                    if ($hasChildrens) {
                        $htmlClass .= ' toproot';
                    }
                }
                else
                {
                    $htmlClass .= ' menu__item--withsubmenu';
                }
                ?>
                <li class='menu__item <?php echo $htmlClass; ?>'>
                <?php
                if ('' != $aMenuItemList[$i]['icon'] && file_exists($this->path_imag_apl . "/" . $aMenuItemList[$i]['icon'])) {
                    $iconHtml = '../_lib/img/' . $aMenuItemList[$i]['icon'];
                }
                else {
                    $iconHtml = '';
                }
                $sDisabledClass = '';
                if ('Y' == $aMenuItemList[$i]['disabled']) {
                    $aMenuItemList[$i]['link']   = '#';
                    $aMenuItemList[$i]['target'] = '';
                    $sDisabledClass               = 0 == $aMenuItemList[$i]['level'] ? ' scdisabledmain' : ' scdisabledsub';
                }
                if (empty($aMenuItemList[$i]['link'])) {
                    $aMenuItemList[$i]['link']   = '#';
                }
                $str_item = "<i class='menu__icon fas'></i>";
                if ($hasChildrens) {
                    $str_item .= "<span>";
                }
                if($aMenuItemList[$i]['display'] == 'only_img' && $iconHtml != '')
                {
                    $str_item .= '<img src=' . $iconHtml . ' border="0" />';
                }
                elseif($aMenuItemList[$i]['display'] == 'text_img' || empty($aMenuItemList[$i]['display']))
                {
                    $str_image = '';
                    $str_image_right = '';
                    if($iconHtml != '')
                    {
                        $str_image = '<img src="' . $iconHtml . '" border="0" />';
                        $str_image_right = '<img src="' . $iconHtml . '" border="0" style="margin-left: 10px; margin-right: 0px;" />';
                    }
                    if($aMenuItemList[$i]['display_position'] != 'img_right')
                    {
                        $str_item .= $str_image . $aMenuItemList[$i]['label'];
                    }
                    else
                    {
                        $str_item .= $aMenuItemList[$i]['label'] . $str_image_right;
                    }
                }
                elseif($aMenuItemList[$i]['display'] == 'only_fontawesomeicon')
                {
                    $str_item .= "<i class='icon_fa menu__icon ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
                }
                elseif($aMenuItemList[$i]['display'] == 'text_fontawesomeicon')
                {
                    if($aMenuItemList[$i]['display_position'] != 'img_right')
                    {
                        $str_item .= "<i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i> ". $aMenuItemList[$i]['label'] ."";
                    }
                    else
                    {
                        $str_item .= $aMenuItemList[$i]['label'] ." <i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
                    }
                }
                else
                {
                    $str_item .= $aMenuItemList[$i]['label'];
                }
                if ($hasChildrens) {
                    $str_item .= "</span>";
                }
                ?>
                    <a href="javascript:" onclick="openMenuItem('menu_dani_<?php echo $aMenuItemList[$i]['id']; ?>');" item-href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>" <?php echo $aMenuItemList[$i]['target']; ?> class='menu__link <?php echo $sDisabledClass; ?>'><?php echo $str_item; ?></a>
                <?php
                if ($hasChildrens) {
                ?>
                    <ul class='menu__submenu' style=''>
                    <?php
                }
                else {
                ?>
                <?php
                }
                if (($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == $aMenuItemList[$i + 1]['level']) || 
                    ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) ||
                    (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) ||
                    (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == 0)) {
                    ?>
                    <?php echo str_repeat(' ', $tabSpace * $intMult); ?></li>
                    <?php
                    if (0 != $subSize && 0 < $aMenuItemList[$i]['level']) {
                        if (!isset($subCount[ $aMenuItemList[$i]['level'] ])) {
                            $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                        }
                        $subCount[ $aMenuItemList[$i]['level'] ]++;
                    }
                    if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) {
                        for ($j = 0; $j < $aMenuItemList[$i]['level'] - $aMenuItemList[$i + 1]['level']; $j++) {
                            unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                            ?>
                            </ul>
                            </li>
                            <?php
                        }
                    }
                    elseif (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) {
                        for ($j = 0; $j < $aMenuItemList[$i]['level']; $j++) {
                            unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                            ?>
                            </ul>
                            </li>
                            <?php
                        }
                    }
                    if ($subSize == $subCount[ $aMenuItemList[$i]['level'] ]) {
                        $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                    }
                }
                $itemClass = '';
            }
        ?>
        </ul>
      </div>
  </div>
</td>
<?php
}
function menu_dani_target($str_target)
{
    global $menu_dani_menuData;
    if ('_blank' == $str_target)
    {
        return '_blank';
    }
    elseif ('_parent' == $str_target)
    {
        return '_parent';
    }
    elseif ($menu_dani_menuData['iframe'])
    {
        return 'menu_dani_iframe';
    }
    else
    {
        return $str_target;
    }
}

function nm_show_toolbarmenu($col_span, $saida_apl, $menu_dani_menuData, $path_imag_cab)
{
}

   function nm_prot_aspas($str_item)
   {
       return str_replace('"', '\"', $str_item);
   }

   function nm_gera_menus(&$str_line_ret, $arr_menu_usu, $int_level, $nome_aplicacao)
   {
       global $menu_dani_menuData; 
       foreach ($arr_menu_usu as $arr_item)
       {
           $str_line   = array();
           $str_line['label']    = $this->nm_prot_aspas($arr_item['label']);
           $str_line['level']    = $int_level - 1;
           $str_line['link']     = "";
           $nome_apl = $arr_item['link'];
           $pos = strrpos($nome_apl, "/");
           if ($pos !== false)
           {
               $nome_apl = substr($nome_apl, $pos + 1);
           }
           if ('' != $arr_item['link'])
           {
               if ($arr_item['target'] == '_parent')
               {
                    $str_line['link'] = "menu_dani_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . ""; 
               }
               else
               {
                    $str_line['link'] = "menu_dani_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($menu_dani_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_dani']['glo_nm_usa_grupo'] . ""; 
               }
           }
           elseif ($arr_item['target'] == '_parent')
           {
           }
           $str_line['hint']     = ('' != $arr_item['hint']) ? $this->nm_prot_aspas($arr_item['hint']) : '';
           $str_line['id']       = $arr_item['id'];
           $str_line['icon']     = ('' != $arr_item['icon_on']) ? $arr_item['icon_on'] : '';
           $str_line['icon_aba'] = (isset($arr_item['icon_aba']) && '' != $arr_item['icon_aba']) ? $arr_item['icon_aba'] : '';
           $str_line['icon_aba_inactive'] = (isset($arr_item['icon_aba_inactive']) && '' != $arr_item['icon_aba_inactive']) ? $arr_item['icon_aba_inactive'] : '';
           $str_line['display'] = (isset($arr_item['display'])) ? $arr_item['display'] : 'text_img';
           $str_line['display_position'] = (isset($arr_item['display_position'])) ? $arr_item['display_position'] : 'text_right';
           $str_line['icon_fa'] = (isset($arr_item['icon_fa'])) ? $arr_item['icon_fa'] : '';
           $str_line['icon_color'] = (isset($arr_item['icon_color'])) ? $arr_item['icon_color'] : '';
           $str_line['icon_color_hover'] = (isset($arr_item['icon_color_hover'])) ? $arr_item['icon_color_hover'] : '';
           $str_line['icon_color_disabled'] = (isset($arr_item['icon_color_disabled'])) ? $arr_item['icon_color_disabled'] : '';
           if ('' == $arr_item['link'] && $arr_item['target'] == '_parent')
           {
               $str_line['target'] = '_parent';
           }
           else
           {
                $str_line['target'] = ('' != $arr_item['target'] && '' != $arr_item['link']) ?  $this->menu_dani_target( $arr_item['target']) : "_self"; 
           }
           $str_line['target']   = ' item-target="' . $str_line['target']  . '" ';
           $str_line['sc_id']    = $arr_item['id'];
           $str_line['disabled'] = "N";
           $str_line_ret[] = $str_line;
           if (!empty($arr_item['menu_itens']))
           {
               $this->nm_gera_menus($str_line_ret, $arr_item['menu_itens'], $int_level + 1, $nome_aplicacao);
           }
       }
   }

   function nm_arr_menu_recursiv($arr, $id_pai = '')
   {
         $arr_return = array();
         foreach ($arr as $id_menu => $arr_menu)
         {
             if ($id_pai == $arr_menu['pai']) 
             {
                 $arr_return[] = array('label'      => $arr_menu['label'],
                                        'link'       => $arr_menu['link'],
                                        'target'     => $arr_menu['target'],
                                        'icon_on'    => $arr_menu['icon'],
                                        'icon_aba'   => $arr_menu['icon_aba'],
                                        'icon_aba_inactive'   => $arr_menu['icon_aba_inactive'],
                                        'hint'       => $arr_menu['hint'],
                                        'id'         => $id_menu,
                                        'menu_itens' => $this->nm_arr_menu_recursiv($arr, $id_menu),
                                        'display'      => $arr_menu['display'],
                                        'display_position' => $arr_menu['display_position'],
                                        'icon_fa'      => $arr_menu['icon_fa'],
                                        'icon_color'      => $arr_menu['icon_color'],
                                        'icon_color_hover'      => $arr_menu['icon_color_hover'],
                                        'icon_color_disabled'      => $arr_menu['icon_color_disabled'],
                                        );
             }
         }
         return $arr_return;
   }
   //1 horizontal
   //2 vertical
   function nm_gera_degrade($menu_opc, $bg_line_degrade, $path_imag_cab)
   {
       $str_retorno = "";
       //have bg color degrade
       if(!empty($bg_line_degrade) && count($bg_line_degrade)>0)
       {
           if($menu_opc == 1)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<tr style=\"height:1px; padding: 0px;\">\r\n";
                       $str_retorno .= "  <td style=\"height:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\"><img src='". $path_imag_cab ."/transparent.png' border=\"0\" style=\"height:1px;\"></td>\r\n";
                       $str_retorno .= "</tr>\r\n";
                   }
               }
           }
           elseif($menu_opc == 2)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<td style=\"width:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\">\r\n";
                       $str_retorno .= "<img src='" . $path_imag_cab . "/transparent.png' border=\"0\" style=\"width:1px;\">\r\n";
                       $str_retorno .= "</td>\r\n";
                   }
               }
           }
       }
       return $str_retorno;
   }
   function Gera_sc_init($apl_menu)
   {
        $_SESSION['scriptcase']['menu_dani']['sc_init'][$apl_menu] = rand(2, 10000);
        $_SESSION['sc_session'][$_SESSION['scriptcase']['menu_dani']['sc_init'][$apl_menu]] = array();
        return  $_SESSION['scriptcase']['menu_dani']['sc_init'][$apl_menu];
   }
function sc_logged($user, $ip = '')
	{
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'on';
  
		$str_sql = "SELECT date_login, ip FROM rsiapp_logged WHERE login = '". $user ."' AND sc_session <> '_SC_FAIL_SC_'";

		 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->data = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->data = false;
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;

		if($this->data  === FALSE || !isset($this->data->fields[0]))
		{
            $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
			$this->sc_logged_in($user, $ip);
			return true;
		}
		else
		{
            if (isset($_SESSION['scriptcase']['sc_apl_conf']['sec_logged']))
{
unset($_SESSION['scriptcase']['sc_apl_conf']['sec_logged']);
}
;
            $_SESSION['scriptcase']['sc_apl_seg']['sec_logged'] = "on";;
			 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . "" . SC_dir_app_name('sec_logged') . "/", "menu_dani_form_php.php", "user?#?" . NM_encode_input($user) . "?@?","_self", 440, 630);
 };
			return false;
		}
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'off';
}
function sc_verify_logged()
	{
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
  
		$str_sql = "SELECT count(*) FROM rsiapp_logged WHERE login = '". $this->sc_temp_logged_user . "' AND date_login = '". $this->sc_temp_logged_date_login ."' AND sc_session <> '_SC_FAIL_SC_'";
		 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs_logged[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Db->ErrorMsg();
      } 
;
		if($this->rs_logged[0][0] != 1)
		{
			 if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
 if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . "" . SC_dir_app_name('sec_Login') . "/", "menu_dani_form_php.php", "","_parent", 440, 630);
 };
		}
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'off';
}
function sc_logged_in($user, $ip = '')
	{
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
  
        $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
		$this->sc_temp_logged_user = $user;
		$this->sc_temp_logged_date_login = microtime(true);

        $str_sql = "DELETE FROM rsiapp_logged WHERE login = '". $user . "' AND sc_session = '_SC_FAIL_SC_' AND ip = '".$ip."'";
        
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu_dani";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

    	$str_sql = "INSERT INTO rsiapp_logged(login, date_login, sc_session, ip) VALUES ('". $user ."', '". $this->sc_temp_logged_date_login ."', '". session_id() ."', '". $ip ."')";
	    
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu_dani";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'off';
}
function sc_logged_in_fail($user, $ip = '')
    {
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'on';
  
        $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
        $str_sql = "INSERT INTO rsiapp_logged(login, date_login, sc_session, ip) VALUES ('" . $user . "', '" . microtime(true) . "', '_SC_FAIL_SC_', '" . $ip . "')";
        
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu_dani";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
        return true;
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'off';
}
function sc_logged_is_blocked($ip = '')
    {
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'on';
  
        $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
        $minutes_ago = strtotime("-10 minutes");
        $str_select = "SELECT count(*) FROM rsiapp_logged WHERE sc_session = '_SC_BLOCKED_SC_' AND ip = '".$ip."' AND date_login > '". $minutes_ago ."'";
         
      $nm_select = $str_select; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs_logged[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Db->ErrorMsg();
      } 
;
        if($this->rs_logged  !== FALSE && $this->rs_logged[0][0] == 1)
        {
            $message = $this->Nm_lang['lang_user_blocked'];
                $message = sprintf($message, 10);
                
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $message;
;
                return true;
        }

        $str_select = "SELECT count(*) FROM rsiapp_logged WHERE sc_session = '_SC_FAIL_SC_' AND ip = '".$ip."' AND date_login > '". $minutes_ago ."'";
         
      $nm_select = $str_select; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs_logged[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Db->ErrorMsg();
      } 
;

        if($this->rs_logged  !== FALSE && $this->rs_logged[0][0] == 10)
        {
            $str_sql = "INSERT INTO rsiapp_logged(login, date_login, sc_session, ip) VALUES ('blocked', '". microtime(true) ."', '_SC_BLOCKED_SC_', '". $ip ."')";
            
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu_dani";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
            $message = $this->Nm_lang['lang_user_blocked'];
                $message = sprintf($message, 10);
                
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $message;
;
                return true;
        }
        return false;
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'off';
}
function sc_logged_out($user, $date_login = '')
	{
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
  
		$date_login = ($date_login == '' ? "" : " AND date_login = '". $date_login ."'");

		$str_sql = "SELECT sc_session FROM rsiapp_logged WHERE login = '". $user ."' ". $date_login . " AND sc_session <> '_SC_FAIL_SC_'";
		 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->data[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->data = false;
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->data[0][0]) && !empty($this->data[0][0]))
        {
			$session_bkp = $_SESSION;
			$sessionid = session_id();
			session_write_close();

			session_id($this->data[0][0]);
			session_start();
			$_SESSION['logged_user'] = 'logout';
			session_write_close();

			session_id($sessionid);
			session_start();
			$_SESSION = $session_bkp;
		}


		$str_sql = "DELETE FROM rsiapp_logged WHERE login = '". $user . "' " . $date_login;
		
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu_dani";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
		 unset($_SESSION['logged_date_login']);
 unset($this->sc_temp_logged_date_login);
 unset($_SESSION['logged_user']);
 unset($this->sc_temp_logged_user);
;
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'off';
}
function sc_looged_check_logout()
    {
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_email'])) {$_SESSION['usr_email'] = "";}
if (!isset($this->sc_temp_usr_email)) {$this->sc_temp_usr_email = (isset($_SESSION['usr_email'])) ? $_SESSION['usr_email'] : "";}
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  
        if(isset($this->sc_temp_logged_user) && ($this->sc_temp_logged_user == 'logout' || empty($this->sc_temp_logged_user)))
        {
             unset($_SESSION['usr_login']);
 unset($this->sc_temp_usr_login);
 unset($_SESSION['logged_user']);
 unset($this->sc_temp_logged_user);
 unset($_SESSION['logged_date_login']);
 unset($this->sc_temp_logged_date_login);
 unset($_SESSION['usr_email']);
 unset($this->sc_temp_usr_email);
;
        }
if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
if (isset($this->sc_temp_usr_email)) {$_SESSION['usr_email'] = $this->sc_temp_usr_email;}
$_SESSION['scriptcase']['menu_dani']['contr_erro'] = 'off';
}
   function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $alt_modal=0, $larg_modal=0)
   {
      global  $menu_dani_menuData;
      if (is_array($nm_apl_parms))
      {
          $tmp_parms = "";
          foreach ($nm_apl_parms as $par => $val)
          {
              $par = trim($par);
              $val = trim($val);
              $tmp_parms .= str_replace(".", "_", $par) . "?#?";
              if (substr($val, 0, 1) == "$")
              {
                  $tmp_parms .= $$val;
              }
              elseif (substr($val, 0, 1) == "{")
              {
                  $val        = substr($val, 1, -1);
                  $tmp_parms .= $this->$val;
              }
              elseif (substr($val, 0, 1) == "[")
              {
                  $tmp_parms .= $_SESSION['sc_session'][1]['menu_dani'][substr($val, 1, -1)];
              }
              else
              {
                  $tmp_parms .= $val;
              }
              $tmp_parms .= "?@?";
          }
          $nm_apl_parms = $tmp_parms;
      }
      $nm_apl_retorno = $_SERVER['PHP_SELF'];
      $nm_apl_retorno = str_replace("\\", '/', $nm_apl_retorno);
      $nm_apl_retorno = str_replace('//', '/', $nm_apl_retorno);
      $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
      if (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../" || strtolower(substr($nm_apl_dest, 0, 1)) == "/")
      {
          echo "<SCRIPT type=\"text/javascript\">";
          if (strtolower($nm_target) == "_blank")
          {
              echo "window.open ('" . $nm_apl_dest . "');";
          }
          else
          {
              echo "window.location='" . $nm_apl_dest . "';";
          }
          echo "</SCRIPT>";
          exit;
      }
      $dir = explode("/", $nm_apl_dest);
      if (count($dir) == 1)
      {
          $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
          $nm_apl_dest = $menu_dani_menuData['url']['link'] . $this->tab_grupo[0] .$nm_apl_dest . "/" . $nm_apl_dest . ".php";
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

      <HTML>
      <HEAD>
       <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
       <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
       <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
       <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
       <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
       <META http-equiv="Pragma" content="no-cache"/>
      </HEAD>
      <BODY>
      <form name="Fredir" method="post" 
                            target="_self"> 
        <input type="hidden" name="nmgp_parms" value="<?php echo NM_encode_input($nm_apl_parms) ?>"/>
<?php
   if ($nm_target == "_blank")
   {
?>
         <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
        <input type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($nm_apl_retorno) ?>">
        <input type="hidden" name="script_case_init" value="1"/> 
        <input type=hidden name="script_case_session" value="<?php echo NM_encode_input(session_id()) ?>"> 
<?php
   }
?>
      </form> 
      <SCRIPT type="text/javascript">
          window.onload = function(){
             submit_Fredir();
          };
          function submit_Fredir()
          {
              document.Fredir.target = "<?php echo $nm_target_form ?>"; 
              document.Fredir.action = "<?php echo $nm_apl_dest ?>";
              document.Fredir.submit();
          }
      </SCRIPT>
      </BODY>
      </HTML>
<?php
     if ($nm_target != "_blank")
     {
         exit;
     }
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['html_dir_only'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }

}
if (isset($_POST['nmgp_start'])) {$nmgp_start = $_POST['nmgp_start'];} 
if (isset($_GET['nmgp_start']))  {$nmgp_start = $_GET['nmgp_start'];} 
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($script_case_session) && !isset($nmgp_start) ))
{
    $Sem_Session = false;
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
    elseif (is_file($root . $_SESSION['scriptcase']['menu_dani']['glo_nm_path_imag_temp'] . "/sc_apl_default_simrskreatifmedia.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['menu_dani']['glo_nm_path_imag_temp'] . "/sc_apl_default_simrskreatifmedia.txt"));
    }
    if (isset($apl_def)) {
        if ($apl_def[0] != "menu_dani") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['menu_dani']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['menu_dani']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['menu_dani']['session_timeout']['redir_tp'] = $Redir_tp;
        }
        if (isset($_COOKIE['sc_actual_lang_simrskreatifmedia'])) {
            $_SESSION['scriptcase']['menu_dani']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_simrskreatifmedia'];
        }
    }
}
if ((isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang") || (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "force_lang"))
{
    if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang")
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
        $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
    }
}
$contr_menu_dani = new menu_dani_class;
$contr_menu_dani->menu_dani_menu();

?>
