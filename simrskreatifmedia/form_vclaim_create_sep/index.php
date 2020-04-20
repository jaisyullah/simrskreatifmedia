<?php
   include_once('form_vclaim_create_sep_session.php');
   @session_start() ;
   $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_doc']        = "";
    //check publication with the prod
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
    $str_path_apl_url = $_SERVER['PHP_SELF'];
    $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
    $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check img
    if(empty($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_imagens']))
    {
            /*check img*/$_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //check doc
    if(empty($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_doc']))
    {
            /*check doc*/$_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
    }
    //end check publication with the prod
//
class form_vclaim_create_sep_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $java_protocol;
   var $server_pdf;
   var $Arr_result;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $str_google_fonts;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_arr_db_extra_args = array();
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_ger_css_emb;
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_access;
   var $nm_bases_db2;
   var $nm_bases_ibase;
   var $nm_bases_informix;
   var $nm_bases_mssql;
   var $nm_bases_mysql;
   var $nm_bases_postgres;
   var $nm_bases_oracle;
   var $nm_bases_sqlite;
   var $nm_bases_sybase;
   var $nm_bases_vfp;
   var $nm_bases_odbc;
   var $nm_bases_progress;
   var $sc_page;
   var $sc_lig_md5 = array();
   var $sc_lig_target = array();
   var $sc_export_ajax = false;
   var $sc_export_ajax_img = false;
   var $force_db_utf8 = false;
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init, $nmgp_opcao;

      if (!function_exists("sc_check_mobile"))
      {
          include_once("../_lib/lib/php/nm_check_mobile.php");
      }
      $_SESSION['scriptcase']['proc_mobile'] = sc_check_mobile();
      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
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
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['decimal_db'] = "."; 
      $this->nm_cod_apl      = "form_vclaim_create_sep"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "simrskreatifmedia"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20180816"; 
      $this->nm_hr_criacao   = "160601"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20190818"; 
      $this->nm_hr_ult_alt   = "221109"; 
      $this->Apl_paginacao   = "PARCIAL"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0";
// 
// 
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
      $this->sc_site_ssl     = $this->appIsSsl();
      $this->sc_protocolo    = $this->sc_site_ssl ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_doc'];
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
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "sc_arafiq/sc_arafiq";
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->java_protocol   = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->server_pdf      = $this->java_protocol . $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/form_vclaim_create_sep';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_chart_theme = $this->root . $this->path_link . "_lib/chart/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      $this->Cmp_Sql_Time     = array();
      if (isset($_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['form_vclaim_create_sep']['actual_lang']) || $_SESSION['scriptcase']['form_vclaim_create_sep']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['form_vclaim_create_sep']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_simrskreatifmedia',$this->str_lang,'0','/');
      }
      if (!isset($_SESSION['scriptcase']['fusioncharts_new']))
      {
          $_SESSION['scriptcase']['fusioncharts_new'] = @is_dir($this->path_third . '/oem_fs');
      }
      if (!isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs');
      }
      if (isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $aTmpOS = $this->getRunningOS();
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs/' . $aTmpOS['os']);
      }
      if (!class_exists('Services_JSON'))
      {
          include_once("form_vclaim_create_sep_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_Link_View'] = true;
          }
      }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['ancor_save'] = $_POST['ancor_save'];
          $oJson = new Services_JSON();
          if ($_SESSION['scriptcase']['sem_session']) {
              unset($_SESSION['sc_session']);
          }
          exit;
      }
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
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_event" || $_POST['nmgp_opcao'] == "ajax_navigate"))
                  {
                      $this->Arr_result = array();
                      $this->Arr_result['redirInfo']['action']              = $nm_apl_dest;
                      $this->Arr_result['redirInfo']['target']              = $parms['T'];
                      $this->Arr_result['redirInfo']['metodo']              = "post";
                      $this->Arr_result['redirInfo']['script_case_init']    = $this->sc_page;
                      $this->Arr_result['redirInfo']['script_case_session'] = session_id();
                      $oJson = new Services_JSON();
                      echo $oJson->encode($this->Arr_result);
                      exit;
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
      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode, $remove_margin;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['remove_margin']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_vclaim_create_sep"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_vclaim_create_sep"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "ISO-8859-1";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
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
      $_SESSION['sc_session']['SC_download_violation'] = $this->Nm_lang['lang_errm_fnfd'];
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']['redir']))
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
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
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
      $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_cancel { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f84d70; border-style:solid; border-radius:4px; background-color:#f84d70; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f23e63; border-style:solid; border-radius:4px; background-color:#f23e63; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=44); opacity:0.44; padding:3px 13px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_cancel_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_cancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1abf90; border-style:solid; border-radius:4px; background-color:#1abf90; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_check_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f84d70; border-style:solid; border-radius:4px; background-color:#f84d70; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f23e63; border-style:solid; border-radius:4px; background-color:#f23e63; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=42); opacity:0.42; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_danger_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default { font-family:'Nunito', sans-serif; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_disabled { font-family:'Nunito', sans-serif; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_default_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_facebook { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#304d8a; border-style:solid; border-radius:4px; background-color:#304d8a; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2d4373; border-style:solid; border-radius:4px; background-color:#2d4373; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_facebook_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:#3b5998; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_facebook_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:hover { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:active { color:#8592a6; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_disabled { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_selected { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e0321c; border-style:solid; border-radius:4px; background-color:#e0321c; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c23321; border-style:solid; border-radius:4px; background-color:#c23321; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_google_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons { color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:hover { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:active { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_disabled { color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_icons_selected { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1abf90; border-style:solid; border-radius:4px; background-color:#1abf90; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_ok_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1678c2; border-style:solid; border-radius:4px; background-color:#1678c2; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1a69a4; border-style:solid; border-radius:4px; background-color:#1a69a4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_paypal_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small { font-family:'Nunito', sans-serif; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_disabled { font-family:'Nunito', sans-serif; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_small_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#35a2f4; border-style:solid; border-radius:4px; background-color:#35a2f4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2795e9; border-style:solid; border-radius:4px; background-color:#2795e9; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_twitter_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e60000; border-style:solid; border-radius:4px; background-color:#e60000; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c00; border-style:solid; border-radius:4px; background-color:#c00; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_youtube_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image {  }";
          echo ".scButton_sc_image:hover {  }";
          echo ".scButton_sc_image:active {  }";
          echo ".scButton_sc_image_disabled {  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_danger" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }

      $this->nm_ger_css_emb = true;
      $this->path_atual     = getcwd();
      $opsys = strtolower(php_uname());

// 
      include_once($this->path_aplicacao . "form_vclaim_create_sep_erro.class.php"); 
      $this->Erro = new form_vclaim_create_sep_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('form_vclaim_create_sep'); 
// 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("id");
      include("../_lib/css/" . $this->str_schema_all . "_grid.php");
      $this->Tree_img_col    = trim($str_tree_col);
      $this->Tree_img_exp    = trim($str_tree_exp);
      $_SESSION['scriptcase']['nmamd'] = array();
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1;
      } 
      $this->str_google_fonts= isset($str_google_fonts)?$str_google_fonts:'';
      $this->regionalDefault();
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->path_btn . $this->Str_btn_grid);
      $_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->sc_tem_trans_banco = false;
      if (isset($_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scGridPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div class=\"scGridBorder\">\r\n";
              $SS_cod_html .= "    <table class=\"scGridTabela\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scGridFieldOdd\"><td class=\"scGridFieldOddFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html) && isset($_GET['nmgp_opcao']) && (substr($_GET['nmgp_opcao'], 0, 14) == "ajax_aut_comp_" || substr($_GET['nmgp_opcao'], 0, 13) == "ajax_autocomp"))
      {
          unset($_SESSION['sc_session']);
          $oJson = new Services_JSON();
          echo $oJson->encode("ss_time_out");
          exit;
      }
      elseif (isset($SS_cod_html) && ((isset($_POST['nmgp_opcao']) && substr($_POST['nmgp_opcao'], 0, 5) == "ajax_") || (isset($_GET['nmgp_opcao']) && substr($_GET['nmgp_opcao'], 0, 5) == "ajax_")))
      {
          unset($_SESSION['sc_session']);
          $this->Arr_result = array();
          $this->Arr_result['ss_time_out'] = true;
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      $this->nm_bases_access     = array("access", "ado_access", "ace_access");
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
      $this->nm_bases_ibase      = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
      $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle");
      $this->sqlite_version      = "old";
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_progress     = array("progress", "pdo_progress_odbc");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc, $this->nm_bases_progress);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQXODQFGHANOD5F7DMNOVIB/DuFGVErqHQJmVIJsHANOV5JeDEvsVkXeHEXCDoXGDcBwZSBiHAveD5NUHgNKDkBOV5FYHMBiHQNmZSBqHArKV5FUDMrYZSXeV5FqHIJsHQNmH9FGHArYV5FaDMNOVcFKV5X7DoXGHQJmZkFUZ1vOD5XGHgrKDkB/DWF/VoBOHQXOZSX7Z1NaV5BODMvmVcFKV5BmVoBqD9BsZkFGHArKV5FaDErKHENiV5FaDorqD9NwH9X7Z1rwD5NUHuBOVIBODWFYHMBiD9BsVIraD1rwV5X7HgBeHEFKV5FaVoBOD9XsZSFGHANOD5F7HgrYDkFCDWF/VoBqD9BsZ1F7HABYV5JeDEBOHEJqV5FaDoF7D9NwH9X7HABYV5FUHuBYVcFKDWFYVoJwD9XOH9B/HArYD5BqHgvCVkJGDWF/VoJeD9NwDQFaHAveD5NUHgNKDkBOV5FYHMBiDcFYZ1FaHIveV5JsDEBeHEJGH5FYZuBqHQXOZSBiDSN7D5rqHuzGVIBsDWFaVoBiDcFYH9B/HINaZMJeHgveVkJ3DWF/VoBiDcJUZSX7Z1BYHuFaDMzGV9BUHEF/HIBiHQXGZ1X7DSNOHQJeHgBeHAFKV5B7ZuBOHQJKH9BiDSN7HQJsDMrYZSrCV5FYHMraHQBsZ1BiD1rKHQNUHgvsDkFeV5FqHIXGHQBiH9BiD1NKVWBOHgrwV9FiH5FqDoJeD9JmZ1B/D1NaD5rqHgvsHErsHEXCHIBOHQNwZ9XGHIvsVWJsDMrYVcFiV5FYHIJsHQJmZ1BOHIBOZMJeHgBYHAFKV5FqHMFaDcXGH9BiHINaVWBODMNOZSJ3V5FYHMJsHQBqZ1FGDSNOHuX7HgBeHAFKH5FYVoX7D9JKDQX7D1BOV5FGHuzGDkBOH5FqVoJwD9XOZ1F7HABYZMB/DEBeHENiV5XKDoB/D9XsZSFGHAveVWJsDMrwDkBsV5F/DoraD9BiZ1FGZ1rYD5NUDEBeZSXeH5FGDoB/D9NmZ9XGDSzGV5JwHuBYDkFCDuX7VEF7D9XOZSB/Z1BeD5FaDEvsHEFKV5FaDoXGDcJeZSFGHANOD5BqHuzGVcrsH5XCVoBqDcBqZ1FaD1rwV5FaHgvCDkBsH5FYVoX7D9JKDQX7D1BOV5FGHuzGDkBOH5FqVoJwD9JmZ1F7Z1BeD5JeDEvsHENiV5FaZuBOD9NwDQJwD1BOVWJsDMrYV9BUDuFGVErqHQNwZkBiD1NaD5BOHgNKDkBsV5XCVoX7D9XsZSX7D1BeV5FUHuNOVcFeDWXCDoJsDcBwH9B/Z1rYHQJwHgveDkXKDWBmDoJeHQBiDQBqHANKVWJsDMvOZSNiDWXCHMBiD9BsVIraD1rwV5X7HgBeHEFiDuX/ZuBOD9FYDQFUD1NKV5JeHuBYVcBODuFqHMB/D9BsH9FaDSrYV5FGHgNOHEXeDWr/DoBOHQJKDQJsZ1vCV5FGHuNOV9FeDWXCHINUDcBqZ1B/DSrYD5JeDENOHEJGDWFqVoX7D9XsDQJsHArYD5BOHgNKVcXKDWJeVoB/DcJUZSB/DSrYZMFaDEBOHEFKDWF/HIF7D9NwZSX7HIBeV5FUHuNOV9FeDWXCDoJsDcBwH9B/Z1rYHQJwHgBYHAFKV5B3DoBO";
      $this->prep_conect();
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_SweetBlue_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_SweetBlue_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = ""; 
      }
   }

   function getRunningOS()
   {
       $aOSInfo = array();

       if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
       {
           $aOSInfo['os'] = 'win';
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
       {
           $aOSInfo['os'] = 'linux-i386';
           if(strpos(strtolower(php_uname()), 'x86_64') !== FALSE) 
            {
               $aOSInfo['os'] = 'linux-amd64';
            }
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
       {
           $aOSInfo['os'] = 'macos';
       }

       return $aOSInfo;
   }

   function prep_conect()
   {
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_conexao']) && $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_perfil']) && $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_conexao']))
      {
          ob_start();
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'simrskreatifmedia', 2, $this->force_db_utf8); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S", $this->path_conf);
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['embutida_init']) 
      {
          if (!isset($_SESSION['nama'])) 
          {
              $this->nm_falta_var .= "nama; ";
          }
          if (!isset($_SESSION['noKartu'])) 
          {
              $this->nm_falta_var .= "noKartu; ";
          }
          if (!isset($_SESSION['nik'])) 
          {
              $this->nm_falta_var .= "nik; ";
          }
          if (!isset($_SESSION['sex'])) 
          {
              $this->nm_falta_var .= "sex; ";
          }
          if (!isset($_SESSION['tglLahir'])) 
          {
              $this->nm_falta_var .= "tglLahir; ";
          }
          if (!isset($_SESSION['statusPesertaKeterangan'])) 
          {
              $this->nm_falta_var .= "statusPesertaKeterangan; ";
          }
          if (!isset($_SESSION['jenisPesertaKeterangan'])) 
          {
              $this->nm_falta_var .= "jenisPesertaKeterangan; ";
          }
          if (!isset($_SESSION['hakKelasKeterangan'])) 
          {
              $this->nm_falta_var .= "hakKelasKeterangan; ";
          }
          if (!isset($_SESSION['tglCetakKartu'])) 
          {
              $this->nm_falta_var .= "tglCetakKartu; ";
          }
          if (!isset($_SESSION['tglTAT'])) 
          {
              $this->nm_falta_var .= "tglTAT; ";
          }
          if (!isset($_SESSION['tglTMT'])) 
          {
              $this->nm_falta_var .= "tglTMT; ";
          }
          if (!isset($_SESSION['dinsos'])) 
          {
              $this->nm_falta_var .= "dinsos; ";
          }
          if (!isset($_SESSION['noSKTM'])) 
          {
              $this->nm_falta_var .= "noSKTM; ";
          }
          if (!isset($_SESSION['prolanisPRB'])) 
          {
              $this->nm_falta_var .= "prolanisPRB; ";
          }
          if (!isset($_SESSION['pisa'])) 
          {
              $this->nm_falta_var .= "pisa; ";
          }
          if (!isset($_SESSION['kdProvider'])) 
          {
              $this->nm_falta_var .= "kdProvider; ";
          }
          if (!isset($_SESSION['nmProvider'])) 
          {
              $this->nm_falta_var .= "nmProvider; ";
          }
          if (!isset($_SESSION['nmAsuransi'])) 
          {
              $this->nm_falta_var .= "nmAsuransi; ";
          }
          if (!isset($_SESSION['noAsuransi'])) 
          {
              $this->nm_falta_var .= "noAsuransi; ";
          }
          if (!isset($_SESSION['tglTATAsuransi'])) 
          {
              $this->nm_falta_var .= "tglTATAsuransi; ";
          }
          if (!isset($_SESSION['tglTMTAsuransi'])) 
          {
              $this->nm_falta_var .= "tglTMTAsuransi; ";
          }
          if (!isset($_SESSION['umurSaatPelayanan'])) 
          {
              $this->nm_falta_var .= "umurSaatPelayanan; ";
          }
          if (!isset($_SESSION['umurSekarang'])) 
          {
              $this->nm_falta_var .= "umurSekarang; ";
          }
          if (!isset($_SESSION['poli_tujuan_kode'])) 
          {
              $this->nm_falta_var .= "poli_tujuan_kode; ";
          }
          if (!isset($_SESSION['poli_tujuan_nama'])) 
          {
              $this->nm_falta_var .= "poli_tujuan_nama; ";
          }
          if (!isset($_SESSION['ppk_rujukan_kode'])) 
          {
              $this->nm_falta_var .= "ppk_rujukan_kode; ";
          }
          if (!isset($_SESSION['ppk_rujukan_nama'])) 
          {
              $this->nm_falta_var .= "ppk_rujukan_nama; ";
          }
          if (!isset($_SESSION['noKunjungan'])) 
          {
              $this->nm_falta_var .= "noKunjungan; ";
          }
          if (!isset($_SESSION['tgl_kunjungan'])) 
          {
              $this->nm_falta_var .= "tgl_kunjungan; ";
          }
          if (!isset($_SESSION['no_mr'])) 
          {
              $this->nm_falta_var .= "no_mr; ";
          }
          if (!isset($_SESSION['no_telepon'])) 
          {
              $this->nm_falta_var .= "no_telepon; ";
          }
          if (!isset($_SESSION['diagnosa_kode'])) 
          {
              $this->nm_falta_var .= "diagnosa_kode; ";
          }
          if (!isset($_SESSION['diagnosa_nama'])) 
          {
              $this->nm_falta_var .= "diagnosa_nama; ";
          }
          if (!isset($_SESSION['pelayanan_kode'])) 
          {
              $this->nm_falta_var .= "pelayanan_kode; ";
          }
          if (!isset($_SESSION['hakKelasKode'])) 
          {
              $this->nm_falta_var .= "hakKelasKode; ";
          }
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
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
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
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
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
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->date_delim  = "";
          $this->date_delim1 = "";
      }
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
      {
          $this->date_delim  = "#";
          $this->date_delim1 = "#";
      }
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_sep_date1'];
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_cancel { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f84d70; border-style:solid; border-radius:4px; background-color:#f84d70; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f23e63; border-style:solid; border-radius:4px; background-color:#f23e63; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=44); opacity:0.44; padding:3px 13px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_cancel_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_cancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1abf90; border-style:solid; border-radius:4px; background-color:#1abf90; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_check_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f84d70; border-style:solid; border-radius:4px; background-color:#f84d70; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f23e63; border-style:solid; border-radius:4px; background-color:#f23e63; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=42); opacity:0.42; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_danger_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default { font-family:'Nunito', sans-serif; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_disabled { font-family:'Nunito', sans-serif; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_default_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_facebook { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#304d8a; border-style:solid; border-radius:4px; background-color:#304d8a; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2d4373; border-style:solid; border-radius:4px; background-color:#2d4373; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_facebook_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:#3b5998; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_facebook_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:hover { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:active { color:#8592a6; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_disabled { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_selected { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e0321c; border-style:solid; border-radius:4px; background-color:#e0321c; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c23321; border-style:solid; border-radius:4px; background-color:#c23321; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_google_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons { color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:hover { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:active { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_disabled { color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_icons_selected { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1abf90; border-style:solid; border-radius:4px; background-color:#1abf90; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_ok_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1678c2; border-style:solid; border-radius:4px; background-color:#1678c2; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1a69a4; border-style:solid; border-radius:4px; background-color:#1a69a4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_paypal_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small { font-family:'Nunito', sans-serif; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_disabled { font-family:'Nunito', sans-serif; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_small_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#35a2f4; border-style:solid; border-radius:4px; background-color:#35a2f4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2795e9; border-style:solid; border-radius:4px; background-color:#2795e9; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_twitter_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:hover { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e60000; border-style:solid; border-radius:4px; background-color:#e60000; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:active { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c00; border-style:solid; border-radius:4px; background-color:#c00; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_disabled { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_youtube_selected { font-family:'Nunito', sans-serif; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image {  }";
          echo ".scButton_sc_image:hover {  }";
          echo ".scButton_sc_image:active {  }";
          echo ".scButton_sc_image_disabled {  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_danger" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

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
   function conectDB()
   {
      global $glo_senha_protect;
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_conexao'], $this->root . $this->path_prod, 'simrskreatifmedia', 1, $this->force_db_utf8); 
      } 
      else 
      { 
          ob_start();
          $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_database_encoding;
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $databaseEncoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_start();
          } 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
          $this->Ibase_version = "old";
          if ($ibase_version = $this->Db->Execute("SELECT RDB\$GET_CONTEXT('SYSTEM','ENGINE_VERSION') AS \"Version\" FROM RDB\$DATABASE"))
          {
              if (isset($ibase_version->fields[0]) && substr($ibase_version->fields[0], 0, 1) > 2) {$this->Ibase_version = "new";}
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
          $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_end_clean();
          } 
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
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
// 
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_mysql")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           $delim  = "'";
           $delim1 = "'";
           if (in_array(strtolower($TP_banco), $this->nm_bases_access))
           {
               $delim  = "#";
               $delim1 = "#";
           }
           if (isset($_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
   function sc_Date_Protect($val_dt)
   {
       $dd = substr($val_dt, 8, 2);
       $mm = substr($val_dt, 5, 2);
       $yy = substr($val_dt, 0, 4);
       $hh = (strlen($val_dt) > 10) ? substr($val_dt, 10) : "";
       if ($mm > 12) {
           $mm = 12;
       }
       $dd_max = 31;
       if ($mm == '04' || $mm == '06' || $mm == '09' || $mm == 11) {
           $dd_max = 30;
       }
       if ($mm == '02') {
           $dd_max = ($yy % 4 == 0) ? 29 : 28;
       }
       if ($dd > $dd_max) {
           $dd = $dd_max;
       }
       return $yy . "-" . $mm . "-" . $dd . $hh;
   }
	function appIsSsl() {
		if (isset($_SERVER['HTTPS'])) {
			if ('on' == strtolower($_SERVER['HTTPS'])) {
				return true;
			}
			if ('1' == $_SERVER['HTTPS']) {
				return true;
			}
		}

		if (isset($_SERVER['REQUEST_SCHEME'])) {
			if ('https' == $_SERVER['REQUEST_SCHEME']) {
				return true;
			}
		}

		if (isset($_SERVER['SERVER_PORT'])) {
			if ('443' == $_SERVER['SERVER_PORT']) {
				return true;
			}
		}

		return false;
	}
   function Get_Gb_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['form_vclaim_create_sep']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
   }

   function GB_date_format($val, $format, $prefix, $conf_region="S", $mask="")
   {
           return $val;
   }
   function Get_arg_groupby($val, $format)
   {
       return $val; 
   }
   function Get_format_dimension($ind_ini, $ind_qb, $campo, $rs, $conf_region="S", $mask="")
   {
       $retorno    = array();
       $format     = $this->Get_Gb_date_format($ind_qb, $campo);
       $Prefix_dat = $this->Get_Gb_prefix_date_format($ind_qb, $campo);
       if (empty($format) || $rs->fields[$ind_ini] == "")
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHIISS')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3,4");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3] . ":" . $rs->fields[$ind_ini + 4];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDD2')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMM')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'BIMONTHLY' || $format == 'QUARTER' || $format == 'FOURMONTHS' || $format == 'SEMIANNUAL' || $format == 'WEEK')
       {
           $temp            = (substr($rs->fields[$ind_ini], 0, 1) == 0) ? substr($rs->fields[$ind_ini], 1) : $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $Prefix_dat . $temp;
           return $retorno;
       }
       if ($format == 'DAYNAME'|| $format == 'YYYYDAYNAME')
       {
           if ($format == 'DAYNAME')
           {
               $retorno['orig'] = $rs->fields[$ind_ini];
               $ano             = "";
               $daynum          = $rs->fields[$ind_ini];
           }
           else
           {
               $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
               $ano             = " " . $rs->fields[$ind_ini];
               $daynum          = $rs->fields[$ind_ini + 1];
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress))
           {
               $daynum--;
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               $daynum = ($daynum == 6) ? 0 : $daynum + 1;
           }
           if ($daynum == 0) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_sund'] . $ano;
           }
           if ($daynum == 1) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_mond'] . $ano;
           }
           if ($daynum == 2) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_tued'] . $ano;
           }
           if ($daynum == 3) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_wend'] . $ano;
           }
           if ($daynum == 4) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_thud'] . $ano;
           }
           if ($daynum == 5) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_frid'] . $ano;
           }
           if ($daynum == 6) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_satd'] . $ano;
           }
           return $retorno;
       }
       if ($format == 'HH')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-00 " . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'DD')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'MM')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $temp            = $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-00 " . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'YYYYWEEK' || $format == 'YYYYBIMONTHLY' || $format == 'YYYYQUARTER' || $format == 'YYYYFOURMONTHS' || $format == 'YYYYSEMIANNUAL')
       {
           $temp            = (substr($rs->fields[$ind_ini + 1], 0, 1) == 0) ? substr($rs->fields[$ind_ini + 1], 1) : $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $Prefix_dat . $temp . " " . $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYHH' || $format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $rs->fields[$ind_ini] . $_SESSION['scriptcase']['reg_conf']['date_sep'] . $rs->fields[$ind_ini + 1];
           return $retorno;
       }
       elseif ($format == 'HHIISS')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1,2");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1] . ":" . $rs->fields[$ind_ini + 2];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'HHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       else
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
   }
   function Ajust_fields($ind_ini, &$rs, $parts)
   {
       $prep = explode(",", $parts);
       foreach ($prep as $ind)
       {
           $ind_ok = $ind_ini + $ind;
           $rs->fields[$ind_ok] = (int) $rs->fields[$ind_ok];
           if (strlen($rs->fields[$ind_ok]) == 1)
           {
               $rs->fields[$ind_ok] = "0" . $rs->fields[$ind_ok];
           }
       }
   }
   function Get_date_order_groupby($sql_def, $order, $format="", $order_old="")
   {
       $order      = " " . trim($order);
       $order_old .= (!empty($order_old)) ? ", " : "";
       return $order_old . $sql_def . $order;
   }
}
//===============================================================================
//
class form_vclaim_create_sep_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
   }
//
//----- 
   function controle()
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $glo_senha_protect;

      $this->Ini = new form_vclaim_create_sep_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_create_sep']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_create_sep']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_vclaim_create_sep']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_vclaim_create_sep'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_vclaim_create_sep']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_vclaim_create_sep']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_vclaim_create_sep') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_vclaim_create_sep']['label'] = "Pembuatan SEP";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_vclaim_create_sep")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_create_sep']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_create_sep']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_create_sep']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      $this->nm_data = new nm_data("id");
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Ini->Nm_lang['lang_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_mnth_june'],
                                  $this->Ini->Nm_lang['lang_mnth_july'],
                                  $this->Ini->Nm_lang['lang_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Ini->Nm_lang['lang_days_sund'],
                                  $this->Ini->Nm_lang['lang_days_mond'],
                                  $this->Ini->Nm_lang['lang_days_tued'],
                                  $this->Ini->Nm_lang['lang_days_wend'],
                                  $this->Ini->Nm_lang['lang_days_thud'],
                                  $this->Ini->Nm_lang['lang_days_frid'],
                                  $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                  $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                  $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                  $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                  $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                  $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                  $this->Ini->Nm_lang['lang_shrt_days_satd']);
      $this->Db = $this->Ini->Db; 
      include_once($this->Ini->path_aplicacao . "form_vclaim_create_sep_erro.class.php"); 
      $this->Erro      = new form_vclaim_create_sep_erro();
      $this->Erro->Ini = $this->Ini;
//
      $_SESSION['scriptcase']['form_vclaim_create_sep']['contr_erro'] = 'on';
if (!isset($_SESSION['no_telepon'])) {$_SESSION['no_telepon'] = "";}
if (!isset($this->sc_temp_no_telepon)) {$this->sc_temp_no_telepon = (isset($_SESSION['no_telepon'])) ? $_SESSION['no_telepon'] : "";}
if (!isset($_SESSION['diagnosa_nama'])) {$_SESSION['diagnosa_nama'] = "";}
if (!isset($this->sc_temp_diagnosa_nama)) {$this->sc_temp_diagnosa_nama = (isset($_SESSION['diagnosa_nama'])) ? $_SESSION['diagnosa_nama'] : "";}
if (!isset($_SESSION['diagnosa_kode'])) {$_SESSION['diagnosa_kode'] = "";}
if (!isset($this->sc_temp_diagnosa_kode)) {$this->sc_temp_diagnosa_kode = (isset($_SESSION['diagnosa_kode'])) ? $_SESSION['diagnosa_kode'] : "";}
if (!isset($_SESSION['tgl_kunjungan'])) {$_SESSION['tgl_kunjungan'] = "";}
if (!isset($this->sc_temp_tgl_kunjungan)) {$this->sc_temp_tgl_kunjungan = (isset($_SESSION['tgl_kunjungan'])) ? $_SESSION['tgl_kunjungan'] : "";}
if (!isset($_SESSION['poli_tujuan_nama'])) {$_SESSION['poli_tujuan_nama'] = "";}
if (!isset($this->sc_temp_poli_tujuan_nama)) {$this->sc_temp_poli_tujuan_nama = (isset($_SESSION['poli_tujuan_nama'])) ? $_SESSION['poli_tujuan_nama'] : "";}
if (!isset($_SESSION['poli_tujuan_kode'])) {$_SESSION['poli_tujuan_kode'] = "";}
if (!isset($this->sc_temp_poli_tujuan_kode)) {$this->sc_temp_poli_tujuan_kode = (isset($_SESSION['poli_tujuan_kode'])) ? $_SESSION['poli_tujuan_kode'] : "";}
if (!isset($_SESSION['umurSekarang'])) {$_SESSION['umurSekarang'] = "";}
if (!isset($this->sc_temp_umurSekarang)) {$this->sc_temp_umurSekarang = (isset($_SESSION['umurSekarang'])) ? $_SESSION['umurSekarang'] : "";}
if (!isset($_SESSION['umurSaatPelayanan'])) {$_SESSION['umurSaatPelayanan'] = "";}
if (!isset($this->sc_temp_umurSaatPelayanan)) {$this->sc_temp_umurSaatPelayanan = (isset($_SESSION['umurSaatPelayanan'])) ? $_SESSION['umurSaatPelayanan'] : "";}
if (!isset($_SESSION['tglTMTAsuransi'])) {$_SESSION['tglTMTAsuransi'] = "";}
if (!isset($this->sc_temp_tglTMTAsuransi)) {$this->sc_temp_tglTMTAsuransi = (isset($_SESSION['tglTMTAsuransi'])) ? $_SESSION['tglTMTAsuransi'] : "";}
if (!isset($_SESSION['tglTATAsuransi'])) {$_SESSION['tglTATAsuransi'] = "";}
if (!isset($this->sc_temp_tglTATAsuransi)) {$this->sc_temp_tglTATAsuransi = (isset($_SESSION['tglTATAsuransi'])) ? $_SESSION['tglTATAsuransi'] : "";}
if (!isset($_SESSION['noAsuransi'])) {$_SESSION['noAsuransi'] = "";}
if (!isset($this->sc_temp_noAsuransi)) {$this->sc_temp_noAsuransi = (isset($_SESSION['noAsuransi'])) ? $_SESSION['noAsuransi'] : "";}
if (!isset($_SESSION['nmAsuransi'])) {$_SESSION['nmAsuransi'] = "";}
if (!isset($this->sc_temp_nmAsuransi)) {$this->sc_temp_nmAsuransi = (isset($_SESSION['nmAsuransi'])) ? $_SESSION['nmAsuransi'] : "";}
if (!isset($_SESSION['nmProvider'])) {$_SESSION['nmProvider'] = "";}
if (!isset($this->sc_temp_nmProvider)) {$this->sc_temp_nmProvider = (isset($_SESSION['nmProvider'])) ? $_SESSION['nmProvider'] : "";}
if (!isset($_SESSION['kdProvider'])) {$_SESSION['kdProvider'] = "";}
if (!isset($this->sc_temp_kdProvider)) {$this->sc_temp_kdProvider = (isset($_SESSION['kdProvider'])) ? $_SESSION['kdProvider'] : "";}
if (!isset($_SESSION['pisa'])) {$_SESSION['pisa'] = "";}
if (!isset($this->sc_temp_pisa)) {$this->sc_temp_pisa = (isset($_SESSION['pisa'])) ? $_SESSION['pisa'] : "";}
if (!isset($_SESSION['prolanisPRB'])) {$_SESSION['prolanisPRB'] = "";}
if (!isset($this->sc_temp_prolanisPRB)) {$this->sc_temp_prolanisPRB = (isset($_SESSION['prolanisPRB'])) ? $_SESSION['prolanisPRB'] : "";}
if (!isset($_SESSION['noSKTM'])) {$_SESSION['noSKTM'] = "";}
if (!isset($this->sc_temp_noSKTM)) {$this->sc_temp_noSKTM = (isset($_SESSION['noSKTM'])) ? $_SESSION['noSKTM'] : "";}
if (!isset($_SESSION['dinsos'])) {$_SESSION['dinsos'] = "";}
if (!isset($this->sc_temp_dinsos)) {$this->sc_temp_dinsos = (isset($_SESSION['dinsos'])) ? $_SESSION['dinsos'] : "";}
if (!isset($_SESSION['tglTMT'])) {$_SESSION['tglTMT'] = "";}
if (!isset($this->sc_temp_tglTMT)) {$this->sc_temp_tglTMT = (isset($_SESSION['tglTMT'])) ? $_SESSION['tglTMT'] : "";}
if (!isset($_SESSION['tglTAT'])) {$_SESSION['tglTAT'] = "";}
if (!isset($this->sc_temp_tglTAT)) {$this->sc_temp_tglTAT = (isset($_SESSION['tglTAT'])) ? $_SESSION['tglTAT'] : "";}
if (!isset($_SESSION['tglCetakKartu'])) {$_SESSION['tglCetakKartu'] = "";}
if (!isset($this->sc_temp_tglCetakKartu)) {$this->sc_temp_tglCetakKartu = (isset($_SESSION['tglCetakKartu'])) ? $_SESSION['tglCetakKartu'] : "";}
if (!isset($_SESSION['hakKelasKeterangan'])) {$_SESSION['hakKelasKeterangan'] = "";}
if (!isset($this->sc_temp_hakKelasKeterangan)) {$this->sc_temp_hakKelasKeterangan = (isset($_SESSION['hakKelasKeterangan'])) ? $_SESSION['hakKelasKeterangan'] : "";}
if (!isset($_SESSION['jenisPesertaKeterangan'])) {$_SESSION['jenisPesertaKeterangan'] = "";}
if (!isset($this->sc_temp_jenisPesertaKeterangan)) {$this->sc_temp_jenisPesertaKeterangan = (isset($_SESSION['jenisPesertaKeterangan'])) ? $_SESSION['jenisPesertaKeterangan'] : "";}
if (!isset($_SESSION['statusPesertaKeterangan'])) {$_SESSION['statusPesertaKeterangan'] = "";}
if (!isset($this->sc_temp_statusPesertaKeterangan)) {$this->sc_temp_statusPesertaKeterangan = (isset($_SESSION['statusPesertaKeterangan'])) ? $_SESSION['statusPesertaKeterangan'] : "";}
if (!isset($_SESSION['tglLahir'])) {$_SESSION['tglLahir'] = "";}
if (!isset($this->sc_temp_tglLahir)) {$this->sc_temp_tglLahir = (isset($_SESSION['tglLahir'])) ? $_SESSION['tglLahir'] : "";}
if (!isset($_SESSION['sex'])) {$_SESSION['sex'] = "";}
if (!isset($this->sc_temp_sex)) {$this->sc_temp_sex = (isset($_SESSION['sex'])) ? $_SESSION['sex'] : "";}
if (!isset($_SESSION['nik'])) {$_SESSION['nik'] = "";}
if (!isset($this->sc_temp_nik)) {$this->sc_temp_nik = (isset($_SESSION['nik'])) ? $_SESSION['nik'] : "";}
if (!isset($_SESSION['nama'])) {$_SESSION['nama'] = "";}
if (!isset($this->sc_temp_nama)) {$this->sc_temp_nama = (isset($_SESSION['nama'])) ? $_SESSION['nama'] : "";}
if (!isset($_SESSION['ppk_rujukan_nama'])) {$_SESSION['ppk_rujukan_nama'] = "";}
if (!isset($this->sc_temp_ppk_rujukan_nama)) {$this->sc_temp_ppk_rujukan_nama = (isset($_SESSION['ppk_rujukan_nama'])) ? $_SESSION['ppk_rujukan_nama'] : "";}
if (!isset($_SESSION['ppk_rujukan_kode'])) {$_SESSION['ppk_rujukan_kode'] = "";}
if (!isset($this->sc_temp_ppk_rujukan_kode)) {$this->sc_temp_ppk_rujukan_kode = (isset($_SESSION['ppk_rujukan_kode'])) ? $_SESSION['ppk_rujukan_kode'] : "";}
if (!isset($_SESSION['noKunjungan'])) {$_SESSION['noKunjungan'] = "";}
if (!isset($this->sc_temp_noKunjungan)) {$this->sc_temp_noKunjungan = (isset($_SESSION['noKunjungan'])) ? $_SESSION['noKunjungan'] : "";}
if (!isset($_SESSION['no_mr'])) {$_SESSION['no_mr'] = "";}
if (!isset($this->sc_temp_no_mr)) {$this->sc_temp_no_mr = (isset($_SESSION['no_mr'])) ? $_SESSION['no_mr'] : "";}
if (!isset($_SESSION['hakKelasKode'])) {$_SESSION['hakKelasKode'] = "";}
if (!isset($this->sc_temp_hakKelasKode)) {$this->sc_temp_hakKelasKode = (isset($_SESSION['hakKelasKode'])) ? $_SESSION['hakKelasKode'] : "";}
if (!isset($_SESSION['pelayanan_kode'])) {$_SESSION['pelayanan_kode'] = "";}
if (!isset($this->sc_temp_pelayanan_kode)) {$this->sc_temp_pelayanan_kode = (isset($_SESSION['pelayanan_kode'])) ? $_SESSION['pelayanan_kode'] : "";}
if (!isset($_SESSION['noKartu'])) {$_SESSION['noKartu'] = "";}
if (!isset($this->sc_temp_noKartu)) {$this->sc_temp_noKartu = (isset($_SESSION['noKartu'])) ? $_SESSION['noKartu'] : "";}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Surat Eligibilitas Pasien</title>
		<link href="<?php echo sc_url_library('prj','bootstrap3','bootstrap3/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<script src="<?php echo sc_url_library('prj','bootstrap3','bootstrap3/js/jquery.js'); ?>"></script>
		<script src="<?php echo sc_url_library('prj','bootstrap3','bootstrap3/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo sc_url_library('prj','bootstrap3','bootstrap3/js/jquery.slimscroll.min.js'); ?>"></script>
		<script src="<?php echo sc_url_library('prj','bootstrap3','bootstrap3/js/bootstrap-datepicker.min.js'); ?>"></script>
		
		<script>
			$(document).ready(function() {
				
				$('#scroll_profile').slimScroll({
					alwaysVisible: true,
					height: '460px'
				});
				
				$('#area-lakalantas').hide();
				
				$('#tgl_sep').datepicker({
					format: "yyyy-mm-dd",
					todayBtn: "linked",
					keyboardNavigation: false,
					forceParse: false,
					calendarWeeks: true,
					autoclose: true
				});
				
			});
			
			function showFieldLakalantas(){
				
				var valOpsiLakalantas = $('#opsi_laka_lantas').val();
				if(valOpsiLakalantas == 1){				   
				   $('#area-lakalantas').show();
				}else{				   
				   $('#area-lakalantas').hide();
				}
				
			}		
			
			
			
			
			function insertSep(){		
				
			
				var form_data = {			
					
					no_kartu			: "<?php echo $this->sc_temp_noKartu; ?>",
					tgl_sep				: $("#tgl_sep").val(),
					jns_pelayanan		: "<?php echo $this->sc_temp_pelayanan_kode; ?>",
					kelas_rawat			: "<?php echo $this->sc_temp_hakKelasKode; ?>",
					no_mr				: "<?php echo $this->sc_temp_no_mr; ?>",
					asal_rujukan		: $("#asal_rujukan").val(),
					tgl_rujukan			: $("#tgl_rujukan").val(),
					no_kunjungan		: "<?php echo $this->sc_temp_noKunjungan; ?>",
					ppk_rujukan_kode	: "<?php echo $this->sc_temp_ppk_rujukan_kode; ?>",
					ppk_rujukan_nama	: "<?php echo $this->sc_temp_ppk_rujukan_nama; ?>",
					catatan				: $("#catatan").val(),
					diag_awal_kode		: $("#diag_awal_kode").val(),
					poli_tujuan_kode	: $("#poli_tujuan_kode").val(),
					poli_eksekutif		: $('#poli_eksekutif').is(":checked") ? "1" : "0",
					cob					: $('#cob').is(":checked") ? "1" : "0",
					katarak				: $("#opsi_katarak").val(),
					no_sep_suplesi		: $("#no_sep_suplesi").val(),
					opsi_laka_lantas	: $("#opsi_laka_lantas").val(),
					penjamin_1			: $("#penjamin_1").is(":checked") ? "1" : "",
					penjamin_2			: $("#penjamin_2").is(":checked") ? "2" : "",
					penjamin_3			: $("#penjamin_3").is(":checked") ? "3" : "",
					penjamin_4			: $("#penjamin_4").is(":checked") ? "4" : "",					
					tgl_kejadian		: $("#tgl_kejadian").val(),
					keterangan_laka		: $("#keterangan_laka").val(),
					suplesi				: $("#opsi_laka_suplesi").val(),
					kd_propinsi			: $("#kd_propinsi").val(),
					kd_kabupaten		: $("#kd_kabupaten").val(),
					kd_kecamatan		: $("#kd_kecamatan").val(),
					no_surat			: $("#no_surat").val(),
					kode_dpjp			: $("#kode_dpjp").val(),
					no_telp				: $("#no_telp").val()
					
				}
				
			
			
				$.ajax({
					url		: '<?php echo $this->Ini->path_link . "" . SC_dir_app_name('form_vclaim_create_sep_exec') . "/?script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&nmgp_url_saida=" . $this->nm_location; ?>',
					type	: 'POST',
					data	: form_data,
					dataType: "json",
					cache	: false,
					success	: function(response){					
						console.log(response);
						$("#area_show_response").empty();
						$("#area_show_response").append('<div class="alert alert-' + response.alert + '"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Kode ' + response.code + '</strong><br>' + response.message + '</div>');
						
						var new_no_sep = response.no_sep;
						
						if(new_no_sep != 'empty'){
							$("#area_btn_cetak").empty();
							$("#area_btn_cetak").append('<button id="btn_cetak" type="button" class="btn btn-info btn-block" onclick="printSep(\''+ new_no_sep +'\')">&nbsp;Cetak&nbsp;</button>');			
						}						
							
					},			
					
					error: function () {
					}
				});
			
			}
			
			
			function getCheckBoxVal(){
				var valCheckBox = $("#penjamin_3").val();
				
				if ($('#penjamin_3').is(":checked")){
				 	var valCheckBox = $("#penjamin_3").val();
				}else{
					var valCheckBox = '';
				}			
				alert("The value is: " + valCheckBox);
			}
			
			function returnToRujukanSearch(){
				location.href ="<?php echo $this->Ini->path_link . "" . SC_dir_app_name('form_vclaim_rujukan_search') . "/?script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&nmgp_url_saida=" . $this->nm_location; ?>";				
			}
			
			function printSep(kode_sep){
				
				location.href ="<?php 
					$host 		= $_SERVER['HTTP_HOST'];
					$url 		= $_SERVER['REQUEST_URI'];
					$url_pos 	= strpos($url,"form_vclaim_create_sep");
					$app_url 	= substr($url,1,$url_pos - 1);
					$base_url 	= 'http://'.$host.'/'.$app_url;
					echo $base_url.'form_vclaim_sep_surat_data_source/form_vclaim_sep_surat_data_source.php?no_sep=';
					?>" + kode_sep;
			}
			
		</script>
		<style>
			.mt30{
				margin-top: 30px;				
			}
			
			.pt5{
				padding-top: 5px;				
			}
			
			.gi-2x{font-size: 2em;}
			.gi-3x{font-size: 3em;}
			.gi-4x{font-size: 4em;}
			.gi-5x{font-size: 5em;}
			
			.fs11{font-size: 11px;}
		</style>
	</head>
	<body>

		<div class="container mt30">
			<div class="row">
				<div class="col-sm-4">
					
					<div class="panel panel-default">						
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-3">									
									<span class="glyphicon glyphicon-user gi-5x"></span>								
								</div>
								<div class="col-sm-9 pt5">									
									<h5><strong><span id="nama"><?php echo $this->sc_temp_nama; ?></span></strong></h5> 
									<p><span id="no_kartu"><?php echo $this->sc_temp_noKartu; ?></span></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-heading">
							Data Pasien
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12" id="scroll_profile">
									
									<strong>NIK</strong>
									<br>
									<span id="nik" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_nik)){
												echo $this->sc_temp_nik;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Jenis Kelamin</strong>
									<br>
									<span id="sex" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_sex)){
												
												if($this->sc_temp_sex == 'L'){
													echo 'LAKI-LAKI';
												}else{
													echo 'PEREMPUAN';
												}
												
											}else{
												echo '--';
											}

										?>									
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Tanggal Lahir</strong>
									<br>
									<span id="tgl_lahir" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_tglLahir)){
												echo $this->sc_temp_tglLahir;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Status Peserta</strong>
									<br>
									<span id="status_peserta" class="fs11">										
										<?php
											
											if(!empty($this->sc_temp_statusPesertaKeterangan)){
												echo $this->sc_temp_statusPesertaKeterangan;
											}else{
												echo '--';
											}

										?>									
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Jenis Peserta</strong>
									<br>
									<span id="jenis_peserta" class="fs11">
									
										<?php
											
											if(!empty($this->sc_temp_jenisPesertaKeterangan)){
												echo $this->sc_temp_jenisPesertaKeterangan;
											}else{
												echo '--';
											}

										?>
										
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Hak Kelas</strong>
									<br>
									<span id="hak_kelas" class="fs11">
									
										<?php
											
											if(!empty($this->sc_temp_hakKelasKeterangan)){
												echo $this->sc_temp_hakKelasKeterangan;
											}else{
												echo '--';
											}

										?>
									
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Tanggal Cetak Kartu</strong>
									<br>
									<span id="tgl_cetak_kartu" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_tglCetakKartu)){
												echo $this->sc_temp_tglCetakKartu;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Tanggal TAT</strong>
									<br>
									<span id="tgl_tat" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_tglTAT)){
												echo $this->sc_temp_tglTAT;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Tanggal TMT</strong>
									<br>
									<span id="tgl_tmt" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_tglTMT)){
												echo $this->sc_temp_tglTMT;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">									
									
									<strong>Dinas Sosial</strong>
									<br>
									<span id="dinsos" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_dinsos)){
												echo $this->sc_temp_dinsos;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>No. SKTM</strong>
									<br>
									<span id="no_sktm" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_noSKTM)){
												echo $this->sc_temp_noSKTM;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Prolanis PRB</strong>
									<br>
									<span id="prolanis_prb" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_prolanisPRB)){
												echo $this->sc_temp_prolanisPRB;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>PISA</strong>
									<br>
									<span id="pisa" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_pisa)){
												echo $this->sc_temp_pisa;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Provider Umum</strong>
									<br>
									<span id="prov_umum" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_kdProvider)){
												echo $this->sc_temp_kdProvider.' - '.$this->sc_temp_nmProvider;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Asuransi</strong>
									<br>
									<span id="nm_asuransi" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_nmAsuransi)){
												echo $this->sc_temp_nmAsuransi;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>No. Polis</strong>
									<br>
									<span id="no_asuransi" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_noAsuransi)){
												echo $this->sc_temp_noAsuransi;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>TAT Asuransi</strong>
									<br>
									<span id="tat_asuransi" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_tglTATAsuransi)){
												echo $this->sc_temp_tglTATAsuransi;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>TMT Asuransi</strong>
									<br>
									<span id="tmt_asuransi" class="fs11">
										<?php
											
											if(!empty($this->sc_temp_tglTMTAsuransi)){
												echo $this->sc_temp_tglTMTAsuransi;
											}else{
												echo '--';
											}

										?>
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Umur Saat Pelayanan</strong>
									<br>
									<span id="umur_pelayanan" class="fs11">
									
										<?php
											
											if(!empty($this->sc_temp_umurSaatPelayanan)){
												echo $this->sc_temp_umurSaatPelayanan;
											}else{
												echo '--';
											}

										?>
									
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
									<strong>Umur Sekarang</strong>
									<br>
									<span id="umur_sekarang" class="fs11">
									
										<?php
											
											if(!empty($this->sc_temp_umurSekarang)){
												echo $this->sc_temp_umurSekarang;
											}else{
												echo '--';
											}

										?>
									
									</span>
									<hr style="margin-top:5px;margin-bottom:5px;">
									
								</div>
							</div>
						</div>
					</div>
					
					<div id="area_show_response"></div>					
					
					
				</div>
				<div class="col-sm-8">

					<div class="panel panel-default">
						<div class="panel-heading">
							
							<div class="row">
								<div class="col-md-6">
									<strong><span id="no_sep">-</span></strong>
								</div>
								<div class="col-md-6" style="text-align:right;">
									<strong><span id="jenis_pelayanan">-</span></strong>
								</div>
							</div>							
							
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">	
									
									
									<form class="form-horizontal">
										<fieldset>										

											<!-- Prepended checkbox -->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="spesialis">Spesialis/Subspesialis</label>
											  <div class="col-md-9">
												<div class="input-group">
												  <span class="input-group-addon">     
													  <input type="checkbox" id="poli_eksekutif"> Eksekutif    
												  </span>
													<input id="poli_tujuan_kode" name="poli_tujuan_kode" type="hidden" value="<?php echo $this->sc_temp_poli_tujuan_kode; ?>">
												 	<input id="poli_tujuan_nama" name="poli_tujuan_nama" class="form-control" type="text" placeholder="" value="<?php echo $this->sc_temp_poli_tujuan_nama; ?>">
												</div>
											  </div>
											</div>
											

											<!-- Select Basic -->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="asal_rujukan">Asal Rujukan</label>
											  <div class="col-md-9">
												<select id="asal_rujukan" name="asal_rujukan" class="form-control" disabled>
												  <option value="1">Faskes Tingkat 1</option>
												  <option value="2">Faskes Tingkat 2</option>
												</select>
											  </div>
											</div>
											
											<!-- Text input-->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="ppkAsalRujukan">PPK Asal Rujukan</label>  
											  <div class="col-md-9">
												  <input id="ppk_rujukan_kode" name="ppk_rujukan_kode" type="hidden" value="<?php echo $this->sc_temp_ppk_rujukan_kode; ?>">
											  	  <input id="ppk_rujukan_nama" name="ppk_rujukan_nama" type="text" placeholder="" class="form-control input-md" disabled value="<?php echo $this->sc_temp_ppk_rujukan_nama; ?>">
											  </div>
											</div>
											
											
											<!-- Appended Input-->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="tglRujukan">Tanggal Rujukan</label>
											  <div class="col-md-4">
												<div class="input-group">
												  <input id="tgl_rujukan" name="tgl_rujukan" class="form-control" disabled  placeholder="" type="text" value="<?php echo $this->sc_temp_tgl_kunjungan; ?>">
												  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
												</div>
											  </div>
											</div>
											
											<!-- Text input-->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="no_kunjungan">No. Rujukan</label>  
											  <div class="col-md-9">
											  	<input id="no_kunjungan" name="no_kunjungan" type="text" placeholder="" class="form-control input-md" disabled value="<?php echo $this->sc_temp_noKunjungan; ?>">
											  </div>
											</div>
											
											<!-- Text input-->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="no_surat">No. Surat Kontrol</label>  
											  <div class="col-md-9">
											  	<input id="no_surat" name="no_surat" type="text" placeholder="Ketikkan nomor surat kontrol" class="form-control input-md" disabled value="">
											  </div>
											</div>
											
											<!-- Text input-->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="kode_dpjp">DPJP Pemberi SKDP</label>  
											  <div class="col-md-9">
											  	<input id="kode_dpjp" name="kode_dpjp" type="text" placeholder="Ketikkan nama dokter DPJP pemberi surat SKDP/SPRI" class="form-control input-md" disabled value="">
											  </div>
											</div>
											
											<!-- Appended Input-->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="tgl_sep">Tanggal SEP</label>
											  <div class="col-md-4">
												<div class="input-group">
												  <input id="tgl_sep" name="tgl_sep" class="form-control" placeholder="" type="text">
												  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
												</div>
											  </div>
											</div>
											
											<!-- Appended checkbox -->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="no_mr">No. MR</label>
											  <div class="col-md-9">
												<div class="input-group">
												  <input id="no_mr" name="no_mr" class="form-control" type="text" placeholder="" value="<?php echo $this->sc_temp_no_mr; ?>">
														<span class="input-group-addon">     
													  <input type="checkbox" id="cob"> Peserta COB     
												  </span>
												</div>
											  </div>
											</div>
											
											<!-- Select Basic -->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="opsi_katarak">Katarak ?</label>
											  <div class="col-md-4">
												<select id="opsi_katarak" name="opsi_katarak" class="form-control" disabled>
												  <option value="0">Tidak</option>
												  <option value="1">Ya</option>
												</select>
											  </div>
											</div>

											<!-- Text input-->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="diag_awal">Diagnosa</label>  
											  <div class="col-md-9">
												<input id="diag_awal_kode" name="diag_awal_kode" type="hidden" value="<?php echo $this->sc_temp_diagnosa_kode; ?>">  
											  	<input id="diag_awal_nama" name="diag_awal_nama" type="text" placeholder="" class="form-control input-md" value="<?php echo $this->sc_temp_diagnosa_nama; ?>">
											  </div>
											</div>
											
											<!-- Text input-->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="no_telp">No. Telepon</label>  
											  <div class="col-md-9">
											  	<input id="no_telp" name="no_telp" type="text" placeholder="" class="form-control input-md" value="<?php echo $this->sc_temp_no_telepon; ?>">
											  </div>
											</div>
											
											<!-- Textarea -->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="catatan">Catatan</label>
											  <div class="col-md-9">											  
												  <textarea class="form-control" id="catatan" name="catatan"></textarea>
											  </div>
											</div>
											
											<!-- Select Basic -->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="asalRujukan">Lakalantas ?</label>
											  <div class="col-md-4">
												<select id="opsi_laka_lantas" name="opsi_laka_lantas" class="form-control" onchange="showFieldLakalantas()" disabled>
												  <option value="0">Tidak</option>
												  <option value="1">Ya</option>
												</select>
											  </div>
											</div>
											
											<div id="area-lakalantas">
											
											<!-- Multiple Checkboxes (inline) -->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="penjamin"><a href="javascript:getCheckBoxVal()">Penjamin</a></label>
											  <div class="col-md-9">
												<label class="checkbox-inline" for="penjamin_1">
												  <input type="checkbox" name="penjamin_1" id="penjamin_1" value="1">
												  Jasa Raharja
												</label>
												<label class="checkbox-inline" for="penjamin_2">
												  <input type="checkbox" name="penjamin_2" id="penjamin_2" value="2">
												  BPJS Ketenagakerjaan
												</label>
												<label class="checkbox-inline" for="penjamin_3">
												  <input type="checkbox" name="penjamin_3" id="penjamin_3" value="3">
												  Taspen
												</label>
												<label class="checkbox-inline" for="penjamin_4">
												  <input type="checkbox" name="penjamin_4" id="penjamin_4" value="4">
												  ASABRI
												</label>
											  </div>
												<input id="val_penjamin" name="val_penjamin" type="hidden" value="">
											</div>
											
											<!-- Appended Input-->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="tgl_kejadian">Tanggal Kejadian</label>
											  <div class="col-md-4">
												<div class="input-group">
												  <input id="tgl_kejadian" name="tgl_kejadian" class="form-control" placeholder="" type="text">
												  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
												</div>
											  </div>
											</div>
												
											<!-- Select Basic -->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="opsi_laka_suplesi">Suplesi ?</label>
											  <div class="col-md-4">
												<select id="opsi_laka_suplesi" name="opsi_laka_suplesi" class="form-control">
												  <option value="0">Tidak</option>
												  <option value="1">Ya</option>
												</select>
											  </div>
											</div>
												
											<div class="form-group">

											  <label class="col-md-3 control-label" for="no_sep_suplesi">No. SEP Suplesi</label> 
											  <div class="col-md-9">
											  	<input id="no_sep_suplesi" name="no_sep_suplesi" type="text" placeholder="" class="form-control input-md">
											  </div>
											</div>
											
											<!-- Select Basic -->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="lokasi_laka">Lokasi Kejadian</label>
											  <div class="col-md-9">
												<select id="kd_propinsi" name="kd_propinsi" class="form-control">
												  <option value=""></option>
												</select>
											  </div>
											</div>
											
											<!-- Select Basic -->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="kd_kabupaten"></label>
											  <div class="col-md-9">
												<select id="kd_kabupaten" name="kd_kabupaten" class="form-control">
												  <option value=""></option>
												</select>
											  </div>
											</div>
											
											<!-- Select Basic -->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="kd_kecamatan"></label>
											  <div class="col-md-9">
												<select id="kd_kecamatan" name="kd_kecamatan" class="form-control">
												  <option value=""></option>
												</select>
											  </div>
											</div>
											
											<!-- Textarea -->
											<div class="form-group">
											  <label class="col-md-3 control-label" for="keterangan_laka">Keterangan Kejadian</label>
											  <div class="col-md-9">                     
												<textarea class="form-control" id="keterangan_laka" name="keterangan_laka"></textarea>
											  </div>
											</div>
											
											</div>											
											
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="singlebutton"></label>
												
												<div class="col-md-2" id="area_btn_cetak">
													<!-- <button id="btn_cetak" type="button" class="btn btn-info btn-block" onclick="printSep('0112R0310918V000274')">&nbsp;Cetak&nbsp;</button>  -->
												</div>
												
												<div class="col-md-3">
													&nbsp;
												</div>
												
												<div class="col-md-2">
													<button id="btn_simpan" type="button" class="btn btn-primary btn-block" onclick="insertSep()">&nbsp;Simpan&nbsp;</button>
												</div>
												
												<div class="col-md-2">
													<button id="btn_kembali" type="button" class="btn btn-warning btn-block" onclick="returnToRujukanSearch()">&nbsp;Kembali&nbsp;</button>
												</div>
											</div>
											
										</fieldset>
									</form>
									
									
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			
		</div>

	</body>
</html>
<?php
if (isset($this->sc_temp_noKartu)) {$_SESSION['noKartu'] = $this->sc_temp_noKartu;}
if (isset($this->sc_temp_pelayanan_kode)) {$_SESSION['pelayanan_kode'] = $this->sc_temp_pelayanan_kode;}
if (isset($this->sc_temp_hakKelasKode)) {$_SESSION['hakKelasKode'] = $this->sc_temp_hakKelasKode;}
if (isset($this->sc_temp_no_mr)) {$_SESSION['no_mr'] = $this->sc_temp_no_mr;}
if (isset($this->sc_temp_noKunjungan)) {$_SESSION['noKunjungan'] = $this->sc_temp_noKunjungan;}
if (isset($this->sc_temp_ppk_rujukan_kode)) {$_SESSION['ppk_rujukan_kode'] = $this->sc_temp_ppk_rujukan_kode;}
if (isset($this->sc_temp_ppk_rujukan_nama)) {$_SESSION['ppk_rujukan_nama'] = $this->sc_temp_ppk_rujukan_nama;}
if (isset($this->sc_temp_nama)) {$_SESSION['nama'] = $this->sc_temp_nama;}
if (isset($this->sc_temp_nik)) {$_SESSION['nik'] = $this->sc_temp_nik;}
if (isset($this->sc_temp_sex)) {$_SESSION['sex'] = $this->sc_temp_sex;}
if (isset($this->sc_temp_tglLahir)) {$_SESSION['tglLahir'] = $this->sc_temp_tglLahir;}
if (isset($this->sc_temp_statusPesertaKeterangan)) {$_SESSION['statusPesertaKeterangan'] = $this->sc_temp_statusPesertaKeterangan;}
if (isset($this->sc_temp_jenisPesertaKeterangan)) {$_SESSION['jenisPesertaKeterangan'] = $this->sc_temp_jenisPesertaKeterangan;}
if (isset($this->sc_temp_hakKelasKeterangan)) {$_SESSION['hakKelasKeterangan'] = $this->sc_temp_hakKelasKeterangan;}
if (isset($this->sc_temp_tglCetakKartu)) {$_SESSION['tglCetakKartu'] = $this->sc_temp_tglCetakKartu;}
if (isset($this->sc_temp_tglTAT)) {$_SESSION['tglTAT'] = $this->sc_temp_tglTAT;}
if (isset($this->sc_temp_tglTMT)) {$_SESSION['tglTMT'] = $this->sc_temp_tglTMT;}
if (isset($this->sc_temp_dinsos)) {$_SESSION['dinsos'] = $this->sc_temp_dinsos;}
if (isset($this->sc_temp_noSKTM)) {$_SESSION['noSKTM'] = $this->sc_temp_noSKTM;}
if (isset($this->sc_temp_prolanisPRB)) {$_SESSION['prolanisPRB'] = $this->sc_temp_prolanisPRB;}
if (isset($this->sc_temp_pisa)) {$_SESSION['pisa'] = $this->sc_temp_pisa;}
if (isset($this->sc_temp_kdProvider)) {$_SESSION['kdProvider'] = $this->sc_temp_kdProvider;}
if (isset($this->sc_temp_nmProvider)) {$_SESSION['nmProvider'] = $this->sc_temp_nmProvider;}
if (isset($this->sc_temp_nmAsuransi)) {$_SESSION['nmAsuransi'] = $this->sc_temp_nmAsuransi;}
if (isset($this->sc_temp_noAsuransi)) {$_SESSION['noAsuransi'] = $this->sc_temp_noAsuransi;}
if (isset($this->sc_temp_tglTATAsuransi)) {$_SESSION['tglTATAsuransi'] = $this->sc_temp_tglTATAsuransi;}
if (isset($this->sc_temp_tglTMTAsuransi)) {$_SESSION['tglTMTAsuransi'] = $this->sc_temp_tglTMTAsuransi;}
if (isset($this->sc_temp_umurSaatPelayanan)) {$_SESSION['umurSaatPelayanan'] = $this->sc_temp_umurSaatPelayanan;}
if (isset($this->sc_temp_umurSekarang)) {$_SESSION['umurSekarang'] = $this->sc_temp_umurSekarang;}
if (isset($this->sc_temp_poli_tujuan_kode)) {$_SESSION['poli_tujuan_kode'] = $this->sc_temp_poli_tujuan_kode;}
if (isset($this->sc_temp_poli_tujuan_nama)) {$_SESSION['poli_tujuan_nama'] = $this->sc_temp_poli_tujuan_nama;}
if (isset($this->sc_temp_tgl_kunjungan)) {$_SESSION['tgl_kunjungan'] = $this->sc_temp_tgl_kunjungan;}
if (isset($this->sc_temp_diagnosa_kode)) {$_SESSION['diagnosa_kode'] = $this->sc_temp_diagnosa_kode;}
if (isset($this->sc_temp_diagnosa_nama)) {$_SESSION['diagnosa_nama'] = $this->sc_temp_diagnosa_nama;}
if (isset($this->sc_temp_no_telepon)) {$_SESSION['no_telepon'] = $this->sc_temp_no_telepon;}
$_SESSION['scriptcase']['form_vclaim_create_sep']['contr_erro'] = 'off'; 
//--- 
       $this->Db->Close(); 
       if ($this->Change_Menu)
       {
           $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
           $Arr_rastro = array();
           if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
           {
               foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
               {
                  $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
               }
               $ult_apl = count($Arr_rastro) - 1;
               unset($Arr_rastro[$ult_apl]);
               $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
           }
           else
           {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
           }
       }
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
?>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
        </script>
                <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
                <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
                <script type="text/javascript"><?php echo $this->redir_modal ?></script>
<?php
       } 
       exit;
   } 
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
} 
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   if (!function_exists("SC_dir_app_ini"))
   {
       include_once("../_lib/lib/php/nm_ctrl_app_name.php");
   }
   SC_dir_app_ini('simrskreatifmedia');
   $_SESSION['scriptcase']['form_vclaim_create_sep']['contr_erro'] = 'off';
   $Sc_lig_md5 = false;
   $Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
   $_SESSION['scriptcase']['sem_session'] = false;
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
            nm_limpa_str_form_vclaim_create_sep($nmgp_val);
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
            nm_limpa_str_form_vclaim_create_sep($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
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
       elseif (is_file($root . $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_imag_temp'] . "/sc_apl_default_simrskreatifmedia.txt")) {
           $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['form_vclaim_create_sep']['glo_nm_path_imag_temp'] . "/sc_apl_default_simrskreatifmedia.txt"));
       }
       if (isset($apl_def)) {
           if ($apl_def[0] != "form_vclaim_create_sep") {
               $_SESSION['scriptcase']['sem_session'] = true;
               if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                   $_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']['redir'] = $apl_def[0];
               }
               else {
                   $_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
               }
               $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
               $_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']['redir_tp'] = $Redir_tp;
           }
           if (isset($_COOKIE['sc_actual_lang_simrskreatifmedia'])) {
               $_SESSION['scriptcase']['form_vclaim_create_sep']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_simrskreatifmedia'];
           }
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($_POST["nama"])) 
   {
       $_SESSION["nama"] = $_POST["nama"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["nama"]);
   }
   if (isset($_GET["nama"])) 
   {
       $_SESSION["nama"] = $_GET["nama"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["nama"]);
   }
   if (!isset($_SESSION["nama"])) 
   {
       $_SESSION["nama"] = "";
   }
   if (isset($_POST["noKartu"])) 
   {
       $_SESSION["noKartu"] = $_POST["noKartu"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noKartu"]);
   }
   if (!isset($_POST["noKartu"]) && isset($_POST["nokartu"])) 
   {
       $_SESSION["noKartu"] = $_POST["nokartu"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noKartu"]);
   }
   if (isset($_GET["noKartu"])) 
   {
       $_SESSION["noKartu"] = $_GET["noKartu"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noKartu"]);
   }
   if (!isset($_GET["noKartu"]) && isset($_GET["nokartu"])) 
   {
       $_SESSION["noKartu"] = $_GET["nokartu"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noKartu"]);
   }
   if (!isset($_SESSION["noKartu"])) 
   {
       $_SESSION["noKartu"] = "";
   }
   if (isset($_POST["nik"])) 
   {
       $_SESSION["nik"] = $_POST["nik"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["nik"]);
   }
   if (isset($_GET["nik"])) 
   {
       $_SESSION["nik"] = $_GET["nik"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["nik"]);
   }
   if (!isset($_SESSION["nik"])) 
   {
       $_SESSION["nik"] = "";
   }
   if (isset($_POST["sex"])) 
   {
       $_SESSION["sex"] = $_POST["sex"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["sex"]);
   }
   if (isset($_GET["sex"])) 
   {
       $_SESSION["sex"] = $_GET["sex"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["sex"]);
   }
   if (!isset($_SESSION["sex"])) 
   {
       $_SESSION["sex"] = "";
   }
   if (isset($_POST["tglLahir"])) 
   {
       $_SESSION["tglLahir"] = $_POST["tglLahir"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglLahir"]);
   }
   if (!isset($_POST["tglLahir"]) && isset($_POST["tgllahir"])) 
   {
       $_SESSION["tglLahir"] = $_POST["tgllahir"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglLahir"]);
   }
   if (isset($_GET["tglLahir"])) 
   {
       $_SESSION["tglLahir"] = $_GET["tglLahir"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglLahir"]);
   }
   if (!isset($_GET["tglLahir"]) && isset($_GET["tgllahir"])) 
   {
       $_SESSION["tglLahir"] = $_GET["tgllahir"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglLahir"]);
   }
   if (!isset($_SESSION["tglLahir"])) 
   {
       $_SESSION["tglLahir"] = "";
   }
   if (isset($_POST["statusPesertaKeterangan"])) 
   {
       $_SESSION["statusPesertaKeterangan"] = $_POST["statusPesertaKeterangan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["statusPesertaKeterangan"]);
   }
   if (!isset($_POST["statusPesertaKeterangan"]) && isset($_POST["statuspesertaketerangan"])) 
   {
       $_SESSION["statusPesertaKeterangan"] = $_POST["statuspesertaketerangan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["statusPesertaKeterangan"]);
   }
   if (isset($_GET["statusPesertaKeterangan"])) 
   {
       $_SESSION["statusPesertaKeterangan"] = $_GET["statusPesertaKeterangan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["statusPesertaKeterangan"]);
   }
   if (!isset($_GET["statusPesertaKeterangan"]) && isset($_GET["statuspesertaketerangan"])) 
   {
       $_SESSION["statusPesertaKeterangan"] = $_GET["statuspesertaketerangan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["statusPesertaKeterangan"]);
   }
   if (!isset($_SESSION["statusPesertaKeterangan"])) 
   {
       $_SESSION["statusPesertaKeterangan"] = "";
   }
   if (isset($_POST["jenisPesertaKeterangan"])) 
   {
       $_SESSION["jenisPesertaKeterangan"] = $_POST["jenisPesertaKeterangan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["jenisPesertaKeterangan"]);
   }
   if (!isset($_POST["jenisPesertaKeterangan"]) && isset($_POST["jenispesertaketerangan"])) 
   {
       $_SESSION["jenisPesertaKeterangan"] = $_POST["jenispesertaketerangan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["jenisPesertaKeterangan"]);
   }
   if (isset($_GET["jenisPesertaKeterangan"])) 
   {
       $_SESSION["jenisPesertaKeterangan"] = $_GET["jenisPesertaKeterangan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["jenisPesertaKeterangan"]);
   }
   if (!isset($_GET["jenisPesertaKeterangan"]) && isset($_GET["jenispesertaketerangan"])) 
   {
       $_SESSION["jenisPesertaKeterangan"] = $_GET["jenispesertaketerangan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["jenisPesertaKeterangan"]);
   }
   if (!isset($_SESSION["jenisPesertaKeterangan"])) 
   {
       $_SESSION["jenisPesertaKeterangan"] = "";
   }
   if (isset($_POST["hakKelasKeterangan"])) 
   {
       $_SESSION["hakKelasKeterangan"] = $_POST["hakKelasKeterangan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["hakKelasKeterangan"]);
   }
   if (!isset($_POST["hakKelasKeterangan"]) && isset($_POST["hakkelasketerangan"])) 
   {
       $_SESSION["hakKelasKeterangan"] = $_POST["hakkelasketerangan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["hakKelasKeterangan"]);
   }
   if (isset($_GET["hakKelasKeterangan"])) 
   {
       $_SESSION["hakKelasKeterangan"] = $_GET["hakKelasKeterangan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["hakKelasKeterangan"]);
   }
   if (!isset($_GET["hakKelasKeterangan"]) && isset($_GET["hakkelasketerangan"])) 
   {
       $_SESSION["hakKelasKeterangan"] = $_GET["hakkelasketerangan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["hakKelasKeterangan"]);
   }
   if (!isset($_SESSION["hakKelasKeterangan"])) 
   {
       $_SESSION["hakKelasKeterangan"] = "";
   }
   if (isset($_POST["tglCetakKartu"])) 
   {
       $_SESSION["tglCetakKartu"] = $_POST["tglCetakKartu"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglCetakKartu"]);
   }
   if (!isset($_POST["tglCetakKartu"]) && isset($_POST["tglcetakkartu"])) 
   {
       $_SESSION["tglCetakKartu"] = $_POST["tglcetakkartu"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglCetakKartu"]);
   }
   if (isset($_GET["tglCetakKartu"])) 
   {
       $_SESSION["tglCetakKartu"] = $_GET["tglCetakKartu"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglCetakKartu"]);
   }
   if (!isset($_GET["tglCetakKartu"]) && isset($_GET["tglcetakkartu"])) 
   {
       $_SESSION["tglCetakKartu"] = $_GET["tglcetakkartu"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglCetakKartu"]);
   }
   if (!isset($_SESSION["tglCetakKartu"])) 
   {
       $_SESSION["tglCetakKartu"] = "";
   }
   if (isset($_POST["tglTAT"])) 
   {
       $_SESSION["tglTAT"] = $_POST["tglTAT"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTAT"]);
   }
   if (!isset($_POST["tglTAT"]) && isset($_POST["tgltat"])) 
   {
       $_SESSION["tglTAT"] = $_POST["tgltat"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTAT"]);
   }
   if (isset($_GET["tglTAT"])) 
   {
       $_SESSION["tglTAT"] = $_GET["tglTAT"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTAT"]);
   }
   if (!isset($_GET["tglTAT"]) && isset($_GET["tgltat"])) 
   {
       $_SESSION["tglTAT"] = $_GET["tgltat"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTAT"]);
   }
   if (!isset($_SESSION["tglTAT"])) 
   {
       $_SESSION["tglTAT"] = "";
   }
   if (isset($_POST["tglTMT"])) 
   {
       $_SESSION["tglTMT"] = $_POST["tglTMT"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTMT"]);
   }
   if (!isset($_POST["tglTMT"]) && isset($_POST["tgltmt"])) 
   {
       $_SESSION["tglTMT"] = $_POST["tgltmt"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTMT"]);
   }
   if (isset($_GET["tglTMT"])) 
   {
       $_SESSION["tglTMT"] = $_GET["tglTMT"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTMT"]);
   }
   if (!isset($_GET["tglTMT"]) && isset($_GET["tgltmt"])) 
   {
       $_SESSION["tglTMT"] = $_GET["tgltmt"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTMT"]);
   }
   if (!isset($_SESSION["tglTMT"])) 
   {
       $_SESSION["tglTMT"] = "";
   }
   if (isset($_POST["dinsos"])) 
   {
       $_SESSION["dinsos"] = $_POST["dinsos"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["dinsos"]);
   }
   if (isset($_GET["dinsos"])) 
   {
       $_SESSION["dinsos"] = $_GET["dinsos"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["dinsos"]);
   }
   if (!isset($_SESSION["dinsos"])) 
   {
       $_SESSION["dinsos"] = "";
   }
   if (isset($_POST["noSKTM"])) 
   {
       $_SESSION["noSKTM"] = $_POST["noSKTM"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noSKTM"]);
   }
   if (!isset($_POST["noSKTM"]) && isset($_POST["nosktm"])) 
   {
       $_SESSION["noSKTM"] = $_POST["nosktm"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noSKTM"]);
   }
   if (isset($_GET["noSKTM"])) 
   {
       $_SESSION["noSKTM"] = $_GET["noSKTM"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noSKTM"]);
   }
   if (!isset($_GET["noSKTM"]) && isset($_GET["nosktm"])) 
   {
       $_SESSION["noSKTM"] = $_GET["nosktm"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noSKTM"]);
   }
   if (!isset($_SESSION["noSKTM"])) 
   {
       $_SESSION["noSKTM"] = "";
   }
   if (isset($_POST["prolanisPRB"])) 
   {
       $_SESSION["prolanisPRB"] = $_POST["prolanisPRB"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["prolanisPRB"]);
   }
   if (!isset($_POST["prolanisPRB"]) && isset($_POST["prolanisprb"])) 
   {
       $_SESSION["prolanisPRB"] = $_POST["prolanisprb"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["prolanisPRB"]);
   }
   if (isset($_GET["prolanisPRB"])) 
   {
       $_SESSION["prolanisPRB"] = $_GET["prolanisPRB"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["prolanisPRB"]);
   }
   if (!isset($_GET["prolanisPRB"]) && isset($_GET["prolanisprb"])) 
   {
       $_SESSION["prolanisPRB"] = $_GET["prolanisprb"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["prolanisPRB"]);
   }
   if (!isset($_SESSION["prolanisPRB"])) 
   {
       $_SESSION["prolanisPRB"] = "";
   }
   if (isset($_POST["pisa"])) 
   {
       $_SESSION["pisa"] = $_POST["pisa"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["pisa"]);
   }
   if (isset($_GET["pisa"])) 
   {
       $_SESSION["pisa"] = $_GET["pisa"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["pisa"]);
   }
   if (!isset($_SESSION["pisa"])) 
   {
       $_SESSION["pisa"] = "";
   }
   if (isset($_POST["kdProvider"])) 
   {
       $_SESSION["kdProvider"] = $_POST["kdProvider"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["kdProvider"]);
   }
   if (!isset($_POST["kdProvider"]) && isset($_POST["kdprovider"])) 
   {
       $_SESSION["kdProvider"] = $_POST["kdprovider"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["kdProvider"]);
   }
   if (isset($_GET["kdProvider"])) 
   {
       $_SESSION["kdProvider"] = $_GET["kdProvider"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["kdProvider"]);
   }
   if (!isset($_GET["kdProvider"]) && isset($_GET["kdprovider"])) 
   {
       $_SESSION["kdProvider"] = $_GET["kdprovider"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["kdProvider"]);
   }
   if (!isset($_SESSION["kdProvider"])) 
   {
       $_SESSION["kdProvider"] = "";
   }
   if (isset($_POST["nmProvider"])) 
   {
       $_SESSION["nmProvider"] = $_POST["nmProvider"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["nmProvider"]);
   }
   if (!isset($_POST["nmProvider"]) && isset($_POST["nmprovider"])) 
   {
       $_SESSION["nmProvider"] = $_POST["nmprovider"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["nmProvider"]);
   }
   if (isset($_GET["nmProvider"])) 
   {
       $_SESSION["nmProvider"] = $_GET["nmProvider"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["nmProvider"]);
   }
   if (!isset($_GET["nmProvider"]) && isset($_GET["nmprovider"])) 
   {
       $_SESSION["nmProvider"] = $_GET["nmprovider"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["nmProvider"]);
   }
   if (!isset($_SESSION["nmProvider"])) 
   {
       $_SESSION["nmProvider"] = "";
   }
   if (isset($_POST["nmAsuransi"])) 
   {
       $_SESSION["nmAsuransi"] = $_POST["nmAsuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["nmAsuransi"]);
   }
   if (!isset($_POST["nmAsuransi"]) && isset($_POST["nmasuransi"])) 
   {
       $_SESSION["nmAsuransi"] = $_POST["nmasuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["nmAsuransi"]);
   }
   if (isset($_GET["nmAsuransi"])) 
   {
       $_SESSION["nmAsuransi"] = $_GET["nmAsuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["nmAsuransi"]);
   }
   if (!isset($_GET["nmAsuransi"]) && isset($_GET["nmasuransi"])) 
   {
       $_SESSION["nmAsuransi"] = $_GET["nmasuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["nmAsuransi"]);
   }
   if (!isset($_SESSION["nmAsuransi"])) 
   {
       $_SESSION["nmAsuransi"] = "";
   }
   if (isset($_POST["noAsuransi"])) 
   {
       $_SESSION["noAsuransi"] = $_POST["noAsuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noAsuransi"]);
   }
   if (!isset($_POST["noAsuransi"]) && isset($_POST["noasuransi"])) 
   {
       $_SESSION["noAsuransi"] = $_POST["noasuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noAsuransi"]);
   }
   if (isset($_GET["noAsuransi"])) 
   {
       $_SESSION["noAsuransi"] = $_GET["noAsuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noAsuransi"]);
   }
   if (!isset($_GET["noAsuransi"]) && isset($_GET["noasuransi"])) 
   {
       $_SESSION["noAsuransi"] = $_GET["noasuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noAsuransi"]);
   }
   if (!isset($_SESSION["noAsuransi"])) 
   {
       $_SESSION["noAsuransi"] = "";
   }
   if (isset($_POST["tglTATAsuransi"])) 
   {
       $_SESSION["tglTATAsuransi"] = $_POST["tglTATAsuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTATAsuransi"]);
   }
   if (!isset($_POST["tglTATAsuransi"]) && isset($_POST["tgltatasuransi"])) 
   {
       $_SESSION["tglTATAsuransi"] = $_POST["tgltatasuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTATAsuransi"]);
   }
   if (isset($_GET["tglTATAsuransi"])) 
   {
       $_SESSION["tglTATAsuransi"] = $_GET["tglTATAsuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTATAsuransi"]);
   }
   if (!isset($_GET["tglTATAsuransi"]) && isset($_GET["tgltatasuransi"])) 
   {
       $_SESSION["tglTATAsuransi"] = $_GET["tgltatasuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTATAsuransi"]);
   }
   if (!isset($_SESSION["tglTATAsuransi"])) 
   {
       $_SESSION["tglTATAsuransi"] = "";
   }
   if (isset($_POST["tglTMTAsuransi"])) 
   {
       $_SESSION["tglTMTAsuransi"] = $_POST["tglTMTAsuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTMTAsuransi"]);
   }
   if (!isset($_POST["tglTMTAsuransi"]) && isset($_POST["tgltmtasuransi"])) 
   {
       $_SESSION["tglTMTAsuransi"] = $_POST["tgltmtasuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTMTAsuransi"]);
   }
   if (isset($_GET["tglTMTAsuransi"])) 
   {
       $_SESSION["tglTMTAsuransi"] = $_GET["tglTMTAsuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTMTAsuransi"]);
   }
   if (!isset($_GET["tglTMTAsuransi"]) && isset($_GET["tgltmtasuransi"])) 
   {
       $_SESSION["tglTMTAsuransi"] = $_GET["tgltmtasuransi"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTMTAsuransi"]);
   }
   if (!isset($_SESSION["tglTMTAsuransi"])) 
   {
       $_SESSION["tglTMTAsuransi"] = "";
   }
   if (isset($_POST["umurSaatPelayanan"])) 
   {
       $_SESSION["umurSaatPelayanan"] = $_POST["umurSaatPelayanan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["umurSaatPelayanan"]);
   }
   if (!isset($_POST["umurSaatPelayanan"]) && isset($_POST["umursaatpelayanan"])) 
   {
       $_SESSION["umurSaatPelayanan"] = $_POST["umursaatpelayanan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["umurSaatPelayanan"]);
   }
   if (isset($_GET["umurSaatPelayanan"])) 
   {
       $_SESSION["umurSaatPelayanan"] = $_GET["umurSaatPelayanan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["umurSaatPelayanan"]);
   }
   if (!isset($_GET["umurSaatPelayanan"]) && isset($_GET["umursaatpelayanan"])) 
   {
       $_SESSION["umurSaatPelayanan"] = $_GET["umursaatpelayanan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["umurSaatPelayanan"]);
   }
   if (!isset($_SESSION["umurSaatPelayanan"])) 
   {
       $_SESSION["umurSaatPelayanan"] = "";
   }
   if (isset($_POST["umurSekarang"])) 
   {
       $_SESSION["umurSekarang"] = $_POST["umurSekarang"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["umurSekarang"]);
   }
   if (!isset($_POST["umurSekarang"]) && isset($_POST["umursekarang"])) 
   {
       $_SESSION["umurSekarang"] = $_POST["umursekarang"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["umurSekarang"]);
   }
   if (isset($_GET["umurSekarang"])) 
   {
       $_SESSION["umurSekarang"] = $_GET["umurSekarang"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["umurSekarang"]);
   }
   if (!isset($_GET["umurSekarang"]) && isset($_GET["umursekarang"])) 
   {
       $_SESSION["umurSekarang"] = $_GET["umursekarang"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["umurSekarang"]);
   }
   if (!isset($_SESSION["umurSekarang"])) 
   {
       $_SESSION["umurSekarang"] = "";
   }
   if (isset($_POST["poli_tujuan_kode"])) 
   {
       $_SESSION["poli_tujuan_kode"] = $_POST["poli_tujuan_kode"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["poli_tujuan_kode"]);
   }
   if (isset($_GET["poli_tujuan_kode"])) 
   {
       $_SESSION["poli_tujuan_kode"] = $_GET["poli_tujuan_kode"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["poli_tujuan_kode"]);
   }
   if (!isset($_SESSION["poli_tujuan_kode"])) 
   {
       $_SESSION["poli_tujuan_kode"] = "";
   }
   if (isset($_POST["poli_tujuan_nama"])) 
   {
       $_SESSION["poli_tujuan_nama"] = $_POST["poli_tujuan_nama"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["poli_tujuan_nama"]);
   }
   if (isset($_GET["poli_tujuan_nama"])) 
   {
       $_SESSION["poli_tujuan_nama"] = $_GET["poli_tujuan_nama"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["poli_tujuan_nama"]);
   }
   if (!isset($_SESSION["poli_tujuan_nama"])) 
   {
       $_SESSION["poli_tujuan_nama"] = "";
   }
   if (isset($_POST["ppk_rujukan_kode"])) 
   {
       $_SESSION["ppk_rujukan_kode"] = $_POST["ppk_rujukan_kode"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["ppk_rujukan_kode"]);
   }
   if (isset($_GET["ppk_rujukan_kode"])) 
   {
       $_SESSION["ppk_rujukan_kode"] = $_GET["ppk_rujukan_kode"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["ppk_rujukan_kode"]);
   }
   if (!isset($_SESSION["ppk_rujukan_kode"])) 
   {
       $_SESSION["ppk_rujukan_kode"] = "";
   }
   if (isset($_POST["ppk_rujukan_nama"])) 
   {
       $_SESSION["ppk_rujukan_nama"] = $_POST["ppk_rujukan_nama"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["ppk_rujukan_nama"]);
   }
   if (isset($_GET["ppk_rujukan_nama"])) 
   {
       $_SESSION["ppk_rujukan_nama"] = $_GET["ppk_rujukan_nama"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["ppk_rujukan_nama"]);
   }
   if (!isset($_SESSION["ppk_rujukan_nama"])) 
   {
       $_SESSION["ppk_rujukan_nama"] = "";
   }
   if (isset($_POST["noKunjungan"])) 
   {
       $_SESSION["noKunjungan"] = $_POST["noKunjungan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noKunjungan"]);
   }
   if (!isset($_POST["noKunjungan"]) && isset($_POST["nokunjungan"])) 
   {
       $_SESSION["noKunjungan"] = $_POST["nokunjungan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noKunjungan"]);
   }
   if (isset($_GET["noKunjungan"])) 
   {
       $_SESSION["noKunjungan"] = $_GET["noKunjungan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noKunjungan"]);
   }
   if (!isset($_GET["noKunjungan"]) && isset($_GET["nokunjungan"])) 
   {
       $_SESSION["noKunjungan"] = $_GET["nokunjungan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["noKunjungan"]);
   }
   if (!isset($_SESSION["noKunjungan"])) 
   {
       $_SESSION["noKunjungan"] = "";
   }
   if (isset($_POST["tgl_kunjungan"])) 
   {
       $_SESSION["tgl_kunjungan"] = $_POST["tgl_kunjungan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tgl_kunjungan"]);
   }
   if (isset($_GET["tgl_kunjungan"])) 
   {
       $_SESSION["tgl_kunjungan"] = $_GET["tgl_kunjungan"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["tgl_kunjungan"]);
   }
   if (!isset($_SESSION["tgl_kunjungan"])) 
   {
       $_SESSION["tgl_kunjungan"] = "";
   }
   if (isset($_POST["no_mr"])) 
   {
       $_SESSION["no_mr"] = $_POST["no_mr"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["no_mr"]);
   }
   if (isset($_GET["no_mr"])) 
   {
       $_SESSION["no_mr"] = $_GET["no_mr"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["no_mr"]);
   }
   if (!isset($_SESSION["no_mr"])) 
   {
       $_SESSION["no_mr"] = "";
   }
   if (isset($_POST["no_telepon"])) 
   {
       $_SESSION["no_telepon"] = $_POST["no_telepon"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["no_telepon"]);
   }
   if (isset($_GET["no_telepon"])) 
   {
       $_SESSION["no_telepon"] = $_GET["no_telepon"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["no_telepon"]);
   }
   if (!isset($_SESSION["no_telepon"])) 
   {
       $_SESSION["no_telepon"] = "";
   }
   if (isset($_POST["diagnosa_kode"])) 
   {
       $_SESSION["diagnosa_kode"] = $_POST["diagnosa_kode"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["diagnosa_kode"]);
   }
   if (isset($_GET["diagnosa_kode"])) 
   {
       $_SESSION["diagnosa_kode"] = $_GET["diagnosa_kode"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["diagnosa_kode"]);
   }
   if (!isset($_SESSION["diagnosa_kode"])) 
   {
       $_SESSION["diagnosa_kode"] = "";
   }
   if (isset($_POST["diagnosa_nama"])) 
   {
       $_SESSION["diagnosa_nama"] = $_POST["diagnosa_nama"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["diagnosa_nama"]);
   }
   if (isset($_GET["diagnosa_nama"])) 
   {
       $_SESSION["diagnosa_nama"] = $_GET["diagnosa_nama"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["diagnosa_nama"]);
   }
   if (!isset($_SESSION["diagnosa_nama"])) 
   {
       $_SESSION["diagnosa_nama"] = "";
   }
   if (isset($_POST["pelayanan_kode"])) 
   {
       $_SESSION["pelayanan_kode"] = $_POST["pelayanan_kode"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["pelayanan_kode"]);
   }
   if (isset($_GET["pelayanan_kode"])) 
   {
       $_SESSION["pelayanan_kode"] = $_GET["pelayanan_kode"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["pelayanan_kode"]);
   }
   if (!isset($_SESSION["pelayanan_kode"])) 
   {
       $_SESSION["pelayanan_kode"] = "";
   }
   if (isset($_POST["hakKelasKode"])) 
   {
       $_SESSION["hakKelasKode"] = $_POST["hakKelasKode"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["hakKelasKode"]);
   }
   if (!isset($_POST["hakKelasKode"]) && isset($_POST["hakkelaskode"])) 
   {
       $_SESSION["hakKelasKode"] = $_POST["hakkelaskode"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["hakKelasKode"]);
   }
   if (isset($_GET["hakKelasKode"])) 
   {
       $_SESSION["hakKelasKode"] = $_GET["hakKelasKode"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["hakKelasKode"]);
   }
   if (!isset($_GET["hakKelasKode"]) && isset($_GET["hakkelaskode"])) 
   {
       $_SESSION["hakKelasKode"] = $_GET["hakkelaskode"];
       nm_limpa_str_form_vclaim_create_sep($_SESSION["hakKelasKode"]);
   }
   if (!isset($_SESSION["hakKelasKode"])) 
   {
       $_SESSION["hakKelasKode"] = "";
   }
   if (!empty($glo_perfil))  
   { 
      $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
   }   
   if (isset($glo_servidor)) 
   {
       $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
   }
   if (isset($glo_banco)) 
   {
       $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
   }
   if (isset($glo_tpbanco)) 
   {
       $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
   }
   if (isset($glo_usuario)) 
   {
       $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
   }
   if (isset($glo_senha)) 
   {
       $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
   }
   if (isset($glo_senha_protect)) 
   {
       $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 10000);
   }
   $salva_iframe = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['iframe_menu']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1)
   {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "form_vclaim_create_sep";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'form_vclaim_create_sep' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('form_vclaim_create_sep' == $sReferer || 'form_vclaim_create_sep_' == substr($sReferer, 0, 23))
       {
           $_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['initialize'] = true;
       }
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'form_vclaim_create_sep')
   {
       $_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['form_vclaim_create_sep']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/form_vclaim_create_sep_erro.php");
   }
   if (!empty($nmgp_parms)) 
   { 
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
                nm_limpa_str_form_vclaim_create_sep($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $Tmp_par   = $cadapar[0];;
                $$Tmp_par = $cadapar[1];
            }
            $ix++;
       }
       if (isset($nama)) 
       {
           $_SESSION['nama'] = $nama;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["nama"]);
       }
       if (!isset($noKartu) && isset($nokartu)) 
       {
           $_SESSION["noKartu"] = $nokartu;
       }
       if (isset($noKartu)) 
       {
           $_SESSION['noKartu'] = $noKartu;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["noKartu"]);
       }
       if (isset($nik)) 
       {
           $_SESSION['nik'] = $nik;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["nik"]);
       }
       if (isset($sex)) 
       {
           $_SESSION['sex'] = $sex;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["sex"]);
       }
       if (!isset($tglLahir) && isset($tgllahir)) 
       {
           $_SESSION["tglLahir"] = $tgllahir;
       }
       if (isset($tglLahir)) 
       {
           $_SESSION['tglLahir'] = $tglLahir;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["tglLahir"]);
       }
       if (!isset($statusPesertaKeterangan) && isset($statuspesertaketerangan)) 
       {
           $_SESSION["statusPesertaKeterangan"] = $statuspesertaketerangan;
       }
       if (isset($statusPesertaKeterangan)) 
       {
           $_SESSION['statusPesertaKeterangan'] = $statusPesertaKeterangan;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["statusPesertaKeterangan"]);
       }
       if (!isset($jenisPesertaKeterangan) && isset($jenispesertaketerangan)) 
       {
           $_SESSION["jenisPesertaKeterangan"] = $jenispesertaketerangan;
       }
       if (isset($jenisPesertaKeterangan)) 
       {
           $_SESSION['jenisPesertaKeterangan'] = $jenisPesertaKeterangan;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["jenisPesertaKeterangan"]);
       }
       if (!isset($hakKelasKeterangan) && isset($hakkelasketerangan)) 
       {
           $_SESSION["hakKelasKeterangan"] = $hakkelasketerangan;
       }
       if (isset($hakKelasKeterangan)) 
       {
           $_SESSION['hakKelasKeterangan'] = $hakKelasKeterangan;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["hakKelasKeterangan"]);
       }
       if (!isset($tglCetakKartu) && isset($tglcetakkartu)) 
       {
           $_SESSION["tglCetakKartu"] = $tglcetakkartu;
       }
       if (isset($tglCetakKartu)) 
       {
           $_SESSION['tglCetakKartu'] = $tglCetakKartu;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["tglCetakKartu"]);
       }
       if (!isset($tglTAT) && isset($tgltat)) 
       {
           $_SESSION["tglTAT"] = $tgltat;
       }
       if (isset($tglTAT)) 
       {
           $_SESSION['tglTAT'] = $tglTAT;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTAT"]);
       }
       if (!isset($tglTMT) && isset($tgltmt)) 
       {
           $_SESSION["tglTMT"] = $tgltmt;
       }
       if (isset($tglTMT)) 
       {
           $_SESSION['tglTMT'] = $tglTMT;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTMT"]);
       }
       if (isset($dinsos)) 
       {
           $_SESSION['dinsos'] = $dinsos;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["dinsos"]);
       }
       if (!isset($noSKTM) && isset($nosktm)) 
       {
           $_SESSION["noSKTM"] = $nosktm;
       }
       if (isset($noSKTM)) 
       {
           $_SESSION['noSKTM'] = $noSKTM;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["noSKTM"]);
       }
       if (!isset($prolanisPRB) && isset($prolanisprb)) 
       {
           $_SESSION["prolanisPRB"] = $prolanisprb;
       }
       if (isset($prolanisPRB)) 
       {
           $_SESSION['prolanisPRB'] = $prolanisPRB;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["prolanisPRB"]);
       }
       if (isset($pisa)) 
       {
           $_SESSION['pisa'] = $pisa;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["pisa"]);
       }
       if (!isset($kdProvider) && isset($kdprovider)) 
       {
           $_SESSION["kdProvider"] = $kdprovider;
       }
       if (isset($kdProvider)) 
       {
           $_SESSION['kdProvider'] = $kdProvider;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["kdProvider"]);
       }
       if (!isset($nmProvider) && isset($nmprovider)) 
       {
           $_SESSION["nmProvider"] = $nmprovider;
       }
       if (isset($nmProvider)) 
       {
           $_SESSION['nmProvider'] = $nmProvider;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["nmProvider"]);
       }
       if (!isset($nmAsuransi) && isset($nmasuransi)) 
       {
           $_SESSION["nmAsuransi"] = $nmasuransi;
       }
       if (isset($nmAsuransi)) 
       {
           $_SESSION['nmAsuransi'] = $nmAsuransi;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["nmAsuransi"]);
       }
       if (!isset($noAsuransi) && isset($noasuransi)) 
       {
           $_SESSION["noAsuransi"] = $noasuransi;
       }
       if (isset($noAsuransi)) 
       {
           $_SESSION['noAsuransi'] = $noAsuransi;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["noAsuransi"]);
       }
       if (!isset($tglTATAsuransi) && isset($tgltatasuransi)) 
       {
           $_SESSION["tglTATAsuransi"] = $tgltatasuransi;
       }
       if (isset($tglTATAsuransi)) 
       {
           $_SESSION['tglTATAsuransi'] = $tglTATAsuransi;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTATAsuransi"]);
       }
       if (!isset($tglTMTAsuransi) && isset($tgltmtasuransi)) 
       {
           $_SESSION["tglTMTAsuransi"] = $tgltmtasuransi;
       }
       if (isset($tglTMTAsuransi)) 
       {
           $_SESSION['tglTMTAsuransi'] = $tglTMTAsuransi;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["tglTMTAsuransi"]);
       }
       if (!isset($umurSaatPelayanan) && isset($umursaatpelayanan)) 
       {
           $_SESSION["umurSaatPelayanan"] = $umursaatpelayanan;
       }
       if (isset($umurSaatPelayanan)) 
       {
           $_SESSION['umurSaatPelayanan'] = $umurSaatPelayanan;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["umurSaatPelayanan"]);
       }
       if (!isset($umurSekarang) && isset($umursekarang)) 
       {
           $_SESSION["umurSekarang"] = $umursekarang;
       }
       if (isset($umurSekarang)) 
       {
           $_SESSION['umurSekarang'] = $umurSekarang;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["umurSekarang"]);
       }
       if (isset($poli_tujuan_kode)) 
       {
           $_SESSION['poli_tujuan_kode'] = $poli_tujuan_kode;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["poli_tujuan_kode"]);
       }
       if (isset($poli_tujuan_nama)) 
       {
           $_SESSION['poli_tujuan_nama'] = $poli_tujuan_nama;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["poli_tujuan_nama"]);
       }
       if (isset($ppk_rujukan_kode)) 
       {
           $_SESSION['ppk_rujukan_kode'] = $ppk_rujukan_kode;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["ppk_rujukan_kode"]);
       }
       if (isset($ppk_rujukan_nama)) 
       {
           $_SESSION['ppk_rujukan_nama'] = $ppk_rujukan_nama;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["ppk_rujukan_nama"]);
       }
       if (!isset($noKunjungan) && isset($nokunjungan)) 
       {
           $_SESSION["noKunjungan"] = $nokunjungan;
       }
       if (isset($noKunjungan)) 
       {
           $_SESSION['noKunjungan'] = $noKunjungan;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["noKunjungan"]);
       }
       if (isset($tgl_kunjungan)) 
       {
           $_SESSION['tgl_kunjungan'] = $tgl_kunjungan;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["tgl_kunjungan"]);
       }
       if (isset($no_mr)) 
       {
           $_SESSION['no_mr'] = $no_mr;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["no_mr"]);
       }
       if (isset($no_telepon)) 
       {
           $_SESSION['no_telepon'] = $no_telepon;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["no_telepon"]);
       }
       if (isset($diagnosa_kode)) 
       {
           $_SESSION['diagnosa_kode'] = $diagnosa_kode;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["diagnosa_kode"]);
       }
       if (isset($diagnosa_nama)) 
       {
           $_SESSION['diagnosa_nama'] = $diagnosa_nama;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["diagnosa_nama"]);
       }
       if (isset($pelayanan_kode)) 
       {
           $_SESSION['pelayanan_kode'] = $pelayanan_kode;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["pelayanan_kode"]);
       }
       if (!isset($hakKelasKode) && isset($hakkelaskode)) 
       {
           $_SESSION["hakKelasKode"] = $hakkelaskode;
       }
       if (isset($hakKelasKode)) 
       {
           $_SESSION['hakKelasKode'] = $hakKelasKode;
           nm_limpa_str_form_vclaim_create_sep($_SESSION["hakKelasKode"]);
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
   $contr_form_vclaim_create_sep = new form_vclaim_create_sep_apl();
   $contr_form_vclaim_create_sep->controle();
//
   function nm_limpa_str_form_vclaim_create_sep(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
?>
