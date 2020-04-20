<?php

class cetak_form_pasien_rtf
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
      require_once($this->Ini->path_aplicacao . "cetak_form_pasien_total.class.php"); 
      $this->Tot      = new cetak_form_pasien_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['cetak_form_pasien']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_cetak_form_pasien";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "cetak_form_pasien.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['rtf_name']);
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->name = $Busca_temp['name']; 
          $tmp_pos = strpos($this->name, "##@@");
          if ($tmp_pos !== false && !is_array($this->name))
          {
              $this->name = substr($this->name, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['field_order'] as $Cada_col)
      { 
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
          $SC_Label = (isset($this->New_label['name'])) ? $this->New_label['name'] : "Name"; 
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
          $SC_Label = (isset($this->New_label['salut'])) ? $this->New_label['salut'] : "Salut"; 
          if ($Cada_col == "salut" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['address'])) ? $this->New_label['address'] : "Address"; 
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
          $SC_Label = (isset($this->New_label['city'])) ? $this->New_label['city'] : "City"; 
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
          $SC_Label = (isset($this->New_label['postcode'])) ? $this->New_label['postcode'] : "Post Code"; 
          if ($Cada_col == "postcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['phone'])) ? $this->New_label['phone'] : "Phone"; 
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
          $SC_Label = (isset($this->New_label['hp'])) ? $this->New_label['hp'] : "Hp"; 
          if ($Cada_col == "hp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['spouse'])) ? $this->New_label['spouse'] : "Spouse"; 
          if ($Cada_col == "spouse" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sex'])) ? $this->New_label['sex'] : "Sex"; 
          if ($Cada_col == "sex" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['type'])) ? $this->New_label['type'] : "Type"; 
          if ($Cada_col == "type" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['typename'])) ? $this->New_label['typename'] : "Type Name"; 
          if ($Cada_col == "typename" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['bbtb'])) ? $this->New_label['bbtb'] : "Bbtb"; 
          if ($Cada_col == "bbtb" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['partus'])) ? $this->New_label['partus'] : "Partus"; 
          if ($Cada_col == "partus" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['hamil'])) ? $this->New_label['hamil'] : "Hamil"; 
          if ($Cada_col == "hamil" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['email'])) ? $this->New_label['email'] : "Email"; 
          if ($Cada_col == "email" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['blood'])) ? $this->New_label['blood'] : "Blood"; 
          if ($Cada_col == "blood" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['location'])) ? $this->New_label['location'] : "Location"; 
          if ($Cada_col == "location" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['mother'])) ? $this->New_label['mother'] : "Mother"; 
          if ($Cada_col == "mother" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['father'])) ? $this->New_label['father'] : "Father"; 
          if ($Cada_col == "father" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['job'])) ? $this->New_label['job'] : "Job"; 
          if ($Cada_col == "job" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['religion'])) ? $this->New_label['religion'] : "Religion"; 
          if ($Cada_col == "religion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['birthplace'])) ? $this->New_label['birthplace'] : "Birthplace"; 
          if ($Cada_col == "birthplace" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['kelurahan'])) ? $this->New_label['kelurahan'] : "Kelurahan"; 
          if ($Cada_col == "kelurahan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['kecamatan'])) ? $this->New_label['kecamatan'] : "Kecamatan"; 
          if ($Cada_col == "kecamatan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rt'])) ? $this->New_label['rt'] : "Rt"; 
          if ($Cada_col == "rt" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rw'])) ? $this->New_label['rw'] : "Rw"; 
          if ($Cada_col == "rw" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['member'])) ? $this->New_label['member'] : "Member"; 
          if ($Cada_col == "member" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idno'])) ? $this->New_label['idno'] : "Id No"; 
          if ($Cada_col == "idno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jenis'])) ? $this->New_label['jenis'] : "Jenis"; 
          if ($Cada_col == "jenis" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['expdate'])) ? $this->New_label['expdate'] : "Exp Date"; 
          if ($Cada_col == "expdate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['photoname'])) ? $this->New_label['photoname'] : "Photo Name"; 
          if ($Cada_col == "photoname" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tlc'])) ? $this->New_label['tlc'] : "Tlc"; 
          if ($Cada_col == "tlc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['bu'])) ? $this->New_label['bu'] : "Bu"; 
          if ($Cada_col == "bu" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nip'])) ? $this->New_label['nip'] : "Nip"; 
          if ($Cada_col == "nip" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['instno'])) ? $this->New_label['instno'] : "Inst No"; 
          if ($Cada_col == "instno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['kelompokcode'])) ? $this->New_label['kelompokcode'] : "Kelompok Code"; 
          if ($Cada_col == "kelompokcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['kelompok'])) ? $this->New_label['kelompok'] : "Kelompok"; 
          if ($Cada_col == "kelompok" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['penanggung'])) ? $this->New_label['penanggung'] : "Penanggung"; 
          if ($Cada_col == "penanggung" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['registerdate'])) ? $this->New_label['registerdate'] : "Register Date"; 
          if ($Cada_col == "registerdate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cardno'])) ? $this->New_label['cardno'] : "Card No"; 
          if ($Cada_col == "cardno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['statusbl'])) ? $this->New_label['statusbl'] : "Status BL"; 
          if ($Cada_col == "statusbl" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Nama Lengkap"; 
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
          $SC_Label = (isset($this->New_label['alergi'])) ? $this->New_label['alergi'] : "alergi"; 
          if ($Cada_col == "alergi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['alergi2'])) ? $this->New_label['alergi2'] : "alergi2"; 
          if ($Cada_col == "alergi2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['alergi3'])) ? $this->New_label['alergi3'] : "alergi3"; 
          if ($Cada_col == "alergi3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cetak_date'])) ? $this->New_label['cetak_date'] : "cetak_date"; 
          if ($Cada_col == "cetak_date" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['gelar'])) ? $this->New_label['gelar'] : "gelar"; 
          if ($Cada_col == "gelar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nama'])) ? $this->New_label['nama'] : "nama"; 
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
          $SC_Label = (isset($this->New_label['perusahaan'])) ? $this->New_label['perusahaan'] : "perusahaan"; 
          if ($Cada_col == "perusahaan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rm1'])) ? $this->New_label['rm1'] : "rm1"; 
          if ($Cada_col == "rm1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rm2'])) ? $this->New_label['rm2'] : "rm2"; 
          if ($Cada_col == "rm2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rm3'])) ? $this->New_label['rm3'] : "rm3"; 
          if ($Cada_col == "rm3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rm4'])) ? $this->New_label['rm4'] : "rm4"; 
          if ($Cada_col == "rm4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rm5'])) ? $this->New_label['rm5'] : "rm5"; 
          if ($Cada_col == "rm5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rm6'])) ? $this->New_label['rm6'] : "rm6"; 
          if ($Cada_col == "rm6" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT custCode, name, salut, address, city, postCode, str_replace (convert(char(10),birthDate,102), '.', '-') + ' ' + convert(char(8),birthDate,20), phone, hp, spouse, sex, type, typeName, bbtb, str_replace (convert(char(10),partus,102), '.', '-') + ' ' + convert(char(8),partus,20), hamil, email, blood, location, mother, father, job, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, str_replace (convert(char(10),expDate,102), '.', '-') + ' ' + convert(char(8),expDate,20), photoName, tlc, bu, nip, instNo, kelompokCode, kelompok, penanggung, str_replace (convert(char(10),registerDate,102), '.', '-') + ' ' + convert(char(8),registerDate,20), cardNo, statusBL from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, bbtb, partus, hamil, email, blood, location, mother, father, job, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, tlc, bu, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT custCode, name, salut, address, city, postCode, convert(char(23),birthDate,121), phone, hp, spouse, sex, type, typeName, bbtb, convert(char(23),partus,121), hamil, email, blood, location, mother, father, job, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, convert(char(23),expDate,121), photoName, tlc, bu, nip, instNo, kelompokCode, kelompok, penanggung, convert(char(23),registerDate,121), cardNo, statusBL from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, bbtb, partus, hamil, email, blood, location, mother, father, job, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, tlc, bu, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT custCode, name, salut, address, city, postCode, EXTEND(birthDate, YEAR TO FRACTION), phone, hp, spouse, sex, type, typeName, bbtb, EXTEND(partus, YEAR TO FRACTION), hamil, email, blood, location, mother, father, job, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, EXTEND(expDate, YEAR TO FRACTION), photoName, tlc, bu, nip, instNo, kelompokCode, kelompok, penanggung, EXTEND(registerDate, YEAR TO FRACTION), cardNo, statusBL from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, bbtb, partus, hamil, email, blood, location, mother, father, job, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, tlc, bu, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['order_grid'];
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
         $this->custcode = $rs->fields[0] ;  
         $this->name = $rs->fields[1] ;  
         $this->salut = $rs->fields[2] ;  
         $this->address = $rs->fields[3] ;  
         $this->city = $rs->fields[4] ;  
         $this->postcode = $rs->fields[5] ;  
         $this->birthdate = $rs->fields[6] ;  
         $this->phone = $rs->fields[7] ;  
         $this->hp = $rs->fields[8] ;  
         $this->spouse = $rs->fields[9] ;  
         $this->sex = $rs->fields[10] ;  
         $this->type = $rs->fields[11] ;  
         $this->typename = $rs->fields[12] ;  
         $this->bbtb = $rs->fields[13] ;  
         $this->partus = $rs->fields[14] ;  
         $this->hamil = $rs->fields[15] ;  
         $this->hamil = (string)$this->hamil;
         $this->email = $rs->fields[16] ;  
         $this->blood = $rs->fields[17] ;  
         $this->location = $rs->fields[18] ;  
         $this->mother = $rs->fields[19] ;  
         $this->father = $rs->fields[20] ;  
         $this->job = $rs->fields[21] ;  
         $this->religion = $rs->fields[22] ;  
         $this->birthplace = $rs->fields[23] ;  
         $this->kelurahan = $rs->fields[24] ;  
         $this->kecamatan = $rs->fields[25] ;  
         $this->rt = $rs->fields[26] ;  
         $this->rw = $rs->fields[27] ;  
         $this->member = $rs->fields[28] ;  
         $this->idno = $rs->fields[29] ;  
         $this->jenis = $rs->fields[30] ;  
         $this->expdate = $rs->fields[31] ;  
         $this->photoname = $rs->fields[32] ;  
         $this->tlc = $rs->fields[33] ;  
         $this->bu = $rs->fields[34] ;  
         $this->nip = $rs->fields[35] ;  
         $this->instno = $rs->fields[36] ;  
         $this->kelompokcode = $rs->fields[37] ;  
         $this->kelompok = $rs->fields[38] ;  
         $this->penanggung = $rs->fields[39] ;  
         $this->registerdate = $rs->fields[40] ;  
         $this->cardno = $rs->fields[41] ;  
         $this->statusbl = $rs->fields[42] ;  
         $this->sc_proc_grid = true; 
         //----- lookup - sc_field_0
         $this->Lookup->lookup_sc_field_0($this->sc_field_0, $this->custcode, $this->array_sc_field_0); 
         $this->sc_field_0 = str_replace("<br>", " ", $this->sc_field_0); 
         $this->sc_field_0 = ($this->sc_field_0 == "&nbsp;") ? "" : $this->sc_field_0; 
         //----- lookup - alergi
         $this->Lookup->lookup_alergi($this->alergi, $this->custcode, $this->array_alergi); 
         $this->alergi = str_replace("<br>", " ", $this->alergi); 
         $this->alergi = ($this->alergi == "&nbsp;") ? "" : $this->alergi; 
         //----- lookup - alergi2
         $this->Lookup->lookup_alergi2($this->alergi2, $this->custcode, $this->array_alergi2); 
         $this->alergi2 = str_replace("<br>", " ", $this->alergi2); 
         $this->alergi2 = ($this->alergi2 == "&nbsp;") ? "" : $this->alergi2; 
         //----- lookup - alergi3
         $this->Lookup->lookup_alergi3($this->alergi3, $this->custcode, $this->array_alergi3); 
         $this->alergi3 = str_replace("<br>", " ", $this->alergi3); 
         $this->alergi3 = ($this->alergi3 == "&nbsp;") ? "" : $this->alergi3; 
         //----- lookup - perusahaan
         $this->Lookup->lookup_perusahaan($this->perusahaan, $this->bu, $this->array_perusahaan); 
         $this->perusahaan = str_replace("<br>", " ", $this->perusahaan); 
         $this->perusahaan = ($this->perusahaan == "&nbsp;") ? "" : $this->perusahaan; 
         $_SESSION['scriptcase']['cetak_form_pasien']['contr_erro'] = 'on';
 $this->rm1  = substr($this->custcode , 0, 1);
$this->rm2  = substr($this->custcode , 1, 1);
$this->rm3  = substr($this->custcode , 2, 1);
$this->rm4  = substr($this->custcode , 3, 1);
$this->rm5  = substr($this->custcode , 4, 1);
$this->rm6  = substr($this->custcode , 5, 1);

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
$this->cetak_date  = date('d').' '.($bulan[date('m')]).' '.date('Y');
$_SESSION['scriptcase']['cetak_form_pasien']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
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
   //----- salut
   function NM_export_salut()
   {
         $this->salut = html_entity_decode($this->salut, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->salut = strip_tags($this->salut);
         if (!NM_is_utf8($this->salut))
         {
             $this->salut = sc_convert_encoding($this->salut, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->salut = str_replace('<', '&lt;', $this->salut);
         $this->salut = str_replace('>', '&gt;', $this->salut);
         $this->Texto_tag .= "<td>" . $this->salut . "</td>\r\n";
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
   //----- postcode
   function NM_export_postcode()
   {
         $this->postcode = html_entity_decode($this->postcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->postcode = strip_tags($this->postcode);
         if (!NM_is_utf8($this->postcode))
         {
             $this->postcode = sc_convert_encoding($this->postcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->postcode = str_replace('<', '&lt;', $this->postcode);
         $this->postcode = str_replace('>', '&gt;', $this->postcode);
         $this->Texto_tag .= "<td>" . $this->postcode . "</td>\r\n";
   }
   //----- birthdate
   function NM_export_birthdate()
   {
             $conteudo_x =  $this->birthdate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->birthdate, "YYYY-MM-DD  ");
                 $this->birthdate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if (!NM_is_utf8($this->birthdate))
         {
             $this->birthdate = sc_convert_encoding($this->birthdate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->birthdate = str_replace('<', '&lt;', $this->birthdate);
         $this->birthdate = str_replace('>', '&gt;', $this->birthdate);
         $this->Texto_tag .= "<td>" . $this->birthdate . "</td>\r\n";
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
   //----- hp
   function NM_export_hp()
   {
         $this->hp = html_entity_decode($this->hp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->hp = strip_tags($this->hp);
         if (!NM_is_utf8($this->hp))
         {
             $this->hp = sc_convert_encoding($this->hp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->hp = str_replace('<', '&lt;', $this->hp);
         $this->hp = str_replace('>', '&gt;', $this->hp);
         $this->Texto_tag .= "<td>" . $this->hp . "</td>\r\n";
   }
   //----- spouse
   function NM_export_spouse()
   {
         $this->spouse = html_entity_decode($this->spouse, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->spouse = strip_tags($this->spouse);
         if (!NM_is_utf8($this->spouse))
         {
             $this->spouse = sc_convert_encoding($this->spouse, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->spouse = str_replace('<', '&lt;', $this->spouse);
         $this->spouse = str_replace('>', '&gt;', $this->spouse);
         $this->Texto_tag .= "<td>" . $this->spouse . "</td>\r\n";
   }
   //----- sex
   function NM_export_sex()
   {
         $this->sex = html_entity_decode($this->sex, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sex = strip_tags($this->sex);
         if (!NM_is_utf8($this->sex))
         {
             $this->sex = sc_convert_encoding($this->sex, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sex = str_replace('<', '&lt;', $this->sex);
         $this->sex = str_replace('>', '&gt;', $this->sex);
         $this->Texto_tag .= "<td>" . $this->sex . "</td>\r\n";
   }
   //----- type
   function NM_export_type()
   {
         $this->type = html_entity_decode($this->type, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->type = strip_tags($this->type);
         if (!NM_is_utf8($this->type))
         {
             $this->type = sc_convert_encoding($this->type, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->type = str_replace('<', '&lt;', $this->type);
         $this->type = str_replace('>', '&gt;', $this->type);
         $this->Texto_tag .= "<td>" . $this->type . "</td>\r\n";
   }
   //----- typename
   function NM_export_typename()
   {
         $this->typename = html_entity_decode($this->typename, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->typename = strip_tags($this->typename);
         if (!NM_is_utf8($this->typename))
         {
             $this->typename = sc_convert_encoding($this->typename, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->typename = str_replace('<', '&lt;', $this->typename);
         $this->typename = str_replace('>', '&gt;', $this->typename);
         $this->Texto_tag .= "<td>" . $this->typename . "</td>\r\n";
   }
   //----- bbtb
   function NM_export_bbtb()
   {
         $this->bbtb = html_entity_decode($this->bbtb, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->bbtb = strip_tags($this->bbtb);
         if (!NM_is_utf8($this->bbtb))
         {
             $this->bbtb = sc_convert_encoding($this->bbtb, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->bbtb = str_replace('<', '&lt;', $this->bbtb);
         $this->bbtb = str_replace('>', '&gt;', $this->bbtb);
         $this->Texto_tag .= "<td>" . $this->bbtb . "</td>\r\n";
   }
   //----- partus
   function NM_export_partus()
   {
             if (substr($this->partus, 10, 1) == "-") 
             { 
                 $this->partus = substr($this->partus, 0, 10) . " " . substr($this->partus, 11);
             } 
             if (substr($this->partus, 13, 1) == ".") 
             { 
                $this->partus = substr($this->partus, 0, 13) . ":" . substr($this->partus, 14, 2) . ":" . substr($this->partus, 17);
             } 
             $conteudo_x =  $this->partus;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->partus, "YYYY-MM-DD HH:II:SS  ");
                 $this->partus = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if (!NM_is_utf8($this->partus))
         {
             $this->partus = sc_convert_encoding($this->partus, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->partus = str_replace('<', '&lt;', $this->partus);
         $this->partus = str_replace('>', '&gt;', $this->partus);
         $this->Texto_tag .= "<td>" . $this->partus . "</td>\r\n";
   }
   //----- hamil
   function NM_export_hamil()
   {
             nmgp_Form_Num_Val($this->hamil, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->hamil))
         {
             $this->hamil = sc_convert_encoding($this->hamil, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->hamil = str_replace('<', '&lt;', $this->hamil);
         $this->hamil = str_replace('>', '&gt;', $this->hamil);
         $this->Texto_tag .= "<td>" . $this->hamil . "</td>\r\n";
   }
   //----- email
   function NM_export_email()
   {
         $this->email = html_entity_decode($this->email, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->email = strip_tags($this->email);
         if (!NM_is_utf8($this->email))
         {
             $this->email = sc_convert_encoding($this->email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->email = str_replace('<', '&lt;', $this->email);
         $this->email = str_replace('>', '&gt;', $this->email);
         $this->Texto_tag .= "<td>" . $this->email . "</td>\r\n";
   }
   //----- blood
   function NM_export_blood()
   {
         $this->blood = html_entity_decode($this->blood, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->blood = strip_tags($this->blood);
         if (!NM_is_utf8($this->blood))
         {
             $this->blood = sc_convert_encoding($this->blood, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->blood = str_replace('<', '&lt;', $this->blood);
         $this->blood = str_replace('>', '&gt;', $this->blood);
         $this->Texto_tag .= "<td>" . $this->blood . "</td>\r\n";
   }
   //----- location
   function NM_export_location()
   {
         $this->location = html_entity_decode($this->location, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->location = strip_tags($this->location);
         if (!NM_is_utf8($this->location))
         {
             $this->location = sc_convert_encoding($this->location, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->location = str_replace('<', '&lt;', $this->location);
         $this->location = str_replace('>', '&gt;', $this->location);
         $this->Texto_tag .= "<td>" . $this->location . "</td>\r\n";
   }
   //----- mother
   function NM_export_mother()
   {
         $this->mother = html_entity_decode($this->mother, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->mother = strip_tags($this->mother);
         if (!NM_is_utf8($this->mother))
         {
             $this->mother = sc_convert_encoding($this->mother, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->mother = str_replace('<', '&lt;', $this->mother);
         $this->mother = str_replace('>', '&gt;', $this->mother);
         $this->Texto_tag .= "<td>" . $this->mother . "</td>\r\n";
   }
   //----- father
   function NM_export_father()
   {
         $this->father = html_entity_decode($this->father, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->father = strip_tags($this->father);
         if (!NM_is_utf8($this->father))
         {
             $this->father = sc_convert_encoding($this->father, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->father = str_replace('<', '&lt;', $this->father);
         $this->father = str_replace('>', '&gt;', $this->father);
         $this->Texto_tag .= "<td>" . $this->father . "</td>\r\n";
   }
   //----- job
   function NM_export_job()
   {
         $this->job = html_entity_decode($this->job, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->job = strip_tags($this->job);
         if (!NM_is_utf8($this->job))
         {
             $this->job = sc_convert_encoding($this->job, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->job = str_replace('<', '&lt;', $this->job);
         $this->job = str_replace('>', '&gt;', $this->job);
         $this->Texto_tag .= "<td>" . $this->job . "</td>\r\n";
   }
   //----- religion
   function NM_export_religion()
   {
         $this->religion = html_entity_decode($this->religion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->religion = strip_tags($this->religion);
         if (!NM_is_utf8($this->religion))
         {
             $this->religion = sc_convert_encoding($this->religion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->religion = str_replace('<', '&lt;', $this->religion);
         $this->religion = str_replace('>', '&gt;', $this->religion);
         $this->Texto_tag .= "<td>" . $this->religion . "</td>\r\n";
   }
   //----- birthplace
   function NM_export_birthplace()
   {
         $this->birthplace = html_entity_decode($this->birthplace, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->birthplace = strip_tags($this->birthplace);
         if (!NM_is_utf8($this->birthplace))
         {
             $this->birthplace = sc_convert_encoding($this->birthplace, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->birthplace = str_replace('<', '&lt;', $this->birthplace);
         $this->birthplace = str_replace('>', '&gt;', $this->birthplace);
         $this->Texto_tag .= "<td>" . $this->birthplace . "</td>\r\n";
   }
   //----- kelurahan
   function NM_export_kelurahan()
   {
         $this->kelurahan = html_entity_decode($this->kelurahan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kelurahan = strip_tags($this->kelurahan);
         if (!NM_is_utf8($this->kelurahan))
         {
             $this->kelurahan = sc_convert_encoding($this->kelurahan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->kelurahan = str_replace('<', '&lt;', $this->kelurahan);
         $this->kelurahan = str_replace('>', '&gt;', $this->kelurahan);
         $this->Texto_tag .= "<td>" . $this->kelurahan . "</td>\r\n";
   }
   //----- kecamatan
   function NM_export_kecamatan()
   {
         $this->kecamatan = html_entity_decode($this->kecamatan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kecamatan = strip_tags($this->kecamatan);
         if (!NM_is_utf8($this->kecamatan))
         {
             $this->kecamatan = sc_convert_encoding($this->kecamatan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->kecamatan = str_replace('<', '&lt;', $this->kecamatan);
         $this->kecamatan = str_replace('>', '&gt;', $this->kecamatan);
         $this->Texto_tag .= "<td>" . $this->kecamatan . "</td>\r\n";
   }
   //----- rt
   function NM_export_rt()
   {
         $this->rt = html_entity_decode($this->rt, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rt = strip_tags($this->rt);
         if (!NM_is_utf8($this->rt))
         {
             $this->rt = sc_convert_encoding($this->rt, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rt = str_replace('<', '&lt;', $this->rt);
         $this->rt = str_replace('>', '&gt;', $this->rt);
         $this->Texto_tag .= "<td>" . $this->rt . "</td>\r\n";
   }
   //----- rw
   function NM_export_rw()
   {
         $this->rw = html_entity_decode($this->rw, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rw = strip_tags($this->rw);
         if (!NM_is_utf8($this->rw))
         {
             $this->rw = sc_convert_encoding($this->rw, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rw = str_replace('<', '&lt;', $this->rw);
         $this->rw = str_replace('>', '&gt;', $this->rw);
         $this->Texto_tag .= "<td>" . $this->rw . "</td>\r\n";
   }
   //----- member
   function NM_export_member()
   {
         $this->member = html_entity_decode($this->member, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->member = strip_tags($this->member);
         if (!NM_is_utf8($this->member))
         {
             $this->member = sc_convert_encoding($this->member, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->member = str_replace('<', '&lt;', $this->member);
         $this->member = str_replace('>', '&gt;', $this->member);
         $this->Texto_tag .= "<td>" . $this->member . "</td>\r\n";
   }
   //----- idno
   function NM_export_idno()
   {
         $this->idno = html_entity_decode($this->idno, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->idno = strip_tags($this->idno);
         if (!NM_is_utf8($this->idno))
         {
             $this->idno = sc_convert_encoding($this->idno, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->idno = str_replace('<', '&lt;', $this->idno);
         $this->idno = str_replace('>', '&gt;', $this->idno);
         $this->Texto_tag .= "<td>" . $this->idno . "</td>\r\n";
   }
   //----- jenis
   function NM_export_jenis()
   {
         $this->jenis = html_entity_decode($this->jenis, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->jenis = strip_tags($this->jenis);
         if (!NM_is_utf8($this->jenis))
         {
             $this->jenis = sc_convert_encoding($this->jenis, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jenis = str_replace('<', '&lt;', $this->jenis);
         $this->jenis = str_replace('>', '&gt;', $this->jenis);
         $this->Texto_tag .= "<td>" . $this->jenis . "</td>\r\n";
   }
   //----- expdate
   function NM_export_expdate()
   {
             $conteudo_x =  $this->expdate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->expdate, "YYYY-MM-DD  ");
                 $this->expdate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if (!NM_is_utf8($this->expdate))
         {
             $this->expdate = sc_convert_encoding($this->expdate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->expdate = str_replace('<', '&lt;', $this->expdate);
         $this->expdate = str_replace('>', '&gt;', $this->expdate);
         $this->Texto_tag .= "<td>" . $this->expdate . "</td>\r\n";
   }
   //----- photoname
   function NM_export_photoname()
   {
         $this->photoname = html_entity_decode($this->photoname, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->photoname = strip_tags($this->photoname);
         if (!NM_is_utf8($this->photoname))
         {
             $this->photoname = sc_convert_encoding($this->photoname, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->photoname = str_replace('<', '&lt;', $this->photoname);
         $this->photoname = str_replace('>', '&gt;', $this->photoname);
         $this->Texto_tag .= "<td>" . $this->photoname . "</td>\r\n";
   }
   //----- tlc
   function NM_export_tlc()
   {
         $this->tlc = html_entity_decode($this->tlc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tlc = strip_tags($this->tlc);
         if (!NM_is_utf8($this->tlc))
         {
             $this->tlc = sc_convert_encoding($this->tlc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tlc = str_replace('<', '&lt;', $this->tlc);
         $this->tlc = str_replace('>', '&gt;', $this->tlc);
         $this->Texto_tag .= "<td>" . $this->tlc . "</td>\r\n";
   }
   //----- bu
   function NM_export_bu()
   {
         $this->bu = html_entity_decode($this->bu, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->bu = strip_tags($this->bu);
         if (!NM_is_utf8($this->bu))
         {
             $this->bu = sc_convert_encoding($this->bu, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->bu = str_replace('<', '&lt;', $this->bu);
         $this->bu = str_replace('>', '&gt;', $this->bu);
         $this->Texto_tag .= "<td>" . $this->bu . "</td>\r\n";
   }
   //----- nip
   function NM_export_nip()
   {
         $this->nip = html_entity_decode($this->nip, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nip = strip_tags($this->nip);
         if (!NM_is_utf8($this->nip))
         {
             $this->nip = sc_convert_encoding($this->nip, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nip = str_replace('<', '&lt;', $this->nip);
         $this->nip = str_replace('>', '&gt;', $this->nip);
         $this->Texto_tag .= "<td>" . $this->nip . "</td>\r\n";
   }
   //----- instno
   function NM_export_instno()
   {
         $this->instno = html_entity_decode($this->instno, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->instno = strip_tags($this->instno);
         if (!NM_is_utf8($this->instno))
         {
             $this->instno = sc_convert_encoding($this->instno, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->instno = str_replace('<', '&lt;', $this->instno);
         $this->instno = str_replace('>', '&gt;', $this->instno);
         $this->Texto_tag .= "<td>" . $this->instno . "</td>\r\n";
   }
   //----- kelompokcode
   function NM_export_kelompokcode()
   {
         $this->kelompokcode = html_entity_decode($this->kelompokcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kelompokcode = strip_tags($this->kelompokcode);
         if (!NM_is_utf8($this->kelompokcode))
         {
             $this->kelompokcode = sc_convert_encoding($this->kelompokcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->kelompokcode = str_replace('<', '&lt;', $this->kelompokcode);
         $this->kelompokcode = str_replace('>', '&gt;', $this->kelompokcode);
         $this->Texto_tag .= "<td>" . $this->kelompokcode . "</td>\r\n";
   }
   //----- kelompok
   function NM_export_kelompok()
   {
         $this->kelompok = html_entity_decode($this->kelompok, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kelompok = strip_tags($this->kelompok);
         if (!NM_is_utf8($this->kelompok))
         {
             $this->kelompok = sc_convert_encoding($this->kelompok, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->kelompok = str_replace('<', '&lt;', $this->kelompok);
         $this->kelompok = str_replace('>', '&gt;', $this->kelompok);
         $this->Texto_tag .= "<td>" . $this->kelompok . "</td>\r\n";
   }
   //----- penanggung
   function NM_export_penanggung()
   {
         $this->penanggung = html_entity_decode($this->penanggung, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->penanggung = strip_tags($this->penanggung);
         if (!NM_is_utf8($this->penanggung))
         {
             $this->penanggung = sc_convert_encoding($this->penanggung, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->penanggung = str_replace('<', '&lt;', $this->penanggung);
         $this->penanggung = str_replace('>', '&gt;', $this->penanggung);
         $this->Texto_tag .= "<td>" . $this->penanggung . "</td>\r\n";
   }
   //----- registerdate
   function NM_export_registerdate()
   {
             if (substr($this->registerdate, 10, 1) == "-") 
             { 
                 $this->registerdate = substr($this->registerdate, 0, 10) . " " . substr($this->registerdate, 11);
             } 
             if (substr($this->registerdate, 13, 1) == ".") 
             { 
                $this->registerdate = substr($this->registerdate, 0, 13) . ":" . substr($this->registerdate, 14, 2) . ":" . substr($this->registerdate, 17);
             } 
             $conteudo_x =  $this->registerdate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->registerdate, "YYYY-MM-DD HH:II:SS  ");
                 $this->registerdate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if (!NM_is_utf8($this->registerdate))
         {
             $this->registerdate = sc_convert_encoding($this->registerdate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->registerdate = str_replace('<', '&lt;', $this->registerdate);
         $this->registerdate = str_replace('>', '&gt;', $this->registerdate);
         $this->Texto_tag .= "<td>" . $this->registerdate . "</td>\r\n";
   }
   //----- cardno
   function NM_export_cardno()
   {
         $this->cardno = html_entity_decode($this->cardno, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cardno = strip_tags($this->cardno);
         if (!NM_is_utf8($this->cardno))
         {
             $this->cardno = sc_convert_encoding($this->cardno, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cardno = str_replace('<', '&lt;', $this->cardno);
         $this->cardno = str_replace('>', '&gt;', $this->cardno);
         $this->Texto_tag .= "<td>" . $this->cardno . "</td>\r\n";
   }
   //----- statusbl
   function NM_export_statusbl()
   {
         $this->statusbl = html_entity_decode($this->statusbl, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->statusbl = strip_tags($this->statusbl);
         if (!NM_is_utf8($this->statusbl))
         {
             $this->statusbl = sc_convert_encoding($this->statusbl, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->statusbl = str_replace('<', '&lt;', $this->statusbl);
         $this->statusbl = str_replace('>', '&gt;', $this->statusbl);
         $this->Texto_tag .= "<td>" . $this->statusbl . "</td>\r\n";
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
   //----- alergi
   function NM_export_alergi()
   {
         if (!NM_is_utf8($this->alergi))
         {
             $this->alergi = sc_convert_encoding($this->alergi, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->alergi = str_replace('<', '&lt;', $this->alergi);
         $this->alergi = str_replace('>', '&gt;', $this->alergi);
         $this->Texto_tag .= "<td>" . $this->alergi . "</td>\r\n";
   }
   //----- alergi2
   function NM_export_alergi2()
   {
         if (!NM_is_utf8($this->alergi2))
         {
             $this->alergi2 = sc_convert_encoding($this->alergi2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->alergi2 = str_replace('<', '&lt;', $this->alergi2);
         $this->alergi2 = str_replace('>', '&gt;', $this->alergi2);
         $this->Texto_tag .= "<td>" . $this->alergi2 . "</td>\r\n";
   }
   //----- alergi3
   function NM_export_alergi3()
   {
         if (!NM_is_utf8($this->alergi3))
         {
             $this->alergi3 = sc_convert_encoding($this->alergi3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->alergi3 = str_replace('<', '&lt;', $this->alergi3);
         $this->alergi3 = str_replace('>', '&gt;', $this->alergi3);
         $this->Texto_tag .= "<td>" . $this->alergi3 . "</td>\r\n";
   }
   //----- cetak_date
   function NM_export_cetak_date()
   {
         $this->cetak_date = html_entity_decode($this->cetak_date, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->cetak_date))
         {
             $this->cetak_date = sc_convert_encoding($this->cetak_date, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cetak_date = str_replace('<', '&lt;', $this->cetak_date);
         $this->cetak_date = str_replace('>', '&gt;', $this->cetak_date);
         $this->Texto_tag .= "<td>" . $this->cetak_date . "</td>\r\n";
   }
   //----- gelar
   function NM_export_gelar()
   {
         $this->gelar = html_entity_decode($this->gelar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->gelar = strip_tags($this->gelar);
         if (!NM_is_utf8($this->gelar))
         {
             $this->gelar = sc_convert_encoding($this->gelar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->gelar = str_replace('<', '&lt;', $this->gelar);
         $this->gelar = str_replace('>', '&gt;', $this->gelar);
         $this->Texto_tag .= "<td>" . $this->gelar . "</td>\r\n";
   }
   //----- nama
   function NM_export_nama()
   {
         $this->nama = html_entity_decode($this->nama, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nama = strip_tags($this->nama);
         if (!NM_is_utf8($this->nama))
         {
             $this->nama = sc_convert_encoding($this->nama, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nama = str_replace('<', '&lt;', $this->nama);
         $this->nama = str_replace('>', '&gt;', $this->nama);
         $this->Texto_tag .= "<td>" . $this->nama . "</td>\r\n";
   }
   //----- perusahaan
   function NM_export_perusahaan()
   {
         if (!NM_is_utf8($this->perusahaan))
         {
             $this->perusahaan = sc_convert_encoding($this->perusahaan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->perusahaan = str_replace('<', '&lt;', $this->perusahaan);
         $this->perusahaan = str_replace('>', '&gt;', $this->perusahaan);
         $this->Texto_tag .= "<td>" . $this->perusahaan . "</td>\r\n";
   }
   //----- rm1
   function NM_export_rm1()
   {
         $this->rm1 = html_entity_decode($this->rm1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rm1 = strip_tags($this->rm1);
         if (!NM_is_utf8($this->rm1))
         {
             $this->rm1 = sc_convert_encoding($this->rm1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rm1 = str_replace('<', '&lt;', $this->rm1);
         $this->rm1 = str_replace('>', '&gt;', $this->rm1);
         $this->Texto_tag .= "<td>" . $this->rm1 . "</td>\r\n";
   }
   //----- rm2
   function NM_export_rm2()
   {
         $this->rm2 = html_entity_decode($this->rm2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rm2 = strip_tags($this->rm2);
         if (!NM_is_utf8($this->rm2))
         {
             $this->rm2 = sc_convert_encoding($this->rm2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rm2 = str_replace('<', '&lt;', $this->rm2);
         $this->rm2 = str_replace('>', '&gt;', $this->rm2);
         $this->Texto_tag .= "<td>" . $this->rm2 . "</td>\r\n";
   }
   //----- rm3
   function NM_export_rm3()
   {
         $this->rm3 = html_entity_decode($this->rm3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rm3 = strip_tags($this->rm3);
         if (!NM_is_utf8($this->rm3))
         {
             $this->rm3 = sc_convert_encoding($this->rm3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rm3 = str_replace('<', '&lt;', $this->rm3);
         $this->rm3 = str_replace('>', '&gt;', $this->rm3);
         $this->Texto_tag .= "<td>" . $this->rm3 . "</td>\r\n";
   }
   //----- rm4
   function NM_export_rm4()
   {
         $this->rm4 = html_entity_decode($this->rm4, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rm4 = strip_tags($this->rm4);
         if (!NM_is_utf8($this->rm4))
         {
             $this->rm4 = sc_convert_encoding($this->rm4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rm4 = str_replace('<', '&lt;', $this->rm4);
         $this->rm4 = str_replace('>', '&gt;', $this->rm4);
         $this->Texto_tag .= "<td>" . $this->rm4 . "</td>\r\n";
   }
   //----- rm5
   function NM_export_rm5()
   {
         $this->rm5 = html_entity_decode($this->rm5, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rm5 = strip_tags($this->rm5);
         if (!NM_is_utf8($this->rm5))
         {
             $this->rm5 = sc_convert_encoding($this->rm5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rm5 = str_replace('<', '&lt;', $this->rm5);
         $this->rm5 = str_replace('>', '&gt;', $this->rm5);
         $this->Texto_tag .= "<td>" . $this->rm5 . "</td>\r\n";
   }
   //----- rm6
   function NM_export_rm6()
   {
         $this->rm6 = html_entity_decode($this->rm6, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rm6 = strip_tags($this->rm6);
         if (!NM_is_utf8($this->rm6))
         {
             $this->rm6 = sc_convert_encoding($this->rm6, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rm6 = str_replace('<', '&lt;', $this->rm6);
         $this->rm6 = str_replace('>', '&gt;', $this->rm6);
         $this->Texto_tag .= "<td>" . $this->rm6 . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> - tbcustomer :: RTF</TITLE>
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
<form name="Fdown" method="get" action="cetak_form_pasien_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="cetak_form_pasien"> 
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
