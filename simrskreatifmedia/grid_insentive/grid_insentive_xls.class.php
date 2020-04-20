<?php

class grid_insentive_xls
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
   var $sum_insentive;
   var $tgltindakan_Old;
   var $arg_sum_tgltindakan;
   var $Label_tgltindakan;
   var $sc_proc_quebra_tgltindakan;
   var $count_tgltindakan;
   var $sum_tgltindakan_insentive;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida']) {
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['opcao'] = "";
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
      { 
          $this->Tem_xls_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_xls_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false || strpos(" " . $_REQUEST['SC_module_export'], "chart") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['SC_Gb_Free_cmp']))
          {
              $this->Tem_xls_res  = false;
          }
          if ($this->Tem_xls_res)
          { 
              require_once($this->Ini->path_aplicacao . "grid_insentive_res_xls.class.php");
              $this->Res_xls = new grid_insentive_res_xls();
              $this->prep_modulos("Res_xls");
          } 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_grid_insentive.zip";
          $this->Arquivo   .= "_grid_insentive" . $this->Xls_tp;
          $this->Tit_doc    = "grid_insentive" . $this->Xls_tp;
          $this->Tit_zip    = "grid_insentive.zip";
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
      require_once($this->Ini->path_aplicacao . "grid_insentive_total.class.php"); 
      $this->Tot = new grid_insentive_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['SC_Ind_Groupby'];
      $this->Tot->$Gb_geral();
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['tot_geral'][1];
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_insentive']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_return']);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['SC_Ind_Groupby'] == "byTanggal")
      {
          $this->sum_insentive = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['tot_geral'][2];
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_insentive']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_insentive']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_insentive']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->tgltindakan = $Busca_temp['tgltindakan']; 
          $tmp_pos = strpos($this->tgltindakan, "##@@");
          if ($tmp_pos !== false && !is_array($this->tgltindakan))
          {
              $this->tgltindakan = substr($this->tgltindakan, 0, $tmp_pos);
          }
          $this->tgltindakan_2 = $Busca_temp['tgltindakan_input_2']; 
          $this->dokcode = $Busca_temp['dokcode']; 
          $tmp_pos = strpos($this->dokcode, "##@@");
          if ($tmp_pos !== false && !is_array($this->dokcode))
          {
              $this->dokcode = substr($this->dokcode, 0, $tmp_pos);
          }
          $this->deskripsi = $Busca_temp['deskripsi']; 
          $tmp_pos = strpos($this->deskripsi, "##@@");
          if ($tmp_pos !== false && !is_array($this->deskripsi))
          {
              $this->deskripsi = substr($this->deskripsi, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida_label'])
      { 
          $this->count_span = 0;
          $this->Xls_row++;
          $this->proc_label();
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT 	a.Kode, 	a.Tindakan, 	a.Insentive, 	a.Diskon, 	a.tglTindakan, 	concat( 		d.gelar, 		d.`name`, 		', ', 		d.spec 	) AS dokCode, 	concat( 		c.`name`, 		', ', 		c.salut, 		' (', 		c.custCode, 		')' 	) AS Pasien, 	a.Deskripsi FROM 	( 		SELECT 			a.tranCode AS Kode, 			a.tindakan AS Tindakan, 			f.tarif*(80/100) AS Insentive, 			a.diskon AS Diskon, 			a.tglTindakan AS tglTindakan, 			b.dokter AS dokCode, 			b.custCode AS namaPasien, 			'Tind. Poli' Deskripsi, 			a.id AS noID 		FROM 			tbtindakanrawatjalan a 		LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode 		LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 		LEFT JOIN tbdoctor d ON d.docCode = b.dokter 		LEFT JOIN tbpoli e ON e.polyCode = d.poli 		LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 		AND c.jenisTindakan = e.`name` 		GROUP BY 			a.id 		UNION ALL 			SELECT 				a.tranCode AS Kode, 				a.tindakan AS Tindakan, 				g.tarif*(80/100) AS Insentive, 				a.diskon AS Diskon, 				a.tglTindakan AS tglTindakan, 				b.dokter AS dokCode, 				b.custCode AS namaPasien, 				'Visite Ranap' Deskripsi, 				a.id AS noID 			FROM 				tbtindakanrawatinap a 			LEFT JOIN tbdetailrawatinap b ON b.tranCode = a.tranCode 			LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 			LEFT JOIN tbdoctor d ON d.docCode = b.dokter 			LEFT JOIN tbpoli e ON e.polyCode = d.poli 			LEFT JOIN tbadmrawatinap f ON f.tranCode = b.tranCode 			LEFT JOIN tbtarifri g ON g.kodeTindakan = c.kodeTindakan 			AND c.jenisTindakan = e.`name` 			AND g.kelas = f.kelas 			GROUP BY 				a.id 			UNION ALL 				SELECT 					a.tranCode AS Kode, 					a.tindakan AS Tindakan, 					f.tarif*(80/100) AS Insentive, 					a.diskon AS Diskon, 					a.tglTindakan AS tglTindakan, 					a.pelaksana AS dokCode, 					b.custCode AS namaPasien, 					'IGD' Deskripsi, 					a.id AS noID 				FROM 					tbtindakanigd a 				LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 				LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 				LEFT JOIN tbdoctor d ON d.docCode = b.dokter 				LEFT JOIN tbpoli e ON e.polyCode = d.poli 				LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 				AND c.jenisTindakan = e.`name` 				GROUP BY 					a.id 				UNION ALL 					SELECT 						a.trancode AS Kode, 						a.actname AS Tindakan, 						f.tarif AS Insentive, 						a.disc AS Diskon, 						b.tranDate AS tglTindakan, 						b.custCode AS namaPasien, 						a. CODE AS dokCode, 						'Tind. OK' Deskripsi, 						a.id AS noID 					FROM 						tbtim a 					LEFT JOIN tbdetailok b ON b.trancode = a.trancode 					LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 					LEFT JOIN tbdoctor d ON d.docCode = a.`code` 					LEFT JOIN tbpoli e ON e.polyCode = d.poli 					LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 					AND c.jenisTindakan = e.`name` 					AND f.kelas = b.class 					GROUP BY 						a.id 					UNION ALL 						SELECT 							a.trancode AS Kode, 							a.actname AS Tindakan, 							f.tarif*(80/100) AS Insentive, 							a.disc AS Diskon, 							b.tranDate AS tglTindakan, 							a. CODE AS dokCode, 							b.custCode AS namaPasien, 							'Tind. VK' Deskripsi, 							a.id AS noID 						FROM 							tbtim a 						LEFT JOIN tbdetailvk b ON b.trancode = a.trancode 						LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 						LEFT JOIN tbdoctor d ON d.docCode = a.`code` 						LEFT JOIN tbpoli e ON e.polyCode = d.poli 						LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 						AND c.jenisTindakan = e.`name` 						AND f.kelas = b.class 						GROUP BY 							a.id 	) a LEFT JOIN tbtindakan b ON b.kodeTindakan = a.Tindakan LEFT JOIN tbcustomer c ON c.custCode = a.namaPasien LEFT JOIN tbdoctor d ON d.docCode = a.dokCode WHERE 	a.Tindakan NOT LIKE 'SARANA%' ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),tglTindakan,102), '.', '-') + ' ' + convert(char(8),tglTindakan,20), dokCode, Tindakan, Pasien, Kode, Deskripsi, Insentive, Diskon from (SELECT 	a.Kode, 	a.Tindakan, 	a.Insentive, 	a.Diskon, 	a.tglTindakan, 	concat( 		d.gelar, 		d.`name`, 		', ', 		d.spec 	) AS dokCode, 	concat( 		c.`name`, 		', ', 		c.salut, 		' (', 		c.custCode, 		')' 	) AS Pasien, 	a.Deskripsi FROM 	( 		SELECT 			a.tranCode AS Kode, 			a.tindakan AS Tindakan, 			f.tarif*(80/100) AS Insentive, 			a.diskon AS Diskon, 			a.tglTindakan AS tglTindakan, 			b.dokter AS dokCode, 			b.custCode AS namaPasien, 			'Tind. Poli' Deskripsi, 			a.id AS noID 		FROM 			tbtindakanrawatjalan a 		LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode 		LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 		LEFT JOIN tbdoctor d ON d.docCode = b.dokter 		LEFT JOIN tbpoli e ON e.polyCode = d.poli 		LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 		AND c.jenisTindakan = e.`name` 		GROUP BY 			a.id 		UNION ALL 			SELECT 				a.tranCode AS Kode, 				a.tindakan AS Tindakan, 				g.tarif*(80/100) AS Insentive, 				a.diskon AS Diskon, 				a.tglTindakan AS tglTindakan, 				b.dokter AS dokCode, 				b.custCode AS namaPasien, 				'Visite Ranap' Deskripsi, 				a.id AS noID 			FROM 				tbtindakanrawatinap a 			LEFT JOIN tbdetailrawatinap b ON b.tranCode = a.tranCode 			LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 			LEFT JOIN tbdoctor d ON d.docCode = b.dokter 			LEFT JOIN tbpoli e ON e.polyCode = d.poli 			LEFT JOIN tbadmrawatinap f ON f.tranCode = b.tranCode 			LEFT JOIN tbtarifri g ON g.kodeTindakan = c.kodeTindakan 			AND c.jenisTindakan = e.`name` 			AND g.kelas = f.kelas 			GROUP BY 				a.id 			UNION ALL 				SELECT 					a.tranCode AS Kode, 					a.tindakan AS Tindakan, 					f.tarif*(80/100) AS Insentive, 					a.diskon AS Diskon, 					a.tglTindakan AS tglTindakan, 					a.pelaksana AS dokCode, 					b.custCode AS namaPasien, 					'IGD' Deskripsi, 					a.id AS noID 				FROM 					tbtindakanigd a 				LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 				LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 				LEFT JOIN tbdoctor d ON d.docCode = b.dokter 				LEFT JOIN tbpoli e ON e.polyCode = d.poli 				LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 				AND c.jenisTindakan = e.`name` 				GROUP BY 					a.id 				UNION ALL 					SELECT 						a.trancode AS Kode, 						a.actname AS Tindakan, 						f.tarif AS Insentive, 						a.disc AS Diskon, 						b.tranDate AS tglTindakan, 						b.custCode AS namaPasien, 						a. CODE AS dokCode, 						'Tind. OK' Deskripsi, 						a.id AS noID 					FROM 						tbtim a 					LEFT JOIN tbdetailok b ON b.trancode = a.trancode 					LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 					LEFT JOIN tbdoctor d ON d.docCode = a.`code` 					LEFT JOIN tbpoli e ON e.polyCode = d.poli 					LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 					AND c.jenisTindakan = e.`name` 					AND f.kelas = b.class 					GROUP BY 						a.id 					UNION ALL 						SELECT 							a.trancode AS Kode, 							a.actname AS Tindakan, 							f.tarif*(80/100) AS Insentive, 							a.disc AS Diskon, 							b.tranDate AS tglTindakan, 							a. CODE AS dokCode, 							b.custCode AS namaPasien, 							'Tind. VK' Deskripsi, 							a.id AS noID 						FROM 							tbtim a 						LEFT JOIN tbdetailvk b ON b.trancode = a.trancode 						LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 						LEFT JOIN tbdoctor d ON d.docCode = a.`code` 						LEFT JOIN tbpoli e ON e.polyCode = d.poli 						LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 						AND c.jenisTindakan = e.`name` 						AND f.kelas = b.class 						GROUP BY 							a.id 	) a LEFT JOIN tbtindakan b ON b.kodeTindakan = a.Tindakan LEFT JOIN tbcustomer c ON c.custCode = a.namaPasien LEFT JOIN tbdoctor d ON d.docCode = a.dokCode WHERE 	a.Tindakan NOT LIKE 'SARANA%' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tglTindakan, dokCode, Tindakan, Pasien, Kode, Deskripsi, Insentive, Diskon from (SELECT 	a.Kode, 	a.Tindakan, 	a.Insentive, 	a.Diskon, 	a.tglTindakan, 	concat( 		d.gelar, 		d.`name`, 		', ', 		d.spec 	) AS dokCode, 	concat( 		c.`name`, 		', ', 		c.salut, 		' (', 		c.custCode, 		')' 	) AS Pasien, 	a.Deskripsi FROM 	( 		SELECT 			a.tranCode AS Kode, 			a.tindakan AS Tindakan, 			f.tarif*(80/100) AS Insentive, 			a.diskon AS Diskon, 			a.tglTindakan AS tglTindakan, 			b.dokter AS dokCode, 			b.custCode AS namaPasien, 			'Tind. Poli' Deskripsi, 			a.id AS noID 		FROM 			tbtindakanrawatjalan a 		LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode 		LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 		LEFT JOIN tbdoctor d ON d.docCode = b.dokter 		LEFT JOIN tbpoli e ON e.polyCode = d.poli 		LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 		AND c.jenisTindakan = e.`name` 		GROUP BY 			a.id 		UNION ALL 			SELECT 				a.tranCode AS Kode, 				a.tindakan AS Tindakan, 				g.tarif*(80/100) AS Insentive, 				a.diskon AS Diskon, 				a.tglTindakan AS tglTindakan, 				b.dokter AS dokCode, 				b.custCode AS namaPasien, 				'Visite Ranap' Deskripsi, 				a.id AS noID 			FROM 				tbtindakanrawatinap a 			LEFT JOIN tbdetailrawatinap b ON b.tranCode = a.tranCode 			LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 			LEFT JOIN tbdoctor d ON d.docCode = b.dokter 			LEFT JOIN tbpoli e ON e.polyCode = d.poli 			LEFT JOIN tbadmrawatinap f ON f.tranCode = b.tranCode 			LEFT JOIN tbtarifri g ON g.kodeTindakan = c.kodeTindakan 			AND c.jenisTindakan = e.`name` 			AND g.kelas = f.kelas 			GROUP BY 				a.id 			UNION ALL 				SELECT 					a.tranCode AS Kode, 					a.tindakan AS Tindakan, 					f.tarif*(80/100) AS Insentive, 					a.diskon AS Diskon, 					a.tglTindakan AS tglTindakan, 					a.pelaksana AS dokCode, 					b.custCode AS namaPasien, 					'IGD' Deskripsi, 					a.id AS noID 				FROM 					tbtindakanigd a 				LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 				LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 				LEFT JOIN tbdoctor d ON d.docCode = b.dokter 				LEFT JOIN tbpoli e ON e.polyCode = d.poli 				LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 				AND c.jenisTindakan = e.`name` 				GROUP BY 					a.id 				UNION ALL 					SELECT 						a.trancode AS Kode, 						a.actname AS Tindakan, 						f.tarif AS Insentive, 						a.disc AS Diskon, 						b.tranDate AS tglTindakan, 						b.custCode AS namaPasien, 						a. CODE AS dokCode, 						'Tind. OK' Deskripsi, 						a.id AS noID 					FROM 						tbtim a 					LEFT JOIN tbdetailok b ON b.trancode = a.trancode 					LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 					LEFT JOIN tbdoctor d ON d.docCode = a.`code` 					LEFT JOIN tbpoli e ON e.polyCode = d.poli 					LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 					AND c.jenisTindakan = e.`name` 					AND f.kelas = b.class 					GROUP BY 						a.id 					UNION ALL 						SELECT 							a.trancode AS Kode, 							a.actname AS Tindakan, 							f.tarif*(80/100) AS Insentive, 							a.disc AS Diskon, 							b.tranDate AS tglTindakan, 							a. CODE AS dokCode, 							b.custCode AS namaPasien, 							'Tind. VK' Deskripsi, 							a.id AS noID 						FROM 							tbtim a 						LEFT JOIN tbdetailvk b ON b.trancode = a.trancode 						LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 						LEFT JOIN tbdoctor d ON d.docCode = a.`code` 						LEFT JOIN tbpoli e ON e.polyCode = d.poli 						LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 						AND c.jenisTindakan = e.`name` 						AND f.kelas = b.class 						GROUP BY 							a.id 	) a LEFT JOIN tbtindakan b ON b.kodeTindakan = a.Tindakan LEFT JOIN tbcustomer c ON c.custCode = a.namaPasien LEFT JOIN tbdoctor d ON d.docCode = a.dokCode WHERE 	a.Tindakan NOT LIKE 'SARANA%' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT convert(char(23),tglTindakan,121), dokCode, Tindakan, Pasien, Kode, Deskripsi, Insentive, Diskon from (SELECT 	a.Kode, 	a.Tindakan, 	a.Insentive, 	a.Diskon, 	a.tglTindakan, 	concat( 		d.gelar, 		d.`name`, 		', ', 		d.spec 	) AS dokCode, 	concat( 		c.`name`, 		', ', 		c.salut, 		' (', 		c.custCode, 		')' 	) AS Pasien, 	a.Deskripsi FROM 	( 		SELECT 			a.tranCode AS Kode, 			a.tindakan AS Tindakan, 			f.tarif*(80/100) AS Insentive, 			a.diskon AS Diskon, 			a.tglTindakan AS tglTindakan, 			b.dokter AS dokCode, 			b.custCode AS namaPasien, 			'Tind. Poli' Deskripsi, 			a.id AS noID 		FROM 			tbtindakanrawatjalan a 		LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode 		LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 		LEFT JOIN tbdoctor d ON d.docCode = b.dokter 		LEFT JOIN tbpoli e ON e.polyCode = d.poli 		LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 		AND c.jenisTindakan = e.`name` 		GROUP BY 			a.id 		UNION ALL 			SELECT 				a.tranCode AS Kode, 				a.tindakan AS Tindakan, 				g.tarif*(80/100) AS Insentive, 				a.diskon AS Diskon, 				a.tglTindakan AS tglTindakan, 				b.dokter AS dokCode, 				b.custCode AS namaPasien, 				'Visite Ranap' Deskripsi, 				a.id AS noID 			FROM 				tbtindakanrawatinap a 			LEFT JOIN tbdetailrawatinap b ON b.tranCode = a.tranCode 			LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 			LEFT JOIN tbdoctor d ON d.docCode = b.dokter 			LEFT JOIN tbpoli e ON e.polyCode = d.poli 			LEFT JOIN tbadmrawatinap f ON f.tranCode = b.tranCode 			LEFT JOIN tbtarifri g ON g.kodeTindakan = c.kodeTindakan 			AND c.jenisTindakan = e.`name` 			AND g.kelas = f.kelas 			GROUP BY 				a.id 			UNION ALL 				SELECT 					a.tranCode AS Kode, 					a.tindakan AS Tindakan, 					f.tarif*(80/100) AS Insentive, 					a.diskon AS Diskon, 					a.tglTindakan AS tglTindakan, 					a.pelaksana AS dokCode, 					b.custCode AS namaPasien, 					'IGD' Deskripsi, 					a.id AS noID 				FROM 					tbtindakanigd a 				LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 				LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 				LEFT JOIN tbdoctor d ON d.docCode = b.dokter 				LEFT JOIN tbpoli e ON e.polyCode = d.poli 				LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 				AND c.jenisTindakan = e.`name` 				GROUP BY 					a.id 				UNION ALL 					SELECT 						a.trancode AS Kode, 						a.actname AS Tindakan, 						f.tarif AS Insentive, 						a.disc AS Diskon, 						b.tranDate AS tglTindakan, 						b.custCode AS namaPasien, 						a. CODE AS dokCode, 						'Tind. OK' Deskripsi, 						a.id AS noID 					FROM 						tbtim a 					LEFT JOIN tbdetailok b ON b.trancode = a.trancode 					LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 					LEFT JOIN tbdoctor d ON d.docCode = a.`code` 					LEFT JOIN tbpoli e ON e.polyCode = d.poli 					LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 					AND c.jenisTindakan = e.`name` 					AND f.kelas = b.class 					GROUP BY 						a.id 					UNION ALL 						SELECT 							a.trancode AS Kode, 							a.actname AS Tindakan, 							f.tarif*(80/100) AS Insentive, 							a.disc AS Diskon, 							b.tranDate AS tglTindakan, 							a. CODE AS dokCode, 							b.custCode AS namaPasien, 							'Tind. VK' Deskripsi, 							a.id AS noID 						FROM 							tbtim a 						LEFT JOIN tbdetailvk b ON b.trancode = a.trancode 						LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 						LEFT JOIN tbdoctor d ON d.docCode = a.`code` 						LEFT JOIN tbpoli e ON e.polyCode = d.poli 						LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 						AND c.jenisTindakan = e.`name` 						AND f.kelas = b.class 						GROUP BY 							a.id 	) a LEFT JOIN tbtindakan b ON b.kodeTindakan = a.Tindakan LEFT JOIN tbcustomer c ON c.custCode = a.namaPasien LEFT JOIN tbdoctor d ON d.docCode = a.dokCode WHERE 	a.Tindakan NOT LIKE 'SARANA%' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tglTindakan, dokCode, Tindakan, Pasien, Kode, Deskripsi, Insentive, Diskon from (SELECT 	a.Kode, 	a.Tindakan, 	a.Insentive, 	a.Diskon, 	a.tglTindakan, 	concat( 		d.gelar, 		d.`name`, 		', ', 		d.spec 	) AS dokCode, 	concat( 		c.`name`, 		', ', 		c.salut, 		' (', 		c.custCode, 		')' 	) AS Pasien, 	a.Deskripsi FROM 	( 		SELECT 			a.tranCode AS Kode, 			a.tindakan AS Tindakan, 			f.tarif*(80/100) AS Insentive, 			a.diskon AS Diskon, 			a.tglTindakan AS tglTindakan, 			b.dokter AS dokCode, 			b.custCode AS namaPasien, 			'Tind. Poli' Deskripsi, 			a.id AS noID 		FROM 			tbtindakanrawatjalan a 		LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode 		LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 		LEFT JOIN tbdoctor d ON d.docCode = b.dokter 		LEFT JOIN tbpoli e ON e.polyCode = d.poli 		LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 		AND c.jenisTindakan = e.`name` 		GROUP BY 			a.id 		UNION ALL 			SELECT 				a.tranCode AS Kode, 				a.tindakan AS Tindakan, 				g.tarif*(80/100) AS Insentive, 				a.diskon AS Diskon, 				a.tglTindakan AS tglTindakan, 				b.dokter AS dokCode, 				b.custCode AS namaPasien, 				'Visite Ranap' Deskripsi, 				a.id AS noID 			FROM 				tbtindakanrawatinap a 			LEFT JOIN tbdetailrawatinap b ON b.tranCode = a.tranCode 			LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 			LEFT JOIN tbdoctor d ON d.docCode = b.dokter 			LEFT JOIN tbpoli e ON e.polyCode = d.poli 			LEFT JOIN tbadmrawatinap f ON f.tranCode = b.tranCode 			LEFT JOIN tbtarifri g ON g.kodeTindakan = c.kodeTindakan 			AND c.jenisTindakan = e.`name` 			AND g.kelas = f.kelas 			GROUP BY 				a.id 			UNION ALL 				SELECT 					a.tranCode AS Kode, 					a.tindakan AS Tindakan, 					f.tarif*(80/100) AS Insentive, 					a.diskon AS Diskon, 					a.tglTindakan AS tglTindakan, 					a.pelaksana AS dokCode, 					b.custCode AS namaPasien, 					'IGD' Deskripsi, 					a.id AS noID 				FROM 					tbtindakanigd a 				LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 				LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 				LEFT JOIN tbdoctor d ON d.docCode = b.dokter 				LEFT JOIN tbpoli e ON e.polyCode = d.poli 				LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 				AND c.jenisTindakan = e.`name` 				GROUP BY 					a.id 				UNION ALL 					SELECT 						a.trancode AS Kode, 						a.actname AS Tindakan, 						f.tarif AS Insentive, 						a.disc AS Diskon, 						b.tranDate AS tglTindakan, 						b.custCode AS namaPasien, 						a. CODE AS dokCode, 						'Tind. OK' Deskripsi, 						a.id AS noID 					FROM 						tbtim a 					LEFT JOIN tbdetailok b ON b.trancode = a.trancode 					LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 					LEFT JOIN tbdoctor d ON d.docCode = a.`code` 					LEFT JOIN tbpoli e ON e.polyCode = d.poli 					LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 					AND c.jenisTindakan = e.`name` 					AND f.kelas = b.class 					GROUP BY 						a.id 					UNION ALL 						SELECT 							a.trancode AS Kode, 							a.actname AS Tindakan, 							f.tarif*(80/100) AS Insentive, 							a.disc AS Diskon, 							b.tranDate AS tglTindakan, 							a. CODE AS dokCode, 							b.custCode AS namaPasien, 							'Tind. VK' Deskripsi, 							a.id AS noID 						FROM 							tbtim a 						LEFT JOIN tbdetailvk b ON b.trancode = a.trancode 						LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 						LEFT JOIN tbdoctor d ON d.docCode = a.`code` 						LEFT JOIN tbpoli e ON e.polyCode = d.poli 						LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 						AND c.jenisTindakan = e.`name` 						AND f.kelas = b.class 						GROUP BY 							a.id 	) a LEFT JOIN tbtindakan b ON b.kodeTindakan = a.Tindakan LEFT JOIN tbcustomer c ON c.custCode = a.namaPasien LEFT JOIN tbdoctor d ON d.docCode = a.dokCode WHERE 	a.Tindakan NOT LIKE 'SARANA%' ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(tglTindakan, YEAR TO FRACTION), dokCode, Tindakan, Pasien, Kode, Deskripsi, Insentive, Diskon from (SELECT 	a.Kode, 	a.Tindakan, 	a.Insentive, 	a.Diskon, 	a.tglTindakan, 	concat( 		d.gelar, 		d.`name`, 		', ', 		d.spec 	) AS dokCode, 	concat( 		c.`name`, 		', ', 		c.salut, 		' (', 		c.custCode, 		')' 	) AS Pasien, 	a.Deskripsi FROM 	( 		SELECT 			a.tranCode AS Kode, 			a.tindakan AS Tindakan, 			f.tarif*(80/100) AS Insentive, 			a.diskon AS Diskon, 			a.tglTindakan AS tglTindakan, 			b.dokter AS dokCode, 			b.custCode AS namaPasien, 			'Tind. Poli' Deskripsi, 			a.id AS noID 		FROM 			tbtindakanrawatjalan a 		LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode 		LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 		LEFT JOIN tbdoctor d ON d.docCode = b.dokter 		LEFT JOIN tbpoli e ON e.polyCode = d.poli 		LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 		AND c.jenisTindakan = e.`name` 		GROUP BY 			a.id 		UNION ALL 			SELECT 				a.tranCode AS Kode, 				a.tindakan AS Tindakan, 				g.tarif*(80/100) AS Insentive, 				a.diskon AS Diskon, 				a.tglTindakan AS tglTindakan, 				b.dokter AS dokCode, 				b.custCode AS namaPasien, 				'Visite Ranap' Deskripsi, 				a.id AS noID 			FROM 				tbtindakanrawatinap a 			LEFT JOIN tbdetailrawatinap b ON b.tranCode = a.tranCode 			LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 			LEFT JOIN tbdoctor d ON d.docCode = b.dokter 			LEFT JOIN tbpoli e ON e.polyCode = d.poli 			LEFT JOIN tbadmrawatinap f ON f.tranCode = b.tranCode 			LEFT JOIN tbtarifri g ON g.kodeTindakan = c.kodeTindakan 			AND c.jenisTindakan = e.`name` 			AND g.kelas = f.kelas 			GROUP BY 				a.id 			UNION ALL 				SELECT 					a.tranCode AS Kode, 					a.tindakan AS Tindakan, 					f.tarif*(80/100) AS Insentive, 					a.diskon AS Diskon, 					a.tglTindakan AS tglTindakan, 					a.pelaksana AS dokCode, 					b.custCode AS namaPasien, 					'IGD' Deskripsi, 					a.id AS noID 				FROM 					tbtindakanigd a 				LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 				LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 				LEFT JOIN tbdoctor d ON d.docCode = b.dokter 				LEFT JOIN tbpoli e ON e.polyCode = d.poli 				LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 				AND c.jenisTindakan = e.`name` 				GROUP BY 					a.id 				UNION ALL 					SELECT 						a.trancode AS Kode, 						a.actname AS Tindakan, 						f.tarif AS Insentive, 						a.disc AS Diskon, 						b.tranDate AS tglTindakan, 						b.custCode AS namaPasien, 						a. CODE AS dokCode, 						'Tind. OK' Deskripsi, 						a.id AS noID 					FROM 						tbtim a 					LEFT JOIN tbdetailok b ON b.trancode = a.trancode 					LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 					LEFT JOIN tbdoctor d ON d.docCode = a.`code` 					LEFT JOIN tbpoli e ON e.polyCode = d.poli 					LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 					AND c.jenisTindakan = e.`name` 					AND f.kelas = b.class 					GROUP BY 						a.id 					UNION ALL 						SELECT 							a.trancode AS Kode, 							a.actname AS Tindakan, 							f.tarif*(80/100) AS Insentive, 							a.disc AS Diskon, 							b.tranDate AS tglTindakan, 							a. CODE AS dokCode, 							b.custCode AS namaPasien, 							'Tind. VK' Deskripsi, 							a.id AS noID 						FROM 							tbtim a 						LEFT JOIN tbdetailvk b ON b.trancode = a.trancode 						LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 						LEFT JOIN tbdoctor d ON d.docCode = a.`code` 						LEFT JOIN tbpoli e ON e.polyCode = d.poli 						LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 						AND c.jenisTindakan = e.`name` 						AND f.kelas = b.class 						GROUP BY 							a.id 	) a LEFT JOIN tbtindakan b ON b.kodeTindakan = a.Tindakan LEFT JOIN tbcustomer c ON c.custCode = a.namaPasien LEFT JOIN tbdoctor d ON d.docCode = a.dokCode WHERE 	a.Tindakan NOT LIKE 'SARANA%' ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT tglTindakan, dokCode, Tindakan, Pasien, Kode, Deskripsi, Insentive, Diskon from (SELECT 	a.Kode, 	a.Tindakan, 	a.Insentive, 	a.Diskon, 	a.tglTindakan, 	concat( 		d.gelar, 		d.`name`, 		', ', 		d.spec 	) AS dokCode, 	concat( 		c.`name`, 		', ', 		c.salut, 		' (', 		c.custCode, 		')' 	) AS Pasien, 	a.Deskripsi FROM 	( 		SELECT 			a.tranCode AS Kode, 			a.tindakan AS Tindakan, 			f.tarif*(80/100) AS Insentive, 			a.diskon AS Diskon, 			a.tglTindakan AS tglTindakan, 			b.dokter AS dokCode, 			b.custCode AS namaPasien, 			'Tind. Poli' Deskripsi, 			a.id AS noID 		FROM 			tbtindakanrawatjalan a 		LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode 		LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 		LEFT JOIN tbdoctor d ON d.docCode = b.dokter 		LEFT JOIN tbpoli e ON e.polyCode = d.poli 		LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 		AND c.jenisTindakan = e.`name` 		GROUP BY 			a.id 		UNION ALL 			SELECT 				a.tranCode AS Kode, 				a.tindakan AS Tindakan, 				g.tarif*(80/100) AS Insentive, 				a.diskon AS Diskon, 				a.tglTindakan AS tglTindakan, 				b.dokter AS dokCode, 				b.custCode AS namaPasien, 				'Visite Ranap' Deskripsi, 				a.id AS noID 			FROM 				tbtindakanrawatinap a 			LEFT JOIN tbdetailrawatinap b ON b.tranCode = a.tranCode 			LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 			LEFT JOIN tbdoctor d ON d.docCode = b.dokter 			LEFT JOIN tbpoli e ON e.polyCode = d.poli 			LEFT JOIN tbadmrawatinap f ON f.tranCode = b.tranCode 			LEFT JOIN tbtarifri g ON g.kodeTindakan = c.kodeTindakan 			AND c.jenisTindakan = e.`name` 			AND g.kelas = f.kelas 			GROUP BY 				a.id 			UNION ALL 				SELECT 					a.tranCode AS Kode, 					a.tindakan AS Tindakan, 					f.tarif*(80/100) AS Insentive, 					a.diskon AS Diskon, 					a.tglTindakan AS tglTindakan, 					a.pelaksana AS dokCode, 					b.custCode AS namaPasien, 					'IGD' Deskripsi, 					a.id AS noID 				FROM 					tbtindakanigd a 				LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 				LEFT JOIN tbtindakan c ON c.namaTindakan = a.tindakan 				LEFT JOIN tbdoctor d ON d.docCode = b.dokter 				LEFT JOIN tbpoli e ON e.polyCode = d.poli 				LEFT JOIN tbtarifrj f ON f.kodeTindakan = c.kodeTindakan 				AND c.jenisTindakan = e.`name` 				GROUP BY 					a.id 				UNION ALL 					SELECT 						a.trancode AS Kode, 						a.actname AS Tindakan, 						f.tarif AS Insentive, 						a.disc AS Diskon, 						b.tranDate AS tglTindakan, 						b.custCode AS namaPasien, 						a. CODE AS dokCode, 						'Tind. OK' Deskripsi, 						a.id AS noID 					FROM 						tbtim a 					LEFT JOIN tbdetailok b ON b.trancode = a.trancode 					LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 					LEFT JOIN tbdoctor d ON d.docCode = a.`code` 					LEFT JOIN tbpoli e ON e.polyCode = d.poli 					LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 					AND c.jenisTindakan = e.`name` 					AND f.kelas = b.class 					GROUP BY 						a.id 					UNION ALL 						SELECT 							a.trancode AS Kode, 							a.actname AS Tindakan, 							f.tarif*(80/100) AS Insentive, 							a.disc AS Diskon, 							b.tranDate AS tglTindakan, 							a. CODE AS dokCode, 							b.custCode AS namaPasien, 							'Tind. VK' Deskripsi, 							a.id AS noID 						FROM 							tbtim a 						LEFT JOIN tbdetailvk b ON b.trancode = a.trancode 						LEFT JOIN tbtindakan c ON c.namaTindakan = a.actname 						LEFT JOIN tbdoctor d ON d.docCode = a.`code` 						LEFT JOIN tbpoli e ON e.polyCode = d.poli 						LEFT JOIN tbtarifri f ON f.kodeTindakan = c.kodeTindakan 						AND c.jenisTindakan = e.`name` 						AND f.kelas = b.class 						GROUP BY 							a.id 	) a LEFT JOIN tbtindakan b ON b.kodeTindakan = a.Tindakan LEFT JOIN tbcustomer c ON c.custCode = a.namaPasien LEFT JOIN tbdoctor d ON d.docCode = a.dokCode WHERE 	a.Tindakan NOT LIKE 'SARANA%' ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['order_grid'];
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Xls_col = 0;
         $this->Xls_row++;
         $this->tgltindakan = $rs->fields[0] ;  
         $this->dokcode = $rs->fields[1] ;  
         $this->tindakan = $rs->fields[2] ;  
         $this->pasien = $rs->fields[3] ;  
         $this->kode = $rs->fields[4] ;  
         $this->deskripsi = $rs->fields[5] ;  
         $this->insentive = $rs->fields[6] ;  
         $this->insentive =  str_replace(",", ".", $this->insentive);
         $this->insentive = (string)$this->insentive;
         $this->diskon = $rs->fields[7] ;  
         $this->diskon = (strpos(strtolower($this->diskon), "e")) ? (float)$this->diskon : $this->diskon; 
         $this->diskon = (string)$this->diskon;
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['SC_Ind_Groupby'] == "byTanggal")
         {
             $Format_tst = $this->Ini->Get_Gb_date_format('byTanggal', 'tgltindakan');
             $TP_Time     = (in_array('tgltindakan', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
             $this->arg_sum_tgltindakan = $this->Ini->Get_date_arg_sum($TP_Time . $this->tgltindakan, $Format_tst, "tglTindakan");
             if (empty($this->tgltindakan))
             {
                 $this->Tot->Sc_groupby_tgltindakan = "tglTindakan";
             }
             else
             {
                 $this->Tot->Sc_groupby_tgltindakan = $this->Ini->Get_sql_date_groupby("tglTindakan", $Format_tst);
             }
         }
          $Format_tst = $this->Ini->Get_Gb_date_format('byTanggal', 'tgltindakan');
          $TP_Time = (in_array('tgltindakan', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_tst    = $this->Ini->Get_arg_groupby($TP_Time . $this->tgltindakan, $Format_tst);
          if ($Cmp_tst != $this->tgltindakan_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['SC_Ind_Groupby'] == "byTanggal") 
          {  
              if (isset($this->tgltindakan_Old) && !$prim_gb)
              {
                 $this->quebra_tgltindakan_byTanggal_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $Format_tst = $this->Ini->Get_Gb_date_format('byTanggal', 'tgltindakan');
              $TP_Time = (in_array('tgltindakan', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->tgltindakan_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->tgltindakan, $Format_tst);
              $this->quebra_tgltindakan_byTanggal($this->tgltindakan) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->tgltindakan_Old))
              {
                 $this->quebra_tgltindakan_byTanggal_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
     if ($this->groupby_show == "S") {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
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
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
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
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'] && $prim_reg)
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
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if ($this->groupby_show == "S") {
          $this->Xls_col = 0;
          $this->Xls_row++;
       if (isset($this->tgltindakan_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['SC_Ind_Groupby'] == "byTanggal")
       {
           $this->quebra_tgltindakan_byTanggal_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
          $this->Xls_col = 0;
          $this->Xls_row++;
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['SC_Ind_Groupby'] . "_bot";
          $this->$Gb_geral();
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
      { 
          if ($this->Tem_xls_res)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_res_grid'] = true;
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
                  $Xls_res = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_res_sheet']);
              }
              else {
                  $Xls_res = PHPExcel_IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_res_sheet']);
              }
              foreach($Xls_res->getAllSheets() as $sheet)
              {
                  $this->Xls_dados->addExternalSheet($sheet);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_res_sheet']);
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['tgltindakan'])) ? $this->New_label['tgltindakan'] : "Tgl Tindakan"; 
          if ($Cada_col == "tgltindakan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
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
          $SC_Label = (isset($this->New_label['dokcode'])) ? $this->New_label['dokcode'] : "Dokter"; 
          if ($Cada_col == "dokcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
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
          $SC_Label = (isset($this->New_label['tindakan'])) ? $this->New_label['tindakan'] : "Tindakan"; 
          if ($Cada_col == "tindakan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
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
          $SC_Label = (isset($this->New_label['kode'])) ? $this->New_label['kode'] : "Kode"; 
          if ($Cada_col == "kode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
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
          $SC_Label = (isset($this->New_label['deskripsi'])) ? $this->New_label['deskripsi'] : "Deskripsi"; 
          if ($Cada_col == "deskripsi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
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
          $SC_Label = (isset($this->New_label['insentive'])) ? $this->New_label['insentive'] : "Insentive"; 
          if ($Cada_col == "insentive" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
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
          $SC_Label = (isset($this->New_label['diskon'])) ? $this->New_label['diskon'] : "Diskon"; 
          if ($Cada_col == "diskon" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida'])
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
   //----- tgltindakan
   function NM_export_tgltindakan()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->tgltindakan))
      {
             if (substr($this->tgltindakan, 10, 1) == "-") 
             { 
                 $this->tgltindakan = substr($this->tgltindakan, 0, 10) . " " . substr($this->tgltindakan, 11);
             } 
             if (substr($this->tgltindakan, 13, 1) == ".") 
             { 
                $this->tgltindakan = substr($this->tgltindakan, 0, 13) . ":" . substr($this->tgltindakan, 14, 2) . ":" . substr($this->tgltindakan, 17);
             } 
             $conteudo_x =  $this->tgltindakan;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->tgltindakan, "YYYY-MM-DD HH:II:SS  ");
                 $this->tgltindakan = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      }
         if (!NM_is_utf8($this->tgltindakan))
         {
             $this->tgltindakan = sc_convert_encoding($this->tgltindakan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tgltindakan, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tgltindakan, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- dokcode
   function NM_export_dokcode()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->dokcode = html_entity_decode($this->dokcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dokcode = strip_tags($this->dokcode);
         if (!NM_is_utf8($this->dokcode))
         {
             $this->dokcode = sc_convert_encoding($this->dokcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->dokcode, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->dokcode, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- tindakan
   function NM_export_tindakan()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->tindakan = html_entity_decode($this->tindakan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tindakan = strip_tags($this->tindakan);
         if (!NM_is_utf8($this->tindakan))
         {
             $this->tindakan = sc_convert_encoding($this->tindakan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tindakan, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tindakan, PHPExcel_Cell_DataType::TYPE_STRING);
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
   //----- kode
   function NM_export_kode()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->kode = html_entity_decode($this->kode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kode = strip_tags($this->kode);
         if (!NM_is_utf8($this->kode))
         {
             $this->kode = sc_convert_encoding($this->kode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->kode, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->kode, PHPExcel_Cell_DataType::TYPE_STRING);
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
   //----- insentive
   function NM_export_insentive()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->insentive))
         {
             $this->insentive = sc_convert_encoding($this->insentive, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->insentive))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->insentive);
         $this->Xls_col++;
   }
   //----- diskon
   function NM_export_diskon()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->diskon))
         {
             $this->diskon = sc_convert_encoding($this->diskon, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->diskon))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->diskon);
         $this->Xls_col++;
   }
   //----- tgltindakan
   function NM_sub_cons_tgltindakan()
   {
      if (!empty($this->tgltindakan))
      {
         if (substr($this->tgltindakan, 10, 1) == "-") 
         { 
             $this->tgltindakan = substr($this->tgltindakan, 0, 10) . " " . substr($this->tgltindakan, 11);
         } 
         if (substr($this->tgltindakan, 13, 1) == ".") 
         { 
            $this->tgltindakan = substr($this->tgltindakan, 0, 13) . ":" . substr($this->tgltindakan, 14, 2) . ":" . substr($this->tgltindakan, 17);
         } 
         $conteudo_x =  $this->tgltindakan;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->tgltindakan, "YYYY-MM-DD HH:II:SS  ");
             $this->tgltindakan = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->tgltindakan))
         {
             $this->tgltindakan = sc_convert_encoding($this->tgltindakan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->tgltindakan;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- dokcode
   function NM_sub_cons_dokcode()
   {
         $this->dokcode = html_entity_decode($this->dokcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dokcode = strip_tags($this->dokcode);
         if (!NM_is_utf8($this->dokcode))
         {
             $this->dokcode = sc_convert_encoding($this->dokcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->dokcode;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- tindakan
   function NM_sub_cons_tindakan()
   {
         $this->tindakan = html_entity_decode($this->tindakan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tindakan = strip_tags($this->tindakan);
         if (!NM_is_utf8($this->tindakan))
         {
             $this->tindakan = sc_convert_encoding($this->tindakan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->tindakan;
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
   //----- kode
   function NM_sub_cons_kode()
   {
         $this->kode = html_entity_decode($this->kode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kode = strip_tags($this->kode);
         if (!NM_is_utf8($this->kode))
         {
             $this->kode = sc_convert_encoding($this->kode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->kode;
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
   //----- insentive
   function NM_sub_cons_insentive()
   {
         if (!NM_is_utf8($this->insentive))
         {
             $this->insentive = sc_convert_encoding($this->insentive, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->insentive;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- diskon
   function NM_sub_cons_diskon()
   {
         if (!NM_is_utf8($this->diskon))
         {
             $this->diskon = sc_convert_encoding($this->diskon, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->diskon;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['nolabel'])
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
 function quebra_tgltindakan_byTanggal($tgltindakan) 
 {
   global $tot_tgltindakan;
   $TP_Time = (in_array('tgltindakan', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $tgltindakan = $this->Ini->Get_arg_groupby($TP_Time . $tgltindakan, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_tgltindakan = true; 
   $this->Tot->quebra_tgltindakan_byTanggal($tgltindakan, $this->arg_sum_tgltindakan);
   $conteudo = $tot_tgltindakan[0] ;  
   $this->count_tgltindakan = $tot_tgltindakan[1];
   $this->sum_tgltindakan_insentive = $tot_tgltindakan[2];
   $this->campos_quebra_tgltindakan = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->tgltindakan)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('byTanggal', 'tgltindakan');
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('byTanggal', 'tgltindakan');
   $TP_Time    = (in_array('tgltindakan', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $this->campos_quebra_tgltindakan[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['tgltindakan']))
   {
       $this->campos_quebra_tgltindakan[0]['lab'] = $this->nmgp_label_quebras['tgltindakan']; 
   }
   else
   {
   $Tmp_lab  = "Tgl Tindakan"; 
   $this->campos_quebra_tgltindakan[0]['lab'] = sprintf("" . $this->Ini->Nm_lang['lang_othr_cons_title_YYYYMMDD2'] . "", $Tmp_lab); 
   }
   $this->sc_proc_quebra_tgltindakan = false; 
 } 
   function quebra_tgltindakan_byTanggal_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_tgltindakan as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               if (!NM_is_utf8($temp_cmp)) {
                   $temp_cmp = sc_convert_encoding($temp_cmp, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida']) {
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
   function quebra_tgltindakan_byTanggal_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "insentive" && (!isset($this->NM_cmp_hidden['insentive']) || $this->NM_cmp_hidden['insentive'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_tgltindakan_insentive;
               $prim_cmp = false;
               if (!NM_is_utf8($Cmp_Tot)) {
                   $Cmp_Tot = sc_convert_encoding($Cmp_Tot, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
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
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida']) {
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
   function quebra_geral_byTanggal_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_byTanggal();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "insentive" && (!isset($this->NM_cmp_hidden['insentive']) || $this->NM_cmp_hidden['insentive'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['tot_geral'][2];
               $prim_cmp = false;
               if (!NM_is_utf8($Vl_Tot)) {
                   $Vl_Tot = sc_convert_encoding($Vl_Tot, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['embutida']) {
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
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> - Insentif Paramedis :: Excel</TITLE>
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
<form name="Fdown" method="get" action="grid_insentive_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_insentive"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_insentive']['xls_return']); ?>"> 
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
