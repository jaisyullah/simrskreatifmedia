<?php

class laporan_obat_all_xls
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
   var $sum_sc_field_1;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida']) {
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['opcao'] = "";
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
      { 
          $this->Tem_xls_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_xls_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false || strpos(" " . $_REQUEST['SC_module_export'], "chart") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['SC_Ind_Groupby'] == "sc_free_total")
          {
              $this->Tem_xls_res  = false;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['SC_Gb_Free_cmp']))
          {
              $this->Tem_xls_res  = false;
          }
          if ($this->Tem_xls_res)
          { 
              require_once($this->Ini->path_aplicacao . "laporan_obat_all_res_xls.class.php");
              $this->Res_xls = new laporan_obat_all_res_xls();
              $this->prep_modulos("Res_xls");
          } 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_laporan_obat_all.zip";
          $this->Arquivo   .= "_laporan_obat_all" . $this->Xls_tp;
          $this->Tit_doc    = "laporan_obat_all" . $this->Xls_tp;
          $this->Tit_zip    = "laporan_obat_all.zip";
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['SC_Ind_Groupby'] == "sc_free_total")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new laporan_obat_all_resumo("out");
          $this->prep_modulos("Res");
      }
      $this->GB_tot_php = array('sc_free_total');
      if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['SC_Ind_Groupby'], $this->GB_tot_php))
      {
          $Tot_Gb = "totaliza_php_" . $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['SC_Ind_Groupby'];
          $this->$Tot_Gb();
      }
      else
      {
          require_once($this->Ini->path_aplicacao . "laporan_obat_all_total.class.php"); 
          $this->Tot = new laporan_obat_all_total($this->Ini->sc_page);
          $this->prep_modulos("Tot");
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['SC_Ind_Groupby'];
          $this->Tot->$Gb_geral();
      }
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['tot_geral'][1];
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['laporan_obat_all']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_return']);
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['laporan_obat_all']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['laporan_obat_all']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['laporan_obat_all']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->trandate = $Busca_temp['trandate']; 
          $tmp_pos = strpos($this->trandate, "##@@");
          if ($tmp_pos !== false && !is_array($this->trandate))
          {
              $this->trandate = substr($this->trandate, 0, $tmp_pos);
          }
          $this->trandate_2 = $Busca_temp['trandate_input_2']; 
          $this->jenis = $Busca_temp['jenis']; 
          $tmp_pos = strpos($this->jenis, "##@@");
          if ($tmp_pos !== false && !is_array($this->jenis))
          {
              $this->jenis = substr($this->jenis, 0, $tmp_pos);
          }
          $this->namaitem = $Busca_temp['namaitem']; 
          $tmp_pos = strpos($this->namaitem, "##@@");
          if ($tmp_pos !== false && !is_array($this->namaitem))
          {
              $this->namaitem = substr($this->namaitem, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida_label'])
      { 
          $this->count_span = 0;
          $this->Xls_row++;
          $this->proc_label();
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT 	x.tranCode, 	y.namaItem, 	x.satuan, 	x.jumlah, 	x.biaya, 	x.tranDate,         x.jenis FROM 	( 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbreseprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhpigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbbhprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbdetailresepokvk UNION ALL 	SELECT 		a.trancode AS tranCode, 		a.itemcode AS item, 		a.sediaan as satuan, 		a.jumlah AS jumlah, 		a.rate AS biaya, 		b.trandate AS tranDate,                 'Rajal' jenis  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode  	) x 	LEFT JOIN tbobat y ON y.kodeItem = x.item ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),tranDate,102), '.', '-') + ' ' + convert(char(8),tranDate,20), tranCode, namaItem, satuan, jumlah, biaya, jenis from (SELECT 	x.tranCode, 	y.namaItem, 	x.satuan, 	x.jumlah, 	x.biaya, 	x.tranDate,         x.jenis FROM 	( 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbreseprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhpigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbbhprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbdetailresepokvk UNION ALL 	SELECT 		a.trancode AS tranCode, 		a.itemcode AS item, 		a.sediaan as satuan, 		a.jumlah AS jumlah, 		a.rate AS biaya, 		b.trandate AS tranDate,                 'Rajal' jenis  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode  	) x 	LEFT JOIN tbobat y ON y.kodeItem = x.item ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tranDate, tranCode, namaItem, satuan, jumlah, biaya, jenis from (SELECT 	x.tranCode, 	y.namaItem, 	x.satuan, 	x.jumlah, 	x.biaya, 	x.tranDate,         x.jenis FROM 	( 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbreseprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhpigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbbhprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbdetailresepokvk UNION ALL 	SELECT 		a.trancode AS tranCode, 		a.itemcode AS item, 		a.sediaan as satuan, 		a.jumlah AS jumlah, 		a.rate AS biaya, 		b.trandate AS tranDate,                 'Rajal' jenis  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode  	) x 	LEFT JOIN tbobat y ON y.kodeItem = x.item ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT convert(char(23),tranDate,121), tranCode, namaItem, satuan, jumlah, biaya, jenis from (SELECT 	x.tranCode, 	y.namaItem, 	x.satuan, 	x.jumlah, 	x.biaya, 	x.tranDate,         x.jenis FROM 	( 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbreseprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhpigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbbhprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbdetailresepokvk UNION ALL 	SELECT 		a.trancode AS tranCode, 		a.itemcode AS item, 		a.sediaan as satuan, 		a.jumlah AS jumlah, 		a.rate AS biaya, 		b.trandate AS tranDate,                 'Rajal' jenis  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode  	) x 	LEFT JOIN tbobat y ON y.kodeItem = x.item ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tranDate, tranCode, namaItem, satuan, jumlah, biaya, jenis from (SELECT 	x.tranCode, 	y.namaItem, 	x.satuan, 	x.jumlah, 	x.biaya, 	x.tranDate,         x.jenis FROM 	( 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbreseprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhpigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbbhprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbdetailresepokvk UNION ALL 	SELECT 		a.trancode AS tranCode, 		a.itemcode AS item, 		a.sediaan as satuan, 		a.jumlah AS jumlah, 		a.rate AS biaya, 		b.trandate AS tranDate,                 'Rajal' jenis  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode  	) x 	LEFT JOIN tbobat y ON y.kodeItem = x.item ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(tranDate, YEAR TO FRACTION), tranCode, namaItem, satuan, jumlah, biaya, jenis from (SELECT 	x.tranCode, 	y.namaItem, 	x.satuan, 	x.jumlah, 	x.biaya, 	x.tranDate,         x.jenis FROM 	( 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbreseprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhpigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbbhprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbdetailresepokvk UNION ALL 	SELECT 		a.trancode AS tranCode, 		a.itemcode AS item, 		a.sediaan as satuan, 		a.jumlah AS jumlah, 		a.rate AS biaya, 		b.trandate AS tranDate,                 'Rajal' jenis  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode  	) x 	LEFT JOIN tbobat y ON y.kodeItem = x.item ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT tranDate, tranCode, namaItem, satuan, jumlah, biaya, jenis from (SELECT 	x.tranCode, 	y.namaItem, 	x.satuan, 	x.jumlah, 	x.biaya, 	x.tranDate,         x.jenis FROM 	( 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbreseprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhpigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbbhprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbdetailresepokvk UNION ALL 	SELECT 		a.trancode AS tranCode, 		a.itemcode AS item, 		a.sediaan as satuan, 		a.jumlah AS jumlah, 		a.rate AS biaya, 		b.trandate AS tranDate,                 'Rajal' jenis  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode  	) x 	LEFT JOIN tbobat y ON y.kodeItem = x.item ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['order_grid'];
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Xls_col = 0;
         $this->Xls_row++;
         $this->trandate = $rs->fields[0] ;  
         $this->trancode = $rs->fields[1] ;  
         $this->namaitem = $rs->fields[2] ;  
         $this->satuan = $rs->fields[3] ;  
         $this->jumlah = $rs->fields[4] ;  
         $this->jumlah = (strpos(strtolower($this->jumlah), "e")) ? (float)$this->jumlah : $this->jumlah; 
         $this->jumlah = (string)$this->jumlah;
         $this->biaya = $rs->fields[5] ;  
         $this->biaya =  str_replace(",", ".", $this->biaya);
         $this->biaya = (string)$this->biaya;
         $this->jenis = $rs->fields[6] ;  
     if ($this->groupby_show == "S") {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
         $_SESSION['scriptcase']['laporan_obat_all']['contr_erro'] = 'on';
 $this->total  = $this->biaya *$this->jumlah ;
$this->sc_field_0  = $this->biaya *$this->jumlah *(10/100);
$this->sc_field_1  = ($this->biaya *$this->jumlah )+($this->biaya *$this->jumlah *(10/100));

if(substr($this->trancode ,0,2) == 'RJ'){
	
$check_sql = "SELECT concat(b.name,', ',b.salut,' (',a.custCode,')')"
   . " FROM tbdetailrawatjalan a left join tbcustomer b on b.custCode = a.custCode"
   . " WHERE a.tranCode = '" . $this->trancode  . "'";
 
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
		$this->namapasien  = $this->rs[0][0];
	}
			else     
	{
		$this->namapasien  = '';
	}

}elseif(substr($this->trancode ,0,3) == 'IGD'){
	
$check_sql = "SELECT concat(b.name,', ',b.salut,' (',a.custCode,')')"
   . " FROM tbdetailigd a left join tbcustomer b on b.custCode = a.custCode"
   . " WHERE a.tranCode = '" . $this->trancode  . "'";
 
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
		$this->namapasien  = $this->rs[0][0];
	}
			else     
	{
		$this->namapasien  = '';
	}

}elseif(substr($this->trancode ,0,2) == 'RI'){
	
$check_sql = "SELECT concat(b.name,', ',b.salut,' (',a.custCode,')')"
   . " FROM tbdetailrawatinap a left join tbcustomer b on b.custCode = a.custCode"
   . " WHERE a.tranCode = '" . $this->trancode  . "'";
 
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
		$this->namapasien  = $this->rs[0][0];
	}
			else     
	{
		$this->namapasien  = '';
	}
	
}elseif(substr($this->trancode ,0,2) == 'OK'){
	
$check_sql = "SELECT concat(b.name,', ',b.salut,' (',a.custCode,')')"
   . " FROM tbdetailok a left join tbcustomer b on b.custCode = a.custCode"
   . " WHERE a.tranCode = '" . $this->trancode  . "'";
 
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
		$this->namapasien  = $this->rs[0][0];
	}
			else     
	{
		$this->namapasien  = '';
	}
	
}elseif(substr($this->trancode ,0,2) == 'VK'){
	
$check_sql = "SELECT concat(b.name,', ',b.salut,' (',a.custCode,')')"
   . " FROM tbdetailvk a left join tbcustomer b on b.custCode = a.custCode"
   . " WHERE a.tranCode = '" . $this->trancode  . "'";
 
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
		$this->namapasien  = $this->rs[0][0];
	}
			else     
	{
		$this->namapasien  = '';
	}
	
}else{
	
$check_sql = "SELECT extname"
   . " FROM tbdrugsell"
   . " WHERE trancode = '" . $this->trancode  . "'";
 
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
		$this->namapasien  = $this->rs[0][0];
	}
			else     
	{
		$this->namapasien  = '';
	}

}
$_SESSION['scriptcase']['laporan_obat_all']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'] && $prim_reg)
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
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if ($this->groupby_show == "S") {
          $this->Xls_col = 0;
          $this->Xls_row++;
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['SC_Ind_Groupby'] . "_bot";
          $this->$Gb_geral();
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
      { 
          if ($this->Tem_xls_res)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_res_grid'] = true;
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
                  $Xls_res = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_res_sheet']);
              }
              else {
                  $Xls_res = PHPExcel_IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_res_sheet']);
              }
              foreach($Xls_res->getAllSheets() as $sheet)
              {
                  $this->Xls_dados->addExternalSheet($sheet);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_res_sheet']);
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['trandate'])) ? $this->New_label['trandate'] : "Tgl. Transaksi"; 
          if ($Cada_col == "trandate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
          $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Kode Transaksi"; 
          if ($Cada_col == "trancode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
          $SC_Label = (isset($this->New_label['namapasien'])) ? $this->New_label['namapasien'] : "RM"; 
          if ($Cada_col == "namapasien" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
          $SC_Label = (isset($this->New_label['namaitem'])) ? $this->New_label['namaitem'] : "Nama Item"; 
          if ($Cada_col == "namaitem" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
          $SC_Label = (isset($this->New_label['satuan'])) ? $this->New_label['satuan'] : "Satuan"; 
          if ($Cada_col == "satuan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
          $SC_Label = (isset($this->New_label['jumlah'])) ? $this->New_label['jumlah'] : "Jumlah"; 
          if ($Cada_col == "jumlah" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
          $SC_Label = (isset($this->New_label['biaya'])) ? $this->New_label['biaya'] : "Biaya"; 
          if ($Cada_col == "biaya" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
          $SC_Label = (isset($this->New_label['jenis'])) ? $this->New_label['jenis'] : "Jenis"; 
          if ($Cada_col == "jenis" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Ppn Total"; 
          if ($Cada_col == "sc_field_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
          $SC_Label = (isset($this->New_label['sc_field_1'])) ? $this->New_label['sc_field_1'] : "Grand Total"; 
          if ($Cada_col == "sc_field_1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida'])
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
      } 
      $this->Xls_col = 0;
      $this->Xls_row++;
   } 
   //----- trandate
   function NM_export_trandate()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->trandate))
      {
             if (substr($this->trandate, 10, 1) == "-") 
             { 
                 $this->trandate = substr($this->trandate, 0, 10) . " " . substr($this->trandate, 11);
             } 
             if (substr($this->trandate, 13, 1) == ".") 
             { 
                $this->trandate = substr($this->trandate, 0, 13) . ":" . substr($this->trandate, 14, 2) . ":" . substr($this->trandate, 17);
             } 
             $conteudo_x =  $this->trandate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->trandate, "YYYY-MM-DD HH:II:SS  ");
                 $this->trandate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      }
         if (!NM_is_utf8($this->trandate))
         {
             $this->trandate = sc_convert_encoding($this->trandate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->trandate, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->trandate, PHPExcel_Cell_DataType::TYPE_STRING);
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
   //----- namapasien
   function NM_export_namapasien()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->namapasien = html_entity_decode($this->namapasien, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->namapasien = strip_tags($this->namapasien);
         if (!NM_is_utf8($this->namapasien))
         {
             $this->namapasien = sc_convert_encoding($this->namapasien, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->namapasien, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->namapasien, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- namaitem
   function NM_export_namaitem()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->namaitem = html_entity_decode($this->namaitem, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->namaitem = strip_tags($this->namaitem);
         if (!NM_is_utf8($this->namaitem))
         {
             $this->namaitem = sc_convert_encoding($this->namaitem, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->namaitem, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->namaitem, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- satuan
   function NM_export_satuan()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->satuan = html_entity_decode($this->satuan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->satuan = strip_tags($this->satuan);
         if (!NM_is_utf8($this->satuan))
         {
             $this->satuan = sc_convert_encoding($this->satuan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->satuan, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->satuan, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- jumlah
   function NM_export_jumlah()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->jumlah))
         {
             $this->jumlah = sc_convert_encoding($this->jumlah, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->jumlah))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->jumlah);
         $this->Xls_col++;
   }
   //----- biaya
   function NM_export_biaya()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->biaya))
         {
             $this->biaya = sc_convert_encoding($this->biaya, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->biaya))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->biaya);
         $this->Xls_col++;
   }
   //----- jenis
   function NM_export_jenis()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->jenis = html_entity_decode($this->jenis, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->jenis = strip_tags($this->jenis);
         if (!NM_is_utf8($this->jenis))
         {
             $this->jenis = sc_convert_encoding($this->jenis, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->jenis, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->jenis, PHPExcel_Cell_DataType::TYPE_STRING);
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
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->total);
         $this->Xls_col++;
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->sc_field_0))
         {
             $this->sc_field_0 = sc_convert_encoding($this->sc_field_0, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->sc_field_0))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->sc_field_0);
         $this->Xls_col++;
   }
   //----- sc_field_1
   function NM_export_sc_field_1()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->sc_field_1))
         {
             $this->sc_field_1 = sc_convert_encoding($this->sc_field_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->sc_field_1))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->sc_field_1);
         $this->Xls_col++;
   }
   //----- trandate
   function NM_sub_cons_trandate()
   {
      if (!empty($this->trandate))
      {
         if (substr($this->trandate, 10, 1) == "-") 
         { 
             $this->trandate = substr($this->trandate, 0, 10) . " " . substr($this->trandate, 11);
         } 
         if (substr($this->trandate, 13, 1) == ".") 
         { 
            $this->trandate = substr($this->trandate, 0, 13) . ":" . substr($this->trandate, 14, 2) . ":" . substr($this->trandate, 17);
         } 
         $conteudo_x =  $this->trandate;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->trandate, "YYYY-MM-DD HH:II:SS  ");
             $this->trandate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->trandate))
         {
             $this->trandate = sc_convert_encoding($this->trandate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->trandate;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
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
   //----- namapasien
   function NM_sub_cons_namapasien()
   {
         $this->namapasien = html_entity_decode($this->namapasien, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->namapasien = strip_tags($this->namapasien);
         if (!NM_is_utf8($this->namapasien))
         {
             $this->namapasien = sc_convert_encoding($this->namapasien, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->namapasien;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- namaitem
   function NM_sub_cons_namaitem()
   {
         $this->namaitem = html_entity_decode($this->namaitem, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->namaitem = strip_tags($this->namaitem);
         if (!NM_is_utf8($this->namaitem))
         {
             $this->namaitem = sc_convert_encoding($this->namaitem, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->namaitem;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- satuan
   function NM_sub_cons_satuan()
   {
         $this->satuan = html_entity_decode($this->satuan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->satuan = strip_tags($this->satuan);
         if (!NM_is_utf8($this->satuan))
         {
             $this->satuan = sc_convert_encoding($this->satuan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->satuan;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- jumlah
   function NM_sub_cons_jumlah()
   {
         if (!NM_is_utf8($this->jumlah))
         {
             $this->jumlah = sc_convert_encoding($this->jumlah, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->jumlah;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- biaya
   function NM_sub_cons_biaya()
   {
         if (!NM_is_utf8($this->biaya))
         {
             $this->biaya = sc_convert_encoding($this->biaya, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->biaya;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- jenis
   function NM_sub_cons_jenis()
   {
         $this->jenis = html_entity_decode($this->jenis, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->jenis = strip_tags($this->jenis);
         if (!NM_is_utf8($this->jenis))
         {
             $this->jenis = sc_convert_encoding($this->jenis, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->jenis;
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
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- sc_field_0
   function NM_sub_cons_sc_field_0()
   {
         if (!NM_is_utf8($this->sc_field_0))
         {
             $this->sc_field_0 = sc_convert_encoding($this->sc_field_0, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->sc_field_0;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- sc_field_1
   function NM_sub_cons_sc_field_1()
   {
         if (!NM_is_utf8($this->sc_field_1))
         {
             $this->sc_field_1 = sc_convert_encoding($this->sc_field_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->sc_field_1;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['nolabel'])
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
   function quebra_geral_sc_free_total_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "sc_field_1" && (!isset($this->NM_cmp_hidden['sc_field_1']) || $this->NM_cmp_hidden['sc_field_1'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['tot_geral'][2];
               $prim_cmp = false;
               if (!NM_is_utf8($Vl_Tot)) {
                   $Vl_Tot = sc_convert_encoding($Vl_Tot, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   if (!NM_is_utf8($mens_tot)) {
                       $mens_tot = sc_convert_encoding($mens_tot, "UTF-8", $_SESSION['scriptcase']['charset']);
                   }
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),tranDate,102), '.', '-') + ' ' + convert(char(8),tranDate,20), tranCode, namaItem, satuan, jumlah, biaya, jenis from (SELECT 	x.tranCode, 	y.namaItem, 	x.satuan, 	x.jumlah, 	x.biaya, 	x.tranDate,         x.jenis FROM 	( 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbreseprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhpigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbbhprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbdetailresepokvk UNION ALL 	SELECT 		a.trancode AS tranCode, 		a.itemcode AS item, 		a.sediaan as satuan, 		a.jumlah AS jumlah, 		a.rate AS biaya, 		b.trandate AS tranDate,                 'Rajal' jenis  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode  	) x 	LEFT JOIN tbobat y ON y.kodeItem = x.item ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),tranDate,121), tranCode, namaItem, satuan, jumlah, biaya, jenis from (SELECT 	x.tranCode, 	y.namaItem, 	x.satuan, 	x.jumlah, 	x.biaya, 	x.tranDate,         x.jenis FROM 	( 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbreseprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhpigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbbhprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbdetailresepokvk UNION ALL 	SELECT 		a.trancode AS tranCode, 		a.itemcode AS item, 		a.sediaan as satuan, 		a.jumlah AS jumlah, 		a.rate AS biaya, 		b.trandate AS tranDate,                 'Rajal' jenis  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode  	) x 	LEFT JOIN tbobat y ON y.kodeItem = x.item ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT tranDate, tranCode, namaItem, satuan, jumlah, biaya, jenis from (SELECT 	x.tranCode, 	y.namaItem, 	x.satuan, 	x.jumlah, 	x.biaya, 	x.tranDate,         x.jenis FROM 	( 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbreseprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhpigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbbhprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbdetailresepokvk UNION ALL 	SELECT 		a.trancode AS tranCode, 		a.itemcode AS item, 		a.sediaan as satuan, 		a.jumlah AS jumlah, 		a.rate AS biaya, 		b.trandate AS tranDate,                 'Rajal' jenis  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode  	) x 	LEFT JOIN tbobat y ON y.kodeItem = x.item ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(tranDate, YEAR TO FRACTION), tranCode, namaItem, satuan, jumlah, biaya, jenis from (SELECT 	x.tranCode, 	y.namaItem, 	x.satuan, 	x.jumlah, 	x.biaya, 	x.tranDate,         x.jenis FROM 	( 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbreseprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhpigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbbhprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbdetailresepokvk UNION ALL 	SELECT 		a.trancode AS tranCode, 		a.itemcode AS item, 		a.sediaan as satuan, 		a.jumlah AS jumlah, 		a.rate AS biaya, 		b.trandate AS tranDate,                 'Rajal' jenis  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode  	) x 	LEFT JOIN tbobat y ON y.kodeItem = x.item ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT tranDate, tranCode, namaItem, satuan, jumlah, biaya, jenis from (SELECT 	x.tranCode, 	y.namaItem, 	x.satuan, 	x.jumlah, 	x.biaya, 	x.tranDate,         x.jenis FROM 	( 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbreseprawatigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbreseprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhprawatjalan UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Rajal' jenis 	FROM 		tbbhpigd UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbbhprawatinap UNION ALL 	SELECT 		tranCode, 		item, 		satuan, 		jumlah, 		biaya, 		tranDate,                 'Ranap' jenis 	FROM 		tbdetailresepokvk UNION ALL 	SELECT 		a.trancode AS tranCode, 		a.itemcode AS item, 		a.sediaan as satuan, 		a.jumlah AS jumlah, 		a.rate AS biaya, 		b.trandate AS tranDate,                 'Rajal' jenis  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode  	) x 	LEFT JOIN tbobat y ON y.kodeItem = x.item ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['order_grid'] = $nmgp_order_by;
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
         $this->trandate = $this->rs_grid->fields[0] ;  
         $this->trancode = $this->rs_grid->fields[1] ;  
         $this->namaitem = $this->rs_grid->fields[2] ;  
         $this->satuan = $this->rs_grid->fields[3] ;  
         $this->jumlah = $this->rs_grid->fields[4] ;  
         $this->jumlah = (strpos(strtolower($this->jumlah), "e")) ? (float)$this->jumlah : $this->jumlah; 
         $this->jumlah = (string)$this->jumlah;  
         $this->rs_grid->fields[5] =  str_replace(",", ".", $this->rs_grid->fields[5]);  
         $this->biaya = $this->rs_grid->fields[5] ;  
         $this->biaya = (string)$this->biaya;  
         $this->jenis = $this->rs_grid->fields[6] ;  
         $_SESSION['scriptcase']['laporan_obat_all']['contr_erro'] = 'on';
 $this->total  = $this->biaya *$this->jumlah ;
$this->sc_field_0  = $this->biaya *$this->jumlah *(10/100);
$this->sc_field_1  = ($this->biaya *$this->jumlah )+($this->biaya *$this->jumlah *(10/100));

if(substr($this->trancode ,0,2) == 'RJ'){
	
$check_sql = "SELECT concat(b.name,', ',b.salut,' (',a.custCode,')')"
   . " FROM tbdetailrawatjalan a left join tbcustomer b on b.custCode = a.custCode"
   . " WHERE a.tranCode = '" . $this->trancode  . "'";
 
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
		$this->namapasien  = $this->rs[0][0];
	}
			else     
	{
		$this->namapasien  = '';
	}

}elseif(substr($this->trancode ,0,3) == 'IGD'){
	
$check_sql = "SELECT concat(b.name,', ',b.salut,' (',a.custCode,')')"
   . " FROM tbdetailigd a left join tbcustomer b on b.custCode = a.custCode"
   . " WHERE a.tranCode = '" . $this->trancode  . "'";
 
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
		$this->namapasien  = $this->rs[0][0];
	}
			else     
	{
		$this->namapasien  = '';
	}

}elseif(substr($this->trancode ,0,2) == 'RI'){
	
$check_sql = "SELECT concat(b.name,', ',b.salut,' (',a.custCode,')')"
   . " FROM tbdetailrawatinap a left join tbcustomer b on b.custCode = a.custCode"
   . " WHERE a.tranCode = '" . $this->trancode  . "'";
 
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
		$this->namapasien  = $this->rs[0][0];
	}
			else     
	{
		$this->namapasien  = '';
	}
	
}elseif(substr($this->trancode ,0,2) == 'OK'){
	
$check_sql = "SELECT concat(b.name,', ',b.salut,' (',a.custCode,')')"
   . " FROM tbdetailok a left join tbcustomer b on b.custCode = a.custCode"
   . " WHERE a.tranCode = '" . $this->trancode  . "'";
 
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
		$this->namapasien  = $this->rs[0][0];
	}
			else     
	{
		$this->namapasien  = '';
	}
	
}elseif(substr($this->trancode ,0,2) == 'VK'){
	
$check_sql = "SELECT concat(b.name,', ',b.salut,' (',a.custCode,')')"
   . " FROM tbdetailvk a left join tbcustomer b on b.custCode = a.custCode"
   . " WHERE a.tranCode = '" . $this->trancode  . "'";
 
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
		$this->namapasien  = $this->rs[0][0];
	}
			else     
	{
		$this->namapasien  = '';
	}
	
}else{
	
$check_sql = "SELECT extname"
   . " FROM tbdrugsell"
   . " WHERE trancode = '" . $this->trancode  . "'";
 
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
		$this->namapasien  = $this->rs[0][0];
	}
			else     
	{
		$this->namapasien  = '';
	}

}
$_SESSION['scriptcase']['laporan_obat_all']['contr_erro'] = 'off';
         $this->sc_field_1 = (strpos(strtolower($this->sc_field_1), "e")) ? (float)$this->sc_field_1 : $this->sc_field_1; 
         $this->sc_field_1 = (string)$this->sc_field_1;  
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->sc_field_1)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['contr_total_geral'] = "OK";
   }

   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="laporan_obat_all_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="laporan_obat_all"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['laporan_obat_all']['xls_return']); ?>"> 
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
