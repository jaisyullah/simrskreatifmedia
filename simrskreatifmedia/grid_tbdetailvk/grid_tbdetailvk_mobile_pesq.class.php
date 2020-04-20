<?php

class grid_tbdetailvk_pesq
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['path_libs_php'] = $this->Ini->path_lib_php;
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['opcao'] = "igual";
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
                  $Opt_filter .= "<option value=\"\">" . grid_tbdetailvk_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_tbdetailvk_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_tbdetailvk_pack_protect_string($Cada_filter) .  "</option>\r\n";
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
                  $Opt_filter .= "<option value=\"\">" .  grid_tbdetailvk_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_tbdetailvk_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_tbdetailvk_pack_protect_string($Cada_filter) .  "</option>\r\n";
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

      if ($this->NM_ajax_opcao == 'autocomp_babybirth')
      {
          $babybirth = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_babybirth($babybirth);
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
      if ($this->NM_ajax_opcao == 'autocomp_id')
      {
          $id = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_id($id);
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
      if ($this->NM_ajax_opcao == 'autocomp_birthtime')
      {
          $birthtime = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_birthtime($birthtime);
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
      if ($this->NM_ajax_opcao == 'autocomp_bb')
      {
          $bb = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_bb($bb);
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
      if ($this->NM_ajax_opcao == 'autocomp_tb')
      {
          $tb = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_tb($tb);
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
      if ($this->NM_ajax_opcao == 'autocomp_lingkar')
      {
          $lingkar = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_lingkar($lingkar);
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
      if ($this->NM_ajax_opcao == 'autocomp_hidup')
      {
          $hidup = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_hidup($hidup);
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
      if ($this->NM_ajax_opcao == 'autocomp_pa')
      {
          $pa = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_pa($pa);
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
      if ($this->NM_ajax_opcao == 'autocomp_cito')
      {
          $cito = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_cito($cito);
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
      if ($this->NM_ajax_opcao == 'autocomp_citoproc')
      {
          $citoproc = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_citoproc($citoproc);
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
      if ($this->NM_ajax_opcao == 'autocomp_diagpre')
      {
          $diagpre = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_diagpre($diagpre);
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
      if ($this->NM_ajax_opcao == 'autocomp_diagpost')
      {
          $diagpost = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_diagpost($diagpost);
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
      if ($this->NM_ajax_opcao == 'autocomp_class')
      {
          $class = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_class($class);
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
      if ($this->NM_ajax_opcao == 'autocomp_inapcode')
      {
          $inapcode = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_inapcode($inapcode);
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
   function lookup_ajax_babybirth($babybirth)
   {
      $babybirth = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $babybirth);
      $babybirth = substr($this->Db->qstr($babybirth), 1, -1);
            $babybirth_look = substr($this->Db->qstr($babybirth), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct babyBirth from " . $this->Ini->nm_tabela . " where   CAST (babyBirth AS TEXT)  like '%" . $babybirth . "%' order by babyBirth"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct babyBirth from " . $this->Ini->nm_tabela . " where   CAST (babyBirth AS VARCHAR)  like '%" . $babybirth . "%' order by babyBirth"; 
      }
      else
      {
          $nm_comando = "select distinct babyBirth from " . $this->Ini->nm_tabela . " where  babyBirth like '%" . $babybirth . "%' order by babyBirth"; 
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
   
   function lookup_ajax_id($id)
   {
      $id = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $id);
      $id = substr($this->Db->qstr($id), 1, -1);
            $id_look = substr($this->Db->qstr($id), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct id from " . $this->Ini->nm_tabela . " where   CAST (id AS TEXT)  like '%" . $id . "%' order by id"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct id from " . $this->Ini->nm_tabela . " where   CAST (id AS VARCHAR)  like '%" . $id . "%' order by id"; 
      }
      else
      {
          $nm_comando = "select distinct id from " . $this->Ini->nm_tabela . " where  id like '%" . $id . "%' order by id"; 
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
   
   function lookup_ajax_trancode($trancode)
   {
      $trancode = substr($this->Db->qstr($trancode), 1, -1);
            $trancode_look = substr($this->Db->qstr($trancode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct tranCode from " . $this->Ini->nm_tabela . " where  tranCode like '%" . $trancode . "%' order by tranCode"; 
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
   
   function lookup_ajax_custcode($custcode)
   {
      $custcode = substr($this->Db->qstr($custcode), 1, -1);
            $custcode_look = substr($this->Db->qstr($custcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct custCode from " . $this->Ini->nm_tabela . " where  custCode like '%" . $custcode . "%' order by custCode"; 
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
   
   function lookup_ajax_birthtime($birthtime)
   {
      $birthtime = substr($this->Db->qstr($birthtime), 1, -1);
            $birthtime_look = substr($this->Db->qstr($birthtime), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct birthTime from " . $this->Ini->nm_tabela . " where  birthTime like '%" . $birthtime . "%' order by birthTime"; 
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
   
   function lookup_ajax_bb($bb)
   {
      $bb = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $bb);
      $bb = substr($this->Db->qstr($bb), 1, -1);
            $bb_look = substr($this->Db->qstr($bb), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct bb from " . $this->Ini->nm_tabela . " where   CAST (bb AS TEXT)  like '%" . $bb . "%' order by bb"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct bb from " . $this->Ini->nm_tabela . " where   CAST (bb AS VARCHAR)  like '%" . $bb . "%' order by bb"; 
      }
      else
      {
          $nm_comando = "select distinct bb from " . $this->Ini->nm_tabela . " where  bb like '%" . $bb . "%' order by bb"; 
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
   
   function lookup_ajax_tb($tb)
   {
      $tb = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $tb);
      $tb = substr($this->Db->qstr($tb), 1, -1);
            $tb_look = substr($this->Db->qstr($tb), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct tb from " . $this->Ini->nm_tabela . " where   CAST (tb AS TEXT)  like '%" . $tb . "%' order by tb"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct tb from " . $this->Ini->nm_tabela . " where   CAST (tb AS VARCHAR)  like '%" . $tb . "%' order by tb"; 
      }
      else
      {
          $nm_comando = "select distinct tb from " . $this->Ini->nm_tabela . " where  tb like '%" . $tb . "%' order by tb"; 
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
   
   function lookup_ajax_lingkar($lingkar)
   {
      $lingkar = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $lingkar);
      $lingkar = substr($this->Db->qstr($lingkar), 1, -1);
            $lingkar_look = substr($this->Db->qstr($lingkar), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct lingkar from " . $this->Ini->nm_tabela . " where   CAST (lingkar AS TEXT)  like '%" . $lingkar . "%' order by lingkar"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct lingkar from " . $this->Ini->nm_tabela . " where   CAST (lingkar AS VARCHAR)  like '%" . $lingkar . "%' order by lingkar"; 
      }
      else
      {
          $nm_comando = "select distinct lingkar from " . $this->Ini->nm_tabela . " where  lingkar like '%" . $lingkar . "%' order by lingkar"; 
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
   
   function lookup_ajax_hidup($hidup)
   {
      $hidup = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $hidup);
      $hidup = substr($this->Db->qstr($hidup), 1, -1);
            $hidup_look = substr($this->Db->qstr($hidup), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct hidup from " . $this->Ini->nm_tabela . " where   CAST (hidup AS TEXT)  like '%" . $hidup . "%' order by hidup"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct hidup from " . $this->Ini->nm_tabela . " where   CAST (hidup AS VARCHAR)  like '%" . $hidup . "%' order by hidup"; 
      }
      else
      {
          $nm_comando = "select distinct hidup from " . $this->Ini->nm_tabela . " where  hidup like '%" . $hidup . "%' order by hidup"; 
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
   
   function lookup_ajax_pa($pa)
   {
      $pa = substr($this->Db->qstr($pa), 1, -1);
            $pa_look = substr($this->Db->qstr($pa), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct PA from " . $this->Ini->nm_tabela . " where  PA like '%" . $pa . "%' order by PA"; 
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
   
   function lookup_ajax_cito($cito)
   {
      $cito = substr($this->Db->qstr($cito), 1, -1);
            $cito_look = substr($this->Db->qstr($cito), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct Cito from " . $this->Ini->nm_tabela . " where  Cito like '%" . $cito . "%' order by Cito"; 
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
   
   function lookup_ajax_citoproc($citoproc)
   {
      $citoproc = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $citoproc);
      $citoproc = substr($this->Db->qstr($citoproc), 1, -1);
            $citoproc_look = substr($this->Db->qstr($citoproc), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct citoProc from " . $this->Ini->nm_tabela . " where   CAST (citoProc AS TEXT)  like '%" . $citoproc . "%' order by citoProc"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct citoProc from " . $this->Ini->nm_tabela . " where   CAST (citoProc AS VARCHAR)  like '%" . $citoproc . "%' order by citoProc"; 
      }
      else
      {
          $nm_comando = "select distinct citoProc from " . $this->Ini->nm_tabela . " where  citoProc like '%" . $citoproc . "%' order by citoProc"; 
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
   
   function lookup_ajax_diagpre($diagpre)
   {
      $diagpre = substr($this->Db->qstr($diagpre), 1, -1);
            $diagpre_look = substr($this->Db->qstr($diagpre), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct diagPre from " . $this->Ini->nm_tabela . " where  diagPre like '%" . $diagpre . "%' order by diagPre"; 
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
   
   function lookup_ajax_diagpost($diagpost)
   {
      $diagpost = substr($this->Db->qstr($diagpost), 1, -1);
            $diagpost_look = substr($this->Db->qstr($diagpost), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct diagPost from " . $this->Ini->nm_tabela . " where  diagPost like '%" . $diagpost . "%' order by diagPost"; 
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
   
   function lookup_ajax_class($class)
   {
      $class = substr($this->Db->qstr($class), 1, -1);
            $class_look = substr($this->Db->qstr($class), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct class from " . $this->Ini->nm_tabela . " where  class like '%" . $class . "%' order by class"; 
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
   
   function lookup_ajax_inapcode($inapcode)
   {
      $inapcode = substr($this->Db->qstr($inapcode), 1, -1);
            $inapcode_look = substr($this->Db->qstr($inapcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct inapCode from " . $this->Ini->nm_tabela . " where  inapCode like '%" . $inapcode . "%' order by inapCode"; 
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
      $Nm_datas[] = "birthDate";$Nm_datas[] = "birthDate";$Nm_datas[] = "anesTime";$Nm_datas[] = "anesTime";$Nm_datas[] = "inTime";$Nm_datas[] = "inTime";$Nm_datas[] = "outTime";$Nm_datas[] = "outTime";$Nm_datas[] = "tranDate";$Nm_datas[] = "tranDate";$Nm_datas[] = "awalObs";$Nm_datas[] = "awalObs";$Nm_datas[] = "akhirObs";$Nm_datas[] = "akhirObs";$Nm_numeric[] = "id";$Nm_numeric[] = "babybirth";$Nm_numeric[] = "bb";$Nm_numeric[] = "tb";$Nm_numeric[] = "lingkar";$Nm_numeric[] = "hidup";$Nm_numeric[] = "citoproc";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
          if ($condicao == "EP" || $condicao == "NE")
          {
              return;
          }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['decimal_db'] == ".")
         {
            $nm_aspas  = "";
            $nm_aspas1 = "";
         }
         if ($condicao != "IN")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['decimal_db'] == ".")
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
      $Nm_datas[] = "birthDate";$Nm_datas[] = "birthDate";$Nm_datas[] = "anesTime";$Nm_datas[] = "anesTime";$Nm_datas[] = "inTime";$Nm_datas[] = "inTime";$Nm_datas[] = "outTime";$Nm_datas[] = "outTime";$Nm_datas[] = "tranDate";$Nm_datas[] = "tranDate";$Nm_datas[] = "awalObs";$Nm_datas[] = "awalObs";$Nm_datas[] = "akhirObs";$Nm_datas[] = "akhirObs";
      if (in_array($campo_join, $Nm_datas))
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['SC_sep_date']))
          {
              $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['SC_sep_date'];
              $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['SC_sep_date1'];
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
         $nome_sum = "tbdetailvk.$nome";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
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
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . ": " . $NM_cond . "##*@@";
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
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $lang_like . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
            break;
            case "DF":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "BW":     // 
               $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"] . "##*@@";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] . "##*@@";
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . "##*@@";
            break;
            case "EP":     // 
               $this->comando        .= " $nome = '' ";
               $this->comando_sum    .= " $nome_sum = '' ";
               $this->comando_filtro .= " $nome = '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_empty'] . "##*@@";
            break;
            case "NE":     // 
               $this->comando        .= " $nome <> '' ";
               $this->comando_sum    .= " $nome_sum <> '' ";
               $this->comando_filtro .= " $nome <> '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nempty'] . "##*@@";
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
 <TITLE> - Kamar Bersalin</TITLE>
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
 <TITLE> - Kamar Bersalin</TITLE>
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>grid_tbdetailvk/grid_tbdetailvk_fil_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
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
 <script type="text/javascript" src="grid_tbdetailvk_ajax_search.js"></script>
 <script type="text/javascript" src="grid_tbdetailvk_ajax.js"></script>
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
<script type="text/javascript" src="grid_tbdetailvk_message.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_sweetalert.css" />
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['grid_tbdetailvk']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['grid_tbdetailvk']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['ajax_nav'])
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
<script type="text/javascript" src="grid_tbdetailvk_message.js"></script>
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
  str_out += 'SC_babybirth_cond#NMF#' + search_get_sel_txt('SC_babybirth_cond') + '@NMF@';
  str_out += 'SC_babybirth#NMF#' + search_get_text('SC_babybirth') + '@NMF@';
  str_out += 'id_ac_babybirth#NMF#' + search_get_text('id_ac_babybirth') + '@NMF@';
  str_out += 'SC_id_cond#NMF#' + search_get_sel_txt('SC_id_cond') + '@NMF@';
  str_out += 'SC_id#NMF#' + search_get_text('SC_id') + '@NMF@';
  str_out += 'id_ac_id#NMF#' + search_get_text('id_ac_id') + '@NMF@';
  str_out += 'SC_trancode_cond#NMF#' + search_get_sel_txt('SC_trancode_cond') + '@NMF@';
  str_out += 'SC_trancode#NMF#' + search_get_text('SC_trancode') + '@NMF@';
  str_out += 'id_ac_trancode#NMF#' + search_get_text('id_ac_trancode') + '@NMF@';
  str_out += 'SC_custcode_cond#NMF#' + search_get_sel_txt('SC_custcode_cond') + '@NMF@';
  str_out += 'SC_custcode#NMF#' + search_get_text('SC_custcode') + '@NMF@';
  str_out += 'id_ac_custcode#NMF#' + search_get_text('id_ac_custcode') + '@NMF@';
  str_out += 'SC_birthdate_cond#NMF#' + search_get_sel_txt('SC_birthdate_cond') + '@NMF@';
  str_out += 'SC_birthdate_dia#NMF#' + search_get_sel_txt('SC_birthdate_dia') + '@NMF@';
  str_out += 'SC_birthdate_mes#NMF#' + search_get_sel_txt('SC_birthdate_mes') + '@NMF@';
  str_out += 'SC_birthdate_ano#NMF#' + search_get_sel_txt('SC_birthdate_ano') + '@NMF@';
  str_out += 'SC_birthdate_input_2_dia#NMF#' + search_get_sel_txt('SC_birthdate_input_2_dia') + '@NMF@';
  str_out += 'SC_birthdate_input_2_mes#NMF#' + search_get_sel_txt('SC_birthdate_input_2_mes') + '@NMF@';
  str_out += 'SC_birthdate_input_2_ano#NMF#' + search_get_sel_txt('SC_birthdate_input_2_ano') + '@NMF@';
  str_out += 'SC_birthdate_hor#NMF#' + search_get_sel_txt('SC_birthdate_hor') + '@NMF@';
  str_out += 'SC_birthdate_min#NMF#' + search_get_sel_txt('SC_birthdate_min') + '@NMF@';
  str_out += 'SC_birthdate_seg#NMF#' + search_get_sel_txt('SC_birthdate_seg') + '@NMF@';
  str_out += 'SC_birthdate_input_2_hor#NMF#' + search_get_sel_txt('SC_birthdate_input_2_hor') + '@NMF@';
  str_out += 'SC_birthdate_input_2_min#NMF#' + search_get_sel_txt('SC_birthdate_input_2_min') + '@NMF@';
  str_out += 'SC_birthdate_input_2_seg#NMF#' + search_get_sel_txt('SC_birthdate_input_2_seg') + '@NMF@';
  str_out += 'SC_birthtime_cond#NMF#' + search_get_sel_txt('SC_birthtime_cond') + '@NMF@';
  str_out += 'SC_birthtime#NMF#' + search_get_text('SC_birthtime') + '@NMF@';
  str_out += 'id_ac_birthtime#NMF#' + search_get_text('id_ac_birthtime') + '@NMF@';
  str_out += 'SC_bb_cond#NMF#' + search_get_sel_txt('SC_bb_cond') + '@NMF@';
  str_out += 'SC_bb#NMF#' + search_get_text('SC_bb') + '@NMF@';
  str_out += 'id_ac_bb#NMF#' + search_get_text('id_ac_bb') + '@NMF@';
  str_out += 'SC_tb_cond#NMF#' + search_get_sel_txt('SC_tb_cond') + '@NMF@';
  str_out += 'SC_tb#NMF#' + search_get_text('SC_tb') + '@NMF@';
  str_out += 'id_ac_tb#NMF#' + search_get_text('id_ac_tb') + '@NMF@';
  str_out += 'SC_lingkar_cond#NMF#' + search_get_sel_txt('SC_lingkar_cond') + '@NMF@';
  str_out += 'SC_lingkar#NMF#' + search_get_text('SC_lingkar') + '@NMF@';
  str_out += 'id_ac_lingkar#NMF#' + search_get_text('id_ac_lingkar') + '@NMF@';
  str_out += 'SC_hidup_cond#NMF#' + search_get_sel_txt('SC_hidup_cond') + '@NMF@';
  str_out += 'SC_hidup#NMF#' + search_get_text('SC_hidup') + '@NMF@';
  str_out += 'id_ac_hidup#NMF#' + search_get_text('id_ac_hidup') + '@NMF@';
  str_out += 'SC_anestime_cond#NMF#' + search_get_sel_txt('SC_anestime_cond') + '@NMF@';
  str_out += 'SC_anestime_dia#NMF#' + search_get_sel_txt('SC_anestime_dia') + '@NMF@';
  str_out += 'SC_anestime_mes#NMF#' + search_get_sel_txt('SC_anestime_mes') + '@NMF@';
  str_out += 'SC_anestime_ano#NMF#' + search_get_sel_txt('SC_anestime_ano') + '@NMF@';
  str_out += 'SC_anestime_input_2_dia#NMF#' + search_get_sel_txt('SC_anestime_input_2_dia') + '@NMF@';
  str_out += 'SC_anestime_input_2_mes#NMF#' + search_get_sel_txt('SC_anestime_input_2_mes') + '@NMF@';
  str_out += 'SC_anestime_input_2_ano#NMF#' + search_get_sel_txt('SC_anestime_input_2_ano') + '@NMF@';
  str_out += 'SC_anestime_hor#NMF#' + search_get_sel_txt('SC_anestime_hor') + '@NMF@';
  str_out += 'SC_anestime_min#NMF#' + search_get_sel_txt('SC_anestime_min') + '@NMF@';
  str_out += 'SC_anestime_seg#NMF#' + search_get_sel_txt('SC_anestime_seg') + '@NMF@';
  str_out += 'SC_anestime_input_2_hor#NMF#' + search_get_sel_txt('SC_anestime_input_2_hor') + '@NMF@';
  str_out += 'SC_anestime_input_2_min#NMF#' + search_get_sel_txt('SC_anestime_input_2_min') + '@NMF@';
  str_out += 'SC_anestime_input_2_seg#NMF#' + search_get_sel_txt('SC_anestime_input_2_seg') + '@NMF@';
  str_out += 'SC_intime_cond#NMF#' + search_get_sel_txt('SC_intime_cond') + '@NMF@';
  str_out += 'SC_intime_dia#NMF#' + search_get_sel_txt('SC_intime_dia') + '@NMF@';
  str_out += 'SC_intime_mes#NMF#' + search_get_sel_txt('SC_intime_mes') + '@NMF@';
  str_out += 'SC_intime_ano#NMF#' + search_get_sel_txt('SC_intime_ano') + '@NMF@';
  str_out += 'SC_intime_input_2_dia#NMF#' + search_get_sel_txt('SC_intime_input_2_dia') + '@NMF@';
  str_out += 'SC_intime_input_2_mes#NMF#' + search_get_sel_txt('SC_intime_input_2_mes') + '@NMF@';
  str_out += 'SC_intime_input_2_ano#NMF#' + search_get_sel_txt('SC_intime_input_2_ano') + '@NMF@';
  str_out += 'SC_intime_hor#NMF#' + search_get_sel_txt('SC_intime_hor') + '@NMF@';
  str_out += 'SC_intime_min#NMF#' + search_get_sel_txt('SC_intime_min') + '@NMF@';
  str_out += 'SC_intime_seg#NMF#' + search_get_sel_txt('SC_intime_seg') + '@NMF@';
  str_out += 'SC_intime_input_2_hor#NMF#' + search_get_sel_txt('SC_intime_input_2_hor') + '@NMF@';
  str_out += 'SC_intime_input_2_min#NMF#' + search_get_sel_txt('SC_intime_input_2_min') + '@NMF@';
  str_out += 'SC_intime_input_2_seg#NMF#' + search_get_sel_txt('SC_intime_input_2_seg') + '@NMF@';
  str_out += 'SC_outtime_cond#NMF#' + search_get_sel_txt('SC_outtime_cond') + '@NMF@';
  str_out += 'SC_outtime_dia#NMF#' + search_get_sel_txt('SC_outtime_dia') + '@NMF@';
  str_out += 'SC_outtime_mes#NMF#' + search_get_sel_txt('SC_outtime_mes') + '@NMF@';
  str_out += 'SC_outtime_ano#NMF#' + search_get_sel_txt('SC_outtime_ano') + '@NMF@';
  str_out += 'SC_outtime_input_2_dia#NMF#' + search_get_sel_txt('SC_outtime_input_2_dia') + '@NMF@';
  str_out += 'SC_outtime_input_2_mes#NMF#' + search_get_sel_txt('SC_outtime_input_2_mes') + '@NMF@';
  str_out += 'SC_outtime_input_2_ano#NMF#' + search_get_sel_txt('SC_outtime_input_2_ano') + '@NMF@';
  str_out += 'SC_outtime_hor#NMF#' + search_get_sel_txt('SC_outtime_hor') + '@NMF@';
  str_out += 'SC_outtime_min#NMF#' + search_get_sel_txt('SC_outtime_min') + '@NMF@';
  str_out += 'SC_outtime_seg#NMF#' + search_get_sel_txt('SC_outtime_seg') + '@NMF@';
  str_out += 'SC_outtime_input_2_hor#NMF#' + search_get_sel_txt('SC_outtime_input_2_hor') + '@NMF@';
  str_out += 'SC_outtime_input_2_min#NMF#' + search_get_sel_txt('SC_outtime_input_2_min') + '@NMF@';
  str_out += 'SC_outtime_input_2_seg#NMF#' + search_get_sel_txt('SC_outtime_input_2_seg') + '@NMF@';
  str_out += 'SC_pa_cond#NMF#' + search_get_sel_txt('SC_pa_cond') + '@NMF@';
  str_out += 'SC_pa#NMF#' + search_get_text('SC_pa') + '@NMF@';
  str_out += 'id_ac_pa#NMF#' + search_get_text('id_ac_pa') + '@NMF@';
  str_out += 'SC_cito_cond#NMF#' + search_get_sel_txt('SC_cito_cond') + '@NMF@';
  str_out += 'SC_cito#NMF#' + search_get_text('SC_cito') + '@NMF@';
  str_out += 'id_ac_cito#NMF#' + search_get_text('id_ac_cito') + '@NMF@';
  str_out += 'SC_citoproc_cond#NMF#' + search_get_sel_txt('SC_citoproc_cond') + '@NMF@';
  str_out += 'SC_citoproc#NMF#' + search_get_text('SC_citoproc') + '@NMF@';
  str_out += 'id_ac_citoproc#NMF#' + search_get_text('id_ac_citoproc') + '@NMF@';
  str_out += 'SC_diagpre_cond#NMF#' + search_get_sel_txt('SC_diagpre_cond') + '@NMF@';
  str_out += 'SC_diagpre#NMF#' + search_get_text('SC_diagpre') + '@NMF@';
  str_out += 'id_ac_diagpre#NMF#' + search_get_text('id_ac_diagpre') + '@NMF@';
  str_out += 'SC_diagpost_cond#NMF#' + search_get_sel_txt('SC_diagpost_cond') + '@NMF@';
  str_out += 'SC_diagpost#NMF#' + search_get_text('SC_diagpost') + '@NMF@';
  str_out += 'id_ac_diagpost#NMF#' + search_get_text('id_ac_diagpost') + '@NMF@';
  str_out += 'SC_trandate_cond#NMF#' + search_get_sel_txt('SC_trandate_cond') + '@NMF@';
  str_out += 'SC_trandate_dia#NMF#' + search_get_sel_txt('SC_trandate_dia') + '@NMF@';
  str_out += 'SC_trandate_mes#NMF#' + search_get_sel_txt('SC_trandate_mes') + '@NMF@';
  str_out += 'SC_trandate_ano#NMF#' + search_get_sel_txt('SC_trandate_ano') + '@NMF@';
  str_out += 'SC_trandate_input_2_dia#NMF#' + search_get_sel_txt('SC_trandate_input_2_dia') + '@NMF@';
  str_out += 'SC_trandate_input_2_mes#NMF#' + search_get_sel_txt('SC_trandate_input_2_mes') + '@NMF@';
  str_out += 'SC_trandate_input_2_ano#NMF#' + search_get_sel_txt('SC_trandate_input_2_ano') + '@NMF@';
  str_out += 'SC_trandate_hor#NMF#' + search_get_sel_txt('SC_trandate_hor') + '@NMF@';
  str_out += 'SC_trandate_min#NMF#' + search_get_sel_txt('SC_trandate_min') + '@NMF@';
  str_out += 'SC_trandate_seg#NMF#' + search_get_sel_txt('SC_trandate_seg') + '@NMF@';
  str_out += 'SC_trandate_input_2_hor#NMF#' + search_get_sel_txt('SC_trandate_input_2_hor') + '@NMF@';
  str_out += 'SC_trandate_input_2_min#NMF#' + search_get_sel_txt('SC_trandate_input_2_min') + '@NMF@';
  str_out += 'SC_trandate_input_2_seg#NMF#' + search_get_sel_txt('SC_trandate_input_2_seg') + '@NMF@';
  str_out += 'SC_class_cond#NMF#' + search_get_sel_txt('SC_class_cond') + '@NMF@';
  str_out += 'SC_class#NMF#' + search_get_text('SC_class') + '@NMF@';
  str_out += 'id_ac_class#NMF#' + search_get_text('id_ac_class') + '@NMF@';
  str_out += 'SC_awalobs_cond#NMF#' + search_get_sel_txt('SC_awalobs_cond') + '@NMF@';
  str_out += 'SC_awalobs_dia#NMF#' + search_get_sel_txt('SC_awalobs_dia') + '@NMF@';
  str_out += 'SC_awalobs_mes#NMF#' + search_get_sel_txt('SC_awalobs_mes') + '@NMF@';
  str_out += 'SC_awalobs_ano#NMF#' + search_get_sel_txt('SC_awalobs_ano') + '@NMF@';
  str_out += 'SC_awalobs_input_2_dia#NMF#' + search_get_sel_txt('SC_awalobs_input_2_dia') + '@NMF@';
  str_out += 'SC_awalobs_input_2_mes#NMF#' + search_get_sel_txt('SC_awalobs_input_2_mes') + '@NMF@';
  str_out += 'SC_awalobs_input_2_ano#NMF#' + search_get_sel_txt('SC_awalobs_input_2_ano') + '@NMF@';
  str_out += 'SC_awalobs_hor#NMF#' + search_get_sel_txt('SC_awalobs_hor') + '@NMF@';
  str_out += 'SC_awalobs_min#NMF#' + search_get_sel_txt('SC_awalobs_min') + '@NMF@';
  str_out += 'SC_awalobs_seg#NMF#' + search_get_sel_txt('SC_awalobs_seg') + '@NMF@';
  str_out += 'SC_awalobs_input_2_hor#NMF#' + search_get_sel_txt('SC_awalobs_input_2_hor') + '@NMF@';
  str_out += 'SC_awalobs_input_2_min#NMF#' + search_get_sel_txt('SC_awalobs_input_2_min') + '@NMF@';
  str_out += 'SC_awalobs_input_2_seg#NMF#' + search_get_sel_txt('SC_awalobs_input_2_seg') + '@NMF@';
  str_out += 'SC_akhirobs_cond#NMF#' + search_get_sel_txt('SC_akhirobs_cond') + '@NMF@';
  str_out += 'SC_akhirobs_dia#NMF#' + search_get_sel_txt('SC_akhirobs_dia') + '@NMF@';
  str_out += 'SC_akhirobs_mes#NMF#' + search_get_sel_txt('SC_akhirobs_mes') + '@NMF@';
  str_out += 'SC_akhirobs_ano#NMF#' + search_get_sel_txt('SC_akhirobs_ano') + '@NMF@';
  str_out += 'SC_akhirobs_input_2_dia#NMF#' + search_get_sel_txt('SC_akhirobs_input_2_dia') + '@NMF@';
  str_out += 'SC_akhirobs_input_2_mes#NMF#' + search_get_sel_txt('SC_akhirobs_input_2_mes') + '@NMF@';
  str_out += 'SC_akhirobs_input_2_ano#NMF#' + search_get_sel_txt('SC_akhirobs_input_2_ano') + '@NMF@';
  str_out += 'SC_akhirobs_hor#NMF#' + search_get_sel_txt('SC_akhirobs_hor') + '@NMF@';
  str_out += 'SC_akhirobs_min#NMF#' + search_get_sel_txt('SC_akhirobs_min') + '@NMF@';
  str_out += 'SC_akhirobs_seg#NMF#' + search_get_sel_txt('SC_akhirobs_seg') + '@NMF@';
  str_out += 'SC_akhirobs_input_2_hor#NMF#' + search_get_sel_txt('SC_akhirobs_input_2_hor') + '@NMF@';
  str_out += 'SC_akhirobs_input_2_min#NMF#' + search_get_sel_txt('SC_akhirobs_input_2_min') + '@NMF@';
  str_out += 'SC_akhirobs_input_2_seg#NMF#' + search_get_sel_txt('SC_akhirobs_input_2_seg') + '@NMF@';
  str_out += 'SC_inapcode_cond#NMF#' + search_get_sel_txt('SC_inapcode_cond') + '@NMF@';
  str_out += 'SC_inapcode#NMF#' + search_get_text('SC_inapcode') + '@NMF@';
  str_out += 'id_ac_inapcode#NMF#' + search_get_text('id_ac_inapcode') + '@NMF@';
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
   $("#id_ac_inapcode").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_inapcode",
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
       $("#SC_inapcode").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_inapcode").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_inapcode").val( $(this).val() );
       }
     }
   });
   $("#id_ac_diagpre").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_diagpre",
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
       $("#SC_diagpre").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_diagpre").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_diagpre").val( $(this).val() );
       }
     }
   });
   $("#id_ac_diagpost").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_diagpost",
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
       $("#SC_diagpost").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_diagpost").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_diagpost").val( $(this).val() );
       }
     }
   });
   $("#id_ac_id").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_id",
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
       $("#SC_id").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_id").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_id").val( $(this).val() );
       }
     }
   });
   $("#id_ac_babybirth").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_babybirth",
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
       $("#SC_babybirth").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_babybirth").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_babybirth").val( $(this).val() );
       }
     }
   });
   $("#id_ac_birthtime").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_birthtime",
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
       $("#SC_birthtime").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_birthtime").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_birthtime").val( $(this).val() );
       }
     }
   });
   $("#id_ac_bb").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_bb",
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
       $("#SC_bb").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_bb").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_bb").val( $(this).val() );
       }
     }
   });
   $("#id_ac_tb").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_tb",
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
       $("#SC_tb").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_tb").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_tb").val( $(this).val() );
       }
     }
   });
   $("#id_ac_lingkar").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_lingkar",
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
       $("#SC_lingkar").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_lingkar").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_lingkar").val( $(this).val() );
       }
     }
   });
   $("#id_ac_hidup").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_hidup",
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
       $("#SC_hidup").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_hidup").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_hidup").val( $(this).val() );
       }
     }
   });
   $("#id_ac_pa").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_pa",
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
       $("#SC_pa").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_pa").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_pa").val( $(this).val() );
       }
     }
   });
   $("#id_ac_cito").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_cito",
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
       $("#SC_cito").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_cito").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_cito").val( $(this).val() );
       }
     }
   });
   $("#id_ac_citoproc").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_citoproc",
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
       $("#SC_citoproc").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_citoproc").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_citoproc").val( $(this).val() );
       }
     }
   });
   $("#id_ac_class").autocomplete({
     minLength: 1,
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_class",
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
       $("#SC_class").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_class").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_class").val( $(this).val() );
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dashboard_info']['compact_mode'])
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
    <div class="scFilterHeaderFont" style="float: left; text-transform: uppercase;"><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - Kamar Bersalin</div>
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
             $babybirth_cond, $babybirth, $babybirth_autocomp,
             $id_cond, $id, $id_autocomp,
             $trancode_cond, $trancode, $trancode_autocomp,
             $custcode_cond, $custcode, $custcode_autocomp,
             $birthdate_cond, $birthdate, $birthdate_dia, $birthdate_mes, $birthdate_ano, $birthdate_hor, $birthdate_min, $birthdate_seg,
             $birthtime_cond, $birthtime, $birthtime_autocomp,
             $bb_cond, $bb, $bb_autocomp,
             $tb_cond, $tb, $tb_autocomp,
             $lingkar_cond, $lingkar, $lingkar_autocomp,
             $hidup_cond, $hidup, $hidup_autocomp,
             $anestime_cond, $anestime, $anestime_dia, $anestime_mes, $anestime_ano, $anestime_hor, $anestime_min, $anestime_seg,
             $intime_cond, $intime, $intime_dia, $intime_mes, $intime_ano, $intime_hor, $intime_min, $intime_seg,
             $outtime_cond, $outtime, $outtime_dia, $outtime_mes, $outtime_ano, $outtime_hor, $outtime_min, $outtime_seg,
             $pa_cond, $pa, $pa_autocomp,
             $cito_cond, $cito, $cito_autocomp,
             $citoproc_cond, $citoproc, $citoproc_autocomp,
             $diagpre_cond, $diagpre, $diagpre_autocomp,
             $diagpost_cond, $diagpost, $diagpost_autocomp,
             $trandate_cond, $trandate, $trandate_dia, $trandate_mes, $trandate_ano, $trandate_hor, $trandate_min, $trandate_seg,
             $class_cond, $class, $class_autocomp,
             $awalobs_cond, $awalobs, $awalobs_dia, $awalobs_mes, $awalobs_ano, $awalobs_hor, $awalobs_min, $awalobs_seg,
             $akhirobs_cond, $akhirobs, $akhirobs_dia, $akhirobs_mes, $akhirobs_ano, $akhirobs_hor, $akhirobs_min, $akhirobs_seg,
             $inapcode_cond, $inapcode, $inapcode_autocomp,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailvk']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailvk']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailvk']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("grid_tbdetailvk", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      {
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $babybirth = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['babybirth']; 
          $babybirth_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['babybirth_cond']; 
          $id = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['id']; 
          $id_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['id_cond']; 
          $trancode = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trancode']; 
          $trancode_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trancode_cond']; 
          $custcode = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['custcode']; 
          $custcode_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['custcode_cond']; 
          $birthdate_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_dia']; 
          $birthdate_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_mes']; 
          $birthdate_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_ano']; 
          $birthdate_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_hor']; 
          $birthdate_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_min']; 
          $birthdate_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_seg']; 
          $birthdate_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_cond']; 
          $birthtime = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthtime']; 
          $birthtime_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthtime_cond']; 
          $bb = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['bb']; 
          $bb_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['bb_cond']; 
          $tb = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['tb']; 
          $tb_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['tb_cond']; 
          $lingkar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['lingkar']; 
          $lingkar_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['lingkar_cond']; 
          $hidup = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['hidup']; 
          $hidup_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['hidup_cond']; 
          $anestime_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_dia']; 
          $anestime_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_mes']; 
          $anestime_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_ano']; 
          $anestime_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_hor']; 
          $anestime_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_min']; 
          $anestime_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_seg']; 
          $anestime_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_cond']; 
          $intime_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_dia']; 
          $intime_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_mes']; 
          $intime_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_ano']; 
          $intime_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_hor']; 
          $intime_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_min']; 
          $intime_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_seg']; 
          $intime_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_cond']; 
          $outtime_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_dia']; 
          $outtime_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_mes']; 
          $outtime_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_ano']; 
          $outtime_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_hor']; 
          $outtime_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_min']; 
          $outtime_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_seg']; 
          $outtime_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_cond']; 
          $pa = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['pa']; 
          $pa_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['pa_cond']; 
          $cito = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['cito']; 
          $cito_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['cito_cond']; 
          $citoproc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['citoproc']; 
          $citoproc_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['citoproc_cond']; 
          $diagpre = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['diagpre']; 
          $diagpre_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['diagpre_cond']; 
          $diagpost = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['diagpost']; 
          $diagpost_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['diagpost_cond']; 
          $trandate_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_dia']; 
          $trandate_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_mes']; 
          $trandate_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_ano']; 
          $trandate_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_hor']; 
          $trandate_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_min']; 
          $trandate_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_seg']; 
          $trandate_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_cond']; 
          $class = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['class']; 
          $class_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['class_cond']; 
          $awalobs_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_dia']; 
          $awalobs_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_mes']; 
          $awalobs_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_ano']; 
          $awalobs_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_hor']; 
          $awalobs_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_min']; 
          $awalobs_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_seg']; 
          $awalobs_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_cond']; 
          $akhirobs_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_dia']; 
          $akhirobs_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_mes']; 
          $akhirobs_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_ano']; 
          $akhirobs_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_hor']; 
          $akhirobs_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_min']; 
          $akhirobs_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_seg']; 
          $akhirobs_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_cond']; 
          $inapcode = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['inapcode']; 
          $inapcode_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['inapcode_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['NM_operador']; 
      } 
      $display_aberto  = "style=display:";
      $display_fechado = "style=display:none";
      $opc_hide_input = array("nu","nn","ep","ne");
      $str_hide_babybirth = (in_array($babybirth_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_id = (in_array($id_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_trancode = (in_array($trancode_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_custcode = (in_array($custcode_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_birthdate = (in_array($birthdate_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_birthtime = (in_array($birthtime_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_bb = (in_array($bb_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_tb = (in_array($tb_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_lingkar = (in_array($lingkar_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_hidup = (in_array($hidup_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_anestime = (in_array($anestime_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_intime = (in_array($intime_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_outtime = (in_array($outtime_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_pa = (in_array($pa_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_cito = (in_array($cito_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_citoproc = (in_array($citoproc_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_diagpre = (in_array($diagpre_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_diagpost = (in_array($diagpost_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_trandate = (in_array($trandate_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_class = (in_array($class_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_awalobs = (in_array($awalobs_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_akhirobs = (in_array($akhirobs_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_inapcode = (in_array($inapcode_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;

      if (!isset($babybirth) || $babybirth == "")
      {
          $babybirth = "";
      }
      if (isset($babybirth) && !empty($babybirth))
      {
         $tmp_pos = strpos($babybirth, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $babybirth = substr($babybirth, 0, $tmp_pos);
         }
      }
      if (!isset($id) || $id == "")
      {
          $id = "";
      }
      if (isset($id) && !empty($id))
      {
         $tmp_pos = strpos($id, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $id = substr($id, 0, $tmp_pos);
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
      if (!isset($birthdate) || $birthdate == "")
      {
          $birthdate = "";
      }
      if (isset($birthdate) && !empty($birthdate))
      {
         $tmp_pos = strpos($birthdate, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $birthdate = substr($birthdate, 0, $tmp_pos);
         }
      }
      if (!isset($birthtime) || $birthtime == "")
      {
          $birthtime = "";
      }
      if (isset($birthtime) && !empty($birthtime))
      {
         $tmp_pos = strpos($birthtime, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $birthtime = substr($birthtime, 0, $tmp_pos);
         }
      }
      if (!isset($bb) || $bb == "")
      {
          $bb = "";
      }
      if (isset($bb) && !empty($bb))
      {
         $tmp_pos = strpos($bb, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $bb = substr($bb, 0, $tmp_pos);
         }
      }
      if (!isset($tb) || $tb == "")
      {
          $tb = "";
      }
      if (isset($tb) && !empty($tb))
      {
         $tmp_pos = strpos($tb, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $tb = substr($tb, 0, $tmp_pos);
         }
      }
      if (!isset($lingkar) || $lingkar == "")
      {
          $lingkar = "";
      }
      if (isset($lingkar) && !empty($lingkar))
      {
         $tmp_pos = strpos($lingkar, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $lingkar = substr($lingkar, 0, $tmp_pos);
         }
      }
      if (!isset($hidup) || $hidup == "")
      {
          $hidup = "";
      }
      if (isset($hidup) && !empty($hidup))
      {
         $tmp_pos = strpos($hidup, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $hidup = substr($hidup, 0, $tmp_pos);
         }
      }
      if (!isset($anestime) || $anestime == "")
      {
          $anestime = "";
      }
      if (isset($anestime) && !empty($anestime))
      {
         $tmp_pos = strpos($anestime, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $anestime = substr($anestime, 0, $tmp_pos);
         }
      }
      if (!isset($intime) || $intime == "")
      {
          $intime = "";
      }
      if (isset($intime) && !empty($intime))
      {
         $tmp_pos = strpos($intime, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $intime = substr($intime, 0, $tmp_pos);
         }
      }
      if (!isset($outtime) || $outtime == "")
      {
          $outtime = "";
      }
      if (isset($outtime) && !empty($outtime))
      {
         $tmp_pos = strpos($outtime, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $outtime = substr($outtime, 0, $tmp_pos);
         }
      }
      if (!isset($pa) || $pa == "")
      {
          $pa = "";
      }
      if (isset($pa) && !empty($pa))
      {
         $tmp_pos = strpos($pa, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $pa = substr($pa, 0, $tmp_pos);
         }
      }
      if (!isset($cito) || $cito == "")
      {
          $cito = "";
      }
      if (isset($cito) && !empty($cito))
      {
         $tmp_pos = strpos($cito, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $cito = substr($cito, 0, $tmp_pos);
         }
      }
      if (!isset($citoproc) || $citoproc == "")
      {
          $citoproc = "";
      }
      if (isset($citoproc) && !empty($citoproc))
      {
         $tmp_pos = strpos($citoproc, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $citoproc = substr($citoproc, 0, $tmp_pos);
         }
      }
      if (!isset($diagpre) || $diagpre == "")
      {
          $diagpre = "";
      }
      if (isset($diagpre) && !empty($diagpre))
      {
         $tmp_pos = strpos($diagpre, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $diagpre = substr($diagpre, 0, $tmp_pos);
         }
      }
      if (!isset($diagpost) || $diagpost == "")
      {
          $diagpost = "";
      }
      if (isset($diagpost) && !empty($diagpost))
      {
         $tmp_pos = strpos($diagpost, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $diagpost = substr($diagpost, 0, $tmp_pos);
         }
      }
      if (!isset($trandate) || $trandate == "")
      {
          $trandate = "";
      }
      if (isset($trandate) && !empty($trandate))
      {
         $tmp_pos = strpos($trandate, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $trandate = substr($trandate, 0, $tmp_pos);
         }
      }
      if (!isset($class) || $class == "")
      {
          $class = "";
      }
      if (isset($class) && !empty($class))
      {
         $tmp_pos = strpos($class, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $class = substr($class, 0, $tmp_pos);
         }
      }
      if (!isset($awalobs) || $awalobs == "")
      {
          $awalobs = "";
      }
      if (isset($awalobs) && !empty($awalobs))
      {
         $tmp_pos = strpos($awalobs, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $awalobs = substr($awalobs, 0, $tmp_pos);
         }
      }
      if (!isset($akhirobs) || $akhirobs == "")
      {
          $akhirobs = "";
      }
      if (isset($akhirobs) && !empty($akhirobs))
      {
         $tmp_pos = strpos($akhirobs, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $akhirobs = substr($akhirobs, 0, $tmp_pos);
         }
      }
      if (!isset($inapcode) || $inapcode == "")
      {
          $inapcode = "";
      }
      if (isset($inapcode) && !empty($inapcode))
      {
         $tmp_pos = strpos($inapcode, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $inapcode = substr($inapcode, 0, $tmp_pos);
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



   
      <INPUT type="hidden" id="SC_babybirth_cond" name="babybirth_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['babybirth'])) ? $this->New_label['babybirth'] : "Baby Birth";
 $nmgp_tab_label .= "babybirth?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_babybirth"  <?php echo $str_hide_babybirth?>><?php
      if ($babybirth != "")
      {
      $babybirth_look = substr($this->Db->qstr($babybirth), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($babybirth))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct babyBirth from " . $this->Ini->nm_tabela . " where babyBirth = $babybirth_look order by babyBirth"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct babyBirth from " . $this->Ini->nm_tabela . " where babyBirth = $babybirth_look order by babyBirth"; 
      }
      else
      {
          $nm_comando = "select distinct babyBirth from " . $this->Ini->nm_tabela . " where babyBirth = $babybirth_look order by babyBirth"; 
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
      if (isset($nmgp_def_dados[0][$babybirth]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$babybirth];
      }
      else
      {
            nmgp_Form_Num_Val($babybirth, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $babybirth;
      }
?>
<INPUT  type="text" id="SC_babybirth" name="babybirth" value="<?php echo NM_encode_input($babybirth) ?>" size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_babybirth" name="babybirth_autocomp" size="3"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_id_cond" name="id_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['id'])) ? $this->New_label['id'] : "ID";
 $nmgp_tab_label .= "id?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_id"  <?php echo $str_hide_id?>><?php
      if ($id != "")
      {
      $id_look = substr($this->Db->qstr($id), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($id))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct id from " . $this->Ini->nm_tabela . " where id = $id_look order by id"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct id from " . $this->Ini->nm_tabela . " where id = $id_look order by id"; 
      }
      else
      {
          $nm_comando = "select distinct id from " . $this->Ini->nm_tabela . " where id = $id_look order by id"; 
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
      if (isset($nmgp_def_dados[0][$id]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$id];
      }
      else
      {
            nmgp_Form_Num_Val($id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $id;
      }
?>
<INPUT  type="text" id="SC_id" name="id" value="<?php echo NM_encode_input($id) ?>" size=5 alt="{datatype: 'integer', maxLength: 5, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_id" name="id_autocomp" size="5"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 5, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_trancode_cond" name="trancode_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Kode Transaksi";
 $nmgp_tab_label .= "trancode?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_trancode"  <?php echo $str_hide_trancode?>><?php
      if ($trancode != "")
      {
      $trancode_look = substr($this->Db->qstr($trancode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct tranCode from " . $this->Ini->nm_tabela . " where tranCode = '$trancode_look' order by tranCode"; 
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
      if (isset($nmgp_def_dados[0][$trancode]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$trancode];
      }
      else
      {
          $sAutocompValue = $trancode;
      }
?>
<INPUT  type="text" id="SC_trancode" name="trancode" value="<?php echo NM_encode_input($trancode) ?>"  size=11 alt="{datatype: 'text', maxLength: 11, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_trancode" name="trancode_autocomp" size="11"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_custcode_cond" name="custcode_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['custcode'])) ? $this->New_label['custcode'] : "No. RM";
 $nmgp_tab_label .= "custcode?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_custcode"  <?php echo $str_hide_custcode?>><?php
      if ($custcode != "")
      {
      $custcode_look = substr($this->Db->qstr($custcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct custCode from " . $this->Ini->nm_tabela . " where custCode = '$custcode_look' order by custCode"; 
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
      if (isset($nmgp_def_dados[0][$custcode]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$custcode];
      }
      else
      {
          $sAutocompValue = $custcode;
      }
?>
<INPUT  type="text" id="SC_custcode" name="custcode" value="<?php echo NM_encode_input($custcode) ?>"  size=8 alt="{datatype: 'text', maxLength: 8, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_custcode" name="custcode_autocomp" size="8"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 8, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_birthdate_cond" name="birthdate_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['birthdate'])) ? $this->New_label['birthdate'] : "Birth Date";
 $nmgp_tab_label .= "birthdate?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_birthdate"  <?php echo $str_hide_birthdate?>>
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
<span id='id_date_part_birthdate_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_birthdate_dia" name="birthdate_dia" value="<?php echo NM_encode_input($birthdate_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_birthdate_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_birthdate_mes" name="birthdate_mes" value="<?php echo NM_encode_input($birthdate_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_birthdate_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_birthdate_ano" name="birthdate_ano" value="<?php echo NM_encode_input($birthdate_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_birthdate_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_birthdate_hor" name="birthdate_hor" value="<?php echo NM_encode_input($birthdate_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_birthdate_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_birthdate_min" name="birthdate_min" value="<?php echo NM_encode_input($birthdate_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_birthdate_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_birthdate_seg" name="birthdate_seg" value="<?php echo NM_encode_input($birthdate_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_birthdate"  class="scFilterFieldFontOdd">
 <?php echo $date_format_show ?>         </SPAN>
          </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_birthtime_cond" name="birthtime_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['birthtime'])) ? $this->New_label['birthtime'] : "Birth Time";
 $nmgp_tab_label .= "birthtime?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_birthtime"  <?php echo $str_hide_birthtime?>><?php
      if ($birthtime != "")
      {
      $birthtime_look = substr($this->Db->qstr($birthtime), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct birthTime from " . $this->Ini->nm_tabela . " where birthTime = '$birthtime_look' order by birthTime"; 
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
      if (isset($nmgp_def_dados[0][$birthtime]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$birthtime];
      }
      else
      {
          $sAutocompValue = $birthtime;
      }
?>
<INPUT  type="text" id="SC_birthtime" name="birthtime" value="<?php echo NM_encode_input($birthtime) ?>"  size=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_birthtime" name="birthtime_autocomp" size="10"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_bb_cond" name="bb_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['bb'])) ? $this->New_label['bb'] : "Bb";
 $nmgp_tab_label .= "bb?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_bb"  <?php echo $str_hide_bb?>><?php
      if ($bb != "")
      {
      $bb_look = substr($this->Db->qstr($bb), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($bb))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct bb from " . $this->Ini->nm_tabela . " where bb = $bb_look order by bb"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct bb from " . $this->Ini->nm_tabela . " where bb = $bb_look order by bb"; 
      }
      else
      {
          $nm_comando = "select distinct bb from " . $this->Ini->nm_tabela . " where bb = $bb_look order by bb"; 
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
      if (isset($nmgp_def_dados[0][$bb]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$bb];
      }
      else
      {
            nmgp_Form_Num_Val($bb, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $bb;
      }
?>
<INPUT  type="text" id="SC_bb" name="bb" value="<?php echo NM_encode_input($bb) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_bb" name="bb_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_tb_cond" name="tb_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['tb'])) ? $this->New_label['tb'] : "Tb";
 $nmgp_tab_label .= "tb?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_tb"  <?php echo $str_hide_tb?>><?php
      if ($tb != "")
      {
      $tb_look = substr($this->Db->qstr($tb), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($tb))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct tb from " . $this->Ini->nm_tabela . " where tb = $tb_look order by tb"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct tb from " . $this->Ini->nm_tabela . " where tb = $tb_look order by tb"; 
      }
      else
      {
          $nm_comando = "select distinct tb from " . $this->Ini->nm_tabela . " where tb = $tb_look order by tb"; 
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
      if (isset($nmgp_def_dados[0][$tb]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$tb];
      }
      else
      {
            nmgp_Form_Num_Val($tb, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $tb;
      }
?>
<INPUT  type="text" id="SC_tb" name="tb" value="<?php echo NM_encode_input($tb) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_tb" name="tb_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_lingkar_cond" name="lingkar_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['lingkar'])) ? $this->New_label['lingkar'] : "Lingkar";
 $nmgp_tab_label .= "lingkar?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_lingkar"  <?php echo $str_hide_lingkar?>><?php
      if ($lingkar != "")
      {
      $lingkar_look = substr($this->Db->qstr($lingkar), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($lingkar))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct lingkar from " . $this->Ini->nm_tabela . " where lingkar = $lingkar_look order by lingkar"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct lingkar from " . $this->Ini->nm_tabela . " where lingkar = $lingkar_look order by lingkar"; 
      }
      else
      {
          $nm_comando = "select distinct lingkar from " . $this->Ini->nm_tabela . " where lingkar = $lingkar_look order by lingkar"; 
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
      if (isset($nmgp_def_dados[0][$lingkar]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$lingkar];
      }
      else
      {
            nmgp_Form_Num_Val($lingkar, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $lingkar;
      }
?>
<INPUT  type="text" id="SC_lingkar" name="lingkar" value="<?php echo NM_encode_input($lingkar) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_lingkar" name="lingkar_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_hidup_cond" name="hidup_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['hidup'])) ? $this->New_label['hidup'] : "Hidup";
 $nmgp_tab_label .= "hidup?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_hidup"  <?php echo $str_hide_hidup?>><?php
      if ($hidup != "")
      {
      $hidup_look = substr($this->Db->qstr($hidup), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($hidup))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct hidup from " . $this->Ini->nm_tabela . " where hidup = $hidup_look order by hidup"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct hidup from " . $this->Ini->nm_tabela . " where hidup = $hidup_look order by hidup"; 
      }
      else
      {
          $nm_comando = "select distinct hidup from " . $this->Ini->nm_tabela . " where hidup = $hidup_look order by hidup"; 
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
      if (isset($nmgp_def_dados[0][$hidup]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$hidup];
      }
      else
      {
            nmgp_Form_Num_Val($hidup, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $hidup;
      }
?>
<INPUT  type="text" id="SC_hidup" name="hidup" value="<?php echo NM_encode_input($hidup) ?>" size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_hidup" name="hidup_autocomp" size="3"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_anestime_cond" name="anestime_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['anestime'])) ? $this->New_label['anestime'] : "Anes Time";
 $nmgp_tab_label .= "anestime?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_anestime"  <?php echo $str_hide_anestime?>>
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
<span id='id_date_part_anestime_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_anestime_dia" name="anestime_dia" value="<?php echo NM_encode_input($anestime_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_anestime_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_anestime_mes" name="anestime_mes" value="<?php echo NM_encode_input($anestime_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_anestime_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_anestime_ano" name="anestime_ano" value="<?php echo NM_encode_input($anestime_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_anestime_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_anestime_hor" name="anestime_hor" value="<?php echo NM_encode_input($anestime_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_anestime_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_anestime_min" name="anestime_min" value="<?php echo NM_encode_input($anestime_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_anestime_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_anestime_seg" name="anestime_seg" value="<?php echo NM_encode_input($anestime_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_anestime"  class="scFilterFieldFontOdd">
 <?php echo $date_format_show ?>         </SPAN>
          </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_intime_cond" name="intime_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['intime'])) ? $this->New_label['intime'] : "Tgl. Masuk VK";
 $nmgp_tab_label .= "intime?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_intime"  <?php echo $str_hide_intime?>>
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
<span id='id_date_part_intime_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_intime_dia" name="intime_dia" value="<?php echo NM_encode_input($intime_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_intime_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_intime_mes" name="intime_mes" value="<?php echo NM_encode_input($intime_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_intime_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_intime_ano" name="intime_ano" value="<?php echo NM_encode_input($intime_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_intime_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_intime_hor" name="intime_hor" value="<?php echo NM_encode_input($intime_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_intime_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_intime_min" name="intime_min" value="<?php echo NM_encode_input($intime_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_intime_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_intime_seg" name="intime_seg" value="<?php echo NM_encode_input($intime_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_intime"  class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
          </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_outtime_cond" name="outtime_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['outtime'])) ? $this->New_label['outtime'] : "Out Time";
 $nmgp_tab_label .= "outtime?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_outtime"  <?php echo $str_hide_outtime?>>
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
<span id='id_date_part_outtime_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_outtime_dia" name="outtime_dia" value="<?php echo NM_encode_input($outtime_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_outtime_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_outtime_mes" name="outtime_mes" value="<?php echo NM_encode_input($outtime_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_outtime_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_outtime_ano" name="outtime_ano" value="<?php echo NM_encode_input($outtime_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_outtime_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_outtime_hor" name="outtime_hor" value="<?php echo NM_encode_input($outtime_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_outtime_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_outtime_min" name="outtime_min" value="<?php echo NM_encode_input($outtime_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_outtime_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_outtime_seg" name="outtime_seg" value="<?php echo NM_encode_input($outtime_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_outtime"  class="scFilterFieldFontOdd">
 <?php echo $date_format_show ?>         </SPAN>
          </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_pa_cond" name="pa_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['pa'])) ? $this->New_label['pa'] : "PA";
 $nmgp_tab_label .= "pa?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_pa"  <?php echo $str_hide_pa?>><?php
      if ($pa != "")
      {
      $pa_look = substr($this->Db->qstr($pa), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct PA from " . $this->Ini->nm_tabela . " where PA = '$pa_look' order by PA"; 
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
      if (isset($nmgp_def_dados[0][$pa]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$pa];
      }
      else
      {
          $sAutocompValue = $pa;
      }
?>
<INPUT  type="text" id="SC_pa" name="pa" value="<?php echo NM_encode_input($pa) ?>"  size=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_pa" name="pa_autocomp" size="10"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_cito_cond" name="cito_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['cito'])) ? $this->New_label['cito'] : "Cito";
 $nmgp_tab_label .= "cito?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_cito"  <?php echo $str_hide_cito?>><?php
      if ($cito != "")
      {
      $cito_look = substr($this->Db->qstr($cito), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct Cito from " . $this->Ini->nm_tabela . " where Cito = '$cito_look' order by Cito"; 
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
      if (isset($nmgp_def_dados[0][$cito]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$cito];
      }
      else
      {
          $sAutocompValue = $cito;
      }
?>
<INPUT  type="text" id="SC_cito" name="cito" value="<?php echo NM_encode_input($cito) ?>"  size=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_cito" name="cito_autocomp" size="15"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 15, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_citoproc_cond" name="citoproc_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['citoproc'])) ? $this->New_label['citoproc'] : "Cito Proc";
 $nmgp_tab_label .= "citoproc?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_citoproc"  <?php echo $str_hide_citoproc?>><?php
      if ($citoproc != "")
      {
      $citoproc_look = substr($this->Db->qstr($citoproc), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($citoproc))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct citoProc from " . $this->Ini->nm_tabela . " where citoProc = $citoproc_look order by citoProc"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct citoProc from " . $this->Ini->nm_tabela . " where citoProc = $citoproc_look order by citoProc"; 
      }
      else
      {
          $nm_comando = "select distinct citoProc from " . $this->Ini->nm_tabela . " where citoProc = $citoproc_look order by citoProc"; 
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
      if (isset($nmgp_def_dados[0][$citoproc]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$citoproc];
      }
      else
      {
            nmgp_Form_Num_Val($citoproc, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $citoproc;
      }
?>
<INPUT  type="text" id="SC_citoproc" name="citoproc" value="<?php echo NM_encode_input($citoproc) ?>" size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_citoproc" name="citoproc_autocomp" size="12"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_diagpre_cond" name="diagpre_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['diagpre'])) ? $this->New_label['diagpre'] : "Diagnosa Pre Tindakan";
 $nmgp_tab_label .= "diagpre?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_diagpre"  <?php echo $str_hide_diagpre?>><?php
      if ($diagpre != "")
      {
      $diagpre_look = substr($this->Db->qstr($diagpre), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct diagPre from " . $this->Ini->nm_tabela . " where diagPre = '$diagpre_look' order by diagPre"; 
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
      if (isset($nmgp_def_dados[0][$diagpre]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$diagpre];
      }
      else
      {
          $sAutocompValue = $diagpre;
      }
?>
<INPUT  type="text" id="SC_diagpre" name="diagpre" value="<?php echo NM_encode_input($diagpre) ?>"  size=50 alt="{datatype: 'text', maxLength: 200, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_diagpre" name="diagpre_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 200, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_diagpost_cond" name="diagpost_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['diagpost'])) ? $this->New_label['diagpost'] : "Diagnosa Post Tindakan";
 $nmgp_tab_label .= "diagpost?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_diagpost"  <?php echo $str_hide_diagpost?>><?php
      if ($diagpost != "")
      {
      $diagpost_look = substr($this->Db->qstr($diagpost), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct diagPost from " . $this->Ini->nm_tabela . " where diagPost = '$diagpost_look' order by diagPost"; 
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
      if (isset($nmgp_def_dados[0][$diagpost]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$diagpost];
      }
      else
      {
          $sAutocompValue = $diagpost;
      }
?>
<INPUT  type="text" id="SC_diagpost" name="diagpost" value="<?php echo NM_encode_input($diagpost) ?>"  size=50 alt="{datatype: 'text', maxLength: 200, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_diagpost" name="diagpost_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 200, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_trandate_cond" name="trandate_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['trandate'])) ? $this->New_label['trandate'] : "Tran Date";
 $nmgp_tab_label .= "trandate?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_trandate"  <?php echo $str_hide_trandate?>>
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
<span id='id_date_part_trandate_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_trandate_dia" name="trandate_dia" value="<?php echo NM_encode_input($trandate_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_trandate_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_trandate_mes" name="trandate_mes" value="<?php echo NM_encode_input($trandate_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_trandate_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_trandate_ano" name="trandate_ano" value="<?php echo NM_encode_input($trandate_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_trandate_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_trandate_hor" name="trandate_hor" value="<?php echo NM_encode_input($trandate_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_trandate_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_trandate_min" name="trandate_min" value="<?php echo NM_encode_input($trandate_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_trandate_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_trandate_seg" name="trandate_seg" value="<?php echo NM_encode_input($trandate_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_trandate"  class="scFilterFieldFontOdd">
 <?php echo $date_format_show ?>         </SPAN>
          </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_class_cond" name="class_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['class'])) ? $this->New_label['class'] : "Class";
 $nmgp_tab_label .= "class?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_class"  <?php echo $str_hide_class?>><?php
      if ($class != "")
      {
      $class_look = substr($this->Db->qstr($class), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct class from " . $this->Ini->nm_tabela . " where class = '$class_look' order by class"; 
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
      if (isset($nmgp_def_dados[0][$class]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$class];
      }
      else
      {
          $sAutocompValue = $class;
      }
?>
<INPUT  type="text" id="SC_class" name="class" value="<?php echo NM_encode_input($class) ?>"  size=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_class" name="class_autocomp" size="15"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 15, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_awalobs_cond" name="awalobs_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['awalobs'])) ? $this->New_label['awalobs'] : "Awal Obs";
 $nmgp_tab_label .= "awalobs?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_awalobs"  <?php echo $str_hide_awalobs?>>
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
<span id='id_date_part_awalobs_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_awalobs_dia" name="awalobs_dia" value="<?php echo NM_encode_input($awalobs_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_awalobs_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_awalobs_mes" name="awalobs_mes" value="<?php echo NM_encode_input($awalobs_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_awalobs_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_awalobs_ano" name="awalobs_ano" value="<?php echo NM_encode_input($awalobs_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_awalobs_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_awalobs_hor" name="awalobs_hor" value="<?php echo NM_encode_input($awalobs_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_awalobs_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_awalobs_min" name="awalobs_min" value="<?php echo NM_encode_input($awalobs_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_awalobs_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_awalobs_seg" name="awalobs_seg" value="<?php echo NM_encode_input($awalobs_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_awalobs"  class="scFilterFieldFontOdd">
 <?php echo $date_format_show ?>         </SPAN>
          </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_akhirobs_cond" name="akhirobs_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['akhirobs'])) ? $this->New_label['akhirobs'] : "Akhir Obs";
 $nmgp_tab_label .= "akhirobs?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_akhirobs"  <?php echo $str_hide_akhirobs?>>
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
<span id='id_date_part_akhirobs_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_akhirobs_dia" name="akhirobs_dia" value="<?php echo NM_encode_input($akhirobs_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_akhirobs_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_akhirobs_mes" name="akhirobs_mes" value="<?php echo NM_encode_input($akhirobs_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_akhirobs_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_akhirobs_ano" name="akhirobs_ano" value="<?php echo NM_encode_input($akhirobs_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_akhirobs_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_akhirobs_hor" name="akhirobs_hor" value="<?php echo NM_encode_input($akhirobs_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_akhirobs_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_akhirobs_min" name="akhirobs_min" value="<?php echo NM_encode_input($akhirobs_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_akhirobs_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_akhirobs_seg" name="akhirobs_seg" value="<?php echo NM_encode_input($akhirobs_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_akhirobs"  class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
          </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_inapcode_cond" name="inapcode_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['inapcode'])) ? $this->New_label['inapcode'] : "Kode Inap";
 $nmgp_tab_label .= "inapcode?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_inapcode"  <?php echo $str_hide_inapcode?>><?php
      if ($inapcode != "")
      {
      $inapcode_look = substr($this->Db->qstr($inapcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct inapCode from " . $this->Ini->nm_tabela . " where inapCode = '$inapcode_look' order by inapCode"; 
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
      if (isset($nmgp_def_dados[0][$inapcode]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$inapcode];
      }
      else
      {
          $sAutocompValue = $inapcode;
      }
?>
<INPUT  type="text" id="SC_inapcode" name="inapcode" value="<?php echo NM_encode_input($inapcode) ?>"  size=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_inapcode" name="inapcode_autocomp" size="10"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

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
   if (is_file("grid_tbdetailvk_help.txt"))
   {
      $Arq_WebHelp = file("grid_tbdetailvk_help.txt"); 
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
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailvk']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailvk']['start'] == 'filter' && $nm_apl_dependente != 1)
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
   if (is_file("grid_tbdetailvk_help.txt"))
   {
      $Arq_WebHelp = file("grid_tbdetailvk_help.txt"); 
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
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailvk']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailvk']['start'] == 'filter' && $nm_apl_dependente != 1)
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
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailvk']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailvk']['start'] == 'filter')
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['orig_pesq'] == "grid")
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
   nm_campos_between(document.getElementById('id_vis_babybirth'), document.F1.babybirth_cond, 'babybirth');
   document.F1.babybirth.value = "";
   document.F1.babybirth_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_id'), document.F1.id_cond, 'id');
   document.F1.id.value = "";
   document.F1.id_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_trancode'), document.F1.trancode_cond, 'trancode');
   document.F1.trancode.value = "";
   document.F1.trancode_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_custcode'), document.F1.custcode_cond, 'custcode');
   document.F1.custcode.value = "";
   document.F1.custcode_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_birthdate'), document.F1.birthdate_cond, 'birthdate');
   document.F1.birthdate_dia.value = "";
   document.F1.birthdate_mes.value = "";
   document.F1.birthdate_ano.value = "";
   document.F1.birthdate_hor.value = "";
   document.F1.birthdate_min.value = "";
   document.F1.birthdate_seg.value = "";
   nm_campos_between(document.getElementById('id_vis_birthtime'), document.F1.birthtime_cond, 'birthtime');
   document.F1.birthtime.value = "";
   document.F1.birthtime_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_bb'), document.F1.bb_cond, 'bb');
   document.F1.bb.value = "";
   document.F1.bb_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_tb'), document.F1.tb_cond, 'tb');
   document.F1.tb.value = "";
   document.F1.tb_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_lingkar'), document.F1.lingkar_cond, 'lingkar');
   document.F1.lingkar.value = "";
   document.F1.lingkar_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_hidup'), document.F1.hidup_cond, 'hidup');
   document.F1.hidup.value = "";
   document.F1.hidup_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_anestime'), document.F1.anestime_cond, 'anestime');
   document.F1.anestime_dia.value = "";
   document.F1.anestime_mes.value = "";
   document.F1.anestime_ano.value = "";
   document.F1.anestime_hor.value = "";
   document.F1.anestime_min.value = "";
   document.F1.anestime_seg.value = "";
   nm_campos_between(document.getElementById('id_vis_intime'), document.F1.intime_cond, 'intime');
   document.F1.intime_dia.value = "";
   document.F1.intime_mes.value = "";
   document.F1.intime_ano.value = "";
   document.F1.intime_hor.value = "";
   document.F1.intime_min.value = "";
   document.F1.intime_seg.value = "";
   nm_campos_between(document.getElementById('id_vis_outtime'), document.F1.outtime_cond, 'outtime');
   document.F1.outtime_dia.value = "";
   document.F1.outtime_mes.value = "";
   document.F1.outtime_ano.value = "";
   document.F1.outtime_hor.value = "";
   document.F1.outtime_min.value = "";
   document.F1.outtime_seg.value = "";
   nm_campos_between(document.getElementById('id_vis_pa'), document.F1.pa_cond, 'pa');
   document.F1.pa.value = "";
   document.F1.pa_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_cito'), document.F1.cito_cond, 'cito');
   document.F1.cito.value = "";
   document.F1.cito_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_citoproc'), document.F1.citoproc_cond, 'citoproc');
   document.F1.citoproc.value = "";
   document.F1.citoproc_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_diagpre'), document.F1.diagpre_cond, 'diagpre');
   document.F1.diagpre.value = "";
   document.F1.diagpre_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_diagpost'), document.F1.diagpost_cond, 'diagpost');
   document.F1.diagpost.value = "";
   document.F1.diagpost_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_trandate'), document.F1.trandate_cond, 'trandate');
   document.F1.trandate_dia.value = "";
   document.F1.trandate_mes.value = "";
   document.F1.trandate_ano.value = "";
   document.F1.trandate_hor.value = "";
   document.F1.trandate_min.value = "";
   document.F1.trandate_seg.value = "";
   nm_campos_between(document.getElementById('id_vis_class'), document.F1.class_cond, 'class');
   document.F1.class.value = "";
   document.F1.class_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_awalobs'), document.F1.awalobs_cond, 'awalobs');
   document.F1.awalobs_dia.value = "";
   document.F1.awalobs_mes.value = "";
   document.F1.awalobs_ano.value = "";
   document.F1.awalobs_hor.value = "";
   document.F1.awalobs_min.value = "";
   document.F1.awalobs_seg.value = "";
   nm_campos_between(document.getElementById('id_vis_akhirobs'), document.F1.akhirobs_cond, 'akhirobs');
   document.F1.akhirobs_dia.value = "";
   document.F1.akhirobs_mes.value = "";
   document.F1.akhirobs_ano.value = "";
   document.F1.akhirobs_hor.value = "";
   document.F1.akhirobs_min.value = "";
   document.F1.akhirobs_seg.value = "";
   nm_campos_between(document.getElementById('id_vis_inapcode'), document.F1.inapcode_cond, 'inapcode');
   document.F1.inapcode.value = "";
   document.F1.inapcode_autocomp.value = "";
 }
 function SC_carga_evt_jquery()
 {
    $('#SC_akhirobs_dia').bind('change', function() {sc_grid_tbdetailvk_valida_dia(this)});
    $('#SC_akhirobs_hor').bind('change', function() {sc_grid_tbdetailvk_valida_hora(this)});
    $('#SC_akhirobs_mes').bind('change', function() {sc_grid_tbdetailvk_valida_mes(this)});
    $('#SC_akhirobs_min').bind('change', function() {sc_grid_tbdetailvk_valida_min(this)});
    $('#SC_akhirobs_seg').bind('change', function() {sc_grid_tbdetailvk_valida_seg(this)});
    $('#SC_anestime_dia').bind('change', function() {sc_grid_tbdetailvk_valida_dia(this)});
    $('#SC_anestime_hor').bind('change', function() {sc_grid_tbdetailvk_valida_hora(this)});
    $('#SC_anestime_mes').bind('change', function() {sc_grid_tbdetailvk_valida_mes(this)});
    $('#SC_anestime_min').bind('change', function() {sc_grid_tbdetailvk_valida_min(this)});
    $('#SC_anestime_seg').bind('change', function() {sc_grid_tbdetailvk_valida_seg(this)});
    $('#SC_awalobs_dia').bind('change', function() {sc_grid_tbdetailvk_valida_dia(this)});
    $('#SC_awalobs_hor').bind('change', function() {sc_grid_tbdetailvk_valida_hora(this)});
    $('#SC_awalobs_mes').bind('change', function() {sc_grid_tbdetailvk_valida_mes(this)});
    $('#SC_awalobs_min').bind('change', function() {sc_grid_tbdetailvk_valida_min(this)});
    $('#SC_awalobs_seg').bind('change', function() {sc_grid_tbdetailvk_valida_seg(this)});
    $('#SC_birthdate_dia').bind('change', function() {sc_grid_tbdetailvk_valida_dia(this)});
    $('#SC_birthdate_hor').bind('change', function() {sc_grid_tbdetailvk_valida_hora(this)});
    $('#SC_birthdate_mes').bind('change', function() {sc_grid_tbdetailvk_valida_mes(this)});
    $('#SC_birthdate_min').bind('change', function() {sc_grid_tbdetailvk_valida_min(this)});
    $('#SC_birthdate_seg').bind('change', function() {sc_grid_tbdetailvk_valida_seg(this)});
    $('#SC_intime_dia').bind('change', function() {sc_grid_tbdetailvk_valida_dia(this)});
    $('#SC_intime_hor').bind('change', function() {sc_grid_tbdetailvk_valida_hora(this)});
    $('#SC_intime_mes').bind('change', function() {sc_grid_tbdetailvk_valida_mes(this)});
    $('#SC_intime_min').bind('change', function() {sc_grid_tbdetailvk_valida_min(this)});
    $('#SC_intime_seg').bind('change', function() {sc_grid_tbdetailvk_valida_seg(this)});
    $('#SC_outtime_dia').bind('change', function() {sc_grid_tbdetailvk_valida_dia(this)});
    $('#SC_outtime_hor').bind('change', function() {sc_grid_tbdetailvk_valida_hora(this)});
    $('#SC_outtime_mes').bind('change', function() {sc_grid_tbdetailvk_valida_mes(this)});
    $('#SC_outtime_min').bind('change', function() {sc_grid_tbdetailvk_valida_min(this)});
    $('#SC_outtime_seg').bind('change', function() {sc_grid_tbdetailvk_valida_seg(this)});
    $('#SC_trandate_dia').bind('change', function() {sc_grid_tbdetailvk_valida_dia(this)});
    $('#SC_trandate_hor').bind('change', function() {sc_grid_tbdetailvk_valida_hora(this)});
    $('#SC_trandate_mes').bind('change', function() {sc_grid_tbdetailvk_valida_mes(this)});
    $('#SC_trandate_min').bind('change', function() {sc_grid_tbdetailvk_valida_min(this)});
    $('#SC_trandate_seg').bind('change', function() {sc_grid_tbdetailvk_valida_seg(this)});
 }
 function sc_grid_tbdetailvk_valida_dia(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 31))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_iday'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_tbdetailvk_valida_mes(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 12))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mnth'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_tbdetailvk_valida_hora(obj)
 {
     if (obj.value != "" && (obj.value < 0 || obj.value > 23))
     {
         if (confirm (Nm_erro['lang_jscr_ivtm'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_tbdetailvk_valida_min(obj)
 {
     if (obj.value != "" && (obj.value < 0 || obj.value > 59))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mint'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_tbdetailvk_valida_seg(obj)
 {
     if (obj.value != "" && (obj.value < 0 || obj.value > 59))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_secd'] +  " " + Nm_erro['lang_jscr_wfix']))
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
       $NM_patch   = "simrskreatifmedia/grid_tbdetailvk";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] = "";
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_orig']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_orig'] = "";
      }
      $this->comando        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_orig'];
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
          $NM_patch .= "grid_tbdetailvk/";
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
      $tp_fields['SC_babybirth_cond'] = 'cond';
      $tp_fields['SC_babybirth'] = 'text_aut';
      $tp_fields['id_ac_babybirth'] = 'text_aut';
      $tp_fields['SC_id_cond'] = 'cond';
      $tp_fields['SC_id'] = 'text_aut';
      $tp_fields['id_ac_id'] = 'text_aut';
      $tp_fields['SC_trancode_cond'] = 'cond';
      $tp_fields['SC_trancode'] = 'text_aut';
      $tp_fields['id_ac_trancode'] = 'text_aut';
      $tp_fields['SC_custcode_cond'] = 'cond';
      $tp_fields['SC_custcode'] = 'text_aut';
      $tp_fields['id_ac_custcode'] = 'text_aut';
      $tp_fields['SC_birthdate_cond'] = 'cond';
      $tp_fields['SC_birthdate_dia'] = 'text';
      $tp_fields['SC_birthdate_mes'] = 'text';
      $tp_fields['SC_birthdate_ano'] = 'text';
      $tp_fields['SC_birthdate_input_2_dia'] = 'text';
      $tp_fields['SC_birthdate_input_2_mes'] = 'text';
      $tp_fields['SC_birthdate_input_2_ano'] = 'text';
      $tp_fields['SC_birthdate_hor'] = 'text';
      $tp_fields['SC_birthdate_min'] = 'text';
      $tp_fields['SC_birthdate_seg'] = 'text';
      $tp_fields['SC_birthdate_input_2_hor'] = 'text';
      $tp_fields['SC_birthdate_input_2_min'] = 'text';
      $tp_fields['SC_birthdate_input_2_seg'] = 'text';
      $tp_fields['SC_birthtime_cond'] = 'cond';
      $tp_fields['SC_birthtime'] = 'text_aut';
      $tp_fields['id_ac_birthtime'] = 'text_aut';
      $tp_fields['SC_bb_cond'] = 'cond';
      $tp_fields['SC_bb'] = 'text_aut';
      $tp_fields['id_ac_bb'] = 'text_aut';
      $tp_fields['SC_tb_cond'] = 'cond';
      $tp_fields['SC_tb'] = 'text_aut';
      $tp_fields['id_ac_tb'] = 'text_aut';
      $tp_fields['SC_lingkar_cond'] = 'cond';
      $tp_fields['SC_lingkar'] = 'text_aut';
      $tp_fields['id_ac_lingkar'] = 'text_aut';
      $tp_fields['SC_hidup_cond'] = 'cond';
      $tp_fields['SC_hidup'] = 'text_aut';
      $tp_fields['id_ac_hidup'] = 'text_aut';
      $tp_fields['SC_anestime_cond'] = 'cond';
      $tp_fields['SC_anestime_dia'] = 'text';
      $tp_fields['SC_anestime_mes'] = 'text';
      $tp_fields['SC_anestime_ano'] = 'text';
      $tp_fields['SC_anestime_input_2_dia'] = 'text';
      $tp_fields['SC_anestime_input_2_mes'] = 'text';
      $tp_fields['SC_anestime_input_2_ano'] = 'text';
      $tp_fields['SC_anestime_hor'] = 'text';
      $tp_fields['SC_anestime_min'] = 'text';
      $tp_fields['SC_anestime_seg'] = 'text';
      $tp_fields['SC_anestime_input_2_hor'] = 'text';
      $tp_fields['SC_anestime_input_2_min'] = 'text';
      $tp_fields['SC_anestime_input_2_seg'] = 'text';
      $tp_fields['SC_intime_cond'] = 'cond';
      $tp_fields['SC_intime_dia'] = 'text';
      $tp_fields['SC_intime_mes'] = 'text';
      $tp_fields['SC_intime_ano'] = 'text';
      $tp_fields['SC_intime_input_2_dia'] = 'text';
      $tp_fields['SC_intime_input_2_mes'] = 'text';
      $tp_fields['SC_intime_input_2_ano'] = 'text';
      $tp_fields['SC_intime_hor'] = 'text';
      $tp_fields['SC_intime_min'] = 'text';
      $tp_fields['SC_intime_seg'] = 'text';
      $tp_fields['SC_intime_input_2_hor'] = 'text';
      $tp_fields['SC_intime_input_2_min'] = 'text';
      $tp_fields['SC_intime_input_2_seg'] = 'text';
      $tp_fields['SC_outtime_cond'] = 'cond';
      $tp_fields['SC_outtime_dia'] = 'text';
      $tp_fields['SC_outtime_mes'] = 'text';
      $tp_fields['SC_outtime_ano'] = 'text';
      $tp_fields['SC_outtime_input_2_dia'] = 'text';
      $tp_fields['SC_outtime_input_2_mes'] = 'text';
      $tp_fields['SC_outtime_input_2_ano'] = 'text';
      $tp_fields['SC_outtime_hor'] = 'text';
      $tp_fields['SC_outtime_min'] = 'text';
      $tp_fields['SC_outtime_seg'] = 'text';
      $tp_fields['SC_outtime_input_2_hor'] = 'text';
      $tp_fields['SC_outtime_input_2_min'] = 'text';
      $tp_fields['SC_outtime_input_2_seg'] = 'text';
      $tp_fields['SC_pa_cond'] = 'cond';
      $tp_fields['SC_pa'] = 'text_aut';
      $tp_fields['id_ac_pa'] = 'text_aut';
      $tp_fields['SC_cito_cond'] = 'cond';
      $tp_fields['SC_cito'] = 'text_aut';
      $tp_fields['id_ac_cito'] = 'text_aut';
      $tp_fields['SC_citoproc_cond'] = 'cond';
      $tp_fields['SC_citoproc'] = 'text_aut';
      $tp_fields['id_ac_citoproc'] = 'text_aut';
      $tp_fields['SC_diagpre_cond'] = 'cond';
      $tp_fields['SC_diagpre'] = 'text_aut';
      $tp_fields['id_ac_diagpre'] = 'text_aut';
      $tp_fields['SC_diagpost_cond'] = 'cond';
      $tp_fields['SC_diagpost'] = 'text_aut';
      $tp_fields['id_ac_diagpost'] = 'text_aut';
      $tp_fields['SC_trandate_cond'] = 'cond';
      $tp_fields['SC_trandate_dia'] = 'text';
      $tp_fields['SC_trandate_mes'] = 'text';
      $tp_fields['SC_trandate_ano'] = 'text';
      $tp_fields['SC_trandate_input_2_dia'] = 'text';
      $tp_fields['SC_trandate_input_2_mes'] = 'text';
      $tp_fields['SC_trandate_input_2_ano'] = 'text';
      $tp_fields['SC_trandate_hor'] = 'text';
      $tp_fields['SC_trandate_min'] = 'text';
      $tp_fields['SC_trandate_seg'] = 'text';
      $tp_fields['SC_trandate_input_2_hor'] = 'text';
      $tp_fields['SC_trandate_input_2_min'] = 'text';
      $tp_fields['SC_trandate_input_2_seg'] = 'text';
      $tp_fields['SC_class_cond'] = 'cond';
      $tp_fields['SC_class'] = 'text_aut';
      $tp_fields['id_ac_class'] = 'text_aut';
      $tp_fields['SC_awalobs_cond'] = 'cond';
      $tp_fields['SC_awalobs_dia'] = 'text';
      $tp_fields['SC_awalobs_mes'] = 'text';
      $tp_fields['SC_awalobs_ano'] = 'text';
      $tp_fields['SC_awalobs_input_2_dia'] = 'text';
      $tp_fields['SC_awalobs_input_2_mes'] = 'text';
      $tp_fields['SC_awalobs_input_2_ano'] = 'text';
      $tp_fields['SC_awalobs_hor'] = 'text';
      $tp_fields['SC_awalobs_min'] = 'text';
      $tp_fields['SC_awalobs_seg'] = 'text';
      $tp_fields['SC_awalobs_input_2_hor'] = 'text';
      $tp_fields['SC_awalobs_input_2_min'] = 'text';
      $tp_fields['SC_awalobs_input_2_seg'] = 'text';
      $tp_fields['SC_akhirobs_cond'] = 'cond';
      $tp_fields['SC_akhirobs_dia'] = 'text';
      $tp_fields['SC_akhirobs_mes'] = 'text';
      $tp_fields['SC_akhirobs_ano'] = 'text';
      $tp_fields['SC_akhirobs_input_2_dia'] = 'text';
      $tp_fields['SC_akhirobs_input_2_mes'] = 'text';
      $tp_fields['SC_akhirobs_input_2_ano'] = 'text';
      $tp_fields['SC_akhirobs_hor'] = 'text';
      $tp_fields['SC_akhirobs_min'] = 'text';
      $tp_fields['SC_akhirobs_seg'] = 'text';
      $tp_fields['SC_akhirobs_input_2_hor'] = 'text';
      $tp_fields['SC_akhirobs_input_2_min'] = 'text';
      $tp_fields['SC_akhirobs_input_2_seg'] = 'text';
      $tp_fields['SC_inapcode_cond'] = 'cond';
      $tp_fields['SC_inapcode'] = 'text_aut';
      $tp_fields['id_ac_inapcode'] = 'text_aut';
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
      global $babybirth_cond, $babybirth, $babybirth_autocomp,
             $id_cond, $id, $id_autocomp,
             $trancode_cond, $trancode, $trancode_autocomp,
             $custcode_cond, $custcode, $custcode_autocomp,
             $birthdate_cond, $birthdate, $birthdate_dia, $birthdate_mes, $birthdate_ano, $birthdate_hor, $birthdate_min, $birthdate_seg,
             $birthtime_cond, $birthtime, $birthtime_autocomp,
             $bb_cond, $bb, $bb_autocomp,
             $tb_cond, $tb, $tb_autocomp,
             $lingkar_cond, $lingkar, $lingkar_autocomp,
             $hidup_cond, $hidup, $hidup_autocomp,
             $anestime_cond, $anestime, $anestime_dia, $anestime_mes, $anestime_ano, $anestime_hor, $anestime_min, $anestime_seg,
             $intime_cond, $intime, $intime_dia, $intime_mes, $intime_ano, $intime_hor, $intime_min, $intime_seg,
             $outtime_cond, $outtime, $outtime_dia, $outtime_mes, $outtime_ano, $outtime_hor, $outtime_min, $outtime_seg,
             $pa_cond, $pa, $pa_autocomp,
             $cito_cond, $cito, $cito_autocomp,
             $citoproc_cond, $citoproc, $citoproc_autocomp,
             $diagpre_cond, $diagpre, $diagpre_autocomp,
             $diagpost_cond, $diagpost, $diagpost_autocomp,
             $trandate_cond, $trandate, $trandate_dia, $trandate_mes, $trandate_ano, $trandate_hor, $trandate_min, $trandate_seg,
             $class_cond, $class, $class_autocomp,
             $awalobs_cond, $awalobs, $awalobs_dia, $awalobs_mes, $awalobs_ano, $awalobs_hor, $awalobs_min, $awalobs_seg,
             $akhirobs_cond, $akhirobs, $akhirobs_dia, $akhirobs_mes, $akhirobs_ano, $akhirobs_hor, $akhirobs_min, $akhirobs_seg,
             $inapcode_cond, $inapcode, $inapcode_autocomp, $nmgp_tab_label;

      $C_formatado = true;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      if (!empty($babybirth_autocomp) && empty($babybirth))
      {
          $babybirth = $babybirth_autocomp;
      }
      if (!empty($id_autocomp) && empty($id))
      {
          $id = $id_autocomp;
      }
      if (!empty($trancode_autocomp) && empty($trancode))
      {
          $trancode = $trancode_autocomp;
      }
      if (!empty($custcode_autocomp) && empty($custcode))
      {
          $custcode = $custcode_autocomp;
      }
      if (!empty($birthtime_autocomp) && empty($birthtime))
      {
          $birthtime = $birthtime_autocomp;
      }
      if (!empty($bb_autocomp) && empty($bb))
      {
          $bb = $bb_autocomp;
      }
      if (!empty($tb_autocomp) && empty($tb))
      {
          $tb = $tb_autocomp;
      }
      if (!empty($lingkar_autocomp) && empty($lingkar))
      {
          $lingkar = $lingkar_autocomp;
      }
      if (!empty($hidup_autocomp) && empty($hidup))
      {
          $hidup = $hidup_autocomp;
      }
      if (!empty($pa_autocomp) && empty($pa))
      {
          $pa = $pa_autocomp;
      }
      if (!empty($cito_autocomp) && empty($cito))
      {
          $cito = $cito_autocomp;
      }
      if (!empty($citoproc_autocomp) && empty($citoproc))
      {
          $citoproc = $citoproc_autocomp;
      }
      if (!empty($diagpre_autocomp) && empty($diagpre))
      {
          $diagpre = $diagpre_autocomp;
      }
      if (!empty($diagpost_autocomp) && empty($diagpost))
      {
          $diagpost = $diagpost_autocomp;
      }
      if (!empty($class_autocomp) && empty($class))
      {
          $class = $class_autocomp;
      }
      if (!empty($inapcode_autocomp) && empty($inapcode))
      {
          $inapcode = $inapcode_autocomp;
      }
      $babybirth_cond_salva = $babybirth_cond; 
      if (!isset($babybirth_input_2) || $babybirth_input_2 == "")
      {
          $babybirth_input_2 = $babybirth;
      }
      $id_cond_salva = $id_cond; 
      if (!isset($id_input_2) || $id_input_2 == "")
      {
          $id_input_2 = $id;
      }
      $trancode_cond_salva = $trancode_cond; 
      if (!isset($trancode_input_2) || $trancode_input_2 == "")
      {
          $trancode_input_2 = $trancode;
      }
      $custcode_cond_salva = $custcode_cond; 
      if (!isset($custcode_input_2) || $custcode_input_2 == "")
      {
          $custcode_input_2 = $custcode;
      }
      $birthdate_cond_salva = $birthdate_cond; 
      $birthtime_cond_salva = $birthtime_cond; 
      if (!isset($birthtime_input_2) || $birthtime_input_2 == "")
      {
          $birthtime_input_2 = $birthtime;
      }
      $bb_cond_salva = $bb_cond; 
      if (!isset($bb_input_2) || $bb_input_2 == "")
      {
          $bb_input_2 = $bb;
      }
      $tb_cond_salva = $tb_cond; 
      if (!isset($tb_input_2) || $tb_input_2 == "")
      {
          $tb_input_2 = $tb;
      }
      $lingkar_cond_salva = $lingkar_cond; 
      if (!isset($lingkar_input_2) || $lingkar_input_2 == "")
      {
          $lingkar_input_2 = $lingkar;
      }
      $hidup_cond_salva = $hidup_cond; 
      if (!isset($hidup_input_2) || $hidup_input_2 == "")
      {
          $hidup_input_2 = $hidup;
      }
      $anestime_cond_salva = $anestime_cond; 
      $intime_cond_salva = $intime_cond; 
      $outtime_cond_salva = $outtime_cond; 
      $pa_cond_salva = $pa_cond; 
      if (!isset($pa_input_2) || $pa_input_2 == "")
      {
          $pa_input_2 = $pa;
      }
      $cito_cond_salva = $cito_cond; 
      if (!isset($cito_input_2) || $cito_input_2 == "")
      {
          $cito_input_2 = $cito;
      }
      $citoproc_cond_salva = $citoproc_cond; 
      if (!isset($citoproc_input_2) || $citoproc_input_2 == "")
      {
          $citoproc_input_2 = $citoproc;
      }
      $diagpre_cond_salva = $diagpre_cond; 
      if (!isset($diagpre_input_2) || $diagpre_input_2 == "")
      {
          $diagpre_input_2 = $diagpre;
      }
      $diagpost_cond_salva = $diagpost_cond; 
      if (!isset($diagpost_input_2) || $diagpost_input_2 == "")
      {
          $diagpost_input_2 = $diagpost;
      }
      $trandate_cond_salva = $trandate_cond; 
      $class_cond_salva = $class_cond; 
      if (!isset($class_input_2) || $class_input_2 == "")
      {
          $class_input_2 = $class;
      }
      $awalobs_cond_salva = $awalobs_cond; 
      $akhirobs_cond_salva = $akhirobs_cond; 
      $inapcode_cond_salva = $inapcode_cond; 
      if (!isset($inapcode_input_2) || $inapcode_input_2 == "")
      {
          $inapcode_input_2 = $inapcode;
      }
      if ($babybirth_cond != "in")
      {
          nm_limpa_numero($babybirth, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($id_cond != "in")
      {
          nm_limpa_numero($id, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($bb_cond != "in")
      {
          nm_limpa_numero($bb, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($tb_cond != "in")
      {
          nm_limpa_numero($tb, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($lingkar_cond != "in")
      {
          nm_limpa_numero($lingkar, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($hidup_cond != "in")
      {
          nm_limpa_numero($hidup, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($citoproc_cond != "in")
      {
          nm_limpa_numero($citoproc, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['babybirth'] = $babybirth; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['babybirth_cond'] = $babybirth_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['id'] = $id; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['id_cond'] = $id_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trancode'] = $trancode; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trancode_cond'] = $trancode_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['custcode'] = $custcode; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['custcode_cond'] = $custcode_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_dia'] = $birthdate_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_mes'] = $birthdate_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_ano'] = $birthdate_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_hor'] = $birthdate_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_min'] = $birthdate_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_seg'] = $birthdate_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_cond'] = $birthdate_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthtime'] = $birthtime; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthtime_cond'] = $birthtime_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['bb'] = $bb; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['bb_cond'] = $bb_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['tb'] = $tb; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['tb_cond'] = $tb_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['lingkar'] = $lingkar; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['lingkar_cond'] = $lingkar_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['hidup'] = $hidup; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['hidup_cond'] = $hidup_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_dia'] = $anestime_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_mes'] = $anestime_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_ano'] = $anestime_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_hor'] = $anestime_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_min'] = $anestime_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_seg'] = $anestime_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_cond'] = $anestime_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_dia'] = $intime_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_mes'] = $intime_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_ano'] = $intime_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_hor'] = $intime_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_min'] = $intime_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_seg'] = $intime_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_cond'] = $intime_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_dia'] = $outtime_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_mes'] = $outtime_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_ano'] = $outtime_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_hor'] = $outtime_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_min'] = $outtime_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_seg'] = $outtime_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_cond'] = $outtime_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['pa'] = $pa; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['pa_cond'] = $pa_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['cito'] = $cito; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['cito_cond'] = $cito_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['citoproc'] = $citoproc; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['citoproc_cond'] = $citoproc_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['diagpre'] = $diagpre; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['diagpre_cond'] = $diagpre_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['diagpost'] = $diagpost; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['diagpost_cond'] = $diagpost_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_dia'] = $trandate_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_mes'] = $trandate_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_ano'] = $trandate_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_hor'] = $trandate_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_min'] = $trandate_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_seg'] = $trandate_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_cond'] = $trandate_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['class'] = $class; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['class_cond'] = $class_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_dia'] = $awalobs_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_mes'] = $awalobs_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_ano'] = $awalobs_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_hor'] = $awalobs_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_min'] = $awalobs_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_seg'] = $awalobs_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_cond'] = $awalobs_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_dia'] = $akhirobs_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_mes'] = $akhirobs_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_ano'] = $akhirobs_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_hor'] = $akhirobs_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_min'] = $akhirobs_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_seg'] = $akhirobs_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_cond'] = $akhirobs_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['inapcode'] = $inapcode; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['inapcode_cond'] = $inapcode_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['NM_operador'] = $this->NM_operador; 
      if ($this->NM_ajax_flag && $this->NM_ajax_opcao == "ajax_grid_search")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca'] = $Temp_Busca;
      }
      if ($babybirth_cond != "in" && $babybirth_cond != "bw" && !empty($babybirth) && !is_numeric($babybirth))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Baby Birth";
      }
      if ($babybirth_cond == "bw" && ((!empty($babybirth) && !is_numeric($babybirth)) || (!empty($babybirth_input_2) && !is_numeric($babybirth_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Baby Birth";
      }
      if ($id_cond != "in" && $id_cond != "bw" && !empty($id) && !is_numeric($id))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : ID";
      }
      if ($id_cond == "bw" && ((!empty($id) && !is_numeric($id)) || (!empty($id_input_2) && !is_numeric($id_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : ID";
      }
      if ($bb_cond != "in" && $bb_cond != "bw" && !empty($bb) && !is_numeric($bb))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Bb";
      }
      if ($bb_cond == "bw" && ((!empty($bb) && !is_numeric($bb)) || (!empty($bb_input_2) && !is_numeric($bb_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Bb";
      }
      if ($tb_cond != "in" && $tb_cond != "bw" && !empty($tb) && !is_numeric($tb))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Tb";
      }
      if ($tb_cond == "bw" && ((!empty($tb) && !is_numeric($tb)) || (!empty($tb_input_2) && !is_numeric($tb_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Tb";
      }
      if ($lingkar_cond != "in" && $lingkar_cond != "bw" && !empty($lingkar) && !is_numeric($lingkar))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Lingkar";
      }
      if ($lingkar_cond == "bw" && ((!empty($lingkar) && !is_numeric($lingkar)) || (!empty($lingkar_input_2) && !is_numeric($lingkar_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Lingkar";
      }
      if ($hidup_cond != "in" && $hidup_cond != "bw" && !empty($hidup) && !is_numeric($hidup))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Hidup";
      }
      if ($hidup_cond == "bw" && ((!empty($hidup) && !is_numeric($hidup)) || (!empty($hidup_input_2) && !is_numeric($hidup_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Hidup";
      }
      if ($citoproc_cond != "in" && $citoproc_cond != "bw" && !empty($citoproc) && !is_numeric($citoproc))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Cito Proc";
      }
      if ($citoproc_cond == "bw" && ((!empty($citoproc) && !is_numeric($citoproc)) || (!empty($citoproc_input_2) && !is_numeric($citoproc_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Cito Proc";
      }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      $babybirth_look = substr($this->Db->qstr($babybirth), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($babybirth))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct babyBirth from " . $this->Ini->nm_tabela . " where babyBirth = $babybirth_look order by babyBirth"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct babyBirth from " . $this->Ini->nm_tabela . " where babyBirth = $babybirth_look order by babyBirth"; 
      }
      else
      {
          $nm_comando = "select distinct babyBirth from " . $this->Ini->nm_tabela . " where babyBirth = $babybirth_look order by babyBirth"; 
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
          $this->cmp_formatado['babybirth'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['babybirth'] = $cmp1;
      }
      else
      {
          $cmp1 = $babybirth;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['babybirth'] = $cmp1;
      }
      $id_look = substr($this->Db->qstr($id), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($id))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct id from " . $this->Ini->nm_tabela . " where id = $id_look order by id"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct id from " . $this->Ini->nm_tabela . " where id = $id_look order by id"; 
      }
      else
      {
          $nm_comando = "select distinct id from " . $this->Ini->nm_tabela . " where id = $id_look order by id"; 
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
          $this->cmp_formatado['id'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['id'] = $cmp1;
      }
      else
      {
          $cmp1 = $id;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['id'] = $cmp1;
      }
      $trancode_look = substr($this->Db->qstr($trancode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct tranCode from " . $this->Ini->nm_tabela . " where tranCode = '$trancode_look' order by tranCode"; 
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
      $custcode_look = substr($this->Db->qstr($custcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct custCode from " . $this->Ini->nm_tabela . " where custCode = '$custcode_look' order by custCode"; 
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
      $birthtime_look = substr($this->Db->qstr($birthtime), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct birthTime from " . $this->Ini->nm_tabela . " where birthTime = '$birthtime_look' order by birthTime"; 
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
          $this->cmp_formatado['birthtime'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['birthtime'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['birthtime'] = $birthtime;
      }
      $bb_look = substr($this->Db->qstr($bb), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($bb))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct bb from " . $this->Ini->nm_tabela . " where bb = $bb_look order by bb"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct bb from " . $this->Ini->nm_tabela . " where bb = $bb_look order by bb"; 
      }
      else
      {
          $nm_comando = "select distinct bb from " . $this->Ini->nm_tabela . " where bb = $bb_look order by bb"; 
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
          $this->cmp_formatado['bb'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['bb'] = $cmp1;
      }
      else
      {
          $cmp1 = $bb;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['bb'] = $cmp1;
      }
      $tb_look = substr($this->Db->qstr($tb), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($tb))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct tb from " . $this->Ini->nm_tabela . " where tb = $tb_look order by tb"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct tb from " . $this->Ini->nm_tabela . " where tb = $tb_look order by tb"; 
      }
      else
      {
          $nm_comando = "select distinct tb from " . $this->Ini->nm_tabela . " where tb = $tb_look order by tb"; 
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
          $this->cmp_formatado['tb'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['tb'] = $cmp1;
      }
      else
      {
          $cmp1 = $tb;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['tb'] = $cmp1;
      }
      $lingkar_look = substr($this->Db->qstr($lingkar), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($lingkar))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct lingkar from " . $this->Ini->nm_tabela . " where lingkar = $lingkar_look order by lingkar"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct lingkar from " . $this->Ini->nm_tabela . " where lingkar = $lingkar_look order by lingkar"; 
      }
      else
      {
          $nm_comando = "select distinct lingkar from " . $this->Ini->nm_tabela . " where lingkar = $lingkar_look order by lingkar"; 
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
          $this->cmp_formatado['lingkar'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['lingkar'] = $cmp1;
      }
      else
      {
          $cmp1 = $lingkar;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['lingkar'] = $cmp1;
      }
      $hidup_look = substr($this->Db->qstr($hidup), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($hidup))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct hidup from " . $this->Ini->nm_tabela . " where hidup = $hidup_look order by hidup"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct hidup from " . $this->Ini->nm_tabela . " where hidup = $hidup_look order by hidup"; 
      }
      else
      {
          $nm_comando = "select distinct hidup from " . $this->Ini->nm_tabela . " where hidup = $hidup_look order by hidup"; 
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
          $this->cmp_formatado['hidup'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['hidup'] = $cmp1;
      }
      else
      {
          $cmp1 = $hidup;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['hidup'] = $cmp1;
      }
      $pa_look = substr($this->Db->qstr($pa), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct PA from " . $this->Ini->nm_tabela . " where PA = '$pa_look' order by PA"; 
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
          $this->cmp_formatado['pa'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['pa'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['pa'] = $pa;
      }
      $cito_look = substr($this->Db->qstr($cito), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct Cito from " . $this->Ini->nm_tabela . " where Cito = '$cito_look' order by Cito"; 
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
          $this->cmp_formatado['cito'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['cito'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['cito'] = $cito;
      }
      $citoproc_look = substr($this->Db->qstr($citoproc), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($citoproc))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct citoProc from " . $this->Ini->nm_tabela . " where citoProc = $citoproc_look order by citoProc"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct citoProc from " . $this->Ini->nm_tabela . " where citoProc = $citoproc_look order by citoProc"; 
      }
      else
      {
          $nm_comando = "select distinct citoProc from " . $this->Ini->nm_tabela . " where citoProc = $citoproc_look order by citoProc"; 
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
          $this->cmp_formatado['citoproc'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['citoproc'] = $cmp1;
      }
      else
      {
          $cmp1 = $citoproc;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $this->cmp_formatado['citoproc'] = $cmp1;
      }
      $diagpre_look = substr($this->Db->qstr($diagpre), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct diagPre from " . $this->Ini->nm_tabela . " where diagPre = '$diagpre_look' order by diagPre"; 
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
          $this->cmp_formatado['diagpre'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['diagpre'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['diagpre'] = $diagpre;
      }
      $diagpost_look = substr($this->Db->qstr($diagpost), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct diagPost from " . $this->Ini->nm_tabela . " where diagPost = '$diagpost_look' order by diagPost"; 
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
          $this->cmp_formatado['diagpost'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['diagpost'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['diagpost'] = $diagpost;
      }
      $class_look = substr($this->Db->qstr($class), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct class from " . $this->Ini->nm_tabela . " where class = '$class_look' order by class"; 
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
          $this->cmp_formatado['class'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['class'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['class'] = $class;
      }
      $inapcode_look = substr($this->Db->qstr($inapcode), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct inapCode from " . $this->Ini->nm_tabela . " where inapCode = '$inapcode_look' order by inapCode"; 
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
          $this->cmp_formatado['inapcode'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['inapcode'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['inapcode'] = $inapcode;
      }

      //----- $babybirth
      $this->Date_part = false;
      if (isset($babybirth) || $babybirth_cond == "nu" || $babybirth_cond == "nn" || $babybirth_cond == "ep" || $babybirth_cond == "ne")
      {
         $this->monta_condicao("babyBirth", $babybirth_cond, $babybirth, "", "babybirth");
      }

      //----- $id
      $this->Date_part = false;
      if (isset($id) || $id_cond == "nu" || $id_cond == "nn" || $id_cond == "ep" || $id_cond == "ne")
      {
         $this->monta_condicao("id", $id_cond, $id, "", "id");
      }

      //----- $trancode
      $this->Date_part = false;
      if (isset($trancode) || $trancode_cond == "nu" || $trancode_cond == "nn" || $trancode_cond == "ep" || $trancode_cond == "ne")
      {
         $this->monta_condicao("tranCode", $trancode_cond, $trancode, "", "trancode");
      }

      //----- $custcode
      $this->Date_part = false;
      if (isset($custcode) || $custcode_cond == "nu" || $custcode_cond == "nn" || $custcode_cond == "ep" || $custcode_cond == "ne")
      {
         $this->monta_condicao("custCode", $custcode_cond, $custcode, "", "custcode");
      }

      //----- $birthdate
      $this->Date_part = false;
      if ($birthdate_cond != "bi_TP")
      {
          $birthdate_cond = strtoupper($birthdate_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $birthdate_ano;
          $Dtxt .= $birthdate_mes;
          $Dtxt .= $birthdate_dia;
          $Dtxt .= $birthdate_hor;
          $Dtxt .= $birthdate_min;
          $Dtxt .= $birthdate_seg;
          $val[0]['ano'] = $birthdate_ano;
          $val[0]['mes'] = $birthdate_mes;
          $val[0]['dia'] = $birthdate_dia;
          $val[0]['hor'] = $birthdate_hor;
          $val[0]['min'] = $birthdate_min;
          $val[0]['seg'] = $birthdate_seg;
          if ($birthdate_cond == "BW")
          {
              $val[1]['ano'] = $birthdate_input_2_ano;
              $val[1]['mes'] = $birthdate_input_2_mes;
              $val[1]['dia'] = $birthdate_input_2_dia;
              $val[1]['hor'] = $birthdate_input_2_hor;
              $val[1]['min'] = $birthdate_input_2_min;
              $val[1]['seg'] = $birthdate_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "DATETIME", $birthdate_cond, "", "datahora");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $birthdate = $val[0];
          $this->cmp_formatado['birthdate'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['birthdate'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['birthdate'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          if ($birthdate_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $birthdate_input_2     = $val[1];
              $this->cmp_formatado['birthdate_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['birthdate_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['birthdate_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['birthdate_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          }
          if (!empty($Dtxt) || $birthdate_cond == "NU" || $birthdate_cond == "NN"|| $birthdate_cond == "EP"|| $birthdate_cond == "NE")
          {
              $this->monta_condicao("birthDate", $birthdate_cond, $birthdate, $birthdate_input_2, 'birthdate', 'DATETIME');
          }
      }

      //----- $birthtime
      $this->Date_part = false;
      if (isset($birthtime) || $birthtime_cond == "nu" || $birthtime_cond == "nn" || $birthtime_cond == "ep" || $birthtime_cond == "ne")
      {
         $this->monta_condicao("birthTime", $birthtime_cond, $birthtime, "", "birthtime");
      }

      //----- $bb
      $this->Date_part = false;
      if (isset($bb) || $bb_cond == "nu" || $bb_cond == "nn" || $bb_cond == "ep" || $bb_cond == "ne")
      {
         $this->monta_condicao("bb", $bb_cond, $bb, "", "bb");
      }

      //----- $tb
      $this->Date_part = false;
      if (isset($tb) || $tb_cond == "nu" || $tb_cond == "nn" || $tb_cond == "ep" || $tb_cond == "ne")
      {
         $this->monta_condicao("tb", $tb_cond, $tb, "", "tb");
      }

      //----- $lingkar
      $this->Date_part = false;
      if (isset($lingkar) || $lingkar_cond == "nu" || $lingkar_cond == "nn" || $lingkar_cond == "ep" || $lingkar_cond == "ne")
      {
         $this->monta_condicao("lingkar", $lingkar_cond, $lingkar, "", "lingkar");
      }

      //----- $hidup
      $this->Date_part = false;
      if (isset($hidup) || $hidup_cond == "nu" || $hidup_cond == "nn" || $hidup_cond == "ep" || $hidup_cond == "ne")
      {
         $this->monta_condicao("hidup", $hidup_cond, $hidup, "", "hidup");
      }

      //----- $anestime
      $this->Date_part = false;
      if ($anestime_cond != "bi_TP")
      {
          $anestime_cond = strtoupper($anestime_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $anestime_ano;
          $Dtxt .= $anestime_mes;
          $Dtxt .= $anestime_dia;
          $Dtxt .= $anestime_hor;
          $Dtxt .= $anestime_min;
          $Dtxt .= $anestime_seg;
          $val[0]['ano'] = $anestime_ano;
          $val[0]['mes'] = $anestime_mes;
          $val[0]['dia'] = $anestime_dia;
          $val[0]['hor'] = $anestime_hor;
          $val[0]['min'] = $anestime_min;
          $val[0]['seg'] = $anestime_seg;
          if ($anestime_cond == "BW")
          {
              $val[1]['ano'] = $anestime_input_2_ano;
              $val[1]['mes'] = $anestime_input_2_mes;
              $val[1]['dia'] = $anestime_input_2_dia;
              $val[1]['hor'] = $anestime_input_2_hor;
              $val[1]['min'] = $anestime_input_2_min;
              $val[1]['seg'] = $anestime_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "DATETIME", $anestime_cond, "", "datahora");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $anestime = $val[0];
          $this->cmp_formatado['anestime'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['anestime'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['anestime'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          if ($anestime_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $anestime_input_2     = $val[1];
              $this->cmp_formatado['anestime_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['anestime_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['anestime_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['anestime_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          }
          if (!empty($Dtxt) || $anestime_cond == "NU" || $anestime_cond == "NN"|| $anestime_cond == "EP"|| $anestime_cond == "NE")
          {
              $this->monta_condicao("anesTime", $anestime_cond, $anestime, $anestime_input_2, 'anestime', 'DATETIME');
          }
      }

      //----- $intime
      $this->Date_part = false;
      if ($intime_cond != "bi_TP")
      {
          $intime_cond = strtoupper($intime_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $intime_ano;
          $Dtxt .= $intime_mes;
          $Dtxt .= $intime_dia;
          $Dtxt .= $intime_hor;
          $Dtxt .= $intime_min;
          $Dtxt .= $intime_seg;
          $val[0]['ano'] = $intime_ano;
          $val[0]['mes'] = $intime_mes;
          $val[0]['dia'] = $intime_dia;
          $val[0]['hor'] = $intime_hor;
          $val[0]['min'] = $intime_min;
          $val[0]['seg'] = $intime_seg;
          if ($intime_cond == "BW")
          {
              $val[1]['ano'] = $intime_input_2_ano;
              $val[1]['mes'] = $intime_input_2_mes;
              $val[1]['dia'] = $intime_input_2_dia;
              $val[1]['hor'] = $intime_input_2_hor;
              $val[1]['min'] = $intime_input_2_min;
              $val[1]['seg'] = $intime_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "DATETIME", $intime_cond, "", "datahora");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $intime = $val[0];
          $this->cmp_formatado['intime'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['intime'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['intime'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          if ($intime_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $intime_input_2     = $val[1];
              $this->cmp_formatado['intime_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['intime_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['intime_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['intime_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          }
          if (!empty($Dtxt) || $intime_cond == "NU" || $intime_cond == "NN"|| $intime_cond == "EP"|| $intime_cond == "NE")
          {
              $this->monta_condicao("inTime", $intime_cond, $intime, $intime_input_2, 'intime', 'DATETIME');
          }
      }

      //----- $outtime
      $this->Date_part = false;
      if ($outtime_cond != "bi_TP")
      {
          $outtime_cond = strtoupper($outtime_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $outtime_ano;
          $Dtxt .= $outtime_mes;
          $Dtxt .= $outtime_dia;
          $Dtxt .= $outtime_hor;
          $Dtxt .= $outtime_min;
          $Dtxt .= $outtime_seg;
          $val[0]['ano'] = $outtime_ano;
          $val[0]['mes'] = $outtime_mes;
          $val[0]['dia'] = $outtime_dia;
          $val[0]['hor'] = $outtime_hor;
          $val[0]['min'] = $outtime_min;
          $val[0]['seg'] = $outtime_seg;
          if ($outtime_cond == "BW")
          {
              $val[1]['ano'] = $outtime_input_2_ano;
              $val[1]['mes'] = $outtime_input_2_mes;
              $val[1]['dia'] = $outtime_input_2_dia;
              $val[1]['hor'] = $outtime_input_2_hor;
              $val[1]['min'] = $outtime_input_2_min;
              $val[1]['seg'] = $outtime_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "DATETIME", $outtime_cond, "", "datahora");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $outtime = $val[0];
          $this->cmp_formatado['outtime'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['outtime'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['outtime'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          if ($outtime_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $outtime_input_2     = $val[1];
              $this->cmp_formatado['outtime_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['outtime_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['outtime_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['outtime_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          }
          if (!empty($Dtxt) || $outtime_cond == "NU" || $outtime_cond == "NN"|| $outtime_cond == "EP"|| $outtime_cond == "NE")
          {
              $this->monta_condicao("outTime", $outtime_cond, $outtime, $outtime_input_2, 'outtime', 'DATETIME');
          }
      }

      //----- $pa
      $this->Date_part = false;
      if (isset($pa) || $pa_cond == "nu" || $pa_cond == "nn" || $pa_cond == "ep" || $pa_cond == "ne")
      {
         $this->monta_condicao("PA", $pa_cond, $pa, "", "pa");
      }

      //----- $cito
      $this->Date_part = false;
      if (isset($cito) || $cito_cond == "nu" || $cito_cond == "nn" || $cito_cond == "ep" || $cito_cond == "ne")
      {
         $this->monta_condicao("Cito", $cito_cond, $cito, "", "cito");
      }

      //----- $citoproc
      $this->Date_part = false;
      if (isset($citoproc) || $citoproc_cond == "nu" || $citoproc_cond == "nn" || $citoproc_cond == "ep" || $citoproc_cond == "ne")
      {
         $this->monta_condicao("citoProc", $citoproc_cond, $citoproc, "", "citoproc");
      }

      //----- $diagpre
      $this->Date_part = false;
      if (isset($diagpre) || $diagpre_cond == "nu" || $diagpre_cond == "nn" || $diagpre_cond == "ep" || $diagpre_cond == "ne")
      {
         $this->monta_condicao("diagPre", $diagpre_cond, $diagpre, "", "diagpre");
      }

      //----- $diagpost
      $this->Date_part = false;
      if (isset($diagpost) || $diagpost_cond == "nu" || $diagpost_cond == "nn" || $diagpost_cond == "ep" || $diagpost_cond == "ne")
      {
         $this->monta_condicao("diagPost", $diagpost_cond, $diagpost, "", "diagpost");
      }

      //----- $trandate
      $this->Date_part = false;
      if ($trandate_cond != "bi_TP")
      {
          $trandate_cond = strtoupper($trandate_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $trandate_ano;
          $Dtxt .= $trandate_mes;
          $Dtxt .= $trandate_dia;
          $Dtxt .= $trandate_hor;
          $Dtxt .= $trandate_min;
          $Dtxt .= $trandate_seg;
          $val[0]['ano'] = $trandate_ano;
          $val[0]['mes'] = $trandate_mes;
          $val[0]['dia'] = $trandate_dia;
          $val[0]['hor'] = $trandate_hor;
          $val[0]['min'] = $trandate_min;
          $val[0]['seg'] = $trandate_seg;
          if ($trandate_cond == "BW")
          {
              $val[1]['ano'] = $trandate_input_2_ano;
              $val[1]['mes'] = $trandate_input_2_mes;
              $val[1]['dia'] = $trandate_input_2_dia;
              $val[1]['hor'] = $trandate_input_2_hor;
              $val[1]['min'] = $trandate_input_2_min;
              $val[1]['seg'] = $trandate_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "DATETIME", $trandate_cond, "", "datahora");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $trandate = $val[0];
          $this->cmp_formatado['trandate'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['trandate'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['trandate'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          if ($trandate_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $trandate_input_2     = $val[1];
              $this->cmp_formatado['trandate_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['trandate_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['trandate_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['trandate_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          }
          if (!empty($Dtxt) || $trandate_cond == "NU" || $trandate_cond == "NN"|| $trandate_cond == "EP"|| $trandate_cond == "NE")
          {
              $this->monta_condicao("tranDate", $trandate_cond, $trandate, $trandate_input_2, 'trandate', 'DATETIME');
          }
      }

      //----- $class
      $this->Date_part = false;
      if (isset($class) || $class_cond == "nu" || $class_cond == "nn" || $class_cond == "ep" || $class_cond == "ne")
      {
         $this->monta_condicao("class", $class_cond, $class, "", "class");
      }

      //----- $awalobs
      $this->Date_part = false;
      if ($awalobs_cond != "bi_TP")
      {
          $awalobs_cond = strtoupper($awalobs_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $awalobs_ano;
          $Dtxt .= $awalobs_mes;
          $Dtxt .= $awalobs_dia;
          $Dtxt .= $awalobs_hor;
          $Dtxt .= $awalobs_min;
          $Dtxt .= $awalobs_seg;
          $val[0]['ano'] = $awalobs_ano;
          $val[0]['mes'] = $awalobs_mes;
          $val[0]['dia'] = $awalobs_dia;
          $val[0]['hor'] = $awalobs_hor;
          $val[0]['min'] = $awalobs_min;
          $val[0]['seg'] = $awalobs_seg;
          if ($awalobs_cond == "BW")
          {
              $val[1]['ano'] = $awalobs_input_2_ano;
              $val[1]['mes'] = $awalobs_input_2_mes;
              $val[1]['dia'] = $awalobs_input_2_dia;
              $val[1]['hor'] = $awalobs_input_2_hor;
              $val[1]['min'] = $awalobs_input_2_min;
              $val[1]['seg'] = $awalobs_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "DATETIME", $awalobs_cond, "", "datahora");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $awalobs = $val[0];
          $this->cmp_formatado['awalobs'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['awalobs'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['awalobs'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          if ($awalobs_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $awalobs_input_2     = $val[1];
              $this->cmp_formatado['awalobs_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['awalobs_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['awalobs_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['awalobs_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          }
          if (!empty($Dtxt) || $awalobs_cond == "NU" || $awalobs_cond == "NN"|| $awalobs_cond == "EP"|| $awalobs_cond == "NE")
          {
              $this->monta_condicao("awalObs", $awalobs_cond, $awalobs, $awalobs_input_2, 'awalobs', 'DATETIME');
          }
      }

      //----- $akhirobs
      $this->Date_part = false;
      if ($akhirobs_cond != "bi_TP")
      {
          $akhirobs_cond = strtoupper($akhirobs_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $akhirobs_ano;
          $Dtxt .= $akhirobs_mes;
          $Dtxt .= $akhirobs_dia;
          $Dtxt .= $akhirobs_hor;
          $Dtxt .= $akhirobs_min;
          $Dtxt .= $akhirobs_seg;
          $val[0]['ano'] = $akhirobs_ano;
          $val[0]['mes'] = $akhirobs_mes;
          $val[0]['dia'] = $akhirobs_dia;
          $val[0]['hor'] = $akhirobs_hor;
          $val[0]['min'] = $akhirobs_min;
          $val[0]['seg'] = $akhirobs_seg;
          if ($akhirobs_cond == "BW")
          {
              $val[1]['ano'] = $akhirobs_input_2_ano;
              $val[1]['mes'] = $akhirobs_input_2_mes;
              $val[1]['dia'] = $akhirobs_input_2_dia;
              $val[1]['hor'] = $akhirobs_input_2_hor;
              $val[1]['min'] = $akhirobs_input_2_min;
              $val[1]['seg'] = $akhirobs_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "DATETIME", $akhirobs_cond, "", "datahora");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $akhirobs = $val[0];
          $this->cmp_formatado['akhirobs'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['akhirobs'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['akhirobs'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          if ($akhirobs_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $akhirobs_input_2     = $val[1];
              $this->cmp_formatado['akhirobs_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']['akhirobs_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['akhirobs_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['akhirobs_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY his"));
          }
          if (!empty($Dtxt) || $akhirobs_cond == "NU" || $akhirobs_cond == "NN"|| $akhirobs_cond == "EP"|| $akhirobs_cond == "NE")
          {
              $this->monta_condicao("akhirObs", $akhirobs_cond, $akhirobs, $akhirobs_input_2, 'akhirobs', 'DATETIME');
          }
      }

      //----- $inapcode
      $this->Date_part = false;
      if (isset($inapcode) || $inapcode_cond == "nu" || $inapcode_cond == "nn" || $inapcode_cond == "ep" || $inapcode_cond == "ne")
      {
         $this->monta_condicao("inapCode", $inapcode_cond, $inapcode, "", "inapcode");
      }
   }

   /**
    * @access  public
    */
   function finaliza_resultado()
   {
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_pesq_fast'] = "";
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['fast_search']);
      if ("" == $this->comando_filtro)
      {
          $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_orig'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca']) && $_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['campos_busca'], "UTF-8", $_SESSION['scriptcase']['charset']);
      }

      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['opcao']              = "pesq";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_pesq_ant'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailvk']['where_pesq'];

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
