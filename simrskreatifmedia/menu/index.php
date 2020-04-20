<?php
include_once('menu_session.php');
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
    $_SESSION['scriptcase']['menu']['glo_nm_path_prod']      = "";
    $_SESSION['scriptcase']['menu']['glo_nm_perfil']         = "conn_mysql";
    $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] = "";
    $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo']      = "";
    //check publication with the prod
    $str_path_apl_url  = $_SERVER['PHP_SELF'];
    $str_path_apl_url  = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['menu']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //end check publication with the prod

ob_start();

class menu_class
{
  var $Db;

 function sc_Include($path, $tp, $name)
 {
     if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
     {
         include_once($path);
     }
 } // sc_Include

 function menu_menu()
 {
    global $menu_menuData, $nm_data_fixa;
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
           $_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
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
      if(empty($_SESSION['scriptcase']['menu']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
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
$path_libs      = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/lib/php";
$path_third     = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/third";
$path_adodb     = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/third/adodb";
$path_apls      = $str_root . substr($path_link, 0, strrpos($path_link, '/'));
$path_img_old   = $str_root . $path_link . "menu/img";
$this->path_css = $str_root . $path_link . "_lib/css/";
$_SESSION['scriptcase']['dir_temp'] = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'];
$this->url_css = "../_lib/css/";
$path_lib_php   = $str_root . $path_link . "_lib/lib/php";
$menu_mobile_hide          = 'N';
$menu_mobile_inicial_state = 'aberto';
$menu_mobile_hide_onclick  = 'N';
$menutree_mobile_float     = 'N';
$menu_mobile_hide_icon     = 'S';
$menu_mobile_hide_icon_menu_position     = 'right';
$mobile_menu_mobile_hide          = 'S';
$mobile_menu_mobile_inicial_state = 'aberto';
$mobile_menu_mobile_hide_onclick  = 'S';
$mobile_menutree_mobile_float     = 'N';
$mobile_menu_mobile_hide_icon     = 'N';
$mobile_menu_mobile_hide_icon_menu_position     = 'right';

$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('menu');
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
    include_once(dirname(__FILE__) . "/menu_erro.php");
}
include_once(dirname(__FILE__) . "/menu_erro.class.php"); 
$this->Erro = new menu_erro();
$str_path = substr($_SESSION['scriptcase']['menu']['glo_nm_path_prod'], 0, strrpos($_SESSION['scriptcase']['menu']['glo_nm_path_prod'], '/') + 1);
if (!is_file($str_root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
{
    unset($_SESSION['scriptcase']['nm_sc_retorno']);
    unset($_SESSION['scriptcase']['menu']['glo_nm_conexao']);
}

/* Path definitions */
$menu_menuData         = array();
$menu_menuData['path'] = array();
$menu_menuData['url']  = array();
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $menu_menuData['path']['sys'] = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $menu_menuData['path']['sys'] = str_replace("\\", '/', $str_path_sys);
    $menu_menuData['path']['sys'] = str_replace('//', '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo                                   = explode("/", $_SERVER['PHP_SELF']);
    $menu_menuData['path']['sys'] = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$menu_menuData['url']['web']   = $_SERVER['PHP_SELF'];
$menu_menuData['url']['web']   = str_replace("\\", '/', $menu_menuData['url']['web']);
$menu_menuData['path']['root'] = substr($menu_menuData['path']['sys'],  0, -1 * strlen($menu_menuData['url']['web']));
$menu_menuData['path']['app']  = substr($menu_menuData['path']['sys'],  0, strrpos($menu_menuData['path']['sys'],  '/'));
$menu_menuData['path']['link'] = substr($menu_menuData['path']['app'],  0, strrpos($menu_menuData['path']['app'],  '/'));
$menu_menuData['path']['link'] = substr($menu_menuData['path']['link'], 0, strrpos($menu_menuData['path']['link'], '/')) . '/';
$menu_menuData['path']['app'] .= '/';
$menu_menuData['url']['app']   = substr($menu_menuData['url']['web'],  0, strrpos($menu_menuData['url']['web'],  '/'));
$menu_menuData['url']['link']  = substr($menu_menuData['url']['app'],  0, strrpos($menu_menuData['url']['app'],  '/'));
if ($_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] == "S")
{
    $menu_menuData['url']['link']  = substr($menu_menuData['url']['link'], 0, strrpos($menu_menuData['url']['link'], '/'));
}
$menu_menuData['url']['link']  .= '/';
$menu_menuData['url']['app']   .= '/';

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
if (isset($_SESSION['scriptcase']['menu']['session_timeout']['lang'])) {
    $this->str_lang = $_SESSION['scriptcase']['menu']['session_timeout']['lang'];
}
elseif (!isset($_SESSION['scriptcase']['menu']['actual_lang']) || $_SESSION['scriptcase']['menu']['actual_lang'] != $this->str_lang) {
    $_SESSION['scriptcase']['menu']['actual_lang'] = $this->str_lang;
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
if ($_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] == "S")
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
include_once("menu_toolbar.php");

$this->tab_grupo[0] = "simrskreatifmedia/";
if ($_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] != "S")
{
    $this->tab_grupo[0] = "";
}

     $_SESSION['scriptcase']['menu_atual'] = "menu";
     $_SESSION['scriptcase']['menu_apls']['menu'] = array();
     if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
     {
         foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
         {
             if (isset($_SESSION['scriptcase']['menu']['glo_nm_conexao']) && $_SESSION['scriptcase']['menu']['glo_nm_conexao'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['menu']['glo_nm_conexao'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['menu']['glo_nm_perfil']) && $_SESSION['scriptcase']['menu']['glo_nm_perfil'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['menu']['glo_nm_perfil'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['menu']['glo_con_' . $NM_con_orig]))
             {
                 $_SESSION['scriptcase']['menu']['glo_con_' . $NM_con_orig] = $NM_con_dest;
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
if (isset($_SESSION['scriptcase']['menu']['session_timeout']['redir'])) {
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
    if ($_SESSION['scriptcase']['menu']['session_timeout']['redir_tp'] == "R") {
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
        $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['menu']['session_timeout']['redir'] . "');\">\r\n";
        $SS_cod_html .= "     </form>\r\n";
        $SS_cod_html .= "    </td></tr></table>\r\n";
        $SS_cod_html .= "    </div></td></tr></table>\r\n";
    }
    $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
    if ($_SESSION['scriptcase']['menu']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['menu']['session_timeout']['redir'] . "');\r\n";
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
    unset($_SESSION['scriptcase']['menu']['session_timeout']);
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
    $_SESSION['sc_session'][1]['menu']['init'] = $script_case_init;
}
else
if (!isset($_SESSION['sc_session'][1]['menu']['init']))
{
    $_SESSION['sc_session'][1]['menu']['init'] = "";
}
$script_case_init = $_SESSION['sc_session'][1]['menu']['init'];
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
if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['menu']['session_timeout']['redir']))
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
    $nm_url_saida = $_SESSION['scriptcase']['sc_saida_menu'];
}
elseif (!empty($nm_url_saida))
{
    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]  = $nm_url_saida;
    $_SESSION['scriptcase']['sc_saida_menu'] = $nm_url_saida;
}
else
{
    $_SESSION['scriptcase']['sc_saida_menu'] = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "javascript:window.close()";
}
$this->sc_Include($path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
include_once($path_adodb . "/adodb.inc.php"); 
$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('menu'); 
perfil_lib($path_libs);
if (!isset($_SESSION['sc_session'][1]['SC_Check_Perfil']))
{
    if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($path_libs, $_SESSION['scriptcase']['menu']['glo_nm_path_prod']);
    $_SESSION['sc_session'][1]['SC_Check_Perfil'] = true;
}
$nm_falta_var    = ""; 
$nm_falta_var_db = ""; 
if (isset($_SESSION['scriptcase']['menu']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['menu']['glo_nm_conexao']))
{
    db_conect_devel($_SESSION['scriptcase']['menu']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'], 'simrskreatifmedia', 2); 
}
if (isset($_SESSION['scriptcase']['menu']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['menu']['glo_nm_perfil']))
{
   $_SESSION['scriptcase']['glo_perfil'] = $_SESSION['scriptcase']['menu']['glo_nm_perfil'];
}
if (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['glo_perfil'], $path_libs, "S");
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
       $_SESSION['scriptcase']['menu']['SC_sep_date']  = substr($SC_temp, 0, 1); 
       $_SESSION['scriptcase']['menu']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
   }
   else
    {
       $_SESSION['scriptcase']['menu']['SC_sep_date']  = $SC_temp; 
       $_SESSION['scriptcase']['menu']['SC_sep_date1'] = $SC_temp; 
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
        if (isset($_SESSION['sc_session'][1]['menu']['sc_outra_jan']) && $_SESSION['sc_session'][1]['menu']['sc_outra_jan'])
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
$_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQXsDuBqHIrKHuBiHgrwVIBsHEFYVEraD9XGZ1BOD1rwV5JwDMvCDkB/DWr/VoFGHQBiDQJsHANOHuFaHuNOZSrCH5FqDoXGHQJmZ1BiHAN7HQFaHgveHArsDWFGDoBqHQNwDuBqHAvOV5XGDMvOVcB/DWrmVoF7HQNmZkBiHArYHuBqHgBOZSJqDurmDoBqHQJKDQJsZ1vCV5FGHuNOV9FeDWXCDoFUHQXOZSBqHArYHuJwDEBeHEXeHEFaDoBOHQNwH9BiHANOD5BOHuBOVcB/DWFaVoBiD9XGZ1rqHAN7HQJwDEBODkFeH5FYVoFGHQJKDQJsHABYV5JeHgrYDkBODWJeVoX7D9BsH9B/Z1NOZMJwDMzGHArCDWF/VoBiDcJUZSX7Z1BYHuFaDMrwDkBOV5FYDoraD9BsZSFaD1zGV5FUDErKHEFiDuJeDoBOHQJKDQJsZ1vCV5FGHuNOV9FeDWXCVEraDcBqZkBiHArKV5XGDErKHArCV5FaHMBOHQFYDQJsHANOHuNUHgvOVcFKH5XCHMBiD9BsVIraD1rwV5X7HgBeHErCHEB7ZuJsHQFYDQB/HAveV5FaHgvOV9FeDWXKDoXGHQNwZSBqHAN7HuB/HgrKDkXKDWB3VoFGDcXGDuFaD1NKVWJsDMNODkBsV5BmDoXGDcNmZkBiHAN7HQFUHgBYHENiH5FGDoF7D9XsDQJsDSBYV5FGHgNKDkBsDuB7VEBiDcFYZSBqDSvmZMXGHgNKHErsH5BmVoFGDcXGDQFaHArYHuXGDMvsV9BUHEX/DoXGHQXOZSBOHANOHQNUHgBYHErCDuXKVoFGHQXsDQBqHIrKHQJsDMBODkBsDWXKVoBqD9BsZ1F7DSrYD5rqDMrYZSJGH5FYDoF7DcXOZSFGHAveV5FUHuBYVcFKDur/VoJwHQFYH9B/Z1BeD5BqDEvsHEFKV5FaHMJeDcBwDQFGD1veHQXGHgvsVcBOHEX7DoraHQFYH9FaHAvmZMJeHgvCZSJGDuFaZuBqD9NmZSFGHANOV5JwHuNODkFCH5B3VoraD9XOH9B/D1rwD5XGDEBeHEJGDWF/ZuFaDcJeZSX7HArYV5BqHgrKV9FiV5FGVoBqD9BsZ1F7DSrYD5rqDMrYZSJGH5FYDoF7DcXOZSX7HIrKV5JwHuzGDkFCH5XCVoJwD9BiZSFaHArKD5JeHgNKHErsH5FGZuBqHQXOZ9XGD1vOV5BqDMvOV9BUDuFGDoJsD9BsZ1F7Z1BeD5rqDMBYHEXeDuFYHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWrmVorqHQNmVINUHAvsD5BqHgNKHErsDWrGDoBOHQJKDQJsZ1vCV5FGHuNOV9FeDWXCHINUHQXOZSBqD1rKHuBqDEBODkB/HEFqHMXGHQBiDQFaHIrwVWXGDMvsVcFeV5F/VoBqHQJmZ1F7Z1vmD5rqDEBOHArCDWF/HMFaDcJeDQX7DSBYV5BqHuBOVcFCDWFYDoJeD9BsZ1F7HABYV5XGDMrYHENiDWr/DoraDcBwH9X7DSBYVWJwHuNOVcFiDWXCHMBqD9XOH9B/HIrwD5NUDEBOHArCDWF/VoBiDcJUZSX7Z1BYHuFaDMvsV9FiV5BmVorq";
 $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['menu']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['menu']['glo_nm_conexao']))
{ 
   $this->Db = db_conect_devel($_SESSION['scriptcase']['menu']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'], 'simrskreatifmedia'); 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['menu']['decimal_db'] = ".";
} 
//
/* Dados do menu em sessao */
$_SESSION['nm_menu'] = array('prod' => $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . '/third/COOLjsMenu/',
                              'url' => $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . '/third/COOLjsMenu/');

if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == "true") || (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'menu'))
{
    $_SESSION['sc_session'][1]['menu']['sc_outra_jan'] = true;
     unset($_SESSION['scriptcase']['sc_outra_jan']);
    $_SESSION['scriptcase']['sc_saida_menu'] = "javascript:window.close()";
}
/* Menu configuration variables */
$menu_menuData['iframe'] = TRUE;

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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hisdetailrawatinap") . "/grid_hisdetailrawatinap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hisdetailrawatinap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hisdetailrawatinap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hisdetailrawatinap'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabs_pembayaran") . "/tabs_pembayaran_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_pembayaran']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabs_pembayaran'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabs_pembayaran'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("calendar_tbcustomer") . "/calendar_tbcustomer_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['calendar_tbcustomer']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['calendar_tbcustomer'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['calendar_tbcustomer'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbpembatalan") . "/grid_tbpembatalan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpembatalan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpembatalan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpembatalan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabs_hargaTind") . "/tabs_hargaTind_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_hargaTind']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabs_hargaTind'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabs_hargaTind'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("billing_casemanager") . "/billing_casemanager_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['billing_casemanager']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['billing_casemanager'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['billing_casemanager'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("berkas_klaim_elek") . "/berkas_klaim_elek_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['berkas_klaim_elek']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['berkas_klaim_elek'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['berkas_klaim_elek'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbreqitem") . "/grid_tbreqitem_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbreqitem']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbreqitem'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbreqitem'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabs_Poli") . "/tabs_Poli_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_Poli']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabs_Poli'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabs_Poli'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabs_RI") . "/tabs_RI_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_RI']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabs_RI'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabs_RI'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabsIGD") . "/tabsIGD_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabsIGD']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabsIGD'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabsIGD'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabsOK") . "/tabsOK_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabsOK']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabsOK'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabsOK'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbhais") . "/grid_tbhais_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbhais']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbhais'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbhais'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabs_VK") . "/tabs_VK_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_VK']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabs_VK'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabs_VK'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabsEndos") . "/tabsEndos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabsEndos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabsEndos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabsEndos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabs_Lab") . "/tabs_Lab_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_Lab']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabs_Lab'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabs_Lab'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabs_radiologi") . "/tabs_radiologi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_radiologi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabs_radiologi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabs_radiologi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabsRM") . "/tabsRM_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabsRM']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabsRM'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabsRM'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabsMappingICD") . "/tabsMappingICD_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabsMappingICD']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabsMappingICD'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabsMappingICD'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_demo_jk") . "/grid_lap_demo_jk_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_jk']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_jk'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_jk'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_demo_agama") . "/grid_lap_demo_agama_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_agama']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_agama'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_agama'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_demo_edu") . "/grid_lap_demo_edu_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_edu']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_edu'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_edu'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_demo_age") . "/grid_lap_demo_age_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_age']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_age'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_age'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_demo_top_diag") . "/grid_lap_demo_top_diag_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_demo_top_diag_ri") . "/grid_lap_demo_top_diag_ri_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag_ri']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag_ri'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag_ri'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_diagnosa_detail") . "/grid_diagnosa_detail_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_diagnosa_detail']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_diagnosa_detail'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_diagnosa_detail'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("report_Lab") . "/report_Lab_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['report_Lab']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['report_Lab'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['report_Lab'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("rekapitulasi_ri") . "/rekapitulasi_ri_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['rekapitulasi_ri']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['rekapitulasi_ri'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['rekapitulasi_ri'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbadjustment") . "/grid_tbadjustment_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadjustment']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbadjustment'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbadjustment'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tbobat_batch") . "/form_tbobat_batch_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tbobat_batch']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_tbobat_batch'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_tbobat_batch'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tbstockobat") . "/form_tbstockobat_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tbstockobat']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_tbstockobat'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_tbstockobat'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabs_Farm") . "/tabs_Farm_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_Farm']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabs_Farm'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabs_Farm'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_logistik") . "/grid_lap_logistik_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_logistik']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_logistik'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_logistik'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("tabs_Logistik") . "/tabs_Logistik_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_Logistik']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['tabs_Logistik'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['tabs_Logistik'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_status_pembelian") . "/grid_status_pembelian_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_status_pembelian']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_status_pembelian'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_status_pembelian'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbreturlog") . "/grid_tbreturlog_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbreturlog']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbreturlog'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbreturlog'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_usulanpengadaan_gizi") . "/grid_usulanpengadaan_gizi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usulanpengadaan_gizi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_usulanpengadaan_gizi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_usulanpengadaan_gizi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_approvalusulanpengadaan_gizi") . "/grid_approvalusulanpengadaan_gizi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_approvalusulanpengadaan_gizi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_approvalusulanpengadaan_gizi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_approvalusulanpengadaan_gizi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_detailrawatinap") . "/grid_detailrawatinap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detailrawatinap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_detailrawatinap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_detailrawatinap'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbformulaobat") . "/grid_tbformulaobat_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbformulaobat']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbformulaobat'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbformulaobat'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbfornas") . "/grid_tbfornas_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbfornas']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbfornas'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbfornas'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbsigna") . "/grid_tbsigna_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsigna']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbsigna'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbsigna'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbsatuan") . "/grid_tbsatuan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsatuan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbsatuan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbsatuan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdepo") . "/grid_tbdepo_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdepo']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdepo'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbdepo'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbjenisadjustment") . "/grid_tbjenisadjustment_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisadjustment']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisadjustment'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisadjustment'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_bahan") . "/grid_bahan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_bahan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_bahan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_bahan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_jenisbahan") . "/grid_jenisbahan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jenisbahan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_jenisbahan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_jenisbahan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_kategoribahan") . "/grid_kategoribahan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_kategoribahan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_kategoribahan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_kategoribahan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_set_gizi") . "/grid_set_gizi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_set_gizi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_set_gizi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_set_gizi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_set_menu") . "/grid_set_menu_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_set_menu']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_set_menu'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_set_menu'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbjenispembatalan") . "/grid_tbjenispembatalan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenispembatalan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenispembatalan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenispembatalan'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbbank") . "/grid_tbbank_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbbank']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbbank'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbbank'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbsettindakan") . "/grid_tbsettindakan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsettindakan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbsettindakan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbsettindakan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbclinicalpathway") . "/grid_tbclinicalpathway_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbclinicalpathway']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbclinicalpathway'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbclinicalpathway'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbradiologi") . "/grid_tbradiologi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbjenisradiologi") . "/grid_tbjenisradiologi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisradiologi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisradiologi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisradiologi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbradiologi") . "/grid_tbradiologi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tblab") . "/grid_tblab_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tblab']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tblab'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tblab'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tblabcategory") . "/grid_tblabcategory_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tblabcategory']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tblabcategory'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tblabcategory'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tblabrate") . "/grid_tblabrate_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tblabrate']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tblabrate'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tblabrate'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbfuncroom") . "/grid_tbfuncroom_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbfuncroom']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbfuncroom'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbfuncroom'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tbpaket") . "/grid_tbpaket_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaket']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaket'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaket'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_summary_pend") . "/control_summary_pend_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_summary_pend_ranap") . "/control_summary_pend_ranap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend_ranap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend_ranap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend_ranap'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("dashboard") . "/dashboard_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['dashboard'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['dashboard'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("bed_occupacy_rate") . "/bed_occupacy_rate_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['bed_occupacy_rate']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['bed_occupacy_rate'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['bed_occupacy_rate'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("av_los") . "/av_los_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['av_los']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['av_los'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['av_los'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("dashboard_stat_igd") . "/dashboard_stat_igd_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_igd']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_igd'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_igd'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("dashboard_stat_poli") . "/dashboard_stat_poli_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_poli']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_poli'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_poli'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("dashboard_stat_ranap") . "/dashboard_stat_ranap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_ranap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_ranap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_ranap'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_grafik_kematian") . "/grid_grafik_kematian_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_grafik_kematian']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_grafik_kematian'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_grafik_kematian'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("dashboard_stat_lab") . "/dashboard_stat_lab_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_lab']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_lab'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_lab'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_eis_rajal") . "/grid_eis_rajal_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_eis_rajal']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_eis_rajal'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_eis_rajal'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_resep_keluar") . "/grid_resep_keluar_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_resep_keluar']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_resep_keluar'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_resep_keluar'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_kasir_per_shift") . "/grid_lap_kasir_per_shift_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_kasir_per_shift']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_kasir_per_shift'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_kasir_per_shift'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_bill_ranap") . "/grid_lap_bill_ranap_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_bill_ranap']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_bill_ranap'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_bill_ranap'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("rekapKeseluruhan") . "/rekapKeseluruhan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("rekapKeseluruhan_master") . "/rekapKeseluruhan_master_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("rekapKeseluruhan_master_ri") . "/rekapKeseluruhan_master_ri_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master_ri']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master_ri'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master_ri'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("reportKasir") . "/reportKasir_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['reportKasir']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['reportKasir'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['reportKasir'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Laporan_Stok_Persediaan") . "/Laporan_Stok_Persediaan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Laporan_Stok_Persediaan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['Laporan_Stok_Persediaan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['Laporan_Stok_Persediaan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_evaluasi_penerimaan") . "/grid_evaluasi_penerimaan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_evaluasi_penerimaan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_evaluasi_penerimaan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_evaluasi_penerimaan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_laporan_mutasi") . "/grid_laporan_mutasi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_mutasi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_mutasi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_mutasi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("fast_slow_moving") . "/fast_slow_moving_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['fast_slow_moving']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['fast_slow_moving'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['fast_slow_moving'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("stok_terkini") . "/stok_terkini_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['stok_terkini']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['stok_terkini'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['stok_terkini'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("kartu_stok") . "/kartu_stok_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['kartu_stok']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['kartu_stok'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['kartu_stok'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("laporan_obat_all") . "/laporan_obat_all_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['laporan_obat_all']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['laporan_obat_all'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['laporan_obat_all'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("lap_grid_logistik_single") . "/lap_grid_logistik_single_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['lap_grid_logistik_single']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['lap_grid_logistik_single'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['lap_grid_logistik_single'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("lap_grid_tbpo") . "/lap_grid_tbpo_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['lap_grid_tbpo']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['lap_grid_tbpo'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['lap_grid_tbpo'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("top_sale_obat") . "/top_sale_obat_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['top_sale_obat']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['top_sale_obat'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['top_sale_obat'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_gizi") . "/grid_lap_gizi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_gizi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_gizi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_lap_gizi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_penjualan") . "/grid_penjualan_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_penjualan']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_penjualan'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_penjualan'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_laporan_ok") . "/grid_laporan_ok_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_ok']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_ok'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_ok'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("lap_radiologi") . "/lap_radiologi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['lap_radiologi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['lap_radiologi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['lap_radiologi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_vclaim_monitor_data_klaim") . "/form_vclaim_monitor_data_klaim_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_monitor_data_klaim']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_monitor_data_klaim'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_monitor_data_klaim'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_search_diagnosa") . "/form_eclaim_search_diagnosa_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_diagnosa']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_diagnosa'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_diagnosa'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_search_prosedur") . "/form_eclaim_search_prosedur_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_prosedur']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_prosedur'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_prosedur'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_klaim_baru") . "/form_eclaim_klaim_baru_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_klaim_baru']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_klaim_baru'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_klaim_baru'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_finalisasi_klaim") . "/form_eclaim_finalisasi_klaim_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_finalisasi_klaim']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_finalisasi_klaim'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_finalisasi_klaim'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_edit_ulang_klaim") . "/form_eclaim_edit_ulang_klaim_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_edit_ulang_klaim']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_edit_ulang_klaim'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_edit_ulang_klaim'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_hapus_klaim") . "/form_eclaim_hapus_klaim_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_klaim']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_klaim'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_klaim'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_update_data_pasien") . "/form_eclaim_update_data_pasien_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_update_data_pasien']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_update_data_pasien'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_update_data_pasien'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_hapus_data_pasien") . "/form_eclaim_hapus_data_pasien_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_data_pasien']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_data_pasien'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_data_pasien'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_grouping_stage_01") . "/form_eclaim_grouping_stage_01_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_01']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_01'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_01'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_grouping_stage_02") . "/form_eclaim_grouping_stage_02_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_02']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_02'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_02'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_insentive") . "/grid_insentive_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_insentive']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_insentive'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_insentive'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_level") . "/grid_hrm_level_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_level']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_level'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_level'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_indikator") . "/grid_hrm_indikator_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_indikator']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_indikator'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_indikator'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ga_jenis_dokumen") . "/grid_ga_jenis_dokumen_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ga_jenis_dokumen']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_ga_jenis_dokumen'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_ga_jenis_dokumen'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_hrm") . "/blank_hrm_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_hrm']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['blank_hrm'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['blank_hrm'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_supp_presensi") . "/grid_hrm_supp_presensi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_supp_presensi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_supp_presensi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_supp_presensi'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ga_dokumen") . "/grid_ga_dokumen_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ga_dokumen']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_ga_dokumen'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_ga_dokumen'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_acc") . "/blank_acc_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_acc']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['blank_acc'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['blank_acc'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_buku_hutang") . "/grid_buku_hutang_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_buku_hutang']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_buku_hutang'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_buku_hutang'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_buku_piutang") . "/grid_buku_piutang_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_buku_piutang']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_buku_piutang'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_buku_piutang'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_jurnal_transaksi") . "/form_jurnal_transaksi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_jurnal_transaksi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_jurnal_transaksi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_jurnal_transaksi'] = "on";
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
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_period_rincian_piutang") . "/form_period_rincian_piutang_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_piutang']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_piutang'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_piutang'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_period_rincian_utang") . "/form_period_rincian_utang_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_utang']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_utang'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_utang'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_period_neraca") . "/form_period_neraca_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_neraca']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_period_neraca'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_period_neraca'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_period_operasional") . "/form_period_operasional_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_operasional']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_period_operasional'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_period_operasional'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_period_perubahan_ekuitas") . "/form_period_perubahan_ekuitas_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_perubahan_ekuitas']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_period_perubahan_ekuitas'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_period_perubahan_ekuitas'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("change_password_it") . "/change_password_it_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['change_password_it']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['change_password_it'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['change_password_it'] = "on";
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
/* Menu items */
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  $check_sql = "SELECT id_user, nama, username, email, password, status, id_bagian"
   . " FROM user_chat"
   . " WHERE username = '" . $this->sc_temp_usr_login . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    
}
		else     
{

	$check_sql = "SELECT a.login, a.group_id, b.description, c.pswd, c.name, c.email"
	   . " FROM rsiapp_users_groups a left join rsiapp_groups b on b.group_id = a.group_id left join rsiapp_users c on c.login = a.login"
	   . " WHERE a.login = '" . $this->sc_temp_usr_login . "'";
	 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

	if (isset($this->rs[0][0]))     
	{
		$username = $this->rs[0][0];
		$id_grup = $this->rs[0][1];
		$grup = $this->rs[0][2];
		$pass = $this->rs[0][3];
		$nama = $this->rs[0][4];
		$email = $this->rs[0][5];
	}
			else     
	{
		$username = '';
		$id_grup = '';
		$grup = '';
		$pass = '';
		$nama = '';
		$email = '';
	}
		
	$insert_table  = 'user_chat';      
	$insert_fields = array(   
		 'nama' => "'$nama'",
		'username' => "'$username'",
		 'email' => "'$email'",
		'password' => "'$pass'",
		 'status' => "'0'",
		'id_bagian' => "'$id_grup'",
	 );

	$insert_sql = 'INSERT INTO ' . $insert_table
		. ' ('   . implode(', ', array_keys($insert_fields))   . ')'
		. ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';

	
     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu";
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
			
}
if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
if ($this->Db)
{
    $this->Db->Close(); 
}

$sOutputBuffer = ob_get_contents();
ob_end_clean();

 $nm_var_lab[0] = "Pelayanan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[0]))
{
    $nm_var_lab[0] = sc_convert_encoding($nm_var_lab[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[1] = "Admission";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[1]))
{
    $nm_var_lab[1] = sc_convert_encoding($nm_var_lab[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[2] = "Admision IGD/RJ";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[2]))
{
    $nm_var_lab[2] = sc_convert_encoding($nm_var_lab[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[3] = "Histori Antrian";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[3]))
{
    $nm_var_lab[3] = sc_convert_encoding($nm_var_lab[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[4] = "Admision Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[4]))
{
    $nm_var_lab[4] = sc_convert_encoding($nm_var_lab[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[5] = "Histori Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[5]))
{
    $nm_var_lab[5] = sc_convert_encoding($nm_var_lab[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[6] = "Ketersediaan Bed";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[6]))
{
    $nm_var_lab[6] = sc_convert_encoding($nm_var_lab[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[7] = "Addmision MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[7]))
{
    $nm_var_lab[7] = sc_convert_encoding($nm_var_lab[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[8] = "Kasir";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[8]))
{
    $nm_var_lab[8] = sc_convert_encoding($nm_var_lab[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[9] = "Pembayaran";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[9]))
{
    $nm_var_lab[9] = sc_convert_encoding($nm_var_lab[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[10] = "Kalender Persalinan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[10]))
{
    $nm_var_lab[10] = sc_convert_encoding($nm_var_lab[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[11] = "Pembatalan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[11]))
{
    $nm_var_lab[11] = sc_convert_encoding($nm_var_lab[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[12] = "Harga Tindakan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[12]))
{
    $nm_var_lab[12] = sc_convert_encoding($nm_var_lab[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[13] = "Billing Case Management";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[13]))
{
    $nm_var_lab[13] = sc_convert_encoding($nm_var_lab[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[14] = "Elektronik Berkas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[14]))
{
    $nm_var_lab[14] = sc_convert_encoding($nm_var_lab[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[15] = "Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[15]))
{
    $nm_var_lab[15] = sc_convert_encoding($nm_var_lab[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[16] = "Pengajuan Item";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[16]))
{
    $nm_var_lab[16] = sc_convert_encoding($nm_var_lab[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[17] = "Pelayanan Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[17]))
{
    $nm_var_lab[17] = sc_convert_encoding($nm_var_lab[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[18] = "Poliklinik";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[18]))
{
    $nm_var_lab[18] = sc_convert_encoding($nm_var_lab[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[19] = "Visite Pasien";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[19]))
{
    $nm_var_lab[19] = sc_convert_encoding($nm_var_lab[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[20] = "IGD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[20]))
{
    $nm_var_lab[20] = sc_convert_encoding($nm_var_lab[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[21] = "Penunjang Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[21]))
{
    $nm_var_lab[21] = sc_convert_encoding($nm_var_lab[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[22] = "Kamar Operasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[22]))
{
    $nm_var_lab[22] = sc_convert_encoding($nm_var_lab[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[23] = "Data HAIs";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[23]))
{
    $nm_var_lab[23] = sc_convert_encoding($nm_var_lab[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[24] = "Kamar Bersalin";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[24]))
{
    $nm_var_lab[24] = sc_convert_encoding($nm_var_lab[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[25] = "Endoskopi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[25]))
{
    $nm_var_lab[25] = sc_convert_encoding($nm_var_lab[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[26] = "Laboratorium";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[26]))
{
    $nm_var_lab[26] = sc_convert_encoding($nm_var_lab[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[27] = "Radiologi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[27]))
{
    $nm_var_lab[27] = sc_convert_encoding($nm_var_lab[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[28] = "RM";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[28]))
{
    $nm_var_lab[28] = sc_convert_encoding($nm_var_lab[28], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[29] = "Sensus Harian";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[29]))
{
    $nm_var_lab[29] = sc_convert_encoding($nm_var_lab[29], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[30] = "Tracer";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[30]))
{
    $nm_var_lab[30] = sc_convert_encoding($nm_var_lab[30], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[31] = "Mapping ICD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[31]))
{
    $nm_var_lab[31] = sc_convert_encoding($nm_var_lab[31], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[32] = "Grafik Demografi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[32]))
{
    $nm_var_lab[32] = sc_convert_encoding($nm_var_lab[32], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[33] = "By Jenis Kelamin";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[33]))
{
    $nm_var_lab[33] = sc_convert_encoding($nm_var_lab[33], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[34] = "By Agama";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[34]))
{
    $nm_var_lab[34] = sc_convert_encoding($nm_var_lab[34], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[35] = "By Pendidikan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[35]))
{
    $nm_var_lab[35] = sc_convert_encoding($nm_var_lab[35], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[36] = "By Usia";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[36]))
{
    $nm_var_lab[36] = sc_convert_encoding($nm_var_lab[36], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[37] = "Penyakit Terbesar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[37]))
{
    $nm_var_lab[37] = sc_convert_encoding($nm_var_lab[37], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[38] = "Rawat Jalan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[38]))
{
    $nm_var_lab[38] = sc_convert_encoding($nm_var_lab[38], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[39] = "Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[39]))
{
    $nm_var_lab[39] = sc_convert_encoding($nm_var_lab[39], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[40] = "Detail Diagnosa Rajal";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[40]))
{
    $nm_var_lab[40] = sc_convert_encoding($nm_var_lab[40], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[41] = "Laporan Lab - Transfusi Darah";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[41]))
{
    $nm_var_lab[41] = sc_convert_encoding($nm_var_lab[41], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[42] = "Rekapitulasi Sensus Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[42]))
{
    $nm_var_lab[42] = sc_convert_encoding($nm_var_lab[42], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[43] = "Farmasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[43]))
{
    $nm_var_lab[43] = sc_convert_encoding($nm_var_lab[43], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[44] = "Stock Adjustment";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[44]))
{
    $nm_var_lab[44] = sc_convert_encoding($nm_var_lab[44], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[45] = "Update Atribut Obat Masal";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[45]))
{
    $nm_var_lab[45] = sc_convert_encoding($nm_var_lab[45], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[46] = "Stok Awal Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[46]))
{
    $nm_var_lab[46] = sc_convert_encoding($nm_var_lab[46], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[47] = "Penjualan Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[47]))
{
    $nm_var_lab[47] = sc_convert_encoding($nm_var_lab[47], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[48] = "Logistik";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[48]))
{
    $nm_var_lab[48] = sc_convert_encoding($nm_var_lab[48], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[49] = "Rencana Pembelian Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[49]))
{
    $nm_var_lab[49] = sc_convert_encoding($nm_var_lab[49], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[50] = "Purchase Order";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[50]))
{
    $nm_var_lab[50] = sc_convert_encoding($nm_var_lab[50], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[51] = "Tabel Faktur Pembelian";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[51]))
{
    $nm_var_lab[51] = sc_convert_encoding($nm_var_lab[51], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[52] = "Stock Opname";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[52]))
{
    $nm_var_lab[52] = sc_convert_encoding($nm_var_lab[52], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[53] = "Retur ke Supplier";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[53]))
{
    $nm_var_lab[53] = sc_convert_encoding($nm_var_lab[53], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[54] = "Gizi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[54]))
{
    $nm_var_lab[54] = sc_convert_encoding($nm_var_lab[54], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[55] = "Pengajuan Pembelian";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[55]))
{
    $nm_var_lab[55] = sc_convert_encoding($nm_var_lab[55], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[56] = "Penerimaan Pembelian";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[56]))
{
    $nm_var_lab[56] = sc_convert_encoding($nm_var_lab[56], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[57] = "Daftar Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[57]))
{
    $nm_var_lab[57] = sc_convert_encoding($nm_var_lab[57], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[58] = "Edukasi Pasien";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[58]))
{
    $nm_var_lab[58] = sc_convert_encoding($nm_var_lab[58], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[59] = "Cetak Label Pasien";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[59]))
{
    $nm_var_lab[59] = sc_convert_encoding($nm_var_lab[59], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[60] = "Setting / Master";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[60]))
{
    $nm_var_lab[60] = sc_convert_encoding($nm_var_lab[60], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[61] = "Logistik Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[61]))
{
    $nm_var_lab[61] = sc_convert_encoding($nm_var_lab[61], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[62] = "Item / BHP";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[62]))
{
    $nm_var_lab[62] = sc_convert_encoding($nm_var_lab[62], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[63] = "Formula Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[63]))
{
    $nm_var_lab[63] = sc_convert_encoding($nm_var_lab[63], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[64] = "Formularium";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[64]))
{
    $nm_var_lab[64] = sc_convert_encoding($nm_var_lab[64], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[65] = "Formularium Nasional";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[65]))
{
    $nm_var_lab[65] = sc_convert_encoding($nm_var_lab[65], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[66] = "Jenis Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[66]))
{
    $nm_var_lab[66] = sc_convert_encoding($nm_var_lab[66], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[67] = "Aturan Penggunaan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[67]))
{
    $nm_var_lab[67] = sc_convert_encoding($nm_var_lab[67], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[68] = "Signa";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[68]))
{
    $nm_var_lab[68] = sc_convert_encoding($nm_var_lab[68], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[69] = "Sediaan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[69]))
{
    $nm_var_lab[69] = sc_convert_encoding($nm_var_lab[69], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[70] = "Depo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[70]))
{
    $nm_var_lab[70] = sc_convert_encoding($nm_var_lab[70], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[71] = "Jenis Adjustment";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[71]))
{
    $nm_var_lab[71] = sc_convert_encoding($nm_var_lab[71], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[72] = "Logistik Gizi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[72]))
{
    $nm_var_lab[72] = sc_convert_encoding($nm_var_lab[72], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[73] = "Bahan Makanan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[73]))
{
    $nm_var_lab[73] = sc_convert_encoding($nm_var_lab[73], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[74] = "Jenis Bahan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[74]))
{
    $nm_var_lab[74] = sc_convert_encoding($nm_var_lab[74], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[75] = "Kategori Bahan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[75]))
{
    $nm_var_lab[75] = sc_convert_encoding($nm_var_lab[75], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[76] = "Diet Pasien";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[76]))
{
    $nm_var_lab[76] = sc_convert_encoding($nm_var_lab[76], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[77] = "Standar Resep";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[77]))
{
    $nm_var_lab[77] = sc_convert_encoding($nm_var_lab[77], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[78] = "Lembaga dan Sarana";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[78]))
{
    $nm_var_lab[78] = sc_convert_encoding($nm_var_lab[78], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[79] = "Poliklinik";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[79]))
{
    $nm_var_lab[79] = sc_convert_encoding($nm_var_lab[79], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[80] = "PBF Supplier";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[80]))
{
    $nm_var_lab[80] = sc_convert_encoding($nm_var_lab[80], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[81] = "Jenis Pembatalan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[81]))
{
    $nm_var_lab[81] = sc_convert_encoding($nm_var_lab[81], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[82] = "Instansi Penjamin";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[82]))
{
    $nm_var_lab[82] = sc_convert_encoding($nm_var_lab[82], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[83] = "Bank & EDC";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[83]))
{
    $nm_var_lab[83] = sc_convert_encoding($nm_var_lab[83], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[84] = "Lokasi (Ruang)";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[84]))
{
    $nm_var_lab[84] = sc_convert_encoding($nm_var_lab[84], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[85] = "Jenis Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[85]))
{
    $nm_var_lab[85] = sc_convert_encoding($nm_var_lab[85], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[86] = "Perusahaan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[86]))
{
    $nm_var_lab[86] = sc_convert_encoding($nm_var_lab[86], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[87] = "Gelar Dokter";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[87]))
{
    $nm_var_lab[87] = sc_convert_encoding($nm_var_lab[87], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[88] = "Departemen";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[88]))
{
    $nm_var_lab[88] = sc_convert_encoding($nm_var_lab[88], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[89] = "Vendor Umum";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[89]))
{
    $nm_var_lab[89] = sc_convert_encoding($nm_var_lab[89], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[90] = "Dokter & Staff";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[90]))
{
    $nm_var_lab[90] = sc_convert_encoding($nm_var_lab[90], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[91] = "Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[91]))
{
    $nm_var_lab[91] = sc_convert_encoding($nm_var_lab[91], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[92] = "Pasien";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[92]))
{
    $nm_var_lab[92] = sc_convert_encoding($nm_var_lab[92], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[93] = "Karyawan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[93]))
{
    $nm_var_lab[93] = sc_convert_encoding($nm_var_lab[93], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[94] = "Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[94]))
{
    $nm_var_lab[94] = sc_convert_encoding($nm_var_lab[94], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[95] = "Tindakan Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[95]))
{
    $nm_var_lab[95] = sc_convert_encoding($nm_var_lab[95], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[96] = "Set Tindakan Poli";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[96]))
{
    $nm_var_lab[96] = sc_convert_encoding($nm_var_lab[96], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[97] = "Clinical Pathway";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[97]))
{
    $nm_var_lab[97] = sc_convert_encoding($nm_var_lab[97], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[98] = "Radiologi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[98]))
{
    $nm_var_lab[98] = sc_convert_encoding($nm_var_lab[98], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[99] = "Jenis Radiologi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[99]))
{
    $nm_var_lab[99] = sc_convert_encoding($nm_var_lab[99], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[100] = "Harga Rad";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[100]))
{
    $nm_var_lab[100] = sc_convert_encoding($nm_var_lab[100], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[101] = "Laboratorium";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[101]))
{
    $nm_var_lab[101] = sc_convert_encoding($nm_var_lab[101], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[102] = "Kategori Lab";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[102]))
{
    $nm_var_lab[102] = sc_convert_encoding($nm_var_lab[102], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[103] = "Harga Lab";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[103]))
{
    $nm_var_lab[103] = sc_convert_encoding($nm_var_lab[103], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[104] = "Kelas Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[104]))
{
    $nm_var_lab[104] = sc_convert_encoding($nm_var_lab[104], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[105] = "Ruang / Bed Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[105]))
{
    $nm_var_lab[105] = sc_convert_encoding($nm_var_lab[105], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[106] = "Kamar Fungsional";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[106]))
{
    $nm_var_lab[106] = sc_convert_encoding($nm_var_lab[106], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[107] = "ICD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[107]))
{
    $nm_var_lab[107] = sc_convert_encoding($nm_var_lab[107], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[108] = "Item MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[108]))
{
    $nm_var_lab[108] = sc_convert_encoding($nm_var_lab[108], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[109] = "Paket MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[109]))
{
    $nm_var_lab[109] = sc_convert_encoding($nm_var_lab[109], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[110] = "Parameter MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[110]))
{
    $nm_var_lab[110] = sc_convert_encoding($nm_var_lab[110], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[111] = "Susunan Morbiditas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[111]))
{
    $nm_var_lab[111] = sc_convert_encoding($nm_var_lab[111], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[112] = "Administrasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[112]))
{
    $nm_var_lab[112] = sc_convert_encoding($nm_var_lab[112], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[113] = "Tarif Paket";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[113]))
{
    $nm_var_lab[113] = sc_convert_encoding($nm_var_lab[113], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[114] = "Setting Administrasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[114]))
{
    $nm_var_lab[114] = sc_convert_encoding($nm_var_lab[114], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[115] = "Tindakan Eksternal";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[115]))
{
    $nm_var_lab[115] = sc_convert_encoding($nm_var_lab[115], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[116] = "Setting Cashflow";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[116]))
{
    $nm_var_lab[116] = sc_convert_encoding($nm_var_lab[116], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[117] = "Pendapatan Lain";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[117]))
{
    $nm_var_lab[117] = sc_convert_encoding($nm_var_lab[117], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[118] = "Insentif Tim MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[118]))
{
    $nm_var_lab[118] = sc_convert_encoding($nm_var_lab[118], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[119] = "Paket Kamar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[119]))
{
    $nm_var_lab[119] = sc_convert_encoding($nm_var_lab[119], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[120] = "Kode Norma";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[120]))
{
    $nm_var_lab[120] = sc_convert_encoding($nm_var_lab[120], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[121] = "Executive Summary";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[121]))
{
    $nm_var_lab[121] = sc_convert_encoding($nm_var_lab[121], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[122] = "Summary Pend. Rajal";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[122]))
{
    $nm_var_lab[122] = sc_convert_encoding($nm_var_lab[122], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[123] = "Summary Pend. Ranap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[123]))
{
    $nm_var_lab[123] = sc_convert_encoding($nm_var_lab[123], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[124] = "Summary Pelayanan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[124]))
{
    $nm_var_lab[124] = sc_convert_encoding($nm_var_lab[124], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[125] = "BOR";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[125]))
{
    $nm_var_lab[125] = sc_convert_encoding($nm_var_lab[125], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[126] = "AvLOS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[126]))
{
    $nm_var_lab[126] = sc_convert_encoding($nm_var_lab[126], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[127] = "Statistik Pelayanan Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[127]))
{
    $nm_var_lab[127] = sc_convert_encoding($nm_var_lab[127], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[128] = "Statistik IGD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[128]))
{
    $nm_var_lab[128] = sc_convert_encoding($nm_var_lab[128], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[129] = "Statistik Rawat Jalan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[129]))
{
    $nm_var_lab[129] = sc_convert_encoding($nm_var_lab[129], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[130] = "Statistik Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[130]))
{
    $nm_var_lab[130] = sc_convert_encoding($nm_var_lab[130], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[131] = "Statistik Jml Kematian";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[131]))
{
    $nm_var_lab[131] = sc_convert_encoding($nm_var_lab[131], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[132] = "Statistik Penujang Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[132]))
{
    $nm_var_lab[132] = sc_convert_encoding($nm_var_lab[132], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[133] = "Statistik Farmasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[133]))
{
    $nm_var_lab[133] = sc_convert_encoding($nm_var_lab[133], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[134] = "Statistik Laboratorium";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[134]))
{
    $nm_var_lab[134] = sc_convert_encoding($nm_var_lab[134], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[135] = "Statistik Radiologi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[135]))
{
    $nm_var_lab[135] = sc_convert_encoding($nm_var_lab[135], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[136] = "Detail Rawat Jalan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[136]))
{
    $nm_var_lab[136] = sc_convert_encoding($nm_var_lab[136], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[137] = "Detail Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[137]))
{
    $nm_var_lab[137] = sc_convert_encoding($nm_var_lab[137], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[138] = "Detail Kamar Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[138]))
{
    $nm_var_lab[138] = sc_convert_encoding($nm_var_lab[138], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[139] = "Resep yang Keluar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[139]))
{
    $nm_var_lab[139] = sc_convert_encoding($nm_var_lab[139], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[140] = "Laporan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[140]))
{
    $nm_var_lab[140] = sc_convert_encoding($nm_var_lab[140], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[141] = "Laporan Umum";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[141]))
{
    $nm_var_lab[141] = sc_convert_encoding($nm_var_lab[141], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[142] = "Keuangan & Kasir";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[142]))
{
    $nm_var_lab[142] = sc_convert_encoding($nm_var_lab[142], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[143] = "Laporan Kasir per Jenis Bayar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[143]))
{
    $nm_var_lab[143] = sc_convert_encoding($nm_var_lab[143], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[144] = "Laporan Discharged Ranap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[144]))
{
    $nm_var_lab[144] = sc_convert_encoding($nm_var_lab[144], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[145] = "Laporan Rawat Jalan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[145]))
{
    $nm_var_lab[145] = sc_convert_encoding($nm_var_lab[145], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[146] = "Laporan Rawat Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[146]))
{
    $nm_var_lab[146] = sc_convert_encoding($nm_var_lab[146], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[147] = "Laporan Keseluruhan Kasir";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[147]))
{
    $nm_var_lab[147] = sc_convert_encoding($nm_var_lab[147], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[148] = "Laporan Keseluruhan Kasir Detail Rajal";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[148]))
{
    $nm_var_lab[148] = sc_convert_encoding($nm_var_lab[148], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[149] = "Laporan Keseluruhan Kasir Detail Ranap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[149]))
{
    $nm_var_lab[149] = sc_convert_encoding($nm_var_lab[149], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[150] = "Laporan Detail";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[150]))
{
    $nm_var_lab[150] = sc_convert_encoding($nm_var_lab[150], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[151] = "Laporan Persediaan Akhir Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[151]))
{
    $nm_var_lab[151] = sc_convert_encoding($nm_var_lab[151], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[152] = "Logistik-Farmasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[152]))
{
    $nm_var_lab[152] = sc_convert_encoding($nm_var_lab[152], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[153] = "Evaluasi Penerimaan Barang";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[153]))
{
    $nm_var_lab[153] = sc_convert_encoding($nm_var_lab[153], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[154] = "Laporan Mutasi Item";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[154]))
{
    $nm_var_lab[154] = sc_convert_encoding($nm_var_lab[154], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[155] = "Laporan Fast-Slow Moving";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[155]))
{
    $nm_var_lab[155] = sc_convert_encoding($nm_var_lab[155], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[156] = "Laporan Stok Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[156]))
{
    $nm_var_lab[156] = sc_convert_encoding($nm_var_lab[156], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[157] = "Kartu Stok Farmasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[157]))
{
    $nm_var_lab[157] = sc_convert_encoding($nm_var_lab[157], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[158] = "Laporan Penjualan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[158]))
{
    $nm_var_lab[158] = sc_convert_encoding($nm_var_lab[158], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[159] = "Laporan Pembelian Item Obat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[159]))
{
    $nm_var_lab[159] = sc_convert_encoding($nm_var_lab[159], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[160] = "Laporan Pembelian Detail";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[160]))
{
    $nm_var_lab[160] = sc_convert_encoding($nm_var_lab[160], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[161] = "Omzet Farmasi (Pareto)";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[161]))
{
    $nm_var_lab[161] = sc_convert_encoding($nm_var_lab[161], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[162] = "Penunjang Lainnya";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[162]))
{
    $nm_var_lab[162] = sc_convert_encoding($nm_var_lab[162], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[163] = "Laporan Gizi Pasien";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[163]))
{
    $nm_var_lab[163] = sc_convert_encoding($nm_var_lab[163], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[164] = "Laporan Penerimaan Kantin";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[164]))
{
    $nm_var_lab[164] = sc_convert_encoding($nm_var_lab[164], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[165] = "Laporan Retur";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[165]))
{
    $nm_var_lab[165] = sc_convert_encoding($nm_var_lab[165], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[166] = "Jurnal Umum";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[166]))
{
    $nm_var_lab[166] = sc_convert_encoding($nm_var_lab[166], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[167] = "Buku Besar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[167]))
{
    $nm_var_lab[167] = sc_convert_encoding($nm_var_lab[167], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[168] = "Neraca";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[168]))
{
    $nm_var_lab[168] = sc_convert_encoding($nm_var_lab[168], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[169] = "Lap Profitabilitas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[169]))
{
    $nm_var_lab[169] = sc_convert_encoding($nm_var_lab[169], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[170] = "Laporan Gizi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[170]))
{
    $nm_var_lab[170] = sc_convert_encoding($nm_var_lab[170], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[171] = "Laporan IGD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[171]))
{
    $nm_var_lab[171] = sc_convert_encoding($nm_var_lab[171], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[172] = "Antrian Poli";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[172]))
{
    $nm_var_lab[172] = sc_convert_encoding($nm_var_lab[172], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[173] = "Laporan Praktek";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[173]))
{
    $nm_var_lab[173] = sc_convert_encoding($nm_var_lab[173], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[174] = "Laporan Rujukan Inap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[174]))
{
    $nm_var_lab[174] = sc_convert_encoding($nm_var_lab[174], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[175] = "Laporan Pembatalan Poli";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[175]))
{
    $nm_var_lab[175] = sc_convert_encoding($nm_var_lab[175], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[176] = "Laporan Sewa Alat dan BHP";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[176]))
{
    $nm_var_lab[176] = sc_convert_encoding($nm_var_lab[176], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[177] = "Status Crew";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[177]))
{
    $nm_var_lab[177] = sc_convert_encoding($nm_var_lab[177], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[178] = "Laporan Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[178]))
{
    $nm_var_lab[178] = sc_convert_encoding($nm_var_lab[178], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[179] = "Laporan Pasien OK";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[179]))
{
    $nm_var_lab[179] = sc_convert_encoding($nm_var_lab[179], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[180] = "Rekam Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[180]))
{
    $nm_var_lab[180] = sc_convert_encoding($nm_var_lab[180], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[181] = "Resume Medik";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[181]))
{
    $nm_var_lab[181] = sc_convert_encoding($nm_var_lab[181], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[182] = "Salinan Resep";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[182]))
{
    $nm_var_lab[182] = sc_convert_encoding($nm_var_lab[182], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[183] = "Surat Medis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[183]))
{
    $nm_var_lab[183] = sc_convert_encoding($nm_var_lab[183], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[184] = "Laporan Lab";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[184]))
{
    $nm_var_lab[184] = sc_convert_encoding($nm_var_lab[184], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[185] = "Laporan Radiologi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[185]))
{
    $nm_var_lab[185] = sc_convert_encoding($nm_var_lab[185], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[186] = "Laporan Resep";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[186]))
{
    $nm_var_lab[186] = sc_convert_encoding($nm_var_lab[186], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[187] = "Status Karyawan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[187]))
{
    $nm_var_lab[187] = sc_convert_encoding($nm_var_lab[187], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[188] = "Laporan MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[188]))
{
    $nm_var_lab[188] = sc_convert_encoding($nm_var_lab[188], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[189] = "Master Keluarga";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[189]))
{
    $nm_var_lab[189] = sc_convert_encoding($nm_var_lab[189], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[190] = "Rekapitulasi Medis MCU";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[190]))
{
    $nm_var_lab[190] = sc_convert_encoding($nm_var_lab[190], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[191] = "Laporan OK VK";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[191]))
{
    $nm_var_lab[191] = sc_convert_encoding($nm_var_lab[191], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[192] = "Laporan Pemakaian Item";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[192]))
{
    $nm_var_lab[192] = sc_convert_encoding($nm_var_lab[192], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[193] = "Laporan Sensus";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[193]))
{
    $nm_var_lab[193] = sc_convert_encoding($nm_var_lab[193], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[194] = "Sensus";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[194]))
{
    $nm_var_lab[194] = sc_convert_encoding($nm_var_lab[194], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[195] = "Laporan RL";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[195]))
{
    $nm_var_lab[195] = sc_convert_encoding($nm_var_lab[195], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[196] = "Taksiran Persalinan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[196]))
{
    $nm_var_lab[196] = sc_convert_encoding($nm_var_lab[196], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[197] = "Laporan Persalinan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[197]))
{
    $nm_var_lab[197] = sc_convert_encoding($nm_var_lab[197], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[198] = "Laporan Morbiditas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[198]))
{
    $nm_var_lab[198] = sc_convert_encoding($nm_var_lab[198], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[199] = "Laporan Kegiatan Pelayanan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[199]))
{
    $nm_var_lab[199] = sc_convert_encoding($nm_var_lab[199], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[200] = "Laporan Bulanan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[200]))
{
    $nm_var_lab[200] = sc_convert_encoding($nm_var_lab[200], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[201] = "Bridging";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[201]))
{
    $nm_var_lab[201] = sc_convert_encoding($nm_var_lab[201], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[202] = "VClaim";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[202]))
{
    $nm_var_lab[202] = sc_convert_encoding($nm_var_lab[202], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[203] = "SEP";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[203]))
{
    $nm_var_lab[203] = sc_convert_encoding($nm_var_lab[203], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[204] = "Rujukan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[204]))
{
    $nm_var_lab[204] = sc_convert_encoding($nm_var_lab[204], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[205] = "LPK";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[205]))
{
    $nm_var_lab[205] = sc_convert_encoding($nm_var_lab[205], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[206] = "EKlaim";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[206]))
{
    $nm_var_lab[206] = sc_convert_encoding($nm_var_lab[206], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[207] = "EKlaim - Referensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[207]))
{
    $nm_var_lab[207] = sc_convert_encoding($nm_var_lab[207], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[208] = "Diagnosa";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[208]))
{
    $nm_var_lab[208] = sc_convert_encoding($nm_var_lab[208], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[209] = "Tindakan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[209]))
{
    $nm_var_lab[209] = sc_convert_encoding($nm_var_lab[209], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[210] = "EKlaim - Kelola Klaim";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[210]))
{
    $nm_var_lab[210] = sc_convert_encoding($nm_var_lab[210], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[211] = "Klaim Baru";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[211]))
{
    $nm_var_lab[211] = sc_convert_encoding($nm_var_lab[211], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[212] = "Mengisi Data Klaim";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[212]))
{
    $nm_var_lab[212] = sc_convert_encoding($nm_var_lab[212], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[213] = "Finalisasi Klaim";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[213]))
{
    $nm_var_lab[213] = sc_convert_encoding($nm_var_lab[213], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[214] = "Edit Ulang Klaim";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[214]))
{
    $nm_var_lab[214] = sc_convert_encoding($nm_var_lab[214], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[215] = "Hapus Data Klaim";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[215]))
{
    $nm_var_lab[215] = sc_convert_encoding($nm_var_lab[215], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[216] = "EKlaim - Pasien";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[216]))
{
    $nm_var_lab[216] = sc_convert_encoding($nm_var_lab[216], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[217] = "Update Data Pasien";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[217]))
{
    $nm_var_lab[217] = sc_convert_encoding($nm_var_lab[217], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[218] = "Hapus Data Pasien";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[218]))
{
    $nm_var_lab[218] = sc_convert_encoding($nm_var_lab[218], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[219] = "EKlaim - Grouping";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[219]))
{
    $nm_var_lab[219] = sc_convert_encoding($nm_var_lab[219], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[220] = "Stage 01";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[220]))
{
    $nm_var_lab[220] = sc_convert_encoding($nm_var_lab[220], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[221] = "Stage 02";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[221]))
{
    $nm_var_lab[221] = sc_convert_encoding($nm_var_lab[221], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[222] = "EKlaim - Kirim Data";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[222]))
{
    $nm_var_lab[222] = sc_convert_encoding($nm_var_lab[222], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[223] = "EKlaim - Tarik Data";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[223]))
{
    $nm_var_lab[223] = sc_convert_encoding($nm_var_lab[223], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[224] = "EKlaim - Data Detil";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[224]))
{
    $nm_var_lab[224] = sc_convert_encoding($nm_var_lab[224], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[225] = "EKlaim - Status";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[225]))
{
    $nm_var_lab[225] = sc_convert_encoding($nm_var_lab[225], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[226] = "Aplicare";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[226]))
{
    $nm_var_lab[226] = sc_convert_encoding($nm_var_lab[226], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[227] = "HR / GA";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[227]))
{
    $nm_var_lab[227] = sc_convert_encoding($nm_var_lab[227], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[228] = "Insentive Paramedis";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[228]))
{
    $nm_var_lab[228] = sc_convert_encoding($nm_var_lab[228], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[229] = "Referensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[229]))
{
    $nm_var_lab[229] = sc_convert_encoding($nm_var_lab[229], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[230] = "Level Pendidikan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[230]))
{
    $nm_var_lab[230] = sc_convert_encoding($nm_var_lab[230], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[231] = "Indikator Penilaian";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[231]))
{
    $nm_var_lab[231] = sc_convert_encoding($nm_var_lab[231], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[232] = "Jenis Dokumen";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[232]))
{
    $nm_var_lab[232] = sc_convert_encoding($nm_var_lab[232], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[233] = "Jabatan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[233]))
{
    $nm_var_lab[233] = sc_convert_encoding($nm_var_lab[233], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[234] = "Karyawan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[234]))
{
    $nm_var_lab[234] = sc_convert_encoding($nm_var_lab[234], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[235] = "Daftar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[235]))
{
    $nm_var_lab[235] = sc_convert_encoding($nm_var_lab[235], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[236] = "Karyawan Tetap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[236]))
{
    $nm_var_lab[236] = sc_convert_encoding($nm_var_lab[236], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[237] = "Jabatan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[237]))
{
    $nm_var_lab[237] = sc_convert_encoding($nm_var_lab[237], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[238] = "Kontrak Kerja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[238]))
{
    $nm_var_lab[238] = sc_convert_encoding($nm_var_lab[238], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[239] = "Pendidikan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[239]))
{
    $nm_var_lab[239] = sc_convert_encoding($nm_var_lab[239], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[240] = "Presensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[240]))
{
    $nm_var_lab[240] = sc_convert_encoding($nm_var_lab[240], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[241] = "Mesin Presensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[241]))
{
    $nm_var_lab[241] = sc_convert_encoding($nm_var_lab[241], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[242] = "User Presensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[242]))
{
    $nm_var_lab[242] = sc_convert_encoding($nm_var_lab[242], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[243] = "Data Presensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[243]))
{
    $nm_var_lab[243] = sc_convert_encoding($nm_var_lab[243], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[244] = "Manajemen Shift";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[244]))
{
    $nm_var_lab[244] = sc_convert_encoding($nm_var_lab[244], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[245] = "Referensi Shift";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[245]))
{
    $nm_var_lab[245] = sc_convert_encoding($nm_var_lab[245], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[246] = "Shift Karyawan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[246]))
{
    $nm_var_lab[246] = sc_convert_encoding($nm_var_lab[246], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[247] = "S / I / C";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[247]))
{
    $nm_var_lab[247] = sc_convert_encoding($nm_var_lab[247], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[248] = "Remunerasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[248]))
{
    $nm_var_lab[248] = sc_convert_encoding($nm_var_lab[248], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[249] = "Periode Remunerasi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[249]))
{
    $nm_var_lab[249] = sc_convert_encoding($nm_var_lab[249], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[250] = "Remunerasi Tetap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[250]))
{
    $nm_var_lab[250] = sc_convert_encoding($nm_var_lab[250], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[251] = "Remunerasi Tidak Tetap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[251]))
{
    $nm_var_lab[251] = sc_convert_encoding($nm_var_lab[251], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[252] = "Potongan Tetap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[252]))
{
    $nm_var_lab[252] = sc_convert_encoding($nm_var_lab[252], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[253] = "Potongan Tidak Tetap";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[253]))
{
    $nm_var_lab[253] = sc_convert_encoding($nm_var_lab[253], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[254] = "Lembur";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[254]))
{
    $nm_var_lab[254] = sc_convert_encoding($nm_var_lab[254], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[255] = "Proses";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[255]))
{
    $nm_var_lab[255] = sc_convert_encoding($nm_var_lab[255], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[256] = "Daftar Pembayaran";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[256]))
{
    $nm_var_lab[256] = sc_convert_encoding($nm_var_lab[256], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[257] = "General Affairs";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[257]))
{
    $nm_var_lab[257] = sc_convert_encoding($nm_var_lab[257], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[258] = "Rapat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[258]))
{
    $nm_var_lab[258] = sc_convert_encoding($nm_var_lab[258], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[259] = "Pengumuman";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[259]))
{
    $nm_var_lab[259] = sc_convert_encoding($nm_var_lab[259], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[260] = "Dokumen Surat";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[260]))
{
    $nm_var_lab[260] = sc_convert_encoding($nm_var_lab[260], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[261] = "Rekrutmen";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[261]))
{
    $nm_var_lab[261] = sc_convert_encoding($nm_var_lab[261], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[262] = "Kebutuhan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[262]))
{
    $nm_var_lab[262] = sc_convert_encoding($nm_var_lab[262], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[263] = "Mutasi & Promosi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[263]))
{
    $nm_var_lab[263] = sc_convert_encoding($nm_var_lab[263], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[264] = "Finansial";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[264]))
{
    $nm_var_lab[264] = sc_convert_encoding($nm_var_lab[264], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[265] = "Akuntansi - Referensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[265]))
{
    $nm_var_lab[265] = sc_convert_encoding($nm_var_lab[265], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[266] = "Bagan Akun - Header";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[266]))
{
    $nm_var_lab[266] = sc_convert_encoding($nm_var_lab[266], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[267] = "Bagan Akun - Detil";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[267]))
{
    $nm_var_lab[267] = sc_convert_encoding($nm_var_lab[267], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[268] = "Jenis Transaksi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[268]))
{
    $nm_var_lab[268] = sc_convert_encoding($nm_var_lab[268], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[269] = "Tautan Jurnal - Transaksi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[269]))
{
    $nm_var_lab[269] = sc_convert_encoding($nm_var_lab[269], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[270] = "Akuntansi - Pencatatan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[270]))
{
    $nm_var_lab[270] = sc_convert_encoding($nm_var_lab[270], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[271] = "Buku Hutang";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[271]))
{
    $nm_var_lab[271] = sc_convert_encoding($nm_var_lab[271], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[272] = "Buku Piutang";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[272]))
{
    $nm_var_lab[272] = sc_convert_encoding($nm_var_lab[272], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[273] = "Posting Transaksi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[273]))
{
    $nm_var_lab[273] = sc_convert_encoding($nm_var_lab[273], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[274] = "Jurnal Umum";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[274]))
{
    $nm_var_lab[274] = sc_convert_encoding($nm_var_lab[274], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[275] = "Akuntansi - Pelaporan";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[275]))
{
    $nm_var_lab[275] = sc_convert_encoding($nm_var_lab[275], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[276] = "Ikhtisar Jurnal";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[276]))
{
    $nm_var_lab[276] = sc_convert_encoding($nm_var_lab[276], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[277] = "Ikhtisar Buku Besar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[277]))
{
    $nm_var_lab[277] = sc_convert_encoding($nm_var_lab[277], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[278] = "Rincian Piutang";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[278]))
{
    $nm_var_lab[278] = sc_convert_encoding($nm_var_lab[278], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[279] = "Rincian Hutang";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[279]))
{
    $nm_var_lab[279] = sc_convert_encoding($nm_var_lab[279], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[280] = "Neraca";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[280]))
{
    $nm_var_lab[280] = sc_convert_encoding($nm_var_lab[280], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[281] = "Operasional";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[281]))
{
    $nm_var_lab[281] = sc_convert_encoding($nm_var_lab[281], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[282] = "Perubahan Ekuitas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[282]))
{
    $nm_var_lab[282] = sc_convert_encoding($nm_var_lab[282], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[283] = "Reset Password IT";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[283]))
{
    $nm_var_lab[283] = sc_convert_encoding($nm_var_lab[283], $_SESSION['scriptcase']['charset'], "UTF-8");
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
 $nm_var_hint[142] = "";
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
 $nm_var_hint[145] = "";
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
 $nm_var_hint[148] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[148]))
{
    $nm_var_hint[148] = sc_convert_encoding($nm_var_hint[148], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[149] = "";
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
 $nm_var_hint[173] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[173]))
{
    $nm_var_hint[173] = sc_convert_encoding($nm_var_hint[173], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[174] = "";
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
 $nm_var_hint[189] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[189]))
{
    $nm_var_hint[189] = sc_convert_encoding($nm_var_hint[189], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[190] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[190]))
{
    $nm_var_hint[190] = sc_convert_encoding($nm_var_hint[190], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[191] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[191]))
{
    $nm_var_hint[191] = sc_convert_encoding($nm_var_hint[191], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[192] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[192]))
{
    $nm_var_hint[192] = sc_convert_encoding($nm_var_hint[192], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[193] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[193]))
{
    $nm_var_hint[193] = sc_convert_encoding($nm_var_hint[193], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[194] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[194]))
{
    $nm_var_hint[194] = sc_convert_encoding($nm_var_hint[194], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[195] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[195]))
{
    $nm_var_hint[195] = sc_convert_encoding($nm_var_hint[195], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[196] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[196]))
{
    $nm_var_hint[196] = sc_convert_encoding($nm_var_hint[196], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[197] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[197]))
{
    $nm_var_hint[197] = sc_convert_encoding($nm_var_hint[197], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[198] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[198]))
{
    $nm_var_hint[198] = sc_convert_encoding($nm_var_hint[198], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[199] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[199]))
{
    $nm_var_hint[199] = sc_convert_encoding($nm_var_hint[199], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[200] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[200]))
{
    $nm_var_hint[200] = sc_convert_encoding($nm_var_hint[200], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[201] = "Aplikasi Bridging API";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[201]))
{
    $nm_var_hint[201] = sc_convert_encoding($nm_var_hint[201], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[202] = "API BPJS VClaim";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[202]))
{
    $nm_var_hint[202] = sc_convert_encoding($nm_var_hint[202], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[203] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[203]))
{
    $nm_var_hint[203] = sc_convert_encoding($nm_var_hint[203], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[204] = "API EKlaim INACBG";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[204]))
{
    $nm_var_hint[204] = sc_convert_encoding($nm_var_hint[204], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[205] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[205]))
{
    $nm_var_hint[205] = sc_convert_encoding($nm_var_hint[205], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[206] = "API BPJS Aplicare";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[206]))
{
    $nm_var_hint[206] = sc_convert_encoding($nm_var_hint[206], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[207] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[207]))
{
    $nm_var_hint[207] = sc_convert_encoding($nm_var_hint[207], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[208] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[208]))
{
    $nm_var_hint[208] = sc_convert_encoding($nm_var_hint[208], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[209] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[209]))
{
    $nm_var_hint[209] = sc_convert_encoding($nm_var_hint[209], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[210] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[210]))
{
    $nm_var_hint[210] = sc_convert_encoding($nm_var_hint[210], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[211] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[211]))
{
    $nm_var_hint[211] = sc_convert_encoding($nm_var_hint[211], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[212] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[212]))
{
    $nm_var_hint[212] = sc_convert_encoding($nm_var_hint[212], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[213] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[213]))
{
    $nm_var_hint[213] = sc_convert_encoding($nm_var_hint[213], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[214] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[214]))
{
    $nm_var_hint[214] = sc_convert_encoding($nm_var_hint[214], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[215] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[215]))
{
    $nm_var_hint[215] = sc_convert_encoding($nm_var_hint[215], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[216] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[216]))
{
    $nm_var_hint[216] = sc_convert_encoding($nm_var_hint[216], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[217] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[217]))
{
    $nm_var_hint[217] = sc_convert_encoding($nm_var_hint[217], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[218] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[218]))
{
    $nm_var_hint[218] = sc_convert_encoding($nm_var_hint[218], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[219] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[219]))
{
    $nm_var_hint[219] = sc_convert_encoding($nm_var_hint[219], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[220] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[220]))
{
    $nm_var_hint[220] = sc_convert_encoding($nm_var_hint[220], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[221] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[221]))
{
    $nm_var_hint[221] = sc_convert_encoding($nm_var_hint[221], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[222] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[222]))
{
    $nm_var_hint[222] = sc_convert_encoding($nm_var_hint[222], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[223] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[223]))
{
    $nm_var_hint[223] = sc_convert_encoding($nm_var_hint[223], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[224] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[224]))
{
    $nm_var_hint[224] = sc_convert_encoding($nm_var_hint[224], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[225] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[225]))
{
    $nm_var_hint[225] = sc_convert_encoding($nm_var_hint[225], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[226] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[226]))
{
    $nm_var_hint[226] = sc_convert_encoding($nm_var_hint[226], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[227] = "Pengelolaan SDM RS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[227]))
{
    $nm_var_hint[227] = sc_convert_encoding($nm_var_hint[227], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[228] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[228]))
{
    $nm_var_hint[228] = sc_convert_encoding($nm_var_hint[228], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[229] = "Data Referensi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[229]))
{
    $nm_var_hint[229] = sc_convert_encoding($nm_var_hint[229], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[230] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[230]))
{
    $nm_var_hint[230] = sc_convert_encoding($nm_var_hint[230], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[231] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[231]))
{
    $nm_var_hint[231] = sc_convert_encoding($nm_var_hint[231], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[232] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[232]))
{
    $nm_var_hint[232] = sc_convert_encoding($nm_var_hint[232], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[233] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[233]))
{
    $nm_var_hint[233] = sc_convert_encoding($nm_var_hint[233], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[234] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[234]))
{
    $nm_var_hint[234] = sc_convert_encoding($nm_var_hint[234], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[235] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[235]))
{
    $nm_var_hint[235] = sc_convert_encoding($nm_var_hint[235], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[236] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[236]))
{
    $nm_var_hint[236] = sc_convert_encoding($nm_var_hint[236], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[237] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[237]))
{
    $nm_var_hint[237] = sc_convert_encoding($nm_var_hint[237], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[238] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[238]))
{
    $nm_var_hint[238] = sc_convert_encoding($nm_var_hint[238], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[239] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[239]))
{
    $nm_var_hint[239] = sc_convert_encoding($nm_var_hint[239], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[240] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[240]))
{
    $nm_var_hint[240] = sc_convert_encoding($nm_var_hint[240], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[241] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[241]))
{
    $nm_var_hint[241] = sc_convert_encoding($nm_var_hint[241], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[242] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[242]))
{
    $nm_var_hint[242] = sc_convert_encoding($nm_var_hint[242], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[243] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[243]))
{
    $nm_var_hint[243] = sc_convert_encoding($nm_var_hint[243], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[244] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[244]))
{
    $nm_var_hint[244] = sc_convert_encoding($nm_var_hint[244], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[245] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[245]))
{
    $nm_var_hint[245] = sc_convert_encoding($nm_var_hint[245], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[246] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[246]))
{
    $nm_var_hint[246] = sc_convert_encoding($nm_var_hint[246], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[247] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[247]))
{
    $nm_var_hint[247] = sc_convert_encoding($nm_var_hint[247], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[248] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[248]))
{
    $nm_var_hint[248] = sc_convert_encoding($nm_var_hint[248], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[249] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[249]))
{
    $nm_var_hint[249] = sc_convert_encoding($nm_var_hint[249], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[250] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[250]))
{
    $nm_var_hint[250] = sc_convert_encoding($nm_var_hint[250], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[251] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[251]))
{
    $nm_var_hint[251] = sc_convert_encoding($nm_var_hint[251], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[252] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[252]))
{
    $nm_var_hint[252] = sc_convert_encoding($nm_var_hint[252], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[253] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[253]))
{
    $nm_var_hint[253] = sc_convert_encoding($nm_var_hint[253], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[254] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[254]))
{
    $nm_var_hint[254] = sc_convert_encoding($nm_var_hint[254], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[255] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[255]))
{
    $nm_var_hint[255] = sc_convert_encoding($nm_var_hint[255], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[256] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[256]))
{
    $nm_var_hint[256] = sc_convert_encoding($nm_var_hint[256], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[257] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[257]))
{
    $nm_var_hint[257] = sc_convert_encoding($nm_var_hint[257], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[258] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[258]))
{
    $nm_var_hint[258] = sc_convert_encoding($nm_var_hint[258], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[259] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[259]))
{
    $nm_var_hint[259] = sc_convert_encoding($nm_var_hint[259], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[260] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[260]))
{
    $nm_var_hint[260] = sc_convert_encoding($nm_var_hint[260], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[261] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[261]))
{
    $nm_var_hint[261] = sc_convert_encoding($nm_var_hint[261], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[262] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[262]))
{
    $nm_var_hint[262] = sc_convert_encoding($nm_var_hint[262], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[263] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[263]))
{
    $nm_var_hint[263] = sc_convert_encoding($nm_var_hint[263], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[264] = "Manajemen Finansial";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[264]))
{
    $nm_var_hint[264] = sc_convert_encoding($nm_var_hint[264], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[265] = "Akuntansi";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[265]))
{
    $nm_var_hint[265] = sc_convert_encoding($nm_var_hint[265], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[266] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[266]))
{
    $nm_var_hint[266] = sc_convert_encoding($nm_var_hint[266], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[267] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[267]))
{
    $nm_var_hint[267] = sc_convert_encoding($nm_var_hint[267], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[268] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[268]))
{
    $nm_var_hint[268] = sc_convert_encoding($nm_var_hint[268], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[269] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[269]))
{
    $nm_var_hint[269] = sc_convert_encoding($nm_var_hint[269], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[270] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[270]))
{
    $nm_var_hint[270] = sc_convert_encoding($nm_var_hint[270], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[271] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[271]))
{
    $nm_var_hint[271] = sc_convert_encoding($nm_var_hint[271], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[272] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[272]))
{
    $nm_var_hint[272] = sc_convert_encoding($nm_var_hint[272], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[273] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[273]))
{
    $nm_var_hint[273] = sc_convert_encoding($nm_var_hint[273], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[274] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[274]))
{
    $nm_var_hint[274] = sc_convert_encoding($nm_var_hint[274], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[275] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[275]))
{
    $nm_var_hint[275] = sc_convert_encoding($nm_var_hint[275], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[276] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[276]))
{
    $nm_var_hint[276] = sc_convert_encoding($nm_var_hint[276], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[277] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[277]))
{
    $nm_var_hint[277] = sc_convert_encoding($nm_var_hint[277], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[278] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[278]))
{
    $nm_var_hint[278] = sc_convert_encoding($nm_var_hint[278], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[279] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[279]))
{
    $nm_var_hint[279] = sc_convert_encoding($nm_var_hint[279], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[280] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[280]))
{
    $nm_var_hint[280] = sc_convert_encoding($nm_var_hint[280], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[281] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[281]))
{
    $nm_var_hint[281] = sc_convert_encoding($nm_var_hint[281], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[282] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[282]))
{
    $nm_var_hint[282] = sc_convert_encoding($nm_var_hint[282], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[283] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[283]))
{
    $nm_var_hint[283] = sc_convert_encoding($nm_var_hint[283], $_SESSION['scriptcase']['charset'], "UTF-8");
}
$saida_apl = $_SESSION['scriptcase']['sc_saida_menu'];
$menu_menuData['data'] .= "item_2|.|" . $nm_var_lab[0] . "||" . $nm_var_hint[0] . "|scriptcase__NM__ico__NM__add_32.png|_self|\n";
$menu_menuData['data'] .= "item_14|..|" . $nm_var_lab[1] . "||" . $nm_var_hint[1] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbantrian']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbantrian']) == "on")
{
    $menu_menuData['data'] .= "item_284|...|" . $nm_var_lab[2] . "|menu_form_php.php?sc_item_menu=item_284&sc_apl_menu=grid_tbantrian&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[2] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_antrian']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_antrian']) == "on")
{
    $menu_menuData['data'] .= "item_285|....|" . $nm_var_lab[3] . "|menu_form_php.php?sc_item_menu=item_285&sc_apl_menu=grid_antrian&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[3] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadmrawatinap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadmrawatinap']) == "on")
{
    $menu_menuData['data'] .= "item_1|...|" . $nm_var_lab[4] . "|menu_form_php.php?sc_item_menu=item_1&sc_apl_menu=grid_tbadmrawatinap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[4] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hisdetailrawatinap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hisdetailrawatinap']) == "on")
{
    $menu_menuData['data'] .= "item_341|....|" . $nm_var_lab[5] . "|menu_form_php.php?sc_item_menu=item_341&sc_apl_menu=grid_hisdetailrawatinap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[5] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ketersediaan_bed']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ketersediaan_bed']) == "on")
{
    $menu_menuData['data'] .= "item_5|....|" . $nm_var_lab[6] . "|menu_form_php.php?sc_item_menu=item_5&sc_apl_menu=grid_ketersediaan_bed&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[6] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_12|...|" . $nm_var_lab[7] . "||" . $nm_var_hint[7] . "||_self|\n";
$menu_menuData['data'] .= "item_382|..|" . $nm_var_lab[8] . "||" . $nm_var_hint[8] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_pembayaran']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_pembayaran']) == "on")
{
    $menu_menuData['data'] .= "item_10|...|" . $nm_var_lab[9] . "|menu_form_php.php?sc_item_menu=item_10&sc_apl_menu=tabs_pembayaran&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[9] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['calendar_tbcustomer']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['calendar_tbcustomer']) == "on")
{
    $menu_menuData['data'] .= "item_272|...|" . $nm_var_lab[10] . "|menu_form_php.php?sc_item_menu=item_272&sc_apl_menu=calendar_tbcustomer&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[10] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpembatalan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpembatalan']) == "on")
{
    $menu_menuData['data'] .= "item_300|...|" . $nm_var_lab[11] . "|menu_form_php.php?sc_item_menu=item_300&sc_apl_menu=grid_tbpembatalan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[11] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_hargaTind']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_hargaTind']) == "on")
{
    $menu_menuData['data'] .= "item_6|...|" . $nm_var_lab[12] . "|menu_form_php.php?sc_item_menu=item_6&sc_apl_menu=tabs_hargaTind&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[12] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['billing_casemanager']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['billing_casemanager']) == "on")
{
    $menu_menuData['data'] .= "item_294|...|" . $nm_var_lab[13] . "|menu_form_php.php?sc_item_menu=item_294&sc_apl_menu=billing_casemanager&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[13] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['berkas_klaim_elek']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['berkas_klaim_elek']) == "on")
{
    $menu_menuData['data'] .= "item_295|....|" . $nm_var_lab[14] . "|menu_form_php.php?sc_item_menu=item_295&sc_apl_menu=berkas_klaim_elek&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[14] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_15|..|" . $nm_var_lab[15] . "||" . $nm_var_hint[15] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbreqitem']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbreqitem']) == "on")
{
    $menu_menuData['data'] .= "item_273|...|" . $nm_var_lab[16] . "|menu_form_php.php?sc_item_menu=item_273&sc_apl_menu=grid_tbreqitem&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[16] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_383|...|" . $nm_var_lab[17] . "||" . $nm_var_hint[17] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_Poli']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_Poli']) == "on")
{
    $menu_menuData['data'] .= "item_16|....|" . $nm_var_lab[18] . "|menu_form_php.php?sc_item_menu=item_16&sc_apl_menu=tabs_Poli&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[18] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_RI']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_RI']) == "on")
{
    $menu_menuData['data'] .= "item_17|....|" . $nm_var_lab[19] . "|menu_form_php.php?sc_item_menu=item_17&sc_apl_menu=tabs_RI&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[19] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabsIGD']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabsIGD']) == "on")
{
    $menu_menuData['data'] .= "item_18|....|" . $nm_var_lab[20] . "|menu_form_php.php?sc_item_menu=item_18&sc_apl_menu=tabsIGD&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[20] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_384|...|" . $nm_var_lab[21] . "||" . $nm_var_hint[21] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabsOK']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabsOK']) == "on")
{
    $menu_menuData['data'] .= "item_20|....|" . $nm_var_lab[22] . "|menu_form_php.php?sc_item_menu=item_20&sc_apl_menu=tabsOK&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[22] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbhais']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbhais']) == "on")
{
    $menu_menuData['data'] .= "item_358|.....|" . $nm_var_lab[23] . "|menu_form_php.php?sc_item_menu=item_358&sc_apl_menu=grid_tbhais&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[23] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_VK']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_VK']) == "on")
{
    $menu_menuData['data'] .= "item_21|....|" . $nm_var_lab[24] . "|menu_form_php.php?sc_item_menu=item_21&sc_apl_menu=tabs_VK&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[24] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabsEndos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabsEndos']) == "on")
{
    $menu_menuData['data'] .= "item_330|....|" . $nm_var_lab[25] . "|menu_form_php.php?sc_item_menu=item_330&sc_apl_menu=tabsEndos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[25] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_Lab']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_Lab']) == "on")
{
    $menu_menuData['data'] .= "item_23|....|" . $nm_var_lab[26] . "|menu_form_php.php?sc_item_menu=item_23&sc_apl_menu=tabs_Lab&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[26] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_radiologi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_radiologi']) == "on")
{
    $menu_menuData['data'] .= "item_255|....|" . $nm_var_lab[27] . "|menu_form_php.php?sc_item_menu=item_255&sc_apl_menu=tabs_radiologi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[27] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_33|....|" . $nm_var_lab[28] . "||" . $nm_var_hint[28] . "||_self|\n";
$menu_menuData['data'] .= "item_334|.....|" . $nm_var_lab[29] . "||" . $nm_var_hint[29] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabsRM']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabsRM']) == "on")
{
    $menu_menuData['data'] .= "item_265|.....|" . $nm_var_lab[30] . "|menu_form_php.php?sc_item_menu=item_265&sc_apl_menu=tabsRM&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[30] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabsMappingICD']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabsMappingICD']) == "on")
{
    $menu_menuData['data'] .= "item_28|.....|" . $nm_var_lab[31] . "|menu_form_php.php?sc_item_menu=item_28&sc_apl_menu=tabsMappingICD&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[31] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_346|.....|" . $nm_var_lab[32] . "||" . $nm_var_hint[32] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_jk']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_jk']) == "on")
{
    $menu_menuData['data'] .= "item_343|......|" . $nm_var_lab[33] . "|menu_form_php.php?sc_item_menu=item_343&sc_apl_menu=grid_lap_demo_jk&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[33] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_agama']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_agama']) == "on")
{
    $menu_menuData['data'] .= "item_344|......|" . $nm_var_lab[34] . "|menu_form_php.php?sc_item_menu=item_344&sc_apl_menu=grid_lap_demo_agama&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[34] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_edu']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_edu']) == "on")
{
    $menu_menuData['data'] .= "item_347|......|" . $nm_var_lab[35] . "|menu_form_php.php?sc_item_menu=item_347&sc_apl_menu=grid_lap_demo_edu&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[35] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_age']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_age']) == "on")
{
    $menu_menuData['data'] .= "item_348|......|" . $nm_var_lab[36] . "|menu_form_php.php?sc_item_menu=item_348&sc_apl_menu=grid_lap_demo_age&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[36] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_349|.....|" . $nm_var_lab[37] . "||" . $nm_var_hint[37] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag']) == "on")
{
    $menu_menuData['data'] .= "item_350|......|" . $nm_var_lab[38] . "|menu_form_php.php?sc_item_menu=item_350&sc_apl_menu=grid_lap_demo_top_diag&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[38] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag_ri']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag_ri']) == "on")
{
    $menu_menuData['data'] .= "item_351|......|" . $nm_var_lab[39] . "|menu_form_php.php?sc_item_menu=item_351&sc_apl_menu=grid_lap_demo_top_diag_ri&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[39] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_diagnosa_detail']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_diagnosa_detail']) == "on")
{
    $menu_menuData['data'] .= "item_375|......|" . $nm_var_lab[40] . "|menu_form_php.php?sc_item_menu=item_375&sc_apl_menu=grid_diagnosa_detail&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[40] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['report_Lab']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['report_Lab']) == "on")
{
    $menu_menuData['data'] .= "item_352|.....|" . $nm_var_lab[41] . "|menu_form_php.php?sc_item_menu=item_352&sc_apl_menu=report_Lab&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[41] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['rekapitulasi_ri']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['rekapitulasi_ri']) == "on")
{
    $menu_menuData['data'] .= "item_335|.....|" . $nm_var_lab[42] . "|menu_form_php.php?sc_item_menu=item_335&sc_apl_menu=rekapitulasi_ri&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[42] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_35|....|" . $nm_var_lab[43] . "||" . $nm_var_hint[43] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadjustment']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadjustment']) == "on")
{
    $menu_menuData['data'] .= "item_378|.....|" . $nm_var_lab[44] . "|menu_form_php.php?sc_item_menu=item_378&sc_apl_menu=grid_tbadjustment&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[44] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_tbobat_batch']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tbobat_batch']) == "on")
{
    $menu_menuData['data'] .= "item_305|.....|" . $nm_var_lab[45] . "|menu_form_php.php?sc_item_menu=item_305&sc_apl_menu=form_tbobat_batch&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[45] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_tbstockobat']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tbstockobat']) == "on")
{
    $menu_menuData['data'] .= "item_298|.....|" . $nm_var_lab[46] . "|menu_form_php.php?sc_item_menu=item_298&sc_apl_menu=form_tbstockobat&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[46] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_Farm']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_Farm']) == "on")
{
    $menu_menuData['data'] .= "item_266|.....|" . $nm_var_lab[47] . "|menu_form_php.php?sc_item_menu=item_266&sc_apl_menu=tabs_Farm&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[47] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_270|..|" . $nm_var_lab[48] . "||" . $nm_var_hint[48] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_logistik']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_logistik']) == "on")
{
    $menu_menuData['data'] .= "item_354|...|" . $nm_var_lab[49] . "|menu_form_php.php?sc_item_menu=item_354&sc_apl_menu=grid_lap_logistik&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[49] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_Logistik']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_Logistik']) == "on")
{
    $menu_menuData['data'] .= "item_37|...|" . $nm_var_lab[50] . "|menu_form_php.php?sc_item_menu=item_37&sc_apl_menu=tabs_Logistik&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[50] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_status_pembelian']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_status_pembelian']) == "on")
{
    $menu_menuData['data'] .= "item_365|....|" . $nm_var_lab[51] . "|menu_form_php.php?sc_item_menu=item_365&sc_apl_menu=grid_status_pembelian&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[51] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbstockopname']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbstockopname']) == "on")
{
    $menu_menuData['data'] .= "item_39|...|" . $nm_var_lab[52] . "|menu_form_php.php?sc_item_menu=item_39&sc_apl_menu=grid_tbstockopname&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[52] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbreturlog']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbreturlog']) == "on")
{
    $menu_menuData['data'] .= "item_275|...|" . $nm_var_lab[53] . "|menu_form_php.php?sc_item_menu=item_275&sc_apl_menu=grid_tbreturlog&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[53] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_308|..|" . $nm_var_lab[54] . "||" . $nm_var_hint[54] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usulanpengadaan_gizi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_usulanpengadaan_gizi']) == "on")
{
    $menu_menuData['data'] .= "item_309|...|" . $nm_var_lab[55] . "|menu_form_php.php?sc_item_menu=item_309&sc_apl_menu=grid_usulanpengadaan_gizi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[55] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_approvalusulanpengadaan_gizi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_approvalusulanpengadaan_gizi']) == "on")
{
    $menu_menuData['data'] .= "item_310|...|" . $nm_var_lab[56] . "|menu_form_php.php?sc_item_menu=item_310&sc_apl_menu=grid_approvalusulanpengadaan_gizi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[56] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detailrawatinap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detailrawatinap']) == "on")
{
    $menu_menuData['data'] .= "item_311|...|" . $nm_var_lab[57] . "|menu_form_php.php?sc_item_menu=item_311&sc_apl_menu=grid_detailrawatinap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[57] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_316|...|" . $nm_var_lab[58] . "||" . $nm_var_hint[58] . "||_self|\n";
$menu_menuData['data'] .= "item_312|...|" . $nm_var_lab[59] . "||" . $nm_var_hint[59] . "||_self|\n";
$menu_menuData['data'] .= "item_41|.|" . $nm_var_lab[60] . "||" . $nm_var_hint[60] . "|scriptcase__NM__ico__NM__book_green_32.png|_self|\n";
$menu_menuData['data'] .= "item_42|..|" . $nm_var_lab[61] . "||" . $nm_var_hint[61] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbobat']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbobat']) == "on")
{
    $menu_menuData['data'] .= "item_43|...|" . $nm_var_lab[62] . "|menu_form_php.php?sc_item_menu=item_43&sc_apl_menu=grid_tbobat&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[62] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbformulaobat']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbformulaobat']) == "on")
{
    $menu_menuData['data'] .= "item_44|...|" . $nm_var_lab[63] . "|menu_form_php.php?sc_item_menu=item_44&sc_apl_menu=grid_tbformulaobat&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[63] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_47|...|" . $nm_var_lab[64] . "||" . $nm_var_hint[64] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbfornas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbfornas']) == "on")
{
    $menu_menuData['data'] .= "item_299|...|" . $nm_var_lab[65] . "|menu_form_php.php?sc_item_menu=item_299&sc_apl_menu=grid_tbfornas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[65] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgolonganobat']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgolonganobat']) == "on")
{
    $menu_menuData['data'] .= "item_45|...|" . $nm_var_lab[66] . "|menu_form_php.php?sc_item_menu=item_45&sc_apl_menu=grid_tbgolonganobat&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[66] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcaraminum']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcaraminum']) == "on")
{
    $menu_menuData['data'] .= "item_271|...|" . $nm_var_lab[67] . "|menu_form_php.php?sc_item_menu=item_271&sc_apl_menu=grid_tbcaraminum&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[67] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsigna']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsigna']) == "on")
{
    $menu_menuData['data'] .= "item_52|...|" . $nm_var_lab[68] . "|menu_form_php.php?sc_item_menu=item_52&sc_apl_menu=grid_tbsigna&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[68] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsatuan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsatuan']) == "on")
{
    $menu_menuData['data'] .= "item_53|...|" . $nm_var_lab[69] . "|menu_form_php.php?sc_item_menu=item_53&sc_apl_menu=grid_tbsatuan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[69] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdepo']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdepo']) == "on")
{
    $menu_menuData['data'] .= "item_274|...|" . $nm_var_lab[70] . "|menu_form_php.php?sc_item_menu=item_274&sc_apl_menu=grid_tbdepo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[70] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisadjustment']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisadjustment']) == "on")
{
    $menu_menuData['data'] .= "item_379|...|" . $nm_var_lab[71] . "|menu_form_php.php?sc_item_menu=item_379&sc_apl_menu=grid_tbjenisadjustment&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[71] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_315|..|" . $nm_var_lab[72] . "||" . $nm_var_hint[72] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_bahan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_bahan']) == "on")
{
    $menu_menuData['data'] .= "item_313|...|" . $nm_var_lab[73] . "|menu_form_php.php?sc_item_menu=item_313&sc_apl_menu=grid_bahan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[73] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jenisbahan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_jenisbahan']) == "on")
{
    $menu_menuData['data'] .= "item_318|...|" . $nm_var_lab[74] . "|menu_form_php.php?sc_item_menu=item_318&sc_apl_menu=grid_jenisbahan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[74] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_kategoribahan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_kategoribahan']) == "on")
{
    $menu_menuData['data'] .= "item_319|...|" . $nm_var_lab[75] . "|menu_form_php.php?sc_item_menu=item_319&sc_apl_menu=grid_kategoribahan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[75] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_set_gizi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_set_gizi']) == "on")
{
    $menu_menuData['data'] .= "item_314|...|" . $nm_var_lab[76] . "|menu_form_php.php?sc_item_menu=item_314&sc_apl_menu=grid_set_gizi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[76] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_set_menu']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_set_menu']) == "on")
{
    $menu_menuData['data'] .= "item_320|...|" . $nm_var_lab[77] . "|menu_form_php.php?sc_item_menu=item_320&sc_apl_menu=grid_set_menu&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[77] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_48|..|" . $nm_var_lab[78] . "||" . $nm_var_hint[78] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpoli']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpoli']) == "on")
{
    $menu_menuData['data'] .= "item_130|...|" . $nm_var_lab[79] . "|menu_form_php.php?sc_item_menu=item_130&sc_apl_menu=grid_tbpoli&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[79] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpbf']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpbf']) == "on")
{
    $menu_menuData['data'] .= "item_49|...|" . $nm_var_lab[80] . "|menu_form_php.php?sc_item_menu=item_49&sc_apl_menu=grid_tbpbf&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[80] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenispembatalan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenispembatalan']) == "on")
{
    $menu_menuData['data'] .= "item_301|...|" . $nm_var_lab[81] . "|menu_form_php.php?sc_item_menu=item_301&sc_apl_menu=grid_tbjenispembatalan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[81] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbinstansi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbinstansi']) == "on")
{
    $menu_menuData['data'] .= "item_50|...|" . $nm_var_lab[82] . "|menu_form_php.php?sc_item_menu=item_50&sc_apl_menu=grid_tbinstansi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[82] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbbank']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbbank']) == "on")
{
    $menu_menuData['data'] .= "item_54|...|" . $nm_var_lab[83] . "|menu_form_php.php?sc_item_menu=item_54&sc_apl_menu=grid_tbbank&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[83] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_55|...|" . $nm_var_lab[84] . "||" . $nm_var_hint[84] . "||_self|\n";
$menu_menuData['data'] .= "item_56|...|" . $nm_var_lab[85] . "||" . $nm_var_hint[85] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbbu']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbbu']) == "on")
{
    $menu_menuData['data'] .= "item_57|...|" . $nm_var_lab[86] . "|menu_form_php.php?sc_item_menu=item_57&sc_apl_menu=grid_tbbu&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[86] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgelardokter']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbgelardokter']) == "on")
{
    $menu_menuData['data'] .= "item_58|...|" . $nm_var_lab[87] . "|menu_form_php.php?sc_item_menu=item_58&sc_apl_menu=grid_tbgelardokter&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[87] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_59|...|" . $nm_var_lab[88] . "||" . $nm_var_hint[88] . "||_self|\n";
$menu_menuData['data'] .= "item_60|...|" . $nm_var_lab[89] . "||" . $nm_var_hint[89] . "||_self|\n";
$menu_menuData['data'] .= "item_62|..|" . $nm_var_lab[90] . "||" . $nm_var_hint[90] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdoctor']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdoctor']) == "on")
{
    $menu_menuData['data'] .= "item_63|...|" . $nm_var_lab[91] . "|menu_form_php.php?sc_item_menu=item_63&sc_apl_menu=grid_tbdoctor&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[91] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcustomer']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbcustomer']) == "on")
{
    $menu_menuData['data'] .= "item_64|...|" . $nm_var_lab[92] . "|menu_form_php.php?sc_item_menu=item_64&sc_apl_menu=grid_tbcustomer&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[92] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbhrd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbhrd']) == "on")
{
    $menu_menuData['data'] .= "item_143|...|" . $nm_var_lab[93] . "|menu_form_php.php?sc_item_menu=item_143&sc_apl_menu=grid_tbhrd&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[93] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_67|..|" . $nm_var_lab[94] . "||" . $nm_var_hint[94] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbtindakan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbtindakan']) == "on")
{
    $menu_menuData['data'] .= "item_68|...|" . $nm_var_lab[95] . "|menu_form_php.php?sc_item_menu=item_68&sc_apl_menu=grid_tbtindakan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[95] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsettindakan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsettindakan']) == "on")
{
    $menu_menuData['data'] .= "item_283|....|" . $nm_var_lab[96] . "|menu_form_php.php?sc_item_menu=item_283&sc_apl_menu=grid_tbsettindakan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[96] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbclinicalpathway']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbclinicalpathway']) == "on")
{
    $menu_menuData['data'] .= "item_336|...|" . $nm_var_lab[97] . "|menu_form_php.php?sc_item_menu=item_336&sc_apl_menu=grid_tbclinicalpathway&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[97] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi']) == "on")
{
    $menu_menuData['data'] .= "item_70|...|" . $nm_var_lab[98] . "|menu_form_php.php?sc_item_menu=item_70&sc_apl_menu=grid_tbradiologi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[98] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisradiologi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisradiologi']) == "on")
{
    $menu_menuData['data'] .= "item_257|....|" . $nm_var_lab[99] . "|menu_form_php.php?sc_item_menu=item_257&sc_apl_menu=grid_tbjenisradiologi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[99] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi']) == "on")
{
    $menu_menuData['data'] .= "item_151|....|" . $nm_var_lab[100] . "|menu_form_php.php?sc_item_menu=item_151&sc_apl_menu=grid_tbradiologi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[100] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tblab']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tblab']) == "on")
{
    $menu_menuData['data'] .= "item_150|...|" . $nm_var_lab[101] . "|menu_form_php.php?sc_item_menu=item_150&sc_apl_menu=grid_tblab&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[101] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tblabcategory']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tblabcategory']) == "on")
{
    $menu_menuData['data'] .= "item_253|....|" . $nm_var_lab[102] . "|menu_form_php.php?sc_item_menu=item_253&sc_apl_menu=grid_tblabcategory&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[102] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tblabrate']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tblabrate']) == "on")
{
    $menu_menuData['data'] .= "item_152|....|" . $nm_var_lab[103] . "|menu_form_php.php?sc_item_menu=item_152&sc_apl_menu=grid_tblabrate&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[103] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbkelas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbkelas']) == "on")
{
    $menu_menuData['data'] .= "item_72|...|" . $nm_var_lab[104] . "|menu_form_php.php?sc_item_menu=item_72&sc_apl_menu=grid_tbkelas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[104] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbruang']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbruang']) == "on")
{
    $menu_menuData['data'] .= "item_144|...|" . $nm_var_lab[105] . "|menu_form_php.php?sc_item_menu=item_144&sc_apl_menu=grid_tbruang&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[105] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbfuncroom']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbfuncroom']) == "on")
{
    $menu_menuData['data'] .= "item_317|...|" . $nm_var_lab[106] . "|menu_form_php.php?sc_item_menu=item_317&sc_apl_menu=grid_tbfuncroom&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[106] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_73|...|" . $nm_var_lab[107] . "||" . $nm_var_hint[107] . "||_self|\n";
$menu_menuData['data'] .= "item_74|...|" . $nm_var_lab[108] . "||" . $nm_var_hint[108] . "||_self|\n";
$menu_menuData['data'] .= "item_75|...|" . $nm_var_lab[109] . "||" . $nm_var_hint[109] . "||_self|\n";
$menu_menuData['data'] .= "item_76|...|" . $nm_var_lab[110] . "||" . $nm_var_hint[110] . "||_self|\n";
$menu_menuData['data'] .= "item_77|...|" . $nm_var_lab[111] . "||" . $nm_var_hint[111] . "||_self|\n";
$menu_menuData['data'] .= "item_78|..|" . $nm_var_lab[112] . "||" . $nm_var_hint[112] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaket']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaket']) == "on")
{
    $menu_menuData['data'] .= "item_340|...|" . $nm_var_lab[113] . "|menu_form_php.php?sc_item_menu=item_340&sc_apl_menu=grid_tbpaket&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[113] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadministrasi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadministrasi']) == "on")
{
    $menu_menuData['data'] .= "item_79|...|" . $nm_var_lab[114] . "|menu_form_php.php?sc_item_menu=item_79&sc_apl_menu=grid_tbadministrasi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[114] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_80|...|" . $nm_var_lab[115] . "||" . $nm_var_hint[115] . "||_self|\n";
$menu_menuData['data'] .= "item_81|...|" . $nm_var_lab[116] . "||" . $nm_var_hint[116] . "||_self|\n";
$menu_menuData['data'] .= "item_82|...|" . $nm_var_lab[117] . "||" . $nm_var_hint[117] . "||_self|\n";
$menu_menuData['data'] .= "item_83|...|" . $nm_var_lab[118] . "||" . $nm_var_hint[118] . "||_self|\n";
$menu_menuData['data'] .= "item_84|...|" . $nm_var_lab[119] . "||" . $nm_var_hint[119] . "||_self|\n";
$menu_menuData['data'] .= "item_85|...|" . $nm_var_lab[120] . "||" . $nm_var_hint[120] . "||_self|\n";
$menu_menuData['data'] .= "item_86|.|" . $nm_var_lab[121] . "||" . $nm_var_hint[121] . "|scriptcase__NM__ico__NM__briefcase2_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend']) == "on")
{
    $menu_menuData['data'] .= "item_385|..|" . $nm_var_lab[122] . "|menu_form_php.php?sc_item_menu=item_385&sc_apl_menu=control_summary_pend&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[122] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend_ranap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend_ranap']) == "on")
{
    $menu_menuData['data'] .= "item_386|..|" . $nm_var_lab[123] . "|menu_form_php.php?sc_item_menu=item_386&sc_apl_menu=control_summary_pend_ranap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[123] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) == "on")
{
    $menu_menuData['data'] .= "item_282|..|" . $nm_var_lab[124] . "|menu_form_php.php?sc_item_menu=item_282&sc_apl_menu=dashboard&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[124] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['bed_occupacy_rate']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['bed_occupacy_rate']) == "on")
{
    $menu_menuData['data'] .= "item_377|...|" . $nm_var_lab[125] . "|menu_form_php.php?sc_item_menu=item_377&sc_apl_menu=bed_occupacy_rate&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[125] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['av_los']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['av_los']) == "on")
{
    $menu_menuData['data'] .= "item_380|...|" . $nm_var_lab[126] . "|menu_form_php.php?sc_item_menu=item_380&sc_apl_menu=av_los&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[126] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_369|..|" . $nm_var_lab[127] . "||" . $nm_var_hint[127] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_igd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_igd']) == "on")
{
    $menu_menuData['data'] .= "item_368|...|" . $nm_var_lab[128] . "|menu_form_php.php?sc_item_menu=item_368&sc_apl_menu=dashboard_stat_igd&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[128] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_poli']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_poli']) == "on")
{
    $menu_menuData['data'] .= "item_367|...|" . $nm_var_lab[129] . "|menu_form_php.php?sc_item_menu=item_367&sc_apl_menu=dashboard_stat_poli&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[129] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_ranap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_ranap']) == "on")
{
    $menu_menuData['data'] .= "item_366|...|" . $nm_var_lab[130] . "|menu_form_php.php?sc_item_menu=item_366&sc_apl_menu=dashboard_stat_ranap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[130] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_grafik_kematian']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_grafik_kematian']) == "on")
{
    $menu_menuData['data'] .= "item_376|...|" . $nm_var_lab[131] . "|menu_form_php.php?sc_item_menu=item_376&sc_apl_menu=grid_grafik_kematian&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[131] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_370|..|" . $nm_var_lab[132] . "||" . $nm_var_hint[132] . "||_self|\n";
$menu_menuData['data'] .= "item_371|...|" . $nm_var_lab[133] . "||" . $nm_var_hint[133] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_lab']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_lab']) == "on")
{
    $menu_menuData['data'] .= "item_372|...|" . $nm_var_lab[134] . "|menu_form_php.php?sc_item_menu=item_372&sc_apl_menu=dashboard_stat_lab&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[134] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_373|...|" . $nm_var_lab[135] . "||" . $nm_var_hint[135] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_eis_rajal']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_eis_rajal']) == "on")
{
    $menu_menuData['data'] .= "item_87|..|" . $nm_var_lab[136] . "|menu_form_php.php?sc_item_menu=item_87&sc_apl_menu=grid_eis_rajal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[136] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_88|..|" . $nm_var_lab[137] . "||" . $nm_var_hint[137] . "||_self|\n";
$menu_menuData['data'] .= "item_89|..|" . $nm_var_lab[138] . "||" . $nm_var_hint[138] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_resep_keluar']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_resep_keluar']) == "on")
{
    $menu_menuData['data'] .= "item_345|..|" . $nm_var_lab[139] . "|menu_form_php.php?sc_item_menu=item_345&sc_apl_menu=grid_resep_keluar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[139] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_90|.|" . $nm_var_lab[140] . "||" . $nm_var_hint[140] . "|scriptcase__NM__ico__NM__cabinet_32.png|_self|\n";
$menu_menuData['data'] .= "item_91|..|" . $nm_var_lab[141] . "||" . $nm_var_hint[141] . "||_self|\n";
$menu_menuData['data'] .= "item_359|...|" . $nm_var_lab[142] . "||" . $nm_var_hint[142] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_kasir_per_shift']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_kasir_per_shift']) == "on")
{
    $menu_menuData['data'] .= "item_339|....|" . $nm_var_lab[143] . "|menu_form_php.php?sc_item_menu=item_339&sc_apl_menu=grid_lap_kasir_per_shift&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[143] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_bill_ranap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_bill_ranap']) == "on")
{
    $menu_menuData['data'] .= "item_338|....|" . $nm_var_lab[144] . "|menu_form_php.php?sc_item_menu=item_338&sc_apl_menu=grid_lap_bill_ranap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[144] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_95|....|" . $nm_var_lab[145] . "||" . $nm_var_hint[145] . "||_self|\n";
$menu_menuData['data'] .= "item_96|....|" . $nm_var_lab[146] . "||" . $nm_var_hint[146] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan']) == "on")
{
    $menu_menuData['data'] .= "item_325|....|" . $nm_var_lab[147] . "|menu_form_php.php?sc_item_menu=item_325&sc_apl_menu=rekapKeseluruhan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[147] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master']) == "on")
{
    $menu_menuData['data'] .= "item_321|....|" . $nm_var_lab[148] . "|menu_form_php.php?sc_item_menu=item_321&sc_apl_menu=rekapKeseluruhan_master&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[148] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master_ri']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master_ri']) == "on")
{
    $menu_menuData['data'] .= "item_353|....|" . $nm_var_lab[149] . "|menu_form_php.php?sc_item_menu=item_353&sc_apl_menu=rekapKeseluruhan_master_ri&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[149] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['reportKasir']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['reportKasir']) == "on")
{
    $menu_menuData['data'] .= "item_327|....|" . $nm_var_lab[150] . "|menu_form_php.php?sc_item_menu=item_327&sc_apl_menu=reportKasir&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[150] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['Laporan_Stok_Persediaan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Laporan_Stok_Persediaan']) == "on")
{
    $menu_menuData['data'] .= "item_328|....|" . $nm_var_lab[151] . "|menu_form_php.php?sc_item_menu=item_328&sc_apl_menu=Laporan_Stok_Persediaan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[151] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_360|...|" . $nm_var_lab[152] . "||" . $nm_var_hint[152] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_evaluasi_penerimaan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_evaluasi_penerimaan']) == "on")
{
    $menu_menuData['data'] .= "item_374|....|" . $nm_var_lab[153] . "|menu_form_php.php?sc_item_menu=item_374&sc_apl_menu=grid_evaluasi_penerimaan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[153] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_mutasi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_mutasi']) == "on")
{
    $menu_menuData['data'] .= "item_381|....|" . $nm_var_lab[154] . "|menu_form_php.php?sc_item_menu=item_381&sc_apl_menu=grid_laporan_mutasi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[154] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['fast_slow_moving']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['fast_slow_moving']) == "on")
{
    $menu_menuData['data'] .= "item_362|....|" . $nm_var_lab[155] . "|menu_form_php.php?sc_item_menu=item_362&sc_apl_menu=fast_slow_moving&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[155] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['stok_terkini']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['stok_terkini']) == "on")
{
    $menu_menuData['data'] .= "item_333|....|" . $nm_var_lab[156] . "|menu_form_php.php?sc_item_menu=item_333&sc_apl_menu=stok_terkini&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[156] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['kartu_stok']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['kartu_stok']) == "on")
{
    $menu_menuData['data'] .= "item_329|....|" . $nm_var_lab[157] . "|menu_form_php.php?sc_item_menu=item_329&sc_apl_menu=kartu_stok&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[157] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['laporan_obat_all']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['laporan_obat_all']) == "on")
{
    $menu_menuData['data'] .= "item_331|....|" . $nm_var_lab[158] . "|menu_form_php.php?sc_item_menu=item_331&sc_apl_menu=laporan_obat_all&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[158] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['lap_grid_logistik_single']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['lap_grid_logistik_single']) == "on")
{
    $menu_menuData['data'] .= "item_356|....|" . $nm_var_lab[159] . "|menu_form_php.php?sc_item_menu=item_356&sc_apl_menu=lap_grid_logistik_single&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[159] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['lap_grid_tbpo']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['lap_grid_tbpo']) == "on")
{
    $menu_menuData['data'] .= "item_355|....|" . $nm_var_lab[160] . "|menu_form_php.php?sc_item_menu=item_355&sc_apl_menu=lap_grid_tbpo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[160] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['top_sale_obat']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['top_sale_obat']) == "on")
{
    $menu_menuData['data'] .= "item_332|....|" . $nm_var_lab[161] . "|menu_form_php.php?sc_item_menu=item_332&sc_apl_menu=top_sale_obat&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[161] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_361|...|" . $nm_var_lab[162] . "||" . $nm_var_hint[162] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_gizi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_gizi']) == "on")
{
    $menu_menuData['data'] .= "item_357|....|" . $nm_var_lab[163] . "|menu_form_php.php?sc_item_menu=item_357&sc_apl_menu=grid_lap_gizi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[163] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_penjualan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_penjualan']) == "on")
{
    $menu_menuData['data'] .= "item_326|....|" . $nm_var_lab[164] . "|menu_form_php.php?sc_item_menu=item_326&sc_apl_menu=grid_penjualan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[164] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_94|...|" . $nm_var_lab[165] . "||" . $nm_var_hint[165] . "||_self|\n";
$menu_menuData['data'] .= "item_98|...|" . $nm_var_lab[166] . "||" . $nm_var_hint[166] . "||_self|\n";
$menu_menuData['data'] .= "item_99|...|" . $nm_var_lab[167] . "||" . $nm_var_hint[167] . "||_self|\n";
$menu_menuData['data'] .= "item_100|...|" . $nm_var_lab[168] . "||" . $nm_var_hint[168] . "||_self|\n";
$menu_menuData['data'] .= "item_101|...|" . $nm_var_lab[169] . "||" . $nm_var_hint[169] . "||_self|\n";
$menu_menuData['data'] .= "item_102|...|" . $nm_var_lab[170] . "||" . $nm_var_hint[170] . "||_self|\n";
$menu_menuData['data'] .= "item_103|...|" . $nm_var_lab[171] . "||" . $nm_var_hint[171] . "||_self|\n";
$menu_menuData['data'] .= "item_104|...|" . $nm_var_lab[172] . "||" . $nm_var_hint[172] . "||_self|\n";
$menu_menuData['data'] .= "item_105|...|" . $nm_var_lab[173] . "||" . $nm_var_hint[173] . "||_self|\n";
$menu_menuData['data'] .= "item_106|...|" . $nm_var_lab[174] . "||" . $nm_var_hint[174] . "||_self|\n";
$menu_menuData['data'] .= "item_107|...|" . $nm_var_lab[175] . "||" . $nm_var_hint[175] . "||_self|\n";
$menu_menuData['data'] .= "item_108|...|" . $nm_var_lab[176] . "||" . $nm_var_hint[176] . "||_self|\n";
$menu_menuData['data'] .= "item_109|...|" . $nm_var_lab[177] . "||" . $nm_var_hint[177] . "||_self|\n";
$menu_menuData['data'] .= "item_110|..|" . $nm_var_lab[178] . "||" . $nm_var_hint[178] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_ok']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_ok']) == "on")
{
    $menu_menuData['data'] .= "item_364|...|" . $nm_var_lab[179] . "|menu_form_php.php?sc_item_menu=item_364&sc_apl_menu=grid_laporan_ok&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[179] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_111|...|" . $nm_var_lab[180] . "||" . $nm_var_hint[180] . "||_self|\n";
$menu_menuData['data'] .= "item_112|...|" . $nm_var_lab[181] . "||" . $nm_var_hint[181] . "||_self|\n";
$menu_menuData['data'] .= "item_113|...|" . $nm_var_lab[182] . "||" . $nm_var_hint[182] . "||_self|\n";
$menu_menuData['data'] .= "item_114|...|" . $nm_var_lab[183] . "||" . $nm_var_hint[183] . "||_self|\n";
$menu_menuData['data'] .= "item_115|...|" . $nm_var_lab[184] . "||" . $nm_var_hint[184] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['lap_radiologi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['lap_radiologi']) == "on")
{
    $menu_menuData['data'] .= "item_116|...|" . $nm_var_lab[185] . "|menu_form_php.php?sc_item_menu=item_116&sc_apl_menu=lap_radiologi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[185] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_117|...|" . $nm_var_lab[186] . "||" . $nm_var_hint[186] . "||_self|\n";
$menu_menuData['data'] .= "item_61|...|" . $nm_var_lab[187] . "||" . $nm_var_hint[187] . "||_self|\n";
$menu_menuData['data'] .= "item_118|...|" . $nm_var_lab[188] . "||" . $nm_var_hint[188] . "||_self|\n";
$menu_menuData['data'] .= "item_66|...|" . $nm_var_lab[189] . "||" . $nm_var_hint[189] . "||_self|\n";
$menu_menuData['data'] .= "item_119|...|" . $nm_var_lab[190] . "||" . $nm_var_hint[190] . "||_self|\n";
$menu_menuData['data'] .= "item_120|...|" . $nm_var_lab[191] . "||" . $nm_var_hint[191] . "||_self|\n";
$menu_menuData['data'] .= "item_121|...|" . $nm_var_lab[192] . "||" . $nm_var_hint[192] . "||_self|\n";
$menu_menuData['data'] .= "item_122|..|" . $nm_var_lab[193] . "||" . $nm_var_hint[193] . "||_self|\n";
$menu_menuData['data'] .= "item_123|...|" . $nm_var_lab[194] . "||" . $nm_var_hint[194] . "||_self|\n";
$menu_menuData['data'] .= "item_124|...|" . $nm_var_lab[195] . "||" . $nm_var_hint[195] . "||_self|\n";
$menu_menuData['data'] .= "item_125|...|" . $nm_var_lab[196] . "||" . $nm_var_hint[196] . "||_self|\n";
$menu_menuData['data'] .= "item_126|...|" . $nm_var_lab[197] . "||" . $nm_var_hint[197] . "||_self|\n";
$menu_menuData['data'] .= "item_127|...|" . $nm_var_lab[198] . "||" . $nm_var_hint[198] . "||_self|\n";
$menu_menuData['data'] .= "item_128|...|" . $nm_var_lab[199] . "||" . $nm_var_hint[199] . "||_self|\n";
$menu_menuData['data'] .= "item_129|...|" . $nm_var_lab[200] . "||" . $nm_var_hint[200] . "||_self|\n";
$menu_menuData['data'] .= "item_154|.|" . $nm_var_lab[201] . "||" . $nm_var_hint[201] . "|grp__NM__bg__NM__bpjs.png|_self|\n";
$menu_menuData['data'] .= "item_155|..|" . $nm_var_lab[202] . "||" . $nm_var_hint[202] . "||_self|\n";
$menu_menuData['data'] .= "item_162|...|" . $nm_var_lab[203] . "||" . $nm_var_hint[203] . "||_self|\n";
$menu_menuData['data'] .= "item_156|...|" . $nm_var_lab[204] . "||" . $nm_var_hint[204] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_monitor_data_klaim']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_monitor_data_klaim']) == "on")
{
    $menu_menuData['data'] .= "item_235|...|" . $nm_var_lab[205] . "|menu_form_php.php?sc_item_menu=item_235&sc_apl_menu=form_vclaim_monitor_data_klaim&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[205] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_157|..|" . $nm_var_lab[206] . "||" . $nm_var_hint[206] . "||_self|\n";
$menu_menuData['data'] .= "item_170|...|" . $nm_var_lab[207] . "||" . $nm_var_hint[207] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_diagnosa']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_diagnosa']) == "on")
{
    $menu_menuData['data'] .= "item_226|....|" . $nm_var_lab[208] . "|menu_form_php.php?sc_item_menu=item_226&sc_apl_menu=form_eclaim_search_diagnosa&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[208] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_prosedur']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_prosedur']) == "on")
{
    $menu_menuData['data'] .= "item_227|....|" . $nm_var_lab[209] . "|menu_form_php.php?sc_item_menu=item_227&sc_apl_menu=form_eclaim_search_prosedur&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[209] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_171|...|" . $nm_var_lab[210] . "||" . $nm_var_hint[210] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_klaim_baru']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_klaim_baru']) == "on")
{
    $menu_menuData['data'] .= "item_237|....|" . $nm_var_lab[211] . "|menu_form_php.php?sc_item_menu=item_237&sc_apl_menu=form_eclaim_klaim_baru&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[211] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_238|....|" . $nm_var_lab[212] . "||" . $nm_var_hint[212] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_finalisasi_klaim']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_finalisasi_klaim']) == "on")
{
    $menu_menuData['data'] .= "item_239|....|" . $nm_var_lab[213] . "|menu_form_php.php?sc_item_menu=item_239&sc_apl_menu=form_eclaim_finalisasi_klaim&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[213] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_edit_ulang_klaim']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_edit_ulang_klaim']) == "on")
{
    $menu_menuData['data'] .= "item_240|....|" . $nm_var_lab[214] . "|menu_form_php.php?sc_item_menu=item_240&sc_apl_menu=form_eclaim_edit_ulang_klaim&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[214] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_klaim']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_klaim']) == "on")
{
    $menu_menuData['data'] .= "item_241|....|" . $nm_var_lab[215] . "|menu_form_php.php?sc_item_menu=item_241&sc_apl_menu=form_eclaim_hapus_klaim&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[215] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_172|...|" . $nm_var_lab[216] . "||" . $nm_var_hint[216] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_update_data_pasien']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_update_data_pasien']) == "on")
{
    $menu_menuData['data'] .= "item_242|....|" . $nm_var_lab[217] . "|menu_form_php.php?sc_item_menu=item_242&sc_apl_menu=form_eclaim_update_data_pasien&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[217] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_data_pasien']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_data_pasien']) == "on")
{
    $menu_menuData['data'] .= "item_243|....|" . $nm_var_lab[218] . "|menu_form_php.php?sc_item_menu=item_243&sc_apl_menu=form_eclaim_hapus_data_pasien&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[218] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_173|...|" . $nm_var_lab[219] . "||" . $nm_var_hint[219] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_01']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_01']) == "on")
{
    $menu_menuData['data'] .= "item_244|....|" . $nm_var_lab[220] . "|menu_form_php.php?sc_item_menu=item_244&sc_apl_menu=form_eclaim_grouping_stage_01&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[220] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_02']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_02']) == "on")
{
    $menu_menuData['data'] .= "item_245|....|" . $nm_var_lab[221] . "|menu_form_php.php?sc_item_menu=item_245&sc_apl_menu=form_eclaim_grouping_stage_02&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[221] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_176|...|" . $nm_var_lab[222] . "||" . $nm_var_hint[222] . "||_self|\n";
$menu_menuData['data'] .= "item_177|...|" . $nm_var_lab[223] . "||" . $nm_var_hint[223] . "||_self|\n";
$menu_menuData['data'] .= "item_178|...|" . $nm_var_lab[224] . "||" . $nm_var_hint[224] . "||_self|\n";
$menu_menuData['data'] .= "item_179|...|" . $nm_var_lab[225] . "||" . $nm_var_hint[225] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['aplicare_view_tersedia_kamar']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['aplicare_view_tersedia_kamar']) == "on")
{
    $menu_menuData['data'] .= "item_236|..|" . $nm_var_lab[226] . "|menu_form_php.php?sc_item_menu=item_236&sc_apl_menu=aplicare_view_tersedia_kamar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[226] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_158|.|" . $nm_var_lab[227] . "||" . $nm_var_hint[227] . "|scriptcase__NM__ico__NM__businessman_preferences_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_insentive']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_insentive']) == "on")
{
    $menu_menuData['data'] .= "item_281|..|" . $nm_var_lab[228] . "|menu_form_php.php?sc_item_menu=item_281&sc_apl_menu=grid_insentive&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[228] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_159|..|" . $nm_var_lab[229] . "||" . $nm_var_hint[229] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_level']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_level']) == "on")
{
    $menu_menuData['data'] .= "item_297|...|" . $nm_var_lab[230] . "|menu_form_php.php?sc_item_menu=item_297&sc_apl_menu=grid_hrm_level&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[230] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_indikator']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_indikator']) == "on")
{
    $menu_menuData['data'] .= "item_296|...|" . $nm_var_lab[231] . "|menu_form_php.php?sc_item_menu=item_296&sc_apl_menu=grid_hrm_indikator&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[231] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ga_jenis_dokumen']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ga_jenis_dokumen']) == "on")
{
    $menu_menuData['data'] .= "item_293|...|" . $nm_var_lab[232] . "|menu_form_php.php?sc_item_menu=item_293&sc_apl_menu=grid_ga_jenis_dokumen&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[232] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan']) == "on")
{
    $menu_menuData['data'] .= "item_180|...|" . $nm_var_lab[233] . "|menu_form_php.php?sc_item_menu=item_180&sc_apl_menu=grid_hrm_jabatan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[233] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_182|..|" . $nm_var_lab[234] . "||" . $nm_var_hint[234] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan']) == "on")
{
    $menu_menuData['data'] .= "item_183|...|" . $nm_var_lab[235] . "|menu_form_php.php?sc_item_menu=item_183&sc_apl_menu=grid_hrm_karyawan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[235] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan_tetap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_karyawan_tetap']) == "on")
{
    $menu_menuData['data'] .= "item_184|...|" . $nm_var_lab[236] . "|menu_form_php.php?sc_item_menu=item_184&sc_apl_menu=grid_hrm_karyawan_tetap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[236] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan_karyawan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_jabatan_karyawan']) == "on")
{
    $menu_menuData['data'] .= "item_185|...|" . $nm_var_lab[237] . "|menu_form_php.php?sc_item_menu=item_185&sc_apl_menu=grid_hrm_jabatan_karyawan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[237] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_kontrak_kerja']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_kontrak_kerja']) == "on")
{
    $menu_menuData['data'] .= "item_186|...|" . $nm_var_lab[238] . "|menu_form_php.php?sc_item_menu=item_186&sc_apl_menu=grid_hrm_kontrak_kerja&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[238] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_pendidikan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_pendidikan']) == "on")
{
    $menu_menuData['data'] .= "item_187|...|" . $nm_var_lab[239] . "|menu_form_php.php?sc_item_menu=item_187&sc_apl_menu=grid_hrm_pendidikan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[239] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_hrm']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_hrm']) == "on")
{
    $menu_menuData['data'] .= "item_188|..|" . $nm_var_lab[240] . "|menu_form_php.php?sc_item_menu=item_188&sc_apl_menu=blank_hrm&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[240] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_mesin_presensi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_mesin_presensi']) == "on")
{
    $menu_menuData['data'] .= "item_189|...|" . $nm_var_lab[241] . "|menu_form_php.php?sc_item_menu=item_189&sc_apl_menu=grid_hrm_mesin_presensi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[241] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_user_presensi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_user_presensi']) == "on")
{
    $menu_menuData['data'] .= "item_190|...|" . $nm_var_lab[242] . "|menu_form_php.php?sc_item_menu=item_190&sc_apl_menu=grid_hrm_user_presensi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[242] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_data_presensi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_data_presensi']) == "on")
{
    $menu_menuData['data'] .= "item_191|...|" . $nm_var_lab[243] . "|menu_form_php.php?sc_item_menu=item_191&sc_apl_menu=grid_hrm_data_presensi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[243] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_215|..|" . $nm_var_lab[244] . "||" . $nm_var_hint[244] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_daftar_shift']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_daftar_shift']) == "on")
{
    $menu_menuData['data'] .= "item_249|...|" . $nm_var_lab[245] . "|menu_form_php.php?sc_item_menu=item_249&sc_apl_menu=grid_hrm_daftar_shift&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[245] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_shift_karyawan']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_shift_karyawan']) == "on")
{
    $menu_menuData['data'] .= "item_250|...|" . $nm_var_lab[246] . "|menu_form_php.php?sc_item_menu=item_250&sc_apl_menu=grid_hrm_shift_karyawan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[246] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_supp_presensi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_supp_presensi']) == "on")
{
    $menu_menuData['data'] .= "item_337|...|" . $nm_var_lab[247] . "|menu_form_php.php?sc_item_menu=item_337&sc_apl_menu=grid_hrm_supp_presensi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[247] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_192|..|" . $nm_var_lab[248] . "||" . $nm_var_hint[248] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_periode_remunerasi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_periode_remunerasi']) == "on")
{
    $menu_menuData['data'] .= "item_195|...|" . $nm_var_lab[249] . "|menu_form_php.php?sc_item_menu=item_195&sc_apl_menu=grid_hrm_periode_remunerasi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[249] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tetap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tetap']) == "on")
{
    $menu_menuData['data'] .= "item_193|...|" . $nm_var_lab[250] . "|menu_form_php.php?sc_item_menu=item_193&sc_apl_menu=grid_hrm_remunerasi_tetap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[250] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tidak_tetap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_tidak_tetap']) == "on")
{
    $menu_menuData['data'] .= "item_251|...|" . $nm_var_lab[251] . "|menu_form_php.php?sc_item_menu=item_251&sc_apl_menu=grid_hrm_remunerasi_tidak_tetap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[251] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tetap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tetap']) == "on")
{
    $menu_menuData['data'] .= "item_194|...|" . $nm_var_lab[252] . "|menu_form_php.php?sc_item_menu=item_194&sc_apl_menu=grid_hrm_potongan_tetap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[252] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tidak_tetap']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_potongan_tidak_tetap']) == "on")
{
    $menu_menuData['data'] .= "item_248|...|" . $nm_var_lab[253] . "|menu_form_php.php?sc_item_menu=item_248&sc_apl_menu=grid_hrm_potongan_tidak_tetap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[253] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_overtime']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_overtime']) == "on")
{
    $menu_menuData['data'] .= "item_196|...|" . $nm_var_lab[254] . "|menu_form_php.php?sc_item_menu=item_196&sc_apl_menu=grid_hrm_overtime&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[254] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_kalkulasi_remunerasi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_kalkulasi_remunerasi']) == "on")
{
    $menu_menuData['data'] .= "item_197|...|" . $nm_var_lab[255] . "|menu_form_php.php?sc_item_menu=item_197&sc_apl_menu=form_kalkulasi_remunerasi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[255] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_pembayaran']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_remunerasi_pembayaran']) == "on")
{
    $menu_menuData['data'] .= "item_198|...|" . $nm_var_lab[256] . "|menu_form_php.php?sc_item_menu=item_198&sc_apl_menu=grid_hrm_remunerasi_pembayaran&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[256] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_286|..|" . $nm_var_lab[257] . "||" . $nm_var_hint[257] . "||_self|\n";
$menu_menuData['data'] .= "item_287|...|" . $nm_var_lab[258] . "||" . $nm_var_hint[258] . "||_self|\n";
$menu_menuData['data'] .= "item_288|...|" . $nm_var_lab[259] . "||" . $nm_var_hint[259] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ga_dokumen']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ga_dokumen']) == "on")
{
    $menu_menuData['data'] .= "item_289|...|" . $nm_var_lab[260] . "|menu_form_php.php?sc_item_menu=item_289&sc_apl_menu=grid_ga_dokumen&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[260] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_290|..|" . $nm_var_lab[261] . "||" . $nm_var_hint[261] . "||_self|\n";
$menu_menuData['data'] .= "item_291|...|" . $nm_var_lab[262] . "||" . $nm_var_hint[262] . "||_self|\n";
$menu_menuData['data'] .= "item_292|...|" . $nm_var_lab[263] . "||" . $nm_var_hint[263] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_acc']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_acc']) == "on")
{
    $menu_menuData['data'] .= "item_160|.|" . $nm_var_lab[264] . "|menu_form_php.php?sc_item_menu=item_160&sc_apl_menu=blank_acc&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[264] . "|scriptcase__NM__ico__NM__money2_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_161|..|" . $nm_var_lab[265] . "||" . $nm_var_hint[265] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_akun_header']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_akun_header']) == "on")
{
    $menu_menuData['data'] .= "item_202|...|" . $nm_var_lab[266] . "|menu_form_php.php?sc_item_menu=item_202&sc_apl_menu=grid_akun_header&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[266] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_akun']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_akun']) == "on")
{
    $menu_menuData['data'] .= "item_203|...|" . $nm_var_lab[267] . "|menu_form_php.php?sc_item_menu=item_203&sc_apl_menu=grid_akun&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[267] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jenis_transaksi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_jenis_transaksi']) == "on")
{
    $menu_menuData['data'] .= "item_204|...|" . $nm_var_lab[268] . "|menu_form_php.php?sc_item_menu=item_204&sc_apl_menu=grid_jenis_transaksi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[268] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_map_transaksi_jurnal']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_map_transaksi_jurnal']) == "on")
{
    $menu_menuData['data'] .= "item_205|...|" . $nm_var_lab[269] . "|menu_form_php.php?sc_item_menu=item_205&sc_apl_menu=grid_map_transaksi_jurnal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[269] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_199|..|" . $nm_var_lab[270] . "||" . $nm_var_hint[270] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_buku_hutang']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_buku_hutang']) == "on")
{
    $menu_menuData['data'] .= "item_303|...|" . $nm_var_lab[271] . "|menu_form_php.php?sc_item_menu=item_303&sc_apl_menu=grid_buku_hutang&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[271] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_buku_piutang']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_buku_piutang']) == "on")
{
    $menu_menuData['data'] .= "item_304|...|" . $nm_var_lab[272] . "|menu_form_php.php?sc_item_menu=item_304&sc_apl_menu=grid_buku_piutang&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[272] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_jurnal_transaksi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_jurnal_transaksi']) == "on")
{
    $menu_menuData['data'] .= "item_214|...|" . $nm_var_lab[273] . "|menu_form_php.php?sc_item_menu=item_214&sc_apl_menu=form_jurnal_transaksi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[273] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal_master']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_jurnal_master']) == "on")
{
    $menu_menuData['data'] .= "item_200|...|" . $nm_var_lab[274] . "|menu_form_php.php?sc_item_menu=item_200&sc_apl_menu=grid_jurnal_master&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[274] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_201|..|" . $nm_var_lab[275] . "||" . $nm_var_hint[275] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_journal_summary']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_journal_summary']) == "on")
{
    $menu_menuData['data'] .= "item_206|...|" . $nm_var_lab[276] . "|menu_form_php.php?sc_item_menu=item_206&sc_apl_menu=form_period_journal_summary&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[276] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_general_ledger_summary']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_general_ledger_summary']) == "on")
{
    $menu_menuData['data'] .= "item_207|...|" . $nm_var_lab[277] . "|menu_form_php.php?sc_item_menu=item_207&sc_apl_menu=form_period_general_ledger_summary&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[277] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_piutang']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_piutang']) == "on")
{
    $menu_menuData['data'] .= "item_208|...|" . $nm_var_lab[278] . "|menu_form_php.php?sc_item_menu=item_208&sc_apl_menu=form_period_rincian_piutang&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[278] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_utang']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_utang']) == "on")
{
    $menu_menuData['data'] .= "item_209|...|" . $nm_var_lab[279] . "|menu_form_php.php?sc_item_menu=item_209&sc_apl_menu=form_period_rincian_utang&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[279] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_neraca']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_neraca']) == "on")
{
    $menu_menuData['data'] .= "item_211|...|" . $nm_var_lab[280] . "|menu_form_php.php?sc_item_menu=item_211&sc_apl_menu=form_period_neraca&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[280] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_operasional']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_operasional']) == "on")
{
    $menu_menuData['data'] .= "item_210|...|" . $nm_var_lab[281] . "|menu_form_php.php?sc_item_menu=item_210&sc_apl_menu=form_period_operasional&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[281] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_perubahan_ekuitas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_perubahan_ekuitas']) == "on")
{
    $menu_menuData['data'] .= "item_213|...|" . $nm_var_lab[282] . "|menu_form_php.php?sc_item_menu=item_213&sc_apl_menu=form_period_perubahan_ekuitas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[282] . "||" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_131|.|" . $_SESSION['usr_name'] . "||" . $_SESSION['usr_name'] . "|scriptcase__NM__ico__NM__user_information_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['change_password_it']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['change_password_it']) == "on")
{
    $menu_menuData['data'] .= "item_278|..|" . $nm_var_lab[283] . "|menu_form_php.php?sc_item_menu=item_278&sc_apl_menu=change_password_it&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[283] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users']) == "on")
{
    $menu_menuData['data'] .= "item_132|..|" . $this->Nm_lang['lang_list_users'] . "|menu_form_php.php?sc_item_menu=item_132&sc_apl_menu=sec_grid_sec_users&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_users'] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_apps']) == "on")
{
    $menu_menuData['data'] .= "item_133|..|" . $this->Nm_lang['lang_list_apps'] . "|menu_form_php.php?sc_item_menu=item_133&sc_apl_menu=sec_grid_sec_apps&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_apps'] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_groups']) == "on")
{
    $menu_menuData['data'] .= "item_134|..|" . $this->Nm_lang['lang_list_groups'] . "|menu_form_php.php?sc_item_menu=item_134&sc_apl_menu=sec_grid_sec_groups&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_groups'] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_grid_sec_users_groups']) == "on")
{
    $menu_menuData['data'] .= "item_141|..|" . $this->Nm_lang['lang_list_users_x_groups'] . "|menu_form_php.php?sc_item_menu=item_141&sc_apl_menu=sec_grid_sec_users_groups&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_users_x_groups'] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_search_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_search_sec_groups']) == "on")
{
    $menu_menuData['data'] .= "item_135|..|" . $this->Nm_lang['lang_list_apps_x_groups'] . "|menu_form_php.php?sc_item_menu=item_135&sc_apl_menu=sec_search_sec_groups&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_apps_x_groups'] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_sync_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_sync_apps']) == "on")
{
    $menu_menuData['data'] .= "item_136|..|" . $this->Nm_lang['lang_list_sync_apps'] . "|menu_form_php.php?sc_item_menu=item_136&sc_apl_menu=sec_sync_apps&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_sync_apps'] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_logged_users']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_logged_users']) == "on")
{
    $menu_menuData['data'] .= "item_139|..|" . $this->Nm_lang['lang_logged_users'] . "|menu_form_php.php?sc_item_menu=item_139&sc_apl_menu=sec_logged_users&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_logged_users'] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_change_pswd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_change_pswd']) == "on")
{
    $menu_menuData['data'] .= "item_137|..|" . $this->Nm_lang['lang_change_pswd'] . "|menu_form_php.php?sc_item_menu=item_137&sc_apl_menu=sec_change_pswd&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_change_pswd'] . "||" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_Login']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_Login']) == "on")
{
    $menu_menuData['data'] .= "item_138|..|" . $this->Nm_lang['lang_exit'] . "|menu_form_php.php?sc_item_menu=item_138&sc_apl_menu=sec_Login&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_exit'] . "||" . $this->menu_target('_parent') . "|" . "\n";
}


$menu_menuData['data'] = array();
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__add_32.png";
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
$menu_menuData['data'][] = array(
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
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
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
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_284&sc_apl_menu=grid_tbantrian&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[2] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[2] . "",
        'id'       => "item_284",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_284",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_285&sc_apl_menu=grid_antrian&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[3] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[3] . "",
        'id'       => "item_285",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_285",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_1&sc_apl_menu=grid_tbadmrawatinap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[4] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[4] . "",
        'id'       => "item_1",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_1",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_341&sc_apl_menu=grid_hisdetailrawatinap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hisdetailrawatinap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hisdetailrawatinap']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[5] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[5] . "",
        'id'       => "item_341",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_341",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_5&sc_apl_menu=grid_ketersediaan_bed&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[6] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[6] . "",
        'id'       => "item_5",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_5",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[7] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[7] . "",
    'id'       => "item_12",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_12",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[8] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[8] . "",
    'id'       => "item_382",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_382",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_10&sc_apl_menu=tabs_pembayaran&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_pembayaran']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_pembayaran']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[9] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[9] . "",
        'id'       => "item_10",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_10",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_272&sc_apl_menu=calendar_tbcustomer&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['calendar_tbcustomer']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['calendar_tbcustomer']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['calendar']['active']))
    {
        $str_icon = $arr_menuicons['calendar']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['calendar']['active']))
    {
        $icon_aba = $arr_menuicons['calendar']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['calendar']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['calendar']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[10] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[10] . "",
        'id'       => "item_272",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_272",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_300&sc_apl_menu=grid_tbpembatalan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpembatalan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpembatalan']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[11] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[11] . "",
        'id'       => "item_300",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_300",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_6&sc_apl_menu=tabs_hargaTind&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_hargaTind']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_hargaTind']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[12] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[12] . "",
        'id'       => "item_6",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_6",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_294&sc_apl_menu=billing_casemanager&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['billing_casemanager']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['billing_casemanager']) != "on")
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
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[13] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[13] . "",
        'id'       => "item_294",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_294",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_295&sc_apl_menu=berkas_klaim_elek&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['berkas_klaim_elek']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['berkas_klaim_elek']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[14] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[14] . "",
        'id'       => "item_295",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_295",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[15] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[15] . "",
    'id'       => "item_15",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_15",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_273&sc_apl_menu=grid_tbreqitem&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbreqitem']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbreqitem']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[16] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[16] . "",
        'id'       => "item_273",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_273",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[17] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[17] . "",
    'id'       => "item_383",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_383",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_16&sc_apl_menu=tabs_Poli&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_Poli']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_Poli']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[18] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[18] . "",
        'id'       => "item_16",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_16",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_17&sc_apl_menu=tabs_RI&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_RI']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_RI']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[19] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[19] . "",
        'id'       => "item_17",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_17",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_18&sc_apl_menu=tabsIGD&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabsIGD']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabsIGD']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[20] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[20] . "",
        'id'       => "item_18",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_18",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[21] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[21] . "",
    'id'       => "item_384",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_384",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_20&sc_apl_menu=tabsOK&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabsOK']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabsOK']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[22] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[22] . "",
        'id'       => "item_20",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_20",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_358&sc_apl_menu=grid_tbhais&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbhais']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbhais']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[23] . "",
        'level'    => "4",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[23] . "",
        'id'       => "item_358",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_358",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_21&sc_apl_menu=tabs_VK&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_VK']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_VK']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[24] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[24] . "",
        'id'       => "item_21",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_21",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_330&sc_apl_menu=tabsEndos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabsEndos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabsEndos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[25] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[25] . "",
        'id'       => "item_330",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_330",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_23&sc_apl_menu=tabs_Lab&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_Lab']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_Lab']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[26] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[26] . "",
        'id'       => "item_23",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_23",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_255&sc_apl_menu=tabs_radiologi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_radiologi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_radiologi']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[27] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[27] . "",
        'id'       => "item_255",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_255",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[28] . "",
    'level'    => "3",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[28] . "",
    'id'       => "item_33",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_33",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[29] . "",
    'level'    => "4",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[29] . "",
    'id'       => "item_334",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_334",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_265&sc_apl_menu=tabsRM&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabsRM']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabsRM']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[30] . "",
        'level'    => "4",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[30] . "",
        'id'       => "item_265",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_265",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_28&sc_apl_menu=tabsMappingICD&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabsMappingICD']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabsMappingICD']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[31] . "",
        'level'    => "4",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[31] . "",
        'id'       => "item_28",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_28",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[32] . "",
    'level'    => "4",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[32] . "",
    'id'       => "item_346",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_346",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_343&sc_apl_menu=grid_lap_demo_jk&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_jk']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_jk']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[33] . "",
        'level'    => "5",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[33] . "",
        'id'       => "item_343",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_343",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_344&sc_apl_menu=grid_lap_demo_agama&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_agama']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_agama']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[34] . "",
        'level'    => "5",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[34] . "",
        'id'       => "item_344",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_344",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_347&sc_apl_menu=grid_lap_demo_edu&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_edu']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_edu']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[35] . "",
        'level'    => "5",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[35] . "",
        'id'       => "item_347",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_347",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_348&sc_apl_menu=grid_lap_demo_age&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_age']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_age']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[36] . "",
        'level'    => "5",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[36] . "",
        'id'       => "item_348",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_348",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[37] . "",
    'level'    => "4",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[37] . "",
    'id'       => "item_349",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_349",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_350&sc_apl_menu=grid_lap_demo_top_diag&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[38] . "",
        'level'    => "5",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[38] . "",
        'id'       => "item_350",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_350",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_351&sc_apl_menu=grid_lap_demo_top_diag_ri&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag_ri']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_demo_top_diag_ri']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[39] . "",
        'level'    => "5",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[39] . "",
        'id'       => "item_351",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_351",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_375&sc_apl_menu=grid_diagnosa_detail&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_diagnosa_detail']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_diagnosa_detail']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[40] . "",
        'level'    => "5",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[40] . "",
        'id'       => "item_375",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_375",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_352&sc_apl_menu=report_Lab&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['report_Lab']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['report_Lab']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[41] . "",
        'level'    => "4",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[41] . "",
        'id'       => "item_352",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_352",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_335&sc_apl_menu=rekapitulasi_ri&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['rekapitulasi_ri']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['rekapitulasi_ri']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[42] . "",
        'level'    => "4",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[42] . "",
        'id'       => "item_335",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_335",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[43] . "",
    'level'    => "3",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[43] . "",
    'id'       => "item_35",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_35",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_378&sc_apl_menu=grid_tbadjustment&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadjustment']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbadjustment']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[44] . "",
        'level'    => "4",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[44] . "",
        'id'       => "item_378",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_378",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_305&sc_apl_menu=form_tbobat_batch&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tbobat_batch']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tbobat_batch']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['form']['active']))
    {
        $str_icon = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[45] . "",
        'level'    => "4",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[45] . "",
        'id'       => "item_305",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_305",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_298&sc_apl_menu=form_tbstockobat&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tbstockobat']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tbstockobat']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['form']['active']))
    {
        $str_icon = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[46] . "",
        'level'    => "4",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[46] . "",
        'id'       => "item_298",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_298",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_266&sc_apl_menu=tabs_Farm&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_Farm']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_Farm']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[47] . "",
        'level'    => "4",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[47] . "",
        'id'       => "item_266",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_266",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[48] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[48] . "",
    'id'       => "item_270",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_270",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_354&sc_apl_menu=grid_lap_logistik&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_logistik']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_logistik']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[49] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[49] . "",
        'id'       => "item_354",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_354",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_37&sc_apl_menu=tabs_Logistik&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['tabs_Logistik']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['tabs_Logistik']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['aba']['active']))
    {
        $str_icon = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['aba']['active']))
    {
        $icon_aba = $arr_menuicons['aba']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['aba']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['aba']['inactive'];
    }
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[50] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[50] . "",
        'id'       => "item_37",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_37",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_365&sc_apl_menu=grid_status_pembelian&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_status_pembelian']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_status_pembelian']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[51] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[51] . "",
        'id'       => "item_365",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_365",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_39&sc_apl_menu=grid_tbstockopname&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[52] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[52] . "",
        'id'       => "item_39",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_39",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_275&sc_apl_menu=grid_tbreturlog&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbreturlog']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbreturlog']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[53] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[53] . "",
        'id'       => "item_275",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_275",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[54] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[54] . "",
    'id'       => "item_308",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_308",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_309&sc_apl_menu=grid_usulanpengadaan_gizi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usulanpengadaan_gizi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_usulanpengadaan_gizi']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[55] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[55] . "",
        'id'       => "item_309",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_309",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_310&sc_apl_menu=grid_approvalusulanpengadaan_gizi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_approvalusulanpengadaan_gizi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_approvalusulanpengadaan_gizi']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[56] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[56] . "",
        'id'       => "item_310",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_310",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_311&sc_apl_menu=grid_detailrawatinap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detailrawatinap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detailrawatinap']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[57] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[57] . "",
        'id'       => "item_311",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_311",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[58] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[58] . "",
    'id'       => "item_316",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_316",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[59] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[59] . "",
    'id'       => "item_312",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_312",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__book_green_32.png";
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[60] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[60] . "",
    'id'       => "item_41",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_41",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[61] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[61] . "",
    'id'       => "item_42",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_42",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_43&sc_apl_menu=grid_tbobat&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[62] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[62] . "",
        'id'       => "item_43",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_43",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_44&sc_apl_menu=grid_tbformulaobat&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbformulaobat']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbformulaobat']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[63] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[63] . "",
        'id'       => "item_44",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_44",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[64] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[64] . "",
    'id'       => "item_47",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_47",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_299&sc_apl_menu=grid_tbfornas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbfornas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbfornas']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[65] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[65] . "",
        'id'       => "item_299",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_299",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_45&sc_apl_menu=grid_tbgolonganobat&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[66] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[66] . "",
        'id'       => "item_45",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_45",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_271&sc_apl_menu=grid_tbcaraminum&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[67] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[67] . "",
        'id'       => "item_271",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_271",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_52&sc_apl_menu=grid_tbsigna&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsigna']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsigna']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[68] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[68] . "",
        'id'       => "item_52",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_52",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_53&sc_apl_menu=grid_tbsatuan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsatuan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsatuan']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[69] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[69] . "",
        'id'       => "item_53",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_53",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_274&sc_apl_menu=grid_tbdepo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdepo']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbdepo']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[70] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[70] . "",
        'id'       => "item_274",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_274",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_379&sc_apl_menu=grid_tbjenisadjustment&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisadjustment']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisadjustment']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[71] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[71] . "",
        'id'       => "item_379",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_379",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[72] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[72] . "",
    'id'       => "item_315",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_315",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_313&sc_apl_menu=grid_bahan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_bahan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_bahan']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[73] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[73] . "",
        'id'       => "item_313",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_313",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_318&sc_apl_menu=grid_jenisbahan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_jenisbahan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_jenisbahan']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[74] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[74] . "",
        'id'       => "item_318",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_318",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_319&sc_apl_menu=grid_kategoribahan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_kategoribahan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_kategoribahan']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[75] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[75] . "",
        'id'       => "item_319",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_319",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_314&sc_apl_menu=grid_set_gizi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_set_gizi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_set_gizi']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[76] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[76] . "",
        'id'       => "item_314",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_314",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_320&sc_apl_menu=grid_set_menu&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_set_menu']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_set_menu']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[77] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[77] . "",
        'id'       => "item_320",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_320",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[78] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[78] . "",
    'id'       => "item_48",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_48",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_130&sc_apl_menu=grid_tbpoli&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[79] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[79] . "",
        'id'       => "item_130",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_130",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_49&sc_apl_menu=grid_tbpbf&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[80] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[80] . "",
        'id'       => "item_49",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_49",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_301&sc_apl_menu=grid_tbjenispembatalan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenispembatalan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenispembatalan']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[81] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[81] . "",
        'id'       => "item_301",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_301",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_50&sc_apl_menu=grid_tbinstansi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[82] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[82] . "",
        'id'       => "item_50",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_50",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_54&sc_apl_menu=grid_tbbank&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbbank']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbbank']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[83] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[83] . "",
        'id'       => "item_54",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_54",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[84] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[84] . "",
    'id'       => "item_55",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_55",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[85] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[85] . "",
    'id'       => "item_56",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_56",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_57&sc_apl_menu=grid_tbbu&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[86] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[86] . "",
        'id'       => "item_57",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_57",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_58&sc_apl_menu=grid_tbgelardokter&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[87] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[87] . "",
        'id'       => "item_58",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_58",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[88] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[88] . "",
    'id'       => "item_59",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_59",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[89] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[89] . "",
    'id'       => "item_60",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_60",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[90] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[90] . "",
    'id'       => "item_62",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_62",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_63&sc_apl_menu=grid_tbdoctor&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[91] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[91] . "",
        'id'       => "item_63",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_63",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_64&sc_apl_menu=grid_tbcustomer&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[92] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[92] . "",
        'id'       => "item_64",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_64",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_143&sc_apl_menu=grid_tbhrd&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[93] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[93] . "",
        'id'       => "item_143",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_143",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[94] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[94] . "",
    'id'       => "item_67",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_67",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_68&sc_apl_menu=grid_tbtindakan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[95] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[95] . "",
        'id'       => "item_68",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_68",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_283&sc_apl_menu=grid_tbsettindakan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsettindakan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbsettindakan']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[96] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[96] . "",
        'id'       => "item_283",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_283",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_336&sc_apl_menu=grid_tbclinicalpathway&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbclinicalpathway']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbclinicalpathway']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[97] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[97] . "",
        'id'       => "item_336",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_336",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_70&sc_apl_menu=grid_tbradiologi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi']) != "on")
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
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[98] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[98] . "",
        'id'       => "item_70",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_70",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_257&sc_apl_menu=grid_tbjenisradiologi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisradiologi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbjenisradiologi']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[99] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[99] . "",
        'id'       => "item_257",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_257",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_151&sc_apl_menu=grid_tbradiologi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbradiologi']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[100] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[100] . "",
        'id'       => "item_151",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_151",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_150&sc_apl_menu=grid_tblab&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tblab']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tblab']) != "on")
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
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[101] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[101] . "",
        'id'       => "item_150",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_150",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_253&sc_apl_menu=grid_tblabcategory&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tblabcategory']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tblabcategory']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[102] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[102] . "",
        'id'       => "item_253",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_253",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_152&sc_apl_menu=grid_tblabrate&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tblabrate']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tblabrate']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[103] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[103] . "",
        'id'       => "item_152",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_152",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_72&sc_apl_menu=grid_tbkelas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[104] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[104] . "",
        'id'       => "item_72",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_72",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_144&sc_apl_menu=grid_tbruang&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[105] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[105] . "",
        'id'       => "item_144",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_144",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_317&sc_apl_menu=grid_tbfuncroom&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbfuncroom']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbfuncroom']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[106] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[106] . "",
        'id'       => "item_317",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_317",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[107] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[107] . "",
    'id'       => "item_73",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_73",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[108] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[108] . "",
    'id'       => "item_74",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_74",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[109] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[109] . "",
    'id'       => "item_75",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_75",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[110] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[110] . "",
    'id'       => "item_76",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_76",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[111] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[111] . "",
    'id'       => "item_77",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_77",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[112] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[112] . "",
    'id'       => "item_78",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_78",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_340&sc_apl_menu=grid_tbpaket&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaket']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tbpaket']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[113] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[113] . "",
        'id'       => "item_340",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_340",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_79&sc_apl_menu=grid_tbadministrasi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[114] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[114] . "",
        'id'       => "item_79",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_79",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[115] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[115] . "",
    'id'       => "item_80",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_80",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[116] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[116] . "",
    'id'       => "item_81",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_81",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[117] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[117] . "",
    'id'       => "item_82",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_82",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[118] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[118] . "",
    'id'       => "item_83",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_83",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[119] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[119] . "",
    'id'       => "item_84",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_84",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[120] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[120] . "",
    'id'       => "item_85",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_85",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__briefcase2_32.png";
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[121] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[121] . "",
    'id'       => "item_86",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_86",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_385&sc_apl_menu=control_summary_pend&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[122] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[122] . "",
        'id'       => "item_385",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_385",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_386&sc_apl_menu=control_summary_pend_ranap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend_ranap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_summary_pend_ranap']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[123] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[123] . "",
        'id'       => "item_386",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_386",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_282&sc_apl_menu=dashboard&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['container']['active']))
    {
        $str_icon = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['container']['active']))
    {
        $icon_aba = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['container']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['container']['inactive'];
    }
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[124] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[124] . "",
        'id'       => "item_282",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_282",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_377&sc_apl_menu=bed_occupacy_rate&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['bed_occupacy_rate']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['bed_occupacy_rate']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['chart']['active']))
    {
        $str_icon = $arr_menuicons['chart']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['chart']['active']))
    {
        $icon_aba = $arr_menuicons['chart']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['chart']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['chart']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[125] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[125] . "",
        'id'       => "item_377",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_377",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_380&sc_apl_menu=av_los&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['av_los']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['av_los']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['chart']['active']))
    {
        $str_icon = $arr_menuicons['chart']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['chart']['active']))
    {
        $icon_aba = $arr_menuicons['chart']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['chart']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['chart']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[126] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[126] . "",
        'id'       => "item_380",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_380",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[127] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[127] . "",
    'id'       => "item_369",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_369",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_368&sc_apl_menu=dashboard_stat_igd&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_igd']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_igd']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['container']['active']))
    {
        $str_icon = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['container']['active']))
    {
        $icon_aba = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['container']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['container']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[128] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[128] . "",
        'id'       => "item_368",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_368",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_367&sc_apl_menu=dashboard_stat_poli&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_poli']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_poli']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['container']['active']))
    {
        $str_icon = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['container']['active']))
    {
        $icon_aba = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['container']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['container']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[129] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[129] . "",
        'id'       => "item_367",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_367",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_366&sc_apl_menu=dashboard_stat_ranap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_ranap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_ranap']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['container']['active']))
    {
        $str_icon = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['container']['active']))
    {
        $icon_aba = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['container']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['container']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[130] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[130] . "",
        'id'       => "item_366",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_366",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_376&sc_apl_menu=grid_grafik_kematian&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_grafik_kematian']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_grafik_kematian']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[131] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[131] . "",
        'id'       => "item_376",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_376",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[132] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[132] . "",
    'id'       => "item_370",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_370",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[133] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[133] . "",
    'id'       => "item_371",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_371",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_372&sc_apl_menu=dashboard_stat_lab&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_lab']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard_stat_lab']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($str_icon) && isset($arr_menuicons['container']['active']))
    {
        $str_icon = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba) && isset($arr_menuicons['container']['active']))
    {
        $icon_aba = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['container']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['container']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[134] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[134] . "",
        'id'       => "item_372",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_372",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[135] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[135] . "",
    'id'       => "item_373",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_373",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_87&sc_apl_menu=grid_eis_rajal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_eis_rajal']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_eis_rajal']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[136] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[136] . "",
        'id'       => "item_87",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_87",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[137] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[137] . "",
    'id'       => "item_88",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_88",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[138] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[138] . "",
    'id'       => "item_89",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_89",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_345&sc_apl_menu=grid_resep_keluar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_resep_keluar']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_resep_keluar']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[139] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[139] . "",
        'id'       => "item_345",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_345",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__cabinet_32.png";
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[140] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[140] . "",
    'id'       => "item_90",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_90",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[141] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[141] . "",
    'id'       => "item_91",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_91",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[142] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[142] . "",
    'id'       => "item_359",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_359",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_339&sc_apl_menu=grid_lap_kasir_per_shift&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_kasir_per_shift']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_kasir_per_shift']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[143] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[143] . "",
        'id'       => "item_339",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_339",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_338&sc_apl_menu=grid_lap_bill_ranap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_bill_ranap']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_bill_ranap']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[144] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[144] . "",
        'id'       => "item_338",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_338",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[145] . "",
    'level'    => "3",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[145] . "",
    'id'       => "item_95",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_95",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[146] . "",
    'level'    => "3",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[146] . "",
    'id'       => "item_96",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_96",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_325&sc_apl_menu=rekapKeseluruhan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[147] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[147] . "",
        'id'       => "item_325",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_325",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_321&sc_apl_menu=rekapKeseluruhan_master&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[148] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[148] . "",
        'id'       => "item_321",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_321",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_353&sc_apl_menu=rekapKeseluruhan_master_ri&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master_ri']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['rekapKeseluruhan_master_ri']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[149] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[149] . "",
        'id'       => "item_353",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_353",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_327&sc_apl_menu=reportKasir&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['reportKasir']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['reportKasir']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[150] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[150] . "",
        'id'       => "item_327",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_327",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_328&sc_apl_menu=Laporan_Stok_Persediaan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Laporan_Stok_Persediaan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['Laporan_Stok_Persediaan']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[151] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[151] . "",
        'id'       => "item_328",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_328",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[152] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[152] . "",
    'id'       => "item_360",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_360",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_374&sc_apl_menu=grid_evaluasi_penerimaan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_evaluasi_penerimaan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_evaluasi_penerimaan']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[153] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[153] . "",
        'id'       => "item_374",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_374",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_381&sc_apl_menu=grid_laporan_mutasi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_mutasi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_mutasi']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[154] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[154] . "",
        'id'       => "item_381",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_381",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_362&sc_apl_menu=fast_slow_moving&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['fast_slow_moving']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['fast_slow_moving']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[155] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[155] . "",
        'id'       => "item_362",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_362",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_333&sc_apl_menu=stok_terkini&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['stok_terkini']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['stok_terkini']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[156] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[156] . "",
        'id'       => "item_333",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_333",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_329&sc_apl_menu=kartu_stok&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['kartu_stok']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['kartu_stok']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[157] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[157] . "",
        'id'       => "item_329",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_329",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_331&sc_apl_menu=laporan_obat_all&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['laporan_obat_all']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['laporan_obat_all']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[158] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[158] . "",
        'id'       => "item_331",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_331",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_356&sc_apl_menu=lap_grid_logistik_single&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['lap_grid_logistik_single']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['lap_grid_logistik_single']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[159] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[159] . "",
        'id'       => "item_356",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_356",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_355&sc_apl_menu=lap_grid_tbpo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['lap_grid_tbpo']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['lap_grid_tbpo']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[160] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[160] . "",
        'id'       => "item_355",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_355",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_332&sc_apl_menu=top_sale_obat&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['top_sale_obat']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['top_sale_obat']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[161] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[161] . "",
        'id'       => "item_332",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_332",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[162] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[162] . "",
    'id'       => "item_361",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_361",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_357&sc_apl_menu=grid_lap_gizi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_gizi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_lap_gizi']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[163] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[163] . "",
        'id'       => "item_357",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_357",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_326&sc_apl_menu=grid_penjualan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_penjualan']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_penjualan']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[164] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[164] . "",
        'id'       => "item_326",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_326",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[165] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[165] . "",
    'id'       => "item_94",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_94",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[166] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[166] . "",
    'id'       => "item_98",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_98",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[167] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[167] . "",
    'id'       => "item_99",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_99",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[168] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[168] . "",
    'id'       => "item_100",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_100",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[169] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[169] . "",
    'id'       => "item_101",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_101",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[170] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[170] . "",
    'id'       => "item_102",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_102",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[171] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[171] . "",
    'id'       => "item_103",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_103",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[172] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[172] . "",
    'id'       => "item_104",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_104",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[173] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[173] . "",
    'id'       => "item_105",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_105",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[174] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[174] . "",
    'id'       => "item_106",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_106",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[175] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[175] . "",
    'id'       => "item_107",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_107",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[176] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[176] . "",
    'id'       => "item_108",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_108",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[177] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[177] . "",
    'id'       => "item_109",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_109",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[178] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[178] . "",
    'id'       => "item_110",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_110",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_364&sc_apl_menu=grid_laporan_ok&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_ok']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_laporan_ok']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[179] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[179] . "",
        'id'       => "item_364",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_364",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[180] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[180] . "",
    'id'       => "item_111",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_111",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[181] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[181] . "",
    'id'       => "item_112",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_112",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[182] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[182] . "",
    'id'       => "item_113",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_113",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[183] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[183] . "",
    'id'       => "item_114",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_114",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[184] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[184] . "",
    'id'       => "item_115",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_115",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_116&sc_apl_menu=lap_radiologi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['lap_radiologi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['lap_radiologi']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[185] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[185] . "",
        'id'       => "item_116",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_116",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[186] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[186] . "",
    'id'       => "item_117",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_117",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[187] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[187] . "",
    'id'       => "item_61",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_61",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[188] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[188] . "",
    'id'       => "item_118",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_118",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[189] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[189] . "",
    'id'       => "item_66",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_66",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[190] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[190] . "",
    'id'       => "item_119",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_119",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[191] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[191] . "",
    'id'       => "item_120",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_120",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[192] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[192] . "",
    'id'       => "item_121",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_121",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[193] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[193] . "",
    'id'       => "item_122",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_122",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[194] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[194] . "",
    'id'       => "item_123",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_123",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[195] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[195] . "",
    'id'       => "item_124",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_124",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[196] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[196] . "",
    'id'       => "item_125",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_125",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[197] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[197] . "",
    'id'       => "item_126",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_126",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[198] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[198] . "",
    'id'       => "item_127",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_127",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[199] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[199] . "",
    'id'       => "item_128",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_128",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[200] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[200] . "",
    'id'       => "item_129",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_129",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "grp__NM__bg__NM__bpjs.png";
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[201] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[201] . "",
    'id'       => "item_154",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_154",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[202] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[202] . "",
    'id'       => "item_155",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_155",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[203] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[203] . "",
    'id'       => "item_162",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_162",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[204] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[204] . "",
    'id'       => "item_156",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_156",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_235&sc_apl_menu=form_vclaim_monitor_data_klaim&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_monitor_data_klaim']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_vclaim_monitor_data_klaim']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[205] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[205] . "",
        'id'       => "item_235",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_235",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[206] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[206] . "",
    'id'       => "item_157",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_157",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[207] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[207] . "",
    'id'       => "item_170",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_170",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_226&sc_apl_menu=form_eclaim_search_diagnosa&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_diagnosa']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_diagnosa']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[208] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[208] . "",
        'id'       => "item_226",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_226",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_227&sc_apl_menu=form_eclaim_search_prosedur&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_prosedur']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_search_prosedur']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[209] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[209] . "",
        'id'       => "item_227",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_227",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[210] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[210] . "",
    'id'       => "item_171",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_171",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_237&sc_apl_menu=form_eclaim_klaim_baru&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_klaim_baru']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_klaim_baru']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[211] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[211] . "",
        'id'       => "item_237",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_237",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[212] . "",
    'level'    => "3",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[212] . "",
    'id'       => "item_238",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_238",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_239&sc_apl_menu=form_eclaim_finalisasi_klaim&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_finalisasi_klaim']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_finalisasi_klaim']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[213] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[213] . "",
        'id'       => "item_239",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_239",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_240&sc_apl_menu=form_eclaim_edit_ulang_klaim&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_edit_ulang_klaim']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_edit_ulang_klaim']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[214] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[214] . "",
        'id'       => "item_240",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_240",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_241&sc_apl_menu=form_eclaim_hapus_klaim&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_klaim']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_klaim']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[215] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[215] . "",
        'id'       => "item_241",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_241",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[216] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[216] . "",
    'id'       => "item_172",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_172",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_242&sc_apl_menu=form_eclaim_update_data_pasien&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_update_data_pasien']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_update_data_pasien']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[217] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[217] . "",
        'id'       => "item_242",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_242",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_243&sc_apl_menu=form_eclaim_hapus_data_pasien&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_data_pasien']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_hapus_data_pasien']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[218] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[218] . "",
        'id'       => "item_243",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_243",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[219] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[219] . "",
    'id'       => "item_173",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_173",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_244&sc_apl_menu=form_eclaim_grouping_stage_01&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_01']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_01']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[220] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[220] . "",
        'id'       => "item_244",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_244",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_245&sc_apl_menu=form_eclaim_grouping_stage_02&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_02']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_eclaim_grouping_stage_02']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[221] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[221] . "",
        'id'       => "item_245",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_245",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[222] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[222] . "",
    'id'       => "item_176",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_176",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[223] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[223] . "",
    'id'       => "item_177",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_177",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[224] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[224] . "",
    'id'       => "item_178",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_178",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[225] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[225] . "",
    'id'       => "item_179",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_179",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_236&sc_apl_menu=aplicare_view_tersedia_kamar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[226] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[226] . "",
        'id'       => "item_236",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_236",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__businessman_preferences_32.png";
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[227] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[227] . "",
    'id'       => "item_158",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_158",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_281&sc_apl_menu=grid_insentive&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_insentive']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_insentive']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[228] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[228] . "",
        'id'       => "item_281",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_281",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[229] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[229] . "",
    'id'       => "item_159",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_159",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_297&sc_apl_menu=grid_hrm_level&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_level']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_level']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[230] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[230] . "",
        'id'       => "item_297",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_297",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_296&sc_apl_menu=grid_hrm_indikator&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_indikator']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_indikator']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[231] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[231] . "",
        'id'       => "item_296",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_296",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_293&sc_apl_menu=grid_ga_jenis_dokumen&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ga_jenis_dokumen']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ga_jenis_dokumen']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[232] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[232] . "",
        'id'       => "item_293",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_293",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_180&sc_apl_menu=grid_hrm_jabatan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[233] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[233] . "",
        'id'       => "item_180",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_180",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[234] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[234] . "",
    'id'       => "item_182",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_182",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_183&sc_apl_menu=grid_hrm_karyawan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[235] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[235] . "",
        'id'       => "item_183",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_183",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_184&sc_apl_menu=grid_hrm_karyawan_tetap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[236] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[236] . "",
        'id'       => "item_184",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_184",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_185&sc_apl_menu=grid_hrm_jabatan_karyawan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[237] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[237] . "",
        'id'       => "item_185",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_185",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_186&sc_apl_menu=grid_hrm_kontrak_kerja&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[238] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[238] . "",
        'id'       => "item_186",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_186",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_187&sc_apl_menu=grid_hrm_pendidikan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[239] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[239] . "",
        'id'       => "item_187",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_187",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_188&sc_apl_menu=blank_hrm&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_hrm']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_hrm']) != "on")
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
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[240] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[240] . "",
        'id'       => "item_188",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_188",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_189&sc_apl_menu=grid_hrm_mesin_presensi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[241] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[241] . "",
        'id'       => "item_189",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_189",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_190&sc_apl_menu=grid_hrm_user_presensi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[242] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[242] . "",
        'id'       => "item_190",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_190",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_191&sc_apl_menu=grid_hrm_data_presensi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[243] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[243] . "",
        'id'       => "item_191",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_191",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[244] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[244] . "",
    'id'       => "item_215",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_215",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_249&sc_apl_menu=grid_hrm_daftar_shift&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[245] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[245] . "",
        'id'       => "item_249",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_249",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_250&sc_apl_menu=grid_hrm_shift_karyawan&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[246] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[246] . "",
        'id'       => "item_250",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_250",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_337&sc_apl_menu=grid_hrm_supp_presensi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_supp_presensi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_hrm_supp_presensi']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[247] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[247] . "",
        'id'       => "item_337",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_337",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[248] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[248] . "",
    'id'       => "item_192",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_192",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_195&sc_apl_menu=grid_hrm_periode_remunerasi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[249] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[249] . "",
        'id'       => "item_195",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_195",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_193&sc_apl_menu=grid_hrm_remunerasi_tetap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[250] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[250] . "",
        'id'       => "item_193",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_193",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_251&sc_apl_menu=grid_hrm_remunerasi_tidak_tetap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[251] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[251] . "",
        'id'       => "item_251",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_251",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_194&sc_apl_menu=grid_hrm_potongan_tetap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[252] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[252] . "",
        'id'       => "item_194",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_194",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_248&sc_apl_menu=grid_hrm_potongan_tidak_tetap&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[253] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[253] . "",
        'id'       => "item_248",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_248",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_196&sc_apl_menu=grid_hrm_overtime&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[254] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[254] . "",
        'id'       => "item_196",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_196",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_197&sc_apl_menu=form_kalkulasi_remunerasi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[255] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[255] . "",
        'id'       => "item_197",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_197",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_198&sc_apl_menu=grid_hrm_remunerasi_pembayaran&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[256] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[256] . "",
        'id'       => "item_198",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_198",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[257] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[257] . "",
    'id'       => "item_286",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_286",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[258] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[258] . "",
    'id'       => "item_287",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_287",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[259] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[259] . "",
    'id'       => "item_288",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_288",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_289&sc_apl_menu=grid_ga_dokumen&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ga_dokumen']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ga_dokumen']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[260] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[260] . "",
        'id'       => "item_289",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_289",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[261] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[261] . "",
    'id'       => "item_290",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_290",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[262] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[262] . "",
    'id'       => "item_291",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_291",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[263] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[263] . "",
    'id'       => "item_292",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_292",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_160&sc_apl_menu=blank_acc&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_acc']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_acc']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__money2_32.png";
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
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[264] . "",
        'level'    => "0",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[264] . "",
        'id'       => "item_160",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_160",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[265] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[265] . "",
    'id'       => "item_161",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_161",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_202&sc_apl_menu=grid_akun_header&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[266] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[266] . "",
        'id'       => "item_202",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_202",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_203&sc_apl_menu=grid_akun&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[267] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[267] . "",
        'id'       => "item_203",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_203",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_204&sc_apl_menu=grid_jenis_transaksi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[268] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[268] . "",
        'id'       => "item_204",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_204",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_205&sc_apl_menu=grid_map_transaksi_jurnal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[269] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[269] . "",
        'id'       => "item_205",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_205",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[270] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[270] . "",
    'id'       => "item_199",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_199",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_303&sc_apl_menu=grid_buku_hutang&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_buku_hutang']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_buku_hutang']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[271] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[271] . "",
        'id'       => "item_303",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_303",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_304&sc_apl_menu=grid_buku_piutang&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_buku_piutang']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_buku_piutang']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[272] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[272] . "",
        'id'       => "item_304",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_304",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_214&sc_apl_menu=form_jurnal_transaksi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_jurnal_transaksi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_jurnal_transaksi']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[273] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[273] . "",
        'id'       => "item_214",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_214",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_200&sc_apl_menu=grid_jurnal_master&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[274] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[274] . "",
        'id'       => "item_200",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_200",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
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
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[275] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[275] . "",
    'id'       => "item_201",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_201",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_206&sc_apl_menu=form_period_journal_summary&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[276] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[276] . "",
        'id'       => "item_206",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_206",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_207&sc_apl_menu=form_period_general_ledger_summary&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[277] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[277] . "",
        'id'       => "item_207",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_207",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_208&sc_apl_menu=form_period_rincian_piutang&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_piutang']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_piutang']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[278] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[278] . "",
        'id'       => "item_208",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_208",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_209&sc_apl_menu=form_period_rincian_utang&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_utang']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_rincian_utang']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[279] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[279] . "",
        'id'       => "item_209",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_209",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_211&sc_apl_menu=form_period_neraca&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_neraca']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_neraca']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[280] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[280] . "",
        'id'       => "item_211",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_211",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_210&sc_apl_menu=form_period_operasional&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_operasional']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_operasional']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[281] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[281] . "",
        'id'       => "item_210",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_210",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_213&sc_apl_menu=form_period_perubahan_ekuitas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_period_perubahan_ekuitas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_period_perubahan_ekuitas']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[282] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[282] . "",
        'id'       => "item_213",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_213",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__user_information_32.png";
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
$menu_menuData['data'][] = array(
    'label'    => "" . $_SESSION['usr_name'] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $_SESSION['usr_name'] . "",
    'id'       => "item_131",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_131",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_278&sc_apl_menu=change_password_it&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['change_password_it']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['change_password_it']) != "on")
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[283] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[283] . "",
        'id'       => "item_278",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_278",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_132&sc_apl_menu=sec_grid_sec_users&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_users'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_users'] . "",
        'id'       => "item_132",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_132",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_133&sc_apl_menu=sec_grid_sec_apps&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_apps'] . "",
        'id'       => "item_133",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_133",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_134&sc_apl_menu=sec_grid_sec_groups&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_groups'] . "",
        'id'       => "item_134",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_134",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_141&sc_apl_menu=sec_grid_sec_users_groups&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_users_x_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_users_x_groups'] . "",
        'id'       => "item_141",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_141",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_135&sc_apl_menu=sec_search_sec_groups&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'id'       => "item_135",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_135",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_136&sc_apl_menu=sec_sync_apps&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'id'       => "item_136",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_136",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_139&sc_apl_menu=sec_logged_users&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_logged_users'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_logged_users'] . "",
        'id'       => "item_139",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_139",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_137&sc_apl_menu=sec_change_pswd&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'id'       => "item_137",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_137",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_138&sc_apl_menu=sec_Login&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
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
    $menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_exit'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_exit'] . "",
        'id'       => "item_138",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_parent') . "\"",
        'sc_id'    => "item_138",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );

if (isset($_SESSION['scriptcase']['sc_def_menu']['menu']))
{
    $arr_menu_usu = $this->nm_arr_menu_recursiv($_SESSION['scriptcase']['sc_def_menu']['menu']);
    $this->nm_gera_menus($str_menu_usu, $arr_menu_usu, 1, 'menu');
    $menu_menuData['data'] = $str_menu_usu;
}
if (is_file("menu_help.txt"))
{
    $Arq_WebHelp = file("menu_help.txt"); 
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
                $menu_menuData['data'][] = array(
                    'label'    => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'level'    => "0",
                    'link'     => $str_link,
                    'hint'     => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'id'       => "item_Help",
                    'icon'     => $str_icon,
                    'icon_aba' => $icon_aba,
                    'icon_aba_inactive' => $icon_aba_inactive,
                    'target'   => "" . $this->menu_target('_blank') . "",
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

if (isset($_SESSION['scriptcase']['sc_menu_del']['menu']) && !empty($_SESSION['scriptcase']['sc_menu_del']['menu']))
{
    $nivel = 0;
    $exclui_menu = false;
    foreach ($menu_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_del']['menu']))
       {
          $nivel = $cada_menu['level'];
          $exclui_menu = true;
          unset($menu_menuData['data'][$i_menu]);
       }
       elseif ( empty($cada_menu) || ($exclui_menu && $nivel < $cada_menu['level']))
       {
          unset($menu_menuData['data'][$i_menu]);
       }
       else
       {
          $exclui_menu = false;
       }
    }
    $Temp_menu = array();
    foreach ($menu_menuData['data'] as $i_menu => $cada_menu)
    {
        $Temp_menu[] = $cada_menu;
    }
    $menu_menuData['data'] = $Temp_menu;
}

if (isset($_SESSION['scriptcase']['sc_menu_disable']['menu']) && !empty($_SESSION['scriptcase']['sc_menu_disable']['menu']))
{
    $disable_menu = false;
    foreach ($menu_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_disable']['menu']))
       {
          $nivel = $cada_menu['level'];
          $disable_menu = true;
          $menu_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu) && $disable_menu && $nivel < $cada_menu['level'])
       { 
          $menu_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu))
       {
          $disable_menu = false;
       }
    }
}

$level_to_delete = false;
foreach ($menu_menuData['data'] as $chave => $cada_menu)
{
        if($level_to_delete !== false && $menu_menuData['data'][$chave]['level'] > $level_to_delete)
        {
                unset($menu_menuData['data'][$chave]);
        }
        else
        {
                $level_to_delete = false;
                
                if ($menu_menuData['data'][$chave]['disabled'] == 'Y')
                {
                        $level_to_delete = $menu_menuData['data'][$chave]['level'];
                        unset($menu_menuData['data'][$chave]);
                }
        }
}
$menu_menuData['data'] = array_values($menu_menuData['data']);
$flag = 1;
while ($flag == 1)
{
    $flag = 0;
    foreach ($menu_menuData['data'] as $chave => $cada_menu)
    {
        if (!empty($cada_menu))
        {
            if (isset($menu_menuData['data'][$chave + 1]) && !empty($menu_menuData['data'][$chave + 1]))
            {
                if ($menu_menuData['data'][$chave]['link'] == "#")
                {
                    if ($menu_menuData['data'][$chave]['level'] >= $menu_menuData['data'][$chave + 1]['level'] )
                    {
                        unset($menu_menuData['data'][$chave]);
                        $flag = 1;
                    }
                }
            }
            elseif ($menu_menuData['data'][$chave]['link'] == "#")
            {
                unset($menu_menuData['data'][$chave]);
            }
        }
    }
    $menu_menuData['data'] = array_values($menu_menuData['data']);
}

/* HTML header */
if ($menu_menuData['iframe'])
{
    $menu_menuData['height'] = '100%';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> style="height: 100%">
<head>
 <title>SIMRS</title>
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
 <link rel="stylesheet" href="<?php echo $_SESSION['scriptcase']['menu']['glo_nm_path_prod']; ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../_lib/css/_menuTheme/sys_Fair_arnaldo_menu_hor_<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir']; ?>.css<?php if (@is_file($this->path_css . '_menuTheme/' . "sys_Fair_arnaldo_menu" . '_' . hor . '.css')) { echo '?scp=' . md5($this->path_css . '_menuTheme/' . "sys_Fair_arnaldo_menu" . '_' . hor . '.css'); } ?>" />
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
    $menu_menuData['height'] = '30px';
}

/* JS files */
?>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu']['glo_nm_path_prod']; ?>/third/jquery/js/jquery.js"></script>
<script  type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu']['glo_nm_path_prod']; ?>/third/jquery_plugin/contextmenu/jquery.contextmenu.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['menu']['glo_nm_path_prod']; ?>/third/jquery_plugin/contextmenu/contextmenu.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_contextmenu.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_contextmenu.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_contextmenu.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_contextmenu.css'); } ?>" /> 
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_sweetalert.css" />
<script type="text/javascript" src="menu_message.js"></script>
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
Iframe_atual = "menu_iframe";
function writeFastMenu(arr_link)
{
  return false;
}
function clearFastMenu(arr_link)
{
  return false;
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
echo "Tab_iframes[" . $seq . "] = \"menu\";\r\n";
echo "Tab_labels['menu'] = \"Dashboard\";\r\n";
echo "Tab_hints['menu'] = \"Dashboard\";\r\n";
echo "Tab_abas['menu']   = \"none\";\r\n";
echo "Tab_refresh['menu']   = \"\";\r\n";
echo "Tab_icons['menu'] = \"scriptcase__NM__ico__NM__sc_menu_home_e.png\";\r\n";
echo "Tab_icons_inactive['menu'] = \"scriptcase__NM__ico__NM__sc_menu_home_d.png\";\r\n";
echo "Tab_icon_fa['menu']   = \"\";\r\n";
echo "Tab_icon_fa_inactive['menu']   = \"\";\r\n";
echo "Tab_display['menu']   = \"\";\r\n";
echo "Tab_display_position['menu']   = \"\";\r\n";
echo "Tab_links['menu']   = \"\";\r\n";
         $seq++;
 if(isset($menu_menuData['data']) && !empty($menu_menuData['data']))
 {
   foreach ($menu_menuData['data'] as $ind => $dados_menu)
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
 if(isset($menu_menuData['data_vertical']) && !empty($menu_menuData['data_vertical']))
 {
   foreach ($menu_menuData['data_vertical'] as $ind => $dados_menu)
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
    iframe.name = 'menu_' + str_id + '_iframe';
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
    if(str_id === 'menu'){ home_style=";padding-left:4px;min-height:14px;"; }
    tmp += "<div id='aba_td_txt_" + str_id + "' style='display:inline-block;cursor:pointer"+home_style+"' class='scTabText' >";
    tmp += Tab_labels[str_id];
    if(Tab_display_position[ str_id ] == 'img_right')
    {
        tmp += html_icon;
    }
    tmp += "</div>";
    tmp += "<div id='aba_td_3_" + str_id + "' style='display:none;'>...</div>";
if(str_id !== 'menu'){
    tmp += "<div style='display:inline-block;'>";
    tmp += "    <img id='aba_td_img_" + str_id + "' src='<?php echo $this->path_botoes . "/" . $this->css_menutab_active_close_icon; ?>' onclick=\"event.stopPropagation(); del_aba_td('" + str_id + "'); \" align='absmiddle' class='scTabCloseIcon' style='cursor:pointer; z-index:9999;'>";
    tmp += "</div>";
}
    tmp += "</li>";
    $('#contrl_abas').append(tmp);
    Tab_abas[str_id] = 'show';
}
function mudaIframe(str_id)
{
    $('#iframe_menu').hide();
    if (str_id == "")
    {
        $('#iframe_menu').show();
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
            if (Tab_iframes[i] != 'menu') 
            {
                Iframe_atual = "menu_" + Tab_iframes[i] + '_iframe';
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
    if(str_id === 'menu') { return false; }
    $('#aba_td_' + str_id).remove();
    Tab_abas[str_id] = 'none';
    $('#iframe_' + str_id).prop('src', '');
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
            str_id = "menu";
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
    if (str_id != "iframe_menu")
    {
        str_target_sv = str_id + "_iframe";
        str_id        = str_id.replace("menu_","");
    }
    if($('#' + str_id).parent().length)
    {
        $('#' + str_id).parent().toggleClass('menu__item--active');
    }
    str_link   = $('#' + str_id).attr('item-href');
    str_target = $('#' + str_id).attr('item-target');
    str_id = str_id.replace('iframe_menu', 'menu');
    if (str_target == "menu_iframe" && str_link != '' && str_link != '#' && str_link != 'javascript:')
    {
        str_target = (str_target_sv != "") ? str_target_sv : str_target;
        mudaIframe(str_id);
        if (str_id != "menu")
        {
            $('#links_abas').css('display','');
            $('#id_links_abas').css('display','');
        }
        if (str_id != "menu" && Tab_abas[str_id] != 'show')
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
    if($('#iframe_menu').length)
        $('#iframe_menu')[0].contentWindow.focus();
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
echo $this->menu_escreveMenu($menu_menuData['data'], $path_imag_cab, $strAlign);
?></tr></table>
</div>
<?php
/* Iframe control */
if ($menu_menuData['iframe'])
{
?>
    </td>
  </tr>
<?php echo $this->nm_show_toolbarmenu('', $saida_apl, $menu_menuData, $path_imag_cab); ?><?php echo $this->nm_gera_degrade(1, $bg_line_degrade, $path_imag_cab); ?>  <tr>
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
    <td style="border-width: 1px; height: 100%; padding: 0px;vertical-align:top;text-align:center;">
    <div id="Iframe_control" style='width:100%; height:100%; margin:0px; padding:0px;'>
<?php
$link_default = "";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank']) && $_SESSION['scriptcase']['sc_apl_seg']['blank'] == "on") 
{ 
    $SCR  = "";
    $link_default = " onclick=\"openMenuItem('iframe_menu');\" item-href=\"menu_form_php.php?sc_item_menu=menu&sc_apl_menu=blank&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "\"  item-target=\"menu_iframe\"";
} 
else
{ 
    $SCR  = ($NM_scr_iframe != "" ? $NM_scr_iframe : "menu_pag_ini.php");
} 
?>
      <iframe id="iframe_menu" name="menu_iframe" frameborder="0" class="scMenuIframe" style="width: 100%; height: 100%;"  src="<?php echo $SCR; ?>" <?php echo $link_default ?>></iframe>
<?php
 foreach ($menu_menuData['data'] as $ind => $dados_menu)
 {
     if ($dados_menu['link'] != "#")
     {
         echo "      <iframe id=\"iframe_" . $dados_menu['id'] . "\" name= \"menu_" . $dados_menu['id'] . "_iframe\" frameborder=\"0\" class=\"scMenuIframe\" style=\"display: none;width: 100%; height: 100%;\" src=\"\"></iframe>
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
        <span class="scMenuHFooterFont" id="rod_col1"><?php echo "Copyright - IT SIMRS" ?></span>
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
    echo "   document.getElementById('iframe_menu').click()";
    echo "</script>";
}

}

/* Target control */
function menu_escreveMenu($arr_menu, $path_imag_cab = '', $strAlign = '')
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
                    <a href="javascript:" onclick="openMenuItem('menu_<?php echo $aMenuItemList[$i]['id']; ?>');" item-href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>" <?php echo $aMenuItemList[$i]['target']; ?> class='menu__link <?php echo $sDisabledClass; ?>'><?php echo $str_item; ?></a>
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
function menu_target($str_target)
{
    global $menu_menuData;
    if ('_blank' == $str_target)
    {
        return '_blank';
    }
    elseif ('_parent' == $str_target)
    {
        return '_parent';
    }
    elseif ($menu_menuData['iframe'])
    {
        return 'menu_iframe';
    }
    else
    {
        return $str_target;
    }
}

function nm_show_toolbarmenu($col_span, $saida_apl, $menu_menuData, $path_imag_cab)
{
}

   function nm_prot_aspas($str_item)
   {
       return str_replace('"', '\"', $str_item);
   }

   function nm_gera_menus(&$str_line_ret, $arr_menu_usu, $int_level, $nome_aplicacao)
   {
       global $menu_menuData; 
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
                    $str_line['link'] = "menu_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""; 
               }
               else
               {
                    $str_line['link'] = "menu_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""; 
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
                $str_line['target'] = ('' != $arr_item['target'] && '' != $arr_item['link']) ?  $this->menu_target( $arr_item['target']) : "_self"; 
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
        $_SESSION['scriptcase']['menu']['sc_init'][$apl_menu] = rand(2, 10000);
        $_SESSION['sc_session'][$_SESSION['scriptcase']['menu']['sc_init'][$apl_menu]] = array();
        return  $_SESSION['scriptcase']['menu']['sc_init'][$apl_menu];
   }
function chat_bar()
{
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
  
?>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="<?php echo sc_url_library('prj','xenon','css/fonts/linecons/css/linecons.css');?>">
	<link rel="stylesheet" href="<?php echo sc_url_library('prj','xenon','css/fonts/fontawesome/css/font-awesome.min.css');?>">
	<link rel="stylesheet" href="<?php echo sc_url_library('prj','xenon','css/xenon-core.css');?>">
	<link rel="stylesheet" href="<?php echo sc_url_library('prj','xenon','css/xenon-forms.css');?>">
	<link rel="stylesheet" href="<?php echo sc_url_library('prj','xenon','css/xenon-components.css');?>">
	<link rel="stylesheet" href="<?php echo sc_url_library('prj','xenon','css/xenon-skins.css');?>">
	<link rel="stylesheet" href="<?php echo sc_url_library('prj','xenon','css/custom.css');?>">

	<!-- start: Chat Section -->
		<div id="chat" class="fixed">
			
			<div class="chat-inner">
			
				
				<h2 class="chat-header">
					<a href="#" class="chat-close" data-toggle="chat">
						<i class="fa-plus-circle rotate-45deg"></i>
					</a>
					
					Chat
					<span class="badge badge-success is-hidden">0</span>
				</h2>
				
				<script type="text/javascript">
				jQuery(document).ready(function($)
				{
					var $chat_conversation = $(".chat-conversation");
					
					$(".chat-group a").on('click', function(ev)
					{
						ev.preventDefault();
						
						$chat_conversation.toggleClass('is-open');
						
						$(".chat-conversation textarea").trigger('autosize.resize').focus();
					});
					
					$(".conversation-close").on('click', function(ev)
					{
						ev.preventDefault();
						$chat_conversation.removeClass('is-open');
					});
				});
				</script>
				
				
				<div class="chat-group">
					<strong>Favorites</strong>
					
					<a href="#"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
					<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
				</div>
				
				
				<div class="chat-group">
					<strong>Work</strong>
					
					<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
				</div>
				
				
				<div class="chat-group">
					<strong>Other</strong>
					
					<a href="#"><span class="user-status is-online"></span> <em>Dennis E. Johnson</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Stuart A. Shire</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Janet I. Matas</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Mindy A. Smith</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Herman S. Foltz</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Gregory E. Robie</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Nellie T. Foreman</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>William R. Miller</em></a>
					<a href="#"><span class="user-status is-idle"></span> <em>Vivian J. Hall</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Melinda A. Anderson</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Gary M. Mooneyham</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Robert C. Medina</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Dylan C. Bernal</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Marc P. Sanborn</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Kenneth M. Rochester</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Rachael D. Carpenter</em></a>
				</div>
			
			</div>
			
			<!-- conversation template -->
			<div class="chat-conversation">
				
				<div class="conversation-header">
					<a href="#" class="conversation-close">
						&times;
					</a>
					
					<span class="user-status is-online"></span>
					<span class="display-name">Arlind Nushi</span> 
					<small>Online</small>
				</div>
				
				<ul class="conversation-body">	
					<li>
						<span class="user">Arlind Nushi</span>
						<span class="time">09:00</span>
						<p>Are you here?</p>
					</li>
					<li class="odd">
						<span class="user">Brandon S. Young</span>
						<span class="time">09:25</span>
						<p>This message is pre-queued.</p>
					</li>
					<li>
						<span class="user">Brandon S. Young</span>
						<span class="time">09:26</span>
						<p>Whohoo!</p>
					</li>
					<li class="odd">
						<span class="user">Arlind Nushi</span>
						<span class="time">09:27</span>
						<p>Do you like it?</p>
					</li>
				</ul>
				
				<div class="chat-textarea">
					<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
				</div>
				
			</div>
			
		</div>
	<!-- end: Chat Section -->

	<script src="<?php echo sc_url_library('prj','xenon','js/TweenMax.min.js');?>"></script>
	<script src="<?php echo sc_url_library('prj','xenon','js/resizeable.js');?>"></script>
	<script src="<?php echo sc_url_library('prj','xenon','js/joinable.js');?>"></script>
	<script src="<?php echo sc_url_library('prj','xenon','js/xenon-api.js');?>"></script>
	<script src="<?php echo sc_url_library('prj','xenon','js/xenon-toggles.js');?>"></script>
	<script src="<?php echo sc_url_library('prj','xenon','js/xenon-custom.js');?>"></script>

<?php


$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
}
function comment_cloud()
{
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_psw'])) {$_SESSION['usr_psw'] = "";}
if (!isset($this->sc_temp_usr_psw)) {$this->sc_temp_usr_psw = (isset($_SESSION['usr_psw'])) ? $_SESSION['usr_psw'] : "";}
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  
$loginya = $this->sc_temp_usr_login;
$pswnya = $this->sc_temp_usr_psw;

?>

	
	<link rel="stylesheet" href="<?php echo sc_url_library('prj','xenon','css/xenon-core.css');?>">
	<link rel="stylesheet" href="<?php echo sc_url_library('prj','xenon','css/xenon-forms.css');?>">
	<link rel="stylesheet" href="<?php echo sc_url_library('prj','xenon','css/xenon-components.css');?>">
	<link rel="stylesheet" href="<?php echo sc_url_library('prj','xenon','css/xenon-skins.css');?>">
	<link rel="stylesheet" href="<?php echo sc_url_library('prj','xenon','css/custom.css');?>">
	<link href="<?php echo sc_url_library('prj', 'bootstrap','bootstrap.min.css'); ?>" rel="stylesheet">
  <script src="<?php echo sc_url_library('prj','bootstrap','jquery.min.js'); ?>"></script>
  <script src="<?php echo sc_url_library('prj','bootstrap','bootstrap.min.js'); ?>"></script>

       

	<button type="button" class="btn btn-demo">
				<a href="http://192.168.144.144:300/login/<?php echo $loginya;?>/<?php echo $pswnya;?>" onclick="window.open('http://192.168.144.144:3000/login/<?php echo $loginya;?>/<?php echo $pswnya;?>', 
                         'newwindow', 
                         'width=800,height=600,right=0'); 
              return false;"><i class="fa-comments-o"></i> Message</a>
	</button>

	<!--ul class="right-links list-inline list-unstyled">
		<li>
			<a href="#" data-toggle="chat">
			<i class="fa-comments-o"></i>
			</a>
		</li>
	</ul-->

	<!-- start: Chat Section -->
		<div id="chat" class="fixed">
			
			<div class="chat-inner">
			
				
				<h2 class="chat-header">
					<a href="#" class="chat-close" data-toggle="chat">
						<i class="fa-plus-circle rotate-45deg"></i>
					</a>
					
					Internal Message
					<span class="badge badge-success is-hidden">0</span>
				</h2>
				
				<script type="text/javascript">
				jQuery(document).ready(function($)
				{
					var $chat_conversation = $(".chat-conversation");
					
					$(".chat-group a").on('click', function(ev)
					{
						ev.preventDefault();
						
						$chat_conversation.toggleClass('is-open');
						
						$(".chat-conversation textarea").trigger('autosize.resize').focus();
					});
					
					$(".conversation-close").on('click', function(ev)
					{
						ev.preventDefault();
						$chat_conversation.removeClass('is-open');
					});
				});
				</script>
				
				
				<div class="chat-group">
					<strong>Medis</strong>
					
					<a href="#"><span class="user-status is-online"></span> <em>Catherine J. Watki</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
					<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
				</div>
				
				
				<div class="chat-group">
					<strong>Management</strong>
					
					<a href="#"><span class="user-status is-online"></span> <em>Dennis E. Johnson</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Stuart A. Shire</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Janet I. Matas</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Mindy A. Smith</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Herman S. Foltz</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Gregory E. Robie</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Nellie T. Foreman</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>William R. Miller</em></a>
					<a href="#"><span class="user-status is-idle"></span> <em>Vivian J. Hall</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Melinda A. Anderson</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Gary M. Mooneyham</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Robert C. Medina</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Dylan C. Bernal</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Marc P. Sanborn</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Kenneth M. Rochester</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Rachael D. Carpenter</em></a>
				</div>
			
			</div>
			
			<!-- conversation template -->
			<div class="chat-conversation">
				
				<div class="conversation-header">
					<a href="#" class="conversation-close">
						&times;
					</a>
					
					<span class="user-status is-online"></span>
					<span class="display-name">Arlind Nushi</span> 
					<small>Online</small>
				</div>
				
				<ul class="conversation-body">	
					<li>
						<span class="user">Arlind Nushi</span>
						<span class="time">09:00</span>
						<p>Are you here?</p>
					</li>
					<li class="odd">
						<span class="user">Brandon S. Young</span>
						<span class="time">09:25</span>
						<p>This message is pre-queued.</p>
					</li>
					<li>
						<span class="user">Brandon S. Young</span>
						<span class="time">09:26</span>
						<p>Whohoo!</p>
					</li>
					<li class="odd">
						<span class="user">Arlind Nushi</span>
						<span class="time">09:27</span>
						<p>Do you like it?</p>
					</li>
				</ul>
				
				<div class="chat-textarea">
					<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
				</div>
				
			</div>
			
		</div>
	<!-- end: Chat Section -->

	<script src="<?php echo sc_url_library('prj','xenon','js/TweenMax.min.js');?>"></script>
	<script src="<?php echo sc_url_library('prj','xenon','js/resizeable.js');?>"></script>
	<script src="<?php echo sc_url_library('prj','xenon','js/joinable.js');?>"></script>
	<script src="<?php echo sc_url_library('prj','xenon','js/xenon-api.js');?>"></script>
	<script src="<?php echo sc_url_library('prj','xenon','js/xenon-toggles.js');?>"></script>
	<script src="<?php echo sc_url_library('prj','xenon','js/xenon-custom.js');?>"></script>

<?php


if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_usr_psw)) {$_SESSION['usr_psw'] = $this->sc_temp_usr_psw;}
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
}
function sidebar_show()
{
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
  
?>

<link href="<?php echo sc_url_library('prj', 'bootstrap','bootstrap.min.css'); ?>" rel="stylesheet">
  <script src="<?php echo sc_url_library('prj','bootstrap','jquery.min.js'); ?>"></script>
  <script src="<?php echo sc_url_library('prj','bootstrap','bootstrap.min.js'); ?>"></script>

<style>

	.modal.left .modal-dialog,
	.modal.right .modal-dialog {
		position: fixed;
		margin: auto;
		width: 320px;
		height: 100%;
		-webkit-transform: translate3d(0%, 0, 0);
		    -ms-transform: translate3d(0%, 0, 0);
		     -o-transform: translate3d(0%, 0, 0);
		        transform: translate3d(0%, 0, 0);
	}

	.modal.left .modal-content,
	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}
	
	.modal.left .modal-body,
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}


	.modal.left.fade .modal-dialog{
		left: -320px;
		-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, left 0.3s ease-out;
		        transition: opacity 0.3s linear, left 0.3s ease-out;
	}
	
	.modal.left.fade.in .modal-dialog{
		left: 0;
	}
        

	.modal.right.fade .modal-dialog {
		right: -320px;
		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
		        transition: opacity 0.3s linear, right 0.3s ease-out;
	}
	
	.modal.right.fade.in .modal-dialog {
		right: 0;
	}


	.modal-content {
		border-radius: 0;
		border: none;
	}

	.modal-header {
		border-bottom-color: #EEEEEE;
		background-color: #FAFAFA;
	}

</style>

<button type="button" class="btn btn-demo" data-toggle="modal" data-target="#myModal2">
			<a data-toggle="chat">Chatbox</a>
</button>

<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<!--div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel2">Chat Sidebar</h4>
				</div-->

				<div class="modal-body">
					<!--p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</p-->
					
					<p>
					<?php	$this->chat_bar(); ?>
					</p>
				</div>

			</div>
		</div>
	</div>

<?php

$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
}
function sc_logged($user, $ip = '')
	{
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
  
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
$this->nmgp_redireciona_form($_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . "" . SC_dir_app_name('sec_logged') . "/", "menu_form_php.php", "user?#?" . NM_encode_input($user) . "?@?","_self", 440, 630);
 };
			return false;
		}
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
}
function sc_verify_logged()
	{
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
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
$this->nmgp_redireciona_form($_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . "" . SC_dir_app_name('sec_Login') . "/", "menu_form_php.php", "","_parent", 440, 630);
 };
		}
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
}
function sc_logged_in($user, $ip = '')
	{
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
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
             echo "<br>APL: menu";
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
             echo "<br>APL: menu";
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
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
}
function sc_logged_in_fail($user, $ip = '')
    {
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
  
        $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
        $str_sql = "INSERT INTO rsiapp_logged(login, date_login, sc_session, ip) VALUES ('" . $user . "', '" . microtime(true) . "', '_SC_FAIL_SC_', '" . $ip . "')";
        
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu";
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
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
}
function sc_logged_is_blocked($ip = '')
    {
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
  
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
             echo "<br>APL: menu";
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
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
}
function sc_logged_out($user, $date_login = '')
	{
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
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
             echo "<br>APL: menu";
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
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
}
function sc_looged_check_logout()
    {
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
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
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
}
   function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $alt_modal=0, $larg_modal=0)
   {
      global  $menu_menuData;
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
                  $tmp_parms .= $_SESSION['sc_session'][1]['menu'][substr($val, 1, -1)];
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
          $nm_apl_dest = $menu_menuData['url']['link'] . $this->tab_grupo[0] .$nm_apl_dest . "/" . $nm_apl_dest . ".php";
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
    elseif (is_file($root . $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] . "/sc_apl_default_simrskreatifmedia.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] . "/sc_apl_default_simrskreatifmedia.txt"));
    }
    if (isset($apl_def)) {
        if ($apl_def[0] != "menu") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['menu']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['menu']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['menu']['session_timeout']['redir_tp'] = $Redir_tp;
        }
        if (isset($_COOKIE['sc_actual_lang_simrskreatifmedia'])) {
            $_SESSION['scriptcase']['menu']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_simrskreatifmedia'];
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
$contr_menu = new menu_class;
$contr_menu->menu_menu();

?>
