<?php
//
class form_tbantrian_apl
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
                                'navPage'           => array(),
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
   var $custcode;
   var $poly;
   var $poly_1;
   var $doctor;
   var $doctor_1;
   var $queue;
   var $regdate;
   var $regtime;
   var $struckno;
   var $status;
   var $status_1;
   var $hta;
   var $handled;
   var $handled_hora;
   var $viaphone;
   var $viaphone_1;
   var $note;
   var $inst;
   var $inst_1;
   var $jenis;
   var $jenis_1;
   var $bayar;
   var $bayar_1;
   var $instcode;
   var $instcode_1;
   var $member;
   var $tlc;
   var $instno;
   var $instexpiry;
   var $paid;
   var $paid_hora;
   var $custtlc;
   var $shift;
   var $bu;
   var $bucode;
   var $ruang;
   var $statusrm;
   var $sep;
   var $caracode;
   var $regtype;
   var $asalrujukan;
   var $asalcode;
   var $admission;
   var $id;
   var $alamat;
   var $alamat_1;
   var $sc_field_0;
   var $sc_field_0_1;
   var $nama;
   var $nama_1;
   var $tp;
   var $sc_field_1;
   var $sc_field_1_1;
   var $sc_field_2;
   var $sc_field_2_1;
   var $uk;
   var $usia;
   var $detailadm;
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
          if (isset($this->NM_ajax_info['param']['admission']))
          {
              $this->admission = $this->NM_ajax_info['param']['admission'];
          }
          if (isset($this->NM_ajax_info['param']['alamat']))
          {
              $this->alamat = $this->NM_ajax_info['param']['alamat'];
          }
          if (isset($this->NM_ajax_info['param']['bayar']))
          {
              $this->bayar = $this->NM_ajax_info['param']['bayar'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['custcode']))
          {
              $this->custcode = $this->NM_ajax_info['param']['custcode'];
          }
          if (isset($this->NM_ajax_info['param']['detailadm']))
          {
              $this->detailadm = $this->NM_ajax_info['param']['detailadm'];
          }
          if (isset($this->NM_ajax_info['param']['doctor']))
          {
              $this->doctor = $this->NM_ajax_info['param']['doctor'];
          }
          if (isset($this->NM_ajax_info['param']['hta']))
          {
              $this->hta = $this->NM_ajax_info['param']['hta'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['inst']))
          {
              $this->inst = $this->NM_ajax_info['param']['inst'];
          }
          if (isset($this->NM_ajax_info['param']['instcode']))
          {
              $this->instcode = $this->NM_ajax_info['param']['instcode'];
          }
          if (isset($this->NM_ajax_info['param']['instexpiry']))
          {
              $this->instexpiry = $this->NM_ajax_info['param']['instexpiry'];
          }
          if (isset($this->NM_ajax_info['param']['instno']))
          {
              $this->instno = $this->NM_ajax_info['param']['instno'];
          }
          if (isset($this->NM_ajax_info['param']['jenis']))
          {
              $this->jenis = $this->NM_ajax_info['param']['jenis'];
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
          if (isset($this->NM_ajax_info['param']['poly']))
          {
              $this->poly = $this->NM_ajax_info['param']['poly'];
          }
          if (isset($this->NM_ajax_info['param']['queue']))
          {
              $this->queue = $this->NM_ajax_info['param']['queue'];
          }
          if (isset($this->NM_ajax_info['param']['regdate']))
          {
              $this->regdate = $this->NM_ajax_info['param']['regdate'];
          }
          if (isset($this->NM_ajax_info['param']['regtime']))
          {
              $this->regtime = $this->NM_ajax_info['param']['regtime'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_0']))
          {
              $this->sc_field_0 = $this->NM_ajax_info['param']['sc_field_0'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_1']))
          {
              $this->sc_field_1 = $this->NM_ajax_info['param']['sc_field_1'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_2']))
          {
              $this->sc_field_2 = $this->NM_ajax_info['param']['sc_field_2'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['status']))
          {
              $this->status = $this->NM_ajax_info['param']['status'];
          }
          if (isset($this->NM_ajax_info['param']['struckno']))
          {
              $this->struckno = $this->NM_ajax_info['param']['struckno'];
          }
          if (isset($this->NM_ajax_info['param']['tp']))
          {
              $this->tp = $this->NM_ajax_info['param']['tp'];
          }
          if (isset($this->NM_ajax_info['param']['uk']))
          {
              $this->uk = $this->NM_ajax_info['param']['uk'];
          }
          if (isset($this->NM_ajax_info['param']['usia']))
          {
              $this->usia = $this->NM_ajax_info['param']['usia'];
          }
          if (isset($this->NM_ajax_info['param']['viaphone']))
          {
              $this->viaphone = $this->NM_ajax_info['param']['viaphone'];
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
      $this->sc_conv_var['jenis kelamin'] = "sc_field_0";
      $this->sc_conv_var['tanggal lahir'] = "sc_field_1";
      $this->sc_conv_var['telepon & hp'] = "sc_field_2";
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
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbantrian']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_tbantrian']['embutida_parms']);
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
                 nm_limpa_str_form_tbantrian($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_tbantrian']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_tbantrian']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbantrian']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbantrian']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_tbantrian_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("id");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("id");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_tbantrian']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbantrian']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbantrian'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbantrian']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbantrian']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_tbantrian') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbantrian']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Antrian Pasien";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_tbantrian")
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


      $this->arr_buttons['sc_btn_0']['hint']             = "";
      $this->arr_buttons['sc_btn_0']['type']             = "button";
      $this->arr_buttons['sc_btn_0']['value']            = "Label Pasien";
      $this->arr_buttons['sc_btn_0']['display']          = "only_text";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "default";
      $this->arr_buttons['sc_btn_0']['image']            = "";

      $this->arr_buttons['sc_btn_1']['hint']             = "";
      $this->arr_buttons['sc_btn_1']['type']             = "button";
      $this->arr_buttons['sc_btn_1']['value']            = "Antrian Pasien";
      $this->arr_buttons['sc_btn_1']['display']          = "only_text";
      $this->arr_buttons['sc_btn_1']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_1']['style']            = "default";
      $this->arr_buttons['sc_btn_1']['image']            = "";

      $this->arr_buttons['sc_btn_2']['hint']             = "";
      $this->arr_buttons['sc_btn_2']['type']             = "button";
      $this->arr_buttons['sc_btn_2']['value']            = "Cetak Kartu";
      $this->arr_buttons['sc_btn_2']['display']          = "only_text";
      $this->arr_buttons['sc_btn_2']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_2']['style']            = "default";
      $this->arr_buttons['sc_btn_2']['image']            = "";

      $this->arr_buttons['sc_btn_3']['hint']             = "";
      $this->arr_buttons['sc_btn_3']['type']             = "button";
      $this->arr_buttons['sc_btn_3']['value']            = "Ganti DPJP";
      $this->arr_buttons['sc_btn_3']['display']          = "only_text";
      $this->arr_buttons['sc_btn_3']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_3']['style']            = "default";
      $this->arr_buttons['sc_btn_3']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['form_tbantrian']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_tbantrian'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['sc_btn_0'] = "on";
      $this->nmgp_botoes['sc_btn_1'] = "on";
      $this->nmgp_botoes['sc_btn_2'] = "on";
      $this->nmgp_botoes['sc_btn_3'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbantrian']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbantrian'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbantrian'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_form'];
          if (!isset($this->handled)){$this->handled = $this->nmgp_dados_form['handled'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['viaphone'] != "null"){$this->viaphone = $this->nmgp_dados_form['viaphone'];} 
          if (!isset($this->note)){$this->note = $this->nmgp_dados_form['note'];} 
          if (!isset($this->member)){$this->member = $this->nmgp_dados_form['member'];} 
          if (!isset($this->tlc)){$this->tlc = $this->nmgp_dados_form['tlc'];} 
          if (!isset($this->paid)){$this->paid = $this->nmgp_dados_form['paid'];} 
          if (!isset($this->custtlc)){$this->custtlc = $this->nmgp_dados_form['custtlc'];} 
          if (!isset($this->shift)){$this->shift = $this->nmgp_dados_form['shift'];} 
          if (!isset($this->bu)){$this->bu = $this->nmgp_dados_form['bu'];} 
          if (!isset($this->bucode)){$this->bucode = $this->nmgp_dados_form['bucode'];} 
          if (!isset($this->ruang)){$this->ruang = $this->nmgp_dados_form['ruang'];} 
          if (!isset($this->statusrm)){$this->statusrm = $this->nmgp_dados_form['statusrm'];} 
          if (!isset($this->sep)){$this->sep = $this->nmgp_dados_form['sep'];} 
          if (!isset($this->caracode)){$this->caracode = $this->nmgp_dados_form['caracode'];} 
          if (!isset($this->regtype)){$this->regtype = $this->nmgp_dados_form['regtype'];} 
          if (!isset($this->asalrujukan)){$this->asalrujukan = $this->nmgp_dados_form['asalrujukan'];} 
          if (!isset($this->asalcode)){$this->asalcode = $this->nmgp_dados_form['asalcode'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['alamat'] != "null"){$this->alamat = $this->nmgp_dados_form['alamat'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['sc_field_0'] != "null"){$this->sc_field_0 = $this->nmgp_dados_form['sc_field_0'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['nama'] != "null"){$this->nama = $this->nmgp_dados_form['nama'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['tp'] != "null"){$this->tp = $this->nmgp_dados_form['tp'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['sc_field_1'] != "null"){$this->sc_field_1 = $this->nmgp_dados_form['sc_field_1'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['sc_field_2'] != "null"){$this->sc_field_2 = $this->nmgp_dados_form['sc_field_2'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['uk'] != "null"){$this->uk = $this->nmgp_dados_form['uk'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_tbantrian", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_tbantrian/form_tbantrian_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_tbantrian_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_tbantrian_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_tbantrian_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_tbantrian/form_tbantrian_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_tbantrian_erro.class.php"); 
      }
      $this->Erro      = new form_tbantrian_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_tbantrian']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['sc_btn_0'] = "off";
          $this->nmgp_botoes['sc_btn_1'] = "off";
          $this->nmgp_botoes['sc_btn_2'] = "off";
          $this->nmgp_botoes['sc_btn_3'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['botoes']['sc_btn_0'];
          $this->nmgp_botoes['sc_btn_1'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['botoes']['sc_btn_1'];
          $this->nmgp_botoes['sc_btn_2'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['botoes']['sc_btn_2'];
          $this->nmgp_botoes['sc_btn_3'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['botoes']['sc_btn_3'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_form'];
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
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_detailadm') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_detailadm') . "/form_detailadm_apl.php");
          $this->form_detailadm = new form_detailadm_apl;
      }
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->custcode)) { $this->nm_limpa_alfa($this->custcode); }
      if (isset($this->poly)) { $this->nm_limpa_alfa($this->poly); }
      if (isset($this->doctor)) { $this->nm_limpa_alfa($this->doctor); }
      if (isset($this->queue)) { $this->nm_limpa_alfa($this->queue); }
      if (isset($this->regtime)) { $this->nm_limpa_alfa($this->regtime); }
      if (isset($this->struckno)) { $this->nm_limpa_alfa($this->struckno); }
      if (isset($this->status)) { $this->nm_limpa_alfa($this->status); }
      if (isset($this->viaphone)) { $this->nm_limpa_alfa($this->viaphone); }
      if (isset($this->inst)) { $this->nm_limpa_alfa($this->inst); }
      if (isset($this->jenis)) { $this->nm_limpa_alfa($this->jenis); }
      if (isset($this->bayar)) { $this->nm_limpa_alfa($this->bayar); }
      if (isset($this->instcode)) { $this->nm_limpa_alfa($this->instcode); }
      if (isset($this->instno)) { $this->nm_limpa_alfa($this->instno); }
      if (isset($this->admission)) { $this->nm_limpa_alfa($this->admission); }
      if (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
      if (isset($this->detailadm)) { $this->nm_limpa_alfa($this->detailadm); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- regdate
      $this->field_config['regdate']                 = array();
      $this->field_config['regdate']['date_format']  = "aaaa/mm/dd";
      $this->field_config['regdate']['date_sep']     = "-";
      $this->field_config['regdate']['date_display'] = "aaaa/mm/dd";
      $this->new_date_format('DT', 'regdate');
      //-- queue
      $this->field_config['queue']               = array();
      $this->field_config['queue']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['queue']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['queue']['symbol_dec'] = '';
      $this->field_config['queue']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['queue']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- instexpiry
      $this->field_config['instexpiry']                 = array();
      $this->field_config['instexpiry']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['instexpiry']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['instexpiry']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'instexpiry');
      //-- hta
      $this->field_config['hta']                 = array();
      $this->field_config['hta']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['hta']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['hta']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'hta');
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- handled
      $this->field_config['handled']                 = array();
      $this->field_config['handled']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['handled']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['handled']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['handled']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'handled');
      //-- paid
      $this->field_config['paid']                 = array();
      $this->field_config['paid']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['paid']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['paid']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['paid']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'paid');
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
          if ('validate_poly' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'poly');
          }
          if ('validate_doctor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'doctor');
          }
          if ('validate_regdate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'regdate');
          }
          if ('validate_viaphone' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'viaphone');
          }
          if ('validate_regtime' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'regtime');
          }
          if ('validate_queue' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'queue');
          }
          if ('validate_custcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'custcode');
          }
          if ('validate_nama' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nama');
          }
          if ('validate_status' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'status');
          }
          if ('validate_alamat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'alamat');
          }
          if ('validate_sc_field_2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_2');
          }
          if ('validate_sc_field_1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_1');
          }
          if ('validate_usia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usia');
          }
          if ('validate_sc_field_0' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_0');
          }
          if ('validate_jenis' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jenis');
          }
          if ('validate_bayar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bayar');
          }
          if ('validate_instno' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'instno');
          }
          if ('validate_instexpiry' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'instexpiry');
          }
          if ('validate_inst' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'inst');
          }
          if ('validate_instcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'instcode');
          }
          if ('validate_hta' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hta');
          }
          if ('validate_tp' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tp');
          }
          if ('validate_uk' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'uk');
          }
          if ('validate_struckno' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'struckno');
          }
          if ('validate_detailadm' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detailadm');
          }
          if ('validate_admission' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'admission');
          }
          if ('validate_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id');
          }
          form_tbantrian_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_bayar_onchange' == $this->NM_ajax_opcao)
          {
              $this->bayar_onChange();
          }
          if ('event_custcode_onchange' == $this->NM_ajax_opcao)
          {
              $this->custCode_onChange();
          }
          if ('event_doctor_onchange' == $this->NM_ajax_opcao)
          {
              $this->doctor_onChange();
          }
          if ('event_hta_onchange' == $this->NM_ajax_opcao)
          {
              $this->hta_onChange();
          }
          if ('event_poly_onchange' == $this->NM_ajax_opcao)
          {
              $this->poly_onChange();
          }
          if ('event_regdate_onchange' == $this->NM_ajax_opcao)
          {
              $this->regDate_onChange();
          }
          if ('event_viaphone_onchange' == $this->NM_ajax_opcao)
          {
              $this->viaPhone_onChange();
          }
          form_tbantrian_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['viaphone']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->viaphone = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['viaphone'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['nama']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->nama = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['nama'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['alamat']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->alamat = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['alamat'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['sc_field_2']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->sc_field_2 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['sc_field_2'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['sc_field_1']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->sc_field_1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['sc_field_1'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['sc_field_0']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->sc_field_0 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['sc_field_0'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['tp']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->tp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['tp'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['uk']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->uk = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select']['uk'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_tbantrian_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_tbantrian_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_tbantrian_pack_ajax_response();
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
          form_tbantrian_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_tbantrian.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Antrian Pasien") ?></TITLE>
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
<form name="Fdown" method="get" action="form_tbantrian_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_tbantrian"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
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
           case 'poly':
               return "Poli";
               break;
           case 'doctor':
               return "Dokter";
               break;
           case 'regdate':
               return "Tanggal";
               break;
           case 'viaphone':
               return "Non Prioritas (16 Keatas)";
               break;
           case 'regtime':
               return "Reg Time";
               break;
           case 'queue':
               return "No Antrian";
               break;
           case 'custcode':
               return "No. RM";
               break;
           case 'nama':
               return "Nama";
               break;
           case 'status':
               return "Status";
               break;
           case 'alamat':
               return "Alamat";
               break;
           case 'sc_field_2':
               return "Telepon & HP";
               break;
           case 'sc_field_1':
               return "Tanggal Lahir";
               break;
           case 'usia':
               return "Usia";
               break;
           case 'sc_field_0':
               return "Jenis Kelamin";
               break;
           case 'jenis':
               return "Jenis";
               break;
           case 'bayar':
               return "Metode Pembayaran";
               break;
           case 'instno':
               return "No Kartu";
               break;
           case 'instexpiry':
               return "Masa Berlaku";
               break;
           case 'inst':
               return "Penjamin";
               break;
           case 'instcode':
               return "Kode Instansi";
               break;
           case 'hta':
               return "HTA";
               break;
           case 'tp':
               return "Taksiran Persalinan";
               break;
           case 'uk':
               return "Usia Kehamilan";
               break;
           case 'struckno':
               return "No Struk";
               break;
           case 'detailadm':
               return "";
               break;
           case 'admission':
               return "Admission";
               break;
           case 'id':
               return "Id";
               break;
           case 'handled':
               return "Handled";
               break;
           case 'note':
               return "Note";
               break;
           case 'member':
               return "Member";
               break;
           case 'tlc':
               return "Tlc";
               break;
           case 'paid':
               return "Paid";
               break;
           case 'custtlc':
               return "Cust Tlc";
               break;
           case 'shift':
               return "Shift";
               break;
           case 'bu':
               return "Bu";
               break;
           case 'bucode':
               return "Bu Code";
               break;
           case 'ruang':
               return "Ruang";
               break;
           case 'statusrm':
               return "Status Rm";
               break;
           case 'sep':
               return "Sep";
               break;
           case 'caracode':
               return "Cara Code";
               break;
           case 'regtype':
               return "Reg Type";
               break;
           case 'asalrujukan':
               return "Asal Rujukan";
               break;
           case 'asalcode':
               return "Asal Code";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_tbantrian']) || !is_array($this->NM_ajax_info['errList']['geral_form_tbantrian']))
              {
                  $this->NM_ajax_info['errList']['geral_form_tbantrian'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_tbantrian'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'poly' == $filtro)
        $this->ValidateField_poly($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'doctor' == $filtro)
        $this->ValidateField_doctor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'regdate' == $filtro)
        $this->ValidateField_regdate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'viaphone' == $filtro)
        $this->ValidateField_viaphone($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'regtime' == $filtro)
        $this->ValidateField_regtime($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'queue' == $filtro)
        $this->ValidateField_queue($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'custcode' == $filtro)
        $this->ValidateField_custcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nama' == $filtro)
        $this->ValidateField_nama($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'status' == $filtro)
        $this->ValidateField_status($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'alamat' == $filtro)
        $this->ValidateField_alamat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_2' == $filtro)
        $this->ValidateField_sc_field_2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_1' == $filtro)
        $this->ValidateField_sc_field_1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'usia' == $filtro)
        $this->ValidateField_usia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_0' == $filtro)
        $this->ValidateField_sc_field_0($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'jenis' == $filtro)
        $this->ValidateField_jenis($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bayar' == $filtro)
        $this->ValidateField_bayar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'instno' == $filtro)
        $this->ValidateField_instno($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'instexpiry' == $filtro)
        $this->ValidateField_instexpiry($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'inst' == $filtro)
        $this->ValidateField_inst($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'instcode' == $filtro)
        $this->ValidateField_instcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hta' == $filtro)
        $this->ValidateField_hta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tp' == $filtro)
        $this->ValidateField_tp($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'uk' == $filtro)
        $this->ValidateField_uk($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'struckno' == $filtro)
        $this->ValidateField_struckno($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detailadm' == $filtro)
        $this->ValidateField_detailadm($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'admission' == $filtro)
        $this->ValidateField_admission($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id' == $filtro)
        $this->ValidateField_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_poly(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->poly == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['php_cmp_required']['poly']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['php_cmp_required']['poly'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Poli" ; 
          if (!isset($Campos_Erros['poly']))
          {
              $Campos_Erros['poly'] = array();
          }
          $Campos_Erros['poly'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['poly']) || !is_array($this->NM_ajax_info['errList']['poly']))
          {
              $this->NM_ajax_info['errList']['poly'] = array();
          }
          $this->NM_ajax_info['errList']['poly'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->poly) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly']) && !in_array($this->poly, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['poly']))
              {
                  $Campos_Erros['poly'] = array();
              }
              $Campos_Erros['poly'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['poly']) || !is_array($this->NM_ajax_info['errList']['poly']))
              {
                  $this->NM_ajax_info['errList']['poly'] = array();
              }
              $this->NM_ajax_info['errList']['poly'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'poly';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_poly

    function ValidateField_doctor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->doctor == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['php_cmp_required']['doctor']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['php_cmp_required']['doctor'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Dokter" ; 
          if (!isset($Campos_Erros['doctor']))
          {
              $Campos_Erros['doctor'] = array();
          }
          $Campos_Erros['doctor'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['doctor']) || !is_array($this->NM_ajax_info['errList']['doctor']))
          {
              $this->NM_ajax_info['errList']['doctor'] = array();
          }
          $this->NM_ajax_info['errList']['doctor'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->doctor) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor']) && !in_array($this->doctor, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['doctor']))
              {
                  $Campos_Erros['doctor'] = array();
              }
              $Campos_Erros['doctor'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['doctor']) || !is_array($this->NM_ajax_info['errList']['doctor']))
              {
                  $this->NM_ajax_info['errList']['doctor'] = array();
              }
              $this->NM_ajax_info['errList']['doctor'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'doctor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_doctor

    function ValidateField_regdate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->regdate, $this->field_config['regdate']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['regdate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['regdate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['regdate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['regdate']['date_sep']) ; 
          if (trim($this->regdate) != "")  
          { 
              if ($teste_validade->Data($this->regdate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tanggal; " ; 
                  if (!isset($Campos_Erros['regdate']))
                  {
                      $Campos_Erros['regdate'] = array();
                  }
                  $Campos_Erros['regdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['regdate']) || !is_array($this->NM_ajax_info['errList']['regdate']))
                  {
                      $this->NM_ajax_info['errList']['regdate'] = array();
                  }
                  $this->NM_ajax_info['errList']['regdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['regdate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'regdate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_regdate

    function ValidateField_viaphone(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->viaphone == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->viaphone === "" || is_null($this->viaphone))  
      { 
          $this->viaphone = 0;
          $this->sc_force_zero[] = 'viaphone';
      } 
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'viaphone';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_viaphone

    function ValidateField_regtime(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->regtime) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Reg Time " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['regtime']))
              {
                  $Campos_Erros['regtime'] = array();
              }
              $Campos_Erros['regtime'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['regtime']) || !is_array($this->NM_ajax_info['errList']['regtime']))
              {
                  $this->NM_ajax_info['errList']['regtime'] = array();
              }
              $this->NM_ajax_info['errList']['regtime'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'regtime';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_regtime

    function ValidateField_queue(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->queue === "" || is_null($this->queue))  
      { 
          $this->queue = 0;
          $this->sc_force_zero[] = 'queue';
      } 
      nm_limpa_numero($this->queue, $this->field_config['queue']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->queue != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->queue) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "No Antrian: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['queue']))
                  {
                      $Campos_Erros['queue'] = array();
                  }
                  $Campos_Erros['queue'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['queue']) || !is_array($this->NM_ajax_info['errList']['queue']))
                  {
                      $this->NM_ajax_info['errList']['queue'] = array();
                  }
                  $this->NM_ajax_info['errList']['queue'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->queue, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "No Antrian; " ; 
                  if (!isset($Campos_Erros['queue']))
                  {
                      $Campos_Erros['queue'] = array();
                  }
                  $Campos_Erros['queue'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['queue']) || !is_array($this->NM_ajax_info['errList']['queue']))
                  {
                      $this->NM_ajax_info['errList']['queue'] = array();
                  }
                  $this->NM_ajax_info['errList']['queue'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'queue';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_queue

    function ValidateField_custcode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['php_cmp_required']['custcode']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['php_cmp_required']['custcode'] == "on")) 
      { 
          if ($this->custcode == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "No. RM" ; 
              if (!isset($Campos_Erros['custcode']))
              {
                  $Campos_Erros['custcode'] = array();
              }
              $Campos_Erros['custcode'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['custcode']) || !is_array($this->NM_ajax_info['errList']['custcode']))
                  {
                      $this->NM_ajax_info['errList']['custcode'] = array();
                  }
                  $this->NM_ajax_info['errList']['custcode'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->custcode) > 8) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. RM " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['custcode']))
              {
                  $Campos_Erros['custcode'] = array();
              }
              $Campos_Erros['custcode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['custcode']) || !is_array($this->NM_ajax_info['errList']['custcode']))
              {
                  $this->NM_ajax_info['errList']['custcode'] = array();
              }
              $this->NM_ajax_info['errList']['custcode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
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
               if (!empty($this->nama) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama']) && !in_array($this->nama, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama']))
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

    function ValidateField_status(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->status == "" && $this->nmgp_opcao != "excluir")
      { 
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

    function ValidateField_alamat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->alamat) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat']) && !in_array($this->alamat, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat']))
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

    function ValidateField_sc_field_2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->sc_field_2) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2']) && !in_array($this->sc_field_2, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['sc_field_2']))
                   {
                       $Campos_Erros['sc_field_2'] = array();
                   }
                   $Campos_Erros['sc_field_2'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['sc_field_2']) || !is_array($this->NM_ajax_info['errList']['sc_field_2']))
                   {
                       $this->NM_ajax_info['errList']['sc_field_2'] = array();
                   }
                   $this->NM_ajax_info['errList']['sc_field_2'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sc_field_2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sc_field_2

    function ValidateField_sc_field_1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->sc_field_1) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1']) && !in_array($this->sc_field_1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['sc_field_1']))
                   {
                       $Campos_Erros['sc_field_1'] = array();
                   }
                   $Campos_Erros['sc_field_1'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['sc_field_1']) || !is_array($this->NM_ajax_info['errList']['sc_field_1']))
                   {
                       $this->NM_ajax_info['errList']['sc_field_1'] = array();
                   }
                   $this->NM_ajax_info['errList']['sc_field_1'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sc_field_1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sc_field_1

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

    function ValidateField_sc_field_0(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->sc_field_0) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0']) && !in_array($this->sc_field_0, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0']))
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

    function ValidateField_jenis(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->jenis == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'jenis';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_jenis

    function ValidateField_bayar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->bayar == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['php_cmp_required']['bayar']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['php_cmp_required']['bayar'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Metode Pembayaran" ;
          if (!isset($Campos_Erros['bayar']))
          {
              $Campos_Erros['bayar'] = array();
          }
          $Campos_Erros['bayar'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['bayar']) || !is_array($this->NM_ajax_info['errList']['bayar']))
                  {
                      $this->NM_ajax_info['errList']['bayar'] = array();
                  }
                  $this->NM_ajax_info['errList']['bayar'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'bayar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_bayar

    function ValidateField_instno(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->instno) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "No Kartu " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['instno']))
              {
                  $Campos_Erros['instno'] = array();
              }
              $Campos_Erros['instno'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['instno']) || !is_array($this->NM_ajax_info['errList']['instno']))
              {
                  $this->NM_ajax_info['errList']['instno'] = array();
              }
              $this->NM_ajax_info['errList']['instno'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "01234567890123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->instno ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->instno, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "No Kartu " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['instno']))
              {
                  $Campos_Erros['instno'] = array();
              }
              $Campos_Erros['instno'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['instno']) || !is_array($this->NM_ajax_info['errList']['instno']))
              {
                  $this->NM_ajax_info['errList']['instno'] = array();
              }
              $this->NM_ajax_info['errList']['instno'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'instno';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_instno

    function ValidateField_instexpiry(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->instexpiry, $this->field_config['instexpiry']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['instexpiry']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['instexpiry']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['instexpiry']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['instexpiry']['date_sep']) ; 
          if (trim($this->instexpiry) != "")  
          { 
              if ($teste_validade->Data($this->instexpiry, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Masa Berlaku; " ; 
                  if (!isset($Campos_Erros['instexpiry']))
                  {
                      $Campos_Erros['instexpiry'] = array();
                  }
                  $Campos_Erros['instexpiry'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['instexpiry']) || !is_array($this->NM_ajax_info['errList']['instexpiry']))
                  {
                      $this->NM_ajax_info['errList']['instexpiry'] = array();
                  }
                  $this->NM_ajax_info['errList']['instexpiry'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['instexpiry']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'instexpiry';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_instexpiry

    function ValidateField_inst(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->inst) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst']) && !in_array($this->inst, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['inst']))
                   {
                       $Campos_Erros['inst'] = array();
                   }
                   $Campos_Erros['inst'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['inst']) || !is_array($this->NM_ajax_info['errList']['inst']))
                   {
                       $this->NM_ajax_info['errList']['inst'] = array();
                   }
                   $this->NM_ajax_info['errList']['inst'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'inst';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_inst

    function ValidateField_instcode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->instcode) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode']) && !in_array($this->instcode, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode']))
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

    function ValidateField_hta(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->hta, $this->field_config['hta']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['hta']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['hta']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['hta']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['hta']['date_sep']) ; 
          if (trim($this->hta) != "")  
          { 
              if ($teste_validade->Data($this->hta, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HTA; " ; 
                  if (!isset($Campos_Erros['hta']))
                  {
                      $Campos_Erros['hta'] = array();
                  }
                  $Campos_Erros['hta'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hta']) || !is_array($this->NM_ajax_info['errList']['hta']))
                  {
                      $this->NM_ajax_info['errList']['hta'] = array();
                  }
                  $this->NM_ajax_info['errList']['hta'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['hta']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hta';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hta

    function ValidateField_tp(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tp) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Taksiran Persalinan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tp']))
              {
                  $Campos_Erros['tp'] = array();
              }
              $Campos_Erros['tp'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tp']) || !is_array($this->NM_ajax_info['errList']['tp']))
              {
                  $this->NM_ajax_info['errList']['tp'] = array();
              }
              $this->NM_ajax_info['errList']['tp'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tp';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tp

    function ValidateField_uk(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->uk) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Usia Kehamilan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['uk']))
              {
                  $Campos_Erros['uk'] = array();
              }
              $Campos_Erros['uk'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['uk']) || !is_array($this->NM_ajax_info['errList']['uk']))
              {
                  $this->NM_ajax_info['errList']['uk'] = array();
              }
              $this->NM_ajax_info['errList']['uk'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'uk';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_uk

    function ValidateField_struckno(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->struckno) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "No Struk " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['struckno']))
              {
                  $Campos_Erros['struckno'] = array();
              }
              $Campos_Erros['struckno'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['struckno']) || !is_array($this->NM_ajax_info['errList']['struckno']))
              {
                  $this->NM_ajax_info['errList']['struckno'] = array();
              }
              $this->NM_ajax_info['errList']['struckno'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'struckno';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_struckno

    function ValidateField_detailadm(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detailadm) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detailadm';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detailadm

    function ValidateField_admission(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->admission) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Admission " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['admission']))
              {
                  $Campos_Erros['admission'] = array();
              }
              $Campos_Erros['admission'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['admission']) || !is_array($this->NM_ajax_info['errList']['admission']))
              {
                  $this->NM_ajax_info['errList']['admission'] = array();
              }
              $this->NM_ajax_info['errList']['admission'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'admission';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_admission

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
              $iTestSize = 20;
              if (strlen($this->id) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Id: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->id, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Id; " ; 
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
    $this->nmgp_dados_form['poly'] = $this->poly;
    $this->nmgp_dados_form['doctor'] = $this->doctor;
    $this->nmgp_dados_form['regdate'] = (strlen(trim($this->regdate)) > 19) ? str_replace(".", ":", $this->regdate) : trim($this->regdate);
    $this->nmgp_dados_form['viaphone'] = $this->viaphone;
    $this->nmgp_dados_form['regtime'] = $this->regtime;
    $this->nmgp_dados_form['queue'] = $this->queue;
    $this->nmgp_dados_form['custcode'] = $this->custcode;
    $this->nmgp_dados_form['nama'] = $this->nama;
    $this->nmgp_dados_form['status'] = $this->status;
    $this->nmgp_dados_form['alamat'] = $this->alamat;
    $this->nmgp_dados_form['sc_field_2'] = $this->sc_field_2;
    $this->nmgp_dados_form['sc_field_1'] = $this->sc_field_1;
    $this->nmgp_dados_form['usia'] = $this->usia;
    $this->nmgp_dados_form['sc_field_0'] = $this->sc_field_0;
    $this->nmgp_dados_form['jenis'] = $this->jenis;
    $this->nmgp_dados_form['bayar'] = $this->bayar;
    $this->nmgp_dados_form['instno'] = $this->instno;
    $this->nmgp_dados_form['instexpiry'] = (strlen(trim($this->instexpiry)) > 19) ? str_replace(".", ":", $this->instexpiry) : trim($this->instexpiry);
    $this->nmgp_dados_form['inst'] = $this->inst;
    $this->nmgp_dados_form['instcode'] = $this->instcode;
    $this->nmgp_dados_form['hta'] = (strlen(trim($this->hta)) > 19) ? str_replace(".", ":", $this->hta) : trim($this->hta);
    $this->nmgp_dados_form['tp'] = $this->tp;
    $this->nmgp_dados_form['uk'] = $this->uk;
    $this->nmgp_dados_form['struckno'] = $this->struckno;
    $this->nmgp_dados_form['detailadm'] = $this->detailadm;
    $this->nmgp_dados_form['admission'] = $this->admission;
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['handled'] = $this->handled;
    $this->nmgp_dados_form['note'] = $this->note;
    $this->nmgp_dados_form['member'] = $this->member;
    $this->nmgp_dados_form['tlc'] = $this->tlc;
    $this->nmgp_dados_form['paid'] = $this->paid;
    $this->nmgp_dados_form['custtlc'] = $this->custtlc;
    $this->nmgp_dados_form['shift'] = $this->shift;
    $this->nmgp_dados_form['bu'] = $this->bu;
    $this->nmgp_dados_form['bucode'] = $this->bucode;
    $this->nmgp_dados_form['ruang'] = $this->ruang;
    $this->nmgp_dados_form['statusrm'] = $this->statusrm;
    $this->nmgp_dados_form['sep'] = $this->sep;
    $this->nmgp_dados_form['caracode'] = $this->caracode;
    $this->nmgp_dados_form['regtype'] = $this->regtype;
    $this->nmgp_dados_form['asalrujukan'] = $this->asalrujukan;
    $this->nmgp_dados_form['asalcode'] = $this->asalcode;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['regdate'] = $this->regdate;
      nm_limpa_data($this->regdate, $this->field_config['regdate']['date_sep']) ; 
      $this->Before_unformat['queue'] = $this->queue;
      nm_limpa_numero($this->queue, $this->field_config['queue']['symbol_grp']) ; 
      $this->Before_unformat['instexpiry'] = $this->instexpiry;
      nm_limpa_data($this->instexpiry, $this->field_config['instexpiry']['date_sep']) ; 
      $this->Before_unformat['hta'] = $this->hta;
      nm_limpa_data($this->hta, $this->field_config['hta']['date_sep']) ; 
      $this->Before_unformat['id'] = $this->id;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      $this->Before_unformat['handled'] = $this->handled;
      nm_limpa_data($this->handled, $this->field_config['handled']['date_sep']) ; 
      nm_limpa_hora($this->handled_hora, $this->field_config['handled']['time_sep']) ; 
      $this->Before_unformat['paid'] = $this->paid;
      nm_limpa_data($this->paid, $this->field_config['paid']['date_sep']) ; 
      nm_limpa_hora($this->paid_hora, $this->field_config['paid']['time_sep']) ; 
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
      if ($Nome_Campo == "queue")
      {
          nm_limpa_numero($this->queue, $this->field_config['queue']['symbol_grp']) ; 
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
      if ((!empty($this->regdate) && 'null' != $this->regdate) || (!empty($format_fields) && isset($format_fields['regdate'])))
      {
          nm_volta_data($this->regdate, $this->field_config['regdate']['date_format']) ; 
          nmgp_Form_Datas($this->regdate, $this->field_config['regdate']['date_format'], $this->field_config['regdate']['date_sep']) ;  
      }
      elseif ('null' == $this->regdate || '' == $this->regdate)
      {
          $this->regdate = '';
      }
      if ('' !== $this->queue || (!empty($format_fields) && isset($format_fields['queue'])))
      {
          nmgp_Form_Num_Val($this->queue, $this->field_config['queue']['symbol_grp'], $this->field_config['queue']['symbol_dec'], "0", "S", $this->field_config['queue']['format_neg'], "", "", "-", $this->field_config['queue']['symbol_fmt']) ; 
      }
      if ((!empty($this->instexpiry) && 'null' != $this->instexpiry) || (!empty($format_fields) && isset($format_fields['instexpiry'])))
      {
          nm_volta_data($this->instexpiry, $this->field_config['instexpiry']['date_format']) ; 
          nmgp_Form_Datas($this->instexpiry, $this->field_config['instexpiry']['date_format'], $this->field_config['instexpiry']['date_sep']) ;  
      }
      elseif ('null' == $this->instexpiry || '' == $this->instexpiry)
      {
          $this->instexpiry = '';
      }
      if ((!empty($this->hta) && 'null' != $this->hta) || (!empty($format_fields) && isset($format_fields['hta'])))
      {
          nm_volta_data($this->hta, $this->field_config['hta']['date_format']) ; 
          nmgp_Form_Datas($this->hta, $this->field_config['hta']['date_format'], $this->field_config['hta']['date_sep']) ;  
      }
      elseif ('null' == $this->hta || '' == $this->hta)
      {
          $this->hta = '';
      }
      if ('' !== $this->id || (!empty($format_fields) && isset($format_fields['id'])))
      {
          nmgp_Form_Num_Val($this->id, $this->field_config['id']['symbol_grp'], $this->field_config['id']['symbol_dec'], "0", "S", $this->field_config['id']['format_neg'], "", "", "-", $this->field_config['id']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['regdate']['date_format'];
      if ($this->regdate != "")  
      { 
          nm_conv_data($this->regdate, $this->field_config['regdate']['date_format']) ; 
          $this->regdate_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->regdate_hora = substr($this->regdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->regdate_hora = substr($this->regdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->regdate_hora = substr($this->regdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->regdate_hora = substr($this->regdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->regdate_hora = substr($this->regdate_hora, 0, -4);
          }
          $this->regdate .= " " . $this->regdate_hora ; 
      } 
      if ($this->regdate == "" && $use_null)  
      { 
          $this->regdate = "null" ; 
      } 
      $this->field_config['regdate']['date_format'] = $guarda_format_hora;
      if ($this->sc_field_1 != "")  
      {
      }
      $guarda_format_hora = $this->field_config['instexpiry']['date_format'];
      if ($this->instexpiry != "")  
      { 
          nm_conv_data($this->instexpiry, $this->field_config['instexpiry']['date_format']) ; 
          $this->instexpiry_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->instexpiry_hora = substr($this->instexpiry_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->instexpiry_hora = substr($this->instexpiry_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->instexpiry_hora = substr($this->instexpiry_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->instexpiry_hora = substr($this->instexpiry_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->instexpiry_hora = substr($this->instexpiry_hora, 0, -4);
          }
          $this->instexpiry .= " " . $this->instexpiry_hora ; 
      } 
      if ($this->instexpiry == "" && $use_null)  
      { 
          $this->instexpiry = "null" ; 
      } 
      $this->field_config['instexpiry']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hta']['date_format'];
      if ($this->hta != "")  
      { 
          nm_conv_data($this->hta, $this->field_config['hta']['date_format']) ; 
          $this->hta_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hta_hora = substr($this->hta_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hta_hora = substr($this->hta_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hta_hora = substr($this->hta_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hta_hora = substr($this->hta_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hta_hora = substr($this->hta_hora, 0, -4);
          }
          $this->hta .= " " . $this->hta_hora ; 
      } 
      if ($this->hta == "" && $use_null)  
      { 
          $this->hta = "null" ; 
      } 
      $this->field_config['hta']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_poly();
          $this->ajax_return_values_doctor();
          $this->ajax_return_values_regdate();
          $this->ajax_return_values_viaphone();
          $this->ajax_return_values_regtime();
          $this->ajax_return_values_queue();
          $this->ajax_return_values_custcode();
          $this->ajax_return_values_nama();
          $this->ajax_return_values_status();
          $this->ajax_return_values_alamat();
          $this->ajax_return_values_sc_field_2();
          $this->ajax_return_values_sc_field_1();
          $this->ajax_return_values_usia();
          $this->ajax_return_values_sc_field_0();
          $this->ajax_return_values_jenis();
          $this->ajax_return_values_bayar();
          $this->ajax_return_values_instno();
          $this->ajax_return_values_instexpiry();
          $this->ajax_return_values_inst();
          $this->ajax_return_values_instcode();
          $this->ajax_return_values_hta();
          $this->ajax_return_values_tp();
          $this->ajax_return_values_uk();
          $this->ajax_return_values_struckno();
          $this->ajax_return_values_detailadm();
          $this->ajax_return_values_admission();
          $this->ajax_return_values_id();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_tbantrian_pack_protect_string($this->nmgp_dados_form['id']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['foreign_key']['trancode'] = $this->nmgp_dados_form['struckno'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['struckno'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['struckno'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['total']);
          }
   } // ajax_return_values

          //----- poly
   function ajax_return_values_poly($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("poly", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->poly);
              $aLookup = array();
              $this->_tmp_lookup_poly = $this->poly;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly'] = array(); 
}
$aLookup[] = array(form_tbantrian_pack_protect_string('') => form_tbantrian_pack_protect_string(' '));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT polyCode, name  FROM tbpoli  ORDER BY name";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly'][] = $rs->fields[0];
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
          $sSelComp = "name=\"poly\"";
          if (isset($this->NM_ajax_info['select_html']['poly']) && !empty($this->NM_ajax_info['select_html']['poly']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['poly'];
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

                  if ($this->poly == $sValue)
                  {
                      $this->_tmp_lookup_poly = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['poly'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['poly']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['poly']['valList'][$i] = form_tbantrian_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['poly']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['poly']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['poly']['labList'] = $aLabel;
          }
   }

          //----- doctor
   function ajax_return_values_doctor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("doctor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->doctor);
              $aLookup = array();
              $this->_tmp_lookup_doctor = $this->doctor;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor'] = array(); 
}
$aLookup[] = array(form_tbantrian_pack_protect_string('') => form_tbantrian_pack_protect_string(' '));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT docCode, concat(gelar, name,',', spec)  FROM tbdoctor WHERE poli like '%$this->poly%' ORDER BY gelar, name, spec";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor'][] = $rs->fields[0];
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
          $sSelComp = "name=\"doctor\"";
          if (isset($this->NM_ajax_info['select_html']['doctor']) && !empty($this->NM_ajax_info['select_html']['doctor']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['doctor'];
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

                  if ($this->doctor == $sValue)
                  {
                      $this->_tmp_lookup_doctor = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['doctor'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['doctor']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['doctor']['valList'][$i] = form_tbantrian_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['doctor']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['doctor']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['doctor']['labList'] = $aLabel;
          }
   }

          //----- regdate
   function ajax_return_values_regdate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("regdate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->regdate);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['regdate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- viaphone
   function ajax_return_values_viaphone($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("viaphone", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->viaphone);
              $aLookup = array();
              $this->_tmp_lookup_viaphone = $this->viaphone;

$aLookup[] = array(form_tbantrian_pack_protect_string('0') => form_tbantrian_pack_protect_string("Tidak"));
$aLookup[] = array(form_tbantrian_pack_protect_string('1') => form_tbantrian_pack_protect_string("Ya"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_viaphone'][] = '0';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_viaphone'][] = '1';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"viaphone\"";
          if (isset($this->NM_ajax_info['select_html']['viaphone']) && !empty($this->NM_ajax_info['select_html']['viaphone']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['viaphone'];
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

                  if ($this->viaphone == $sValue)
                  {
                      $this->_tmp_lookup_viaphone = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['viaphone'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['viaphone']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['viaphone']['valList'][$i] = form_tbantrian_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['viaphone']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['viaphone']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['viaphone']['labList'] = $aLabel;
          }
   }

          //----- regtime
   function ajax_return_values_regtime($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("regtime", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->regtime);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['regtime'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- queue
   function ajax_return_values_queue($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("queue", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->queue);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['queue'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['custcode'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ',' + salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,',', salut)  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&','&salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ',' + salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['nama']['valList'][$i] = form_tbantrian_pack_protect_string($v);
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

          //----- status
   function ajax_return_values_status($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("status", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->status);
              $aLookup = array();
              $this->_tmp_lookup_status = $this->status;

$aLookup[] = array(form_tbantrian_pack_protect_string('Antre') => form_tbantrian_pack_protect_string("Antre"));
$aLookup[] = array(form_tbantrian_pack_protect_string('Batal') => form_tbantrian_pack_protect_string("Batal"));
$aLookup[] = array(form_tbantrian_pack_protect_string('Pelayanan') => form_tbantrian_pack_protect_string("Pelayanan"));
$aLookup[] = array(form_tbantrian_pack_protect_string('Lengkap') => form_tbantrian_pack_protect_string("Lengkap"));
$aLookup[] = array(form_tbantrian_pack_protect_string('Selesai') => form_tbantrian_pack_protect_string("Selesai"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_status'][] = 'Antre';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_status'][] = 'Batal';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_status'][] = 'Pelayanan';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_status'][] = 'Lengkap';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_status'][] = 'Selesai';
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
              $this->NM_ajax_info['fldList']['status']['valList'][$i] = form_tbantrian_pack_protect_string($v);
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

          //----- alamat
   function ajax_return_values_alamat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("alamat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->alamat);
              $aLookup = array();
              $this->_tmp_lookup_alamat = $this->alamat;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT custCode, address  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY address";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['alamat']['valList'][$i] = form_tbantrian_pack_protect_string($v);
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

          //----- sc_field_2
   function ajax_return_values_sc_field_2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_2);
              $aLookup = array();
              $this->_tmp_lookup_sc_field_2 = $this->sc_field_2;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, phone + ' / ' + hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(phone,' / ', hp)  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, phone&' / '&hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, phone||' / '||hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, phone + ' / ' + hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, phone||' / '||hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   else
   {
       $nm_comando = "SELECT custCode, phone||' / '||hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2'][] = $rs->fields[0];
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
          $sSelComp = "name=\"sc_field_2\"";
          if (isset($this->NM_ajax_info['select_html']['sc_field_2']) && !empty($this->NM_ajax_info['select_html']['sc_field_2']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['sc_field_2'];
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

                  if ($this->sc_field_2 == $sValue)
                  {
                      $this->_tmp_lookup_sc_field_2 = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['sc_field_2'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sc_field_2']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sc_field_2']['valList'][$i] = form_tbantrian_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sc_field_2']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sc_field_2']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sc_field_2']['labList'] = $aLabel;
          }
   }

          //----- sc_field_1
   function ajax_return_values_sc_field_1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_1);
              $aLookup = array();
              $this->_tmp_lookup_sc_field_1 = $this->sc_field_1;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT str_replace (convert(char(10),date(birthDate),102), '.', '-') + ' ' + convert(char(8),date(birthDate),20) as sc_field_10 FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY birthDate";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT convert(char(19),date(birthDate),121) as sc_field_10 FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY birthDate";
   }
   else
   {
       $nm_comando = "SELECT date(birthDate)  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY birthDate";
   }

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1'][] = $rs->fields[0];
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
          $sSelComp = "name=\"sc_field_1\"";
          if (isset($this->NM_ajax_info['select_html']['sc_field_1']) && !empty($this->NM_ajax_info['select_html']['sc_field_1']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['sc_field_1'];
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

                  if ($this->sc_field_1 == $sValue)
                  {
                      $this->_tmp_lookup_sc_field_1 = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['sc_field_1'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sc_field_1']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sc_field_1']['valList'][$i] = form_tbantrian_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sc_field_1']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sc_field_1']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sc_field_1']['labList'] = $aLabel;
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

          //----- sc_field_0
   function ajax_return_values_sc_field_0($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_0", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_0);
              $aLookup = array();
              $this->_tmp_lookup_sc_field_0 = $this->sc_field_0;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT custCode, sex  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY sex";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['sc_field_0']['valList'][$i] = form_tbantrian_pack_protect_string($v);
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

          //----- jenis
   function ajax_return_values_jenis($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jenis", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jenis);
              $aLookup = array();
              $this->_tmp_lookup_jenis = $this->jenis;

$aLookup[] = array(form_tbantrian_pack_protect_string('Pasien Lama') => form_tbantrian_pack_protect_string("Pasien Lama"));
$aLookup[] = array(form_tbantrian_pack_protect_string('Pasien Baru') => form_tbantrian_pack_protect_string("Pasien Baru"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_jenis'][] = 'Pasien Lama';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_jenis'][] = 'Pasien Baru';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"jenis\"";
          if (isset($this->NM_ajax_info['select_html']['jenis']) && !empty($this->NM_ajax_info['select_html']['jenis']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['jenis'];
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

                  if ($this->jenis == $sValue)
                  {
                      $this->_tmp_lookup_jenis = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['jenis'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['jenis']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['jenis']['valList'][$i] = form_tbantrian_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['jenis']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['jenis']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['jenis']['labList'] = $aLabel;
          }
   }

          //----- bayar
   function ajax_return_values_bayar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bayar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bayar);
              $aLookup = array();
              $this->_tmp_lookup_bayar = $this->bayar;

$aLookup[] = array(form_tbantrian_pack_protect_string('ASURANSI') => form_tbantrian_pack_protect_string("ASURANSI"));
$aLookup[] = array(form_tbantrian_pack_protect_string('TUNAI') => form_tbantrian_pack_protect_string("TUNAI"));
$aLookup[] = array(form_tbantrian_pack_protect_string('BPJS') => form_tbantrian_pack_protect_string("BPJS"));
$aLookup[] = array(form_tbantrian_pack_protect_string('COB') => form_tbantrian_pack_protect_string("COB"));
$aLookup[] = array(form_tbantrian_pack_protect_string('PAKET') => form_tbantrian_pack_protect_string("PAKET"));
$aLookup[] = array(form_tbantrian_pack_protect_string('BANSOS') => form_tbantrian_pack_protect_string("BANSOS"));
$aLookup[] = array(form_tbantrian_pack_protect_string('JAMPERU') => form_tbantrian_pack_protect_string("JAMPERU"));
$aLookup[] = array(form_tbantrian_pack_protect_string('TUNAI PAKET') => form_tbantrian_pack_protect_string("TUNAI PAKET"));
$aLookup[] = array(form_tbantrian_pack_protect_string('TUNAI PROMO') => form_tbantrian_pack_protect_string("TUNAI PROMO"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_bayar'][] = 'ASURANSI';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_bayar'][] = 'TUNAI';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_bayar'][] = 'BPJS';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_bayar'][] = 'COB';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_bayar'][] = 'PAKET';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_bayar'][] = 'BANSOS';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_bayar'][] = 'JAMPERU';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_bayar'][] = 'TUNAI PAKET';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_bayar'][] = 'TUNAI PROMO';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"bayar\"";
          if (isset($this->NM_ajax_info['select_html']['bayar']) && !empty($this->NM_ajax_info['select_html']['bayar']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['bayar'];
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

                  if ($this->bayar == $sValue)
                  {
                      $this->_tmp_lookup_bayar = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['bayar'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['bayar']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['bayar']['valList'][$i] = form_tbantrian_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['bayar']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['bayar']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['bayar']['labList'] = $aLabel;
          }
   }

          //----- instno
   function ajax_return_values_instno($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("instno", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->instno);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['instno'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- instexpiry
   function ajax_return_values_instexpiry($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("instexpiry", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->instexpiry);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['instexpiry'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- inst
   function ajax_return_values_inst($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("inst", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->inst);
              $aLookup = array();
              $this->_tmp_lookup_inst = $this->inst;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst'] = array(); 
}
$aLookup[] = array(form_tbantrian_pack_protect_string('') => form_tbantrian_pack_protect_string(' '));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT name, name  FROM tbinstansi  ORDER BY name";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst'][] = $rs->fields[0];
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
          $sSelComp = "name=\"inst\"";
          if (isset($this->NM_ajax_info['select_html']['inst']) && !empty($this->NM_ajax_info['select_html']['inst']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['inst'];
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

                  if ($this->inst == $sValue)
                  {
                      $this->_tmp_lookup_inst = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['inst'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['inst']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['inst']['valList'][$i] = form_tbantrian_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['inst']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['inst']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['inst']['labList'] = $aLabel;
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT instCode, instCode FROM tbinstansi WHERE name = '$this->inst' ORDER BY instCode";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbantrian_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['instcode']['valList'][$i] = form_tbantrian_pack_protect_string($v);
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

          //----- hta
   function ajax_return_values_hta($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hta", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hta);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hta'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tp
   function ajax_return_values_tp($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tp", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tp);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tp'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- uk
   function ajax_return_values_uk($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("uk", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->uk);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['uk'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- struckno
   function ajax_return_values_struckno($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("struckno", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->struckno);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['struckno'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- detailadm
   function ajax_return_values_detailadm($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detailadm", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detailadm);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detailadm'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- admission
   function ajax_return_values_admission($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("admission", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->admission);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['admission'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['upload_dir'][$fieldName][] = $newName;
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
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_norm'] = $this->form_encode_input($this->nmgp_dados_form['custcode']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_1_var_no_struk'] = $this->form_encode_input($this->nmgp_dados_form['struckno']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_2_var_custcode'] = $this->form_encode_input($this->nmgp_dados_form['custcode']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_3_strukrj'] = $this->form_encode_input($this->nmgp_dados_form['struckno']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_3_dokterasal'] = $this->form_encode_input($this->nmgp_dados_form['doctor']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_3_custcode'] = $this->form_encode_input($this->nmgp_dados_form['custcode']);
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
      }
      else
      {
          if (!isset($this->nmgp_cmp_hidden["viaphone"]))
          {
              $this->nmgp_cmp_hidden["viaphone"] = "off"; $this->NM_ajax_info['fieldDisplay']['viaphone'] = 'off';
          }
      }
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_bayar = $this->bayar;
    $original_hta = $this->hta;
    $original_inst = $this->inst;
}
  $this->nmgp_cmp_hidden["hta"] = "off"; $this->NM_ajax_info['fieldDisplay']['hta'] = 'off';
$this->nmgp_cmp_hidden["tp"] = "off"; $this->NM_ajax_info['fieldDisplay']['tp'] = 'off';
$this->nmgp_cmp_hidden["uk"] = "off"; $this->NM_ajax_info['fieldDisplay']['uk'] = 'off';
$this->nmgp_cmp_hidden["inst"] = "off"; $this->NM_ajax_info['fieldDisplay']['inst'] = 'off';
$this->nmgp_cmp_hidden["instcode"] = "off"; $this->NM_ajax_info['fieldDisplay']['instcode'] = 'off';
$this->nmgp_cmp_hidden["instno"] = "off"; $this->NM_ajax_info['fieldDisplay']['instno'] = 'off';
$this->nmgp_cmp_hidden["instexpiry"] = "off"; $this->NM_ajax_info['fieldDisplay']['instexpiry'] = 'off';
$this->nmgp_cmp_hidden["viaphone"] = "on"; $this->NM_ajax_info['fieldDisplay']['viaphone'] = 'on';

if($this->bayar  == 'ASURANSI' || $this->bayar  == 'BPJS'){
	$this->nmgp_cmp_hidden["inst"] = "on"; $this->NM_ajax_info['fieldDisplay']['inst'] = 'on';
	$this->nmgp_cmp_hidden["instcode"] = "on"; $this->NM_ajax_info['fieldDisplay']['instcode'] = 'on';
	$this->nmgp_cmp_hidden["instno"] = "on"; $this->NM_ajax_info['fieldDisplay']['instno'] = 'on';
	$this->nmgp_cmp_hidden["instexpiry"] = "on"; $this->NM_ajax_info['fieldDisplay']['instexpiry'] = 'on';
}

if($this->regdate  == '' || is_null($this->regdate )){
	$this->regdate  = date("Y-m-d");
}else{
	
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
    if (($original_bayar != $this->bayar || (isset($bFlagRead_bayar) && $bFlagRead_bayar)))
    {
        $this->ajax_return_values_bayar(true);
    }
    if (($original_hta != $this->hta || (isset($bFlagRead_hta) && $bFlagRead_hta)))
    {
        $this->ajax_return_values_hta(true);
    }
    if (($original_inst != $this->inst || (isset($bFlagRead_inst) && $bFlagRead_inst)))
    {
        $this->ajax_return_values_inst(true);
    }
}
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'off'; 
      }
      if (empty($this->handled))
      {
          $this->handled_hora = $this->handled;
      }
      if (empty($this->paid))
      {
          $this->paid_hora = $this->paid;
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
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
      $_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_admission = $this->admission;
    $original_status = $this->status;
}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  $this->status  = 'Antre';
$this->regtime  = date('H:i');

$today = date("ym");
$check_sql = "select max(struckNo) from (select struckNo from tbantrian where struckNo like '$today%' union select struckNo from tbadmrawatinap where struckNo like '$today%') as struckNo";
 
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
	$lastNoUrut = substr($lastNoTransaksi, 4, 5); 
	$nextNoUrut = $lastNoUrut + 1;
	$this->struckno  = $today.sprintf('%05s', $nextNoUrut);
}
		else     
{
	$this->struckno  = $today.sprintf('%05s', '1');
}

$this->admission  = $this->sc_temp_usr_login;
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_admission != $this->admission || (isset($bFlagRead_admission) && $bFlagRead_admission)))
    {
        $this->ajax_return_values_admission(true);
    }
    if (($original_status != $this->status || (isset($bFlagRead_status) && $bFlagRead_status)))
    {
        $this->ajax_return_values_status(true);
    }
}
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'on';
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
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'off'; 
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
      $NM_val_form['poly'] = $this->poly;
      $NM_val_form['doctor'] = $this->doctor;
      $NM_val_form['regdate'] = $this->regdate;
      $NM_val_form['viaphone'] = $this->viaphone;
      $NM_val_form['regtime'] = $this->regtime;
      $NM_val_form['queue'] = $this->queue;
      $NM_val_form['custcode'] = $this->custcode;
      $NM_val_form['nama'] = $this->nama;
      $NM_val_form['status'] = $this->status;
      $NM_val_form['alamat'] = $this->alamat;
      $NM_val_form['sc_field_2'] = $this->sc_field_2;
      $NM_val_form['sc_field_1'] = $this->sc_field_1;
      $NM_val_form['usia'] = $this->usia;
      $NM_val_form['sc_field_0'] = $this->sc_field_0;
      $NM_val_form['jenis'] = $this->jenis;
      $NM_val_form['bayar'] = $this->bayar;
      $NM_val_form['instno'] = $this->instno;
      $NM_val_form['instexpiry'] = $this->instexpiry;
      $NM_val_form['inst'] = $this->inst;
      $NM_val_form['instcode'] = $this->instcode;
      $NM_val_form['hta'] = $this->hta;
      $NM_val_form['tp'] = $this->tp;
      $NM_val_form['uk'] = $this->uk;
      $NM_val_form['struckno'] = $this->struckno;
      $NM_val_form['detailadm'] = $this->detailadm;
      $NM_val_form['admission'] = $this->admission;
      $NM_val_form['id'] = $this->id;
      $NM_val_form['handled'] = $this->handled;
      $NM_val_form['note'] = $this->note;
      $NM_val_form['member'] = $this->member;
      $NM_val_form['tlc'] = $this->tlc;
      $NM_val_form['paid'] = $this->paid;
      $NM_val_form['custtlc'] = $this->custtlc;
      $NM_val_form['shift'] = $this->shift;
      $NM_val_form['bu'] = $this->bu;
      $NM_val_form['bucode'] = $this->bucode;
      $NM_val_form['ruang'] = $this->ruang;
      $NM_val_form['statusrm'] = $this->statusrm;
      $NM_val_form['sep'] = $this->sep;
      $NM_val_form['caracode'] = $this->caracode;
      $NM_val_form['regtype'] = $this->regtype;
      $NM_val_form['asalrujukan'] = $this->asalrujukan;
      $NM_val_form['asalcode'] = $this->asalcode;
      if ($this->queue === "" || is_null($this->queue))  
      { 
          $this->queue = 0;
          $this->sc_force_zero[] = 'queue';
      } 
      if ($this->viaphone === "" || is_null($this->viaphone))  
      { 
          $this->viaphone = 0;
          $this->sc_force_zero[] = 'viaphone';
      } 
      if ($this->id === "" || is_null($this->id))  
      { 
          $this->id = 0;
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->custcode_before_qstr = $this->custcode;
          $this->custcode = substr($this->Db->qstr($this->custcode), 1, -1); 
          if ($this->custcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->custcode = "null"; 
              $NM_val_null[] = "custcode";
          } 
          $this->poly_before_qstr = $this->poly;
          $this->poly = substr($this->Db->qstr($this->poly), 1, -1); 
          if ($this->poly == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->poly = "null"; 
              $NM_val_null[] = "poly";
          } 
          $this->doctor_before_qstr = $this->doctor;
          $this->doctor = substr($this->Db->qstr($this->doctor), 1, -1); 
          if ($this->doctor == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->doctor = "null"; 
              $NM_val_null[] = "doctor";
          } 
          if ($this->regdate == "")  
          { 
              $this->regdate = "null"; 
              $NM_val_null[] = "regdate";
          } 
          $this->regtime_before_qstr = $this->regtime;
          $this->regtime = substr($this->Db->qstr($this->regtime), 1, -1); 
          if ($this->regtime == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->regtime = "null"; 
              $NM_val_null[] = "regtime";
          } 
          $this->struckno_before_qstr = $this->struckno;
          $this->struckno = substr($this->Db->qstr($this->struckno), 1, -1); 
          if ($this->struckno == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->struckno = "null"; 
              $NM_val_null[] = "struckno";
          } 
          $this->status_before_qstr = $this->status;
          $this->status = substr($this->Db->qstr($this->status), 1, -1); 
          if ($this->status == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->status = "null"; 
              $NM_val_null[] = "status";
          } 
          if ($this->hta == "")  
          { 
              $this->hta = "null"; 
              $NM_val_null[] = "hta";
          } 
          if ($this->handled == "")  
          { 
              $this->handled = "null"; 
              $NM_val_null[] = "handled";
          } 
          $this->note_before_qstr = $this->note;
          $this->note = substr($this->Db->qstr($this->note), 1, -1); 
          if ($this->note == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->note = "null"; 
              $NM_val_null[] = "note";
          } 
          $this->inst_before_qstr = $this->inst;
          $this->inst = substr($this->Db->qstr($this->inst), 1, -1); 
          if ($this->inst == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->inst = "null"; 
              $NM_val_null[] = "inst";
          } 
          $this->jenis_before_qstr = $this->jenis;
          $this->jenis = substr($this->Db->qstr($this->jenis), 1, -1); 
          if ($this->jenis == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->jenis = "null"; 
              $NM_val_null[] = "jenis";
          } 
          $this->bayar_before_qstr = $this->bayar;
          $this->bayar = substr($this->Db->qstr($this->bayar), 1, -1); 
          if ($this->bayar == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->bayar = "null"; 
              $NM_val_null[] = "bayar";
          } 
          $this->instcode_before_qstr = $this->instcode;
          $this->instcode = substr($this->Db->qstr($this->instcode), 1, -1); 
          if ($this->instcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->instcode = "null"; 
              $NM_val_null[] = "instcode";
          } 
          $this->member_before_qstr = $this->member;
          $this->member = substr($this->Db->qstr($this->member), 1, -1); 
          if ($this->member == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->member = "null"; 
              $NM_val_null[] = "member";
          } 
          $this->tlc_before_qstr = $this->tlc;
          $this->tlc = substr($this->Db->qstr($this->tlc), 1, -1); 
          if ($this->tlc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tlc = "null"; 
              $NM_val_null[] = "tlc";
          } 
          $this->instno_before_qstr = $this->instno;
          $this->instno = substr($this->Db->qstr($this->instno), 1, -1); 
          if ($this->instno == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->instno = "null"; 
              $NM_val_null[] = "instno";
          } 
          if ($this->instexpiry == "")  
          { 
              $this->instexpiry = "null"; 
              $NM_val_null[] = "instexpiry";
          } 
          if ($this->paid == "")  
          { 
              $this->paid = "null"; 
              $NM_val_null[] = "paid";
          } 
          $this->custtlc_before_qstr = $this->custtlc;
          $this->custtlc = substr($this->Db->qstr($this->custtlc), 1, -1); 
          if ($this->custtlc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->custtlc = "null"; 
              $NM_val_null[] = "custtlc";
          } 
          $this->shift_before_qstr = $this->shift;
          $this->shift = substr($this->Db->qstr($this->shift), 1, -1); 
          if ($this->shift == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->shift = "null"; 
              $NM_val_null[] = "shift";
          } 
          $this->bu_before_qstr = $this->bu;
          $this->bu = substr($this->Db->qstr($this->bu), 1, -1); 
          if ($this->bu == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->bu = "null"; 
              $NM_val_null[] = "bu";
          } 
          $this->bucode_before_qstr = $this->bucode;
          $this->bucode = substr($this->Db->qstr($this->bucode), 1, -1); 
          if ($this->bucode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->bucode = "null"; 
              $NM_val_null[] = "bucode";
          } 
          $this->ruang_before_qstr = $this->ruang;
          $this->ruang = substr($this->Db->qstr($this->ruang), 1, -1); 
          if ($this->ruang == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ruang = "null"; 
              $NM_val_null[] = "ruang";
          } 
          $this->statusrm_before_qstr = $this->statusrm;
          $this->statusrm = substr($this->Db->qstr($this->statusrm), 1, -1); 
          if ($this->statusrm == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->statusrm = "null"; 
              $NM_val_null[] = "statusrm";
          } 
          $this->sep_before_qstr = $this->sep;
          $this->sep = substr($this->Db->qstr($this->sep), 1, -1); 
          if ($this->sep == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sep = "null"; 
              $NM_val_null[] = "sep";
          } 
          $this->caracode_before_qstr = $this->caracode;
          $this->caracode = substr($this->Db->qstr($this->caracode), 1, -1); 
          if ($this->caracode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->caracode = "null"; 
              $NM_val_null[] = "caracode";
          } 
          $this->regtype_before_qstr = $this->regtype;
          $this->regtype = substr($this->Db->qstr($this->regtype), 1, -1); 
          if ($this->regtype == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->regtype = "null"; 
              $NM_val_null[] = "regtype";
          } 
          $this->asalrujukan_before_qstr = $this->asalrujukan;
          $this->asalrujukan = substr($this->Db->qstr($this->asalrujukan), 1, -1); 
          if ($this->asalrujukan == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->asalrujukan = "null"; 
              $NM_val_null[] = "asalrujukan";
          } 
          $this->asalcode_before_qstr = $this->asalcode;
          $this->asalcode = substr($this->Db->qstr($this->asalcode), 1, -1); 
          if ($this->asalcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->asalcode = "null"; 
              $NM_val_null[] = "asalcode";
          } 
          $this->admission_before_qstr = $this->admission;
          $this->admission = substr($this->Db->qstr($this->admission), 1, -1); 
          if ($this->admission == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->admission = "null"; 
              $NM_val_null[] = "admission";
          } 
          $this->detailadm_before_qstr = $this->detailadm;
          $this->detailadm = substr($this->Db->qstr($this->detailadm), 1, -1); 
          if ($this->detailadm == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detailadm = "null"; 
              $NM_val_null[] = "detailadm";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['foreign_key'] as $sFKName => $sFKValue)
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
                 form_tbantrian_pack_ajax_response();
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
                  $SC_fields_update[] = "custCode = '$this->custcode', poly = '$this->poly', doctor = '$this->doctor', queue = $this->queue, regDate = #$this->regdate#, regTime = '$this->regtime', struckNo = '$this->struckno', status = '$this->status', hta = #$this->hta#, inst = '$this->inst', jenis = '$this->jenis', bayar = '$this->bayar', instCode = '$this->instcode', instNo = '$this->instno', instExpiry = #$this->instexpiry#, admission = '$this->admission'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', poly = '$this->poly', doctor = '$this->doctor', queue = $this->queue, regDate = " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", regTime = '$this->regtime', struckNo = '$this->struckno', status = '$this->status', hta = " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", inst = '$this->inst', jenis = '$this->jenis', bayar = '$this->bayar', instCode = '$this->instcode', instNo = '$this->instno', instExpiry = " . $this->Ini->date_delim . $this->instexpiry . $this->Ini->date_delim1 . ", admission = '$this->admission'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', poly = '$this->poly', doctor = '$this->doctor', queue = $this->queue, regDate = " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", regTime = '$this->regtime', struckNo = '$this->struckno', status = '$this->status', hta = " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", inst = '$this->inst', jenis = '$this->jenis', bayar = '$this->bayar', instCode = '$this->instcode', instNo = '$this->instno', instExpiry = " . $this->Ini->date_delim . $this->instexpiry . $this->Ini->date_delim1 . ", admission = '$this->admission'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', poly = '$this->poly', doctor = '$this->doctor', queue = $this->queue, regDate = EXTEND('$this->regdate', YEAR TO FRACTION), regTime = '$this->regtime', struckNo = '$this->struckno', status = '$this->status', hta = EXTEND('$this->hta', YEAR TO FRACTION), inst = '$this->inst', jenis = '$this->jenis', bayar = '$this->bayar', instCode = '$this->instcode', instNo = '$this->instno', instExpiry = EXTEND('$this->instexpiry', YEAR TO FRACTION), admission = '$this->admission'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', poly = '$this->poly', doctor = '$this->doctor', queue = $this->queue, regDate = " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", regTime = '$this->regtime', struckNo = '$this->struckno', status = '$this->status', hta = " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", inst = '$this->inst', jenis = '$this->jenis', bayar = '$this->bayar', instCode = '$this->instcode', instNo = '$this->instno', instExpiry = " . $this->Ini->date_delim . $this->instexpiry . $this->Ini->date_delim1 . ", admission = '$this->admission'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', poly = '$this->poly', doctor = '$this->doctor', queue = $this->queue, regDate = " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", regTime = '$this->regtime', struckNo = '$this->struckno', status = '$this->status', hta = " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", inst = '$this->inst', jenis = '$this->jenis', bayar = '$this->bayar', instCode = '$this->instcode', instNo = '$this->instno', instExpiry = " . $this->Ini->date_delim . $this->instexpiry . $this->Ini->date_delim1 . ", admission = '$this->admission'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', poly = '$this->poly', doctor = '$this->doctor', queue = $this->queue, regDate = " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", regTime = '$this->regtime', struckNo = '$this->struckno', status = '$this->status', hta = " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", inst = '$this->inst', jenis = '$this->jenis', bayar = '$this->bayar', instCode = '$this->instcode', instNo = '$this->instno', instExpiry = " . $this->Ini->date_delim . $this->instexpiry . $this->Ini->date_delim1 . ", admission = '$this->admission'"; 
              } 
              if (isset($NM_val_form['handled']) && $NM_val_form['handled'] != $this->nmgp_dados_select['handled']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "handled = #$this->handled#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "handled = EXTEND('" . $this->handled . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "handled = " . $this->Ini->date_delim . $this->handled . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['viaphone']) && $NM_val_form['viaphone'] != $this->nmgp_dados_select['viaphone']) 
              { 
                  $SC_fields_update[] = "viaPhone = $this->viaphone"; 
              } 
              if (isset($NM_val_form['note']) && $NM_val_form['note'] != $this->nmgp_dados_select['note']) 
              { 
                  $SC_fields_update[] = "note = '$this->note'"; 
              } 
              if (isset($NM_val_form['member']) && $NM_val_form['member'] != $this->nmgp_dados_select['member']) 
              { 
                  $SC_fields_update[] = "member = '$this->member'"; 
              } 
              if (isset($NM_val_form['tlc']) && $NM_val_form['tlc'] != $this->nmgp_dados_select['tlc']) 
              { 
                  $SC_fields_update[] = "tlc = '$this->tlc'"; 
              } 
              if (isset($NM_val_form['paid']) && $NM_val_form['paid'] != $this->nmgp_dados_select['paid']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "paid = #$this->paid#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "paid = EXTEND('" . $this->paid . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "paid = " . $this->Ini->date_delim . $this->paid . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['custtlc']) && $NM_val_form['custtlc'] != $this->nmgp_dados_select['custtlc']) 
              { 
                  $SC_fields_update[] = "custTlc = '$this->custtlc'"; 
              } 
              if (isset($NM_val_form['shift']) && $NM_val_form['shift'] != $this->nmgp_dados_select['shift']) 
              { 
                  $SC_fields_update[] = "shift = '$this->shift'"; 
              } 
              if (isset($NM_val_form['bu']) && $NM_val_form['bu'] != $this->nmgp_dados_select['bu']) 
              { 
                  $SC_fields_update[] = "bu = '$this->bu'"; 
              } 
              if (isset($NM_val_form['bucode']) && $NM_val_form['bucode'] != $this->nmgp_dados_select['bucode']) 
              { 
                  $SC_fields_update[] = "buCode = '$this->bucode'"; 
              } 
              if (isset($NM_val_form['ruang']) && $NM_val_form['ruang'] != $this->nmgp_dados_select['ruang']) 
              { 
                  $SC_fields_update[] = "ruang = '$this->ruang'"; 
              } 
              if (isset($NM_val_form['statusrm']) && $NM_val_form['statusrm'] != $this->nmgp_dados_select['statusrm']) 
              { 
                  $SC_fields_update[] = "statusRm = '$this->statusrm'"; 
              } 
              if (isset($NM_val_form['sep']) && $NM_val_form['sep'] != $this->nmgp_dados_select['sep']) 
              { 
                  $SC_fields_update[] = "sep = '$this->sep'"; 
              } 
              if (isset($NM_val_form['caracode']) && $NM_val_form['caracode'] != $this->nmgp_dados_select['caracode']) 
              { 
                  $SC_fields_update[] = "caraCode = '$this->caracode'"; 
              } 
              if (isset($NM_val_form['regtype']) && $NM_val_form['regtype'] != $this->nmgp_dados_select['regtype']) 
              { 
                  $SC_fields_update[] = "regType = '$this->regtype'"; 
              } 
              if (isset($NM_val_form['asalrujukan']) && $NM_val_form['asalrujukan'] != $this->nmgp_dados_select['asalrujukan']) 
              { 
                  $SC_fields_update[] = "asalRujukan = '$this->asalrujukan'"; 
              } 
              if (isset($NM_val_form['asalcode']) && $NM_val_form['asalcode'] != $this->nmgp_dados_select['asalcode']) 
              { 
                  $SC_fields_update[] = "asalCode = '$this->asalcode'"; 
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
                                  form_tbantrian_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->custcode = $this->custcode_before_qstr;
              $this->poly = $this->poly_before_qstr;
              $this->doctor = $this->doctor_before_qstr;
              $this->regtime = $this->regtime_before_qstr;
              $this->struckno = $this->struckno_before_qstr;
              $this->status = $this->status_before_qstr;
              $this->note = $this->note_before_qstr;
              $this->inst = $this->inst_before_qstr;
              $this->jenis = $this->jenis_before_qstr;
              $this->bayar = $this->bayar_before_qstr;
              $this->instcode = $this->instcode_before_qstr;
              $this->member = $this->member_before_qstr;
              $this->tlc = $this->tlc_before_qstr;
              $this->instno = $this->instno_before_qstr;
              $this->custtlc = $this->custtlc_before_qstr;
              $this->shift = $this->shift_before_qstr;
              $this->bu = $this->bu_before_qstr;
              $this->bucode = $this->bucode_before_qstr;
              $this->ruang = $this->ruang_before_qstr;
              $this->statusrm = $this->statusrm_before_qstr;
              $this->sep = $this->sep_before_qstr;
              $this->caracode = $this->caracode_before_qstr;
              $this->regtype = $this->regtype_before_qstr;
              $this->asalrujukan = $this->asalrujukan_before_qstr;
              $this->asalcode = $this->asalcode_before_qstr;
              $this->admission = $this->admission_before_qstr;
              $this->detailadm = $this->detailadm_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['custcode'])) { $this->custcode = $NM_val_form['custcode']; }
              elseif (isset($this->custcode)) { $this->nm_limpa_alfa($this->custcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['poly'])) { $this->poly = $NM_val_form['poly']; }
              elseif (isset($this->poly)) { $this->nm_limpa_alfa($this->poly); }
              if     (isset($NM_val_form) && isset($NM_val_form['doctor'])) { $this->doctor = $NM_val_form['doctor']; }
              elseif (isset($this->doctor)) { $this->nm_limpa_alfa($this->doctor); }
              if     (isset($NM_val_form) && isset($NM_val_form['queue'])) { $this->queue = $NM_val_form['queue']; }
              elseif (isset($this->queue)) { $this->nm_limpa_alfa($this->queue); }
              if     (isset($NM_val_form) && isset($NM_val_form['regtime'])) { $this->regtime = $NM_val_form['regtime']; }
              elseif (isset($this->regtime)) { $this->nm_limpa_alfa($this->regtime); }
              if     (isset($NM_val_form) && isset($NM_val_form['struckno'])) { $this->struckno = $NM_val_form['struckno']; }
              elseif (isset($this->struckno)) { $this->nm_limpa_alfa($this->struckno); }
              if     (isset($NM_val_form) && isset($NM_val_form['status'])) { $this->status = $NM_val_form['status']; }
              elseif (isset($this->status)) { $this->nm_limpa_alfa($this->status); }
              if     (isset($NM_val_form) && isset($NM_val_form['viaphone'])) { $this->viaphone = $NM_val_form['viaphone']; }
              elseif (isset($this->viaphone)) { $this->nm_limpa_alfa($this->viaphone); }
              if     (isset($NM_val_form) && isset($NM_val_form['inst'])) { $this->inst = $NM_val_form['inst']; }
              elseif (isset($this->inst)) { $this->nm_limpa_alfa($this->inst); }
              if     (isset($NM_val_form) && isset($NM_val_form['jenis'])) { $this->jenis = $NM_val_form['jenis']; }
              elseif (isset($this->jenis)) { $this->nm_limpa_alfa($this->jenis); }
              if     (isset($NM_val_form) && isset($NM_val_form['bayar'])) { $this->bayar = $NM_val_form['bayar']; }
              elseif (isset($this->bayar)) { $this->nm_limpa_alfa($this->bayar); }
              if     (isset($NM_val_form) && isset($NM_val_form['instcode'])) { $this->instcode = $NM_val_form['instcode']; }
              elseif (isset($this->instcode)) { $this->nm_limpa_alfa($this->instcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['instno'])) { $this->instno = $NM_val_form['instno']; }
              elseif (isset($this->instno)) { $this->nm_limpa_alfa($this->instno); }
              if     (isset($NM_val_form) && isset($NM_val_form['admission'])) { $this->admission = $NM_val_form['admission']; }
              elseif (isset($this->admission)) { $this->nm_limpa_alfa($this->admission); }
              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['detailadm'])) { $this->detailadm = $NM_val_form['detailadm']; }
              elseif (isset($this->detailadm)) { $this->nm_limpa_alfa($this->detailadm); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('poly', 'doctor', 'regdate', 'viaphone', 'regtime', 'queue', 'custcode', 'nama', 'status', 'alamat', 'sc_field_2', 'sc_field_1', 'usia', 'sc_field_0', 'jenis', 'bayar', 'instno', 'instexpiry', 'inst', 'instcode', 'hta', 'tp', 'uk', 'struckno', 'detailadm', 'admission', 'id'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['foreign_key'] as $sFKName => $sFKValue)
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_tbantrian_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (custCode, poly, doctor, queue, regDate, regTime, struckNo, status, hta, handled, viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, instExpiry, paid, custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission) VALUES ('$this->custcode', '$this->poly', '$this->doctor', $this->queue, #$this->regdate#, '$this->regtime', '$this->struckno', '$this->status', #$this->hta#, #$this->handled#, $this->viaphone, '$this->note', '$this->inst', '$this->jenis', '$this->bayar', '$this->instcode', '$this->member', '$this->tlc', '$this->instno', #$this->instexpiry#, #$this->paid#, '$this->custtlc', '$this->shift', '$this->bu', '$this->bucode', '$this->ruang', '$this->statusrm', '$this->sep', '$this->caracode', '$this->regtype', '$this->asalrujukan', '$this->asalcode', '$this->admission')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, poly, doctor, queue, regDate, regTime, struckNo, status, hta, handled, viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, instExpiry, paid, custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->poly', '$this->doctor', $this->queue, " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", '$this->regtime', '$this->struckno', '$this->status', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->handled . $this->Ini->date_delim1 . ", $this->viaphone, '$this->note', '$this->inst', '$this->jenis', '$this->bayar', '$this->instcode', '$this->member', '$this->tlc', '$this->instno', " . $this->Ini->date_delim . $this->instexpiry . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->paid . $this->Ini->date_delim1 . ", '$this->custtlc', '$this->shift', '$this->bu', '$this->bucode', '$this->ruang', '$this->statusrm', '$this->sep', '$this->caracode', '$this->regtype', '$this->asalrujukan', '$this->asalcode', '$this->admission')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, poly, doctor, queue, regDate, regTime, struckNo, status, hta, handled, viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, instExpiry, paid, custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->poly', '$this->doctor', $this->queue, " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", '$this->regtime', '$this->struckno', '$this->status', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->handled . $this->Ini->date_delim1 . ", $this->viaphone, '$this->note', '$this->inst', '$this->jenis', '$this->bayar', '$this->instcode', '$this->member', '$this->tlc', '$this->instno', " . $this->Ini->date_delim . $this->instexpiry . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->paid . $this->Ini->date_delim1 . ", '$this->custtlc', '$this->shift', '$this->bu', '$this->bucode', '$this->ruang', '$this->statusrm', '$this->sep', '$this->caracode', '$this->regtype', '$this->asalrujukan', '$this->asalcode', '$this->admission')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, poly, doctor, queue, regDate, regTime, struckNo, status, hta, handled, viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, instExpiry, paid, custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->poly', '$this->doctor', $this->queue, " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", '$this->regtime', '$this->struckno', '$this->status', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->handled . $this->Ini->date_delim1 . ", $this->viaphone, '$this->note', '$this->inst', '$this->jenis', '$this->bayar', '$this->instcode', '$this->member', '$this->tlc', '$this->instno', " . $this->Ini->date_delim . $this->instexpiry . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->paid . $this->Ini->date_delim1 . ", '$this->custtlc', '$this->shift', '$this->bu', '$this->bucode', '$this->ruang', '$this->statusrm', '$this->sep', '$this->caracode', '$this->regtype', '$this->asalrujukan', '$this->asalcode', '$this->admission')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, poly, doctor, queue, regDate, regTime, struckNo, status, hta, handled, viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, instExpiry, paid, custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->poly', '$this->doctor', $this->queue, EXTEND('$this->regdate', YEAR TO FRACTION), '$this->regtime', '$this->struckno', '$this->status', EXTEND('$this->hta', YEAR TO FRACTION), EXTEND('$this->handled', YEAR TO FRACTION), $this->viaphone, '$this->note', '$this->inst', '$this->jenis', '$this->bayar', '$this->instcode', '$this->member', '$this->tlc', '$this->instno', EXTEND('$this->instexpiry', YEAR TO FRACTION), EXTEND('$this->paid', YEAR TO FRACTION), '$this->custtlc', '$this->shift', '$this->bu', '$this->bucode', '$this->ruang', '$this->statusrm', '$this->sep', '$this->caracode', '$this->regtype', '$this->asalrujukan', '$this->asalcode', '$this->admission')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, poly, doctor, queue, regDate, regTime, struckNo, status, hta, handled, viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, instExpiry, paid, custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->poly', '$this->doctor', $this->queue, " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", '$this->regtime', '$this->struckno', '$this->status', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->handled . $this->Ini->date_delim1 . ", $this->viaphone, '$this->note', '$this->inst', '$this->jenis', '$this->bayar', '$this->instcode', '$this->member', '$this->tlc', '$this->instno', " . $this->Ini->date_delim . $this->instexpiry . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->paid . $this->Ini->date_delim1 . ", '$this->custtlc', '$this->shift', '$this->bu', '$this->bucode', '$this->ruang', '$this->statusrm', '$this->sep', '$this->caracode', '$this->regtype', '$this->asalrujukan', '$this->asalcode', '$this->admission')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, poly, doctor, queue, regDate, regTime, struckNo, status, hta, handled, viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, instExpiry, paid, custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->poly', '$this->doctor', $this->queue, " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", '$this->regtime', '$this->struckno', '$this->status', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->handled . $this->Ini->date_delim1 . ", $this->viaphone, '$this->note', '$this->inst', '$this->jenis', '$this->bayar', '$this->instcode', '$this->member', '$this->tlc', '$this->instno', " . $this->Ini->date_delim . $this->instexpiry . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->paid . $this->Ini->date_delim1 . ", '$this->custtlc', '$this->shift', '$this->bu', '$this->bucode', '$this->ruang', '$this->statusrm', '$this->sep', '$this->caracode', '$this->regtype', '$this->asalrujukan', '$this->asalcode', '$this->admission')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, poly, doctor, queue, regDate, regTime, struckNo, status, hta, handled, viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, instExpiry, paid, custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->poly', '$this->doctor', $this->queue, " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", '$this->regtime', '$this->struckno', '$this->status', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->handled . $this->Ini->date_delim1 . ", $this->viaphone, '$this->note', '$this->inst', '$this->jenis', '$this->bayar', '$this->instcode', '$this->member', '$this->tlc', '$this->instno', " . $this->Ini->date_delim . $this->instexpiry . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->paid . $this->Ini->date_delim1 . ", '$this->custtlc', '$this->shift', '$this->bu', '$this->bucode', '$this->ruang', '$this->statusrm', '$this->sep', '$this->caracode', '$this->regtype', '$this->asalrujukan', '$this->asalcode', '$this->admission')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, poly, doctor, queue, regDate, regTime, struckNo, status, hta, handled, viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, instExpiry, paid, custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->poly', '$this->doctor', $this->queue, " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", '$this->regtime', '$this->struckno', '$this->status', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->handled . $this->Ini->date_delim1 . ", $this->viaphone, '$this->note', '$this->inst', '$this->jenis', '$this->bayar', '$this->instcode', '$this->member', '$this->tlc', '$this->instno', " . $this->Ini->date_delim . $this->instexpiry . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->paid . $this->Ini->date_delim1 . ", '$this->custtlc', '$this->shift', '$this->bu', '$this->bucode', '$this->ruang', '$this->statusrm', '$this->sep', '$this->caracode', '$this->regtype', '$this->asalrujukan', '$this->asalcode', '$this->admission')"; 
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
                              form_tbantrian_pack_ajax_response();
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
                          form_tbantrian_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->custcode = $this->custcode_before_qstr;
              $this->poly = $this->poly_before_qstr;
              $this->doctor = $this->doctor_before_qstr;
              $this->regtime = $this->regtime_before_qstr;
              $this->struckno = $this->struckno_before_qstr;
              $this->status = $this->status_before_qstr;
              $this->note = $this->note_before_qstr;
              $this->inst = $this->inst_before_qstr;
              $this->jenis = $this->jenis_before_qstr;
              $this->bayar = $this->bayar_before_qstr;
              $this->instcode = $this->instcode_before_qstr;
              $this->member = $this->member_before_qstr;
              $this->tlc = $this->tlc_before_qstr;
              $this->instno = $this->instno_before_qstr;
              $this->custtlc = $this->custtlc_before_qstr;
              $this->shift = $this->shift_before_qstr;
              $this->bu = $this->bu_before_qstr;
              $this->bucode = $this->bucode_before_qstr;
              $this->ruang = $this->ruang_before_qstr;
              $this->statusrm = $this->statusrm_before_qstr;
              $this->sep = $this->sep_before_qstr;
              $this->caracode = $this->caracode_before_qstr;
              $this->regtype = $this->regtype_before_qstr;
              $this->asalrujukan = $this->asalrujukan_before_qstr;
              $this->asalcode = $this->asalcode_before_qstr;
              $this->admission = $this->admission_before_qstr;
              $this->detailadm = $this->detailadm_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['sc_btn_0'] = "on";
              $this->nmgp_botoes['sc_btn_1'] = "on";
              $this->nmgp_botoes['sc_btn_2'] = "on";
              $this->nmgp_botoes['sc_btn_3'] = "on";
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
              $sDetailWhere = "tranCode = '" . $this->struckno . "'";
              $this->form_detailadm->ini_controle();
              if ($this->form_detailadm->temRegistros($sDetailWhere))
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
                          form_tbantrian_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total']);
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
        $_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_jenis = $this->jenis;
}
  $datenow = date('Y-m-d H:i:s');

$check_sql = "SELECT biayaAdm, tarifAdm"
   . " FROM tbadministrasi"
   . " WHERE biayaAdm = 'PASIEN_BARU'";
 
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
	$pasienbaru = $this->rs[0][0];
    $tarifbaru = $this->rs[0][1];
	
$check_sql = "SELECT biayaAdm, tarifAdm"
   . " FROM tbadministrasi"
   . " WHERE biayaAdm = 'PASIEN_LAMA'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs2 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs2[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs2 = false;
          $this->rs2_erro = $this->Db->ErrorMsg();
      } 
;
	$pasienlama = $this->rs2[0][0];
    $tariflama = $this->rs2[0][1];

if ($this->jenis  == 'Pasien Baru'){
	$insert_table  = 'tbbilladm';      
	$insert_fields = array(   
		 'tranCode' => "'$this->struckno'",
		'namaAdm' => "'$pasienbaru'",
		'biaya' => "'$tarifbaru'",
		'tglAdm' => "'$datenow'",
		'diskon' => "0",
	 );

	$insert_sql2 = 'INSERT INTO ' . $insert_table
		. ' ('   . implode(', ', array_keys($insert_fields))   . ')'
		. ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';
	
	
     $nm_select = $insert_sql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_tbantrian_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
} else {
	$insert_table  = 'tbbilladm';      
	$insert_fields = array(   
		 'tranCode' => "'$this->struckno'",
		'namaAdm' => "'$pasienlama'",
		'biaya' => "'$tariflama'",
		'tglAdm' => "'$datenow'",
		'diskon' => "0",
	 );

	$insert_sql3 = 'INSERT INTO ' . $insert_table
		. ' ('   . implode(', ', array_keys($insert_fields))   . ')'
		. ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';
	
	
     $nm_select = $insert_sql3; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_tbantrian_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
}

$redir_app = 'cetak_antrian';
$redir_target = '_blank';
$redir_param = array('var_No_Struk' => $this->struckno );
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($redir_app, $this->nm_location, $redir_param, "$redir_target", "ret_self", 440, 630);
 };



$insert_table  = 'tbtracerrm';      
$insert_fields = array(   
     'noStruk' => "'$this->struckno'",
     'status' => "'0'",
	 'order_date' => "'$datenow'",
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
                form_tbantrian_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_jenis != $this->jenis || (isset($bFlagRead_jenis) && $bFlagRead_jenis)))
    {
        $this->ajax_return_values_jenis(true);
    }
}
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'off'; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = null === $this->id ? null : substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['iframe_evento'] = $this->sc_evento; 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_tbantrian = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total'] = $qt_geral_reg_form_tbantrian;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_tbantrian = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] > $qt_geral_reg_form_tbantrian)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] = $qt_geral_reg_form_tbantrian; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] = $qt_geral_reg_form_tbantrian; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_tbantrian) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT custCode, poly, doctor, queue, str_replace (convert(char(10),regDate,102), '.', '-') + ' ' + convert(char(8),regDate,20), regTime, struckNo, status, str_replace (convert(char(10),hta,102), '.', '-') + ' ' + convert(char(8),hta,20), str_replace (convert(char(10),handled,102), '.', '-') + ' ' + convert(char(8),handled,20), viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, str_replace (convert(char(10),instExpiry,102), '.', '-') + ' ' + convert(char(8),instExpiry,20), str_replace (convert(char(10),paid,102), '.', '-') + ' ' + convert(char(8),paid,20), custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission, id from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT custCode, poly, doctor, queue, convert(char(23),regDate,121), regTime, struckNo, status, convert(char(23),hta,121), convert(char(23),handled,121), viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, convert(char(23),instExpiry,121), convert(char(23),paid,121), custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission, id from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT custCode, poly, doctor, queue, regDate, regTime, struckNo, status, hta, handled, viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, instExpiry, paid, custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission, id from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT custCode, poly, doctor, queue, EXTEND(regDate, YEAR TO FRACTION), regTime, struckNo, status, EXTEND(hta, YEAR TO FRACTION), EXTEND(handled, YEAR TO FRACTION), viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, EXTEND(instExpiry, YEAR TO FRACTION), EXTEND(paid, YEAR TO FRACTION), custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission, id from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT custCode, poly, doctor, queue, regDate, regTime, struckNo, status, hta, handled, viaPhone, note, inst, jenis, bayar, instCode, member, tlc, instNo, instExpiry, paid, custTlc, shift, bu, buCode, ruang, statusRm, sep, caraCode, regType, asalRujukan, asalCode, admission, id from " . $this->Ini->nm_tabela ; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_1'] = $this->nmgp_botoes['sc_btn_1'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_2'] = $this->nmgp_botoes['sc_btn_2'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_3'] = $this->nmgp_botoes['sc_btn_3'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_1'] = $this->nmgp_botoes['sc_btn_1'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_2'] = $this->nmgp_botoes['sc_btn_2'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_3'] = $this->nmgp_botoes['sc_btn_3'] = "off";
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
              $this->custcode = $rs->fields[0] ; 
              $this->nmgp_dados_select['custcode'] = $this->custcode;
              $this->poly = $rs->fields[1] ; 
              $this->nmgp_dados_select['poly'] = $this->poly;
              $this->doctor = $rs->fields[2] ; 
              $this->nmgp_dados_select['doctor'] = $this->doctor;
              $this->queue = $rs->fields[3] ; 
              $this->nmgp_dados_select['queue'] = $this->queue;
              $this->regdate = $rs->fields[4] ; 
              if (substr($this->regdate, 10, 1) == "-") 
              { 
                 $this->regdate = substr($this->regdate, 0, 10) . " " . substr($this->regdate, 11);
              } 
              if (substr($this->regdate, 13, 1) == ".") 
              { 
                 $this->regdate = substr($this->regdate, 0, 13) . ":" . substr($this->regdate, 14, 2) . ":" . substr($this->regdate, 17);
              } 
              $this->nmgp_dados_select['regdate'] = $this->regdate;
              $this->regtime = $rs->fields[5] ; 
              $this->nmgp_dados_select['regtime'] = $this->regtime;
              $this->struckno = $rs->fields[6] ; 
              $this->nmgp_dados_select['struckno'] = $this->struckno;
              $this->status = $rs->fields[7] ; 
              $this->nmgp_dados_select['status'] = $this->status;
              $this->hta = $rs->fields[8] ; 
              if (substr($this->hta, 10, 1) == "-") 
              { 
                 $this->hta = substr($this->hta, 0, 10) . " " . substr($this->hta, 11);
              } 
              if (substr($this->hta, 13, 1) == ".") 
              { 
                 $this->hta = substr($this->hta, 0, 13) . ":" . substr($this->hta, 14, 2) . ":" . substr($this->hta, 17);
              } 
              $this->nmgp_dados_select['hta'] = $this->hta;
              $this->handled = $rs->fields[9] ; 
              if (substr($this->handled, 10, 1) == "-") 
              { 
                 $this->handled = substr($this->handled, 0, 10) . " " . substr($this->handled, 11);
              } 
              if (substr($this->handled, 13, 1) == ".") 
              { 
                 $this->handled = substr($this->handled, 0, 13) . ":" . substr($this->handled, 14, 2) . ":" . substr($this->handled, 17);
              } 
              $this->nmgp_dados_select['handled'] = $this->handled;
              $this->viaphone = $rs->fields[10] ; 
              $this->nmgp_dados_select['viaphone'] = $this->viaphone;
              $this->note = $rs->fields[11] ; 
              $this->nmgp_dados_select['note'] = $this->note;
              $this->inst = $rs->fields[12] ; 
              $this->nmgp_dados_select['inst'] = $this->inst;
              $this->jenis = $rs->fields[13] ; 
              $this->nmgp_dados_select['jenis'] = $this->jenis;
              $this->bayar = $rs->fields[14] ; 
              $this->nmgp_dados_select['bayar'] = $this->bayar;
              $this->instcode = $rs->fields[15] ; 
              $this->nmgp_dados_select['instcode'] = $this->instcode;
              $this->member = $rs->fields[16] ; 
              $this->nmgp_dados_select['member'] = $this->member;
              $this->tlc = $rs->fields[17] ; 
              $this->nmgp_dados_select['tlc'] = $this->tlc;
              $this->instno = $rs->fields[18] ; 
              $this->nmgp_dados_select['instno'] = $this->instno;
              $this->instexpiry = $rs->fields[19] ; 
              if (substr($this->instexpiry, 10, 1) == "-") 
              { 
                 $this->instexpiry = substr($this->instexpiry, 0, 10) . " " . substr($this->instexpiry, 11);
              } 
              if (substr($this->instexpiry, 13, 1) == ".") 
              { 
                 $this->instexpiry = substr($this->instexpiry, 0, 13) . ":" . substr($this->instexpiry, 14, 2) . ":" . substr($this->instexpiry, 17);
              } 
              $this->nmgp_dados_select['instexpiry'] = $this->instexpiry;
              $this->paid = $rs->fields[20] ; 
              if (substr($this->paid, 10, 1) == "-") 
              { 
                 $this->paid = substr($this->paid, 0, 10) . " " . substr($this->paid, 11);
              } 
              if (substr($this->paid, 13, 1) == ".") 
              { 
                 $this->paid = substr($this->paid, 0, 13) . ":" . substr($this->paid, 14, 2) . ":" . substr($this->paid, 17);
              } 
              $this->nmgp_dados_select['paid'] = $this->paid;
              $this->custtlc = $rs->fields[21] ; 
              $this->nmgp_dados_select['custtlc'] = $this->custtlc;
              $this->shift = $rs->fields[22] ; 
              $this->nmgp_dados_select['shift'] = $this->shift;
              $this->bu = $rs->fields[23] ; 
              $this->nmgp_dados_select['bu'] = $this->bu;
              $this->bucode = $rs->fields[24] ; 
              $this->nmgp_dados_select['bucode'] = $this->bucode;
              $this->ruang = $rs->fields[25] ; 
              $this->nmgp_dados_select['ruang'] = $this->ruang;
              $this->statusrm = $rs->fields[26] ; 
              $this->nmgp_dados_select['statusrm'] = $this->statusrm;
              $this->sep = $rs->fields[27] ; 
              $this->nmgp_dados_select['sep'] = $this->sep;
              $this->caracode = $rs->fields[28] ; 
              $this->nmgp_dados_select['caracode'] = $this->caracode;
              $this->regtype = $rs->fields[29] ; 
              $this->nmgp_dados_select['regtype'] = $this->regtype;
              $this->asalrujukan = $rs->fields[30] ; 
              $this->nmgp_dados_select['asalrujukan'] = $this->asalrujukan;
              $this->asalcode = $rs->fields[31] ; 
              $this->nmgp_dados_select['asalcode'] = $this->asalcode;
              $this->admission = $rs->fields[32] ; 
              $this->nmgp_dados_select['admission'] = $this->admission;
              $this->id = $rs->fields[33] ; 
              $this->nmgp_dados_select['id'] = $this->id;
              $this->detailadm = $rs->fields[34] ; 
              $this->nmgp_dados_select['detailadm'] = $this->detailadm;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->queue = (string)$this->queue; 
              $this->viaphone = (string)$this->viaphone; 
              $this->id = (string)$this->id; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['parms'] = "id?#?$this->id?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] < $qt_geral_reg_form_tbantrian;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opcao']   = '';
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
              $this->custcode = "";  
              $this->nmgp_dados_form["custcode"] = $this->custcode;
              $this->poly = "";  
              $this->nmgp_dados_form["poly"] = $this->poly;
              $this->doctor = "";  
              $this->nmgp_dados_form["doctor"] = $this->doctor;
              $this->queue = "";  
              $this->nmgp_dados_form["queue"] = $this->queue;
              $this->regdate = "";  
              $this->regdate_hora = "" ;  
              $this->nmgp_dados_form["regdate"] = $this->regdate;
              $this->regtime = "";  
              $this->nmgp_dados_form["regtime"] = $this->regtime;
              $this->struckno = "";  
              $this->nmgp_dados_form["struckno"] = $this->struckno;
              $this->status = "";  
              $this->nmgp_dados_form["status"] = $this->status;
              $this->hta = "";  
              $this->hta_hora = "" ;  
              $this->nmgp_dados_form["hta"] = $this->hta;
              $this->handled = "";  
              $this->handled_hora = "" ;  
              $this->nmgp_dados_form["handled"] = $this->handled;
              $this->viaphone = "";  
              $this->nmgp_dados_form["viaphone"] = $this->viaphone;
              $this->note = "";  
              $this->nmgp_dados_form["note"] = $this->note;
              $this->inst = "";  
              $this->nmgp_dados_form["inst"] = $this->inst;
              $this->jenis = "";  
              $this->nmgp_dados_form["jenis"] = $this->jenis;
              $this->bayar = "";  
              $this->nmgp_dados_form["bayar"] = $this->bayar;
              $this->instcode = "";  
              $this->nmgp_dados_form["instcode"] = $this->instcode;
              $this->member = "";  
              $this->nmgp_dados_form["member"] = $this->member;
              $this->tlc = "";  
              $this->nmgp_dados_form["tlc"] = $this->tlc;
              $this->instno = "";  
              $this->nmgp_dados_form["instno"] = $this->instno;
              $this->instexpiry = "";  
              $this->instexpiry_hora = "" ;  
              $this->nmgp_dados_form["instexpiry"] = $this->instexpiry;
              $this->paid = "";  
              $this->paid_hora = "" ;  
              $this->nmgp_dados_form["paid"] = $this->paid;
              $this->custtlc = "";  
              $this->nmgp_dados_form["custtlc"] = $this->custtlc;
              $this->shift = "";  
              $this->nmgp_dados_form["shift"] = $this->shift;
              $this->bu = "";  
              $this->nmgp_dados_form["bu"] = $this->bu;
              $this->bucode = "";  
              $this->nmgp_dados_form["bucode"] = $this->bucode;
              $this->ruang = "";  
              $this->nmgp_dados_form["ruang"] = $this->ruang;
              $this->statusrm = "";  
              $this->nmgp_dados_form["statusrm"] = $this->statusrm;
              $this->sep = "";  
              $this->nmgp_dados_form["sep"] = $this->sep;
              $this->caracode = "";  
              $this->nmgp_dados_form["caracode"] = $this->caracode;
              $this->regtype = "";  
              $this->nmgp_dados_form["regtype"] = $this->regtype;
              $this->asalrujukan = "";  
              $this->nmgp_dados_form["asalrujukan"] = $this->asalrujukan;
              $this->asalcode = "";  
              $this->nmgp_dados_form["asalcode"] = $this->asalcode;
              $this->admission = "";  
              $this->nmgp_dados_form["admission"] = $this->admission;
              $this->id = "";  
              $this->nmgp_dados_form["id"] = $this->id;
              $this->alamat = "";  
              $this->nmgp_dados_form["alamat"] = $this->alamat;
              $this->sc_field_0 = "";  
              $this->nmgp_dados_form["sc_field_0"] = $this->sc_field_0;
              $this->nama = "";  
              $this->nmgp_dados_form["nama"] = $this->nama;
              $this->tp = "";  
              $this->nmgp_dados_form["tp"] = $this->tp;
              $this->sc_field_1 = "";  
              $this->nmgp_dados_form["sc_field_1"] = $this->sc_field_1;
              $this->sc_field_2 = "";  
              $this->nmgp_dados_form["sc_field_2"] = $this->sc_field_2;
              $this->uk = "";  
              $this->nmgp_dados_form["uk"] = $this->uk;
              $this->usia = "";  
              $this->nmgp_dados_form["usia"] = $this->usia;
              $this->detailadm = "";  
              $this->nmgp_dados_form["detailadm"] = $this->detailadm;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['form_detailadm_script_case_init'] ]['form_detailadm']['embutida_parms'] = "NM_btn_insert*scinN*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scout";
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
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter']))
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
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['reg_start'] + 1;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function bayar_onChange()
{
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'on';
  
$original_bayar = $this->bayar;
$original_inst = $this->inst;
$original_instcode = $this->instcode;
$original_instno = $this->instno;
$original_instexpiry = $this->instexpiry;
$original_custcode = $this->custcode;

if ($this->bayar  == 'ASURANSI') 
{
$this->nmgp_cmp_hidden["inst"] = "on"; $this->NM_ajax_info['fieldDisplay']['inst'] = 'on';
$this->nmgp_cmp_hidden["instcode"] = "on"; $this->NM_ajax_info['fieldDisplay']['instcode'] = 'on';
$this->inst  = '';
$this->instcode  = '';
$this->nmgp_cmp_hidden["instno"] = "on"; $this->NM_ajax_info['fieldDisplay']['instno'] = 'on';
$this->nmgp_cmp_hidden["instexpiry"] = "on"; $this->NM_ajax_info['fieldDisplay']['instexpiry'] = 'on';
}
elseif($this->bayar  == 'BPJS') 
{
$this->nmgp_cmp_hidden["inst"] = "on"; $this->NM_ajax_info['fieldDisplay']['inst'] = 'on';
$this->nmgp_cmp_hidden["instcode"] = "on"; $this->NM_ajax_info['fieldDisplay']['instcode'] = 'on';
$this->inst  = 'BPJS';
$this->instcode  = 'INS171001';
$this->nmgp_cmp_hidden["instno"] = "on"; $this->NM_ajax_info['fieldDisplay']['instno'] = 'on';
$this->nmgp_cmp_hidden["instexpiry"] = "on"; $this->NM_ajax_info['fieldDisplay']['instexpiry'] = 'on';
}
elseif($this->bayar  == 'COB') 
{
$this->nmgp_cmp_hidden["inst"] = "on"; $this->NM_ajax_info['fieldDisplay']['inst'] = 'on';
$this->nmgp_cmp_hidden["instcode"] = "on"; $this->NM_ajax_info['fieldDisplay']['instcode'] = 'on';
$this->nmgp_cmp_hidden["instno"] = "on"; $this->NM_ajax_info['fieldDisplay']['instno'] = 'on';
$this->nmgp_cmp_hidden["instexpiry"] = "on"; $this->NM_ajax_info['fieldDisplay']['instexpiry'] = 'on';
}
elseif($this->bayar  == 'TUNAI') 
{
$this->nmgp_cmp_hidden["inst"] = "off"; $this->NM_ajax_info['fieldDisplay']['inst'] = 'off';
$this->inst  = 'PRIBADI';
$this->nmgp_cmp_hidden["instcode"] = "off"; $this->NM_ajax_info['fieldDisplay']['instcode'] = 'off';
$this->instcode  = '--';
$this->nmgp_cmp_hidden["instno"] = "off"; $this->NM_ajax_info['fieldDisplay']['instno'] = 'off';
$this->nmgp_cmp_hidden["instexpiry"] = "off"; $this->NM_ajax_info['fieldDisplay']['instexpiry'] = 'off';
}
else if ($this->bayar  == 'JAMPERU') 
{
$this->nmgp_cmp_hidden["inst"] = "on"; $this->NM_ajax_info['fieldDisplay']['inst'] = 'on';
$this->nmgp_cmp_hidden["instcode"] = "on"; $this->NM_ajax_info['fieldDisplay']['instcode'] = 'on';
$this->inst  = '';
$this->instcode  = '';
}
else 
{
$this->nmgp_cmp_hidden["inst"] = "off"; $this->NM_ajax_info['fieldDisplay']['inst'] = 'off';
$this->nmgp_cmp_hidden["instcode"] = "off"; $this->NM_ajax_info['fieldDisplay']['instcode'] = 'off';
$this->nmgp_cmp_hidden["instno"] = "off"; $this->NM_ajax_info['fieldDisplay']['instno'] = 'off';
$this->nmgp_cmp_hidden["instexpiry"] = "off"; $this->NM_ajax_info['fieldDisplay']['instexpiry'] = 'off';
}

$check_sql = "SELECT instNo"
   . " FROM tbantrian"
   . " WHERE custCode = '".$this->custcode ."' AND bayar = 'BPJS'";
 
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
    $this->instno  = $this->rs[0][0];
}
		else     
{
	$this->instno  = '';
}


$modificado_bayar = $this->bayar;
$modificado_inst = $this->inst;
$modificado_instcode = $this->instcode;
$modificado_instno = $this->instno;
$modificado_instexpiry = $this->instexpiry;
$modificado_custcode = $this->custcode;
$this->nm_formatar_campos('bayar', 'inst', 'instcode', 'instno', 'instexpiry', 'custcode');
if ($original_bayar !== $modificado_bayar || isset($this->nmgp_cmp_readonly['bayar']) || (isset($bFlagRead_bayar) && $bFlagRead_bayar))
{
    $this->ajax_return_values_bayar(true);
}
if ($original_inst !== $modificado_inst || isset($this->nmgp_cmp_readonly['inst']) || (isset($bFlagRead_inst) && $bFlagRead_inst))
{
    $this->ajax_return_values_inst(true);
}
if ($original_instcode !== $modificado_instcode || isset($this->nmgp_cmp_readonly['instcode']) || (isset($bFlagRead_instcode) && $bFlagRead_instcode))
{
    $this->ajax_return_values_instcode(true);
}
if ($original_instno !== $modificado_instno || isset($this->nmgp_cmp_readonly['instno']) || (isset($bFlagRead_instno) && $bFlagRead_instno))
{
    $this->ajax_return_values_instno(true);
}
if ($original_instexpiry !== $modificado_instexpiry || isset($this->nmgp_cmp_readonly['instexpiry']) || (isset($bFlagRead_instexpiry) && $bFlagRead_instexpiry))
{
    $this->ajax_return_values_instexpiry(true);
}
if ($original_custcode !== $modificado_custcode || isset($this->nmgp_cmp_readonly['custcode']) || (isset($bFlagRead_custcode) && $bFlagRead_custcode))
{
    $this->ajax_return_values_custcode(true);
}
$this->NM_ajax_info['event_field'] = 'bayar';
form_tbantrian_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'off';
}
function custCode_onChange()
{
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'on';
  
$original_custcode = $this->custcode;
$original_jenis = $this->jenis;
$original_hta = $this->hta;
$original_uk = $this->uk;
$original_tp = $this->tp;
$original_usia = $this->usia;
$original_instno = $this->instno;
$original_instno = $this->instno;
$original_custcode = $this->custcode;



$check_sql = "SELECT date(registerDate), date(hta)"
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
    $pasienDaftar = $this->rs[0][0];
	$this->hta = $this->rs[0][1];
}
		else     
{
	$pasienDaftar = '';
	$this->hta = '';
}

$this->jenis  = '';
if ($pasienDaftar == date('Y-m-d'))
{
	$this->jenis  = 'Pasien Baru';
}else{
	$this->jenis  = 'Pasien Lama';
}

$this->hta  = $this->hta;

if(!empty($this->hta )){

$thn = date('Y', strtotime($this->hta ));
$bln = date('m', strtotime($this->hta ));
$tgl = date('d', strtotime($this->hta ));

$hpl = mktime(0, 0, 0, $bln + 9, $tgl + 7, $thn);

$this->tp = new DateTime(date("Y-m-d",$hpl));
$this->uk = new DateTime(date($this->hta ));
$td = new DateTime();
$umur = $td->diff($this->uk);
$this->uk  = ($umur->m)*4 . " MINGGU " . $umur->d . " HR";
$this->tp  = date("d M Y", $hpl);
}

	

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

$check_sql = "SELECT member"
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

if ($this->rs[0][0] == '' || $this->rs[0][0] == 'N')     
{
	$javascript_title   = 'Perhatian !';       
	$javascript_message = 'Pasien ini belum pernah cetak Kartu.';  

	$this->sc_ajax_message($javascript_message, $javascript_title);
}
		else     
{

}



$check_sql = "SELECT instNo"
   . " FROM tbantrian"
   . " WHERE custCode = '".$this->custcode ."' AND bayar = 'BPJS'";
 
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
    $this->instno  = $this->rs[0][0];
}
		else     
{
	$this->instno  = '';
}


$modificado_custcode = $this->custcode;
$modificado_jenis = $this->jenis;
$modificado_hta = $this->hta;
$modificado_uk = $this->uk;
$modificado_tp = $this->tp;
$modificado_usia = $this->usia;
$modificado_instno = $this->instno;
$modificado_instno = $this->instno;
$modificado_custcode = $this->custcode;
$this->nm_formatar_campos('custcode', 'jenis', 'hta', 'uk', 'tp', 'usia', 'instno');
if ($original_custcode !== $modificado_custcode || isset($this->nmgp_cmp_readonly['custcode']) || (isset($bFlagRead_custcode) && $bFlagRead_custcode))
{
    $this->ajax_return_values_custcode(true);
}
if ($original_jenis !== $modificado_jenis || isset($this->nmgp_cmp_readonly['jenis']) || (isset($bFlagRead_jenis) && $bFlagRead_jenis))
{
    $this->ajax_return_values_jenis(true);
}
if ($original_hta !== $modificado_hta || isset($this->nmgp_cmp_readonly['hta']) || (isset($bFlagRead_hta) && $bFlagRead_hta))
{
    $this->ajax_return_values_hta(true);
}
if ($original_uk !== $modificado_uk || isset($this->nmgp_cmp_readonly['uk']) || (isset($bFlagRead_uk) && $bFlagRead_uk))
{
    $this->ajax_return_values_uk(true);
}
if ($original_tp !== $modificado_tp || isset($this->nmgp_cmp_readonly['tp']) || (isset($bFlagRead_tp) && $bFlagRead_tp))
{
    $this->ajax_return_values_tp(true);
}
if ($original_usia !== $modificado_usia || isset($this->nmgp_cmp_readonly['usia']) || (isset($bFlagRead_usia) && $bFlagRead_usia))
{
    $this->ajax_return_values_usia(true);
}
if ($original_instno !== $modificado_instno || isset($this->nmgp_cmp_readonly['instno']) || (isset($bFlagRead_instno) && $bFlagRead_instno))
{
    $this->ajax_return_values_instno(true);
}
if ($original_instno !== $modificado_instno || isset($this->nmgp_cmp_readonly['instno']) || (isset($bFlagRead_instno) && $bFlagRead_instno))
{
    $this->ajax_return_values_instno(true);
}
if ($original_custcode !== $modificado_custcode || isset($this->nmgp_cmp_readonly['custcode']) || (isset($bFlagRead_custcode) && $bFlagRead_custcode))
{
    $this->ajax_return_values_custcode(true);
}
$this->NM_ajax_info['event_field'] = 'custCode';
form_tbantrian_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'off';
}
function doctor_onChange()
{
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'on';
  
$original_viaphone = $this->viaphone;
$original_regdate = $this->regdate;
$original_poly = $this->poly;
$original_doctor = $this->doctor;
$original_queue = $this->queue;
$original_doctor = $this->doctor;

$this->viaphone  = '0';

$date_reg = $this->regdate ;

if ($this->viaphone  == '1'){
	$check_sql = "SELECT max(queue)"
	   . " FROM tbantrian"
	   . " WHERE regDate = '" . $date_reg . "' and poly = '" . $this->poly  . "' and doctor = '" . $this->doctor  . "' and viaPhone = '1'";
	 
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
		$antrian_prior = $this->rs[0][0];
		$this->queue  = $antrian_prior +1;
	}
			else     
	{
		$this->queue  = '16';
	}
}else{
	$check_sql = "SELECT max(queue)"
	   . " FROM tbantrian"
	   . " WHERE regDate = '" . $date_reg . "'  and poly = '" . $this->poly  . "' and doctor = '" . $this->doctor  . "'and viaPhone = '0'";
	 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs2 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs2[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs2 = false;
          $this->rs2_erro = $this->Db->ErrorMsg();
      } 
;

	if (isset($this->rs2[0][0]))     
	{
		$antrian_non = $this->rs2[0][0];
		$this->queue  = $antrian_non +1;
	}
			else     
	{
		$this->queue  = '1';
	}
}


$modificado_viaphone = $this->viaphone;
$modificado_regdate = $this->regdate;
$modificado_poly = $this->poly;
$modificado_doctor = $this->doctor;
$modificado_queue = $this->queue;
$modificado_doctor = $this->doctor;
$this->nm_formatar_campos('viaphone', 'regdate', 'poly', 'doctor', 'queue');
if ($original_viaphone !== $modificado_viaphone || isset($this->nmgp_cmp_readonly['viaphone']) || (isset($bFlagRead_viaphone) && $bFlagRead_viaphone))
{
    $this->ajax_return_values_viaphone(true);
}
if ($original_regdate !== $modificado_regdate || isset($this->nmgp_cmp_readonly['regdate']) || (isset($bFlagRead_regdate) && $bFlagRead_regdate))
{
    $this->ajax_return_values_regdate(true);
}
if ($original_poly !== $modificado_poly || isset($this->nmgp_cmp_readonly['poly']) || (isset($bFlagRead_poly) && $bFlagRead_poly))
{
    $this->ajax_return_values_poly(true);
}
if ($original_doctor !== $modificado_doctor || isset($this->nmgp_cmp_readonly['doctor']) || (isset($bFlagRead_doctor) && $bFlagRead_doctor))
{
    $this->ajax_return_values_doctor(true);
}
if ($original_queue !== $modificado_queue || isset($this->nmgp_cmp_readonly['queue']) || (isset($bFlagRead_queue) && $bFlagRead_queue))
{
    $this->ajax_return_values_queue(true);
}
if ($original_doctor !== $modificado_doctor || isset($this->nmgp_cmp_readonly['doctor']) || (isset($bFlagRead_doctor) && $bFlagRead_doctor))
{
    $this->ajax_return_values_doctor(true);
}
$this->NM_ajax_info['event_field'] = 'doctor';
form_tbantrian_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'off';
}
function hta_onChange()
{
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'on';
  
$original_hta = $this->hta;
$original_uk = $this->uk;
$original_tp = $this->tp;
$original_hta = $this->hta;

$thn = date('Y', strtotime($this->hta ));
$bln = date('m', strtotime($this->hta ));
$tgl = date('d', strtotime($this->hta ));

$hpl = mktime(0, 0, 0, $bln + 9, $tgl + 7, $thn);

$this->tp = new DateTime(date("Y-m-d",$hpl));
$this->uk = new DateTime(date($this->hta ));
$td = new DateTime();
$umur = $td->diff($this->uk);
$this->uk  = ($umur->m)*4 . " MINGGU " . $umur->d . " HR";
$this->tp  = date("d M Y", $hpl);

$modificado_hta = $this->hta;
$modificado_uk = $this->uk;
$modificado_tp = $this->tp;
$modificado_hta = $this->hta;
$this->nm_formatar_campos('hta', 'uk', 'tp');
if ($original_hta !== $modificado_hta || isset($this->nmgp_cmp_readonly['hta']) || (isset($bFlagRead_hta) && $bFlagRead_hta))
{
    $this->ajax_return_values_hta(true);
}
if ($original_uk !== $modificado_uk || isset($this->nmgp_cmp_readonly['uk']) || (isset($bFlagRead_uk) && $bFlagRead_uk))
{
    $this->ajax_return_values_uk(true);
}
if ($original_tp !== $modificado_tp || isset($this->nmgp_cmp_readonly['tp']) || (isset($bFlagRead_tp) && $bFlagRead_tp))
{
    $this->ajax_return_values_tp(true);
}
if ($original_hta !== $modificado_hta || isset($this->nmgp_cmp_readonly['hta']) || (isset($bFlagRead_hta) && $bFlagRead_hta))
{
    $this->ajax_return_values_hta(true);
}
$this->NM_ajax_info['event_field'] = 'hta';
form_tbantrian_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'off';
}
function poly_onChange()
{
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'on';
  
$original_poly = $this->poly;
$original_hta = $this->hta;
$original_uk = $this->uk;
$original_tp = $this->tp;
$original_custcode = $this->custcode;

if ($this->poly  == 'POL003') 
{
$this->nmgp_cmp_hidden["hta"] = "on"; $this->NM_ajax_info['fieldDisplay']['hta'] = 'on';
$this->nmgp_cmp_hidden["uk"] = "on"; $this->NM_ajax_info['fieldDisplay']['uk'] = 'on';
$this->nmgp_cmp_hidden["tp"] = "on"; $this->NM_ajax_info['fieldDisplay']['tp'] = 'on';
}
else 
{
$this->nmgp_cmp_hidden["hta"] = "off"; $this->NM_ajax_info['fieldDisplay']['hta'] = 'off';
$this->nmgp_cmp_hidden["uk"] = "off"; $this->NM_ajax_info['fieldDisplay']['uk'] = 'off';
$this->nmgp_cmp_hidden["tp"] = "off"; $this->NM_ajax_info['fieldDisplay']['tp'] = 'off';
}


$modificado_poly = $this->poly;
$modificado_hta = $this->hta;
$modificado_uk = $this->uk;
$modificado_tp = $this->tp;
$modificado_custcode = $this->custcode;
$this->nm_formatar_campos('poly', 'hta', 'uk', 'tp');
if ($original_poly !== $modificado_poly || isset($this->nmgp_cmp_readonly['poly']) || (isset($bFlagRead_poly) && $bFlagRead_poly))
{
    $this->ajax_return_values_poly(true);
}
if ($original_hta !== $modificado_hta || isset($this->nmgp_cmp_readonly['hta']) || (isset($bFlagRead_hta) && $bFlagRead_hta))
{
    $this->ajax_return_values_hta(true);
}
if ($original_uk !== $modificado_uk || isset($this->nmgp_cmp_readonly['uk']) || (isset($bFlagRead_uk) && $bFlagRead_uk))
{
    $this->ajax_return_values_uk(true);
}
if ($original_tp !== $modificado_tp || isset($this->nmgp_cmp_readonly['tp']) || (isset($bFlagRead_tp) && $bFlagRead_tp))
{
    $this->ajax_return_values_tp(true);
}
if ($original_custcode !== $modificado_custcode || isset($this->nmgp_cmp_readonly['custcode']) || (isset($bFlagRead_custcode) && $bFlagRead_custcode))
{
    $this->ajax_return_values_custcode(true);
}
$this->NM_ajax_info['event_field'] = 'poly';
form_tbantrian_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'off';
}
function regDate_onChange()
{
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'on';
  
$original_regdate = $this->regdate;
$original_poly = $this->poly;
$original_doctor = $this->doctor;
$original_queue = $this->queue;
$original_viaphone = $this->viaphone;
$original_regdate = $this->regdate;

$check_sql = "SELECT max(queue)"
   . " FROM tbantrian"
   . " WHERE regDate = '" . $this->regdate  . "'  and poly = '" . $this->poly  . "' and doctor = '" . $this->doctor  . "'";
 
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
    $this->queue  = $this->rs[0][0]+'1';
}
		else     
{
	$this->queue  = '1';
}

$this->viaphone  = '0';


$modificado_regdate = $this->regdate;
$modificado_poly = $this->poly;
$modificado_doctor = $this->doctor;
$modificado_queue = $this->queue;
$modificado_viaphone = $this->viaphone;
$modificado_regdate = $this->regdate;
$this->nm_formatar_campos('regdate', 'poly', 'doctor', 'queue', 'viaphone');
if ($original_regdate !== $modificado_regdate || isset($this->nmgp_cmp_readonly['regdate']) || (isset($bFlagRead_regdate) && $bFlagRead_regdate))
{
    $this->ajax_return_values_regdate(true);
}
if ($original_poly !== $modificado_poly || isset($this->nmgp_cmp_readonly['poly']) || (isset($bFlagRead_poly) && $bFlagRead_poly))
{
    $this->ajax_return_values_poly(true);
}
if ($original_doctor !== $modificado_doctor || isset($this->nmgp_cmp_readonly['doctor']) || (isset($bFlagRead_doctor) && $bFlagRead_doctor))
{
    $this->ajax_return_values_doctor(true);
}
if ($original_queue !== $modificado_queue || isset($this->nmgp_cmp_readonly['queue']) || (isset($bFlagRead_queue) && $bFlagRead_queue))
{
    $this->ajax_return_values_queue(true);
}
if ($original_viaphone !== $modificado_viaphone || isset($this->nmgp_cmp_readonly['viaphone']) || (isset($bFlagRead_viaphone) && $bFlagRead_viaphone))
{
    $this->ajax_return_values_viaphone(true);
}
if ($original_regdate !== $modificado_regdate || isset($this->nmgp_cmp_readonly['regdate']) || (isset($bFlagRead_regdate) && $bFlagRead_regdate))
{
    $this->ajax_return_values_regdate(true);
}
$this->NM_ajax_info['event_field'] = 'regDate';
form_tbantrian_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'off';
}
function viaPhone_onChange()
{
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'on';
  
$original_regdate = $this->regdate;
$original_viaphone = $this->viaphone;
$original_poly = $this->poly;
$original_doctor = $this->doctor;
$original_queue = $this->queue;
$original_inst = $this->inst;
$original_instcode = $this->instcode;
$original_instno = $this->instno;
$original_instexpiry = $this->instexpiry;
$original_bayar = $this->bayar;
$original_regdate = $this->regdate;
$original_instcode = $this->instcode;
$original_bayar = $this->bayar;
$original_instexpiry = $this->instexpiry;
$original_instno = $this->instno;
$original_inst = $this->inst;

$date_reg = $this->regdate ;

if ($this->viaphone  == '1'){
	$check_sql = "SELECT max(queue)"
	   . " FROM tbantrian"
	   . " WHERE regDate = '" . $date_reg . "' and poly = '" . $this->poly  . "' and doctor = '" . $this->doctor  . "' and viaPhone = '1'";
	 
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
		$antrian_prior = $this->rs[0][0];
		$this->queue  = $antrian_prior +1;
		$this->nmgp_cmp_hidden["inst"] = "on"; $this->NM_ajax_info['fieldDisplay']['inst'] = 'on';
		$this->nmgp_cmp_hidden["instcode"] = "on"; $this->NM_ajax_info['fieldDisplay']['instcode'] = 'on';
		$this->nmgp_cmp_hidden["instno"] = "on"; $this->NM_ajax_info['fieldDisplay']['instno'] = 'on';
		$this->nmgp_cmp_hidden["instexpiry"] = "on"; $this->NM_ajax_info['fieldDisplay']['instexpiry'] = 'on';
		$this->inst  = 'BPJS';
		$this->instcode  = 'INS140101';
		$this->bayar  = 'BPJS';
	}
			else     
	{
		$this->nmgp_cmp_hidden["inst"] = "on"; $this->NM_ajax_info['fieldDisplay']['inst'] = 'on';
		$this->nmgp_cmp_hidden["instcode"] = "on"; $this->NM_ajax_info['fieldDisplay']['instcode'] = 'on';
		$this->nmgp_cmp_hidden["instno"] = "on"; $this->NM_ajax_info['fieldDisplay']['instno'] = 'on';
		$this->nmgp_cmp_hidden["instexpiry"] = "on"; $this->NM_ajax_info['fieldDisplay']['instexpiry'] = 'on';
		$this->queue  = '16';
		$this->inst  = 'BPJS';
		$this->instcode  = 'INS140101';
		$this->bayar  = 'BPJS';
	}
}else{
	$check_sql = "SELECT max(queue)"
	   . " FROM tbantrian"
	   . " WHERE regDate = '" . $date_reg . "'  and poly = '" . $this->poly  . "' and doctor = '" . $this->doctor  . "'and viaPhone = '0'";
	 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs2 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs2[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs2 = false;
          $this->rs2_erro = $this->Db->ErrorMsg();
      } 
;

	if (isset($this->rs2[0][0]))     
	{
		$antrian_non = $this->rs2[0][0];
		$this->queue  = $antrian_non +1;
	}
			else     
	{
		$this->queue  = '1';
	}
}


$modificado_regdate = $this->regdate;
$modificado_viaphone = $this->viaphone;
$modificado_poly = $this->poly;
$modificado_doctor = $this->doctor;
$modificado_queue = $this->queue;
$modificado_inst = $this->inst;
$modificado_instcode = $this->instcode;
$modificado_instno = $this->instno;
$modificado_instexpiry = $this->instexpiry;
$modificado_bayar = $this->bayar;
$modificado_regdate = $this->regdate;
$modificado_instcode = $this->instcode;
$modificado_bayar = $this->bayar;
$modificado_instexpiry = $this->instexpiry;
$modificado_instno = $this->instno;
$modificado_inst = $this->inst;
$this->nm_formatar_campos('regdate', 'viaphone', 'poly', 'doctor', 'queue', 'inst', 'instcode', 'instno', 'instexpiry', 'bayar');
if ($original_regdate !== $modificado_regdate || isset($this->nmgp_cmp_readonly['regdate']) || (isset($bFlagRead_regdate) && $bFlagRead_regdate))
{
    $this->ajax_return_values_regdate(true);
}
if ($original_viaphone !== $modificado_viaphone || isset($this->nmgp_cmp_readonly['viaphone']) || (isset($bFlagRead_viaphone) && $bFlagRead_viaphone))
{
    $this->ajax_return_values_viaphone(true);
}
if ($original_poly !== $modificado_poly || isset($this->nmgp_cmp_readonly['poly']) || (isset($bFlagRead_poly) && $bFlagRead_poly))
{
    $this->ajax_return_values_poly(true);
}
if ($original_doctor !== $modificado_doctor || isset($this->nmgp_cmp_readonly['doctor']) || (isset($bFlagRead_doctor) && $bFlagRead_doctor))
{
    $this->ajax_return_values_doctor(true);
}
if ($original_queue !== $modificado_queue || isset($this->nmgp_cmp_readonly['queue']) || (isset($bFlagRead_queue) && $bFlagRead_queue))
{
    $this->ajax_return_values_queue(true);
}
if ($original_inst !== $modificado_inst || isset($this->nmgp_cmp_readonly['inst']) || (isset($bFlagRead_inst) && $bFlagRead_inst))
{
    $this->ajax_return_values_inst(true);
}
if ($original_instcode !== $modificado_instcode || isset($this->nmgp_cmp_readonly['instcode']) || (isset($bFlagRead_instcode) && $bFlagRead_instcode))
{
    $this->ajax_return_values_instcode(true);
}
if ($original_instno !== $modificado_instno || isset($this->nmgp_cmp_readonly['instno']) || (isset($bFlagRead_instno) && $bFlagRead_instno))
{
    $this->ajax_return_values_instno(true);
}
if ($original_instexpiry !== $modificado_instexpiry || isset($this->nmgp_cmp_readonly['instexpiry']) || (isset($bFlagRead_instexpiry) && $bFlagRead_instexpiry))
{
    $this->ajax_return_values_instexpiry(true);
}
if ($original_bayar !== $modificado_bayar || isset($this->nmgp_cmp_readonly['bayar']) || (isset($bFlagRead_bayar) && $bFlagRead_bayar))
{
    $this->ajax_return_values_bayar(true);
}
if ($original_regdate !== $modificado_regdate || isset($this->nmgp_cmp_readonly['regdate']) || (isset($bFlagRead_regdate) && $bFlagRead_regdate))
{
    $this->ajax_return_values_regdate(true);
}
if ($original_instcode !== $modificado_instcode || isset($this->nmgp_cmp_readonly['instcode']) || (isset($bFlagRead_instcode) && $bFlagRead_instcode))
{
    $this->ajax_return_values_instcode(true);
}
if ($original_bayar !== $modificado_bayar || isset($this->nmgp_cmp_readonly['bayar']) || (isset($bFlagRead_bayar) && $bFlagRead_bayar))
{
    $this->ajax_return_values_bayar(true);
}
if ($original_instexpiry !== $modificado_instexpiry || isset($this->nmgp_cmp_readonly['instexpiry']) || (isset($bFlagRead_instexpiry) && $bFlagRead_instexpiry))
{
    $this->ajax_return_values_instexpiry(true);
}
if ($original_instno !== $modificado_instno || isset($this->nmgp_cmp_readonly['instno']) || (isset($bFlagRead_instno) && $bFlagRead_instno))
{
    $this->ajax_return_values_instno(true);
}
if ($original_inst !== $modificado_inst || isset($this->nmgp_cmp_readonly['inst']) || (isset($bFlagRead_inst) && $bFlagRead_inst))
{
    $this->ajax_return_values_inst(true);
}
$this->NM_ajax_info['event_field'] = 'viaPhone';
form_tbantrian_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbantrian']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_tbantrian_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
        include_once("form_tbantrian_form0.php");
        include_once("form_tbantrian_form1.php");
        $this->hideFormPages();
 }

        function initFormPages() {
                $this->Ini->nm_page_names = array(
                        'Pag1' => '0',
                        'Pag2' => '1',
                );

                $this->Ini->nm_page_blocks = array(
                        'Pag1' => array(
                                0 => 'on',
                                1 => 'on',
                        ),
                        'Pag2' => array(
                                2 => 'on',
                        ),
                );

                $this->Ini->nm_block_page = array(
                        0 => 'Pag1',
                        1 => 'Pag1',
                        2 => 'Pag2',
                );

                if (!empty($this->Ini->nm_hidden_blocos)) {
                        foreach ($this->Ini->nm_hidden_blocos as $blockNo => $blockStatus) {
                                if ('off' == $blockStatus) {
                                        $this->Ini->nm_page_blocks[ $this->Ini->nm_block_page[$blockNo] ][$blockNo] = 'off';
                                }
                        }
                }

                foreach ($this->Ini->nm_page_blocks as $pageName => $pageBlocks) {
                        $hasDisplayedBlock = false;

                        foreach ($pageBlocks as $blockNo => $blockStatus) {
                                if ('on' == $blockStatus) {
                                        $hasDisplayedBlock = true;
                                }
                        }

                        if (!$hasDisplayedBlock) {
                                $this->Ini->nm_hidden_pages[$pageName] = 'off';
                        }
                }
        } // initFormPages

        function hideFormPages() {
                if (!empty($this->Ini->nm_hidden_pages)) {
?>
<script type="text/javascript">
$(function() {
        scResetPagesDisplay();
<?php
                        foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                                if ('off' == $pageStatus) {
?>
        scHidePage("<?php echo $this->Ini->nm_page_names[$pageName]; ?>");
<?php
                                }
                        }
?>
        scCheckNoPageSelected();
});
</script>
<?php
                }
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['csrf_token'];
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

   function Form_lookup_poly()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT polyCode, name  FROM tbpoli  ORDER BY name";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_poly'][] = $rs->fields[0];
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
   function Form_lookup_doctor()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT docCode, concat(gelar, name,',', spec)  FROM tbdoctor WHERE poli like '%$this->poly%' ORDER BY gelar, name, spec";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_doctor'][] = $rs->fields[0];
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
   function Form_lookup_viaphone()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Tidak?#?0?#?S?@?";
       $nmgp_def_dados .= "Ya?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_nama()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ',' + salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,',', salut)  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&','&salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ',' + salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY name, salut";
   }

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_nama'][] = $rs->fields[0];
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
   function Form_lookup_status()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Antre?#?Antre?#??@?";
       $nmgp_def_dados .= "Batal?#?Batal?#??@?";
       $nmgp_def_dados .= "Pelayanan?#?Pelayanan?#?N?@?";
       $nmgp_def_dados .= "Lengkap?#?Lengkap?#?N?@?";
       $nmgp_def_dados .= "Selesai?#?Selesai?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_alamat()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT custCode, address  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY address";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_alamat'][] = $rs->fields[0];
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
   function Form_lookup_sc_field_2()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, phone + ' / ' + hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(phone,' / ', hp)  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, phone&' / '&hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, phone||' / '||hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, phone + ' / ' + hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, phone||' / '||hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }
   else
   {
       $nm_comando = "SELECT custCode, phone||' / '||hp  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY phone, hp";
   }

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_2'][] = $rs->fields[0];
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
   function Form_lookup_sc_field_1()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT str_replace (convert(char(10),date(birthDate),102), '.', '-') + ' ' + convert(char(8),date(birthDate),20) as sc_field_10 FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY birthDate";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT convert(char(19),date(birthDate),121) as sc_field_10 FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY birthDate";
   }
   else
   {
       $nm_comando = "SELECT date(birthDate)  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY birthDate";
   }

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_1'][] = $rs->fields[0];
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
   function Form_lookup_sc_field_0()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT custCode, sex  FROM tbcustomer WHERE custCode = '$this->custcode' ORDER BY sex";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_sc_field_0'][] = $rs->fields[0];
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
   function Form_lookup_jenis()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Pasien Lama?#?Pasien Lama?#?N?@?";
       $nmgp_def_dados .= "Pasien Baru?#?Pasien Baru?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_bayar()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "ASURANSI?#?ASURANSI?#?N?@?";
       $nmgp_def_dados .= "TUNAI?#?TUNAI?#?N?@?";
       $nmgp_def_dados .= "BPJS?#?BPJS?#?N?@?";
       $nmgp_def_dados .= "COB?#?COB?#?N?@?";
       $nmgp_def_dados .= "PAKET?#?PAKET?#?N?@?";
       $nmgp_def_dados .= "BANSOS?#?BANSOS?#?N?@?";
       $nmgp_def_dados .= "JAMPERU?#?JAMPERU?#?N?@?";
       $nmgp_def_dados .= "TUNAI PAKET?#?TUNAI PAKET?#?N?@?";
       $nmgp_def_dados .= "TUNAI PROMO?#?TUNAI PROMO?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_inst()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT name, name  FROM tbinstansi  ORDER BY name";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_inst'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode'] = array(); 
    }

   $old_value_regdate = $this->regdate;
   $old_value_queue = $this->queue;
   $old_value_instexpiry = $this->instexpiry;
   $old_value_hta = $this->hta;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_queue = $this->queue;
   $unformatted_value_instexpiry = $this->instexpiry;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT instCode, instCode FROM tbinstansi WHERE name = '$this->inst' ORDER BY instCode";

   $this->regdate = $old_value_regdate;
   $this->queue = $old_value_queue;
   $this->instexpiry = $old_value_instexpiry;
   $this->hta = $old_value_hta;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['Lookup_instcode'][] = $rs->fields[0];
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
   function SC_fast_search($field, $arg_search, $data_search)
   {
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_tbantrian_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "custCode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_poly($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "poly", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_doctor($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "doctor", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "queue", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "regTime", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "struckNo", $arg_search, $data_search);
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
          $data_lookup = $this->SC_lookup_viaphone($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "viaPhone", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "note", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_inst($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "inst", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_jenis($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "jenis", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_bayar($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "bayar", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_instcode($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "instCode", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "member", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tlc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "instNo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "custTlc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "shift", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bu", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "buCode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ruang", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "statusRm", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "sep", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "caraCode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "regType", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "asalRujukan", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "asalCode", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_tbantrian = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['total'] = $qt_geral_reg_form_tbantrian;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbantrian_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbantrian_pack_ajax_response();
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
      $nm_numeric[] = "queue";$nm_numeric[] = "viaphone";$nm_numeric[] = "id";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['decimal_db'] == ".")
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
      $Nm_datas['regdate'] = "datetime";$Nm_datas['hta'] = "datetime";$Nm_datas['handled'] = "datetime";$Nm_datas['instexpiry'] = "datetime";$Nm_datas['paid'] = "datetime";$Nm_datas[''] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['SC_sep_date1'];
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
   function SC_lookup_poly($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT name, polyCode FROM tbpoli WHERE (name LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
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
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_doctor($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_status($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Antre'] = "Antre";
       $data_look['Batal'] = "Batal";
       $data_look['Pelayanan'] = "Pelayanan";
       $data_look['Lengkap'] = "Lengkap";
       $data_look['Selesai'] = "Selesai";
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
   function SC_lookup_viaphone($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['0'] = "Tidak";
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
   function SC_lookup_inst($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT name, name FROM tbinstansi WHERE (name LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
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
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_jenis($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Pasien Lama'] = "Pasien Lama";
       $data_look['Pasien Baru'] = "Pasien Baru";
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
   function SC_lookup_bayar($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['ASURANSI'] = "ASURANSI";
       $data_look['TUNAI'] = "TUNAI";
       $data_look['BPJS'] = "BPJS";
       $data_look['COB'] = "COB";
       $data_look['PAKET'] = "PAKET";
       $data_look['BANSOS'] = "BANSOS";
       $data_look['JAMPERU'] = "JAMPERU";
       $data_look['TUNAI PAKET'] = "TUNAI PAKET";
       $data_look['TUNAI PROMO'] = "TUNAI PROMO";
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
       $nmgp_saida_form = "form_tbantrian_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_tbantrian_fim.php";
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
       form_tbantrian_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['masterValue']);
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
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detailadm']['reg_start'] = "";
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detailadm']['total']);
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbantrian']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_tbantrian_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
           $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       }
       form_tbantrian_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
   if ($nm_target == "_blank")
   {
?>
<form name="Fredir" method="post" target="_blank" action="<?php echo $nm_apl_dest; ?>">
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
</form>
<script type="text/javascript">
setTimeout(function() { document.Fredir.submit(); }, 250);
</script>
<?php
    return;
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
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
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<?php
   }
?>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&script_case_session=<?php echo session_id() ?> &nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
   </BODY>
   </HTML>
<?php
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
    function sc_ajax_message($sMessage, $sTitle = '', $sParam = '', $sRedirPar = '')
    {
        if ($this->NM_ajax_flag)
        {
            $this->NM_ajax_info['ajaxMessage'] = array();
            if ('' != $sParam)
            {
                $aParamList = explode('&', $sParam);
                foreach ($aParamList as $sParamItem)
                {
                    $aParamData = explode('=', $sParamItem);
                    if (2 == sizeof($aParamData) &&
                        in_array($aParamData[0], array('modal', 'timeout', 'button', 'button_label', 'top', 'left', 'width', 'height', 'redir', 'redir_target', 'show_close', 'body_icon', 'toast', 'toast_pos', 'type')))
                    {
                        $this->NM_ajax_info['ajaxMessage'][$aParamData[0]] = NM_charset_to_utf8($aParamData[1]);
                    }
                }
            }
            if (isset($this->NM_ajax_info['ajaxMessage']['redir']) && '' != $this->NM_ajax_info['ajaxMessage']['redir'] && '.php' == substr($this->NM_ajax_info['ajaxMessage']['redir'], -4) && 'http' != substr($this->NM_ajax_info['ajaxMessage']['redir'], 0, 4))
            {
                $this->NM_ajax_info['ajaxMessage']['redir'] = $this->Ini->path_link . SC_dir_app_name(substr($this->NM_ajax_info['ajaxMessage']['redir'], 0, -4)) . '/' . $this->NM_ajax_info['ajaxMessage']['redir'];
            }
            if ('' != $sRedirPar)
            {
                $this->NM_ajax_info['ajaxMessage']['redir_par'] = str_replace('=', '?#?', str_replace(';', '?@?', $sRedirPar));
            }
            else
            {
                $this->NM_ajax_info['ajaxMessage']['redir_par'] = '';
            }
            $this->NM_ajax_info['ajaxMessage']['message'] = NM_charset_to_utf8($sMessage);
            $this->NM_ajax_info['ajaxMessage']['title']   = NM_charset_to_utf8($sTitle);
            if (!isset($this->NM_ajax_info['ajaxMessage']['button']))
            {
                $this->NM_ajax_info['ajaxMessage']['button'] = 'Y';
            }
        }
    } // sc_ajax_message
}
?>
