<?php

class grid_status_pembelian_rtf
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
      require_once($this->Ini->path_aplicacao . "grid_status_pembelian_total.class.php"); 
      $this->Tot      = new grid_status_pembelian_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_status_pembelian']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_status_pembelian";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_status_pembelian.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_status_pembelian']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_status_pembelian']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_status_pembelian']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->nomor = $Busca_temp['nomor']; 
          $tmp_pos = strpos($this->nomor, "##@@");
          if ($tmp_pos !== false && !is_array($this->nomor))
          {
              $this->nomor = substr($this->nomor, 0, $tmp_pos);
          }
          $this->vendor = $Busca_temp['vendor']; 
          $tmp_pos = strpos($this->vendor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendor))
          {
              $this->vendor = substr($this->vendor, 0, $tmp_pos);
          }
          $this->faktur = $Busca_temp['faktur']; 
          $tmp_pos = strpos($this->faktur, "##@@");
          if ($tmp_pos !== false && !is_array($this->faktur))
          {
              $this->faktur = substr($this->faktur, 0, $tmp_pos);
          }
          $this->jthtempo = $Busca_temp['jthtempo']; 
          $tmp_pos = strpos($this->jthtempo, "##@@");
          if ($tmp_pos !== false && !is_array($this->jthtempo))
          {
              $this->jthtempo = substr($this->jthtempo, 0, $tmp_pos);
          }
          $this->jthtempo_2 = $Busca_temp['jthtempo_input_2']; 
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['nomor'])) ? $this->New_label['nomor'] : "No"; 
          if ($Cada_col == "nomor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vendor'])) ? $this->New_label['vendor'] : "Perusahaan/Vendor"; 
          if ($Cada_col == "vendor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['faktur'])) ? $this->New_label['faktur'] : "No Faktur"; 
          if ($Cada_col == "faktur" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jthtempo'])) ? $this->New_label['jthtempo'] : "Jatuh Tempo"; 
          if ($Cada_col == "jthtempo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nobast'])) ? $this->New_label['nobast'] : "No BAST"; 
          if ($Cada_col == "nobast" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['s_po'])) ? $this->New_label['s_po'] : "Status PO"; 
          if ($Cada_col == "s_po" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['s_bast'])) ? $this->New_label['s_bast'] : "Status BAST"; 
          if ($Cada_col == "s_bast" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['s_ro'])) ? $this->New_label['s_ro'] : "Status RO"; 
          if ($Cada_col == "s_ro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['keterangan'])) ? $this->New_label['keterangan'] : "Keterangan"; 
          if ($Cada_col == "keterangan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT 	( @cnt := @cnt + 1 ) AS Nomor, IF 	( a.non_pbf = '' OR a.non_pbf IS NULL, b.pbfName, 'Non PBF' ) AS vendor, 	a.fakturNo AS faktur, 	a.jatuhTempo AS jthTempo, 	a.noBast AS noBast, IF 	( a.`status` = 'Proses' OR a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_po, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_bast, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_ro, 	a.note AS Keterangan  FROM 	tbpo a 	LEFT JOIN tbpbf b ON b.pbfCode = a.pbf 	CROSS JOIN ( SELECT @cnt := 0 ) AS dummy) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT Nomor, vendor, faktur, str_replace (convert(char(10),jthTempo,102), '.', '-') + ' ' + convert(char(8),jthTempo,20), noBast, s_po, s_bast, s_ro, Keterangan from (SELECT 	( @cnt := @cnt + 1 ) AS Nomor, IF 	( a.non_pbf = '' OR a.non_pbf IS NULL, b.pbfName, 'Non PBF' ) AS vendor, 	a.fakturNo AS faktur, 	a.jatuhTempo AS jthTempo, 	a.noBast AS noBast, IF 	( a.`status` = 'Proses' OR a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_po, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_bast, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_ro, 	a.note AS Keterangan  FROM 	tbpo a 	LEFT JOIN tbpbf b ON b.pbfCode = a.pbf 	CROSS JOIN ( SELECT @cnt := 0 ) AS dummy) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT Nomor, vendor, faktur, jthTempo, noBast, s_po, s_bast, s_ro, Keterangan from (SELECT 	( @cnt := @cnt + 1 ) AS Nomor, IF 	( a.non_pbf = '' OR a.non_pbf IS NULL, b.pbfName, 'Non PBF' ) AS vendor, 	a.fakturNo AS faktur, 	a.jatuhTempo AS jthTempo, 	a.noBast AS noBast, IF 	( a.`status` = 'Proses' OR a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_po, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_bast, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_ro, 	a.note AS Keterangan  FROM 	tbpo a 	LEFT JOIN tbpbf b ON b.pbfCode = a.pbf 	CROSS JOIN ( SELECT @cnt := 0 ) AS dummy) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT Nomor, vendor, faktur, convert(char(23),jthTempo,121), noBast, s_po, s_bast, s_ro, Keterangan from (SELECT 	( @cnt := @cnt + 1 ) AS Nomor, IF 	( a.non_pbf = '' OR a.non_pbf IS NULL, b.pbfName, 'Non PBF' ) AS vendor, 	a.fakturNo AS faktur, 	a.jatuhTempo AS jthTempo, 	a.noBast AS noBast, IF 	( a.`status` = 'Proses' OR a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_po, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_bast, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_ro, 	a.note AS Keterangan  FROM 	tbpo a 	LEFT JOIN tbpbf b ON b.pbfCode = a.pbf 	CROSS JOIN ( SELECT @cnt := 0 ) AS dummy) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT Nomor, vendor, faktur, jthTempo, noBast, s_po, s_bast, s_ro, Keterangan from (SELECT 	( @cnt := @cnt + 1 ) AS Nomor, IF 	( a.non_pbf = '' OR a.non_pbf IS NULL, b.pbfName, 'Non PBF' ) AS vendor, 	a.fakturNo AS faktur, 	a.jatuhTempo AS jthTempo, 	a.noBast AS noBast, IF 	( a.`status` = 'Proses' OR a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_po, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_bast, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_ro, 	a.note AS Keterangan  FROM 	tbpo a 	LEFT JOIN tbpbf b ON b.pbfCode = a.pbf 	CROSS JOIN ( SELECT @cnt := 0 ) AS dummy) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT Nomor, vendor, faktur, EXTEND(jthTempo, YEAR TO FRACTION), noBast, s_po, s_bast, s_ro, LOTOFILE(Keterangan, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_informix', 'client') as keterangan from (SELECT 	( @cnt := @cnt + 1 ) AS Nomor, IF 	( a.non_pbf = '' OR a.non_pbf IS NULL, b.pbfName, 'Non PBF' ) AS vendor, 	a.fakturNo AS faktur, 	a.jatuhTempo AS jthTempo, 	a.noBast AS noBast, IF 	( a.`status` = 'Proses' OR a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_po, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_bast, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_ro, 	a.note AS Keterangan  FROM 	tbpo a 	LEFT JOIN tbpbf b ON b.pbfCode = a.pbf 	CROSS JOIN ( SELECT @cnt := 0 ) AS dummy) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT Nomor, vendor, faktur, jthTempo, noBast, s_po, s_bast, s_ro, Keterangan from (SELECT 	( @cnt := @cnt + 1 ) AS Nomor, IF 	( a.non_pbf = '' OR a.non_pbf IS NULL, b.pbfName, 'Non PBF' ) AS vendor, 	a.fakturNo AS faktur, 	a.jatuhTempo AS jthTempo, 	a.noBast AS noBast, IF 	( a.`status` = 'Proses' OR a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_po, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_bast, IF 	( a.`status` = 'Selesai', 'Sudah', 'Belum' ) AS s_ro, 	a.note AS Keterangan  FROM 	tbpo a 	LEFT JOIN tbpbf b ON b.pbfCode = a.pbf 	CROSS JOIN ( SELECT @cnt := 0 ) AS dummy) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['order_grid'];
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
         $this->nomor = $rs->fields[0] ;  
         $this->nomor = (strpos(strtolower($this->nomor), "e")) ? (float)$this->nomor : $this->nomor; 
         $this->nomor = (string)$this->nomor;
         $this->vendor = $rs->fields[1] ;  
         $this->faktur = $rs->fields[2] ;  
         $this->jthtempo = $rs->fields[3] ;  
         $this->nobast = $rs->fields[4] ;  
         $this->s_po = $rs->fields[5] ;  
         $this->s_bast = $rs->fields[6] ;  
         $this->s_ro = $rs->fields[7] ;  
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $this->keterangan = "";  
              if (is_file($rs_grid->fields[8])) 
              { 
                  $this->keterangan = file_get_contents($rs_grid->fields[8]);  
              } 
          } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
         { 
             $this->keterangan = $this->Db->BlobDecode($rs->fields[8]) ;  
         } 
         else
         { 
             $this->keterangan = $rs->fields[8] ;  
         } 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_status_pembelian']['contr_erro'] = 'on';
 if ($this->s_po  == 'Sudah'){
	$this->NM_field_style["s_po"] = "background-color:green;";
	$this->NM_field_color["s_po"] = "#ffffff";
}else{
	$this->NM_field_style["s_po"] = "background-color:red;";
	$this->NM_field_color["s_po"] = "#000000";
}

if ($this->s_bast  == 'Sudah'){
	$this->NM_field_style["s_bast"] = "background-color:green;";
	$this->NM_field_color["s_bast"] = "#ffffff";
}else{
	$this->NM_field_style["s_bast"] = "background-color:red;";
	$this->NM_field_color["s_bast"] = "#000000";
}

if ($this->s_ro  == 'Sudah'){
	$this->NM_field_style["s_ro"] = "background-color:green;";
	$this->NM_field_color["s_ro"] = "#ffffff";
}else{
	$this->NM_field_style["s_ro"] = "background-color:red;";
	$this->NM_field_color["s_ro"] = "#000000";
}
$_SESSION['scriptcase']['grid_status_pembelian']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- nomor
   function NM_export_nomor()
   {
             nmgp_Form_Num_Val($this->nomor, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->nomor))
         {
             $this->nomor = sc_convert_encoding($this->nomor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nomor = str_replace('<', '&lt;', $this->nomor);
         $this->nomor = str_replace('>', '&gt;', $this->nomor);
         $this->Texto_tag .= "<td>" . $this->nomor . "</td>\r\n";
   }
   //----- vendor
   function NM_export_vendor()
   {
         $this->vendor = html_entity_decode($this->vendor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->vendor = strip_tags($this->vendor);
         if (!NM_is_utf8($this->vendor))
         {
             $this->vendor = sc_convert_encoding($this->vendor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->vendor = str_replace('<', '&lt;', $this->vendor);
         $this->vendor = str_replace('>', '&gt;', $this->vendor);
         $this->Texto_tag .= "<td>" . $this->vendor . "</td>\r\n";
   }
   //----- faktur
   function NM_export_faktur()
   {
         $this->faktur = html_entity_decode($this->faktur, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->faktur = strip_tags($this->faktur);
         if (!NM_is_utf8($this->faktur))
         {
             $this->faktur = sc_convert_encoding($this->faktur, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->faktur = str_replace('<', '&lt;', $this->faktur);
         $this->faktur = str_replace('>', '&gt;', $this->faktur);
         $this->Texto_tag .= "<td>" . $this->faktur . "</td>\r\n";
   }
   //----- jthtempo
   function NM_export_jthtempo()
   {
             $conteudo_x =  $this->jthtempo;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->jthtempo, "YYYY-MM-DD  ");
                 $this->jthtempo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa;hhiiss"));
             } 
         if (!NM_is_utf8($this->jthtempo))
         {
             $this->jthtempo = sc_convert_encoding($this->jthtempo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jthtempo = str_replace('<', '&lt;', $this->jthtempo);
         $this->jthtempo = str_replace('>', '&gt;', $this->jthtempo);
         $this->Texto_tag .= "<td>" . $this->jthtempo . "</td>\r\n";
   }
   //----- nobast
   function NM_export_nobast()
   {
         $this->nobast = html_entity_decode($this->nobast, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nobast = strip_tags($this->nobast);
         if (!NM_is_utf8($this->nobast))
         {
             $this->nobast = sc_convert_encoding($this->nobast, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nobast = str_replace('<', '&lt;', $this->nobast);
         $this->nobast = str_replace('>', '&gt;', $this->nobast);
         $this->Texto_tag .= "<td>" . $this->nobast . "</td>\r\n";
   }
   //----- s_po
   function NM_export_s_po()
   {
         $this->s_po = html_entity_decode($this->s_po, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->s_po = strip_tags($this->s_po);
         if (!NM_is_utf8($this->s_po))
         {
             $this->s_po = sc_convert_encoding($this->s_po, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->s_po = str_replace('<', '&lt;', $this->s_po);
         $this->s_po = str_replace('>', '&gt;', $this->s_po);
         $this->Texto_tag .= "<td>" . $this->s_po . "</td>\r\n";
   }
   //----- s_bast
   function NM_export_s_bast()
   {
         $this->s_bast = html_entity_decode($this->s_bast, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->s_bast = strip_tags($this->s_bast);
         if (!NM_is_utf8($this->s_bast))
         {
             $this->s_bast = sc_convert_encoding($this->s_bast, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->s_bast = str_replace('<', '&lt;', $this->s_bast);
         $this->s_bast = str_replace('>', '&gt;', $this->s_bast);
         $this->Texto_tag .= "<td>" . $this->s_bast . "</td>\r\n";
   }
   //----- s_ro
   function NM_export_s_ro()
   {
         $this->s_ro = html_entity_decode($this->s_ro, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->s_ro = strip_tags($this->s_ro);
         if (!NM_is_utf8($this->s_ro))
         {
             $this->s_ro = sc_convert_encoding($this->s_ro, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->s_ro = str_replace('<', '&lt;', $this->s_ro);
         $this->s_ro = str_replace('>', '&gt;', $this->s_ro);
         $this->Texto_tag .= "<td>" . $this->s_ro . "</td>\r\n";
   }
   //----- keterangan
   function NM_export_keterangan()
   {
         $this->keterangan = html_entity_decode($this->keterangan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->keterangan = strip_tags($this->keterangan);
         if (!NM_is_utf8($this->keterangan))
         {
             $this->keterangan = sc_convert_encoding($this->keterangan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->keterangan = str_replace('<', '&lt;', $this->keterangan);
         $this->keterangan = str_replace('>', '&gt;', $this->keterangan);
         $this->Texto_tag .= "<td>" . $this->keterangan . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_status_pembelian'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="grid_status_pembelian_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_status_pembelian"> 
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
