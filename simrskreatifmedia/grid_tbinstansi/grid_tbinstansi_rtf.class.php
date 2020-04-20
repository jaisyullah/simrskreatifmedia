<?php

class grid_tbinstansi_rtf
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
      require_once($this->Ini->path_aplicacao . "grid_tbinstansi_total.class.php"); 
      $this->Tot      = new grid_tbinstansi_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_tbinstansi']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_tbinstansi";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_tbinstansi.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tbinstansi']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_tbinstansi']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_tbinstansi']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->address = $Busca_temp['address']; 
          $tmp_pos = strpos($this->address, "##@@");
          if ($tmp_pos !== false && !is_array($this->address))
          {
              $this->address = substr($this->address, 0, $tmp_pos);
          }
          $this->instcode = $Busca_temp['instcode']; 
          $tmp_pos = strpos($this->instcode, "##@@");
          if ($tmp_pos !== false && !is_array($this->instcode))
          {
              $this->instcode = substr($this->instcode, 0, $tmp_pos);
          }
          $this->init = $Busca_temp['init']; 
          $tmp_pos = strpos($this->init, "##@@");
          if ($tmp_pos !== false && !is_array($this->init))
          {
              $this->init = substr($this->init, 0, $tmp_pos);
          }
          $this->name = $Busca_temp['name']; 
          $tmp_pos = strpos($this->name, "##@@");
          if ($tmp_pos !== false && !is_array($this->name))
          {
              $this->name = substr($this->name, 0, $tmp_pos);
          }
          $this->city = $Busca_temp['city']; 
          $tmp_pos = strpos($this->city, "##@@");
          if ($tmp_pos !== false && !is_array($this->city))
          {
              $this->city = substr($this->city, 0, $tmp_pos);
          }
          $this->phone = $Busca_temp['phone']; 
          $tmp_pos = strpos($this->phone, "##@@");
          if ($tmp_pos !== false && !is_array($this->phone))
          {
              $this->phone = substr($this->phone, 0, $tmp_pos);
          }
          $this->fax = $Busca_temp['fax']; 
          $tmp_pos = strpos($this->fax, "##@@");
          if ($tmp_pos !== false && !is_array($this->fax))
          {
              $this->fax = substr($this->fax, 0, $tmp_pos);
          }
          $this->cp = $Busca_temp['cp']; 
          $tmp_pos = strpos($this->cp, "##@@");
          if ($tmp_pos !== false && !is_array($this->cp))
          {
              $this->cp = substr($this->cp, 0, $tmp_pos);
          }
          $this->limit = $Busca_temp['limit']; 
          $tmp_pos = strpos($this->limit, "##@@");
          if ($tmp_pos !== false && !is_array($this->limit))
          {
              $this->limit = substr($this->limit, 0, $tmp_pos);
          }
          $this->discount = $Busca_temp['discount']; 
          $tmp_pos = strpos($this->discount, "##@@");
          if ($tmp_pos !== false && !is_array($this->discount))
          {
              $this->discount = substr($this->discount, 0, $tmp_pos);
          }
          $this->sc_field_0 = $Busca_temp['sc_field_0']; 
          $tmp_pos = strpos($this->sc_field_0, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_0))
          {
              $this->sc_field_0 = substr($this->sc_field_0, 0, $tmp_pos);
          }
          $this->sc_field_1 = $Busca_temp['sc_field_1']; 
          $tmp_pos = strpos($this->sc_field_1, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_1))
          {
              $this->sc_field_1 = substr($this->sc_field_1, 0, $tmp_pos);
          }
          $this->policy = $Busca_temp['policy']; 
          $tmp_pos = strpos($this->policy, "##@@");
          if ($tmp_pos !== false && !is_array($this->policy))
          {
              $this->policy = substr($this->policy, 0, $tmp_pos);
          }
          $this->itemtype = $Busca_temp['itemtype']; 
          $tmp_pos = strpos($this->itemtype, "##@@");
          if ($tmp_pos !== false && !is_array($this->itemtype))
          {
              $this->itemtype = substr($this->itemtype, 0, $tmp_pos);
          }
          $this->deleted = $Busca_temp['deleted']; 
          $tmp_pos = strpos($this->deleted, "##@@");
          if ($tmp_pos !== false && !is_array($this->deleted))
          {
              $this->deleted = substr($this->deleted, 0, $tmp_pos);
          }
          $this->tempo = $Busca_temp['tempo']; 
          $tmp_pos = strpos($this->tempo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tempo))
          {
              $this->tempo = substr($this->tempo, 0, $tmp_pos);
          }
          $this->asuransi = $Busca_temp['asuransi']; 
          $tmp_pos = strpos($this->asuransi, "##@@");
          if ($tmp_pos !== false && !is_array($this->asuransi))
          {
              $this->asuransi = substr($this->asuransi, 0, $tmp_pos);
          }
          $this->marginobat = $Busca_temp['marginobat']; 
          $tmp_pos = strpos($this->marginobat, "##@@");
          if ($tmp_pos !== false && !is_array($this->marginobat))
          {
              $this->marginobat = substr($this->marginobat, 0, $tmp_pos);
          }
          $this->markuptindakan = $Busca_temp['markuptindakan']; 
          $tmp_pos = strpos($this->markuptindakan, "##@@");
          if ($tmp_pos !== false && !is_array($this->markuptindakan))
          {
              $this->markuptindakan = substr($this->markuptindakan, 0, $tmp_pos);
          }
          $this->markupobat = $Busca_temp['markupobat']; 
          $tmp_pos = strpos($this->markupobat, "##@@");
          if ($tmp_pos !== false && !is_array($this->markupobat))
          {
              $this->markupobat = substr($this->markupobat, 0, $tmp_pos);
          }
          $this->markuplab = $Busca_temp['markuplab']; 
          $tmp_pos = strpos($this->markuplab, "##@@");
          if ($tmp_pos !== false && !is_array($this->markuplab))
          {
              $this->markuplab = substr($this->markuplab, 0, $tmp_pos);
          }
          $this->markuprad = $Busca_temp['markuprad']; 
          $tmp_pos = strpos($this->markuprad, "##@@");
          if ($tmp_pos !== false && !is_array($this->markuprad))
          {
              $this->markuprad = substr($this->markuprad, 0, $tmp_pos);
          }
          $this->admpolitype = $Busca_temp['admpolitype']; 
          $tmp_pos = strpos($this->admpolitype, "##@@");
          if ($tmp_pos !== false && !is_array($this->admpolitype))
          {
              $this->admpolitype = substr($this->admpolitype, 0, $tmp_pos);
          }
          $this->adminaptype = $Busca_temp['adminaptype']; 
          $tmp_pos = strpos($this->adminaptype, "##@@");
          if ($tmp_pos !== false && !is_array($this->adminaptype))
          {
              $this->adminaptype = substr($this->adminaptype, 0, $tmp_pos);
          }
          $this->admpolibaru = $Busca_temp['admpolibaru']; 
          $tmp_pos = strpos($this->admpolibaru, "##@@");
          if ($tmp_pos !== false && !is_array($this->admpolibaru))
          {
              $this->admpolibaru = substr($this->admpolibaru, 0, $tmp_pos);
          }
          $this->admpolilama = $Busca_temp['admpolilama']; 
          $tmp_pos = strpos($this->admpolilama, "##@@");
          if ($tmp_pos !== false && !is_array($this->admpolilama))
          {
              $this->admpolilama = substr($this->admpolilama, 0, $tmp_pos);
          }
          $this->adminap = $Busca_temp['adminap']; 
          $tmp_pos = strpos($this->adminap, "##@@");
          if ($tmp_pos !== false && !is_array($this->adminap))
          {
              $this->adminap = substr($this->adminap, 0, $tmp_pos);
          }
          $this->sc_field_2 = $Busca_temp['sc_field_2']; 
          $tmp_pos = strpos($this->sc_field_2, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_2))
          {
              $this->sc_field_2 = substr($this->sc_field_2, 0, $tmp_pos);
          }
          $this->marginpma = $Busca_temp['marginpma']; 
          $tmp_pos = strpos($this->marginpma, "##@@");
          if ($tmp_pos !== false && !is_array($this->marginpma))
          {
              $this->marginpma = substr($this->marginpma, 0, $tmp_pos);
          }
          $this->withpma = $Busca_temp['withpma']; 
          $tmp_pos = strpos($this->withpma, "##@@");
          if ($tmp_pos !== false && !is_array($this->withpma))
          {
              $this->withpma = substr($this->withpma, 0, $tmp_pos);
          }
          $this->forminternal = $Busca_temp['forminternal']; 
          $tmp_pos = strpos($this->forminternal, "##@@");
          if ($tmp_pos !== false && !is_array($this->forminternal))
          {
              $this->forminternal = substr($this->forminternal, 0, $tmp_pos);
          }
          $this->vacc = $Busca_temp['vacc']; 
          $tmp_pos = strpos($this->vacc, "##@@");
          if ($tmp_pos !== false && !is_array($this->vacc))
          {
              $this->vacc = substr($this->vacc, 0, $tmp_pos);
          }
          $this->extcode = $Busca_temp['extcode']; 
          $tmp_pos = strpos($this->extcode, "##@@");
          if ($tmp_pos !== false && !is_array($this->extcode))
          {
              $this->extcode = substr($this->extcode, 0, $tmp_pos);
          }
          $this->umum = $Busca_temp['umum']; 
          $tmp_pos = strpos($this->umum, "##@@");
          if ($tmp_pos !== false && !is_array($this->umum))
          {
              $this->umum = substr($this->umum, 0, $tmp_pos);
          }
          $this->autoshow = $Busca_temp['autoshow']; 
          $tmp_pos = strpos($this->autoshow, "##@@");
          if ($tmp_pos !== false && !is_array($this->autoshow))
          {
              $this->autoshow = substr($this->autoshow, 0, $tmp_pos);
          }
          $this->bpjs = $Busca_temp['bpjs']; 
          $tmp_pos = strpos($this->bpjs, "##@@");
          if ($tmp_pos !== false && !is_array($this->bpjs))
          {
              $this->bpjs = substr($this->bpjs, 0, $tmp_pos);
          }
          $this->caracode = $Busca_temp['caracode']; 
          $tmp_pos = strpos($this->caracode, "##@@");
          if ($tmp_pos !== false && !is_array($this->caracode))
          {
              $this->caracode = substr($this->caracode, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['instcode'])) ? $this->New_label['instcode'] : "Kode Instansi"; 
          if ($Cada_col == "instcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['init'])) ? $this->New_label['init'] : "Inisial"; 
          if ($Cada_col == "init" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['name'])) ? $this->New_label['name'] : "Nama Instansi"; 
          if ($Cada_col == "name" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tempo'])) ? $this->New_label['tempo'] : "Jatuh Tempo (Hari)"; 
          if ($Cada_col == "tempo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['address'])) ? $this->New_label['address'] : "Alamat"; 
          if ($Cada_col == "address" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['city'])) ? $this->New_label['city'] : "Kota"; 
          if ($Cada_col == "city" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['phone'])) ? $this->New_label['phone'] : "Telepon"; 
          if ($Cada_col == "phone" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cp'])) ? $this->New_label['cp'] : "Kontak Person"; 
          if ($Cada_col == "cp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Awal Kontrak"; 
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
          $SC_Label = (isset($this->New_label['sc_field_1'])) ? $this->New_label['sc_field_1'] : "Kontrak Habis"; 
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
          $SC_Label = (isset($this->New_label['sc_field_2'])) ? $this->New_label['sc_field_2'] : "Terakhir Diupdate"; 
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
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT instCode, init, name, tempo, address, city, phone, cp, str_replace (convert(char(10),date(joinDate),102), '.', '-') + ' ' + convert(char(8),date(joinDate),20) as sc_field_0, str_replace (convert(char(10),date(expDate),102), '.', '-') + ' ' + convert(char(8),date(expDate),20) as sc_field_1, str_replace (convert(char(10),date(lastUpdated),102), '.', '-') + ' ' + convert(char(8),date(lastUpdated),20) as sc_field_2 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT instCode, init, name, tempo, address, city, phone, cp, date(joinDate) as sc_field_0, date(expDate) as sc_field_1, date(lastUpdated) as sc_field_2 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT instCode, init, name, tempo, address, city, phone, cp, convert(char(23),date(joinDate),121) as sc_field_0, convert(char(23),date(expDate),121) as sc_field_1, convert(char(23),date(lastUpdated),121) as sc_field_2 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT instCode, init, name, tempo, address, city, phone, cp, date(joinDate) as sc_field_0, date(expDate) as sc_field_1, date(lastUpdated) as sc_field_2 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT instCode, init, name, tempo, address, city, phone, cp, EXTEND(date(joinDate), YEAR TO DAY) as sc_field_0, EXTEND(date(expDate), YEAR TO DAY) as sc_field_1, EXTEND(date(lastUpdated), YEAR TO DAY) as sc_field_2 from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT instCode, init, name, tempo, address, city, phone, cp, date(joinDate) as sc_field_0, date(expDate) as sc_field_1, date(lastUpdated) as sc_field_2 from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['order_grid'];
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
         $this->instcode = $rs->fields[0] ;  
         $this->init = $rs->fields[1] ;  
         $this->name = $rs->fields[2] ;  
         $this->tempo = $rs->fields[3] ;  
         $this->tempo = (string)$this->tempo;
         $this->address = $rs->fields[4] ;  
         $this->city = $rs->fields[5] ;  
         $this->phone = $rs->fields[6] ;  
         $this->cp = $rs->fields[7] ;  
         $this->sc_field_0 = $rs->fields[8] ;  
         $this->sc_field_1 = $rs->fields[9] ;  
         $this->sc_field_2 = $rs->fields[10] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- instcode
   function NM_export_instcode()
   {
         $this->instcode = html_entity_decode($this->instcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->instcode = strip_tags($this->instcode);
         if (!NM_is_utf8($this->instcode))
         {
             $this->instcode = sc_convert_encoding($this->instcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->instcode = str_replace('<', '&lt;', $this->instcode);
         $this->instcode = str_replace('>', '&gt;', $this->instcode);
         $this->Texto_tag .= "<td>" . $this->instcode . "</td>\r\n";
   }
   //----- init
   function NM_export_init()
   {
         $this->init = html_entity_decode($this->init, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->init = strip_tags($this->init);
         if (!NM_is_utf8($this->init))
         {
             $this->init = sc_convert_encoding($this->init, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->init = str_replace('<', '&lt;', $this->init);
         $this->init = str_replace('>', '&gt;', $this->init);
         $this->Texto_tag .= "<td>" . $this->init . "</td>\r\n";
   }
   //----- name
   function NM_export_name()
   {
         $this->name = html_entity_decode($this->name, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->name = strip_tags($this->name);
         if (!NM_is_utf8($this->name))
         {
             $this->name = sc_convert_encoding($this->name, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->name = str_replace('<', '&lt;', $this->name);
         $this->name = str_replace('>', '&gt;', $this->name);
         $this->Texto_tag .= "<td>" . $this->name . "</td>\r\n";
   }
   //----- tempo
   function NM_export_tempo()
   {
             nmgp_Form_Num_Val($this->tempo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->tempo))
         {
             $this->tempo = sc_convert_encoding($this->tempo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tempo = str_replace('<', '&lt;', $this->tempo);
         $this->tempo = str_replace('>', '&gt;', $this->tempo);
         $this->Texto_tag .= "<td>" . $this->tempo . "</td>\r\n";
   }
   //----- address
   function NM_export_address()
   {
         $this->address = html_entity_decode($this->address, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->address = strip_tags($this->address);
         if (!NM_is_utf8($this->address))
         {
             $this->address = sc_convert_encoding($this->address, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->address = str_replace('<', '&lt;', $this->address);
         $this->address = str_replace('>', '&gt;', $this->address);
         $this->Texto_tag .= "<td>" . $this->address . "</td>\r\n";
   }
   //----- city
   function NM_export_city()
   {
         $this->city = html_entity_decode($this->city, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->city = strip_tags($this->city);
         if (!NM_is_utf8($this->city))
         {
             $this->city = sc_convert_encoding($this->city, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->city = str_replace('<', '&lt;', $this->city);
         $this->city = str_replace('>', '&gt;', $this->city);
         $this->Texto_tag .= "<td>" . $this->city . "</td>\r\n";
   }
   //----- phone
   function NM_export_phone()
   {
         $this->phone = html_entity_decode($this->phone, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->phone = strip_tags($this->phone);
         if (!NM_is_utf8($this->phone))
         {
             $this->phone = sc_convert_encoding($this->phone, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->phone = str_replace('<', '&lt;', $this->phone);
         $this->phone = str_replace('>', '&gt;', $this->phone);
         $this->Texto_tag .= "<td>" . $this->phone . "</td>\r\n";
   }
   //----- cp
   function NM_export_cp()
   {
         $this->cp = html_entity_decode($this->cp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cp = strip_tags($this->cp);
         if (!NM_is_utf8($this->cp))
         {
             $this->cp = sc_convert_encoding($this->cp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cp = str_replace('<', '&lt;', $this->cp);
         $this->cp = str_replace('>', '&gt;', $this->cp);
         $this->Texto_tag .= "<td>" . $this->cp . "</td>\r\n";
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
             $conteudo_x =  $this->sc_field_1;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->sc_field_1, "YYYY-MM-DD  ");
                 $this->sc_field_1 = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
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
             $conteudo_x =  $this->sc_field_2;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->sc_field_2, "YYYY-MM-DD  ");
                 $this->sc_field_2 = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if (!NM_is_utf8($this->sc_field_2))
         {
             $this->sc_field_2 = sc_convert_encoding($this->sc_field_2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_2 = str_replace('<', '&lt;', $this->sc_field_2);
         $this->sc_field_2 = str_replace('>', '&gt;', $this->sc_field_2);
         $this->Texto_tag .= "<td>" . $this->sc_field_2 . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - Instansi Penjamin :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_tbinstansi_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_tbinstansi"> 
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
