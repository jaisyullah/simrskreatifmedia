<?php

class grid_lap_bill_ranap_xls
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Xls_dados;
   var $Xls_workbook;
   var $Xls_col;
   var $Xls_row;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $NM_ctrl_style = array();
   var $Arquivo;
   var $Tit_doc;
   var $count_ger;
   var $sum_total;
   var $carabayar_Old;
   var $arg_sum_carabayar;
   var $Label_carabayar;
   var $sc_proc_quebra_carabayar;
   var $count_carabayar;
   var $sum_carabayar_total;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida']) {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xls_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($this->Arr_result);
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['opcao'] = "";
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $this->Use_phpspreadsheet = (phpversion() >=  "7.3.9" && is_dir($this->Ini->path_third . '/phpspreadsheet')) ? true : false;
      $this->Xls_tot_col = 0;
      $this->Xls_row     = 0;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
      { 
          if ($this->Use_phpspreadsheet) {
              require_once $this->Ini->path_third . '/phpspreadsheet/vendor/autoload.php';
          } 
          else { 
              set_include_path(get_include_path() . PATH_SEPARATOR . $this->Ini->path_third . '/phpexcel/');
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel.php';
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel/IOFactory.php';
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel/Cell/AdvancedValueBinder.php';
          } 
      } 
      $orig_form_dt = strtoupper($_SESSION['scriptcase']['reg_conf']['date_format']);
      $this->SC_date_conf_region = "";
      for ($i = 0; $i < 8; $i++)
      {
          if ($i > 0 && substr($orig_form_dt, $i, 1) != substr($this->SC_date_conf_region, -1, 1)) {
              $this->SC_date_conf_region .= $_SESSION['scriptcase']['reg_conf']['date_sep'];
          }
          $this->SC_date_conf_region .= substr($orig_form_dt, $i, 1);
      }
      $this->Xls_tp = ".xlsx";
      if (isset($_REQUEST['nmgp_tp_xls']) && !empty($_REQUEST['nmgp_tp_xls']))
      {
          $this->Xls_tp = "." . $_REQUEST['nmgp_tp_xls'];
      }
      $this->groupby_show = "N";
      if (isset($_REQUEST['nmgp_tot_xls']) && !empty($_REQUEST['nmgp_tot_xls']))
      {
          $this->groupby_show = $_REQUEST['nmgp_tot_xls'];
      }
      $this->Xls_col      = 0;
      $this->Tem_xls_res  = false;
      $this->Xls_password = "";
      $this->nm_data      = new nm_data("id");
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
      { 
          $this->Tem_xls_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_xls_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false || strpos(" " . $_REQUEST['SC_module_export'], "chart") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Gb_Free_cmp']))
          {
              $this->Tem_xls_res  = false;
          }
          if ($this->Tem_xls_res)
          { 
              require_once($this->Ini->path_aplicacao . "grid_lap_bill_ranap_res_xls.class.php");
              $this->Res_xls = new grid_lap_bill_ranap_res_xls();
              $this->prep_modulos("Res_xls");
          } 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_grid_lap_bill_ranap.zip";
          $this->Arquivo   .= "_grid_lap_bill_ranap" . $this->Xls_tp;
          $this->Tit_doc    = "grid_lap_bill_ranap" . $this->Xls_tp;
          $this->Tit_zip    = "grid_lap_bill_ranap.zip";
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          if ($this->Use_phpspreadsheet) {
              $this->Xls_dados = new PhpOffice\PhpSpreadsheet\Spreadsheet();
              \PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
          }
          else {
              PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
              $this->Xls_dados = new PHPExcel();
          }
          $this->Xls_dados->setActiveSheetIndex(0);
          $this->Nm_ActiveSheet = $this->Xls_dados->getActiveSheet();
          $this->Nm_ActiveSheet->setTitle($this->Ini->Nm_lang['lang_othr_grid_titl']);
          if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
          {
              $this->Nm_ActiveSheet->setRightToLeft(true);
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'] == "sc_free_total")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_lap_bill_ranap_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'] == "CaraBayar")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_lap_bill_ranap_resumo("out");
          $this->prep_modulos("Res");
      }
      $this->GB_tot_php = array('sc_free_total','CaraBayar');
      if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'], $this->GB_tot_php))
      {
          $Tot_Gb = "totaliza_php_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'];
          $this->$Tot_Gb();
      }
      else
      {
          require_once($this->Ini->path_aplicacao . "grid_lap_bill_ranap_total.class.php"); 
          $this->Tot = new grid_lap_bill_ranap_total($this->Ini->sc_page);
          $this->prep_modulos("Tot");
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'];
          $this->Tot->$Gb_geral();
      }
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['tot_geral'][1];
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_lap_bill_ranap']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_return']);
          if ($this->Tem_xls_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot );
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'] == "CaraBayar")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['tot_geral'][2];
      }
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function grava_arquivo()
   {
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_lap_bill_ranap']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_lap_bill_ranap']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_lap_bill_ranap']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->tglmasuk = $Busca_temp['tglmasuk']; 
          $tmp_pos = strpos($this->tglmasuk, "##@@");
          if ($tmp_pos !== false && !is_array($this->tglmasuk))
          {
              $this->tglmasuk = substr($this->tglmasuk, 0, $tmp_pos);
          }
          $this->tglmasuk_2 = $Busca_temp['tglmasuk_input_2']; 
          $this->tglkeluar = $Busca_temp['tglkeluar']; 
          $tmp_pos = strpos($this->tglkeluar, "##@@");
          if ($tmp_pos !== false && !is_array($this->tglkeluar))
          {
              $this->tglkeluar = substr($this->tglkeluar, 0, $tmp_pos);
          }
          $this->tglkeluar_2 = $Busca_temp['tglkeluar_input_2']; 
          $this->poli = $Busca_temp['poli']; 
          $tmp_pos = strpos($this->poli, "##@@");
          if ($tmp_pos !== false && !is_array($this->poli))
          {
              $this->poli = substr($this->poli, 0, $tmp_pos);
          }
          $this->dpjp = $Busca_temp['dpjp']; 
          $tmp_pos = strpos($this->dpjp, "##@@");
          if ($tmp_pos !== false && !is_array($this->dpjp))
          {
              $this->dpjp = substr($this->dpjp, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_lap_bill_ranap']['contr_erro'] = 'on';
if (!isset($_SESSION['i'])) {$_SESSION['i'] = "";}
if (!isset($this->sc_temp_i)) {$this->sc_temp_i = (isset($_SESSION['i'])) ? $_SESSION['i'] : "";}
if (!isset($_SESSION['total_chked'])) {$_SESSION['total_chked'] = "";}
if (!isset($this->sc_temp_total_chked)) {$this->sc_temp_total_chked = (isset($_SESSION['total_chked'])) ? $_SESSION['total_chked'] : "";}
 $this->sc_temp_i = 0;
$this->sc_temp_total_chked = array();
if (isset($this->sc_temp_total_chked)) {$_SESSION['total_chked'] = $this->sc_temp_total_chked;}
if (isset($this->sc_temp_i)) {$_SESSION['i'] = $this->sc_temp_i;}
$_SESSION['scriptcase']['grid_lap_bill_ranap']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida_label'])
      { 
          $this->count_span = 0;
          $this->Xls_row++;
          $this->proc_label();
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, str_replace (convert(char(10),e.tglMasuk,102), '.', '-') + ' ' + convert(char(8),e.tglMasuk,20) as tglmasuk, str_replace (convert(char(10),a.tglKeluar,102), '.', '-') + ' ' + convert(char(8),a.tglKeluar,20) as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, e.tglMasuk as tglmasuk, a.tglKeluar as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, convert(char(23),e.tglMasuk,121) as tglmasuk, convert(char(23),a.tglKeluar,121) as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, e.tglMasuk as tglmasuk, a.tglKeluar as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, EXTEND(e.tglMasuk, YEAR TO FRACTION) as tglmasuk, EXTEND(a.tglKeluar, YEAR TO FRACTION) as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, e.tglMasuk as tglmasuk, a.tglKeluar as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $prim_reg = true;
      $prim_gb  = true;
      $nm_houve_quebra = "N";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $prim_reg = false;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Xls_col = 0;
         $this->Xls_row++;
         $this->rm = $rs->fields[0] ;  
         $this->pasien = $rs->fields[1] ;  
         $this->carabayar = $rs->fields[2] ;  
         $this->tglmasuk = $rs->fields[3] ;  
         $this->tglkeluar = $rs->fields[4] ;  
         $this->dpjp = $rs->fields[5] ;  
         $this->poli = $rs->fields[6] ;  
         $this->sc_field_0 = $rs->fields[7] ;  
         $this->e_kelas = $rs->fields[8] ;  
         $this->trancode = $rs->fields[9] ;  
         $this->arg_sum_carabayar = " = " . $this->Db->qstr($this->carabayar);
          if (($this->carabayar !== $this->carabayar_Old || $NM_prim_qb) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'] == "CaraBayar") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->carabayar_Old = $this->carabayar ; 
              $this->quebra_carabayar_CaraBayar($this->carabayar) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->carabayar_Old))
              {
                 $this->quebra_carabayar_CaraBayar_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
     if ($this->groupby_show == "S") {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
         { 
             if ($prim_gb) {
                 $this->count_span = 0;
                 $this->proc_label();
             }
             if ($prim_gb || $nm_houve_quebra == "S") {
                 $this->xls_sub_cons_copy_label($this->Xls_row);
                 $this->Xls_row++;
             }
         }
         elseif ($prim_gb || $nm_houve_quebra == "S")
         {
             $this->count_span = 0;
             $this->proc_label();
         }
     }
     else {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
         { 
             if ($prim_gb)
             {
                 $this->count_span = 0;
                 $this->proc_label();
                 $this->xls_sub_cons_copy_label($this->Xls_row);
                 $this->Xls_row++;
             }
         }
         elseif ($prim_gb)
         {
             $this->count_span = 0;
             $this->proc_label();
         }
     }
     $prim_gb = false;
     $nm_houve_quebra = "N";
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_lap_bill_ranap']['contr_erro'] = 'on';
 $check_sql = "SELECT status, verifyBy"
   . " FROM tbstatusranap"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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
    $verify = $this->rs[0][0];
	$verifyBy = $this->rs[0][1];
}
		else     
{
	$verify = '0';
	$verifyBy = '-';
}

if ($verify == '1'){
	$this->verifstatus  = 'Verified';
	$this->verifiedby  = $verifyBy;
	$this->NM_field_style["verifstatus"] = "background-color:green;";
	$this->NM_field_color["verifstatus"] = "#ffffff";
}else{
	$this->verifstatus  = 'Blm Verify';
	$this->verifiedby  = $verifyBy;
	$this->NM_field_style["verifstatus"] = "background-color:red;";
	$this->NM_field_color["verifstatus"] = "#000000";
}


$check_sql = "SELECT unitAsal"
   . " FROM tbadmrawatinap"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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
    $unit = $this->rs[0][0];
}
		else     
{
	$unit = '';
}

if(is_null($unit) || empty($unit)){
	
	$jmlTindIGD = '0';
	$jmlresepIGD = '0';
	$jmlbhpIGD = '0';
	$jmlTindPoli = '0';
	$jmlresepPoli = '0';
	$jmlbhpPoli = '0';
	$jmllabIGD = '0';
	$jmlradIGD = '0';
	$jmladmIGD = '0';
	$jmladmPoli = '0';
	
}else{

	$check_sql = "SELECT
					SUM( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) AS Total 
				FROM
					tbtindakanigd a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbdoctor d ON d.docCode = a.pelaksana 
				WHERE
					c.tranCode = '".$this->trancode ."'";
		 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindIGD = $this->rs[0][0];
}else{
	$jmlTindIGD = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbreseprawatigd a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlresepIGD = $this->rs[0][0];
}else{
	$jmlresepIGD = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbbhpigd a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlbhpIGD = $this->rs[0][0];
}else{
	$jmlbhpIGD = '0';
}
	
	$check_sql = "SELECT
					SUM( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) AS Total 
				FROM
					tbtindakanrawatjalan a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbdoctor d ON d.docCode = a.dokter 
				WHERE
					c.tranCode = '".$this->trancode ."'";
		 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindPoli = $this->rs[0][0];
}else{
	$jmlTindPoli = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbreseprawatjalan a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlresepPoli = $this->rs[0][0];
}else{
	$jmlresepPoli = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbbhprawatjalan a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlbhpPoli = $this->rs[0][0];
}else{
	$jmlbhpPoli = '0';
}
	
		$check_sql = "SELECT
						SUM( tbl_sum.total ) 
					FROM
						(
						SELECT
							b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
						FROM
							tbtranlab a
							LEFT JOIN tbdetaillab b ON b.trancode = a.trancode
							LEFT JOIN tblab c ON c.labcode = b.labcode
							LEFT JOIN tbrujukanlab d ON d.struk = a.struk
							LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 
						WHERE
							e.tranCode = '".$this->trancode ."' GROUP BY
		concat(date_format(b.trandate, '%d/%m/%Y  %H:%i'), '-', b.labcode) 
	) tbl_sum";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmllabIGD = $this->rs[0][0];
}else{
	$jmllabIGD = '0';
}
	
		$check_sql = "SUM( tbl_sum.total ) 
FROM
	(
	SELECT
		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
	FROM
		tbtranrad a
		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode
		LEFT JOIN tbradiologi c ON c.radcode = b.radcode
		LEFT JOIN tbrujukanradiologi d ON d.struk = a.struk
		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 
	WHERE
		e.tranCode = '".$this->trancode ."' GROUP BY
		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ',b.radcode)  
	) tbl_sum";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlradIGD = $this->rs[0][0];
}else{
	$jmlradIGD = '0';
}
	
	$check_sql = "SELECT
					sum(biaya)
				FROM
					tbbilladm a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmladmIGD = $this->rs[0][0];
}else{
	$jmladmIGD = '0';
}
	
	$check_sql = "SELECT
					sum(biaya) 
				FROM
					tbbilladm a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmladmPoli = $this->rs[0][0];
}else{
	$jmladmPoli = '0';
}
	
}

$check_sql = "SELECT
	SUM(
		( a.rate - ( a.rate * ( a.disc / 100 ) ) ) *
	IF
		(
			( date_format( a.check_out, '%H:%i' ) <= '12:00' ),
			DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ),
			DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1 
		) 
	) AS Total 
FROM
	tbbillruang a
	LEFT JOIN tbbed b ON b.idBed = a.bed 
WHERE
	a.tranCode = '".$this->trancode ."'";
 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlKamar = $this->rs[0][0];
}else{
	$jmlKamar = '0';
}

$check_sql = "SELECT
				SUM(
					( a.keperawatan - ( a.keperawatan * ( a.disc / 100 ) ) ) *
				IF
					(
						( date_format( a.check_out, '%H:%i' ) <= '12:00' ),
						DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ),
						DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1 
					) 
				) AS Total 
			FROM
				tbbillruang a
				LEFT JOIN tbbed b ON b.idBed = a.bed 
			WHERE
				a.tranCode = '".$this->trancode ."'";
 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlKeperawatan = $this->rs[0][0];
}else{
	$jmlKeperawatan = '0';
}

$check_sql = "SELECT
				SUM( a.fee - ( a.fee * ( a.disc / 100 ) ) ) AS Total 
			FROM
				tbtim a
				LEFT JOIN tbdetailvk b ON b.tranCode = a.trancode
				LEFT JOIN tbdoctor c ON c.docCode = a.
				CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode 
			WHERE
				b.inapCode = '" . $this->trancode  . "'";

 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindvk = $this->rs[0][0];
}else{
	$jmlTindvk = '0';
}

$check_sql = "SELECT
				SUM( a.fee - ( a.fee * ( a.disc / 100 ) ) ) AS Total 
			FROM
				tbtim a
				LEFT JOIN tbdetailok b ON b.tranCode = a.trancode
				LEFT JOIN tbdoctor c ON c.docCode = a.
				CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode 
			WHERE
				b.inapCode = '".$this->trancode ."'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindok = $this->rs[0][0];
}else{
	$jmlTindok = '0';
}

$check_sql = "SELECT
					SUM( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) AS Total 
				FROM
					tbtindakanrawatinap a
					LEFT JOIN tbdoctor b ON b.docCode = a.pelaksana 
				WHERE
					a.tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindakan = $this->rs[0][0];
}else{
	$jmlTindakan = '0';
}


$check_sql = "SELECT
				SUM(
					( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) + ( ( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) * 10 / 100 ) 
				) AS Total 
			FROM
				tbreseprawatinap a
				LEFT JOIN tbobat b ON b.kodeItem = a.item 
			WHERE
				a.tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlResep = $this->rs[0][0];
}else{
	$jmlResep = '0';
}

$check_sql = "SELECT
	SUM(
		(
			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) + (
				( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * a.diskon / 100 ) ) * ( 10 / 100 ) 
			) 
		) 
	) AS Total 
FROM
	tbbhprawatinap a
	LEFT JOIN tbobat b ON b.kodeItem = a.item 
WHERE
	a.tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlBHP = $this->rs[0][0];
}else{
	$jmlBHP = '0';
}

$check_sql = "SELECT
					SUM(
						( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) + (
							( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbdetailresepokvk a
					LEFT JOIN tbobat b ON b.kodeItem = a.item
					LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode 
				WHERE
					c.inapCode = '".$this->trancode ."'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlok = $this->rs[0][0];
}else{
	$jmlok = '0';
}

$check_sql = "SELECT
				SUM(
					( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) + ( ( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) * 10 / 100 ) 
				) AS Total 
			FROM
				tbdetailresepokvk a
				LEFT JOIN tbobat b ON b.kodeItem = a.item
				LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode 
			WHERE
				c.inapCode = '".$this->trancode ."'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlvk = $this->rs[0][0];
}else{
	$jmlvk = '0';
}

$check_sql = "SELECT
	SUM( tbl_sum.total ) 
FROM
(
	SELECT
		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
	FROM
		tbtranlab a
		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode
		LEFT JOIN tblab c ON c.labcode = b.labcode
	WHERE
		a.inapcode = '" . $this->trancode  . "'
	GROUP BY
		concat(date_format(b.trandate, '%d/%m/%Y  %H:%i'), '-', b.labcode)
	) tbl_sum";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmllab = $this->rs[0][0];
}else{
	$jmllab = '0';
}

$check_sql = "SELECT
	SUM( tbl_sum.total ) 
FROM
	(
	SELECT
		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
	FROM
		tbtranrad a
		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode
		LEFT JOIN tbradiologi c ON c.radcode = b.radcode
	WHERE
		a.inapcode = '" . $this->trancode  . "' 
	GROUP BY
		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ',b.radcode) 
	) tbl_sum";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlrad = $this->rs[0][0];
}else{
	$jmlrad = '0';
}

$check_sql = "SELECT
				biaya 
			FROM
				tbbilladm 
			WHERE
				tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
 
	$jmladm = $this->rs[0][0];
}else{
	$jmladm = '0';
}



$check_sql = "SELECT sum(deposit)"
   . " FROM tbpayment_ri"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0])  || !is_null($this->rs[0][0]))     
{
    $jmlDeposit = $this->rs[0][0];
    
}
		else     
{
	$jmlDeposit = '0';
}

$semua = $jmlTindIGD+$jmlresepIGD+$jmlbhpIGD+$jmlTindPoli+$jmlresepPoli+$jmlbhpPoli+$jmllabIGD+$jmlradIGD+$jmladmIGD+$jmladmPoli+$jmlKamar+$jmlKeperawatan+$jmlTindvk+$jmlTindok+$jmlTindakan+$jmlResep+$jmlBHP+$jmlok+$jmlvk+$jmllab+$jmlrad+$jmladm;

$all = $semua*(7/100);

$this->total  = $all+$semua;

$this->deposit  = $jmlDeposit;

$this->selisih  = $this->deposit -$this->total ;
$_SESSION['scriptcase']['grid_lap_bill_ranap']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
                { 
                    $NM_func_exp = "NM_sub_cons_" . $Cada_col;
                    $this->$NM_func_exp();
                } 
                else 
                { 
                    $NM_func_exp = "NM_export_" . $Cada_col;
                    $this->$NM_func_exp();
                } 
            } 
         } 
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'] && $prim_reg)
      { 
          $this->proc_label();
          $this->xls_sub_cons_copy_label($this->Xls_row);
          $nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
          if (!NM_is_utf8($nm_grid_sem_reg ))
          {
              $nm_grid_sem_reg  = sc_convert_encoding($nm_grid_sem_reg , "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $this->Xls_row++;
          $this->arr_export['lines'][$this->Xls_row][1]['data']   = $nm_grid_sem_reg;
          $this->arr_export['lines'][$this->Xls_row][1]['align']  = "right";
          $this->arr_export['lines'][$this->Xls_row][1]['type']   = "char";
          $this->arr_export['lines'][$this->Xls_row][1]['format'] = "";
      }
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if ($this->groupby_show == "S") {
          $this->Xls_col = 0;
          $this->Xls_row++;
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'] . "_bot";
          $this->$Gb_geral();
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
      { 
          if ($this->Tem_xls_res)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_res_grid'] = true;
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = $this->Ini->Nm_lang['lang_othr_prcs'];
                  $Mens_smry = $this->Ini->Nm_lang['lang_othr_smry_titl'];
                  if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                      $Mens_bar  = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
                      $Mens_smry = sc_convert_encoding($Mens_smry, "UTF-8", $_SESSION['scriptcase']['charset']);
                  }
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              $this->Res_xls->monta_xls();
              if ($this->Use_phpspreadsheet) {
                  $Xls_res = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_res_sheet']);
              }
              else {
                  $Xls_res = PHPExcel_IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_res_sheet']);
              }
              foreach($Xls_res->getAllSheets() as $sheet)
              {
                  $this->Xls_dados->addExternalSheet($sheet);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_res_sheet']);
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = $this->Ini->Nm_lang['lang_btns_export_finished'];
              if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                  $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Use_phpspreadsheet) {
              if ($this->Xls_tp == ".xlsx") {
                  $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($this->Xls_dados);
              } 
              else {
                  $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xls($this->Xls_dados);
              } 
          } 
          else {
              if ($this->Xls_tp == ".xlsx") {
                  $objWriter = new PHPExcel_Writer_Excel2007($this->Xls_dados);
              } 
              else {
                  $objWriter = new PHPExcel_Writer_Excel5($this->Xls_dados);
              } 
          } 
          $objWriter->save($this->Xls_f);
          if ($this->Xls_password != "")
          { 
              $str_zip   = "";
              $Zip_f     = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input = (FALSE !== strpos($this->Xls_f, ' ')) ? " \"" . $this->Xls_f . "\"" :  $this->Xls_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe -P -j " . $this->Xls_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                  {
                      chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                  }
                  else
                  {
                     chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                  }
                  $str_zip = "./7za -p" . $this->Xls_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za -p" . $this->Xls_password . " a " . $Zip_f . " " . $Arq_input;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              // ----- ZIP log
              $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
              unlink($Arq_input);
              $this->Arquivo = $this->Arq_zip;
              $this->Xls_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
          } 
      } 
      else 
      { 
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
      } 
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['rm'])) ? $this->New_label['rm'] : "RM"; 
          if ($Cada_col == "rm" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['pasien'])) ? $this->New_label['pasien'] : "Pasien"; 
          if ($Cada_col == "pasien" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['carabayar'])) ? $this->New_label['carabayar'] : "Cara Bayar"; 
          if ($Cada_col == "carabayar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tglmasuk'])) ? $this->New_label['tglmasuk'] : "Tgl Masuk"; 
          if ($Cada_col == "tglmasuk" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "center";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tglkeluar'])) ? $this->New_label['tglkeluar'] : "Tgl Keluar"; 
          if ($Cada_col == "tglkeluar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "center";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['dpjp'])) ? $this->New_label['dpjp'] : "DPJP"; 
          if ($Cada_col == "dpjp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['poli'])) ? $this->New_label['poli'] : "Poli"; 
          if ($Cada_col == "poli" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Status Keluar"; 
          if ($Cada_col == "sc_field_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
          if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['verifstatus'])) ? $this->New_label['verifstatus'] : "Verif Status"; 
          if ($Cada_col == "verifstatus" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['verifiedby'])) ? $this->New_label['verifiedby'] : "Verified Oleh"; 
          if ($Cada_col == "verifiedby" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['deposit'])) ? $this->New_label['deposit'] : "Deposit"; 
          if ($Cada_col == "deposit" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['selisih'])) ? $this->New_label['selisih'] : "Selisih"; 
          if ($Cada_col == "selisih" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['e_kelas'])) ? $this->New_label['e_kelas'] : "Hak Kelas"; 
          if ($Cada_col == "e_kelas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Kode Transaksi"; 
          if ($Cada_col == "trancode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
      } 
      $this->Xls_col = 0;
      $this->Xls_row++;
   } 
   //----- rm
   function NM_export_rm()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->rm = html_entity_decode($this->rm, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rm = strip_tags($this->rm);
         if (!NM_is_utf8($this->rm))
         {
             $this->rm = sc_convert_encoding($this->rm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->rm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->rm, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- pasien
   function NM_export_pasien()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->pasien = html_entity_decode($this->pasien, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pasien = strip_tags($this->pasien);
         if (!NM_is_utf8($this->pasien))
         {
             $this->pasien = sc_convert_encoding($this->pasien, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->pasien, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->pasien, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- carabayar
   function NM_export_carabayar()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->carabayar = html_entity_decode($this->carabayar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->carabayar = strip_tags($this->carabayar);
         if (!NM_is_utf8($this->carabayar))
         {
             $this->carabayar = sc_convert_encoding($this->carabayar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->carabayar, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->carabayar, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- tglmasuk
   function NM_export_tglmasuk()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->tglmasuk))
      {
             if (substr($this->tglmasuk, 10, 1) == "-") 
             { 
                 $this->tglmasuk = substr($this->tglmasuk, 0, 10) . " " . substr($this->tglmasuk, 11);
             } 
             if (substr($this->tglmasuk, 13, 1) == ".") 
             { 
                $this->tglmasuk = substr($this->tglmasuk, 0, 13) . ":" . substr($this->tglmasuk, 14, 2) . ":" . substr($this->tglmasuk, 17);
             } 
             $conteudo_x =  $this->tglmasuk;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->tglmasuk, "YYYY-MM-DD HH:II:SS  ");
                 $this->tglmasuk = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      }
         if (!NM_is_utf8($this->tglmasuk))
         {
             $this->tglmasuk = sc_convert_encoding($this->tglmasuk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tglmasuk, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tglmasuk, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- tglkeluar
   function NM_export_tglkeluar()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->tglkeluar))
      {
             if (substr($this->tglkeluar, 10, 1) == "-") 
             { 
                 $this->tglkeluar = substr($this->tglkeluar, 0, 10) . " " . substr($this->tglkeluar, 11);
             } 
             if (substr($this->tglkeluar, 13, 1) == ".") 
             { 
                $this->tglkeluar = substr($this->tglkeluar, 0, 13) . ":" . substr($this->tglkeluar, 14, 2) . ":" . substr($this->tglkeluar, 17);
             } 
             $conteudo_x =  $this->tglkeluar;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->tglkeluar, "YYYY-MM-DD HH:II:SS  ");
                 $this->tglkeluar = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      }
         if (!NM_is_utf8($this->tglkeluar))
         {
             $this->tglkeluar = sc_convert_encoding($this->tglkeluar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tglkeluar, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tglkeluar, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- dpjp
   function NM_export_dpjp()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->dpjp = html_entity_decode($this->dpjp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dpjp = strip_tags($this->dpjp);
         if (!NM_is_utf8($this->dpjp))
         {
             $this->dpjp = sc_convert_encoding($this->dpjp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->dpjp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->dpjp, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- poli
   function NM_export_poli()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->poli = html_entity_decode($this->poli, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->poli = strip_tags($this->poli);
         if (!NM_is_utf8($this->poli))
         {
             $this->poli = sc_convert_encoding($this->poli, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->poli, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->poli, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->sc_field_0 = html_entity_decode($this->sc_field_0, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_0 = strip_tags($this->sc_field_0);
         if (!NM_is_utf8($this->sc_field_0))
         {
             $this->sc_field_0 = sc_convert_encoding($this->sc_field_0, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->sc_field_0, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->sc_field_0, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- total
   function NM_export_total()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->total))
         {
             $this->total = sc_convert_encoding($this->total, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->total))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->total);
         $this->Xls_col++;
   }
   //----- verifstatus
   function NM_export_verifstatus()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->verifstatus = html_entity_decode($this->verifstatus, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->verifstatus = strip_tags($this->verifstatus);
         if (!NM_is_utf8($this->verifstatus))
         {
             $this->verifstatus = sc_convert_encoding($this->verifstatus, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->verifstatus, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->verifstatus, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- verifiedby
   function NM_export_verifiedby()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->verifiedby = html_entity_decode($this->verifiedby, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->verifiedby = strip_tags($this->verifiedby);
         if (!NM_is_utf8($this->verifiedby))
         {
             $this->verifiedby = sc_convert_encoding($this->verifiedby, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->verifiedby, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->verifiedby, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- deposit
   function NM_export_deposit()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->deposit))
         {
             $this->deposit = sc_convert_encoding($this->deposit, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->deposit))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->deposit);
         $this->Xls_col++;
   }
   //----- selisih
   function NM_export_selisih()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->selisih))
         {
             $this->selisih = sc_convert_encoding($this->selisih, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->selisih))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->selisih);
         $this->Xls_col++;
   }
   //----- e_kelas
   function NM_export_e_kelas()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->e_kelas = html_entity_decode($this->e_kelas, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->e_kelas = strip_tags($this->e_kelas);
         if (!NM_is_utf8($this->e_kelas))
         {
             $this->e_kelas = sc_convert_encoding($this->e_kelas, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->e_kelas, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->e_kelas, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- trancode
   function NM_export_trancode()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->trancode = html_entity_decode($this->trancode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->trancode = strip_tags($this->trancode);
         if (!NM_is_utf8($this->trancode))
         {
             $this->trancode = sc_convert_encoding($this->trancode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->trancode, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->trancode, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- rm
   function NM_sub_cons_rm()
   {
         $this->rm = html_entity_decode($this->rm, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rm = strip_tags($this->rm);
         if (!NM_is_utf8($this->rm))
         {
             $this->rm = sc_convert_encoding($this->rm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->rm;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- pasien
   function NM_sub_cons_pasien()
   {
         $this->pasien = html_entity_decode($this->pasien, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pasien = strip_tags($this->pasien);
         if (!NM_is_utf8($this->pasien))
         {
             $this->pasien = sc_convert_encoding($this->pasien, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->pasien;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- carabayar
   function NM_sub_cons_carabayar()
   {
         $this->carabayar = html_entity_decode($this->carabayar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->carabayar = strip_tags($this->carabayar);
         if (!NM_is_utf8($this->carabayar))
         {
             $this->carabayar = sc_convert_encoding($this->carabayar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->carabayar;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- tglmasuk
   function NM_sub_cons_tglmasuk()
   {
      if (!empty($this->tglmasuk))
      {
         if (substr($this->tglmasuk, 10, 1) == "-") 
         { 
             $this->tglmasuk = substr($this->tglmasuk, 0, 10) . " " . substr($this->tglmasuk, 11);
         } 
         if (substr($this->tglmasuk, 13, 1) == ".") 
         { 
            $this->tglmasuk = substr($this->tglmasuk, 0, 13) . ":" . substr($this->tglmasuk, 14, 2) . ":" . substr($this->tglmasuk, 17);
         } 
         $conteudo_x =  $this->tglmasuk;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->tglmasuk, "YYYY-MM-DD HH:II:SS  ");
             $this->tglmasuk = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->tglmasuk))
         {
             $this->tglmasuk = sc_convert_encoding($this->tglmasuk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->tglmasuk;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- tglkeluar
   function NM_sub_cons_tglkeluar()
   {
      if (!empty($this->tglkeluar))
      {
         if (substr($this->tglkeluar, 10, 1) == "-") 
         { 
             $this->tglkeluar = substr($this->tglkeluar, 0, 10) . " " . substr($this->tglkeluar, 11);
         } 
         if (substr($this->tglkeluar, 13, 1) == ".") 
         { 
            $this->tglkeluar = substr($this->tglkeluar, 0, 13) . ":" . substr($this->tglkeluar, 14, 2) . ":" . substr($this->tglkeluar, 17);
         } 
         $conteudo_x =  $this->tglkeluar;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->tglkeluar, "YYYY-MM-DD HH:II:SS  ");
             $this->tglkeluar = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->tglkeluar))
         {
             $this->tglkeluar = sc_convert_encoding($this->tglkeluar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->tglkeluar;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- dpjp
   function NM_sub_cons_dpjp()
   {
         $this->dpjp = html_entity_decode($this->dpjp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dpjp = strip_tags($this->dpjp);
         if (!NM_is_utf8($this->dpjp))
         {
             $this->dpjp = sc_convert_encoding($this->dpjp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->dpjp;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- poli
   function NM_sub_cons_poli()
   {
         $this->poli = html_entity_decode($this->poli, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->poli = strip_tags($this->poli);
         if (!NM_is_utf8($this->poli))
         {
             $this->poli = sc_convert_encoding($this->poli, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->poli;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- sc_field_0
   function NM_sub_cons_sc_field_0()
   {
         $this->sc_field_0 = html_entity_decode($this->sc_field_0, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_0 = strip_tags($this->sc_field_0);
         if (!NM_is_utf8($this->sc_field_0))
         {
             $this->sc_field_0 = sc_convert_encoding($this->sc_field_0, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->sc_field_0;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- total
   function NM_sub_cons_total()
   {
         if (!NM_is_utf8($this->total))
         {
             $this->total = sc_convert_encoding($this->total, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->total;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- verifstatus
   function NM_sub_cons_verifstatus()
   {
         $this->verifstatus = html_entity_decode($this->verifstatus, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->verifstatus = strip_tags($this->verifstatus);
         if (!NM_is_utf8($this->verifstatus))
         {
             $this->verifstatus = sc_convert_encoding($this->verifstatus, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->verifstatus;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- verifiedby
   function NM_sub_cons_verifiedby()
   {
         $this->verifiedby = html_entity_decode($this->verifiedby, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->verifiedby = strip_tags($this->verifiedby);
         if (!NM_is_utf8($this->verifiedby))
         {
             $this->verifiedby = sc_convert_encoding($this->verifiedby, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->verifiedby;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- deposit
   function NM_sub_cons_deposit()
   {
         if (!NM_is_utf8($this->deposit))
         {
             $this->deposit = sc_convert_encoding($this->deposit, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->deposit;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- selisih
   function NM_sub_cons_selisih()
   {
         if (!NM_is_utf8($this->selisih))
         {
             $this->selisih = sc_convert_encoding($this->selisih, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->selisih;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- e_kelas
   function NM_sub_cons_e_kelas()
   {
         $this->e_kelas = html_entity_decode($this->e_kelas, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->e_kelas = strip_tags($this->e_kelas);
         if (!NM_is_utf8($this->e_kelas))
         {
             $this->e_kelas = sc_convert_encoding($this->e_kelas, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->e_kelas;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- trancode
   function NM_sub_cons_trancode()
   {
         $this->trancode = html_entity_decode($this->trancode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->trancode = strip_tags($this->trancode);
         if (!NM_is_utf8($this->trancode))
         {
             $this->trancode = sc_convert_encoding($this->trancode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->trancode;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['nolabel'])
       {
           foreach ($this->arr_export['label'] as $col => $dados)
           {
               $this->arr_export['lines'][$row][$col] = $dados;
           }
       }
   }
   function xls_set_style()
   {
       if (!empty($this->NM_ctrl_style))
       {
           foreach ($this->NM_ctrl_style as $col => $dados)
           {
               $cell_ref = $col . $dados['ini'] . ":" . $col . $dados['end'];
               if ($this->Use_phpspreadsheet) {
                   if ($dados['align'] == "LEFT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   elseif ($dados['align'] == "RIGHT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                   }
               }
               else {
                   if ($dados['align'] == "LEFT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   elseif ($dados['align'] == "RIGHT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                   }
               }
               if (isset($dados['format'])) {
                   $this->Nm_ActiveSheet->getStyle($cell_ref)->getNumberFormat()->setFormatCode($dados['format']);
               }
           }
           $this->NM_ctrl_style = array();
       }
   }
 function quebra_carabayar_CaraBayar($carabayar) 
 {
   global $tot_carabayar;
   $this->sc_proc_quebra_carabayar = true; 
   $tot_carabayar[0] = $carabayar;
   $tot_carabayar[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['arr_total']['carabayar'][$carabayar][0];
   $tot_carabayar[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['arr_total']['carabayar'][$carabayar][1];
   $conteudo = $tot_carabayar[0] ;  
   $this->count_carabayar = $tot_carabayar[1];
   $this->sum_carabayar_total = $tot_carabayar[2];
   $this->campos_quebra_carabayar = array(); 
   $conteudo = sc_strip_script($this->carabayar); 
   $this->campos_quebra_carabayar[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['carabayar']))
   {
       $this->campos_quebra_carabayar[0]['lab'] = $this->nmgp_label_quebras['carabayar']; 
   }
   else
   {
   $this->campos_quebra_carabayar[0]['lab'] = "Cara Bayar"; 
   }
   $this->sc_proc_quebra_carabayar = false; 
 } 
   function quebra_carabayar_CaraBayar_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_carabayar as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               if (!NM_is_utf8($temp_cmp)) {
                   $temp_cmp = sc_convert_encoding($temp_cmp, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           if (!NM_is_utf8($temp_cmp)) {
               $temp_cmp = sc_convert_encoding($temp_cmp, "UTF-8", $_SESSION['scriptcase']['charset']);
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_carabayar_CaraBayar_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['field_order'] as $Cada_cmp)
       {
           if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   if (!NM_is_utf8($mens_tot)) {
                       $mens_tot = sc_convert_encoding($mens_tot, "UTF-8", $_SESSION['scriptcase']['charset']);
                   }
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_geral_CaraBayar_bot() 
   {
   }

   function calc_cell($col)
   {
       $arr_alfa = array("","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
       $val_ret = "";
       $result = $col + 1;
       while ($result > 26)
       {
           $cel      = $result % 26;
           $result   = $result / 26;
           if ($cel == 0)
           {
               $cel    = 26;
               $result--;
           }
           $val_ret = $arr_alfa[$cel] . $val_ret;
       }
       $val_ret = $arr_alfa[$result] . $val_ret;
       return $val_ret;
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

   function totaliza_php_sc_free_total()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, str_replace (convert(char(10),e.tglMasuk,102), '.', '-') + ' ' + convert(char(8),e.tglMasuk,20) as tglmasuk, str_replace (convert(char(10),a.tglKeluar,102), '.', '-') + ' ' + convert(char(8),a.tglKeluar,20) as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, convert(char(23),e.tglMasuk,121) as tglmasuk, convert(char(23),a.tglKeluar,121) as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, e.tglMasuk as tglmasuk, a.tglKeluar as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, EXTEND(e.tglMasuk, YEAR TO FRACTION) as tglmasuk, EXTEND(a.tglKeluar, YEAR TO FRACTION) as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, e.tglMasuk as tglmasuk, a.tglKeluar as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (substr(trim($nmgp_order_by), -1) == ",")
   {
       $nmgp_order_by = " " . substr(trim($nmgp_order_by), 0, -1);
   }
   if (trim($nmgp_order_by) == "order by")
   {
       $nmgp_order_by = "";
   }
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by a.custCode";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->rm = $this->rs_grid->fields[0] ;  
         $this->pasien = $this->rs_grid->fields[1] ;  
         $this->carabayar = $this->rs_grid->fields[2] ;  
         $this->tglmasuk = $this->rs_grid->fields[3] ;  
         $this->tglkeluar = $this->rs_grid->fields[4] ;  
         $this->dpjp = $this->rs_grid->fields[5] ;  
         $this->poli = $this->rs_grid->fields[6] ;  
         $this->sc_field_0 = $this->rs_grid->fields[7] ;  
         $this->e_kelas = $this->rs_grid->fields[8] ;  
         $this->trancode = $this->rs_grid->fields[9] ;  
         $carabayar_orig = $this->carabayar;
         $_SESSION['scriptcase']['grid_lap_bill_ranap']['contr_erro'] = 'on';
 $check_sql = "SELECT status, verifyBy"
   . " FROM tbstatusranap"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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
    $verify = $this->rs[0][0];
	$verifyBy = $this->rs[0][1];
}
		else     
{
	$verify = '0';
	$verifyBy = '-';
}

if ($verify == '1'){
	$this->verifstatus  = 'Verified';
	$this->verifiedby  = $verifyBy;
	$this->NM_field_style["verifstatus"] = "background-color:green;";
	$this->NM_field_color["verifstatus"] = "#ffffff";
}else{
	$this->verifstatus  = 'Blm Verify';
	$this->verifiedby  = $verifyBy;
	$this->NM_field_style["verifstatus"] = "background-color:red;";
	$this->NM_field_color["verifstatus"] = "#000000";
}


$check_sql = "SELECT unitAsal"
   . " FROM tbadmrawatinap"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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
    $unit = $this->rs[0][0];
}
		else     
{
	$unit = '';
}

if(is_null($unit) || empty($unit)){
	
	$jmlTindIGD = '0';
	$jmlresepIGD = '0';
	$jmlbhpIGD = '0';
	$jmlTindPoli = '0';
	$jmlresepPoli = '0';
	$jmlbhpPoli = '0';
	$jmllabIGD = '0';
	$jmlradIGD = '0';
	$jmladmIGD = '0';
	$jmladmPoli = '0';
	
}else{

	$check_sql = "SELECT
					SUM( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) AS Total 
				FROM
					tbtindakanigd a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbdoctor d ON d.docCode = a.pelaksana 
				WHERE
					c.tranCode = '".$this->trancode ."'";
		 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindIGD = $this->rs[0][0];
}else{
	$jmlTindIGD = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbreseprawatigd a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlresepIGD = $this->rs[0][0];
}else{
	$jmlresepIGD = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbbhpigd a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlbhpIGD = $this->rs[0][0];
}else{
	$jmlbhpIGD = '0';
}
	
	$check_sql = "SELECT
					SUM( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) AS Total 
				FROM
					tbtindakanrawatjalan a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbdoctor d ON d.docCode = a.dokter 
				WHERE
					c.tranCode = '".$this->trancode ."'";
		 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindPoli = $this->rs[0][0];
}else{
	$jmlTindPoli = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbreseprawatjalan a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlresepPoli = $this->rs[0][0];
}else{
	$jmlresepPoli = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbbhprawatjalan a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlbhpPoli = $this->rs[0][0];
}else{
	$jmlbhpPoli = '0';
}
	
		$check_sql = "SELECT
						SUM( tbl_sum.total ) 
					FROM
						(
						SELECT
							b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
						FROM
							tbtranlab a
							LEFT JOIN tbdetaillab b ON b.trancode = a.trancode
							LEFT JOIN tblab c ON c.labcode = b.labcode
							LEFT JOIN tbrujukanlab d ON d.struk = a.struk
							LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 
						WHERE
							e.tranCode = '".$this->trancode ."' GROUP BY
		concat(date_format(b.trandate, '%d/%m/%Y  %H:%i'), '-', b.labcode) 
	) tbl_sum";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmllabIGD = $this->rs[0][0];
}else{
	$jmllabIGD = '0';
}
	
		$check_sql = "SUM( tbl_sum.total ) 
FROM
	(
	SELECT
		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
	FROM
		tbtranrad a
		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode
		LEFT JOIN tbradiologi c ON c.radcode = b.radcode
		LEFT JOIN tbrujukanradiologi d ON d.struk = a.struk
		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 
	WHERE
		e.tranCode = '".$this->trancode ."' GROUP BY
		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ',b.radcode)  
	) tbl_sum";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlradIGD = $this->rs[0][0];
}else{
	$jmlradIGD = '0';
}
	
	$check_sql = "SELECT
					sum(biaya)
				FROM
					tbbilladm a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmladmIGD = $this->rs[0][0];
}else{
	$jmladmIGD = '0';
}
	
	$check_sql = "SELECT
					sum(biaya) 
				FROM
					tbbilladm a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmladmPoli = $this->rs[0][0];
}else{
	$jmladmPoli = '0';
}
	
}

$check_sql = "SELECT
	SUM(
		( a.rate - ( a.rate * ( a.disc / 100 ) ) ) *
	IF
		(
			( date_format( a.check_out, '%H:%i' ) <= '12:00' ),
			DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ),
			DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1 
		) 
	) AS Total 
FROM
	tbbillruang a
	LEFT JOIN tbbed b ON b.idBed = a.bed 
WHERE
	a.tranCode = '".$this->trancode ."'";
 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlKamar = $this->rs[0][0];
}else{
	$jmlKamar = '0';
}

$check_sql = "SELECT
				SUM(
					( a.keperawatan - ( a.keperawatan * ( a.disc / 100 ) ) ) *
				IF
					(
						( date_format( a.check_out, '%H:%i' ) <= '12:00' ),
						DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ),
						DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1 
					) 
				) AS Total 
			FROM
				tbbillruang a
				LEFT JOIN tbbed b ON b.idBed = a.bed 
			WHERE
				a.tranCode = '".$this->trancode ."'";
 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlKeperawatan = $this->rs[0][0];
}else{
	$jmlKeperawatan = '0';
}

$check_sql = "SELECT
				SUM( a.fee - ( a.fee * ( a.disc / 100 ) ) ) AS Total 
			FROM
				tbtim a
				LEFT JOIN tbdetailvk b ON b.tranCode = a.trancode
				LEFT JOIN tbdoctor c ON c.docCode = a.
				CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode 
			WHERE
				b.inapCode = '" . $this->trancode  . "'";

 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindvk = $this->rs[0][0];
}else{
	$jmlTindvk = '0';
}

$check_sql = "SELECT
				SUM( a.fee - ( a.fee * ( a.disc / 100 ) ) ) AS Total 
			FROM
				tbtim a
				LEFT JOIN tbdetailok b ON b.tranCode = a.trancode
				LEFT JOIN tbdoctor c ON c.docCode = a.
				CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode 
			WHERE
				b.inapCode = '".$this->trancode ."'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindok = $this->rs[0][0];
}else{
	$jmlTindok = '0';
}

$check_sql = "SELECT
					SUM( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) AS Total 
				FROM
					tbtindakanrawatinap a
					LEFT JOIN tbdoctor b ON b.docCode = a.pelaksana 
				WHERE
					a.tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindakan = $this->rs[0][0];
}else{
	$jmlTindakan = '0';
}


$check_sql = "SELECT
				SUM(
					( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) + ( ( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) * 10 / 100 ) 
				) AS Total 
			FROM
				tbreseprawatinap a
				LEFT JOIN tbobat b ON b.kodeItem = a.item 
			WHERE
				a.tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlResep = $this->rs[0][0];
}else{
	$jmlResep = '0';
}

$check_sql = "SELECT
	SUM(
		(
			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) + (
				( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * a.diskon / 100 ) ) * ( 10 / 100 ) 
			) 
		) 
	) AS Total 
FROM
	tbbhprawatinap a
	LEFT JOIN tbobat b ON b.kodeItem = a.item 
WHERE
	a.tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlBHP = $this->rs[0][0];
}else{
	$jmlBHP = '0';
}

$check_sql = "SELECT
					SUM(
						( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) + (
							( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbdetailresepokvk a
					LEFT JOIN tbobat b ON b.kodeItem = a.item
					LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode 
				WHERE
					c.inapCode = '".$this->trancode ."'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlok = $this->rs[0][0];
}else{
	$jmlok = '0';
}

$check_sql = "SELECT
				SUM(
					( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) + ( ( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) * 10 / 100 ) 
				) AS Total 
			FROM
				tbdetailresepokvk a
				LEFT JOIN tbobat b ON b.kodeItem = a.item
				LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode 
			WHERE
				c.inapCode = '".$this->trancode ."'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlvk = $this->rs[0][0];
}else{
	$jmlvk = '0';
}

$check_sql = "SELECT
	SUM( tbl_sum.total ) 
FROM
(
	SELECT
		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
	FROM
		tbtranlab a
		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode
		LEFT JOIN tblab c ON c.labcode = b.labcode
	WHERE
		a.inapcode = '" . $this->trancode  . "'
	GROUP BY
		concat(date_format(b.trandate, '%d/%m/%Y  %H:%i'), '-', b.labcode)
	) tbl_sum";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmllab = $this->rs[0][0];
}else{
	$jmllab = '0';
}

$check_sql = "SELECT
	SUM( tbl_sum.total ) 
FROM
	(
	SELECT
		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
	FROM
		tbtranrad a
		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode
		LEFT JOIN tbradiologi c ON c.radcode = b.radcode
	WHERE
		a.inapcode = '" . $this->trancode  . "' 
	GROUP BY
		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ',b.radcode) 
	) tbl_sum";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlrad = $this->rs[0][0];
}else{
	$jmlrad = '0';
}

$check_sql = "SELECT
				biaya 
			FROM
				tbbilladm 
			WHERE
				tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
 
	$jmladm = $this->rs[0][0];
}else{
	$jmladm = '0';
}



$check_sql = "SELECT sum(deposit)"
   . " FROM tbpayment_ri"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0])  || !is_null($this->rs[0][0]))     
{
    $jmlDeposit = $this->rs[0][0];
    
}
		else     
{
	$jmlDeposit = '0';
}

$semua = $jmlTindIGD+$jmlresepIGD+$jmlbhpIGD+$jmlTindPoli+$jmlresepPoli+$jmlbhpPoli+$jmllabIGD+$jmlradIGD+$jmladmIGD+$jmladmPoli+$jmlKamar+$jmlKeperawatan+$jmlTindvk+$jmlTindok+$jmlTindakan+$jmlResep+$jmlBHP+$jmlok+$jmlvk+$jmllab+$jmlrad+$jmladm;

$all = $semua*(7/100);

$this->total  = $all+$semua;

$this->deposit  = $jmlDeposit;

$this->selisih  = $this->deposit -$this->total ;
$_SESSION['scriptcase']['grid_lap_bill_ranap']['contr_erro'] = 'off';
         $this->arg_sum_carabayar = " = " . $this->Db->qstr($this->carabayar);
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['contr_total_geral'] = "OK";
   }


   function totaliza_php_CaraBayar()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, str_replace (convert(char(10),e.tglMasuk,102), '.', '-') + ' ' + convert(char(8),e.tglMasuk,20) as tglmasuk, str_replace (convert(char(10),a.tglKeluar,102), '.', '-') + ' ' + convert(char(8),a.tglKeluar,20) as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, convert(char(23),e.tglMasuk,121) as tglmasuk, convert(char(23),a.tglKeluar,121) as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, e.tglMasuk as tglmasuk, a.tglKeluar as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, EXTEND(e.tglMasuk, YEAR TO FRACTION) as tglmasuk, EXTEND(a.tglKeluar, YEAR TO FRACTION) as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT a.custCode as rm, concat( c.NAME,', ',c.salut ) as pasien, e.pembayaran as carabayar, e.tglMasuk as tglmasuk, a.tglKeluar as tglkeluar, concat( b.gelar,'. ',b.NAME,', ',b.spec ) as dpjp, d.NAME as poli, a.caraKeluar as sc_field_0, e.kelas as e_kelas, a.tranCode as trancode from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by a.custCode";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->rm = $this->rs_grid->fields[0] ;  
         $this->pasien = $this->rs_grid->fields[1] ;  
         $this->carabayar = $this->rs_grid->fields[2] ;  
         $this->tglmasuk = $this->rs_grid->fields[3] ;  
         $this->tglkeluar = $this->rs_grid->fields[4] ;  
         $this->dpjp = $this->rs_grid->fields[5] ;  
         $this->poli = $this->rs_grid->fields[6] ;  
         $this->sc_field_0 = $this->rs_grid->fields[7] ;  
         $this->e_kelas = $this->rs_grid->fields[8] ;  
         $this->trancode = $this->rs_grid->fields[9] ;  
         $carabayar_orig = $this->carabayar;
         $_SESSION['scriptcase']['grid_lap_bill_ranap']['contr_erro'] = 'on';
 $check_sql = "SELECT status, verifyBy"
   . " FROM tbstatusranap"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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
    $verify = $this->rs[0][0];
	$verifyBy = $this->rs[0][1];
}
		else     
{
	$verify = '0';
	$verifyBy = '-';
}

if ($verify == '1'){
	$this->verifstatus  = 'Verified';
	$this->verifiedby  = $verifyBy;
	$this->NM_field_style["verifstatus"] = "background-color:green;";
	$this->NM_field_color["verifstatus"] = "#ffffff";
}else{
	$this->verifstatus  = 'Blm Verify';
	$this->verifiedby  = $verifyBy;
	$this->NM_field_style["verifstatus"] = "background-color:red;";
	$this->NM_field_color["verifstatus"] = "#000000";
}


$check_sql = "SELECT unitAsal"
   . " FROM tbadmrawatinap"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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
    $unit = $this->rs[0][0];
}
		else     
{
	$unit = '';
}

if(is_null($unit) || empty($unit)){
	
	$jmlTindIGD = '0';
	$jmlresepIGD = '0';
	$jmlbhpIGD = '0';
	$jmlTindPoli = '0';
	$jmlresepPoli = '0';
	$jmlbhpPoli = '0';
	$jmllabIGD = '0';
	$jmlradIGD = '0';
	$jmladmIGD = '0';
	$jmladmPoli = '0';
	
}else{

	$check_sql = "SELECT
					SUM( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) AS Total 
				FROM
					tbtindakanigd a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbdoctor d ON d.docCode = a.pelaksana 
				WHERE
					c.tranCode = '".$this->trancode ."'";
		 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindIGD = $this->rs[0][0];
}else{
	$jmlTindIGD = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbreseprawatigd a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlresepIGD = $this->rs[0][0];
}else{
	$jmlresepIGD = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbbhpigd a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlbhpIGD = $this->rs[0][0];
}else{
	$jmlbhpIGD = '0';
}
	
	$check_sql = "SELECT
					SUM( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) AS Total 
				FROM
					tbtindakanrawatjalan a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbdoctor d ON d.docCode = a.dokter 
				WHERE
					c.tranCode = '".$this->trancode ."'";
		 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindPoli = $this->rs[0][0];
}else{
	$jmlTindPoli = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbreseprawatjalan a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlresepPoli = $this->rs[0][0];
}else{
	$jmlresepPoli = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbbhprawatjalan a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlbhpPoli = $this->rs[0][0];
}else{
	$jmlbhpPoli = '0';
}
	
		$check_sql = "SELECT
						SUM( tbl_sum.total ) 
					FROM
						(
						SELECT
							b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
						FROM
							tbtranlab a
							LEFT JOIN tbdetaillab b ON b.trancode = a.trancode
							LEFT JOIN tblab c ON c.labcode = b.labcode
							LEFT JOIN tbrujukanlab d ON d.struk = a.struk
							LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 
						WHERE
							e.tranCode = '".$this->trancode ."' GROUP BY
		concat(date_format(b.trandate, '%d/%m/%Y  %H:%i'), '-', b.labcode) 
	) tbl_sum";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmllabIGD = $this->rs[0][0];
}else{
	$jmllabIGD = '0';
}
	
		$check_sql = "SUM( tbl_sum.total ) 
FROM
	(
	SELECT
		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
	FROM
		tbtranrad a
		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode
		LEFT JOIN tbradiologi c ON c.radcode = b.radcode
		LEFT JOIN tbrujukanradiologi d ON d.struk = a.struk
		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 
	WHERE
		e.tranCode = '".$this->trancode ."' GROUP BY
		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ',b.radcode)  
	) tbl_sum";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlradIGD = $this->rs[0][0];
}else{
	$jmlradIGD = '0';
}
	
	$check_sql = "SELECT
					sum(biaya)
				FROM
					tbbilladm a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmladmIGD = $this->rs[0][0];
}else{
	$jmladmIGD = '0';
}
	
	$check_sql = "SELECT
					sum(biaya) 
				FROM
					tbbilladm a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmladmPoli = $this->rs[0][0];
}else{
	$jmladmPoli = '0';
}
	
}

$check_sql = "SELECT
	SUM(
		( a.rate - ( a.rate * ( a.disc / 100 ) ) ) *
	IF
		(
			( date_format( a.check_out, '%H:%i' ) <= '12:00' ),
			DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ),
			DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1 
		) 
	) AS Total 
FROM
	tbbillruang a
	LEFT JOIN tbbed b ON b.idBed = a.bed 
WHERE
	a.tranCode = '".$this->trancode ."'";
 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlKamar = $this->rs[0][0];
}else{
	$jmlKamar = '0';
}

$check_sql = "SELECT
				SUM(
					( a.keperawatan - ( a.keperawatan * ( a.disc / 100 ) ) ) *
				IF
					(
						( date_format( a.check_out, '%H:%i' ) <= '12:00' ),
						DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ),
						DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1 
					) 
				) AS Total 
			FROM
				tbbillruang a
				LEFT JOIN tbbed b ON b.idBed = a.bed 
			WHERE
				a.tranCode = '".$this->trancode ."'";
 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlKeperawatan = $this->rs[0][0];
}else{
	$jmlKeperawatan = '0';
}

$check_sql = "SELECT
				SUM( a.fee - ( a.fee * ( a.disc / 100 ) ) ) AS Total 
			FROM
				tbtim a
				LEFT JOIN tbdetailvk b ON b.tranCode = a.trancode
				LEFT JOIN tbdoctor c ON c.docCode = a.
				CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode 
			WHERE
				b.inapCode = '" . $this->trancode  . "'";

 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindvk = $this->rs[0][0];
}else{
	$jmlTindvk = '0';
}

$check_sql = "SELECT
				SUM( a.fee - ( a.fee * ( a.disc / 100 ) ) ) AS Total 
			FROM
				tbtim a
				LEFT JOIN tbdetailok b ON b.tranCode = a.trancode
				LEFT JOIN tbdoctor c ON c.docCode = a.
				CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode 
			WHERE
				b.inapCode = '".$this->trancode ."'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindok = $this->rs[0][0];
}else{
	$jmlTindok = '0';
}

$check_sql = "SELECT
					SUM( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) AS Total 
				FROM
					tbtindakanrawatinap a
					LEFT JOIN tbdoctor b ON b.docCode = a.pelaksana 
				WHERE
					a.tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindakan = $this->rs[0][0];
}else{
	$jmlTindakan = '0';
}


$check_sql = "SELECT
				SUM(
					( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) + ( ( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) * 10 / 100 ) 
				) AS Total 
			FROM
				tbreseprawatinap a
				LEFT JOIN tbobat b ON b.kodeItem = a.item 
			WHERE
				a.tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlResep = $this->rs[0][0];
}else{
	$jmlResep = '0';
}

$check_sql = "SELECT
	SUM(
		(
			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) + (
				( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * a.diskon / 100 ) ) * ( 10 / 100 ) 
			) 
		) 
	) AS Total 
FROM
	tbbhprawatinap a
	LEFT JOIN tbobat b ON b.kodeItem = a.item 
WHERE
	a.tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlBHP = $this->rs[0][0];
}else{
	$jmlBHP = '0';
}

$check_sql = "SELECT
					SUM(
						( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) + (
							( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbdetailresepokvk a
					LEFT JOIN tbobat b ON b.kodeItem = a.item
					LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode 
				WHERE
					c.inapCode = '".$this->trancode ."'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlok = $this->rs[0][0];
}else{
	$jmlok = '0';
}

$check_sql = "SELECT
				SUM(
					( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) + ( ( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) * 10 / 100 ) 
				) AS Total 
			FROM
				tbdetailresepokvk a
				LEFT JOIN tbobat b ON b.kodeItem = a.item
				LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode 
			WHERE
				c.inapCode = '".$this->trancode ."'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlvk = $this->rs[0][0];
}else{
	$jmlvk = '0';
}

$check_sql = "SELECT
	SUM( tbl_sum.total ) 
FROM
(
	SELECT
		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
	FROM
		tbtranlab a
		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode
		LEFT JOIN tblab c ON c.labcode = b.labcode
	WHERE
		a.inapcode = '" . $this->trancode  . "'
	GROUP BY
		concat(date_format(b.trandate, '%d/%m/%Y  %H:%i'), '-', b.labcode)
	) tbl_sum";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmllab = $this->rs[0][0];
}else{
	$jmllab = '0';
}

$check_sql = "SELECT
	SUM( tbl_sum.total ) 
FROM
	(
	SELECT
		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
	FROM
		tbtranrad a
		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode
		LEFT JOIN tbradiologi c ON c.radcode = b.radcode
	WHERE
		a.inapcode = '" . $this->trancode  . "' 
	GROUP BY
		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ',b.radcode) 
	) tbl_sum";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlrad = $this->rs[0][0];
}else{
	$jmlrad = '0';
}

$check_sql = "SELECT
				biaya 
			FROM
				tbbilladm 
			WHERE
				tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
 
	$jmladm = $this->rs[0][0];
}else{
	$jmladm = '0';
}



$check_sql = "SELECT sum(deposit)"
   . " FROM tbpayment_ri"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0])  || !is_null($this->rs[0][0]))     
{
    $jmlDeposit = $this->rs[0][0];
    
}
		else     
{
	$jmlDeposit = '0';
}

$semua = $jmlTindIGD+$jmlresepIGD+$jmlbhpIGD+$jmlTindPoli+$jmlresepPoli+$jmlbhpPoli+$jmllabIGD+$jmlradIGD+$jmladmIGD+$jmladmPoli+$jmlKamar+$jmlKeperawatan+$jmlTindvk+$jmlTindok+$jmlTindakan+$jmlResep+$jmlBHP+$jmlok+$jmlvk+$jmllab+$jmlrad+$jmladm;

$all = $semua*(7/100);

$this->total  = $all+$semua;

$this->deposit  = $jmlDeposit;

$this->selisih  = $this->deposit -$this->total ;
$_SESSION['scriptcase']['grid_lap_bill_ranap']['contr_erro'] = 'off';
         $this->arg_sum_carabayar = " = " . $this->Db->qstr($this->carabayar);
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), sc_strip_script($this->carabayar), sc_strip_script($carabayar_orig));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'] == "CaraBayar")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['arr_total']['carabayar'] = $this->Res->array_total_carabayar;
      }
   }

   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?>  :: Excel</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XLS</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_lap_bill_ranap_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_lap_bill_ranap"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['xls_return']); ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
