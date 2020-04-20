<?php
//
class form_tbtranrad_inap_mob_apl
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
   var $id;
   var $trancode;
   var $struk;
   var $struk_1;
   var $custcode;
   var $custcode_1;
   var $inapcode;
   var $source;
   var $doccode;
   var $doccode_1;
   var $docname;
   var $docname_1;
   var $periksacode;
   var $note;
   var $trandate;
   var $trandate_hora;
   var $enterdate;
   var $enterdate_hora;
   var $status;
   var $status_1;
   var $finishdate;
   var $finishdate_hora;
   var $contrast;
   var $contrast_1;
   var $keterangan;
   var $deleted;
   var $tlc;
   var $custtlc;
   var $poli;
   var $poli_1;
   var $diag;
   var $jalancode;
   var $periksaname;
   var $instcode;
   var $instcode_1;
   var $jenisinst;
   var $inapclass;
   var $tipehasil;
   var $urutno;
   var $bucode;
   var $buname;
   var $asal;
   var $inst;
   var $tujuan;
   var $petugas;
   var $asallayanan;
   var $sep;
   var $kelompoktarif;
   var $ispl;
   var $plcode;
   var $plname;
   var $plsex;
   var $statusberkas;
   var $statusberkasdate;
   var $statusberkasdate_hora;
   var $picberkas;
   var $alamat;
   var $alamat_1;
   var $sc_field_0;
   var $sc_field_0_1;
   var $usia;
   var $detailrad;
   var $provider;
   var $provider_1;
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
          if (isset($this->NM_ajax_info['param']['alamat']))
          {
              $this->alamat = $this->NM_ajax_info['param']['alamat'];
          }
          if (isset($this->NM_ajax_info['param']['contrast']))
          {
              $this->contrast = $this->NM_ajax_info['param']['contrast'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['custcode']))
          {
              $this->custcode = $this->NM_ajax_info['param']['custcode'];
          }
          if (isset($this->NM_ajax_info['param']['detailrad']))
          {
              $this->detailrad = $this->NM_ajax_info['param']['detailrad'];
          }
          if (isset($this->NM_ajax_info['param']['diag']))
          {
              $this->diag = $this->NM_ajax_info['param']['diag'];
          }
          if (isset($this->NM_ajax_info['param']['doccode']))
          {
              $this->doccode = $this->NM_ajax_info['param']['doccode'];
          }
          if (isset($this->NM_ajax_info['param']['docname']))
          {
              $this->docname = $this->NM_ajax_info['param']['docname'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['inapcode']))
          {
              $this->inapcode = $this->NM_ajax_info['param']['inapcode'];
          }
          if (isset($this->NM_ajax_info['param']['instcode']))
          {
              $this->instcode = $this->NM_ajax_info['param']['instcode'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
          {
              $this->nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['note']))
          {
              $this->note = $this->NM_ajax_info['param']['note'];
          }
          if (isset($this->NM_ajax_info['param']['poli']))
          {
              $this->poli = $this->NM_ajax_info['param']['poli'];
          }
          if (isset($this->NM_ajax_info['param']['provider']))
          {
              $this->provider = $this->NM_ajax_info['param']['provider'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_0']))
          {
              $this->sc_field_0 = $this->NM_ajax_info['param']['sc_field_0'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['status']))
          {
              $this->status = $this->NM_ajax_info['param']['status'];
          }
          if (isset($this->NM_ajax_info['param']['struk']))
          {
              $this->struk = $this->NM_ajax_info['param']['struk'];
          }
          if (isset($this->NM_ajax_info['param']['trancode']))
          {
              $this->trancode = $this->NM_ajax_info['param']['trancode'];
          }
          if (isset($this->NM_ajax_info['param']['trandate']))
          {
              $this->trandate = $this->NM_ajax_info['param']['trandate'];
          }
          if (isset($this->NM_ajax_info['param']['usia']))
          {
              $this->usia = $this->NM_ajax_info['param']['usia'];
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
      $this->sc_conv_var['nama pasien'] = "sc_field_0";
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
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['embutida_parms']);
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
                 nm_limpa_str_form_tbtranrad_inap_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->trandate);
          $this->trandate      = $aDtParts[0];
          $this->trandate_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_tbtranrad_inap_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("id");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("id");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_tbtranrad_inap_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbtranrad_inap_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbtranrad_inap_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbtranrad_inap_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbtranrad_inap_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_tbtranrad_inap_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbtranrad_inap_mob']['label'] = "Edit Transaksi Radiologi";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_tbtranrad_inap_mob")
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


      $_SESSION['scriptcase']['error_icon']['form_tbtranrad_inap_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_tbtranrad_inap_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranrad_inap_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbtranrad_inap_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbtranrad_inap_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_form'];
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['trancode'] != "null"){$this->trancode = $this->nmgp_dados_form['trancode'];} 
          if (!isset($this->source)){$this->source = $this->nmgp_dados_form['source'];} 
          if (!isset($this->periksacode)){$this->periksacode = $this->nmgp_dados_form['periksacode'];} 
          if (!isset($this->enterdate)){$this->enterdate = $this->nmgp_dados_form['enterdate'];} 
          if (!isset($this->finishdate)){$this->finishdate = $this->nmgp_dados_form['finishdate'];} 
          if (!isset($this->keterangan)){$this->keterangan = $this->nmgp_dados_form['keterangan'];} 
          if (!isset($this->deleted)){$this->deleted = $this->nmgp_dados_form['deleted'];} 
          if (!isset($this->tlc)){$this->tlc = $this->nmgp_dados_form['tlc'];} 
          if (!isset($this->custtlc)){$this->custtlc = $this->nmgp_dados_form['custtlc'];} 
          if (!isset($this->jalancode)){$this->jalancode = $this->nmgp_dados_form['jalancode'];} 
          if (!isset($this->periksaname)){$this->periksaname = $this->nmgp_dados_form['periksaname'];} 
          if (!isset($this->jenisinst)){$this->jenisinst = $this->nmgp_dados_form['jenisinst'];} 
          if (!isset($this->inapclass)){$this->inapclass = $this->nmgp_dados_form['inapclass'];} 
          if (!isset($this->tipehasil)){$this->tipehasil = $this->nmgp_dados_form['tipehasil'];} 
          if (!isset($this->urutno)){$this->urutno = $this->nmgp_dados_form['urutno'];} 
          if (!isset($this->bucode)){$this->bucode = $this->nmgp_dados_form['bucode'];} 
          if (!isset($this->buname)){$this->buname = $this->nmgp_dados_form['buname'];} 
          if (!isset($this->asal)){$this->asal = $this->nmgp_dados_form['asal'];} 
          if (!isset($this->inst)){$this->inst = $this->nmgp_dados_form['inst'];} 
          if (!isset($this->tujuan)){$this->tujuan = $this->nmgp_dados_form['tujuan'];} 
          if (!isset($this->petugas)){$this->petugas = $this->nmgp_dados_form['petugas'];} 
          if (!isset($this->asallayanan)){$this->asallayanan = $this->nmgp_dados_form['asallayanan'];} 
          if (!isset($this->sep)){$this->sep = $this->nmgp_dados_form['sep'];} 
          if (!isset($this->kelompoktarif)){$this->kelompoktarif = $this->nmgp_dados_form['kelompoktarif'];} 
          if (!isset($this->ispl)){$this->ispl = $this->nmgp_dados_form['ispl'];} 
          if (!isset($this->plcode)){$this->plcode = $this->nmgp_dados_form['plcode'];} 
          if (!isset($this->plname)){$this->plname = $this->nmgp_dados_form['plname'];} 
          if (!isset($this->plsex)){$this->plsex = $this->nmgp_dados_form['plsex'];} 
          if (!isset($this->statusberkas)){$this->statusberkas = $this->nmgp_dados_form['statusberkas'];} 
          if (!isset($this->statusberkasdate)){$this->statusberkasdate = $this->nmgp_dados_form['statusberkasdate'];} 
          if (!isset($this->picberkas)){$this->picberkas = $this->nmgp_dados_form['picberkas'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['alamat'] != "null"){$this->alamat = $this->nmgp_dados_form['alamat'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['usia'] != "null"){$this->usia = $this->nmgp_dados_form['usia'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_tbtranrad_inap_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_tbtranrad_inap/form_tbtranrad_inap_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_tbtranrad_inap_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_tbtranrad_inap_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_tbtranrad_inap_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_tbtranrad_inap/form_tbtranrad_inap_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_tbtranrad_inap_mob_erro.class.php"); 
      }
      $this->Erro      = new form_tbtranrad_inap_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranrad_inap_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      if ($this->nmgp_opcao == "excluir")
      {
          $GLOBALS['script_case_init'] = $this->Ini->sc_page;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbdetailrad_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbdetailrad_mob') . "/form_tbdetailrad_mob_apl.php");
          $this->form_tbdetailrad_mob = new form_tbdetailrad_mob_apl;
      }
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
      if (isset($this->trancode)) { $this->nm_limpa_alfa($this->trancode); }
      if (isset($this->struk)) { $this->nm_limpa_alfa($this->struk); }
      if (isset($this->custcode)) { $this->nm_limpa_alfa($this->custcode); }
      if (isset($this->inapcode)) { $this->nm_limpa_alfa($this->inapcode); }
      if (isset($this->doccode)) { $this->nm_limpa_alfa($this->doccode); }
      if (isset($this->docname)) { $this->nm_limpa_alfa($this->docname); }
      if (isset($this->note)) { $this->nm_limpa_alfa($this->note); }
      if (isset($this->status)) { $this->nm_limpa_alfa($this->status); }
      if (isset($this->contrast)) { $this->nm_limpa_alfa($this->contrast); }
      if (isset($this->poli)) { $this->nm_limpa_alfa($this->poli); }
      if (isset($this->diag)) { $this->nm_limpa_alfa($this->diag); }
      if (isset($this->instcode)) { $this->nm_limpa_alfa($this->instcode); }
      if (isset($this->detailrad)) { $this->nm_limpa_alfa($this->detailrad); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- trandate
      $this->field_config['trandate']                 = array();
      $this->field_config['trandate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['trandate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['trandate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['trandate']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'trandate');
      //-- source
      $this->field_config['source']               = array();
      $this->field_config['source']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['source']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['source']['symbol_dec'] = '';
      $this->field_config['source']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['source']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- enterdate
      $this->field_config['enterdate']                 = array();
      $this->field_config['enterdate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['enterdate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['enterdate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['enterdate']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'enterdate');
      //-- finishdate
      $this->field_config['finishdate']                 = array();
      $this->field_config['finishdate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['finishdate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['finishdate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['finishdate']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'finishdate');
      //-- deleted
      $this->field_config['deleted']               = array();
      $this->field_config['deleted']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['deleted']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['deleted']['symbol_dec'] = '';
      $this->field_config['deleted']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['deleted']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ispl
      $this->field_config['ispl']               = array();
      $this->field_config['ispl']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ispl']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ispl']['symbol_dec'] = '';
      $this->field_config['ispl']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ispl']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- statusberkasdate
      $this->field_config['statusberkasdate']                 = array();
      $this->field_config['statusberkasdate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['statusberkasdate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['statusberkasdate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['statusberkasdate']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'statusberkasdate');
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
          if ('validate_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id');
          }
          if ('validate_trancode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'trancode');
          }
          if ('validate_inapcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'inapcode');
          }
          if ('validate_trandate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'trandate');
          }
          if ('validate_custcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'custcode');
          }
          if ('validate_instcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'instcode');
          }
          if ('validate_provider' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'provider');
          }
          if ('validate_struk' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'struk');
          }
          if ('validate_sc_field_0' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_0');
          }
          if ('validate_usia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usia');
          }
          if ('validate_alamat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'alamat');
          }
          if ('validate_doccode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'doccode');
          }
          if ('validate_docname' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'docname');
          }
          if ('validate_poli' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'poli');
          }
          if ('validate_diag' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'diag');
          }
          if ('validate_contrast' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contrast');
          }
          if ('validate_note' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'note');
          }
          if ('validate_status' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'status');
          }
          if ('validate_detailrad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detailrad');
          }
          form_tbtranrad_inap_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_inapcode_onchange' == $this->NM_ajax_opcao)
          {
              $this->inapcode_onChange();
          }
          form_tbtranrad_inap_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['trancode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->trancode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['trancode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['inapcode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->inapcode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['inapcode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['struk']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->struk = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['struk'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['usia']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->usia = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['usia'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['alamat']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->alamat = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['alamat'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['doccode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->doccode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['doccode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['docname']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->docname = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']['docname'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_tbtranrad_inap_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_tbtranrad_inap_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_tbtranrad_inap_mob_pack_ajax_response();
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
          form_tbtranrad_inap_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_tbtranrad_inap_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Edit Transaksi Radiologi") ?></TITLE>
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
<form name="Fdown" method="get" action="form_tbtranrad_inap_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_tbtranrad_inap_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_tbtranrad_inap_mob.php" target="_self" style="display: none"> 
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
           case 'id':
               return "ID";
               break;
           case 'trancode':
               return "Kode Transaksi";
               break;
           case 'inapcode':
               return "Kode Inap";
               break;
           case 'trandate':
               return "Tgl. Transaksi";
               break;
           case 'custcode':
               return "No. RM";
               break;
           case 'instcode':
               return "Kode Penjamin";
               break;
           case 'provider':
               return "Nama Provider";
               break;
           case 'struk':
               return "No Struk";
               break;
           case 'sc_field_0':
               return "Nama Pasien";
               break;
           case 'usia':
               return "Usia";
               break;
           case 'alamat':
               return "Alamat";
               break;
           case 'doccode':
               return "Kode Dokter";
               break;
           case 'docname':
               return "Nama Dokter";
               break;
           case 'poli':
               return "Poli";
               break;
           case 'diag':
               return "Diagnosa";
               break;
           case 'contrast':
               return "Kontras";
               break;
           case 'note':
               return "Catatan";
               break;
           case 'status':
               return "Status";
               break;
           case 'detailrad':
               return "";
               break;
           case 'source':
               return "Source";
               break;
           case 'periksacode':
               return "Periksacode";
               break;
           case 'enterdate':
               return "Enterdate";
               break;
           case 'finishdate':
               return "Finishdate";
               break;
           case 'keterangan':
               return "Keterangan";
               break;
           case 'deleted':
               return "Deleted";
               break;
           case 'tlc':
               return "Tlc";
               break;
           case 'custtlc':
               return "Custtlc";
               break;
           case 'jalancode':
               return "Jalancode";
               break;
           case 'periksaname':
               return "Periksaname";
               break;
           case 'jenisinst':
               return "Jenisinst";
               break;
           case 'inapclass':
               return "Inapclass";
               break;
           case 'tipehasil':
               return "Tipehasil";
               break;
           case 'urutno':
               return "Urutno";
               break;
           case 'bucode':
               return "Bucode";
               break;
           case 'buname':
               return "Buname";
               break;
           case 'asal':
               return "Asal";
               break;
           case 'inst':
               return "Inst";
               break;
           case 'tujuan':
               return "Tujuan";
               break;
           case 'petugas':
               return "Petugas";
               break;
           case 'asallayanan':
               return "Asallayanan";
               break;
           case 'sep':
               return "Sep";
               break;
           case 'kelompoktarif':
               return "Kelompoktarif";
               break;
           case 'ispl':
               return "Ispl";
               break;
           case 'plcode':
               return "Plcode";
               break;
           case 'plname':
               return "Plname";
               break;
           case 'plsex':
               return "Plsex";
               break;
           case 'statusberkas':
               return "Statusberkas";
               break;
           case 'statusberkasdate':
               return "Statusberkasdate";
               break;
           case 'picberkas':
               return "Picberkas";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_tbtranrad_inap_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_tbtranrad_inap_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_tbtranrad_inap_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_tbtranrad_inap_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id' == $filtro)
        $this->ValidateField_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'trancode' == $filtro)
        $this->ValidateField_trancode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'inapcode' == $filtro)
        $this->ValidateField_inapcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'trandate' == $filtro)
        $this->ValidateField_trandate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'custcode' == $filtro)
        $this->ValidateField_custcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'instcode' == $filtro)
        $this->ValidateField_instcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'provider' == $filtro)
        $this->ValidateField_provider($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'struk' == $filtro)
        $this->ValidateField_struk($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_0' == $filtro)
        $this->ValidateField_sc_field_0($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'usia' == $filtro)
        $this->ValidateField_usia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'alamat' == $filtro)
        $this->ValidateField_alamat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'doccode' == $filtro)
        $this->ValidateField_doccode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'docname' == $filtro)
        $this->ValidateField_docname($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'poli' == $filtro)
        $this->ValidateField_poli($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'diag' == $filtro)
        $this->ValidateField_diag($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contrast' == $filtro)
        $this->ValidateField_contrast($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'note' == $filtro)
        $this->ValidateField_note($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'status' == $filtro)
        $this->ValidateField_status($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detailrad' == $filtro)
        $this->ValidateField_detailrad($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->id === "" || is_null($this->id))  
      { 
          $this->id = 0;
      } 
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->id != '')  
          { 
              $iTestSize = 15;
              if (strlen($this->id) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id']))
                  {
                      $Campos_Erros['id'] = array();
                  }
                  $Campos_Erros['id'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id, 15, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ID; " ; 
                  if (!isset($Campos_Erros['id']))
                  {
                      $Campos_Erros['id'] = array();
                  }
                  $Campos_Erros['id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id

    function ValidateField_trancode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->trancode) > 13) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Transaksi " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 13 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['trancode']))
              {
                  $Campos_Erros['trancode'] = array();
              }
              $Campos_Erros['trancode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 13 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['trancode']) || !is_array($this->NM_ajax_info['errList']['trancode']))
              {
                  $this->NM_ajax_info['errList']['trancode'] = array();
              }
              $this->NM_ajax_info['errList']['trancode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 13 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'trancode';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_trancode

    function ValidateField_inapcode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->inapcode) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Inap " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['inapcode']))
              {
                  $Campos_Erros['inapcode'] = array();
              }
              $Campos_Erros['inapcode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['inapcode']) || !is_array($this->NM_ajax_info['errList']['inapcode']))
              {
                  $this->NM_ajax_info['errList']['inapcode'] = array();
              }
              $this->NM_ajax_info['errList']['inapcode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'inapcode';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_inapcode

    function ValidateField_trandate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->trandate, $this->field_config['trandate']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['trandate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['trandate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['trandate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['trandate']['date_sep']) ; 
          if (trim($this->trandate) != "")  
          { 
              if ($teste_validade->Data($this->trandate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tgl. Transaksi; " ; 
                  if (!isset($Campos_Erros['trandate']))
                  {
                      $Campos_Erros['trandate'] = array();
                  }
                  $Campos_Erros['trandate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['trandate']) || !is_array($this->NM_ajax_info['errList']['trandate']))
                  {
                      $this->NM_ajax_info['errList']['trandate'] = array();
                  }
                  $this->NM_ajax_info['errList']['trandate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['trandate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'trandate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->trandate_hora, $this->field_config['trandate_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['trandate_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['trandate_hora']['time_sep']) ; 
          if (trim($this->trandate_hora) != "")  
          { 
              if ($teste_validade->Hora($this->trandate_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tgl. Transaksi; " ; 
                  if (!isset($Campos_Erros['trandate_hora']))
                  {
                      $Campos_Erros['trandate_hora'] = array();
                  }
                  $Campos_Erros['trandate_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['trandate']) || !is_array($this->NM_ajax_info['errList']['trandate']))
                  {
                      $this->NM_ajax_info['errList']['trandate'] = array();
                  }
                  $this->NM_ajax_info['errList']['trandate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['trandate']) && isset($Campos_Erros['trandate_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['trandate'], $Campos_Erros['trandate_hora']);
          if (empty($Campos_Erros['trandate_hora']))
          {
              unset($Campos_Erros['trandate_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['trandate']))
          {
              $this->NM_ajax_info['errList']['trandate'] = array_unique($this->NM_ajax_info['errList']['trandate']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'trandate_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_trandate_hora

    function ValidateField_custcode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->custcode) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode']) && !in_array($this->custcode, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['custcode']))
                   {
                       $Campos_Erros['custcode'] = array();
                   }
                   $Campos_Erros['custcode'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['custcode']) || !is_array($this->NM_ajax_info['errList']['custcode']))
                   {
                       $this->NM_ajax_info['errList']['custcode'] = array();
                   }
                   $this->NM_ajax_info['errList']['custcode'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'custcode';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_custcode

    function ValidateField_instcode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->instcode) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode']) && !in_array($this->instcode, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['instcode']))
                   {
                       $Campos_Erros['instcode'] = array();
                   }
                   $Campos_Erros['instcode'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['instcode']) || !is_array($this->NM_ajax_info['errList']['instcode']))
                   {
                       $this->NM_ajax_info['errList']['instcode'] = array();
                   }
                   $this->NM_ajax_info['errList']['instcode'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
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

    function ValidateField_provider(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->provider) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider']) && !in_array($this->provider, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['provider']))
                   {
                       $Campos_Erros['provider'] = array();
                   }
                   $Campos_Erros['provider'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['provider']) || !is_array($this->NM_ajax_info['errList']['provider']))
                   {
                       $this->NM_ajax_info['errList']['provider'] = array();
                   }
                   $this->NM_ajax_info['errList']['provider'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'provider';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_provider

    function ValidateField_struk(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->struk) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk']) && !in_array($this->struk, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['struk']))
                   {
                       $Campos_Erros['struk'] = array();
                   }
                   $Campos_Erros['struk'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['struk']) || !is_array($this->NM_ajax_info['errList']['struk']))
                   {
                       $this->NM_ajax_info['errList']['struk'] = array();
                   }
                   $this->NM_ajax_info['errList']['struk'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'struk';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_struk

    function ValidateField_sc_field_0(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->sc_field_0) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0']) && !in_array($this->sc_field_0, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['sc_field_0']))
                   {
                       $Campos_Erros['sc_field_0'] = array();
                   }
                   $Campos_Erros['sc_field_0'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['sc_field_0']) || !is_array($this->NM_ajax_info['errList']['sc_field_0']))
                   {
                       $this->NM_ajax_info['errList']['sc_field_0'] = array();
                   }
                   $this->NM_ajax_info['errList']['sc_field_0'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sc_field_0';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sc_field_0

    function ValidateField_usia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->usia) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Usia " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['usia']))
              {
                  $Campos_Erros['usia'] = array();
              }
              $Campos_Erros['usia'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['usia']) || !is_array($this->NM_ajax_info['errList']['usia']))
              {
                  $this->NM_ajax_info['errList']['usia'] = array();
              }
              $this->NM_ajax_info['errList']['usia'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'usia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_usia

    function ValidateField_alamat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->alamat) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat']) && !in_array($this->alamat, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['alamat']))
                   {
                       $Campos_Erros['alamat'] = array();
                   }
                   $Campos_Erros['alamat'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['alamat']) || !is_array($this->NM_ajax_info['errList']['alamat']))
                   {
                       $this->NM_ajax_info['errList']['alamat'] = array();
                   }
                   $this->NM_ajax_info['errList']['alamat'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'alamat';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_alamat

    function ValidateField_doccode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->doccode) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode']) && !in_array($this->doccode, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['doccode']))
                   {
                       $Campos_Erros['doccode'] = array();
                   }
                   $Campos_Erros['doccode'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['doccode']) || !is_array($this->NM_ajax_info['errList']['doccode']))
                   {
                       $this->NM_ajax_info['errList']['doccode'] = array();
                   }
                   $this->NM_ajax_info['errList']['doccode'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'doccode';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_doccode

    function ValidateField_docname(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->docname) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname']) && !in_array($this->docname, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['docname']))
                   {
                       $Campos_Erros['docname'] = array();
                   }
                   $Campos_Erros['docname'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['docname']) || !is_array($this->NM_ajax_info['errList']['docname']))
                   {
                       $this->NM_ajax_info['errList']['docname'] = array();
                   }
                   $this->NM_ajax_info['errList']['docname'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'docname';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_docname

    function ValidateField_poli(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->poli) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli']) && !in_array($this->poli, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['poli']))
                   {
                       $Campos_Erros['poli'] = array();
                   }
                   $Campos_Erros['poli'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['poli']) || !is_array($this->NM_ajax_info['errList']['poli']))
                   {
                       $this->NM_ajax_info['errList']['poli'] = array();
                   }
                   $this->NM_ajax_info['errList']['poli'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'poli';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_poli

    function ValidateField_diag(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->diag) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Diagnosa " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['diag']))
              {
                  $Campos_Erros['diag'] = array();
              }
              $Campos_Erros['diag'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['diag']) || !is_array($this->NM_ajax_info['errList']['diag']))
              {
                  $this->NM_ajax_info['errList']['diag'] = array();
              }
              $this->NM_ajax_info['errList']['diag'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'diag';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_diag

    function ValidateField_contrast(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->contrast == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'contrast';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_contrast

    function ValidateField_note(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->note) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Catatan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['note']))
              {
                  $Campos_Erros['note'] = array();
              }
              $Campos_Erros['note'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['note']) || !is_array($this->NM_ajax_info['errList']['note']))
              {
                  $this->NM_ajax_info['errList']['note'] = array();
              }
              $this->NM_ajax_info['errList']['note'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'note';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_note

    function ValidateField_status(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->status == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->status === "" || is_null($this->status))  
      { 
          $this->status = 0;
          $this->sc_force_zero[] = 'status';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'status';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_status

    function ValidateField_detailrad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detailrad) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detailrad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detailrad

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
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['trancode'] = $this->trancode;
    $this->nmgp_dados_form['inapcode'] = $this->inapcode;
    $this->nmgp_dados_form['trandate'] = (strlen(trim($this->trandate)) > 19) ? str_replace(".", ":", $this->trandate) : trim($this->trandate);
    $this->nmgp_dados_form['custcode'] = $this->custcode;
    $this->nmgp_dados_form['instcode'] = $this->instcode;
    $this->nmgp_dados_form['provider'] = $this->provider;
    $this->nmgp_dados_form['struk'] = $this->struk;
    $this->nmgp_dados_form['sc_field_0'] = $this->sc_field_0;
    $this->nmgp_dados_form['usia'] = $this->usia;
    $this->nmgp_dados_form['alamat'] = $this->alamat;
    $this->nmgp_dados_form['doccode'] = $this->doccode;
    $this->nmgp_dados_form['docname'] = $this->docname;
    $this->nmgp_dados_form['poli'] = $this->poli;
    $this->nmgp_dados_form['diag'] = $this->diag;
    $this->nmgp_dados_form['contrast'] = $this->contrast;
    $this->nmgp_dados_form['note'] = $this->note;
    $this->nmgp_dados_form['status'] = $this->status;
    $this->nmgp_dados_form['detailrad'] = $this->detailrad;
    $this->nmgp_dados_form['source'] = $this->source;
    $this->nmgp_dados_form['periksacode'] = $this->periksacode;
    $this->nmgp_dados_form['enterdate'] = $this->enterdate;
    $this->nmgp_dados_form['finishdate'] = $this->finishdate;
    $this->nmgp_dados_form['keterangan'] = $this->keterangan;
    $this->nmgp_dados_form['deleted'] = $this->deleted;
    $this->nmgp_dados_form['tlc'] = $this->tlc;
    $this->nmgp_dados_form['custtlc'] = $this->custtlc;
    $this->nmgp_dados_form['jalancode'] = $this->jalancode;
    $this->nmgp_dados_form['periksaname'] = $this->periksaname;
    $this->nmgp_dados_form['jenisinst'] = $this->jenisinst;
    $this->nmgp_dados_form['inapclass'] = $this->inapclass;
    $this->nmgp_dados_form['tipehasil'] = $this->tipehasil;
    $this->nmgp_dados_form['urutno'] = $this->urutno;
    $this->nmgp_dados_form['bucode'] = $this->bucode;
    $this->nmgp_dados_form['buname'] = $this->buname;
    $this->nmgp_dados_form['asal'] = $this->asal;
    $this->nmgp_dados_form['inst'] = $this->inst;
    $this->nmgp_dados_form['tujuan'] = $this->tujuan;
    $this->nmgp_dados_form['petugas'] = $this->petugas;
    $this->nmgp_dados_form['asallayanan'] = $this->asallayanan;
    $this->nmgp_dados_form['sep'] = $this->sep;
    $this->nmgp_dados_form['kelompoktarif'] = $this->kelompoktarif;
    $this->nmgp_dados_form['ispl'] = $this->ispl;
    $this->nmgp_dados_form['plcode'] = $this->plcode;
    $this->nmgp_dados_form['plname'] = $this->plname;
    $this->nmgp_dados_form['plsex'] = $this->plsex;
    $this->nmgp_dados_form['statusberkas'] = $this->statusberkas;
    $this->nmgp_dados_form['statusberkasdate'] = $this->statusberkasdate;
    $this->nmgp_dados_form['picberkas'] = $this->picberkas;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['id'] = $this->id;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      $this->Before_unformat['trandate'] = $this->trandate;
      nm_limpa_data($this->trandate, $this->field_config['trandate']['date_sep']) ; 
      nm_limpa_hora($this->trandate_hora, $this->field_config['trandate']['time_sep']) ; 
      $this->Before_unformat['source'] = $this->source;
      nm_limpa_numero($this->source, $this->field_config['source']['symbol_grp']) ; 
      $this->Before_unformat['enterdate'] = $this->enterdate;
      nm_limpa_data($this->enterdate, $this->field_config['enterdate']['date_sep']) ; 
      nm_limpa_hora($this->enterdate_hora, $this->field_config['enterdate']['time_sep']) ; 
      $this->Before_unformat['finishdate'] = $this->finishdate;
      nm_limpa_data($this->finishdate, $this->field_config['finishdate']['date_sep']) ; 
      nm_limpa_hora($this->finishdate_hora, $this->field_config['finishdate']['time_sep']) ; 
      $this->Before_unformat['deleted'] = $this->deleted;
      nm_limpa_numero($this->deleted, $this->field_config['deleted']['symbol_grp']) ; 
      $this->Before_unformat['ispl'] = $this->ispl;
      nm_limpa_numero($this->ispl, $this->field_config['ispl']['symbol_grp']) ; 
      $this->Before_unformat['statusberkasdate'] = $this->statusberkasdate;
      nm_limpa_data($this->statusberkasdate, $this->field_config['statusberkasdate']['date_sep']) ; 
      nm_limpa_hora($this->statusberkasdate_hora, $this->field_config['statusberkasdate']['time_sep']) ; 
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
      if ($Nome_Campo == "id")
      {
          nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "source")
      {
          nm_limpa_numero($this->source, $this->field_config['source']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "deleted")
      {
          nm_limpa_numero($this->deleted, $this->field_config['deleted']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ispl")
      {
          nm_limpa_numero($this->ispl, $this->field_config['ispl']['symbol_grp']) ; 
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
      if ('' !== $this->id || (!empty($format_fields) && isset($format_fields['id'])))
      {
          nmgp_Form_Num_Val($this->id, $this->field_config['id']['symbol_grp'], $this->field_config['id']['symbol_dec'], "0", "S", $this->field_config['id']['format_neg'], "", "", "-", $this->field_config['id']['symbol_fmt']) ; 
      }
      if ((!empty($this->trandate) && 'null' != $this->trandate) || (!empty($format_fields) && isset($format_fields['trandate'])))
      {
          $nm_separa_data = strpos($this->field_config['trandate']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['trandate']['date_format'];
          $this->field_config['trandate']['date_format'] = substr($this->field_config['trandate']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->trandate, " ") ; 
          $this->trandate_hora = substr($this->trandate, $separador + 1) ; 
          $this->trandate = substr($this->trandate, 0, $separador) ; 
          nm_volta_data($this->trandate, $this->field_config['trandate']['date_format']) ; 
          nmgp_Form_Datas($this->trandate, $this->field_config['trandate']['date_format'], $this->field_config['trandate']['date_sep']) ;  
          $this->field_config['trandate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->trandate_hora, $this->field_config['trandate']['date_format']) ; 
          nmgp_Form_Hora($this->trandate_hora, $this->field_config['trandate']['date_format'], $this->field_config['trandate']['time_sep']) ;  
          $this->field_config['trandate']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->trandate || '' == $this->trandate)
      {
          $this->trandate_hora = '';
          $this->trandate = '';
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
      $guarda_format_hora = $this->field_config['trandate']['date_format'];
      if ($this->trandate != "")  
      { 
          $nm_separa_data = strpos($this->field_config['trandate']['date_format'], ";") ;
          $this->field_config['trandate']['date_format'] = substr($this->field_config['trandate']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->trandate, $this->field_config['trandate']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->trandate = str_replace('-', '', $this->trandate);
          }
          $this->field_config['trandate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->trandate_hora, $this->field_config['trandate']['date_format']) ; 
          if ($this->trandate_hora == "" )  
          { 
              $this->trandate_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->trandate_hora = substr($this->trandate_hora, 0, -4) . "." . substr($this->trandate_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->trandate_hora = substr($this->trandate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->trandate_hora = substr($this->trandate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->trandate_hora = substr($this->trandate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->trandate_hora = substr($this->trandate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->trandate_hora = substr($this->trandate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->trandate_hora = substr($this->trandate_hora, 0, -4);
          }
          if ($this->trandate != "")  
          { 
              $this->trandate .= " " . $this->trandate_hora ; 
          }
      } 
      if ($this->trandate == "" && $use_null)  
      { 
          $this->trandate = "null" ; 
      } 
      $this->field_config['trandate']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_id();
          $this->ajax_return_values_trancode();
          $this->ajax_return_values_inapcode();
          $this->ajax_return_values_trandate();
          $this->ajax_return_values_custcode();
          $this->ajax_return_values_instcode();
          $this->ajax_return_values_provider();
          $this->ajax_return_values_struk();
          $this->ajax_return_values_sc_field_0();
          $this->ajax_return_values_usia();
          $this->ajax_return_values_alamat();
          $this->ajax_return_values_doccode();
          $this->ajax_return_values_docname();
          $this->ajax_return_values_poli();
          $this->ajax_return_values_diag();
          $this->ajax_return_values_contrast();
          $this->ajax_return_values_note();
          $this->ajax_return_values_status();
          $this->ajax_return_values_detailrad();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_tbtranrad_inap_mob_pack_protect_string($this->nmgp_dados_form['id']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['where_filter'] = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['where_detal']  = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['total']);
              }
          }
   } // ajax_return_values

          //----- id
   function ajax_return_values_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- trancode
   function ajax_return_values_trancode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("trancode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->trancode);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['trancode'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- inapcode
   function ajax_return_values_inapcode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("inapcode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->inapcode);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['inapcode'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- trandate
   function ajax_return_values_trandate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("trandate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->trandate);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['trandate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->trandate . ' ' . $this->trandate_hora),
              );
          }
   }

          //----- custcode
   function ajax_return_values_custcode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("custcode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->custcode);
              $aLookup = array();
              $this->_tmp_lookup_custcode = $this->custcode;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT custCode FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY custCode";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"custcode\"";
          if (isset($this->NM_ajax_info['select_html']['custcode']) && !empty($this->NM_ajax_info['select_html']['custcode']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['custcode'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->custcode == $sValue)
                  {
                      $this->_tmp_lookup_custcode = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['custcode'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['custcode']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['custcode']['valList'][$i] = form_tbtranrad_inap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['custcode']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['custcode']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['custcode']['labList'] = $aLabel;
          }
   }

          //----- instcode
   function ajax_return_values_instcode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("instcode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->instcode);
              $aLookup = array();
              $this->_tmp_lookup_instcode = $this->instcode;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT provider, provider  FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY provider";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"instcode\"";
          if (isset($this->NM_ajax_info['select_html']['instcode']) && !empty($this->NM_ajax_info['select_html']['instcode']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['instcode'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->instcode == $sValue)
                  {
                      $this->_tmp_lookup_instcode = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['instcode'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['instcode']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['instcode']['valList'][$i] = form_tbtranrad_inap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['instcode']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['instcode']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['instcode']['labList'] = $aLabel;
          }
   }

          //----- provider
   function ajax_return_values_provider($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("provider", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->provider);
              $aLookup = array();
              $this->_tmp_lookup_provider = $this->provider;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT name  FROM tbinstansi where instCode = '$this->instcode'  ORDER BY name";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"provider\"";
          if (isset($this->NM_ajax_info['select_html']['provider']) && !empty($this->NM_ajax_info['select_html']['provider']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['provider'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->provider == $sValue)
                  {
                      $this->_tmp_lookup_provider = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['provider'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['provider']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['provider']['valList'][$i] = form_tbtranrad_inap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['provider']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['provider']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['provider']['labList'] = $aLabel;
          }
   }

          //----- struk
   function ajax_return_values_struk($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("struk", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->struk);
              $aLookup = array();
              $this->_tmp_lookup_struk = $this->struk;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT struckNo, struckNo  FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY struckNo DESC";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[1] = str_replace(',', '.', $rs->fields[1]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[1] = (strpos(strtolower($rs->fields[1]), "e")) ? (float)$rs->fields[1] : $rs->fields[1];
              $rs->fields[1] = (string)$rs->fields[1];
              $aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"struk\"";
          if (isset($this->NM_ajax_info['select_html']['struk']) && !empty($this->NM_ajax_info['select_html']['struk']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['struk'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->struk == $sValue)
                  {
                      $this->_tmp_lookup_struk = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['struk'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['struk']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['struk']['valList'][$i] = form_tbtranrad_inap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['struk']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['struk']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['struk']['labList'] = $aLabel;
          }
   }

          //----- sc_field_0
   function ajax_return_values_sc_field_0($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_0", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_0);
              $aLookup = array();
              $this->_tmp_lookup_sc_field_0 = $this->sc_field_0;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custcode, name + ', ' + salut  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custcode, concat(name,', ', salut)  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custcode, name&', '&salut  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custcode, name||', '||salut  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custcode, name + ', ' + salut  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custcode, name||', '||salut  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }
   else
   {
       $nm_comando = "SELECT custcode, name||', '||salut  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"sc_field_0\"";
          if (isset($this->NM_ajax_info['select_html']['sc_field_0']) && !empty($this->NM_ajax_info['select_html']['sc_field_0']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['sc_field_0'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->sc_field_0 == $sValue)
                  {
                      $this->_tmp_lookup_sc_field_0 = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['sc_field_0'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sc_field_0']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sc_field_0']['valList'][$i] = form_tbtranrad_inap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sc_field_0']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sc_field_0']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sc_field_0']['labList'] = $aLabel;
          }
   }

          //----- usia
   function ajax_return_values_usia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("usia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->usia);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['usia'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- alamat
   function ajax_return_values_alamat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("alamat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->alamat);
              $aLookup = array();
              $this->_tmp_lookup_alamat = $this->alamat;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT address, address FROM tbcustomer where custCode = '$this->custcode'";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"alamat\"";
          if (isset($this->NM_ajax_info['select_html']['alamat']) && !empty($this->NM_ajax_info['select_html']['alamat']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['alamat'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->alamat == $sValue)
                  {
                      $this->_tmp_lookup_alamat = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['alamat'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['alamat']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['alamat']['valList'][$i] = form_tbtranrad_inap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['alamat']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['alamat']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['alamat']['labList'] = $aLabel;
          }
   }

          //----- doccode
   function ajax_return_values_doccode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("doccode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->doccode);
              $aLookup = array();
              $this->_tmp_lookup_doccode = $this->doccode;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT doctor, doctor  FROM tbadmrawatinap where struckNo = '$this->struk' ORDER BY doctor";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"doccode\"";
          if (isset($this->NM_ajax_info['select_html']['doccode']) && !empty($this->NM_ajax_info['select_html']['doccode']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['doccode'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->doccode == $sValue)
                  {
                      $this->_tmp_lookup_doccode = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['doccode'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['doccode']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['doccode']['valList'][$i] = form_tbtranrad_inap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['doccode']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['doccode']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['doccode']['labList'] = $aLabel;
          }
   }

          //----- docname
   function ajax_return_values_docname($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("docname", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->docname);
              $aLookup = array();
              $this->_tmp_lookup_docname = $this->docname;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT name, gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT name, concat(gelar,' ', name,', ', spec)  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT name, gelar&' '&name&', '&spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT name, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT name, gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT name, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   else
   {
       $nm_comando = "SELECT name, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '$this->doccode'";
   }

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"docname\"";
          if (isset($this->NM_ajax_info['select_html']['docname']) && !empty($this->NM_ajax_info['select_html']['docname']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['docname'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->docname == $sValue)
                  {
                      $this->_tmp_lookup_docname = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['docname'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['docname']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['docname']['valList'][$i] = form_tbtranrad_inap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['docname']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['docname']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['docname']['labList'] = $aLabel;
          }
   }

          //----- poli
   function ajax_return_values_poli($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("poli", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->poli);
              $aLookup = array();
              $this->_tmp_lookup_poli = $this->poli;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT b.polyCode, b.name FROM tbdoctor a left join tbpoli b on b.polyCode = a.poli where a.docCode = '$this->doccode'";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranrad_inap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"poli\"";
          if (isset($this->NM_ajax_info['select_html']['poli']) && !empty($this->NM_ajax_info['select_html']['poli']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['poli'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->poli == $sValue)
                  {
                      $this->_tmp_lookup_poli = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['poli'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['poli']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['poli']['valList'][$i] = form_tbtranrad_inap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['poli']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['poli']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['poli']['labList'] = $aLabel;
          }
   }

          //----- diag
   function ajax_return_values_diag($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("diag", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->diag);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['diag'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- contrast
   function ajax_return_values_contrast($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contrast", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contrast);
              $aLookup = array();
              $this->_tmp_lookup_contrast = $this->contrast;

$aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string('Y') => form_tbtranrad_inap_mob_pack_protect_string("Ya"));
$aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string('N') => form_tbtranrad_inap_mob_pack_protect_string("Tidak"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_contrast'][] = 'Y';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_contrast'][] = 'N';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"contrast\"";
          if (isset($this->NM_ajax_info['select_html']['contrast']) && !empty($this->NM_ajax_info['select_html']['contrast']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['contrast'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->contrast == $sValue)
                  {
                      $this->_tmp_lookup_contrast = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['contrast'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['contrast']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['contrast']['valList'][$i] = form_tbtranrad_inap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['contrast']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['contrast']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['contrast']['labList'] = $aLabel;
          }
   }

          //----- note
   function ajax_return_values_note($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("note", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->note);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['note'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- status
   function ajax_return_values_status($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("status", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->status);
              $aLookup = array();
              $this->_tmp_lookup_status = $this->status;

$aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string('0') => form_tbtranrad_inap_mob_pack_protect_string("Daftar"));
$aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string('1') => form_tbtranrad_inap_mob_pack_protect_string("Selesai"));
$aLookup[] = array(form_tbtranrad_inap_mob_pack_protect_string('2') => form_tbtranrad_inap_mob_pack_protect_string("Lengkap"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_status'][] = '0';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_status'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_status'][] = '2';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"status\"";
          if (isset($this->NM_ajax_info['select_html']['status']) && !empty($this->NM_ajax_info['select_html']['status']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['status'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->status == $sValue)
                  {
                      $this->_tmp_lookup_status = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['status'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['status']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['status']['valList'][$i] = form_tbtranrad_inap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['status']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['status']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['status']['labList'] = $aLabel;
          }
   }

          //----- detailrad
   function ajax_return_values_detailrad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detailrad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detailrad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detailrad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['upload_dir'][$fieldName][] = $newName;
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
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_custcode = $this->custcode;
}
  if($this->custcode  != ''){
$check_sql = "SELECT date(birthDate), date(registerDate)"
   . " FROM tbcustomer"
   . " WHERE custCode = '" . $this->custcode  . "'";
 
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
    $tgl_lahir = $this->rs[0][0];
}

$lahir = new DateTime($tgl_lahir);
$today = new DateTime();
$umur = $today->diff($lahir);
$this->usia  = $umur->y . " TH " . $umur->m . " BLN " . $umur->d . " HR";
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_custcode != $this->custcode || (isset($bFlagRead_custcode) && $bFlagRead_custcode)))
    {
        $this->ajax_return_values_custcode(true);
    }
}
$_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'off'; 
      }
      if (empty($this->trandate))
      {
          $this->trandate_hora = $this->trandate;
      }
      if (empty($this->enterdate))
      {
          $this->enterdate_hora = $this->enterdate;
      }
      if (empty($this->finishdate))
      {
          $this->finishdate_hora = $this->finishdate;
      }
      if (empty($this->statusberkasdate))
      {
          $this->statusberkasdate_hora = $this->statusberkasdate;
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((id < $this->id))";
      if ('' != $sc_where)
      {
          if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
          {
              $sc_where = substr(trim($sc_where), 6);
          }
          if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
          {
              $sc_where = substr(trim($sc_where), 4);
          }
          $sc_where_pos .= ' AND (' . $sc_where . ')';
          $sc_where = ' WHERE ' . $sc_where;
      }
      if ('' != $this->id)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] = $rsc->fields[0];
          $rsc->Close();
      }
   }

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
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_trancode = $this->trancode;
}
  $today = date("ym");
$check_sql = "SELECT max(trancode) FROM tbtranrad  WHERE trancode LIKE 'RD$today%'";
 
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
    $lastNoTransaksi = $this->rs[0][0];
	$lastNoUrut = substr($lastNoTransaksi, 6, 5); 
	$nextNoUrut = $lastNoUrut + 1;
	$this->trancode  = 'RD'.$today.sprintf('%05s', $nextNoUrut);
}
		else     
{
	$this->trancode  = 'RD'.$today.sprintf('%05s', '1');
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_trancode != $this->trancode || (isset($bFlagRead_trancode) && $bFlagRead_trancode)))
    {
        $this->ajax_return_values_trancode(true);
    }
}
$_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_custcode = $this->custcode;
}
  $check_sql = "SELECT date(birthDate)"
   . " FROM tbcustomer"
   . " WHERE custCode = '" . $this->custcode  . "'";
 
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
    $tgl_lahir = $this->rs[0][0];
}

$lahir = new DateTime($tgl_lahir);
$today = new DateTime();
$umur = $today->diff($lahir);
$this->usia  = $umur->y . " TH " . $umur->m . " BLN " . $umur->d . " HR";
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_custcode != $this->custcode || (isset($bFlagRead_custcode) && $bFlagRead_custcode)))
    {
        $this->ajax_return_values_custcode(true);
    }
}
$_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
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
      $NM_val_form['id'] = $this->id;
      $NM_val_form['trancode'] = $this->trancode;
      $NM_val_form['inapcode'] = $this->inapcode;
      $NM_val_form['trandate'] = $this->trandate;
      $NM_val_form['custcode'] = $this->custcode;
      $NM_val_form['instcode'] = $this->instcode;
      $NM_val_form['provider'] = $this->provider;
      $NM_val_form['struk'] = $this->struk;
      $NM_val_form['sc_field_0'] = $this->sc_field_0;
      $NM_val_form['usia'] = $this->usia;
      $NM_val_form['alamat'] = $this->alamat;
      $NM_val_form['doccode'] = $this->doccode;
      $NM_val_form['docname'] = $this->docname;
      $NM_val_form['poli'] = $this->poli;
      $NM_val_form['diag'] = $this->diag;
      $NM_val_form['contrast'] = $this->contrast;
      $NM_val_form['note'] = $this->note;
      $NM_val_form['status'] = $this->status;
      $NM_val_form['detailrad'] = $this->detailrad;
      $NM_val_form['source'] = $this->source;
      $NM_val_form['periksacode'] = $this->periksacode;
      $NM_val_form['enterdate'] = $this->enterdate;
      $NM_val_form['finishdate'] = $this->finishdate;
      $NM_val_form['keterangan'] = $this->keterangan;
      $NM_val_form['deleted'] = $this->deleted;
      $NM_val_form['tlc'] = $this->tlc;
      $NM_val_form['custtlc'] = $this->custtlc;
      $NM_val_form['jalancode'] = $this->jalancode;
      $NM_val_form['periksaname'] = $this->periksaname;
      $NM_val_form['jenisinst'] = $this->jenisinst;
      $NM_val_form['inapclass'] = $this->inapclass;
      $NM_val_form['tipehasil'] = $this->tipehasil;
      $NM_val_form['urutno'] = $this->urutno;
      $NM_val_form['bucode'] = $this->bucode;
      $NM_val_form['buname'] = $this->buname;
      $NM_val_form['asal'] = $this->asal;
      $NM_val_form['inst'] = $this->inst;
      $NM_val_form['tujuan'] = $this->tujuan;
      $NM_val_form['petugas'] = $this->petugas;
      $NM_val_form['asallayanan'] = $this->asallayanan;
      $NM_val_form['sep'] = $this->sep;
      $NM_val_form['kelompoktarif'] = $this->kelompoktarif;
      $NM_val_form['ispl'] = $this->ispl;
      $NM_val_form['plcode'] = $this->plcode;
      $NM_val_form['plname'] = $this->plname;
      $NM_val_form['plsex'] = $this->plsex;
      $NM_val_form['statusberkas'] = $this->statusberkas;
      $NM_val_form['statusberkasdate'] = $this->statusberkasdate;
      $NM_val_form['picberkas'] = $this->picberkas;
      if ($this->id === "" || is_null($this->id))  
      { 
          $this->id = 0;
      } 
      if ($this->source === "" || is_null($this->source))  
      { 
          $this->source = 0;
          $this->sc_force_zero[] = 'source';
      } 
      if ($this->status === "" || is_null($this->status))  
      { 
          $this->status = 0;
          $this->sc_force_zero[] = 'status';
      } 
      if ($this->deleted === "" || is_null($this->deleted))  
      { 
          $this->deleted = 0;
          $this->sc_force_zero[] = 'deleted';
      } 
      if ($this->ispl === "" || is_null($this->ispl))  
      { 
          $this->ispl = 0;
          $this->sc_force_zero[] = 'ispl';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->trancode_before_qstr = $this->trancode;
          $this->trancode = substr($this->Db->qstr($this->trancode), 1, -1); 
          if ($this->trancode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->trancode = "null"; 
              $NM_val_null[] = "trancode";
          } 
          $this->struk_before_qstr = $this->struk;
          $this->struk = substr($this->Db->qstr($this->struk), 1, -1); 
          if ($this->struk == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->struk = "null"; 
              $NM_val_null[] = "struk";
          } 
          $this->custcode_before_qstr = $this->custcode;
          $this->custcode = substr($this->Db->qstr($this->custcode), 1, -1); 
          if ($this->custcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->custcode = "null"; 
              $NM_val_null[] = "custcode";
          } 
          $this->inapcode_before_qstr = $this->inapcode;
          $this->inapcode = substr($this->Db->qstr($this->inapcode), 1, -1); 
          if ($this->inapcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->inapcode = "null"; 
              $NM_val_null[] = "inapcode";
          } 
          $this->doccode_before_qstr = $this->doccode;
          $this->doccode = substr($this->Db->qstr($this->doccode), 1, -1); 
          if ($this->doccode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->doccode = "null"; 
              $NM_val_null[] = "doccode";
          } 
          $this->docname_before_qstr = $this->docname;
          $this->docname = substr($this->Db->qstr($this->docname), 1, -1); 
          if ($this->docname == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->docname = "null"; 
              $NM_val_null[] = "docname";
          } 
          $this->periksacode_before_qstr = $this->periksacode;
          $this->periksacode = substr($this->Db->qstr($this->periksacode), 1, -1); 
          if ($this->periksacode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->periksacode = "null"; 
              $NM_val_null[] = "periksacode";
          } 
          $this->note_before_qstr = $this->note;
          $this->note = substr($this->Db->qstr($this->note), 1, -1); 
          if ($this->note == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->note = "null"; 
              $NM_val_null[] = "note";
          } 
          if ($this->trandate == "")  
          { 
              $this->trandate = "null"; 
              $NM_val_null[] = "trandate";
          } 
          if ($this->enterdate == "")  
          { 
              $this->enterdate = "null"; 
              $NM_val_null[] = "enterdate";
          } 
          if ($this->finishdate == "")  
          { 
              $this->finishdate = "null"; 
              $NM_val_null[] = "finishdate";
          } 
          $this->contrast_before_qstr = $this->contrast;
          $this->contrast = substr($this->Db->qstr($this->contrast), 1, -1); 
          if ($this->contrast == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contrast = "null"; 
              $NM_val_null[] = "contrast";
          } 
          $this->keterangan_before_qstr = $this->keterangan;
          $this->keterangan = substr($this->Db->qstr($this->keterangan), 1, -1); 
          if ($this->keterangan == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->keterangan = "null"; 
              $NM_val_null[] = "keterangan";
          } 
          $this->tlc_before_qstr = $this->tlc;
          $this->tlc = substr($this->Db->qstr($this->tlc), 1, -1); 
          if ($this->tlc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tlc = "null"; 
              $NM_val_null[] = "tlc";
          } 
          $this->custtlc_before_qstr = $this->custtlc;
          $this->custtlc = substr($this->Db->qstr($this->custtlc), 1, -1); 
          if ($this->custtlc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->custtlc = "null"; 
              $NM_val_null[] = "custtlc";
          } 
          $this->poli_before_qstr = $this->poli;
          $this->poli = substr($this->Db->qstr($this->poli), 1, -1); 
          if ($this->poli == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->poli = "null"; 
              $NM_val_null[] = "poli";
          } 
          $this->diag_before_qstr = $this->diag;
          $this->diag = substr($this->Db->qstr($this->diag), 1, -1); 
          if ($this->diag == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->diag = "null"; 
              $NM_val_null[] = "diag";
          } 
          $this->jalancode_before_qstr = $this->jalancode;
          $this->jalancode = substr($this->Db->qstr($this->jalancode), 1, -1); 
          if ($this->jalancode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->jalancode = "null"; 
              $NM_val_null[] = "jalancode";
          } 
          $this->periksaname_before_qstr = $this->periksaname;
          $this->periksaname = substr($this->Db->qstr($this->periksaname), 1, -1); 
          if ($this->periksaname == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->periksaname = "null"; 
              $NM_val_null[] = "periksaname";
          } 
          $this->instcode_before_qstr = $this->instcode;
          $this->instcode = substr($this->Db->qstr($this->instcode), 1, -1); 
          if ($this->instcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->instcode = "null"; 
              $NM_val_null[] = "instcode";
          } 
          $this->jenisinst_before_qstr = $this->jenisinst;
          $this->jenisinst = substr($this->Db->qstr($this->jenisinst), 1, -1); 
          if ($this->jenisinst == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->jenisinst = "null"; 
              $NM_val_null[] = "jenisinst";
          } 
          $this->inapclass_before_qstr = $this->inapclass;
          $this->inapclass = substr($this->Db->qstr($this->inapclass), 1, -1); 
          if ($this->inapclass == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->inapclass = "null"; 
              $NM_val_null[] = "inapclass";
          } 
          $this->tipehasil_before_qstr = $this->tipehasil;
          $this->tipehasil = substr($this->Db->qstr($this->tipehasil), 1, -1); 
          if ($this->tipehasil == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipehasil = "null"; 
              $NM_val_null[] = "tipehasil";
          } 
          $this->urutno_before_qstr = $this->urutno;
          $this->urutno = substr($this->Db->qstr($this->urutno), 1, -1); 
          if ($this->urutno == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->urutno = "null"; 
              $NM_val_null[] = "urutno";
          } 
          $this->bucode_before_qstr = $this->bucode;
          $this->bucode = substr($this->Db->qstr($this->bucode), 1, -1); 
          if ($this->bucode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->bucode = "null"; 
              $NM_val_null[] = "bucode";
          } 
          $this->buname_before_qstr = $this->buname;
          $this->buname = substr($this->Db->qstr($this->buname), 1, -1); 
          if ($this->buname == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->buname = "null"; 
              $NM_val_null[] = "buname";
          } 
          $this->asal_before_qstr = $this->asal;
          $this->asal = substr($this->Db->qstr($this->asal), 1, -1); 
          if ($this->asal == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->asal = "null"; 
              $NM_val_null[] = "asal";
          } 
          $this->inst_before_qstr = $this->inst;
          $this->inst = substr($this->Db->qstr($this->inst), 1, -1); 
          if ($this->inst == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->inst = "null"; 
              $NM_val_null[] = "inst";
          } 
          $this->tujuan_before_qstr = $this->tujuan;
          $this->tujuan = substr($this->Db->qstr($this->tujuan), 1, -1); 
          if ($this->tujuan == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tujuan = "null"; 
              $NM_val_null[] = "tujuan";
          } 
          $this->petugas_before_qstr = $this->petugas;
          $this->petugas = substr($this->Db->qstr($this->petugas), 1, -1); 
          if ($this->petugas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->petugas = "null"; 
              $NM_val_null[] = "petugas";
          } 
          $this->asallayanan_before_qstr = $this->asallayanan;
          $this->asallayanan = substr($this->Db->qstr($this->asallayanan), 1, -1); 
          if ($this->asallayanan == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->asallayanan = "null"; 
              $NM_val_null[] = "asallayanan";
          } 
          $this->sep_before_qstr = $this->sep;
          $this->sep = substr($this->Db->qstr($this->sep), 1, -1); 
          if ($this->sep == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sep = "null"; 
              $NM_val_null[] = "sep";
          } 
          $this->kelompoktarif_before_qstr = $this->kelompoktarif;
          $this->kelompoktarif = substr($this->Db->qstr($this->kelompoktarif), 1, -1); 
          if ($this->kelompoktarif == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->kelompoktarif = "null"; 
              $NM_val_null[] = "kelompoktarif";
          } 
          $this->plcode_before_qstr = $this->plcode;
          $this->plcode = substr($this->Db->qstr($this->plcode), 1, -1); 
          if ($this->plcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->plcode = "null"; 
              $NM_val_null[] = "plcode";
          } 
          $this->plname_before_qstr = $this->plname;
          $this->plname = substr($this->Db->qstr($this->plname), 1, -1); 
          if ($this->plname == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->plname = "null"; 
              $NM_val_null[] = "plname";
          } 
          $this->plsex_before_qstr = $this->plsex;
          $this->plsex = substr($this->Db->qstr($this->plsex), 1, -1); 
          if ($this->plsex == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->plsex = "null"; 
              $NM_val_null[] = "plsex";
          } 
          $this->statusberkas_before_qstr = $this->statusberkas;
          $this->statusberkas = substr($this->Db->qstr($this->statusberkas), 1, -1); 
          if ($this->statusberkas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->statusberkas = "null"; 
              $NM_val_null[] = "statusberkas";
          } 
          if ($this->statusberkasdate == "")  
          { 
              $this->statusberkasdate = "null"; 
              $NM_val_null[] = "statusberkasdate";
          } 
          $this->picberkas_before_qstr = $this->picberkas;
          $this->picberkas = substr($this->Db->qstr($this->picberkas), 1, -1); 
          if ($this->picberkas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->picberkas = "null"; 
              $NM_val_null[] = "picberkas";
          } 
          $this->detailrad_before_qstr = $this->detailrad;
          $this->detailrad = substr($this->Db->qstr($this->detailrad), 1, -1); 
          if ($this->detailrad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detailrad = "null"; 
              $NM_val_null[] = "detailrad";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_tbtranrad_inap_mob_pack_ajax_response();
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
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = #$this->trandate#, status = $this->status, contrast = '$this->contrast', poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", status = $this->status, contrast = '$this->contrast', poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", status = $this->status, contrast = '$this->contrast', poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = EXTEND('$this->trandate', YEAR TO FRACTION), status = $this->status, contrast = '$this->contrast', poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", status = $this->status, contrast = '$this->contrast', poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", status = $this->status, contrast = '$this->contrast', poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", status = $this->status, contrast = '$this->contrast', poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode'"; 
              } 
              if (isset($NM_val_form['source']) && $NM_val_form['source'] != $this->nmgp_dados_select['source']) 
              { 
                  $SC_fields_update[] = "source = $this->source"; 
              } 
              if (isset($NM_val_form['periksacode']) && $NM_val_form['periksacode'] != $this->nmgp_dados_select['periksacode']) 
              { 
                  $SC_fields_update[] = "periksacode = '$this->periksacode'"; 
              } 
              if (isset($NM_val_form['enterdate']) && $NM_val_form['enterdate'] != $this->nmgp_dados_select['enterdate']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "enterdate = #$this->enterdate#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "enterdate = EXTEND('" . $this->enterdate . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "enterdate = " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['finishdate']) && $NM_val_form['finishdate'] != $this->nmgp_dados_select['finishdate']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "finishdate = #$this->finishdate#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "finishdate = EXTEND('" . $this->finishdate . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "finishdate = " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['keterangan']) && $NM_val_form['keterangan'] != $this->nmgp_dados_select['keterangan']) 
              { 
                  $SC_fields_update[] = "keterangan = '$this->keterangan'"; 
              } 
              if (isset($NM_val_form['deleted']) && $NM_val_form['deleted'] != $this->nmgp_dados_select['deleted']) 
              { 
                  $SC_fields_update[] = "deleted = $this->deleted"; 
              } 
              if (isset($NM_val_form['tlc']) && $NM_val_form['tlc'] != $this->nmgp_dados_select['tlc']) 
              { 
                  $SC_fields_update[] = "tlc = '$this->tlc'"; 
              } 
              if (isset($NM_val_form['custtlc']) && $NM_val_form['custtlc'] != $this->nmgp_dados_select['custtlc']) 
              { 
                  $SC_fields_update[] = "custtlc = '$this->custtlc'"; 
              } 
              if (isset($NM_val_form['jalancode']) && $NM_val_form['jalancode'] != $this->nmgp_dados_select['jalancode']) 
              { 
                  $SC_fields_update[] = "jalancode = '$this->jalancode'"; 
              } 
              if (isset($NM_val_form['periksaname']) && $NM_val_form['periksaname'] != $this->nmgp_dados_select['periksaname']) 
              { 
                  $SC_fields_update[] = "periksaname = '$this->periksaname'"; 
              } 
              if (isset($NM_val_form['jenisinst']) && $NM_val_form['jenisinst'] != $this->nmgp_dados_select['jenisinst']) 
              { 
                  $SC_fields_update[] = "jenisinst = '$this->jenisinst'"; 
              } 
              if (isset($NM_val_form['inapclass']) && $NM_val_form['inapclass'] != $this->nmgp_dados_select['inapclass']) 
              { 
                  $SC_fields_update[] = "inapclass = '$this->inapclass'"; 
              } 
              if (isset($NM_val_form['tipehasil']) && $NM_val_form['tipehasil'] != $this->nmgp_dados_select['tipehasil']) 
              { 
                  $SC_fields_update[] = "tipehasil = '$this->tipehasil'"; 
              } 
              if (isset($NM_val_form['urutno']) && $NM_val_form['urutno'] != $this->nmgp_dados_select['urutno']) 
              { 
                  $SC_fields_update[] = "urutno = '$this->urutno'"; 
              } 
              if (isset($NM_val_form['bucode']) && $NM_val_form['bucode'] != $this->nmgp_dados_select['bucode']) 
              { 
                  $SC_fields_update[] = "bucode = '$this->bucode'"; 
              } 
              if (isset($NM_val_form['buname']) && $NM_val_form['buname'] != $this->nmgp_dados_select['buname']) 
              { 
                  $SC_fields_update[] = "buname = '$this->buname'"; 
              } 
              if (isset($NM_val_form['asal']) && $NM_val_form['asal'] != $this->nmgp_dados_select['asal']) 
              { 
                  $SC_fields_update[] = "asal = '$this->asal'"; 
              } 
              if (isset($NM_val_form['inst']) && $NM_val_form['inst'] != $this->nmgp_dados_select['inst']) 
              { 
                  $SC_fields_update[] = "inst = '$this->inst'"; 
              } 
              if (isset($NM_val_form['tujuan']) && $NM_val_form['tujuan'] != $this->nmgp_dados_select['tujuan']) 
              { 
                  $SC_fields_update[] = "tujuan = '$this->tujuan'"; 
              } 
              if (isset($NM_val_form['petugas']) && $NM_val_form['petugas'] != $this->nmgp_dados_select['petugas']) 
              { 
                  $SC_fields_update[] = "petugas = '$this->petugas'"; 
              } 
              if (isset($NM_val_form['asallayanan']) && $NM_val_form['asallayanan'] != $this->nmgp_dados_select['asallayanan']) 
              { 
                  $SC_fields_update[] = "asallayanan = '$this->asallayanan'"; 
              } 
              if (isset($NM_val_form['sep']) && $NM_val_form['sep'] != $this->nmgp_dados_select['sep']) 
              { 
                  $SC_fields_update[] = "sep = '$this->sep'"; 
              } 
              if (isset($NM_val_form['kelompoktarif']) && $NM_val_form['kelompoktarif'] != $this->nmgp_dados_select['kelompoktarif']) 
              { 
                  $SC_fields_update[] = "kelompoktarif = '$this->kelompoktarif'"; 
              } 
              if (isset($NM_val_form['ispl']) && $NM_val_form['ispl'] != $this->nmgp_dados_select['ispl']) 
              { 
                  $SC_fields_update[] = "ispl = $this->ispl"; 
              } 
              if (isset($NM_val_form['plcode']) && $NM_val_form['plcode'] != $this->nmgp_dados_select['plcode']) 
              { 
                  $SC_fields_update[] = "plcode = '$this->plcode'"; 
              } 
              if (isset($NM_val_form['plname']) && $NM_val_form['plname'] != $this->nmgp_dados_select['plname']) 
              { 
                  $SC_fields_update[] = "plname = '$this->plname'"; 
              } 
              if (isset($NM_val_form['plsex']) && $NM_val_form['plsex'] != $this->nmgp_dados_select['plsex']) 
              { 
                  $SC_fields_update[] = "plsex = '$this->plsex'"; 
              } 
              if (isset($NM_val_form['statusberkas']) && $NM_val_form['statusberkas'] != $this->nmgp_dados_select['statusberkas']) 
              { 
                  $SC_fields_update[] = "statusberkas = '$this->statusberkas'"; 
              } 
              if (isset($NM_val_form['statusberkasdate']) && $NM_val_form['statusberkasdate'] != $this->nmgp_dados_select['statusberkasdate']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "statusberkasdate = #$this->statusberkasdate#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "statusberkasdate = EXTEND('" . $this->statusberkasdate . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "statusberkasdate = " . $this->Ini->date_delim . $this->statusberkasdate . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['picberkas']) && $NM_val_form['picberkas'] != $this->nmgp_dados_select['picberkas']) 
              { 
                  $SC_fields_update[] = "picberkas = '$this->picberkas'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              else  
              {
                  $comando .= " WHERE id = $this->id ";  
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
                                  form_tbtranrad_inap_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->trancode = $this->trancode_before_qstr;
              $this->struk = $this->struk_before_qstr;
              $this->custcode = $this->custcode_before_qstr;
              $this->inapcode = $this->inapcode_before_qstr;
              $this->doccode = $this->doccode_before_qstr;
              $this->docname = $this->docname_before_qstr;
              $this->periksacode = $this->periksacode_before_qstr;
              $this->note = $this->note_before_qstr;
              $this->contrast = $this->contrast_before_qstr;
              $this->keterangan = $this->keterangan_before_qstr;
              $this->tlc = $this->tlc_before_qstr;
              $this->custtlc = $this->custtlc_before_qstr;
              $this->poli = $this->poli_before_qstr;
              $this->diag = $this->diag_before_qstr;
              $this->jalancode = $this->jalancode_before_qstr;
              $this->periksaname = $this->periksaname_before_qstr;
              $this->instcode = $this->instcode_before_qstr;
              $this->jenisinst = $this->jenisinst_before_qstr;
              $this->inapclass = $this->inapclass_before_qstr;
              $this->tipehasil = $this->tipehasil_before_qstr;
              $this->urutno = $this->urutno_before_qstr;
              $this->bucode = $this->bucode_before_qstr;
              $this->buname = $this->buname_before_qstr;
              $this->asal = $this->asal_before_qstr;
              $this->inst = $this->inst_before_qstr;
              $this->tujuan = $this->tujuan_before_qstr;
              $this->petugas = $this->petugas_before_qstr;
              $this->asallayanan = $this->asallayanan_before_qstr;
              $this->sep = $this->sep_before_qstr;
              $this->kelompoktarif = $this->kelompoktarif_before_qstr;
              $this->plcode = $this->plcode_before_qstr;
              $this->plname = $this->plname_before_qstr;
              $this->plsex = $this->plsex_before_qstr;
              $this->statusberkas = $this->statusberkas_before_qstr;
              $this->picberkas = $this->picberkas_before_qstr;
              $this->detailrad = $this->detailrad_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['trancode'])) { $this->trancode = $NM_val_form['trancode']; }
              elseif (isset($this->trancode)) { $this->nm_limpa_alfa($this->trancode); }
              if     (isset($NM_val_form) && isset($NM_val_form['struk'])) { $this->struk = $NM_val_form['struk']; }
              elseif (isset($this->struk)) { $this->nm_limpa_alfa($this->struk); }
              if     (isset($NM_val_form) && isset($NM_val_form['custcode'])) { $this->custcode = $NM_val_form['custcode']; }
              elseif (isset($this->custcode)) { $this->nm_limpa_alfa($this->custcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['inapcode'])) { $this->inapcode = $NM_val_form['inapcode']; }
              elseif (isset($this->inapcode)) { $this->nm_limpa_alfa($this->inapcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['doccode'])) { $this->doccode = $NM_val_form['doccode']; }
              elseif (isset($this->doccode)) { $this->nm_limpa_alfa($this->doccode); }
              if     (isset($NM_val_form) && isset($NM_val_form['docname'])) { $this->docname = $NM_val_form['docname']; }
              elseif (isset($this->docname)) { $this->nm_limpa_alfa($this->docname); }
              if     (isset($NM_val_form) && isset($NM_val_form['note'])) { $this->note = $NM_val_form['note']; }
              elseif (isset($this->note)) { $this->nm_limpa_alfa($this->note); }
              if     (isset($NM_val_form) && isset($NM_val_form['status'])) { $this->status = $NM_val_form['status']; }
              elseif (isset($this->status)) { $this->nm_limpa_alfa($this->status); }
              if     (isset($NM_val_form) && isset($NM_val_form['contrast'])) { $this->contrast = $NM_val_form['contrast']; }
              elseif (isset($this->contrast)) { $this->nm_limpa_alfa($this->contrast); }
              if     (isset($NM_val_form) && isset($NM_val_form['poli'])) { $this->poli = $NM_val_form['poli']; }
              elseif (isset($this->poli)) { $this->nm_limpa_alfa($this->poli); }
              if     (isset($NM_val_form) && isset($NM_val_form['diag'])) { $this->diag = $NM_val_form['diag']; }
              elseif (isset($this->diag)) { $this->nm_limpa_alfa($this->diag); }
              if     (isset($NM_val_form) && isset($NM_val_form['instcode'])) { $this->instcode = $NM_val_form['instcode']; }
              elseif (isset($this->instcode)) { $this->nm_limpa_alfa($this->instcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['detailrad'])) { $this->detailrad = $NM_val_form['detailrad']; }
              elseif (isset($this->detailrad)) { $this->nm_limpa_alfa($this->detailrad); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id', 'trancode', 'inapcode', 'trandate', 'custcode', 'instcode', 'provider', 'struk', 'sc_field_0', 'usia', 'alamat', 'doccode', 'docname', 'poli', 'diag', 'contrast', 'note', 'status', 'detailrad'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_tbtranrad_inap_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, trandate, enterdate, status, finishdate, contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, statusberkasdate, picberkas) VALUES ('$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->periksacode', '$this->note', #$this->trandate#, #$this->enterdate#, $this->status, #$this->finishdate#, '$this->contrast', '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', '$this->periksaname', '$this->instcode', '$this->jenisinst', '$this->inapclass', '$this->tipehasil', '$this->urutno', '$this->bucode', '$this->buname', '$this->asal', '$this->inst', '$this->tujuan', '$this->petugas', '$this->asallayanan', '$this->sep', '$this->kelompoktarif', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->statusberkas', #$this->statusberkasdate#, '$this->picberkas')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, trandate, enterdate, status, finishdate, contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, statusberkasdate, picberkas) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->periksacode', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->contrast', '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', '$this->periksaname', '$this->instcode', '$this->jenisinst', '$this->inapclass', '$this->tipehasil', '$this->urutno', '$this->bucode', '$this->buname', '$this->asal', '$this->inst', '$this->tujuan', '$this->petugas', '$this->asallayanan', '$this->sep', '$this->kelompoktarif', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->statusberkas', " . $this->Ini->date_delim . $this->statusberkasdate . $this->Ini->date_delim1 . ", '$this->picberkas')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, trandate, enterdate, status, finishdate, contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, statusberkasdate, picberkas) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->periksacode', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->contrast', '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', '$this->periksaname', '$this->instcode', '$this->jenisinst', '$this->inapclass', '$this->tipehasil', '$this->urutno', '$this->bucode', '$this->buname', '$this->asal', '$this->inst', '$this->tujuan', '$this->petugas', '$this->asallayanan', '$this->sep', '$this->kelompoktarif', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->statusberkas', " . $this->Ini->date_delim . $this->statusberkasdate . $this->Ini->date_delim1 . ", '$this->picberkas')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, trandate, enterdate, status, finishdate, contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, statusberkasdate, picberkas) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->periksacode', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->contrast', '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', '$this->periksaname', '$this->instcode', '$this->jenisinst', '$this->inapclass', '$this->tipehasil', '$this->urutno', '$this->bucode', '$this->buname', '$this->asal', '$this->inst', '$this->tujuan', '$this->petugas', '$this->asallayanan', '$this->sep', '$this->kelompoktarif', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->statusberkas', " . $this->Ini->date_delim . $this->statusberkasdate . $this->Ini->date_delim1 . ", '$this->picberkas')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, trandate, enterdate, status, finishdate, contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, statusberkasdate, picberkas) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->periksacode', '$this->note', EXTEND('$this->trandate', YEAR TO FRACTION), EXTEND('$this->enterdate', YEAR TO FRACTION), $this->status, EXTEND('$this->finishdate', YEAR TO FRACTION), '$this->contrast', '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', '$this->periksaname', '$this->instcode', '$this->jenisinst', '$this->inapclass', '$this->tipehasil', '$this->urutno', '$this->bucode', '$this->buname', '$this->asal', '$this->inst', '$this->tujuan', '$this->petugas', '$this->asallayanan', '$this->sep', '$this->kelompoktarif', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->statusberkas', EXTEND('$this->statusberkasdate', YEAR TO FRACTION), '$this->picberkas')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, trandate, enterdate, status, finishdate, contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, statusberkasdate, picberkas) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->periksacode', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->contrast', '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', '$this->periksaname', '$this->instcode', '$this->jenisinst', '$this->inapclass', '$this->tipehasil', '$this->urutno', '$this->bucode', '$this->buname', '$this->asal', '$this->inst', '$this->tujuan', '$this->petugas', '$this->asallayanan', '$this->sep', '$this->kelompoktarif', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->statusberkas', " . $this->Ini->date_delim . $this->statusberkasdate . $this->Ini->date_delim1 . ", '$this->picberkas')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, trandate, enterdate, status, finishdate, contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, statusberkasdate, picberkas) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->periksacode', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->contrast', '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', '$this->periksaname', '$this->instcode', '$this->jenisinst', '$this->inapclass', '$this->tipehasil', '$this->urutno', '$this->bucode', '$this->buname', '$this->asal', '$this->inst', '$this->tujuan', '$this->petugas', '$this->asallayanan', '$this->sep', '$this->kelompoktarif', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->statusberkas', " . $this->Ini->date_delim . $this->statusberkasdate . $this->Ini->date_delim1 . ", '$this->picberkas')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, trandate, enterdate, status, finishdate, contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, statusberkasdate, picberkas) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->periksacode', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->contrast', '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', '$this->periksaname', '$this->instcode', '$this->jenisinst', '$this->inapclass', '$this->tipehasil', '$this->urutno', '$this->bucode', '$this->buname', '$this->asal', '$this->inst', '$this->tujuan', '$this->petugas', '$this->asallayanan', '$this->sep', '$this->kelompoktarif', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->statusberkas', " . $this->Ini->date_delim . $this->statusberkasdate . $this->Ini->date_delim1 . ", '$this->picberkas')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, trandate, enterdate, status, finishdate, contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, statusberkasdate, picberkas) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->periksacode', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->contrast', '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', '$this->periksaname', '$this->instcode', '$this->jenisinst', '$this->inapclass', '$this->tipehasil', '$this->urutno', '$this->bucode', '$this->buname', '$this->asal', '$this->inst', '$this->tujuan', '$this->petugas', '$this->asallayanan', '$this->sep', '$this->kelompoktarif', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->statusberkas', " . $this->Ini->date_delim . $this->statusberkasdate . $this->Ini->date_delim1 . ", '$this->picberkas')"; 
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
                              form_tbtranrad_inap_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_tbtranrad_inap_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->trancode = $this->trancode_before_qstr;
              $this->struk = $this->struk_before_qstr;
              $this->custcode = $this->custcode_before_qstr;
              $this->inapcode = $this->inapcode_before_qstr;
              $this->doccode = $this->doccode_before_qstr;
              $this->docname = $this->docname_before_qstr;
              $this->periksacode = $this->periksacode_before_qstr;
              $this->note = $this->note_before_qstr;
              $this->contrast = $this->contrast_before_qstr;
              $this->keterangan = $this->keterangan_before_qstr;
              $this->tlc = $this->tlc_before_qstr;
              $this->custtlc = $this->custtlc_before_qstr;
              $this->poli = $this->poli_before_qstr;
              $this->diag = $this->diag_before_qstr;
              $this->jalancode = $this->jalancode_before_qstr;
              $this->periksaname = $this->periksaname_before_qstr;
              $this->instcode = $this->instcode_before_qstr;
              $this->jenisinst = $this->jenisinst_before_qstr;
              $this->inapclass = $this->inapclass_before_qstr;
              $this->tipehasil = $this->tipehasil_before_qstr;
              $this->urutno = $this->urutno_before_qstr;
              $this->bucode = $this->bucode_before_qstr;
              $this->buname = $this->buname_before_qstr;
              $this->asal = $this->asal_before_qstr;
              $this->inst = $this->inst_before_qstr;
              $this->tujuan = $this->tujuan_before_qstr;
              $this->petugas = $this->petugas_before_qstr;
              $this->asallayanan = $this->asallayanan_before_qstr;
              $this->sep = $this->sep_before_qstr;
              $this->kelompoktarif = $this->kelompoktarif_before_qstr;
              $this->plcode = $this->plcode_before_qstr;
              $this->plname = $this->plname_before_qstr;
              $this->plsex = $this->plsex_before_qstr;
              $this->statusberkas = $this->statusberkas_before_qstr;
              $this->picberkas = $this->picberkas_before_qstr;
              $this->detailrad = $this->detailrad_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->return_after_insert();
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';
          if ($bDelecaoOk)
          {
              $sDetailWhere = "trancode = '" . $this->trancode . "'";
              $this->form_tbdetailrad_mob->ini_controle();
              if ($this->form_tbdetailrad_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
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
                          form_tbtranrad_inap_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total']);
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
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_inapcode = $this->inapcode;
    $original_struk = $this->struk;
    $original_trancode = $this->trancode;
}
  

$insert_table  = 'tbhasilrad';      
$insert_fields = array(   
     'trancode' => "'$this->trancode'",
	 'struk' => "'$this->struk'",
 );

$insert_sql = 'INSERT INTO ' . $insert_table
    . ' ('   . implode(', ', array_keys($insert_fields))   . ')'
    . ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';


     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_tbtranrad_inap_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

$check_sql = "SELECT diagnosa1"
   . " FROM tbadmrawatinap"
   . " WHERE tranCode = '" . $this->inapcode  . "'";
 
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
    $diagnya = $this->rs[0][0];
}else{
	$diagnya = '';
}

$update_table  = 'tbtranrad';      
$update_where  = "trancode = '".$this->trancode ."'"; 
$update_fields = array(   
     "diag = '".$diagnya."'",
 );

$update_sql = 'UPDATE ' . $update_table
    . ' SET '   . implode(', ', $update_fields)
    . ' WHERE ' . $update_where;

     $nm_select = $update_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_tbtranrad_inap_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_inapcode != $this->inapcode || (isset($bFlagRead_inapcode) && $bFlagRead_inapcode)))
    {
        $this->ajax_return_values_inapcode(true);
    }
    if (($original_struk != $this->struk || (isset($bFlagRead_struk) && $bFlagRead_struk)))
    {
        $this->ajax_return_values_struk(true);
    }
    if (($original_trancode != $this->trancode || (isset($bFlagRead_trancode) && $bFlagRead_trancode)))
    {
        $this->ajax_return_values_trancode(true);
    }
}
$_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_trancode = $this->trancode;
}
  $delete_table  = 'tbhasilrad';      
$delete_where  = "trancode = '".$this->trancode ."'"; 

$delete_sql = 'DELETE FROM ' . $delete_table
    . ' WHERE '      . $delete_where;

     $nm_select = $delete_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_tbtranrad_inap_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_trancode != $this->trancode || (isset($bFlagRead_trancode) && $bFlagRead_trancode)))
    {
        $this->ajax_return_values_trancode(true);
    }
}
$_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = null === $this->id ? null : substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe'] == "R")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->id)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->id) == "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_tbtranrad_inap_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total'] = $qt_geral_reg_form_tbtranrad_inap_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "id < $this->id "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "id < $this->id "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "id < $this->id "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "id < $this->id "; 
              }
              else  
              {
                  $Key_Where = "id < $this->id "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_tbtranrad_inap_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] > $qt_geral_reg_form_tbtranrad_inap_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] = $qt_geral_reg_form_tbtranrad_inap_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] = $qt_geral_reg_form_tbtranrad_inap_mob; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total'] + 1; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT id, trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, str_replace (convert(char(10),trandate,102), '.', '-') + ' ' + convert(char(8),trandate,20), str_replace (convert(char(10),enterdate,102), '.', '-') + ' ' + convert(char(8),enterdate,20), status, str_replace (convert(char(10),finishdate,102), '.', '-') + ' ' + convert(char(8),finishdate,20), contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, str_replace (convert(char(10),statusberkasdate,102), '.', '-') + ' ' + convert(char(8),statusberkasdate,20), picberkas from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT id, trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, convert(char(23),trandate,121), convert(char(23),enterdate,121), status, convert(char(23),finishdate,121), contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, convert(char(23),statusberkasdate,121), picberkas from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT id, trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, trandate, enterdate, status, finishdate, contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, statusberkasdate, picberkas from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT id, trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, EXTEND(trandate, YEAR TO FRACTION), EXTEND(enterdate, YEAR TO FRACTION), status, EXTEND(finishdate, YEAR TO FRACTION), contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, EXTEND(statusberkasdate, YEAR TO FRACTION), picberkas from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT id, trancode, struk, custcode, inapcode, source, doccode, docname, periksacode, note, trandate, enterdate, status, finishdate, contrast, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, periksaname, instcode, jenisinst, inapclass, tipehasil, urutno, bucode, buname, asal, inst, tujuan, petugas, asallayanan, sep, kelompoktarif, ispl, plcode, plname, plsex, statusberkas, statusberkasdate, picberkas from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              else  
              {
                  $aWhere[] = "id = $this->id"; 
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
          $sc_order_by = "id";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['empty_filter'] = true;
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
              $this->id = $rs->fields[0] ; 
              $this->nmgp_dados_select['id'] = $this->id;
              $this->trancode = $rs->fields[1] ; 
              $this->nmgp_dados_select['trancode'] = $this->trancode;
              $this->struk = $rs->fields[2] ; 
              $this->nmgp_dados_select['struk'] = $this->struk;
              $this->custcode = $rs->fields[3] ; 
              $this->nmgp_dados_select['custcode'] = $this->custcode;
              $this->inapcode = $rs->fields[4] ; 
              $this->nmgp_dados_select['inapcode'] = $this->inapcode;
              $this->source = $rs->fields[5] ; 
              $this->nmgp_dados_select['source'] = $this->source;
              $this->doccode = $rs->fields[6] ; 
              $this->nmgp_dados_select['doccode'] = $this->doccode;
              $this->docname = $rs->fields[7] ; 
              $this->nmgp_dados_select['docname'] = $this->docname;
              $this->periksacode = $rs->fields[8] ; 
              $this->nmgp_dados_select['periksacode'] = $this->periksacode;
              $this->note = $rs->fields[9] ; 
              $this->nmgp_dados_select['note'] = $this->note;
              $this->trandate = $rs->fields[10] ; 
              if (substr($this->trandate, 10, 1) == "-") 
              { 
                 $this->trandate = substr($this->trandate, 0, 10) . " " . substr($this->trandate, 11);
              } 
              if (substr($this->trandate, 13, 1) == ".") 
              { 
                 $this->trandate = substr($this->trandate, 0, 13) . ":" . substr($this->trandate, 14, 2) . ":" . substr($this->trandate, 17);
              } 
              $this->nmgp_dados_select['trandate'] = $this->trandate;
              $this->enterdate = $rs->fields[11] ; 
              if (substr($this->enterdate, 10, 1) == "-") 
              { 
                 $this->enterdate = substr($this->enterdate, 0, 10) . " " . substr($this->enterdate, 11);
              } 
              if (substr($this->enterdate, 13, 1) == ".") 
              { 
                 $this->enterdate = substr($this->enterdate, 0, 13) . ":" . substr($this->enterdate, 14, 2) . ":" . substr($this->enterdate, 17);
              } 
              $this->nmgp_dados_select['enterdate'] = $this->enterdate;
              $this->status = $rs->fields[12] ; 
              $this->nmgp_dados_select['status'] = $this->status;
              $this->finishdate = $rs->fields[13] ; 
              if (substr($this->finishdate, 10, 1) == "-") 
              { 
                 $this->finishdate = substr($this->finishdate, 0, 10) . " " . substr($this->finishdate, 11);
              } 
              if (substr($this->finishdate, 13, 1) == ".") 
              { 
                 $this->finishdate = substr($this->finishdate, 0, 13) . ":" . substr($this->finishdate, 14, 2) . ":" . substr($this->finishdate, 17);
              } 
              $this->nmgp_dados_select['finishdate'] = $this->finishdate;
              $this->contrast = $rs->fields[14] ; 
              $this->nmgp_dados_select['contrast'] = $this->contrast;
              $this->keterangan = $rs->fields[15] ; 
              $this->nmgp_dados_select['keterangan'] = $this->keterangan;
              $this->deleted = $rs->fields[16] ; 
              $this->nmgp_dados_select['deleted'] = $this->deleted;
              $this->tlc = $rs->fields[17] ; 
              $this->nmgp_dados_select['tlc'] = $this->tlc;
              $this->custtlc = $rs->fields[18] ; 
              $this->nmgp_dados_select['custtlc'] = $this->custtlc;
              $this->poli = $rs->fields[19] ; 
              $this->nmgp_dados_select['poli'] = $this->poli;
              $this->diag = $rs->fields[20] ; 
              $this->nmgp_dados_select['diag'] = $this->diag;
              $this->jalancode = $rs->fields[21] ; 
              $this->nmgp_dados_select['jalancode'] = $this->jalancode;
              $this->periksaname = $rs->fields[22] ; 
              $this->nmgp_dados_select['periksaname'] = $this->periksaname;
              $this->instcode = $rs->fields[23] ; 
              $this->nmgp_dados_select['instcode'] = $this->instcode;
              $this->jenisinst = $rs->fields[24] ; 
              $this->nmgp_dados_select['jenisinst'] = $this->jenisinst;
              $this->inapclass = $rs->fields[25] ; 
              $this->nmgp_dados_select['inapclass'] = $this->inapclass;
              $this->tipehasil = $rs->fields[26] ; 
              $this->nmgp_dados_select['tipehasil'] = $this->tipehasil;
              $this->urutno = $rs->fields[27] ; 
              $this->nmgp_dados_select['urutno'] = $this->urutno;
              $this->bucode = $rs->fields[28] ; 
              $this->nmgp_dados_select['bucode'] = $this->bucode;
              $this->buname = $rs->fields[29] ; 
              $this->nmgp_dados_select['buname'] = $this->buname;
              $this->asal = $rs->fields[30] ; 
              $this->nmgp_dados_select['asal'] = $this->asal;
              $this->inst = $rs->fields[31] ; 
              $this->nmgp_dados_select['inst'] = $this->inst;
              $this->tujuan = $rs->fields[32] ; 
              $this->nmgp_dados_select['tujuan'] = $this->tujuan;
              $this->petugas = $rs->fields[33] ; 
              $this->nmgp_dados_select['petugas'] = $this->petugas;
              $this->asallayanan = $rs->fields[34] ; 
              $this->nmgp_dados_select['asallayanan'] = $this->asallayanan;
              $this->sep = $rs->fields[35] ; 
              $this->nmgp_dados_select['sep'] = $this->sep;
              $this->kelompoktarif = $rs->fields[36] ; 
              $this->nmgp_dados_select['kelompoktarif'] = $this->kelompoktarif;
              $this->ispl = $rs->fields[37] ; 
              $this->nmgp_dados_select['ispl'] = $this->ispl;
              $this->plcode = $rs->fields[38] ; 
              $this->nmgp_dados_select['plcode'] = $this->plcode;
              $this->plname = $rs->fields[39] ; 
              $this->nmgp_dados_select['plname'] = $this->plname;
              $this->plsex = $rs->fields[40] ; 
              $this->nmgp_dados_select['plsex'] = $this->plsex;
              $this->statusberkas = $rs->fields[41] ; 
              $this->nmgp_dados_select['statusberkas'] = $this->statusberkas;
              $this->statusberkasdate = $rs->fields[42] ; 
              if (substr($this->statusberkasdate, 10, 1) == "-") 
              { 
                 $this->statusberkasdate = substr($this->statusberkasdate, 0, 10) . " " . substr($this->statusberkasdate, 11);
              } 
              if (substr($this->statusberkasdate, 13, 1) == ".") 
              { 
                 $this->statusberkasdate = substr($this->statusberkasdate, 0, 13) . ":" . substr($this->statusberkasdate, 14, 2) . ":" . substr($this->statusberkasdate, 17);
              } 
              $this->nmgp_dados_select['statusberkasdate'] = $this->statusberkasdate;
              $this->picberkas = $rs->fields[43] ; 
              $this->nmgp_dados_select['picberkas'] = $this->picberkas;
              $this->detailrad = $rs->fields[44] ; 
              $this->nmgp_dados_select['detailrad'] = $this->detailrad;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id = (string)$this->id; 
              $this->source = (string)$this->source; 
              $this->status = (string)$this->status; 
              $this->deleted = (string)$this->deleted; 
              $this->ispl = (string)$this->ispl; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['parms'] = "id?#?$this->id?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['reg_start'] < $qt_geral_reg_form_tbtranrad_inap_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opcao']   = '';
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
              $this->id = "";  
              $this->nmgp_dados_form["id"] = $this->id;
              $this->trancode = "";  
              $this->nmgp_dados_form["trancode"] = $this->trancode;
              $this->struk = "";  
              $this->nmgp_dados_form["struk"] = $this->struk;
              $this->custcode = "";  
              $this->nmgp_dados_form["custcode"] = $this->custcode;
              $this->inapcode = "";  
              $this->nmgp_dados_form["inapcode"] = $this->inapcode;
              $this->source = "";  
              $this->nmgp_dados_form["source"] = $this->source;
              $this->doccode = "";  
              $this->nmgp_dados_form["doccode"] = $this->doccode;
              $this->docname = "";  
              $this->nmgp_dados_form["docname"] = $this->docname;
              $this->periksacode = "";  
              $this->nmgp_dados_form["periksacode"] = $this->periksacode;
              $this->note = "";  
              $this->nmgp_dados_form["note"] = $this->note;
              $this->trandate =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->trandate_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->nmgp_dados_form["trandate"] = $this->trandate;
              $this->enterdate = "";  
              $this->enterdate_hora = "" ;  
              $this->nmgp_dados_form["enterdate"] = $this->enterdate;
              $this->status = "";  
              $this->nmgp_dados_form["status"] = $this->status;
              $this->finishdate = "";  
              $this->finishdate_hora = "" ;  
              $this->nmgp_dados_form["finishdate"] = $this->finishdate;
              $this->contrast = "";  
              $this->nmgp_dados_form["contrast"] = $this->contrast;
              $this->keterangan = "";  
              $this->nmgp_dados_form["keterangan"] = $this->keterangan;
              $this->deleted = "";  
              $this->nmgp_dados_form["deleted"] = $this->deleted;
              $this->tlc = "";  
              $this->nmgp_dados_form["tlc"] = $this->tlc;
              $this->custtlc = "";  
              $this->nmgp_dados_form["custtlc"] = $this->custtlc;
              $this->poli = "";  
              $this->nmgp_dados_form["poli"] = $this->poli;
              $this->diag = "";  
              $this->nmgp_dados_form["diag"] = $this->diag;
              $this->jalancode = "";  
              $this->nmgp_dados_form["jalancode"] = $this->jalancode;
              $this->periksaname = "";  
              $this->nmgp_dados_form["periksaname"] = $this->periksaname;
              $this->instcode = "";  
              $this->nmgp_dados_form["instcode"] = $this->instcode;
              $this->jenisinst = "";  
              $this->nmgp_dados_form["jenisinst"] = $this->jenisinst;
              $this->inapclass = "";  
              $this->nmgp_dados_form["inapclass"] = $this->inapclass;
              $this->tipehasil = "";  
              $this->nmgp_dados_form["tipehasil"] = $this->tipehasil;
              $this->urutno = "";  
              $this->nmgp_dados_form["urutno"] = $this->urutno;
              $this->bucode = "";  
              $this->nmgp_dados_form["bucode"] = $this->bucode;
              $this->buname = "";  
              $this->nmgp_dados_form["buname"] = $this->buname;
              $this->asal = "";  
              $this->nmgp_dados_form["asal"] = $this->asal;
              $this->inst = "";  
              $this->nmgp_dados_form["inst"] = $this->inst;
              $this->tujuan = "";  
              $this->nmgp_dados_form["tujuan"] = $this->tujuan;
              $this->petugas = "";  
              $this->nmgp_dados_form["petugas"] = $this->petugas;
              $this->asallayanan = "";  
              $this->nmgp_dados_form["asallayanan"] = $this->asallayanan;
              $this->sep = "";  
              $this->nmgp_dados_form["sep"] = $this->sep;
              $this->kelompoktarif = "";  
              $this->nmgp_dados_form["kelompoktarif"] = $this->kelompoktarif;
              $this->ispl = "";  
              $this->nmgp_dados_form["ispl"] = $this->ispl;
              $this->plcode = "";  
              $this->nmgp_dados_form["plcode"] = $this->plcode;
              $this->plname = "";  
              $this->nmgp_dados_form["plname"] = $this->plname;
              $this->plsex = "";  
              $this->nmgp_dados_form["plsex"] = $this->plsex;
              $this->statusberkas = "";  
              $this->nmgp_dados_form["statusberkas"] = $this->statusberkas;
              $this->statusberkasdate = "";  
              $this->statusberkasdate_hora = "" ;  
              $this->nmgp_dados_form["statusberkasdate"] = $this->statusberkasdate;
              $this->picberkas = "";  
              $this->nmgp_dados_form["picberkas"] = $this->picberkas;
              $this->alamat = "";  
              $this->nmgp_dados_form["alamat"] = $this->alamat;
              $this->sc_field_0 = "";  
              $this->nmgp_dados_form["sc_field_0"] = $this->sc_field_0;
              $this->usia = "";  
              $this->nmgp_dados_form["usia"] = $this->usia;
              $this->detailrad = "";  
              $this->nmgp_dados_form["detailrad"] = $this->detailrad;
              $this->provider = "";  
              $this->nmgp_dados_form["provider"] = $this->provider;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dados_select'];
                  $this->trancode = $this->nmgp_dados_select['trancode'];  
                  $this->struk = $this->nmgp_dados_select['struk'];  
                  $this->custcode = $this->nmgp_dados_select['custcode'];  
                  $this->inapcode = $this->nmgp_dados_select['inapcode'];  
                  $this->source = $this->nmgp_dados_select['source'];  
                  $this->doccode = $this->nmgp_dados_select['doccode'];  
                  $this->docname = $this->nmgp_dados_select['docname'];  
                  $this->periksacode = $this->nmgp_dados_select['periksacode'];  
                  $this->note = $this->nmgp_dados_select['note'];  
                  $this->trandate = $this->nmgp_dados_select['trandate'];  
                  $this->enterdate = $this->nmgp_dados_select['enterdate'];  
                  $this->status = $this->nmgp_dados_select['status'];  
                  $this->finishdate = $this->nmgp_dados_select['finishdate'];  
                  $this->contrast = $this->nmgp_dados_select['contrast'];  
                  $this->keterangan = $this->nmgp_dados_select['keterangan'];  
                  $this->deleted = $this->nmgp_dados_select['deleted'];  
                  $this->tlc = $this->nmgp_dados_select['tlc'];  
                  $this->custtlc = $this->nmgp_dados_select['custtlc'];  
                  $this->poli = $this->nmgp_dados_select['poli'];  
                  $this->diag = $this->nmgp_dados_select['diag'];  
                  $this->jalancode = $this->nmgp_dados_select['jalancode'];  
                  $this->periksaname = $this->nmgp_dados_select['periksaname'];  
                  $this->instcode = $this->nmgp_dados_select['instcode'];  
                  $this->jenisinst = $this->nmgp_dados_select['jenisinst'];  
                  $this->inapclass = $this->nmgp_dados_select['inapclass'];  
                  $this->tipehasil = $this->nmgp_dados_select['tipehasil'];  
                  $this->urutno = $this->nmgp_dados_select['urutno'];  
                  $this->bucode = $this->nmgp_dados_select['bucode'];  
                  $this->buname = $this->nmgp_dados_select['buname'];  
                  $this->asal = $this->nmgp_dados_select['asal'];  
                  $this->inst = $this->nmgp_dados_select['inst'];  
                  $this->tujuan = $this->nmgp_dados_select['tujuan'];  
                  $this->petugas = $this->nmgp_dados_select['petugas'];  
                  $this->asallayanan = $this->nmgp_dados_select['asallayanan'];  
                  $this->sep = $this->nmgp_dados_select['sep'];  
                  $this->kelompoktarif = $this->nmgp_dados_select['kelompoktarif'];  
                  $this->ispl = $this->nmgp_dados_select['ispl'];  
                  $this->plcode = $this->nmgp_dados_select['plcode'];  
                  $this->plname = $this->nmgp_dados_select['plname'];  
                  $this->plsex = $this->nmgp_dados_select['plsex'];  
                  $this->statusberkas = $this->nmgp_dados_select['statusberkas'];  
                  $this->statusberkasdate = $this->nmgp_dados_select['statusberkasdate'];  
                  $this->picberkas = $this->nmgp_dados_select['picberkas'];  
                  $this->detailrad = $this->nmgp_dados_select['detailrad'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter']))
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
     $this->id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function inapcode_onChange()
{
$_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'on';
  
$original_inapcode = $this->inapcode;
$original_usia = $this->usia;
$original_diag = $this->diag;
$original_usia = $this->usia;
$original_diag = $this->diag;

$check_sql = "SELECT date(a.birthDate)"
   . " FROM tbcustomer a left join tbadmrawatinap b on b.custCode = a.custCode"
   . " WHERE b.tranCode = '" . $this->inapcode  . "'";
 
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
    $tgl_lahir = $this->rs[0][0];
}

$lahir = new DateTime($tgl_lahir);
$today = new DateTime();
$umur = $today->diff($lahir);
$this->usia  = $umur->y . " TH " . $umur->m . " BLN " . $umur->d . " HR";

$check_sql = "SELECT diagnosa1"
   . " FROM tbadmrawatinap"
   . " WHERE tranCode = '" . $this->inapcode  . "'";
 
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
    $diagnya = $this->rs[0][0];
}else{
	$diagnya = '';
}

$this->diag  = $diagnya;


$modificado_inapcode = $this->inapcode;
$modificado_usia = $this->usia;
$modificado_diag = $this->diag;
$modificado_usia = $this->usia;
$modificado_diag = $this->diag;
$this->nm_formatar_campos('inapcode', 'usia', 'diag');
if ($original_inapcode !== $modificado_inapcode || isset($this->nmgp_cmp_readonly['inapcode']) || (isset($bFlagRead_inapcode) && $bFlagRead_inapcode))
{
    $this->ajax_return_values_inapcode(true);
}
if ($original_usia !== $modificado_usia || isset($this->nmgp_cmp_readonly['usia']) || (isset($bFlagRead_usia) && $bFlagRead_usia))
{
    $this->ajax_return_values_usia(true);
}
if ($original_diag !== $modificado_diag || isset($this->nmgp_cmp_readonly['diag']) || (isset($bFlagRead_diag) && $bFlagRead_diag))
{
    $this->ajax_return_values_diag(true);
}
if ($original_usia !== $modificado_usia || isset($this->nmgp_cmp_readonly['usia']) || (isset($bFlagRead_usia) && $bFlagRead_usia))
{
    $this->ajax_return_values_usia(true);
}
if ($original_diag !== $modificado_diag || isset($this->nmgp_cmp_readonly['diag']) || (isset($bFlagRead_diag) && $bFlagRead_diag))
{
    $this->ajax_return_values_diag(true);
}
$this->NM_ajax_info['event_field'] = 'inapcode';
form_tbtranrad_inap_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbtranrad_inap_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_tbtranrad_inap_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_tbtranrad_inap_mob_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['csrf_token'];
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

   function Form_lookup_custcode()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT custCode FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY custCode";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_custcode'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_instcode()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT provider, provider  FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY provider";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_instcode'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_provider()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT name  FROM tbinstansi where instCode = '$this->instcode'  ORDER BY name";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_provider'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_struk()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT struckNo, struckNo  FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY struckNo DESC";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[1] = str_replace(',', '.', $rs->fields[1]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[1] = (strpos(strtolower($rs->fields[1]), "e")) ? (float)$rs->fields[1] : $rs->fields[1];
              $rs->fields[1] = (string)$rs->fields[1];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_struk'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_sc_field_0()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custcode, name + ', ' + salut  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custcode, concat(name,', ', salut)  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custcode, name&', '&salut  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custcode, name||', '||salut  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custcode, name + ', ' + salut  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custcode, name||', '||salut  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }
   else
   {
       $nm_comando = "SELECT custcode, name||', '||salut  FROM tbcustomer where custcode = '$this->custcode' ORDER BY name, salut";
   }

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_sc_field_0'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_alamat()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT address, address FROM tbcustomer where custCode = '$this->custcode'";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_alamat'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_doccode()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT doctor, doctor  FROM tbadmrawatinap where struckNo = '$this->struk' ORDER BY doctor";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_doccode'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_docname()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT name, gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT name, concat(gelar,' ', name,', ', spec)  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT name, gelar&' '&name&', '&spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT name, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT name, gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT name, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   else
   {
       $nm_comando = "SELECT name, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '$this->doccode'";
   }

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_docname'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_poli()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;

   $nm_comando = "SELECT b.polyCode, b.name FROM tbdoctor a left join tbpoli b on b.polyCode = a.poli where a.docCode = '$this->doccode'";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['Lookup_poli'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_contrast()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Ya?#?Y?#?N?@?";
       $nmgp_def_dados .= "Tidak?#?N?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_status()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Daftar?#?0?#?S?@?";
       $nmgp_def_dados .= "Selesai?#?1?#?N?@?";
       $nmgp_def_dados .= "Lengkap?#?2?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_tbtranrad_inap_mob_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "trancode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_struk($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "struk", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_custcode($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "custcode", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "inapcode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "source", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_doccode($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "doccode", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_docname($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "docname", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "periksacode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "note", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_status($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "status", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_contrast($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "contrast", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "keterangan", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "deleted", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tlc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "custtlc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_poli($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "poli", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "diag", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "jalancode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "periksaname", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_instcode($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "instcode", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "jenisinst", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "inapclass", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tipehasil", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "urutno", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bucode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "buname", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "asal", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "inst", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tujuan", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "petugas", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "asallayanan", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "sep", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "kelompoktarif", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ispl", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "plcode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "plname", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "plsex", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "statusberkas", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "picberkas", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_tbtranrad_inap_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['total'] = $qt_geral_reg_form_tbtranrad_inap_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbtranrad_inap_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbtranrad_inap_mob_pack_ajax_response();
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
      $nm_numeric[] = "id";$nm_numeric[] = "source";$nm_numeric[] = "status";$nm_numeric[] = "deleted";$nm_numeric[] = "ispl";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['decimal_db'] == ".")
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
      $Nm_datas['trandate'] = "datetime";$Nm_datas['enterdate'] = "datetime";$Nm_datas['finishdate'] = "datetime";$Nm_datas['statusberkasdate'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['SC_sep_date1'];
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
   function SC_lookup_struk($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_custcode($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_doccode($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_docname($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_status($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['0'] = "Daftar";
       $data_look['1'] = "Selesai";
       $data_look['2'] = "Lengkap";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_contrast($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Y'] = "Ya";
       $data_look['N'] = "Tidak";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_poli($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_instcode($condicao, $campo)
   {
       return $campo;
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
       $nmgp_saida_form = "form_tbtranrad_inap_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_tbtranrad_inap_mob_fim.php";
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
       form_tbtranrad_inap_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranrad_inap_mob']['masterValue']);
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
