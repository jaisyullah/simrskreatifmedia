<?php

class grid_tbinstansi_pesq
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['path_libs_php'] = $this->Ini->path_lib_php;
      $this->Img_sep_filter = "/" . trim($str_toolbar_separator);
      $this->Block_img_col  = trim($str_block_col);
      $this->Block_img_exp  = trim($str_block_exp);
      $this->Bubble_tail    = trim($str_bubble_tail);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput"); 
      $this->NM_case_insensitive = false;
      $this->init();
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['opcao'] = "igual";
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
                  $Opt_filter .= "<option value=\"\">" . grid_tbinstansi_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_tbinstansi_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_tbinstansi_pack_protect_string($Cada_filter) .  "</option>\r\n";
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
                  $Opt_filter .= "<option value=\"\">" .  grid_tbinstansi_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_tbinstansi_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_tbinstansi_pack_protect_string($Cada_filter) .  "</option>\r\n";
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

      if ($this->NM_ajax_opcao == 'autocomp_address')
      {
          $address = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_address($address);
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
      if ($this->NM_ajax_opcao == 'autocomp_instcode')
      {
          $instcode = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_instcode($instcode);
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
      if ($this->NM_ajax_opcao == 'autocomp_init')
      {
          $init = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_init($init);
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
      if ($this->NM_ajax_opcao == 'autocomp_name')
      {
          $name = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_name($name);
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
      if ($this->NM_ajax_opcao == 'autocomp_city')
      {
          $city = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_city($city);
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
      if ($this->NM_ajax_opcao == 'autocomp_phone')
      {
          $phone = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_phone($phone);
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
      if ($this->NM_ajax_opcao == 'autocomp_fax')
      {
          $fax = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_fax($fax);
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
      if ($this->NM_ajax_opcao == 'autocomp_cp')
      {
          $cp = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_cp($cp);
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
      if ($this->NM_ajax_opcao == 'autocomp_limit')
      {
          $limit = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_limit($limit);
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
      if ($this->NM_ajax_opcao == 'autocomp_discount')
      {
          $discount = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_discount($discount);
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
      if ($this->NM_ajax_opcao == 'autocomp_policy')
      {
          $policy = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_policy($policy);
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
      if ($this->NM_ajax_opcao == 'autocomp_itemtype')
      {
          $itemtype = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_itemtype($itemtype);
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
      if ($this->NM_ajax_opcao == 'autocomp_deleted')
      {
          $deleted = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_deleted($deleted);
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
      if ($this->NM_ajax_opcao == 'autocomp_tempo')
      {
          $tempo = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_tempo($tempo);
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
      if ($this->NM_ajax_opcao == 'autocomp_asuransi')
      {
          $asuransi = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_asuransi($asuransi);
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
      if ($this->NM_ajax_opcao == 'autocomp_marginobat')
      {
          $marginobat = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_marginobat($marginobat);
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
      if ($this->NM_ajax_opcao == 'autocomp_markuptindakan')
      {
          $markuptindakan = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_markuptindakan($markuptindakan);
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
      if ($this->NM_ajax_opcao == 'autocomp_markupobat')
      {
          $markupobat = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_markupobat($markupobat);
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
      if ($this->NM_ajax_opcao == 'autocomp_markuplab')
      {
          $markuplab = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_markuplab($markuplab);
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
      if ($this->NM_ajax_opcao == 'autocomp_markuprad')
      {
          $markuprad = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_markuprad($markuprad);
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
      if ($this->NM_ajax_opcao == 'autocomp_admpolitype')
      {
          $admpolitype = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_admpolitype($admpolitype);
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
      if ($this->NM_ajax_opcao == 'autocomp_adminaptype')
      {
          $adminaptype = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_adminaptype($adminaptype);
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
      if ($this->NM_ajax_opcao == 'autocomp_admpolibaru')
      {
          $admpolibaru = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_admpolibaru($admpolibaru);
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
      if ($this->NM_ajax_opcao == 'autocomp_admpolilama')
      {
          $admpolilama = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_admpolilama($admpolilama);
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
      if ($this->NM_ajax_opcao == 'autocomp_adminap')
      {
          $adminap = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_adminap($adminap);
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
      if ($this->NM_ajax_opcao == 'autocomp_marginpma')
      {
          $marginpma = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_marginpma($marginpma);
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
      if ($this->NM_ajax_opcao == 'autocomp_withpma')
      {
          $withpma = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_withpma($withpma);
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
      if ($this->NM_ajax_opcao == 'autocomp_forminternal')
      {
          $forminternal = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_forminternal($forminternal);
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
      if ($this->NM_ajax_opcao == 'autocomp_vacc')
      {
          $vacc = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_vacc($vacc);
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
      if ($this->NM_ajax_opcao == 'autocomp_extcode')
      {
          $extcode = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_extcode($extcode);
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
      if ($this->NM_ajax_opcao == 'autocomp_umum')
      {
          $umum = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_umum($umum);
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
      if ($this->NM_ajax_opcao == 'autocomp_autoshow')
      {
          $autoshow = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_autoshow($autoshow);
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
      if ($this->NM_ajax_opcao == 'autocomp_bpjs')
      {
          $bpjs = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_bpjs($bpjs);
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
      if ($this->NM_ajax_opcao == 'autocomp_caracode')
      {
          $caracode = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_caracode($caracode);
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
   function lookup_ajax_address($address)
   {
      $address = substr($this->Db->qstr($address), 1, -1);
            $address_look = substr($this->Db->qstr($address), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct address from " . $this->Ini->nm_tabela . " where  address like '%" . $address . "%' order by address"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_instcode($instcode)
   {
      $instcode = substr($this->Db->qstr($instcode), 1, -1);
            $instcode_look = substr($this->Db->qstr($instcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct instCode from " . $this->Ini->nm_tabela . " where  instCode like '%" . $instcode . "%' order by instCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_init($init)
   {
      $init = substr($this->Db->qstr($init), 1, -1);
            $init_look = substr($this->Db->qstr($init), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct init from " . $this->Ini->nm_tabela . " where  init like '%" . $init . "%' order by init"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_name($name)
   {
      $name = substr($this->Db->qstr($name), 1, -1);
            $name_look = substr($this->Db->qstr($name), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct name from " . $this->Ini->nm_tabela . " where  name like '%" . $name . "%' order by name"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_city($city)
   {
      $city = substr($this->Db->qstr($city), 1, -1);
            $city_look = substr($this->Db->qstr($city), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct city from " . $this->Ini->nm_tabela . " where  city like '%" . $city . "%' order by city"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_phone($phone)
   {
      $phone = substr($this->Db->qstr($phone), 1, -1);
            $phone_look = substr($this->Db->qstr($phone), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct phone from " . $this->Ini->nm_tabela . " where  phone like '%" . $phone . "%' order by phone"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_fax($fax)
   {
      $fax = substr($this->Db->qstr($fax), 1, -1);
            $fax_look = substr($this->Db->qstr($fax), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct fax from " . $this->Ini->nm_tabela . " where  fax like '%" . $fax . "%' order by fax"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_cp($cp)
   {
      $cp = substr($this->Db->qstr($cp), 1, -1);
            $cp_look = substr($this->Db->qstr($cp), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct cp from " . $this->Ini->nm_tabela . " where  cp like '%" . $cp . "%' order by cp"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_limit($limit)
   {
      $limit = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $limit);
      $limit = str_replace($_SESSION['scriptcase']['reg_conf']['dec_num'], ".", $limit);
      $limit = substr($this->Db->qstr($limit), 1, -1);
            $limit_look = substr($this->Db->qstr($limit), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct `limit` from " . $this->Ini->nm_tabela . " where   CAST (`limit` AS TEXT)  like '%" . $limit . "%' order by `limit`"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct `limit` from " . $this->Ini->nm_tabela . " where   CAST (`limit` AS VARCHAR)  like '%" . $limit . "%' order by `limit`"; 
      }
      else
      {
          $nm_comando = "select distinct `limit` from " . $this->Ini->nm_tabela . " where  `limit` like '%" . $limit . "%' order by `limit`"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
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
   
   function lookup_ajax_discount($discount)
   {
      $discount = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $discount);
      $discount = substr($this->Db->qstr($discount), 1, -1);
            $discount_look = substr($this->Db->qstr($discount), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct discount from " . $this->Ini->nm_tabela . " where   CAST (discount AS TEXT)  like '%" . $discount . "%' order by discount"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct discount from " . $this->Ini->nm_tabela . " where   CAST (discount AS VARCHAR)  like '%" . $discount . "%' order by discount"; 
      }
      else
      {
          $nm_comando = "select distinct discount from " . $this->Ini->nm_tabela . " where  discount like '%" . $discount . "%' order by discount"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_policy($policy)
   {
      $policy = substr($this->Db->qstr($policy), 1, -1);
            $policy_look = substr($this->Db->qstr($policy), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct policy from " . $this->Ini->nm_tabela . " where  policy like '%" . $policy . "%' order by policy"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_itemtype($itemtype)
   {
      $itemtype = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $itemtype);
      $itemtype = substr($this->Db->qstr($itemtype), 1, -1);
            $itemtype_look = substr($this->Db->qstr($itemtype), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct itemType from " . $this->Ini->nm_tabela . " where   CAST (itemType AS TEXT)  like '%" . $itemtype . "%' order by itemType"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct itemType from " . $this->Ini->nm_tabela . " where   CAST (itemType AS VARCHAR)  like '%" . $itemtype . "%' order by itemType"; 
      }
      else
      {
          $nm_comando = "select distinct itemType from " . $this->Ini->nm_tabela . " where  itemType like '%" . $itemtype . "%' order by itemType"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_deleted($deleted)
   {
      $deleted = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $deleted);
      $deleted = substr($this->Db->qstr($deleted), 1, -1);
            $deleted_look = substr($this->Db->qstr($deleted), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct deleted from " . $this->Ini->nm_tabela . " where   CAST (deleted AS TEXT)  like '%" . $deleted . "%' order by deleted"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct deleted from " . $this->Ini->nm_tabela . " where   CAST (deleted AS VARCHAR)  like '%" . $deleted . "%' order by deleted"; 
      }
      else
      {
          $nm_comando = "select distinct deleted from " . $this->Ini->nm_tabela . " where  deleted like '%" . $deleted . "%' order by deleted"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_tempo($tempo)
   {
      $tempo = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $tempo);
      $tempo = substr($this->Db->qstr($tempo), 1, -1);
            $tempo_look = substr($this->Db->qstr($tempo), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct tempo from " . $this->Ini->nm_tabela . " where   CAST (tempo AS TEXT)  like '%" . $tempo . "%' order by tempo"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct tempo from " . $this->Ini->nm_tabela . " where   CAST (tempo AS VARCHAR)  like '%" . $tempo . "%' order by tempo"; 
      }
      else
      {
          $nm_comando = "select distinct tempo from " . $this->Ini->nm_tabela . " where  tempo like '%" . $tempo . "%' order by tempo"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_asuransi($asuransi)
   {
      $asuransi = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $asuransi);
      $asuransi = substr($this->Db->qstr($asuransi), 1, -1);
            $asuransi_look = substr($this->Db->qstr($asuransi), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct asuransi from " . $this->Ini->nm_tabela . " where   CAST (asuransi AS TEXT)  like '%" . $asuransi . "%' order by asuransi"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct asuransi from " . $this->Ini->nm_tabela . " where   CAST (asuransi AS VARCHAR)  like '%" . $asuransi . "%' order by asuransi"; 
      }
      else
      {
          $nm_comando = "select distinct asuransi from " . $this->Ini->nm_tabela . " where  asuransi like '%" . $asuransi . "%' order by asuransi"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_marginobat($marginobat)
   {
      $marginobat = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $marginobat);
      $marginobat = substr($this->Db->qstr($marginobat), 1, -1);
            $marginobat_look = substr($this->Db->qstr($marginobat), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct marginObat from " . $this->Ini->nm_tabela . " where   CAST (marginObat AS TEXT)  like '%" . $marginobat . "%' order by marginObat"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct marginObat from " . $this->Ini->nm_tabela . " where   CAST (marginObat AS VARCHAR)  like '%" . $marginobat . "%' order by marginObat"; 
      }
      else
      {
          $nm_comando = "select distinct marginObat from " . $this->Ini->nm_tabela . " where  marginObat like '%" . $marginobat . "%' order by marginObat"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_markuptindakan($markuptindakan)
   {
      $markuptindakan = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $markuptindakan);
      $markuptindakan = substr($this->Db->qstr($markuptindakan), 1, -1);
            $markuptindakan_look = substr($this->Db->qstr($markuptindakan), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct markupTindakan from " . $this->Ini->nm_tabela . " where   CAST (markupTindakan AS TEXT)  like '%" . $markuptindakan . "%' order by markupTindakan"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct markupTindakan from " . $this->Ini->nm_tabela . " where   CAST (markupTindakan AS VARCHAR)  like '%" . $markuptindakan . "%' order by markupTindakan"; 
      }
      else
      {
          $nm_comando = "select distinct markupTindakan from " . $this->Ini->nm_tabela . " where  markupTindakan like '%" . $markuptindakan . "%' order by markupTindakan"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_markupobat($markupobat)
   {
      $markupobat = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $markupobat);
      $markupobat = substr($this->Db->qstr($markupobat), 1, -1);
            $markupobat_look = substr($this->Db->qstr($markupobat), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct markupObat from " . $this->Ini->nm_tabela . " where   CAST (markupObat AS TEXT)  like '%" . $markupobat . "%' order by markupObat"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct markupObat from " . $this->Ini->nm_tabela . " where   CAST (markupObat AS VARCHAR)  like '%" . $markupobat . "%' order by markupObat"; 
      }
      else
      {
          $nm_comando = "select distinct markupObat from " . $this->Ini->nm_tabela . " where  markupObat like '%" . $markupobat . "%' order by markupObat"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_markuplab($markuplab)
   {
      $markuplab = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $markuplab);
      $markuplab = substr($this->Db->qstr($markuplab), 1, -1);
            $markuplab_look = substr($this->Db->qstr($markuplab), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct markupLab from " . $this->Ini->nm_tabela . " where   CAST (markupLab AS TEXT)  like '%" . $markuplab . "%' order by markupLab"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct markupLab from " . $this->Ini->nm_tabela . " where   CAST (markupLab AS VARCHAR)  like '%" . $markuplab . "%' order by markupLab"; 
      }
      else
      {
          $nm_comando = "select distinct markupLab from " . $this->Ini->nm_tabela . " where  markupLab like '%" . $markuplab . "%' order by markupLab"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_markuprad($markuprad)
   {
      $markuprad = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $markuprad);
      $markuprad = substr($this->Db->qstr($markuprad), 1, -1);
            $markuprad_look = substr($this->Db->qstr($markuprad), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct markupRad from " . $this->Ini->nm_tabela . " where   CAST (markupRad AS TEXT)  like '%" . $markuprad . "%' order by markupRad"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct markupRad from " . $this->Ini->nm_tabela . " where   CAST (markupRad AS VARCHAR)  like '%" . $markuprad . "%' order by markupRad"; 
      }
      else
      {
          $nm_comando = "select distinct markupRad from " . $this->Ini->nm_tabela . " where  markupRad like '%" . $markuprad . "%' order by markupRad"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_admpolitype($admpolitype)
   {
      $admpolitype = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $admpolitype);
      $admpolitype = substr($this->Db->qstr($admpolitype), 1, -1);
            $admpolitype_look = substr($this->Db->qstr($admpolitype), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admPoliType from " . $this->Ini->nm_tabela . " where   CAST (admPoliType AS TEXT)  like '%" . $admpolitype . "%' order by admPoliType"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admPoliType from " . $this->Ini->nm_tabela . " where   CAST (admPoliType AS VARCHAR)  like '%" . $admpolitype . "%' order by admPoliType"; 
      }
      else
      {
          $nm_comando = "select distinct admPoliType from " . $this->Ini->nm_tabela . " where  admPoliType like '%" . $admpolitype . "%' order by admPoliType"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_adminaptype($adminaptype)
   {
      $adminaptype = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $adminaptype);
      $adminaptype = substr($this->Db->qstr($adminaptype), 1, -1);
            $adminaptype_look = substr($this->Db->qstr($adminaptype), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admInapType from " . $this->Ini->nm_tabela . " where   CAST (admInapType AS TEXT)  like '%" . $adminaptype . "%' order by admInapType"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admInapType from " . $this->Ini->nm_tabela . " where   CAST (admInapType AS VARCHAR)  like '%" . $adminaptype . "%' order by admInapType"; 
      }
      else
      {
          $nm_comando = "select distinct admInapType from " . $this->Ini->nm_tabela . " where  admInapType like '%" . $adminaptype . "%' order by admInapType"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_admpolibaru($admpolibaru)
   {
      $admpolibaru = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $admpolibaru);
      $admpolibaru = substr($this->Db->qstr($admpolibaru), 1, -1);
            $admpolibaru_look = substr($this->Db->qstr($admpolibaru), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admPoliBaru from " . $this->Ini->nm_tabela . " where   CAST (admPoliBaru AS TEXT)  like '%" . $admpolibaru . "%' order by admPoliBaru"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admPoliBaru from " . $this->Ini->nm_tabela . " where   CAST (admPoliBaru AS VARCHAR)  like '%" . $admpolibaru . "%' order by admPoliBaru"; 
      }
      else
      {
          $nm_comando = "select distinct admPoliBaru from " . $this->Ini->nm_tabela . " where  admPoliBaru like '%" . $admpolibaru . "%' order by admPoliBaru"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_admpolilama($admpolilama)
   {
      $admpolilama = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $admpolilama);
      $admpolilama = substr($this->Db->qstr($admpolilama), 1, -1);
            $admpolilama_look = substr($this->Db->qstr($admpolilama), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admPoliLama from " . $this->Ini->nm_tabela . " where   CAST (admPoliLama AS TEXT)  like '%" . $admpolilama . "%' order by admPoliLama"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admPoliLama from " . $this->Ini->nm_tabela . " where   CAST (admPoliLama AS VARCHAR)  like '%" . $admpolilama . "%' order by admPoliLama"; 
      }
      else
      {
          $nm_comando = "select distinct admPoliLama from " . $this->Ini->nm_tabela . " where  admPoliLama like '%" . $admpolilama . "%' order by admPoliLama"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_adminap($adminap)
   {
      $adminap = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $adminap);
      $adminap = substr($this->Db->qstr($adminap), 1, -1);
            $adminap_look = substr($this->Db->qstr($adminap), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admInap from " . $this->Ini->nm_tabela . " where   CAST (admInap AS TEXT)  like '%" . $adminap . "%' order by admInap"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admInap from " . $this->Ini->nm_tabela . " where   CAST (admInap AS VARCHAR)  like '%" . $adminap . "%' order by admInap"; 
      }
      else
      {
          $nm_comando = "select distinct admInap from " . $this->Ini->nm_tabela . " where  admInap like '%" . $adminap . "%' order by admInap"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_marginpma($marginpma)
   {
      $marginpma = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $marginpma);
      $marginpma = substr($this->Db->qstr($marginpma), 1, -1);
            $marginpma_look = substr($this->Db->qstr($marginpma), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct marginPMA from " . $this->Ini->nm_tabela . " where   CAST (marginPMA AS TEXT)  like '%" . $marginpma . "%' order by marginPMA"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct marginPMA from " . $this->Ini->nm_tabela . " where   CAST (marginPMA AS VARCHAR)  like '%" . $marginpma . "%' order by marginPMA"; 
      }
      else
      {
          $nm_comando = "select distinct marginPMA from " . $this->Ini->nm_tabela . " where  marginPMA like '%" . $marginpma . "%' order by marginPMA"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_withpma($withpma)
   {
      $withpma = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $withpma);
      $withpma = substr($this->Db->qstr($withpma), 1, -1);
            $withpma_look = substr($this->Db->qstr($withpma), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct withPMA from " . $this->Ini->nm_tabela . " where   CAST (withPMA AS TEXT)  like '%" . $withpma . "%' order by withPMA"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct withPMA from " . $this->Ini->nm_tabela . " where   CAST (withPMA AS VARCHAR)  like '%" . $withpma . "%' order by withPMA"; 
      }
      else
      {
          $nm_comando = "select distinct withPMA from " . $this->Ini->nm_tabela . " where  withPMA like '%" . $withpma . "%' order by withPMA"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_forminternal($forminternal)
   {
      $forminternal = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $forminternal);
      $forminternal = substr($this->Db->qstr($forminternal), 1, -1);
            $forminternal_look = substr($this->Db->qstr($forminternal), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct formInternal from " . $this->Ini->nm_tabela . " where   CAST (formInternal AS TEXT)  like '%" . $forminternal . "%' order by formInternal"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct formInternal from " . $this->Ini->nm_tabela . " where   CAST (formInternal AS VARCHAR)  like '%" . $forminternal . "%' order by formInternal"; 
      }
      else
      {
          $nm_comando = "select distinct formInternal from " . $this->Ini->nm_tabela . " where  formInternal like '%" . $forminternal . "%' order by formInternal"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_vacc($vacc)
   {
      $vacc = substr($this->Db->qstr($vacc), 1, -1);
            $vacc_look = substr($this->Db->qstr($vacc), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct vAcc from " . $this->Ini->nm_tabela . " where  vAcc like '%" . $vacc . "%' order by vAcc"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_extcode($extcode)
   {
      $extcode = substr($this->Db->qstr($extcode), 1, -1);
            $extcode_look = substr($this->Db->qstr($extcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct extCode from " . $this->Ini->nm_tabela . " where  extCode like '%" . $extcode . "%' order by extCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_umum($umum)
   {
      $umum = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $umum);
      $umum = substr($this->Db->qstr($umum), 1, -1);
            $umum_look = substr($this->Db->qstr($umum), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct umum from " . $this->Ini->nm_tabela . " where   CAST (umum AS TEXT)  like '%" . $umum . "%' order by umum"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct umum from " . $this->Ini->nm_tabela . " where   CAST (umum AS VARCHAR)  like '%" . $umum . "%' order by umum"; 
      }
      else
      {
          $nm_comando = "select distinct umum from " . $this->Ini->nm_tabela . " where  umum like '%" . $umum . "%' order by umum"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_autoshow($autoshow)
   {
      $autoshow = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $autoshow);
      $autoshow = substr($this->Db->qstr($autoshow), 1, -1);
            $autoshow_look = substr($this->Db->qstr($autoshow), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct autoShow from " . $this->Ini->nm_tabela . " where   CAST (autoShow AS TEXT)  like '%" . $autoshow . "%' order by autoShow"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct autoShow from " . $this->Ini->nm_tabela . " where   CAST (autoShow AS VARCHAR)  like '%" . $autoshow . "%' order by autoShow"; 
      }
      else
      {
          $nm_comando = "select distinct autoShow from " . $this->Ini->nm_tabela . " where  autoShow like '%" . $autoshow . "%' order by autoShow"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_bpjs($bpjs)
   {
      $bpjs = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $bpjs);
      $bpjs = substr($this->Db->qstr($bpjs), 1, -1);
            $bpjs_look = substr($this->Db->qstr($bpjs), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct bpjs from " . $this->Ini->nm_tabela . " where   CAST (bpjs AS TEXT)  like '%" . $bpjs . "%' order by bpjs"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct bpjs from " . $this->Ini->nm_tabela . " where   CAST (bpjs AS VARCHAR)  like '%" . $bpjs . "%' order by bpjs"; 
      }
      else
      {
          $nm_comando = "select distinct bpjs from " . $this->Ini->nm_tabela . " where  bpjs like '%" . $bpjs . "%' order by bpjs"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
   
   function lookup_ajax_caracode($caracode)
   {
      $caracode = substr($this->Db->qstr($caracode), 1, -1);
            $caracode_look = substr($this->Db->qstr($caracode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct caraCode from " . $this->Ini->nm_tabela . " where  caraCode like '%" . $caracode . "%' order by caraCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      $Nm_numeric[] = "`limit`";$Nm_numeric[] = "discount";$Nm_numeric[] = "itemtype";$Nm_numeric[] = "deleted";$Nm_numeric[] = "tempo";$Nm_numeric[] = "asuransi";$Nm_numeric[] = "marginobat";$Nm_numeric[] = "markuptindakan";$Nm_numeric[] = "markupobat";$Nm_numeric[] = "markuplab";$Nm_numeric[] = "markuprad";$Nm_numeric[] = "admpolitype";$Nm_numeric[] = "adminaptype";$Nm_numeric[] = "admpolibaru";$Nm_numeric[] = "admpolilama";$Nm_numeric[] = "adminap";$Nm_numeric[] = "marginpma";$Nm_numeric[] = "withpma";$Nm_numeric[] = "forminternal";$Nm_numeric[] = "umum";$Nm_numeric[] = "autoshow";$Nm_numeric[] = "bpjs";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
          if ($condicao == "EP" || $condicao == "NE")
          {
              return;
          }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['decimal_db'] == ".")
         {
            $nm_aspas  = "";
            $nm_aspas1 = "";
         }
         if ($condicao != "IN")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['decimal_db'] == ".")
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
      $Nm_datas[] = "date(joinDate)";$Nm_datas[] = "date(joinDate)";$Nm_datas[] = "date(expDate)";$Nm_datas[] = "date(expDate)";$Nm_datas[] = "date(lastUpdated)";$Nm_datas[] = "date(lastUpdated)";
      if (in_array($campo_join, $Nm_datas))
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['SC_sep_date']))
          {
              $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['SC_sep_date'];
              $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['SC_sep_date1'];
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
         $nome_sum = "tbinstansi.$nome";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
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
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . ": " . $NM_cond . "##*@@";
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
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $lang_like . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
            break;
            case "DF":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "BW":     // 
               $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"] . "##*@@";
            break;
            case "IN":     // 
               $nm_sc_valores = explode(",", $campo);
               $cond_str  = "";
               $nm_cond   = "";
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
                   }
               }
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] . "##*@@";
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . "##*@@";
            break;
            case "EP":     // 
               $this->comando        .= " $nome = '' ";
               $this->comando_sum    .= " $nome_sum = '' ";
               $this->comando_filtro .= " $nome = '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_empty'] . "##*@@";
            break;
            case "NE":     // 
               $this->comando        .= " $nome <> '' ";
               $this->comando_sum    .= " $nome_sum <> '' ";
               $this->comando_filtro .= " $nome <> '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nempty'] . "##*@@";
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
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - Instansi Penjamin</TITLE>
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
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - Instansi Penjamin</TITLE>
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>grid_tbinstansi/grid_tbinstansi_fil_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
</HEAD>
<BODY class="scFilterPage">
<?php echo $this->Ini->Ajax_result_set ?>
<SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_js . "/browserSniffer.js" ?>"></SCRIPT>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
        </script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
 <script type="text/javascript" src="grid_tbinstansi_ajax_search.js"></script>
 <script type="text/javascript" src="grid_tbinstansi_ajax.js"></script>
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
<script type="text/javascript" src="grid_tbinstansi_message.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_sweetalert.css" />
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['grid_tbinstansi']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['grid_tbinstansi']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['ajax_nav'])
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
<script type="text/javascript" src="grid_tbinstansi_message.js"></script>
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
  str_out += 'SC_address_cond#NMF#' + search_get_sel_txt('SC_address_cond') + '@NMF@';
  str_out += 'SC_address#NMF#' + search_get_text('SC_address') + '@NMF@';
  str_out += 'id_ac_address#NMF#' + search_get_text('id_ac_address') + '@NMF@';
  str_out += 'SC_instcode_cond#NMF#' + search_get_sel_txt('SC_instcode_cond') + '@NMF@';
  str_out += 'SC_instcode#NMF#' + search_get_text('SC_instcode') + '@NMF@';
  str_out += 'id_ac_instcode#NMF#' + search_get_text('id_ac_instcode') + '@NMF@';
  str_out += 'SC_init_cond#NMF#' + search_get_sel_txt('SC_init_cond') + '@NMF@';
  str_out += 'SC_init#NMF#' + search_get_text('SC_init') + '@NMF@';
  str_out += 'id_ac_init#NMF#' + search_get_text('id_ac_init') + '@NMF@';
  str_out += 'SC_name_cond#NMF#' + search_get_sel_txt('SC_name_cond') + '@NMF@';
  str_out += 'SC_name#NMF#' + search_get_text('SC_name') + '@NMF@';
  str_out += 'id_ac_name#NMF#' + search_get_text('id_ac_name') + '@NMF@';
  str_out += 'SC_city_cond#NMF#' + search_get_sel_txt('SC_city_cond') + '@NMF@';
  str_out += 'SC_city#NMF#' + search_get_text('SC_city') + '@NMF@';
  str_out += 'id_ac_city#NMF#' + search_get_text('id_ac_city') + '@NMF@';
  str_out += 'SC_phone_cond#NMF#' + search_get_sel_txt('SC_phone_cond') + '@NMF@';
  str_out += 'SC_phone#NMF#' + search_get_text('SC_phone') + '@NMF@';
  str_out += 'id_ac_phone#NMF#' + search_get_text('id_ac_phone') + '@NMF@';
  str_out += 'SC_fax_cond#NMF#' + search_get_sel_txt('SC_fax_cond') + '@NMF@';
  str_out += 'SC_fax#NMF#' + search_get_text('SC_fax') + '@NMF@';
  str_out += 'id_ac_fax#NMF#' + search_get_text('id_ac_fax') + '@NMF@';
  str_out += 'SC_cp_cond#NMF#' + search_get_sel_txt('SC_cp_cond') + '@NMF@';
  str_out += 'SC_cp#NMF#' + search_get_text('SC_cp') + '@NMF@';
  str_out += 'id_ac_cp#NMF#' + search_get_text('id_ac_cp') + '@NMF@';
  str_out += 'SC_limit_cond#NMF#' + search_get_sel_txt('SC_limit_cond') + '@NMF@';
  str_out += 'SC_limit#NMF#' + search_get_text('SC_limit') + '@NMF@';
  str_out += 'id_ac_limit#NMF#' + search_get_text('id_ac_limit') + '@NMF@';
  str_out += 'SC_discount_cond#NMF#' + search_get_sel_txt('SC_discount_cond') + '@NMF@';
  str_out += 'SC_discount#NMF#' + search_get_text('SC_discount') + '@NMF@';
  str_out += 'id_ac_discount#NMF#' + search_get_text('id_ac_discount') + '@NMF@';
  str_out += 'SC_date(joindate)_cond#NMF#' + search_get_sel_txt('SC_sc_field_0_cond') + '@NMF@';
  str_out += 'SC_date(joindate)_dia#NMF#' + search_get_sel_txt('SC_sc_field_0_dia') + '@NMF@';
  str_out += 'SC_date(joindate)_mes#NMF#' + search_get_sel_txt('SC_sc_field_0_mes') + '@NMF@';
  str_out += 'SC_date(joindate)_ano#NMF#' + search_get_sel_txt('SC_sc_field_0_ano') + '@NMF@';
  str_out += 'SC_date(joindate)_input_2_dia#NMF#' + search_get_sel_txt('SC_sc_field_0_input_2_dia') + '@NMF@';
  str_out += 'SC_date(joindate)_input_2_mes#NMF#' + search_get_sel_txt('SC_sc_field_0_input_2_mes') + '@NMF@';
  str_out += 'SC_date(joindate)_input_2_ano#NMF#' + search_get_sel_txt('SC_sc_field_0_input_2_ano') + '@NMF@';
  str_out += 'SC_date(expdate)_cond#NMF#' + search_get_sel_txt('SC_sc_field_1_cond') + '@NMF@';
  str_out += 'SC_date(expdate)_dia#NMF#' + search_get_sel_txt('SC_sc_field_1_dia') + '@NMF@';
  str_out += 'SC_date(expdate)_mes#NMF#' + search_get_sel_txt('SC_sc_field_1_mes') + '@NMF@';
  str_out += 'SC_date(expdate)_ano#NMF#' + search_get_sel_txt('SC_sc_field_1_ano') + '@NMF@';
  str_out += 'SC_date(expdate)_input_2_dia#NMF#' + search_get_sel_txt('SC_sc_field_1_input_2_dia') + '@NMF@';
  str_out += 'SC_date(expdate)_input_2_mes#NMF#' + search_get_sel_txt('SC_sc_field_1_input_2_mes') + '@NMF@';
  str_out += 'SC_date(expdate)_input_2_ano#NMF#' + search_get_sel_txt('SC_sc_field_1_input_2_ano') + '@NMF@';
  str_out += 'SC_policy_cond#NMF#' + search_get_sel_txt('SC_policy_cond') + '@NMF@';
  str_out += 'SC_policy#NMF#' + search_get_text('SC_policy') + '@NMF@';
  str_out += 'id_ac_policy#NMF#' + search_get_text('id_ac_policy') + '@NMF@';
  str_out += 'SC_itemtype_cond#NMF#' + search_get_sel_txt('SC_itemtype_cond') + '@NMF@';
  str_out += 'SC_itemtype#NMF#' + search_get_text('SC_itemtype') + '@NMF@';
  str_out += 'id_ac_itemtype#NMF#' + search_get_text('id_ac_itemtype') + '@NMF@';
  str_out += 'SC_deleted_cond#NMF#' + search_get_sel_txt('SC_deleted_cond') + '@NMF@';
  str_out += 'SC_deleted#NMF#' + search_get_text('SC_deleted') + '@NMF@';
  str_out += 'id_ac_deleted#NMF#' + search_get_text('id_ac_deleted') + '@NMF@';
  str_out += 'SC_tempo_cond#NMF#' + search_get_sel_txt('SC_tempo_cond') + '@NMF@';
  str_out += 'SC_tempo#NMF#' + search_get_text('SC_tempo') + '@NMF@';
  str_out += 'id_ac_tempo#NMF#' + search_get_text('id_ac_tempo') + '@NMF@';
  str_out += 'SC_asuransi_cond#NMF#' + search_get_sel_txt('SC_asuransi_cond') + '@NMF@';
  str_out += 'SC_asuransi#NMF#' + search_get_text('SC_asuransi') + '@NMF@';
  str_out += 'id_ac_asuransi#NMF#' + search_get_text('id_ac_asuransi') + '@NMF@';
  str_out += 'SC_marginobat_cond#NMF#' + search_get_sel_txt('SC_marginobat_cond') + '@NMF@';
  str_out += 'SC_marginobat#NMF#' + search_get_text('SC_marginobat') + '@NMF@';
  str_out += 'id_ac_marginobat#NMF#' + search_get_text('id_ac_marginobat') + '@NMF@';
  str_out += 'SC_markuptindakan_cond#NMF#' + search_get_sel_txt('SC_markuptindakan_cond') + '@NMF@';
  str_out += 'SC_markuptindakan#NMF#' + search_get_text('SC_markuptindakan') + '@NMF@';
  str_out += 'id_ac_markuptindakan#NMF#' + search_get_text('id_ac_markuptindakan') + '@NMF@';
  str_out += 'SC_markupobat_cond#NMF#' + search_get_sel_txt('SC_markupobat_cond') + '@NMF@';
  str_out += 'SC_markupobat#NMF#' + search_get_text('SC_markupobat') + '@NMF@';
  str_out += 'id_ac_markupobat#NMF#' + search_get_text('id_ac_markupobat') + '@NMF@';
  str_out += 'SC_markuplab_cond#NMF#' + search_get_sel_txt('SC_markuplab_cond') + '@NMF@';
  str_out += 'SC_markuplab#NMF#' + search_get_text('SC_markuplab') + '@NMF@';
  str_out += 'id_ac_markuplab#NMF#' + search_get_text('id_ac_markuplab') + '@NMF@';
  str_out += 'SC_markuprad_cond#NMF#' + search_get_sel_txt('SC_markuprad_cond') + '@NMF@';
  str_out += 'SC_markuprad#NMF#' + search_get_text('SC_markuprad') + '@NMF@';
  str_out += 'id_ac_markuprad#NMF#' + search_get_text('id_ac_markuprad') + '@NMF@';
  str_out += 'SC_admpolitype_cond#NMF#' + search_get_sel_txt('SC_admpolitype_cond') + '@NMF@';
  str_out += 'SC_admpolitype#NMF#' + search_get_text('SC_admpolitype') + '@NMF@';
  str_out += 'id_ac_admpolitype#NMF#' + search_get_text('id_ac_admpolitype') + '@NMF@';
  str_out += 'SC_adminaptype_cond#NMF#' + search_get_sel_txt('SC_adminaptype_cond') + '@NMF@';
  str_out += 'SC_adminaptype#NMF#' + search_get_text('SC_adminaptype') + '@NMF@';
  str_out += 'id_ac_adminaptype#NMF#' + search_get_text('id_ac_adminaptype') + '@NMF@';
  str_out += 'SC_admpolibaru_cond#NMF#' + search_get_sel_txt('SC_admpolibaru_cond') + '@NMF@';
  str_out += 'SC_admpolibaru#NMF#' + search_get_text('SC_admpolibaru') + '@NMF@';
  str_out += 'id_ac_admpolibaru#NMF#' + search_get_text('id_ac_admpolibaru') + '@NMF@';
  str_out += 'SC_admpolilama_cond#NMF#' + search_get_sel_txt('SC_admpolilama_cond') + '@NMF@';
  str_out += 'SC_admpolilama#NMF#' + search_get_text('SC_admpolilama') + '@NMF@';
  str_out += 'id_ac_admpolilama#NMF#' + search_get_text('id_ac_admpolilama') + '@NMF@';
  str_out += 'SC_adminap_cond#NMF#' + search_get_sel_txt('SC_adminap_cond') + '@NMF@';
  str_out += 'SC_adminap#NMF#' + search_get_text('SC_adminap') + '@NMF@';
  str_out += 'id_ac_adminap#NMF#' + search_get_text('id_ac_adminap') + '@NMF@';
  str_out += 'SC_date(lastupdated)_cond#NMF#' + search_get_sel_txt('SC_sc_field_2_cond') + '@NMF@';
  str_out += 'SC_date(lastupdated)_dia#NMF#' + search_get_sel_txt('SC_sc_field_2_dia') + '@NMF@';
  str_out += 'SC_date(lastupdated)_mes#NMF#' + search_get_sel_txt('SC_sc_field_2_mes') + '@NMF@';
  str_out += 'SC_date(lastupdated)_ano#NMF#' + search_get_sel_txt('SC_sc_field_2_ano') + '@NMF@';
  str_out += 'SC_date(lastupdated)_input_2_dia#NMF#' + search_get_sel_txt('SC_sc_field_2_input_2_dia') + '@NMF@';
  str_out += 'SC_date(lastupdated)_input_2_mes#NMF#' + search_get_sel_txt('SC_sc_field_2_input_2_mes') + '@NMF@';
  str_out += 'SC_date(lastupdated)_input_2_ano#NMF#' + search_get_sel_txt('SC_sc_field_2_input_2_ano') + '@NMF@';
  str_out += 'SC_marginpma_cond#NMF#' + search_get_sel_txt('SC_marginpma_cond') + '@NMF@';
  str_out += 'SC_marginpma#NMF#' + search_get_text('SC_marginpma') + '@NMF@';
  str_out += 'id_ac_marginpma#NMF#' + search_get_text('id_ac_marginpma') + '@NMF@';
  str_out += 'SC_withpma_cond#NMF#' + search_get_sel_txt('SC_withpma_cond') + '@NMF@';
  str_out += 'SC_withpma#NMF#' + search_get_text('SC_withpma') + '@NMF@';
  str_out += 'id_ac_withpma#NMF#' + search_get_text('id_ac_withpma') + '@NMF@';
  str_out += 'SC_forminternal_cond#NMF#' + search_get_sel_txt('SC_forminternal_cond') + '@NMF@';
  str_out += 'SC_forminternal#NMF#' + search_get_text('SC_forminternal') + '@NMF@';
  str_out += 'id_ac_forminternal#NMF#' + search_get_text('id_ac_forminternal') + '@NMF@';
  str_out += 'SC_vacc_cond#NMF#' + search_get_sel_txt('SC_vacc_cond') + '@NMF@';
  str_out += 'SC_vacc#NMF#' + search_get_text('SC_vacc') + '@NMF@';
  str_out += 'id_ac_vacc#NMF#' + search_get_text('id_ac_vacc') + '@NMF@';
  str_out += 'SC_extcode_cond#NMF#' + search_get_sel_txt('SC_extcode_cond') + '@NMF@';
  str_out += 'SC_extcode#NMF#' + search_get_text('SC_extcode') + '@NMF@';
  str_out += 'id_ac_extcode#NMF#' + search_get_text('id_ac_extcode') + '@NMF@';
  str_out += 'SC_umum_cond#NMF#' + search_get_sel_txt('SC_umum_cond') + '@NMF@';
  str_out += 'SC_umum#NMF#' + search_get_text('SC_umum') + '@NMF@';
  str_out += 'id_ac_umum#NMF#' + search_get_text('id_ac_umum') + '@NMF@';
  str_out += 'SC_autoshow_cond#NMF#' + search_get_sel_txt('SC_autoshow_cond') + '@NMF@';
  str_out += 'SC_autoshow#NMF#' + search_get_text('SC_autoshow') + '@NMF@';
  str_out += 'id_ac_autoshow#NMF#' + search_get_text('id_ac_autoshow') + '@NMF@';
  str_out += 'SC_bpjs_cond#NMF#' + search_get_sel_txt('SC_bpjs_cond') + '@NMF@';
  str_out += 'SC_bpjs#NMF#' + search_get_text('SC_bpjs') + '@NMF@';
  str_out += 'id_ac_bpjs#NMF#' + search_get_text('id_ac_bpjs') + '@NMF@';
  str_out += 'SC_caracode_cond#NMF#' + search_get_sel_txt('SC_caracode_cond') + '@NMF@';
  str_out += 'SC_caracode#NMF#' + search_get_text('SC_caracode') + '@NMF@';
  str_out += 'id_ac_caracode#NMF#' + search_get_text('id_ac_caracode') + '@NMF@';
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
   $("#id_ac_instcode").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_instcode",
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
       $("#SC_instcode").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_instcode").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_instcode").val( $(this).val() );
       }
     }
   });
   $("#id_ac_init").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_init",
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
       $("#SC_init").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_init").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_init").val( $(this).val() );
       }
     }
   });
   $("#id_ac_name").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_name",
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
       $("#SC_name").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_name").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_name").val( $(this).val() );
       }
     }
   });
   $("#id_ac_tempo").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_tempo",
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
       $("#SC_tempo").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_tempo").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_tempo").val( $(this).val() );
       }
     }
   });
   $("#id_ac_address").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_address",
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
       $("#SC_address").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_address").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_address").val( $(this).val() );
       }
     }
   });
   $("#id_ac_city").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_city",
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
       $("#SC_city").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_city").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_city").val( $(this).val() );
       }
     }
   });
   $("#id_ac_phone").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_phone",
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
       $("#SC_phone").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_phone").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_phone").val( $(this).val() );
       }
     }
   });
   $("#id_ac_cp").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_cp",
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
       $("#SC_cp").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_cp").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_cp").val( $(this).val() );
       }
     }
   });
   $("#id_ac_fax").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_fax",
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
       $("#SC_fax").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_fax").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_fax").val( $(this).val() );
       }
     }
   });
   $("#id_ac_limit").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_limit",
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
       $("#SC_limit").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_limit").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_limit").val( $(this).val() );
       }
     }
   });
   $("#id_ac_discount").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_discount",
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
       $("#SC_discount").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_discount").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_discount").val( $(this).val() );
       }
     }
   });
   $("#id_ac_policy").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_policy",
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
       $("#SC_policy").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_policy").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_policy").val( $(this).val() );
       }
     }
   });
   $("#id_ac_itemtype").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_itemtype",
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
       $("#SC_itemtype").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_itemtype").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_itemtype").val( $(this).val() );
       }
     }
   });
   $("#id_ac_deleted").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_deleted",
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
       $("#SC_deleted").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_deleted").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_deleted").val( $(this).val() );
       }
     }
   });
   $("#id_ac_asuransi").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_asuransi",
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
       $("#SC_asuransi").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_asuransi").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_asuransi").val( $(this).val() );
       }
     }
   });
   $("#id_ac_marginobat").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_marginobat",
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
       $("#SC_marginobat").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_marginobat").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_marginobat").val( $(this).val() );
       }
     }
   });
   $("#id_ac_markuptindakan").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_markuptindakan",
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
       $("#SC_markuptindakan").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_markuptindakan").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_markuptindakan").val( $(this).val() );
       }
     }
   });
   $("#id_ac_markupobat").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_markupobat",
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
       $("#SC_markupobat").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_markupobat").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_markupobat").val( $(this).val() );
       }
     }
   });
   $("#id_ac_markuplab").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_markuplab",
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
       $("#SC_markuplab").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_markuplab").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_markuplab").val( $(this).val() );
       }
     }
   });
   $("#id_ac_markuprad").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_markuprad",
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
       $("#SC_markuprad").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_markuprad").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_markuprad").val( $(this).val() );
       }
     }
   });
   $("#id_ac_admpolitype").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_admpolitype",
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
       $("#SC_admpolitype").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_admpolitype").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_admpolitype").val( $(this).val() );
       }
     }
   });
   $("#id_ac_adminaptype").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_adminaptype",
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
       $("#SC_adminaptype").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_adminaptype").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_adminaptype").val( $(this).val() );
       }
     }
   });
   $("#id_ac_admpolibaru").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_admpolibaru",
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
       $("#SC_admpolibaru").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_admpolibaru").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_admpolibaru").val( $(this).val() );
       }
     }
   });
   $("#id_ac_admpolilama").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_admpolilama",
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
       $("#SC_admpolilama").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_admpolilama").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_admpolilama").val( $(this).val() );
       }
     }
   });
   $("#id_ac_adminap").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_adminap",
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
       $("#SC_adminap").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_adminap").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_adminap").val( $(this).val() );
       }
     }
   });
   $("#id_ac_marginpma").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_marginpma",
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
       $("#SC_marginpma").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_marginpma").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_marginpma").val( $(this).val() );
       }
     }
   });
   $("#id_ac_withpma").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_withpma",
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
       $("#SC_withpma").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_withpma").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_withpma").val( $(this).val() );
       }
     }
   });
   $("#id_ac_forminternal").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_forminternal",
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
       $("#SC_forminternal").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_forminternal").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_forminternal").val( $(this).val() );
       }
     }
   });
   $("#id_ac_vacc").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_vacc",
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
       $("#SC_vacc").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_vacc").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_vacc").val( $(this).val() );
       }
     }
   });
   $("#id_ac_extcode").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_extcode",
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
       $("#SC_extcode").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_extcode").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_extcode").val( $(this).val() );
       }
     }
   });
   $("#id_ac_umum").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_umum",
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
       $("#SC_umum").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_umum").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_umum").val( $(this).val() );
       }
     }
   });
   $("#id_ac_autoshow").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_autoshow",
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
       $("#SC_autoshow").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_autoshow").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_autoshow").val( $(this).val() );
       }
     }
   });
   $("#id_ac_bpjs").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_bpjs",
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
       $("#SC_bpjs").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_bpjs").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_bpjs").val( $(this).val() );
       }
     }
   });
   $("#id_ac_caracode").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_caracode",
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
       $("#SC_caracode").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_caracode").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_caracode").val( $(this).val() );
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dashboard_info']['compact_mode'])
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
    <div class="scFilterHeaderFont" style="float: left; text-transform: uppercase;"><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - Instansi Penjamin</div>
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
             $address_cond, $address, $address_autocomp,
             $instcode_cond, $instcode, $instcode_autocomp,
             $init_cond, $init, $init_autocomp,
             $name_cond, $name, $name_autocomp,
             $city_cond, $city, $city_autocomp,
             $phone_cond, $phone, $phone_autocomp,
             $fax_cond, $fax, $fax_autocomp,
             $cp_cond, $cp, $cp_autocomp,
             $limit_cond, $limit, $limit_autocomp,
             $discount_cond, $discount, $discount_autocomp,
             $sc_field_0_cond, $sc_field_0, $sc_field_0_dia, $sc_field_0_mes, $sc_field_0_ano,
             $sc_field_1_cond, $sc_field_1, $sc_field_1_dia, $sc_field_1_mes, $sc_field_1_ano,
             $policy_cond, $policy, $policy_autocomp,
             $itemtype_cond, $itemtype, $itemtype_autocomp,
             $deleted_cond, $deleted, $deleted_autocomp,
             $tempo_cond, $tempo, $tempo_autocomp,
             $asuransi_cond, $asuransi, $asuransi_autocomp,
             $marginobat_cond, $marginobat, $marginobat_autocomp,
             $markuptindakan_cond, $markuptindakan, $markuptindakan_autocomp,
             $markupobat_cond, $markupobat, $markupobat_autocomp,
             $markuplab_cond, $markuplab, $markuplab_autocomp,
             $markuprad_cond, $markuprad, $markuprad_autocomp,
             $admpolitype_cond, $admpolitype, $admpolitype_autocomp,
             $adminaptype_cond, $adminaptype, $adminaptype_autocomp,
             $admpolibaru_cond, $admpolibaru, $admpolibaru_autocomp,
             $admpolilama_cond, $admpolilama, $admpolilama_autocomp,
             $adminap_cond, $adminap, $adminap_autocomp,
             $sc_field_2_cond, $sc_field_2, $sc_field_2_dia, $sc_field_2_mes, $sc_field_2_ano,
             $marginpma_cond, $marginpma, $marginpma_autocomp,
             $withpma_cond, $withpma, $withpma_autocomp,
             $forminternal_cond, $forminternal, $forminternal_autocomp,
             $vacc_cond, $vacc, $vacc_autocomp,
             $extcode_cond, $extcode, $extcode_autocomp,
             $umum_cond, $umum, $umum_autocomp,
             $autoshow_cond, $autoshow, $autoshow_autocomp,
             $bpjs_cond, $bpjs, $bpjs_autocomp,
             $caracode_cond, $caracode, $caracode_autocomp,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tbinstansi']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_tbinstansi']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_tbinstansi']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("grid_tbinstansi", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      {
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $address = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['address']; 
          $address_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['address_cond']; 
          $instcode = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['instcode']; 
          $instcode_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['instcode_cond']; 
          $init = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['init']; 
          $init_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['init_cond']; 
          $name = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['name']; 
          $name_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['name_cond']; 
          $city = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['city']; 
          $city_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['city_cond']; 
          $phone = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['phone']; 
          $phone_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['phone_cond']; 
          $fax = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['fax']; 
          $fax_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['fax_cond']; 
          $cp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['cp']; 
          $cp_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['cp_cond']; 
          $limit = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['limit']; 
          $limit_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['limit_cond']; 
          $discount = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['discount']; 
          $discount_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['discount_cond']; 
          $sc_field_0_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_0_dia']; 
          $sc_field_0_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_0_mes']; 
          $sc_field_0_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_0_ano']; 
          $sc_field_0_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_0_cond']; 
          $sc_field_1_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_1_dia']; 
          $sc_field_1_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_1_mes']; 
          $sc_field_1_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_1_ano']; 
          $sc_field_1_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_1_cond']; 
          $policy = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['policy']; 
          $policy_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['policy_cond']; 
          $itemtype = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['itemtype']; 
          $itemtype_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['itemtype_cond']; 
          $deleted = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['deleted']; 
          $deleted_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['deleted_cond']; 
          $tempo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['tempo']; 
          $tempo_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['tempo_cond']; 
          $asuransi = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['asuransi']; 
          $asuransi_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['asuransi_cond']; 
          $marginobat = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['marginobat']; 
          $marginobat_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['marginobat_cond']; 
          $markuptindakan = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markuptindakan']; 
          $markuptindakan_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markuptindakan_cond']; 
          $markupobat = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markupobat']; 
          $markupobat_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markupobat_cond']; 
          $markuplab = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markuplab']; 
          $markuplab_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markuplab_cond']; 
          $markuprad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markuprad']; 
          $markuprad_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markuprad_cond']; 
          $admpolitype = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['admpolitype']; 
          $admpolitype_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['admpolitype_cond']; 
          $adminaptype = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['adminaptype']; 
          $adminaptype_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['adminaptype_cond']; 
          $admpolibaru = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['admpolibaru']; 
          $admpolibaru_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['admpolibaru_cond']; 
          $admpolilama = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['admpolilama']; 
          $admpolilama_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['admpolilama_cond']; 
          $adminap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['adminap']; 
          $adminap_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['adminap_cond']; 
          $sc_field_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_2_dia']; 
          $sc_field_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_2_mes']; 
          $sc_field_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_2_ano']; 
          $sc_field_2_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_2_cond']; 
          $marginpma = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['marginpma']; 
          $marginpma_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['marginpma_cond']; 
          $withpma = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['withpma']; 
          $withpma_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['withpma_cond']; 
          $forminternal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['forminternal']; 
          $forminternal_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['forminternal_cond']; 
          $vacc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['vacc']; 
          $vacc_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['vacc_cond']; 
          $extcode = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['extcode']; 
          $extcode_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['extcode_cond']; 
          $umum = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['umum']; 
          $umum_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['umum_cond']; 
          $autoshow = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['autoshow']; 
          $autoshow_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['autoshow_cond']; 
          $bpjs = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['bpjs']; 
          $bpjs_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['bpjs_cond']; 
          $caracode = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['caracode']; 
          $caracode_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['caracode_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['NM_operador']; 
      } 
      $display_aberto  = "style=display:";
      $display_fechado = "style=display:none";
      $opc_hide_input = array("nu","nn","ep","ne");
      $str_hide_address = (in_array($address_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_instcode = (in_array($instcode_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_init = (in_array($init_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_name = (in_array($name_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_city = (in_array($city_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_phone = (in_array($phone_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_fax = (in_array($fax_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_cp = (in_array($cp_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_limit = (in_array($limit_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_discount = (in_array($discount_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_sc_field_0 = (in_array($sc_field_0_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_sc_field_1 = (in_array($sc_field_1_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_policy = (in_array($policy_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_itemtype = (in_array($itemtype_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_deleted = (in_array($deleted_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_tempo = (in_array($tempo_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_asuransi = (in_array($asuransi_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_marginobat = (in_array($marginobat_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_markuptindakan = (in_array($markuptindakan_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_markupobat = (in_array($markupobat_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_markuplab = (in_array($markuplab_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_markuprad = (in_array($markuprad_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_admpolitype = (in_array($admpolitype_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_adminaptype = (in_array($adminaptype_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_admpolibaru = (in_array($admpolibaru_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_admpolilama = (in_array($admpolilama_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_adminap = (in_array($adminap_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_sc_field_2 = (in_array($sc_field_2_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_marginpma = (in_array($marginpma_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_withpma = (in_array($withpma_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_forminternal = (in_array($forminternal_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_vacc = (in_array($vacc_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_extcode = (in_array($extcode_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_umum = (in_array($umum_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_autoshow = (in_array($autoshow_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_bpjs = (in_array($bpjs_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_caracode = (in_array($caracode_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;

      if (!isset($address) || $address == "")
      {
          $address = "";
      }
      if (isset($address) && !empty($address))
      {
         $tmp_pos = strpos($address, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $address = substr($address, 0, $tmp_pos);
         }
      }
      if (!isset($instcode) || $instcode == "")
      {
          $instcode = "";
      }
      if (isset($instcode) && !empty($instcode))
      {
         $tmp_pos = strpos($instcode, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $instcode = substr($instcode, 0, $tmp_pos);
         }
      }
      if (!isset($init) || $init == "")
      {
          $init = "";
      }
      if (isset($init) && !empty($init))
      {
         $tmp_pos = strpos($init, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $init = substr($init, 0, $tmp_pos);
         }
      }
      if (!isset($name) || $name == "")
      {
          $name = "";
      }
      if (isset($name) && !empty($name))
      {
         $tmp_pos = strpos($name, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $name = substr($name, 0, $tmp_pos);
         }
      }
      if (!isset($city) || $city == "")
      {
          $city = "";
      }
      if (isset($city) && !empty($city))
      {
         $tmp_pos = strpos($city, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $city = substr($city, 0, $tmp_pos);
         }
      }
      if (!isset($phone) || $phone == "")
      {
          $phone = "";
      }
      if (isset($phone) && !empty($phone))
      {
         $tmp_pos = strpos($phone, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $phone = substr($phone, 0, $tmp_pos);
         }
      }
      if (!isset($fax) || $fax == "")
      {
          $fax = "";
      }
      if (isset($fax) && !empty($fax))
      {
         $tmp_pos = strpos($fax, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $fax = substr($fax, 0, $tmp_pos);
         }
      }
      if (!isset($cp) || $cp == "")
      {
          $cp = "";
      }
      if (isset($cp) && !empty($cp))
      {
         $tmp_pos = strpos($cp, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $cp = substr($cp, 0, $tmp_pos);
         }
      }
      if (!isset($limit) || $limit == "")
      {
          $limit = "";
      }
      if (isset($limit) && !empty($limit))
      {
         $tmp_pos = strpos($limit, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $limit = substr($limit, 0, $tmp_pos);
         }
      }
      if (!isset($discount) || $discount == "")
      {
          $discount = "";
      }
      if (isset($discount) && !empty($discount))
      {
         $tmp_pos = strpos($discount, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $discount = substr($discount, 0, $tmp_pos);
         }
      }
      if (!isset($sc_field_0) || $sc_field_0 == "")
      {
          $sc_field_0 = "";
      }
      if (isset($sc_field_0) && !empty($sc_field_0))
      {
         $tmp_pos = strpos($sc_field_0, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $sc_field_0 = substr($sc_field_0, 0, $tmp_pos);
         }
      }
      if (!isset($sc_field_1) || $sc_field_1 == "")
      {
          $sc_field_1 = "";
      }
      if (isset($sc_field_1) && !empty($sc_field_1))
      {
         $tmp_pos = strpos($sc_field_1, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $sc_field_1 = substr($sc_field_1, 0, $tmp_pos);
         }
      }
      if (!isset($policy) || $policy == "")
      {
          $policy = "";
      }
      if (isset($policy) && !empty($policy))
      {
         $tmp_pos = strpos($policy, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $policy = substr($policy, 0, $tmp_pos);
         }
      }
      if (!isset($itemtype) || $itemtype == "")
      {
          $itemtype = "";
      }
      if (isset($itemtype) && !empty($itemtype))
      {
         $tmp_pos = strpos($itemtype, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $itemtype = substr($itemtype, 0, $tmp_pos);
         }
      }
      if (!isset($deleted) || $deleted == "")
      {
          $deleted = "";
      }
      if (isset($deleted) && !empty($deleted))
      {
         $tmp_pos = strpos($deleted, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $deleted = substr($deleted, 0, $tmp_pos);
         }
      }
      if (!isset($tempo) || $tempo == "")
      {
          $tempo = "";
      }
      if (isset($tempo) && !empty($tempo))
      {
         $tmp_pos = strpos($tempo, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $tempo = substr($tempo, 0, $tmp_pos);
         }
      }
      if (!isset($asuransi) || $asuransi == "")
      {
          $asuransi = "";
      }
      if (isset($asuransi) && !empty($asuransi))
      {
         $tmp_pos = strpos($asuransi, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $asuransi = substr($asuransi, 0, $tmp_pos);
         }
      }
      if (!isset($marginobat) || $marginobat == "")
      {
          $marginobat = "";
      }
      if (isset($marginobat) && !empty($marginobat))
      {
         $tmp_pos = strpos($marginobat, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $marginobat = substr($marginobat, 0, $tmp_pos);
         }
      }
      if (!isset($markuptindakan) || $markuptindakan == "")
      {
          $markuptindakan = "";
      }
      if (isset($markuptindakan) && !empty($markuptindakan))
      {
         $tmp_pos = strpos($markuptindakan, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $markuptindakan = substr($markuptindakan, 0, $tmp_pos);
         }
      }
      if (!isset($markupobat) || $markupobat == "")
      {
          $markupobat = "";
      }
      if (isset($markupobat) && !empty($markupobat))
      {
         $tmp_pos = strpos($markupobat, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $markupobat = substr($markupobat, 0, $tmp_pos);
         }
      }
      if (!isset($markuplab) || $markuplab == "")
      {
          $markuplab = "";
      }
      if (isset($markuplab) && !empty($markuplab))
      {
         $tmp_pos = strpos($markuplab, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $markuplab = substr($markuplab, 0, $tmp_pos);
         }
      }
      if (!isset($markuprad) || $markuprad == "")
      {
          $markuprad = "";
      }
      if (isset($markuprad) && !empty($markuprad))
      {
         $tmp_pos = strpos($markuprad, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $markuprad = substr($markuprad, 0, $tmp_pos);
         }
      }
      if (!isset($admpolitype) || $admpolitype == "")
      {
          $admpolitype = "";
      }
      if (isset($admpolitype) && !empty($admpolitype))
      {
         $tmp_pos = strpos($admpolitype, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $admpolitype = substr($admpolitype, 0, $tmp_pos);
         }
      }
      if (!isset($adminaptype) || $adminaptype == "")
      {
          $adminaptype = "";
      }
      if (isset($adminaptype) && !empty($adminaptype))
      {
         $tmp_pos = strpos($adminaptype, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $adminaptype = substr($adminaptype, 0, $tmp_pos);
         }
      }
      if (!isset($admpolibaru) || $admpolibaru == "")
      {
          $admpolibaru = "";
      }
      if (isset($admpolibaru) && !empty($admpolibaru))
      {
         $tmp_pos = strpos($admpolibaru, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $admpolibaru = substr($admpolibaru, 0, $tmp_pos);
         }
      }
      if (!isset($admpolilama) || $admpolilama == "")
      {
          $admpolilama = "";
      }
      if (isset($admpolilama) && !empty($admpolilama))
      {
         $tmp_pos = strpos($admpolilama, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $admpolilama = substr($admpolilama, 0, $tmp_pos);
         }
      }
      if (!isset($adminap) || $adminap == "")
      {
          $adminap = "";
      }
      if (isset($adminap) && !empty($adminap))
      {
         $tmp_pos = strpos($adminap, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $adminap = substr($adminap, 0, $tmp_pos);
         }
      }
      if (!isset($sc_field_2) || $sc_field_2 == "")
      {
          $sc_field_2 = "";
      }
      if (isset($sc_field_2) && !empty($sc_field_2))
      {
         $tmp_pos = strpos($sc_field_2, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $sc_field_2 = substr($sc_field_2, 0, $tmp_pos);
         }
      }
      if (!isset($marginpma) || $marginpma == "")
      {
          $marginpma = "";
      }
      if (isset($marginpma) && !empty($marginpma))
      {
         $tmp_pos = strpos($marginpma, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $marginpma = substr($marginpma, 0, $tmp_pos);
         }
      }
      if (!isset($withpma) || $withpma == "")
      {
          $withpma = "";
      }
      if (isset($withpma) && !empty($withpma))
      {
         $tmp_pos = strpos($withpma, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $withpma = substr($withpma, 0, $tmp_pos);
         }
      }
      if (!isset($forminternal) || $forminternal == "")
      {
          $forminternal = "";
      }
      if (isset($forminternal) && !empty($forminternal))
      {
         $tmp_pos = strpos($forminternal, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $forminternal = substr($forminternal, 0, $tmp_pos);
         }
      }
      if (!isset($vacc) || $vacc == "")
      {
          $vacc = "";
      }
      if (isset($vacc) && !empty($vacc))
      {
         $tmp_pos = strpos($vacc, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $vacc = substr($vacc, 0, $tmp_pos);
         }
      }
      if (!isset($extcode) || $extcode == "")
      {
          $extcode = "";
      }
      if (isset($extcode) && !empty($extcode))
      {
         $tmp_pos = strpos($extcode, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $extcode = substr($extcode, 0, $tmp_pos);
         }
      }
      if (!isset($umum) || $umum == "")
      {
          $umum = "";
      }
      if (isset($umum) && !empty($umum))
      {
         $tmp_pos = strpos($umum, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $umum = substr($umum, 0, $tmp_pos);
         }
      }
      if (!isset($autoshow) || $autoshow == "")
      {
          $autoshow = "";
      }
      if (isset($autoshow) && !empty($autoshow))
      {
         $tmp_pos = strpos($autoshow, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $autoshow = substr($autoshow, 0, $tmp_pos);
         }
      }
      if (!isset($bpjs) || $bpjs == "")
      {
          $bpjs = "";
      }
      if (isset($bpjs) && !empty($bpjs))
      {
         $tmp_pos = strpos($bpjs, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $bpjs = substr($bpjs, 0, $tmp_pos);
         }
      }
      if (!isset($caracode) || $caracode == "")
      {
          $caracode = "";
      }
      if (isset($caracode) && !empty($caracode))
      {
         $tmp_pos = strpos($caracode, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $caracode = substr($caracode, 0, $tmp_pos);
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





      <TD id='SC_address_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['address'])) ? $this->New_label['address'] : "Alamat"; ?></TD>
      
      <INPUT type="hidden" id="SC_address_cond" name="address_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_address" <?php echo $str_hide_address?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['address'])) ? $this->New_label['address'] : "Alamat";
 $nmgp_tab_label .= "address?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($address != "")
      {
      $address_look = substr($this->Db->qstr($address), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct address from " . $this->Ini->nm_tabela . " where address = '$address_look' order by address"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$address]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$address];
      }
      else
      {
          $sAutocompValue = $address;
      }
?>
<INPUT  type="text" id="SC_address" name="address" value="<?php echo NM_encode_input($address) ?>"  size=50 alt="{datatype: 'text', maxLength: 32767, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_address" name="address_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 32767, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_instcode_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['instcode'])) ? $this->New_label['instcode'] : "Kode Instansi"; ?></TD>
      
      <INPUT type="hidden" id="SC_instcode_cond" name="instcode_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_instcode" <?php echo $str_hide_instcode?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['instcode'])) ? $this->New_label['instcode'] : "Kode Instansi";
 $nmgp_tab_label .= "instcode?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($instcode != "")
      {
      $instcode_look = substr($this->Db->qstr($instcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct instCode from " . $this->Ini->nm_tabela . " where instCode = '$instcode_look' order by instCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$instcode]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$instcode];
      }
      else
      {
          $sAutocompValue = $instcode;
      }
?>
<INPUT  type="text" id="SC_instcode" name="instcode" value="<?php echo NM_encode_input($instcode) ?>"  size=9 alt="{datatype: 'text', maxLength: 9, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_instcode" name="instcode_autocomp" size="9"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 9, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_init_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['init'])) ? $this->New_label['init'] : "Inisial"; ?></TD>
      
      <INPUT type="hidden" id="SC_init_cond" name="init_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_init" <?php echo $str_hide_init?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['init'])) ? $this->New_label['init'] : "Inisial";
 $nmgp_tab_label .= "init?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($init != "")
      {
      $init_look = substr($this->Db->qstr($init), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct init from " . $this->Ini->nm_tabela . " where init = '$init_look' order by init"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$init]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$init];
      }
      else
      {
          $sAutocompValue = $init;
      }
?>
<INPUT  type="text" id="SC_init" name="init" value="<?php echo NM_encode_input($init) ?>"  size=9 alt="{datatype: 'text', maxLength: 9, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_init" name="init_autocomp" size="9"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 9, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_name_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['name'])) ? $this->New_label['name'] : "Nama Instansi"; ?></TD>
      
      <INPUT type="hidden" id="SC_name_cond" name="name_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_name" <?php echo $str_hide_name?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['name'])) ? $this->New_label['name'] : "Nama Instansi";
 $nmgp_tab_label .= "name?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($name != "")
      {
      $name_look = substr($this->Db->qstr($name), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct name from " . $this->Ini->nm_tabela . " where name = '$name_look' order by name"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$name]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$name];
      }
      else
      {
          $sAutocompValue = $name;
      }
?>
<INPUT  type="text" id="SC_name" name="name" value="<?php echo NM_encode_input($name) ?>"  size=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_name" name="name_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_city_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['city'])) ? $this->New_label['city'] : "Kota"; ?></TD>
      
      <INPUT type="hidden" id="SC_city_cond" name="city_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_city" <?php echo $str_hide_city?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['city'])) ? $this->New_label['city'] : "Kota";
 $nmgp_tab_label .= "city?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($city != "")
      {
      $city_look = substr($this->Db->qstr($city), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct city from " . $this->Ini->nm_tabela . " where city = '$city_look' order by city"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$city]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$city];
      }
      else
      {
          $sAutocompValue = $city;
      }
?>
<INPUT  type="text" id="SC_city" name="city" value="<?php echo NM_encode_input($city) ?>"  size=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_city" name="city_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_phone_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['phone'])) ? $this->New_label['phone'] : "Telepon"; ?></TD>
      
      <INPUT type="hidden" id="SC_phone_cond" name="phone_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_phone" <?php echo $str_hide_phone?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['phone'])) ? $this->New_label['phone'] : "Telepon";
 $nmgp_tab_label .= "phone?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($phone != "")
      {
      $phone_look = substr($this->Db->qstr($phone), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct phone from " . $this->Ini->nm_tabela . " where phone = '$phone_look' order by phone"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$phone]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$phone];
      }
      else
      {
          $sAutocompValue = $phone;
      }
?>
<INPUT  type="text" id="SC_phone" name="phone" value="<?php echo NM_encode_input($phone) ?>"  size=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_phone" name="phone_autocomp" size="30"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 30, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_fax_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['fax'])) ? $this->New_label['fax'] : "Fax"; ?></TD>
      
      <INPUT type="hidden" id="SC_fax_cond" name="fax_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_fax" <?php echo $str_hide_fax?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['fax'])) ? $this->New_label['fax'] : "Fax";
 $nmgp_tab_label .= "fax?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($fax != "")
      {
      $fax_look = substr($this->Db->qstr($fax), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct fax from " . $this->Ini->nm_tabela . " where fax = '$fax_look' order by fax"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$fax]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$fax];
      }
      else
      {
          $sAutocompValue = $fax;
      }
?>
<INPUT  type="text" id="SC_fax" name="fax" value="<?php echo NM_encode_input($fax) ?>"  size=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_fax" name="fax_autocomp" size="15"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 15, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_cp_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['cp'])) ? $this->New_label['cp'] : "Kontak Person"; ?></TD>
      
      <INPUT type="hidden" id="SC_cp_cond" name="cp_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_cp" <?php echo $str_hide_cp?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['cp'])) ? $this->New_label['cp'] : "Kontak Person";
 $nmgp_tab_label .= "cp?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($cp != "")
      {
      $cp_look = substr($this->Db->qstr($cp), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct cp from " . $this->Ini->nm_tabela . " where cp = '$cp_look' order by cp"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$cp]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$cp];
      }
      else
      {
          $sAutocompValue = $cp;
      }
?>
<INPUT  type="text" id="SC_cp" name="cp" value="<?php echo NM_encode_input($cp) ?>"  size=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_cp" name="cp_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_limit_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['limit'])) ? $this->New_label['limit'] : "Limit"; ?></TD>
      
      <INPUT type="hidden" id="SC_limit_cond" name="limit_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_limit" <?php echo $str_hide_limit?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['limit'])) ? $this->New_label['limit'] : "Limit";
 $nmgp_tab_label .= "limit?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($limit != "")
      {
      $limit_look = substr($this->Db->qstr($limit), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($limit))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct `limit` from " . $this->Ini->nm_tabela . " where `limit` = $limit_look order by `limit`"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct `limit` from " . $this->Ini->nm_tabela . " where `limit` = $limit_look order by `limit`"; 
      }
      else
      {
          $nm_comando = "select distinct `limit` from " . $this->Ini->nm_tabela . " where `limit` = $limit_look order by `limit`"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
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
      if (isset($nmgp_def_dados[0][$limit]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$limit];
      }
      else
      {
              nmgp_Form_Num_Val($limit, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $limit;
      }
?>
<INPUT  type="text" id="SC_limit" name="limit" value="<?php echo NM_encode_input($limit) ?>" size=18 alt="{datatype: 'text', maxLength: 18, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_limit" name="limit_autocomp" size="18"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 18, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_discount_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['discount'])) ? $this->New_label['discount'] : "Discount"; ?></TD>
      
      <INPUT type="hidden" id="SC_discount_cond" name="discount_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_discount" <?php echo $str_hide_discount?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['discount'])) ? $this->New_label['discount'] : "Discount";
 $nmgp_tab_label .= "discount?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($discount != "")
      {
      $discount_look = substr($this->Db->qstr($discount), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($discount))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct discount from " . $this->Ini->nm_tabela . " where discount = $discount_look order by discount"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct discount from " . $this->Ini->nm_tabela . " where discount = $discount_look order by discount"; 
      }
      else
      {
          $nm_comando = "select distinct discount from " . $this->Ini->nm_tabela . " where discount = $discount_look order by discount"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$discount]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$discount];
      }
      else
      {
            nmgp_Form_Num_Val($discount, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $discount;
      }
?>
<INPUT  type="text" id="SC_discount" name="discount" value="<?php echo NM_encode_input($discount) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_discount" name="discount_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_sc_field_0_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Awal Kontrak"; ?></TD>
      
      <INPUT type="hidden" id="SC_sc_field_0_cond" name="sc_field_0_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_sc_field_0" <?php echo $str_hide_sc_field_0?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Awal Kontrak";
 $nmgp_tab_label .= "sc_field_0?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>

<?php
  $Form_base = "ddmmyyyy";
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
  $Arr_format = $Arr_D;
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
<span id='id_date_part_sc_field_0_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_sc_field_0_dia" name="sc_field_0_dia" value="<?php echo NM_encode_input($sc_field_0_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_sc_field_0_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_sc_field_0_mes" name="sc_field_0_mes" value="<?php echo NM_encode_input($sc_field_0_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_sc_field_0_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_sc_field_0_ano" name="sc_field_0_ano" value="<?php echo NM_encode_input($sc_field_0_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_sc_field_0"  class="scFilterFieldFontOdd">
 <?php echo $date_format_show ?>         </SPAN>
         
        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_sc_field_1_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['sc_field_1'])) ? $this->New_label['sc_field_1'] : "Kontrak Habis"; ?></TD>
      
      <INPUT type="hidden" id="SC_sc_field_1_cond" name="sc_field_1_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_sc_field_1" <?php echo $str_hide_sc_field_1?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['sc_field_1'])) ? $this->New_label['sc_field_1'] : "Kontrak Habis";
 $nmgp_tab_label .= "sc_field_1?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>

<?php
  $Form_base = "ddmmyyyy";
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
  $Arr_format = $Arr_D;
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
<span id='id_date_part_sc_field_1_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_sc_field_1_dia" name="sc_field_1_dia" value="<?php echo NM_encode_input($sc_field_1_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_sc_field_1_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_sc_field_1_mes" name="sc_field_1_mes" value="<?php echo NM_encode_input($sc_field_1_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_sc_field_1_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_sc_field_1_ano" name="sc_field_1_ano" value="<?php echo NM_encode_input($sc_field_1_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_sc_field_1"  class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
         
        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_policy_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['policy'])) ? $this->New_label['policy'] : "Policy"; ?></TD>
      
      <INPUT type="hidden" id="SC_policy_cond" name="policy_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_policy" <?php echo $str_hide_policy?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['policy'])) ? $this->New_label['policy'] : "Policy";
 $nmgp_tab_label .= "policy?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($policy != "")
      {
      $policy_look = substr($this->Db->qstr($policy), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct policy from " . $this->Ini->nm_tabela . " where policy = '$policy_look' order by policy"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$policy]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$policy];
      }
      else
      {
          $sAutocompValue = $policy;
      }
?>
<INPUT  type="text" id="SC_policy" name="policy" value="<?php echo NM_encode_input($policy) ?>"  size=50 alt="{datatype: 'text', maxLength: 32767, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_policy" name="policy_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 32767, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_itemtype_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['itemtype'])) ? $this->New_label['itemtype'] : "Item Type"; ?></TD>
      
      <INPUT type="hidden" id="SC_itemtype_cond" name="itemtype_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_itemtype" <?php echo $str_hide_itemtype?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['itemtype'])) ? $this->New_label['itemtype'] : "Item Type";
 $nmgp_tab_label .= "itemtype?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($itemtype != "")
      {
      $itemtype_look = substr($this->Db->qstr($itemtype), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($itemtype))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct itemType from " . $this->Ini->nm_tabela . " where itemType = $itemtype_look order by itemType"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct itemType from " . $this->Ini->nm_tabela . " where itemType = $itemtype_look order by itemType"; 
      }
      else
      {
          $nm_comando = "select distinct itemType from " . $this->Ini->nm_tabela . " where itemType = $itemtype_look order by itemType"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$itemtype]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$itemtype];
      }
      else
      {
            nmgp_Form_Num_Val($itemtype, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $itemtype;
      }
?>
<INPUT  type="text" id="SC_itemtype" name="itemtype" value="<?php echo NM_encode_input($itemtype) ?>" size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_itemtype" name="itemtype_autocomp" size="3"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_deleted_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['deleted'])) ? $this->New_label['deleted'] : "Deleted"; ?></TD>
      
      <INPUT type="hidden" id="SC_deleted_cond" name="deleted_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_deleted" <?php echo $str_hide_deleted?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['deleted'])) ? $this->New_label['deleted'] : "Deleted";
 $nmgp_tab_label .= "deleted?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($deleted != "")
      {
      $deleted_look = substr($this->Db->qstr($deleted), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($deleted))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct deleted from " . $this->Ini->nm_tabela . " where deleted = $deleted_look order by deleted"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct deleted from " . $this->Ini->nm_tabela . " where deleted = $deleted_look order by deleted"; 
      }
      else
      {
          $nm_comando = "select distinct deleted from " . $this->Ini->nm_tabela . " where deleted = $deleted_look order by deleted"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$deleted]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$deleted];
      }
      else
      {
            nmgp_Form_Num_Val($deleted, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $deleted;
      }
?>
<INPUT  type="text" id="SC_deleted" name="deleted" value="<?php echo NM_encode_input($deleted) ?>" size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_deleted" name="deleted_autocomp" size="3"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_tempo_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['tempo'])) ? $this->New_label['tempo'] : "Jatuh Tempo (Hari)"; ?></TD>
      
      <INPUT type="hidden" id="SC_tempo_cond" name="tempo_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_tempo" <?php echo $str_hide_tempo?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['tempo'])) ? $this->New_label['tempo'] : "Jatuh Tempo (Hari)";
 $nmgp_tab_label .= "tempo?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($tempo != "")
      {
      $tempo_look = substr($this->Db->qstr($tempo), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($tempo))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct tempo from " . $this->Ini->nm_tabela . " where tempo = $tempo_look order by tempo"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct tempo from " . $this->Ini->nm_tabela . " where tempo = $tempo_look order by tempo"; 
      }
      else
      {
          $nm_comando = "select distinct tempo from " . $this->Ini->nm_tabela . " where tempo = $tempo_look order by tempo"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$tempo]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$tempo];
      }
      else
      {
            nmgp_Form_Num_Val($tempo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $tempo;
      }
?>
<INPUT  type="text" id="SC_tempo" name="tempo" value="<?php echo NM_encode_input($tempo) ?>" size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_tempo" name="tempo_autocomp" size="11"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_asuransi_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['asuransi'])) ? $this->New_label['asuransi'] : "Asuransi"; ?></TD>
      
      <INPUT type="hidden" id="SC_asuransi_cond" name="asuransi_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_asuransi" <?php echo $str_hide_asuransi?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['asuransi'])) ? $this->New_label['asuransi'] : "Asuransi";
 $nmgp_tab_label .= "asuransi?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($asuransi != "")
      {
      $asuransi_look = substr($this->Db->qstr($asuransi), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($asuransi))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct asuransi from " . $this->Ini->nm_tabela . " where asuransi = $asuransi_look order by asuransi"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct asuransi from " . $this->Ini->nm_tabela . " where asuransi = $asuransi_look order by asuransi"; 
      }
      else
      {
          $nm_comando = "select distinct asuransi from " . $this->Ini->nm_tabela . " where asuransi = $asuransi_look order by asuransi"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$asuransi]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$asuransi];
      }
      else
      {
            nmgp_Form_Num_Val($asuransi, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $asuransi;
      }
?>
<INPUT  type="text" id="SC_asuransi" name="asuransi" value="<?php echo NM_encode_input($asuransi) ?>" size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_asuransi" name="asuransi_autocomp" size="11"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_marginobat_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['marginobat'])) ? $this->New_label['marginobat'] : "Margin Obat"; ?></TD>
      
      <INPUT type="hidden" id="SC_marginobat_cond" name="marginobat_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_marginobat" <?php echo $str_hide_marginobat?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['marginobat'])) ? $this->New_label['marginobat'] : "Margin Obat";
 $nmgp_tab_label .= "marginobat?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($marginobat != "")
      {
      $marginobat_look = substr($this->Db->qstr($marginobat), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($marginobat))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct marginObat from " . $this->Ini->nm_tabela . " where marginObat = $marginobat_look order by marginObat"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct marginObat from " . $this->Ini->nm_tabela . " where marginObat = $marginobat_look order by marginObat"; 
      }
      else
      {
          $nm_comando = "select distinct marginObat from " . $this->Ini->nm_tabela . " where marginObat = $marginobat_look order by marginObat"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$marginobat]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$marginobat];
      }
      else
      {
            nmgp_Form_Num_Val($marginobat, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $marginobat;
      }
?>
<INPUT  type="text" id="SC_marginobat" name="marginobat" value="<?php echo NM_encode_input($marginobat) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_marginobat" name="marginobat_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_markuptindakan_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['markuptindakan'])) ? $this->New_label['markuptindakan'] : "Markup Tindakan"; ?></TD>
      
      <INPUT type="hidden" id="SC_markuptindakan_cond" name="markuptindakan_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_markuptindakan" <?php echo $str_hide_markuptindakan?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['markuptindakan'])) ? $this->New_label['markuptindakan'] : "Markup Tindakan";
 $nmgp_tab_label .= "markuptindakan?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($markuptindakan != "")
      {
      $markuptindakan_look = substr($this->Db->qstr($markuptindakan), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($markuptindakan))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct markupTindakan from " . $this->Ini->nm_tabela . " where markupTindakan = $markuptindakan_look order by markupTindakan"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct markupTindakan from " . $this->Ini->nm_tabela . " where markupTindakan = $markuptindakan_look order by markupTindakan"; 
      }
      else
      {
          $nm_comando = "select distinct markupTindakan from " . $this->Ini->nm_tabela . " where markupTindakan = $markuptindakan_look order by markupTindakan"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$markuptindakan]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$markuptindakan];
      }
      else
      {
            nmgp_Form_Num_Val($markuptindakan, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $markuptindakan;
      }
?>
<INPUT  type="text" id="SC_markuptindakan" name="markuptindakan" value="<?php echo NM_encode_input($markuptindakan) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_markuptindakan" name="markuptindakan_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_markupobat_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['markupobat'])) ? $this->New_label['markupobat'] : "Markup Obat"; ?></TD>
      
      <INPUT type="hidden" id="SC_markupobat_cond" name="markupobat_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_markupobat" <?php echo $str_hide_markupobat?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['markupobat'])) ? $this->New_label['markupobat'] : "Markup Obat";
 $nmgp_tab_label .= "markupobat?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($markupobat != "")
      {
      $markupobat_look = substr($this->Db->qstr($markupobat), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($markupobat))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct markupObat from " . $this->Ini->nm_tabela . " where markupObat = $markupobat_look order by markupObat"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct markupObat from " . $this->Ini->nm_tabela . " where markupObat = $markupobat_look order by markupObat"; 
      }
      else
      {
          $nm_comando = "select distinct markupObat from " . $this->Ini->nm_tabela . " where markupObat = $markupobat_look order by markupObat"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$markupobat]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$markupobat];
      }
      else
      {
            nmgp_Form_Num_Val($markupobat, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $markupobat;
      }
?>
<INPUT  type="text" id="SC_markupobat" name="markupobat" value="<?php echo NM_encode_input($markupobat) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_markupobat" name="markupobat_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_markuplab_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['markuplab'])) ? $this->New_label['markuplab'] : "Markup Lab"; ?></TD>
      
      <INPUT type="hidden" id="SC_markuplab_cond" name="markuplab_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_markuplab" <?php echo $str_hide_markuplab?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['markuplab'])) ? $this->New_label['markuplab'] : "Markup Lab";
 $nmgp_tab_label .= "markuplab?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($markuplab != "")
      {
      $markuplab_look = substr($this->Db->qstr($markuplab), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($markuplab))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct markupLab from " . $this->Ini->nm_tabela . " where markupLab = $markuplab_look order by markupLab"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct markupLab from " . $this->Ini->nm_tabela . " where markupLab = $markuplab_look order by markupLab"; 
      }
      else
      {
          $nm_comando = "select distinct markupLab from " . $this->Ini->nm_tabela . " where markupLab = $markuplab_look order by markupLab"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$markuplab]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$markuplab];
      }
      else
      {
            nmgp_Form_Num_Val($markuplab, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $markuplab;
      }
?>
<INPUT  type="text" id="SC_markuplab" name="markuplab" value="<?php echo NM_encode_input($markuplab) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_markuplab" name="markuplab_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_markuprad_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['markuprad'])) ? $this->New_label['markuprad'] : "Markup Rad"; ?></TD>
      
      <INPUT type="hidden" id="SC_markuprad_cond" name="markuprad_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_markuprad" <?php echo $str_hide_markuprad?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['markuprad'])) ? $this->New_label['markuprad'] : "Markup Rad";
 $nmgp_tab_label .= "markuprad?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($markuprad != "")
      {
      $markuprad_look = substr($this->Db->qstr($markuprad), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($markuprad))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct markupRad from " . $this->Ini->nm_tabela . " where markupRad = $markuprad_look order by markupRad"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct markupRad from " . $this->Ini->nm_tabela . " where markupRad = $markuprad_look order by markupRad"; 
      }
      else
      {
          $nm_comando = "select distinct markupRad from " . $this->Ini->nm_tabela . " where markupRad = $markuprad_look order by markupRad"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$markuprad]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$markuprad];
      }
      else
      {
            nmgp_Form_Num_Val($markuprad, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $markuprad;
      }
?>
<INPUT  type="text" id="SC_markuprad" name="markuprad" value="<?php echo NM_encode_input($markuprad) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_markuprad" name="markuprad_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_admpolitype_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['admpolitype'])) ? $this->New_label['admpolitype'] : "Adm Poli Type"; ?></TD>
      
      <INPUT type="hidden" id="SC_admpolitype_cond" name="admpolitype_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_admpolitype" <?php echo $str_hide_admpolitype?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['admpolitype'])) ? $this->New_label['admpolitype'] : "Adm Poli Type";
 $nmgp_tab_label .= "admpolitype?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($admpolitype != "")
      {
      $admpolitype_look = substr($this->Db->qstr($admpolitype), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($admpolitype))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admPoliType from " . $this->Ini->nm_tabela . " where admPoliType = $admpolitype_look order by admPoliType"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admPoliType from " . $this->Ini->nm_tabela . " where admPoliType = $admpolitype_look order by admPoliType"; 
      }
      else
      {
          $nm_comando = "select distinct admPoliType from " . $this->Ini->nm_tabela . " where admPoliType = $admpolitype_look order by admPoliType"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$admpolitype]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$admpolitype];
      }
      else
      {
            nmgp_Form_Num_Val($admpolitype, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $admpolitype;
      }
?>
<INPUT  type="text" id="SC_admpolitype" name="admpolitype" value="<?php echo NM_encode_input($admpolitype) ?>" size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_admpolitype" name="admpolitype_autocomp" size="3"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_adminaptype_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['adminaptype'])) ? $this->New_label['adminaptype'] : "Adm Inap Type"; ?></TD>
      
      <INPUT type="hidden" id="SC_adminaptype_cond" name="adminaptype_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_adminaptype" <?php echo $str_hide_adminaptype?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['adminaptype'])) ? $this->New_label['adminaptype'] : "Adm Inap Type";
 $nmgp_tab_label .= "adminaptype?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($adminaptype != "")
      {
      $adminaptype_look = substr($this->Db->qstr($adminaptype), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($adminaptype))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admInapType from " . $this->Ini->nm_tabela . " where admInapType = $adminaptype_look order by admInapType"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admInapType from " . $this->Ini->nm_tabela . " where admInapType = $adminaptype_look order by admInapType"; 
      }
      else
      {
          $nm_comando = "select distinct admInapType from " . $this->Ini->nm_tabela . " where admInapType = $adminaptype_look order by admInapType"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$adminaptype]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$adminaptype];
      }
      else
      {
            nmgp_Form_Num_Val($adminaptype, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $adminaptype;
      }
?>
<INPUT  type="text" id="SC_adminaptype" name="adminaptype" value="<?php echo NM_encode_input($adminaptype) ?>" size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_adminaptype" name="adminaptype_autocomp" size="3"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_admpolibaru_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['admpolibaru'])) ? $this->New_label['admpolibaru'] : "Adm Poli Baru"; ?></TD>
      
      <INPUT type="hidden" id="SC_admpolibaru_cond" name="admpolibaru_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_admpolibaru" <?php echo $str_hide_admpolibaru?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['admpolibaru'])) ? $this->New_label['admpolibaru'] : "Adm Poli Baru";
 $nmgp_tab_label .= "admpolibaru?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($admpolibaru != "")
      {
      $admpolibaru_look = substr($this->Db->qstr($admpolibaru), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($admpolibaru))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admPoliBaru from " . $this->Ini->nm_tabela . " where admPoliBaru = $admpolibaru_look order by admPoliBaru"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admPoliBaru from " . $this->Ini->nm_tabela . " where admPoliBaru = $admpolibaru_look order by admPoliBaru"; 
      }
      else
      {
          $nm_comando = "select distinct admPoliBaru from " . $this->Ini->nm_tabela . " where admPoliBaru = $admpolibaru_look order by admPoliBaru"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$admpolibaru]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$admpolibaru];
      }
      else
      {
            nmgp_Form_Num_Val($admpolibaru, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $admpolibaru;
      }
?>
<INPUT  type="text" id="SC_admpolibaru" name="admpolibaru" value="<?php echo NM_encode_input($admpolibaru) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_admpolibaru" name="admpolibaru_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_admpolilama_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['admpolilama'])) ? $this->New_label['admpolilama'] : "Adm Poli Lama"; ?></TD>
      
      <INPUT type="hidden" id="SC_admpolilama_cond" name="admpolilama_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_admpolilama" <?php echo $str_hide_admpolilama?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['admpolilama'])) ? $this->New_label['admpolilama'] : "Adm Poli Lama";
 $nmgp_tab_label .= "admpolilama?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($admpolilama != "")
      {
      $admpolilama_look = substr($this->Db->qstr($admpolilama), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($admpolilama))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admPoliLama from " . $this->Ini->nm_tabela . " where admPoliLama = $admpolilama_look order by admPoliLama"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admPoliLama from " . $this->Ini->nm_tabela . " where admPoliLama = $admpolilama_look order by admPoliLama"; 
      }
      else
      {
          $nm_comando = "select distinct admPoliLama from " . $this->Ini->nm_tabela . " where admPoliLama = $admpolilama_look order by admPoliLama"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$admpolilama]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$admpolilama];
      }
      else
      {
            nmgp_Form_Num_Val($admpolilama, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $admpolilama;
      }
?>
<INPUT  type="text" id="SC_admpolilama" name="admpolilama" value="<?php echo NM_encode_input($admpolilama) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_admpolilama" name="admpolilama_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_adminap_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['adminap'])) ? $this->New_label['adminap'] : "Adm Inap"; ?></TD>
      
      <INPUT type="hidden" id="SC_adminap_cond" name="adminap_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_adminap" <?php echo $str_hide_adminap?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['adminap'])) ? $this->New_label['adminap'] : "Adm Inap";
 $nmgp_tab_label .= "adminap?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($adminap != "")
      {
      $adminap_look = substr($this->Db->qstr($adminap), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($adminap))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admInap from " . $this->Ini->nm_tabela . " where admInap = $adminap_look order by admInap"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admInap from " . $this->Ini->nm_tabela . " where admInap = $adminap_look order by admInap"; 
      }
      else
      {
          $nm_comando = "select distinct admInap from " . $this->Ini->nm_tabela . " where admInap = $adminap_look order by admInap"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$adminap]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$adminap];
      }
      else
      {
            nmgp_Form_Num_Val($adminap, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $adminap;
      }
?>
<INPUT  type="text" id="SC_adminap" name="adminap" value="<?php echo NM_encode_input($adminap) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_adminap" name="adminap_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_sc_field_2_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['sc_field_2'])) ? $this->New_label['sc_field_2'] : "Terakhir Diupdate"; ?></TD>
      
      <INPUT type="hidden" id="SC_sc_field_2_cond" name="sc_field_2_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_sc_field_2" <?php echo $str_hide_sc_field_2?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['sc_field_2'])) ? $this->New_label['sc_field_2'] : "Terakhir Diupdate";
 $nmgp_tab_label .= "sc_field_2?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>

<?php
  $Form_base = "ddmmyyyy";
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
  $Arr_format = $Arr_D;
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
<span id='id_date_part_sc_field_2_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_sc_field_2_dia" name="sc_field_2_dia" value="<?php echo NM_encode_input($sc_field_2_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_sc_field_2_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_sc_field_2_mes" name="sc_field_2_mes" value="<?php echo NM_encode_input($sc_field_2_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_sc_field_2_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_sc_field_2_ano" name="sc_field_2_ano" value="<?php echo NM_encode_input($sc_field_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_sc_field_2"  class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
         
        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_marginpma_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['marginpma'])) ? $this->New_label['marginpma'] : "Margin PMA"; ?></TD>
      
      <INPUT type="hidden" id="SC_marginpma_cond" name="marginpma_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_marginpma" <?php echo $str_hide_marginpma?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['marginpma'])) ? $this->New_label['marginpma'] : "Margin PMA";
 $nmgp_tab_label .= "marginpma?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($marginpma != "")
      {
      $marginpma_look = substr($this->Db->qstr($marginpma), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($marginpma))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct marginPMA from " . $this->Ini->nm_tabela . " where marginPMA = $marginpma_look order by marginPMA"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct marginPMA from " . $this->Ini->nm_tabela . " where marginPMA = $marginpma_look order by marginPMA"; 
      }
      else
      {
          $nm_comando = "select distinct marginPMA from " . $this->Ini->nm_tabela . " where marginPMA = $marginpma_look order by marginPMA"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$marginpma]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$marginpma];
      }
      else
      {
            nmgp_Form_Num_Val($marginpma, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $marginpma;
      }
?>
<INPUT  type="text" id="SC_marginpma" name="marginpma" value="<?php echo NM_encode_input($marginpma) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_marginpma" name="marginpma_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_withpma_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['withpma'])) ? $this->New_label['withpma'] : "With PMA"; ?></TD>
      
      <INPUT type="hidden" id="SC_withpma_cond" name="withpma_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_withpma" <?php echo $str_hide_withpma?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['withpma'])) ? $this->New_label['withpma'] : "With PMA";
 $nmgp_tab_label .= "withpma?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($withpma != "")
      {
      $withpma_look = substr($this->Db->qstr($withpma), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($withpma))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct withPMA from " . $this->Ini->nm_tabela . " where withPMA = $withpma_look order by withPMA"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct withPMA from " . $this->Ini->nm_tabela . " where withPMA = $withpma_look order by withPMA"; 
      }
      else
      {
          $nm_comando = "select distinct withPMA from " . $this->Ini->nm_tabela . " where withPMA = $withpma_look order by withPMA"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$withpma]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$withpma];
      }
      else
      {
            nmgp_Form_Num_Val($withpma, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $withpma;
      }
?>
<INPUT  type="text" id="SC_withpma" name="withpma" value="<?php echo NM_encode_input($withpma) ?>" size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_withpma" name="withpma_autocomp" size="11"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_forminternal_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['forminternal'])) ? $this->New_label['forminternal'] : "Form Internal"; ?></TD>
      
      <INPUT type="hidden" id="SC_forminternal_cond" name="forminternal_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_forminternal" <?php echo $str_hide_forminternal?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['forminternal'])) ? $this->New_label['forminternal'] : "Form Internal";
 $nmgp_tab_label .= "forminternal?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($forminternal != "")
      {
      $forminternal_look = substr($this->Db->qstr($forminternal), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($forminternal))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct formInternal from " . $this->Ini->nm_tabela . " where formInternal = $forminternal_look order by formInternal"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct formInternal from " . $this->Ini->nm_tabela . " where formInternal = $forminternal_look order by formInternal"; 
      }
      else
      {
          $nm_comando = "select distinct formInternal from " . $this->Ini->nm_tabela . " where formInternal = $forminternal_look order by formInternal"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$forminternal]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$forminternal];
      }
      else
      {
            nmgp_Form_Num_Val($forminternal, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $forminternal;
      }
?>
<INPUT  type="text" id="SC_forminternal" name="forminternal" value="<?php echo NM_encode_input($forminternal) ?>" size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_forminternal" name="forminternal_autocomp" size="11"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_vacc_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['vacc'])) ? $this->New_label['vacc'] : "V Acc"; ?></TD>
      
      <INPUT type="hidden" id="SC_vacc_cond" name="vacc_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_vacc" <?php echo $str_hide_vacc?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['vacc'])) ? $this->New_label['vacc'] : "V Acc";
 $nmgp_tab_label .= "vacc?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($vacc != "")
      {
      $vacc_look = substr($this->Db->qstr($vacc), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct vAcc from " . $this->Ini->nm_tabela . " where vAcc = '$vacc_look' order by vAcc"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$vacc]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$vacc];
      }
      else
      {
          $sAutocompValue = $vacc;
      }
?>
<INPUT  type="text" id="SC_vacc" name="vacc" value="<?php echo NM_encode_input($vacc) ?>"  size=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_vacc" name="vacc_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_extcode_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['extcode'])) ? $this->New_label['extcode'] : "Ext Code"; ?></TD>
      
      <INPUT type="hidden" id="SC_extcode_cond" name="extcode_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_extcode" <?php echo $str_hide_extcode?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['extcode'])) ? $this->New_label['extcode'] : "Ext Code";
 $nmgp_tab_label .= "extcode?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($extcode != "")
      {
      $extcode_look = substr($this->Db->qstr($extcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct extCode from " . $this->Ini->nm_tabela . " where extCode = '$extcode_look' order by extCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$extcode]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$extcode];
      }
      else
      {
          $sAutocompValue = $extcode;
      }
?>
<INPUT  type="text" id="SC_extcode" name="extcode" value="<?php echo NM_encode_input($extcode) ?>"  size=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_extcode" name="extcode_autocomp" size="10"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_umum_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['umum'])) ? $this->New_label['umum'] : "Umum"; ?></TD>
      
      <INPUT type="hidden" id="SC_umum_cond" name="umum_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_umum" <?php echo $str_hide_umum?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['umum'])) ? $this->New_label['umum'] : "Umum";
 $nmgp_tab_label .= "umum?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($umum != "")
      {
      $umum_look = substr($this->Db->qstr($umum), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($umum))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct umum from " . $this->Ini->nm_tabela . " where umum = $umum_look order by umum"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct umum from " . $this->Ini->nm_tabela . " where umum = $umum_look order by umum"; 
      }
      else
      {
          $nm_comando = "select distinct umum from " . $this->Ini->nm_tabela . " where umum = $umum_look order by umum"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$umum]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$umum];
      }
      else
      {
            nmgp_Form_Num_Val($umum, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $umum;
      }
?>
<INPUT  type="text" id="SC_umum" name="umum" value="<?php echo NM_encode_input($umum) ?>" size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_umum" name="umum_autocomp" size="11"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_autoshow_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['autoshow'])) ? $this->New_label['autoshow'] : "Auto Show"; ?></TD>
      
      <INPUT type="hidden" id="SC_autoshow_cond" name="autoshow_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_autoshow" <?php echo $str_hide_autoshow?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['autoshow'])) ? $this->New_label['autoshow'] : "Auto Show";
 $nmgp_tab_label .= "autoshow?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($autoshow != "")
      {
      $autoshow_look = substr($this->Db->qstr($autoshow), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($autoshow))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct autoShow from " . $this->Ini->nm_tabela . " where autoShow = $autoshow_look order by autoShow"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct autoShow from " . $this->Ini->nm_tabela . " where autoShow = $autoshow_look order by autoShow"; 
      }
      else
      {
          $nm_comando = "select distinct autoShow from " . $this->Ini->nm_tabela . " where autoShow = $autoshow_look order by autoShow"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$autoshow]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$autoshow];
      }
      else
      {
            nmgp_Form_Num_Val($autoshow, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $autoshow;
      }
?>
<INPUT  type="text" id="SC_autoshow" name="autoshow" value="<?php echo NM_encode_input($autoshow) ?>" size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_autoshow" name="autoshow_autocomp" size="3"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_bpjs_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['bpjs'])) ? $this->New_label['bpjs'] : "Bpjs"; ?></TD>
      
      <INPUT type="hidden" id="SC_bpjs_cond" name="bpjs_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_bpjs" <?php echo $str_hide_bpjs?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['bpjs'])) ? $this->New_label['bpjs'] : "Bpjs";
 $nmgp_tab_label .= "bpjs?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($bpjs != "")
      {
      $bpjs_look = substr($this->Db->qstr($bpjs), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($bpjs))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct bpjs from " . $this->Ini->nm_tabela . " where bpjs = $bpjs_look order by bpjs"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct bpjs from " . $this->Ini->nm_tabela . " where bpjs = $bpjs_look order by bpjs"; 
      }
      else
      {
          $nm_comando = "select distinct bpjs from " . $this->Ini->nm_tabela . " where bpjs = $bpjs_look order by bpjs"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$bpjs]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$bpjs];
      }
      else
      {
            nmgp_Form_Num_Val($bpjs, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $bpjs;
      }
?>
<INPUT  type="text" id="SC_bpjs" name="bpjs" value="<?php echo NM_encode_input($bpjs) ?>" size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_bpjs" name="bpjs_autocomp" size="11"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_caracode_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['caracode'])) ? $this->New_label['caracode'] : "Cara Code"; ?></TD>
      
      <INPUT type="hidden" id="SC_caracode_cond" name="caracode_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_caracode" <?php echo $str_hide_caracode?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['caracode'])) ? $this->New_label['caracode'] : "Cara Code";
 $nmgp_tab_label .= "caracode?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($caracode != "")
      {
      $caracode_look = substr($this->Db->qstr($caracode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct caraCode from " . $this->Ini->nm_tabela . " where caraCode = '$caracode_look' order by caraCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
      if (isset($nmgp_def_dados[0][$caracode]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$caracode];
      }
      else
      {
          $sAutocompValue = $caracode;
      }
?>
<INPUT  type="text" id="SC_caracode" name="caracode" value="<?php echo NM_encode_input($caracode) ?>"  size=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_caracode" name="caracode_autocomp" size="10"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


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
   if (is_file("grid_tbinstansi_help.txt"))
   {
      $Arq_WebHelp = file("grid_tbinstansi_help.txt"); 
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
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tbinstansi']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_tbinstansi']['start'] == 'filter' && $nm_apl_dependente != 1)
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
   if (is_file("grid_tbinstansi_help.txt"))
   {
      $Arq_WebHelp = file("grid_tbinstansi_help.txt"); 
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
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tbinstansi']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_tbinstansi']['start'] == 'filter' && $nm_apl_dependente != 1)
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
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tbinstansi']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_tbinstansi']['start'] == 'filter')
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['orig_pesq'] == "grid")
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
<SCRIPT type="text/javascript">
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
   nm_campos_between(document.getElementById('id_vis_address'), document.F1.address_cond, 'address');
   document.F1.address.value = "";
   document.F1.address_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_instcode'), document.F1.instcode_cond, 'instcode');
   document.F1.instcode.value = "";
   document.F1.instcode_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_init'), document.F1.init_cond, 'init');
   document.F1.init.value = "";
   document.F1.init_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_name'), document.F1.name_cond, 'name');
   document.F1.name.value = "";
   document.F1.name_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_city'), document.F1.city_cond, 'city');
   document.F1.city.value = "";
   document.F1.city_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_phone'), document.F1.phone_cond, 'phone');
   document.F1.phone.value = "";
   document.F1.phone_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_fax'), document.F1.fax_cond, 'fax');
   document.F1.fax.value = "";
   document.F1.fax_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_cp'), document.F1.cp_cond, 'cp');
   document.F1.cp.value = "";
   document.F1.cp_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_limit'), document.F1.limit_cond, 'limit');
   document.F1.limit.value = "";
   document.F1.limit_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_discount'), document.F1.discount_cond, 'discount');
   document.F1.discount.value = "";
   document.F1.discount_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_sc_field_0'), document.F1.sc_field_0_cond, 'sc_field_0');
   document.F1.sc_field_0_dia.value = "";
   document.F1.sc_field_0_mes.value = "";
   document.F1.sc_field_0_ano.value = "";
   nm_campos_between(document.getElementById('id_vis_sc_field_1'), document.F1.sc_field_1_cond, 'sc_field_1');
   document.F1.sc_field_1_dia.value = "";
   document.F1.sc_field_1_mes.value = "";
   document.F1.sc_field_1_ano.value = "";
   nm_campos_between(document.getElementById('id_vis_policy'), document.F1.policy_cond, 'policy');
   document.F1.policy.value = "";
   document.F1.policy_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_itemtype'), document.F1.itemtype_cond, 'itemtype');
   document.F1.itemtype.value = "";
   document.F1.itemtype_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_deleted'), document.F1.deleted_cond, 'deleted');
   document.F1.deleted.value = "";
   document.F1.deleted_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_tempo'), document.F1.tempo_cond, 'tempo');
   document.F1.tempo.value = "";
   document.F1.tempo_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_asuransi'), document.F1.asuransi_cond, 'asuransi');
   document.F1.asuransi.value = "";
   document.F1.asuransi_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_marginobat'), document.F1.marginobat_cond, 'marginobat');
   document.F1.marginobat.value = "";
   document.F1.marginobat_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_markuptindakan'), document.F1.markuptindakan_cond, 'markuptindakan');
   document.F1.markuptindakan.value = "";
   document.F1.markuptindakan_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_markupobat'), document.F1.markupobat_cond, 'markupobat');
   document.F1.markupobat.value = "";
   document.F1.markupobat_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_markuplab'), document.F1.markuplab_cond, 'markuplab');
   document.F1.markuplab.value = "";
   document.F1.markuplab_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_markuprad'), document.F1.markuprad_cond, 'markuprad');
   document.F1.markuprad.value = "";
   document.F1.markuprad_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_admpolitype'), document.F1.admpolitype_cond, 'admpolitype');
   document.F1.admpolitype.value = "";
   document.F1.admpolitype_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_adminaptype'), document.F1.adminaptype_cond, 'adminaptype');
   document.F1.adminaptype.value = "";
   document.F1.adminaptype_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_admpolibaru'), document.F1.admpolibaru_cond, 'admpolibaru');
   document.F1.admpolibaru.value = "";
   document.F1.admpolibaru_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_admpolilama'), document.F1.admpolilama_cond, 'admpolilama');
   document.F1.admpolilama.value = "";
   document.F1.admpolilama_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_adminap'), document.F1.adminap_cond, 'adminap');
   document.F1.adminap.value = "";
   document.F1.adminap_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_sc_field_2'), document.F1.sc_field_2_cond, 'sc_field_2');
   document.F1.sc_field_2_dia.value = "";
   document.F1.sc_field_2_mes.value = "";
   document.F1.sc_field_2_ano.value = "";
   nm_campos_between(document.getElementById('id_vis_marginpma'), document.F1.marginpma_cond, 'marginpma');
   document.F1.marginpma.value = "";
   document.F1.marginpma_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_withpma'), document.F1.withpma_cond, 'withpma');
   document.F1.withpma.value = "";
   document.F1.withpma_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_forminternal'), document.F1.forminternal_cond, 'forminternal');
   document.F1.forminternal.value = "";
   document.F1.forminternal_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_vacc'), document.F1.vacc_cond, 'vacc');
   document.F1.vacc.value = "";
   document.F1.vacc_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_extcode'), document.F1.extcode_cond, 'extcode');
   document.F1.extcode.value = "";
   document.F1.extcode_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_umum'), document.F1.umum_cond, 'umum');
   document.F1.umum.value = "";
   document.F1.umum_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_autoshow'), document.F1.autoshow_cond, 'autoshow');
   document.F1.autoshow.value = "";
   document.F1.autoshow_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_bpjs'), document.F1.bpjs_cond, 'bpjs');
   document.F1.bpjs.value = "";
   document.F1.bpjs_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_caracode'), document.F1.caracode_cond, 'caracode');
   document.F1.caracode.value = "";
   document.F1.caracode_autocomp.value = "";
 }
 function SC_carga_evt_jquery()
 {
    $('#SC_sc_field_0_dia').bind('change', function() {sc_grid_tbinstansi_valida_dia(this)});
    $('#SC_sc_field_0_mes').bind('change', function() {sc_grid_tbinstansi_valida_mes(this)});
    $('#SC_sc_field_1_dia').bind('change', function() {sc_grid_tbinstansi_valida_dia(this)});
    $('#SC_sc_field_1_mes').bind('change', function() {sc_grid_tbinstansi_valida_mes(this)});
    $('#SC_sc_field_2_dia').bind('change', function() {sc_grid_tbinstansi_valida_dia(this)});
    $('#SC_sc_field_2_mes').bind('change', function() {sc_grid_tbinstansi_valida_mes(this)});
 }
 function sc_grid_tbinstansi_valida_dia(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 31))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_iday'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_tbinstansi_valida_mes(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 12))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mnth'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
</SCRIPT>
</BODY>
</HTML>
<?php
   }

   function gera_array_filtros()
   {
       $this->NM_fil_ant = array();
       $NM_patch   = "simrskreatifmedia/grid_tbinstansi";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] = "";
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_orig']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_orig'] = "";
      }
      $this->comando        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_orig'];
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
          $NM_patch .= "grid_tbinstansi/";
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
      $tp_fields['SC_address_cond'] = 'cond';
      $tp_fields['SC_address'] = 'text_aut';
      $tp_fields['id_ac_address'] = 'text_aut';
      $tp_fields['SC_instcode_cond'] = 'cond';
      $tp_fields['SC_instcode'] = 'text_aut';
      $tp_fields['id_ac_instcode'] = 'text_aut';
      $tp_fields['SC_init_cond'] = 'cond';
      $tp_fields['SC_init'] = 'text_aut';
      $tp_fields['id_ac_init'] = 'text_aut';
      $tp_fields['SC_name_cond'] = 'cond';
      $tp_fields['SC_name'] = 'text_aut';
      $tp_fields['id_ac_name'] = 'text_aut';
      $tp_fields['SC_city_cond'] = 'cond';
      $tp_fields['SC_city'] = 'text_aut';
      $tp_fields['id_ac_city'] = 'text_aut';
      $tp_fields['SC_phone_cond'] = 'cond';
      $tp_fields['SC_phone'] = 'text_aut';
      $tp_fields['id_ac_phone'] = 'text_aut';
      $tp_fields['SC_fax_cond'] = 'cond';
      $tp_fields['SC_fax'] = 'text_aut';
      $tp_fields['id_ac_fax'] = 'text_aut';
      $tp_fields['SC_cp_cond'] = 'cond';
      $tp_fields['SC_cp'] = 'text_aut';
      $tp_fields['id_ac_cp'] = 'text_aut';
      $tp_fields['SC_limit_cond'] = 'cond';
      $tp_fields['SC_limit'] = 'text_aut';
      $tp_fields['id_ac_limit'] = 'text_aut';
      $tp_fields['SC_discount_cond'] = 'cond';
      $tp_fields['SC_discount'] = 'text_aut';
      $tp_fields['id_ac_discount'] = 'text_aut';
      $tp_fields['SC_sc_field_0_cond'] = 'cond';
      $tp_fields['SC_sc_field_0_dia'] = 'text';
      $tp_fields['SC_sc_field_0_mes'] = 'text';
      $tp_fields['SC_sc_field_0_ano'] = 'text';
      $tp_fields['SC_sc_field_0_input_2_dia'] = 'text';
      $tp_fields['SC_sc_field_0_input_2_mes'] = 'text';
      $tp_fields['SC_sc_field_0_input_2_ano'] = 'text';
      $tp_fields['SC_sc_field_1_cond'] = 'cond';
      $tp_fields['SC_sc_field_1_dia'] = 'text';
      $tp_fields['SC_sc_field_1_mes'] = 'text';
      $tp_fields['SC_sc_field_1_ano'] = 'text';
      $tp_fields['SC_sc_field_1_input_2_dia'] = 'text';
      $tp_fields['SC_sc_field_1_input_2_mes'] = 'text';
      $tp_fields['SC_sc_field_1_input_2_ano'] = 'text';
      $tp_fields['SC_policy_cond'] = 'cond';
      $tp_fields['SC_policy'] = 'text_aut';
      $tp_fields['id_ac_policy'] = 'text_aut';
      $tp_fields['SC_itemtype_cond'] = 'cond';
      $tp_fields['SC_itemtype'] = 'text_aut';
      $tp_fields['id_ac_itemtype'] = 'text_aut';
      $tp_fields['SC_deleted_cond'] = 'cond';
      $tp_fields['SC_deleted'] = 'text_aut';
      $tp_fields['id_ac_deleted'] = 'text_aut';
      $tp_fields['SC_tempo_cond'] = 'cond';
      $tp_fields['SC_tempo'] = 'text_aut';
      $tp_fields['id_ac_tempo'] = 'text_aut';
      $tp_fields['SC_asuransi_cond'] = 'cond';
      $tp_fields['SC_asuransi'] = 'text_aut';
      $tp_fields['id_ac_asuransi'] = 'text_aut';
      $tp_fields['SC_marginobat_cond'] = 'cond';
      $tp_fields['SC_marginobat'] = 'text_aut';
      $tp_fields['id_ac_marginobat'] = 'text_aut';
      $tp_fields['SC_markuptindakan_cond'] = 'cond';
      $tp_fields['SC_markuptindakan'] = 'text_aut';
      $tp_fields['id_ac_markuptindakan'] = 'text_aut';
      $tp_fields['SC_markupobat_cond'] = 'cond';
      $tp_fields['SC_markupobat'] = 'text_aut';
      $tp_fields['id_ac_markupobat'] = 'text_aut';
      $tp_fields['SC_markuplab_cond'] = 'cond';
      $tp_fields['SC_markuplab'] = 'text_aut';
      $tp_fields['id_ac_markuplab'] = 'text_aut';
      $tp_fields['SC_markuprad_cond'] = 'cond';
      $tp_fields['SC_markuprad'] = 'text_aut';
      $tp_fields['id_ac_markuprad'] = 'text_aut';
      $tp_fields['SC_admpolitype_cond'] = 'cond';
      $tp_fields['SC_admpolitype'] = 'text_aut';
      $tp_fields['id_ac_admpolitype'] = 'text_aut';
      $tp_fields['SC_adminaptype_cond'] = 'cond';
      $tp_fields['SC_adminaptype'] = 'text_aut';
      $tp_fields['id_ac_adminaptype'] = 'text_aut';
      $tp_fields['SC_admpolibaru_cond'] = 'cond';
      $tp_fields['SC_admpolibaru'] = 'text_aut';
      $tp_fields['id_ac_admpolibaru'] = 'text_aut';
      $tp_fields['SC_admpolilama_cond'] = 'cond';
      $tp_fields['SC_admpolilama'] = 'text_aut';
      $tp_fields['id_ac_admpolilama'] = 'text_aut';
      $tp_fields['SC_adminap_cond'] = 'cond';
      $tp_fields['SC_adminap'] = 'text_aut';
      $tp_fields['id_ac_adminap'] = 'text_aut';
      $tp_fields['SC_sc_field_2_cond'] = 'cond';
      $tp_fields['SC_sc_field_2_dia'] = 'text';
      $tp_fields['SC_sc_field_2_mes'] = 'text';
      $tp_fields['SC_sc_field_2_ano'] = 'text';
      $tp_fields['SC_sc_field_2_input_2_dia'] = 'text';
      $tp_fields['SC_sc_field_2_input_2_mes'] = 'text';
      $tp_fields['SC_sc_field_2_input_2_ano'] = 'text';
      $tp_fields['SC_marginpma_cond'] = 'cond';
      $tp_fields['SC_marginpma'] = 'text_aut';
      $tp_fields['id_ac_marginpma'] = 'text_aut';
      $tp_fields['SC_withpma_cond'] = 'cond';
      $tp_fields['SC_withpma'] = 'text_aut';
      $tp_fields['id_ac_withpma'] = 'text_aut';
      $tp_fields['SC_forminternal_cond'] = 'cond';
      $tp_fields['SC_forminternal'] = 'text_aut';
      $tp_fields['id_ac_forminternal'] = 'text_aut';
      $tp_fields['SC_vacc_cond'] = 'cond';
      $tp_fields['SC_vacc'] = 'text_aut';
      $tp_fields['id_ac_vacc'] = 'text_aut';
      $tp_fields['SC_extcode_cond'] = 'cond';
      $tp_fields['SC_extcode'] = 'text_aut';
      $tp_fields['id_ac_extcode'] = 'text_aut';
      $tp_fields['SC_umum_cond'] = 'cond';
      $tp_fields['SC_umum'] = 'text_aut';
      $tp_fields['id_ac_umum'] = 'text_aut';
      $tp_fields['SC_autoshow_cond'] = 'cond';
      $tp_fields['SC_autoshow'] = 'text_aut';
      $tp_fields['id_ac_autoshow'] = 'text_aut';
      $tp_fields['SC_bpjs_cond'] = 'cond';
      $tp_fields['SC_bpjs'] = 'text_aut';
      $tp_fields['id_ac_bpjs'] = 'text_aut';
      $tp_fields['SC_caracode_cond'] = 'cond';
      $tp_fields['SC_caracode'] = 'text_aut';
      $tp_fields['id_ac_caracode'] = 'text_aut';
      $tp_fields['SC_NM_operador'] = 'text';
      $tb_fields_esp['SC_date(joindate)_cond'] = 'SC_sc_field_0_cond';
      $tb_fields_esp['SC_date(joindate)_dia'] = 'SC_sc_field_0_dia';
      $tb_fields_esp['SC_date(joindate)_mes'] = 'SC_sc_field_0_mes';
      $tb_fields_esp['SC_date(joindate)_ano'] = 'SC_sc_field_0_ano';
      $tb_fields_esp['SC_date(joindate)_input_2_dia'] = 'SC_sc_field_0_input_2_dia';
      $tb_fields_esp['SC_date(joindate)_input_2_mes'] = 'SC_sc_field_0_input_2_mes';
      $tb_fields_esp['SC_date(joindate)_input_2_ano'] = 'SC_sc_field_0_input_2_ano';
      $tb_fields_esp['SC_date(expdate)_cond'] = 'SC_sc_field_1_cond';
      $tb_fields_esp['SC_date(expdate)_dia'] = 'SC_sc_field_1_dia';
      $tb_fields_esp['SC_date(expdate)_mes'] = 'SC_sc_field_1_mes';
      $tb_fields_esp['SC_date(expdate)_ano'] = 'SC_sc_field_1_ano';
      $tb_fields_esp['SC_date(expdate)_input_2_dia'] = 'SC_sc_field_1_input_2_dia';
      $tb_fields_esp['SC_date(expdate)_input_2_mes'] = 'SC_sc_field_1_input_2_mes';
      $tb_fields_esp['SC_date(expdate)_input_2_ano'] = 'SC_sc_field_1_input_2_ano';
      $tb_fields_esp['SC_date(lastupdated)_cond'] = 'SC_sc_field_2_cond';
      $tb_fields_esp['SC_date(lastupdated)_dia'] = 'SC_sc_field_2_dia';
      $tb_fields_esp['SC_date(lastupdated)_mes'] = 'SC_sc_field_2_mes';
      $tb_fields_esp['SC_date(lastupdated)_ano'] = 'SC_sc_field_2_ano';
      $tb_fields_esp['SC_date(lastupdated)_input_2_dia'] = 'SC_sc_field_2_input_2_dia';
      $tb_fields_esp['SC_date(lastupdated)_input_2_mes'] = 'SC_sc_field_2_input_2_mes';
      $tb_fields_esp['SC_date(lastupdated)_input_2_ano'] = 'SC_sc_field_2_input_2_ano';
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
      global $address_cond, $address, $address_autocomp,
             $instcode_cond, $instcode, $instcode_autocomp,
             $init_cond, $init, $init_autocomp,
             $name_cond, $name, $name_autocomp,
             $city_cond, $city, $city_autocomp,
             $phone_cond, $phone, $phone_autocomp,
             $fax_cond, $fax, $fax_autocomp,
             $cp_cond, $cp, $cp_autocomp,
             $limit_cond, $limit, $limit_autocomp,
             $discount_cond, $discount, $discount_autocomp,
             $sc_field_0_cond, $sc_field_0, $sc_field_0_dia, $sc_field_0_mes, $sc_field_0_ano,
             $sc_field_1_cond, $sc_field_1, $sc_field_1_dia, $sc_field_1_mes, $sc_field_1_ano,
             $policy_cond, $policy, $policy_autocomp,
             $itemtype_cond, $itemtype, $itemtype_autocomp,
             $deleted_cond, $deleted, $deleted_autocomp,
             $tempo_cond, $tempo, $tempo_autocomp,
             $asuransi_cond, $asuransi, $asuransi_autocomp,
             $marginobat_cond, $marginobat, $marginobat_autocomp,
             $markuptindakan_cond, $markuptindakan, $markuptindakan_autocomp,
             $markupobat_cond, $markupobat, $markupobat_autocomp,
             $markuplab_cond, $markuplab, $markuplab_autocomp,
             $markuprad_cond, $markuprad, $markuprad_autocomp,
             $admpolitype_cond, $admpolitype, $admpolitype_autocomp,
             $adminaptype_cond, $adminaptype, $adminaptype_autocomp,
             $admpolibaru_cond, $admpolibaru, $admpolibaru_autocomp,
             $admpolilama_cond, $admpolilama, $admpolilama_autocomp,
             $adminap_cond, $adminap, $adminap_autocomp,
             $sc_field_2_cond, $sc_field_2, $sc_field_2_dia, $sc_field_2_mes, $sc_field_2_ano,
             $marginpma_cond, $marginpma, $marginpma_autocomp,
             $withpma_cond, $withpma, $withpma_autocomp,
             $forminternal_cond, $forminternal, $forminternal_autocomp,
             $vacc_cond, $vacc, $vacc_autocomp,
             $extcode_cond, $extcode, $extcode_autocomp,
             $umum_cond, $umum, $umum_autocomp,
             $autoshow_cond, $autoshow, $autoshow_autocomp,
             $bpjs_cond, $bpjs, $bpjs_autocomp,
             $caracode_cond, $caracode, $caracode_autocomp, $nmgp_tab_label;

      $C_formatado = true;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      if (!empty($address_autocomp) && empty($address))
      {
          $address = $address_autocomp;
      }
      if (!empty($instcode_autocomp) && empty($instcode))
      {
          $instcode = $instcode_autocomp;
      }
      if (!empty($init_autocomp) && empty($init))
      {
          $init = $init_autocomp;
      }
      if (!empty($name_autocomp) && empty($name))
      {
          $name = $name_autocomp;
      }
      if (!empty($city_autocomp) && empty($city))
      {
          $city = $city_autocomp;
      }
      if (!empty($phone_autocomp) && empty($phone))
      {
          $phone = $phone_autocomp;
      }
      if (!empty($fax_autocomp) && empty($fax))
      {
          $fax = $fax_autocomp;
      }
      if (!empty($cp_autocomp) && empty($cp))
      {
          $cp = $cp_autocomp;
      }
      if (!empty($limit_autocomp) && empty($limit))
      {
          $limit = $limit_autocomp;
      }
      if (!empty($discount_autocomp) && empty($discount))
      {
          $discount = $discount_autocomp;
      }
      if (!empty($policy_autocomp) && empty($policy))
      {
          $policy = $policy_autocomp;
      }
      if (!empty($itemtype_autocomp) && empty($itemtype))
      {
          $itemtype = $itemtype_autocomp;
      }
      if (!empty($deleted_autocomp) && empty($deleted))
      {
          $deleted = $deleted_autocomp;
      }
      if (!empty($tempo_autocomp) && empty($tempo))
      {
          $tempo = $tempo_autocomp;
      }
      if (!empty($asuransi_autocomp) && empty($asuransi))
      {
          $asuransi = $asuransi_autocomp;
      }
      if (!empty($marginobat_autocomp) && empty($marginobat))
      {
          $marginobat = $marginobat_autocomp;
      }
      if (!empty($markuptindakan_autocomp) && empty($markuptindakan))
      {
          $markuptindakan = $markuptindakan_autocomp;
      }
      if (!empty($markupobat_autocomp) && empty($markupobat))
      {
          $markupobat = $markupobat_autocomp;
      }
      if (!empty($markuplab_autocomp) && empty($markuplab))
      {
          $markuplab = $markuplab_autocomp;
      }
      if (!empty($markuprad_autocomp) && empty($markuprad))
      {
          $markuprad = $markuprad_autocomp;
      }
      if (!empty($admpolitype_autocomp) && empty($admpolitype))
      {
          $admpolitype = $admpolitype_autocomp;
      }
      if (!empty($adminaptype_autocomp) && empty($adminaptype))
      {
          $adminaptype = $adminaptype_autocomp;
      }
      if (!empty($admpolibaru_autocomp) && empty($admpolibaru))
      {
          $admpolibaru = $admpolibaru_autocomp;
      }
      if (!empty($admpolilama_autocomp) && empty($admpolilama))
      {
          $admpolilama = $admpolilama_autocomp;
      }
      if (!empty($adminap_autocomp) && empty($adminap))
      {
          $adminap = $adminap_autocomp;
      }
      if (!empty($marginpma_autocomp) && empty($marginpma))
      {
          $marginpma = $marginpma_autocomp;
      }
      if (!empty($withpma_autocomp) && empty($withpma))
      {
          $withpma = $withpma_autocomp;
      }
      if (!empty($forminternal_autocomp) && empty($forminternal))
      {
          $forminternal = $forminternal_autocomp;
      }
      if (!empty($vacc_autocomp) && empty($vacc))
      {
          $vacc = $vacc_autocomp;
      }
      if (!empty($extcode_autocomp) && empty($extcode))
      {
          $extcode = $extcode_autocomp;
      }
      if (!empty($umum_autocomp) && empty($umum))
      {
          $umum = $umum_autocomp;
      }
      if (!empty($autoshow_autocomp) && empty($autoshow))
      {
          $autoshow = $autoshow_autocomp;
      }
      if (!empty($bpjs_autocomp) && empty($bpjs))
      {
          $bpjs = $bpjs_autocomp;
      }
      if (!empty($caracode_autocomp) && empty($caracode))
      {
          $caracode = $caracode_autocomp;
      }
      $address_cond_salva = $address_cond; 
      if (!isset($address_input_2) || $address_input_2 == "")
      {
          $address_input_2 = $address;
      }
      $instcode_cond_salva = $instcode_cond; 
      if (!isset($instcode_input_2) || $instcode_input_2 == "")
      {
          $instcode_input_2 = $instcode;
      }
      $init_cond_salva = $init_cond; 
      if (!isset($init_input_2) || $init_input_2 == "")
      {
          $init_input_2 = $init;
      }
      $name_cond_salva = $name_cond; 
      if (!isset($name_input_2) || $name_input_2 == "")
      {
          $name_input_2 = $name;
      }
      $city_cond_salva = $city_cond; 
      if (!isset($city_input_2) || $city_input_2 == "")
      {
          $city_input_2 = $city;
      }
      $phone_cond_salva = $phone_cond; 
      if (!isset($phone_input_2) || $phone_input_2 == "")
      {
          $phone_input_2 = $phone;
      }
      $fax_cond_salva = $fax_cond; 
      if (!isset($fax_input_2) || $fax_input_2 == "")
      {
          $fax_input_2 = $fax;
      }
      $cp_cond_salva = $cp_cond; 
      if (!isset($cp_input_2) || $cp_input_2 == "")
      {
          $cp_input_2 = $cp;
      }
      $limit_cond_salva = $limit_cond; 
      if (!isset($limit_input_2) || $limit_input_2 == "")
      {
          $limit_input_2 = $limit;
      }
      $discount_cond_salva = $discount_cond; 
      if (!isset($discount_input_2) || $discount_input_2 == "")
      {
          $discount_input_2 = $discount;
      }
      $sc_field_0_cond_salva = $sc_field_0_cond; 
      $sc_field_1_cond_salva = $sc_field_1_cond; 
      $policy_cond_salva = $policy_cond; 
      if (!isset($policy_input_2) || $policy_input_2 == "")
      {
          $policy_input_2 = $policy;
      }
      $itemtype_cond_salva = $itemtype_cond; 
      if (!isset($itemtype_input_2) || $itemtype_input_2 == "")
      {
          $itemtype_input_2 = $itemtype;
      }
      $deleted_cond_salva = $deleted_cond; 
      if (!isset($deleted_input_2) || $deleted_input_2 == "")
      {
          $deleted_input_2 = $deleted;
      }
      $tempo_cond_salva = $tempo_cond; 
      if (!isset($tempo_input_2) || $tempo_input_2 == "")
      {
          $tempo_input_2 = $tempo;
      }
      $asuransi_cond_salva = $asuransi_cond; 
      if (!isset($asuransi_input_2) || $asuransi_input_2 == "")
      {
          $asuransi_input_2 = $asuransi;
      }
      $marginobat_cond_salva = $marginobat_cond; 
      if (!isset($marginobat_input_2) || $marginobat_input_2 == "")
      {
          $marginobat_input_2 = $marginobat;
      }
      $markuptindakan_cond_salva = $markuptindakan_cond; 
      if (!isset($markuptindakan_input_2) || $markuptindakan_input_2 == "")
      {
          $markuptindakan_input_2 = $markuptindakan;
      }
      $markupobat_cond_salva = $markupobat_cond; 
      if (!isset($markupobat_input_2) || $markupobat_input_2 == "")
      {
          $markupobat_input_2 = $markupobat;
      }
      $markuplab_cond_salva = $markuplab_cond; 
      if (!isset($markuplab_input_2) || $markuplab_input_2 == "")
      {
          $markuplab_input_2 = $markuplab;
      }
      $markuprad_cond_salva = $markuprad_cond; 
      if (!isset($markuprad_input_2) || $markuprad_input_2 == "")
      {
          $markuprad_input_2 = $markuprad;
      }
      $admpolitype_cond_salva = $admpolitype_cond; 
      if (!isset($admpolitype_input_2) || $admpolitype_input_2 == "")
      {
          $admpolitype_input_2 = $admpolitype;
      }
      $adminaptype_cond_salva = $adminaptype_cond; 
      if (!isset($adminaptype_input_2) || $adminaptype_input_2 == "")
      {
          $adminaptype_input_2 = $adminaptype;
      }
      $admpolibaru_cond_salva = $admpolibaru_cond; 
      if (!isset($admpolibaru_input_2) || $admpolibaru_input_2 == "")
      {
          $admpolibaru_input_2 = $admpolibaru;
      }
      $admpolilama_cond_salva = $admpolilama_cond; 
      if (!isset($admpolilama_input_2) || $admpolilama_input_2 == "")
      {
          $admpolilama_input_2 = $admpolilama;
      }
      $adminap_cond_salva = $adminap_cond; 
      if (!isset($adminap_input_2) || $adminap_input_2 == "")
      {
          $adminap_input_2 = $adminap;
      }
      $sc_field_2_cond_salva = $sc_field_2_cond; 
      $marginpma_cond_salva = $marginpma_cond; 
      if (!isset($marginpma_input_2) || $marginpma_input_2 == "")
      {
          $marginpma_input_2 = $marginpma;
      }
      $withpma_cond_salva = $withpma_cond; 
      if (!isset($withpma_input_2) || $withpma_input_2 == "")
      {
          $withpma_input_2 = $withpma;
      }
      $forminternal_cond_salva = $forminternal_cond; 
      if (!isset($forminternal_input_2) || $forminternal_input_2 == "")
      {
          $forminternal_input_2 = $forminternal;
      }
      $vacc_cond_salva = $vacc_cond; 
      if (!isset($vacc_input_2) || $vacc_input_2 == "")
      {
          $vacc_input_2 = $vacc;
      }
      $extcode_cond_salva = $extcode_cond; 
      if (!isset($extcode_input_2) || $extcode_input_2 == "")
      {
          $extcode_input_2 = $extcode;
      }
      $umum_cond_salva = $umum_cond; 
      if (!isset($umum_input_2) || $umum_input_2 == "")
      {
          $umum_input_2 = $umum;
      }
      $autoshow_cond_salva = $autoshow_cond; 
      if (!isset($autoshow_input_2) || $autoshow_input_2 == "")
      {
          $autoshow_input_2 = $autoshow;
      }
      $bpjs_cond_salva = $bpjs_cond; 
      if (!isset($bpjs_input_2) || $bpjs_input_2 == "")
      {
          $bpjs_input_2 = $bpjs;
      }
      $caracode_cond_salva = $caracode_cond; 
      if (!isset($caracode_input_2) || $caracode_input_2 == "")
      {
          $caracode_input_2 = $caracode;
      }
      if ($limit_cond != "in")
      {
          if ($C_formatado)
          {
              nm_limpa_valor($limit, $_SESSION['scriptcase']['reg_conf']['dec_num'], $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
          }
      }
      if ($discount_cond != "in")
      {
          nm_limpa_numero($discount, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($itemtype_cond != "in")
      {
          nm_limpa_numero($itemtype, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($deleted_cond != "in")
      {
          nm_limpa_numero($deleted, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($tempo_cond != "in")
      {
          nm_limpa_numero($tempo, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($asuransi_cond != "in")
      {
          nm_limpa_numero($asuransi, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($marginobat_cond != "in")
      {
          nm_limpa_numero($marginobat, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($markuptindakan_cond != "in")
      {
          nm_limpa_numero($markuptindakan, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($markupobat_cond != "in")
      {
          nm_limpa_numero($markupobat, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($markuplab_cond != "in")
      {
          nm_limpa_numero($markuplab, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($markuprad_cond != "in")
      {
          nm_limpa_numero($markuprad, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($admpolitype_cond != "in")
      {
          nm_limpa_numero($admpolitype, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($adminaptype_cond != "in")
      {
          nm_limpa_numero($adminaptype, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($admpolibaru_cond != "in")
      {
          nm_limpa_numero($admpolibaru, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($admpolilama_cond != "in")
      {
          nm_limpa_numero($admpolilama, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($adminap_cond != "in")
      {
          nm_limpa_numero($adminap, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($marginpma_cond != "in")
      {
          nm_limpa_numero($marginpma, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($withpma_cond != "in")
      {
          nm_limpa_numero($withpma, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($forminternal_cond != "in")
      {
          nm_limpa_numero($forminternal, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($umum_cond != "in")
      {
          nm_limpa_numero($umum, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($autoshow_cond != "in")
      {
          nm_limpa_numero($autoshow, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($bpjs_cond != "in")
      {
          nm_limpa_numero($bpjs, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['address'] = $address; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['address_cond'] = $address_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['instcode'] = $instcode; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['instcode_cond'] = $instcode_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['init'] = $init; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['init_cond'] = $init_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['name'] = $name; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['name_cond'] = $name_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['city'] = $city; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['city_cond'] = $city_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['phone'] = $phone; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['phone_cond'] = $phone_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['fax'] = $fax; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['fax_cond'] = $fax_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['cp'] = $cp; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['cp_cond'] = $cp_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['limit'] = $limit; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['limit_cond'] = $limit_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['discount'] = $discount; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['discount_cond'] = $discount_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_0_dia'] = $sc_field_0_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_0_mes'] = $sc_field_0_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_0_ano'] = $sc_field_0_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_0_cond'] = $sc_field_0_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_1_dia'] = $sc_field_1_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_1_mes'] = $sc_field_1_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_1_ano'] = $sc_field_1_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_1_cond'] = $sc_field_1_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['policy'] = $policy; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['policy_cond'] = $policy_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['itemtype'] = $itemtype; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['itemtype_cond'] = $itemtype_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['deleted'] = $deleted; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['deleted_cond'] = $deleted_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['tempo'] = $tempo; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['tempo_cond'] = $tempo_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['asuransi'] = $asuransi; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['asuransi_cond'] = $asuransi_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['marginobat'] = $marginobat; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['marginobat_cond'] = $marginobat_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markuptindakan'] = $markuptindakan; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markuptindakan_cond'] = $markuptindakan_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markupobat'] = $markupobat; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markupobat_cond'] = $markupobat_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markuplab'] = $markuplab; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markuplab_cond'] = $markuplab_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markuprad'] = $markuprad; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['markuprad_cond'] = $markuprad_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['admpolitype'] = $admpolitype; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['admpolitype_cond'] = $admpolitype_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['adminaptype'] = $adminaptype; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['adminaptype_cond'] = $adminaptype_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['admpolibaru'] = $admpolibaru; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['admpolibaru_cond'] = $admpolibaru_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['admpolilama'] = $admpolilama; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['admpolilama_cond'] = $admpolilama_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['adminap'] = $adminap; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['adminap_cond'] = $adminap_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_2_dia'] = $sc_field_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_2_mes'] = $sc_field_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_2_ano'] = $sc_field_2_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_2_cond'] = $sc_field_2_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['marginpma'] = $marginpma; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['marginpma_cond'] = $marginpma_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['withpma'] = $withpma; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['withpma_cond'] = $withpma_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['forminternal'] = $forminternal; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['forminternal_cond'] = $forminternal_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['vacc'] = $vacc; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['vacc_cond'] = $vacc_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['extcode'] = $extcode; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['extcode_cond'] = $extcode_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['umum'] = $umum; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['umum_cond'] = $umum_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['autoshow'] = $autoshow; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['autoshow_cond'] = $autoshow_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['bpjs'] = $bpjs; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['bpjs_cond'] = $bpjs_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['caracode'] = $caracode; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['caracode_cond'] = $caracode_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['NM_operador'] = $this->NM_operador; 
      if ($this->NM_ajax_flag && $this->NM_ajax_opcao == "ajax_grid_search")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca'] = $Temp_Busca;
      }
      if ($limit_cond != "in" && $limit_cond != "bw" && !empty($limit) && !is_numeric($limit))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Limit";
      }
      if ($limit_cond == "bw" && ((!empty($limit) && !is_numeric($limit)) || (!empty($limit_input_2) && !is_numeric($limit_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Limit";
      }
      if ($discount_cond != "in" && $discount_cond != "bw" && !empty($discount) && !is_numeric($discount))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Discount";
      }
      if ($discount_cond == "bw" && ((!empty($discount) && !is_numeric($discount)) || (!empty($discount_input_2) && !is_numeric($discount_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Discount";
      }
      if ($itemtype_cond != "in" && $itemtype_cond != "bw" && !empty($itemtype) && !is_numeric($itemtype))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Item Type";
      }
      if ($itemtype_cond == "bw" && ((!empty($itemtype) && !is_numeric($itemtype)) || (!empty($itemtype_input_2) && !is_numeric($itemtype_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Item Type";
      }
      if ($deleted_cond != "in" && $deleted_cond != "bw" && !empty($deleted) && !is_numeric($deleted))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Deleted";
      }
      if ($deleted_cond == "bw" && ((!empty($deleted) && !is_numeric($deleted)) || (!empty($deleted_input_2) && !is_numeric($deleted_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Deleted";
      }
      if ($tempo_cond != "in" && $tempo_cond != "bw" && !empty($tempo) && !is_numeric($tempo))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Jatuh Tempo (Hari)";
      }
      if ($tempo_cond == "bw" && ((!empty($tempo) && !is_numeric($tempo)) || (!empty($tempo_input_2) && !is_numeric($tempo_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Jatuh Tempo (Hari)";
      }
      if ($asuransi_cond != "in" && $asuransi_cond != "bw" && !empty($asuransi) && !is_numeric($asuransi))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Asuransi";
      }
      if ($asuransi_cond == "bw" && ((!empty($asuransi) && !is_numeric($asuransi)) || (!empty($asuransi_input_2) && !is_numeric($asuransi_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Asuransi";
      }
      if ($marginobat_cond != "in" && $marginobat_cond != "bw" && !empty($marginobat) && !is_numeric($marginobat))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Margin Obat";
      }
      if ($marginobat_cond == "bw" && ((!empty($marginobat) && !is_numeric($marginobat)) || (!empty($marginobat_input_2) && !is_numeric($marginobat_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Margin Obat";
      }
      if ($markuptindakan_cond != "in" && $markuptindakan_cond != "bw" && !empty($markuptindakan) && !is_numeric($markuptindakan))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Markup Tindakan";
      }
      if ($markuptindakan_cond == "bw" && ((!empty($markuptindakan) && !is_numeric($markuptindakan)) || (!empty($markuptindakan_input_2) && !is_numeric($markuptindakan_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Markup Tindakan";
      }
      if ($markupobat_cond != "in" && $markupobat_cond != "bw" && !empty($markupobat) && !is_numeric($markupobat))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Markup Obat";
      }
      if ($markupobat_cond == "bw" && ((!empty($markupobat) && !is_numeric($markupobat)) || (!empty($markupobat_input_2) && !is_numeric($markupobat_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Markup Obat";
      }
      if ($markuplab_cond != "in" && $markuplab_cond != "bw" && !empty($markuplab) && !is_numeric($markuplab))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Markup Lab";
      }
      if ($markuplab_cond == "bw" && ((!empty($markuplab) && !is_numeric($markuplab)) || (!empty($markuplab_input_2) && !is_numeric($markuplab_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Markup Lab";
      }
      if ($markuprad_cond != "in" && $markuprad_cond != "bw" && !empty($markuprad) && !is_numeric($markuprad))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Markup Rad";
      }
      if ($markuprad_cond == "bw" && ((!empty($markuprad) && !is_numeric($markuprad)) || (!empty($markuprad_input_2) && !is_numeric($markuprad_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Markup Rad";
      }
      if ($admpolitype_cond != "in" && $admpolitype_cond != "bw" && !empty($admpolitype) && !is_numeric($admpolitype))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Adm Poli Type";
      }
      if ($admpolitype_cond == "bw" && ((!empty($admpolitype) && !is_numeric($admpolitype)) || (!empty($admpolitype_input_2) && !is_numeric($admpolitype_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Adm Poli Type";
      }
      if ($adminaptype_cond != "in" && $adminaptype_cond != "bw" && !empty($adminaptype) && !is_numeric($adminaptype))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Adm Inap Type";
      }
      if ($adminaptype_cond == "bw" && ((!empty($adminaptype) && !is_numeric($adminaptype)) || (!empty($adminaptype_input_2) && !is_numeric($adminaptype_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Adm Inap Type";
      }
      if ($admpolibaru_cond != "in" && $admpolibaru_cond != "bw" && !empty($admpolibaru) && !is_numeric($admpolibaru))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Adm Poli Baru";
      }
      if ($admpolibaru_cond == "bw" && ((!empty($admpolibaru) && !is_numeric($admpolibaru)) || (!empty($admpolibaru_input_2) && !is_numeric($admpolibaru_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Adm Poli Baru";
      }
      if ($admpolilama_cond != "in" && $admpolilama_cond != "bw" && !empty($admpolilama) && !is_numeric($admpolilama))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Adm Poli Lama";
      }
      if ($admpolilama_cond == "bw" && ((!empty($admpolilama) && !is_numeric($admpolilama)) || (!empty($admpolilama_input_2) && !is_numeric($admpolilama_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Adm Poli Lama";
      }
      if ($adminap_cond != "in" && $adminap_cond != "bw" && !empty($adminap) && !is_numeric($adminap))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Adm Inap";
      }
      if ($adminap_cond == "bw" && ((!empty($adminap) && !is_numeric($adminap)) || (!empty($adminap_input_2) && !is_numeric($adminap_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Adm Inap";
      }
      if ($marginpma_cond != "in" && $marginpma_cond != "bw" && !empty($marginpma) && !is_numeric($marginpma))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Margin PMA";
      }
      if ($marginpma_cond == "bw" && ((!empty($marginpma) && !is_numeric($marginpma)) || (!empty($marginpma_input_2) && !is_numeric($marginpma_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Margin PMA";
      }
      if ($withpma_cond != "in" && $withpma_cond != "bw" && !empty($withpma) && !is_numeric($withpma))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : With PMA";
      }
      if ($withpma_cond == "bw" && ((!empty($withpma) && !is_numeric($withpma)) || (!empty($withpma_input_2) && !is_numeric($withpma_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : With PMA";
      }
      if ($forminternal_cond != "in" && $forminternal_cond != "bw" && !empty($forminternal) && !is_numeric($forminternal))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Form Internal";
      }
      if ($forminternal_cond == "bw" && ((!empty($forminternal) && !is_numeric($forminternal)) || (!empty($forminternal_input_2) && !is_numeric($forminternal_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Form Internal";
      }
      if ($umum_cond != "in" && $umum_cond != "bw" && !empty($umum) && !is_numeric($umum))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Umum";
      }
      if ($umum_cond == "bw" && ((!empty($umum) && !is_numeric($umum)) || (!empty($umum_input_2) && !is_numeric($umum_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Umum";
      }
      if ($autoshow_cond != "in" && $autoshow_cond != "bw" && !empty($autoshow) && !is_numeric($autoshow))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Auto Show";
      }
      if ($autoshow_cond == "bw" && ((!empty($autoshow) && !is_numeric($autoshow)) || (!empty($autoshow_input_2) && !is_numeric($autoshow_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Auto Show";
      }
      if ($bpjs_cond != "in" && $bpjs_cond != "bw" && !empty($bpjs) && !is_numeric($bpjs))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Bpjs";
      }
      if ($bpjs_cond == "bw" && ((!empty($bpjs) && !is_numeric($bpjs)) || (!empty($bpjs_input_2) && !is_numeric($bpjs_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Bpjs";
      }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      $address_look = substr($this->Db->qstr($address), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct address from " . $this->Ini->nm_tabela . " where address = '$address_look' order by address"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['address'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['address'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['address'] = $address;
      }
      $instcode_look = substr($this->Db->qstr($instcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct instCode from " . $this->Ini->nm_tabela . " where instCode = '$instcode_look' order by instCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['instcode'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['instcode'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['instcode'] = $instcode;
      }
      $init_look = substr($this->Db->qstr($init), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct init from " . $this->Ini->nm_tabela . " where init = '$init_look' order by init"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['init'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['init'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['init'] = $init;
      }
      $name_look = substr($this->Db->qstr($name), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct name from " . $this->Ini->nm_tabela . " where name = '$name_look' order by name"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['name'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['name'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['name'] = $name;
      }
      $city_look = substr($this->Db->qstr($city), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct city from " . $this->Ini->nm_tabela . " where city = '$city_look' order by city"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['city'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['city'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['city'] = $city;
      }
      $phone_look = substr($this->Db->qstr($phone), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct phone from " . $this->Ini->nm_tabela . " where phone = '$phone_look' order by phone"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['phone'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['phone'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['phone'] = $phone;
      }
      $fax_look = substr($this->Db->qstr($fax), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct fax from " . $this->Ini->nm_tabela . " where fax = '$fax_look' order by fax"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['fax'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['fax'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['fax'] = $fax;
      }
      $cp_look = substr($this->Db->qstr($cp), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct cp from " . $this->Ini->nm_tabela . " where cp = '$cp_look' order by cp"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['cp'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['cp'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['cp'] = $cp;
      }
      $limit_look = substr($this->Db->qstr($limit), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($limit))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct `limit` from " . $this->Ini->nm_tabela . " where `limit` = $limit_look order by `limit`"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct `limit` from " . $this->Ini->nm_tabela . " where `limit` = $limit_look order by `limit`"; 
      }
      else
      {
          $nm_comando = "select distinct `limit` from " . $this->Ini->nm_tabela . " where `limit` = $limit_look order by `limit`"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
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
          $this->cmp_formatado['limit'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['limit'] = $cmp1;
      }
      else
      {
          $cmp1 = $limit;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          $this->cmp_formatado['limit'] = $cmp1;
      }
      $discount_look = substr($this->Db->qstr($discount), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($discount))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct discount from " . $this->Ini->nm_tabela . " where discount = $discount_look order by discount"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct discount from " . $this->Ini->nm_tabela . " where discount = $discount_look order by discount"; 
      }
      else
      {
          $nm_comando = "select distinct discount from " . $this->Ini->nm_tabela . " where discount = $discount_look order by discount"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['discount'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['discount'] = $cmp1;
      }
      else
      {
          $cmp1 = $discount;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['discount'] = $cmp1;
      }
      $policy_look = substr($this->Db->qstr($policy), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct policy from " . $this->Ini->nm_tabela . " where policy = '$policy_look' order by policy"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['policy'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['policy'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['policy'] = $policy;
      }
      $itemtype_look = substr($this->Db->qstr($itemtype), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($itemtype))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct itemType from " . $this->Ini->nm_tabela . " where itemType = $itemtype_look order by itemType"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct itemType from " . $this->Ini->nm_tabela . " where itemType = $itemtype_look order by itemType"; 
      }
      else
      {
          $nm_comando = "select distinct itemType from " . $this->Ini->nm_tabela . " where itemType = $itemtype_look order by itemType"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['itemtype'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['itemtype'] = $cmp1;
      }
      else
      {
          $cmp1 = $itemtype;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['itemtype'] = $cmp1;
      }
      $deleted_look = substr($this->Db->qstr($deleted), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($deleted))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct deleted from " . $this->Ini->nm_tabela . " where deleted = $deleted_look order by deleted"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct deleted from " . $this->Ini->nm_tabela . " where deleted = $deleted_look order by deleted"; 
      }
      else
      {
          $nm_comando = "select distinct deleted from " . $this->Ini->nm_tabela . " where deleted = $deleted_look order by deleted"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['deleted'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['deleted'] = $cmp1;
      }
      else
      {
          $cmp1 = $deleted;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['deleted'] = $cmp1;
      }
      $tempo_look = substr($this->Db->qstr($tempo), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($tempo))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct tempo from " . $this->Ini->nm_tabela . " where tempo = $tempo_look order by tempo"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct tempo from " . $this->Ini->nm_tabela . " where tempo = $tempo_look order by tempo"; 
      }
      else
      {
          $nm_comando = "select distinct tempo from " . $this->Ini->nm_tabela . " where tempo = $tempo_look order by tempo"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['tempo'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['tempo'] = $cmp1;
      }
      else
      {
          $cmp1 = $tempo;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['tempo'] = $cmp1;
      }
      $asuransi_look = substr($this->Db->qstr($asuransi), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($asuransi))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct asuransi from " . $this->Ini->nm_tabela . " where asuransi = $asuransi_look order by asuransi"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct asuransi from " . $this->Ini->nm_tabela . " where asuransi = $asuransi_look order by asuransi"; 
      }
      else
      {
          $nm_comando = "select distinct asuransi from " . $this->Ini->nm_tabela . " where asuransi = $asuransi_look order by asuransi"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['asuransi'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['asuransi'] = $cmp1;
      }
      else
      {
          $cmp1 = $asuransi;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['asuransi'] = $cmp1;
      }
      $marginobat_look = substr($this->Db->qstr($marginobat), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($marginobat))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct marginObat from " . $this->Ini->nm_tabela . " where marginObat = $marginobat_look order by marginObat"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct marginObat from " . $this->Ini->nm_tabela . " where marginObat = $marginobat_look order by marginObat"; 
      }
      else
      {
          $nm_comando = "select distinct marginObat from " . $this->Ini->nm_tabela . " where marginObat = $marginobat_look order by marginObat"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['marginobat'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['marginobat'] = $cmp1;
      }
      else
      {
          $cmp1 = $marginobat;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['marginobat'] = $cmp1;
      }
      $markuptindakan_look = substr($this->Db->qstr($markuptindakan), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($markuptindakan))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct markupTindakan from " . $this->Ini->nm_tabela . " where markupTindakan = $markuptindakan_look order by markupTindakan"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct markupTindakan from " . $this->Ini->nm_tabela . " where markupTindakan = $markuptindakan_look order by markupTindakan"; 
      }
      else
      {
          $nm_comando = "select distinct markupTindakan from " . $this->Ini->nm_tabela . " where markupTindakan = $markuptindakan_look order by markupTindakan"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['markuptindakan'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['markuptindakan'] = $cmp1;
      }
      else
      {
          $cmp1 = $markuptindakan;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['markuptindakan'] = $cmp1;
      }
      $markupobat_look = substr($this->Db->qstr($markupobat), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($markupobat))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct markupObat from " . $this->Ini->nm_tabela . " where markupObat = $markupobat_look order by markupObat"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct markupObat from " . $this->Ini->nm_tabela . " where markupObat = $markupobat_look order by markupObat"; 
      }
      else
      {
          $nm_comando = "select distinct markupObat from " . $this->Ini->nm_tabela . " where markupObat = $markupobat_look order by markupObat"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['markupobat'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['markupobat'] = $cmp1;
      }
      else
      {
          $cmp1 = $markupobat;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['markupobat'] = $cmp1;
      }
      $markuplab_look = substr($this->Db->qstr($markuplab), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($markuplab))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct markupLab from " . $this->Ini->nm_tabela . " where markupLab = $markuplab_look order by markupLab"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct markupLab from " . $this->Ini->nm_tabela . " where markupLab = $markuplab_look order by markupLab"; 
      }
      else
      {
          $nm_comando = "select distinct markupLab from " . $this->Ini->nm_tabela . " where markupLab = $markuplab_look order by markupLab"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['markuplab'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['markuplab'] = $cmp1;
      }
      else
      {
          $cmp1 = $markuplab;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['markuplab'] = $cmp1;
      }
      $markuprad_look = substr($this->Db->qstr($markuprad), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($markuprad))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct markupRad from " . $this->Ini->nm_tabela . " where markupRad = $markuprad_look order by markupRad"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct markupRad from " . $this->Ini->nm_tabela . " where markupRad = $markuprad_look order by markupRad"; 
      }
      else
      {
          $nm_comando = "select distinct markupRad from " . $this->Ini->nm_tabela . " where markupRad = $markuprad_look order by markupRad"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['markuprad'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['markuprad'] = $cmp1;
      }
      else
      {
          $cmp1 = $markuprad;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['markuprad'] = $cmp1;
      }
      $admpolitype_look = substr($this->Db->qstr($admpolitype), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($admpolitype))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admPoliType from " . $this->Ini->nm_tabela . " where admPoliType = $admpolitype_look order by admPoliType"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admPoliType from " . $this->Ini->nm_tabela . " where admPoliType = $admpolitype_look order by admPoliType"; 
      }
      else
      {
          $nm_comando = "select distinct admPoliType from " . $this->Ini->nm_tabela . " where admPoliType = $admpolitype_look order by admPoliType"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['admpolitype'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['admpolitype'] = $cmp1;
      }
      else
      {
          $cmp1 = $admpolitype;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['admpolitype'] = $cmp1;
      }
      $adminaptype_look = substr($this->Db->qstr($adminaptype), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($adminaptype))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admInapType from " . $this->Ini->nm_tabela . " where admInapType = $adminaptype_look order by admInapType"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admInapType from " . $this->Ini->nm_tabela . " where admInapType = $adminaptype_look order by admInapType"; 
      }
      else
      {
          $nm_comando = "select distinct admInapType from " . $this->Ini->nm_tabela . " where admInapType = $adminaptype_look order by admInapType"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['adminaptype'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['adminaptype'] = $cmp1;
      }
      else
      {
          $cmp1 = $adminaptype;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['adminaptype'] = $cmp1;
      }
      $admpolibaru_look = substr($this->Db->qstr($admpolibaru), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($admpolibaru))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admPoliBaru from " . $this->Ini->nm_tabela . " where admPoliBaru = $admpolibaru_look order by admPoliBaru"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admPoliBaru from " . $this->Ini->nm_tabela . " where admPoliBaru = $admpolibaru_look order by admPoliBaru"; 
      }
      else
      {
          $nm_comando = "select distinct admPoliBaru from " . $this->Ini->nm_tabela . " where admPoliBaru = $admpolibaru_look order by admPoliBaru"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['admpolibaru'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['admpolibaru'] = $cmp1;
      }
      else
      {
          $cmp1 = $admpolibaru;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['admpolibaru'] = $cmp1;
      }
      $admpolilama_look = substr($this->Db->qstr($admpolilama), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($admpolilama))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admPoliLama from " . $this->Ini->nm_tabela . " where admPoliLama = $admpolilama_look order by admPoliLama"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admPoliLama from " . $this->Ini->nm_tabela . " where admPoliLama = $admpolilama_look order by admPoliLama"; 
      }
      else
      {
          $nm_comando = "select distinct admPoliLama from " . $this->Ini->nm_tabela . " where admPoliLama = $admpolilama_look order by admPoliLama"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['admpolilama'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['admpolilama'] = $cmp1;
      }
      else
      {
          $cmp1 = $admpolilama;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['admpolilama'] = $cmp1;
      }
      $adminap_look = substr($this->Db->qstr($adminap), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($adminap))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct admInap from " . $this->Ini->nm_tabela . " where admInap = $adminap_look order by admInap"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct admInap from " . $this->Ini->nm_tabela . " where admInap = $adminap_look order by admInap"; 
      }
      else
      {
          $nm_comando = "select distinct admInap from " . $this->Ini->nm_tabela . " where admInap = $adminap_look order by admInap"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['adminap'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['adminap'] = $cmp1;
      }
      else
      {
          $cmp1 = $adminap;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['adminap'] = $cmp1;
      }
      $marginpma_look = substr($this->Db->qstr($marginpma), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($marginpma))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct marginPMA from " . $this->Ini->nm_tabela . " where marginPMA = $marginpma_look order by marginPMA"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct marginPMA from " . $this->Ini->nm_tabela . " where marginPMA = $marginpma_look order by marginPMA"; 
      }
      else
      {
          $nm_comando = "select distinct marginPMA from " . $this->Ini->nm_tabela . " where marginPMA = $marginpma_look order by marginPMA"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['marginpma'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['marginpma'] = $cmp1;
      }
      else
      {
          $cmp1 = $marginpma;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['marginpma'] = $cmp1;
      }
      $withpma_look = substr($this->Db->qstr($withpma), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($withpma))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct withPMA from " . $this->Ini->nm_tabela . " where withPMA = $withpma_look order by withPMA"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct withPMA from " . $this->Ini->nm_tabela . " where withPMA = $withpma_look order by withPMA"; 
      }
      else
      {
          $nm_comando = "select distinct withPMA from " . $this->Ini->nm_tabela . " where withPMA = $withpma_look order by withPMA"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['withpma'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['withpma'] = $cmp1;
      }
      else
      {
          $cmp1 = $withpma;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['withpma'] = $cmp1;
      }
      $forminternal_look = substr($this->Db->qstr($forminternal), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($forminternal))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct formInternal from " . $this->Ini->nm_tabela . " where formInternal = $forminternal_look order by formInternal"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct formInternal from " . $this->Ini->nm_tabela . " where formInternal = $forminternal_look order by formInternal"; 
      }
      else
      {
          $nm_comando = "select distinct formInternal from " . $this->Ini->nm_tabela . " where formInternal = $forminternal_look order by formInternal"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['forminternal'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['forminternal'] = $cmp1;
      }
      else
      {
          $cmp1 = $forminternal;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['forminternal'] = $cmp1;
      }
      $vacc_look = substr($this->Db->qstr($vacc), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct vAcc from " . $this->Ini->nm_tabela . " where vAcc = '$vacc_look' order by vAcc"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['vacc'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['vacc'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['vacc'] = $vacc;
      }
      $extcode_look = substr($this->Db->qstr($extcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct extCode from " . $this->Ini->nm_tabela . " where extCode = '$extcode_look' order by extCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['extcode'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['extcode'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['extcode'] = $extcode;
      }
      $umum_look = substr($this->Db->qstr($umum), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($umum))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct umum from " . $this->Ini->nm_tabela . " where umum = $umum_look order by umum"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct umum from " . $this->Ini->nm_tabela . " where umum = $umum_look order by umum"; 
      }
      else
      {
          $nm_comando = "select distinct umum from " . $this->Ini->nm_tabela . " where umum = $umum_look order by umum"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['umum'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['umum'] = $cmp1;
      }
      else
      {
          $cmp1 = $umum;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['umum'] = $cmp1;
      }
      $autoshow_look = substr($this->Db->qstr($autoshow), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($autoshow))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct autoShow from " . $this->Ini->nm_tabela . " where autoShow = $autoshow_look order by autoShow"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct autoShow from " . $this->Ini->nm_tabela . " where autoShow = $autoshow_look order by autoShow"; 
      }
      else
      {
          $nm_comando = "select distinct autoShow from " . $this->Ini->nm_tabela . " where autoShow = $autoshow_look order by autoShow"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['autoshow'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['autoshow'] = $cmp1;
      }
      else
      {
          $cmp1 = $autoshow;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['autoshow'] = $cmp1;
      }
      $bpjs_look = substr($this->Db->qstr($bpjs), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($bpjs))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct bpjs from " . $this->Ini->nm_tabela . " where bpjs = $bpjs_look order by bpjs"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct bpjs from " . $this->Ini->nm_tabela . " where bpjs = $bpjs_look order by bpjs"; 
      }
      else
      {
          $nm_comando = "select distinct bpjs from " . $this->Ini->nm_tabela . " where bpjs = $bpjs_look order by bpjs"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['bpjs'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['bpjs'] = $cmp1;
      }
      else
      {
          $cmp1 = $bpjs;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['bpjs'] = $cmp1;
      }
      $caracode_look = substr($this->Db->qstr($caracode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct caraCode from " . $this->Ini->nm_tabela . " where caraCode = '$caracode_look' order by caraCode"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
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
          $this->cmp_formatado['caracode'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['caracode'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['caracode'] = $caracode;
      }

      //----- $address
      $this->Date_part = false;
      if (isset($address) || $address_cond == "nu" || $address_cond == "nn" || $address_cond == "ep" || $address_cond == "ne")
      {
         $this->monta_condicao("address", $address_cond, $address, "", "address");
      }

      //----- $instcode
      $this->Date_part = false;
      if (isset($instcode) || $instcode_cond == "nu" || $instcode_cond == "nn" || $instcode_cond == "ep" || $instcode_cond == "ne")
      {
         $this->monta_condicao("instCode", $instcode_cond, $instcode, "", "instcode");
      }

      //----- $init
      $this->Date_part = false;
      if (isset($init) || $init_cond == "nu" || $init_cond == "nn" || $init_cond == "ep" || $init_cond == "ne")
      {
         $this->monta_condicao("init", $init_cond, $init, "", "init");
      }

      //----- $name
      $this->Date_part = false;
      if (isset($name) || $name_cond == "nu" || $name_cond == "nn" || $name_cond == "ep" || $name_cond == "ne")
      {
         $this->monta_condicao("name", $name_cond, $name, "", "name");
      }

      //----- $city
      $this->Date_part = false;
      if (isset($city) || $city_cond == "nu" || $city_cond == "nn" || $city_cond == "ep" || $city_cond == "ne")
      {
         $this->monta_condicao("city", $city_cond, $city, "", "city");
      }

      //----- $phone
      $this->Date_part = false;
      if (isset($phone) || $phone_cond == "nu" || $phone_cond == "nn" || $phone_cond == "ep" || $phone_cond == "ne")
      {
         $this->monta_condicao("phone", $phone_cond, $phone, "", "phone");
      }

      //----- $fax
      $this->Date_part = false;
      if (isset($fax) || $fax_cond == "nu" || $fax_cond == "nn" || $fax_cond == "ep" || $fax_cond == "ne")
      {
         $this->monta_condicao("fax", $fax_cond, $fax, "", "fax");
      }

      //----- $cp
      $this->Date_part = false;
      if (isset($cp) || $cp_cond == "nu" || $cp_cond == "nn" || $cp_cond == "ep" || $cp_cond == "ne")
      {
         $this->monta_condicao("cp", $cp_cond, $cp, "", "cp");
      }

      //----- $limit
      $this->Date_part = false;
      if (isset($limit) || $limit_cond == "nu" || $limit_cond == "nn" || $limit_cond == "ep" || $limit_cond == "ne")
      {
         $this->monta_condicao("`limit`", $limit_cond, $limit, "", "limit");
      }

      //----- $discount
      $this->Date_part = false;
      if (isset($discount) || $discount_cond == "nu" || $discount_cond == "nn" || $discount_cond == "ep" || $discount_cond == "ne")
      {
         $this->monta_condicao("discount", $discount_cond, $discount, "", "discount");
      }

      //----- $sc_field_0
      $this->Date_part = false;
      if ($sc_field_0_cond != "bi_TP")
      {
          $sc_field_0_cond = strtoupper($sc_field_0_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $sc_field_0_ano;
          $Dtxt .= $sc_field_0_mes;
          $Dtxt .= $sc_field_0_dia;
          $val[0]['ano'] = $sc_field_0_ano;
          $val[0]['mes'] = $sc_field_0_mes;
          $val[0]['dia'] = $sc_field_0_dia;
          if ($sc_field_0_cond == "BW")
          {
              $val[1]['ano'] = $sc_field_0_input_2_ano;
              $val[1]['mes'] = $sc_field_0_input_2_mes;
              $val[1]['dia'] = $sc_field_0_input_2_dia;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->nm_prep_date($val, "DT", "DATETIME", $sc_field_0_cond, "", "data");
          }
          else
          {
              $this->nm_prep_date($val, "DT", "DATE", $sc_field_0_cond, "", "data");
          }
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $sc_field_0 = $val[0];
          $this->cmp_formatado['sc_field_0'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_0'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['sc_field_0'], "YYYY-MM-DD");
          $this->cmp_formatado['sc_field_0'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          if ($sc_field_0_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $sc_field_0_input_2     = $val[1];
              $this->cmp_formatado['sc_field_0_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_0_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['sc_field_0_input_2'], "YYYY-MM-DD");
              $this->cmp_formatado['sc_field_0_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          }
          if (!empty($Dtxt) || $sc_field_0_cond == "NU" || $sc_field_0_cond == "NN"|| $sc_field_0_cond == "EP"|| $sc_field_0_cond == "NE")
          {
              $this->monta_condicao("date(joinDate)", $sc_field_0_cond, $sc_field_0, $sc_field_0_input_2, 'sc_field_0', 'DATE');
          }
      }

      //----- $sc_field_1
      $this->Date_part = false;
      if ($sc_field_1_cond != "bi_TP")
      {
          $sc_field_1_cond = strtoupper($sc_field_1_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $sc_field_1_ano;
          $Dtxt .= $sc_field_1_mes;
          $Dtxt .= $sc_field_1_dia;
          $val[0]['ano'] = $sc_field_1_ano;
          $val[0]['mes'] = $sc_field_1_mes;
          $val[0]['dia'] = $sc_field_1_dia;
          if ($sc_field_1_cond == "BW")
          {
              $val[1]['ano'] = $sc_field_1_input_2_ano;
              $val[1]['mes'] = $sc_field_1_input_2_mes;
              $val[1]['dia'] = $sc_field_1_input_2_dia;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->nm_prep_date($val, "DT", "DATETIME", $sc_field_1_cond, "", "data");
          }
          else
          {
              $this->nm_prep_date($val, "DT", "DATE", $sc_field_1_cond, "", "data");
          }
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $sc_field_1 = $val[0];
          $this->cmp_formatado['sc_field_1'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_1'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['sc_field_1'], "YYYY-MM-DD");
          $this->cmp_formatado['sc_field_1'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          if ($sc_field_1_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $sc_field_1_input_2     = $val[1];
              $this->cmp_formatado['sc_field_1_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_1_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['sc_field_1_input_2'], "YYYY-MM-DD");
              $this->cmp_formatado['sc_field_1_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          }
          if (!empty($Dtxt) || $sc_field_1_cond == "NU" || $sc_field_1_cond == "NN"|| $sc_field_1_cond == "EP"|| $sc_field_1_cond == "NE")
          {
              $this->monta_condicao("date(expDate)", $sc_field_1_cond, $sc_field_1, $sc_field_1_input_2, 'sc_field_1', 'DATE');
          }
      }

      //----- $policy
      $this->Date_part = false;
      if (isset($policy) || $policy_cond == "nu" || $policy_cond == "nn" || $policy_cond == "ep" || $policy_cond == "ne")
      {
         $this->monta_condicao("policy", $policy_cond, $policy, "", "policy");
      }

      //----- $itemtype
      $this->Date_part = false;
      if (isset($itemtype) || $itemtype_cond == "nu" || $itemtype_cond == "nn" || $itemtype_cond == "ep" || $itemtype_cond == "ne")
      {
         $this->monta_condicao("itemType", $itemtype_cond, $itemtype, "", "itemtype");
      }

      //----- $deleted
      $this->Date_part = false;
      if (isset($deleted) || $deleted_cond == "nu" || $deleted_cond == "nn" || $deleted_cond == "ep" || $deleted_cond == "ne")
      {
         $this->monta_condicao("deleted", $deleted_cond, $deleted, "", "deleted");
      }

      //----- $tempo
      $this->Date_part = false;
      if (isset($tempo) || $tempo_cond == "nu" || $tempo_cond == "nn" || $tempo_cond == "ep" || $tempo_cond == "ne")
      {
         $this->monta_condicao("tempo", $tempo_cond, $tempo, "", "tempo");
      }

      //----- $asuransi
      $this->Date_part = false;
      if (isset($asuransi) || $asuransi_cond == "nu" || $asuransi_cond == "nn" || $asuransi_cond == "ep" || $asuransi_cond == "ne")
      {
         $this->monta_condicao("asuransi", $asuransi_cond, $asuransi, "", "asuransi");
      }

      //----- $marginobat
      $this->Date_part = false;
      if (isset($marginobat) || $marginobat_cond == "nu" || $marginobat_cond == "nn" || $marginobat_cond == "ep" || $marginobat_cond == "ne")
      {
         $this->monta_condicao("marginObat", $marginobat_cond, $marginobat, "", "marginobat");
      }

      //----- $markuptindakan
      $this->Date_part = false;
      if (isset($markuptindakan) || $markuptindakan_cond == "nu" || $markuptindakan_cond == "nn" || $markuptindakan_cond == "ep" || $markuptindakan_cond == "ne")
      {
         $this->monta_condicao("markupTindakan", $markuptindakan_cond, $markuptindakan, "", "markuptindakan");
      }

      //----- $markupobat
      $this->Date_part = false;
      if (isset($markupobat) || $markupobat_cond == "nu" || $markupobat_cond == "nn" || $markupobat_cond == "ep" || $markupobat_cond == "ne")
      {
         $this->monta_condicao("markupObat", $markupobat_cond, $markupobat, "", "markupobat");
      }

      //----- $markuplab
      $this->Date_part = false;
      if (isset($markuplab) || $markuplab_cond == "nu" || $markuplab_cond == "nn" || $markuplab_cond == "ep" || $markuplab_cond == "ne")
      {
         $this->monta_condicao("markupLab", $markuplab_cond, $markuplab, "", "markuplab");
      }

      //----- $markuprad
      $this->Date_part = false;
      if (isset($markuprad) || $markuprad_cond == "nu" || $markuprad_cond == "nn" || $markuprad_cond == "ep" || $markuprad_cond == "ne")
      {
         $this->monta_condicao("markupRad", $markuprad_cond, $markuprad, "", "markuprad");
      }

      //----- $admpolitype
      $this->Date_part = false;
      if (isset($admpolitype) || $admpolitype_cond == "nu" || $admpolitype_cond == "nn" || $admpolitype_cond == "ep" || $admpolitype_cond == "ne")
      {
         $this->monta_condicao("admPoliType", $admpolitype_cond, $admpolitype, "", "admpolitype");
      }

      //----- $adminaptype
      $this->Date_part = false;
      if (isset($adminaptype) || $adminaptype_cond == "nu" || $adminaptype_cond == "nn" || $adminaptype_cond == "ep" || $adminaptype_cond == "ne")
      {
         $this->monta_condicao("admInapType", $adminaptype_cond, $adminaptype, "", "adminaptype");
      }

      //----- $admpolibaru
      $this->Date_part = false;
      if (isset($admpolibaru) || $admpolibaru_cond == "nu" || $admpolibaru_cond == "nn" || $admpolibaru_cond == "ep" || $admpolibaru_cond == "ne")
      {
         $this->monta_condicao("admPoliBaru", $admpolibaru_cond, $admpolibaru, "", "admpolibaru");
      }

      //----- $admpolilama
      $this->Date_part = false;
      if (isset($admpolilama) || $admpolilama_cond == "nu" || $admpolilama_cond == "nn" || $admpolilama_cond == "ep" || $admpolilama_cond == "ne")
      {
         $this->monta_condicao("admPoliLama", $admpolilama_cond, $admpolilama, "", "admpolilama");
      }

      //----- $adminap
      $this->Date_part = false;
      if (isset($adminap) || $adminap_cond == "nu" || $adminap_cond == "nn" || $adminap_cond == "ep" || $adminap_cond == "ne")
      {
         $this->monta_condicao("admInap", $adminap_cond, $adminap, "", "adminap");
      }

      //----- $sc_field_2
      $this->Date_part = false;
      if ($sc_field_2_cond != "bi_TP")
      {
          $sc_field_2_cond = strtoupper($sc_field_2_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $sc_field_2_ano;
          $Dtxt .= $sc_field_2_mes;
          $Dtxt .= $sc_field_2_dia;
          $val[0]['ano'] = $sc_field_2_ano;
          $val[0]['mes'] = $sc_field_2_mes;
          $val[0]['dia'] = $sc_field_2_dia;
          if ($sc_field_2_cond == "BW")
          {
              $val[1]['ano'] = $sc_field_2_input_2_ano;
              $val[1]['mes'] = $sc_field_2_input_2_mes;
              $val[1]['dia'] = $sc_field_2_input_2_dia;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->nm_prep_date($val, "DT", "DATETIME", $sc_field_2_cond, "", "data");
          }
          else
          {
              $this->nm_prep_date($val, "DT", "DATE", $sc_field_2_cond, "", "data");
          }
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $sc_field_2 = $val[0];
          $this->cmp_formatado['sc_field_2'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_2'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['sc_field_2'], "YYYY-MM-DD");
          $this->cmp_formatado['sc_field_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          if ($sc_field_2_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $sc_field_2_input_2     = $val[1];
              $this->cmp_formatado['sc_field_2_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']['sc_field_2_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['sc_field_2_input_2'], "YYYY-MM-DD");
              $this->cmp_formatado['sc_field_2_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          }
          if (!empty($Dtxt) || $sc_field_2_cond == "NU" || $sc_field_2_cond == "NN"|| $sc_field_2_cond == "EP"|| $sc_field_2_cond == "NE")
          {
              $this->monta_condicao("date(lastUpdated)", $sc_field_2_cond, $sc_field_2, $sc_field_2_input_2, 'sc_field_2', 'DATE');
          }
      }

      //----- $marginpma
      $this->Date_part = false;
      if (isset($marginpma) || $marginpma_cond == "nu" || $marginpma_cond == "nn" || $marginpma_cond == "ep" || $marginpma_cond == "ne")
      {
         $this->monta_condicao("marginPMA", $marginpma_cond, $marginpma, "", "marginpma");
      }

      //----- $withpma
      $this->Date_part = false;
      if (isset($withpma) || $withpma_cond == "nu" || $withpma_cond == "nn" || $withpma_cond == "ep" || $withpma_cond == "ne")
      {
         $this->monta_condicao("withPMA", $withpma_cond, $withpma, "", "withpma");
      }

      //----- $forminternal
      $this->Date_part = false;
      if (isset($forminternal) || $forminternal_cond == "nu" || $forminternal_cond == "nn" || $forminternal_cond == "ep" || $forminternal_cond == "ne")
      {
         $this->monta_condicao("formInternal", $forminternal_cond, $forminternal, "", "forminternal");
      }

      //----- $vacc
      $this->Date_part = false;
      if (isset($vacc) || $vacc_cond == "nu" || $vacc_cond == "nn" || $vacc_cond == "ep" || $vacc_cond == "ne")
      {
         $this->monta_condicao("vAcc", $vacc_cond, $vacc, "", "vacc");
      }

      //----- $extcode
      $this->Date_part = false;
      if (isset($extcode) || $extcode_cond == "nu" || $extcode_cond == "nn" || $extcode_cond == "ep" || $extcode_cond == "ne")
      {
         $this->monta_condicao("extCode", $extcode_cond, $extcode, "", "extcode");
      }

      //----- $umum
      $this->Date_part = false;
      if (isset($umum) || $umum_cond == "nu" || $umum_cond == "nn" || $umum_cond == "ep" || $umum_cond == "ne")
      {
         $this->monta_condicao("umum", $umum_cond, $umum, "", "umum");
      }

      //----- $autoshow
      $this->Date_part = false;
      if (isset($autoshow) || $autoshow_cond == "nu" || $autoshow_cond == "nn" || $autoshow_cond == "ep" || $autoshow_cond == "ne")
      {
         $this->monta_condicao("autoShow", $autoshow_cond, $autoshow, "", "autoshow");
      }

      //----- $bpjs
      $this->Date_part = false;
      if (isset($bpjs) || $bpjs_cond == "nu" || $bpjs_cond == "nn" || $bpjs_cond == "ep" || $bpjs_cond == "ne")
      {
         $this->monta_condicao("bpjs", $bpjs_cond, $bpjs, "", "bpjs");
      }

      //----- $caracode
      $this->Date_part = false;
      if (isset($caracode) || $caracode_cond == "nu" || $caracode_cond == "nn" || $caracode_cond == "ep" || $caracode_cond == "ne")
      {
         $this->monta_condicao("caraCode", $caracode_cond, $caracode, "", "caracode");
      }
   }

   /**
    * @access  public
    */
   function finaliza_resultado()
   {
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq_fast'] = "";
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['fast_search']);
      if ("" == $this->comando_filtro)
      {
          $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_orig'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca']) && $_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['campos_busca'], "UTF-8", $_SESSION['scriptcase']['charset']);
      }

      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['opcao']              = "pesq";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq_ant'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbinstansi']['where_pesq'];

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
