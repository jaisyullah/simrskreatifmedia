<?php

class pdfreport_tbhasillab_rtf
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
      require_once($this->Ini->path_aplicacao . "pdfreport_tbhasillab_total.class.php"); 
      $this->Tot      = new pdfreport_tbhasillab_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_tbhasillab']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_pdfreport_tbhasillab";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "pdfreport_tbhasillab.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['rtf_name']);
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->trancode = $Busca_temp['trancode']; 
          $tmp_pos = strpos($this->trancode, "##@@");
          if ($tmp_pos !== false && !is_array($this->trancode))
          {
              $this->trancode = substr($this->trancode, 0, $tmp_pos);
          }
          $this->struk = $Busca_temp['struk']; 
          $tmp_pos = strpos($this->struk, "##@@");
          if ($tmp_pos !== false && !is_array($this->struk))
          {
              $this->struk = substr($this->struk, 0, $tmp_pos);
          }
          $this->custcode = $Busca_temp['custcode']; 
          $tmp_pos = strpos($this->custcode, "##@@");
          if ($tmp_pos !== false && !is_array($this->custcode))
          {
              $this->custcode = substr($this->custcode, 0, $tmp_pos);
          }
          $this->custage = $Busca_temp['custage']; 
          $tmp_pos = strpos($this->custage, "##@@");
          if ($tmp_pos !== false && !is_array($this->custage))
          {
              $this->custage = substr($this->custage, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Trancode"; 
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
          $SC_Label = (isset($this->New_label['struk'])) ? $this->New_label['struk'] : "Struk"; 
          if ($Cada_col == "struk" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['custcode'])) ? $this->New_label['custcode'] : "Custcode"; 
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
          $SC_Label = (isset($this->New_label['custage'])) ? $this->New_label['custage'] : "Custage"; 
          if ($Cada_col == "custage" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['doccode'])) ? $this->New_label['doccode'] : "Doccode"; 
          if ($Cada_col == "doccode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['trandate'])) ? $this->New_label['trandate'] : "Trandate"; 
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
          $SC_Label = (isset($this->New_label['finishdate'])) ? $this->New_label['finishdate'] : "Finishdate"; 
          if ($Cada_col == "finishdate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['nama'])) ? $this->New_label['nama'] : "Nama"; 
          if ($Cada_col == "nama" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jk'])) ? $this->New_label['jk'] : "Jk"; 
          if ($Cada_col == "jk" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['plname'])) ? $this->New_label['plname'] : "Plname"; 
          if ($Cada_col == "plname" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['asal'])) ? $this->New_label['asal'] : "Asal"; 
          if ($Cada_col == "asal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['inapcode'])) ? $this->New_label['inapcode'] : "Inapcode"; 
          if ($Cada_col == "inapcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dpjp'])) ? $this->New_label['dpjp'] : "dpjp"; 
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
          $SC_Label = (isset($this->New_label['login'])) ? $this->New_label['login'] : "login"; 
          if ($Cada_col == "login" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sub'])) ? $this->New_label['sub'] : "sub"; 
          if ($Cada_col == "sub" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sub_hasil'])) ? $this->New_label['sub_hasil'] : "Hasil"; 
          if ($Cada_col == "sub_hasil" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sub_marked'])) ? $this->New_label['sub_marked'] : "Marked"; 
          if ($Cada_col == "sub_marked" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sub_rujukan'])) ? $this->New_label['sub_rujukan'] : "Rujukan"; 
          if ($Cada_col == "sub_rujukan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sub_satuan'])) ? $this->New_label['sub_satuan'] : "Satuan"; 
          if ($Cada_col == "sub_satuan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sub_subname'])) ? $this->New_label['sub_subname'] : "Subname"; 
          if ($Cada_col == "sub_subname" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tl'])) ? $this->New_label['tl'] : "tl"; 
          if ($Cada_col == "tl" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sub_kategori'])) ? $this->New_label['sub_kategori'] : "Kategori"; 
          if ($Cada_col == "sub_kategori" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT trancode, struk, custcode, custage, doccode, str_replace (convert(char(10),trandate,102), '.', '-') + ' ' + convert(char(8),trandate,20), str_replace (convert(char(10),finishdate,102), '.', '-') + ' ' + convert(char(8),finishdate,20), trancode as barcode, custcode as nama, custcode as jk, plname, asal, inapcode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT trancode, struk, custcode, custage, doccode, trandate, finishdate, trancode as barcode, custcode as nama, custcode as jk, plname, asal, inapcode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT trancode, struk, custcode, custage, doccode, convert(char(23),trandate,121), convert(char(23),finishdate,121), trancode as barcode, custcode as nama, custcode as jk, plname, asal, inapcode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT trancode, struk, custcode, custage, doccode, trandate, finishdate, trancode as barcode, custcode as nama, custcode as jk, plname, asal, inapcode from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT trancode, struk, custcode, custage, doccode, EXTEND(trandate, YEAR TO FRACTION), EXTEND(finishdate, YEAR TO FRACTION), trancode as barcode, custcode as nama, custcode as jk, plname, asal, inapcode from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT trancode, struk, custcode, custage, doccode, trandate, finishdate, trancode as barcode, custcode as nama, custcode as jk, plname, asal, inapcode from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['order_grid'];
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
         $this->struk = $rs->fields[1] ;  
         $this->custcode = $rs->fields[2] ;  
         $this->custage = $rs->fields[3] ;  
         $this->doccode = $rs->fields[4] ;  
         $this->trandate = $rs->fields[5] ;  
         $this->finishdate = $rs->fields[6] ;  
         $this->barcode = $rs->fields[7] ;  
         $this->nama = $rs->fields[8] ;  
         $this->jk = $rs->fields[9] ;  
         $this->plname = $rs->fields[10] ;  
         $this->asal = $rs->fields[11] ;  
         $this->inapcode = $rs->fields[12] ;  
         //----- lookup - doccode
         $this->look_doccode = $this->doccode; 
         $this->Lookup->lookup_doccode($this->look_doccode, $this->doccode) ; 
         $this->look_doccode = ($this->look_doccode == "&nbsp;") ? "" : $this->look_doccode; 
         //----- lookup - nama
         $this->look_nama = $this->nama; 
         $this->Lookup->lookup_nama($this->look_nama, $this->nama) ; 
         $this->look_nama = ($this->look_nama == "&nbsp;") ? "" : $this->look_nama; 
         //----- lookup - jk
         $this->look_jk = $this->jk; 
         $this->Lookup->lookup_jk($this->look_jk, $this->custcode) ; 
         $this->look_jk = ($this->look_jk == "&nbsp;") ? "" : $this->look_jk; 
         //----- lookup - sub_marked
         $this->look_sub_marked = $this->sub_marked; 
         $this->Lookup->lookup_sub_marked($this->look_sub_marked); 
         $this->look_sub_marked = ($this->look_sub_marked == "&nbsp;") ? "" : $this->look_sub_marked; 
         $this->sc_proc_grid = true; 
         //----- lookup - tl
         $this->Lookup->lookup_tl($this->tl, $this->custcode, $this->array_tl); 
         $this->tl = str_replace("<br>", " ", $this->tl); 
         $this->tl = ($this->tl == "&nbsp;") ? "" : $this->tl; 
         $_SESSION['scriptcase']['pdfreport_tbhasillab']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
 $check_sql = "SELECT name"
   . " FROM rsiapp_users"
   . " WHERE login = '" . $this->sc_temp_usr_login . "'";
 
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
    $this->login  = $this->rs[0][0];
}
		else     
{
	$this->login  = 'PETUGAS LAB';
}

if($this->jk  == 'P'){
	$this->jk  = 'Perempuan';
}else if($this->jk  == 'L'){
	$this->jk  = 'Laki-laki';
}

if($this->inapcode  == '--' || $this->inapcode  = ''){
	$this->asal  = 'POLIKLINIK/IGD';
}else{
	$this->asal  = 'RAWAT INAP';
}	
	
$this->dpjp  = 'dr.Yessi Mayke Sp.PK';
if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['pdfreport_tbhasillab']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- trancode
   function NM_export_trancode()
   {
         $this->trancode = html_entity_decode($this->trancode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->trancode))
         {
             $this->trancode = sc_convert_encoding($this->trancode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->trancode = str_replace('<', '&lt;', $this->trancode);
         $this->trancode = str_replace('>', '&gt;', $this->trancode);
         $this->Texto_tag .= "<td>" . $this->trancode . "</td>\r\n";
   }
   //----- struk
   function NM_export_struk()
   {
         $this->struk = html_entity_decode($this->struk, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->struk = strip_tags($this->struk);
         if (!NM_is_utf8($this->struk))
         {
             $this->struk = sc_convert_encoding($this->struk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->struk = str_replace('<', '&lt;', $this->struk);
         $this->struk = str_replace('>', '&gt;', $this->struk);
         $this->Texto_tag .= "<td>" . $this->struk . "</td>\r\n";
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
   //----- custage
   function NM_export_custage()
   {
         $this->custage = html_entity_decode($this->custage, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->custage = strip_tags($this->custage);
         if (!NM_is_utf8($this->custage))
         {
             $this->custage = sc_convert_encoding($this->custage, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->custage = str_replace('<', '&lt;', $this->custage);
         $this->custage = str_replace('>', '&gt;', $this->custage);
         $this->Texto_tag .= "<td>" . $this->custage . "</td>\r\n";
   }
   //----- doccode
   function NM_export_doccode()
   {
         $this->look_doccode = html_entity_decode($this->look_doccode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->look_doccode))
         {
             $this->look_doccode = sc_convert_encoding($this->look_doccode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_doccode = str_replace('<', '&lt;', $this->look_doccode);
         $this->look_doccode = str_replace('>', '&gt;', $this->look_doccode);
         $this->Texto_tag .= "<td>" . $this->look_doccode . "</td>\r\n";
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
   //----- finishdate
   function NM_export_finishdate()
   {
             if (substr($this->finishdate, 10, 1) == "-") 
             { 
                 $this->finishdate = substr($this->finishdate, 0, 10) . " " . substr($this->finishdate, 11);
             } 
             if (substr($this->finishdate, 13, 1) == ".") 
             { 
                $this->finishdate = substr($this->finishdate, 0, 13) . ":" . substr($this->finishdate, 14, 2) . ":" . substr($this->finishdate, 17);
             } 
             $conteudo_x =  $this->finishdate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->finishdate, "YYYY-MM-DD HH:II:SS  ");
                 $this->finishdate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if (!NM_is_utf8($this->finishdate))
         {
             $this->finishdate = sc_convert_encoding($this->finishdate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->finishdate = str_replace('<', '&lt;', $this->finishdate);
         $this->finishdate = str_replace('>', '&gt;', $this->finishdate);
         $this->Texto_tag .= "<td>" . $this->finishdate . "</td>\r\n";
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
   //----- nama
   function NM_export_nama()
   {
         $this->look_nama = html_entity_decode($this->look_nama, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->look_nama))
         {
             $this->look_nama = sc_convert_encoding($this->look_nama, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_nama = str_replace('<', '&lt;', $this->look_nama);
         $this->look_nama = str_replace('>', '&gt;', $this->look_nama);
         $this->Texto_tag .= "<td>" . $this->look_nama . "</td>\r\n";
   }
   //----- jk
   function NM_export_jk()
   {
         $this->look_jk = html_entity_decode($this->look_jk, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->look_jk))
         {
             $this->look_jk = sc_convert_encoding($this->look_jk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_jk = str_replace('<', '&lt;', $this->look_jk);
         $this->look_jk = str_replace('>', '&gt;', $this->look_jk);
         $this->Texto_tag .= "<td>" . $this->look_jk . "</td>\r\n";
   }
   //----- plname
   function NM_export_plname()
   {
         $this->plname = html_entity_decode($this->plname, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->plname = strip_tags($this->plname);
         if (!NM_is_utf8($this->plname))
         {
             $this->plname = sc_convert_encoding($this->plname, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->plname = str_replace('<', '&lt;', $this->plname);
         $this->plname = str_replace('>', '&gt;', $this->plname);
         $this->Texto_tag .= "<td>" . $this->plname . "</td>\r\n";
   }
   //----- asal
   function NM_export_asal()
   {
         $this->asal = html_entity_decode($this->asal, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->asal = strip_tags($this->asal);
         if (!NM_is_utf8($this->asal))
         {
             $this->asal = sc_convert_encoding($this->asal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->asal = str_replace('<', '&lt;', $this->asal);
         $this->asal = str_replace('>', '&gt;', $this->asal);
         $this->Texto_tag .= "<td>" . $this->asal . "</td>\r\n";
   }
   //----- inapcode
   function NM_export_inapcode()
   {
         $this->inapcode = html_entity_decode($this->inapcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->inapcode = strip_tags($this->inapcode);
         if (!NM_is_utf8($this->inapcode))
         {
             $this->inapcode = sc_convert_encoding($this->inapcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->inapcode = str_replace('<', '&lt;', $this->inapcode);
         $this->inapcode = str_replace('>', '&gt;', $this->inapcode);
         $this->Texto_tag .= "<td>" . $this->inapcode . "</td>\r\n";
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
   //----- login
   function NM_export_login()
   {
         $this->login = html_entity_decode($this->login, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->login = strip_tags($this->login);
         if (!NM_is_utf8($this->login))
         {
             $this->login = sc_convert_encoding($this->login, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->login = str_replace('<', '&lt;', $this->login);
         $this->login = str_replace('>', '&gt;', $this->login);
         $this->Texto_tag .= "<td>" . $this->login . "</td>\r\n";
   }
   //----- sub
   function NM_export_sub()
   {
         if (!NM_is_utf8($this->sub))
         {
             $this->sub = sc_convert_encoding($this->sub, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sub = str_replace('<', '&lt;', $this->sub);
         $this->sub = str_replace('>', '&gt;', $this->sub);
         $this->Texto_tag .= "<td>" . $this->sub . "</td>\r\n";
   }
   //----- sub_hasil
   function NM_export_sub_hasil()
   {
         $this->sub_hasil = html_entity_decode($this->sub_hasil, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sub_hasil = strip_tags($this->sub_hasil);
         if (!NM_is_utf8($this->sub_hasil))
         {
             $this->sub_hasil = sc_convert_encoding($this->sub_hasil, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sub_hasil = str_replace('<', '&lt;', $this->sub_hasil);
         $this->sub_hasil = str_replace('>', '&gt;', $this->sub_hasil);
         $this->Texto_tag .= "<td>" . $this->sub_hasil . "</td>\r\n";
   }
   //----- sub_marked
   function NM_export_sub_marked()
   {
         $this->look_sub_marked = html_entity_decode($this->look_sub_marked, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->look_sub_marked))
         {
             $this->look_sub_marked = sc_convert_encoding($this->look_sub_marked, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_sub_marked = str_replace('<', '&lt;', $this->look_sub_marked);
         $this->look_sub_marked = str_replace('>', '&gt;', $this->look_sub_marked);
         $this->Texto_tag .= "<td>" . $this->look_sub_marked . "</td>\r\n";
   }
   //----- sub_rujukan
   function NM_export_sub_rujukan()
   {
         $this->sub_rujukan = html_entity_decode($this->sub_rujukan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->sub_rujukan))
         {
             $this->sub_rujukan = sc_convert_encoding($this->sub_rujukan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sub_rujukan = str_replace('<', '&lt;', $this->sub_rujukan);
         $this->sub_rujukan = str_replace('>', '&gt;', $this->sub_rujukan);
         $this->Texto_tag .= "<td>" . $this->sub_rujukan . "</td>\r\n";
   }
   //----- sub_satuan
   function NM_export_sub_satuan()
   {
         $this->sub_satuan = html_entity_decode($this->sub_satuan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sub_satuan = strip_tags($this->sub_satuan);
         if (!NM_is_utf8($this->sub_satuan))
         {
             $this->sub_satuan = sc_convert_encoding($this->sub_satuan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sub_satuan = str_replace('<', '&lt;', $this->sub_satuan);
         $this->sub_satuan = str_replace('>', '&gt;', $this->sub_satuan);
         $this->Texto_tag .= "<td>" . $this->sub_satuan . "</td>\r\n";
   }
   //----- sub_subname
   function NM_export_sub_subname()
   {
         $this->sub_subname = html_entity_decode($this->sub_subname, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sub_subname = strip_tags($this->sub_subname);
         if (!NM_is_utf8($this->sub_subname))
         {
             $this->sub_subname = sc_convert_encoding($this->sub_subname, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sub_subname = str_replace('<', '&lt;', $this->sub_subname);
         $this->sub_subname = str_replace('>', '&gt;', $this->sub_subname);
         $this->Texto_tag .= "<td>" . $this->sub_subname . "</td>\r\n";
   }
   //----- tl
   function NM_export_tl()
   {
         $conteudo_x =  $this->tl;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->tl, "YYYY-MM-DD  ");
             $this->tl = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->tl))
         {
             $this->tl = sc_convert_encoding($this->tl, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tl = str_replace('<', '&lt;', $this->tl);
         $this->tl = str_replace('>', '&gt;', $this->tl);
         $this->Texto_tag .= "<td>" . $this->tl . "</td>\r\n";
   }
   //----- sub_kategori
   function NM_export_sub_kategori()
   {
         $this->sub_kategori = html_entity_decode($this->sub_kategori, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sub_kategori = strip_tags($this->sub_kategori);
         if (!NM_is_utf8($this->sub_kategori))
         {
             $this->sub_kategori = sc_convert_encoding($this->sub_kategori, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sub_kategori = str_replace('<', '&lt;', $this->sub_kategori);
         $this->sub_kategori = str_replace('>', '&gt;', $this->sub_kategori);
         $this->Texto_tag .= "<td>" . $this->sub_kategori . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_title'] ?> tbhasillab :: RTF</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_tbhasillab_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_tbhasillab"> 
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
