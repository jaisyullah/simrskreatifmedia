<?php

class lap_grid_logistik_single_rtf
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
      require_once($this->Ini->path_aplicacao . "lap_grid_logistik_single_total.class.php"); 
      $this->Tot      = new lap_grid_logistik_single_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['lap_grid_logistik_single']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_lap_grid_logistik_single";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "lap_grid_logistik_single.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['lap_grid_logistik_single']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['lap_grid_logistik_single']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['lap_grid_logistik_single']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->item = $Busca_temp['item']; 
          $tmp_pos = strpos($this->item, "##@@");
          if ($tmp_pos !== false && !is_array($this->item))
          {
              $this->item = substr($this->item, 0, $tmp_pos);
          }
          $this->sc_field_5 = $Busca_temp['sc_field_5']; 
          $tmp_pos = strpos($this->sc_field_5, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_5))
          {
              $this->sc_field_5 = substr($this->sc_field_5, 0, $tmp_pos);
          }
          $this->sc_field_5_2 = $Busca_temp['sc_field_5_input_2']; 
          $this->b_status = $Busca_temp['b_status']; 
          $tmp_pos = strpos($this->b_status, "##@@");
          if ($tmp_pos !== false && !is_array($this->b_status))
          {
              $this->b_status = substr($this->b_status, 0, $tmp_pos);
          }
          $this->pbf = $Busca_temp['pbf']; 
          $tmp_pos = strpos($this->pbf, "##@@");
          if ($tmp_pos !== false && !is_array($this->pbf))
          {
              $this->pbf = substr($this->pbf, 0, $tmp_pos);
          }
          $this->sc_field_0 = $Busca_temp['sc_field_0']; 
          $tmp_pos = strpos($this->sc_field_0, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_0))
          {
              $this->sc_field_0 = substr($this->sc_field_0, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['sc_field_5'])) ? $this->New_label['sc_field_5'] : "Tgl Pesan"; 
          if ($Cada_col == "sc_field_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['item'])) ? $this->New_label['item'] : "Item"; 
          if ($Cada_col == "item" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['po'])) ? $this->New_label['po'] : "PO"; 
          if ($Cada_col == "po" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pbf'])) ? $this->New_label['pbf'] : "PBF"; 
          if ($Cada_col == "pbf" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Non PBF"; 
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
          $SC_Label = (isset($this->New_label['jml'])) ? $this->New_label['jml'] : "Jumlah"; 
          if ($Cada_col == "jml" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['kemasan'])) ? $this->New_label['kemasan'] : "Kemasan"; 
          if ($Cada_col == "kemasan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['isi'])) ? $this->New_label['isi'] : "Isi"; 
          if ($Cada_col == "isi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['hrg'])) ? $this->New_label['hrg'] : "Harga"; 
          if ($Cada_col == "hrg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_2'])) ? $this->New_label['sc_field_2'] : "Hrg Terima"; 
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
          $SC_Label = (isset($this->New_label['disc'])) ? $this->New_label['disc'] : "Disc"; 
          if ($Cada_col == "disc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_7'])) ? $this->New_label['sc_field_7'] : "Harga Disc"; 
          if ($Cada_col == "sc_field_7" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_8'])) ? $this->New_label['sc_field_8'] : "Subtotal Harga"; 
          if ($Cada_col == "sc_field_8" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['b_status'])) ? $this->New_label['b_status'] : "Status"; 
          if ($Cada_col == "b_status" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['a_id'])) ? $this->New_label['a_id'] : "Id"; 
          if ($Cada_col == "a_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT str_replace (convert(char(10),b.orderDate,102), '.', '-') + ' ' + convert(char(8),b.orderDate,20) as sc_field_5, a.item as item, a.po as po, b.pbf as pbf, b.non_pbf as sc_field_0, a.jumlah as jml, a.kemasan as kemasan, a.isi as isi, a.harga as hrg, a.hargaTerima as sc_field_2, a.disc as disc, b.`status` as b_status, a.id as a_id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT b.orderDate as sc_field_5, a.item as item, a.po as po, b.pbf as pbf, b.non_pbf as sc_field_0, a.jumlah as jml, a.kemasan as kemasan, a.isi as isi, a.harga as hrg, a.hargaTerima as sc_field_2, a.disc as disc, b.`status` as b_status, a.id as a_id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT convert(char(23),b.orderDate,121) as sc_field_5, a.item as item, a.po as po, b.pbf as pbf, b.non_pbf as sc_field_0, a.jumlah as jml, a.kemasan as kemasan, a.isi as isi, a.harga as hrg, a.hargaTerima as sc_field_2, a.disc as disc, b.`status` as b_status, a.id as a_id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT b.orderDate as sc_field_5, a.item as item, a.po as po, b.pbf as pbf, b.non_pbf as sc_field_0, a.jumlah as jml, a.kemasan as kemasan, a.isi as isi, a.harga as hrg, a.hargaTerima as sc_field_2, a.disc as disc, b.`status` as b_status, a.id as a_id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(b.orderDate, YEAR TO FRACTION) as sc_field_5, a.item as item, a.po as po, b.pbf as pbf, b.non_pbf as sc_field_0, a.jumlah as jml, a.kemasan as kemasan, a.isi as isi, a.harga as hrg, a.hargaTerima as sc_field_2, a.disc as disc, b.`status` as b_status, a.id as a_id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT b.orderDate as sc_field_5, a.item as item, a.po as po, b.pbf as pbf, b.non_pbf as sc_field_0, a.jumlah as jml, a.kemasan as kemasan, a.isi as isi, a.harga as hrg, a.hargaTerima as sc_field_2, a.disc as disc, b.`status` as b_status, a.id as a_id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['order_grid'];
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
         $this->sc_field_5 = $rs->fields[0] ;  
         $this->item = $rs->fields[1] ;  
         $this->po = $rs->fields[2] ;  
         $this->pbf = $rs->fields[3] ;  
         $this->sc_field_0 = $rs->fields[4] ;  
         $this->jml = $rs->fields[5] ;  
         $this->jml = (strpos(strtolower($this->jml), "e")) ? (float)$this->jml : $this->jml; 
         $this->jml = (string)$this->jml;
         $this->kemasan = $rs->fields[6] ;  
         $this->isi = $rs->fields[7] ;  
         $this->isi = (strpos(strtolower($this->isi), "e")) ? (float)$this->isi : $this->isi; 
         $this->isi = (string)$this->isi;
         $this->hrg = $rs->fields[8] ;  
         $this->hrg =  str_replace(",", ".", $this->hrg);
         $this->hrg = (strpos(strtolower($this->hrg), "e")) ? (float)$this->hrg : $this->hrg; 
         $this->hrg = (string)$this->hrg;
         $this->sc_field_2 = $rs->fields[9] ;  
         $this->sc_field_2 =  str_replace(",", ".", $this->sc_field_2);
         $this->sc_field_2 = (strpos(strtolower($this->sc_field_2), "e")) ? (float)$this->sc_field_2 : $this->sc_field_2; 
         $this->sc_field_2 = (string)$this->sc_field_2;
         $this->disc = $rs->fields[10] ;  
         $this->disc = (strpos(strtolower($this->disc), "e")) ? (float)$this->disc : $this->disc; 
         $this->disc = (string)$this->disc;
         $this->b_status = $rs->fields[11] ;  
         $this->a_id = $rs->fields[12] ;  
         $this->a_id = (string)$this->a_id;
         //----- lookup - item
         $this->look_item = $this->item; 
         $this->Lookup->lookup_item($this->look_item, $this->item) ; 
         $this->look_item = ($this->look_item == "&nbsp;") ? "" : $this->look_item; 
         //----- lookup - pbf
         $this->look_pbf = $this->pbf; 
         $this->Lookup->lookup_pbf($this->look_pbf, $this->pbf) ; 
         $this->look_pbf = ($this->look_pbf == "&nbsp;") ? "" : $this->look_pbf; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['lap_grid_logistik_single']['contr_erro'] = 'on';
 $this->sc_field_7  = $this->hrg -($this->hrg *($this->disc /100));
$this->sc_field_8  = ($this->hrg -($this->hrg *($this->disc /100)))*$this->jml ;
$_SESSION['scriptcase']['lap_grid_logistik_single']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- sc_field_5
   function NM_export_sc_field_5()
   {
             if (substr($this->sc_field_5, 10, 1) == "-") 
             { 
                 $this->sc_field_5 = substr($this->sc_field_5, 0, 10) . " " . substr($this->sc_field_5, 11);
             } 
             if (substr($this->sc_field_5, 13, 1) == ".") 
             { 
                $this->sc_field_5 = substr($this->sc_field_5, 0, 13) . ":" . substr($this->sc_field_5, 14, 2) . ":" . substr($this->sc_field_5, 17);
             } 
             $conteudo_x =  $this->sc_field_5;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->sc_field_5, "YYYY-MM-DD HH:II:SS  ");
                 $this->sc_field_5 = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if (!NM_is_utf8($this->sc_field_5))
         {
             $this->sc_field_5 = sc_convert_encoding($this->sc_field_5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_5 = str_replace('<', '&lt;', $this->sc_field_5);
         $this->sc_field_5 = str_replace('>', '&gt;', $this->sc_field_5);
         $this->Texto_tag .= "<td>" . $this->sc_field_5 . "</td>\r\n";
   }
   //----- item
   function NM_export_item()
   {
         $this->look_item = html_entity_decode($this->look_item, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_item = strip_tags($this->look_item);
         if (!NM_is_utf8($this->look_item))
         {
             $this->look_item = sc_convert_encoding($this->look_item, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_item = str_replace('<', '&lt;', $this->look_item);
         $this->look_item = str_replace('>', '&gt;', $this->look_item);
         $this->Texto_tag .= "<td>" . $this->look_item . "</td>\r\n";
   }
   //----- po
   function NM_export_po()
   {
         $this->po = html_entity_decode($this->po, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->po = strip_tags($this->po);
         if (!NM_is_utf8($this->po))
         {
             $this->po = sc_convert_encoding($this->po, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->po = str_replace('<', '&lt;', $this->po);
         $this->po = str_replace('>', '&gt;', $this->po);
         $this->Texto_tag .= "<td>" . $this->po . "</td>\r\n";
   }
   //----- pbf
   function NM_export_pbf()
   {
         $this->look_pbf = html_entity_decode($this->look_pbf, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_pbf = strip_tags($this->look_pbf);
         if (!NM_is_utf8($this->look_pbf))
         {
             $this->look_pbf = sc_convert_encoding($this->look_pbf, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_pbf = str_replace('<', '&lt;', $this->look_pbf);
         $this->look_pbf = str_replace('>', '&gt;', $this->look_pbf);
         $this->Texto_tag .= "<td>" . $this->look_pbf . "</td>\r\n";
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
   //----- jml
   function NM_export_jml()
   {
             nmgp_Form_Num_Val($this->jml, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->jml))
         {
             $this->jml = sc_convert_encoding($this->jml, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jml = str_replace('<', '&lt;', $this->jml);
         $this->jml = str_replace('>', '&gt;', $this->jml);
         $this->Texto_tag .= "<td>" . $this->jml . "</td>\r\n";
   }
   //----- kemasan
   function NM_export_kemasan()
   {
         $this->kemasan = html_entity_decode($this->kemasan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kemasan = strip_tags($this->kemasan);
         if (!NM_is_utf8($this->kemasan))
         {
             $this->kemasan = sc_convert_encoding($this->kemasan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->kemasan = str_replace('<', '&lt;', $this->kemasan);
         $this->kemasan = str_replace('>', '&gt;', $this->kemasan);
         $this->Texto_tag .= "<td>" . $this->kemasan . "</td>\r\n";
   }
   //----- isi
   function NM_export_isi()
   {
             nmgp_Form_Num_Val($this->isi, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->isi))
         {
             $this->isi = sc_convert_encoding($this->isi, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->isi = str_replace('<', '&lt;', $this->isi);
         $this->isi = str_replace('>', '&gt;', $this->isi);
         $this->Texto_tag .= "<td>" . $this->isi . "</td>\r\n";
   }
   //----- hrg
   function NM_export_hrg()
   {
             nmgp_Form_Num_Val($this->hrg, ".", ",", "0", "S", "2", "Rp", "V:3:3", "-"); 
         if (!NM_is_utf8($this->hrg))
         {
             $this->hrg = sc_convert_encoding($this->hrg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->hrg = str_replace('<', '&lt;', $this->hrg);
         $this->hrg = str_replace('>', '&gt;', $this->hrg);
         $this->Texto_tag .= "<td>" . $this->hrg . "</td>\r\n";
   }
   //----- sc_field_2
   function NM_export_sc_field_2()
   {
             nmgp_Form_Num_Val($this->sc_field_2, ".", ",", "0", "S", "2", "Rp", "V:3:3", "-"); 
         if (!NM_is_utf8($this->sc_field_2))
         {
             $this->sc_field_2 = sc_convert_encoding($this->sc_field_2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_2 = str_replace('<', '&lt;', $this->sc_field_2);
         $this->sc_field_2 = str_replace('>', '&gt;', $this->sc_field_2);
         $this->Texto_tag .= "<td>" . $this->sc_field_2 . "</td>\r\n";
   }
   //----- disc
   function NM_export_disc()
   {
             nmgp_Form_Num_Val($this->disc, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->disc))
         {
             $this->disc = sc_convert_encoding($this->disc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->disc = str_replace('<', '&lt;', $this->disc);
         $this->disc = str_replace('>', '&gt;', $this->disc);
         $this->Texto_tag .= "<td>" . $this->disc . "</td>\r\n";
   }
   //----- sc_field_7
   function NM_export_sc_field_7()
   {
             nmgp_Form_Num_Val($this->sc_field_7, ".", ",", "2", "S", "1", "Rp", "V:3:13", "-"); 
         if (!NM_is_utf8($this->sc_field_7))
         {
             $this->sc_field_7 = sc_convert_encoding($this->sc_field_7, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_7 = str_replace('<', '&lt;', $this->sc_field_7);
         $this->sc_field_7 = str_replace('>', '&gt;', $this->sc_field_7);
         $this->Texto_tag .= "<td>" . $this->sc_field_7 . "</td>\r\n";
   }
   //----- sc_field_8
   function NM_export_sc_field_8()
   {
             nmgp_Form_Num_Val($this->sc_field_8, ".", ",", "2", "S", "1", "Rp", "V:3:13", "-"); 
         if (!NM_is_utf8($this->sc_field_8))
         {
             $this->sc_field_8 = sc_convert_encoding($this->sc_field_8, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_8 = str_replace('<', '&lt;', $this->sc_field_8);
         $this->sc_field_8 = str_replace('>', '&gt;', $this->sc_field_8);
         $this->Texto_tag .= "<td>" . $this->sc_field_8 . "</td>\r\n";
   }
   //----- b_status
   function NM_export_b_status()
   {
         $this->b_status = html_entity_decode($this->b_status, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->b_status = strip_tags($this->b_status);
         if (!NM_is_utf8($this->b_status))
         {
             $this->b_status = sc_convert_encoding($this->b_status, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->b_status = str_replace('<', '&lt;', $this->b_status);
         $this->b_status = str_replace('>', '&gt;', $this->b_status);
         $this->Texto_tag .= "<td>" . $this->b_status . "</td>\r\n";
   }
   //----- a_id
   function NM_export_a_id()
   {
             nmgp_Form_Num_Val($this->a_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->a_id))
         {
             $this->a_id = sc_convert_encoding($this->a_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->a_id = str_replace('<', '&lt;', $this->a_id);
         $this->a_id = str_replace('>', '&gt;', $this->a_id);
         $this->Texto_tag .= "<td>" . $this->a_id . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['lap_grid_logistik_single'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="lap_grid_logistik_single_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="lap_grid_logistik_single"> 
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
