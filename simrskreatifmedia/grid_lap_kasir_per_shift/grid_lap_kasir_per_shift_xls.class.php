<?php

class grid_lap_kasir_per_shift_xls
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
   var $sum_nominal;
   var $jenis_Old;
   var $arg_sum_jenis;
   var $Label_jenis;
   var $sc_proc_quebra_jenis;
   var $count_jenis;
   var $sum_jenis_nominal;
   var $kasir_Old;
   var $arg_sum_kasir;
   var $Label_kasir;
   var $sc_proc_quebra_kasir;
   var $count_kasir;
   var $sum_kasir_nominal;
   var $paiddate_Old;
   var $arg_sum_paiddate;
   var $Label_paiddate;
   var $sc_proc_quebra_paiddate;
   var $count_paiddate;
   var $sum_paiddate_nominal;
   var $custcode_Old;
   var $arg_sum_custcode;
   var $Label_custcode;
   var $sc_proc_quebra_custcode;
   var $count_custcode;
   var $sum_custcode_nominal;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['opcao'] = "";
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
      { 
          $this->Tem_xls_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_xls_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false || strpos(" " . $_REQUEST['SC_module_export'], "chart") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['SC_Gb_Free_cmp']))
          {
              $this->Tem_xls_res  = false;
          }
          if ($this->Tem_xls_res)
          { 
              require_once($this->Ini->path_aplicacao . "grid_lap_kasir_per_shift_res_xls.class.php");
              $this->Res_xls = new grid_lap_kasir_per_shift_res_xls();
              $this->prep_modulos("Res_xls");
          } 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_grid_lap_kasir_per_shift.zip";
          $this->Arquivo   .= "_grid_lap_kasir_per_shift" . $this->Xls_tp;
          $this->Tit_doc    = "grid_lap_kasir_per_shift" . $this->Xls_tp;
          $this->Tit_zip    = "grid_lap_kasir_per_shift.zip";
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
      require_once($this->Ini->path_aplicacao . "grid_lap_kasir_per_shift_total.class.php"); 
      $this->Tot = new grid_lap_kasir_per_shift_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['SC_Ind_Groupby'];
      $this->Tot->$Gb_geral();
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['tot_geral'][1];
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_lap_kasir_per_shift']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_return']);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['SC_Ind_Groupby'] == "Jenis")
      {
          $this->sum_nominal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['tot_geral'][2];
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_lap_kasir_per_shift']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_lap_kasir_per_shift']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_lap_kasir_per_shift']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->paiddate = $Busca_temp['paiddate']; 
          $tmp_pos = strpos($this->paiddate, "##@@");
          if ($tmp_pos !== false && !is_array($this->paiddate))
          {
              $this->paiddate = substr($this->paiddate, 0, $tmp_pos);
          }
          $this->paiddate_2 = $Busca_temp['paiddate_input_2']; 
          $this->kasir = $Busca_temp['kasir']; 
          $tmp_pos = strpos($this->kasir, "##@@");
          if ($tmp_pos !== false && !is_array($this->kasir))
          {
              $this->kasir = substr($this->kasir, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida_label'])
      { 
          $this->count_span = 0;
          $this->Xls_row++;
          $this->proc_label();
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT 	c.custCode, IF 	( 		c.deposit > 0, 		c.deposit, 	IF 		( c.jmlTagihan <= c.jmlBayar, c.jmlTagihan, c.jmlBayar )  	) AS Nominal, IF 	( 		c.deposit > 0, 		'DEPOSIT', 		( 		IF 			( c.jenisPayment LIKE \"KARTU%\", concat( ' EDC : ', COALESCE ( c.edc1, '' ) ), c.jenisPayment )  		)  	) AS Jenis, 	c.kasir,         c.paidDate, 	c.tranCode, 	c.noPayment FROM 	( 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Poli' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'IGD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_igd UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		IF 		( hrsDibayar > 0, ( jmlBayar - hrsDibayar ), jmlBayar ) AS jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Rawat Inap' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_ri         WHERE 		( jmlBayar != '0' OR deposit != '0' ) UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'LAB' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_lab UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'RAD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_rad UNION ALL 	SELECT                 custCode, 		jmlTagihan, 		jmlBayar, 		0 AS deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Obat' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment_obat UNION ALL 	SELECT 		custcode AS custCode, 		total AS jmlTagihan, 		total AS jmlBayar, 		0 AS deposit, 		trandate AS tranDate, 		jenisPayment,                 edc1, 		kasir, 		'Lain-lain' AS Kategori,                 trandate as paidDate, 		tranCode, 		tranCode as noPayment  	FROM 		tbpendapatanlain  	) c  WHERE 	(c.jmlBayar != '0' OR c.deposit != '0')) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT tranCode, noPayment, str_replace (convert(char(10),paidDate,102), '.', '-') + ' ' + convert(char(8),paidDate,20), custCode, Nominal, Jenis, kasir from (SELECT 	c.custCode, IF 	( 		c.deposit > 0, 		c.deposit, 	IF 		( c.jmlTagihan <= c.jmlBayar, c.jmlTagihan, c.jmlBayar )  	) AS Nominal, IF 	( 		c.deposit > 0, 		'DEPOSIT', 		( 		IF 			( c.jenisPayment LIKE \"KARTU%\", concat( ' EDC : ', COALESCE ( c.edc1, '' ) ), c.jenisPayment )  		)  	) AS Jenis, 	c.kasir,         c.paidDate, 	c.tranCode, 	c.noPayment FROM 	( 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Poli' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'IGD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_igd UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		IF 		( hrsDibayar > 0, ( jmlBayar - hrsDibayar ), jmlBayar ) AS jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Rawat Inap' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_ri         WHERE 		( jmlBayar != '0' OR deposit != '0' ) UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'LAB' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_lab UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'RAD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_rad UNION ALL 	SELECT                 custCode, 		jmlTagihan, 		jmlBayar, 		0 AS deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Obat' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment_obat UNION ALL 	SELECT 		custcode AS custCode, 		total AS jmlTagihan, 		total AS jmlBayar, 		0 AS deposit, 		trandate AS tranDate, 		jenisPayment,                 edc1, 		kasir, 		'Lain-lain' AS Kategori,                 trandate as paidDate, 		tranCode, 		tranCode as noPayment  	FROM 		tbpendapatanlain  	) c  WHERE 	(c.jmlBayar != '0' OR c.deposit != '0')) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tranCode, noPayment, paidDate, custCode, Nominal, Jenis, kasir from (SELECT 	c.custCode, IF 	( 		c.deposit > 0, 		c.deposit, 	IF 		( c.jmlTagihan <= c.jmlBayar, c.jmlTagihan, c.jmlBayar )  	) AS Nominal, IF 	( 		c.deposit > 0, 		'DEPOSIT', 		( 		IF 			( c.jenisPayment LIKE \"KARTU%\", concat( ' EDC : ', COALESCE ( c.edc1, '' ) ), c.jenisPayment )  		)  	) AS Jenis, 	c.kasir,         c.paidDate, 	c.tranCode, 	c.noPayment FROM 	( 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Poli' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'IGD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_igd UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		IF 		( hrsDibayar > 0, ( jmlBayar - hrsDibayar ), jmlBayar ) AS jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Rawat Inap' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_ri         WHERE 		( jmlBayar != '0' OR deposit != '0' ) UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'LAB' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_lab UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'RAD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_rad UNION ALL 	SELECT                 custCode, 		jmlTagihan, 		jmlBayar, 		0 AS deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Obat' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment_obat UNION ALL 	SELECT 		custcode AS custCode, 		total AS jmlTagihan, 		total AS jmlBayar, 		0 AS deposit, 		trandate AS tranDate, 		jenisPayment,                 edc1, 		kasir, 		'Lain-lain' AS Kategori,                 trandate as paidDate, 		tranCode, 		tranCode as noPayment  	FROM 		tbpendapatanlain  	) c  WHERE 	(c.jmlBayar != '0' OR c.deposit != '0')) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT tranCode, noPayment, convert(char(23),paidDate,121), custCode, Nominal, Jenis, kasir from (SELECT 	c.custCode, IF 	( 		c.deposit > 0, 		c.deposit, 	IF 		( c.jmlTagihan <= c.jmlBayar, c.jmlTagihan, c.jmlBayar )  	) AS Nominal, IF 	( 		c.deposit > 0, 		'DEPOSIT', 		( 		IF 			( c.jenisPayment LIKE \"KARTU%\", concat( ' EDC : ', COALESCE ( c.edc1, '' ) ), c.jenisPayment )  		)  	) AS Jenis, 	c.kasir,         c.paidDate, 	c.tranCode, 	c.noPayment FROM 	( 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Poli' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'IGD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_igd UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		IF 		( hrsDibayar > 0, ( jmlBayar - hrsDibayar ), jmlBayar ) AS jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Rawat Inap' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_ri         WHERE 		( jmlBayar != '0' OR deposit != '0' ) UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'LAB' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_lab UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'RAD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_rad UNION ALL 	SELECT                 custCode, 		jmlTagihan, 		jmlBayar, 		0 AS deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Obat' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment_obat UNION ALL 	SELECT 		custcode AS custCode, 		total AS jmlTagihan, 		total AS jmlBayar, 		0 AS deposit, 		trandate AS tranDate, 		jenisPayment,                 edc1, 		kasir, 		'Lain-lain' AS Kategori,                 trandate as paidDate, 		tranCode, 		tranCode as noPayment  	FROM 		tbpendapatanlain  	) c  WHERE 	(c.jmlBayar != '0' OR c.deposit != '0')) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tranCode, noPayment, paidDate, custCode, Nominal, Jenis, kasir from (SELECT 	c.custCode, IF 	( 		c.deposit > 0, 		c.deposit, 	IF 		( c.jmlTagihan <= c.jmlBayar, c.jmlTagihan, c.jmlBayar )  	) AS Nominal, IF 	( 		c.deposit > 0, 		'DEPOSIT', 		( 		IF 			( c.jenisPayment LIKE \"KARTU%\", concat( ' EDC : ', COALESCE ( c.edc1, '' ) ), c.jenisPayment )  		)  	) AS Jenis, 	c.kasir,         c.paidDate, 	c.tranCode, 	c.noPayment FROM 	( 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Poli' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'IGD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_igd UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		IF 		( hrsDibayar > 0, ( jmlBayar - hrsDibayar ), jmlBayar ) AS jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Rawat Inap' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_ri         WHERE 		( jmlBayar != '0' OR deposit != '0' ) UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'LAB' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_lab UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'RAD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_rad UNION ALL 	SELECT                 custCode, 		jmlTagihan, 		jmlBayar, 		0 AS deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Obat' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment_obat UNION ALL 	SELECT 		custcode AS custCode, 		total AS jmlTagihan, 		total AS jmlBayar, 		0 AS deposit, 		trandate AS tranDate, 		jenisPayment,                 edc1, 		kasir, 		'Lain-lain' AS Kategori,                 trandate as paidDate, 		tranCode, 		tranCode as noPayment  	FROM 		tbpendapatanlain  	) c  WHERE 	(c.jmlBayar != '0' OR c.deposit != '0')) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT tranCode, noPayment, EXTEND(paidDate, YEAR TO FRACTION), custCode, Nominal, Jenis, kasir from (SELECT 	c.custCode, IF 	( 		c.deposit > 0, 		c.deposit, 	IF 		( c.jmlTagihan <= c.jmlBayar, c.jmlTagihan, c.jmlBayar )  	) AS Nominal, IF 	( 		c.deposit > 0, 		'DEPOSIT', 		( 		IF 			( c.jenisPayment LIKE \"KARTU%\", concat( ' EDC : ', COALESCE ( c.edc1, '' ) ), c.jenisPayment )  		)  	) AS Jenis, 	c.kasir,         c.paidDate, 	c.tranCode, 	c.noPayment FROM 	( 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Poli' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'IGD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_igd UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		IF 		( hrsDibayar > 0, ( jmlBayar - hrsDibayar ), jmlBayar ) AS jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Rawat Inap' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_ri         WHERE 		( jmlBayar != '0' OR deposit != '0' ) UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'LAB' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_lab UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'RAD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_rad UNION ALL 	SELECT                 custCode, 		jmlTagihan, 		jmlBayar, 		0 AS deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Obat' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment_obat UNION ALL 	SELECT 		custcode AS custCode, 		total AS jmlTagihan, 		total AS jmlBayar, 		0 AS deposit, 		trandate AS tranDate, 		jenisPayment,                 edc1, 		kasir, 		'Lain-lain' AS Kategori,                 trandate as paidDate, 		tranCode, 		tranCode as noPayment  	FROM 		tbpendapatanlain  	) c  WHERE 	(c.jmlBayar != '0' OR c.deposit != '0')) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT tranCode, noPayment, paidDate, custCode, Nominal, Jenis, kasir from (SELECT 	c.custCode, IF 	( 		c.deposit > 0, 		c.deposit, 	IF 		( c.jmlTagihan <= c.jmlBayar, c.jmlTagihan, c.jmlBayar )  	) AS Nominal, IF 	( 		c.deposit > 0, 		'DEPOSIT', 		( 		IF 			( c.jenisPayment LIKE \"KARTU%\", concat( ' EDC : ', COALESCE ( c.edc1, '' ) ), c.jenisPayment )  		)  	) AS Jenis, 	c.kasir,         c.paidDate, 	c.tranCode, 	c.noPayment FROM 	( 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Poli' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'IGD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_igd UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		IF 		( hrsDibayar > 0, ( jmlBayar - hrsDibayar ), jmlBayar ) AS jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Rawat Inap' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_ri         WHERE 		( jmlBayar != '0' OR deposit != '0' ) UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'LAB' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_lab UNION ALL 	SELECT 		custCode, 		jmlTagihan, 		jmlBayar, 		deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'RAD' AS Kategori,                 paidDate, 		tranCode, 		noPayment  	FROM 		tbpayment_rad UNION ALL 	SELECT                 custCode, 		jmlTagihan, 		jmlBayar, 		0 AS deposit, 		tranDate, 		jenisPayment, 		edc1, 		kasir, 		'Obat' AS Kategori,                 paidDate, 		tranCode, 		noPayment 	FROM 		tbpayment_obat UNION ALL 	SELECT 		custcode AS custCode, 		total AS jmlTagihan, 		total AS jmlBayar, 		0 AS deposit, 		trandate AS tranDate, 		jenisPayment,                 edc1, 		kasir, 		'Lain-lain' AS Kategori,                 trandate as paidDate, 		tranCode, 		tranCode as noPayment  	FROM 		tbpendapatanlain  	) c  WHERE 	(c.jmlBayar != '0' OR c.deposit != '0')) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['order_grid'];
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Xls_col = 0;
         $this->Xls_row++;
         $this->trancode = $rs->fields[0] ;  
         $this->nopayment = $rs->fields[1] ;  
         $this->paiddate = $rs->fields[2] ;  
         $this->custcode = $rs->fields[3] ;  
         $this->nominal = $rs->fields[4] ;  
         $this->nominal =  str_replace(",", ".", $this->nominal);
         $this->nominal = (string)$this->nominal;
         $this->jenis = $rs->fields[5] ;  
         $this->kasir = $rs->fields[6] ;  
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['SC_Ind_Groupby'] == "Jenis")
         {
             $Format_tst = $this->Ini->Get_Gb_date_format('Jenis', 'paiddate');
             $TP_Time     = (in_array('paiddate', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
             $this->arg_sum_paiddate = $this->Ini->Get_date_arg_sum($TP_Time . $this->paiddate, $Format_tst, "paidDate");
             if (empty($this->paiddate))
             {
                 $this->Tot->Sc_groupby_paiddate = "paidDate";
             }
             else
             {
                 $this->Tot->Sc_groupby_paiddate = $this->Ini->Get_sql_date_groupby("paidDate", $Format_tst);
             }
         }
         $this->arg_sum_custcode = " = " . $this->Db->qstr($this->custcode);
         $this->arg_sum_jenis = " = " . $this->Db->qstr($this->jenis);
         $this->arg_sum_kasir = " = " . $this->Db->qstr($this->kasir);
          if ($this->jenis !== $this->jenis_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['SC_Ind_Groupby'] == "Jenis") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->custcode_Old = $this->custcode ; 
              $this->quebra_custcode_Jenis($this->jenis, $this->kasir, $this->paiddate, $this->custcode) ; 
              $Format_tst = $this->Ini->Get_Gb_date_format('Jenis', 'paiddate');
              $TP_Time = (in_array('jenis', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->paiddate_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->paiddate, $Format_tst);
              $this->quebra_paiddate_Jenis($this->jenis, $this->kasir, $this->paiddate) ; 
              $this->kasir_Old = $this->kasir ; 
              $this->quebra_kasir_Jenis($this->jenis, $this->kasir) ; 
              $this->jenis_Old = $this->jenis ; 
              $this->quebra_jenis_Jenis($this->jenis) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->jenis_Old))
              {
                 $this->quebra_jenis_Jenis_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if (isset($this->kasir_Old))
              {
                 $this->quebra_kasir_Jenis_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if (isset($this->paiddate_Old))
              {
                 $this->quebra_paiddate_Jenis_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if (isset($this->custcode_Old))
              {
                 $this->quebra_custcode_Jenis_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->kasir !== $this->kasir_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['SC_Ind_Groupby'] == "Jenis") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->custcode_Old = $this->custcode ; 
              $this->quebra_custcode_Jenis($this->jenis, $this->kasir, $this->paiddate, $this->custcode) ; 
              $Format_tst = $this->Ini->Get_Gb_date_format('Jenis', 'paiddate');
              $TP_Time = (in_array('kasir', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->paiddate_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->paiddate, $Format_tst);
              $this->quebra_paiddate_Jenis($this->jenis, $this->kasir, $this->paiddate) ; 
              $this->kasir_Old = $this->kasir ; 
              $this->quebra_kasir_Jenis($this->jenis, $this->kasir) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->kasir_Old))
              {
                 $this->quebra_kasir_Jenis_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if (isset($this->paiddate_Old))
              {
                 $this->quebra_paiddate_Jenis_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if (isset($this->custcode_Old))
              {
                 $this->quebra_custcode_Jenis_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          $Format_tst = $this->Ini->Get_Gb_date_format('Jenis', 'paiddate');
          $TP_Time = (in_array('paiddate', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_tst    = $this->Ini->Get_arg_groupby($TP_Time . $this->paiddate, $Format_tst);
          if ($Cmp_tst != $this->paiddate_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['SC_Ind_Groupby'] == "Jenis") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->custcode_Old = $this->custcode ; 
              $this->quebra_custcode_Jenis($this->jenis, $this->kasir, $this->paiddate, $this->custcode) ; 
              $Format_tst = $this->Ini->Get_Gb_date_format('Jenis', 'paiddate');
              $TP_Time = (in_array('paiddate', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->paiddate_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->paiddate, $Format_tst);
              $this->quebra_paiddate_Jenis($this->jenis, $this->kasir, $this->paiddate) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->paiddate_Old))
              {
                 $this->quebra_paiddate_Jenis_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if (isset($this->custcode_Old))
              {
                 $this->quebra_custcode_Jenis_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->custcode !== $this->custcode_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['SC_Ind_Groupby'] == "Jenis") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->custcode_Old = $this->custcode ; 
              $this->quebra_custcode_Jenis($this->jenis, $this->kasir, $this->paiddate, $this->custcode) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->custcode_Old))
              {
                 $this->quebra_custcode_Jenis_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
     if ($this->groupby_show == "S") {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
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
         //----- lookup - custcode
         $this->look_custcode = $this->custcode; 
         $this->Lookup->lookup_custcode($this->look_custcode, $this->custcode) ; 
         $this->look_custcode = ($this->look_custcode == "&nbsp;") ? "" : $this->look_custcode; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
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
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'] && $prim_reg)
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
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if ($this->groupby_show == "S") {
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
      { 
          if ($this->Tem_xls_res)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_res_grid'] = true;
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
                  $Xls_res = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_res_sheet']);
              }
              else {
                  $Xls_res = PHPExcel_IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_res_sheet']);
              }
              foreach($Xls_res->getAllSheets() as $sheet)
              {
                  $this->Xls_dados->addExternalSheet($sheet);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_res_sheet']);
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Kode Pelayanan"; 
          if ($Cada_col == "trancode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
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
          $SC_Label = (isset($this->New_label['nopayment'])) ? $this->New_label['nopayment'] : "No Pembayaran"; 
          if ($Cada_col == "nopayment" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
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
          $SC_Label = (isset($this->New_label['paiddate'])) ? $this->New_label['paiddate'] : "Tgl. Bayar"; 
          if ($Cada_col == "paiddate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
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
          $SC_Label = (isset($this->New_label['custcode'])) ? $this->New_label['custcode'] : "Pasien"; 
          if ($Cada_col == "custcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
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
          $SC_Label = (isset($this->New_label['nominal'])) ? $this->New_label['nominal'] : "Nominal"; 
          if ($Cada_col == "nominal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
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
          $SC_Label = (isset($this->New_label['kasir'])) ? $this->New_label['kasir'] : "Kasir"; 
          if ($Cada_col == "kasir" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida'])
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
   //----- nopayment
   function NM_export_nopayment()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->nopayment = html_entity_decode($this->nopayment, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nopayment = strip_tags($this->nopayment);
         if (!NM_is_utf8($this->nopayment))
         {
             $this->nopayment = sc_convert_encoding($this->nopayment, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->nopayment, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->nopayment, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- paiddate
   function NM_export_paiddate()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->paiddate))
      {
             if (substr($this->paiddate, 10, 1) == "-") 
             { 
                 $this->paiddate = substr($this->paiddate, 0, 10) . " " . substr($this->paiddate, 11);
             } 
             if (substr($this->paiddate, 13, 1) == ".") 
             { 
                $this->paiddate = substr($this->paiddate, 0, 13) . ":" . substr($this->paiddate, 14, 2) . ":" . substr($this->paiddate, 17);
             } 
             $conteudo_x =  $this->paiddate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->paiddate, "YYYY-MM-DD HH:II:SS  ");
                 $this->paiddate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      }
         if (!NM_is_utf8($this->paiddate))
         {
             $this->paiddate = sc_convert_encoding($this->paiddate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->paiddate, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->paiddate, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- custcode
   function NM_export_custcode()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_custcode = html_entity_decode($this->look_custcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_custcode = strip_tags($this->look_custcode);
         if (!NM_is_utf8($this->look_custcode))
         {
             $this->look_custcode = sc_convert_encoding($this->look_custcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_custcode, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_custcode, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- nominal
   function NM_export_nominal()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->nominal))
         {
             $this->nominal = sc_convert_encoding($this->nominal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->nominal))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->nominal);
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
   //----- kasir
   function NM_export_kasir()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->kasir = html_entity_decode($this->kasir, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kasir = strip_tags($this->kasir);
         if (!NM_is_utf8($this->kasir))
         {
             $this->kasir = sc_convert_encoding($this->kasir, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->kasir, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->kasir, PHPExcel_Cell_DataType::TYPE_STRING);
         }
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
   //----- nopayment
   function NM_sub_cons_nopayment()
   {
         $this->nopayment = html_entity_decode($this->nopayment, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nopayment = strip_tags($this->nopayment);
         if (!NM_is_utf8($this->nopayment))
         {
             $this->nopayment = sc_convert_encoding($this->nopayment, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->nopayment;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- paiddate
   function NM_sub_cons_paiddate()
   {
      if (!empty($this->paiddate))
      {
         if (substr($this->paiddate, 10, 1) == "-") 
         { 
             $this->paiddate = substr($this->paiddate, 0, 10) . " " . substr($this->paiddate, 11);
         } 
         if (substr($this->paiddate, 13, 1) == ".") 
         { 
            $this->paiddate = substr($this->paiddate, 0, 13) . ":" . substr($this->paiddate, 14, 2) . ":" . substr($this->paiddate, 17);
         } 
         $conteudo_x =  $this->paiddate;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->paiddate, "YYYY-MM-DD HH:II:SS  ");
             $this->paiddate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->paiddate))
         {
             $this->paiddate = sc_convert_encoding($this->paiddate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->paiddate;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- custcode
   function NM_sub_cons_custcode()
   {
         $this->look_custcode = html_entity_decode($this->look_custcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_custcode = strip_tags($this->look_custcode);
         if (!NM_is_utf8($this->look_custcode))
         {
             $this->look_custcode = sc_convert_encoding($this->look_custcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_custcode;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- nominal
   function NM_sub_cons_nominal()
   {
         if (!NM_is_utf8($this->nominal))
         {
             $this->nominal = sc_convert_encoding($this->nominal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->nominal;
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
   //----- kasir
   function NM_sub_cons_kasir()
   {
         $this->kasir = html_entity_decode($this->kasir, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kasir = strip_tags($this->kasir);
         if (!NM_is_utf8($this->kasir))
         {
             $this->kasir = sc_convert_encoding($this->kasir, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->kasir;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['nolabel'])
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
 function quebra_jenis_Jenis($jenis) 
 {
   global $tot_jenis;
   $this->sc_proc_quebra_kasir = false;
   $this->sc_proc_quebra_paiddate = false;
   $this->sc_proc_quebra_custcode = false;
   $this->sc_proc_quebra_jenis = true; 
   $this->Tot->quebra_jenis_Jenis($jenis, $this->arg_sum_jenis);
   $conteudo = $tot_jenis[0] ;  
   $this->count_jenis = $tot_jenis[1];
   $this->sum_jenis_nominal = $tot_jenis[2];
   $this->campos_quebra_jenis = array(); 
   $conteudo = sc_strip_script($this->jenis); 
   $this->campos_quebra_jenis[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['jenis']))
   {
       $this->campos_quebra_jenis[0]['lab'] = $this->nmgp_label_quebras['jenis']; 
   }
   else
   {
   $this->campos_quebra_jenis[0]['lab'] = "Jenis"; 
   }
   $this->sc_proc_quebra_jenis = false; 
 } 
 function quebra_kasir_Jenis($jenis, $kasir) 
 {
   global $tot_kasir;
   $this->sc_proc_quebra_jenis = false;
   $this->sc_proc_quebra_paiddate = false;
   $this->sc_proc_quebra_custcode = false;
   $this->sc_proc_quebra_kasir = true; 
   $this->Tot->quebra_kasir_Jenis($jenis, $kasir, $this->arg_sum_jenis, $this->arg_sum_kasir);
   $conteudo = $tot_kasir[0] ;  
   $this->count_kasir = $tot_kasir[1];
   $this->sum_kasir_nominal = $tot_kasir[2];
   $this->campos_quebra_kasir = array(); 
   $conteudo = sc_strip_script($this->kasir); 
   $this->campos_quebra_kasir[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['kasir']))
   {
       $this->campos_quebra_kasir[0]['lab'] = $this->nmgp_label_quebras['kasir']; 
   }
   else
   {
   $this->campos_quebra_kasir[0]['lab'] = "Kasir"; 
   }
   $this->sc_proc_quebra_kasir = false; 
 } 
 function quebra_paiddate_Jenis($jenis, $kasir, $paiddate) 
 {
   global $tot_paiddate;
   $this->sc_proc_quebra_jenis = false;
   $this->sc_proc_quebra_kasir = false;
   $this->sc_proc_quebra_custcode = false;
   $TP_Time = (in_array('paiddate', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $paiddate = $this->Ini->Get_arg_groupby($TP_Time . $paiddate, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_paiddate = true; 
   $this->Tot->quebra_paiddate_Jenis($jenis, $kasir, $paiddate, $this->arg_sum_jenis, $this->arg_sum_kasir, $this->arg_sum_paiddate);
   $conteudo = $tot_paiddate[0] ;  
   $this->count_paiddate = $tot_paiddate[1];
   $this->sum_paiddate_nominal = $tot_paiddate[2];
   $this->campos_quebra_paiddate = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->paiddate)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('Jenis', 'paiddate');
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('Jenis', 'paiddate');
   $TP_Time    = (in_array('paiddate', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $this->campos_quebra_paiddate[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['paiddate']))
   {
       $this->campos_quebra_paiddate[0]['lab'] = $this->nmgp_label_quebras['paiddate']; 
   }
   else
   {
   $this->campos_quebra_paiddate[0]['lab'] = "Tgl. Bayar"; 
   }
   $this->sc_proc_quebra_paiddate = false; 
 } 
 function quebra_custcode_Jenis($jenis, $kasir, $paiddate, $custcode) 
 {
   global $tot_custcode;
   $this->sc_proc_quebra_jenis = false;
   $this->sc_proc_quebra_kasir = false;
   $this->sc_proc_quebra_paiddate = false;
   $this->sc_proc_quebra_custcode = true; 
   $this->Tot->quebra_custcode_Jenis($jenis, $kasir, $paiddate, $custcode, $this->arg_sum_jenis, $this->arg_sum_kasir, $this->arg_sum_paiddate, $this->arg_sum_custcode);
   $conteudo = $tot_custcode[0] ;  
   $this->count_custcode = $tot_custcode[1];
   $this->sum_custcode_nominal = $tot_custcode[2];
   $this->campos_quebra_custcode = array(); 
   $conteudo = sc_strip_script($this->custcode); 
   $this->Lookup->lookup_Jenis_custcode($conteudo , $this->custcode) ; 
   $this->campos_quebra_custcode[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['custcode']))
   {
       $this->campos_quebra_custcode[0]['lab'] = $this->nmgp_label_quebras['custcode']; 
   }
   else
   {
   $this->campos_quebra_custcode[0]['lab'] = "Pasien"; 
   }
   $this->sc_proc_quebra_custcode = false; 
 } 
   function quebra_jenis_Jenis_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_jenis as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               if (!NM_is_utf8($temp_cmp)) {
                   $temp_cmp = sc_convert_encoding($temp_cmp, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
   function quebra_jenis_Jenis_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['field_order'] as $Cada_cmp)
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
   function quebra_kasir_Jenis_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_kasir as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               if (!NM_is_utf8($temp_cmp)) {
                   $temp_cmp = sc_convert_encoding($temp_cmp, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
   function quebra_kasir_Jenis_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['field_order'] as $Cada_cmp)
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
   function quebra_paiddate_Jenis_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_paiddate as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               if (!NM_is_utf8($temp_cmp)) {
                   $temp_cmp = sc_convert_encoding($temp_cmp, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
   function quebra_paiddate_Jenis_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['field_order'] as $Cada_cmp)
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
   function quebra_custcode_Jenis_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_custcode as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               if (!NM_is_utf8($temp_cmp)) {
                   $temp_cmp = sc_convert_encoding($temp_cmp, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
   function quebra_custcode_Jenis_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['field_order'] as $Cada_cmp)
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['embutida']) {
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
   function quebra_geral_Jenis_bot() 
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
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="grid_lap_kasir_per_shift_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_lap_kasir_per_shift"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_kasir_per_shift']['xls_return']); ?>"> 
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
