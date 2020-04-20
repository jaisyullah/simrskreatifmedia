<?php

class kartu_stok_xls
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
   var $sum_masuk;
   var $sum_keluar;
   var $sum_kumulatif;
   var $deskripsi_Old;
   var $arg_sum_deskripsi;
   var $Label_deskripsi;
   var $sc_proc_quebra_deskripsi;
   var $count_deskripsi;
   var $sum_deskripsi_masuk;
   var $sum_deskripsi_keluar;
   var $sum_deskripsi_kumulatif;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida']) {
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['opcao'] = "";
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $this->Use_phpspreadsheet = (phpversion() >=  "7.3.9" && is_dir($this->Ini->path_third . '/phpspreadsheet')) ? true : false;
      $this->SC_top = array();
      $this->SC_bot = array();
      $this->SC_top[] = "deskripsi";
      $this->Xls_tot_col = 0;
      $this->Xls_row     = 0;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
      { 
          $this->Tem_xls_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_xls_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false || strpos(" " . $_REQUEST['SC_module_export'], "chart") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->Tem_xls_res  = false;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp']))
          {
              $this->Tem_xls_res  = false;
          }
          if ($this->Tem_xls_res)
          { 
              require_once($this->Ini->path_aplicacao . "kartu_stok_res_xls.class.php");
              $this->Res_xls = new kartu_stok_res_xls();
              $this->prep_modulos("Res_xls");
          } 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_kartu_stok.zip";
          $this->Arquivo   .= "_kartu_stok" . $this->Xls_tp;
          $this->Tit_doc    = "kartu_stok" . $this->Xls_tp;
          $this->Tit_zip    = "kartu_stok.zip";
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new kartu_stok_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'] == "sc_free_total")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new kartu_stok_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new kartu_stok_resumo("out");
          $this->prep_modulos("Res");
      }
      $this->GB_tot_php = array('_NM_SC_','sc_free_total','sc_free_group_by');
      if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'], $this->GB_tot_php))
      {
          $Tot_Gb = "totaliza_php_" . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'];
          $this->$Tot_Gb();
      }
      else
      {
          require_once($this->Ini->path_aplicacao . "kartu_stok_total.class.php"); 
          $this->Tot = new kartu_stok_total($this->Ini->sc_page);
          $this->prep_modulos("Tot");
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'];
          $this->Tot->$Gb_geral();
      }
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][1];
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['kartu_stok']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_return']);
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['kartu_stok']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['kartu_stok']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['kartu_stok']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->transaksi = $Busca_temp['transaksi']; 
          $tmp_pos = strpos($this->transaksi, "##@@");
          if ($tmp_pos !== false && !is_array($this->transaksi))
          {
              $this->transaksi = substr($this->transaksi, 0, $tmp_pos);
          }
          $this->transaksi_2 = $Busca_temp['transaksi_input_2']; 
          $this->deskripsi = $Busca_temp['deskripsi']; 
          $tmp_pos = strpos($this->deskripsi, "##@@");
          if ($tmp_pos !== false && !is_array($this->deskripsi))
          {
              $this->deskripsi = substr($this->deskripsi, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida_label'])
      { 
          $this->count_span = 0;
          $this->Xls_row++;
          $this->proc_label();
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),Kadaluarsa,102), '.', '-') + ' ' + convert(char(8),Kadaluarsa,20), str_replace (convert(char(10),Transaksi,102), '.', '-') + ' ' + convert(char(8),Transaksi,20), tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT Kadaluarsa, Transaksi, tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT convert(char(23),Kadaluarsa,121), convert(char(23),Transaksi,121), tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT Kadaluarsa, Transaksi, tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(Kadaluarsa, YEAR TO DAY), EXTEND(Transaksi, YEAR TO FRACTION), tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT Kadaluarsa, Transaksi, tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->cumulatif = 0;
      $this->SC_seq_register = 0;
      $prim_reg = true;
      $prim_gb  = true;
      $nm_houve_quebra = "N";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $prim_reg = false;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Xls_col = 0;
         $this->Xls_row++;
         $this->kadaluarsa = $rs->fields[0] ;  
         $this->transaksi = $rs->fields[1] ;  
         $this->trancode = $rs->fields[2] ;  
         $this->kategori = $rs->fields[3] ;  
         $this->deskripsi = $rs->fields[4] ;  
         $this->masuk = $rs->fields[5] ;  
         $this->masuk = (strpos(strtolower($this->masuk), "e")) ? (float)$this->masuk : $this->masuk; 
         $this->masuk = (string)$this->masuk;
         $this->keluar = $rs->fields[6] ;  
         $this->keluar = (strpos(strtolower($this->keluar), "e")) ? (float)$this->keluar : $this->keluar; 
         $this->keluar = (string)$this->keluar;
         $this->kumulatif = $rs->fields[7] ;  
         $this->kumulatif = (strpos(strtolower($this->kumulatif), "e")) ? (float)$this->kumulatif : $this->kumulatif; 
         $this->kumulatif = (string)$this->kumulatif;
         $this->arg_sum_deskripsi = " = " . $this->Db->qstr($this->deskripsi);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'] == "sc_free_group_by") 
          {  
              $SC_arg_Gby = array();
              $SC_arg_Sql = array();
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                  $SC_arg_Gby[$cmp] = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
              }
              $SC_lst_Gby = array();
              $gb_ok      = false;
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $SC_arg_Sql[$cmp] = $sql;
                  $Fun_GB  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  if (!empty($Format_tst))
                  {
                      $temp = $this->$cmp;
                      if (!empty($temp))
                      {
                          $SC_arg_Sql[$cmp] = $this->Ini->Get_sql_date_groupby($sql, $Format_tst);
                      }
                  }
                  $temp = $cmp . "_Old";
                  if ($SC_arg_Gby[$cmp] != $this->$temp || $gb_ok)
                  {
                      $SC_lst_Gby[] = $cmp;
                      $gb_ok = true;
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp']);
              krsort ($SC_lst_Gby);
              $Qb_page = true;
              foreach ($SC_lst_Gby as $Ind => $cmp)
              {
                  if (in_array($cmp, $this->SC_bot) && !$prim_gb)
                  {
                      $tmp = "quebra_" . $cmp . "_sc_free_group_by_bot";
                      $this->$tmp($cmp);
                      $this->Nivel_gbBot--;
                      if ($this->groupby_show == "S") {
                          $this->Xls_col = 0;
                          $this->Xls_row++;
                      }
                  }
                  $sql_where = "";
                  $cmp_qb     = $this->$cmp;
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp'] as $Col_Gb => $Sql)
                  {
                      $tmp        = "arg_sum_" . $Col_Gb;
                      $sql_where .= (!empty($sql_where)) ? " and " : "";
                      $sql_where .= $SC_arg_Sql[$Col_Gb] . $this->$tmp;
                      if ($Col_Gb == $cmp)
                      {
                          break;
                      }
                  }
                  $tmp  = "quebra_" . $cmp . "_sc_free_group_by";
                  $this->$tmp($cmp_qb, $sql_where, $cmp);
              }
              if (!empty($SC_lst_Gby) && !$prim_gb && $this->groupby_show == "S" && $this->groupby_show == "S")
              {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida']) {
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp']);
              ksort ($SC_lst_Gby);
              foreach ($SC_lst_Gby as $Ind => $cmp)
              {
                  if (in_array($cmp, $this->SC_top))
                  {
                      $tmp = "quebra_" . $cmp . "_sc_free_group_by_top";
                      $this->$tmp($cmp);
                      if ($this->groupby_show == "S") {
                          $this->Xls_col = 0;
                          $this->Xls_row++;
                      }
                  }
              }
              if (!empty($SC_lst_Gby))
              {
                  $nm_houve_quebra = "S";
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp'] as $cmp => $sql)
                  {
                      $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_orig'][$cmp] : $cmp;
                      $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                      $Cmp_Old   = $cmp . '_Old';
                      $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                      $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
                  }
              }
          }  
     if ($this->groupby_show == "S") {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
     if ($nm_houve_quebra == "S")
     {
         $this->cumulatif = 0;
     }
     $prim_gb = false;
     $nm_houve_quebra = "N";
         $this->sc_proc_grid = true; 
         $this->cumulatif += $this->kumulatif;
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'] && $prim_reg)
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
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if ($this->groupby_show == "S") {
          $this->Xls_col = 0;
          $this->Xls_row++;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'] == "sc_free_group_by")
       {
           $SC_lst_Gby = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $SC_lst_Gby[] = $cmp;
           }
           $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp']);
           krsort ($SC_lst_Gby);
           foreach ($SC_lst_Gby as $Ind => $cmp)
           {
               if (in_array($cmp, $this->SC_bot) && !$prim_gb)
               {
                   $tmp = "quebra_" . $cmp . "_sc_free_group_by_bot";
                   $this->$tmp($cmp);
                   $this->Nivel_gbBot--;
                   if ($this->groupby_show == "S") {
                       $this->Xls_col = 0;;
                       $this->Xls_row++;;
                   }
               }
           }
       }
          $this->Xls_col = 0;
          $this->Xls_row++;
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'] . "_bot";
          $this->$Gb_geral();
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
      { 
          if ($this->Tem_xls_res)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_res_grid'] = true;
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
                  $Xls_res = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_res_sheet']);
              }
              else {
                  $Xls_res = PHPExcel_IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_res_sheet']);
              }
              foreach($Xls_res->getAllSheets() as $sheet)
              {
                  $this->Xls_dados->addExternalSheet($sheet);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_res_sheet']);
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['kadaluarsa'])) ? $this->New_label['kadaluarsa'] : "Tgl Kadaluarsa"; 
          if ($Cada_col == "kadaluarsa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
          $SC_Label = (isset($this->New_label['transaksi'])) ? $this->New_label['transaksi'] : "Tgl Transaksi"; 
          if ($Cada_col == "transaksi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
          $SC_Label = (isset($this->New_label['kategori'])) ? $this->New_label['kategori'] : "Kategori"; 
          if ($Cada_col == "kategori" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
          $SC_Label = (isset($this->New_label['deskripsi'])) ? $this->New_label['deskripsi'] : "Nama Item"; 
          if ($Cada_col == "deskripsi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
          $SC_Label = (isset($this->New_label['masuk'])) ? $this->New_label['masuk'] : "Masuk"; 
          if ($Cada_col == "masuk" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
          $SC_Label = (isset($this->New_label['keluar'])) ? $this->New_label['keluar'] : "Keluar"; 
          if ($Cada_col == "keluar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
          $SC_Label = (isset($this->New_label['kumulatif'])) ? $this->New_label['kumulatif'] : "Masuk-Keluar"; 
          if ($Cada_col == "kumulatif" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
          $SC_Label = (isset($this->New_label['cumulatif'])) ? $this->New_label['cumulatif'] : "Kumulatif"; 
          if ($Cada_col == "cumulatif" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida'])
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
   //----- kadaluarsa
   function NM_export_kadaluarsa()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->kadaluarsa = substr($this->kadaluarsa, 0, 10);
         if (empty($this->kadaluarsa) || $this->kadaluarsa == "0000-00-00")
         {
             if ($this->Use_phpspreadsheet) {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->kadaluarsa, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
             }
             else {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->kadaluarsa, PHPExcel_Cell_DataType::TYPE_STRING);
             }
         }
         else
         {
             $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->kadaluarsa);
             $this->NM_ctrl_style[$current_cell_ref]['format'] = $this->SC_date_conf_region;
         }
         $this->Xls_col++;
   }
   //----- transaksi
   function NM_export_transaksi()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->transaksi))
      {
             if (substr($this->transaksi, 10, 1) == "-") 
             { 
                 $this->transaksi = substr($this->transaksi, 0, 10) . " " . substr($this->transaksi, 11);
             } 
             if (substr($this->transaksi, 13, 1) == ".") 
             { 
                $this->transaksi = substr($this->transaksi, 0, 13) . ":" . substr($this->transaksi, 14, 2) . ":" . substr($this->transaksi, 17);
             } 
             $conteudo_x =  $this->transaksi;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->transaksi, "YYYY-MM-DD HH:II:SS  ");
                 $this->transaksi = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      }
         if (!NM_is_utf8($this->transaksi))
         {
             $this->transaksi = sc_convert_encoding($this->transaksi, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->transaksi, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->transaksi, PHPExcel_Cell_DataType::TYPE_STRING);
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
   //----- kategori
   function NM_export_kategori()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->kategori = html_entity_decode($this->kategori, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kategori = strip_tags($this->kategori);
         if (!NM_is_utf8($this->kategori))
         {
             $this->kategori = sc_convert_encoding($this->kategori, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->kategori, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->kategori, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- deskripsi
   function NM_export_deskripsi()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->deskripsi = html_entity_decode($this->deskripsi, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->deskripsi = strip_tags($this->deskripsi);
         if (!NM_is_utf8($this->deskripsi))
         {
             $this->deskripsi = sc_convert_encoding($this->deskripsi, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->deskripsi, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->deskripsi, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- masuk
   function NM_export_masuk()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->masuk))
         {
             $this->masuk = sc_convert_encoding($this->masuk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->masuk))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->masuk);
         $this->Xls_col++;
   }
   //----- keluar
   function NM_export_keluar()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->keluar))
         {
             $this->keluar = sc_convert_encoding($this->keluar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->keluar))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->keluar);
         $this->Xls_col++;
   }
   //----- kumulatif
   function NM_export_kumulatif()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->kumulatif))
         {
             $this->kumulatif = sc_convert_encoding($this->kumulatif, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->kumulatif))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->kumulatif);
         $this->Xls_col++;
   }
   //----- cumulatif
   function NM_export_cumulatif()
   {
         $cumulatif_save = $this->cumulatif;
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->cumulatif))
         {
             $this->cumulatif = sc_convert_encoding($this->cumulatif, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->cumulatif))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->cumulatif);
         $this->Xls_col++;
         $this->cumulatif = $cumulatif_save;
   }
   //----- kadaluarsa
   function NM_sub_cons_kadaluarsa()
   {
         $this->kadaluarsa = substr($this->kadaluarsa, 0, 10);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->kadaluarsa;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "data";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $this->SC_date_conf_region;
         $this->Xls_col++;
   }
   //----- transaksi
   function NM_sub_cons_transaksi()
   {
      if (!empty($this->transaksi))
      {
         if (substr($this->transaksi, 10, 1) == "-") 
         { 
             $this->transaksi = substr($this->transaksi, 0, 10) . " " . substr($this->transaksi, 11);
         } 
         if (substr($this->transaksi, 13, 1) == ".") 
         { 
            $this->transaksi = substr($this->transaksi, 0, 13) . ":" . substr($this->transaksi, 14, 2) . ":" . substr($this->transaksi, 17);
         } 
         $conteudo_x =  $this->transaksi;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->transaksi, "YYYY-MM-DD HH:II:SS  ");
             $this->transaksi = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->transaksi))
         {
             $this->transaksi = sc_convert_encoding($this->transaksi, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->transaksi;
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
   //----- kategori
   function NM_sub_cons_kategori()
   {
         $this->kategori = html_entity_decode($this->kategori, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kategori = strip_tags($this->kategori);
         if (!NM_is_utf8($this->kategori))
         {
             $this->kategori = sc_convert_encoding($this->kategori, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->kategori;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- deskripsi
   function NM_sub_cons_deskripsi()
   {
         $this->deskripsi = html_entity_decode($this->deskripsi, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->deskripsi = strip_tags($this->deskripsi);
         if (!NM_is_utf8($this->deskripsi))
         {
             $this->deskripsi = sc_convert_encoding($this->deskripsi, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->deskripsi;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- masuk
   function NM_sub_cons_masuk()
   {
         if (!NM_is_utf8($this->masuk))
         {
             $this->masuk = sc_convert_encoding($this->masuk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->masuk;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- keluar
   function NM_sub_cons_keluar()
   {
         if (!NM_is_utf8($this->keluar))
         {
             $this->keluar = sc_convert_encoding($this->keluar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->keluar;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- kumulatif
   function NM_sub_cons_kumulatif()
   {
         if (!NM_is_utf8($this->kumulatif))
         {
             $this->kumulatif = sc_convert_encoding($this->kumulatif, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->kumulatif;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- cumulatif
   function NM_sub_cons_cumulatif()
   {
         $cumulatif_save = $this->cumulatif;
         if (!NM_is_utf8($this->cumulatif))
         {
             $this->cumulatif = sc_convert_encoding($this->cumulatif, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->cumulatif;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
         $this->cumulatif = $cumulatif_save;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['nolabel'])
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
 function quebra_deskripsi_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_deskripsi = true; 
   $tot_deskripsi[0] = $this->deskripsi;
   $contr_arr = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
   {
       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
       $TP_Time = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
       $temp_cmp = $this->Ini->Get_arg_groupby($TP_Time . $this->$cmp_gb, $Format_tst); 
       $contr_arr .= '["' . $temp_cmp . '"]';
       if ($cmp_gb == $Cmp_Name)
       {
           break;
       }
   }
   eval('$tot_deskripsi[1]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["kartu_stok"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[0];');
   eval('$tot_deskripsi[2]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["kartu_stok"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[1];');
   $$Var_name_gb = $tot_deskripsi;
   $conteudo = $tot_deskripsi[0] ;  
   $this->count_deskripsi = $tot_deskripsi[1];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->deskripsi); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['deskripsi']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['deskripsi']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Nama Item"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_deskripsi = false; 
 } 
   function quebra_deskripsi_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_deskripsi as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               if (!NM_is_utf8($temp_cmp)) {
                   $temp_cmp = sc_convert_encoding($temp_cmp, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida']) {
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
   function quebra_deskripsi_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['field_order'] as $Cada_cmp)
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida']) {
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
   function quebra_geral_sc_free_group_by_bot() 
   {
   }
   function quebra_geral__NM_SC__bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][0];
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "masuk" && (!isset($this->NM_cmp_hidden['masuk']) || $this->NM_cmp_hidden['masuk'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][2];
               $prim_cmp = false;
               if (!NM_is_utf8($Vl_Tot)) {
                   $Vl_Tot = sc_convert_encoding($Vl_Tot, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
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
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "keluar" && (!isset($this->NM_cmp_hidden['keluar']) || $this->NM_cmp_hidden['keluar'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][3];
               $prim_cmp = false;
               if (!NM_is_utf8($Vl_Tot)) {
                   $Vl_Tot = sc_convert_encoding($Vl_Tot, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
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
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "kumulatif" && (!isset($this->NM_cmp_hidden['kumulatif']) || $this->NM_cmp_hidden['kumulatif'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][4];
               $prim_cmp = false;
               if (!NM_is_utf8($Vl_Tot)) {
                   $Vl_Tot = sc_convert_encoding($Vl_Tot, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['embutida']) {
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

   function totaliza_php__NM_SC_()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      $seq_acum = 0;
      $this->cumulatif = 0;
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_acumalado'] = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),Kadaluarsa,102), '.', '-') + ' ' + convert(char(8),Kadaluarsa,20), str_replace (convert(char(10),Transaksi,102), '.', '-') + ' ' + convert(char(8),Transaksi,20), tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),Kadaluarsa,121), convert(char(23),Transaksi,121), tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT Kadaluarsa, Transaksi, tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(Kadaluarsa, YEAR TO DAY), EXTEND(Transaksi, YEAR TO FRACTION), tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT Kadaluarsa, Transaksi, tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_desc']; 
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
       $nmgp_order_by = " order by Kadaluarsa";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['order_grid'] = $nmgp_order_by;
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
         $this->kadaluarsa = $this->rs_grid->fields[0] ;  
         $this->transaksi = $this->rs_grid->fields[1] ;  
         $this->trancode = $this->rs_grid->fields[2] ;  
         $this->kategori = $this->rs_grid->fields[3] ;  
         $this->deskripsi = $this->rs_grid->fields[4] ;  
         $this->masuk = $this->rs_grid->fields[5] ;  
         $this->masuk = (strpos(strtolower($this->masuk), "e")) ? (float)$this->masuk : $this->masuk; 
         $this->masuk = (string)$this->masuk;  
         $this->keluar = $this->rs_grid->fields[6] ;  
         $this->keluar = (strpos(strtolower($this->keluar), "e")) ? (float)$this->keluar : $this->keluar; 
         $this->keluar = (string)$this->keluar;  
         $this->kumulatif = $this->rs_grid->fields[7] ;  
         $this->kumulatif = (strpos(strtolower($this->kumulatif), "e")) ? (float)$this->kumulatif : $this->kumulatif; 
         $this->kumulatif = (string)$this->kumulatif;  
         $deskripsi_orig = $this->deskripsi;
         $seq_acum++;
         $this->cumulatif += $this->kumulatif;
         $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_acumalado'][$seq_acum]['cumulatif'] = $this->cumulatif;
         $this->cumulatif = (strpos(strtolower($this->cumulatif), "e")) ? (float)$this->cumulatif : $this->cumulatif; 
         $this->cumulatif = (string)$this->cumulatif;  
         $this->arg_sum_deskripsi = " = " . $this->Db->qstr($this->deskripsi);
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->masuk)), NM_encode_input(sc_strip_script($this->keluar)), NM_encode_input(sc_strip_script($this->kumulatif)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["kartu_stok"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }


   function totaliza_php_sc_free_total()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      $seq_acum = 0;
      $this->cumulatif = 0;
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_acumalado'] = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),Kadaluarsa,102), '.', '-') + ' ' + convert(char(8),Kadaluarsa,20), str_replace (convert(char(10),Transaksi,102), '.', '-') + ' ' + convert(char(8),Transaksi,20), tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),Kadaluarsa,121), convert(char(23),Transaksi,121), tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT Kadaluarsa, Transaksi, tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(Kadaluarsa, YEAR TO DAY), EXTEND(Transaksi, YEAR TO FRACTION), tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT Kadaluarsa, Transaksi, tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_desc']; 
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
       $nmgp_order_by = " order by Kadaluarsa";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['order_grid'] = $nmgp_order_by;
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
         $this->kadaluarsa = $this->rs_grid->fields[0] ;  
         $this->transaksi = $this->rs_grid->fields[1] ;  
         $this->trancode = $this->rs_grid->fields[2] ;  
         $this->kategori = $this->rs_grid->fields[3] ;  
         $this->deskripsi = $this->rs_grid->fields[4] ;  
         $this->masuk = $this->rs_grid->fields[5] ;  
         $this->masuk = (strpos(strtolower($this->masuk), "e")) ? (float)$this->masuk : $this->masuk; 
         $this->masuk = (string)$this->masuk;  
         $this->keluar = $this->rs_grid->fields[6] ;  
         $this->keluar = (strpos(strtolower($this->keluar), "e")) ? (float)$this->keluar : $this->keluar; 
         $this->keluar = (string)$this->keluar;  
         $this->kumulatif = $this->rs_grid->fields[7] ;  
         $this->kumulatif = (strpos(strtolower($this->kumulatif), "e")) ? (float)$this->kumulatif : $this->kumulatif; 
         $this->kumulatif = (string)$this->kumulatif;  
         $deskripsi_orig = $this->deskripsi;
         $seq_acum++;
         $this->cumulatif += $this->kumulatif;
         $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_acumalado'][$seq_acum]['cumulatif'] = $this->cumulatif;
         $this->cumulatif = (strpos(strtolower($this->cumulatif), "e")) ? (float)$this->cumulatif : $this->cumulatif; 
         $this->cumulatif = (string)$this->cumulatif;  
         $this->arg_sum_deskripsi = " = " . $this->Db->qstr($this->deskripsi);
         $this->Res->adiciona_registro();
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["kartu_stok"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }


   function totaliza_php_sc_free_group_by()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      $seq_acum = 0;
      $this->cumulatif = 0;
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_acumalado'] = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),Kadaluarsa,102), '.', '-') + ' ' + convert(char(8),Kadaluarsa,20), str_replace (convert(char(10),Transaksi,102), '.', '-') + ' ' + convert(char(8),Transaksi,20), tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),Kadaluarsa,121), convert(char(23),Transaksi,121), tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT Kadaluarsa, Transaksi, tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(Kadaluarsa, YEAR TO DAY), EXTEND(Transaksi, YEAR TO FRACTION), tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT Kadaluarsa, Transaksi, tranCode, Kategori, Deskripsi, Masuk, Keluar, Kumulatif from (SELECT 	c.Kadaluarsa, 	c.Transaksi, 	c.tranCode, 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar,         c.Masuk-c.Keluar as Kumulatif FROM 	( 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		c.datangDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima*a.isi AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po         WHERE 		c.`status` = 'Selesai' UNION ALL 	SELECT 		a.exp_date AS Kadaluarsa, 		b.tglSo AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 		a.soCode AS tranCode, 		'Stock Opname' AS Kategori  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem UNION ALL 	SELECT 		a.expDate AS Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		currentStock AS Masuk, 		'INITIAL' AS tranCode, 		'Stok Awal' AS Kategori  	FROM 		tbstockobat a 		LEFT JOIN tbobat b ON b.kodeItem = a.kodeItem UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep Poliklinik' Kategori  	FROM 		tbreseprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Poliklinik' Kategori  	FROM 		tbbhprawatjalan a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		a.tranDate AS Transaksi, 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'BHP Rawat Inap' Kategori  	FROM 		tbbhprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.trandate AS Transaksi, 		c.namaitem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.trancode AS tranCode, 		'Pembelian Obat Bebas' Kategori  	FROM 		tbitemdrugsell a 		LEFT JOIN tbdrugsell b ON b.trancode = a.trancode 		LEFT JOIN tbobat c ON c.kodeItem = a.itemcode UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tranDate AS Transaksi, 		c.namaItem AS Deskripsi, 	IF 		( d.oper = '+', 0, a.jumlah ) AS Keluar, 	IF 		( d.oper = '+', a.jumlah, 0 ) AS Masuk, 		a.adjCode AS tranCode, 		'Stock Adjustment' Kategori  	FROM 		tbdetailadjustment a 		LEFT JOIN tbadjustment b ON b.adjCode = a.adjCode 		LEFT JOIN tbobat c ON c.kodeItem = a.item 		LEFT JOIN tbjenisadjustment d ON d.id = b.jenisAdj  	WHERE 		b.STATUS = '1' UNION ALL 	SELECT NULL AS 		Kadaluarsa, 		b.tglReq AS Transaksi, 		d.namaItem AS Deskripsi, 		a.realisasi AS Keluar, 		0 AS Masuk, 		a.kodeReq AS tranCode, 		'Mutasi Keluar' Kategori  	FROM 		tbdetailreqitem a 		LEFT JOIN tbreqitem b ON b.kodeReq = a.kodeReq 		LEFT JOIN tbdepo c ON c.kodeDepo = b.unit 		LEFT JOIN tbobat d ON d.kodeItem = a.item  	WHERE 		b.selesai = 'Y'  ) c  ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['ordem_desc']; 
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
       $nmgp_order_by = " order by Kadaluarsa";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['order_grid'] = $nmgp_order_by;
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
         $this->kadaluarsa = $this->rs_grid->fields[0] ;  
         $this->transaksi = $this->rs_grid->fields[1] ;  
         $this->trancode = $this->rs_grid->fields[2] ;  
         $this->kategori = $this->rs_grid->fields[3] ;  
         $this->deskripsi = $this->rs_grid->fields[4] ;  
         $this->masuk = $this->rs_grid->fields[5] ;  
         $this->masuk = (strpos(strtolower($this->masuk), "e")) ? (float)$this->masuk : $this->masuk; 
         $this->masuk = (string)$this->masuk;  
         $this->keluar = $this->rs_grid->fields[6] ;  
         $this->keluar = (strpos(strtolower($this->keluar), "e")) ? (float)$this->keluar : $this->keluar; 
         $this->keluar = (string)$this->keluar;  
         $this->kumulatif = $this->rs_grid->fields[7] ;  
         $this->kumulatif = (strpos(strtolower($this->kumulatif), "e")) ? (float)$this->kumulatif : $this->kumulatif; 
         $this->kumulatif = (string)$this->kumulatif;  
         $deskripsi_orig = $this->deskripsi;
         $contr_arr = "";
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
         {
             $temp       = $cmp_gb . "_orig";
             $contr_arr .= "['" . $$temp . "']";
         }
         $arr_name = "array_total_" . $cmp_gb . $contr_arr;
         $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_ult_qb'] = $cmp_gb;
         eval ('
           if (!isset($this->Res->' . $arr_name . '))
           {
               $this->cumulatif = 0;
           }
         ');
         $seq_acum++;
         $this->cumulatif += $this->kumulatif;
         $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_acumalado'][$seq_acum]['cumulatif'] = $this->cumulatif;
         $this->cumulatif = (strpos(strtolower($this->cumulatif), "e")) ? (float)$this->cumulatif : $this->cumulatif; 
         $this->cumulatif = (string)$this->cumulatif;  
         $this->arg_sum_deskripsi = " = " . $this->Db->qstr($this->deskripsi);
         $this->Res->adiciona_registro(sc_strip_script($this->deskripsi), sc_strip_script($deskripsi_orig));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["kartu_stok"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }

   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Kartu Stok Farmasi :: Excel</TITLE>
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
<form name="Fdown" method="get" action="kartu_stok_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="kartu_stok"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok']['xls_return']); ?>"> 
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
