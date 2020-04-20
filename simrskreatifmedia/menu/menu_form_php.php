<?php
include_once('menu_session.php');
session_start();
   $_SESSION['scriptcase']['menu']['glo_nm_path_prod']      = "";
   $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] = "";
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
class menu_form_php
{
      var $sc_script_name;
      var $nm_location;
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include

   function init()
   {
      $Campos_Mens_erro = "";
      $_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
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
      if(!isset($_SESSION['scriptcase']['menu']['glo_nm_path_prod']) || empty($_SESSION['scriptcase']['menu']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      $str_path_web  = $_SERVER['PHP_SELF'];
      $str_path_web  = str_replace("\\", '/', $str_path_web);
      $str_path_web  = str_replace('//', '/', $str_path_web);
      $str_root      = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $path_link     = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $path_link     = substr($path_link, 0, strrpos($path_link, '/')) . '/';
      $this->nm_location  = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $this->nm_location  = substr($_SERVER['PHP_SELF'], 0, $this->nm_location + 1) ;  
      $this->nm_location .= "index.php"; 
      $this->menu_sc_init = 1;
      $path_imag_cab = $path_link . "_lib/img";
      $path_imag_apl = $str_root . $path_link . "_lib/img";
      $path_libs     = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/lib/php";
      $path_third    = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/third";
      $path_adodb    = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'];
      $this->path_css = $str_root . $path_link . "_lib/css/";
      $path_lib_php   = $str_root . $path_link . "_lib/lib/php";
      $this->str_lang      = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "id";
      $this->str_conf_reg  = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "id_id";
      if (isset($_SESSION['scriptcase']['menu']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['menu']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['menu']['actual_lang']) || $_SESSION['scriptcase']['menu']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['menu']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_simrskreatifmedia',$this->str_lang,'0','/');
      }
      $this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "sc_arafiq/sc_arafiq";
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
      if (!function_exists("NM_is_utf8"))
      {
          include_once("../_lib/lib/php/nm_utf8.php");
      }
      if (!function_exists("SC_dir_app_ini"))
      {
          include_once("../_lib/lib/php/nm_ctrl_app_name.php");
      }
      SC_dir_app_ini('simrskreatifmedia');
      if (!defined("SC_ERROR_HANDLER"))
      {
          define("SC_ERROR_HANDLER", 1);
          include_once(dirname(__FILE__) . "/menu_erro.php");
      }
      if (isset($_GET['sc_apl_menu']))
      {
          $_SESSION['scriptcase']['sc_usa_grupo']     = $_GET['sc_usa_grupo'];
          $_SESSION['scriptcase']['sc_item_menu']     = $_GET['sc_item_menu'];
          $_SESSION['scriptcase']['sc_apl_menu']      = $_GET['sc_apl_menu'];
          $_SESSION['scriptcase']['sc_apl_menu_link'] = urldecode($_GET['sc_apl_link']);
          $_SESSION['scriptcase']['sc_ult_apl_menu']  = array();
      }
      $this->sc_menu_item   = $_SESSION['scriptcase']['sc_item_menu'];
      $this->sc_script_name = $_SESSION['scriptcase']['sc_apl_menu'];
      include("../_lib/lang/". $this->str_lang .".lang.php");
      include("../_lib/css/" . $this->str_schema_all . "_menuH.php");
      include("../_lib/lang/config_region.php");
      include("../_lib/lang/lang_config_region.php");
      $this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("id");
      asort($this->Nm_lang_conf_region);
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
      $this->regionalDefault();
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
      if (is_file($path_lib_php . "/nm_functions.php"))  
      {  
          $this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
      }  
      if (is_file($path_lib_php . "/nm_api.php"))  
      {  
          $this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
      }  
      if (is_file($path_lib_php . "/nm_data.class.php"))  
      {
          $this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
          $this->nm_data = new nm_data("id");
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
$_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQNwH9FUHIrKD5BqHuNOVcFCDWB3DoXGHQBsZ1FaHIBeHQFUHgNOVkJ3DWF/VoBiDcJUZSX7Z1BYHuFaDMvOVIB/H5XKVoF7HQNmZkBiHABYHQrqHgveHArsDWFGDoBqHQFYZ9XGHAvOV5XGDMrYV9FeDuFqHMB/DcNmZ1BiHABYHQJwDEBODkFeH5FYVoFGHQJKDQB/Z1NaVWBqHgvOV9FeH5XCVorqHQNmZ1FGHArYZMBODEBeVkJ3H5F/DoXGDcXGZSFUHANOHuJeHgvOVcrsDuX7HMBiD9BsVIraD1rwV5X7HgBeHEFiDWFqDoBODcXOZSX7HANOV5BOHuNODkBOV5F/VEBiDcJUZkFGHArKV5FUDMrYZSXeV5FqHIJsHQXGZSX7Z1BYD5JwHuNOVIFCDWFYVoJwDcJUZSB/Z1BeD5XGDEBOHEJqV5FaDoBOD9JKDQJwHANKD5NUHuzGVcFKDur/VorqHQJmZ1F7Z1vmD5rqDEBOHArCDWBmZuBqHQBiDQJsZ1BYHQNUHgvsVcFCDWXCHMrqHQJmZkFGD1rwV5FaDMzGHEBUDuJeHIJeHQNmDuFaHAveD5NUHgNKDkBOV5FYHMBiHQXOZkBiDSNOHuJwHgNOHENiHEXCHIXGHQJKDuBOZ1zGVWJeDMvmVIBsHEF/HINUHQNwVIraZ1rYHQFaHgBOHErsH5F/HIraHQNmZ9JeZ1BYHuBqDMvOVIBsH5B3VEX7DcFYZkFUD1rwV5FGDEBeHEXeH5X/DoF7HQNmDQBqDSN7HuJeDMzGZSNiDurGVENUHQNwZ1FUZ1rYHuFUHgBeHEJqDuXKZuXGHQJeDuBOZ1BYHQJsHgrwVIBsDuFGVEX7HQBsVIJwZ1rYHQFUHgBYHErCHEXCHMFGHQJKDuBOD1BeD5rqHuvmVcBOH5B7VoBqD9XOH9B/D1rwD5BiDErKHEFiDWX7ZuFaD9JKDQB/Z1NaV5JwHuNODkFCDWXCVENUHQFYH9BqZ1NOV5FaDEvsHErCV5FqDoraD9JKZSX7D1vOV5JwHuBYZSNiHEX/VoraD9BiH9FaHIBeZMBODErKVkXeV5FaDoB/D9NmDQBOZ1rwV5BqHgvsDkFCDWJeDoFGD9XOZ1rqD1rKD5rqDMBYHEJGH5FYVoB/HQXGZ9rqD1BeD5rqHuvmVcBOH5B7VoBqD9XOH9B/D1rwD5BiDEBeHEFiV5FaDoXGD9NmDQB/Z1rwVWJeHuzGVcrsH5B7VENUHQNwZkBiHIBOZMBqHgNKHArsH5X/DoBqHQXOZ9rqZ1N7D5rqHuNODkBOH5FqVoB/D9BsZ1FGHArKV5FUDMrYZSXeV5FqHIJsHQBiZ9XGHANKV5BODMvOVcBUDWB3VENUHQNmVINUHArKHQJwDEBODkFeH5FYVoFGHQJKDQFaHANOHurqDMvOVcXKHEX/VEX7HQXOZ1BiHIveHuFUDMBYHEJqDWr/HIJsD9XsZ9JeD1BeD5F7DMvmVcFeHEF/VoB/D9JmZ1FaD1rwZMJeDEvsHEXeDuFYVoX7DcJeDQX7HIvsV5BiDMBOVIBODWFaDorqD9JmZ1FaHArYV5FGDMrYHErCHEFqDoXGD9XsDQJsHArYD5F7DMvmVcFKV5BmVoBqD9BsZkFGHAvsZMJeHgvCDkXKDWBmZura";
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
      $this->tab_grupo[0] = "simrskreatifmedia/";
      if ($_SESSION['scriptcase']['sc_usa_grupo'] != "S")
      {
          $this->tab_grupo[0] = "";
      }
      $_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
  if($this->sc_script_name == 'sec_Login'):
    $this->sc_logged_out($this->sc_temp_logged_user, $this->sc_temp_logged_date_login);
endif;
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
      $_SESSION['scriptcase']['sc_ult_apl_menu'] = array();
      unset($_SESSION['scriptcase']['sc_usa_grupo']);
if ($this->Db)
{
    $this->Db->Close(); 
}
      $link_url = false;
      $parms_session = "";

      if ($_SESSION['scriptcase']['sc_item_menu'] == "menu")
      {
              $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=1&script_case_session=" . session_id() . "";
      }
      elseif (isset($_SESSION['scriptcase']['sc_def_menu']['menu']))
      {
         foreach($_SESSION['scriptcase']['sc_def_menu']['menu'] as $id_item => $arr_item)
         {
             if ($_SESSION['scriptcase']['sc_item_menu'] == $id_item)
             { 
                 if ($arr_item['lnk_url'])
                 { 
                    $apl_run = $arr_item['url'];
                    $link_url = true;
                 } 
                 else 
                 { 
                    $this->menu_sc_init = (isset($arr_item['sc_init'])) ? $arr_item['sc_init'] : 1;
                    $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . $arr_item['url']; 
                    $parms_session = $arr_item['parm']; 
                 } 
                break; 
             } 
         }
      }
      {
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_284")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbantrian") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_285")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_antrian") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_1")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbadmrawatinap") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_341")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hisdetailrawatinap") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_5")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_ketersediaan_bed") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_10")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabs_pembayaran") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_272")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("calendar_tbcustomer") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_300")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbpembatalan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_6")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabs_hargaTind") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_294")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("billing_casemanager") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_295")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("berkas_klaim_elek") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_273")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbreqitem") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_16")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabs_Poli") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_17")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabs_RI") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_18")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabsIGD") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_20")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabsOK") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_358")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbhais") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_21")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabs_VK") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_330")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabsEndos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_23")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabs_Lab") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_255")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabs_radiologi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_265")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabsRM") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_28")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabsMappingICD") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_343")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_demo_jk") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_344")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_demo_agama") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_347")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_demo_edu") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_348")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_demo_age") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_350")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_demo_top_diag") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_351")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_demo_top_diag_ri") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_375")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_diagnosa_detail") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_352")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("report_Lab") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_335")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("rekapitulasi_ri") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_378")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbadjustment") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_305")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_tbobat_batch") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_298")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_tbstockobat") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_266")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabs_Farm") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_354")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_logistik") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_37")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("tabs_Logistik") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_365")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_status_pembelian") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_39")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbstockopname") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_275")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbreturlog") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_309")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_usulanpengadaan_gizi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_310")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_approvalusulanpengadaan_gizi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_311")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_detailrawatinap") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_43")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbobat") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_44")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbformulaobat") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_299")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbfornas") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_45")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbgolonganobat") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_271")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbcaraminum") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_52")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbsigna") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_53")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbsatuan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_274")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdepo") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_379")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbjenisadjustment") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_313")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_bahan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_318")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_jenisbahan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_319")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_kategoribahan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_314")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_set_gizi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_320")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_set_menu") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_130")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbpoli") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_49")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbpbf") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_301")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbjenispembatalan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_50")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbinstansi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_54")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbbank") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_57")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbbu") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_58")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbgelardokter") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_63")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbdoctor") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_64")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbcustomer") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_143")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbhrd") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_68")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbtindakan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_283")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbsettindakan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_336")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbclinicalpathway") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_70")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbradiologi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_257")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbjenisradiologi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_151")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbradiologi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_150")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tblab") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_253")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tblabcategory") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_152")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tblabrate") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_72")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbkelas") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_144")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbruang") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_317")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbfuncroom") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_340")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbpaket") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_79")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tbadministrasi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_385")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("control_summary_pend") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_386")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("control_summary_pend_ranap") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_282")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("dashboard") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_377")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("bed_occupacy_rate") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_380")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("av_los") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_368")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("dashboard_stat_igd") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_367")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("dashboard_stat_poli") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_366")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("dashboard_stat_ranap") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_376")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_grafik_kematian") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_372")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("dashboard_stat_lab") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_87")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_eis_rajal") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_345")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_resep_keluar") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_339")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_kasir_per_shift") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_338")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_bill_ranap") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_325")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("rekapKeseluruhan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_321")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("rekapKeseluruhan_master") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_353")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("rekapKeseluruhan_master_ri") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_327")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("reportKasir") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_328")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("Laporan_Stok_Persediaan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_374")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_evaluasi_penerimaan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_381")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_laporan_mutasi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_362")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("fast_slow_moving") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_333")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("stok_terkini") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_329")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("kartu_stok") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_331")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("laporan_obat_all") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_356")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("lap_grid_logistik_single") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_355")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("lap_grid_tbpo") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_332")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("top_sale_obat") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_357")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_lap_gizi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_326")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_penjualan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_364")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_laporan_ok") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_116")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("lap_radiologi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_235")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_vclaim_monitor_data_klaim") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_226")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_search_diagnosa") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_227")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_search_prosedur") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_237")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_klaim_baru") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_239")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_finalisasi_klaim") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_240")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_edit_ulang_klaim") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_241")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_hapus_klaim") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_242")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_update_data_pasien") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_243")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_hapus_data_pasien") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_244")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_grouping_stage_01") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_245")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_eclaim_grouping_stage_02") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_236")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("aplicare_view_tersedia_kamar") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_281")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_insentive") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_297")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_level") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_296")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_indikator") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_293")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_ga_jenis_dokumen") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_180")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_jabatan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_183")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_karyawan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_184")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_karyawan_tetap") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_185")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_jabatan_karyawan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_186")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_kontrak_kerja") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_187")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_pendidikan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_188")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_hrm") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_189")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_mesin_presensi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_190")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_user_presensi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_191")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_data_presensi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_249")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_daftar_shift") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_250")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_shift_karyawan") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_337")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_supp_presensi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_195")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_periode_remunerasi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_193")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_remunerasi_tetap") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_251")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_remunerasi_tidak_tetap") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_194")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_potongan_tetap") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_248")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_potongan_tidak_tetap") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_196")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_overtime") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_197")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_kalkulasi_remunerasi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_198")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_hrm_remunerasi_pembayaran") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_289")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_ga_dokumen") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_160")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_acc") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_202")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_akun_header") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_203")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_akun") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_204")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_jenis_transaksi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_205")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_map_transaksi_jurnal") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_303")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_buku_hutang") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_304")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_buku_piutang") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_214")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_jurnal_transaksi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_200")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_jurnal_master") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_206")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_period_journal_summary") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_207")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_period_general_ledger_summary") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_208")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_period_rincian_piutang") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_209")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_period_rincian_utang") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_211")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_period_neraca") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_210")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_period_operasional") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_213")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_period_perubahan_ekuitas") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_278")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("change_password_it") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_132")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_grid_sec_users") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_133")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_grid_sec_apps") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_134")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_grid_sec_groups") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_141")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_grid_sec_users_groups") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_135")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_search_sec_groups") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_136")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_sync_apps") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_139")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_logged_users") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_137")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_change_pswd") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "&script_case_session=" . session_id() . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_138")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_Login") . "/?script_case_init=" . $_SESSION['sc_session'][1]['menu']['init'] . "&script_case_session=" . session_id() . "";
      }
      }
      if (!$link_url)
      {
          $pos = strpos($apl_run, "?");
          if ($pos !== false)
          {
              $parms = "";
              $temp = explode("&", substr($apl_run, $pos + 1));
              foreach ($temp as $cada_parm)
              {
                  $parte_parm = explode("=", $cada_parm);
                  $parms .= (!empty($parms)) ? "?@?" . $parte_parm[0] . "?#?" : $parte_parm[0] . "?#?";
                  $parms .= (isset($parte_parm[1])) ? $parte_parm[1] : "";
              }
              $apl_run =  substr($apl_run, 0, $pos);
          }
      }
      if ($parms_session != "")
      {
          $parms  = isset($parms) ? $parms : '';
          $parms  = $parms_session . (substr($parms_session, -3, 3) != '?@?' ? '?@?' : '') . $parms;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

      <html><body>
        <form name="fmenu" method="post" action="<?php echo NM_encode_input($apl_run); ?>">
          <input type=hidden name="nmgp_parms" value="<?php  echo NM_encode_input($parms); ?>"> 
          <input type=hidden name="script_case_init" value="<?php echo $this->menu_sc_init ?>"> 
          <input type=hidden name="script_case_session" value="<?php echo NM_encode_input(session_id()) ?>"> 
          <input type=hidden name="nm_apl_menu" value="menu"> 
<?php
      if (isset($_SESSION['scriptcase']['menu_mobile']) && $_SESSION['scriptcase']['menu_mobile'] == "menu")
      {
?>
          <input type=hidden name="nmgp_url_saida" value="<?php echo $this->nm_location ?>"> 
<?php
      }
?>
        </form>
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
<?php
      if (isset($_SESSION['scriptcase']['menu_mobile']) && $_SESSION['scriptcase']['menu_mobile'] == "menu")
      {
?>
          window.history.pushState('Object', 'menu', '<?php echo $this->nm_location ?>');
<?php
      }
      if ($link_url)
      {
?>
          window.location='<?php echo $apl_run; ?>'; 
<?php
      }
      else
      {
?>
          (function() { document.fmenu.submit(); })();
<?php
      }
?>
      </script>
      </body></html>
<?php
   }
   function Gera_sc_init($apl_menu)
   {
        $_SESSION['scriptcase']['menu']['sc_init'][$apl_menu] = rand(2, 10000);
        $_SESSION['sc_session'][$_SESSION['scriptcase']['menu']['sc_init'][$apl_menu]] = array();
        $this->menu_sc_init = $_SESSION['scriptcase']['menu']['sc_init'][$apl_menu];
        return  $this->menu_sc_init;
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
      if (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../")
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
          $nm_apl_dest = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . $nm_apl_dest . "/" . $nm_apl_dest . ".php";
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

      <HTML>
      <HEAD>
       <TITLE>SIMRS</TITLE>
     <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
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
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('simrskreatifmedia');
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
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
$controle = new menu_form_php();
$controle->init();
?>
