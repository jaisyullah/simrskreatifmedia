<?php

class grid_lap_bill_ranap_rtf
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
      require_once($this->Ini->path_aplicacao . "grid_lap_bill_ranap_total.class.php"); 
      $this->Tot      = new grid_lap_bill_ranap_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_lap_bill_ranap']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_lap_bill_ranap";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_lap_bill_ranap.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['rtf_name']);
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

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['rm'])) ? $this->New_label['rm'] : "RM"; 
          if ($Cada_col == "rm" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pasien'])) ? $this->New_label['pasien'] : "Pasien"; 
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
          $SC_Label = (isset($this->New_label['carabayar'])) ? $this->New_label['carabayar'] : "Cara Bayar"; 
          if ($Cada_col == "carabayar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tglmasuk'])) ? $this->New_label['tglmasuk'] : "Tgl Masuk"; 
          if ($Cada_col == "tglmasuk" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tglkeluar'])) ? $this->New_label['tglkeluar'] : "Tgl Keluar"; 
          if ($Cada_col == "tglkeluar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dpjp'])) ? $this->New_label['dpjp'] : "DPJP"; 
          if ($Cada_col == "dpjp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Status Keluar"; 
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
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
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
          $SC_Label = (isset($this->New_label['verifstatus'])) ? $this->New_label['verifstatus'] : "Verif Status"; 
          if ($Cada_col == "verifstatus" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['verifiedby'])) ? $this->New_label['verifiedby'] : "Verified Oleh"; 
          if ($Cada_col == "verifiedby" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['selisih'])) ? $this->New_label['selisih'] : "Selisih"; 
          if ($Cada_col == "selisih" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['e_kelas'])) ? $this->New_label['e_kelas'] : "Hak Kelas"; 
          if ($Cada_col == "e_kelas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
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
      } 
      $this->Texto_tag .= "</tr>\r\n";
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
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
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
   //----- rm
   function NM_export_rm()
   {
         $this->rm = html_entity_decode($this->rm, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rm = strip_tags($this->rm);
         if (!NM_is_utf8($this->rm))
         {
             $this->rm = sc_convert_encoding($this->rm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rm = str_replace('<', '&lt;', $this->rm);
         $this->rm = str_replace('>', '&gt;', $this->rm);
         $this->Texto_tag .= "<td>" . $this->rm . "</td>\r\n";
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
   //----- carabayar
   function NM_export_carabayar()
   {
         $this->carabayar = html_entity_decode($this->carabayar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->carabayar = strip_tags($this->carabayar);
         if (!NM_is_utf8($this->carabayar))
         {
             $this->carabayar = sc_convert_encoding($this->carabayar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->carabayar = str_replace('<', '&lt;', $this->carabayar);
         $this->carabayar = str_replace('>', '&gt;', $this->carabayar);
         $this->Texto_tag .= "<td>" . $this->carabayar . "</td>\r\n";
   }
   //----- tglmasuk
   function NM_export_tglmasuk()
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
         if (!NM_is_utf8($this->tglmasuk))
         {
             $this->tglmasuk = sc_convert_encoding($this->tglmasuk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tglmasuk = str_replace('<', '&lt;', $this->tglmasuk);
         $this->tglmasuk = str_replace('>', '&gt;', $this->tglmasuk);
         $this->Texto_tag .= "<td>" . $this->tglmasuk . "</td>\r\n";
   }
   //----- tglkeluar
   function NM_export_tglkeluar()
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
         if (!NM_is_utf8($this->tglkeluar))
         {
             $this->tglkeluar = sc_convert_encoding($this->tglkeluar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tglkeluar = str_replace('<', '&lt;', $this->tglkeluar);
         $this->tglkeluar = str_replace('>', '&gt;', $this->tglkeluar);
         $this->Texto_tag .= "<td>" . $this->tglkeluar . "</td>\r\n";
   }
   //----- dpjp
   function NM_export_dpjp()
   {
         $this->dpjp = html_entity_decode($this->dpjp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dpjp = strip_tags($this->dpjp);
         if (!NM_is_utf8($this->dpjp))
         {
             $this->dpjp = sc_convert_encoding($this->dpjp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->dpjp = str_replace('<', '&lt;', $this->dpjp);
         $this->dpjp = str_replace('>', '&gt;', $this->dpjp);
         $this->Texto_tag .= "<td>" . $this->dpjp . "</td>\r\n";
   }
   //----- poli
   function NM_export_poli()
   {
         $this->poli = html_entity_decode($this->poli, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->poli = strip_tags($this->poli);
         if (!NM_is_utf8($this->poli))
         {
             $this->poli = sc_convert_encoding($this->poli, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->poli = str_replace('<', '&lt;', $this->poli);
         $this->poli = str_replace('>', '&gt;', $this->poli);
         $this->Texto_tag .= "<td>" . $this->poli . "</td>\r\n";
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
         $this->sc_field_0 = html_entity_decode($this->sc_field_0, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_0 = strip_tags($this->sc_field_0);
         if (!NM_is_utf8($this->sc_field_0))
         {
             $this->sc_field_0 = sc_convert_encoding($this->sc_field_0, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_0 = str_replace('<', '&lt;', $this->sc_field_0);
         $this->sc_field_0 = str_replace('>', '&gt;', $this->sc_field_0);
         $this->Texto_tag .= "<td>" . $this->sc_field_0 . "</td>\r\n";
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, ".", ",", "2", "S", "1", "Rp", "V:3:3", "-"); 
         if (!NM_is_utf8($this->total))
         {
             $this->total = sc_convert_encoding($this->total, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->total = str_replace('<', '&lt;', $this->total);
         $this->total = str_replace('>', '&gt;', $this->total);
         $this->Texto_tag .= "<td>" . $this->total . "</td>\r\n";
   }
   //----- verifstatus
   function NM_export_verifstatus()
   {
         $this->verifstatus = html_entity_decode($this->verifstatus, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->verifstatus = strip_tags($this->verifstatus);
         if (!NM_is_utf8($this->verifstatus))
         {
             $this->verifstatus = sc_convert_encoding($this->verifstatus, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->verifstatus = str_replace('<', '&lt;', $this->verifstatus);
         $this->verifstatus = str_replace('>', '&gt;', $this->verifstatus);
         $this->Texto_tag .= "<td>" . $this->verifstatus . "</td>\r\n";
   }
   //----- verifiedby
   function NM_export_verifiedby()
   {
         $this->verifiedby = html_entity_decode($this->verifiedby, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->verifiedby = strip_tags($this->verifiedby);
         if (!NM_is_utf8($this->verifiedby))
         {
             $this->verifiedby = sc_convert_encoding($this->verifiedby, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->verifiedby = str_replace('<', '&lt;', $this->verifiedby);
         $this->verifiedby = str_replace('>', '&gt;', $this->verifiedby);
         $this->Texto_tag .= "<td>" . $this->verifiedby . "</td>\r\n";
   }
   //----- deposit
   function NM_export_deposit()
   {
             nmgp_Form_Num_Val($this->deposit, ".", ",", "2", "S", "1", "Rp", "V:3:13", "-"); 
         if (!NM_is_utf8($this->deposit))
         {
             $this->deposit = sc_convert_encoding($this->deposit, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->deposit = str_replace('<', '&lt;', $this->deposit);
         $this->deposit = str_replace('>', '&gt;', $this->deposit);
         $this->Texto_tag .= "<td>" . $this->deposit . "</td>\r\n";
   }
   //----- selisih
   function NM_export_selisih()
   {
             nmgp_Form_Num_Val($this->selisih, ".", ",", "2", "S", "1", "Rp", "V:3:3", "-"); 
         if (!NM_is_utf8($this->selisih))
         {
             $this->selisih = sc_convert_encoding($this->selisih, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->selisih = str_replace('<', '&lt;', $this->selisih);
         $this->selisih = str_replace('>', '&gt;', $this->selisih);
         $this->Texto_tag .= "<td>" . $this->selisih . "</td>\r\n";
   }
   //----- e_kelas
   function NM_export_e_kelas()
   {
         $this->e_kelas = html_entity_decode($this->e_kelas, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->e_kelas = strip_tags($this->e_kelas);
         if (!NM_is_utf8($this->e_kelas))
         {
             $this->e_kelas = sc_convert_encoding($this->e_kelas, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->e_kelas = str_replace('<', '&lt;', $this->e_kelas);
         $this->e_kelas = str_replace('>', '&gt;', $this->e_kelas);
         $this->Texto_tag .= "<td>" . $this->e_kelas . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_lap_bill_ranap'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="grid_lap_bill_ranap_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_lap_bill_ranap"> 
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
