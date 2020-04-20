<?php

class kwitansiri_rtf
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
      require_once($this->Ini->path_aplicacao . "kwitansiri_total.class.php"); 
      $this->Tot      = new kwitansiri_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['kwitansiri']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_kwitansiri";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "kwitansiri.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['rtf_name']);
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->dokter = $Busca_temp['dokter']; 
          $tmp_pos = strpos($this->dokter, "##@@");
          if ($tmp_pos !== false && !is_array($this->dokter))
          {
              $this->dokter = substr($this->dokter, 0, $tmp_pos);
          }
          $this->trancode = $Busca_temp['trancode']; 
          $tmp_pos = strpos($this->trancode, "##@@");
          if ($tmp_pos !== false && !is_array($this->trancode))
          {
              $this->trancode = substr($this->trancode, 0, $tmp_pos);
          }
          $this->custcode = $Busca_temp['custcode']; 
          $tmp_pos = strpos($this->custcode, "##@@");
          if ($tmp_pos !== false && !is_array($this->custcode))
          {
              $this->custcode = substr($this->custcode, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Kode Transaksi"; 
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
          $SC_Label = (isset($this->New_label['custcode'])) ? $this->New_label['custcode'] : "No. RM"; 
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
          $SC_Label = (isset($this->New_label['dokter'])) ? $this->New_label['dokter'] : "Dokter"; 
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
          $SC_Label = (isset($this->New_label['jmltagihan'])) ? $this->New_label['jmltagihan'] : "Jml Tagihan"; 
          if ($Cada_col == "jmltagihan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['deposit'])) ? $this->New_label['deposit'] : "Deposit"; 
          if ($Cada_col == "deposit" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['potongan'])) ? $this->New_label['potongan'] : "Potongan"; 
          if ($Cada_col == "potongan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['hrsdibayar'])) ? $this->New_label['hrsdibayar'] : "Hrs Dibayar"; 
          if ($Cada_col == "hrsdibayar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['trandate'])) ? $this->New_label['trandate'] : "Tran Date"; 
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
          $SC_Label = (isset($this->New_label['terimadari'])) ? $this->New_label['terimadari'] : "Terima Dari"; 
          if ($Cada_col == "terimadari" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Nama Pasien"; 
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
          $SC_Label = (isset($this->New_label['rp1'])) ? $this->New_label['rp1'] : "Rp1"; 
          if ($Cada_col == "rp1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rp2'])) ? $this->New_label['rp2'] : "Rp2"; 
          if ($Cada_col == "rp2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rp3'])) ? $this->New_label['rp3'] : "Rp3"; 
          if ($Cada_col == "rp3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['adm'])) ? $this->New_label['adm'] : "adm"; 
          if ($Cada_col == "adm" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['biaya'])) ? $this->New_label['biaya'] : "biaya"; 
          if ($Cada_col == "biaya" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['biayaadm'])) ? $this->New_label['biayaadm'] : "biayaadm"; 
          if ($Cada_col == "biayaadm" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['biayaresep'])) ? $this->New_label['biayaresep'] : "biayaresep"; 
          if ($Cada_col == "biayaresep" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jmlresep'])) ? $this->New_label['jmlresep'] : "jmlResep"; 
          if ($Cada_col == "jmlresep" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jmltdk'])) ? $this->New_label['jmltdk'] : "jmlTdk"; 
          if ($Cada_col == "jmltdk" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['resep'])) ? $this->New_label['resep'] : "resep"; 
          if ($Cada_col == "resep" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['satuanresep'])) ? $this->New_label['satuanresep'] : "satuanResep"; 
          if ($Cada_col == "satuanresep" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['satuantdk'])) ? $this->New_label['satuantdk'] : "satuanTdk"; 
          if ($Cada_col == "satuantdk" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['terbilang'])) ? $this->New_label['terbilang'] : "terbilang"; 
          if ($Cada_col == "terbilang" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tindakan'])) ? $this->New_label['tindakan'] : "tindakan"; 
          if ($Cada_col == "tindakan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT tranCode, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, str_replace (convert(char(10),tranDate,102), '.', '-') + ' ' + convert(char(8),tranDate,20), terimaDari, jenisPayment from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tranCode, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT tranCode, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, convert(char(23),tranDate,121), terimaDari, jenisPayment from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tranCode, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT tranCode, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, EXTEND(tranDate, YEAR TO FRACTION), terimaDari, jenisPayment from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT tranCode, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['order_grid'];
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
         $this->trancode = $rs->fields[0] ;  
         $this->custcode = $rs->fields[1] ;  
         $this->dokter = $rs->fields[2] ;  
         $this->jmltagihan = $rs->fields[3] ;  
         $this->jmltagihan =  str_replace(",", ".", $this->jmltagihan);
         $this->jmltagihan = (string)$this->jmltagihan;
         $this->jmlbayar = $rs->fields[4] ;  
         $this->jmlbayar =  str_replace(",", ".", $this->jmlbayar);
         $this->jmlbayar = (string)$this->jmlbayar;
         $this->deposit = $rs->fields[5] ;  
         $this->deposit =  str_replace(",", ".", $this->deposit);
         $this->deposit = (string)$this->deposit;
         $this->potongan = $rs->fields[6] ;  
         $this->potongan =  str_replace(",", ".", $this->potongan);
         $this->potongan = (string)$this->potongan;
         $this->hrsdibayar = $rs->fields[7] ;  
         $this->hrsdibayar =  str_replace(",", ".", $this->hrsdibayar);
         $this->hrsdibayar = (string)$this->hrsdibayar;
         $this->trandate = $rs->fields[8] ;  
         $this->terimadari = $rs->fields[9] ;  
         $this->jenispayment = $rs->fields[10] ;  
         $this->sc_proc_grid = true; 
         //----- lookup - sc_field_0
         $this->Lookup->lookup_sc_field_0($this->sc_field_0, $this->custcode, $this->array_sc_field_0); 
         $this->sc_field_0 = str_replace("<br>", " ", $this->sc_field_0); 
         $this->sc_field_0 = ($this->sc_field_0 == "&nbsp;") ? "" : $this->sc_field_0; 
         $_SESSION['scriptcase']['kwitansiri']['contr_erro'] = 'on';
  $check_sql = "select b.namaTindakan, a.biaya, a.jumlah from tbtindakanrawatinap a left join tbtindakan b on a.tindakan = b.kodeTindakan where a.tranCode = '" . $this->trancode  . "'";
 
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
    foreach ($this->rs  as $key => $value){
		$this->tindakan  .= $value[0]."<br />";
		$this->rp1  .= "Rp. <br />";
		$this->biaya  .= $value[1]."<br />";
		$this->jmltdk  .= $value[2]."<br />";
		}
}		else     
{
		$this->tindakan  = '';
		$this->biaya  = '';
		$this->jmltdk  = '';
}

$check_sql = "select b.namaItem, a.biaya, a.jumlah from tbreseprawatinap a left join tbobat b on a.item = b.kodeItem where a.tranCode = '" . $this->trancode  . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs2 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs2[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs2 = false;
          $this->rs2_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs2[0][0]))     
{
    foreach ($this->rs2  as $key => $value){
		$this->resep  .= $value[0]."<br />";
		$this->rp2  .= "Rp. <br />";
		$this->biayaresep  .= $value[1]."<br />";
		$this->jmlresep  .= $value[2]."<br />";
		}
}		else     
{
		$this->resep  = '';
		$this->biayaresep  = '';
		$this->jmlresep  = '';
}

$check_sql = "select namaAdm, biaya from tbbilladm where tranCode = '" . $this->trancode  . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs3 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs3[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs3 = false;
          $this->rs3_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs3[0][0]))     
{
    foreach ($this->rs3  as $key => $value){
		$this->adm  .= $value[0]."<br />";
		$this->rp3  .= "Rp. <br />";
		$this->biayaadm  .= $value[1]."<br />";
		}
}		else     
{
		$this->adm  = '';
		$this->biayaadm  = '';
}



 
 


$nilai = $this->jmlbayar ;
        
        
$this->terbilang  = $this->terbilang($nilai, $style=3);
$_SESSION['scriptcase']['kwitansiri']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
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
         $this->custcode = html_entity_decode($this->custcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->custcode = strip_tags($this->custcode);
         if (!NM_is_utf8($this->custcode))
         {
             $this->custcode = sc_convert_encoding($this->custcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->custcode = str_replace('<', '&lt;', $this->custcode);
         $this->custcode = str_replace('>', '&gt;', $this->custcode);
         $this->Texto_tag .= "<td>" . $this->custcode . "</td>\r\n";
   }
   //----- dokter
   function NM_export_dokter()
   {
         $this->dokter = html_entity_decode($this->dokter, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dokter = strip_tags($this->dokter);
         if (!NM_is_utf8($this->dokter))
         {
             $this->dokter = sc_convert_encoding($this->dokter, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->dokter = str_replace('<', '&lt;', $this->dokter);
         $this->dokter = str_replace('>', '&gt;', $this->dokter);
         $this->Texto_tag .= "<td>" . $this->dokter . "</td>\r\n";
   }
   //----- jmltagihan
   function NM_export_jmltagihan()
   {
             nmgp_Form_Num_Val($this->jmltagihan, ".", ",", "0", "S", "2", "Rp", "V:3:3", "-"); 
         if (!NM_is_utf8($this->jmltagihan))
         {
             $this->jmltagihan = sc_convert_encoding($this->jmltagihan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jmltagihan = str_replace('<', '&lt;', $this->jmltagihan);
         $this->jmltagihan = str_replace('>', '&gt;', $this->jmltagihan);
         $this->Texto_tag .= "<td>" . $this->jmltagihan . "</td>\r\n";
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
   //----- deposit
   function NM_export_deposit()
   {
             nmgp_Form_Num_Val($this->deposit, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->deposit))
         {
             $this->deposit = sc_convert_encoding($this->deposit, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->deposit = str_replace('<', '&lt;', $this->deposit);
         $this->deposit = str_replace('>', '&gt;', $this->deposit);
         $this->Texto_tag .= "<td>" . $this->deposit . "</td>\r\n";
   }
   //----- potongan
   function NM_export_potongan()
   {
             nmgp_Form_Num_Val($this->potongan, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->potongan))
         {
             $this->potongan = sc_convert_encoding($this->potongan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->potongan = str_replace('<', '&lt;', $this->potongan);
         $this->potongan = str_replace('>', '&gt;', $this->potongan);
         $this->Texto_tag .= "<td>" . $this->potongan . "</td>\r\n";
   }
   //----- hrsdibayar
   function NM_export_hrsdibayar()
   {
             nmgp_Form_Num_Val($this->hrsdibayar, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->hrsdibayar))
         {
             $this->hrsdibayar = sc_convert_encoding($this->hrsdibayar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->hrsdibayar = str_replace('<', '&lt;', $this->hrsdibayar);
         $this->hrsdibayar = str_replace('>', '&gt;', $this->hrsdibayar);
         $this->Texto_tag .= "<td>" . $this->hrsdibayar . "</td>\r\n";
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
   //----- terimadari
   function NM_export_terimadari()
   {
         $this->terimadari = html_entity_decode($this->terimadari, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->terimadari = strip_tags($this->terimadari);
         if (!NM_is_utf8($this->terimadari))
         {
             $this->terimadari = sc_convert_encoding($this->terimadari, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->terimadari = str_replace('<', '&lt;', $this->terimadari);
         $this->terimadari = str_replace('>', '&gt;', $this->terimadari);
         $this->Texto_tag .= "<td>" . $this->terimadari . "</td>\r\n";
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
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
         if (!NM_is_utf8($this->sc_field_0))
         {
             $this->sc_field_0 = sc_convert_encoding($this->sc_field_0, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_0 = str_replace('<', '&lt;', $this->sc_field_0);
         $this->sc_field_0 = str_replace('>', '&gt;', $this->sc_field_0);
         $this->Texto_tag .= "<td>" . $this->sc_field_0 . "</td>\r\n";
   }
   //----- rp1
   function NM_export_rp1()
   {
         $this->rp1 = html_entity_decode($this->rp1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rp1 = strip_tags($this->rp1);
         if (!NM_is_utf8($this->rp1))
         {
             $this->rp1 = sc_convert_encoding($this->rp1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rp1 = str_replace('<', '&lt;', $this->rp1);
         $this->rp1 = str_replace('>', '&gt;', $this->rp1);
         $this->Texto_tag .= "<td>" . $this->rp1 . "</td>\r\n";
   }
   //----- rp2
   function NM_export_rp2()
   {
         $this->rp2 = html_entity_decode($this->rp2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rp2 = strip_tags($this->rp2);
         if (!NM_is_utf8($this->rp2))
         {
             $this->rp2 = sc_convert_encoding($this->rp2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rp2 = str_replace('<', '&lt;', $this->rp2);
         $this->rp2 = str_replace('>', '&gt;', $this->rp2);
         $this->Texto_tag .= "<td>" . $this->rp2 . "</td>\r\n";
   }
   //----- rp3
   function NM_export_rp3()
   {
         $this->rp3 = html_entity_decode($this->rp3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rp3 = strip_tags($this->rp3);
         if (!NM_is_utf8($this->rp3))
         {
             $this->rp3 = sc_convert_encoding($this->rp3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rp3 = str_replace('<', '&lt;', $this->rp3);
         $this->rp3 = str_replace('>', '&gt;', $this->rp3);
         $this->Texto_tag .= "<td>" . $this->rp3 . "</td>\r\n";
   }
   //----- adm
   function NM_export_adm()
   {
         $this->adm = html_entity_decode($this->adm, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->adm = strip_tags($this->adm);
         if (!NM_is_utf8($this->adm))
         {
             $this->adm = sc_convert_encoding($this->adm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->adm = str_replace('<', '&lt;', $this->adm);
         $this->adm = str_replace('>', '&gt;', $this->adm);
         $this->Texto_tag .= "<td>" . $this->adm . "</td>\r\n";
   }
   //----- biaya
   function NM_export_biaya()
   {
             nmgp_Form_Num_Val($this->biaya, ".", ",", "2", "S", "1", "Rp", "V:3:13", "-"); 
         if (!NM_is_utf8($this->biaya))
         {
             $this->biaya = sc_convert_encoding($this->biaya, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->biaya = str_replace('<', '&lt;', $this->biaya);
         $this->biaya = str_replace('>', '&gt;', $this->biaya);
         $this->Texto_tag .= "<td>" . $this->biaya . "</td>\r\n";
   }
   //----- biayaadm
   function NM_export_biayaadm()
   {
             nmgp_Form_Num_Val($this->biayaadm, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->biayaadm))
         {
             $this->biayaadm = sc_convert_encoding($this->biayaadm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->biayaadm = str_replace('<', '&lt;', $this->biayaadm);
         $this->biayaadm = str_replace('>', '&gt;', $this->biayaadm);
         $this->Texto_tag .= "<td>" . $this->biayaadm . "</td>\r\n";
   }
   //----- biayaresep
   function NM_export_biayaresep()
   {
             nmgp_Form_Num_Val($this->biayaresep, ".", ",", "2", "S", "1", "Rp", "V:3:13", "-"); 
         if (!NM_is_utf8($this->biayaresep))
         {
             $this->biayaresep = sc_convert_encoding($this->biayaresep, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->biayaresep = str_replace('<', '&lt;', $this->biayaresep);
         $this->biayaresep = str_replace('>', '&gt;', $this->biayaresep);
         $this->Texto_tag .= "<td>" . $this->biayaresep . "</td>\r\n";
   }
   //----- jmlresep
   function NM_export_jmlresep()
   {
             nmgp_Form_Num_Val($this->jmlresep, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->jmlresep))
         {
             $this->jmlresep = sc_convert_encoding($this->jmlresep, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jmlresep = str_replace('<', '&lt;', $this->jmlresep);
         $this->jmlresep = str_replace('>', '&gt;', $this->jmlresep);
         $this->Texto_tag .= "<td>" . $this->jmlresep . "</td>\r\n";
   }
   //----- jmltdk
   function NM_export_jmltdk()
   {
             nmgp_Form_Num_Val($this->jmltdk, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->jmltdk))
         {
             $this->jmltdk = sc_convert_encoding($this->jmltdk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jmltdk = str_replace('<', '&lt;', $this->jmltdk);
         $this->jmltdk = str_replace('>', '&gt;', $this->jmltdk);
         $this->Texto_tag .= "<td>" . $this->jmltdk . "</td>\r\n";
   }
   //----- resep
   function NM_export_resep()
   {
         $this->resep = html_entity_decode($this->resep, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->resep = strip_tags($this->resep);
         if (!NM_is_utf8($this->resep))
         {
             $this->resep = sc_convert_encoding($this->resep, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->resep = str_replace('<', '&lt;', $this->resep);
         $this->resep = str_replace('>', '&gt;', $this->resep);
         $this->Texto_tag .= "<td>" . $this->resep . "</td>\r\n";
   }
   //----- satuanresep
   function NM_export_satuanresep()
   {
             nmgp_Form_Num_Val($this->satuanresep, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->satuanresep))
         {
             $this->satuanresep = sc_convert_encoding($this->satuanresep, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->satuanresep = str_replace('<', '&lt;', $this->satuanresep);
         $this->satuanresep = str_replace('>', '&gt;', $this->satuanresep);
         $this->Texto_tag .= "<td>" . $this->satuanresep . "</td>\r\n";
   }
   //----- satuantdk
   function NM_export_satuantdk()
   {
             nmgp_Form_Num_Val($this->satuantdk, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->satuantdk))
         {
             $this->satuantdk = sc_convert_encoding($this->satuantdk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->satuantdk = str_replace('<', '&lt;', $this->satuantdk);
         $this->satuantdk = str_replace('>', '&gt;', $this->satuantdk);
         $this->Texto_tag .= "<td>" . $this->satuantdk . "</td>\r\n";
   }
   //----- terbilang
   function NM_export_terbilang()
   {
         $this->terbilang = html_entity_decode($this->terbilang, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->terbilang = strip_tags($this->terbilang);
         if (!NM_is_utf8($this->terbilang))
         {
             $this->terbilang = sc_convert_encoding($this->terbilang, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->terbilang = str_replace('<', '&lt;', $this->terbilang);
         $this->terbilang = str_replace('>', '&gt;', $this->terbilang);
         $this->Texto_tag .= "<td>" . $this->terbilang . "</td>\r\n";
   }
   //----- tindakan
   function NM_export_tindakan()
   {
         $this->tindakan = html_entity_decode($this->tindakan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tindakan = strip_tags($this->tindakan);
         if (!NM_is_utf8($this->tindakan))
         {
             $this->tindakan = sc_convert_encoding($this->tindakan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tindakan = str_replace('<', '&lt;', $this->tindakan);
         $this->tindakan = str_replace('>', '&gt;', $this->tindakan);
         $this->Texto_tag .= "<td>" . $this->tindakan . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['kwitansiri'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML>
<HEAD>
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
</HEAD>
<BODY>
<SCRIPT>
    window.location='<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo; ?>';
</SCRIPT>
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
function kekata($x) {
$_SESSION['scriptcase']['kwitansiri']['contr_erro'] = 'on';
  
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = $this->kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = $this->kekata($x/10)." puluh". $this->kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . $this->kekata($x - 100);
    } else if ($x <1000) {
        $temp = $this->kekata($x/100) . " ratus" . $this->kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . $this->kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = $this->kekata($x/1000) . " ribu" . $this->kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = $this->kekata($x/1000000) . " juta" . $this->kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = $this->kekata($x/1000000000) . " milyar" . $this->kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = $this->kekata($x/1000000000000) . " trilyun" . $this->kekata(fmod($x,1000000000000));
    }     
        return $temp;

$_SESSION['scriptcase']['kwitansiri']['contr_erro'] = 'off';
}
function terbilang($x, $style=4) {
$_SESSION['scriptcase']['kwitansiri']['contr_erro'] = 'on';
  
    if($x<0) {
        $hasil = "minus ". trim($this->kekata($x));
    } else {
        $hasil = trim($this->kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;

$_SESSION['scriptcase']['kwitansiri']['contr_erro'] = 'off';
}
}

?>
