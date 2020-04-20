<?php
//
class form_tbinstansi_mob_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'navSummary'        => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $instcode;
   var $init;
   var $name;
   var $address;
   var $city;
   var $phone;
   var $fax;
   var $cp;
   var $limit;
   var $discount;
   var $joindate;
   var $joindate_hora;
   var $expdate;
   var $expdate_hora;
   var $policy;
   var $itemtype;
   var $deleted;
   var $tempo;
   var $asuransi;
   var $marginobat;
   var $markuptindakan;
   var $markupobat;
   var $markuplab;
   var $markuprad;
   var $admpolitype;
   var $adminaptype;
   var $admpolibaru;
   var $admpolilama;
   var $adminap;
   var $lastupdated;
   var $lastupdated_hora;
   var $marginpma;
   var $withpma;
   var $forminternal;
   var $vacc;
   var $extcode;
   var $umum;
   var $autoshow;
   var $bpjs;
   var $caracode;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['address']))
          {
              $this->address = $this->NM_ajax_info['param']['address'];
          }
          if (isset($this->NM_ajax_info['param']['adminap']))
          {
              $this->adminap = $this->NM_ajax_info['param']['adminap'];
          }
          if (isset($this->NM_ajax_info['param']['adminaptype']))
          {
              $this->adminaptype = $this->NM_ajax_info['param']['adminaptype'];
          }
          if (isset($this->NM_ajax_info['param']['admpolibaru']))
          {
              $this->admpolibaru = $this->NM_ajax_info['param']['admpolibaru'];
          }
          if (isset($this->NM_ajax_info['param']['admpolilama']))
          {
              $this->admpolilama = $this->NM_ajax_info['param']['admpolilama'];
          }
          if (isset($this->NM_ajax_info['param']['admpolitype']))
          {
              $this->admpolitype = $this->NM_ajax_info['param']['admpolitype'];
          }
          if (isset($this->NM_ajax_info['param']['city']))
          {
              $this->city = $this->NM_ajax_info['param']['city'];
          }
          if (isset($this->NM_ajax_info['param']['cp']))
          {
              $this->cp = $this->NM_ajax_info['param']['cp'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['discount']))
          {
              $this->discount = $this->NM_ajax_info['param']['discount'];
          }
          if (isset($this->NM_ajax_info['param']['expdate']))
          {
              $this->expdate = $this->NM_ajax_info['param']['expdate'];
          }
          if (isset($this->NM_ajax_info['param']['fax']))
          {
              $this->fax = $this->NM_ajax_info['param']['fax'];
          }
          if (isset($this->NM_ajax_info['param']['init']))
          {
              $this->init = $this->NM_ajax_info['param']['init'];
          }
          if (isset($this->NM_ajax_info['param']['instcode']))
          {
              $this->instcode = $this->NM_ajax_info['param']['instcode'];
          }
          if (isset($this->NM_ajax_info['param']['joindate']))
          {
              $this->joindate = $this->NM_ajax_info['param']['joindate'];
          }
          if (isset($this->NM_ajax_info['param']['lastupdated']))
          {
              $this->lastupdated = $this->NM_ajax_info['param']['lastupdated'];
          }
          if (isset($this->NM_ajax_info['param']['limit']))
          {
              $this->limit = $this->NM_ajax_info['param']['limit'];
          }
          if (isset($this->NM_ajax_info['param']['marginobat']))
          {
              $this->marginobat = $this->NM_ajax_info['param']['marginobat'];
          }
          if (isset($this->NM_ajax_info['param']['marginpma']))
          {
              $this->marginpma = $this->NM_ajax_info['param']['marginpma'];
          }
          if (isset($this->NM_ajax_info['param']['markuplab']))
          {
              $this->markuplab = $this->NM_ajax_info['param']['markuplab'];
          }
          if (isset($this->NM_ajax_info['param']['markupobat']))
          {
              $this->markupobat = $this->NM_ajax_info['param']['markupobat'];
          }
          if (isset($this->NM_ajax_info['param']['markuprad']))
          {
              $this->markuprad = $this->NM_ajax_info['param']['markuprad'];
          }
          if (isset($this->NM_ajax_info['param']['markuptindakan']))
          {
              $this->markuptindakan = $this->NM_ajax_info['param']['markuptindakan'];
          }
          if (isset($this->NM_ajax_info['param']['name']))
          {
              $this->name = $this->NM_ajax_info['param']['name'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['phone']))
          {
              $this->phone = $this->NM_ajax_info['param']['phone'];
          }
          if (isset($this->NM_ajax_info['param']['policy']))
          {
              $this->policy = $this->NM_ajax_info['param']['policy'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tempo']))
          {
              $this->tempo = $this->NM_ajax_info['param']['tempo'];
          }
          if (isset($this->NM_ajax_info['param']['withpma']))
          {
              $this->withpma = $this->NM_ajax_info['param']['withpma'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_tbinstansi_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->joindate);
          $this->joindate      = $aDtParts[0];
          $this->joindate_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->expdate);
          $this->expdate      = $aDtParts[0];
          $this->expdate_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->lastupdated);
          $this->lastupdated      = $aDtParts[0];
          $this->lastupdated_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_tbinstansi_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("id");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("id");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_tbinstansi_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbinstansi_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbinstansi_mob'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbinstansi_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbinstansi_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_tbinstansi_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbinstansi_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Instansi Penjamin";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_tbinstansi_mob")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';


      $this->arr_buttons['group_group_2']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );


      $_SESSION['scriptcase']['error_icon']['form_tbinstansi_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_tbinstansi_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "on";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbinstansi_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbinstansi_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbinstansi_mob'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dados_form'];
          if (!isset($this->itemtype)){$this->itemtype = $this->nmgp_dados_form['itemtype'];} 
          if (!isset($this->deleted)){$this->deleted = $this->nmgp_dados_form['deleted'];} 
          if (!isset($this->asuransi)){$this->asuransi = $this->nmgp_dados_form['asuransi'];} 
          if (!isset($this->forminternal)){$this->forminternal = $this->nmgp_dados_form['forminternal'];} 
          if (!isset($this->vacc)){$this->vacc = $this->nmgp_dados_form['vacc'];} 
          if (!isset($this->extcode)){$this->extcode = $this->nmgp_dados_form['extcode'];} 
          if (!isset($this->umum)){$this->umum = $this->nmgp_dados_form['umum'];} 
          if (!isset($this->autoshow)){$this->autoshow = $this->nmgp_dados_form['autoshow'];} 
          if (!isset($this->bpjs)){$this->bpjs = $this->nmgp_dados_form['bpjs'];} 
          if (!isset($this->caracode)){$this->caracode = $this->nmgp_dados_form['caracode'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_tbinstansi_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
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
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_tbinstansi/form_tbinstansi_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_tbinstansi_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_tbinstansi_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_tbinstansi_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_tbinstansi/form_tbinstansi_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_tbinstansi_mob_erro.class.php"); 
      }
      $this->Erro      = new form_tbinstansi_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opcao']))
         { 
             if ($this->instcode != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_tbinstansi_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->instcode)) { $this->nm_limpa_alfa($this->instcode); }
      if (isset($this->init)) { $this->nm_limpa_alfa($this->init); }
      if (isset($this->name)) { $this->nm_limpa_alfa($this->name); }
      if (isset($this->city)) { $this->nm_limpa_alfa($this->city); }
      if (isset($this->phone)) { $this->nm_limpa_alfa($this->phone); }
      if (isset($this->fax)) { $this->nm_limpa_alfa($this->fax); }
      if (isset($this->cp)) { $this->nm_limpa_alfa($this->cp); }
      if (isset($this->limit)) { $this->nm_limpa_alfa($this->limit); }
      if (isset($this->discount)) { $this->nm_limpa_alfa($this->discount); }
      if (isset($this->tempo)) { $this->nm_limpa_alfa($this->tempo); }
      if (isset($this->marginobat)) { $this->nm_limpa_alfa($this->marginobat); }
      if (isset($this->markuptindakan)) { $this->nm_limpa_alfa($this->markuptindakan); }
      if (isset($this->markupobat)) { $this->nm_limpa_alfa($this->markupobat); }
      if (isset($this->markuplab)) { $this->nm_limpa_alfa($this->markuplab); }
      if (isset($this->markuprad)) { $this->nm_limpa_alfa($this->markuprad); }
      if (isset($this->admpolitype)) { $this->nm_limpa_alfa($this->admpolitype); }
      if (isset($this->adminaptype)) { $this->nm_limpa_alfa($this->adminaptype); }
      if (isset($this->admpolibaru)) { $this->nm_limpa_alfa($this->admpolibaru); }
      if (isset($this->admpolilama)) { $this->nm_limpa_alfa($this->admpolilama); }
      if (isset($this->adminap)) { $this->nm_limpa_alfa($this->adminap); }
      if (isset($this->marginpma)) { $this->nm_limpa_alfa($this->marginpma); }
      if (isset($this->withpma)) { $this->nm_limpa_alfa($this->withpma); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- limit
      $this->field_config['limit']               = array();
      $this->field_config['limit']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['limit']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['limit']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['limit']['symbol_mon'] = '';
      $this->field_config['limit']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['limit']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- discount
      $this->field_config['discount']               = array();
      $this->field_config['discount']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['discount']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['discount']['symbol_dec'] = '';
      $this->field_config['discount']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['discount']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tempo
      $this->field_config['tempo']               = array();
      $this->field_config['tempo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tempo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tempo']['symbol_dec'] = '';
      $this->field_config['tempo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tempo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- lastupdated
      $this->field_config['lastupdated']                 = array();
      $this->field_config['lastupdated']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['lastupdated']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['lastupdated']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['lastupdated']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'lastupdated');
      //-- joindate
      $this->field_config['joindate']                 = array();
      $this->field_config['joindate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['joindate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['joindate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['joindate']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'joindate');
      //-- expdate
      $this->field_config['expdate']                 = array();
      $this->field_config['expdate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['expdate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['expdate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['expdate']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'expdate');
      //-- marginobat
      $this->field_config['marginobat']               = array();
      $this->field_config['marginobat']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['marginobat']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['marginobat']['symbol_dec'] = '';
      $this->field_config['marginobat']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['marginobat']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- markuptindakan
      $this->field_config['markuptindakan']               = array();
      $this->field_config['markuptindakan']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['markuptindakan']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['markuptindakan']['symbol_dec'] = '';
      $this->field_config['markuptindakan']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['markuptindakan']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- markupobat
      $this->field_config['markupobat']               = array();
      $this->field_config['markupobat']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['markupobat']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['markupobat']['symbol_dec'] = '';
      $this->field_config['markupobat']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['markupobat']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- markuplab
      $this->field_config['markuplab']               = array();
      $this->field_config['markuplab']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['markuplab']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['markuplab']['symbol_dec'] = '';
      $this->field_config['markuplab']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['markuplab']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- markuprad
      $this->field_config['markuprad']               = array();
      $this->field_config['markuprad']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['markuprad']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['markuprad']['symbol_dec'] = '';
      $this->field_config['markuprad']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['markuprad']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- admpolitype
      $this->field_config['admpolitype']               = array();
      $this->field_config['admpolitype']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['admpolitype']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['admpolitype']['symbol_dec'] = '';
      $this->field_config['admpolitype']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['admpolitype']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- adminaptype
      $this->field_config['adminaptype']               = array();
      $this->field_config['adminaptype']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['adminaptype']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['adminaptype']['symbol_dec'] = '';
      $this->field_config['adminaptype']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['adminaptype']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- admpolibaru
      $this->field_config['admpolibaru']               = array();
      $this->field_config['admpolibaru']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['admpolibaru']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['admpolibaru']['symbol_dec'] = '';
      $this->field_config['admpolibaru']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['admpolibaru']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- admpolilama
      $this->field_config['admpolilama']               = array();
      $this->field_config['admpolilama']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['admpolilama']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['admpolilama']['symbol_dec'] = '';
      $this->field_config['admpolilama']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['admpolilama']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- adminap
      $this->field_config['adminap']               = array();
      $this->field_config['adminap']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['adminap']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['adminap']['symbol_dec'] = '';
      $this->field_config['adminap']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['adminap']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- marginpma
      $this->field_config['marginpma']               = array();
      $this->field_config['marginpma']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['marginpma']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['marginpma']['symbol_dec'] = '';
      $this->field_config['marginpma']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['marginpma']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- withpma
      $this->field_config['withpma']               = array();
      $this->field_config['withpma']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['withpma']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['withpma']['symbol_dec'] = '';
      $this->field_config['withpma']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['withpma']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- itemtype
      $this->field_config['itemtype']               = array();
      $this->field_config['itemtype']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['itemtype']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['itemtype']['symbol_dec'] = '';
      $this->field_config['itemtype']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['itemtype']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- deleted
      $this->field_config['deleted']               = array();
      $this->field_config['deleted']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['deleted']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['deleted']['symbol_dec'] = '';
      $this->field_config['deleted']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['deleted']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- asuransi
      $this->field_config['asuransi']               = array();
      $this->field_config['asuransi']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['asuransi']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['asuransi']['symbol_dec'] = '';
      $this->field_config['asuransi']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['asuransi']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- forminternal
      $this->field_config['forminternal']               = array();
      $this->field_config['forminternal']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['forminternal']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['forminternal']['symbol_dec'] = '';
      $this->field_config['forminternal']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['forminternal']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- umum
      $this->field_config['umum']               = array();
      $this->field_config['umum']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['umum']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['umum']['symbol_dec'] = '';
      $this->field_config['umum']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['umum']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- autoshow
      $this->field_config['autoshow']               = array();
      $this->field_config['autoshow']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['autoshow']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['autoshow']['symbol_dec'] = '';
      $this->field_config['autoshow']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['autoshow']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- bpjs
      $this->field_config['bpjs']               = array();
      $this->field_config['bpjs']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['bpjs']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['bpjs']['symbol_dec'] = '';
      $this->field_config['bpjs']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['bpjs']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_instcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'instcode');
          }
          if ('validate_init' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'init');
          }
          if ('validate_name' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'name');
          }
          if ('validate_limit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'limit');
          }
          if ('validate_discount' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'discount');
          }
          if ('validate_tempo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tempo');
          }
          if ('validate_lastupdated' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lastupdated');
          }
          if ('validate_address' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'address');
          }
          if ('validate_city' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'city');
          }
          if ('validate_phone' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'phone');
          }
          if ('validate_fax' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fax');
          }
          if ('validate_cp' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cp');
          }
          if ('validate_joindate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'joindate');
          }
          if ('validate_expdate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'expdate');
          }
          if ('validate_marginobat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'marginobat');
          }
          if ('validate_markuptindakan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'markuptindakan');
          }
          if ('validate_markupobat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'markupobat');
          }
          if ('validate_markuplab' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'markuplab');
          }
          if ('validate_markuprad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'markuprad');
          }
          if ('validate_admpolitype' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'admpolitype');
          }
          if ('validate_adminaptype' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'adminaptype');
          }
          if ('validate_admpolibaru' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'admpolibaru');
          }
          if ('validate_admpolilama' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'admpolilama');
          }
          if ('validate_adminap' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'adminap');
          }
          if ('validate_marginpma' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'marginpma');
          }
          if ('validate_withpma' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'withpma');
          }
          if ('validate_policy' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'policy');
          }
          form_tbinstansi_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_tbinstansi_mob_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_tbinstansi_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_tbinstansi_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_tbinstansi_mob_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_tbinstansi_mob_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_tbinstansi_mob.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               if (!empty($str_zip)) {
                   exec($str_zip);
               }
               // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
               if ($fp)
               {
                   @fwrite($fp, $str_zip . "\r\n\r\n");
                   @fclose($fp);
               }
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Instansi Penjamin") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_tbinstansi_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_tbinstansi_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_tbinstansi_mob.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'instcode':
               return "Kode Instansi";
               break;
           case 'init':
               return "Inisial";
               break;
           case 'name':
               return "Nama";
               break;
           case 'limit':
               return "Limit";
               break;
           case 'discount':
               return "Diskon";
               break;
           case 'tempo':
               return "Jatuh Tempo (Hari)";
               break;
           case 'lastupdated':
               return "Last Updated";
               break;
           case 'address':
               return "Alamat";
               break;
           case 'city':
               return "Kota";
               break;
           case 'phone':
               return "Phone";
               break;
           case 'fax':
               return "Fax";
               break;
           case 'cp':
               return "CP";
               break;
           case 'joindate':
               return "Tgl Gabung";
               break;
           case 'expdate':
               return "Tgl Berakhir";
               break;
           case 'marginobat':
               return "Margin Obat";
               break;
           case 'markuptindakan':
               return "Markup Tindakan";
               break;
           case 'markupobat':
               return "Markup Obat";
               break;
           case 'markuplab':
               return "Markup Lab";
               break;
           case 'markuprad':
               return "Markup Rad";
               break;
           case 'admpolitype':
               return "Adm Poli Type";
               break;
           case 'adminaptype':
               return "Adm Inap Type";
               break;
           case 'admpolibaru':
               return "Adm Poli Baru";
               break;
           case 'admpolilama':
               return "Adm Poli Lama";
               break;
           case 'adminap':
               return "Adm Inap";
               break;
           case 'marginpma':
               return "Margin PMA";
               break;
           case 'withpma':
               return "With PMA";
               break;
           case 'policy':
               return "Kebijakan";
               break;
           case 'itemtype':
               return "Item Type";
               break;
           case 'deleted':
               return "Deleted";
               break;
           case 'asuransi':
               return "Asuransi";
               break;
           case 'forminternal':
               return "Form Internal";
               break;
           case 'vacc':
               return "V Acc";
               break;
           case 'extcode':
               return "Ext Code";
               break;
           case 'umum':
               return "Umum";
               break;
           case 'autoshow':
               return "Auto Show";
               break;
           case 'bpjs':
               return "BPJS";
               break;
           case 'caracode':
               return "Cara Code";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_tbinstansi_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_tbinstansi_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_tbinstansi_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_tbinstansi_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'instcode' == $filtro)
        $this->ValidateField_instcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'init' == $filtro)
        $this->ValidateField_init($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'name' == $filtro)
        $this->ValidateField_name($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'limit' == $filtro)
        $this->ValidateField_limit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'discount' == $filtro)
        $this->ValidateField_discount($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tempo' == $filtro)
        $this->ValidateField_tempo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lastupdated' == $filtro)
        $this->ValidateField_lastupdated($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'address' == $filtro)
        $this->ValidateField_address($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'city' == $filtro)
        $this->ValidateField_city($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'phone' == $filtro)
        $this->ValidateField_phone($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fax' == $filtro)
        $this->ValidateField_fax($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cp' == $filtro)
        $this->ValidateField_cp($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'joindate' == $filtro)
        $this->ValidateField_joindate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'expdate' == $filtro)
        $this->ValidateField_expdate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'marginobat' == $filtro)
        $this->ValidateField_marginobat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'markuptindakan' == $filtro)
        $this->ValidateField_markuptindakan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'markupobat' == $filtro)
        $this->ValidateField_markupobat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'markuplab' == $filtro)
        $this->ValidateField_markuplab($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'markuprad' == $filtro)
        $this->ValidateField_markuprad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'admpolitype' == $filtro)
        $this->ValidateField_admpolitype($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'adminaptype' == $filtro)
        $this->ValidateField_adminaptype($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'admpolibaru' == $filtro)
        $this->ValidateField_admpolibaru($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'admpolilama' == $filtro)
        $this->ValidateField_admpolilama($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'adminap' == $filtro)
        $this->ValidateField_adminap($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'marginpma' == $filtro)
        $this->ValidateField_marginpma($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'withpma' == $filtro)
        $this->ValidateField_withpma($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'policy' == $filtro)
        $this->ValidateField_policy($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_instcode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['php_cmp_required']['instcode']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['php_cmp_required']['instcode'] == "on")) 
      { 
          if ($this->instcode == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Kode Instansi" ; 
              if (!isset($Campos_Erros['instcode']))
              {
                  $Campos_Erros['instcode'] = array();
              }
              $Campos_Erros['instcode'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['instcode']) || !is_array($this->NM_ajax_info['errList']['instcode']))
                  {
                      $this->NM_ajax_info['errList']['instcode'] = array();
                  }
                  $this->NM_ajax_info['errList']['instcode'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->instcode) > 9) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Instansi " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 9 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['instcode']))
              {
                  $Campos_Erros['instcode'] = array();
              }
              $Campos_Erros['instcode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 9 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['instcode']) || !is_array($this->NM_ajax_info['errList']['instcode']))
              {
                  $this->NM_ajax_info['errList']['instcode'] = array();
              }
              $this->NM_ajax_info['errList']['instcode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 9 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'instcode';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_instcode

    function ValidateField_init(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->init) > 9) 
          { 
              $hasError = true;
              $Campos_Crit .= "Inisial " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 9 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['init']))
              {
                  $Campos_Erros['init'] = array();
              }
              $Campos_Erros['init'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 9 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['init']) || !is_array($this->NM_ajax_info['errList']['init']))
              {
                  $this->NM_ajax_info['errList']['init'] = array();
              }
              $this->NM_ajax_info['errList']['init'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 9 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'init';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_init

    function ValidateField_name(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->name) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nama " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['name']))
              {
                  $Campos_Erros['name'] = array();
              }
              $Campos_Erros['name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['name']) || !is_array($this->NM_ajax_info['errList']['name']))
              {
                  $this->NM_ajax_info['errList']['name'] = array();
              }
              $this->NM_ajax_info['errList']['name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'name';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_name

    function ValidateField_limit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->limit === "" || is_null($this->limit))  
      { 
          $this->limit = 0;
          $this->sc_force_zero[] = 'limit';
      } 
      if (!empty($this->field_config['limit']['symbol_dec']))
      {
          $this->sc_remove_currency($this->limit, $this->field_config['limit']['symbol_dec'], $this->field_config['limit']['symbol_grp'], $this->field_config['limit']['symbol_mon']); 
          nm_limpa_valor($this->limit, $this->field_config['limit']['symbol_dec'], $this->field_config['limit']['symbol_grp']) ; 
          if ('.' == substr($this->limit, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->limit, 1)))
              {
                  $this->limit = '';
              }
              else
              {
                  $this->limit = '0' . $this->limit;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->limit != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->limit) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Limit: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['limit']))
                  {
                      $Campos_Erros['limit'] = array();
                  }
                  $Campos_Erros['limit'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['limit']) || !is_array($this->NM_ajax_info['errList']['limit']))
                  {
                      $this->NM_ajax_info['errList']['limit'] = array();
                  }
                  $this->NM_ajax_info['errList']['limit'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->limit, 18, 0, -0, 1.0E+18, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Limit; " ; 
                  if (!isset($Campos_Erros['limit']))
                  {
                      $Campos_Erros['limit'] = array();
                  }
                  $Campos_Erros['limit'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['limit']) || !is_array($this->NM_ajax_info['errList']['limit']))
                  {
                      $this->NM_ajax_info['errList']['limit'] = array();
                  }
                  $this->NM_ajax_info['errList']['limit'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'limit';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_limit

    function ValidateField_discount(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->discount === "" || is_null($this->discount))  
      { 
          $this->discount = 0;
          $this->sc_force_zero[] = 'discount';
      } 
      nm_limpa_numero($this->discount, $this->field_config['discount']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->discount != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->discount) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Diskon: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['discount']))
                  {
                      $Campos_Erros['discount'] = array();
                  }
                  $Campos_Erros['discount'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['discount']) || !is_array($this->NM_ajax_info['errList']['discount']))
                  {
                      $this->NM_ajax_info['errList']['discount'] = array();
                  }
                  $this->NM_ajax_info['errList']['discount'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->discount, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Diskon; " ; 
                  if (!isset($Campos_Erros['discount']))
                  {
                      $Campos_Erros['discount'] = array();
                  }
                  $Campos_Erros['discount'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['discount']) || !is_array($this->NM_ajax_info['errList']['discount']))
                  {
                      $this->NM_ajax_info['errList']['discount'] = array();
                  }
                  $this->NM_ajax_info['errList']['discount'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'discount';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_discount

    function ValidateField_tempo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tempo === "" || is_null($this->tempo))  
      { 
          $this->tempo = 0;
          $this->sc_force_zero[] = 'tempo';
      } 
      nm_limpa_numero($this->tempo, $this->field_config['tempo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tempo != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->tempo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Jatuh Tempo (Hari): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tempo']))
                  {
                      $Campos_Erros['tempo'] = array();
                  }
                  $Campos_Erros['tempo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tempo']) || !is_array($this->NM_ajax_info['errList']['tempo']))
                  {
                      $this->NM_ajax_info['errList']['tempo'] = array();
                  }
                  $this->NM_ajax_info['errList']['tempo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tempo, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Jatuh Tempo (Hari); " ; 
                  if (!isset($Campos_Erros['tempo']))
                  {
                      $Campos_Erros['tempo'] = array();
                  }
                  $Campos_Erros['tempo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tempo']) || !is_array($this->NM_ajax_info['errList']['tempo']))
                  {
                      $this->NM_ajax_info['errList']['tempo'] = array();
                  }
                  $this->NM_ajax_info['errList']['tempo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tempo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tempo

    function ValidateField_lastupdated(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->lastupdated, $this->field_config['lastupdated']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['lastupdated']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['lastupdated']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['lastupdated']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['lastupdated']['date_sep']) ; 
          if (trim($this->lastupdated) != "")  
          { 
              if ($teste_validade->Data($this->lastupdated, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Last Updated; " ; 
                  if (!isset($Campos_Erros['lastupdated']))
                  {
                      $Campos_Erros['lastupdated'] = array();
                  }
                  $Campos_Erros['lastupdated'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['lastupdated']) || !is_array($this->NM_ajax_info['errList']['lastupdated']))
                  {
                      $this->NM_ajax_info['errList']['lastupdated'] = array();
                  }
                  $this->NM_ajax_info['errList']['lastupdated'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['lastupdated']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lastupdated';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->lastupdated_hora, $this->field_config['lastupdated_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['lastupdated_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['lastupdated_hora']['time_sep']) ; 
          if (trim($this->lastupdated_hora) != "")  
          { 
              if ($teste_validade->Hora($this->lastupdated_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Last Updated; " ; 
                  if (!isset($Campos_Erros['lastupdated_hora']))
                  {
                      $Campos_Erros['lastupdated_hora'] = array();
                  }
                  $Campos_Erros['lastupdated_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['lastupdated']) || !is_array($this->NM_ajax_info['errList']['lastupdated']))
                  {
                      $this->NM_ajax_info['errList']['lastupdated'] = array();
                  }
                  $this->NM_ajax_info['errList']['lastupdated'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['lastupdated']) && isset($Campos_Erros['lastupdated_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['lastupdated'], $Campos_Erros['lastupdated_hora']);
          if (empty($Campos_Erros['lastupdated_hora']))
          {
              unset($Campos_Erros['lastupdated_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['lastupdated']))
          {
              $this->NM_ajax_info['errList']['lastupdated'] = array_unique($this->NM_ajax_info['errList']['lastupdated']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lastupdated_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_lastupdated_hora

    function ValidateField_address(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->address) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Alamat " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['address']))
              {
                  $Campos_Erros['address'] = array();
              }
              $Campos_Erros['address'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['address']) || !is_array($this->NM_ajax_info['errList']['address']))
              {
                  $this->NM_ajax_info['errList']['address'] = array();
              }
              $this->NM_ajax_info['errList']['address'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'address';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_address

    function ValidateField_city(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->city) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kota " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['city']))
              {
                  $Campos_Erros['city'] = array();
              }
              $Campos_Erros['city'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['city']) || !is_array($this->NM_ajax_info['errList']['city']))
              {
                  $this->NM_ajax_info['errList']['city'] = array();
              }
              $this->NM_ajax_info['errList']['city'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'city';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_city

    function ValidateField_phone(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->phone) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Phone " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['phone']))
              {
                  $Campos_Erros['phone'] = array();
              }
              $Campos_Erros['phone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['phone']) || !is_array($this->NM_ajax_info['errList']['phone']))
              {
                  $this->NM_ajax_info['errList']['phone'] = array();
              }
              $this->NM_ajax_info['errList']['phone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'phone';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_phone

    function ValidateField_fax(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fax) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Fax " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fax']))
              {
                  $Campos_Erros['fax'] = array();
              }
              $Campos_Erros['fax'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fax']) || !is_array($this->NM_ajax_info['errList']['fax']))
              {
                  $this->NM_ajax_info['errList']['fax'] = array();
              }
              $this->NM_ajax_info['errList']['fax'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fax';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fax

    function ValidateField_cp(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cp) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "CP " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cp']))
              {
                  $Campos_Erros['cp'] = array();
              }
              $Campos_Erros['cp'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cp']) || !is_array($this->NM_ajax_info['errList']['cp']))
              {
                  $this->NM_ajax_info['errList']['cp'] = array();
              }
              $this->NM_ajax_info['errList']['cp'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cp';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cp

    function ValidateField_joindate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->joindate, $this->field_config['joindate']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['joindate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['joindate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['joindate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['joindate']['date_sep']) ; 
          if (trim($this->joindate) != "")  
          { 
              if ($teste_validade->Data($this->joindate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tgl Gabung; " ; 
                  if (!isset($Campos_Erros['joindate']))
                  {
                      $Campos_Erros['joindate'] = array();
                  }
                  $Campos_Erros['joindate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['joindate']) || !is_array($this->NM_ajax_info['errList']['joindate']))
                  {
                      $this->NM_ajax_info['errList']['joindate'] = array();
                  }
                  $this->NM_ajax_info['errList']['joindate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['joindate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'joindate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->joindate_hora, $this->field_config['joindate_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['joindate_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['joindate_hora']['time_sep']) ; 
          if (trim($this->joindate_hora) != "")  
          { 
              if ($teste_validade->Hora($this->joindate_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tgl Gabung; " ; 
                  if (!isset($Campos_Erros['joindate_hora']))
                  {
                      $Campos_Erros['joindate_hora'] = array();
                  }
                  $Campos_Erros['joindate_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['joindate']) || !is_array($this->NM_ajax_info['errList']['joindate']))
                  {
                      $this->NM_ajax_info['errList']['joindate'] = array();
                  }
                  $this->NM_ajax_info['errList']['joindate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['joindate']) && isset($Campos_Erros['joindate_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['joindate'], $Campos_Erros['joindate_hora']);
          if (empty($Campos_Erros['joindate_hora']))
          {
              unset($Campos_Erros['joindate_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['joindate']))
          {
              $this->NM_ajax_info['errList']['joindate'] = array_unique($this->NM_ajax_info['errList']['joindate']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'joindate_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_joindate_hora

    function ValidateField_expdate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->expdate, $this->field_config['expdate']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['expdate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['expdate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['expdate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['expdate']['date_sep']) ; 
          if (trim($this->expdate) != "")  
          { 
              if ($teste_validade->Data($this->expdate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tgl Berakhir; " ; 
                  if (!isset($Campos_Erros['expdate']))
                  {
                      $Campos_Erros['expdate'] = array();
                  }
                  $Campos_Erros['expdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['expdate']) || !is_array($this->NM_ajax_info['errList']['expdate']))
                  {
                      $this->NM_ajax_info['errList']['expdate'] = array();
                  }
                  $this->NM_ajax_info['errList']['expdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['expdate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'expdate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->expdate_hora, $this->field_config['expdate_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['expdate_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['expdate_hora']['time_sep']) ; 
          if (trim($this->expdate_hora) != "")  
          { 
              if ($teste_validade->Hora($this->expdate_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tgl Berakhir; " ; 
                  if (!isset($Campos_Erros['expdate_hora']))
                  {
                      $Campos_Erros['expdate_hora'] = array();
                  }
                  $Campos_Erros['expdate_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['expdate']) || !is_array($this->NM_ajax_info['errList']['expdate']))
                  {
                      $this->NM_ajax_info['errList']['expdate'] = array();
                  }
                  $this->NM_ajax_info['errList']['expdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['expdate']) && isset($Campos_Erros['expdate_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['expdate'], $Campos_Erros['expdate_hora']);
          if (empty($Campos_Erros['expdate_hora']))
          {
              unset($Campos_Erros['expdate_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['expdate']))
          {
              $this->NM_ajax_info['errList']['expdate'] = array_unique($this->NM_ajax_info['errList']['expdate']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'expdate_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_expdate_hora

    function ValidateField_marginobat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->marginobat === "" || is_null($this->marginobat))  
      { 
          $this->marginobat = 0;
          $this->sc_force_zero[] = 'marginobat';
      } 
      nm_limpa_numero($this->marginobat, $this->field_config['marginobat']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->marginobat != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->marginobat) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Margin Obat: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['marginobat']))
                  {
                      $Campos_Erros['marginobat'] = array();
                  }
                  $Campos_Erros['marginobat'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['marginobat']) || !is_array($this->NM_ajax_info['errList']['marginobat']))
                  {
                      $this->NM_ajax_info['errList']['marginobat'] = array();
                  }
                  $this->NM_ajax_info['errList']['marginobat'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->marginobat, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Margin Obat; " ; 
                  if (!isset($Campos_Erros['marginobat']))
                  {
                      $Campos_Erros['marginobat'] = array();
                  }
                  $Campos_Erros['marginobat'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['marginobat']) || !is_array($this->NM_ajax_info['errList']['marginobat']))
                  {
                      $this->NM_ajax_info['errList']['marginobat'] = array();
                  }
                  $this->NM_ajax_info['errList']['marginobat'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'marginobat';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_marginobat

    function ValidateField_markuptindakan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->markuptindakan === "" || is_null($this->markuptindakan))  
      { 
          $this->markuptindakan = 0;
          $this->sc_force_zero[] = 'markuptindakan';
      } 
      nm_limpa_numero($this->markuptindakan, $this->field_config['markuptindakan']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->markuptindakan != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->markuptindakan) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Markup Tindakan: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['markuptindakan']))
                  {
                      $Campos_Erros['markuptindakan'] = array();
                  }
                  $Campos_Erros['markuptindakan'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['markuptindakan']) || !is_array($this->NM_ajax_info['errList']['markuptindakan']))
                  {
                      $this->NM_ajax_info['errList']['markuptindakan'] = array();
                  }
                  $this->NM_ajax_info['errList']['markuptindakan'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->markuptindakan, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Markup Tindakan; " ; 
                  if (!isset($Campos_Erros['markuptindakan']))
                  {
                      $Campos_Erros['markuptindakan'] = array();
                  }
                  $Campos_Erros['markuptindakan'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['markuptindakan']) || !is_array($this->NM_ajax_info['errList']['markuptindakan']))
                  {
                      $this->NM_ajax_info['errList']['markuptindakan'] = array();
                  }
                  $this->NM_ajax_info['errList']['markuptindakan'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'markuptindakan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_markuptindakan

    function ValidateField_markupobat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->markupobat === "" || is_null($this->markupobat))  
      { 
          $this->markupobat = 0;
          $this->sc_force_zero[] = 'markupobat';
      } 
      nm_limpa_numero($this->markupobat, $this->field_config['markupobat']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->markupobat != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->markupobat) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Markup Obat: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['markupobat']))
                  {
                      $Campos_Erros['markupobat'] = array();
                  }
                  $Campos_Erros['markupobat'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['markupobat']) || !is_array($this->NM_ajax_info['errList']['markupobat']))
                  {
                      $this->NM_ajax_info['errList']['markupobat'] = array();
                  }
                  $this->NM_ajax_info['errList']['markupobat'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->markupobat, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Markup Obat; " ; 
                  if (!isset($Campos_Erros['markupobat']))
                  {
                      $Campos_Erros['markupobat'] = array();
                  }
                  $Campos_Erros['markupobat'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['markupobat']) || !is_array($this->NM_ajax_info['errList']['markupobat']))
                  {
                      $this->NM_ajax_info['errList']['markupobat'] = array();
                  }
                  $this->NM_ajax_info['errList']['markupobat'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'markupobat';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_markupobat

    function ValidateField_markuplab(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->markuplab === "" || is_null($this->markuplab))  
      { 
          $this->markuplab = 0;
          $this->sc_force_zero[] = 'markuplab';
      } 
      nm_limpa_numero($this->markuplab, $this->field_config['markuplab']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->markuplab != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->markuplab) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Markup Lab: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['markuplab']))
                  {
                      $Campos_Erros['markuplab'] = array();
                  }
                  $Campos_Erros['markuplab'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['markuplab']) || !is_array($this->NM_ajax_info['errList']['markuplab']))
                  {
                      $this->NM_ajax_info['errList']['markuplab'] = array();
                  }
                  $this->NM_ajax_info['errList']['markuplab'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->markuplab, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Markup Lab; " ; 
                  if (!isset($Campos_Erros['markuplab']))
                  {
                      $Campos_Erros['markuplab'] = array();
                  }
                  $Campos_Erros['markuplab'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['markuplab']) || !is_array($this->NM_ajax_info['errList']['markuplab']))
                  {
                      $this->NM_ajax_info['errList']['markuplab'] = array();
                  }
                  $this->NM_ajax_info['errList']['markuplab'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'markuplab';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_markuplab

    function ValidateField_markuprad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->markuprad === "" || is_null($this->markuprad))  
      { 
          $this->markuprad = 0;
          $this->sc_force_zero[] = 'markuprad';
      } 
      nm_limpa_numero($this->markuprad, $this->field_config['markuprad']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->markuprad != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->markuprad) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Markup Rad: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['markuprad']))
                  {
                      $Campos_Erros['markuprad'] = array();
                  }
                  $Campos_Erros['markuprad'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['markuprad']) || !is_array($this->NM_ajax_info['errList']['markuprad']))
                  {
                      $this->NM_ajax_info['errList']['markuprad'] = array();
                  }
                  $this->NM_ajax_info['errList']['markuprad'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->markuprad, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Markup Rad; " ; 
                  if (!isset($Campos_Erros['markuprad']))
                  {
                      $Campos_Erros['markuprad'] = array();
                  }
                  $Campos_Erros['markuprad'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['markuprad']) || !is_array($this->NM_ajax_info['errList']['markuprad']))
                  {
                      $this->NM_ajax_info['errList']['markuprad'] = array();
                  }
                  $this->NM_ajax_info['errList']['markuprad'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'markuprad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_markuprad

    function ValidateField_admpolitype(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->admpolitype === "" || is_null($this->admpolitype))  
      { 
          $this->admpolitype = 0;
          $this->sc_force_zero[] = 'admpolitype';
      } 
      nm_limpa_numero($this->admpolitype, $this->field_config['admpolitype']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->admpolitype != '')  
          { 
              $iTestSize = 3;
              if (strlen($this->admpolitype) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Adm Poli Type: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['admpolitype']))
                  {
                      $Campos_Erros['admpolitype'] = array();
                  }
                  $Campos_Erros['admpolitype'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['admpolitype']) || !is_array($this->NM_ajax_info['errList']['admpolitype']))
                  {
                      $this->NM_ajax_info['errList']['admpolitype'] = array();
                  }
                  $this->NM_ajax_info['errList']['admpolitype'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->admpolitype, 3, 0, -0, 999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Adm Poli Type; " ; 
                  if (!isset($Campos_Erros['admpolitype']))
                  {
                      $Campos_Erros['admpolitype'] = array();
                  }
                  $Campos_Erros['admpolitype'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['admpolitype']) || !is_array($this->NM_ajax_info['errList']['admpolitype']))
                  {
                      $this->NM_ajax_info['errList']['admpolitype'] = array();
                  }
                  $this->NM_ajax_info['errList']['admpolitype'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'admpolitype';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_admpolitype

    function ValidateField_adminaptype(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->adminaptype === "" || is_null($this->adminaptype))  
      { 
          $this->adminaptype = 0;
          $this->sc_force_zero[] = 'adminaptype';
      } 
      nm_limpa_numero($this->adminaptype, $this->field_config['adminaptype']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->adminaptype != '')  
          { 
              $iTestSize = 3;
              if (strlen($this->adminaptype) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Adm Inap Type: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['adminaptype']))
                  {
                      $Campos_Erros['adminaptype'] = array();
                  }
                  $Campos_Erros['adminaptype'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['adminaptype']) || !is_array($this->NM_ajax_info['errList']['adminaptype']))
                  {
                      $this->NM_ajax_info['errList']['adminaptype'] = array();
                  }
                  $this->NM_ajax_info['errList']['adminaptype'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->adminaptype, 3, 0, -0, 999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Adm Inap Type; " ; 
                  if (!isset($Campos_Erros['adminaptype']))
                  {
                      $Campos_Erros['adminaptype'] = array();
                  }
                  $Campos_Erros['adminaptype'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['adminaptype']) || !is_array($this->NM_ajax_info['errList']['adminaptype']))
                  {
                      $this->NM_ajax_info['errList']['adminaptype'] = array();
                  }
                  $this->NM_ajax_info['errList']['adminaptype'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'adminaptype';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_adminaptype

    function ValidateField_admpolibaru(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->admpolibaru === "" || is_null($this->admpolibaru))  
      { 
          $this->admpolibaru = 0;
          $this->sc_force_zero[] = 'admpolibaru';
      } 
      nm_limpa_numero($this->admpolibaru, $this->field_config['admpolibaru']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->admpolibaru != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->admpolibaru) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Adm Poli Baru: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['admpolibaru']))
                  {
                      $Campos_Erros['admpolibaru'] = array();
                  }
                  $Campos_Erros['admpolibaru'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['admpolibaru']) || !is_array($this->NM_ajax_info['errList']['admpolibaru']))
                  {
                      $this->NM_ajax_info['errList']['admpolibaru'] = array();
                  }
                  $this->NM_ajax_info['errList']['admpolibaru'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->admpolibaru, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Adm Poli Baru; " ; 
                  if (!isset($Campos_Erros['admpolibaru']))
                  {
                      $Campos_Erros['admpolibaru'] = array();
                  }
                  $Campos_Erros['admpolibaru'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['admpolibaru']) || !is_array($this->NM_ajax_info['errList']['admpolibaru']))
                  {
                      $this->NM_ajax_info['errList']['admpolibaru'] = array();
                  }
                  $this->NM_ajax_info['errList']['admpolibaru'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'admpolibaru';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_admpolibaru

    function ValidateField_admpolilama(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->admpolilama === "" || is_null($this->admpolilama))  
      { 
          $this->admpolilama = 0;
          $this->sc_force_zero[] = 'admpolilama';
      } 
      nm_limpa_numero($this->admpolilama, $this->field_config['admpolilama']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->admpolilama != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->admpolilama) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Adm Poli Lama: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['admpolilama']))
                  {
                      $Campos_Erros['admpolilama'] = array();
                  }
                  $Campos_Erros['admpolilama'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['admpolilama']) || !is_array($this->NM_ajax_info['errList']['admpolilama']))
                  {
                      $this->NM_ajax_info['errList']['admpolilama'] = array();
                  }
                  $this->NM_ajax_info['errList']['admpolilama'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->admpolilama, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Adm Poli Lama; " ; 
                  if (!isset($Campos_Erros['admpolilama']))
                  {
                      $Campos_Erros['admpolilama'] = array();
                  }
                  $Campos_Erros['admpolilama'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['admpolilama']) || !is_array($this->NM_ajax_info['errList']['admpolilama']))
                  {
                      $this->NM_ajax_info['errList']['admpolilama'] = array();
                  }
                  $this->NM_ajax_info['errList']['admpolilama'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'admpolilama';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_admpolilama

    function ValidateField_adminap(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->adminap === "" || is_null($this->adminap))  
      { 
          $this->adminap = 0;
          $this->sc_force_zero[] = 'adminap';
      } 
      nm_limpa_numero($this->adminap, $this->field_config['adminap']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->adminap != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->adminap) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Adm Inap: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['adminap']))
                  {
                      $Campos_Erros['adminap'] = array();
                  }
                  $Campos_Erros['adminap'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['adminap']) || !is_array($this->NM_ajax_info['errList']['adminap']))
                  {
                      $this->NM_ajax_info['errList']['adminap'] = array();
                  }
                  $this->NM_ajax_info['errList']['adminap'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->adminap, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Adm Inap; " ; 
                  if (!isset($Campos_Erros['adminap']))
                  {
                      $Campos_Erros['adminap'] = array();
                  }
                  $Campos_Erros['adminap'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['adminap']) || !is_array($this->NM_ajax_info['errList']['adminap']))
                  {
                      $this->NM_ajax_info['errList']['adminap'] = array();
                  }
                  $this->NM_ajax_info['errList']['adminap'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'adminap';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_adminap

    function ValidateField_marginpma(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->marginpma === "" || is_null($this->marginpma))  
      { 
          $this->marginpma = 0;
          $this->sc_force_zero[] = 'marginpma';
      } 
      nm_limpa_numero($this->marginpma, $this->field_config['marginpma']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->marginpma != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->marginpma) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Margin PMA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['marginpma']))
                  {
                      $Campos_Erros['marginpma'] = array();
                  }
                  $Campos_Erros['marginpma'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['marginpma']) || !is_array($this->NM_ajax_info['errList']['marginpma']))
                  {
                      $this->NM_ajax_info['errList']['marginpma'] = array();
                  }
                  $this->NM_ajax_info['errList']['marginpma'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->marginpma, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Margin PMA; " ; 
                  if (!isset($Campos_Erros['marginpma']))
                  {
                      $Campos_Erros['marginpma'] = array();
                  }
                  $Campos_Erros['marginpma'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['marginpma']) || !is_array($this->NM_ajax_info['errList']['marginpma']))
                  {
                      $this->NM_ajax_info['errList']['marginpma'] = array();
                  }
                  $this->NM_ajax_info['errList']['marginpma'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'marginpma';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_marginpma

    function ValidateField_withpma(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->withpma === "" || is_null($this->withpma))  
      { 
          $this->withpma = 0;
          $this->sc_force_zero[] = 'withpma';
      } 
      nm_limpa_numero($this->withpma, $this->field_config['withpma']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->withpma != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->withpma) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "With PMA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['withpma']))
                  {
                      $Campos_Erros['withpma'] = array();
                  }
                  $Campos_Erros['withpma'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['withpma']) || !is_array($this->NM_ajax_info['errList']['withpma']))
                  {
                      $this->NM_ajax_info['errList']['withpma'] = array();
                  }
                  $this->NM_ajax_info['errList']['withpma'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->withpma, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "With PMA; " ; 
                  if (!isset($Campos_Erros['withpma']))
                  {
                      $Campos_Erros['withpma'] = array();
                  }
                  $Campos_Erros['withpma'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['withpma']) || !is_array($this->NM_ajax_info['errList']['withpma']))
                  {
                      $this->NM_ajax_info['errList']['withpma'] = array();
                  }
                  $this->NM_ajax_info['errList']['withpma'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'withpma';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_withpma

    function ValidateField_policy(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->policy) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kebijakan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['policy']))
              {
                  $Campos_Erros['policy'] = array();
              }
              $Campos_Erros['policy'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['policy']) || !is_array($this->NM_ajax_info['errList']['policy']))
              {
                  $this->NM_ajax_info['errList']['policy'] = array();
              }
              $this->NM_ajax_info['errList']['policy'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'policy';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_policy

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['instcode'] = $this->instcode;
    $this->nmgp_dados_form['init'] = $this->init;
    $this->nmgp_dados_form['name'] = $this->name;
    $this->nmgp_dados_form['limit'] = $this->limit;
    $this->nmgp_dados_form['discount'] = $this->discount;
    $this->nmgp_dados_form['tempo'] = $this->tempo;
    $this->nmgp_dados_form['lastupdated'] = (strlen(trim($this->lastupdated)) > 19) ? str_replace(".", ":", $this->lastupdated) : trim($this->lastupdated);
    $this->nmgp_dados_form['address'] = $this->address;
    $this->nmgp_dados_form['city'] = $this->city;
    $this->nmgp_dados_form['phone'] = $this->phone;
    $this->nmgp_dados_form['fax'] = $this->fax;
    $this->nmgp_dados_form['cp'] = $this->cp;
    $this->nmgp_dados_form['joindate'] = (strlen(trim($this->joindate)) > 19) ? str_replace(".", ":", $this->joindate) : trim($this->joindate);
    $this->nmgp_dados_form['expdate'] = (strlen(trim($this->expdate)) > 19) ? str_replace(".", ":", $this->expdate) : trim($this->expdate);
    $this->nmgp_dados_form['marginobat'] = $this->marginobat;
    $this->nmgp_dados_form['markuptindakan'] = $this->markuptindakan;
    $this->nmgp_dados_form['markupobat'] = $this->markupobat;
    $this->nmgp_dados_form['markuplab'] = $this->markuplab;
    $this->nmgp_dados_form['markuprad'] = $this->markuprad;
    $this->nmgp_dados_form['admpolitype'] = $this->admpolitype;
    $this->nmgp_dados_form['adminaptype'] = $this->adminaptype;
    $this->nmgp_dados_form['admpolibaru'] = $this->admpolibaru;
    $this->nmgp_dados_form['admpolilama'] = $this->admpolilama;
    $this->nmgp_dados_form['adminap'] = $this->adminap;
    $this->nmgp_dados_form['marginpma'] = $this->marginpma;
    $this->nmgp_dados_form['withpma'] = $this->withpma;
    $this->nmgp_dados_form['policy'] = $this->policy;
    $this->nmgp_dados_form['itemtype'] = $this->itemtype;
    $this->nmgp_dados_form['deleted'] = $this->deleted;
    $this->nmgp_dados_form['asuransi'] = $this->asuransi;
    $this->nmgp_dados_form['forminternal'] = $this->forminternal;
    $this->nmgp_dados_form['vacc'] = $this->vacc;
    $this->nmgp_dados_form['extcode'] = $this->extcode;
    $this->nmgp_dados_form['umum'] = $this->umum;
    $this->nmgp_dados_form['autoshow'] = $this->autoshow;
    $this->nmgp_dados_form['bpjs'] = $this->bpjs;
    $this->nmgp_dados_form['caracode'] = $this->caracode;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['limit'] = $this->limit;
      if (!empty($this->field_config['limit']['symbol_dec']))
      {
         $this->sc_remove_currency($this->limit, $this->field_config['limit']['symbol_dec'], $this->field_config['limit']['symbol_grp'], $this->field_config['limit']['symbol_mon']);
         nm_limpa_valor($this->limit, $this->field_config['limit']['symbol_dec'], $this->field_config['limit']['symbol_grp']);
      }
      $this->Before_unformat['discount'] = $this->discount;
      nm_limpa_numero($this->discount, $this->field_config['discount']['symbol_grp']) ; 
      $this->Before_unformat['tempo'] = $this->tempo;
      nm_limpa_numero($this->tempo, $this->field_config['tempo']['symbol_grp']) ; 
      $this->Before_unformat['lastupdated'] = $this->lastupdated;
      nm_limpa_data($this->lastupdated, $this->field_config['lastupdated']['date_sep']) ; 
      nm_limpa_hora($this->lastupdated_hora, $this->field_config['lastupdated']['time_sep']) ; 
      $this->Before_unformat['joindate'] = $this->joindate;
      nm_limpa_data($this->joindate, $this->field_config['joindate']['date_sep']) ; 
      nm_limpa_hora($this->joindate_hora, $this->field_config['joindate']['time_sep']) ; 
      $this->Before_unformat['expdate'] = $this->expdate;
      nm_limpa_data($this->expdate, $this->field_config['expdate']['date_sep']) ; 
      nm_limpa_hora($this->expdate_hora, $this->field_config['expdate']['time_sep']) ; 
      $this->Before_unformat['marginobat'] = $this->marginobat;
      nm_limpa_numero($this->marginobat, $this->field_config['marginobat']['symbol_grp']) ; 
      $this->Before_unformat['markuptindakan'] = $this->markuptindakan;
      nm_limpa_numero($this->markuptindakan, $this->field_config['markuptindakan']['symbol_grp']) ; 
      $this->Before_unformat['markupobat'] = $this->markupobat;
      nm_limpa_numero($this->markupobat, $this->field_config['markupobat']['symbol_grp']) ; 
      $this->Before_unformat['markuplab'] = $this->markuplab;
      nm_limpa_numero($this->markuplab, $this->field_config['markuplab']['symbol_grp']) ; 
      $this->Before_unformat['markuprad'] = $this->markuprad;
      nm_limpa_numero($this->markuprad, $this->field_config['markuprad']['symbol_grp']) ; 
      $this->Before_unformat['admpolitype'] = $this->admpolitype;
      nm_limpa_numero($this->admpolitype, $this->field_config['admpolitype']['symbol_grp']) ; 
      $this->Before_unformat['adminaptype'] = $this->adminaptype;
      nm_limpa_numero($this->adminaptype, $this->field_config['adminaptype']['symbol_grp']) ; 
      $this->Before_unformat['admpolibaru'] = $this->admpolibaru;
      nm_limpa_numero($this->admpolibaru, $this->field_config['admpolibaru']['symbol_grp']) ; 
      $this->Before_unformat['admpolilama'] = $this->admpolilama;
      nm_limpa_numero($this->admpolilama, $this->field_config['admpolilama']['symbol_grp']) ; 
      $this->Before_unformat['adminap'] = $this->adminap;
      nm_limpa_numero($this->adminap, $this->field_config['adminap']['symbol_grp']) ; 
      $this->Before_unformat['marginpma'] = $this->marginpma;
      nm_limpa_numero($this->marginpma, $this->field_config['marginpma']['symbol_grp']) ; 
      $this->Before_unformat['withpma'] = $this->withpma;
      nm_limpa_numero($this->withpma, $this->field_config['withpma']['symbol_grp']) ; 
      $this->Before_unformat['itemtype'] = $this->itemtype;
      nm_limpa_numero($this->itemtype, $this->field_config['itemtype']['symbol_grp']) ; 
      $this->Before_unformat['deleted'] = $this->deleted;
      nm_limpa_numero($this->deleted, $this->field_config['deleted']['symbol_grp']) ; 
      $this->Before_unformat['asuransi'] = $this->asuransi;
      nm_limpa_numero($this->asuransi, $this->field_config['asuransi']['symbol_grp']) ; 
      $this->Before_unformat['forminternal'] = $this->forminternal;
      nm_limpa_numero($this->forminternal, $this->field_config['forminternal']['symbol_grp']) ; 
      $this->Before_unformat['umum'] = $this->umum;
      nm_limpa_numero($this->umum, $this->field_config['umum']['symbol_grp']) ; 
      $this->Before_unformat['autoshow'] = $this->autoshow;
      nm_limpa_numero($this->autoshow, $this->field_config['autoshow']['symbol_grp']) ; 
      $this->Before_unformat['bpjs'] = $this->bpjs;
      nm_limpa_numero($this->bpjs, $this->field_config['bpjs']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "limit")
      {
          if (!empty($this->field_config['limit']['symbol_dec']))
          {
             $this->sc_remove_currency($this->limit, $this->field_config['limit']['symbol_dec'], $this->field_config['limit']['symbol_grp'], $this->field_config['limit']['symbol_mon']);
             nm_limpa_valor($this->limit, $this->field_config['limit']['symbol_dec'], $this->field_config['limit']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "discount")
      {
          nm_limpa_numero($this->discount, $this->field_config['discount']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tempo")
      {
          nm_limpa_numero($this->tempo, $this->field_config['tempo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "marginobat")
      {
          nm_limpa_numero($this->marginobat, $this->field_config['marginobat']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "markuptindakan")
      {
          nm_limpa_numero($this->markuptindakan, $this->field_config['markuptindakan']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "markupobat")
      {
          nm_limpa_numero($this->markupobat, $this->field_config['markupobat']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "markuplab")
      {
          nm_limpa_numero($this->markuplab, $this->field_config['markuplab']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "markuprad")
      {
          nm_limpa_numero($this->markuprad, $this->field_config['markuprad']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "admpolitype")
      {
          nm_limpa_numero($this->admpolitype, $this->field_config['admpolitype']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "adminaptype")
      {
          nm_limpa_numero($this->adminaptype, $this->field_config['adminaptype']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "admpolibaru")
      {
          nm_limpa_numero($this->admpolibaru, $this->field_config['admpolibaru']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "admpolilama")
      {
          nm_limpa_numero($this->admpolilama, $this->field_config['admpolilama']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "adminap")
      {
          nm_limpa_numero($this->adminap, $this->field_config['adminap']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "marginpma")
      {
          nm_limpa_numero($this->marginpma, $this->field_config['marginpma']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "withpma")
      {
          nm_limpa_numero($this->withpma, $this->field_config['withpma']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "itemtype")
      {
          nm_limpa_numero($this->itemtype, $this->field_config['itemtype']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "deleted")
      {
          nm_limpa_numero($this->deleted, $this->field_config['deleted']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "asuransi")
      {
          nm_limpa_numero($this->asuransi, $this->field_config['asuransi']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "forminternal")
      {
          nm_limpa_numero($this->forminternal, $this->field_config['forminternal']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "umum")
      {
          nm_limpa_numero($this->umum, $this->field_config['umum']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "autoshow")
      {
          nm_limpa_numero($this->autoshow, $this->field_config['autoshow']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "bpjs")
      {
          nm_limpa_numero($this->bpjs, $this->field_config['bpjs']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->limit || (!empty($format_fields) && isset($format_fields['limit'])))
      {
          nmgp_Form_Num_Val($this->limit, $this->field_config['limit']['symbol_grp'], $this->field_config['limit']['symbol_dec'], "0", "S", $this->field_config['limit']['format_neg'], "", "", "-", $this->field_config['limit']['symbol_fmt']) ; 
      }
      if ('' !== $this->discount || (!empty($format_fields) && isset($format_fields['discount'])))
      {
          nmgp_Form_Num_Val($this->discount, $this->field_config['discount']['symbol_grp'], $this->field_config['discount']['symbol_dec'], "0", "S", $this->field_config['discount']['format_neg'], "", "", "-", $this->field_config['discount']['symbol_fmt']) ; 
      }
      if ('' !== $this->tempo || (!empty($format_fields) && isset($format_fields['tempo'])))
      {
          nmgp_Form_Num_Val($this->tempo, $this->field_config['tempo']['symbol_grp'], $this->field_config['tempo']['symbol_dec'], "0", "S", $this->field_config['tempo']['format_neg'], "", "", "-", $this->field_config['tempo']['symbol_fmt']) ; 
      }
      if ((!empty($this->lastupdated) && 'null' != $this->lastupdated) || (!empty($format_fields) && isset($format_fields['lastupdated'])))
      {
          $nm_separa_data = strpos($this->field_config['lastupdated']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['lastupdated']['date_format'];
          $this->field_config['lastupdated']['date_format'] = substr($this->field_config['lastupdated']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->lastupdated, " ") ; 
          $this->lastupdated_hora = substr($this->lastupdated, $separador + 1) ; 
          $this->lastupdated = substr($this->lastupdated, 0, $separador) ; 
          nm_volta_data($this->lastupdated, $this->field_config['lastupdated']['date_format']) ; 
          nmgp_Form_Datas($this->lastupdated, $this->field_config['lastupdated']['date_format'], $this->field_config['lastupdated']['date_sep']) ;  
          $this->field_config['lastupdated']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->lastupdated_hora, $this->field_config['lastupdated']['date_format']) ; 
          nmgp_Form_Hora($this->lastupdated_hora, $this->field_config['lastupdated']['date_format'], $this->field_config['lastupdated']['time_sep']) ;  
          $this->field_config['lastupdated']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->lastupdated || '' == $this->lastupdated)
      {
          $this->lastupdated_hora = '';
          $this->lastupdated = '';
      }
      if ((!empty($this->joindate) && 'null' != $this->joindate) || (!empty($format_fields) && isset($format_fields['joindate'])))
      {
          $nm_separa_data = strpos($this->field_config['joindate']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['joindate']['date_format'];
          $this->field_config['joindate']['date_format'] = substr($this->field_config['joindate']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->joindate, " ") ; 
          $this->joindate_hora = substr($this->joindate, $separador + 1) ; 
          $this->joindate = substr($this->joindate, 0, $separador) ; 
          nm_volta_data($this->joindate, $this->field_config['joindate']['date_format']) ; 
          nmgp_Form_Datas($this->joindate, $this->field_config['joindate']['date_format'], $this->field_config['joindate']['date_sep']) ;  
          $this->field_config['joindate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->joindate_hora, $this->field_config['joindate']['date_format']) ; 
          nmgp_Form_Hora($this->joindate_hora, $this->field_config['joindate']['date_format'], $this->field_config['joindate']['time_sep']) ;  
          $this->field_config['joindate']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->joindate || '' == $this->joindate)
      {
          $this->joindate_hora = '';
          $this->joindate = '';
      }
      if ((!empty($this->expdate) && 'null' != $this->expdate) || (!empty($format_fields) && isset($format_fields['expdate'])))
      {
          $nm_separa_data = strpos($this->field_config['expdate']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['expdate']['date_format'];
          $this->field_config['expdate']['date_format'] = substr($this->field_config['expdate']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->expdate, " ") ; 
          $this->expdate_hora = substr($this->expdate, $separador + 1) ; 
          $this->expdate = substr($this->expdate, 0, $separador) ; 
          nm_volta_data($this->expdate, $this->field_config['expdate']['date_format']) ; 
          nmgp_Form_Datas($this->expdate, $this->field_config['expdate']['date_format'], $this->field_config['expdate']['date_sep']) ;  
          $this->field_config['expdate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->expdate_hora, $this->field_config['expdate']['date_format']) ; 
          nmgp_Form_Hora($this->expdate_hora, $this->field_config['expdate']['date_format'], $this->field_config['expdate']['time_sep']) ;  
          $this->field_config['expdate']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->expdate || '' == $this->expdate)
      {
          $this->expdate_hora = '';
          $this->expdate = '';
      }
      if ('' !== $this->marginobat || (!empty($format_fields) && isset($format_fields['marginobat'])))
      {
          nmgp_Form_Num_Val($this->marginobat, $this->field_config['marginobat']['symbol_grp'], $this->field_config['marginobat']['symbol_dec'], "0", "S", $this->field_config['marginobat']['format_neg'], "", "", "-", $this->field_config['marginobat']['symbol_fmt']) ; 
      }
      if ('' !== $this->markuptindakan || (!empty($format_fields) && isset($format_fields['markuptindakan'])))
      {
          nmgp_Form_Num_Val($this->markuptindakan, $this->field_config['markuptindakan']['symbol_grp'], $this->field_config['markuptindakan']['symbol_dec'], "0", "S", $this->field_config['markuptindakan']['format_neg'], "", "", "-", $this->field_config['markuptindakan']['symbol_fmt']) ; 
      }
      if ('' !== $this->markupobat || (!empty($format_fields) && isset($format_fields['markupobat'])))
      {
          nmgp_Form_Num_Val($this->markupobat, $this->field_config['markupobat']['symbol_grp'], $this->field_config['markupobat']['symbol_dec'], "0", "S", $this->field_config['markupobat']['format_neg'], "", "", "-", $this->field_config['markupobat']['symbol_fmt']) ; 
      }
      if ('' !== $this->markuplab || (!empty($format_fields) && isset($format_fields['markuplab'])))
      {
          nmgp_Form_Num_Val($this->markuplab, $this->field_config['markuplab']['symbol_grp'], $this->field_config['markuplab']['symbol_dec'], "0", "S", $this->field_config['markuplab']['format_neg'], "", "", "-", $this->field_config['markuplab']['symbol_fmt']) ; 
      }
      if ('' !== $this->markuprad || (!empty($format_fields) && isset($format_fields['markuprad'])))
      {
          nmgp_Form_Num_Val($this->markuprad, $this->field_config['markuprad']['symbol_grp'], $this->field_config['markuprad']['symbol_dec'], "0", "S", $this->field_config['markuprad']['format_neg'], "", "", "-", $this->field_config['markuprad']['symbol_fmt']) ; 
      }
      if ('' !== $this->admpolitype || (!empty($format_fields) && isset($format_fields['admpolitype'])))
      {
          nmgp_Form_Num_Val($this->admpolitype, $this->field_config['admpolitype']['symbol_grp'], $this->field_config['admpolitype']['symbol_dec'], "0", "S", $this->field_config['admpolitype']['format_neg'], "", "", "-", $this->field_config['admpolitype']['symbol_fmt']) ; 
      }
      if ('' !== $this->adminaptype || (!empty($format_fields) && isset($format_fields['adminaptype'])))
      {
          nmgp_Form_Num_Val($this->adminaptype, $this->field_config['adminaptype']['symbol_grp'], $this->field_config['adminaptype']['symbol_dec'], "0", "S", $this->field_config['adminaptype']['format_neg'], "", "", "-", $this->field_config['adminaptype']['symbol_fmt']) ; 
      }
      if ('' !== $this->admpolibaru || (!empty($format_fields) && isset($format_fields['admpolibaru'])))
      {
          nmgp_Form_Num_Val($this->admpolibaru, $this->field_config['admpolibaru']['symbol_grp'], $this->field_config['admpolibaru']['symbol_dec'], "0", "S", $this->field_config['admpolibaru']['format_neg'], "", "", "-", $this->field_config['admpolibaru']['symbol_fmt']) ; 
      }
      if ('' !== $this->admpolilama || (!empty($format_fields) && isset($format_fields['admpolilama'])))
      {
          nmgp_Form_Num_Val($this->admpolilama, $this->field_config['admpolilama']['symbol_grp'], $this->field_config['admpolilama']['symbol_dec'], "0", "S", $this->field_config['admpolilama']['format_neg'], "", "", "-", $this->field_config['admpolilama']['symbol_fmt']) ; 
      }
      if ('' !== $this->adminap || (!empty($format_fields) && isset($format_fields['adminap'])))
      {
          nmgp_Form_Num_Val($this->adminap, $this->field_config['adminap']['symbol_grp'], $this->field_config['adminap']['symbol_dec'], "0", "S", $this->field_config['adminap']['format_neg'], "", "", "-", $this->field_config['adminap']['symbol_fmt']) ; 
      }
      if ('' !== $this->marginpma || (!empty($format_fields) && isset($format_fields['marginpma'])))
      {
          nmgp_Form_Num_Val($this->marginpma, $this->field_config['marginpma']['symbol_grp'], $this->field_config['marginpma']['symbol_dec'], "0", "S", $this->field_config['marginpma']['format_neg'], "", "", "-", $this->field_config['marginpma']['symbol_fmt']) ; 
      }
      if ('' !== $this->withpma || (!empty($format_fields) && isset($format_fields['withpma'])))
      {
          nmgp_Form_Num_Val($this->withpma, $this->field_config['withpma']['symbol_grp'], $this->field_config['withpma']['symbol_dec'], "0", "S", $this->field_config['withpma']['format_neg'], "", "", "-", $this->field_config['withpma']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['lastupdated']['date_format'];
      if ($this->lastupdated != "")  
      { 
          $nm_separa_data = strpos($this->field_config['lastupdated']['date_format'], ";") ;
          $this->field_config['lastupdated']['date_format'] = substr($this->field_config['lastupdated']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->lastupdated, $this->field_config['lastupdated']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->lastupdated = str_replace('-', '', $this->lastupdated);
          }
          $this->field_config['lastupdated']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->lastupdated_hora, $this->field_config['lastupdated']['date_format']) ; 
          if ($this->lastupdated_hora == "" )  
          { 
              $this->lastupdated_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->lastupdated_hora = substr($this->lastupdated_hora, 0, -4) . "." . substr($this->lastupdated_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->lastupdated_hora = substr($this->lastupdated_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->lastupdated_hora = substr($this->lastupdated_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->lastupdated_hora = substr($this->lastupdated_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->lastupdated_hora = substr($this->lastupdated_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->lastupdated_hora = substr($this->lastupdated_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->lastupdated_hora = substr($this->lastupdated_hora, 0, -4);
          }
          if ($this->lastupdated != "")  
          { 
              $this->lastupdated .= " " . $this->lastupdated_hora ; 
          }
      } 
      if ($this->lastupdated == "" && $use_null)  
      { 
          $this->lastupdated = "null" ; 
      } 
      $this->field_config['lastupdated']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['joindate']['date_format'];
      if ($this->joindate != "")  
      { 
          $nm_separa_data = strpos($this->field_config['joindate']['date_format'], ";") ;
          $this->field_config['joindate']['date_format'] = substr($this->field_config['joindate']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->joindate, $this->field_config['joindate']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->joindate = str_replace('-', '', $this->joindate);
          }
          $this->field_config['joindate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->joindate_hora, $this->field_config['joindate']['date_format']) ; 
          if ($this->joindate_hora == "" )  
          { 
              $this->joindate_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->joindate_hora = substr($this->joindate_hora, 0, -4) . "." . substr($this->joindate_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->joindate_hora = substr($this->joindate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->joindate_hora = substr($this->joindate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->joindate_hora = substr($this->joindate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->joindate_hora = substr($this->joindate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->joindate_hora = substr($this->joindate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->joindate_hora = substr($this->joindate_hora, 0, -4);
          }
          if ($this->joindate != "")  
          { 
              $this->joindate .= " " . $this->joindate_hora ; 
          }
      } 
      if ($this->joindate == "" && $use_null)  
      { 
          $this->joindate = "null" ; 
      } 
      $this->field_config['joindate']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['expdate']['date_format'];
      if ($this->expdate != "")  
      { 
          $nm_separa_data = strpos($this->field_config['expdate']['date_format'], ";") ;
          $this->field_config['expdate']['date_format'] = substr($this->field_config['expdate']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->expdate, $this->field_config['expdate']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->expdate = str_replace('-', '', $this->expdate);
          }
          $this->field_config['expdate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->expdate_hora, $this->field_config['expdate']['date_format']) ; 
          if ($this->expdate_hora == "" )  
          { 
              $this->expdate_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->expdate_hora = substr($this->expdate_hora, 0, -4) . "." . substr($this->expdate_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->expdate_hora = substr($this->expdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->expdate_hora = substr($this->expdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->expdate_hora = substr($this->expdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->expdate_hora = substr($this->expdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->expdate_hora = substr($this->expdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->expdate_hora = substr($this->expdate_hora, 0, -4);
          }
          if ($this->expdate != "")  
          { 
              $this->expdate .= " " . $this->expdate_hora ; 
          }
      } 
      if ($this->expdate == "" && $use_null)  
      { 
          $this->expdate = "null" ; 
      } 
      $this->field_config['expdate']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_instcode();
          $this->ajax_return_values_init();
          $this->ajax_return_values_name();
          $this->ajax_return_values_limit();
          $this->ajax_return_values_discount();
          $this->ajax_return_values_tempo();
          $this->ajax_return_values_lastupdated();
          $this->ajax_return_values_address();
          $this->ajax_return_values_city();
          $this->ajax_return_values_phone();
          $this->ajax_return_values_fax();
          $this->ajax_return_values_cp();
          $this->ajax_return_values_joindate();
          $this->ajax_return_values_expdate();
          $this->ajax_return_values_marginobat();
          $this->ajax_return_values_markuptindakan();
          $this->ajax_return_values_markupobat();
          $this->ajax_return_values_markuplab();
          $this->ajax_return_values_markuprad();
          $this->ajax_return_values_admpolitype();
          $this->ajax_return_values_adminaptype();
          $this->ajax_return_values_admpolibaru();
          $this->ajax_return_values_admpolilama();
          $this->ajax_return_values_adminap();
          $this->ajax_return_values_marginpma();
          $this->ajax_return_values_withpma();
          $this->ajax_return_values_policy();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['instcode']['keyVal'] = form_tbinstansi_mob_pack_protect_string($this->nmgp_dados_form['instcode']);
          }
   } // ajax_return_values

          //----- instcode
   function ajax_return_values_instcode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("instcode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->instcode);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['instcode'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- init
   function ajax_return_values_init($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("init", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->init);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['init'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- name
   function ajax_return_values_name($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("name", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->name);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['name'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- limit
   function ajax_return_values_limit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("limit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->limit);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['limit'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- discount
   function ajax_return_values_discount($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("discount", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->discount);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['discount'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tempo
   function ajax_return_values_tempo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tempo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tempo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tempo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- lastupdated
   function ajax_return_values_lastupdated($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lastupdated", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lastupdated);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lastupdated'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->lastupdated . ' ' . $this->lastupdated_hora),
              );
          }
   }

          //----- address
   function ajax_return_values_address($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("address", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->address);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['address'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- city
   function ajax_return_values_city($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("city", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->city);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['city'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- phone
   function ajax_return_values_phone($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("phone", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->phone);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['phone'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fax
   function ajax_return_values_fax($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fax", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fax);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fax'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cp
   function ajax_return_values_cp($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cp", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cp);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cp'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- joindate
   function ajax_return_values_joindate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("joindate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->joindate);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['joindate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->joindate . ' ' . $this->joindate_hora),
              );
          }
   }

          //----- expdate
   function ajax_return_values_expdate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("expdate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->expdate);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['expdate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->expdate . ' ' . $this->expdate_hora),
              );
          }
   }

          //----- marginobat
   function ajax_return_values_marginobat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("marginobat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->marginobat);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['marginobat'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- markuptindakan
   function ajax_return_values_markuptindakan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("markuptindakan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->markuptindakan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['markuptindakan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- markupobat
   function ajax_return_values_markupobat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("markupobat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->markupobat);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['markupobat'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- markuplab
   function ajax_return_values_markuplab($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("markuplab", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->markuplab);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['markuplab'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- markuprad
   function ajax_return_values_markuprad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("markuprad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->markuprad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['markuprad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- admpolitype
   function ajax_return_values_admpolitype($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("admpolitype", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->admpolitype);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['admpolitype'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- adminaptype
   function ajax_return_values_adminaptype($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("adminaptype", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->adminaptype);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['adminaptype'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- admpolibaru
   function ajax_return_values_admpolibaru($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("admpolibaru", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->admpolibaru);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['admpolibaru'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- admpolilama
   function ajax_return_values_admpolilama($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("admpolilama", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->admpolilama);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['admpolilama'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- adminap
   function ajax_return_values_adminap($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("adminap", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->adminap);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['adminap'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- marginpma
   function ajax_return_values_marginpma($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("marginpma", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->marginpma);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['marginpma'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- withpma
   function ajax_return_values_withpma($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("withpma", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->withpma);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['withpma'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- policy
   function ajax_return_values_policy($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("policy", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->policy);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['policy'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->limit = str_replace($sc_parm1, $sc_parm2, $this->limit); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->limit = "'" . $this->limit . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->limit = str_replace("'", "", $this->limit); 
   } 
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }


   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['instcode'] = $this->instcode;
      $NM_val_form['init'] = $this->init;
      $NM_val_form['name'] = $this->name;
      $NM_val_form['limit'] = $this->limit;
      $NM_val_form['discount'] = $this->discount;
      $NM_val_form['tempo'] = $this->tempo;
      $NM_val_form['lastupdated'] = $this->lastupdated;
      $NM_val_form['address'] = $this->address;
      $NM_val_form['city'] = $this->city;
      $NM_val_form['phone'] = $this->phone;
      $NM_val_form['fax'] = $this->fax;
      $NM_val_form['cp'] = $this->cp;
      $NM_val_form['joindate'] = $this->joindate;
      $NM_val_form['expdate'] = $this->expdate;
      $NM_val_form['marginobat'] = $this->marginobat;
      $NM_val_form['markuptindakan'] = $this->markuptindakan;
      $NM_val_form['markupobat'] = $this->markupobat;
      $NM_val_form['markuplab'] = $this->markuplab;
      $NM_val_form['markuprad'] = $this->markuprad;
      $NM_val_form['admpolitype'] = $this->admpolitype;
      $NM_val_form['adminaptype'] = $this->adminaptype;
      $NM_val_form['admpolibaru'] = $this->admpolibaru;
      $NM_val_form['admpolilama'] = $this->admpolilama;
      $NM_val_form['adminap'] = $this->adminap;
      $NM_val_form['marginpma'] = $this->marginpma;
      $NM_val_form['withpma'] = $this->withpma;
      $NM_val_form['policy'] = $this->policy;
      $NM_val_form['itemtype'] = $this->itemtype;
      $NM_val_form['deleted'] = $this->deleted;
      $NM_val_form['asuransi'] = $this->asuransi;
      $NM_val_form['forminternal'] = $this->forminternal;
      $NM_val_form['vacc'] = $this->vacc;
      $NM_val_form['extcode'] = $this->extcode;
      $NM_val_form['umum'] = $this->umum;
      $NM_val_form['autoshow'] = $this->autoshow;
      $NM_val_form['bpjs'] = $this->bpjs;
      $NM_val_form['caracode'] = $this->caracode;
      if ($this->limit === "" || is_null($this->limit))  
      { 
          $this->limit = 0;
          $this->sc_force_zero[] = 'limit';
      } 
      if ($this->discount === "" || is_null($this->discount))  
      { 
          $this->discount = 0;
          $this->sc_force_zero[] = 'discount';
      } 
      if ($this->itemtype === "" || is_null($this->itemtype))  
      { 
          $this->itemtype = 0;
          $this->sc_force_zero[] = 'itemtype';
      } 
      if ($this->deleted === "" || is_null($this->deleted))  
      { 
          $this->deleted = 0;
          $this->sc_force_zero[] = 'deleted';
      } 
      if ($this->tempo === "" || is_null($this->tempo))  
      { 
          $this->tempo = 0;
          $this->sc_force_zero[] = 'tempo';
      } 
      if ($this->asuransi === "" || is_null($this->asuransi))  
      { 
          $this->asuransi = 0;
          $this->sc_force_zero[] = 'asuransi';
      } 
      if ($this->marginobat === "" || is_null($this->marginobat))  
      { 
          $this->marginobat = 0;
          $this->sc_force_zero[] = 'marginobat';
      } 
      if ($this->markuptindakan === "" || is_null($this->markuptindakan))  
      { 
          $this->markuptindakan = 0;
          $this->sc_force_zero[] = 'markuptindakan';
      } 
      if ($this->markupobat === "" || is_null($this->markupobat))  
      { 
          $this->markupobat = 0;
          $this->sc_force_zero[] = 'markupobat';
      } 
      if ($this->markuplab === "" || is_null($this->markuplab))  
      { 
          $this->markuplab = 0;
          $this->sc_force_zero[] = 'markuplab';
      } 
      if ($this->markuprad === "" || is_null($this->markuprad))  
      { 
          $this->markuprad = 0;
          $this->sc_force_zero[] = 'markuprad';
      } 
      if ($this->admpolitype === "" || is_null($this->admpolitype))  
      { 
          $this->admpolitype = 0;
          $this->sc_force_zero[] = 'admpolitype';
      } 
      if ($this->adminaptype === "" || is_null($this->adminaptype))  
      { 
          $this->adminaptype = 0;
          $this->sc_force_zero[] = 'adminaptype';
      } 
      if ($this->admpolibaru === "" || is_null($this->admpolibaru))  
      { 
          $this->admpolibaru = 0;
          $this->sc_force_zero[] = 'admpolibaru';
      } 
      if ($this->admpolilama === "" || is_null($this->admpolilama))  
      { 
          $this->admpolilama = 0;
          $this->sc_force_zero[] = 'admpolilama';
      } 
      if ($this->adminap === "" || is_null($this->adminap))  
      { 
          $this->adminap = 0;
          $this->sc_force_zero[] = 'adminap';
      } 
      if ($this->marginpma === "" || is_null($this->marginpma))  
      { 
          $this->marginpma = 0;
          $this->sc_force_zero[] = 'marginpma';
      } 
      if ($this->withpma === "" || is_null($this->withpma))  
      { 
          $this->withpma = 0;
          $this->sc_force_zero[] = 'withpma';
      } 
      if ($this->forminternal === "" || is_null($this->forminternal))  
      { 
          $this->forminternal = 0;
          $this->sc_force_zero[] = 'forminternal';
      } 
      if ($this->umum === "" || is_null($this->umum))  
      { 
          $this->umum = 0;
          $this->sc_force_zero[] = 'umum';
      } 
      if ($this->autoshow === "" || is_null($this->autoshow))  
      { 
          $this->autoshow = 0;
          $this->sc_force_zero[] = 'autoshow';
      } 
      if ($this->bpjs === "" || is_null($this->bpjs))  
      { 
          $this->bpjs = 0;
          $this->sc_force_zero[] = 'bpjs';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->instcode_before_qstr = $this->instcode;
          $this->instcode = substr($this->Db->qstr($this->instcode), 1, -1); 
          if ($this->instcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->instcode = "null"; 
              $NM_val_null[] = "instcode";
          } 
          $this->init_before_qstr = $this->init;
          $this->init = substr($this->Db->qstr($this->init), 1, -1); 
          if ($this->init == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->init = "null"; 
              $NM_val_null[] = "init";
          } 
          $this->name_before_qstr = $this->name;
          $this->name = substr($this->Db->qstr($this->name), 1, -1); 
          if ($this->name == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->name = "null"; 
              $NM_val_null[] = "name";
          } 
          $this->address_before_qstr = $this->address;
          $this->address = substr($this->Db->qstr($this->address), 1, -1); 
          if ($this->address == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->address = "null"; 
              $NM_val_null[] = "address";
          } 
          $this->city_before_qstr = $this->city;
          $this->city = substr($this->Db->qstr($this->city), 1, -1); 
          if ($this->city == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->city = "null"; 
              $NM_val_null[] = "city";
          } 
          $this->phone_before_qstr = $this->phone;
          $this->phone = substr($this->Db->qstr($this->phone), 1, -1); 
          if ($this->phone == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->phone = "null"; 
              $NM_val_null[] = "phone";
          } 
          $this->fax_before_qstr = $this->fax;
          $this->fax = substr($this->Db->qstr($this->fax), 1, -1); 
          if ($this->fax == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fax = "null"; 
              $NM_val_null[] = "fax";
          } 
          $this->cp_before_qstr = $this->cp;
          $this->cp = substr($this->Db->qstr($this->cp), 1, -1); 
          if ($this->cp == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cp = "null"; 
              $NM_val_null[] = "cp";
          } 
          if ($this->joindate == "")  
          { 
              $this->joindate = "null"; 
              $NM_val_null[] = "joindate";
          } 
          if ($this->expdate == "")  
          { 
              $this->expdate = "null"; 
              $NM_val_null[] = "expdate";
          } 
          $this->policy_before_qstr = $this->policy;
          $this->policy = substr($this->Db->qstr($this->policy), 1, -1); 
          if ($this->policy == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->policy = "null"; 
              $NM_val_null[] = "policy";
          } 
          if ($this->lastupdated == "")  
          { 
              $this->lastupdated = "null"; 
              $NM_val_null[] = "lastupdated";
          } 
          $this->vacc_before_qstr = $this->vacc;
          $this->vacc = substr($this->Db->qstr($this->vacc), 1, -1); 
          if ($this->vacc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->vacc = "null"; 
              $NM_val_null[] = "vacc";
          } 
          $this->extcode_before_qstr = $this->extcode;
          $this->extcode = substr($this->Db->qstr($this->extcode), 1, -1); 
          if ($this->extcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->extcode = "null"; 
              $NM_val_null[] = "extcode";
          } 
          $this->caracode_before_qstr = $this->caracode;
          $this->caracode = substr($this->Db->qstr($this->caracode), 1, -1); 
          if ($this->caracode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->caracode = "null"; 
              $NM_val_null[] = "caracode";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_tbinstansi_mob_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "init = '$this->init', name = '$this->name', address = '$this->address', city = '$this->city', phone = '$this->phone', fax = '$this->fax', cp = '$this->cp', `limit` = $this->limit, discount = $this->discount, joinDate = #$this->joindate#, expDate = #$this->expdate#, policy = '$this->policy', tempo = $this->tempo, marginObat = $this->marginobat, markupTindakan = $this->markuptindakan, markupObat = $this->markupobat, markupLab = $this->markuplab, markupRad = $this->markuprad, admPoliType = $this->admpolitype, admInapType = $this->adminaptype, admPoliBaru = $this->admpolibaru, admPoliLama = $this->admpolilama, admInap = $this->adminap, lastUpdated = #$this->lastupdated#, marginPMA = $this->marginpma, withPMA = $this->withpma"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "init = '$this->init', name = '$this->name', address = '$this->address', city = '$this->city', phone = '$this->phone', fax = '$this->fax', cp = '$this->cp', `limit` = $this->limit, discount = $this->discount, joinDate = " . $this->Ini->date_delim . $this->joindate . $this->Ini->date_delim1 . ", expDate = " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", policy = '$this->policy', tempo = $this->tempo, marginObat = $this->marginobat, markupTindakan = $this->markuptindakan, markupObat = $this->markupobat, markupLab = $this->markuplab, markupRad = $this->markuprad, admPoliType = $this->admpolitype, admInapType = $this->adminaptype, admPoliBaru = $this->admpolibaru, admPoliLama = $this->admpolilama, admInap = $this->adminap, lastUpdated = " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", marginPMA = $this->marginpma, withPMA = $this->withpma"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "init = '$this->init', name = '$this->name', address = '$this->address', city = '$this->city', phone = '$this->phone', fax = '$this->fax', cp = '$this->cp', `limit` = $this->limit, discount = $this->discount, joinDate = " . $this->Ini->date_delim . $this->joindate . $this->Ini->date_delim1 . ", expDate = " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", policy = '$this->policy', tempo = $this->tempo, marginObat = $this->marginobat, markupTindakan = $this->markuptindakan, markupObat = $this->markupobat, markupLab = $this->markuplab, markupRad = $this->markuprad, admPoliType = $this->admpolitype, admInapType = $this->adminaptype, admPoliBaru = $this->admpolibaru, admPoliLama = $this->admpolilama, admInap = $this->adminap, lastUpdated = " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", marginPMA = $this->marginpma, withPMA = $this->withpma"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "init = '$this->init', name = '$this->name', address = '$this->address', city = '$this->city', phone = '$this->phone', fax = '$this->fax', cp = '$this->cp', `limit` = $this->limit, discount = $this->discount, joinDate = EXTEND('$this->joindate', YEAR TO FRACTION), expDate = EXTEND('$this->expdate', YEAR TO FRACTION), policy = '$this->policy', tempo = $this->tempo, marginObat = $this->marginobat, markupTindakan = $this->markuptindakan, markupObat = $this->markupobat, markupLab = $this->markuplab, markupRad = $this->markuprad, admPoliType = $this->admpolitype, admInapType = $this->adminaptype, admPoliBaru = $this->admpolibaru, admPoliLama = $this->admpolilama, admInap = $this->adminap, lastUpdated = EXTEND('$this->lastupdated', YEAR TO FRACTION), marginPMA = $this->marginpma, withPMA = $this->withpma"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "init = '$this->init', name = '$this->name', address = '$this->address', city = '$this->city', phone = '$this->phone', fax = '$this->fax', cp = '$this->cp', `limit` = $this->limit, discount = $this->discount, joinDate = " . $this->Ini->date_delim . $this->joindate . $this->Ini->date_delim1 . ", expDate = " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", policy = '$this->policy', tempo = $this->tempo, marginObat = $this->marginobat, markupTindakan = $this->markuptindakan, markupObat = $this->markupobat, markupLab = $this->markuplab, markupRad = $this->markuprad, admPoliType = $this->admpolitype, admInapType = $this->adminaptype, admPoliBaru = $this->admpolibaru, admPoliLama = $this->admpolilama, admInap = $this->adminap, lastUpdated = " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", marginPMA = $this->marginpma, withPMA = $this->withpma"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "init = '$this->init', name = '$this->name', address = '$this->address', city = '$this->city', phone = '$this->phone', fax = '$this->fax', cp = '$this->cp', `limit` = $this->limit, discount = $this->discount, joinDate = " . $this->Ini->date_delim . $this->joindate . $this->Ini->date_delim1 . ", expDate = " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", policy = '$this->policy', tempo = $this->tempo, marginObat = $this->marginobat, markupTindakan = $this->markuptindakan, markupObat = $this->markupobat, markupLab = $this->markuplab, markupRad = $this->markuprad, admPoliType = $this->admpolitype, admInapType = $this->adminaptype, admPoliBaru = $this->admpolibaru, admPoliLama = $this->admpolilama, admInap = $this->adminap, lastUpdated = " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", marginPMA = $this->marginpma, withPMA = $this->withpma"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "init = '$this->init', name = '$this->name', address = '$this->address', city = '$this->city', phone = '$this->phone', fax = '$this->fax', cp = '$this->cp', `limit` = $this->limit, discount = $this->discount, joinDate = " . $this->Ini->date_delim . $this->joindate . $this->Ini->date_delim1 . ", expDate = " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", policy = '$this->policy', tempo = $this->tempo, marginObat = $this->marginobat, markupTindakan = $this->markuptindakan, markupObat = $this->markupobat, markupLab = $this->markuplab, markupRad = $this->markuprad, admPoliType = $this->admpolitype, admInapType = $this->adminaptype, admPoliBaru = $this->admpolibaru, admPoliLama = $this->admpolilama, admInap = $this->adminap, lastUpdated = " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", marginPMA = $this->marginpma, withPMA = $this->withpma"; 
              } 
              if (isset($NM_val_form['itemtype']) && $NM_val_form['itemtype'] != $this->nmgp_dados_select['itemtype']) 
              { 
                  $SC_fields_update[] = "itemType = $this->itemtype"; 
              } 
              if (isset($NM_val_form['deleted']) && $NM_val_form['deleted'] != $this->nmgp_dados_select['deleted']) 
              { 
                  $SC_fields_update[] = "deleted = $this->deleted"; 
              } 
              if (isset($NM_val_form['asuransi']) && $NM_val_form['asuransi'] != $this->nmgp_dados_select['asuransi']) 
              { 
                  $SC_fields_update[] = "asuransi = $this->asuransi"; 
              } 
              if (isset($NM_val_form['forminternal']) && $NM_val_form['forminternal'] != $this->nmgp_dados_select['forminternal']) 
              { 
                  $SC_fields_update[] = "formInternal = $this->forminternal"; 
              } 
              if (isset($NM_val_form['vacc']) && $NM_val_form['vacc'] != $this->nmgp_dados_select['vacc']) 
              { 
                  $SC_fields_update[] = "vAcc = '$this->vacc'"; 
              } 
              if (isset($NM_val_form['extcode']) && $NM_val_form['extcode'] != $this->nmgp_dados_select['extcode']) 
              { 
                  $SC_fields_update[] = "extCode = '$this->extcode'"; 
              } 
              if (isset($NM_val_form['umum']) && $NM_val_form['umum'] != $this->nmgp_dados_select['umum']) 
              { 
                  $SC_fields_update[] = "umum = $this->umum"; 
              } 
              if (isset($NM_val_form['autoshow']) && $NM_val_form['autoshow'] != $this->nmgp_dados_select['autoshow']) 
              { 
                  $SC_fields_update[] = "autoShow = $this->autoshow"; 
              } 
              if (isset($NM_val_form['bpjs']) && $NM_val_form['bpjs'] != $this->nmgp_dados_select['bpjs']) 
              { 
                  $SC_fields_update[] = "bpjs = $this->bpjs"; 
              } 
              if (isset($NM_val_form['caracode']) && $NM_val_form['caracode'] != $this->nmgp_dados_select['caracode']) 
              { 
                  $SC_fields_update[] = "caraCode = '$this->caracode'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE instCode = '$this->instcode' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE instCode = '$this->instcode' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE instCode = '$this->instcode' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE instCode = '$this->instcode' ";  
              }  
              else  
              {
                  $comando .= " WHERE instCode = '$this->instcode' ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_tbinstansi_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->instcode = $this->instcode_before_qstr;
              $this->init = $this->init_before_qstr;
              $this->name = $this->name_before_qstr;
              $this->address = $this->address_before_qstr;
              $this->city = $this->city_before_qstr;
              $this->phone = $this->phone_before_qstr;
              $this->fax = $this->fax_before_qstr;
              $this->cp = $this->cp_before_qstr;
              $this->policy = $this->policy_before_qstr;
              $this->vacc = $this->vacc_before_qstr;
              $this->extcode = $this->extcode_before_qstr;
              $this->caracode = $this->caracode_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['instcode'])) { $this->instcode = $NM_val_form['instcode']; }
              elseif (isset($this->instcode)) { $this->nm_limpa_alfa($this->instcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['init'])) { $this->init = $NM_val_form['init']; }
              elseif (isset($this->init)) { $this->nm_limpa_alfa($this->init); }
              if     (isset($NM_val_form) && isset($NM_val_form['name'])) { $this->name = $NM_val_form['name']; }
              elseif (isset($this->name)) { $this->nm_limpa_alfa($this->name); }
              if     (isset($NM_val_form) && isset($NM_val_form['city'])) { $this->city = $NM_val_form['city']; }
              elseif (isset($this->city)) { $this->nm_limpa_alfa($this->city); }
              if     (isset($NM_val_form) && isset($NM_val_form['phone'])) { $this->phone = $NM_val_form['phone']; }
              elseif (isset($this->phone)) { $this->nm_limpa_alfa($this->phone); }
              if     (isset($NM_val_form) && isset($NM_val_form['fax'])) { $this->fax = $NM_val_form['fax']; }
              elseif (isset($this->fax)) { $this->nm_limpa_alfa($this->fax); }
              if     (isset($NM_val_form) && isset($NM_val_form['cp'])) { $this->cp = $NM_val_form['cp']; }
              elseif (isset($this->cp)) { $this->nm_limpa_alfa($this->cp); }
              if     (isset($NM_val_form) && isset($NM_val_form['limit'])) { $this->limit = $NM_val_form['limit']; }
              elseif (isset($this->limit)) { $this->nm_limpa_alfa($this->limit); }
              if     (isset($NM_val_form) && isset($NM_val_form['discount'])) { $this->discount = $NM_val_form['discount']; }
              elseif (isset($this->discount)) { $this->nm_limpa_alfa($this->discount); }
              if     (isset($NM_val_form) && isset($NM_val_form['tempo'])) { $this->tempo = $NM_val_form['tempo']; }
              elseif (isset($this->tempo)) { $this->nm_limpa_alfa($this->tempo); }
              if     (isset($NM_val_form) && isset($NM_val_form['marginobat'])) { $this->marginobat = $NM_val_form['marginobat']; }
              elseif (isset($this->marginobat)) { $this->nm_limpa_alfa($this->marginobat); }
              if     (isset($NM_val_form) && isset($NM_val_form['markuptindakan'])) { $this->markuptindakan = $NM_val_form['markuptindakan']; }
              elseif (isset($this->markuptindakan)) { $this->nm_limpa_alfa($this->markuptindakan); }
              if     (isset($NM_val_form) && isset($NM_val_form['markupobat'])) { $this->markupobat = $NM_val_form['markupobat']; }
              elseif (isset($this->markupobat)) { $this->nm_limpa_alfa($this->markupobat); }
              if     (isset($NM_val_form) && isset($NM_val_form['markuplab'])) { $this->markuplab = $NM_val_form['markuplab']; }
              elseif (isset($this->markuplab)) { $this->nm_limpa_alfa($this->markuplab); }
              if     (isset($NM_val_form) && isset($NM_val_form['markuprad'])) { $this->markuprad = $NM_val_form['markuprad']; }
              elseif (isset($this->markuprad)) { $this->nm_limpa_alfa($this->markuprad); }
              if     (isset($NM_val_form) && isset($NM_val_form['admpolitype'])) { $this->admpolitype = $NM_val_form['admpolitype']; }
              elseif (isset($this->admpolitype)) { $this->nm_limpa_alfa($this->admpolitype); }
              if     (isset($NM_val_form) && isset($NM_val_form['adminaptype'])) { $this->adminaptype = $NM_val_form['adminaptype']; }
              elseif (isset($this->adminaptype)) { $this->nm_limpa_alfa($this->adminaptype); }
              if     (isset($NM_val_form) && isset($NM_val_form['admpolibaru'])) { $this->admpolibaru = $NM_val_form['admpolibaru']; }
              elseif (isset($this->admpolibaru)) { $this->nm_limpa_alfa($this->admpolibaru); }
              if     (isset($NM_val_form) && isset($NM_val_form['admpolilama'])) { $this->admpolilama = $NM_val_form['admpolilama']; }
              elseif (isset($this->admpolilama)) { $this->nm_limpa_alfa($this->admpolilama); }
              if     (isset($NM_val_form) && isset($NM_val_form['adminap'])) { $this->adminap = $NM_val_form['adminap']; }
              elseif (isset($this->adminap)) { $this->nm_limpa_alfa($this->adminap); }
              if     (isset($NM_val_form) && isset($NM_val_form['marginpma'])) { $this->marginpma = $NM_val_form['marginpma']; }
              elseif (isset($this->marginpma)) { $this->nm_limpa_alfa($this->marginpma); }
              if     (isset($NM_val_form) && isset($NM_val_form['withpma'])) { $this->withpma = $NM_val_form['withpma']; }
              elseif (isset($this->withpma)) { $this->nm_limpa_alfa($this->withpma); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('instcode', 'init', 'name', 'limit', 'discount', 'tempo', 'lastupdated', 'address', 'city', 'phone', 'fax', 'cp', 'joindate', 'expdate', 'marginobat', 'markuptindakan', 'markupobat', 'markuplab', 'markuprad', 'admpolitype', 'adminaptype', 'admpolibaru', 'admpolilama', 'adminap', 'marginpma', 'withpma', 'policy'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_pkey']); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_tbinstansi_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (instCode, init, name, address, city, phone, fax, cp, `limit`, discount, joinDate, expDate, policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, lastUpdated, marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode) VALUES ('$this->instcode', '$this->init', '$this->name', '$this->address', '$this->city', '$this->phone', '$this->fax', '$this->cp', $this->limit, $this->discount, #$this->joindate#, #$this->expdate#, '$this->policy', $this->itemtype, $this->deleted, $this->tempo, $this->asuransi, $this->marginobat, $this->markuptindakan, $this->markupobat, $this->markuplab, $this->markuprad, $this->admpolitype, $this->adminaptype, $this->admpolibaru, $this->admpolilama, $this->adminap, #$this->lastupdated#, $this->marginpma, $this->withpma, $this->forminternal, '$this->vacc', '$this->extcode', $this->umum, $this->autoshow, $this->bpjs, '$this->caracode')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "instCode, init, name, address, city, phone, fax, cp, `limit`, discount, joinDate, expDate, policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, lastUpdated, marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode) VALUES (" . $NM_seq_auto . "'$this->instcode', '$this->init', '$this->name', '$this->address', '$this->city', '$this->phone', '$this->fax', '$this->cp', $this->limit, $this->discount, " . $this->Ini->date_delim . $this->joindate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->policy', $this->itemtype, $this->deleted, $this->tempo, $this->asuransi, $this->marginobat, $this->markuptindakan, $this->markupobat, $this->markuplab, $this->markuprad, $this->admpolitype, $this->adminaptype, $this->admpolibaru, $this->admpolilama, $this->adminap, " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", $this->marginpma, $this->withpma, $this->forminternal, '$this->vacc', '$this->extcode', $this->umum, $this->autoshow, $this->bpjs, '$this->caracode')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "instCode, init, name, address, city, phone, fax, cp, `limit`, discount, joinDate, expDate, policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, lastUpdated, marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode) VALUES (" . $NM_seq_auto . "'$this->instcode', '$this->init', '$this->name', '$this->address', '$this->city', '$this->phone', '$this->fax', '$this->cp', $this->limit, $this->discount, " . $this->Ini->date_delim . $this->joindate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->policy', $this->itemtype, $this->deleted, $this->tempo, $this->asuransi, $this->marginobat, $this->markuptindakan, $this->markupobat, $this->markuplab, $this->markuprad, $this->admpolitype, $this->adminaptype, $this->admpolibaru, $this->admpolilama, $this->adminap, " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", $this->marginpma, $this->withpma, $this->forminternal, '$this->vacc', '$this->extcode', $this->umum, $this->autoshow, $this->bpjs, '$this->caracode')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "instCode, init, name, address, city, phone, fax, cp, `limit`, discount, joinDate, expDate, policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, lastUpdated, marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode) VALUES (" . $NM_seq_auto . "'$this->instcode', '$this->init', '$this->name', '$this->address', '$this->city', '$this->phone', '$this->fax', '$this->cp', $this->limit, $this->discount, " . $this->Ini->date_delim . $this->joindate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->policy', $this->itemtype, $this->deleted, $this->tempo, $this->asuransi, $this->marginobat, $this->markuptindakan, $this->markupobat, $this->markuplab, $this->markuprad, $this->admpolitype, $this->adminaptype, $this->admpolibaru, $this->admpolilama, $this->adminap, " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", $this->marginpma, $this->withpma, $this->forminternal, '$this->vacc', '$this->extcode', $this->umum, $this->autoshow, $this->bpjs, '$this->caracode')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "instCode, init, name, address, city, phone, fax, cp, `limit`, discount, joinDate, expDate, policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, lastUpdated, marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode) VALUES (" . $NM_seq_auto . "'$this->instcode', '$this->init', '$this->name', '$this->address', '$this->city', '$this->phone', '$this->fax', '$this->cp', $this->limit, $this->discount, EXTEND('$this->joindate', YEAR TO FRACTION), EXTEND('$this->expdate', YEAR TO FRACTION), '$this->policy', $this->itemtype, $this->deleted, $this->tempo, $this->asuransi, $this->marginobat, $this->markuptindakan, $this->markupobat, $this->markuplab, $this->markuprad, $this->admpolitype, $this->adminaptype, $this->admpolibaru, $this->admpolilama, $this->adminap, EXTEND('$this->lastupdated', YEAR TO FRACTION), $this->marginpma, $this->withpma, $this->forminternal, '$this->vacc', '$this->extcode', $this->umum, $this->autoshow, $this->bpjs, '$this->caracode')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "instCode, init, name, address, city, phone, fax, cp, `limit`, discount, joinDate, expDate, policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, lastUpdated, marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode) VALUES (" . $NM_seq_auto . "'$this->instcode', '$this->init', '$this->name', '$this->address', '$this->city', '$this->phone', '$this->fax', '$this->cp', $this->limit, $this->discount, " . $this->Ini->date_delim . $this->joindate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->policy', $this->itemtype, $this->deleted, $this->tempo, $this->asuransi, $this->marginobat, $this->markuptindakan, $this->markupobat, $this->markuplab, $this->markuprad, $this->admpolitype, $this->adminaptype, $this->admpolibaru, $this->admpolilama, $this->adminap, " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", $this->marginpma, $this->withpma, $this->forminternal, '$this->vacc', '$this->extcode', $this->umum, $this->autoshow, $this->bpjs, '$this->caracode')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "instCode, init, name, address, city, phone, fax, cp, `limit`, discount, joinDate, expDate, policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, lastUpdated, marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode) VALUES (" . $NM_seq_auto . "'$this->instcode', '$this->init', '$this->name', '$this->address', '$this->city', '$this->phone', '$this->fax', '$this->cp', $this->limit, $this->discount, " . $this->Ini->date_delim . $this->joindate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->policy', $this->itemtype, $this->deleted, $this->tempo, $this->asuransi, $this->marginobat, $this->markuptindakan, $this->markupobat, $this->markuplab, $this->markuprad, $this->admpolitype, $this->adminaptype, $this->admpolibaru, $this->admpolilama, $this->adminap, " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", $this->marginpma, $this->withpma, $this->forminternal, '$this->vacc', '$this->extcode', $this->umum, $this->autoshow, $this->bpjs, '$this->caracode')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "instCode, init, name, address, city, phone, fax, cp, `limit`, discount, joinDate, expDate, policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, lastUpdated, marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode) VALUES (" . $NM_seq_auto . "'$this->instcode', '$this->init', '$this->name', '$this->address', '$this->city', '$this->phone', '$this->fax', '$this->cp', $this->limit, $this->discount, " . $this->Ini->date_delim . $this->joindate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->policy', $this->itemtype, $this->deleted, $this->tempo, $this->asuransi, $this->marginobat, $this->markuptindakan, $this->markupobat, $this->markuplab, $this->markuprad, $this->admpolitype, $this->adminaptype, $this->admpolibaru, $this->admpolilama, $this->adminap, " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", $this->marginpma, $this->withpma, $this->forminternal, '$this->vacc', '$this->extcode', $this->umum, $this->autoshow, $this->bpjs, '$this->caracode')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "instCode, init, name, address, city, phone, fax, cp, `limit`, discount, joinDate, expDate, policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, lastUpdated, marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode) VALUES (" . $NM_seq_auto . "'$this->instcode', '$this->init', '$this->name', '$this->address', '$this->city', '$this->phone', '$this->fax', '$this->cp', $this->limit, $this->discount, " . $this->Ini->date_delim . $this->joindate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->policy', $this->itemtype, $this->deleted, $this->tempo, $this->asuransi, $this->marginobat, $this->markuptindakan, $this->markupobat, $this->markuplab, $this->markuprad, $this->admpolitype, $this->adminaptype, $this->admpolibaru, $this->admpolilama, $this->adminap, " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", $this->marginpma, $this->withpma, $this->forminternal, '$this->vacc', '$this->extcode', $this->umum, $this->autoshow, $this->bpjs, '$this->caracode')"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_tbinstansi_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->instcode = $this->instcode_before_qstr;
              $this->init = $this->init_before_qstr;
              $this->name = $this->name_before_qstr;
              $this->address = $this->address_before_qstr;
              $this->city = $this->city_before_qstr;
              $this->phone = $this->phone_before_qstr;
              $this->fax = $this->fax_before_qstr;
              $this->cp = $this->cp_before_qstr;
              $this->policy = $this->policy_before_qstr;
              $this->vacc = $this->vacc_before_qstr;
              $this->extcode = $this->extcode_before_qstr;
              $this->caracode = $this->caracode_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->instcode = substr($this->Db->qstr($this->instcode), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where instCode = '$this->instcode' "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_tbinstansi_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['parms'] = "instcode?#?$this->instcode?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->instcode = null === $this->instcode ? null : substr($this->Db->qstr($this->instcode), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->instcode)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_tbinstansi_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total'] = $qt_geral_reg_form_tbinstansi_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->instcode))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "instCode < '$this->instcode' "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "instCode < '$this->instcode' "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "instCode < '$this->instcode' "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "instCode < '$this->instcode' "; 
              }
              else  
              {
                  $Key_Where = "instCode < '$this->instcode' "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_tbinstansi_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] > $qt_geral_reg_form_tbinstansi_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] = $qt_geral_reg_form_tbinstansi_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] = $qt_geral_reg_form_tbinstansi_mob; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total'] + 1; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT instCode, init, name, address, city, phone, fax, cp, `limit`, discount, str_replace (convert(char(10),joinDate,102), '.', '-') + ' ' + convert(char(8),joinDate,20), str_replace (convert(char(10),expDate,102), '.', '-') + ' ' + convert(char(8),expDate,20), policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, str_replace (convert(char(10),lastUpdated,102), '.', '-') + ' ' + convert(char(8),lastUpdated,20), marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT instCode, init, name, address, city, phone, fax, cp, `limit`, discount, convert(char(23),joinDate,121), convert(char(23),expDate,121), policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, convert(char(23),lastUpdated,121), marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT instCode, init, name, address, city, phone, fax, cp, `limit`, discount, joinDate, expDate, policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, lastUpdated, marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT instCode, init, name, address, city, phone, fax, cp, `limit`, discount, EXTEND(joinDate, YEAR TO FRACTION), EXTEND(expDate, YEAR TO FRACTION), policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, EXTEND(lastUpdated, YEAR TO FRACTION), marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT instCode, init, name, address, city, phone, fax, cp, `limit`, discount, joinDate, expDate, policy, itemType, deleted, tempo, asuransi, marginObat, markupTindakan, markupObat, markupLab, markupRad, admPoliType, admInapType, admPoliBaru, admPoliLama, admInap, lastUpdated, marginPMA, withPMA, formInternal, vAcc, extCode, umum, autoShow, bpjs, caraCode from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "instCode = '$this->instcode'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "instCode = '$this->instcode'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "instCode = '$this->instcode'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "instCode = '$this->instcode'"; 
              }  
              else  
              {
                  $aWhere[] = "instCode = '$this->instcode'"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "instCode";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->instcode = $rs->fields[0] ; 
              $this->nmgp_dados_select['instcode'] = $this->instcode;
              $this->init = $rs->fields[1] ; 
              $this->nmgp_dados_select['init'] = $this->init;
              $this->name = $rs->fields[2] ; 
              $this->nmgp_dados_select['name'] = $this->name;
              $this->address = $rs->fields[3] ; 
              $this->nmgp_dados_select['address'] = $this->address;
              $this->city = $rs->fields[4] ; 
              $this->nmgp_dados_select['city'] = $this->city;
              $this->phone = $rs->fields[5] ; 
              $this->nmgp_dados_select['phone'] = $this->phone;
              $this->fax = $rs->fields[6] ; 
              $this->nmgp_dados_select['fax'] = $this->fax;
              $this->cp = $rs->fields[7] ; 
              $this->nmgp_dados_select['cp'] = $this->cp;
              $this->limit = $rs->fields[8] ; 
              $this->nmgp_dados_select['limit'] = $this->limit;
              $this->discount = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['discount'] = $this->discount;
              $this->joindate = $rs->fields[10] ; 
              if (substr($this->joindate, 10, 1) == "-") 
              { 
                 $this->joindate = substr($this->joindate, 0, 10) . " " . substr($this->joindate, 11);
              } 
              if (substr($this->joindate, 13, 1) == ".") 
              { 
                 $this->joindate = substr($this->joindate, 0, 13) . ":" . substr($this->joindate, 14, 2) . ":" . substr($this->joindate, 17);
              } 
              $this->nmgp_dados_select['joindate'] = $this->joindate;
              $this->expdate = $rs->fields[11] ; 
              if (substr($this->expdate, 10, 1) == "-") 
              { 
                 $this->expdate = substr($this->expdate, 0, 10) . " " . substr($this->expdate, 11);
              } 
              if (substr($this->expdate, 13, 1) == ".") 
              { 
                 $this->expdate = substr($this->expdate, 0, 13) . ":" . substr($this->expdate, 14, 2) . ":" . substr($this->expdate, 17);
              } 
              $this->nmgp_dados_select['expdate'] = $this->expdate;
              $this->policy = $rs->fields[12] ; 
              $this->nmgp_dados_select['policy'] = $this->policy;
              $this->itemtype = $rs->fields[13] ; 
              $this->nmgp_dados_select['itemtype'] = $this->itemtype;
              $this->deleted = $rs->fields[14] ; 
              $this->nmgp_dados_select['deleted'] = $this->deleted;
              $this->tempo = $rs->fields[15] ; 
              $this->nmgp_dados_select['tempo'] = $this->tempo;
              $this->asuransi = $rs->fields[16] ; 
              $this->nmgp_dados_select['asuransi'] = $this->asuransi;
              $this->marginobat = trim($rs->fields[17]) ; 
              $this->nmgp_dados_select['marginobat'] = $this->marginobat;
              $this->markuptindakan = trim($rs->fields[18]) ; 
              $this->nmgp_dados_select['markuptindakan'] = $this->markuptindakan;
              $this->markupobat = trim($rs->fields[19]) ; 
              $this->nmgp_dados_select['markupobat'] = $this->markupobat;
              $this->markuplab = trim($rs->fields[20]) ; 
              $this->nmgp_dados_select['markuplab'] = $this->markuplab;
              $this->markuprad = trim($rs->fields[21]) ; 
              $this->nmgp_dados_select['markuprad'] = $this->markuprad;
              $this->admpolitype = $rs->fields[22] ; 
              $this->nmgp_dados_select['admpolitype'] = $this->admpolitype;
              $this->adminaptype = $rs->fields[23] ; 
              $this->nmgp_dados_select['adminaptype'] = $this->adminaptype;
              $this->admpolibaru = trim($rs->fields[24]) ; 
              $this->nmgp_dados_select['admpolibaru'] = $this->admpolibaru;
              $this->admpolilama = trim($rs->fields[25]) ; 
              $this->nmgp_dados_select['admpolilama'] = $this->admpolilama;
              $this->adminap = trim($rs->fields[26]) ; 
              $this->nmgp_dados_select['adminap'] = $this->adminap;
              $this->lastupdated = $rs->fields[27] ; 
              if (substr($this->lastupdated, 10, 1) == "-") 
              { 
                 $this->lastupdated = substr($this->lastupdated, 0, 10) . " " . substr($this->lastupdated, 11);
              } 
              if (substr($this->lastupdated, 13, 1) == ".") 
              { 
                 $this->lastupdated = substr($this->lastupdated, 0, 13) . ":" . substr($this->lastupdated, 14, 2) . ":" . substr($this->lastupdated, 17);
              } 
              $this->nmgp_dados_select['lastupdated'] = $this->lastupdated;
              $this->marginpma = trim($rs->fields[28]) ; 
              $this->nmgp_dados_select['marginpma'] = $this->marginpma;
              $this->withpma = $rs->fields[29] ; 
              $this->nmgp_dados_select['withpma'] = $this->withpma;
              $this->forminternal = $rs->fields[30] ; 
              $this->nmgp_dados_select['forminternal'] = $this->forminternal;
              $this->vacc = $rs->fields[31] ; 
              $this->nmgp_dados_select['vacc'] = $this->vacc;
              $this->extcode = $rs->fields[32] ; 
              $this->nmgp_dados_select['extcode'] = $this->extcode;
              $this->umum = $rs->fields[33] ; 
              $this->nmgp_dados_select['umum'] = $this->umum;
              $this->autoshow = $rs->fields[34] ; 
              $this->nmgp_dados_select['autoshow'] = $this->autoshow;
              $this->bpjs = $rs->fields[35] ; 
              $this->nmgp_dados_select['bpjs'] = $this->bpjs;
              $this->caracode = $rs->fields[36] ; 
              $this->nmgp_dados_select['caracode'] = $this->caracode;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->limit = (string)$this->limit; 
              $this->discount = (strpos(strtolower($this->discount), "e")) ? (float)$this->discount : $this->discount; 
              $this->discount = (string)$this->discount; 
              $this->itemtype = (string)$this->itemtype; 
              $this->deleted = (string)$this->deleted; 
              $this->tempo = (string)$this->tempo; 
              $this->asuransi = (string)$this->asuransi; 
              $this->marginobat = (strpos(strtolower($this->marginobat), "e")) ? (float)$this->marginobat : $this->marginobat; 
              $this->marginobat = (string)$this->marginobat; 
              $this->markuptindakan = (strpos(strtolower($this->markuptindakan), "e")) ? (float)$this->markuptindakan : $this->markuptindakan; 
              $this->markuptindakan = (string)$this->markuptindakan; 
              $this->markupobat = (strpos(strtolower($this->markupobat), "e")) ? (float)$this->markupobat : $this->markupobat; 
              $this->markupobat = (string)$this->markupobat; 
              $this->markuplab = (strpos(strtolower($this->markuplab), "e")) ? (float)$this->markuplab : $this->markuplab; 
              $this->markuplab = (string)$this->markuplab; 
              $this->markuprad = (strpos(strtolower($this->markuprad), "e")) ? (float)$this->markuprad : $this->markuprad; 
              $this->markuprad = (string)$this->markuprad; 
              $this->admpolitype = (string)$this->admpolitype; 
              $this->adminaptype = (string)$this->adminaptype; 
              $this->admpolibaru = (strpos(strtolower($this->admpolibaru), "e")) ? (float)$this->admpolibaru : $this->admpolibaru; 
              $this->admpolibaru = (string)$this->admpolibaru; 
              $this->admpolilama = (strpos(strtolower($this->admpolilama), "e")) ? (float)$this->admpolilama : $this->admpolilama; 
              $this->admpolilama = (string)$this->admpolilama; 
              $this->adminap = (strpos(strtolower($this->adminap), "e")) ? (float)$this->adminap : $this->adminap; 
              $this->adminap = (string)$this->adminap; 
              $this->marginpma = (strpos(strtolower($this->marginpma), "e")) ? (float)$this->marginpma : $this->marginpma; 
              $this->marginpma = (string)$this->marginpma; 
              $this->withpma = (string)$this->withpma; 
              $this->forminternal = (string)$this->forminternal; 
              $this->umum = (string)$this->umum; 
              $this->autoshow = (string)$this->autoshow; 
              $this->bpjs = (string)$this->bpjs; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['parms'] = "instcode?#?$this->instcode?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['reg_start'] < $qt_geral_reg_form_tbinstansi_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->instcode = "";  
              $this->nmgp_dados_form["instcode"] = $this->instcode;
              $this->init = "";  
              $this->nmgp_dados_form["init"] = $this->init;
              $this->name = "";  
              $this->nmgp_dados_form["name"] = $this->name;
              $this->address = "";  
              $this->nmgp_dados_form["address"] = $this->address;
              $this->city = "";  
              $this->nmgp_dados_form["city"] = $this->city;
              $this->phone = "";  
              $this->nmgp_dados_form["phone"] = $this->phone;
              $this->fax = "";  
              $this->nmgp_dados_form["fax"] = $this->fax;
              $this->cp = "";  
              $this->nmgp_dados_form["cp"] = $this->cp;
              $this->limit = "";  
              $this->nmgp_dados_form["limit"] = $this->limit;
              $this->discount = "";  
              $this->nmgp_dados_form["discount"] = $this->discount;
              $this->joindate = "";  
              $this->joindate_hora = "" ;  
              $this->nmgp_dados_form["joindate"] = $this->joindate;
              $this->expdate = "";  
              $this->expdate_hora = "" ;  
              $this->nmgp_dados_form["expdate"] = $this->expdate;
              $this->policy = "";  
              $this->nmgp_dados_form["policy"] = $this->policy;
              $this->itemtype = "";  
              $this->nmgp_dados_form["itemtype"] = $this->itemtype;
              $this->deleted = "";  
              $this->nmgp_dados_form["deleted"] = $this->deleted;
              $this->tempo = "";  
              $this->nmgp_dados_form["tempo"] = $this->tempo;
              $this->asuransi = "";  
              $this->nmgp_dados_form["asuransi"] = $this->asuransi;
              $this->marginobat = "";  
              $this->nmgp_dados_form["marginobat"] = $this->marginobat;
              $this->markuptindakan = "";  
              $this->nmgp_dados_form["markuptindakan"] = $this->markuptindakan;
              $this->markupobat = "";  
              $this->nmgp_dados_form["markupobat"] = $this->markupobat;
              $this->markuplab = "";  
              $this->nmgp_dados_form["markuplab"] = $this->markuplab;
              $this->markuprad = "";  
              $this->nmgp_dados_form["markuprad"] = $this->markuprad;
              $this->admpolitype = "";  
              $this->nmgp_dados_form["admpolitype"] = $this->admpolitype;
              $this->adminaptype = "";  
              $this->nmgp_dados_form["adminaptype"] = $this->adminaptype;
              $this->admpolibaru = "";  
              $this->nmgp_dados_form["admpolibaru"] = $this->admpolibaru;
              $this->admpolilama = "";  
              $this->nmgp_dados_form["admpolilama"] = $this->admpolilama;
              $this->adminap = "";  
              $this->nmgp_dados_form["adminap"] = $this->adminap;
              $this->lastupdated = "";  
              $this->lastupdated_hora = "" ;  
              $this->nmgp_dados_form["lastupdated"] = $this->lastupdated;
              $this->marginpma = "";  
              $this->nmgp_dados_form["marginpma"] = $this->marginpma;
              $this->withpma = "";  
              $this->nmgp_dados_form["withpma"] = $this->withpma;
              $this->forminternal = "";  
              $this->nmgp_dados_form["forminternal"] = $this->forminternal;
              $this->vacc = "";  
              $this->nmgp_dados_form["vacc"] = $this->vacc;
              $this->extcode = "";  
              $this->nmgp_dados_form["extcode"] = $this->extcode;
              $this->umum = "";  
              $this->nmgp_dados_form["umum"] = $this->umum;
              $this->autoshow = "";  
              $this->nmgp_dados_form["autoshow"] = $this->autoshow;
              $this->bpjs = "";  
              $this->nmgp_dados_form["bpjs"] = $this->bpjs;
              $this->caracode = "";  
              $this->nmgp_dados_form["caracode"] = $this->caracode;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dados_select'];
                  $this->init = $this->nmgp_dados_select['init'];  
                  $this->name = $this->nmgp_dados_select['name'];  
                  $this->address = $this->nmgp_dados_select['address'];  
                  $this->city = $this->nmgp_dados_select['city'];  
                  $this->phone = $this->nmgp_dados_select['phone'];  
                  $this->fax = $this->nmgp_dados_select['fax'];  
                  $this->cp = $this->nmgp_dados_select['cp'];  
                  $this->limit = $this->nmgp_dados_select['limit'];  
                  $this->discount = $this->nmgp_dados_select['discount'];  
                  $this->joindate = $this->nmgp_dados_select['joindate'];  
                  $this->expdate = $this->nmgp_dados_select['expdate'];  
                  $this->policy = $this->nmgp_dados_select['policy'];  
                  $this->itemtype = $this->nmgp_dados_select['itemtype'];  
                  $this->deleted = $this->nmgp_dados_select['deleted'];  
                  $this->tempo = $this->nmgp_dados_select['tempo'];  
                  $this->asuransi = $this->nmgp_dados_select['asuransi'];  
                  $this->marginobat = $this->nmgp_dados_select['marginobat'];  
                  $this->markuptindakan = $this->nmgp_dados_select['markuptindakan'];  
                  $this->markupobat = $this->nmgp_dados_select['markupobat'];  
                  $this->markuplab = $this->nmgp_dados_select['markuplab'];  
                  $this->markuprad = $this->nmgp_dados_select['markuprad'];  
                  $this->admpolitype = $this->nmgp_dados_select['admpolitype'];  
                  $this->adminaptype = $this->nmgp_dados_select['adminaptype'];  
                  $this->admpolibaru = $this->nmgp_dados_select['admpolibaru'];  
                  $this->admpolilama = $this->nmgp_dados_select['admpolilama'];  
                  $this->adminap = $this->nmgp_dados_select['adminap'];  
                  $this->lastupdated = $this->nmgp_dados_select['lastupdated'];  
                  $this->marginpma = $this->nmgp_dados_select['marginpma'];  
                  $this->withpma = $this->nmgp_dados_select['withpma'];  
                  $this->forminternal = $this->nmgp_dados_select['forminternal'];  
                  $this->vacc = $this->nmgp_dados_select['vacc'];  
                  $this->extcode = $this->nmgp_dados_select['extcode'];  
                  $this->umum = $this->nmgp_dados_select['umum'];  
                  $this->autoshow = $this->nmgp_dados_select['autoshow'];  
                  $this->bpjs = $this->nmgp_dados_select['bpjs'];  
                  $this->caracode = $this->nmgp_dados_select['caracode'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(instCode) from " . $this->Ini->nm_tabela . " where instCode < '$this->instcode'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(instCode) from " . $this->Ini->nm_tabela . " where instCode < '$this->instcode'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(instCode) from " . $this->Ini->nm_tabela . " where instCode < '$this->instcode'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(instCode) from " . $this->Ini->nm_tabela . " where instCode < '$this->instcode'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(instCode) from " . $this->Ini->nm_tabela . " where instCode < '$this->instcode'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(instCode) from " . $this->Ini->nm_tabela . " where instCode < '$this->instcode'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(instCode) from " . $this->Ini->nm_tabela . " where instCode < '$this->instcode'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(instCode) from " . $this->Ini->nm_tabela . " where instCode < '$this->instcode'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(instCode) from " . $this->Ini->nm_tabela . " where instCode < '$this->instcode'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(instCode) from " . $this->Ini->nm_tabela . " where instCode < '$this->instcode'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->instcode = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(instCode) from " . $this->Ini->nm_tabela . " where instCode > '$this->instcode'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(instCode) from " . $this->Ini->nm_tabela . " where instCode > '$this->instcode'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(instCode) from " . $this->Ini->nm_tabela . " where instCode > '$this->instcode'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(instCode) from " . $this->Ini->nm_tabela . " where instCode > '$this->instcode'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(instCode) from " . $this->Ini->nm_tabela . " where instCode > '$this->instcode'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(instCode) from " . $this->Ini->nm_tabela . " where instCode > '$this->instcode'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(instCode) from " . $this->Ini->nm_tabela . " where instCode > '$this->instcode'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(instCode) from " . $this->Ini->nm_tabela . " where instCode > '$this->instcode'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(instCode) from " . $this->Ini->nm_tabela . " where instCode > '$this->instcode'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(instCode) from " . $this->Ini->nm_tabela . " where instCode > '$this->instcode'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->instcode = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter']))
         { 
             $rs->Close();  
             return ; 
         } 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->instcode = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(instCode) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->instcode = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_tbinstansi_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_tbinstansi_mob_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_tbinstansi_mob_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "instCode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "init", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "name", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "address", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "city", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "phone", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fax", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cp", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`limit`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "discount", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "policy", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "itemType", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "deleted", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tempo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "asuransi", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "marginObat", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "markupTindakan", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "markupObat", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "markupLab", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "markupRad", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "admPoliType", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "admInapType", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "admPoliBaru", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "admPoliLama", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "admInap", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "marginPMA", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "withPMA", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "formInternal", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "vAcc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "extCode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "umum", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "autoShow", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bpjs", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "caraCode", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_tbinstansi_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['total'] = $qt_geral_reg_form_tbinstansi_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbinstansi_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbinstansi_mob_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "`limit`";$nm_numeric[] = "discount";$nm_numeric[] = "itemtype";$nm_numeric[] = "deleted";$nm_numeric[] = "tempo";$nm_numeric[] = "asuransi";$nm_numeric[] = "marginobat";$nm_numeric[] = "markuptindakan";$nm_numeric[] = "markupobat";$nm_numeric[] = "markuplab";$nm_numeric[] = "markuprad";$nm_numeric[] = "admpolitype";$nm_numeric[] = "adminaptype";$nm_numeric[] = "admpolibaru";$nm_numeric[] = "admpolilama";$nm_numeric[] = "adminap";$nm_numeric[] = "marginpma";$nm_numeric[] = "withpma";$nm_numeric[] = "forminternal";$nm_numeric[] = "umum";$nm_numeric[] = "autoshow";$nm_numeric[] = "bpjs";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas['joindate'] = "datetime";$Nm_datas['expdate'] = "datetime";$Nm_datas['lastupdated'] = "datetime";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not" . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_tbinstansi_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_tbinstansi_mob_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_tbinstansi_mob_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbinstansi_mob']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>
