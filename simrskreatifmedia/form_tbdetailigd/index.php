<?php
//
   if (!session_id())
   {
   include_once('form_tbdetailigd_session.php');
   @session_start() ;
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
       if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
       {
          include_once('form_tbdetailigd_mob.php');
          exit;
       }
   }

   $_SESSION['scriptcase']['form_tbdetailigd']['error_buffer'] = '';

   $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_doc']        = "";
   $NM_dir_atual = getcwd();
   if (empty($NM_dir_atual))
   {
       $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
       $str_path_sys  = str_replace("\\", '/', $str_path_sys);
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
   //check prod
   if(empty($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_prod']))
   {
           /*check prod*/$_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
   }
   //check img
   if(empty($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_imagens']))
   {
           /*check img*/$_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
   }
   //check tmp
   if(empty($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_imag_temp']))
   {
           /*check tmp*/$_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   //check doc
   if(empty($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_doc']))
   {
           /*check doc*/$_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
   }
   //end check publication with the prod
//
class form_tbdetailigd_ini
{
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
   var $cor_bg_table;
   var $border_grid;
   var $cor_bg_grid;
   var $cor_cab_grid;
   var $cor_borda;
   var $cor_txt_cab_grid;
   var $cab_fonte_tipo;
   var $cab_fonte_tamanho;
   var $rod_fonte_tipo;
   var $rod_fonte_tamanho;
   var $cor_rod_grid;
   var $cor_txt_rod_grid;
   var $cor_barra_nav;
   var $cor_titulo;
   var $cor_txt_titulo;
   var $titulo_fonte_tipo;
   var $titulo_fonte_tamanho;
   var $cor_grid_impar;
   var $cor_grid_par;
   var $cor_txt_grid;
   var $texto_fonte_tipo;
   var $texto_fonte_tamanho;
   var $cor_lin_grupo;
   var $cor_txt_grupo;
   var $grupo_fonte_tipo;
   var $grupo_fonte_tamanho;
   var $cor_lin_sub_tot;
   var $cor_txt_sub_tot;
   var $sub_tot_fonte_tipo;
   var $sub_tot_fonte_tamanho;
   var $cor_lin_tot;
   var $cor_txt_tot;
   var $tot_fonte_tipo;
   var $tot_fonte_tamanho;
   var $cor_link_cab;
   var $cor_link_dados;
   var $img_fun_pag;
   var $img_fun_cab;
   var $img_fun_rod;
   var $img_fun_tit;
   var $img_fun_gru;
   var $img_fun_tot;
   var $img_fun_sub;
   var $img_fun_imp;
   var $img_fun_par;
   var $root;
   var $server;
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
   var $str_schema_all;
   var $str_google_fonts;
   var $str_conf_reg;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $link_grid_select_igd_cons_psq;
   var $link_form_tbfisikigd_edit;
   var $link_form_tbtindakanigd_edit;
   var $link_form_tbreseprawatigd_edit;
   var $link_form_tbbhpigd_edit;
   var $link_form_tbrujukanlab_edit;
   var $link_form_tbrujukanradiologi_edit;
   var $link_pemeriksaanLab_rj_cons;
   var $link_form_tbhasilrad_edit;
   var $link_form_tbicd9cmigd_edit;
   var $link_form_tbsoapigd_edit;
   var $link_grid_histori_pasien_cons;
   var $link_form_tbdetailigd_inline;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
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
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_pages   = array();
   var $nm_page_names     = array();
   var $nm_page_blocks    = array();
   var $nm_block_page     = array();
   var $nm_hidden_blocos  = array();
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
   var $sc_lig_iframe = array();
   var $force_db_utf8 = false;
//
   function init()
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init;

      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
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
      $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "form_tbdetailigd"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "simrskreatifmedia"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake"; 
      $this->nm_script_type  = "PHP"; 
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20171106"; 
      $this->nm_hr_criacao   = "142653"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20190929"; 
      $this->nm_hr_ult_alt   = "160548"; 
      list($NM_usec, $NM_sec) = explode(" ", microtime()); 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0"; 
// 
      $this->border_grid           = ""; 
      $this->cor_bg_grid           = ""; 
      $this->cor_bg_table          = ""; 
      $this->cor_borda             = ""; 
      $this->cor_cab_grid          = ""; 
      $this->cor_txt_pag           = ""; 
      $this->cor_link_pag          = ""; 
      $this->pag_fonte_tipo        = ""; 
      $this->pag_fonte_tamanho     = ""; 
      $this->cor_txt_cab_grid      = ""; 
      $this->cab_fonte_tipo        = ""; 
      $this->cab_fonte_tamanho     = ""; 
      $this->rod_fonte_tipo        = ""; 
      $this->rod_fonte_tamanho     = ""; 
      $this->cor_rod_grid          = ""; 
      $this->cor_txt_rod_grid      = ""; 
      $this->cor_barra_nav         = ""; 
      $this->cor_titulo            = ""; 
      $this->cor_txt_titulo        = ""; 
      $this->titulo_fonte_tipo     = ""; 
      $this->titulo_fonte_tamanho  = ""; 
      $this->cor_grid_impar        = ""; 
      $this->cor_grid_par          = ""; 
      $this->cor_txt_grid          = ""; 
      $this->texto_fonte_tipo      = ""; 
      $this->texto_fonte_tamanho   = ""; 
      $this->cor_lin_grupo         = ""; 
      $this->cor_txt_grupo         = ""; 
      $this->grupo_fonte_tipo      = ""; 
      $this->grupo_fonte_tamanho   = ""; 
      $this->cor_lin_sub_tot       = ""; 
      $this->cor_txt_sub_tot       = ""; 
      $this->sub_tot_fonte_tipo    = ""; 
      $this->sub_tot_fonte_tamanho = ""; 
      $this->cor_lin_tot           = ""; 
      $this->cor_txt_tot           = ""; 
      $this->tot_fonte_tipo        = ""; 
      $this->tot_fonte_tamanho     = ""; 
      $this->cor_link_cab          = ""; 
      $this->cor_link_dados        = ""; 
      $this->img_fun_pag           = ""; 
      $this->img_fun_cab           = ""; 
      $this->img_fun_rod           = ""; 
      $this->img_fun_tit           = ""; 
      $this->img_fun_gru           = ""; 
      $this->img_fun_tot           = ""; 
      $this->img_fun_sub           = ""; 
      $this->img_fun_imp           = ""; 
      $this->img_fun_par           = ""; 
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
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
// 
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->path_prod       = $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_doc'];
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
      $this->str_schema_all  = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "sc_arafiq/sc_arafiq";
      $this->str_google_fonts  = isset($str_google_fonts)?$str_google_fonts:'';
      $this->server          = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->server_pdf      = $this->sc_protocolo . $this->server;
      $this->server          = "";
      $this->sc_protocolo    = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/form_tbdetailigd';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php/";
      $this->url_lib_js      = $this->path_link . "_lib/lib/js/";
      $this->url_lib         = $this->path_link . '/_lib/';
      $this->url_third       = $this->path_prod . '/third/';
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";

      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      if (isset($_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['form_tbdetailigd']['actual_lang']) || $_SESSION['scriptcase']['form_tbdetailigd']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['form_tbdetailigd']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_simrskreatifmedia',$this->str_lang,'0','/');
      }
      global $inicial_form_tbdetailigd;
      if (isset($_SESSION['scriptcase']['user_logout']))
      {
          foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  unset($_SESSION['scriptcase']['user_logout'][$ind]);
                  if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag) && $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag)
                  {
                      $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir']['action']  = $nm_apl_dest;
                      $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir']['target']  = $parms['T'];
                      $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir']['metodo']  = "post";
                      $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
                      $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir']['script_case_session']  = session_id();
                      form_tbdetailigd_pack_ajax_response();
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
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1); 
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      $_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "ISO-8859-1";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];

      asort($this->Nm_lang_conf_region);
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
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
      if (isset($_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_form.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scFormPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div class=\"scFormBorder\">\r\n";
              $SS_cod_html .= "    <table width='100%' cellspacing=0 cellpadding=0><tr><td class=\"scFormDataOdd\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html) && isset($_GET['nmgp_opcao']) && (substr($_GET['nmgp_opcao'], 0, 14) == "ajax_aut_comp_" || substr($_GET['nmgp_opcao'], 0, 13) == "ajax_autocomp"))
      {
          unset($_SESSION['sc_session']);
          $oJson = new Services_JSON();
          echo $oJson->encode("ss_time_out");
          exit;
      }
      elseif (isset($SS_cod_html) && isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_dyn_refresh_field" || $_POST['nmgp_opcao'] == "ajax_add_dyn_search" || $_POST['nmgp_opcao'] == "ajax_ch_bi_dyn_search"))
      {
          unset($_SESSION['sc_session']);
          $this->Arr_result = array();
          $this->Arr_result['ss_time_out'] = true;
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      elseif (isset($SS_cod_html) && isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
      {
          $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir']['action']  = "./";
          $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir']['target']  = "_self";
          $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir']['metodo']  = "post";
          $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
          $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir']['script_case_session']  = session_id();
          form_tbdetailigd_pack_ajax_response();
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['redir']))
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
      $Tmp_apl_lig = "form_tbfisikigd";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_tbfisikigd_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_tbfisikigd_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbfisikigd_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbfisikigd_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_tbfisikigd"] = 'S';
          }
      }
      $Tmp_apl_lig = "pemeriksaanLab_rj";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/pemeriksaanLab_rj_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/pemeriksaanLab_rj_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/pemeriksaanLab_rj_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/pemeriksaanLab_rj_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["pemeriksaanLab_rj"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_tbdiagnosaigd";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_tbdiagnosaigd_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_tbdiagnosaigd_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbdiagnosaigd_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbdiagnosaigd_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_tbdiagnosaigd"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_tbicd9cmigd";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_tbicd9cmigd_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_tbicd9cmigd_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbicd9cmigd_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbicd9cmigd_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_tbicd9cmigd"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_tbtindakanigd";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_tbtindakanigd_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_tbtindakanigd_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbtindakanigd_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbtindakanigd_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_tbtindakanigd"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_tbreseprawatigd";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_tbreseprawatigd_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_tbreseprawatigd_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbreseprawatigd_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbreseprawatigd_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_tbreseprawatigd"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_tbpenunjangigd";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_tbpenunjangigd_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_tbpenunjangigd_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbpenunjangigd_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbpenunjangigd_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_tbpenunjangigd"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_tbsoapigd";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_tbsoapigd_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_tbsoapigd_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbsoapigd_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbsoapigd_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_tbsoapigd"] = 'S';
          }
      }
      $Tmp_apl_lig = "grid_select_igd";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/grid_select_igd_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/grid_select_igd_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_select_igd_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_select_igd_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["grid_select_igd"] = 'S';
          }
      }
      $Tmp_apl_lig = "grid_histori_pasien";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/grid_histori_pasien_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/grid_histori_pasien_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_histori_pasien_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_histori_pasien_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["grid_histori_pasien"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_tbbhpigd";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_tbbhpigd_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_tbbhpigd_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbbhpigd_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbbhpigd_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_tbbhpigd"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_tbrujukanlab";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_tbrujukanlab_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_tbrujukanlab_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbrujukanlab_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbrujukanlab_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_tbrujukanlab"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_tbrujukanradiologi";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_tbrujukanradiologi_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_tbrujukanradiologi_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbrujukanradiologi_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbrujukanradiologi_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_tbrujukanradiologi"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_tbhasilrad";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_tbhasilrad_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_tbhasilrad_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbhasilrad_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_tbhasilrad_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_tbhasilrad"] = 'S';
          }
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
      if (-1 != version_compare(phpversion(), '5.0.0'))
      {
         $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph5/src";
      }
      else
      {
          $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph4/src";
      }
      $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      $_SESSION['scriptcase']['nm_root_cep']  = $this->root; 
      $_SESSION['scriptcase']['nm_path_cep']  = $this->path_cep; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_outra_jan'] != 'form_tbdetailigd')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_back'] ?>" title="<?php echo $this->Nm_lang['lang_btns_back_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
              else 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_danger" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="<?php echo $this->Nm_lang['lang_btns_exit_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
          } 
          exit ;
      }

      $this->path_atual  = getcwd();
      $opsys = strtolower(php_uname());

      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode, $remove_margin;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['remove_margin']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      $this->link_grid_select_igd_cons_psq = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('grid_select_igd') . "/";
      $this->link_form_tbfisikigd_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_tbfisikigd') . "/";
      $this->sc_lig_target["C_@scinf_fisik"] = 'nmsc_iframe_liga_form_tbfisikigd';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_tbfisikigd"] = 'nmsc_iframe_liga_form_tbfisikigd';
      $this->link_form_tbtindakanigd_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_tbtindakanigd') . "/";
      $this->sc_lig_target["C_@scinf_tindakan"] = 'nmsc_iframe_liga_form_tbtindakanigd';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_tbtindakanigd"] = 'nmsc_iframe_liga_form_tbtindakanigd';
      $this->link_form_tbreseprawatigd_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_tbreseprawatigd') . "/";
      $this->sc_lig_target["C_@scinf_resep"] = 'nmsc_iframe_liga_form_tbreseprawatigd';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_tbreseprawatigd"] = 'nmsc_iframe_liga_form_tbreseprawatigd';
      $this->link_form_tbbhpigd_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_tbbhpigd') . "/";
      $this->sc_lig_target["C_@scinf_BHP"] = 'nmsc_iframe_liga_form_tbbhpigd';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_tbbhpigd"] = 'nmsc_iframe_liga_form_tbbhpigd';
      $this->link_form_tbrujukanlab_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_tbrujukanlab') . "/";
      $this->sc_lig_target["C_@scinf_sc_field_3"] = 'nmsc_iframe_liga_form_tbrujukanlab';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_tbrujukanlab"] = 'nmsc_iframe_liga_form_tbrujukanlab';
      $this->link_form_tbrujukanradiologi_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_tbrujukanradiologi') . "/";
      $this->sc_lig_target["C_@scinf_sc_field_4"] = 'nmsc_iframe_liga_form_tbrujukanradiologi';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_tbrujukanradiologi"] = 'nmsc_iframe_liga_form_tbrujukanradiologi';
      $this->link_pemeriksaanLab_rj_cons = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('pemeriksaanLab_rj') . "/";
      $this->sc_lig_target["C_@scinf_pemeriksaan"] = 'nmsc_iframe_liga_pemeriksaanLab_rj';
      $this->sc_lig_iframe["nmsc_iframe_liga_pemeriksaanLab_rj"] = 'nmsc_iframe_liga_pemeriksaanLab_rj';
      $this->link_form_tbhasilrad_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_tbhasilrad') . "/";
      $this->sc_lig_target["C_@scinf_sc_field_1"] = 'nmsc_iframe_liga_form_tbhasilrad';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_tbhasilrad"] = 'nmsc_iframe_liga_form_tbhasilrad';
      $this->link_form_tbicd9cmigd_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_tbicd9cmigd') . "/";
      $this->sc_lig_target["C_@scinf_prosedur"] = 'nmsc_iframe_liga_form_tbicd9cmigd';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_tbicd9cmigd"] = 'nmsc_iframe_liga_form_tbicd9cmigd';
      $this->link_form_tbsoapigd_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_tbsoapigd') . "/";
      $this->sc_lig_target["C_@scinf_SOAP"] = 'nmsc_iframe_liga_form_tbsoapigd';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_tbsoapigd"] = 'nmsc_iframe_liga_form_tbsoapigd';
      $this->link_grid_histori_pasien_cons = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('grid_histori_pasien') . "/";
      $this->link_form_tbdetailigd_inline = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_tbdetailigd') . "/form_tbdetailigd_inline.php";
      if ($_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_tbdetailigd"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_tbdetailigd"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      if (isset($this->sc_lig_iframe[$this->sc_lig_target[$sTmpTargetLink]]))
                      {
                          $this->sc_lig_iframe[$this->sc_lig_target[$sTmpTargetLink]] = $sTmpTargetWidget;
                      }
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
      $this->nm_cont_lin       = 0;
      $this->nm_limite_lin     = 0;
      $this->nm_limite_lin_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php");
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod");
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib");
      if(function_exists('set_php_timezone'))  set_php_timezone('form_tbdetailigd'); 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->nm_data = new nm_data("id");
      global $inicial_form_tbdetailigd, $NM_run_iframe;
      if ((isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag) && $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag) || (isset($_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['embutida_call']) && $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['embutida_call']) || $NM_run_iframe == 1)
      {
           $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      }
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']) || empty($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1; 
      } 
      $this->Export_img_zip = false;;
      $this->Img_export_zip  = array();
      $this->regionalDefault();
      $this->sc_tem_trans_banco = false;
      $this->nm_bases_access     = array("access", "ado_access", "ace_access");
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
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
      $this->nm_bases_progress   = array("progress", "pdo_progress_odbc");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc, $this->nm_bases_progress);
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1D9FYH9FUHAN7HuF7HuBOVIBOHEF/HMraDcNmZSBqZ1rYHQJwDEBODkFeH5FYVoFGHQJKDQBqHANOHuFaHuNOZSrCH5FqDoXGHQJmZ1BiHArKHQX7DErKZSXeDWX7HIXGD9JKZ9XGHAN7D5JeHuNOVcrsDWBmVoF7DcJUZ1B/HIveHQFGHgBeHEFiV5B3DoF7D9XsDuFaHAveD5JwHuzGVcXKV5X7VoBOD9XOZSB/Z1BeV5FUDENOVkXeDWFqHIJsD9XsZ9JeD1BeD5F7DMvmVcFiV5X7DorqD9BsH9FaHAN7V5X7DMNKZSJGH5F/DorqDcBwDQJsHABYVWJsHgvsVcBOHEFYDoJeD9JmZ1B/HIBeV5B/HgvCVkJGDWF/VoJeD9NwDQFaHAveD5NUHgNKDkBOV5FYHMBiHQBiVIJsD1rwZMXGDMzGHArCDWXCHIBOHQNmDuFaD1BeHuFaHuNOZSrCH5FqDoXGHQJmZ1FGDSvOZMJwHgNOHENiDWF/DoJsDcBiDuFaHAvOD5F7DMrYVIBsDWJeHINUHQXOVINUHAvmV5X7DMvCHArCH5BmZuFaHQXsZSBiZ1vCD5F7HgvOV9BUDWJeHMJsHQBqZ1X7D1zGD5rqDEBOHEFiHEFqDoF7DcJUZSBiHIBOVWFaHgrwVIBsHEBmVEX7HQNwZ1BiD1vsV5X7DMvCHErCDWX7HIBqHQJeDuBqDSzGD5F7DMzGVIB/DWF/HMB/HQBqZ1FGHIBOV5X7HgBOHErsDuJeHMFaHQFYZSBiHAvOV5FGHuNOVcFKHEFYVoBqDcBwH9FaD1rwD5rqDMNKZSJGDWF/DoraD9NmDQJsHIrKV5raDMrwDkBOV5X7VorqD9BiZ1FUZ1BeHuXGDMzGHEJGH5F/HMBqDcJeDQX7DSrwD5JwDMrwDkFCDWBmVEFGHQFYH9FaHIBeZMBODEvsZSJGDWr/DoB/D9XsZSFGD1NKV5JwHuzGDkBOH5FqVoX7D9JmZ1FaHArKZMB/DMBYZSXeDWX7DoXGDcBwDuBOZ1NaV5FGHuNOVcFKHEFYVoBqDcBwH9FaD1rwD5rqDMNKZSXeDuJeDoB/D9NwZSFGD1veV5raHuBYVIFCDWXCVoFGHQNwZ1BiD1zGZMBOHgNKDkXKH5FGDoXGHQBiDuBqHINaD5NUHuNOVcFKV5X7VoBqDcBqZ1B/HIrwHQJwDEBODkFeH5FYVoFGHQJKDQBqHAvmV5JeDMvOZSNiDWB3VorqHQNwZ1BiHAvCD5BqHgBeHEFiV5B3DoF7D9XsDuFaHAveHuNUDMvmVIB/HEFYDoFUD9XOZ1B/DSvOZMB/DEvsHENiDWX7HIBqDcBwDQJwHANOHurqDMvmVcFKV5BmVoBqD9BsZkFGHArKHuB/DMBYHEXeHEFqDoXGD9FYDQFGHABYD5rqHuNOVcFKDWFaDoX7DcBwZ1X7HAN7D5NUDMzGVkXeHEFqZuB/D9XsDQBOHAveHuFGHuzGDkBODuFqVoB/D9BsZkFGHArKV5FUDMrYZSXeV5FqHIJsHQJeDuBOZ1vCV5Je";
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_outra_jan'] != 'form_tbdetailigd')) 
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
   }
   function prep_conect()
   {
      $con_devel             =  (isset($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao']) && $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_perfil']) && $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_tbdetailigd']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['form_tbdetailigd']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'simrskreatifmedia', 2, $this->force_db_utf8); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_perfil'];
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
         $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['SC_sep_date1'];
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "tbdetailigd"; 
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
          if (!$_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['sc_outra_jan'] != 'form_tbdetailigd')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_back'] ?>" title="<?php echo $this->Nm_lang['lang_btns_back_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
              else 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_danger" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="<?php echo $this->Nm_lang['lang_btns_exit_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao'], $this->root . $this->path_prod, 'simrskreatifmedia', 1, $this->force_db_utf8); 
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
          $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['decimal_db'] = "."; 
      } 
  }

  function setConnectionHash() {
    if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao'])) {
      list($connectionDbms, $connectionHost, $connectionUser, $connectionPassword, $connectionDatabase) = db_conect_devel($_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_conexao'], $this->root . $this->path_prod, 'simrskreatifmedia', 1, $this->force_db_utf8);
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
// 

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
   }
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['form_tbdetailigd']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
}
//===============================================================================
class form_tbdetailigd_edit
{
    var $contr_form_tbdetailigd;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("form_tbdetailigd_apl.php");
        $this->contr_form_tbdetailigd = new form_tbdetailigd_apl();
    }
}
if (!function_exists("NM_is_utf8"))
{
    include_once("../_lib/lib/php/nm_utf8.php");
}
ob_start();
//
//----------------  
//
    $_SESSION['scriptcase']['form_tbdetailigd']['contr_erro'] = 'off';
    if (!function_exists("NM_is_utf8"))
    {
        include_once("../_lib/lib/php/nm_utf8.php");
    }
    if (!function_exists("SC_dir_app_ini"))
    {
        include_once("../_lib/lib/php/nm_ctrl_app_name.php");
    }
    SC_dir_app_ini('simrskreatifmedia');
    $sc_conv_var = array();
    $sc_conv_var['cara bayar'] = "sc_field_0";
    $sc_conv_var['hasil rad'] = "sc_field_1";
    $sc_conv_var['nama pasien'] = "sc_field_2";
    $sc_conv_var['rujuk lab'] = "sc_field_3";
    $sc_conv_var['rujuk radiologi'] = "sc_field_4";
    $sc_conv_var['tgl lahir'] = "sc_field_5";
    if (!empty($_FILES))
    {
        foreach ($_FILES as $nmgp_campo => $nmgp_valores)
        {
             if (isset($sc_conv_var[$nmgp_campo]))
             {
                 $nmgp_campo = $sc_conv_var[$nmgp_campo];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_campo)]))
             {
                 $nmgp_campo = $sc_conv_var[strtolower($nmgp_campo)];
             }
             $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
             $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
             $$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
             $$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
             $$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
        }
    }
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
             if (isset($sc_conv_var[$nmgp_var]))
             {
                 $nmgp_var = $sc_conv_var[$nmgp_var];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
             {
                 $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
             }
             nm_limpa_str_form_tbdetailigd($nmgp_val);
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
             nm_limpa_str_form_tbdetailigd($nmgp_val);
             $nmgp_val = NM_decode_input($nmgp_val);
             $$nmgp_var = $nmgp_val;
        }
    }
    if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($script_case_session) && !isset($_POST['rs']) && !isset($nmgp_start) ))
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
        elseif (is_file($root . $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_imag_temp'] . "/sc_apl_default_simrskreatifmedia.txt")) {
            $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['form_tbdetailigd']['glo_nm_path_imag_temp'] . "/sc_apl_default_simrskreatifmedia.txt"));
        }
        if (isset($apl_def)) {
            if ($apl_def[0] != "form_tbdetailigd") {
                $_SESSION['scriptcase']['sem_session'] = true;
                if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                    $_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['redir'] = $apl_def[0];
                }
                else {
                    $_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
                }
                $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
                $_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['redir_tp'] = $Redir_tp;
            }
            if (isset($_COOKIE['sc_actual_lang_simrskreatifmedia'])) {
                $_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_simrskreatifmedia'];
            }
        }
    }
    if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
    {
        $_SESSION['sc_session']['SC_parm_violation'] = true;
    }
    if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
    {
        $nmgp_parms = "";
    }
    if (isset($SC_where_pdf) && !empty($SC_where_pdf))
    {
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['where_filter'] = $SC_where_pdf;
    }

    if (isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']) && !isset($_SESSION['scriptcase']['form_tbdetailigd']['session_timeout']['redir']))
    {
        if ('ajax_form_tbdetailigd_validate_trancode' == $_POST['rs'])
        {
            $trancode = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_nostruk' == $_POST['rs'])
        {
            $nostruk = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_custcode' == $_POST['rs'])
        {
            $custcode = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_sc_field_2' == $_POST['rs'])
        {
            $sc_field_2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_dokter' == $_POST['rs'])
        {
            $dokter = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_usia' == $_POST['rs'])
        {
            $usia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_sc_field_5' == $_POST['rs'])
        {
            $sc_field_5 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_sc_field_0' == $_POST['rs'])
        {
            $sc_field_0 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_diagnosa1' == $_POST['rs'])
        {
            $diagnosa1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_icd1' == $_POST['rs'])
        {
            $icd1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_diagnosa2' == $_POST['rs'])
        {
            $diagnosa2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_icd2' == $_POST['rs'])
        {
            $icd2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_selesai' == $_POST['rs'])
        {
            $selesai = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_tglkeluar' == $_POST['rs'])
        {
            $tglkeluar = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_carakeluar' == $_POST['rs'])
        {
            $carakeluar = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_alasankeluar' == $_POST['rs'])
        {
            $alasankeluar = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_fisik' == $_POST['rs'])
        {
            $fisik = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_tindakan' == $_POST['rs'])
        {
            $tindakan = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_resep' == $_POST['rs'])
        {
            $resep = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_bhp' == $_POST['rs'])
        {
            $bhp = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_sc_field_3' == $_POST['rs'])
        {
            $sc_field_3 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_sc_field_4' == $_POST['rs'])
        {
            $sc_field_4 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_id' == $_POST['rs'])
        {
            $id = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_pemeriksaan' == $_POST['rs'])
        {
            $pemeriksaan = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_sc_field_1' == $_POST['rs'])
        {
            $sc_field_1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_prosedur' == $_POST['rs'])
        {
            $prosedur = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_validate_soap' == $_POST['rs'])
        {
            $soap = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_refresh_trancode' == $_POST['rs'])
        {
            $trancode = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nostruk = NM_utf8_urldecode($_POST['rsargs'][1]);
            $custcode = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][3]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][4]);
        }
        if ('ajax_form_tbdetailigd_refresh_nostruk' == $_POST['rs'])
        {
            $nostruk = NM_utf8_urldecode($_POST['rsargs'][0]);
            $custcode = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_tbdetailigd_refresh_custcode' == $_POST['rs'])
        {
            $custcode = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_tbdetailigd_event_selesai_onchange' == $_POST['rs'])
        {
            $selesai = NM_utf8_urldecode($_POST['rsargs'][0]);
            $tglkeluar = NM_utf8_urldecode($_POST['rsargs'][1]);
            $carakeluar = NM_utf8_urldecode($_POST['rsargs'][2]);
            $alasankeluar = NM_utf8_urldecode($_POST['rsargs'][3]);
            $trancode = NM_utf8_urldecode($_POST['rsargs'][4]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][5]);
        }
        if ('ajax_form_tbdetailigd_autocomp_icd1' == $_POST['rs'])
        {
            $icd1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_autocomp_icd2' == $_POST['rs'])
        {
            $icd2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_tbdetailigd_submit_form' == $_POST['rs'])
        {
            $trancode = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nostruk = NM_utf8_urldecode($_POST['rsargs'][1]);
            $custcode = NM_utf8_urldecode($_POST['rsargs'][2]);
            $sc_field_2 = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dokter = NM_utf8_urldecode($_POST['rsargs'][4]);
            $usia = NM_utf8_urldecode($_POST['rsargs'][5]);
            $sc_field_5 = NM_utf8_urldecode($_POST['rsargs'][6]);
            $sc_field_0 = NM_utf8_urldecode($_POST['rsargs'][7]);
            $diagnosa1 = NM_utf8_urldecode($_POST['rsargs'][8]);
            $icd1 = NM_utf8_urldecode($_POST['rsargs'][9]);
            $diagnosa2 = NM_utf8_urldecode($_POST['rsargs'][10]);
            $icd2 = NM_utf8_urldecode($_POST['rsargs'][11]);
            $selesai = NM_utf8_urldecode($_POST['rsargs'][12]);
            $tglkeluar = NM_utf8_urldecode($_POST['rsargs'][13]);
            $carakeluar = NM_utf8_urldecode($_POST['rsargs'][14]);
            $alasankeluar = NM_utf8_urldecode($_POST['rsargs'][15]);
            $id = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][17]);
            $nmgp_url_saida = NM_utf8_urldecode($_POST['rsargs'][18]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][19]);
            $nmgp_ancora = NM_utf8_urldecode($_POST['rsargs'][20]);
            $nmgp_num_form = NM_utf8_urldecode($_POST['rsargs'][21]);
            $nmgp_parms = NM_utf8_urldecode($_POST['rsargs'][22]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][23]);
            $csrf_token = NM_utf8_urldecode($_POST['rsargs'][24]);
        }
        if ('ajax_form_tbdetailigd_navigate_form' == $_POST['rs'])
        {
            $id = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_ordem = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nmgp_fast_search = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nmgp_cond_fast_search = NM_utf8_urldecode($_POST['rsargs'][5]);
            $nmgp_arg_fast_search = NM_utf8_urldecode($_POST['rsargs'][6]);
            $nmgp_arg_dyn_search = NM_utf8_urldecode($_POST['rsargs'][7]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][8]);
        }
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
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_grid_edit_link']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_grid_edit_link'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_modal']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_modal'] = isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'];
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_parms']))
    { 
        $tmp_nmgp_parms = '';
        if (isset($nmgp_parms) && '' != $nmgp_parms)
        {
            $tmp_nmgp_parms = $nmgp_parms . '?@?';
        }
        $nmgp_parms = $tmp_nmgp_parms . $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_parms']);
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
               nm_limpa_str_form_tbdetailigd($cadapar[1]);
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
    elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['parms']);
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
    if (isset($script_case_init) && $script_case_init != preg_replace('/[^0-9.]/', '', $script_case_init))
    {
        unset($script_case_init);
    }
    if (!isset($script_case_init) || empty($script_case_init) || is_array($script_case_init))
    {
        $script_case_init = rand(2, 10000);
    }
    $salva_run = "N";
    $salva_iframe = false;
    if (isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe']);
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "form_tbdetailigd";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'form_tbdetailigd' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['iframe_menu'] = $salva_iframe;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['db_changed']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['db_changed'] = false;
    }
    if (isset($_GET['nmgp_outra_jan']) && 'true' == $_GET['nmgp_outra_jan'] && isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'])
    {
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['db_changed'] = false;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'form_tbdetailigd')
    {
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        if (isset($nmgp_url_saida) && $nmgp_url_saida == "modal")
        {
            $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_modal'] = true;
            $nm_url_saida = "form_tbdetailigd_fim.php"; 
        }
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_outra_jan'] = true;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['initialize']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['initialize'] = true;
    }
    elseif (!isset($_SERVER['HTTP_REFERER']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['initialize'] = false;
    }
    elseif (false === strpos($_SERVER['HTTP_REFERER'], '/form_tbdetailigd/'))
    {
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['initialize'] = true;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['initialize'] = false;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['first_time'] = true;
    }

    $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/form_tbdetailigd_erro.php");
    $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Konqueror") ;
    if (is_int($nm_browser))   
    {
        $nm_browser = "Konqueror"; 
    } 
    else  
    {
        $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Opera") ;
        if (is_int($nm_browser))   
        {
            $nm_browser = "Opera"; 
        }
    } 
    $_SESSION['scriptcase']['change_regional_old'] = '';
    $_SESSION['scriptcase']['change_regional_new'] = '';
    if (!empty($nmgp_opcao) && ($nmgp_opcao == "change_lang_t" || $nmgp_opcao == "change_lang_b" || $nmgp_opcao == "change_lang_f" || $nmgp_opcao == "force_lang"))  
    {
        $Temp_lang = $nmgp_opcao == "force_lang" ? explode(";" , $nmgp_idioma) : explode(";" , $nmgp_idioma_novo);  
        if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
        { 
            $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
        } 
        if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
        { 
            $_SESSION['scriptcase']['change_regional_old'] = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "id_id";
            $_SESSION['scriptcase']['str_conf_reg']        = $Temp_lang[1];
            $_SESSION['scriptcase']['change_regional_new'] = $_SESSION['scriptcase']['str_conf_reg'];
        } 
        $nmgp_opcao = $nmgp_opcao == "force_lang" ? "inicio" : "igual";
    } 
    if (!empty($nmgp_opcao) && ($nmgp_opcao == "change_schema_t" || $nmgp_opcao == "change_schema_b" || $nmgp_opcao == "change_schema_f"))  
    {
        if ($nmgp_opcao == "change_schema_t")  
        {
            $nmgp_schema = $nmgp_schema_t . "/" . $nmgp_schema_t;  
        } 
        elseif ($nmgp_opcao == "change_schema_b")  
        {
            $nmgp_schema = $nmgp_schema_b . "/" . $nmgp_schema_b;  
        } 
        else 
        {
            $nmgp_schema = $nmgp_schema_f . "/" . $nmgp_schema_f;  
        } 
        $_SESSION['scriptcase']['str_schema_all'] = $nmgp_schema;
        $nmgp_opcao = "recarga";  
    } 
    if (!empty($nmgp_opcao) && $nmgp_opcao == "lookup")  
    {
        $nm_opc_lookup = $nmgp_opcao;
    }
    elseif (!empty($nmgp_opcao) && $nmgp_opcao == "formphp")  
    {
        $nm_opc_form_php = $nmgp_opcao;
    }
    else
    {
        if (!empty($nmgp_opcao))  
        {
            $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['opcao'] = $nmgp_opcao ; 
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_redirect_tp'] = "";
            $nm_url_saida = "form_tbdetailigd_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "form_tbdetailigd_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['retorno_edit'] . "?script_case_init=" . $script_case_init . "&script_case_session=" . session_id();  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
                $nm_url_saida = "form_tbdetailigd_fim.php"; 
                $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
                if ($nm_apl_dependente == 1) 
                { 
                    $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
                } 
                if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
                { 
                    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['scriptcase']['nm_sc_retorno']; 
                } 
            } 
        }
        if (empty($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
            $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init . "&script_case_session=" . session_id(); 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_outra_jan'] = true;
         if ($nmgp_url_saida == "modal")
         {
             $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_modal'] = true;
             $nm_url_saida = "form_tbdetailigd_fim.php"; 
         }
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_tbdetailigd']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    $inicial_form_tbdetailigd = new form_tbdetailigd_edit();
    $inicial_form_tbdetailigd->inicializa();

    $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['select_html'] = array();
    $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['select_html']['custcode'] = "class=\"sc-js-input scFormObjectOdd css_custcode_obj\" style=\"\" id=\"id_sc_field_custcode\" name=\"custcode\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['select_html']['sc_field_2'] = "class=\"sc-js-input scFormObjectOdd css_sc_field_2_obj\" style=\"\" id=\"id_sc_field_sc_field_2\" name=\"sc_field_2\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['select_html']['dokter'] = "class=\"sc-js-input scFormObjectOdd css_dokter_obj\" style=\"\" id=\"id_sc_field_dokter\" name=\"dokter\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['select_html']['sc_field_5'] = "class=\"sc-js-input scFormObjectOdd css_sc_field_5_obj\" style=\"\" id=\"id_sc_field_sc_field_5\" name=\"sc_field_5\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['select_html']['selesai'] = "class=\"sc-js-input scFormObjectOdd css_selesai_obj\" style=\"\" id=\"id_sc_field_selesai\" name=\"selesai\" size=\"1\" alt=\"{type: \'select\', enterTab: false}\"";
    $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['select_html']['carakeluar'] = "class=\"sc-js-input scFormObjectOdd css_carakeluar_obj\" style=\"\" id=\"id_sc_field_carakeluar\" name=\"carakeluar\" size=\"1\" alt=\"{type: \'select\', enterTab: false}\"";

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/form_tbdetailigd_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/form_tbdetailigd_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_form_tbdetailigd_validate_trancode");
    sajax_export("ajax_form_tbdetailigd_validate_nostruk");
    sajax_export("ajax_form_tbdetailigd_validate_custcode");
    sajax_export("ajax_form_tbdetailigd_validate_sc_field_2");
    sajax_export("ajax_form_tbdetailigd_validate_dokter");
    sajax_export("ajax_form_tbdetailigd_validate_usia");
    sajax_export("ajax_form_tbdetailigd_validate_sc_field_5");
    sajax_export("ajax_form_tbdetailigd_validate_sc_field_0");
    sajax_export("ajax_form_tbdetailigd_validate_diagnosa1");
    sajax_export("ajax_form_tbdetailigd_validate_icd1");
    sajax_export("ajax_form_tbdetailigd_validate_diagnosa2");
    sajax_export("ajax_form_tbdetailigd_validate_icd2");
    sajax_export("ajax_form_tbdetailigd_validate_selesai");
    sajax_export("ajax_form_tbdetailigd_validate_tglkeluar");
    sajax_export("ajax_form_tbdetailigd_validate_carakeluar");
    sajax_export("ajax_form_tbdetailigd_validate_alasankeluar");
    sajax_export("ajax_form_tbdetailigd_validate_fisik");
    sajax_export("ajax_form_tbdetailigd_validate_tindakan");
    sajax_export("ajax_form_tbdetailigd_validate_resep");
    sajax_export("ajax_form_tbdetailigd_validate_bhp");
    sajax_export("ajax_form_tbdetailigd_validate_sc_field_3");
    sajax_export("ajax_form_tbdetailigd_validate_sc_field_4");
    sajax_export("ajax_form_tbdetailigd_validate_id");
    sajax_export("ajax_form_tbdetailigd_validate_pemeriksaan");
    sajax_export("ajax_form_tbdetailigd_validate_sc_field_1");
    sajax_export("ajax_form_tbdetailigd_validate_prosedur");
    sajax_export("ajax_form_tbdetailigd_validate_soap");
    sajax_export("ajax_form_tbdetailigd_refresh_trancode");
    sajax_export("ajax_form_tbdetailigd_refresh_nostruk");
    sajax_export("ajax_form_tbdetailigd_refresh_custcode");
    sajax_export("ajax_form_tbdetailigd_event_selesai_onchange");
    sajax_export("ajax_form_tbdetailigd_autocomp_icd1");
    sajax_export("ajax_form_tbdetailigd_autocomp_icd2");
    sajax_export("ajax_form_tbdetailigd_submit_form");
    sajax_export("ajax_form_tbdetailigd_navigate_form");
    sajax_handle_client_request();

    $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
//
    function nm_limpa_str_form_tbdetailigd(&$str)
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

    function ajax_form_tbdetailigd_validate_trancode($trancode, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_trancode';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'trancode' => NM_utf8_urldecode($trancode),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_trancode

    function ajax_form_tbdetailigd_validate_nostruk($nostruk, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_nostruk';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'nostruk' => NM_utf8_urldecode($nostruk),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_nostruk

    function ajax_form_tbdetailigd_validate_custcode($custcode, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_custcode';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'custcode' => NM_utf8_urldecode($custcode),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_custcode

    function ajax_form_tbdetailigd_validate_sc_field_2($sc_field_2, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_sc_field_2';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'sc_field_2' => NM_utf8_urldecode($sc_field_2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_sc_field_2

    function ajax_form_tbdetailigd_validate_dokter($dokter, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_dokter';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'dokter' => NM_utf8_urldecode($dokter),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_dokter

    function ajax_form_tbdetailigd_validate_usia($usia, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_usia';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'usia' => NM_utf8_urldecode($usia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_usia

    function ajax_form_tbdetailigd_validate_sc_field_5($sc_field_5, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_sc_field_5';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'sc_field_5' => NM_utf8_urldecode($sc_field_5),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_sc_field_5

    function ajax_form_tbdetailigd_validate_sc_field_0($sc_field_0, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_sc_field_0';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'sc_field_0' => NM_utf8_urldecode($sc_field_0),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_sc_field_0

    function ajax_form_tbdetailigd_validate_diagnosa1($diagnosa1, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_diagnosa1';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'diagnosa1' => NM_utf8_urldecode($diagnosa1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_diagnosa1

    function ajax_form_tbdetailigd_validate_icd1($icd1, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_icd1';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'icd1' => NM_utf8_urldecode($icd1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_icd1

    function ajax_form_tbdetailigd_validate_diagnosa2($diagnosa2, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_diagnosa2';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'diagnosa2' => NM_utf8_urldecode($diagnosa2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_diagnosa2

    function ajax_form_tbdetailigd_validate_icd2($icd2, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_icd2';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'icd2' => NM_utf8_urldecode($icd2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_icd2

    function ajax_form_tbdetailigd_validate_selesai($selesai, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_selesai';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'selesai' => NM_utf8_urldecode($selesai),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_selesai

    function ajax_form_tbdetailigd_validate_tglkeluar($tglkeluar, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_tglkeluar';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'tglkeluar' => NM_utf8_urldecode($tglkeluar),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_tglkeluar

    function ajax_form_tbdetailigd_validate_carakeluar($carakeluar, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_carakeluar';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'carakeluar' => NM_utf8_urldecode($carakeluar),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_carakeluar

    function ajax_form_tbdetailigd_validate_alasankeluar($alasankeluar, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_alasankeluar';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'alasankeluar' => NM_utf8_urldecode($alasankeluar),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_alasankeluar

    function ajax_form_tbdetailigd_validate_fisik($fisik, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_fisik';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'fisik' => NM_utf8_urldecode($fisik),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_fisik

    function ajax_form_tbdetailigd_validate_tindakan($tindakan, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_tindakan';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'tindakan' => NM_utf8_urldecode($tindakan),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_tindakan

    function ajax_form_tbdetailigd_validate_resep($resep, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_resep';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'resep' => NM_utf8_urldecode($resep),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_resep

    function ajax_form_tbdetailigd_validate_bhp($bhp, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_bhp';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'bhp' => NM_utf8_urldecode($bhp),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_bhp

    function ajax_form_tbdetailigd_validate_sc_field_3($sc_field_3, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_sc_field_3';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'sc_field_3' => NM_utf8_urldecode($sc_field_3),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_sc_field_3

    function ajax_form_tbdetailigd_validate_sc_field_4($sc_field_4, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_sc_field_4';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'sc_field_4' => NM_utf8_urldecode($sc_field_4),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_sc_field_4

    function ajax_form_tbdetailigd_validate_id($id, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_id';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'id' => NM_utf8_urldecode($id),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_id

    function ajax_form_tbdetailigd_validate_pemeriksaan($pemeriksaan, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_pemeriksaan';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'pemeriksaan' => NM_utf8_urldecode($pemeriksaan),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_pemeriksaan

    function ajax_form_tbdetailigd_validate_sc_field_1($sc_field_1, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_sc_field_1';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'sc_field_1' => NM_utf8_urldecode($sc_field_1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_sc_field_1

    function ajax_form_tbdetailigd_validate_prosedur($prosedur, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_prosedur';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'prosedur' => NM_utf8_urldecode($prosedur),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_prosedur

    function ajax_form_tbdetailigd_validate_soap($soap, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'validate_soap';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'soap' => NM_utf8_urldecode($soap),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_validate_soap

    function ajax_form_tbdetailigd_refresh_trancode($trancode, $nostruk, $custcode, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'refresh_trancode';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'trancode' => NM_utf8_urldecode($trancode),
                  'nostruk' => NM_utf8_urldecode($nostruk),
                  'custcode' => NM_utf8_urldecode($custcode),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_refresh_trancode

    function ajax_form_tbdetailigd_refresh_nostruk($nostruk, $custcode, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'refresh_nostruk';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'nostruk' => NM_utf8_urldecode($nostruk),
                  'custcode' => NM_utf8_urldecode($custcode),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_refresh_nostruk

    function ajax_form_tbdetailigd_refresh_custcode($custcode, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'refresh_custcode';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'custcode' => NM_utf8_urldecode($custcode),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_refresh_custcode

    function ajax_form_tbdetailigd_event_selesai_onchange($selesai, $tglkeluar, $carakeluar, $alasankeluar, $trancode, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'event_selesai_onchange';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'selesai' => NM_utf8_urldecode($selesai),
                  'tglkeluar' => NM_utf8_urldecode($tglkeluar),
                  'carakeluar' => NM_utf8_urldecode($carakeluar),
                  'alasankeluar' => NM_utf8_urldecode($alasankeluar),
                  'trancode' => NM_utf8_urldecode($trancode),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_event_selesai_onchange

    function ajax_form_tbdetailigd_autocomp_icd1($icd1, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'autocomp_icd1';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'icd1' => NM_utf8_urldecode($icd1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['icd1'] = utf8_decode(urldecode($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['icd1']));
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_autocomp_icd1

    function ajax_form_tbdetailigd_autocomp_icd2($icd2, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'autocomp_icd2';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'icd2' => NM_utf8_urldecode($icd2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['icd2'] = utf8_decode(urldecode($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['icd2']));
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_autocomp_icd2

    function ajax_form_tbdetailigd_submit_form($trancode, $nostruk, $custcode, $sc_field_2, $dokter, $usia, $sc_field_5, $sc_field_0, $diagnosa1, $icd1, $diagnosa2, $icd2, $selesai, $tglkeluar, $carakeluar, $alasankeluar, $id, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init, $csrf_token)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'submit_form';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'trancode' => NM_utf8_urldecode($trancode),
                  'nostruk' => NM_utf8_urldecode($nostruk),
                  'custcode' => NM_utf8_urldecode($custcode),
                  'sc_field_2' => NM_utf8_urldecode($sc_field_2),
                  'dokter' => NM_utf8_urldecode($dokter),
                  'usia' => NM_utf8_urldecode($usia),
                  'sc_field_5' => NM_utf8_urldecode($sc_field_5),
                  'sc_field_0' => NM_utf8_urldecode($sc_field_0),
                  'diagnosa1' => NM_utf8_urldecode($diagnosa1),
                  'icd1' => NM_utf8_urldecode($icd1),
                  'diagnosa2' => NM_utf8_urldecode($diagnosa2),
                  'icd2' => NM_utf8_urldecode($icd2),
                  'selesai' => NM_utf8_urldecode($selesai),
                  'tglkeluar' => NM_utf8_urldecode($tglkeluar),
                  'carakeluar' => NM_utf8_urldecode($carakeluar),
                  'alasankeluar' => NM_utf8_urldecode($alasankeluar),
                  'id' => NM_utf8_urldecode($id),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_url_saida' => NM_utf8_urldecode($nmgp_url_saida),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ancora' => NM_utf8_urldecode($nmgp_ancora),
                  'nmgp_num_form' => NM_utf8_urldecode($nmgp_num_form),
                  'nmgp_parms' => NM_utf8_urldecode($nmgp_parms),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'csrf_token' => NM_utf8_urldecode($csrf_token),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_submit_form

    function ajax_form_tbdetailigd_navigate_form($id, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_tbdetailigd;
        //register_shutdown_function("form_tbdetailigd_pack_ajax_response");
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_flag          = true;
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao         = 'navigate_form';
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param'] = array(
                  'id' => NM_utf8_urldecode($id),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ordem' => NM_utf8_urldecode($nmgp_ordem),
                  'nmgp_fast_search' => NM_utf8_urldecode($nmgp_fast_search),
                  'nmgp_cond_fast_search' => NM_utf8_urldecode($nmgp_cond_fast_search),
                  'nmgp_arg_fast_search' => NM_utf8_urldecode($nmgp_arg_fast_search),
                  'nmgp_arg_dyn_search' => NM_utf8_urldecode($nmgp_arg_dyn_search),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_tbdetailigd->contr_form_tbdetailigd->controle();
        exit;
    } // ajax_navigate_form


   function form_tbdetailigd_pack_ajax_response()
   {
      global $inicial_form_tbdetailigd;
      $aResp = array();

      if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['empty_filter']))
      {
          $aResp['empty_filter'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['empty_filter'];
      }
      if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['dyn_search']['NM_Dynamic_Search']))
      {
          $aResp['dyn_search']['NM_Dynamic_Search'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['dyn_search']['NM_Dynamic_Search'];
      }
      if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str']))
      {
          $aResp['dyn_search']['id_dyn_search_cmd_str'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'];
      }
      if ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            form_tbdetailigd_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            form_tbdetailigd_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            form_tbdetailigd_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            form_tbdetailigd_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = form_tbdetailigd_pack_protect_string($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            form_tbdetailigd_pack_ajax_ok($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['focus']) && '' != $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['focus'];
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['closeLine']) && '' != $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['clearUpload']) && '' != $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['varList']) && !empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['varList']))
         {
            form_tbdetailigd_pack_var_list($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['masterValue']) && '' != $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['masterValue'])
         {
            form_tbdetailigd_pack_master_value($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxAlert']) && '' != $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxAlert'])
         {
            form_tbdetailigd_pack_ajax_alert($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']) && '' != $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage'])
         {
            form_tbdetailigd_pack_ajax_message($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxJavascript']) && '' != $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxJavascript'])
         {
            form_tbdetailigd_pack_ajax_javascript($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir']) && !empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir']))
         {
            form_tbdetailigd_pack_ajax_redir($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redirExit']) && !empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redirExit']))
         {
            form_tbdetailigd_pack_ajax_redir_exit($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['blockDisplay']) && !empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['blockDisplay']))
         {
            form_tbdetailigd_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['fieldDisplay']) && !empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['fieldDisplay']))
         {
            form_tbdetailigd_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['buttonDisplay']) && !empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['buttonDisplay']))
         {
            $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['buttonDisplay'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->nmgp_botoes;
            form_tbdetailigd_pack_ajax_button_display($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['buttonDisplayVert']) && !empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['buttonDisplayVert']))
         {
            form_tbdetailigd_pack_ajax_button_display_vert($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['fieldLabel']) && !empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['fieldLabel']))
         {
            form_tbdetailigd_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['readOnly']) && !empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['readOnly']))
         {
            form_tbdetailigd_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navStatus']) && !empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navStatus']))
         {
            form_tbdetailigd_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navSummary']) && !empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navSummary']))
         {
            form_tbdetailigd_pack_ajax_nav_Summary($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navPage']))
         {
            form_tbdetailigd_pack_ajax_navPage($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['btnVars']) && !empty($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['btnVars']))
         {
            form_tbdetailigd_pack_ajax_btn_vars($aResp);
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['quickSearchRes']) && $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['event_field']) && '' != $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['event_field'])
         {
            $aResp['eventField'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['event_field'];
         }
         else
         {
            $aResp['eventField'] = '__SC_NO_FIELD';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output']) && $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = form_tbdetailigd_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
               ob_end_clean();
            }
         }
      }
      if (is_array($aResp))
      {
          $oJson = new Services_JSON();
          echo "var res = " . trim(sajax_get_js_repr($oJson->encode($aResp))) . "; res;";
      }
      else
      {
          echo "var res = " . trim(sajax_get_js_repr($aResp)) . "; res;";
      }
      exit;
   } // form_tbdetailigd_pack_ajax_response

   function form_tbdetailigd_pack_calendar_reload(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['calendarReload'] = 'OK';
   } // form_tbdetailigd_pack_calendar_reload

   function form_tbdetailigd_pack_ajax_errors(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['errList'] = array();
      foreach ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_form_tbdetailigd' == $sField)
         {
             $aMsg = form_tbdetailigd_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_form_tbdetailigd' != $sField)
                       ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => form_tbdetailigd_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // form_tbdetailigd_pack_ajax_errors

   function form_tbdetailigd_pack_ajax_remove_erros($aErrors)
   {
       $aNewErrors = array();
       if (!empty($aErrors))
       {
           $sErrorMsgs = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), implode('<br />', $aErrors));
           $aErrorMsgs = explode('<BR>', $sErrorMsgs);
           foreach ($aErrorMsgs as $sErrorMsg)
           {
               $sErrorMsg = trim($sErrorMsg);
               if ('' != $sErrorMsg && !in_array($sErrorMsg, $aNewErrors))
               {
                   $aNewErrors[] = $sErrorMsg;
               }
           }
       }
       return $aNewErrors;
   } // form_tbdetailigd_pack_ajax_remove_erros

   function form_tbdetailigd_pack_ajax_ok(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $iNumLinha = (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => form_tbdetailigd_pack_protect_string($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // form_tbdetailigd_pack_ajax_ok

   function form_tbdetailigd_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $iNumLinha = (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['fldList'] as $sField => $aData)
      {
         $aField = array();
         if (isset($aData['colNum']))
         {
            $aField['colNum'] = $aData['colNum'];
         }
         if (isset($aData['row']))
         {
            $aField['row'] = $aData['row'];
         }
         if (isset($aData['imgFile']))
         {
            $aField['imgFile'] = form_tbdetailigd_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = form_tbdetailigd_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = form_tbdetailigd_pack_protect_string($aData['imgLink']);
         }
         if (isset($aData['keepImg']))
         {
            $aField['keepImg'] = $aData['keepImg'];
         }
         if (isset($aData['hideName']))
         {
            $aField['hideName'] = $aData['hideName'];
         }
         if (isset($aData['docLink']))
         {
            $aField['docLink'] = form_tbdetailigd_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = form_tbdetailigd_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['docReadonly']))
         {
            $aField['docReadonly'] = form_tbdetailigd_pack_protect_string($aData['docReadonly']);
         }
         if (isset($aData['keyVal']))
         {
            $aField['keyVal'] = $aData['keyVal'];
         }
         if (isset($aData['optComp']))
         {
            $aField['optComp'] = $aData['optComp'];
         }
         if (isset($aData['optClass']))
         {
            $aField['optClass'] = $aData['optClass'];
         }
         if (isset($aData['optMulti']))
         {
            $aField['optMulti'] = $aData['optMulti'];
         }
         if (isset($aData['switch']))
         {
            $aField['switch'] = $aData['switch'];
         }
         if (isset($aData['lookupCons']))
         {
            $aField['lookupCons'] = $aData['lookupCons'];
         }
         if (isset($aData['imgHtml']))
         {
            $aField['imgHtml'] = form_tbdetailigd_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = form_tbdetailigd_pack_protect_string($aData['mulHtml']);
         }
         if (isset($aData['updInnerHtml']))
         {
            $aField['updInnerHtml'] = $aData['updInnerHtml'];
         }
         if (isset($aData['htmComp']))
         {
            $aField['htmComp'] = str_replace("'", '__AS__', str_replace('"', '__AD__', $aData['htmComp']));
         }
         $aField['fldName']  = $sField;
         $aField['fldType']  = $aData['type'];
         $aField['numLinha'] = $iNumLinha;
         $aField['valList']  = array();
         foreach ($aData['valList'] as $iIndex => $sValue)
         {
            $aValue = array();
            if (isset($aData['labList'][$iIndex]))
            {
               $aValue['label'] = form_tbdetailigd_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? form_tbdetailigd_pack_protect_string($sValue) : $sValue;
            $aField['valList'][] = $aValue;
         }
         foreach ($aField['valList'] as $iIndex => $aFieldData)
         {
             if ("null" == $aFieldData['value'])
             {
                 $aField['valList'][$iIndex]['value'] = '';
             }
         }
         if (isset($aData['optList']) && false !== $aData['optList'])
         {
            if (is_array($aData['optList']))
            {
               $aField['optList'] = array();
               foreach ($aData['optList'] as $aOptList)
               {
                  foreach ($aOptList as $sValue => $sLabel)
                  {
                     $sOpt = ($sValue !== $sLabel) ? $sValue : $sLabel;
                     $aField['optList'][] = array('value' => form_tbdetailigd_pack_protect_string($sOpt),
                                                  'label' => form_tbdetailigd_pack_protect_string($sLabel));
                  }
               }
            }
            else
            {
               $aField['optList'] = $aData['optList'];
            }
         }
         $aResp['fldList'][] = $aField;
      }
   } // form_tbdetailigd_pack_ajax_set_fields

   function form_tbdetailigd_pack_ajax_redir(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redir'][$sTag];
         }
      }
   } // form_tbdetailigd_pack_ajax_redir

   function form_tbdetailigd_pack_ajax_redir_exit(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // form_tbdetailigd_pack_ajax_redir_exit

   function form_tbdetailigd_pack_var_list(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      foreach ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['varList'] as $varData)
      {
         $aResp['varList'][] = array('index' => key($varData),
                                      'value' => current($varData));
      }
   } // form_tbdetailigd_pack_var_list

   function form_tbdetailigd_pack_master_value(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      foreach ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // form_tbdetailigd_pack_master_value

   function form_tbdetailigd_pack_ajax_alert(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['ajaxAlert'] = array('message' => $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxAlert']['message'], 'params' =>  $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxAlert']['params']);
   } // form_tbdetailigd_pack_ajax_alert

   function form_tbdetailigd_pack_ajax_message(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['ajaxMessage'] = array('message'      => form_tbdetailigd_pack_protect_string($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => form_tbdetailigd_pack_protect_string($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['modal'])        ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['timeout'])      ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['button'])       ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['button_label']) ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['top'])          ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['left'])         ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['width'])        ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['height'])       ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['redir'])        ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['show_close'])   ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['body_icon'])    ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'toast'        => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['toast'])        ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['toast']        : 'N',
                                    'toast_pos'    => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['toast_pos'])    ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['toast_pos']    : '',
                                    'type'         => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['type'])         ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['type']         : '',
                                    'redir_target' => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['redir_target']) ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['redir_par'])    ? $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // form_tbdetailigd_pack_ajax_message

   function form_tbdetailigd_pack_ajax_javascript(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      foreach ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // form_tbdetailigd_pack_ajax_javascript

   function form_tbdetailigd_pack_ajax_block_display(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // form_tbdetailigd_pack_ajax_block_display

   function form_tbdetailigd_pack_ajax_field_display(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_tbdetailigd_pack_ajax_field_display

   function form_tbdetailigd_pack_ajax_button_display(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['buttonDisplay'] = array();
      foreach ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // form_tbdetailigd_pack_ajax_button_display

   function form_tbdetailigd_pack_ajax_button_display_vert(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['buttonDisplayVert'] = array();
      foreach ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['buttonDisplayVert'] as $aButtonData)
      {
        $aResp['buttonDisplayVert'][] = $aButtonData;
      }
   } // form_tbdetailigd_pack_ajax_button_display

   function form_tbdetailigd_pack_ajax_field_label(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, form_tbdetailigd_pack_protect_string($sFieldLabel));
      }
   } // form_tbdetailigd_pack_ajax_field_label

   function form_tbdetailigd_pack_ajax_readonly(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['readOnly'] = array();
      foreach ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_tbdetailigd_pack_ajax_readonly

   function form_tbdetailigd_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['navStatus'] = array();
      if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navStatus']['ret']) && '' != $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navStatus']['ava']) && '' != $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navStatus']['ava'];
      }
   } // form_tbdetailigd_pack_ajax_nav_status

   function form_tbdetailigd_pack_ajax_nav_Summary(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navSummary']['reg_tot'];
   } // form_tbdetailigd_pack_ajax_nav_Summary

   function form_tbdetailigd_pack_ajax_navPage(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['navPage'] = $inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['navPage'];
   } // form_tbdetailigd_pack_ajax_navPage


   function form_tbdetailigd_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_form_tbdetailigd;
      $aResp['btnVars'] = array();
      foreach ($inicial_form_tbdetailigd->contr_form_tbdetailigd->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, form_tbdetailigd_pack_protect_string($sBtnValue));
      }
   } // form_tbdetailigd_pack_ajax_btn_vars

   function form_tbdetailigd_pack_protect_string($sString)
   {
      $sString = (string) $sString;

      if (!empty($sString))
      {
         if (function_exists('NM_is_utf8') && NM_is_utf8($sString))
         {
             return $sString;
         }
         else
         {
/*             return htmlentities($sString, ENT_COMPAT, $_SESSION['scriptcase']['charset']); */
             return sc_htmlentities($sString);
         }
      }
      elseif ('0' === $sString || 0 === $sString)
      {
         return '0';
      }
      else
      {
         return '';
      }
   } // form_tbdetailigd_pack_protect_string
?>
