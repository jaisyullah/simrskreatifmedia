<?php

class grid_tbdetailokR_rtf
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
      require_once($this->Ini->path_aplicacao . "grid_tbdetailokR_total.class.php"); 
      $this->Tot      = new grid_tbdetailokR_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_tbdetailokR']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_tbdetailokR";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_tbdetailokR.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailokR']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailokR']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailokR']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->babybirth = $Busca_temp['babybirth']; 
          $tmp_pos = strpos($this->babybirth, "##@@");
          if ($tmp_pos !== false && !is_array($this->babybirth))
          {
              $this->babybirth = substr($this->babybirth, 0, $tmp_pos);
          }
          $this->id = $Busca_temp['id']; 
          $tmp_pos = strpos($this->id, "##@@");
          if ($tmp_pos !== false && !is_array($this->id))
          {
              $this->id = substr($this->id, 0, $tmp_pos);
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
          $this->birthdate = $Busca_temp['birthdate']; 
          $tmp_pos = strpos($this->birthdate, "##@@");
          if ($tmp_pos !== false && !is_array($this->birthdate))
          {
              $this->birthdate = substr($this->birthdate, 0, $tmp_pos);
          }
          $this->birthtime = $Busca_temp['birthtime']; 
          $tmp_pos = strpos($this->birthtime, "##@@");
          if ($tmp_pos !== false && !is_array($this->birthtime))
          {
              $this->birthtime = substr($this->birthtime, 0, $tmp_pos);
          }
          $this->bb = $Busca_temp['bb']; 
          $tmp_pos = strpos($this->bb, "##@@");
          if ($tmp_pos !== false && !is_array($this->bb))
          {
              $this->bb = substr($this->bb, 0, $tmp_pos);
          }
          $this->tb = $Busca_temp['tb']; 
          $tmp_pos = strpos($this->tb, "##@@");
          if ($tmp_pos !== false && !is_array($this->tb))
          {
              $this->tb = substr($this->tb, 0, $tmp_pos);
          }
          $this->lingkar = $Busca_temp['lingkar']; 
          $tmp_pos = strpos($this->lingkar, "##@@");
          if ($tmp_pos !== false && !is_array($this->lingkar))
          {
              $this->lingkar = substr($this->lingkar, 0, $tmp_pos);
          }
          $this->hidup = $Busca_temp['hidup']; 
          $tmp_pos = strpos($this->hidup, "##@@");
          if ($tmp_pos !== false && !is_array($this->hidup))
          {
              $this->hidup = substr($this->hidup, 0, $tmp_pos);
          }
          $this->anestime = $Busca_temp['anestime']; 
          $tmp_pos = strpos($this->anestime, "##@@");
          if ($tmp_pos !== false && !is_array($this->anestime))
          {
              $this->anestime = substr($this->anestime, 0, $tmp_pos);
          }
          $this->desinfecttime = $Busca_temp['desinfecttime']; 
          $tmp_pos = strpos($this->desinfecttime, "##@@");
          if ($tmp_pos !== false && !is_array($this->desinfecttime))
          {
              $this->desinfecttime = substr($this->desinfecttime, 0, $tmp_pos);
          }
          $this->opertime = $Busca_temp['opertime']; 
          $tmp_pos = strpos($this->opertime, "##@@");
          if ($tmp_pos !== false && !is_array($this->opertime))
          {
              $this->opertime = substr($this->opertime, 0, $tmp_pos);
          }
          $this->tutuplukatime = $Busca_temp['tutuplukatime']; 
          $tmp_pos = strpos($this->tutuplukatime, "##@@");
          if ($tmp_pos !== false && !is_array($this->tutuplukatime))
          {
              $this->tutuplukatime = substr($this->tutuplukatime, 0, $tmp_pos);
          }
          $this->rrouttime = $Busca_temp['rrouttime']; 
          $tmp_pos = strpos($this->rrouttime, "##@@");
          if ($tmp_pos !== false && !is_array($this->rrouttime))
          {
              $this->rrouttime = substr($this->rrouttime, 0, $tmp_pos);
          }
          $this->tindakanrr = $Busca_temp['tindakanrr']; 
          $tmp_pos = strpos($this->tindakanrr, "##@@");
          if ($tmp_pos !== false && !is_array($this->tindakanrr))
          {
              $this->tindakanrr = substr($this->tindakanrr, 0, $tmp_pos);
          }
          $this->pa = $Busca_temp['pa']; 
          $tmp_pos = strpos($this->pa, "##@@");
          if ($tmp_pos !== false && !is_array($this->pa))
          {
              $this->pa = substr($this->pa, 0, $tmp_pos);
          }
          $this->cito = $Busca_temp['cito']; 
          $tmp_pos = strpos($this->cito, "##@@");
          if ($tmp_pos !== false && !is_array($this->cito))
          {
              $this->cito = substr($this->cito, 0, $tmp_pos);
          }
          $this->vc = $Busca_temp['vc']; 
          $tmp_pos = strpos($this->vc, "##@@");
          if ($tmp_pos !== false && !is_array($this->vc))
          {
              $this->vc = substr($this->vc, 0, $tmp_pos);
          }
          $this->cultur = $Busca_temp['cultur']; 
          $tmp_pos = strpos($this->cultur, "##@@");
          if ($tmp_pos !== false && !is_array($this->cultur))
          {
              $this->cultur = substr($this->cultur, 0, $tmp_pos);
          }
          $this->sewa = $Busca_temp['sewa']; 
          $tmp_pos = strpos($this->sewa, "##@@");
          if ($tmp_pos !== false && !is_array($this->sewa))
          {
              $this->sewa = substr($this->sewa, 0, $tmp_pos);
          }
          $this->asa = $Busca_temp['asa']; 
          $tmp_pos = strpos($this->asa, "##@@");
          if ($tmp_pos !== false && !is_array($this->asa))
          {
              $this->asa = substr($this->asa, 0, $tmp_pos);
          }
          $this->diagpre = $Busca_temp['diagpre']; 
          $tmp_pos = strpos($this->diagpre, "##@@");
          if ($tmp_pos !== false && !is_array($this->diagpre))
          {
              $this->diagpre = substr($this->diagpre, 0, $tmp_pos);
          }
          $this->diagpost = $Busca_temp['diagpost']; 
          $tmp_pos = strpos($this->diagpost, "##@@");
          if ($tmp_pos !== false && !is_array($this->diagpost))
          {
              $this->diagpost = substr($this->diagpost, 0, $tmp_pos);
          }
          $this->trandate = $Busca_temp['trandate']; 
          $tmp_pos = strpos($this->trandate, "##@@");
          if ($tmp_pos !== false && !is_array($this->trandate))
          {
              $this->trandate = substr($this->trandate, 0, $tmp_pos);
          }
          $this->entrydate = $Busca_temp['entrydate']; 
          $tmp_pos = strpos($this->entrydate, "##@@");
          if ($tmp_pos !== false && !is_array($this->entrydate))
          {
              $this->entrydate = substr($this->entrydate, 0, $tmp_pos);
          }
          $this->class = $Busca_temp['class']; 
          $tmp_pos = strpos($this->class, "##@@");
          if ($tmp_pos !== false && !is_array($this->class))
          {
              $this->class = substr($this->class, 0, $tmp_pos);
          }
          $this->inapcode = $Busca_temp['inapcode']; 
          $tmp_pos = strpos($this->inapcode, "##@@");
          if ($tmp_pos !== false && !is_array($this->inapcode))
          {
              $this->inapcode = substr($this->inapcode, 0, $tmp_pos);
          }
          $this->awalobs = $Busca_temp['awalobs']; 
          $tmp_pos = strpos($this->awalobs, "##@@");
          if ($tmp_pos !== false && !is_array($this->awalobs))
          {
              $this->awalobs = substr($this->awalobs, 0, $tmp_pos);
          }
          $this->akhirobs = $Busca_temp['akhirobs']; 
          $tmp_pos = strpos($this->akhirobs, "##@@");
          if ($tmp_pos !== false && !is_array($this->akhirobs))
          {
              $this->akhirobs = substr($this->akhirobs, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['field_order'] as $Cada_col)
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
          $SC_Label = (isset($this->New_label['inapcode'])) ? $this->New_label['inapcode'] : "Kode Inap"; 
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
          $SC_Label = (isset($this->New_label['entrydate'])) ? $this->New_label['entrydate'] : "Tgl. Masuk OK"; 
          if ($Cada_col == "entrydate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['diagpre'])) ? $this->New_label['diagpre'] : "Diagnosa Pre Op"; 
          if ($Cada_col == "diagpre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['diagpost'])) ? $this->New_label['diagpost'] : "Diagnosa Post Op"; 
          if ($Cada_col == "diagpost" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id'])) ? $this->New_label['id'] : "Id"; 
          if ($Cada_col == "id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['babybirth'])) ? $this->New_label['babybirth'] : "Baby Birth"; 
          if ($Cada_col == "babybirth" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['birthdate'])) ? $this->New_label['birthdate'] : "Birth Date"; 
          if ($Cada_col == "birthdate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['birthtime'])) ? $this->New_label['birthtime'] : "Birth Time"; 
          if ($Cada_col == "birthtime" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT tranCode, custCode, inapCode, str_replace (convert(char(10),entryDate,102), '.', '-') + ' ' + convert(char(8),entryDate,20), diagPre, diagPost, id, babyBirth, str_replace (convert(char(10),birthDate,102), '.', '-') + ' ' + convert(char(8),birthDate,20), birthTime from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tranCode, custCode, inapCode, entryDate, diagPre, diagPost, id, babyBirth, birthDate, birthTime from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT tranCode, custCode, inapCode, convert(char(23),entryDate,121), diagPre, diagPost, id, babyBirth, convert(char(23),birthDate,121), birthTime from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tranCode, custCode, inapCode, entryDate, diagPre, diagPost, id, babyBirth, birthDate, birthTime from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT tranCode, custCode, inapCode, EXTEND(entryDate, YEAR TO FRACTION), diagPre, diagPost, id, babyBirth, EXTEND(birthDate, YEAR TO FRACTION), birthTime from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT tranCode, custCode, inapCode, entryDate, diagPre, diagPost, id, babyBirth, birthDate, birthTime from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['order_grid'];
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
         $this->inapcode = $rs->fields[2] ;  
         $this->entrydate = $rs->fields[3] ;  
         $this->diagpre = $rs->fields[4] ;  
         $this->diagpost = $rs->fields[5] ;  
         $this->id = $rs->fields[6] ;  
         $this->id = (string)$this->id;
         $this->babybirth = $rs->fields[7] ;  
         $this->babybirth = (string)$this->babybirth;
         $this->birthdate = $rs->fields[8] ;  
         $this->birthtime = $rs->fields[9] ;  
         //----- lookup - custcode
         $this->look_custcode = $this->custcode; 
         $this->Lookup->lookup_custcode($this->look_custcode, $this->custcode) ; 
         $this->look_custcode = ($this->look_custcode == "&nbsp;") ? "" : $this->look_custcode; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['export_sel_columns']['usr_cmp_sel']);
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
   //----- entrydate
   function NM_export_entrydate()
   {
             if (substr($this->entrydate, 10, 1) == "-") 
             { 
                 $this->entrydate = substr($this->entrydate, 0, 10) . " " . substr($this->entrydate, 11);
             } 
             if (substr($this->entrydate, 13, 1) == ".") 
             { 
                $this->entrydate = substr($this->entrydate, 0, 13) . ":" . substr($this->entrydate, 14, 2) . ":" . substr($this->entrydate, 17);
             } 
             $conteudo_x =  $this->entrydate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->entrydate, "YYYY-MM-DD HH:II:SS  ");
                 $this->entrydate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if (!NM_is_utf8($this->entrydate))
         {
             $this->entrydate = sc_convert_encoding($this->entrydate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->entrydate = str_replace('<', '&lt;', $this->entrydate);
         $this->entrydate = str_replace('>', '&gt;', $this->entrydate);
         $this->Texto_tag .= "<td>" . $this->entrydate . "</td>\r\n";
   }
   //----- diagpre
   function NM_export_diagpre()
   {
         $this->diagpre = html_entity_decode($this->diagpre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->diagpre = strip_tags($this->diagpre);
         if (!NM_is_utf8($this->diagpre))
         {
             $this->diagpre = sc_convert_encoding($this->diagpre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->diagpre = str_replace('<', '&lt;', $this->diagpre);
         $this->diagpre = str_replace('>', '&gt;', $this->diagpre);
         $this->Texto_tag .= "<td>" . $this->diagpre . "</td>\r\n";
   }
   //----- diagpost
   function NM_export_diagpost()
   {
         $this->diagpost = html_entity_decode($this->diagpost, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->diagpost = strip_tags($this->diagpost);
         if (!NM_is_utf8($this->diagpost))
         {
             $this->diagpost = sc_convert_encoding($this->diagpost, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->diagpost = str_replace('<', '&lt;', $this->diagpost);
         $this->diagpost = str_replace('>', '&gt;', $this->diagpost);
         $this->Texto_tag .= "<td>" . $this->diagpost . "</td>\r\n";
   }
   //----- id
   function NM_export_id()
   {
             nmgp_Form_Num_Val($this->id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id))
         {
             $this->id = sc_convert_encoding($this->id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id = str_replace('<', '&lt;', $this->id);
         $this->id = str_replace('>', '&gt;', $this->id);
         $this->Texto_tag .= "<td>" . $this->id . "</td>\r\n";
   }
   //----- babybirth
   function NM_export_babybirth()
   {
             nmgp_Form_Num_Val($this->babybirth, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->babybirth))
         {
             $this->babybirth = sc_convert_encoding($this->babybirth, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->babybirth = str_replace('<', '&lt;', $this->babybirth);
         $this->babybirth = str_replace('>', '&gt;', $this->babybirth);
         $this->Texto_tag .= "<td>" . $this->babybirth . "</td>\r\n";
   }
   //----- birthdate
   function NM_export_birthdate()
   {
             if (substr($this->birthdate, 10, 1) == "-") 
             { 
                 $this->birthdate = substr($this->birthdate, 0, 10) . " " . substr($this->birthdate, 11);
             } 
             if (substr($this->birthdate, 13, 1) == ".") 
             { 
                $this->birthdate = substr($this->birthdate, 0, 13) . ":" . substr($this->birthdate, 14, 2) . ":" . substr($this->birthdate, 17);
             } 
             $conteudo_x =  $this->birthdate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->birthdate, "YYYY-MM-DD HH:II:SS  ");
                 $this->birthdate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if (!NM_is_utf8($this->birthdate))
         {
             $this->birthdate = sc_convert_encoding($this->birthdate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->birthdate = str_replace('<', '&lt;', $this->birthdate);
         $this->birthdate = str_replace('>', '&gt;', $this->birthdate);
         $this->Texto_tag .= "<td>" . $this->birthdate . "</td>\r\n";
   }
   //----- birthtime
   function NM_export_birthtime()
   {
         $this->birthtime = html_entity_decode($this->birthtime, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->birthtime = strip_tags($this->birthtime);
         if (!NM_is_utf8($this->birthtime))
         {
             $this->birthtime = sc_convert_encoding($this->birthtime, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->birthtime = str_replace('<', '&lt;', $this->birthtime);
         $this->birthtime = str_replace('>', '&gt;', $this->birthtime);
         $this->Texto_tag .= "<td>" . $this->birthtime . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailokR'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - Kamar Operasi :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_tbdetailokR_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_tbdetailokR"> 
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
