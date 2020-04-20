<?php

class pendapatanKasir_rekap_rtf
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
      require_once($this->Ini->path_aplicacao . "pendapatanKasir_rekap_total.class.php"); 
      $this->Tot      = new pendapatanKasir_rekap_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pendapatanKasir_rekap']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_pendapatanKasir_rekap";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "pendapatanKasir_rekap.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['pendapatanKasir_rekap']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pendapatanKasir_rekap']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['pendapatanKasir_rekap']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['campos_busca'];
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
          $this->custcode = $Busca_temp['custcode']; 
          $tmp_pos = strpos($this->custcode, "##@@");
          if ($tmp_pos !== false && !is_array($this->custcode))
          {
              $this->custcode = substr($this->custcode, 0, $tmp_pos);
          }
          $this->dokter = $Busca_temp['dokter']; 
          $tmp_pos = strpos($this->dokter, "##@@");
          if ($tmp_pos !== false && !is_array($this->dokter))
          {
              $this->dokter = substr($this->dokter, 0, $tmp_pos);
          }
          $this->jenispayment = $Busca_temp['jenispayment']; 
          $tmp_pos = strpos($this->jenispayment, "##@@");
          if ($tmp_pos !== false && !is_array($this->jenispayment))
          {
              $this->jenispayment = substr($this->jenispayment, 0, $tmp_pos);
          }
          $this->jmlbayar = $Busca_temp['jmlbayar']; 
          $tmp_pos = strpos($this->jmlbayar, "##@@");
          if ($tmp_pos !== false && !is_array($this->jmlbayar))
          {
              $this->jmlbayar = substr($this->jmlbayar, 0, $tmp_pos);
          }
          $this->jmlbayar_2 = $Busca_temp['jmlbayar_input_2']; 
          $this->kasir = $Busca_temp['kasir']; 
          $tmp_pos = strpos($this->kasir, "##@@");
          if ($tmp_pos !== false && !is_array($this->kasir))
          {
              $this->kasir = substr($this->kasir, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['trandate'])) ? $this->New_label['trandate'] : "Tgl. Transaksi"; 
          if ($Cada_col == "trandate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nopayment'])) ? $this->New_label['nopayment'] : "Kode Pembayaran"; 
          if ($Cada_col == "nopayment" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Kode Pelayanan"; 
          if ($Cada_col == "trancode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['custcode'])) ? $this->New_label['custcode'] : "Pasien"; 
          if ($Cada_col == "custcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dokter'])) ? $this->New_label['dokter'] : "DPJP"; 
          if ($Cada_col == "dokter" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jmlbayar'])) ? $this->New_label['jmlbayar'] : "Jml Bayar"; 
          if ($Cada_col == "jmlbayar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jenispayment'])) ? $this->New_label['jenispayment'] : "Jenis Payment"; 
          if ($Cada_col == "jenispayment" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['paiddate'])) ? $this->New_label['paiddate'] : "Tgl. Bayar"; 
          if ($Cada_col == "paiddate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['kasir'])) ? $this->New_label['kasir'] : "Kasir"; 
          if ($Cada_col == "kasir" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nokartu'])) ? $this->New_label['nokartu'] : "No Kartu"; 
          if ($Cada_col == "nokartu" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['instansipenjamin'])) ? $this->New_label['instansipenjamin'] : "Provider"; 
          if ($Cada_col == "instansipenjamin" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nostruk'])) ? $this->New_label['nostruk'] : "No Struk"; 
          if ($Cada_col == "nostruk" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT 	c.tranCode, 	c.noStruk, 	c.custCode, 	c.dokter, 	c.jmlBayar, 	c.tranDate, 	c.jenisPayment, IF 	( c.jenisPayment = 'KARTU DEBIT' OR c.jenisPayment = 'KARTU KREDIT', c.bankDebit, '' ) AS 'Debit/Kredit', 	c.noKartu, 	c.instansiPenjamin, 	c.paidDate, 	c.kasir, 	c.noPayment FROM 	( SELECT * FROM tbpayment UNION ALL SELECT * FROM tbpayment_igd ) c  WHERE 	c.jmlBayar != '0') nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),tranDate,102), '.', '-') + ' ' + convert(char(8),tranDate,20), noPayment, tranCode, custCode, dokter, jmlBayar, jenisPayment, str_replace (convert(char(10),paidDate,102), '.', '-') + ' ' + convert(char(8),paidDate,20), kasir, noKartu, instansiPenjamin, noStruk from (SELECT 	c.tranCode, 	c.noStruk, 	c.custCode, 	c.dokter, 	c.jmlBayar, 	c.tranDate, 	c.jenisPayment, IF 	( c.jenisPayment = 'KARTU DEBIT' OR c.jenisPayment = 'KARTU KREDIT', c.bankDebit, '' ) AS 'Debit/Kredit', 	c.noKartu, 	c.instansiPenjamin, 	c.paidDate, 	c.kasir, 	c.noPayment FROM 	( SELECT * FROM tbpayment UNION ALL SELECT * FROM tbpayment_igd ) c  WHERE 	c.jmlBayar != '0') nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tranDate, noPayment, tranCode, custCode, dokter, jmlBayar, jenisPayment, paidDate, kasir, noKartu, instansiPenjamin, noStruk from (SELECT 	c.tranCode, 	c.noStruk, 	c.custCode, 	c.dokter, 	c.jmlBayar, 	c.tranDate, 	c.jenisPayment, IF 	( c.jenisPayment = 'KARTU DEBIT' OR c.jenisPayment = 'KARTU KREDIT', c.bankDebit, '' ) AS 'Debit/Kredit', 	c.noKartu, 	c.instansiPenjamin, 	c.paidDate, 	c.kasir, 	c.noPayment FROM 	( SELECT * FROM tbpayment UNION ALL SELECT * FROM tbpayment_igd ) c  WHERE 	c.jmlBayar != '0') nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT convert(char(23),tranDate,121), noPayment, tranCode, custCode, dokter, jmlBayar, jenisPayment, convert(char(23),paidDate,121), kasir, noKartu, instansiPenjamin, noStruk from (SELECT 	c.tranCode, 	c.noStruk, 	c.custCode, 	c.dokter, 	c.jmlBayar, 	c.tranDate, 	c.jenisPayment, IF 	( c.jenisPayment = 'KARTU DEBIT' OR c.jenisPayment = 'KARTU KREDIT', c.bankDebit, '' ) AS 'Debit/Kredit', 	c.noKartu, 	c.instansiPenjamin, 	c.paidDate, 	c.kasir, 	c.noPayment FROM 	( SELECT * FROM tbpayment UNION ALL SELECT * FROM tbpayment_igd ) c  WHERE 	c.jmlBayar != '0') nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tranDate, noPayment, tranCode, custCode, dokter, jmlBayar, jenisPayment, paidDate, kasir, noKartu, instansiPenjamin, noStruk from (SELECT 	c.tranCode, 	c.noStruk, 	c.custCode, 	c.dokter, 	c.jmlBayar, 	c.tranDate, 	c.jenisPayment, IF 	( c.jenisPayment = 'KARTU DEBIT' OR c.jenisPayment = 'KARTU KREDIT', c.bankDebit, '' ) AS 'Debit/Kredit', 	c.noKartu, 	c.instansiPenjamin, 	c.paidDate, 	c.kasir, 	c.noPayment FROM 	( SELECT * FROM tbpayment UNION ALL SELECT * FROM tbpayment_igd ) c  WHERE 	c.jmlBayar != '0') nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(tranDate, YEAR TO FRACTION), noPayment, tranCode, custCode, dokter, jmlBayar, jenisPayment, EXTEND(paidDate, YEAR TO FRACTION), kasir, noKartu, instansiPenjamin, noStruk from (SELECT 	c.tranCode, 	c.noStruk, 	c.custCode, 	c.dokter, 	c.jmlBayar, 	c.tranDate, 	c.jenisPayment, IF 	( c.jenisPayment = 'KARTU DEBIT' OR c.jenisPayment = 'KARTU KREDIT', c.bankDebit, '' ) AS 'Debit/Kredit', 	c.noKartu, 	c.instansiPenjamin, 	c.paidDate, 	c.kasir, 	c.noPayment FROM 	( SELECT * FROM tbpayment UNION ALL SELECT * FROM tbpayment_igd ) c  WHERE 	c.jmlBayar != '0') nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT tranDate, noPayment, tranCode, custCode, dokter, jmlBayar, jenisPayment, paidDate, kasir, noKartu, instansiPenjamin, noStruk from (SELECT 	c.tranCode, 	c.noStruk, 	c.custCode, 	c.dokter, 	c.jmlBayar, 	c.tranDate, 	c.jenisPayment, IF 	( c.jenisPayment = 'KARTU DEBIT' OR c.jenisPayment = 'KARTU KREDIT', c.bankDebit, '' ) AS 'Debit/Kredit', 	c.noKartu, 	c.instansiPenjamin, 	c.paidDate, 	c.kasir, 	c.noPayment FROM 	( SELECT * FROM tbpayment UNION ALL SELECT * FROM tbpayment_igd ) c  WHERE 	c.jmlBayar != '0') nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['order_grid'];
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
         $this->trandate = $rs->fields[0] ;  
         $this->nopayment = $rs->fields[1] ;  
         $this->trancode = $rs->fields[2] ;  
         $this->custcode = $rs->fields[3] ;  
         $this->dokter = $rs->fields[4] ;  
         $this->jmlbayar = $rs->fields[5] ;  
         $this->jmlbayar =  str_replace(",", ".", $this->jmlbayar);
         $this->jmlbayar = (string)$this->jmlbayar;
         $this->jenispayment = $rs->fields[6] ;  
         $this->paiddate = $rs->fields[7] ;  
         $this->kasir = $rs->fields[8] ;  
         $this->nokartu = $rs->fields[9] ;  
         $this->instansipenjamin = $rs->fields[10] ;  
         $this->nostruk = $rs->fields[11] ;  
         $this->nostruk = (string)$this->nostruk;
         //----- lookup - custcode
         $this->look_custcode = $this->custcode; 
         $this->Lookup->lookup_custcode($this->look_custcode, $this->custcode) ; 
         $this->look_custcode = ($this->look_custcode == "&nbsp;") ? "" : $this->look_custcode; 
         //----- lookup - dokter
         $this->look_dokter = $this->dokter; 
         $this->Lookup->lookup_dokter($this->look_dokter, $this->dokter) ; 
         $this->look_dokter = ($this->look_dokter == "&nbsp;") ? "" : $this->look_dokter; 
         //----- lookup - instansipenjamin
         $this->look_instansipenjamin = $this->instansipenjamin; 
         $this->Lookup->lookup_instansipenjamin($this->look_instansipenjamin, $this->instansipenjamin) ; 
         $this->look_instansipenjamin = ($this->look_instansipenjamin == "&nbsp;") ? "" : $this->look_instansipenjamin; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- trandate
   function NM_export_trandate()
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
         if (!NM_is_utf8($this->trandate))
         {
             $this->trandate = sc_convert_encoding($this->trandate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->trandate = str_replace('<', '&lt;', $this->trandate);
         $this->trandate = str_replace('>', '&gt;', $this->trandate);
         $this->Texto_tag .= "<td>" . $this->trandate . "</td>\r\n";
   }
   //----- nopayment
   function NM_export_nopayment()
   {
         $this->nopayment = html_entity_decode($this->nopayment, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nopayment = strip_tags($this->nopayment);
         if (!NM_is_utf8($this->nopayment))
         {
             $this->nopayment = sc_convert_encoding($this->nopayment, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nopayment = str_replace('<', '&lt;', $this->nopayment);
         $this->nopayment = str_replace('>', '&gt;', $this->nopayment);
         $this->Texto_tag .= "<td>" . $this->nopayment . "</td>\r\n";
   }
   //----- trancode
   function NM_export_trancode()
   {
         $this->trancode = html_entity_decode($this->trancode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->trancode = strip_tags($this->trancode);
         if (!NM_is_utf8($this->trancode))
         {
             $this->trancode = sc_convert_encoding($this->trancode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->trancode = str_replace('<', '&lt;', $this->trancode);
         $this->trancode = str_replace('>', '&gt;', $this->trancode);
         $this->Texto_tag .= "<td>" . $this->trancode . "</td>\r\n";
   }
   //----- custcode
   function NM_export_custcode()
   {
         $this->look_custcode = html_entity_decode($this->look_custcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_custcode = strip_tags($this->look_custcode);
         if (!NM_is_utf8($this->look_custcode))
         {
             $this->look_custcode = sc_convert_encoding($this->look_custcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_custcode = str_replace('<', '&lt;', $this->look_custcode);
         $this->look_custcode = str_replace('>', '&gt;', $this->look_custcode);
         $this->Texto_tag .= "<td>" . $this->look_custcode . "</td>\r\n";
   }
   //----- dokter
   function NM_export_dokter()
   {
         $this->look_dokter = html_entity_decode($this->look_dokter, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_dokter = strip_tags($this->look_dokter);
         if (!NM_is_utf8($this->look_dokter))
         {
             $this->look_dokter = sc_convert_encoding($this->look_dokter, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_dokter = str_replace('<', '&lt;', $this->look_dokter);
         $this->look_dokter = str_replace('>', '&gt;', $this->look_dokter);
         $this->Texto_tag .= "<td>" . $this->look_dokter . "</td>\r\n";
   }
   //----- jmlbayar
   function NM_export_jmlbayar()
   {
             nmgp_Form_Num_Val($this->jmlbayar, ".", ",", "0", "S", "2", "Rp", "V:3:3", "-"); 
         if (!NM_is_utf8($this->jmlbayar))
         {
             $this->jmlbayar = sc_convert_encoding($this->jmlbayar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jmlbayar = str_replace('<', '&lt;', $this->jmlbayar);
         $this->jmlbayar = str_replace('>', '&gt;', $this->jmlbayar);
         $this->Texto_tag .= "<td>" . $this->jmlbayar . "</td>\r\n";
   }
   //----- jenispayment
   function NM_export_jenispayment()
   {
         $this->jenispayment = html_entity_decode($this->jenispayment, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->jenispayment = strip_tags($this->jenispayment);
         if (!NM_is_utf8($this->jenispayment))
         {
             $this->jenispayment = sc_convert_encoding($this->jenispayment, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jenispayment = str_replace('<', '&lt;', $this->jenispayment);
         $this->jenispayment = str_replace('>', '&gt;', $this->jenispayment);
         $this->Texto_tag .= "<td>" . $this->jenispayment . "</td>\r\n";
   }
   //----- paiddate
   function NM_export_paiddate()
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
         if (!NM_is_utf8($this->paiddate))
         {
             $this->paiddate = sc_convert_encoding($this->paiddate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->paiddate = str_replace('<', '&lt;', $this->paiddate);
         $this->paiddate = str_replace('>', '&gt;', $this->paiddate);
         $this->Texto_tag .= "<td>" . $this->paiddate . "</td>\r\n";
   }
   //----- kasir
   function NM_export_kasir()
   {
         $this->kasir = html_entity_decode($this->kasir, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kasir = strip_tags($this->kasir);
         if (!NM_is_utf8($this->kasir))
         {
             $this->kasir = sc_convert_encoding($this->kasir, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->kasir = str_replace('<', '&lt;', $this->kasir);
         $this->kasir = str_replace('>', '&gt;', $this->kasir);
         $this->Texto_tag .= "<td>" . $this->kasir . "</td>\r\n";
   }
   //----- nokartu
   function NM_export_nokartu()
   {
         $this->nokartu = html_entity_decode($this->nokartu, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nokartu = strip_tags($this->nokartu);
         if (!NM_is_utf8($this->nokartu))
         {
             $this->nokartu = sc_convert_encoding($this->nokartu, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nokartu = str_replace('<', '&lt;', $this->nokartu);
         $this->nokartu = str_replace('>', '&gt;', $this->nokartu);
         $this->Texto_tag .= "<td>" . $this->nokartu . "</td>\r\n";
   }
   //----- instansipenjamin
   function NM_export_instansipenjamin()
   {
         $this->look_instansipenjamin = html_entity_decode($this->look_instansipenjamin, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_instansipenjamin = strip_tags($this->look_instansipenjamin);
         if (!NM_is_utf8($this->look_instansipenjamin))
         {
             $this->look_instansipenjamin = sc_convert_encoding($this->look_instansipenjamin, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_instansipenjamin = str_replace('<', '&lt;', $this->look_instansipenjamin);
         $this->look_instansipenjamin = str_replace('>', '&gt;', $this->look_instansipenjamin);
         $this->Texto_tag .= "<td>" . $this->look_instansipenjamin . "</td>\r\n";
   }
   //----- nostruk
   function NM_export_nostruk()
   {
         $this->nostruk = html_entity_decode($this->nostruk, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nostruk = strip_tags($this->nostruk);
         if (!NM_is_utf8($this->nostruk))
         {
             $this->nostruk = sc_convert_encoding($this->nostruk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nostruk = str_replace('<', '&lt;', $this->nostruk);
         $this->nostruk = str_replace('>', '&gt;', $this->nostruk);
         $this->Texto_tag .= "<td>" . $this->nostruk . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pendapatanKasir_rekap'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Pendapatan Kasir Rajal :: RTF</TITLE>
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
<form name="Fdown" method="get" action="pendapatanKasir_rekap_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pendapatanKasir_rekap"> 
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
