<?php
//
class form_vclaim_sep_update_mob_apl
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
   var $nokartu;
   var $nama;
   var $nik;
   var $keterangan;
   var $sex;
   var $umursaatpelayanan;
   var $kodehakkelas;
   var $keteranganhakkelas;
   var $kodejenispeserta;
   var $keteranganjenispeserta;
   var $kdprovider;
   var $nmprovider;
   var $tglcetakkartu;
   var $tgltat;
   var $tgltmt;
   var $tglsep;
   var $ppkpelayanan;
   var $jnspelayanan;
   var $jnspelayanan_1;
   var $klsrawat;
   var $klsrawat_1;
   var $nomr;
   var $asalrujukan;
   var $asalrujukan_1;
   var $tglrujukan;
   var $norujukan;
   var $ppkrujukan;
   var $catatan;
   var $diagawal;
   var $politujuan;
   var $polieksekutif;
   var $polieksekutif_1;
   var $cob;
   var $cob_1;
   var $kejadianlakalantas;
   var $kejadianlakalantas_1;
   var $penjaminlakalantas;
   var $penjaminlakalantas_1;
   var $lokasilakalantas;
   var $notelp;
   var $user;
   var $nmppkpelayanan;
   var $nmppkrujukan;
   var $nmdiagawal;
   var $nmpolitujuan;
   var $nosep;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
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
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['asalrujukan']))
          {
              $this->asalrujukan = $this->NM_ajax_info['param']['asalrujukan'];
          }
          if (isset($this->NM_ajax_info['param']['catatan']))
          {
              $this->catatan = $this->NM_ajax_info['param']['catatan'];
          }
          if (isset($this->NM_ajax_info['param']['cob']))
          {
              $this->cob = $this->NM_ajax_info['param']['cob'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['diagawal']))
          {
              $this->diagawal = $this->NM_ajax_info['param']['diagawal'];
          }
          if (isset($this->NM_ajax_info['param']['jnspelayanan']))
          {
              $this->jnspelayanan = $this->NM_ajax_info['param']['jnspelayanan'];
          }
          if (isset($this->NM_ajax_info['param']['kdprovider']))
          {
              $this->kdprovider = $this->NM_ajax_info['param']['kdprovider'];
          }
          if (isset($this->NM_ajax_info['param']['kejadianlakalantas']))
          {
              $this->kejadianlakalantas = $this->NM_ajax_info['param']['kejadianlakalantas'];
          }
          if (isset($this->NM_ajax_info['param']['keterangan']))
          {
              $this->keterangan = $this->NM_ajax_info['param']['keterangan'];
          }
          if (isset($this->NM_ajax_info['param']['keteranganhakkelas']))
          {
              $this->keteranganhakkelas = $this->NM_ajax_info['param']['keteranganhakkelas'];
          }
          if (isset($this->NM_ajax_info['param']['keteranganjenispeserta']))
          {
              $this->keteranganjenispeserta = $this->NM_ajax_info['param']['keteranganjenispeserta'];
          }
          if (isset($this->NM_ajax_info['param']['klsrawat']))
          {
              $this->klsrawat = $this->NM_ajax_info['param']['klsrawat'];
          }
          if (isset($this->NM_ajax_info['param']['kodehakkelas']))
          {
              $this->kodehakkelas = $this->NM_ajax_info['param']['kodehakkelas'];
          }
          if (isset($this->NM_ajax_info['param']['kodejenispeserta']))
          {
              $this->kodejenispeserta = $this->NM_ajax_info['param']['kodejenispeserta'];
          }
          if (isset($this->NM_ajax_info['param']['lokasilakalantas']))
          {
              $this->lokasilakalantas = $this->NM_ajax_info['param']['lokasilakalantas'];
          }
          if (isset($this->NM_ajax_info['param']['nama']))
          {
              $this->nama = $this->NM_ajax_info['param']['nama'];
          }
          if (isset($this->NM_ajax_info['param']['nik']))
          {
              $this->nik = $this->NM_ajax_info['param']['nik'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmdiagawal']))
          {
              $this->nmdiagawal = $this->NM_ajax_info['param']['nmdiagawal'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
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
          if (isset($this->NM_ajax_info['param']['nmpolitujuan']))
          {
              $this->nmpolitujuan = $this->NM_ajax_info['param']['nmpolitujuan'];
          }
          if (isset($this->NM_ajax_info['param']['nmppkpelayanan']))
          {
              $this->nmppkpelayanan = $this->NM_ajax_info['param']['nmppkpelayanan'];
          }
          if (isset($this->NM_ajax_info['param']['nmppkrujukan']))
          {
              $this->nmppkrujukan = $this->NM_ajax_info['param']['nmppkrujukan'];
          }
          if (isset($this->NM_ajax_info['param']['nmprovider']))
          {
              $this->nmprovider = $this->NM_ajax_info['param']['nmprovider'];
          }
          if (isset($this->NM_ajax_info['param']['nokartu']))
          {
              $this->nokartu = $this->NM_ajax_info['param']['nokartu'];
          }
          if (isset($this->NM_ajax_info['param']['nomr']))
          {
              $this->nomr = $this->NM_ajax_info['param']['nomr'];
          }
          if (isset($this->NM_ajax_info['param']['norujukan']))
          {
              $this->norujukan = $this->NM_ajax_info['param']['norujukan'];
          }
          if (isset($this->NM_ajax_info['param']['nosep']))
          {
              $this->nosep = $this->NM_ajax_info['param']['nosep'];
          }
          if (isset($this->NM_ajax_info['param']['notelp']))
          {
              $this->notelp = $this->NM_ajax_info['param']['notelp'];
          }
          if (isset($this->NM_ajax_info['param']['penjaminlakalantas']))
          {
              $this->penjaminlakalantas = $this->NM_ajax_info['param']['penjaminlakalantas'];
          }
          if (isset($this->NM_ajax_info['param']['polieksekutif']))
          {
              $this->polieksekutif = $this->NM_ajax_info['param']['polieksekutif'];
          }
          if (isset($this->NM_ajax_info['param']['politujuan']))
          {
              $this->politujuan = $this->NM_ajax_info['param']['politujuan'];
          }
          if (isset($this->NM_ajax_info['param']['ppkpelayanan']))
          {
              $this->ppkpelayanan = $this->NM_ajax_info['param']['ppkpelayanan'];
          }
          if (isset($this->NM_ajax_info['param']['ppkrujukan']))
          {
              $this->ppkrujukan = $this->NM_ajax_info['param']['ppkrujukan'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sex']))
          {
              $this->sex = $this->NM_ajax_info['param']['sex'];
          }
          if (isset($this->NM_ajax_info['param']['tglcetakkartu']))
          {
              $this->tglcetakkartu = $this->NM_ajax_info['param']['tglcetakkartu'];
          }
          if (isset($this->NM_ajax_info['param']['tglrujukan']))
          {
              $this->tglrujukan = $this->NM_ajax_info['param']['tglrujukan'];
          }
          if (isset($this->NM_ajax_info['param']['tglsep']))
          {
              $this->tglsep = $this->NM_ajax_info['param']['tglsep'];
          }
          if (isset($this->NM_ajax_info['param']['tgltat']))
          {
              $this->tgltat = $this->NM_ajax_info['param']['tgltat'];
          }
          if (isset($this->NM_ajax_info['param']['tgltmt']))
          {
              $this->tgltmt = $this->NM_ajax_info['param']['tgltmt'];
          }
          if (isset($this->NM_ajax_info['param']['umursaatpelayanan']))
          {
              $this->umursaatpelayanan = $this->NM_ajax_info['param']['umursaatpelayanan'];
          }
          if (isset($this->NM_ajax_info['param']['user']))
          {
              $this->user = $this->NM_ajax_info['param']['user'];
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
      if (isset($_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['embutida_parms']);
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
                 nm_limpa_str_form_vclaim_sep_update_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_vclaim_sep_update_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("id");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("id");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_vclaim_sep_update_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_vclaim_sep_update_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_vclaim_sep_update_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_vclaim_sep_update_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_vclaim_sep_update_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_vclaim_sep_update_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_vclaim_sep_update_mob']['label'] = "Update SEP";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_vclaim_sep_update_mob")
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



      $_SESSION['scriptcase']['error_icon']['form_vclaim_sep_update_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_vclaim_sep_update_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_vclaim_sep_update_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_vclaim_sep_update_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_vclaim_sep_update_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_vclaim_sep_update_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_vclaim_sep_update/form_vclaim_sep_update_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_vclaim_sep_update_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_vclaim_sep_update_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_vclaim_sep_update_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
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
          require_once($this->Ini->path_embutida . 'form_vclaim_sep_update/form_vclaim_sep_update_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_vclaim_sep_update_mob_erro.class.php"); 
      }
      $this->Erro      = new form_vclaim_sep_update_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_vclaim_sep_update_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- tglsep
      $this->field_config['tglsep']                 = array();
      $this->field_config['tglsep']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['tglsep']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['tglsep']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'tglsep');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


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
          if ('validate_nokartu' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nokartu');
          }
          if ('validate_nama' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nama');
          }
          if ('validate_nik' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nik');
          }
          if ('validate_keterangan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'keterangan');
          }
          if ('validate_sex' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sex');
          }
          if ('validate_umursaatpelayanan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'umursaatpelayanan');
          }
          if ('validate_kodehakkelas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kodehakkelas');
          }
          if ('validate_keteranganhakkelas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'keteranganhakkelas');
          }
          if ('validate_kodejenispeserta' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kodejenispeserta');
          }
          if ('validate_keteranganjenispeserta' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'keteranganjenispeserta');
          }
          if ('validate_kdprovider' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kdprovider');
          }
          if ('validate_nmprovider' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nmprovider');
          }
          if ('validate_tglcetakkartu' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tglcetakkartu');
          }
          if ('validate_tgltat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tgltat');
          }
          if ('validate_tgltmt' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tgltmt');
          }
          if ('validate_nosep' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nosep');
          }
          if ('validate_tglsep' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tglsep');
          }
          if ('validate_ppkpelayanan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ppkpelayanan');
          }
          if ('validate_nmppkpelayanan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nmppkpelayanan');
          }
          if ('validate_jnspelayanan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jnspelayanan');
          }
          if ('validate_klsrawat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'klsrawat');
          }
          if ('validate_nomr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nomr');
          }
          if ('validate_asalrujukan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'asalrujukan');
          }
          if ('validate_norujukan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'norujukan');
          }
          if ('validate_tglrujukan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tglrujukan');
          }
          if ('validate_ppkrujukan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ppkrujukan');
          }
          if ('validate_nmppkrujukan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nmppkrujukan');
          }
          if ('validate_catatan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'catatan');
          }
          if ('validate_diagawal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'diagawal');
          }
          if ('validate_nmdiagawal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nmdiagawal');
          }
          if ('validate_politujuan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'politujuan');
          }
          if ('validate_nmpolitujuan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nmpolitujuan');
          }
          if ('validate_polieksekutif' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'polieksekutif');
          }
          if ('validate_cob' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cob');
          }
          if ('validate_kejadianlakalantas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kejadianlakalantas');
          }
          if ('validate_penjaminlakalantas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'penjaminlakalantas');
          }
          if ('validate_lokasilakalantas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lokasilakalantas');
          }
          if ('validate_notelp' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'notelp');
          }
          if ('validate_user' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'user');
          }
          form_vclaim_sep_update_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['nosep']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->nosep = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['nosep'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['tglsep']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->tglsep = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['tglsep'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['ppkpelayanan']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->ppkpelayanan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['ppkpelayanan'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['nmppkpelayanan']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->nmppkpelayanan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['nmppkpelayanan'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['jnspelayanan']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->jnspelayanan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['jnspelayanan'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['politujuan']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->politujuan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['politujuan'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['nmpolitujuan']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->nmpolitujuan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['nmpolitujuan'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['user']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->user = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_select']['user'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_vclaim_sep_update_mob_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_vclaim_sep_update_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_vclaim_sep_update_mob_pack_ajax_response();
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
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_vclaim_sep_update_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_vclaim_sep_update_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->nokartu = "" ;  
          $this->nama = "" ;  
          $this->nik = "" ;  
          $this->keterangan = "" ;  
          $this->sex = "" ;  
          $this->umursaatpelayanan = "" ;  
          $this->kodehakkelas = "" ;  
          $this->keteranganhakkelas = "" ;  
          $this->kodejenispeserta = "" ;  
          $this->keteranganjenispeserta = "" ;  
          $this->kdprovider = "" ;  
          $this->nmprovider = "" ;  
          $this->tglcetakkartu = "" ;  
          $this->tgltat = "" ;  
          $this->tgltmt = "" ;  
          $this->tglsep = "" ;  
          $this->ppkpelayanan = "" ;  
          $this->jnspelayanan = "" ;  
          $this->klsrawat = "" ;  
          $this->nomr = "" ;  
          $this->asalrujukan = "" ;  
          $this->tglrujukan = "" ;  
          $this->norujukan = "" ;  
          $this->ppkrujukan = "" ;  
          $this->catatan = "" ;  
          $this->diagawal = "" ;  
          $this->politujuan = "" ;  
          $this->polieksekutif = "" ;  
          $this->cob = "" ;  
          $this->kejadianlakalantas = "" ;  
          $this->penjaminlakalantas = "" ;  
          $this->lokasilakalantas = "" ;  
          $this->notelp = "" ;  
          $this->user = "" ;  
          $this->nmppkpelayanan = "" ;  
          $this->nmppkrujukan = "" ;  
          $this->nmdiagawal = "" ;  
          $this->nmpolitujuan = "" ;  
          $this->nosep = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos']))
              { 
                  $nokartu = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][0]; 
                  $nama = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][1]; 
                  $nik = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][2]; 
                  $keterangan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][3]; 
                  $sex = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][4]; 
                  $umursaatpelayanan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][5]; 
                  $kodehakkelas = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][6]; 
                  $keteranganhakkelas = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][7]; 
                  $kodejenispeserta = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][8]; 
                  $keteranganjenispeserta = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][9]; 
                  $kdprovider = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][10]; 
                  $nmprovider = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][11]; 
                  $tglcetakkartu = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][12]; 
                  $tgltat = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][13]; 
                  $tgltmt = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][14]; 
                  $nosep = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][15]; 
                  $tglsep = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][16]; 
                  $ppkpelayanan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][17]; 
                  $nmppkpelayanan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][18]; 
                  $jnspelayanan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][19]; 
                  $klsrawat = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][20]; 
                  $nomr = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][21]; 
                  $asalrujukan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][22]; 
                  $norujukan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][23]; 
                  $tglrujukan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][24]; 
                  $ppkrujukan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][25]; 
                  $nmppkrujukan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][26]; 
                  $catatan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][27]; 
                  $diagawal = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][28]; 
                  $nmdiagawal = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][29]; 
                  $politujuan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][30]; 
                  $nmpolitujuan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][31]; 
                  $polieksekutif = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][32]; 
                  $cob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][33]; 
                  $kejadianlakalantas = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][34]; 
                  $penjaminlakalantas = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][35]; 
                  $lokasilakalantas = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][36]; 
                  $notelp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][37]; 
                  $user = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][38]; 
              } 
          }
          $this->nm_gera_html();
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][0] = $this->nokartu; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][1] = $this->nama; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][2] = $this->nik; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][3] = $this->keterangan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][4] = $this->sex; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][5] = $this->umursaatpelayanan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][6] = $this->kodehakkelas; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][7] = $this->keteranganhakkelas; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][8] = $this->kodejenispeserta; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][9] = $this->keteranganjenispeserta; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][10] = $this->kdprovider; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][11] = $this->nmprovider; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][12] = $this->tglcetakkartu; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][13] = $this->tgltat; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][14] = $this->tgltmt; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][15] = $this->nosep; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][16] = $this->tglsep; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][17] = $this->ppkpelayanan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][18] = $this->nmppkpelayanan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][19] = $this->jnspelayanan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][20] = $this->klsrawat; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][21] = $this->nomr; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][22] = $this->asalrujukan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][23] = $this->norujukan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][24] = $this->tglrujukan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][25] = $this->ppkrujukan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][26] = $this->nmppkrujukan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][27] = $this->catatan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][28] = $this->diagawal; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][29] = $this->nmdiagawal; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][30] = $this->politujuan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][31] = $this->nmpolitujuan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][32] = $this->polieksekutif; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][33] = $this->cob; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][34] = $this->kejadianlakalantas; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][35] = $this->penjaminlakalantas; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][36] = $this->lokasilakalantas; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][37] = $this->notelp; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['campos'][38] = $this->user; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("form_vclaim_sep_update_mob", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->nmgp_redireciona_form("form_vclaim_sep_update_mob_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
              }
          }
          if ($this->NM_ajax_flag)
          {
              form_vclaim_sep_update_mob_pack_ajax_response();
              exit;
          }
      }
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_vclaim_sep_update_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Update SEP") ?></TITLE>
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
<form name="Fdown" method="get" action="form_vclaim_sep_update_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_vclaim_sep_update_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_vclaim_sep_update_mob.php" target="_self" style="display: none"> 
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
           case 'nokartu':
               return "No. Kartu";
               break;
           case 'nama':
               return "Nama";
               break;
           case 'nik':
               return "NIK";
               break;
           case 'keterangan':
               return "Keterangan";
               break;
           case 'sex':
               return "Jenis Kelamin";
               break;
           case 'umursaatpelayanan':
               return "Umur";
               break;
           case 'kodehakkelas':
               return "Kode Kelas";
               break;
           case 'keteranganhakkelas':
               return "Kelas";
               break;
           case 'kodejenispeserta':
               return "Kode Jenis Peserta";
               break;
           case 'keteranganjenispeserta':
               return "Jenis Peserta";
               break;
           case 'kdprovider':
               return "Kode Provider";
               break;
           case 'nmprovider':
               return "Nama Provider";
               break;
           case 'tglcetakkartu':
               return "Cetak Kartu";
               break;
           case 'tgltat':
               return "Tanggal TAT";
               break;
           case 'tgltmt':
               return "Tanggal TMT";
               break;
           case 'nosep':
               return "No. SEP";
               break;
           case 'tglsep':
               return "Tanggal SEP";
               break;
           case 'ppkpelayanan':
               return "Kode PPK";
               break;
           case 'nmppkpelayanan':
               return "PPK Pelayanan";
               break;
           case 'jnspelayanan':
               return "Jenis Pelayanan";
               break;
           case 'klsrawat':
               return "Kelas Rawat";
               break;
           case 'nomr':
               return "No. MR";
               break;
           case 'asalrujukan':
               return "Asal Rujukan";
               break;
           case 'norujukan':
               return "No. Rujukan";
               break;
           case 'tglrujukan':
               return "Tanggal Rujukan";
               break;
           case 'ppkrujukan':
               return "Kode PPK Rujukan";
               break;
           case 'nmppkrujukan':
               return "Nama PPK Rujukan";
               break;
           case 'catatan':
               return "Catatan";
               break;
           case 'diagawal':
               return "Kode Diag. Awal";
               break;
           case 'nmdiagawal':
               return "Nama Diag. Awal";
               break;
           case 'politujuan':
               return "Kode Poli Tujuan";
               break;
           case 'nmpolitujuan':
               return "Nama Poli Tujuan";
               break;
           case 'polieksekutif':
               return "Poli Eksekutif";
               break;
           case 'cob':
               return "COB";
               break;
           case 'kejadianlakalantas':
               return "Laka Lantas";
               break;
           case 'penjaminlakalantas':
               return "Penjamin Laka";
               break;
           case 'lokasilakalantas':
               return "Lokasi Laka Lantas";
               break;
           case 'notelp':
               return "No. Telepon";
               break;
           case 'user':
               return "User";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_vclaim_sep_update_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_vclaim_sep_update_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_vclaim_sep_update_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_vclaim_sep_update_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'nokartu' == $filtro)
        $this->ValidateField_nokartu($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nama' == $filtro)
        $this->ValidateField_nama($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nik' == $filtro)
        $this->ValidateField_nik($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'keterangan' == $filtro)
        $this->ValidateField_keterangan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sex' == $filtro)
        $this->ValidateField_sex($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'umursaatpelayanan' == $filtro)
        $this->ValidateField_umursaatpelayanan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'kodehakkelas' == $filtro)
        $this->ValidateField_kodehakkelas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'keteranganhakkelas' == $filtro)
        $this->ValidateField_keteranganhakkelas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'kodejenispeserta' == $filtro)
        $this->ValidateField_kodejenispeserta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'keteranganjenispeserta' == $filtro)
        $this->ValidateField_keteranganjenispeserta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'kdprovider' == $filtro)
        $this->ValidateField_kdprovider($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nmprovider' == $filtro)
        $this->ValidateField_nmprovider($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tglcetakkartu' == $filtro)
        $this->ValidateField_tglcetakkartu($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tgltat' == $filtro)
        $this->ValidateField_tgltat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tgltmt' == $filtro)
        $this->ValidateField_tgltmt($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nosep' == $filtro)
        $this->ValidateField_nosep($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tglsep' == $filtro)
        $this->ValidateField_tglsep($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ppkpelayanan' == $filtro)
        $this->ValidateField_ppkpelayanan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nmppkpelayanan' == $filtro)
        $this->ValidateField_nmppkpelayanan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'jnspelayanan' == $filtro)
        $this->ValidateField_jnspelayanan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'klsrawat' == $filtro)
        $this->ValidateField_klsrawat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nomr' == $filtro)
        $this->ValidateField_nomr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'asalrujukan' == $filtro)
        $this->ValidateField_asalrujukan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'norujukan' == $filtro)
        $this->ValidateField_norujukan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tglrujukan' == $filtro)
        $this->ValidateField_tglrujukan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ppkrujukan' == $filtro)
        $this->ValidateField_ppkrujukan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nmppkrujukan' == $filtro)
        $this->ValidateField_nmppkrujukan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'catatan' == $filtro)
        $this->ValidateField_catatan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'diagawal' == $filtro)
        $this->ValidateField_diagawal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nmdiagawal' == $filtro)
        $this->ValidateField_nmdiagawal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'politujuan' == $filtro)
        $this->ValidateField_politujuan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nmpolitujuan' == $filtro)
        $this->ValidateField_nmpolitujuan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'polieksekutif' == $filtro)
        $this->ValidateField_polieksekutif($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cob' == $filtro)
        $this->ValidateField_cob($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'kejadianlakalantas' == $filtro)
        $this->ValidateField_kejadianlakalantas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'penjaminlakalantas' == $filtro)
        $this->ValidateField_penjaminlakalantas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lokasilakalantas' == $filtro)
        $this->ValidateField_lokasilakalantas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'notelp' == $filtro)
        $this->ValidateField_notelp($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'user' == $filtro)
        $this->ValidateField_user($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

      if (empty($Campos_Crit) && empty($Campos_Falta) && empty($this->Campos_Mens_erro))
      {
          if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
          {
              $_SESSION['scriptcase']['form_vclaim_sep_update_mob']['contr_erro'] = 'on';
 $conf = config_param();
$noSep			= $this->input->post('noSep');		
$klsRawat		= $this->input->post('klsRawat');
$noMR			= $this->input->post('noMR');
$asalRujukan	= $this->input->post('asalRujukan');
$tglRujukan		= $this->input->post('tglRujukan');
$noRujukan		= $this->input->post('noRujukan');
$ppkRujukan		= $this->input->post('ppkRujukan');
$catatan		= $this->input->post('catatan');
$diagAwal		= $this->input->post('diagAwal');
$eksekutif		= $this->input->post('eksekutif');
$cob			= $this->input->post('cob');
$lakaLantas		= $this->input->post('lakaLantas');
$penjamin		= $this->input->post('penjamin');
$lokasiLaka		= $this->input->post('lokasiLaka');
$noTelp			= $this->input->post('noTelp');
$user			= 'Aulia_admin';

$fields = '{
   "request": {
	  "t_sep": {
		 "noSep": "'.$noSep.'",
		 "klsRawat": "'.$klsRawat.'",
		 "noMR": "'.$noMR.'",
		 "rujukan": {
			"asalRujukan": "'.$asalRujukan.'",
			"tglRujukan": "'.$tglRujukan.'",
			"noRujukan": "'.$noRujukan.'",
			"ppkRujukan": "'.$ppkRujukan.'"
		 },
		 "catatan": "'.$catatan.'",
		 "diagAwal": "'.$diagAwal.'",
		 "poli": {
			"eksekutif": "'.$eksekutif.'"
		 },
		 "cob": {
			"cob": "'.$cob.'"
		 },
		 "jaminan": {
			"lakaLantas": "'.$lakaLantas.'",
			"penjamin": "'.$penjamin.'",
			"lokasiLaka": "'.$lokasiLaka.'"
		 },
		 "noTelp": "'.$noTelp.'",
		 "user": "'.$user.'"
	  }
   }
}';

$cust_request = 'PUT';
$conf		  = $this->rc_conf();
$url_rest	  = $conf['base_api_url'].'sep/update';
$result 	  = Rest_Client($this->rc_conf(),$cust_request,$url_rest,$fields);
$arrContent   = json_decode($result,true);

print '<pre>';
print_r($arrContent);

$_SESSION['scriptcase']['form_vclaim_sep_update_mob']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_nokartu(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nokartu) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. Kartu " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nokartu']))
              {
                  $Campos_Erros['nokartu'] = array();
              }
              $Campos_Erros['nokartu'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nokartu']) || !is_array($this->NM_ajax_info['errList']['nokartu']))
              {
                  $this->NM_ajax_info['errList']['nokartu'] = array();
              }
              $this->NM_ajax_info['errList']['nokartu'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nokartu';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nokartu

    function ValidateField_nama(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nama) > 80) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nama " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nama']))
              {
                  $Campos_Erros['nama'] = array();
              }
              $Campos_Erros['nama'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nama']) || !is_array($this->NM_ajax_info['errList']['nama']))
              {
                  $this->NM_ajax_info['errList']['nama'] = array();
              }
              $this->NM_ajax_info['errList']['nama'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
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

    function ValidateField_nik(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nik) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "NIK " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nik']))
              {
                  $Campos_Erros['nik'] = array();
              }
              $Campos_Erros['nik'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nik']) || !is_array($this->NM_ajax_info['errList']['nik']))
              {
                  $this->NM_ajax_info['errList']['nik'] = array();
              }
              $this->NM_ajax_info['errList']['nik'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nik';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nik

    function ValidateField_keterangan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->keterangan) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Keterangan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['keterangan']))
              {
                  $Campos_Erros['keterangan'] = array();
              }
              $Campos_Erros['keterangan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['keterangan']) || !is_array($this->NM_ajax_info['errList']['keterangan']))
              {
                  $this->NM_ajax_info['errList']['keterangan'] = array();
              }
              $this->NM_ajax_info['errList']['keterangan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'keterangan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_keterangan

    function ValidateField_sex(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sex) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Jenis Kelamin " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sex']))
              {
                  $Campos_Erros['sex'] = array();
              }
              $Campos_Erros['sex'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sex']) || !is_array($this->NM_ajax_info['errList']['sex']))
              {
                  $this->NM_ajax_info['errList']['sex'] = array();
              }
              $this->NM_ajax_info['errList']['sex'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sex';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sex

    function ValidateField_umursaatpelayanan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->umursaatpelayanan) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "Umur " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['umursaatpelayanan']))
              {
                  $Campos_Erros['umursaatpelayanan'] = array();
              }
              $Campos_Erros['umursaatpelayanan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['umursaatpelayanan']) || !is_array($this->NM_ajax_info['errList']['umursaatpelayanan']))
              {
                  $this->NM_ajax_info['errList']['umursaatpelayanan'] = array();
              }
              $this->NM_ajax_info['errList']['umursaatpelayanan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'umursaatpelayanan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_umursaatpelayanan

    function ValidateField_kodehakkelas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->kodehakkelas) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Kelas " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['kodehakkelas']))
              {
                  $Campos_Erros['kodehakkelas'] = array();
              }
              $Campos_Erros['kodehakkelas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['kodehakkelas']) || !is_array($this->NM_ajax_info['errList']['kodehakkelas']))
              {
                  $this->NM_ajax_info['errList']['kodehakkelas'] = array();
              }
              $this->NM_ajax_info['errList']['kodehakkelas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kodehakkelas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kodehakkelas

    function ValidateField_keteranganhakkelas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->keteranganhakkelas) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kelas " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['keteranganhakkelas']))
              {
                  $Campos_Erros['keteranganhakkelas'] = array();
              }
              $Campos_Erros['keteranganhakkelas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['keteranganhakkelas']) || !is_array($this->NM_ajax_info['errList']['keteranganhakkelas']))
              {
                  $this->NM_ajax_info['errList']['keteranganhakkelas'] = array();
              }
              $this->NM_ajax_info['errList']['keteranganhakkelas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'keteranganhakkelas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_keteranganhakkelas

    function ValidateField_kodejenispeserta(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->kodejenispeserta) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Jenis Peserta " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['kodejenispeserta']))
              {
                  $Campos_Erros['kodejenispeserta'] = array();
              }
              $Campos_Erros['kodejenispeserta'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['kodejenispeserta']) || !is_array($this->NM_ajax_info['errList']['kodejenispeserta']))
              {
                  $this->NM_ajax_info['errList']['kodejenispeserta'] = array();
              }
              $this->NM_ajax_info['errList']['kodejenispeserta'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kodejenispeserta';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kodejenispeserta

    function ValidateField_keteranganjenispeserta(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->keteranganjenispeserta) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "Jenis Peserta " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['keteranganjenispeserta']))
              {
                  $Campos_Erros['keteranganjenispeserta'] = array();
              }
              $Campos_Erros['keteranganjenispeserta'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['keteranganjenispeserta']) || !is_array($this->NM_ajax_info['errList']['keteranganjenispeserta']))
              {
                  $this->NM_ajax_info['errList']['keteranganjenispeserta'] = array();
              }
              $this->NM_ajax_info['errList']['keteranganjenispeserta'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'keteranganjenispeserta';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_keteranganjenispeserta

    function ValidateField_kdprovider(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->kdprovider) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Provider " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['kdprovider']))
              {
                  $Campos_Erros['kdprovider'] = array();
              }
              $Campos_Erros['kdprovider'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['kdprovider']) || !is_array($this->NM_ajax_info['errList']['kdprovider']))
              {
                  $this->NM_ajax_info['errList']['kdprovider'] = array();
              }
              $this->NM_ajax_info['errList']['kdprovider'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kdprovider';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kdprovider

    function ValidateField_nmprovider(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nmprovider) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nama Provider " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nmprovider']))
              {
                  $Campos_Erros['nmprovider'] = array();
              }
              $Campos_Erros['nmprovider'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nmprovider']) || !is_array($this->NM_ajax_info['errList']['nmprovider']))
              {
                  $this->NM_ajax_info['errList']['nmprovider'] = array();
              }
              $this->NM_ajax_info['errList']['nmprovider'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nmprovider';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nmprovider

    function ValidateField_tglcetakkartu(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tglcetakkartu) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cetak Kartu " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tglcetakkartu']))
              {
                  $Campos_Erros['tglcetakkartu'] = array();
              }
              $Campos_Erros['tglcetakkartu'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tglcetakkartu']) || !is_array($this->NM_ajax_info['errList']['tglcetakkartu']))
              {
                  $this->NM_ajax_info['errList']['tglcetakkartu'] = array();
              }
              $this->NM_ajax_info['errList']['tglcetakkartu'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tglcetakkartu';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tglcetakkartu

    function ValidateField_tgltat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tgltat) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tanggal TAT " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tgltat']))
              {
                  $Campos_Erros['tgltat'] = array();
              }
              $Campos_Erros['tgltat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tgltat']) || !is_array($this->NM_ajax_info['errList']['tgltat']))
              {
                  $this->NM_ajax_info['errList']['tgltat'] = array();
              }
              $this->NM_ajax_info['errList']['tgltat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tgltat';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tgltat

    function ValidateField_tgltmt(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tgltmt) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tanggal TMT " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tgltmt']))
              {
                  $Campos_Erros['tgltmt'] = array();
              }
              $Campos_Erros['tgltmt'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tgltmt']) || !is_array($this->NM_ajax_info['errList']['tgltmt']))
              {
                  $this->NM_ajax_info['errList']['tgltmt'] = array();
              }
              $this->NM_ajax_info['errList']['tgltmt'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tgltmt';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tgltmt

    function ValidateField_nosep(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nosep) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. SEP " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nosep']))
              {
                  $Campos_Erros['nosep'] = array();
              }
              $Campos_Erros['nosep'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nosep']) || !is_array($this->NM_ajax_info['errList']['nosep']))
              {
                  $this->NM_ajax_info['errList']['nosep'] = array();
              }
              $this->NM_ajax_info['errList']['nosep'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nosep';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nosep

    function ValidateField_tglsep(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->tglsep, $this->field_config['tglsep']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['tglsep']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['tglsep']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['tglsep']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['tglsep']['date_sep']) ; 
          if (trim($this->tglsep) != "")  
          { 
              if ($teste_validade->Data($this->tglsep, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tanggal SEP; " ; 
                  if (!isset($Campos_Erros['tglsep']))
                  {
                      $Campos_Erros['tglsep'] = array();
                  }
                  $Campos_Erros['tglsep'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tglsep']) || !is_array($this->NM_ajax_info['errList']['tglsep']))
                  {
                      $this->NM_ajax_info['errList']['tglsep'] = array();
                  }
                  $this->NM_ajax_info['errList']['tglsep'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['tglsep']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tglsep';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tglsep

    function ValidateField_ppkpelayanan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ppkpelayanan) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode PPK " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ppkpelayanan']))
              {
                  $Campos_Erros['ppkpelayanan'] = array();
              }
              $Campos_Erros['ppkpelayanan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ppkpelayanan']) || !is_array($this->NM_ajax_info['errList']['ppkpelayanan']))
              {
                  $this->NM_ajax_info['errList']['ppkpelayanan'] = array();
              }
              $this->NM_ajax_info['errList']['ppkpelayanan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ppkpelayanan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ppkpelayanan

    function ValidateField_nmppkpelayanan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nmppkpelayanan) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "PPK Pelayanan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nmppkpelayanan']))
              {
                  $Campos_Erros['nmppkpelayanan'] = array();
              }
              $Campos_Erros['nmppkpelayanan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nmppkpelayanan']) || !is_array($this->NM_ajax_info['errList']['nmppkpelayanan']))
              {
                  $this->NM_ajax_info['errList']['nmppkpelayanan'] = array();
              }
              $this->NM_ajax_info['errList']['nmppkpelayanan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nmppkpelayanan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nmppkpelayanan

    function ValidateField_jnspelayanan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->jnspelayanan == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'jnspelayanan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_jnspelayanan

    function ValidateField_klsrawat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->klsrawat == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'klsrawat';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_klsrawat

    function ValidateField_nomr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nomr) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. MR " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nomr']))
              {
                  $Campos_Erros['nomr'] = array();
              }
              $Campos_Erros['nomr'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nomr']) || !is_array($this->NM_ajax_info['errList']['nomr']))
              {
                  $this->NM_ajax_info['errList']['nomr'] = array();
              }
              $this->NM_ajax_info['errList']['nomr'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nomr';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nomr

    function ValidateField_asalrujukan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->asalrujukan == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'asalrujukan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_asalrujukan

    function ValidateField_norujukan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->norujukan) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. Rujukan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['norujukan']))
              {
                  $Campos_Erros['norujukan'] = array();
              }
              $Campos_Erros['norujukan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['norujukan']) || !is_array($this->NM_ajax_info['errList']['norujukan']))
              {
                  $this->NM_ajax_info['errList']['norujukan'] = array();
              }
              $this->NM_ajax_info['errList']['norujukan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'norujukan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_norujukan

    function ValidateField_tglrujukan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tglrujukan) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tanggal Rujukan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tglrujukan']))
              {
                  $Campos_Erros['tglrujukan'] = array();
              }
              $Campos_Erros['tglrujukan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tglrujukan']) || !is_array($this->NM_ajax_info['errList']['tglrujukan']))
              {
                  $this->NM_ajax_info['errList']['tglrujukan'] = array();
              }
              $this->NM_ajax_info['errList']['tglrujukan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tglrujukan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tglrujukan

    function ValidateField_ppkrujukan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ppkrujukan) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode PPK Rujukan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ppkrujukan']))
              {
                  $Campos_Erros['ppkrujukan'] = array();
              }
              $Campos_Erros['ppkrujukan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ppkrujukan']) || !is_array($this->NM_ajax_info['errList']['ppkrujukan']))
              {
                  $this->NM_ajax_info['errList']['ppkrujukan'] = array();
              }
              $this->NM_ajax_info['errList']['ppkrujukan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ppkrujukan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ppkrujukan

    function ValidateField_nmppkrujukan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nmppkrujukan) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nama PPK Rujukan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nmppkrujukan']))
              {
                  $Campos_Erros['nmppkrujukan'] = array();
              }
              $Campos_Erros['nmppkrujukan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nmppkrujukan']) || !is_array($this->NM_ajax_info['errList']['nmppkrujukan']))
              {
                  $this->NM_ajax_info['errList']['nmppkrujukan'] = array();
              }
              $this->NM_ajax_info['errList']['nmppkrujukan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nmppkrujukan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nmppkrujukan

    function ValidateField_catatan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->catatan) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Catatan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['catatan']))
              {
                  $Campos_Erros['catatan'] = array();
              }
              $Campos_Erros['catatan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['catatan']) || !is_array($this->NM_ajax_info['errList']['catatan']))
              {
                  $this->NM_ajax_info['errList']['catatan'] = array();
              }
              $this->NM_ajax_info['errList']['catatan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'catatan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_catatan

    function ValidateField_diagawal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->diagawal) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Diag. Awal " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['diagawal']))
              {
                  $Campos_Erros['diagawal'] = array();
              }
              $Campos_Erros['diagawal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['diagawal']) || !is_array($this->NM_ajax_info['errList']['diagawal']))
              {
                  $this->NM_ajax_info['errList']['diagawal'] = array();
              }
              $this->NM_ajax_info['errList']['diagawal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'diagawal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_diagawal

    function ValidateField_nmdiagawal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nmdiagawal) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nama Diag. Awal " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nmdiagawal']))
              {
                  $Campos_Erros['nmdiagawal'] = array();
              }
              $Campos_Erros['nmdiagawal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nmdiagawal']) || !is_array($this->NM_ajax_info['errList']['nmdiagawal']))
              {
                  $this->NM_ajax_info['errList']['nmdiagawal'] = array();
              }
              $this->NM_ajax_info['errList']['nmdiagawal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nmdiagawal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nmdiagawal

    function ValidateField_politujuan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->politujuan) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Poli Tujuan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['politujuan']))
              {
                  $Campos_Erros['politujuan'] = array();
              }
              $Campos_Erros['politujuan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['politujuan']) || !is_array($this->NM_ajax_info['errList']['politujuan']))
              {
                  $this->NM_ajax_info['errList']['politujuan'] = array();
              }
              $this->NM_ajax_info['errList']['politujuan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'politujuan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_politujuan

    function ValidateField_nmpolitujuan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nmpolitujuan) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nama Poli Tujuan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nmpolitujuan']))
              {
                  $Campos_Erros['nmpolitujuan'] = array();
              }
              $Campos_Erros['nmpolitujuan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nmpolitujuan']) || !is_array($this->NM_ajax_info['errList']['nmpolitujuan']))
              {
                  $this->NM_ajax_info['errList']['nmpolitujuan'] = array();
              }
              $this->NM_ajax_info['errList']['nmpolitujuan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nmpolitujuan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nmpolitujuan

    function ValidateField_polieksekutif(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->polieksekutif == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'polieksekutif';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_polieksekutif

    function ValidateField_cob(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cob == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cob';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cob

    function ValidateField_kejadianlakalantas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->kejadianlakalantas == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kejadianlakalantas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kejadianlakalantas

    function ValidateField_penjaminlakalantas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->penjaminlakalantas == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'penjaminlakalantas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_penjaminlakalantas

    function ValidateField_lokasilakalantas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lokasilakalantas) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "Lokasi Laka Lantas " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lokasilakalantas']))
              {
                  $Campos_Erros['lokasilakalantas'] = array();
              }
              $Campos_Erros['lokasilakalantas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lokasilakalantas']) || !is_array($this->NM_ajax_info['errList']['lokasilakalantas']))
              {
                  $this->NM_ajax_info['errList']['lokasilakalantas'] = array();
              }
              $this->NM_ajax_info['errList']['lokasilakalantas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lokasilakalantas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_lokasilakalantas

    function ValidateField_notelp(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->notelp) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. Telepon " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['notelp']))
              {
                  $Campos_Erros['notelp'] = array();
              }
              $Campos_Erros['notelp'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['notelp']) || !is_array($this->NM_ajax_info['errList']['notelp']))
              {
                  $this->NM_ajax_info['errList']['notelp'] = array();
              }
              $this->NM_ajax_info['errList']['notelp'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'notelp';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_notelp

    function ValidateField_user(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->user) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "User " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['user']))
              {
                  $Campos_Erros['user'] = array();
              }
              $Campos_Erros['user'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['user']) || !is_array($this->NM_ajax_info['errList']['user']))
              {
                  $this->NM_ajax_info['errList']['user'] = array();
              }
              $this->NM_ajax_info['errList']['user'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'user';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_user

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
    $this->nmgp_dados_form['nokartu'] = $this->nokartu;
    $this->nmgp_dados_form['nama'] = $this->nama;
    $this->nmgp_dados_form['nik'] = $this->nik;
    $this->nmgp_dados_form['keterangan'] = $this->keterangan;
    $this->nmgp_dados_form['sex'] = $this->sex;
    $this->nmgp_dados_form['umursaatpelayanan'] = $this->umursaatpelayanan;
    $this->nmgp_dados_form['kodehakkelas'] = $this->kodehakkelas;
    $this->nmgp_dados_form['keteranganhakkelas'] = $this->keteranganhakkelas;
    $this->nmgp_dados_form['kodejenispeserta'] = $this->kodejenispeserta;
    $this->nmgp_dados_form['keteranganjenispeserta'] = $this->keteranganjenispeserta;
    $this->nmgp_dados_form['kdprovider'] = $this->kdprovider;
    $this->nmgp_dados_form['nmprovider'] = $this->nmprovider;
    $this->nmgp_dados_form['tglcetakkartu'] = $this->tglcetakkartu;
    $this->nmgp_dados_form['tgltat'] = $this->tgltat;
    $this->nmgp_dados_form['tgltmt'] = $this->tgltmt;
    $this->nmgp_dados_form['nosep'] = $this->nosep;
    $this->nmgp_dados_form['tglsep'] = $this->tglsep;
    $this->nmgp_dados_form['ppkpelayanan'] = $this->ppkpelayanan;
    $this->nmgp_dados_form['nmppkpelayanan'] = $this->nmppkpelayanan;
    $this->nmgp_dados_form['jnspelayanan'] = $this->jnspelayanan;
    $this->nmgp_dados_form['klsrawat'] = $this->klsrawat;
    $this->nmgp_dados_form['nomr'] = $this->nomr;
    $this->nmgp_dados_form['asalrujukan'] = $this->asalrujukan;
    $this->nmgp_dados_form['norujukan'] = $this->norujukan;
    $this->nmgp_dados_form['tglrujukan'] = $this->tglrujukan;
    $this->nmgp_dados_form['ppkrujukan'] = $this->ppkrujukan;
    $this->nmgp_dados_form['nmppkrujukan'] = $this->nmppkrujukan;
    $this->nmgp_dados_form['catatan'] = $this->catatan;
    $this->nmgp_dados_form['diagawal'] = $this->diagawal;
    $this->nmgp_dados_form['nmdiagawal'] = $this->nmdiagawal;
    $this->nmgp_dados_form['politujuan'] = $this->politujuan;
    $this->nmgp_dados_form['nmpolitujuan'] = $this->nmpolitujuan;
    $this->nmgp_dados_form['polieksekutif'] = $this->polieksekutif;
    $this->nmgp_dados_form['cob'] = $this->cob;
    $this->nmgp_dados_form['kejadianlakalantas'] = $this->kejadianlakalantas;
    $this->nmgp_dados_form['penjaminlakalantas'] = $this->penjaminlakalantas;
    $this->nmgp_dados_form['lokasilakalantas'] = $this->lokasilakalantas;
    $this->nmgp_dados_form['notelp'] = $this->notelp;
    $this->nmgp_dados_form['user'] = $this->user;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['tglsep'] = $this->tglsep;
      nm_limpa_data($this->tglsep, $this->field_config['tglsep']['date_sep']) ; 
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
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      $this->tglsep = trim($this->tglsep);
      if ($this->tglsep == "00000000")
      {
          $this->tglsep = "";
      }
      if (!empty($this->tglsep) || (!empty($format_fields) && isset($format_fields['tglsep'])))
      {
          nm_conv_form_data($this->tglsep, "YYYYMMDD", $this->field_config['tglsep']['date_format'], array($this->field_config['tglsep']['date_sep'])) ;  
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
      if ($this->tglsep != "")  
      {
     nm_conv_form_data($this->tglsep, $this->field_config['tglsep']['date_format'], "YYYYMMDD", array($this->field_config['tglsep']['date_sep'])) ;  
      }
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

   function ajax_return_values()
   {
          $this->ajax_return_values_nokartu();
          $this->ajax_return_values_nama();
          $this->ajax_return_values_nik();
          $this->ajax_return_values_keterangan();
          $this->ajax_return_values_sex();
          $this->ajax_return_values_umursaatpelayanan();
          $this->ajax_return_values_kodehakkelas();
          $this->ajax_return_values_keteranganhakkelas();
          $this->ajax_return_values_kodejenispeserta();
          $this->ajax_return_values_keteranganjenispeserta();
          $this->ajax_return_values_kdprovider();
          $this->ajax_return_values_nmprovider();
          $this->ajax_return_values_tglcetakkartu();
          $this->ajax_return_values_tgltat();
          $this->ajax_return_values_tgltmt();
          $this->ajax_return_values_nosep();
          $this->ajax_return_values_tglsep();
          $this->ajax_return_values_ppkpelayanan();
          $this->ajax_return_values_nmppkpelayanan();
          $this->ajax_return_values_jnspelayanan();
          $this->ajax_return_values_klsrawat();
          $this->ajax_return_values_nomr();
          $this->ajax_return_values_asalrujukan();
          $this->ajax_return_values_norujukan();
          $this->ajax_return_values_tglrujukan();
          $this->ajax_return_values_ppkrujukan();
          $this->ajax_return_values_nmppkrujukan();
          $this->ajax_return_values_catatan();
          $this->ajax_return_values_diagawal();
          $this->ajax_return_values_nmdiagawal();
          $this->ajax_return_values_politujuan();
          $this->ajax_return_values_nmpolitujuan();
          $this->ajax_return_values_polieksekutif();
          $this->ajax_return_values_cob();
          $this->ajax_return_values_kejadianlakalantas();
          $this->ajax_return_values_penjaminlakalantas();
          $this->ajax_return_values_lokasilakalantas();
          $this->ajax_return_values_notelp();
          $this->ajax_return_values_user();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- nokartu
   function ajax_return_values_nokartu($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nokartu", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nokartu);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nokartu'] = array(
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nama'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nik
   function ajax_return_values_nik($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nik", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nik);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nik'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- keterangan
   function ajax_return_values_keterangan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("keterangan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->keterangan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['keterangan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- sex
   function ajax_return_values_sex($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sex", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sex);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sex'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- umursaatpelayanan
   function ajax_return_values_umursaatpelayanan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("umursaatpelayanan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->umursaatpelayanan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['umursaatpelayanan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- kodehakkelas
   function ajax_return_values_kodehakkelas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kodehakkelas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kodehakkelas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['kodehakkelas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- keteranganhakkelas
   function ajax_return_values_keteranganhakkelas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("keteranganhakkelas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->keteranganhakkelas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['keteranganhakkelas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- kodejenispeserta
   function ajax_return_values_kodejenispeserta($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kodejenispeserta", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kodejenispeserta);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['kodejenispeserta'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- keteranganjenispeserta
   function ajax_return_values_keteranganjenispeserta($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("keteranganjenispeserta", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->keteranganjenispeserta);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['keteranganjenispeserta'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- kdprovider
   function ajax_return_values_kdprovider($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kdprovider", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kdprovider);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['kdprovider'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nmprovider
   function ajax_return_values_nmprovider($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nmprovider", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nmprovider);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nmprovider'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tglcetakkartu
   function ajax_return_values_tglcetakkartu($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tglcetakkartu", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tglcetakkartu);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tglcetakkartu'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tgltat
   function ajax_return_values_tgltat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tgltat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tgltat);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tgltat'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tgltmt
   function ajax_return_values_tgltmt($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tgltmt", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tgltmt);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tgltmt'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nosep
   function ajax_return_values_nosep($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nosep", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nosep);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nosep'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tglsep
   function ajax_return_values_tglsep($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tglsep", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tglsep);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tglsep'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ppkpelayanan
   function ajax_return_values_ppkpelayanan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ppkpelayanan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ppkpelayanan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ppkpelayanan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nmppkpelayanan
   function ajax_return_values_nmppkpelayanan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nmppkpelayanan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nmppkpelayanan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nmppkpelayanan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- jnspelayanan
   function ajax_return_values_jnspelayanan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jnspelayanan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jnspelayanan);
              $aLookup = array();
              $this->_tmp_lookup_jnspelayanan = $this->jnspelayanan;

$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('1') => form_vclaim_sep_update_mob_pack_protect_string("Rawat Inap"));
$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('2') => form_vclaim_sep_update_mob_pack_protect_string("Rawat Jalan"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_jnspelayanan'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_jnspelayanan'][] = '2';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"jnspelayanan\"";
          if (isset($this->NM_ajax_info['select_html']['jnspelayanan']) && !empty($this->NM_ajax_info['select_html']['jnspelayanan']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['jnspelayanan'];
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

                  if ($this->jnspelayanan == $sValue)
                  {
                      $this->_tmp_lookup_jnspelayanan = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['jnspelayanan'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['jnspelayanan']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['jnspelayanan']['valList'][$i] = form_vclaim_sep_update_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['jnspelayanan']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['jnspelayanan']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['jnspelayanan']['labList'] = $aLabel;
          }
   }

          //----- klsrawat
   function ajax_return_values_klsrawat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("klsrawat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->klsrawat);
              $aLookup = array();
              $this->_tmp_lookup_klsrawat = $this->klsrawat;

$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('1') => form_vclaim_sep_update_mob_pack_protect_string("Kelas 1"));
$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('2') => form_vclaim_sep_update_mob_pack_protect_string("Kelas 2"));
$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('3') => form_vclaim_sep_update_mob_pack_protect_string("Kelas 3"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_klsrawat'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_klsrawat'][] = '2';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_klsrawat'][] = '3';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"klsrawat\"";
          if (isset($this->NM_ajax_info['select_html']['klsrawat']) && !empty($this->NM_ajax_info['select_html']['klsrawat']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['klsrawat'];
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

                  if ($this->klsrawat == $sValue)
                  {
                      $this->_tmp_lookup_klsrawat = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['klsrawat'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['klsrawat']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['klsrawat']['valList'][$i] = form_vclaim_sep_update_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['klsrawat']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['klsrawat']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['klsrawat']['labList'] = $aLabel;
          }
   }

          //----- nomr
   function ajax_return_values_nomr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nomr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nomr);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nomr'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- asalrujukan
   function ajax_return_values_asalrujukan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("asalrujukan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->asalrujukan);
              $aLookup = array();
              $this->_tmp_lookup_asalrujukan = $this->asalrujukan;

$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('1') => form_vclaim_sep_update_mob_pack_protect_string("Faskes 1"));
$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('2') => form_vclaim_sep_update_mob_pack_protect_string("Faskes 2"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_asalrujukan'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_asalrujukan'][] = '2';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"asalrujukan\"";
          if (isset($this->NM_ajax_info['select_html']['asalrujukan']) && !empty($this->NM_ajax_info['select_html']['asalrujukan']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['asalrujukan'];
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

                  if ($this->asalrujukan == $sValue)
                  {
                      $this->_tmp_lookup_asalrujukan = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['asalrujukan'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['asalrujukan']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['asalrujukan']['valList'][$i] = form_vclaim_sep_update_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['asalrujukan']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['asalrujukan']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['asalrujukan']['labList'] = $aLabel;
          }
   }

          //----- norujukan
   function ajax_return_values_norujukan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("norujukan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->norujukan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['norujukan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tglrujukan
   function ajax_return_values_tglrujukan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tglrujukan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tglrujukan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tglrujukan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- ppkrujukan
   function ajax_return_values_ppkrujukan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ppkrujukan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ppkrujukan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ppkrujukan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nmppkrujukan
   function ajax_return_values_nmppkrujukan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nmppkrujukan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nmppkrujukan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nmppkrujukan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- catatan
   function ajax_return_values_catatan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("catatan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->catatan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['catatan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- diagawal
   function ajax_return_values_diagawal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("diagawal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->diagawal);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['diagawal'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nmdiagawal
   function ajax_return_values_nmdiagawal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nmdiagawal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nmdiagawal);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nmdiagawal'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- politujuan
   function ajax_return_values_politujuan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("politujuan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->politujuan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['politujuan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nmpolitujuan
   function ajax_return_values_nmpolitujuan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nmpolitujuan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nmpolitujuan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nmpolitujuan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- polieksekutif
   function ajax_return_values_polieksekutif($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("polieksekutif", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->polieksekutif);
              $aLookup = array();
              $this->_tmp_lookup_polieksekutif = $this->polieksekutif;

$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('0') => form_vclaim_sep_update_mob_pack_protect_string("Tidak"));
$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('1') => form_vclaim_sep_update_mob_pack_protect_string("Ya"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_polieksekutif'][] = '0';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_polieksekutif'][] = '1';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"polieksekutif\"";
          if (isset($this->NM_ajax_info['select_html']['polieksekutif']) && !empty($this->NM_ajax_info['select_html']['polieksekutif']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['polieksekutif'];
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

                  if ($this->polieksekutif == $sValue)
                  {
                      $this->_tmp_lookup_polieksekutif = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['polieksekutif'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['polieksekutif']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['polieksekutif']['valList'][$i] = form_vclaim_sep_update_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['polieksekutif']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['polieksekutif']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['polieksekutif']['labList'] = $aLabel;
          }
   }

          //----- cob
   function ajax_return_values_cob($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cob", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cob);
              $aLookup = array();
              $this->_tmp_lookup_cob = $this->cob;

$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('0') => form_vclaim_sep_update_mob_pack_protect_string("Tidak"));
$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('1') => form_vclaim_sep_update_mob_pack_protect_string("Ya"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_cob'][] = '0';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_cob'][] = '1';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"cob\"";
          if (isset($this->NM_ajax_info['select_html']['cob']) && !empty($this->NM_ajax_info['select_html']['cob']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['cob'];
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

                  if ($this->cob == $sValue)
                  {
                      $this->_tmp_lookup_cob = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['cob'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cob']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cob']['valList'][$i] = form_vclaim_sep_update_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cob']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cob']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cob']['labList'] = $aLabel;
          }
   }

          //----- kejadianlakalantas
   function ajax_return_values_kejadianlakalantas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kejadianlakalantas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kejadianlakalantas);
              $aLookup = array();
              $this->_tmp_lookup_kejadianlakalantas = $this->kejadianlakalantas;

$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('0') => form_vclaim_sep_update_mob_pack_protect_string("Tidak"));
$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('1') => form_vclaim_sep_update_mob_pack_protect_string("Ya"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_kejadianlakalantas'][] = '0';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_kejadianlakalantas'][] = '1';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"kejadianlakalantas\"";
          if (isset($this->NM_ajax_info['select_html']['kejadianlakalantas']) && !empty($this->NM_ajax_info['select_html']['kejadianlakalantas']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['kejadianlakalantas'];
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

                  if ($this->kejadianlakalantas == $sValue)
                  {
                      $this->_tmp_lookup_kejadianlakalantas = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['kejadianlakalantas'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['kejadianlakalantas']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['kejadianlakalantas']['valList'][$i] = form_vclaim_sep_update_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['kejadianlakalantas']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['kejadianlakalantas']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['kejadianlakalantas']['labList'] = $aLabel;
          }
   }

          //----- penjaminlakalantas
   function ajax_return_values_penjaminlakalantas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("penjaminlakalantas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->penjaminlakalantas);
              $aLookup = array();
              $this->_tmp_lookup_penjaminlakalantas = $this->penjaminlakalantas;

$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('1') => form_vclaim_sep_update_mob_pack_protect_string("JASA RAHARJA"));
$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('2') => form_vclaim_sep_update_mob_pack_protect_string("BPJS KETENAGAKERJAAN"));
$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('3') => form_vclaim_sep_update_mob_pack_protect_string("TASPEN, PT"));
$aLookup[] = array(form_vclaim_sep_update_mob_pack_protect_string('4') => form_vclaim_sep_update_mob_pack_protect_string("ASABRI,PT"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_penjaminlakalantas'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_penjaminlakalantas'][] = '2';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_penjaminlakalantas'][] = '3';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['Lookup_penjaminlakalantas'][] = '4';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"penjaminlakalantas\"";
          if (isset($this->NM_ajax_info['select_html']['penjaminlakalantas']) && !empty($this->NM_ajax_info['select_html']['penjaminlakalantas']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['penjaminlakalantas'];
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

                  if ($this->penjaminlakalantas == $sValue)
                  {
                      $this->_tmp_lookup_penjaminlakalantas = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['penjaminlakalantas'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['penjaminlakalantas']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['penjaminlakalantas']['valList'][$i] = form_vclaim_sep_update_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['penjaminlakalantas']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['penjaminlakalantas']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['penjaminlakalantas']['labList'] = $aLabel;
          }
   }

          //----- lokasilakalantas
   function ajax_return_values_lokasilakalantas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lokasilakalantas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lokasilakalantas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lokasilakalantas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- notelp
   function ajax_return_values_notelp($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("notelp", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->notelp);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['notelp'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- user
   function ajax_return_values_user($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("user", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->user);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['user'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['upload_dir'][$fieldName][] = $newName;
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_vclaim_sep_update_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['scriptcase']['nm_sc_retorno']; 
      } 
    $this->nm_formatar_campos();
        $this->initFormPages();
    include_once("form_vclaim_sep_update_mob_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['csrf_token'];
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

   function Form_lookup_jnspelayanan()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Rawat Inap?#?1?#?N?@?";
       $nmgp_def_dados .= "Rawat Jalan?#?2?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_klsrawat()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Kelas 1?#?1?#?N?@?";
       $nmgp_def_dados .= "Kelas 2?#?2?#?N?@?";
       $nmgp_def_dados .= "Kelas 3?#?3?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_asalrujukan()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Faskes 1?#?1?#?N?@?";
       $nmgp_def_dados .= "Faskes 2?#?2?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_polieksekutif()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Tidak?#?0?#?N?@?";
       $nmgp_def_dados .= "Ya?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_cob()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Tidak?#?0?#?N?@?";
       $nmgp_def_dados .= "Ya?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_kejadianlakalantas()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Tidak?#?0?#?N?@?";
       $nmgp_def_dados .= "Ya?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_penjaminlakalantas()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "JASA RAHARJA?#?1?#?N?@?";
       $nmgp_def_dados .= "BPJS KETENAGAKERJAAN?#?2?#?N?@?";
       $nmgp_def_dados .= "TASPEN, PT?#?3?#?N?@?";
       $nmgp_def_dados .= "ASABRI,PT?#?4?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

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
       $nmgp_saida_form = "form_vclaim_sep_update_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_vclaim_sep_update_mob_fim.php";
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
       form_vclaim_sep_update_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_sep_update_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_vclaim_sep_update_mob_pack_ajax_response();
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
       form_vclaim_sep_update_mob_pack_ajax_response();
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
}
?>
