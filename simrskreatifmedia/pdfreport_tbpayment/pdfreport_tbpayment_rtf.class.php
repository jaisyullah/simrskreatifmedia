<?php

class pdfreport_tbpayment_rtf
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
      require_once($this->Ini->path_aplicacao . "pdfreport_tbpayment_total.class.php"); 
      $this->Tot      = new pdfreport_tbpayment_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_tbpayment']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_pdfreport_tbpayment";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "pdfreport_tbpayment.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['rtf_name']);
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['campos_busca'];
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
          $this->trancode = $Busca_temp['trancode']; 
          $tmp_pos = strpos($this->trancode, "##@@");
          if ($tmp_pos !== false && !is_array($this->trancode))
          {
              $this->trancode = substr($this->trancode, 0, $tmp_pos);
          }
          $this->nostruk = $Busca_temp['nostruk']; 
          $tmp_pos = strpos($this->nostruk, "##@@");
          if ($tmp_pos !== false && !is_array($this->nostruk))
          {
              $this->nostruk = substr($this->nostruk, 0, $tmp_pos);
          }
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
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Tran Code"; 
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
          $SC_Label = (isset($this->New_label['custcode'])) ? $this->New_label['custcode'] : "Cust Code"; 
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
          $SC_Label = (isset($this->New_label['poli'])) ? $this->New_label['poli'] : "Poli"; 
          if ($Cada_col == "poli" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['paiddate'])) ? $this->New_label['paiddate'] : "Paid Date"; 
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
          $SC_Label = (isset($this->New_label['nopayment'])) ? $this->New_label['nopayment'] : "No Payment"; 
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
          $SC_Label = (isset($this->New_label['jam'])) ? $this->New_label['jam'] : "Jam"; 
          if ($Cada_col == "jam" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['acc'])) ? $this->New_label['acc'] : "acc"; 
          if ($Cada_col == "acc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['alamat1'])) ? $this->New_label['alamat1'] : "alamat1"; 
          if ($Cada_col == "alamat1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['alamat2'])) ? $this->New_label['alamat2'] : "alamat2"; 
          if ($Cada_col == "alamat2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['bayar'])) ? $this->New_label['bayar'] : "bayar"; 
          if ($Cada_col == "bayar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['bukti_sah'])) ? $this->New_label['bukti_sah'] : "bukti_sah"; 
          if ($Cada_col == "bukti_sah" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['bukti_sah2'])) ? $this->New_label['bukti_sah2'] : "bukti_sah2"; 
          if ($Cada_col == "bukti_sah2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detail'])) ? $this->New_label['detail'] : "detail"; 
          if ($Cada_col == "detail" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detail_uraian'])) ? $this->New_label['detail_uraian'] : "URAIAN"; 
          if ($Cada_col == "detail_uraian" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detail_biaya'])) ? $this->New_label['detail_biaya'] : "Biaya"; 
          if ($Cada_col == "detail_biaya" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dok'])) ? $this->New_label['dok'] : "dok"; 
          if ($Cada_col == "dok" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['header'])) ? $this->New_label['header'] : "header"; 
          if ($Cada_col == "header" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jm'])) ? $this->New_label['jm'] : "jm"; 
          if ($Cada_col == "jm" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['kasir'])) ? $this->New_label['kasir'] : "kasir"; 
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
          $SC_Label = (isset($this->New_label['kembali'])) ? $this->New_label['kembali'] : "kembali"; 
          if ($Cada_col == "kembali" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ksr'])) ? $this->New_label['ksr'] : "ksr"; 
          if ($Cada_col == "ksr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['line'])) ? $this->New_label['line'] : "line"; 
          if ($Cada_col == "line" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['line2'])) ? $this->New_label['line2'] : "line2"; 
          if ($Cada_col == "line2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['line3'])) ? $this->New_label['line3'] : "line3"; 
          if ($Cada_col == "line3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo'])) ? $this->New_label['logo'] : "logo"; 
          if ($Cada_col == "logo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo10'])) ? $this->New_label['logo10'] : "logo10"; 
          if ($Cada_col == "logo10" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo11'])) ? $this->New_label['logo11'] : "logo11"; 
          if ($Cada_col == "logo11" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo12'])) ? $this->New_label['logo12'] : "logo12"; 
          if ($Cada_col == "logo12" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo2'])) ? $this->New_label['logo2'] : "logo2"; 
          if ($Cada_col == "logo2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo3'])) ? $this->New_label['logo3'] : "logo3"; 
          if ($Cada_col == "logo3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo4'])) ? $this->New_label['logo4'] : "logo4"; 
          if ($Cada_col == "logo4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo5'])) ? $this->New_label['logo5'] : "logo5"; 
          if ($Cada_col == "logo5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo6'])) ? $this->New_label['logo6'] : "logo6"; 
          if ($Cada_col == "logo6" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo7'])) ? $this->New_label['logo7'] : "logo7"; 
          if ($Cada_col == "logo7" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo8'])) ? $this->New_label['logo8'] : "logo8"; 
          if ($Cada_col == "logo8" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo9'])) ? $this->New_label['logo9'] : "logo9"; 
          if ($Cada_col == "logo9" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pasien'])) ? $this->New_label['pasien'] : "pasien"; 
          if ($Cada_col == "pasien" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pol'])) ? $this->New_label['pol'] : "pol"; 
          if ($Cada_col == "pol" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_bayar'])) ? $this->New_label['t_bayar'] : "t_bayar"; 
          if ($Cada_col == "t_bayar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['terbilang2'])) ? $this->New_label['terbilang2'] : "terbilang2"; 
          if ($Cada_col == "terbilang2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tgl'])) ? $this->New_label['tgl'] : "tgl"; 
          if ($Cada_col == "tgl" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "total"; 
          if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['u_p'])) ? $this->New_label['u_p'] : "u_p"; 
          if ($Cada_col == "u_p" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['uang'])) ? $this->New_label['uang'] : "uang"; 
          if ($Cada_col == "uang" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT tranCode, noStruk, custCode, dokter, dokter as poli, jmlTagihan, jmlBayar, hrsDibayar, str_replace (convert(char(10),tranDate,102), '.', '-') + ' ' + convert(char(8),tranDate,20), terimaDari, str_replace (convert(char(10),paidDate,102), '.', '-') + ' ' + convert(char(8),paidDate,20), noPayment from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tranCode, noStruk, custCode, dokter, dokter as poli, jmlTagihan, jmlBayar, hrsDibayar, tranDate, terimaDari, paidDate, noPayment from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT tranCode, noStruk, custCode, dokter, dokter as poli, jmlTagihan, jmlBayar, hrsDibayar, convert(char(23),tranDate,121), terimaDari, convert(char(23),paidDate,121), noPayment from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tranCode, noStruk, custCode, dokter, dokter as poli, jmlTagihan, jmlBayar, hrsDibayar, tranDate, terimaDari, paidDate, noPayment from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT tranCode, noStruk, custCode, dokter, dokter as poli, jmlTagihan, jmlBayar, hrsDibayar, EXTEND(tranDate, YEAR TO FRACTION), terimaDari, EXTEND(paidDate, YEAR TO FRACTION), noPayment from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT tranCode, noStruk, custCode, dokter, dokter as poli, jmlTagihan, jmlBayar, hrsDibayar, tranDate, terimaDari, paidDate, noPayment from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['order_grid'];
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
         $this->nostruk = $rs->fields[1] ;  
         $this->nostruk = (string)$this->nostruk;
         $this->custcode = $rs->fields[2] ;  
         $this->dokter = $rs->fields[3] ;  
         $this->poli = $rs->fields[4] ;  
         $this->jmltagihan = $rs->fields[5] ;  
         $this->jmltagihan =  str_replace(",", ".", $this->jmltagihan);
         $this->jmltagihan = (string)$this->jmltagihan;
         $this->jmlbayar = $rs->fields[6] ;  
         $this->jmlbayar =  str_replace(",", ".", $this->jmlbayar);
         $this->jmlbayar = (string)$this->jmlbayar;
         $this->hrsdibayar = $rs->fields[7] ;  
         $this->hrsdibayar =  str_replace(",", ".", $this->hrsdibayar);
         $this->hrsdibayar = (string)$this->hrsdibayar;
         $this->trandate = $rs->fields[8] ;  
         $this->terimadari = $rs->fields[9] ;  
         $this->paiddate = $rs->fields[10] ;  
         $this->nopayment = $rs->fields[11] ;  
         //----- lookup - nostruk
         $this->look_nostruk = $this->nostruk; 
         $this->Lookup->lookup_nostruk($this->look_nostruk, $this->trancode) ; 
         $this->look_nostruk = ($this->look_nostruk == "&nbsp;") ? "" : $this->look_nostruk; 
         //----- lookup - custcode
         $this->look_custcode = $this->custcode; 
         $this->Lookup->lookup_custcode($this->look_custcode, $this->custcode) ; 
         $this->look_custcode = ($this->look_custcode == "&nbsp;") ? "" : $this->look_custcode; 
         //----- lookup - dokter
         $this->look_dokter = $this->dokter; 
         $this->Lookup->lookup_dokter($this->look_dokter, $this->dokter) ; 
         $this->look_dokter = ($this->look_dokter == "&nbsp;") ? "" : $this->look_dokter; 
         //----- lookup - poli
         $this->look_poli = $this->poli; 
         $this->Lookup->lookup_poli($this->look_poli, $this->poli) ; 
         $this->look_poli = ($this->look_poli == "&nbsp;") ? "" : $this->look_poli; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  $this->kasir  = $this->sc_temp_usr_login;

$this->line  = '============================================';

$this->line2  = '============================================';

$this->line3  = '============================================';

$this->jam  = date("H:i:s");

$this->header   = 'RUMAH SAKIT AULIA';

$this->alamat1  = 'JL. Jeruk Raya No. 15 Jagakarsa, JakSel 12620';

$this->alamat2  = 'Telp. (021)7270208, 7866057 : Fax. (021)7270208';

$this->acc      = 'Terima Dari   :';

$this->uang     = 'Uang Sebanyak :';

$this->pasien   = 'Pasien        :';

$this->dok      = 'Dokter        :';

$this->pol      = 'Poli          :';

$this->t_bayar  = 'Tgl. Bayar    :';

$this->u_p      = 'Untuk Pembayaran';

$this->tgl      = 'Tgl   :';
	
$this->jm       = 'Jam   :';

$this->ksr      = 'Kasir :';

$this->total    = 'Total   :';
	
$this->bayar    = 'Bayar   :';

$this->kembali  = 'Kembali :';

$this->bukti_sah  = '(Bukti pembayaran ini sah jika dibubuhi';

$this->bukti_sah2  = 'cap/stempel RUMAH SAKIT AULIA)';


 


if($this->jmltagihan  < $this->jmlbayar ){
	$nilai = $this->jmltagihan ;
}else{
	$nilai = $this->jmlbayar ;
}

$terbilangs = $this->terbilang($nilai, $style=1)." RUPIAH";





$num_char = 25;

$cut_text2 = substr($terbilangs, 0, $num_char);
if ($terbilangs{$num_char - 1} != ' ') { 
	$new_pos2 = strrpos($cut_text2, ' '); 
	$cut_text2 = substr($this->terbilang, 0, $new_pos2);
}

$this->terbilang  = $this->cutText($terbilangs, 25);
$this->terbilang2  = $this->cutText2($terbilangs, 25);

$this->logo    = '         `-/+syyhddddddhyso+/-`         ';
$this->logo2   = '     ./shdddddddddy++ydddddddddyo:`     ';
$this->logo3   = '   :shhhhhhhhhhhdd-...hdhhhhhhhhhhhs:   ';
$this->logo4   = ' -yhhhhhhhhhhhhhddhooyddhhhhhhhhhhhhhs. ';
$this->logo5   = '-yyyyyyyyyddddddmhs/..odmdddddhyyyyyyyy.';
$this->logo6   = 'syyyyyyyyyddddddd:-y..-hddddddyyyyyyyyyo';
$this->logo7   = 'osssssssssdddddds..++../ddddddyssssssss+';
$this->logo8   = '.sssssssssyyyyyy-...y-..oyyyyysssssssso.';
$this->logo9   = ' .+ssssssssssss:....:o..-osssssssssss+` ';
$this->logo10  = '   ./oooooooooo+osssshss/oooooooooo/.   ';
$this->logo11  = '      .:+ooooooosyyyyyyyooooooo+:.      ';
$this->logo12  = '          `.-://++++++++//:-.`          ';

if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['export_sel_columns']['usr_cmp_sel']);
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
   //----- nostruk
   function NM_export_nostruk()
   {
         nmgp_Form_Num_Val($this->look_nostruk, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_nostruk))
         {
             $this->look_nostruk = sc_convert_encoding($this->look_nostruk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_nostruk = str_replace('<', '&lt;', $this->look_nostruk);
         $this->look_nostruk = str_replace('>', '&gt;', $this->look_nostruk);
         $this->Texto_tag .= "<td>" . $this->look_nostruk . "</td>\r\n";
   }
   //----- custcode
   function NM_export_custcode()
   {
         $this->look_custcode = html_entity_decode($this->look_custcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
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
         if (!NM_is_utf8($this->look_dokter))
         {
             $this->look_dokter = sc_convert_encoding($this->look_dokter, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_dokter = str_replace('<', '&lt;', $this->look_dokter);
         $this->look_dokter = str_replace('>', '&gt;', $this->look_dokter);
         $this->Texto_tag .= "<td>" . $this->look_dokter . "</td>\r\n";
   }
   //----- poli
   function NM_export_poli()
   {
         $this->look_poli = html_entity_decode($this->look_poli, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->look_poli))
         {
             $this->look_poli = sc_convert_encoding($this->look_poli, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_poli = str_replace('<', '&lt;', $this->look_poli);
         $this->look_poli = str_replace('>', '&gt;', $this->look_poli);
         $this->Texto_tag .= "<td>" . $this->look_poli . "</td>\r\n";
   }
   //----- jmltagihan
   function NM_export_jmltagihan()
   {
             nmgp_Form_Num_Val($this->jmltagihan, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
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
             nmgp_Form_Num_Val($this->jmlbayar, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->jmlbayar))
         {
             $this->jmlbayar = sc_convert_encoding($this->jmlbayar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jmlbayar = str_replace('<', '&lt;', $this->jmlbayar);
         $this->jmlbayar = str_replace('>', '&gt;', $this->jmlbayar);
         $this->Texto_tag .= "<td>" . $this->jmlbayar . "</td>\r\n";
   }
   //----- hrsdibayar
   function NM_export_hrsdibayar()
   {
             nmgp_Form_Num_Val($this->hrsdibayar, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
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
                 $this->trandate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa"));
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
   //----- jam
   function NM_export_jam()
   {
         $this->jam = html_entity_decode($this->jam, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->jam))
         {
             $this->jam = sc_convert_encoding($this->jam, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jam = str_replace('<', '&lt;', $this->jam);
         $this->jam = str_replace('>', '&gt;', $this->jam);
         $this->Texto_tag .= "<td>" . $this->jam . "</td>\r\n";
   }
   //----- acc
   function NM_export_acc()
   {
         $this->acc = html_entity_decode($this->acc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->acc = strip_tags($this->acc);
         if (!NM_is_utf8($this->acc))
         {
             $this->acc = sc_convert_encoding($this->acc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->acc = str_replace('<', '&lt;', $this->acc);
         $this->acc = str_replace('>', '&gt;', $this->acc);
         $this->Texto_tag .= "<td>" . $this->acc . "</td>\r\n";
   }
   //----- alamat1
   function NM_export_alamat1()
   {
         $this->alamat1 = html_entity_decode($this->alamat1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->alamat1 = strip_tags($this->alamat1);
         if (!NM_is_utf8($this->alamat1))
         {
             $this->alamat1 = sc_convert_encoding($this->alamat1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->alamat1 = str_replace('<', '&lt;', $this->alamat1);
         $this->alamat1 = str_replace('>', '&gt;', $this->alamat1);
         $this->Texto_tag .= "<td>" . $this->alamat1 . "</td>\r\n";
   }
   //----- alamat2
   function NM_export_alamat2()
   {
         $this->alamat2 = html_entity_decode($this->alamat2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->alamat2 = strip_tags($this->alamat2);
         if (!NM_is_utf8($this->alamat2))
         {
             $this->alamat2 = sc_convert_encoding($this->alamat2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->alamat2 = str_replace('<', '&lt;', $this->alamat2);
         $this->alamat2 = str_replace('>', '&gt;', $this->alamat2);
         $this->Texto_tag .= "<td>" . $this->alamat2 . "</td>\r\n";
   }
   //----- bayar
   function NM_export_bayar()
   {
         $this->bayar = html_entity_decode($this->bayar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->bayar = strip_tags($this->bayar);
         if (!NM_is_utf8($this->bayar))
         {
             $this->bayar = sc_convert_encoding($this->bayar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->bayar = str_replace('<', '&lt;', $this->bayar);
         $this->bayar = str_replace('>', '&gt;', $this->bayar);
         $this->Texto_tag .= "<td>" . $this->bayar . "</td>\r\n";
   }
   //----- bukti_sah
   function NM_export_bukti_sah()
   {
         $this->bukti_sah = html_entity_decode($this->bukti_sah, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->bukti_sah = strip_tags($this->bukti_sah);
         if (!NM_is_utf8($this->bukti_sah))
         {
             $this->bukti_sah = sc_convert_encoding($this->bukti_sah, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->bukti_sah = str_replace('<', '&lt;', $this->bukti_sah);
         $this->bukti_sah = str_replace('>', '&gt;', $this->bukti_sah);
         $this->Texto_tag .= "<td>" . $this->bukti_sah . "</td>\r\n";
   }
   //----- bukti_sah2
   function NM_export_bukti_sah2()
   {
         $this->bukti_sah2 = html_entity_decode($this->bukti_sah2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->bukti_sah2 = strip_tags($this->bukti_sah2);
         if (!NM_is_utf8($this->bukti_sah2))
         {
             $this->bukti_sah2 = sc_convert_encoding($this->bukti_sah2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->bukti_sah2 = str_replace('<', '&lt;', $this->bukti_sah2);
         $this->bukti_sah2 = str_replace('>', '&gt;', $this->bukti_sah2);
         $this->Texto_tag .= "<td>" . $this->bukti_sah2 . "</td>\r\n";
   }
   //----- detail
   function NM_export_detail()
   {
         if (!NM_is_utf8($this->detail))
         {
             $this->detail = sc_convert_encoding($this->detail, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->detail = str_replace('<', '&lt;', $this->detail);
         $this->detail = str_replace('>', '&gt;', $this->detail);
         $this->Texto_tag .= "<td>" . $this->detail . "</td>\r\n";
   }
   //----- detail_uraian
   function NM_export_detail_uraian()
   {
         $this->detail_uraian = html_entity_decode($this->detail_uraian, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detail_uraian = strip_tags($this->detail_uraian);
         if (!NM_is_utf8($this->detail_uraian))
         {
             $this->detail_uraian = sc_convert_encoding($this->detail_uraian, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->detail_uraian = str_replace('<', '&lt;', $this->detail_uraian);
         $this->detail_uraian = str_replace('>', '&gt;', $this->detail_uraian);
         $this->Texto_tag .= "<td>" . $this->detail_uraian . "</td>\r\n";
   }
   //----- detail_biaya
   function NM_export_detail_biaya()
   {
             nmgp_Form_Num_Val($this->detail_biaya, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->detail_biaya))
         {
             $this->detail_biaya = sc_convert_encoding($this->detail_biaya, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->detail_biaya = str_replace('<', '&lt;', $this->detail_biaya);
         $this->detail_biaya = str_replace('>', '&gt;', $this->detail_biaya);
         $this->Texto_tag .= "<td>" . $this->detail_biaya . "</td>\r\n";
   }
   //----- dok
   function NM_export_dok()
   {
         $this->dok = html_entity_decode($this->dok, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dok = strip_tags($this->dok);
         if (!NM_is_utf8($this->dok))
         {
             $this->dok = sc_convert_encoding($this->dok, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->dok = str_replace('<', '&lt;', $this->dok);
         $this->dok = str_replace('>', '&gt;', $this->dok);
         $this->Texto_tag .= "<td>" . $this->dok . "</td>\r\n";
   }
   //----- header
   function NM_export_header()
   {
         $this->header = html_entity_decode($this->header, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->header = strip_tags($this->header);
         if (!NM_is_utf8($this->header))
         {
             $this->header = sc_convert_encoding($this->header, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->header = str_replace('<', '&lt;', $this->header);
         $this->header = str_replace('>', '&gt;', $this->header);
         $this->Texto_tag .= "<td>" . $this->header . "</td>\r\n";
   }
   //----- jm
   function NM_export_jm()
   {
         $this->jm = html_entity_decode($this->jm, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->jm = strip_tags($this->jm);
         if (!NM_is_utf8($this->jm))
         {
             $this->jm = sc_convert_encoding($this->jm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jm = str_replace('<', '&lt;', $this->jm);
         $this->jm = str_replace('>', '&gt;', $this->jm);
         $this->Texto_tag .= "<td>" . $this->jm . "</td>\r\n";
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
   //----- kembali
   function NM_export_kembali()
   {
         $this->kembali = html_entity_decode($this->kembali, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kembali = strip_tags($this->kembali);
         if (!NM_is_utf8($this->kembali))
         {
             $this->kembali = sc_convert_encoding($this->kembali, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->kembali = str_replace('<', '&lt;', $this->kembali);
         $this->kembali = str_replace('>', '&gt;', $this->kembali);
         $this->Texto_tag .= "<td>" . $this->kembali . "</td>\r\n";
   }
   //----- ksr
   function NM_export_ksr()
   {
         $this->ksr = html_entity_decode($this->ksr, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ksr = strip_tags($this->ksr);
         if (!NM_is_utf8($this->ksr))
         {
             $this->ksr = sc_convert_encoding($this->ksr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ksr = str_replace('<', '&lt;', $this->ksr);
         $this->ksr = str_replace('>', '&gt;', $this->ksr);
         $this->Texto_tag .= "<td>" . $this->ksr . "</td>\r\n";
   }
   //----- line
   function NM_export_line()
   {
         $this->line = html_entity_decode($this->line, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->line = strip_tags($this->line);
         if (!NM_is_utf8($this->line))
         {
             $this->line = sc_convert_encoding($this->line, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->line = str_replace('<', '&lt;', $this->line);
         $this->line = str_replace('>', '&gt;', $this->line);
         $this->Texto_tag .= "<td>" . $this->line . "</td>\r\n";
   }
   //----- line2
   function NM_export_line2()
   {
         $this->line2 = html_entity_decode($this->line2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->line2 = strip_tags($this->line2);
         if (!NM_is_utf8($this->line2))
         {
             $this->line2 = sc_convert_encoding($this->line2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->line2 = str_replace('<', '&lt;', $this->line2);
         $this->line2 = str_replace('>', '&gt;', $this->line2);
         $this->Texto_tag .= "<td>" . $this->line2 . "</td>\r\n";
   }
   //----- line3
   function NM_export_line3()
   {
         $this->line3 = html_entity_decode($this->line3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->line3 = strip_tags($this->line3);
         if (!NM_is_utf8($this->line3))
         {
             $this->line3 = sc_convert_encoding($this->line3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->line3 = str_replace('<', '&lt;', $this->line3);
         $this->line3 = str_replace('>', '&gt;', $this->line3);
         $this->Texto_tag .= "<td>" . $this->line3 . "</td>\r\n";
   }
   //----- logo
   function NM_export_logo()
   {
         $this->logo = html_entity_decode($this->logo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->logo = strip_tags($this->logo);
         if (!NM_is_utf8($this->logo))
         {
             $this->logo = sc_convert_encoding($this->logo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo = str_replace('<', '&lt;', $this->logo);
         $this->logo = str_replace('>', '&gt;', $this->logo);
         $this->Texto_tag .= "<td>" . $this->logo . "</td>\r\n";
   }
   //----- logo10
   function NM_export_logo10()
   {
         $this->logo10 = html_entity_decode($this->logo10, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->logo10 = strip_tags($this->logo10);
         if (!NM_is_utf8($this->logo10))
         {
             $this->logo10 = sc_convert_encoding($this->logo10, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo10 = str_replace('<', '&lt;', $this->logo10);
         $this->logo10 = str_replace('>', '&gt;', $this->logo10);
         $this->Texto_tag .= "<td>" . $this->logo10 . "</td>\r\n";
   }
   //----- logo11
   function NM_export_logo11()
   {
         $this->logo11 = html_entity_decode($this->logo11, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->logo11 = strip_tags($this->logo11);
         if (!NM_is_utf8($this->logo11))
         {
             $this->logo11 = sc_convert_encoding($this->logo11, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo11 = str_replace('<', '&lt;', $this->logo11);
         $this->logo11 = str_replace('>', '&gt;', $this->logo11);
         $this->Texto_tag .= "<td>" . $this->logo11 . "</td>\r\n";
   }
   //----- logo12
   function NM_export_logo12()
   {
         $this->logo12 = html_entity_decode($this->logo12, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->logo12 = strip_tags($this->logo12);
         if (!NM_is_utf8($this->logo12))
         {
             $this->logo12 = sc_convert_encoding($this->logo12, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo12 = str_replace('<', '&lt;', $this->logo12);
         $this->logo12 = str_replace('>', '&gt;', $this->logo12);
         $this->Texto_tag .= "<td>" . $this->logo12 . "</td>\r\n";
   }
   //----- logo2
   function NM_export_logo2()
   {
         $this->logo2 = html_entity_decode($this->logo2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->logo2 = strip_tags($this->logo2);
         if (!NM_is_utf8($this->logo2))
         {
             $this->logo2 = sc_convert_encoding($this->logo2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo2 = str_replace('<', '&lt;', $this->logo2);
         $this->logo2 = str_replace('>', '&gt;', $this->logo2);
         $this->Texto_tag .= "<td>" . $this->logo2 . "</td>\r\n";
   }
   //----- logo3
   function NM_export_logo3()
   {
         $this->logo3 = html_entity_decode($this->logo3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->logo3 = strip_tags($this->logo3);
         if (!NM_is_utf8($this->logo3))
         {
             $this->logo3 = sc_convert_encoding($this->logo3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo3 = str_replace('<', '&lt;', $this->logo3);
         $this->logo3 = str_replace('>', '&gt;', $this->logo3);
         $this->Texto_tag .= "<td>" . $this->logo3 . "</td>\r\n";
   }
   //----- logo4
   function NM_export_logo4()
   {
         $this->logo4 = html_entity_decode($this->logo4, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->logo4 = strip_tags($this->logo4);
         if (!NM_is_utf8($this->logo4))
         {
             $this->logo4 = sc_convert_encoding($this->logo4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo4 = str_replace('<', '&lt;', $this->logo4);
         $this->logo4 = str_replace('>', '&gt;', $this->logo4);
         $this->Texto_tag .= "<td>" . $this->logo4 . "</td>\r\n";
   }
   //----- logo5
   function NM_export_logo5()
   {
         $this->logo5 = html_entity_decode($this->logo5, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->logo5 = strip_tags($this->logo5);
         if (!NM_is_utf8($this->logo5))
         {
             $this->logo5 = sc_convert_encoding($this->logo5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo5 = str_replace('<', '&lt;', $this->logo5);
         $this->logo5 = str_replace('>', '&gt;', $this->logo5);
         $this->Texto_tag .= "<td>" . $this->logo5 . "</td>\r\n";
   }
   //----- logo6
   function NM_export_logo6()
   {
         $this->logo6 = html_entity_decode($this->logo6, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->logo6 = strip_tags($this->logo6);
         if (!NM_is_utf8($this->logo6))
         {
             $this->logo6 = sc_convert_encoding($this->logo6, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo6 = str_replace('<', '&lt;', $this->logo6);
         $this->logo6 = str_replace('>', '&gt;', $this->logo6);
         $this->Texto_tag .= "<td>" . $this->logo6 . "</td>\r\n";
   }
   //----- logo7
   function NM_export_logo7()
   {
         $this->logo7 = html_entity_decode($this->logo7, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->logo7 = strip_tags($this->logo7);
         if (!NM_is_utf8($this->logo7))
         {
             $this->logo7 = sc_convert_encoding($this->logo7, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo7 = str_replace('<', '&lt;', $this->logo7);
         $this->logo7 = str_replace('>', '&gt;', $this->logo7);
         $this->Texto_tag .= "<td>" . $this->logo7 . "</td>\r\n";
   }
   //----- logo8
   function NM_export_logo8()
   {
         $this->logo8 = html_entity_decode($this->logo8, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->logo8 = strip_tags($this->logo8);
         if (!NM_is_utf8($this->logo8))
         {
             $this->logo8 = sc_convert_encoding($this->logo8, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo8 = str_replace('<', '&lt;', $this->logo8);
         $this->logo8 = str_replace('>', '&gt;', $this->logo8);
         $this->Texto_tag .= "<td>" . $this->logo8 . "</td>\r\n";
   }
   //----- logo9
   function NM_export_logo9()
   {
         $this->logo9 = html_entity_decode($this->logo9, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->logo9 = strip_tags($this->logo9);
         if (!NM_is_utf8($this->logo9))
         {
             $this->logo9 = sc_convert_encoding($this->logo9, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo9 = str_replace('<', '&lt;', $this->logo9);
         $this->logo9 = str_replace('>', '&gt;', $this->logo9);
         $this->Texto_tag .= "<td>" . $this->logo9 . "</td>\r\n";
   }
   //----- pasien
   function NM_export_pasien()
   {
         $this->pasien = html_entity_decode($this->pasien, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pasien = strip_tags($this->pasien);
         if (!NM_is_utf8($this->pasien))
         {
             $this->pasien = sc_convert_encoding($this->pasien, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->pasien = str_replace('<', '&lt;', $this->pasien);
         $this->pasien = str_replace('>', '&gt;', $this->pasien);
         $this->Texto_tag .= "<td>" . $this->pasien . "</td>\r\n";
   }
   //----- pol
   function NM_export_pol()
   {
         $this->pol = html_entity_decode($this->pol, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pol = strip_tags($this->pol);
         if (!NM_is_utf8($this->pol))
         {
             $this->pol = sc_convert_encoding($this->pol, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->pol = str_replace('<', '&lt;', $this->pol);
         $this->pol = str_replace('>', '&gt;', $this->pol);
         $this->Texto_tag .= "<td>" . $this->pol . "</td>\r\n";
   }
   //----- t_bayar
   function NM_export_t_bayar()
   {
         $this->t_bayar = html_entity_decode($this->t_bayar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->t_bayar = strip_tags($this->t_bayar);
         if (!NM_is_utf8($this->t_bayar))
         {
             $this->t_bayar = sc_convert_encoding($this->t_bayar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->t_bayar = str_replace('<', '&lt;', $this->t_bayar);
         $this->t_bayar = str_replace('>', '&gt;', $this->t_bayar);
         $this->Texto_tag .= "<td>" . $this->t_bayar . "</td>\r\n";
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
   //----- terbilang2
   function NM_export_terbilang2()
   {
         $this->terbilang2 = html_entity_decode($this->terbilang2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->terbilang2 = strip_tags($this->terbilang2);
         if (!NM_is_utf8($this->terbilang2))
         {
             $this->terbilang2 = sc_convert_encoding($this->terbilang2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->terbilang2 = str_replace('<', '&lt;', $this->terbilang2);
         $this->terbilang2 = str_replace('>', '&gt;', $this->terbilang2);
         $this->Texto_tag .= "<td>" . $this->terbilang2 . "</td>\r\n";
   }
   //----- tgl
   function NM_export_tgl()
   {
         $this->tgl = html_entity_decode($this->tgl, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tgl = strip_tags($this->tgl);
         if (!NM_is_utf8($this->tgl))
         {
             $this->tgl = sc_convert_encoding($this->tgl, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tgl = str_replace('<', '&lt;', $this->tgl);
         $this->tgl = str_replace('>', '&gt;', $this->tgl);
         $this->Texto_tag .= "<td>" . $this->tgl . "</td>\r\n";
   }
   //----- total
   function NM_export_total()
   {
         $this->total = html_entity_decode($this->total, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->total = strip_tags($this->total);
         if (!NM_is_utf8($this->total))
         {
             $this->total = sc_convert_encoding($this->total, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->total = str_replace('<', '&lt;', $this->total);
         $this->total = str_replace('>', '&gt;', $this->total);
         $this->Texto_tag .= "<td>" . $this->total . "</td>\r\n";
   }
   //----- u_p
   function NM_export_u_p()
   {
         $this->u_p = html_entity_decode($this->u_p, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->u_p = strip_tags($this->u_p);
         if (!NM_is_utf8($this->u_p))
         {
             $this->u_p = sc_convert_encoding($this->u_p, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->u_p = str_replace('<', '&lt;', $this->u_p);
         $this->u_p = str_replace('>', '&gt;', $this->u_p);
         $this->Texto_tag .= "<td>" . $this->u_p . "</td>\r\n";
   }
   //----- uang
   function NM_export_uang()
   {
         $this->uang = html_entity_decode($this->uang, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->uang = strip_tags($this->uang);
         if (!NM_is_utf8($this->uang))
         {
             $this->uang = sc_convert_encoding($this->uang, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->uang = str_replace('<', '&lt;', $this->uang);
         $this->uang = str_replace('>', '&gt;', $this->uang);
         $this->Texto_tag .= "<td>" . $this->uang . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_title'] ?> tbpayment :: RTF</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_tbpayment_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_tbpayment"> 
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
function kekata($x) {
$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'on';
  
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

$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'off';
}
function terbilang($x, $style=4) {
$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'on';
  
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

$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'off';
}
function cutText($text, $length, $mode = 2)
{
$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'on';
  
	if ($mode != 1)
	{
		$char = $text{$length - 1};
		switch($mode)
		{
			case 2: 
				while($char != ' ') {
					$char = $text{--$length};
				}
			case 3:
				while($char != ' ') {
					$char = $text{++$num_char};
				}
		}
	}
	return substr($text, 0, $length);

$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'off';
}
function cutText2($text, $length, $mode = 2)
{
$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'on';
  
	if ($mode != 1)
	{
		$char = $text{$length - 1};
		switch($mode)
		{
			case 2: 
				while($char != ' ') {
					$char = $text{--$length};
				}
			case 3:
				while($char != ' ') {
					$char = $text{++$num_char};
				}
		}
	}
	return substr($text, 25, $length);

$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'off';
}
}

?>
