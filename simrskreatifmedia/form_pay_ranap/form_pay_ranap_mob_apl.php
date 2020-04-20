<?php
//
class form_pay_ranap_mob_apl
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
   var $nostruk;
   var $nostruk_1;
   var $custcode;
   var $custcode_1;
   var $dokter;
   var $dokter_1;
   var $jmltagihan;
   var $jmlbayar;
   var $deposit;
   var $potongan;
   var $hrsdibayar;
   var $trandate;
   var $trandate_hora;
   var $terimadari;
   var $jenispayment;
   var $jenispayment_1;
   var $instansipenjamin;
   var $bankdebit;
   var $bankdebit_1;
   var $nokartu;
   var $sc_field_0;
   var $lunas;
   var $paiddate;
   var $paiddate_hora;
   var $nopayment;
   var $kasir;
   var $kode_akun;
   var $jmldk1;
   var $jmldk2;
   var $jmlasr;
   var $jmlkary;
   var $edc1;
   var $edc1_1;
   var $edc2;
   var $edc2_1;
   var $selisihpaket;
   var $kodepaket;
   var $kodepaket_1;
   var $lab;
   var $sc_field_1;
   var $sc_field_1_1;
   var $poli;
   var $poli_1;
   var $rad;
   var $sc_field_2;
   var $bhp;
   var $detailadm;
   var $detailkamar;
   var $detailresep;
   var $detailtindakan;
   var $detailresepokvk;
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
          if (isset($this->NM_ajax_info['param']['bankdebit']))
          {
              $this->bankdebit = $this->NM_ajax_info['param']['bankdebit'];
          }
          if (isset($this->NM_ajax_info['param']['bhp']))
          {
              $this->bhp = $this->NM_ajax_info['param']['bhp'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['custcode']))
          {
              $this->custcode = $this->NM_ajax_info['param']['custcode'];
          }
          if (isset($this->NM_ajax_info['param']['deposit']))
          {
              $this->deposit = $this->NM_ajax_info['param']['deposit'];
          }
          if (isset($this->NM_ajax_info['param']['detailadm']))
          {
              $this->detailadm = $this->NM_ajax_info['param']['detailadm'];
          }
          if (isset($this->NM_ajax_info['param']['detailkamar']))
          {
              $this->detailkamar = $this->NM_ajax_info['param']['detailkamar'];
          }
          if (isset($this->NM_ajax_info['param']['detailresep']))
          {
              $this->detailresep = $this->NM_ajax_info['param']['detailresep'];
          }
          if (isset($this->NM_ajax_info['param']['detailresepokvk']))
          {
              $this->detailresepokvk = $this->NM_ajax_info['param']['detailresepokvk'];
          }
          if (isset($this->NM_ajax_info['param']['detailtindakan']))
          {
              $this->detailtindakan = $this->NM_ajax_info['param']['detailtindakan'];
          }
          if (isset($this->NM_ajax_info['param']['dokter']))
          {
              $this->dokter = $this->NM_ajax_info['param']['dokter'];
          }
          if (isset($this->NM_ajax_info['param']['edc1']))
          {
              $this->edc1 = $this->NM_ajax_info['param']['edc1'];
          }
          if (isset($this->NM_ajax_info['param']['edc2']))
          {
              $this->edc2 = $this->NM_ajax_info['param']['edc2'];
          }
          if (isset($this->NM_ajax_info['param']['hrsdibayar']))
          {
              $this->hrsdibayar = $this->NM_ajax_info['param']['hrsdibayar'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['instansipenjamin']))
          {
              $this->instansipenjamin = $this->NM_ajax_info['param']['instansipenjamin'];
          }
          if (isset($this->NM_ajax_info['param']['jenispayment']))
          {
              $this->jenispayment = $this->NM_ajax_info['param']['jenispayment'];
          }
          if (isset($this->NM_ajax_info['param']['jmlasr']))
          {
              $this->jmlasr = $this->NM_ajax_info['param']['jmlasr'];
          }
          if (isset($this->NM_ajax_info['param']['jmlbayar']))
          {
              $this->jmlbayar = $this->NM_ajax_info['param']['jmlbayar'];
          }
          if (isset($this->NM_ajax_info['param']['jmldk1']))
          {
              $this->jmldk1 = $this->NM_ajax_info['param']['jmldk1'];
          }
          if (isset($this->NM_ajax_info['param']['jmldk2']))
          {
              $this->jmldk2 = $this->NM_ajax_info['param']['jmldk2'];
          }
          if (isset($this->NM_ajax_info['param']['jmlkary']))
          {
              $this->jmlkary = $this->NM_ajax_info['param']['jmlkary'];
          }
          if (isset($this->NM_ajax_info['param']['jmltagihan']))
          {
              $this->jmltagihan = $this->NM_ajax_info['param']['jmltagihan'];
          }
          if (isset($this->NM_ajax_info['param']['kasir']))
          {
              $this->kasir = $this->NM_ajax_info['param']['kasir'];
          }
          if (isset($this->NM_ajax_info['param']['kode_akun']))
          {
              $this->kode_akun = $this->NM_ajax_info['param']['kode_akun'];
          }
          if (isset($this->NM_ajax_info['param']['kodepaket']))
          {
              $this->kodepaket = $this->NM_ajax_info['param']['kodepaket'];
          }
          if (isset($this->NM_ajax_info['param']['lab']))
          {
              $this->lab = $this->NM_ajax_info['param']['lab'];
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
          if (isset($this->NM_ajax_info['param']['nokartu']))
          {
              $this->nokartu = $this->NM_ajax_info['param']['nokartu'];
          }
          if (isset($this->NM_ajax_info['param']['nopayment']))
          {
              $this->nopayment = $this->NM_ajax_info['param']['nopayment'];
          }
          if (isset($this->NM_ajax_info['param']['nostruk']))
          {
              $this->nostruk = $this->NM_ajax_info['param']['nostruk'];
          }
          if (isset($this->NM_ajax_info['param']['paiddate']))
          {
              $this->paiddate = $this->NM_ajax_info['param']['paiddate'];
          }
          if (isset($this->NM_ajax_info['param']['poli']))
          {
              $this->poli = $this->NM_ajax_info['param']['poli'];
          }
          if (isset($this->NM_ajax_info['param']['potongan']))
          {
              $this->potongan = $this->NM_ajax_info['param']['potongan'];
          }
          if (isset($this->NM_ajax_info['param']['rad']))
          {
              $this->rad = $this->NM_ajax_info['param']['rad'];
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
          if (isset($this->NM_ajax_info['param']['selisihpaket']))
          {
              $this->selisihpaket = $this->NM_ajax_info['param']['selisihpaket'];
          }
          if (isset($this->NM_ajax_info['param']['terimadari']))
          {
              $this->terimadari = $this->NM_ajax_info['param']['terimadari'];
          }
          if (isset($this->NM_ajax_info['param']['trancode']))
          {
              $this->trancode = $this->NM_ajax_info['param']['trancode'];
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
      $this->sc_conv_var['jaminan/polis'] = "sc_field_0";
      $this->sc_conv_var['nama pasien'] = "sc_field_1";
      $this->sc_conv_var['tind operasi'] = "sc_field_2";
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
      if (isset($this->payno) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['payno'] = $this->payno;
      }
      if (isset($this->strukRI) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['strukRI'] = $this->strukRI;
      }
      if (isset($this->trancode_s) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['trancode_s'] = $this->trancode_s;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["payno"]) && isset($this->payno)) 
      {
          $_SESSION['payno'] = $this->payno;
      }
      if (isset($_POST["strukRI"]) && isset($this->strukRI)) 
      {
          $_SESSION['strukRI'] = $this->strukRI;
      }
      if (!isset($_POST["strukRI"]) && isset($_POST["strukri"])) 
      {
          $_SESSION['strukRI'] = $this->strukri;
      }
      if (isset($_POST["trancode_s"]) && isset($this->trancode_s)) 
      {
          $_SESSION['trancode_s'] = $this->trancode_s;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["payno"]) && isset($this->payno)) 
      {
          $_SESSION['payno'] = $this->payno;
      }
      if (isset($_GET["strukRI"]) && isset($this->strukRI)) 
      {
          $_SESSION['strukRI'] = $this->strukRI;
      }
      if (!isset($_GET["strukRI"]) && isset($_GET["strukri"])) 
      {
          $_SESSION['strukRI'] = $this->strukri;
      }
      if (isset($_GET["trancode_s"]) && isset($this->trancode_s)) 
      {
          $_SESSION['trancode_s'] = $this->trancode_s;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['embutida_parms']);
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
                 nm_limpa_str_form_pay_ranap_mob($cadapar[1]);
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
          if (isset($this->payno)) 
          {
              $_SESSION['payno'] = $this->payno;
          }
          if (!isset($this->strukRI) && isset($this->strukri)) 
          {
              $this->strukRI = $this->strukri;
          }
          if (isset($this->strukRI)) 
          {
              $_SESSION['strukRI'] = $this->strukRI;
          }
          if (isset($this->trancode_s)) 
          {
              $_SESSION['trancode_s'] = $this->trancode_s;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->payno)) 
          {
              $_SESSION['payno'] = $this->payno;
          }
          if (!isset($this->strukRI) && isset($this->strukri)) 
          {
              $this->strukRI = $this->strukri;
          }
          if (isset($this->strukRI)) 
          {
              $_SESSION['strukRI'] = $this->strukRI;
          }
          if (isset($this->trancode_s)) 
          {
              $_SESSION['trancode_s'] = $this->trancode_s;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->paiddate);
          $this->paiddate      = $aDtParts[0];
          $this->paiddate_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_pay_ranap_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("id");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("id");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_pay_ranap_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_pay_ranap_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_pay_ranap_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_pay_ranap_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_pay_ranap_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_pay_ranap_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_pay_ranap_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Pembayaran RI";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_pay_ranap_mob")
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


      $this->arr_buttons['cetak']['hint']             = "";
      $this->arr_buttons['cetak']['type']             = "button";
      $this->arr_buttons['cetak']['value']            = "Cetak";
      $this->arr_buttons['cetak']['display']          = "only_text";
      $this->arr_buttons['cetak']['display_position'] = "text_right";
      $this->arr_buttons['cetak']['style']            = "default";
      $this->arr_buttons['cetak']['image']            = "";

      $this->arr_buttons['sc_btn_0']['hint']             = "";
      $this->arr_buttons['sc_btn_0']['type']             = "button";
      $this->arr_buttons['sc_btn_0']['value']            = "Cetak Pembayaran Deposit";
      $this->arr_buttons['sc_btn_0']['display']          = "only_text";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "default";
      $this->arr_buttons['sc_btn_0']['image']            = "";

      $this->arr_buttons['sc_btn_1']['hint']             = "Pilih Kode Pelayanan terlebih dahulu";
      $this->arr_buttons['sc_btn_1']['type']             = "button";
      $this->arr_buttons['sc_btn_1']['value']            = "Preview Billing";
      $this->arr_buttons['sc_btn_1']['display']          = "only_text";
      $this->arr_buttons['sc_btn_1']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_1']['style']            = "default";
      $this->arr_buttons['sc_btn_1']['image']            = "";

      $this->arr_buttons['sc_btn_2']['hint']             = "";
      $this->arr_buttons['sc_btn_2']['type']             = "button";
      $this->arr_buttons['sc_btn_2']['value']            = "Bill & Pembayaran";
      $this->arr_buttons['sc_btn_2']['display']          = "only_text";
      $this->arr_buttons['sc_btn_2']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_2']['style']            = "default";
      $this->arr_buttons['sc_btn_2']['image']            = "";

      $this->arr_buttons['sc_btn_3']['hint']             = "";
      $this->arr_buttons['sc_btn_3']['type']             = "button";
      $this->arr_buttons['sc_btn_3']['value']            = "Cetak Kwintansi";
      $this->arr_buttons['sc_btn_3']['display']          = "only_text";
      $this->arr_buttons['sc_btn_3']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_3']['style']            = "default";
      $this->arr_buttons['sc_btn_3']['image']            = "";

      $this->arr_buttons['sc_btn_4']['hint']             = "";
      $this->arr_buttons['sc_btn_4']['type']             = "button";
      $this->arr_buttons['sc_btn_4']['value']            = "Cetak Billing";
      $this->arr_buttons['sc_btn_4']['display']          = "only_text";
      $this->arr_buttons['sc_btn_4']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_4']['style']            = "default";
      $this->arr_buttons['sc_btn_4']['image']            = "";

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


      $_SESSION['scriptcase']['error_icon']['form_pay_ranap_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_pay_ranap_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['goto']      = 'on';
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
      $this->nmgp_botoes['Cetak'] = "on";
      $this->nmgp_botoes['sc_btn_0'] = "on";
      $this->nmgp_botoes['sc_btn_1'] = "on";
      $this->nmgp_botoes['sc_btn_2'] = "on";
      $this->nmgp_botoes['sc_btn_3'] = "on";
      $this->nmgp_botoes['sc_btn_4'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_pay_ranap_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_pay_ranap_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_pay_ranap_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_form'];
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['jmlbayar'] != "null"){$this->jmlbayar = $this->nmgp_dados_form['jmlbayar'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['potongan'] != "null"){$this->potongan = $this->nmgp_dados_form['potongan'];} 
          if (!isset($this->trandate)){$this->trandate = $this->nmgp_dados_form['trandate'];} 
          if (!isset($this->lunas)){$this->lunas = $this->nmgp_dados_form['lunas'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['nopayment'] != "null"){$this->nopayment = $this->nmgp_dados_form['nopayment'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['jmldk1'] != "null"){$this->jmldk1 = $this->nmgp_dados_form['jmldk1'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['jmldk2'] != "null"){$this->jmldk2 = $this->nmgp_dados_form['jmldk2'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['jmlasr'] != "null"){$this->jmlasr = $this->nmgp_dados_form['jmlasr'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['jmlkary'] != "null"){$this->jmlkary = $this->nmgp_dados_form['jmlkary'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_pay_ranap_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_pay_ranap/form_pay_ranap_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_pay_ranap_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_pay_ranap_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_pay_ranap_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_pay_ranap/form_pay_ranap_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_pay_ranap_mob_erro.class.php"); 
      }
      $this->Erro      = new form_pay_ranap_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_pay_ranap_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['Cetak'] = "off";
          $this->nmgp_botoes['sc_btn_0'] = "off";
          $this->nmgp_botoes['sc_btn_1'] = "on";
          $this->nmgp_botoes['sc_btn_2'] = "off";
          $this->nmgp_botoes['sc_btn_3'] = "off";
          $this->nmgp_botoes['sc_btn_4'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['Cetak'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['botoes']['Cetak'];
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['botoes']['sc_btn_0'];
          $this->nmgp_botoes['sc_btn_1'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['botoes']['sc_btn_1'];
          $this->nmgp_botoes['sc_btn_2'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['botoes']['sc_btn_2'];
          $this->nmgp_botoes['sc_btn_3'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['botoes']['sc_btn_3'];
          $this->nmgp_botoes['sc_btn_4'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['botoes']['sc_btn_4'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_form'];
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
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbbillruang_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbbillruang_mob') . "/form_tbbillruang_mob_apl.php");
          $this->form_tbbillruang_mob = new form_tbbillruang_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbtindakanrawatinap_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbtindakanrawatinap_mob') . "/form_tbtindakanrawatinap_mob_apl.php");
          $this->form_tbtindakanrawatinap_mob = new form_tbtindakanrawatinap_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbtim_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbtim_mob') . "/form_tbtim_mob_apl.php");
          $this->form_tbtim_mob = new form_tbtim_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbbhprawatinap_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbbhprawatinap_mob') . "/form_tbbhprawatinap_mob_apl.php");
          $this->form_tbbhprawatinap_mob = new form_tbbhprawatinap_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbdetailresepokvk_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbdetailresepokvk_mob') . "/form_tbdetailresepokvk_mob_apl.php");
          $this->form_tbdetailresepokvk_mob = new form_tbdetailresepokvk_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbrujukanlab_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbrujukanlab_mob') . "/form_tbrujukanlab_mob_apl.php");
          $this->form_tbrujukanlab_mob = new form_tbrujukanlab_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbrujukanradiologi_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbrujukanradiologi_mob') . "/form_tbrujukanradiologi_mob_apl.php");
          $this->form_tbrujukanradiologi_mob = new form_tbrujukanradiologi_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_detailadm_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_detailadm_mob') . "/form_detailadm_mob_apl.php");
          $this->form_detailadm_mob = new form_detailadm_mob_apl;
      }
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
      if (isset($this->trancode)) { $this->nm_limpa_alfa($this->trancode); }
      if (isset($this->nostruk)) { $this->nm_limpa_alfa($this->nostruk); }
      if (isset($this->custcode)) { $this->nm_limpa_alfa($this->custcode); }
      if (isset($this->dokter)) { $this->nm_limpa_alfa($this->dokter); }
      if (isset($this->jmltagihan)) { $this->nm_limpa_alfa($this->jmltagihan); }
      if (isset($this->jmlbayar)) { $this->nm_limpa_alfa($this->jmlbayar); }
      if (isset($this->deposit)) { $this->nm_limpa_alfa($this->deposit); }
      if (isset($this->potongan)) { $this->nm_limpa_alfa($this->potongan); }
      if (isset($this->hrsdibayar)) { $this->nm_limpa_alfa($this->hrsdibayar); }
      if (isset($this->terimadari)) { $this->nm_limpa_alfa($this->terimadari); }
      if (isset($this->jenispayment)) { $this->nm_limpa_alfa($this->jenispayment); }
      if (isset($this->instansipenjamin)) { $this->nm_limpa_alfa($this->instansipenjamin); }
      if (isset($this->bankdebit)) { $this->nm_limpa_alfa($this->bankdebit); }
      if (isset($this->nokartu)) { $this->nm_limpa_alfa($this->nokartu); }
      if (isset($this->sc_field_0)) { $this->nm_limpa_alfa($this->sc_field_0); }
      if (isset($this->nopayment)) { $this->nm_limpa_alfa($this->nopayment); }
      if (isset($this->kasir)) { $this->nm_limpa_alfa($this->kasir); }
      if (isset($this->kode_akun)) { $this->nm_limpa_alfa($this->kode_akun); }
      if (isset($this->jmldk1)) { $this->nm_limpa_alfa($this->jmldk1); }
      if (isset($this->jmldk2)) { $this->nm_limpa_alfa($this->jmldk2); }
      if (isset($this->jmlasr)) { $this->nm_limpa_alfa($this->jmlasr); }
      if (isset($this->jmlkary)) { $this->nm_limpa_alfa($this->jmlkary); }
      if (isset($this->edc1)) { $this->nm_limpa_alfa($this->edc1); }
      if (isset($this->edc2)) { $this->nm_limpa_alfa($this->edc2); }
      if (isset($this->selisihpaket)) { $this->nm_limpa_alfa($this->selisihpaket); }
      if (isset($this->kodepaket)) { $this->nm_limpa_alfa($this->kodepaket); }
      if (isset($this->lab)) { $this->nm_limpa_alfa($this->lab); }
      if (isset($this->rad)) { $this->nm_limpa_alfa($this->rad); }
      if (isset($this->sc_field_2)) { $this->nm_limpa_alfa($this->sc_field_2); }
      if (isset($this->bhp)) { $this->nm_limpa_alfa($this->bhp); }
      if (isset($this->detailadm)) { $this->nm_limpa_alfa($this->detailadm); }
      if (isset($this->detailkamar)) { $this->nm_limpa_alfa($this->detailkamar); }
      if (isset($this->detailresep)) { $this->nm_limpa_alfa($this->detailresep); }
      if (isset($this->detailtindakan)) { $this->nm_limpa_alfa($this->detailtindakan); }
      if (isset($this->detailresepokvk)) { $this->nm_limpa_alfa($this->detailresepokvk); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- jmltagihan
      $this->field_config['jmltagihan']               = array();
      $this->field_config['jmltagihan']['symbol_grp'] = '.';
      $this->field_config['jmltagihan']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['jmltagihan']['symbol_dec'] = ',';
      $this->field_config['jmltagihan']['symbol_mon'] = 'Rp';
      $this->field_config['jmltagihan']['format_pos'] = '3';
      $this->field_config['jmltagihan']['format_neg'] = '2';
      //-- jmlbayar
      $this->field_config['jmlbayar']               = array();
      $this->field_config['jmlbayar']['symbol_grp'] = '.';
      $this->field_config['jmlbayar']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['jmlbayar']['symbol_dec'] = ',';
      $this->field_config['jmlbayar']['symbol_mon'] = 'Rp';
      $this->field_config['jmlbayar']['format_pos'] = '3';
      $this->field_config['jmlbayar']['format_neg'] = '2';
      //-- jmldk1
      $this->field_config['jmldk1']               = array();
      $this->field_config['jmldk1']['symbol_grp'] = '.';
      $this->field_config['jmldk1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['jmldk1']['symbol_dec'] = ',';
      $this->field_config['jmldk1']['symbol_mon'] = 'Rp';
      $this->field_config['jmldk1']['format_pos'] = '3';
      $this->field_config['jmldk1']['format_neg'] = '2';
      //-- jmldk2
      $this->field_config['jmldk2']               = array();
      $this->field_config['jmldk2']['symbol_grp'] = '.';
      $this->field_config['jmldk2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['jmldk2']['symbol_dec'] = ',';
      $this->field_config['jmldk2']['symbol_mon'] = 'Rp';
      $this->field_config['jmldk2']['format_pos'] = '3';
      $this->field_config['jmldk2']['format_neg'] = '2';
      //-- jmlasr
      $this->field_config['jmlasr']               = array();
      $this->field_config['jmlasr']['symbol_grp'] = '.';
      $this->field_config['jmlasr']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['jmlasr']['symbol_dec'] = ',';
      $this->field_config['jmlasr']['symbol_mon'] = 'Rp';
      $this->field_config['jmlasr']['format_pos'] = '3';
      $this->field_config['jmlasr']['format_neg'] = '2';
      //-- jmlkary
      $this->field_config['jmlkary']               = array();
      $this->field_config['jmlkary']['symbol_grp'] = '.';
      $this->field_config['jmlkary']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['jmlkary']['symbol_dec'] = ',';
      $this->field_config['jmlkary']['symbol_mon'] = 'Rp';
      $this->field_config['jmlkary']['format_pos'] = '3';
      $this->field_config['jmlkary']['format_neg'] = '2';
      //-- deposit
      $this->field_config['deposit']               = array();
      $this->field_config['deposit']['symbol_grp'] = '.';
      $this->field_config['deposit']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['deposit']['symbol_dec'] = ',';
      $this->field_config['deposit']['symbol_mon'] = 'Rp';
      $this->field_config['deposit']['format_pos'] = '3';
      $this->field_config['deposit']['format_neg'] = '2';
      //-- potongan
      $this->field_config['potongan']               = array();
      $this->field_config['potongan']['symbol_grp'] = '.';
      $this->field_config['potongan']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['potongan']['symbol_dec'] = ',';
      $this->field_config['potongan']['symbol_mon'] = '';
      $this->field_config['potongan']['format_pos'] = '3';
      $this->field_config['potongan']['format_neg'] = '2';
      //-- hrsdibayar
      $this->field_config['hrsdibayar']               = array();
      $this->field_config['hrsdibayar']['symbol_grp'] = '.';
      $this->field_config['hrsdibayar']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['hrsdibayar']['symbol_dec'] = ',';
      $this->field_config['hrsdibayar']['symbol_mon'] = 'Rp';
      $this->field_config['hrsdibayar']['format_pos'] = '3';
      $this->field_config['hrsdibayar']['format_neg'] = '2';
      //-- selisihpaket
      $this->field_config['selisihpaket']               = array();
      $this->field_config['selisihpaket']['symbol_grp'] = '.';
      $this->field_config['selisihpaket']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['selisihpaket']['symbol_dec'] = ',';
      $this->field_config['selisihpaket']['symbol_mon'] = 'Rp';
      $this->field_config['selisihpaket']['format_pos'] = '3';
      $this->field_config['selisihpaket']['format_neg'] = '2';
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- paiddate
      $this->field_config['paiddate']                 = array();
      $this->field_config['paiddate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['paiddate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['paiddate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['paiddate']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'paiddate');
      //-- trandate
      $this->field_config['trandate']                 = array();
      $this->field_config['trandate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['trandate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['trandate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['trandate']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'trandate');
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
          if ('validate_trancode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'trancode');
          }
          if ('validate_nostruk' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nostruk');
          }
          if ('validate_custcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'custcode');
          }
          if ('validate_sc_field_1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_1');
          }
          if ('validate_dokter' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dokter');
          }
          if ('validate_jmltagihan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jmltagihan');
          }
          if ('validate_jmlbayar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jmlbayar');
          }
          if ('validate_jmldk1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jmldk1');
          }
          if ('validate_jmldk2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jmldk2');
          }
          if ('validate_jmlasr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jmlasr');
          }
          if ('validate_jmlkary' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jmlkary');
          }
          if ('validate_deposit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'deposit');
          }
          if ('validate_potongan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'potongan');
          }
          if ('validate_hrsdibayar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hrsdibayar');
          }
          if ('validate_selisihpaket' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'selisihpaket');
          }
          if ('validate_nopayment' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nopayment');
          }
          if ('validate_terimadari' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'terimadari');
          }
          if ('validate_jenispayment' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jenispayment');
          }
          if ('validate_kodepaket' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kodepaket');
          }
          if ('validate_instansipenjamin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'instansipenjamin');
          }
          if ('validate_bankdebit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bankdebit');
          }
          if ('validate_nokartu' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nokartu');
          }
          if ('validate_edc1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'edc1');
          }
          if ('validate_edc2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'edc2');
          }
          if ('validate_sc_field_0' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_0');
          }
          if ('validate_poli' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'poli');
          }
          if ('validate_kasir' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kasir');
          }
          if ('validate_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id');
          }
          if ('validate_paiddate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'paiddate');
          }
          if ('validate_kode_akun' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kode_akun');
          }
          if ('validate_detailkamar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detailkamar');
          }
          if ('validate_detailtindakan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detailtindakan');
          }
          if ('validate_sc_field_2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_2');
          }
          if ('validate_detailresep' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detailresep');
          }
          if ('validate_bhp' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bhp');
          }
          if ('validate_detailresepokvk' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detailresepokvk');
          }
          if ('validate_lab' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lab');
          }
          if ('validate_rad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rad');
          }
          if ('validate_detailadm' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detailadm');
          }
          form_pay_ranap_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_deposit_onchange' == $this->NM_ajax_opcao)
          {
              $this->deposit_onChange();
          }
          if ('event_jenispayment_onchange' == $this->NM_ajax_opcao)
          {
              $this->jenisPayment_onChange();
          }
          if ('event_jmlbayar_onchange' == $this->NM_ajax_opcao)
          {
              $this->jmlBayar_onChange();
          }
          if ('event_kodepaket_onchange' == $this->NM_ajax_opcao)
          {
              $this->kodePaket_onChange();
          }
          if ('event_trancode_onchange' == $this->NM_ajax_opcao)
          {
              $this->tranCode_onChange();
          }
          form_pay_ranap_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_instansipenjamin' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->instansipenjamin = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->instansipenjamin = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_instansipenjamin']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_instansipenjamin'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_instansipenjamin']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_instansipenjamin'] = array(); 
    }

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT instCode, name FROM tbinstansi WHERE name LIKE '%" . substr($this->Db->qstr($this->instansipenjamin), 1, -1) . "%' ORDER BY name";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_instansipenjamin'][] = $rs->fields[0];
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
              $AjaxLim = 0;
              $aResponse = array();
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  $AjaxLim++;
                  if ($AjaxLim > 10)
                  {
                      break;
                  }
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $sLkpIndex = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpIndex);
                      $sLkpValue = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpValue);
                      $aResponse[] = array('label' => $sLkpValue, 'value' => $sLkpIndex);
                  }
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($aResponse);
              exit;
          }
          form_pay_ranap_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['trancode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->trancode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['trancode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['nostruk']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->nostruk = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['nostruk'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['custcode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->custcode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['custcode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['sc_field_1']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->sc_field_1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['sc_field_1'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['dokter']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->dokter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['dokter'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['jmltagihan']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->jmltagihan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['jmltagihan'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['jmlbayar']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->jmlbayar = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['jmlbayar'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['jmldk1']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->jmldk1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['jmldk1'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['jmldk2']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->jmldk2 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['jmldk2'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['jmlasr']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->jmlasr = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['jmlasr'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['jmlkary']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->jmlkary = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['jmlkary'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['potongan']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->potongan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['potongan'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['hrsdibayar']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->hrsdibayar = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['hrsdibayar'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['nopayment']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->nopayment = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']['nopayment'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_pay_ranap_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_pay_ranap_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_pay_ranap_mob_pack_ajax_response();
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
          form_pay_ranap_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_pay_ranap_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Pembayaran RI") ?></TITLE>
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
<form name="Fdown" method="get" action="form_pay_ranap_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_pay_ranap_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_pay_ranap_mob.php" target="_self" style="display: none"> 
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
           case 'trancode':
               return "Kode Transaksi";
               break;
           case 'nostruk':
               return "No Struk";
               break;
           case 'custcode':
               return "No. RM";
               break;
           case 'sc_field_1':
               return "Nama Pasien";
               break;
           case 'dokter':
               return "Dokter";
               break;
           case 'jmltagihan':
               return "Total Tagihan";
               break;
           case 'jmlbayar':
               return "Total Dibayar";
               break;
           case 'jmldk1':
               return "Jumlah Bayar (Kartu 1)";
               break;
           case 'jmldk2':
               return "Jumlah Bayar (Kartu 2)";
               break;
           case 'jmlasr':
               return "Jumlah Bayar Asuransi";
               break;
           case 'jmlkary':
               return "Jumlah Kasbon";
               break;
           case 'deposit':
               return "Deposit";
               break;
           case 'potongan':
               return "Diskon";
               break;
           case 'hrsdibayar':
               return "Sisa / Kembali";
               break;
           case 'selisihpaket':
               return "Selisih Paket";
               break;
           case 'nopayment':
               return "No Payment";
               break;
           case 'terimadari':
               return "Terima Dari";
               break;
           case 'jenispayment':
               return "Jenis Pembayaran";
               break;
           case 'kodepaket':
               return "Pasien Paket";
               break;
           case 'instansipenjamin':
               return "Penjamin";
               break;
           case 'bankdebit':
               return "Bank Debit";
               break;
           case 'nokartu':
               return "No Kartu";
               break;
           case 'edc1':
               return "EDC 1";
               break;
           case 'edc2':
               return "EDC 2";
               break;
           case 'sc_field_0':
               return "Jaminan / Polis";
               break;
           case 'poli':
               return "Poli";
               break;
           case 'kasir':
               return "Kasir";
               break;
           case 'id':
               return "ID";
               break;
           case 'paiddate':
               return "Paid Date";
               break;
           case 'kode_akun':
               return "Kode Akun";
               break;
           case 'detailkamar':
               return "";
               break;
           case 'detailtindakan':
               return "Tind. Ranap";
               break;
           case 'sc_field_2':
               return "Tind. OK/VK";
               break;
           case 'detailresep':
               return "";
               break;
           case 'bhp':
               return "bhp";
               break;
           case 'detailresepokvk':
               return "";
               break;
           case 'lab':
               return "";
               break;
           case 'rad':
               return "";
               break;
           case 'detailadm':
               return "";
               break;
           case 'trandate':
               return "Tran Date";
               break;
           case 'lunas':
               return "Lunas";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_pay_ranap_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_pay_ranap_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_pay_ranap_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_pay_ranap_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'trancode' == $filtro)
        $this->ValidateField_trancode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nostruk' == $filtro)
        $this->ValidateField_nostruk($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'custcode' == $filtro)
        $this->ValidateField_custcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_1' == $filtro)
        $this->ValidateField_sc_field_1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dokter' == $filtro)
        $this->ValidateField_dokter($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'jmltagihan' == $filtro)
        $this->ValidateField_jmltagihan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'jmlbayar' == $filtro)
        $this->ValidateField_jmlbayar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'jmldk1' == $filtro)
        $this->ValidateField_jmldk1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'jmldk2' == $filtro)
        $this->ValidateField_jmldk2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'jmlasr' == $filtro)
        $this->ValidateField_jmlasr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'jmlkary' == $filtro)
        $this->ValidateField_jmlkary($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'deposit' == $filtro)
        $this->ValidateField_deposit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'potongan' == $filtro)
        $this->ValidateField_potongan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hrsdibayar' == $filtro)
        $this->ValidateField_hrsdibayar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'selisihpaket' == $filtro)
        $this->ValidateField_selisihpaket($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nopayment' == $filtro)
        $this->ValidateField_nopayment($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'terimadari' == $filtro)
        $this->ValidateField_terimadari($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'jenispayment' == $filtro)
        $this->ValidateField_jenispayment($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'kodepaket' == $filtro)
        $this->ValidateField_kodepaket($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'instansipenjamin' == $filtro)
        $this->ValidateField_instansipenjamin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bankdebit' == $filtro)
        $this->ValidateField_bankdebit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nokartu' == $filtro)
        $this->ValidateField_nokartu($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'edc1' == $filtro)
        $this->ValidateField_edc1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'edc2' == $filtro)
        $this->ValidateField_edc2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_0' == $filtro)
        $this->ValidateField_sc_field_0($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'poli' == $filtro)
        $this->ValidateField_poli($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'kasir' == $filtro)
        $this->ValidateField_kasir($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id' == $filtro)
        $this->ValidateField_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'paiddate' == $filtro)
        $this->ValidateField_paiddate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'kode_akun' == $filtro)
        $this->ValidateField_kode_akun($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detailkamar' == $filtro)
        $this->ValidateField_detailkamar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detailtindakan' == $filtro)
        $this->ValidateField_detailtindakan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_2' == $filtro)
        $this->ValidateField_sc_field_2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detailresep' == $filtro)
        $this->ValidateField_detailresep($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bhp' == $filtro)
        $this->ValidateField_bhp($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detailresepokvk' == $filtro)
        $this->ValidateField_detailresepokvk($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lab' == $filtro)
        $this->ValidateField_lab($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rad' == $filtro)
        $this->ValidateField_rad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detailadm' == $filtro)
        $this->ValidateField_detailadm($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
  

$uang = $this->jmltagihan ;

$this->pembulatan($uang); 


$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off'; 
      }
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
              $_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
  $javascript_title   = 'Pembayaran Berhasil';       
$javascript_message = 'Data pembayaran Rawat Inap berhasil diinput.';  

$this->sc_ajax_message($javascript_message, $javascript_title);

$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_trancode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->trancode) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Transaksi " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['trancode']))
              {
                  $Campos_Erros['trancode'] = array();
              }
              $Campos_Erros['trancode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['trancode']) || !is_array($this->NM_ajax_info['errList']['trancode']))
              {
                  $this->NM_ajax_info['errList']['trancode'] = array();
              }
              $this->NM_ajax_info['errList']['trancode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_nostruk(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->nostruk) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk']) && !in_array($this->nostruk, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['nostruk']))
                   {
                       $Campos_Erros['nostruk'] = array();
                   }
                   $Campos_Erros['nostruk'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['nostruk']) || !is_array($this->NM_ajax_info['errList']['nostruk']))
                   {
                       $this->NM_ajax_info['errList']['nostruk'] = array();
                   }
                   $this->NM_ajax_info['errList']['nostruk'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nostruk';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nostruk

    function ValidateField_custcode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->custcode) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode']) && !in_array($this->custcode, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode']))
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

    function ValidateField_sc_field_1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->sc_field_1) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1']) && !in_array($this->sc_field_1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1']))
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

    function ValidateField_dokter(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->dokter) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter']) && !in_array($this->dokter, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['dokter']))
                   {
                       $Campos_Erros['dokter'] = array();
                   }
                   $Campos_Erros['dokter'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['dokter']) || !is_array($this->NM_ajax_info['errList']['dokter']))
                   {
                       $this->NM_ajax_info['errList']['dokter'] = array();
                   }
                   $this->NM_ajax_info['errList']['dokter'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dokter';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dokter

    function ValidateField_jmltagihan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->jmltagihan === "" || is_null($this->jmltagihan))  
      { 
          $this->jmltagihan = 0;
          $this->sc_force_zero[] = 'jmltagihan';
      } 
      if (!empty($this->field_config['jmltagihan']['symbol_dec']))
      {
          $this->sc_remove_currency($this->jmltagihan, $this->field_config['jmltagihan']['symbol_dec'], $this->field_config['jmltagihan']['symbol_grp'], $this->field_config['jmltagihan']['symbol_mon']); 
          nm_limpa_valor($this->jmltagihan, $this->field_config['jmltagihan']['symbol_dec'], $this->field_config['jmltagihan']['symbol_grp']) ; 
          if ('.' == substr($this->jmltagihan, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->jmltagihan, 1)))
              {
                  $this->jmltagihan = '';
              }
              else
              {
                  $this->jmltagihan = '0' . $this->jmltagihan;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->jmltagihan != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->jmltagihan) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Total Tagihan: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['jmltagihan']))
                  {
                      $Campos_Erros['jmltagihan'] = array();
                  }
                  $Campos_Erros['jmltagihan'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['jmltagihan']) || !is_array($this->NM_ajax_info['errList']['jmltagihan']))
                  {
                      $this->NM_ajax_info['errList']['jmltagihan'] = array();
                  }
                  $this->NM_ajax_info['errList']['jmltagihan'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->jmltagihan, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Total Tagihan; " ; 
                  if (!isset($Campos_Erros['jmltagihan']))
                  {
                      $Campos_Erros['jmltagihan'] = array();
                  }
                  $Campos_Erros['jmltagihan'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['jmltagihan']) || !is_array($this->NM_ajax_info['errList']['jmltagihan']))
                  {
                      $this->NM_ajax_info['errList']['jmltagihan'] = array();
                  }
                  $this->NM_ajax_info['errList']['jmltagihan'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'jmltagihan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_jmltagihan

    function ValidateField_jmlbayar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->jmlbayar === "" || is_null($this->jmlbayar))  
      { 
          $this->jmlbayar = 0;
          $this->sc_force_zero[] = 'jmlbayar';
      } 
      if (!empty($this->field_config['jmlbayar']['symbol_dec']))
      {
          $this->sc_remove_currency($this->jmlbayar, $this->field_config['jmlbayar']['symbol_dec'], $this->field_config['jmlbayar']['symbol_grp'], $this->field_config['jmlbayar']['symbol_mon']); 
          nm_limpa_valor($this->jmlbayar, $this->field_config['jmlbayar']['symbol_dec'], $this->field_config['jmlbayar']['symbol_grp']) ; 
          if ('.' == substr($this->jmlbayar, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->jmlbayar, 1)))
              {
                  $this->jmlbayar = '';
              }
              else
              {
                  $this->jmlbayar = '0' . $this->jmlbayar;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->jmlbayar != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->jmlbayar) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Total Dibayar: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['jmlbayar']))
                  {
                      $Campos_Erros['jmlbayar'] = array();
                  }
                  $Campos_Erros['jmlbayar'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['jmlbayar']) || !is_array($this->NM_ajax_info['errList']['jmlbayar']))
                  {
                      $this->NM_ajax_info['errList']['jmlbayar'] = array();
                  }
                  $this->NM_ajax_info['errList']['jmlbayar'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->jmlbayar, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Total Dibayar; " ; 
                  if (!isset($Campos_Erros['jmlbayar']))
                  {
                      $Campos_Erros['jmlbayar'] = array();
                  }
                  $Campos_Erros['jmlbayar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['jmlbayar']) || !is_array($this->NM_ajax_info['errList']['jmlbayar']))
                  {
                      $this->NM_ajax_info['errList']['jmlbayar'] = array();
                  }
                  $this->NM_ajax_info['errList']['jmlbayar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'jmlbayar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_jmlbayar

    function ValidateField_jmldk1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->jmldk1 === "" || is_null($this->jmldk1))  
      { 
          $this->jmldk1 = 0;
          $this->sc_force_zero[] = 'jmldk1';
      } 
      if (!empty($this->field_config['jmldk1']['symbol_dec']))
      {
          $this->sc_remove_currency($this->jmldk1, $this->field_config['jmldk1']['symbol_dec'], $this->field_config['jmldk1']['symbol_grp'], $this->field_config['jmldk1']['symbol_mon']); 
          nm_limpa_valor($this->jmldk1, $this->field_config['jmldk1']['symbol_dec'], $this->field_config['jmldk1']['symbol_grp']) ; 
          if ('.' == substr($this->jmldk1, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->jmldk1, 1)))
              {
                  $this->jmldk1 = '';
              }
              else
              {
                  $this->jmldk1 = '0' . $this->jmldk1;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->jmldk1 != '')  
          { 
              $iTestSize = 16;
              if (strlen($this->jmldk1) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Jumlah Bayar (Kartu 1): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['jmldk1']))
                  {
                      $Campos_Erros['jmldk1'] = array();
                  }
                  $Campos_Erros['jmldk1'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['jmldk1']) || !is_array($this->NM_ajax_info['errList']['jmldk1']))
                  {
                      $this->NM_ajax_info['errList']['jmldk1'] = array();
                  }
                  $this->NM_ajax_info['errList']['jmldk1'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->jmldk1, 15, 0, -0, 1.0E+15, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Jumlah Bayar (Kartu 1); " ; 
                  if (!isset($Campos_Erros['jmldk1']))
                  {
                      $Campos_Erros['jmldk1'] = array();
                  }
                  $Campos_Erros['jmldk1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['jmldk1']) || !is_array($this->NM_ajax_info['errList']['jmldk1']))
                  {
                      $this->NM_ajax_info['errList']['jmldk1'] = array();
                  }
                  $this->NM_ajax_info['errList']['jmldk1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'jmldk1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_jmldk1

    function ValidateField_jmldk2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->jmldk2 === "" || is_null($this->jmldk2))  
      { 
          $this->jmldk2 = 0;
          $this->sc_force_zero[] = 'jmldk2';
      } 
      if (!empty($this->field_config['jmldk2']['symbol_dec']))
      {
          $this->sc_remove_currency($this->jmldk2, $this->field_config['jmldk2']['symbol_dec'], $this->field_config['jmldk2']['symbol_grp'], $this->field_config['jmldk2']['symbol_mon']); 
          nm_limpa_valor($this->jmldk2, $this->field_config['jmldk2']['symbol_dec'], $this->field_config['jmldk2']['symbol_grp']) ; 
          if ('.' == substr($this->jmldk2, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->jmldk2, 1)))
              {
                  $this->jmldk2 = '';
              }
              else
              {
                  $this->jmldk2 = '0' . $this->jmldk2;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->jmldk2 != '')  
          { 
              $iTestSize = 16;
              if (strlen($this->jmldk2) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Jumlah Bayar (Kartu 2): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['jmldk2']))
                  {
                      $Campos_Erros['jmldk2'] = array();
                  }
                  $Campos_Erros['jmldk2'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['jmldk2']) || !is_array($this->NM_ajax_info['errList']['jmldk2']))
                  {
                      $this->NM_ajax_info['errList']['jmldk2'] = array();
                  }
                  $this->NM_ajax_info['errList']['jmldk2'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->jmldk2, 15, 0, -0, 1.0E+15, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Jumlah Bayar (Kartu 2); " ; 
                  if (!isset($Campos_Erros['jmldk2']))
                  {
                      $Campos_Erros['jmldk2'] = array();
                  }
                  $Campos_Erros['jmldk2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['jmldk2']) || !is_array($this->NM_ajax_info['errList']['jmldk2']))
                  {
                      $this->NM_ajax_info['errList']['jmldk2'] = array();
                  }
                  $this->NM_ajax_info['errList']['jmldk2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'jmldk2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_jmldk2

    function ValidateField_jmlasr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->jmlasr === "" || is_null($this->jmlasr))  
      { 
          $this->jmlasr = 0;
          $this->sc_force_zero[] = 'jmlasr';
      } 
      if (!empty($this->field_config['jmlasr']['symbol_dec']))
      {
          $this->sc_remove_currency($this->jmlasr, $this->field_config['jmlasr']['symbol_dec'], $this->field_config['jmlasr']['symbol_grp'], $this->field_config['jmlasr']['symbol_mon']); 
          nm_limpa_valor($this->jmlasr, $this->field_config['jmlasr']['symbol_dec'], $this->field_config['jmlasr']['symbol_grp']) ; 
          if ('.' == substr($this->jmlasr, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->jmlasr, 1)))
              {
                  $this->jmlasr = '';
              }
              else
              {
                  $this->jmlasr = '0' . $this->jmlasr;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->jmlasr != '')  
          { 
              $iTestSize = 16;
              if (strlen($this->jmlasr) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Jumlah Bayar Asuransi: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['jmlasr']))
                  {
                      $Campos_Erros['jmlasr'] = array();
                  }
                  $Campos_Erros['jmlasr'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['jmlasr']) || !is_array($this->NM_ajax_info['errList']['jmlasr']))
                  {
                      $this->NM_ajax_info['errList']['jmlasr'] = array();
                  }
                  $this->NM_ajax_info['errList']['jmlasr'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->jmlasr, 15, 0, -0, 1.0E+15, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Jumlah Bayar Asuransi; " ; 
                  if (!isset($Campos_Erros['jmlasr']))
                  {
                      $Campos_Erros['jmlasr'] = array();
                  }
                  $Campos_Erros['jmlasr'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['jmlasr']) || !is_array($this->NM_ajax_info['errList']['jmlasr']))
                  {
                      $this->NM_ajax_info['errList']['jmlasr'] = array();
                  }
                  $this->NM_ajax_info['errList']['jmlasr'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'jmlasr';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_jmlasr

    function ValidateField_jmlkary(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->jmlkary === "" || is_null($this->jmlkary))  
      { 
          $this->jmlkary = 0;
          $this->sc_force_zero[] = 'jmlkary';
      } 
      if (!empty($this->field_config['jmlkary']['symbol_dec']))
      {
          $this->sc_remove_currency($this->jmlkary, $this->field_config['jmlkary']['symbol_dec'], $this->field_config['jmlkary']['symbol_grp'], $this->field_config['jmlkary']['symbol_mon']); 
          nm_limpa_valor($this->jmlkary, $this->field_config['jmlkary']['symbol_dec'], $this->field_config['jmlkary']['symbol_grp']) ; 
          if ('.' == substr($this->jmlkary, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->jmlkary, 1)))
              {
                  $this->jmlkary = '';
              }
              else
              {
                  $this->jmlkary = '0' . $this->jmlkary;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->jmlkary != '')  
          { 
              $iTestSize = 16;
              if (strlen($this->jmlkary) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Jumlah Kasbon: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['jmlkary']))
                  {
                      $Campos_Erros['jmlkary'] = array();
                  }
                  $Campos_Erros['jmlkary'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['jmlkary']) || !is_array($this->NM_ajax_info['errList']['jmlkary']))
                  {
                      $this->NM_ajax_info['errList']['jmlkary'] = array();
                  }
                  $this->NM_ajax_info['errList']['jmlkary'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->jmlkary, 15, 0, -0, 1.0E+15, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Jumlah Kasbon; " ; 
                  if (!isset($Campos_Erros['jmlkary']))
                  {
                      $Campos_Erros['jmlkary'] = array();
                  }
                  $Campos_Erros['jmlkary'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['jmlkary']) || !is_array($this->NM_ajax_info['errList']['jmlkary']))
                  {
                      $this->NM_ajax_info['errList']['jmlkary'] = array();
                  }
                  $this->NM_ajax_info['errList']['jmlkary'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'jmlkary';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_jmlkary

    function ValidateField_deposit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->deposit === "" || is_null($this->deposit))  
      { 
          $this->deposit = 0;
          $this->sc_force_zero[] = 'deposit';
      } 
      if (!empty($this->field_config['deposit']['symbol_dec']))
      {
          $this->sc_remove_currency($this->deposit, $this->field_config['deposit']['symbol_dec'], $this->field_config['deposit']['symbol_grp'], $this->field_config['deposit']['symbol_mon']); 
          nm_limpa_valor($this->deposit, $this->field_config['deposit']['symbol_dec'], $this->field_config['deposit']['symbol_grp']) ; 
          if ('.' == substr($this->deposit, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->deposit, 1)))
              {
                  $this->deposit = '';
              }
              else
              {
                  $this->deposit = '0' . $this->deposit;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->deposit != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->deposit) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Deposit: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['deposit']))
                  {
                      $Campos_Erros['deposit'] = array();
                  }
                  $Campos_Erros['deposit'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['deposit']) || !is_array($this->NM_ajax_info['errList']['deposit']))
                  {
                      $this->NM_ajax_info['errList']['deposit'] = array();
                  }
                  $this->NM_ajax_info['errList']['deposit'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->deposit, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Deposit; " ; 
                  if (!isset($Campos_Erros['deposit']))
                  {
                      $Campos_Erros['deposit'] = array();
                  }
                  $Campos_Erros['deposit'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['deposit']) || !is_array($this->NM_ajax_info['errList']['deposit']))
                  {
                      $this->NM_ajax_info['errList']['deposit'] = array();
                  }
                  $this->NM_ajax_info['errList']['deposit'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'deposit';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_deposit

    function ValidateField_potongan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->potongan === "" || is_null($this->potongan))  
      { 
          $this->potongan = 0;
          $this->sc_force_zero[] = 'potongan';
      } 
      if (!empty($this->field_config['potongan']['symbol_dec']))
      {
          $this->sc_remove_currency($this->potongan, $this->field_config['potongan']['symbol_dec'], $this->field_config['potongan']['symbol_grp'], $this->field_config['potongan']['symbol_mon']); 
          nm_limpa_valor($this->potongan, $this->field_config['potongan']['symbol_dec'], $this->field_config['potongan']['symbol_grp']) ; 
          if ('.' == substr($this->potongan, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->potongan, 1)))
              {
                  $this->potongan = '';
              }
              else
              {
                  $this->potongan = '0' . $this->potongan;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->potongan != '')  
          { 
              $iTestSize = 9;
              if (strlen($this->potongan) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Diskon: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['potongan']))
                  {
                      $Campos_Erros['potongan'] = array();
                  }
                  $Campos_Erros['potongan'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['potongan']) || !is_array($this->NM_ajax_info['errList']['potongan']))
                  {
                      $this->NM_ajax_info['errList']['potongan'] = array();
                  }
                  $this->NM_ajax_info['errList']['potongan'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->potongan, 8, 0, -0, 99999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Diskon; " ; 
                  if (!isset($Campos_Erros['potongan']))
                  {
                      $Campos_Erros['potongan'] = array();
                  }
                  $Campos_Erros['potongan'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['potongan']) || !is_array($this->NM_ajax_info['errList']['potongan']))
                  {
                      $this->NM_ajax_info['errList']['potongan'] = array();
                  }
                  $this->NM_ajax_info['errList']['potongan'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'potongan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_potongan

    function ValidateField_hrsdibayar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->hrsdibayar === "" || is_null($this->hrsdibayar))  
      { 
          $this->hrsdibayar = 0;
          $this->sc_force_zero[] = 'hrsdibayar';
      } 
      if (!empty($this->field_config['hrsdibayar']['symbol_dec']))
      {
          $this->sc_remove_currency($this->hrsdibayar, $this->field_config['hrsdibayar']['symbol_dec'], $this->field_config['hrsdibayar']['symbol_grp'], $this->field_config['hrsdibayar']['symbol_mon']); 
          nm_limpa_valor($this->hrsdibayar, $this->field_config['hrsdibayar']['symbol_dec'], $this->field_config['hrsdibayar']['symbol_grp']) ; 
          if ('.' == substr($this->hrsdibayar, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->hrsdibayar, 1)))
              {
                  $this->hrsdibayar = '';
              }
              else
              {
                  $this->hrsdibayar = '0' . $this->hrsdibayar;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->hrsdibayar != '')  
          { 
              $iTestSize = 11;
              if ('-' == substr($this->hrsdibayar, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->hrsdibayar, -1))
              {
                  $iTestSize++;
                  $this->hrsdibayar = '-' . substr($this->hrsdibayar, 0, -1);
              }
              if (strlen($this->hrsdibayar) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Sisa / Kembali: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['hrsdibayar']))
                  {
                      $Campos_Erros['hrsdibayar'] = array();
                  }
                  $Campos_Erros['hrsdibayar'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['hrsdibayar']) || !is_array($this->NM_ajax_info['errList']['hrsdibayar']))
                  {
                      $this->NM_ajax_info['errList']['hrsdibayar'] = array();
                  }
                  $this->NM_ajax_info['errList']['hrsdibayar'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->hrsdibayar, 10, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Sisa / Kembali; " ; 
                  if (!isset($Campos_Erros['hrsdibayar']))
                  {
                      $Campos_Erros['hrsdibayar'] = array();
                  }
                  $Campos_Erros['hrsdibayar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hrsdibayar']) || !is_array($this->NM_ajax_info['errList']['hrsdibayar']))
                  {
                      $this->NM_ajax_info['errList']['hrsdibayar'] = array();
                  }
                  $this->NM_ajax_info['errList']['hrsdibayar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hrsdibayar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hrsdibayar

    function ValidateField_selisihpaket(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->selisihpaket === "" || is_null($this->selisihpaket))  
      { 
          $this->selisihpaket = 0;
          $this->sc_force_zero[] = 'selisihpaket';
      } 
      if (!empty($this->field_config['selisihpaket']['symbol_dec']))
      {
          $this->sc_remove_currency($this->selisihpaket, $this->field_config['selisihpaket']['symbol_dec'], $this->field_config['selisihpaket']['symbol_grp'], $this->field_config['selisihpaket']['symbol_mon']); 
          nm_limpa_valor($this->selisihpaket, $this->field_config['selisihpaket']['symbol_dec'], $this->field_config['selisihpaket']['symbol_grp']) ; 
          if ('.' == substr($this->selisihpaket, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->selisihpaket, 1)))
              {
                  $this->selisihpaket = '';
              }
              else
              {
                  $this->selisihpaket = '0' . $this->selisihpaket;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->selisihpaket != '')  
          { 
              $iTestSize = 16;
              if (strlen($this->selisihpaket) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Selisih Paket: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['selisihpaket']))
                  {
                      $Campos_Erros['selisihpaket'] = array();
                  }
                  $Campos_Erros['selisihpaket'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['selisihpaket']) || !is_array($this->NM_ajax_info['errList']['selisihpaket']))
                  {
                      $this->NM_ajax_info['errList']['selisihpaket'] = array();
                  }
                  $this->NM_ajax_info['errList']['selisihpaket'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->selisihpaket, 15, 0, -0, 1.0E+15, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Selisih Paket; " ; 
                  if (!isset($Campos_Erros['selisihpaket']))
                  {
                      $Campos_Erros['selisihpaket'] = array();
                  }
                  $Campos_Erros['selisihpaket'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['selisihpaket']) || !is_array($this->NM_ajax_info['errList']['selisihpaket']))
                  {
                      $this->NM_ajax_info['errList']['selisihpaket'] = array();
                  }
                  $this->NM_ajax_info['errList']['selisihpaket'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'selisihpaket';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_selisihpaket

    function ValidateField_nopayment(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nopayment) > 18) 
          { 
              $hasError = true;
              $Campos_Crit .= "No Payment " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 18 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nopayment']))
              {
                  $Campos_Erros['nopayment'] = array();
              }
              $Campos_Erros['nopayment'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 18 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nopayment']) || !is_array($this->NM_ajax_info['errList']['nopayment']))
              {
                  $this->NM_ajax_info['errList']['nopayment'] = array();
              }
              $this->NM_ajax_info['errList']['nopayment'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 18 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nopayment';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nopayment

    function ValidateField_terimadari(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->terimadari) > 75) 
          { 
              $hasError = true;
              $Campos_Crit .= "Terima Dari " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 75 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['terimadari']))
              {
                  $Campos_Erros['terimadari'] = array();
              }
              $Campos_Erros['terimadari'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 75 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['terimadari']) || !is_array($this->NM_ajax_info['errList']['terimadari']))
              {
                  $this->NM_ajax_info['errList']['terimadari'] = array();
              }
              $this->NM_ajax_info['errList']['terimadari'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 75 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'terimadari';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_terimadari

    function ValidateField_jenispayment(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->jenispayment == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['php_cmp_required']['jenispayment']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['php_cmp_required']['jenispayment'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Jenis Pembayaran" ;
          if (!isset($Campos_Erros['jenispayment']))
          {
              $Campos_Erros['jenispayment'] = array();
          }
          $Campos_Erros['jenispayment'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['jenispayment']) || !is_array($this->NM_ajax_info['errList']['jenispayment']))
                  {
                      $this->NM_ajax_info['errList']['jenispayment'] = array();
                  }
                  $this->NM_ajax_info['errList']['jenispayment'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'jenispayment';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_jenispayment

    function ValidateField_kodepaket(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->kodepaket) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket']) && !in_array($this->kodepaket, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['kodepaket']))
                   {
                       $Campos_Erros['kodepaket'] = array();
                   }
                   $Campos_Erros['kodepaket'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['kodepaket']) || !is_array($this->NM_ajax_info['errList']['kodepaket']))
                   {
                       $this->NM_ajax_info['errList']['kodepaket'] = array();
                   }
                   $this->NM_ajax_info['errList']['kodepaket'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kodepaket';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kodepaket

    function ValidateField_instansipenjamin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->instansipenjamin) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Penjamin " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['instansipenjamin']))
              {
                  $Campos_Erros['instansipenjamin'] = array();
              }
              $Campos_Erros['instansipenjamin'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['instansipenjamin']) || !is_array($this->NM_ajax_info['errList']['instansipenjamin']))
              {
                  $this->NM_ajax_info['errList']['instansipenjamin'] = array();
              }
              $this->NM_ajax_info['errList']['instansipenjamin'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'instansipenjamin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_instansipenjamin

    function ValidateField_bankdebit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->bankdebit) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit']) && !in_array($this->bankdebit, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['bankdebit']))
                   {
                       $Campos_Erros['bankdebit'] = array();
                   }
                   $Campos_Erros['bankdebit'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['bankdebit']) || !is_array($this->NM_ajax_info['errList']['bankdebit']))
                   {
                       $this->NM_ajax_info['errList']['bankdebit'] = array();
                   }
                   $this->NM_ajax_info['errList']['bankdebit'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'bankdebit';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_bankdebit

    function ValidateField_nokartu(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nokartu) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "No Kartu " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nokartu']))
              {
                  $Campos_Erros['nokartu'] = array();
              }
              $Campos_Erros['nokartu'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nokartu']) || !is_array($this->NM_ajax_info['errList']['nokartu']))
              {
                  $this->NM_ajax_info['errList']['nokartu'] = array();
              }
              $this->NM_ajax_info['errList']['nokartu'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "01234567890123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->nokartu ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->nokartu, $_SESSION['scriptcase']['charset']); $x++) 
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
              if (!isset($Campos_Erros['nokartu']))
              {
                  $Campos_Erros['nokartu'] = array();
              }
              $Campos_Erros['nokartu'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['nokartu']) || !is_array($this->NM_ajax_info['errList']['nokartu']))
              {
                  $this->NM_ajax_info['errList']['nokartu'] = array();
              }
              $this->NM_ajax_info['errList']['nokartu'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
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

    function ValidateField_edc1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->edc1) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1']) && !in_array($this->edc1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['edc1']))
                   {
                       $Campos_Erros['edc1'] = array();
                   }
                   $Campos_Erros['edc1'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['edc1']) || !is_array($this->NM_ajax_info['errList']['edc1']))
                   {
                       $this->NM_ajax_info['errList']['edc1'] = array();
                   }
                   $this->NM_ajax_info['errList']['edc1'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'edc1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_edc1

    function ValidateField_edc2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->edc2) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2']) && !in_array($this->edc2, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['edc2']))
                   {
                       $Campos_Erros['edc2'] = array();
                   }
                   $Campos_Erros['edc2'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['edc2']) || !is_array($this->NM_ajax_info['errList']['edc2']))
                   {
                       $this->NM_ajax_info['errList']['edc2'] = array();
                   }
                   $this->NM_ajax_info['errList']['edc2'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'edc2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_edc2

    function ValidateField_sc_field_0(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_0) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Jaminan / Polis " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_0']))
              {
                  $Campos_Erros['sc_field_0'] = array();
              }
              $Campos_Erros['sc_field_0'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_0']) || !is_array($this->NM_ajax_info['errList']['sc_field_0']))
              {
                  $this->NM_ajax_info['errList']['sc_field_0'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_0'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
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

    function ValidateField_poli(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->poli) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli']) && !in_array($this->poli, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli']))
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

    function ValidateField_kasir(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->kasir) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kasir " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['kasir']))
              {
                  $Campos_Erros['kasir'] = array();
              }
              $Campos_Erros['kasir'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['kasir']) || !is_array($this->NM_ajax_info['errList']['kasir']))
              {
                  $this->NM_ajax_info['errList']['kasir'] = array();
              }
              $this->NM_ajax_info['errList']['kasir'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kasir';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kasir

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
              $iTestSize = 10;
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
              if ($teste_validade->Valor($this->id, 10, 0, 0, 0, "N") == false)  
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

    function ValidateField_paiddate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->paiddate, $this->field_config['paiddate']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['paiddate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['paiddate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['paiddate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['paiddate']['date_sep']) ; 
          if (trim($this->paiddate) != "")  
          { 
              if ($teste_validade->Data($this->paiddate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Paid Date; " ; 
                  if (!isset($Campos_Erros['paiddate']))
                  {
                      $Campos_Erros['paiddate'] = array();
                  }
                  $Campos_Erros['paiddate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['paiddate']) || !is_array($this->NM_ajax_info['errList']['paiddate']))
                  {
                      $this->NM_ajax_info['errList']['paiddate'] = array();
                  }
                  $this->NM_ajax_info['errList']['paiddate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['paiddate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'paiddate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->paiddate_hora, $this->field_config['paiddate_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['paiddate_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['paiddate_hora']['time_sep']) ; 
          if (trim($this->paiddate_hora) != "")  
          { 
              if ($teste_validade->Hora($this->paiddate_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Paid Date; " ; 
                  if (!isset($Campos_Erros['paiddate_hora']))
                  {
                      $Campos_Erros['paiddate_hora'] = array();
                  }
                  $Campos_Erros['paiddate_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['paiddate']) || !is_array($this->NM_ajax_info['errList']['paiddate']))
                  {
                      $this->NM_ajax_info['errList']['paiddate'] = array();
                  }
                  $this->NM_ajax_info['errList']['paiddate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['paiddate']) && isset($Campos_Erros['paiddate_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['paiddate'], $Campos_Erros['paiddate_hora']);
          if (empty($Campos_Erros['paiddate_hora']))
          {
              unset($Campos_Erros['paiddate_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['paiddate']))
          {
              $this->NM_ajax_info['errList']['paiddate'] = array_unique($this->NM_ajax_info['errList']['paiddate']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'paiddate_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_paiddate_hora

    function ValidateField_kode_akun(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->kode_akun) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Akun " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['kode_akun']))
              {
                  $Campos_Erros['kode_akun'] = array();
              }
              $Campos_Erros['kode_akun'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['kode_akun']) || !is_array($this->NM_ajax_info['errList']['kode_akun']))
              {
                  $this->NM_ajax_info['errList']['kode_akun'] = array();
              }
              $this->NM_ajax_info['errList']['kode_akun'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kode_akun';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kode_akun

    function ValidateField_detailkamar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detailkamar) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detailkamar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detailkamar

    function ValidateField_detailtindakan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detailtindakan) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detailtindakan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detailtindakan

    function ValidateField_sc_field_2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->sc_field_2) != "")  
          { 
          } 
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

    function ValidateField_detailresep(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detailresep) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detailresep';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detailresep

    function ValidateField_bhp(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->bhp) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'bhp';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_bhp

    function ValidateField_detailresepokvk(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detailresepokvk) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detailresepokvk';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detailresepokvk

    function ValidateField_lab(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->lab) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lab';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_lab

    function ValidateField_rad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->rad) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'rad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_rad

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
    $this->nmgp_dados_form['trancode'] = $this->trancode;
    $this->nmgp_dados_form['nostruk'] = $this->nostruk;
    $this->nmgp_dados_form['custcode'] = $this->custcode;
    $this->nmgp_dados_form['sc_field_1'] = $this->sc_field_1;
    $this->nmgp_dados_form['dokter'] = $this->dokter;
    $this->nmgp_dados_form['jmltagihan'] = $this->jmltagihan;
    $this->nmgp_dados_form['jmlbayar'] = $this->jmlbayar;
    $this->nmgp_dados_form['jmldk1'] = $this->jmldk1;
    $this->nmgp_dados_form['jmldk2'] = $this->jmldk2;
    $this->nmgp_dados_form['jmlasr'] = $this->jmlasr;
    $this->nmgp_dados_form['jmlkary'] = $this->jmlkary;
    $this->nmgp_dados_form['deposit'] = $this->deposit;
    $this->nmgp_dados_form['potongan'] = $this->potongan;
    $this->nmgp_dados_form['hrsdibayar'] = $this->hrsdibayar;
    $this->nmgp_dados_form['selisihpaket'] = $this->selisihpaket;
    $this->nmgp_dados_form['nopayment'] = $this->nopayment;
    $this->nmgp_dados_form['terimadari'] = $this->terimadari;
    $this->nmgp_dados_form['jenispayment'] = $this->jenispayment;
    $this->nmgp_dados_form['kodepaket'] = $this->kodepaket;
    $this->nmgp_dados_form['instansipenjamin'] = $this->instansipenjamin;
    $this->nmgp_dados_form['bankdebit'] = $this->bankdebit;
    $this->nmgp_dados_form['nokartu'] = $this->nokartu;
    $this->nmgp_dados_form['edc1'] = $this->edc1;
    $this->nmgp_dados_form['edc2'] = $this->edc2;
    $this->nmgp_dados_form['sc_field_0'] = $this->sc_field_0;
    $this->nmgp_dados_form['poli'] = $this->poli;
    $this->nmgp_dados_form['kasir'] = $this->kasir;
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['paiddate'] = (strlen(trim($this->paiddate)) > 19) ? str_replace(".", ":", $this->paiddate) : trim($this->paiddate);
    $this->nmgp_dados_form['kode_akun'] = $this->kode_akun;
    $this->nmgp_dados_form['detailkamar'] = $this->detailkamar;
    $this->nmgp_dados_form['detailtindakan'] = $this->detailtindakan;
    $this->nmgp_dados_form['sc_field_2'] = $this->sc_field_2;
    $this->nmgp_dados_form['detailresep'] = $this->detailresep;
    $this->nmgp_dados_form['bhp'] = $this->bhp;
    $this->nmgp_dados_form['detailresepokvk'] = $this->detailresepokvk;
    $this->nmgp_dados_form['lab'] = $this->lab;
    $this->nmgp_dados_form['rad'] = $this->rad;
    $this->nmgp_dados_form['detailadm'] = $this->detailadm;
    $this->nmgp_dados_form['trandate'] = $this->trandate;
    $this->nmgp_dados_form['lunas'] = $this->lunas;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['jmltagihan'] = $this->jmltagihan;
      if (!empty($this->field_config['jmltagihan']['symbol_dec']))
      {
         $this->sc_remove_currency($this->jmltagihan, $this->field_config['jmltagihan']['symbol_dec'], $this->field_config['jmltagihan']['symbol_grp'], $this->field_config['jmltagihan']['symbol_mon']);
         nm_limpa_valor($this->jmltagihan, $this->field_config['jmltagihan']['symbol_dec'], $this->field_config['jmltagihan']['symbol_grp']);
      }
      $this->Before_unformat['jmlbayar'] = $this->jmlbayar;
      if (!empty($this->field_config['jmlbayar']['symbol_dec']))
      {
         $this->sc_remove_currency($this->jmlbayar, $this->field_config['jmlbayar']['symbol_dec'], $this->field_config['jmlbayar']['symbol_grp'], $this->field_config['jmlbayar']['symbol_mon']);
         nm_limpa_valor($this->jmlbayar, $this->field_config['jmlbayar']['symbol_dec'], $this->field_config['jmlbayar']['symbol_grp']);
      }
      $this->Before_unformat['jmldk1'] = $this->jmldk1;
      if (!empty($this->field_config['jmldk1']['symbol_dec']))
      {
         $this->sc_remove_currency($this->jmldk1, $this->field_config['jmldk1']['symbol_dec'], $this->field_config['jmldk1']['symbol_grp'], $this->field_config['jmldk1']['symbol_mon']);
         nm_limpa_valor($this->jmldk1, $this->field_config['jmldk1']['symbol_dec'], $this->field_config['jmldk1']['symbol_grp']);
      }
      $this->Before_unformat['jmldk2'] = $this->jmldk2;
      if (!empty($this->field_config['jmldk2']['symbol_dec']))
      {
         $this->sc_remove_currency($this->jmldk2, $this->field_config['jmldk2']['symbol_dec'], $this->field_config['jmldk2']['symbol_grp'], $this->field_config['jmldk2']['symbol_mon']);
         nm_limpa_valor($this->jmldk2, $this->field_config['jmldk2']['symbol_dec'], $this->field_config['jmldk2']['symbol_grp']);
      }
      $this->Before_unformat['jmlasr'] = $this->jmlasr;
      if (!empty($this->field_config['jmlasr']['symbol_dec']))
      {
         $this->sc_remove_currency($this->jmlasr, $this->field_config['jmlasr']['symbol_dec'], $this->field_config['jmlasr']['symbol_grp'], $this->field_config['jmlasr']['symbol_mon']);
         nm_limpa_valor($this->jmlasr, $this->field_config['jmlasr']['symbol_dec'], $this->field_config['jmlasr']['symbol_grp']);
      }
      $this->Before_unformat['jmlkary'] = $this->jmlkary;
      if (!empty($this->field_config['jmlkary']['symbol_dec']))
      {
         $this->sc_remove_currency($this->jmlkary, $this->field_config['jmlkary']['symbol_dec'], $this->field_config['jmlkary']['symbol_grp'], $this->field_config['jmlkary']['symbol_mon']);
         nm_limpa_valor($this->jmlkary, $this->field_config['jmlkary']['symbol_dec'], $this->field_config['jmlkary']['symbol_grp']);
      }
      $this->Before_unformat['deposit'] = $this->deposit;
      if (!empty($this->field_config['deposit']['symbol_dec']))
      {
         $this->sc_remove_currency($this->deposit, $this->field_config['deposit']['symbol_dec'], $this->field_config['deposit']['symbol_grp'], $this->field_config['deposit']['symbol_mon']);
         nm_limpa_valor($this->deposit, $this->field_config['deposit']['symbol_dec'], $this->field_config['deposit']['symbol_grp']);
      }
      $this->Before_unformat['potongan'] = $this->potongan;
      if (!empty($this->field_config['potongan']['symbol_dec']))
      {
         $this->sc_remove_currency($this->potongan, $this->field_config['potongan']['symbol_dec'], $this->field_config['potongan']['symbol_grp'], $this->field_config['potongan']['symbol_mon']);
         nm_limpa_valor($this->potongan, $this->field_config['potongan']['symbol_dec'], $this->field_config['potongan']['symbol_grp']);
      }
      $this->Before_unformat['hrsdibayar'] = $this->hrsdibayar;
      if (!empty($this->field_config['hrsdibayar']['symbol_dec']))
      {
         $this->sc_remove_currency($this->hrsdibayar, $this->field_config['hrsdibayar']['symbol_dec'], $this->field_config['hrsdibayar']['symbol_grp'], $this->field_config['hrsdibayar']['symbol_mon']);
         nm_limpa_valor($this->hrsdibayar, $this->field_config['hrsdibayar']['symbol_dec'], $this->field_config['hrsdibayar']['symbol_grp']);
      }
      $this->Before_unformat['selisihpaket'] = $this->selisihpaket;
      if (!empty($this->field_config['selisihpaket']['symbol_dec']))
      {
         $this->sc_remove_currency($this->selisihpaket, $this->field_config['selisihpaket']['symbol_dec'], $this->field_config['selisihpaket']['symbol_grp'], $this->field_config['selisihpaket']['symbol_mon']);
         nm_limpa_valor($this->selisihpaket, $this->field_config['selisihpaket']['symbol_dec'], $this->field_config['selisihpaket']['symbol_grp']);
      }
      $this->Before_unformat['id'] = $this->id;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      $this->Before_unformat['paiddate'] = $this->paiddate;
      nm_limpa_data($this->paiddate, $this->field_config['paiddate']['date_sep']) ; 
      nm_limpa_hora($this->paiddate_hora, $this->field_config['paiddate']['time_sep']) ; 
      $this->Before_unformat['trandate'] = $this->trandate;
      nm_limpa_data($this->trandate, $this->field_config['trandate']['date_sep']) ; 
      nm_limpa_hora($this->trandate_hora, $this->field_config['trandate']['time_sep']) ; 
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
      if ($Nome_Campo == "jmltagihan")
      {
          if (!empty($this->field_config['jmltagihan']['symbol_dec']))
          {
             $this->sc_remove_currency($this->jmltagihan, $this->field_config['jmltagihan']['symbol_dec'], $this->field_config['jmltagihan']['symbol_grp'], $this->field_config['jmltagihan']['symbol_mon']);
             nm_limpa_valor($this->jmltagihan, $this->field_config['jmltagihan']['symbol_dec'], $this->field_config['jmltagihan']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "jmlbayar")
      {
          if (!empty($this->field_config['jmlbayar']['symbol_dec']))
          {
             $this->sc_remove_currency($this->jmlbayar, $this->field_config['jmlbayar']['symbol_dec'], $this->field_config['jmlbayar']['symbol_grp'], $this->field_config['jmlbayar']['symbol_mon']);
             nm_limpa_valor($this->jmlbayar, $this->field_config['jmlbayar']['symbol_dec'], $this->field_config['jmlbayar']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "jmldk1")
      {
          if (!empty($this->field_config['jmldk1']['symbol_dec']))
          {
             $this->sc_remove_currency($this->jmldk1, $this->field_config['jmldk1']['symbol_dec'], $this->field_config['jmldk1']['symbol_grp'], $this->field_config['jmldk1']['symbol_mon']);
             nm_limpa_valor($this->jmldk1, $this->field_config['jmldk1']['symbol_dec'], $this->field_config['jmldk1']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "jmldk2")
      {
          if (!empty($this->field_config['jmldk2']['symbol_dec']))
          {
             $this->sc_remove_currency($this->jmldk2, $this->field_config['jmldk2']['symbol_dec'], $this->field_config['jmldk2']['symbol_grp'], $this->field_config['jmldk2']['symbol_mon']);
             nm_limpa_valor($this->jmldk2, $this->field_config['jmldk2']['symbol_dec'], $this->field_config['jmldk2']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "jmlasr")
      {
          if (!empty($this->field_config['jmlasr']['symbol_dec']))
          {
             $this->sc_remove_currency($this->jmlasr, $this->field_config['jmlasr']['symbol_dec'], $this->field_config['jmlasr']['symbol_grp'], $this->field_config['jmlasr']['symbol_mon']);
             nm_limpa_valor($this->jmlasr, $this->field_config['jmlasr']['symbol_dec'], $this->field_config['jmlasr']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "jmlkary")
      {
          if (!empty($this->field_config['jmlkary']['symbol_dec']))
          {
             $this->sc_remove_currency($this->jmlkary, $this->field_config['jmlkary']['symbol_dec'], $this->field_config['jmlkary']['symbol_grp'], $this->field_config['jmlkary']['symbol_mon']);
             nm_limpa_valor($this->jmlkary, $this->field_config['jmlkary']['symbol_dec'], $this->field_config['jmlkary']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "deposit")
      {
          if (!empty($this->field_config['deposit']['symbol_dec']))
          {
             $this->sc_remove_currency($this->deposit, $this->field_config['deposit']['symbol_dec'], $this->field_config['deposit']['symbol_grp'], $this->field_config['deposit']['symbol_mon']);
             nm_limpa_valor($this->deposit, $this->field_config['deposit']['symbol_dec'], $this->field_config['deposit']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "potongan")
      {
          if (!empty($this->field_config['potongan']['symbol_dec']))
          {
             $this->sc_remove_currency($this->potongan, $this->field_config['potongan']['symbol_dec'], $this->field_config['potongan']['symbol_grp'], $this->field_config['potongan']['symbol_mon']);
             nm_limpa_valor($this->potongan, $this->field_config['potongan']['symbol_dec'], $this->field_config['potongan']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "hrsdibayar")
      {
          if (!empty($this->field_config['hrsdibayar']['symbol_dec']))
          {
             $this->sc_remove_currency($this->hrsdibayar, $this->field_config['hrsdibayar']['symbol_dec'], $this->field_config['hrsdibayar']['symbol_grp'], $this->field_config['hrsdibayar']['symbol_mon']);
             nm_limpa_valor($this->hrsdibayar, $this->field_config['hrsdibayar']['symbol_dec'], $this->field_config['hrsdibayar']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "selisihpaket")
      {
          if (!empty($this->field_config['selisihpaket']['symbol_dec']))
          {
             $this->sc_remove_currency($this->selisihpaket, $this->field_config['selisihpaket']['symbol_dec'], $this->field_config['selisihpaket']['symbol_grp'], $this->field_config['selisihpaket']['symbol_mon']);
             nm_limpa_valor($this->selisihpaket, $this->field_config['selisihpaket']['symbol_dec'], $this->field_config['selisihpaket']['symbol_grp']);
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
      if ('' !== $this->jmltagihan || (!empty($format_fields) && isset($format_fields['jmltagihan'])))
      {
          nmgp_Form_Num_Val($this->jmltagihan, $this->field_config['jmltagihan']['symbol_grp'], $this->field_config['jmltagihan']['symbol_dec'], "0", "S", $this->field_config['jmltagihan']['format_neg'], "", "", "-", $this->field_config['jmltagihan']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['jmltagihan']['symbol_mon'];
          $this->sc_add_currency($this->jmltagihan, $sMonSymb, $this->field_config['jmltagihan']['format_pos']); 
      }
      if ('' !== $this->jmlbayar || (!empty($format_fields) && isset($format_fields['jmlbayar'])))
      {
          nmgp_Form_Num_Val($this->jmlbayar, $this->field_config['jmlbayar']['symbol_grp'], $this->field_config['jmlbayar']['symbol_dec'], "0", "S", $this->field_config['jmlbayar']['format_neg'], "", "", "-", $this->field_config['jmlbayar']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['jmlbayar']['symbol_mon'];
          $this->sc_add_currency($this->jmlbayar, $sMonSymb, $this->field_config['jmlbayar']['format_pos']); 
      }
      if ('' !== $this->jmldk1 || (!empty($format_fields) && isset($format_fields['jmldk1'])))
      {
          nmgp_Form_Num_Val($this->jmldk1, $this->field_config['jmldk1']['symbol_grp'], $this->field_config['jmldk1']['symbol_dec'], "0", "S", $this->field_config['jmldk1']['format_neg'], "", "", "-", $this->field_config['jmldk1']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['jmldk1']['symbol_mon'];
          $this->sc_add_currency($this->jmldk1, $sMonSymb, $this->field_config['jmldk1']['format_pos']); 
      }
      if ('' !== $this->jmldk2 || (!empty($format_fields) && isset($format_fields['jmldk2'])))
      {
          nmgp_Form_Num_Val($this->jmldk2, $this->field_config['jmldk2']['symbol_grp'], $this->field_config['jmldk2']['symbol_dec'], "0", "S", $this->field_config['jmldk2']['format_neg'], "", "", "-", $this->field_config['jmldk2']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['jmldk2']['symbol_mon'];
          $this->sc_add_currency($this->jmldk2, $sMonSymb, $this->field_config['jmldk2']['format_pos']); 
      }
      if ('' !== $this->jmlasr || (!empty($format_fields) && isset($format_fields['jmlasr'])))
      {
          nmgp_Form_Num_Val($this->jmlasr, $this->field_config['jmlasr']['symbol_grp'], $this->field_config['jmlasr']['symbol_dec'], "0", "S", $this->field_config['jmlasr']['format_neg'], "", "", "-", $this->field_config['jmlasr']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['jmlasr']['symbol_mon'];
          $this->sc_add_currency($this->jmlasr, $sMonSymb, $this->field_config['jmlasr']['format_pos']); 
      }
      if ('' !== $this->jmlkary || (!empty($format_fields) && isset($format_fields['jmlkary'])))
      {
          nmgp_Form_Num_Val($this->jmlkary, $this->field_config['jmlkary']['symbol_grp'], $this->field_config['jmlkary']['symbol_dec'], "0", "S", $this->field_config['jmlkary']['format_neg'], "", "", "-", $this->field_config['jmlkary']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['jmlkary']['symbol_mon'];
          $this->sc_add_currency($this->jmlkary, $sMonSymb, $this->field_config['jmlkary']['format_pos']); 
      }
      if ('' !== $this->deposit || (!empty($format_fields) && isset($format_fields['deposit'])))
      {
          nmgp_Form_Num_Val($this->deposit, $this->field_config['deposit']['symbol_grp'], $this->field_config['deposit']['symbol_dec'], "0", "S", $this->field_config['deposit']['format_neg'], "", "", "-", $this->field_config['deposit']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['deposit']['symbol_mon'];
          $this->sc_add_currency($this->deposit, $sMonSymb, $this->field_config['deposit']['format_pos']); 
      }
      if ('' !== $this->potongan || (!empty($format_fields) && isset($format_fields['potongan'])))
      {
          nmgp_Form_Num_Val($this->potongan, $this->field_config['potongan']['symbol_grp'], $this->field_config['potongan']['symbol_dec'], "0", "S", $this->field_config['potongan']['format_neg'], "", "", "-", $this->field_config['potongan']['symbol_fmt']) ; 
      }
      if ('' !== $this->hrsdibayar || (!empty($format_fields) && isset($format_fields['hrsdibayar'])))
      {
          nmgp_Form_Num_Val($this->hrsdibayar, $this->field_config['hrsdibayar']['symbol_grp'], $this->field_config['hrsdibayar']['symbol_dec'], "0", "S", $this->field_config['hrsdibayar']['format_neg'], "", "", "-", $this->field_config['hrsdibayar']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['hrsdibayar']['symbol_mon'];
          $this->sc_add_currency($this->hrsdibayar, $sMonSymb, $this->field_config['hrsdibayar']['format_pos']); 
      }
      if ('' !== $this->selisihpaket || (!empty($format_fields) && isset($format_fields['selisihpaket'])))
      {
          nmgp_Form_Num_Val($this->selisihpaket, $this->field_config['selisihpaket']['symbol_grp'], $this->field_config['selisihpaket']['symbol_dec'], "0", "S", $this->field_config['selisihpaket']['format_neg'], "", "", "-", $this->field_config['selisihpaket']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['selisihpaket']['symbol_mon'];
          $this->sc_add_currency($this->selisihpaket, $sMonSymb, $this->field_config['selisihpaket']['format_pos']); 
      }
      if ('' !== $this->id || (!empty($format_fields) && isset($format_fields['id'])))
      {
          nmgp_Form_Num_Val($this->id, $this->field_config['id']['symbol_grp'], $this->field_config['id']['symbol_dec'], "0", "S", $this->field_config['id']['format_neg'], "", "", "-", $this->field_config['id']['symbol_fmt']) ; 
      }
      if ((!empty($this->paiddate) && 'null' != $this->paiddate) || (!empty($format_fields) && isset($format_fields['paiddate'])))
      {
          $nm_separa_data = strpos($this->field_config['paiddate']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['paiddate']['date_format'];
          $this->field_config['paiddate']['date_format'] = substr($this->field_config['paiddate']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->paiddate, " ") ; 
          $this->paiddate_hora = substr($this->paiddate, $separador + 1) ; 
          $this->paiddate = substr($this->paiddate, 0, $separador) ; 
          nm_volta_data($this->paiddate, $this->field_config['paiddate']['date_format']) ; 
          nmgp_Form_Datas($this->paiddate, $this->field_config['paiddate']['date_format'], $this->field_config['paiddate']['date_sep']) ;  
          $this->field_config['paiddate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->paiddate_hora, $this->field_config['paiddate']['date_format']) ; 
          nmgp_Form_Hora($this->paiddate_hora, $this->field_config['paiddate']['date_format'], $this->field_config['paiddate']['time_sep']) ;  
          $this->field_config['paiddate']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->paiddate || '' == $this->paiddate)
      {
          $this->paiddate_hora = '';
          $this->paiddate = '';
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
      $guarda_format_hora = $this->field_config['paiddate']['date_format'];
      if ($this->paiddate != "")  
      { 
          $nm_separa_data = strpos($this->field_config['paiddate']['date_format'], ";") ;
          $this->field_config['paiddate']['date_format'] = substr($this->field_config['paiddate']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->paiddate, $this->field_config['paiddate']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->paiddate = str_replace('-', '', $this->paiddate);
          }
          $this->field_config['paiddate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->paiddate_hora, $this->field_config['paiddate']['date_format']) ; 
          if ($this->paiddate_hora == "" )  
          { 
              $this->paiddate_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->paiddate_hora = substr($this->paiddate_hora, 0, -4) . "." . substr($this->paiddate_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->paiddate_hora = substr($this->paiddate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->paiddate_hora = substr($this->paiddate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->paiddate_hora = substr($this->paiddate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->paiddate_hora = substr($this->paiddate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->paiddate_hora = substr($this->paiddate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->paiddate_hora = substr($this->paiddate_hora, 0, -4);
          }
          if ($this->paiddate != "")  
          { 
              $this->paiddate .= " " . $this->paiddate_hora ; 
          }
      } 
      if ($this->paiddate == "" && $use_null)  
      { 
          $this->paiddate = "null" ; 
      } 
      $this->field_config['paiddate']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_trancode();
          $this->ajax_return_values_nostruk();
          $this->ajax_return_values_custcode();
          $this->ajax_return_values_sc_field_1();
          $this->ajax_return_values_dokter();
          $this->ajax_return_values_jmltagihan();
          $this->ajax_return_values_jmlbayar();
          $this->ajax_return_values_jmldk1();
          $this->ajax_return_values_jmldk2();
          $this->ajax_return_values_jmlasr();
          $this->ajax_return_values_jmlkary();
          $this->ajax_return_values_deposit();
          $this->ajax_return_values_potongan();
          $this->ajax_return_values_hrsdibayar();
          $this->ajax_return_values_selisihpaket();
          $this->ajax_return_values_nopayment();
          $this->ajax_return_values_terimadari();
          $this->ajax_return_values_jenispayment();
          $this->ajax_return_values_kodepaket();
          $this->ajax_return_values_instansipenjamin();
          $this->ajax_return_values_bankdebit();
          $this->ajax_return_values_nokartu();
          $this->ajax_return_values_edc1();
          $this->ajax_return_values_edc2();
          $this->ajax_return_values_sc_field_0();
          $this->ajax_return_values_poli();
          $this->ajax_return_values_kasir();
          $this->ajax_return_values_id();
          $this->ajax_return_values_paiddate();
          $this->ajax_return_values_kode_akun();
          $this->ajax_return_values_detailkamar();
          $this->ajax_return_values_detailtindakan();
          $this->ajax_return_values_sc_field_2();
          $this->ajax_return_values_detailresep();
          $this->ajax_return_values_bhp();
          $this->ajax_return_values_detailresepokvk();
          $this->ajax_return_values_lab();
          $this->ajax_return_values_rad();
          $this->ajax_return_values_detailadm();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_pay_ranap_mob_pack_protect_string($this->nmgp_dados_form['id']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['kode_akun'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['where_filter'] = "trancode = '" . $this->nmgp_dados_form['kode_akun'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['where_detal']  = "trancode = '" . $this->nmgp_dados_form['kode_akun'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['grid_tbreseprawatinap_alt_script_case_init'] ]['grid_tbreseprawatinap_alt']['embutida_form_full'] = false;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['grid_tbreseprawatinap_alt_script_case_init'] ]['grid_tbreseprawatinap_alt']['embutida_form']       = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['grid_tbreseprawatinap_alt_script_case_init'] ]['grid_tbreseprawatinap_alt']['embutida_pai']        = "form_pay_ranap_mob";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['grid_tbreseprawatinap_alt_script_case_init'] ]['grid_tbreseprawatinap_alt']['embutida_form_parms'] = "v_tranri*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_paginacao*scinFULL*scoutNMSC_cab*scinN*scout";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['grid_tbreseprawatinap_alt_script_case_init'] ]['grid_tbreseprawatinap_alt']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['grid_tbreseprawatinap_alt_script_case_init'] ]['grid_tbreseprawatinap_alt']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['grid_tbreseprawatinap_alt_script_case_init'] ]['grid_tbreseprawatinap_alt'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['grid_tbreseprawatinap_alt_script_case_init'] ]['grid_tbreseprawatinap_alt'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['grid_tbreseprawatinap_alt_script_case_init'] ]['grid_tbreseprawatinap_alt']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['grid_tbreseprawatinap_alt_script_case_init'] ]['grid_tbreseprawatinap_alt']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['kode_akun'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['kode_akun'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['kode_akun'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['total']);
              }
          }
   } // ajax_return_values

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

          //----- nostruk
   function ajax_return_values_nostruk($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nostruk", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nostruk);
              $aLookup = array();
              $this->_tmp_lookup_nostruk = $this->nostruk;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT noStruk, noStruk  FROM tbdetailrawatinap WHERE tranCode = '$this->trancode' ORDER BY noStruk";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

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
              $aLookup[] = array(form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk'][] = $rs->fields[0];
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
          $sSelComp = "name=\"nostruk\"";
          if (isset($this->NM_ajax_info['select_html']['nostruk']) && !empty($this->NM_ajax_info['select_html']['nostruk']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['nostruk'];
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

                  if ($this->nostruk == $sValue)
                  {
                      $this->_tmp_lookup_nostruk = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['nostruk'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['nostruk']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['nostruk']['valList'][$i] = form_pay_ranap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['nostruk']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['nostruk']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['nostruk']['labList'] = $aLabel;
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT custCode, custCode FROM tbdetailrawatinap where tranCode = '$this->trancode' ORDER BY custCode";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['custcode']['valList'][$i] = form_pay_ranap_mob_pack_protect_string($v);
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

          //----- sc_field_1
   function ajax_return_values_sc_field_1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_1);
              $aLookup = array();
              $this->_tmp_lookup_sc_field_1 = $this->sc_field_1;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,', ', salut)  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&', '&salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['sc_field_1']['valList'][$i] = form_pay_ranap_mob_pack_protect_string($v);
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

          //----- dokter
   function ajax_return_values_dokter($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dokter", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dokter);
              $aLookup = array();
              $this->_tmp_lookup_dokter = $this->dokter;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "select dokter as kode, concat(gelar,' ', name,', ', spec) as dokter from tbdetailrawatinap a left join tbdoctor b on b.docCode = a.dokter where a.tranCode = '$this->trancode'";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter'][] = $rs->fields[0];
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
          $sSelComp = "name=\"dokter\"";
          if (isset($this->NM_ajax_info['select_html']['dokter']) && !empty($this->NM_ajax_info['select_html']['dokter']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['dokter'];
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

                  if ($this->dokter == $sValue)
                  {
                      $this->_tmp_lookup_dokter = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['dokter'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['dokter']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['dokter']['valList'][$i] = form_pay_ranap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['dokter']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['dokter']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['dokter']['labList'] = $aLabel;
          }
   }

          //----- jmltagihan
   function ajax_return_values_jmltagihan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jmltagihan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jmltagihan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['jmltagihan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- jmlbayar
   function ajax_return_values_jmlbayar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jmlbayar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jmlbayar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['jmlbayar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- jmldk1
   function ajax_return_values_jmldk1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jmldk1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jmldk1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['jmldk1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- jmldk2
   function ajax_return_values_jmldk2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jmldk2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jmldk2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['jmldk2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- jmlasr
   function ajax_return_values_jmlasr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jmlasr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jmlasr);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['jmlasr'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- jmlkary
   function ajax_return_values_jmlkary($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jmlkary", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jmlkary);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['jmlkary'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- deposit
   function ajax_return_values_deposit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("deposit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->deposit);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['deposit'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- potongan
   function ajax_return_values_potongan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("potongan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->potongan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['potongan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- hrsdibayar
   function ajax_return_values_hrsdibayar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hrsdibayar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hrsdibayar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hrsdibayar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- selisihpaket
   function ajax_return_values_selisihpaket($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("selisihpaket", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->selisihpaket);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['selisihpaket'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- nopayment
   function ajax_return_values_nopayment($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nopayment", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nopayment);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nopayment'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- terimadari
   function ajax_return_values_terimadari($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("terimadari", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->terimadari);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['terimadari'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- jenispayment
   function ajax_return_values_jenispayment($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jenispayment", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jenispayment);
              $aLookup = array();
              $this->_tmp_lookup_jenispayment = $this->jenispayment;

$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('TUNAI') => form_pay_ranap_mob_pack_protect_string("TUNAI"));
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('BPJS') => form_pay_ranap_mob_pack_protect_string("BPJS"));
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('KARTU KREDIT') => form_pay_ranap_mob_pack_protect_string("KARTU KREDIT"));
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('KARTU DEBIT') => form_pay_ranap_mob_pack_protect_string("KARTU DEBIT"));
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('ASURANSI') => form_pay_ranap_mob_pack_protect_string("ASURANSI"));
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('KARYAWAN') => form_pay_ranap_mob_pack_protect_string("KARYAWAN"));
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('KOMBINASI') => form_pay_ranap_mob_pack_protect_string("KOMBINASI"));
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('BANSOS') => form_pay_ranap_mob_pack_protect_string("BANSOS"));
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('JAMPERU') => form_pay_ranap_mob_pack_protect_string("JAMPERU"));
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('TUNAI PROMO') => form_pay_ranap_mob_pack_protect_string("TUNAI PROMO"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_jenispayment'][] = 'TUNAI';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_jenispayment'][] = 'BPJS';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_jenispayment'][] = 'KARTU KREDIT';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_jenispayment'][] = 'KARTU DEBIT';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_jenispayment'][] = 'ASURANSI';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_jenispayment'][] = 'KARYAWAN';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_jenispayment'][] = 'KOMBINASI';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_jenispayment'][] = 'BANSOS';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_jenispayment'][] = 'JAMPERU';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_jenispayment'][] = 'TUNAI PROMO';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"jenispayment\"";
          if (isset($this->NM_ajax_info['select_html']['jenispayment']) && !empty($this->NM_ajax_info['select_html']['jenispayment']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['jenispayment'];
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

                  if ($this->jenispayment == $sValue)
                  {
                      $this->_tmp_lookup_jenispayment = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['jenispayment'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['jenispayment']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['jenispayment']['valList'][$i] = form_pay_ranap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['jenispayment']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['jenispayment']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['jenispayment']['labList'] = $aLabel;
          }
   }

          //----- kodepaket
   function ajax_return_values_kodepaket($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kodepaket", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kodepaket);
              $aLookup = array();
              $this->_tmp_lookup_kodepaket = $this->kodepaket;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket'] = array(); 
}
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('') => form_pay_ranap_mob_pack_protect_string(' '));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT id, kodePaket + ' - ' + namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT id, concat(kodePaket,' - ',namaPaket)  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT id, kodePaket&' - '&namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT id, kodePaket||' - '||namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT id, kodePaket + ' - ' + namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT id, kodePaket||' - '||namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   else
   {
       $nm_comando = "SELECT id, kodePaket||' - '||namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket'][] = $rs->fields[0];
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
          $sSelComp = "name=\"kodepaket\"";
          if (isset($this->NM_ajax_info['select_html']['kodepaket']) && !empty($this->NM_ajax_info['select_html']['kodepaket']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['kodepaket'];
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

                  if ($this->kodepaket == $sValue)
                  {
                      $this->_tmp_lookup_kodepaket = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['kodepaket'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['kodepaket']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['kodepaket']['valList'][$i] = form_pay_ranap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['kodepaket']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['kodepaket']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['kodepaket']['labList'] = $aLabel;
          }
   }

          //----- instansipenjamin
   function ajax_return_values_instansipenjamin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("instansipenjamin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->instansipenjamin);
              $aLookup = array();
              $this->_tmp_lookup_instansipenjamin = $this->instansipenjamin;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_instansipenjamin']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_instansipenjamin'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_instansipenjamin']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_instansipenjamin'] = array(); 
    }

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT instCode, name FROM tbinstansi WHERE instCode = '" . substr($this->Db->qstr($this->instansipenjamin), 1, -1) . "' ORDER BY name";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_instansipenjamin'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['instansipenjamin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['instansipenjamin']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['instansipenjamin']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['instansipenjamin']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($this->instansipenjamin))]) ? $aLookup[0][form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($this->instansipenjamin))] : "";
          $this->NM_ajax_info['fldList']['instansipenjamin_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- bankdebit
   function ajax_return_values_bankdebit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bankdebit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bankdebit);
              $aLookup = array();
              $this->_tmp_lookup_bankdebit = $this->bankdebit;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit'] = array(); 
}
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('') => form_pay_ranap_mob_pack_protect_string(' '));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT bankName, bankName  FROM tbbank  ORDER BY bankName";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit'][] = $rs->fields[0];
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
          $sSelComp = "name=\"bankdebit\"";
          if (isset($this->NM_ajax_info['select_html']['bankdebit']) && !empty($this->NM_ajax_info['select_html']['bankdebit']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['bankdebit'];
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

                  if ($this->bankdebit == $sValue)
                  {
                      $this->_tmp_lookup_bankdebit = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['bankdebit'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['bankdebit']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['bankdebit']['valList'][$i] = form_pay_ranap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['bankdebit']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['bankdebit']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['bankdebit']['labList'] = $aLabel;
          }
   }

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

          //----- edc1
   function ajax_return_values_edc1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("edc1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->edc1);
              $aLookup = array();
              $this->_tmp_lookup_edc1 = $this->edc1;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1'] = array(); 
}
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('') => form_pay_ranap_mob_pack_protect_string(' '));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT bankName, bankName  FROM tbbank  ORDER BY bankName";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1'][] = $rs->fields[0];
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
          $sSelComp = "name=\"edc1\"";
          if (isset($this->NM_ajax_info['select_html']['edc1']) && !empty($this->NM_ajax_info['select_html']['edc1']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['edc1'];
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

                  if ($this->edc1 == $sValue)
                  {
                      $this->_tmp_lookup_edc1 = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['edc1'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['edc1']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['edc1']['valList'][$i] = form_pay_ranap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['edc1']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['edc1']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['edc1']['labList'] = $aLabel;
          }
   }

          //----- edc2
   function ajax_return_values_edc2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("edc2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->edc2);
              $aLookup = array();
              $this->_tmp_lookup_edc2 = $this->edc2;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2'] = array(); 
}
$aLookup[] = array(form_pay_ranap_mob_pack_protect_string('') => form_pay_ranap_mob_pack_protect_string(' '));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT bankName, bankName  FROM tbbank  ORDER BY bankName";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2'][] = $rs->fields[0];
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
          $sSelComp = "name=\"edc2\"";
          if (isset($this->NM_ajax_info['select_html']['edc2']) && !empty($this->NM_ajax_info['select_html']['edc2']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['edc2'];
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

                  if ($this->edc2 == $sValue)
                  {
                      $this->_tmp_lookup_edc2 = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['edc2'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['edc2']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['edc2']['valList'][$i] = form_pay_ranap_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['edc2']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['edc2']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['edc2']['labList'] = $aLabel;
          }
   }

          //----- sc_field_0
   function ajax_return_values_sc_field_0($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_0", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_0);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sc_field_0'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT name, name  FROM tbpoli where polyCode = (SELECT poli from tbdoctor where docCode = '$this->dokter')";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_pay_ranap_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['poli']['valList'][$i] = form_pay_ranap_mob_pack_protect_string($v);
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

          //----- kasir
   function ajax_return_values_kasir($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kasir", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kasir);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['kasir'] = array(
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

          //----- paiddate
   function ajax_return_values_paiddate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("paiddate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->paiddate);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['paiddate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->paiddate . ' ' . $this->paiddate_hora),
              );
          }
   }

          //----- kode_akun
   function ajax_return_values_kode_akun($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kode_akun", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kode_akun);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['kode_akun'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- detailkamar
   function ajax_return_values_detailkamar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detailkamar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detailkamar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detailkamar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- detailtindakan
   function ajax_return_values_detailtindakan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detailtindakan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detailtindakan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detailtindakan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- sc_field_2
   function ajax_return_values_sc_field_2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sc_field_2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- detailresep
   function ajax_return_values_detailresep($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detailresep", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detailresep);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detailresep'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- bhp
   function ajax_return_values_bhp($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bhp", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bhp);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bhp'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- detailresepokvk
   function ajax_return_values_detailresepokvk($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detailresepokvk", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detailresepokvk);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detailresepokvk'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- lab
   function ajax_return_values_lab($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lab", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lab);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lab'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- rad
   function ajax_return_values_rad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['upload_dir'][$fieldName][] = $newName;
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
       $this->NM_ajax_info['btnVars']['var_btn_Cetak_payno'] = $this->form_encode_input($this->nmgp_dados_form['nopayment']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_payno'] = $this->form_encode_input($this->nmgp_dados_form['nopayment']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_1_payno'] = $this->form_encode_input($this->nmgp_dados_form['trancode']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_2_payno'] = $this->form_encode_input($this->nmgp_dados_form['nopayment']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_3_payno'] = $this->form_encode_input($this->nmgp_dados_form['nopayment']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_4_payno'] = $this->form_encode_input($this->nmgp_dados_form['nopayment']);
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_edc1 = $this->edc1;
    $original_edc2 = $this->edc2;
    $original_kode_akun = $this->kode_akun;
    $original_sc_field_0 = $this->sc_field_0;
}
if (!isset($this->sc_temp_trancode_s)) {$this->sc_temp_trancode_s = (isset($_SESSION['trancode_s'])) ? $_SESSION['trancode_s'] : "";}
if (!isset($this->sc_temp_strukRI)) {$this->sc_temp_strukRI = (isset($_SESSION['strukRI'])) ? $_SESSION['strukRI'] : "";}
  if($this->jenispayment == 'TUNAI'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "off"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'off';
	$this->nmgp_cmp_hidden["bankdebit"] = "off"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'off';
	$this->nmgp_cmp_hidden["nokartu"] = "off"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'off';
	$this->nmgp_cmp_hidden["sc_field_0"] = "off"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'off';
	$this->nmgp_cmp_hidden["jmldk1"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'off';
	$this->nmgp_cmp_hidden["jmldk2"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'off';
	$this->nmgp_cmp_hidden["jmlasr"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'off';
	$this->nmgp_cmp_hidden["jmlkary"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'off';
	$this->nmgp_cmp_hidden["edc1"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'off';
	$this->nmgp_cmp_hidden["edc2"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'off';
}elseif($this->jenispayment == 'ASURANSI'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "on"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'on';
	$this->nmgp_cmp_hidden["bankdebit"] = "off"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'off';
	$this->nmgp_cmp_hidden["nokartu"] = "on"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'on';
	$this->nmgp_cmp_hidden["sc_field_0"] = "on"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'on';
	$this->nmgp_cmp_hidden["jmldk1"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'off';
	$this->nmgp_cmp_hidden["jmldk2"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'off';
	$this->nmgp_cmp_hidden["jmlasr"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'on';
	$this->nmgp_cmp_hidden["jmlkary"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'off';
	$this->nmgp_cmp_hidden["edc1"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'off';
	$this->nmgp_cmp_hidden["edc2"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'off';
}elseif($this->jenispayment == 'KARTU DEBIT' OR $this->jenispayment == 'KARTU KREDIT'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "off"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'off';
	$this->nmgp_cmp_hidden["bankdebit"] = "on"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'on';
	$this->nmgp_cmp_hidden["nokartu"] = "on"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'on';
	$this->nmgp_cmp_hidden["sc_field_0"] = "off"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'off';
	$this->nmgp_cmp_hidden["jmldk1"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'on';
	$this->nmgp_cmp_hidden["jmldk2"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'on';
	$this->nmgp_cmp_hidden["jmlasr"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'off';
	$this->nmgp_cmp_hidden["jmlkary"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'off';
	$this->nmgp_cmp_hidden["edc1"] = "on"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'on';
	$this->nmgp_cmp_hidden["edc2"] = "on"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'on';
}elseif($this->jenispayment == 'KARYAWAN'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "off"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'off';
	$this->nmgp_cmp_hidden["bankdebit"] = "off"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'off';
	$this->nmgp_cmp_hidden["nokartu"] = "off"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'off';
	$this->nmgp_cmp_hidden["sc_field_0"] = "off"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'off';
	$this->nmgp_cmp_hidden["jmldk1"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'off';
	$this->nmgp_cmp_hidden["jmldk2"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'off';
	$this->nmgp_cmp_hidden["jmlasr"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'off';
	$this->nmgp_cmp_hidden["jmlkary"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'on';
	$this->nmgp_cmp_hidden["edc1"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'off';
	$this->nmgp_cmp_hidden["edc2"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'off';
}elseif ($this->jenispayment  == 'KOMBINASI'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "on"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'on';
	$this->nmgp_cmp_hidden["bankdebit"] = "on"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'on';
	$this->nmgp_cmp_hidden["nokartu"] = "on"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'on';
	$this->nmgp_cmp_hidden["sc_field_0"] = "on"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'on';
	$this->nmgp_cmp_hidden["jmldk1"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'on';
	$this->nmgp_cmp_hidden["jmldk2"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'on';
	$this->nmgp_cmp_hidden["jmlasr"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'on';
	$this->nmgp_cmp_hidden["jmlkary"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'off';
	$this->nmgp_cmp_hidden["edc1"] = "on"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'on';
	$this->nmgp_cmp_hidden["edc2"] = "on"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'on';
}elseif ($this->jenispayment  == 'JAMPERU'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "on"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'on';
	$this->nmgp_cmp_hidden["bankdebit"] = "off"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'off';
	$this->nmgp_cmp_hidden["nokartu"] = "off"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'off';
	$this->nmgp_cmp_hidden["sc_field_0"] = "on"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'on';
	$this->nmgp_cmp_hidden["jmldk1"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'off';
	$this->nmgp_cmp_hidden["jmldk2"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'off';
	$this->nmgp_cmp_hidden["jmlasr"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'off';
	$this->nmgp_cmp_hidden["jmlkary"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'off';
	$this->nmgp_cmp_hidden["edc1"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'off';
	$this->nmgp_cmp_hidden["edc2"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'off';
}elseif ($this->jenispayment == 'TUNAI PROMO'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "off"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'off';
	$this->nmgp_cmp_hidden["bankdebit"] = "off"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'off';
	$this->nmgp_cmp_hidden["nokartu"] = "off"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'off';
	$this->nmgp_cmp_hidden["sc_field_0"] = "off"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'off';
	$this->nmgp_cmp_hidden["jmldk1"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'off';
	$this->nmgp_cmp_hidden["jmldk2"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'off';
	$this->nmgp_cmp_hidden["jmlasr"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'off';
	$this->nmgp_cmp_hidden["jmlkary"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'off';
	$this->nmgp_cmp_hidden["edc1"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'off';
	$this->nmgp_cmp_hidden["edc2"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'off';
	$this->nmgp_cmp_hidden["kodepaket"] = "on"; $this->NM_ajax_info['fieldDisplay']['kodepaket'] = 'on';
}

$this->sc_temp_strukRI = $this->nopayment ;

if($this->jmlbayar  > 0){
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
}
else  
{
	$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "on";;
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "on";;
}

$check_sql = "SELECT a.tranCode"
   . " FROM (select tranCode, inapCode  from tbdetailok union all select tranCode, inapCode from tbdetailvk) a"
   . " WHERE a.inapCode = '" . $this->trancode  . "'";
 
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
    $this->kode_akun  = $this->rs[0][0];
}
		else     
{
	$this->kode_akun  = '';
}

$this->sc_temp_trancode_s = $this->trancode ;
if (isset($this->sc_temp_strukRI)) { $_SESSION['strukRI'] = $this->sc_temp_strukRI;}
if (isset($this->sc_temp_trancode_s)) { $_SESSION['trancode_s'] = $this->sc_temp_trancode_s;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_edc1 != $this->edc1 || (isset($bFlagRead_edc1) && $bFlagRead_edc1)))
    {
        $this->ajax_return_values_edc1(true);
    }
    if (($original_edc2 != $this->edc2 || (isset($bFlagRead_edc2) && $bFlagRead_edc2)))
    {
        $this->ajax_return_values_edc2(true);
    }
    if (($original_kode_akun != $this->kode_akun || (isset($bFlagRead_kode_akun) && $bFlagRead_kode_akun)))
    {
        $this->ajax_return_values_kode_akun(true);
    }
    if (($original_sc_field_0 != $this->sc_field_0 || (isset($bFlagRead_sc_field_0) && $bFlagRead_sc_field_0)))
    {
        $this->ajax_return_values_sc_field_0(true);
    }
}
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off'; 
      }
      if (empty($this->paiddate))
      {
          $this->paiddate_hora = $this->paiddate;
      }
      if (empty($this->trandate))
      {
          $this->trandate_hora = $this->trandate;
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
      $this->jmltagihan = str_replace($sc_parm1, $sc_parm2, $this->jmltagihan); 
      $this->jmlbayar = str_replace($sc_parm1, $sc_parm2, $this->jmlbayar); 
      $this->jmldk1 = str_replace($sc_parm1, $sc_parm2, $this->jmldk1); 
      $this->jmldk2 = str_replace($sc_parm1, $sc_parm2, $this->jmldk2); 
      $this->jmlasr = str_replace($sc_parm1, $sc_parm2, $this->jmlasr); 
      $this->jmlkary = str_replace($sc_parm1, $sc_parm2, $this->jmlkary); 
      $this->deposit = str_replace($sc_parm1, $sc_parm2, $this->deposit); 
      $this->potongan = str_replace($sc_parm1, $sc_parm2, $this->potongan); 
      $this->hrsdibayar = str_replace($sc_parm1, $sc_parm2, $this->hrsdibayar); 
      $this->selisihpaket = str_replace($sc_parm1, $sc_parm2, $this->selisihpaket); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->jmltagihan = "'" . $this->jmltagihan . "'";
      $this->jmlbayar = "'" . $this->jmlbayar . "'";
      $this->jmldk1 = "'" . $this->jmldk1 . "'";
      $this->jmldk2 = "'" . $this->jmldk2 . "'";
      $this->jmlasr = "'" . $this->jmlasr . "'";
      $this->jmlkary = "'" . $this->jmlkary . "'";
      $this->deposit = "'" . $this->deposit . "'";
      $this->potongan = "'" . $this->potongan . "'";
      $this->hrsdibayar = "'" . $this->hrsdibayar . "'";
      $this->selisihpaket = "'" . $this->selisihpaket . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->jmltagihan = str_replace("'", "", $this->jmltagihan); 
      $this->jmlbayar = str_replace("'", "", $this->jmlbayar); 
      $this->jmldk1 = str_replace("'", "", $this->jmldk1); 
      $this->jmldk2 = str_replace("'", "", $this->jmldk2); 
      $this->jmlasr = str_replace("'", "", $this->jmlasr); 
      $this->jmlkary = str_replace("'", "", $this->jmlkary); 
      $this->deposit = str_replace("'", "", $this->deposit); 
      $this->potongan = str_replace("'", "", $this->potongan); 
      $this->hrsdibayar = str_replace("'", "", $this->hrsdibayar); 
      $this->selisihpaket = str_replace("'", "", $this->selisihpaket); 
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
      $_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_kasir = $this->kasir;
}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  $todayY = date("y");
$todayM = date("m");
$check_sql = "SELECT max(noPayment) FROM tbpayment_ri  WHERE noPayment LIKE 'P/RI/$todayY/$todayM/%'";
 
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
	$lastNoUrut = substr($lastNoTransaksi, 11, 5); 
	$nextNoUrut = $lastNoUrut + 1;
	$this->nopayment  = 'P/RI/'.$todayY.'/'.$todayM.'/'.sprintf('%05s', $nextNoUrut);
}
		else     
{
	$this->nopayment  = 'P/RI/'.$todayY.'/'.$todayM.'/'.sprintf('%05s', '1');
}

$this->lunas  = 'N';

$check_sql = "SELECT concat(name,', ', salut)"
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
    $nama = $this->rs[0][0];
}
		else     
{
	$nama = '';
}

$this->terimadari  = $nama;

$this->kasir  = $this->sc_temp_usr_login;
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_kasir != $this->kasir || (isset($bFlagRead_kasir) && $bFlagRead_kasir)))
    {
        $this->ajax_return_values_kasir(true);
    }
}
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off'; 
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
      $NM_val_form['trancode'] = $this->trancode;
      $NM_val_form['nostruk'] = $this->nostruk;
      $NM_val_form['custcode'] = $this->custcode;
      $NM_val_form['sc_field_1'] = $this->sc_field_1;
      $NM_val_form['dokter'] = $this->dokter;
      $NM_val_form['jmltagihan'] = $this->jmltagihan;
      $NM_val_form['jmlbayar'] = $this->jmlbayar;
      $NM_val_form['jmldk1'] = $this->jmldk1;
      $NM_val_form['jmldk2'] = $this->jmldk2;
      $NM_val_form['jmlasr'] = $this->jmlasr;
      $NM_val_form['jmlkary'] = $this->jmlkary;
      $NM_val_form['deposit'] = $this->deposit;
      $NM_val_form['potongan'] = $this->potongan;
      $NM_val_form['hrsdibayar'] = $this->hrsdibayar;
      $NM_val_form['selisihpaket'] = $this->selisihpaket;
      $NM_val_form['nopayment'] = $this->nopayment;
      $NM_val_form['terimadari'] = $this->terimadari;
      $NM_val_form['jenispayment'] = $this->jenispayment;
      $NM_val_form['kodepaket'] = $this->kodepaket;
      $NM_val_form['instansipenjamin'] = $this->instansipenjamin;
      $NM_val_form['bankdebit'] = $this->bankdebit;
      $NM_val_form['nokartu'] = $this->nokartu;
      $NM_val_form['edc1'] = $this->edc1;
      $NM_val_form['edc2'] = $this->edc2;
      $NM_val_form['sc_field_0'] = $this->sc_field_0;
      $NM_val_form['poli'] = $this->poli;
      $NM_val_form['kasir'] = $this->kasir;
      $NM_val_form['id'] = $this->id;
      $NM_val_form['paiddate'] = $this->paiddate;
      $NM_val_form['kode_akun'] = $this->kode_akun;
      $NM_val_form['detailkamar'] = $this->detailkamar;
      $NM_val_form['detailtindakan'] = $this->detailtindakan;
      $NM_val_form['sc_field_2'] = $this->sc_field_2;
      $NM_val_form['detailresep'] = $this->detailresep;
      $NM_val_form['bhp'] = $this->bhp;
      $NM_val_form['detailresepokvk'] = $this->detailresepokvk;
      $NM_val_form['lab'] = $this->lab;
      $NM_val_form['rad'] = $this->rad;
      $NM_val_form['detailadm'] = $this->detailadm;
      $NM_val_form['trandate'] = $this->trandate;
      $NM_val_form['lunas'] = $this->lunas;
      if ($this->id === "" || is_null($this->id))  
      { 
          $this->id = 0;
      } 
      if ($this->nostruk === "" || is_null($this->nostruk))  
      { 
          $this->nostruk = 0;
          $this->sc_force_zero[] = 'nostruk';
      } 
      if ($this->jmltagihan === "" || is_null($this->jmltagihan))  
      { 
          $this->jmltagihan = 0;
          $this->sc_force_zero[] = 'jmltagihan';
      } 
      if ($this->jmlbayar === "" || is_null($this->jmlbayar))  
      { 
          $this->jmlbayar = 0;
          $this->sc_force_zero[] = 'jmlbayar';
      } 
      if ($this->deposit === "" || is_null($this->deposit))  
      { 
          $this->deposit = 0;
          $this->sc_force_zero[] = 'deposit';
      } 
      if ($this->potongan === "" || is_null($this->potongan))  
      { 
          $this->potongan = 0;
          $this->sc_force_zero[] = 'potongan';
      } 
      if ($this->hrsdibayar === "" || is_null($this->hrsdibayar))  
      { 
          $this->hrsdibayar = 0;
          $this->sc_force_zero[] = 'hrsdibayar';
      } 
      if ($this->jmldk1 === "" || is_null($this->jmldk1))  
      { 
          $this->jmldk1 = 0;
          $this->sc_force_zero[] = 'jmldk1';
      } 
      if ($this->jmldk2 === "" || is_null($this->jmldk2))  
      { 
          $this->jmldk2 = 0;
          $this->sc_force_zero[] = 'jmldk2';
      } 
      if ($this->jmlasr === "" || is_null($this->jmlasr))  
      { 
          $this->jmlasr = 0;
          $this->sc_force_zero[] = 'jmlasr';
      } 
      if ($this->jmlkary === "" || is_null($this->jmlkary))  
      { 
          $this->jmlkary = 0;
          $this->sc_force_zero[] = 'jmlkary';
      } 
      if ($this->selisihpaket === "" || is_null($this->selisihpaket))  
      { 
          $this->selisihpaket = 0;
          $this->sc_force_zero[] = 'selisihpaket';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['decimal_db'] == ",") 
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
          $this->dokter_before_qstr = $this->dokter;
          $this->dokter = substr($this->Db->qstr($this->dokter), 1, -1); 
          if ($this->dokter == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->dokter = "null"; 
              $NM_val_null[] = "dokter";
          } 
          if ($this->trandate == "")  
          { 
              $this->trandate = "null"; 
              $NM_val_null[] = "trandate";
          } 
          $this->terimadari_before_qstr = $this->terimadari;
          $this->terimadari = substr($this->Db->qstr($this->terimadari), 1, -1); 
          if ($this->terimadari == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->terimadari = "null"; 
              $NM_val_null[] = "terimadari";
          } 
          $this->jenispayment_before_qstr = $this->jenispayment;
          $this->jenispayment = substr($this->Db->qstr($this->jenispayment), 1, -1); 
          if ($this->jenispayment == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->jenispayment = "null"; 
              $NM_val_null[] = "jenispayment";
          } 
          $this->instansipenjamin_before_qstr = $this->instansipenjamin;
          $this->instansipenjamin = substr($this->Db->qstr($this->instansipenjamin), 1, -1); 
          if ($this->instansipenjamin == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->instansipenjamin = "null"; 
              $NM_val_null[] = "instansipenjamin";
          } 
          $this->bankdebit_before_qstr = $this->bankdebit;
          $this->bankdebit = substr($this->Db->qstr($this->bankdebit), 1, -1); 
          if ($this->bankdebit == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->bankdebit = "null"; 
              $NM_val_null[] = "bankdebit";
          } 
          $this->nokartu_before_qstr = $this->nokartu;
          $this->nokartu = substr($this->Db->qstr($this->nokartu), 1, -1); 
          if ($this->nokartu == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nokartu = "null"; 
              $NM_val_null[] = "nokartu";
          } 
          $this->sc_field_0_before_qstr = $this->sc_field_0;
          $this->sc_field_0 = substr($this->Db->qstr($this->sc_field_0), 1, -1); 
          if ($this->sc_field_0 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sc_field_0 = "null"; 
              $NM_val_null[] = "sc_field_0";
          } 
          $this->lunas_before_qstr = $this->lunas;
          $this->lunas = substr($this->Db->qstr($this->lunas), 1, -1); 
          if ($this->lunas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->lunas = "null"; 
              $NM_val_null[] = "lunas";
          } 
          if ($this->paiddate == "")  
          { 
              $this->paiddate = "null"; 
              $NM_val_null[] = "paiddate";
          } 
          $this->nopayment_before_qstr = $this->nopayment;
          $this->nopayment = substr($this->Db->qstr($this->nopayment), 1, -1); 
          if ($this->nopayment == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nopayment = "null"; 
              $NM_val_null[] = "nopayment";
          } 
          $this->kasir_before_qstr = $this->kasir;
          $this->kasir = substr($this->Db->qstr($this->kasir), 1, -1); 
          if ($this->kasir == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->kasir = "null"; 
              $NM_val_null[] = "kasir";
          } 
          $this->kode_akun_before_qstr = $this->kode_akun;
          $this->kode_akun = substr($this->Db->qstr($this->kode_akun), 1, -1); 
          if ($this->kode_akun == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->kode_akun = "null"; 
              $NM_val_null[] = "kode_akun";
          } 
          $this->edc1_before_qstr = $this->edc1;
          $this->edc1 = substr($this->Db->qstr($this->edc1), 1, -1); 
          if ($this->edc1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->edc1 = "null"; 
              $NM_val_null[] = "edc1";
          } 
          $this->edc2_before_qstr = $this->edc2;
          $this->edc2 = substr($this->Db->qstr($this->edc2), 1, -1); 
          if ($this->edc2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->edc2 = "null"; 
              $NM_val_null[] = "edc2";
          } 
          $this->kodepaket_before_qstr = $this->kodepaket;
          $this->kodepaket = substr($this->Db->qstr($this->kodepaket), 1, -1); 
          if ($this->kodepaket == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->kodepaket = "null"; 
              $NM_val_null[] = "kodepaket";
          } 
          $this->lab_before_qstr = $this->lab;
          $this->lab = substr($this->Db->qstr($this->lab), 1, -1); 
          if ($this->lab == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->lab = "null"; 
              $NM_val_null[] = "lab";
          } 
          $this->rad_before_qstr = $this->rad;
          $this->rad = substr($this->Db->qstr($this->rad), 1, -1); 
          if ($this->rad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->rad = "null"; 
              $NM_val_null[] = "rad";
          } 
          $this->sc_field_2_before_qstr = $this->sc_field_2;
          $this->sc_field_2 = substr($this->Db->qstr($this->sc_field_2), 1, -1); 
          if ($this->sc_field_2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sc_field_2 = "null"; 
              $NM_val_null[] = "sc_field_2";
          } 
          $this->bhp_before_qstr = $this->bhp;
          $this->bhp = substr($this->Db->qstr($this->bhp), 1, -1); 
          if ($this->bhp == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->bhp = "null"; 
              $NM_val_null[] = "bhp";
          } 
          $this->detailadm_before_qstr = $this->detailadm;
          $this->detailadm = substr($this->Db->qstr($this->detailadm), 1, -1); 
          if ($this->detailadm == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detailadm = "null"; 
              $NM_val_null[] = "detailadm";
          } 
          $this->detailkamar_before_qstr = $this->detailkamar;
          $this->detailkamar = substr($this->Db->qstr($this->detailkamar), 1, -1); 
          if ($this->detailkamar == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detailkamar = "null"; 
              $NM_val_null[] = "detailkamar";
          } 
          $this->detailresep_before_qstr = $this->detailresep;
          $this->detailresep = substr($this->Db->qstr($this->detailresep), 1, -1); 
          if ($this->detailresep == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detailresep = "null"; 
              $NM_val_null[] = "detailresep";
          } 
          $this->detailtindakan_before_qstr = $this->detailtindakan;
          $this->detailtindakan = substr($this->Db->qstr($this->detailtindakan), 1, -1); 
          if ($this->detailtindakan == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detailtindakan = "null"; 
              $NM_val_null[] = "detailtindakan";
          } 
          $this->detailresepokvk_before_qstr = $this->detailresepokvk;
          $this->detailresepokvk = substr($this->Db->qstr($this->detailresepokvk), 1, -1); 
          if ($this->detailresepokvk == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detailresepokvk = "null"; 
              $NM_val_null[] = "detailresepokvk";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['decimal_db'] == ",") 
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
                 form_pay_ranap_mob_pack_ajax_response();
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
                  $SC_fields_update[] = "tranCode = '$this->trancode', noStruk = $this->nostruk, custCode = '$this->custcode', dokter = '$this->dokter', jmlTagihan = $this->jmltagihan, jmlBayar = $this->jmlbayar, deposit = $this->deposit, potongan = $this->potongan, hrsDibayar = $this->hrsdibayar, terimaDari = '$this->terimadari', jenisPayment = '$this->jenispayment', instansiPenjamin = '$this->instansipenjamin', bankDebit = '$this->bankdebit', noKartu = '$this->nokartu', `Jaminan/Polis` = '$this->sc_field_0', paidDate = #$this->paiddate#, noPayment = '$this->nopayment', kasir = '$this->kasir', kode_akun = '$this->kode_akun', jmlDK1 = $this->jmldk1, jmlDK2 = $this->jmldk2, jmlAsr = $this->jmlasr, jmlKary = $this->jmlkary, edc1 = '$this->edc1', edc2 = '$this->edc2', selisihPaket = $this->selisihpaket, kodePaket = '$this->kodepaket'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', noStruk = $this->nostruk, custCode = '$this->custcode', dokter = '$this->dokter', jmlTagihan = $this->jmltagihan, jmlBayar = $this->jmlbayar, deposit = $this->deposit, potongan = $this->potongan, hrsDibayar = $this->hrsdibayar, terimaDari = '$this->terimadari', jenisPayment = '$this->jenispayment', instansiPenjamin = '$this->instansipenjamin', bankDebit = '$this->bankdebit', noKartu = '$this->nokartu', `Jaminan/Polis` = '$this->sc_field_0', paidDate = " . $this->Ini->date_delim . $this->paiddate . $this->Ini->date_delim1 . ", noPayment = '$this->nopayment', kasir = '$this->kasir', kode_akun = '$this->kode_akun', jmlDK1 = $this->jmldk1, jmlDK2 = $this->jmldk2, jmlAsr = $this->jmlasr, jmlKary = $this->jmlkary, edc1 = '$this->edc1', edc2 = '$this->edc2', selisihPaket = $this->selisihpaket, kodePaket = '$this->kodepaket'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', noStruk = $this->nostruk, custCode = '$this->custcode', dokter = '$this->dokter', jmlTagihan = $this->jmltagihan, jmlBayar = $this->jmlbayar, deposit = $this->deposit, potongan = $this->potongan, hrsDibayar = $this->hrsdibayar, terimaDari = '$this->terimadari', jenisPayment = '$this->jenispayment', instansiPenjamin = '$this->instansipenjamin', bankDebit = '$this->bankdebit', noKartu = '$this->nokartu', `Jaminan/Polis` = '$this->sc_field_0', paidDate = " . $this->Ini->date_delim . $this->paiddate . $this->Ini->date_delim1 . ", noPayment = '$this->nopayment', kasir = '$this->kasir', kode_akun = '$this->kode_akun', jmlDK1 = $this->jmldk1, jmlDK2 = $this->jmldk2, jmlAsr = $this->jmlasr, jmlKary = $this->jmlkary, edc1 = '$this->edc1', edc2 = '$this->edc2', selisihPaket = $this->selisihpaket, kodePaket = '$this->kodepaket'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', noStruk = $this->nostruk, custCode = '$this->custcode', dokter = '$this->dokter', jmlTagihan = $this->jmltagihan, jmlBayar = $this->jmlbayar, deposit = $this->deposit, potongan = $this->potongan, hrsDibayar = $this->hrsdibayar, terimaDari = '$this->terimadari', jenisPayment = '$this->jenispayment', instansiPenjamin = '$this->instansipenjamin', bankDebit = '$this->bankdebit', noKartu = '$this->nokartu', `Jaminan/Polis` = '$this->sc_field_0', paidDate = EXTEND('$this->paiddate', YEAR TO FRACTION), noPayment = '$this->nopayment', kasir = '$this->kasir', kode_akun = '$this->kode_akun', jmlDK1 = $this->jmldk1, jmlDK2 = $this->jmldk2, jmlAsr = $this->jmlasr, jmlKary = $this->jmlkary, edc1 = '$this->edc1', edc2 = '$this->edc2', selisihPaket = $this->selisihpaket, kodePaket = '$this->kodepaket'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', noStruk = $this->nostruk, custCode = '$this->custcode', dokter = '$this->dokter', jmlTagihan = $this->jmltagihan, jmlBayar = $this->jmlbayar, deposit = $this->deposit, potongan = $this->potongan, hrsDibayar = $this->hrsdibayar, terimaDari = '$this->terimadari', jenisPayment = '$this->jenispayment', instansiPenjamin = '$this->instansipenjamin', bankDebit = '$this->bankdebit', noKartu = '$this->nokartu', `Jaminan/Polis` = '$this->sc_field_0', paidDate = " . $this->Ini->date_delim . $this->paiddate . $this->Ini->date_delim1 . ", noPayment = '$this->nopayment', kasir = '$this->kasir', kode_akun = '$this->kode_akun', jmlDK1 = $this->jmldk1, jmlDK2 = $this->jmldk2, jmlAsr = $this->jmlasr, jmlKary = $this->jmlkary, edc1 = '$this->edc1', edc2 = '$this->edc2', selisihPaket = $this->selisihpaket, kodePaket = '$this->kodepaket'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', noStruk = $this->nostruk, custCode = '$this->custcode', dokter = '$this->dokter', jmlTagihan = $this->jmltagihan, jmlBayar = $this->jmlbayar, deposit = $this->deposit, potongan = $this->potongan, hrsDibayar = $this->hrsdibayar, terimaDari = '$this->terimadari', jenisPayment = '$this->jenispayment', instansiPenjamin = '$this->instansipenjamin', bankDebit = '$this->bankdebit', noKartu = '$this->nokartu', `Jaminan/Polis` = '$this->sc_field_0', paidDate = " . $this->Ini->date_delim . $this->paiddate . $this->Ini->date_delim1 . ", noPayment = '$this->nopayment', kasir = '$this->kasir', kode_akun = '$this->kode_akun', jmlDK1 = $this->jmldk1, jmlDK2 = $this->jmldk2, jmlAsr = $this->jmlasr, jmlKary = $this->jmlkary, edc1 = '$this->edc1', edc2 = '$this->edc2', selisihPaket = $this->selisihpaket, kodePaket = '$this->kodepaket'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', noStruk = $this->nostruk, custCode = '$this->custcode', dokter = '$this->dokter', jmlTagihan = $this->jmltagihan, jmlBayar = $this->jmlbayar, deposit = $this->deposit, potongan = $this->potongan, hrsDibayar = $this->hrsdibayar, terimaDari = '$this->terimadari', jenisPayment = '$this->jenispayment', instansiPenjamin = '$this->instansipenjamin', bankDebit = '$this->bankdebit', noKartu = '$this->nokartu', `Jaminan/Polis` = '$this->sc_field_0', paidDate = " . $this->Ini->date_delim . $this->paiddate . $this->Ini->date_delim1 . ", noPayment = '$this->nopayment', kasir = '$this->kasir', kode_akun = '$this->kode_akun', jmlDK1 = $this->jmldk1, jmlDK2 = $this->jmldk2, jmlAsr = $this->jmlasr, jmlKary = $this->jmlkary, edc1 = '$this->edc1', edc2 = '$this->edc2', selisihPaket = $this->selisihpaket, kodePaket = '$this->kodepaket'"; 
              } 
              if (isset($NM_val_form['trandate']) && $NM_val_form['trandate'] != $this->nmgp_dados_select['trandate']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "tranDate = #$this->trandate#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "tranDate = EXTEND('" . $this->trandate . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "tranDate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['lunas']) && $NM_val_form['lunas'] != $this->nmgp_dados_select['lunas']) 
              { 
                  $SC_fields_update[] = "lunas = '$this->lunas'"; 
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
                                  form_pay_ranap_mob_pack_ajax_response();
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
              $this->dokter = $this->dokter_before_qstr;
              $this->terimadari = $this->terimadari_before_qstr;
              $this->jenispayment = $this->jenispayment_before_qstr;
              $this->instansipenjamin = $this->instansipenjamin_before_qstr;
              $this->bankdebit = $this->bankdebit_before_qstr;
              $this->nokartu = $this->nokartu_before_qstr;
              $this->sc_field_0 = $this->sc_field_0_before_qstr;
              $this->lunas = $this->lunas_before_qstr;
              $this->nopayment = $this->nopayment_before_qstr;
              $this->kasir = $this->kasir_before_qstr;
              $this->kode_akun = $this->kode_akun_before_qstr;
              $this->edc1 = $this->edc1_before_qstr;
              $this->edc2 = $this->edc2_before_qstr;
              $this->kodepaket = $this->kodepaket_before_qstr;
              $this->lab = $this->lab_before_qstr;
              $this->rad = $this->rad_before_qstr;
              $this->sc_field_2 = $this->sc_field_2_before_qstr;
              $this->bhp = $this->bhp_before_qstr;
              $this->detailadm = $this->detailadm_before_qstr;
              $this->detailkamar = $this->detailkamar_before_qstr;
              $this->detailresep = $this->detailresep_before_qstr;
              $this->detailtindakan = $this->detailtindakan_before_qstr;
              $this->detailresepokvk = $this->detailresepokvk_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['trancode'])) { $this->trancode = $NM_val_form['trancode']; }
              elseif (isset($this->trancode)) { $this->nm_limpa_alfa($this->trancode); }
              if     (isset($NM_val_form) && isset($NM_val_form['nostruk'])) { $this->nostruk = $NM_val_form['nostruk']; }
              elseif (isset($this->nostruk)) { $this->nm_limpa_alfa($this->nostruk); }
              if     (isset($NM_val_form) && isset($NM_val_form['custcode'])) { $this->custcode = $NM_val_form['custcode']; }
              elseif (isset($this->custcode)) { $this->nm_limpa_alfa($this->custcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['dokter'])) { $this->dokter = $NM_val_form['dokter']; }
              elseif (isset($this->dokter)) { $this->nm_limpa_alfa($this->dokter); }
              if     (isset($NM_val_form) && isset($NM_val_form['jmltagihan'])) { $this->jmltagihan = $NM_val_form['jmltagihan']; }
              elseif (isset($this->jmltagihan)) { $this->nm_limpa_alfa($this->jmltagihan); }
              if     (isset($NM_val_form) && isset($NM_val_form['jmlbayar'])) { $this->jmlbayar = $NM_val_form['jmlbayar']; }
              elseif (isset($this->jmlbayar)) { $this->nm_limpa_alfa($this->jmlbayar); }
              if     (isset($NM_val_form) && isset($NM_val_form['deposit'])) { $this->deposit = $NM_val_form['deposit']; }
              elseif (isset($this->deposit)) { $this->nm_limpa_alfa($this->deposit); }
              if     (isset($NM_val_form) && isset($NM_val_form['potongan'])) { $this->potongan = $NM_val_form['potongan']; }
              elseif (isset($this->potongan)) { $this->nm_limpa_alfa($this->potongan); }
              if     (isset($NM_val_form) && isset($NM_val_form['hrsdibayar'])) { $this->hrsdibayar = $NM_val_form['hrsdibayar']; }
              elseif (isset($this->hrsdibayar)) { $this->nm_limpa_alfa($this->hrsdibayar); }
              if     (isset($NM_val_form) && isset($NM_val_form['terimadari'])) { $this->terimadari = $NM_val_form['terimadari']; }
              elseif (isset($this->terimadari)) { $this->nm_limpa_alfa($this->terimadari); }
              if     (isset($NM_val_form) && isset($NM_val_form['jenispayment'])) { $this->jenispayment = $NM_val_form['jenispayment']; }
              elseif (isset($this->jenispayment)) { $this->nm_limpa_alfa($this->jenispayment); }
              if     (isset($NM_val_form) && isset($NM_val_form['instansipenjamin'])) { $this->instansipenjamin = $NM_val_form['instansipenjamin']; }
              elseif (isset($this->instansipenjamin)) { $this->nm_limpa_alfa($this->instansipenjamin); }
              if     (isset($NM_val_form) && isset($NM_val_form['bankdebit'])) { $this->bankdebit = $NM_val_form['bankdebit']; }
              elseif (isset($this->bankdebit)) { $this->nm_limpa_alfa($this->bankdebit); }
              if     (isset($NM_val_form) && isset($NM_val_form['nokartu'])) { $this->nokartu = $NM_val_form['nokartu']; }
              elseif (isset($this->nokartu)) { $this->nm_limpa_alfa($this->nokartu); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_0'])) { $this->sc_field_0 = $NM_val_form['sc_field_0']; }
              elseif (isset($this->sc_field_0)) { $this->nm_limpa_alfa($this->sc_field_0); }
              if     (isset($NM_val_form) && isset($NM_val_form['nopayment'])) { $this->nopayment = $NM_val_form['nopayment']; }
              elseif (isset($this->nopayment)) { $this->nm_limpa_alfa($this->nopayment); }
              if     (isset($NM_val_form) && isset($NM_val_form['kasir'])) { $this->kasir = $NM_val_form['kasir']; }
              elseif (isset($this->kasir)) { $this->nm_limpa_alfa($this->kasir); }
              if     (isset($NM_val_form) && isset($NM_val_form['kode_akun'])) { $this->kode_akun = $NM_val_form['kode_akun']; }
              elseif (isset($this->kode_akun)) { $this->nm_limpa_alfa($this->kode_akun); }
              if     (isset($NM_val_form) && isset($NM_val_form['jmldk1'])) { $this->jmldk1 = $NM_val_form['jmldk1']; }
              elseif (isset($this->jmldk1)) { $this->nm_limpa_alfa($this->jmldk1); }
              if     (isset($NM_val_form) && isset($NM_val_form['jmldk2'])) { $this->jmldk2 = $NM_val_form['jmldk2']; }
              elseif (isset($this->jmldk2)) { $this->nm_limpa_alfa($this->jmldk2); }
              if     (isset($NM_val_form) && isset($NM_val_form['jmlasr'])) { $this->jmlasr = $NM_val_form['jmlasr']; }
              elseif (isset($this->jmlasr)) { $this->nm_limpa_alfa($this->jmlasr); }
              if     (isset($NM_val_form) && isset($NM_val_form['jmlkary'])) { $this->jmlkary = $NM_val_form['jmlkary']; }
              elseif (isset($this->jmlkary)) { $this->nm_limpa_alfa($this->jmlkary); }
              if     (isset($NM_val_form) && isset($NM_val_form['edc1'])) { $this->edc1 = $NM_val_form['edc1']; }
              elseif (isset($this->edc1)) { $this->nm_limpa_alfa($this->edc1); }
              if     (isset($NM_val_form) && isset($NM_val_form['edc2'])) { $this->edc2 = $NM_val_form['edc2']; }
              elseif (isset($this->edc2)) { $this->nm_limpa_alfa($this->edc2); }
              if     (isset($NM_val_form) && isset($NM_val_form['selisihpaket'])) { $this->selisihpaket = $NM_val_form['selisihpaket']; }
              elseif (isset($this->selisihpaket)) { $this->nm_limpa_alfa($this->selisihpaket); }
              if     (isset($NM_val_form) && isset($NM_val_form['kodepaket'])) { $this->kodepaket = $NM_val_form['kodepaket']; }
              elseif (isset($this->kodepaket)) { $this->nm_limpa_alfa($this->kodepaket); }
              if     (isset($NM_val_form) && isset($NM_val_form['lab'])) { $this->lab = $NM_val_form['lab']; }
              elseif (isset($this->lab)) { $this->nm_limpa_alfa($this->lab); }
              if     (isset($NM_val_form) && isset($NM_val_form['rad'])) { $this->rad = $NM_val_form['rad']; }
              elseif (isset($this->rad)) { $this->nm_limpa_alfa($this->rad); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_2'])) { $this->sc_field_2 = $NM_val_form['sc_field_2']; }
              elseif (isset($this->sc_field_2)) { $this->nm_limpa_alfa($this->sc_field_2); }
              if     (isset($NM_val_form) && isset($NM_val_form['bhp'])) { $this->bhp = $NM_val_form['bhp']; }
              elseif (isset($this->bhp)) { $this->nm_limpa_alfa($this->bhp); }
              if     (isset($NM_val_form) && isset($NM_val_form['detailadm'])) { $this->detailadm = $NM_val_form['detailadm']; }
              elseif (isset($this->detailadm)) { $this->nm_limpa_alfa($this->detailadm); }
              if     (isset($NM_val_form) && isset($NM_val_form['detailkamar'])) { $this->detailkamar = $NM_val_form['detailkamar']; }
              elseif (isset($this->detailkamar)) { $this->nm_limpa_alfa($this->detailkamar); }
              if     (isset($NM_val_form) && isset($NM_val_form['detailresep'])) { $this->detailresep = $NM_val_form['detailresep']; }
              elseif (isset($this->detailresep)) { $this->nm_limpa_alfa($this->detailresep); }
              if     (isset($NM_val_form) && isset($NM_val_form['detailtindakan'])) { $this->detailtindakan = $NM_val_form['detailtindakan']; }
              elseif (isset($this->detailtindakan)) { $this->nm_limpa_alfa($this->detailtindakan); }
              if     (isset($NM_val_form) && isset($NM_val_form['detailresepokvk'])) { $this->detailresepokvk = $NM_val_form['detailresepokvk']; }
              elseif (isset($this->detailresepokvk)) { $this->nm_limpa_alfa($this->detailresepokvk); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('trancode', 'nostruk', 'custcode', 'sc_field_1', 'dokter', 'jmltagihan', 'jmlbayar', 'jmldk1', 'jmldk2', 'jmlasr', 'jmlkary', 'deposit', 'potongan', 'hrsdibayar', 'selisihpaket', 'nopayment', 'terimadari', 'jenispayment', 'kodepaket', 'instansipenjamin', 'bankdebit', 'nokartu', 'edc1', 'edc2', 'sc_field_0', 'poli', 'kasir', 'id', 'paiddate', 'kode_akun', 'detailkamar', 'detailtindakan', 'sc_field_2', 'detailresep', 'bhp', 'detailresepokvk', 'lab', 'rad', 'detailadm'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['decimal_db'] == ",") 
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_pay_ranap_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis`, lunas, paidDate, noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket) VALUES ('$this->trancode', $this->nostruk, '$this->custcode', '$this->dokter', $this->jmltagihan, $this->jmlbayar, $this->deposit, $this->potongan, $this->hrsdibayar, #$this->trandate#, '$this->terimadari', '$this->jenispayment', '$this->instansipenjamin', '$this->bankdebit', '$this->nokartu', '$this->sc_field_0', '$this->lunas', #$this->paiddate#, '$this->nopayment', '$this->kasir', '$this->kode_akun', $this->jmldk1, $this->jmldk2, $this->jmlasr, $this->jmlkary, '$this->edc1', '$this->edc2', $this->selisihpaket, '$this->kodepaket')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis`, lunas, paidDate, noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket) VALUES (" . $NM_seq_auto . "'$this->trancode', $this->nostruk, '$this->custcode', '$this->dokter', $this->jmltagihan, $this->jmlbayar, $this->deposit, $this->potongan, $this->hrsdibayar, " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->terimadari', '$this->jenispayment', '$this->instansipenjamin', '$this->bankdebit', '$this->nokartu', '$this->sc_field_0', '$this->lunas', " . $this->Ini->date_delim . $this->paiddate . $this->Ini->date_delim1 . ", '$this->nopayment', '$this->kasir', '$this->kode_akun', $this->jmldk1, $this->jmldk2, $this->jmlasr, $this->jmlkary, '$this->edc1', '$this->edc2', $this->selisihpaket, '$this->kodepaket')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis`, lunas, paidDate, noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket) VALUES (" . $NM_seq_auto . "'$this->trancode', $this->nostruk, '$this->custcode', '$this->dokter', $this->jmltagihan, $this->jmlbayar, $this->deposit, $this->potongan, $this->hrsdibayar, " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->terimadari', '$this->jenispayment', '$this->instansipenjamin', '$this->bankdebit', '$this->nokartu', '$this->sc_field_0', '$this->lunas', " . $this->Ini->date_delim . $this->paiddate . $this->Ini->date_delim1 . ", '$this->nopayment', '$this->kasir', '$this->kode_akun', $this->jmldk1, $this->jmldk2, $this->jmlasr, $this->jmlkary, '$this->edc1', '$this->edc2', $this->selisihpaket, '$this->kodepaket')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis`, lunas, paidDate, noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket) VALUES (" . $NM_seq_auto . "'$this->trancode', $this->nostruk, '$this->custcode', '$this->dokter', $this->jmltagihan, $this->jmlbayar, $this->deposit, $this->potongan, $this->hrsdibayar, " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->terimadari', '$this->jenispayment', '$this->instansipenjamin', '$this->bankdebit', '$this->nokartu', '$this->sc_field_0', '$this->lunas', " . $this->Ini->date_delim . $this->paiddate . $this->Ini->date_delim1 . ", '$this->nopayment', '$this->kasir', '$this->kode_akun', $this->jmldk1, $this->jmldk2, $this->jmlasr, $this->jmlkary, '$this->edc1', '$this->edc2', $this->selisihpaket, '$this->kodepaket')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis`, lunas, paidDate, noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket) VALUES (" . $NM_seq_auto . "'$this->trancode', $this->nostruk, '$this->custcode', '$this->dokter', $this->jmltagihan, $this->jmlbayar, $this->deposit, $this->potongan, $this->hrsdibayar, EXTEND('$this->trandate', YEAR TO FRACTION), '$this->terimadari', '$this->jenispayment', '$this->instansipenjamin', '$this->bankdebit', '$this->nokartu', '$this->sc_field_0', '$this->lunas', EXTEND('$this->paiddate', YEAR TO FRACTION), '$this->nopayment', '$this->kasir', '$this->kode_akun', $this->jmldk1, $this->jmldk2, $this->jmlasr, $this->jmlkary, '$this->edc1', '$this->edc2', $this->selisihpaket, '$this->kodepaket')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis`, lunas, paidDate, noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket) VALUES (" . $NM_seq_auto . "'$this->trancode', $this->nostruk, '$this->custcode', '$this->dokter', $this->jmltagihan, $this->jmlbayar, $this->deposit, $this->potongan, $this->hrsdibayar, " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->terimadari', '$this->jenispayment', '$this->instansipenjamin', '$this->bankdebit', '$this->nokartu', '$this->sc_field_0', '$this->lunas', " . $this->Ini->date_delim . $this->paiddate . $this->Ini->date_delim1 . ", '$this->nopayment', '$this->kasir', '$this->kode_akun', $this->jmldk1, $this->jmldk2, $this->jmlasr, $this->jmlkary, '$this->edc1', '$this->edc2', $this->selisihpaket, '$this->kodepaket')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis`, lunas, paidDate, noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket) VALUES (" . $NM_seq_auto . "'$this->trancode', $this->nostruk, '$this->custcode', '$this->dokter', $this->jmltagihan, $this->jmlbayar, $this->deposit, $this->potongan, $this->hrsdibayar, " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->terimadari', '$this->jenispayment', '$this->instansipenjamin', '$this->bankdebit', '$this->nokartu', '$this->sc_field_0', '$this->lunas', " . $this->Ini->date_delim . $this->paiddate . $this->Ini->date_delim1 . ", '$this->nopayment', '$this->kasir', '$this->kode_akun', $this->jmldk1, $this->jmldk2, $this->jmlasr, $this->jmlkary, '$this->edc1', '$this->edc2', $this->selisihpaket, '$this->kodepaket')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis`, lunas, paidDate, noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket) VALUES (" . $NM_seq_auto . "'$this->trancode', $this->nostruk, '$this->custcode', '$this->dokter', $this->jmltagihan, $this->jmlbayar, $this->deposit, $this->potongan, $this->hrsdibayar, " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->terimadari', '$this->jenispayment', '$this->instansipenjamin', '$this->bankdebit', '$this->nokartu', '$this->sc_field_0', '$this->lunas', " . $this->Ini->date_delim . $this->paiddate . $this->Ini->date_delim1 . ", '$this->nopayment', '$this->kasir', '$this->kode_akun', $this->jmldk1, $this->jmldk2, $this->jmlasr, $this->jmlkary, '$this->edc1', '$this->edc2', $this->selisihpaket, '$this->kodepaket')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis`, lunas, paidDate, noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket) VALUES (" . $NM_seq_auto . "'$this->trancode', $this->nostruk, '$this->custcode', '$this->dokter', $this->jmltagihan, $this->jmlbayar, $this->deposit, $this->potongan, $this->hrsdibayar, " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", '$this->terimadari', '$this->jenispayment', '$this->instansipenjamin', '$this->bankdebit', '$this->nokartu', '$this->sc_field_0', '$this->lunas', " . $this->Ini->date_delim . $this->paiddate . $this->Ini->date_delim1 . ", '$this->nopayment', '$this->kasir', '$this->kode_akun', $this->jmldk1, $this->jmldk2, $this->jmlasr, $this->jmlkary, '$this->edc1', '$this->edc2', $this->selisihpaket, '$this->kodepaket')"; 
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
                              form_pay_ranap_mob_pack_ajax_response();
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
                          form_pay_ranap_mob_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->trancode = $this->trancode_before_qstr;
              $this->custcode = $this->custcode_before_qstr;
              $this->dokter = $this->dokter_before_qstr;
              $this->terimadari = $this->terimadari_before_qstr;
              $this->jenispayment = $this->jenispayment_before_qstr;
              $this->instansipenjamin = $this->instansipenjamin_before_qstr;
              $this->bankdebit = $this->bankdebit_before_qstr;
              $this->nokartu = $this->nokartu_before_qstr;
              $this->sc_field_0 = $this->sc_field_0_before_qstr;
              $this->lunas = $this->lunas_before_qstr;
              $this->nopayment = $this->nopayment_before_qstr;
              $this->kasir = $this->kasir_before_qstr;
              $this->kode_akun = $this->kode_akun_before_qstr;
              $this->edc1 = $this->edc1_before_qstr;
              $this->edc2 = $this->edc2_before_qstr;
              $this->kodepaket = $this->kodepaket_before_qstr;
              $this->lab = $this->lab_before_qstr;
              $this->rad = $this->rad_before_qstr;
              $this->sc_field_2 = $this->sc_field_2_before_qstr;
              $this->bhp = $this->bhp_before_qstr;
              $this->detailadm = $this->detailadm_before_qstr;
              $this->detailkamar = $this->detailkamar_before_qstr;
              $this->detailresep = $this->detailresep_before_qstr;
              $this->detailtindakan = $this->detailtindakan_before_qstr;
              $this->detailresepokvk = $this->detailresepokvk_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['Cetak'] = "on";
              $this->nmgp_botoes['sc_btn_0'] = "on";
              $this->nmgp_botoes['sc_btn_1'] = "on";
              $this->nmgp_botoes['sc_btn_2'] = "on";
              $this->nmgp_botoes['sc_btn_3'] = "on";
              $this->nmgp_botoes['sc_btn_4'] = "on";
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['decimal_db'] == ",") 
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
              $sDetailWhere = "tranCode = '" . $this->trancode . "'";
              $this->form_tbrujukanlab_mob->ini_controle();
              if ($this->form_tbrujukanlab_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "'";
              $this->form_tbrujukanradiologi_mob->ini_controle();
              if ($this->form_tbrujukanradiologi_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "trancode = '" . $this->kode_akun . "'";
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
              $this->form_tbbhprawatinap_mob->ini_controle();
              if ($this->form_tbbhprawatinap_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "'";
              $this->form_detailadm_mob->ini_controle();
              if ($this->form_detailadm_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "'";
              $this->form_tbbillruang_mob->ini_controle();
              if ($this->form_tbbillruang_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "'";
              $this->form_tbtindakanrawatinap_mob->ini_controle();
              if ($this->form_tbtindakanrawatinap_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->kode_akun . "'";
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
                          form_pay_ranap_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total']);
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
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['decimal_db'] == ",")
        {
           $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
  $check_sql = "SELECT sum(deposit)"
   . " FROM tbpayment_ri"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlDeposit = $this->rs[0][0];
    
}
		else     
{
	$jmlDeposit = '0';
}

$akhir = $this->jmltagihan ;

$check_sql = "SELECT sum(jmlBayar)"
   . " FROM tbpayment_ri"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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

    $bayar = $this->rs[0][0];

$check_sql = "SELECT jenisPayment"
   . " FROM tbpayment_ri"
   . " WHERE noPayment = '".$this->nopayment ."'";
 
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
	$jnsByr = $this->rs[0][0];
}
		else     
{
	$jnsByr = '';
}
    
if($bayar >= $akhir){
	if(empty($this->paiddate ) || is_null($this->paiddate )){
			$update_table  = 'tbpayment_ri';      
			$update_where  = "noPayment = '".$this->nopayment ."'"; 
			$update_fields = array(   
				 "lunas = 'Y'",
				 "paidDate = '".date('Y-m-d H:i')."'",
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
                form_pay_ranap_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}else{
	if($jnsByr == 'BPJS' || $jnsByr == 'BANSOS' || $jnsByr == 'ASURANSI'){
			$update_table  = 'tbpayment_ri';      
			$update_where  = "noPayment = '".$this->nopayment ."'"; 
			$update_fields = array(   
				 "lunas = 'Y'",
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
                form_pay_ranap_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
	}
}else{
	$update_table  = 'tbpayment_ri';      
	$update_where  = "noPayment = '".$this->nopayment ."'"; 
	$update_fields = array(   
		 "lunas = 'N'",
		 "paidDate = '".date('Y-m-d H:i')."'",
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
                form_pay_ranap_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
}
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off'; 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = null === $this->id ? null : substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['iframe_evento'] = $this->sc_evento; 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_pay_ranap_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'] = $qt_geral_reg_form_pay_ranap_mob;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_pay_ranap_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] > $qt_geral_reg_form_pay_ranap_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] = $qt_geral_reg_form_pay_ranap_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] = $qt_geral_reg_form_pay_ranap_mob; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'] + 1; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT id, tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, str_replace (convert(char(10),tranDate,102), '.', '-') + ' ' + convert(char(8),tranDate,20), terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0, lunas, str_replace (convert(char(10),paidDate,102), '.', '-') + ' ' + convert(char(8),paidDate,20), noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT id, tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, convert(char(23),tranDate,121), terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0, lunas, convert(char(23),paidDate,121), noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT id, tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0, lunas, paidDate, noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT id, tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, EXTEND(tranDate, YEAR TO FRACTION), terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0, lunas, EXTEND(paidDate, YEAR TO FRACTION), noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT id, tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0, lunas, paidDate, noPayment, kasir, kode_akun, jmlDK1, jmlDK2, jmlAsr, jmlKary, edc1, edc2, selisihPaket, kodePaket from " . $this->Ini->nm_tabela ; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['Cetak'] = $this->nmgp_botoes['Cetak'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_1'] = $this->nmgp_botoes['sc_btn_1'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_2'] = $this->nmgp_botoes['sc_btn_2'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_3'] = $this->nmgp_botoes['sc_btn_3'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_4'] = $this->nmgp_botoes['sc_btn_4'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['Cetak'] = $this->nmgp_botoes['Cetak'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_1'] = $this->nmgp_botoes['sc_btn_1'] = "on";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_2'] = $this->nmgp_botoes['sc_btn_2'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_3'] = $this->nmgp_botoes['sc_btn_3'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_4'] = $this->nmgp_botoes['sc_btn_4'] = "off";
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
              $this->nostruk = $rs->fields[2] ; 
              $this->nmgp_dados_select['nostruk'] = $this->nostruk;
              $this->custcode = $rs->fields[3] ; 
              $this->nmgp_dados_select['custcode'] = $this->custcode;
              $this->dokter = $rs->fields[4] ; 
              $this->nmgp_dados_select['dokter'] = $this->dokter;
              $this->jmltagihan = $rs->fields[5] ; 
              $this->nmgp_dados_select['jmltagihan'] = $this->jmltagihan;
              $this->jmlbayar = $rs->fields[6] ; 
              $this->nmgp_dados_select['jmlbayar'] = $this->jmlbayar;
              $this->deposit = $rs->fields[7] ; 
              $this->nmgp_dados_select['deposit'] = $this->deposit;
              $this->potongan = $rs->fields[8] ; 
              $this->nmgp_dados_select['potongan'] = $this->potongan;
              $this->hrsdibayar = $rs->fields[9] ; 
              $this->nmgp_dados_select['hrsdibayar'] = $this->hrsdibayar;
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
              $this->terimadari = $rs->fields[11] ; 
              $this->nmgp_dados_select['terimadari'] = $this->terimadari;
              $this->jenispayment = $rs->fields[12] ; 
              $this->nmgp_dados_select['jenispayment'] = $this->jenispayment;
              $this->instansipenjamin = $rs->fields[13] ; 
              $this->nmgp_dados_select['instansipenjamin'] = $this->instansipenjamin;
              $this->bankdebit = $rs->fields[14] ; 
              $this->nmgp_dados_select['bankdebit'] = $this->bankdebit;
              $this->nokartu = $rs->fields[15] ; 
              $this->nmgp_dados_select['nokartu'] = $this->nokartu;
              $this->sc_field_0 = $rs->fields[16] ; 
              $this->nmgp_dados_select['sc_field_0'] = $this->sc_field_0;
              $this->lunas = $rs->fields[17] ; 
              $this->nmgp_dados_select['lunas'] = $this->lunas;
              $this->paiddate = $rs->fields[18] ; 
              if (substr($this->paiddate, 10, 1) == "-") 
              { 
                 $this->paiddate = substr($this->paiddate, 0, 10) . " " . substr($this->paiddate, 11);
              } 
              if (substr($this->paiddate, 13, 1) == ".") 
              { 
                 $this->paiddate = substr($this->paiddate, 0, 13) . ":" . substr($this->paiddate, 14, 2) . ":" . substr($this->paiddate, 17);
              } 
              $this->nmgp_dados_select['paiddate'] = $this->paiddate;
              $this->nopayment = $rs->fields[19] ; 
              $this->nmgp_dados_select['nopayment'] = $this->nopayment;
              $this->kasir = $rs->fields[20] ; 
              $this->nmgp_dados_select['kasir'] = $this->kasir;
              $this->kode_akun = $rs->fields[21] ; 
              $this->nmgp_dados_select['kode_akun'] = $this->kode_akun;
              $this->jmldk1 = $rs->fields[22] ; 
              $this->nmgp_dados_select['jmldk1'] = $this->jmldk1;
              $this->jmldk2 = $rs->fields[23] ; 
              $this->nmgp_dados_select['jmldk2'] = $this->jmldk2;
              $this->jmlasr = $rs->fields[24] ; 
              $this->nmgp_dados_select['jmlasr'] = $this->jmlasr;
              $this->jmlkary = $rs->fields[25] ; 
              $this->nmgp_dados_select['jmlkary'] = $this->jmlkary;
              $this->edc1 = $rs->fields[26] ; 
              $this->nmgp_dados_select['edc1'] = $this->edc1;
              $this->edc2 = $rs->fields[27] ; 
              $this->nmgp_dados_select['edc2'] = $this->edc2;
              $this->selisihpaket = $rs->fields[28] ; 
              $this->nmgp_dados_select['selisihpaket'] = $this->selisihpaket;
              $this->kodepaket = $rs->fields[29] ; 
              $this->nmgp_dados_select['kodepaket'] = $this->kodepaket;
              $this->lab = $rs->fields[30] ; 
              $this->nmgp_dados_select['lab'] = $this->lab;
              $this->rad = $rs->fields[31] ; 
              $this->nmgp_dados_select['rad'] = $this->rad;
              $this->sc_field_2 = $rs->fields[32] ; 
              $this->nmgp_dados_select['sc_field_2'] = $this->sc_field_2;
              $this->bhp = $rs->fields[33] ; 
              $this->nmgp_dados_select['bhp'] = $this->bhp;
              $this->detailadm = $rs->fields[34] ; 
              $this->nmgp_dados_select['detailadm'] = $this->detailadm;
              $this->detailkamar = $rs->fields[35] ; 
              $this->nmgp_dados_select['detailkamar'] = $this->detailkamar;
              $this->detailresep = $rs->fields[36] ; 
              $this->nmgp_dados_select['detailresep'] = $this->detailresep;
              $this->detailtindakan = $rs->fields[37] ; 
              $this->nmgp_dados_select['detailtindakan'] = $this->detailtindakan;
              $this->detailresepokvk = $rs->fields[38] ; 
              $this->nmgp_dados_select['detailresepokvk'] = $this->detailresepokvk;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id = (string)$this->id; 
              $this->nostruk = (string)$this->nostruk; 
              $this->jmltagihan = (string)$this->jmltagihan; 
              $this->jmlbayar = (string)$this->jmlbayar; 
              $this->deposit = (string)$this->deposit; 
              $this->potongan = (string)$this->potongan; 
              $this->hrsdibayar = (string)$this->hrsdibayar; 
              $this->jmldk1 = (string)$this->jmldk1; 
              $this->jmldk2 = (string)$this->jmldk2; 
              $this->jmlasr = (string)$this->jmlasr; 
              $this->jmlkary = (string)$this->jmlkary; 
              $this->selisihpaket = (string)$this->selisihpaket; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['parms'] = "id?#?$this->id?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['reg_start'] < $qt_geral_reg_form_pay_ranap_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opcao']   = '';
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
              $this->nostruk = "";  
              $this->nmgp_dados_form["nostruk"] = $this->nostruk;
              $this->custcode = "";  
              $this->nmgp_dados_form["custcode"] = $this->custcode;
              $this->dokter = "";  
              $this->nmgp_dados_form["dokter"] = $this->dokter;
              $this->jmltagihan = "";  
              $this->nmgp_dados_form["jmltagihan"] = $this->jmltagihan;
              $this->jmlbayar = "";  
              $this->nmgp_dados_form["jmlbayar"] = $this->jmlbayar;
              $this->deposit = "";  
              $this->nmgp_dados_form["deposit"] = $this->deposit;
              $this->potongan = "";  
              $this->nmgp_dados_form["potongan"] = $this->potongan;
              $this->hrsdibayar = "";  
              $this->nmgp_dados_form["hrsdibayar"] = $this->hrsdibayar;
              $this->trandate = "";  
              $this->trandate_hora = "" ;  
              $this->nmgp_dados_form["trandate"] = $this->trandate;
              $this->terimadari = "";  
              $this->nmgp_dados_form["terimadari"] = $this->terimadari;
              $this->jenispayment = "";  
              $this->nmgp_dados_form["jenispayment"] = $this->jenispayment;
              $this->instansipenjamin = "";  
              $this->nmgp_dados_form["instansipenjamin"] = $this->instansipenjamin;
              $this->bankdebit = "";  
              $this->nmgp_dados_form["bankdebit"] = $this->bankdebit;
              $this->nokartu = "";  
              $this->nmgp_dados_form["nokartu"] = $this->nokartu;
              $this->sc_field_0 = "-";  
              $this->nmgp_dados_form["sc_field_0"] = $this->sc_field_0;
              $this->lunas = "";  
              $this->nmgp_dados_form["lunas"] = $this->lunas;
              $this->paiddate = "";  
              $this->paiddate_hora = "" ;  
              $this->nmgp_dados_form["paiddate"] = $this->paiddate;
              $this->nopayment = "";  
              $this->nmgp_dados_form["nopayment"] = $this->nopayment;
              $this->kasir = "";  
              $this->nmgp_dados_form["kasir"] = $this->kasir;
              $this->kode_akun = "";  
              $this->nmgp_dados_form["kode_akun"] = $this->kode_akun;
              $this->jmldk1 = "";  
              $this->nmgp_dados_form["jmldk1"] = $this->jmldk1;
              $this->jmldk2 = "";  
              $this->nmgp_dados_form["jmldk2"] = $this->jmldk2;
              $this->jmlasr = "";  
              $this->nmgp_dados_form["jmlasr"] = $this->jmlasr;
              $this->jmlkary = "";  
              $this->nmgp_dados_form["jmlkary"] = $this->jmlkary;
              $this->edc1 = "";  
              $this->nmgp_dados_form["edc1"] = $this->edc1;
              $this->edc2 = "";  
              $this->nmgp_dados_form["edc2"] = $this->edc2;
              $this->selisihpaket = "";  
              $this->nmgp_dados_form["selisihpaket"] = $this->selisihpaket;
              $this->kodepaket = "";  
              $this->nmgp_dados_form["kodepaket"] = $this->kodepaket;
              $this->lab = "";  
              $this->nmgp_dados_form["lab"] = $this->lab;
              $this->sc_field_1 = "";  
              $this->nmgp_dados_form["sc_field_1"] = $this->sc_field_1;
              $this->poli = "";  
              $this->nmgp_dados_form["poli"] = $this->poli;
              $this->rad = "";  
              $this->nmgp_dados_form["rad"] = $this->rad;
              $this->sc_field_2 = "";  
              $this->nmgp_dados_form["sc_field_2"] = $this->sc_field_2;
              $this->bhp = "";  
              $this->nmgp_dados_form["bhp"] = $this->bhp;
              $this->detailadm = "";  
              $this->nmgp_dados_form["detailadm"] = $this->detailadm;
              $this->detailkamar = "";  
              $this->nmgp_dados_form["detailkamar"] = $this->detailkamar;
              $this->detailresep = "";  
              $this->nmgp_dados_form["detailresep"] = $this->detailresep;
              $this->detailtindakan = "";  
              $this->nmgp_dados_form["detailtindakan"] = $this->detailtindakan;
              $this->detailresepokvk = "";  
              $this->nmgp_dados_form["detailresepokvk"] = $this->detailresepokvk;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dados_select'];
                  $this->trancode = $this->nmgp_dados_select['trancode'];  
                  $this->nostruk = $this->nmgp_dados_select['nostruk'];  
                  $this->custcode = $this->nmgp_dados_select['custcode'];  
                  $this->dokter = $this->nmgp_dados_select['dokter'];  
                  $this->jmltagihan = $this->nmgp_dados_select['jmltagihan'];  
                  $this->jmlbayar = $this->nmgp_dados_select['jmlbayar'];  
                  $this->deposit = $this->nmgp_dados_select['deposit'];  
                  $this->potongan = $this->nmgp_dados_select['potongan'];  
                  $this->hrsdibayar = $this->nmgp_dados_select['hrsdibayar'];  
                  $this->trandate = $this->nmgp_dados_select['trandate'];  
                  $this->terimadari = $this->nmgp_dados_select['terimadari'];  
                  $this->jenispayment = $this->nmgp_dados_select['jenispayment'];  
                  $this->instansipenjamin = $this->nmgp_dados_select['instansipenjamin'];  
                  $this->bankdebit = $this->nmgp_dados_select['bankdebit'];  
                  $this->nokartu = $this->nmgp_dados_select['nokartu'];  
                  $this->sc_field_0 = $this->nmgp_dados_select['sc_field_0'];  
                  $this->lunas = $this->nmgp_dados_select['lunas'];  
                  $this->paiddate = $this->nmgp_dados_select['paiddate'];  
                  $this->nopayment = $this->nmgp_dados_select['nopayment'];  
                  $this->kasir = $this->nmgp_dados_select['kasir'];  
                  $this->kode_akun = $this->nmgp_dados_select['kode_akun'];  
                  $this->jmldk1 = $this->nmgp_dados_select['jmldk1'];  
                  $this->jmldk2 = $this->nmgp_dados_select['jmldk2'];  
                  $this->jmlasr = $this->nmgp_dados_select['jmlasr'];  
                  $this->jmlkary = $this->nmgp_dados_select['jmlkary'];  
                  $this->edc1 = $this->nmgp_dados_select['edc1'];  
                  $this->edc2 = $this->nmgp_dados_select['edc2'];  
                  $this->selisihpaket = $this->nmgp_dados_select['selisihpaket'];  
                  $this->kodepaket = $this->nmgp_dados_select['kodepaket'];  
                  $this->lab = $this->nmgp_dados_select['lab'];  
                  $this->rad = $this->nmgp_dados_select['rad'];  
                  $this->sc_field_2 = $this->nmgp_dados_select['sc_field_2'];  
                  $this->bhp = $this->nmgp_dados_select['bhp'];  
                  $this->detailadm = $this->nmgp_dados_select['detailadm'];  
                  $this->detailkamar = $this->nmgp_dados_select['detailkamar'];  
                  $this->detailresep = $this->nmgp_dados_select['detailresep'];  
                  $this->detailtindakan = $this->nmgp_dados_select['detailtindakan'];  
                  $this->detailresepokvk = $this->nmgp_dados_select['detailresepokvk'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbillruang_mob_script_case_init'] ]['form_tbbillruang_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtindakanrawatinap_mob_script_case_init'] ]['form_tbtindakanrawatinap_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbtim_mob_script_case_init'] ]['form_tbtim_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['grid_tbreseprawatinap_alt_script_case_init'] ]['grid_tbreseprawatinap_alt']['embutida_parms'] = "v_tranri*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_paginacao*scinFULL*scoutNMSC_cab*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbbhprawatinap_mob_script_case_init'] ]['form_tbbhprawatinap_mob']['embutida_parms'] = "trancode*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbdetailresepokvk_mob_script_case_init'] ]['form_tbdetailresepokvk_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['form_detailadm_mob_script_case_init'] ]['form_detailadm_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
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
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter']))
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function deposit_onChange()
{
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
  
$original_hrsdibayar = $this->hrsdibayar;
$original_jmltagihan = $this->jmltagihan;
$original_jmlbayar = $this->jmlbayar;
$original_deposit = $this->deposit;
$original_hrsdibayar = $this->hrsdibayar;

$this->hrsdibayar  = $this->jmltagihan  - ($this->jmlbayar  + $this->deposit );

$modificado_hrsdibayar = $this->hrsdibayar;
$modificado_jmltagihan = $this->jmltagihan;
$modificado_jmlbayar = $this->jmlbayar;
$modificado_deposit = $this->deposit;
$modificado_hrsdibayar = $this->hrsdibayar;
$this->nm_formatar_campos('hrsdibayar', 'jmltagihan', 'jmlbayar', 'deposit');
if ($original_hrsdibayar !== $modificado_hrsdibayar || isset($this->nmgp_cmp_readonly['hrsdibayar']) || (isset($bFlagRead_hrsdibayar) && $bFlagRead_hrsdibayar))
{
    $this->ajax_return_values_hrsdibayar(true);
}
if ($original_jmltagihan !== $modificado_jmltagihan || isset($this->nmgp_cmp_readonly['jmltagihan']) || (isset($bFlagRead_jmltagihan) && $bFlagRead_jmltagihan))
{
    $this->ajax_return_values_jmltagihan(true);
}
if ($original_jmlbayar !== $modificado_jmlbayar || isset($this->nmgp_cmp_readonly['jmlbayar']) || (isset($bFlagRead_jmlbayar) && $bFlagRead_jmlbayar))
{
    $this->ajax_return_values_jmlbayar(true);
}
if ($original_deposit !== $modificado_deposit || isset($this->nmgp_cmp_readonly['deposit']) || (isset($bFlagRead_deposit) && $bFlagRead_deposit))
{
    $this->ajax_return_values_deposit(true);
}
if ($original_hrsdibayar !== $modificado_hrsdibayar || isset($this->nmgp_cmp_readonly['hrsdibayar']) || (isset($bFlagRead_hrsdibayar) && $bFlagRead_hrsdibayar))
{
    $this->ajax_return_values_hrsdibayar(true);
}
$this->NM_ajax_info['event_field'] = 'deposit';
form_pay_ranap_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off';
}
function jenisPayment_onChange()
{
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
  
$original_jenispayment = $this->jenispayment;
$original_instansipenjamin = $this->instansipenjamin;
$original_bankdebit = $this->bankdebit;
$original_nokartu = $this->nokartu;
$original_sc_field_0 = $this->sc_field_0;
$original_jmldk1 = $this->jmldk1;
$original_jmldk2 = $this->jmldk2;
$original_jmlasr = $this->jmlasr;
$original_jmlkary = $this->jmlkary;
$original_edc1 = $this->edc1;
$original_edc2 = $this->edc2;
$original_kodepaket = $this->kodepaket;
$original_edc2 = $this->edc2;
$original_edc1 = $this->edc1;
$original_jmlkary = $this->jmlkary;
$original_jmlasr = $this->jmlasr;
$original_jmldk2 = $this->jmldk2;
$original_jmldk1 = $this->jmldk1;
$original_sc_field_0 = $this->sc_field_0;
$original_nokartu = $this->nokartu;
$original_bankdebit = $this->bankdebit;
$original_instansipenjamin = $this->instansipenjamin;

if($this->jenispayment == 'TUNAI'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "off"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'off';
	$this->nmgp_cmp_hidden["bankdebit"] = "off"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'off';
	$this->nmgp_cmp_hidden["nokartu"] = "off"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'off';
	$this->nmgp_cmp_hidden["sc_field_0"] = "off"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'off';
	$this->nmgp_cmp_hidden["jmldk1"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'off';
	$this->nmgp_cmp_hidden["jmldk2"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'off';
	$this->nmgp_cmp_hidden["jmlasr"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'off';
	$this->nmgp_cmp_hidden["jmlkary"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'off';
	$this->nmgp_cmp_hidden["edc1"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'off';
	$this->nmgp_cmp_hidden["edc2"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'off';
}elseif($this->jenispayment == 'ASURANSI'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "on"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'on';
	$this->nmgp_cmp_hidden["bankdebit"] = "off"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'off';
	$this->nmgp_cmp_hidden["nokartu"] = "on"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'on';
	$this->nmgp_cmp_hidden["sc_field_0"] = "on"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'on';
	$this->nmgp_cmp_hidden["jmldk1"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'off';
	$this->nmgp_cmp_hidden["jmldk2"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'off';
	$this->nmgp_cmp_hidden["jmlasr"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'on';
	$this->nmgp_cmp_hidden["jmlkary"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'off';
	$this->nmgp_cmp_hidden["edc1"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'off';
	$this->nmgp_cmp_hidden["edc2"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'off';
}elseif($this->jenispayment == 'KARTU DEBIT' OR $this->jenispayment == 'KARTU KREDIT'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "off"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'off';
	$this->nmgp_cmp_hidden["bankdebit"] = "on"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'on';
	$this->nmgp_cmp_hidden["nokartu"] = "on"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'on';
	$this->nmgp_cmp_hidden["sc_field_0"] = "off"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'off';
	$this->nmgp_cmp_hidden["jmldk1"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'on';
	$this->nmgp_cmp_hidden["jmldk2"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'on';
	$this->nmgp_cmp_hidden["jmlasr"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'off';
	$this->nmgp_cmp_hidden["jmlkary"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'off';
	$this->nmgp_cmp_hidden["edc1"] = "on"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'on';
	$this->nmgp_cmp_hidden["edc2"] = "on"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'on';
}elseif($this->jenispayment == 'KARYAWAN'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "off"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'off';
	$this->nmgp_cmp_hidden["bankdebit"] = "off"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'off';
	$this->nmgp_cmp_hidden["nokartu"] = "off"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'off';
	$this->nmgp_cmp_hidden["sc_field_0"] = "off"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'off';
	$this->nmgp_cmp_hidden["jmldk1"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'off';
	$this->nmgp_cmp_hidden["jmldk2"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'off';
	$this->nmgp_cmp_hidden["jmlasr"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'off';
	$this->nmgp_cmp_hidden["jmlkary"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'on';
	$this->nmgp_cmp_hidden["edc1"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'off';
	$this->nmgp_cmp_hidden["edc2"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'off';
}elseif ($this->jenispayment  == 'KOMBINASI'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "on"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'on';
	$this->nmgp_cmp_hidden["bankdebit"] = "on"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'on';
	$this->nmgp_cmp_hidden["nokartu"] = "on"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'on';
	$this->nmgp_cmp_hidden["sc_field_0"] = "on"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'on';
	$this->nmgp_cmp_hidden["jmldk1"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'on';
	$this->nmgp_cmp_hidden["jmldk2"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'on';
	$this->nmgp_cmp_hidden["jmlasr"] = "on"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'on';
	$this->nmgp_cmp_hidden["jmlkary"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'off';
	$this->nmgp_cmp_hidden["edc1"] = "on"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'on';
	$this->nmgp_cmp_hidden["edc2"] = "on"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'on';
}elseif ($this->jenispayment  == 'JAMPERU'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "on"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'on';
	$this->nmgp_cmp_hidden["bankdebit"] = "off"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'off';
	$this->nmgp_cmp_hidden["nokartu"] = "off"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'off';
	$this->nmgp_cmp_hidden["sc_field_0"] = "on"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'on';
	$this->nmgp_cmp_hidden["jmldk1"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'off';
	$this->nmgp_cmp_hidden["jmldk2"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'off';
	$this->nmgp_cmp_hidden["jmlasr"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'off';
	$this->nmgp_cmp_hidden["jmlkary"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'off';
	$this->nmgp_cmp_hidden["edc1"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'off';
	$this->nmgp_cmp_hidden["edc2"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'off';
}elseif ($this->jenispayment == 'TUNAI PROMO'){
	$this->nmgp_cmp_hidden["instansipenjamin"] = "off"; $this->NM_ajax_info['fieldDisplay']['instansipenjamin'] = 'off';
	$this->nmgp_cmp_hidden["bankdebit"] = "off"; $this->NM_ajax_info['fieldDisplay']['bankdebit'] = 'off';
	$this->nmgp_cmp_hidden["nokartu"] = "off"; $this->NM_ajax_info['fieldDisplay']['nokartu'] = 'off';
	$this->nmgp_cmp_hidden["sc_field_0"] = "off"; $this->NM_ajax_info['fieldDisplay']['sc_field_0'] = 'off';
	$this->nmgp_cmp_hidden["jmldk1"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk1'] = 'off';
	$this->nmgp_cmp_hidden["jmldk2"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmldk2'] = 'off';
	$this->nmgp_cmp_hidden["jmlasr"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlasr'] = 'off';
	$this->nmgp_cmp_hidden["jmlkary"] = "off"; $this->NM_ajax_info['fieldDisplay']['jmlkary'] = 'off';
	$this->nmgp_cmp_hidden["edc1"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc1'] = 'off';
	$this->nmgp_cmp_hidden["edc2"] = "off"; $this->NM_ajax_info['fieldDisplay']['edc2'] = 'off';
	$this->nmgp_cmp_hidden["kodepaket"] = "on"; $this->NM_ajax_info['fieldDisplay']['kodepaket'] = 'on';
}

$modificado_jenispayment = $this->jenispayment;
$modificado_instansipenjamin = $this->instansipenjamin;
$modificado_bankdebit = $this->bankdebit;
$modificado_nokartu = $this->nokartu;
$modificado_sc_field_0 = $this->sc_field_0;
$modificado_jmldk1 = $this->jmldk1;
$modificado_jmldk2 = $this->jmldk2;
$modificado_jmlasr = $this->jmlasr;
$modificado_jmlkary = $this->jmlkary;
$modificado_edc1 = $this->edc1;
$modificado_edc2 = $this->edc2;
$modificado_kodepaket = $this->kodepaket;
$modificado_edc2 = $this->edc2;
$modificado_edc1 = $this->edc1;
$modificado_jmlkary = $this->jmlkary;
$modificado_jmlasr = $this->jmlasr;
$modificado_jmldk2 = $this->jmldk2;
$modificado_jmldk1 = $this->jmldk1;
$modificado_sc_field_0 = $this->sc_field_0;
$modificado_nokartu = $this->nokartu;
$modificado_bankdebit = $this->bankdebit;
$modificado_instansipenjamin = $this->instansipenjamin;
$this->nm_formatar_campos('jenispayment', 'instansipenjamin', 'bankdebit', 'nokartu', 'sc_field_0', 'jmldk1', 'jmldk2', 'jmlasr', 'jmlkary', 'edc1', 'edc2', 'kodepaket');
if ($original_jenispayment !== $modificado_jenispayment || isset($this->nmgp_cmp_readonly['jenispayment']) || (isset($bFlagRead_jenispayment) && $bFlagRead_jenispayment))
{
    $this->ajax_return_values_jenispayment(true);
}
if ($original_instansipenjamin !== $modificado_instansipenjamin || isset($this->nmgp_cmp_readonly['instansipenjamin']) || (isset($bFlagRead_instansipenjamin) && $bFlagRead_instansipenjamin))
{
    $this->ajax_return_values_instansipenjamin(true);
}
if ($original_bankdebit !== $modificado_bankdebit || isset($this->nmgp_cmp_readonly['bankdebit']) || (isset($bFlagRead_bankdebit) && $bFlagRead_bankdebit))
{
    $this->ajax_return_values_bankdebit(true);
}
if ($original_nokartu !== $modificado_nokartu || isset($this->nmgp_cmp_readonly['nokartu']) || (isset($bFlagRead_nokartu) && $bFlagRead_nokartu))
{
    $this->ajax_return_values_nokartu(true);
}
if ($original_sc_field_0 !== $modificado_sc_field_0 || isset($this->nmgp_cmp_readonly['sc_field_0']) || (isset($bFlagRead_sc_field_0) && $bFlagRead_sc_field_0))
{
    $this->ajax_return_values_sc_field_0(true);
}
if ($original_jmldk1 !== $modificado_jmldk1 || isset($this->nmgp_cmp_readonly['jmldk1']) || (isset($bFlagRead_jmldk1) && $bFlagRead_jmldk1))
{
    $this->ajax_return_values_jmldk1(true);
}
if ($original_jmldk2 !== $modificado_jmldk2 || isset($this->nmgp_cmp_readonly['jmldk2']) || (isset($bFlagRead_jmldk2) && $bFlagRead_jmldk2))
{
    $this->ajax_return_values_jmldk2(true);
}
if ($original_jmlasr !== $modificado_jmlasr || isset($this->nmgp_cmp_readonly['jmlasr']) || (isset($bFlagRead_jmlasr) && $bFlagRead_jmlasr))
{
    $this->ajax_return_values_jmlasr(true);
}
if ($original_jmlkary !== $modificado_jmlkary || isset($this->nmgp_cmp_readonly['jmlkary']) || (isset($bFlagRead_jmlkary) && $bFlagRead_jmlkary))
{
    $this->ajax_return_values_jmlkary(true);
}
if ($original_edc1 !== $modificado_edc1 || isset($this->nmgp_cmp_readonly['edc1']) || (isset($bFlagRead_edc1) && $bFlagRead_edc1))
{
    $this->ajax_return_values_edc1(true);
}
if ($original_edc2 !== $modificado_edc2 || isset($this->nmgp_cmp_readonly['edc2']) || (isset($bFlagRead_edc2) && $bFlagRead_edc2))
{
    $this->ajax_return_values_edc2(true);
}
if ($original_kodepaket !== $modificado_kodepaket || isset($this->nmgp_cmp_readonly['kodepaket']) || (isset($bFlagRead_kodepaket) && $bFlagRead_kodepaket))
{
    $this->ajax_return_values_kodepaket(true);
}
if ($original_edc2 !== $modificado_edc2 || isset($this->nmgp_cmp_readonly['edc2']) || (isset($bFlagRead_edc2) && $bFlagRead_edc2))
{
    $this->ajax_return_values_edc2(true);
}
if ($original_edc1 !== $modificado_edc1 || isset($this->nmgp_cmp_readonly['edc1']) || (isset($bFlagRead_edc1) && $bFlagRead_edc1))
{
    $this->ajax_return_values_edc1(true);
}
if ($original_jmlkary !== $modificado_jmlkary || isset($this->nmgp_cmp_readonly['jmlkary']) || (isset($bFlagRead_jmlkary) && $bFlagRead_jmlkary))
{
    $this->ajax_return_values_jmlkary(true);
}
if ($original_jmlasr !== $modificado_jmlasr || isset($this->nmgp_cmp_readonly['jmlasr']) || (isset($bFlagRead_jmlasr) && $bFlagRead_jmlasr))
{
    $this->ajax_return_values_jmlasr(true);
}
if ($original_jmldk2 !== $modificado_jmldk2 || isset($this->nmgp_cmp_readonly['jmldk2']) || (isset($bFlagRead_jmldk2) && $bFlagRead_jmldk2))
{
    $this->ajax_return_values_jmldk2(true);
}
if ($original_jmldk1 !== $modificado_jmldk1 || isset($this->nmgp_cmp_readonly['jmldk1']) || (isset($bFlagRead_jmldk1) && $bFlagRead_jmldk1))
{
    $this->ajax_return_values_jmldk1(true);
}
if ($original_sc_field_0 !== $modificado_sc_field_0 || isset($this->nmgp_cmp_readonly['sc_field_0']) || (isset($bFlagRead_sc_field_0) && $bFlagRead_sc_field_0))
{
    $this->ajax_return_values_sc_field_0(true);
}
if ($original_nokartu !== $modificado_nokartu || isset($this->nmgp_cmp_readonly['nokartu']) || (isset($bFlagRead_nokartu) && $bFlagRead_nokartu))
{
    $this->ajax_return_values_nokartu(true);
}
if ($original_bankdebit !== $modificado_bankdebit || isset($this->nmgp_cmp_readonly['bankdebit']) || (isset($bFlagRead_bankdebit) && $bFlagRead_bankdebit))
{
    $this->ajax_return_values_bankdebit(true);
}
if ($original_instansipenjamin !== $modificado_instansipenjamin || isset($this->nmgp_cmp_readonly['instansipenjamin']) || (isset($bFlagRead_instansipenjamin) && $bFlagRead_instansipenjamin))
{
    $this->ajax_return_values_instansipenjamin(true);
}
$this->NM_ajax_info['event_field'] = 'jenisPayment';
form_pay_ranap_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off';
}
function jmlBayar_onChange()
{
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
  
$original_trancode = $this->trancode;
$original_hrsdibayar = $this->hrsdibayar;
$original_jmlbayar = $this->jmlbayar;
$original_jmltagihan = $this->jmltagihan;
$original_paiddate = $this->paiddate;
$original_hrsdibayar = $this->hrsdibayar;

$check_sql = "SELECT sum(deposit)"
   . " FROM tbpayment_ri"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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
    $jmlDeposit = $this->rs[0][0];
    
}
		else     
{
	$jmlDeposit = '0';
}


$this->hrsdibayar  = ($this->jmlbayar  + $jmlDeposit) - $this->jmltagihan ;


$modificado_trancode = $this->trancode;
$modificado_hrsdibayar = $this->hrsdibayar;
$modificado_jmlbayar = $this->jmlbayar;
$modificado_jmltagihan = $this->jmltagihan;
$modificado_paiddate = $this->paiddate;
$modificado_hrsdibayar = $this->hrsdibayar;
$this->nm_formatar_campos('trancode', 'hrsdibayar', 'jmlbayar', 'jmltagihan');
if ($original_trancode !== $modificado_trancode || isset($this->nmgp_cmp_readonly['trancode']) || (isset($bFlagRead_trancode) && $bFlagRead_trancode))
{
    $this->ajax_return_values_trancode(true);
}
if ($original_hrsdibayar !== $modificado_hrsdibayar || isset($this->nmgp_cmp_readonly['hrsdibayar']) || (isset($bFlagRead_hrsdibayar) && $bFlagRead_hrsdibayar))
{
    $this->ajax_return_values_hrsdibayar(true);
}
if ($original_jmlbayar !== $modificado_jmlbayar || isset($this->nmgp_cmp_readonly['jmlbayar']) || (isset($bFlagRead_jmlbayar) && $bFlagRead_jmlbayar))
{
    $this->ajax_return_values_jmlbayar(true);
}
if ($original_jmltagihan !== $modificado_jmltagihan || isset($this->nmgp_cmp_readonly['jmltagihan']) || (isset($bFlagRead_jmltagihan) && $bFlagRead_jmltagihan))
{
    $this->ajax_return_values_jmltagihan(true);
}
if ($original_paiddate !== $modificado_paiddate || isset($this->nmgp_cmp_readonly['paiddate']) || (isset($bFlagRead_paiddate) && $bFlagRead_paiddate))
{
    $this->ajax_return_values_paiddate(true);
}
if ($original_hrsdibayar !== $modificado_hrsdibayar || isset($this->nmgp_cmp_readonly['hrsdibayar']) || (isset($bFlagRead_hrsdibayar) && $bFlagRead_hrsdibayar))
{
    $this->ajax_return_values_hrsdibayar(true);
}
$this->NM_ajax_info['event_field'] = 'jmlBayar';
form_pay_ranap_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off';
}
function kodePaket_onChange()
{
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
  
$original_kodepaket = $this->kodepaket;
$original_selisihpaket = $this->selisihpaket;
$original_jmltagihan = $this->jmltagihan;
$original_trancode = $this->trancode;
$original_hrsdibayar = $this->hrsdibayar;
$original_jmltagihan = $this->jmltagihan;
$original_selisihpaket = $this->selisihpaket;
$original_hrsdibayar = $this->hrsdibayar;

$check_sql = "SELECT hargaPaket"
   . " FROM tbpaket"
   . " WHERE id = '" . $this->kodepaket  . "'";
 
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
    $tagihanPaket = $this->rs[0][0];
}

if(empty($this->kodepaket ) || is_null($this->kodepaket )){
	
}else{
	
	if(empty($this->selisihpaket ) || is_null($this->selisihpaket ))
	
	$this->selisihpaket  = $this->jmltagihan  - $tagihanPaket;
		
}

$this->jmltagihan  = $tagihanPaket;

$check_sql = "SELECT sum(deposit)"
   . " FROM tbpayment_ri"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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
    $jmlDeposit = $this->rs[0][0];
    
}
		else     
{
	$jmlDeposit = '0';
}

$check_sql = "SELECT sum(jmlBayar+jmlDK1+jmlDK2+jmlAsr+jmlKary)"
   . " FROM tbpayment_ri"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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
    $pembayaran = $this->rs[0][0];
}
		else     
{
	$pembayaran = '0';
}

$this->hrsdibayar  = $tagihanPaket-($jmlDeposit+$pembayaran);


$modificado_kodepaket = $this->kodepaket;
$modificado_selisihpaket = $this->selisihpaket;
$modificado_jmltagihan = $this->jmltagihan;
$modificado_trancode = $this->trancode;
$modificado_hrsdibayar = $this->hrsdibayar;
$modificado_jmltagihan = $this->jmltagihan;
$modificado_selisihpaket = $this->selisihpaket;
$modificado_hrsdibayar = $this->hrsdibayar;
$this->nm_formatar_campos('kodepaket', 'selisihpaket', 'jmltagihan', 'trancode', 'hrsdibayar');
if ($original_kodepaket !== $modificado_kodepaket || isset($this->nmgp_cmp_readonly['kodepaket']) || (isset($bFlagRead_kodepaket) && $bFlagRead_kodepaket))
{
    $this->ajax_return_values_kodepaket(true);
}
if ($original_selisihpaket !== $modificado_selisihpaket || isset($this->nmgp_cmp_readonly['selisihpaket']) || (isset($bFlagRead_selisihpaket) && $bFlagRead_selisihpaket))
{
    $this->ajax_return_values_selisihpaket(true);
}
if ($original_jmltagihan !== $modificado_jmltagihan || isset($this->nmgp_cmp_readonly['jmltagihan']) || (isset($bFlagRead_jmltagihan) && $bFlagRead_jmltagihan))
{
    $this->ajax_return_values_jmltagihan(true);
}
if ($original_trancode !== $modificado_trancode || isset($this->nmgp_cmp_readonly['trancode']) || (isset($bFlagRead_trancode) && $bFlagRead_trancode))
{
    $this->ajax_return_values_trancode(true);
}
if ($original_hrsdibayar !== $modificado_hrsdibayar || isset($this->nmgp_cmp_readonly['hrsdibayar']) || (isset($bFlagRead_hrsdibayar) && $bFlagRead_hrsdibayar))
{
    $this->ajax_return_values_hrsdibayar(true);
}
if ($original_jmltagihan !== $modificado_jmltagihan || isset($this->nmgp_cmp_readonly['jmltagihan']) || (isset($bFlagRead_jmltagihan) && $bFlagRead_jmltagihan))
{
    $this->ajax_return_values_jmltagihan(true);
}
if ($original_selisihpaket !== $modificado_selisihpaket || isset($this->nmgp_cmp_readonly['selisihpaket']) || (isset($bFlagRead_selisihpaket) && $bFlagRead_selisihpaket))
{
    $this->ajax_return_values_selisihpaket(true);
}
if ($original_hrsdibayar !== $modificado_hrsdibayar || isset($this->nmgp_cmp_readonly['hrsdibayar']) || (isset($bFlagRead_hrsdibayar) && $bFlagRead_hrsdibayar))
{
    $this->ajax_return_values_hrsdibayar(true);
}
$this->NM_ajax_info['event_field'] = 'kodePaket';
form_pay_ranap_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off';
}
function kekata($x) {
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
  
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = $this->kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = $this->kekata($x/10)." puluh". $this->kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . $this->kekata($x - 100);
    } else if ($x <1000) {
        $temp = $this->kekata($x/100) . " ratus" . $this->kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . $this->kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = $this->kekata($x/1000) . " ribu" . $this->kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = $this->kekata($x/1000000) . " juta" . $this->kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = $this->kekata($x/1000000000) . " milyar" . $this->kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = $this->kekata($x/1000000000000) . " trilyun" . $this->kekata(fmod($x,1000000000000));
    }     
        return $temp;

$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off';
}
function terbilang($x, $style=4) {
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
  
    if($x<0) {
        $hasil = "minus ". trim($this->kekata($x));
    } else {
        $hasil = trim($this->kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;

$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off';
}
function pembulatan($uang)
{
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
  
 $puluhan = substr($uang, -2);
 if($puluhan<50)
 $akhir = $uang - $puluhan;
 else
 $akhir = $uang + (100-$puluhan);

$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off';
}
function tranCode_onChange()
{
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_trancode_s)) {$this->sc_temp_trancode_s = (isset($_SESSION['trancode_s'])) ? $_SESSION['trancode_s'] : "";}
  
$original_trancode = $this->trancode;
$original_jmltagihan = $this->jmltagihan;
$original_hrsdibayar = $this->hrsdibayar;
$original_jmltagihan = $this->jmltagihan;
$original_hrsdibayar = $this->hrsdibayar;


$check_sql = "SELECT unitAsal"
   . " FROM tbadmrawatinap"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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
    $unit = $this->rs[0][0];
}
		else     
{
	$unit = '';
}

if(is_null($unit) || empty($unit)){
	
	$jmlTindIGD = '0';
	$jmlresepIGD = '0';
	$jmlbhpIGD = '0';
	$jmlTindPoli = '0';
	$jmlresepPoli = '0';
	$jmlbhpPoli = '0';
	$jmllabIGD = '0';
	$jmlradIGD = '0';
	$jmladmIGD = '0';
	$jmladmPoli = '0';
	
}else{

	$check_sql = "SELECT
					SUM( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) AS Total 
				FROM
					tbtindakanigd a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbdoctor d ON d.docCode = a.pelaksana 
				WHERE
					c.tranCode = '".$this->trancode ."'";
		 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindIGD = $this->rs[0][0];
}else{
	$jmlTindIGD = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbreseprawatigd a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlresepIGD = $this->rs[0][0];
}else{
	$jmlresepIGD = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbbhpigd a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlbhpIGD = $this->rs[0][0];
}else{
	$jmlbhpIGD = '0';
}
	
	$check_sql = "SELECT
					SUM( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) AS Total 
				FROM
					tbtindakanrawatjalan a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbdoctor d ON d.docCode = a.dokter 
				WHERE
					c.tranCode = '".$this->trancode ."'";
		 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindPoli = $this->rs[0][0];
}else{
	$jmlTindPoli = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbreseprawatjalan a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlresepPoli = $this->rs[0][0];
}else{
	$jmlresepPoli = '0';
}
	
	$check_sql = "SELECT
					SUM(
						( a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) + (
							( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbbhprawatjalan a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk
					LEFT JOIN tbobat d ON d.kodeItem = a.item 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlbhpPoli = $this->rs[0][0];
}else{
	$jmlbhpPoli = '0';
}
	
		$check_sql = "SELECT
						SUM( tbl_sum.total ) 
					FROM
						(
						SELECT
							b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
						FROM
							tbtranlab a
							LEFT JOIN tbdetaillab b ON b.trancode = a.trancode
							LEFT JOIN tblab c ON c.labcode = b.labcode
							LEFT JOIN tbrujukanlab d ON d.struk = a.struk
							LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 
						WHERE
							e.tranCode = '".$this->trancode ."' GROUP BY
		concat(date_format(b.trandate, '%d/%m/%Y  %H:%i'), '-', b.labcode) 
	) tbl_sum";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmllabIGD = $this->rs[0][0];
}else{
	$jmllabIGD = '0';
}
	
		$check_sql = "SELECT SUM( tbl_sum.total ) 
FROM
	(
	SELECT
		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
	FROM
		tbtranrad a
		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode
		LEFT JOIN tbradiologi c ON c.radcode = b.radcode
		LEFT JOIN tbrujukanradiologi d ON d.struk = a.struk
		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 
	WHERE
		e.tranCode = '".$this->trancode ."' GROUP BY
		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ',b.radcode)  
	) tbl_sum";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlradIGD = $this->rs[0][0];
}else{
	$jmlradIGD = '0';
}
	
	$check_sql = "SELECT
					sum(biaya)
				FROM
					tbbilladm a
					LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmladmIGD = $this->rs[0][0];
}else{
	$jmladmIGD = '0';
}
	
	$check_sql = "SELECT
					sum(biaya) 
				FROM
					tbbilladm a
					LEFT JOIN tbdetailrawatjalan b ON b.tranCode = a.tranCode
					LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 
				WHERE
					c.tranCode = '".$this->trancode ."'";
	 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmladmPoli = $this->rs[0][0];
}else{
	$jmladmPoli = '0';
}
	
}

$check_sql = "SELECT
	SUM(
		( a.rate - ( a.rate * ( a.disc / 100 ) ) ) *
	IF
		(
			( date_format( a.check_out, '%H:%i' ) <= '12:00' ),
			DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ),
			DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1 
		) 
	) AS Total 
FROM
	tbbillruang a
	LEFT JOIN tbbed b ON b.idBed = a.bed 
WHERE
	a.tranCode = '".$this->trancode ."'";
 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlKamar = $this->rs[0][0];
}else{
	$jmlKamar = '0';
}

$check_sql = "SELECT
				SUM(
					( a.keperawatan - ( a.keperawatan * ( a.disc / 100 ) ) ) *
				IF
					(
						( date_format( a.check_out, '%H:%i' ) <= '12:00' ),
						DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ),
						DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1 
					) 
				) AS Total 
			FROM
				tbbillruang a
				LEFT JOIN tbbed b ON b.idBed = a.bed 
			WHERE
				a.tranCode = '".$this->trancode ."'";
 
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
	
if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlKeperawatan = $this->rs[0][0];
}else{
	$jmlKeperawatan = '0';
}

$check_sql = "SELECT
				SUM( a.fee - ( a.fee * ( a.disc / 100 ) ) ) AS Total 
			FROM
				tbtim a
				LEFT JOIN tbdetailvk b ON b.tranCode = a.trancode
				LEFT JOIN tbdoctor c ON c.docCode = a.
				CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode 
			WHERE
				b.inapCode = '" . $this->trancode  . "'";

 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindvk = $this->rs[0][0];
}else{
	$jmlTindvk = '0';
}

$check_sql = "SELECT
				SUM( a.fee - ( a.fee * ( a.disc / 100 ) ) ) AS Total 
			FROM
				tbtim a
				LEFT JOIN tbdetailok b ON b.tranCode = a.trancode
				LEFT JOIN tbdoctor c ON c.docCode = a.
				CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode 
			WHERE
				b.inapCode = '".$this->trancode ."'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindok = $this->rs[0][0];
}else{
	$jmlTindok = '0';
}

$check_sql = "SELECT
					SUM( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) AS Total 
				FROM
					tbtindakanrawatinap a
					LEFT JOIN tbdoctor b ON b.docCode = a.pelaksana 
				WHERE
					a.tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlTindakan = $this->rs[0][0];
}else{
	$jmlTindakan = '0';
}


$check_sql = "SELECT
				SUM(
					( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) + ( ( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) * 10 / 100 ) 
				) AS Total 
			FROM
				tbreseprawatinap a
				LEFT JOIN tbobat b ON b.kodeItem = a.item 
			WHERE
				a.tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlResep = $this->rs[0][0];
}else{
	$jmlResep = '0';
}

$check_sql = "SELECT
	SUM(
		(
			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) ) + (
				( ( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * a.diskon / 100 ) ) * ( 10 / 100 ) 
			) 
		) 
	) AS Total 
FROM
	tbbhprawatinap a
	LEFT JOIN tbobat b ON b.kodeItem = a.item 
WHERE
	a.tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlBHP = $this->rs[0][0];
}else{
	$jmlBHP = '0';
}

$check_sql = "SELECT
					SUM(
						( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) + (
							( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) * ( 10 / 100 ) 
						) 
					) AS Total 
				FROM
					tbdetailresepokvk a
					LEFT JOIN tbobat b ON b.kodeItem = a.item
					LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode 
				WHERE
					c.inapCode = '".$this->trancode ."'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlok = $this->rs[0][0];
}else{
	$jmlok = '0';
}

$check_sql = "SELECT
				SUM(
					( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) + ( ( a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ) ) * 10 / 100 ) 
				) AS Total 
			FROM
				tbdetailresepokvk a
				LEFT JOIN tbobat b ON b.kodeItem = a.item
				LEFT JOIN tbdetailvk c ON c.tranCode = a.tranCode 
			WHERE
				c.inapCode = '".$this->trancode ."'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlvk = $this->rs[0][0];
}else{
	$jmlvk = '0';
}

$check_sql = "SELECT
	SUM( tbl_sum.total ) 
FROM
(
	SELECT
		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
	FROM
		tbtranlab a
		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode
		LEFT JOIN tblab c ON c.labcode = b.labcode
	WHERE
		a.inapcode = '" . $this->trancode  . "'
	GROUP BY
		concat(date_format(b.trandate, '%d/%m/%Y  %H:%i'), '-', b.labcode)
	) tbl_sum";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmllab = $this->rs[0][0];
}else{
	$jmllab = '0';
}

$check_sql = "SELECT
	SUM( tbl_sum.total ) 
FROM
	(
	SELECT
		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total 
	FROM
		tbtranrad a
		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode
		LEFT JOIN tbradiologi c ON c.radcode = b.radcode
	WHERE
		a.inapcode = '" . $this->trancode  . "' 
	GROUP BY
		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ',b.radcode) 
	) tbl_sum";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
    $jmlrad = $this->rs[0][0];
}else{
	$jmlrad = '0';
}

$check_sql = "SELECT
				biaya 
			FROM
				tbbilladm 
			WHERE
				tranCode = '" . $this->trancode  . "'";
 
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

if (isset($this->rs[0][0]) || !is_null($this->rs[0][0]))     
{
 
	$jmladm = $this->rs[0][0];
}else{
	$jmladm = '0';
}


$semua = $jmlTindIGD+$jmlresepIGD+$jmlbhpIGD+$jmlTindPoli+$jmlresepPoli+$jmlbhpPoli+$jmllabIGD+$jmlradIGD+$jmladmIGD+$jmladmPoli+$jmlKamar+$jmlKeperawatan+$jmlTindvk+$jmlTindok+$jmlTindakan+$jmlResep+$jmlBHP+$jmlok+$jmlvk+$jmllab+$jmlrad+$jmladm;

$all = $semua*(7/100);

$tagihan = $all+$semua;


$check_sql = "SELECT sum(deposit)"
   . " FROM tbpayment_ri"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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
    $jmlDeposit = $this->rs[0][0];
    
}
		else     
{
	$jmlDeposit = '0';
}

$check_sql = "SELECT sum(jmlBayar+jmlDK1+jmlDK2+jmlAsr+jmlKary)"
   . " FROM tbpayment_ri"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
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
    $pembayaran = $this->rs[0][0];
}
		else     
{
	$pembayaran = '0';
}

$this->jmltagihan  = $all+$semua;

$this->hrsdibayar  = ($semua+$all)-($pembayaran+$jmlDeposit);




$this->sc_temp_trancode_s = $this->trancode ;



if (isset($this->sc_temp_trancode_s)) { $_SESSION['trancode_s'] = $this->sc_temp_trancode_s;}
$_SESSION['scriptcase']['form_pay_ranap_mob']['contr_erro'] = 'off';
$modificado_trancode = $this->trancode;
$modificado_jmltagihan = $this->jmltagihan;
$modificado_hrsdibayar = $this->hrsdibayar;
$modificado_jmltagihan = $this->jmltagihan;
$modificado_hrsdibayar = $this->hrsdibayar;
$this->nm_formatar_campos('trancode', 'jmltagihan', 'hrsdibayar');
if ($original_trancode !== $modificado_trancode || isset($this->nmgp_cmp_readonly['trancode']) || (isset($bFlagRead_trancode) && $bFlagRead_trancode))
{
    $this->ajax_return_values_trancode(true);
}
if ($original_jmltagihan !== $modificado_jmltagihan || isset($this->nmgp_cmp_readonly['jmltagihan']) || (isset($bFlagRead_jmltagihan) && $bFlagRead_jmltagihan))
{
    $this->ajax_return_values_jmltagihan(true);
}
if ($original_hrsdibayar !== $modificado_hrsdibayar || isset($this->nmgp_cmp_readonly['hrsdibayar']) || (isset($bFlagRead_hrsdibayar) && $bFlagRead_hrsdibayar))
{
    $this->ajax_return_values_hrsdibayar(true);
}
if ($original_jmltagihan !== $modificado_jmltagihan || isset($this->nmgp_cmp_readonly['jmltagihan']) || (isset($bFlagRead_jmltagihan) && $bFlagRead_jmltagihan))
{
    $this->ajax_return_values_jmltagihan(true);
}
if ($original_hrsdibayar !== $modificado_hrsdibayar || isset($this->nmgp_cmp_readonly['hrsdibayar']) || (isset($bFlagRead_hrsdibayar) && $bFlagRead_hrsdibayar))
{
    $this->ajax_return_values_hrsdibayar(true);
}
$this->NM_ajax_info['event_field'] = 'tranCode';
form_pay_ranap_mob_pack_ajax_response();
exit;
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_pay_ranap_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_pay_ranap_mob_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['csrf_token'];
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

   function Form_lookup_nostruk()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk'] = array(); 
    }

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT noStruk, noStruk  FROM tbdetailrawatinap WHERE tranCode = '$this->trancode' ORDER BY noStruk";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_nostruk'][] = $rs->fields[0];
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
   function Form_lookup_custcode()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode'] = array(); 
    }

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT custCode, custCode FROM tbdetailrawatinap where tranCode = '$this->trancode' ORDER BY custCode";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_custcode'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1'] = array(); 
    }

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,', ', salut)  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&', '&salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer WHERE custCode = '$this->custcode'";
   }

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_sc_field_1'][] = $rs->fields[0];
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
   function Form_lookup_dokter()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter'] = array(); 
    }

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "select dokter as kode, concat(gelar,' ', name,', ', spec) as dokter from tbdetailrawatinap a left join tbdoctor b on b.docCode = a.dokter where a.tranCode = '$this->trancode'";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_dokter'][] = $rs->fields[0];
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
   function Form_lookup_jenispayment()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "TUNAI?#?TUNAI?#?S?@?";
       $nmgp_def_dados .= "BPJS?#?BPJS?#?N?@?";
       $nmgp_def_dados .= "KARTU KREDIT?#?KARTU KREDIT?#?N?@?";
       $nmgp_def_dados .= "KARTU DEBIT?#?KARTU DEBIT?#?N?@?";
       $nmgp_def_dados .= "ASURANSI?#?ASURANSI?#?N?@?";
       $nmgp_def_dados .= "KARYAWAN?#?KARYAWAN?#?N?@?";
       $nmgp_def_dados .= "KOMBINASI?#?KOMBINASI?#?N?@?";
       $nmgp_def_dados .= "BANSOS?#?BANSOS?#?N?@?";
       $nmgp_def_dados .= "JAMPERU?#?JAMPERU?#?N?@?";
       $nmgp_def_dados .= "TUNAI PROMO?#?TUNAI PROMO?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_kodepaket()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket'] = array(); 
    }

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT id, kodePaket + ' - ' + namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT id, concat(kodePaket,' - ',namaPaket)  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT id, kodePaket&' - '&namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT id, kodePaket||' - '||namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT id, kodePaket + ' - ' + namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT id, kodePaket||' - '||namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }
   else
   {
       $nm_comando = "SELECT id, kodePaket||' - '||namaPaket  FROM tbpaket  ORDER BY kodePaket, namaPaket";
   }

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_kodepaket'][] = $rs->fields[0];
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
   function Form_lookup_bankdebit()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit'] = array(); 
    }

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT bankName, bankName  FROM tbbank  ORDER BY bankName";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_bankdebit'][] = $rs->fields[0];
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
   function Form_lookup_edc1()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1'] = array(); 
    }

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT bankName, bankName  FROM tbbank  ORDER BY bankName";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc1'][] = $rs->fields[0];
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
   function Form_lookup_edc2()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2'] = array(); 
    }

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT bankName, bankName  FROM tbbank  ORDER BY bankName";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_edc2'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli'] = array(); 
    }

   $old_value_jmltagihan = $this->jmltagihan;
   $old_value_jmlbayar = $this->jmlbayar;
   $old_value_jmldk1 = $this->jmldk1;
   $old_value_jmldk2 = $this->jmldk2;
   $old_value_jmlasr = $this->jmlasr;
   $old_value_jmlkary = $this->jmlkary;
   $old_value_deposit = $this->deposit;
   $old_value_potongan = $this->potongan;
   $old_value_hrsdibayar = $this->hrsdibayar;
   $old_value_selisihpaket = $this->selisihpaket;
   $old_value_id = $this->id;
   $old_value_paiddate = $this->paiddate;
   $old_value_paiddate_hora = $this->paiddate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_jmltagihan = $this->jmltagihan;
   $unformatted_value_jmlbayar = $this->jmlbayar;
   $unformatted_value_jmldk1 = $this->jmldk1;
   $unformatted_value_jmldk2 = $this->jmldk2;
   $unformatted_value_jmlasr = $this->jmlasr;
   $unformatted_value_jmlkary = $this->jmlkary;
   $unformatted_value_deposit = $this->deposit;
   $unformatted_value_potongan = $this->potongan;
   $unformatted_value_hrsdibayar = $this->hrsdibayar;
   $unformatted_value_selisihpaket = $this->selisihpaket;
   $unformatted_value_id = $this->id;
   $unformatted_value_paiddate = $this->paiddate;
   $unformatted_value_paiddate_hora = $this->paiddate_hora;

   $nm_comando = "SELECT name, name  FROM tbpoli where polyCode = (SELECT poli from tbdoctor where docCode = '$this->dokter')";

   $this->jmltagihan = $old_value_jmltagihan;
   $this->jmlbayar = $old_value_jmlbayar;
   $this->jmldk1 = $old_value_jmldk1;
   $this->jmldk2 = $old_value_jmldk2;
   $this->jmlasr = $old_value_jmlasr;
   $this->jmlkary = $old_value_jmlkary;
   $this->deposit = $old_value_deposit;
   $this->potongan = $old_value_potongan;
   $this->hrsdibayar = $old_value_hrsdibayar;
   $this->selisihpaket = $old_value_selisihpaket;
   $this->id = $old_value_id;
   $this->paiddate = $old_value_paiddate;
   $this->paiddate_hora = $old_value_paiddate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['Lookup_poli'][] = $rs->fields[0];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_pay_ranap_mob_pack_ajax_response();
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
          $data_lookup = $this->SC_lookup_nostruk($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "noStruk", $arg_search, $data_lookup);
          }
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
          $data_lookup = $this->SC_lookup_dokter($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "dokter", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "jmlTagihan", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "jmlBayar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "deposit", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "potongan", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "hrsDibayar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "terimaDari", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_jenispayment($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "jenisPayment", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_instansipenjamin($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "instansiPenjamin", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_bankdebit($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "bankDebit", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "noKartu", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Jaminan/Polis`", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_pay_ranap_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['total'] = $qt_geral_reg_form_pay_ranap_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_pay_ranap_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_pay_ranap_mob_pack_ajax_response();
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
      $nm_numeric[] = "id";$nm_numeric[] = "nostruk";$nm_numeric[] = "jmltagihan";$nm_numeric[] = "jmlbayar";$nm_numeric[] = "deposit";$nm_numeric[] = "potongan";$nm_numeric[] = "hrsdibayar";$nm_numeric[] = "jmldk1";$nm_numeric[] = "jmldk2";$nm_numeric[] = "jmlasr";$nm_numeric[] = "jmlkary";$nm_numeric[] = "selisihpaket";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['decimal_db'] == ".")
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
      $Nm_datas['trandate'] = "datetime";$Nm_datas['paiddate'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['SC_sep_date1'];
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
   function SC_lookup_nostruk($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_custcode($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_dokter($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_jenispayment($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['TUNAI'] = "TUNAI";
       $data_look['BPJS'] = "BPJS";
       $data_look['KARTU KREDIT'] = "KARTU KREDIT";
       $data_look['KARTU DEBIT'] = "KARTU DEBIT";
       $data_look['ASURANSI'] = "ASURANSI";
       $data_look['KARYAWAN'] = "KARYAWAN";
       $data_look['KOMBINASI'] = "KOMBINASI";
       $data_look['BANSOS'] = "BANSOS";
       $data_look['JAMPERU'] = "JAMPERU";
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
   function SC_lookup_instansipenjamin($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT name, instCode FROM tbinstansi WHERE (name LIKE '%$campo%')" ; 
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
   function SC_lookup_bankdebit($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT bankName, bankName FROM tbbank WHERE (bankName LIKE '%$campo%')" ; 
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
       $nmgp_saida_form = "form_pay_ranap_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_pay_ranap_mob_fim.php";
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
       form_pay_ranap_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pay_ranap_mob']['masterValue']);
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
