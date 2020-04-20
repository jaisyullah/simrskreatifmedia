<?php

class kartu_stok_old_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("id");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
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

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "kartu_stok_old_total.class.php"); 
      $this->Tot      = new kartu_stok_old_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['kartu_stok_old']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_kartu_stok_old";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "kartu_stok_old.rtf";
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
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['kartu_stok_old']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['kartu_stok_old']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['kartu_stok_old']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->sc_field_1 = $Busca_temp['sc_field_1']; 
          $tmp_pos = strpos($this->sc_field_1, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_1))
          {
              $this->sc_field_1 = substr($this->sc_field_1, 0, $tmp_pos);
          }
          $this->sc_field_1_2 = $Busca_temp['sc_field_1_input_2']; 
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Tgl Kadaluarsa"; 
          if ($Cada_col == "sc_field_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_1'])) ? $this->New_label['sc_field_1'] : "Tgl Transaksi"; 
          if ($Cada_col == "sc_field_1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_2'])) ? $this->New_label['sc_field_2'] : "No Transaksi"; 
          if ($Cada_col == "sc_field_2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['kategori'])) ? $this->New_label['kategori'] : "Kategori"; 
          if ($Cada_col == "kategori" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['deskripsi'])) ? $this->New_label['deskripsi'] : "Deskripsi"; 
          if ($Cada_col == "deskripsi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['masuk'])) ? $this->New_label['masuk'] : "Masuk"; 
          if ($Cada_col == "masuk" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['keluar'])) ? $this->New_label['keluar'] : "Keluar"; 
          if ($Cada_col == "keluar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT 	c.`Tgl. Kadaluarsa`, 	c.`Tgl. Transaksi`, 	c.tranCode AS 'No. Transaksi', 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar  FROM 	( 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS 'Tgl. Kadaluarsa', 		c.datangDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po UNION ALL 	SELECT 		a.exp_date AS 'Tgl. Kadaluarsa', 		b.tglSo AS 'Tgl. Transaksi', 		a.soCode AS 'No. Transaksi', 		'Stock Opname' AS Kategori, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem  	) c  ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),`Tgl. Kadaluarsa`,102), '.', '-') + ' ' + convert(char(8),`Tgl. Kadaluarsa`,20) as sc_field_0, str_replace (convert(char(10),`Tgl. Transaksi`,102), '.', '-') + ' ' + convert(char(8),`Tgl. Transaksi`,20) as sc_field_1, `No. Transaksi` as sc_field_2, Kategori, Deskripsi, Masuk, Keluar from (SELECT 	c.`Tgl. Kadaluarsa`, 	c.`Tgl. Transaksi`, 	c.tranCode AS 'No. Transaksi', 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar  FROM 	( 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS 'Tgl. Kadaluarsa', 		c.datangDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po UNION ALL 	SELECT 		a.exp_date AS 'Tgl. Kadaluarsa', 		b.tglSo AS 'Tgl. Transaksi', 		a.soCode AS 'No. Transaksi', 		'Stock Opname' AS Kategori, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem  	) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT `Tgl. Kadaluarsa` as sc_field_0, `Tgl. Transaksi` as sc_field_1, `No. Transaksi` as sc_field_2, Kategori, Deskripsi, Masuk, Keluar from (SELECT 	c.`Tgl. Kadaluarsa`, 	c.`Tgl. Transaksi`, 	c.tranCode AS 'No. Transaksi', 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar  FROM 	( 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS 'Tgl. Kadaluarsa', 		c.datangDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po UNION ALL 	SELECT 		a.exp_date AS 'Tgl. Kadaluarsa', 		b.tglSo AS 'Tgl. Transaksi', 		a.soCode AS 'No. Transaksi', 		'Stock Opname' AS Kategori, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem  	) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT convert(char(23),`Tgl. Kadaluarsa`,121) as sc_field_0, convert(char(23),`Tgl. Transaksi`,121) as sc_field_1, `No. Transaksi` as sc_field_2, Kategori, Deskripsi, Masuk, Keluar from (SELECT 	c.`Tgl. Kadaluarsa`, 	c.`Tgl. Transaksi`, 	c.tranCode AS 'No. Transaksi', 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar  FROM 	( 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS 'Tgl. Kadaluarsa', 		c.datangDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po UNION ALL 	SELECT 		a.exp_date AS 'Tgl. Kadaluarsa', 		b.tglSo AS 'Tgl. Transaksi', 		a.soCode AS 'No. Transaksi', 		'Stock Opname' AS Kategori, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem  	) c  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT `Tgl. Kadaluarsa` as sc_field_0, `Tgl. Transaksi` as sc_field_1, `No. Transaksi` as sc_field_2, Kategori, Deskripsi, Masuk, Keluar from (SELECT 	c.`Tgl. Kadaluarsa`, 	c.`Tgl. Transaksi`, 	c.tranCode AS 'No. Transaksi', 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar  FROM 	( 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS 'Tgl. Kadaluarsa', 		c.datangDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po UNION ALL 	SELECT 		a.exp_date AS 'Tgl. Kadaluarsa', 		b.tglSo AS 'Tgl. Transaksi', 		a.soCode AS 'No. Transaksi', 		'Stock Opname' AS Kategori, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem  	) c  ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(`Tgl. Kadaluarsa`, YEAR TO DAY) as sc_field_0, EXTEND(`Tgl. Transaksi`, YEAR TO FRACTION) as sc_field_1, `No. Transaksi` as sc_field_2, Kategori, Deskripsi, Masuk, Keluar from (SELECT 	c.`Tgl. Kadaluarsa`, 	c.`Tgl. Transaksi`, 	c.tranCode AS 'No. Transaksi', 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar  FROM 	( 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS 'Tgl. Kadaluarsa', 		c.datangDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po UNION ALL 	SELECT 		a.exp_date AS 'Tgl. Kadaluarsa', 		b.tglSo AS 'Tgl. Transaksi', 		a.soCode AS 'No. Transaksi', 		'Stock Opname' AS Kategori, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem  	) c  ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT `Tgl. Kadaluarsa` as sc_field_0, `Tgl. Transaksi` as sc_field_1, `No. Transaksi` as sc_field_2, Kategori, Deskripsi, Masuk, Keluar from (SELECT 	c.`Tgl. Kadaluarsa`, 	c.`Tgl. Transaksi`, 	c.tranCode AS 'No. Transaksi', 	c.Kategori, 	c.Deskripsi, 	c.Masuk, 	c.Keluar  FROM 	( 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Operasi' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		c.inapcode AS tranCode, 		'Pemakaian Bersalin' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode UNION ALL 	SELECT NULL AS 		'Tgl. Kadaluarsa', 		a.tranDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		a.jumlah AS Keluar, 		0 AS Masuk, 		a.tranCode AS tranCode, 		'Item Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 		a.expDate AS 'Tgl. Kadaluarsa', 		c.datangDate AS 'Tgl. Transaksi', 		b.namaItem AS Deskripsi, 		0 AS Keluar, 		a.jmlTerima AS Masuk, 		a.po AS tranCode, 		'Pembelian Logistik' AS Kategori  	FROM 		tbpodetail a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbpo c ON c.poCode = a.po UNION ALL 	SELECT 		a.exp_date AS 'Tgl. Kadaluarsa', 		b.tglSo AS 'Tgl. Transaksi', 		a.soCode AS 'No. Transaksi', 		'Stock Opname' AS Kategori, 		c.namaItem AS Deskripsi, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', 0, a.stokKoreksi ) AS Masuk, 	IF 		( LEFT ( a.stokKoreksi, 1 ) = '-', a.stokKoreksi, 0 ) AS Keluar  	FROM 		tbdetailstockopname a 		LEFT JOIN tbstockopname b ON b.soCode = a.soCode 		LEFT JOIN tbobat c ON c.kodeItem = a.namaItem  	) c  ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->sc_field_0 = $rs->fields[0] ;  
         $this->sc_field_1 = $rs->fields[1] ;  
         $this->sc_field_2 = $rs->fields[2] ;  
         $this->kategori = $rs->fields[3] ;  
         $this->deskripsi = $rs->fields[4] ;  
         $this->masuk = $rs->fields[5] ;  
         $this->keluar = $rs->fields[6] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
             $conteudo_x =  $this->sc_field_0;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->sc_field_0, "YYYY-MM-DD  ");
                 $this->sc_field_0 = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if (!NM_is_utf8($this->sc_field_0))
         {
             $this->sc_field_0 = sc_convert_encoding($this->sc_field_0, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_0 = str_replace('<', '&lt;', $this->sc_field_0);
         $this->sc_field_0 = str_replace('>', '&gt;', $this->sc_field_0);
         $this->Texto_tag .= "<td>" . $this->sc_field_0 . "</td>\r\n";
   }
   //----- sc_field_1
   function NM_export_sc_field_1()
   {
             if (substr($this->sc_field_1, 10, 1) == "-") 
             { 
                 $this->sc_field_1 = substr($this->sc_field_1, 0, 10) . " " . substr($this->sc_field_1, 11);
             } 
             if (substr($this->sc_field_1, 13, 1) == ".") 
             { 
                $this->sc_field_1 = substr($this->sc_field_1, 0, 13) . ":" . substr($this->sc_field_1, 14, 2) . ":" . substr($this->sc_field_1, 17);
             } 
             $conteudo_x =  $this->sc_field_1;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->sc_field_1, "YYYY-MM-DD HH:II:SS  ");
                 $this->sc_field_1 = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if (!NM_is_utf8($this->sc_field_1))
         {
             $this->sc_field_1 = sc_convert_encoding($this->sc_field_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_1 = str_replace('<', '&lt;', $this->sc_field_1);
         $this->sc_field_1 = str_replace('>', '&gt;', $this->sc_field_1);
         $this->Texto_tag .= "<td>" . $this->sc_field_1 . "</td>\r\n";
   }
   //----- sc_field_2
   function NM_export_sc_field_2()
   {
         $this->sc_field_2 = html_entity_decode($this->sc_field_2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_2 = strip_tags($this->sc_field_2);
         if (!NM_is_utf8($this->sc_field_2))
         {
             $this->sc_field_2 = sc_convert_encoding($this->sc_field_2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_2 = str_replace('<', '&lt;', $this->sc_field_2);
         $this->sc_field_2 = str_replace('>', '&gt;', $this->sc_field_2);
         $this->Texto_tag .= "<td>" . $this->sc_field_2 . "</td>\r\n";
   }
   //----- kategori
   function NM_export_kategori()
   {
         $this->kategori = html_entity_decode($this->kategori, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kategori = strip_tags($this->kategori);
         if (!NM_is_utf8($this->kategori))
         {
             $this->kategori = sc_convert_encoding($this->kategori, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->kategori = str_replace('<', '&lt;', $this->kategori);
         $this->kategori = str_replace('>', '&gt;', $this->kategori);
         $this->Texto_tag .= "<td>" . $this->kategori . "</td>\r\n";
   }
   //----- deskripsi
   function NM_export_deskripsi()
   {
         $this->deskripsi = html_entity_decode($this->deskripsi, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->deskripsi = strip_tags($this->deskripsi);
         if (!NM_is_utf8($this->deskripsi))
         {
             $this->deskripsi = sc_convert_encoding($this->deskripsi, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->deskripsi = str_replace('<', '&lt;', $this->deskripsi);
         $this->deskripsi = str_replace('>', '&gt;', $this->deskripsi);
         $this->Texto_tag .= "<td>" . $this->deskripsi . "</td>\r\n";
   }
   //----- masuk
   function NM_export_masuk()
   {
         $this->masuk = html_entity_decode($this->masuk, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->masuk = strip_tags($this->masuk);
         if (!NM_is_utf8($this->masuk))
         {
             $this->masuk = sc_convert_encoding($this->masuk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->masuk = str_replace('<', '&lt;', $this->masuk);
         $this->masuk = str_replace('>', '&gt;', $this->masuk);
         $this->Texto_tag .= "<td>" . $this->masuk . "</td>\r\n";
   }
   //----- keluar
   function NM_export_keluar()
   {
         $this->keluar = html_entity_decode($this->keluar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->keluar = strip_tags($this->keluar);
         if (!NM_is_utf8($this->keluar))
         {
             $this->keluar = sc_convert_encoding($this->keluar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->keluar = str_replace('<', '&lt;', $this->keluar);
         $this->keluar = str_replace('>', '&gt;', $this->keluar);
         $this->Texto_tag .= "<td>" . $this->keluar . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['kartu_stok_old'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?>  :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fdown" method="get" action="kartu_stok_old_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="kartu_stok_old"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
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
