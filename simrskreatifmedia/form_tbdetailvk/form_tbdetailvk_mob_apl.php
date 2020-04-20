<?php
//
class form_tbdetailvk_mob_apl
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
   var $custcode;
   var $custcode_1;
   var $babybirth;
   var $babybirth_1;
   var $birthdate;
   var $birthdate_hora;
   var $birthtime;
   var $bb;
   var $tb;
   var $lingkar;
   var $hidup;
   var $hidup_1;
   var $anestime;
   var $anestime_hora;
   var $intime;
   var $intime_hora;
   var $outtime;
   var $outtime_hora;
   var $pa;
   var $pa_1;
   var $cito;
   var $cito_1;
   var $diagpre;
   var $diagpost;
   var $trandate;
   var $trandate_hora;
   var $class;
   var $class_1;
   var $awalobs;
   var $awalobs_hora;
   var $akhirobs;
   var $akhirobs_hora;
   var $inapcode;
   var $observasi;
   var $observasi_1;
   var $tindobservasi;
   var $tindobservasi_1;
   var $funcroom;
   var $nama;
   var $nama_1;
   var $detailinsentif;
   var $resepvk;
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
          if (isset($this->NM_ajax_info['param']['akhirobs']))
          {
              $this->akhirobs = $this->NM_ajax_info['param']['akhirobs'];
          }
          if (isset($this->NM_ajax_info['param']['akhirobs_hora']))
          {
              $this->akhirobs_hora = $this->NM_ajax_info['param']['akhirobs_hora'];
          }
          if (isset($this->NM_ajax_info['param']['anestime']))
          {
              $this->anestime = $this->NM_ajax_info['param']['anestime'];
          }
          if (isset($this->NM_ajax_info['param']['anestime_hora']))
          {
              $this->anestime_hora = $this->NM_ajax_info['param']['anestime_hora'];
          }
          if (isset($this->NM_ajax_info['param']['awalobs']))
          {
              $this->awalobs = $this->NM_ajax_info['param']['awalobs'];
          }
          if (isset($this->NM_ajax_info['param']['awalobs_hora']))
          {
              $this->awalobs_hora = $this->NM_ajax_info['param']['awalobs_hora'];
          }
          if (isset($this->NM_ajax_info['param']['babybirth']))
          {
              $this->babybirth = $this->NM_ajax_info['param']['babybirth'];
          }
          if (isset($this->NM_ajax_info['param']['bb']))
          {
              $this->bb = $this->NM_ajax_info['param']['bb'];
          }
          if (isset($this->NM_ajax_info['param']['birthdate']))
          {
              $this->birthdate = $this->NM_ajax_info['param']['birthdate'];
          }
          if (isset($this->NM_ajax_info['param']['birthdate_hora']))
          {
              $this->birthdate_hora = $this->NM_ajax_info['param']['birthdate_hora'];
          }
          if (isset($this->NM_ajax_info['param']['birthtime']))
          {
              $this->birthtime = $this->NM_ajax_info['param']['birthtime'];
          }
          if (isset($this->NM_ajax_info['param']['cito']))
          {
              $this->cito = $this->NM_ajax_info['param']['cito'];
          }
          if (isset($this->NM_ajax_info['param']['class']))
          {
              $this->class = $this->NM_ajax_info['param']['class'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['custcode']))
          {
              $this->custcode = $this->NM_ajax_info['param']['custcode'];
          }
          if (isset($this->NM_ajax_info['param']['detailinsentif']))
          {
              $this->detailinsentif = $this->NM_ajax_info['param']['detailinsentif'];
          }
          if (isset($this->NM_ajax_info['param']['diagpost']))
          {
              $this->diagpost = $this->NM_ajax_info['param']['diagpost'];
          }
          if (isset($this->NM_ajax_info['param']['diagpre']))
          {
              $this->diagpre = $this->NM_ajax_info['param']['diagpre'];
          }
          if (isset($this->NM_ajax_info['param']['funcroom']))
          {
              $this->funcroom = $this->NM_ajax_info['param']['funcroom'];
          }
          if (isset($this->NM_ajax_info['param']['hidup']))
          {
              $this->hidup = $this->NM_ajax_info['param']['hidup'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['inapcode']))
          {
              $this->inapcode = $this->NM_ajax_info['param']['inapcode'];
          }
          if (isset($this->NM_ajax_info['param']['intime']))
          {
              $this->intime = $this->NM_ajax_info['param']['intime'];
          }
          if (isset($this->NM_ajax_info['param']['intime_hora']))
          {
              $this->intime_hora = $this->NM_ajax_info['param']['intime_hora'];
          }
          if (isset($this->NM_ajax_info['param']['lingkar']))
          {
              $this->lingkar = $this->NM_ajax_info['param']['lingkar'];
          }
          if (isset($this->NM_ajax_info['param']['nama']))
          {
              $this->nama = $this->NM_ajax_info['param']['nama'];
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
          if (isset($this->NM_ajax_info['param']['observasi']))
          {
              $this->observasi = $this->NM_ajax_info['param']['observasi'];
          }
          if (isset($this->NM_ajax_info['param']['outtime']))
          {
              $this->outtime = $this->NM_ajax_info['param']['outtime'];
          }
          if (isset($this->NM_ajax_info['param']['outtime_hora']))
          {
              $this->outtime_hora = $this->NM_ajax_info['param']['outtime_hora'];
          }
          if (isset($this->NM_ajax_info['param']['pa']))
          {
              $this->pa = $this->NM_ajax_info['param']['pa'];
          }
          if (isset($this->NM_ajax_info['param']['resepvk']))
          {
              $this->resepvk = $this->NM_ajax_info['param']['resepvk'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tb']))
          {
              $this->tb = $this->NM_ajax_info['param']['tb'];
          }
          if (isset($this->NM_ajax_info['param']['tindobservasi']))
          {
              $this->tindobservasi = $this->NM_ajax_info['param']['tindobservasi'];
          }
          if (isset($this->NM_ajax_info['param']['trancode']))
          {
              $this->trancode = $this->NM_ajax_info['param']['trancode'];
          }
          if (isset($this->NM_ajax_info['param']['trandate']))
          {
              $this->trandate = $this->NM_ajax_info['param']['trandate'];
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
      if (isset($this->v_Code) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['v_Code'] = $this->v_Code;
      }
      if (isset($_POST["v_Code"]) && isset($this->v_Code)) 
      {
          $_SESSION['v_Code'] = $this->v_Code;
      }
      if (!isset($_POST["v_Code"]) && isset($_POST["v_code"])) 
      {
          $_SESSION['v_Code'] = $this->v_code;
      }
      if (isset($_GET["v_Code"]) && isset($this->v_Code)) 
      {
          $_SESSION['v_Code'] = $this->v_Code;
      }
      if (!isset($_GET["v_Code"]) && isset($_GET["v_code"])) 
      {
          $_SESSION['v_Code'] = $this->v_code;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['embutida_parms']);
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
                 nm_limpa_str_form_tbdetailvk_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->v_Code) && isset($this->v_code)) 
          {
              $this->v_Code = $this->v_code;
          }
          if (isset($this->v_Code)) 
          {
              $_SESSION['v_Code'] = $this->v_Code;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->v_Code) && isset($this->v_code)) 
          {
              $this->v_Code = $this->v_code;
          }
          if (isset($this->v_Code)) 
          {
              $_SESSION['v_Code'] = $this->v_Code;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['nm_run_menu'] = 1;
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
          $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_tbdetailvk_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("id");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("id");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_tbdetailvk_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbdetailvk_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbdetailvk_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbdetailvk_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbdetailvk_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_tbdetailvk_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbdetailvk_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Kamar Bersalin";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_tbdetailvk_mob")
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


      $_SESSION['scriptcase']['error_icon']['form_tbdetailvk_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_tbdetailvk_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailvk_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbdetailvk_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbdetailvk_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_form'];
          if (!isset($this->id)){$this->id = $this->nmgp_dados_form['id'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['trancode'] != "null"){$this->trancode = $this->nmgp_dados_form['trancode'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_tbdetailvk_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_tbdetailvk/form_tbdetailvk_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_tbdetailvk_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_tbdetailvk_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_tbdetailvk_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_tbdetailvk/form_tbdetailvk_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_tbdetailvk_mob_erro.class.php"); 
      }
      $this->Erro      = new form_tbdetailvk_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailvk_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_form'];
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
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbtim_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbtim_mob') . "/form_tbtim_mob_apl.php");
          $this->form_tbtim_mob = new form_tbtim_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbdetailresepokvk_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbdetailresepokvk_mob') . "/form_tbdetailresepokvk_mob_apl.php");
          $this->form_tbdetailresepokvk_mob = new form_tbdetailresepokvk_mob_apl;
      }
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->trancode)) { $this->nm_limpa_alfa($this->trancode); }
      if (isset($this->custcode)) { $this->nm_limpa_alfa($this->custcode); }
      if (isset($this->babybirth)) { $this->nm_limpa_alfa($this->babybirth); }
      if (isset($this->birthtime)) { $this->nm_limpa_alfa($this->birthtime); }
      if (isset($this->bb)) { $this->nm_limpa_alfa($this->bb); }
      if (isset($this->tb)) { $this->nm_limpa_alfa($this->tb); }
      if (isset($this->lingkar)) { $this->nm_limpa_alfa($this->lingkar); }
      if (isset($this->hidup)) { $this->nm_limpa_alfa($this->hidup); }
      if (isset($this->pa)) { $this->nm_limpa_alfa($this->pa); }
      if (isset($this->cito)) { $this->nm_limpa_alfa($this->cito); }
      if (isset($this->diagpre)) { $this->nm_limpa_alfa($this->diagpre); }
      if (isset($this->diagpost)) { $this->nm_limpa_alfa($this->diagpost); }
      if (isset($this->class)) { $this->nm_limpa_alfa($this->class); }
      if (isset($this->inapcode)) { $this->nm_limpa_alfa($this->inapcode); }
      if (isset($this->observasi)) { $this->nm_limpa_alfa($this->observasi); }
      if (isset($this->tindobservasi)) { $this->nm_limpa_alfa($this->tindobservasi); }
      if (isset($this->funcroom)) { $this->nm_limpa_alfa($this->funcroom); }
      if (isset($this->detailinsentif)) { $this->nm_limpa_alfa($this->detailinsentif); }
      if (isset($this->resepvk)) { $this->nm_limpa_alfa($this->resepvk); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- birthdate
      $this->field_config['birthdate']                 = array();
      $this->field_config['birthdate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['birthdate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['birthdate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['birthdate']['date_display'] = "ddmmaaaa;hhii";
      $this->new_date_format('DH', 'birthdate');
      //-- birthtime
      $this->field_config['birthtime']                 = array();
      $this->field_config['birthtime']['date_format']  = "hh:ii";
      $this->field_config['birthtime']['time_sep']     = ":";
      $this->field_config['birthtime']['date_display'] = "hh:ii";
      $this->new_date_format('HH', 'birthtime');
      //-- bb
      $this->field_config['bb']               = array();
      $this->field_config['bb']['symbol_grp'] = '.';
      $this->field_config['bb']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['bb']['symbol_dec'] = '';
      $this->field_config['bb']['symbol_neg'] = '-';
      $this->field_config['bb']['format_neg'] = '2';
      //-- tb
      $this->field_config['tb']               = array();
      $this->field_config['tb']['symbol_grp'] = '.';
      $this->field_config['tb']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tb']['symbol_dec'] = ',';
      $this->field_config['tb']['symbol_neg'] = '-';
      $this->field_config['tb']['format_neg'] = '2';
      //-- lingkar
      $this->field_config['lingkar']               = array();
      $this->field_config['lingkar']['symbol_grp'] = '.';
      $this->field_config['lingkar']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['lingkar']['symbol_dec'] = ',';
      $this->field_config['lingkar']['symbol_neg'] = '-';
      $this->field_config['lingkar']['format_neg'] = '2';
      //-- trandate
      $this->field_config['trandate']                 = array();
      $this->field_config['trandate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['trandate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['trandate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['trandate']['date_display'] = "ddmmaaaa;hhii";
      $this->new_date_format('DH', 'trandate');
      //-- anestime
      $this->field_config['anestime']                 = array();
      $this->field_config['anestime']['date_format']  = "dd/mm/aaaa;hh:ii";
      $this->field_config['anestime']['date_sep']     = "-";
      $this->field_config['anestime']['time_sep']     = ":";
      $this->field_config['anestime']['date_display'] = "dd/mm/aaaa;hh:ii";
      $this->new_date_format('DH', 'anestime');
      //-- intime
      $this->field_config['intime']                 = array();
      $this->field_config['intime']['date_format']  = "dd/mm/aaaa;hh:ii";
      $this->field_config['intime']['date_sep']     = "-";
      $this->field_config['intime']['time_sep']     = ":";
      $this->field_config['intime']['date_display'] = "dd/mm/aaaa;hh:ii";
      $this->new_date_format('DH', 'intime');
      //-- outtime
      $this->field_config['outtime']                 = array();
      $this->field_config['outtime']['date_format']  = "dd/mm/aaaa;hh:ii";
      $this->field_config['outtime']['date_sep']     = "-";
      $this->field_config['outtime']['time_sep']     = ":";
      $this->field_config['outtime']['date_display'] = "dd/mm/aaaa;hh:ii";
      $this->new_date_format('DH', 'outtime');
      //-- awalobs
      $this->field_config['awalobs']                 = array();
      $this->field_config['awalobs']['date_format']  = "dd/mm/aaaa;hh:ii";
      $this->field_config['awalobs']['date_sep']     = "-";
      $this->field_config['awalobs']['time_sep']     = ":";
      $this->field_config['awalobs']['date_display'] = "dd/mm/aaaa;hh:ii";
      $this->new_date_format('DH', 'awalobs');
      //-- akhirobs
      $this->field_config['akhirobs']                 = array();
      $this->field_config['akhirobs']['date_format']  = "dd/mm/aaaa;hh:ii";
      $this->field_config['akhirobs']['date_sep']     = "-";
      $this->field_config['akhirobs']['time_sep']     = ":";
      $this->field_config['akhirobs']['date_display'] = "dd/mm/aaaa;hh:ii";
      $this->new_date_format('DH', 'akhirobs');
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_inapcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'inapcode');
          }
          if ('validate_trancode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'trancode');
          }
          if ('validate_custcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'custcode');
          }
          if ('validate_nama' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nama');
          }
          if ('validate_class' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'class');
          }
          if ('validate_babybirth' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'babybirth');
          }
          if ('validate_birthdate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'birthdate');
          }
          if ('validate_birthtime' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'birthtime');
          }
          if ('validate_bb' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bb');
          }
          if ('validate_tb' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tb');
          }
          if ('validate_lingkar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lingkar');
          }
          if ('validate_hidup' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hidup');
          }
          if ('validate_funcroom' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'funcroom');
          }
          if ('validate_diagpre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'diagpre');
          }
          if ('validate_diagpost' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'diagpost');
          }
          if ('validate_pa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pa');
          }
          if ('validate_cito' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cito');
          }
          if ('validate_trandate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'trandate');
          }
          if ('validate_anestime' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anestime');
          }
          if ('validate_intime' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'intime');
          }
          if ('validate_outtime' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'outtime');
          }
          if ('validate_observasi' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observasi');
          }
          if ('validate_tindobservasi' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tindobservasi');
          }
          if ('validate_awalobs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'awalobs');
          }
          if ('validate_akhirobs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'akhirobs');
          }
          if ('validate_detailinsentif' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detailinsentif');
          }
          if ('validate_resepvk' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'resepvk');
          }
          form_tbdetailvk_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_babybirth_onclick' == $this->NM_ajax_opcao)
          {
              $this->babyBirth_onClick();
          }
          if ('event_observasi_onclick' == $this->NM_ajax_opcao)
          {
              $this->observasi_onClick();
          }
          form_tbdetailvk_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->babybirth))
          {
              $x = 0; 
              $this->babybirth_1 = $this->babybirth;
              $this->babybirth = ""; 
              if ($this->babybirth_1 != "") 
              { 
                  foreach ($this->babybirth_1 as $dados_babybirth_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->babybirth .= ";";
                      } 
                      $this->babybirth .= $dados_babybirth_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->pa))
          {
              $x = 0; 
              $this->pa_1 = $this->pa;
              $this->pa = ""; 
              if ($this->pa_1 != "") 
              { 
                  foreach ($this->pa_1 as $dados_pa_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->pa .= ";";
                      } 
                      $this->pa .= $dados_pa_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->observasi))
          {
              $x = 0; 
              $this->observasi_1 = $this->observasi;
              $this->observasi = ""; 
              if ($this->observasi_1 != "") 
              { 
                  foreach ($this->observasi_1 as $dados_observasi_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->observasi .= ";";
                      } 
                      $this->observasi .= $dados_observasi_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_select']['trancode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->trancode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_select']['trancode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_select']['custcode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->custcode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_select']['custcode'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_tbdetailvk_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_tbdetailvk_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_tbdetailvk_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_tbdetailvk_mob_pack_ajax_response();
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
          form_tbdetailvk_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_tbdetailvk_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Kamar Bersalin") ?></TITLE>
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
<form name="Fdown" method="get" action="form_tbdetailvk_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_tbdetailvk_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_tbdetailvk_mob.php" target="_self" style="display: none"> 
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
           case 'inapcode':
               return "Kode Ranap";
               break;
           case 'trancode':
               return "Kode Transaksi";
               break;
           case 'custcode':
               return "No. RM";
               break;
           case 'nama':
               return "Nama";
               break;
           case 'class':
               return "Kelas";
               break;
           case 'babybirth':
               return "Partus ?";
               break;
           case 'birthdate':
               return "Tgl. Lahir";
               break;
           case 'birthtime':
               return "Waktu Lahir";
               break;
           case 'bb':
               return "BB";
               break;
           case 'tb':
               return "PB";
               break;
           case 'lingkar':
               return "L. Kepala Bayi";
               break;
           case 'hidup':
               return "Kondisi";
               break;
           case 'funcroom':
               return "Tindakan VK";
               break;
           case 'diagpre':
               return "Diag. Pre Partum";
               break;
           case 'diagpost':
               return "Diag. Post Partum";
               break;
           case 'pa':
               return "PA";
               break;
           case 'cito':
               return "Cito";
               break;
           case 'trandate':
               return "Tgl. Transaksi";
               break;
           case 'anestime':
               return "Anastesi";
               break;
           case 'intime':
               return "Masuk VK";
               break;
           case 'outtime':
               return "Keluar VK";
               break;
           case 'observasi':
               return "Observasi";
               break;
           case 'tindobservasi':
               return "Tindakan Observasi";
               break;
           case 'awalobs':
               return "Awal Observasi";
               break;
           case 'akhirobs':
               return "Akhir Observasi";
               break;
           case 'detailinsentif':
               return "";
               break;
           case 'resepvk':
               return "";
               break;
           case 'id':
               return "ID";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_tbdetailvk_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_tbdetailvk_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_tbdetailvk_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_tbdetailvk_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'inapcode' == $filtro)
        $this->ValidateField_inapcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'trancode' == $filtro)
        $this->ValidateField_trancode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'custcode' == $filtro)
        $this->ValidateField_custcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nama' == $filtro)
        $this->ValidateField_nama($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'class' == $filtro)
        $this->ValidateField_class($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'babybirth' == $filtro)
        $this->ValidateField_babybirth($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'birthdate' == $filtro)
        $this->ValidateField_birthdate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'birthtime' == $filtro)
        $this->ValidateField_birthtime($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bb' == $filtro)
        $this->ValidateField_bb($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tb' == $filtro)
        $this->ValidateField_tb($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lingkar' == $filtro)
        $this->ValidateField_lingkar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hidup' == $filtro)
        $this->ValidateField_hidup($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'funcroom' == $filtro)
        $this->ValidateField_funcroom($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'diagpre' == $filtro)
        $this->ValidateField_diagpre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'diagpost' == $filtro)
        $this->ValidateField_diagpost($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pa' == $filtro)
        $this->ValidateField_pa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cito' == $filtro)
        $this->ValidateField_cito($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'trandate' == $filtro)
        $this->ValidateField_trandate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'anestime' == $filtro)
        $this->ValidateField_anestime($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'intime' == $filtro)
        $this->ValidateField_intime($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'outtime' == $filtro)
        $this->ValidateField_outtime($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'observasi' == $filtro)
        $this->ValidateField_observasi($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tindobservasi' == $filtro)
        $this->ValidateField_tindobservasi($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'awalobs' == $filtro)
        $this->ValidateField_awalobs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'akhirobs' == $filtro)
        $this->ValidateField_akhirobs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detailinsentif' == $filtro)
        $this->ValidateField_detailinsentif($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'resepvk' == $filtro)
        $this->ValidateField_resepvk($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_inapcode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['php_cmp_required']['inapcode']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['php_cmp_required']['inapcode'] == "on")) 
      { 
          if ($this->inapcode == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Kode Ranap" ; 
              if (!isset($Campos_Erros['inapcode']))
              {
                  $Campos_Erros['inapcode'] = array();
              }
              $Campos_Erros['inapcode'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['inapcode']) || !is_array($this->NM_ajax_info['errList']['inapcode']))
                  {
                      $this->NM_ajax_info['errList']['inapcode'] = array();
                  }
                  $this->NM_ajax_info['errList']['inapcode'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->inapcode) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Ranap " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['inapcode']))
              {
                  $Campos_Erros['inapcode'] = array();
              }
              $Campos_Erros['inapcode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['inapcode']) || !is_array($this->NM_ajax_info['errList']['inapcode']))
              {
                  $this->NM_ajax_info['errList']['inapcode'] = array();
              }
              $this->NM_ajax_info['errList']['inapcode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_trancode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->trancode) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Transaksi " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['trancode']))
              {
                  $Campos_Erros['trancode'] = array();
              }
              $Campos_Erros['trancode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['trancode']) || !is_array($this->NM_ajax_info['errList']['trancode']))
              {
                  $this->NM_ajax_info['errList']['trancode'] = array();
              }
              $this->NM_ajax_info['errList']['trancode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_custcode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->custcode) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode']) && !in_array($this->custcode, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode']))
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

    function ValidateField_nama(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->nama) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama']) && !in_array($this->nama, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['nama']))
                   {
                       $Campos_Erros['nama'] = array();
                   }
                   $Campos_Erros['nama'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['nama']) || !is_array($this->NM_ajax_info['errList']['nama']))
                   {
                       $this->NM_ajax_info['errList']['nama'] = array();
                   }
                   $this->NM_ajax_info['errList']['nama'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nama';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nama

    function ValidateField_class(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->class) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class']) && !in_array($this->class, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['class']))
                   {
                       $Campos_Erros['class'] = array();
                   }
                   $Campos_Erros['class'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['class']) || !is_array($this->NM_ajax_info['errList']['class']))
                   {
                       $this->NM_ajax_info['errList']['class'] = array();
                   }
                   $this->NM_ajax_info['errList']['class'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'class';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_class

    function ValidateField_babybirth(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->babybirth == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->babybirth = "0";
      } 
      else 
      { 
          if (is_array($this->babybirth))
          {
              $x = 0; 
              $this->babybirth_1 = array(); 
              foreach ($this->babybirth as $ind => $dados_babybirth_1 ) 
              {
                  if ($dados_babybirth_1 != "") 
                  {
                      $this->babybirth_1[] = $dados_babybirth_1;
                  } 
              } 
              $this->babybirth = ""; 
              foreach ($this->babybirth_1 as $dados_babybirth_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->babybirth .= ";";
                   } 
                   $this->babybirth .= $dados_babybirth_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->babybirth === "" || is_null($this->babybirth))  
      { 
          $this->babybirth = 0;
          $this->sc_force_zero[] = 'babybirth';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'babybirth';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_babybirth

    function ValidateField_birthdate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->birthdate, $this->field_config['birthdate']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['birthdate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['birthdate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['birthdate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['birthdate']['date_sep']) ; 
          if (trim($this->birthdate) != "")  
          { 
              if ($teste_validade->Data($this->birthdate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tgl. Lahir; " ; 
                  if (!isset($Campos_Erros['birthdate']))
                  {
                      $Campos_Erros['birthdate'] = array();
                  }
                  $Campos_Erros['birthdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['birthdate']) || !is_array($this->NM_ajax_info['errList']['birthdate']))
                  {
                      $this->NM_ajax_info['errList']['birthdate'] = array();
                  }
                  $this->NM_ajax_info['errList']['birthdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['birthdate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'birthdate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->birthdate_hora, $this->field_config['birthdate_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['birthdate_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['birthdate_hora']['time_sep']) ; 
          if (trim($this->birthdate_hora) != "")  
          { 
              if ($teste_validade->Hora($this->birthdate_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tgl. Lahir; " ; 
                  if (!isset($Campos_Erros['birthdate_hora']))
                  {
                      $Campos_Erros['birthdate_hora'] = array();
                  }
                  $Campos_Erros['birthdate_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['birthdate']) || !is_array($this->NM_ajax_info['errList']['birthdate']))
                  {
                      $this->NM_ajax_info['errList']['birthdate'] = array();
                  }
                  $this->NM_ajax_info['errList']['birthdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'birthdate_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_birthdate_hora

    function ValidateField_birthtime(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->birthtime, $this->field_config['birthtime']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['birthtime']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['birthtime']['time_sep']) ; 
          if (trim($this->birthtime) != "")  
          { 
              if ($teste_validade->Hora($this->birthtime, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Waktu Lahir; " ; 
                  if (!isset($Campos_Erros['birthtime']))
                  {
                      $Campos_Erros['birthtime'] = array();
                  }
                  $Campos_Erros['birthtime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['birthtime']) || !is_array($this->NM_ajax_info['errList']['birthtime']))
                  {
                      $this->NM_ajax_info['errList']['birthtime'] = array();
                  }
                  $this->NM_ajax_info['errList']['birthtime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'birthtime';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_birthtime

    function ValidateField_bb(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->bb === "" || is_null($this->bb))  
      { 
          $this->bb = 0;
          $this->sc_force_zero[] = 'bb';
      } 
      nm_limpa_numero($this->bb, $this->field_config['bb']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->bb != '')  
          { 
              $iTestSize = 4;
              if (strlen($this->bb) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "BB: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['bb']))
                  {
                      $Campos_Erros['bb'] = array();
                  }
                  $Campos_Erros['bb'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['bb']) || !is_array($this->NM_ajax_info['errList']['bb']))
                  {
                      $this->NM_ajax_info['errList']['bb'] = array();
                  }
                  $this->NM_ajax_info['errList']['bb'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->bb, 4, 0, -0, 9999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "BB; " ; 
                  if (!isset($Campos_Erros['bb']))
                  {
                      $Campos_Erros['bb'] = array();
                  }
                  $Campos_Erros['bb'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['bb']) || !is_array($this->NM_ajax_info['errList']['bb']))
                  {
                      $this->NM_ajax_info['errList']['bb'] = array();
                  }
                  $this->NM_ajax_info['errList']['bb'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'bb';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_bb

    function ValidateField_tb(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tb === "" || is_null($this->tb))  
      { 
          $this->tb = 0;
          $this->sc_force_zero[] = 'tb';
      } 
      if (!empty($this->field_config['tb']['symbol_dec']))
      {
          nm_limpa_valor($this->tb, $this->field_config['tb']['symbol_dec'], $this->field_config['tb']['symbol_grp']) ; 
          if ('.' == substr($this->tb, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->tb, 1)))
              {
                  $this->tb = '';
              }
              else
              {
                  $this->tb = '0' . $this->tb;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tb != '')  
          { 
              $iTestSize = 5;
              if (strlen($this->tb) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PB: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tb']))
                  {
                      $Campos_Erros['tb'] = array();
                  }
                  $Campos_Erros['tb'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tb']) || !is_array($this->NM_ajax_info['errList']['tb']))
                  {
                      $this->NM_ajax_info['errList']['tb'] = array();
                  }
                  $this->NM_ajax_info['errList']['tb'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tb, 3, 1, -0, 9999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PB; " ; 
                  if (!isset($Campos_Erros['tb']))
                  {
                      $Campos_Erros['tb'] = array();
                  }
                  $Campos_Erros['tb'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tb']) || !is_array($this->NM_ajax_info['errList']['tb']))
                  {
                      $this->NM_ajax_info['errList']['tb'] = array();
                  }
                  $this->NM_ajax_info['errList']['tb'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tb';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tb

    function ValidateField_lingkar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->lingkar === "" || is_null($this->lingkar))  
      { 
          $this->lingkar = 0;
          $this->sc_force_zero[] = 'lingkar';
      } 
      if (!empty($this->field_config['lingkar']['symbol_dec']))
      {
          nm_limpa_valor($this->lingkar, $this->field_config['lingkar']['symbol_dec'], $this->field_config['lingkar']['symbol_grp']) ; 
          if ('.' == substr($this->lingkar, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->lingkar, 1)))
              {
                  $this->lingkar = '';
              }
              else
              {
                  $this->lingkar = '0' . $this->lingkar;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->lingkar != '')  
          { 
              $iTestSize = 5;
              if (strlen($this->lingkar) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "L. Kepala Bayi: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['lingkar']))
                  {
                      $Campos_Erros['lingkar'] = array();
                  }
                  $Campos_Erros['lingkar'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['lingkar']) || !is_array($this->NM_ajax_info['errList']['lingkar']))
                  {
                      $this->NM_ajax_info['errList']['lingkar'] = array();
                  }
                  $this->NM_ajax_info['errList']['lingkar'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->lingkar, 3, 1, -0, 9999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "L. Kepala Bayi; " ; 
                  if (!isset($Campos_Erros['lingkar']))
                  {
                      $Campos_Erros['lingkar'] = array();
                  }
                  $Campos_Erros['lingkar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['lingkar']) || !is_array($this->NM_ajax_info['errList']['lingkar']))
                  {
                      $this->NM_ajax_info['errList']['lingkar'] = array();
                  }
                  $this->NM_ajax_info['errList']['lingkar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lingkar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_lingkar

    function ValidateField_hidup(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->hidup == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hidup';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hidup

    function ValidateField_funcroom(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->funcroom = sc_strtoupper($this->funcroom); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['php_cmp_required']['funcroom']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['php_cmp_required']['funcroom'] == "on")) 
      { 
          if ($this->funcroom == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Tindakan VK" ; 
              if (!isset($Campos_Erros['funcroom']))
              {
                  $Campos_Erros['funcroom'] = array();
              }
              $Campos_Erros['funcroom'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['funcroom']) || !is_array($this->NM_ajax_info['errList']['funcroom']))
                  {
                      $this->NM_ajax_info['errList']['funcroom'] = array();
                  }
                  $this->NM_ajax_info['errList']['funcroom'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->funcroom) > 35) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tindakan VK " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 35 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['funcroom']))
              {
                  $Campos_Erros['funcroom'] = array();
              }
              $Campos_Erros['funcroom'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 35 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['funcroom']) || !is_array($this->NM_ajax_info['errList']['funcroom']))
              {
                  $this->NM_ajax_info['errList']['funcroom'] = array();
              }
              $this->NM_ajax_info['errList']['funcroom'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 35 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'funcroom';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_funcroom

    function ValidateField_diagpre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['php_cmp_required']['diagpre']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['php_cmp_required']['diagpre'] == "on")) 
      { 
          if ($this->diagpre == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Diag. Pre Partum" ; 
              if (!isset($Campos_Erros['diagpre']))
              {
                  $Campos_Erros['diagpre'] = array();
              }
              $Campos_Erros['diagpre'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['diagpre']) || !is_array($this->NM_ajax_info['errList']['diagpre']))
                  {
                      $this->NM_ajax_info['errList']['diagpre'] = array();
                  }
                  $this->NM_ajax_info['errList']['diagpre'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->diagpre) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Diag. Pre Partum " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['diagpre']))
              {
                  $Campos_Erros['diagpre'] = array();
              }
              $Campos_Erros['diagpre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['diagpre']) || !is_array($this->NM_ajax_info['errList']['diagpre']))
              {
                  $this->NM_ajax_info['errList']['diagpre'] = array();
              }
              $this->NM_ajax_info['errList']['diagpre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'diagpre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_diagpre

    function ValidateField_diagpost(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['php_cmp_required']['diagpost']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['php_cmp_required']['diagpost'] == "on")) 
      { 
          if ($this->diagpost == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Diag. Post Partum" ; 
              if (!isset($Campos_Erros['diagpost']))
              {
                  $Campos_Erros['diagpost'] = array();
              }
              $Campos_Erros['diagpost'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['diagpost']) || !is_array($this->NM_ajax_info['errList']['diagpost']))
                  {
                      $this->NM_ajax_info['errList']['diagpost'] = array();
                  }
                  $this->NM_ajax_info['errList']['diagpost'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->diagpost) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Diag. Post Partum " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['diagpost']))
              {
                  $Campos_Erros['diagpost'] = array();
              }
              $Campos_Erros['diagpost'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['diagpost']) || !is_array($this->NM_ajax_info['errList']['diagpost']))
              {
                  $this->NM_ajax_info['errList']['diagpost'] = array();
              }
              $this->NM_ajax_info['errList']['diagpost'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'diagpost';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_diagpost

    function ValidateField_pa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->pa == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->pa = "Tidak";
      } 
      else 
      { 
          if (is_array($this->pa))
          {
              $x = 0; 
              $this->pa_1 = array(); 
              foreach ($this->pa as $ind => $dados_pa_1 ) 
              {
                  if ($dados_pa_1 != "") 
                  {
                      $this->pa_1[] = $dados_pa_1;
                  } 
              } 
              $this->pa = ""; 
              foreach ($this->pa_1 as $dados_pa_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->pa .= ";";
                   } 
                   $this->pa .= $dados_pa_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pa

    function ValidateField_cito(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cito == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->cito = "Non Cito";
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cito';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cito

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
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['php_cmp_required']['trandate']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['php_cmp_required']['trandate'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Tgl. Transaksi" ; 
              if (!isset($Campos_Erros['trandate']))
              {
                  $Campos_Erros['trandate'] = array();
              }
              $Campos_Erros['trandate'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['trandate']) || !is_array($this->NM_ajax_info['errList']['trandate']))
                  {
                      $this->NM_ajax_info['errList']['trandate'] = array();
                  }
                  $this->NM_ajax_info['errList']['trandate'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
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
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['php_cmp_required']['trandate_hora']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['php_cmp_required']['trandate_hora'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Tgl. Transaksi" ; 
              if (!isset($Campos_Erros['trandate_hora']))
              {
                  $Campos_Erros['trandate_hora'] = array();
              }
              $Campos_Erros['trandate_hora'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['trandate']) || !is_array($this->NM_ajax_info['errList']['trandate']))
                  {
                      $this->NM_ajax_info['errList']['trandate'] = array();
                  }
                  $this->NM_ajax_info['errList']['trandate'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
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

    function ValidateField_anestime(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->anestime, $this->field_config['anestime']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['anestime']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['anestime']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['anestime']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['anestime']['date_sep']) ; 
          if (trim($this->anestime) != "")  
          { 
              if ($teste_validade->Data($this->anestime, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Anastesi; " ; 
                  if (!isset($Campos_Erros['anestime']))
                  {
                      $Campos_Erros['anestime'] = array();
                  }
                  $Campos_Erros['anestime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anestime']) || !is_array($this->NM_ajax_info['errList']['anestime']))
                  {
                      $this->NM_ajax_info['errList']['anestime'] = array();
                  }
                  $this->NM_ajax_info['errList']['anestime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['anestime']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anestime';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->anestime_hora, $this->field_config['anestime_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['anestime_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['anestime_hora']['time_sep']) ; 
          if (trim($this->anestime_hora) != "")  
          { 
              if ($teste_validade->Hora($this->anestime_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Anastesi; " ; 
                  if (!isset($Campos_Erros['anestime_hora']))
                  {
                      $Campos_Erros['anestime_hora'] = array();
                  }
                  $Campos_Erros['anestime_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anestime']) || !is_array($this->NM_ajax_info['errList']['anestime']))
                  {
                      $this->NM_ajax_info['errList']['anestime'] = array();
                  }
                  $this->NM_ajax_info['errList']['anestime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anestime_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anestime_hora

    function ValidateField_intime(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->intime, $this->field_config['intime']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['intime']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['intime']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['intime']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['intime']['date_sep']) ; 
          if (trim($this->intime) != "")  
          { 
              if ($teste_validade->Data($this->intime, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Masuk VK; " ; 
                  if (!isset($Campos_Erros['intime']))
                  {
                      $Campos_Erros['intime'] = array();
                  }
                  $Campos_Erros['intime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['intime']) || !is_array($this->NM_ajax_info['errList']['intime']))
                  {
                      $this->NM_ajax_info['errList']['intime'] = array();
                  }
                  $this->NM_ajax_info['errList']['intime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['intime']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'intime';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->intime_hora, $this->field_config['intime_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['intime_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['intime_hora']['time_sep']) ; 
          if (trim($this->intime_hora) != "")  
          { 
              if ($teste_validade->Hora($this->intime_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Masuk VK; " ; 
                  if (!isset($Campos_Erros['intime_hora']))
                  {
                      $Campos_Erros['intime_hora'] = array();
                  }
                  $Campos_Erros['intime_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['intime']) || !is_array($this->NM_ajax_info['errList']['intime']))
                  {
                      $this->NM_ajax_info['errList']['intime'] = array();
                  }
                  $this->NM_ajax_info['errList']['intime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'intime_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_intime_hora

    function ValidateField_outtime(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->outtime, $this->field_config['outtime']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['outtime']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['outtime']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['outtime']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['outtime']['date_sep']) ; 
          if (trim($this->outtime) != "")  
          { 
              if ($teste_validade->Data($this->outtime, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Keluar VK; " ; 
                  if (!isset($Campos_Erros['outtime']))
                  {
                      $Campos_Erros['outtime'] = array();
                  }
                  $Campos_Erros['outtime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['outtime']) || !is_array($this->NM_ajax_info['errList']['outtime']))
                  {
                      $this->NM_ajax_info['errList']['outtime'] = array();
                  }
                  $this->NM_ajax_info['errList']['outtime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['outtime']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'outtime';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->outtime_hora, $this->field_config['outtime_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['outtime_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['outtime_hora']['time_sep']) ; 
          if (trim($this->outtime_hora) != "")  
          { 
              if ($teste_validade->Hora($this->outtime_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Keluar VK; " ; 
                  if (!isset($Campos_Erros['outtime_hora']))
                  {
                      $Campos_Erros['outtime_hora'] = array();
                  }
                  $Campos_Erros['outtime_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['outtime']) || !is_array($this->NM_ajax_info['errList']['outtime']))
                  {
                      $this->NM_ajax_info['errList']['outtime'] = array();
                  }
                  $this->NM_ajax_info['errList']['outtime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'outtime_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_outtime_hora

    function ValidateField_observasi(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->observasi == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->observasi = "0";
      } 
      else 
      { 
          if (is_array($this->observasi))
          {
              $x = 0; 
              $this->observasi_1 = array(); 
              foreach ($this->observasi as $ind => $dados_observasi_1 ) 
              {
                  if ($dados_observasi_1 != "") 
                  {
                      $this->observasi_1[] = $dados_observasi_1;
                  } 
              } 
              $this->observasi = ""; 
              foreach ($this->observasi_1 as $dados_observasi_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->observasi .= ";";
                   } 
                   $this->observasi .= $dados_observasi_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'observasi';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_observasi

    function ValidateField_tindobservasi(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tindobservasi == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tindobservasi';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tindobservasi

    function ValidateField_awalobs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->awalobs, $this->field_config['awalobs']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['awalobs']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['awalobs']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['awalobs']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['awalobs']['date_sep']) ; 
          if (trim($this->awalobs) != "")  
          { 
              if ($teste_validade->Data($this->awalobs, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Awal Observasi; " ; 
                  if (!isset($Campos_Erros['awalobs']))
                  {
                      $Campos_Erros['awalobs'] = array();
                  }
                  $Campos_Erros['awalobs'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['awalobs']) || !is_array($this->NM_ajax_info['errList']['awalobs']))
                  {
                      $this->NM_ajax_info['errList']['awalobs'] = array();
                  }
                  $this->NM_ajax_info['errList']['awalobs'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['awalobs']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'awalobs';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->awalobs_hora, $this->field_config['awalobs_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['awalobs_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['awalobs_hora']['time_sep']) ; 
          if (trim($this->awalobs_hora) != "")  
          { 
              if ($teste_validade->Hora($this->awalobs_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Awal Observasi; " ; 
                  if (!isset($Campos_Erros['awalobs_hora']))
                  {
                      $Campos_Erros['awalobs_hora'] = array();
                  }
                  $Campos_Erros['awalobs_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['awalobs']) || !is_array($this->NM_ajax_info['errList']['awalobs']))
                  {
                      $this->NM_ajax_info['errList']['awalobs'] = array();
                  }
                  $this->NM_ajax_info['errList']['awalobs'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'awalobs_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_awalobs_hora

    function ValidateField_akhirobs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->akhirobs, $this->field_config['akhirobs']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['akhirobs']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['akhirobs']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['akhirobs']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['akhirobs']['date_sep']) ; 
          if (trim($this->akhirobs) != "")  
          { 
              if ($teste_validade->Data($this->akhirobs, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Akhir Observasi; " ; 
                  if (!isset($Campos_Erros['akhirobs']))
                  {
                      $Campos_Erros['akhirobs'] = array();
                  }
                  $Campos_Erros['akhirobs'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['akhirobs']) || !is_array($this->NM_ajax_info['errList']['akhirobs']))
                  {
                      $this->NM_ajax_info['errList']['akhirobs'] = array();
                  }
                  $this->NM_ajax_info['errList']['akhirobs'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['akhirobs']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'akhirobs';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->akhirobs_hora, $this->field_config['akhirobs_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['akhirobs_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['akhirobs_hora']['time_sep']) ; 
          if (trim($this->akhirobs_hora) != "")  
          { 
              if ($teste_validade->Hora($this->akhirobs_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Akhir Observasi; " ; 
                  if (!isset($Campos_Erros['akhirobs_hora']))
                  {
                      $Campos_Erros['akhirobs_hora'] = array();
                  }
                  $Campos_Erros['akhirobs_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['akhirobs']) || !is_array($this->NM_ajax_info['errList']['akhirobs']))
                  {
                      $this->NM_ajax_info['errList']['akhirobs'] = array();
                  }
                  $this->NM_ajax_info['errList']['akhirobs'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'akhirobs_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_akhirobs_hora

    function ValidateField_detailinsentif(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detailinsentif) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detailinsentif';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detailinsentif

    function ValidateField_resepvk(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->resepvk) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'resepvk';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_resepvk

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
    $this->nmgp_dados_form['inapcode'] = $this->inapcode;
    $this->nmgp_dados_form['trancode'] = $this->trancode;
    $this->nmgp_dados_form['custcode'] = $this->custcode;
    $this->nmgp_dados_form['nama'] = $this->nama;
    $this->nmgp_dados_form['class'] = $this->class;
    $this->nmgp_dados_form['babybirth'] = $this->babybirth;
    $this->nmgp_dados_form['birthdate'] = (strlen(trim($this->birthdate)) > 19) ? str_replace(".", ":", $this->birthdate) : trim($this->birthdate);
    $this->nmgp_dados_form['birthtime'] = $this->birthtime;
    $this->nmgp_dados_form['bb'] = $this->bb;
    $this->nmgp_dados_form['tb'] = $this->tb;
    $this->nmgp_dados_form['lingkar'] = $this->lingkar;
    $this->nmgp_dados_form['hidup'] = $this->hidup;
    $this->nmgp_dados_form['funcroom'] = $this->funcroom;
    $this->nmgp_dados_form['diagpre'] = $this->diagpre;
    $this->nmgp_dados_form['diagpost'] = $this->diagpost;
    $this->nmgp_dados_form['pa'] = $this->pa;
    $this->nmgp_dados_form['cito'] = $this->cito;
    $this->nmgp_dados_form['trandate'] = (strlen(trim($this->trandate)) > 19) ? str_replace(".", ":", $this->trandate) : trim($this->trandate);
    $this->nmgp_dados_form['anestime'] = (strlen(trim($this->anestime)) > 19) ? str_replace(".", ":", $this->anestime) : trim($this->anestime);
    $this->nmgp_dados_form['intime'] = (strlen(trim($this->intime)) > 19) ? str_replace(".", ":", $this->intime) : trim($this->intime);
    $this->nmgp_dados_form['outtime'] = (strlen(trim($this->outtime)) > 19) ? str_replace(".", ":", $this->outtime) : trim($this->outtime);
    $this->nmgp_dados_form['observasi'] = $this->observasi;
    $this->nmgp_dados_form['tindobservasi'] = $this->tindobservasi;
    $this->nmgp_dados_form['awalobs'] = (strlen(trim($this->awalobs)) > 19) ? str_replace(".", ":", $this->awalobs) : trim($this->awalobs);
    $this->nmgp_dados_form['akhirobs'] = (strlen(trim($this->akhirobs)) > 19) ? str_replace(".", ":", $this->akhirobs) : trim($this->akhirobs);
    $this->nmgp_dados_form['detailinsentif'] = $this->detailinsentif;
    $this->nmgp_dados_form['resepvk'] = $this->resepvk;
    $this->nmgp_dados_form['id'] = $this->id;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['birthdate'] = $this->birthdate;
      nm_limpa_data($this->birthdate, $this->field_config['birthdate']['date_sep']) ; 
      nm_limpa_hora($this->birthdate_hora, $this->field_config['birthdate']['time_sep']) ; 
      $this->Before_unformat['birthtime'] = $this->birthtime;
      nm_limpa_hora($this->birthtime, $this->field_config['birthtime']['time_sep']) ; 
      $this->Before_unformat['bb'] = $this->bb;
      nm_limpa_numero($this->bb, $this->field_config['bb']['symbol_grp']) ; 
      $this->Before_unformat['tb'] = $this->tb;
      if (!empty($this->field_config['tb']['symbol_dec']))
      {
         nm_limpa_valor($this->tb, $this->field_config['tb']['symbol_dec'], $this->field_config['tb']['symbol_grp']);
      }
      $this->Before_unformat['lingkar'] = $this->lingkar;
      if (!empty($this->field_config['lingkar']['symbol_dec']))
      {
         nm_limpa_valor($this->lingkar, $this->field_config['lingkar']['symbol_dec'], $this->field_config['lingkar']['symbol_grp']);
      }
      $this->Before_unformat['trandate'] = $this->trandate;
      nm_limpa_data($this->trandate, $this->field_config['trandate']['date_sep']) ; 
      nm_limpa_hora($this->trandate_hora, $this->field_config['trandate']['time_sep']) ; 
      $this->Before_unformat['anestime'] = $this->anestime;
      nm_limpa_data($this->anestime, $this->field_config['anestime']['date_sep']) ; 
      nm_limpa_hora($this->anestime_hora, $this->field_config['anestime']['time_sep']) ; 
      $this->Before_unformat['intime'] = $this->intime;
      nm_limpa_data($this->intime, $this->field_config['intime']['date_sep']) ; 
      nm_limpa_hora($this->intime_hora, $this->field_config['intime']['time_sep']) ; 
      $this->Before_unformat['outtime'] = $this->outtime;
      nm_limpa_data($this->outtime, $this->field_config['outtime']['date_sep']) ; 
      nm_limpa_hora($this->outtime_hora, $this->field_config['outtime']['time_sep']) ; 
      $this->Before_unformat['awalobs'] = $this->awalobs;
      nm_limpa_data($this->awalobs, $this->field_config['awalobs']['date_sep']) ; 
      nm_limpa_hora($this->awalobs_hora, $this->field_config['awalobs']['time_sep']) ; 
      $this->Before_unformat['akhirobs'] = $this->akhirobs;
      nm_limpa_data($this->akhirobs, $this->field_config['akhirobs']['date_sep']) ; 
      nm_limpa_hora($this->akhirobs_hora, $this->field_config['akhirobs']['time_sep']) ; 
      $this->Before_unformat['id'] = $this->id;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
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
      if ($Nome_Campo == "bb")
      {
          nm_limpa_numero($this->bb, $this->field_config['bb']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tb")
      {
          if (!empty($this->field_config['tb']['symbol_dec']))
          {
             nm_limpa_valor($this->tb, $this->field_config['tb']['symbol_dec'], $this->field_config['tb']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "lingkar")
      {
          if (!empty($this->field_config['lingkar']['symbol_dec']))
          {
             nm_limpa_valor($this->lingkar, $this->field_config['lingkar']['symbol_dec'], $this->field_config['lingkar']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "id")
      {
          nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
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
      if ((!empty($this->birthdate) && 'null' != $this->birthdate) || (!empty($format_fields) && isset($format_fields['birthdate'])))
      {
          $nm_separa_data = strpos($this->field_config['birthdate']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['birthdate']['date_format'];
          $this->field_config['birthdate']['date_format'] = substr($this->field_config['birthdate']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->birthdate, " ") ; 
          $this->birthdate_hora = substr($this->birthdate, $separador + 1) ; 
          $this->birthdate = substr($this->birthdate, 0, $separador) ; 
          nm_volta_data($this->birthdate, $this->field_config['birthdate']['date_format']) ; 
          nmgp_Form_Datas($this->birthdate, $this->field_config['birthdate']['date_format'], $this->field_config['birthdate']['date_sep']) ;  
          $this->field_config['birthdate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->birthdate_hora, $this->field_config['birthdate']['date_format']) ; 
          nmgp_Form_Hora($this->birthdate_hora, $this->field_config['birthdate']['date_format'], $this->field_config['birthdate']['time_sep']) ;  
          $this->field_config['birthdate']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->birthdate || '' == $this->birthdate)
      {
          $this->birthdate_hora = '';
          $this->birthdate = '';
      }
      $this->birthtime = trim($this->birthtime);
      if ($this->birthtime == "")
      {
          $this->birthtime = "";
      }
      if (!empty($this->birthtime) || (!empty($format_fields) && isset($format_fields['birthtime'])))
      {
          nm_conv_form_hora($this->birthtime, "", $this->field_config['birthtime']['date_format'], array($this->field_config['birthtime']['time_sep'])) ;  
      }
      if ('' !== $this->bb || (!empty($format_fields) && isset($format_fields['bb'])))
      {
          nmgp_Form_Num_Val($this->bb, $this->field_config['bb']['symbol_grp'], $this->field_config['bb']['symbol_dec'], "0", "S", $this->field_config['bb']['format_neg'], "", "", "-", $this->field_config['bb']['symbol_fmt']) ; 
      }
      if ('' !== $this->tb || (!empty($format_fields) && isset($format_fields['tb'])))
      {
          nmgp_Form_Num_Val($this->tb, $this->field_config['tb']['symbol_grp'], $this->field_config['tb']['symbol_dec'], "1", "S", $this->field_config['tb']['format_neg'], "", "", "-", $this->field_config['tb']['symbol_fmt']) ; 
      }
      if ('' !== $this->lingkar || (!empty($format_fields) && isset($format_fields['lingkar'])))
      {
          nmgp_Form_Num_Val($this->lingkar, $this->field_config['lingkar']['symbol_grp'], $this->field_config['lingkar']['symbol_dec'], "1", "S", $this->field_config['lingkar']['format_neg'], "", "", "-", $this->field_config['lingkar']['symbol_fmt']) ; 
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
      if ((!empty($this->anestime) && 'null' != $this->anestime) || (!empty($format_fields) && isset($format_fields['anestime'])))
      {
          $nm_separa_data = strpos($this->field_config['anestime']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['anestime']['date_format'];
          $this->field_config['anestime']['date_format'] = substr($this->field_config['anestime']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->anestime, " ") ; 
          $this->anestime_hora = substr($this->anestime, $separador + 1) ; 
          $this->anestime = substr($this->anestime, 0, $separador) ; 
          nm_volta_data($this->anestime, $this->field_config['anestime']['date_format']) ; 
          nmgp_Form_Datas($this->anestime, $this->field_config['anestime']['date_format'], $this->field_config['anestime']['date_sep']) ;  
          $this->field_config['anestime']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->anestime_hora, $this->field_config['anestime']['date_format']) ; 
          nmgp_Form_Hora($this->anestime_hora, $this->field_config['anestime']['date_format'], $this->field_config['anestime']['time_sep']) ;  
          $this->field_config['anestime']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->anestime || '' == $this->anestime)
      {
          $this->anestime_hora = '';
          $this->anestime = '';
      }
      if ((!empty($this->intime) && 'null' != $this->intime) || (!empty($format_fields) && isset($format_fields['intime'])))
      {
          $nm_separa_data = strpos($this->field_config['intime']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['intime']['date_format'];
          $this->field_config['intime']['date_format'] = substr($this->field_config['intime']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->intime, " ") ; 
          $this->intime_hora = substr($this->intime, $separador + 1) ; 
          $this->intime = substr($this->intime, 0, $separador) ; 
          nm_volta_data($this->intime, $this->field_config['intime']['date_format']) ; 
          nmgp_Form_Datas($this->intime, $this->field_config['intime']['date_format'], $this->field_config['intime']['date_sep']) ;  
          $this->field_config['intime']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->intime_hora, $this->field_config['intime']['date_format']) ; 
          nmgp_Form_Hora($this->intime_hora, $this->field_config['intime']['date_format'], $this->field_config['intime']['time_sep']) ;  
          $this->field_config['intime']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->intime || '' == $this->intime)
      {
          $this->intime_hora = '';
          $this->intime = '';
      }
      if ((!empty($this->outtime) && 'null' != $this->outtime) || (!empty($format_fields) && isset($format_fields['outtime'])))
      {
          $nm_separa_data = strpos($this->field_config['outtime']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['outtime']['date_format'];
          $this->field_config['outtime']['date_format'] = substr($this->field_config['outtime']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->outtime, " ") ; 
          $this->outtime_hora = substr($this->outtime, $separador + 1) ; 
          $this->outtime = substr($this->outtime, 0, $separador) ; 
          nm_volta_data($this->outtime, $this->field_config['outtime']['date_format']) ; 
          nmgp_Form_Datas($this->outtime, $this->field_config['outtime']['date_format'], $this->field_config['outtime']['date_sep']) ;  
          $this->field_config['outtime']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->outtime_hora, $this->field_config['outtime']['date_format']) ; 
          nmgp_Form_Hora($this->outtime_hora, $this->field_config['outtime']['date_format'], $this->field_config['outtime']['time_sep']) ;  
          $this->field_config['outtime']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->outtime || '' == $this->outtime)
      {
          $this->outtime_hora = '';
          $this->outtime = '';
      }
      if ((!empty($this->awalobs) && 'null' != $this->awalobs) || (!empty($format_fields) && isset($format_fields['awalobs'])))
      {
          $nm_separa_data = strpos($this->field_config['awalobs']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['awalobs']['date_format'];
          $this->field_config['awalobs']['date_format'] = substr($this->field_config['awalobs']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->awalobs, " ") ; 
          $this->awalobs_hora = substr($this->awalobs, $separador + 1) ; 
          $this->awalobs = substr($this->awalobs, 0, $separador) ; 
          nm_volta_data($this->awalobs, $this->field_config['awalobs']['date_format']) ; 
          nmgp_Form_Datas($this->awalobs, $this->field_config['awalobs']['date_format'], $this->field_config['awalobs']['date_sep']) ;  
          $this->field_config['awalobs']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->awalobs_hora, $this->field_config['awalobs']['date_format']) ; 
          nmgp_Form_Hora($this->awalobs_hora, $this->field_config['awalobs']['date_format'], $this->field_config['awalobs']['time_sep']) ;  
          $this->field_config['awalobs']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->awalobs || '' == $this->awalobs)
      {
          $this->awalobs_hora = '';
          $this->awalobs = '';
      }
      if ((!empty($this->akhirobs) && 'null' != $this->akhirobs) || (!empty($format_fields) && isset($format_fields['akhirobs'])))
      {
          $nm_separa_data = strpos($this->field_config['akhirobs']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['akhirobs']['date_format'];
          $this->field_config['akhirobs']['date_format'] = substr($this->field_config['akhirobs']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->akhirobs, " ") ; 
          $this->akhirobs_hora = substr($this->akhirobs, $separador + 1) ; 
          $this->akhirobs = substr($this->akhirobs, 0, $separador) ; 
          nm_volta_data($this->akhirobs, $this->field_config['akhirobs']['date_format']) ; 
          nmgp_Form_Datas($this->akhirobs, $this->field_config['akhirobs']['date_format'], $this->field_config['akhirobs']['date_sep']) ;  
          $this->field_config['akhirobs']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->akhirobs_hora, $this->field_config['akhirobs']['date_format']) ; 
          nmgp_Form_Hora($this->akhirobs_hora, $this->field_config['akhirobs']['date_format'], $this->field_config['akhirobs']['time_sep']) ;  
          $this->field_config['akhirobs']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->akhirobs || '' == $this->akhirobs)
      {
          $this->akhirobs_hora = '';
          $this->akhirobs = '';
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
      $guarda_format_hora = $this->field_config['birthdate']['date_format'];
      if ($this->birthdate != "")  
      { 
          $nm_separa_data = strpos($this->field_config['birthdate']['date_format'], ";") ;
          $this->field_config['birthdate']['date_format'] = substr($this->field_config['birthdate']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->birthdate, $this->field_config['birthdate']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->birthdate = str_replace('-', '', $this->birthdate);
          }
          $this->field_config['birthdate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->birthdate_hora, $this->field_config['birthdate']['date_format']) ; 
          if ($this->birthdate_hora == "" )  
          { 
              $this->birthdate_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->birthdate_hora = substr($this->birthdate_hora, 0, -4) . "." . substr($this->birthdate_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->birthdate_hora = substr($this->birthdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->birthdate_hora = substr($this->birthdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->birthdate_hora = substr($this->birthdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->birthdate_hora = substr($this->birthdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->birthdate_hora = substr($this->birthdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->birthdate_hora = substr($this->birthdate_hora, 0, -4);
          }
          if ($this->birthdate != "")  
          { 
              $this->birthdate .= " " . $this->birthdate_hora ; 
          }
      } 
      if ($this->birthdate == "" && $use_null)  
      { 
          $this->birthdate = "null" ; 
      } 
      $this->field_config['birthdate']['date_format'] = $guarda_format_hora;
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
      $guarda_format_hora = $this->field_config['anestime']['date_format'];
      if ($this->anestime != "")  
      { 
          $nm_separa_data = strpos($this->field_config['anestime']['date_format'], ";") ;
          $this->field_config['anestime']['date_format'] = substr($this->field_config['anestime']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->anestime, $this->field_config['anestime']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->anestime = str_replace('-', '', $this->anestime);
          }
          $this->field_config['anestime']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->anestime_hora, $this->field_config['anestime']['date_format']) ; 
          if ($this->anestime_hora == "" )  
          { 
              $this->anestime_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->anestime_hora = substr($this->anestime_hora, 0, -4) . "." . substr($this->anestime_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->anestime_hora = substr($this->anestime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->anestime_hora = substr($this->anestime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->anestime_hora = substr($this->anestime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->anestime_hora = substr($this->anestime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->anestime_hora = substr($this->anestime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->anestime_hora = substr($this->anestime_hora, 0, -4);
          }
          if ($this->anestime != "")  
          { 
              $this->anestime .= " " . $this->anestime_hora ; 
          }
      } 
      if ($this->anestime == "" && $use_null)  
      { 
          $this->anestime = "null" ; 
      } 
      $this->field_config['anestime']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['intime']['date_format'];
      if ($this->intime != "")  
      { 
          $nm_separa_data = strpos($this->field_config['intime']['date_format'], ";") ;
          $this->field_config['intime']['date_format'] = substr($this->field_config['intime']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->intime, $this->field_config['intime']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->intime = str_replace('-', '', $this->intime);
          }
          $this->field_config['intime']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->intime_hora, $this->field_config['intime']['date_format']) ; 
          if ($this->intime_hora == "" )  
          { 
              $this->intime_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->intime_hora = substr($this->intime_hora, 0, -4) . "." . substr($this->intime_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->intime_hora = substr($this->intime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->intime_hora = substr($this->intime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->intime_hora = substr($this->intime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->intime_hora = substr($this->intime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->intime_hora = substr($this->intime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->intime_hora = substr($this->intime_hora, 0, -4);
          }
          if ($this->intime != "")  
          { 
              $this->intime .= " " . $this->intime_hora ; 
          }
      } 
      if ($this->intime == "" && $use_null)  
      { 
          $this->intime = "null" ; 
      } 
      $this->field_config['intime']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['outtime']['date_format'];
      if ($this->outtime != "")  
      { 
          $nm_separa_data = strpos($this->field_config['outtime']['date_format'], ";") ;
          $this->field_config['outtime']['date_format'] = substr($this->field_config['outtime']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->outtime, $this->field_config['outtime']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->outtime = str_replace('-', '', $this->outtime);
          }
          $this->field_config['outtime']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->outtime_hora, $this->field_config['outtime']['date_format']) ; 
          if ($this->outtime_hora == "" )  
          { 
              $this->outtime_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->outtime_hora = substr($this->outtime_hora, 0, -4) . "." . substr($this->outtime_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->outtime_hora = substr($this->outtime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->outtime_hora = substr($this->outtime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->outtime_hora = substr($this->outtime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->outtime_hora = substr($this->outtime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->outtime_hora = substr($this->outtime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->outtime_hora = substr($this->outtime_hora, 0, -4);
          }
          if ($this->outtime != "")  
          { 
              $this->outtime .= " " . $this->outtime_hora ; 
          }
      } 
      if ($this->outtime == "" && $use_null)  
      { 
          $this->outtime = "null" ; 
      } 
      $this->field_config['outtime']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['awalobs']['date_format'];
      if ($this->awalobs != "")  
      { 
          $nm_separa_data = strpos($this->field_config['awalobs']['date_format'], ";") ;
          $this->field_config['awalobs']['date_format'] = substr($this->field_config['awalobs']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->awalobs, $this->field_config['awalobs']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->awalobs = str_replace('-', '', $this->awalobs);
          }
          $this->field_config['awalobs']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->awalobs_hora, $this->field_config['awalobs']['date_format']) ; 
          if ($this->awalobs_hora == "" )  
          { 
              $this->awalobs_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->awalobs_hora = substr($this->awalobs_hora, 0, -4) . "." . substr($this->awalobs_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->awalobs_hora = substr($this->awalobs_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->awalobs_hora = substr($this->awalobs_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->awalobs_hora = substr($this->awalobs_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->awalobs_hora = substr($this->awalobs_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->awalobs_hora = substr($this->awalobs_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->awalobs_hora = substr($this->awalobs_hora, 0, -4);
          }
          if ($this->awalobs != "")  
          { 
              $this->awalobs .= " " . $this->awalobs_hora ; 
          }
      } 
      if ($this->awalobs == "" && $use_null)  
      { 
          $this->awalobs = "null" ; 
      } 
      $this->field_config['awalobs']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['akhirobs']['date_format'];
      if ($this->akhirobs != "")  
      { 
          $nm_separa_data = strpos($this->field_config['akhirobs']['date_format'], ";") ;
          $this->field_config['akhirobs']['date_format'] = substr($this->field_config['akhirobs']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->akhirobs, $this->field_config['akhirobs']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->akhirobs = str_replace('-', '', $this->akhirobs);
          }
          $this->field_config['akhirobs']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->akhirobs_hora, $this->field_config['akhirobs']['date_format']) ; 
          if ($this->akhirobs_hora == "" )  
          { 
              $this->akhirobs_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->akhirobs_hora = substr($this->akhirobs_hora, 0, -4) . "." . substr($this->akhirobs_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->akhirobs_hora = substr($this->akhirobs_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->akhirobs_hora = substr($this->akhirobs_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->akhirobs_hora = substr($this->akhirobs_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->akhirobs_hora = substr($this->akhirobs_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->akhirobs_hora = substr($this->akhirobs_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->akhirobs_hora = substr($this->akhirobs_hora, 0, -4);
          }
          if ($this->akhirobs != "")  
          { 
              $this->akhirobs .= " " . $this->akhirobs_hora ; 
          }
      } 
      if ($this->akhirobs == "" && $use_null)  
      { 
          $this->akhirobs = "null" ; 
      } 
      $this->field_config['akhirobs']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_inapcode();
          $this->ajax_return_values_trancode();
          $this->ajax_return_values_custcode();
          $this->ajax_return_values_nama();
          $this->ajax_return_values_class();
          $this->ajax_return_values_babybirth();
          $this->ajax_return_values_birthdate();
          $this->ajax_return_values_birthtime();
          $this->ajax_return_values_bb();
          $this->ajax_return_values_tb();
          $this->ajax_return_values_lingkar();
          $this->ajax_return_values_hidup();
          $this->ajax_return_values_funcroom();
          $this->ajax_return_values_diagpre();
          $this->ajax_return_values_diagpost();
          $this->ajax_return_values_pa();
          $this->ajax_return_values_cito();
          $this->ajax_return_values_trandate();
          $this->ajax_return_values_anestime();
          $this->ajax_return_values_intime();
          $this->ajax_return_values_outtime();
          $this->ajax_return_values_observasi();
          $this->ajax_return_values_tindobservasi();
          $this->ajax_return_values_awalobs();
          $this->ajax_return_values_akhirobs();
          $this->ajax_return_values_detailinsentif();
          $this->ajax_return_values_resepvk();
          $this->ajax_return_values_id();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_tbdetailvk_mob_pack_protect_string($this->nmgp_dados_form['id']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['where_filter'] = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['where_detal']  = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['total']);
              }
          }
   } // ajax_return_values

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

          //----- custcode
   function ajax_return_values_custcode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("custcode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->custcode);
              $aLookup = array();
              $this->_tmp_lookup_custcode = $this->custcode;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_birthdate = $this->birthdate;
   $old_value_birthdate_hora = $this->birthdate_hora;
   $old_value_birthtime = $this->birthtime;
   $old_value_bb = $this->bb;
   $old_value_tb = $this->tb;
   $old_value_lingkar = $this->lingkar;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_anestime = $this->anestime;
   $old_value_anestime_hora = $this->anestime_hora;
   $old_value_intime = $this->intime;
   $old_value_intime_hora = $this->intime_hora;
   $old_value_outtime = $this->outtime;
   $old_value_outtime_hora = $this->outtime_hora;
   $old_value_awalobs = $this->awalobs;
   $old_value_awalobs_hora = $this->awalobs_hora;
   $old_value_akhirobs = $this->akhirobs;
   $old_value_akhirobs_hora = $this->akhirobs_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_birthdate_hora = $this->birthdate_hora;
   $unformatted_value_birthtime = $this->birthtime;
   $unformatted_value_bb = $this->bb;
   $unformatted_value_tb = $this->tb;
   $unformatted_value_lingkar = $this->lingkar;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_anestime = $this->anestime;
   $unformatted_value_anestime_hora = $this->anestime_hora;
   $unformatted_value_intime = $this->intime;
   $unformatted_value_intime_hora = $this->intime_hora;
   $unformatted_value_outtime = $this->outtime;
   $unformatted_value_outtime_hora = $this->outtime_hora;
   $unformatted_value_awalobs = $this->awalobs;
   $unformatted_value_awalobs_hora = $this->awalobs_hora;
   $unformatted_value_akhirobs = $this->akhirobs;
   $unformatted_value_akhirobs_hora = $this->akhirobs_hora;

   $nm_comando = "SELECT custCode  FROM tbadmrawatinap  where tranCode = '$this->inapcode' ORDER BY custCode";

   $this->birthdate = $old_value_birthdate;
   $this->birthdate_hora = $old_value_birthdate_hora;
   $this->birthtime = $old_value_birthtime;
   $this->bb = $old_value_bb;
   $this->tb = $old_value_tb;
   $this->lingkar = $old_value_lingkar;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->anestime = $old_value_anestime;
   $this->anestime_hora = $old_value_anestime_hora;
   $this->intime = $old_value_intime;
   $this->intime_hora = $old_value_intime_hora;
   $this->outtime = $old_value_outtime;
   $this->outtime_hora = $old_value_outtime_hora;
   $this->awalobs = $old_value_awalobs;
   $this->awalobs_hora = $old_value_awalobs_hora;
   $this->akhirobs = $old_value_akhirobs;
   $this->akhirobs_hora = $old_value_akhirobs_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbdetailvk_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbdetailvk_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['custcode']['valList'][$i] = form_tbdetailvk_mob_pack_protect_string($v);
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

          //----- nama
   function ajax_return_values_nama($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nama", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nama);
              $aLookup = array();
              $this->_tmp_lookup_nama = $this->nama;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_birthdate = $this->birthdate;
   $old_value_birthdate_hora = $this->birthdate_hora;
   $old_value_birthtime = $this->birthtime;
   $old_value_bb = $this->bb;
   $old_value_tb = $this->tb;
   $old_value_lingkar = $this->lingkar;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_anestime = $this->anestime;
   $old_value_anestime_hora = $this->anestime_hora;
   $old_value_intime = $this->intime;
   $old_value_intime_hora = $this->intime_hora;
   $old_value_outtime = $this->outtime;
   $old_value_outtime_hora = $this->outtime_hora;
   $old_value_awalobs = $this->awalobs;
   $old_value_awalobs_hora = $this->awalobs_hora;
   $old_value_akhirobs = $this->akhirobs;
   $old_value_akhirobs_hora = $this->akhirobs_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_birthdate_hora = $this->birthdate_hora;
   $unformatted_value_birthtime = $this->birthtime;
   $unformatted_value_bb = $this->bb;
   $unformatted_value_tb = $this->tb;
   $unformatted_value_lingkar = $this->lingkar;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_anestime = $this->anestime;
   $unformatted_value_anestime_hora = $this->anestime_hora;
   $unformatted_value_intime = $this->intime;
   $unformatted_value_intime_hora = $this->intime_hora;
   $unformatted_value_outtime = $this->outtime;
   $unformatted_value_outtime_hora = $this->outtime_hora;
   $unformatted_value_awalobs = $this->awalobs;
   $unformatted_value_awalobs_hora = $this->awalobs_hora;
   $unformatted_value_akhirobs = $this->akhirobs;
   $unformatted_value_akhirobs_hora = $this->akhirobs_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,', ', salut)  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&', '&salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }

   $this->birthdate = $old_value_birthdate;
   $this->birthdate_hora = $old_value_birthdate_hora;
   $this->birthtime = $old_value_birthtime;
   $this->bb = $old_value_bb;
   $this->tb = $old_value_tb;
   $this->lingkar = $old_value_lingkar;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->anestime = $old_value_anestime;
   $this->anestime_hora = $old_value_anestime_hora;
   $this->intime = $old_value_intime;
   $this->intime_hora = $old_value_intime_hora;
   $this->outtime = $old_value_outtime;
   $this->outtime_hora = $old_value_outtime_hora;
   $this->awalobs = $old_value_awalobs;
   $this->awalobs_hora = $old_value_awalobs_hora;
   $this->akhirobs = $old_value_akhirobs;
   $this->akhirobs_hora = $old_value_akhirobs_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbdetailvk_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbdetailvk_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama'][] = $rs->fields[0];
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
          $sSelComp = "name=\"nama\"";
          if (isset($this->NM_ajax_info['select_html']['nama']) && !empty($this->NM_ajax_info['select_html']['nama']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['nama'];
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

                  if ($this->nama == $sValue)
                  {
                      $this->_tmp_lookup_nama = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['nama'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['nama']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['nama']['valList'][$i] = form_tbdetailvk_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['nama']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['nama']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['nama']['labList'] = $aLabel;
          }
   }

          //----- class
   function ajax_return_values_class($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("class", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->class);
              $aLookup = array();
              $this->_tmp_lookup_class = $this->class;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_birthdate = $this->birthdate;
   $old_value_birthdate_hora = $this->birthdate_hora;
   $old_value_birthtime = $this->birthtime;
   $old_value_bb = $this->bb;
   $old_value_tb = $this->tb;
   $old_value_lingkar = $this->lingkar;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_anestime = $this->anestime;
   $old_value_anestime_hora = $this->anestime_hora;
   $old_value_intime = $this->intime;
   $old_value_intime_hora = $this->intime_hora;
   $old_value_outtime = $this->outtime;
   $old_value_outtime_hora = $this->outtime_hora;
   $old_value_awalobs = $this->awalobs;
   $old_value_awalobs_hora = $this->awalobs_hora;
   $old_value_akhirobs = $this->akhirobs;
   $old_value_akhirobs_hora = $this->akhirobs_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_birthdate_hora = $this->birthdate_hora;
   $unformatted_value_birthtime = $this->birthtime;
   $unformatted_value_bb = $this->bb;
   $unformatted_value_tb = $this->tb;
   $unformatted_value_lingkar = $this->lingkar;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_anestime = $this->anestime;
   $unformatted_value_anestime_hora = $this->anestime_hora;
   $unformatted_value_intime = $this->intime;
   $unformatted_value_intime_hora = $this->intime_hora;
   $unformatted_value_outtime = $this->outtime;
   $unformatted_value_outtime_hora = $this->outtime_hora;
   $unformatted_value_awalobs = $this->awalobs;
   $unformatted_value_awalobs_hora = $this->awalobs_hora;
   $unformatted_value_akhirobs = $this->akhirobs;
   $unformatted_value_akhirobs_hora = $this->akhirobs_hora;

   $nm_comando = "SELECT kelas  FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY kelas";

   $this->birthdate = $old_value_birthdate;
   $this->birthdate_hora = $old_value_birthdate_hora;
   $this->birthtime = $old_value_birthtime;
   $this->bb = $old_value_bb;
   $this->tb = $old_value_tb;
   $this->lingkar = $old_value_lingkar;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->anestime = $old_value_anestime;
   $this->anestime_hora = $old_value_anestime_hora;
   $this->intime = $old_value_intime;
   $this->intime_hora = $old_value_intime_hora;
   $this->outtime = $old_value_outtime;
   $this->outtime_hora = $old_value_outtime_hora;
   $this->awalobs = $old_value_awalobs;
   $this->awalobs_hora = $old_value_awalobs_hora;
   $this->akhirobs = $old_value_akhirobs;
   $this->akhirobs_hora = $old_value_akhirobs_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbdetailvk_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbdetailvk_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class'][] = $rs->fields[0];
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
          $sSelComp = "name=\"class\"";
          if (isset($this->NM_ajax_info['select_html']['class']) && !empty($this->NM_ajax_info['select_html']['class']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['class'];
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

                  if ($this->class == $sValue)
                  {
                      $this->_tmp_lookup_class = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['class'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['class']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['class']['valList'][$i] = form_tbdetailvk_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['class']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['class']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['class']['labList'] = $aLabel;
          }
   }

          //----- babybirth
   function ajax_return_values_babybirth($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("babybirth", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->babybirth);
              $aLookup = array();
              $this->_tmp_lookup_babybirth = $this->babybirth;

$aLookup[] = array(form_tbdetailvk_mob_pack_protect_string('1') => form_tbdetailvk_mob_pack_protect_string("Ya"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_babybirth'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['babybirth']) && !empty($this->NM_ajax_info['select_html']['babybirth']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['babybirth'];
          }
          $this->NM_ajax_info['fldList']['babybirth'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-babybirth',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['babybirth']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['babybirth']['valList'][$i] = form_tbdetailvk_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['babybirth']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['babybirth']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['babybirth']['labList'] = $aLabel;
          }
   }

          //----- birthdate
   function ajax_return_values_birthdate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("birthdate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->birthdate);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['birthdate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          $this->NM_ajax_info['fldList']['birthdate_hora'] = array(
               'type'    => 'text',
               'valList' => array($this->birthdate_hora),
              );
          }
   }

          //----- birthtime
   function ajax_return_values_birthtime($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("birthtime", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->birthtime);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['birthtime'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- bb
   function ajax_return_values_bb($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bb", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bb);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bb'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tb
   function ajax_return_values_tb($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tb", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tb);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tb'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- lingkar
   function ajax_return_values_lingkar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lingkar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lingkar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lingkar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- hidup
   function ajax_return_values_hidup($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hidup", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hidup);
              $aLookup = array();
              $this->_tmp_lookup_hidup = $this->hidup;

$aLookup[] = array(form_tbdetailvk_mob_pack_protect_string('1') => form_tbdetailvk_mob_pack_protect_string("Hidup"));
$aLookup[] = array(form_tbdetailvk_mob_pack_protect_string('0') => form_tbdetailvk_mob_pack_protect_string("Mati"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_hidup'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_hidup'][] = '0';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"hidup\"";
          if (isset($this->NM_ajax_info['select_html']['hidup']) && !empty($this->NM_ajax_info['select_html']['hidup']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['hidup'];
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

                  if ($this->hidup == $sValue)
                  {
                      $this->_tmp_lookup_hidup = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['hidup'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['hidup']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['hidup']['valList'][$i] = form_tbdetailvk_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['hidup']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['hidup']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['hidup']['labList'] = $aLabel;
          }
   }

          //----- funcroom
   function ajax_return_values_funcroom($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("funcroom", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->funcroom);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['funcroom'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- diagpre
   function ajax_return_values_diagpre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("diagpre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->diagpre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['diagpre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- diagpost
   function ajax_return_values_diagpost($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("diagpost", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->diagpost);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['diagpost'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pa
   function ajax_return_values_pa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pa);
              $aLookup = array();
              $this->_tmp_lookup_pa = $this->pa;

$aLookup[] = array(form_tbdetailvk_mob_pack_protect_string('Ya') => form_tbdetailvk_mob_pack_protect_string("YA"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_pa'][] = 'Ya';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['pa']) && !empty($this->NM_ajax_info['select_html']['pa']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['pa'];
          }
          $this->NM_ajax_info['fldList']['pa'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-pa',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['pa']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['pa']['valList'][$i] = form_tbdetailvk_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['pa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['pa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['pa']['labList'] = $aLabel;
          }
   }

          //----- cito
   function ajax_return_values_cito($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cito", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cito);
              $aLookup = array();
              $this->_tmp_lookup_cito = $this->cito;

$aLookup[] = array(form_tbdetailvk_mob_pack_protect_string('Non Cito') => form_tbdetailvk_mob_pack_protect_string("Non Cito"));
$aLookup[] = array(form_tbdetailvk_mob_pack_protect_string('Cito Siang') => form_tbdetailvk_mob_pack_protect_string("Cito Siang"));
$aLookup[] = array(form_tbdetailvk_mob_pack_protect_string('Cito Malam') => form_tbdetailvk_mob_pack_protect_string("Cito Malam"));
$aLookup[] = array(form_tbdetailvk_mob_pack_protect_string('Cito Minggu') => form_tbdetailvk_mob_pack_protect_string("Cito Minggu"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_cito'][] = 'Non Cito';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_cito'][] = 'Cito Siang';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_cito'][] = 'Cito Malam';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_cito'][] = 'Cito Minggu';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"cito\"";
          if (isset($this->NM_ajax_info['select_html']['cito']) && !empty($this->NM_ajax_info['select_html']['cito']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['cito'];
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

                  if ($this->cito == $sValue)
                  {
                      $this->_tmp_lookup_cito = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['cito'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cito']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cito']['valList'][$i] = form_tbdetailvk_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cito']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cito']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cito']['labList'] = $aLabel;
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

          //----- anestime
   function ajax_return_values_anestime($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anestime", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anestime);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anestime'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          $this->NM_ajax_info['fldList']['anestime_hora'] = array(
               'type'    => 'text',
               'valList' => array($this->anestime_hora),
              );
          }
   }

          //----- intime
   function ajax_return_values_intime($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("intime", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->intime);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['intime'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          $this->NM_ajax_info['fldList']['intime_hora'] = array(
               'type'    => 'text',
               'valList' => array($this->intime_hora),
              );
          }
   }

          //----- outtime
   function ajax_return_values_outtime($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("outtime", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->outtime);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['outtime'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          $this->NM_ajax_info['fldList']['outtime_hora'] = array(
               'type'    => 'text',
               'valList' => array($this->outtime_hora),
              );
          }
   }

          //----- observasi
   function ajax_return_values_observasi($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("observasi", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->observasi);
              $aLookup = array();
              $this->_tmp_lookup_observasi = $this->observasi;

$aLookup[] = array(form_tbdetailvk_mob_pack_protect_string('1') => form_tbdetailvk_mob_pack_protect_string("Ya"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_observasi'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['observasi']) && !empty($this->NM_ajax_info['select_html']['observasi']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['observasi'];
          }
          $this->NM_ajax_info['fldList']['observasi'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-observasi',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['observasi']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['observasi']['valList'][$i] = form_tbdetailvk_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['observasi']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['observasi']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['observasi']['labList'] = $aLabel;
          }
   }

          //----- tindobservasi
   function ajax_return_values_tindobservasi($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tindobservasi", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tindobservasi);
              $aLookup = array();
              $this->_tmp_lookup_tindobservasi = $this->tindobservasi;

$aLookup[] = array(form_tbdetailvk_mob_pack_protect_string('OBSERVASI') => form_tbdetailvk_mob_pack_protect_string("OBSERVASI"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_tindobservasi'][] = 'OBSERVASI';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tindobservasi\"";
          if (isset($this->NM_ajax_info['select_html']['tindobservasi']) && !empty($this->NM_ajax_info['select_html']['tindobservasi']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['tindobservasi'];
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

                  if ($this->tindobservasi == $sValue)
                  {
                      $this->_tmp_lookup_tindobservasi = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tindobservasi'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tindobservasi']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tindobservasi']['valList'][$i] = form_tbdetailvk_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tindobservasi']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tindobservasi']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tindobservasi']['labList'] = $aLabel;
          }
   }

          //----- awalobs
   function ajax_return_values_awalobs($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("awalobs", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->awalobs);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['awalobs'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          $this->NM_ajax_info['fldList']['awalobs_hora'] = array(
               'type'    => 'text',
               'valList' => array($this->awalobs_hora),
              );
          }
   }

          //----- akhirobs
   function ajax_return_values_akhirobs($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("akhirobs", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->akhirobs);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['akhirobs'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          $this->NM_ajax_info['fldList']['akhirobs_hora'] = array(
               'type'    => 'text',
               'valList' => array($this->akhirobs_hora),
              );
          }
   }

          //----- detailinsentif
   function ajax_return_values_detailinsentif($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detailinsentif", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detailinsentif);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detailinsentif'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- resepvk
   function ajax_return_values_resepvk($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("resepvk", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->resepvk);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['resepvk'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['upload_dir'][$fieldName][] = $newName;
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
      $_SESSION['scriptcase']['form_tbdetailvk_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_bb = $this->bb;
    $original_hidup = $this->hidup;
    $original_lingkar = $this->lingkar;
    $original_observasi = $this->observasi;
    $original_tb = $this->tb;
}
if (!isset($this->sc_temp_v_Code)) {$this->sc_temp_v_Code = (isset($_SESSION['v_Code'])) ? $_SESSION['v_Code'] : "";}
  if($this->babybirth  == '0' || $this->babybirth  == ''){
	$this->nmgp_cmp_hidden["birthdate"] = "off"; $this->NM_ajax_info['fieldDisplay']['birthdate'] = 'off';
	
	$this->nmgp_cmp_hidden["bb"] = "off"; $this->NM_ajax_info['fieldDisplay']['bb'] = 'off';
	$this->nmgp_cmp_hidden["tb"] = "off"; $this->NM_ajax_info['fieldDisplay']['tb'] = 'off';
	$this->nmgp_cmp_hidden["hidup"] = "off"; $this->NM_ajax_info['fieldDisplay']['hidup'] = 'off';
	$this->nmgp_cmp_hidden["lingkar"] = "off"; $this->NM_ajax_info['fieldDisplay']['lingkar'] = 'off';
}else{
	$this->nmgp_cmp_hidden["birthdate"] = "on"; $this->NM_ajax_info['fieldDisplay']['birthdate'] = 'on';
	
	$this->nmgp_cmp_hidden["bb"] = "on"; $this->NM_ajax_info['fieldDisplay']['bb'] = 'on';
	$this->nmgp_cmp_hidden["tb"] = "on"; $this->NM_ajax_info['fieldDisplay']['tb'] = 'on';
	$this->nmgp_cmp_hidden["hidup"] = "on"; $this->NM_ajax_info['fieldDisplay']['hidup'] = 'on';
	$this->nmgp_cmp_hidden["lingkar"] = "on"; $this->NM_ajax_info['fieldDisplay']['lingkar'] = 'on';
}

if($this->observasi  == '1'){
	$this->nmgp_cmp_hidden["tindobservasi"] = "on"; $this->NM_ajax_info['fieldDisplay']['tindobservasi'] = 'on';
	$this->nmgp_cmp_hidden["awalobs"] = "on"; $this->NM_ajax_info['fieldDisplay']['awalobs'] = 'on';
	$this->nmgp_cmp_hidden["akhirobs"] = "on"; $this->NM_ajax_info['fieldDisplay']['akhirobs'] = 'on';
}else{
	$this->nmgp_cmp_hidden["tindobservasi"] = "off"; $this->NM_ajax_info['fieldDisplay']['tindobservasi'] = 'off';
	$this->nmgp_cmp_hidden["awalobs"] = "off"; $this->NM_ajax_info['fieldDisplay']['awalobs'] = 'off';
	$this->nmgp_cmp_hidden["akhirobs"] = "off"; $this->NM_ajax_info['fieldDisplay']['akhirobs'] = 'off';
}

$this->sc_temp_v_Code = $this->trancode ;
if (isset($this->sc_temp_v_Code)) { $_SESSION['v_Code'] = $this->sc_temp_v_Code;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_bb != $this->bb || (isset($bFlagRead_bb) && $bFlagRead_bb)))
    {
        $this->ajax_return_values_bb(true);
    }
    if (($original_hidup != $this->hidup || (isset($bFlagRead_hidup) && $bFlagRead_hidup)))
    {
        $this->ajax_return_values_hidup(true);
    }
    if (($original_lingkar != $this->lingkar || (isset($bFlagRead_lingkar) && $bFlagRead_lingkar)))
    {
        $this->ajax_return_values_lingkar(true);
    }
    if (($original_observasi != $this->observasi || (isset($bFlagRead_observasi) && $bFlagRead_observasi)))
    {
        $this->ajax_return_values_observasi(true);
    }
    if (($original_tb != $this->tb || (isset($bFlagRead_tb) && $bFlagRead_tb)))
    {
        $this->ajax_return_values_tb(true);
    }
}
$_SESSION['scriptcase']['form_tbdetailvk_mob']['contr_erro'] = 'off'; 
      }
      if (empty($this->birthdate))
      {
          $this->birthdate_hora = $this->birthdate;
      }
      if (empty($this->trandate))
      {
          $this->trandate_hora = $this->trandate;
      }
      if (empty($this->anestime))
      {
          $this->anestime_hora = $this->anestime;
      }
      if (empty($this->intime))
      {
          $this->intime_hora = $this->intime;
      }
      if (empty($this->outtime))
      {
          $this->outtime_hora = $this->outtime;
      }
      if (empty($this->awalobs))
      {
          $this->awalobs_hora = $this->awalobs;
      }
      if (empty($this->akhirobs))
      {
          $this->akhirobs_hora = $this->akhirobs;
      }
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
      $this->tb = str_replace($sc_parm1, $sc_parm2, $this->tb); 
      $this->lingkar = str_replace($sc_parm1, $sc_parm2, $this->lingkar); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->tb = "'" . $this->tb . "'";
      $this->lingkar = "'" . $this->lingkar . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->tb = str_replace("'", "", $this->tb); 
      $this->lingkar = str_replace("'", "", $this->lingkar); 
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
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_tbdetailvk_mob']['contr_erro'] = 'on';
  $today = date("ym");
$check_sql = "SELECT max(tranCode)"
   . " FROM tbdetailvk"
   . " WHERE tranCode LIKE 'VK$today%'";
 
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
	$lastNoUrut = substr($lastNoTransaksi, 6, 3); 
	$nextNoUrut = $lastNoUrut + 1;
	$this->trancode  = 'VK'.$today.sprintf('%03s', $nextNoUrut);
}
		else     
{
	$this->trancode  = 'VK'.$today.sprintf('%03s', '1');
}
$_SESSION['scriptcase']['form_tbdetailvk_mob']['contr_erro'] = 'off'; 
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
      $NM_val_form['inapcode'] = $this->inapcode;
      $NM_val_form['trancode'] = $this->trancode;
      $NM_val_form['custcode'] = $this->custcode;
      $NM_val_form['nama'] = $this->nama;
      $NM_val_form['class'] = $this->class;
      $NM_val_form['babybirth'] = $this->babybirth;
      $NM_val_form['birthdate'] = $this->birthdate;
      $NM_val_form['birthtime'] = $this->birthtime;
      $NM_val_form['bb'] = $this->bb;
      $NM_val_form['tb'] = $this->tb;
      $NM_val_form['lingkar'] = $this->lingkar;
      $NM_val_form['hidup'] = $this->hidup;
      $NM_val_form['funcroom'] = $this->funcroom;
      $NM_val_form['diagpre'] = $this->diagpre;
      $NM_val_form['diagpost'] = $this->diagpost;
      $NM_val_form['pa'] = $this->pa;
      $NM_val_form['cito'] = $this->cito;
      $NM_val_form['trandate'] = $this->trandate;
      $NM_val_form['anestime'] = $this->anestime;
      $NM_val_form['intime'] = $this->intime;
      $NM_val_form['outtime'] = $this->outtime;
      $NM_val_form['observasi'] = $this->observasi;
      $NM_val_form['tindobservasi'] = $this->tindobservasi;
      $NM_val_form['awalobs'] = $this->awalobs;
      $NM_val_form['akhirobs'] = $this->akhirobs;
      $NM_val_form['detailinsentif'] = $this->detailinsentif;
      $NM_val_form['resepvk'] = $this->resepvk;
      $NM_val_form['id'] = $this->id;
      if ($this->id === "" || is_null($this->id))  
      { 
          $this->id = 0;
      } 
      if ($this->babybirth === "" || is_null($this->babybirth))  
      { 
          $this->babybirth = 0;
          $this->sc_force_zero[] = 'babybirth';
      } 
      if ($this->bb === "" || is_null($this->bb))  
      { 
          $this->bb = 0;
          $this->sc_force_zero[] = 'bb';
      } 
      if ($this->tb === "" || is_null($this->tb))  
      { 
          $this->tb = 0;
          $this->sc_force_zero[] = 'tb';
      } 
      if ($this->lingkar === "" || is_null($this->lingkar))  
      { 
          $this->lingkar = 0;
          $this->sc_force_zero[] = 'lingkar';
      } 
      if ($this->hidup === "" || is_null($this->hidup))  
      { 
          $this->hidup = 0;
          $this->sc_force_zero[] = 'hidup';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->trancode_before_qstr = $this->trancode;
          $this->trancode = substr($this->Db->qstr($this->trancode), 1, -1); 
          if ($this->trancode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->trancode = "null"; 
              $NM_val_null[] = "trancode";
          } 
          $this->custcode_before_qstr = $this->custcode;
          $this->custcode = substr($this->Db->qstr($this->custcode), 1, -1); 
          if ($this->custcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->custcode = "null"; 
              $NM_val_null[] = "custcode";
          } 
          if ($this->birthdate == "")  
          { 
              $this->birthdate = "null"; 
              $NM_val_null[] = "birthdate";
          } 
          $this->birthtime_before_qstr = $this->birthtime;
          $this->birthtime = substr($this->Db->qstr($this->birthtime), 1, -1); 
          if ($this->birthtime == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->birthtime = "null"; 
              $NM_val_null[] = "birthtime";
          } 
          if ($this->anestime == "")  
          { 
              $this->anestime = "null"; 
              $NM_val_null[] = "anestime";
          } 
          if ($this->intime == "")  
          { 
              $this->intime = "null"; 
              $NM_val_null[] = "intime";
          } 
          if ($this->outtime == "")  
          { 
              $this->outtime = "null"; 
              $NM_val_null[] = "outtime";
          } 
          $this->pa_before_qstr = $this->pa;
          $this->pa = substr($this->Db->qstr($this->pa), 1, -1); 
          if ($this->pa == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pa = "null"; 
              $NM_val_null[] = "pa";
          } 
          $this->cito_before_qstr = $this->cito;
          $this->cito = substr($this->Db->qstr($this->cito), 1, -1); 
          if ($this->cito == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cito = "null"; 
              $NM_val_null[] = "cito";
          } 
          $this->diagpre_before_qstr = $this->diagpre;
          $this->diagpre = substr($this->Db->qstr($this->diagpre), 1, -1); 
          if ($this->diagpre == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->diagpre = "null"; 
              $NM_val_null[] = "diagpre";
          } 
          $this->diagpost_before_qstr = $this->diagpost;
          $this->diagpost = substr($this->Db->qstr($this->diagpost), 1, -1); 
          if ($this->diagpost == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->diagpost = "null"; 
              $NM_val_null[] = "diagpost";
          } 
          if ($this->trandate == "")  
          { 
              $this->trandate = "null"; 
              $NM_val_null[] = "trandate";
          } 
          $this->class_before_qstr = $this->class;
          $this->class = substr($this->Db->qstr($this->class), 1, -1); 
          if ($this->class == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->class = "null"; 
              $NM_val_null[] = "class";
          } 
          if ($this->awalobs == "")  
          { 
              $this->awalobs = "null"; 
              $NM_val_null[] = "awalobs";
          } 
          if ($this->akhirobs == "")  
          { 
              $this->akhirobs = "null"; 
              $NM_val_null[] = "akhirobs";
          } 
          $this->inapcode_before_qstr = $this->inapcode;
          $this->inapcode = substr($this->Db->qstr($this->inapcode), 1, -1); 
          if ($this->inapcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->inapcode = "null"; 
              $NM_val_null[] = "inapcode";
          } 
          $this->observasi_before_qstr = $this->observasi;
          $this->observasi = substr($this->Db->qstr($this->observasi), 1, -1); 
          if ($this->observasi == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observasi = "null"; 
              $NM_val_null[] = "observasi";
          } 
          $this->tindobservasi_before_qstr = $this->tindobservasi;
          $this->tindobservasi = substr($this->Db->qstr($this->tindobservasi), 1, -1); 
          if ($this->tindobservasi == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tindobservasi = "null"; 
              $NM_val_null[] = "tindobservasi";
          } 
          $this->funcroom_before_qstr = $this->funcroom;
          $this->funcroom = substr($this->Db->qstr($this->funcroom), 1, -1); 
          if ($this->funcroom == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->funcroom = "null"; 
              $NM_val_null[] = "funcroom";
          } 
          $this->detailinsentif_before_qstr = $this->detailinsentif;
          $this->detailinsentif = substr($this->Db->qstr($this->detailinsentif), 1, -1); 
          if ($this->detailinsentif == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detailinsentif = "null"; 
              $NM_val_null[] = "detailinsentif";
          } 
          $this->resepvk_before_qstr = $this->resepvk;
          $this->resepvk = substr($this->Db->qstr($this->resepvk), 1, -1); 
          if ($this->resepvk == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->resepvk = "null"; 
              $NM_val_null[] = "resepvk";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
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
                 form_tbdetailvk_mob_pack_ajax_response();
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
                  $SC_fields_update[] = "tranCode = '$this->trancode', custCode = '$this->custcode', babyBirth = $this->babybirth, birthDate = #$this->birthdate#, birthTime = '$this->birthtime', bb = $this->bb, tb = $this->tb, lingkar = $this->lingkar, hidup = $this->hidup, anesTime = #$this->anestime#, inTime = #$this->intime#, outTime = #$this->outtime#, PA = '$this->pa', Cito = '$this->cito', diagPre = '$this->diagpre', diagPost = '$this->diagpost', tranDate = #$this->trandate#, class = '$this->class', awalObs = #$this->awalobs#, akhirObs = #$this->akhirobs#, inapCode = '$this->inapcode', observasi = '$this->observasi', tindObservasi = '$this->tindobservasi', funcRoom = '$this->funcroom'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', custCode = '$this->custcode', babyBirth = $this->babybirth, birthDate = " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", birthTime = '$this->birthtime', bb = $this->bb, tb = $this->tb, lingkar = $this->lingkar, hidup = $this->hidup, anesTime = " . $this->Ini->date_delim . $this->anestime . $this->Ini->date_delim1 . ", inTime = " . $this->Ini->date_delim . $this->intime . $this->Ini->date_delim1 . ", outTime = " . $this->Ini->date_delim . $this->outtime . $this->Ini->date_delim1 . ", PA = '$this->pa', Cito = '$this->cito', diagPre = '$this->diagpre', diagPost = '$this->diagpost', tranDate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", class = '$this->class', awalObs = " . $this->Ini->date_delim . $this->awalobs . $this->Ini->date_delim1 . ", akhirObs = " . $this->Ini->date_delim . $this->akhirobs . $this->Ini->date_delim1 . ", inapCode = '$this->inapcode', observasi = '$this->observasi', tindObservasi = '$this->tindobservasi', funcRoom = '$this->funcroom'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', custCode = '$this->custcode', babyBirth = $this->babybirth, birthDate = " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", birthTime = '$this->birthtime', bb = $this->bb, tb = $this->tb, lingkar = $this->lingkar, hidup = $this->hidup, anesTime = " . $this->Ini->date_delim . $this->anestime . $this->Ini->date_delim1 . ", inTime = " . $this->Ini->date_delim . $this->intime . $this->Ini->date_delim1 . ", outTime = " . $this->Ini->date_delim . $this->outtime . $this->Ini->date_delim1 . ", PA = '$this->pa', Cito = '$this->cito', diagPre = '$this->diagpre', diagPost = '$this->diagpost', tranDate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", class = '$this->class', awalObs = " . $this->Ini->date_delim . $this->awalobs . $this->Ini->date_delim1 . ", akhirObs = " . $this->Ini->date_delim . $this->akhirobs . $this->Ini->date_delim1 . ", inapCode = '$this->inapcode', observasi = '$this->observasi', tindObservasi = '$this->tindobservasi', funcRoom = '$this->funcroom'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', custCode = '$this->custcode', babyBirth = $this->babybirth, birthDate = EXTEND('$this->birthdate', YEAR TO FRACTION), birthTime = '$this->birthtime', bb = $this->bb, tb = $this->tb, lingkar = $this->lingkar, hidup = $this->hidup, anesTime = EXTEND('$this->anestime', YEAR TO FRACTION), inTime = EXTEND('$this->intime', YEAR TO FRACTION), outTime = EXTEND('$this->outtime', YEAR TO FRACTION), PA = '$this->pa', Cito = '$this->cito', diagPre = '$this->diagpre', diagPost = '$this->diagpost', tranDate = EXTEND('$this->trandate', YEAR TO FRACTION), class = '$this->class', awalObs = EXTEND('$this->awalobs', YEAR TO FRACTION), akhirObs = EXTEND('$this->akhirobs', YEAR TO FRACTION), inapCode = '$this->inapcode', observasi = '$this->observasi', tindObservasi = '$this->tindobservasi', funcRoom = '$this->funcroom'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', custCode = '$this->custcode', babyBirth = $this->babybirth, birthDate = " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", birthTime = '$this->birthtime', bb = $this->bb, tb = $this->tb, lingkar = $this->lingkar, hidup = $this->hidup, anesTime = " . $this->Ini->date_delim . $this->anestime . $this->Ini->date_delim1 . ", inTime = " . $this->Ini->date_delim . $this->intime . $this->Ini->date_delim1 . ", outTime = " . $this->Ini->date_delim . $this->outtime . $this->Ini->date_delim1 . ", PA = '$this->pa', Cito = '$this->cito', diagPre = '$this->diagpre', diagPost = '$this->diagpost', tranDate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", class = '$this->class', awalObs = " . $this->Ini->date_delim . $this->awalobs . $this->Ini->date_delim1 . ", akhirObs = " . $this->Ini->date_delim . $this->akhirobs . $this->Ini->date_delim1 . ", inapCode = '$this->inapcode', observasi = '$this->observasi', tindObservasi = '$this->tindobservasi', funcRoom = '$this->funcroom'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', custCode = '$this->custcode', babyBirth = $this->babybirth, birthDate = " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", birthTime = '$this->birthtime', bb = $this->bb, tb = $this->tb, lingkar = $this->lingkar, hidup = $this->hidup, anesTime = " . $this->Ini->date_delim . $this->anestime . $this->Ini->date_delim1 . ", inTime = " . $this->Ini->date_delim . $this->intime . $this->Ini->date_delim1 . ", outTime = " . $this->Ini->date_delim . $this->outtime . $this->Ini->date_delim1 . ", PA = '$this->pa', Cito = '$this->cito', diagPre = '$this->diagpre', diagPost = '$this->diagpost', tranDate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", class = '$this->class', awalObs = " . $this->Ini->date_delim . $this->awalobs . $this->Ini->date_delim1 . ", akhirObs = " . $this->Ini->date_delim . $this->akhirobs . $this->Ini->date_delim1 . ", inapCode = '$this->inapcode', observasi = '$this->observasi', tindObservasi = '$this->tindobservasi', funcRoom = '$this->funcroom'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', custCode = '$this->custcode', babyBirth = $this->babybirth, birthDate = " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", birthTime = '$this->birthtime', bb = $this->bb, tb = $this->tb, lingkar = $this->lingkar, hidup = $this->hidup, anesTime = " . $this->Ini->date_delim . $this->anestime . $this->Ini->date_delim1 . ", inTime = " . $this->Ini->date_delim . $this->intime . $this->Ini->date_delim1 . ", outTime = " . $this->Ini->date_delim . $this->outtime . $this->Ini->date_delim1 . ", PA = '$this->pa', Cito = '$this->cito', diagPre = '$this->diagpre', diagPost = '$this->diagpost', tranDate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", class = '$this->class', awalObs = " . $this->Ini->date_delim . $this->awalobs . $this->Ini->date_delim1 . ", akhirObs = " . $this->Ini->date_delim . $this->akhirobs . $this->Ini->date_delim1 . ", inapCode = '$this->inapcode', observasi = '$this->observasi', tindObservasi = '$this->tindobservasi', funcRoom = '$this->funcroom'"; 
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
                                  form_tbdetailvk_mob_pack_ajax_response();
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
              $this->custcode = $this->custcode_before_qstr;
              $this->birthtime = $this->birthtime_before_qstr;
              $this->pa = $this->pa_before_qstr;
              $this->cito = $this->cito_before_qstr;
              $this->diagpre = $this->diagpre_before_qstr;
              $this->diagpost = $this->diagpost_before_qstr;
              $this->class = $this->class_before_qstr;
              $this->inapcode = $this->inapcode_before_qstr;
              $this->observasi = $this->observasi_before_qstr;
              $this->tindobservasi = $this->tindobservasi_before_qstr;
              $this->funcroom = $this->funcroom_before_qstr;
              $this->detailinsentif = $this->detailinsentif_before_qstr;
              $this->resepvk = $this->resepvk_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['trancode'])) { $this->trancode = $NM_val_form['trancode']; }
              elseif (isset($this->trancode)) { $this->nm_limpa_alfa($this->trancode); }
              if     (isset($NM_val_form) && isset($NM_val_form['custcode'])) { $this->custcode = $NM_val_form['custcode']; }
              elseif (isset($this->custcode)) { $this->nm_limpa_alfa($this->custcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['babybirth'])) { $this->babybirth = $NM_val_form['babybirth']; }
              elseif (isset($this->babybirth)) { $this->nm_limpa_alfa($this->babybirth); }
              if     (isset($NM_val_form) && isset($NM_val_form['birthtime'])) { $this->birthtime = $NM_val_form['birthtime']; }
              elseif (isset($this->birthtime)) { $this->nm_limpa_alfa($this->birthtime); }
              if     (isset($NM_val_form) && isset($NM_val_form['bb'])) { $this->bb = $NM_val_form['bb']; }
              elseif (isset($this->bb)) { $this->nm_limpa_alfa($this->bb); }
              if     (isset($NM_val_form) && isset($NM_val_form['tb'])) { $this->tb = $NM_val_form['tb']; }
              elseif (isset($this->tb)) { $this->nm_limpa_alfa($this->tb); }
              if     (isset($NM_val_form) && isset($NM_val_form['lingkar'])) { $this->lingkar = $NM_val_form['lingkar']; }
              elseif (isset($this->lingkar)) { $this->nm_limpa_alfa($this->lingkar); }
              if     (isset($NM_val_form) && isset($NM_val_form['hidup'])) { $this->hidup = $NM_val_form['hidup']; }
              elseif (isset($this->hidup)) { $this->nm_limpa_alfa($this->hidup); }
              if     (isset($NM_val_form) && isset($NM_val_form['pa'])) { $this->pa = $NM_val_form['pa']; }
              elseif (isset($this->pa)) { $this->nm_limpa_alfa($this->pa); }
              if     (isset($NM_val_form) && isset($NM_val_form['cito'])) { $this->cito = $NM_val_form['cito']; }
              elseif (isset($this->cito)) { $this->nm_limpa_alfa($this->cito); }
              if     (isset($NM_val_form) && isset($NM_val_form['diagpre'])) { $this->diagpre = $NM_val_form['diagpre']; }
              elseif (isset($this->diagpre)) { $this->nm_limpa_alfa($this->diagpre); }
              if     (isset($NM_val_form) && isset($NM_val_form['diagpost'])) { $this->diagpost = $NM_val_form['diagpost']; }
              elseif (isset($this->diagpost)) { $this->nm_limpa_alfa($this->diagpost); }
              if     (isset($NM_val_form) && isset($NM_val_form['class'])) { $this->class = $NM_val_form['class']; }
              elseif (isset($this->class)) { $this->nm_limpa_alfa($this->class); }
              if     (isset($NM_val_form) && isset($NM_val_form['inapcode'])) { $this->inapcode = $NM_val_form['inapcode']; }
              elseif (isset($this->inapcode)) { $this->nm_limpa_alfa($this->inapcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['observasi'])) { $this->observasi = $NM_val_form['observasi']; }
              elseif (isset($this->observasi)) { $this->nm_limpa_alfa($this->observasi); }
              if     (isset($NM_val_form) && isset($NM_val_form['tindobservasi'])) { $this->tindobservasi = $NM_val_form['tindobservasi']; }
              elseif (isset($this->tindobservasi)) { $this->nm_limpa_alfa($this->tindobservasi); }
              if     (isset($NM_val_form) && isset($NM_val_form['funcroom'])) { $this->funcroom = $NM_val_form['funcroom']; }
              elseif (isset($this->funcroom)) { $this->nm_limpa_alfa($this->funcroom); }
              if     (isset($NM_val_form) && isset($NM_val_form['detailinsentif'])) { $this->detailinsentif = $NM_val_form['detailinsentif']; }
              elseif (isset($this->detailinsentif)) { $this->nm_limpa_alfa($this->detailinsentif); }
              if     (isset($NM_val_form) && isset($NM_val_form['resepvk'])) { $this->resepvk = $NM_val_form['resepvk']; }
              elseif (isset($this->resepvk)) { $this->nm_limpa_alfa($this->resepvk); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('inapcode', 'trancode', 'custcode', 'nama', 'class', 'babybirth', 'birthdate', 'birthtime', 'bb', 'tb', 'lingkar', 'hidup', 'funcroom', 'diagpre', 'diagpost', 'pa', 'cito', 'trandate', 'anestime', 'intime', 'outtime', 'observasi', 'tindobservasi', 'awalobs', 'akhirobs', 'detailinsentif', 'resepvk'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id, ";
          } 
              $this->trandate =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->trandate_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_tbdetailvk_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (tranCode, custCode, babyBirth, birthDate, birthTime, bb, tb, lingkar, hidup, anesTime, inTime, outTime, PA, Cito, diagPre, diagPost, tranDate, class, awalObs, akhirObs, inapCode, observasi, tindObservasi, funcRoom) VALUES ('$this->trancode', '$this->custcode', $this->babybirth, #$this->birthdate#, '$this->birthtime', $this->bb, $this->tb, $this->lingkar, $this->hidup, #$this->anestime#, #$this->intime#, #$this->outtime#, '$this->pa', '$this->cito', '$this->diagpre', '$this->diagpost', #$this->trandate#, '$this->class', #$this->awalobs#, #$this->akhirobs#, '$this->inapcode', '$this->observasi', '$this->tindobservasi', '$this->funcroom')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, custCode, babyBirth, birthDate, birthTime, bb, tb, lingkar, hidup, anesTime, inTime, outTime, PA, Cito, diagPre, diagPost, tranDate, class, awalObs, akhirObs, inapCode, observasi, tindObservasi, funcRoom) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->custcode', $this->babybirth, " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->birthtime', $this->bb, $this->tb, $this->lingkar, $this->hidup, " . $this->Ini->date_delim . $this->anestime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->intime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->outtime . $this->Ini->date_delim1 . ", '$this->pa', '$this->cito', '$this->diagpre', '$this->diagpost', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->class', " . $this->Ini->date_delim . $this->awalobs . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->akhirobs . $this->Ini->date_delim1 . ", '$this->inapcode', '$this->observasi', '$this->tindobservasi', '$this->funcroom')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, custCode, babyBirth, birthDate, birthTime, bb, tb, lingkar, hidup, anesTime, inTime, outTime, PA, Cito, diagPre, diagPost, tranDate, class, awalObs, akhirObs, inapCode, observasi, tindObservasi, funcRoom) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->custcode', $this->babybirth, " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->birthtime', $this->bb, $this->tb, $this->lingkar, $this->hidup, " . $this->Ini->date_delim . $this->anestime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->intime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->outtime . $this->Ini->date_delim1 . ", '$this->pa', '$this->cito', '$this->diagpre', '$this->diagpost', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->class', " . $this->Ini->date_delim . $this->awalobs . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->akhirobs . $this->Ini->date_delim1 . ", '$this->inapcode', '$this->observasi', '$this->tindobservasi', '$this->funcroom')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, custCode, babyBirth, birthDate, birthTime, bb, tb, lingkar, hidup, anesTime, inTime, outTime, PA, Cito, diagPre, diagPost, tranDate, class, awalObs, akhirObs, inapCode, observasi, tindObservasi, funcRoom) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->custcode', $this->babybirth, " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->birthtime', $this->bb, $this->tb, $this->lingkar, $this->hidup, " . $this->Ini->date_delim . $this->anestime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->intime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->outtime . $this->Ini->date_delim1 . ", '$this->pa', '$this->cito', '$this->diagpre', '$this->diagpost', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->class', " . $this->Ini->date_delim . $this->awalobs . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->akhirobs . $this->Ini->date_delim1 . ", '$this->inapcode', '$this->observasi', '$this->tindobservasi', '$this->funcroom')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, custCode, babyBirth, birthDate, birthTime, bb, tb, lingkar, hidup, anesTime, inTime, outTime, PA, Cito, diagPre, diagPost, tranDate, class, awalObs, akhirObs, inapCode, observasi, tindObservasi, funcRoom) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->custcode', $this->babybirth, EXTEND('$this->birthdate', YEAR TO FRACTION), '$this->birthtime', $this->bb, $this->tb, $this->lingkar, $this->hidup, EXTEND('$this->anestime', YEAR TO FRACTION), EXTEND('$this->intime', YEAR TO FRACTION), EXTEND('$this->outtime', YEAR TO FRACTION), '$this->pa', '$this->cito', '$this->diagpre', '$this->diagpost', EXTEND('$this->trandate', YEAR TO FRACTION), '$this->class', EXTEND('$this->awalobs', YEAR TO FRACTION), EXTEND('$this->akhirobs', YEAR TO FRACTION), '$this->inapcode', '$this->observasi', '$this->tindobservasi', '$this->funcroom')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, custCode, babyBirth, birthDate, birthTime, bb, tb, lingkar, hidup, anesTime, inTime, outTime, PA, Cito, diagPre, diagPost, tranDate, class, awalObs, akhirObs, inapCode, observasi, tindObservasi, funcRoom) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->custcode', $this->babybirth, " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->birthtime', $this->bb, $this->tb, $this->lingkar, $this->hidup, " . $this->Ini->date_delim . $this->anestime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->intime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->outtime . $this->Ini->date_delim1 . ", '$this->pa', '$this->cito', '$this->diagpre', '$this->diagpost', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->class', " . $this->Ini->date_delim . $this->awalobs . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->akhirobs . $this->Ini->date_delim1 . ", '$this->inapcode', '$this->observasi', '$this->tindobservasi', '$this->funcroom')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, custCode, babyBirth, birthDate, birthTime, bb, tb, lingkar, hidup, anesTime, inTime, outTime, PA, Cito, diagPre, diagPost, tranDate, class, awalObs, akhirObs, inapCode, observasi, tindObservasi, funcRoom) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->custcode', $this->babybirth, " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->birthtime', $this->bb, $this->tb, $this->lingkar, $this->hidup, " . $this->Ini->date_delim . $this->anestime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->intime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->outtime . $this->Ini->date_delim1 . ", '$this->pa', '$this->cito', '$this->diagpre', '$this->diagpost', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->class', " . $this->Ini->date_delim . $this->awalobs . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->akhirobs . $this->Ini->date_delim1 . ", '$this->inapcode', '$this->observasi', '$this->tindobservasi', '$this->funcroom')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, custCode, babyBirth, birthDate, birthTime, bb, tb, lingkar, hidup, anesTime, inTime, outTime, PA, Cito, diagPre, diagPost, tranDate, class, awalObs, akhirObs, inapCode, observasi, tindObservasi, funcRoom) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->custcode', $this->babybirth, " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->birthtime', $this->bb, $this->tb, $this->lingkar, $this->hidup, " . $this->Ini->date_delim . $this->anestime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->intime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->outtime . $this->Ini->date_delim1 . ", '$this->pa', '$this->cito', '$this->diagpre', '$this->diagpost', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->class', " . $this->Ini->date_delim . $this->awalobs . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->akhirobs . $this->Ini->date_delim1 . ", '$this->inapcode', '$this->observasi', '$this->tindobservasi', '$this->funcroom')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, custCode, babyBirth, birthDate, birthTime, bb, tb, lingkar, hidup, anesTime, inTime, outTime, PA, Cito, diagPre, diagPost, tranDate, class, awalObs, akhirObs, inapCode, observasi, tindObservasi, funcRoom) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->custcode', $this->babybirth, " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->birthtime', $this->bb, $this->tb, $this->lingkar, $this->hidup, " . $this->Ini->date_delim . $this->anestime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->intime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->outtime . $this->Ini->date_delim1 . ", '$this->pa', '$this->cito', '$this->diagpre', '$this->diagpost', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->class', " . $this->Ini->date_delim . $this->awalobs . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->akhirobs . $this->Ini->date_delim1 . ", '$this->inapcode', '$this->observasi', '$this->tindobservasi', '$this->funcroom')"; 
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
                              form_tbdetailvk_mob_pack_ajax_response();
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
                          form_tbdetailvk_mob_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->trancode = $this->trancode_before_qstr;
              $this->custcode = $this->custcode_before_qstr;
              $this->birthtime = $this->birthtime_before_qstr;
              $this->pa = $this->pa_before_qstr;
              $this->cito = $this->cito_before_qstr;
              $this->diagpre = $this->diagpre_before_qstr;
              $this->diagpost = $this->diagpost_before_qstr;
              $this->class = $this->class_before_qstr;
              $this->inapcode = $this->inapcode_before_qstr;
              $this->observasi = $this->observasi_before_qstr;
              $this->tindobservasi = $this->tindobservasi_before_qstr;
              $this->funcroom = $this->funcroom_before_qstr;
              $this->detailinsentif = $this->detailinsentif_before_qstr;
              $this->resepvk = $this->resepvk_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';
          if ($bDelecaoOk)
          {
              $sDetailWhere = "trancode = '" . $this->trancode . "'";
              $this->form_tbtim_mob->ini_controle();
              if ($this->form_tbtim_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "'";
              $this->form_tbdetailresepokvk_mob->ini_controle();
              if ($this->form_tbdetailresepokvk_mob->temRegistros($sDetailWhere))
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
                          form_tbdetailvk_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = null === $this->id ? null : substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['iframe_evento'] = $this->sc_evento; 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_tbdetailvk_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total'] = $qt_geral_reg_form_tbdetailvk_mob;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_tbdetailvk_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] > $qt_geral_reg_form_tbdetailvk_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] = $qt_geral_reg_form_tbdetailvk_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] = $qt_geral_reg_form_tbdetailvk_mob; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total'] + 1; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT id, tranCode, custCode, babyBirth, str_replace (convert(char(10),birthDate,102), '.', '-') + ' ' + convert(char(8),birthDate,20), birthTime, bb, tb, lingkar, hidup, str_replace (convert(char(10),anesTime,102), '.', '-') + ' ' + convert(char(8),anesTime,20), str_replace (convert(char(10),inTime,102), '.', '-') + ' ' + convert(char(8),inTime,20), str_replace (convert(char(10),outTime,102), '.', '-') + ' ' + convert(char(8),outTime,20), PA, Cito, diagPre, diagPost, str_replace (convert(char(10),tranDate,102), '.', '-') + ' ' + convert(char(8),tranDate,20), class, str_replace (convert(char(10),awalObs,102), '.', '-') + ' ' + convert(char(8),awalObs,20), str_replace (convert(char(10),akhirObs,102), '.', '-') + ' ' + convert(char(8),akhirObs,20), inapCode, observasi, tindObservasi, funcRoom from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT id, tranCode, custCode, babyBirth, convert(char(23),birthDate,121), birthTime, bb, tb, lingkar, hidup, convert(char(23),anesTime,121), convert(char(23),inTime,121), convert(char(23),outTime,121), PA, Cito, diagPre, diagPost, convert(char(23),tranDate,121), class, convert(char(23),awalObs,121), convert(char(23),akhirObs,121), inapCode, observasi, tindObservasi, funcRoom from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT id, tranCode, custCode, babyBirth, birthDate, birthTime, bb, tb, lingkar, hidup, anesTime, inTime, outTime, PA, Cito, diagPre, diagPost, tranDate, class, awalObs, akhirObs, inapCode, observasi, tindObservasi, funcRoom from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT id, tranCode, custCode, babyBirth, EXTEND(birthDate, YEAR TO FRACTION), birthTime, bb, tb, lingkar, hidup, EXTEND(anesTime, YEAR TO FRACTION), EXTEND(inTime, YEAR TO FRACTION), EXTEND(outTime, YEAR TO FRACTION), PA, Cito, diagPre, diagPost, EXTEND(tranDate, YEAR TO FRACTION), class, EXTEND(awalObs, YEAR TO FRACTION), EXTEND(akhirObs, YEAR TO FRACTION), inapCode, observasi, tindObservasi, funcRoom from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT id, tranCode, custCode, babyBirth, birthDate, birthTime, bb, tb, lingkar, hidup, anesTime, inTime, outTime, PA, Cito, diagPre, diagPost, tranDate, class, awalObs, akhirObs, inapCode, observasi, tindObservasi, funcRoom from " . $this->Ini->nm_tabela ; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['empty_filter'] = true;
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
              $this->custcode = $rs->fields[2] ; 
              $this->nmgp_dados_select['custcode'] = $this->custcode;
              $this->babybirth = $rs->fields[3] ; 
              $this->nmgp_dados_select['babybirth'] = $this->babybirth;
              $this->birthdate = $rs->fields[4] ; 
              if (substr($this->birthdate, 10, 1) == "-") 
              { 
                 $this->birthdate = substr($this->birthdate, 0, 10) . " " . substr($this->birthdate, 11);
              } 
              if (substr($this->birthdate, 13, 1) == ".") 
              { 
                 $this->birthdate = substr($this->birthdate, 0, 13) . ":" . substr($this->birthdate, 14, 2) . ":" . substr($this->birthdate, 17);
              } 
              $this->nmgp_dados_select['birthdate'] = $this->birthdate;
              $this->birthtime = $rs->fields[5] ; 
              $this->nmgp_dados_select['birthtime'] = $this->birthtime;
              $this->bb = trim($rs->fields[6]) ; 
              $this->nmgp_dados_select['bb'] = $this->bb;
              $this->tb = trim($rs->fields[7]) ; 
              $this->nmgp_dados_select['tb'] = $this->tb;
              $this->lingkar = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['lingkar'] = $this->lingkar;
              $this->hidup = $rs->fields[9] ; 
              $this->nmgp_dados_select['hidup'] = $this->hidup;
              $this->anestime = $rs->fields[10] ; 
              if (substr($this->anestime, 10, 1) == "-") 
              { 
                 $this->anestime = substr($this->anestime, 0, 10) . " " . substr($this->anestime, 11);
              } 
              if (substr($this->anestime, 13, 1) == ".") 
              { 
                 $this->anestime = substr($this->anestime, 0, 13) . ":" . substr($this->anestime, 14, 2) . ":" . substr($this->anestime, 17);
              } 
              $this->nmgp_dados_select['anestime'] = $this->anestime;
              $this->intime = $rs->fields[11] ; 
              if (substr($this->intime, 10, 1) == "-") 
              { 
                 $this->intime = substr($this->intime, 0, 10) . " " . substr($this->intime, 11);
              } 
              if (substr($this->intime, 13, 1) == ".") 
              { 
                 $this->intime = substr($this->intime, 0, 13) . ":" . substr($this->intime, 14, 2) . ":" . substr($this->intime, 17);
              } 
              $this->nmgp_dados_select['intime'] = $this->intime;
              $this->outtime = $rs->fields[12] ; 
              if (substr($this->outtime, 10, 1) == "-") 
              { 
                 $this->outtime = substr($this->outtime, 0, 10) . " " . substr($this->outtime, 11);
              } 
              if (substr($this->outtime, 13, 1) == ".") 
              { 
                 $this->outtime = substr($this->outtime, 0, 13) . ":" . substr($this->outtime, 14, 2) . ":" . substr($this->outtime, 17);
              } 
              $this->nmgp_dados_select['outtime'] = $this->outtime;
              $this->pa = $rs->fields[13] ; 
              $this->nmgp_dados_select['pa'] = $this->pa;
              $this->cito = $rs->fields[14] ; 
              $this->nmgp_dados_select['cito'] = $this->cito;
              $this->diagpre = $rs->fields[15] ; 
              $this->nmgp_dados_select['diagpre'] = $this->diagpre;
              $this->diagpost = $rs->fields[16] ; 
              $this->nmgp_dados_select['diagpost'] = $this->diagpost;
              $this->trandate = $rs->fields[17] ; 
              if (substr($this->trandate, 10, 1) == "-") 
              { 
                 $this->trandate = substr($this->trandate, 0, 10) . " " . substr($this->trandate, 11);
              } 
              if (substr($this->trandate, 13, 1) == ".") 
              { 
                 $this->trandate = substr($this->trandate, 0, 13) . ":" . substr($this->trandate, 14, 2) . ":" . substr($this->trandate, 17);
              } 
              $this->nmgp_dados_select['trandate'] = $this->trandate;
              $this->class = $rs->fields[18] ; 
              $this->nmgp_dados_select['class'] = $this->class;
              $this->awalobs = $rs->fields[19] ; 
              if (substr($this->awalobs, 10, 1) == "-") 
              { 
                 $this->awalobs = substr($this->awalobs, 0, 10) . " " . substr($this->awalobs, 11);
              } 
              if (substr($this->awalobs, 13, 1) == ".") 
              { 
                 $this->awalobs = substr($this->awalobs, 0, 13) . ":" . substr($this->awalobs, 14, 2) . ":" . substr($this->awalobs, 17);
              } 
              $this->nmgp_dados_select['awalobs'] = $this->awalobs;
              $this->akhirobs = $rs->fields[20] ; 
              if (substr($this->akhirobs, 10, 1) == "-") 
              { 
                 $this->akhirobs = substr($this->akhirobs, 0, 10) . " " . substr($this->akhirobs, 11);
              } 
              if (substr($this->akhirobs, 13, 1) == ".") 
              { 
                 $this->akhirobs = substr($this->akhirobs, 0, 13) . ":" . substr($this->akhirobs, 14, 2) . ":" . substr($this->akhirobs, 17);
              } 
              $this->nmgp_dados_select['akhirobs'] = $this->akhirobs;
              $this->inapcode = $rs->fields[21] ; 
              $this->nmgp_dados_select['inapcode'] = $this->inapcode;
              $this->observasi = $rs->fields[22] ; 
              $this->nmgp_dados_select['observasi'] = $this->observasi;
              $this->tindobservasi = $rs->fields[23] ; 
              $this->nmgp_dados_select['tindobservasi'] = $this->tindobservasi;
              $this->funcroom = $rs->fields[24] ; 
              $this->nmgp_dados_select['funcroom'] = $this->funcroom;
              $this->detailinsentif = $rs->fields[25] ; 
              $this->nmgp_dados_select['detailinsentif'] = $this->detailinsentif;
              $this->resepvk = $rs->fields[26] ; 
              $this->nmgp_dados_select['resepvk'] = $this->resepvk;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id = (string)$this->id; 
              $this->babybirth = (string)$this->babybirth; 
              $this->bb = (strpos(strtolower($this->bb), "e")) ? (float)$this->bb : $this->bb; 
              $this->bb = (string)$this->bb; 
              $this->tb = (strpos(strtolower($this->tb), "e")) ? (float)$this->tb : $this->tb; 
              $this->tb = (string)$this->tb; 
              $this->lingkar = (strpos(strtolower($this->lingkar), "e")) ? (float)$this->lingkar : $this->lingkar; 
              $this->lingkar = (string)$this->lingkar; 
              $this->hidup = (string)$this->hidup; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['parms'] = "id?#?$this->id?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['reg_start'] < $qt_geral_reg_form_tbdetailvk_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opcao']   = '';
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
              $this->custcode = "";  
              $this->nmgp_dados_form["custcode"] = $this->custcode;
              $this->babybirth = "";  
              $this->nmgp_dados_form["babybirth"] = $this->babybirth;
              $this->birthdate = "";  
              $this->birthdate_hora = "" ;  
              $this->nmgp_dados_form["birthdate"] = $this->birthdate;
              $this->birthtime = "";  
              $this->nmgp_dados_form["birthtime"] = $this->birthtime;
              $this->bb = "";  
              $this->nmgp_dados_form["bb"] = $this->bb;
              $this->tb = "";  
              $this->nmgp_dados_form["tb"] = $this->tb;
              $this->lingkar = "";  
              $this->nmgp_dados_form["lingkar"] = $this->lingkar;
              $this->hidup = "";  
              $this->nmgp_dados_form["hidup"] = $this->hidup;
              $this->anestime =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->anestime_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->nmgp_dados_form["anestime"] = $this->anestime;
              $this->intime =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->intime_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->nmgp_dados_form["intime"] = $this->intime;
              $this->outtime =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->outtime_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->nmgp_dados_form["outtime"] = $this->outtime;
              $this->pa = "";  
              $this->nmgp_dados_form["pa"] = $this->pa;
              $this->cito = "";  
              $this->nmgp_dados_form["cito"] = $this->cito;
              $this->diagpre = "";  
              $this->nmgp_dados_form["diagpre"] = $this->diagpre;
              $this->diagpost = "";  
              $this->nmgp_dados_form["diagpost"] = $this->diagpost;
              $this->trandate =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->trandate_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->nmgp_dados_form["trandate"] = $this->trandate;
              $this->class = "";  
              $this->nmgp_dados_form["class"] = $this->class;
              $this->awalobs = "";  
              $this->awalobs_hora = "" ;  
              $this->nmgp_dados_form["awalobs"] = $this->awalobs;
              $this->akhirobs = "";  
              $this->akhirobs_hora = "" ;  
              $this->nmgp_dados_form["akhirobs"] = $this->akhirobs;
              $this->inapcode = "";  
              $this->nmgp_dados_form["inapcode"] = $this->inapcode;
              $this->observasi = "";  
              $this->nmgp_dados_form["observasi"] = $this->observasi;
              $this->tindobservasi = "";  
              $this->nmgp_dados_form["tindobservasi"] = $this->tindobservasi;
              $this->funcroom = "";  
              $this->nmgp_dados_form["funcroom"] = $this->funcroom;
              $this->nama = "";  
              $this->nmgp_dados_form["nama"] = $this->nama;
              $this->detailinsentif = "";  
              $this->nmgp_dados_form["detailinsentif"] = $this->detailinsentif;
              $this->resepvk = "";  
              $this->nmgp_dados_form["resepvk"] = $this->resepvk;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dados_select'];
                  $this->trancode = $this->nmgp_dados_select['trancode'];  
                  $this->custcode = $this->nmgp_dados_select['custcode'];  
                  $this->babybirth = $this->nmgp_dados_select['babybirth'];  
                  $this->birthdate = $this->nmgp_dados_select['birthdate'];  
                  $this->birthtime = $this->nmgp_dados_select['birthtime'];  
                  $this->bb = $this->nmgp_dados_select['bb'];  
                  $this->tb = $this->nmgp_dados_select['tb'];  
                  $this->lingkar = $this->nmgp_dados_select['lingkar'];  
                  $this->hidup = $this->nmgp_dados_select['hidup'];  
                  $this->anestime = $this->nmgp_dados_select['anestime'];  
                  $this->intime = $this->nmgp_dados_select['intime'];  
                  $this->outtime = $this->nmgp_dados_select['outtime'];  
                  $this->pa = $this->nmgp_dados_select['pa'];  
                  $this->cito = $this->nmgp_dados_select['cito'];  
                  $this->diagpre = $this->nmgp_dados_select['diagpre'];  
                  $this->diagpost = $this->nmgp_dados_select['diagpost'];  
                  $this->trandate = $this->nmgp_dados_select['trandate'];  
                  $this->class = $this->nmgp_dados_select['class'];  
                  $this->awalobs = $this->nmgp_dados_select['awalobs'];  
                  $this->akhirobs = $this->nmgp_dados_select['akhirobs'];  
                  $this->inapcode = $this->nmgp_dados_select['inapcode'];  
                  $this->observasi = $this->nmgp_dados_select['observasi'];  
                  $this->tindobservasi = $this->nmgp_dados_select['tindobservasi'];  
                  $this->funcroom = $this->nmgp_dados_select['funcroom'];  
                  $this->detailinsentif = $this->nmgp_dados_select['detailinsentif'];  
                  $this->resepvk = $this->nmgp_dados_select['resepvk'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
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
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter']))
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function babyBirth_onClick()
{
$_SESSION['scriptcase']['form_tbdetailvk_mob']['contr_erro'] = 'on';
  
$original_babybirth = $this->babybirth;
$original_birthdate = $this->birthdate;
$original_bb = $this->bb;
$original_tb = $this->tb;
$original_hidup = $this->hidup;
$original_lingkar = $this->lingkar;
$original_lingkar = $this->lingkar;
$original_tb = $this->tb;
$original_bb = $this->bb;
$original_birthtime = $this->birthtime;
$original_birthdate = $this->birthdate;
$original_hidup = $this->hidup;

if($this->babybirth  == '1'){
	$this->nmgp_cmp_hidden["birthdate"] = "on"; $this->NM_ajax_info['fieldDisplay']['birthdate'] = 'on';
	$this->birthdate  = date('Y-m-d H:i');
	$this->nmgp_cmp_hidden["bb"] = "on"; $this->NM_ajax_info['fieldDisplay']['bb'] = 'on';
	$this->nmgp_cmp_hidden["tb"] = "on"; $this->NM_ajax_info['fieldDisplay']['tb'] = 'on';
	$this->nmgp_cmp_hidden["hidup"] = "on"; $this->NM_ajax_info['fieldDisplay']['hidup'] = 'on';
	$this->nmgp_cmp_hidden["lingkar"] = "on"; $this->NM_ajax_info['fieldDisplay']['lingkar'] = 'on';
}else{
	$this->nmgp_cmp_hidden["birthdate"] = "off"; $this->NM_ajax_info['fieldDisplay']['birthdate'] = 'off';
	$this->birthdate  = '';
	$this->nmgp_cmp_hidden["bb"] = "off"; $this->NM_ajax_info['fieldDisplay']['bb'] = 'off';
	$this->nmgp_cmp_hidden["tb"] = "off"; $this->NM_ajax_info['fieldDisplay']['tb'] = 'off';
	$this->nmgp_cmp_hidden["hidup"] = "off"; $this->NM_ajax_info['fieldDisplay']['hidup'] = 'off';
	$this->nmgp_cmp_hidden["lingkar"] = "off"; $this->NM_ajax_info['fieldDisplay']['lingkar'] = 'off';
}

$modificado_babybirth = $this->babybirth;
$modificado_birthdate = $this->birthdate;
$modificado_bb = $this->bb;
$modificado_tb = $this->tb;
$modificado_hidup = $this->hidup;
$modificado_lingkar = $this->lingkar;
$modificado_lingkar = $this->lingkar;
$modificado_tb = $this->tb;
$modificado_bb = $this->bb;
$modificado_birthtime = $this->birthtime;
$modificado_birthdate = $this->birthdate;
$modificado_hidup = $this->hidup;
$this->nm_formatar_campos('babybirth', 'birthdate', 'bb', 'tb', 'hidup', 'lingkar');
if ($original_babybirth !== $modificado_babybirth || isset($this->nmgp_cmp_readonly['babybirth']) || (isset($bFlagRead_babybirth) && $bFlagRead_babybirth))
{
    $this->ajax_return_values_babybirth(true);
}
if ($original_birthdate !== $modificado_birthdate || isset($this->nmgp_cmp_readonly['birthdate']) || (isset($bFlagRead_birthdate) && $bFlagRead_birthdate))
{
    $this->ajax_return_values_birthdate(true);
}
if ($original_bb !== $modificado_bb || isset($this->nmgp_cmp_readonly['bb']) || (isset($bFlagRead_bb) && $bFlagRead_bb))
{
    $this->ajax_return_values_bb(true);
}
if ($original_tb !== $modificado_tb || isset($this->nmgp_cmp_readonly['tb']) || (isset($bFlagRead_tb) && $bFlagRead_tb))
{
    $this->ajax_return_values_tb(true);
}
if ($original_hidup !== $modificado_hidup || isset($this->nmgp_cmp_readonly['hidup']) || (isset($bFlagRead_hidup) && $bFlagRead_hidup))
{
    $this->ajax_return_values_hidup(true);
}
if ($original_lingkar !== $modificado_lingkar || isset($this->nmgp_cmp_readonly['lingkar']) || (isset($bFlagRead_lingkar) && $bFlagRead_lingkar))
{
    $this->ajax_return_values_lingkar(true);
}
if ($original_lingkar !== $modificado_lingkar || isset($this->nmgp_cmp_readonly['lingkar']) || (isset($bFlagRead_lingkar) && $bFlagRead_lingkar))
{
    $this->ajax_return_values_lingkar(true);
}
if ($original_tb !== $modificado_tb || isset($this->nmgp_cmp_readonly['tb']) || (isset($bFlagRead_tb) && $bFlagRead_tb))
{
    $this->ajax_return_values_tb(true);
}
if ($original_bb !== $modificado_bb || isset($this->nmgp_cmp_readonly['bb']) || (isset($bFlagRead_bb) && $bFlagRead_bb))
{
    $this->ajax_return_values_bb(true);
}
if ($original_birthtime !== $modificado_birthtime || isset($this->nmgp_cmp_readonly['birthtime']) || (isset($bFlagRead_birthtime) && $bFlagRead_birthtime))
{
    $this->ajax_return_values_birthtime(true);
}
if ($original_birthdate !== $modificado_birthdate || isset($this->nmgp_cmp_readonly['birthdate']) || (isset($bFlagRead_birthdate) && $bFlagRead_birthdate))
{
    $this->ajax_return_values_birthdate(true);
}
if ($original_hidup !== $modificado_hidup || isset($this->nmgp_cmp_readonly['hidup']) || (isset($bFlagRead_hidup) && $bFlagRead_hidup))
{
    $this->ajax_return_values_hidup(true);
}
$this->NM_ajax_info['event_field'] = 'babyBirth';
form_tbdetailvk_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbdetailvk_mob']['contr_erro'] = 'off';
}
function observasi_onClick()
{
$_SESSION['scriptcase']['form_tbdetailvk_mob']['contr_erro'] = 'on';
  
$original_observasi = $this->observasi;
$original_tindobservasi = $this->tindobservasi;
$original_awalobs = $this->awalobs;
$original_akhirobs = $this->akhirobs;
$original_tindobservasi = $this->tindobservasi;
$original_akhirobs = $this->akhirobs;
$original_awalobs = $this->awalobs;

if($this->observasi  == '1'){
	$this->nmgp_cmp_hidden["tindobservasi"] = "on"; $this->NM_ajax_info['fieldDisplay']['tindobservasi'] = 'on';
	$this->nmgp_cmp_hidden["awalobs"] = "on"; $this->NM_ajax_info['fieldDisplay']['awalobs'] = 'on';
	$this->awalobs  = date('Y-m-d H:i');
	$this->nmgp_cmp_hidden["akhirobs"] = "on"; $this->NM_ajax_info['fieldDisplay']['akhirobs'] = 'on';
	$this->akhirobs  = date('Y-m-d H:i');
}else{
	$this->nmgp_cmp_hidden["tindobservasi"] = "off"; $this->NM_ajax_info['fieldDisplay']['tindobservasi'] = 'off';
	$this->nmgp_cmp_hidden["awalobs"] = "off"; $this->NM_ajax_info['fieldDisplay']['awalobs'] = 'off';
	$this->awalobs  = '';
	$this->nmgp_cmp_hidden["akhirobs"] = "off"; $this->NM_ajax_info['fieldDisplay']['akhirobs'] = 'off';
	$this->akhirobs  = '';
}

$modificado_observasi = $this->observasi;
$modificado_tindobservasi = $this->tindobservasi;
$modificado_awalobs = $this->awalobs;
$modificado_akhirobs = $this->akhirobs;
$modificado_tindobservasi = $this->tindobservasi;
$modificado_akhirobs = $this->akhirobs;
$modificado_awalobs = $this->awalobs;
$this->nm_formatar_campos('observasi', 'tindobservasi', 'awalobs', 'akhirobs');
if ($original_observasi !== $modificado_observasi || isset($this->nmgp_cmp_readonly['observasi']) || (isset($bFlagRead_observasi) && $bFlagRead_observasi))
{
    $this->ajax_return_values_observasi(true);
}
if ($original_tindobservasi !== $modificado_tindobservasi || isset($this->nmgp_cmp_readonly['tindobservasi']) || (isset($bFlagRead_tindobservasi) && $bFlagRead_tindobservasi))
{
    $this->ajax_return_values_tindobservasi(true);
}
if ($original_awalobs !== $modificado_awalobs || isset($this->nmgp_cmp_readonly['awalobs']) || (isset($bFlagRead_awalobs) && $bFlagRead_awalobs))
{
    $this->ajax_return_values_awalobs(true);
}
if ($original_akhirobs !== $modificado_akhirobs || isset($this->nmgp_cmp_readonly['akhirobs']) || (isset($bFlagRead_akhirobs) && $bFlagRead_akhirobs))
{
    $this->ajax_return_values_akhirobs(true);
}
if ($original_tindobservasi !== $modificado_tindobservasi || isset($this->nmgp_cmp_readonly['tindobservasi']) || (isset($bFlagRead_tindobservasi) && $bFlagRead_tindobservasi))
{
    $this->ajax_return_values_tindobservasi(true);
}
if ($original_akhirobs !== $modificado_akhirobs || isset($this->nmgp_cmp_readonly['akhirobs']) || (isset($bFlagRead_akhirobs) && $bFlagRead_akhirobs))
{
    $this->ajax_return_values_akhirobs(true);
}
if ($original_awalobs !== $modificado_awalobs || isset($this->nmgp_cmp_readonly['awalobs']) || (isset($bFlagRead_awalobs) && $bFlagRead_awalobs))
{
    $this->ajax_return_values_awalobs(true);
}
$this->NM_ajax_info['event_field'] = 'observasi';
form_tbdetailvk_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbdetailvk_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_tbdetailvk_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_tbdetailvk_mob_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['csrf_token'];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode'] = array(); 
    }

   $old_value_birthdate = $this->birthdate;
   $old_value_birthdate_hora = $this->birthdate_hora;
   $old_value_birthtime = $this->birthtime;
   $old_value_bb = $this->bb;
   $old_value_tb = $this->tb;
   $old_value_lingkar = $this->lingkar;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_anestime = $this->anestime;
   $old_value_anestime_hora = $this->anestime_hora;
   $old_value_intime = $this->intime;
   $old_value_intime_hora = $this->intime_hora;
   $old_value_outtime = $this->outtime;
   $old_value_outtime_hora = $this->outtime_hora;
   $old_value_awalobs = $this->awalobs;
   $old_value_awalobs_hora = $this->awalobs_hora;
   $old_value_akhirobs = $this->akhirobs;
   $old_value_akhirobs_hora = $this->akhirobs_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_birthdate_hora = $this->birthdate_hora;
   $unformatted_value_birthtime = $this->birthtime;
   $unformatted_value_bb = $this->bb;
   $unformatted_value_tb = $this->tb;
   $unformatted_value_lingkar = $this->lingkar;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_anestime = $this->anestime;
   $unformatted_value_anestime_hora = $this->anestime_hora;
   $unformatted_value_intime = $this->intime;
   $unformatted_value_intime_hora = $this->intime_hora;
   $unformatted_value_outtime = $this->outtime;
   $unformatted_value_outtime_hora = $this->outtime_hora;
   $unformatted_value_awalobs = $this->awalobs;
   $unformatted_value_awalobs_hora = $this->awalobs_hora;
   $unformatted_value_akhirobs = $this->akhirobs;
   $unformatted_value_akhirobs_hora = $this->akhirobs_hora;

   $nm_comando = "SELECT custCode  FROM tbadmrawatinap  where tranCode = '$this->inapcode' ORDER BY custCode";

   $this->birthdate = $old_value_birthdate;
   $this->birthdate_hora = $old_value_birthdate_hora;
   $this->birthtime = $old_value_birthtime;
   $this->bb = $old_value_bb;
   $this->tb = $old_value_tb;
   $this->lingkar = $old_value_lingkar;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->anestime = $old_value_anestime;
   $this->anestime_hora = $old_value_anestime_hora;
   $this->intime = $old_value_intime;
   $this->intime_hora = $old_value_intime_hora;
   $this->outtime = $old_value_outtime;
   $this->outtime_hora = $old_value_outtime_hora;
   $this->awalobs = $old_value_awalobs;
   $this->awalobs_hora = $old_value_awalobs_hora;
   $this->akhirobs = $old_value_akhirobs;
   $this->akhirobs_hora = $old_value_akhirobs_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_custcode'][] = $rs->fields[0];
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
   function Form_lookup_nama()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama'] = array(); 
    }

   $old_value_birthdate = $this->birthdate;
   $old_value_birthdate_hora = $this->birthdate_hora;
   $old_value_birthtime = $this->birthtime;
   $old_value_bb = $this->bb;
   $old_value_tb = $this->tb;
   $old_value_lingkar = $this->lingkar;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_anestime = $this->anestime;
   $old_value_anestime_hora = $this->anestime_hora;
   $old_value_intime = $this->intime;
   $old_value_intime_hora = $this->intime_hora;
   $old_value_outtime = $this->outtime;
   $old_value_outtime_hora = $this->outtime_hora;
   $old_value_awalobs = $this->awalobs;
   $old_value_awalobs_hora = $this->awalobs_hora;
   $old_value_akhirobs = $this->akhirobs;
   $old_value_akhirobs_hora = $this->akhirobs_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_birthdate_hora = $this->birthdate_hora;
   $unformatted_value_birthtime = $this->birthtime;
   $unformatted_value_bb = $this->bb;
   $unformatted_value_tb = $this->tb;
   $unformatted_value_lingkar = $this->lingkar;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_anestime = $this->anestime;
   $unformatted_value_anestime_hora = $this->anestime_hora;
   $unformatted_value_intime = $this->intime;
   $unformatted_value_intime_hora = $this->intime_hora;
   $unformatted_value_outtime = $this->outtime;
   $unformatted_value_outtime_hora = $this->outtime_hora;
   $unformatted_value_awalobs = $this->awalobs;
   $unformatted_value_awalobs_hora = $this->awalobs_hora;
   $unformatted_value_akhirobs = $this->akhirobs;
   $unformatted_value_akhirobs_hora = $this->akhirobs_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,', ', salut)  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&', '&salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }

   $this->birthdate = $old_value_birthdate;
   $this->birthdate_hora = $old_value_birthdate_hora;
   $this->birthtime = $old_value_birthtime;
   $this->bb = $old_value_bb;
   $this->tb = $old_value_tb;
   $this->lingkar = $old_value_lingkar;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->anestime = $old_value_anestime;
   $this->anestime_hora = $old_value_anestime_hora;
   $this->intime = $old_value_intime;
   $this->intime_hora = $old_value_intime_hora;
   $this->outtime = $old_value_outtime;
   $this->outtime_hora = $old_value_outtime_hora;
   $this->awalobs = $old_value_awalobs;
   $this->awalobs_hora = $old_value_awalobs_hora;
   $this->akhirobs = $old_value_akhirobs;
   $this->akhirobs_hora = $old_value_akhirobs_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_nama'][] = $rs->fields[0];
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
   function Form_lookup_class()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class'] = array(); 
    }

   $old_value_birthdate = $this->birthdate;
   $old_value_birthdate_hora = $this->birthdate_hora;
   $old_value_birthtime = $this->birthtime;
   $old_value_bb = $this->bb;
   $old_value_tb = $this->tb;
   $old_value_lingkar = $this->lingkar;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_anestime = $this->anestime;
   $old_value_anestime_hora = $this->anestime_hora;
   $old_value_intime = $this->intime;
   $old_value_intime_hora = $this->intime_hora;
   $old_value_outtime = $this->outtime;
   $old_value_outtime_hora = $this->outtime_hora;
   $old_value_awalobs = $this->awalobs;
   $old_value_awalobs_hora = $this->awalobs_hora;
   $old_value_akhirobs = $this->akhirobs;
   $old_value_akhirobs_hora = $this->akhirobs_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_birthdate_hora = $this->birthdate_hora;
   $unformatted_value_birthtime = $this->birthtime;
   $unformatted_value_bb = $this->bb;
   $unformatted_value_tb = $this->tb;
   $unformatted_value_lingkar = $this->lingkar;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_anestime = $this->anestime;
   $unformatted_value_anestime_hora = $this->anestime_hora;
   $unformatted_value_intime = $this->intime;
   $unformatted_value_intime_hora = $this->intime_hora;
   $unformatted_value_outtime = $this->outtime;
   $unformatted_value_outtime_hora = $this->outtime_hora;
   $unformatted_value_awalobs = $this->awalobs;
   $unformatted_value_awalobs_hora = $this->awalobs_hora;
   $unformatted_value_akhirobs = $this->akhirobs;
   $unformatted_value_akhirobs_hora = $this->akhirobs_hora;

   $nm_comando = "SELECT kelas  FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY kelas";

   $this->birthdate = $old_value_birthdate;
   $this->birthdate_hora = $old_value_birthdate_hora;
   $this->birthtime = $old_value_birthtime;
   $this->bb = $old_value_bb;
   $this->tb = $old_value_tb;
   $this->lingkar = $old_value_lingkar;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->anestime = $old_value_anestime;
   $this->anestime_hora = $old_value_anestime_hora;
   $this->intime = $old_value_intime;
   $this->intime_hora = $old_value_intime_hora;
   $this->outtime = $old_value_outtime;
   $this->outtime_hora = $old_value_outtime_hora;
   $this->awalobs = $old_value_awalobs;
   $this->awalobs_hora = $old_value_awalobs_hora;
   $this->akhirobs = $old_value_akhirobs;
   $this->akhirobs_hora = $old_value_akhirobs_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['Lookup_class'][] = $rs->fields[0];
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
   function Form_lookup_babybirth()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Ya?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_hidup()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Hidup?#?1?#?N?@?";
       $nmgp_def_dados .= "Mati?#?0?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_pa()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "YA?#?Ya?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_cito()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Non Cito?#?Non Cito?#?S?@?";
       $nmgp_def_dados .= "Cito Siang?#?Cito Siang?#?N?@?";
       $nmgp_def_dados .= "Cito Malam?#?Cito Malam?#?N?@?";
       $nmgp_def_dados .= "Cito Minggu?#?Cito Minggu?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_observasi()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Ya?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tindobservasi()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "OBSERVASI?#?OBSERVASI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_tbdetailvk_mob_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "id", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tranCode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_custcode($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "custCode", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_babybirth($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "babyBirth", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "birthTime", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bb", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tb", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "lingkar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_hidup($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "hidup", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_pa($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "PA", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_cito($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "Cito", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "diagPre", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "diagPost", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_class($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "class", $arg_search, $data_lookup);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_tbdetailvk_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['total'] = $qt_geral_reg_form_tbdetailvk_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbdetailvk_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbdetailvk_mob_pack_ajax_response();
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
      $nm_numeric[] = "id";$nm_numeric[] = "babybirth";$nm_numeric[] = "bb";$nm_numeric[] = "tb";$nm_numeric[] = "lingkar";$nm_numeric[] = "hidup";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['decimal_db'] == ".")
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
      $Nm_datas['birthdate'] = "datetime";$Nm_datas['anestime'] = "datetime";$Nm_datas['intime'] = "datetime";$Nm_datas['outtime'] = "datetime";$Nm_datas['trandate'] = "datetime";$Nm_datas['awalobs'] = "datetime";$Nm_datas['akhirobs'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['SC_sep_date1'];
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
   function SC_lookup_custcode($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_babybirth($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "Ya";
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
   function SC_lookup_hidup($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "Hidup";
       $data_look['0'] = "Mati";
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
   function SC_lookup_pa($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Ya'] = "YA";
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
   function SC_lookup_cito($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Non Cito'] = "Non Cito";
       $data_look['Cito Siang'] = "Cito Siang";
       $data_look['Cito Malam'] = "Cito Malam";
       $data_look['Cito Minggu'] = "Cito Minggu";
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
   function SC_lookup_class($condicao, $campo)
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
       $nmgp_saida_form = "form_tbdetailvk_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_tbdetailvk_mob_fim.php";
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
       form_tbdetailvk_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailvk_mob']['masterValue']);
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
