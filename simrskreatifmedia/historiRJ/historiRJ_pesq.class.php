<?php

class historiRJ_pesq
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $cmp_formatado;
   var $nm_data;
   var $Campos_Mens_erro;

   var $comando;
   var $comando_sum;
   var $comando_filtro;
   var $comando_ini;
   var $comando_fim;
   var $NM_operador;
   var $NM_data_qp;
   var $NM_path_filter;
   var $NM_curr_fil;
   var $nm_location;
   var $NM_ajax_opcao;
   var $nmgp_botoes = array();
   var $NM_fil_ant = array();

   /**
    * @access  public
    */
   function __construct()
   {
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcustomer']['opc_psq'] = false; 
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   function monta_busca()
   {
      global $bprocessa;
      include("../_lib/css/" . $this->Ini->str_schema_filter . "_filter.php");
      $this->Ini->Str_btn_filter = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_filter_css  = trim($str_button) . "/" . trim($str_button) . ".css";
      $this->Ini->str_google_fonts = (isset($str_google_fonts) && !empty($str_google_fonts))?$str_google_fonts:'';
      include($this->Ini->path_btn . $this->Ini->Str_btn_filter);
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['path_libs_php'] = $this->Ini->path_lib_php;
      $this->Img_sep_filter = "/" . trim($str_toolbar_separator);
      $this->Block_img_col  = trim($str_block_col);
      $this->Block_img_exp  = trim($str_block_exp);
      $this->Bubble_tail    = trim($str_bubble_tail);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput"); 
      $this->NM_case_insensitive = false;
      $this->init();
      if ($this->NM_ajax_flag && $this->NM_ajax_opcao == "ajax_grid_search_change_fil")
      {
          $arr_new_fil = $this->recupera_filtro($this->NM_ajax_grid_fil);
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'] = array(); 
          foreach ($arr_new_fil as $tp)
          {
              foreach ($tp as $ind => $cada_dado)
              {
                  $field = $cada_dado['field'];
                  if (substr($cada_dado['field'], 0, 3) == "SC_")
                  {
                      $field = substr($cada_dado['field'], 3);
                  }
                  if (substr($cada_dado['field'], 0, 6) == "id_ac_")
                  {
                      $field = substr($cada_dado['field'], 6);
                  }
                  if (is_array($cada_dado['value']))
                  {
                      $arr_tmp = array();
                      foreach($cada_dado['value'] as $ix => $dados)
                      {
                          if (isset($dados['opt']))
                          {
                              $arr_tmp[] = $dados['opt'];
                          }
                          else
                          {
                              $arr_tmp[] = $dados;
                          }
                      }
                      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'][$field] = $arr_tmp; 
                  }
                  else
                  {
                      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'][$field] = $cada_dado['value']; 
                  }
              }
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->processa_busca();
          if (!empty($this->Campos_Mens_erro)) 
          {
              scriptcase_error_display($this->Campos_Mens_erro, ""); 
              return false;
          }
          return true;
      }
      if ($this->NM_ajax_flag && $this->NM_ajax_opcao == "ajax_grid_search")
      {
         $this->processa_busca();
         return;
      }
      if ($this->NM_ajax_flag)
      {
          ob_start();
          $this->Arr_result = array();
          $this->processa_ajax();
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          if ($this->Db)
          {
              $this->Db->Close(); 
          }
          exit;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['prim_vez']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['prim_vez'] = "S";
      }
      if (isset($bprocessa) && "pesq" == $bprocessa)
      {
         $this->processa_busca();
      }
      else
      {
         $this->monta_formulario();
      }
   }

   /**
    * @access  public
    */
   function monta_formulario()
   {
      $this->monta_html_ini();
      $this->monta_cabecalho();
      $this->monta_form();
      $this->monta_html_fim();
   }

   /**
    * @access  public
    */
   function init()
   {
      global $bprocessa;
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Ini->Nm_lang['lang_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_mnth_june'],
                                  $this->Ini->Nm_lang['lang_mnth_july'],
                                  $this->Ini->Nm_lang['lang_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Ini->Nm_lang['lang_days_sund'],
                                  $this->Ini->Nm_lang['lang_days_mond'],
                                  $this->Ini->Nm_lang['lang_days_tued'],
                                  $this->Ini->Nm_lang['lang_days_wend'],
                                  $this->Ini->Nm_lang['lang_days_thud'],
                                  $this->Ini->Nm_lang['lang_days_frid'],
                                  $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                  $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                  $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                  $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                  $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                  $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                  $this->Ini->Nm_lang['lang_shrt_days_satd']);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_api.php", "", "") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("id");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $this->NM_path_filter = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/filters/";
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['opcao'] = "igual";
   }

   function processa_ajax()
   {
      global $NM_filters, $NM_filters_del, $nmgp_save_name, $nmgp_save_option, $NM_fields_refresh, $NM_parms_refresh, $Campo_bi, $Opc_bi, $NM_operador, $nmgp_save_origem;
//-- ajax metodos ---
      if ($this->NM_ajax_opcao == "ajax_filter_save")
      {
          ob_end_clean();
          ob_end_clean();
          $this->salva_filtro($nmgp_save_origem);
          $this->NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Tipo_filter[1] = sc_convert_encoding($Tipo_filter[1], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" . historiRJ_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . historiRJ_pack_protect_string($Tipo_filter[0]) . "\">.." . historiRJ_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
          if (isset($nmgp_save_origem) && $nmgp_save_origem == "grid")
          {
              $Ajax_select  = "<SELECT id=\"id_sel_recup_filters\" class=\"scFilterToolbar_obj\" name=\"sel_recup_filters\" onChange=\"nm_change_grid_search(this)\" size=\"1\">\r\n";
              $Ajax_select .= $Opt_filter;
              $Ajax_select .= "</SELECT>\r\n";
              $this->Arr_result['setValue'][] = array('field' => "id_NM_filters_save", 'value' => $Ajax_select);
              $Ajax_select = "<SELECT id=\"sel_filters_del\" class=\"scFilterToolbar_obj\" name=\"NM_filters_del\" size=\"1\">\r\n";
              $Ajax_select .= $Opt_filter;
              $Ajax_select .= "</SELECT>\r\n";
              $this->Arr_result['setValue'][] = array('field' => "id_sel_filters_del", 'value' => $Ajax_select);
              return;
          }
          $Ajax_select  = "<SELECT id=\"sel_recup_filters_bot\" name=\"NM_filters_bot\" onChange=\"nm_submit_filter(this, 'bot');\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_bot", 'value' => $Ajax_select);
          $Ajax_select = "<SELECT id=\"sel_filters_del_bot\" class=\"scFilterToolbar_obj\" name=\"NM_filters_del_bot\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_del_bot", 'value' => $Ajax_select);
      }

      if ($this->NM_ajax_opcao == "ajax_filter_delete")
      {
          ob_end_clean();
          ob_end_clean();
          $this->apaga_filtro();
          $this->NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Tipo_filter[1] = sc_convert_encoding($Tipo_filter[1], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter  = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" .  historiRJ_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . historiRJ_pack_protect_string($Tipo_filter[0]) . "\">.." . historiRJ_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
          if (isset($nmgp_save_origem) && $nmgp_save_origem == "grid")
          {
              $Ajax_select  = "<SELECT id=\"id_sel_recup_filters\" class=\"scFilterToolbar_obj\" name=\"sel_recup_filters\" onChange=\"nm_change_grid_search(this)\" size=\"1\">\r\n";
              $Ajax_select .= $Opt_filter;
              $Ajax_select .= "</SELECT>\r\n";
              $this->Arr_result['setValue'][] = array('field' => "id_NM_filters_save", 'value' => $Ajax_select);
              $Ajax_select = "<SELECT id=\"sel_filters_del\" class=\"scFilterToolbar_obj\" name=\"NM_filters_del\" size=\"1\">\r\n";
              $Ajax_select .= $Opt_filter;
              $Ajax_select .= "</SELECT>\r\n";
              $this->Arr_result['setValue'][] = array('field' => "id_sel_filters_del", 'value' => $Ajax_select);
              return;
          }
          $Ajax_select  = "<SELECT id=\"sel_recup_filters_bot\" class=\"scFilterToolbar_obj\" style=\"display:". (count($this->NM_fil_ant)>0?'':'none') .";\" name=\"NM_filters_bot\" onChange=\"nm_submit_filter(this, 'bot');\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_bot", 'value' => $Ajax_select);
          $Ajax_select = "<SELECT id=\"sel_filters_del_bot\" class=\"scFilterToolbar_obj\" name=\"NM_filters_del_bot\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_del_bot", 'value' => $Ajax_select);
      }
      if ($this->NM_ajax_opcao == "ajax_filter_select")
      {
          ob_end_clean();
          ob_end_clean();
          $this->Arr_result = $this->recupera_filtro($NM_filters);
      }

      if ($this->NM_ajax_opcao == 'autocomp_trancode')
      {
          $trancode = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_trancode($trancode);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_poli')
      {
          $poli = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_poli($poli);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_dokter')
      {
          $dokter = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_dokter($dokter);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_selesai')
      {
          $selesai = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_selesai($selesai);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_carakeluar')
      {
          $carakeluar = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_carakeluar($carakeluar);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_alasankeluar')
      {
          $alasankeluar = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_alasankeluar($alasankeluar);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_custcode')
      {
          $custcode = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_custcode($custcode);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_nostruk')
      {
          $nostruk = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_nostruk($nostruk);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_resikojatuh')
      {
          $resikojatuh = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_resikojatuh($resikojatuh);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_diagnosa1')
      {
          $diagnosa1 = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_diagnosa1($diagnosa1);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_diagnosa2')
      {
          $diagnosa2 = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_diagnosa2($diagnosa2);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_icd1')
      {
          $icd1 = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_icd1($icd1);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_icd2')
      {
          $icd2 = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_icd2($icd2);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
   }
   function lookup_ajax_trancode($trancode)
   {
      $trancode = substr($this->Db->qstr($trancode), 1, -1);
            $trancode_look = substr($this->Db->qstr($trancode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.tranCode from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  a.tranCode like '%" . $trancode . "%' order by a.tranCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_poli($poli)
   {
      $poli = substr($this->Db->qstr($poli), 1, -1);
            $poli_look = substr($this->Db->qstr($poli), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct b.poly from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  b.poly like '%" . $poli . "%' order by b.poly"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_dokter($dokter)
   {
      $dokter = substr($this->Db->qstr($dokter), 1, -1);
            $dokter_look = substr($this->Db->qstr($dokter), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.dokter from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  a.dokter like '%" . $dokter . "%' order by a.dokter"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_selesai($selesai)
   {
      $selesai = substr($this->Db->qstr($selesai), 1, -1);
            $selesai_look = substr($this->Db->qstr($selesai), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.selesai from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  a.selesai like '%" . $selesai . "%' order by a.selesai"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_carakeluar($carakeluar)
   {
      $carakeluar = substr($this->Db->qstr($carakeluar), 1, -1);
            $carakeluar_look = substr($this->Db->qstr($carakeluar), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.caraKeluar from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  a.caraKeluar like '%" . $carakeluar . "%' order by a.caraKeluar"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_alasankeluar($alasankeluar)
   {
      $alasankeluar = substr($this->Db->qstr($alasankeluar), 1, -1);
            $alasankeluar_look = substr($this->Db->qstr($alasankeluar), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.alasanKeluar from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  a.alasanKeluar like '%" . $alasankeluar . "%' order by a.alasanKeluar"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_custcode($custcode)
   {
      $custcode = substr($this->Db->qstr($custcode), 1, -1);
            $custcode_look = substr($this->Db->qstr($custcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.custCode from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  a.custCode like '%" . $custcode . "%' order by a.custCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_nostruk($nostruk)
   {
      $nostruk = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $nostruk);
      $nostruk = substr($this->Db->qstr($nostruk), 1, -1);
            $nostruk_look = substr($this->Db->qstr($nostruk), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct a.noStruk from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and   CAST (a.noStruk AS TEXT)  like '%" . $nostruk . "%' order by a.noStruk"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct a.noStruk from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and   CAST (a.noStruk AS VARCHAR)  like '%" . $nostruk . "%' order by a.noStruk"; 
      }
      else
      {
          $nm_comando = "select distinct a.noStruk from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  a.noStruk like '%" . $nostruk . "%' order by a.noStruk"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_resikojatuh($resikojatuh)
   {
      $resikojatuh = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $resikojatuh);
      $resikojatuh = substr($this->Db->qstr($resikojatuh), 1, -1);
            $resikojatuh_look = substr($this->Db->qstr($resikojatuh), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct a.resikoJatuh from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and   CAST (a.resikoJatuh AS TEXT)  like '%" . $resikojatuh . "%' order by a.resikoJatuh"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct a.resikoJatuh from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and   CAST (a.resikoJatuh AS VARCHAR)  like '%" . $resikojatuh . "%' order by a.resikoJatuh"; 
      }
      else
      {
          $nm_comando = "select distinct a.resikoJatuh from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  a.resikoJatuh like '%" . $resikojatuh . "%' order by a.resikoJatuh"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_diagnosa1($diagnosa1)
   {
      $diagnosa1 = substr($this->Db->qstr($diagnosa1), 1, -1);
            $diagnosa1_look = substr($this->Db->qstr($diagnosa1), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.diagnosa1 from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  a.diagnosa1 like '%" . $diagnosa1 . "%' order by a.diagnosa1"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_diagnosa2($diagnosa2)
   {
      $diagnosa2 = substr($this->Db->qstr($diagnosa2), 1, -1);
            $diagnosa2_look = substr($this->Db->qstr($diagnosa2), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.diagnosa2 from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  a.diagnosa2 like '%" . $diagnosa2 . "%' order by a.diagnosa2"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_icd1($icd1)
   {
      $icd1 = substr($this->Db->qstr($icd1), 1, -1);
            $icd1_look = substr($this->Db->qstr($icd1), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.icd1 from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  a.icd1 like '%" . $icd1 . "%' order by a.icd1"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_icd2($icd2)
   {
      $icd2 = substr($this->Db->qstr($icd2), 1, -1);
            $icd2_look = substr($this->Db->qstr($icd2), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.icd2 from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and  a.icd2 like '%" . $icd2 . "%' order by a.icd2"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   

   /**
    * @access  public
    */
   function processa_busca()
   {
      $this->inicializa_vars();
      $this->trata_campos();
      if ($this->NM_ajax_flag && ($this->NM_ajax_opcao == "ajax_grid_search" || $this->NM_ajax_opcao == "ajax_grid_search_change_fil"))
      {
          $this->finaliza_resultado_ajax();
          return;
      }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->monta_formulario();
      }
      else
      {
          $this->finaliza_resultado();
      }
   }

   /**
    * @access  public
    */
   function and_or()
   {
      $posWhere = strpos(strtolower($this->comando), "where");
      if (FALSE === $posWhere)
      {
         $this->comando     .= " where (";
         $this->comando_sum .= " and (";
         $this->comando_fim  = " ) ";
      }
      if ($this->comando_ini == "ini")
      {
          if (FALSE !== $posWhere)
          {
              $this->comando     .= " and ( ";
              $this->comando_sum .= " and ( ";
              $this->comando_fim  = " ) ";
          }
         $this->comando_ini  = "";
      }
      elseif ("or" == $this->NM_operador)
      {
         $this->comando        .= " or ";
         $this->comando_sum    .= " or ";
         $this->comando_filtro .= " or ";
      }
      else
      {
         $this->comando        .= " and ";
         $this->comando_sum    .= " and ";
         $this->comando_filtro .= " and ";
      }
   }

   /**
    * @access  public
    * @param  string  $nome  
    * @param  string  $condicao  
    * @param  mixed  $campo  
    * @param  mixed  $campo2  
    * @param  string  $nome_campo  
    * @param  string  $tp_campo  
    * @global  array  $nmgp_tab_label  
    */
   function monta_condicao($nome, $condicao, $campo, $campo2 = "", $nome_campo="", $tp_campo="")
   {
      global $nmgp_tab_label;
      $condicao   = strtoupper($condicao);
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $Nm_numeric = array();
      $nm_esp_postgres = array();
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_numeric[] = "a_nostruk";$Nm_numeric[] = "a_resikojatuh";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
          if ($condicao == "EP" || $condicao == "NE")
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$campo_join]);
              return;
          }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['decimal_db'] == ".")
         {
            $nm_aspas  = "";
            $nm_aspas1 = "";
         }
         if ($condicao != "IN")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['decimal_db'] == ".")
            {
               $campo  = str_replace(",", ".", $campo);
               $campo2 = str_replace(",", ".", $campo2);
            }
            if ($campo == "")
            {
               $campo = 0;
            }
            if ($campo2 == "")
            {
               $campo2 = 0;
            }
         }
      }
      $Nm_datas[] = "b.regDate";$Nm_datas[] = "b_regDate";$Nm_datas[] = "b.hta";$Nm_datas[] = "b_hta";$Nm_datas[] = "a.tglKeluar";$Nm_datas[] = "a_tglKeluar";
      if (in_array($campo_join, $Nm_datas))
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['SC_sep_date']))
          {
              $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['SC_sep_date'];
              $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['SC_sep_date1'];
          }
      }
      if ($campo == "" && $condicao != "NU" && $condicao != "NN" && $condicao != "EP" && $condicao != "NE")
      {
         return;
      }
      else
      {
         $tmp_pos = strpos($campo, "##@@");
         if ($tmp_pos === false)
         {
             $res_lookup = $campo;
         }
         else
         {
             $res_lookup = substr($campo, $tmp_pos + 4);
             $campo = substr($campo, 0, $tmp_pos);
             if ($campo == "" && $condicao != "NU" && $condicao != "NN" && $condicao != "EP" && $condicao != "NE")
             {
                 return;
             }
         }
         $tmp_pos = strpos($this->cmp_formatado[$nome_campo], "##@@");
         if ($tmp_pos !== false)
         {
             $this->cmp_formatado[$nome_campo] = substr($this->cmp_formatado[$nome_campo], $tmp_pos + 4);
         }
         $this->and_or();
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $campo2 = substr($this->Db->qstr($campo2), 1, -1);
         $nome_sum = "tbdetailrawatjalan.$nome";
         if ($tp_campo == "TIMESTAMP")
         {
             $tp_campo = "DATETIME";
         }
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "II" || $condicao == "QP" || $condicao == "NP"))
         {
             $nome     = "CAST ($nome AS TEXT)";
             $nome_sum = "CAST ($nome_sum AS TEXT)";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome     = "CAST ($nome AS TEXT)";
             $nome_sum = "CAST ($nome_sum AS TEXT)";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD hh24:mi:ss')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD hh24:mi:ss')";
             }
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD')";
             }
         }
         elseif (substr($tp_campo, 0, 4) == "TIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'hh24:mi:ss')";
                 $nome_sum = "to_char ($nome_sum, 'hh24:mi:ss')";
             }
         }
         if ($tp_campo == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "convert(char(10),$nome,121)";
                 $nome_sum = "convert(char(10),$nome_sum,121)";
             }
         }
         if ($tp_campo == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "convert(char(19),$nome,121)";
                 $nome_sum = "convert(char(19),$nome_sum,121)";
             }
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !$this->Date_part)
         {
             $nome     = "TO_DATE(TO_CHAR($nome, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $nome_sum = "TO_DATE(TO_CHAR($nome_sum, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $tp_campo = "DATETIME";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix) && !$this->Date_part)
         {
             $nome     = "EXTEND($nome, YEAR TO FRACTION)";
             $nome_sum = "EXTEND($nome_sum, YEAR TO FRACTION)";
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix) && !$this->Date_part)
         {
             $nome     = "EXTEND($nome, YEAR TO DAY)";
             $nome_sum = "EXTEND($nome_sum, YEAR TO DAY)";
         }
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && ($condicao == "II" || $condicao == "QP" || $condicao == "NP"))
         {
             $nome     = "CAST ($nome AS VARCHAR(255))";
             $nome_sum = "CAST ($nome_sum AS VARCHAR(255))";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD hh24:mi:ss')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD hh24:mi:ss')";
             }
         }
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD')";
             }
         }
         switch ($condicao)
         {
            case "EQ":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower. " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo];
            break;
            case "II":     // 
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
               {
                   $op_all       = " ilike ";
                   $nm_ini_lower = "";
                   $nm_fim_lower = "";
               }
               else
               {
                   $op_all = " like ";
               }
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . $op_all . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo];
            break;
             case "QP";     // 
             case "NP";     // 
                $concat = " " . $this->NM_operador . " ";
                if ($condicao == "QP")
                {
                    $op_all    = " #sc_like_# ";
                    $lang_like = $this->Ini->Nm_lang['lang_srch_like'];
                }
                else
                {
                    $op_all    = " not #sc_like_# ";
                    $lang_like = $this->Ini->Nm_lang['lang_srch_not_like'];
                }
               $NM_cond    = "";
               $NM_cmd     = "";
               $NM_cmd_sum = "";
               if (substr($tp_campo, 0, 4) == "DATE" && $this->Date_part)
               {
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_year'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['ano'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%Y', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%Y', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(year from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(year from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('year' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('year' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(year from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(year from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'YYYY')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'YYYY')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(year, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(year, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "year (" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "year (" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "year(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "year(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['mes'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%m', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%m', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(month from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(month from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('month' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('month' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(month from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(month from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'MM')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'MM')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(month, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(month, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "month (" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "month (" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "month(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "month(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['dia'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%d', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%d', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(day from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(day from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('day' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('day' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(day from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(day from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'DD')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'DD')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(day, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(day, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "DAYOFMONTH(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "DAYOFMONTH(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "day(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "day(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                   }
               }
               if (strpos($tp_campo, "TIME") !== false && $this->Date_part)
               {
                   if ($this->NM_data_qp['hor'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_time'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['hor'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%H', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%H', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(hour from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(hour from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('hour' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('hour' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(hour from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(hour from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'HH24')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'HH24')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(hour, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(hour, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "hour(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "hour(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "hour(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "hour(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['min'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mint'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['min'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%M', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%M', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(minute from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(minute from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('minute' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('minute' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(minute from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(minute from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'MI')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'MI')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(minute, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(minute, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "minute(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "minute(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "minute(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "minute(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['seg'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_scnd'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['seg'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%S', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%S', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(second from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(second from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('second' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('second' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(second from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(second from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'SS')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'SS')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(second, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(second, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "second(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "second(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "second(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "second(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                   }
               }
               if ($this->Date_part)
               {
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $NM_cmd_sum = " (" . $NM_cmd_sum . ")";
                       $this->comando        .= $NM_cmd;
                       $this->comando_sum    .= $NM_cmd_sum;
                       $this->comando_filtro .= $NM_cmd;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . ": " . $NM_cond . "##*@@";
                       $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
                       $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $NM_cond;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $NM_cond;
                   }
               }
               else
               {
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
                   {
                       $op_all       = str_replace("#sc_like_#", "ilike", $op_all);
                       $nm_ini_lower = "";
                       $nm_fim_lower = "";
                   }
                   else
                   {
                       $op_all = str_replace("#sc_like_#", "like", $op_all);
                   }
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . $op_all . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
                   $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $lang_like . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
                   $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
                   $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $lang_like . " " . $this->cmp_formatado[$nome_campo];
                   $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $lang_like . " " . $this->cmp_formatado[$nome_campo];
               }
            break;
            case "DF":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo];
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo];
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo];
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo];
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo];
            break;
            case "BW":     // 
               $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"];
            break;
            case "IN":     // 
               $nm_sc_valores = explode(",", $campo);
               $cond_str  = "";
               $nm_cond   = "";
               $cond_descr  = "";
               $count_descr = 0;
               $end_descr   = false;
               $lim_descr   = 15;
               $lang_descr  = strlen($this->Ini->Nm_lang['lang_srch_orr_cond']);
               if (!empty($nm_sc_valores))
               {
                   foreach ($nm_sc_valores as $nm_sc_valor)
                   {
                      if (in_array($campo_join, $Nm_numeric) && substr_count($nm_sc_valor, ".") > 1)
                      {
                         $nm_sc_valor = str_replace(".", "", $nm_sc_valor);
                      }
                      if ("" != $cond_str)
                      {
                         $cond_str .= ",";
                         $nm_cond  .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
                      }
                      $cond_str .= $nm_ini_lower . $nm_aspas . $nm_sc_valor . $nm_aspas1 . $nm_fim_lower;
                      $nm_cond  .= $nm_aspas . $nm_sc_valor . $nm_aspas1;
                      if (((strlen($cond_descr) + strlen($nm_sc_valor) + $lang_descr) < $lim_descr) || empty($cond_descr))
                      {
                          $cond_descr .= (empty($cond_descr)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
                          $cond_descr .= $nm_aspas . $nm_sc_valor . $nm_aspas1;
                          $count_descr++;
                      }
                      elseif (!$end_descr)
                      {
                          $cond_descr .= " +" . (count($nm_sc_valores) - $count_descr);
                          $end_descr = true;
                      };
                   }
               }
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $cond_descr;
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond;
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_null'];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_null'];
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_nnul'];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_nnul'];
            break;
            case "EP":     // 
               $this->comando        .= " $nome = '' ";
               $this->comando_sum    .= " $nome_sum = '' ";
               $this->comando_filtro .= " $nome = '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_empty'] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_empty'];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_empty'];
            break;
            case "NE":     // 
               $this->comando        .= " $nome <> '' ";
               $this->comando_sum    .= " $nome_sum <> '' ";
               $this->comando_filtro .= " $nome <> '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nempty'] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_nempty'];
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_nempty'];
            break;
         }
      }
   }

   function nm_prep_date(&$val, $tp, $tsql, &$cond, $format_nd, $tp_nd)
   {
       $fill_dt = false;
       if ($tsql == "TIMESTAMP")
       {
           $tsql = "DATETIME";
       }
       $cond = strtoupper($cond);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && $tp != "ND")
       {
           if ($cond == "EP")
           {
               $cond = "NU";
           }
           if ($cond == "NE")
           {
               $cond = "NN";
           }
       }
       if ($cond == "NU" || $cond == "NN" || $cond == "EP" || $cond == "NE")
       {
           $val    = array();
           $val[0] = "";
           return;
       }
       if ($cond != "II" && $cond != "QP" && $cond != "NP")
       {
           $fill_dt = true;
       }
       if ($fill_dt)
       {
           $val[0]['dia'] = (!empty($val[0]['dia']) && strlen($val[0]['dia']) == 1) ? "0" . $val[0]['dia'] : $val[0]['dia'];
           $val[0]['mes'] = (!empty($val[0]['mes']) && strlen($val[0]['mes']) == 1) ? "0" . $val[0]['mes'] : $val[0]['mes'];
           if ($tp == "DH")
           {
               $val[0]['hor'] = (!empty($val[0]['hor']) && strlen($val[0]['hor']) == 1) ? "0" . $val[0]['hor'] : $val[0]['hor'];
               $val[0]['min'] = (!empty($val[0]['min']) && strlen($val[0]['min']) == 1) ? "0" . $val[0]['min'] : $val[0]['min'];
               $val[0]['seg'] = (!empty($val[0]['seg']) && strlen($val[0]['seg']) == 1) ? "0" . $val[0]['seg'] : $val[0]['seg'];
           }
           if ($cond == "BW")
           {
               $val[1]['dia'] = (!empty($val[1]['dia']) && strlen($val[1]['dia']) == 1) ? "0" . $val[1]['dia'] : $val[1]['dia'];
               $val[1]['mes'] = (!empty($val[1]['mes']) && strlen($val[1]['mes']) == 1) ? "0" . $val[1]['mes'] : $val[1]['mes'];
               if ($tp == "DH")
               {
                   $val[1]['hor'] = (!empty($val[1]['hor']) && strlen($val[1]['hor']) == 1) ? "0" . $val[1]['hor'] : $val[1]['hor'];
                   $val[1]['min'] = (!empty($val[1]['min']) && strlen($val[1]['min']) == 1) ? "0" . $val[1]['min'] : $val[1]['min'];
                   $val[1]['seg'] = (!empty($val[1]['seg']) && strlen($val[1]['seg']) == 1) ? "0" . $val[1]['seg'] : $val[1]['seg'];
               }
           }
       }
       if ($cond == "BW")
       {
           $this->NM_data_1 = array();
           $this->NM_data_1['ano'] = (isset($val[0]['ano']) && !empty($val[0]['ano'])) ? $val[0]['ano'] : "____";
           $this->NM_data_1['mes'] = (isset($val[0]['mes']) && !empty($val[0]['mes'])) ? $val[0]['mes'] : "__";
           $this->NM_data_1['dia'] = (isset($val[0]['dia']) && !empty($val[0]['dia'])) ? $val[0]['dia'] : "__";
           $this->NM_data_1['hor'] = (isset($val[0]['hor']) && !empty($val[0]['hor'])) ? $val[0]['hor'] : "__";
           $this->NM_data_1['min'] = (isset($val[0]['min']) && !empty($val[0]['min'])) ? $val[0]['min'] : "__";
           $this->NM_data_1['seg'] = (isset($val[0]['seg']) && !empty($val[0]['seg'])) ? $val[0]['seg'] : "__";
           $this->data_menor($this->NM_data_1);
           $this->NM_data_2 = array();
           $this->NM_data_2['ano'] = (isset($val[1]['ano']) && !empty($val[1]['ano'])) ? $val[1]['ano'] : "____";
           $this->NM_data_2['mes'] = (isset($val[1]['mes']) && !empty($val[1]['mes'])) ? $val[1]['mes'] : "__";
           $this->NM_data_2['dia'] = (isset($val[1]['dia']) && !empty($val[1]['dia'])) ? $val[1]['dia'] : "__";
           $this->NM_data_2['hor'] = (isset($val[1]['hor']) && !empty($val[1]['hor'])) ? $val[1]['hor'] : "__";
           $this->NM_data_2['min'] = (isset($val[1]['min']) && !empty($val[1]['min'])) ? $val[1]['min'] : "__";
           $this->NM_data_2['seg'] = (isset($val[1]['seg']) && !empty($val[1]['seg'])) ? $val[1]['seg'] : "__";
           $this->data_maior($this->NM_data_2);
           $val = array();
           if ($tp == "ND")
           {
               $out_dt1 = $format_nd;
               $out_dt1 = str_replace("yyyy", $this->NM_data_1['ano'], $out_dt1);
               $out_dt1 = str_replace("mm",   $this->NM_data_1['mes'], $out_dt1);
               $out_dt1 = str_replace("dd",   $this->NM_data_1['dia'], $out_dt1);
               $out_dt1 = str_replace("hh",   "", $out_dt1);
               $out_dt1 = str_replace("ii",   "", $out_dt1);
               $out_dt1 = str_replace("ss",   "", $out_dt1);
               $out_dt2 = $format_nd;
               $out_dt2 = str_replace("yyyy", $this->NM_data_2['ano'], $out_dt2);
               $out_dt2 = str_replace("mm",   $this->NM_data_2['mes'], $out_dt2);
               $out_dt2 = str_replace("dd",   $this->NM_data_2['dia'], $out_dt2);
               $out_dt2 = str_replace("hh",   "", $out_dt2);
               $out_dt2 = str_replace("ii",   "", $out_dt2);
               $out_dt2 = str_replace("ss",   "", $out_dt2);
               $val[0] = $out_dt1;
               $val[1] = $out_dt2;
               return;
           }
           if ($tsql == "TIME")
           {
               $val[0] = $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
               $val[1] = $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
           }
           elseif (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] = $this->NM_data_1['ano'] . "-" . $this->NM_data_1['mes'] . "-" . $this->NM_data_1['dia'];
               $val[1] = $this->NM_data_2['ano'] . "-" . $this->NM_data_2['mes'] . "-" . $this->NM_data_2['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " " . $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
                   $val[1] .= " " . $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
               }
           }
           return;
       }
       $this->NM_data_qp = array();
       $this->NM_data_qp['ano'] = (isset($val[0]['ano']) && $val[0]['ano'] != "") ? $val[0]['ano'] : "____";
       $this->NM_data_qp['mes'] = (isset($val[0]['mes']) && $val[0]['mes'] != "") ? $val[0]['mes'] : "__";
       $this->NM_data_qp['dia'] = (isset($val[0]['dia']) && $val[0]['dia'] != "") ? $val[0]['dia'] : "__";
       $this->NM_data_qp['hor'] = (isset($val[0]['hor']) && $val[0]['hor'] != "") ? $val[0]['hor'] : "__";
       $this->NM_data_qp['min'] = (isset($val[0]['min']) && $val[0]['min'] != "") ? $val[0]['min'] : "__";
       $this->NM_data_qp['seg'] = (isset($val[0]['seg']) && $val[0]['seg'] != "") ? $val[0]['seg'] : "__";
       if ($tp != "ND" && ($cond == "LE" || $cond == "LT" || $cond == "GE" || $cond == "GT"))
       {
           $count_fill = 0;
           foreach ($this->NM_data_qp as $x => $tx)
           {
               if (substr($tx, 0, 2) != "__")
               {
                   $count_fill++;
               }
           }
           if ($count_fill > 1)
           {
               if ($cond == "LE" || $cond == "GT")
               {
                   $this->data_maior($this->NM_data_qp);
               }
               else
               {
                   $this->data_menor($this->NM_data_qp);
               }
               if ($tsql == "TIME")
               {
                   $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
               }
               elseif (substr($tsql, 0, 4) == "DATE")
               {
                   $val[0] = $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
                   if (strpos($tsql, "TIME") !== false)
                   {
                       $val[0] .= " " . $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
                   }
               }
               return;
           }
       }
       foreach ($this->NM_data_qp as $x => $tx)
       {
           if (substr($tx, 0, 2) == "__" && ($x == "dia" || $x == "mes" || $x == "ano"))
           {
               if (substr($tsql, 0, 4) == "DATE")
               {
                   $this->Date_part = true;
                   break;
               }
           }
           if (substr($tx, 0, 2) == "__" && ($x == "hor" || $x == "min" || $x == "seg"))
           {
               if (strpos($tsql, "TIME") !== false && ($tp == "DH" || ($tp == "DT" && $cond != "LE" && $cond != "LT" && $cond != "GE" && $cond != "GT")))
               {
                   $this->Date_part = true;
                   break;
               }
           }
       }
       if ($this->Date_part)
       {
           $this->Ini_date_part = "";
           $this->End_date_part = "";
           $this->Ini_date_char = "";
           $this->End_date_char = "";
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
           {
               $this->Ini_date_part = "'";
               $this->End_date_part = "'";
           }
           if ($tp != "ND")
           {
               if ($cond == "EQ")
               {
                   $this->Operador_date_part = " = ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
               }
               elseif ($cond == "II")
               {
                   $this->Operador_date_part = " like ";
                   $this->Ini_date_part = "'";
                   $this->End_date_part = "%'";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_strt'];
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
               elseif ($cond == "DF")
               {
                   $this->Operador_date_part = " <> ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
               }
               elseif ($cond == "GT")
               {
                   $this->Operador_date_part = " > ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['pesq_cond_maior'];
               }
               elseif ($cond == "GE")
               {
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_grtr_equl'];
                   $this->Operador_date_part = " >= ";
               }
               elseif ($cond == "LT")
               {
                   $this->Operador_date_part = " < ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less'];
               }
               elseif ($cond == "LE")
               {
                   $this->Operador_date_part = " <= ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less_equl'];
               }
               elseif ($cond == "NP")
               {
                   $this->Operador_date_part = " not like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
               else
               {
                   $this->Operador_date_part = " like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
           }
           if ($cond == "DF")
           {
               $cond = "NP";
           }
           if ($cond != "NP")
           {
               $cond = "QP";
           }
       }
       $val = array();
       if ($tp != "ND" && ($cond == "QP" || $cond == "NP"))
       {
           $val[0] = "";
           if (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " ";
               }
           }
           if (strpos($tsql, "TIME") !== false)
           {
               $val[0] .= $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           }
           return;
       }
       if ($cond == "II" || $cond == "DF" || $cond == "EQ" || $cond == "LT" || $cond == "GE")
       {
           $this->data_menor($this->NM_data_qp);
       }
       else
       {
           $this->data_maior($this->NM_data_qp);
       }
       if ($tsql == "TIME")
       {
           $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           return;
       }
       $format_sql = "";
       if (substr($tsql, 0, 4) == "DATE")
       {
           $format_sql .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
           if (strpos($tsql, "TIME") !== false)
           {
               $format_sql .= " ";
           }
       }
       if (strpos($tsql, "TIME") !== false)
       {
           $format_sql .=  $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
       }
       if ($tp != "ND")
       {
           $val[0] = $format_sql;
           return;
       }
       if ($tp == "ND")
       {
           $format_nd = str_replace("yyyy", $this->NM_data_qp['ano'], $format_nd);
           $format_nd = str_replace("mm",   $this->NM_data_qp['mes'], $format_nd);
           $format_nd = str_replace("dd",   $this->NM_data_qp['dia'], $format_nd);
           $format_nd = str_replace("hh",   $this->NM_data_qp['hor'], $format_nd);
           $format_nd = str_replace("ii",   $this->NM_data_qp['min'], $format_nd);
           $format_nd = str_replace("ss",   $this->NM_data_qp['seg'], $format_nd);
           $val[0] = $format_nd;
           return;
       }
   }
   function data_menor(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "0001" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "01" : $data_arr["mes"];
       $data_arr["dia"] = ("__" == $data_arr["dia"])   ? "01" : $data_arr["dia"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "00" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "00" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "00" : $data_arr["seg"];
   }

   function data_maior(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "9999" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "12" : $data_arr["mes"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "23" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "59" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "59" : $data_arr["seg"];
       if ("__" == $data_arr["dia"])
       {
           $data_arr["dia"] = "31";
           if ($data_arr["mes"] == "04" || $data_arr["mes"] == "06" || $data_arr["mes"] == "09" || $data_arr["mes"] == "11")
           {
               $data_arr["dia"] = 30;
           }
           elseif ($data_arr["mes"] == "02")
           { 
                if  ($data_arr["ano"] % 4 == 0)
                {
                     $data_arr["dia"] = 29;
                }
                else 
                {
                     $data_arr["dia"] = 28;
                }
           }
       }
   }

   /**
    * @access  public
    * @param  string  $nm_data_hora  
    */
   function limpa_dt_hor_pesq(&$nm_data_hora)
   {
      $nm_data_hora = str_replace("Y", "", $nm_data_hora); 
      $nm_data_hora = str_replace("M", "", $nm_data_hora); 
      $nm_data_hora = str_replace("D", "", $nm_data_hora); 
      $nm_data_hora = str_replace("H", "", $nm_data_hora); 
      $nm_data_hora = str_replace("I", "", $nm_data_hora); 
      $nm_data_hora = str_replace("S", "", $nm_data_hora); 
      $tmp_pos = strpos($nm_data_hora, "--");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("--", "-", $nm_data_hora); 
      }
      $tmp_pos = strpos($nm_data_hora, "::");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("::", ":", $nm_data_hora); 
      }
   }

   /**
    * @access  public
    */
   function retorna_pesq()
   {
      global $nm_apl_dependente;
   $NM_retorno = "./";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML>
<HEAD>
 <TITLE>Pencarian Histori Medis</TITLE>
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
<BODY class="scGridPage">
<FORM style="display:none;" name="form_ok" method="POST" action="<?php echo $NM_retorno; ?>" target="_self">
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="pesq"> 
</FORM>
<SCRIPT type="text/javascript">
 document.form_ok.submit();
</SCRIPT>
</BODY>
</HTML>
<?php
}

   /**
    * @access  public
    */
   function monta_html_ini()
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Pencarian Histori Medis</TITLE>
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
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/scInput.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput2.js"></script>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Str_btn_filter_css ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_form.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>historiRJ/historiRJ_fil_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
</HEAD>
<BODY class="scFilterPage">
<?php echo $this->Ini->Ajax_result_set ?>
<SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_js . "/browserSniffer.js" ?>"></SCRIPT>
   <script type="text/javascript">
     var applicationKeys = '';
     var hotkeyList = '';
     function execHotKey(e, h) {
         var hotkey_fired = false
         switch (true) {
         }
         if (hotkey_fired) {
             e.preventDefault();
             return false;
         } else {
             return true;
         }
     }
   </script>
   <script type="text/javascript" src="../_lib/lib/js/hotkeys.inc.js"></script>
   <script type="text/javascript" src="../_lib/lib/js/hotkeys_setup.js"></script>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
        </script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
 <script type="text/javascript" src="historiRJ_ajax_search.js"></script>
 <script type="text/javascript" src="historiRJ_ajax.js"></script>
 <script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
   var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax ?>';
   var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax ?>';
   var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax ?>';
   var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax ?>';
 </script>
<?php
$Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo $Cod_Btn ?>&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script type="text/javascript" src="historiRJ_message.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_sweetalert.css" />
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['historiRJ']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['historiRJ']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<?php
$confirmButtonClass = '';
$cancelButtonClass  = '';
$confirmButtonText  = $this->Ini->Nm_lang['lang_btns_cfrm'];
$cancelButtonText   = $this->Ini->Nm_lang['lang_btns_cncl'];
$confirmButtonFA    = '';
$cancelButtonFA     = '';
$confirmButtonFAPos = '';
$cancelButtonFAPos  = '';
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
    $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
    $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['value']) && '' != $this->arr_buttons['bsweetalert_ok']['value']) {
    $confirmButtonText = $this->arr_buttons['bsweetalert_ok']['value'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['value']) && '' != $this->arr_buttons['bsweetalert_cancel']['value']) {
    $cancelButtonText = $this->arr_buttons['bsweetalert_cancel']['value'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
    $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
    $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
    $confirmButtonFAPos = 'text_right';
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
    $cancelButtonFAPos = 'text_right';
}
?>
<script type="text/javascript">
  var scSweetAlertConfirmButton = "<?php echo $confirmButtonClass ?>";
  var scSweetAlertCancelButton = "<?php echo $cancelButtonClass ?>";
  var scSweetAlertConfirmButtonText = "<?php echo $confirmButtonText ?>";
  var scSweetAlertCancelButtonText = "<?php echo $cancelButtonText ?>";
  var scSweetAlertConfirmButtonFA = "<?php echo $confirmButtonFA ?>";
  var scSweetAlertCancelButtonFA = "<?php echo $cancelButtonFA ?>";
  var scSweetAlertConfirmButtonFAPos = "<?php echo $confirmButtonFAPos ?>";
  var scSweetAlertCancelButtonFAPos = "<?php echo $cancelButtonFAPos ?>";
</script>
<script type="text/javascript">
$(function() {
<?php
if (count($this->nm_mens_alert) || count($this->Ini->nm_mens_alert)) {
   if (isset($this->Ini->nm_mens_alert) && !empty($this->Ini->nm_mens_alert))
   {
       if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
       {
           $this->nm_mens_alert   = array_merge($this->Ini->nm_mens_alert, $this->nm_mens_alert);
           $this->nm_params_alert = array_merge($this->Ini->nm_params_alert, $this->nm_params_alert);
       }
       else
       {
           $this->nm_mens_alert   = $this->Ini->nm_mens_alert;
           $this->nm_params_alert = $this->Ini->nm_params_alert;
       }
   }
   if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
   {
       foreach ($this->nm_mens_alert as $i_alert => $mensagem)
       {
           $alertParams = array();
           if (isset($this->nm_params_alert[$i_alert]))
           {
               foreach ($this->nm_params_alert[$i_alert] as $paramName => $paramValue)
               {
                   if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('background' == $paramName)
                   {
                       $image_param = $paramValue;
                       preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $paramValue, $matches, PREG_PATTERN_ORDER);
                       if (isset($matches[3])) {
                           foreach ($matches[3] as $match) {
                               if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                                   $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                               }
                           }
                       }
                       $paramValue = $image_param;
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
               }
           }
           $jsonParams = json_encode($alertParams);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['ajax_nav'])
           { 
               $this->Ini->Arr_result['AlertJS'][] = NM_charset_to_utf8($mensagem);
               $this->Ini->Arr_result['AlertJSParam'][] = $alertParams;
           } 
           else 
           { 
?>
       scJs_alert('<?php echo $mensagem ?>', <?php echo $jsonParams ?>);
<?php
           } 
       }
   }
}
?>
});
</script>
<?php
if ('' != $this->Campos_Mens_erro) {
?>
<script type="text/javascript">
$(function() {
	_nmAjaxShowMessage({title: "<?php echo $this->Ini->Nm_lang['lang_errm_errt']; ?>", message: "<?php echo $this->Campos_Mens_erro ?>", isModal: false, timeout: "", showButton: true, buttonLabel: "", topPos: "", leftPos: "", width: "", height: "", redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: false, isToast: false, toastPos: "", type: "error"});
});
</script>
<?php
}
?>
<script type="text/javascript" src="historiRJ_message.js"></script>
 <SCRIPT type="text/javascript">

<?php
if (is_file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js"))
{
    $Tb_err_js = file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js");
    foreach ($Tb_err_js as $Lines)
    {
        if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
        {
            $Lines = sc_convert_encoding($Lines, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        echo $Lines;
    }
}
 if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
 {
    $Msg_Inval = sc_convert_encoding("Inv�lido", $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
var SC_crit_inv = "<?php echo $Msg_Inval ?>";
var nmdg_Form = "F1";

 $(function() {

   SC_carga_evt_jquery();
   scLoadScInput('input:text.sc-js-input');
 });
 function nm_campos_between(nm_campo, nm_cond, nm_nome_obj)
 {
  if (nm_cond.value == "bw")
  {
   nm_campo.style.display = "";
  }
  else
  {
    if (nm_campo)
    {
      nm_campo.style.display = "none";
    }
  }
  if (document.getElementById('id_hide_' + nm_nome_obj))
  {
      if (nm_cond.value == "nu" || nm_cond.value == "nn" || nm_cond.value == "ep" || nm_cond.value == "ne")
      {
          document.getElementById('id_hide_' + nm_nome_obj).style.display = 'none';
      }
      else
      {
          document.getElementById('id_hide_' + nm_nome_obj).style.display = '';
      }
  }
 }
 function nm_save_form(pos)
 {
  if (pos == 'top' && document.F1.nmgp_save_name_top.value == '')
  {
      return;
  }
  if (pos == 'bot' && document.F1.nmgp_save_name_bot.value == '')
  {
      return;
  }
  if (pos == 'fields' && document.F1.nmgp_save_name_fields.value == '')
  {
      return;
  }
  var str_out = "";
  str_out += 'SC_tglmasuk_cond#NMF#' + search_get_sel_txt('SC_tglmasuk_cond') + '@NMF@';
  str_out += 'SC_tglmasuk_dia#NMF#' + search_get_sel_txt('SC_tglmasuk_dia') + '@NMF@';
  str_out += 'SC_tglmasuk_mes#NMF#' + search_get_sel_txt('SC_tglmasuk_mes') + '@NMF@';
  str_out += 'SC_tglmasuk_ano#NMF#' + search_get_sel_txt('SC_tglmasuk_ano') + '@NMF@';
  str_out += 'SC_tglmasuk_input_2_dia#NMF#' + search_get_sel_txt('SC_tglmasuk_input_2_dia') + '@NMF@';
  str_out += 'SC_tglmasuk_input_2_mes#NMF#' + search_get_sel_txt('SC_tglmasuk_input_2_mes') + '@NMF@';
  str_out += 'SC_tglmasuk_input_2_ano#NMF#' + search_get_sel_txt('SC_tglmasuk_input_2_ano') + '@NMF@';
  str_out += 'SC_tglmasuk_hor#NMF#' + search_get_sel_txt('SC_tglmasuk_hor') + '@NMF@';
  str_out += 'SC_tglmasuk_min#NMF#' + search_get_sel_txt('SC_tglmasuk_min') + '@NMF@';
  str_out += 'SC_tglmasuk_seg#NMF#' + search_get_sel_txt('SC_tglmasuk_seg') + '@NMF@';
  str_out += 'SC_tglmasuk_input_2_hor#NMF#' + search_get_sel_txt('SC_tglmasuk_input_2_hor') + '@NMF@';
  str_out += 'SC_tglmasuk_input_2_min#NMF#' + search_get_sel_txt('SC_tglmasuk_input_2_min') + '@NMF@';
  str_out += 'SC_tglmasuk_input_2_seg#NMF#' + search_get_sel_txt('SC_tglmasuk_input_2_seg') + '@NMF@';
  str_out += 'SC_trancode_cond#NMF#' + search_get_sel_txt('SC_trancode_cond') + '@NMF@';
  str_out += 'SC_trancode#NMF#' + search_get_text('SC_trancode') + '@NMF@';
  str_out += 'id_ac_trancode#NMF#' + search_get_text('id_ac_trancode') + '@NMF@';
  str_out += 'SC_poli_cond#NMF#' + search_get_sel_txt('SC_poli_cond') + '@NMF@';
  str_out += 'SC_poli#NMF#' + search_get_text('SC_poli') + '@NMF@';
  str_out += 'id_ac_poli#NMF#' + search_get_text('id_ac_poli') + '@NMF@';
  str_out += 'SC_dokter_cond#NMF#' + search_get_sel_txt('SC_dokter_cond') + '@NMF@';
  str_out += 'SC_dokter#NMF#' + search_get_text('SC_dokter') + '@NMF@';
  str_out += 'id_ac_dokter#NMF#' + search_get_text('id_ac_dokter') + '@NMF@';
  str_out += 'SC_selesai_cond#NMF#' + search_get_sel_txt('SC_selesai_cond') + '@NMF@';
  str_out += 'SC_selesai#NMF#' + search_get_text('SC_selesai') + '@NMF@';
  str_out += 'id_ac_selesai#NMF#' + search_get_text('id_ac_selesai') + '@NMF@';
  str_out += 'SC_hta_cond#NMF#' + search_get_sel_txt('SC_hta_cond') + '@NMF@';
  str_out += 'SC_hta_dia#NMF#' + search_get_sel_txt('SC_hta_dia') + '@NMF@';
  str_out += 'SC_hta_mes#NMF#' + search_get_sel_txt('SC_hta_mes') + '@NMF@';
  str_out += 'SC_hta_ano#NMF#' + search_get_sel_txt('SC_hta_ano') + '@NMF@';
  str_out += 'SC_hta_input_2_dia#NMF#' + search_get_sel_txt('SC_hta_input_2_dia') + '@NMF@';
  str_out += 'SC_hta_input_2_mes#NMF#' + search_get_sel_txt('SC_hta_input_2_mes') + '@NMF@';
  str_out += 'SC_hta_input_2_ano#NMF#' + search_get_sel_txt('SC_hta_input_2_ano') + '@NMF@';
  str_out += 'SC_hta_hor#NMF#' + search_get_sel_txt('SC_hta_hor') + '@NMF@';
  str_out += 'SC_hta_min#NMF#' + search_get_sel_txt('SC_hta_min') + '@NMF@';
  str_out += 'SC_hta_seg#NMF#' + search_get_sel_txt('SC_hta_seg') + '@NMF@';
  str_out += 'SC_hta_input_2_hor#NMF#' + search_get_sel_txt('SC_hta_input_2_hor') + '@NMF@';
  str_out += 'SC_hta_input_2_min#NMF#' + search_get_sel_txt('SC_hta_input_2_min') + '@NMF@';
  str_out += 'SC_hta_input_2_seg#NMF#' + search_get_sel_txt('SC_hta_input_2_seg') + '@NMF@';
  str_out += 'SC_tglkeluar_cond#NMF#' + search_get_sel_txt('SC_tglkeluar_cond') + '@NMF@';
  str_out += 'SC_tglkeluar_dia#NMF#' + search_get_sel_txt('SC_tglkeluar_dia') + '@NMF@';
  str_out += 'SC_tglkeluar_mes#NMF#' + search_get_sel_txt('SC_tglkeluar_mes') + '@NMF@';
  str_out += 'SC_tglkeluar_ano#NMF#' + search_get_sel_txt('SC_tglkeluar_ano') + '@NMF@';
  str_out += 'SC_tglkeluar_input_2_dia#NMF#' + search_get_sel_txt('SC_tglkeluar_input_2_dia') + '@NMF@';
  str_out += 'SC_tglkeluar_input_2_mes#NMF#' + search_get_sel_txt('SC_tglkeluar_input_2_mes') + '@NMF@';
  str_out += 'SC_tglkeluar_input_2_ano#NMF#' + search_get_sel_txt('SC_tglkeluar_input_2_ano') + '@NMF@';
  str_out += 'SC_tglkeluar_hor#NMF#' + search_get_sel_txt('SC_tglkeluar_hor') + '@NMF@';
  str_out += 'SC_tglkeluar_min#NMF#' + search_get_sel_txt('SC_tglkeluar_min') + '@NMF@';
  str_out += 'SC_tglkeluar_seg#NMF#' + search_get_sel_txt('SC_tglkeluar_seg') + '@NMF@';
  str_out += 'SC_tglkeluar_input_2_hor#NMF#' + search_get_sel_txt('SC_tglkeluar_input_2_hor') + '@NMF@';
  str_out += 'SC_tglkeluar_input_2_min#NMF#' + search_get_sel_txt('SC_tglkeluar_input_2_min') + '@NMF@';
  str_out += 'SC_tglkeluar_input_2_seg#NMF#' + search_get_sel_txt('SC_tglkeluar_input_2_seg') + '@NMF@';
  str_out += 'SC_carakeluar_cond#NMF#' + search_get_sel_txt('SC_carakeluar_cond') + '@NMF@';
  str_out += 'SC_carakeluar#NMF#' + search_get_text('SC_carakeluar') + '@NMF@';
  str_out += 'id_ac_carakeluar#NMF#' + search_get_text('id_ac_carakeluar') + '@NMF@';
  str_out += 'SC_alasankeluar_cond#NMF#' + search_get_sel_txt('SC_alasankeluar_cond') + '@NMF@';
  str_out += 'SC_alasankeluar#NMF#' + search_get_text('SC_alasankeluar') + '@NMF@';
  str_out += 'id_ac_alasankeluar#NMF#' + search_get_text('id_ac_alasankeluar') + '@NMF@';
  str_out += 'SC_custcode_cond#NMF#' + search_get_sel_txt('SC_custcode_cond') + '@NMF@';
  str_out += 'SC_custcode#NMF#' + search_get_text('SC_custcode') + '@NMF@';
  str_out += 'id_ac_custcode#NMF#' + search_get_text('id_ac_custcode') + '@NMF@';
  str_out += 'SC_nostruk_cond#NMF#' + search_get_sel_txt('SC_nostruk_cond') + '@NMF@';
  str_out += 'SC_nostruk#NMF#' + search_get_text('SC_nostruk') + '@NMF@';
  str_out += 'id_ac_nostruk#NMF#' + search_get_text('id_ac_nostruk') + '@NMF@';
  str_out += 'SC_resikojatuh_cond#NMF#' + search_get_sel_txt('SC_resikojatuh_cond') + '@NMF@';
  str_out += 'SC_resikojatuh#NMF#' + search_get_text('SC_resikojatuh') + '@NMF@';
  str_out += 'id_ac_resikojatuh#NMF#' + search_get_text('id_ac_resikojatuh') + '@NMF@';
  str_out += 'SC_diagnosa1_cond#NMF#' + search_get_sel_txt('SC_diagnosa1_cond') + '@NMF@';
  str_out += 'SC_diagnosa1#NMF#' + search_get_text('SC_diagnosa1') + '@NMF@';
  str_out += 'id_ac_diagnosa1#NMF#' + search_get_text('id_ac_diagnosa1') + '@NMF@';
  str_out += 'SC_diagnosa2_cond#NMF#' + search_get_sel_txt('SC_diagnosa2_cond') + '@NMF@';
  str_out += 'SC_diagnosa2#NMF#' + search_get_text('SC_diagnosa2') + '@NMF@';
  str_out += 'id_ac_diagnosa2#NMF#' + search_get_text('id_ac_diagnosa2') + '@NMF@';
  str_out += 'SC_icd1_cond#NMF#' + search_get_sel_txt('SC_icd1_cond') + '@NMF@';
  str_out += 'SC_icd1#NMF#' + search_get_text('SC_icd1') + '@NMF@';
  str_out += 'id_ac_icd1#NMF#' + search_get_text('id_ac_icd1') + '@NMF@';
  str_out += 'SC_icd2_cond#NMF#' + search_get_sel_txt('SC_icd2_cond') + '@NMF@';
  str_out += 'SC_icd2#NMF#' + search_get_text('SC_icd2') + '@NMF@';
  str_out += 'id_ac_icd2#NMF#' + search_get_text('id_ac_icd2') + '@NMF@';
  str_out += 'SC_NM_operador#NMF#' + search_get_text('SC_NM_operador');
  str_out  = str_out.replace(/[+]/g, "__NM_PLUS__");
  str_out  = str_out.replace(/[&]/g, "__NM_AMP__");
  str_out  = str_out.replace(/[%]/g, "__NM_PRC__");
  var save_name = search_get_text('SC_nmgp_save_name_' + pos);
  var save_opt  = search_get_sel_txt('SC_nmgp_save_option_' + pos);
  ajax_save_filter(save_name, save_opt, str_out, pos);
 }
 function nm_submit_filter(obj_sel, pos)
 {
  index = obj_sel.selectedIndex;
  if (index == -1 || obj_sel.options[index].value == "") 
  {
      return false;
  }
  ajax_select_filter(obj_sel.options[index].value);
 }
 function nm_submit_filter_del(pos)
 {
  obj_sel = document.F1.elements['NM_filters_del_' + pos];
  index   = obj_sel.selectedIndex;
  if (index == -1 || obj_sel.options[index].value == "") 
  {
      return false;
  }
  parm = obj_sel.options[index].value;
  ajax_delete_filter(parm);
 }
 function search_get_select(obj_id)
 {
    var index = document.getElementById(obj_id).selectedIndex;
    if (index != -1) {
        return document.getElementById(obj_id).options[index].value;
    }
    else {
        return '';
    }
 }
 function search_get_selmult(obj_id)
 {
    var obj = document.getElementById(obj_id);
    var val = "_NM_array_";
    for (iSelect = 0; iSelect < obj.length; iSelect++)
    {
        if (obj[iSelect].selected)
        {
            val += "#NMARR#" + obj[iSelect].value;
        }
    }
    return val;
 }
 function search_get_Dselelect(obj_id)
 {
    var obj = document.getElementById(obj_id);
    var val = "_NM_array_";
    for (iSelect = 0; iSelect < obj.length; iSelect++)
    {
         val += "#NMARR#" + obj[iSelect].value;
    }
    return val;
 }
 function search_get_radio(obj_id)
 {
    var val  = "";
    if (document.getElementById(obj_id)) {
       var Nobj = document.getElementById(obj_id).name;
       var obj  = document.getElementsByName(Nobj);
       for (iRadio = 0; iRadio < obj.length; iRadio++) {
           if (obj[iRadio].checked) {
               val = obj[iRadio].value;
           }
       }
    }
    return val;
 }
 function search_get_checkbox(obj_id)
 {
    var val  = "_NM_array_";
    if (document.getElementById(obj_id)) {
       var Nobj = document.getElementById(obj_id).name;
       var obj  = document.getElementsByName(Nobj);
       if (!obj.length) {
           if (obj.checked) {
               val += "#NMARR#" + obj.value;
           }
       }
       else {
           for (iCheck = 0; iCheck < obj.length; iCheck++) {
               if (obj[iCheck].checked) {
                   val += "#NMARR#" + obj[iCheck].value;
               }
           }
       }
    }
    return val;
 }
 function search_get_text(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return (obj) ? obj.value : '';
 }
 function search_get_title(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return (obj) ? obj.title : '';
 }
 function search_get_sel_txt(obj_id)
 {
    var val = "";
    obj_part  = document.getElementById(obj_id);
    if (obj_part && obj_part.type.substr(0, 6) == 'select')
    {
        val = search_get_select(obj_id);
    }
    else
    {
        val = (obj_part) ? obj_part.value : '';
    }
    return val;
 }
 function search_get_html(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return obj.innerHTML;
 }
function nm_open_popup(parms)
{
    NovaJanela = window.open (parms, '', 'resizable, scrollbars');
}
 </SCRIPT>
<script type="text/javascript">
 $(function() {
   $("#id_ac_dokter").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_dokter",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_dokter").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_dokter").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_dokter").val( $(this).val() );
       }
     }
   });
   $("#id_ac_poli").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_poli",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_poli").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_poli").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_poli").val( $(this).val() );
       }
     }
   });
   $("#id_ac_diagnosa1").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_diagnosa1",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_diagnosa1").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_diagnosa1").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_diagnosa1").val( $(this).val() );
       }
     }
   });
   $("#id_ac_icd1").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_icd1",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_icd1").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_icd1").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_icd1").val( $(this).val() );
       }
     }
   });
   $("#id_ac_selesai").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_selesai",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_selesai").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_selesai").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_selesai").val( $(this).val() );
       }
     }
   });
   $("#id_ac_trancode").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_trancode",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_trancode").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_trancode").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_trancode").val( $(this).val() );
       }
     }
   });
   $("#id_ac_carakeluar").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_carakeluar",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_carakeluar").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_carakeluar").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_carakeluar").val( $(this).val() );
       }
     }
   });
   $("#id_ac_alasankeluar").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_alasankeluar",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_alasankeluar").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_alasankeluar").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_alasankeluar").val( $(this).val() );
       }
     }
   });
   $("#id_ac_custcode").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_custcode",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_custcode").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_custcode").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_custcode").val( $(this).val() );
       }
     }
   });
   $("#id_ac_nostruk").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_nostruk",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_nostruk").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_nostruk").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_nostruk").val( $(this).val() );
       }
     }
   });
   $("#id_ac_resikojatuh").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_resikojatuh",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_resikojatuh").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_resikojatuh").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_resikojatuh").val( $(this).val() );
       }
     }
   });
   $("#id_ac_diagnosa2").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_diagnosa2",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_diagnosa2").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_diagnosa2").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_diagnosa2").val( $(this).val() );
       }
     }
   });
   $("#id_ac_icd2").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_icd2",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_icd2").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_icd2").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_icd2").val( $(this).val() );
       }
     }
   });
 });
</script>
 <FORM name="F1" action="./" method="post" target="_self"> 
 <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
 <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
 <INPUT type="hidden" name="nmgp_opcao" value="busca"> 
 <div id="idJSSpecChar" style="display:none;"></div>
 <div id="id_div_process" style="display: none; position: absolute"><table class="scFilterTable"><tr><td class="scFilterLabelOdd"><?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</td></tr></table></div>
 <div id="id_fatal_error" class="scFilterFieldOdd" style="display:none; position: absolute"></div>
<TABLE id="main_table" align="center" valign="top" >
<tr>
<td>
<div class="scFilterBorder">
  <div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs'] ?>...</span></div>
<table cellspacing=0 cellpadding=0 width='100%'>
<?php
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   /**
    * @access  public
    */
   function monta_cabecalho()
   {
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['dashboard_info']['compact_mode'])
      {
          return;
      }
      $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
      $Lim   = strlen($Str_date);
      $Ult   = "";
      $Arr_D = array();
      for ($I = 0; $I < $Lim; $I++)
      {
          $Char = substr($Str_date, $I, 1);
          if ($Char != $Ult)
          {
              $Arr_D[] = $Char;
          }
          $Ult = $Char;
      }
      $Prim = true;
      $Str  = "";
      foreach ($Arr_D as $Cada_d)
      {
          $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $Str .= $Cada_d;
          $Prim = false;
      }
      $Str = str_replace("a", "Y", $Str);
      $Str = str_replace("y", "Y", $Str);
      $nm_data_fixa = date($Str); 
?>
 <TR align="center">
  <TD class="scFilterTableTd">
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFilterHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFilterHeaderFont" style="float: left; text-transform: uppercase;">Pencarian Histori Medis</div>
    <div class="scFilterHeaderFont" style="float: right;"><?php echo $nm_data_fixa; ?></div>
</div>  </TD>
 </TR>
<?php
   }

   /**
    * @access  public
    * @global  string  $nm_url_saida  $this->Ini->Nm_lang['pesq_global_nm_url_saida']
    * @global  integer  $nm_apl_dependente  $this->Ini->Nm_lang['pesq_global_nm_apl_dependente']
    * @global  string  $nmgp_parms  
    * @global  string  $bprocessa  $this->Ini->Nm_lang['pesq_global_bprocessa']
    */
   function monta_form()
   {
      global 
             $tglmasuk_cond, $tglmasuk, $tglmasuk_dia, $tglmasuk_mes, $tglmasuk_ano, $tglmasuk_hor, $tglmasuk_min, $tglmasuk_seg, $tglmasuk_input_2_dia, $tglmasuk_input_2_mes, $tglmasuk_input_2_ano, $tglmasuk_input_2_min, $tglmasuk_input_2_hor, $tglmasuk_input_2_seg,
             $trancode_cond, $trancode, $trancode_autocomp,
             $poli_cond, $poli, $poli_autocomp,
             $dokter_cond, $dokter, $dokter_autocomp,
             $selesai_cond, $selesai, $selesai_autocomp,
             $hta_cond, $hta, $hta_dia, $hta_mes, $hta_ano, $hta_hor, $hta_min, $hta_seg, $hta_input_2_dia, $hta_input_2_mes, $hta_input_2_ano, $hta_input_2_min, $hta_input_2_hor, $hta_input_2_seg,
             $tglkeluar_cond, $tglkeluar, $tglkeluar_dia, $tglkeluar_mes, $tglkeluar_ano, $tglkeluar_hor, $tglkeluar_min, $tglkeluar_seg, $tglkeluar_input_2_dia, $tglkeluar_input_2_mes, $tglkeluar_input_2_ano, $tglkeluar_input_2_min, $tglkeluar_input_2_hor, $tglkeluar_input_2_seg,
             $carakeluar_cond, $carakeluar, $carakeluar_autocomp,
             $alasankeluar_cond, $alasankeluar, $alasankeluar_autocomp,
             $custcode_cond, $custcode, $custcode_autocomp,
             $nostruk_cond, $nostruk, $nostruk_autocomp,
             $resikojatuh_cond, $resikojatuh, $resikojatuh_autocomp,
             $diagnosa1_cond, $diagnosa1, $diagnosa1_autocomp,
             $diagnosa2_cond, $diagnosa2, $diagnosa2_autocomp,
             $icd1_cond, $icd1, $icd1_autocomp,
             $icd2_cond, $icd2, $icd2_autocomp,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['historiRJ']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['historiRJ']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['historiRJ']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("historiRJ", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      {
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $tglmasuk_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_dia']; 
          $tglmasuk_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_mes']; 
          $tglmasuk_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_ano']; 
          $tglmasuk_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2_dia']; 
          $tglmasuk_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2_mes']; 
          $tglmasuk_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2_ano']; 
          $tglmasuk_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_hor']; 
          $tglmasuk_min = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_min']; 
          $tglmasuk_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_seg']; 
          $tglmasuk_input_2_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2_hor']; 
          $tglmasuk_input_2_min = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2_min']; 
          $tglmasuk_input_2_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2_seg']; 
          $tglmasuk_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_cond']; 
          $trancode = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['trancode']; 
          $trancode_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['trancode_cond']; 
          $poli = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['poli']; 
          $poli_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['poli_cond']; 
          $dokter = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['dokter']; 
          $dokter_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['dokter_cond']; 
          $selesai = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['selesai']; 
          $selesai_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['selesai_cond']; 
          $hta_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_dia']; 
          $hta_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_mes']; 
          $hta_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_ano']; 
          $hta_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2_dia']; 
          $hta_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2_mes']; 
          $hta_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2_ano']; 
          $hta_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_hor']; 
          $hta_min = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_min']; 
          $hta_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_seg']; 
          $hta_input_2_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2_hor']; 
          $hta_input_2_min = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2_min']; 
          $hta_input_2_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2_seg']; 
          $hta_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_cond']; 
          $tglkeluar_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_dia']; 
          $tglkeluar_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_mes']; 
          $tglkeluar_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_ano']; 
          $tglkeluar_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2_dia']; 
          $tglkeluar_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2_mes']; 
          $tglkeluar_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2_ano']; 
          $tglkeluar_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_hor']; 
          $tglkeluar_min = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_min']; 
          $tglkeluar_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_seg']; 
          $tglkeluar_input_2_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2_hor']; 
          $tglkeluar_input_2_min = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2_min']; 
          $tglkeluar_input_2_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2_seg']; 
          $tglkeluar_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_cond']; 
          $carakeluar = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['carakeluar']; 
          $carakeluar_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['carakeluar_cond']; 
          $alasankeluar = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['alasankeluar']; 
          $alasankeluar_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['alasankeluar_cond']; 
          $custcode = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['custcode']; 
          $custcode_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['custcode_cond']; 
          $nostruk = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['nostruk']; 
          $nostruk_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['nostruk_cond']; 
          $resikojatuh = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['resikojatuh']; 
          $resikojatuh_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['resikojatuh_cond']; 
          $diagnosa1 = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['diagnosa1']; 
          $diagnosa1_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['diagnosa1_cond']; 
          $diagnosa2 = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['diagnosa2']; 
          $diagnosa2_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['diagnosa2_cond']; 
          $icd1 = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['icd1']; 
          $icd1_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['icd1_cond']; 
          $icd2 = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['icd2']; 
          $icd2_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['icd2_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['NM_operador']; 
      } 
      if (!isset($tglmasuk_cond) || empty($tglmasuk_cond))
      {
         $tglmasuk_cond = "eq";
      }
      if (!isset($trancode_cond) || empty($trancode_cond))
      {
         $trancode_cond = "qp";
      }
      if (!isset($poli_cond) || empty($poli_cond))
      {
         $poli_cond = "qp";
      }
      if (!isset($dokter_cond) || empty($dokter_cond))
      {
         $dokter_cond = "qp";
      }
      if (!isset($selesai_cond) || empty($selesai_cond))
      {
         $selesai_cond = "qp";
      }
      if (!isset($hta_cond) || empty($hta_cond))
      {
         $hta_cond = "eq";
      }
      if (!isset($tglkeluar_cond) || empty($tglkeluar_cond))
      {
         $tglkeluar_cond = "eq";
      }
      if (!isset($carakeluar_cond) || empty($carakeluar_cond))
      {
         $carakeluar_cond = "qp";
      }
      if (!isset($alasankeluar_cond) || empty($alasankeluar_cond))
      {
         $alasankeluar_cond = "qp";
      }
      if (!isset($custcode_cond) || empty($custcode_cond))
      {
         $custcode_cond = "qp";
      }
      if (!isset($nostruk_cond) || empty($nostruk_cond))
      {
         $nostruk_cond = "gt";
      }
      if (!isset($resikojatuh_cond) || empty($resikojatuh_cond))
      {
         $resikojatuh_cond = "gt";
      }
      if (!isset($diagnosa1_cond) || empty($diagnosa1_cond))
      {
         $diagnosa1_cond = "qp";
      }
      if (!isset($diagnosa2_cond) || empty($diagnosa2_cond))
      {
         $diagnosa2_cond = "qp";
      }
      if (!isset($icd1_cond) || empty($icd1_cond))
      {
         $icd1_cond = "qp";
      }
      if (!isset($icd2_cond) || empty($icd2_cond))
      {
         $icd2_cond = "qp";
      }
      $display_aberto  = "style=display:";
      $display_fechado = "style=display:none";
      $opc_hide_input = array("nu","nn","ep","ne");
      $str_hide_tglmasuk = (in_array($tglmasuk_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_trancode = (in_array($trancode_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_poli = (in_array($poli_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_dokter = (in_array($dokter_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_selesai = (in_array($selesai_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_hta = (in_array($hta_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_tglkeluar = (in_array($tglkeluar_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_carakeluar = (in_array($carakeluar_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_alasankeluar = (in_array($alasankeluar_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_custcode = (in_array($custcode_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_nostruk = (in_array($nostruk_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_resikojatuh = (in_array($resikojatuh_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_diagnosa1 = (in_array($diagnosa1_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_diagnosa2 = (in_array($diagnosa2_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_icd1 = (in_array($icd1_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_icd2 = (in_array($icd2_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;

      $str_display_tglmasuk = ('bw' == $tglmasuk_cond) ? $display_aberto : $display_fechado;
      $str_display_trancode = ('bw' == $trancode_cond) ? $display_aberto : $display_fechado;
      $str_display_poli = ('bw' == $poli_cond) ? $display_aberto : $display_fechado;
      $str_display_dokter = ('bw' == $dokter_cond) ? $display_aberto : $display_fechado;
      $str_display_selesai = ('bw' == $selesai_cond) ? $display_aberto : $display_fechado;
      $str_display_hta = ('bw' == $hta_cond) ? $display_aberto : $display_fechado;
      $str_display_tglkeluar = ('bw' == $tglkeluar_cond) ? $display_aberto : $display_fechado;
      $str_display_carakeluar = ('bw' == $carakeluar_cond) ? $display_aberto : $display_fechado;
      $str_display_alasankeluar = ('bw' == $alasankeluar_cond) ? $display_aberto : $display_fechado;
      $str_display_custcode = ('bw' == $custcode_cond) ? $display_aberto : $display_fechado;
      $str_display_nostruk = ('bw' == $nostruk_cond) ? $display_aberto : $display_fechado;
      $str_display_resikojatuh = ('bw' == $resikojatuh_cond) ? $display_aberto : $display_fechado;
      $str_display_diagnosa1 = ('bw' == $diagnosa1_cond) ? $display_aberto : $display_fechado;
      $str_display_diagnosa2 = ('bw' == $diagnosa2_cond) ? $display_aberto : $display_fechado;
      $str_display_icd1 = ('bw' == $icd1_cond) ? $display_aberto : $display_fechado;
      $str_display_icd2 = ('bw' == $icd2_cond) ? $display_aberto : $display_fechado;

      if (!isset($tglmasuk) || $tglmasuk == "")
      {
          $tglmasuk = "";
      }
      if (isset($tglmasuk) && !empty($tglmasuk))
      {
         $tmp_pos = strpos($tglmasuk, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $tglmasuk = substr($tglmasuk, 0, $tmp_pos);
         }
      }
      if (!isset($trancode) || $trancode == "")
      {
          $trancode = "";
      }
      if (isset($trancode) && !empty($trancode))
      {
         $tmp_pos = strpos($trancode, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $trancode = substr($trancode, 0, $tmp_pos);
         }
      }
      if (!isset($poli) || $poli == "")
      {
          $poli = "";
      }
      if (isset($poli) && !empty($poli))
      {
         $tmp_pos = strpos($poli, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $poli = substr($poli, 0, $tmp_pos);
         }
      }
      if (!isset($dokter) || $dokter == "")
      {
          $dokter = "";
      }
      if (isset($dokter) && !empty($dokter))
      {
         $tmp_pos = strpos($dokter, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $dokter = substr($dokter, 0, $tmp_pos);
         }
      }
      if (!isset($selesai) || $selesai == "")
      {
          $selesai = "";
      }
      if (isset($selesai) && !empty($selesai))
      {
         $tmp_pos = strpos($selesai, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $selesai = substr($selesai, 0, $tmp_pos);
         }
      }
      if (!isset($hta) || $hta == "")
      {
          $hta = "";
      }
      if (isset($hta) && !empty($hta))
      {
         $tmp_pos = strpos($hta, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $hta = substr($hta, 0, $tmp_pos);
         }
      }
      if (!isset($tglkeluar) || $tglkeluar == "")
      {
          $tglkeluar = "";
      }
      if (isset($tglkeluar) && !empty($tglkeluar))
      {
         $tmp_pos = strpos($tglkeluar, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $tglkeluar = substr($tglkeluar, 0, $tmp_pos);
         }
      }
      if (!isset($carakeluar) || $carakeluar == "")
      {
          $carakeluar = "";
      }
      if (isset($carakeluar) && !empty($carakeluar))
      {
         $tmp_pos = strpos($carakeluar, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $carakeluar = substr($carakeluar, 0, $tmp_pos);
         }
      }
      if (!isset($alasankeluar) || $alasankeluar == "")
      {
          $alasankeluar = "";
      }
      if (isset($alasankeluar) && !empty($alasankeluar))
      {
         $tmp_pos = strpos($alasankeluar, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $alasankeluar = substr($alasankeluar, 0, $tmp_pos);
         }
      }
      if (!isset($custcode) || $custcode == "")
      {
          $custcode = "";
      }
      if (isset($custcode) && !empty($custcode))
      {
         $tmp_pos = strpos($custcode, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $custcode = substr($custcode, 0, $tmp_pos);
         }
      }
      if (!isset($nostruk) || $nostruk == "")
      {
          $nostruk = "";
      }
      if (isset($nostruk) && !empty($nostruk))
      {
         $tmp_pos = strpos($nostruk, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $nostruk = substr($nostruk, 0, $tmp_pos);
         }
      }
      if (!isset($resikojatuh) || $resikojatuh == "")
      {
          $resikojatuh = "";
      }
      if (isset($resikojatuh) && !empty($resikojatuh))
      {
         $tmp_pos = strpos($resikojatuh, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $resikojatuh = substr($resikojatuh, 0, $tmp_pos);
         }
      }
      if (!isset($diagnosa1) || $diagnosa1 == "")
      {
          $diagnosa1 = "";
      }
      if (isset($diagnosa1) && !empty($diagnosa1))
      {
         $tmp_pos = strpos($diagnosa1, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $diagnosa1 = substr($diagnosa1, 0, $tmp_pos);
         }
      }
      if (!isset($diagnosa2) || $diagnosa2 == "")
      {
          $diagnosa2 = "";
      }
      if (isset($diagnosa2) && !empty($diagnosa2))
      {
         $tmp_pos = strpos($diagnosa2, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $diagnosa2 = substr($diagnosa2, 0, $tmp_pos);
         }
      }
      if (!isset($icd1) || $icd1 == "")
      {
          $icd1 = "";
      }
      if (isset($icd1) && !empty($icd1))
      {
         $tmp_pos = strpos($icd1, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $icd1 = substr($icd1, 0, $tmp_pos);
         }
      }
      if (!isset($icd2) || $icd2 == "")
      {
          $icd2 = "";
      }
      if (isset($icd2) && !empty($icd2))
      {
         $tmp_pos = strpos($icd2, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $icd2 = substr($icd2, 0, $tmp_pos);
         }
      }
?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE class="scFilterTable" id="hidden_bloco_0" valign="top" width="100%" style="height: 100%;">
   <tr>





      <TD id='SC_tglmasuk_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['tglmasuk'])) ? $this->New_label['tglmasuk'] : "Tgl Masuk"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_tglmasuk_cond" name="tglmasuk_cond" onChange="nm_campos_between(document.getElementById('id_vis_tglmasuk'), this, 'tglmasuk')">
       <OPTION value="eq" <?php if ("eq" == $tglmasuk_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="gt" <?php if ("gt" == $tglmasuk_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $tglmasuk_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
       <OPTION value="bw" <?php if ("bw" == $tglmasuk_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_tglmasuk" <?php echo $str_hide_tglmasuk?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['tglmasuk'])) ? $this->New_label['tglmasuk'] : "Tgl Masuk";
 $nmgp_tab_label .= "tglmasuk?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>

<?php
  $Form_base = "ddmmyyyyhhiiss";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $date_format_show .= " ";
  $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
  $Lim   = strlen($Str_time);
  $Str   = "";
  $Ult   = "";
  $Arr_T = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_time, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_T[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_T[] = $Str;
  $Prim = true;
  foreach ($Arr_T as $Cada_t)
  {
      if (strpos($Form_base, $Cada_t) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
          $date_format_show .= $Cada_t;
          $Prim = false;
      }
  }
  $Arr_format = array_merge($Arr_D, $Arr_T);
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "" . $date_format_show .  "";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_tglmasuk_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglmasuk_dia" name="tglmasuk_dia" value="<?php echo NM_encode_input($tglmasuk_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_tglmasuk_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglmasuk_mes" name="tglmasuk_mes" value="<?php echo NM_encode_input($tglmasuk_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_tglmasuk_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglmasuk_ano" name="tglmasuk_ano" value="<?php echo NM_encode_input($tglmasuk_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_tglmasuk_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglmasuk_hor" name="tglmasuk_hor" value="<?php echo NM_encode_input($tglmasuk_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_tglmasuk_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglmasuk_min" name="tglmasuk_min" value="<?php echo NM_encode_input($tglmasuk_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_tglmasuk_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglmasuk_seg" name="tglmasuk_seg" value="<?php echo NM_encode_input($tglmasuk_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_tglmasuk"  class="scFilterFieldFontOdd">
 <?php echo $date_format_show ?>         </SPAN>
                 </TD>
       </TR>
       <TR valign="top">
        <TD id="id_vis_tglmasuk"  <?php echo $str_display_tglmasuk; ?> class="scFilterFieldFontOdd">
         <?php echo $date_sep_bw ?>
         <BR>
         
         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_tglmasuk_input_2_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglmasuk_input_2_dia" name="tglmasuk_input_2_dia" value="<?php echo NM_encode_input($tglmasuk_input_2_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_tglmasuk_input_2_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglmasuk_input_2_mes" name="tglmasuk_input_2_mes" value="<?php echo NM_encode_input($tglmasuk_input_2_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_tglmasuk_input_2_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglmasuk_input_2_ano" name="tglmasuk_input_2_ano" value="<?php echo NM_encode_input($tglmasuk_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_tglmasuk_input_2_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglmasuk_input_2_hor" name="tglmasuk_input_2_hor" value="<?php echo NM_encode_input($tglmasuk_input_2_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_tglmasuk_input_2_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglmasuk_input_2_min" name="tglmasuk_input_2_min" value="<?php echo NM_encode_input($tglmasuk_input_2_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_tglmasuk_input_2_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglmasuk_input_2_seg" name="tglmasuk_input_2_seg" value="<?php echo NM_encode_input($tglmasuk_input_2_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_trancode_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Tran Code"; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_trancode_cond" name="trancode_cond" onChange="nm_campos_between(document.getElementById('id_vis_trancode'), this, 'trancode')">
       <OPTION value="qp" <?php if ("qp" == $trancode_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $trancode_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $trancode_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $trancode_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_trancode" <?php echo $str_hide_trancode?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Tran Code";
 $nmgp_tab_label .= "trancode?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($trancode != "")
      {
      $trancode_look = substr($this->Db->qstr($trancode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.tranCode from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.tranCode = '$trancode_look' order by a.tranCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$trancode]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$trancode];
      }
      else
      {
          $sAutocompValue = $trancode;
      }
?>
<INPUT  type="text" id="SC_trancode" name="trancode" value="<?php echo NM_encode_input($trancode) ?>"  size=50 alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_trancode" name="trancode_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_poli_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['poli'])) ? $this->New_label['poli'] : "Poli"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_poli_cond" name="poli_cond" onChange="nm_campos_between(document.getElementById('id_vis_poli'), this, 'poli')">
       <OPTION value="qp" <?php if ("qp" == $poli_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $poli_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $poli_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $poli_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_poli" <?php echo $str_hide_poli?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['poli'])) ? $this->New_label['poli'] : "Poli";
 $nmgp_tab_label .= "poli?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($poli != "")
      {
      $poli_look = substr($this->Db->qstr($poli), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct b.poly from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and b.poly = '$poli_look' order by b.poly"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$poli]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$poli];
      }
      else
      {
          $sAutocompValue = $poli;
      }
?>
<INPUT  type="text" id="SC_poli" name="poli" value="<?php echo NM_encode_input($poli) ?>"  size=18 alt="{datatype: 'text', maxLength: 18, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_poli" name="poli_autocomp" size="18"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 18, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_dokter_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['dokter'])) ? $this->New_label['dokter'] : "Dokter"; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_dokter_cond" name="dokter_cond" onChange="nm_campos_between(document.getElementById('id_vis_dokter'), this, 'dokter')">
       <OPTION value="qp" <?php if ("qp" == $dokter_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $dokter_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $dokter_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $dokter_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_dokter" <?php echo $str_hide_dokter?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['dokter'])) ? $this->New_label['dokter'] : "Dokter";
 $nmgp_tab_label .= "dokter?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($dokter != "")
      {
      $dokter_look = substr($this->Db->qstr($dokter), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.dokter from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.dokter = '$dokter_look' order by a.dokter"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$dokter]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$dokter];
      }
      else
      {
          $sAutocompValue = $dokter;
      }
?>
<INPUT  type="text" id="SC_dokter" name="dokter" value="<?php echo NM_encode_input($dokter) ?>"  size=50 alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_dokter" name="dokter_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_selesai_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['selesai'])) ? $this->New_label['selesai'] : "Selesai"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_selesai_cond" name="selesai_cond" onChange="nm_campos_between(document.getElementById('id_vis_selesai'), this, 'selesai')">
       <OPTION value="qp" <?php if ("qp" == $selesai_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $selesai_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $selesai_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $selesai_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_selesai" <?php echo $str_hide_selesai?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['selesai'])) ? $this->New_label['selesai'] : "Selesai";
 $nmgp_tab_label .= "selesai?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($selesai != "")
      {
      $selesai_look = substr($this->Db->qstr($selesai), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.selesai from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.selesai = '$selesai_look' order by a.selesai"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$selesai]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$selesai];
      }
      else
      {
          $sAutocompValue = $selesai;
      }
?>
<INPUT  type="text" id="SC_selesai" name="selesai" value="<?php echo NM_encode_input($selesai) ?>"  size=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_selesai" name="selesai_autocomp" size="3"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 3, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_hta_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['hta'])) ? $this->New_label['hta'] : "HTA"; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_hta_cond" name="hta_cond" onChange="nm_campos_between(document.getElementById('id_vis_hta'), this, 'hta')">
       <OPTION value="eq" <?php if ("eq" == $hta_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="gt" <?php if ("gt" == $hta_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $hta_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
       <OPTION value="bw" <?php if ("bw" == $hta_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_hta" <?php echo $str_hide_hta?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['hta'])) ? $this->New_label['hta'] : "HTA";
 $nmgp_tab_label .= "hta?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>

<?php
  $Form_base = "ddmmyyyyhhiiss";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $date_format_show .= " ";
  $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
  $Lim   = strlen($Str_time);
  $Str   = "";
  $Ult   = "";
  $Arr_T = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_time, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_T[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_T[] = $Str;
  $Prim = true;
  foreach ($Arr_T as $Cada_t)
  {
      if (strpos($Form_base, $Cada_t) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
          $date_format_show .= $Cada_t;
          $Prim = false;
      }
  }
  $Arr_format = array_merge($Arr_D, $Arr_T);
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "" . $date_format_show .  "";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_hta_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_hta_dia" name="hta_dia" value="<?php echo NM_encode_input($hta_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_hta_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_hta_mes" name="hta_mes" value="<?php echo NM_encode_input($hta_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_hta_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_hta_ano" name="hta_ano" value="<?php echo NM_encode_input($hta_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_hta_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_hta_hor" name="hta_hor" value="<?php echo NM_encode_input($hta_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_hta_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_hta_min" name="hta_min" value="<?php echo NM_encode_input($hta_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_hta_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_hta_seg" name="hta_seg" value="<?php echo NM_encode_input($hta_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_hta"  class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
                 </TD>
       </TR>
       <TR valign="top">
        <TD id="id_vis_hta"  <?php echo $str_display_hta; ?> class="scFilterFieldFontEven">
         <?php echo $date_sep_bw ?>
         <BR>
         
         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_hta_input_2_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_hta_input_2_dia" name="hta_input_2_dia" value="<?php echo NM_encode_input($hta_input_2_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_hta_input_2_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_hta_input_2_mes" name="hta_input_2_mes" value="<?php echo NM_encode_input($hta_input_2_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_hta_input_2_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_hta_input_2_ano" name="hta_input_2_ano" value="<?php echo NM_encode_input($hta_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_hta_input_2_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_hta_input_2_hor" name="hta_input_2_hor" value="<?php echo NM_encode_input($hta_input_2_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_hta_input_2_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_hta_input_2_min" name="hta_input_2_min" value="<?php echo NM_encode_input($hta_input_2_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_hta_input_2_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_hta_input_2_seg" name="hta_input_2_seg" value="<?php echo NM_encode_input($hta_input_2_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_tglkeluar_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['tglkeluar'])) ? $this->New_label['tglkeluar'] : "Tgl Keluar"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_tglkeluar_cond" name="tglkeluar_cond" onChange="nm_campos_between(document.getElementById('id_vis_tglkeluar'), this, 'tglkeluar')">
       <OPTION value="eq" <?php if ("eq" == $tglkeluar_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="gt" <?php if ("gt" == $tglkeluar_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $tglkeluar_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
       <OPTION value="bw" <?php if ("bw" == $tglkeluar_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_tglkeluar" <?php echo $str_hide_tglkeluar?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['tglkeluar'])) ? $this->New_label['tglkeluar'] : "Tgl Keluar";
 $nmgp_tab_label .= "tglkeluar?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>

<?php
  $Form_base = "ddmmyyyyhhiiss";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $date_format_show .= " ";
  $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
  $Lim   = strlen($Str_time);
  $Str   = "";
  $Ult   = "";
  $Arr_T = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_time, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_T[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_T[] = $Str;
  $Prim = true;
  foreach ($Arr_T as $Cada_t)
  {
      if (strpos($Form_base, $Cada_t) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
          $date_format_show .= $Cada_t;
          $Prim = false;
      }
  }
  $Arr_format = array_merge($Arr_D, $Arr_T);
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "" . $date_format_show .  "";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_tglkeluar_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglkeluar_dia" name="tglkeluar_dia" value="<?php echo NM_encode_input($tglkeluar_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_tglkeluar_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglkeluar_mes" name="tglkeluar_mes" value="<?php echo NM_encode_input($tglkeluar_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_tglkeluar_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglkeluar_ano" name="tglkeluar_ano" value="<?php echo NM_encode_input($tglkeluar_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_tglkeluar_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglkeluar_hor" name="tglkeluar_hor" value="<?php echo NM_encode_input($tglkeluar_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_tglkeluar_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglkeluar_min" name="tglkeluar_min" value="<?php echo NM_encode_input($tglkeluar_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_tglkeluar_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglkeluar_seg" name="tglkeluar_seg" value="<?php echo NM_encode_input($tglkeluar_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_tglkeluar"  class="scFilterFieldFontOdd">
 <?php echo $date_format_show ?>         </SPAN>
                 </TD>
       </TR>
       <TR valign="top">
        <TD id="id_vis_tglkeluar"  <?php echo $str_display_tglkeluar; ?> class="scFilterFieldFontOdd">
         <?php echo $date_sep_bw ?>
         <BR>
         
         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_tglkeluar_input_2_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglkeluar_input_2_dia" name="tglkeluar_input_2_dia" value="<?php echo NM_encode_input($tglkeluar_input_2_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_tglkeluar_input_2_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglkeluar_input_2_mes" name="tglkeluar_input_2_mes" value="<?php echo NM_encode_input($tglkeluar_input_2_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_tglkeluar_input_2_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglkeluar_input_2_ano" name="tglkeluar_input_2_ano" value="<?php echo NM_encode_input($tglkeluar_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_tglkeluar_input_2_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglkeluar_input_2_hor" name="tglkeluar_input_2_hor" value="<?php echo NM_encode_input($tglkeluar_input_2_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_tglkeluar_input_2_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglkeluar_input_2_min" name="tglkeluar_input_2_min" value="<?php echo NM_encode_input($tglkeluar_input_2_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_tglkeluar_input_2_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_tglkeluar_input_2_seg" name="tglkeluar_input_2_seg" value="<?php echo NM_encode_input($tglkeluar_input_2_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_carakeluar_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['carakeluar'])) ? $this->New_label['carakeluar'] : "Cara Keluar"; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_carakeluar_cond" name="carakeluar_cond" onChange="nm_campos_between(document.getElementById('id_vis_carakeluar'), this, 'carakeluar')">
       <OPTION value="qp" <?php if ("qp" == $carakeluar_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $carakeluar_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $carakeluar_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $carakeluar_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_carakeluar" <?php echo $str_hide_carakeluar?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['carakeluar'])) ? $this->New_label['carakeluar'] : "Cara Keluar";
 $nmgp_tab_label .= "carakeluar?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($carakeluar != "")
      {
      $carakeluar_look = substr($this->Db->qstr($carakeluar), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.caraKeluar from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.caraKeluar = '$carakeluar_look' order by a.caraKeluar"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$carakeluar]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$carakeluar];
      }
      else
      {
          $sAutocompValue = $carakeluar;
      }
?>
<INPUT  type="text" id="SC_carakeluar" name="carakeluar" value="<?php echo NM_encode_input($carakeluar) ?>"  size=50 alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_carakeluar" name="carakeluar_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_alasankeluar_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['alasankeluar'])) ? $this->New_label['alasankeluar'] : "Alasan Keluar"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_alasankeluar_cond" name="alasankeluar_cond" onChange="nm_campos_between(document.getElementById('id_vis_alasankeluar'), this, 'alasankeluar')">
       <OPTION value="qp" <?php if ("qp" == $alasankeluar_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $alasankeluar_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $alasankeluar_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $alasankeluar_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_alasankeluar" <?php echo $str_hide_alasankeluar?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['alasankeluar'])) ? $this->New_label['alasankeluar'] : "Alasan Keluar";
 $nmgp_tab_label .= "alasankeluar?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($alasankeluar != "")
      {
      $alasankeluar_look = substr($this->Db->qstr($alasankeluar), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.alasanKeluar from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.alasanKeluar = '$alasankeluar_look' order by a.alasanKeluar"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$alasankeluar]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$alasankeluar];
      }
      else
      {
          $sAutocompValue = $alasankeluar;
      }
?>
<INPUT  type="text" id="SC_alasankeluar" name="alasankeluar" value="<?php echo NM_encode_input($alasankeluar) ?>"  size=50 alt="{datatype: 'text', maxLength: 300, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_alasankeluar" name="alasankeluar_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 300, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_custcode_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['custcode'])) ? $this->New_label['custcode'] : "Cust Code"; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_custcode_cond" name="custcode_cond" onChange="nm_campos_between(document.getElementById('id_vis_custcode'), this, 'custcode')">
       <OPTION value="qp" <?php if ("qp" == $custcode_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $custcode_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $custcode_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $custcode_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_custcode" <?php echo $str_hide_custcode?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['custcode'])) ? $this->New_label['custcode'] : "Cust Code";
 $nmgp_tab_label .= "custcode?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($custcode != "")
      {
      $custcode_look = substr($this->Db->qstr($custcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.custCode from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.custCode = '$custcode_look' order by a.custCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$custcode]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$custcode];
      }
      else
      {
          $sAutocompValue = $custcode;
      }
?>
<INPUT  type="text" id="SC_custcode" name="custcode" value="<?php echo NM_encode_input($custcode) ?>"  size=18 alt="{datatype: 'text', maxLength: 18, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_custcode" name="custcode_autocomp" size="18"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 18, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


<?php
  if (isset($this->Ini->sc_lig_md5["grid_tbcustomer"]) && $this->Ini->sc_lig_md5["grid_tbcustomer"] == "S") {
      $Parms_Lig  = "nmgp_parms_ret*scinF1,custcode_autocomp,custcode*scout";
      $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@historiRJ@SC_par@" . md5($Parms_Lig);
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
  } else {
      $Md5_Lig  = "nmgp_parms_ret*scinF1,custcode_autocomp,custcode*scout";
  }
  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_tbcustomer_cons_psq . "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_tbcustomer_cons_psq . "', '" . $Md5_Lig . "')", "", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");

?>
&nbsp;<?php echo $Cod_Btn ?>

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_nostruk_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['nostruk'])) ? $this->New_label['nostruk'] : "No Struk"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_nostruk_cond" name="nostruk_cond" onChange="nm_campos_between(document.getElementById('id_vis_nostruk'), this, 'nostruk')">
       <OPTION value="gt" <?php if ("gt" == $nostruk_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $nostruk_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $nostruk_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_nostruk" <?php echo $str_hide_nostruk?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['nostruk'])) ? $this->New_label['nostruk'] : "No Struk";
 $nmgp_tab_label .= "nostruk?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($nostruk != "")
      {
      $nostruk_look = substr($this->Db->qstr($nostruk), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($nostruk))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct a.noStruk from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.noStruk = $nostruk_look order by a.noStruk"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct a.noStruk from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.noStruk = $nostruk_look order by a.noStruk"; 
      }
      else
      {
          $nm_comando = "select distinct a.noStruk from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.noStruk = $nostruk_look order by a.noStruk"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 
      }
      if (isset($nmgp_def_dados[0][$nostruk]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$nostruk];
      }
      else
      {
            nmgp_Form_Num_Val($nostruk, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $nostruk;
      }
?>
<INPUT  type="text" id="SC_nostruk" name="nostruk" value="<?php echo NM_encode_input($nostruk) ?>" size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_nostruk" name="nostruk_autocomp" size="10"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_resikojatuh_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['resikojatuh'])) ? $this->New_label['resikojatuh'] : "Resiko Jatuh"; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_resikojatuh_cond" name="resikojatuh_cond" onChange="nm_campos_between(document.getElementById('id_vis_resikojatuh'), this, 'resikojatuh')">
       <OPTION value="gt" <?php if ("gt" == $resikojatuh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $resikojatuh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $resikojatuh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_resikojatuh" <?php echo $str_hide_resikojatuh?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['resikojatuh'])) ? $this->New_label['resikojatuh'] : "Resiko Jatuh";
 $nmgp_tab_label .= "resikojatuh?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($resikojatuh != "")
      {
      $resikojatuh_look = substr($this->Db->qstr($resikojatuh), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($resikojatuh))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct a.resikoJatuh from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.resikoJatuh = $resikojatuh_look order by a.resikoJatuh"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct a.resikoJatuh from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.resikoJatuh = $resikojatuh_look order by a.resikoJatuh"; 
      }
      else
      {
          $nm_comando = "select distinct a.resikoJatuh from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.resikoJatuh = $resikojatuh_look order by a.resikoJatuh"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 
      }
      if (isset($nmgp_def_dados[0][$resikojatuh]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$resikojatuh];
      }
      else
      {
            nmgp_Form_Num_Val($resikojatuh, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $resikojatuh;
      }
?>
<INPUT  type="text" id="SC_resikojatuh" name="resikojatuh" value="<?php echo NM_encode_input($resikojatuh) ?>" size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_resikojatuh" name="resikojatuh_autocomp" size="3"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_diagnosa1_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['diagnosa1'])) ? $this->New_label['diagnosa1'] : "Diagnosa"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_diagnosa1_cond" name="diagnosa1_cond" onChange="nm_campos_between(document.getElementById('id_vis_diagnosa1'), this, 'diagnosa1')">
       <OPTION value="qp" <?php if ("qp" == $diagnosa1_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $diagnosa1_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $diagnosa1_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $diagnosa1_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_diagnosa1" <?php echo $str_hide_diagnosa1?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['diagnosa1'])) ? $this->New_label['diagnosa1'] : "Diagnosa";
 $nmgp_tab_label .= "diagnosa1?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($diagnosa1 != "")
      {
      $diagnosa1_look = substr($this->Db->qstr($diagnosa1), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.diagnosa1 from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.diagnosa1 = '$diagnosa1_look' order by a.diagnosa1"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$diagnosa1]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$diagnosa1];
      }
      else
      {
          $sAutocompValue = $diagnosa1;
      }
?>
<INPUT  type="text" id="SC_diagnosa1" name="diagnosa1" value="<?php echo NM_encode_input($diagnosa1) ?>"  size=50 alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_diagnosa1" name="diagnosa1_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_diagnosa2_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['diagnosa2'])) ? $this->New_label['diagnosa2'] : "Diagnosa 2"; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_diagnosa2_cond" name="diagnosa2_cond" onChange="nm_campos_between(document.getElementById('id_vis_diagnosa2'), this, 'diagnosa2')">
       <OPTION value="qp" <?php if ("qp" == $diagnosa2_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $diagnosa2_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $diagnosa2_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $diagnosa2_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_diagnosa2" <?php echo $str_hide_diagnosa2?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['diagnosa2'])) ? $this->New_label['diagnosa2'] : "Diagnosa 2";
 $nmgp_tab_label .= "diagnosa2?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($diagnosa2 != "")
      {
      $diagnosa2_look = substr($this->Db->qstr($diagnosa2), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.diagnosa2 from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.diagnosa2 = '$diagnosa2_look' order by a.diagnosa2"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$diagnosa2]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$diagnosa2];
      }
      else
      {
          $sAutocompValue = $diagnosa2;
      }
?>
<INPUT  type="text" id="SC_diagnosa2" name="diagnosa2" value="<?php echo NM_encode_input($diagnosa2) ?>"  size=50 alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_diagnosa2" name="diagnosa2_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_icd1_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['icd1'])) ? $this->New_label['icd1'] : "Kode ICD"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_icd1_cond" name="icd1_cond" onChange="nm_campos_between(document.getElementById('id_vis_icd1'), this, 'icd1')">
       <OPTION value="qp" <?php if ("qp" == $icd1_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $icd1_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $icd1_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $icd1_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_icd1" <?php echo $str_hide_icd1?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['icd1'])) ? $this->New_label['icd1'] : "Kode ICD";
 $nmgp_tab_label .= "icd1?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($icd1 != "")
      {
      $icd1_look = substr($this->Db->qstr($icd1), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.icd1 from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.icd1 = '$icd1_look' order by a.icd1"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$icd1]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$icd1];
      }
      else
      {
          $sAutocompValue = $icd1;
      }
?>
<INPUT  type="text" id="SC_icd1" name="icd1" value="<?php echo NM_encode_input($icd1) ?>"  size=50 alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_icd1" name="icd1_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_icd2_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['icd2'])) ? $this->New_label['icd2'] : "Icd 2"; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_icd2_cond" name="icd2_cond" onChange="nm_campos_between(document.getElementById('id_vis_icd2'), this, 'icd2')">
       <OPTION value="qp" <?php if ("qp" == $icd2_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $icd2_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $icd2_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $icd2_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_icd2" <?php echo $str_hide_icd2?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['icd2'])) ? $this->New_label['icd2'] : "Icd 2";
 $nmgp_tab_label .= "icd2?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($icd2 != "")
      {
      $icd2_look = substr($this->Db->qstr($icd2), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.icd2 from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.icd2 = '$icd2_look' order by a.icd2"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$icd2]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$icd2];
      }
      else
      {
          $sAutocompValue = $icd2;
      }
?>
<INPUT  type="text" id="SC_icd2" name="icd2" value="<?php echo NM_encode_input($icd2) ?>"  size=50 alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_icd2" name="icd2_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 75, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr>
   </TABLE>
  </TD>
 </TR>
 </TABLE>
 </TD>
 </TR>
 <TR>
  <TD class="scFilterTableTd" align="center">
<INPUT type="hidden" id="SC_NM_operador" name="NM_operador" value="and">  </TD>
 </TR>
   <INPUT type="hidden" name="nmgp_tab_label" value="<?php echo NM_encode_input($nmgp_tab_label); ?>"> 
   <INPUT type="hidden" name="bprocessa" value="pesq"> 
<?php
    $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['pesq_tab_label'] = $nmgp_tab_label;
?>
 <?php
     if ($_SESSION['scriptcase']['proc_mobile'])
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "sc_b_pesq_bot", "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "limpa_form();", "limpa_form();", "limpa_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (!isset($this->nmgp_botoes['save']) || $this->nmgp_botoes['save'] == "on")
   {
       $this->NM_fil_ant = $this->gera_array_filtros();
?>
     <span id="idAjaxSelect_NM_filters_bot">
       <SELECT class="scFilterToolbar_obj" id="sel_recup_filters_bot" name="NM_filters_bot" onChange="nm_submit_filter(this, 'bot');" size="1">
           <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "           <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
           <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
       </SELECT>
     </span>
<?php
   }
?>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bedit_filter", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus();", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus();", "Ativa_save_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (is_file("historiRJ_help.txt"))
   {
      $Arq_WebHelp = file("historiRJ_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['historiRJ']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['historiRJ']['start'] == 'filter' && $nm_apl_dependente != 1)
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_bot" style="display:none;z-index:9999;">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "document.getElementById('Salvar_filters_bot').style.display = 'none';", "document.getElementById('Salvar_filters_bot').style.display = 'none';", "Cancel_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" id="SC_nmgp_save_name_bot" name="nmgp_save_name_bot" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar_appdiv", "nm_save_form('bot');", "nm_save_form('bot');", "Save_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_bot" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_bot">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_bot" name="NM_filters_del_bot" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir_appdiv", "nm_submit_filter_del('bot');", "nm_submit_filter_del('bot');", "Exc_filtro_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
     <?php
     }
     else
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "sc_b_pesq_bot", "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "limpa_form();", "limpa_form();", "limpa_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (!isset($this->nmgp_botoes['save']) || $this->nmgp_botoes['save'] == "on")
   {
       $this->NM_fil_ant = $this->gera_array_filtros();
?>
     <span id="idAjaxSelect_NM_filters_bot">
       <SELECT class="scFilterToolbar_obj" id="sel_recup_filters_bot" name="NM_filters_bot" onChange="nm_submit_filter(this, 'bot');" size="1">
           <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "           <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
           <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
       </SELECT>
     </span>
<?php
   }
?>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bedit_filter", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus();", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus();", "Ativa_save_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (is_file("historiRJ_help.txt"))
   {
      $Arq_WebHelp = file("historiRJ_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['historiRJ']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['historiRJ']['start'] == 'filter' && $nm_apl_dependente != 1)
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_bot" style="display:none;z-index:9999;">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "document.getElementById('Salvar_filters_bot').style.display = 'none';", "document.getElementById('Salvar_filters_bot').style.display = 'none';", "Cancel_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" id="SC_nmgp_save_name_bot" name="nmgp_save_name_bot" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar_appdiv", "nm_save_form('bot');", "nm_save_form('bot');", "Save_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_bot" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_bot">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_bot" name="NM_filters_del_bot" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir_appdiv", "nm_submit_filter_del('bot');", "nm_submit_filter_del('bot');", "Exc_filtro_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
     <?php
     }
 ?>
<?php
   }

   function monta_html_fim()
   {
       global $bprocessa, $nm_url_saida, $Script_BI;
?>

</TABLE>
   <INPUT type="hidden" name="form_condicao" value="3">
</FORM> 
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['historiRJ']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['historiRJ']['start'] == 'filter')
   {
?>
   <FORM style="display:none;" name="form_cancel"  method="POST" action="<?php echo $nm_url_saida; ?>" target="_self"> 
<?php
   }
   else
   {
?>
   <FORM style="display:none;" name="form_cancel"  method="POST" action="./" target="_self"> 
<?php
   }
?>
   <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
   <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<?php
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['orig_pesq'] == "grid")
   {
       $Ret_cancel_pesq = "volta_grid";
   }
   else
   {
       $Ret_cancel_pesq = "resumo";
   }
?>
   <INPUT type="hidden" name="nmgp_opcao" value="<?php echo $Ret_cancel_pesq; ?>"> 
   </FORM> 
 <form name="FCAP" action="" method="post" target="_blank"> 
   <input type="hidden" name="SC_lig_apl_orig" value="historiRJ"/>
   <input type="hidden" name="nmgp_url_saida" value=""> 
   <input type="hidden" name="nmgp_parms" value=""> 
   <input type="hidden" name="nmgp_outra_jan" value="true"> 
   <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
   <input type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
 </form> 
<SCRIPT type="text/javascript">
 function nm_submit_cap(apl_dest, parms)
 {
    document.FCAP.action = apl_dest;
    document.FCAP.nmgp_parms.value = parms;
    window.open('','jan_cap','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');
    document.FCAP.target = "jan_cap"; 
    document.FCAP.submit();
 }
<?php
   if (empty($this->NM_fil_ant))
   {
       if ($_SESSION['scriptcase']['proc_mobile'])
       {
?>
      document.getElementById('Apaga_filters_bot').style.display = 'none';
      document.getElementById('sel_recup_filters_bot').style.display = 'none';
<?php
       }
       else
       {
?>
      document.getElementById('Apaga_filters_bot').style.display = 'none';
      document.getElementById('sel_recup_filters_bot').style.display = 'none';
<?php
       }
   }
?>
 function nm_move()
 {
     document.form_cancel.target = "_self"; 
     document.form_cancel.action = "./"; 
     document.form_cancel.submit(); 
 }
 function nm_submit_form()
 {
    document.F1.submit();
 }
 function limpa_form()
 {
   document.F1.reset();
   if (document.F1.NM_filters)
   {
       document.F1.NM_filters.selectedIndex = -1;
   }
   document.getElementById('Salvar_filters_bot').style.display = 'none';
   document.F1.tglmasuk_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_tglmasuk'), document.F1.tglmasuk_cond, 'tglmasuk');
   document.F1.tglmasuk_dia.value = "";
   document.F1.tglmasuk_mes.value = "";
   document.F1.tglmasuk_ano.value = "";
   document.F1.tglmasuk_input_2_dia.value = "";
   document.F1.tglmasuk_input_2_mes.value = "";
   document.F1.tglmasuk_input_2_ano.value = "";
   document.F1.tglmasuk_hor.value = "";
   document.F1.tglmasuk_min.value = "";
   document.F1.tglmasuk_seg.value = "";
   document.F1.tglmasuk_input_2_hor.value = "";
   document.F1.tglmasuk_input_2_min.value = "";
   document.F1.tglmasuk_input_2_seg.value = "";
   document.F1.trancode_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_trancode'), document.F1.trancode_cond, 'trancode');
   document.F1.trancode.value = "";
   document.F1.trancode_autocomp.value = "";
   document.F1.poli_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_poli'), document.F1.poli_cond, 'poli');
   document.F1.poli.value = "";
   document.F1.poli_autocomp.value = "";
   document.F1.dokter_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_dokter'), document.F1.dokter_cond, 'dokter');
   document.F1.dokter.value = "";
   document.F1.dokter_autocomp.value = "";
   document.F1.selesai_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_selesai'), document.F1.selesai_cond, 'selesai');
   document.F1.selesai.value = "";
   document.F1.selesai_autocomp.value = "";
   document.F1.hta_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_hta'), document.F1.hta_cond, 'hta');
   document.F1.hta_dia.value = "";
   document.F1.hta_mes.value = "";
   document.F1.hta_ano.value = "";
   document.F1.hta_input_2_dia.value = "";
   document.F1.hta_input_2_mes.value = "";
   document.F1.hta_input_2_ano.value = "";
   document.F1.hta_hor.value = "";
   document.F1.hta_min.value = "";
   document.F1.hta_seg.value = "";
   document.F1.hta_input_2_hor.value = "";
   document.F1.hta_input_2_min.value = "";
   document.F1.hta_input_2_seg.value = "";
   document.F1.tglkeluar_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_tglkeluar'), document.F1.tglkeluar_cond, 'tglkeluar');
   document.F1.tglkeluar_dia.value = "";
   document.F1.tglkeluar_mes.value = "";
   document.F1.tglkeluar_ano.value = "";
   document.F1.tglkeluar_input_2_dia.value = "";
   document.F1.tglkeluar_input_2_mes.value = "";
   document.F1.tglkeluar_input_2_ano.value = "";
   document.F1.tglkeluar_hor.value = "";
   document.F1.tglkeluar_min.value = "";
   document.F1.tglkeluar_seg.value = "";
   document.F1.tglkeluar_input_2_hor.value = "";
   document.F1.tglkeluar_input_2_min.value = "";
   document.F1.tglkeluar_input_2_seg.value = "";
   document.F1.carakeluar_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_carakeluar'), document.F1.carakeluar_cond, 'carakeluar');
   document.F1.carakeluar.value = "";
   document.F1.carakeluar_autocomp.value = "";
   document.F1.alasankeluar_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_alasankeluar'), document.F1.alasankeluar_cond, 'alasankeluar');
   document.F1.alasankeluar.value = "";
   document.F1.alasankeluar_autocomp.value = "";
   document.F1.custcode_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_custcode'), document.F1.custcode_cond, 'custcode');
   document.F1.custcode.value = "";
   document.F1.custcode_autocomp.value = "";
   document.F1.nostruk_cond.value = 'gt';
   nm_campos_between(document.getElementById('id_vis_nostruk'), document.F1.nostruk_cond, 'nostruk');
   document.F1.nostruk.value = "";
   document.F1.nostruk_autocomp.value = "";
   document.F1.resikojatuh_cond.value = 'gt';
   nm_campos_between(document.getElementById('id_vis_resikojatuh'), document.F1.resikojatuh_cond, 'resikojatuh');
   document.F1.resikojatuh.value = "";
   document.F1.resikojatuh_autocomp.value = "";
   document.F1.diagnosa1_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_diagnosa1'), document.F1.diagnosa1_cond, 'diagnosa1');
   document.F1.diagnosa1.value = "";
   document.F1.diagnosa1_autocomp.value = "";
   document.F1.diagnosa2_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_diagnosa2'), document.F1.diagnosa2_cond, 'diagnosa2');
   document.F1.diagnosa2.value = "";
   document.F1.diagnosa2_autocomp.value = "";
   document.F1.icd1_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_icd1'), document.F1.icd1_cond, 'icd1');
   document.F1.icd1.value = "";
   document.F1.icd1_autocomp.value = "";
   document.F1.icd2_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_icd2'), document.F1.icd2_cond, 'icd2');
   document.F1.icd2.value = "";
   document.F1.icd2_autocomp.value = "";
 }
 function SC_carga_evt_jquery()
 {
    $('#SC_hta_dia').bind('change', function() {sc_historiRJ_valida_dia(this)});
    $('#SC_hta_hor').bind('change', function() {sc_historiRJ_valida_hora(this)});
    $('#SC_hta_input_2_dia').bind('change', function() {sc_historiRJ_valida_dia(this)});
    $('#SC_hta_input_2_hor').bind('change', function() {sc_historiRJ_valida_hora(this)});
    $('#SC_hta_input_2_mes').bind('change', function() {sc_historiRJ_valida_mes(this)});
    $('#SC_hta_input_2_min').bind('change', function() {sc_historiRJ_valida_min(this)});
    $('#SC_hta_input_2_seg').bind('change', function() {sc_historiRJ_valida_seg(this)});
    $('#SC_hta_mes').bind('change', function() {sc_historiRJ_valida_mes(this)});
    $('#SC_hta_min').bind('change', function() {sc_historiRJ_valida_min(this)});
    $('#SC_hta_seg').bind('change', function() {sc_historiRJ_valida_seg(this)});
    $('#SC_tglkeluar_dia').bind('change', function() {sc_historiRJ_valida_dia(this)});
    $('#SC_tglkeluar_hor').bind('change', function() {sc_historiRJ_valida_hora(this)});
    $('#SC_tglkeluar_input_2_dia').bind('change', function() {sc_historiRJ_valida_dia(this)});
    $('#SC_tglkeluar_input_2_hor').bind('change', function() {sc_historiRJ_valida_hora(this)});
    $('#SC_tglkeluar_input_2_mes').bind('change', function() {sc_historiRJ_valida_mes(this)});
    $('#SC_tglkeluar_input_2_min').bind('change', function() {sc_historiRJ_valida_min(this)});
    $('#SC_tglkeluar_input_2_seg').bind('change', function() {sc_historiRJ_valida_seg(this)});
    $('#SC_tglkeluar_mes').bind('change', function() {sc_historiRJ_valida_mes(this)});
    $('#SC_tglkeluar_min').bind('change', function() {sc_historiRJ_valida_min(this)});
    $('#SC_tglkeluar_seg').bind('change', function() {sc_historiRJ_valida_seg(this)});
    $('#SC_tglmasuk_dia').bind('change', function() {sc_historiRJ_valida_dia(this)});
    $('#SC_tglmasuk_hor').bind('change', function() {sc_historiRJ_valida_hora(this)});
    $('#SC_tglmasuk_input_2_dia').bind('change', function() {sc_historiRJ_valida_dia(this)});
    $('#SC_tglmasuk_input_2_hor').bind('change', function() {sc_historiRJ_valida_hora(this)});
    $('#SC_tglmasuk_input_2_mes').bind('change', function() {sc_historiRJ_valida_mes(this)});
    $('#SC_tglmasuk_input_2_min').bind('change', function() {sc_historiRJ_valida_min(this)});
    $('#SC_tglmasuk_input_2_seg').bind('change', function() {sc_historiRJ_valida_seg(this)});
    $('#SC_tglmasuk_mes').bind('change', function() {sc_historiRJ_valida_mes(this)});
    $('#SC_tglmasuk_min').bind('change', function() {sc_historiRJ_valida_min(this)});
    $('#SC_tglmasuk_seg').bind('change', function() {sc_historiRJ_valida_seg(this)});
 }
 function sc_historiRJ_valida_dia(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 31))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_iday'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_historiRJ_valida_mes(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 12))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mnth'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_historiRJ_valida_hora(obj)
 {
     if (obj.value != "" && (obj.value < 0 || obj.value > 23))
     {
         if (confirm (Nm_erro['lang_jscr_ivtm'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_historiRJ_valida_min(obj)
 {
     if (obj.value != "" && (obj.value < 0 || obj.value > 59))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mint'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_historiRJ_valida_seg(obj)
 {
     if (obj.value != "" && (obj.value < 0 || obj.value > 59))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_secd'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
   function process_hotkeys(hotkey)
   {
   return false;
   }
</SCRIPT>
</BODY>
</HTML>
<?php
   }

   function gera_array_filtros()
   {
       $this->NM_fil_ant = array();
       $NM_patch   = "simrskreatifmedia/historiRJ";
       if (is_dir($this->NM_path_filter . $NM_patch))
       {
           $NM_dir = @opendir($this->NM_path_filter . $NM_patch);
           while (FALSE !== ($NM_arq = @readdir($NM_dir)))
           {
             if (@is_file($this->NM_path_filter . $NM_patch . "/" . $NM_arq))
             {
                 $Sc_v6 = false;
                 $NMcmp_filter = file($this->NM_path_filter . $NM_patch . "/" . $NM_arq);
                 $NMcmp_filter = explode("@NMF@", $NMcmp_filter[0]);
                 if (substr($NMcmp_filter[0], 0, 6) == "SC_V6_" || substr($NMcmp_filter[0], 0, 6) == "SC_V8_")
                 {
                     $Name_filter = substr($NMcmp_filter[0], 6);
                     if (!empty($Name_filter))
                     {
                         $nmgp_save_name = str_replace('/', ' ', $Name_filter);
                         $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
                         $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
                         $this->NM_fil_ant[$Name_filter][0] = $NM_patch . "/" . $nmgp_save_name;
                         $this->NM_fil_ant[$Name_filter][1] = "" . $this->Ini->Nm_lang['lang_srch_public'] . "";
                         $Sc_v6 = true;
                     }
                 }
                 if (!$Sc_v6)
                 {
                     $this->NM_fil_ant[$NM_arq][0] = $NM_patch . "/" . $NM_arq;
                     $this->NM_fil_ant[$NM_arq][1] = "" . $this->Ini->Nm_lang['lang_srch_public'] . "";
                 }
             }
           }
       }
       return $this->NM_fil_ant;
   }
   /**
    * @access  public
    * @param  string  $NM_operador  $this->Ini->Nm_lang['pesq_global_NM_operador']
    * @param  array  $nmgp_tab_label  
    */
   function inicializa_vars()
   {
      global $NM_operador, $nmgp_tab_label;

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/");  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1);  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz;
      $this->Campos_Mens_erro = ""; 
      $this->nm_data = new nm_data("id");
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] = "";
      if ($this->NM_ajax_flag && ($this->NM_ajax_opcao == "ajax_grid_search" || $this->NM_ajax_opcao == "ajax_grid_search_change_fil"))
      {
          $nmgp_tab_label = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['pesq_tab_label'];
      }
      if (!empty($nmgp_tab_label))
      {
         $nm_tab_campos = explode("?@?", $nmgp_tab_label);
         $nmgp_tab_label = array();
         foreach ($nm_tab_campos as $cada_campo)
         {
             $parte_campo = explode("?#?", $cada_campo);
             $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
         }
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_orig']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_orig'] = "";
      }
      if ($this->NM_ajax_flag && ($this->NM_ajax_opcao == "ajax_grid_search" || $this->NM_ajax_opcao == "ajax_grid_search_change_fil"))
      {
          $this->comando = "";
      }
      else
      {
          $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_orig'];
      }
      $this->comando_sum    = "";
      $this->comando_filtro = "";
      $this->comando_ini    = "ini";
      $this->comando_fim    = "";
      $this->NM_operador    = (isset($NM_operador) && ("and" == strtolower($NM_operador) || "or" == strtolower($NM_operador))) ? $NM_operador : "and";
   }

   function salva_filtro($nmgp_save_origem)
   {
      global $NM_filters_save, $nmgp_save_name, $nmgp_save_option, $script_case_init;
          $NM_filters_save = str_replace("__NM_PLUS__", "+", $NM_filters_save);
          $NM_str_filter  = "SC_V8_" . $nmgp_save_name . "@NMF@";
          $nmgp_save_name = str_replace('/', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
          if (!NM_is_utf8($nmgp_save_name))
          {
              $nmgp_save_name = sc_convert_encoding($nmgp_save_name, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $NM_str_filter  .= $NM_filters_save;
          $NM_patch = $this->NM_path_filter;
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $NM_patch .= "simrskreatifmedia/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $NM_patch .= "historiRJ/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $Parms_usr  = "";
          $NM_filter = fopen ($NM_patch . $nmgp_save_name, 'w');
          if (!NM_is_utf8($NM_str_filter))
          {
              $NM_str_filter = sc_convert_encoding($NM_str_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          fwrite($NM_filter, $NM_str_filter);
          fclose($NM_filter);
   }
   function recupera_filtro($NM_filters)
   {
      global $NM_operador, $script_case_init;
      $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      if (!is_file($NM_patch))
      {
          $NM_filters = sc_convert_encoding($NM_filters, "UTF-8", $_SESSION['scriptcase']['charset']);
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      }
      $return_fields = array();
      $tp_fields     = array();
      $tb_fields_esp = array();
      $old_bi_opcs   = array("TP","HJ","OT","U7","SP","US","MM","UM","AM","PS","SS","P3","PM","P7","CY","LY","YY","M6","M3","M18","M24");
      $tp_fields['SC_tglmasuk_cond'] = 'cond';
      $tp_fields['SC_tglmasuk_dia'] = 'text';
      $tp_fields['SC_tglmasuk_mes'] = 'text';
      $tp_fields['SC_tglmasuk_ano'] = 'text';
      $tp_fields['SC_tglmasuk_input_2_dia'] = 'text';
      $tp_fields['SC_tglmasuk_input_2_mes'] = 'text';
      $tp_fields['SC_tglmasuk_input_2_ano'] = 'text';
      $tp_fields['SC_tglmasuk_hor'] = 'text';
      $tp_fields['SC_tglmasuk_min'] = 'text';
      $tp_fields['SC_tglmasuk_seg'] = 'text';
      $tp_fields['SC_tglmasuk_input_2_hor'] = 'text';
      $tp_fields['SC_tglmasuk_input_2_min'] = 'text';
      $tp_fields['SC_tglmasuk_input_2_seg'] = 'text';
      $tp_fields['SC_trancode_cond'] = 'cond';
      $tp_fields['SC_trancode'] = 'text_aut';
      $tp_fields['id_ac_trancode'] = 'text_aut';
      $tp_fields['SC_poli_cond'] = 'cond';
      $tp_fields['SC_poli'] = 'text_aut';
      $tp_fields['id_ac_poli'] = 'text_aut';
      $tp_fields['SC_dokter_cond'] = 'cond';
      $tp_fields['SC_dokter'] = 'text_aut';
      $tp_fields['id_ac_dokter'] = 'text_aut';
      $tp_fields['SC_selesai_cond'] = 'cond';
      $tp_fields['SC_selesai'] = 'text_aut';
      $tp_fields['id_ac_selesai'] = 'text_aut';
      $tp_fields['SC_hta_cond'] = 'cond';
      $tp_fields['SC_hta_dia'] = 'text';
      $tp_fields['SC_hta_mes'] = 'text';
      $tp_fields['SC_hta_ano'] = 'text';
      $tp_fields['SC_hta_input_2_dia'] = 'text';
      $tp_fields['SC_hta_input_2_mes'] = 'text';
      $tp_fields['SC_hta_input_2_ano'] = 'text';
      $tp_fields['SC_hta_hor'] = 'text';
      $tp_fields['SC_hta_min'] = 'text';
      $tp_fields['SC_hta_seg'] = 'text';
      $tp_fields['SC_hta_input_2_hor'] = 'text';
      $tp_fields['SC_hta_input_2_min'] = 'text';
      $tp_fields['SC_hta_input_2_seg'] = 'text';
      $tp_fields['SC_tglkeluar_cond'] = 'cond';
      $tp_fields['SC_tglkeluar_dia'] = 'text';
      $tp_fields['SC_tglkeluar_mes'] = 'text';
      $tp_fields['SC_tglkeluar_ano'] = 'text';
      $tp_fields['SC_tglkeluar_input_2_dia'] = 'text';
      $tp_fields['SC_tglkeluar_input_2_mes'] = 'text';
      $tp_fields['SC_tglkeluar_input_2_ano'] = 'text';
      $tp_fields['SC_tglkeluar_hor'] = 'text';
      $tp_fields['SC_tglkeluar_min'] = 'text';
      $tp_fields['SC_tglkeluar_seg'] = 'text';
      $tp_fields['SC_tglkeluar_input_2_hor'] = 'text';
      $tp_fields['SC_tglkeluar_input_2_min'] = 'text';
      $tp_fields['SC_tglkeluar_input_2_seg'] = 'text';
      $tp_fields['SC_carakeluar_cond'] = 'cond';
      $tp_fields['SC_carakeluar'] = 'text_aut';
      $tp_fields['id_ac_carakeluar'] = 'text_aut';
      $tp_fields['SC_alasankeluar_cond'] = 'cond';
      $tp_fields['SC_alasankeluar'] = 'text_aut';
      $tp_fields['id_ac_alasankeluar'] = 'text_aut';
      $tp_fields['SC_custcode_cond'] = 'cond';
      $tp_fields['SC_custcode'] = 'text_aut';
      $tp_fields['id_ac_custcode'] = 'text_aut';
      $tp_fields['SC_nostruk_cond'] = 'cond';
      $tp_fields['SC_nostruk'] = 'text_aut';
      $tp_fields['id_ac_nostruk'] = 'text_aut';
      $tp_fields['SC_resikojatuh_cond'] = 'cond';
      $tp_fields['SC_resikojatuh'] = 'text_aut';
      $tp_fields['id_ac_resikojatuh'] = 'text_aut';
      $tp_fields['SC_diagnosa1_cond'] = 'cond';
      $tp_fields['SC_diagnosa1'] = 'text_aut';
      $tp_fields['id_ac_diagnosa1'] = 'text_aut';
      $tp_fields['SC_diagnosa2_cond'] = 'cond';
      $tp_fields['SC_diagnosa2'] = 'text_aut';
      $tp_fields['id_ac_diagnosa2'] = 'text_aut';
      $tp_fields['SC_icd1_cond'] = 'cond';
      $tp_fields['SC_icd1'] = 'text_aut';
      $tp_fields['id_ac_icd1'] = 'text_aut';
      $tp_fields['SC_icd2_cond'] = 'cond';
      $tp_fields['SC_icd2'] = 'text_aut';
      $tp_fields['id_ac_icd2'] = 'text_aut';
      $tp_fields['SC_NM_operador'] = 'text';
      if (is_file($NM_patch))
      {
          $SC_V8    = false;
          $NMfilter = file($NM_patch);
          $NMcmp_filter = explode("@NMF@", $NMfilter[0]);
          if (substr($NMcmp_filter[0], 0, 5) == "SC_V8")
          {
              $SC_V8 = true;
          }
          if (substr($NMcmp_filter[0], 0, 5) == "SC_V6" || substr($NMcmp_filter[0], 0, 5) == "SC_V8")
          {
              unset($NMcmp_filter[0]);
          }
          foreach ($NMcmp_filter as $Cada_cmp)
          {
              $Cada_cmp = explode("#NMF#", $Cada_cmp);
              if (isset($tb_fields_esp[$Cada_cmp[0]]))
              {
                  $Cada_cmp[0] = $tb_fields_esp[$Cada_cmp[0]];
              }
              if (!$SC_V8 && substr($Cada_cmp[0], 0, 11) != "div_ac_lab_" && substr($Cada_cmp[0], 0, 6) != "id_ac_")
              {
                  $Cada_cmp[0] = "SC_" . $Cada_cmp[0];
              }
              if (!isset($tp_fields[$Cada_cmp[0]]))
              {
                  continue;
              }
              $list   = array();
              $list_a = array();
              if (substr($Cada_cmp[1], 0, 10) == "_NM_array_")
              {
                  if (substr($Cada_cmp[1], 0, 17) == "_NM_array_#NMARR#")
                  {
                      $Sc_temp = explode("#NMARR#", substr($Cada_cmp[1], 17));
                      foreach ($Sc_temp as $Cada_val)
                      {
                          $list[]   = $Cada_val;
                          $tmp_pos  = strpos($Cada_val, "##@@");
                          $val_a    = ($tmp_pos !== false) ?  substr($Cada_val, $tmp_pos + 4) : $Cada_val;
                          $list_a[] = array('opt' => $Cada_val, 'value' => $val_a);
                      }
                  }
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'dselect')
              {
                  $list[]   = $Cada_cmp[1];
                  $tmp_pos  = strpos($Cada_cmp[1], "##@@");
                  $val_a    = ($tmp_pos !== false) ?  substr($Cada_cmp[1], $tmp_pos + 4) : $Cada_cmp[1];
                  $list_a[] = array('opt' => $Cada_cmp[1], 'value' => $val_a);
              }
              else
              {
                  $list[0] = $Cada_cmp[1];
              }
              if ($tp_fields[$Cada_cmp[0]] == 'select2_aut')
              {
                  if (!isset($list[0]))
                  {
                      $list[0] = "";
                  }
                  $return_fields['set_select2_aut'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'dselect')
              {
                  $return_fields['set_dselect'][] = array('field' => $Cada_cmp[0], 'value' => $list_a);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'fil_order')
              {
                  $return_fields['set_fil_order'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'selmult')
              {
                  if (count($list) == 1 && $list[0] == "")
                  {
                      continue;
                  }
                  $return_fields['set_selmult'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'ddcheckbox')
              {
                  $return_fields['set_ddcheckbox'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'checkbox')
              {
                  $return_fields['set_checkbox'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              else
              {
                  if (!isset($list[0]))
                  {
                      $list[0] = "";
                  }
                  if ($tp_fields[$Cada_cmp[0]] == 'html')
                  {
                      $return_fields['set_html'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
                  }
                  elseif ($tp_fields[$Cada_cmp[0]] == 'radio')
                  {
                      $return_fields['set_radio'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
                  }
                  elseif ($tp_fields[$Cada_cmp[0]] == 'cond' && in_array($list[0], $old_bi_opcs))
                  {
                      $Cada_cmp[1] = "bi_" . $list[0];
                      $return_fields['set_val'][] = array('field' => $Cada_cmp[0], 'value' => $Cada_cmp[1]);
                  }
                  else
                  {
                      $return_fields['set_val'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
                  }
              }
          }
          $this->NM_curr_fil = $NM_filters;
      }
      return $return_fields;
   }
   function apaga_filtro()
   {
      global $NM_filters_del;
      if (isset($NM_filters_del) && !empty($NM_filters_del))
      { 
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          if (!is_file($NM_patch))
          {
              $NM_filters_del = sc_convert_encoding($NM_filters_del, "UTF-8", $_SESSION['scriptcase']['charset']);
              $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          }
          if (is_file($NM_patch))
          {
              @unlink($NM_patch);
          }
          if ($NM_filters_del == $this->NM_curr_fil)
          {
              $this->NM_curr_fil = "";
          }
      }
   }
   /**
    * @access  public
    */
   function trata_campos()
   {
      global $tglmasuk_cond, $tglmasuk, $tglmasuk_dia, $tglmasuk_mes, $tglmasuk_ano, $tglmasuk_hor, $tglmasuk_min, $tglmasuk_seg, $tglmasuk_input_2_dia, $tglmasuk_input_2_mes, $tglmasuk_input_2_ano, $tglmasuk_input_2_min, $tglmasuk_input_2_hor, $tglmasuk_input_2_seg,
             $trancode_cond, $trancode, $trancode_autocomp,
             $poli_cond, $poli, $poli_autocomp,
             $dokter_cond, $dokter, $dokter_autocomp,
             $selesai_cond, $selesai, $selesai_autocomp,
             $hta_cond, $hta, $hta_dia, $hta_mes, $hta_ano, $hta_hor, $hta_min, $hta_seg, $hta_input_2_dia, $hta_input_2_mes, $hta_input_2_ano, $hta_input_2_min, $hta_input_2_hor, $hta_input_2_seg,
             $tglkeluar_cond, $tglkeluar, $tglkeluar_dia, $tglkeluar_mes, $tglkeluar_ano, $tglkeluar_hor, $tglkeluar_min, $tglkeluar_seg, $tglkeluar_input_2_dia, $tglkeluar_input_2_mes, $tglkeluar_input_2_ano, $tglkeluar_input_2_min, $tglkeluar_input_2_hor, $tglkeluar_input_2_seg,
             $carakeluar_cond, $carakeluar, $carakeluar_autocomp,
             $alasankeluar_cond, $alasankeluar, $alasankeluar_autocomp,
             $custcode_cond, $custcode, $custcode_autocomp,
             $nostruk_cond, $nostruk, $nostruk_autocomp,
             $resikojatuh_cond, $resikojatuh, $resikojatuh_autocomp,
             $diagnosa1_cond, $diagnosa1, $diagnosa1_autocomp,
             $diagnosa2_cond, $diagnosa2, $diagnosa2_autocomp,
             $icd1_cond, $icd1, $icd1_autocomp,
             $icd2_cond, $icd2, $icd2_autocomp, $nmgp_tab_label;

      $C_formatado = true;
      if ($this->NM_ajax_flag && ($this->NM_ajax_opcao == "ajax_grid_search" || $this->NM_ajax_opcao == "ajax_grid_search_change_fil"))
      {
          if ($this->NM_ajax_opcao == "ajax_grid_search")
          {
              $C_formatado = false;
          }
          $Temp_Busca  = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && $this->NM_ajax_opcao != "ajax_grid_search_change_fil")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'] as $Cmps => $Vals)
          {
              $$Cmps = $Vals;
          }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq'] = array();
      if (!empty($trancode_autocomp) && empty($trancode))
      {
          $trancode = $trancode_autocomp;
      }
      if (!empty($poli_autocomp) && empty($poli))
      {
          $poli = $poli_autocomp;
      }
      if (!empty($dokter_autocomp) && empty($dokter))
      {
          $dokter = $dokter_autocomp;
      }
      if (!empty($selesai_autocomp) && empty($selesai))
      {
          $selesai = $selesai_autocomp;
      }
      if (!empty($carakeluar_autocomp) && empty($carakeluar))
      {
          $carakeluar = $carakeluar_autocomp;
      }
      if (!empty($alasankeluar_autocomp) && empty($alasankeluar))
      {
          $alasankeluar = $alasankeluar_autocomp;
      }
      if (!empty($custcode_autocomp) && empty($custcode))
      {
          $custcode = $custcode_autocomp;
      }
      if (!empty($nostruk_autocomp) && empty($nostruk))
      {
          $nostruk = $nostruk_autocomp;
      }
      if (!empty($resikojatuh_autocomp) && empty($resikojatuh))
      {
          $resikojatuh = $resikojatuh_autocomp;
      }
      if (!empty($diagnosa1_autocomp) && empty($diagnosa1))
      {
          $diagnosa1 = $diagnosa1_autocomp;
      }
      if (!empty($diagnosa2_autocomp) && empty($diagnosa2))
      {
          $diagnosa2 = $diagnosa2_autocomp;
      }
      if (!empty($icd1_autocomp) && empty($icd1))
      {
          $icd1 = $icd1_autocomp;
      }
      if (!empty($icd2_autocomp) && empty($icd2))
      {
          $icd2 = $icd2_autocomp;
      }
      $tglmasuk_cond_salva = $tglmasuk_cond; 
      if (!isset($tglmasuk_input_2_dia) || $tglmasuk_input_2_dia == "")
      {
          $tglmasuk_input_2_dia = $tglmasuk_dia;
      }
      if (!isset($tglmasuk_input_2_mes) || $tglmasuk_input_2_mes == "")
      {
          $tglmasuk_input_2_mes = $tglmasuk_mes;
      }
      if (!isset($tglmasuk_input_2_ano) || $tglmasuk_input_2_ano == "")
      {
          $tglmasuk_input_2_ano = $tglmasuk_ano;
      }
      if (!isset($tglmasuk_input_2_hor) || $tglmasuk_input_2_hor == "")
      {
          $tglmasuk_input_2_hor = $tglmasuk_hor;
      }
      if (!isset($tglmasuk_input_2_min) || $tglmasuk_input_2_min == "")
      {
          $tglmasuk_input_2_min = $tglmasuk_min;
      }
      if (!isset($tglmasuk_input_2_seg) || $tglmasuk_input_2_seg == "")
      {
          $tglmasuk_input_2_seg = $tglmasuk_seg;
      }
      $trancode_cond_salva = $trancode_cond; 
      if (!isset($trancode_input_2) || $trancode_input_2 == "")
      {
          $trancode_input_2 = $trancode;
      }
      $poli_cond_salva = $poli_cond; 
      if (!isset($poli_input_2) || $poli_input_2 == "")
      {
          $poli_input_2 = $poli;
      }
      $dokter_cond_salva = $dokter_cond; 
      if (!isset($dokter_input_2) || $dokter_input_2 == "")
      {
          $dokter_input_2 = $dokter;
      }
      $selesai_cond_salva = $selesai_cond; 
      if (!isset($selesai_input_2) || $selesai_input_2 == "")
      {
          $selesai_input_2 = $selesai;
      }
      $hta_cond_salva = $hta_cond; 
      if (!isset($hta_input_2_dia) || $hta_input_2_dia == "")
      {
          $hta_input_2_dia = $hta_dia;
      }
      if (!isset($hta_input_2_mes) || $hta_input_2_mes == "")
      {
          $hta_input_2_mes = $hta_mes;
      }
      if (!isset($hta_input_2_ano) || $hta_input_2_ano == "")
      {
          $hta_input_2_ano = $hta_ano;
      }
      if (!isset($hta_input_2_hor) || $hta_input_2_hor == "")
      {
          $hta_input_2_hor = $hta_hor;
      }
      if (!isset($hta_input_2_min) || $hta_input_2_min == "")
      {
          $hta_input_2_min = $hta_min;
      }
      if (!isset($hta_input_2_seg) || $hta_input_2_seg == "")
      {
          $hta_input_2_seg = $hta_seg;
      }
      $tglkeluar_cond_salva = $tglkeluar_cond; 
      if (!isset($tglkeluar_input_2_dia) || $tglkeluar_input_2_dia == "")
      {
          $tglkeluar_input_2_dia = $tglkeluar_dia;
      }
      if (!isset($tglkeluar_input_2_mes) || $tglkeluar_input_2_mes == "")
      {
          $tglkeluar_input_2_mes = $tglkeluar_mes;
      }
      if (!isset($tglkeluar_input_2_ano) || $tglkeluar_input_2_ano == "")
      {
          $tglkeluar_input_2_ano = $tglkeluar_ano;
      }
      if (!isset($tglkeluar_input_2_hor) || $tglkeluar_input_2_hor == "")
      {
          $tglkeluar_input_2_hor = $tglkeluar_hor;
      }
      if (!isset($tglkeluar_input_2_min) || $tglkeluar_input_2_min == "")
      {
          $tglkeluar_input_2_min = $tglkeluar_min;
      }
      if (!isset($tglkeluar_input_2_seg) || $tglkeluar_input_2_seg == "")
      {
          $tglkeluar_input_2_seg = $tglkeluar_seg;
      }
      $carakeluar_cond_salva = $carakeluar_cond; 
      if (!isset($carakeluar_input_2) || $carakeluar_input_2 == "")
      {
          $carakeluar_input_2 = $carakeluar;
      }
      $alasankeluar_cond_salva = $alasankeluar_cond; 
      if (!isset($alasankeluar_input_2) || $alasankeluar_input_2 == "")
      {
          $alasankeluar_input_2 = $alasankeluar;
      }
      $custcode_cond_salva = $custcode_cond; 
      if (!isset($custcode_input_2) || $custcode_input_2 == "")
      {
          $custcode_input_2 = $custcode;
      }
      $nostruk_cond_salva = $nostruk_cond; 
      if (!isset($nostruk_input_2) || $nostruk_input_2 == "")
      {
          $nostruk_input_2 = $nostruk;
      }
      $resikojatuh_cond_salva = $resikojatuh_cond; 
      if (!isset($resikojatuh_input_2) || $resikojatuh_input_2 == "")
      {
          $resikojatuh_input_2 = $resikojatuh;
      }
      $diagnosa1_cond_salva = $diagnosa1_cond; 
      if (!isset($diagnosa1_input_2) || $diagnosa1_input_2 == "")
      {
          $diagnosa1_input_2 = $diagnosa1;
      }
      $diagnosa2_cond_salva = $diagnosa2_cond; 
      if (!isset($diagnosa2_input_2) || $diagnosa2_input_2 == "")
      {
          $diagnosa2_input_2 = $diagnosa2;
      }
      $icd1_cond_salva = $icd1_cond; 
      if (!isset($icd1_input_2) || $icd1_input_2 == "")
      {
          $icd1_input_2 = $icd1;
      }
      $icd2_cond_salva = $icd2_cond; 
      if (!isset($icd2_input_2) || $icd2_input_2 == "")
      {
          $icd2_input_2 = $icd2;
      }
      if ($nostruk_cond != "in")
      {
          nm_limpa_numero($nostruk, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($resikojatuh_cond != "in")
      {
          nm_limpa_numero($resikojatuh, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search']  = array(); 
      $I_Grid = 0;
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_dia'] = $tglmasuk_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_mes'] = $tglmasuk_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_ano'] = $tglmasuk_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2_dia'] = $tglmasuk_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2_mes'] = $tglmasuk_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2_ano'] = $tglmasuk_input_2_ano; 
      if (!empty($tglmasuk_dia) || !empty($tglmasuk_mes) || !empty($tglmasuk_ano) || $tglmasuk_cond_salva == "nu" || $tglmasuk_cond_salva == "nn" || $tglmasuk_cond_salva == "ep" || $tglmasuk_cond_salva == "ne")
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "D:" . $tglmasuk_dia;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "M:" . $tglmasuk_mes;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "Y:" . $tglmasuk_ano;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "D:" . $tglmasuk_input_2_dia;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "M:" . $tglmasuk_input_2_mes;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "Y:" . $tglmasuk_input_2_ano;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_hor'] = $tglmasuk_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_min'] = $tglmasuk_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_seg'] = $tglmasuk_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2_hor'] = $tglmasuk_input_2_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2_min'] = $tglmasuk_input_2_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2_seg'] = $tglmasuk_input_2_seg; 
      if (!empty($tglmasuk_hor) || !empty($tglmasuk_min) || !empty($tglmasuk_seg) || $tglmasuk_cond_salva == "nu" || $tglmasuk_cond_salva == "nn" || $tglmasuk_cond_salva == "ep" || $tglmasuk_cond_salva == "ne")
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "H:" . $tglmasuk_hor;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "I:" . $tglmasuk_min;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "S:" . $tglmasuk_seg;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "H:" . $tglmasuk_input_2_hor;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "I:" . $tglmasuk_input_2_min;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "S:" . $tglmasuk_input_2_seg;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_cond'] = $tglmasuk_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "tglmasuk"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $tglmasuk_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['tglmasuk'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['trancode'] = $trancode; 
      if (is_array($trancode) && !empty($trancode))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $trancode;
      }
      elseif ($trancode_cond_salva == "nu" || $trancode_cond_salva == "nn" || $trancode_cond_salva == "ep" || $trancode_cond_salva == "ne" || !empty($trancode))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $trancode;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['trancode_cond'] = $trancode_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "trancode"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $trancode_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['trancode'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['poli'] = $poli; 
      if (is_array($poli) && !empty($poli))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $poli;
      }
      elseif ($poli_cond_salva == "nu" || $poli_cond_salva == "nn" || $poli_cond_salva == "ep" || $poli_cond_salva == "ne" || !empty($poli))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $poli;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['poli_cond'] = $poli_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "poli"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $poli_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['poli'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['dokter'] = $dokter; 
      if (is_array($dokter) && !empty($dokter))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $dokter;
      }
      elseif ($dokter_cond_salva == "nu" || $dokter_cond_salva == "nn" || $dokter_cond_salva == "ep" || $dokter_cond_salva == "ne" || !empty($dokter))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $dokter;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['dokter_cond'] = $dokter_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "dokter"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $dokter_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['dokter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['selesai'] = $selesai; 
      if (is_array($selesai) && !empty($selesai))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $selesai;
      }
      elseif ($selesai_cond_salva == "nu" || $selesai_cond_salva == "nn" || $selesai_cond_salva == "ep" || $selesai_cond_salva == "ne" || !empty($selesai))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $selesai;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['selesai_cond'] = $selesai_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "selesai"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $selesai_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['selesai'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_dia'] = $hta_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_mes'] = $hta_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_ano'] = $hta_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2_dia'] = $hta_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2_mes'] = $hta_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2_ano'] = $hta_input_2_ano; 
      if (!empty($hta_dia) || !empty($hta_mes) || !empty($hta_ano) || $hta_cond_salva == "nu" || $hta_cond_salva == "nn" || $hta_cond_salva == "ep" || $hta_cond_salva == "ne")
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "D:" . $hta_dia;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "M:" . $hta_mes;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "Y:" . $hta_ano;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "D:" . $hta_input_2_dia;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "M:" . $hta_input_2_mes;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "Y:" . $hta_input_2_ano;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_hor'] = $hta_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_min'] = $hta_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_seg'] = $hta_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2_hor'] = $hta_input_2_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2_min'] = $hta_input_2_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2_seg'] = $hta_input_2_seg; 
      if (!empty($hta_hor) || !empty($hta_min) || !empty($hta_seg) || $hta_cond_salva == "nu" || $hta_cond_salva == "nn" || $hta_cond_salva == "ep" || $hta_cond_salva == "ne")
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "H:" . $hta_hor;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "I:" . $hta_min;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "S:" . $hta_seg;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "H:" . $hta_input_2_hor;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "I:" . $hta_input_2_min;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "S:" . $hta_input_2_seg;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_cond'] = $hta_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "hta"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $hta_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['hta'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_dia'] = $tglkeluar_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_mes'] = $tglkeluar_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_ano'] = $tglkeluar_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2_dia'] = $tglkeluar_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2_mes'] = $tglkeluar_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2_ano'] = $tglkeluar_input_2_ano; 
      if (!empty($tglkeluar_dia) || !empty($tglkeluar_mes) || !empty($tglkeluar_ano) || $tglkeluar_cond_salva == "nu" || $tglkeluar_cond_salva == "nn" || $tglkeluar_cond_salva == "ep" || $tglkeluar_cond_salva == "ne")
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "D:" . $tglkeluar_dia;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "M:" . $tglkeluar_mes;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "Y:" . $tglkeluar_ano;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "D:" . $tglkeluar_input_2_dia;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "M:" . $tglkeluar_input_2_mes;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "Y:" . $tglkeluar_input_2_ano;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_hor'] = $tglkeluar_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_min'] = $tglkeluar_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_seg'] = $tglkeluar_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2_hor'] = $tglkeluar_input_2_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2_min'] = $tglkeluar_input_2_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2_seg'] = $tglkeluar_input_2_seg; 
      if (!empty($tglkeluar_hor) || !empty($tglkeluar_min) || !empty($tglkeluar_seg) || $tglkeluar_cond_salva == "nu" || $tglkeluar_cond_salva == "nn" || $tglkeluar_cond_salva == "ep" || $tglkeluar_cond_salva == "ne")
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "H:" . $tglkeluar_hor;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "I:" . $tglkeluar_min;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][] = "S:" . $tglkeluar_seg;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "H:" . $tglkeluar_input_2_hor;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "I:" . $tglkeluar_input_2_min;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][1][] = "S:" . $tglkeluar_input_2_seg;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_cond'] = $tglkeluar_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "tglkeluar"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $tglkeluar_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['tglkeluar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['carakeluar'] = $carakeluar; 
      if (is_array($carakeluar) && !empty($carakeluar))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $carakeluar;
      }
      elseif ($carakeluar_cond_salva == "nu" || $carakeluar_cond_salva == "nn" || $carakeluar_cond_salva == "ep" || $carakeluar_cond_salva == "ne" || !empty($carakeluar))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $carakeluar;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['carakeluar_cond'] = $carakeluar_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "carakeluar"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $carakeluar_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['carakeluar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['alasankeluar'] = $alasankeluar; 
      if (is_array($alasankeluar) && !empty($alasankeluar))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $alasankeluar;
      }
      elseif ($alasankeluar_cond_salva == "nu" || $alasankeluar_cond_salva == "nn" || $alasankeluar_cond_salva == "ep" || $alasankeluar_cond_salva == "ne" || !empty($alasankeluar))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $alasankeluar;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['alasankeluar_cond'] = $alasankeluar_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "alasankeluar"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $alasankeluar_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['alasankeluar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['custcode'] = $custcode; 
      if (is_array($custcode) && !empty($custcode))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $custcode;
      }
      elseif ($custcode_cond_salva == "nu" || $custcode_cond_salva == "nn" || $custcode_cond_salva == "ep" || $custcode_cond_salva == "ne" || !empty($custcode))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $custcode;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['custcode_cond'] = $custcode_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "custcode"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $custcode_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['custcode'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['nostruk'] = $nostruk; 
      if (is_array($nostruk) && !empty($nostruk))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $nostruk;
      }
      elseif ($nostruk_cond_salva == "nu" || $nostruk_cond_salva == "nn" || $nostruk_cond_salva == "ep" || $nostruk_cond_salva == "ne" || !empty($nostruk))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $nostruk;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['nostruk_cond'] = $nostruk_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "nostruk"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $nostruk_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['nostruk'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['resikojatuh'] = $resikojatuh; 
      if (is_array($resikojatuh) && !empty($resikojatuh))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $resikojatuh;
      }
      elseif ($resikojatuh_cond_salva == "nu" || $resikojatuh_cond_salva == "nn" || $resikojatuh_cond_salva == "ep" || $resikojatuh_cond_salva == "ne" || !empty($resikojatuh))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $resikojatuh;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['resikojatuh_cond'] = $resikojatuh_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "resikojatuh"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $resikojatuh_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['resikojatuh'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['diagnosa1'] = $diagnosa1; 
      if (is_array($diagnosa1) && !empty($diagnosa1))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $diagnosa1;
      }
      elseif ($diagnosa1_cond_salva == "nu" || $diagnosa1_cond_salva == "nn" || $diagnosa1_cond_salva == "ep" || $diagnosa1_cond_salva == "ne" || !empty($diagnosa1))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $diagnosa1;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['diagnosa1_cond'] = $diagnosa1_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "diagnosa1"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $diagnosa1_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['diagnosa1'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['diagnosa2'] = $diagnosa2; 
      if (is_array($diagnosa2) && !empty($diagnosa2))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $diagnosa2;
      }
      elseif ($diagnosa2_cond_salva == "nu" || $diagnosa2_cond_salva == "nn" || $diagnosa2_cond_salva == "ep" || $diagnosa2_cond_salva == "ne" || !empty($diagnosa2))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $diagnosa2;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['diagnosa2_cond'] = $diagnosa2_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "diagnosa2"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $diagnosa2_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['diagnosa2'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['icd1'] = $icd1; 
      if (is_array($icd1) && !empty($icd1))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $icd1;
      }
      elseif ($icd1_cond_salva == "nu" || $icd1_cond_salva == "nn" || $icd1_cond_salva == "ep" || $icd1_cond_salva == "ne" || !empty($icd1))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $icd1;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['icd1_cond'] = $icd1_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "icd1"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $icd1_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['icd1'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['icd2'] = $icd2; 
      if (is_array($icd2) && !empty($icd2))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0] = $icd2;
      }
      elseif ($icd2_cond_salva == "nu" || $icd2_cond_salva == "nn" || $icd2_cond_salva == "ep" || $icd2_cond_salva == "ne" || !empty($icd2))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['val'][0][0] = $icd2;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['icd2_cond'] = $icd2_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['cmp'] = "icd2"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid]['opc'] = $icd2_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['icd2'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['NM_operador'] = $this->NM_operador; 
      if ($this->NM_ajax_flag && $this->NM_ajax_opcao == "ajax_grid_search")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'] = $Temp_Busca;
      }
      if ($nostruk_cond != "in" && $nostruk_cond != "bw" && !empty($nostruk) && !is_numeric($nostruk))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : No Struk";
      }
      if ($nostruk_cond == "bw" && ((!empty($nostruk) && !is_numeric($nostruk)) || (!empty($nostruk_input_2) && !is_numeric($nostruk_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : No Struk";
      }
      if ($resikojatuh_cond != "in" && $resikojatuh_cond != "bw" && !empty($resikojatuh) && !is_numeric($resikojatuh))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Resiko Jatuh";
      }
      if ($resikojatuh_cond == "bw" && ((!empty($resikojatuh) && !is_numeric($resikojatuh)) || (!empty($resikojatuh_input_2) && !is_numeric($resikojatuh_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Resiko Jatuh";
      }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      $trancode_look = substr($this->Db->qstr($trancode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.tranCode from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.tranCode = '$trancode_look' order by a.tranCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['trancode'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['trancode'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['trancode'] = $trancode;
      }
      $poli_look = substr($this->Db->qstr($poli), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct b.poly from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and b.poly = '$poli_look' order by b.poly"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['poli'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['poli'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['poli'] = $poli;
      }
      $dokter_look = substr($this->Db->qstr($dokter), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.dokter from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.dokter = '$dokter_look' order by a.dokter"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['dokter'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['dokter'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['dokter'] = $dokter;
      }
      $selesai_look = substr($this->Db->qstr($selesai), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.selesai from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.selesai = '$selesai_look' order by a.selesai"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['selesai'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['selesai'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['selesai'] = $selesai;
      }
      $carakeluar_look = substr($this->Db->qstr($carakeluar), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.caraKeluar from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.caraKeluar = '$carakeluar_look' order by a.caraKeluar"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['carakeluar'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['carakeluar'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['carakeluar'] = $carakeluar;
      }
      $alasankeluar_look = substr($this->Db->qstr($alasankeluar), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.alasanKeluar from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.alasanKeluar = '$alasankeluar_look' order by a.alasanKeluar"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['alasankeluar'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['alasankeluar'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['alasankeluar'] = $alasankeluar;
      }
      $custcode_look = substr($this->Db->qstr($custcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.custCode from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.custCode = '$custcode_look' order by a.custCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['custcode'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['custcode'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['custcode'] = $custcode;
      }
      $nostruk_look = substr($this->Db->qstr($nostruk), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($nostruk))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct a.noStruk from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.noStruk = $nostruk_look order by a.noStruk"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct a.noStruk from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.noStruk = $nostruk_look order by a.noStruk"; 
      }
      else
      {
          $nm_comando = "select distinct a.noStruk from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.noStruk = $nostruk_look order by a.noStruk"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['nostruk'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['nostruk'] = $cmp1;
      }
      else
      {
          $cmp1 = $nostruk;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['nostruk'] = $cmp1;
      }
      $resikojatuh_look = substr($this->Db->qstr($resikojatuh), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($resikojatuh))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct a.resikoJatuh from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.resikoJatuh = $resikojatuh_look order by a.resikoJatuh"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct a.resikoJatuh from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.resikoJatuh = $resikojatuh_look order by a.resikoJatuh"; 
      }
      else
      {
          $nm_comando = "select distinct a.resikoJatuh from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.resikoJatuh = $resikojatuh_look order by a.resikoJatuh"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['resikojatuh'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['resikojatuh'] = $cmp1;
      }
      else
      {
          $cmp1 = $resikojatuh;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['resikojatuh'] = $cmp1;
      }
      $diagnosa1_look = substr($this->Db->qstr($diagnosa1), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.diagnosa1 from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.diagnosa1 = '$diagnosa1_look' order by a.diagnosa1"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['diagnosa1'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['diagnosa1'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['diagnosa1'] = $diagnosa1;
      }
      $diagnosa2_look = substr($this->Db->qstr($diagnosa2), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.diagnosa2 from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.diagnosa2 = '$diagnosa2_look' order by a.diagnosa2"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['diagnosa2'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['diagnosa2'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['diagnosa2'] = $diagnosa2;
      }
      $icd1_look = substr($this->Db->qstr($icd1), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.icd1 from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.icd1 = '$icd1_look' order by a.icd1"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['icd1'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['icd1'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['icd1'] = $icd1;
      }
      $icd2_look = substr($this->Db->qstr($icd2), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct a.icd2 from " . $this->Ini->nm_tabela . " where a.custCode = '" . $_SESSION['var_RMRJ'] . "' and a.icd2 = '$icd2_look' order by a.icd2"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['icd2'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['icd2'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['icd2'] = $icd2;
      }

      //----- $tglmasuk
      $this->Date_part = false;
      if ($tglmasuk_cond != "bi_TP")
      {
          $tglmasuk_cond = strtoupper($tglmasuk_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $tglmasuk_ano;
          $Dtxt .= $tglmasuk_mes;
          $Dtxt .= $tglmasuk_dia;
          $Dtxt .= $tglmasuk_hor;
          $Dtxt .= $tglmasuk_min;
          $Dtxt .= $tglmasuk_seg;
          $val[0]['ano'] = $tglmasuk_ano;
          $val[0]['mes'] = $tglmasuk_mes;
          $val[0]['dia'] = $tglmasuk_dia;
          $val[0]['hor'] = $tglmasuk_hor;
          $val[0]['min'] = $tglmasuk_min;
          $val[0]['seg'] = $tglmasuk_seg;
          if ($tglmasuk_cond == "BW")
          {
              $val[1]['ano'] = $tglmasuk_input_2_ano;
              $val[1]['mes'] = $tglmasuk_input_2_mes;
              $val[1]['dia'] = $tglmasuk_input_2_dia;
              $val[1]['hor'] = $tglmasuk_input_2_hor;
              $val[1]['min'] = $tglmasuk_input_2_min;
              $val[1]['seg'] = $tglmasuk_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "DATETIME", $tglmasuk_cond, "", "datahora");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $tglmasuk = $val[0];
          $this->cmp_formatado['tglmasuk'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['tglmasuk'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['tglmasuk'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          if ($tglmasuk_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $tglmasuk_input_2     = $val[1];
              $this->cmp_formatado['tglmasuk_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglmasuk_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['tglmasuk_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['tglmasuk_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          }
          if (!empty($Dtxt) || $tglmasuk_cond == "NU" || $tglmasuk_cond == "NN"|| $tglmasuk_cond == "EP"|| $tglmasuk_cond == "NE")
          {
              $this->monta_condicao("b.regDate", $tglmasuk_cond, $tglmasuk, $tglmasuk_input_2, 'tglmasuk', 'DATETIME');
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['tglmasuk']['label'] = $nmgp_tab_label['tglmasuk'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['tglmasuk']['descr'] = $nmgp_tab_label['tglmasuk'] . " " . $this->Ini->Nm_lang['lang_srch_ever'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['tglmasuk']['hint']  = $nmgp_tab_label['tglmasuk'] . " " . $this->Ini->Nm_lang['lang_srch_ever'];
      }

      //----- $trancode
      $this->Date_part = false;
      if (isset($trancode) || $trancode_cond == "nu" || $trancode_cond == "nn" || $trancode_cond == "ep" || $trancode_cond == "ne")
      {
         $this->monta_condicao("a.tranCode", $trancode_cond, $trancode, "", "trancode");
      }

      //----- $poli
      $this->Date_part = false;
      if (isset($poli) || $poli_cond == "nu" || $poli_cond == "nn" || $poli_cond == "ep" || $poli_cond == "ne")
      {
         $this->monta_condicao("b.poly", $poli_cond, $poli, "", "poli");
      }

      //----- $dokter
      $this->Date_part = false;
      if (isset($dokter) || $dokter_cond == "nu" || $dokter_cond == "nn" || $dokter_cond == "ep" || $dokter_cond == "ne")
      {
         $this->monta_condicao("a.dokter", $dokter_cond, $dokter, "", "dokter");
      }

      //----- $selesai
      $this->Date_part = false;
      if (isset($selesai) || $selesai_cond == "nu" || $selesai_cond == "nn" || $selesai_cond == "ep" || $selesai_cond == "ne")
      {
         $this->monta_condicao("a.selesai", $selesai_cond, $selesai, "", "selesai");
      }

      //----- $hta
      $this->Date_part = false;
      if ($hta_cond != "bi_TP")
      {
          $hta_cond = strtoupper($hta_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $hta_ano;
          $Dtxt .= $hta_mes;
          $Dtxt .= $hta_dia;
          $Dtxt .= $hta_hor;
          $Dtxt .= $hta_min;
          $Dtxt .= $hta_seg;
          $val[0]['ano'] = $hta_ano;
          $val[0]['mes'] = $hta_mes;
          $val[0]['dia'] = $hta_dia;
          $val[0]['hor'] = $hta_hor;
          $val[0]['min'] = $hta_min;
          $val[0]['seg'] = $hta_seg;
          if ($hta_cond == "BW")
          {
              $val[1]['ano'] = $hta_input_2_ano;
              $val[1]['mes'] = $hta_input_2_mes;
              $val[1]['dia'] = $hta_input_2_dia;
              $val[1]['hor'] = $hta_input_2_hor;
              $val[1]['min'] = $hta_input_2_min;
              $val[1]['seg'] = $hta_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "DATETIME", $hta_cond, "", "datahora");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $hta = $val[0];
          $this->cmp_formatado['hta'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['hta'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['hta'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          if ($hta_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $hta_input_2     = $val[1];
              $this->cmp_formatado['hta_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['hta_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['hta_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['hta_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          }
          if (!empty($Dtxt) || $hta_cond == "NU" || $hta_cond == "NN"|| $hta_cond == "EP"|| $hta_cond == "NE")
          {
              $this->monta_condicao("b.hta", $hta_cond, $hta, $hta_input_2, 'hta', 'DATETIME');
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['hta']['label'] = $nmgp_tab_label['hta'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['hta']['descr'] = $nmgp_tab_label['hta'] . " " . $this->Ini->Nm_lang['lang_srch_ever'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['hta']['hint']  = $nmgp_tab_label['hta'] . " " . $this->Ini->Nm_lang['lang_srch_ever'];
      }

      //----- $tglkeluar
      $this->Date_part = false;
      if ($tglkeluar_cond != "bi_TP")
      {
          $tglkeluar_cond = strtoupper($tglkeluar_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $tglkeluar_ano;
          $Dtxt .= $tglkeluar_mes;
          $Dtxt .= $tglkeluar_dia;
          $Dtxt .= $tglkeluar_hor;
          $Dtxt .= $tglkeluar_min;
          $Dtxt .= $tglkeluar_seg;
          $val[0]['ano'] = $tglkeluar_ano;
          $val[0]['mes'] = $tglkeluar_mes;
          $val[0]['dia'] = $tglkeluar_dia;
          $val[0]['hor'] = $tglkeluar_hor;
          $val[0]['min'] = $tglkeluar_min;
          $val[0]['seg'] = $tglkeluar_seg;
          if ($tglkeluar_cond == "BW")
          {
              $val[1]['ano'] = $tglkeluar_input_2_ano;
              $val[1]['mes'] = $tglkeluar_input_2_mes;
              $val[1]['dia'] = $tglkeluar_input_2_dia;
              $val[1]['hor'] = $tglkeluar_input_2_hor;
              $val[1]['min'] = $tglkeluar_input_2_min;
              $val[1]['seg'] = $tglkeluar_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "DATETIME", $tglkeluar_cond, "", "datahora");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $tglkeluar = $val[0];
          $this->cmp_formatado['tglkeluar'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['tglkeluar'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['tglkeluar'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          if ($tglkeluar_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $tglkeluar_input_2     = $val[1];
              $this->cmp_formatado['tglkeluar_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']['tglkeluar_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['tglkeluar_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['tglkeluar_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          }
          if (!empty($Dtxt) || $tglkeluar_cond == "NU" || $tglkeluar_cond == "NN"|| $tglkeluar_cond == "EP"|| $tglkeluar_cond == "NE")
          {
              $this->monta_condicao("a.tglKeluar", $tglkeluar_cond, $tglkeluar, $tglkeluar_input_2, 'tglkeluar', 'DATETIME');
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['tglkeluar']['label'] = $nmgp_tab_label['tglkeluar'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['tglkeluar']['descr'] = $nmgp_tab_label['tglkeluar'] . " " . $this->Ini->Nm_lang['lang_srch_ever'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['grid_pesq']['tglkeluar']['hint']  = $nmgp_tab_label['tglkeluar'] . " " . $this->Ini->Nm_lang['lang_srch_ever'];
      }

      //----- $carakeluar
      $this->Date_part = false;
      if (isset($carakeluar) || $carakeluar_cond == "nu" || $carakeluar_cond == "nn" || $carakeluar_cond == "ep" || $carakeluar_cond == "ne")
      {
         $this->monta_condicao("a.caraKeluar", $carakeluar_cond, $carakeluar, "", "carakeluar");
      }

      //----- $alasankeluar
      $this->Date_part = false;
      if (isset($alasankeluar) || $alasankeluar_cond == "nu" || $alasankeluar_cond == "nn" || $alasankeluar_cond == "ep" || $alasankeluar_cond == "ne")
      {
         $this->monta_condicao("a.alasanKeluar", $alasankeluar_cond, $alasankeluar, "", "alasankeluar");
      }

      //----- $custcode
      $this->Date_part = false;
      if (isset($custcode) || $custcode_cond == "nu" || $custcode_cond == "nn" || $custcode_cond == "ep" || $custcode_cond == "ne")
      {
         $this->monta_condicao("a.custCode", $custcode_cond, $custcode, "", "custcode");
      }

      //----- $nostruk
      $this->Date_part = false;
      if (isset($nostruk) || $nostruk_cond == "nu" || $nostruk_cond == "nn" || $nostruk_cond == "ep" || $nostruk_cond == "ne")
      {
         $this->monta_condicao("a.noStruk", $nostruk_cond, $nostruk, "", "nostruk");
      }

      //----- $resikojatuh
      $this->Date_part = false;
      if (isset($resikojatuh) || $resikojatuh_cond == "nu" || $resikojatuh_cond == "nn" || $resikojatuh_cond == "ep" || $resikojatuh_cond == "ne")
      {
         $this->monta_condicao("a.resikoJatuh", $resikojatuh_cond, $resikojatuh, "", "resikojatuh");
      }

      //----- $diagnosa1
      $this->Date_part = false;
      if (isset($diagnosa1) || $diagnosa1_cond == "nu" || $diagnosa1_cond == "nn" || $diagnosa1_cond == "ep" || $diagnosa1_cond == "ne")
      {
         $this->monta_condicao("a.diagnosa1", $diagnosa1_cond, $diagnosa1, "", "diagnosa1");
      }

      //----- $diagnosa2
      $this->Date_part = false;
      if (isset($diagnosa2) || $diagnosa2_cond == "nu" || $diagnosa2_cond == "nn" || $diagnosa2_cond == "ep" || $diagnosa2_cond == "ne")
      {
         $this->monta_condicao("a.diagnosa2", $diagnosa2_cond, $diagnosa2, "", "diagnosa2");
      }

      //----- $icd1
      $this->Date_part = false;
      if (isset($icd1) || $icd1_cond == "nu" || $icd1_cond == "nn" || $icd1_cond == "ep" || $icd1_cond == "ne")
      {
         $this->monta_condicao("a.icd1", $icd1_cond, $icd1, "", "icd1");
      }

      //----- $icd2
      $this->Date_part = false;
      if (isset($icd2) || $icd2_cond == "nu" || $icd2_cond == "nn" || $icd2_cond == "ep" || $icd2_cond == "ne")
      {
         $this->monta_condicao("a.icd2", $icd2_cond, $icd2, "", "icd2");
      }
   }

   /**
    * @access  public
    */
   function finaliza_resultado_ajax()
   {
       $this->comando = substr($this->comando, 8);
       $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_grid'] = $this->comando;
       if (empty($this->comando)) 
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_filtro'] = "";
           $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_orig'];
       }
       else
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_filtro'] = "( " . $this->comando . " )";
           if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_orig'])) 
           {
               $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_orig'] . " and (" . $this->comando . ")"; 
           }
           else
           {
               $this->comando = " where " . $this->comando; 
           }
           $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq'] = $this->comando;
       }
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_fast'])) 
       {
           if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq'])) 
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq'] .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_fast'] . ")";
           }
           else 
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq'] = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_fast'] . ")";
           }
       }
   }
   function finaliza_resultado()
   {
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['dyn_search']      = array();
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_dyn_search'] = "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_fast'] = "";
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['fast_search']);
      if ("" == $this->comando_filtro)
      {
          $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_orig'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca']) && $_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['campos_busca'], "UTF-8", $_SESSION['scriptcase']['charset']);
      }

      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_grid']    = $this->comando_filtro;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['opcao']              = "pesq";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_ant'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['historiRJ']['where_pesq'];

      if ($this->NM_ajax_flag && ($this->NM_ajax_opcao == "ajax_grid_search" || $this->NM_ajax_opcao == "ajax_grid_search_change_fil"))
      {
         return;
      }
      $this->retorna_pesq();
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
}

?>
