<?php

class PO_gizi_rtf
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
      require_once($this->Ini->path_aplicacao . "PO_gizi_total.class.php"); 
      $this->Tot      = new PO_gizi_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['PO_gizi']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_PO_gizi";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "PO_gizi.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['rtf_name']);
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->a_nopo = $Busca_temp['a_nopo']; 
          $tmp_pos = strpos($this->a_nopo, "##@@");
          if ($tmp_pos !== false && !is_array($this->a_nopo))
          {
              $this->a_nopo = substr($this->a_nopo, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['a_nopo'])) ? $this->New_label['a_nopo'] : "No PO"; 
          if ($Cada_col == "a_nopo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['grandtotal'])) ? $this->New_label['grandtotal'] : "Grandtotal"; 
          if ($Cada_col == "grandtotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['supplier'])) ? $this->New_label['supplier'] : "Supplier"; 
          if ($Cada_col == "supplier" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['barcode'])) ? $this->New_label['barcode'] : "Barcode"; 
          if ($Cada_col == "barcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ppn'])) ? $this->New_label['ppn'] : "Ppn"; 
          if ($Cada_col == "ppn" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['diskon'])) ? $this->New_label['diskon'] : "Diskon"; 
          if ($Cada_col == "diskon" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "PIC Acc"; 
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
          $SC_Label = (isset($this->New_label['sc_field_1'])) ? $this->New_label['sc_field_1'] : "SPV Acc"; 
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
          $SC_Label = (isset($this->New_label['sc_field_2'])) ? $this->New_label['sc_field_2'] : "Wadir Acc"; 
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
          $SC_Label = (isset($this->New_label['sgizi'])) ? $this->New_label['sgizi'] : "sgizi"; 
          if ($Cada_col == "sgizi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sgizi_bahan'])) ? $this->New_label['sgizi_bahan'] : "Bahan"; 
          if ($Cada_col == "sgizi_bahan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_4'])) ? $this->New_label['sc_field_4'] : "Harga Satuan"; 
          if ($Cada_col == "sc_field_4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sgizi_n'])) ? $this->New_label['sgizi_n'] : "N"; 
          if ($Cada_col == "sgizi_n" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sgizi_qty'])) ? $this->New_label['sgizi_qty'] : "Qty"; 
          if ($Cada_col == "sgizi_qty" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sgizi_satuan'])) ? $this->New_label['sgizi_satuan'] : "Satuan"; 
          if ($Cada_col == "sgizi_satuan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sgizi_stock'])) ? $this->New_label['sgizi_stock'] : "Stock"; 
          if ($Cada_col == "sgizi_stock" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sgizi_subtotal'])) ? $this->New_label['sgizi_subtotal'] : "Subtotal"; 
          if ($Cada_col == "sgizi_subtotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sgizi_supplier'])) ? $this->New_label['sgizi_supplier'] : "Supplier"; 
          if ($Cada_col == "sgizi_supplier" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT a.noPO as a_nopo, (sum(b.refharga * b.disetujui))-(sum((b.refharga * b.diskon)/100))+(sum((b.refharga * b.ppn)/100)) as grandtotal, b.supplier as supplier, a.noPO as barcode, sum((b.refharga * b.ppn)/100) as ppn, sum((b.refharga * b.diskon)/100) as diskon, str_replace (convert(char(10),a.pic_date,102), '.', '-') + ' ' + convert(char(8),a.pic_date,20) as sc_field_0, str_replace (convert(char(10),a.spv_date,102), '.', '-') + ' ' + convert(char(8),a.spv_date,20) as sc_field_1, str_replace (convert(char(10),a.wk_date,102), '.', '-') + ' ' + convert(char(8),a.wk_date,20) as sc_field_2 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT a.noPO as a_nopo, (sum(b.refharga * b.disetujui))-(sum((b.refharga * b.diskon)/100))+(sum((b.refharga * b.ppn)/100)) as grandtotal, b.supplier as supplier, a.noPO as barcode, sum((b.refharga * b.ppn)/100) as ppn, sum((b.refharga * b.diskon)/100) as diskon, a.pic_date as sc_field_0, a.spv_date as sc_field_1, a.wk_date as sc_field_2 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT a.noPO as a_nopo, (sum(b.refharga * b.disetujui))-(sum((b.refharga * b.diskon)/100))+(sum((b.refharga * b.ppn)/100)) as grandtotal, b.supplier as supplier, a.noPO as barcode, sum((b.refharga * b.ppn)/100) as ppn, sum((b.refharga * b.diskon)/100) as diskon, convert(char(23),a.pic_date,121) as sc_field_0, convert(char(23),a.spv_date,121) as sc_field_1, convert(char(23),a.wk_date,121) as sc_field_2 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT a.noPO as a_nopo, (sum(b.refharga * b.disetujui))-(sum((b.refharga * b.diskon)/100))+(sum((b.refharga * b.ppn)/100)) as grandtotal, b.supplier as supplier, a.noPO as barcode, sum((b.refharga * b.ppn)/100) as ppn, sum((b.refharga * b.diskon)/100) as diskon, a.pic_date as sc_field_0, a.spv_date as sc_field_1, a.wk_date as sc_field_2 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT a.noPO as a_nopo, (sum(b.refharga * b.disetujui))-(sum((b.refharga * b.diskon)/100))+(sum((b.refharga * b.ppn)/100)) as grandtotal, b.supplier as supplier, a.noPO as barcode, sum((b.refharga * b.ppn)/100) as ppn, sum((b.refharga * b.diskon)/100) as diskon, EXTEND(a.pic_date, YEAR TO FRACTION) as sc_field_0, EXTEND(a.spv_date, YEAR TO FRACTION) as sc_field_1, EXTEND(a.wk_date, YEAR TO FRACTION) as sc_field_2 from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT a.noPO as a_nopo, (sum(b.refharga * b.disetujui))-(sum((b.refharga * b.diskon)/100))+(sum((b.refharga * b.ppn)/100)) as grandtotal, b.supplier as supplier, a.noPO as barcode, sum((b.refharga * b.ppn)/100) as ppn, sum((b.refharga * b.diskon)/100) as diskon, a.pic_date as sc_field_0, a.spv_date as sc_field_1, a.wk_date as sc_field_2 from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['order_grid'];
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
         $this->a_nopo = $rs->fields[0] ;  
         $this->grandtotal = $rs->fields[1] ;  
         $this->grandtotal =  str_replace(",", ".", $this->grandtotal);
         $this->grandtotal = (strpos(strtolower($this->grandtotal), "e")) ? (float)$this->grandtotal : $this->grandtotal; 
         $this->grandtotal = (string)$this->grandtotal;
         $this->supplier = $rs->fields[2] ;  
         $this->barcode = $rs->fields[3] ;  
         $this->ppn = $rs->fields[4] ;  
         $this->ppn =  str_replace(",", ".", $this->ppn);
         $this->ppn = (string)$this->ppn;
         $this->diskon = $rs->fields[5] ;  
         $this->diskon =  str_replace(",", ".", $this->diskon);
         $this->diskon = (string)$this->diskon;
         $this->sc_field_0 = $rs->fields[6] ;  
         $this->sc_field_1 = $rs->fields[7] ;  
         $this->sc_field_2 = $rs->fields[8] ;  
         //----- lookup - supplier
         $this->look_supplier = $this->supplier; 
         $this->Lookup->lookup_supplier($this->look_supplier, $this->supplier) ; 
         $this->look_supplier = ($this->look_supplier == "&nbsp;") ? "" : $this->look_supplier; 
         $this->sc_proc_grid = true; 
         //----- lookup - sgizi_bahan
         $this->Lookup->lookup_sgizi_bahan($this->sgizi_bahan, $this->sgizi_bahan, $this->array_sgizi_bahan); 
         $this->sgizi_bahan = str_replace("<br>", " ", $this->sgizi_bahan); 
         $this->sgizi_bahan = ($this->sgizi_bahan == "&nbsp;") ? "" : $this->sgizi_bahan; 
         //----- lookup - sgizi_supplier
         $this->Lookup->lookup_sgizi_supplier($this->sgizi_supplier, $this->sgizi_supplier, $this->array_sgizi_supplier); 
         $this->sgizi_supplier = str_replace("<br>", " ", $this->sgizi_supplier); 
         $this->sgizi_supplier = ($this->sgizi_supplier == "&nbsp;") ? "" : $this->sgizi_supplier; 
         $_SESSION['scriptcase']['PO_gizi']['contr_erro'] = 'on';
  




$this->terbilang  = $this->terbilang($this->grandtotal , $style=1).'  RUPIAH';

$bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );

$this->tgl  = date('d').' '.$bulan[date('m')].' '.date('Y');
$_SESSION['scriptcase']['PO_gizi']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- a_nopo
   function NM_export_a_nopo()
   {
         $this->a_nopo = html_entity_decode($this->a_nopo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->a_nopo = strip_tags($this->a_nopo);
         if (!NM_is_utf8($this->a_nopo))
         {
             $this->a_nopo = sc_convert_encoding($this->a_nopo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->a_nopo = str_replace('<', '&lt;', $this->a_nopo);
         $this->a_nopo = str_replace('>', '&gt;', $this->a_nopo);
         $this->Texto_tag .= "<td>" . $this->a_nopo . "</td>\r\n";
   }
   //----- grandtotal
   function NM_export_grandtotal()
   {
             nmgp_Form_Num_Val($this->grandtotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->grandtotal))
         {
             $this->grandtotal = sc_convert_encoding($this->grandtotal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->grandtotal = str_replace('<', '&lt;', $this->grandtotal);
         $this->grandtotal = str_replace('>', '&gt;', $this->grandtotal);
         $this->Texto_tag .= "<td>" . $this->grandtotal . "</td>\r\n";
   }
   //----- supplier
   function NM_export_supplier()
   {
         $this->look_supplier = html_entity_decode($this->look_supplier, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->look_supplier))
         {
             $this->look_supplier = sc_convert_encoding($this->look_supplier, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_supplier = str_replace('<', '&lt;', $this->look_supplier);
         $this->look_supplier = str_replace('>', '&gt;', $this->look_supplier);
         $this->Texto_tag .= "<td>" . $this->look_supplier . "</td>\r\n";
   }
   //----- barcode
   function NM_export_barcode()
   {
         if (!NM_is_utf8($this->barcode))
         {
             $this->barcode = sc_convert_encoding($this->barcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->barcode = str_replace('<', '&lt;', $this->barcode);
         $this->barcode = str_replace('>', '&gt;', $this->barcode);
         $this->Texto_tag .= "<td>" . $this->barcode . "</td>\r\n";
   }
   //----- ppn
   function NM_export_ppn()
   {
             nmgp_Form_Num_Val($this->ppn, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->ppn))
         {
             $this->ppn = sc_convert_encoding($this->ppn, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ppn = str_replace('<', '&lt;', $this->ppn);
         $this->ppn = str_replace('>', '&gt;', $this->ppn);
         $this->Texto_tag .= "<td>" . $this->ppn . "</td>\r\n";
   }
   //----- diskon
   function NM_export_diskon()
   {
             nmgp_Form_Num_Val($this->diskon, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->diskon))
         {
             $this->diskon = sc_convert_encoding($this->diskon, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->diskon = str_replace('<', '&lt;', $this->diskon);
         $this->diskon = str_replace('>', '&gt;', $this->diskon);
         $this->Texto_tag .= "<td>" . $this->diskon . "</td>\r\n";
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
             if (substr($this->sc_field_0, 10, 1) == "-") 
             { 
                 $this->sc_field_0 = substr($this->sc_field_0, 0, 10) . " " . substr($this->sc_field_0, 11);
             } 
             if (substr($this->sc_field_0, 13, 1) == ".") 
             { 
                $this->sc_field_0 = substr($this->sc_field_0, 0, 13) . ":" . substr($this->sc_field_0, 14, 2) . ":" . substr($this->sc_field_0, 17);
             } 
             $conteudo_x =  $this->sc_field_0;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->sc_field_0, "YYYY-MM-DD HH:II:SS  ");
                 $this->sc_field_0 = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii"));
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
                 $this->sc_field_1 = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii"));
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
             if (substr($this->sc_field_2, 10, 1) == "-") 
             { 
                 $this->sc_field_2 = substr($this->sc_field_2, 0, 10) . " " . substr($this->sc_field_2, 11);
             } 
             if (substr($this->sc_field_2, 13, 1) == ".") 
             { 
                $this->sc_field_2 = substr($this->sc_field_2, 0, 13) . ":" . substr($this->sc_field_2, 14, 2) . ":" . substr($this->sc_field_2, 17);
             } 
             $conteudo_x =  $this->sc_field_2;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->sc_field_2, "YYYY-MM-DD HH:II:SS  ");
                 $this->sc_field_2 = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii"));
             } 
         if (!NM_is_utf8($this->sc_field_2))
         {
             $this->sc_field_2 = sc_convert_encoding($this->sc_field_2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_2 = str_replace('<', '&lt;', $this->sc_field_2);
         $this->sc_field_2 = str_replace('>', '&gt;', $this->sc_field_2);
         $this->Texto_tag .= "<td>" . $this->sc_field_2 . "</td>\r\n";
   }
   //----- sgizi
   function NM_export_sgizi()
   {
         if (!NM_is_utf8($this->sgizi))
         {
             $this->sgizi = sc_convert_encoding($this->sgizi, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sgizi = str_replace('<', '&lt;', $this->sgizi);
         $this->sgizi = str_replace('>', '&gt;', $this->sgizi);
         $this->Texto_tag .= "<td>" . $this->sgizi . "</td>\r\n";
   }
   //----- sgizi_bahan
   function NM_export_sgizi_bahan()
   {
         if (!NM_is_utf8($this->sgizi_bahan))
         {
             $this->sgizi_bahan = sc_convert_encoding($this->sgizi_bahan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sgizi_bahan = str_replace('<', '&lt;', $this->sgizi_bahan);
         $this->sgizi_bahan = str_replace('>', '&gt;', $this->sgizi_bahan);
         $this->Texto_tag .= "<td>" . $this->sgizi_bahan . "</td>\r\n";
   }
   //----- sc_field_4
   function NM_export_sc_field_4()
   {
             nmgp_Form_Num_Val($this->sc_field_4, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->sc_field_4))
         {
             $this->sc_field_4 = sc_convert_encoding($this->sc_field_4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_4 = str_replace('<', '&lt;', $this->sc_field_4);
         $this->sc_field_4 = str_replace('>', '&gt;', $this->sc_field_4);
         $this->Texto_tag .= "<td>" . $this->sc_field_4 . "</td>\r\n";
   }
   //----- sgizi_n
   function NM_export_sgizi_n()
   {
             nmgp_Form_Num_Val($this->sgizi_n, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->sgizi_n))
         {
             $this->sgizi_n = sc_convert_encoding($this->sgizi_n, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sgizi_n = str_replace('<', '&lt;', $this->sgizi_n);
         $this->sgizi_n = str_replace('>', '&gt;', $this->sgizi_n);
         $this->Texto_tag .= "<td>" . $this->sgizi_n . "</td>\r\n";
   }
   //----- sgizi_qty
   function NM_export_sgizi_qty()
   {
         $this->sgizi_qty = html_entity_decode($this->sgizi_qty, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->sgizi_qty))
         {
             $this->sgizi_qty = sc_convert_encoding($this->sgizi_qty, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sgizi_qty = str_replace('<', '&lt;', $this->sgizi_qty);
         $this->sgizi_qty = str_replace('>', '&gt;', $this->sgizi_qty);
         $this->Texto_tag .= "<td>" . $this->sgizi_qty . "</td>\r\n";
   }
   //----- sgizi_satuan
   function NM_export_sgizi_satuan()
   {
         $this->sgizi_satuan = html_entity_decode($this->sgizi_satuan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sgizi_satuan = strip_tags($this->sgizi_satuan);
         if (!NM_is_utf8($this->sgizi_satuan))
         {
             $this->sgizi_satuan = sc_convert_encoding($this->sgizi_satuan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sgizi_satuan = str_replace('<', '&lt;', $this->sgizi_satuan);
         $this->sgizi_satuan = str_replace('>', '&gt;', $this->sgizi_satuan);
         $this->Texto_tag .= "<td>" . $this->sgizi_satuan . "</td>\r\n";
   }
   //----- sgizi_stock
   function NM_export_sgizi_stock()
   {
         $this->sgizi_stock = html_entity_decode($this->sgizi_stock, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sgizi_stock = strip_tags($this->sgizi_stock);
         if (!NM_is_utf8($this->sgizi_stock))
         {
             $this->sgizi_stock = sc_convert_encoding($this->sgizi_stock, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sgizi_stock = str_replace('<', '&lt;', $this->sgizi_stock);
         $this->sgizi_stock = str_replace('>', '&gt;', $this->sgizi_stock);
         $this->Texto_tag .= "<td>" . $this->sgizi_stock . "</td>\r\n";
   }
   //----- sgizi_subtotal
   function NM_export_sgizi_subtotal()
   {
             nmgp_Form_Num_Val($this->sgizi_subtotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->sgizi_subtotal))
         {
             $this->sgizi_subtotal = sc_convert_encoding($this->sgizi_subtotal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sgizi_subtotal = str_replace('<', '&lt;', $this->sgizi_subtotal);
         $this->sgizi_subtotal = str_replace('>', '&gt;', $this->sgizi_subtotal);
         $this->Texto_tag .= "<td>" . $this->sgizi_subtotal . "</td>\r\n";
   }
   //----- sgizi_supplier
   function NM_export_sgizi_supplier()
   {
         if (!NM_is_utf8($this->sgizi_supplier))
         {
             $this->sgizi_supplier = sc_convert_encoding($this->sgizi_supplier, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sgizi_supplier = str_replace('<', '&lt;', $this->sgizi_supplier);
         $this->sgizi_supplier = str_replace('>', '&gt;', $this->sgizi_supplier);
         $this->Texto_tag .= "<td>" . $this->sgizi_supplier . "</td>\r\n";
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
   //----- tgl
   function NM_export_tgl()
   {
         $this->tgl = html_entity_decode($this->tgl, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->tgl))
         {
             $this->tgl = sc_convert_encoding($this->tgl, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tgl = str_replace('<', '&lt;', $this->tgl);
         $this->tgl = str_replace('>', '&gt;', $this->tgl);
         $this->Texto_tag .= "<td>" . $this->tgl . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> -  :: RTF</TITLE>
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
<form name="Fdown" method="get" action="PO_gizi_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="PO_gizi"> 
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
$_SESSION['scriptcase']['PO_gizi']['contr_erro'] = 'on';
  
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

$_SESSION['scriptcase']['PO_gizi']['contr_erro'] = 'off';
}
function terbilang($x, $style=4) {
$_SESSION['scriptcase']['PO_gizi']['contr_erro'] = 'on';
  
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

$_SESSION['scriptcase']['PO_gizi']['contr_erro'] = 'off';
}
}

?>
